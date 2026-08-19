#!/usr/bin/env python3
"""Últimos 7 posts del lote: ocasiones, brunch, gin, maridaje y presupuesto.

Cierra los 20 de septiembre. Bloques F (ocasiones), E (brunch), B (gin),
C (maridaje) y D (presupuesto por tipo de plan).
"""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, link, wa, guarda

POSTS = []

# ── 14 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Gin tonic en Manta: cómo se prepara uno que valga la pena",
 "slug": "gin-tonic-manta-como-se-prepara",
 "date": "2026-10-07T17:00:00",
 "cat": CAT["cocteles"],
 "tags": ["gin tonic", "coctelería", "manta", "bebidas"],
 "focus_kw": "gin tonic manta",
 "yoast_title": "Gin tonic en Manta: cómo se prepara bien",
 "yoast_desc": "El gin tonic se arruina en la tonica y en el hielo, no en la ginebra. Como se prepara uno que valga la pena y que pedir en Manta, con precios.",
 "excerpt": "El gin tonic se arruina en la tónica y en el hielo, no en la ginebra. Qué mira una barra que sabe, y qué pedir para no llevarte una decepción de $13.",
 "bloques": [
   "El gin tonic es el trago más fácil de servir y el más fácil de arruinar. Lleva dos ingredientes y ninguna técnica, lo cual suena a ventaja hasta que te sirven uno tibio, en vaso pequeño y con tónica de gaseosa dulce.",
   "En Manta hay barras que lo hacen bien y barras que lo despachan. Esto es lo que separa a unas de otras, escrito desde el otro lado de la barra.",

   {"h2": "La tónica importa más que la ginebra"},
   "Es contraintuitivo pero es así: la ginebra es una parte del trago y la tónica son tres. Una tónica muy azucarada aplasta cualquier botánico por caro que sea el gin.",
   "La tónica comercial estándar lleva bastante azúcar. Las tónicas secas o premium tienen menos y dejan que el enebro y los cítricos del gin aparezcan. Si una barra solo tiene una tónica y es la de siempre, el trago va a saber a eso, cambies el gin que cambies.",
   {"quote": "Nos ha pasado que alguien pide el gin más caro de la estantería y le sirven el mismo refresco que al de la botella barata. Si vas a gastar en gin tonic, pregunta primero qué tónica tienen. Esa pregunta ordena todo lo demás.",
    "cite": "Equipo de barra de Luuma Rooftop"},

   {"h2": "El hielo, el segundo asesino"},
   "El hielo pequeño y turbio se derrite en dos minutos, y en la costa ecuatoriana con 30 grados eso pasa todavía más rápido. Lo que queda es un vaso de agua con sabor a limón.",
   "El hielo bueno es grande, transparente y sólido, y hay que llenar el vaso hasta arriba. Suena a exceso pero es al revés: más hielo significa menos dilución, porque la masa fría tarda mucho más en fundirse que unos cubitos sueltos.",

   {"h2": "Cómo se arma uno bien"},
   {"ol": [
     "Copa de balón o vaso alto, enfriado antes si se puede.",
     "Hielo hasta arriba, del grande. Si el hielo cruje al echar el líquido, está bien frío.",
     "Ginebra primero, unos 50 ml, medida y no a ojo.",
     "Tónica fría, vertida por la pared del vaso o sobre una cuchara para no matar el gas.",
     "Nada de remover fuerte. Un giro suave y ya.",
     "El cítrico o el botánico al final: cáscara, no rodaja aplastada.",
   ]},
   "El detalle de la tónica fría es el que más se descuida. Si la tónica está a temperatura ambiente, el hielo se derrite de golpe para enfriarla y el trago nace aguado.",

   {"h2": "Qué pedir en Manta"},
   f"En nuestra carta, el gin con frutos rojos está en $13,60 — es la versión con fruta, más aromática y algo más dulce. Si prefieres la versión seca y clásica, se puede pedir el gin con tónica sin la parte frutal. Toda la {link(BEBIDAS, 'carta de bebidas')} está publicada.",
   {"tabla": [["Si buscas…", "Pide", "Precio referencia"], [
     ["Seco y cítrico", "Gin tonic clásico", "$11 – $14"],
     ["Aromático y frutal", "Gin con frutos rojos", "$13,60"],
     ["Algo más ligero y barato", "Paloma", "$8,60"],
     ["Nada de gas", "Daiquiri clásico", "$9,70"],
   ]]},

   {"h2": "Tres señales de una barra que sabe"},
   {"ul": [
     "<strong>Te preguntan qué gin quieres</strong> en lugar de servir el de la casa por defecto.",
     "<strong>La copa llega fría</strong>, no recién sacada del estante.",
     "<strong>La tónica se abre en el momento.</strong> Una botella abierta hace rato perdió el gas y con él la mitad del trago.",
   ]},

   {"h2": "Dónde tomarlo en Manta"},
   "La oferta de gin tonic en la ciudad se concentra en dos zonas y no son equivalentes. En La Quadra, junto al redondel de Barbasquillo, y en la av. Flavio Reyes están las barras con carta trabajada y varias ginebras para elegir. En el malecón Murciélago predominan los sitios de volumen, donde el gin tonic sale correcto pero sin matices.",
   "En Tarqui y los barrios del centro prácticamente no se pide gin tonic: ahí la bebida de la casa es la cerveza y el ron. No es un defecto, es otra cultura de barra, y el precio lo refleja.",

   {"h2": "El clima juega en contra"},
   "Manta tiene entre 26 y 31 grados casi todo el año y una humedad alta que hace que cualquier bebida con hielo pierda la partida en minutos. Eso obliga a exagerar en dos cosas: más hielo del que parece necesario y la tónica bien fría desde la nevera, nunca de estante.",
   "También cambia lo que apetece. A las cuatro de la tarde, con el sol alto, un gin tonic seco entra mejor que cualquier trago dulce. A las nueve de la noche, con la brisa del Pacífico entrando, la diferencia se nota menos.",

   {"h2": "Los errores que se repiten al pedirlo"},
   "El primero es pedir el gin más caro asumiendo que eso resuelve el trago. Ya lo dijimos y vale repetirlo: con tónica dulce, la ginebra premium se pierde entera. Sale mejor un gin correcto con tónica seca que al revés.",
   "El segundo es aceptar el vaso pequeño. Un gin tonic en vaso corto se calienta en minutos y no deja espacio para el hielo necesario. Si llega así, pedir uno más grande con más hielo no es capricho.",
   "El tercero es dejar que decoren de más. Una rodaja de limón exprimida dentro tapa los botánicos con acidez; tres tipos de fruta y una rama de romero convierten el trago en otra cosa. La cáscara, aromatizando, es suficiente.",

   {"h2": "Con qué va bien"},
   f"El gin tonic funciona como aperitivo mejor que como acompañamiento. El amargo de la tónica limpia el paladar y abre el apetito, así que va bien antes de comer o entre platos. Con la comida en sí, si vas a pedir crudos o pescado, la cerveza o un blanco seco se llevan mejor; con carne — el ribeye de 300 gramos está en $17,60 en el {link(MENU, 'menú')} — el gin tonic queda corto.",
   "El momento ideal en Manta es entre las cinco y media y las siete de la tarde, con la brisa del Pacífico entrando y el sol bajando. El atardecer cae entre 18:15 y 18:40 durante todo el año, porque la ciudad está prácticamente sobre la línea ecuatorial.",
   {"faq": [
     ("¿Cuánto debe costar un gin tonic en Manta?",
      "Entre $10 y $15 según la ginebra. Por debajo de $9 suele ser gin de mezcla y tónica comercial; por encima de $16 se paga marca o ubicación, rara vez mejor preparación."),
     ("¿El gin tonic engorda menos que otros cócteles?",
      "Tiene menos azúcar que un daiquiri o una caipirinha, sí, pero la tónica estándar aporta bastante. Con tónica seca la diferencia es real."),
     ("¿Se puede pedir con menos tónica?",
      "Claro, y en una barra seria lo hacen sin problema. Menos tónica y más hielo da un trago más seco y más frío."),
     ("¿Qué gin se consigue en Ecuador?",
      "Las marcas internacionales habituales y algunas ginebras artesanales nacionales que han aparecido en los últimos años. Estas últimas suelen tener botánicos locales y valen la pena probarlas."),
   ]},
   f'¿Vienes por el atardecer? <a href="{wa("Hola, quiero reservar mesa en Luuma")}">Reserva por WhatsApp</a> — las mesas del borde son las primeras que se llenan y el momento bueno dura unos quince minutos.',
 ]})

