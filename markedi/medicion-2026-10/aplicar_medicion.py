#!/usr/bin/env python3
"""Medición de contactos en markedi.ec + corrección del correo de la cabecera (2026-10-05).

Auditoría previa: GA4 (G-88TSD23EQB, propiedad 428649383) se carga con gtag desde un
«Código personalizado» de Elementor Pro (elementor_snippet 441, «head»). No hay GTM.
Solo se medía el botón flotante de Click to Chat (evento propio «click to chat»);
formulario, teléfono y correo no se registraban, y el único evento clave era purchase.

En vez de abrir una cuenta GTM nueva (la API no crea cuentas), los eventos se envían con
el mismo gtag, desde el mismo snippet. Nombres iguales a los de los demás clientes:

| Evento         | Disparo                                                   |
|----------------|-----------------------------------------------------------|
| whatsapp_click | enlace wa.me / api.whatsapp, o clic en el botón flotante  |
| form_submit    | submit_success de Elementor (con form_name)               |
| phone_click    | enlace tel:                                               |
| email_click    | enlace mailto:                                            |

Además corrige ventas@markedi.com → ventas@markedi.ec en la cabecera (plantilla 21):
markedi.com no tiene servidor de correo y esos mensajes rebotaban.

    python3 aplicar_medicion.py        # simulación
    python3 aplicar_medicion.py --ya   # aplica
"""
import base64, json, os, sys, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env"))
           if l.startswith("MARKEDI_") and "=" in l)
AUTH = base64.b64encode(f"{env['MARKEDI_WP_USER']}:{env['MARKEDI_WP_APP_PASS']}".encode()).decode()
H = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128",
     "Content-Type": "application/json"}
API = "https://www.markedi.ec/wp-json/wp/v2"
MARCA = "cw-medicion-contactos-v1"

LISTENER = """
<!-- %s -->
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
    var href = a ? (a.getAttribute('href') || '') : '';
    var base = {pagina: location.pathname};
    if (/wa\\.me|whatsapp/i.test(href)) {
      base.link_url = href.split('?')[0]; ev('whatsapp_click', base);
    } else if (!a && t.closest('#ht-ctc-chat, .ht-ctc-chat')) {
      base.link_url = 'boton-flotante'; ev('whatsapp_click', base);
    } else if (/^tel:/i.test(href)) {
      base.link_url = href; ev('phone_click', base);
    } else if (/^mailto:/i.test(href)) {
      base.link_url = href.split('?')[0]; ev('email_click', base);
    }
  }, true);
  document.addEventListener('DOMContentLoaded', function(){
    if (!window.jQuery) return;
    window.jQuery(document).on('submit_success', function(e){
      var f = e && e.target && e.target.getAttribute ? e.target : null;
      ev('form_submit', {form_name: f ? (f.getAttribute('name') || '') : '', pagina: location.pathname});
    });
  });
})();
</script>
<!-- /%s -->""" % (MARCA, MARCA)


def pedir(ruta, data=None):
    req = urllib.request.Request(f"{API}/{ruta}", headers=H, method="POST" if data else "GET",
                                 data=json.dumps(data).encode() if data else None)
    return json.load(urllib.request.urlopen(req, timeout=90))


def main():
    ya = "--ya" in sys.argv
    os.makedirs(os.path.join(AQUI, "antes"), exist_ok=True)

    # 1. Snippet del gtag
    s = pedir("elementor_snippet/441?context=edit")
    code = s["meta"]["_elementor_code"]
    open(os.path.join(AQUI, "antes", "snippet-441-head.html"), "w").write(code)
    if MARCA in code:
        print("snippet 441: ya tiene el listener")
    else:
        print("snippet 441: agrega listener (whatsapp_click, form_submit, phone_click, email_click)")
        if ya:
            r = pedir("elementor_snippet/441", {"meta": {"_elementor_code": code + LISTENER}})
            print("   →", "OK" if MARCA in r["meta"]["_elementor_code"] else "FALLÓ")

    # 2. Correo de la cabecera
    h = pedir("elementor_library/21?context=edit")
    data = h["meta"]["_elementor_data"]
    open(os.path.join(AQUI, "antes", "header-21-elementor_data.json"), "w").write(data)
    n = data.count("ventas@markedi.com")
    print(f"cabecera 21: {n} apariciones de ventas@markedi.com")
    if n and ya:
        r = pedir("elementor_library/21", {"meta": {"_elementor_data": data.replace("ventas@markedi.com", "ventas@markedi.ec")}})
        print("   →", "OK" if "ventas@markedi.com" not in r["meta"]["_elementor_data"] else "FALLÓ")


if __name__ == "__main__":
    main()
