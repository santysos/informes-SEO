#!/usr/bin/env python3
"""Publica el batch de posts SEO de Dimapar (agosto 2026) vía WP REST API.

Sigue BRIEF-SEO-DIMAPAR.md:
  - requests con auth Basic (nunca curl)
  - cache-buster ?cb= en cada petición (nginx cachea /wp-json/)
  - 8 s entre peticiones, backoff 45-60 s ante 429
  - status SIEMPRE draft; publica el cliente
  - HTML limpio: solo h2/h3/p/ul/ol/li/strong/em/table/a/blockquote
  - no toca contenido existente, solo crea entradas nuevas

Uso:
  python3 -u publish_batch.py --validate    # solo valida, no toca el sitio
  python3 -u publish_batch.py --check-links # valida + verifica enlaces internos (HEAD 200)
  python3 -u publish_batch.py               # valida + publica + resuelve enlaces entre posts
"""
import json, re, sys, time, glob, os, random
import requests

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.abspath(os.path.join(HERE, "..", ".."))
SITE = "https://www.dimaparecuador.com"
BASE = f"{SITE}/wp-json/wp/v2"
UA = ("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/126 Safari/537.36")
DELAY = 8          # brief §1.2: 8 s entre peticiones
BACKOFF = 55       # brief §1.2: 45-60 s ante 429

CATEGORIES = {
    "guias-de-compra": "Guías de compra",
    "llanteras-y-vulcanizadoras": "Llanteras y vulcanizadoras",
    "talleres-automotrices": "Talleres automotrices",
    "mantenimiento-de-equipos": "Mantenimiento de equipos",
}

GEO_REFERENCES = [
    "quito", "guamaní", "maldonado", "quitumbe", "panamericana", "machachi",
    "sangolquí", "calderón", "carapungo", "guayaquil", "cuenca", "manta",
    "ambato", "santo domingo", "simón bolívar", "cumbayá", "los chillos",
    "latacunga", "durán", "alóag", "rumiñahui", "riobamba", "samborondón",
    "posorja", "daule", "carcelén",
]

BLACKLIST = [
    "en conclusión", "en resumen", "en definitiva", "para concluir", "en síntesis",
    "sin duda alguna", "es importante destacar", "cabe mencionar", "cabe recalcar",
    "vale la pena mencionar", "hoy en día", "en la actualidad", "en el mundo de",
    "en la era digital", "a lo largo de los años", "desde tiempos", "experiencia única",
    "experiencia inolvidable", "se ha convertido en", "juega un papel", "brindar",
    "contar con", "una amplia gama", "la mejor opción para ti", "descubre todo lo que",
    "todo lo que necesitas saber", "esperamos que este", "si eres un amante de",
    "no está de más",
    "soluciones integrales", "aliado estratégico", "optimizar procesos",
    "maximizar la eficiencia", "a la vanguardia", "calidad garantizada",
    "no solo", "ya sea", "es fundamental", "es esencial", "es crucial",
    "ahora bien,", "dicho esto,", "¿alguna vez te has preguntado", "¿sabías que",
]

# brief §3: español de Ecuador — "llanta", no "neumático"; "desenllantadora", no "desmontadora".
# Ojo: "neumático/a" como adjetivo (sistema neumático, bomba neumática) es correcto y muy usado
# en el sector; solo se marca cuando aparece como sustantivo, en el sentido de llanta.
TERMINOS_PROHIBIDOS = ["desmontadora", "desmontadoras"]
NEUMATICO_SUSTANTIVO = re.compile(
    r"(?:el|los|un|unos|del|al|este|estos|ese|esos|su|sus|cada|otro|otros|cuatro|dos)\s+"
    r"neum[áa]ticos?\b", re.I)

ALLOWED_TAGS = {"h2", "h3", "p", "ul", "ol", "li", "strong", "em", "table",
                "thead", "tbody", "tr", "th", "td", "a", "blockquote", "cite"}


def word_re(phrase):
    return re.compile(r"(?<![a-záéíóúñü])" + re.escape(phrase) + r"(?![a-záéíóúñü])")


def strip_tags(html):
    return re.sub(r"<[^>]+>", " ", html)


