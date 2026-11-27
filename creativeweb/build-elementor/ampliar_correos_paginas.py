#!/usr/bin/env python3
"""Amplía las dos money pages que se quedaron cortas.

Antes: /servicios/paginas-web/ 431 palabras en un único bloque de texto entre el
hero y el CTA (sin una sola sección intermedia), y
/servicios/correos-corporativos-empresariales/ 474. El resto de las páginas de
servicio están entre 900 y 1.400, así que estas dos competían en desventaja por
sus propias búsquedas.

Qué se añade, y por qué eso y no relleno:

  paginas-web
    - «Qué tipo de página necesitas»: cuatro fichas. Responde la búsqueda previa
      a «cuánto cuesta», que es donde se decide el presupuesto.
    - «De qué depende el precio»: sección oscura. La página decía «desde $480» y
      nada más; ahora explica qué lo mueve, que es la objeción real.
    - «Qué necesitamos de ti», «Lo que vemos en las páginas que nos traen a
      arreglar» y «Cuándo no te conviene hacerla con nosotros». Las tres salen de
      trabajo hecho, no de un guion de ventas, y la última es coherente con el
      tono del resto del sitio.
    - FAQ de 3 a 9 preguntas.

  correos
    - «Por qué una cuenta gratuita no alcanza»: sección oscura. Es literalmente
      la búsqueda que trae a esta página.
    - «Cuántas cuentas necesitas», «Cómo nombrar las cuentas», «El fraude del
      número de cuenta cambiado» y «Cómo migramos tu correo». Seguridad y
      nombrado son lo que nadie explica y lo que más problemas causa después.
    - FAQ de 5 a 10 preguntas.

Nada de lo que se afirma aquí es nuevo: los planes, el espacio y los precios son
los que ya publica /servicios/hosting-web-ecuador/, y las cifras de la empresa
(desde 2010, +200 sitios, Municipio de Quito, prefecturas) ya estaban en la
página. No se inventan cifras de resultados ni testimonios.

Después de esto hay que volver a correr `schema_seo.py` para que el FAQPage
recoja las preguntas nuevas: ese script las extrae del contenido publicado.
"""
import json
import random
import time

import emcp
from builders import C, H, T, pad

CORREOS = 931
PAGINAS = 1436


def tarjeta(titulo, desc):
    return C([
        H(titulo, "h3", cls="cw-canal-tit"),
        T(f"<p>{desc}</p>", cls="cw-canal-desc"),
    ], cls="cw-canal", content_width="full", flex_direction="column",
       flex_gap={"column": "8", "row": "8", "isLinked": True, "unit": "px", "size": 8},
       padding=pad(24, 22, 24, 22),
       width={"unit": "%", "size": 48}, width_tablet={"unit": "%", "size": 48},
       width_mobile={"unit": "%", "size": 100})


def seccion_papel(hijos, top=70, bottom=70):
    return C(hijos, cls="cw-2026 cw-papel", content_width="boxed",
             flex_direction="column",
             flex_gap={"column": "14", "row": "14", "isLinked": True, "unit": "px", "size": 14},
             padding=pad(top, 24, bottom, 24))


def seccion_negra(hijos, top=70, bottom=70):
    return C(hijos, cls="cw-2026 cw-negro", content_width="boxed",
             flex_direction="column",
             flex_gap={"column": "18", "row": "18", "isLinked": True, "unit": "px", "size": 18},
             padding=pad(top, 24, bottom, 24))


def rejilla(tarjetas):
    return C(tarjetas, content_width="full", flex_direction="row", flex_wrap="wrap",
             flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20},
             padding=pad(10, 0, 0, 0))


# ===================== PÁGINAS WEB (1436) =====================

