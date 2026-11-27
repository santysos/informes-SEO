#!/usr/bin/env python3
"""Página de dominios (1699) — última money page con diseño viejo.

Tres problemas que arregla:
  1. No tenía ningún H1 (el «DOMINIOS» de arriba era un h2 suelto de 2020).
  2. Seguía con el diseño anterior y el trato de «usted», a contramano del resto.
  3. Los precios de los TLD estaban desactualizados ($18.99/$39.99) respecto a
     la portada, que ya muestra $21.99 y $43.99.

El slug pasa de `venta-dominios-ecuador-comprar-dominio` (keyword stuffing) a
`comprar-dominio-ecuador`, con 301 desde el anterior.

Se conserva el buscador de WHMpress: es el shortcode
`[whmpress_domain_search_ajax]` dentro de un text-editor, igual que antes.
"""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import HTM, BTNP, header, footer, hero_sub, cta_mini, JS, WA

PID = 1699
SLUG_NUEVO = "comprar-dominio-ecuador"
SLUG_VIEJO = "venta-dominios-ecuador-comprar-dominio"

BUSCADOR = ('[whmpress_domain_search_ajax placeholder="Escribe el dominio que quieres" '
            'button_text="Buscar" html_class="whmpress whmpress_domain_search_ajax"]')


def tarjeta(titulo, desc):
    return C([
        H(titulo, "h3", cls="cw-canal-tit"),
        T(f"<p>{desc}</p>", cls="cw-canal-desc"),
    ], cls="cw-canal", content_width="full", flex_direction="column",
       flex_gap={"column": "8", "row": "8", "isLinked": True, "unit": "px", "size": 8},
       padding=pad(24, 22, 24, 22),
       width={"unit": "%", "size": 31}, width_tablet={"unit": "%", "size": 48},
       width_mobile={"unit": "%", "size": 100})


