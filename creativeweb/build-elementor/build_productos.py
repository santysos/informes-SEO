#!/usr/bin/env python3
"""Páginas de producto a fondo: Quipuy, DentiLab, SriFlow y Boxpli.

Datos verificados contra los sitios en vivo y los repos (21-sep-2026). No se usan
testimonios ni métricas de tracción de las landings de los productos: varios son
de relleno y no hay forma de respaldarlos.

Enfoque SEO: estas páginas cuentan el producto a fondo para demostrar que
Creative Web construye software real, y mandan la compra al sitio del producto
con enlace en pestaña nueva. No pelean las keywords del producto (esas las gana
su propio dominio), así que no hay canibalización entre dominios propios.
"""
import json
import random

import emcp
from builders import C, W, H, T, pad, aplicar_clases
from shared_2026 import header, footer, hero_sub, JS
from productos_base import (tarjeta, fila_plan, bloque_prosa, rejilla,
                            cta_producto, planes, GRADS)

# ---------------------------------------------------------------- QUIPUY
QUIPUY = "https://quipuy.com"

quipuy = [
    header(),
    hero_sub("producto propio", 'quipuy:<span class="l2">facturas al SRI sin pelear</span>'),

    bloque_prosa("""
<p><strong>Quipuy</strong> es el sistema de facturación electrónica y contabilidad que
desarrollamos en Creative Web para negocios ecuatorianos. Lo decimos de frente: es producto
de la casa, y por eso sabemos exactamente qué hace y qué no.</p>
<p>La venta genera la factura, el movimiento de inventario y el asiento contable en un solo
paso. Sin pasar datos de un lado a otro, sin el facturador gratuito del SRI abierto en otra
pestaña y sin la hoja de cálculo que alguien tiene que cuadrar a fin de mes.</p>
"""),

    bloque_prosa("""
<h2>El problema de siempre</h2>
<p>La mayoría de los negocios que atendemos llegan con la misma escena: facturan en el portal
del SRI, anotan el inventario en Excel y le pasan los papeles al contador cada mes. Tres
sistemas que no se hablan, y un cierre contable que siempre empieza con «¿por qué no cuadra?».</p>
<p>El problema no es facturar. Es que <strong>facturar no le sirva de nada al resto del
negocio</strong>: que vender no descuente el stock, que un cobro no quede registrado, que a
fin de año haya que reconstruir a mano lo que ya pasó por caja.</p>
""", padding=pad(20, 24, 30, 24)),

    rejilla([
        tarjeta("Facturación electrónica SRI",
                "Facturas, notas de crédito y débito, y retenciones emitidas y recibidas, "
                "autorizadas por el SRI con el certificado de firma de tu propio negocio."),
        tarjeta("Inventario y compras",
                "Productos, proveedores y compras conectados a la venta: lo que sale se "
                "descuenta solo, sin que nadie tenga que acordarse."),
        tarjeta("Contabilidad NIIF PYMES",
                "Cada venta, compra, cobro y pago genera su asiento automático. Balances y "
                "libros listos, sin un segundo sistema contable."),
        tarjeta("ATS y reportes fiscales",
                "Generación del ATS mensual y los reportes que pide el SRI, dentro del "
                "mismo sistema (planes PYME y Empresarial)."),
        tarjeta("Factura por WhatsApp",
                "El cliente recibe su factura donde ya te escribe, sin pedirle un correo "
                "que muchas veces no revisa."),
        tarjeta("Multisucursal",
                "Inventario y vendedores por local, con la matriz viendo todo. Para cuando "
                "el negocio deja de ser un solo punto."),
    ], titulo="lo que resuelve"),

    bloque_prosa("""
<h2>Módulos para cómo trabaja tu negocio</h2>
<p>Un facturador genérico sirve para emitir y poco más. Quipuy trae módulos pensados para
formas concretas de trabajar:</p>
<ul>
<li><strong>Punto de venta</strong> — cobro rápido con cálculo de vuelto automático.</li>
<li><strong>Restaurante</strong> — mapa de mesas en vivo, pedidos por rondas y comandas
que salen directo a la pantalla de cocina.</li>
<li><strong>Proformas</strong> — con número y fecha de vigencia; cuando el cliente acepta,
se convierte en factura sin volver a escribir nada.</li>
<li><strong>Reservas</strong> — aparta el stock y registra el anticipo.</li>
<li><strong>Alquileres</strong> — maquinaria, andamios o encofrados: contrato impreso,
garantías y control de días.</li>
<li><strong>Cuadre de caja</strong> — apertura por cajero y arqueo al cierre, para saber
quién cuadró y quién no.</li>
<li><strong>Etiquetas</strong> — precios con código de barras, impresos desde el sistema.</li>
</ul>
""", padding=pad(40, 24, 30, 24)),

    planes('planes de quipuy<span class="l2">desde $6 al año</span>', [
        fila_plan(GRADS[0], "Emprendedor",
                  "100 facturas al mes · 1 usuario · 1 punto de emisión · prueba de 7 días",
                  "$9", f"{QUIPUY}/precios", sufijo="/mes"),
        fila_plan(GRADS[1], "PYME",
                  "300 facturas al mes · 5 usuarios · 3 puntos de emisión · incluye ATS",
                  "$19", f"{QUIPUY}/precios", extra="destacada", sufijo="/mes"),
        fila_plan(GRADS[2], "Empresarial",
                  "facturas ilimitadas · 10 usuarios · matriz y 2 sucursales · prueba de 14 días",
                  "$35", f"{QUIPUY}/precios", sufijo="/mes"),
        fila_plan(GRADS[3], "Solo facturación (anual)",
                  "paquetes prepago de 30 a 1.000 facturas al año · desde $6 al año · "
                  "para consultorios, freelancers y comercio de temporada",
                  "$6", f"{QUIPUY}/precios", sufijo="/año"),
    ], nota="* precios sin IVA · el plan anual equivale a 2 meses gratis · sin costo de instalación"),

    bloque_prosa("""
<h2>Preguntas frecuentes</h2>

<h3>¿Necesito comprar una firma electrónica?</h3>
<p>Sí, y es tuya: Quipuy usa el certificado .p12 de tu negocio. No dependes de la firma de un
proveedor, así que si algún día cambias de sistema tu firma se va contigo.</p>

<h3>¿Sirve si solo necesito facturar?</h3>
<p>Sí, y para eso están los paquetes anuales prepago desde $6 al año. Si no llevas inventario
ni contabilidad, no tiene sentido que pagues una suscripción mensual.</p>

<h3>¿Puedo probarlo antes?</h3>
<p>Sí, hay prueba gratis de 7 días (14 en el plan Empresarial), y la activación no tiene costo.</p>

<h3>¿Quién lo desarrolla y quién da el soporte?</h3>
<p>Nosotros, desde Otavalo. Es <a href="/contactanos/">el mismo equipo</a> que construye
páginas web y <a href="/servicios/paginas-web/">tiendas en línea</a>, así que si tu tienda
necesita facturar, la conexión ya existe.</p>
""", padding=pad(40, 24, 80, 24)),

    cta_producto("Quipuy", QUIPUY, "Mira Quipuy por dentro"),
    footer(),
]


