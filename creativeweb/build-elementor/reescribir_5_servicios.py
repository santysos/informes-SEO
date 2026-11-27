#!/usr/bin/env python3
"""Cinco páginas de servicio quedaron fuera de la pasada de «usted» → «tú» y
además no tenían un solo enlace interno en el cuerpo del texto.

Qué cambia en cada una (el contenido, los datos y las advertencias son los
mismos; no se inventa nada):

1. Trato de «tú», como el resto del sitio 2026.
2. Las preguntas frecuentes pasan de `<strong>` dentro de un `<p>` a `<h3>`.
   Antes no eran encabezados, así que ni Google ni el schema las reconocían
   como preguntas. Esto es lo que hace posible el FAQPage de `schema_seo.py`.
3. Enlaces internos contextuales. Eran cinco páginas sin salida: recibían
   enlaces del hub /servicios/ y no devolvían ninguno.

Cada página tiene un único widget text-editor con clase `cw-prosa` que contiene
todo el cuerpo, así que se reemplaza completo por su ID.
"""
import json
import random
import time

import emcp

# pid -> (id del widget cw-prosa, html nuevo)
PROSA = {}

PROSA[3625] = ("0cab55f", """
<p>Una tienda en línea no es una página web con botones de comprar. Es un sistema que tiene
que cobrar, avisar, controlar inventario y facturar sin que tengas que estar detrás de cada
pedido. Eso es lo que construimos.</p>

<h2>Con qué la hacemos y por qué</h2>
<p>Trabajamos con WooCommerce sobre WordPress, que es la plataforma de comercio electrónico
más usada del mundo. La razón es práctica: <strong>la tienda es tuya y te la puedes
llevar</strong>. No queda amarrada a una plataforma que te cobra un porcentaje de cada venta
ni a un proveedor que es el único que sabe tocarla.</p>
<p>Si además necesitas el sitio institucional, lo hacemos sobre la misma base: mira cómo
trabajamos las <a href="/servicios/paginas-web/">páginas web</a> y qué incluye el
<a href="/servicios/hosting-web-ecuador/">hosting</a> donde va a vivir la tienda.</p>

<h2>Qué lleva una tienda que funciona</h2>
<ul>
<li><strong>Catálogo con filtros de verdad.</strong> Por marca, por talla, por precio, por lo
que tu cliente use para decidir.</li>
<li><strong>Buscador rápido.</strong> En tiendas con muchos productos es lo que más se usa y
lo que peor suele estar.</li>
<li><strong>Fichas completas</strong> con fotos, variantes y stock real.</li>
<li><strong>Carrito y pago en línea</strong>, con la pasarela que te convenga.</li>
<li><strong>Cálculo de envíos</strong> según transportadora y destino.</li>
<li><strong>Correos automáticos</strong> de confirmación y seguimiento del pedido.</li>
<li><strong>Panel para administrarla tú</strong>, sin llamarnos para cambiar un precio.</li>
</ul>

<h2>Lo que separa una tienda buena de una que da problemas</h2>
<p>Casi todo lo que falla en una tienda en línea aparece después de la primera venta, no
antes:</p>
<ul>
<li><strong>El stock no cuadra.</strong> Se vende algo que ya no hay porque la web y el local
llevan cuentas distintas.</li>
<li><strong>La búsqueda es lenta.</strong> Con muchos productos, un buscador mal armado tarda
segundos y el cliente se va.</li>
<li><strong>Facturar es manual.</strong> Cada pedido obliga a copiar datos a otro sistema. Se
resuelve conectando la tienda con la
<a href="/servicios/facturacion-electronica-woocommerce-sri/">facturación electrónica del
SRI</a>.</li>
<li><strong>No se puede vender distinto a empresas.</strong> Cuando aparece un mayorista, hay
que inventar una lista de precios aparte.</li>
</ul>
<p>Los cuatro se resuelven al construir, y son mucho más caros de arreglar después.</p>

<h2>Preguntas frecuentes</h2>

<h3>¿Puedo cobrar con tarjeta?</h3>
<p>Sí. Se integra la pasarela que contrates; el trámite con el banco o el proveedor de pagos
lo haces tú y nosotros hacemos la conexión.</p>

<h3>¿Y si vendo también por WhatsApp?</h3>
<p>Se puede combinar: la tienda muestra el catálogo y el precio, y el pedido se cierra por
donde prefieras.</p>

<h3>¿Cuántos productos puedo tener?</h3>
<p>Sin límite práctico. Hemos trabajado con catálogos de más de dos mil.</p>

<h3>¿Se puede vender a empresas con precios distintos?</h3>
<p>Sí, con un canal mayorista: el cliente se registra con RUC, tú apruebas, y a partir de ahí
ve sus precios.</p>

<h3>¿Emite factura electrónica?</h3>
<p>Se puede conectar con un sistema de facturación para que cada pedido genere su comprobante
sin volver a escribir los datos. Nosotros usamos
<a href="/servicios/quipuy-facturacion-electronica/">Quipuy</a>, que es nuestro propio
sistema, pero también se conecta con el que ya tengas.</p>

<h3>¿Si mi tienda es de ropa, sirve el probador virtual?</h3>
<p>Sí, y suele valer la pena: el <a href="/servicios/probador-virtual-tienda-ropa/">probador
virtual</a> deja que la clienta se vea con la prenda antes de comprar, que es la objeción que
más frena la venta de ropa en línea.</p>
""")

