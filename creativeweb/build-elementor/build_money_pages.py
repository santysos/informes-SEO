#!/usr/bin/env python3
"""Migración de las money pages viejas al diseño 2026.

- Correos corporativos (931): mantiene su slug.
- Hosting web (1282): el slug viejo tenía 180+ caracteres con las 20 provincias
  del país («hosting-web-ecuador-servidor-pagina-web-quito-otavalo-…-morona»);
  pasa a `hosting-web-ecuador` con un 301 desde el anterior.

Todo el copy SEO se extrajo del Elementor viejo antes de tocar nada
(`migracion-money/texto-931.md` y `texto-1282-limpio.md`, respaldos completos en
`backups-cutover/pagina-{id}-original.json`). Se conserva el contenido y los
metadatos de Yoast; se normalizó el trato de «usted» a «tú» para que coincida
con el resto del sitio 2026, sin cambiar términos de búsqueda.
"""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import HTM, BTNP, CA, header, footer, hero_sub, cta_mini, JS, WA

CORREOS = 931
HOSTING = 1282
SLUG_HOSTING_NUEVO = "hosting-web-ecuador"
SLUG_HOSTING_VIEJO = ("hosting-web-ecuador-servidor-pagina-web-quito-otavalo-ibarra-galapagos-"
                      "azuay-bolivar-canar-carchi-chimborazo-cotopaxi-el-oro-esmeraldas-guayas-"
                      "imbabura-loja-los-rios-manabi-morona")
VENTAS = "https://ventas.creativeweb.com.ec"
ISO = '<span class="cw-iso"><i></i><i></i><i></i></span>'


def tarjeta(titulo, desc):
    return C([
        H(titulo, "h3", cls="cw-canal-tit"),
        T(f"<p>{desc}</p>", cls="cw-canal-desc"),
    ], cls="cw-canal", content_width="full", flex_direction="column",
       flex_gap={"column": "8", "row": "8", "isLinked": True, "unit": "px", "size": 8},
       padding=pad(24, 22, 24, 22),
       width={"unit": "%", "size": 31}, width_tablet={"unit": "%", "size": 48},
       width_mobile={"unit": "%", "size": 100})


def rejilla(tarjetas, cls="cw-2026 cw-papel", padding=None):
    return C([
        C(tarjetas, content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20}),
    ], cls=cls, content_width="boxed", flex_direction="column",
       padding=padding or pad(20, 24, 70, 24))


