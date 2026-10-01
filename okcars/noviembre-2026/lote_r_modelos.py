#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote R — guías de modelo (5 posts, tanda de noviembre 2026).

Modelos de alto volumen en el mercado de usados del país que OKCars no tiene hoy en el
patio: Chevrolet D-Max, Chery Tiggo, Suzuki Grand Vitara, Mazda 3 y Hyundai Accent. Cada
guía sirve a quien busca el modelo y le ofrece alternativas reales del inventario.

Sin precios de mercado: se remite a comparar publicaciones con el método del post de
precio justo. Especificaciones solo las que no admiten duda; generaciones sin años cuando
no hay certeza. Escrito en USTED.
"""
from comun import (CAT, CHECKLIST, CHINOS, CHOCADO, CITA, CUATRO_X_CUATRO, DIESEL, FECHAS,
                   FICHA, HILUX, KIA_RIO, KILOMETRAJE, POST_CX5, POST_HUNTER, POST_MAXUS,
                   PRECIO_JUSTO, PRUEBA_MANEJO, REVENTA, SAIL, SUV_SEDAN, TRASPASO,
                   VERIFICAR_DEUDAS, AUTO_MANUAL, cierre, enlace_ficha, fila_ficha, guarda,
                   link)

AVISO_INVENTARIO = ("El inventario cambia seguido; confirme por WhatsApp que la unidad siga "
                    "disponible antes de viajar.")


# ════════════════════════════════════════════════════════════════════════════
# 1 · Chevrolet D-Max usada
# ════════════════════════════════════════════════════════════════════════════
dmax = {
    "title": "Chevrolet D-Max usada: qué revisar antes de comprarla",
    "slug": "chevrolet-dmax-usada-ecuador",
    "date": FECHAS[4],
    "cat": CAT["modelos"],
    "tags": ["Chevrolet D-Max usada", "camionetas usadas Ecuador", "camioneta de trabajo",
             "D-Max diésel", "camionetas Imbabura"],
    "excerpt": "La D-Max es de las camionetas que más se ven trabajando en la Sierra. Qué "
               "versión conviene según el uso, qué revisar en una unidad que ya cargó peso "
               "y qué alternativas hay si no aparece la indicada.",
    "yoast_title": "Chevrolet D-Max usada: qué revisar antes de comprar",
    "yoast_desc": "Gasolina o diésel, cabina simple o doble, 4x2 o 4x4: cómo elegir una "
                  "D-Max usada según su trabajo y las señales de una camioneta que se exigió.",
    "focus_kw": "chevrolet d-max usada",
    "bloques": [
        "En cualquier carretera de Imbabura o Carchi es fácil cruzarse con una D-Max: "
        "cargando quintales, llevando herramientas a una obra o subiendo a una finca. Esa "
        "presencia es su mayor virtud en el mercado de usados, porque hay repuestos y "
        "mecánicos que la conocen en casi cualquier cantón.",

        "También es su mayor riesgo. Muchas D-Max usadas vienen de una vida de trabajo "
        "duro, y dos camionetas del mismo año pueden estar en estados opuestos. Esta guía "
        "le ayuda a distinguir una de otra antes de pagar.",

        {"h2": "La respuesta corta: compre por el uso que tuvo, no por el año"},

        "En una camioneta de trabajo el año dice poco. Lo que manda es cómo se usó: cuánto "
        "peso llevó, por qué caminos y con qué mantenimiento. Una D-Max más vieja que "
        "trabajó en ciudad puede estar mejor que una más reciente que pasó años en "
        "caminos de tierra con la cajuela llena.",

        "Por eso el orden de revisión es otro que en un auto familiar: primero suspensión, "
        "chasis y tren motriz; después la cabina y los acabados.",

        {"h2": "Qué versión le conviene según su trabajo"},

        "La D-Max se ha vendido con motores a gasolina y diésel, cabina simple y doble, y "
        "tracción 4x2 y 4x4. Esas tres decisiones pesan más que cualquier detalle de "
        "equipamiento.",

        {"tabla": [
            ["Decisión", "Elija esto si…", "Evítelo si…"],
            ["Diésel", "Recorre muchos kilómetros al mes o carga peso seguido",
             "La usa poco y en trayectos cortos de ciudad"],
            ["Gasolina", "El uso es mixto y no recorre tanto",
             "Va a cargar pesado todos los días"],
            ["Cabina doble", "La camioneta también lleva a la familia",
             "Necesita la mayor cajuela posible"],
            ["Cabina simple", "Es una herramienta de trabajo y nada más",
             "Va a llevar pasajeros con frecuencia"],
            ["4x4", "Entra a caminos de tierra, lodo o pendientes fuertes",
             "Se mueve solo por asfalto"],
        ]},

        f"La discusión entre motores la desarrollamos en {link(DIESEL, 'camionetas diésel usadas')}, "
        f"y la de tracción en {link(CUATRO_X_CUATRO, 'camioneta 4x4 o 4x2: cuál necesita')}.",

        {"h2": "Las señales de una D-Max que se exigió de más"},

        "Una camioneta que cargó por encima de su capacidad deja huellas que se ven sin "
        "herramientas especiales:",

        {"ol": [
            "<strong>Muelles posteriores aplastados o con hojas agregadas.</strong> Si la "
            "parte trasera queda más baja que la delantera sin carga, la suspensión "
            "trabajó de más.",
            "<strong>Cajuela deformada o con golpes por dentro.</strong> Indica carga "
            "pesada mal sujeta o uso de volqueta improvisada.",
            "<strong>Enganche de remolque con desgaste.</strong> No es malo en sí, pero "
            "pregunte qué remolcaba y con qué frecuencia.",
            "<strong>Humo excesivo al acelerar</strong> en las versiones diésel, sobre todo "
            "con el motor frío.",
            "<strong>Ruidos en el diferencial</strong> o vibraciones al soltar el "
            "acelerador en la prueba de manejo.",
            "<strong>Llantas con desgaste muy desigual</strong> entre ejes, señal de peso "
            "concentrado atrás.",
        ]},

        f"Los puntos generales de una camioneta usada están en el "
        f"{link(CHECKLIST, 'checklist para revisar un auto usado')}. En la D-Max sume una "
        "revisión en elevador: el chasis cuenta lo que la carrocería no muestra.",

        {"quote": "En una camioneta de trabajo, pregunte a qué se dedicaba el dueño anterior. "
                  "Esa respuesta le dice más del estado de la suspensión que el kilometraje.",
         "cite": CITA},

        {"h2": "D-Max frente a la Hilux"},

        "La comparación es inevitable porque son las dos camionetas que más se buscan "
        "usadas. La Hilux suele pedir más dinero por su fama de resistencia y su valor de "
        "reventa; la D-Max ofrece una alternativa con buena disponibilidad de repuestos y "
        "precios de compra más contenidos.",

        f"Si quiere ver qué buscar en la otra, la tenemos en "
        f"{link(HILUX, 'la guía de la Toyota Hilux usada')}. Para comparar precios de "
        f"publicaciones sin dejarse llevar por la marca, use el método de "
        f"{link(PRECIO_JUSTO, 'cuánto pagar por un auto usado')}.",

        {"h2": "Si no aparece la D-Max indicada, estas son alternativas reales"},

        "Hoy no tenemos una D-Max en el patio de Ibarra, pero sí dos camionetas diésel de "
        "doble cabina que cubren el mismo trabajo:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila_ficha("maxus"),
            fila_ficha("hunter"),
        ]},

        f"La {enlace_ficha('maxus')} es 4x4 y la {enlace_ficha('hunter')} es 4x2. Las "
        f"analizamos por separado en {link(POST_MAXUS, 'la guía de la Maxus T60')} y "
        f"{link(POST_HUNTER, 'la de la Changan Hunter')}. {AVISO_INVENTARIO}",

        {"h2": "Los papeles de una camioneta que trabajó"},

        "Una camioneta de trabajo cambia de manos más que un auto familiar, y a veces "
        "estuvo a nombre de una empresa. Antes de pagar, confirme tres cosas:",

        {"ul": [
            "<strong>Quién es el dueño en la matrícula.</strong> Si es una empresa, la "
            "venta la firma su representante legal con su nombramiento vigente.",
            "<strong>Que no tenga prenda.</strong> Muchas camionetas de trabajo se "
            "compraron a crédito; el certificado de gravámenes lo confirma.",
            "<strong>Multas e impuestos al día.</strong> Una camioneta que recorre mucho "
            "acumula multas con facilidad.",
        ]},

        f"La verificación completa está en {link(VERIFICAR_DEUDAS, 'cómo saber si un auto usado tiene deudas o problemas legales')}.",

        {"h2": "Cuándo una D-Max usada no le conviene"},

        "Si la camioneta va a pasar la semana en la ciudad llevando a la familia, una SUV "
        "le dará más comodidad por el mismo dinero. Una pickup rebota más sin carga, es "
        "más difícil de estacionar en el centro de Ibarra y consume más que un auto de su "
        "mismo precio.",

        "Tampoco conviene si no puede revisarla en elevador. En una camioneta de trabajo, "
        "comprar a ciegas es apostar a que el dueño anterior la cuidó.",

        {"h2": "La regla para elegir bien"},

        "Defina primero el trabajo: cuánto carga, por dónde entra y cuántos kilómetros "
        "hace al mes. Con eso elija motor, cabina y tracción. Recién después compare "
        "unidades, y entre dos parecidas quédese con la que tenga historial de "
        "mantenimiento y una suspensión que no haya trabajado de más.",

        {"faq": [
            ("¿Conviene una D-Max diésel o a gasolina?",
             "Diésel si recorre muchos kilómetros o carga peso con frecuencia; gasolina si "
             "el uso es mixto y moderado. El diésel cuesta más de comprar y su beneficio "
             "aparece con el uso intensivo."),
            ("¿Cómo sé si una D-Max cargó de más?",
             "Mire si la parte trasera está más baja que la delantera sin carga, si los "
             "muelles tienen hojas agregadas, el estado de la cajuela por dentro y el "
             "desgaste de las llantas traseras."),
            ("¿Es mejor una D-Max o una Hilux usada?",
             "La Hilux suele costar más y revenderse mejor. La D-Max ofrece una compra más "
             "contenida con buena disponibilidad de repuestos. Decida por el estado de la "
             "unidad concreta, no por la marca."),
            ("¿Necesito una D-Max 4x4?",
             "Solo si entra a caminos de tierra, lodo o pendientes fuertes con regularidad. "
             "Para asfalto, una 4x2 cuesta menos y consume menos."),
            ("¿Qué revisión hago antes de comprar una camioneta usada?",
             "Una revisión en elevador de chasis, suspensión, diferencial y caja, además "
             "de la prueba de manejo con y sin carga si es posible."),
        ]},

        cierre("Hola, busco una camioneta de trabajo y quiero ver las opciones de OKCars.",
               "Si busca una camioneta de trabajo y quiere ver las dos que tenemos en Ibarra, "
               "escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Chery Tiggo usado
# ════════════════════════════════════════════════════════════════════════════
tiggo = {
    "title": "Chery Tiggo usado: qué versión conviene y qué revisar",
    "slug": "chery-tiggo-usado-ecuador",
    "date": FECHAS[8],
    "cat": CAT["modelos"],
    "tags": ["Chery Tiggo usado", "autos chinos usados", "SUV usadas Ecuador",
             "Chery Ecuador", "comprar SUV usada"],
    "excerpt": "La familia Tiggo cubre desde la SUV más pequeña hasta una de siete "
               "asientos. Cómo saber cuál le sirve, qué revisar en una usada y qué mirar "
               "del respaldo de la marca antes de comprar.",
    "yoast_title": "Chery Tiggo usado: qué versión conviene comprar",
    "yoast_desc": "Tiggo 2, 4, 7 u 8: el tamaño que necesita, los puntos a revisar en una "
                  "unidad usada y cómo comprobar repuestos y el servicio antes de pagarla.",
    "focus_kw": "chery tiggo usado",
    "bloques": [
        "Chery es de las marcas chinas con más tiempo en el mercado ecuatoriano, y la "
        "familia Tiggo es la que más se ve en las calles. Eso significa que hay unidades "
        "usadas de varios tamaños y años, y que la pregunta correcta no es si comprar un "
        "Tiggo sino cuál.",

        "Esta guía ordena la familia por tamaño, explica qué revisar en una unidad usada y "
        "cómo comprobar el respaldo de repuestos antes de cerrar.",

        {"h2": "La respuesta corta: el número indica el tamaño"},

        "En la familia Tiggo, a mayor número, mayor tamaño. El Tiggo 2 es la SUV de "
        "entrada, pensada para ciudad. El Tiggo 4 sube un escalón en espacio. El Tiggo 7 "
        "es una SUV mediana y el Tiggo 8 agrega una tercera fila de asientos.",

        {"tabla": [
            ["Modelo", "Tamaño", "Para quién"],
            ["Tiggo 2", "SUV pequeña", "Ciudad, primer auto, presupuesto ajustado"],
            ["Tiggo 4", "SUV compacta", "Pareja o familia pequeña, uso mixto"],
            ["Tiggo 7", "SUV mediana", "Familia con viajes frecuentes"],
            ["Tiggo 8", "SUV con tercera fila", "Familias de más de cinco personas"],
        ]},

        "Dentro de cada modelo hubo versiones y actualizaciones con cambios de motor y "
        "equipamiento. Antes de comparar precios, confirme la versión exacta en la "
        "matrícula y en la ficha del vendedor: dos Tiggo 4 de años distintos pueden ser "
        "vehículos bastante diferentes.",

        {"h2": "Qué revisar en un Tiggo usado"},

        "Los puntos generales de cualquier usado aplican igual. En un Tiggo conviene "
        "poner atención especial en estos:",

        {"ol": [
            "<strong>Electrónica y pantalla.</strong> Pruebe cada función: cámara de "
            "retroceso, sensores, conectividad del celular y mandos del volante.",
            "<strong>Caja automática o CVT</strong>, si la tiene: en la prueba de manejo "
            "fíjese que no haya tirones ni demoras al arrancar en subida.",
            "<strong>Historial de mantenimiento en concesionario</strong>, sobre todo si "
            "el auto todavía podría tener garantía de fábrica vigente.",
            "<strong>Plásticos interiores y ajustes de puertas</strong>, que muestran cómo "
            "se trató el auto por dentro.",
            "<strong>Llamados a revisión</strong>: pregunte en un concesionario de la marca "
            "si la unidad tiene alguno pendiente, con el número de chasis.",
        ]},

        f"La lista completa está en el {link(CHECKLIST, 'checklist para revisar un auto usado')}, "
        f"y la forma de probarlo en la calle en {link(PRUEBA_MANEJO, 'la prueba de manejo de un auto usado')}.",

        {"quote": "Con un auto chino, la pregunta más útil no es sobre el auto: es dónde lo "
                  "va a mantener. Llame al taller de la marca antes de comprar y pregunte "
                  "por el repuesto que más se cambia.",
         "cite": CITA},

        {"h2": "Repuestos y servicio: lo que de verdad pesa"},

        "Con las marcas chinas, el estado del auto es la mitad de la decisión. La otra "
        "mitad es si va a encontrar repuestos y un taller que lo conozca cerca de su casa.",

        "En el caso de Chery, Comercial Hidrobo, el grupo al que pertenece OKCars, vende la "
        "marca nueva en el norte del país. Eso ayuda a que haya una referencia de servicio "
        "en la zona, aunque la disponibilidad de una pieza puntual hay que confirmarla "
        "caso por caso.",

        f"El panorama general de comprar chino usado, con sus ventajas y sus riesgos, está "
        f"en {link(CHINOS, 'la guía de autos chinos usados')}.",

        {"h2": "Qué pasa con la reventa"},

        "Las marcas chinas han ganado terreno en el país, pero en el mercado de usados "
        "todavía suelen depreciarse más rápido que las marcas japonesas y coreanas de "
        "trayectoria larga. Eso juega a favor de quien compra usado: paga menos por un "
        "auto relativamente nuevo.",

        f"Juega en contra si piensa venderlo pronto. Lo explicamos en "
        f"{link(REVENTA, 'los autos usados que mejor se revenden')}.",

        {"h2": "Alternativas en el patio de Ibarra"},

        "Hoy no tenemos un Tiggo, pero si busca una SUV compacta con equipamiento moderno, "
        "estas dos están en el mismo rango de uso:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila_ficha("seltos"),
            fila_ficha("territory"),
        ]},

        f"La {enlace_ficha('seltos')} y la {enlace_ficha('territory')} cuestan lo mismo. "
        f"{AVISO_INVENTARIO}",

        {"h2": "Cómo probarlo en las subidas de la Sierra"},

        "Los motores de baja cilindrada pierden fuerza con la altura, y Ibarra está a más "
        "de dos mil metros. En un Tiggo pequeño eso se nota sobre todo con el auto cargado. "
        "Haga la prueba en condiciones parecidas a su uso real:",

        {"ol": [
            "Suba una pendiente con dos o tres personas a bordo: con el vendedor solo, el "
            "auto parece más ágil de lo que será con su familia.",
            "Arranque detenido en plena subida y fíjese si el auto retrocede o duda.",
            "Salga a la Panamericana y pruebe un adelantamiento a velocidad de carretera.",
            "Encienda el aire acondicionado durante la subida: le resta fuerza al motor y "
            "muestra el margen real que tiene.",
        ]},

        "Si el auto va justo con la familia a bordo en la subida, no va a mejorar después "
        "de comprarlo. En ese caso, suba un escalón en la familia Tiggo o mire otra opción.",

        {"h2": "Cuándo un Tiggo usado no le conviene"},

        "Si va a conservar el auto pocos años y le preocupa cuánto recuperará al venderlo, "
        "un modelo con mejor reventa puede salir más barato al final, aunque cueste más al "
        "comprar.",

        "Tampoco conviene si vive lejos de un taller de la marca y no tiene un mecánico de "
        "confianza que trabaje con autos chinos. En Otavalo, Cayambe o Tulcán, confirme "
        "esto antes de decidir.",

        {"h2": "La regla para elegir bien"},

        "Elija el tamaño por la familia y el uso, no por el precio de oferta. Confirme la "
        "versión exacta, pruebe toda la electrónica y llame al taller de la marca antes "
        "de pagar. Si esas tres cosas cuadran, un Tiggo usado es una compra razonable.",

        {"faq": [
            ("¿Qué diferencia hay entre el Tiggo 2, 4, 7 y 8?",
             "El tamaño. El 2 es la SUV de entrada, el 4 una compacta, el 7 una mediana y "
             "el 8 agrega una tercera fila de asientos."),
            ("¿Los Chery usados tienen repuestos en Ecuador?",
             "La marca tiene presencia en el país, incluido el norte. Igual conviene llamar "
             "al taller de la marca antes de comprar y preguntar por las piezas que más se "
             "cambian."),
            ("¿Un Chery Tiggo se deprecia rápido?",
             "En general las marcas chinas pierden valor más rápido que las japonesas o "
             "coreanas de trayectoria larga. Eso abarata la compra usada, pero pesa al "
             "momento de vender."),
            ("¿Cómo sé la versión exacta de un Tiggo usado?",
             "Revise la matrícula y el número de chasis, y pida en un concesionario de la "
             "marca que le confirmen versión y año de fabricación."),
            ("¿Puedo financiar un Tiggo usado?",
             "Sí, como cualquier usado. La entrada suele depender más del año del "
             "vehículo que de la marca."),
        ]},

        cierre("Hola, busco una SUV compacta y quiero ver las opciones de OKCars.",
               "Si busca una SUV compacta y quiere ver las alternativas que tenemos en "
               "Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Suzuki Grand Vitara usado
# ════════════════════════════════════════════════════════════════════════════
vitara = {
    "title": "Suzuki Grand Vitara usado: qué revisar antes de comprarlo",
    "slug": "suzuki-grand-vitara-usado-ecuador",
    "date": FECHAS[12],
    "cat": CAT["modelos"],
    "tags": ["Grand Vitara usado", "Suzuki Grand Vitara", "SUV 4x4 usadas",
             "SUV usadas Ecuador", "Grand Vitara SZ"],
    "excerpt": "El nombre Grand Vitara ha estado en SUV muy distintas a lo largo de los "
               "años. Cómo saber cuál está mirando, qué revisar en la tracción y por qué "
               "el kilometraje pesa más que el año.",
    "yoast_title": "Suzuki Grand Vitara usado: qué revisar al comprar",
    "yoast_desc": "Un mismo nombre para vehículos de épocas distintas: cómo identificar el "
                  "suyo, revisar la tracción 4x4 y no pagar de más por una unidad cansada.",
    "focus_kw": "suzuki grand vitara usado",
    "bloques": [
        "Pocos nombres tienen tanta historia en las carreteras de la Sierra como el Grand "
        "Vitara. Durante años fue la SUV de quien necesitaba subir a una finca sin "
        "comprar una camioneta, y todavía se ven muchos circulando entre Ibarra, Otavalo "
        "y las comunidades de Imbabura.",

        "Esa misma historia confunde. El nombre se ha usado en vehículos de épocas y "
        "diseños muy distintos, y comprar uno usado empieza por saber cuál está mirando.",

        {"h2": "La respuesta corta: identifique el modelo antes de mirar el precio"},

        "Bajo el nombre Grand Vitara se vendieron SUV de construcción robusta, varias de "
        "ellas con tracción 4x4 y caja de transferencia, que en el país también circularon "
        "con marca Chevrolet. Los modelos más recientes que llevan el nombre son otro "
        "vehículo, con otra plataforma y otro enfoque.",

        "Por eso comparar «un Grand Vitara» contra otro no sirve. Compare dentro del mismo "
        "modelo y la misma tracción, y confirme ambas cosas en la matrícula.",

        {"tabla": [
            ["Qué confirmar", "Dónde se ve", "Por qué importa"],
            ["Marca en la matrícula", "Matrícula del vehículo",
             "Suzuki y Chevrolet tienen redes de repuestos distintas"],
            ["Tracción", "Palanca o perilla de 4x4, placa del vehículo",
             "Una 4x4 tiene componentes extra que revisar"],
            ["Tipo de caja", "Prueba de manejo", "Manual y automática envejecen distinto"],
            ["Año de fabricación", "Número de chasis",
             "Ubica la unidad dentro de su generación"],
        ]},

        {"h2": "La tracción 4x4: lo primero que se revisa"},

        "Si la unidad es 4x4, la tracción es lo más caro de reparar y lo que menos se "
        "prueba en una vuelta por la ciudad. Pida probarla:",

        {"ol": [
            "En un terreno de tierra o grava, conecte la tracción 4x4 y verifique que "
            "entre sin golpes ni ruidos.",
            "Si tiene marcha reducida, pruébela a baja velocidad.",
            "Desconecte y confirme que vuelva a 4x2 sin quedarse trabada.",
            "Al girar el volante a fondo en asfalto con la 4x4 desconectada, no debería "
            "sentir que el auto se frena o salta.",
            "En el elevador, revise fugas de aceite en la caja de transferencia y en los "
            "diferenciales.",
        ]},

        f"Si todavía duda de si necesita la 4x4, lo desarrollamos en "
        f"{link(CUATRO_X_CUATRO, 'camioneta 4x4 o 4x2: cuál necesita')}. El razonamiento "
        "aplica igual a una SUV.",

        {"quote": "Una 4x4 que nunca se usó también es un riesgo: los mecanismos que no se "
                  "mueven se traban. Pida conectarla en la prueba, aunque usted no la "
                  "vaya a usar seguido.",
         "cite": CITA},

        {"h2": "Kilometraje y edad: lo que más pesa en esta SUV"},

        "Muchos Grand Vitara que se ofrecen usados ya tienen años y kilómetros encima. En "
        "un vehículo así, la diferencia entre una buena compra y un problema está en el "
        "historial:",

        {"ul": [
            "<strong>Cambios de banda o cadena de distribución</strong> hechos a tiempo, "
            "con factura.",
            "<strong>Mantenimiento de la caja y los diferenciales</strong>, que muchos "
            "dueños olvidan.",
            "<strong>Suspensión y bujes</strong>: una SUV que subió a fincas los gasta "
            "antes.",
            "<strong>Óxido en la parte baja</strong>, sobre todo si estuvo en zonas "
            "húmedas o cerca de la Costa.",
        ]},

        f"Para leer el kilometraje en contexto, revise {link(KILOMETRAJE, 'cuánto kilometraje es mucho en un auto usado')}. "
        f"Y si nota retoques de pintura, {link(CHOCADO, 'estas señales')} le dicen si "
        "fue un golpe menor o algo estructural.",

        {"h2": "Cinco preguntas para el vendedor"},

        "Con un Grand Vitara usado, la conversación con el dueño anterior le ahorra "
        "sorpresas. Pregunte:",

        {"ol": [
            "¿Para qué lo usaba: ciudad, carretera o caminos de tierra?",
            "¿Cuándo se cambió la banda o la cadena de distribución, y tiene la factura?",
            "¿Alguna vez se le dio mantenimiento a la caja de transferencia y a los "
            "diferenciales?",
            "¿Tuvo algún choque o volcamiento, aunque sea menor?",
            "¿Dónde le hacía el mantenimiento: concesionario o mecánico particular?",
        ]},

        "Las respuestas no tienen que ser perfectas. Lo que importa es que sean concretas "
        "y que cuadren con lo que ve en el auto. Un vendedor que no sabe nada del "
        "mantenimiento de una SUV con muchos kilómetros le está pasando el riesgo a usted.",

        {"h2": "Alternativas en el patio de Ibarra"},

        "Hoy no tenemos un Grand Vitara. Si lo que busca es una SUV con tracción integral "
        "o una camioneta 4x4 para subir a la finca, estas son las opciones reales:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila_ficha("maxus"),
            fila_ficha("tang"),
        ]},

        f"La {enlace_ficha('maxus')} es una camioneta 4x4 diésel; el {enlace_ficha('tang')} "
        f"es una SUV eléctrica con tracción en las cuatro ruedas. {AVISO_INVENTARIO}",

        "Si encuentra una unidad que le gusta en Otavalo, Cayambe o Tulcán, no se apure por "
        "la distancia: pida fotos de los puntos de esta lista y del historial antes de "
        "viajar a verla.",

        {"h2": "Cuándo un Grand Vitara usado no le conviene"},

        "Si casi no sale del asfalto, pagar por la tracción 4x4 de una unidad con años no "
        "tiene sentido: tendrá que mantener componentes que no usa. Una SUV 4x2 más "
        "reciente le dará más comodidad y menos gastos.",

        "Tampoco conviene si la unidad no tiene historial y no puede revisarla en "
        "elevador. En un vehículo con muchos kilómetros, comprar sin papeles de "
        "mantenimiento es asumir todo el riesgo.",

        {"h2": "La regla para elegir bien"},

        "Primero identifique el modelo exacto y la tracción. Después pida el historial y "
        "pruebe la 4x4 en tierra. Si no puede hacer esas dos cosas, siga buscando: hay "
        "suficientes unidades en el mercado como para no comprar a ciegas.",

        {"faq": [
            ("¿El Grand Vitara Chevrolet y el Suzuki son el mismo auto?",
             "Varios modelos del pasado circularon con las dos marcas. Confirme en la "
             "matrícula cuál es el suyo, porque eso define a qué red de repuestos acudir."),
            ("¿Cómo pruebo la tracción 4x4 de un Grand Vitara usado?",
             "En tierra o grava: conéctela, avance, pruebe la reducida si tiene y vuelva a "
             "4x2. No debe haber golpes, ruidos ni trabas."),
            ("¿Cuántos kilómetros es mucho para un Grand Vitara?",
             "Depende del mantenimiento más que de la cifra. Una unidad con muchos "
             "kilómetros y facturas de distribución, caja y diferenciales puede ser mejor "
             "compra que una con menos y sin historial."),
            ("¿Conviene un Grand Vitara si solo manejo en ciudad?",
             "Si es 4x4, probablemente no: pagará por mantener componentes que no usa. "
             "Una SUV 4x2 más reciente le servirá mejor."),
            ("¿Qué revisar en el elevador?",
             "Fugas en la caja de transferencia y diferenciales, óxido en la parte baja, "
             "bujes y amortiguadores."),
        ]},

        cierre("Hola, busco una SUV o camioneta 4x4 y quiero ver las opciones de OKCars.",
               "Si busca algo para subir a la finca y quiere ver las opciones que tenemos "
               "en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Mazda 3 usado
# ════════════════════════════════════════════════════════════════════════════
mazda3 = {
    "title": "Mazda 3 usado: para quién vale la pena y qué revisar",
    "slug": "mazda-3-usado-ecuador",
    "date": FECHAS[16],
    "cat": CAT["modelos"],
    "tags": ["Mazda 3 usado", "sedán usado Ecuador", "hatchback usado",
             "Mazda Ecuador", "comprar sedán usado"],
    "excerpt": "El Mazda 3 juega una categoría por encima del Rio o el Sail. Qué se gana "
               "con ese escalón, qué revisar en una unidad usada y cuándo conviene "
               "más una SUV de la misma marca.",
    "yoast_title": "Mazda 3 usado: para quién vale la pena comprarlo",
    "yoast_desc": "Sedán o hatchback, qué se gana frente a un Rio o un Sail, los puntos a "
                  "revisar en una unidad usada y cuándo le conviene más una SUV de la marca.",
    "focus_kw": "mazda 3 usado",
    "bloques": [
        "El Mazda 3 es el auto de quien quiere un sedán o un hatchback con mejor manejo y "
        "acabados que el promedio, sin pasar a una SUV. En el mercado de usados aparece "
        "seguido y con kilometrajes razonables, porque muchos lo compran como auto "
        "personal y no como herramienta de trabajo.",

        "La pregunta útil no es si es buen auto, sino si a usted le sirve el escalón que "
        "ofrece frente a opciones más económicas. Esta guía le ayuda a responderla.",

        {"h2": "La respuesta corta: un compacto con manejo de categoría superior"},

        "El Mazda 3 es un compacto, un segmento por encima de autos como el Kia Rio o el "
        "Chevrolet Sail. Ofrece más espacio, mejor aislamiento de ruido y un manejo más "
        "preciso. A cambio, cuesta más comprarlo y mantenerlo.",

        {"tabla": [
            ["Aspecto", "Mazda 3", "Rio o Sail"],
            ["Segmento", "Compacto", "Subcompacto"],
            ["Precio de compra usado", "Más alto", "Más bajo"],
            ["Manejo y acabados", "Superiores", "Correctos"],
            ["Costo de mantenimiento", "Algo mayor", "Contenido"],
            ["Para quién", "Quien maneja mucho y valora el confort",
             "Quien prioriza el costo total"],
        ]},

        f"Si el presupuesto manda, revise {link(KIA_RIO, 'la guía del Kia Rio usado')} y "
        f"{link(SAIL, 'la del Chevrolet Sail')}.",

        {"h2": "Sedán o hatchback"},

        "El Mazda 3 se vende en las dos carrocerías. El sedán tiene una cajuela más grande "
        "y separada de la cabina, útil para viajes y para quien lleva maletas seguido. El "
        "hatchback es más corto, se estaciona mejor en el centro de Ibarra o de Quito y "
        "permite cargar objetos altos abatiendo el asiento trasero.",

        "En reventa, en el mercado ecuatoriano el sedán suele tener más demanda. Si "
        "piensa vender el auto en pocos años, es un dato a considerar.",

        {"h2": "Qué revisar en un Mazda 3 usado"},

        {"ol": [
            "<strong>Historial de mantenimiento en concesionario</strong>, con cambios de "
            "aceite a tiempo y el tipo de aceite que pide el fabricante.",
            "<strong>Caja automática</strong>: cambios suaves, sin golpes al pasar de "
            "parqueo a marcha ni demoras en subida.",
            "<strong>Suspensión delantera</strong>: los topes de calle y los baches de "
            "la ciudad pasan factura a un auto bajo.",
            "<strong>Parte inferior del parachoques delantero</strong>, que suele llegar "
            "raspada en autos de baja altura.",
            "<strong>Pantalla y mandos</strong>: pruebe cada función del sistema de "
            "entretenimiento y la cámara si la tiene.",
            "<strong>Llantas</strong>: las de perfil bajo cuestan más; revise la fecha y "
            "el desgaste.",
        ]},

        f"La revisión general está en el {link(CHECKLIST, 'checklist para revisar un auto usado')}. "
        f"Si duda entre caja manual y automática, lea {link(AUTO_MANUAL, 'automático o manual: cuál conviene')}.",

        {"quote": "En un sedán bajo, mire el parachoques por debajo antes que la pintura. Un "
                  "frente muy raspado le dice cómo se manejó el auto en la ciudad.",
         "cite": CITA},

        {"h2": "Qué observar en la prueba de manejo"},

        "El Mazda 3 se compra en buena parte por cómo se maneja, así que la prueba pesa "
        "más que en otros autos. Haga un recorrido que combine ciudad y carretera:",

        {"ul": [
            "<strong>Dirección:</strong> en recta, el auto debe ir derecho sin corregir "
            "el volante; si tira hacia un lado, hay alineación o suspensión que revisar.",
            "<strong>Ruido a velocidad de carretera:</strong> es uno de sus puntos fuertes; "
            "un ruido de viento o de rodamiento marcado no es normal.",
            "<strong>Frenos:</strong> frenadas firmes sin vibración en el volante.",
            "<strong>Topes y empedrado:</strong> pase despacio y escuche golpes secos en "
            "la suspensión delantera.",
        ]},

        f"El recorrido completo, con lo que conviene probar en cada tramo, está en "
        f"{link(PRUEBA_MANEJO, 'la prueba de manejo de un auto usado')}.",

        {"h2": "Lo que cambia entre versiones"},

        "Dentro del mismo modelo hubo versiones con distinto equipamiento: caja manual o "
        "automática, distintos motores según el mercado y el año, y diferencias en "
        "seguridad y tecnología. Dos Mazda 3 del mismo año pueden tener precios muy "
        "distintos por eso.",

        "Antes de comparar publicaciones, pida la versión exacta y verifique el "
        "equipamiento en el auto, no en el anuncio. Pague por lo que el auto tiene, no por "
        "lo que dice la publicación.",

        {"h2": "La alternativa de la misma marca en el patio"},

        "Hoy no tenemos un Mazda 3 en Ibarra. Si le atrae la marca pero necesita más "
        "altura, más espacio atrás o va a salir a caminos de tierra, la SUV de Mazda es "
        "la opción natural:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila_ficha("cx5"),
        ]},

        f"La {enlace_ficha('cx5')} comparte el estilo de manejo de la marca con más "
        f"altura y espacio. La analizamos en {link(POST_CX5, 'la guía de la CX-5 usada')}. "
        f"{AVISO_INVENTARIO}",

        {"h2": "Seguro y reventa: los dos costos que no se ven"},

        "Al ser un auto de mayor valor que un subcompacto, el seguro todo riesgo también "
        "cuesta más, porque se calcula sobre el valor del auto. Cotícelo antes de cerrar, "
        "no después.",

        f"La reventa juega a favor: un Mazda con historial de concesionario suele "
        f"venderse con facilidad. Lo explicamos en {link(REVENTA, 'los autos usados que mejor se revenden')}.",

        {"h2": "Cuándo un Mazda 3 usado no le conviene"},

        "Si entra con frecuencia a caminos de tierra o empedrados, un auto bajo va a "
        "sufrir. Para recorridos hacia comunidades de Imbabura o fincas, una SUV es la "
        "decisión sensata; lo explicamos en "
        f"{link(SUV_SEDAN, 'SUV o sedán usado: cuál conviene')}.",

        "Tampoco conviene si el presupuesto está justo. La diferencia de precio con un "
        "subcompacto se nota en la compra, en el seguro y en algunos repuestos, y esa "
        "suma mensual pesa más que el placer de manejo.",

        {"h2": "La regla para elegir bien"},

        "Si maneja mucho en carretera, valora el confort y el presupuesto lo permite, un "
        "Mazda 3 con historial de concesionario es una compra sólida. Compare publicaciones "
        f"con el método de {link(PRECIO_JUSTO, 'cuánto pagar por un auto usado')} y no "
        "pague de más solo por la marca.",

        {"faq": [
            ("¿El Mazda 3 es mejor que el Kia Rio?",
             "Es de un segmento superior: más espacio, mejor manejo y acabados. También "
             "cuesta más comprarlo y mantenerlo. Depende de cuánto valore ese escalón."),
            ("¿Conviene más el sedán o el hatchback?",
             "El sedán tiene cajuela más grande y suele revenderse mejor. El hatchback se "
             "estaciona más fácil y es más versátil para cargar objetos altos."),
            ("¿Qué revisar en un Mazda 3 usado?",
             "Historial de mantenimiento en concesionario, caja automática, suspensión "
             "delantera, parte baja del parachoques, electrónica y llantas."),
            ("¿Un Mazda 3 sirve para caminos de tierra?",
             "No es lo ideal. Es un auto bajo; para tierra o empedrado una SUV le dará "
             "menos problemas."),
            ("¿El mantenimiento de un Mazda es caro?",
             "Algo más alto que el de un subcompacto, sobre todo si sigue el plan del "
             "concesionario. A cambio, un historial completo ayuda mucho al revenderlo."),
        ]},

        cierre("Hola, me interesa la Mazda CX-5 de OKCars y quiero más información.",
               "Si le interesa la CX-5 o quiere comparar opciones en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Hyundai Accent usado
# ════════════════════════════════════════════════════════════════════════════
accent = {
    "title": "Hyundai Accent usado: cómo saber si fue taxi",
    "slug": "hyundai-accent-usado-ecuador",
    "date": FECHAS[18],
    "cat": CAT["modelos"],
    "tags": ["Hyundai Accent usado", "auto ex taxi", "sedán usado Ecuador",
             "comprar auto usado", "Hyundai Ecuador"],
    "excerpt": "El Accent es de los sedanes más usados como taxi en el país. Eso no lo "
               "hace mala compra, pero obliga a revisar distinto. Las señales de un ex "
               "taxi y qué hacer si encuentra una.",
    "yoast_title": "Hyundai Accent usado: cómo saber si fue taxi",
    "yoast_desc": "Pintura amarilla escondida, desgaste atrás y el historial de servicio: "
                  "las señales de un Accent que trabajó como taxi y cuándo igual le conviene.",
    "focus_kw": "hyundai accent usado",
    "bloques": [
        "El Hyundai Accent se ganó su lugar en Ecuador por ser cómodo, económico y "
        "confiable. Por esas mismas razones fue durante años uno de los autos preferidos "
        "de las cooperativas de taxis, y hoy muchos de esos autos están en el mercado de "
        "usados.",

        "Un ex taxi no es necesariamente una mala compra. El problema es comprarlo sin "
        "saberlo y pagarlo como si hubiera sido el auto de una familia. Esta guía le "
        "enseña a distinguirlo.",

        {"h2": "La respuesta corta: un ex taxi deja huellas que no se borran"},

        "Un taxi recorre en un año lo que un auto particular en varios. Aunque se repinte "
        "y se cambie el tablero, quedan marcas en la carrocería, en el interior y en los "
        "papeles. Si sabe dónde mirar, se detectan en diez minutos.",

        {"tabla": [
            ["Dónde mirar", "Qué buscar", "Qué indica"],
            ["Marcos de puertas y cajuela", "Restos de pintura amarilla",
             "Repintado desde color de taxi"],
            ["Techo", "Agujeros tapados o marcas de soporte", "Hubo un letrero"],
            ["Tablero y consola", "Perforaciones o cables cortados",
             "Taxímetro o radio instalados"],
            ["Asiento trasero", "Desgaste mayor que el delantero del acompañante",
             "Muchos pasajeros atrás"],
            ["Historial en la ANT", "Tipo de servicio registrado",
             "Si estuvo matriculado como servicio público"],
        ]},

        {"h2": "Cómo revisarlo paso a paso"},

        {"ol": [
            "Abra todas las puertas y la cajuela y mire los marcos, las bisagras y los "
            "bordes interiores: ahí el repintado casi nunca llega completo.",
            "Revise el techo con la luz de lado, buscando agujeros rellenados.",
            "Mire debajo del tablero y de la consola central si hay cables cortados o "
            "perforaciones sin uso.",
            "Compare el desgaste de los asientos de atrás con el del acompañante.",
            "Pida el historial del vehículo y revise el tipo de servicio con el que estuvo "
            "matriculado.",
            "Contraste el kilometraje con todo lo anterior: un ex taxi con kilometraje "
            "bajo es una alerta seria.",
        ]},

        f"La parte documental, incluida la verificación de deudas y gravámenes, está en "
        f"{link(VERIFICAR_DEUDAS, 'cómo verificar si un auto usado tiene problemas legales')}.",

        {"quote": "Un ex taxi bien mantenido puede ser buena compra. Lo que no se perdona "
                  "es que se lo vendan como auto de uso particular: si el vendedor lo "
                  "ocultó, pregúntese qué más ocultó.",
         "cite": CITA},

        {"h2": "Si fue taxi, ¿igual vale la pena?"},

        "Puede valer, con condiciones. Muchas cooperativas mantienen sus autos con "
        "disciplina porque un taxi parado no factura. Si la unidad tiene historial de "
        "mantenimiento, el precio refleja el uso y una revisión mecánica sale bien, es "
        "una opción económica para quien necesita un auto confiable sin pagar de más.",

        {"ul": [
            "<strong>Exija un precio acorde.</strong> Un ex taxi vale menos que un auto "
            f"particular del mismo año; compárelo con el método de {link(PRECIO_JUSTO, 'precio justo')}.",
            "<strong>Revise la caja y el embrague</strong>, que en un taxi trabajan todo "
            "el día en tráfico.",
            "<strong>Revise la suspensión</strong>: muchos kilómetros por calles con "
            "baches.",
            "<strong>Confirme el trámite de cambio de servicio</strong> a particular, si "
            "aplica, antes de hacer el traspaso.",
        ]},

        f"El traspaso en sí sigue los pasos normales que explicamos en "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador')}.",

        {"h2": "Qué preguntarle al vendedor"},

        "Haga estas preguntas de frente. La respuesta importa, pero la reacción también:",

        {"ol": [
            "¿El auto trabajó alguna vez como taxi o en alguna plataforma de transporte?",
            "¿Cuántos dueños tuvo y desde cuándo lo tiene usted?",
            "¿Tiene las facturas de mantenimiento, sobre todo de embrague y frenos?",
            "¿Lo repintaron completo o por partes, y por qué?",
            "¿Me deja llevarlo a revisar en elevador antes de cerrar?",
        ]},

        "Un vendedor que responde con detalle y acepta la revisión suele tener poco que "
        "esconder. Si las respuestas son vagas o se niega a la revisión, siga buscando: "
        "hay suficientes Accent en el mercado como para no tomar ese riesgo.",

        "Si el auto trabajó en plataformas de transporte con placa particular, no tendrá "
        "las huellas de un taxi, pero sí un kilometraje alto y desgaste en el asiento "
        "trasero. Pregunte igual.",

        {"h2": "Accent, Rio o Sail"},

        "El Accent compite con el Kia Rio, con el que comparte mucho de su base técnica, "
        "y con el Chevrolet Sail. Los tres son subcompactos con repuestos fáciles de "
        "conseguir en Ibarra, Otavalo o Tulcán. En los tres aplica la misma advertencia: "
        "han sido autos de taxi y conviene revisarlos con esta lista.",

        f"Si quiere compararlos, tenemos {link(KIA_RIO, 'la guía del Kia Rio usado')}. "
        "Hoy no tenemos un Accent en el patio; si busca un auto económico de bajo "
        f"consumo, el {enlace_ficha('prius')} es una alternativa híbrida. {AVISO_INVENTARIO}",

        {"h2": "Lo que cuesta ponerlo a punto"},

        "Un Accent con mucho uso casi siempre necesita algo apenas lo compra. Cuente con "
        "eso en el presupuesto antes de negociar: embrague si se siente alto o patina, "
        "amortiguadores si el auto rebota en los topes, frenos y, muchas veces, llantas.",

        "Pida a su mecánico una lista con prioridades después de la revisión y úsela para "
        "negociar. Lo urgente lo debería asumir el vendedor o descontarlo del precio; lo "
        "que puede esperar unos meses, súmelo a su propio presupuesto del primer año.",

        {"h2": "Cuándo un Accent usado no le conviene"},

        "Si no puede o no quiere hacer esta revisión, compre en un patio que verifique el "
        "historial antes de publicar el auto, o busque otro modelo con menos presencia en "
        "el servicio de taxi.",

        "Tampoco conviene un ex taxi si piensa revenderlo pronto: el próximo comprador "
        "también va a revisar los marcos de las puertas.",

        {"h2": "La regla para comprar tranquilo"},

        "Antes de hablar de precio, abra las puertas y mire los marcos. Con esa sola "
        f"revisión sabrá qué tipo de auto tiene delante. El resto está en el "
        f"{link(CHECKLIST, 'checklist para revisar un auto usado')}.",

        {"faq": [
            ("¿Cómo saber si un Hyundai Accent fue taxi?",
             "Busque pintura amarilla en los marcos de puertas y cajuela, agujeros "
             "tapados en el techo, cables cortados bajo el tablero, desgaste fuerte del "
             "asiento trasero y el tipo de servicio en el historial del vehículo."),
            ("¿Es malo comprar un auto que fue taxi?",
             "No necesariamente. Si tiene historial de mantenimiento, una revisión "
             "mecánica favorable y un precio acorde a su uso, puede ser una compra "
             "económica y razonable."),
            ("¿Cuánto menos vale un ex taxi?",
             "Depende del estado y del kilometraje. Compárelo con autos particulares del "
             "mismo año y exija una diferencia que refleje el uso intensivo."),
            ("¿El Accent y el Rio son el mismo auto?",
             "Comparten buena parte de su base técnica, pero son modelos de marcas "
             "distintas con diseño y equipamiento propios."),
            ("¿Qué revisar en la parte mecánica de un ex taxi?",
             "Caja y embrague, suspensión, frenos y el historial de cambios de aceite. "
             "Haga una revisión en elevador antes de pagar."),
        ]},

        cierre("Hola, busco un auto económico y quiero ver las opciones de OKCars.",
               "Si busca un auto económico y quiere ver las opciones que tenemos en "
               "Ibarra, escríbanos al"),
    ],
}


if __name__ == "__main__":
    for s in [dmax, tiggo, vitara, mazda3, accent]:
        print(guarda(s))
