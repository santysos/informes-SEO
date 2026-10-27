#!/usr/bin/env python3
"""
Publica la tanda de artículos de Multitecnología VYV desde specs/*.json.

Por artículo: imagen destacada e imagen interna de Pexels (WebP), tarjetas de
productos reales de la tienda, dos CTA (WhatsApp + cuenta comercial) con
data-cta para la medición en GA4, FAQ con schema FAQPage. Fechas escalonadas.

  python3 -u publish_batch.py --dry-run     # arma el HTML en out/ sin publicar
  python3 -u publish_batch.py               # publica (salta los slugs que ya existen)
  python3 -u publish_batch.py --solo 1      # publica solo el artículo n=1

Credenciales: .env del repo (MVYV_WP_*). La clave de Pexels va en PEXELS_API_KEY
del .env. Nada de eso se commitea.
"""
import base64, datetime as dt, glob, html, json, os, re, subprocess, sys, time
import urllib.parse, urllib.request, urllib.error

AQUI = os.path.dirname(os.path.abspath(__file__))
REPO = os.path.abspath(os.path.join(AQUI, "..", ".."))
ENV = {}
for l in open(os.path.join(REPO, ".env")):
    m = re.match(r"^([A-Z0-9_]+)=(.*)$", l.strip())
    if m:
        ENV[m[1]] = m[2].strip().strip("\"'")

ROOT = "https://multitecnologiavyv.com/wp-json"
AUTH = "Basic " + base64.b64encode(f"{ENV['MVYV_WP_USER']}:{ENV['MVYV_WP_APP_PASS']}".encode()).decode()
UA = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/141 Safari/537.36"
PEXELS = ENV.get("PEXELS_API_KEY", "")

WA = "593984072123"
REGISTRO = "https://multitecnologiavyv.com/registro-clientes-b2b/"
PRODUCTOS = json.load(open(os.path.join(AQUI, "productos.json")))
POR_ID = {p["id"]: p for p in PRODUCTOS}

# Calendario: 20 artículos entre el 26-oct y el 22-nov, siempre a las 08:00 Ecuador (13:00 UTC)
INICIO = dt.datetime(2026, 10, 26, 13, 0)
DIAS = 27

AZUL, NAVY, VERDE = "#0EA5E9", "#0F172A", "#25D366"

TMP = os.path.join(AQUI, "out")
os.makedirs(TMP, exist_ok=True)
LOG = os.path.join(AQUI, "publicados.json")


# ─── HTTP ────────────────────────────────────────────────────────────────────
def req(path, method="GET", data=None, raw=None, ctype=None, extra=None, full=False):
    # Lecturas y actualizaciones (/recurso/{id}) se reintentan: el hosting da 503/504
    # o corta la lectura bajo carga. Las creaciones NO, para no duplicar.
    idempotente = method == "GET" or re.search(r"/\d+(\?|$)", path)
    for intento in range(4):
        try:
            return _req(path, method, data, raw, ctype, extra, full)
        except (urllib.error.HTTPError, TimeoutError, urllib.error.URLError) as ex:
            codigo = getattr(ex, "code", 0)
            if not idempotente or (codigo and codigo < 500) or intento == 3:
                raise
            time.sleep(20 * (intento + 1))


def _req(path, method="GET", data=None, raw=None, ctype=None, extra=None, full=False):
    url = path if path.startswith("http") else ROOT + path
    h = {"Authorization": AUTH, "User-Agent": UA}
    if extra:
        h.update(extra)
    body = None
    if data is not None:
        body = json.dumps(data).encode()
        h["Content-Type"] = "application/json"
    if raw is not None:
        body, h["Content-Type"] = raw, ctype
    r = urllib.request.urlopen(urllib.request.Request(url, data=body, headers=h, method=method), timeout=180)
    d = r.read()
    j = json.loads(d) if d else None
    return (j, r.headers) if full else j


def slug_existe(slug):
    # status=any no devuelve los programados: se pide cada estado por nombre.
    for st in ("publish", "future", "draft", "pending", "private"):
        r = req(f"/wp/v2/posts?slug={slug}&status={st}&_fields=id,status,link")
        if r:
            return r[0]
    return None