# ---------------------------------------------------------------- DENTILAB
DENTILAB = "https://denti-lab.com"

dentilab = [
    header(),
    hero_sub("producto propio", 'dentilab:<span class="l2">la agenda que no se vacía</span>'),

    bloque_prosa("""
<p><strong>DentiLab</strong> es el software para consultorios y clínicas dentales que
desarrollamos en Creative Web. Historia clínica, odontograma, agenda y cobros en un solo
sistema, en la nube y sin instalar nada.</p>
<p>Está hecho para cómo trabaja una clínica ecuatoriana: la historia clínica sigue el
formulario <strong>HCU-form.033 del MSP</strong> y la facturación está autorizada por el
<strong>SRI</strong>. No es un producto de afuera al que hay que adaptarse.</p>
"""),

    bloque_prosa("""
<h2>El costo real de una silla vacía</h2>
<p>Un paciente que no llega no es solo una cita perdida: es una hora de sillón que ya estaba
pagada. Y la forma más común de perderla sigue siendo la misma —nadie le recordó.</p>
<p>Por eso DentiLab no se vendió nunca como «digitaliza la ficha». Se construyó alrededor de
la agenda: <strong>recordatorios por WhatsApp con confirmación tres días antes</strong>,
reserva en línea para que el paciente aparte su hora solo, y un resumen diario por correo
para que el dentista sepa cómo viene el día antes de abrir.</p>
""", padding=pad(20, 24, 30, 24)),

    rejilla([
        tarjeta("Recordatorios por WhatsApp",
                "Confirmación tres días antes de la cita, desde el mismo número que la "
                "clínica ya usa: no pierdes el historial de conversaciones con tus pacientes."),
        tarjeta("Agenda compartida",
                "Varios dentistas en un solo calendario, con arrastrar y soltar para mover "
                "citas. Cada cita sabe a qué profesional pertenece."),
        tarjeta("Odontograma FDI",
                "Marcado digital por superficies, con el catálogo dental del MSP. "
                "Lo que antes se dibujaba a mano en la ficha."),
        tarjeta("Historia clínica MSP-033",
                "La historia clínica odontológica en el formulario HCU-form.033 que exige "
                "el Ministerio de Salud Pública, no una ficha genérica."),
        tarjeta("Facturación al SRI",
                "Facturación electrónica autorizada dentro del mismo sistema. El cobro y el "
                "tratamiento no viven en programas distintos."),
        tarjeta("Cuenta corriente del paciente",
                "Pagos, abonos y saldos por paciente. Saber quién debe qué deja de depender "
                "de un cuaderno."),
        tarjeta("Consentimientos firmados",
                "Firmados digitalmente con fecha y hora. Respaldo legal que el papel "
                "archivado en una carpeta no te da."),
        tarjeta("Reserva en línea",
                "Un enlace público para que el paciente aparte su cita sin llamar y sin "
                "crear una cuenta."),
        tarjeta("Multisucursal y por roles",
                "Varias sedes y accesos distintos para dentista, recepción, asistente y "
                "administración."),
    ], titulo="lo que trae"),

    planes('planes de dentilab<span class="l2">prueba 15 días gratis</span>', [
        fila_plan(GRADS[0], "Consultorio",
                  "hasta 2 dentistas · 1 sucursal · todas las funciones",
                  "$20", DENTILAB, sufijo="/mes"),
        fila_plan(GRADS[2], "Clínica",
                  "hasta 6 dentistas · 2 sucursales · el que más contratan",
                  "$30", DENTILAB, extra="destacada", sufijo="/mes"),
        fila_plan(GRADS[3], "Ilimitado",
                  "dentistas y sucursales sin límite",
                  "$99", DENTILAB, sufijo="/mes"),
    ], nota="* 15 días de prueba sin tarjeta de crédito · el pago anual equivale a 2 meses gratis"),

    bloque_prosa("""
<h2>Preguntas frecuentes</h2>

<h3>¿Hay que instalar algo?</h3>
<p>No. DentiLab es 100 % web: entras desde el navegador de la computadora, la tablet o el
celular. Tampoco hay servidor que mantener en el consultorio.</p>

<h3>¿Puedo usar el WhatsApp que ya tiene la clínica?</h3>
<p>Sí, y es a propósito. Tus pacientes siguen escribiendo al número de siempre y no pierdes
el historial de chats.</p>

<h3>¿Cumple con lo que pide el Ministerio de Salud?</h3>
<p>La historia clínica sigue el formulario HCU-form.033 del MSP, y el odontograma usa el
catálogo dental oficial.</p>

<h3>¿Y la facturación?</h3>
<p>Va incluida y está autorizada por el SRI. Si además tu clínica necesita inventario o
contabilidad completa, se apoya en <a href="/servicios/quipuy-facturacion-electronica/">Quipuy</a>,
que es del mismo equipo.</p>

<h3>¿Lo puedo probar?</h3>
<p>15 días gratis, sin tarjeta de crédito.</p>
""", padding=pad(40, 24, 80, 24)),

    cta_producto("DentiLab", DENTILAB, "Conoce DentiLab a fondo"),
    footer(),
]


