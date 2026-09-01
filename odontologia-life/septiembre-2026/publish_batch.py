#!/usr/bin/env python3
"""Valida y publica los posts de Odontología Life.

  python3 publish_batch.py --validate    # solo valida los specs
  python3 publish_batch.py --dry-run     # valida + muestra qué se publicaría
  python3 publish_batch.py               # publica
  python3 publish_batch.py --resume      # retoma un lote interrumpido

Nunca usa curl: curl reintenta solo y puede duplicar posts.
"""
import base64, glob, json, os, re, sys, time, urllib.parse, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
RAIZ = os.path.abspath(os.path.join(AQUI, "..", ".."))

DELAY = 8            # segundos mínimos entre llamadas
DELAY_POST = 25      # entre publicaciones de posts
BACKOFF = 90         # espera tras un error de red o un 5xx
UA = ("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36")

MIN_PALABRAS = 1100
MAX_TITULO = 60
META_MIN, META_MAX = 140, 160
MIN_ENLACES = 2
MIN_GEO = 2

# Lista negra general + la del rubro salud, de LINEAMIENTOS-CONTENIDO.md
PROHIBIDAS = [
    "en el mundo actual", "en la era digital", "hoy en día", "en la actualidad",
    "cabe destacar", "cabe mencionar", "es importante destacar",
    "es importante mencionar", "es importante señalar", "vale la pena destacar",
    "sin lugar a dudas", "sin duda alguna",
    "en resumen", "en conclusión", "para concluir", "en definitiva",
    "no solo", "ahora bien,", "dicho esto",
    "sonrisa perfecta", "cuidado integral", "profesionales altamente capacitados",
    "tecnología de punta", "bienestar y salud", "tu salud es lo primero",
    "recupera tu calidad de vida", "manos expertas", "sonrisa de ensueño",
    "la mejor opción", "amplia experiencia", "amplia gama", "atención personalizada",
    "soluciones integrales", "a la vanguardia", "líder en el mercado",
    "es fundamental entender", "ya sea", "sinergia",
]

# Ojo: la comparación es por subcadena sobre el texto en minúsculas, así que
# hay que listar las variantes con y sin tilde. Las parroquias del foco local
# (Peguche, San Pablo, Gonzáles Suárez) faltaban y hacían fallar por «1 sola
# referencia» a posts que hablaban justamente de esas zonas.
GEO = ["otavalo", "ibarra", "cotacachi", "atuntaqui", "imbabura",
       "peguche", "san pablo", "gonzález suárez", "gonzales suarez",
       "gonzalez suarez", "quiroga", "ilumán", "iluman", "san rafael",
       "plaza de ponchos", "ecuador", "sierra norte"]

CATEGORIAS = {
    13: "Prevención y cuidado", 15: "Estética y tendencias",
    14: "Públicos específicos", 6: "Ortodoncia",
    17: "Tratamientos y procedimientos", 16: "Hábitos y educación",
    7: "Implantología", 10: "Endodoncia", 8: "Periodoncia",
    9: "Rehabilitación oral estética", 12: "Servicios generales y emergencias",
    11: "Cirugía maxilofacial",
}


def load_env():
    env = {}
    with open(os.path.join(RAIZ, ".env"), encoding="utf-8") as f:
        for line in f:
            if "=" in line and not line.strip().startswith("#"):
                k, v = line.strip().split("=", 1)
                env[k] = v.strip().strip('"').strip("'")
    for k in ("OLIFE_WP_BASE", "OLIFE_WP_USER", "OLIFE_WP_APP_PASS"):
        if k not in env:
            sys.exit(f"falta {k} en .env")
    return env


class Api:
    def __init__(self, env):
        self.base = env["OLIFE_WP_BASE"].rstrip("/")
        tok = f"{env['OLIFE_WP_USER']}:{env['OLIFE_WP_APP_PASS']}".encode()
        self.auth = "Basic " + base64.b64encode(tok).decode()
        self.ultimo = 0.0

    def _esperar(self, minimo):
        gap = time.time() - self.ultimo
        if gap < minimo:
            time.sleep(minimo - gap)

    def call(self, method, path, body=None, params=None, minimo=DELAY):
        url = self.base + path
        if params:
            url += ("&" if "?" in url else "?") + urllib.parse.urlencode(params)
        datos = json.dumps(body).encode() if body is not None else None
        for intento in range(4):
            self._esperar(minimo)
            req = urllib.request.Request(url, data=datos, method=method, headers={
                "Authorization": self.auth, "User-Agent": UA,
                "Content-Type": "application/json", "Accept": "application/json",
            })
            try:
                with urllib.request.urlopen(req, timeout=60) as r:
                    self.ultimo = time.time()
                    return json.loads(r.read().decode() or "null")
            except urllib.error.HTTPError as e:
                self.ultimo = time.time()
                if e.code in (429, 500, 502, 503, 504):
                    print(f"    HTTP {e.code} · espero {BACKOFF}s")
                    time.sleep(BACKOFF); continue
                raise RuntimeError(f"{method} {path} -> {e.code}: {e.read()[:300]}")
            except Exception as e:
                self.ultimo = time.time()
                print(f"    red: {e} · reintento en {BACKOFF}s")
                time.sleep(BACKOFF); continue
        raise RuntimeError(f"{method} {path}: agotados los reintentos")


def texto_plano(html):
    return re.sub(r"<[^>]+>", " ", html)