# ── 15 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cumpleaños en un rooftop de Manta: cómo organizarlo sin sorpresas",
 "slug": "cumpleanos-rooftop-manta-como-organizarlo",
 "date": "2026-10-10T17:00:00",
 "cat": CAT["eventos"],
 "tags": ["cumpleaños manta", "celebrar", "reservas", "eventos"],
 "focus_kw": "cumpleaños en manta",
 "yoast_title": "Cumpleaños en un rooftop de Manta: guía",
 "yoast_desc": "Cuanta gente cabe, cuanto cuesta por persona, si dejan llevar torta y a que hora reservar para el atardecer. Guia practica para celebrar en Manta.",
 "excerpt": "Cuánta gente cabe, cuánto sale por persona, si dejan llevar torta y a qué hora reservar. Las respuestas que se preguntan por WhatsApp antes de decidir.",
 "bloques": [
   "Organizar un cumpleaños en un restaurante tiene más variables de las que parece, y casi todas se resuelven con una conversación de cinco minutos antes de reservar. El problema es que la gente reserva primero y pregunta después.",
   "Estas son las preguntas que nos llegan por WhatsApp cada semana, con las respuestas que damos, para que llegues a la mesa sabiendo qué esperar.",

   {"h2": "Cuánta gente, y por qué importa"},
   "El tamaño del grupo cambia todo: la mesa, el horario y hasta si conviene o no el atardecer.",
   {"ul": [
     "<strong>2 a 6 personas.</strong> Sin complicación. Se reserva mesa normal y se puede pedir a la carta con calma.",
     "<strong>7 a 12.</strong> Ya requiere aviso previo para juntar mesas. Conviene acordar antes si van a pedir a la carta o algo cerrado.",
     "<strong>13 a 25.</strong> Es un evento pequeño. Necesita coordinación de horario, distribución y a veces una carta reducida para que la cocina responda.",
     "<strong>Más de 25.</strong> Ya es un evento privado y se conversa aparte.",
   ]},
   "El punto de quiebre real está en las doce personas. Por debajo, un grupo se atiende como mesa; por encima, se atiende como evento, y son dos lógicas distintas de servicio y de cocina.",

   {"h2": "La hora, que es la decisión más importante"},
   "El atardecer sobre el Pacífico cae entre las 18:15 y las 18:40 todo el año, sin variación estacional, porque Manta está sobre la línea ecuatorial. Eso hace que se pueda planificar con meses de anticipación, pero también que todo el mundo quiera la misma franja.",
   {"tabla": [["Hora de llegada", "Qué consigues"], [
     ["17:30", "Mesa con vista asegurada, ambiente tranquilo"],
     ["18:00", "Llegas justo; la vista buena puede estar tomada"],
     ["19:30", "Ya sin atardecer, pero es la mejor hora para cenar"],
     ["21:00", "Ambiente de noche, música, menos apto para grupo grande"],
   ]]},
   "Para un cumpleaños con grupo, nuestra recomendación es llegar a las 17:30, tomar algo mientras cae el sol y pedir la comida hacia las 19:15. A las seis de la tarde nadie tiene hambre de verdad, y pedir temprano suele terminar en platos fríos y sobras.",
   {"quote": "Lo que más falla en un cumpleaños no es la comida: es que la mitad del grupo llegue una hora tarde. Si la reserva es a las siete, pon en el grupo de WhatsApp que es a las seis y media. Funciona.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Cuánto sale por persona"},
   f"Con precios de nuestra carta y el 10 % de servicio de ley ya incluido, hay tres escenarios razonables. Los platos salen del {link(MENU, 'menú de la noche')}.",
   {"tabla": [["Plan", "Por persona", "Qué incluye"], [
     ["Solo brindis", "$12 – $16", "Un cóctel y algo para picar"],
     ["Cena estándar", "$20 – $26", "Plato fuerte y una bebida"],
     ["Cena completa", "$35 – $48", "Entrada, carne o crudos, bebida y postre"],
   ]]},
   "Para calcular rápido en grupo: multiplica por el número de personas y súmale un 15 % de margen. Siempre alguien pide un trago extra y siempre hay quien llega con acompañante no anunciado.",

   {"h2": "Las preguntas que siempre aparecen"},
   {"h3": "¿Puedo llevar torta?"},
   "Sí. Es lo normal y en la mayoría de sitios de Manta no se cobra descorche por la torta. Conviene avisar al reservar para tenerla en frío y sacarla en el momento, en lugar de que pase dos horas sobre una mesa al aire libre.",
   {"h3": "¿Se puede decorar?"},
   "Decoración sencilla de mesa, sí. Globos grandes en una terraza abierta al Pacífico son mala idea por el viento — se van, literalmente. Lo que funciona es la decoración baja y sujeta.",
   {"h3": "¿Hay algo para el cumpleañero?"},
   "En la mayoría de sitios, avisar que es cumpleaños hace que salga un postre con vela. Se pide al reservar, no en el momento.",
   {"h3": "¿Se puede poner música propia?"},
   "En una terraza compartida con otros clientes, no. Si el plan requiere música propia, entonces se trata de un evento privado y se conversa aparte.",

   {"h2": "Dónde celebrar en Manta, por zona"},
   "La ciudad tiene tres zonas con oferta para grupos y cada una sirve para algo distinto.",
   {"ul": [
     "<strong>La Quadra, en el redondel de Barbasquillo.</strong> Plaza abierta con varios locales, vista al Pacífico desde arriba y espacio para grupos. Es donde estamos.",
     "<strong>Malecón Murciélago.</strong> Marisquerías al nivel de la playa, más informal y más económico. Bueno para grupos grandes con presupuesto ajustado.",
     "<strong>Av. Flavio Reyes.</strong> La otra zona gastronómica de la ciudad, con restaurantes de carta más elaborada y ambiente de ciudad, sin vista al mar.",
   ]},
   f"Para almuerzo de cumpleaños con grupo, el {link(MENU_ALMUERZO, 'menú de almuerzo')} de 11:00 a 16:00 sale bastante más económico que la cena y la vista es exactamente la misma.",

   {"h2": "Cómo repartir la cuenta sin incomodar"},
   "Es el momento más incómodo de cualquier cumpleaños en grupo y conviene resolverlo antes de sentarse, no al final con el mesero esperando.",
   {"ul": [
     "<strong>Si invita el cumpleañero:</strong> avisarlo al reservar, para que la cuenta salga directo a esa persona y sin preguntar en la mesa.",
     "<strong>Si se divide entre todos:</strong> decidirlo antes de pedir. La gente pide distinto cuando sabe que se reparte parejo.",
     "<strong>Si cada uno paga lo suyo:</strong> avisar al equipo al llegar. Dividir una cuenta de quince personas al final toma tiempo y descuadra la mesa.",
     "<strong>Si se junta plata para el regalo:</strong> resolverlo por transferencia antes, nunca en la mesa.",
   ]},

   {"h2": "Tres cosas que arruinan un cumpleaños en terraza"},
   {"ul": [
     "<strong>No avisar el número real.</strong> Reservar para diez y llegar quince deja a cinco personas de pie.",
     "<strong>Ignorar el viento.</strong> De junio a septiembre refresca en cuanto cae el sol. Avisa al grupo que lleve algo de abrigo.",
     "<strong>Reservar para las seis y pedir de una.</strong> Comer antes del atardecer desperdicia lo que fuiste a ver.",
   ]},
   {"faq": [
     ("¿Con cuánta anticipación hay que reservar?",
      "Entre semana, un día antes basta. Viernes, sábado y feriados, dos o tres días. Para grupos de más de doce, una semana."),
     ("¿Se cobra algo por reservar?",
      "En la mayoría de restaurantes de Manta no. Para eventos privados o grupos grandes sí puede pedirse un anticipo, y se acuerda antes."),
     ("¿Es apto para niños?",
      "Hasta las nueve de la noche, sí. Después el ambiente se vuelve más de adultos. Los platos sencillos, como el pollo a la plancha a $8,50, funcionan bien para los más pequeños."),
     ("¿Qué pasa si llueve?",
      "En la costa la lluvia es de enero a abril, fuerte y corta, casi siempre a media tarde y ya pasada a la hora de cenar. Los rooftops tienen zonas cubiertas; conviene preguntar al reservar cuántas mesas hay bajo techo y si se puede mover el grupo si se complica."),
     ("¿Se puede llevar bebida propia?",
      "No, ni aquí ni en ningún restaurante con licencia de la ciudad. Lo que sí se puede es acordar una botella de la carta reservada para el brindis, y en grupos grandes conviene dejarlo hablado con anticipación."),
   ]},
   f'¿Estás organizando uno? <a href="{wa("Hola, quiero organizar un cumpleanos en Luuma. Somos __ personas")}">Escríbenos por WhatsApp</a> con la fecha y cuántos son, y te confirmamos disponibilidad y la hora del atardecer para ese día.',
 ]})