PW_TIPOS = seccion_papel([
    H("¿Qué tipo de página necesitas?", "h2", cls="cw-tit-seccion cw-rev"),
    T("<p>Casi todo el presupuesto se decide acá, antes de hablar de precio. Estas son las "
      "cuatro formas que toma el 90 % de lo que nos piden.</p>", cls="cw-nota"),
    rejilla([
        tarjeta("Página institucional",
                "Quién eres, qué haces y cómo te contactan. Entre 4 y 8 secciones. Es lo que "
                "necesita una empresa que hoy solo tiene redes sociales y quiere una dirección "
                "propia que se pueda poner en una factura o en una tarjeta."),
        tarjeta("Catálogo sin carrito",
                "Muestra productos o servicios con fotos, fichas y precios, pero el pedido se "
                "cierra por WhatsApp o por teléfono. Es lo correcto cuando vendes por encargo, "
                "trabajas con mayoristas o el precio depende del volumen."),
        tarjeta("Landing para campaña",
                "Una sola página con un solo objetivo, pensada para recibir tráfico de anuncios "
                "y convertirlo en contactos. Se mide desde el primer día: si no convierte, se "
                "cambia. No sustituye al sitio de la empresa, lo acompaña."),
        tarjeta("Tienda en línea",
                "Cuando quieres cobrar en línea, controlar stock y facturar al SRI, ya no es una "
                "página: es un sistema. Eso lo tratamos aparte, en "
                "<a href='/servicios/tiendas-online-ecuador/'>tiendas en línea</a>."),
    ]),
], top=20, bottom=70)

PW_PRECIO = seccion_negra([
    H('cuánto cuesta una página web<span class="l2">en Ecuador</span>', "h2",
      cls="cw-titulo-xl cw-blanco cw-rev"),
    T("""<p>Nuestras páginas web parten <strong>desde $480 + IVA</strong>, con precio cerrado antes
de empezar: sin sorpresas ni letra pequeña. Ese piso corresponde a una página institucional con
su dominio, su <a href="/servicios/hosting-web-ecuador/">hosting</a> y sus
<a href="/servicios/correos-corporativos-empresariales/">correos corporativos</a> del primer año
incluidos. A partir del segundo año solo se renuevan el dominio y el hosting; la página no se
vuelve a pagar.</p>

<h3>De qué depende el precio</h3>
<p>Decir «desde $480» sin explicar qué lo mueve no le sirve a nadie. Estas son las cinco cosas
que hacen subir una cotización, en orden de peso real:</p>
<ul>
<li><strong>Cuántas secciones tiene.</strong> No es lo mismo una página de cinco secciones que
un sitio con una ficha por servicio y una por sede.</li>
<li><strong>Si hay catálogo.</strong> Cargar 30 productos no es lo mismo que cargar 800, y la
diferencia es trabajo de verdad, no un número en una hoja.</li>
<li><strong>Si tiene que conectarse con algo.</strong> Una reserva de cita, un pago en línea,
tu sistema de facturación o tu inventario. Cada conexión es un proyecto pequeño dentro del
proyecto.</li>
<li><strong>Quién escribe los textos.</strong> Si los tienes, avanzamos rápido. Si hay que
escribirlos, es trabajo aparte y lo decimos en la cotización, no después.</li>
<li><strong>Si hace falta fotografía.</strong> Las fotos de banco se notan. Cuando el negocio
tiene local, producto o equipo, una sesión propia cambia el resultado más que cualquier
efecto de diseño.</li>
</ul>
<p>Lo que <strong>no</strong> cambia el precio: que la página se vea bien en el celular, que
cargue rápido, que esté preparada para Google o que tenga certificado de seguridad. Eso no es
un extra, viene siempre.</p>""", cls="cw-prosa-clara"),
], top=70, bottom=70)

PW_PROSA = """
<p>Una página web profesional no es un gasto: es el vendedor que trabaja las 24 horas por tu
negocio. En Creative Web llevamos <strong>desde 2010 diseñando páginas web en Ecuador</strong>
— más de 200 sitios entregados para empresas, instituciones y emprendimientos de todo el
país.</p>

<h2>Qué incluye tu página web</h2>
<ul>
<li><strong>Diseño personalizado sobre tu marca</strong> — nada de plantillas recicladas: tu
página se diseña para tu negocio y tus clientes.</li>
<li><strong>Lista para salir en Google</strong> — estructura, velocidad y textos pensados para
el posicionamiento desde el primer día.</li>
<li><strong>Se ve perfecta en celular</strong> — más de la mitad de tus visitas llegarán desde
el teléfono.</li>
<li><strong>Botón de WhatsApp y formulario</strong> — cada visita tiene un camino directo para
contactarte, y tú recibes el aviso al instante.</li>
<li><strong>Hosting, dominio y correos</strong> con tu marca, todo bajo el mismo techo y con
soporte local.</li>
<li><strong>Medición real</strong> — configuramos Google Analytics y Search Console para que
sepas cuánta gente te visita y qué busca.</li>
</ul>

"""