dominios = [
    header(),
    hero_sub("dominios web", 'el nombre de tu empresa <span class="l2">en internet</span>'),

    # ---- intro ----
    C([
        T("""
<p>El dominio es la dirección con la que te van a buscar: <strong>tuempresa.com</strong>. Es lo
primero que se contrata y lo único que no se puede cambiar después sin empezar de cero, así que
vale la pena elegirlo bien.</p>
<p>Nosotros lo registramos <strong>a nombre de tu empresa</strong>, te avisamos antes de cada
renovación y te acompañamos en la parte que nadie explica: qué extensión te conviene, qué hacer
si el nombre que querías está tomado y cómo conectarlo con tu página y tus correos.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 24, 24)),

    # ---- buscador + precios ----
    C([
        H('¿está libre el nombre<span class="l2">que tienes en mente?</span>', "h2",
          cls="cw-titulo-xl cw-blanco cw-rev"),
        T("<p>Escríbelo y te decimos en el momento qué extensiones están disponibles. "
          "La consulta es gratis y no compromete a nada.</p>", cls="cw-nota cw-rev"),
        T(BUSCADOR, cls="cw-buscador"),
        HTM('<div class="cw-tlds">'
            '<span><b>.com</b> $21.99</span>'
            '<span><b>.net</b> $21.99</span>'
            '<span><b>.org</b> $21.99</span>'
            '<span><b>.ec</b> $43.99</span>'
            '<span><b>.com.ec</b> $43.99</span>'
            '</div>', cls="cw-rev"),
        H("* precios por año + IVA · incluyen la gestión del registro y el aviso de renovación",
          "div", cls="cw-aviso"),
    ], cls="cw-2026 cw-negro cw-dominios", content_width="boxed", flex_direction="column",
       flex_gap={"column": "16", "row": "16", "isLinked": True, "unit": "px", "size": 16},
       padding=pad(70, 24, 70, 24)),

    # ---- qué extensión ----
    C([
        T("""
<h2>Qué extensión te conviene para un negocio en Ecuador</h2>
<p>Es la pregunta que más nos hacen. La respuesta corta: <strong>.com si vendes fuera del país o
quieres sonar internacional; .ec o .com.ec si tu clientela es ecuatoriana</strong> y quieres que
se note.</p>
<ul>
<li><strong>.com</strong> — la más reconocida del mundo. Cuesta menos, pero los nombres buenos
están tomados hace años.</li>
<li><strong>.com.ec</strong> — dice que eres de acá. Suele estar libre cuando el .com no lo
está.</li>
<li><strong>.ec</strong> — más corta y más cara. Funciona bien para marcas de una sola
palabra.</li>
</ul>
<p>Registrar el .com y el .com.ec del mismo nombre cuesta poco y evita que alguien más se quede
con la versión que no tomaste. Es el consejo que damos siempre y el que más agradecen dos años
después.</p>

<h2>Cómo saber si el nombre que quieres está libre</h2>
<p>Se consulta en segundos con el buscador de arriba, o nos escribes el nombre y te decimos qué
extensiones están disponibles y cuánto cuesta cada una.</p>
<p>Si está tomado, no siempre es callejón sin salida: a veces el dueño no lo usa y se puede
negociar, y a veces conviene más ajustar el nombre que pelear por él. Ojo con los que aparecen
«en venta» como dominio premium: esos suelen pedir cifras de cuatro dígitos.</p>

<h2>Errores que salen caros</h2>
<ul>
<li><strong>Registrarlo a nombre del proveedor y no de la empresa.</strong> El dominio es de
quien figura en el registro. Nosotros siempre lo ponemos a tu nombre, y si un día te quieres ir,
te lo llevas.</li>
<li><strong>Dejar que se venza.</strong> Un dominio caído tumba la web y los correos el mismo
día, y recuperarlo puede costar mucho más que renovarlo.</li>
<li><strong>Elegir un nombre difícil de dictar por teléfono.</strong> Si hay que deletrearlo,
está mal elegido.</li>
<li><strong>Usar guiones o números.</strong> La gente los olvida y termina en otro sitio.</li>
</ul>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 24, 24)),

    # ---- incluido ----
    C([
        H("qué incluye registrar tu dominio con nosotros", "h2", cls="cw-tit-seccion cw-rev"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(20, 24, 0, 24)),

    C([
        C([
            tarjeta("A nombre de tu empresa",
                    "El registro queda con los datos de tu empresa como titular, no con los "
                    "nuestros. Puedes transferirlo a otro proveedor cuando quieras."),
            tarjeta("Aviso antes de que venza",
                    "Te escribimos antes de cada renovación. Nadie pierde un dominio por "
                    "distracción si alguien está mirando el calendario."),
            tarjeta("Configuración incluida",
                    "Lo conectamos con tu hosting, tu página y tus correos. Los registros DNS los "
                    "manejamos nosotros; tú no tienes que entenderlos."),
            tarjeta("Transferencias sin caídas",
                    "Si ya tienes un dominio en otro proveedor, lo traemos sin que tu web ni tus "
                    "correos dejen de funcionar en el proceso."),
            tarjeta("Varias extensiones a la vez",
                    "Si quieres proteger tu marca, registramos el .com y el .com.ec juntos y "
                    "hacemos que apunten al mismo sitio."),
            tarjeta("Soporte por WhatsApp",
                    "Cuando algo del dominio no funciona escribes a un número y contesta alguien "
                    "que conoce tu cuenta. Sin tickets ni esperas de 48 horas."),
        ], content_width="full", flex_direction="row", flex_wrap="wrap",
           flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20}),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(20, 24, 70, 24)),

    # ---- FAQ ----
    C([
        T("""
<h2>Preguntas frecuentes</h2>

<h3>¿El dominio es mío o de ustedes?</h3>
<p>Tuyo. Queda a nombre de tu empresa y puedes llevártelo cuando quieras.</p>

<h3>¿Necesito hosting para tener dominio?</h3>
<p>No, son cosas distintas. Pero sin hosting el dominio no muestra nada: sí puedes usarlo solo
para <a href="/servicios/correos-corporativos-empresariales/">correos corporativos</a>. Si además
quieres una página, mira los <a href="/servicios/hosting-web-ecuador/">planes de hosting</a>.</p>

<h3>¿Puedo traer un dominio que ya tengo?</h3>
<p>Sí, se transfiere sin perder la web ni los correos. Nos encargamos del trámite.</p>

<h3>¿Cuánto dura el registro?</h3>
<p>Un año, renovable. Te avisamos antes de que venza.</p>

<h3>¿Cuánto tarda en funcionar?</h3>
<p>El registro es inmediato. Que el nombre responda en todo el mundo puede tomar unas horas
mientras se propaga por internet; normalmente en menos de una hora ya está andando.</p>

<h3>¿Y si quiero una página web con ese dominio?</h3>
<p>Lo hacemos todo junto: dominio, hosting, correos y
<a href="/servicios/paginas-web/">el desarrollo de la página</a>. Es lo que hace la mayoría de
nuestros clientes y así no queda nada suelto entre proveedores.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(20, 24, 80, 24)),

    cta_mini(),
    footer(),
]


def montar():
    emcp.call("emcp-tools-delete-page-content", {"post_id": PID})
    ri = emcp.call("emcp-tools-import-template", {"post_id": PID, "template_json": dominios})
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{PID}", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"template": "elementor_canvas", "slug": SLUG_NUEVO,
                                 "meta": {"_elementor_edit_mode": "builder",
                                          "_elementor_template_type": "wp-page"}},
                           timeout=90)
    emcp.call("emcp-tools-update-page-settings", {"post_id": PID, "settings": {"hide_title": "yes"}})
    aplicar_clases(dominios, PID, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": PID})
    emcp.call("emcp-tools-add-custom-js", {"post_id": PID,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    print(f"dominios: pid={PID} elementos={ri.get('elements_count')} "
          f"url={r.json().get('link') if r.ok else r.status_code}")


def crear_redireccion():
    origen = f"/servicios/{SLUG_VIEJO}/"
    destino = f"/servicios/{SLUG_NUEVO}/"
    r = emcp._session.get(emcp.BASE + "/wp-json/redirection/v1/redirect", headers=emcp.HEAD,
                          params={"filterBy[url]": origen, "cb": random.randint(1, 10**9)},
                          timeout=60)
    if r.ok and r.json().get("items"):
        print("redirección: ya existía")
        return
    r = emcp._session.post(emcp.BASE + "/wp-json/redirection/v1/redirect", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"url": origen, "action_data": {"url": destino},
                                 "action_type": "url", "action_code": 301,
                                 "match_type": "url", "group_id": 1,
                                 "title": "Dominios: slug viejo → comprar-dominio-ecuador",
                                 "status": "enabled"}, timeout=60)
    print("redirección:", r.status_code,
          json.dumps(r.json(), ensure_ascii=False)[:200] if r.ok else r.text[:200])


if __name__ == "__main__":
    emcp.init()
    montar()
    crear_redireccion()
    emcp.flush_css()
    print("OK dominios")