PROSA[3624] = ("c5033ad", """
<p>Aparecer en Google no es cuestión de suerte ni de pagar más. Es un trabajo de meses que
empieza por entender qué busca la gente que compra lo que vendes, y termina en páginas que
responden esa búsqueda mejor que las de la competencia.</p>

<h2>Empezamos por medir, no por escribir</h2>
<p>El primer entregable de cualquier trabajo con nosotros es un análisis con datos reales de
tu sitio: qué búsquedas ya te muestran en Google, en qué posición apareces, cuánta gente hace
clic y cuánta se va sin entrar. Esa información sale de Search Console y de Analytics, no de
estimaciones.</p>
<p>Con eso sobre la mesa, casi siempre aparecen dos cosas: búsquedas donde ya estás bien
posicionado y no recibes visitas —normalmente por un título mal escrito— y búsquedas con
demanda real donde ni siquiera apareces.</p>

<h2>Qué incluye el análisis</h2>
<ul>
<li>Qué busca tu cliente y con qué palabras exactas, con el volumen de cada una.</li>
<li>Dónde estás hoy en cada una de esas búsquedas.</li>
<li><strong>Qué páginas compiten entre sí.</strong> Es más común de lo que parece: varios
artículos peleando por la misma búsqueda hacen que Google no posicione bien ninguno.</li>
<li><strong>Los problemas técnicos que frenan</strong>: velocidad, adaptación al celular,
títulos duplicados o vacíos, páginas que devuelven error y siguen indexadas.</li>
<li>Qué hace la competencia que a ti te falta.</li>
</ul>

<h2>Y después, el trabajo mensual</h2>
<p>El análisis muestra el camino; recorrerlo toma tiempo. El trabajo mensual combina tres
cosas, en este orden:</p>
<ul>
<li><strong>Arreglar lo que ya está ganado.</strong> Títulos y descripciones de las páginas
que aparecen bien y no reciben clics. Es lo que rinde más rápido: la posición ya existe.</li>
<li><strong>Ordenar lo que se estorba.</strong> Fusionar el contenido que compite entre sí y
redirigirlo, para que Google sepa cuál es la página principal de cada tema.</li>
<li><strong>Publicar con constancia.</strong> Contenido nuevo que responda búsquedas
concretas y que lleve a una página donde se pueda comprar o contactar.</li>
</ul>

<h2>Lo que te vamos a decir y quizá no quieras oír</h2>
<p>El SEO no da resultados en un mes. Un contenido nuevo tarda entre tres y seis meses en
alcanzar su posición, y sigue mejorando después. Quien te prometa primeros lugares en semanas
te está vendiendo otra cosa.</p>
<p>Tampoco sirve publicar mucho de golpe y parar. Lo hemos medido en nuestro propio sitio:
una tanda grande de artículos hizo subir el posicionamiento durante seis meses, y cuando
dejamos de publicar, en cuatro meses se perdió tres cuartas partes de lo ganado. El ritmo
sostenido rinde más que las ráfagas.</p>
<p>Y hay búsquedas que no conviene pelear. Si para aparecer por un término hay que competir
contra empresas que llevan años invirtiendo ahí, ese dinero rinde más en búsquedas locales o
más específicas, donde sí se puede ganar.</p>

<h2>Cómo se mide si funciona</h2>
<p>No por el tráfico. El tráfico puede subir mientras las ventas bajan, y lo hemos visto. Se
mide por lo que le importa a tu negocio: contactos recibidos, pedidos, llamadas o ventas con
origen en Google. Eso se configura desde el principio para que a los seis meses la respuesta
no sea una opinión.</p>
<p>Un ejemplo con números nuestros: en el
<a href="/proyectos/comercial-hidrobo/">caso de Comercial Hidrobo</a> está el detalle de qué
se hizo y qué se movió.</p>

<h2>Preguntas frecuentes</h2>

<h3>¿En cuánto tiempo veo resultados?</h3>
<p>Las mejoras de títulos y descripciones pueden notarse en semanas. El contenido nuevo tarda
de tres a seis meses. Los cambios estructurales, un poco más.</p>

<h3>¿Sirve para mi negocio si es local?</h3>
<p>Especialmente. Competir por búsquedas locales es más barato y convierte mejor que pelear a
nivel nacional.</p>

<h3>¿Tengo que cambiar mi página web?</h3>
<p>No necesariamente. El análisis dice si conviene arreglar lo que hay o rehacerlo, y muchas
veces alcanza con lo primero. Si toca rehacerla, así hacemos las
<a href="/servicios/paginas-web/">páginas web</a>.</p>

<h3>¿Trabajan con sitios que no hicieron ustedes?</h3>
<p>Sí, sin problema.</p>

<h3>¿Qué pasa si dejo el servicio?</h3>
<p>Lo ganado no se pierde de un día para otro, pero deja de crecer y la competencia va tomando
el lugar. Es un trabajo de mantenimiento, no una obra que se termina.</p>

<h3>¿Puedo aprender a hacerlo yo?</h3>
<p>Parte sí, y publicamos lo que sabemos: en el <a href="/blog/">blog</a> están las guías que
usamos nosotros mismos.</p>
""")

