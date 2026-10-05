#!/usr/bin/env python3
"""Home 2026 de creativeweb.com.ec — diseño F aprobado, en página privada inicio-2026."""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases

VENTAS = "https://ventas.creativeweb.com.ec"


def HTM(html, cls=""):
    s = {"html": html}
    if cls:
        s["_css_classes"] = cls
    return W("html", **s)


def BTNP(texto, url, cls="cw-btn-pill"):
    return W("button", cls, text=texto, size="sm", _element_width="auto",
             link={"url": url, "is_external": "", "nofollow": ""})


def CA(children, url, cls="", **s):
    """Contenedor-enlace (toda la fila clicable)."""
    c = C(children, cls=cls, **s)
    c["settings"]["html_tag"] = "a"
    c["settings"]["link"] = {"url": url, "is_external": "", "nofollow": ""}
    return c


ISO = '<span class="cw-iso"><i></i><i></i><i></i></span>'
LOGO = f'<div class="cw-logo-linea">{ISO} creativeweb</div>'

# ============ HEADER (fijo) ============
header = C([
    C([
        HTM(LOGO),
        C([BTNP("Cotizar", "#contacto"),
           HTM('<div style="display:flex;flex-direction:column;gap:5px;padding:8px 2px">'
               '<span style="width:30px;height:2px;background:#fff;display:block"></span>'
               '<span style="width:30px;height:2px;background:#fff;display:block"></span>'
               '<span style="width:30px;height:2px;background:#fff;display:block"></span></div>')],
          content_width="full", flex_direction="row", flex_align_items="center",
          flex_gap={"column": "18", "row": "10", "isLinked": False, "unit": "px", "size": 18},
          width={"unit": "auto", "size": ""}),
    ], content_width="boxed", flex_direction="row", flex_align_items="center",
       flex_justify_content="space-between", padding=pad(16, 24, 16, 24)),
], cls="cw-2026 cw-header", content_width="full", flex_direction="column")

# ============ HERO partido ============
hero_izq = C([
    H("Creative Web · empresa ecuatoriana de tecnología · Otavalo, desde 2010", "div", cls="cw-cap"),
    H("En Creative Web creamos páginas web, tiendas en línea y programas que hacen crecer tu negocio. "
      "Y lo probamos <b>con datos</b>.", "h1", cls="cw-h1"),
    C([BTNP("Cotiza tu proyecto", "#contacto", "cw-btn-pill cw-btn-lleno"),
       BTNP("Ver trabajo", "#trabajo")],
      content_width="full", flex_direction="row", flex_wrap="wrap",
      flex_gap={"column": "14", "row": "10", "isLinked": False, "unit": "px", "size": 14},
      padding=pad(10, 0, 0, 0)),
    H("sigue bajando", "div", cls="cw-scrollea"),
], cls="cw-hero-izq", content_width="full", width={"unit": "%", "size": 47},
   flex_direction="column", flex_justify_content="flex-end",
   flex_gap={"column": "18", "row": "18", "isLinked": True, "unit": "px", "size": 18},
   padding=pad(130, 40, 56, 32))

hero_der = C([], cls="cw-hero-der", content_width="full",
             width={"unit": "%", "size": 53}, flex_direction="column")

INFORME = """<div class="cw-informe">
 <div class="cab"><span><b>informe SEO</b> — cliente real</span><span>ene–may 2026</span></div>
 <div class="kpis">
  <div class="kpi a"><b>8.952</b><span>visitas desde Google</span></div>
  <div class="kpi"><b>871.854</b><span>veces visto en Google</span></div>
  <div class="kpi t"><b>731</b><span>páginas visitadas</span></div>
 </div>
 <svg viewBox="0 0 560 110" role="img" aria-label="Visitas desde Google en crecimiento">
  <path class="serie" d="M8 94 C60 89 90 82 130 77 S210 65 250 58 S330 43 380 33 S500 15 552 10"
        fill="none" stroke="#00A0E0" stroke-width="3" stroke-linecap="round"/>
  <circle cx="552" cy="10" r="5" fill="#00A090"/>
 </svg>
</div>"""