# ---------------------------------------------------------------- SRIFLOW
SRIFLOW = "https://www.sriflow.com"

sriflow = [
    header(),
    hero_sub("producto propio", 'sriflow:<span class="l2">el SRI, en diez minutos</span>'),

    bloque_prosa("""
<p><strong>SriFlow</strong> es el programa que desarrollamos para contadores ecuatorianos.
Entra al portal del SRI por ti, descarga todos los comprobantes electrónicos de un mes —o de
un año completo—, los renombra, elimina duplicados y te entrega un Excel listo para declarar.</p>
<p>Lo que a un contador le toma cerca de <strong>dos horas por cliente cada mes</strong>
—captcha, clics, archivos sueltos con nombres imposibles— pasa a tomar alrededor de diez
minutos.</p>
"""),

    bloque_prosa("""
<h2>Si llevas varios RUC, ya sabes de qué hablamos</h2>
<p>Entrar al portal. Resolver el captcha. Elegir el mes. Descargar. Repetir por tipo de
comprobante. Repetir por cliente. Y después abrir una carpeta llena de XML con nombres de
treinta dígitos para armar a mano el cuadro del IVA.</p>
<p>No es trabajo contable: es digitación. <strong>SriFlow se encarga de esa parte</strong>
para que el tiempo se vaya en revisar, no en descargar.</p>
""", padding=pad(20, 24, 30, 24)),

    rejilla([
        tarjeta("Descarga masiva",
                "Facturas, retenciones, notas de crédito y débito, guías de remisión y "
                "liquidaciones. Por día, por mes, por rango de fechas o el año fiscal completo."),
        tarjeta("Un solo ingreso al SRI",
                "Descarga todos los tipos de comprobante en una sola sesión, en vez de "
                "entrar y salir del portal una vez por cada uno."),
        tarjeta("Ordenado y sin duplicados",
                "Renombra cada archivo con RUC, tipo, día y número, y elimina los "
                "duplicados por clave de acceso. Se acabó la carpeta ilegible."),
        tarjeta("Excel listo para declarar",
                "IVA desglosado por tarifa (15, 13, 12, 8, 5 y 0 %, con y sin derecho a "
                "crédito, exentas y no objeto) y totales calculados."),
        tarjeta("Formularios 104 y 103",
                "Arma el borrador del IVA mensual o semestral RIMPE y el de retenciones en "
                "la fuente, con los casilleros auditados contra las pantallas del SRI."),
        tarjeta("ATS validado",
                "Genera el ATS mensual y semestral validado contra el esquema oficial. "
                "Ya hay declaraciones aceptadas por el SRI generadas así."),
        tarjeta("Tu clave no sale de tu equipo",
                "La descarga corre en tu computadora, no en un servidor nuestro. No "
                "guardamos ni tu clave del SRI ni tus RUC."),
        tarjeta("Varios RUC, una cuenta",
                "Gestiona todos tus clientes desde la misma licencia, sin pagar por cada "
                "contribuyente que atiendes."),
        tarjeta("Windows y Mac",
                "Versión nativa para Windows 10 y 11 y para macOS 12 en adelante. "
                "Instalas y listo en unos minutos."),
    ], titulo="lo que hace"),

    planes('planes de sriflow<span class="l2">prueba 7 días gratis</span>', [
        fila_plan(GRADS[0], "Mensual", "todas las funciones · sin permanencia",
                  "$18", SRIFLOW, sufijo="/mes"),
        fila_plan(GRADS[1], "Trimestral", "equivale a $15 al mes · ahorras $9",
                  "$45", SRIFLOW, sufijo="/trimestre"),
        fila_plan(GRADS[2], "Anual", "equivale a $6 al mes · el que más contratan",
                  "$72", SRIFLOW, extra="destacada", sufijo="/año"),
    ], nota="* 7 días de prueba gratis, sin tarjeta · una licencia por contador · "
            "pago con tarjeta a través de Payphone"),

    bloque_prosa("""
<h2>Preguntas frecuentes</h2>

<h3>¿Guardan mi clave del SRI?</h3>
<p>No. El programa corre en tu computadora y se conecta al portal desde ahí. Tu clave y tus
RUC no viajan a ningún servidor nuestro.</p>

<h3>¿Qué pasa si me equivoco de clave?</h3>
<p>El programa detiene el intento antes del quinto fallo, justamente para no bloquearle la
cuenta del SRI a tu cliente.</p>

<h3>¿Puedo descargar un año completo de una vez?</h3>
<p>Sí. Puedes pedir un día, un mes, un rango de fechas o el año fiscal entero en una sola
corrida.</p>

<h3>¿Sirve si solo llevo mi propio RUC?</h3>
<p>Si emites pocos comprobantes al mes, el portal del SRI te alcanza y te lo decimos de frente.
SriFlow rinde cuando manejas varios contribuyentes o mucho volumen.</p>

<h3>¿Cómo lo instalo?</h3>
<p>Te registras, confirmas tu correo y descargas el instalador de Windows o Mac desde el sitio.
Son tres pasos.</p>
""", padding=pad(40, 24, 80, 24)),

    cta_producto("SriFlow", SRIFLOW, "Pruébalo 7 días gratis"),
    footer(),
]


