#!/usr/bin/env python3
"""Deja medidos los dos contactos que importan en un sitio WordPress:
clic a WhatsApp y envío de formulario.

    python3 configurar_contacto.py --contenedor GTM-P7MNVQ65 --propiedad OKCARS
    python3 configurar_contacto.py --contenedor GTM-P7MNVQ65 --propiedad OKCARS --publicar

Sin `--publicar` deja todo en el workspace para revisarlo en la interfaz de GTM
y probarlo con el modo Vista previa. Con `--publicar` sale en vivo.

El formulario asume **Elementor** (envía por AJAX, así que GA4 nunca dispara
`form_submit` solo). Para Contact Form 7 o Gravity usar --formulario.
"""
import argparse
import gtm
import ga4

# Listeners por tipo de formulario. Cada uno empuja el mismo evento al dataLayer.
LISTENERS = {
    "elementor": """<script>
(function(){
  document.addEventListener('DOMContentLoaded', function(){
    if (!window.jQuery) return;
    jQuery(document).on('submit_success', function(){
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({event: 'form_enviado'});
    });
  });
})();
</script>""",
    "cf7": """<script>
document.addEventListener('wpcf7mailsent', function(){
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({event: 'form_enviado'});
}, false);
</script>""",
    "gravity": """<script>
(function(){
  document.addEventListener('DOMContentLoaded', function(){
    if (!window.jQuery) return;
    jQuery(document).on('gform_confirmation_loaded', function(){
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({event: 'form_enviado'});
    });
  });
})();
</script>""",
}


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--contenedor", required=True, help="GTM-XXXXXXX o nombre del contenedor")
    ap.add_argument("--propiedad", required=True, help="nombre o ID de la propiedad GA4")
    ap.add_argument("--formulario", default="elementor", choices=sorted(LISTENERS))
    ap.add_argument("--publicar", action="store_true", help="publica la versión en vivo")
    args = ap.parse_args()

    # ── GA4: de dónde sacamos el ID de medición ──────────────────────
    print("== GA4 ==")
    prop = ga4.buscar_propiedad(args.propiedad)
    mid = ga4.measurement_id(prop)
    if not mid:
        raise SystemExit("La propiedad no tiene flujo web con ID de medición.")
    print(f"  propiedad   {prop['displayName']} ({prop['name'].split('/')[-1]})")
    print(f"  medición    {mid}")

    # ── GTM: contenedor y workspace ──────────────────────────────────
    print("\n== GTM ==")
    cuenta, cont = gtm.buscar_contenedor(args.contenedor)
    ws = gtm.workspace(cont)
    print(f"  cuenta      {cuenta['name']}")
    print(f"  contenedor  {cont['name']} ({cont['publicId']})")
    print(f"  workspace   {ws['name']}")

    nuevas = gtm.habilitar_variables(ws, ["clickUrl", "clickElement", "pageUrl"])
    if nuevas:
        print(f"  variables   activadas: {', '.join(nuevas)}")

    # ── WhatsApp ─────────────────────────────────────────────────────
    print("\n== WhatsApp ==")
    t_wa, e1 = gtm.upsert_trigger(ws, gtm.trigger_clic_enlace(
        "Clic — WhatsApp", r"wa\.me|whatsapp", tipo="matchRegex"))
    print(f"  trigger     {e1}: {t_wa['name']}")
    tag_wa, e2 = gtm.upsert_tag(ws, gtm.tag_ga4_evento(
        "GA4 — whatsapp_click", "whatsapp_click", mid, [t_wa["triggerId"]],
        parametros={"link_url": "{{Click URL}}", "pagina": "{{Page URL}}"}))
    print(f"  tag         {e2}: {tag_wa['name']}")

    # ── Formulario ───────────────────────────────────────────────────
    print(f"\n== Formulario ({args.formulario}) ==")
    t_all = _trigger_todas_las_paginas(ws)
    # Nombre fijo a propósito: si dependiera de --formulario, cambiar de plugin
    # crearía una etiqueta nueva en vez de actualizar la existente.
    tag_lis, e3 = gtm.upsert_tag(ws, gtm.tag_html(
        "Listener — formulario", LISTENERS[args.formulario], [t_all]))
    print(f"  listener    {e3}: {tag_lis['name']}")
    t_form, e4 = gtm.upsert_trigger(ws, gtm.trigger_evento_personalizado(
        "Formulario enviado", "form_enviado"))
    print(f"  trigger     {e4}: {t_form['name']}")
    tag_form, e5 = gtm.upsert_tag(ws, gtm.tag_ga4_evento(
        "GA4 — form_submit", "form_submit", mid, [t_form["triggerId"]],
        parametros={"pagina": "{{Page URL}}"}))
    print(f"  tag         {e5}: {tag_form['name']}")

    # ── Publicar ─────────────────────────────────────────────────────
    if args.publicar:
        print("\n== Publicando ==")
        cv = gtm.publicar(ws, "Medición de contactos",
                          "whatsapp_click y form_submit hacia GA4")
        print(f"  versión {cv.get('containerVersionId')} publicada")
    else:
        print("\n  (sin publicar — revisa en GTM y corre con --publicar)")

    # ── Marcar como eventos clave ────────────────────────────────────
    print("\n== Eventos clave en GA4 ==")
    for ev in ("whatsapp_click", "form_submit"):
        _, estado = ga4.marcar_evento_clave(prop, ev)
        print(f"  {ev:<16} {estado}")


def _trigger_todas_las_paginas(ws):
    """El trigger 'All Pages' es integrado y siempre tiene el id 2147479553."""
    return 2147479553


if __name__ == "__main__":
    main()
