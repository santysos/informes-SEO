#!/usr/bin/env python3
"""Plantilla de entrada individual del blog (Entrada_blog, 2533) — diseño 2026.

El post renderizaba Header_crwb (1918) + Entrada_blog (2533) + footer_crwb (1899),
las tres del diseño viejo. Esta plantilla trae su propio header/footer 2026 y el
script excluye `singular/post` de las condiciones de las plantillas viejas, que
siguen sirviendo a las 3 money pages sin migrar (hosting 1282, dominios 1699,
correos 931).
"""
import json
import random

import emcp
from builders import C, W, H, T, pad, px, aplicar_clases
from shared_2026 import HTM, cta_mini, JS

TPL = 2533          # Entrada_blog (single-post)
TPL_HEADER = 1918   # Header_crwb (viejo, se conserva para las money pages)
TPL_FOOTER = 1899   # footer_crwb (viejo, idem)

TAG_TITULO = '[elementor-tag id="" name="post-title" settings="%7B%7D"]'
TAG_FOTO = ('[elementor-tag id="" name="post-featured-image" '
            'settings="%7B%22fallback%22%3A%7B%22url%22%3A%22%22%2C%22id%22%3A%22%22%7D%7D"]')


entrada = [
    # el header/footer 2026 vienen de las plantillas de ubicación creadas en
    # build_blog_theme_parts.py (condición include/singular/post)

    # ---- hero: volver, título dinámico y metadatos ----
    C([
        T('<p><a href="/blog/">&larr; Volver al blog</a></p>', cls="cw-volver"),
        W("theme-post-title", "cw-titulo-xl cw-blanco cw-post-titulo",
          header_size="h1", **{"__dynamic__": {"title": TAG_TITULO}}),
        W("post-info", "cw-post-meta", view="inline",
          icon_list=[
              {"_id": "fecha", "type": "date", "date_format": "default", "show_icon": ""},
              {"_id": "cats", "type": "terms", "taxonomy": "category", "show_icon": ""},
          ]),
    ], cls="cw-2026 cw-negro cw-post-hero", content_width="boxed", flex_direction="column",
       flex_gap={"column": "16", "row": "16", "isLinked": True, "unit": "px", "size": 16},
       padding=pad(150, 24, 46, 24)),

    # ---- imagen destacada ----
    C([
        W("theme-post-featured-image", "cw-post-img",
          image_size="large", **{"__dynamic__": {"image": TAG_FOTO}}),
    ], cls="cw-2026 cw-post-foto", content_width="boxed", flex_direction="column",
       padding=pad(0, 24, 0, 24)),

    # ---- cuerpo del artículo ----
    C([
        W("theme-post-content", "cw-prosa"),
    ], cls="cw-2026 cw-papel cw-post-body", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 30, 24)),

    # ---- compartir + navegación ----
    C([
        C([
            H("Comparte este artículo", "div", cls="cw-kick-sm"),
            W("share-buttons", "cw-share", view="icon-text", shape="rounded",
              columns="0", share_buttons=[
                  {"_id": "fb", "button": "facebook"},
                  {"_id": "wa", "button": "whatsapp"},
                  {"_id": "li", "button": "linkedin"},
                  {"_id": "x", "button": "x-twitter"},
              ]),
        ], cls="cw-share-caja", content_width="full", flex_direction="column",
           flex_gap={"column": "12", "row": "12", "isLinked": True, "unit": "px", "size": 12}),
        W("post-navigation", "cw-post-nav",
          prev_label="Artículo anterior", next_label="Artículo siguiente",
          show_arrow="yes", show_borders="yes", show_title="yes"),
    ], cls="cw-2026 cw-papel cw-post-pie", content_width="boxed", flex_direction="column",
       flex_gap={"column": "34", "row": "34", "isLinked": True, "unit": "px", "size": 34},
       padding=pad(20, 24, 80, 24)),

    cta_mini(),

    # ---- sigue leyendo ----
    C([
        H("sigue leyendo", "h2", cls="cw-tit-seccion cw-rev"),
        T("<p>Más guías y noticias para sacarle provecho a tu presencia en internet.</p>",
          cls="cw-nota cw-rev"),
        W("posts", "cw-posts",
          _skin="classic",
          classic_columns="3", classic_columns_tablet="2", classic_columns_mobile="1",
          classic_posts_per_page=3,
          classic_thumbnail_size="large",
          classic_item_ratio={"unit": "px", "size": 0.62, "sizes": []},
          classic_meta_data=["date"],
          classic_excerpt_length=16,
          classic_show_read_more="yes",
          classic_read_more_text="Leer más →",
          classic_row_gap=px(28), classic_column_gap=px(28),
          posts_post_type="post",
          posts_exclude=["current_post"]),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       flex_gap={"column": "16", "row": "16", "isLinked": True, "unit": "px", "size": 16},
       padding=pad(70, 24, 90, 24)),
]