def validar(spec):
    problemas = []
    html = spec["content"]
    plano = texto_plano(html)
    palabras = len(plano.split())

    if palabras < MIN_PALABRAS:
        problemas.append(f"{palabras} palabras (mínimo {MIN_PALABRAS})")

    bajo = plano.lower()
    for f in PROHIBIDAS:
        if re.search(rf"(?<![\wáéíóúñ]){re.escape(f)}(?![\wáéíóúñ])", bajo):
            problemas.append(f"frase prohibida: '{f}'")

    t = spec["meta"]["_yoast_wpseo_title"]
    if len(t) > MAX_TITULO:
        problemas.append(f"yoast title de {len(t)} caracteres (máximo {MAX_TITULO})")
    d = spec["meta"]["_yoast_wpseo_metadesc"]
    if not (META_MIN <= len(d) <= META_MAX):
        problemas.append(f"metadesc de {len(d)} caracteres ({META_MIN}-{META_MAX})")

    enlaces = len(re.findall(r'href="https://www\.odontologialife\.com', html))
    if enlaces < MIN_ENLACES:
        problemas.append(f"solo {enlaces} enlaces internos (mínimo {MIN_ENLACES})")

    geos = {g for g in GEO if g in bajo}
    if len(geos) < MIN_GEO:
        problemas.append(f"solo {len(geos)} referencias geográficas (mínimo {MIN_GEO})")

    if "<blockquote" not in html:
        problemas.append("sin cita destacada")

    if re.search(r"<h2[^>]*>\s*(conclusi[óo]n|en resumen)\s*</h2>", html, re.I):
        problemas.append("tiene sección 'Conclusión'")

    if len(re.findall(r"<h2", html)) < 4:
        problemas.append("menos de 4 secciones H2")

    # Precios: si aparecen cifras, tiene que estar la aclaración de la política.
    if re.search(r"\$\s?\d", plano):
        if "referencial" not in bajo:
            problemas.append("menciona precios sin la aclaración de 'valor referencial'")
        if "valoración" not in bajo:
            problemas.append("menciona precios sin mencionar la valoración sin costo")

    return problemas, palabras


def main():
    solo_validar = "--validate" in sys.argv
    dry = "--dry-run" in sys.argv
    reanudar = "--resume" in sys.argv

    rutas = sorted(glob.glob(os.path.join(AQUI, "posts", "spec-*.json")))
    if not rutas:
        sys.exit("no hay specs en posts/")
    specs = [(r, json.load(open(r, encoding="utf-8"))) for r in rutas]

    print(f"== Validando {len(specs)} specs ==")
    fallos = 0
    for ruta, s in specs:
        problemas, palabras = validar(s)
        etiqueta = "FAIL" if problemas else "OK  "
        print(f"[{etiqueta}] {os.path.basename(ruta)} — {palabras} palabras")
        for p in problemas:
            print(f"       - {p}")
        if problemas:
            fallos += 1
    print()
    if fallos:
        print(f"{fallos} specs con problemas. No se publica nada.")
        sys.exit(1)
    print("Validación completa.")
    if solo_validar:
        return

    env = load_env()
    api = Api(env)
    me = api.call("GET", "/users/me", params={"context": "edit"})
    print(f"\nAutenticado como: {me.get('name')}")

    print("\n== Comprobando duplicados ==")
    existentes = set()
    d = api.call("GET", "/posts", params={"per_page": 100, "status": "any",
                                          "_fields": "slug"})
    existentes |= {p["slug"] for p in d}
    print(f"  {len(existentes)} slugs ya en el sitio")
    dupes = [s["slug"] for _, s in specs if s["slug"] in existentes]
    if dupes and not reanudar:
        print(f"  ⚠ ya existen: {dupes}")
        print("     Si es un lote interrumpido, relanza con --resume.")
        sys.exit(1)
    if dupes:
        print(f"  saltando {len(dupes)} ya subidos")
        specs = [(f, s) for f, s in specs if s["slug"] not in existentes]
        if not specs:
            print("  no queda nada por subir."); return
    else:
        print("  ninguno colisiona")

    if dry:
        print("\n== Dry run · se publicaría ==")
        for _, s in sorted(specs, key=lambda x: x[1]["date"]):
            print(f"  {s['date'][:16]}  [{CATEGORIAS[s['categories'][0]]}]  {s['title'][:56]}")
        return

    print("\n== Tags ==")
    todos = sorted({t for _, s in specs for t in s.get("tags", [])})
    tg = api.call("GET", "/tags", params={"per_page": 100, "_fields": "id,name"})
    tag_ids = {t["name"].lower(): t["id"] for t in tg}
    for t in todos:
        if t.lower() not in tag_ids:
            r = api.call("POST", "/tags", {"name": t})
            tag_ids[t.lower()] = r["id"]
            print(f"  + {t}")
    print(f"  {len(todos)} tags listos")

    print("\n== Publicando ==")
    creados = []
    for _, s in sorted(specs, key=lambda x: x[1]["date"]):
        payload = dict(s)
        payload["tags"] = [tag_ids[t.lower()] for t in s.get("tags", [])]
        r = api.call("POST", "/posts", payload, minimo=DELAY_POST)
        creados.append(r["id"])
        print(f"  {r['id']} [{r['status']}] {s['date'][:10]} {s['slug']}")

    print(f"\n{len(creados)} posts creados.")


if __name__ == "__main__":
    main()
