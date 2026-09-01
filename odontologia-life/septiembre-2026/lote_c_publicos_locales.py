#!/usr/bin/env python3
"""Bloque C · públicos y hábitos de la zona (Otavalo e Imbabura), posts 1 a 5.

Ángulo del lote: quién es el paciente real de la clínica y cómo vive.
Comerciantes y artesanos, gente de comunidades alejadas, agua sin flúor,
comida serrana y trabajo de cara al público.

Regla del lote: la cultura local no se trata como un problema a corregir.
Se describe lo que pasa en la boca y se dan salidas que no obligan a nadie
a dejar de comer, de trabajar ni de celebrar como celebra.
"""
from gutenberg import CAT, link, wa, url, aviso_precio, DISCLAIMER, guarda

POSTS = []

# ── URLs internas reales (todas con permalink resuelto) ──────────────
U_LIMPIEZA   = url("limpieza-dental-otavalo-beneficios")
U_CADA_CUAN  = url("cada-cuanto-ir-al-dentista-salud-bucal")
U_DENTISTA   = url("dentista-otavalo-clinica-dental")
U_BRUXISMO   = url("bruxismo-rechinar-dientes-ferula-descarga")
U_CALZA      = url("calza-dental-resina-amalgama")
U_SENSIB     = url("sensibilidad-dental-causas-tratamiento")
U_EMERGENCIA = url("emergencias-dentales-dolor-muela-fractura")
U_SELLANTES  = url("sellantes-dentales-en-ninos-prevencion-caries")
U_FLUOR      = url("fluorizacion-dental-que-es-como-protege")
U_ENJUAGUES  = url("enjuagues-bucales-cuando-usarlos-y-cual-es-mejor")
U_CEPILLO    = url("como-elegir-el-cepillo-de-dientes-ideal")
U_ALIMENTOS  = url("alimentos-para-dientes-sanos")
U_MAL_ALIENT = url("mal-aliento-halitosis-causas-solucion")
U_GINGIVITIS = url("gingivitis-vs-periodontitis-tratamientos")
U_ENDODONCIA = url("endodoncia-ecuador-guia-tratamiento-conducto")
U_ODONTOPED  = url("odontopediatra-en-otavalo-cuidados")

P_LIMPIEZA = f"<strong>Limpieza dental: desde $25</strong>. {DISCLAIMER}"
P_RESINA   = f"<strong>Resina o calza: desde $30</strong>. {DISCLAIMER}"
P_EXTRACC  = f"<strong>Extracción simple: desde $35</strong>. {DISCLAIMER}"