SECCION_TRIGGER = 2416  # Grafico_1 (type section), sólo para regenerar la caché


def excluir_posts(tpl_id, nombre):
    """Las plantillas viejas dejan de aplicar a las entradas del blog.

    `emcp-tools-set-template-conditions` NO sirve aquí (gestiona el CPT propio de
    EMCP, no `elementor_library`): devuelve «Template not found». El meta
    `_elementor_conditions` sí es escribible por REST.
    """
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/elementor_library/{tpl_id}",
                           headers=emcp.HEAD, params={"cb": random.randint(1, 10**9)},
                           json={"meta": {"_elementor_conditions":
                                          ["include/general", "exclude/singular/post"]}},
                           timeout=60)
    cond = r.json().get("meta", {}).get("_elementor_conditions") if r.ok else r.text[:120]
    print(f"condiciones {nombre} ({tpl_id}): {cond}")


def regenerar_cache_condiciones():
    """Elementor Pro cachea las condiciones en `elementor_pro_theme_builder_conditions`
    y no la reconstruye al escribir el meta por REST. Guardar `location` en un
    documento de tipo `section` dispara Conditions_Cache::regenerate(), que la
    reconstruye leyendo el meta de TODAS las plantillas."""
    emcp.call("emcp-tools-update-page-settings",
              {"post_id": SECCION_TRIGGER, "settings": {"location": ""}})
    q = emcp.call("emcp-tools-query", {
        "sql": "SELECT option_value FROM wp_options "
               "WHERE option_name='elementor_pro_theme_builder_conditions'"})
    print("caché de condiciones:", json.dumps(q, ensure_ascii=False)[:520])


if __name__ == "__main__":
    emcp.init()

    ex = emcp.call("emcp-tools-export-page", {"post_id": TPL})
    open("backups-cutover/plantilla-2533-entrada-blog.json", "w").write(
        json.dumps(ex, ensure_ascii=False))

    emcp.call("emcp-tools-delete-page-content", {"post_id": TPL})
    ri = emcp.call("emcp-tools-import-template", {"post_id": TPL, "template_json": entrada})
    # el tipo de plantilla debe seguir siendo single-post
    emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/elementor_library/{TPL}", headers=emcp.HEAD,
                       params={"cb": random.randint(1, 10**9)},
                       json={"meta": {"_elementor_edit_mode": "builder",
                                      "_elementor_template_type": "single-post"}}, timeout=60)
    aplicar_clases(entrada, TPL, emcp)

    st = emcp.call("emcp-tools-get-page-structure", {"post_id": TPL})
    emcp.call("emcp-tools-add-custom-js", {"post_id": TPL,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    print(f"plantilla entrada: elementos={ri.get('elements_count')}")

    excluir_posts(TPL_HEADER, "Header_crwb")
    excluir_posts(TPL_FOOTER, "footer_crwb")
    regenerar_cache_condiciones()

    emcp.flush_css()
    print("OK entrada de blog")
