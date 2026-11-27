#!/usr/bin/env python3
"""Cabecera y pie 2026 para las entradas del blog (Theme Builder).

Al excluir `singular/post` de Header_crwb (1918) / footer_crwb (1899) el tema
Hello pasaba a pintar SU propia cabecera (la franja blanca con el menú viejo).
La solución dentro del modelo de Elementor es darle a las entradas sus propias
plantillas de ubicación: condición `include/singular/post`, más específica que
el `include/general` de las viejas, que siguen sirviendo a las money pages.

La caché de condiciones de Elementor Pro (opción
`elementor_pro_theme_builder_conditions`) NO se regenera al escribir el meta por
REST; se fuerza guardando `location` en un documento de tipo `section`
(ver Documents\\Section::save_settings → Conditions_Cache::regenerate).
"""
import json
import random

import emcp
from builders import aplicar_clases
from shared_2026 import header, footer

SECCION_TRIGGER = 2416   # Grafico_1 (type section) — sólo para regenerar la caché
COND_ENTRADAS = ["include/singular/post"]

PARTES = [
    dict(slug="cw-header-2026-blog", titulo="Cabecera 2026 — Blog",
         tipo="header", arbol=[header()]),
    dict(slug="cw-footer-2026-blog", titulo="Pie 2026 — Blog",
         tipo="footer", arbol=[footer()]),
]


def buscar_o_crear(parte):
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/elementor_library", headers=emcp.HEAD,
                          params={"slug": parte["slug"], "status": "publish,draft",
                                  "_fields": "id,slug", "cb": random.randint(1, 10**9)}, timeout=60)
    found = r.json() if r.ok else []
    if found:
        return found[0]["id"]
    r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/elementor_library", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"title": parte["titulo"], "slug": parte["slug"],
                                 "status": "publish"}, timeout=60)
    return r.json()["id"]


def montar(parte):
    pid = buscar_o_crear(parte)
    emcp.call("emcp-tools-delete-page-content", {"post_id": pid})
    ri = emcp.call("emcp-tools-import-template", {"post_id": pid, "template_json": parte["arbol"]})
    emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/elementor_library/{pid}", headers=emcp.HEAD,
                       params={"cb": random.randint(1, 10**9)},
                       json={"meta": {"_elementor_edit_mode": "builder",
                                      "_elementor_template_type": parte["tipo"],
                                      "_elementor_conditions": COND_ENTRADAS}}, timeout=60)
    aplicar_clases(parte["arbol"], pid, emcp)
    print(f"{parte['titulo']}: id={pid} tipo={parte['tipo']} elementos={ri.get('elements_count')}")
    return pid


def regenerar_cache():
    emcp.call("emcp-tools-update-page-settings",
              {"post_id": SECCION_TRIGGER, "settings": {"location": ""}})
    q = emcp.call("emcp-tools-query", {
        "sql": "SELECT option_value FROM wp_options "
               "WHERE option_name='elementor_pro_theme_builder_conditions'"})
    print("caché:", json.dumps(q, ensure_ascii=False)[:600])


if __name__ == "__main__":
    emcp.init()
    for parte in PARTES:
        montar(parte)
    regenerar_cache()
    emcp.flush_css()
    print("OK partes de tema para el blog")
