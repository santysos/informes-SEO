#!/usr/bin/env python3
"""Convierte los 102 posts educativos de La Casa del Bandolín en páginas que venden (2026-10-06).

Por cada post detecta el instrumento del que habla y le agrega dos bloques HTML medidos:
- post-medio (antes de la 2.ª sección): 3 instrumentos reales con stock (foto, nombre,
  «Ver precio y disponibilidad») + botón de WhatsApp con mensaje propio del post.
- post-final (al cierre): asesoría por WhatsApp + enlace a la categoría del instrumento.

Sin precios en el texto (cambian en la tienda y quedarían desactualizados).
Idempotente: si el post ya tiene el marcador, lo reemplaza. Respaldo en antes/.

    python3 ctas_posts.py              # simulación: muestra instrumento y productos por post
    python3 ctas_posts.py --ya [ids]   # aplica (todos o los ids indicados)
"""
import base64, html, json, os, re, sys, time, urllib.error, urllib.parse, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env")) if l.startswith("BANDOLIN") and "=" in l)
H = {"Authorization": "Basic " + base64.b64encode(f"{env['BANDOLIN_WP_USER']}:{env['BANDOLIN_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}
API = "https://www.lacasadelbandolin.com/wp-json/wp/v2"
WA = "593980788561"
MARCA = "cw-cta-ventas-v1"

catalogo = [p for p in json.load(open(os.path.join(AQUI, "catalogo.json"))) if p["stock"]]
for p in catalogo:
    p["name"] = html.unescape(p["name"]).replace("  ", " ").strip()
cats = json.load(open(os.path.join(AQUI, "categorias.json")))
vendidos = json.load(open(os.path.join(AQUI, "vendidos.json")))
posts = json.load(open(os.path.join(AQUI, "posts.json")))

# (instrumento, regex en título/slug, filtro de productos, categoría, plural para textos)
REGLAS = [
    ("ronroco",   r"ronroco",                       lambda p: "Charangos" in p["cats"],                         "Charangos", "charangos"),
    ("requinto",  r"requinto",                      lambda p: "Requintos" in p["cats"],                         "Requintos", "requintos"),
    ("charango",  r"charango",                      lambda p: "Charangos" in p["cats"],                         "Charangos", "charangos"),
    ("mandolina", r"mandolin",                      lambda p: p["cats"][:1] in (["Mandolinas"], ["Bandolines"]), "Mandolinas", "mandolinas y bandolines"),
    ("bandolín",  r"bandol[ií]n",                   lambda p: "Bandolines" in p["cats"],                        "Bandolines", "bandolines"),
    ("zampoña",   r"zampo|antara|siku|zanca|flauta[- ]de[- ]pan|baj[oó]n", lambda p: re.search(r"zampo|antara|siku|zanca|flauta de pan|basto", p["name"], re.I), "Vientos", "zampoñas"),
    ("quena",     r"quen",                          lambda p: re.search(r"quen", p["name"], re.I),              "Vientos", "quenas"),
    ("rondador",  r"rondador",                      lambda p: re.search(r"rondador|siku|zampo", p["name"], re.I), "Vientos", "rondadores y zampoñas"),
    ("rondín",    r"rond[ií]n|arm[oó]nica",         lambda p: "Armónicas" in p["cats"],                         "Armónicas", "rondines"),
    ("flauta",    r"flauta",                        lambda p: re.search(r"flauta|quen", p["name"], re.I),        "Vientos", "flautas andinas"),
    ("guitarra",  r"guitarra",                      lambda p: "Guitarras" in p["cats"],                         "Guitarras", "guitarras"),
    ("violín",    r"viol[ií]n",                     lambda p: "Violines" in p["cats"] or "Bandolines" in p["cats"], "Violines", "violines"),
    ("percusión", r"bombo|percusi|chajcha|palo[- ]de[- ]lluvia|wankara", lambda p: "Percusión" in p["cats"] or re.search(r"chajcha|palo de lluvia", p["name"], re.I), "Percusión", "instrumentos de percusión"),
    ("cuerdas",   r"cuerda|accesori|afina",         lambda p: re.search(r"cuerdas|estuche", p["name"], re.I),   "Accesorios", "cuerdas y accesorios"),
]
GENERAL = ("andinos", lambda p: re.search(r"flauta de pan|sarawi|charango modelo: tupak|zampo.a completa|bandol.n campos modelo: runa", p["name"], re.I), "Vientos", "instrumentos andinos")


def instrumento(post):
    t = (post["title"] + " " + post["slug"]).lower()
    for nom, rx, filtro, cat, plural in REGLAS:
        if re.search(rx, t):
            return nom, filtro, cat, plural
    return GENERAL[0], GENERAL[1], None, GENERAL[3]


def elegir(filtro, semilla=0):
    """El más vendido del instrumento + 2 que rotan por post entre el resto (más productos enlazados)."""
    cands = [p for p in catalogo if filtro(p) and p["img"]]
    if not cands:
        return []
    porventa = sorted(cands, key=lambda p: (-vendidos.get(p["name"], 0), p["price"]))
    fijo = porventa[0]
    resto = sorted([p for p in cands if p["id"] != fijo["id"]], key=lambda p: p["price"])
    if not resto:
        return [fijo]
    k = semilla % len(resto)
    otros = []
    for i in range(len(resto)):
        p = resto[(k + i * max(1, len(resto) // 2)) % len(resto)]
        if p["id"] not in [o["id"] for o in otros]:
            otros.append(p)
        if len(otros) == 2:
            break
    return [fijo] + otros


def wa(texto):
    return f"https://wa.me/{WA}?text=" + urllib.parse.quote(texto)


def bloque_medio(post, inst, plural, prods):
    tema = html.escape(post["title"])
    tarjetas = "".join(f"""
  <a class="cw-prod" href="{p['link']}" data-producto="{html.escape(p['name'])}">
    <img src="{p['img']}" alt="{html.escape(p['name'])}" loading="lazy" width="300" height="300">
    <span class="cw-prod__n">{html.escape(p['name'])}</span>
    <span class="cw-prod__v">Ver precio y disponibilidad →</span>
  </a>""" for p in prods)
    msg = f"Hola, leí «{post['title']}» en lacasadelbandolin.com y quiero asesoría para comprar {('un ' + inst) if inst not in ('andinos', 'cuerdas', 'percusión') else 'un instrumento'}."
    return f"""<!-- wp:html -->
<!-- {MARCA}:medio -->
<div class="cw-cta" data-ubicacion="post-medio" style="margin:2.2em 0;padding:22px;border:1px solid #e6d6b8;border-radius:14px;background:#fbf6ec">
<p style="margin:0 0 4px;font-size:13px;letter-spacing:.08em;text-transform:uppercase;color:#a81326;font-weight:700">Disponibles en La Casa del Bandolín</p>
<p style="margin:0 0 16px;font-size:20px;font-weight:700;line-height:1.3">¿Quieres tocar lo que estás leyendo? Estos son algunos de nuestros {plural}</p>
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:14px">{tarjetas}
</div>
<p style="margin:18px 0 0"><a href="{wa(msg)}" target="_blank" rel="noopener" style="display:inline-block;background:#25d366;color:#fff;font-weight:700;padding:12px 20px;border-radius:999px;text-decoration:none">Te asesoramos por WhatsApp</a></p>
</div>
<style>.cw-prod{{display:flex;flex-direction:column;gap:6px;text-decoration:none;color:#222;background:#fff;border-radius:10px;padding:10px;border:1px solid #eee}}.cw-prod img{{width:100%;height:auto;aspect-ratio:1/1;object-fit:cover;border-radius:8px}}.cw-prod__n{{font-weight:600;font-size:14px;line-height:1.3}}.cw-prod__v{{font-size:13px;color:#a81326;font-weight:600}}.cw-prod:hover{{border-color:#a81326}}</style>
<!-- /{MARCA}:medio -->
<!-- /wp:html -->

"""


def bloque_final(post, inst, cat, plural):
    msg = f"Hola, vengo del artículo «{post['title']}» en lacasadelbandolin.com. ¿Me ayudan a elegir {('un ' + inst) if inst not in ('andinos', 'cuerdas', 'percusión') else 'un instrumento'} según mi nivel y presupuesto?"
    cat_url = cats.get(cat) or "https://www.lacasadelbandolin.com/tienda/"
    ver = f"Ver todos los {plural}" if cat else "Ver la tienda"
    return f"""

<!-- wp:html -->
<!-- {MARCA}:final -->
<div class="cw-cta" data-ubicacion="post-final" style="margin:2.5em 0 1em;padding:24px;border-radius:14px;background:#1d1d1d;color:#fff">
<p style="margin:0 0 8px;font-size:22px;font-weight:700;line-height:1.3;color:#fff">¿Te ayudamos a elegir tu instrumento?</p>
<p style="margin:0 0 18px;color:#e8e8e8">Cuéntanos tu nivel, para qué lo quieres y tu presupuesto, y te recomendamos el modelo indicado. Tienda en Otavalo, con envíos a todo el Ecuador y al exterior.</p>
<p style="margin:0;display:flex;flex-wrap:wrap;gap:10px">
<a href="{wa(msg)}" target="_blank" rel="noopener" style="display:inline-block;background:#25d366;color:#fff;font-weight:700;padding:12px 20px;border-radius:999px;text-decoration:none">Escríbenos por WhatsApp</a>
<a href="{cat_url}" style="display:inline-block;border:2px solid #fff;color:#fff;font-weight:700;padding:10px 20px;border-radius:999px;text-decoration:none">{ver}</a>
</p>
</div>
<!-- /{MARCA}:final -->
<!-- /wp:html -->
"""


def quitar_previos(c):
    return re.sub(r"\n*<!-- wp:html -->\s*<!-- %s:(medio|final) -->.*?<!-- /%s:\1 -->\s*<!-- /wp:html -->\n*" % (MARCA, MARCA), "\n\n", c, flags=re.S)


def insertar(c, medio, final):
    c = quitar_previos(c).rstrip()
    h2 = [m.start() for m in re.finditer(r"<!-- wp:heading(?: \{[^}]*\})? -->\s*<h2", c)]
    if len(h2) >= 2:
        pos = h2[1]
    else:
        ps = [m.end() for m in re.finditer(r"<!-- /wp:paragraph -->", c)]
        pos = ps[max(0, len(ps) * 2 // 5 - 1)] if ps else len(c)
    return c[:pos].rstrip() + "\n\n" + medio + c[pos:].lstrip() + final


def call(m, p, b=None):
    for i in range(3):
        try:
            return json.load(urllib.request.urlopen(urllib.request.Request(API + p, headers=H, method=m, data=json.dumps(b).encode() if b else None), timeout=120))
        except urllib.error.HTTPError as e:
            if e.code in (429, 500, 502, 503, 504):
                time.sleep(20); continue
            raise
        except Exception:
            time.sleep(20)
    raise RuntimeError(p)


def main():
    ya = "--ya" in sys.argv
    ids = {int(x) for x in sys.argv[1:] if x.isdigit()}
    resumen = []
    for post in posts:
        if ids and post["id"] not in ids:
            continue
        inst, filtro, cat, plural = instrumento(post)
        prods = elegir(filtro, post['id'] // 2)
        resumen.append((post["id"], inst, [p["name"][:28] for p in prods]))
        if not ya:
            continue
        actual = call("GET", f"/posts/{post['id']}?context=edit&_fields=content")["content"]["raw"]
        nuevo = insertar(actual, bloque_medio(post, inst, plural, prods), bloque_final(post, inst, cat, plural))
        r = call("POST", f"/posts/{post['id']}", {"content": nuevo})
        ok = r["content"]["raw"].count(MARCA) == 4
        print(f"{post['id']} {inst:9} {'OK' if ok else 'REVISAR'} {post['title'][:60]}")
        time.sleep(2)
    if not ya:
        from collections import Counter
        print(Counter(r[1] for r in resumen))
        for r in resumen:
            print(f"{r[0]:>5} {r[1]:9} {r[2]}")


if __name__ == "__main__":
    main()
