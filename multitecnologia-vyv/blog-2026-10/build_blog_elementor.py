#!/usr/bin/env python3
"""
Arma el blog de Multitecnología VYV en Elementor por REST:

  1. Plantilla «Entrada única» (single-post) para todos los artículos.
  2. Plantilla «Archivo del blog» para categorías y etiquetas de entradas.
  3. Página /blog/ con el listado paginado.
  4. Sección «Guías para tu negocio» al final del home (antes del footer).

  python3 build_blog_elementor.py            # crea o actualiza todo
  python3 build_blog_elementor.py --solo home

Guarda los IDs creados en blog-elementor.json para que una segunda corrida
actualice en vez de duplicar. El home original queda respaldado en
backups/home-8-antes.json antes de tocarlo.
"""
import json, os, random, sys, time
sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
from publish_batch import req  # misma autenticación (.env)

AQUI = os.path.dirname(os.path.abspath(__file__))
ESTADO = os.path.join(AQUI, "blog-elementor.json")
est = json.load(open(ESTADO)) if os.path.exists(ESTADO) else {}

NAVY, CELESTE, TEXTO, BORDE, FONDO = "#0B2447", "#00B8D9", "#334155", "#E5E6F2", "#F7F7F7"
FUENTE = "Outfit"


def uid():
    return "%07x" % random.randrange(16 ** 7)


def tipo(prefijo, size, peso="600", lh=None):
    t = {f"{prefijo}_typography": "custom", f"{prefijo}_font_family": FUENTE,
         f"{prefijo}_font_weight": peso, f"{prefijo}_font_size": {"unit": "px", "size": size}}
    if lh:
        t[f"{prefijo}_line_height"] = {"unit": "em", "size": lh}
    return t


def cont(elements, **s):
    base = {"content_width": "boxed", "flex_direction": "column"}
    base.update(s)
    return {"id": uid(), "elType": "container", "isInner": False, "settings": base, "elements": elements}


def tag(nombre, ajustes="%7B%7D"):
    return f'[elementor-tag id="{uid()}" name="{nombre}" settings="{ajustes}"]'


def w(widget, **s):
    return {"id": uid(), "elType": "widget", "widgetType": widget, "settings": s, "elements": []}


def pad(t, r, b, l):
    return {"unit": "px", "top": str(t), "right": str(r), "bottom": str(b), "left": str(l), "isLinked": False}


# ─── Tarjetas de artículos (widget Posts / Archive posts, skin cards) ────────
def cards(prefijo, cols, por_pagina=None, paginacion=None, extra=None):
    s = {
        "_skin": prefijo + "cards",
        f"{prefijo}cards_columns": str(cols), f"{prefijo}cards_columns_tablet": "2", f"{prefijo}cards_columns_mobile": "1",
        f"{prefijo}cards_thumbnail_size_size": "medium_large",
        f"{prefijo}cards_item_ratio": {"unit": "px", "size": 0.56},
        f"{prefijo}cards_title_tag": "h3",
        f"{prefijo}cards_excerpt_length": 22,
        f"{prefijo}cards_meta_data": ["date"],
        f"{prefijo}cards_read_more_text": "Leer artículo »",
        f"{prefijo}cards_show_badge": "yes",
        f"{prefijo}cards_badge_taxonomy": "category",
        f"{prefijo}cards_show_avatar": "",
        f"{prefijo}cards_column_gap": {"unit": "px", "size": 24},
        f"{prefijo}cards_row_gap": {"unit": "px", "size": 28},
        f"{prefijo}cards_card_border_radius": {"unit": "px", "size": 14},
        f"{prefijo}cards_card_border_color": BORDE,
        f"{prefijo}cards_card_border_width": {"unit": "px", "size": 1},
        f"{prefijo}cards_badge_bg_color": CELESTE,
        f"{prefijo}cards_badge_color": "#FFFFFF",
        f"{prefijo}cards_title_color": NAVY,
        f"{prefijo}cards_read_more_color": CELESTE,
        f"{prefijo}cards_excerpt_color": TEXTO,
    }
    s.update(tipo(f"{prefijo}cards_title_typography", 19, "600", 1.3))
    s.update(tipo(f"{prefijo}cards_excerpt_typography", 15, "400", 1.55))
    s.update(tipo(f"{prefijo}cards_read_more_typography", 14, "600"))
    s.update(tipo(f"{prefijo}cards_badge_typography", 11, "600"))
    if por_pagina:
        s["posts_per_page"] = por_pagina
        s[f"{prefijo}cards_posts_per_page"] = por_pagina
    if paginacion:
        s.update({"pagination_type": paginacion, "pagination_numbers_shorten": "yes",
                  "pagination_prev_label": "« Anteriores", "pagination_next_label": "Siguientes »",
                  "pagination_align": "center", "pagination_spacing_top": {"unit": "px", "size": 36},
                  "pagination_color_active": CELESTE})
    if extra:
        s.update(extra)
    return s


