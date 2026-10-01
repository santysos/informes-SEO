#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote Q — SUV más buscadas en el mercado de usados + post hub (5 posts, noviembre 2026).

OKCars no tiene hoy estas unidades en el patio. Cada guía sirve a quien busca el modelo:
qué revisar, cuándo no conviene y qué alternativas reales hay en el inventario de Ibarra.

Escrito en USTED. Sin precios de mercado inventados ni especificaciones dudosas: los años
de generación se dan como aproximados y solo cuando son de conocimiento general. El año de
Seltos y Territory no se escribe (pendiente de confirmar con el cliente).
"""
from comun import (SEGURO_REGLA, SEGURO_PRECIO, CUOTA, AUTO_MANUAL, CAT, CHECKLIST, CITA, CUATRO_X_CUATRO, DEVALUA, FECHAS,
                   FICHA, KILOMETRAJE, LISTADO, PRECIO_JUSTO, PRIMER_MANT, PRUEBA_MANEJO,
                   POST_CX5, POST_SELTOS, POST_TERRITORY, POST_TUCSON, REVENTA,
                   SELTOS_TERRITORY, SUV_SEDAN, cierre, enlace_ficha, guarda, link)

M = "https://okcars.ec/modelos-y-comparativas"
DUSTER = f"{M}/renault-duster-usada-ecuador/"
KICKS = f"{M}/nissan-kicks-usado-ecuador/"
SPORTAGE = f"{M}/kia-sportage-usada-ecuador/"
XTRAIL = f"{M}/nissan-x-trail-usada-ecuador/"
TIGGO = f"{M}/chery-tiggo-usado-ecuador/"
VITARA = f"{M}/suzuki-grand-vitara-usado-ecuador/"


PREGUNTAS_VENDEDOR = {"ol": [
    "¿Desde cuándo tiene el auto y quién lo manejaba?",
    "¿Dónde le hacía el mantenimiento y tiene las facturas?",
    "¿Tuvo algún choque, aunque sea leve, o algún reclamo al seguro?",
    "¿Por qué lo vende?",
    "¿Puedo llevarlo a revisar con mi mecánico antes de cerrar?",
]}

COSTO_TENENCIA = (
    "Antes de decidir, sume lo que cuesta tenerla además de la cuota. Para estimar el "
    f"seguro todo riesgo, cuente con {SEGURO_REGLA}: en una SUV de $20.000 son unos $700 "
    "a $1.000 al año. A eso se agregan matrícula, combustible y mantenimiento, que en una "
    "SUV mediana pesan más que en un auto compacto."
)


def fila(clave):
    _u, nombre, anio, km, precio = FICHA[clave]
    return [enlace_ficha(clave, nombre), anio or "—", f"{km} km", precio]


# ════════════════════════════════════════════════════════════════════════════
# 1 · Renault Duster
# ════════════════════════════════════════════════════════════════════════════
duster = {
    "title": "Renault Duster usada: qué revisar antes de comprarla",
    "slug": "renault-duster-usada-ecuador",
    "date": FECHAS[1],
    "cat": CAT["modelos"],
    "tags": ["Renault Duster usada", "SUV usadas Ecuador", "Duster 4x4",
             "comprar SUV usada Ibarra", "seminuevos Imbabura"],
    "excerpt": "La Duster se ganó su fama en caminos de tierra y presupuestos ajustados. "
               "Qué mirar en una usada, cuándo vale la pena la versión 4x4 y qué "
               "alternativas hay si no aparece la unidad correcta.",
    "yoast_title": "Renault Duster usada: qué revisar antes de comprar",
    "yoast_desc": "Suspensión, versión 4x2 o 4x4 e historial de mantenimiento: lo que "
                  "separa una Duster usada sana de una cansada, y cuándo esta SUV no le conviene.",
    "focus_kw": "renault duster usada",
    "bloques": [
        "Pocas SUV se ven tanto en las carreteras de la Sierra como la Renault Duster. Se "
        "la ve subiendo a las comunidades de Imbabura, cargada de bultos un domingo de "
        "feria en Otavalo y estacionada en barrios donde la calle se vuelve tierra a "
        "mitad de cuadra. Esa fama la hizo un auto muy buscado de segunda mano.",

        "La misma fama tiene una contracara: muchas Duster usadas trabajaron duro. Este "
        "artículo le ayuda a distinguir una unidad bien llevada de una que ya dio lo "
        "mejor, y a decidir si es la SUV que necesita o si le conviene mirar otra.",

        {"h2": "La respuesta corta: buena compra si la suspensión y los papeles están bien"},

        "Una Duster usada es una compra razonable cuando busca altura al piso, mecánica "
        "sencilla y repuestos fáciles de conseguir, y acepta a cambio un interior simple. "
        "Lo que decide si una unidad concreta vale la pena no es el año sino cómo se usó: "
        "una Duster de ciudad con mantenimiento en regla rinde muchos años; una que pasó "
        "la vida en caminos de piedra sin cuidado puede pedir arreglos apenas la compre.",

        "Por eso la revisión pesa más que en otros modelos. En una SUV de uso mixto, la "
        "suspensión y la dirección cuentan la historia que el tablero no muestra.",

        {"h2": "Por qué es tan buscada en el norte del país"},

        {"ul": [
            "<strong>Altura al piso generosa</strong> para su tamaño, útil en caminos "
            "rurales y calles con baches.",
            "<strong>Mecánica conocida</strong> por los talleres de cualquier ciudad, además "
            "de los de la marca.",
            "<strong>Respaldo de marca en la zona:</strong> Comercial Hidrobo es "
            "concesionario Renault en el norte del país, así que hay taller y repuestos "
            "originales en Ibarra.",
            "<strong>Versiones 4x2 y 4x4</strong>, que permiten elegir según el uso real.",
        ]},

        "Ese último punto merece atención. La mayoría de compradores de ciudad no "
        "necesitan la 4x4, y pagar por ella implica más componentes que mantener. Lo "
        f"explicamos con detalle en {link(CUATRO_X_CUATRO, 'camioneta 4x4 o 4x2: cuál necesita')}; "
        "el razonamiento aplica igual a una SUV.",

        {"h2": "Qué revisar en una Duster usada"},

        {"tabla": [
            ["Punto", "Qué buscar", "Por qué importa en la Duster"],
            ["Suspensión delantera", "Golpeteos en baches, auto que se va de lado",
             "Es la parte que más sufre en caminos de tierra"],
            ["Llantas", "Desgaste disparejo entre lados",
             "Delata alineación perdida por golpes"],
            ["Bajos del auto", "Raspones fuertes, protector doblado",
             "Indica uso fuera de asfalto exigente"],
            ["Sistema 4x4 (si tiene)", "Que acople sin ruidos y sin luces de falla",
             "Una reparación de tracción no es barata"],
            ["Embrague (versiones manuales)", "Que no patine en subida",
             "En la Sierra el embrague trabaja más"],
            ["Historial de mantenimiento", "Facturas o libreta sellada",
             "Separa una unidad cuidada de una explotada"],
        ]},

        f"El repaso general está en el {link(CHECKLIST, 'checklist de 20 puntos para revisar un auto usado')}. "
        f"Para la Duster, sume una prueba de manejo que incluya una subida y un tramo con "
        f"baches: lo explicamos en {link(PRUEBA_MANEJO, 'qué observar en la prueba de manejo')}.",

        {"quote": "En una SUV que pudo haber salido del asfalto, mire primero debajo y "
                  "después adentro. Un interior impecable no compensa una suspensión "
                  "cansada.",
         "cite": CITA},

        {"h2": "Cómo leer el kilometraje de una Duster"},

        "En una SUV de uso rural, el kilometraje dice menos que el tipo de kilómetros. "
        "Cien mil kilómetros de Panamericana desgastan mucho menos que cuarenta mil de "
        "caminos de segundo orden. Pregunte dónde vivía el dueño anterior y para qué usaba "
        "el auto, y contraste la respuesta con lo que ve en la suspensión y los bajos.",

        f"La guía de {link(KILOMETRAJE, 'cuánto kilometraje es mucho en un auto usado')} "
        "da las referencias generales. En una Duster, esas referencias se ajustan hacia "
        "abajo si la unidad trabajó fuera de la ciudad.",

        {"h2": "Cinco preguntas para el vendedor"},

        "Las respuestas importan menos que la forma de responder. Un dueño que contesta "
        "con detalle y muestra papeles suele haber cuidado el auto.",

        PREGUNTAS_VENDEDOR,

        {"h2": "Cuándo la Duster no le conviene"},

        {"ul": [
            "Si busca un interior amplio y con buena terminación para viajes largos con "
            "toda la familia: hay SUV con más espacio y confort.",
            "Si casi no sale de la ciudad y quiere caja automática con buen consumo en "
            "tráfico: una SUV compacta urbana le rinde más.",
            "Si la unidad que encontró es 4x4 pero usted no la necesita: paga por un "
            "sistema que no va a usar y que igual tiene que mantener.",
        ]},

        {"h2": "Alternativas en el patio, si la Duster no aparece"},

        "Hoy no tenemos una Duster en el inventario, y conviene ser claro con eso. Si su "
        "prioridad es una SUV con respaldo y altura al piso, estas unidades del patio de "
        "Ibarra cubren el mismo perfil desde otros ángulos:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("koleos"),
            fila("seltos"),
            fila("territory"),
        ]},

        f"La Koleos es la opción de presupuesto bajo dentro de la misma marca, con muchos "
        f"kilómetros encima. El Seltos y la Territory son más recientes; las comparamos en "
        f"{link(SELTOS_TERRITORY, 'Kia Seltos vs Ford Territory')}. El inventario cambia "
        f"seguido, así que conviene revisar el {link(LISTADO, 'listado actualizado')}.",

        {"h2": "La regla para no equivocarse"},

        "Antes de cerrar por una Duster, haga tres cosas: revise la suspensión en una "
        "subida con baches, pida el historial de mantenimiento y confirme si la tracción "
        "que trae es la que de verdad necesita. Con esas tres respuestas sabe si está "
        "comprando un auto sano o el problema de otro.",

        {"faq": [
            ("¿La Renault Duster es buena para la Sierra?",
             "Sí, por su altura al piso y su mecánica sencilla. En subidas largas conviene "
             "probar la unidad concreta, porque el rendimiento depende del motor y del "
             "estado del embrague o de la caja."),
            ("¿Conviene una Duster 4x4 usada?",
             "Solo si de verdad va a salir del asfalto con frecuencia. Si su uso es urbano, "
             "una 4x2 en buen estado le cuesta menos de mantener."),
            ("¿Dónde se consiguen repuestos de Duster en Ibarra?",
             "Comercial Hidrobo es concesionario Renault en el norte del país, y además los "
             "talleres independientes conocen bien la mecánica del modelo."),
            ("¿Qué revisar primero en una Duster usada?",
             "La suspensión delantera, el desgaste de las llantas y los bajos del auto. Son "
             "los puntos que delatan si la unidad trabajó en caminos exigentes."),
            ("¿OKCars tiene una Duster disponible?",
             "Hoy no. Escríbanos si busca una: le avisamos si ingresa una unidad y le "
             "mostramos alternativas del mismo segmento."),
        ]},

        cierre("Hola, busco una Renault Duster usada o una SUV parecida en OKCars.",
               "Si busca una Duster o una SUV de perfil parecido, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Nissan Kicks
# ════════════════════════════════════════════════════════════════════════════
kicks = {
    "title": "Nissan Kicks usado: qué revisar y para quién conviene",
    "slug": "nissan-kicks-usado-ecuador",
    "date": FECHAS[5],
    "cat": CAT["modelos"],
    "tags": ["Nissan Kicks usado", "SUV compacta usada", "caja CVT",
             "SUV usadas Ecuador", "seminuevos Ibarra"],
    "excerpt": "El Kicks es una SUV pequeña pensada para la ciudad, y casi todas las "
               "usadas tienen caja CVT. Qué revisar en esa caja, cómo se comporta en la "
               "Sierra y qué alternativas considerar.",
    "yoast_title": "Nissan Kicks usado: qué revisar y para quién conviene",
    "yoast_desc": "La caja CVT, el uso que tuvo y el historial de servicio deciden si un "
                  "Kicks usado es buena compra. Cómo probarlo en subida y cuándo mirar otra SUV.",
    "focus_kw": "nissan kicks usado",
    "bloques": [
        "El Nissan Kicks llegó a ocupar un espacio que antes no existía: el de quien "
        "quería la posición de manejo alta de una SUV pero con el tamaño y el consumo de "
        "un auto de ciudad. Por eso hoy aparece mucho en el mercado de usados, sobre todo "
        "en unidades de uso urbano.",

        "La clave para comprar bien un Kicks usado está en la caja. La mayoría de las "
        "unidades automáticas usa transmisión CVT, y ese componente pide un cuidado "
        "específico que no todos los dueños le dieron.",

        {"h2": "La respuesta corta: buena SUV urbana si la CVT está sana"},

        "Un Kicks usado conviene a quien maneja sobre todo en ciudad, busca un consumo "
        "contenido y no necesita espacio de carga grande. El punto que decide la compra es "
        "el estado de la caja: con mantenimiento al día, la CVT es suave y eficiente; "
        "descuidada, su reparación pesa mucho en el presupuesto.",

        f"Si todavía duda entre automático y manual, lo explicamos en "
        f"{link(AUTO_MANUAL, 'automático o manual usado: cuál conviene en la Sierra')}.",

        {"h2": "Qué tiene de particular la caja CVT"},

        "Una CVT no tiene marchas fijas: varía la relación de forma continua. Se siente "
        "como una aceleración sin saltos. Pide un aceite específico y cambios a los "
        "intervalos que fija el fabricante, y no tolera bien el abuso, como arrancar "
        "fuerte una y otra vez o remolcar más de lo previsto.",

        {"ol": [
            "Pida las facturas del cambio de aceite de la caja. Si no existen, trate la "
            "caja como si nunca se hubiera atendido.",
            "Arranque en frío y fíjese si hay tirones o un zumbido que sube con la "
            "velocidad.",
            "Pruebe una subida larga desde parado: el auto debe ganar velocidad sin "
            "patinar ni subir de revoluciones sin avanzar.",
            "En plano, acelere suave y luego a fondo: la respuesta debe ser progresiva.",
            "Pida que un mecánico lea los códigos de falla con un escáner.",
        ]},

        {"quote": "En una CVT, la factura del último cambio de aceite vale más que la "
                  "palabra del dueño anterior. Si nadie la tiene, cuente con ese gasto "
                  "apenas compre.",
         "cite": CITA},

        {"h2": "Cómo se comporta en la Sierra"},

        "Ibarra está a más de 2.200 metros, y en altura los motores atmosféricos pequeños "
        "pierden parte de su fuerza. En ciudad el Kicks se mueve con soltura; en las "
        "subidas largas de la Panamericana hacia Quito o hacia Tulcán, con el auto "
        "cargado, se nota más el esfuerzo.",

        "No es un defecto del modelo sino del tipo de motor. Lo importante es probarlo en "
        "las condiciones en que lo va a usar: si su semana incluye viajes frecuentes con "
        "cuatro personas y equipaje, haga la prueba así, no con el conductor solo.",

        {"h2": "Revisión completa de un Kicks usado"},

        {"tabla": [
            ["Punto", "Qué buscar"],
            ["Caja CVT", "Facturas de aceite, sin tirones ni zumbidos"],
            ["Motor", "Arranque en frío limpio, sin humo ni ruidos metálicos"],
            ["Suspensión", "Sin golpeteos en baches ni dirección que tire"],
            ["Frenos", "Pedal firme, sin vibración al frenar desde 80 km/h"],
            ["Interior", "Desgaste coherente con el kilometraje"],
            ["Papeles", "Matrícula, gravámenes y multas por placa"],
        ]},

        f"El método completo está en el {link(CHECKLIST, 'checklist para revisar un auto usado')} "
        f"y en {link(PRUEBA_MANEJO, 'qué observar en la prueba de manejo')}.",

        {"h2": "El Kicks manual: la opción que pocos miran"},

        "Las versiones manuales aparecen menos en las publicaciones, pero tienen una "
        "ventaja clara para quien compra usado: se libran del riesgo de la caja CVT. El "
        "embrague es un desgaste conocido y su cambio cuesta mucho menos que una "
        "reparación de caja automática.",

        "La contracara está en el tráfico. En las horas pico de Ibarra, o entrando a "
        "Quito por la Panamericana, el embrague trabaja todo el tiempo. Si su recorrido "
        "diario es de ese tipo, la comodidad de la automática pesa; si maneja más en "
        "carretera abierta, la manual es una compra más tranquila.",

        {"h2": "Cinco preguntas para el vendedor"},

        PREGUNTAS_VENDEDOR,

        f"Y antes de firmar, sume el seguro a la cuenta: lo explicamos en "
        f"{link(SEGURO_PRECIO, 'cuánto cuesta un seguro vehicular')}.",

        {"h2": "Cuándo el Kicks no le conviene"},

        {"ul": [
            "Si necesita cargar mucho o viajar seguido con cinco adultos: el espacio "
            "trasero y la cajuela son de auto compacto.",
            "Si va a salir con frecuencia a caminos de tierra: la altura ayuda, pero no "
            "es un vehículo pensado para eso.",
            "Si la unidad no tiene ningún registro de mantenimiento de la caja y el precio "
            "no lo compensa.",
        ]},

        {"h2": "Alternativas en el patio"},

        "Hoy no tenemos un Kicks en el inventario. Si busca una SUV compacta automática "
        "para ciudad y algo de carretera, estas unidades del patio de Ibarra están en ese "
        "segmento:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("seltos"),
            fila("territory"),
        ]},

        f"Las dos cuestan lo mismo y apuntan a usos distintos; las comparamos en "
        f"{link(SELTOS_TERRITORY, 'Kia Seltos vs Ford Territory')}. El inventario cambia, "
        f"así que conviene mirar el {link(LISTADO, 'listado actualizado')} antes de venir.",

        {"h2": "La regla para comprar un Kicks tranquilo"},

        "Sin historial de la caja, no pague como si estuviera sana. Con historial, pruebe "
        "igual el auto en subida y con escáner. Si las dos cosas salen bien, tiene una SUV "
        "urbana económica de mantener por varios años.",

        {"faq": [
            ("¿Qué caja tiene el Nissan Kicks?",
             "Las versiones automáticas usan transmisión CVT. También existen versiones "
             "manuales, que son más simples de mantener."),
            ("¿Conviene más un Kicks manual usado?",
             "Si maneja sobre todo en carretera abierta, sí: evita el riesgo de la caja "
             "CVT. En tráfico pesado, la automática es más cómoda."),
            ("¿Cada cuánto se cambia el aceite de la CVT?",
             "Según el intervalo que fija el fabricante en el manual. Si el auto no tiene "
             "registro de ese cambio, conviene hacerlo apenas lo compre."),
            ("¿El Kicks sirve para viajar desde Ibarra a Quito?",
             "Sí, para viajes ocasionales. Con el auto cargado se nota el esfuerzo en las "
             "subidas largas; pruébelo así antes de decidir."),
            ("¿Qué revisar primero en un Kicks usado?",
             "La caja: facturas del aceite, comportamiento en frío y en subida, y lectura "
             "de códigos con escáner."),
            ("¿OKCars tiene un Kicks disponible?",
             "Hoy no. Escríbanos si busca uno: le avisamos si ingresa y le mostramos "
             "alternativas del mismo segmento."),
        ]},

        cierre("Hola, busco un Nissan Kicks usado o una SUV compacta en OKCars.",
               "Si busca un Kicks o una SUV compacta automática, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Kia Sportage
# ════════════════════════════════════════════════════════════════════════════
sportage = {
    "title": "Kia Sportage usada: generaciones y qué revisar",
    "slug": "kia-sportage-usada-ecuador",
    "date": FECHAS[10],
    "cat": CAT["modelos"],
    "tags": ["Kia Sportage usada", "SUV mediana usada", "SUV usadas Ecuador",
             "comprar SUV Ibarra", "seminuevos Imbabura"],
    "excerpt": "La Sportage es una de las SUV medianas más vendidas del país y aparece "
               "seguido de segunda mano. Cómo ubicar la generación, qué revisar y cuándo "
               "conviene más otra opción.",
    "yoast_title": "Kia Sportage usada: generaciones y qué revisar",
    "yoast_desc": "Cómo saber de qué generación es una Sportage usada, qué mirar en motor, "
                  "caja y suspensión, y qué alternativas del mismo tamaño hay en Ibarra.",
    "focus_kw": "kia sportage usada",
    "bloques": [
        "La Kia Sportage lleva muchos años entre las SUV medianas más vistas en las "
        "calles del Ecuador. Esa presencia tiene una ventaja para quien compra usado: hay "
        "oferta para comparar, los talleres conocen el modelo y la reventa es fluida.",

        "La desventaja es que «Sportage» abarca autos muy distintos según el año. Una de "
        "hace diez años y una reciente comparten nombre, pero no diseño, equipamiento ni "
        "comportamiento. Lo primero es saber exactamente qué está mirando.",

        {"h2": "La respuesta corta: compre la generación, no el nombre"},

        "Una Sportage usada es una compra sólida si la generación encaja con su "
        "presupuesto y la unidad tiene historial de mantenimiento. El error frecuente es "
        "comparar precios entre generaciones distintas como si fueran el mismo auto: una "
        "diferencia grande de precio casi siempre se explica por el año y la versión.",

        f"Para ubicar el precio de una unidad concreta, compare solo contra publicaciones "
        f"del mismo año, versión y kilometraje. El método está en "
        f"{link(PRECIO_JUSTO, 'cómo saber si el precio de un auto usado es justo')}.",

        {"h2": "Cómo ubicar la generación"},

        "La forma más segura es el año de la matrícula y el diseño de la carrocería. Como "
        "referencia aproximada, en el mercado ecuatoriano de usados se ven sobre todo tres "
        "etapas de la Sportage:",

        {"tabla": [
            ["Etapa", "Años aproximados", "Qué esperar"],
            ["Anterior", "Hasta mediados de la década pasada",
             "Precio de entrada, revisar a fondo el desgaste acumulado"],
            ["Intermedia", "Desde alrededor de 2016",
             "El punto de equilibrio entre precio y equipamiento"],
            ["Reciente", "Desde alrededor de 2022",
             "Más tecnología y precio más alto; garantía de fábrica a confirmar"],
        ]},

        "Los años de cambio exactos varían según el mercado y la versión. Confirme con la "
        "matrícula y, si tiene dudas, con un concesionario de la marca a partir del número "
        "de chasis.",

        {"h2": "Qué revisar en una Sportage usada"},

        {"ol": [
            "Motor en frío: arranque limpio, sin humo azul ni ruidos metálicos.",
            "Caja automática: cambios suaves, sin golpes al pasar a D o a R.",
            "Suspensión: sin golpeteos en los baches de una calle empedrada.",
            "Frenos: pedal firme y sin vibración al frenar desde velocidad de carretera.",
            "Sistema eléctrico: pantalla, cámara, sensores y vidrios, todo funcionando.",
            "Historial: facturas o libreta de servicio con kilometrajes coherentes.",
        ]},

        f"Este repaso se suma al {link(CHECKLIST, 'checklist general de 20 puntos')}. En "
        "una SUV con equipamiento electrónico, revisar que todo funcione evita "
        "reparaciones que no se ven en una vuelta corta.",

        {"quote": "Dos Sportage con el mismo nombre pueden ser autos de épocas distintas. "
                  "Antes de discutir el precio, confirme el año y la versión exactos.",
         "cite": CITA},

        {"h2": "La Sportage en la vida diaria del norte"},

        "Es una SUV mediana pensada para familia: cinco plazas cómodas, cajuela útil para "
        "un fin de semana y buen aplomo en la Panamericana. En la ciudad, su tamaño se "
        "maneja bien, aunque estacionar en el centro de Ibarra o de Otavalo pide más "
        "atención que con un auto compacto.",

        "En consumo, piense en una SUV mediana, no en un auto de ciudad. Si su uso es casi "
        "todo urbano y en tráfico, una SUV compacta le sale más barata de mantener.",

        {"h2": "Lo que cuesta tenerla, además de la cuota"},

        COSTO_TENENCIA,

        f"Si la va a financiar, haga la cuenta completa con "
        f"{link(CUOTA, 'cómo se calcula la cuota mensual de un auto usado')}: la cuota es "
        f"solo una parte del gasto mensual.",

        {"h2": "Cinco preguntas para el vendedor"},

        "Con una SUV tan común, es fácil encontrar varias unidades del mismo año. Estas "
        "preguntas ayudan a separar la que fue cuidada de la que solo se ve bien:",

        PREGUNTAS_VENDEDOR,

        {"h2": "Cuándo la Sportage no le conviene"},

        {"ul": [
            "Si su presupuesto solo alcanza para una unidad de la etapa anterior con mucho "
            "kilometraje y sin historial: el ahorro inicial se puede ir en arreglos.",
            "Si necesita siete asientos: la Sportage es de cinco.",
            "Si casi no sale de la ciudad: una compacta consume y cuesta menos.",
        ]},

        {"h2": "Alternativas del mismo tamaño en el patio"},

        "Hoy no hay una Sportage en el inventario. Del mismo segmento, en Ibarra tenemos:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("cx5"),
            fila("tucson"),
            fila("territory"),
        ]},

        f"La CX-5 es la opción más reciente; la analizamos en "
        f"{link(POST_CX5, 'Mazda CX-5 usada: vale la pena')}. La Tucson es la alternativa "
        f"de presupuesto bajo, con mucho kilometraje; detalle en "
        f"{link(POST_TUCSON, 'Hyundai Tucson usada')}. El inventario cambia seguido.",

        {"h2": "La regla para elegir bien"},

        "Defina primero la etapa que entra en su presupuesto y compare solo dentro de "
        "ella. Después, entre dos unidades del mismo año, elija la que tenga historial de "
        "mantenimiento, aunque cueste un poco más.",

        {"faq": [
            ("¿Qué año de Kia Sportage usada conviene?",
             "El que entre en su presupuesto con historial de mantenimiento completo. Una "
             "unidad de etapa intermedia bien cuidada suele ser mejor compra que una "
             "reciente sin papeles claros."),
            ("¿La Sportage es buena para viajar por la Sierra?",
             "Sí, es una SUV mediana con buen aplomo en carretera. Pruébela con el auto "
             "cargado en una subida antes de decidir."),
            ("¿Cuántos pasajeros lleva la Sportage?",
             "Cinco. Si necesita siete asientos, conviene mirar otro tipo de vehículo."),
            ("¿Cómo saber la generación de una Sportage?",
             "Por el año de la matrícula y el diseño. Para confirmarlo, un concesionario "
             "de la marca puede consultar el número de chasis."),
            ("¿OKCars tiene una Sportage disponible?",
             "Hoy no. Escríbanos si busca una y le mostramos alternativas del mismo "
             "tamaño, como la CX-5 o la Territory."),
        ]},

        cierre("Hola, busco una Kia Sportage usada o una SUV mediana en OKCars.",
               "Si busca una Sportage o una SUV del mismo tamaño, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Nissan X-Trail
# ════════════════════════════════════════════════════════════════════════════
xtrail = {
    "title": "Nissan X-Trail usada: qué revisar antes de comprarla",
    "slug": "nissan-x-trail-usada-ecuador",
    "date": FECHAS[14],
    "cat": CAT["modelos"],
    "tags": ["Nissan X-Trail usada", "SUV familiar usada", "SUV 7 asientos",
             "caja CVT", "seminuevos Ibarra"],
    "excerpt": "La X-Trail es la SUV familiar de Nissan y muchas usadas tienen caja CVT. "
               "Qué revisar, cuándo importa la tercera fila y qué alternativas familiares "
               "hay en el patio de Ibarra.",
    "yoast_title": "Nissan X-Trail usada: qué revisar antes de comprar",
    "yoast_desc": "Caja CVT, tracción, tercera fila y mantenimiento: lo que hay que mirar "
                  "en una X-Trail usada, y las alternativas familiares si no encuentra la indicada.",
    "focus_kw": "nissan x-trail usada",
    "bloques": [
        "La Nissan X-Trail es, para muchas familias del norte del país, el paso siguiente "
        "después de una SUV compacta: más espacio, más aplomo en carretera y, en algunas "
        "versiones, una tercera fila de asientos. Por eso es un modelo buscado de segunda "
        "mano.",

        "Como en otros Nissan automáticos recientes, la mayoría de las X-Trail usadas "
        "trae caja CVT. Ese es el punto que hay que revisar con más cuidado, junto con la "
        "tracción en las versiones que la tienen.",

        {"h2": "La respuesta corta: compra familiar sólida si la caja está atendida"},

        "Una X-Trail usada conviene a quien viaja seguido con la familia, quiere una SUV "
        "cómoda para la Panamericana y valora el espacio interior. La unidad concreta vale "
        "la pena si tiene historial de mantenimiento de la caja y la tracción funciona "
        "como debe. Sin esos dos puntos, el precio tiene que reflejarlo.",

        "Y confirme qué versión es: no todas tienen tercera fila ni tracción 4x4, aunque "
        "se publiquen con el mismo nombre.",

        {"h2": "Qué revisar en una X-Trail usada"},

        {"tabla": [
            ["Punto", "Qué buscar", "Por qué"],
            ["Caja CVT", "Facturas del aceite, sin tirones ni zumbidos",
             "Su reparación es de las más caras del auto"],
            ["Tracción (si es 4x4)", "Que no aparezcan luces de falla",
             "Componentes adicionales que mantener"],
            ["Tercera fila (si tiene)", "Que los asientos se plieguen y anclen bien",
             "Se usa poco y a veces se daña sin que nadie lo note"],
            ["Suspensión trasera", "Sin golpes con el auto cargado",
             "Una SUV familiar viaja con peso"],
            ["Electrónica", "Cámara, sensores, pantalla",
             "Equipamiento que encarece si falla"],
        ]},

        {"ol": [
            "Pida el historial de servicio y busque, en especial, el cambio de aceite de "
            "la caja.",
            "Arranque en frío y escuche la caja durante los primeros minutos.",
            "Pruebe una subida larga con el auto cargado o con pasajeros.",
            "Si es 4x4, pida que un mecánico revise el sistema con escáner.",
            "Pliegue y despliegue todos los asientos, incluida la tercera fila.",
        ]},

        f"La prueba completa está en {link(PRUEBA_MANEJO, 'qué observar en la prueba de manejo')}, "
        f"y la diferencia entre caja automática y manual en "
        f"{link(AUTO_MANUAL, 'automático o manual usado')}.",

        {"quote": "En una SUV familiar, haga la prueba como la va a usar: con gente "
                  "atrás y en subida. Así se notan cosas que el conductor solo no "
                  "percibe.",
         "cite": CITA},

        {"h2": "En la altura de la Sierra"},

        "Ibarra está a más de 2.200 metros y en altura los motores atmosféricos pierden "
        "parte de su fuerza. En una SUV familiar cargada, eso se nota en las subidas "
        "largas de la Panamericana hacia Quito. No es motivo para descartarla, pero sí "
        "para probarla con pasajeros y equipaje, que es como la va a usar.",

        {"h2": "La tercera fila: útil, pero no para todos los días"},

        "En las versiones que la tienen, la tercera fila sirve para trayectos cortos o "
        "para niños. Si su familia necesita siete plazas cómodas todos los días, conviene "
        "probar los asientos con quienes los van a ocupar antes de decidir. Con la "
        "tercera fila en uso, además, la cajuela se reduce mucho.",

        "Si las siete plazas son una necesidad diaria, una minivan puede servirle mejor. "
        "En el patio, por ejemplo, hay una " + enlace_ficha("sienna") + " con "
        f"{FICHA['sienna'][3]} km a {FICHA['sienna'][4]}.",

        {"h2": "4x2 o 4x4: cuál buscar"},

        "La tracción integral suma seguridad en lluvia y en caminos de tierra, pero también "
        "componentes que mantener. Si vive en Ibarra y sus viajes son por asfalto, una "
        "X-Trail 4x2 en buen estado le cuesta menos y le rinde igual. Si sube seguido a "
        "zonas rurales de Imbabura o del Carchi, la 4x4 se justifica. El razonamiento "
        f"completo está en {link(CUATRO_X_CUATRO, '4x4 o 4x2: cuál necesita')}.",

        {"h2": "Lo que cuesta tenerla, además de la cuota"},

        COSTO_TENENCIA,

        f"El detalle del seguro está en {link(SEGURO_PRECIO, 'cuánto cuesta un seguro vehicular')}.",

        {"h2": "Cinco preguntas para el vendedor"},

        PREGUNTAS_VENDEDOR,

        {"h2": "Cuándo la X-Trail no le conviene"},

        {"ul": [
            "Si su uso es casi todo urbano y con una o dos personas: está pagando y "
            "manteniendo más auto del que usa.",
            "Si la unidad no tiene ningún registro de la caja y el precio no lo descuenta.",
            "Si necesita siete plazas cómodas para adultos todos los días: una minivan "
            "cumple mejor esa función.",
        ]},

        {"h2": "Alternativas familiares en el patio"},

        "Hoy no tenemos una X-Trail. Para familias que viajan seguido, estas unidades del "
        "inventario de Ibarra apuntan al mismo uso:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("cx5"),
            fila("territory"),
            fila("sienna"),
        ]},

        f"La CX-5 es la más cercana en tamaño y concepto; la analizamos en "
        f"{link(POST_CX5, 'Mazda CX-5 usada')}. La Territory ofrece mucho espacio por su "
        f"precio; detalle en {link(POST_TERRITORY, 'Ford Territory usada')}. El inventario "
        f"cambia, así que conviene revisar el {link(LISTADO, 'listado actualizado')}.",

        {"h2": "La regla para elegir bien"},

        "Confirme la versión, pida el historial de la caja y pruebe el auto cargado. Si "
        "las tres cosas salen bien, la X-Trail es una SUV familiar que rinde por años.",

        {"faq": [
            ("¿La Nissan X-Trail tiene siete asientos?",
             "Algunas versiones sí, con una tercera fila pensada para trayectos cortos. "
             "Confirme la versión exacta de la unidad que le ofrecen."),
            ("¿Qué caja tiene la X-Trail?",
             "Las versiones automáticas recientes usan caja CVT, que pide cambios de aceite "
             "a los intervalos del fabricante."),
            ("¿Conviene la X-Trail 4x4?",
             "Si sale con frecuencia a caminos de tierra o vive en zona rural, sí. Para uso "
             "de ciudad y carretera, una 4x2 en buen estado le cuesta menos."),
            ("¿Qué revisar primero en una X-Trail usada?",
             "La caja y su historial de mantenimiento, seguido de la tracción si es 4x4 y "
             "del estado de la tercera fila."),
            ("¿OKCars tiene una X-Trail disponible?",
             "Hoy no. Escríbanos si busca una: le mostramos alternativas familiares como la "
             "CX-5, la Territory o la Sienna."),
        ]},

        cierre("Hola, busco una Nissan X-Trail usada o una SUV familiar en OKCars.",
               "Si busca una X-Trail o una SUV familiar, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Hub: mejores SUV usadas
# ════════════════════════════════════════════════════════════════════════════
hub = {
    "title": "Mejores SUV usadas en Ecuador según cómo va a usarla",
    "slug": "mejores-suv-usadas-ecuador",
    "date": FECHAS[19],
    "cat": CAT["modelos"],
    "tags": ["mejores SUV usadas", "SUV usadas Ecuador", "comprar SUV usada",
             "SUV familiar", "seminuevos Ibarra"],
    "excerpt": "No hay una SUV usada mejor que todas: hay una mejor para su semana. "
               "Cuatro perfiles de uso, los modelos que encajan en cada uno y qué revisar "
               "antes de decidir.",
    "yoast_title": "Mejores SUV usadas en Ecuador según su uso",
    "yoast_desc": "Ciudad, familia, carretera o presupuesto ajustado: qué SUV usada encaja "
                  "en cada caso, qué revisar en cada modelo y qué opciones hay hoy en Ibarra.",
    "focus_kw": "mejores suv usadas ecuador",
    "bloques": [
        "Buscar «la mejor SUV usada» lleva a listas que no conocen su semana. Una SUV que "
        "es excelente para una familia que viaja cada fin de semana puede ser un mal "
        "negocio para quien solo maneja en el centro de Ibarra.",

        "Esta guía ordena la decisión por uso. Para cada perfil indica qué modelos "
        "encajan, qué revisar y dónde está el análisis completo de cada uno.",

        {"h2": "La respuesta corta: elija por uso, después por modelo"},

        "Primero defina cuál de estos cuatro perfiles describe mejor su semana. Después "
        "compare solo entre los modelos de ese perfil. Ese orden evita el error más común: "
        "pagar por tamaño, tracción o asientos que no va a usar.",

        {"tabla": [
            ["Perfil", "Qué priorizar", "Modelos que encajan"],
            ["Ciudad", "Tamaño compacto, consumo, caja automática",
             "Kicks, Seltos, Tiggo"],
            ["Familia", "Espacio, cajuela, comodidad atrás",
             "Territory, CX-5, Sportage, X-Trail"],
            ["Carretera y campo", "Altura al piso, suspensión, tracción si hace falta",
             "Duster, Grand Vitara"],
            ["Presupuesto ajustado", "Historial y estado por encima del año",
             "Tucson y Koleos de años anteriores"],
        ]},

        {"h2": "Perfil ciudad: compacta y automática"},

        "Si casi todo su manejo es urbano, una SUV compacta le da la posición alta sin el "
        "consumo ni el tamaño de una mediana. Las automáticas de este segmento suelen "
        "usar caja CVT, y su estado es lo primero que hay que revisar.",

        {"ul": [
            f"{link(KICKS, 'Nissan Kicks usado')}: pensado para ciudad, con caja CVT.",
            f"{link(POST_SELTOS, 'Kia Seltos usado')}: compacto con buena reventa.",
            f"{link(TIGGO, 'Chery Tiggo usado')}: la opción china del segmento.",
        ]},

        "En este perfil, la altura de manejo es la razón de comprar una SUV, no el campo. "
        "Por eso no tiene sentido pagar por tracción integral: una 4x2 automática en buen "
        "estado rinde igual en el asfalto de Ibarra o de Otavalo y cuesta menos de "
        "mantener.",

        {"h2": "Perfil familia: espacio y carretera"},

        "Si viaja seguido con la familia por la Panamericana, el espacio de la segunda "
        "fila y la cajuela pesan más que cualquier otra cosa. Pruebe siempre el auto con "
        "la gente que lo va a ocupar.",

        {"ul": [
            f"{link(POST_TERRITORY, 'Ford Territory usada')}: mucho espacio por su precio.",
            f"{link(POST_CX5, 'Mazda CX-5 usada')}: la más pulida del grupo.",
            f"{link(SPORTAGE, 'Kia Sportage usada')}: mediana con oferta amplia para comparar.",
            f"{link(XTRAIL, 'Nissan X-Trail usada')}: con tercera fila en algunas versiones.",
        ]},

        f"Si duda entre las dos que hoy cuestan lo mismo en el patio, lea "
        f"{link(SELTOS_TERRITORY, 'Kia Seltos vs Ford Territory')}.",

        {"h2": "Perfil carretera y campo: altura antes que lujo"},

        "Si su semana incluye caminos de tierra hacia las comunidades de Imbabura o a "
        "fincas del Carchi, la altura al piso y una suspensión sana valen más que el "
        "equipamiento. La tracción 4x4 solo se justifica si sale del asfalto de verdad.",

        {"ul": [
            f"{link(DUSTER, 'Renault Duster usada')}: altura y mecánica sencilla.",
            f"{link(VITARA, 'Suzuki Grand Vitara usado')}: compacto y robusto.",
        ]},

        {"h2": "Perfil presupuesto ajustado: el estado manda"},

        "Con poco presupuesto, la tentación es comprar la SUV más nueva que alcance. Suele "
        "rendir más elegir una unidad algo más antigua pero con historial completo. En el "
        "patio hay dos ejemplos de ese perfil:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila("tucson"),
            fila("koleos"),
        ]},

        f"Son unidades con muchos kilómetros: la revisión pesa más que el precio. La "
        f"referencia está en {link(KILOMETRAJE, 'cuánto kilometraje es mucho')} y en "
        f"{link(POST_TUCSON, 'Hyundai Tucson usada')}.",

        {"quote": "La mejor SUV usada es la que encaja en su semana real, no en la que "
                  "imagina para las vacaciones. Pagar por espacio o tracción que no usa "
                  "es pagar dos veces: al comprar y al mantener.",
         "cite": CITA},

        {"h2": "Cuánto cuesta tener cada perfil"},

        "El precio de compra es solo el comienzo. El seguro todo riesgo se calcula sobre "
        f"el valor del auto, a razón de {SEGURO_REGLA}, así que una SUV más cara también "
        "cuesta más cada año:",

        {"tabla": [
            ["Valor de la SUV", "Seguro anual aproximado"],
            ["$10.000", "$400 – $600"],
            ["$20.000", "$700 – $1.000"],
            ["$30.000", "$1.000 – $1.500"],
        ]},

        f"Son valores referenciales; el detalle está en "
        f"{link(SEGURO_PRECIO, 'cuánto cuesta un seguro vehicular')}. Súmelos a la cuota "
        "antes de elegir el perfil, no después.",

        {"h2": "Tres errores frecuentes al elegir una SUV usada"},

        {"ul": [
            "<strong>Comprar tamaño para el viaje de vacaciones</strong> y pagar ese "
            "tamaño los otros 350 días del año.",
            "<strong>Pagar por tracción 4x4</strong> que nunca sale del asfalto.",
            "<strong>Elegir por año en lugar de por estado</strong>: una unidad más "
            "nueva sin historial suele salir peor que una algo más antigua bien cuidada.",
        ]},

        {"h2": "Cuándo una SUV no es la respuesta"},

        f"Si maneja solo en ciudad y no necesita altura, un sedán consume menos y cuesta "
        f"menos de asegurar. Lo comparamos en {link(SUV_SEDAN, 'SUV o sedán usado')}. Y "
        f"si piensa vender el auto en pocos años, mire también "
        f"{link(REVENTA, 'qué autos usados se revenden mejor')} y "
        f"{link(DEVALUA, 'cuánto se devalúa un auto usado')}.",

        {"h2": "Lo que vale para todas, sin importar el modelo"},

        {"ol": [
            "Revise el auto con el " + link(CHECKLIST, "checklist de 20 puntos") + ".",
            "Haga la prueba de manejo en subida y con pasajeros.",
            "Pida el historial de mantenimiento, en especial de la caja.",
            "Verifique papeles: matrícula, gravámenes y multas.",
            "Compare el precio solo contra unidades del mismo año y kilometraje.",
        ]},

        f"Después de comprar, el primer mes cuenta: lo explicamos en "
        f"{link(PRIMER_MANT, 'primer mantenimiento después de comprar un usado')}.",

        {"faq": [
            ("¿Cuál es la mejor SUV usada en Ecuador?",
             "Depende del uso. Para ciudad conviene una compacta automática; para familia, "
             "una mediana con buen espacio atrás; para campo, altura y suspensión sana."),
            ("¿Conviene una SUV usada 4x4?",
             "Solo si sale del asfalto con frecuencia. Para ciudad y carretera, una 4x2 "
             "en buen estado le cuesta menos de mantener."),
            ("¿Qué SUV usada es buena para familia?",
             "Las medianas con buena segunda fila y cajuela, como la Territory, la CX-5 o "
             "la Sportage. Si necesita siete plazas a diario, una minivan cumple mejor."),
            ("¿Qué revisar en cualquier SUV usada?",
             "Suspensión, caja, historial de mantenimiento y papeles. Y una prueba de "
             "manejo en subida con el auto cargado."),
            ("¿Qué SUV usadas tiene OKCars hoy?",
             "El inventario cambia seguido. En el listado de la página están todas las "
             "unidades disponibles con precio y kilometraje."),
        ]},

        cierre("Hola, busco una SUV usada y quiero ver opciones en OKCars.",
               "Si quiere ver las SUV disponibles en Ibarra, escríbanos al"),
    ],
}


if __name__ == "__main__":
    for s in [duster, kicks, sportage, xtrail, hub]:
        print(guarda(s))