# ─── Taxonomías ──────────────────────────────────────────────────────────────
_CACHE = {}


def termino(tax, nombre):
    key = (tax, nombre.lower())
    if key in _CACHE:
        return _CACHE[key]
    r = req(f"/wp/v2/{tax}?search={urllib.parse.quote(nombre)}&per_page=100&_fields=id,name")
    for t in r:
        if html.unescape(t["name"]).lower() == nombre.lower():
            _CACHE[key] = t["id"]
            return t["id"]
    t = req(f"/wp/v2/{tax}", "POST", {"name": nombre})
    _CACHE[key] = t["id"]
    return t["id"]


# ─── Imágenes ────────────────────────────────────────────────────────────────
USADAS = set()


def pexels(query, orient="landscape"):
    u = "https://api.pexels.com/v1/search?" + urllib.parse.urlencode(
        {"query": query, "per_page": 15, "orientation": orient})
    r = json.load(urllib.request.urlopen(urllib.request.Request(u, headers={"Authorization": PEXELS, "User-Agent": UA}), timeout=60))
    for f in r.get("photos", []):
        if f["id"] not in USADAS:
            USADAS.add(f["id"])
            return f
    raise RuntimeError(f"Pexels sin resultados para: {query}")


def subir_imagen(foto, nombre, alt, ancho):
    src = foto["src"]["original"] + f"?auto=compress&cs=tinysrgb&w={ancho}"
    jpg = os.path.join(TMP, nombre + ".jpg")
    webp = os.path.join(TMP, nombre + ".webp")
    with open(jpg, "wb") as f:
        f.write(urllib.request.urlopen(urllib.request.Request(src, headers={"User-Agent": UA}), timeout=120).read())
    subprocess.run(["cwebp", "-quiet", "-q", "80", jpg, "-o", webp], check=True)
    m = req("/wp/v2/media", "POST", raw=open(webp, "rb").read(), ctype="image/webp",
            extra={"Content-Disposition": f'attachment; filename="{nombre}.webp"'})
    req(f"/wp/v2/media/{m['id']}", "POST", {
        "alt_text": alt, "title": alt,
        "caption": f"Foto: {foto['photographer']} / Pexels",
    })
    return m["id"], m["source_url"]


# ─── HTML ────────────────────────────────────────────────────────────────────
def bloque(h):
    return "<!-- wp:html -->\n" + h + "\n<!-- /wp:html -->\n\n"


def wa_link(texto):
    return f"https://wa.me/{WA}?text=" + urllib.parse.quote(texto)


def cta(c, donde):
    t = html.escape(c["title"]); p = html.escape(c["text"])
    btn = ("display:inline-block;padding:12px 22px;border-radius:10px;font-weight:600;"
           "text-decoration:none;margin:6px 8px 0 0;font-size:15px")
    return bloque(
        f'<div style="background:{NAVY};color:#fff;border-radius:16px;padding:26px 26px 22px;margin:34px 0">'
        f'<p style="margin:0 0 6px;font-size:20px;font-weight:700;color:#fff">{t}</p>'
        f'<p style="margin:0 0 14px;color:#CBD5E1;line-height:1.55">{p}</p>'
        f'<a href="{wa_link(c["wa_text"])}" target="_blank" rel="noopener" data-cta="blog-{donde}" '
        f'style="{btn};background:{VERDE};color:#fff">Escríbenos por WhatsApp</a>'
        f'<a href="{REGISTRO}" data-cta="blog-{donde}-cuenta" '
        f'style="{btn};background:transparent;color:#fff;border:1px solid {AZUL}">Crear cuenta comercial</a>'
        f'</div>')