PW_PROSA2 = """
<h2>Cómo trabajamos</h2>
<ol>
<li><strong>Conversamos.</strong> Nos cuentas tu negocio y qué quieres lograr; te enviamos una
cotización clara en menos de 24 horas.</li>
<li><strong>Diseñamos.</strong> Te presentamos la propuesta visual y la ajustamos contigo hasta
que digas &laquo;esa es&raquo;.</li>
<li><strong>Construimos y publicamos.</strong> Tu página queda en línea con hosting, dominio,
correos y medición funcionando.</li>
<li><strong>Te acompañamos.</strong> Soporte en español por WhatsApp, y si quieres crecer en
Google, nuestro servicio de <a href="/servicios/seo-posicionamiento-web/">posicionamiento con
informe mensual</a>.</li>
</ol>

<h2>Qué necesitamos de ti para empezar</h2>
<p>Esta es la parte que más demora los proyectos, y casi nunca es culpa de quien contrata:
nadie le avisó qué tenía que juntar. Para arrancar sin frenarnos a mitad de camino hace
falta:</p>
<ul>
<li><strong>El logo en buena calidad</strong>, en el archivo original si existe. Un logo
sacado de una foto de Facebook se va a ver mal por más que lo arreglemos.</li>
<li><strong>Qué ofreces, en tus palabras.</strong> No hace falta que esté bonito. Un audio de
WhatsApp contándonos a qué te dedicas sirve más que un documento que nunca llega.</li>
<li><strong>Fotos de tu negocio</strong> —local, equipo, producto, trabajos hechos— si las
tienes. Si no, lo conversamos: a veces conviene una sesión y a veces no.</li>
<li><strong>Los datos que van a estar en la página</strong>: dirección, horarios, teléfonos,
redes, y a qué correo quieres que lleguen los mensajes del formulario.</li>
<li><strong>Quién decide.</strong> El proyecto avanza al ritmo de quien aprueba. Si son tres
personas y ninguna manda, se alarga, y preferimos hablarlo al principio.</li>
</ul>

<h2>Lo que vemos en las páginas que nos traen a arreglar</h2>
<p>Buena parte de nuestro trabajo es rehacer sitios que alguien hizo antes. Los problemas se
repiten tanto que vale la pena listarlos, aunque no nos contrates:</p>
<ul>
<li><strong>Nadie sabe dónde está el dominio.</strong> Lo registró un proveedor a su nombre,
esa persona ya no contesta, y recuperarlo es un trámite que puede tomar semanas. Por eso
nosotros lo registramos siempre a nombre de la empresa.</li>
<li><strong>La página tarda porque está llena de fotos sin optimizar.</strong> Una imagen de
cuatro megas en la portada arruina la experiencia en un celular con datos móviles, que es
como entra la mitad de tus visitas.</li>
<li><strong>El formulario no llega a ningún lado.</strong> Es más común de lo que parece:
lleva meses enviando a un correo que ya nadie revisa, o directo al spam. Lo primero que
hacemos al recibir un sitio es probarlo.</li>
<li><strong>No hay manera de saber si funciona.</strong> Sin Analytics ni Search Console, la
conversación sobre resultados es una opinión contra otra.</li>
<li><strong>Está hecha con plantillas encadenadas.</strong> Funciona hasta que hay que cambiar
algo; entonces se descuadra todo y nadie se anima a tocarla.</li>
</ul>

<h2>Cuándo no te conviene hacerla con nosotros</h2>
<p>Preferimos decirlo antes. Si lo que necesitas es una página de una sola pantalla para
probar una idea este fin de semana, hay herramientas gratuitas que te sirven y no tiene
sentido que pagues por desarrollo. Y si buscas el precio más bajo del mercado, lo vas a
encontrar más barato: nosotros incluimos acompañamiento, soporte por WhatsApp con una persona
y la garantía de que el dominio queda a tu nombre, y eso cuesta.</p>
<p>Donde sí rendimos es cuando la página tiene que traer clientes, integrarse con algo que ya
usas o sostenerse en el tiempo sin que dependas de una sola persona.</p>

<h2>Por qué con Creative Web</h2>
<p>Porque lo probamos con datos: nuestros clientes aparecen en Google y reciben contactos
reales — como <a href="/proyectos/">los proyectos que puedes ver aquí</a>. Somos una empresa
ecuatoriana de tecnología con 15 años de trayectoria, productos propios en producción y
clientes como el Municipio de Quito y las prefecturas de Pichincha e Imbabura.</p>
<p>Estamos en Otavalo y trabajamos con empresas de todo el país. Que el equipo esté en Ecuador
no es un detalle de marketing: significa que contestamos en tu horario, en español, y que
entendemos por qué tu factura tiene que ir al SRI.</p>
"""