PROSA[3629] = ("177cd46", """
<p>Si vendes en línea y facturas al SRI, hay un punto donde casi todas las tiendas se traban:
cada pedido obliga a copiar los datos del cliente a otro sistema para emitir el comprobante. A
diez pedidos al día eso es una persona dedicada a copiar y pegar, y a equivocarse.</p>

<h2>Qué hace la integración</h2>
<p>Conecta tu <a href="/servicios/tiendas-online-ecuador/">tienda en línea</a> con el sistema
de facturación para que <strong>el comprobante se genere solo cuando el pedido se
paga</strong>. El cliente recibe su factura sin que nadie la escriba.</p>
<ul>
<li>Los datos del comprador se toman del pedido: cédula o RUC, razón social, dirección.</li>
<li>El comprobante se emite y se envía al SRI automáticamente.</li>
<li>La factura le llega al cliente por correo, con el pedido.</li>
<li>Si el SRI devuelve un error, queda registrado para revisarlo en vez de perderse.</li>
<li>Las notas de crédito por devolución también se emiten desde el mismo lugar.</li>
</ul>

<h2>Lo que hay que preparar antes</h2>
<p>Facturar electrónicamente no depende solo de la tienda. Antes de conectar hace falta:</p>
<ul>
<li>Firma electrónica vigente a nombre de la empresa.</li>
<li>Estar habilitado en el SRI para emisión electrónica.</li>
<li>Los establecimientos y puntos de emisión configurados correctamente.</li>
</ul>
<p>Si algo de eso falta, lo revisamos antes de empezar. Es el motivo más común de que una
integración se demore, y casi siempre se descubre a mitad del trabajo.</p>

<h2>Un detalle que conviene decidir temprano</h2>
<p>En Ecuador mucha gente compra sin dar RUC ni cédula. Hay que definir qué hace la tienda en
ese caso: pedir los datos como obligatorios en el pago, o emitir a consumidor final. Las dos
son válidas, pero cambian el diseño del checkout y conviene resolverlo antes de
construir.</p>

<h2>Preguntas frecuentes</h2>

<h3>¿Sirve para cualquier tienda WooCommerce?</h3>
<p>Sí, es la plataforma con la que trabajamos y donde tenemos la integración resuelta.</p>

<h3>¿Necesito cambiar de sistema contable?</h3>
<p>No necesariamente. Se evalúa con cuál trabajas hoy y si se puede conectar. Si vas a
empezar de cero, lo hacemos con <a href="/servicios/quipuy-facturacion-electronica/">Quipuy</a>,
nuestro propio sistema de facturación electrónica.</p>

<h3>¿Qué pasa si el SRI rechaza un comprobante?</h3>
<p>Queda registrado con el motivo, para corregirlo y reenviarlo. No se pierde ni pasa
desapercibido.</p>

<h3>¿Se puede facturar también los pedidos que entran por WhatsApp?</h3>
<p>Sí, cargándolos en la tienda o directamente en el sistema de facturación.</p>

<h3>¿Y si lo que necesito es descargar mis comprobantes del SRI?</h3>
<p>Eso es otra cosa y también lo tenemos resuelto:
<a href="/servicios/sriflow-descargar-comprobantes-sri/">SriFlow</a> descarga los comprobantes
de un mes o un año entero y deja el Excel listo para declarar.</p>
""")

