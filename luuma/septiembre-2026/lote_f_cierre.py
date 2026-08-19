#!/usr/bin/env python3
"""Los 4 posts que cierran el lote de 20."""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, link, wa, guarda

POSTS = []

# ── 17 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Brunch de fin de semana en Manta: qué esperar y a qué hora ir",
 "slug": "brunch-fin-de-semana-manta-que-esperar",
 "date": "2026-10-16T11:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["brunch manta", "fin de semana", "desayuno tardío", "manta"],
 "focus_kw": "brunch en manta",
 "yoast_title": "Brunch de fin de semana en Manta: guía",
 "yoast_desc": "El brunch en Manta es reciente y desigual. Que esperar de verdad, a que hora ir, cuanto cuesta y por que el domingo se llena antes de la una.",
 "excerpt": "El brunch llegó tarde a Manta y todavía es desigual. Qué esperar de verdad, a qué hora llegar y por qué el domingo se llena antes de la una.",
 "bloques": [
   "El brunch es un invento reciente en Manta. Hasta hace pocos años el fin de semana se resolvía con desayuno temprano o con almuerzo, sin nada en medio, porque en Manabí la mañana empieza pronto y el mediodía es sagrado.",
   "Eso ha cambiado y hoy hay una oferta real, aunque desigual. Esta guía es para saber qué esperar antes de reservar, porque bajo la misma palabra caben cosas muy distintas.",

   {"h2": "Qué significa brunch aquí"},
   "En Manta el brunch suele ser una de tres cosas, y conviene saber cuál te van a servir.",
   {"ul": [
     "<strong>Desayuno tardío ampliado.</strong> Huevos, tostadas, fruta, café. Lo más parecido al brunch internacional y lo que ofrecen los hoteles.",
     "<strong>Carta de mediodía adelantada.</strong> Los platos del almuerzo servidos desde las once. Es lo más común en restaurantes de carta.",
     "<strong>Mezcla criolla.</strong> Bolón, corviche, encebollado y jugos naturales junto a huevos y café. La versión más local y, para nuestro gusto, la más interesante.",
   ]},
   "La tercera es la que vale la pena buscar si vienes de fuera: es la única que no puedes comer en tu ciudad.",

   {"h2": "A qué hora ir"},
   {"tabla": [["Hora", "Cómo está", "Recomendable para"], [
     ["10:00 – 11:00", "Vacío, todo disponible", "Quien quiere calma y mesa buena"],
     ["11:30 – 13:00", "La hora punta del domingo", "Ambiente, pero hay espera"],
     ["13:00 – 14:30", "Se cruza con el almuerzo", "Quien va a comer fuerte"],
     ["Después de 15:00", "Ya cerró el brunch", "Nada; empieza la tarde"],
   ]]},
   "El domingo es el día del brunch en Manta y los sitios con vista se llenan antes de la una. Si son más de cuatro personas, reservar deja de ser opcional.",
   {"quote": "El domingo la ciudad entera sale a comer y todos quieren la misma hora. Los que llegan a las once se sientan donde quieren; los que llegan a la una esperan cuarenta minutos parados. Es así de simple.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Cuánto cuesta"},
   {"tabla": [["Tipo", "Por persona"], [
     ["Brunch criollo de barrio", "$5 – $8"],
     ["Cafetería en Barbasquillo", "$8 – $14"],
     ["Restaurante con vista", "$12 – $20"],
     ["Hotel con buffet", "$15 – $22"],
   ]]},
   f"En nuestro caso, el {link(MENU_ALMUERZO, 'menú de almuerzo')} abre a las 11:00 y funciona perfectamente como brunch tardío: pescado a la plancha en $8,90 y pollo en $8,50, ambos con arroz y ensalada. La cocina del {link(MENU, 'menú de la noche')} arranca a las 16:00.",

   {"h2": "Qué se pide de comer"},
   "La carta de brunch en Manta suele mezclar dos mundos y ambos funcionan. Del lado internacional están los huevos benedictinos, las tostadas francesas, los bowls de fruta y los sándwiches. Del lado local, el bolón de verde con queso o chicharrón, el corviche y los patacones con salsa de maní.",
   "Nuestra recomendación para quien viene de fuera es pedir uno de cada lado y compartir. El bolón sorprende a casi todo el mundo la primera vez, y no cuesta nada probarlo junto a algo conocido.",
   "Lo que conviene saber: las porciones en Manabí son generosas. Dos platos fuertes por persona en un brunch es casi siempre demasiado, y termina en comida devuelta a cocina.",

   {"h2": "Qué pedir de bebida"},
   "El brunch trajo consigo la costumbre de tomar alcohol a mediodía, que en Ecuador no era habitual. La mimosa y el bloody mary aparecen en varias cartas, aunque de calidad irregular: la mimosa se hace casi siempre con espumoso económico.",
   "La alternativa local es mejor y más barata: jugos naturales de maracuyá, naranjilla, tomate de árbol o guanábana, entre $1,50 y $3. Y si el plan pide alcohol, una caipirinha clásica a $8,90 aguanta el calor del mediodía mejor que cualquier cóctel dulce.",

   {"h2": "El factor clima"},
   "A las once de la mañana en Manta ya hace calor de verdad. Una terraza sin sombra a esa hora es incómoda entre enero y abril, cuando el sol pega directo y la humedad es alta.",
   "De junio a septiembre el panorama cambia: mañanas frescas y a menudo grises, ideales para estar afuera. Es la mejor época del año para el brunch en la costa, aunque no salga el sol para las fotos.",

   {"h2": "Dónde buscarlo, por zona"},
   {"ul": [
     "<strong>Barbasquillo y La Quadra.</strong> La zona con más oferta de brunch propiamente dicho, con vista abierta al Pacífico desde arriba y cocinas que abren hacia las once.",
     "<strong>Malecón Murciélago.</strong> Vista al mar a nivel de playa y ambiente turístico. Abre más temprano y la carta es más de desayuno que de brunch.",
     "<strong>Av. Flavio Reyes.</strong> Cafeterías y restaurantes de carta más urbana, sin vista al mar pero con buen café.",
     "<strong>Tarqui y el centro.</strong> Aquí no hay brunch, hay desayuno manabita de verdad y es más barato. Bolón a $2,50, encebollado a $3.",
   ]},

   {"h2": "Cómo distinguir un buen brunch de uno improvisado"},
   "El brunch es un formato prestado y varios sitios lo montaron sin adaptar la cocina. Estas son las señales de que está bien hecho:",
   {"ul": [
     "<strong>Carta propia de brunch,</strong> no la carta de almuerzo servida antes de tiempo.",
     "<strong>Huevos hechos al momento.</strong> Es lo primero que se resiente cuando la cocina no está preparada para el formato.",
     "<strong>Café pasado, no instantáneo.</strong> Ecuador produce buen café y no hay excusa.",
     "<strong>Jugos naturales de fruta local,</strong> no néctar de caja.",
   ]},

   {"h2": "Tres cosas que conviene saber"},
   {"ul": [
     "<strong>Los sitios de brunch cierran temprano.</strong> A las tres de la tarde casi todos han terminado el servicio.",
     "<strong>El domingo muchos comedores de barrio cierran.</strong> La oferta se concentra en la zona turística y en Barbasquillo.",
     "<strong>Reservar el domingo cambia la mañana.</strong> Sobre todo si quieren mesa con vista o son grupo.",
   ]},
   {"faq": [
     ("¿Hay brunch los sábados o solo domingo?",
      "Ambos, pero el sábado es mucho más tranquilo. El domingo es el día fuerte y cuando más oferta hay."),
     ("¿Sirven brunch todo el año?",
      "Sí. Manta no tiene temporada baja marcada en gastronomía; lo que cambia es la afluencia en feriados y vacaciones escolares."),
     ("¿Es apto para ir con niños?",
      "El brunch es probablemente el mejor momento del día para ir con niños: hay luz, ambiente relajado y los platos sencillos funcionan bien."),
     ("¿Cuál es la diferencia con el almuerzo?",
      "El almuerzo es una fórmula fija —sopa, segundo, jugo— que empieza a las once y cuesta entre $4 y $9. El brunch es a la carta, más caro y con más opciones de desayuno."),
     ("¿Se puede ir en traje de baño desde la playa?",
      "En los sitios del malecón, sí, es lo normal. En restaurantes de carta y rooftops conviene cambiarse: no hay código de vestimenta estricto en Manta, pero llegar mojado a una mesa con mantel incomoda a todo el mundo, empezando por uno."),
     ("¿Aceptan tarjeta?",
      "En restaurantes y cafeterías sí. En los puestos de desayuno de barrio y en el mercado, solo efectivo. Conviene llevar billetes pequeños porque nadie cambia un billete grande por un bolón de $2,50."),
   ]},
   f'¿Quieren brunch con vista al Pacífico un domingo? <a href="{wa("Hola, quiero reservar para el brunch del domingo en Luuma")}">Reserven por WhatsApp</a> — a partir de las once ya empieza a llenarse.',
 ]})