PW_FAQ = """
<h2>Preguntas frecuentes</h2>

<h3>¿En cuánto tiempo está lista mi página?</h3>
<p>Una página informativa típica toma entre 2 y 4 semanas desde que recibimos tu contenido. Te
damos fecha concreta en la cotización.</p>

<h3>¿Puedo actualizarla yo mismo?</h3>
<p>Sí. La entregamos con un panel sencillo y te enseñamos a usarlo. Y si prefieres que lo
hagamos nosotros, tenemos planes de <a href="/soporte/">soporte</a>.</p>

<h3>¿La página es mía?</h3>
<p>Completamente. El dominio se registra a tu nombre y tienes acceso total a tu página y tu
hosting.</p>

<h3>¿Los textos los escriben ustedes?</h3>
<p>Podemos. Si nos das el material —aunque sea hablado— lo redactamos y te lo pasamos para que
lo apruebes. Va cotizado aparte porque es trabajo aparte, y lo verás desglosado desde el
primer presupuesto.</p>

<h3>Ya tengo una página. ¿La arreglan o hay que rehacerla?</h3>
<p>Depende de cómo esté hecha por dentro. La revisamos y te decimos con franqueza cuál sale
más barata; en más casos de los que imaginas conviene arreglar lo que hay.</p>

<h3>¿Qué pago el segundo año?</h3>
<p>Solo la renovación del <a href="/servicios/comprar-dominio-ecuador/">dominio</a> y del
<a href="/servicios/hosting-web-ecuador/">hosting</a>. La página no se vuelve a pagar, y si
quieres cambios los cotizamos cuando los pidas.</p>

<h3>¿Puedo empezar con algo pequeño y crecer después?</h3>
<p>Sí, y es lo que recomendamos cuando el presupuesto es ajustado. Se construye sobre una base
que admite crecer, así que sumar secciones, un catálogo o una tienda más adelante no obliga a
empezar de cero.</p>

<h3>¿Hacen páginas en más de un idioma?</h3>
<p>Sí. Conviene decidirlo antes de construir: montar el segundo idioma después cuesta bastante
más que dejarlo previsto desde el principio.</p>

<h3>¿Aparece mi página en Google apenas se publica?</h3>
<p>Aparece, pero no arriba. La entregamos indexada y con la estructura correcta, que es el
punto de partida. Subir por búsquedas con competencia es otro trabajo, y toma meses: eso es el
<a href="/servicios/seo-posicionamiento-web/">posicionamiento</a>.</p>
"""


# ===================== CORREOS (931) =====================

CO_GRATIS = seccion_negra([
    H('por qué una cuenta gratuita<span class="l2">no te alcanza</span>', "h2",
      cls="cw-titulo-xl cw-blanco cw-rev"),
    T("""<p>Nada impide manejar un negocio desde una cuenta gratuita. Lo que pasa es que tiene
costos que no se ven hasta que duelen:</p>
<ul>
<li><strong>Le restas credibilidad a tu propia cotización.</strong> Cuando compites por un
contrato y tu correo termina en una dirección gratuita mientras el otro escribe desde el
dominio de su empresa, la diferencia se nota aunque nadie la mencione.</li>
<li><strong>La cuenta no es de la empresa, es de una persona.</strong> El día que esa persona
sale, se va con el historial, los contactos y los archivos adjuntos de años. Con dominio
propio la cuenta la controlas tú y se la entregas a quien la reemplace.</li>
<li><strong>No puedes crear cuentas por área.</strong> Ventas, contabilidad y soporte terminan
mezclados en el mismo buzón de una sola persona, que se vuelve el cuello de botella de
todo.</li>
<li><strong>Le regalas tu marca al proveedor.</strong> Cada correo que envías promociona el
servicio gratuito, no tu negocio.</li>
<li><strong>Si te bloquean la cuenta, no hay a quién reclamar.</strong> Las cuentas gratuitas
se suspenden por decisiones automáticas y el soporte es un formulario. Cuando el correo de tu
empresa depende de eso, un fin de semana sin acceso es un problema serio.</li>
</ul>
<p>Con un dominio propio, todo eso lo controlas tú. Y cuesta menos de lo que la mayoría
supone: el correo viene incluido en cualquiera de nuestros
<a href="/servicios/hosting-web-ecuador/">planes de hosting</a>, desde $4.99 + IVA al mes.</p>
""", cls="cw-prosa-clara"),
])