# ── 1 · comerciantes y artesanos ─────────────────────────────────────
POSTS.append({
 "title": "Salud dental para comerciantes y artesanos de Otavalo",
 "slug": "salud-dental-para-comerciantes-y-artesanos-de-otavalo",
 "date": "2026-10-03T09:00:00",
 "cat": CAT["publicos"],
 "tags": ["comerciantes", "artesanos", "plaza de Ponchos", "prevención", "Otavalo"],
 "focus_kw": "salud dental para comerciantes",
 "yoast_title": "Salud dental para comerciantes de Otavalo",
 "yoast_desc": ("Comer parado, cafe con azucar cada dos horas y la cita que nunca "
                "llega: que le hace eso a tus dientes y como resolverlo sin cerrar "
                "el puesto un dia entero."),
 "excerpt": ("Quien atiende un puesto todo el día come a pedazos, toma azúcar a "
             "goteo y posterga la cita para no cerrar. Las tres cosas tienen "
             "arreglo, y ninguna obliga a perder el día."),
 "bloques": [
   "Abres temprano, la plaza se llena y comes lo que se pueda comer parado. El almuerzo termina siendo un pan a media mañana, una cola al mediodía y algo dulce que trajo el vecino de puesto. Entre atender y cobrar, el día se va sin que hayas tomado un vaso de agua.",
   "Ese ritmo tiene un efecto directo en los dientes, y no es el que la mayoría imagina. El problema casi nunca es la cantidad de azúcar. Es el goteo: muchas entradas pequeñas, repartidas a lo largo de doce horas, sin un momento para cepillarse en medio.",

   {"h2": "Comer a pedacitos hace más daño que comer bastante de una vez"},
   "Cada vez que entra algo dulce o harinoso a la boca, las bacterias de la placa producen ácido durante unos veinte a treinta minutos. Después la saliva lo neutraliza y el esmalte recupera lo que perdió. Ese ciclo es normal y el diente lo aguanta.",
   "Lo que no aguanta es que el ciclo se reinicie ocho veces al día. Un caramelo cada hora hace más daño que el postre entero comido de una sentada: el esmalte nunca alcanza a recuperarse entre ataque y ataque.",
   "Traducido al puesto: el café con azúcar de las nueve, el bizcocho de las once, la cola que se abre al mediodía y se termina a las tres. Cada uno por separado es inofensivo. Juntos son una jornada completa de desmineralización.",

   {"h2": "La botella abierta toda la mañana es peor que la botella tomada de golpe"},
   "Las bebidas azucaradas suman dos cosas: el azúcar y su propio ácido. El fosfórico y el cítrico ablandan el esmalte aunque la bebida sea sin azúcar, así que la versión light no salva del todo.",
   "El detalle que cambia el resultado es cómo la tomas. Si te tomas la cola en diez minutos, hay un ataque. Si la dejas destapada junto a la caja y le das un sorbo cada quince minutos, hay un ataque continuo de tres horas. Misma cantidad, daño muy distinto.",
   "Dos ajustes que caben en cualquier puesto: ten agua a la mano y bébela entre los cafés, y cuando tomes algo dulce o ácido, termínalo y enjuágate con agua. No te cepilles enseguida después de algo ácido: el esmalte queda blando media hora y el cepillo lo desgasta.",

   {"h2": "Apretar los dientes en temporada alta"},
   "En las semanas fuertes de venta aparece algo que casi nadie relaciona con la boca: el apriete. Días largos, cuentas por cuadrar, mercadería que no llega. Mucha gente termina apretando la mandíbula de noche sin enterarse.",
   f"Las señales son despertarse con la mandíbula cansada, dolor de cabeza en las sienes al levantarse, dientes que empiezan a sentirse sensibles o filos que se aplanan. Lo desarrollamos en {link(U_BRUXISMO, 'el artículo sobre bruxismo y férulas de descarga')}, y se resuelve con algo tan simple como una férula, siempre que se detecte antes de que el desgaste sea profundo.",

   {"quote": "El paciente comerciante casi nunca llega por prevención. Llega en enero o en octubre, cuando baja el movimiento y ya le duele. Para entonces lo que hace un año era una calza de treinta dólares se volvió una endodoncia con corona.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Qué se resuelve en una sola cita y desde cuánto"},
   aviso_precio(),
   {"tabla": [["Motivo", "Cuántas citas suele tomar", "Valor referencial"], [
     ["Limpieza y revisión completa", "Una", "Desde $25"],
     ["Caries pequeña, sin dolor", "Una", "Desde $30 por pieza"],
     ["Muela rota que ya no se puede salvar", "Una", "Desde $35"],
     ["Encía que sangra al cepillar", "Una para evaluar, luego según el caso", "Se define en la valoración"],
     ["Diente con dolor que despierta de noche", "Varias", "Se define en la valoración"],
   ]]},
   f"Las tres primeras filas se cierran en una mañana. Las dos últimas no, y son las que aparecen cuando se dejó pasar el tiempo. Sobre cuánto resuelve una calza y cuándo ya no alcanza, está {link(U_CALZA, 'esta guía sobre calzas de resina')}.",

   {"h2": "Cómo ir al dentista sin cerrar el local un día entero"},
   "El obstáculo real de quien vende no es el dinero, es la hora perdida. Se puede planificar:",
   {"ol": [
     "<strong>Agenda la primera hora de la mañana o la última de la tarde.</strong> Antes de que se llene la plaza o después de recoger, la ausencia casi no se siente.",
     "<strong>Cuenta todo lo que te molesta en la primera cita.</strong> Ese diente que se siente raro al frío también entra.",
     "<strong>Pide el plan completo por escrito</strong>, con el orden de prioridad y cuántas citas son.",
     "<strong>Junta procedimientos en la misma sesión</strong> cuando se pueda. Dos calzas en una cita es un solo viaje y una sola anestesia.",
     "<strong>Deja agendada la siguiente cita antes de salir.</strong> Lo que no queda en el calendario ese mismo día se posterga tres meses.",
   ]},
   f"En Otavalo trabajamos con bastantes pacientes que venden en la plaza de Ponchos y con familias que bajan desde Cotacachi. La valoración inicial no tiene costo y sirve exactamente para eso: saber en cuántas mañanas se resuelve lo tuyo antes de comprometer ninguna. Si aún no tienes clínica de cabecera, {link(U_DENTISTA, 'aquí explicamos qué mirar al elegirla')}.",

   {"h2": "Cuándo postergar la cita sí tiene sentido"},
   "No todo es urgente y no hace falta fingir que sí. Si lo que quieres resolver es estético, si es una mancha que llevas años viendo igual, o si estuviste hace tres meses y no apareció nada nuevo, puedes esperar a que baje el movimiento.",
   f"Lo que no espera es otra lista: dolor que te despierta de noche, hinchazón en la cara o el cuello, un diente que se mueve, sangrado que no cede en una semana, o un golpe que aflojó una pieza. Esas cinco cosas cambian de categoría rápido, y en {link(U_EMERGENCIA, 'esta guía de emergencias dentales')} está qué hacer mientras llegas.",
   f"Para el resto, la referencia de cada cuánto revisarse está en {link(U_CADA_CUAN, 'este artículo sobre la frecuencia de visitas')}: una vez al año con limpieza cubre a la mayoría de adultos sin problemas activos.",

   {"faq": [
     ("Trabajo todos los días, ¿atienden fines de semana?",
      "La disponibilidad varía por semana y por especialidad. Escríbenos con dos o tres horarios posibles y te confirmamos cuál calza."),
     ("¿Puedo hacerme varias calzas el mismo día?",
      f"En general sí, sobre todo si están del mismo lado y se puede usar una sola anestesia. Depende del tamaño de cada una, y {link(U_CALZA, 'aquí está el detalle')}."),
     ("Tomo mucho café, ¿la limpieza me quita las manchas?",
      "La limpieza retira la mancha superficial de café y de té, que es la que se pega al sarro. El color natural del diente no cambia con una limpieza: eso es otro tratamiento y su valor se define en la valoración, que no tiene costo."),
     ("¿Cada cuánto debería hacerme una limpieza si vendo comida?",
      "Si estás todo el día cerca de comida y picas seguido, cada seis meses es lo razonable. Si además fumas o las encías te sangran, conviene acortar a cuatro meses hasta que se estabilice."),
   ]},
   f'¿Quieres saber en cuántas citas se resuelve lo tuyo antes de comprometer una mañana? <a href="{wa("Hola, tengo un puesto en Otavalo y quiero agendar una revision en horario temprano")}">Escríbenos por WhatsApp</a>. La valoración no tiene costo y de ahí sale el plan con fechas.',
 ]})