def plan(grad, nombre, specs, precio, url, extra=""):
    return CA([
        HTM(f'<div class="cw-thumb" style="background:{grad}">{ISO}</div>'),
        H(nombre, "h3"),
        T(f"<p>{specs}</p>", cls="cw-specs"),
        T(f"<p>{precio} <small>/mes</small></p>", cls="cw-precio"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls=f"cw-fila cw-rev {extra}", content_width="full", externo=True)


# ===================== CORREOS CORPORATIVOS (931) =====================

correos = [
    header(),
    hero_sub("correo corporativo",
             'correo con el nombre<span class="l2">de tu empresa</span>'),

    C([
        T("""
<p>La primera impresión cuenta. Un correo con el dominio de tu empresa —<strong>nombre@tuempresa.com</strong>
en vez de una cuenta gratuita— proyecta confianza desde el primer contacto con clientes,
proveedores y colaboradores.</p>
<p>Te damos <strong>correos corporativos con dominio propio</strong> para empresas de Ecuador:
seguros, personalizados y configurados por nosotros hasta que envíes el primero.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 20, 24)),

    rejilla([
        tarjeta("Cuentas con tu dominio",
                "Se leen desde Gmail, Outlook, el celular o el navegador. Incluyen certificado "
                "de seguridad SSL, y espacio ilimitado por cuenta en el plan Pro."),
        tarjeta("Antivirus y antispam",
                "Filtro antispam y tecnología antivirus que te protegen de malware y de archivos "
                "infectados antes de que lleguen a tu bandeja."),
        tarjeta("En todos tus dispositivos",
                "Compatible con Outlook y Thunderbird, y con iPhone, Android, tablets y "
                "computadoras. Lo configuramos nosotros la primera vez."),
        tarjeta("Compatibilidad asegurada",
                "Funciona con cientos de programas de correo —Outlook, Thunderbird, Mail de Apple, "
                "Evolution— en Mac, Windows y Linux."),
        tarjeta("Llegan a la bandeja, no al spam",
                "Dejamos tu correo configurado para que llegue a la bandeja de entrada del "
                "destinatario. Tú no tienes que tocar nada."),
        tarjeta("Panel cPanel en español",
                "Crea, elimina o modifica cuentas y cambia contraseñas con un par de clics. "
                "No necesitas ser programador ni técnico."),
    ]),

    C([
        T("""
<h2>No lo vas a hacer solo</h2>
<p>Esta es la diferencia con contratar el correo a una empresa grande, y conviene decirla sin
rodeos: ahí te quedas solo con un manual. Acá te acompañamos hasta que tu primer correo esté
funcionando.</p>
<p>Creamos la primera cuenta contigo, te la dejamos andando en el celular y en la computadora,
y no cerramos el tema hasta que envíes y recibas un mensaje de prueba. Si después necesitas
otra cuenta, o alguien nuevo entra al equipo, nos escribes y lo resolvemos.</p>

<h2>Soporte por WhatsApp, con una persona</h2>
<p>Cuando algo no funciona, escribes a un WhatsApp y te contesta alguien que conoce tu cuenta.
No hay formulario, ni número de ticket, ni esperar respuesta en 48 horas. Es lo que ninguno de
los proveedores grandes puede ofrecerte, y es la razón por la que la mayoría de nuestros
clientes se quedan.</p>

<h2>Nos encargamos de que tus correos lleguen</h2>
<p>Un correo empresarial mal configurado termina en la carpeta de spam del destinatario. Es el
problema más común y el más invisible: crees que enviaste y del otro lado nunca lo vieron.</p>
<p>Eso lo dejamos resuelto nosotros, con la configuración que hace falta para que tus mensajes
lleguen a la bandeja de entrada. No tienes que entender cómo funciona ni tocar nada: es parte
del servicio.</p>

<h2>Funciona donde ya trabajas</h2>
<p>No hay que aprender un programa nuevo. Tu correo con el dominio de la empresa se lee desde
donde ya estás acostumbrado:</p>
<ul>
<li><strong>Desde Gmail</strong>, en la misma bandeja de siempre.</li>
<li><strong>Desde Outlook</strong>, junto a tus otras cuentas.</li>
<li><strong>Desde el celular</strong>, con las notificaciones normales.</li>
<li><strong>Desde el navegador</strong>, sin instalar nada, en cualquier computadora.</li>
</ul>
<p>La configuración en cada aparato la hacemos nosotros la primera vez, y te explicamos cómo
repetirla si sumas a alguien al equipo.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(30, 24, 40, 24)),

    C([
        T("""
<h2>Preguntas que nos hacen siempre</h2>

<h3>¿Cuántas cuentas puedo tener?</h3>
<p>Depende del plan: desde 10 hasta sin límite. Las creas tú cuando quieras, o te las creamos nosotros.</p>

<h3>¿Puedo pasar los correos que ya tengo?</h3>
<p>Sí. Traemos tu historial del proveedor actual sin que pierdas mensajes ni contactos.</p>

<h3>¿Y si no sé nada de esto?</h3>
<p>No hace falta que sepas. Para eso estamos: te dejamos todo andando y te enseñamos lo poco
que necesitas saber.</p>

<h3>¿Qué pasa si algún día me quiero ir?</h3>
<p>El dominio es tuyo y los correos también. Te los entregamos.</p>

<h3>¿Necesito tener página web?</h3>
<p>No. Con tener el dominio alcanza. Y si algún día la quieres, los correos ya vienen incluidos
en nuestros <a href="/servicios/hosting-web-ecuador/">planes de hosting</a>.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(20, 24, 80, 24)),

    cta_mini(),
    footer(),
]


# ===================== HOSTING WEB (1282) =====================

hosting = [
    header(),
    hero_sub("hosting web en ecuador",
             'tu página, siempre<span class="l2">en línea</span>'),

    C([
        T("""
<p>Alojamiento con <strong>correos corporativos, certificado SSL y panel cPanel en español</strong>,
con soporte local que sí contesta. Si quieres un blog, un gestor de contenidos, tu galería de
fotos o vender en línea, lo instalas en un clic con Softaculous: WordPress, Joomla, Magento y
más de 150 aplicaciones.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 30, 24)),

    C([
        H('planes de hosting<span class="l2">claros y sin sorpresas</span>', "h2",
          cls="cw-titulo-xl cw-blanco cw-rev"),
        C([
            plan("linear-gradient(140deg,#0E2A44,#0070C0)", "Inicial",
                 "3 GB de espacio · <em>10 correos</em> con tu dominio · 1 dominio alojado · "
                 "5 bases de datos · SSL gratis",
                 "$4.99", f"{VENTAS}/store/hosting-web/inicial"),
            plan("linear-gradient(140deg,#0B2D3E,#00A0E0)", "Webmaster",
                 "10 GB de espacio · <em>20 correos</em> · dominios y subdominios ilimitados · "
                 "bases de datos ilimitadas · SSL gratis",
                 "$6.99", f"{VENTAS}/store/hosting-web/webmaster"),
            plan("linear-gradient(140deg,#0C2B26,#00A090)", "Pymes",
                 "20 GB de espacio · <em>correos ilimitados</em> · SSL gratis · "
                 "el favorito de los negocios",
                 "$7.99", f"{VENTAS}/store/hosting-web/pymes", "destacada"),
            plan("linear-gradient(140deg,#14243A,#2E4763)", "Ilimitado",
                 "espacio en disco ilimitado · correos, subdominios y bases de datos "
                 "<em>sin límite</em> · SSL gratis",
                 "$19.99", f"{VENTAS}/store/hosting-web/pro"),
        ], cls="cw-filas", content_width="full", flex_direction="column",
           flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
           padding=pad(30, 0, 0, 0)),
        H("* precios + IVA · el precio se muestra mensual como referencia: el contrato y el pago "
          "son anuales · todos incluyen respaldos y soporte local por WhatsApp",
          "div", cls="cw-aviso"),
    ], cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 70, 24)),

    C([
        T("""
<h2>Qué plan te conviene según lo que tienes</h2>
<p>La diferencia entre planes no está en la velocidad: todos corren en el mismo tipo de
servidor. Lo que cambia es cuántos correos y cuánto espacio necesitas.</p>
<ul>
<li><strong>Un sitio y pocos correos</strong> — el plan Inicial alcanza de sobra.</li>
<li><strong>Varios sitios o varias marcas</strong> — el Webmaster, que no limita dominios.</li>
<li><strong>Una empresa con equipo</strong> — el Pymes, que no pone tope de correos. Es el que más contratan.</li>
<li><strong>Mucho tráfico o muchos proyectos</strong> — el Ilimitado.</li>
</ul>
<p>Si te quedas corto, se cambia de plan sin mover nada ni perder el servicio.</p>

<h2>Qué está incluido y qué se cobra aparte</h2>
<p><strong>Incluido en todos los planes:</strong> certificado de seguridad SSL, panel cPanel en
español, instalador de WordPress y otras aplicaciones, cuentas de
<a href="/servicios/correos-corporativos-empresariales/">correo corporativo</a>, filtro
antispam y soporte por WhatsApp.</p>
<p><strong>Se cobra aparte:</strong> el dominio, que se renueva cada año, y el desarrollo del
sitio si quieres que <a href="/servicios/paginas-web/">lo hagamos nosotros</a>.</p>
<p>No cobramos cuota de activación ni cargos por instalar. Lo decimos porque no todos hacen lo mismo.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(70, 24, 24, 24)),

    C([
        H("todo lo que viene incluido", "h2", cls="cw-tit-seccion cw-rev"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(20, 24, 0, 24)),

    rejilla([
        tarjeta("Panel y recursos",
                "Panel cPanel en español · ancho de banda mensual · subdominios · cuentas FTP · "
                "correo electrónico · 99,98 % de tiempo en línea."),
        tarjeta("Tecnología del servidor",
                "Bases de datos MySQL · servidor Apache · PHP actualizado · Perl · SendMail · "
                "tareas programadas (cron)."),
        tarjeta("Aplicaciones en un clic",
                "Más de 150 programas de código abierto: WordPress, Joomla, Magento y tu propio "
                "blog, instalados sin ayuda técnica."),
        tarjeta("Administración",
                "cPanel actualizado · gestor de correo corporativo · carpetas protegidas con "
                "contraseña · administrador de archivos desde el navegador."),
        tarjeta("Correo incluido",
                "Cuentas según tu plan · webmail, Outlook o celular · configurable en cualquier "
                "dispositivo · antispam avanzado · autorespuestas y reenvíos."),
        tarjeta("Soporte de verdad",
                "WhatsApp, Zoom y TeamViewer · soporte en línea · copias de seguridad que también "
                "puedes hacer tú desde cPanel."),
    ]),

    C([
        T("""
<h2>Preguntas frecuentes</h2>

<h3>¿Puedo migrar mi sitio actual?</h3>
<p>Sí, y lo hacemos nosotros. Tu web sigue funcionando durante el traslado.</p>

<h3>¿Qué pasa si mi sitio crece?</h3>
<p>Se sube de plan sin interrupciones.</p>

<h3>¿El pago es mensual o anual?</h3>
<p>El precio se muestra mensual como referencia, pero el contrato y el pago son anuales.</p>

<h3>¿Hacen respaldos?</h3>
<p>Sí, y tú también puedes hacerlos desde cPanel cuando quieras.</p>
""", cls="cw-prosa"),
    ], cls="cw-2026 cw-papel", content_width="boxed", flex_direction="column",
       padding=pad(20, 24, 80, 24)),

    cta_mini(),
    footer(),
]


def montar(pid, arbol, nombre, slug=None):
    emcp.call("emcp-tools-delete-page-content", {"post_id": pid})
    ri = emcp.call("emcp-tools-import-template", {"post_id": pid, "template_json": arbol})
    payload = {"template": "elementor_canvas",
               "meta": {"_elementor_edit_mode": "builder",
                        "_elementor_template_type": "wp-page"}}
    if slug:
        payload["slug"] = slug
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)}, json=payload, timeout=90)
    emcp.call("emcp-tools-update-page-settings", {"post_id": pid, "settings": {"hide_title": "yes"}})
    aplicar_clases(arbol, pid, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": pid})
    emcp.call("emcp-tools-add-custom-js", {"post_id": pid,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    print(f"{nombre}: pid={pid} elementos={ri.get('elements_count')} "
          f"url={r.json().get('link') if r.ok else r.status_code}")


def crear_redireccion():
    """301 del slug viejo (180+ caracteres) al nuevo, vía plugin Redirection."""
    origen = f"/servicios/{SLUG_HOSTING_VIEJO}/"
    destino = f"/servicios/{SLUG_HOSTING_NUEVO}/"
    r = emcp._session.get(emcp.BASE + "/wp-json/redirection/v1/redirect",
                          headers=emcp.HEAD, params={"filterBy[url]": origen,
                                                     "cb": random.randint(1, 10**9)}, timeout=60)
    if r.ok and r.json().get("items"):
        print("redirección: ya existía")
        return
    r = emcp._session.post(emcp.BASE + "/wp-json/redirection/v1/redirect",
                           headers=emcp.HEAD, params={"cb": random.randint(1, 10**9)},
                           json={"url": origen, "action_data": {"url": destino},
                                 "action_type": "url", "action_code": 301,
                                 "match_type": "url", "group_id": 1,
                                 "title": "Hosting: slug largo → hosting-web-ecuador",
                                 "status": "enabled"}, timeout=60)
    print("redirección:", r.status_code, json.dumps(r.json(), ensure_ascii=False)[:220] if r.ok else r.text[:220])


if __name__ == "__main__":
    emcp.init()
    montar(CORREOS, correos, "correos corporativos")
    montar(HOSTING, hosting, "hosting web", slug=SLUG_HOSTING_NUEVO)
    crear_redireccion()
    emcp.flush_css()
    print("OK money pages")
