#!/usr/bin/env python3
"""Bloque D · decisión de compra, posts 17 y 18."""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

GUI = CAT["guias"]
MOD = CAT["modelos"]
TRA = CAT["tramites"]
FIN = CAT["financiamiento"]
U_DEVAL = post_url(GUI, "cuanto-se-devalua-un-auto-usado-ecuador")
U_KM = post_url(GUI, "kilometraje-auto-usado-cuanto-es-mucho")
U_MANT = post_url(MOD, "autos-usados-menos-mantenimiento")
U_PATIO = post_url(GUI, "comprar-auto-patio-o-particular")
U_REVISION = post_url(TRA, "revision-mecanica-antes-de-comprar-auto")
U_PARTE = post_url(FIN, "cambiar-auto-parte-de-pago")

POSTS = []

# ── 17 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto se devalúa un auto en Ecuador y qué años conviene comprar",
 "slug": "cuanto-se-devalua-un-auto-usado-ecuador",
 "date": "2026-10-07T09:00:00",
 "cat": GUI,
 "tags": ["depreciación", "valor de reventa", "auto usado", "guía de compra"],
 "focus_kw": "cuánto se devalúa un auto",
 "yoast_title": "Cuánto se devalúa un auto en Ecuador por año",
 "yoast_desc": "La curva real de depreciacion en Ecuador, por que el primer anio es el mas caro y que rango de anios da la mejor relacion entre precio y vida util.",
 "excerpt": "El primer año se lleva la mordida más grande. Dónde está el punto en que un auto deja de perder valor rápido y todavía le queda vida por delante.",
 "bloques": [
   "Comprar un auto es una de las pocas decisiones donde la gente acepta perder dinero sin hacer la cuenta. Y la cuenta importa: entre comprar un modelo de un año y uno de cuatro puede haber miles de dólares de diferencia, no en precio de compra, sino en lo que pierdes mientras lo tienes.",
   "Aquí va cómo se comporta la depreciación en Ecuador y en qué tramo de años está el mejor negocio.",

   {"h2": "La curva, en números"},
   "Un vehículo pierde valor de forma desigual: mucho al inicio, cada vez menos después. Estos son los rangos habituales en el mercado ecuatoriano sobre el precio de un auto nuevo:",
   {"tabla": [["Antigüedad", "Pérdida acumulada", "Pérdida de ese año"], [
     ["Al salir del concesionario", "10 – 15 %", "—"],
     ["1 año", "18 – 22 %", "~20 %"],
     ["2 años", "28 – 33 %", "~11 %"],
     ["3 años", "36 – 42 %", "~9 %"],
     ["5 años", "50 – 58 %", "~7 % anual"],
     ["8 años", "65 – 72 %", "~4 % anual"],
     ["10 años", "72 – 80 %", "~3 % anual"],
   ]]},
   "La lectura clave está en la tercera columna. El primer año se lleva alrededor del 20 % del valor; el octavo, un 4 %. Quien compra nuevo paga esa curva completa. Quien compra de tres años se salta el tramo más caro.",

   {"h2": "Qué significa en dinero"},
   "Sobre un vehículo que nuevo costaba $30.000:",
   {"tabla": [["Compras a los", "Pagas aprox.", "Lo vendes 3 años después en", "Pierdes"], [
     ["0 años (nuevo)", "$30.000", "$18.500", "$11.500"],
     ["3 años", "$18.500", "$13.500", "$5.000"],
     ["6 años", "$12.000", "$9.200", "$2.800"],
   ]]},
   "Tres años de uso en los tres casos. La diferencia entre la primera fila y la tercera es de $8.700 por exactamente el mismo período de tenencia.",
   "Eso no significa que comprar de seis años sea siempre mejor: el mantenimiento sube y la vida útil restante baja. Significa que hay que meter la depreciación en la cuenta, y casi nadie lo hace.",

   {"h2": "El punto dulce"},
   f"Para la mayoría de compradores, el tramo entre los <strong>3 y los 6 años</strong> es donde mejor se combinan las tres variables: el golpe fuerte de depreciación ya lo pagó otro, al vehículo le quedan años de servicio y todavía no entró en la etapa de reemplazos mayores.",
   f"En el {link(LISTADO, 'listado del patio')} hay opciones justo en ese rango, y también algunas más recientes para quien prioriza garantía y tecnología por encima del ahorro.",

   {"quote": "Al cliente que viene decidido a comprar nuevo le mostramos la cuenta de los tres años. Muchos igual compran nuevo, y está bien, pero ya sabiendo qué están pagando por estrenarlo. Otros se pasan a un seminuevo reciente y se llevan más auto por la misma plata.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Por qué el primer año pesa tanto"},
   "La caída inicial no es un capricho del mercado. Responde a tres cosas concretas:",
   {"ul": [
     "<strong>El auto deja de ser nuevo en el papel.</strong> Al inscribirse el primer dueño, el vehículo pasa a la categoría de usado aunque tenga 300 kilómetros. Esa sola línea en la matrícula cuesta miles.",
     "<strong>Desaparece el margen del concesionario.</strong> Parte del precio de un cero kilómetros es la estructura comercial que lo vendió, y esa parte no se recupera en la reventa.",
     "<strong>El comprador siguiente compara contra un nuevo.</strong> Si por un poco más consigue uno sin dueños previos y con garantía completa, el usado tiene que descontar para competir.",
   ]},
   "Ese tercer punto explica por qué los seminuevos de uno o dos años son los que más rápido se venden en el patio: ofrecen casi todo lo de un cero kilómetros a un precio claramente distinto.",

   {"h2": "Qué acelera y qué frena la depreciación"},
   {"h3": "Acelera"},
   {"ul": [
     "<strong>Kilometraje alto.</strong> Es la segunda variable después del año.",
     "<strong>Marcas sin red de servicio consolidada</strong> en el país.",
     "<strong>Modelos que salen del mercado</strong> o cambian de generación de forma marcada.",
     "<strong>Historial de choques</strong>, aunque estén bien reparados.",
     "<strong>Colores poco comerciales</strong>, que reducen el número de compradores interesados.",
   ]},
   {"h3": "Frena"},
   {"ul": [
     "<strong>Marcas con reputación de durabilidad</strong> y repuestos accesibles.",
     "<strong>Mantenimiento documentado</strong> con facturas. Suma de verdad al momento de vender.",
     "<strong>Versiones de alta demanda</strong>: 4x4 en la sierra, diésel en camionetas de trabajo.",
     "<strong>Kilometraje bajo para el año</strong> del vehículo.",
   ]},

   {"h2": "Cuándo comprar nuevo sí tiene sentido"},
   "Todo lo anterior no dice que comprar nuevo sea un error. Dice que hay que saber qué se está pagando. Hay casos donde la cuenta cierra:",
   {"ul": [
     "<strong>Si vas a conservarlo ocho años o más.</strong> La depreciación se diluye en el tiempo y aprovechas la garantía completa.",
     "<strong>Si el uso es intensivo y crítico</strong>, como un vehículo de trabajo del que depende un ingreso diario.",
     "<strong>Si necesitas financiamiento a tasa preferencial</strong>, que muchas veces solo aplica a cero kilómetros.",
     "<strong>Si el modelo que quieres no existe en el mercado de seminuevos</strong> con la configuración que necesitas.",
   ]},
   "Fuera de esos casos, un vehículo de tres a cinco años suele entregar más auto por el mismo dinero, que es de lo que se trata la decisión.",

   {"h2": "La cuenta que conviene hacer antes de comprar"},
   "El costo real de tener un auto durante tres años no es la cuota. Es esto:",
   {"ol": [
     "<strong>Depreciación</strong>: precio de compra menos precio estimado de reventa.",
     "<strong>Intereses</strong> pagados si lo financiaste.",
     "<strong>Seguro</strong>, matrícula y mantenimiento del período.",
     "<strong>Combustible</strong>, que depende de tu kilometraje anual.",
   ]},
   "La depreciación suele ser el rubro más grande de los cuatro, y es el único que no aparece en ningún recibo. Por eso se ignora.",
   f"Si vas a entregar tu auto actual en la operación, esa curva ya está jugando a tu favor o en tu contra según el año que tenga: lo tratamos en {link(U_PARTE, 'entregar tu auto como parte de pago')}.",
   f"Y la otra variable que más pesa en el valor es el kilometraje. Cuánto es mucho según el año lo desglosamos en {link(U_KM, 'kilometraje de un auto usado')}.",
   {"faq": [
     ("¿Los autos chinos se devalúan más rápido?",
      "Los modelos de marcas con red de servicio consolidada en Ecuador se comportan cada vez mejor. La variable que manda es la disponibilidad de repuestos y talleres, más que el origen."),
     ("¿Un auto con pocos kilómetros pero muchos años se devalúa menos?",
      "Ayuda, pero la antigüedad manda. Además, un auto que estuvo mucho tiempo detenido tiene sus propios problemas de sellos y mangueras."),
     ("¿Conviene cambiar de auto cada tres años?",
      "Solo si el valor de tenerlo nuevo compensa la depreciación. Para la mayoría, estirar a cinco o seis años sale bastante mejor."),
     ("¿La depreciación es igual en toda marca?",
      "No. Hay diferencias grandes según reputación de durabilidad y demanda local. En Imbabura, por ejemplo, las 4x4 y las camionetas de trabajo sostienen mejor su valor."),
   ]},
   f'¿Quieres saber cuánto vale hoy el auto que tienes? <a href="{wa("Hola, quiero saber cuanto vale mi auto actual")}">Escríbenos por WhatsApp</a> con año, modelo y kilometraje. Te damos un rango el mismo día, sirva o no para una compra con nosotros.',
 ]})