# ---------------------------------------------------------------- BOXPLI
BOXPLI = "https://boxpli.com"

boxpli = [
    header(),
    hero_sub("producto propio", 'boxpli:<span class="l2">despachar sin copiar a mano</span>'),

    bloque_prosa("""
<p><strong>Boxpli</strong> es la plataforma de envíos que desarrollamos en Creative Web para
tiendas en línea y negocios ecuatorianos que despachan por courier. Genera las etiquetas en
PDF listas para imprimir y avisa al cliente por WhatsApp con su número de rastreo.</p>
<p>Dos tareas que parecen chicas hasta que despachas veinte pedidos en una tarde.</p>
"""),

    bloque_prosa("""
<h2>Los dos cuellos de botella de todo despacho</h2>
<p>El primero es escribir: nombre, cédula, dirección, teléfono y referencia, uno por uno,
en el formulario del courier. El segundo es responder: «¿ya salió mi pedido?», «¿cuál es
el número de guía?», «¿dónde va?».</p>
<p>Boxpli ataca los dos. Los datos del cliente quedan guardados y se reutilizan, las
etiquetas salen <strong>en lote</strong>, y el aviso con el enlace de rastreo se manda por
WhatsApp sin que tengas que buscar nada.</p>
""", padding=pad(20, 24, 30, 24)),

    rejilla([
        tarjeta("Etiquetas en PDF",
                "Formato A4 listo para imprimir, con el logo de tu negocio. Imprime en "
                "lote todos los pedidos del día en lugar de uno por uno."),
        tarjeta("Aviso por WhatsApp",
                "Mensaje con el número y el enlace de rastreo, armado desde plantillas que "
                "tú configuras. El cliente deja de preguntar dónde va su pedido."),
        tarjeta("Cualquier courier",
                "Servientrega, Laar, Tramaco, Speed, DHL o FedEx: defines la dirección de "
                "rastreo de cada uno y el enlace del cliente sale correcto."),
        tarjeta("Tus clientes, guardados",
                "Base de clientes reutilizable, con favoritos. Al segundo pedido ya no "
                "escribes la dirección otra vez."),
        tarjeta("Historial de envíos",
                "Todos los despachos y sus estados en un solo lugar, con la etiqueta "
                "guardada tal como se generó."),
        tarjeta("Panel con indicadores",
                "Cuántos envíos, a dónde y con qué courier. Para decidir con datos "
                "con quién despachas."),
    ], titulo="lo que hace"),

    planes('planes de boxpli<span class="l2">empieza gratis</span>', [
        fila_plan(GRADS[3], "Gratis",
                  "para probar · el PDF sale con marca de agua",
                  "$0", BOXPLI, sufijo=""),
        fila_plan(GRADS[0], "Emprendedor",
                  "hasta 20 envíos por lote · etiquetas sin marca de agua",
                  "$9.90", BOXPLI, sufijo="/mes"),
        fila_plan(GRADS[1], "Negocio",
                  "hasta 50 envíos por lote · el punto dulce para una tienda que ya vende",
                  "$16.90", BOXPLI, extra="destacada", sufijo="/mes"),
        fila_plan(GRADS[2], "Empresa",
                  "envíos por lote ilimitados",
                  "$29.90", BOXPLI, sufijo="/mes"),
    ], nota="* 21 días de prueba premium sin tarjeta · el pago anual equivale a 2 meses gratis"),

    bloque_prosa("""
<h2>Preguntas frecuentes</h2>

<h3>¿Se conecta con mi tienda en línea?</h3>
<p>Hoy no: los envíos se cargan en Boxpli, no se importan automáticamente desde WooCommerce
o Shopify. Lo decimos claro para que nadie se lleve una sorpresa. Si tu operación necesita
esa conexión, es justo el tipo de trabajo que hacemos
<a href="/contactanos/">a medida</a>.</p>

<h3>¿Con qué couriers funciona?</h3>
<p>Con el que uses. Boxpli no depende de una integración cerrada: configuras la dirección de
rastreo del courier y el enlace que recibe tu cliente apunta al lugar correcto.</p>

<h3>¿El WhatsApp se envía solo?</h3>
<p>El mensaje se arma solo, con el número de guía y el enlace ya puestos; tú lo envías con un
clic desde tu propio WhatsApp. Así sale desde el número que tu cliente ya conoce.</p>

<h3>¿Puedo probarlo sin pagar?</h3>
<p>Sí. Hay un plan gratis permanente —las etiquetas salen con marca de agua— y 21 días de
prueba premium sin tarjeta.</p>
""", padding=pad(40, 24, 80, 24)),

    cta_producto("Boxpli", BOXPLI, "Genera tu primera etiqueta"),
    footer(),
]