# ── 2 · zonas rurales de Imbabura ────────────────────────────────────
POSTS.append({
 "title": "Cuidado dental en zonas rurales de Imbabura: qué se resuelve en casa y qué no espera",
 "slug": "cuidado-dental-en-zonas-rurales-de-imbabura",
 "date": "2026-10-05T09:00:00",
 "cat": CAT["prevencion"],
 "tags": ["zonas rurales", "Imbabura", "prevención", "comunidades", "urgencias"],
 "focus_kw": "cuidado dental zonas rurales",
 "yoast_title": "Cuidado dental en zonas rurales de Imbabura",
 "yoast_desc": ("Cuando bajar al dentista cuesta medio dia de trabajo, la visita "
                "tiene que rendir. Que prevenir en casa, cada cuanto bajar y que "
                "senales no esperan."),
 "excerpt": ("Bajar al dentista cuesta el pasaje y medio día de trabajo. Cómo "
             "prevenir en casa, cómo hacer que un viaje rinda por tres y qué "
             "señales no pueden esperar."),
 "bloques": [
   "Cuando la clínica queda a una hora de camino, la consulta deja de ser una consulta y se vuelve una jornada. Está el pasaje, el tiempo de ida y vuelta, las horas que no trabajaste y, muchas veces, alguien que tuvo que quedarse con los niños o con los animales.",
   "Con ese costo encima, postergar no es descuido: es aritmética. Lo que sí se puede cambiar es cuánto rinde cada viaje y cuánto se resuelve sin viajar. De eso trata este artículo.",

   {"h2": "Lo que de verdad mueve la aguja en casa"},
   "De todo lo que se puede hacer sin salir, hay algo que pesa más que lo demás junto: el cepillado de la noche, con pasta con flúor. Mientras duermes baja la saliva y el diente queda sin su defensa natural ocho horas. Si vas a hacer un solo cepillado bien hecho al día, que sea ese.",
   "Lo segundo que más rinde es limpiar entre las muelas. Casi toda la caries de adulto empieza donde dos dientes se tocan, que es justo donde el cepillo no llega. Hilo, cepillos interdentales o los palillos interdentales de farmacia hacen el trabajo.",
   "Y un detalle práctico: no hace falta lavabo. Un jarro de agua alcanza para cepillarse. Lo importante es que después escupas la pasta y no te enjuagues con agua, porque el flúor tiene que quedarse un rato sobre el diente para trabajar.",
   f"Para una boca sana, un cepillo manual de cerdas suaves usado bien rinde igual que cualquier otro; la comparación completa está en {link(U_CEPILLO, 'este artículo sobre cepillo manual y eléctrico')}.",

   {"h2": "Cada cuánto conviene bajar, según tu caso"},
   "Bajar dos veces al año cuando no hace falta es tiempo perdido, y bajar una vez cada cinco años cuando hay encías enfermas sale caro. La frecuencia depende del caso:",
   {"tabla": [["Situación", "Cada cuánto", "Qué se hace en esa visita"], [
     ["Adulto sin caries ni sangrado desde hace años", "Una vez al año", "Revisión y limpieza"],
     ["Niños con dientes en recambio", "Dos veces al año", "Revisión, flúor y sellantes si hacen falta"],
     ["Encías que sangran al cepillar", "Cada 3 a 6 meses hasta estabilizar", "Tratamiento de encías y control"],
     ["Embarazo", "Una vez, de preferencia en el segundo trimestre", "Limpieza y revisión"],
     ["Prótesis, implantes o coronas", "Dos veces al año", "Control del ajuste y de la encía"],
     ["Brackets", "Cada mes", "Control de ortodoncia"],
   ]]},
   f"Esa última fila conviene mirarla antes de empezar cualquier ortodoncia: los brackets piden una visita mensual durante uno o dos años, y si el camino es largo esa cuenta hay que hacerla al principio. La referencia general para los demás casos está en {link(U_CADA_CUAN, 'esta guía de frecuencia de visitas al dentista')}.",

   {"h2": "Cómo hacer que un solo viaje rinda por tres"},
   "La diferencia entre una visita que resuelve y una que solo diagnostica está casi toda en la preparación:",
   {"ol": [
     "<strong>Llama o escribe antes</strong> y cuenta todo lo que te molesta, no solamente lo que más duele. Con esa lista se reserva el tiempo suficiente en la agenda.",
     "<strong>Pide que la primera cita incluya revisión, radiografía y limpieza</strong> si es posible. Así el mismo viaje sirve para diagnosticar y para tratar.",
     "<strong>Sal con el plan por escrito</strong>: qué hay que hacer, en qué orden y cuántas citas son.",
     "<strong>Agenda las siguientes citas ese mismo día</strong>, agrupándolas lo más posible. Dos procedimientos en una mañana son un viaje en vez de dos.",
     "<strong>Si van varios de la familia, pidan turnos seguidos.</strong> Una sola bajada para tres personas cambia por completo la cuenta.",
   ]},
   f"Atendemos en Otavalo, en un solo local, y buena parte de nuestros pacientes viene desde Cotacachi, Peguche, San Pablo y Gonzáles Suárez. Por eso la agenda se arma pensando en que la persona viajó: cuando se puede juntar todo en una mañana, se junta. Qué esperar de la primera visita está {link(U_DENTISTA, 'explicado aquí')}.",

   {"quote": "Cuando alguien nos dice que vino desde arriba, lo primero que hacemos es revisar toda la boca, no solamente el diente que duele. Es la diferencia entre que el viaje resuelva un problema o resuelva los cuatro que traía.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Las señales que no esperan al próximo viaje"},
   "Hay una lista corta que cambia la prioridad. Si aparece alguna de estas, el viaje se hace esta semana:",
   {"ul": [
     "<strong>Hinchazón en la cara, el cuello o debajo del ojo.</strong> Es una infección que se está moviendo.",
     "<strong>Fiebre junto con dolor de muela.</strong> Misma categoría que la anterior.",
     "<strong>Dolor que te despierta de noche</strong> o que no cede con analgésico.",
     "<strong>Un diente que se aflojó por un golpe</strong>, o que salió entero. Si salió, guárdalo en leche o suero fisiológico y llega antes de una hora: hay chance de reimplantarlo.",
     "<strong>Sangrado que no para después de una extracción</strong>, pasadas un par de horas mordiendo gasa.",
     "<strong>No poder abrir bien la boca</strong> o tragar con dificultad.",
   ]},
   f"Qué hacer mientras llegas está detallado en {link(U_EMERGENCIA, 'esta guía de emergencias dentales')}. Resumido: nada de calor en la cara, nada de aspirina puesta sobre la encía, y nada de esperar a que se reviente solo.",

   {"h2": "Cuándo no vale la pena bajar"},
   "También es justo decirlo al revés. Hay cosas que se manejan sin viajar: una manchita que llevas años viendo igual y no duele, una encía algo inflamada que mejora con una semana de cepillado cuidadoso, o una molestia leve al frío que va y viene.",
   f"Si tienes duda, manda una foto por WhatsApp. No reemplaza una revisión, pero sirve para saber si esperas al próximo viaje o si conviene adelantarlo. Sobre la molestia al frío, {link(U_SENSIB, 'aquí están las causas y cuándo sí importa')}.",

   {"h2": "Lo que cuesta esperar, en números"},
   aviso_precio(),
   {"tabla": [["Si vienes ahora", "Si esperas un año", "Diferencia"], [
     ["Caries pequeña: resina, desde $30, una cita", "Nervio comprometido: endodoncia más corona, varias citas", "Varios viajes en vez de uno"],
     ["Encía inflamada: limpieza, desde $25", "Pérdida de hueso: tratamiento periodontal con controles", "Meses de seguimiento"],
     ["Muela partida que aún se puede reconstruir", "Extracción, desde $35, y después reponer la pieza", "Un diente menos"],
   ]]},
   f"La columna del medio es la que hay que mirar cuando el viaje parece caro. Sobre lo que implica llegar a la endodoncia, está {link(U_ENDODONCIA, 'esta guía del tratamiento de conducto')}.",

   {"faq": [
     ("¿Se puede resolver todo en un solo viaje?",
      "Depende de lo que aparezca. Una limpieza y una o dos calzas sí. Un tratamiento de conducto o una prótesis necesitan varias citas por razones biológicas."),
     ("Los niños de la casa, ¿desde qué edad conviene traerlos?",
      f"Desde que salen los primeros dientes, aunque la primera visita sea solo para mirar y familiarizarlos. Lo desarrollamos en {link(U_ODONTOPED, 'esta guía de odontopediatría en Otavalo')}."),
     ("¿Los sellantes valen la pena si vengo una vez al año?",
      f"Precisamente por eso valen más: protegen las muelas permanentes durante años y reducen las caries en la superficie de masticación. Está explicado en {link(U_SELLANTES, 'este artículo sobre sellantes')}."),
     ("¿Tienen sede en Cotacachi o en las comunidades?",
      "No. Atendemos en un solo local, en Otavalo. Por eso tratamos de agrupar los tratamientos en la menor cantidad de citas posible para quien viene de lejos."),
   ]},
   f'¿Vienes de lejos y quieres que el viaje rinda? <a href="{wa("Hola, vengo de fuera de Otavalo y quiero agendar todo en una sola manana")}">Escríbenos por WhatsApp</a> contándonos qué te molesta y desde dónde vienes. Armamos la agenda para que salgas con lo máximo resuelto.',
 ]})