PROSA[3627] = ("5ebf212", """
<p>La objeción número uno para comprar ropa en línea es siempre la misma: <em>no sé cómo me va
a quedar</em>. El probador virtual permite que la clienta se vea con la prenda antes de
comprarla, desde su propio teléfono.</p>

<h2>Cómo funciona</h2>
<p>La clienta sube una foto suya, elige la prenda del catálogo y ve el resultado en segundos.
No hay aplicación que instalar ni pasos raros: ocurre dentro de la misma
<a href="/servicios/tiendas-online-ecuador/">tienda en línea</a>, en el navegador.</p>
<p>Para la tienda, cada prueba es también información: qué prendas se prueban más, cuáles se
prueban y no se compran, y qué combinaciones interesan.</p>

<h2>Para qué tipo de tienda sirve</h2>
<p>Funciona con ropa donde el calce y el aspecto pesan en la decisión: camisetas, blusas,
vestidos, chaquetas. En productos donde lo que importa es la talla exacta y no la apariencia
—ropa interior, calzado técnico— aporta menos, y preferimos decirlo.</p>

<h2>Lo que hay que tener en cuenta</h2>
<ul>
<li><strong>Las fotos de producto tienen que ser buenas.</strong> El resultado depende de la
calidad de la imagen de la prenda; si el catálogo tiene fotos flojas, se nota.</li>
<li><strong>Es una ayuda para decidir, no una prueba de talla.</strong> Muestra cómo se ve la
prenda, no si te queda justa.</li>
<li><strong>Hay que cuidar los datos.</strong> Se trabaja con fotos de personas, así que el
tratamiento tiene que cumplir la ley de protección de datos. Lo dejamos configurado.</li>
</ul>

<h2>Preguntas frecuentes</h2>

<h3>¿Funciona sobre WooCommerce?</h3>
<p>Sí, se integra en la tienda que ya tienes.</p>

<h3>¿La clienta tiene que registrarse?</h3>
<p>No es obligatorio para probar.</p>

<h3>¿Qué pasa con las fotos que suben?</h3>
<p>Se tratan según la política de datos que dejamos configurada en tu tienda. No se usan para
otra cosa.</p>

<h3>¿Cuántas prendas puedo cargar?</h3>
<p>Todas las de tu catálogo.</p>

<h3>¿Se puede poner en una tienda que no hicieron ustedes?</h3>
<p>Si está sobre WooCommerce, sí. Si está en otra plataforma, hay que revisarlo caso por caso;
escríbenos y lo vemos.</p>
""")