def load_env():
    env = {}
    with open(os.path.join(ROOT, ".env")) as f:
        for line in f:
            line = line.strip()
            if line and not line.startswith("#") and "=" in line:
                k, v = line.split("=", 1)
                env[k] = v
    return env


class Api:
    def __init__(self, env):
        self.auth = (env["DIMAPAR_WP_USER"], env["DIMAPAR_WP_APP_PASS"])
        self.s = requests.Session()
        self.s.headers.update({"User-Agent": UA})
        self.last = 0.0

    def _wait(self):
        gap = time.time() - self.last
        if gap < DELAY:
            time.sleep(DELAY - gap)
        self.last = time.time()

    def call(self, method, path, payload=None, params=None, tries=4):
        url = path if path.startswith("http") else BASE + path
        for i in range(tries):
            self._wait()
            p = dict(params or {})
            p["cb"] = random.randint(1, 10**9)       # brief §1.1
            r = self.s.request(method, url, auth=self.auth, params=p,
                               json=payload, timeout=60)
            if r.status_code == 429:
                print(f"    429 rate limit, esperando {BACKOFF}s…")
                time.sleep(BACKOFF)
                continue
            if r.status_code in (502, 503, 504):
                print(f"    HTTP {r.status_code}, reintento en {BACKOFF}s…")
                time.sleep(BACKOFF)
                continue
            if r.status_code >= 400:
                try:
                    j = r.json()
                except Exception:
                    j = {}
                if j.get("code") == "term_exists":
                    return {"id": j["data"]["term_id"], "_existed": True}
                raise RuntimeError(f"{method} {url} -> {r.status_code}: {r.text[:300]}")
            return r.json()
        raise RuntimeError(f"{method} {url}: agotados los reintentos")


# ---------- render HTML limpio (brief §5) ----------

def render(spec):
    out = [f"<p>{p}</p>" for p in spec["lead"]]
    for sec in spec["sections"]:
        out.append(f"<h2>{sec['h2']}</h2>")
        for b in sec["blocks"]:
            if isinstance(b, str):
                out.append(f"<p>{b}</p>")
            elif "ul" in b:
                out.append("<ul>" + "".join(f"<li>{i}</li>" for i in b["ul"]) + "</ul>")
            elif "table" in b:
                t = b["table"]
                head = "<thead><tr>" + "".join(f"<th>{h}</th>" for h in t["head"]) + "</tr></thead>"
                body = "<tbody>" + "".join(
                    "<tr>" + "".join(f"<td>{c}</td>" for c in row) + "</tr>"
                    for row in t["rows"]) + "</tbody>"
                out.append(f"<table>{head}{body}</table>")
            elif "quote" in b:
                q = b["quote"]
                out.append(f"<blockquote><p>{q['text']}</p><cite>{q['cite']}</cite></blockquote>")
    if spec.get("faq"):
        out.append("<h2>Preguntas frecuentes</h2>")
        for f in spec["faq"]:
            out.append(f"<h3>{f['q']}</h3>")
            out.append(f"<p>{f['a']}</p>")
    out.append(f"<p>{spec['cta']}</p>")
    return "\n".join(out)


# ---------- validación ----------

def internal_links(content):
    return re.findall(r'href="(https://www\.dimaparecuador\.com/[^"]*)"', content)


