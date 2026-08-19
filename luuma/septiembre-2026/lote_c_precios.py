#!/usr/bin/env python3
"""Bloque D · menú y precios (3 posts) + un cóctel más del bloque B.

El cluster «precios y menú» tiene **CTR 4,14 %**, el más alto de todo el sitio:
la gente que busca precios sí hace clic. 1.111 impresiones, 46 clics, posición 8,4.
Subir de posición ese cluster es de lo más rentable que se puede hacer.
"""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, link, wa, guarda

POSTS = []

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto cuesta cenar en un rooftop en Manta: precios reales",
 "slug": "cuanto-cuesta-cenar-rooftop-manta",
 "date": "2026-09-25T17:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["precios manta", "cenar en manta", "rooftop", "presupuesto"],
 "focus_kw": "cuánto cuesta cenar en manta",
 "yoast_title": "Cuánto cuesta cenar en un rooftop en Manta",
 "yoast_desc": "Precios reales de una cena en rooftop en Manta: entrada, plato fuerte, coctel y propina. Tres escenarios calculados, del basico al completo.",
 "excerpt": "Nadie publica lo que cuesta de verdad una cena con vista. Aquí van tres escenarios con precios de carta, el 10 % de servicio incluido y sin sorpresas al final.",
 "bloques": [
   "La pregunta llega por WhatsApp casi todos los días y siempre con la misma cautela: «¿más o menos cuánto sale cenar ahí?». Es una pregunta razonable y merece una respuesta con números, no un «depende».",
   "Aquí van tres escenarios reales con precios de carta, calculados de principio a fin. Todos incluyen el 10 % de servicio que se agrega por ley en Ecuador, para que el número final sea el que vas a ver en la cuenta.",

   {"h2": "Lo primero: el 10 % no es propina"},
   "En Ecuador, los restaurantes suman por ley un 10 % de servicio a la cuenta. No es opcional y no es la propina — es parte del precio final. Cualquier cosa que dejes por encima de eso sí es voluntaria y no se espera.",
   "Eso significa que un plato de $17,60 en carta llega a la cuenta como $19,36. Todos los totales de abajo ya lo tienen incluido.",

   {"h2": "Escenario 1 · Solo el atardecer"},
   "Dos personas, sin cenar, llegando a las 17:45 para agarrar el sol antes de que caiga.",
   {"tabla": [["Concepto", "Precio"], [
     ["2 cócteles clásicos (caipirinha, paloma)", "$17,50"],
     ["1 picada para compartir", "~$10,00"],
     ["Subtotal", "$27,50"],
     ["Servicio 10 %", "$2,75"],
     ["<strong>Total para dos</strong>", "<strong>$30,25</strong>"],
   ]]},
   "Unos $15 por persona. Es el plan más económico con vista y el que más recomendamos a quien está de paso y ya cenó, o a quien quiere ver la puesta de sol sin comprometer la noche entera.",

   {"h2": "Escenario 2 · Cena estándar"},
   "Dos personas, plato fuerte y un trago cada uno. Es lo que hace la mayoría.",
   {"tabla": [["Concepto", "Precio"], [
     ["1 viche mixto", "$9,80"],
     ["1 pescado a la plancha", "$8,90"],
     ["2 cócteles", "$18,50"],
     ["Subtotal", "$37,20"],
     ["Servicio 10 %", "$3,72"],
     ["<strong>Total para dos</strong>", "<strong>$40,92</strong>"],
   ]]},
   f"Alrededor de $20 por persona. Si en vez de cóctel piden cerveza de la casa a $6, el total baja a unos $34. Los platos salen del {link(MENU_ALMUERZO, 'menú de almuerzo')} y del {link(MENU, 'menú de la noche')}.",

   {"h2": "Escenario 3 · Cena completa con carne"},
   "Dos personas, entrada, carne, vino y postre. La cena de aniversario o de cierre de viaje.",
   {"tabla": [["Concepto", "Precio"], [
     ["1 tartar de atún rojo", "$11,50"],
     ["1 ribeye 300 g", "$17,60"],
     ["1 lomo de la casa", "$21,95"],
     ["1 botella de vino", "$30,00"],
     ["Subtotal", "$81,05"],
     ["Servicio 10 %", "$8,11"],
     ["<strong>Total para dos</strong>", "<strong>$89,16</strong>"],
   ]]},
   "Unos $45 por persona. Es el techo razonable de una cena en la ciudad sin entrar en terreno de celebración grande.",
   {"quote": "El error más común es reservar para el atardecer y pedir la cena completa a las seis de la tarde. A esa hora nadie tiene hambre de verdad. Sale mejor tomar algo, ver el sol caer y pedir la comida a las siete y media.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Cómo se compara con el resto de Manta"},
   {"tabla": [["Dónde", "Por persona", "Qué incluye"], [
     ["Comedor de barrio, Tarqui o Umiña", "$4 – $6", "Almuerzo completo con sopa y jugo"],
     ["Cevichería del mercado", "$6 – $9", "Ceviche y bebida"],
     ["Marisquería del malecón Murciélago", "$10 – $18", "Plato fuerte y bebida"],
     ["Rooftop en La Quadra", "$15 – $45", "Según si es solo trago o cena completa"],
   ]]},
   "Ninguna columna es un abuso. Un almuerzo de $5 en Tarqui es de las mejores relaciones calidad-precio del país; una cena de $45 con vista al Pacífico y servicio de mesa es otra cosa distinta. La comparación útil no es entre ellas, sino entre lo que buscas esa noche.",

   {"h2": "Cinco formas de gastar menos sin perder la vista"},
   {"ul": [
     "<strong>Ir al almuerzo en vez de a la cena.</strong> Entre 11:00 y 16:00 los platos van de $8,50 a $8,90 y la vista es la misma.",
     "<strong>Cerveza en vez de cóctel.</strong> $6 contra $9-$13. En dos personas son unos $12 de diferencia.",
     "<strong>Compartir el plato fuerte.</strong> El bife doble de 450 gramos a $21,50 alcanza cómodamente para dos con una ensalada.",
     "<strong>Entre semana.</strong> Está más tranquilo y no hay presión de rotar la mesa.",
     "<strong>Llegar temprano.</strong> Un trago a las 17:45 con el mejor asiento cuesta lo mismo que uno a las nueve sin vista.",
   ]},

   {"h2": "Qué mueve el precio hacia arriba"},
   "Tres cosas explican casi toda la diferencia entre una cuenta de $30 y una de $90, y ninguna es el margen del restaurante.",
   "La primera es la proteína. Un pescado del día cuesta $8,90 porque el puerto está a diez minutos; un corte de res importado cuesta $17,60 a $21,95 porque viene de más lejos y se compra en dólares a proveedor. Si el presupuesto manda, el mar siempre gana en esta ciudad.",
   "La segunda es la bebida. Dos cócteles suman entre $17 y $27, más que un plato fuerte. Una botella de vino arranca en $30 porque el vino es importado y paga arancel; Ecuador produce muy poco. Es la partida donde más rápido sube una cuenta sin que nadie lo note.",
   "La tercera es el número de tiempos. Entrada, fuerte y postre por persona multiplican por tres. En la costa, compartir una entrada entre dos y pedir un solo postre es lo normal, no un gesto de tacañería.",

   {"h2": "Cuándo conviene reservar"},
   "Reservar no cambia el precio, pero sí lo que recibes por él. Las mesas del borde son las mismas que las de adentro en carta y muy distintas en experiencia, y son las primeras que se van.",
   {"ul": [
     "<strong>Entre semana:</strong> rara vez hace falta, salvo grupos de más de seis.",
     "<strong>Viernes y sábado:</strong> conviene, sobre todo si quieren el atardecer.",
     "<strong>Domingos al mediodía:</strong> se llena de familias; reservar ahorra la espera.",
     "<strong>Feriados largos:</strong> imprescindible, con un par de días de anticipación.",
   ]},

   {"h2": "Lo que no aparece en la carta"},
   "Dos cosas que conviene tener claras antes de sentarse. La primera: el agua embotellada se cobra aparte, como en todo Ecuador. La segunda: no hay cover ni consumo mínimo en nuestra terraza, aunque en otros locales de la ciudad sí lo hay los viernes y sábados — vale preguntarlo al entrar donde sea que vayas.",
   {"faq": [
     ("¿Se puede pagar con tarjeta?",
      "Sí, y en casi todo Manta. Ecuador usa el dólar estadounidense, así que no hay conversión de moneda para el visitante extranjero. Para taxis y mercados conviene llevar efectivo en billetes pequeños."),
     ("¿Cuánto se deja de propina?",
      "El 10 % de servicio ya viene en la cuenta. Dejar algo adicional es voluntario y se agradece, pero nadie lo espera ni lo va a mencionar."),
     ("¿Hay menú infantil?",
      "Hay platos que funcionan bien para niños, como el pollo a la plancha a $8,50. Conviene consultarlo al reservar si van con niños pequeños."),
     ("¿Es más caro los fines de semana?",
      "No, los precios de carta son los mismos toda la semana. Lo que cambia es la disponibilidad de mesa: viernes y sábado hay que reservar si se quiere ventana o borde."),
   ]},
   f'¿Quieres calcular tu caso concreto? <a href="{wa("Hola, quisiera saber cuanto sale una cena para __ personas en Luuma")}">Escríbenos por WhatsApp</a> con cuántos son y qué tienen ganas de comer, y te pasamos el estimado antes de que vengan.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Menú de almuerzo en Manta: qué se come entre semana y a qué precio",
 "slug": "menu-almuerzo-manta-entre-semana",
 "date": "2026-09-28T13:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["almuerzo manta", "menú ejecutivo", "precios", "manabí"],
 "focus_kw": "almuerzo en manta",
 "yoast_title": "Menú de almuerzo en Manta: qué comer y precios",
 "yoast_desc": "El almuerzo es la comida mas seria del dia en Manabi. Que se sirve entre semana, cuanto cuesta por zona y a que hora conviene llegar en Manta.",
 "excerpt": "En Manabí el almuerzo es la comida importante del día, no la cena. Qué se sirve entre semana, cuánto cuesta según la zona y a qué hora llegar.",
 "bloques": [
   "En la costa ecuatoriana el almuerzo es la comida seria del día. Se come entre once y tres, es abundante, y en la mayoría de sitios llega como menú cerrado: sopa, plato fuerte, jugo y a veces postre. La cena, en comparación, es un asunto ligero.",
   "Para quien llega de fuera esto es contraintuitivo y genera el error clásico: llegar a las cuatro de la tarde con hambre y encontrar todo cerrado o solo con carta de noche. Esta guía es para que eso no pase.",

   {"h2": "Qué es el almuerzo, exactamente"},
   "El «almuerzo» o «menú del día» es una fórmula fija a precio cerrado. En un comedor de barrio incluye sopa —casi siempre buena, es donde se nota la mano de la cocina—, un segundo con arroz, una jarra de jugo natural y en ocasiones un dulce.",
   "Lo que cambia entre un sitio de $4 y uno de $9 no es tanto la cantidad como el corte de la proteína, el lugar donde te sientas y si te atienden en mesa. La sopa suele estar igual de bien en ambos.",

   {"h2": "Cuánto cuesta según dónde"},
   {"tabla": [["Zona", "Precio", "Qué esperar"], [
     ["Tarqui y el mercado", "$3,50 – $5", "Comedores de toda la vida, clientela fija"],
     ["Umiña, La Aurora", "$5 – $7", "Barrio residencial, menos turístico"],
     ["Malecón Murciélago", "$8 – $12", "Vista al mar, precio de zona turística"],
     ["La Quadra, Barbasquillo", "$8,50 – $12", "Servicio de mesa, mantel, vista"],
   ]]},
   f"En nuestro caso el {link(MENU_ALMUERZO, 'menú de almuerzo')} corre de 11:00 a 16:00: pescado a la plancha —wahoo o albacora, según lo que llegue— en $8,90, y pollo a la plancha en $8,50, ambos con arroz blanco y ensalada fresca.",

   {"h2": "Los platos que hay que probar"},
   {"h3": "Viche"},
   "La sopa espesa de maní con pescado o mariscos y plátano verde. Es el plato que define a Manabí y el que más se pide al mediodía. En carta a $9,80 la versión mixta, con camarón y pescado.",
   {"h3": "Pescado a la plancha"},
   "Wahoo o albacora, dos pescados que en Manta son cotidianos y en Quito son especialidad de carta. Es la mejor forma de entender por qué vale la pena comer pescado en un puerto: llega en la mañana y se cocina al mediodía.",
   {"h3": "Tonga"},
   "Gallina criolla con arroz envuelta en hoja de plátano y cocida al vapor. Era la comida que se llevaba al campo. La hoja no es adorno: perfuma el arroz mientras se cuece.",
   {"h3": "Corviche y bolón"},
   "Más de media mañana que de almuerzo, pero se consiguen todo el día. Uno o dos dólares en la calle y de lo mejor que se come en la provincia.",

   {"quote": "La gente de Quito llega buscando la cena y se pierde lo bueno. Aquí la cocina de verdad sale al mediodía, porque es cuando el pescado tiene ocho horas de llegado. A la noche ya está bien, pero no es lo mismo.",
    "cite": "Equipo de cocina de Luuma Rooftop"},

   {"h2": "A qué hora llegar"},
   {"ul": [
     "<strong>11:00 a 12:00.</strong> Recién abre, todo disponible, sitios vacíos.",
     "<strong>12:30 a 14:00.</strong> La hora punta. En comedores populares hay que esperar mesa.",
     "<strong>14:00 a 15:00.</strong> Se acaban los platos más pedidos, especialmente el pescado del día.",
     "<strong>Después de 16:00.</strong> Los comedores cierran. Empiezan las cartas de noche, más caras.",
   ]},
   "La regla práctica: si el plato que quieres es de pescado, llega antes de la una. Lo que se acaba primero siempre es lo del mar.",

   {"h2": "Cómo distinguir un buen comedor"},
   "No hay carta escrita en la mayoría: alguien te canta lo que hay. Eso no es señal de informalidad, es lo normal. Lo que sí conviene mirar:",
   {"ul": [
     "<strong>Que esté lleno de gente que trabaja cerca.</strong> Es el mejor indicador que existe.",
     "<strong>Que la sopa no venga de sobre.</strong> Se nota en el color y en que lleve trozos de verdad.",
     "<strong>Rotación.</strong> Si ves salir platos todo el tiempo, la comida es del día.",
     "<strong>Que el jugo sea natural.</strong> En Manabí lo es casi siempre; si viene de polvo, es mala señal general.",
   ]},

   {"h2": "Por qué el almuerzo es tan barato aquí"},
   "No es que los comedores trabajen a pérdida. Son tres factores que se acumulan y que explican por qué en Manabí se come mejor y más barato que en casi cualquier otra provincia.",
   "El pescado no viaja. Manta es el mayor puerto atunero de la costa del Pacífico sudamericano, y la flota artesanal descarga en la misma bahía que la industrial. Un comedor de Tarqui compra en un mercado que recibe producto dos veces al día, no de un distribuidor que entrega dos veces por semana.",
   "El verde y el maní son locales. La base de la cocina manabita —plátano verde, maní, yuca— se cultiva en la propia provincia. No hay flete ni intermediarios largos.",
   "Y el volumen es alto. Un comedor que sirve ochenta almuerzos al mediodía compra en cantidades que le permiten cerrar el precio. Es el mismo motivo por el que el mejor almuerzo casi nunca está en el sitio más vacío.",

   {"h2": "Qué evitar al mediodía"},
   {"ul": [
     "<strong>Los sitios con carta plastificada en cuatro idiomas y fotos.</strong> Están para el turista de paso y cobran acorde.",
     "<strong>El ceviche a las tres de la tarde en un local vacío.</strong> Lleva desde la mañana. Come ceviche donde haya movimiento.",
     "<strong>Pedir carne importada en un comedor de $5.</strong> No es su fuerte y lo notarás. Ahí se pide pescado o pollo.",
     "<strong>Sentarse en el primer sitio del malecón con alguien invitando desde la puerta.</strong> Regla universal y aquí también aplica.",
   ]},

   {"h2": "Los sábados y domingos cambian las reglas"},
   f"El fin de semana el almuerzo se vuelve un asunto familiar y más largo, y varios comedores de diario cierran. Los sitios con vista se llenan desde el mediodía, sobre todo si hace sol. Si el plan es almorzar con vista al Pacífico un domingo, conviene reservar o llegar antes de la una. Nuestra {link(MENU, 'carta de la noche')} arranca a las 16:00, cuando termina el almuerzo.",
   {"faq": [
     ("¿Cuál es la diferencia entre almuerzo y menú ejecutivo?",
      "Prácticamente ninguna. «Menú ejecutivo» suele indicar un precio algo más alto y mejor presentación, pero la estructura —sopa, segundo, jugo— es la misma."),
     ("¿Se puede pedir solo el plato fuerte?",
      "En comedores de barrio a veces no: el almuerzo va completo o no va. En restaurantes de carta sí, pidiendo a la carta y pagando aparte."),
     ("¿Es seguro comer pescado crudo al mediodía?",
      "El ceviche se cura en limón y en un puerto pesquero la rotación es alta. Al mediodía es cuando mejor está. De noche, en un sitio poco concurrido, es cuando conviene pensarlo dos veces."),
     ("¿Sirven almuerzo los domingos?",
      "En zonas turísticas sí; en los comedores de barrio muchos cierran. El domingo la ciudad se mueve hacia la playa y la oferta se concentra ahí."),
   ]},
   f'Si quieres almorzar con vista al Pacífico, <a href="{wa("Hola, quiero reservar para almorzar en Luuma")}">escríbenos por WhatsApp</a>. Entre semana casi nunca hace falta reservar; los domingos, sí.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
