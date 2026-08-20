#!/usr/bin/env python3
"""Bloque C (cierre) · trámites, posts 15 y 16."""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

TRA = CAT["tramites"]
FIN = CAT["financiamiento"]
U_PAPELES = post_url(TRA, "papeles-antes-de-comprar-auto-usado")
U_TRASPASO = post_url(TRA, "traspaso-de-dominio-vehiculo-ecuador")
U_REVISION = post_url(TRA, "revision-mecanica-antes-de-comprar-auto")
U_DIRECTO = post_url(FIN, "credito-directo-auto-usado-ecuador")

POSTS = []

# ── 15 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Comprar un auto con prenda: qué significa y cómo se levanta",
 "slug": "comprar-auto-con-prenda-ecuador",
 "date": "2026-10-02T09:00:00",
 "cat": TRA,
 "tags": ["prenda", "gravamen", "trámites", "reserva de dominio"],
 "focus_kw": "comprar auto con prenda",
 "yoast_title": "Comprar un auto con prenda: qué significa y cómo se levanta",
 "yoast_desc": "Que es una prenda sobre un vehiculo, por que impide el traspaso, como se levanta paso a paso y como comprar sin riesgo un auto que todavia se paga.",
 "excerpt": "Un auto con prenda no se puede transferir, pero sí se puede comprar. Cómo hacerlo sin quedar expuesto.",
 "bloques": [
   "Aparece cuando haces la consulta de gravámenes: «prenda industrial» o «reserva de dominio» a favor de un banco o una cooperativa. Y para mucha gente ahí termina la conversación, cuando en realidad ahí empieza.",
   "Un vehículo con prenda es simplemente un auto que todavía se está pagando. Se puede comprar, pero el procedimiento es distinto y el orden importa muchísimo.",

   {"h2": "Qué es una prenda"},
   "Cuando alguien financia un vehículo, la entidad que presta el dinero inscribe una garantía sobre el auto. Esa inscripción queda registrada y produce un efecto concreto: el vehículo no se puede transferir a otro dueño mientras la deuda exista.",
   "En Ecuador esto aparece con dos nombres según la figura usada. La <strong>prenda industrial</strong> deja el auto a tu nombre pero con la garantía inscrita. La <strong>reserva de dominio</strong> mantiene la titularidad en manos del vendedor o financista hasta el pago final. El efecto práctico para un comprador es el mismo: sin levantar el gravamen, no hay traspaso.",

   {"h2": "Por qué no puedes simplemente ignorarla"},
   "Es el error que más caro sale. Alguien paga el auto, recibe las llaves y acuerda «hacer el traspaso más adelante». Mientras tanto:",
   {"ul": [
     "El vehículo sigue registrado con la garantía y a nombre del deudor original.",
     "Si esa persona deja de pagar, la entidad puede reclamar el auto — que ya está en tu casa.",
     "Si te pasa algo en la vía, el responsable legal es el titular, no tú.",
     "No puedes venderlo, ni usarlo como parte de pago, ni asegurarlo correctamente.",
   ]},
   "Pagaste por algo que legalmente no es tuyo y que un tercero puede reclamar. No hay contrato privado que resuelva eso.",

   {"h2": "Cómo se levanta, paso a paso"},
   {"ol": [
     "<strong>Pedir el certificado de saldo</strong> a la entidad acreedora, con el monto exacto para cancelar y su fecha de validez.",
     "<strong>Pagar ese saldo directamente a la entidad</strong>, nunca al vendedor. Este es el punto que protege al comprador.",
     "<strong>Obtener el certificado de cancelación</strong> y el documento de levantamiento del gravamen.",
     "<strong>Inscribir el levantamiento</strong> en el registro correspondiente.",
     "<strong>Verificar que el vehículo aparezca libre</strong> en la consulta de gravámenes.",
     "<strong>Recién ahí hacer el traspaso</strong> de dominio.",
   ]},
   "El paso 2 es el que hay que respetar sin excepciones. Si le entregas el dinero al vendedor confiando en que él cancelará la deuda, tu única garantía es su palabra.",

   {"h2": "La estructura que funciona cuando hay saldo pendiente"},
   "Supongamos que el auto se vende en $14.000 y tiene un saldo de deuda de $5.200. La operación se arma así:",
   {"tabla": [["Concepto", "Monto", "A quién se paga"], [
     ["Saldo de la deuda", "$5.200", "A la entidad acreedora, directamente"],
     ["Diferencia para el vendedor", "$8.800", "Al vendedor, al firmar"],
     ["Total", "$14.000", ""],
   ]]},
   "Los dos pagos deben ocurrir el mismo día y quedar documentados. Con el comprobante de cancelación en mano, el levantamiento se tramita y el traspaso queda habilitado.",

   {"quote": "Es una operación normal, la hacemos seguido. Lo que no hacemos nunca es entregar el saldo al vendedor para que él pague. Se paga a la entidad, con comprobante, y desde ahí se avanza. Esa sola regla evita el 100 % de los problemas.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Qué pasa si el vendedor no puede pagar la deuda"},
   "Hay un escenario que aparece seguido y conviene reconocerlo temprano: el vendedor quiere vender justamente porque ya no puede pagar las cuotas.",
   "Eso no invalida la operación —de hecho es una de las razones más comunes por las que se vende un auto— pero cambia el tono de la negociación. Si hay cuotas en mora, el saldo de cancelación incluye intereses acumulados y el monto puede ser bastante mayor al que el vendedor recuerda.",
   "Por eso el certificado de saldo debe pedirse a la entidad, no aceptarse de palabra. La diferencia entre lo que el vendedor cree deber y lo que realmente debe puede ser de varios cientos de dólares, y esa diferencia sale de algún lado.",

   {"h2": "Cuánto demora"},
   {"tabla": [["Etapa", "Tiempo habitual"], [
     ["Emisión del certificado de saldo", "1 a 3 días"],
     ["Procesamiento del pago", "1 a 2 días"],
     ["Emisión del levantamiento", "3 a 10 días"],
     ["Inscripción del levantamiento", "2 a 5 días"],
     ["Traspaso de dominio", "3 a 7 días"],
   ]]},
   "En total, entre dos y cuatro semanas. Es bastante más que una compraventa simple, y conviene saberlo antes de planificar la entrega del vehículo o el fin de un contrato de arriendo de otro auto.",

   {"h2": "Un caso distinto: la prenda a favor del patio"},
   "Vale distinguir la prenda de un vendedor particular de la que se inscribe cuando el patio te financia a ti. Son la misma figura legal pero situaciones opuestas.",
   "En el primer caso, la garantía es de otra persona y tú la heredas como problema. En el segundo, la garantía se constituye a tu favor en el sentido de que es lo que hace posible el crédito: el vendedor acepta financiarte porque tiene esa seguridad.",
   "Cuando terminas de pagar, el levantamiento lo tramita el propio concesionario y la matrícula queda limpia a tu nombre. No es algo que debas gestionar tú ni que deba preocuparte al momento de firmar.",
   "La confusión es común y hace que algunos compradores rechacen un buen financiamiento pensando que «el auto no va a ser mío». Lo va a ser; simplemente no antes de terminar de pagarlo, igual que en cualquier crédito bancario con prenda.",

   {"h2": "Cuándo conviene retirarse"},
   {"ul": [
     "<strong>Si el vendedor se niega a que pagues directamente a la entidad.</strong> No hay razón válida para esa negativa.",
     "<strong>Si el saldo es mayor al valor del auto.</strong> Significa que el vendedor tendría que poner dinero para vender, y esas operaciones se caen a mitad de camino.",
     "<strong>Si la deuda está en mora avanzada.</strong> Puede haber procesos judiciales en curso sobre el vehículo.",
     "<strong>Si no logras identificar con claridad a la entidad acreedora.</strong>",
   ]},
   f"Antes de llegar a este punto, conviene haber hecho la revisión documental completa: la lista está en {link(U_PAPELES, 'papeles que debes pedir antes de comprar un auto usado')}.",
   f"Y si compras en el {link(LISTADO, 'patio')}, esta verificación ya está hecha: ningún vehículo se ofrece con gravamen pendiente. Es la diferencia práctica frente a comprar a un particular en Ibarra u Otavalo por anuncio, donde toda esta gestión corre por tu cuenta.",
   {"faq": [
     ("¿Puedo financiar un auto que tiene prenda de otro dueño?",
      "Sí, pero la entidad que te financie va a exigir que el gravamen anterior se levante como parte de la operación. Suelen coordinarlo entre ellas."),
     ("¿Cuánto cuesta levantar una prenda?",
      "El levantamiento en sí tiene un costo administrativo menor. Lo significativo es el saldo de la deuda, que es lo que hay que cancelar."),
     ("¿Cómo sé si un auto tiene prenda?",
      "Con el certificado de gravámenes, que se consulta con la placa o el número de chasis antes de cualquier pago."),
     ("¿Sirve un contrato donde el vendedor se compromete a levantar la prenda?",
      "Da un respaldo legal, pero recuperar dinero por incumplimiento toma años. Es mucho mejor estructurar el pago para que el problema no pueda ocurrir."),
   ]},
   f'¿Estás mirando un auto con prenda? <a href="{wa("Hola, quiero asesoria sobre un auto que tiene prenda")}">Escríbenos por WhatsApp</a> y te explicamos cómo estructurar la compra sin riesgo, aunque el vehículo no sea nuestro.',
 ]})