def productos(ids):
    cards = []
    for i in ids:
        p = POR_ID[i]
        nombre = html.escape(p["name"])
        cards.append(
            f'<a href="{p["url"]}" data-cta="blog-producto" style="display:block;'
            f'border:1px solid #E2E8F0;border-radius:14px;padding:14px;text-decoration:none;color:{NAVY};background:#fff">'
            f'<img src="{p["img"]}" alt="{nombre}" loading="lazy" style="width:100%;aspect-ratio:1/1;object-fit:contain;'
            f'background:#F8FAFC;border-radius:10px;margin:0 0 10px">'
            f'<span style="display:block;font-size:14px;line-height:1.4;font-weight:600">{nombre}</span>'
            f'<span style="display:block;margin-top:8px;font-size:13px;color:{AZUL};font-weight:600">Ver producto →</span></a>')
    return bloque(
        f'<div style="margin:36px 0">'
        f'<h2>Productos relacionados en nuestra tienda</h2>'
        f'<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(165px,1fr));gap:14px">{"".join(cards)}</div>'
        f'<p style="font-size:14px;color:#64748B;margin-top:12px">Los precios de distribuidor se ven al iniciar sesión '
        f'con tu <a href="{REGISTRO}" data-cta="blog-productos-cuenta">cuenta comercial</a>.</p></div>')


def figura(url, alt):
    return bloque(
        f'<figure style="margin:30px 0"><img src="{url}" alt="{html.escape(alt)}" loading="lazy" '
        f'style="width:100%;height:auto;max-height:440px;object-fit:cover;border-radius:14px"></figure>')


def faq(items):
    h = "<h2>Preguntas frecuentes</h2>\n"
    for q in items:
        h += f"<h3>{html.escape(q['q'])}</h3>\n<p>{q['a']}</p>\n"
    ld = {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [
        {"@type": "Question", "name": q["q"],
         "acceptedAnswer": {"@type": "Answer", "text": re.sub(r"<[^>]+>", "", q["a"])}} for q in items]}
    return h + "\n" + bloque('<script type="application/ld+json">' + json.dumps(ld, ensure_ascii=False) + "</script>")


