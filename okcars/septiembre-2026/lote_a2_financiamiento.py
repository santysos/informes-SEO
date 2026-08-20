#!/usr/bin/env python3
"""Bloque A (continuación) · financiamiento, posts 3 a 7."""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

FIN = CAT["financiamiento"]
U_ENTRADA = post_url(FIN, "cuanto-entrada-auto-usado-ecuador")
U_HISTORIAL = post_url(FIN, "comprar-auto-credito-sin-historial")
U_RIESGOS = post_url(FIN, "comprar-auto-central-de-riesgos")
U_APROBACION = post_url(FIN, "cuanto-tarda-aprobacion-credito-auto")

POSTS = []

# ── 3 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Comprar auto estando en central de riesgos: qué se puede y qué no",
 "slug": "comprar-auto-central-de-riesgos",
 "date": "2026-09-05T09:00:00",
 "cat": CAT["financiamiento"],
 "tags": ["central de riesgos", "buró de crédito", "crédito vehicular", "deudas"],
 "focus_kw": "comprar auto en central de riesgos",
 "yoast_title": "Comprar auto estando en central de riesgos",
 "yoast_desc": "Estar reportado no cierra todas las puertas, pero cambia las reglas. Que opciones quedan, cuanto tarda limpiar el historial y que conviene hacer primero.",
 "excerpt": "Estar reportado no cierra todas las puertas, pero cambia las reglas del juego. Qué opciones quedan, cuánto tarda limpiar el historial y qué conviene hacer antes.",
 "bloques": [
   "Llega bastante gente al patio con la misma frase: «estoy en el buró, seguro no puedo comprar». La respuesta honesta es que depende de tres cosas, y ninguna de ellas es la que la persona suele mencionar primero.",
   "Depende de si la deuda está vigente o ya pagada, de hace cuánto ocurrió, y de cuánto puedas poner de entrada. Vamos por partes.",

   {"h2": "Primero: saber exactamente en qué situación estás"},
   "Mucha gente cree estar reportada y no lo está, o cree que un atraso viejo la persigue cuando ya prescribió. Antes de cualquier trámite conviene consultar el buró — se puede hacer gratis una vez al año — y ver qué dice el reporte de verdad.",
   {"ul": [
     "<strong>Deuda vigente e impaga.</strong> Es la situación más difícil. Ninguna entidad regulada va a sumar deuda nueva sobre una impaga.",
     "<strong>Deuda pagada hace poco.</strong> El registro se actualiza pero el historial queda visible un tiempo. Aquí sí hay opciones.",
     "<strong>Deuda castigada y luego cancelada.</strong> Queda huella por varios años, aunque el estado sea «pagado».",
     "<strong>Atraso leve y antiguo.</strong> Un par de cuotas tardías hace tres años pesa mucho menos de lo que la gente teme.",
   ]},

   {"h2": "Por qué el estado importa más que el hecho de estar reportado"},
   "La palabra «buró» carga un estigma que no corresponde con cómo funciona la evaluación real. El buró no es una lista negra: es un historial. Registra lo bueno y lo malo, y lo que un analista mira no es si apareces, sino qué cuenta la secuencia.",
   "Una persona con cinco créditos pagados puntualmente y un atraso de dos meses en 2023 tiene mejor historial que alguien sin ningún registro. La ausencia total de historial —el famoso «nunca he pedido nada»— también complica, porque no hay evidencia de comportamiento.",
   "Por eso las dos frases que más escuchamos en el patio son igual de imprecisas: «estoy en el buró, no puedo» y «nunca he debido nada, me van a aprobar seguro». Ninguna de las dos anticipa el resultado.",

   {"h2": "Qué opciones quedan en cada caso"},
   {"h3": "Si la deuda sigue impaga"},
   "La recomendación es dura pero es la correcta: primero resolver, después comprar. Negociar con el acreedor, acordar un plan de pago y obtener el certificado de cancelación. Comprar un auto arrastrando una deuda impaga suele terminar en dos deudas impagas.",
   "Hay excepciones: si la deuda es de monto bajo, a veces conviene cancelarla con parte del dinero destinado a la entrada. Un pasivo de $800 puede estar bloqueando un crédito de $15.000.",
   {"h3": "Si ya pagaste pero el historial quedó marcado"},
   "Aquí sí se puede avanzar. Las rutas que funcionan: entrada alta —del 40 % para arriba—, un garante con buen historial, o crédito directo del concesionario, donde el análisis es más caso a caso y menos automático.",
   {"h3": "Si el problema es antiguo"},
   "Los registros no son eternos. Con el tiempo pierden peso en la evaluación, sobre todo si después hay operaciones nuevas bien pagadas. Un año de buen comportamiento reciente pesa más que un tropiezo de hace cuatro.",

   {"quote": "Lo que más nos toca hacer es bajar el drama. La gente llega pensando que está vetada de por vida y muchas veces lo que tiene es un atraso viejo de una tarjeta. Se consulta el buró, se ve qué dice de verdad, y desde ahí se arma el camino. La mitad de los casos son mejores de lo que el cliente creía.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "El camino que sí sirve, paso a paso"},
   {"ol": [
     "Consultar el buró y saber el estado exacto de cada registro.",
     "Cancelar lo que esté vigente, empezando por los montos pequeños que bloquean.",
     "Pedir los certificados de cancelación a cada acreedor y guardarlos.",
     "Dejar pasar unos meses con al menos una operación nueva bien pagada, si el tiempo lo permite.",
     "Precalificar antes de elegir el auto, para saber el rango real.",
     "Reunir la entrada más alta posible, que es lo que más compensa.",
   ]},

   {"h2": "Cuánto pesa la entrada cuando el historial no ayuda"},
   "Este es el punto que más cambia el resultado y el que menos se conversa. Cuando el historial tiene manchas, la entrada deja de ser una comodidad y pasa a ser el argumento principal de la solicitud.",
   {"tabla": [["Entrada", "Cómo se lee la solicitud", "Probabilidad con historial marcado"], [
     ["10 – 20 %", "Riesgo alto para la entidad", "Baja"],
     ["30 %", "Riesgo moderado", "Media, según el resto del perfil"],
     ["40 – 50 %", "El financiado es menor que el valor del auto", "Alta"],
     ["Más del 50 %", "Prácticamente una compra con complemento", "Muy alta"],
   ]]},
   f"La lógica es simple: mientras más pongas, menos arriesga quien presta y menos pesa el antecedente. Con una entrada del 45 % sobre un vehículo de $15.000 estás pidiendo $8.250, un monto que muchas entidades evalúan con criterios más flexibles. Si quieres el detalle de cómo se fija ese porcentaje, lo desglosamos en {link(U_ENTRADA, 'cuánto de entrada necesitas para un auto usado')}.",
   "También sirve acortar el plazo. Un crédito a 24 meses con cuota alta pero corta se aprueba más fácil que uno a 60 meses, porque la exposición en el tiempo es menor.",

   {"h2": "Lo que hay que evitar"},
   "Circulan por internet servicios que prometen «limpiar el buró» por un pago. No existe tal cosa: la información se actualiza sola cuando pagas y cumple sus plazos. Cualquiera que ofrezca borrarla está cobrando por algo que no puede hacer, o por algo ilegal.",
   "Tampoco conviene comprar a nombre de un tercero para esquivar el problema. El auto queda a nombre de esa persona, la deuda también, y cualquier desacuerdo entre las partes se convierte en un lío legal sobre el vehículo.",

   {"h2": "Una alternativa que casi nadie considera"},
   f"Si el crédito no es viable ahora, existe la opción de comprar de contado un auto más económico, usarlo dos o tres años y cambiarlo entregándolo como parte de pago cuando el historial ya esté limpio. En el {link(LISTADO, 'listado del patio')} hay vehículos en rangos bajos que sirven exactamente para eso.",
   "No es la compra soñada, pero resuelve la movilidad hoy y te deja en mejor posición para la compra siguiente. En Imbabura y Carchi lo hace bastante gente que necesita el auto para trabajar y no puede esperar un año.",
   {"faq": [
     ("¿Cuánto tiempo permanece un registro en el buró?",
      "Depende del tipo de operación y de si fue cancelada. Como referencia, la información de una deuda pagada sigue visible varios años, aunque su peso en la evaluación baja con el tiempo."),
     ("¿Puedo consultar mi buró gratis?",
      "Sí, la normativa permite una consulta gratuita al año. Vale la pena hacerla antes de iniciar cualquier trámite, porque a veces aparecen deudas olvidadas de telefonía o consumos pequeños."),
     ("¿Un garante resuelve el problema?",
      "Ayuda mucho, pero no siempre alcanza si hay deuda vigente. Con historial ya regularizado, un garante sólido suele ser suficiente."),
     ("¿El crédito directo revisa el buró?",
      "Sí, pero el análisis es distinto: pesa más la conversación, la entrada y la capacidad de pago demostrable, y menos el puntaje automático."),
   ]},
   f'¿Tienes dudas sobre tu caso? <a href="{wa("Hola, estoy reportado en el buro y quiero saber si puedo comprar un auto")}">Escríbenos por WhatsApp</a> y lo revisamos sin compromiso. Es mejor saber la situación real antes de hacer solicitudes que dejen más consultas registradas.',
 ]})

