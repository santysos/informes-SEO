#!/usr/bin/env python3
"""Landing «Correo institucional para la UAFE» — /servicios/correo-institucional-uafe/

Nicho: sujetos obligados a reportar a la UAFE. Para registrar al oficial de cumplimiento,
la UAFE pide «correos electrónicos (personal e institucional, de uso exclusivo del Oficial
del Cumplimiento)» (uafe.gob.ec, registro o cambio del oficial de cumplimiento). Desde el
10-sep-2025 el SRI les avisa al inscribir o actualizar el RUC y tienen 30 días hábiles para
registrarse o se les suspende el RUC. Estrategia completa en ../uafe-2026-10/ESTRATEGIA.md.

Paquete UAFE = dominio .com ($21,99) + Plan Inicial ($59,99): hasta 10 correos y 4.000 MB
compartidos entre las cuentas → $81,98 + IVA al año. Suma exacta de la tienda, sin descuento
inventado.

Reglas de contenido:
- Tú, como el resto del sitio. Sin jerga técnica (nada de SPF, IMAP ni puertos).
- No se afirma que la UAFE rechace Gmail: lo verificado es que pide un correo institucional
  ADEMÁS del personal.
- No se ofrece hacer el trámite ante la UAFE ni asesoría legal: resolvemos el correo.
- La lista de sectores es referencial y remite a la UAFE o al contador para confirmar.

Uso:
  python3 build_uafe.py            # crea o actualiza la página en BORRADOR
  python3 build_uafe.py --publicar # además la publica
"""
import random
import sys
from urllib.parse import quote

import emcp
import schema_seo
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import HTM, BTNP, CA, header, footer, hero_sub, JS

SLUG = "correo-institucional-uafe"
PADRE = 929  # /servicios/
RUTA = f"/servicios/{SLUG}/"
VENTAS = "https://ventas.creativeweb.com.ec"
TIENDA_INICIAL = f"{VENTAS}/store/hosting-web/inicial"
WA_UAFE = ("https://wa.me/593999174980?text="
           + quote("Hola, necesito el correo institucional para registrar al oficial de "
                   "cumplimiento en la UAFE."))
ISO = '<span class="cw-iso"><i></i><i></i><i></i></span>'

TITULO_SEO = "Correo institucional para la UAFE: listo para tu registro"
DESC_SEO = ("La UAFE pide un correo institucional para el oficial de cumplimiento. Dominio y "
            "hasta 10 correos de tu empresa por $81,98 al año, con soporte por WhatsApp.")
FOCUS = "correo institucional uafe"

SERVICIO = {
    "@type": "Service",
    "name": "Correo institucional para el oficial de cumplimiento (UAFE)",
    "serviceType": "Correo electrónico institucional con dominio propio",
    "description": "Dominio y hasta 10 correos con el nombre de la empresa para que los "
                   "sujetos obligados registren al oficial de cumplimiento ante la UAFE, "
                   "configurados por nosotros y con soporte por WhatsApp.",
    "offers": schema_seo.precio(81.98, "Paquete UAFE: dominio .com + hasta 10 correos y "
                                       "4.000 MB compartidos, $81,98 + IVA al año"),
}


def tarjeta(titulo, desc):
    return C([
        H(titulo, "h3", cls="cw-canal-tit"),
        T(f"<p>{desc}</p>", cls="cw-canal-desc"),
    ], cls="cw-canal", content_width="full", flex_direction="column",
       flex_gap={"column": "8", "row": "8", "isLinked": True, "unit": "px", "size": 8},
       padding=pad(24, 22, 24, 22),
       width={"unit": "%", "size": 31}, width_tablet={"unit": "%", "size": 48},
       width_mobile={"unit": "%", "size": 100})


def rejilla(tarjetas, padding=None):
    return C([
        C(tarjetas, content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20}),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=padding or pad(20, 24, 70, 24))


def prosa(html, padding):
    return C([T(html, cls="cw-prosa")], cls="cw-2026 cw-papel", content_width="boxed",
             flex_direction="column", padding=padding)


