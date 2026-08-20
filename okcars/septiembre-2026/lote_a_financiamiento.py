#!/usr/bin/env python3
"""Bloque A · financiamiento y crédito (7 posts).

Justificación con datos (Search Console, agosto 2026):
  · «carros creditos»               194 impresiones · posición 41,2 · 0 clics
  · «carros nuevos a credito»       167 impresiones · posición 51,4 · 0 clics
  · «credito directo auto»           68 impresiones · posición 69,3 · 0 clics
  · «financiamiento de autos nuevos» 68 impresiones · posición 38,6 · 0 clics
  Cluster completo de precio y financiamiento: 924 impresiones, CERO clics.

Los posts 1115 (cómo funciona el financiamiento) y 1125 (crédito directo vs
bancario) ya cubren lo general, así que estos siete van a la cola larga.
"""
from gutenberg import CAT, LISTADO, link, wa, guarda

POSTS = []

# ── 1 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto de entrada piden para un auto usado en Ecuador",
 "slug": "cuanto-entrada-auto-usado-ecuador",
 "date": "2026-09-01T09:00:00",
 "cat": CAT["financiamiento"],
 "tags": ["entrada", "crédito vehicular", "auto usado", "financiamiento"],
 "focus_kw": "entrada para auto usado",
 "yoast_title": "Cuánto de entrada piden para un auto usado",
 "yoast_desc": "La entrada de un auto usado en Ecuador va del 20% al 40% segun el ano del vehiculo. Como se calcula, que la sube, que la baja y un caso con numeros reales.",
 "excerpt": "La entrada define si compras o no compras. Cuánto piden de verdad según el año del auto, qué la sube, qué la baja y cómo se calcula sobre un caso real.",
 "bloques": [
   "Es la primera pregunta que llega por WhatsApp y casi siempre viene con miedo a la respuesta. La respuesta corta: entre el 20 % y el 40 % del valor del auto, y lo que mueve ese porcentaje no es tanto tu bolsillo como el año del vehículo.",
   "Aquí va cómo se calcula de verdad, con un caso concreto de nuestro patio en Ibarra, y las tres cosas que pueden bajarte la entrada varios cientos de dólares.",

   {"h2": "Por qué el año del auto manda más que tu sueldo"},
   "Quien financia no presta sobre el auto que ves: presta sobre lo que ese auto valdrá el día que haya que rematarlo si dejas de pagar. Un vehículo de 2023 conserva valor durante todo el crédito; uno de 2013 se deprecia más rápido de lo que amortizas.",
   "Por eso la entrada sube con la antigüedad, aunque tu capacidad de pago sea la misma. No es desconfianza hacia ti, es aritmética sobre la garantía.",
   {"tabla": [["Año del vehículo", "Entrada habitual", "Plazo máximo"], [
     ["2022 en adelante", "20 % – 25 %", "hasta 60 meses"],
     ["2018 – 2021", "25 % – 30 %", "48 a 60 meses"],
     ["2014 – 2017", "30 % – 40 %", "36 a 48 meses"],
     ["Anterior a 2014", "40 % o más", "24 a 36 meses"],
   ]]},

   {"h2": "Un caso con números reales"},
   f"Tomemos el {link(LISTADO, 'Kia Seltos 2025 de nuestro patio')}, en $20.500 con 64.560 km. Es un vehículo reciente, así que cae en el tramo de menor entrada.",
   {"ul": [
     "<strong>Entrada del 20 %:</strong> $4.100. Se financian $16.400.",
     "<strong>Entrada del 30 %:</strong> $6.150. Se financian $14.350.",
     "<strong>Diferencia en la cuota</strong> a 48 meses: unos $45 al mes entre una y otra.",
   ]},
   "Ese último dato es el que la gente no calcula. Cada $1.000 extra de entrada baja la cuota alrededor de $25 mensuales en un plazo de 48 meses. Si estás dudando entre poner más entrada o dejar plata en el bolsillo, esa es la referencia.",

   {"h2": "Las tres cosas que bajan la entrada"},
   {"h3": "Entregar tu auto actual como parte de pago"},
   "Es la vía más rápida y la que más gente ignora. El avalúo de tu vehículo actual entra como entrada, y si tienes un auto en buen estado puede cubrirla completa sin que saques efectivo.",
   {"h3": "Un buen historial en el buró"},
   "Si has pagado bien créditos anteriores —incluso de electrodomésticos o una tarjeta— eso pesa. Una calificación A puede bajarte cinco puntos porcentuales de entrada.",
   {"h3": "Elegir un auto más reciente"},
   "Suena contraintuitivo porque cuesta más, pero un vehículo de 2022 con 20 % de entrada puede pedir menos efectivo inicial que uno de 2015 con 40 %, aunque el precio de lista sea mayor. Vale la pena hacer las dos cuentas antes de descartar.",

   {"quote": "El error más común es venir con una cifra fija en la cabeza: «tengo tres mil de entrada». Lo correcto es al revés — decirnos cuánto tienes y cuánto puedes pagar al mes, y desde ahí buscamos qué auto entra. A veces alcanza para más de lo que la persona creía.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Entrada y plazo son la misma decisión"},
   "Mucha gente negocia solo la entrada y acepta el plazo que le ofrezcan, cuando en realidad son dos caras de lo mismo. Alargar el plazo baja la cuota pero encarece el crédito completo, y en un auto usado hay un límite claro: el plazo no debería superar la vida útil razonable que le queda al vehículo.",
   "Financiar a 60 meses un auto de 2015 significa que en el año cuatro seguirás pagando por algo que ya pide reparaciones serias. Es la receta del arrepentimiento. Para vehículos con más de ocho años, 36 meses es un techo sensato aunque te ofrezcan más.",
   {"tabla": [["Financiado", "Plazo", "Cuota aproximada"], [
     ["$16.400", "36 meses", "$540 – $580"],
     ["$16.400", "48 meses", "$430 – $470"],
     ["$16.400", "60 meses", "$360 – $400"],
   ]]},
   "Los rangos varían según la tasa de cada entidad, pero la proporción se mantiene: pasar de 48 a 60 meses baja la cuota unos $65 y suma cerca de un año más de intereses.",

   {"h2": "Lo que no cuenta como entrada"},
   "Hay gastos del proceso que la gente confunde con la entrada y que van aparte. Conviene tenerlos presupuestados para no quedarse corto el día de la firma.",
   {"ul": [
     "<strong>El traspaso de dominio</strong> y sus costos notariales.",
     "<strong>La matrícula</strong> del año en curso, si no está pagada.",
     "<strong>El seguro</strong>, que en un crédito suele ser obligatorio durante toda la vigencia.",
     "<strong>Los gastos administrativos</strong> de la entidad que financia.",
   ]},
   "En un auto de $20.000, ese conjunto puede sumar entre $600 y $1.200 según el caso. No es la entrada, pero sale del mismo bolsillo el mismo día.",

   {"h2": "Cómo se ve esto en el norte del país"},
   "En Imbabura y Carchi hay un factor que no aparece en las tablas: buena parte de los compradores son independientes —comerciantes de Otavalo y Atuntaqui, transportistas, agricultores de Pimampiro— que tienen ingresos reales pero irregulares y poco bancarizados.",
   "Para ese perfil la entrada pesa todavía más, porque compensa lo que el rol de pagos no puede demostrar. Un comerciante con buen movimiento pero sin sueldo fijo suele calificar poniendo un 35 % o 40 %, cuando con un rol de pagos habría entrado con 25 %.",
   "La otra particularidad del norte es la distancia. Mucha gente de Tulcán o Cayambe llega a Ibarra con la idea de resolver todo en un solo viaje, y conviene avisar: la precalificación se puede hacer por WhatsApp antes de venir, y así el viaje es solo para ver el auto y firmar.",

   {"h2": "Cuánto deberías poner, en la práctica"},
   "La regla que damos en el patio: pon la entrada más alta que puedas sin quedarte sin colchón. Vaciar los ahorros para bajar la cuota es mal negocio, porque el primer imprevisto —una llanta, una revisión, un mes flojo— te obliga a endeudarte de nuevo y más caro.",
   "Un punto medio razonable es dejar disponible el equivalente a tres cuotas después de pagar la entrada. Si con eso el número no cierra, conviene mirar un auto de menor valor antes que forzar el crédito.",
   {"faq": [
     ("¿Se puede comprar un auto usado sin entrada?",
      "Es muy poco frecuente y cuando ocurre suele ser porque se entrega otro vehículo como parte de pago. Sin entrada real ni vehículo de por medio, la mayoría de entidades no financia un usado."),
     ("¿La entrada se paga en efectivo?",
      "Efectivo, transferencia o con el avalúo de tu auto actual. También se puede combinar: parte en vehículo y el resto en efectivo."),
     ("¿Puedo pagar la entrada con tarjeta de crédito?",
      "Depende de la entidad. Algunas lo aceptan y otras no, porque implica endeudarse para pagar una entrada. Conviene preguntarlo antes de contar con esa opción."),
     ("¿Qué pasa si tengo poca entrada pero buen sueldo?",
      "Se puede compensar con un plazo más corto o con un garante. Vale la pena hacer la precalificación: a veces la entidad acepta menos entrada si la relación cuota-ingreso queda holgada."),
   ]},
   f'¿Quieres saber para qué te alcanza? <a href="{wa("Hola, quiero saber cuanto de entrada necesito para un auto en OKCars")}">Escríbenos por WhatsApp</a> con cuánto tienes disponible y cuánto podrías pagar al mes. Te decimos el mismo día qué opciones del {link(LISTADO, "patio")} entran en ese rango.',
 ]})

