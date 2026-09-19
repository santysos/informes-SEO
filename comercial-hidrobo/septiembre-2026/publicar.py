#!/usr/bin/env python3
"""Publica los 4 posts de gap de Comercial Hidrobo (septiembre 2026) por WP REST.
Temas por datos de Search Console (demanda + sin post dedicado). Los de dueño
(repuestos y mantenimiento) llevan el bloque de reserva de taller.
"""
import urllib.request, base64, json, time, os, re

ENV = os.path.join(os.path.dirname(os.path.abspath(__file__)), "..", "..", ".env")
env = {}
for l in open(ENV):
    l = l.strip()
    if l.startswith("CH_") and "=" in l:
        k, v = l.split("=", 1); env[k] = v
AUTH = base64.b64encode(f"{env['CH_WP_USER']}:{env['CH_WP_APP_PASS']}".encode()).decode()
Hget = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0"}
Hpost = {**Hget, "Content-Type": "application/json"}
API = "https://comercialhidrobo.com/wp-json/wp/v2"

WA = "https://wa.me/593996390233?text=Hola%2C%20quiero%20agendar%20una%20cita%20de%20taller.%20Modelo%3A%20___%20A%C3%B1o%3A%20___%20Km%3A%20___"
WV = "https://wa.me/593996390233?text=Hola%2C%20quiero%20cotizar%20un%20veh%C3%ADculo%20en%20Comercial%20Hidrobo."

def taller_block():
    return f'''
<!-- wp:heading -->
<h2 class="wp-block-heading">Agende su cita de taller en Comercial Hidrobo</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Nuestros técnicos revisan su vehículo con repuestos originales en <strong>Ibarra, Cayambe y Tulcán</strong>. Reserve en línea o escríbanos por WhatsApp.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {{"backgroundColor":"vivid-red"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-red-background-color has-background wp-element-button" href="https://www.comercialhidrobo.com/solicitar-cita-taller-mecanico/">Reservar cita de taller</a></div>
<!-- /wp:button -->
<!-- wp:button {{"backgroundColor":"vivid-green-cyan"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{WA}">Agendar por WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->'''

