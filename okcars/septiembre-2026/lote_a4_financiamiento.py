#!/usr/bin/env python3
"""Bloque A (final) · financiamiento, posts 7 y 8."""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

FIN = CAT["financiamiento"]
U_ENTRADA = post_url(FIN, "cuanto-entrada-auto-usado-ecuador")
U_HISTORIAL = post_url(FIN, "comprar-auto-credito-sin-historial")
U_RIESGOS = post_url(FIN, "comprar-auto-central-de-riesgos")
U_APROBACION = post_url(FIN, "cuanto-tarda-aprobacion-credito-auto")
U_DIRECTO = post_url(FIN, "credito-directo-auto-usado-ecuador")
U_CUOTA = post_url(FIN, "cuota-mensual-auto-usado-calculo")

POSTS = []

# ── 7 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Banco o crédito directo para un seminuevo: cuál conviene",
 "slug": "banco-o-credito-directo-auto-usado",
 "date": "2026-09-14T09:00:00",
 "cat": FIN,
 "tags": ["crédito vehicular", "banco", "crédito directo", "comparativa"],
 "focus_kw": "banco o crédito directo auto usado",
 "yoast_title": "Banco o crédito directo: cuál conviene para tu auto",
 "yoast_desc": "Comparacion honesta entre financiar un seminuevo con banco o con el patio en Ibarra: costo real, tiempos, requisitos y en que perfil gana cada opcion.",
 "excerpt": "Ninguna de las dos gana siempre. Depende de tu tipo de ingreso, de cuánta prisa tengas y de cuánto puedas poner de entrada.",
 "bloques": [
   "Cuando alguien ya decidió comprar un seminuevo, la siguiente pregunta suele ser con qué financiarlo. Y la respuesta honesta —la que damos en el patio cuando alguien pregunta— es que depende de tu perfil, no de cuál sea «mejor» en abstracto.",
   "Aquí va la comparación completa, incluyendo los casos donde conviene ir al banco aunque nosotros financiemos.",

   {"h2": "La comparación, sin adornos"},
   {"tabla": [["Criterio", "Banco o cooperativa", "Crédito directo del patio"], [
     ["Tasa de interés", "Más baja", "Más alta"],
     ["Entrada mínima", "20 – 30 %", "30 – 50 %"],
     ["Plazo máximo", "Hasta 60 meses o más", "Normalmente 36 meses"],
     ["Tiempo de aprobación", "3 a 8 días", "24 a 72 horas"],
     ["Ingreso informal", "Difícil de sustentar", "Se puede sustentar"],
     ["Historial con manchas", "Suele frenar la operación", "Se pondera con otros factores"],
     ["Papeleo", "Extenso", "Reducido"],
   ]]},
   "Si miras solo la primera fila, el banco gana. Si miras las últimas cuatro, gana el crédito directo. Por eso la elección se resuelve mirando tu situación, no la tabla.",

   {"h2": "Cuánto cuesta de verdad la diferencia de tasa"},
   "Mucha gente asume que el crédito directo es carísimo. Vale ponerle números. Sobre $14.000 financiados:",
   {"tabla": [["Plazo", "Diferencia aproximada en intereses"], [
     ["12 meses", "$300 – $500"],
     ["24 meses", "$700 – $1.100"],
     ["36 meses", "$1.200 – $1.800"],
     ["48 meses", "$1.800 – $2.600"],
   ]]},
   "La lectura es clara: en plazos cortos la diferencia es manejable; en plazos largos se vuelve significativa. Si vas a pagar en 12 o 18 meses, la comodidad del crédito directo cuesta poco. Si vas a 48 meses, esa diferencia paga una matrícula y varios mantenimientos.",
   f"El detalle de cómo se comportan cuota y plazo está en {link(U_CUOTA, 'cómo se calcula la cuota mensual')}, que conviene leer antes de elegir plazo.",

   {"h2": "Lo que cambia además de la tasa"},
   {"h3": "Quién es el dueño mientras pagas"},
   "En el crédito bancario el auto queda a tu nombre con prenda a favor de la entidad. En el crédito directo suele quedar con reserva de dominio a favor del concesionario. En ambos casos manejas el vehículo, pero no puedes venderlo hasta cancelar.",
   {"h3": "Qué pasa si te atrasas"},
   "El banco tiene procedimientos estandarizados y reporta al buró de inmediato. El patio suele tener más margen para conversar y reprogramar, aunque también puede reclamar el vehículo si el atraso se prolonga. Ninguna de las dos es indolora.",
   {"h3": "El seguro"},
   "Casi todo crédito bancario exige póliza todo riesgo durante la vigencia, y esa prima entra en tu presupuesto mensual. En crédito directo la exigencia varía; conviene preguntarlo antes de comparar cuotas, porque puede significar $40 a $80 al mes de diferencia.",
   {"h3": "La flexibilidad del monto"},
   "El banco aprueba según capacidad de pago y puede darte menos de lo que pediste. El patio parte del vehículo que elegiste y ajusta entrada y plazo hasta que cuadre. Son dos lógicas distintas y explican por qué a veces uno aprueba y el otro no.",

   {"h2": "Cuándo te decimos que vayas al banco"},
   "Pasa seguido y no tiene nada de raro. Si llegas con rol de pagos, aportes al IESS al día, historial limpio y no tienes apuro, el banco te va a dar mejor tasa que nosotros. Decirte lo contrario sería venderte mal.",
   "En ese caso lo que hacemos es apartar el vehículo mientras tramitas y entregarte la documentación que el banco pida sobre el auto. La venta se cierra igual; simplemente el dinero viene de otro lado.",
   "Un dato práctico si vives fuera de Ibarra: las cooperativas de Otavalo, Atuntaqui y Cotacachi suelen ser más rápidas que las agencias bancarias grandes y entienden mejor el ingreso de comerciantes. Vale golpear esa puerta antes de asumir que el banco es la única alternativa formal.",

   {"quote": "Nos ha pasado de mandar clientes al banco. Si la persona califica bien y no tiene prisa, ahí le conviene. Preferimos que vuelva en tres años a cambiar el auto antes que sentir que le vendimos un crédito caro pudiendo tener otro.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cuándo conviene el crédito directo"},
   {"ul": [
     "<strong>Ingreso informal o variable.</strong> Comerciantes, transportistas, artesanos, gente que factura por servicios. Es el caso más común en Imbabura.",
     "<strong>Urgencia real.</strong> Si necesitas el auto esta semana porque el anterior murió y de él depende tu trabajo.",
     "<strong>Plazo corto por decisión propia.</strong> Si vas a cancelar en un año o año y medio, la tasa importa poco.",
     "<strong>Historial en recuperación.</strong> Cuando ya pagaste lo que debías pero el registro todavía pesa.",
     "<strong>Monto pequeño.</strong> Por $6.000 u $8.000 muchos bancos ni abren carpeta; el patio sí.",
   ]},

   {"h2": "El error que cuesta más caro que la tasa"},
   "Vale decirlo aunque no sea la pregunta del artículo: la decisión que más dinero define no es banco o patio, sino cuánto auto compras.",
   "Alguien que elige un vehículo $4.000 más caro del que necesitaba pierde más en ese salto que toda la diferencia de tasa entre las dos opciones sumada. Y encima arrastra ese sobreprecio a la matrícula, al seguro y a la depreciación.",
   f"Por eso conviene fijar primero el presupuesto mensual completo —cuota más gastos de tener el auto— y recién después mirar el {link(LISTADO, 'listado')}. En el orden inverso casi siempre se termina estirando el plazo para que quepa el auto que gustó.",

   {"h2": "La opción mixta que casi nadie propone"},
   "Hay un camino intermedio que funciona bien y rara vez se menciona: financiar con el patio a plazo corto y, si aparece una oportunidad mejor, cancelar anticipadamente con un crédito bancario o de consumo más barato.",
   "Sirve cuando necesitas el auto ya pero sabes que en unos meses tu situación documental va a mejorar —terminas de regularizar el RUC, cumples el año en tu trabajo nuevo, se limpia un registro—. Eso sí, hay que confirmar antes que el contrato permita prepago sin penalidad.",

   {"h2": "Tres preguntas que resuelven la decisión"},
   {"ol": [
     "<strong>¿Puedes demostrar tu ingreso con documentos formales?</strong> Si sí, empieza por el banco.",
     "<strong>¿Cuánto puedes esperar?</strong> Si necesitas el auto en menos de una semana, el banco casi nunca alcanza.",
     "<strong>¿En cuántos meses piensas pagarlo?</strong> Bajo 24 meses, la diferencia de tasa pesa poco. Sobre 36, pesa mucho.",
   ]},
   f"Con esas tres respuestas la decisión sale sola. Y sirven igual para cualquier vehículo del {link(LISTADO, 'listado del patio')}, sea de $9.500 o de $38.000.",
   {"faq": [
     ("¿Puedo tramitar en el banco y en el patio a la vez?",
      "Sí, y a veces conviene para comparar cifras reales. Ten en cuenta que cada solicitud queda registrada en el buró."),
     ("¿El patio acepta que pague la entrada con un crédito de consumo?",
      "Generalmente sí, aunque conviene revisar que sumando ambas cuotas el presupuesto siga siendo cómodo."),
     ("¿La cooperativa cuenta como banco en esta comparación?",
      "Sí, funciona con la misma lógica. En Imbabura muchas cooperativas locales son incluso más flexibles con ingreso informal que un banco nacional."),
     ("¿Puedo cambiar de financiamiento a mitad de camino?",
      "Se puede cancelar un crédito con otro, pero hay que verificar las condiciones de prepago antes de firmar el primero."),
   ]},
   f'¿No sabes cuál te conviene? <a href="{wa("Hola, quiero saber si me conviene banco o credito directo para un auto")}">Escríbenos por WhatsApp</a> contándonos cómo son tus ingresos y en cuánto tiempo piensas pagar. Te decimos con franqueza cuál de las dos vías te sale mejor, aunque sea la del banco.',
 ]})

