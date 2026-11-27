#!/usr/bin/env python3
"""Páginas internas 2026 — versiones privadas *-2026 (las páginas vivas NO se tocan).
Las 7 páginas de servicio de Fase 2 conservan su HTML SEO intacto (cw-prosa)."""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from build_home import HTM, BTNP, CA, ISO, LOGO, header, footer, JS

WA = "https://wa.me/593963485983"


def hero_sub(kicker, titulo_html):
    return C([
        H(kicker, "div", cls="cw-kick"),
        W("heading", "cw-titulo-xl cw-blanco", title=titulo_html, header_size="h1"),
    ], cls="cw-2026 cw-negro cw-hero-sub", content_width="boxed", flex_direction="column",
       flex_gap={"column": "18", "row": "18", "isLinked": True, "unit": "px", "size": 18},
       padding=pad(150, 24, 70, 24))


def cta_mini():
    return C([
        W("heading", "cw-cta-mini", header_size="h2",
          title='¿Hablamos de <b>tu proyecto</b>?'),
        C([BTNP("Quiero mi diagnóstico gratis", "/contactanos/", "cw-btn-grande"),
           BTNP("Escríbenos por WhatsApp", WA)],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "16", "row": "12", "isLinked": False, "unit": "px", "size": 16}),
    ], cls="cw-2026 cw-negro cw-final", content_width="boxed", flex_direction="column",
       flex_gap={"column": "30", "row": "30", "isLinked": True, "unit": "px", "size": 30},
       padding=pad(90, 24, 90, 24))