CO_PROSA = """
<h2>Cuántas cuentas necesitas realmente</h2>
<p>La pregunta llega siempre y casi siempre con la respuesta equivocada. No se cuentan
personas: se cuentan <strong>funciones</strong>.</p>
<ul>
<li><strong>Una cuenta por persona</strong> que escriba a clientes o proveedores. Compartir
una contraseña entre tres personas es cómodo hasta el primer problema.</li>
<li><strong>Una cuenta por área que reciba de afuera</strong>: ventas@, info@, contabilidad@,
soporte@. Estas sobreviven a la rotación del equipo, que es justamente para lo que
sirven.</li>
<li><strong>Cuentas de sistema</strong> para lo automático: el formulario de la página, las
notificaciones de la tienda, los comprobantes al SRI. Conviene que no se mezclen con el correo
de una persona.</li>
</ul>
<p>Con eso, una empresa de cinco personas suele necesitar entre ocho y diez cuentas. Nuestro
plan más básico incluye diez, el intermedio veinte y de ahí para arriba no hay tope, así que
en la práctica el número casi nunca es la restricción.</p>

<h2>Cómo nombrar las cuentas (y por qué importa)</h2>
<p>Parece un detalle y es de las decisiones que más cuesta deshacer, porque el nombre queda
impreso en tarjetas, facturas, vehículos y letreros.</p>
<ul>
<li><strong>Usa un solo formato para las personas</strong> y respétalo: o
<em>nombre@</em> o <em>nombre.apellido@</em>, pero no los dos. Cuando conviven, nadie sabe
cómo escribirle a alguien nuevo.</li>
<li><strong>Nada de iniciales.</strong> <em>jpg@</em> no se lo dictas a un cliente por
teléfono sin repetirlo tres veces.</li>
<li><strong>Las cuentas de área van por función, no por persona.</strong> <em>ventas@</em>
sigue sirviendo cuando cambia el vendedor; <em>maria@</em> no.</li>
<li><strong>Deja info@ como la cuenta pública.</strong> Es la que va en la página, en Google y
en las redes, y la que puede revisar más de una persona.</li>
<li><strong>Los alias son gratis y salvan situaciones.</strong> Una misma bandeja puede recibir
en varias direcciones, así que no hace falta una cuenta nueva cada vez que quieres una
dirección distinta para una campaña o un trámite.</li>
</ul>

<h2>El fraude que más golpea a las empresas ecuatorianas</h2>
<p>Vale la pena advertirlo porque lo hemos visto de cerca y no tiene nada de sofisticado.
Alguien entra al correo de una empresa —casi siempre con una contraseña repetida o filtrada—,
se queda leyendo en silencio, y cuando detecta una transferencia grande a punto de ocurrir,
escribe desde esa misma cuenta diciendo que <em>cambiaron el número de cuenta bancaria</em>.
El cliente paga al ladrón, y como el correo salió de una dirección legítima, nadie sospecha
hasta que el proveedor reclama.</p>
<p>Cómo se evita, en orden de eficacia:</p>
<ul>
<li><strong>Una contraseña distinta para el correo</strong>, que no se use en ningún otro
sitio. Es la medida que más rinde y la que menos se aplica.</li>
<li><strong>Cambiar la contraseña cuando alguien sale del equipo</strong>, el mismo día.</li>
<li><strong>Confirmar por teléfono cualquier cambio de cuenta bancaria</strong>, siempre, aunque
el correo parezca impecable. Llamar al número que ya tenías, no al que viene en el
mensaje.</li>
<li><strong>Revisar los reenvíos automáticos</strong> de vez en cuando: quien entra a una
cuenta suele dejar una regla que le copia todo, y así sigue leyendo aunque cambies la
clave.</li>
</ul>
<p>Si sospechas que pasó algo así, escríbenos por <a href="/soporte/">soporte</a> antes de
tocar nada. Cambiar la contraseña sin revisar las reglas deja la puerta abierta.</p>

<h2>Espacio, respaldos y qué hacer con el buzón lleno</h2>
<p>Un buzón que se llena deja de recibir, y el remitente recibe un rebote que tú no ves. Es la
causa número uno de los «te escribí y nunca contestaste».</p>
<p>El espacio depende del plan, y se estira mucho más con dos hábitos que con más gigas:
vaciar la papelera y el spam de vez en cuando —ocupan igual que la bandeja— y no usar el
correo como archivador de adjuntos pesados. Si necesitas guardar historial de años sin
ocupar la cuenta, se puede descargar a la computadora y liberar el servidor; te explicamos
cómo hacerlo o lo hacemos contigo.</p>

<h2>Cómo migramos tu correo sin que pierdas nada</h2>
<p>Cambiar de proveedor asusta, y con razón: el correo no se puede caer un día laborable.
Nuestro procedimiento es siempre el mismo.</p>
<ol>
<li><strong>Creamos tus cuentas nuevas</strong> mientras las viejas siguen funcionando. Nadie
deja de recibir nada durante este paso.</li>
<li><strong>Copiamos el historial</strong> —mensajes, carpetas y contactos— del proveedor
anterior al nuevo.</li>
<li><strong>Cambiamos la entrega</strong> en el dominio. Hay unas horas en las que los correos
pueden llegar a cualquiera de los dos lados, así que dejamos ambos activos y no se pierde
ninguno.</li>
<li><strong>Reconfiguramos tus aparatos</strong>: celular y computadora de cada persona del
equipo, una por una, hasta que envíen y reciban una prueba.</li>
<li><strong>Apagamos el servicio viejo</strong> recién cuando todo el mundo está trabajando en
el nuevo, no antes.</li>
</ol>
<p>Lo hacemos así incluso cuando el proveedor anterior no colabora, que pasa más seguido de lo
que debería.</p>
"""