def armar(s, inline_url):
    out = s["intro_html"] + "\n\n"
    secs = s["sections"]
    mid = max(2, len(secs) // 2)
    for i, sec in enumerate(secs, 1):
        out += f"<h2>{html.escape(sec['h2'])}</h2>\n{sec['html']}\n\n"
        if inline_url and i == s["inline_image"].get("after_section", 1):
            out += figura(inline_url, s["inline_image"]["alt"])
        if i == mid:
            out += cta(s["cta_mid"], "medio")
    out += productos(s["products"])
    out += faq(s["faq"])
    out += cta(s["cta_end"], "final")
    return out


# ─── Validación ──────────────────────────────────────────────────────────────
PERMITIDAS = {"p", "ul", "ol", "li", "strong", "em", "h3", "a", "table", "thead", "tbody", "tr", "th", "td", "br"}


def validar(s):
    err = []
    if len(s["title"]) > 65:
        err.append(f"title {len(s['title'])} car.")
    if len(s.get("meta_desc", "")) > 160:
        err.append("meta_desc larga")
    for i in s["products"]:
        if i not in POR_ID:
            err.append(f"producto {i} no existe")
    texto = s["intro_html"] + "".join(x["html"] for x in s["sections"])
    for tag in set(re.findall(r"<\s*([a-z0-9]+)", texto)):
        if tag not in PERMITIDAS:
            err.append(f"etiqueta <{tag}>")
    if re.search(r"\bstyle=|\bclass=", texto):
        err.append("style/class en el texto")
    if re.search(r"\$\s?\d", texto + json.dumps(s["faq"], ensure_ascii=False)):
        err.append("precio en dólares")
    for u in re.findall(r'href="([^"]+)"', texto):
        if "multitecnologiavyv.com" not in u:
            err.append(f"enlace externo {u}")
    return err


# ─── Main ────────────────────────────────────────────────────────────────────
def rearmar():
    """Vuelve a generar el HTML de los ya publicados (tras cambiar el diseño), sin tocar imágenes."""
    log = json.load(open(LOG))
    specs = {json.load(open(f))["n"]: json.load(open(f)) for f in glob.glob(os.path.join(AQUI, "specs", "*.json"))}
    for n, info in sorted(log.items(), key=lambda x: int(x[0])):
        raw = req(f"/wp/v2/posts/{info['id']}?context=edit&_fields=content")["content"]["raw"]
        m = re.search(r'<figure[^>]*><img src="([^"]+)"', raw)
        for intento in range(3):
            try:
                req(f"/wp/v2/posts/{info['id']}", "POST", {"content": armar(specs[int(n)], m.group(1) if m else None)})
                print(f"[{n}] rearmado")
                break
            except urllib.error.HTTPError as ex:
                print(f"[{n}] reintento ({ex.code})")
                time.sleep(20)


def main():
    if "--rearmar" in sys.argv:
        return rearmar()
    dry = "--dry-run" in sys.argv
    solo = int(sys.argv[sys.argv.index("--solo") + 1]) if "--solo" in sys.argv else None
    specs = sorted((json.load(open(f)) for f in glob.glob(os.path.join(AQUI, "specs", "*.json"))), key=lambda s: s["n"])
    log = json.load(open(LOG)) if os.path.exists(LOG) else {}
    ahora = dt.datetime.now(dt.timezone.utc).replace(tzinfo=None)

    for idx, s in enumerate(specs):
        if solo and s["n"] != solo:
            continue
        e = validar(s)
        if e:
            print(f"[{s['n']}] ✗ {s['slug']}: {e}")
            continue
        fecha = INICIO + dt.timedelta(days=round(idx * DIAS / max(1, len(specs) - 1)))
        if dry:
            open(os.path.join(TMP, s["slug"] + ".html"), "w").write(armar(s, "https://via.placeholder.com/1200x630"))
            print(f"[{s['n']}] ok {fecha:%d-%b %H:%M}Z {s['title']}")
            continue

        ya = slug_existe(s["slug"])
        if ya:
            print(f"[{s['n']}] ya existe ({ya['status']}) {ya['link']}")
            continue

        fd = pexels(s["featured"]["pexels_query"])
        fid, _ = subir_imagen(fd, s["slug"], s["featured"]["alt"], 1200)
        fi = pexels(s["inline_image"]["pexels_query"])
        _, iurl = subir_imagen(fi, s["slug"] + "-2", s["inline_image"]["alt"], 1100)

        body = {
            "title": s["title"], "slug": s["slug"], "excerpt": s["excerpt"],
            "content": armar(s, iurl),
            "status": "publish" if fecha <= ahora else "future",
            "date_gmt": fecha.strftime("%Y-%m-%dT%H:%M:%S"),
            "featured_media": fid,
            "categories": [termino("categories", s["category"])],
            "tags": [termino("tags", t) for t in s["tags"]],
            "comment_status": "closed",
        }
        # Al crear, este sitio descarta categorías, etiquetas, imagen destacada y metas
        # (verificado 2026-10-26); en una actualización sí se guardan.
        segundo = {k: body.pop(k) for k in ("categories", "tags", "featured_media")}
        segundo["meta"] = {"_yoast_wpseo_metadesc": s["meta_desc"], "_yoast_wpseo_focuskw": s["focus_kw"]}
        try:
            p = req("/wp/v2/posts", "POST", body)
        except (urllib.error.URLError, TimeoutError) as ex:
            # Un POST cortado puede haberse creado igual: buscar antes de reintentar.
            time.sleep(20)
            p = slug_existe(s["slug"])
            if not p:
                print(f"[{s['n']}] ✗ error {ex}")
                continue
        for intento in range(3):
            try:
                p = req(f"/wp/v2/posts/{p['id']}", "POST", segundo)
                break
            except Exception as ex:   # el hosting da 504 o corta la lectura aunque guarde
                print(f"[{s['n']}] reintento actualización ({ex})")
                time.sleep(25)
                p = req(f"/wp/v2/posts/{p['id']}?context=edit")
        if not p["categories"] or p["featured_media"] != fid:
            print(f"[{s['n']}] ⚠ no se guardó categoría o imagen en id={p['id']}")
        log[str(s["n"])] = {"id": p["id"], "slug": s["slug"], "status": p["status"], "link": p["link"],
                            "fecha_utc": fecha.isoformat(), "featured": fid}
        json.dump(log, open(LOG, "w"), ensure_ascii=False, indent=1)
        print(f"[{s['n']}] ✓ {p['status']} {fecha:%d-%b} id={p['id']} {p['link']}")
        time.sleep(4)


if __name__ == "__main__":
    main()