# ── 16 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cena de aniversario en Manta: mesa, hora y qué pedir",
 "slug": "cena-aniversario-manta-mesa-hora",
 "date": "2026-10-13T17:00:00",
 "cat": CAT["eventos"],
 "tags": ["aniversario", "cena romántica", "manta", "reservas"],
 "focus_kw": "cena de aniversario en manta",
 "yoast_title": "Cena de aniversario en Manta: guía práctica",
 "yoast_desc": "Que mesa pedir, a que hora llegar y que ordenar para una cena de aniversario en Manta. Con precios reales, la hora del atardecer y los errores que se repiten.",
 "excerpt": "Una cena de aniversario se arruina por detalles logísticos, no por la comida. Qué mesa pedir, a qué hora llegar y qué ordenar para que salga bien.",
 "bloques": [
   "Las cenas de aniversario que salen mal casi nunca fallan por la comida. Fallan porque tocó una mesa junto a la cocina, porque llegaron media hora tarde y se perdieron el atardecer, o porque el plato elegido tardó cuarenta minutos y mató la conversación.",
   "Todo eso se evita en el momento de reservar. Esto es lo que conviene resolver antes.",

   {"h2": "La mesa: pide específicamente"},
   "«Una mesa para dos» es una reserva; «una mesa para dos en el borde, con vista» es un plan. En cualquier restaurante con vista, las mesas no son equivalentes y quien no especifica recibe la que sobra.",
   {"ul": [
     "<strong>En el borde o junto al vidrio.</strong> Es lo que fuiste a buscar y son pocas.",
     "<strong>Lejos del paso a cocina y baños.</strong> Detalle pequeño, diferencia grande en dos horas.",
     "<strong>Si hay música en vivo, decide.</strong> Cerca si quieren ambiente, lejos si quieren conversar. Los viernes y sábados suele haber desde las 21:00.",
     "<strong>Bajo techo si hay riesgo de lluvia.</strong> De enero a abril, conviene preguntarlo.",
   ]},

   {"h2": "La hora, con el dato que decide todo"},
   "El sol se pone entre las 18:15 y las 18:40 durante todo el año en Manta. No cambia con la estación, porque estamos sobre la línea ecuatorial. Es el único dato de esta ciudad que se puede agendar con meses de anticipación.",
   "Para una cena de aniversario, la secuencia que mejor funciona es llegar a las 17:45, tomar algo mientras cae el sol, y pedir la comida hacia las 19:15. Al revés —llegar a las siete y media— la comida sale bien pero el momento ya pasó.",
   {"quote": "La reserva perfecta para aniversario es a las seis menos cuarto. Se sientan, ven caer el sol con un trago, la terraza está tranquila todavía y a las siete y media, cuando piden la cena, ya se relajaron. Los que llegan a las ocho comen igual de bien pero vieron la mitad.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Qué pedir, y qué no"},
   f"La regla para una cena de conversación: evitar los platos que exigen trabajo. Un marisco con caparazón o algo que haya que desarmar rompe el ritmo. Los platos que funcionan bien son los que se comen sin pensar en cómo comerlos.",
   {"tabla": [["Momento", "Qué funciona", "Precio"], [
     ["Para empezar", "Tartar de atún rojo sobre aguacate", "$11,50"],
     ["Para empezar, compartido", "Salmón y atún rojo con aguacate", "$12,60"],
     ["Fuerte, si comen carne", "Ribeye 300 g o bife de chorizo", "$17,60"],
     ["Fuerte, para compartir", "Bife doble 450 g", "$21,50"],
     ["Fuerte, algo local", "Viche mixto", "$9,80"],
     ["Para brindar", "Botella de vino", "desde $30"],
   ]]},
   f"El bife doble de 450 gramos alcanza cómodamente para dos con una ensalada, lo cual deja espacio para entrada y postre sin que la cuenta se dispare. Toda la carta está en el {link(MENU, 'menú')}.",

   {"h2": "Cuánto calcular"},
   "Con el 10 % de servicio de ley incluido, una cena de aniversario para dos en un rooftop de Manta sale entre $70 y $95: entrada compartida, un fuerte cada uno o uno grande para compartir, y bebida. Si añaden botella de vino, súmenle $33 con el servicio.",
   "Es el rango alto de la ciudad. Un plan equivalente en una marisquería del malecón Murciélago sale entre $30 y $45 para dos, sin vista panorámica y con otro tipo de servicio.",

   {"h2": "Si prefieren almuerzo en vez de cena"},
   f"Es una opción que casi nadie considera y que funciona muy bien: el mediodía tiene la misma vista, mucha menos gente y precios bastante más bajos. El {link(MENU_ALMUERZO, 'menú de almuerzo')} corre de 11:00 a 16:00, con pescado a la plancha en $8,90 y pollo en $8,50.",
   "Para una pareja que quiere celebrar sin la formalidad de la cena, o que tiene planes en la noche, un almuerzo largo con vista al Pacífico resuelve bien. La diferencia de precio para dos, entre almorzar y cenar, ronda los $40.",

   {"h2": "El detalle del clima"},
   "Manta tiene dos estaciones y cambian la noche. De enero a abril hace calor y humedad, con lluvia fuerte y corta a media tarde que casi siempre ya pasó a la hora de cenar. De junio a septiembre los días son más frescos y grises, pero los atardeceres se ponen espectaculares porque hay nubes para que la luz pegue.",
   "En los meses frescos, la brisa del Pacífico después de las seis de la tarde se siente de verdad en una terraza abierta. Un buzo ligero convierte una cena incómoda en una cómoda, y es el consejo que más agradecen quienes vienen de Guayaquil o de la sierra sin esperarlo.",

   {"h2": "Qué evitar"},
   {"ul": [
     "<strong>Las fechas cargadas.</strong> 14 de febrero, 31 de diciembre y feriados largos son fiesta masiva, no cena íntima. Si el aniversario cae ahí, mover la celebración un día suele mejorarla.",
     "<strong>Estrenar sitio en la fecha importante.</strong> Descubrir un lugar nuevo es entretenido cualquier otro día; en el aniversario conviene lo conocido.",
     "<strong>Reservar sin especificar.</strong> Ya lo dijimos y es lo que más falla: una mesa cualquiera un viernes a las nueve no es un plan.",
     "<strong>La sobremesa infinita en noche de música.</strong> Los viernes y sábados hay música en vivo desde las 21:00. Si buscan conversar, mejor cenar antes o elegir otro día.",
   ]},

   {"h2": "Los detalles que sí se agradecen"},
   {"ul": [
     "<strong>Avisar que es aniversario al reservar.</strong> Casi siempre sale un postre con dedicatoria, y no cuesta nada pedirlo.",
     "<strong>Llegar antes que la otra persona</strong> si es sorpresa, para dejar todo hablado con el equipo.",
     "<strong>Pedir la cuenta discretamente</strong> antes del postre, si la intención es que no la vea.",
     "<strong>Un buzo ligero.</strong> De junio a septiembre la brisa del Pacífico refresca de verdad después de las seis.",
   ]},
   {"faq": [
     ("¿Hay que reservar para dos personas?",
      "Entre semana no suele hacer falta. Para una mesa con vista un viernes o sábado, sí — son pocas y se van primero. Un mensaje el mismo día suele bastar."),
     ("¿Se puede pedir algo especial, como flores en la mesa?",
      "Depende del restaurante. Lo habitual es que acepten que lleves algo pequeño y lo coloquen antes de que lleguen. Se acuerda al reservar, no en el momento."),
     ("¿Cuál es la mejor noche para ir?",
      "Jueves y domingo son las más tranquilas con la terraza igual de bonita. Viernes y sábado hay más ambiente y música en vivo, pero también más ruido."),
     ("¿Cuánto dura una cena así?",
      "Entre hora y media y dos horas si llegan al atardecer y piden a las siete y media. Nadie va a apurarlos, pero conviene saberlo si tienen algo después."),
     ("¿Conviene pedir postre o cambiar de sitio?",
      "Si la conversación va bien, quedarse. Cambiar de lugar a media noche rompe el ritmo y en Manta las cocinas cierran temprano, así que la alternativa suele ser un bar sin comida. El postre con un café sale más barato que empezar de nuevo en otro lado."),
   ]},
   f'¿Van a celebrar? <a href="{wa("Hola, quiero reservar una cena de aniversario en Luuma")}">Escríbenos por WhatsApp</a> con la fecha y te apartamos una mesa en el borde, además de la hora exacta del atardecer para ese día.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
