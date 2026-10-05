#!/usr/bin/env python3
"""Medición de contactos y CTAs de creativeweb.com.ec (GTM + GA4 324865677).

Extiende configurar_contacto.py (WhatsApp + formulario) con lo propio de nuestro sitio:

| Evento         | Disparo                                         | Clave |
|----------------|-------------------------------------------------|-------|
| whatsapp_click | clic en wa.me o api.whatsapp (los dos formatos) | sí    |
| form_submit    | submit_success de Elementor, con form_name      | sí    |
| cta_click      | clic hacia /contactanos/ (Cotizar, diagnóstico) | no    |
| tienda_click   | clic hacia ventas.creativeweb.com.ec            | no    |

GA4 lo carga Site Kit con gtag: las etiquetas NO llevan etiqueta de configuración, van con
measurementIdOverride para no duplicar page_view. El contenedor se instala desde
Site Kit → Ajustes → Tag Manager.

    ../.venv/bin/python configurar_creativeweb.py --contenedor GTM-XXXXXXX            # revisar
    ../.venv/bin/python configurar_creativeweb.py --contenedor GTM-XXXXXXX --publicar # en vivo
"""
import argparse

import ga4
import gtm

PROPIEDAD = "324865677"

# Elementor envía por AJAX: GA4 nunca ve el envío. El listener traduce su evento
# submit_success al dataLayer, con el nombre del formulario (contacto, soporte…).
LISTENER = """<script>
(function(){
  document.addEventListener('DOMContentLoaded', function(){
    if (!window.jQuery) return;
    jQuery(document).on('submit_success', function(ev){
      var f = ev && ev.target ? ev.target : null;
      var nombre = f && f.getAttribute ? (f.getAttribute('name') || '') : '';
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({event: 'form_enviado', form_name: nombre});
    });
  });
})();
</script>"""


def variable_datalayer(nombre, clave):
    return {"name": nombre, "type": "v",
            "parameter": [{"type": "integer", "key": "dataLayerVersion", "value": "2"},
                          {"type": "boolean", "key": "setDefaultValue", "value": "false"},
                          {"type": "template", "key": "name", "value": clave}]}


def upsert_variable(ws, cuerpo):
    api = gtm.api()
    existentes = api.accounts().containers().workspaces().variables().list(
        parent=ws["path"]).execute().get("variable", [])
    for v in existentes:
        if v["name"] == cuerpo["name"]:
            return api.accounts().containers().workspaces().variables().update(
                path=v["path"], body=cuerpo).execute(), "actualizada"
    return api.accounts().containers().workspaces().variables().create(
        parent=ws["path"], body=cuerpo).execute(), "creada"


def auditar(cont):
    """Protocolo de la skill: no duplicar eventos que el contenedor ya dispare."""
    api = gtm.api()
    try:
        live = api.accounts().containers().versions().live(parent=cont["path"]).execute()
    except Exception:
        print("  contenedor sin versión publicada (vacío): nada que duplicar")
        return set()
    eventos = set()
    for t in live.get("tag", []):
        ev = [p.get("value") for p in t.get("parameter", []) if p.get("key") == "eventName"]
        print(f"  ya existe: {t['name']} {ev}")
        eventos.update(e for e in ev if e)
    return eventos


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--contenedor", required=True)
    ap.add_argument("--publicar", action="store_true")
    a = ap.parse_args()

    prop = {"name": f"properties/{PROPIEDAD}"}
    mid = ga4.measurement_id(prop)
    print(f"== GA4 {PROPIEDAD} · {mid}")
    assert mid == "G-P66GR3XMGR", f"ID de medición inesperado: {mid}"

    cuenta, cont = gtm.buscar_contenedor(a.contenedor)
    ws = gtm.workspace(cont)
    print(f"== GTM {cont['name']} ({cont['publicId']}) · cuenta {cuenta['name']}")
    ya = auditar(cont)
    choque = ya & {"whatsapp_click", "form_submit", "cta_click", "tienda_click"}
    if choque:
        raise SystemExit(f"El contenedor ya dispara {choque}: revisar a mano antes de seguir.")

    nuevas = gtm.habilitar_variables(ws, ["clickUrl", "clickText", "clickElement", "pageUrl",
                                          "pagePath"])
    if nuevas:
        print("  variables integradas:", ", ".join(nuevas))
    v, e = upsert_variable(ws, variable_datalayer("DLV — form_name", "form_name"))
    print(f"  variable {e}: {v['name']}")

    comunes = {"pagina": "{{Page Path}}", "texto": "{{Click Text}}", "link_url": "{{Click URL}}"}

    # WhatsApp: SIEMPRE regex, el sitio mezcla wa.me (27) y api.whatsapp (12).
    t, e = gtm.upsert_trigger(ws, gtm.trigger_clic_enlace(
        "Clic — WhatsApp", r"wa\.me|whatsapp", tipo="matchRegex"))
    tag, e2 = gtm.upsert_tag(ws, gtm.tag_ga4_evento(
        "GA4 — whatsapp_click", "whatsapp_click", mid, [t["triggerId"]], comunes))
    print(f"  WhatsApp: trigger {e}, tag {e2}")

    t, e = gtm.upsert_trigger(ws, gtm.trigger_clic_enlace(
        "Clic — CTA contacto", r"/contactanos", tipo="matchRegex"))
    tag, e2 = gtm.upsert_tag(ws, gtm.tag_ga4_evento(
        "GA4 — cta_click", "cta_click", mid, [t["triggerId"]],
        dict(comunes, cta_tipo="contacto")))
    print(f"  CTA contacto: trigger {e}, tag {e2}")

    t, e = gtm.upsert_trigger(ws, gtm.trigger_clic_enlace(
        "Clic — Tienda", r"ventas\.creativeweb\.com\.ec", tipo="matchRegex"))
    tag, e2 = gtm.upsert_tag(ws, gtm.tag_ga4_evento(
        "GA4 — tienda_click", "tienda_click", mid, [t["triggerId"]], comunes))
    print(f"  Tienda: trigger {e}, tag {e2}")

    tag, e = gtm.upsert_tag(ws, gtm.tag_html("Listener — formulario", LISTENER, [2147479553]))
    t, e2 = gtm.upsert_trigger(ws, gtm.trigger_evento_personalizado(
        "Formulario enviado", "form_enviado"))
    tag2, e3 = gtm.upsert_tag(ws, gtm.tag_ga4_evento(
        "GA4 — form_submit", "form_submit", mid, [t["triggerId"]],
        {"pagina": "{{Page Path}}", "form_name": "{{DLV — form_name}}"}))
    print(f"  Formulario: listener {e}, trigger {e2}, tag {e3}")

    if a.publicar:
        cv = gtm.publicar(ws, "Medición de contactos y CTAs",
                          "whatsapp_click, form_submit (clave) + cta_click, tienda_click")
        print(f"== Publicada la versión {cv.get('containerVersionId')}")
        for ev in ("whatsapp_click", "form_submit"):
            _, estado = ga4.marcar_evento_clave(prop, ev)
            print(f"  evento clave {ev}: {estado}")
    else:
        print("== Sin publicar: revisar en Vista previa y correr con --publicar")


if __name__ == "__main__":
    main()
