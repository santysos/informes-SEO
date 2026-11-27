#!/usr/bin/env python3
"""Caso de estudio piloto: /proyectos/comercial-hidrobo/ (hija de Proyectos 3856)."""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import HTM, BTNP, header, footer, hero_sub, JS

PROYECTOS_ID = 3856


def stat(clase, num, texto):
    return HTM(f'<div class="cw-stat {clase}"><b>{num}</b><p>{texto}</p></div>')


caso = [
    header(),

    # ---- hero ----
    C([
        H("caso de estudio — web · seo · embudo de taller", "div", cls="cw-kick"),
        W("heading", "cw-titulo-xl cw-blanco", header_size="h1",
          title='comercial hidrobo:<span class="l2">de visitas a citas de taller</span>'),
        T('<p class="mini">sector automotor · Ibarra, Cayambe y Tulcán · '
          '<a href="https://comercialhidrobo.com" target="_blank" rel="noopener">comercialhidrobo.com ↗</a></p>',
          cls="cw-datos"),
    ], cls="cw-2026 cw-negro cw-hero-sub", content_width="boxed", flex_direction="column",
       flex_gap={"column": "18", "row": "18", "isLinked": True, "unit": "px", "size": 18},
       padding=pad(150, 24, 50, 24)),

    # ---- stats banda ----
    C([
        C([
            stat("a", "27.069", "visitantes en 5 meses"),
            stat("", "930.951", "veces visto en Google (90 días)"),
            stat("t", "731", "páginas recibiendo visitas"),
            stat("a", "25", "citas de taller confirmadas (base 90 días)"),
        ], content_width="full", flex_direction="row", flex_wrap="wrap",
           flex_justify_content="space-between",
           flex_gap={"column": "30", "row": "24", "isLinked": False, "unit": "px", "size": 30}),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
       padding=pad(30, 24, 70, 24)),

    # ---- el cliente y el reto ----
    C([
        T("""
<h2>El cliente</h2>
<p>Comercial Hidrobo es el concesionario automotor más grande del norte del Ecuador: más de
50 años vendiendo marcas como Renault, Nissan, Mazda, Chery, DongFeng y Changan, con sedes
en Ibarra, Cayambe y Tulcán, y un taller de servicio que atiende a miles de dueños de auto.</p>

<h2>El reto</h2>
<p>Un auto no se compra con un clic: es una decisión larga que se cierra en el concesionario.
Entonces, ¿para qué sirve la página? Para dos cosas: <strong>que te encuentren cuando
comparan modelos</strong>, y <strong>convertir a los dueños de auto en clientes recurrentes
del taller</strong>. Ese fue el encargo: visibilidad en Google y un camino claro hacia la
cita de taller.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(80, 24, 60, 24)),

    # ---- lo que hicimos ----
    C([
        H("lo que hicimos", "h2", cls="cw-titulo-xl cw-blanco cw-rev"),
        T("""<ul>
<li><strong>Sitio web completo</strong> con más de 80 modelos organizados por marca, medido con Google Analytics y Tag Manager: cada clic a WhatsApp y cada formulario cuenta.</li>
<li><strong>Estrategia SEO de 12 meses por grupos de búsqueda</strong>: detectamos con datos que los autos chinos concentraban el 26,9&nbsp;% de los clics y los eléctricos e híbridos el 14,6&nbsp;% — y el contenido se enfocó ahí, no en suposiciones.</li>
<li><strong>Más de 50 artículos publicados</strong> respondiendo lo que la gente pregunta antes de comprar o mantener su auto.</li>
<li><strong>La página número 1 del sitio la escribimos nosotros</strong>: la guía de autos eléctricos en Ecuador, con 2.285 visitas desde Google.</li>
</ul>""", cls="cw-check cw-rev"),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
       flex_gap={"column": "24", "row": "24", "isLinked": True, "unit": "px", "size": 24},
       padding=pad(80, 24, 80, 24)),

    # ---- el embudo de taller ----
    C([
        T("""
<h2>La estrategia estrella: el embudo de taller</h2>
<p>El análisis mostró el problema con precisión: el sitio recibía miles de visitas de
<em>dueños de auto</em> — 47 artículos sobre mantenimiento, aceite, garantías y costos que
sumaban <strong>267.000 apariciones en Google</strong> — pero esas visitas morían en una
página de contacto genérica. <strong>El problema no era el tráfico: era el ruteo.</strong></p>
<p>La solución: cada uno de esos 47 artículos ahora termina en un bloque de reserva con dos
caminos — <strong>«Reservar cita de taller»</strong> o <strong>agendar por WhatsApp</strong>
con mensaje pre-armado (modelo, año y kilometraje) — mencionando las 3 sedes. Además:</p>
<ul>
<li>Enlazado interno hacia las 3 guías pilar del taller que ya convertían.</li>
<li>Datos estructurados de taller automotriz para Google (dirección, teléfono, servicios y acción de reserva).</li>
<li>Punto de partida medido: 53 solicitudes de cita, 25 reservas confirmadas y 184 chats de WhatsApp en 90 días — con solo el 1,7&nbsp;% del tráfico llegando a la página de reserva. Hoy el 100&nbsp;% del tráfico de dueños rutea hacia ella.</li>
</ul>
<p>Eso es lo que significa <a href="/servicios/seo-posicionamiento-web/">SEO medido con
datos</a>: no solo traer visitas — convertirlas en citas.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 80, 24)),

    # ---- CTA ----
    C([
        W("heading", "cw-cta-mini", header_size="h2",
          title='¿Quieres resultados así <b>en tu negocio</b>?'),
        C([BTNP("Quiero mi diagnóstico gratis", "/contactanos/", "cw-btn-grande"),
           BTNP("Ver más proyectos", "/proyectos/")],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "16", "row": "12", "isLinked": False, "unit": "px", "size": 16}),
    ], cls="cw-2026 cw-negro cw-final", content_width="boxed", flex_direction="column",
       flex_gap={"column": "30", "row": "30", "isLinked": True, "unit": "px", "size": 30},
       padding=pad(90, 24, 90, 24)),

    footer(),
]


if __name__ == "__main__":
    emcp.init()
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                          params={"slug": "comercial-hidrobo", "status": "publish,draft,private",
                                  "cb": random.randint(1, 10**9)}, timeout=60)
    found = r.json() if r.ok else []
    if found:
        PID = found[0]["id"]
    else:
        r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                               params={"cb": random.randint(1, 10**9)},
                               json={"title": "Caso de estudio: Comercial Hidrobo",
                                     "slug": "comercial-hidrobo", "parent": PROYECTOS_ID,
                                     "status": "publish"}, timeout=60)
        PID = r.json()["id"]
    emcp.call("emcp-tools-delete-page-content", {"post_id": PID})
    ri = emcp.call("emcp-tools-import-template", {"post_id": PID, "template_json": caso})
    emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{PID}", headers=emcp.HEAD,
                       params={"cb": random.randint(1, 10**9)},
                       json={"template": "elementor_canvas", "parent": PROYECTOS_ID,
                             "meta": {"_elementor_edit_mode": "builder",
                                      "_elementor_template_type": "wp-page",
                                      "_yoast_wpseo_title": "Caso de estudio: Comercial Hidrobo — web, SEO y citas de taller",
                                      "_yoast_wpseo_metadesc": "Cómo llevamos al concesionario más grande del norte de Ecuador a 27.069 visitantes y convertimos su tráfico en citas de taller."}},
                       timeout=60)
    emcp.call("emcp-tools-update-page-settings", {"post_id": PID, "settings": {"hide_title": "yes"}})
    aplicar_clases(caso, PID, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": PID})
    emcp.call("emcp-tools-add-custom-js", {"post_id": PID,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    print(f"caso CH: pid={PID} elementos={ri.get('elements_count')}")

    # la card de CH en /proyectos/ ahora enlaza al caso (interno)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": PROYECTOS_ID})
    objetivo = None

    def walk(els):
        global objetivo
        for e in els:
            if e.get("elType") == "container" and not objetivo:
                r = emcp.call("emcp-tools-get-element-settings",
                              {"post_id": PROYECTOS_ID, "element_id": e["id"]})
                s = r.get("settings", r)
                if isinstance(s, dict) and s.get("html_tag") == "a" and \
                   "comercialhidrobo.com" in str(s.get("link", {}).get("url", "")):
                    objetivo = (e["id"], s.get("link"))
            walk(e.get("elements", []))
    walk(st.get("structure", []))
    if objetivo:
        eid, link = objetivo
        emcp.call("emcp-tools-batch-update", {"post_id": PROYECTOS_ID, "operations": [
            {"element_id": eid, "settings": {"link": {"url": "/proyectos/comercial-hidrobo/",
                                                      "is_external": "", "nofollow": ""}}}]})
        print("card de CH en /proyectos/ -> caso de estudio")
    emcp.flush_css()
    print("OK")
