#!/usr/bin/env python3
"""Publica el batch de posts SEO de Dimapar (agosto 2026) vía WP REST API.

Uso:
  python3 -u publish_batch.py --validate   # solo validar specs, sin tocar el sitio
  python3 -u publish_batch.py              # validar + publicar + resolver links internos

Credenciales en ../../.env: DIMAPAR_WP_USER / DIMAPAR_WP_APP_PASS
(el .env se parsea a mano porque los Application Passwords llevan espacios).
"""
import json, re, sys, time, base64, glob, os
import urllib.request, urllib.error

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.abspath(os.path.join(HERE, "..", ".."))
BASE = "https://www.dimaparecuador.com/wp-json/wp/v2"
UA = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126 Safari/537.36"
DELAY_CALL = 5      # entre llamadas sueltas
DELAY_POST = 12     # entre creaciones de post

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
    # sector industrial / B2B
    "soluciones integrales", "aliado estratégico", "optimizar procesos",
    "maximizar la eficiencia", "a la vanguardia", "calidad garantizada",
    # construcciones
    "no solo", "ya sea", "es fundamental", "es esencial", "es crucial",
    "ahora bien,", "dicho esto,", "¿alguna vez te has preguntado", "¿sabías que",
]


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


def api(env, method, path, payload=None, retries=3):
    tok = base64.b64encode(f"{env['DIMAPAR_WP_USER']}:{env['DIMAPAR_WP_APP_PASS']}".encode()).decode()
    url = path if path.startswith("http") else BASE + path
    data = json.dumps(payload).encode() if payload is not None else None
    req = urllib.request.Request(url, data=data, method=method, headers={
        "Authorization": f"Basic {tok}", "User-Agent": UA,
        "Content-Type": "application/json",
    })
    for i in range(retries):
        try:
            with urllib.request.urlopen(req, timeout=60) as r:
                return json.load(r)
        except urllib.error.HTTPError as e:
            body = e.read().decode(errors="replace")
            try:
                j = json.loads(body)
            except Exception:
                j = {}
            if j.get("code") == "term_exists":
                return {"id": j["data"]["term_id"], "_existed": True}
            if e.code in (429, 502, 503) and i < retries - 1:
                print(f"    HTTP {e.code}, reintento en 30 s…"); time.sleep(30); continue
            raise RuntimeError(f"{method} {path} -> HTTP {e.code}: {body[:300]}")
        except Exception as e:
            if i < retries - 1:
                print(f"    {e}, reintento en 20 s…"); time.sleep(20); continue
            raise
    return None


# ---------- render Gutenberg ----------

def blk_p(text):
    return f"<!-- wp:paragraph --><p>{text}</p><!-- /wp:paragraph -->"

def blk_h(level, text):
    return (f"<!-- wp:heading {{\"level\":{level}}} -->"
            f"<h{level} class=\"wp-block-heading\">{text}</h{level}><!-- /wp:heading -->")

def blk_ul(items):
    lis = "".join(f"<!-- wp:list-item --><li>{i}</li><!-- /wp:list-item -->" for i in items)
    return f"<!-- wp:list --><ul class=\"wp-block-list\">{lis}</ul><!-- /wp:list -->"

def blk_quote(text, cite):
    return ("<!-- wp:quote --><blockquote class=\"wp-block-quote\">"
            f"<!-- wp:paragraph --><p>{text}</p><!-- /wp:paragraph -->"
            f"<cite>{cite}</cite></blockquote><!-- /wp:quote -->")

def blk_table(head, rows):
    thead = "<thead><tr>" + "".join(f"<th>{h}</th>" for h in head) + "</tr></thead>"
    tbody = "<tbody>" + "".join(
        "<tr>" + "".join(f"<td>{c}</td>" for c in row) + "</tr>" for row in rows) + "</tbody>"
    return (f"<!-- wp:table --><figure class=\"wp-block-table\">"
            f"<table class=\"has-fixed-layout\">{thead}{tbody}</table></figure><!-- /wp:table -->")


def render(spec):
    out = [blk_p(p) for p in spec["lead"]]
    for sec in spec["sections"]:
        out.append(blk_h(2, sec["h2"]))
        for b in sec["blocks"]:
            if isinstance(b, str):
                out.append(blk_p(b))
            elif "ul" in b:
                out.append(blk_ul(b["ul"]))
            elif "table" in b:
                out.append(blk_table(b["table"]["head"], b["table"]["rows"]))
            elif "quote" in b:
                out.append(blk_quote(b["quote"]["text"], b["quote"]["cite"]))
    if spec.get("faq"):
        out.append(blk_h(2, "Preguntas frecuentes"))
        for f in spec["faq"]:
            out.append(blk_h(3, f["q"]))
            out.append(blk_p(f["a"]))
    out.append(blk_p(spec["cta"]))
    return "\n".join(out)


# ---------- validación anti-IA ----------