hero = C([
    C([hero_izq, hero_der], content_width="full", flex_direction="row",
      flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0}),
    W("heading", "cw-palabra", title="creative<small>web</small>", header_size="div"),
    HTM(INFORME, "cw-informe-box"),
], cls="cw-2026 cw-hero", content_width="full", flex_direction="column")

# ============ PORTAFOLIO (claro) ============
def proyecto(nombre, url_txt, grad, desc, tags):
    tags_html = "".join(f"<span>{t}</span>" for t in tags)
    return C([
        C([HTM(f'''<div class="cw-navegador">
          <div class="barra"><i></i><i></i><i></i><span class="url">{url_txt}</span></div>
          <div class="cuerpo"><span class="nl t"></span><span class="nl c50"></span><span class="nl c35"></span><span class="nl btn" style="background:#0070C0"></span></div>
        </div>''')], cls=f"cw-proy-visual {grad}", content_width="full", flex_direction="column",
           flex_justify_content="center", flex_align_items="center"),
        C([
            C([H(nombre, "h3"), T(f"<p>{desc}</p>", cls="cw-proy-desc")],
              content_width="full", flex_direction="column",
              flex_gap={"column": "6", "row": "6", "isLinked": True, "unit": "px", "size": 6}),
            HTM(f'<div class="cw-tags">{tags_html}</div>'),
        ], cls="cw-proy-meta", content_width="full", flex_direction="row",
           flex_justify_content="space-between",
           flex_gap={"column": "18", "row": "10", "isLinked": False, "unit": "px", "size": 18}),
    ], cls="cw-proyecto cw-rev", content_width="full", flex_direction="column")


portafolio = C([
    C([
        H('nuestro trabajo<span class="l2">reciente</span>', "h2", cls="cw-titulo-xl"),
        BTNP("Ver todo", "#", "cw-btn-pill cw-btn-tinta"),
    ], content_width="full", flex_direction="row", flex_justify_content="space-between",
       flex_align_items="flex-end", padding=pad(0, 0, 60, 0)),
    C([
        proyecto("Comercial Hidrobo", "comercialhidrobo.com", "cw-grad-azul",
                 "27.069 visitantes y 8.952 visitas desde Google en 5 meses para el concesionario más grande del norte.",
                 ["WEB", "SEO"]),
        proyecto("Quipuy", "quipuy.com", "cw-grad-cian",
                 "Nuestro sistema de facturación electrónica: miles de facturas emitidas cada mes, sin instalar nada.",
                 ["PRODUCTO", "FACTURACIÓN"]),
        proyecto("Valencia Sports", "valencia-sports.com", "cw-grad-teal",
                 "Tienda en línea de artículos deportivos con 150 productos y pedidos directo al WhatsApp.",
                 ["TIENDA EN LÍNEA"]),
        proyecto("Reina de Otavalo", "reinadeotavalo.com", "cw-grad-gris",
                 "Rediseño completo por los 74 años de la organización: marca, página web y toda su presencia digital.",
                 ["WEB", "MARCA"]),
    ], content_width="full", flex_direction="row", flex_wrap="wrap",
       flex_gap={"column": "56", "row": "70", "isLinked": False, "unit": "px", "size": 56}),
], cls="cw-2026 cw-papel cw-porta", content_width="boxed", flex_direction="column",
   padding=pad(110, 24, 90, 24))

# grid 2 col para proyectos via CSS extra (los hijos al 50%)
for p in portafolio["elements"][1]["elements"]:
    p["settings"]["width"] = {"unit": "%", "size": 46}

