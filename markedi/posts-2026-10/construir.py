#!/usr/bin/env python3
"""Valida los posts de src/ y los convierte en payloads de WordPress en posts/.

    python3 construir.py --validar src/09-rotulos-quito.json   # valida uno
    python3 construir.py --validar                             # valida todos
    python3 construir.py                                       # valida y genera posts/

Agrega a cada post el CTA final (WhatsApp con mensaje propio + contacto) y la fecha
programada según el orden de PLAN.json (uno cada 2 días desde INICIO).
"""
import datetime as dt, glob, json, os, re, sys
from urllib.parse import quote as q

AQUI = os.path.dirname(os.path.abspath(__file__))
WA = "593998255046"
INICIO = dt.datetime(2026, 10, 7, 9, 0)
CADA_DIAS = 2
# Orden de publicación intercalando grupos (materiales, ciudad, trámites, negocio, CNC)
GRUPOS = [list(range(1, 9)), list(range(9, 17)), list(range(17, 21)), list(range(21, 28)), list(range(28, 33))]
ORDEN = [g[i] for i in range(8) for g in GRUPOS if i < len(g)]

MIN_PAL, MAX_TITULO, META = 1150, 60, (140, 160)
URLS_OK = {
    "https://www.markedi.ec/rotulacion-3d/", "https://www.markedi.ec/rotulos-luminosos/",
    "https://www.markedi.ec/revestimiento-de-fachadas/", "https://www.markedi.ec/router-cnc/",
    "https://www.markedi.ec/soportes-publicitarios/", "https://www.markedi.ec/contacto/",
    "https://www.markedi.ec/portafolio/letras-iluminadas-lovisa/",
    "https://www.markedi.ec/portafolio/letras-corporeas-en-acrilico/",
    "https://www.markedi.ec/portafolio/letras-de-aluminio/",
    "https://www.markedi.ec/portafolio/letras-de-mdf/",
    "https://www.markedi.ec/portafolio/letreros-luminosos/",
}
PROHIBIDAS = [
    "en el mundo actual", "en la era digital", "hoy en día", "en la actualidad",
    "cabe destacar", "cabe mencionar", "es importante destacar", "es importante mencionar",
    "es importante señalar", "vale la pena destacar", "sin lugar a dudas", "sin duda alguna",
    "en resumen", "en conclusión", "para concluir", "en definitiva", "no solo",
    "ahora bien,", "dicho esto", "ya sea", "la mejor opción", "amplia experiencia",
    "amplia gama", "atención personalizada", "soluciones integrales", "a la vanguardia",
    "líder en el mercado", "sinergia", "valor agregado", "es fundamental entender",
    "impacto visual", "siguiente nivel", "destaca de la competencia", "haz que tu marca brille",
    "calidad premium", "acabados impecables", "transforma tu negocio", "obra maestra",
    "sin límites",
]
VOSEO = r"\b(tenés|podés|querés|sabés|hacés|mirá|escribinos|contanos|vos)\b"
USTED = r"\b(usted|ustedes deben|escríbanos|contáctenos|cotícenos)\b"
GEO = ["ecuador", "otavalo", "imbabura", "ibarra", "quito", "guayaquil", "cuenca", "ambato",
       "manta", "loja", "santo domingo", "sierra", "costa", "pichincha", "guayas", "azuay",
       "manabí", "tungurahua", "riobamba", "portoviejo", "machala", "esmeraldas", "latacunga"]
CATS = {8, 9, 10, 11}


def p(t): return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"
def h2(t): return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'
def h3(t): return f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{t}</h3>\n<!-- /wp:heading -->'
def ul(i): return '<!-- wp:list -->\n<ul class="wp-block-list">' + "".join(f"<li>{x}</li>" for x in i) + "</ul>\n<!-- /wp:list -->"
def ol(i): return '<!-- wp:list {"ordered":true} -->\n<ol class="wp-block-list">' + "".join(f"<li>{x}</li>" for x in i) + "</ol>\n<!-- /wp:list -->"
def quote(t, c): return f'<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>{t}</p><cite>{c}</cite></blockquote>\n<!-- /wp:quote -->'
def tabla(d):
    cab, filas = d
    th = "".join(f"<th>{c}</th>" for c in cab)
    tr = "".join("<tr>" + "".join(f"<td>{c}</td>" for c in f) + "</tr>" for f in filas)
    return f'<!-- wp:table -->\n<figure class="wp-block-table"><table><thead><tr>{th}</tr></thead><tbody>{tr}</tbody></table></figure>\n<!-- /wp:table -->'


def render(bloques):
    out = []
    for b in bloques:
        if isinstance(b, str): out.append(p(b))
        elif "h2" in b: out.append(h2(b["h2"]))
        elif "h3" in b: out.append(h3(b["h3"]))
        elif "ul" in b: out.append(ul(b["ul"]))
        elif "ol" in b: out.append(ol(b["ol"]))
        elif "quote" in b: out.append(quote(b["quote"], b.get("cite", "Equipo de Markedi")))
        elif "tabla" in b: out.append(tabla(b["tabla"]))
        elif "faq" in b:
            out.append(h2("Preguntas frecuentes"))
            for preg, resp in b["faq"]:
                out += [h3(preg), p(resp)]
        else: raise ValueError(f"bloque desconocido: {list(b)}")
    return "\n\n".join(out)