# ---------------------------------------------------------------- montaje
PAGINAS = [
    dict(pid=3630, slug="quipuy-facturacion-electronica", arbol=quipuy, nombre="Quipuy",
         titulo="Quipuy · facturación electrónica",
         yoast_t="Quipuy: facturación electrónica y contabilidad para el SRI",
         yoast_d="Nuestro sistema de facturación electrónica SRI con inventario, "
                 "contabilidad NIIF y módulos para restaurante, alquileres y punto de venta. "
                 "Desde $6 al año."),
    dict(pid=3631, slug="dentilab-software-clinicas-dentales", arbol=dentilab, nombre="DentiLab",
         titulo="DentiLab · software para clínicas dentales",
         yoast_t="DentiLab: software para clínicas dentales en Ecuador",
         yoast_d="Historia clínica MSP-033, odontograma FDI, agenda con recordatorios por "
                 "WhatsApp y facturación al SRI en un solo sistema. Prueba 15 días gratis."),
    dict(pid=None, slug="sriflow-descargar-comprobantes-sri", arbol=sriflow, nombre="SriFlow",
         titulo="SriFlow · comprobantes del SRI para contadores",
         yoast_t="SriFlow: descarga los comprobantes del SRI en minutos",
         yoast_d="Programa para contadores en Ecuador: descarga masiva de comprobantes del "
                 "SRI, Excel con el IVA desglosado y borradores del 104, 103 y ATS."),
    dict(pid=None, slug="boxpli-etiquetas-de-envio", arbol=boxpli, nombre="Boxpli",
         titulo="Boxpli · etiquetas de envío y rastreo",
         yoast_t="Boxpli: etiquetas de envío y avisos de rastreo por WhatsApp",
         yoast_d="Genera etiquetas de envío en PDF, imprime en lote y avisa a tu cliente por "
                 "WhatsApp con su número de rastreo. Para tiendas en línea de Ecuador."),
]