# ── 2 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Comprar auto a crédito sin historial crediticio: qué piden y qué opciones hay",
 "slug": "comprar-auto-credito-sin-historial",
 "date": "2026-09-03T09:00:00",
 "cat": CAT["financiamiento"],
 "tags": ["crédito", "historial crediticio", "primer auto", "buró"],
 "focus_kw": "crédito de auto sin historial",
 "yoast_title": "Auto a crédito sin historial crediticio",
 "yoast_desc": "Nunca has tenido un credito y quieres comprar auto: que piden los bancos, que alternativas hay y como construir historial desde cero en Ecuador.",
 "excerpt": "No tener historial no es lo mismo que tenerlo malo, aunque el sistema a veces los trate igual. Qué piden, qué alternativas existen y cómo empezar a construirlo.",
 "bloques": [
   "Hay una situación que frustra a mucha gente joven y a quien siempre manejó efectivo: nunca han pedido un crédito, nunca han fallado en nada, y justamente por eso el sistema no sabe qué hacer con ellos.",
   "No tener historial no es lo mismo que tener mal historial, aunque en la práctica algunas entidades los traten parecido. Esto es lo que sí se puede hacer.",

   {"h2": "Qué mira una entidad cuando no hay historial"},
   "Sin un registro de pagos previos, el análisis se apoya en otras señales. Estas son las que más pesan:",
   {"ul": [
     "<strong>Estabilidad laboral.</strong> Tiempo en el trabajo actual, más que el monto del sueldo. Un año en la misma empresa vale más que un sueldo alto de tres meses.",
     "<strong>Afiliación al IESS.</strong> Es la prueba más limpia de ingresos formales y de continuidad.",
     "<strong>Relación cuota-ingreso.</strong> Que la cuota no pase de un tercio de lo que entra al mes.",
     "<strong>Entrada disponible.</strong> A más entrada, menos riesgo, y con historial en blanco eso compensa mucho.",
   ]},

   {"h2": "Las cuatro rutas que funcionan"},
   {"h3": "1. Entrada más alta"},
   "Es la más directa. Subir del 20 % al 35 % o 40 % cambia por completo la conversación, porque el riesgo de la entidad baja de golpe. Si tienes ahorros, este es el mejor uso posible.",
   {"h3": "2. Garante"},
   "Una persona con historial e ingresos comprobables que respalde la operación. Es la vía clásica y sigue funcionando. Conviene que el garante entienda bien lo que firma: si dejas de pagar, le cobran a él.",
   {"h3": "3. Crédito directo del concesionario"},
   "Algunos patios financian con recursos propios y evalúan con criterios distintos a los de un banco, con más peso en la conversación y menos en el puntaje. Suele salir con tasa algo más alta y plazo más corto, pero es la puerta para quien no califica en banca tradicional.",
   {"h3": "4. Construir historial primero"},
   "Si no hay apuro, seis meses bastan para dejar rastro: una tarjeta de crédito de cupo bajo usada y pagada completa cada mes, o un crédito pequeño de consumo pagado puntualmente. Con eso ya apareces en el buró con calificación A.",

   {"quote": "Nos llega mucho cliente joven con buen trabajo, buen sueldo y cero historial, convencido de que no va a calificar. Casi siempre califica: lo que hay que hacer es armar bien la carpeta y a veces subir un poco la entrada. La negativa automática viene de aplicar en línea sin que nadie mire el caso.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Qué NO es tener mal historial"},
   "Conviene distinguir tres situaciones que la gente mezcla, porque el tratamiento es distinto en cada una.",
   {"ul": [
     "<strong>Sin historial.</strong> Nunca pediste crédito. No hay nada malo registrado, simplemente no hay información. Es la situación de este artículo y tiene salida.",
     "<strong>Historial corto.</strong> Tienes una o dos operaciones recientes al día. Cuenta a favor, aunque sea poco.",
     "<strong>Historial negativo.</strong> Hay mora registrada o una deuda castigada. Ahí el camino es otro: primero regularizar, después comprar.",
   ]},
   "Si no sabes en cuál estás, puedes consultarlo gratis una vez al año en el buró de crédito. Vale la pena hacerlo antes de iniciar cualquier trámite, porque a veces aparecen sorpresas: una deuda de telefonía olvidada o un consumo de tarjeta que quedó impago por unos dólares.",

   {"h2": "Qué documentos tener listos"},
   {"ul": [
     "Cédula y papeleta de votación vigentes.",
     "Rol de pagos de los últimos tres meses o certificado laboral con sueldo.",
     "Mecanizado del IESS, que muestra la continuidad de aportes.",
     "Estado de cuenta bancario de tres a seis meses, si lo tienes.",
     "Si eres independiente: RUC, declaraciones y movimientos de la cuenta del negocio.",
   ]},
   "Ese último punto importa: para un independiente sin historial, los movimientos bancarios reemplazan al rol de pagos. Si cobras todo en efectivo y no depositas, no hay cómo demostrar el ingreso, y ahí sí se complica.",

   {"h2": "Cuánto auto te conviene con historial en blanco"},
   f"Aquí va una recomendación en contra de nuestro propio interés comercial: con historial en blanco, no estires el presupuesto. Un primer crédito bien pagado abre todas las puertas siguientes; uno que te ahoga las cierra por años.",
   f"Si dudas entre dos vehículos, toma el de menor valor y plazo más corto. Terminarás antes, pagarás menos intereses y llegarás a tu segundo crédito con calificación A. Es exactamente lo que hicieron muchos de los clientes que hoy compran su segundo auto con nosotros. En el {link(LISTADO, 'listado del patio')} hay opciones en varios rangos justamente para eso.",

   {"h2": "El caso del comerciante del norte"},
   "En Imbabura este escenario es más común de lo que parece. Un comerciante de Otavalo o Atuntaqui puede mover bastante dinero al mes y no tener una sola línea en el buró, porque siempre trabajó con efectivo y con proveedores de palabra.",
   "Para ese perfil la clave es bancarizar antes de pedir. Depositar las ventas en una cuenta durante seis meses convierte un ingreso invisible en uno demostrable, y cambia por completo el resultado del análisis. Es el consejo que más damos y el que más resultados da.",
   f"Si el tiempo apremia, la combinación que funciona es entrada alta más garante. Con eso hemos cerrado operaciones sobre vehículos del {link(LISTADO, 'patio')} con clientes que llegaron convencidos de que no calificaban.",

   {"h2": "Lo que conviene no hacer"},
   "Aplicar en cinco entidades el mismo día. Cada consulta queda registrada, y un patrón de consultas múltiples en pocos días se lee como desesperación. Es mejor precalificar en una o dos, con asesoría, que disparar solicitudes a ver cuál pega.",
   "Tampoco conviene inflar el ingreso declarado. Se verifica, y una inconsistencia cierra la puerta por bastante tiempo.",
   {"faq": [
     ("¿Cuánto tiempo toma construir historial desde cero?",
      "Con una tarjeta de cupo bajo usada y pagada completa, unos seis meses bastan para tener calificación. Un año da un historial sólido."),
     ("¿Ser garante afecta mi propio crédito?",
      "Sí. La deuda garantizada aparece en tu perfil y reduce tu capacidad de endeudamiento propio, aunque el titular pague puntual."),
     ("¿El crédito directo es más caro?",
      "Suele tener tasa algo mayor y plazos más cortos que un banco, porque el riesgo lo asume el concesionario. A cambio, es más flexible en el análisis."),
     ("¿Sirve tener cuenta de ahorros con movimiento?",
      "Ayuda, sobre todo si muestra depósitos regulares. No reemplaza al historial crediticio, pero suma como evidencia de ingreso estable."),
     ("¿Puedo comprar a nombre de un familiar con historial?",
      "Se hace, pero conviene pensarlo dos veces: el auto queda a nombre de esa persona y la deuda también. Cualquier problema entre ambos se vuelve un problema legal sobre el vehículo. Es preferible la figura de garante, donde el auto queda a tu nombre."),
     ("¿La edad influye?",
      "Algunas entidades piden mínimo 21 o 23 años y ponen tope de edad al final del crédito. No es un impedimento habitual, pero conviene consultarlo si estás en los extremos."),
   ]},
   f'¿Es tu primer crédito? <a href="{wa("Hola, quiero comprar auto pero no tengo historial crediticio")}">Cuéntanos tu caso por WhatsApp</a> — con tu situación laboral y la entrada disponible te decimos qué opciones reales tienes antes de que hagas ninguna solicitud.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