def cta(tema):
    msg = f"Hola, vengo del artículo de {tema} en markedi.ec. Quisiera cotizar un proyecto."
    href = f"https://wa.me/{WA}?text={q(msg)}"
    return "\n\n".join([
        h2("Cotiza tu proyecto con Markedi"),
        p("Fabricamos en nuestro taller de Otavalo y atendemos proyectos en todo el Ecuador. "
          "Cuéntanos qué necesitas, las medidas aproximadas y la ciudad, y te respondemos con "
          "una propuesta. La consulta inicial no tiene costo."),
        '<!-- wp:buttons -->\n<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"vivid-green-cyan"} -->\n'
        f'<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{href}">Cotizar por WhatsApp</a></div>\n'
        '<!-- /wp:button -->\n<!-- wp:button {"className":"is-style-outline"} -->\n'
        '<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://www.markedi.ec/contacto/">Escribir por el formulario</a></div>\n'
        '<!-- /wp:button --></div>\n<!-- /wp:buttons -->',
    ])


def validar(s):
    e = []
    for k in ("n", "slug", "cat", "title", "yoast_title", "yoast_desc", "focus_kw", "excerpt", "wa_tema", "bloques"):
        if k not in s: e.append(f"falta campo {k}")
    if e: return e, 0
    html = render(s["bloques"])
    plano = re.sub(r"<[^>]+>", " ", html)
    bajo = plano.lower()
    pal = len(plano.split())
    if pal < MIN_PAL: e.append(f"{pal} palabras (mínimo {MIN_PAL})")
    for f in PROHIBIDAS:
        if re.search(rf"(?<![\wáéíóúñ]){re.escape(f)}(?![\wáéíóúñ])", bajo): e.append(f"frase prohibida: '{f}'")
    for pat, nom in ((VOSEO, "voseo"), (USTED, "usted")):
        m = set(re.findall(pat, bajo))
        if m: e.append(f"{nom}: {sorted(m)}")
    if len(s["yoast_title"]) > MAX_TITULO: e.append(f"yoast_title {len(s['yoast_title'])} car. (máx {MAX_TITULO})")
    if not META[0] <= len(s["yoast_desc"]) <= META[1]: e.append(f"yoast_desc {len(s['yoast_desc'])} car. ({META[0]}-{META[1]})")
    links = re.findall(r'href="([^"]+)"', html)
    malos = [u for u in links if u not in URLS_OK]
    if malos: e.append(f"enlaces no permitidos: {malos}")
    if len([u for u in links if u in URLS_OK]) < 2: e.append("menos de 2 enlaces internos")
    if len({g for g in GEO if g in bajo}) < 2: e.append("menos de 2 referencias geográficas")
    if "<blockquote" not in html: e.append("sin cita destacada")
    if "<table" not in html: e.append("sin tabla")
    if "<ol" not in html: e.append("sin lista de pasos (ol)")
    if html.count("<h2") < 5: e.append("menos de 5 H2")
    if re.search(r"<h2[^>]*>\s*(conclusi[óo]n|en resumen|beneficios|ventajas)\s*</h2>", html, re.I): e.append("H2 vacío o 'Conclusión'")
    faq = [b for b in s["bloques"] if isinstance(b, dict) and "faq" in b]
    if not faq or len(faq[0]["faq"]) != 4: e.append("FAQ debe tener 4 preguntas")
    if re.search(r"\$\s?\d|\d\s?(usd|dólares)", bajo): e.append("menciona precios en dólares (esta tanda no lleva precios)")
    if s["cat"] not in CATS: e.append(f"categoría {s['cat']} inválida")
    if re.search(r"<cite>(?!Equipo de Markedi)", html): e.append("cita firmada por alguien que no es 'Equipo de Markedi'")
    return e, pal


def main():
    args = [a for a in sys.argv[1:] if not a.startswith("--")]
    solo = "--validar" in sys.argv
    rutas = [os.path.join(AQUI, a) if not os.path.isabs(a) else a for a in args] or sorted(glob.glob(os.path.join(AQUI, "src", "*.json")))
    fallos, specs = 0, []
    for r in rutas:
        s = json.load(open(r, encoding="utf-8"))
        e, pal = validar(s)
        print(f"[{'FAIL' if e else 'OK  '}] {os.path.basename(r)} — {pal} palabras")
        for x in e: print(f"       - {x}")
        fallos += bool(e)
        specs.append(s)
    if fallos or solo:
        print(f"\n{fallos} con problemas" if fallos else "\nValidación OK")
        sys.exit(1 if fallos else 0)
    slugs = [x["slug"] for x in specs]
    assert len(slugs) == len(set(slugs)), "slugs repetidos"
    os.makedirs(os.path.join(AQUI, "posts"), exist_ok=True)
    for i, s in enumerate(sorted(specs, key=lambda x: ORDEN.index(x["n"]))):
        fecha = INICIO + dt.timedelta(days=CADA_DIAS * i)
        payload = {
            "title": s["title"], "slug": s["slug"], "status": "future",
            "date": fecha.strftime("%Y-%m-%dT%H:%M:%S"), "categories": [s["cat"]],
            "tags": s.get("tags", []), "excerpt": s["excerpt"],
            "content": render(s["bloques"]) + "\n\n" + cta(s["wa_tema"]),
            "meta": {"_yoast_wpseo_title": s["yoast_title"], "_yoast_wpseo_metadesc": s["yoast_desc"],
                     "_yoast_wpseo_focuskw": s["focus_kw"]},
        }
        json.dump(payload, open(os.path.join(AQUI, "posts", f"spec-{s['n']:02d}-{s['slug']}.json"), "w", encoding="utf-8"), ensure_ascii=False, indent=1)
        print(f"  {payload['date'][:10]}  {s['slug']}")
    print(f"\n{len(specs)} payloads en posts/")


if __name__ == "__main__":
    main()