PADRE_SERVICIOS = 929


def buscar_o_crear(cfg):
    if cfg["pid"]:
        return cfg["pid"]
    r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                          params={"slug": cfg["slug"], "status": "publish,draft,private",
                                  "cb": random.randint(1, 10**9)}, timeout=60)
    found = r.json() if r.ok else []
    if found:
        return found[0]["id"]
    r = emcp._session.post(emcp.BASE + "/wp-json/wp/v2/pages", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"title": cfg["titulo"], "slug": cfg["slug"],
                                 "parent": PADRE_SERVICIOS, "status": "publish"}, timeout=60)
    return r.json()["id"]


def montar(cfg):
    pid = buscar_o_crear(cfg)
    emcp.call("emcp-tools-delete-page-content", {"post_id": pid})
    ri = emcp.call("emcp-tools-import-template", {"post_id": pid, "template_json": cfg["arbol"]})
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"template": "elementor_canvas", "parent": PADRE_SERVICIOS,
                                 "meta": {"_elementor_edit_mode": "builder",
                                          "_elementor_template_type": "wp-page",
                                          "_yoast_wpseo_title": cfg["yoast_t"],
                                          "_yoast_wpseo_metadesc": cfg["yoast_d"]}}, timeout=90)
    emcp.call("emcp-tools-update-page-settings", {"post_id": pid, "settings": {"hide_title": "yes"}})
    aplicar_clases(cfg["arbol"], pid, emcp)
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": pid})
    emcp.call("emcp-tools-add-custom-js", {"post_id": pid,
              "parent_id": st["structure"][-1]["id"], "js": JS})
    # el CSS por página no se genera solo: forzarlo (si no, los contenedores colapsan)
    emcp.flush_css()
    enlace = (r.json().get("link") if r.ok else None) or f"{emcp.BASE}/?p={pid}"
    emcp._session.get(enlace, headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                      params={"cb": random.randint(1, 10**9)}, timeout=90)
    css = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                            params={"cb": random.randint(1, 10**9)}, timeout=60)
    print(f"{cfg['nombre']}: pid={pid} elementos={ri.get('elements_count')} "
          f"css={css.status_code} url={enlace}")
    return pid


if __name__ == "__main__":
    emcp.init()
    ids = {}
    for cfg in PAGINAS:
        ids[cfg["nombre"]] = montar(cfg)
    json.dump(ids, open("paginas-productos.json", "w"), indent=1, ensure_ascii=False)
    emcp.flush_css()
    print("OK productos")
