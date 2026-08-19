#!/usr/bin/env python3
"""Bloque C · sushi (2 posts) + Bloque E · desayuno y brunch (2 posts).

  · Sushi e internacional → 2.043 impresiones, CTR 0,44 %. La página
    /gastronomia-manta/sushi-en-manta-ecuador/ tiene 2.823 impresiones y 6 clics.
    Hay demanda y no se está capturando.
  · Desayuno y brunch     → 1.180 impresiones, CTR 0,51 %.
"""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, link, wa, guarda

POSTS = []

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Sushi en Manta: qué pedir según lo que te guste",
 "slug": "sushi-en-manta-que-pedir",
 "date": "2026-10-01T17:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["sushi manta", "atún rojo", "pescado", "manta"],
 "focus_kw": "sushi en manta",
 "yoast_title": "Sushi en Manta: qué pedir según tu gusto",
 "yoast_desc": "Manta es puerto atunero, asi que el sushi de aqui parte con ventaja. Que pedir si te gusta el pescado limpio, lo cremoso o lo cocido, con precios.",
 "excerpt": "Manta descarga atún todos los días, así que el sushi de aquí parte con una ventaja que ningún restaurante de sierra tiene. Qué pedir según lo que te guste.",
 "bloques": [
   "Hay una ironía en comer sushi en Manta: la ciudad exporta atún de aleta amarilla a Japón desde hace décadas, pero el sushi llegó a las cartas locales bastante tarde. El pescado siempre estuvo; la costumbre de comerlo crudo al estilo japonés, no.",
   "Eso ha cambiado, y hoy el sushi es una de las categorías que más crece en la ciudad. Esta guía es para pedirlo bien: qué hay, qué pedir según tu gusto y en qué fijarte para saber si el pescado está a la altura del puerto.",

   {"h2": "La ventaja de comerlo en un puerto"},
   "El atún de aleta amarilla que se sirve como sashimi en Manta se descargó esa mañana o la anterior. No pasó por cadena de frío larga ni por distribuidor intermedio. Esa es la diferencia real con comerlo en Quito o Cuenca, donde el mismo pescado llega congelado después de un viaje.",
   "El congelado, dicho sea de paso, no es un defecto: para consumo crudo la normativa recomienda congelación previa por seguridad. Lo que cambia es la textura y el precio. En Manta, el atún rojo en carta cuesta entre $11,50 y $12,60; en la sierra, un plato equivalente puede costar el doble.",
   {"quote": "Los clientes de Quito prueban el atún y preguntan de dónde lo traemos, como si viniera de fuera. Viene de la bahía que están mirando. Ese es el chiste de comer crudo en un puerto.",
    "cite": "Equipo de cocina de Luuma Rooftop"},

   {"h2": "Qué pedir según lo que te guste"},
   {"h3": "Si te gusta el pescado limpio, sin adornos"},
   f"Sashimi o tartar. El tartar de atún rojo sobre base de aguacate está en $11,50 y el plato de salmón y atún rojo con aguacate fresco en $12,60, ambos en el {link(MENU, 'menú de la noche')}. Son los platos donde el pescado no tiene dónde esconderse: si está bueno, se nota; si no, también.",
   {"h3": "Si prefieres algo cremoso"},
   "Los rolls con queso crema son la puerta de entrada de mucha gente y no hay nada de malo en eso. El de salmón fresco con queso crema, aguacate y pepino está en $10,25, y el de kanikama con la misma base en $9,90.",
   {"h3": "Si no te gusta el pescado crudo"},
   "El kanikama —el surimi— es cocido, y buena parte de los rolls que lo llevan no tienen nada crudo. Es la opción para quien acompaña a un grupo y no quiere quedarse sin cenar. También funcionan los rolls tempurizados si el sitio los tiene.",
   {"h3": "Si quieres probar lo de aquí"},
   "Cualquier roll o tiradito que use pesca blanca local —wahoo, albacora, corvina— en lugar de salmón importado. El salmón en Ecuador siempre es de importación, casi siempre chileno. El pescado blanco es el de casa, y en un puerto es donde tiene sentido pedirlo.",

   {"h2": "Precios de referencia"},
   {"tabla": [["Plato", "Precio"], [
     ["Roll de kanikama con queso crema", "$9,90"],
     ["Roll de salmón con queso crema y aguacate", "$10,25"],
     ["Tartar de atún rojo sobre aguacate", "$11,50"],
     ["Salmón y atún rojo con aguacate", "$12,60"],
   ]]},
   "Como referencia general de la ciudad: un roll estándar en Manta va de $8 a $13, y un plato de crudos entre $11 y $16. Por encima de eso se paga ubicación o presentación, no necesariamente mejor pescado.",

   {"h2": "Cinco señales de que el pescado está bien"},
   {"ul": [
     "<strong>El atún es rojo intenso, no marrón ni rosado pálido.</strong> El marrón indica oxidación por tiempo.",
     "<strong>El corte tiene filo.</strong> Un sashimi bien cortado tiene aristas limpias; si se ve desgarrado, el cuchillo o la mano no eran los adecuados.",
     "<strong>No huele a nada fuerte.</strong> El pescado fresco huele a mar, no a pescado.",
     "<strong>El arroz está a temperatura ambiente, no frío de nevera.</strong> Es el detalle que más delata a una cocina apurada.",
     "<strong>El wasabi va aparte y en poca cantidad.</strong> Montañas de wasabi suelen tapar algo.",
   ]},

   {"h2": "Con qué acompañarlo"},
   f"El maridaje obvio es cerveza — la de la casa a $6 funciona bien porque no compite. Si vas a cóctel, la regla es evitar lo dulce: un daiquiri clásico a $9,70 o una paloma a $8,60 van mucho mejor con crudos que cualquier cosa con maracuyá o coco, que chocan de frente con el pescado. La carta completa está en {link(BEBIDAS, 'bebidas')}.",
   "El vino blanco seco es la otra opción segura, aunque en Ecuador el vino es importado y una botella arranca en $30. Para dos personas que van a comer crudos y poco más, sale más a cuenta la cerveza.",

   {"h2": "Los pescados locales que sí valen en crudo"},
   "El salmón domina las cartas por costumbre y porque el cliente lo reconoce, pero en un puerto atunero hay opciones mejores y más baratas.",
   {"ul": [
     "<strong>Atún de aleta amarilla.</strong> El producto estrella de Manta. Rojo intenso, textura firme, sabor pronunciado. Es lo que hay que pedir si solo vas a probar una cosa.",
     "<strong>Wahoo.</strong> Blanco, magro y de sabor limpio. Funciona muy bien en tiradito y en ceviche, menos en roll con salsas fuertes.",
     "<strong>Albacora.</strong> Más suave que el aleta amarilla y bastante más económico. Es el atún del almuerzo diario en la ciudad.",
     "<strong>Corvina.</strong> El pescado blanco clásico del ceviche ecuatoriano. En crudo estilo japonés se usa menos, pero aguanta bien.",
   ]},
   "La regla simple: si el sitio ofrece pesca blanca local del día, pídela. Es más fresca que el salmón por definición, porque no cruzó un continente para llegar.",

   {"h2": "Cuándo comerlo"},
   "Si el sushi es el plan principal, la noche funciona bien: el pescado del día ya está limpio y porcionado desde la mañana. Si vas a mediodía y quieres crudos, es todavía mejor.",
   f"Lo que no recomendamos es pedir crudos a última hora en un sitio vacío, aquí ni en ninguna parte. Y si el plan es almorzar algo más de la casa, el {link(MENU_ALMUERZO, 'menú de almuerzo')} tiene pescado a la plancha a $8,90, que es la otra forma —muy manabita— de comerse el mismo animal.",
   {"faq": [
     ("¿El salmón de Manta es local?",
      "No. El salmón no se produce en Ecuador; el que se sirve aquí es importado, en su mayoría de Chile. Lo local es el atún, el wahoo, la albacora y la corvina."),
     ("¿Es seguro comer pescado crudo en la costa?",
      "Sí, en sitios con rotación alta y manejo correcto de frío. En un puerto pesquero la frescura juega a favor. Como en cualquier parte del mundo, el riesgo está en el sitio, no en la ciudad."),
     ("¿Cuánto cuesta un sushi para dos en Manta?",
      "Entre $25 y $45 según cuántos rolls y si añaden crudos. Sumando dos bebidas, la cuenta ronda los $40-$60 con el 10 % de servicio incluido."),
     ("¿Hay opciones sin pescado?",
      "Sí, casi siempre hay rolls vegetarianos con aguacate y pepino, y platos con kanikama que es cocido. Conviene avisarlo al pedir si alguien del grupo no come crudo."),
   ]},
   f'¿Quieres crudos con vista al Pacífico? <a href="{wa("Hola, quiero reservar mesa en Luuma para probar los crudos")}">Reserva por WhatsApp</a> y avísanos si alguien del grupo no come pescado crudo: te armamos la mesa con opciones para todos.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Dónde desayunar en Manta con vista al mar",
 "slug": "donde-desayunar-manta-vista-al-mar",
 "date": "2026-10-04T09:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["desayuno manta", "bolón", "encebollado", "vista al mar"],
 "focus_kw": "desayunar en manta",
 "yoast_title": "Dónde desayunar en Manta con vista al mar",
 "yoast_desc": "El desayuno manabita es salado y temprano: bolon, encebollado, corviche. Donde comerlo con vista al mar en Manta, a que hora y cuanto cuesta.",
 "excerpt": "En Manabí se desayuna salado y temprano. Qué se come de verdad, dónde conseguirlo con vista al mar y por qué el encebollado se acaba antes del mediodía.",
 "bloques": [
   "El desayuno manabita desconcierta a quien llega de fuera. No hay pan con mantequilla ni cereal: hay sopa de pescado, plátano frito relleno de queso y fritura de verde con pescado adentro. Y se come temprano, entre siete y nueve de la mañana.",
   "Esta guía cubre qué se desayuna de verdad en Manta, dónde conseguirlo mirando al mar y a qué hora hay que levantarse para alcanzar lo bueno.",

   {"h2": "Qué se desayuna aquí"},
   {"ul": [
     "<strong>Bolón de verde.</strong> Bola de plátano verde majado con queso o chicharrón, frita. El desayuno más común de la costa, $2,50 a $4.",
     "<strong>Encebollado.</strong> Sopa de atún con yuca y cebolla encurtida. Es desayuno, no almuerzo, y es también el remedio nacional para la resaca. $3 a $6.",
     "<strong>Corviche.</strong> Fritura de plátano verde rellena de pescado. Uno o dos dólares en cualquier carreta.",
     "<strong>Tigrillo.</strong> Verde majado revuelto con huevo y queso. Más de sierra que de costa, pero se encuentra.",
     "<strong>Café pasado.</strong> Ecuador produce buen café y en la costa se toma cargado y con azúcar. Pedirlo sin azúcar es perfectamente normal.",
   ]},
   "Lo que casi no vas a encontrar es un desayuno dulce. Hay panaderías, sí, pero la comida de la mañana en Manabí es salada y sustanciosa porque históricamente se desayunaba antes de salir al mar o al campo.",

   {"h2": "El encebollado se acaba"},
   "Es la regla más importante de esta guía. Los sitios buenos de encebollado preparan una olla y cierran cuando se termina, normalmente entre las diez y las once de la mañana. No hay segunda tanda.",
   "Si el plan es desayunar encebollado, hay que estar allí antes de las nueve. A las once, lo que queda son los sitios que hacen encebollado todo el día — que no es lo mismo.",
   {"quote": "Nos preguntan por qué no servimos encebollado en la carta y la respuesta honesta es que el encebollado bueno se come a las ocho de la mañana en Tarqui, no a mediodía con mantel. Hay platos que pertenecen a un lugar y a una hora.",
    "cite": "Equipo de cocina de Luuma Rooftop"},

   {"h2": "Dónde, según lo que busques"},
   {"h3": "Con los pies en la arena"},
   "El malecón de Playa Murciélago tiene puestos y locales que abren temprano. La vista es directa al mar y el precio es de zona turística: un bolón que en Tarqui cuesta $2,50 aquí puede estar en $4. Se paga la ubicación.",
   {"h3": "Donde desayuna la ciudad"},
   "Tarqui y los alrededores del mercado son donde está el desayuno de verdad y donde se come mejor por menos. No hay vista al mar y las mesas son de plástico. A cambio, el encebollado es el que la gente de Manta considera bueno.",
   {"h3": "Con vista panorámica"},
   "La zona alta de Barbasquillo y La Quadra tiene vista abierta al Pacífico desde arriba, distinta a la del malecón. La oferta de mañana temprano ahí es menor: la mayoría de cocinas de esa zona abren hacia las once.",

   {"h2": "Precios de referencia"},
   {"tabla": [["Plato", "Tarqui / mercado", "Zona turística"], [
     ["Bolón de verde", "$2,50 – $3", "$3,50 – $4,50"],
     ["Encebollado", "$3 – $4,50", "$5 – $7"],
     ["Corviche", "$1 – $1,50", "$2 – $3"],
     ["Café", "$0,75 – $1,25", "$2 – $3,50"],
     ["Jugo natural", "$1,50 – $2", "$2,50 – $3,50"],
   ]]},

   {"h2": "El jugo, que merece párrafo aparte"},
   "Una de las mejores cosas del desayuno en la costa ecuatoriana no es un plato: es la jarra de jugo natural que llega con él. Cuesta entre $1,50 y $3, y las frutas no son las que uno espera si viene de fuera.",
   {"ul": [
     "<strong>Maracuyá.</strong> Ácido y potente. El más común y el que mejor despierta.",
     "<strong>Naranjilla.</strong> Entre cítrico y tomate verde; no existe fuera de esta región del mundo.",
     "<strong>Tomate de árbol.</strong> Suena raro y funciona: dulce, denso, con un fondo ácido.",
     "<strong>Guanábana.</strong> Cremoso, dulce, casi un postre líquido.",
     "<strong>Guayaba.</strong> Muy dulce; el favorito de los niños en toda la provincia.",
   ]},
   "Pedir un jugo de una fruta que no conoces es de las mejores decisiones disponibles en un desayuno manabita, y cuesta dos dólares equivocarse.",

   {"h2": "Qué hacer si te levantaste tarde"},
   f"Si pasaron las once, el desayuno ya no existe y empieza el almuerzo, que en Manabí arranca temprano. No es mala noticia: el {link(MENU_ALMUERZO, 'menú de almuerzo')} abre a las 11:00 y el pescado a la plancha con arroz y ensalada está en $8,90.",
   "La alternativa intermedia es el bolón, que se consigue prácticamente a cualquier hora en carretas y locales de barrio, y aguanta perfectamente como media mañana tardía.",

   {"h2": "Por qué se desayuna así"},
   "El desayuno manabita tiene una explicación práctica y no gastronómica. Los pescadores salen de madrugada y vuelven a media mañana; los agricultores empiezan con la luz. Ninguno de los dos oficios se sostiene con un café y una tostada.",
   "De ahí viene todo: el plátano verde, que llena y es barato; el pescado, que estaba a mano; y el caldo, que hidrata en un clima donde a las nueve de la mañana ya hace calor. No es una tradición decorativa, es una dieta de trabajo que se quedó.",
   "También explica el horario. En una ciudad donde la jornada empieza a las cinco, las once de la mañana ya es tarde para desayunar. El visitante que se levanta a las nueve llega al final de la función.",

   {"h2": "Cómo armar la mañana completa"},
   {"ol": [
     "07:00 — el mercado de Playita Mía con los barcos descargando. Es la hora buena y no hay otra.",
     "08:00 — encebollado o bolón ahí mismo o en Tarqui, donde la ciudad desayuna de verdad.",
     "09:30 — café y caminata por el malecón Murciélago, antes de que apriete el sol.",
     "11:00 — si todavía queda hambre, ya abrió el almuerzo y el pescado del día está fresco.",
   ]},

   {"h2": "Tres cosas que conviene saber"},
   {"ul": [
     "<strong>El café se pide «pasado» o «filtrado».</strong> Si pides solo «café» en algunos sitios te dan instantáneo.",
     "<strong>El jugo es natural casi siempre.</strong> Maracuyá, naranjilla, tomate de árbol, guanábana. $1,50 a $3 y de lo mejor que hay.",
     "<strong>Efectivo.</strong> Los sitios de desayuno de barrio rara vez aceptan tarjeta, y menos por $4.",
   ]},
   f"Y si el plan del día termina donde empezó, el atardecer sobre el Pacífico cae entre las 18:15 y las 18:40 todo el año. La {link(MENU, 'carta de la noche')} abre a las 16:00.",
   {"faq": [
     ("¿A qué hora abren los sitios de desayuno en Manta?",
      "Los de barrio y mercado, desde las seis o siete de la mañana. Los de zona turística, hacia las ocho. Los restaurantes con carta de almuerzo, a las once."),
     ("¿Qué es exactamente el bolón?",
      "Plátano verde cocido y majado, mezclado con queso o chicharrón, formado en bola y frito. Es contundente: uno solo puede ser suficiente desayuno."),
     ("¿Hay desayuno tipo americano en Manta?",
      "En hoteles sí, y en algunas cafeterías de la zona de Barbasquillo. Fuera de eso, el desayuno local es salado y de plátano."),
     ("¿El encebollado lleva pescado crudo?",
      "No. El atún va cocido en el caldo. Lo crudo es la cebolla encurtida en limón que va encima."),
   ]},
   f'Si vas a estar por Barbasquillo o La Quadra a media mañana, <a href="{wa("Hola, quiero consultar horarios de Luuma")}">escríbenos por WhatsApp</a> y te confirmamos horarios: la cocina abre a las 11:00 con el menú de almuerzo.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