# ── 3 · agua sin flúor ───────────────────────────────────────────────
POSTS.append({
 "title": "Higiene dental cuando el agua que tomas no tiene flúor",
 "slug": "higiene-dental-cuando-el-agua-no-tiene-fluor",
 "date": "2026-10-07T09:00:00",
 "cat": CAT["prevencion"],
 "tags": ["flúor", "agua de vertiente", "prevención", "pasta dental", "Imbabura"],
 "focus_kw": "agua sin flúor",
 "yoast_title": "Higiene dental si el agua no tiene flúor",
 "yoast_desc": ("Si tu agua viene de vertiente o de pozo, el fluor tiene que "
                "entrar por otro lado. Que ppm buscar en la pasta, el error del "
                "enjuague y que se aplica en consulta."),
 "excerpt": ("Agua de vertiente o de pozo casi nunca lleva flúor añadido. Cómo "
             "compensarlo con la pasta correcta, el enjuague en el momento justo "
             "y las aplicaciones en consulta."),
 "bloques": [
   "El flúor protege el diente de una forma bastante simple: se incorpora al esmalte y lo vuelve más resistente al ácido que producen las bacterias. Donde el agua de red lleva flúor añadido, esa protección llega sola, en dosis mínimas, todo el día.",
   "Cuando el agua viene de una vertiente, de un pozo o de una junta comunitaria, lo más probable es que no lleve flúor añadido, porque la fluoración se hace en la planta de tratamiento. Eso no es una alarma. Significa que la protección tiene que entrar por otro lado, y ese otro lado importa más de lo que se cree.",

   {"h2": "Primero averigua si tu agua lo tiene, en vez de suponerlo"},
   "El dato exacto no lo puede adivinar un artículo: lo tiene quien administra tu agua. Si te llega por red municipal, en el municipio; si viene de una junta administradora de agua potable de la comunidad, ahí. Si no consigues la respuesta, asume que no lo tiene y actúa como si no: sumar flúor tópico en la pasta no le hace daño a un adulto aunque el agua ya esté fluorada.",
   "Hay una segunda fuente que puedes revisar tú mismo en la cocina: la etiqueta de la sal. En Ecuador se comercializa sal fluorada además de yodada, y cuando lo es viene declarado en el empaque.",
   f"Qué es el flúor y cómo actúa sobre el esmalte está en {link(U_FLUOR, 'este artículo sobre fluorización dental')}. Aquí vamos a lo otro: qué haces distinto si el agua de tu zona no lo trae.",

   {"h2": "Sin flúor en el agua, todo el peso cae en la pasta"},
   "El flúor del agua actúa por contacto repetido: cada sorbo deja una cantidad diminuta sobre el diente. Es una protección de fondo que no depende de que te acuerdes de nada. Sin esa fuente, el flúor que llega a tu esmalte viene casi todo de lo que te pones en el cepillo.",
   "Eso convierte a la pasta en algo mucho más determinante que en una ciudad con agua fluorada. La buena noticia es que el flúor tópico, el que va sobre el diente, es el que más rinde en cualquier escenario.",

   {"h2": "La pasta: mira los ppm, no la marca"},
   "En la parte de atrás del tubo, en letra chica, dice la concentración de flúor en ppm. Si el envase no lo declara, no sabes lo que estás usando. Esa cifra importa más que el sabor o que lo que prometa el frente del empaque.",
   {"tabla": [["Edad", "Concentración", "Cantidad en el cepillo"], [
     ["0 a 3 años", "1000 ppm", "Un granito de arroz"],
     ["3 a 6 años", "1000 a 1450 ppm", "Del tamaño de una arveja"],
     ["6 años en adelante y adultos", "1450 ppm", "Alrededor de un centímetro"],
     ["Adulto con caries repetidas", "Alta concentración, solo con indicación", "Según lo que indique el odontólogo"],
   ]]},
   "Las dos primeras filas piden supervisión de un adulto por la cantidad. Un niño pequeño traga parte de la pasta, y el exceso sostenido mientras se forman los dientes permanentes puede dejar manchas blancas en el esmalte. La cantidad correcta evita eso sin renunciar a la protección.",

   {"h2": "El gesto que casi todos hacemos mal: enjuagarnos después"},
   "Terminas de cepillarte y te enjuagas la boca con agua. Ese enjuague se lleva la mayor parte del flúor que acababas de dejar sobre el diente, justo cuando iba a empezar a trabajar.",
   "Lo correcto es escupir la espuma y nada más. Mientras más tiempo permanezca esa capa sobre el esmalte, mejor, y es un cambio que no cuesta un centavo.",
   "El otro punto es cuándo. El cepillado de la noche rinde más que cualquier otro, porque durante el sueño la saliva baja y el flúor se queda actuando sin que nada lo lave. Si un día se te va a escapar un cepillado, que no sea ese.",

   {"h2": "Enjuague bucal: cuándo suma y cuándo sobra"},
   f"Un enjuague con flúor es una fuente extra útil para quien tiene riesgo alto: caries frecuentes, brackets, boca seca o encías tratadas. Para el resto es opcional. La comparación completa entre tipos está en {link(U_ENJUAGUES, 'este artículo sobre enjuagues bucales')}.",
   "Si decides usarlo, hay una regla que cambia el resultado: no lo uses justo después del cepillado. La mayoría de enjuagues tiene menos flúor que la pasta, así que diluye lo que acabas de aplicar. Mejor a otra hora, después del almuerzo. Y si tienes la boca seca, evita los que llevan alcohol.",

   {"quote": "En comunidades que se abastecen de vertiente vemos mucha caries en las superficies de masticación de las muelas, que es donde el cepillo pasa por encima. Ahí el sellante y el barniz de flúor cambian el panorama de un año a otro, sobre todo en niños.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Lo que se aplica en consulta y a quién le rinde"},
   "El barniz de flúor es una aplicación tópica de concentración alta que se pinta sobre el diente en un par de minutos, después de la limpieza y sin anestesia. La frecuencia depende del riesgo: cada seis meses en la mayoría de casos, cada tres o cuatro cuando hay caries activas.",
   f"En niños se combina con sellantes, que tapan los surcos profundos de las muelas donde el cepillo no entra. Es la medida con mejor rendimiento en zonas sin agua fluorada, y está explicada en {link(U_SELLANTES, 'esta guía sobre sellantes dentales')}. Ambas cosas se hacen en la cita de la limpieza, que describimos en {link(U_LIMPIEZA, 'este artículo')}.",

   {"h2": "Cuándo esto NO te hace falta"},
   "Si tu agua sí está fluorada, usas pasta con flúor todos los días y no has tenido una caries en años, sumar enjuague diario y barnices cada tres meses no te va a aportar gran cosa. Pasado cierto punto, más flúor no protege más.",
   "En niños pequeños el exceso sí tiene consecuencia visible. Si tu hijo ya recibe flúor por el agua, por la sal y por la pasta, no conviene agregar suplementos por cuenta propia: eso se evalúa en consulta.",
   "Y si el problema de fondo es otro —encías enfermas, apretamiento nocturno, una prótesis que ajusta mal— el flúor no lo resuelve.",

   {"h2": "Un plan de una semana para cambiarlo"},
   {"ol": [
     "<strong>Hoy:</strong> revisa el tubo de pasta que tienes y busca los ppm. Si no los declara, cámbialo.",
     "<strong>Mañana:</strong> mira la etiqueta de la sal y averigua con tu junta de agua o el municipio si el agua se fluora.",
     "<strong>Esta semana:</strong> deja de enjuagarte con agua después de cepillarte. Solo escupir.",
     "<strong>Esta semana:</strong> asegura el cepillado de la noche todos los días, aunque llegues cansado.",
     "<strong>Este mes:</strong> agenda la limpieza y pide que evalúen si te corresponde barniz de flúor, y sellantes para los niños de la casa.",
   ]},
   "Los tres primeros pasos no cuestan nada y son los que más peso tienen.",

   {"faq": [
     ("¿El agua hervida pierde el flúor?",
      "No. Hervir elimina microorganismos, no minerales. Si el agua no tenía flúor antes de hervir, tampoco lo tendrá después."),
     ("¿El agua embotellada trae flúor?",
      "Depende de la marca y del origen. Algunas lo declaran en la etiqueta y muchas no lo contienen. Si es tu fuente principal, revisa el envase."),
     ("¿Los filtros de casa quitan el flúor?",
      "Los filtros de carbón comunes no lo eliminan de forma significativa; los sistemas de ósmosis inversa sí retiran buena parte de los minerales, incluido el flúor."),
     ("Vivo en Otavalo y el agua es de red, ¿igual necesito todo esto?",
      "El cepillado nocturno con pasta con flúor y el no enjuagarse después aplican vivas donde vivas. Lo que varía es si hace falta sumar enjuague y barnices, y eso se define según tu riesgo en la valoración, que no tiene costo."),
   ]},
   f'¿Quieres saber si en tu caso hace falta sumar flúor en consulta? <a href="{wa("Hola, el agua de mi zona no tiene fluor y quiero saber que me corresponde")}">Escríbenos por WhatsApp</a>. En la valoración revisamos tu riesgo real y salimos con un plan concreto, no con una recomendación genérica.',
 ]})


