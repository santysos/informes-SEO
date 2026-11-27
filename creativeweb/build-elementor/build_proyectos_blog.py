#!/usr/bin/env python3
"""Página /proyectos/ (nueva, publicada) + rediseño de /blog/ (1893, con respaldo).
Blog separado: guías y tutoriales (cat 46) vs artículos y noticias (resto)."""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import HTM, BTNP, CA, header, footer, hero_sub, cta_mini, JS

BLOG_ID = 1893
CAT_TUTORIALES = 46


def proyecto(nombre, url_txt, grad, desc, tags, url):
    tags_html = "".join(f"<span>{t}</span>" for t in tags)
    p = CA([
        C([HTM(f'''<div class="cw-navegador">
          <div class="barra"><i></i><i></i><i></i><span class="url">{url_txt}</span></div>
          <div class="cuerpo"><span class="nl t"></span><span class="nl c50"></span><span class="nl c35"></span><span class="nl btn" style="background:#0070C0"></span></div>
        </div>''')], cls=f"cw-proy-visual {grad}", content_width="full", flex_direction="column",
           flex_justify_content="center", flex_align_items="center"),
        C([
            C([H(nombre, "h3"), T(f"<p>{desc}</p>", cls="cw-proy-desc")],
              content_width="full", flex_direction="column",
              flex_gap={"column": "6", "row": "6", "isLinked": True, "unit": "px", "size": 6}),
            HTM(f'<div class="cw-tags">{tags_html}</div>'),
        ], cls="cw-proy-meta", content_width="full", flex_direction="row",
           flex_justify_content="space-between",
           flex_gap={"column": "18", "row": "10", "isLinked": False, "unit": "px", "size": 18}),
    ], url, externo=True, cls="cw-proyecto cw-rev", content_width="full")
    p["settings"]["width"] = {"unit": "%", "size": 46}
    p["settings"]["width_mobile"] = {"unit": "%", "size": 100}
    p["settings"]["width_tablet"] = {"unit": "%", "size": 100}
    return p


PROYECTOS = [
    ("Comercial Hidrobo", "comercialhidrobo.com", "cw-grad-azul",
     "27.069 visitantes y 8.952 visitas desde Google en 5 meses para el concesionario más grande del norte.",
     ["WEB", "SEO"], "https://comercialhidrobo.com"),
    ("Quipuy", "quipuy.com", "cw-grad-cian",
     "Nuestro sistema de facturación electrónica: miles de facturas emitidas cada mes, sin instalar nada.",
     ["PRODUCTO", "FACTURACIÓN"], "https://quipuy.com"),
    ("Valencia Sports", "valencia-sports.com", "cw-grad-teal",
     "Tienda en línea de artículos deportivos con 150 productos y pedidos directo al WhatsApp.",
     ["TIENDA EN LÍNEA"], "https://www.valencia-sports.com"),
    ("Reina de Otavalo", "reinadeotavalo.com", "cw-grad-gris",
     "Rediseño completo por los 74 años de la organización: marca, página web y toda su presencia digital.",
     ["WEB", "MARCA"], "https://www.reinadeotavalo.com"),
    ("OKCars", "okcars.ec", "cw-grad-azul",
     "Seminuevos de Comercial Hidrobo: contenido y posicionamiento que llevan compradores a las fichas.",
     ["SEO", "CONTENIDO"], "https://okcars.ec"),
    ("Boxpli", "boxpli.com", "cw-grad-teal",
     "Nuestra plataforma de envíos: despachos de tienda en línea de 20 minutos a 2 por pedido.",
     ["PRODUCTO", "AUTOMATIZACIÓN"], "https://boxpli.com"),
]