def validate(spec, content):
    issues = []
    text = strip_tags(content)
    low = text.lower()

    for phrase in BLACKLIST:
        if word_re(phrase).search(low):
            issues.append(f"frase prohibida: '{phrase}'")
    for t in TERMINOS_PROHIBIDOS:
        if word_re(t).search(low):
            issues.append(f"término no ecuatoriano: '{t}'")
    m = NEUMATICO_SUSTANTIVO.search(text)
    if m:
        issues.append(f"'neumático' como sustantivo (usar 'llanta'): «{m.group(0)}»")

    geo = sum(1 for g in GEO_REFERENCES if g in low)
    if geo < 2:
        issues.append(f"solo {geo} referencias geográficas (mínimo 2)")
    if "<blockquote>" not in content:
        issues.append("sin blockquote de cita del equipo")

    words = len(text.split())
    if not (1200 <= words <= 1800):
        issues.append(f"{words} palabras (brief pide 1.200-1.800)")

    if not spec.get("faq") or len(spec["faq"]) < 3:
        issues.append("FAQ con menos de 3 preguntas")
    if re.search(r"conclusi[oó]n</h", content.lower()):
        issues.append("tiene sección de conclusión")
    if "<h1" in content.lower():
        issues.append("contiene <h1> (lo pone el título del post)")

    # brief §5: solo etiquetas permitidas
    tags = set(t.lower() for t in re.findall(r"</?([a-z0-9]+)", content, re.I))
    bad = tags - ALLOWED_TAGS
    if bad:
        issues.append(f"etiquetas HTML no permitidas: {sorted(bad)}")
    if 'class="' in content or "style=" in content:
        issues.append("contiene class= o style=")

    # brief §5: 3-5 enlaces internos a categorías/páginas
    cat_links = [l for l in internal_links(content)
                 if "/categoria-producto/" in l or re.search(r"/(contacto|soporte|tienda|catalogo|quienes-somos)/", l)]
    if len(set(cat_links)) < 3:
        issues.append(f"solo {len(set(cat_links))} enlaces a categorías/páginas (mínimo 3)")

    exc = len(spec.get("excerpt", ""))
    if not (140 <= exc <= 160):
        issues.append(f"excerpt de {exc} caracteres (brief pide 140-160)")

    if spec.get("status") != "draft":
        issues.append(f"status '{spec.get('status')}' — el brief exige draft")

    nums = len(re.findall(r"\$\s?\d", text))
    if nums < 3:
        issues.append(f"solo {nums} datos de precio (mínimo 3)")

    return issues, words


def check_links(rendered):
    """brief §6.3: los enlaces internos deben devolver 200."""
    urls = sorted({u for c in rendered.values() for u in internal_links(c)})
    print(f"\n== Verificando {len(urls)} enlaces internos únicos ==")
    bad = []
    s = requests.Session(); s.headers.update({"User-Agent": UA})
    for u in urls:
        try:
            r = s.head(u, allow_redirects=True, timeout=30)
            if r.status_code != 200:
                r = s.get(u, timeout=30, stream=True)
        except Exception as e:
            print(f"  ERROR {u} -> {e}"); bad.append(u); continue
        flag = "OK " if r.status_code == 200 else "BAD"
        if r.status_code != 200:
            bad.append(u)
        print(f"  [{flag}] {r.status_code} {u}")
        time.sleep(1.5)
    return bad