def posts_widget(n, paginacion=None):
    s = cards("", 3, n, paginacion, {"posts_post_type": "post", "posts_orderby": "post_date", "posts_order": "desc"})
    return w("posts", **s)


def encabezado(eyebrow, titulo, bajada):
    return [
        w("heading", title=eyebrow, header_size="p", align="center", title_color=CELESTE,
          **tipo("typography", 13, "600"), typography_text_transform="uppercase",
          typography_letter_spacing={"unit": "px", "size": 1.5}),
        w("heading", title=titulo, header_size="h2", align="center", title_color=NAVY, **tipo("typography", 34, "700", 1.2)),
        w("text-editor", editor=f"<p style=\"text-align:center\">{bajada}</p>", text_color=TEXTO,
          **tipo("typography", 17, "400", 1.6)),
    ]


# ─── 1. Plantilla de entrada única ───────────────────────────────────────────
def single_post():
    cabecera = cont([
        w("post-info", icon_list=[
            {"_id": uid(), "type": "date", "date_format": "default"},
            {"_id": uid(), "type": "terms", "taxonomy": "category", "terms_link": "yes"},
        ], icon_color=CELESTE, text_color=TEXTO, **tipo("icon_typography", 14, "500"), align="center"),
        w("theme-post-title", __dynamic__={"title": tag("post-title")}, header_size="h1", align="center", title_color=NAVY, **tipo("typography", 40, "700", 1.2),
          typography_font_size_mobile={"unit": "px", "size": 29}),
        w("theme-post-excerpt", __dynamic__={"excerpt": tag("post-excerpt")}, align="center", text_color=TEXTO, **tipo("typography", 18, "400", 1.6)),
    ], boxed_width={"unit": "px", "size": 860}, padding=pad(48, 20, 18, 20), flex_gap={"unit": "px", "size": 14, "column": "14", "row": "14"})

    imagen = cont([
        w("theme-post-featured-image", __dynamic__={"image": tag("post-featured-image")}, image_size="large", width={"unit": "%", "size": 100},
          image_border_radius={"unit": "px", "top": "16", "right": "16", "bottom": "16", "left": "16", "isLinked": True},
          height={"unit": "px", "size": 440}, height_mobile={"unit": "px", "size": 220}, object_fit="cover"),
    ], boxed_width={"unit": "px", "size": 1000}, padding=pad(8, 20, 24, 20))

    cuerpo = cont([
        w("theme-post-content", text_color=TEXTO, **tipo("typography", 17, "400", 1.75)),
    ], boxed_width={"unit": "px", "size": 820}, padding=pad(8, 20, 40, 20))

    relacionados = cont(
        [w("heading", title="Sigue leyendo", header_size="h2", align="center", title_color=NAVY, **tipo("typography", 28, "700")),
         w("posts", **cards("", 3, 3, None, {"posts_post_type": "related", "posts_include": ["terms"],
                                              "posts_include_term_ids": [], "posts_related_taxonomies": ["category"],
                                              "posts_related_fallback": "fallback_recent"}))],
        boxed_width={"unit": "px", "size": 1200}, padding=pad(48, 20, 64, 20),
        background_background="classic", background_color=FONDO, content_width="full",
        flex_gap={"unit": "px", "size": 24, "column": "24", "row": "24"})
    return [cabecera, imagen, cuerpo, relacionados]


# ─── 2. Plantilla de archivo (categorías y etiquetas) ────────────────────────
def archivo():
    return [
        cont([w("heading", title="Blog", header_size="p", align="center", title_color=CELESTE, **tipo("typography", 13, "600"),
                typography_text_transform="uppercase"),
              w("theme-archive-title", __dynamic__={"title": tag("archive-title", "%7B%22include_context%22%3A%22%22%7D")}, header_size="h1", align="center", title_color=NAVY, **tipo("typography", 38, "700", 1.2))],
             boxed_width={"unit": "px", "size": 900}, padding=pad(48, 20, 16, 20)),
        cont([w("archive-posts", **cards("archive_", 3, None, "numbers_and_prev_next",
                                         {"archive_cards_meta_data": ["date"], "nothing_found_message": "Todavía no hay artículos en esta sección."}))],
             boxed_width={"unit": "px", "size": 1200}, padding=pad(16, 20, 64, 20)),
    ]


# ─── 3. Página /blog/ ────────────────────────────────────────────────────────
def pagina_blog():
    return [
        cont(encabezado("Blog Multitecnología VYV", "Guías para técnicos y negocios de tecnología",
                        "Repuestos de laptop, componentes, redes y seguridad: cómo elegir bien, qué pedir y cómo comprar al por mayor en Ecuador."),
             boxed_width={"unit": "px", "size": 860}, padding=pad(56, 20, 24, 20), flex_gap={"unit": "px", "size": 10, "column": "10", "row": "10"}),
        cont([posts_widget(12, "numbers_and_prev_next")], boxed_width={"unit": "px", "size": 1200}, padding=pad(16, 20, 64, 20)),
    ]