# ── 4 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto tarda la aprobación de un crédito para auto usado",
 "slug": "cuanto-tarda-aprobacion-credito-auto",
 "date": "2026-09-07T09:00:00",
 "cat": CAT["financiamiento"],
 "tags": ["crédito vehicular", "aprobación", "trámite", "financiamiento"],
 "focus_kw": "cuánto tarda aprobación crédito auto",
 "yoast_title": "Cuánto tarda aprobarse un crédito de auto",
 "yoast_desc": "De 24 horas a dos semanas segun quien financie y como llegue la carpeta. Los plazos reales por tipo de entidad y que hace que un tramite se demore.",
 "excerpt": "De 24 horas a dos semanas, y la diferencia casi nunca está en la entidad sino en cómo llega la carpeta. Los plazos reales y qué los alarga.",
 "bloques": [
   "Cuando alguien encuentra el auto que quiere, la siguiente pregunta es cuánto va a esperar. La respuesta va de un día a dos semanas, y lo que más mueve ese rango no es la entidad: es si la documentación llegó completa a la primera.",
   "Aquí van los plazos reales por tipo de financiamiento y las cinco cosas que hacen que un trámite se estire.",

   {"h2": "Los plazos, por tipo de entidad"},
   {"tabla": [["Quién financia", "Plazo habitual", "Con carpeta incompleta"], [
     ["Crédito directo del concesionario", "24 – 72 horas", "3 – 5 días"],
     ["Cooperativa", "2 – 5 días", "1 – 2 semanas"],
     ["Banco", "3 – 8 días", "2 – 3 semanas"],
     ["Banco con garante", "5 – 12 días", "3 semanas o más"],
   ]]},
   "El crédito directo es el más rápido porque la decisión se toma en el mismo lugar donde está el auto, sin comités intermedios. Los bancos son más lentos pero suelen dar mejor tasa, así que la elección depende de cuánta prisa tengas.",
   "Hay un matiz local que conviene considerar: si vives en Ibarra, Otavalo o Atuntaqui y tu cooperativa es de la zona, el trámite puede ser más ágil que en un banco nacional, porque quien evalúa muchas veces conoce el negocio o el barrio del solicitante. Ese conocimiento directo compensa la falta de papeles formales, sobre todo con comerciantes.",

   {"h2": "Qué pasa por dentro mientras esperas"},
   "Ayuda entender que «aprobación» no es un botón que alguien aprieta. Son cuatro etapas, y cada una puede detenerse por su cuenta.",
   {"ol": [
     "<strong>Recepción y armado de carpeta.</strong> Alguien revisa que estén todos los documentos y que sean legibles y vigentes. Aquí muere la mitad de los trámites rápidos.",
     "<strong>Consulta de historial.</strong> Automática y casi inmediata. Es la etapa que la gente teme y la que menos demora.",
     "<strong>Análisis de capacidad de pago.</strong> Un analista compara ingresos verificados contra deudas existentes y la cuota propuesta. Es donde se decide el monto real.",
     "<strong>Comité o aprobación final.</strong> En bancos suele sesionar en días fijos. Si tu carpeta llega el día después del comité, esperas hasta el siguiente.",
   ]},
   "Ese último punto explica muchas demoras que parecen arbitrarias. No es que tu solicitud esté durmiendo: está esperando la próxima sesión.",

   {"h2": "Lo que realmente demora un trámite"},
   {"h3": "1. Documentos incompletos o vencidos"},
   "Es la causa número uno y la más evitable. Una papeleta de votación vencida, un rol de pagos de hace cuatro meses o una cédula deteriorada devuelven la carpeta al inicio.",
   {"h3": "2. Ingresos difíciles de demostrar"},
   "Si eres independiente y cobras en efectivo, el analista necesita reconstruir tu ingreso desde declaraciones y movimientos. Eso toma días. Con rol de pagos y aportes al IESS, es cuestión de horas.",
   {"h3": "3. Inconsistencias entre lo declarado y lo verificado"},
   "Si dices ganar $1.200 y el mecanizado muestra $800, el analista se detiene. No siempre significa rechazo, pero sí una vuelta más de revisión.",
   {"h3": "4. El vehículo"},
   "El auto también se evalúa: que no tenga gravamen, que la matrícula esté al día, que el avalúo cuadre con el precio. Un vehículo con papeles en orden acelera; uno con un pendiente detiene todo hasta resolverlo.",
   {"h3": "5. El garante que aparece tarde"},
   "Cuando la entidad pide garante a mitad del proceso, el reloj se reinicia: hay que conseguir a la persona, convencerla, reunir sus documentos y evaluarla a ella también. Si sospechas que te lo van a pedir, adelántalo desde el inicio y ahórrate una semana.",
   {"h3": "6. Los días no hábiles"},
   "Suena obvio y sorprende igual. Una solicitud enviada un viernes por la tarde empieza a moverse el lunes, y si cae feriado se corre más. En Ecuador los feriados largos suman fácil tres o cuatro días al plazo.",

   {"quote": "El cliente que llega con la carpeta completa cierra en dos días. El que va mandando papeles de a poco tarda dos semanas, y termina creyendo que el banco se demoró. La demora casi siempre está antes de que la solicitud entre.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cómo acelerarlo desde tu lado"},
   {"ul": [
     "<strong>Precalifica antes de elegir el auto.</strong> Saber el monto aprobado de antemano quita la mitad del proceso al final.",
     "<strong>Reúne todo de una vez:</strong> cédula y papeleta vigentes, rol de pagos de tres meses, mecanizado del IESS, estado de cuenta y planilla de servicio básico.",
     "<strong>Revisa las fechas de vencimiento</strong> de tus documentos antes de entregarlos.",
     "<strong>Mantén el teléfono disponible.</strong> La verificación telefónica es un paso real y muchas carpetas se frenan porque nadie contesta.",
     "<strong>Avisa si esperas un ingreso variable</strong> —comisiones, décimo— para que el analista lo considere en vez de descartarlo.",
   ]},

   {"h2": "Si te dicen que no, no siempre es definitivo"},
   "Una negativa suele venir sin explicación detallada, y eso deja al solicitante sin saber qué corregir. Vale la pena preguntar la causa, porque las tres más comunes tienen arreglo:",
   {"ul": [
     "<strong>Capacidad de pago insuficiente.</strong> Se resuelve bajando el monto, subiendo la entrada o alargando el plazo.",
     "<strong>Ingreso no verificable.</strong> Se resuelve con declaraciones, facturas o movimientos bancarios de varios meses.",
     "<strong>Antigüedad laboral corta.</strong> A veces solo hay que esperar a cumplir seis meses o un año en el trabajo actual.",
   ]},
   f"Si la negativa viene por historial y no por ingresos, el camino es otro y lo explicamos aparte en {link(U_RIESGOS, 'comprar auto estando en central de riesgos')}.",
   "Cambiar el vehículo por uno de menor precio resuelve el primero de inmediato y es la salida más rápida cuando el problema es el monto y no la persona.",

   {"h2": "Entre la aprobación y las llaves"},
   f"Aprobado el crédito, todavía quedan pasos y conviene tenerlos en cuenta al planificar. La firma del contrato, el desembolso, el traspaso de dominio y la contratación del seguro suman entre dos y cinco días más. En total, desde que decides el auto hasta que manejas, lo realista es una a dos semanas con todo en orden.",
   f"Si vienes desde Tulcán, Cayambe u Otavalo, conviene coordinar por WhatsApp antes de viajar a Ibarra. Buena parte del trámite se adelanta a distancia y el viaje queda solo para ver el vehículo del {link(LISTADO, 'patio')} y firmar.",
   {"faq": [
     ("¿Puedo separar el auto mientras me aprueban?",
      "En la mayoría de patios sí, con un anticipo o una reserva formal. Conviene dejar por escrito qué pasa con ese dinero si el crédito no se aprueba."),
     ("¿Me pueden aprobar por menos de lo que pedí?",
      "Sí, y es frecuente. La entidad aprueba según capacidad de pago, no según el auto que elegiste. Por eso conviene precalificar antes de enamorarse de un vehículo."),
     ("¿Cuánto dura vigente una aprobación?",
      "Normalmente entre 30 y 60 días. Pasado ese plazo hay que actualizar documentos y volver a evaluar."),
     ("¿Puedo tramitar en dos entidades a la vez?",
      "Se puede, pero cada consulta queda registrada. Dos solicitudes son razonables; cinco en una semana se leen mal en el buró."),
   ]},
   f'¿Quieres adelantar el trámite? <a href="{wa("Hola, quiero precalificar para un credito de auto en OKCars")}">Escríbenos por WhatsApp</a> y te decimos qué documentos reunir según tu caso. Con la carpeta lista, la aprobación baja de semanas a días.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