def validate(spec, content):
    issues = []
    text = strip_tags(content)
    low = text.lower()
    for phrase in BLACKLIST:
        if word_re(phrase).search(low):
            issues.append(f"frase prohibida: '{phrase}'")
    geo = sum(1 for g in GEO_REFERENCES if g in low)
    if geo < 2:
        issues.append(f"solo {geo} referencias geográficas (mínimo 2)")
    if "wp-block-quote" not in content:
        issues.append("sin blockquote de cita del equipo")
    words = len(text.split())
    if words < 1150:
        issues.append(f"solo {words} palabras (mínimo 1150)")
    if not spec.get("faq") or len(spec["faq"]) < 3:
        issues.append("FAQ con menos de 3 preguntas")
    if re.search(r"conclusi[oó]n</h", content.lower()):
        issues.append("tiene sección de conclusión")
    if content.count("{{POST:") + content.count('href="https://www.dimaparecuador.com') < 2:
        issues.append("menos de 2 enlaces internos")
    nums = len(re.findall(r"\$\s?\d", text))
    if nums < 3:
        issues.append(f"solo {nums} datos de precio (mínimo 3)")
    return issues, words


def main():
    validate_only = "--validate" in sys.argv
    specs = []
    for path in sorted(glob.glob(os.path.join(HERE, "posts", "spec-*.json"))):
        with open(path) as f:
            specs.append((os.path.basename(path), json.load(f)))

    print(f"== Validando {len(specs)} specs ==")
    ok = True
    rendered = {}
    for name, spec in specs:
        content = render(spec)
        rendered[spec["slug"]] = content
        issues, words = validate(spec, content)
        status = "OK " if not issues else "FAIL"
        print(f"[{status}] {name} — {words} palabras")
        for i in issues:
            print(f"       - {i}")
        if issues:
            ok = False
    if not ok:
        print("\nHay specs con problemas. No se publica nada."); sys.exit(1)
    if validate_only:
        print("\nValidación completa. Todo listo para publicar."); return

    env = load_env()
    me = api(env, "GET", "/users/me?context=edit")
    print(f"\nAutenticado como: {me.get('name')} (id {me.get('id')})")

    # categorías
    print("\n== Categorías ==")
    existing = api(env, "GET", "/categories?per_page=100&_fields=id,slug")
    cat_ids = {c["slug"]: c["id"] for c in existing}
    for slug, cname in CATEGORIES.items():
        if slug not in cat_ids:
            time.sleep(DELAY_CALL)
            r = api(env, "POST", "/categories", {"name": cname, "slug": slug})
            cat_ids[slug] = r["id"]
            print(f"  creada: {cname} (id {r['id']})")
        else:
            print(f"  existe: {cname} (id {cat_ids[slug]})")

    # tags
    print("\n== Tags ==")
    all_tags = sorted({t for _, s in specs for t in s["tags"]})
    existing_tags = api(env, "GET", "/tags?per_page=100&_fields=id,name")
    tag_ids = {t["name"].lower(): t["id"] for t in existing_tags}
    for t in all_tags:
        if t.lower() not in tag_ids:
            time.sleep(2)
            r = api(env, "POST", "/tags", {"name": t})
            tag_ids[t.lower()] = r["id"]
    print(f"  {len(all_tags)} tags listos")

    # pasada 1: crear posts
    print("\n== Creando posts ==")
    created = {}   # slug -> {id, link}
    for name, spec in specs:
        time.sleep(DELAY_POST)
        payload = {
            "title": spec["title"], "slug": spec["slug"], "status": spec["status"],
            "date": spec["date"], "content": rendered[spec["slug"]],
            "excerpt": spec["excerpt"],
            "categories": [cat_ids[spec["category"]]],
            "tags": [tag_ids[t.lower()] for t in spec["tags"]],
            "meta": {
                "_yoast_wpseo_title": spec.get("yoast_title", ""),
                "_yoast_wpseo_metadesc": spec.get("yoast_desc", ""),
                "_yoast_wpseo_focuskw": spec.get("focus_kw", ""),
            },
        }
        try:
            r = api(env, "POST", "/posts", payload)
        except RuntimeError as e:
            if "yoast" in str(e).lower() or "meta" in str(e).lower():
                payload.pop("meta"); r = api(env, "POST", "/posts", payload)
            else:
                raise
        created[spec["slug"]] = {"id": r["id"], "link": r["link"]}
        print(f"  {r['id']} [{spec['status']}] {spec['date'][:10]} {r['link']}")

    # pasada 2: resolver links internos {{POST:slug}}
    print("\n== Resolviendo enlaces internos ==")
    for name, spec in specs:
        content = rendered[spec["slug"]]
        if "{{POST:" not in content:
            continue
        def repl(m):
            slug = m.group(1)
            if slug in created:
                return created[slug]["link"]
            print(f"  AVISO: slug '{slug}' no encontrado en batch"); return "#"
        new = re.sub(r"\{\{POST:([a-z0-9-]+)\}\}", repl, content)
        time.sleep(DELAY_POST)
        api(env, "POST", f"/posts/{created[spec['slug']]['id']}", {"content": new})
        print(f"  actualizado {spec['slug']}")

    print("\n== Resumen ==")
    for slug, info in created.items():
        print(f"  {info['id']}  {info['link']}")
    print("\nListo. Verifica en wp-admin que fechas y categorías estén correctas.")


if __name__ == "__main__":
    main()