# ── 18 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Maridaje de sushi con cócteles: qué funciona de verdad",
 "slug": "maridaje-sushi-cocteles-que-funciona",
 "date": "2026-10-19T17:00:00",
 "cat": CAT["cocteles"],
 "tags": ["maridaje", "sushi", "cócteles", "manta"],
 "focus_kw": "maridaje sushi cócteles",
 "yoast_title": "Maridaje de sushi con cócteles: qué funciona",
 "yoast_desc": "Casi todo coctel dulce choca con el pescado crudo. Que combinaciones funcionan de verdad con sushi y crudos, cuales evitar y por que, con precios.",
 "excerpt": "Casi todo cóctel dulce choca de frente con el pescado crudo. Qué combinaciones funcionan, cuáles arruinan el plato y por qué el sake no es la única respuesta.",
 "bloques": [
   "Maridar sushi con cócteles suena a ejercicio pretencioso hasta que te sirven un roll de atún junto a un daiquiri de maracuyá y entiendes el problema: la fruta dulce arrasa con el pescado y no queda nada.",
   "En Manta la cuestión importa más que en otras ciudades, porque el atún que se sirve aquí se descargó en la bahía esa mañana. Un pescado así tiene matices que vale la pena no tapar, y en Manabí la costumbre de acompañar con cóctel de fruta viene de la playa, no de la mesa.",
   "No hay que ser sommelier para resolverlo. Son tres reglas y se aplican en cualquier barra.",

   {"h2": "Las tres reglas"},
   "La primera: el ácido acompaña, el dulce compite. El pescado crudo tiene sabores delicados y grasas suaves; el ácido las corta y las realza, el azúcar las tapa.",
   "La segunda: cuidado con el gas. Las burbujas resetean el paladar, lo cual es bueno entre bocados y malo si la bebida es muy aromática, porque arrastra el sabor del pescado con ella.",
   "La tercera: la temperatura importa más de lo que parece. Un trago demasiado frío anestesia el paladar y hace que el sashimi sepa a nada. Frío sí, congelado no.",
   {"quote": "La combinación que más pedimos corregir es sushi con cóctel de maracuyá. La gente pide los dos porque le gustan los dos, y por separado son perfectos. Juntos, el maracuyá se come el pescado y ni lo notas.",
    "cite": "Equipo de barra de Luuma Rooftop"},

   {"h2": "Qué funciona"},
   {"tabla": [["Cóctel", "Por qué funciona", "Precio"], [
     ["Daiquiri clásico", "Ácido limpio, sin fruta que compita", "$9,70"],
     ["Margarita clásica", "Cítrico y sal: la sal realza el pescado", "$9,80"],
     ["Paloma", "Amargo de toronja, corta la grasa del salmón", "$8,60"],
     ["Gin tonic seco", "Botánicos y burbuja, limpia entre bocados", "$13,60"],
     ["Cerveza de la casa", "Neutra, no interfiere con nada", "$6,00"],
   ]]},
   f"La margarita es probablemente la mejor de la lista y la menos evidente. La sal del borde hace con el pescado lo mismo que hace la salsa de soya: realza sin tapar. La carta completa está en {link(BEBIDAS, 'bebidas')}.",

   {"h2": "Qué evitar"},
   {"ul": [
     "<strong>Cualquier cosa con coco.</strong> La grasa del coco recubre el paladar y el pescado desaparece detrás.",
     "<strong>Maracuyá, guayaba, fresa.</strong> Demasiado dulces y demasiado aromáticos.",
     "<strong>Mojito.</strong> La hierbabuena es dominante y choca con el jengibre encurtido del plato.",
     "<strong>Frozen de cualquier tipo.</strong> El frío extremo mata la percepción del sabor durante varios minutos.",
     "<strong>Vino tinto con cuerpo.</strong> Los taninos y el pescado crudo producen un regusto metálico bastante desagradable.",
   ]},

   {"h2": "El papel de la salsa de soya"},
   "Es el otro elemento que ya está condicionando la mesa antes de que llegue el trago. La soya es salada e intensa, y usada en exceso convierte cualquier maridaje en irrelevante: si el bocado sabe a soya, da igual qué estés tomando.",
   "La forma correcta de usarla es mojar apenas el pescado, no el arroz, y en poca cantidad. Eso deja espacio para que el trago haga algo. Con un sashimi limpio y poca soya, la diferencia entre un daiquiri y una margarita se nota perfectamente; ahogado en salsa, no.",

   {"h2": "Combinaciones por tipo de plato"},
   {"h3": "Atún rojo, crudo y limpio"},
   f"El plato más delicado y el que menos tolera competencia. Daiquiri clásico o cerveza. El tartar de atún rojo está en $11,50 y el plato de salmón y atún con aguacate en $12,60, ambos en el {link(MENU, 'menú de la noche')}.",
   {"h3": "Rolls con queso crema"},
   "Aquí ya hay grasa y densidad, así que se puede subir la intensidad de la bebida. Gin tonic o paloma, que cortan bien. El roll de salmón con queso crema está en $10,25.",
   {"h3": "Rolls tempurizados o con salsas"},
   "Cuando entra lo frito y lo dulce de las salsas, la cerveza es la respuesta segura. Un cóctel elaborado ahí se pierde.",
   {"h3": "Kanikama y opciones cocidas"},
   "Más tolerantes que el crudo. Admiten hasta un cóctel ligeramente frutal sin que se arruine nada.",

   {"h2": "Por qué el dulce arruina el pescado"},
   "Vale la pena entender el mecanismo, porque una vez que se entiende ya no hace falta memorizar listas. El azúcar satura los receptores del gusto y sube el umbral de percepción de todo lo demás. Después de un trago dulce, cualquier sabor delicado necesita ser mucho más intenso para notarse — y el pescado crudo es justamente lo contrario de intenso.",
   "El ácido hace lo opuesto: estimula la salivación, limpia la grasa del paladar y devuelve el punto de partida entre bocado y bocado. Por eso el limón acompaña al pescado en todas las cocinas del mundo que tienen mar, sin que nadie se pusiera de acuerdo.",
   "La sal opera parecido, potenciando en lugar de tapar. Es la razón por la que la salsa de soya funciona y por la que una margarita con borde salado va tan bien con crudos.",

   {"h2": "El caso del jengibre encurtido"},
   "El gari —el jengibre rosado que llega al lado del plato— no es decoración ni acompañamiento: es un limpiador de paladar entre piezas distintas. Se come entre un tipo de pescado y otro, no encima del sushi.",
   "Eso importa para el maridaje porque significa que ya hay un elemento fuerte en la mesa haciendo ese trabajo. Un cóctel muy aromático encima del jengibre compite con él, y el resultado es que dejas de distinguir el pescado por completo.",

   {"h2": "El orden de la mesa"},
   "Si van a pedir varios platos, conviene arrancar por lo más limpio y terminar por lo más intenso: primero los crudos con un trago ácido, después los rolls con salsa. Al revés, el paladar llega saturado a lo delicado y no distingue nada.",
   "Y una recomendación práctica: pedir la bebida antes que la comida. En la mayoría de barras el cóctel tarda más que el sushi, y llega cuando el plato ya está a medio comer.",
   {"faq": [
     ("¿El sake es mejor opción que un cóctel?",
      "Es la opción tradicional y funciona muy bien, pero en Ecuador es caro y de disponibilidad irregular. Un daiquiri clásico o una cerveza cumplen el mismo papel a menor precio."),
     ("¿Se puede tomar vino con sushi?",
      "Blanco seco sí, y funciona bien. Tinto no: los taninos con pescado crudo dejan un regusto metálico. En Ecuador el vino es importado y arranca en $30 la botella."),
     ("¿Y el whisky?",
      "Con sushi, no. Es demasiado dominante y el alcohol alto quema el paladar para lo que viene después."),
     ("¿Qué tomo si no bebo alcohol?",
      "Agua con gas y limón es lo mejor: limpia entre bocados sin aportar sabor. Los jugos naturales dulces —maracuyá, guayaba— tienen el mismo problema que sus cócteles."),
     ("¿Té verde frío funciona?",
      "Sí, y es de las mejores opciones sin alcohol. Es ligeramente amargo, no aporta azúcar y limpia el paladar de forma parecida a como lo hace el té caliente en un restaurante japonés."),
     ("¿Importa el orden en que se piden los tragos?",
      "Bastante. Empezar por lo más seco y subir en intensidad conserva el paladar. Al revés, después del primer trago dulce ya no distingues los matices del pescado, aunque cambies de bebida."),
   ]},
   f'¿Quieren probar la combinación completa? <a href="{wa("Hola, quiero reservar mesa en Luuma para crudos y cocteles")}">Escríbannos por WhatsApp</a> y le decimos a la barra qué van a comer para que sugiera el trago.',
 ]})