# ── 8 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cambiar de auto entregando el tuyo como parte de pago",
 "slug": "cambiar-auto-parte-de-pago",
 "date": "2026-09-16T09:00:00",
 "cat": FIN,
 "tags": ["parte de pago", "cambio de auto", "avalúo", "seminuevos"],
 "focus_kw": "auto como parte de pago",
 "yoast_title": "Entregar tu auto como parte de pago: cómo funciona",
 "yoast_desc": "Como se avalua tu auto actual, que lo sube o lo baja de precio y cuando conviene entregarlo en parte de pago en lugar de venderlo por tu cuenta.",
 "excerpt": "Cómo se avalúa tu auto actual, qué sube y qué baja ese número, y en qué casos conviene más venderlo por tu cuenta.",
 "bloques": [
   "Entregar el auto que tienes para completar el que quieres es la forma más común de cambiar de vehículo en Ecuador. También es donde más dudas aparecen, porque el avalúo se percibe como una caja negra.",
   "Vamos a abrirla: cómo se calcula ese número, qué lo mueve y cuándo te conviene más vender por tu cuenta.",

   {"h2": "Cómo se avalúa tu auto"},
   "El avalúo parte de un precio de mercado de referencia para ese modelo, año y versión, y a partir de ahí se ajusta por el estado concreto del vehículo. Los factores que más pesan:",
   {"ul": [
     "<strong>Año y kilometraje.</strong> Las dos variables de mayor impacto, y en ese orden.",
     "<strong>Estado mecánico.</strong> Motor, caja, suspensión y frenos. Se revisa, no se asume.",
     "<strong>Carrocería y pintura.</strong> Golpes, retoques mal hechos y óxido descuentan.",
     "<strong>Documentación.</strong> Matrícula al día, sin multas, sin prenda ni gravamen.",
     "<strong>Historial de mantenimiento.</strong> Facturas de taller suman de verdad.",
     "<strong>Demanda del modelo.</strong> Un modelo que rota rápido vale más que uno difícil de revender.",
   ]},
   "Ese último punto explica avalúos que sorprenden. Dos autos del mismo año y kilometraje pueden separarse mil dólares solo porque uno se vende en dos semanas y el otro se queda meses en el patio.",

   {"h2": "Por qué el avalúo es menor que el precio de venta"},
   "Es la pregunta incómoda y merece respuesta directa. Si tu auto se vende en $12.000, el avalúo va a estar por debajo, y no es un abuso: entre recibirlo y revenderlo hay costos reales.",
   {"tabla": [["Concepto", "Qué implica"], [
     ["Alistamiento", "Mecánica, pulida, detallado, repuestos menores"],
     ["Tiempo en patio", "Capital detenido semanas o meses"],
     ["Garantía", "Lo que el patio responde ante el siguiente comprador"],
     ["Trámites", "Traspasos, transferencias, gestión"],
     ["Margen", "La utilidad del negocio"],
   ]]},
   "Cuando alguien vende por su cuenta se queda con esa diferencia, pero también asume todo lo anterior: publicar, atender desconocidos, agendar revisiones, negociar y hacer el traspaso. Es un trabajo real que toma semanas.",

   {"quote": "Le decimos al cliente el número y le explicamos de dónde sale. Algunos deciden venderlo ellos y está perfecto. Los que aceptan generalmente valoran cerrar todo en un día y no tener que atender a diez interesados por WhatsApp.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Los papeles que tienen que estar en orden"},
   "Antes de que el avalúo se convierta en una oferta firme, se revisa la parte documental. Es donde se caen más operaciones, casi siempre por cosas que el dueño no sabía que estaban pendientes.",
   {"ul": [
     "<strong>Matrícula vigente</strong> y a nombre de quien va a firmar la entrega.",
     "<strong>Sin multas ni valores pendientes</strong> en la ANT o el municipio correspondiente.",
     "<strong>Sin prenda ni reserva de dominio</strong> activa, salvo que se acuerde cancelarla en la misma operación.",
     "<strong>Revisión técnica al día</strong> según el calendario de tu provincia.",
     "<strong>Cédula del titular</strong> y, si el auto está a nombre de una empresa o de un tercero, la autorización correspondiente.",
   ]},
   "Si el vehículo está a nombre de un familiar que ya no vive en el país o de una sucesión sin resolver, conviene avisarlo desde el primer contacto: se puede hacer, pero el trámite es otro y toma más tiempo.",

   {"h2": "Cuándo conviene la parte de pago"},
   {"ul": [
     "<strong>Cuando necesitas el cambio ya.</strong> Vender por tu cuenta puede tomar de uno a tres meses.",
     "<strong>Cuando el auto tiene detalles.</strong> Un vehículo con pendientes mecánicos se vende mal entre particulares y el patio lo asume.",
     "<strong>Cuando no quieres el riesgo.</strong> Vender a un desconocido implica manejar dinero y trámites con alguien de quien no sabes nada.",
     "<strong>Cuando el avalúo entra como entrada del crédito.</strong> Muchas veces el auto entregado cubre la entrada completa, y eso destraba la compra sin sacar efectivo.",
   ]},
   {"h2": "Cuándo conviene vender por tu cuenta"},
   {"ul": [
     "<strong>Si el modelo es muy demandado</strong> y sabes que se vende rápido en tu ciudad.",
     "<strong>Si el auto está impecable</strong> y con papeles y mantenimientos al día.",
     "<strong>Si no tienes prisa</strong> y puedes esperar al comprador correcto.",
   ]},

   {"h2": "Cómo se ve el negocio completo en números"},
   "Un ejemplo típico ayuda a ver el movimiento real del dinero. Supongamos que tienes un vehículo que en avalúo queda en $8.000 y quieres llevarte uno de $20.500.",
   {"tabla": [["Concepto", "Valor"], [
     ["Vehículo que llevas", "$20.500"],
     ["Avalúo del tuyo (a favor)", "– $8.000"],
     ["Efectivo adicional que aportas", "– $2.000"],
     ["Saldo a financiar", "$10.500"],
   ]]},
   "En este caso el auto entregado cubrió el 39 % del valor y el efectivo aportado otro 10 %. Con casi la mitad cubierta, el crédito por $10.500 es mucho más fácil de aprobar y la cuota entra sin apretar el presupuesto.",
   f"Es la razón por la que la parte de pago destraba tantas compras: no es solo un descuento, es la entrada resuelta sin sacar ahorros. Sobre cuánto conviene que sea esa entrada, el detalle está en {link(U_ENTRADA, 'cuánto de entrada necesitas para un auto usado')}.",

   {"h2": "Cómo llegar con el mejor avalúo posible"},
   {"ol": [
     "<strong>Ponte al día con las multas y la matrícula.</strong> Un pendiente en el ANT frena o descuenta.",
     "<strong>Junta las facturas de mantenimiento.</strong> Es la evidencia más convincente de que el auto fue cuidado.",
     "<strong>Haz una limpieza a fondo.</strong> No cambia la mecánica, pero sí la percepción, y la percepción entra en el número.",
     "<strong>Arregla lo barato.</strong> Un foco quemado o una llanta lisa descuentan más de lo que cuesta repararlos.",
     "<strong>No escondas fallas.</strong> Se detectan en la revisión y solo hacen perder tiempo a las dos partes.",
   ]},
   f"Con eso listo, la valoración se hace en el mismo día. Si vienes desde Otavalo, Atuntaqui o Cayambe hasta Ibarra, conviene mandar fotos y datos antes por WhatsApp para tener un rango estimado y no viajar por gusto.",
   f"Y si el avalúo cubre la entrada, el siguiente paso es definir el financiamiento del saldo. Ahí sirve mirar {link(U_DIRECTO, 'cómo funciona el crédito directo')} y compararlo con lo que te ofrezca tu banco.",
   {"faq": [
     ("¿Reciben autos con crédito pendiente?",
      "Depende del saldo. Si el avalúo lo cubre, se puede cancelar la deuda y usar la diferencia. Si el saldo es mayor al avalúo, hay que aportar la diferencia."),
     ("¿Qué pasa si mi auto vale más que el que quiero llevar?",
      "Se puede pagar la diferencia a favor tuyo, aunque no todos los patios lo hacen. Conviene preguntarlo desde el inicio."),
     ("¿El avalúo tiene vigencia?",
      "Sí, normalmente unos días. El mercado se mueve y el estado del vehículo también."),
     ("¿Puedo entregar una moto o una camioneta de trabajo?",
      "Se evalúa caso a caso. Lo que manda es qué tan rápido se pueda revender ese vehículo en la zona."),
   ]},
   f'¿Quieres saber cuánto vale el tuyo? <a href="{wa("Hola, quiero entregar mi auto como parte de pago en OKCars")}">Escríbenos por WhatsApp</a> con año, modelo, kilometraje y unas fotos. Te damos un rango el mismo día y, si te sirve, coordinamos la revisión en el {link(LISTADO, "patio")}.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