# ── 18 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Kilometraje de un auto usado: cuánto es mucho según el año",
 "slug": "kilometraje-auto-usado-cuanto-es-mucho",
 "date": "2026-10-09T09:00:00",
 "cat": GUI,
 "tags": ["kilometraje", "auto usado", "guía de compra", "mantenimiento"],
 "focus_kw": "kilometraje auto usado cuánto es mucho",
 "yoast_title": "Kilometraje de un auto usado: cuánto es mucho",
 "yoast_desc": "Cuantos kilometros al anio son normales en Ecuador, cuando el kilometraje alto deja de importar y por que un numero bajo no siempre es buena noticia.",
 "excerpt": "El promedio ecuatoriano y cómo usarlo para saber si un auto rodó mucho o poco. Y por qué un kilometraje bajo no siempre es buena señal.",
 "bloques": [
   "Es la primera cifra que mira todo el mundo después del precio, y también la más malinterpretada. Un auto con 180.000 km puede estar en mejor estado que uno con 90.000, y pasa más seguido de lo que la gente cree.",
   "Aquí va cómo leer el kilometraje de verdad: cuánto es normal según el año, cuándo debe preocupar y qué revisar en cada tramo.",

   {"h2": "El promedio y cómo usarlo"},
   "En Ecuador un vehículo particular recorre entre <strong>12.000 y 18.000 km al año</strong>. Con 15.000 como referencia sale una tabla sencilla:",
   {"tabla": [["Año del vehículo", "Kilometraje esperado", "Se considera bajo", "Se considera alto"], [
     ["2 años", "30.000 km", "menos de 20.000", "más de 45.000"],
     ["4 años", "60.000 km", "menos de 40.000", "más de 85.000"],
     ["6 años", "90.000 km", "menos de 60.000", "más de 125.000"],
     ["8 años", "120.000 km", "menos de 80.000", "más de 165.000"],
     ["10 años", "150.000 km", "menos de 100.000", "más de 200.000"],
   ]]},
   "La utilidad de la tabla no es descartar autos, es orientar la revisión. Un vehículo por encima del rango alto necesita una inspección más profunda; uno muy por debajo, preguntas distintas.",
   "Vale ajustar la referencia según el uso. Un auto de taxi o de reparto acumula 40.000 km al año sin que eso indique nada raro, mientras que uno de un jubilado que solo va al mercado puede quedarse en 6.000. Antes de juzgar el número, pregunta a qué se dedicaba el dueño anterior.",

   {"h2": "Por qué el kilometraje bajo puede ser mala noticia"},
   "Suena contraintuitivo, pero un auto que rodó poco no siempre está mejor. Los vehículos se dañan por uso y también por falta de uso:",
   {"ul": [
     "<strong>Sellos y retenes resecos</strong> por meses sin trabajar, que empiezan a filtrar apenas se usa el auto con regularidad.",
     "<strong>Batería y sistema eléctrico</strong> castigados por ciclos largos de descarga.",
     "<strong>Neumáticos con años</strong> aunque tengan labrado: el caucho envejece por tiempo, no por kilómetros.",
     "<strong>Frenos con óxido superficial</strong> en discos por estar detenido.",
     "<strong>Combustible viejo</strong> y sedimentos en el tanque en casos de inactividad prolongada.",
   ]},
   "Además, un kilometraje muy bajo para el año siempre merece una pregunta: ¿por qué? Las respuestas legítimas existen —segundo auto familiar, dueño que viajaba, vehículo de ciudad—, pero también existe la manipulación del odómetro.",

   {"h2": "Kilometraje contra mantenimiento: cuál pesa más"},
   "Si hay que elegir entre dos autos del mismo precio, uno con menos kilómetros y otro con mejor historial, el historial gana casi siempre. Un ejemplo de los que se ven en el patio:",
   {"tabla": [["", "Auto A", "Auto B"], [
     ["Año", "2018", "2018"],
     ["Kilometraje", "95.000 km", "165.000 km"],
     ["Facturas de mantenimiento", "Ninguna", "Todas, cada 5.000 km"],
     ["Correa de distribución", "Sin registro de cambio", "Cambiada a los 120.000 km"],
     ["Qué se sabe del motor", "Nada", "Todo"],
   ]]},
   "El auto B tiene 70.000 kilómetros más y es la mejor compra de los dos, porque su riesgo es conocido. El A puede estar perfecto o puede tener una correa a punto de cortarse; no hay forma de saberlo sin abrirlo.",
   "Esto no significa ignorar el odómetro. Significa que el kilometraje solo tiene sentido leído junto al historial, nunca solo.",

   {"h2": "Cómo detectar un kilometraje alterado"},
   {"ol": [
     "<strong>Contrasta con el desgaste físico.</strong> Pedales, volante, asiento del conductor y palanca de cambios cuentan la verdad. Un auto de 60.000 km con el pedal de freno pulido no cierra.",
     "<strong>Revisa los registros de mantenimiento.</strong> Las facturas de taller suelen anotar el kilometraje de cada visita.",
     "<strong>Consulta el historial de revisión técnica</strong>, donde también queda registrado.",
     "<strong>Pide un escaneo computarizado.</strong> En muchos modelos hay módulos que guardan kilometraje y no siempre se alteran todos.",
     "<strong>Mira las llantas.</strong> Si son originales y el auto declara 150.000 km, algo no cuadra.",
   ]},

   {"quote": "Los clientes preguntan primero por el kilometraje y nosotros les decimos que pregunten por el mantenimiento. Un auto con 160.000 km y todas las facturas al día es mejor compra que uno con 90.000 km sin historia. Lo vemos todas las semanas.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cuánto cuesta cada tramo en mantenimiento"},
   "El kilometraje importa sobre todo porque anticipa gastos. Estos son los reemplazos que suelen aparecer y en qué rango, para que entren en el presupuesto antes de comprar:",
   {"tabla": [["Alrededor de", "Qué suele tocar", "Rango de costo"], [
     ["60.000 km", "Frenos completos, batería", "$200 – $450"],
     ["90.000 km", "Amortiguadores, embrague en manuales", "$500 – $1.200"],
     ["120.000 km", "Correa de distribución si aplica, bomba de agua", "$300 – $700"],
     ["150.000 km", "Suspensión, mangueras, sensores", "$400 – $900"],
   ]]},
   "Si el auto que miras está justo antes de uno de esos umbrales, ese gasto es tuyo y debe descontarse del precio. Si acaba de pasarlo con facturas que lo prueban, el vehículo vale más y conviene reconocerlo en la negociación.",

   {"h2": "Qué revisar en cada tramo"},
   {"tabla": [["Kilometraje", "Dónde poner atención"], [
     ["Hasta 60.000 km", "Historial de choques; mecánicamente debería estar sano"],
     ["60.000 – 100.000 km", "Frenos, amortiguadores, embrague, correa de distribución si aplica"],
     ["100.000 – 150.000 km", "Bombas, sistema de enfriamiento, suspensión completa, caja"],
     ["Más de 150.000 km", "Compresión de motor, estado de caja, óxido y estructura"],
   ]]},
   f"El detalle de qué debe revisar el mecánico en cada caso está en {link(U_REVISION, 'la revisión mecánica antes de comprar')}, que es el paso que resuelve todas estas dudas de una vez.",

   {"h2": "Kilometraje de ciudad y kilometraje de carretera"},
   "Cien mil kilómetros no son iguales en todos lados. La carretera es mucho menos exigente que la ciudad: menos arranques, menos frenadas, temperatura estable.",
   "En la zona norte esto es relevante. Un auto que hizo Ibarra–Quito de forma regular acumula kilómetros de carretera, más benignos. Uno que trabajó dentro de Otavalo o Ibarra, con paradas constantes y pendientes, sufrió más por cada kilómetro recorrido.",
   "Preguntar cómo se usó el auto vale tanto como leer el número del tablero. Y si el vehículo trabajó en pendiente permanente, hay que mirar embrague, frenos y caja con más cuidado.",
   f"Con eso claro, la otra mitad de la decisión es cuánto valor le queda al vehículo por delante: lo vemos en {link(U_DEVAL, 'cuánto se devalúa un auto en Ecuador')}.",
   {"faq": [
     ("¿A partir de cuántos kilómetros ya no conviene comprar?",
      "No hay un número fijo. Un motor bien mantenido pasa los 250.000 km sin problema; uno descuidado falla a los 120.000. Manda el mantenimiento, no el odómetro."),
     ("¿El kilometraje afecta el financiamiento?",
      "Indirectamente. Afecta el avalúo del vehículo, y el avalúo influye en cuánto está dispuesta a financiar la entidad."),
     ("¿Los autos a diésel aguantan más kilómetros?",
      "En general sí, están diseñados para más recorrido. Pero su mantenimiento es más caro y descuidarlo sale peor."),
     ("¿Cómo sé el kilometraje real antes de ir a ver el auto?",
      "Pide una foto del tablero encendido junto con la placa visible. Es lo mínimo antes de viajar a verlo."),
   ]},
   f'¿Tienes dudas con un auto específico? <a href="{wa("Hola, quiero saber si el kilometraje de un auto es alto para su anio")}">Escríbenos por WhatsApp</a> con el año y los kilómetros y te decimos qué esperar y qué revisar antes de decidir.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