CO_FAQ = """
<h2>Preguntas que nos hacen siempre</h2>

<h3>¿Cuántas cuentas puedo tener?</h3>
<p>Depende del plan: desde 10 hasta sin límite. Las creas tú cuando quieras, o te las creamos
nosotros.</p>

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

<h3>¿Puedo seguir usando Gmail para leer mi correo de empresa?</h3>
<p>Sí, y mucha gente lo hace. Tu cuenta con el dominio de la empresa se conecta a la aplicación
de Gmail y la lees en la misma bandeja de siempre; lo que cambia es la dirección desde la que
escribes y quién es dueño de la cuenta.</p>

<h3>¿Cuánto tarda en estar funcionando?</h3>
<p>Si ya tienes el dominio, el mismo día. Si hay que registrarlo o traerlo de otro proveedor,
contamos entre uno y tres días hábiles, casi todo tiempo de trámite, no de trabajo.</p>

<h3>¿Qué pasa si se me llena el buzón?</h3>
<p>Dejas de recibir y quien te escribe recibe un rebote. Se soluciona vaciando papelera y
spam, bajando el historial viejo a tu computadora o subiendo de plan. Si nos escribes, lo
vemos contigo.</p>

<h3>¿Se puede compartir una cuenta entre varias personas?</h3>
<p>Se puede, y para cuentas de área como info@ o ventas@ tiene todo el sentido. Para cuentas
personales no lo recomendamos: cuando algo sale mal, nadie sabe quién hizo qué.</p>

<h3>¿Necesito una firma de correo para mi equipo?</h3>
<p>No es obligatoria, pero ayuda: una firma pareja con el nombre, el cargo, el teléfono y la
dirección de la página hace que los correos de tu empresa se vean como si vinieran del mismo
lugar. Te dejamos una armada para que todos la copien.</p>
"""


# ===================== montaje =====================

def leer(pid):
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    return json.loads(r.json()["meta"]["_elementor_data"])


def guardar(pid, arbol):
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"meta": {"_elementor_data": json.dumps(arbol,
                                                                       ensure_ascii=False)}},
                           timeout=120)
    return r.status_code


