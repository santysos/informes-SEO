#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote H — cobertura local del norte del Ecuador (5 posts).

En Search Console, «autos ibarra» aparece en posición 26,7 y «carros usados
ibarra» en 35,1: hay demanda local y el sitio es invisible en ella. De 50 posts
publicados, el único lugar que se nombraba era Ibarra. Estos cinco abren
Otavalo, Atuntaqui, Cotacachi, Cayambe y Tulcán.

La categoría 46 «Seminuevos en Ibarra» existía sin usarse; este lote la activa.
"""
from comun import (CAT, CHECKLIST, ENTRADA, FICHA, IBARRA_GARANTIA, LISTADO,
                   PAPELES, PARTE_PAGO, PATIO, TRASPASO, guarda, link, wa)

CITA = "Equipo comercial de OKCars"


def cierre(ciudad, mensaje):
    return (f"Si estás en {ciudad} y querés ver alguno, escribinos al "
            f"{link(wa(mensaje), 'WhatsApp de OKCars')} y coordinamos la visita o la prueba "
            f"de manejo. El {link(LISTADO, 'listado completo está acá')}, con precio, año y "
            f"kilometraje de cada unidad.")


# ════════════════════════════════════════════════════════════════════════════
# 1 · Otavalo
# ════════════════════════════════════════════════════════════════════════════
otavalo = {
    "title": "Autos usados en Otavalo: dónde comprar con respaldo",
    "slug": "autos-usados-otavalo-donde-comprar",
    "date": "2026-11-11T09:00:00",
    "cat": CAT["ibarra"],
    "tags": ["autos usados Otavalo", "seminuevos Imbabura", "concesionario Otavalo",
             "comprar auto Otavalo", "OKCars"],
    "excerpt": "En Otavalo la compra de un auto usado se cierra casi siempre entre "
               "conocidos o por redes. Qué se gana y qué se arriesga con cada camino, y "
               "cuándo vale la pena subir los veinte minutos a Ibarra.",
    "yoast_title": "Autos usados en Otavalo: dónde comprar con respaldo",
    "yoast_desc": "Comprar entre conocidos, por redes o en un patio formal: qué se arriesga "
                  "en cada caso, qué revisar antes de pagar y dónde encontrar opciones con garantía.",
    "focus_kw": "autos usados otavalo",
    "bloques": [
        "En Otavalo la compra de un auto usado se resuelve casi siempre por dos vías: "
        "alguien conocido que vende el suyo, o una publicación en un grupo de Facebook. "
        "Las dos funcionan y las dos tienen un punto ciego.",

        "Este artículo no va a decirte que compres en un concesionario. Va a explicarte qué "
        "estás asumiendo en cada camino, para que la decisión sea tuya y con la "
        "información completa.",

        {"h2": "Comprar a un conocido"},

        "Es la forma más común y, en muchos sentidos, la mejor: sabés de dónde viene el "
        "auto, quién lo manejó y cómo lo cuidó. Esa información no la reemplaza ningún "
        "informe técnico.",

        "El problema aparece en la parte incómoda. Con un conocido cuesta pedir el "
        "certificado de gravámenes, cuesta llevar el auto a un mecánico ajeno y cuesta "
        "negociar el precio a la baja. Y cuando algo sale mal a los tres meses, cuesta "
        "todavía más reclamar.",

        "Nuestra recomendación es simple: tratá la compra entre conocidos con la misma "
        "formalidad que una entre desconocidos. Pedir papeles no es desconfiar, es "
        "ordenarse. Un vendedor que se ofende porque le pediste el certificado de "
        "gravámenes te está diciendo algo sin querer.",

        {"h2": "Comprar por redes"},

        "Los grupos de compraventa de Imbabura mueven mucho volumen y hay buenas "
        "oportunidades. También hay tres riesgos que se repiten:",

        {"ul": [
            "<strong>Vehículos que no son del vendedor.</strong> La matrícula está a nombre "
            "de un dueño anterior y la cadena de compraventas nunca se registró.",
            "<strong>Kilometraje alterado.</strong> Es más fácil de detectar de lo que "
            "parece: el desgaste del interior tiene que cuadrar con la cifra del tablero.",
            "<strong>Choques reparados sin declarar.</strong> Un chasis torcido no se "
            "arregla del todo y se nota en el desgaste desparejo de las llantas.",
        ]},

        f"Todo eso se verifica antes de pagar. Los puntos están en el "
        f"{link(CHECKLIST, 'checklist de 20 puntos')} y la parte documental en "
        f"{link(PAPELES, 'qué papeles pedir antes de comprar')}.",

        {"quote": "Nos llegan clientes de Otavalo que ya compraron y vienen a que les "
                  "revisemos qué compraron. A veces está bien y se van tranquilos. Otras "
                  "veces hay que darles una noticia fea. Preferiríamos verlos antes, aunque "
                  "terminen comprando en otro lado.",
         "cite": CITA},

        {"h2": "Los veinte minutos a Ibarra"},

        "Otavalo e Ibarra están a poco más de veinte minutos por la Panamericana. Esa "
        "cercanía hace que valga la pena mirar también lo que hay allá antes de decidir, "
        "aunque después compres en tu ciudad.",

        "Lo que aporta un patio formal no es el precio: es lo que viene con el vehículo.",

        {"ol": [
            "Papeles verificados antes de que el auto se publique: gravámenes, multas, "
            "impuestos y coincidencia de datos.",
            "Revisión técnica hecha, con los arreglos ya ejecutados.",
            "Garantía comercial, con un responsable identificable si algo falla.",
            "Posibilidad de entregar tu auto actual como parte de pago.",
            "Financiamiento, si no vas a pagar todo de contado.",
        ]},

        f"Ese cuarto punto resuelve un problema típico de quien ya tiene auto: vender el "
        f"usado por su cuenta puede tomar meses. Lo explicamos en "
        f"{link(PARTE_PAGO, 'cambiar tu auto entregándolo como parte de pago')}.",

        {"h2": "Qué hay hoy en el patio"},

        f"Para que te hagas una idea del rango, algunas unidades disponibles:",

        {"tabla": [
            ["Vehículo", "Año", "Kilómetros", "Precio"],
            [FICHA['koleos'][1], FICHA['koleos'][2], FICHA['koleos'][3], FICHA['koleos'][4]],
            [FICHA['captiva'][1], FICHA['captiva'][2], FICHA['captiva'][3], FICHA['captiva'][4]],
            [FICHA['seltos'][1], FICHA['seltos'][2], FICHA['seltos'][3], FICHA['seltos'][4]],
            [FICHA['cx5'][1], FICHA['cx5'][2], FICHA['cx5'][3], FICHA['cx5'][4]],
        ]},

        f"El rango va desde el {link(FICHA['koleos'][0], 'Koleos a ' + FICHA['koleos'][4])} "
        f"hasta la {link(FICHA['cx5'][0], 'CX-5 a ' + FICHA['cx5'][4])}. La lista completa "
        f"cambia seguido, así que conviene mirarla el mismo día.",

        {"h2": "Para el comprador de Otavalo, en concreto"},

        "Si tu recorrido diario es Otavalo–Ibarra por la Panamericana, un auto de consumo "
        "contenido rinde mucho más que uno grande. Son unos cuarenta kilómetros diarios "
        "entre ida y vuelta, y eso a fin de mes se nota en el surtidor.",

        "Si en cambio subís seguido a las comunidades o entrás a caminos de tierra, la "
        "altura al piso deja de ser un capricho. Ahí conviene una SUV, aunque consuma más.",

        {"h2": "El precio no es lo único que se negocia"},

        "En una compra entre particulares casi toda la conversación gira alrededor del "
        "precio, y se dejan sobre la mesa cosas que valen tanto o más.",

        {"ul": [
            "<strong>Quién paga el traspaso</strong> y en qué plazo se completa.",
            "<strong>Quién cancela las multas</strong> e impuestos pendientes.",
            "<strong>Si entrega los dos juegos de llaves</strong> y el manual.",
            "<strong>El historial de mantenimiento</strong>, que vale dinero real y muchos "
            "vendedores tienen guardado sin saber que importa.",
            "<strong>Un plazo de gracia</strong> para revisar el vehículo con un mecánico "
            "antes de cerrar del todo.",
        ]},

        "Negociar esos cinco puntos suele rendir más que pelear doscientos dólares del "
        "precio, y genera muchísimo menos fricción con alguien que vas a seguir viendo en "
        "el pueblo.",

        {"h2": "Lo que sí cuesta más en Otavalo"},

        "Vale una advertencia honesta sobre el otro lado del asunto: en un patio formal el "
        "precio suele ser algo más alto que el de un particular. No es un abuso, es lo que "
        "cuesta verificar papeles, hacer la revisión técnica, ejecutar los arreglos y "
        "sostener una garantía.",

        "Quien tiene tiempo, conocimiento mecánico y paciencia para verificar todo por su "
        "cuenta puede comprar mejor a un particular. Quien no los tiene, paga esa diferencia "
        "y se ahorra el riesgo. Las dos decisiones son razonables y dependen de tu "
        "situación, no de una regla general.",

        {"faq": [
            ("¿Conviene comprar en Otavalo o en Ibarra?",
             "Depende de tu situación. Comprando a un particular en Otavalo podés conseguir "
             "mejor precio si tenés tiempo y criterio para verificar todo por tu cuenta. En "
             "un patio de Ibarra pagás algo más y recibís papeles verificados, revisión "
             "hecha y garantía comercial. Las dos decisiones son válidas."),
            ("¿Qué se negocia además del precio?",
             "Quién paga el traspaso y en qué plazo, quién cancela multas e impuestos, si "
             "entrega los dos juegos de llaves, el historial de mantenimiento y un plazo "
             "para revisar el vehículo con un mecánico antes de cerrar. Suele rendir más "
             "que pelear el precio."),
            ("¿Hay concesionarios de autos usados en Otavalo?",
             "Hay vendedores particulares y patios pequeños. Para comprar con garantía "
             "comercial y papeles verificados, la mayoría de compradores de Otavalo se "
             "mueve a Ibarra, que está a poco más de veinte minutos."),
            ("¿Qué debo revisar si compro por Facebook en Otavalo?",
             "Que la matrícula esté a nombre de quien vende, el certificado de gravámenes, "
             "las multas por placa, y que el kilometraje cuadre con el desgaste del "
             "interior. Nunca entregues dinero antes de verificar la titularidad."),
            ("¿Puedo entregar mi auto actual como parte de pago?",
             "Sí. Hacemos la valoración en el patio sin costo y sobre esa base se arma el "
             "saldo. Para quien no quiere pasar meses tratando de vender su auto, suele ser "
             "la salida más práctica."),
            ("¿Atienden a compradores de fuera de Ibarra?",
             "Sí, recibimos compradores de Otavalo, Atuntaqui, Cotacachi, Cayambe y Tulcán. "
             "Se puede coordinar la visita por WhatsApp para tener el vehículo listo cuando "
             "llegues."),
        ]},

        cierre("Otavalo", "Hola, soy de Otavalo y quiero ver un auto seminuevo en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Atuntaqui / Antonio Ante
# ════════════════════════════════════════════════════════════════════════════
atuntaqui = {
    "title": "Comprar un auto usado en Atuntaqui y Antonio Ante",
    "slug": "autos-usados-atuntaqui-antonio-ante",
    "date": "2026-11-13T09:00:00",
    "cat": CAT["ibarra"],
    "tags": ["autos usados Atuntaqui", "Antonio Ante", "seminuevos Imbabura",
             "comprar auto Imbabura", "OKCars"],
    "excerpt": "Atuntaqui es cantón textil, y eso define qué vehículo conviene: carga "
               "liviana, viajes frecuentes a Quito y un ojo puesto en el consumo. Qué "
               "mirar antes de comprar.",
    "yoast_title": "Autos usados en Atuntaqui: qué conviene y dónde comprar",
    "yoast_desc": "Qué vehículo conviene si trabajás en el sector textil de Antonio Ante, "
                  "qué revisar antes de comprar un usado y dónde encontrar opciones formales cerca.",
    "focus_kw": "autos usados atuntaqui",
    "bloques": [
        "Atuntaqui vive del textil, y eso define de forma bastante directa qué vehículo le "
        "sirve a la mayoría de sus compradores.",

        "Quien tiene taller o local necesita mover mercadería: rollos de tela, cajas de "
        "prendas, pedidos que salen a Quito o a Guayaquil. Quien trabaja en el sector "
        "recorre la Panamericana con frecuencia. Y casi todos miran el consumo, porque son "
        "muchos kilómetros al mes.",

        {"h2": "Qué vehículo pide ese trabajo"},

        "Hay tres perfiles claros y cada uno apunta a algo distinto:",

        {"ul": [
            "<strong>Carga liviana frecuente.</strong> Una camioneta de doble cabina o una "
            "SUV con asientos traseros abatibles resuelve más que un sedán, sin el costo de "
            "un camión.",
            "<strong>Viajes a Quito o Guayaquil.</strong> Comodidad en carretera y consumo "
            "contenido pesan más que la altura al piso.",
            "<strong>Movilidad dentro del cantón.</strong> Un auto pequeño y económico "
            "alcanza de sobra y cuesta bastante menos de sostener.",
        ]},

        "El error más común que vemos es comprar la camioneta grande «por si acaso», "
        "cuando la carga real se mueve tres veces al mes. Ese «por si acaso» se paga todos "
        "los días en combustible, llantas y matrícula.",

        {"quote": "Al cliente de Atuntaqui le preguntamos cuántas veces al mes carga de "
                  "verdad. Muchos descubren que con una SUV con los asientos abatidos les "
                  "sobra, y que la camioneta la iban a comprar por costumbre. Alquilar un "
                  "flete tres veces al mes sale más barato que sostener el vehículo grande "
                  "todo el año.",
         "cite": CITA},

        {"h2": "El consumo, con números propios"},

        "De Atuntaqui a Quito hay algo más de dos horas por la Panamericana, y quien hace "
        "ese viaje una o dos veces por semana acumula un kilometraje considerable.",

        "En ese escenario, la diferencia de consumo entre un vehículo y otro deja de ser un "
        "detalle de ficha técnica y se convierte en un rubro fijo del mes. Un motor "
        "eficiente puede significar la diferencia de un par de tanques mensuales frente a "
        "uno grande, y eso a lo largo de un año es dinero que compra otras cosas.",

        f"Si el consumo es tu prioridad, en el patio está el "
        f"{link(FICHA['prius'][0], FICHA['prius'][1] + ' híbrido')} a "
        f"{FICHA['prius'][4]}, que es lo que menos combustible gasta del listado, con la "
        f"salvedad de su kilometraje alto. En el otro extremo, la "
        f"{link(FICHA['maxus'][0], FICHA['maxus'][1])} diésel 4x4 a {FICHA['maxus'][4]} para "
        f"quien sí necesita carga y tracción de verdad.",

        {"h2": "Qué verificar antes de pagar"},

        "Vale para cualquier compra, y con más razón si el vehículo va a trabajar:",

        {"ol": [
            "Que la matrícula esté a nombre de quien vende, con la cédula a la vista.",
            "Certificado de gravámenes, para descartar una prenda vigente.",
            "Multas e impuestos pendientes, consultados por placa.",
            "Historial de mantenimiento, sobre todo si el vehículo trabajó cargado.",
            "Revisión mecánica por alguien de tu confianza, no solamente del vendedor.",
            "Estado de embrague y suspensión si la unidad hizo carga con frecuencia.",
        ]},

        f"El detalle completo está en el {link(CHECKLIST, 'checklist de 20 puntos')} y en "
        f"la guía de {link(TRASPASO, 'traspaso de vehículo')}. Si vas a financiar, mirá "
        f"antes {link(ENTRADA, 'cuánto piden de entrada')}.",

        {"h2": "El detalle del horario"},

        "Un punto práctico que ahorra viajes: Atuntaqui trabaja con horarios de taller y "
        "local, y la mayoría de compradores del cantón solo puede moverse los sábados. Los "
        "patios de Ibarra atienden ese día, pero es cuando más gente hay.",

        "Si podés coordinar la visita por WhatsApp durante la semana y decir a qué hora "
        "llegás, te dejan las unidades listas y la prueba de manejo agendada. Es la "
        "diferencia entre resolver en dos horas o perder la mañana esperando.",

        {"h2": "Dónde comprar"},

        "En Antonio Ante la oferta formal de seminuevos es limitada, y la mayoría de "
        "compradores termina mirando en Ibarra, que está a menos de veinte minutos.",

        f"Lo que cambia al comprar en un patio formal no es tanto el precio como el "
        f"respaldo: papeles verificados, revisión hecha y alguien a quien reclamar si algo "
        f"sale mal. Lo desarrollamos en "
        f"{link(IBARRA_GARANTIA, 'autos seminuevos en Ibarra con garantía')} y en "
        f"{link(PATIO, 'comprar en patio o a un particular')}.",

        {"h2": "La cuenta que conviene hacer antes"},

        "Antes de decidir entre una camioneta y algo más chico, armá esta cuenta con "
        "números tuyos de los últimos tres meses:",

        {"ol": [
            "Cuántas veces cargaste de verdad, y de qué tamaño era la carga.",
            "Cuántos kilómetros hiciste al mes, separando ciudad y carretera.",
            "Cuánto gastaste en combustible.",
            "Cuánto te costaría contratar un flete las veces que sí cargaste.",
        ]},

        "Ese cuarto punto es el que suele decidir. Si contratar transporte tres veces al "
        "mes cuesta menos que la diferencia de consumo, matrícula y llantas entre una "
        "camioneta y una SUV, la cuenta ya está hecha.",

        {"h2": "Comprar entre conocidos en un cantón chico"},

        "Antonio Ante es un cantón donde casi todos se conocen, y eso tiene dos caras. La "
        "buena es que la reputación importa: nadie quiere quedar mal vendiendo un auto con "
        "problemas en un lugar donde se va a cruzar con el comprador en el mercado.",

        "La menos buena es que la confianza hace saltar verificaciones. Pedir el "
        "certificado de gravámenes o llevar el auto a un mecánico se siente incómodo entre "
        "conocidos, y esa incomodidad es justamente la que después sale cara.",

        "La recomendación es la misma de siempre: formalizá igual. Un vendedor honesto no "
        "se ofende, y uno que se ofende te está ahorrando el problema de comprarle.",

        {"faq": [
            ("¿Cómo sé si necesito camioneta o me alcanza una SUV?",
             "Contá cuántas veces cargaste de verdad en los últimos tres meses y de qué "
             "tamaño era la carga. Si contratar un flete esas veces cuesta menos que la "
             "diferencia anual de consumo, matrícula y llantas entre una camioneta y una "
             "SUV, la SUV te alcanza."),
            ("¿Es distinto comprar entre conocidos en un cantón chico?",
             "La reputación juega a favor: nadie quiere quedar mal en un lugar donde se va "
             "a cruzar con el comprador. El riesgo es que la confianza haga saltar "
             "verificaciones. Conviene formalizar igual, con papeles y revisión mecánica."),
            ("¿Qué auto conviene si tengo un taller textil en Atuntaqui?",
             "Depende de cuánta carga movés y con qué frecuencia. Para carga ocasional, una "
             "SUV con asientos abatibles suele bastar y cuesta bastante menos de sostener "
             "que una camioneta. Para carga frecuente o pesada, ahí sí una doble cabina."),
            ("¿Hay venta de autos usados en Atuntaqui?",
             "Hay vendedores particulares y algunos patios pequeños. Para comprar con "
             "garantía y papeles verificados, la mayoría de compradores del cantón se mueve "
             "a Ibarra, que queda muy cerca."),
            ("¿Conviene un diésel para viajar seguido a Quito?",
             "Si hacés muchos kilómetros al mes, el diésel suele tener mejor cuenta de "
             "combustible, sobre todo con carga o en pendiente. Si recorrés poco, los "
             "mantenimientos más caros del diésel no se compensan."),
            ("¿Puedo dejar mi auto actual como parte de pago?",
             "Sí. La valoración se hace en el patio sin costo y el saldo se financia o se "
             "cancela de contado, según prefieras."),
        ]},

        cierre("Atuntaqui", "Hola, soy de Atuntaqui y quiero ver opciones de auto seminuevo en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Cotacachi
# ════════════════════════════════════════════════════════════════════════════
cotacachi = {
    "title": "Autos usados en Cotacachi: qué conviene por los caminos de la zona",
    "slug": "autos-usados-cotacachi",
    "date": "2026-11-16T09:00:00",
    "cat": CAT["ibarra"],
    "tags": ["autos usados Cotacachi", "SUV 4x4 Imbabura", "seminuevos Imbabura",
             "comprar auto Cotacachi", "OKCars"],
    "excerpt": "Entre las comunidades altas, la vía a Intag y la subida a la laguna, en "
               "Cotacachi el tipo de camino manda sobre la marca. Qué mirar y cuándo la "
               "tracción deja de ser opcional.",
    "yoast_title": "Autos usados en Cotacachi: qué conviene según el camino",
    "yoast_desc": "Cuándo hace falta tracción de verdad, qué revisar en un usado que anduvo "
                  "en tierra y qué opciones hay cerca para los compradores del cantón Cotacachi.",
    "focus_kw": "autos usados cotacachi",
    "bloques": [
        "Cotacachi es de los cantones donde el tipo de camino define la compra más que la "
        "marca o el año. Entre las comunidades altas, la vía hacia Intag y la subida a la "
        "laguna, un vehículo que en Ibarra sobra acá puede quedarse corto.",

        "Vamos a lo concreto: cuándo hace falta tracción de verdad, cuándo alcanza con "
        "altura, y qué revisar en un usado que ya anduvo en tierra.",

        {"h2": "Altura y tracción no son lo mismo"},

        "Es la confusión más cara del mercado de SUV, y conviene desarmarla.",

        "La <strong>altura al piso</strong> es cuánto espacio hay entre los bajos del "
        "vehículo y el suelo. Sirve para no golpear el cárter en un bache o en un "
        "empedrado, y la tienen todas las SUV, incluidas las 4x2.",

        "La <strong>tracción</strong> es a cuántas ruedas les llega la fuerza del motor. "
        "Una 4x2 manda fuerza a dos ruedas; una 4x4 a las cuatro. Eso es lo que decide si "
        "el vehículo avanza cuando el piso está flojo, mojado o en pendiente.",

        "La enorme mayoría de las SUV que se venden en Ecuador son 4x2. Tienen la altura "
        "pero no la tracción, y en una subida de tierra con lluvia esa diferencia es todo.",

        {"quote": "Al cliente de Cotacachi le preguntamos por dónde maneja, no qué auto "
                  "quiere. Si sube a las comunidades en invierno, una 4x2 lo va a dejar "
                  "botado alguna vez. Si su recorrido es el pueblo y la vía a Ibarra, "
                  "pagar una 4x4 es gastar de más.",
         "cite": CITA},

        {"h2": "Cuándo hace falta 4x4"},

        {"ul": [
            "Subidas de tierra o lastre en época de lluvia.",
            "Caminos con pendiente pronunciada y piso suelto.",
            "Cargar peso en terreno irregular.",
            "Salir de la vía asfaltada con frecuencia, no una vez al año.",
        ]},

        "Si nada de eso aplica, una SUV 4x2 con buena altura resuelve y cuesta menos de "
        "comprar, de mantener y de matricular.",

        f"Entre lo que tenemos, la {link(FICHA['crosstrek'][0], FICHA['crosstrek'][1])} del "
        f"{FICHA['crosstrek'][2]} es la única con tracción a las cuatro ruedas permanente. "
        f"La {link(FICHA['maxus'][0], FICHA['maxus'][1])} diésel también es 4x4, para quien "
        f"además necesita cargar. El resto del listado es 4x2 con distintas alturas.",

        {"h2": "Qué revisar en un usado que anduvo en tierra"},

        "Un vehículo que trabajó en caminos de la zona no está necesariamente mal, pero "
        "acumuló desgaste en puntos previsibles. Estos son los que miramos:",

        {"ol": [
            "<strong>Suspensión.</strong> Amortiguadores, bujes y rótulas sufren mucho más "
            "en camino irregular que en asfalto.",
            "<strong>Bajos y cárter.</strong> Golpes, abolladuras o soldaduras cuentan la "
            "historia del vehículo mejor que el vendedor.",
            "<strong>Sistema de escape.</strong> Es de lo primero que se golpea en un "
            "empedrado.",
            "<strong>Guardapolvos de las juntas.</strong> Si están rotos, entra tierra y la "
            "junta se arruina en poco tiempo.",
            "<strong>Filtro de aire.</strong> En caminos polvorientos se satura mucho más "
            "rápido; uno muy sucio habla de mantenimiento descuidado.",
            "<strong>Óxido en zonas bajas</strong>, por barro acumulado que nunca se lavó.",
        ]},

        f"Los puntos generales están en el {link(CHECKLIST, 'checklist de 20 puntos')}. "
        f"Nuestra recomendación en contra: no compres un vehículo que trabajó en tierra sin "
        f"levantarlo y mirarle los bajos. Es la revisión que más problemas revela y la que "
        f"casi nadie hace.",

        {"h2": "El detalle del turismo"},

        "Cotacachi recibe visitantes todo el año, y buena parte de la actividad económica "
        "del cantón gira alrededor de eso. Para quien trabaja en hospedaje, artesanía o "
        "servicios turísticos, el vehículo cumple dos funciones: moverse y a veces "
        "transportar visitantes o mercadería.",

        "En ese caso conviene mirar el espacio interior y la comodidad de las plazas "
        "traseras, y no únicamente la capacidad de carga. Un vehículo cómodo deja mejor impresión "
        "que uno grande e incómodo.",

        {"h2": "El costo de mantener una 4x4"},

        "Antes de decidirte por la tracción integral conviene saber qué implica sostenerla, "
        "porque es información que rara vez está en la conversación de venta.",

        {"ul": [
            "<strong>Más consumo.</strong> Mover cuatro ruedas cuesta combustible, y esa "
            "diferencia se paga todos los días.",
            "<strong>Más componentes.</strong> Diferencial delantero, transferencia y "
            "árboles adicionales son piezas que también se mantienen.",
            "<strong>Mantenimiento específico.</strong> Los aceites de diferencial y "
            "transferencia tienen sus propios intervalos.",
            "<strong>Llantas parejas.</strong> En una 4x4 conviene cambiar las cuatro "
            "juntas y mantener el mismo desgaste, lo que encarece cada recambio.",
        ]},

        "Nada de eso es prohibitivo, pero suma. Por eso insistimos en la pregunta de "
        "cuántas veces al mes salís del asfalto: si la respuesta es «casi nunca», estás "
        "pagando ese mantenimiento sin recibir el beneficio.",

        {"h2": "Un punto sobre la altura y las comunidades"},

        "Hay un escenario intermedio muy común en el cantón: quien sube a las comunidades "
        "solo en verano, por caminos secos y firmes. Ahí una SUV 4x2 con buena altura "
        "cumple sin problema, y la 4x4 sería un gasto sin retorno.",

        "El problema aparece en época de lluvia, cuando esos mismos caminos se vuelven "
        "resbalosos. Si tu actividad no te obliga a subir en invierno, la 4x2 es "
        "perfectamente suficiente y bastante más barata de tener.",

        {"faq": [
            ("¿Cuánto más cuesta mantener una 4x4?",
             "Suma consumo, componentes adicionales como diferencial y transferencia, "
             "aceites específicos con sus propios intervalos, y el recambio de las cuatro "
             "llantas juntas. No es prohibitivo, pero es un gasto constante que solo se "
             "justifica si usás la tracción."),
            ("¿Me alcanza una 4x2 si subo a las comunidades solo en verano?",
             "En caminos secos y firmes, sí: una SUV 4x2 con buena altura cumple sin "
             "problema. La 4x4 se vuelve necesaria cuando hay que subir con el piso mojado "
             "o flojo, típicamente en época de lluvia."),
            ("¿Necesito una 4x4 para vivir en Cotacachi?",
             "Depende de por dónde manejes. Para el pueblo y la vía asfaltada a Ibarra, una "
             "4x2 con buena altura alcanza. Si subís seguido a comunidades por caminos de "
             "tierra, sobre todo en época de lluvia, la 4x4 evita quedarte varado."),
            ("¿Qué diferencia hay entre altura al piso y tracción?",
             "La altura evita golpear los bajos en baches y empedrados; la tracción decide "
             "si el vehículo avanza cuando el piso está flojo. Casi todas las SUV tienen "
             "altura, pero la mayoría son 4x2 y no tienen tracción a las cuatro ruedas."),
            ("¿Qué revisar en un auto que anduvo en caminos de tierra?",
             "Suspensión, bajos y cárter, escape, guardapolvos de las juntas, filtro de "
             "aire y óxido en zonas bajas. Conviene levantarlo para mirar por debajo antes "
             "de decidir."),
            ("¿Hay venta de autos usados en Cotacachi?",
             "La oferta formal es limitada. La mayoría de compradores del cantón mira en "
             "Ibarra, que está a media hora, donde hay patios con garantía y papeles "
             "verificados."),
        ]},

        cierre("Cotacachi", "Hola, soy de Cotacachi y busco una SUV o camioneta seminueva en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Cayambe
# ════════════════════════════════════════════════════════════════════════════
cayambe = {
    "title": "Comprar un seminuevo viviendo en Cayambe: lo que hay que saber",
    "slug": "comprar-seminuevo-desde-cayambe",
    "date": "2026-11-18T09:00:00",
    "cat": CAT["ibarra"],
    "tags": ["autos usados Cayambe", "seminuevos Pichincha", "comprar auto Cayambe",
             "traspaso entre provincias", "OKCars"],
    "excerpt": "Cayambe está en Pichincha pero mira hacia el norte. Qué implica comprar "
               "en otra provincia, qué pasa con la matrícula y por qué el frío de la zona "
               "cambia lo que hay que revisar.",
    "yoast_title": "Comprar un auto seminuevo desde Cayambe: guía práctica",
    "yoast_desc": "Comprar en otra provincia, qué pasa con la matrícula y el traspaso, y "
                  "qué revisar en un vehículo que va a trabajar en el frío y la altura de la zona.",
    "focus_kw": "autos usados cayambe",
    "bloques": [
        "Cayambe está en Pichincha, pero para muchas cosas mira hacia el norte: Ibarra queda "
        "a poco más de una hora por la Panamericana, y buena parte de quienes compran un "
        "vehículo terminan comparando entre Quito y Imbabura.",

        "Hay dos preguntas que aparecen siempre y que conviene resolver antes: qué implica "
        "comprar en otra provincia, y qué pide un vehículo que va a trabajar en el frío y "
        "la altura de la zona.",

        {"h2": "Comprar en otra provincia"},

        "La respuesta corta: no complica nada. El traspaso es un trámite nacional y no "
        "importa dónde vivas ni dónde esté matriculado el vehículo.",

        "Lo que sí conviene saber es que el vehículo mantiene su cantón de matriculación "
        "salvo que hagas el cambio, y que el componente municipal del impuesto varía entre "
        "cantones. No es un obstáculo, es un dato para tener presente al calcular el gasto "
        "anual.",

        {"ol": [
            "El traspaso se hace con los mismos documentos, vivas donde vivas.",
            "El vehículo conserva su matrícula del cantón de origen hasta que se cambie.",
            "El cambio de cantón es un trámite aparte y opcional.",
            "El calendario de matriculación sigue al último dígito de la placa.",
            "Los valores municipales pueden diferir entre el cantón de origen y el tuyo.",
        ]},

        f"El procedimiento completo está en la guía de "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador')}.",

        {"h2": "Lo que pide el clima de la zona"},

        "Cayambe está alto y hace frío, y eso desgasta cosas que en la costa nadie mira.",

        {"ul": [
            "<strong>Batería.</strong> El frío le exige más al arrancar y acorta su vida. "
            "Una batería con varios años en una zona fría es candidata a fallar.",
            "<strong>Sistema de arranque.</strong> Bujías y bobinas trabajan más en "
            "arranques en frío repetidos.",
            "<strong>Refrigerante.</strong> Tiene que ser el adecuado y estar en nivel; en "
            "zonas frías su estado importa más.",
            "<strong>Calefacción y desempañador.</strong> Suenan a detalle hasta la primera "
            "mañana con el parabrisas empañado en una vía con neblina.",
            "<strong>Llantas.</strong> Con piso mojado frecuente, el labrado deja de ser un "
            "detalle estético.",
        ]},

        {"quote": "Al comprador de Cayambe le decimos que pruebe el auto en frío, temprano, "
                  "no a mediodía con el motor caliente. Un arranque difícil en la mañana "
                  "cuenta más sobre el estado real del vehículo que media hora de prueba de "
                  "manejo con todo templado.",
         "cite": CITA},

        {"h2": "El perfil de uso"},

        "Cayambe tiene mucha actividad florícola y ganadera, y eso marca dos necesidades "
        "distintas.",

        "Quien trabaja en el sector productivo suele necesitar carga y capacidad de entrar "
        "a caminos de finca, lo que apunta a una camioneta o a una SUV con tracción. Quien "
        "se mueve entre Cayambe y Quito por trabajo pesa más el consumo y la comodidad en "
        "carretera.",

        f"En el patio hay opciones para los dos casos: la "
        f"{link(FICHA['maxus'][0], FICHA['maxus'][1])} diésel 4x4 a {FICHA['maxus'][4]} y la "
        f"{link(FICHA['hunter'][0], FICHA['hunter'][1])} a {FICHA['hunter'][4]} para "
        f"trabajo; el {link(FICHA['seltos'][0], FICHA['seltos'][1])} o el "
        f"{link(FICHA['territory'][0], FICHA['territory'][1])} a {FICHA['seltos'][4]} para "
        f"uso mixto.",

        {"h2": "Coordinar antes de subir"},

        "Poco más de una hora de viaje justifica organizar la visita, no improvisarla. Lo "
        "que recomendamos a los compradores de Cayambe es escribir con anticipación "
        "diciendo qué buscan y cuál es el presupuesto.",

        "Con eso se apartan dos o tres unidades que calcen, se agenda la prueba de manejo y "
        "se prepara la valoración del auto que vas a entregar. Un sábado alcanza para "
        "resolver toda la compra en lugar de usarlo solo para mirar.",

        "También conviene preguntar antes qué documentos llevar. Si vas a dejar el trámite "
        "avanzado el mismo día, tener la cédula y la matrícula de tu vehículo actual evita "
        "un segundo viaje.",

        {"h2": "Vale la pena el viaje"},

        "Poco más de una hora hasta Ibarra es un viaje razonable para una compra de este "
        "tamaño, sobre todo si se coordina antes y se ven varias unidades el mismo día.",

        f"Lo que se gana comprando en un patio formal está detallado en "
        f"{link(PATIO, 'comprar en patio o a un particular')}: papeles verificados, "
        f"revisión hecha, garantía comercial y la opción de dejar tu auto actual como "
        f"{link(PARTE_PAGO, 'parte de pago')}.",

        {"h2": "Ibarra o Quito"},

        "Es la comparación real que hace todo comprador de Cayambe, y no tiene una "
        "respuesta única.",

        {"tabla": [
            ["", "Quito", "Ibarra"],
            ["Distancia", "Alrededor de 1 hora", "Poco más de 1 hora"],
            ["Volumen de oferta", "Mucho mayor", "Menor pero manejable"],
            ["Tiempo de recorrer patios", "Alto, por tráfico y distancias", "Bajo, todo cerca"],
            ["Trato posterior", "Más impersonal", "Más directo"],
        ]},

        "Quito tiene mucha más oferta, y para quien busca un modelo específico eso puede "
        "ser decisivo. La contrapartida es el tiempo: recorrer tres patios en Quito puede "
        "llevarse el día entero entre tráfico y distancias.",

        "Ibarra tiene menos volumen pero todo concentrado, y para una compra de este tamaño "
        "el trato directo con quien te vende suele valer más de lo que parece cuando "
        "aparece un reclamo.",

        {"h2": "Qué llevar el día de la visita"},

        {"ol": [
            "Cédula, para cualquier trámite que quieras dejar avanzado.",
            "Tu auto actual, si pensás entregarlo como parte de pago.",
            "La matrícula de ese auto, para la valoración.",
            "Una idea clara de tu presupuesto y de la cuota que podés sostener.",
        ]},

        {"faq": [
            ("¿Conviene ir a Quito o a Ibarra desde Cayambe?",
             "Quito tiene mucha más oferta, útil si buscás un modelo específico, pero "
             "recorrer patios se lleva el día entre tráfico y distancias. Ibarra tiene "
             "menos volumen y todo concentrado, con trato más directo, que pesa si después "
             "aparece un reclamo."),
            ("¿Qué llevo el día que voy a ver autos?",
             "Cédula para dejar trámites avanzados, tu auto actual si pensás entregarlo "
             "como parte de pago junto con su matrícula, y una idea clara del presupuesto y "
             "de la cuota que podés sostener."),
            ("¿Puedo comprar un auto en Imbabura viviendo en Cayambe?",
             "Sí, sin complicación. El traspaso es un trámite nacional y no depende de "
             "dónde vivas. El vehículo conserva su cantón de matriculación salvo que hagas "
             "el cambio, que es un trámite aparte y opcional."),
            ("¿Tengo que cambiar la matrícula a Cayambe?",
             "No es obligatorio. Podés mantener el cantón de origen. Conviene consultar los "
             "valores municipales de cada cantón, porque el impuesto puede variar y en "
             "algunos casos el cambio conviene."),
            ("¿Qué revisar en un auto por el frío de la zona?",
             "Batería, sistema de arranque, refrigerante, calefacción y desempañador, y el "
             "estado de las llantas. Y probalo en frío por la mañana, no con el motor ya "
             "caliente."),
            ("¿Cuánto se demora el traspaso si vivo en otra provincia?",
             "Los mismos plazos que en cualquier caso: con los documentos en regla, entre "
             "3 y 10 días hábiles. Vivir en otra provincia no agrega tiempo al trámite."),
        ]},

        cierre("Cayambe", "Hola, soy de Cayambe y quiero ver un auto seminuevo en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Tulcán y Carchi
# ════════════════════════════════════════════════════════════════════════════
tulcan = {
    "title": "Autos usados en Tulcán y el Carchi: por qué conviene bajar a Ibarra",
    "slug": "autos-usados-tulcan-carchi",
    "date": "2026-11-20T09:00:00",
    "cat": CAT["ibarra"],
    "tags": ["autos usados Tulcán", "Carchi", "seminuevos norte del Ecuador",
             "comprar auto Tulcán", "OKCars"],
    "excerpt": "En la frontera circulan vehículos con historias complicadas. Qué verificar "
               "sí o sí antes de pagar, y por qué a muchos compradores del Carchi les sale "
               "mejor comprar en Imbabura.",
    "yoast_title": "Autos usados en Tulcán y Carchi: qué verificar antes",
    "yoast_desc": "Documentación, procedencia y riesgos propios de la zona de frontera. "
                  "Qué revisar antes de pagar, qué nunca aceptar y por qué conviene comparar en Ibarra.",
    "focus_kw": "autos usados tulcan",
    "bloques": [
        "Comprar un vehículo usado en Tulcán o en el resto del Carchi tiene una "
        "particularidad que no existe en otras provincias: la cercanía con la frontera hace "
        "que circulen unidades con historias documentales más complicadas de lo habitual.",

        "Eso no significa que comprar en la zona sea mala idea. Significa que hay "
        "verificaciones que allá no son opcionales.",

        {"h2": "Lo que hay que verificar sí o sí"},

        "Esta lista aplica en cualquier lado, pero en zona de frontera cada punto pesa el "
        "doble:",

        {"ol": [
            "<strong>Matrícula ecuatoriana vigente</strong> y a nombre de quien vende, con "
            "la cédula en la mano.",
            "<strong>Coincidencia de números.</strong> Chasis y motor deben coincidir "
            "exactamente con la matrícula, y ser legibles, sin limaduras ni retoques.",
            "<strong>Certificado de gravámenes.</strong> Confirma que el vehículo está "
            "libre de prenda.",
            "<strong>Documentación de importación</strong>, si el vehículo la tuvo. Debe "
            "estar completa y en regla.",
            "<strong>Multas e impuestos</strong> consultados por placa.",
            "<strong>Historial de la unidad</strong>, hasta donde sea verificable.",
        ]},

        "El segundo punto es el crítico. Un número de chasis alterado, limado o que no "
        "coincide con la matrícula convierte al vehículo en un problema legal serio, y no "
        "hay precio que lo compense. Ante cualquier duda, la respuesta correcta es "
        "retirarse.",

        {"quote": "En el norte hemos visto de todo, y por eso somos insistentes: si el "
                  "chasis no se lee claro o no coincide, no hay conversación posible. No es "
                  "desconfianza del vendedor, es que ese problema después no lo resuelve "
                  "nadie y el que se queda sin auto y sin plata es el comprador.",
         "cite": CITA},

        {"h2": "Por qué muchos bajan a Ibarra"},

        "Tulcán está a poco más de dos horas de Ibarra por la Panamericana. Es un viaje, "
        "pero para una compra de varios miles de dólares mucha gente del Carchi lo hace, y "
        "por razones concretas:",

        {"ul": [
            "<strong>Más oferta.</strong> Imbabura concentra más movimiento de seminuevos "
            "que el Carchi, así que hay más de dónde elegir.",
            "<strong>Papeles verificados de antemano</strong> en los patios formales.",
            "<strong>Garantía comercial</strong>, con una empresa identificable detrás.",
            "<strong>Financiamiento</strong> y posibilidad de entregar el auto actual como "
            "parte de pago.",
            "<strong>Respaldo de posventa</strong> con talleres cercanos.",
        ]},

        f"Sobre lo que cambia entre un patio y un particular, escribimos "
        f"{link(PATIO, 'esta comparación')}, y sobre la garantía en "
        f"{link(IBARRA_GARANTIA, 'autos seminuevos en Ibarra con garantía')}.",

        {"h2": "Cómo organizar el viaje"},

        "Si vas a bajar desde Tulcán, conviene hacerlo bien para no perder el día:",

        {"ol": [
            "Escribí antes y decí qué buscás y cuál es tu presupuesto.",
            "Pedí que te aparten dos o tres unidades para verlas el mismo día.",
            "Coordiná la prueba de manejo con anticipación.",
            "Si vas a entregar tu auto como parte de pago, llevalo para valorarlo.",
            "Consultá antes qué documentos necesitás llevar para dejar todo avanzado.",
        ]},

        "Con eso, un viaje de dos horas se convierte en una visita productiva en lugar de "
        "un paseo de reconocimiento.",

        {"h2": "La ventaja de comprar con la carpeta armada"},

        "Para un comprador que viene de Tulcán, el valor de que los papeles estén "
        "verificados de antemano es mayor que para alguien de Ibarra. No es lo mismo "
        "descubrir un problema documental estando a diez minutos que a dos horas de "
        "distancia.",

        "Ese es el argumento real a favor de comprar en un patio formal cuando vivís lejos: "
        "no es el precio, es no tener que volver. Un viaje adicional de cuatro horas ida y "
        "vuelta por un trámite mal hecho cuesta más que la diferencia de precio con un "
        "particular.",

        {"h2": "El clima del Carchi también cuenta"},

        "Tulcán es de las ciudades más frías del país, y eso desgasta la batería, el "
        "sistema de arranque y todo lo relacionado con la calefacción. Al comprar, "
        "conviene probar el vehículo en frío por la mañana y verificar que el desempañador "
        "funcione bien: en las vías con neblina de la zona no es un accesorio.",

        f"El resto de la revisión está en el {link(CHECKLIST, 'checklist de 20 puntos')} y "
        f"la parte documental en {link(PAPELES, 'qué papeles pedir antes de comprar')}.",

        {"h2": "Cómo verificar el chasis en dos minutos"},

        "Es la revisión más importante de esta lista y casi nadie sabe hacerla. No requiere "
        "herramientas ni conocimiento mecánico.",

        {"ol": [
            "Ubicá el número de chasis. Suele estar en una placa en el vano del motor y "
            "también grabado en el chasis mismo, además de aparecer en el parabrisas.",
            "Compará carácter por carácter con el de la matrícula. No de memoria: con el "
            "documento en la mano.",
            "Mirá si los números están parejos, con la misma profundidad y tipografía. "
            "Cualquier carácter que se vea retocado, limado o repintado es una alerta.",
            "Hacé lo mismo con el número de motor.",
            "Si alguna placa está remachada de forma distinta al resto o parece nueva en un "
            "vehículo viejo, preguntá por qué.",
        ]},

        "Si algo no cuadra y el vendedor tiene una explicación complicada, la decisión "
        "correcta es retirarse. Un vehículo con documentación irregular no es una ganga: es "
        "un problema que se hereda completo.",

        {"h2": "El vehículo que viene del otro lado"},

        "Circulan en la zona vehículos con documentación de importación de distinto tipo, y "
        "no todos están en la misma situación legal. Un vehículo correctamente nacionalizado "
        "y matriculado en Ecuador es perfectamente comprable; uno sin ese respaldo no.",

        "La verificación es la misma: matrícula ecuatoriana vigente, a nombre del vendedor, "
        "con números que coinciden. Si eso está, lo demás se resuelve. Si falta, no hay "
        "trato que valga la pena.",

        {"faq": [
            ("¿Cómo verifico el número de chasis?",
             "Ubicalo en la placa del vano del motor y grabado en el chasis, y compará "
             "carácter por carácter con la matrícula, con el documento en la mano. Revisá "
             "que los números estén parejos, con la misma profundidad y tipografía. "
             "Cualquier carácter retocado o limado es motivo para retirarse."),
            ("¿Se puede comprar un vehículo importado en la zona?",
             "Sí, siempre que esté correctamente nacionalizado y matriculado en Ecuador, a "
             "nombre del vendedor y con números que coincidan. Si falta ese respaldo, no "
             "hay trato que valga la pena."),
            ("¿Es riesgoso comprar un auto usado en la frontera?",
             "No por definición, pero exige verificaciones estrictas: matrícula ecuatoriana "
             "vigente a nombre del vendedor, coincidencia exacta de chasis y motor, "
             "certificado de gravámenes y documentación de importación completa si "
             "corresponde."),
            ("¿Qué hago si el número de chasis no coincide?",
             "Retirarte de la compra. Un chasis alterado o que no coincide con la matrícula "
             "es un problema legal que no se resuelve después, y no hay precio que lo "
             "justifique."),
            ("¿Conviene comprar en Ibarra viviendo en Tulcán?",
             "Muchos compradores del Carchi lo hacen por la mayor oferta, la garantía "
             "comercial y los papeles ya verificados. Son poco más de dos horas por la "
             "Panamericana y conviene coordinar la visita para ver varias unidades el mismo "
             "día."),
            ("¿El traspaso se complica si vivo en otra provincia?",
             "No. Es un trámite nacional con los mismos documentos y los mismos plazos, "
             "entre 3 y 10 días hábiles con todo en regla."),
        ]},

        cierre("Tulcán", "Hola, soy de Tulcán y quiero coordinar una visita para ver autos en OKCars."),
    ],
}


if __name__ == "__main__":
    for spec in (otavalo, atuntaqui, cotacachi, cayambe, tulcan):
        guarda(spec)
        print("  spec escrito:", spec["slug"])
