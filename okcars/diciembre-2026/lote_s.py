#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote S — los 5 últimos posts del contrato de OKCars (tanda de diciembre 2026).

Cuatro guías de modelo sin post en el sitio (Ford Escape, Kia Sorento, Toyota RAV4, Hyundai
Creta; verificado por API el 2026-11-19) y una guía de presupuesto (SUV por menos de $15.000)
que se diferencia de «desde $8.000» y de «mejores SUV usadas» por el ángulo: qué se gana y
qué se sacrifica con ese tope.

Fuentes de los datos técnicos (ver el reporte de la tanda):
- Campañas de seguridad: expedientes públicos de la NHTSA (Estados Unidos). Aplican a los
  vehículos de ese mercado; en el texto se le pide al lector confirmar su unidad por número
  de chasis con el concesionario de la marca en Ecuador.
- Creta ensamblada en Aymesa: Ekos Negocios, 15-oct-2025.
- RAV4 híbrida en Ecuador: Elyex (versiones XLE, XSE y Limited, tracción E-Four).

Sin precios de mercado: solo los del inventario propio (FICHA) y cuotas calculadas con
cuota(). Generaciones con años aproximados. Escrito en USTED.
"""
from comun import (CAT, CHECKLIST, CITA, CONSUMO, CUATRO_X_CUATRO, CUOTA, DEVALUA, DUSTER,
                   ENTRADA, FAMILIA, FECHAS, FICHA, HIBRIDOS, KICKS, KILOMETRAJE, LISTADO,
                   LUCES, MEJORES_SUV, MOTOR_TURBO, POST_CX5, POST_KOLEOS, POST_PRIUS,
                   POST_SELTOS, POST_SIENNA, POST_TERRITORY, POST_TUCSON, PRECIO_JUSTO,
                   PRIMER_MANT, PRUEBA_MANEJO, REVENTA, REVISION, SEGURO_REGLA, SEGURO_PRECIO,
                   SPORTAGE, SUV_SEDAN, TIGGO, VERIFICAR_DEUDAS, VITARA, XTRAIL, DESDE_8000,
                   COSTO_NOTARIA, COSTO_TASA_ANT, CAPTIVA, cierre, cuota, enlace_ficha,
                   guarda, link)

NHTSA = "https://www.nhtsa.gov/recalls"
AVISO_INVENTARIO = ("El inventario cambia seguido; confirme por WhatsApp que la unidad siga "
                    "disponible antes de viajar.")
AVISO_CAMPANAS = (
    f"Las campañas citadas son las que registra la {link(NHTSA, 'NHTSA')}, el ente de "
    "seguridad vial de Estados Unidos, y se aplican a los vehículos vendidos allá. Una "
    "unidad que llegó al Ecuador pudo salir de otra planta o tener otra fecha de "
    "fabricación. Lo seguro es pedir al concesionario de la marca que consulte el número de "
    "chasis (VIN) y le diga si ese auto tuvo alguna campaña y si se aplicó."
)


def fila(clave):
    _u, nombre, anio, km, precio = FICHA[clave]
    return [enlace_ficha(clave, nombre), anio or "—", f"{km} km", precio]


# ════════════════════════════════════════════════════════════════════════════
# 1 · Ford Escape usada
# ════════════════════════════════════════════════════════════════════════════
escape = {
    "title": "Ford Escape usada: qué año conviene y qué revisar",
    "slug": "ford-escape-usada-ecuador",
    "date": FECHAS[0],
    "cat": CAT["modelos"],
    "tags": ["Ford Escape usada", "SUV usadas Ecuador", "Ford Ecuador",
             "comprar SUV usada Ibarra", "seminuevos Imbabura"],
    "excerpt": "La Escape lleva más de veinte años en el mercado y cada generación es un "
               "auto distinto. Qué años conviene mirar, qué campañas de seguridad tuvo y "
               "qué revisar antes de pagar por una.",
    "yoast_title": "Ford Escape usada: qué año conviene y qué revisar",
    "yoast_desc": "Generaciones, motores EcoBoost y campañas de seguridad conocidas: cómo "
                  "elegir el año de una Ford Escape usada y qué pedir que revisen antes de pagar.",
    "focus_kw": "ford escape usada",
    "bloques": [
        "La Ford Escape es de esas SUV que casi todo el mundo reconoce, pero pocos saben que "
        "bajo el mismo nombre se vendieron autos muy diferentes. Una Escape de hace quince "
        "años y una de los últimos años no comparten motor, caja ni carrocería. Por eso, "
        "antes de discutir el precio, hay que saber qué generación tiene delante.",

        "En esta guía le explicamos qué años suelen convenir, qué campañas de seguridad "
        "registró el modelo y qué revisar en una unidad usada antes de pagar. Y si lo que "
        "le atrae es una SUV de Ford con poco recorrido, al final le mostramos la que "
        "tenemos hoy en el patio de Ibarra.",

        {"h2": "La respuesta corta: la generación pesa más que el año exacto"},

        "Para la mayoría de compradores la decisión está entre la tercera generación "
        "(aproximadamente 2013 a 2019) y la cuarta (desde 2020). Las anteriores pueden "
        "salir baratas, pero ya cargan muchos años de uso y conseguir ciertos repuestos "
        "toma más tiempo.",

        "Dentro de la tercera generación, el detalle que más cambia la compra es el motor. "
        "Los primeros años trajeron un 1.6 turbo que tuvo varias campañas por riesgo de "
        "incendio; desde la actualización de 2017 ese motor dio paso a un 1.5 turbo. "
        "Si la unidad que le ofrecen es 2013 o 2014 con motor 1.6, pida la prueba de que "
        "las campañas se hicieron antes de seguir conversando.",

        {"h2": "Las cuatro generaciones, en una tabla"},

        "Los años son aproximados y varían según el mercado de origen. Confirme siempre el "
        "año y el motor en la matrícula y en la placa del motor.",

        {"tabla": [
            ["Generación", "Años aproximados", "Motores habituales", "Qué esperar"],
            ["Primera", "2001 – 2007", "4 cilindros y V6 a gasolina",
             "Precio bajo, desgaste acumulado alto"],
            ["Segunda", "2008 – 2012", "4 cilindros y V6 a gasolina",
             "Mecánica conocida, equipamiento básico"],
            ["Tercera", "2013 – 2019", "1.6 y 2.0 turbo EcoBoost, 2.5 sin turbo; 1.5 turbo "
             "desde 2017", "La más equilibrada en precio y equipamiento"],
            ["Cuarta", "2020 en adelante", "1.5 turbo de tres cilindros, 2.0 turbo, híbrido 2.5",
             "Más tecnología, precio de compra más alto"],
        ]},

        f"Los motores turbo pequeños tienen una ventaja clara en la altura de la Sierra: "
        f"pierden menos fuerza que uno sin turbo al subir a Ibarra o a Tulcán. La "
        f"contracara es que piden aceite de la especificación correcta y cambios a tiempo. "
        f"Lo explicamos en {link(MOTOR_TURBO, 'motor turbo o atmosférico en la altura')}.",

        {"h2": "Las campañas de seguridad que conviene conocer"},

        "Ford llamó a revisión varias veces a la Escape en Estados Unidos. Estas son las "
        "que más pesan al comprar usada, según los expedientes públicos de la NHTSA:",

        {"ul": [
            "<strong>2013 con motor 1.6 (campaña 13V-583 y anteriores):</strong> "
            "sobrecalentamiento localizado de la culata que podía provocar fugas de aceite "
            "sobre partes calientes y riesgo de incendio. La solución incluía cambios en "
            "protecciones, enfriamiento y programación del motor. Hubo campañas "
            "relacionadas para unidades 2014 con el mismo motor.",
            "<strong>2013 a 2019 con caja automática de seis velocidades (campaña "
            "22V-413):</strong> el buje del cable de la palanca podía degradarse y la caja "
            "quedar en una marcha distinta a la que marca la palanca. Si no se usa el freno "
            "de mano, el auto puede moverse solo.",
            "<strong>2020 a 2022 con motor 1.5 (campaña 22V-191):</strong> la carcasa del "
            "separador de aceite podía agrietarse y dejar escapar aceite cerca de partes "
            "calientes del motor.",
        ]},

        AVISO_CAMPANAS,

        {"h2": "Qué revisar en una Escape usada"},

        "Además de los puntos generales del "
        f"{link(CHECKLIST, 'checklist para revisar un auto usado')}, en una Escape ponga "
        "atención a estos:",

        {"ol": [
            "<strong>Palanca y marchas.</strong> Con el motor encendido y el pie en el "
            "freno, pase por cada posición y confirme que el tablero muestre la misma. "
            "Estacione en pendiente en P y suelte el freno con cuidado: el auto no debe "
            "moverse.",
            "<strong>Cambios de la caja automática.</strong> En la prueba de manejo, los "
            "cambios deben entrar suaves. Golpes al pasar de primera a segunda o "
            "patinamientos en subida son motivo para pedir revisión de la caja.",
            "<strong>Fugas y olores.</strong> Con el capó abierto y el motor caliente, "
            "busque manchas de aceite alrededor del turbo y de la culata. Un olor a aceite "
            "quemado después de manejar no es normal.",
            "<strong>Nivel de refrigerante.</strong> Si baja entre una revisión y otra sin "
            "una fuga a la vista, hay que averiguar a dónde se va.",
            "<strong>Testigos del tablero.</strong> Ninguna luz de motor o de temperatura "
            f"debe quedar encendida. Si aparece alguna, consulte "
            f"{link(LUCES, 'qué significan las luces del tablero')}.",
            "<strong>Versiones 4x4.</strong> Escuche ruidos en curvas cerradas y revise "
            "fugas en la zona de la transferencia y el eje trasero.",
        ]},

        {"quote": "En una Escape, la primera pregunta no es cuántos kilómetros tiene sino "
                  "qué motor lleva y si le hicieron las campañas. Esa respuesta cambia el "
                  "precio que tiene sentido pagar.",
         "cite": CITA},

        {"h2": "Lo que cuesta tenerla, además de la compra"},

        "Una Escape de tercera o cuarta generación es una SUV compacta con motor turbo, y "
        "su mantenimiento cuesta más que el de un auto pequeño sin turbo. Antes de cerrar, "
        f"sume el seguro: como referencia, cuente con {SEGURO_REGLA}, según "
        f"{link(SEGURO_PRECIO, 'nuestra guía de seguro vehicular')}. Agregue matrícula, "
        "llantas y el primer mantenimiento completo, que en un auto usado siempre conviene "
        f"hacer apenas lo recibe. Qué incluir está en "
        f"{link(PRIMER_MANT, 'el primer mantenimiento después de comprar')}.",

        {"h2": "La Escape frente a la Ford Territory del patio"},

        "Hoy no tenemos una Escape en Ibarra, pero sí otra SUV de Ford de tamaño similar, "
        "con caja automática y poco recorrido para su precio:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("territory"),
        ]},

        f"La Territory usa un motor 1.5 turbo como las Escape más recientes. La analizamos "
        f"en {link(POST_TERRITORY, 'la guía de la Ford Territory usada')}. Si quiere ver "
        f"otras SUV del mismo tamaño, compare con {link(POST_TUCSON, 'la Hyundai Tucson')} "
        f"o {link(SPORTAGE, 'la Kia Sportage')}. {AVISO_INVENTARIO}",

        {"h2": "Cuándo una Escape usada no le conviene"},

        "Si la unidad es 2013 o 2014 con motor 1.6 y el vendedor no puede demostrar que se "
        "hicieron las campañas, no la compre hasta confirmarlo. El riesgo no se ve en una "
        "prueba de manejo.",

        "Tampoco conviene si busca el costo de mantenimiento más bajo posible. Un motor "
        "turbo bien cuidado rinde muchos años, pero no perdona aceites baratos ni cambios "
        "atrasados. Si va a recorrer poco y casi todo en ciudad, un auto más sencillo le "
        f"sale más barato; lo comparamos en {link(SUV_SEDAN, 'SUV o sedán usado')}.",

        "Y si va a viajar seguido desde Quito o desde Cayambe para verla, pida antes fotos "
        "del tablero encendido, de la placa del motor y de la matrícula. Con eso ya sabe "
        "qué generación es y si vale el viaje.",

        {"h2": "La regla para elegir bien"},

        "Primero la generación y el motor, después el año exacto, al final el "
        "kilometraje. Con esos tres datos, pregunte por las campañas con el número de "
        "chasis y compare el precio solo contra unidades de la misma generación, con el "
        f"método de {link(PRECIO_JUSTO, 'cuánto pagar por un auto usado')}.",

        {"faq": [
            ("¿Qué año de Ford Escape usada conviene más?",
             "Para la mayoría, una de tercera generación desde 2017 o una de cuarta "
             "generación, con las campañas de seguridad hechas. En las 2013 y 2014 con motor "
             "1.6, confirme las campañas antes de comprar."),
            ("¿Cómo sé si una Escape tuvo campañas de seguridad?",
             "Pida al concesionario Ford que consulte el número de chasis (VIN). Le dirá si "
             "la unidad tuvo campañas y si se aplicaron."),
            ("¿El motor EcoBoost es confiable?",
             "Rinde bien en la altura y tiene buena respuesta. Exige aceite de la "
             "especificación correcta y cambios a tiempo; un historial de mantenimiento "
             "completo vale más que un kilometraje bajo."),
            ("¿Qué revisar en la caja automática de una Escape?",
             "Que la marcha del tablero coincida con la de la palanca, que no se mueva en P "
             "en pendiente y que los cambios entren suaves en la prueba de manejo."),
            ("¿Hay alternativas de Ford en OKCars?",
             "Hoy tenemos una Ford Territory con caja automática en Ibarra. Consulte por "
             "WhatsApp si sigue disponible."),
        ]},

        cierre("Hola, busco una SUV como la Ford Escape y quiero ver las opciones de OKCars.",
               "Si busca una SUV compacta y quiere ver la Territory o las otras opciones que "
               "tenemos en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Kia Sorento usada
# ════════════════════════════════════════════════════════════════════════════
sorento = {
    "title": "Kia Sorento usada: qué generación conviene y qué revisar",
    "slug": "kia-sorento-usada-ecuador",
    "date": FECHAS[1],
    "cat": CAT["modelos"],
    "tags": ["Kia Sorento usada", "SUV de siete asientos", "SUV usadas Ecuador",
             "Kia Ecuador", "seminuevos Imbabura"],
    "excerpt": "La Sorento es la SUV grande de Kia y muchas unidades tienen tercera fila. "
               "Cómo ubicar la generación, qué campaña de motor revisar con el número de "
               "chasis y cuándo conviene otra opción.",
    "yoast_title": "Kia Sorento usada: qué generación conviene",
    "yoast_desc": "Tercera fila, motor 2.4 y campañas por desgaste de cojinetes: cómo elegir "
                  "una Kia Sorento usada y qué pedir que revisen antes de pagar por ella.",
    "focus_kw": "kia sorento usada",
    "bloques": [
        "Quien busca una Sorento usada casi siempre busca espacio: una SUV grande, con "
        "buena altura para los caminos de la Sierra y, en muchas versiones, una tercera "
        "fila de asientos. Es la hermana mayor de la Sportage dentro de Kia y se ha "
        "vendido en el país durante varias generaciones.",

        "Como pasa con casi todos los modelos con historia larga, el nombre dice poco. Una "
        "Sorento de los primeros años y una reciente son autos de construcción diferente. "
        "En esta guía le ayudamos a ubicar la generación, le contamos qué campaña de motor "
        "conviene confirmar y qué revisar antes de pagar.",

        {"h2": "La respuesta corta: elija la generación y confirme el motor"},

        "Una Sorento usada es una compra razonable si necesita espacio para cinco o siete "
        "personas y encuentra una unidad con historial de mantenimiento. El punto que más "
        "cambia la decisión es el motor 2.4 a gasolina de las unidades de alrededor de "
        "2011 a 2014: en Estados Unidos tuvo campañas por desgaste prematuro de los "
        "cojinetes. Si la unidad es de esos años, pida la consulta por número de chasis "
        "antes de negociar.",

        {"h2": "Cómo ubicar la generación"},

        "Los años son aproximados y cambian según el mercado. El año de la matrícula y el "
        "diseño de la carrocería le dicen frente a cuál está.",

        {"tabla": [
            ["Generación", "Años aproximados", "Construcción", "Para quién"],
            ["Primera", "2002 – 2009", "Chasis de largueros, más cercana a un todoterreno",
             "Quien necesita robustez y acepta un manejo más rústico"],
            ["Segunda", "2010 – 2014", "Monocasco, como un auto", "Familia con presupuesto "
             "medio; revisar el motor 2.4"],
            ["Tercera", "2015 – 2020", "Monocasco, más grande y mejor equipada",
             "Familia que viaja seguido"],
            ["Cuarta", "2021 en adelante", "Monocasco; en algunos mercados también híbrida",
             "Quien prioriza tecnología y seguridad"],
        ]},

        "La primera generación es otro tipo de vehículo: más pesada, más alta y con "
        "versiones 4x4 de corte más tradicional. Desde la segunda, la Sorento se maneja "
        "como una SUV familiar. Según el mercado hubo motores a gasolina de cuatro "
        "cilindros, V6 y diésel; confirme el que trae la unidad en la matrícula.",

        {"h2": "Las campañas del motor 2.4 que conviene confirmar"},

        "Según los expedientes públicos de la NHTSA de Estados Unidos, estas son las "
        "campañas que más pesan al comprar una Sorento usada de esos años:",

        {"ul": [
            "<strong>2012 a 2014 con motor 2.4 de inyección directa (campaña 17V-224):"
            "</strong> residuos del maquinado podían causar desgaste prematuro de los "
            "cojinetes. Los síntomas descritos son un golpeteo rítmico del motor y la luz "
            "de motor o de presión de aceite encendida. La solución era inspeccionar y, si "
            "hacía falta, cambiar el bloque del motor.",
            "<strong>2011 con motor 2.4 de inyección multipunto (campaña 23V-877):</strong> "
            "se instaló un programa de detección de golpeteo que avisa al conductor y limita "
            "la potencia si detecta una falla en camino, con garantía extendida para el "
            "motor en ese mercado.",
        ]},

        AVISO_CAMPANAS,

        {"h2": "Qué revisar en una Sorento usada"},

        "Sume estos puntos al "
        f"{link(CHECKLIST, 'checklist para revisar un auto usado')}:",

        {"ol": [
            "<strong>El sonido del motor en frío.</strong> Pida verla sin haber sido "
            "encendida antes. Un golpeteo que sube con las revoluciones es motivo para "
            "detener la compra hasta que la revise un mecánico.",
            "<strong>Consumo de aceite.</strong> Pregunte cada cuánto le completaban el "
            "nivel. Un motor que pide aceite entre cambios está avisando algo.",
            "<strong>La tercera fila.</strong> Si la va a usar, súbase. Revise que los "
            "asientos se abran y se plieguen bien y que los cinturones funcionen.",
            "<strong>Suspensión trasera.</strong> Una SUV que viajó cargada con siete "
            "personas desgasta amortiguadores y bujes antes.",
            "<strong>Caja automática.</strong> Cambios suaves en subida y sin golpes al "
            f"poner reversa. Haga la prueba con el método de "
            f"{link(PRUEBA_MANEJO, 'la prueba de manejo de un auto usado')}.",
            "<strong>Historial de mantenimiento.</strong> En una SUV de este tamaño, las "
            "facturas de cambios de aceite valen más que cualquier promesa.",
        ]},

        {"quote": "En una Sorento de esos años, escuche el motor en frío antes de mirar la "
                  "pintura. Un golpeteo que el vendedor llama normal es el que más caro sale.",
         "cite": CITA},

        {"h2": "Sorento o Sportage: cuál le sirve"},

        "Las dos son de Kia, pero apuntan a necesidades distintas. La Sportage es una SUV "
        "mediana para cinco personas, más fácil de estacionar en el centro de Ibarra y de "
        "menor consumo. La Sorento es más grande, pesa más y gasta más, pero lleva más "
        "gente y más equipaje cómodamente en un viaje a la Costa.",

        f"Si casi nunca va a ocupar más de cinco asientos, empiece por "
        f"{link(SPORTAGE, 'la guía de la Kia Sportage usada')}. Si la familia es grande o "
        f"suele viajar con abuelos y niños, revise también "
        f"{link(FAMILIA, 'qué mirar en un auto usado para familia con niños')}.",

        {"h2": "Alternativas reales en el patio de Ibarra"},

        "Hoy no tenemos una Sorento, pero sí vehículos que cubren la misma necesidad desde "
        "dos ángulos: espacio para siete o una SUV mediana a un precio más bajo.",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("sienna"),
            fila("tucson"),
        ]},

        f"La {enlace_ficha('sienna')} es una minivan con espacio de sobra para siete; la "
        f"analizamos en {link(POST_SIENNA, 'la guía de minivan usada')}. La "
        f"{enlace_ficha('tucson')} es una SUV mediana para cinco con mucho recorrido y "
        f"precio de entrada, detallada en {link(POST_TUCSON, 'la guía de la Tucson usada')}. "
        f"{AVISO_INVENTARIO}",

        {"h2": "Cuándo una Sorento usada no le conviene"},

        "Si la va a usar casi siempre sola o en pareja dentro de la ciudad, está pagando "
        "tamaño y consumo que no aprovecha. Una SUV mediana le dará casi la misma altura "
        "con menos gasto.",

        "Tampoco conviene una unidad con motor 2.4 de 2011 a 2014 cuyo dueño no sabe si se "
        "hizo la campaña ni tiene facturas de cambios de aceite. Ahí el riesgo es caro y "
        "no se ve en una prueba corta.",

        {"h2": "La regla para elegir bien"},

        "Defina primero cuántos asientos necesita de verdad. Si son siete, compare la "
        "Sorento contra una minivan antes de decidir. Si son cinco, compare contra una SUV "
        "mediana. Elija después la generación según su presupuesto, y entre dos unidades "
        "parecidas quédese con la que tenga el motor revisado y el historial completo.",

        {"faq": [
            ("¿Qué año de Kia Sorento usada conviene?",
             "Depende del presupuesto. Desde la tercera generación el equipamiento y el "
             "espacio mejoran bastante. En las de 2011 a 2014 con motor 2.4, confirme las "
             "campañas del motor con el número de chasis."),
            ("¿Todas las Sorento tienen tercera fila?",
             "No. Hay versiones de cinco y de siete asientos. Confirme la configuración en "
             "la unidad y súbase a la tercera fila si la va a usar."),
            ("¿Cómo sé si el motor de una Sorento tiene problemas?",
             "Escúchelo en frío. Un golpeteo rítmico que sube con las revoluciones o la luz "
             "de presión de aceite encendida son razones para detener la compra."),
            ("¿Es mejor una Sorento o una Sportage usada?",
             "La Sorento si necesita espacio para más de cinco o mucho equipaje; la "
             "Sportage si son cinco o menos y quiere gastar menos en combustible."),
            ("¿Dónde verifican las campañas de una Kia?",
             "En el concesionario Kia, con el número de chasis (VIN). Le dirán si la unidad "
             "tuvo campañas y si se aplicaron."),
        ]},

        cierre("Hola, busco una SUV o minivan para familia grande y quiero ver las opciones "
               "de OKCars.",
               "Si necesita espacio para toda la familia y quiere ver las opciones que "
               "tenemos en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Toyota RAV4 usada
# ════════════════════════════════════════════════════════════════════════════
rav4 = {
    "title": "Toyota RAV4 usada: qué generación conviene y qué revisar",
    "slug": "toyota-rav4-usada-ecuador",
    "date": FECHAS[2],
    "cat": CAT["modelos"],
    "tags": ["Toyota RAV4 usada", "RAV4 híbrida", "SUV usadas Ecuador",
             "Toyota Ecuador", "comprar SUV usada Ibarra"],
    "excerpt": "La RAV4 tiene fama de durar y se revende bien, por eso cuesta más que sus "
               "rivales. Qué generación conviene, qué revisar en cada una y cuándo pagar "
               "esa diferencia no tiene sentido.",
    "yoast_title": "Toyota RAV4 usada: qué generación conviene",
    "yoast_desc": "Consumo de aceite en el 2.4, la batería de 12 voltios y la versión "
                  "híbrida: qué revisar en una Toyota RAV4 usada según su generación antes de pagar.",
    "focus_kw": "toyota rav4 usada",
    "bloques": [
        "La RAV4 tiene una reputación que pocas SUV consiguen: la gente la compra pensando "
        "en que dure muchos años y en que se venda fácil cuando llegue el momento. Esa fama "
        "tiene un efecto directo en el mercado de usados: una RAV4 suele pedir más dinero "
        "que una SUV de otra marca del mismo año y tamaño.",

        "La pregunta útil no es si la RAV4 es buena, sino si la unidad concreta que le "
        "ofrecen justifica lo que piden por ella. Esta guía le ayuda a ubicar la "
        "generación, a saber qué revisar en cada una y a decidir cuándo pagar esa "
        "diferencia tiene sentido.",

        {"h2": "La respuesta corta: pague la fama solo si la unidad la respalda"},

        "Una RAV4 usada vale lo que pide cuando tiene historial de mantenimiento completo, "
        "las campañas de seguridad hechas y un estado acorde a su año. Sin eso, está "
        "pagando la reputación del modelo y no el auto que se lleva.",

        f"La reventa es real: lo explicamos en "
        f"{link(REVENTA, 'qué autos usados se revenden mejor')}. Pero esa ventaja solo la "
        "cobra quien vende un auto bien cuidado y con papeles en orden.",

        {"h2": "Las generaciones que se ven en el mercado de usados"},

        "Los años son aproximados y varían según el mercado. En el país se ven sobre todo "
        "estas tres, y la más reciente se vende nueva también en versión híbrida.",

        {"tabla": [
            ["Generación", "Años aproximados", "Motores habituales", "Qué revisar primero"],
            ["Tercera", "2006 – 2012", "2.4 y 2.0 a gasolina, V6 en algunos mercados",
             "Consumo de aceite en el 2.4"],
            ["Cuarta", "2013 – 2018", "2.0 y 2.5 a gasolina",
             "Instalación de la batería de 12 voltios"],
            ["Quinta", "2019 en adelante", "2.0 y 2.5 a gasolina, híbrida 2.5",
             "Batería híbrida y mantenimiento en concesionario"],
        ]},

        "En 2025 Toyota presentó una sexta generación; en el mercado de usados todavía "
        "será poco frecuente durante un buen tiempo.",

        {"h2": "Qué revisar según la generación"},

        {"h3": "Tercera generación: el consumo de aceite"},

        "En Estados Unidos, Toyota abrió un programa de garantía extendida para algunos "
        "motores 2.4 de RAV4 2006 a 2008 por consumo excesivo de aceite: el umbral de la "
        "prueba era más de un litro cada 1.930 km de manejo normal. No fue una campaña de "
        "seguridad, pero señala un punto débil de ese motor.",

        "En una unidad de esos años, pregunte cada cuánto completaban el aceite, mire si "
        "sale humo azulado al acelerar después de estar en ralentí y pida a su mecánico que "
        "revise el estado de las bujías.",

        {"h3": "Cuarta generación: la batería de 12 voltios"},

        "La campaña 23V-734 de la NHTSA cubrió RAV4 2013 a 2018 en Estados Unidos: si se "
        "instalaba una batería de reemplazo más pequeña que la original y la sujeción no "
        "quedaba firme, la batería podía moverse en curvas fuertes, hacer contacto con la "
        "abrazadera y provocar un corto con riesgo de incendio. La solución fue cambiar la "
        "abrazadera, la bandeja y la tapa del borne positivo.",

        "Abra el capó y mire la batería: debe estar firme, del tamaño correcto y con la tapa "
        "del borne positivo en su lugar. Es una revisión de un minuto.",

        {"h3": "Quinta generación híbrida: la batería grande"},

        f"La RAV4 híbrida es de las SUV que más interés despiertan, y en Ecuador se vende "
        f"nueva en versiones XLE, XSE y Limited con tracción eléctrica en las cuatro ruedas "
        f"(E-Four), según {link('https://elyex.com/toyota-rav4-hibrido-en-ecuador-caracteristicas-versiones-y-precio/', 'Elyex')}. "
        f"En una usada, lo que decide es el estado de la batería híbrida y que el "
        f"mantenimiento se haya hecho donde saben de híbridos. Qué pedir lo explicamos en "
        f"{link(HIBRIDOS, 'la guía de autos híbridos usados')}.",

        AVISO_CAMPANAS,

        {"quote": "Una RAV4 sin historial de mantenimiento no es una RAV4 cara: es un auto "
                  "usado cualquiera con precio de RAV4. Pida las facturas antes de negociar.",
         "cite": CITA},

        {"h2": "La lista general antes de pagar"},

        {"ol": [
            "Facturas de mantenimiento, idealmente con cambios de aceite a tiempo.",
            "Consulta de campañas por número de chasis en el concesionario Toyota.",
            "Prueba de manejo con subida: en la vía a Yahuarcocha o cualquier pendiente "
            "larga se nota si la caja patina o el motor se queda sin fuerza.",
            "Revisión en elevador de la suspensión y, en versiones 4x4, del eje trasero.",
            f"Papeles en orden: sin prenda, sin multas y con el dueño correcto. El paso a "
            f"paso está en {link(VERIFICAR_DEUDAS, 'cómo saber si un auto usado tiene deudas')}.",
        ]},

        {"h2": "RAV4 frente a la Mazda CX-5 del patio"},

        "Hoy no tenemos una RAV4 en Ibarra, pero sí una SUV del mismo tamaño, reciente y "
        "con poco recorrido:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("cx5"),
        ]},

        f"La CX-5 compite directamente con la RAV4 en tamaño y equipamiento. La analizamos "
        f"en {link(POST_CX5, 'la guía de la Mazda CX-5 usada')}. Si lo que le atrae de la "
        f"RAV4 es el sistema híbrido, el {enlace_ficha('prius')} del patio es la puerta de "
        f"entrada más barata a esa tecnología; lo contamos en "
        f"{link(POST_PRIUS, 'la guía del Prius C con alto kilometraje')}. {AVISO_INVENTARIO}",

        {"h2": "Cuándo una RAV4 usada no le conviene"},

        "Si su presupuesto solo alcanza una unidad de tercera generación con mucho "
        "recorrido y sin facturas, lo más probable es que pague de más por el nombre. Una "
        "SUV de otra marca, más reciente y con historial, puede ser mejor compra por el "
        "mismo dinero.",

        "Tampoco conviene si lo único que busca es altura al piso y espacio para la ciudad. "
        f"Para ese uso hay SUV más pequeñas y baratas; compárelas en "
        f"{link(MEJORES_SUV, 'mejores SUV usadas según cómo va a usarla')}.",

        {"h2": "La regla para elegir bien"},

        "Ubique la generación, revise el punto débil propio de esa generación y exija "
        "historial. Si la unidad cumple las tres cosas, la diferencia de precio frente a "
        "sus rivales se recupera en la reventa. Si falla en alguna, negocie como si fuera "
        "un auto de cualquier otra marca.",

        {"faq": [
            ("¿Qué generación de RAV4 usada conviene?",
             "La cuarta (2013 a 2018) suele ser el punto medio entre precio y equipamiento. "
             "La quinta trae la opción híbrida y más tecnología, a un precio mayor."),
            ("¿La RAV4 de tercera generación consume aceite?",
             "Algunos motores 2.4 de 2006 a 2008 tuvieron consumo excesivo y Toyota extendió "
             "su garantía en Estados Unidos. Pregunte cada cuánto completaban el nivel."),
            ("¿Qué revisar en una RAV4 híbrida usada?",
             "El estado de la batería híbrida, el historial de mantenimiento y que no haya "
             "testigos encendidos. Un diagnóstico en concesionario es la forma segura."),
            ("¿Por qué la RAV4 usada es más cara que otras SUV?",
             "Por su fama de durabilidad y buena reventa. Esa diferencia se justifica solo "
             "si la unidad tiene historial completo y buen estado."),
            ("¿Cómo sé si una RAV4 tuvo campañas de seguridad?",
             "Pida al concesionario Toyota que consulte el número de chasis (VIN)."),
        ]},

        cierre("Hola, busco una SUV mediana como la RAV4 y quiero ver las opciones de "
               "OKCars.",
               "Si busca una SUV mediana y quiere ver la CX-5 u otras opciones que tenemos "
               "en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Hyundai Creta usada
# ════════════════════════════════════════════════════════════════════════════
creta = {
    "title": "Hyundai Creta usada: qué generación conviene y qué revisar",
    "slug": "hyundai-creta-usada-ecuador",
    "date": FECHAS[3],
    "cat": CAT["modelos"],
    "tags": ["Hyundai Creta usada", "SUV compacta usada", "SUV usadas Ecuador",
             "Hyundai Ecuador", "seminuevos Imbabura"],
    "excerpt": "La Creta es la SUV compacta de Hyundai y desde 2025 se ensambla en Quito. "
               "Cómo distinguir sus dos generaciones, qué revisar en una usada y cómo rinde "
               "su motor en la altura de la Sierra.",
    "yoast_title": "Hyundai Creta usada: qué generación conviene",
    "yoast_desc": "Motor 1.6 o 1.5, caja manual o IVT, airbags según versión: cómo elegir una "
                  "Hyundai Creta usada y qué revisar antes de pagar, con alternativas en Ibarra.",
    "focus_kw": "hyundai creta usada",
    "bloques": [
        "La Creta es la SUV compacta de Hyundai, un escalón por debajo de la Tucson. Es "
        "de las que más buscan quienes quieren altura al piso y una cabina cómoda sin "
        "pagar lo que cuesta una SUV mediana. Y tiene un dato local: desde octubre de 2025 "
        "se ensambla en la planta de Aymesa, en Quito, según "
        f"{link('https://ekosnegocios.com/articulo/hyundai-refuerza-su-compromiso-con-el-ecuador-y-lanza-su-nuevo-suv-creta-ensamblado-localmente', 'Ekos Negocios')}.",

        "En el mercado de usados conviven dos generaciones con motores y cajas diferentes. "
        "Esta guía le ayuda a distinguirlas, le dice qué revisar en una unidad usada y le "
        "muestra qué alternativas de tamaño parecido tenemos en Ibarra.",

        {"h2": "La respuesta corta: compare dentro de la misma generación"},

        "Una Creta usada es una buena compra para ciudad y carretera con una familia "
        "pequeña, siempre que la unidad tenga mantenimiento al día. El error más común es "
        "comparar precios entre la primera y la segunda generación como si fueran el mismo "
        "auto: cambian el motor, la caja y buena parte del equipamiento.",

        {"h2": "Las dos generaciones, lado a lado"},

        "Los años son aproximados y dependen del mercado de origen de cada unidad.",

        {"tabla": [
            ["Generación", "Años aproximados", "Motor habitual en la región", "Cajas"],
            ["Primera", "2016 – 2020", "1.6 a gasolina, unos 123 hp",
             "Manual o automática de seis velocidades"],
            ["Segunda", "2021 en adelante", "1.5 Smartstream a gasolina, unos 114-115 hp",
             "Manual de seis o automática IVT"],
        ]},

        "La IVT es la caja de variación continua de Hyundai. En lugar de marchas fijas "
        "trabaja con una relación que cambia sin saltos, y simula ocho cambios para que la "
        "sensación sea más natural. La Creta que se ensambla en Quito desde 2025 trae motor "
        "1.5 de 114 hp, caja manual de seis velocidades, seis airbags y control de "
        "estabilidad, según la nota de lanzamiento.",

        "El equipamiento de seguridad cambia mucho entre versiones y años. Antes de "
        "comparar dos unidades, cuente los airbags y pregunte si tiene control de "
        "estabilidad: es una diferencia que no se ve en las fotos.",

        {"h2": "Cómo rinde en la altura"},

        "Los dos motores de la Creta son de aspiración natural, sin turbo. A la altura de "
        "Ibarra, de Otavalo o de Quito, un motor así entrega menos fuerza que a nivel del "
        "mar, y con el auto cargado se nota en las subidas largas. No es un defecto de la "
        "Creta: les pasa a todos los motores sin turbo.",

        f"En la prueba de manejo, súbala por una pendiente con dos o tres personas a bordo y "
        f"decida si la respuesta le alcanza. La comparación con los motores turbo está en "
        f"{link(MOTOR_TURBO, 'motor turbo o atmosférico en la altura')}.",

        {"h2": "Qué revisar en una Creta usada"},

        "Los puntos generales del "
        f"{link(CHECKLIST, 'checklist para revisar un auto usado')} aplican igual. En la "
        "Creta sume estos:",

        {"ol": [
            "<strong>La caja IVT.</strong> En la prueba debe acelerar de forma continua, "
            "sin tirones ni zumbidos fuertes. Pregunte si se cambió el aceite de la caja "
            "según lo que indica el manual del propietario.",
            "<strong>El embrague en las manuales.</strong> Si engancha muy arriba del pedal "
            "o huele a quemado en una subida, está gastado.",
            "<strong>Suspensión delantera.</strong> Las SUV compactas que circulan por "
            "calles empedradas desgastan bujes y terminales. Escuche golpes al pasar "
            "rompevelocidades.",
            "<strong>Airbags y testigos.</strong> Al encender, la luz del airbag debe "
            "prenderse unos segundos y apagarse. Si queda encendida, hay un problema en el "
            "sistema.",
            "<strong>Origen y campañas.</strong> La Creta no se vende en Estados Unidos, "
            "así que no aparece en los registros de la NHTSA. Consulte en el concesionario "
            "Hyundai con el número de chasis si la unidad tiene alguna campaña pendiente.",
            f"<strong>Consumo.</strong> Si el vendedor le da una cifra, verifíquela usted "
            f"con el método de {link(CONSUMO, 'cómo medir el consumo real')}.",
        ]},

        {"quote": "En una SUV compacta como la Creta, la diferencia entre dos unidades del "
                  "mismo año casi siempre está en la versión. Cuente los airbags antes de "
                  "comparar precios.",
         "cite": CITA},

        {"h2": "Creta, Seltos o Kicks: el mismo tamaño, tres caracteres"},

        f"La Creta compite directamente con la Kia Seltos, con la que comparte grupo "
        f"fabricante, y con el Nissan Kicks. La Seltos suele ofrecer más equipamiento por "
        f"versión; lo vemos en {link(POST_SELTOS, 'la guía de la Kia Seltos usada')}. El "
        f"Kicks apuesta por el bajo consumo en ciudad, como contamos en "
        f"{link(KICKS, 'la guía del Nissan Kicks usado')}.",

        {"h2": "Alternativas reales en el patio de Ibarra"},

        "Hoy no tenemos una Creta, pero sí SUV del mismo segmento o del siguiente:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("seltos"),
            fila("territory"),
            fila("tucson"),
        ]},

        f"La {enlace_ficha('seltos')} es la rival directa de la Creta. La "
        f"{enlace_ficha('territory')} es un poco más grande y tiene motor turbo, útil en la "
        f"altura. La {enlace_ficha('tucson')} es la opción de precio de entrada, con mucho "
        f"recorrido. {AVISO_INVENTARIO}",

        {"h2": "Cuándo una Creta usada no le conviene"},

        "Si viaja seguido con el auto lleno por carreteras de montaña, por ejemplo hacia "
        "Tulcán o hacia la Costa, un motor sin turbo de 1.5 o 1.6 puede quedarse corto. En "
        "ese caso, mire una SUV con turbo o con un motor más grande.",

        "Tampoco conviene si necesita siete asientos o una cajuela grande para trabajo. La "
        "Creta es una SUV para ciudad y viajes de fin de semana; para más carga, una SUV "
        "mediana o una camioneta le servirán mejor.",

        {"h2": "La regla para elegir bien"},

        "Identifique la generación, la caja y la versión. Con esos tres datos compare "
        "precios solo contra unidades iguales, cuente los airbags y haga la prueba con "
        f"subida y pasajeros. El precio lo ubica con el método de "
        f"{link(PRECIO_JUSTO, 'cuánto pagar por un auto usado')}.",

        {"faq": [
            ("¿Qué generación de Hyundai Creta conviene?",
             "La segunda trae motor 1.5 más moderno y caja IVT en versiones automáticas. La "
             "primera puede ser más barata; elija por estado y versión antes que por año."),
            ("¿La Creta tiene buena fuerza en la altura?",
             "Su motor no tiene turbo, así que pierde algo de fuerza a la altura de la "
             "Sierra. Para ciudad alcanza; pruébela con pasajeros en una subida larga."),
            ("¿Qué es la caja IVT de la Creta?",
             "Es una caja de variación continua: acelera sin saltos de marcha y simula ocho "
             "cambios. Pida el historial de cambios de su aceite."),
            ("¿La Creta se fabrica en Ecuador?",
             "Desde octubre de 2025 se ensambla en la planta de Aymesa, en Quito, con motor "
             "1.5 y caja manual, según la nota de lanzamiento."),
            ("¿Qué alternativa a la Creta hay en OKCars?",
             "La Kia Seltos es su rival directa y hoy está en el patio de Ibarra. Consulte "
             "por WhatsApp si sigue disponible."),
        ]},

        cierre("Hola, busco una SUV compacta como la Creta y quiero ver las opciones de "
               "OKCars.",
               "Si busca una SUV compacta y quiere ver la Seltos u otras opciones que "
               "tenemos en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · SUV usadas por menos de $15.000
# ════════════════════════════════════════════════════════════════════════════
MONTO = 15000
ENTRADA_EJ = 4500
FIN = MONTO - ENTRADA_EJ
C36, C48, C60 = (cuota(FIN, n) for n in (36, 48, 60))


def usd(x):
    return "$" + f"{x:,.0f}".replace(",", ".")


suv15 = {
    "title": "SUV usadas por menos de $15.000: qué se puede comprar",
    "slug": "suv-usadas-menos-de-15000-ecuador",
    "date": FECHAS[4],
    "cat": CAT["guias"],
    "tags": ["SUV usadas baratas", "SUV usadas Ecuador", "autos usados por presupuesto",
             "comprar SUV usada Ibarra", "seminuevos Imbabura"],
    "excerpt": "Con $15.000 se puede comprar una SUV usada, pero hay que elegir qué "
               "sacrificar: año, tamaño o kilometraje. Cómo decidir, cuánto reservar para "
               "gastos y qué opciones reales hay en Ibarra.",
    "yoast_title": "SUV usadas por menos de $15.000: qué se puede comprar",
    "yoast_desc": "Año, tamaño o kilometraje: qué sacrificar al buscar una SUV usada por "
                  "menos de $15.000, cuánto reservar para gastos y qué opciones reales hay en Ibarra.",
    "focus_kw": "suv usadas menos de 15000",
    "bloques": [
        "Quince mil dólares es una cifra que aparece mucho en las búsquedas de SUV usadas "
        "en Ecuador. Alcanza para una SUV, pero no para todo a la vez: con ese tope casi "
        "siempre hay que renunciar a algo, y la compra sale bien o mal según qué se "
        "sacrifica.",

        "En esta guía no le vamos a dar una lista de precios de otros vendedores, porque "
        "cambian cada semana y dependen del estado de cada unidad. Le explicamos cómo "
        "decidir qué sacrificar, cuánto del presupuesto reservar para gastos que llegan "
        "después de la compra y qué opciones reales hay hoy en nuestro patio de Ibarra.",

        {"h2": "La respuesta corta: elija entre año, tamaño y kilometraje"},

        "Con menos de $15.000, una SUV usada suele cumplir dos de estas tres condiciones, "
        "rara vez las tres: ser relativamente reciente, ser grande y tener poco recorrido. "
        "Una SUV mediana de hace más de diez años puede entrar en ese presupuesto, igual "
        "que una compacta más nueva. Lo que casi no aparece es una SUV mediana reciente "
        "con poco recorrido.",

        {"tabla": [
            ["Si prioriza…", "Lo más probable es que encuentre", "Lo que sacrifica"],
            ["Tamaño", "SUV mediana de generación anterior", "Año y, a veces, kilometraje"],
            ["Año", "SUV compacta más reciente", "Espacio interior y cajuela"],
            ["Bajo kilometraje", "SUV compacta o de entrada con poco uso", "Tamaño o equipamiento"],
            ["Tracción 4x4", "SUV con años encima", "Comodidad y consumo"],
        ]},

        f"No hay una opción correcta para todos. Una familia de cinco que viaja seguido a "
        f"la Costa necesita tamaño; una persona que maneja en Ibarra y va a Otavalo los "
        f"fines de semana puede priorizar el año. Para ordenar esa decisión según el uso, "
        f"use {link(MEJORES_SUV, 'mejores SUV usadas según cómo va a usarla')}.",

        {"h2": "No gaste los $15.000 en la compra"},

        "El error más caro con un presupuesto ajustado es usar todo el dinero en el precio "
        "del auto. Después de la compra llegan gastos que no se pueden postergar:",

        {"ul": [
            f"<strong>Traspaso.</strong> Notaría entre {COSTO_NOTARIA} y tasa de la "
            f"agencia de tránsito entre {COSTO_TASA_ANT}, como referencia; los valores "
            "cambian según el cantón.",
            f"<strong>Primer mantenimiento.</strong> Aceite, filtros, frenos y lo que "
            f"aparezca en la revisión. Qué incluir está en "
            f"{link(PRIMER_MANT, 'el primer mantenimiento después de comprar')}.",
            "<strong>Llantas.</strong> En una SUV usada es frecuente que haya que cambiar "
            "el juego completo al poco tiempo.",
            f"<strong>Seguro.</strong> Como referencia, {SEGURO_REGLA}: en una SUV de "
            "$15.000 son unos $550 a $800 al año.",
        ]},

        "Una regla práctica: busque autos que cuesten unos $1.000 a $1.500 menos que su "
        "tope y deje esa diferencia para los gastos de los primeros meses. Una SUV de "
        "$13.500 con todo al día rinde más que una de $15.000 que necesita llantas y frenos "
        "la primera semana.",

        {"h2": "Si va a financiar, calcule la cuota antes de buscar"},

        f"Con una SUV de {usd(MONTO)}, una entrada de {usd(ENTRADA_EJ)} (30 %) y "
        f"{usd(FIN)} financiados a una tasa referencial del 14 % anual, la cuota queda "
        "aproximadamente así:",

        {"tabla": [
            ["Plazo", "Cuota mensual aproximada"],
            ["36 meses", usd(C36)],
            ["48 meses", usd(C48)],
            ["60 meses", usd(C60)],
        ]},

        f"Es un cálculo de referencia; la tasa real depende de la entidad y de su perfil. "
        f"Cómo se arma está en {link(CUOTA, 'cómo calcular la cuota mensual de un auto usado')} "
        f"y cuánto conviene dar de entrada en "
        f"{link(ENTRADA, 'cuánto dar de entrada por un auto usado')}.",

        {"h2": "Modelos que suelen aparecer en ese rango"},

        "Según el año, el estado y el kilometraje, algunas unidades de estos modelos entran "
        "por debajo de $15.000. Le dejamos la guía de cada uno para revisar sus puntos "
        "débiles antes de ir a verlos:",

        {"ul": [
            f"{link(DUSTER, 'Renault Duster')}: altura y mecánica sencilla, interior simple.",
            f"{link(KICKS, 'Nissan Kicks')}: compacta y de bajo consumo para ciudad.",
            f"{link(TIGGO, 'Chery Tiggo')}: varios tamaños; revise el respaldo de repuestos.",
            f"{link(VITARA, 'Suzuki Grand Vitara')}: de las pocas con 4x4 de corte tradicional.",
            f"{link(SPORTAGE, 'Kia Sportage')} y {link(XTRAIL, 'Nissan X-Trail')}: SUV "
            "medianas de generaciones anteriores.",
            f"{link(CAPTIVA, 'Chevrolet Captiva')}: espacio a precio contenido, con sus "
            "propios puntos a revisar.",
        ]},

        f"Para saber si el precio de una unidad concreta es razonable, compárela solo "
        f"contra publicaciones del mismo año, versión y kilometraje, con el método de "
        f"{link(PRECIO_JUSTO, 'cuánto pagar por un auto usado')}.",

        {"quote": "Con un presupuesto ajustado, la mejor SUV no es la más grande que alcanza "
                  "a pagar. Es la que puede mantener sin sustos durante los próximos tres "
                  "años.",
         "cite": CITA},

        {"h2": "Lo que tenemos hoy por debajo de $15.000 en Ibarra"},

        "En el patio hay dos SUV medianas de generaciones anteriores dentro de ese "
        "presupuesto. Las dos tienen mucho recorrido y lo decimos de frente: el precio "
        "refleja eso.",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("koleos"),
            fila("tucson"),
        ]},

        f"Contamos con detalle cuándo una SUV así conviene y cuándo sale cara en "
        f"{link(POST_KOLEOS, 'la guía del Renault Koleos de $8.500')} y en "
        f"{link(POST_TUCSON, 'la guía de la Hyundai Tucson usada')}. Si no necesita una "
        f"SUV, el {enlace_ficha('prius')} de $13.000 es un híbrido de bajo consumo para "
        f"ciudad. {AVISO_INVENTARIO}",

        {"h2": "Cuándo una SUV usada barata no le conviene"},

        f"Si casi toda su rutina es ciudad y no carga peso ni entra a caminos de tierra, "
        f"un sedán o un hatchback del mismo precio será más nuevo, gastará menos y costará "
        f"menos de asegurar. Lo comparamos en {link(SUV_SEDAN, 'SUV o sedán usado')}.",

        "Tampoco conviene estirar el presupuesto hasta el límite con un crédito largo para "
        "alcanzar una SUV más grande. Si la cuota deja poco margen, una reparación "
        "inesperada desarma el plan. Y una unidad con más de 250.000 km solo tiene sentido "
        "con historial completo y una revisión mecánica favorable.",

        {"h2": "La regla para comprar bien con $15.000"},

        "Decida qué sacrifica, reserve entre $1.000 y $1.500 para los primeros gastos, "
        f"revise la unidad con un mecánico antes de pagar (vea "
        f"{link(REVISION, 'la revisión mecánica antes de comprar')}) y compare precios "
        "solo entre autos iguales. Con eso, un presupuesto ajustado alcanza para una SUV "
        "que le sirva varios años.",

        {"faq": [
            ("¿Qué SUV usada se puede comprar con $15.000 en Ecuador?",
             "Según año y estado, SUV compactas como Duster, Kicks o Tiggo, o SUV medianas "
             "de generaciones anteriores como Sportage, X-Trail o Tucson. Revise cada "
             "unidad con su guía antes de decidir."),
            ("¿Es mejor una SUV grande vieja o una pequeña más nueva?",
             "Depende del uso. Si necesita espacio de verdad, la grande; si maneja sobre "
             "todo en ciudad, la pequeña más nueva suele dar menos gastos."),
            ("¿Cuánto debo reservar además del precio?",
             "Como regla práctica, entre $1.000 y $1.500 para traspaso, primer "
             "mantenimiento, llantas y la primera cuota del seguro."),
            ("¿Cuánto pagaría al mes por una SUV de $15.000 a crédito?",
             f"Con $4.500 de entrada y 48 meses a una tasa referencial del 14 %, unos "
             f"{usd(C48)} al mes. La tasa real depende de la entidad."),
            ("¿Tiene OKCars SUV por menos de $15.000?",
             "Hoy hay un Renault Koleos y una Hyundai Tucson en el patio de Ibarra por "
             "debajo de ese precio. Confirme por WhatsApp que sigan disponibles."),
        ]},

        cierre("Hola, busco una SUV usada por menos de $15.000 y quiero ver las opciones de "
               "OKCars.",
               "Si busca una SUV por menos de $15.000 y quiere ver las opciones que tenemos "
               "en Ibarra, escríbanos al"),
    ],
}


if __name__ == "__main__":
    for s in [escape, sorento, rav4, creta, suv15]:
        print(guarda(s))