def p(t): return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"
def h2(t): return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'
def quote(t): return f'<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>{t}</p></blockquote>\n<!-- /wp:quote -->'
def ul(items):
    lis="".join(f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->\n" for i in items)
    return f'<!-- wp:list -->\n<ul class="wp-block-list">\n{lis}</ul>\n<!-- /wp:list -->'
def table(headers, rows):
    th="".join(f"<th>{h}</th>" for h in headers)
    trs="".join("<tr>"+"".join(f"<td>{c}</td>" for c in r)+"</tr>" for r in rows)
    return (f'<!-- wp:table -->\n<figure class="wp-block-table"><table><thead><tr>{th}</tr></thead>'
            f'<tbody>{trs}</tbody></table></figure>\n<!-- /wp:table -->')

POSTS = []

# ---------- 1. Crédito vehicular ----------
POSTS.append(dict(
  slug="credito-vehicular-ecuador-requisitos-plazos", category=45,
  title="Crédito vehicular en Ecuador: requisitos y plazos",
  meta="Cómo funciona un crédito vehicular en Ecuador: entrada, requisitos, plazos y qué conviene entre banco y crédito directo. Financia tu auto en Comercial Hidrobo.",
  fkw="crédito vehicular",
  excerpt="Cuánto de entrada piden, qué documentos necesitas, en cuántos meses se paga y qué conviene entre el banco y el crédito directo del concesionario.",
  content="".join([
    p("Comprar un auto casi nunca es de contado. La mayoría lo hace con un <strong>crédito vehicular</strong>, y la diferencia entre una buena y una mala decisión no está en el precio del carro, sino en cómo lo financias: la entrada, el plazo y de dónde sale el préstamo. Un mismo auto puede terminar costando miles de dólares de diferencia según cómo se arme el crédito."),
    p("Aquí te explicamos, sin letra chica, qué piden para un crédito de auto en Ecuador, en cuánto tiempo se paga, cuánto termina costando y cuándo conviene el banco o el crédito directo del concesionario."),
    h2("Qué necesitas para aplicar"),
    p("Los requisitos varían por entidad, pero casi siempre giran alrededor de lo mismo: demostrar que tienes ingresos estables y que tu historial de pagos está sano."),
    ul(["Cédula y papeleta de votación vigentes.","Comprobante de ingresos: rol de pagos si eres dependiente, o declaraciones y facturas si eres independiente.","Planilla de un servicio básico reciente para verificar tu domicilio.","Un historial crediticio sin deudas vencidas graves: el buró de crédito se revisa siempre.","La entrada disponible, que suele arrancar en el 20&nbsp;% del valor del vehículo."]),
    p("Si eres independiente, tener el RUC al día y algunos meses de facturación ordenada pesa mucho a tu favor. Muchos créditos se caen no por falta de ingresos, sino porque el solicitante no puede demostrarlos con papeles."),
    h2("Cuánto dura y cuánto cuesta de verdad"),
    p("El plazo típico va de 24 a 60 meses. La cuota depende de tres cosas: el monto financiado, la tasa de interés y el plazo. Y aquí está la trampa más común: alargar el plazo baja la cuota mensual, pero encarece el total, porque pagas intereses durante más tiempo."),
    table(["Plazo","Efecto en la cuota","Efecto en el total"],
          [["24 meses","Cuota alta","Pagas menos intereses"],
           ["36-48 meses","Cuota media","El equilibrio habitual"],
           ["60 meses","Cuota baja","Pagas más intereses en total"]]),
    p("Un ejemplo con números redondos: sobre un auto de 20.000 dólares con 20&nbsp;% de entrada, financias 16.000. A 36 meses la cuota es más alta pero cierras la deuda en tres años; a 60 meses la cuota baja de forma cómoda, pero al final habrás pagado bastante más en intereses por esos dos años extra. La regla sana es elegir el plazo más corto que tu bolsillo aguante sin ahogarse."),
    quote("La pregunta correcta no es «cuánto es la cuota», sino «cuánto termino pagando por el auto». Ahí se decide si el crédito fue bueno."),
    h2("Banco o crédito directo: cuál conviene"),
    p("El <strong>crédito con banco</strong> suele tener tasas reguladas y plazos largos, pero el trámite es más lento y exige un historial más limpio. El <strong>crédito directo</strong> con el concesionario aprueba más rápido y es más flexible con quien no tiene un historial extenso, a cambio de plazos a veces más cortos."),
    p("No hay una respuesta única: depende de tu perfil. Si tienes historial sólido y no tienes prisa, el banco puede salir más barato. Si necesitas resolver rápido, o si recién empiezas a construir crédito, el directo destraba la compra sin tanto papeleo. En Comercial Hidrobo trabajamos con las dos vías y te decimos cuál te conviene según tu caso, no según lo que nos convenga a nosotros."),
    h2("Errores que encarecen el crédito"),
    ul(["Fijarse solo en la cuota mensual y no en el total pagado.","Estirar el plazo al máximo «por comodidad» sin necesidad real.","Dar la entrada mínima cuando podías dar más y bajar los intereses.","No leer los costos adicionales del contrato (seguros, comisiones)."]),
    p("Antes de firmar, pide que te muestren el cuadro completo: cuota, número de meses y total a pagar. Un crédito transparente no tiene problema en enseñártelo."),
    h2("Cuándo NO conviene endeudarse todavía"),
    p("Si la cuota se lleva más del 30&nbsp;% de tus ingresos, o si para dar la entrada tienes que quedarte sin ningún ahorro de respaldo, conviene esperar y juntar más entrada. Un crédito que te deja al límite cada mes convierte el auto en una fuente de estrés en lugar de una solución de movilidad."),
    h2("El seguro: un costo del crédito que muchos olvidan"),
    p("Casi todos los créditos vehiculares exigen un seguro del auto mientras dure la deuda, porque el vehículo es la garantía del préstamo. Ese valor se suma a tu presupuesto mensual y conviene tenerlo en cuenta desde el inicio, no descubrirlo después de firmar. La buena noticia es que un seguro también te protege a ti: si el auto sufre un choque o un robo mientras aún lo estás pagando, no te quedas sin carro y con la deuda encima."),
    p("Al pedir tu crédito, pregunta si el seguro está incluido en la cuota o va por separado, qué cubre exactamente y si puedes elegir la aseguradora. Comparar ese detalle entre dos ofertas de crédito a veces cambia cuál conviene más que la propia tasa de interés."),
    h2("Preguntas frecuentes"),
    p("<strong>¿Puedo acceder a un crédito sin historial crediticio?</strong><br>Sí. El crédito directo es más flexible con quien recién empieza; suele pedir algo más de entrada a cambio."),
    p("<strong>¿Cuánto de entrada necesito?</strong><br>Desde el 20&nbsp;% en la mayoría de casos. Mientras más entregues, más baja la cuota y menos intereses pagas."),
    p("<strong>¿Cuánto tarda la aprobación?</strong><br>El crédito directo puede aprobarse el mismo día con los documentos completos; el bancario toma algunos días más."),
    p("<strong>¿Conviene el plazo más largo para pagar menos?</strong><br>Baja la cuota mensual, pero pagas más intereses en total. Elige el plazo más corto que puedas sostener."),
    p("¿Listo para estrenar auto? <a href=\"" + WV + "\">Escríbenos por WhatsApp</a> y armamos tu crédito a la medida en Ibarra, Cayambe o Tulcán."),
  ]),
))

# ---------- 2. Repuestos Renault ----------
POSTS.append(dict(
  slug="repuestos-renault-originales-norte-ecuador", category=42,
  title="Repuestos Renault originales en el norte del Ecuador",
  meta="Dónde conseguir repuestos Renault originales en Ibarra, Cayambe y Tulcán, por qué importan frente a los genéricos y cómo evitar montar una pieza equivocada.",
  fkw="repuestos Renault",
  excerpt="Por qué el repuesto original cuida tu Renault, qué riesgos trae el genérico barato y dónde conseguir los correctos en el norte del país.",
  content="".join([
    p("Cuando tu Renault necesita una pieza, la tentación es buscar la más barata. Pero un repuesto equivocado no dura menos y ya: puede dañar otras partes y salir mucho más caro que el original que quisiste ahorrarte. En piezas críticas, ese ahorro de hoy es la avería de la próxima semana."),
    p("Te explicamos por qué el <strong>repuesto Renault original</strong> importa, cómo distinguirlo de una copia, qué riesgos trae el genérico y dónde conseguir el correcto en el norte del Ecuador."),
    h2("Por qué el original dura más"),
    p("Un repuesto original está fabricado con las tolerancias exactas de tu modelo. Encaja sin forzar, aguanta las temperaturas y las cargas para las que fue diseñado, y no obliga al resto del sistema a compensar una pieza que no calza del todo. Esa precisión es la que no se ve en el mostrador, pero se nota en el kilometraje."),
    p("El genérico barato a veces funciona un tiempo, pero suele desgastarse antes y, en piezas críticas como frenos, correas o sensores, ese ahorro se paga con una reparación mayor."),
    quote("Montar una pieza equivocada es como ponerle un zapato de otra talla al auto: camina, pero termina cojeando y arrastrando otras cosas."),
    h2("Las piezas donde nunca conviene ahorrar"),
    ul(["<strong>Frenos:</strong> pastillas y discos que no cumplen la especificación alargan la distancia de frenado. Es seguridad, no un gasto opcional.","<strong>Correa de distribución:</strong> si falla, el daño al motor es de los más caros que existen.","<strong>Filtros y bujías:</strong> un filtro malo deja pasar suciedad al motor; una bujía inadecuada sube el consumo y hace fallar el arranque.","<strong>Sensores y componentes eléctricos:</strong> un genérico manda lecturas erróneas a la computadora del auto, y eso enciende luces y descuadra el rendimiento."]),
    h2("El costo escondido del genérico"),
    p("Pongamos un caso común: unas pastillas genéricas cuestan la mitad que las originales. Pero si son más duras de lo que el disco de tu Renault aguanta, desgastan el disco antes de tiempo. A los pocos meses no cambias solo pastillas: cambias pastillas y discos. El ahorro inicial se convirtió en un gasto doble. Multiplica eso por frenos, embrague o suspensión y entiendes por qué el original casi siempre gana en el total."),
    h2("Cómo distinguir un repuesto original"),
    p("El número de parte de tu Renault es la referencia que no falla. Pedir el repuesto por ese código evita que te vendan uno «que sirve para ese modelo» pero que en realidad es de otra versión. Los originales traen empaque, códigos y sellos del fabricante; una copia suele llegar en empaque genérico y sin trazabilidad. En un concesionario autorizado esa verificación viene incluida y con respaldo de fábrica."),
    h2("Dónde conseguirlos en el norte del Ecuador"),
    p("En Comercial Hidrobo manejamos repuestos Renault originales con respaldo de fábrica y técnicos que saben qué pieza lleva cada versión, en <strong>Ibarra, Cayambe y Tulcán</strong>. Si no tienes claro qué necesitas, lo identificamos por el número de chasis para que no te lleves la pieza equivocada, y si lo montamos nosotros, respondemos por la pieza y por la instalación."),
    h2("Los repuestos que más se piden, por sistema"),
    p("Saber en qué parte del auto estás gastando ayuda a decidir dónde no ceder en calidad. Estos son los grupos de repuestos que más se cambian en un Renault a lo largo de su vida:"),
    ul(["<strong>Motor:</strong> filtros de aceite, aire y combustible, bujías y correas. Son baratos y frecuentes; con originales el motor respira bien y consume lo que debe.","<strong>Frenos:</strong> pastillas, discos y líquido. Es el sistema de seguridad más usado del auto y el que menos conviene abaratar.","<strong>Suspensión:</strong> amortiguadores, bujes y rótulas. En caminos irregulares se desgastan antes; un repuesto flojo se siente en cada bache.","<strong>Sistema eléctrico:</strong> batería, sensores y focos. Un componente genérico aquí genera fallas intermitentes difíciles de diagnosticar.","<strong>Carrocería y accesorios:</strong> espejos, manijas, plumas. No son críticos, pero el original calza y dura sin holguras."]),
    p("La regla que usan los buenos mecánicos: en todo lo que afecta seguridad o motor, original sin discusión; en piezas estéticas hay algo más de margen, pero el original sigue siendo el que mejor encaja."),
    h2("Preguntas frecuentes"),
    p("<strong>¿El repuesto original es mucho más caro?</strong><br>Cuesta más que un genérico barato, pero dura más y evita daños en otras piezas. En el total, casi siempre sale más económico."),
    p("<strong>¿Puedo llevar el repuesto y montarlo en otro taller?</strong><br>Sí, pero si lo montas en nuestro taller garantizamos que la pieza y la instalación sean las correctas."),
    p("<strong>¿Cómo sé qué repuesto lleva mi Renault?</strong><br>Con el número de chasis identificamos la versión exacta y la pieza que corresponde, sin adivinar."),
    p("<strong>¿Tienen repuestos para modelos con varios años?</strong><br>Manejamos repuestos de los modelos que vendemos y a los que damos postventa; consulta por el tuyo."),
    taller_block(),
  ]),
))

# ---------- 3. Costos de mantenimiento Renault ----------
POSTS.append(dict(
  slug="cuanto-cuesta-mantenimiento-renault-kilometraje", category=46,
  title="Cuánto cuesta el mantenimiento de un Renault por km",
  meta="Qué incluye y cuánto cuesta el mantenimiento de un Renault por kilometraje en Ecuador, cada cuánto toca cada servicio y qué sube o baja el precio.",
  fkw="mantenimiento Renault precios",
  excerpt="Qué se hace en cada revisión por kilometraje, qué la encarece y cómo planificar el gasto para que no te tome por sorpresa.",
  content="".join([
    p("El mantenimiento de un Renault no es un gasto sorpresa: es un calendario que puedes prever. Saber qué toca a cada kilometraje y cuánto cuesta cada servicio te evita el susto de la factura y, sobre todo, evita que una revisión saltada se convierta en una reparación cara meses después."),
    p("Esto es lo que incluye cada mantenimiento por kilometraje, qué mueve el precio, cómo planificarlo y cuándo conviene adelantarlo."),
    h2("Qué se hace en cada revisión"),
    p("Los mantenimientos se agrupan por kilometraje, y cada uno suma tareas al anterior. Los básicos se repiten seguido y son económicos; los mayores llegan cada cierto tramo, son más completos y pesan más en el bolsillo."),
    table(["Kilometraje","Qué incluye, en general","Tipo"],
          [["5.000 - 10.000 km","Cambio de aceite y filtro, revisión de niveles y frenos","Básico"],
           ["20.000 km","Lo anterior + filtros de aire y de habitáculo, rotación de llantas","Intermedio"],
           ["40.000 km","Revisión de frenos a fondo, líquidos, bujías según motor","Mayor"],
           ["60.000 - 80.000 km","Correa o cadena según modelo, revisión completa","Mayor"]]),
    p("Los valores exactos dependen del modelo y del motor, pero el patrón es este: los servicios pequeños son frecuentes y baratos; los mayores llegan de vez en cuando y conviene tenerlos previstos con anticipación."),
    h2("Por qué el precio cambia de un Renault a otro"),
    p("Dos Renault del mismo año pueden tener mantenimientos de distinto costo. Lo que lo mueve, sobre todo, son tres cosas:"),
    ul(["<strong>El motor:</strong> un motor turbo o una versión híbrida pide insumos distintos y a veces más caros que un motor básico de aspiración natural.","<strong>El estado en que llega el auto:</strong> si se saltaron revisiones, primero hay que ponerse al día, y ese «atraso» cuesta más que el mantenimiento normal.","<strong>Repuestos originales o genéricos:</strong> los originales cuestan más por servicio pero duran y no arrastran otras piezas."]),
    quote("El mantenimiento más caro es el que no se hizo. Una revisión de rutina cuesta una fracción de lo que cuesta el daño que evita."),
    h2("Un ejemplo de cómo se acumula"),
    p("Imagina dos conductores con el mismo Renault. El primero hace cada mantenimiento a tiempo: paga montos pequeños y previsibles, y a los 80.000 km su auto está sano. El segundo se salta los básicos para «ahorrar»: cuando llega a taller, el aceite pasado desgastó el motor, los frenos al límite dañaron los discos y la factura es varias veces mayor. Terminaron gastando lo mismo o más, pero uno con el auto sano y el otro con el auto castigado."),
    h2("Cómo planificar el gasto"),
    p("La regla práctica: reserva un pequeño monto mensual pensando en el próximo mantenimiento mayor. Así, cuando llegue el de 40.000 o 60.000 km, no te toma por sorpresa. Y no estires los intervalos para ahorrar: un aceite pasado de tiempo o unas pastillas al límite terminan costando el motor o el disco, que valen mucho más que el servicio que evitaste."),
    h2("Cuándo conviene adelantar una revisión"),
    p("Si manejas mucho en carretera de montaña, con polvo o con carga, tu Renault trabaja más duro que el promedio. En esos casos conviene adelantar un poco los mantenimientos, porque el desgaste real llega antes que el kilometraje del manual. El norte del Ecuador, con sus subidas y sus caminos, es justo ese tipo de uso exigente."),
    h2("Qué NO cubre el mantenimiento de rutina"),
    p("Conviene tener claro qué entra en el mantenimiento programado y qué no, para que la factura no te sorprenda. El mantenimiento de rutina cubre lo previsible: aceite, filtros, revisión de frenos, líquidos y los cambios por kilometraje. No cubre las reparaciones por desgaste anticipado o mal uso: un embrague quemado por manejar en pendiente con el pie apoyado, una llanta reventada por un hueco, o un daño por haberse saltado revisiones anteriores."),
    p("Esa diferencia importa porque muchas «sorpresas» en el taller no son del mantenimiento en sí, sino de reparaciones que se acumularon por no hacerlo a tiempo. Cuando llevas tu Renault al día, la mayoría de las visitas son rápidas y baratas; cuando lo descuidas, cada visita trae una reparación además del servicio."),
    h2("Preguntas frecuentes"),
    p("<strong>¿Cada cuánto se hace el mantenimiento de un Renault?</strong><br>Los básicos cada 5.000-10.000 km; los mayores a los 20.000, 40.000 y 60.000-80.000 km, según el modelo."),
    p("<strong>¿Pierdo la garantía si no lo hago en el concesionario?</strong><br>Puedes perder cobertura si no cumples el plan o usas piezas no adecuadas. Hacerlo en un taller autorizado la protege."),
    p("<strong>¿Puedo estirar el cambio de aceite para ahorrar?</strong><br>No conviene: el aceite viejo desgasta el motor y el ahorro se paga con una reparación mayor."),
    p("<strong>¿Cuánto cuesta exactamente el de mi Renault?</strong><br>Depénde del modelo, motor y kilometraje. Escríbenos con esos datos y te damos el valor."),
    taller_block(),
  ]),
))

# ---------- 4. Mejor auto para caminos rurales ----------
POSTS.append(dict(
  slug="mejor-auto-para-caminos-rurales-norte-ecuador", category=48,
  title="Mejor auto para caminos rurales en el norte del Ecuador",
  meta="Qué mirar al elegir un auto para caminos rurales y de montaña en el norte del Ecuador: despeje, tracción, repuestos y qué modelos aguantan mejor.",
  fkw="mejor auto para caminos rurales",
  excerpt="Despeje, tracción y repuestos: qué de verdad importa cuando manejas fuera del asfalto, y qué tipo de auto aguanta mejor los caminos del norte.",
  content="".join([
    p("En el norte del Ecuador, un auto hace mucho más que andar por la ciudad: sube a comunidades, cruza caminos de tierra y aguanta pendientes. Elegir mal ahí se paga en talleres. La buena noticia es que no necesitas la camioneta más cara del patio: necesitas la que tenga lo que de verdad importa para ese uso."),
    p("Esto es lo que hay que mirar antes de comprar un auto para caminos rurales, qué tipo de vehículo aguanta mejor y qué revisar si lo compras usado."),
    h2("Lo que de verdad importa fuera del asfalto"),
    ul(["<strong>Despeje del suelo:</strong> la altura libre define si pasas una piedra o un bache sin golpear los bajos. Es lo primero a mirar.","<strong>Tracción:</strong> un 4x4 ayuda en barro y pendientes fuertes; para caminos de tierra firmes, un buen SUV con tracción delantera y control de estabilidad alcanza.","<strong>Suspensión robusta:</strong> el camino irregular castiga amortiguadores y bujes; una suspensión reforzada dura más y cuida el resto del auto.","<strong>Repuestos y taller cerca:</strong> el mejor auto es el que puedes reparar rápido y barato en tu zona. Un modelo exótico sin repuestos se convierte en un problema el día que se daña."]),
    quote("En camino rural, el auto ideal no es el más potente: es el que tiene despeje, repuestos a la mano y un taller cerca que lo conozca."),
    h2("SUV, camioneta o sedán: cuál para qué"),
    p("Cada carrocería tiene su terreno. Elegir por gusto y no por uso es el error más caro."),
    table(["Tipo","Para qué sirve en el campo","A tener en cuenta"],
          [["SUV con buen despeje","Uso mixto ciudad-campo, familia","La opción más equilibrada para la mayoría"],
           ["Camioneta 4x4","Carga, barro frecuente, pendientes duras","Más robusta, gasta algo más"],
           ["Sedán","Solo si el camino es firme y seco","Despeje bajo; sufre en tierra irregular"]]),
    p("Para uso mixto, un <strong>SUV con buen despeje</strong> resuelve la mayoría de casos: sube a comunidades, carga a la familia y sigue siendo cómodo en ciudad. Si el uso es más exigente, una <strong>camioneta 4x4</strong> es la herramienta correcta. Marcas como Renault, Nissan y las camionetas que manejamos en Comercial Hidrobo tienen modelos pensados para este terreno, con la ventaja clave de repuestos y taller propio en el norte del país."),
    h2("Cuándo NO necesitas un 4x4"),
    p("Si tu camino de tierra es firme y solo lo usas en época seca, un SUV con tracción delantera y buen despeje te sirve y te ahorra combustible y mantenimiento. El 4x4 se justifica cuando hay barro, arena o pendientes que de verdad lo exijan; pagarlo «por si acaso» es gastar de más en compra y en cada tanqueada."),
    h2("Qué revisar si lo compras usado"),
    p("Un auto de campo trabaja duro, así que revisa lo que ese trabajo castiga: la suspensión (que no haga ruidos ni rebote), los bajos (que no tengan golpes ni óxido), el estado de la tracción si es 4x4, y que el kilometraje sea coherente con el desgaste. Una revisión en un taller de confianza antes de comprar te ahorra sorpresas caras."),
    h2("El mantenimiento extra que pide el campo"),
    p("Un auto que anda por caminos rurales necesita más atención que uno de solo ciudad, y conviene presupuestarlo. El polvo tapa los filtros antes de tiempo, así que se revisan y cambian más seguido. El barro y las piedras castigan la suspensión y los bajos, que hay que inspeccionar con frecuencia. Y si cruzas zonas con agua, conviene revisar que no entre humedad donde no debe."),
    p("Nada de esto es caro si se hace a tiempo; lo caro es ignorarlo hasta que un amortiguador vencido daña una llanta o un filtro saturado ahoga el motor. Por eso, para uso rural, la cercanía de un taller que conozca tu vehículo vale tanto como el vehículo mismo: es la diferencia entre una parada corta y quedarte varado lejos de casa."),
    h2("Preguntas frecuentes"),
    p("<strong>¿4x4 o 4x2 para camino de tierra?</strong><br>Si el camino es firme y seco, 4x2 con buen despeje alcanza. Para barro y pendientes fuertes, 4x4."),
    p("<strong>¿Qué es más importante, la potencia o el despeje?</strong><br>El despeje. De nada sirve la potencia si golpeas los bajos en cada bache."),
    p("<strong>¿Conviene un auto usado para el campo?</strong><br>Sí, si está sano y tiene repuestos accesibles. Revisa suspensión y bajos antes de comprar."),
    p("<strong>¿Qué modelos me recomiendan para el norte?</strong><br>Depende de tu uso y presupuesto. Cuéntanos por dónde manejas y te orientamos sin compromiso."),
    p("¿Buscas un auto que aguante tus caminos? <a href=\"" + WV + "\">Escríbenos por WhatsApp</a> y te ayudamos a elegir el correcto para el norte del Ecuador."),
  ]),
))

def existing_slugs():
    got=set()
    for st in ("publish","future","draft","pending","private"):
        page=1
        while True:
            try:
                arr=json.loads(urllib.request.urlopen(urllib.request.Request(f"{API}/posts?per_page=100&page={page}&status={st}&_fields=slug",headers=Hget),timeout=30).read())
            except Exception: break
            if not arr: break
            got|={a['slug'] for a in arr}
            if len(arr)<100: break
            page+=1
    return got

def run():
    have=existing_slugs()
    print(f"posts existentes: {len(have)}")
    for post in POSTS:
        if post['slug'] in have:
            print(f"  [YA existe] {post['slug']}"); continue
        body={"slug":post['slug'],"title":post['title'],"status":"publish",
              "content":post['content'],"excerpt":post['excerpt'],"categories":[post['category']],
              "meta":{"_yoast_wpseo_title":post['title'],"_yoast_wpseo_metadesc":post['meta'],"_yoast_wpseo_focuskw":post['fkw']}}
        try:
            r=urllib.request.urlopen(urllib.request.Request(f"{API}/posts",data=json.dumps(body).encode(),headers=Hpost,method='POST'),timeout=45)
            d=json.loads(r.read())
            print(f"  [OK] id={d['id']} {post['slug']} · {r.status}")
            time.sleep(25)
        except Exception as e:
            print(f"  [ERR] {post['slug']}: {str(e)[:150]}"); time.sleep(90)

if __name__=="__main__":
    run()