PROSA[3626] = ("5a789ce", """
<p>Motrix es el sistema de gestión que desarrollamos para centros de terapia y consultorios.
No es una plantilla ni un producto que compramos afuera: nació resolviendo el día a día de una
clínica de fisioterapia real, y crece con lo que esa clínica va necesitando.</p>

<h2>Qué resuelve</h2>
<ul>
<li><strong>La ficha del paciente</strong>, con su historial de sesiones y su evolución.</li>
<li><strong>Las citas</strong>, con el detalle de qué se hizo en cada una.</li>
<li><strong>El consentimiento informado</strong> y el registro de enfermedades
preexistentes.</li>
<li><strong>El control de asistencias</strong> del paciente, exportable a PDF.</li>
<li><strong>Reportes por rango de fechas</strong> para ver cómo va el centro.</li>
<li><strong>De dónde viene cada paciente</strong>, para saber qué canal trae más gente.</li>
<li><strong>Facturación electrónica</strong> conectada al SRI, sin volver a escribir los
datos.</li>
</ul>

<h2>Cómo trabajamos esto</h2>
<p>No vendemos licencias de un producto cerrado. Se implementa el sistema base y a partir de
ahí se agregan las funciones que tu centro necesita, cotizadas una por una. Así el costo crece
con el uso y no al revés.</p>
<p>Es un modelo distinto al de un software de suscripción: pagas por lo que efectivamente
usas, y lo que pidas se construye para tu forma de trabajar, no para un promedio.</p>

<h2>Una aclaración sobre el consentimiento informado</h2>
<p>El sistema genera el documento y registra la fecha, la hora y qué usuario lo emitió. La
firma se hace en papel, como corresponde. <strong>No guardamos firma electrónica ni el escaneo
del documento firmado</strong>, y preferimos decirlo antes que después.</p>

<h2>Preguntas frecuentes</h2>

<h3>¿Sirve para otro tipo de consultorio?</h3>
<p>Sí. La base —pacientes, citas, historial, facturación— es común a cualquier consulta. Lo
específico de cada especialidad se agrega. Si lo que tienes es un consultorio dental, mira
<a href="/servicios/dentilab-software-clinicas-dentales/">DentiLab</a>, que ya viene con
odontograma e historia clínica odontológica.</p>

<h3>¿Funciona desde el celular?</h3>
<p>Sí, se usa desde el navegador en computadora, tablet o teléfono.</p>

<h3>¿Los datos son míos?</h3>
<p>Sí, y te los entregamos cuando los pidas.</p>

<h3>¿Cuánto cuesta?</h3>
<p>Depende de qué necesites. Se cotiza sobre el sistema base más las funciones que agregues.
<a href="/contactanos/">Escríbenos</a> y lo vemos con tu caso.</p>
""")


def reescribir(pid, wid, html):
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    d = json.loads(r.json()["meta"]["_elementor_data"])
    hecho = [False]

    def walk(els):
        for e in els:
            if e.get("id") == wid:
                antes = len(e["settings"]["editor"])
                e["settings"]["editor"] = html.strip()
                hecho[0] = True
                print(f"  {pid}: widget {wid} {antes} → {len(html.strip())} bytes")
            walk(e.get("elements", []))
    walk(d)
    if not hecho[0]:
        print(f"  {pid}: NO se encontró el widget {wid} — no se escribe nada")
        return
    r2 = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                            params={"cb": random.randint(1, 10**9)},
                            json={"meta": {"_elementor_data": json.dumps(d, ensure_ascii=False)}},
                            timeout=90)
    print(f"  {pid}: guardado {r2.status_code}")


def regenerar_css(pid, path):
    for _ in range(3):
        emcp.call("emcp-tools-update-page-settings", {"post_id": pid,
                                                     "settings": {"hide_title": "yes"}})
        emcp.flush_css()
        time.sleep(2)
        emcp._session.get(emcp.BASE + path,
                          headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                          params={"cb": random.randint(1, 10**9)}, timeout=90)
        c = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                              params={"cb": random.randint(1, 10**9)}, timeout=60)
        if c.status_code == 200:
            print(f"  css post-{pid}: 200")
            return
        print(f"  css post-{pid}: {c.status_code}")


RUTAS = {3625: "/servicios/tiendas-online-ecuador/",
         3624: "/servicios/seo-posicionamiento-web/",
         3629: "/servicios/facturacion-electronica-woocommerce-sri/",
         3627: "/servicios/probador-virtual-tienda-ropa/",
         3626: "/servicios/motrix-software-consultorios/"}

if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    for pid, (wid, html) in PROSA.items():
        reescribir(pid, wid, html)
    for pid, ruta in RUTAS.items():
        regenerar_css(pid, ruta)
    emcp.flush_css()
    print("OK 5 páginas de servicio reescritas")