# ============ STATEMENT SEO ============
FRASE = ('<span class="palabra-rev">Te</span> <span class="palabra-rev">ayudamos</span> '
         '<span class="palabra-rev">a</span> <span class="palabra-rev">aparecer</span> '
         '<span class="palabra-rev">en</span> <span class="palabra-rev">Google</span> '
         '<span class="palabra-rev">cuando</span> <span class="palabra-rev">tus</span> '
         '<span class="palabra-rev">clientes</span> <b><span class="palabra-rev">te</span> '
         '<span class="palabra-rev">buscan.</span></b>')

TABLA = """<div class="cw-tabla">
 <div class="cab"><span><b>posiciones reales</b> — clientes activos</span><span>90 días</span></div>
 <table>
  <thead><tr><th>consulta en Google</th><th style="text-align:right">posición</th><th style="text-align:right">visitas</th></tr></thead>
  <tbody>
   <tr><td>autos eléctricos ecuador</td><td class="num">5<span class="delta">↑3</span></td><td class="num">140</td></tr>
   <tr><td>facturación electrónica sri</td><td class="num">8<span class="delta">↑5</span></td><td class="num">312</td></tr>
   <tr><td>chery ecuador precios</td><td class="num">6<span class="delta">↑2</span></td><td class="num">436</td></tr>
   <tr><td>correo corporativo empresa</td><td class="num">9<span class="delta">↑6</span></td><td class="num">57</td></tr>
  </tbody>
 </table>
 <div class="pie">fuente: datos oficiales de Google — 2026</div>
</div>"""

statement = C([
    W("heading", "cw-statement-h", title=FRASE, header_size="h2"),
    C([
        C([HTM(TABLA)], content_width="full", width={"unit": "%", "size": 47},
          flex_direction="column", cls="cw-rev"),
        C([
            T("<p>Posicionar tu página en Google es nuestra especialidad. Cada mes recibes un "
              "<b>informe con los datos oficiales de Google</b>: qué busca la gente, en qué lugar "
              "de los resultados apareces y cuántas de esas búsquedas terminaron en tu página.</p>"
              "<p><b>Sin humo.</b> Si un mes no crecemos, el informe también lo dice — y te "
              "explica qué vamos a hacer para corregirlo.</p>", cls="cw-parr"),
            BTNP("Pide tu diagnóstico gratis", "#contacto", "cw-link-flecha"),
        ], content_width="full", width={"unit": "%", "size": 47}, flex_direction="column",
           flex_gap={"column": "24", "row": "24", "isLinked": True, "unit": "px", "size": 24},
           cls="cw-rev"),
    ], content_width="full", flex_direction="row", flex_justify_content="space-between",
       flex_wrap="wrap", padding=pad(70, 0, 0, 0),
       flex_gap={"column": "40", "row": "40", "isLinked": True, "unit": "px", "size": 40}),
], cls="cw-2026 cw-negro cw-statement", content_width="boxed", flex_direction="column",
   padding=pad(130, 24, 110, 24))

# ============ MARQUESINA ============
PALABRAS = ["páginas web", "tiendas en línea", "posicionamiento en google",
            "programas a medida", "hosting", "automatización"]
pista = "".join(f"<span>{p}</span>" for p in (PALABRAS + PALABRAS))
marquesina = C([
    HTM(f'<div class="cw-marquesina" aria-hidden="true"><div class="pista">{pista}</div></div>'),
], cls="cw-2026 cw-negro", content_width="full", flex_direction="column")