# ── 4 · alimentación andina ──────────────────────────────────────────
POSTS.append({
 "title": "Salud bucal y alimentación andina: cuidar los dientes sin cambiar lo que comes",
 "slug": "salud-bucal-y-alimentacion-andina",
 "date": "2026-10-09T09:00:00",
 "cat": CAT["habitos"],
 "tags": ["alimentación andina", "mote", "chicha", "hábitos", "esmalte"],
 "focus_kw": "salud bucal y alimentación andina",
 "yoast_title": "Alimentación andina y salud bucal: guía real",
 "yoast_desc": ("Mote, coladas, panela y frutas acidas: que le hacen a los "
                "dientes y como seguir comiendolos sin pagar el precio. "
                "Alimento por alimento, sin prohibiciones."),
 "excerpt": ("Mote, chicha, coladas, panela y frutas de altura. Qué le hacen "
             "realmente a los dientes y cómo seguir comiéndolos sin que pase "
             "factura. Sin prohibir nada."),
 "bloques": [
   "La comida de la sierra tiene mejor prensa en nutrición que en odontología, y es una injusticia. Los chochos y las habas aportan proteína y fósforo, la quinua tiene un perfil que envidian medio mundo, el queso fresco sube el pH de la boca después de comer y el mote da energía sin grasa.",
   "Lo que le pasa factura a los dientes casi nunca es el plato. Es cuándo se come, con qué frecuencia y con qué se lo acompaña. Este artículo va alimento por alimento, sin pedirte que dejes ninguno.",

   {"h2": "Treinta minutos: la ventana que decide todo"},
   "Cada vez que entra algo con azúcar o almidón, las bacterias de la placa producen ácido durante unos veinte a treinta minutos. El pH baja, el esmalte pierde minerales y después la saliva lo neutraliza. Ese vaivén es normal.",
   "El daño aparece cuando el vaivén se convierte en línea recta. Picar cinco veces cosas pequeñas repartidas en el día mantiene la boca en ácido casi permanentemente; un plato grande de una sentada genera un solo episodio que la saliva resuelve. De ahí sale la conclusión que a mucha gente le sorprende: un almuerzo abundante de fritada con mote es menos agresivo para el esmalte que picar dulce cuatro veces entre comidas.",

   {"h2": "Alimento por alimento, sin satanizar nada"},
   {"tabla": [["Lo que comes", "Qué pasa en la boca", "Cómo seguir comiéndolo tranquilo"], [
     ["Mote", "Almidón que se queda pegado entre las muelas y se transforma en azúcar ahí mismo", "Enjuaga con agua al terminar y usa hilo en la noche"],
     ["Chicha", "Es fermentada: aporta ácido y azúcar, y suele tomarse a lo largo de horas", "Tómala junto con la comida y alterna con agua, en vez de sorbos toda la tarde"],
     ["Colada de máchica o de avena con panela", "Azúcar disuelta que baña todas las superficies a la vez", "Que sea parte de una comida, no un picoteo de media mañana"],
     ["Panela y raspadura", "Se adhiere al diente y permanece más tiempo que el azúcar disuelta", "Dentro de la comida y con un vaso de agua después"],
     ["Tomate de árbol, mora, taxo, limón", "Ácidos que ablandan el esmalte durante media hora", "No te cepilles enseguida; espera treinta minutos"],
     ["Queso fresco, chochos, habas", "Suben el pH y aportan calcio y fósforo al esmalte", "Sirven para cerrar la comida y dejar la boca en mejor estado"],
     ["Tostado, canguil, cuero de chancho", "Duros: pueden fracturar una muela con calza grande o una fisura", "Cuidado con el lado donde tengas trabajos antiguos"],
     ["Fritada con mote y tostado", "Una comida completa, en un solo episodio", "Sin problema: es una comida, no un goteo"],
   ]]},
   f"La columna de la derecha es el artículo entero resumido. Ninguna fila dice «no lo comas». Para el lado positivo, qué alimentos aportan a la estructura del diente, está {link(U_ALIMENTOS, 'esta guía de alimentos para dientes sanos')}.",

   {"h2": "El orden en que comes cambia el resultado"},
   "Terminar la comida con queso fresco, con chochos o con un vaso de agua deja la boca en mucho mejor estado que terminarla con un dulce. Mismo plato, distinto orden, distinto efecto.",
   "Lo que más cobra es la sobremesa larga con una bebida azucarada al lado: ahí el ataque ácido se estira una hora o dos, que es lo que el esmalte no maneja bien. Si va a ser larga, que la bebida sea agua.",
   "Y una advertencia sobre lo ácido que va contra la intuición: después de un jugo de tomate de árbol o de mora, el esmalte queda blando un rato. Cepillarse en ese momento lo desgasta en vez de protegerlo.",

   {"quote": "Nos llega gente convencida de que tiene que dejar el mote o las coladas porque alguien se lo dijo. No hace falta. Cambiando a qué hora las toman y con qué las acompañan, el problema baja solo, y siguen comiendo lo de siempre.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Fiestas: los días en que se come y se brinda desde la mañana"},
   "El Inti Raymi, el Yamor en Otavalo, un matrimonio en Cotacachi o una minga tienen algo en común desde el punto de vista de la boca: son jornadas largas de comer y beber sin pausas claras. No hay tres comidas, hay una sola que dura ocho horas.",
   "Nadie va a llevar la cuenta del pH en una fiesta de Imbabura, ni tiene por qué. Lo que sí cabe es un par de gestos que no interrumpen nada: tener agua a la mano y enjuagarse con ella de vez en cuando, y asegurar el cepillado al llegar a la casa, por tarde que sea.",
   "Ese cepillado de la noche de fiesta es el que salva la semana. Es también el que más se salta la gente, justamente cuando más falta hace.",

   {"h2": "Cinco cambios que no te quitan nada del plato"},
   {"ol": [
     "<strong>Un vaso de agua al terminar de comer.</strong> Arrastra restos y ayuda a la saliva a recuperar el pH más rápido.",
     "<strong>Junta el dulce a la comida</strong> en vez de repartirlo en el día. Un postre después del almuerzo hace menos daño que tres caramelos a distintas horas.",
     "<strong>Media hora de espera</strong> entre lo ácido y el cepillado.",
     "<strong>Cierra con queso fresco o chochos</strong> cuando estén en la mesa. Es el remate más favorable que hay.",
     "<strong>Cepillado de la noche siempre</strong>, con pasta con flúor, y sin enjuagarte con agua después.",
   ]},
   "Ninguno de los cinco cambia lo que hay en el plato. Los cinco juntos cambian bastante lo que pasa en la boca.",

   {"h2": "Cuándo la dieta ya no alcanza"},
   f"Si ya hay caries, la dieta no las revierte: una lesión que atravesó el esmalte necesita tratamiento, y cuanto antes se haga, menos diente se pierde. Con el sarro pasa igual, se elimina con instrumental. Qué incluye una limpieza y cada cuánto conviene está en {link(U_LIMPIEZA, 'este artículo')}.",
   f"Si sientes molestia al frío, conviene distinguir de dónde viene: la erosión por ácidos es una causa, pero también la retracción de encía y el desgaste por apretamiento. Las diferencias están en {link(U_SENSIB, 'esta guía sobre sensibilidad dental')}.",
   f"Y si el desgaste que ves es plano y parejo en los bordes, probablemente no venga de la comida sino de apretar los dientes de noche. Ahí cambiar la dieta no aporta nada: lo que hace falta es {link(U_BRUXISMO, 'revisar el bruxismo')}.",
   {"ul": [P_LIMPIEZA, P_RESINA]},

   {"faq": [
     ("¿La chicha daña más que una gaseosa?",
      "No necesariamente. Las dos son ácidas y llevan azúcar. El factor que decide es el tiempo: cualquiera tomada durante horas hace más daño que tomada de una vez con la comida."),
     ("¿El mote se pega más que el pan?",
      "Los dos dejan almidón entre las muelas. El mote se ve más porque queda visible, pero el pan blanco se adhiere igual. En ambos casos el hilo de la noche resuelve."),
     ("¿La panela es mejor que el azúcar blanca para los dientes?",
      "Para la boca, prácticamente igual: las bacterias fermentan las dos, y la panela se adhiere un poco más por su textura. La diferencia nutricional no se traslada al esmalte."),
     ("Tomo agua de panela con limón todos los días, ¿es problema?",
      "Es la combinación de ácido y azúcar, y tomada a sorbos durante la mañana sí desgasta. Tomándola de una vez, con la comida, y enjuagando con agua después, el efecto baja mucho."),
   ]},
   f'¿Quieres saber si lo que ves en tus dientes viene de la comida o de otra cosa? <a href="{wa("Hola, quiero una revision para saber si tengo desgaste o caries")}">Escríbenos por WhatsApp</a> y agendamos en Otavalo. La valoración no tiene costo y en veinte minutos se ve de dónde viene.',
 ]})