arbol = [
    header(),
    hero_sub("correo institucional · UAFE",
             'el correo institucional<span class="l2">que te pide la UAFE</span>'),

    prosa("""
<p>Si tu negocio es sujeto obligado, la UAFE te pide registrar a un <strong>oficial de
cumplimiento</strong> con dos correos: uno personal y otro <strong>institucional, de uso
exclusivo del oficial</strong>. El personal puede ser el de siempre. El institucional es el que
lleva el nombre de tu empresa: <strong>cumplimiento@tuempresa.com</strong>.</p>
<p>Si todavía no lo tienes, te lo armamos: registramos tu dominio, creamos las cuentas y te
acompañamos hasta que envíes el primer correo. Con eso ya puedes completar el registro del
oficial sin trabarte en ese paso.</p>
""", pad(70, 24, 20, 24)),

    # ---------------- paquete ----------------
    C([
        H('paquete UAFE<span class="l2">$81,98 + IVA al año</span>', "h2",
          cls="cw-titulo-xl cw-blanco cw-rev"),
        C([
            CA([
                HTM(f'<div class="cw-thumb" style="background:linear-gradient(140deg,#0E2A44,#0070C0)">{ISO}</div>'),
                H("Paquete UAFE", "h3"),
                T("<p>dominio .com de tu empresa · <em>hasta 10 correos</em> · 4.000 MB "
                  "compartidos entre las cuentas · configuración y soporte por WhatsApp</p>",
                  cls="cw-specs"),
                T("<p>$81,98 <small>/año</small></p>", cls="cw-precio"),
                HTM('<div class="cw-ir">→</div>'),
            ], WA_UAFE, cls="cw-fila cw-rev destacada", content_width="full", externo=True),
        ], cls="cw-filas", content_width="full", flex_direction="column",
           flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
           padding=pad(30, 0, 0, 0)),
        H("* precio + IVA · pago anual · si ya tienes dominio, solo pagas los correos · "
          "si prefieres .ec o .com.ec, cambia el valor del dominio",
          "div", cls="cw-aviso"),
        C([BTNP("Lo quiero, escribir por WhatsApp", WA_UAFE, "cw-btn-grande"),
           BTNP("Comprar en línea", TIENDA_INICIAL)],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "16", "row": "12", "isLinked": False, "unit": "px", "size": 16},
          padding=pad(26, 0, 0, 0)),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 70, 24)),

    prosa("""
<h2>Por qué 10 correos y no solo uno</h2>
<p>La UAFE pide que el correo institucional sea <strong>de uso exclusivo del oficial de
cumplimiento</strong>. Eso significa que no sirve el info@ que contesta todo el mundo en la
empresa: el oficial necesita su propia cuenta.</p>
<p>Y casi nunca es una sola persona. Si registras un oficial <strong>titular</strong> y uno
<strong>suplente</strong>, cada uno necesita la suya. Con el paquete te sobran cuentas para
ordenar el resto de la empresa con el mismo dominio:</p>
<ul>
<li><strong>cumplimiento@</strong> para el oficial titular.</li>
<li><strong>suplente@</strong> o <strong>cumplimiento2@</strong> para el suplente.</li>
<li><strong>gerencia@</strong> para el representante legal.</li>
<li><strong>contabilidad@</strong>, <strong>ventas@</strong> o <strong>facturacion@</strong> para el día a día.</li>
</ul>
<p>Las 10 cuentas comparten 4.000 MB. Para correo de trabajo, que es casi todo texto y
documentos, alcanza con holgura. Si algún día se llena, subes de plan sin perder nada.</p>
""", pad(70, 24, 24, 24)),

    C([H("qué incluye el paquete", "h2", cls="cw-tit-seccion cw-rev")],
      cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
      padding=pad(20, 24, 0, 24)),

    rejilla([
        tarjeta("Con el nombre de tu empresa",
                "Tu dominio propio, registrado a nombre de tu empresa. Es tuyo: si algún día "
                "te vas, te lo llevas."),
        tarjeta("Una cuenta para cada oficial",
                "Titular y suplente con su propio correo, como pide la UAFE. Y cuentas de "
                "sobra para el resto del equipo."),
        tarjeta("Lo dejamos funcionando contigo",
                "Creamos las cuentas y las configuramos en tu celular y tu computadora. No "
                "cerramos el tema hasta que envíes un correo de prueba."),
        tarjeta("Funciona donde ya trabajas",
                "Se lee desde Gmail, Outlook, el celular o el navegador. No hay que aprender "
                "un programa nuevo."),
        tarjeta("Llega a la bandeja, no al spam",
                "Lo dejamos configurado para que tus correos lleguen a la bandeja de entrada "
                "del destinatario. Tú no tienes que tocar nada."),
        tarjeta("Soporte por WhatsApp",
                "Te contesta una persona que conoce tu cuenta. Sin formularios ni tickets, y "
                "desde cualquier provincia del Ecuador."),
    ]),

    prosa("""
<h2>Así lo resolvemos, paso a paso</h2>
<ol>
<li><strong>Nos escribes por WhatsApp</strong> y elegimos juntos el dominio: casi siempre el
nombre de tu empresa terminado en .com.</li>
<li><strong>Registramos el dominio</strong> a nombre de tu empresa y creamos las cuentas que
necesitas: la del oficial titular, la del suplente y las que quieras.</li>
<li><strong>Las configuramos contigo</strong> en el celular y la computadora del oficial, y
probamos que envíe y reciba.</li>
<li><strong>Ya puedes registrar al oficial en la UAFE</strong> con su correo institucional
funcionando.</li>
</ol>
<p>Si ya tienes dominio, queda funcionando el mismo día. Si hay que registrarlo, entre uno y
tres días hábiles.</p>
<p>Todo se hace a distancia. Atendemos a negocios de todo el Ecuador desde Otavalo, sin que
tengas que moverte de tu oficina.</p>

<h2>¿Tu negocio es sujeto obligado a reportar a la UAFE?</h2>
<p>Desde septiembre de 2025, cuando inscribes o actualizas tu RUC, el sistema te indica si
tienes que registrarte en la UAFE. Si es tu caso, tienes <strong>30 días hábiles</strong>
para hacerlo; si no, el SRI puede <strong>suspender tu RUC</strong>.</p>
<p>Entre los sectores que tienen que registrarse están, por ejemplo:</p>
<ul>
<li>Comercializadoras de vehículos.</li>
<li>Constructoras e inmobiliarias.</li>
<li>Negocios de joyas, metales y piedras preciosas.</li>
<li>Notarías.</li>
<li>Empresas de transferencia de fondos.</li>
<li>Cooperativas, cajas de ahorro, cajas y bancos comunales.</li>
<li>Asesores productores de seguros y fundaciones.</li>
</ul>
<p>La lista la define la UAFE y se ha ampliado en los últimos años. Si no estás seguro de si
tu negocio entra, confírmalo con tu contador o directamente en la UAFE antes de que corra el
plazo.</p>

<h2>Lo que hacemos y lo que no</h2>
<p>Te resolvemos el correo institucional, y lo hacemos bien. <strong>No hacemos el trámite
ante la UAFE ni damos asesoría legal</strong> sobre prevención de lavado de activos: eso lo
lleva tu negocio con su contador, su abogado o su oficial de cumplimiento. Preferimos
decírtelo claro desde el principio.</p>
""", pad(30, 24, 40, 24)),

    prosa("""
<h2>Preguntas frecuentes sobre el correo para la UAFE</h2>

<h3>¿Qué es un correo institucional?</h3>
<p>Es el que lleva el dominio de tu empresa u organización, como nombre@tuempresa.com, en vez
de una cuenta gratuita a nombre de una persona. Identifica a la institución, no solo a quien lo
usa.</p>

<h3>¿Puedo usar mi Gmail como correo institucional?</h3>
<p>La UAFE pide dos correos distintos: uno personal y uno institucional. Tu Gmail puede ser el
personal. Para el institucional lo que corresponde es una cuenta con el dominio de tu empresa,
que es justamente lo que te armamos.</p>

<h3>¿El oficial de cumplimiento puede usar el correo general de la empresa?</h3>
<p>No es lo recomendable: la UAFE indica que el correo institucional es de uso exclusivo del
oficial. Por eso le creamos una cuenta propia, separada del info@ o del correo de ventas.</p>

<h3>¿Qué pasa si cambia el oficial de cumplimiento?</h3>
<p>Cambias la contraseña de la cuenta o creas una nueva para la persona que entra, en un par
de minutos. Recuerda que el cambio de oficial también se informa a la UAFE.</p>

<h3>¿Cuánto tarda en estar funcionando?</h3>
<p>Si ya tienes el dominio, el mismo día. Si hay que registrarlo, entre uno y tres días
hábiles, casi todo tiempo de trámite. Con el plazo de la UAFE de 30 días hábiles, conviene
resolverlo en la primera semana.</p>

<h3>¿Cuánto cuesta el paquete UAFE?</h3>
<p>$81,98 + IVA al año: el dominio .com y hasta 10 correos con 4.000 MB compartidos. Si ya
tienes un dominio, solo pagas los correos.</p>

<h3>¿Atienden negocios de otras provincias?</h3>
<p>Sí. Todo el proceso es a distancia y el soporte es por WhatsApp, así que da igual si tu
negocio está en Quito, Guayaquil, Cuenca o cualquier otra ciudad.</p>

<h3>¿Me ayudan a hacer el registro en la UAFE?</h3>
<p>No hacemos el trámite: eso lo hace tu negocio en la plataforma de la UAFE, normalmente con
su contador. Lo que sí hacemos es dejarte el correo institucional funcionando y probado, para
que ese paso no te detenga.</p>

<h3>¿Ya tengo correo con mi dominio, me sirve?</h3>
<p>Si ya tienes correos con el dominio de tu empresa, solo necesitas crear una cuenta exclusiva
para el oficial. Si los tienes con nosotros, escríbenos y la creamos. Para el resto de la
empresa, mira nuestros <a href="/servicios/correos-corporativos-empresariales/">correos
corporativos</a>.</p>
""", pad(20, 24, 80, 24)),

    C([
        W("heading", "cw-cta-mini", header_size="h2",
          title='¿Te corre el plazo de la UAFE? <b>Resolvamos el correo</b>'),
        C([BTNP("Escríbenos por WhatsApp", WA_UAFE, "cw-btn-grande"),
           BTNP("Comprar en línea", TIENDA_INICIAL)],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "16", "row": "12", "isLinked": False, "unit": "px", "size": 16}),
    ], cls="cw-2026 cw-negro cw-final", content_width="boxed", flex_direction="column",
       flex_gap={"column": "30", "row": "30", "isLinked": True, "unit": "px", "size": 30},
       padding=pad(90, 24, 90, 24)),

    footer(),
]


