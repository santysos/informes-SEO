#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote F — cluster de traspaso y cambio de propietario (5 posts).

En Search Console, 311 consultas distintas sobre traspaso y cambio de propietario
suman 1.192 impresiones con un CTR de 0,50 %. Un solo artículo las atiende hoy.
Este lote abre los casos particulares que ese artículo no cubre.
"""
from comun import (AVISO_COSTOS, CAT, CHECKLIST, COSTO_GRAVAMENES, COSTO_NOTARIA,
                   COSTO_TASA_ANT, DOMINIO, LISTADO, PAPELES, PLAZO_ANT, PRENDA,
                   TRASPASO, guarda, link, wa)

CITA = "Equipo comercial de OKCars"


# ════════════════════════════════════════════════════════════════════════════
# 1 · Cambio de propietario
# ════════════════════════════════════════════════════════════════════════════
propietario = {
    "title": "Cambio de propietario de un vehículo: cuánto cuesta y cuánto demora",
    "slug": "cambio-de-propietario-vehiculo-ecuador",
    "date": "2026-10-16T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["cambio de propietario", "traspaso vehículo Ecuador", "ANT",
             "trámites vehiculares", "matrícula"],
    "excerpt": "Cambio de propietario y traspaso son lo mismo, y esa confusión hace que "
               "mucha gente busque mal. Cuánto se paga, cuánto demora en la ANT y qué "
               "hace que el trámite se trabe.",
    "yoast_title": "Cambio de propietario de vehículo: costo y tiempo",
    "yoast_desc": "Entre notaría y tasa de la ANT, el cambio de propietario cuesta unos "
                  "$55 a $100 y demora de 3 a 10 días hábiles. Qué documentos piden y qué traba el trámite.",
    "focus_kw": "cambio de propietario vehiculo",
    "bloques": [
        "Mucha gente busca «cambio de propietario» y encuentra artículos que hablan de "
        "«traspaso». Se pregunta si son dos trámites distintos, si hay que hacer los dos, "
        "o cuál corresponde en su caso.",

        "Son lo mismo. El nombre formal del trámite en la Agencia Nacional de Tránsito es "
        "traspaso de dominio; en el uso corriente la gente dice cambio de propietario o "
        "cambio de nombre. Ninguno está mal y todos apuntan al mismo procedimiento: que el "
        "vehículo deje de estar a nombre de quien lo vendió y pase al de quien lo compró.",

        {"h2": "Cuánto cuesta"},

        f"El costo no es una cifra única, sino la suma de varios rubros. Estos son los que "
        f"aparecen en prácticamente todos los casos:",

        {"tabla": [
            ["Concepto", "Costo referencial", "Quién lo suele pagar"],
            ["Compraventa con reconocimiento de firmas (notaría)", f"Entre {COSTO_NOTARIA}", "Comprador"],
            ["Certificado de gravámenes", f"Entre {COSTO_GRAVAMENES}", "Comprador"],
            ["Tasa de traspaso en la ANT", f"Entre {COSTO_TASA_ANT}", "Comprador"],
            ["Certificado de no adeudo (multas)", "Variable", "Vendedor"],
            ["Impuestos del año en curso", "Según avalúo", "Vendedor"],
            ["Emisión de nueva matrícula", "Variable según cantón", "Comprador"],
        ]},

        f"Sumando los rubros fijos, un comprador suele gastar entre 55 y 100 dólares. "
        f"{AVISO_COSTOS}",

        "Los rubros variables son los que descuadran presupuestos. Si el vehículo arrastra "
        "multas o impuestos impagos, esa cuenta se paga antes de que el sistema permita "
        "avanzar, y puede ser cualquier monto. Por eso conviene verificarlo antes de "
        "acordar el precio, no después.",

        {"h2": "Cuánto demora"},

        f"Con toda la documentación en regla, el trámite en la ANT suele completarse entre "
        f"{PLAZO_ANT}. Si aparecen observaciones, el plazo puede estirarse a dos o tres "
        "semanas.",

        "La parte que la gente subestima no es el trámite en sí, sino lo que va antes: "
        "conseguir que el vendedor firme la compraventa, que regularice sus multas y que "
        "entregue los documentos completos. Ahí es donde se pierden las semanas.",

        {"quote": "El trámite en la agencia se hace rápido. Lo que demora es perseguir al "
                  "vendedor para que firme o para que pague una multa de hace dos años. Por "
                  "eso en el patio no entregamos un vehículo hasta que la carpeta esté "
                  "completa: preferimos demorar tres días en recibirlo y que el cliente no "
                  "espere tres semanas.",
         "cite": CITA},

        {"h2": "Qué documentos piden"},

        {"ol": [
            "Cédula y papeleta de votación de comprador y vendedor.",
            "Matrícula original del vehículo, vigente.",
            "Contrato de compraventa con reconocimiento de firmas en notaría.",
            "Certificado de gravámenes que confirme que el vehículo no tiene prenda.",
            "Certificado de no adeudo de multas e impuestos.",
            "Revisión técnica vehicular vigente, en los cantones donde se exige.",
        ]},

        "Si alguno falta, el trámite no arranca. La matrícula original es la que más "
        "problemas causa: hay vendedores que la perdieron y tienen que solicitar un "
        "duplicado, lo que agrega días.",

        {"h2": "Las cinco cosas que traban el trámite"},

        {"ul": [
            "<strong>Multas pendientes.</strong> El sistema bloquea el traspaso hasta que "
            "estén canceladas.",
            "<strong>Prenda vigente.</strong> Si el vehículo respalda un crédito, hay que "
            "levantar la prenda en la entidad financiera primero.",
            "<strong>Revisión técnica caducada.</strong> Donde aplica, sin RTV vigente el "
            "trámite queda en pausa.",
            "<strong>Datos que no coinciden con la matrícula.</strong> Chasis, motor o "
            "color modificados sin actualizar legalmente.",
            "<strong>Vendedor que no firma.</strong> Sin la cesión de derechos firmada, la "
            "ANT no procesa nada.",
        ]},

        f"El caso de la prenda merece atención aparte porque es más frecuente de lo que "
        f"parece: lo explicamos en detalle en el artículo sobre "
        f"{link(PRENDA, 'comprar un auto con prenda')}.",

        {"h2": "Por qué en un concesionario esto no es tu problema"},

        "Comprar a un particular significa hacer todo lo anterior por tu cuenta: verificar "
        "gravámenes, perseguir firmas, ir a la notaría, sacar turnos. Es perfectamente "
        "posible y mucha gente lo hace bien.",

        "La diferencia al comprar en un patio formal es que esa gestión ya está resuelta "
        "antes de que el vehículo se publique. Nosotros no recibimos una unidad sin "
        "verificar gravámenes, multas y coincidencia de datos. Cuando el cliente decide "
        "comprar, la carpeta está lista.",

        "Nuestra recomendación en contra, para ser justos: si el auto que te interesa lo "
        "vende un particular y el precio es notoriamente mejor, no descartes la compra por "
        "el trámite. Lo que sí te recomendamos es no entregar dinero antes de tener el "
        "certificado de gravámenes en la mano. Ese solo paso evita la mayoría de los "
        "problemas que vemos.",

        f"Si querés el procedimiento completo paso a paso, está en nuestra guía de "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador')}, y la lista de documentos a "
        f"exigir antes de pagar en {link(PAPELES, 'qué papeles pedir antes de comprar')}.",

        {"h2": "El error de dejarlo para después"},

        "Hay una costumbre extendida que conviene desarmar: cerrar la compra, recibir las "
        "llaves y postergar el traspaso «para cuando haya tiempo». Mientras el trámite no "
        "se complete, el vehículo sigue siendo legalmente de quien te lo vendió.",

        "Eso significa que las multas que generes llegan a su nombre, que él puede "
        "reclamar el vehículo como suyo, y que en un accidente la responsabilidad recae "
        "sobre el titular registral. También significa que si esa persona fallece o se va "
        "del país, tu trámite se complica muchísimo.",

        "El plazo razonable para completar el traspaso es de días, no de meses. Si el "
        "vendedor propone dejarlo pendiente, tomalo como una señal de alerta y no como una "
        "comodidad.",

        {"faq": [
            ("¿Cambio de propietario y traspaso son lo mismo?",
             "Sí. El nombre formal del trámite en la ANT es traspaso de dominio; cambio de "
             "propietario y cambio de nombre son las formas coloquiales de decir lo mismo. "
             "No hay que hacer dos trámites."),
            ("¿Cuánto vale el cambio de propietario de un carro?",
             "Sumando notaría, certificado de gravámenes y tasa de la ANT, el comprador "
             "suele gastar entre 55 y 100 dólares. A eso se agregan multas o impuestos "
             "pendientes, que corresponden al vendedor y varían caso a caso."),
            ("¿Cuánto tiempo demora el cambio de propietario?",
             "Con los papeles en regla, entre 3 y 10 días hábiles. Con observaciones puede "
             "llegar a dos o tres semanas. Lo que más demora suele ser la etapa previa: "
             "reunir firmas y regularizar deudas del vendedor."),
            ("¿Se puede hacer el cambio de propietario con deudas?",
             "No mientras existan multas o impuestos impagos: el sistema bloquea el "
             "trámite. Hay que cancelarlos primero, y por convención le corresponde al "
             "vendedor hacerlo antes de la venta."),
            ("¿Quién paga el cambio de propietario?",
             "Por costumbre, el comprador cubre notaría, certificado y tasa de la ANT, "
             "mientras que el vendedor regulariza multas e impuestos de su período. Es "
             "negociable y conviene dejarlo por escrito en la compraventa."),
        ]},

        f"Si preferís comprar con el trámite ya resuelto, mirá el "
        f"{link(LISTADO, 'listado de vehículos de OKCars')} o escribinos al "
        f"{link(wa('Hola, quiero comprar un auto con los papeles y el traspaso ya resueltos.'), 'WhatsApp')}. "
        f"Estamos en Ibarra y atendemos a compradores de Otavalo, Atuntaqui, Cotacachi, "
        f"Cayambe y Tulcán.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Traspaso de moto
# ════════════════════════════════════════════════════════════════════════════
moto = {
    "title": "Traspaso de una moto en Ecuador: cuánto cuesta y qué piden",
    "slug": "traspaso-de-moto-ecuador-costo",
    "date": "2026-10-19T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["traspaso de moto", "motos Ecuador", "ANT", "trámites vehiculares",
             "cambio de propietario"],
    "excerpt": "El trámite es el mismo que el de un auto, pero hay tres diferencias que "
               "cambian el costo y una trampa habitual en la compra de motos usadas: la "
               "que se vende sin matrícula.",
    "yoast_title": "Traspaso de moto en Ecuador: cuánto cuesta y qué piden",
    "yoast_desc": "El traspaso de una moto sigue el mismo procedimiento que el de un auto, "
                  "con costos algo menores. Qué documentos piden y qué revisar antes de pagar por una moto.",
    "focus_kw": "traspaso de moto ecuador",
    "bloques": [
        "El traspaso de una motocicleta en Ecuador sigue el mismo procedimiento que el de "
        "un automóvil: se hace en la Agencia Nacional de Tránsito, requiere compraventa "
        "notariada y termina con una matrícula nueva a nombre del comprador.",

        "Las diferencias están en el costo y en los riesgos particulares del mercado de "
        "motos usadas, que son distintos a los del mercado de autos.",

        {"h2": "Cuánto cuesta"},

        f"Los rubros son los mismos que en un vehículo: reconocimiento de firmas en "
        f"notaría, certificado de gravámenes, tasa de traspaso y emisión de matrícula. Las "
        f"tarifas notariales y las tasas se calculan sobre el avalúo, y como una moto vale "
        f"bastante menos que un auto, el total suele quedar por debajo.",

        {"tabla": [
            ["Concepto", "Referencia para vehículo", "En moto"],
            ["Reconocimiento de firmas", f"Entre {COSTO_NOTARIA}", "Similar o algo menor"],
            ["Certificado de gravámenes", f"Entre {COSTO_GRAVAMENES}", "Igual"],
            ["Tasa de traspaso", f"Entre {COSTO_TASA_ANT}", "Menor, según avalúo"],
            ["Impuestos pendientes", "Según avalúo", "Bastante menores"],
        ]},

        f"{AVISO_COSTOS} En motos de avalúo bajo, la diferencia frente a un auto se nota "
        "sobre todo en los impuestos, no en los rubros fijos de notaría.",

        {"h2": "El problema de la moto sin matrícula"},

        "Acá está el riesgo específico de este mercado, y es la razón principal por la que "
        "escribimos este artículo.",

        "Es común encontrar motos usadas en venta cuya matrícula nunca se puso a nombre del "
        "vendedor actual. La moto pasó de mano en mano con una compraventa informal —a "
        "veces solo un papel firmado— y sigue registrada a nombre de alguien de hace dos o "
        "tres dueños atrás.",

        "Quien compra en esas condiciones hereda un problema serio. Para regularizarla hay "
        "que ubicar al titular registral, que puede haberse mudado, no querer firmar o "
        "directamente no ser localizable. Sin su firma, la moto no se puede poner a nombre "
        "de nadie más.",

        {"quote": "Con motos vemos el mismo caso una y otra vez: la compran barata, con un "
                  "papel escrito a mano, y a los dos años quieren venderla y descubren que "
                  "legalmente nunca fue suya. La regla es simple: si el vendedor no aparece "
                  "en la matrícula, no es una compra, es una apuesta.",
         "cite": CITA},

        "La verificación es sencilla y toma un minuto: pedí la matrícula y comprobá que el "
        "nombre que aparece sea el de la persona que te está vendiendo, con la cédula en la "
        "mano. Si no coincide, o hay una cadena de compraventas informales, la respuesta "
        "correcta es retirarse.",

        {"h2": "Qué documentos piden"},

        {"ol": [
            "Cédula y papeleta de votación de las dos partes.",
            "Matrícula original de la moto, a nombre del vendedor.",
            "Contrato de compraventa con reconocimiento de firmas.",
            "Certificado de gravámenes.",
            "Certificado de no adeudo de multas e impuestos.",
            "Revisión técnica vigente donde el cantón la exija.",
        ]},

        {"h2": "Lo que hay que revisar antes de pagar"},

        "Además de los papeles, en una moto usada hay verificaciones físicas que evitan "
        "sorpresas:",

        {"ul": [
            "<strong>Número de chasis y de motor</strong> legibles y coincidentes con la "
            "matrícula. Si están limados, alterados o no se leen, no avances.",
            "<strong>Multas asociadas.</strong> Consultalas por placa antes de acordar "
            "precio, no después.",
            "<strong>Historial de accidentes.</strong> Un chasis torcido se nota en el "
            "desgaste desparejo de las llantas y en cómo la moto se va de lado.",
            "<strong>Kilometraje coherente</strong> con el estado de manillares, pedales y "
            "asiento.",
        ]},

        {"h2": "Nosotros no vendemos motos, y aun así te lo contamos"},

        "Vale la aclaración: en OKCars vendemos vehículos livianos, no motocicletas. "
        "Escribimos esta guía porque muchas de las preguntas que nos llegan sobre trámites "
        "vienen de gente que está haciendo el traspaso de una moto, y el procedimiento es "
        "el mismo que dominamos todos los días.",

        "Si tu caso es una moto, el trámite lo vas a hacer por tu cuenta y con esta guía "
        f"deberías tener el panorama completo. Si en algún momento das el salto a un "
        f"vehículo, en el {link(LISTADO, 'listado de OKCars')} vas a encontrar unidades con "
        "los papeles verificados antes de publicarse, que es justamente lo que evita todo "
        "lo descrito arriba.",

        f"El procedimiento general está desarrollado en la guía de "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador')}, y la lista de verificación "
        f"documental en {link(PAPELES, 'qué papeles pedir antes de comprar')}.",

        {"h2": "Diferencias prácticas frente al traspaso de un auto"},

        "Aunque el procedimiento sea idéntico, en el día a día aparecen tres diferencias "
        "que conviene tener presentes:",

        {"ol": [
            "<strong>El avalúo es menor</strong>, así que las tasas y los impuestos que se "
            "calculan sobre él bajan de forma proporcional.",
            "<strong>La informalidad es mayor.</strong> El mercado de motos usadas mueve "
            "mucho más volumen en efectivo y con documentos improvisados, lo que multiplica "
            "los casos de titularidad irregular.",
            "<strong>La rotación es más rápida.</strong> Una moto cambia de dueño con "
            "mucha más frecuencia que un auto, y cada cambio sin registrar agrega un "
            "eslabón que después hay que reconstruir.",
        ]},

        "Ese tercer punto explica por qué tantas motos circulan a nombre de personas que "
        "ya no las tienen. En Imbabura, con el uso intensivo de moto que hay entre Otavalo, "
        "Atuntaqui y las parroquias rurales, es una situación bastante común.",

        "Si vas a comprar una moto usada, la verificación de titularidad no es un paso "
        "más de la lista: es el único que puede dejarte sin nada. Todo lo demás —el "
        "estado del motor, los frenos, la suspensión— se arregla con dinero y tiempo. Una "
        "moto que legalmente no te pertenece no se arregla de ninguna manera.",

        {"faq": [
            ("¿Cuánto cuesta el traspaso de una moto en Ecuador?",
             "Los rubros son los mismos que en un auto —notaría, certificado de gravámenes, "
             "tasa de traspaso y matrícula— pero calculados sobre un avalúo menor, así que "
             "el total suele quedar por debajo. Los valores cambian entre cantones y "
             "notarías."),
            ("¿Se puede traspasar una moto sin la matrícula original?",
             "No. Si la matrícula se perdió, el titular registral debe solicitar un "
             "duplicado antes de que el traspaso pueda iniciarse."),
            ("¿Qué pasa si la moto está a nombre de un dueño anterior?",
             "No se puede traspasar a tu nombre sin la firma de quien figura en la "
             "matrícula. Es el problema más común en el mercado de motos usadas y la razón "
             "por la que hay que verificar la titularidad antes de pagar."),
            ("¿Cuánto demora el traspaso de una moto?",
             f"Con los documentos completos, entre {PLAZO_ANT}, igual que en un vehículo "
             "liviano. Las demoras suelen venir de multas pendientes o de documentación "
             "incompleta del vendedor."),
        ]},

        f"¿Estás pensando en cambiar la moto por un auto? Escribinos al "
        f"{link(wa('Hola, quiero información sobre cambiar mi moto por un auto seminuevo en OKCars.'), 'WhatsApp de OKCars')} "
        f"y te decimos qué opciones hay. Estamos en Ibarra, y recibimos compradores de toda "
        f"Imbabura y del Carchi. También podés revisar el "
        f"{link(DOMINIO, 'artículo sobre traspaso de dominio')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Traspaso con multas o deudas
# ════════════════════════════════════════════════════════════════════════════
multas = {
    "title": "Traspaso con multas o deudas pendientes: qué se puede hacer",
    "slug": "traspaso-con-multas-pendientes-ecuador",
    "date": "2026-10-21T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["multas ANT", "traspaso vehículo Ecuador", "deudas vehiculares",
             "trámites vehiculares", "cambio de propietario"],
    "excerpt": "El sistema bloquea el traspaso mientras haya multas o impuestos impagos. "
               "Quién debe pagarlos, cómo se negocia y por qué nunca conviene aceptar el "
               "«después lo arreglamos».",
    "yoast_title": "Traspaso con multas pendientes: qué hacer en Ecuador",
    "yoast_desc": "Con multas o impuestos impagos el sistema bloquea el traspaso. Quién "
                  "los paga, cómo se descuenta del precio y qué tipo de acuerdo no conviene aceptar nunca.",
    "focus_kw": "traspaso con multas pendientes",
    "bloques": [
        "Es una de las situaciones más frecuentes al comprar un vehículo usado: el trato "
        "está cerrado, el precio acordado, y al momento de iniciar el trámite aparece que "
        "el auto tiene multas o impuestos impagos.",

        "La regla general es simple y no admite excepciones: mientras existan valores "
        "pendientes, el sistema no permite completar el traspaso. Lo que sí admite "
        "discusión es quién los paga y cómo.",

        {"h2": "Por qué se bloquea"},

        "Las multas de tránsito y los impuestos vehiculares están asociados a la placa, no "
        "a la persona. El registro no permite transferir un vehículo que arrastra "
        "obligaciones impagas, porque de lo contrario sería trivial esquivar una multa "
        "vendiendo el auto.",

        "Eso protege al comprador tanto como al Estado. Si el traspaso se permitiera con "
        "deudas, quien compra heredaría automáticamente los valores del dueño anterior.",

        {"h2": "Quién debe pagar"},

        "Por convención en el mercado ecuatoriano, las multas e impuestos generados hasta "
        "la fecha de la venta le corresponden al vendedor. Es lógico: son consecuencia de "
        "cómo usó el vehículo mientras era suyo.",

        "Esa convención no es una ley que te proteja automáticamente. Es una costumbre, y "
        "por lo tanto es negociable. Hay tres formas habituales de resolverlo:",

        {"ol": [
            "<strong>El vendedor paga antes de la venta.</strong> Es lo más limpio: se "
            "cancela todo, se emite el certificado de no adeudo y recién ahí se firma la "
            "compraventa.",
            "<strong>Se descuenta del precio.</strong> El comprador paga las multas y ese "
            "monto se resta del valor acordado. Funciona, siempre que quede por escrito.",
            "<strong>Pago simultáneo.</strong> Ambas partes van juntas, se cancelan los "
            "valores en el momento y se continúa con el trámite el mismo día.",
        ]},

        {"quote": "Lo que nunca hay que aceptar es el «págalo vos y después arreglamos». "
                  "En el momento en que entregaste el dinero sin documento, perdiste toda "
                  "la fuerza para negociar. Si el vendedor no quiere firmar cómo se "
                  "resuelve, eso ya te está diciendo algo.",
         "cite": CITA},

        {"h2": "Cómo consultar antes de comprometerte"},

        "La consulta es pública y gratuita, y se hace con la placa. Toma menos de dos "
        "minutos y debería ser el primer paso de cualquier negociación, antes incluso de "
        "ver el auto.",

        {"ul": [
            "Multas de tránsito por placa, en el sistema de la Agencia Nacional de "
            "Tránsito.",
            "Impuestos vehiculares pendientes, en el portal del Servicio de Rentas "
            "Internas.",
            "Valores municipales, en el cantón donde el vehículo esté matriculado.",
            "Gravámenes y prendas, mediante el certificado correspondiente.",
        ]},

        "Consultarlo antes cambia por completo la conversación. Llegar a negociar sabiendo "
        "que el auto arrastra trescientos dólares en multas te da un argumento concreto "
        "para ajustar el precio. Descubrirlo después de haber dado una señal te deja "
        "pidiendo un favor.",

        {"h2": "El caso de las multas del comprador"},

        "Hay una variante que sorprende a mucha gente: las multas impagas del comprador "
        "también pueden trabar el trámite, aunque no tengan nada que ver con ese vehículo. "
        "Si arrastrás obligaciones pendientes a tu nombre, conviene regularizarlas antes de "
        "iniciar la compra, para no descubrirlo cuando el vendedor ya esté esperando.",

        {"h2": "Qué hacemos nosotros con esto"},

        "En OKCars la verificación de multas, impuestos y gravámenes se hace antes de "
        "recibir el vehículo, no después de venderlo. Si una unidad llega con valores "
        "pendientes, se regularizan como condición para que entre al patio.",

        "Eso significa que el cliente que compra en Ibarra no negocia multas con nadie: "
        "recibe el vehículo con la carpeta limpia. Es una de las diferencias concretas "
        "entre comprar en un patio formal y comprar a un particular, más allá del precio.",

        "Nuestra recomendación en contra, otra vez para ser justos: si encontrás un auto "
        "excelente de un particular y tiene multas, no lo descartes por eso. Las multas se "
        "pagan y el problema desaparece. Lo que sí descartaría es a un vendedor que se "
        "molesta porque le pediste el certificado de no adeudo.",

        f"El procedimiento completo está en la guía de "
        f"{link(TRASPASO, 'traspaso de vehículo')}, y la verificación documental previa en "
        f"{link(PAPELES, 'qué papeles pedir antes de comprar un auto usado')}. Si además "
        f"el vehículo tiene prenda, mirá {link(PRENDA, 'cómo se levanta una prenda')}.",

        {"h2": "Cómo dejarlo por escrito"},

        "Cuando se acuerda que el comprador paga las multas y se descuenta del precio, ese "
        "acuerdo tiene que constar en el contrato de compraventa. No en un mensaje de "
        "WhatsApp ni en una conversación.",

        "La redacción no necesita ser sofisticada. Basta con dejar claro tres cosas: cuál "
        "es el precio total acordado, qué monto corresponde a multas e impuestos "
        "pendientes, y quién los cancela. Si el comprador los paga, se indica que ese valor "
        "se descuenta del precio y se detalla el saldo que efectivamente recibe el "
        "vendedor.",

        {"ul": [
            "Precio total acordado por el vehículo.",
            "Monto exacto de multas e impuestos pendientes a la fecha.",
            "Quién los cancela y de qué forma.",
            "Saldo neto que recibe el vendedor.",
            "Plazo para completar el traspaso.",
        ]},

        "Ese último punto —el plazo— es el que más se olvida y el que más problemas "
        "resuelve. Sin una fecha límite escrita, un traspaso puede quedar en el aire "
        "durante meses mientras el vehículo circula a nombre de otra persona.",

        {"h2": "Cuándo conviene retirarse"},

        "No todas las situaciones con multas son iguales. Un vehículo con una o dos multas "
        "recientes es un caso normal que se resuelve pagando. Un vehículo con muchas multas "
        "acumuladas durante años cuenta otra historia: habla de un dueño descuidado, y ese "
        "descuido rara vez se limita a los papeles.",

        "Cuando vemos un historial así, la pregunta que nos hacemos no es cuánto cuesta "
        "regularizarlo, sino cómo lo habrá tratado mecánicamente. Suele ser motivo "
        "suficiente para no recibir la unidad.",

        {"faq": [
            ("¿Se puede hacer el traspaso con multas pendientes?",
             "No. El sistema bloquea el trámite hasta que las multas e impuestos estén "
             "cancelados. No hay forma de avanzar con valores impagos."),
            ("¿Quién paga las multas al comprar un auto usado?",
             "Por convención le corresponden al vendedor, porque se generaron mientras el "
             "vehículo era suyo. Es negociable, y lo que se acuerde debe quedar por escrito "
             "en el contrato de compraventa."),
            ("¿Cómo consulto si un vehículo tiene multas?",
             "Con la placa, en el sistema de la Agencia Nacional de Tránsito para multas de "
             "tránsito y en el portal del SRI para impuestos vehiculares. La consulta es "
             "gratuita y conviene hacerla antes de negociar el precio."),
            ("¿Las multas se heredan al nuevo dueño?",
             "No pueden heredarse, porque el traspaso no se completa mientras existan. Ese "
             "bloqueo es justamente lo que protege al comprador."),
            ("¿Qué pasa si el vendedor se niega a pagar?",
             "El trámite queda detenido. Si eso ocurre antes de entregar dinero, lo "
             "razonable es retirarse o descontar el monto del precio dejándolo por escrito."),
        ]},

        f"Si preferís evitarte esta gestión, en el "
        f"{link(LISTADO, 'listado de vehículos de OKCars')} cada unidad llega con la "
        f"verificación hecha. Escribinos al "
        f"{link(wa('Hola, quiero un auto con multas y papeles ya verificados.'), 'WhatsApp')} "
        f"y te contamos. Atendemos en Ibarra a compradores de Otavalo, Atuntaqui, Cayambe y "
        f"toda Imbabura.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Traspaso entre familiares y por herencia
# ════════════════════════════════════════════════════════════════════════════
familia = {
    "title": "Traspaso de vehículo entre familiares y por herencia en Ecuador",
    "slug": "traspaso-vehiculo-entre-familiares-herencia",
    "date": "2026-10-23T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["traspaso familiar", "herencia vehículo", "donación de vehículo",
             "trámites vehiculares", "ANT"],
    "excerpt": "Pasar el auto a un hijo, a la esposa o recibirlo por herencia no es el "
               "mismo trámite que una compraventa común. Qué cambia, qué documentos piden "
               "y por qué el «préstamo de nombre» sale caro.",
    "yoast_title": "Traspaso de vehículo entre familiares y por herencia",
    "yoast_desc": "Pasar el auto a un familiar o recibirlo por herencia tiene requisitos "
                  "propios. Qué documentos piden, qué cambia frente a una venta común y qué error evitar.",
    "focus_kw": "traspaso vehiculo entre familiares",
    "bloques": [
        "Pasar un vehículo a nombre de un hijo, de la pareja o de un hermano es más común "
        "de lo que parece. También lo es recibir un auto por herencia y no saber por dónde "
        "empezar.",

        "Ninguno de los dos casos se resuelve exactamente igual que una compraventa entre "
        "desconocidos, aunque el trámite final ante la Agencia Nacional de Tránsito termine "
        "siendo el mismo.",

        {"h2": "Traspaso a un familiar en vida"},

        "Cuando el titular está vivo y quiere pasar el vehículo a un familiar, hay dos "
        "caminos: hacerlo como compraventa o hacerlo como donación.",

        "La compraventa es el camino habitual y el más simple. Se firma el contrato con "
        "reconocimiento de firmas, se declara un valor, y el trámite sigue el curso normal. "
        "Que las partes sean padre e hijo no cambia el procedimiento.",

        "La donación es una figura distinta, se otorga por escritura pública y tiene "
        "implicaciones tributarias propias. Para vehículos de valor moderado, la mayoría de "
        "las familias opta por la compraventa por simplicidad y costo.",

        {"tabla": [
            ["", "Compraventa", "Donación"],
            ["Documento", "Contrato con firmas reconocidas", "Escritura pública"],
            ["Costo del instrumento", "Menor", "Mayor"],
            ["Trámite en la ANT", "Igual", "Igual"],
            ["Uso habitual", "La mayoría de los casos", "Patrimonios grandes o planificación"],
        ]},

        f"{AVISO_COSTOS}",

        {"h2": "El error del «préstamo de nombre»"},

        "Hay una práctica muy extendida que conviene desarmar: dejar el vehículo a nombre "
        "de un familiar sin hacer el traspaso, o comprarlo poniéndolo a nombre de otro "
        "porque «es más fácil».",

        "Quien figura en la matrícula es el propietario legal, con todo lo que eso implica. "
        "Es responsable solidario en un accidente, recibe las multas, y si decide vender el "
        "vehículo puede hacerlo sin consultar a nadie. Los acuerdos verbales dentro de la "
        "familia no tienen peso frente al registro.",

        {"quote": "El caso que más nos toca ver es el del auto que quedó a nombre del papá "
                  "y el papá falleció. Lo que era un arreglo cómodo se convierte en un "
                  "juicio de sucesión con todos los hermanos involucrados. Hacer el traspaso "
                  "a tiempo cuesta menos de cien dólares; no hacerlo puede costar años.",
         "cite": CITA},

        {"h2": "Vehículo recibido por herencia"},

        "Cuando el titular fallece, el vehículo forma parte de la masa hereditaria y no "
        "puede transferirse con una simple compraventa. Hay que acreditar la calidad de "
        "heredero y la adjudicación del bien.",

        "El camino general, en trazo grueso, es este:",

        {"ol": [
            "Obtener la partida de defunción del titular.",
            "Realizar la posesión efectiva, que reconoce quiénes son los herederos.",
            "Determinar la adjudicación del vehículo entre los herederos, con acuerdo o "
            "por vía judicial si no lo hay.",
            "Cumplir con las obligaciones tributarias que correspondan a la herencia.",
            "Presentar la documentación en la ANT para el cambio de titularidad.",
        ]},

        "Este procedimiento involucra materia sucesoria y conviene tramitarlo con un "
        "abogado. No es un trámite de ventanilla como el traspaso ordinario, y los tiempos "
        "son considerablemente más largos.",

        "Mientras la sucesión no esté resuelta, el vehículo no se puede vender. Es la razón "
        "por la que en el patio no recibimos unidades cuyo titular haya fallecido si la "
        "sucesión sigue abierta: no hay forma legal de completar la operación.",

        {"h2": "Qué revisar si te van a pasar un auto de la familia"},

        "Aunque sea entre parientes y haya toda la confianza del mundo, hay verificaciones "
        "que conviene hacer igual:",

        {"ul": [
            "Que el vehículo no tenga prenda vigente por un crédito que siga corriendo.",
            "Que no arrastre multas ni impuestos impagos.",
            "Que los datos de la matrícula coincidan con el vehículo físico.",
            "Que la revisión técnica esté vigente donde el cantón la exija.",
        ]},

        f"Son los mismos puntos de cualquier compra, y están detallados en "
        f"{link(PAPELES, 'qué papeles pedir antes de comprar un auto usado')}. La confianza "
        "familiar no evita que una prenda bloquee el trámite.",

        f"Si el auto que vas a recibir tiene bastantes años, también conviene una revisión "
        f"mecánica honesta antes de asumir su mantenimiento: la lista está en el "
        f"{link(CHECKLIST, 'checklist de 20 puntos')}.",

        {"h2": "El caso del auto que se usa en familia"},

        "Hay una situación intermedia muy común en Imbabura: el auto está a nombre del "
        "padre, pero lo usa el hijo todos los días para ir de Otavalo a Ibarra a trabajar. "
        "Nadie ve la necesidad de traspasarlo porque, en la práctica, el vehículo es de la "
        "familia.",

        "El problema aparece en tres momentos concretos, y siempre de golpe:",

        {"ul": [
            "<strong>En un accidente.</strong> El titular registral responde, aunque no "
            "estuviera al volante.",
            "<strong>Al pedir un crédito.</strong> El vehículo cuenta como patrimonio de "
            "quien figura en la matrícula, no de quien lo usa.",
            "<strong>Al querer venderlo.</strong> Se necesita la firma del titular, esté "
            "donde esté y quiera o no.",
        ]},

        "Ninguna de esas tres cosas se puede resolver con un acuerdo familiar posterior. "
        "Hacer el traspaso cuando todo está tranquilo cuesta poco; hacerlo cuando ya hay un "
        "problema puede ser imposible.",

        "La recomendación práctica es tratar el traspaso familiar con la misma formalidad "
        "que uno entre desconocidos. No porque haya desconfianza, sino porque el registro "
        "no entiende de relaciones: entiende de nombres en una matrícula.",

        {"faq": [
            ("¿El traspaso entre familiares es más barato?",
             "El trámite ante la ANT es el mismo y cuesta lo mismo. Lo que puede variar es "
             "el instrumento legal que se use: una compraventa con firmas reconocidas "
             "resulta más económica que una escritura de donación."),
            ("¿Puedo pasar el auto a mi hijo sin venderlo?",
             "Sí, mediante donación por escritura pública, que tiene sus propias "
             "implicaciones tributarias. En la práctica, muchas familias usan la "
             "compraventa por ser un instrumento más simple y barato."),
            ("¿Qué pasa con el auto si el dueño fallece?",
             "Pasa a formar parte de la herencia y no puede transferirse hasta que se "
             "resuelva la sucesión: posesión efectiva, adjudicación entre herederos y "
             "obligaciones tributarias. Conviene hacerlo con un abogado."),
            ("¿Puedo vender un auto que heredé pero aún no está a mi nombre?",
             "No. Primero hay que completar la sucesión y poner el vehículo a nombre del "
             "heredero adjudicatario. Recién entonces puede venderse."),
            ("¿Es riesgoso dejar el auto a nombre de un familiar?",
             "Sí. Quien figura en la matrícula es el propietario legal a todos los efectos: "
             "responde por multas, es responsable en un accidente y puede venderlo. Los "
             "acuerdos verbales no pesan frente al registro."),
        ]},

        f"Si el auto de la familia ya cumplió su ciclo y estás pensando en cambiarlo, "
        f"escribinos al "
        f"{link(wa('Hola, quiero valorar un auto familiar y ver opciones de cambio en OKCars.'), 'WhatsApp de OKCars')}. "
        f"Hacemos la valoración sin costo en nuestro patio de Ibarra. También podés ver el "
        f"{link(LISTADO, 'listado de vehículos disponibles')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Poder notarial
# ════════════════════════════════════════════════════════════════════════════
poder = {
    "title": "Traspaso cuando el vendedor no puede ir: cómo funciona el poder",
    "slug": "traspaso-vehiculo-poder-notarial-ecuador",
    "date": "2026-10-26T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["poder notarial", "traspaso vehículo Ecuador", "vendedor en el exterior",
             "trámites vehiculares", "ANT"],
    "excerpt": "El vendedor vive fuera del país, está enfermo o simplemente no puede ir a "
               "la notaría. El poder resuelve la mayoría de estos casos, pero hay que "
               "otorgarlo bien y saber qué no cubre.",
    "yoast_title": "Traspaso con poder notarial: cómo funciona en Ecuador",
    "yoast_desc": "Si el vendedor no puede firmar en persona, un poder permite completar "
                  "el traspaso. Cómo se otorga desde el exterior, qué debe decir y qué verificar antes.",
    "focus_kw": "traspaso vehiculo poder notarial",
    "bloques": [
        "Una parte considerable de los traspasos que se traban en Ecuador no tiene que ver "
        "con multas ni con prendas, sino con algo mucho más simple: el vendedor no puede "
        "presentarse a firmar.",

        "Vive en el exterior, está fuera de la provincia, tiene un problema de salud o "
        "sencillamente no tiene cómo ir a la notaría en horario hábil. El poder es la "
        "herramienta que resuelve la mayoría de estos casos.",

        {"h2": "Qué es y para qué sirve"},

        "Un poder es un documento en el que una persona autoriza a otra a actuar en su "
        "nombre para actos determinados. Aplicado a un vehículo, permite que un apoderado "
        "firme la compraventa y realice el trámite en representación del titular.",

        "El poder no transfiere la propiedad. El titular sigue siendo el mismo hasta que el "
        "traspaso se complete; lo que hace el poder es habilitar a alguien a ejecutar los "
        "actos necesarios para que eso ocurra.",

        {"h2": "Cuando el vendedor está en el exterior"},

        "Es el escenario más frecuente y tiene una solución establecida: el poder se otorga "
        "en el consulado ecuatoriano del país donde reside el titular.",

        {"ol": [
            "El titular acude al consulado ecuatoriano con su cédula o pasaporte.",
            "Otorga el poder especificando con precisión qué autoriza y sobre qué vehículo.",
            "El consulado emite el documento con validez en Ecuador.",
            "El poder se envía al apoderado en el país.",
            "El apoderado lo protocoliza donde corresponda y actúa con él.",
        ]},

        "También puede otorgarse ante notario del país de residencia, en cuyo caso el "
        "documento necesita apostilla o legalización y, si está en otro idioma, traducción "
        "oficial. La vía consular suele ser más directa.",

        {"quote": "El caso típico es el hijo que se fue a España y dejó el auto acá. Se "
                  "puede resolver perfectamente, pero hay que hacerlo bien desde el "
                  "principio: un poder mal redactado, que no identifica la placa o no dice "
                  "expresamente que autoriza a vender, no sirve y toca volver a empezar "
                  "desde el consulado.",
         "cite": CITA},

        {"h2": "Qué debe decir el poder"},

        "Acá está el punto donde más trámites se caen. Un poder genérico o ambiguo suele "
        "ser rechazado. El documento tiene que dejar sin dudas:",

        {"ul": [
            "<strong>Identificación completa del vehículo:</strong> placa, marca, modelo, "
            "año, número de chasis y de motor.",
            "<strong>Identificación del apoderado</strong> con nombres completos y número "
            "de cédula.",
            "<strong>Facultad expresa de vender y de suscribir la compraventa</strong>, "
            "no una autorización vaga para «realizar gestiones».",
            "<strong>Facultad de realizar el trámite ante la ANT</strong> y de firmar los "
            "documentos que requiera.",
            "<strong>Vigencia</strong>, si se quiere limitar en el tiempo.",
        ]},

        "Cuanto más específico, menos posibilidades de que una ventanilla lo objete. Un "
        "poder que diga solo «para que me represente en asuntos vehiculares» es una "
        "invitación a que lo rechacen.",

        {"h2": "Lo que el comprador tiene que verificar"},

        "Si vas a comprar un vehículo cuyo vendedor actúa por poder, hay verificaciones "
        "adicionales que no son opcionales:",

        {"ol": [
            "Que el poder sea original o copia certificada, no una fotocopia simple.",
            "Que esté vigente y no revocado.",
            "Que identifique exactamente el vehículo que estás comprando.",
            "Que el apoderado sea efectivamente la persona con la que estás tratando, "
            "cédula en mano.",
            "Que el titular que otorga el poder sea quien figura en la matrícula.",
        ]},

        "Esa última verificación es la que más se pasa por alto. Un poder otorgado por "
        "alguien que no es el titular registral no habilita nada, por más notariado que "
        "esté.",

        "Nuestra recomendación en contra es directa: si el vendedor te apura para cerrar "
        "sin dejarte revisar el poder con calma, o si el documento tiene enmiendas, "
        "retirate. Una operación por poder legítima resiste cualquier verificación sin "
        "problema, y el vendedor honesto no se molesta porque la hagas.",

        f"El resto de la documentación es la de siempre y está detallada en "
        f"{link(PAPELES, 'qué papeles pedir antes de comprar un auto usado')}. El "
        f"procedimiento general del trámite está en la guía de "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador')}.",

        {"h2": "Por qué en el patio esto no aparece"},

        "En OKCars la titularidad se verifica antes de recibir cualquier unidad. Si un "
        "vehículo llega con una operación por poder, revisamos el documento con las mismas "
        "exigencias descritas arriba antes de aceptarlo, y si algo no cierra, la unidad no "
        "entra.",

        "Para el comprador eso significa que nunca va a encontrarse revisando un poder en "
        "la ventanilla de una notaría un viernes a las cinco de la tarde. Es una gestión "
        "menos, y de las que más tiempo consumen.",

        {"h2": "Cuánto demora conseguir un poder"},

        "Es la pregunta práctica que sigue a toda esta explicación, y la respuesta depende "
        "casi por completo del país donde esté el vendedor.",

        "En el consulado, el trámite en sí es de un día: se agenda turno, se acude con el "
        "documento de identidad y se otorga. Lo que suele demorar es conseguir el turno, "
        "que en consulados con mucha demanda puede tomar semanas, y el envío físico del "
        "documento a Ecuador.",

        "Por eso, cuando una operación depende de un poder, conviene arrancar ese trámite "
        "en paralelo a la negociación y no al final. Muchas ventas se caen porque el "
        "comprador no quiso esperar tres semanas por un papel que pudo haberse gestionado "
        "desde el primer día.",

        "Si el vendedor está dentro del país pero no puede desplazarse hasta Ibarra —vive "
        "en Tulcán, en Quito o tiene un impedimento de salud—, el poder se otorga ante "
        "cualquier notaría del Ecuador y el trámite es de horas, no de semanas.",

        {"faq": [
            ("¿Se puede vender un auto estando en el exterior?",
             "Sí, otorgando un poder en el consulado ecuatoriano del país donde se reside, "
             "o ante notario local con apostilla. El apoderado firma la compraventa y "
             "realiza el trámite en Ecuador."),
            ("¿Qué debe decir el poder para vender un vehículo?",
             "Debe identificar el vehículo con placa, chasis y motor, identificar al "
             "apoderado con cédula, y otorgar facultad expresa de vender, suscribir la "
             "compraventa y tramitar ante la ANT. Un poder genérico suele ser rechazado."),
            ("¿El poder transfiere la propiedad del vehículo?",
             "No. El titular sigue siendo el mismo hasta que el traspaso se complete. El "
             "poder solo habilita al apoderado a ejecutar los actos necesarios."),
            ("¿Puedo comprar un auto que vende un apoderado?",
             "Sí, verificando que el poder sea original o copia certificada, esté vigente, "
             "identifique el vehículo exacto y provenga de quien figura en la matrícula."),
            ("¿Un poder tiene fecha de vencimiento?",
             "Puede otorgarse con vigencia limitada o sin plazo, y en cualquier caso puede "
             "ser revocado por quien lo otorgó. Por eso conviene confirmar que siga vigente "
             "al momento de la operación."),
        ]},

        f"Si querés comprar sin gestionar nada de esto, mirá el "
        f"{link(LISTADO, 'listado de vehículos de OKCars')} o escribinos al "
        f"{link(wa('Hola, quiero comprar un auto con toda la documentación ya verificada.'), 'WhatsApp')}. "
        f"Estamos en Ibarra y atendemos a compradores de Otavalo, Cotacachi, Atuntaqui, "
        f"Cayambe y Tulcán.",
    ],
}


if __name__ == "__main__":
    for spec in (propietario, moto, multas, familia, poder):
        guarda(spec)
        print("  spec escrito:", spec["slug"])