# ── 19 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto gastar en una noche en Manta: presupuesto por tipo de plan",
 "slug": "cuanto-gastar-noche-manta-presupuesto",
 "date": "2026-10-22T17:00:00",
 "cat": CAT["vida"],
 "tags": ["presupuesto manta", "salir en manta", "precios", "vida nocturna"],
 "focus_kw": "cuánto gastar en manta",
 "yoast_title": "Cuánto gastar en una noche en Manta",
 "yoast_desc": "Cuatro planes de noche en Manta con el costo real calculado: desde salir barato hasta cena completa con cocteles. Precios, taxis y propina incluidos.",
 "excerpt": "Cuatro planes de noche calculados de principio a fin, con taxi y servicio incluidos. Desde salir con $25 hasta la noche completa sin mirar la cuenta.",
 "bloques": [
   "«¿Con cuánto salgo?» es la pregunta que la gente se hace antes de organizar la noche y la que nadie responde con números. Aquí van cuatro planes calculados de punta a punta, incluyendo el taxi y el 10 % de servicio que se agrega por ley.",
   "Todos los precios son de carta real en la zona de La Quadra, en el redondel de Barbasquillo, que es donde se concentra la salida nocturna con vista al mar.",

   {"h2": "Plan 1 · Salir barato — $25 a $35 por persona"},
   "Atardecer con un trago, algo para picar y taxi de ida y vuelta. Es el plan de quien quiere ver el Pacífico caer sin comprometer la noche.",
   {"ul": [
     "Taxi ida y vuelta: $6 a $8",
     "Dos cervezas de la casa: $12",
     "Algo para compartir: $10 aproximadamente",
     "Servicio 10 %: $2,20",
     "<strong>Total aproximado: $32 para una persona con acompañante compartiendo el picoteo</strong>",
   ]},
   "Se puede bajar más si se cambia el rooftop por el malecón Murciélago, donde una cerveza cuesta $3 a $4 y la vista es al nivel de la playa en vez de panorámica.",

   {"h2": "Plan 2 · Cena estándar — $30 a $40 por persona"},
   f"Plato fuerte y una bebida, que es lo que hace la mayoría. Con el viche mixto a $9,80 o el pescado del día a $8,90 del {link(MENU_ALMUERZO, 'menú')}, más un cóctel de $9 y el taxi, la noche cierra en torno a $35 por cabeza.",
   "Si se cambia el cóctel por cerveza de la casa a $6, bajan unos $4 por persona sin que la noche pierda nada.",

   {"h2": "Plan 3 · Cena con carne y vino — $55 a $70 por persona"},
   f"Entrada compartida, corte de res y botella de vino entre dos. Con el ribeye de 300 gramos a $17,60 o el lomo de la casa a $21,95 del {link(MENU, 'menú de la noche')}, más el tartar de atún a $11,50 para compartir y una botella desde $30, la cuenta para dos ronda los $110 con servicio y taxi.",
   "Es el plan de aniversario o de cierre de viaje. El bife doble de 450 gramos a $21,50 alcanza para dos, lo cual baja bastante el total sin quitarle nada a la noche.",

   {"h2": "Plan 4 · Noche completa — $80 a $110 por persona"},
   "Cena, varios tragos y quedarse hasta el cierre. Aquí lo que dispara la cuenta no es la comida sino la bebida: cuatro cócteles por persona a $9-$13 son entre $36 y $52 solo en barra.",
   {"quote": "La cuenta grande casi nunca la hace la comida. La hace la cuarta ronda. Si alguien quiere controlar el gasto de la noche, que controle los tragos, no el plato.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Los cuatro, comparados"},
   {"tabla": [["Plan", "Por persona", "Incluye"], [
     ["Salir barato", "$25 – $35", "Trago, picoteo, taxi"],
     ["Cena estándar", "$30 – $40", "Plato fuerte, bebida, taxi"],
     ["Cena con carne y vino", "$55 – $70", "Entrada, carne, vino, taxi"],
     ["Noche completa", "$80 – $110", "Cena y barra hasta el cierre"],
   ]]},

   {"h2": "Qué cuesta cada cosa, suelto"},
   "Para armar tu propio plan, estos son los precios de referencia de la zona con los que se calcula todo lo anterior.",
   {"tabla": [["Concepto", "Precio"], [
     ["Cerveza de la casa", "$6,00"],
     ["Cerveza importada", "$8,00 – $10,00"],
     ["Cóctel clásico", "$8,60 – $9,95"],
     ["Cóctel de autor o con fruta", "$10,45 – $13,60"],
     ["Botella de vino", "desde $30,00"],
     ["Plato de almuerzo", "$8,50 – $8,90"],
     ["Viche mixto", "$9,80"],
     ["Crudos y sushi", "$9,90 – $12,60"],
     ["Corte de res", "$14,80 – $21,95"],
     ["Taxi dentro de la ciudad", "$2 – $5"],
   ]]},

   {"h2": "Y si el plan es más económico todavía"},
   "Manta tiene una vida nocturna que no pasa por los rooftops y que cuesta bastante menos. El malecón Murciélago tiene locales al nivel de la playa donde una cerveza baja a $3 o $4 y se come marisco por $10 a $18. Tarqui y el centro son todavía más económicos, con ambiente de barrio y sin vista.",
   "La diferencia real entre una y otra opción no es la calidad de la comida —en un puerto el pescado es bueno en todas partes— sino el servicio, la vista y la comodidad. Vale la pena elegir a conciencia y no por descarte.",

   {"h2": "Los costos que la gente olvida"},
   {"ul": [
     "<strong>El 10 % de servicio.</strong> Se agrega por ley, no es propina y no es opcional. Sobre $80 son $8 más.",
     "<strong>El taxi de vuelta.</strong> Después de medianoche sube y en algunas zonas conviene pedirlo por app.",
     "<strong>El agua.</strong> Se cobra aparte, como en todo Ecuador.",
     "<strong>El consumo mínimo.</strong> Algunos locales de la ciudad lo aplican los viernes y sábados sin avisarlo al entrar. Preguntar en la puerta.",
   ]},

   {"h2": "Cómo cambia según el día"},
   "El mismo plan cuesta lo mismo cualquier día de la semana, pero lo que recibes por ese dinero varía bastante.",
   {"tabla": [["Día", "Ambiente", "Espera de mesa"], [
     ["Lunes y martes", "Muy tranquilo; algunos locales cierran", "Ninguna"],
     ["Miércoles y jueves", "Tranquilo, servicio atento", "Ninguna"],
     ["Viernes", "Lleno desde las 20:00, música en vivo", "15 a 30 min sin reserva"],
     ["Sábado", "El más concurrido de la semana", "20 a 40 min sin reserva"],
     ["Domingo", "Fuerte al mediodía, flojo de noche", "Al almuerzo, sí"],
   ]]},
   "Si el presupuesto es ajustado y el plan es la vista más que el ambiente, un jueves rinde mucho más que un sábado por el mismo dinero.",

   {"h2": "Cómo estirar el presupuesto"},
   "Cuatro decisiones que cambian el total sin cambiar el plan: ir entre semana, llegar al atardecer en vez de a las nueve, compartir el plato fuerte cuando el corte lo permite, y cambiar la segunda ronda de cóctel por cerveza. Entre las cuatro, la diferencia por pareja ronda los $30.",
   "Y la más efectiva de todas: almorzar en lugar de cenar. Entre las once y las cuatro los platos van de $8,50 a $8,90, la vista al Pacífico es la misma y la cuenta baja casi a la mitad.",
   {"faq": [
     ("¿Se puede pagar con tarjeta en la mayoría de sitios?",
      "En restaurantes y bares sí. Para taxis, mercados y puestos de playa hace falta efectivo, y en billetes pequeños. Ecuador usa el dólar estadounidense."),
     ("¿Cuánto cuesta un taxi de noche en Manta?",
      "Dentro de la ciudad, entre $2 y $5 durante el día y algo más después de medianoche. Conviene acordar el precio antes de subir o usar una app."),
     ("¿Hay cover en los rooftops?",
      "En el nuestro no. En algunos locales de la ciudad sí los fines de semana, y a veces con consumo mínimo. Es la pregunta que conviene hacer al entrar."),
     ("¿Cuál es la noche más barata para salir?",
      "Jueves y domingo. Hay menos gente, la misma vista y no hay presión por rotar la mesa. Los viernes y sábados el ambiente es mayor pero también la espera."),
   ]},
   f'¿Quieres calcular tu noche antes de salir? <a href="{wa("Hola, quiero saber cuanto sale una noche en Luuma para __ personas")}">Escríbenos por WhatsApp</a> con cuántos son y qué tienen ganas de hacer, y te pasamos el estimado.',
 ]})