# ============ SERVICIOS (filas) ============
def fila(grad, nombre, desc, precio, url, extra=""):
    return CA([
        HTM(f'<div class="cw-thumb" style="background:{grad}">{ISO}</div>'),
        H(nombre, "h3"),
        T(f"<p>{desc}</p>", cls="cw-desc"),
        T(f"<p>{precio}</p>", cls="cw-precio"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls=f"cw-fila cw-rev {extra}", content_width="full")


servicios = C([
    H('lo que hacemos<span class="l2">por tu negocio</span>', "h2", cls="cw-titulo-xl cw-blanco cw-rev"),
    C([
        fila("linear-gradient(140deg,#0E2A44,#0070C0)", "Páginas web",
             "Páginas profesionales, rápidas y hechas para salir en Google desde el primer día.",
             "desde $480", "/servicios/paginas-web/"),
        fila("linear-gradient(140deg,#0B2D3E,#00A0E0)", "Tiendas en línea",
             "Vende las 24 horas: tu tienda cobra, factura al SRI y te avisa cada pedido por WhatsApp.",
             "desde $680", "/servicios/tiendas-online-ecuador/"),
        fila("linear-gradient(140deg,#0C2B26,#00A090)", "Posicionamiento en Google",
             "Nuestra especialidad: que tus clientes te encuentren antes que a tu competencia.",
             "desde $100 <small>/mes</small>", "/servicios/seo-posicionamiento-web/"),
        fila("linear-gradient(140deg,#14243A,#2E4763)", "Programas a tu medida",
             "Convertimos tareas repetitivas — facturas, envíos, reportes — en programas que las hacen solas.",
             "según el proyecto", "/contactanos/"),
        fila("linear-gradient(140deg,#0E2A44,#00A0E0)", "Hosting y dominios",
             "El hogar de tu página en internet y tu dirección .com, con soporte local que sí contesta.",
             "desde $4.99 <small>/mes</small>", "#hosting"),
    ], cls="cw-filas", content_width="full", flex_direction="column",
       flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
       padding=pad(30, 0, 0, 0)),
], cls="cw-2026 cw-negro cw-servicios", content_width="boxed", flex_direction="column",
   padding=pad(110, 24, 110, 24))

# ============ DOMINIOS (claro, buscador WHMpress real) ============
dominios = C([
    H('empieza por<span class="l2">tu dominio</span>', "h2", cls="cw-titulo-xl cw-rev"),
    C([W("shortcode", "cw-rev",
         shortcode='[whmpress_domain_search_ajax placeholder="tunegocio.com" '
                   'button_text="→" html_class="whmpress whmpress_domain_search_ajax"]')],
      cls="cw-buscador", content_width="full", flex_direction="column",
      padding=pad(56, 0, 0, 0)),
    T("<p><b>.com</b> $21.99/año &nbsp;&nbsp; <b>.net</b> $21.99/año &nbsp;&nbsp; "
      "<b>.org</b> $21.99/año &nbsp;&nbsp; <b>.ec</b> $43.99/año &nbsp;&nbsp; "
      "<b>.com.ec</b> $43.99/año</p>", cls="cw-tlds cw-rev"),
    T("<p>Escribe el nombre que quieres para tu página y revisa al instante si está libre. "
      "Si no sabes cuál elegir, te asesoramos gratis.</p>", cls="cw-nota cw-rev"),
], cls="cw-2026 cw-papel cw-dominios", content_width="boxed", flex_direction="column",
   flex_gap={"column": "22", "row": "22", "isLinked": True, "unit": "px", "size": 22},
   padding=pad(110, 24, 110, 24))
dominios["settings"]["_element_id"] = "dominios"

# ============ HOSTING (filas con datos reales) ============
def plan(grad, nombre, specs, precio, url, extra=""):
    return CA([
        HTM(f'<div class="cw-thumb" style="background:{grad}">{ISO}</div>'),
        H(nombre, "h3"),
        T(f"<p>{specs}</p>", cls="cw-specs"),
        T(f"<p>{precio} <small>/mes</small></p>", cls="cw-precio"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls=f"cw-fila cw-rev {extra}", content_width="full")


hosting = C([
    H('planes de hosting<span class="l2">claros y sin sorpresas</span>', "h2",
      cls="cw-titulo-xl cw-blanco cw-rev"),
    C([
        plan("linear-gradient(140deg,#0E2A44,#0070C0)", "Inicial",
             "3 GB de espacio · <em>10 correos</em> con tu dominio · candado de seguridad (SSL) gratis",
             "$4.99", f"{VENTAS}/store/hosting-web/inicial"),
        plan("linear-gradient(140deg,#0B2D3E,#00A0E0)", "Webmaster",
             "10 GB de espacio · <em>20 correos</em> con tu dominio · SSL gratis",
             "$6.99", f"{VENTAS}/store/hosting-web/webmaster"),
        plan("linear-gradient(140deg,#0C2B26,#00A090)", "Pymes",
             "20 GB de espacio · <em>correos ilimitados</em> · SSL gratis · el favorito de los negocios",
             "$7.99", f"{VENTAS}/store/hosting-web/pymes", "destacada"),
        plan("linear-gradient(140deg,#14243A,#2E4763)", "Ilimitado",
             "espacio ilimitado · correos, subdominios y bases de datos <em>sin límite</em> · SSL gratis",
             "$19.99", f"{VENTAS}/store/hosting-web/pro"),
    ], cls="cw-filas", content_width="full", flex_direction="column",
       flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
       padding=pad(30, 0, 0, 0)),
    H("* precios + IVA · precio mensual contratando el plan anual · todos incluyen respaldos y soporte local por WhatsApp",
      "div", cls="cw-aviso"),
], cls="cw-2026 cw-negro cw-hosting", content_width="boxed", flex_direction="column",
   flex_gap={"column": "16", "row": "16", "isLinked": True, "unit": "px", "size": 16},
   padding=pad(110, 24, 110, 24))
hosting["settings"]["_element_id"] = "hosting"

# ============ PRODUCTOS (claro) ============
def prod(nombre, punto, tag, desc, url):
    return CA([
        W("heading", title=f'{nombre}<i style="color:{punto}">.</i>', header_size="h3"),
        T(f"<p><b>{tag}</b>{desc}</p>", cls="cw-que"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls="cw-prod cw-rev", content_width="full")


productos = C([
    H('software propio,<span class="l2">problemas resueltos</span>', "h2", cls="cw-titulo-xl cw-rev"),
    C([
        prod("quipuy", "#00A090", "facturación electrónica",
             "Emite tus facturas al SRI desde el navegador, sin instalar nada.", "https://quipuy.com"),
        prod("sriflow", "#0070C0", "contabilidad",
             "Descarga y organiza tus documentos del SRI en automático, listos para tu contador.", "/contactanos/"),
        prod("boxpli", "#00A0E0", "envíos de tu tienda",
             "Despacha cada pedido en 2 minutos y tu cliente recibe el aviso por WhatsApp.", "https://boxpli.com"),
        prod("dentilab", "#00A090", "consultorios dentales",
             "Agenda, historias clínicas y cobros de tu consultorio en un solo lugar.",
             "/servicios/dentilab-software-clinicas-dentales/"),
    ], cls="cw-prod-lista", content_width="full", flex_direction="column",
       flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
       padding=pad(56, 0, 0, 0)),
], cls="cw-2026 cw-papel cw-productos", content_width="boxed", flex_direction="column",
   padding=pad(110, 24, 110, 24))

# ============ CTA FINAL ============
final = C([
    H('Tu competencia ya está en Google. ¿En qué posición <b>estás tú</b>?', "h2",
      cls="cw-statement-h cw-rev"),
    C([
        T("<p>ventas@creativeweb.com.ec<br>WhatsApp <a href='https://wa.me/593963485983'>+593 96 348 5983</a><br>"
          "Ibarra, Ecuador</p>", cls="cw-datos"),
        BTNP("Quiero mi diagnóstico gratis", "/contactanos/", "cw-btn-grande"),
    ], content_width="full", flex_direction="row", flex_justify_content="space-between",
       flex_align_items="flex-end", flex_wrap="wrap", padding=pad(60, 0, 0, 0),
       flex_gap={"column": "30", "row": "24", "isLinked": False, "unit": "px", "size": 30}),
], cls="cw-2026 cw-negro cw-final", content_width="boxed", flex_direction="column",
   padding=pad(130, 24, 110, 24))
final["settings"]["_element_id"] = "contacto"

# ============ FOOTER ============
footer = C([
    C([
        HTM(LOGO.replace('font-size: 20px', 'font-size: 16px')),
        T('<p><a href="#trabajo">Trabajo</a> &nbsp;&nbsp; <a href="/servicios/">Servicios</a> &nbsp;&nbsp; '
          '<a href="/blog/">Blog</a> &nbsp;&nbsp; <a href="/soporte/">Soporte</a></p>'),
        T('<p class="mini">© 2026 — Ibarra, Ecuador</p>', cls="mini"),
    ], content_width="boxed", flex_direction="row", flex_justify_content="space-between",
       flex_align_items="center", flex_wrap="wrap", padding=pad(40, 24, 40, 24),
       flex_gap={"column": "20", "row": "14", "isLinked": False, "unit": "px", "size": 20}),
], cls="cw-2026 cw-negro cw-pie", content_width="full", flex_direction="column")

HOME = [header, hero, portafolio, statement, marquesina, servicios,
        dominios, hosting, productos, final, footer]

JS = r"""(function () {
  var reducido = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var revs = document.querySelectorAll('.cw-rev');
  if (reducido) { revs.forEach(function (el) { el.classList.add('visto'); }); }
  else {
    var obs = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('visto'); obs.unobserve(e.target); } });
    }, { threshold: 0.12 });
    revs.forEach(function (el) { obs.observe(el); });
  }
  document.querySelectorAll('.cw-statement-h').forEach(function (frase) {
    var spans = frase.querySelectorAll('.palabra-rev');
    if (!spans.length) return;
    if (reducido) { spans.forEach(function (s) { s.classList.add('visto'); }); return; }
    var o2 = new IntersectionObserver(function (es) {
      es.forEach(function (e) {
        if (e.isIntersecting) {
          spans.forEach(function (s, i) { setTimeout(function () { s.classList.add('visto'); }, i * 70); });
          o2.disconnect();
        }
      });
    }, { threshold: 0.4 });
    o2.observe(frase);
  });
})();"""


if __name__ == "__main__":
    emcp.init()

    # 1. página privada inicio-2026 (buscar o crear)
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                          params={"slug": "inicio-2026", "status": "private,draft,publish",
                                  "cb": random.randint(1, 10**9)}, timeout=60)
    encontrada = r.json() if r.ok else []
    if encontrada:
        PID = encontrada[0]["id"]
        print("página existente:", PID)
    else:
        r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                               params={"cb": random.randint(1, 10**9)},
                               json={"title": "Inicio 2026", "slug": "inicio-2026",
                                     "status": "private"}, timeout=60)
        PID = r.json()["id"]
        print("página creada:", PID)

    # 2. CSS del kit (estaba vacío — verificado)
    css = open("cw-kit.css").read()
    rk = emcp.call("emcp-tools-update-page-settings", {"post_id": 1873, "settings": {"custom_css": css}})
    print("kit css:", rk)

    # 3. contenido
    emcp.call("emcp-tools-delete-page-content", {"post_id": PID})
    ri = emcp.call("emcp-tools-import-template", {"post_id": PID, "template_json": HOME})
    print("import:", json.dumps(ri, ensure_ascii=False)[:200])
    n = aplicar_clases(HOME, PID, emcp)
    print("clases:", n)

    # 4. page settings + JS
    emcp.call("emcp-tools-update-page-settings", {"post_id": PID, "settings": {"hide_title": "yes"}})
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": PID})
    ultimo = st["structure"][-1]["id"]
    rj = emcp.call("emcp-tools-add-custom-js", {"post_id": PID, "parent_id": ultimo, "js": JS})
    print("js:", json.dumps(rj)[:120])

    emcp.flush_css()
    print("OK — https://www.creativeweb.com.ec/?page_id=" + str(PID))