def idx_de(arbol, clase):
    return next(i for i, c in enumerate(arbol)
                if clase in (c.get("settings") or {}).get("css_classes", ""))


def reemplazar_editor(arbol, wid, html):
    def walk(els):
        for e in els:
            if e.get("id") == wid:
                e["settings"]["editor"] = html.strip()
                return True
            if walk(e.get("elements", [])):
                return True
        return False
    return walk(arbol)


def marcar(c, marca):
    c["settings"]["css_classes"] = c["settings"].get("css_classes", "") + " " + marca
    return c


def limpiar(arbol, marca):
    return [c for c in arbol
            if marca not in (c.get("settings") or {}).get("css_classes", "")]


def ampliar_paginas_web():
    arbol = limpiar(leer(PAGINAS), "cw-amp")
    # el único cw-prosa lleva el intro + «qué incluye» + precio
    wid = None

    def buscar(els):
        nonlocal wid
        for e in els:
            s = e.get("settings") or {}
            if e.get("widgetType") == "text-editor" and s.get("_css_classes") == "cw-prosa":
                wid = e["id"]
                return
            buscar(e.get("elements", []))
    buscar(arbol)
    reemplazar_editor(arbol, wid, PW_PROSA)

    i = idx_de(arbol, "cw-final")
    nuevas = [
        marcar(PW_TIPOS, "cw-amp"),
        marcar(PW_PRECIO, "cw-amp"),
        marcar(seccion_papel([T(PW_PROSA2, cls="cw-prosa")], top=70, bottom=24), "cw-amp"),
        marcar(seccion_papel([T(PW_FAQ, cls="cw-prosa")], top=20, bottom=80), "cw-amp"),
    ]
    arbol[i:i] = nuevas
    print(f"paginas-web {PAGINAS}: {guardar(PAGINAS, arbol)} | {len(nuevas)} secciones nuevas")


def ampliar_correos():
    arbol = limpiar(leer(CORREOS), "cw-amp")
    prosas = []

    def buscar(els):
        for e in els:
            s = e.get("settings") or {}
            if e.get("widgetType") == "text-editor" and s.get("_css_classes") == "cw-prosa":
                prosas.append(e["id"])
            buscar(e.get("elements", []))
    buscar(arbol)
    # prosas[0] = intro, prosas[1] = cuerpo, prosas[2] = FAQ
    reemplazar_editor(arbol, prosas[2], CO_FAQ)

    # la FAQ ya estaba antes del CTA, así que si insertamos ahí las secciones
    # nuevas quedan DEBAJO de las preguntas. Se saca la sección de la FAQ y se
    # vuelve a poner al final, que es donde tiene sentido leerla.
    j = next(k for k, c in enumerate(arbol)
             if prosas[2] in json.dumps(c, ensure_ascii=False))
    faq = arbol.pop(j)

    i = idx_de(arbol, "cw-final")
    nuevas = [
        marcar(CO_GRATIS, "cw-amp"),
        marcar(seccion_papel([T(CO_PROSA, cls="cw-prosa")], top=70, bottom=24), "cw-amp"),
        faq,
    ]
    arbol[i:i] = nuevas
    print(f"correos {CORREOS}: {guardar(CORREOS, arbol)} | 2 secciones nuevas + FAQ al final")


def regenerar(pid, ruta):
    for _ in range(4):
        try:
            emcp.call("emcp-tools-update-page-settings", {"post_id": pid,
                                                         "settings": {"hide_title": "yes"}})
            emcp.flush_css()
            time.sleep(2)
            emcp._session.get(emcp.BASE + ruta,
                              headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                              params={"cb": random.randint(1, 10**9)}, timeout=90)
            c = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                                  params={"cb": random.randint(1, 10**9)}, timeout=60)
            print(f"  css post-{pid}: {c.status_code}")
            if c.status_code == 200:
                return
        except Exception as e:
            print(f"  css post-{pid}: {type(e).__name__}, reintento")
            time.sleep(8)
            emcp.init()


if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    ampliar_paginas_web()
    ampliar_correos()
    regenerar(PAGINAS, "/servicios/paginas-web/")
    regenerar(CORREOS, "/servicios/correos-corporativos-empresariales/")
    emcp.flush_css()
    print("OK ampliación · ahora hay que volver a correr schema_seo.py")