def crear_o_buscar():
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                          params={"slug": SLUG, "status": "publish,draft,private",
                                  "context": "edit", "cb": random.randint(1, 10**9)}, timeout=60)
    if r.ok and r.json():
        return r.json()[0]["id"]
    r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)}, timeout=90,
                           json={"title": "Correo institucional para la UAFE", "slug": SLUG,
                                 "parent": PADRE, "status": "draft",
                                 "template": "elementor_canvas"})
    r.raise_for_status()
    return r.json()["id"]


def montar(pid, publicar):
    emcp.call("emcp-tools-delete-page-content", {"post_id": pid})
    ri = emcp.call("emcp-tools-import-template", {"post_id": pid, "template_json": arbol})
    payload = {"template": "elementor_canvas", "parent": PADRE,
               "meta": {"_elementor_edit_mode": "builder",
                        "_elementor_template_type": "wp-page",
                        "_yoast_wpseo_title": TITULO_SEO,
                        "_yoast_wpseo_metadesc": DESC_SEO,
                        "_yoast_wpseo_focuskw": FOCUS}}
    if publicar:
        payload["status"] = "publish"
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)}, json=payload, timeout=90)
    emcp.call("emcp-tools-update-page-settings", {"post_id": pid, "settings": {"hide_title": "yes"}})
    aplicar_clases(arbol, pid, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": pid})
    emcp.call("emcp-tools-add-custom-js", {"post_id": pid,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    j = r.json() if r.ok else {}
    print(f"landing UAFE: pid={pid} elementos={ri.get('elements_count')} "
          f"estado={j.get('status')} url={j.get('link', r.status_code)}")


if __name__ == "__main__":
    publicar = "--publicar" in sys.argv
    emcp.init()
    pid = crear_o_buscar()
    montar(pid, publicar)
    schema_seo.inyectar(pid, RUTA, SERVICIO)
    schema_seo.regenerar_css(pid, RUTA)
    emcp.flush_css()
    print("OK")