def main():
    validate_only = "--validate" in sys.argv
    do_links = "--check-links" in sys.argv

    specs = []
    for path in sorted(glob.glob(os.path.join(HERE, "posts", "spec-*.json"))):
        with open(path, encoding="utf-8") as f:
            specs.append((os.path.basename(path), json.load(f)))

    print(f"== Validando {len(specs)} specs ==")
    ok = True
    rendered = {}
    for name, spec in specs:
        content = render(spec)
        rendered[spec["slug"]] = content
        issues, words = validate(spec, content)
        print(f"[{'OK ' if not issues else 'FAIL'}] {name} — {words} palabras")
        for i in issues:
            print(f"       - {i}")
        if issues:
            ok = False
    if not ok:
        print("\nHay specs con problemas. No se publica nada."); sys.exit(1)

    if do_links:
        bad = check_links(rendered)
        if bad:
            print(f"\n{len(bad)} enlaces rotos. Corrígelos antes de publicar."); sys.exit(1)
        print("\nTodos los enlaces internos responden 200.")
    if validate_only or do_links:
        print("\nValidación completa. Listo para publicar."); return

    env = load_env()
    api = Api(env)
    me = api.call("GET", "/users/me", params={"context": "edit"})
    print(f"\nAutenticado como: {me.get('name')} · roles {me.get('roles')}")

    # brief §4.4: no duplicar temas ya publicados
    print("\n== Comprobando duplicados ==")
    existing = api.call("GET", "/posts", params={"per_page": 100, "status": "any",
                                                 "_fields": "id,slug,title"})
    existing_slugs = {p["slug"] for p in existing}
    dupes = [s["slug"] for _, s in specs if s["slug"] in existing_slugs]
    if dupes:
        print(f"  Ya existen estos slugs: {dupes}. Abortando."); sys.exit(1)
    print(f"  {len(existing)} entradas existentes, ninguna colisiona.")

    print("\n== Categorías ==")
    cats = api.call("GET", "/categories", params={"per_page": 100, "_fields": "id,slug"})
    cat_ids = {c["slug"]: c["id"] for c in cats}
    for slug, cname in CATEGORIES.items():
        if slug not in cat_ids:
            r = api.call("POST", "/categories", {"name": cname, "slug": slug})
            cat_ids[slug] = r["id"]
            print(f"  creada: {cname} (id {r['id']})")
        else:
            print(f"  existe: {cname} (id {cat_ids[slug]})")

    print("\n== Tags ==")
    all_tags = sorted({t for _, s in specs for t in s["tags"]})
    tg = api.call("GET", "/tags", params={"per_page": 100, "_fields": "id,name"})
    tag_ids = {t["name"].lower(): t["id"] for t in tg}
    for t in all_tags:
        if t.lower() not in tag_ids:
            r = api.call("POST", "/tags", {"name": t})
            tag_ids[t.lower()] = r["id"]
            print(f"  + {t}")
    print(f"  {len(all_tags)} tags listos")

    # brief §1: comprobar si Yoast acepta meta por REST
    yoast_ok = True
    print("\n== Creando entradas (draft) ==")
    created = {}
    for name, spec in specs:
        payload = {
            "title": spec["title"], "slug": spec["slug"], "status": "draft",
            "content": rendered[spec["slug"]], "excerpt": spec["excerpt"],
            "categories": [cat_ids[spec["category"]]],
            "tags": [tag_ids[t.lower()] for t in spec["tags"]],
        }
        if yoast_ok:
            payload["meta"] = {
                "_yoast_wpseo_title": spec.get("yoast_title", ""),
                "_yoast_wpseo_metadesc": spec.get("yoast_desc", ""),
                "_yoast_wpseo_focuskw": spec.get("focus_kw", ""),
            }
        try:
            r = api.call("POST", "/posts", payload)
        except RuntimeError as e:
            if "meta" in str(e).lower() and yoast_ok:
                print("    Yoast meta rechazado por REST; sigo sin meta (anotar a mano)")
                yoast_ok = False
                payload.pop("meta")
                r = api.call("POST", "/posts", payload)
            else:
                raise
        created[spec["slug"]] = {"id": r["id"], "link": r["link"]}
        print(f"  {r['id']} draft · {spec['slug']}")

    print("\n== Resolviendo enlaces entre posts del batch ==")
    for name, spec in specs:
        content = rendered[spec["slug"]]
        if "{{POST:" not in content:
            continue
        def repl(m):
            slug = m.group(1)
            if slug in created:
                return created[slug]["link"]
            print(f"  AVISO: slug '{slug}' no está en el batch"); return f"{SITE}/"
        new = re.sub(r"\{\{POST:([a-z0-9-]+)\}\}", repl, content)
        api.call("POST", f"/posts/{created[spec['slug']]['id']}", {"content": new})
        print(f"  actualizado {spec['slug']}")

    # brief §6.1: releer y confirmar que el HTML sobrevivió
    print("\n== Verificación post-creación ==")
    for slug, info in created.items():
        p = api.call("GET", f"/posts/{info['id']}", params={"context": "edit",
                     "_fields": "id,slug,status,categories,content,excerpt"})
        c = p["content"]["raw"]
        marks = []
        if "<table>" not in c and "<table" not in c: marks.append("sin tabla")
        if "<blockquote>" not in c: marks.append("sin blockquote")
        if "{{POST:" in c: marks.append("placeholder sin resolver")
        state = "OK" if not marks else "REVISAR: " + ", ".join(marks)
        print(f"  {p['id']} [{p['status']}] cat={p['categories']} {len(c)} chars — {state}")

    print("\n== Resumen para el cliente ==")
    for name, spec in specs:
        info = created[spec["slug"]]
        print(f"\n· {spec['title']}")
        print(f"  ID {info['id']} · draft · {info['link']}")
        print(f"  Palabra clave: {spec['focus_kw']}")
        print(f"  Título SEO: {spec['yoast_title']}")
        print(f"  Meta description: {spec['yoast_desc']}")
    if not yoast_ok:
        print("\n⚠️  Yoast no acepta meta por REST: pegar a mano título SEO y meta description.")


if __name__ == "__main__":
    main()