# ── 16 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Revisión mecánica antes de comprar: qué mirar y dónde hacerla",
 "slug": "revision-mecanica-antes-de-comprar-auto",
 "date": "2026-10-05T09:00:00",
 "cat": TRA,
 "tags": ["revisión mecánica", "peritaje", "auto usado", "compra"],
 "focus_kw": "revisión mecánica antes de comprar auto",
 "yoast_title": "Revisión mecánica antes de comprar un auto usado",
 "yoast_desc": "Que revisa un mecanico antes de que compres un seminuevo, cuanto cuesta el peritaje en Ibarra y que hallazgos deben frenar la compra o bajar el precio.",
 "excerpt": "Entre $30 y $60 que pueden ahorrarte miles. Qué debe revisar el mecánico y qué hallazgos justifican bajarse de la compra.",
 "bloques": [
   "Es el paso que más gente se salta y el que más dinero ahorra. Una revisión mecánica independiente cuesta entre $30 y $60 en Ibarra, toma una hora y detecta problemas que un test drive de diez minutos jamás va a mostrar.",
   "Qué debe revisarse, cómo interpretar los hallazgos y cuáles justifican retirarse de la compra.",

   {"h2": "Quién debe hacerla"},
   "La regla básica: un mecánico que elijas tú, no el que sugiera el vendedor. No porque haya mala fe necesariamente, sino porque quien evalúa debe responder ante quien paga, y quien paga eres tú.",
   "Sirve un taller de confianza, un perito automotriz independiente o un centro especializado en peritajes. Lo importante es que emita un informe escrito, no una opinión verbal en el patio.",

   {"h2": "Lo que debe revisarse"},
   {"h3": "Motor"},
   {"ul": [
     "Compresión de cilindros, que revela el estado interno real.",
     "Fugas de aceite, refrigerante o combustible.",
     "Estado del aceite y del refrigerante: color, nivel y consistencia.",
     "Ruidos anormales en frío y en caliente, que son momentos distintos.",
     "Humo del escape: azul indica aceite, blanco persistente puede indicar refrigerante.",
   ]},
   {"h3": "Transmisión"},
   {"ul": [
     "Cambios suaves y sin golpes, tanto en automáticas como manuales.",
     "Estado del embrague en manuales: punto de agarre y si patina.",
     "Fugas en la caja y estado del fluido en automáticas.",
   ]},
   {"h3": "Suspensión y dirección"},
   {"ul": [
     "Amortiguadores, rótulas, terminales y bujes.",
     "Juego en la dirección y si el auto se va hacia un lado al soltar el volante.",
     "Desgaste irregular de llantas, que delata problemas de alineación o suspensión.",
   ]},
   {"h3": "Estructura"},
   {"ul": [
     "Señales de choque: soldaduras no originales, pintura con diferencias de tono, tornillos marcados.",
     "Estado del chasis y de los largueros.",
     "Óxido, sobre todo en vehículos que vinieron de la costa.",
   ]},
   {"h3": "Electrónica"},
   {"ul": [
     "Escaneo computarizado en busca de códigos de falla activos o borrados recientemente.",
     "Funcionamiento de todo lo eléctrico: luces, vidrios, aire acondicionado, tablero.",
   ]},

   {"h2": "Qué mirar según el kilometraje"},
   "El foco de la revisión cambia bastante según cuánto haya rodado el vehículo. Sirve orientar al mecánico con esto:",
   {"tabla": [["Kilometraje", "Dónde poner la lupa"], [
     ["Menos de 60.000 km", "Historial de choques y mantenimientos; mecánicamente debería estar sano"],
     ["60.000 – 120.000 km", "Embrague, amortiguadores, frenos, correa de distribución si aplica"],
     ["120.000 – 180.000 km", "Compresión de motor, caja, bombas y sistema de enfriamiento"],
     ["Más de 180.000 km", "Todo lo anterior más estado general de estructura y óxido"],
   ]]},
   "El punto de la correa de distribución merece atención propia. En los modelos que la usan, se cambia en un rango de kilometraje definido por el fabricante, y si venció sin reemplazo el riesgo de daño mayor es alto. Pregunta expresamente si se cambió y pide la factura.",

   {"h2": "El escaneo: el paso que no se puede omitir"},
   "En vehículos modernos, el escáner es lo que separa una revisión seria de un vistazo. Detecta códigos de falla que el vendedor pudo borrar días antes, muestra si hay testigos desactivados y revela problemas que todavía no dan síntomas al manejar.",
   "Un dato que vale conocer: si el escáner muestra que la memoria de fallas fue borrada hace muy poco, eso en sí mismo es información. No prueba mala intención, pero sí justifica preguntar.",

   {"quote": "Los autos del patio pasan por revisión antes de salir a la venta, y aun así le decimos al cliente que traiga su mecánico si quiere. Quien vende un auto en buen estado no tiene por qué temerle a una revisión independiente.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Lo que puedes revisar tú antes de llamar al mecánico"},
   "Hay un filtro previo que cuesta cero y descarta bastantes autos antes de gastar en peritaje:",
   {"ol": [
     "<strong>Mira el auto en frío</strong>, con el motor apagado desde hace horas. Muchos problemas solo se manifiestan al arrancar en frío.",
     "<strong>Revisa la varilla de aceite.</strong> Aceite lechoso o con partículas es señal de alto.",
     "<strong>Abre y cierra todas las puertas.</strong> Desalineaciones sugieren choque.",
     "<strong>Mira el desgaste del pedal de freno y del volante</strong> y contrástalo con el kilometraje declarado.",
     "<strong>Prueba el aire acondicionado</strong>, que es de las reparaciones caras que más se omiten.",
     "<strong>Maneja al menos veinte minutos</strong>, incluyendo una subida y una vía rápida, nunca apenas la vuelta a la manzana.",
   ]},
   "Ese último punto es clave en Imbabura: un auto que anda bien en plano puede mostrar otra cosa subiendo hacia Otavalo o en la cuesta de salida de Ibarra. Pide una prueba que incluya pendiente real.",

   {"h2": "Cómo interpretar los hallazgos"},
   {"tabla": [["Hallazgo", "Qué hacer"], [
     ["Desgaste normal de frenos o llantas", "Negociar precio, no frenar la compra"],
     ["Fuga leve de aceite", "Cotizar la reparación y descontarla"],
     ["Amortiguadores vencidos", "Negociar; es un gasto previsible"],
     ["Choque estructural reparado", "Retirarse, salvo precio muy por debajo y con conocimiento"],
     ["Compresión despareja entre cilindros", "Retirarse; es motor"],
     ["Caja automática con golpes", "Retirarse; la reparación es cara"],
     ["Numeración de chasis alterada", "Retirarse de inmediato"],
   ]]},
   "La regla es simple: lo que se desgasta y se reemplaza se negocia; lo que compromete motor, caja o estructura no se negocia, se evita.",
   "Y hay una forma correcta de usar el informe en la negociación: llegar con cotizaciones, no con adjetivos. Decir «los amortiguadores están malos, baja el precio» invita a discutir. Decir «cotizé el juego en $420, propongo cerrar en ese valor menos» convierte la conversación en aritmética.",

   {"h2": "Qué cuesta y qué ahorra"},
   "Un peritaje en Ibarra u Otavalo se mueve entre $30 y $60 según el nivel de detalle. Para dimensionarlo, estos son los costos típicos de lo que puede detectar:",
   {"tabla": [["Problema no detectado", "Costo aproximado de arreglarlo"], [
     ["Embrague completo", "$350 – $700"],
     ["Amortiguadores (juego)", "$300 – $600"],
     ["Caja automática reparada", "$1.200 – $3.000"],
     ["Reparación de motor", "$1.500 – $4.000"],
   ]]},
   f"Con esas cifras, la cuenta se hace sola. Y si el vehículo viene financiado, cualquiera de esos gastos aparece justo cuando ya estás pagando cuotas — algo a considerar al armar el presupuesto, como vimos en {link(U_DIRECTO, 'cómo funciona el crédito directo')}.",
   f"Una vez que la revisión mecánica sale bien, queda la parte documental. La lista completa está en {link(U_PAPELES, 'los papeles que debes pedir antes de comprar')}, y después el {link(LISTADO, 'traspaso')}.",
   {"faq": [
     ("¿El vendedor está obligado a permitir la revisión?",
      "No está obligado, pero una negativa es información suficiente. Un auto en buen estado no tiene nada que ocultar."),
     ("¿Puedo llevarlo a un concesionario de la marca?",
      "Sí, y en vehículos con mucha electrónica suele ser la mejor opción, aunque cueste algo más."),
     ("¿Sirve la revisión técnica vehicular obligatoria?",
      "Verifica seguridad y emisiones, no el estado mecánico general. No reemplaza un peritaje."),
     ("¿Cuánto demora?",
      "Entre una y dos horas para una revisión completa con escaneo. Conviene agendarla en lugar de llegar sin aviso."),
   ]},
   f'¿Vas a revisar un auto y no sabes qué pedir? <a href="{wa("Hola, quiero saber que revisar en un auto usado antes de comprarlo")}">Escríbenos por WhatsApp</a> y te pasamos la lista según el modelo y el kilometraje que tenga.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