# ─── 4. Sección del home ─────────────────────────────────────────────────────
def seccion_home():
    return cont(
        encabezado("Blog", "Guías para tu negocio",
                   "Consejos para elegir repuestos, componentes y equipos, y comprar al por mayor con criterio.")
        + [posts_widget(3),
           w("button", text="Ver todos los artículos", link={"url": "/blog/", "is_external": "", "nofollow": ""},
             align="center", background_color=NAVY, button_text_color="#FFFFFF", hover_color="#FFFFFF",
             button_background_hover_color=CELESTE, **tipo("typography", 15, "600"),
             border_radius={"unit": "px", "top": "10", "right": "10", "bottom": "10", "left": "10", "isLinked": True},
             text_padding=pad(14, 28, 14, 28))],
        content_width="boxed", boxed_width={"unit": "px", "size": 1200},
        padding=pad(64, 20, 64, 20), background_background="classic", background_color=FONDO,
        flex_gap={"unit": "px", "size": 18, "column": "18", "row": "18"}, _element_id="blog-home",
        _title="CW Blog — últimos artículos")


# ─── Escritura ───────────────────────────────────────────────────────────────
def guardar_meta(ruta, meta):
    # De a una: enviadas juntas dieron 403 en otro sitio.
    for k, v in meta.items():
        for intento in range(4):
            try:
                req(ruta, "POST", {"meta": {k: v}})
                break
            except Exception as ex:  # el hosting da 504 aunque guarde
                print(f"    reintento {k}: {ex}")
                time.sleep(20)


def plantilla(clave, titulo, tipo_tpl, datos, condiciones):
    if clave in est:
        tid = est[clave]
    else:
        tid = req("/wp/v2/elementor_library", "POST", {"title": titulo, "status": "publish"})["id"]
        est[clave] = tid
        json.dump(est, open(ESTADO, "w"), indent=1)
    guardar_meta(f"/wp/v2/elementor_library/{tid}", {
        "_elementor_edit_mode": "builder",
        "_elementor_template_type": tipo_tpl,
        "_elementor_data": json.dumps(datos, ensure_ascii=False),
    })
    # Las condiciones van por el endpoint del Site Editor: así Elementor regenera
    # su caché de condiciones (escribir solo el meta no aplica la plantilla).
    req(f"/elementor/v1/site-editor/templates-conditions/{tid}", "PUT", {"conditions": [
        dict(zip(("type", "name", "sub_name"), c.split("/")), sub_id="") | ({"sub_name": ""} if c.count("/") == 1 else {})
        for c in condiciones]})
    print(f"  {titulo}: id={tid}")
    return tid


def main():
    solo = sys.argv[sys.argv.index("--solo") + 1] if "--solo" in sys.argv else None

    if solo in (None, "single"):
        plantilla("single", "Blog — Entrada única", "single-post", single_post(), ["include/singular/post"])
    if solo in (None, "archivo"):
        plantilla("archivo", "Blog — Archivo de categorías", "archive", archivo(),
                  ["include/archive/category", "include/archive/post_tag"])

    if solo in (None, "blog"):
        if "pagina_blog" not in est:
            existente = req("/wp/v2/pages?slug=blog&status=publish,draft&_fields=id")
            pid = existente[0]["id"] if existente else req("/wp/v2/pages", "POST", {
                "title": "Blog", "slug": "blog", "status": "publish", "template": "elementor_header_footer"})["id"]
            est["pagina_blog"] = pid
            json.dump(est, open(ESTADO, "w"), indent=1)
        pid = est["pagina_blog"]
        req(f"/wp/v2/pages/{pid}", "POST", {"template": "elementor_header_footer"})
        guardar_meta(f"/wp/v2/pages/{pid}", {"_elementor_edit_mode": "builder", "_elementor_template_type": "wp-page",
                                             "_elementor_data": json.dumps(pagina_blog(), ensure_ascii=False)})
        print(f"  Página Blog: id={pid}")

    if solo in (None, "home"):
        os.makedirs(os.path.join(AQUI, "backups"), exist_ok=True)
        actual = req("/wp/v2/pages/8?context=edit&_fields=meta")["meta"]["_elementor_data"]
        respaldo = os.path.join(AQUI, "backups", "home-8-antes.json")
        if not os.path.exists(respaldo):
            open(respaldo, "w").write(actual)
        datos = [e for e in json.loads(actual) if e.get("settings", {}).get("_element_id") != "blog-home"]
        datos.append(seccion_home())
        guardar_meta("/wp/v2/pages/8", {"_elementor_data": json.dumps(datos, ensure_ascii=False)})
        print("  Home: sección de blog agregada al final")

    req("/elementor/v1/cache", "DELETE")
    print("  Caché de Elementor regenerada")


if __name__ == "__main__":
    main()
