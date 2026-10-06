#!/usr/bin/env python3
"""Botón flotante de WhatsApp + medición de contactos en lacasadelbandolin.com (2026-10-06).

GA4 (G-S8L98L3HEL, propiedad 366860071) la carga el plugin de WooCommerce con gtag. Hasta hoy
el WhatsApp 098 078 8561 aparecía solo como texto: no había forma de escribir con un toque ni
de medir contactos. Este Código personalizado de Elementor (ubicación: final del body, todo
el sitio) agrega:

- Botón flotante de WhatsApp. El mensaje dice desde qué página escribe la persona
  (en una ficha de producto, nombra el instrumento).
- Eventos GA4:
  | whatsapp_click | cualquier enlace a wa.me / api.whatsapp (incluido el flotante) | clave |
  | phone_click    | enlace tel:                                                     | no    |
  | producto_click | clic a una ficha /producto/ desde un post del blog              | no    |
  Todos con `pagina` (ruta de origen) y `ubicacion` (flotante, post-medio, post-final…).

    python3 medicion.py          # simulación
    python3 medicion.py --ya     # crea/actualiza el snippet y ajusta GA4
"""
import base64, json, os, sys, urllib.error, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
RAIZ = os.path.join(AQUI, "..", "..")
env = dict(l.strip().split("=", 1) for l in open(os.path.join(RAIZ, ".env")) if l.startswith("BANDOLIN") and "=" in l)
H = {"Authorization": "Basic " + base64.b64encode(f"{env['BANDOLIN_WP_USER']}:{env['BANDOLIN_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}
S = "https://www.lacasadelbandolin.com/wp-json/"
WA = "593980788561"
MARCA = "cw-whatsapp-medicion-v1"
TITULO = "whatsapp-flotante-y-medicion"

CODIGO = """<!-- %(m)s -->
<style>
#cw-wa{position:fixed;right:18px;bottom:18px;z-index:9999;display:flex;align-items:center;gap:10px;
  background:#25d366;color:#fff;border-radius:999px;padding:12px 18px 12px 14px;font:600 15px/1.2 system-ui,sans-serif;
  box-shadow:0 8px 24px rgba(0,0,0,.25);text-decoration:none}
#cw-wa:hover{background:#1ebe5b;color:#fff}
#cw-wa svg{width:26px;height:26px;flex:none}
@media(max-width:600px){#cw-wa span{display:none}#cw-wa{padding:14px}}
</style>
<a id="cw-wa" data-ubicacion="flotante" href="https://wa.me/%(wa)s" target="_blank" rel="noopener" aria-label="Escríbenos por WhatsApp">
<svg viewBox="0 0 32 32" fill="#fff" aria-hidden="true"><path d="M16 3C9 3 3.3 8.6 3.3 15.6c0 2.2.6 4.4 1.7 6.3L3.2 29l7.3-1.9c1.8 1 3.9 1.5 5.9 1.5 7 0 12.7-5.7 12.7-12.6C29.1 8.6 23 3 16 3zm0 23.4c-1.9 0-3.8-.5-5.4-1.5l-.4-.2-4.3 1.1 1.2-4.2-.3-.4a10.4 10.4 0 0 1-1.6-5.6C5.2 9.8 10 5.1 16 5.1c5.9 0 10.8 4.7 10.8 10.5S21.9 26.4 16 26.4zm5.9-7.8c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.6 8.6 0 0 1-4.3-3.7c-.3-.6.3-.5.9-1.6.1-.2 0-.4 0-.5l-1-2.4c-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4s-1.2 1.2-1.2 2.8 1.2 3.3 1.4 3.5 2.4 3.6 5.7 5c2.1.9 2.9 1 4 .8.6-.1 1.9-.8 2.2-1.5s.3-1.4.2-1.5-.3-.2-.6-.3z"/></svg>
<span>¿Te asesoramos?</span></a>
<script>
(function(){
  var WA='%(wa)s';
  function limpio(t){return (t||'').replace(/\\s*[-–|]\\s*La Casa del Bandol[ií]n.*$/i,'').trim();}
  var h1=document.querySelector('h1'); var tema=limpio(h1?h1.textContent:document.title);
  var esProducto=/\\/producto\\//.test(location.pathname);
  var msg=esProducto?('Hola, me interesa el instrumento «'+tema+'» que vi en lacasadelbandolin.com. ¿Está disponible?')
                    :('Hola, vengo de «'+tema+'» en lacasadelbandolin.com. Quisiera asesoría para comprar un instrumento.');
  var b=document.getElementById('cw-wa'); if(b) b.href='https://wa.me/'+WA+'?text='+encodeURIComponent(msg);
  function ev(n,p){ if(typeof window.gtag==='function'){window.gtag('event',n,p);return;}
    window.dataLayer=window.dataLayer||[]; (function(){window.dataLayer.push(arguments);})('event',n,p); }
  var esPost=document.body.classList.contains('single-post');
  document.addEventListener('click',function(e){
    var a=e.target&&e.target.closest?e.target.closest('a[href]'):null; if(!a) return;
    var href=a.getAttribute('href')||''; var u=(a.closest('[data-ubicacion]')||a).getAttribute('data-ubicacion')||'';
    var base={pagina:location.pathname, ubicacion:u};
    if(/wa\\.me|whatsapp/i.test(href)){ base.link_url=href.split('?')[0]; ev('whatsapp_click',base); }
    else if(/^tel:/i.test(href)){ base.link_url=href; ev('phone_click',base); }
    else if(esPost && /\\/producto\\//.test(href)){ base.link_url=href.split('?')[0]; base.producto=(a.getAttribute('data-producto')||a.textContent||'').trim().slice(0,80); ev('producto_click',base); }
  },true);
})();
</script>
<!-- /%(m)s -->""" % {"m": MARCA, "wa": WA}


def call(m, p, b=None):
    try:
        raw = urllib.request.urlopen(urllib.request.Request(S + p, headers=H, method=m, data=json.dumps(b).encode() if b is not None else None), timeout=120).read()
        return json.loads(raw) if raw.strip() else {}
    except urllib.error.HTTPError as e:
        return {"_error": e.code, "_body": e.read()[:300].decode("utf-8", "ignore")}


def main():
    ya = "--ya" in sys.argv
    exist = [s for s in call("GET", "wp/v2/elementor_snippet?context=edit&status=any&per_page=50") if s["title"]["raw"] == TITULO]
    print("snippet existente:", [s["id"] for s in exist])
    if ya:
        body = {"title": TITULO, "status": "publish"}
        if exist:
            sid = exist[0]["id"]
        else:
            r = call("POST", "wp/v2/elementor_snippet", body); print("crear:", r.get("id"), r.get("_error"), r.get("_body", "")[:200]); sid = r["id"]
        for k, v in (("_elementor_location", "elementor_body_end"), ("_elementor_priority", 1), ("_elementor_code", CODIGO),
                     ("_elementor_conditions", ["include/general"])):
            r = call("POST", f"wp/v2/elementor_snippet/{sid}", {"meta": {k: v}})
            print(f"  {k}:", r.get("_error") or "ok", r.get("_body", "")[:150])
        print("cache:", call("DELETE", "elementor/v1/cache"))
        sys.path.insert(0, os.path.join(RAIZ, "tracking"))
        import ga4
        prop = {"name": "properties/366860071"}
        print("clave whatsapp_click:", ga4.marcar_evento_clave(prop, "whatsapp_click")[1])
        for e in ("close_convert_lead", "qualify_lead"):
            print("quitar", e, ga4.desmarcar_evento_clave(prop, e))
        a = ga4.api(); P = "properties/366860071"
        exist_d = {d["parameterName"] for d in a.properties().customDimensions().list(parent=P).execute().get("customDimensions", [])}
        for p_, n_ in (("pagina", "Página del contacto"), ("ubicacion", "Ubicación del botón"), ("producto", "Producto clicado")):
            if p_ not in exist_d:
                ga4.reintentar(a.properties().customDimensions().create(parent=P, body={"parameterName": p_, "displayName": n_, "scope": "EVENT"}))
                print("dimensión", p_, "creada")


if __name__ == "__main__":
    main()
