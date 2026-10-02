#!/usr/bin/env python3
"""Publica la serie UAFE del blog de creativeweb.com.ec vía WP REST API.

Creative Web se escribe en TÚ: el validador rechaza voseo y formas de usted.
Adaptado de okcars/noviembre-2026/publish_batch.py (duplicados por estado, tags paginados,
reintento que no duplica).

Pausas moderadas: el hosting tiene ModSecurity y conviene no hacer ráfagas.
(5 s entre llamadas, 12 s entre publicaciones; ante un bloqueo se espera 120 s).

Los specs ya traen el `content` en bloques Gutenberg (generados con comun.render).
Este script valida, comprueba duplicados y publica de forma escalonada.

Uso:
  python3 -u publish_batch.py --validate      # solo valida, no toca el sitio
  python3 -u publish_batch.py --dry-run       # valida + muestra qué se publicaría
  python3 -u publish_batch.py                 # publica de verdad

Credenciales en ../../.env: CREATIVEWEB_WP_BASE, CREATIVEWEB_WP_USER, CREATIVEWEB_WP_APP_PASS.
"""
import json, re, sys, time, glob, os, random, html
import requests

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.abspath(os.path.join(HERE, "..", ".."))
UA = ("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/126 Safari/537.36")
DELAY = 5         # entre llamadas sueltas
DELAY_POST = 12    # entre publicaciones completas
BACKOFF = 120

CATEGORIAS = {67: "Noticias"}

# Referencias geográficas del norte del Ecuador — mínimo 2 por post
IBARRA_REFS = [
    "ibarra", "imbabura", "otavalo", "cayambe", "tulcán", "tulcan", "atuntaqui",
    "carchi", "panamericana", "yahuarcocha", "cotacachi", "pimampiro", "urcuquí",
    "urcuqui", "norte del ecuador", "norte del país", "norte del pais", "quito",
    "sierra norte", "ecuador",
]

BLACKLIST = [
    "en conclusión", "en conclusion", "en resumen", "en definitiva", "para concluir",
    "en síntesis", "sin duda alguna", "es importante destacar", "cabe mencionar",
    "cabe recalcar", "vale la pena mencionar", "hoy en día", "en la actualidad",
    "en el mundo de", "a lo largo de los años", "experiencia única", "experiencia unica",
    "experiencia inolvidable", "se ha convertido en", "juega un papel", "una amplia gama",
    "descubre todo lo que", "todo lo que necesitas saber", "esperamos que este",
    "si eres un amante de", "esperamos verte pronto", "no está de más",
    # sector automotor
    "el vehículo de tus sueños", "calidad y confianza", "amplio stock",
    "soluciones integrales", "a la vanguardia", "líder en el mercado", "sinergia",
    "valor agregado", "en la era digital", "en el mundo actual",
    # construcciones
    "no solo", "ya sea", "es fundamental", "es esencial", "es crucial",
    "ahora bien,", "dicho esto,", "¿alguna vez te has preguntado", "¿sabías que",
]

# OKCars se escribe en usted (decisión del 2026-09-30): ni tú ni vos.
# Solo formas inequívocas: «revisa», «calcula» o «consulta» también son tercera
# persona («el mecánico revisa») y darían falsos positivos.
USTED = re.compile(r"(?<![a-záéíóúñü])(usted|ustedes|escríbanos|consúltelo|contáctenos|"
                   r"comuníquese|revise|pregunte|confírmelo|confirme|su empresa|su negocio|"
                   r"sus correos|su correo|le pedimos|le ayudamos)(?![a-záéíóúñü])")
VOSEO = re.compile(r"(?<![a-záéíóúñü])(vos|querés|podés|tenés|sabés|necesitás|debés|"
                   r"sos|escribinos|mirá|revisá|pedí|compará|elegí|llamá|vení|hacé|tené|"
                   r"poné|fijate|asegurate|consultá|calculá|cotizá|preguntanos|andá|"
                   r"decime|contanos|visitanos)(?![a-záéíóúñü])")

# frases que sí valen en inglés (los posts en inglés no se validan con la lista española)
MARCA_INGLES = re.compile(r'\b(the|and|with|your|guide|how|what|where)\b', re.I)


def word_re(p):
    return re.compile(r"(?<![a-záéíóúñü])" + re.escape(p) + r"(?![a-záéíóúñü])")


def strip_tags(h):
    h = re.sub(r"<!--.*?-->", " ", h, flags=re.S)
    return re.sub(r"<[^>]+>", " ", h)


def load_env():
    env = {}
    with open(os.path.join(ROOT, ".env")) as f:
        for line in f:
            line = line.strip()
            if line and not line.startswith("#") and "=" in line:
                k, v = line.split("=", 1)
                env[k] = v.strip().strip('"')
    return env


