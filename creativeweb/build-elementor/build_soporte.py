#!/usr/bin/env python3
"""Página /soporte/ (2433) — rediseño 2026.

El formulario es de Elementor (envía a info@ con reCAPTCHA v3), no de HubSpot:
el cliente no usa esa herramienta (21-sep).
"""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import HTM, BTNP, header, footer, hero_sub, JS, WA, EMAIL

PID = 2433


def canal(titulo, desc, btn_texto, btn_url, externo=False):
    b = BTNP(btn_texto, btn_url)
    if externo:
        b["settings"]["link"]["is_external"] = "on"
    return C([
        H(titulo, "h3", cls="cw-canal-tit"),
        T(f"<p>{desc}</p>", cls="cw-canal-desc"),
        b,
    ], cls="cw-canal", content_width="full", flex_direction="column",
       flex_gap={"column": "10", "row": "10", "isLinked": True, "unit": "px", "size": 10},
       padding=pad(26, 24, 26, 24),
       width={"unit": "%", "size": 31}, width_tablet={"unit": "%", "size": 48},
       width_mobile={"unit": "%", "size": 100})


soporte = [
    header(),
    hero_sub("soporte", 'estamos aquí<span class="l2">para ayudarte</span>'),

    # ---- canales ----
    C([
        H("¿Cómo prefieres contactarnos?", "h2", cls="cw-tit-seccion"),
        T("<p>Si tu página, tu correo o tu tienda tienen un problema, escríbenos. "
          "Respondemos en horario de oficina (lunes a viernes, 9h00 a 18h00) y los "
          "casos urgentes de sitios caídos tienen prioridad.</p>", cls="cw-nota"),
        C([
            canal("WhatsApp", "La vía más rápida. Cuéntanos qué pasa y te respondemos en minutos.",
                  "Escribir al 099 917 4980", WA, externo=True),
            canal("Correo", "Para solicitudes con capturas o archivos adjuntos. Queda registro de todo.",
                  "info@creativeweb.com.ec", f"mailto:{EMAIL}"),
            canal("Formulario", "Cuéntanos el problema con detalle y te respondemos por correo.",
                  "Escribir mi caso", "#ticket"),
        ], content_width="full", flex_direction="row", flex_wrap="wrap",
           flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20},
           padding=pad(10, 0, 0, 0)),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       flex_gap={"column": "14", "row": "14", "isLinked": True, "unit": "px", "size": 14},
       padding=pad(70, 24, 60, 24)),

    # ---- qué cubre ----
    C([
        H("¿En qué te ayudamos?", "h2", cls="cw-tit-seccion cw-blanco-tit"),
        T("""<ul>
<li><strong>Tu página web</strong>: errores, cambios de contenido, formularios que no llegan.</li>
<li><strong>Tu correo empresarial</strong>: configuración en el celular o la computadora, contraseñas, buzones llenos.</li>
<li><strong>Tu hosting y dominio</strong>: renovaciones, certificados de seguridad, sitios caídos.</li>
<li><strong>Tu tienda en línea</strong>: productos, pagos y pedidos.</li>
<li><strong>Facturación electrónica</strong>: soporte de Quipuy y SriFlow.</li>
</ul>""", cls="cw-check"),
        T('<p>¿Prefieres resolverlo tú mismo? En el blog tenemos '
          '<a href="/blog/">guías y tutoriales paso a paso</a> para lo más común: '
          'configurar tu correo, administrar tu página y más.</p>', cls="cw-nota-clara"),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
       flex_gap={"column": "18", "row": "18", "isLinked": True, "unit": "px", "size": 18},
       padding=pad(70, 24, 70, 24)),

    # ---- formulario de soporte ----
    C([
        H("Cuéntanos qué está pasando", "h2", cls="cw-tit-seccion"),
        T("<p>Describe tu problema y te contactamos con la solución. Mientras más detalles nos des "
          "—qué pasó, desde cuándo y qué ves en pantalla— más rápido lo resolvemos.</p>",
          cls="cw-nota"),
        W("form", "cw-form",
          form_name="Soporte Creative Web 2026",
          form_fields=[
              {"_id": "name", "custom_id": "name", "field_label": "Tu nombre",
               "placeholder": "Tu nombre", "required": "true", "width": "100"},
              {"_id": "email", "custom_id": "email", "field_type": "email",
               "field_label": "Correo", "placeholder": "tu@correo.com",
               "required": "true", "width": "100"},
              {"_id": "tel", "custom_id": "tel", "field_type": "tel",
               "field_label": "WhatsApp", "placeholder": "Tu número (opcional)",
               "width": "100"},
              {"_id": "servicio", "custom_id": "servicio", "field_type": "select",
               "field_label": "¿Con qué necesitas ayuda?",
               "field_options": "Mi página web\nCorreo corporativo\nHosting o dominio\n"
                                "Mi tienda en línea\nQuipuy, SriFlow o DentiLab\nOtra cosa",
               "required": "true", "width": "100"},
              {"_id": "urgencia", "custom_id": "urgencia", "field_type": "select",
               "field_label": "¿Qué tan urgente es?",
               "field_options": "Mi sitio está caído (urgente)\n"
                                "No puedo trabajar con normalidad\n"
                                "Es una consulta o un cambio",
               "required": "true", "width": "100"},
              {"_id": "message", "custom_id": "message", "field_type": "textarea",
               "field_label": "Cuéntanos qué pasa",
               "placeholder": "Qué pasó, desde cuándo, y qué ves en pantalla…",
               "required": "true", "width": "100", "rows": 6},
              {"_id": "recap", "custom_id": "recaptcha", "field_type": "recaptcha_v3",
               "field_label": "reCAPTCHA", "width": "100"},
          ],
          button_text="Enviar mi solicitud",
          email_to=EMAIL,
          email_subject="Soporte — [field id=\"urgencia\"] — [field id=\"servicio\"]",
          email_from_name="Soporte Creative Web",
          email_reply_to='[field id="email"]'),
    ], cls="cw-2026 cw-papel cw-ticket", content_width="boxed", flex_direction="column",
       flex_gap={"column": "14", "row": "14", "isLinked": True, "unit": "px", "size": 14},
       padding=pad(70, 24, 80, 24)),

    footer(),
]


if __name__ == "__main__":
    emcp.init()
    emcp.call("emcp-tools-delete-page-content", {"post_id": PID})
    ri = emcp.call("emcp-tools-import-template", {"post_id": PID, "template_json": soporte})
    emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{PID}", headers=emcp.HEAD,
                       params={"cb": random.randint(1, 10**9)},
                       json={"template": "elementor_canvas",
                             "meta": {"_elementor_edit_mode": "builder",
                                      "_elementor_template_type": "wp-page",
                                      "_yoast_wpseo_title": "Soporte técnico — Creative Web",
                                      "_yoast_wpseo_metadesc": "¿Problemas con tu página, correo o tienda? Escríbenos por WhatsApp, correo o usa el formulario. Soporte en español, desde Otavalo."}},
                       timeout=60)
    emcp.call("emcp-tools-update-page-settings", {"post_id": PID, "settings": {"hide_title": "yes"}})
    aplicar_clases(soporte, PID, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": PID})
    emcp.call("emcp-tools-add-custom-js", {"post_id": PID,
              "parent_id": st["structure"][-1]["id"], "js": JS})

    # ancla #ticket en la sección del formulario
    objetivo = None

    def walk(els):
        global objetivo
        for e in els:
            if e.get("elType") == "container" and not objetivo:
                if "Cuéntanos qué está pasando" in json.dumps(e, ensure_ascii=False):
                    objetivo = e["id"]
                    return
            walk(e.get("elements", []))
    walk(st.get("structure", []))
    if objetivo:
        emcp.call("emcp-tools-batch-update", {"post_id": PID, "operations": [
            {"element_id": objetivo, "settings": {"_element_id": "ticket"}}]})

    print(f"soporte: pid={PID} elementos={ri.get('elements_count')} ancla={objetivo}")
    emcp.flush_css()
    print("OK")