def crear_pagina(slug, titulo, arbol):
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                          params={"slug": slug, "status": "private,draft,publish",
                                  "cb": random.randint(1, 10**9)}, timeout=60)
    found = r.json() if r.ok else []
    if found:
        pid = found[0]["id"]
    else:
        r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                               params={"cb": random.randint(1, 10**9)},
                               json={"title": titulo, "slug": slug, "status": "private"}, timeout=60)
        pid = r.json()["id"]
    emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                       params={"cb": random.randint(1, 10**9)},
                       json={"template": "elementor_canvas",
                             "meta": {"_elementor_edit_mode": "builder",
                                      "_elementor_template_type": "wp-page"}}, timeout=60)
    emcp.call("emcp-tools-delete-page-content", {"post_id": pid})
    ri = emcp.call("emcp-tools-import-template", {"post_id": pid, "template_json": arbol})
    aplicar_clases(arbol, pid, emcp)
    emcp.call("emcp-tools-update-page-settings", {"post_id": pid, "settings": {"hide_title": "yes"}})
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": pid})
    emcp.call("emcp-tools-add-custom-js", {"post_id": pid,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    print(f"{slug}: pid={pid} elementos={ri.get('elements_count')}")
    return pid


def stagger(titulo):
    """Parte el título en 2 líneas escalonadas."""
    p = titulo.split()
    corte = max(1, len(p) // 2)
    return " ".join(p[:corte]) + '<span class="l2">' + " ".join(p[corte:]) + "</span>"


# ============ 1. páginas de servicio Fase 2 (prosa SEO intacta) ============
SERVICIO_PAGES = {
    3624: ("seo-posicionamiento-web-2026", "posicionamiento en google"),
    3625: ("tiendas-online-ecuador-2026", "tiendas en línea"),
    3629: ("facturacion-woocommerce-sri-2026", "tu tienda factura sola"),
    3626: ("motrix-2026", "motrix para consultorios"),
    3627: ("probador-virtual-2026", "probador virtual"),
    3630: ("quipuy-2026", "quipuy facturación"),
    3631: ("dentilab-2026", "dentilab para dentistas"),
}


def pagina_servicio(pid_origen, slug_nuevo, titulo_hero):
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{pid_origen}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=60)
    j = r.json()
    titulo = j["title"]["raw"]
    contenido = j["content"]["raw"]

    arbol = [
        header,
        hero_sub("servicios — creative web", stagger(titulo_hero)),
        C([T(contenido, cls="cw-prosa")],
          cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
          padding=pad(80, 24, 90, 24)),
        cta_mini(),
        footer,
    ]
    crear_pagina(slug_nuevo, titulo, arbol)


# ============ 2. contáctanos ============
FORM = {
    "form_name": "Contacto Creative Web 2026",
    "form_fields": [
        {"_id": "name", "custom_id": "name", "field_label": "Tu nombre",
         "placeholder": "Tu nombre", "required": "true", "width": "100"},
        {"_id": "email", "custom_id": "email", "field_type": "email", "field_label": "Email",
         "placeholder": "tu@correo.com", "required": "true", "width": "100"},
        {"_id": "tel", "custom_id": "tel", "field_type": "tel", "field_label": "WhatsApp",
         "placeholder": "Tu número (opcional)", "width": "100"},
        {"_id": "message", "custom_id": "message", "field_type": "textarea",
         "field_label": "Cuéntanos qué necesitas",
         "placeholder": "Quiero una página web para mi negocio de…", "required": "true",
         "width": "100", "rows": 5},
    ],
    "button_text": "Enviar — respondemos en 24 h",
    "email_to": "ventas@creativeweb.com.ec",
    "email_subject": "Nuevo contacto desde creativeweb.com.ec",
    "email_from_name": "Web Creative Web",
    "email_reply_to": "[field id=\"email\"]",
    "success_message": "¡Gracias! Tu mensaje fue enviado. Te respondemos en menos de 24 horas hábiles.",
    "error_message": "Hubo un problema al enviar. Escríbenos mejor por WhatsApp.",
    "required_field_message": "Este campo es obligatorio.",
}

contactanos = [
    header,
    hero_sub("contacto", 'cuéntanos<span class="l2">tu proyecto</span>'),
    C([
        C([
            T("<p>Escríbenos y recibe una <b>cotización clara en menos de 24 horas</b>. "
              "Sin letra pequeña: precios desde el primer correo.</p>", cls="cw-parr"),
            T('<p>ventas@creativeweb.com.ec<br>WhatsApp <a href="' + WA + '">+593 96 348 5983</a><br>'
              "Ibarra, Ecuador — atendemos todo el país</p>", cls="cw-datos"),
            BTNP("Abrir WhatsApp", WA, "cw-btn-pill cw-btn-lleno"),
        ], content_width="full", width={"unit": "%", "size": 42},
           width_mobile={"unit": "%", "size": 100}, flex_direction="column",
           flex_gap={"column": "22", "row": "22", "isLinked": True, "unit": "px", "size": 22}),
        C([W("form", "cw-form", **FORM)], content_width="full",
          width={"unit": "%", "size": 50}, width_mobile={"unit": "%", "size": 100},
          flex_direction="column"),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="row", flex_wrap="wrap",
       flex_justify_content="space-between", padding=pad(20, 24, 100, 24),
       flex_gap={"column": "40", "row": "40", "isLinked": True, "unit": "px", "size": 40}),
    footer,
]

# ============ 3. quiénes somos ============
quienes = [
    header,
    hero_sub("quiénes somos", 'una empresa de tecnología,<span class="l2">no solo una agencia</span>'),
    C([
        C([
            T("<p>Desde 2010 construimos presencia digital para negocios ecuatorianos: desde el "
              "<b>Municipio de Quito y las prefecturas de Pichincha e Imbabura</b> hasta la PYME "
              "que recién empieza. Diseñamos, desarrollamos, medimos — y cuando un proceso se "
              "repite, lo convertimos en software.</p>", cls="cw-parr"),
            T("<ul><li>Precios claros publicados desde el primer contacto</li>"
              "<li>Todo bajo el mismo techo: web, hosting, correos y posicionamiento</li>"
              "<li>Soporte local que contesta, en español y por WhatsApp</li>"
              "<li>Cuatro productos propios en producción: Quipuy, SriFlow, Boxpli y DentiLab</li></ul>",
              cls="cw-check"),
        ], content_width="full", width={"unit": "%", "size": 52},
           width_mobile={"unit": "%", "size": 100}, flex_direction="column",
           flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20}),
        C([
            HTM('<div class="cw-stat a"><b>15</b><p>años construyendo web</p></div>'),
            HTM('<div class="cw-stat"><b>+200</b><p>sitios entregados</p></div>'),
            HTM('<div class="cw-stat t"><b>4</b><p>productos en producción</p></div>'),
            HTM('<div class="cw-stat"><b>24 h</b><p>respuesta a cotizaciones</p></div>'),
        ], content_width="full", width={"unit": "%", "size": 38},
           width_mobile={"unit": "%", "size": 100}, flex_direction="column",
           flex_gap={"column": "26", "row": "26", "isLinked": True, "unit": "px", "size": 26}),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="row", flex_wrap="wrap",
       flex_justify_content="space-between", padding=pad(20, 24, 90, 24),
       flex_gap={"column": "40", "row": "40", "isLinked": True, "unit": "px", "size": 40}),
    C([
        T('<p style="font-family:var(--cw-mono);font-size:11.5px;letter-spacing:.1em;'
          'text-transform:uppercase;color:#5D6870">Confían en nosotros</p>'
          '<p style="font-family:var(--cw-display);font-weight:700;font-size:17px;color:#97A2AB;'
          'line-height:2.2">Municipio de Quito &nbsp;·&nbsp; Prefectura de Pichincha &nbsp;·&nbsp; '
          'Prefectura de Imbabura &nbsp;·&nbsp; Comercial Hidrobo &nbsp;·&nbsp; OKCars '
          '&nbsp;·&nbsp; Reina de Otavalo</p>'),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(56, 24, 56, 24)),
    cta_mini(),
    footer,
]

# ============ 4. servicios (índice) ============
def fila_srv(grad, nombre, desc, url):
    return CA([
        HTM(f'<div class="cw-thumb" style="background:{grad}">{ISO}</div>'),
        H(nombre, "h3"),
        T(f"<p>{desc}</p>", cls="cw-desc"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls="cw-fila cw-rev", content_width="full")


G = ["linear-gradient(140deg,#0E2A44,#0070C0)", "linear-gradient(140deg,#0B2D3E,#00A0E0)",
     "linear-gradient(140deg,#0C2B26,#00A090)", "linear-gradient(140deg,#14243A,#2E4763)"]

servicios_idx = [
    header,
    hero_sub("servicios", 'todo lo que tu negocio<span class="l2">necesita para vender</span>'),
    C([
        C([
            fila_srv(G[0], "Páginas web", "Profesionales, rápidas y hechas para salir en Google.", "/servicios/paginas-web/"),
            fila_srv(G[1], "Tiendas en línea", "Tu tienda cobra, factura al SRI y avisa por WhatsApp.", "/servicios/tiendas-online-ecuador/"),
            fila_srv(G[2], "Posicionamiento en Google", "Nuestra especialidad, con informe mensual de datos reales.", "/servicios/seo-posicionamiento-web/"),
            fila_srv(G[3], "Programas a tu medida", "Automatizamos las tareas repetitivas de tu operación.", "/contactanos/"),
            fila_srv(G[0], "Hosting y dominios", "El hogar de tu página y tu dirección .com.", "/servicios/hosting-web-ecuador-servidor-pagina-web-quito-otavalo-ibarra-galapagos/"),
            fila_srv(G[1], "Correos corporativos", "nombre@tuempresa.com en todos tus dispositivos.", "/servicios/correos-corporativos-empresariales/"),
            fila_srv(G[2], "Facturación en tu tienda", "WooCommerce + SRI: cada venta emite su factura sola.", "/servicios/facturacion-electronica-woocommerce-sri/"),
            fila_srv(G[3], "Probador virtual", "Tus clientes se prueban la ropa con inteligencia artificial.", "/servicios/probador-virtual-tienda-ropa/"),
        ], cls="cw-filas", content_width="full", flex_direction="column",
           flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0}),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
       padding=pad(10, 24, 90, 24)),
    cta_mini(),
    footer,
]

if __name__ == "__main__":
    emcp.init()
    for pid, (slug, thero) in SERVICIO_PAGES.items():
        pagina_servicio(pid, slug, thero)
    crear_pagina("contactanos-2026", "Contáctanos", contactanos)
    crear_pagina("quienes-somos-2026", "Quiénes somos", quienes)
    crear_pagina("servicios-2026", "Servicios", servicios_idx)
    emcp.flush_css()
    print("OK internas")