# ── 20 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Sushi de mar ecuatoriano: qué cambia con el pescado local",
 "slug": "sushi-mar-ecuatoriano-pescado-local",
 "date": "2026-10-25T17:00:00",
 "cat": CAT["recetas"],
 "tags": ["pescado local", "atún", "wahoo", "sushi", "manabí"],
 "focus_kw": "pescado ecuatoriano para sushi",
 "yoast_title": "Sushi con pescado ecuatoriano: qué cambia",
 "yoast_desc": "Atun de aleta amarilla, wahoo, albacora y corvina en crudo: en que se diferencian del salmon importado, como se cortan y que esperar de cada uno.",
 "excerpt": "El salmón manda en las cartas por costumbre, no por calidad. Qué pescado ecuatoriano funciona en crudo, cómo se comporta cada uno y por qué cuesta menos.",
 "bloques": [
   "En casi toda carta de sushi de Ecuador el protagonista es el salmón, que se importa de Chile. Es una decisión comercial razonable —el cliente lo reconoce y lo pide— pero curiosa en un país cuya flota atunera abastece a medio mundo.",
   "Este texto es sobre el otro camino: qué pescado ecuatoriano funciona en crudo, cómo se comporta cada uno y qué esperar al pedirlo. Está escrito desde Manta, en la provincia de Manabí, que es donde desembarca buena parte de ese pescado.",

   {"h2": "Los cuatro que valen"},
   {"h3": "Atún de aleta amarilla"},
   "El producto insignia de Manta. Rojo intenso, textura firme y sabor pronunciado sin llegar a ser fuerte. Es el que mejor aguanta el corte grueso de sashimi y el que menos necesita salsas.",
   "Su punto débil es la oxidación: se pone marrón rápido si no se maneja bien el frío. Un atún marrón en el plato no está en mal estado necesariamente, pero lleva rato cortado.",
   {"h3": "Wahoo"},
   "Blanco, magro y de sabor muy limpio. Funciona excelente en tiradito y en ceviche, y algo menos en rolls con salsas fuertes, donde su delicadeza se pierde. Es el pescado que más sorprende a quien solo ha comido salmón.",
   {"h3": "Albacora"},
   "Otro atún, más suave y más claro que el aleta amarilla, y bastante más económico. Es el que se come a diario en la ciudad, a la plancha al mediodía. En crudo funciona bien aunque tiene menos carácter.",
   {"h3": "Corvina"},
   "El pescado blanco clásico del ceviche ecuatoriano. Textura firme, sabor neutro, muy versátil. En estilo japonés se usa poco pero aguanta perfectamente.",

   {"h2": "Cómo se comparan con el salmón"},
   {"tabla": [["Pescado", "Origen", "Textura", "Sabor"], [
     ["Salmón", "Importado (Chile)", "Grasa, suave", "Suave, dulzón"],
     ["Atún aleta amarilla", "Local", "Firme, magra", "Pronunciado"],
     ["Wahoo", "Local", "Firme, muy magra", "Limpio, delicado"],
     ["Albacora", "Local", "Media", "Suave"],
     ["Corvina", "Local", "Firme", "Neutro"],
   ]]},
   "La diferencia grande está en la grasa. El salmón de cultivo tiene mucha, y esa grasa es la que lo hace agradable a casi todo el mundo. Los pescados locales son más magros: piden mejor corte y perdonan menos, pero saben más a pescado.",
   {"quote": "Al que nunca ha comido crudo le damos salmón, porque es amable. Al que ya sabe lo que le gusta le damos atún de aquí, y casi siempre no vuelve al salmón. Es más magro, hay que cortarlo bien, pero es otra cosa.",
    "cite": "Equipo de cocina de Luuma Rooftop"},

   {"h2": "El corte importa el doble"},
   "Con un pescado graso, un corte mediocre se disimula. Con uno magro, no. La fibra del atún y del wahoo se nota en boca si el cuchillo va en la dirección equivocada, y la diferencia entre un corte bueno y uno malo es enorme.",
   "La regla es cortar contra la fibra, en un solo movimiento y con cuchillo muy afilado. Un corte serruchado desgarra la carne y cambia la textura por completo.",

   {"h2": "Lo que no se debe comer crudo"},
   "No todo pescado sirve para consumo en crudo, y en un puerto donde llega de todo conviene tenerlo claro.",
   {"ul": [
     "<strong>Pescados de río.</strong> Nunca en crudo. El riesgo parasitario es otra categoría.",
     "<strong>Pescado que lleva días en hielo sin congelación previa.</strong> Puede estar perfecto para cocinar y no serlo para crudo.",
     "<strong>Especies con carne muy grasa y blanda</strong> como algunos pelágicos pequeños, que se deshacen al cortar.",
     "<strong>Cualquier cosa de procedencia desconocida.</strong> En crudo, la trazabilidad no es un lujo.",
   ]},
   "La regla práctica para el comensal: pedir crudo solo donde el crudo esté en carta de forma habitual. Un restaurante que hace sashimi todos los días tiene la cadena de frío montada; uno que lo improvisa, no.",

   {"h2": "Por qué cuesta menos"},
   f"Un plato de atún rojo con aguacate está en $12,60 y el tartar en $11,50 en el {link(MENU, 'menú de la noche')}. El equivalente con salmón importado, en Quito o Guayaquil, suele costar entre un 30 % y un 60 % más.",
   "La razón es simple: el salmón cruza un continente refrigerado y paga importación; el atún se descarga a unos minutos de la cocina. En Manta, el pescado local es más fresco y más barato al mismo tiempo, que es una combinación poco frecuente.",

   {"h2": "La estacionalidad, que casi nadie menciona"},
   "El mar no entrega lo mismo todo el año. En la costa ecuatoriana hay temporadas y afectan directamente lo que vas a encontrar en carta.",
   {"ul": [
     "<strong>Atún:</strong> disponible todo el año, con picos según la migración del cardumen. Es el más constante.",
     "<strong>Wahoo:</strong> más frecuente entre diciembre y mayo, cuando el agua está más cálida.",
     "<strong>Corvina:</strong> disponible casi siempre, con tallas mejores en los meses fríos.",
     "<strong>Camarón:</strong> hay de cultivo todo el año; el silvestre tiene vedas que conviene respetar.",
   ]},
   "Por eso una carta que ofrece exactamente lo mismo los doce meses del año está trabajando con congelado de importación, no con pesca del día. No es necesariamente malo, pero es otra cosa.",

   {"h2": "Cómo se maneja el pescado antes de llegar al plato"},
   "Entre el bote y la mesa hay una cadena corta pero exigente. El pescado se recibe entero, se eviscera y se mantiene en frío hasta el momento del corte. Para consumo crudo, la práctica correcta incluye congelación previa a temperatura suficiente para eliminar parásitos, algo que la normativa recomienda y que las cocinas serias aplican aunque el pescado sea de esa mañana.",
   "El detalle que más cambia el resultado final es cuándo se corta. Un lomo de atún porcionado con horas de anticipación pierde color y textura por oxidación. Lo ideal es cortar contra pedido, y se nota: el brillo del corte fresco no se puede fingir.",

   {"h2": "Qué pedir si es tu primera vez"},
   {"ol": [
     "Empieza por el atún de aleta amarilla en tartar o sashimi, sin salsas que tapen.",
     "Si te gusta, prueba el wahoo en tiradito para notar la diferencia entre un atún y un pescado blanco.",
     "Deja los rolls con queso crema y salsa para el final: son ricos pero no dejan probar el pescado.",
     f"Y si prefieres el mismo pescado cocido, el {link(MENU_ALMUERZO, 'menú de almuerzo')} tiene wahoo o albacora a la plancha en $8,90.",
   ]},
   {"faq": [
     ("¿Es seguro comer pescado local crudo?",
      "Sí, con manejo correcto de frío y rotación alta. La normativa recomienda congelación previa para consumo crudo, y los sitios serios la aplican. En un puerto pesquero, además, el producto es del día."),
     ("¿Por qué casi todos los restaurantes usan salmón?",
      "Porque el cliente lo reconoce, tiene grasa que perdona errores de corte y llega en filetes estandarizados. Es la opción cómoda, no la mejor."),
     ("¿Qué es el wahoo?",
      "Un pez de mar abierto, blanco y magro, que en Ecuador se pesca en la costa. En inglés se llama igual; en otros países se le dice peto o sierra."),
     ("¿Se puede pedir el pescado del día en crudo?",
      "Conviene preguntarlo. No todo lo que llega se destina a consumo crudo, y una cocina seria te dirá qué sí y qué no ese día."),
   ]},
   f'¿Quieres probar el atún de aquí? <a href="{wa("Hola, quiero reservar mesa en Luuma para probar el atun local")}">Reserva por WhatsApp</a> y pregunta por la pesca del día: cambia según lo que traigan los botes.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