proyectos_pg = [
    header(),
    hero_sub("portafolio", 'proyectos reales,<span class="l2">resultados medibles</span>'),
    C([
        C([proyecto(*p) for p in PROYECTOS],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_justify_content="space-between",
          flex_gap={"column": "56", "row": "70", "isLinked": False, "unit": "px", "size": 56}),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(80, 24, 90, 24)),
    cta_mini(),
    footer(),
]


def posts_widget(incluir=None, excluir=None, cantidad=6, paginar=False):
    s = dict(
        _skin="classic",
        classic_columns="3", classic_columns_tablet="2", classic_columns_mobile="1",
        classic_posts_per_page=cantidad,
        classic_thumbnail_size="large",
        classic_item_ratio={"unit": "px", "size": 0.62, "sizes": []},
        classic_meta_data=["date"],
        classic_excerpt_length=16,
        classic_show_read_more="yes",
        classic_read_more_text="Leer más →",
        classic_row_gap={"unit": "px", "size": 28, "sizes": []},
        classic_column_gap={"unit": "px", "size": 28, "sizes": []},
        posts_post_type="post",
    )
    if incluir:
        s["posts_include"] = ["terms"]
        s["posts_include_term_ids"] = [str(incluir)]
    if excluir:
        s["posts_exclude"] = ["terms"]
        s["posts_exclude_term_ids"] = [str(excluir)]
    if paginar:
        s["pagination_type"] = "numbers"
    return W("posts", "cw-posts", **s)


blog_pg = [
    header(),
    hero_sub("blog", 'guías, noticias<span class="l2">y tutoriales</span>'),
    C([
        H("guías y tutoriales", "h2", cls="cw-tit-seccion cw-rev"),
        T("<p>Paso a paso para resolver lo del día a día: correos, dominios, tu página y tu tienda.</p>",
          cls="cw-nota cw-rev"),
        posts_widget(incluir=CAT_TUTORIALES, cantidad=6),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       flex_gap={"column": "16", "row": "16", "isLinked": True, "unit": "px", "size": 16},
       padding=pad(70, 24, 60, 24)),
    C([
        H("artículos y noticias", "h2", cls="cw-tit-seccion cw-rev"),
        T("<p>Posicionamiento en Google, tiendas en línea, tecnología y lo nuevo de Creative Web.</p>",
          cls="cw-nota cw-rev"),
        posts_widget(excluir=CAT_TUTORIALES, cantidad=9, paginar=True),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       flex_gap={"column": "16", "row": "16", "isLinked": True, "unit": "px", "size": 16},
       padding=pad(30, 24, 90, 24)),
    cta_mini(),
    footer(),
]


def montar(pid, arbol, nombre):
    emcp.call("emcp-tools-delete-page-content", {"post_id": pid})
    ri = emcp.call("emcp-tools-import-template", {"post_id": pid, "template_json": arbol})
    emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                       params={"cb": random.randint(1, 10**9)},
                       json={"template": "elementor_canvas",
                             "meta": {"_elementor_edit_mode": "builder",
                                      "_elementor_template_type": "wp-page"}}, timeout=60)
    emcp.call("emcp-tools-update-page-settings", {"post_id": pid, "settings": {"hide_title": "yes"}})
    aplicar_clases(arbol, pid, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": pid})
    emcp.call("emcp-tools-add-custom-js", {"post_id": pid,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    print(f"{nombre}: pid={pid} elementos={ri.get('elements_count')}")


if __name__ == "__main__":
    emcp.init()

    # /proyectos/ — nueva, publicada
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                          params={"slug": "proyectos", "status": "publish,draft,private",
                                  "cb": random.randint(1, 10**9)}, timeout=60)
    found = r.json() if r.ok else []
    if found:
        PROY_ID = found[0]["id"]
    else:
        r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                               params={"cb": random.randint(1, 10**9)},
                               json={"title": "Proyectos", "slug": "proyectos",
                                     "status": "publish"}, timeout=60)
        PROY_ID = r.json()["id"]
    montar(PROY_ID, proyectos_pg, "proyectos")

    # /blog/ — respaldo y rediseño
    ex = emcp.call("emcp-tools-export-page", {"post_id": BLOG_ID})
    open("backups-cutover/pagina-1893.json", "w").write(json.dumps(ex, ensure_ascii=False))
    montar(BLOG_ID, blog_pg, "blog")

    emcp.flush_css()
    print("OK proyectos + blog")