class Api:
    def __init__(self, env):
        self.base = env["CREATIVEWEB_WP_BASE"].rstrip("/")
        self.auth = (env["CREATIVEWEB_WP_USER"], env["CREATIVEWEB_WP_APP_PASS"])
        self.s = requests.Session()
        self.s.headers.update({"User-Agent": UA})
        self.last = 0.0

    def _wait(self, mínimo=DELAY):
        gap = time.time() - self.last
        if gap < mínimo:
            time.sleep(mínimo - gap)
        self.last = time.time()

    def call(self, method, path, payload=None, params=None, espera=DELAY, tries=4):
        url = self.base + path
        for i in range(tries):
            self._wait(espera)
            p = dict(params or {})
            p["cb"] = random.randint(1, 10**9)
            try:
                r = self.s.request(method, url, auth=self.auth, params=p,
                                   json=payload, timeout=60)
            except requests.RequestException as e:
                print(f"    red: {e} · reintento en {BACKOFF}s"); time.sleep(BACKOFF)
                # Un POST cortado por timeout puede haberse creado igual en el servidor.
                # Reintentarlo a ciegas duplicó un post el 2026-10-01 (slug con -2).
                if method == "POST" and path == "/posts" and payload and payload.get("slug"):
                    for estado in ("future", "publish", "draft"):
                        try:
                            ya = self.s.get(url, auth=self.auth, timeout=60, params={
                                "slug": payload["slug"], "status": estado,
                                "_fields": "id,status"}).json()
                        except requests.RequestException:
                            ya = []
                        time.sleep(DELAY)
                        if ya:
                            print(f"    el post ya se había creado (id {ya[0]['id']}); no reintento")
                            return ya[0]
                continue
            if r.status_code in (429, 502, 503, 504):
                print(f"    HTTP {r.status_code} · espero {BACKOFF}s"); time.sleep(BACKOFF); continue
            if r.status_code >= 400:
                try:
                    j = r.json()
                except Exception:
                    j = {}
                if j.get("code") == "term_exists":
                    return {"id": j["data"]["term_id"], "_existed": True}
                raise RuntimeError(f"{method} {path} -> {r.status_code}: {r.text[:300]}")
            return r.json()
        raise RuntimeError(f"{method} {path}: sin respuesta tras {tries} intentos")


def es_ingles(spec):
    """Detecta si el post está escrito en inglés (para no aplicarle la lista negra española)."""
    t = spec.get("title", "")
    return bool(MARCA_INGLES.search(t)) and " de " not in t.lower() and " la " not in t.lower()


def validar(spec):
    issues = []
    c = spec.get("content", "")
    texto = strip_tags(c)
    low = texto.lower()
    ingles = es_ingles(spec)

    if not ingles:
        for f in BLACKLIST:
            if word_re(f).search(low):
                issues.append(f"frase prohibida: '{f}'")

    if "/servicios/correo-institucional-uafe/" not in c:
        issues.append("no enlaza la landing UAFE")
    for afirmacion in ("rechaza gmail", "no acepta gmail", "no acepta correos gratuitos"):
        if afirmacion in low:
            issues.append(f"afirmación no verificada: {afirmacion}")

    if "wp-block-quote" not in c:
        issues.append("sin blockquote (cita del equipo)")

    palabras = len(texto.split())
    if palabras < 1100:
        issues.append(f"{palabras} palabras (mínimo 1100)")

    if re.search(r"conclusi[oó]n</h", c.lower()):
        issues.append("tiene sección de conclusión")

    cats = spec.get("categories") or []
    if not cats or any(x not in CATEGORIAS for x in cats):
        issues.append(f"categoría inválida: {cats}")

    m = spec.get("meta", {})
    for k in ("_yoast_wpseo_title", "_yoast_wpseo_metadesc", "_yoast_wpseo_focuskw"):
        if not m.get(k):
            issues.append(f"falta {k}")
    if m.get("_yoast_wpseo_title") and len(m["_yoast_wpseo_title"]) > 60:
        issues.append(f"yoast_title de {len(m['_yoast_wpseo_title'])} caracteres (máx 60)")
    if m.get("_yoast_wpseo_metadesc"):
        n = len(m["_yoast_wpseo_metadesc"])
        if not (140 <= n <= 160):
            issues.append(f"metadesc de {n} caracteres (140-160)")

    # Creative Web va en tú. Se revisa el texto visible, el excerpt y la meta.
    todo = " ".join([low, spec.get("excerpt", "").lower(),
                     m.get("_yoast_wpseo_metadesc", "").lower(), spec.get("title", "").lower()])
    for patron, nombre in ((USTED, "usted"), (VOSEO, "voseo")):
        hits = sorted({h for h in patron.findall(todo)})
        if hits:
            issues.append(f"{nombre}: {', '.join(hits[:8])}")

    ex = spec.get("excerpt", "")
    if not ex:
        issues.append("sin excerpt")

    # enlaces internos al propio sitio
    internos = len(re.findall(r'href="https://www\.creativeweb\.com\.ec/', c))
    if internos < 2:
        issues.append(f"solo {internos} enlaces internos (mínimo 2)")

    if not spec.get("date"):
        issues.append("sin fecha")

    return issues, palabras