# ── 5 · trabajo de cara al público / turismo ─────────────────────────
POSTS.append({
 "title": "Cuidado dental para quienes trabajan en turismo: hablar todo el día pasa factura",
 "slug": "cuidado-dental-para-quienes-trabajan-en-turismo",
 "date": "2026-10-11T09:00:00",
 "cat": CAT["publicos"],
 "tags": ["turismo", "guías", "boca seca", "limpieza dental", "Otavalo"],
 "focus_kw": "cuidado dental turismo",
 "yoast_title": "Cuidado dental si trabajas en turismo",
 "yoast_desc": ("Hablar seis horas seca la boca, y sin saliva aparecen placa y mal "
                "aliento. Que llevar en la mochila, cuando conviene una limpieza y "
                "cuando no la necesitas."),
 "excerpt": ("Guías, hoteleros y gente del mercado hablan de corrido durante horas. "
             "Qué le hace eso a la boca, qué llevar encima y cuándo la limpieza "
             "resuelve y cuándo no."),
 "bloques": [
   "Un guía que sube a Peguche o que rodea la laguna de San Pablo habla de corrido durante cuatro o cinco horas. Alguien en recepción de hotel hace turnos de ocho. Quien atiende en la plaza de Ponchos negocia todo el día, en dos idiomas y a veces en tres.",
   "Todos tienen en común algo que rara vez se conecta con el dentista: pasan la jornada con la boca abierta y con poca saliva. Y la saliva es, literalmente, el sistema de defensa del diente.",

   {"h2": "Sin saliva el diente queda sin defensa"},
   "La saliva hace tres trabajos a la vez: arrastra restos, neutraliza el ácido que producen las bacterias y devuelve minerales al esmalte. Cuando baja, los tres se detienen.",
   "Hablar durante horas reseca la boca por evaporación, y a eso se suma el aire seco de la sierra y la respiración por la boca cuando caminas y hablas al mismo tiempo. El resultado se nota en dos o tres meses: más placa en el cuello de los dientes, encías que sangran y aliento que empeora a media jornada.",
   "No es un problema de higiene. Alguien puede cepillarse perfecto tres veces al día y aun así tener la boca seca ocho horas. Lo que hay que recuperar es la saliva.",

   {"h2": "El café que te mantiene despierto también te reseca"},
   "El café, el té negro y las bebidas energizantes son diuréticos y ácidos, y encima manchan. En turnos largos son casi inevitables, así que el objetivo no es eliminarlos sino compensarlos.",
   "La regla práctica es un vaso de agua por cada café, y después un enjuague rápido con agua: quita el pigmento antes de que se fije y sube el pH. Lo que no conviene es cepillarse enseguida, porque el esmalte queda blando por la acidez.",
   "La mancha de café es superficial y se pega al sarro, no al esmalte profundo. Por eso una limpieza la retira, y por eso vuelve si pasan dos años sin limpieza.",

   {"h2": "Por qué el aliento empeora justo cuando más hablas"},
   f"Es la consecuencia más incómoda del combo boca seca más horas sin comer. Sin saliva, las bacterias de la parte posterior de la lengua producen compuestos de azufre sin que nada los arrastre. Las causas completas y el orden para resolverlas están en {link(U_MAL_ALIENT, 'este artículo sobre halitosis')}; lo que sigue es la parte que aplica a media jornada de trabajo.",
   {"ul": [
     "<strong>Agua a sorbos, todo el rato.</strong> Es lo que más rinde y lo que menos hace la gente.",
     "<strong>Chicle sin azúcar,</strong> preferiblemente con xilitol. Masticar multiplica la producción de saliva durante unos minutos.",
     "<strong>Limpiador de lengua</strong> en el cepillado de la mañana. El dorso de la lengua concentra buena parte del problema.",
     "<strong>Nada de caramelos de menta.</strong> Tapan el olor diez minutos y dejan azúcar en la boca una hora.",
     "<strong>Cuidado con el enjuague con alcohol.</strong> Refresca al instante y reseca después, que es lo contrario de lo que necesitas.",
   ]},

   {"h2": "Qué cabe en la mochila y cuándo usar cada cosa"},
   {"tabla": [["Momento del día", "Qué pasa en la boca", "Qué hacer en treinta segundos"], [
     ["Antes de salir", "Boca en reposo, esmalte disponible", "Cepillado con pasta con flúor; escupir sin enjuagarse"],
     ["Media mañana hablando", "La saliva baja y la placa se organiza", "Agua a sorbos; chicle sin azúcar si no hay agua"],
     ["Después del café", "Ácido y pigmento sobre el diente", "Enjuague con agua; no cepillarse por treinta minutos"],
     ["Almuerzo rápido y tarde", "Restos entre las muelas", "Agua y, si se puede, cepillo interdental"],
     ["Turno de tarde o noche", "Aire seco y horas sin comer", "Botella de agua a la vista del mostrador"],
     ["Al llegar a casa", "El cepillado que de verdad cuenta", "Cepillo, hilo y a dormir sin enjuagarse"],
   ]]},
   f"El cepillo de viaje con pasta pequeña ocupa menos que un celular y resuelve el día que almuerzas fuera. Sobre qué tipo de cepillo conviene, está {link(U_CEPILLO, 'esta comparación entre manual y eléctrico')}.",

   {"quote": "Los guías y la gente de hotelería llegan casi siempre en temporada baja, y casi siempre con lo mismo: sarro en la cara interna de los dientes de abajo y encías que sangran. Es el patrón clásico de boca seca sostenida, y con dos limpiezas al año se controla.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cada cuánto conviene una limpieza si trabajas hablando"},
   f"La referencia general para un adulto sano es cada seis meses. Con boca seca habitual, con mucho café o té, o con encías que sangran, conviene acortar a cada tres o cuatro meses hasta que se estabilice. Programarla antes de la temporada alta, y no en medio, evita tener que faltar cuando más movimiento hay. La referencia completa está en {link(U_CADA_CUAN, 'esta guía')}, y qué incluye la cita en {link(U_LIMPIEZA, 'este artículo sobre limpieza dental')}.",
   {"ul": [P_LIMPIEZA]},
   "El blanqueamiento es un tratamiento distinto de la limpieza y no comparte precio con ella: su valor se define en la valoración, que no tiene costo, después de revisar el estado del esmalte y de las encías.",

   {"h2": "Cuándo una limpieza NO es lo que necesitas"},
   "Si el aliento persiste con higiene impecable y limpiezas al día, el origen probablemente no está en los dientes: amígdalas, sinusitis, reflujo o medicación que reseca son causas frecuentes. Una limpieza más no lo va a resolver.",
   f"Si las encías ya tienen bolsas y hay pérdida de hueso, lo que corresponde no es una profilaxis sino un tratamiento periodontal, que es otra cosa. Las diferencias están en {link(U_GINGIVITIS, 'este artículo sobre gingivitis y periodontitis')}.",
   "Y si lo que buscas es cambiar el color de tus dientes, la limpieza no lo hace: retira mancha externa y sarro, y devuelve el diente a su color natural, que puede no ser el que esperabas.",

   {"h2": "Cómo agendar sin perder un día de trabajo"},
   {"ol": [
     "<strong>Elige temporada baja</strong> para lo que requiera varias citas. En alta, solo lo urgente.",
     "<strong>Pide primera o última hora</strong> del día, antes de que salga el grupo o después de cerrar.",
     "<strong>Agrupa</strong>: limpieza y revisión en la misma cita, y si hay calzas, las del mismo lado juntas.",
     "<strong>Sal con la siguiente cita agendada</strong> y anotada en el celular.",
     "<strong>Si trabajas con horario rotativo</strong>, manda tus dos o tres franjas posibles por WhatsApp y que se busque el calce.",
   ]},
   f"Atendemos en un solo local, en Otavalo, y recibimos pacientes que trabajan en hoteles y operadoras de Cotacachi y del resto de Imbabura. Si no tienes clínica de cabecera todavía, {link(U_DENTISTA, 'aquí está qué mirar antes de elegir una')}.",

   {"faq": [
     ("¿El chicle sin azúcar reemplaza al cepillado?",
      "No. Sirve para estimular saliva cuando no puedes cepillarte, que es una ayuda real pero parcial. El cepillado sigue siendo el que retira la placa."),
     ("Hablo todo el día y me despierto con la boca seca, ¿es lo mismo?",
      "Puede ser otra cosa. La boca seca al despertar suele venir de respirar por la boca de noche, y a veces se asocia a ronquido o apnea. Conviene evaluarlo aparte."),
     ("¿Sirve tomar más agua o hay que usar saliva artificial?",
      "Se empieza por el agua y el chicle sin azúcar. Los sustitutos de saliva existen para sequedad marcada, generalmente por medicación, y se indican en consulta."),
     ("Atiendo turistas todo el día, ¿la limpieza me quita las manchas de café?",
      "Sí, la mancha externa de café y té se retira con la limpieza. Lo que no cambia es el tono natural del diente; para eso el tratamiento es otro y se evalúa aparte."),
   ]},
   f'¿Tu temporada alta ya viene y hace rato que no te revisas? <a href="{wa("Hola, trabajo en turismo en Otavalo y quiero agendar una limpieza en horario temprano")}">Escríbenos por WhatsApp</a> con tus horarios posibles. La valoración no tiene costo y la limpieza se resuelve en una sola cita.',
 ]})


if __name__ == "__main__":
    for s in POSTS:
        ruta, palabras = guarda(s)
        print(f"{palabras:5d} palabras · {ruta}")
