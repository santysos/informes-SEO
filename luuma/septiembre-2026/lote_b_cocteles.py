#!/usr/bin/env python3
"""Bloque B · coctelería (3 posts) + Bloque G · La Quadra (1 post).

Datos que ordenan estos temas (Search Console, 21-may a 18-ago 2026):
  · Bebidas y coctelería → 2.275 impresiones, CTR 1,98 %, posición 4,9 (el mejor
    CTR de los clusters grandes: ya rankeamos bien, conviene profundizar)
  · «la quadra manta»    →   685 impresiones, 5 clics — y es la plaza donde está el local

Dirección confirmada por el cliente: Plaza La Quadra, redondel de Barbasquillo, 130214 Manta.
"""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, link, wa, guarda

POSTS = []

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cócteles con ron ecuatoriano: cuáles pedir y por qué",
 "slug": "cocteles-ron-ecuatoriano-cuales-pedir",
 "date": "2026-09-16T17:00:00",
 "cat": CAT["cocteles"],
 "tags": ["ron ecuatoriano", "cócteles", "mixología", "manta"],
 "focus_kw": "cócteles con ron ecuatoriano",
 "yoast_title": "Cócteles con ron ecuatoriano: cuáles pedir",
 "yoast_desc": "Que el ron sea ecuatoriano no lo hace mejor ni peor: lo hace distinto. Que cocteles funcionan con el, en cuales se queda corto y precios reales en Manta.",
 "excerpt": "Ecuador produce ron desde hace más de un siglo y casi nadie lo pide. Cuáles son, en qué se diferencian del cubano y qué cóctel le queda bien a cada uno.",
 "bloques": [
   "Ecuador produce caña de azúcar desde la colonia y ron desde hace más de un siglo, pero en la mayoría de barras del país se pide ron cubano o venezolano por costumbre. La pregunta razonable es si el ron ecuatoriano da la talla, y la respuesta corta es que en algunos cócteles sí y en otros no.",
   "Esto es lo que hemos aprendido sirviéndolos en la barra: qué rones se consiguen aquí, en qué se diferencian de los importados y qué trago le queda bien a cada uno.",

   {"h2": "Qué ron se produce en Ecuador"},
   "La caña se cultiva sobre todo en la cuenca del Guayas y en los valles cálidos del interior. De ahí salen dos familias distintas que conviene no confundir.",
   {"ul": [
     "<strong>Rones blancos jóvenes.</strong> Poco tiempo en barrica, perfil limpio y algo dulce. Son los que se usan para mezclar y los que mejor precio tienen.",
     "<strong>Rones añejos.</strong> Entre cuatro y doce años, con más madera y notas de vainilla y caramelo. Se acercan al perfil dominicano más que al cubano.",
     "<strong>Aguardiente de caña.</strong> No es ron aunque comparta materia prima. Es otra bebida, con otro uso, y confundirlos arruina un trago.",
   ]},

   {"h2": "En qué se diferencia del cubano"},
   "El ron cubano de mezcla es seco y ligero: está diseñado para desaparecer detrás del lima y la hierbabuena de un mojito. El ron ecuatoriano joven suele traer más azúcar residual y un perfil un poco más redondo.",
   "Eso tiene una consecuencia práctica en la barra: si preparas un mojito con ron ecuatoriano usando la misma cantidad de azúcar, sale empalagoso. Hay que bajar el jarabe. La misma característica que estorba en un mojito es la que funciona a favor en un daiquiri de fruta, donde el cuerpo extra sostiene la acidez.",
   {"quote": "Con ron ecuatoriano bajamos el jarabe casi a la mitad. Nos costó unas cuantas pruebas entenderlo. La gente decía que el trago estaba dulce y culpaba a la fruta, cuando el azúcar venía del ron.",
    "cite": "Equipo de barra de Luuma Rooftop"},

   {"h2": "Los tres cócteles que sí funcionan"},
   {"h3": "Daiquiri de fruta"},
   f"El mejor destino para un ron blanco ecuatoriano. La acidez del maracuyá o del limón corta el dulzor y el cuerpo del ron sostiene la fruta sin quedar aguado. En nuestra carta el daiquiri clásico está en $9,70 y la versión con maracuyá, fresa, coco o durazno en $10,45 — puedes verla completa en la {link(BEBIDAS, 'carta de bebidas')}.",
   {"h3": "Caipirinha, aunque no sea lo ortodoxo"},
   "La caipirinha se hace con cachaça, que es otro destilado. Pero un ron blanco joven da un resultado muy parecido y en la costa ecuatoriana es lo que se toma. Clásica $8,90, con maracuyá o guayaba $9,95.",
   {"h3": "Ron con agua de coco"},
   "El trago más simple de esta lista y el que más se pide en la playa. Dos onzas de ron blanco, agua de coco fría, hielo y limón. No necesita bartender ni carta: necesita coco bueno.",

   {"h2": "Los dos donde el ron ecuatoriano se queda corto"},
   "El mojito clásico es el primero. Necesita un ron seco que se esconda; el ecuatoriano se hace notar y compite con la hierbabuena. Se puede corregir bajando azúcar, pero pidiendo un mojito de referencia, el cubano gana. El nuestro va con Bacardí por esa razón, a $9,20.",
   "El segundo es cualquier cóctel de ron añejo servido solo con hielo, tipo old fashioned. Los añejos ecuatorianos son correctos pero no tienen la complejidad de un guatemalteco o un panameño de la misma gama de precio. Si vas a tomar el ron sin mezclar, hay mejores opciones.",

   {"h2": "Qué pedir según lo que te guste"},
   {"tabla": [["Si te gusta…", "Pide", "Precio"], [
     ["Ácido y refrescante", "Daiquiri clásico", "$9,70"],
     ["Fruta tropical", "Daiquiri de maracuyá", "$10,45"],
     ["Algo simple y fresco", "Caipirinha clásica", "$8,90"],
     ["Dulce y frutal", "Caipirinha de guayaba", "$9,95"],
     ["Mojito de verdad", "Mojito clásico (ron cubano)", "$9,20"],
     ["Nada dulce", "Paloma", "$8,60"],
   ]]},

   {"h2": "Cómo saber si la barra sabe lo que hace"},
   {"ul": [
     "<strong>Te preguntan qué tan dulce lo quieres.</strong> Es la señal de que ajustan el jarabe y no siguen una receta fija.",
     "<strong>El hielo es sólido y grande.</strong> El hielo pequeño y turbio se derrite en dos minutos y te deja un trago aguado.",
     "<strong>La hierbabuena se golpea, no se machaca.</strong> Machacarla suelta la clorofila y amarga el trago.",
     "<strong>Tarda más de noventa segundos.</strong> Un cóctel que llega instantáneo salió de una mezcla premezclada.",
   ]},

   {"h2": "Dónde se consigue en Manabí"},
   "En Manta, los supermercados grandes tienen dos o tres marcas nacionales de ron blanco y alguna añeja. Las licorerías del centro y de Tarqui manejan más variedad y mejor precio, aunque hay que saber qué se busca: la rotación es alta y el surtido cambia.",
   "En las barras de la ciudad el panorama es desigual. En la zona de La Quadra, en el redondel de Barbasquillo, y en la av. Flavio Reyes se consigue coctelería con ron nacional bien tratado. En el malecón Murciélago predomina el ron importado de mezcla, que para un mojito rápido cumple sin más.",

   {"h2": "Con qué acompañarlo"},
   f"Un daiquiri de maracuyá antes de la cena funciona mejor que después: la acidez abre el apetito y no compite con el plato. Si vas a pedir ceviche o algo de mar, un trago ácido y sin dulce le queda mejor que uno frutal. Con carne — el ribeye de 300 gramos está en $17,60 en el {link(MENU, 'menú de la noche')} — conviene irse a cerveza o a vino tinto.",
   "El orden que recomendamos en la barra: empezar frutal y ácido, y bajar a algo más seco a medida que avanza la noche. Al revés, todo sabe a azúcar.",
   {"faq": [
     ("¿El ron ecuatoriano es más barato que el importado?",
      "Sí, entre un 20 % y un 40 % según la gama, porque no paga aranceles de importación. En cóctel mezclado la diferencia de calidad se nota poco; tomado solo, se nota más."),
     ("¿Qué diferencia hay entre ron y aguardiente de caña?",
      "El ron se añeja en barrica y se filtra; el aguardiente sale del alambique con mucho menos proceso. Comparten materia prima y poco más. En cóctel no son intercambiables."),
     ("¿Se puede pedir un cóctel menos dulce?",
      "Siempre, y en cualquier barra seria. Pedir «con menos jarabe» o «bien seco» es normal. Si la respuesta es que no se puede, el trago viene premezclado."),
     ("¿Cuál es el cóctel más pedido en la costa?",
      "En Manta, la caipirinha y el daiquiri de fruta, por el calor. El mojito domina en las ciudades de sierra, donde la hierbabuena rinde distinto."),
   ]},
   f'¿Quieres probar la ronda completa? <a href="{wa("Hola, quiero reservar mesa en Luuma para el atardecer")}">Escríbenos por WhatsApp</a> y reserva mesa en el borde: el atardecer sobre el Pacífico cae entre 18:15 y 18:40 todo el año, y esas mesas se llenan primero.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Qué tomar en un rooftop cuando no te gusta lo dulce",
 "slug": "que-tomar-rooftop-sin-dulce",
 "date": "2026-09-19T17:00:00",
 "cat": CAT["cocteles"],
 "tags": ["cócteles secos", "mixología", "manta", "rooftop"],
 "focus_kw": "cócteles no dulces",
 "yoast_title": "Cócteles sin dulce: qué pedir en un rooftop",
 "yoast_desc": "Casi toda carta de coctel en la costa es dulce. Que pedir si no te gusta el azucar, como decirlo en la barra y que opciones funcionan de verdad.",
 "excerpt": "Casi toda la coctelería de playa está construida sobre fruta y azúcar. Si eso no es lo tuyo, hay salida — y no es pedir siempre lo mismo.",
 "bloques": [
   "Hay un tipo de cliente que llega a una barra de playa y se rinde de antemano: pide una cerveza porque asume que todos los cócteles van a estar dulces. Casi siempre tiene razón, y es una lástima, porque la solución es más simple de lo que parece.",
   "La coctelería de costa se construye sobre fruta tropical y jarabe porque es lo que se vende con el calor. Pero cualquier barra decente puede darte algo seco si sabes cómo pedirlo. Esto es lo que funciona.",

   {"h2": "Por qué todo está dulce en la costa"},
   "Tres razones, y ninguna es descuido. El azúcar equilibra el alcohol y hace que un trago fuerte entre más fácil con calor. La fruta local — maracuyá, guayaba, coco — es barata, buena y ya viene dulce. Y el cliente promedio de playa pide dulce, así que la carta se construye para él.",
   "El resultado es que en una carta de veinte cócteles puede haber tres que no lleven azúcar añadida. Están, pero hay que saber cuáles son.",

   {"h2": "Las cuatro que casi siempre funcionan"},
   {"h3": "Paloma"},
   f"Tequila, jugo de toronja y soda. La toronja es amarga por naturaleza y no necesita ayuda. Es el trago más confiable de esta lista y en nuestra {link(BEBIDAS, 'carta')} está en $8,60. Si la barra la hace con toronja de verdad y no con gaseosa de toronja, es excelente.",
   {"h3": "Gin tonic bien armado"},
   "El gin tonic es seco por definición, pero la tónica sí lleva azúcar. Pedir una tónica seca o baja en azúcar cambia el trago por completo. Nuestro gin con frutos rojos está en $13,60; si lo quieres sin la parte frutal, se puede pedir el gin solo con tónica.",
   {"h3": "Daiquiri clásico, sin la versión de fruta"},
   "Mucha gente asume que el daiquiri es dulce porque conoce la versión frozen de fresa. El clásico es ron, limón y una cantidad mínima de azúcar: es de los tragos más secos que existen. En carta a $9,70.",
   {"h3": "Margarita sin el borde de azúcar"},
   "La margarita clásica — tequila, triple sec, limón — es ácida, no dulce. Lo que la vuelve empalagosa suele ser el mix comercial. Pedida con limón fresco y a $9,80, es una opción perfectamente seca.",

   {"h2": "Cómo pedirlo para que te entiendan"},
   "«Que no sea dulce» es demasiado vago y cada bartender lo interpreta distinto. Estas frases funcionan mejor:",
   {"ul": [
     "<strong>«Con la mitad del jarabe».</strong> Concreto, ejecutable, no discutible.",
     "<strong>«Seco, por favor»</strong> — término que se entiende en cualquier barra.",
     "<strong>«Sin fruta, sin sirope»</strong>, si quieres asegurarte del todo.",
     "<strong>«¿Cuál de la carta es el menos dulce?»</strong> — la mejor pregunta, porque el bartender conoce sus propias recetas.",
   ]},
   {"quote": "Cuando alguien nos dice que no le gusta lo dulce, lo primero que preguntamos es si le gusta lo amargo o lo ácido, porque no es lo mismo. Al que le gusta lo amargo le damos algo con toronja. Al que le gusta lo ácido, un daiquiri clásico. Si se los cambias, ninguno queda contento.",
    "cite": "Equipo de barra de Luuma Rooftop"},

   {"h2": "Ácido no es lo mismo que amargo"},
   "Es la distinción que más se confunde y la que decide el trago. El ácido viene del cítrico: limón, lima, maracuyá sin azúcar. Es refrescante y abre el apetito. El amargo viene de la toronja, de la tónica o de los bitters, y es más denso; funciona mejor como aperitivo o después de comer.",
   {"tabla": [["Si prefieres…", "Pide", "Precio"], [
     ["Ácido y limpio", "Daiquiri clásico", "$9,70"],
     ["Ácido con estructura", "Margarita clásica", "$9,80"],
     ["Amargo y refrescante", "Paloma", "$8,60"],
     ["Amargo y seco", "Gin tonic", "$13,60"],
     ["Ni una cosa ni otra", "Cerveza de la casa", "$6,00"],
   ]]},

   {"h2": "El calor cambia lo que te apetece"},
   "Hay un factor que casi nadie considera al elegir trago en la costa: a 30 grados con humedad, el paladar pide ácido y salado antes que dulce. Es la misma razón por la que el ceviche funciona a mediodía y un postre pesado no.",
   "En Manta esto se nota por horario. A las cuatro de la tarde, con el sol todavía alto, un trago dulce cansa a la mitad del vaso. A las nueve de la noche, ya con la brisa del Pacífico entrando, el mismo trago se disfruta. Si vas a llegar temprano al malecón Murciélago o a la zona de Barbasquillo, empieza por lo seco.",

   {"h2": "Los tres errores de quien pide seco"},
   "El primero es pedir el trago «sin azúcar» creyendo que va a saber igual pero menos dulce. No funciona así: el azúcar equilibra el alcohol, y un cóctel sin nada de jarabe sabe crudo. Pedir la mitad casi siempre da mejor resultado que pedir cero.",
   "El segundo es asumir que un destilado premium arregla el problema. Un gin caro en una tónica azucarada sigue siendo un trago dulce; lo que hay que cambiar es la tónica, no el gin. Pagar el doble por la botella no mejora nada si el mezclador es el mismo.",
   "El tercero es pedir siempre lo mismo por miedo a equivocarse. Si vas a estar dos horas en una barra, la primera ronda es el momento de preguntar. Un bartender que conoce su carta te ubica en treinta segundos, y esa conversación vale más que leer veinte descripciones.",

   {"h2": "La opción que nadie considera"},
   f"Si de verdad nada de la carta te convence, el vino por copa es la salida honesta. Un tinto seco funciona mejor con carne — el bife de chorizo de 300 gramos está en $17,60 en el {link(MENU, 'menú')} — que cualquier cóctel de la lista.",
   "Y una advertencia sobre las cervezas artesanales que se han puesto de moda: varias IPA locales son notablemente dulces bajo el amargor del lúpulo. Si buscas algo seco de verdad, una lager simple cumple mejor. La de la casa está en $6.",
   {"faq": [
     ("¿Puedo pedir un cóctel sin azúcar del todo?",
      "En la mayoría de los casos sí, pero cambia el equilibrio: el azúcar endulza pero además suaviza el alcohol. Un daiquiri sin nada de azúcar sabe más fuerte, además de menos dulce. Pedir la mitad suele ser mejor idea que pedir cero."),
     ("¿Los cócteles frozen son más dulces?",
      "Sí, casi siempre. El hielo triturado diluye el sabor y se compensa con más azúcar. Si te importa el dulzor, pide el trago servido sobre hielo en lugar de frozen."),
     ("¿El mojito es dulce?",
      "Bastante, aunque no lo parezca por la hierbabuena. Lleva jarabe y gaseosa. Se puede pedir con menos de ambos y queda mucho más seco."),
     ("¿Qué cóctel va mejor con mariscos?",
      "Algo ácido y sin fruta dulce: daiquiri clásico o margarita. El maracuyá y el coco chocan con el ceviche y con el pescado a la plancha."),
   ]},
   f'Si quieres que la barra te arme algo a tu gusto, <a href="{wa("Hola, quiero reservar mesa en Luuma. No me gustan los cocteles dulces")}">avísanos por WhatsApp</a> al reservar — llegar con eso dicho ahorra la primera ronda de prueba y error.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "La Quadra en Manta: qué hay en la plaza y cómo moverse",
 "slug": "la-quadra-manta-que-hay-como-moverse",
 "date": "2026-09-22T17:00:00",
 "cat": CAT["vida"],
 "tags": ["la quadra", "barbasquillo", "manta", "dónde comer"],
 "focus_kw": "la quadra manta",
 "yoast_title": "La Quadra Manta: qué hay y cómo llegar",
 "yoast_desc": "La Quadra esta en el redondel de Barbasquillo y concentra la oferta gastronomica nueva de Manta. Que hay, como llegar, donde parquear y a que hora ir.",
 "excerpt": "La Quadra concentra buena parte de lo que abrió en Manta en los últimos años. Dónde queda exactamente, cómo llegar, dónde parquear y a qué hora conviene ir.",
 "bloques": [
   "Si alguien en Manta te dice «nos vemos en La Quadra», se refiere a la plaza gastronómica del redondel de Barbasquillo, en el extremo oeste de la ciudad. Es donde se concentra buena parte de lo que abrió en los últimos años, y la referencia que más se usa para quedar a cenar.",
   "Esta guía es de quien trabaja ahí adentro: dónde queda exactamente, cómo llegar, dónde dejar el carro y a qué hora conviene aparecer según lo que vayas a hacer.",

   {"h2": "Dónde queda exactamente"},
   "La dirección completa es <strong>Plaza La Quadra, redondel de Barbasquillo, 130214 Manta</strong>. El redondel es un punto de referencia que cualquier taxista conoce sin más explicación; la plaza está sobre él.",
   "La confusión habitual es ubicarla en la av. Flavio Reyes, que es la otra zona gastronómica de la ciudad y queda más al este. Son sitios distintos y separados por unos minutos en carro. Si vas a pedir un taxi, decir «redondel de Barbasquillo» evita el malentendido.",
   {"ul": [
     "<strong>Desde Playa Murciélago:</strong> 5 minutos en carro, $2 a $4 en taxi.",
     "<strong>Desde el centro o el puerto:</strong> 10 a 15 minutos, $3 a $5.",
     "<strong>Desde el aeropuerto:</strong> 15 a 20 minutos, $5 a $8.",
     "<strong>Caminando desde el malecón:</strong> se puede, unos 20 minutos, pero de noche es mejor el taxi.",
   ]},

   {"h2": "Qué tipo de sitio es"},
   "La Quadra es una plaza con locales alrededor de un espacio común, no un centro comercial cerrado. Eso cambia la experiencia: hay aire libre, la gente circula entre locales y se puede tomar algo en un lado y cenar en otro sin que nadie se moleste.",
   "La mezcla va de comida rápida buena a restaurantes con carta trabajada, y hay al menos un rooftop — el nuestro — con vista al Pacífico. Los precios varían mucho según dónde te sientes: se puede comer por $8 o por $30 en la misma plaza.",
   {"quote": "Lo que más nos preguntan es si hay que reservar en toda La Quadra. La respuesta es no: en la mayoría llegas y te sientas. Donde sí conviene reservar es arriba, en las mesas del borde, y solo para el atardecer. Ese cuarto de hora se llena.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "A qué hora ir según el plan"},
   {"tabla": [["Plan", "Hora", "Nota"], [
     ["Almuerzo tranquilo", "12:00 – 14:00", "Entre semana está vacío y se come rápido"],
     ["Café o trabajo", "15:00 – 17:00", "La hora más muerta, mesas de sobra"],
     ["Atardecer", "17:45 – 18:40", "Llegar antes de las 18:00 por la mesa"],
     ["Cena", "19:30 – 21:30", "Viernes y sábado se llena desde las 20:00"],
     ["Copas", "21:00 en adelante", "Jueves a sábado; domingo baja mucho"],
   ]]},
   f"El dato que ordena todo lo demás: el sol se pone entre las 18:15 y las 18:40 durante todo el año, porque Manta está prácticamente sobre la línea ecuatorial. No cambia con la estación. Es lo único de esta ciudad que se puede agendar con meses de anticipación.",

   {"h2": "Parqueo, que es la pregunta real"},
   "Hay parqueo en la zona del redondel y suele alcanzar entre semana. Viernes y sábado a partir de las ocho de la noche se complica, y la costumbre local es dejar el carro en las calles laterales y caminar un par de cuadras.",
   "Si vas en grupo grande, lo práctico es llegar en dos carros temprano o directamente en taxi. Un viaje ida y vuelta desde cualquier punto de la ciudad sale más barato que la molestia de dar vueltas buscando espacio.",

   {"h2": "Qué se come, por rango de precio"},
   {"ul": [
     f"<strong>$8 a $11 — almuerzo.</strong> Entre las 11:00 y las 16:00 se sirven almuerzos. En nuestro {link(MENU_ALMUERZO, 'menú de almuerzo')} el pescado a la plancha —wahoo o albacora— está en $8,90 y el pollo en $8,50, ambos con arroz y ensalada.",
     "<strong>$9 a $13 — comida manabita.</strong> El viche mixto, con camarón y pescado, está en $9,80. Es el plato que hay que probar si es tu primera vez en la provincia.",
     f"<strong>$10 a $13 — crudos y sushi.</strong> El tartar de atún rojo en $11,50 y el salmón con atún y aguacate en $12,60, dentro del {link(MENU, 'menú de la noche')}.",
     "<strong>$15 a $22 — carnes.</strong> Pechuga $14,80, ribeye o bife de chorizo de 300 gramos $17,60, bife doble de 450 gramos y lomo de la casa $21,50 y $21,95.",
     "<strong>$6 a $14 — bebidas.</strong> Cerveza de la casa $6, cócteles entre $8,60 y $13,60.",
   ]},

   {"h2": "Qué hay alrededor"},
   "La plaza no está aislada: el redondel de Barbasquillo es una de las zonas que más ha crecido en Manta y alrededor hay hotelería, edificios residenciales y acceso rápido a la salida sur de la ciudad.",
   {"ul": [
     "<strong>Playa Barbasquillo</strong>, a pocos minutos, más tranquila que Murciélago y con menos vendedores.",
     "<strong>Playa Murciélago y el malecón</strong>, a cinco minutos en carro, con la oferta más turística.",
     "<strong>Santa Marianita</strong>, la playa de kitesurf, a 25 minutos por la vía costera.",
     "<strong>Montecristi</strong>, donde se tejen los sombreros de paja toquilla, a 20 minutos hacia el interior.",
   ]},
   "Esa combinación es la que hace que la plaza funcione tanto para quien vive en Manta como para el visitante que se hospeda cerca del malecón y sube a cenar.",

   {"h2": "Tres cosas que conviene saber antes"},
   "La primera: la brisa. Estás sobre el Pacífico y desde junio a septiembre, en cuanto cae el sol, refresca de verdad. Un buzo ligero cambia la noche, sobre todo si te sientas en el borde.",
   "La segunda: los lunes. Buena parte de la plaza cierra o trabaja con horario corto. Es el día más tranquilo de la semana en toda la ciudad, y no pasa únicamente aquí.",
   "La tercera: si vienes por el atardecer y no reservaste, llega a las 17:30 y toma algo mientras esperas. A las 18:10 ya no hay mesa con vista, y el momento dura quince minutos.",
   {"faq": [
     ("¿La Quadra está en la av. Flavio Reyes?",
      "No. La Quadra está en el redondel de Barbasquillo, al oeste de la ciudad. La av. Flavio Reyes es otra zona gastronómica, distinta y separada. Es una confusión frecuente al pedir taxi."),
     ("¿Hay que reservar?",
      "En la mayoría de locales no. Sí conviene para las mesas con vista al atardecer los viernes, sábados y domingos, y para grupos de más de seis personas cualquier día."),
     ("¿Es apto para ir con niños?",
      "Sí. Al ser una plaza abierta, los niños circulan sin problema y varios locales tienen menú infantil. A partir de las diez de la noche el ambiente se vuelve más de adultos."),
     ("¿Cuánto cuesta cenar en La Quadra?",
      "Entre $12 y $35 por persona según dónde te sientes y si tomas cóctel. Un almuerzo entre semana baja a $8,50-$9."),
     ("¿Cómo llego si no tengo carro?",
      "Taxi desde cualquier punto de Manta cuesta entre $2 y $5 y toma menos de quince minutos. Las apps de transporte funcionan bien en la ciudad."),
   ]},
   f'¿Vienes por el atardecer? <a href="{wa("Hola, quiero reservar una mesa con vista en Luuma, en La Quadra")}">Reserva por WhatsApp</a> y te confirmamos la hora exacta del atardecer para ese día.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