def main():
    solo_validar = "--validate" in sys.argv
    dry = "--dry-run" in sys.argv
    # Para relanzar un lote que se cortó a mitad: salta los slugs que ya subieron
    # en vez de abortar por duplicado.
    reanudar = "--resume" in sys.argv

    specs = []
    for path in sorted(glob.glob(os.path.join(HERE, "posts", "spec-*.json"))):
        with open(path, encoding="utf-8") as f:
            specs.append((os.path.basename(path), json.load(f)))

    if not specs:
        print("No hay specs en posts/. Nada que hacer."); return

    print(f"== Validando {len(specs)} specs ==")
    ok = True
    for name, s in specs:
        issues, pal = validar(s)
        marca = "EN" if es_ingles(s) else "ES"
        print(f"[{'OK ' if not issues else 'FAIL'}] {marca} {name} — {pal} palabras")
        for i in issues:
            print(f"       - {i}")
        if issues:
            ok = False
    if not ok:
        print("\nHay specs con problemas. No se publica nada."); sys.exit(1)
    print("\nValidación completa.")

    if solo_validar:
        return

    env = load_env()
    api = Api(env)
    me = api.call("GET", "/users/me", params={"context": "edit"})
    print(f"\nAutenticado como: {me.get('name')}")

    print("\n== Comprobando duplicados ==")
    # OJO: "status=any" NO devuelve los posts programados (future). Hay que pedir
    # cada estado por nombre y paginar, o un relanzamiento duplica todo el lote.
    existentes = set()
    for estado in ("publish", "future", "draft", "pending", "private"):
        page = 1
        while True:
            try:
                d = api.call("GET", "/posts", params={"per_page": 100, "page": page,
                                                      "status": estado, "_fields": "slug"})
            except RuntimeError:
                break
            if not d:
                break
            existentes |= {p["slug"] for p in d}
            if len(d) < 100:
                break
            page += 1
    print(f"  {len(existentes)} slugs ya en el sitio")
    dupes = [s["slug"] for _, s in specs if s["slug"] in existentes]
    if dupes and not reanudar:
        print(f"  ⚠ ya existen: {dupes}")
        print("     Si es un lote interrumpido, relanza con --resume para saltarlos.")
        sys.exit(1)
    if dupes:
        print(f"  saltando {len(dupes)} ya subidos: {dupes}")
        specs = [(f, s) for f, s in specs if s["slug"] not in existentes]
        if not specs:
            print("  no queda nada por subir."); return
    else:
        print("  ninguno colisiona")

    if dry:
        print("\n== Dry run · se publicaría ==")
        for _, s in specs:
            print(f"  {s['date'][:16]}  [{CATEGORIAS[s['categories'][0]]}]  {s['title'][:58]}")
        return

    print("\n== Tags ==")
    todos = sorted({t for _, s in specs for t in s.get("tags", [])})
    # Paginado: con más de 100 tags, leer solo la primera página hace que el
    # script intente crear tags existentes y el sitio aborte con term_exists.
    tag_ids, page = {}, 1
    while True:
        tg = api.call("GET", "/tags", params={"per_page": 100, "page": page, "_fields": "id,name"})
        tag_ids |= {html.unescape(t["name"]).lower(): t["id"] for t in tg}
        if len(tg) < 100:
            break
        page += 1
    for t in todos:
        if t.lower() not in tag_ids:
            r = api.call("POST", "/tags", {"name": t})
            tag_ids[t.lower()] = r["id"]
            print(f"  + {t}")
    print(f"  {len(todos)} tags listos")

    print("\n== Publicando ==")
    creados = []
    for name, s in specs:
        payload = {
            "title": s["title"], "slug": s["slug"], "status": s.get("status", "future"),
            "date": s["date"], "content": s["content"], "excerpt": s["excerpt"],
            "categories": s["categories"],
            "tags": [tag_ids[t.lower()] for t in s.get("tags", [])],
            "meta": s.get("meta", {}), "featured_media": s.get("featured_media", 0),
        }
        try:
            r = api.call("POST", "/posts", payload, espera=DELAY_POST)
        except RuntimeError as e:
            if "meta" in str(e).lower():
                print("    Yoast rechazó los meta; publico sin ellos")
                payload.pop("meta")
                r = api.call("POST", "/posts", payload, espera=DELAY_POST)
            else:
                raise
        creados.append((r["id"], s["date"][:10], s["slug"]))
        print(f"  {r['id']} [{r['status']}] {s['date'][:10]} {s['slug']}")

    print("\n== Verificación ==")
    for pid, fecha, slug in creados:
        p = api.call("GET", f"/posts/{pid}", params={"context": "edit",
                     "_fields": "id,status,categories,content"})
        c = p["content"]["raw"]
        marcas = []
        if "wp-block-quote" not in c: marcas.append("sin blockquote")
        if len(c) < 4000: marcas.append("contenido corto")
        print(f"  {pid} [{p['status']}] cat={p['categories']} {len(c)} chars"
              f" — {'OK' if not marcas else ', '.join(marcas)}")

    print(f"\n{len(creados)} posts creados.")


if __name__ == "__main__":
    main()
