#!/usr/bin/env python3
"""Medición de contactos en dimaparecuador.com (2026-10-06).

GA4 «Dimapar Ecuador» (properties/549438826, G-VWW08N474C) la carga Site Kit con la Google
tag GT-WK5MZQBC. Hasta hoy los contactos no eran conversión: los eventos clave eran los de
Site Kit por defecto (purchase, close_convert_lead, qualify_lead) y ninguno se dispara. El
form_submit que se veía es del buscador (formulario GET nativo), no de las cotizaciones.

Este script reutiliza el Código personalizado de Elementor 488 (antes tenía un gtag
duplicado, pasado a borrador el 6-oct) y pone en él SOLO un listener que envía eventos al
gtag de Site Kit. No carga otra etiqueta.

| Evento              | Disparo                                                        | Clave |
|---------------------|----------------------------------------------------------------|-------|
| whatsapp_click      | enlace wa.me / api.whatsapp                                    | sí    |
| form_contacto       | submit_success de un formulario Elementor (con form_name)      | sí    |
| phone_click         | enlace tel:                                                    | sí    |
| email_click         | enlace mailto:                                                 | no    |
| ficha_tecnica_click | enlace a Google Drive o a un .pdf (fichas y catálogos)         | no    |
| cta_click           | enlace a /contacto/                                            | no    |

Nombre «form_contacto» y no «form_submit» a propósito: form_submit ya lo usa la medición
mejorada de GA4 para el buscador, y mezclarlos inflaría las cotizaciones.

    python3 aplicar_medicion.py        # simulación
    python3 aplicar_medicion.py --ya   # aplica (snippet + GA4)
"""
import base64, json, os, sys, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
RAIZ = os.path.join(AQUI, "..", "..")
sys.path.insert(0, os.path.join(RAIZ, "tracking"))

env = dict(l.strip().split("=", 1) for l in open(os.path.join(RAIZ, ".env")) if l.startswith("DIMAPAR") and "=" in l)
H = {"Authorization": "Basic " + base64.b64encode(f"{env['DIMAPAR_WP_USER']}:{env['DIMAPAR_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}
WP = "https://www.dimaparecuador.com/wp-json/wp/v2"
SNIPPET = 488
PROPIEDAD = "properties/549438826"
MARCA = "cw-medicion-contactos-v1"

LISTENER = """<!-- %s -->
<script>
(function(){
  function ev(nombre, params){
    if (typeof window.gtag === 'function') { window.gtag('event', nombre, params); return; }
    window.dataLayer = window.dataLayer || [];
    (function(){ window.dataLayer.push(arguments); })('event', nombre, params);
  }
  document.addEventListener('click', function(e){
    var t = e.target;
    if (!t || !t.closest) return;
    var a = t.closest('a[href]');
    if (!a) return;
    var href = a.getAttribute('href') || '';
    var base = {pagina: location.pathname};
    var texto = (a.textContent || '').trim().slice(0, 80);
    if (/wa\\.me|whatsapp/i.test(href)) {
      base.link_url = href.split('?')[0]; ev('whatsapp_click', base);
    } else if (/^tel:/i.test(href)) {
      base.link_url = href; ev('phone_click', base);
    } else if (/^mailto:/i.test(href)) {
      base.link_url = href.split('?')[0]; ev('email_click', base);
    } else if (/drive\\.google\\.com|\\.pdf($|[?#])/i.test(href)) {
      base.link_url = href; base.cta_texto = texto; ev('ficha_tecnica_click', base);
    } else if (/\\/contacto\\/?($|[?#])/i.test(href)) {
      base.link_url = href; base.cta_texto = texto; ev('cta_click', base);
    }
  }, true);
  document.addEventListener('DOMContentLoaded', function(){
    if (!window.jQuery) return;
    window.jQuery(document).on('submit_success', function(e){
      var f = e && e.target && e.target.getAttribute ? e.target : null;
      ev('form_contacto', {form_name: f ? (f.getAttribute('name') || '') : '', pagina: location.pathname});
    });
  });
})();
</script>
<!-- /%s -->""" % (MARCA, MARCA)

CLAVE = ["whatsapp_click", "form_contacto", "phone_click"]
QUITAR = ["close_convert_lead", "qualify_lead"]
DIMENSIONES = [("pagina", "Página del contacto", "Ruta donde ocurrió el clic o el envío"),
               ("form_name", "Nombre del formulario", "Atributo name del formulario de Elementor"),
               ("cta_texto", "Texto del enlace", "Texto del enlace de ficha técnica o CTA")]


def wp(metodo, ruta, body=None):
    req = urllib.request.Request(WP + ruta, method=metodo, headers=H, data=json.dumps(body).encode() if body else None)
    return json.load(urllib.request.urlopen(req, timeout=90))


def main():
    ya = "--ya" in sys.argv
    s = wp("GET", f"/elementor_snippet/{SNIPPET}?context=edit")
    os.makedirs(os.path.join(AQUI, "antes"), exist_ok=True)
    open(os.path.join(AQUI, "antes", f"snippet-{SNIPPET}.json"), "w").write(json.dumps(s["meta"], ensure_ascii=False, indent=1))
    print(f"snippet {SNIPPET}: estado {s['status']}, ubicación {s['meta'].get('_elementor_location')}, "
          f"condiciones {s['meta'].get('_elementor_conditions')}")
    if ya:
        r = wp("POST", f"/elementor_snippet/{SNIPPET}", {"status": "publish", "title": "medicion-contactos",
                                                         "meta": {"_elementor_code": LISTENER}})
        print("   →", r["status"], "· listener:", MARCA in r["meta"]["_elementor_code"])

    import ga4
    from ga4 import api, reintentar
    prop = {"name": PROPIEDAD}
    for e in CLAVE:
        print(f"evento clave {e}:", ga4.marcar_evento_clave(prop, e)[1] if ya else "(simulación)")
    for e in QUITAR:
        print(f"quitar {e}:", ga4.desmarcar_evento_clave(prop, e) if ya else "(simulación)")
    a = api()
    exist = {d["parameterName"] for d in a.properties().customDimensions().list(parent=PROPIEDAD).execute().get("customDimensions", [])}
    for p, n, d in DIMENSIONES:
        if p in exist:
            print(f"dimensión {p}: ya existía")
        elif ya:
            reintentar(a.properties().customDimensions().create(parent=PROPIEDAD, body={
                "parameterName": p, "displayName": n, "description": d, "scope": "EVENT"}))
            print(f"dimensión {p}: creada")
        else:
            print(f"dimensión {p}: (simulación)")
    if ya:
        try:
            urllib.request.urlopen(urllib.request.Request("https://www.dimaparecuador.com/wp-json/elementor/v1/cache",
                                                          headers=H, method="DELETE"), timeout=90)
            print("caché de Elementor vaciada")
        except Exception as e:
            print("caché:", e)


if __name__ == "__main__":
    main()
