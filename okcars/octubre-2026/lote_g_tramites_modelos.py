#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote G — trámites adyacentes y modelos con demanda medida (6 posts).

El Deepal S05 acumula 523 impresiones en Search Console (posiciones 5,7 a 11,4)
y ningún artículo propio. Es la mayor oportunidad de modelo del sitio.
Chevrolet Sail suma 69 impresiones repartidas entre años.
"""
from comun import (AVISO_COSTOS, CAT, CHECKLIST, CHINOS, DEVALUA, HIBRIDOS,
                   KILOMETRAJE, LISTADO, MANTENIMIENTO, PAPELES, PRIMER, REVISION,
                   SEGURO, TRASPASO, FICHA, guarda, link, wa)

CITA = "Equipo comercial de OKCars"


# ════════════════════════════════════════════════════════════════════════════
# 1 · Matrícula
# ════════════════════════════════════════════════════════════════════════════
matricula = {
    "title": "Matricular un auto en Ecuador: qué se paga y de qué depende",
    "slug": "matricular-un-auto-ecuador-costos",
    "date": "2026-10-28T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["matrícula vehicular", "impuestos vehiculares", "SRI", "ANT",
             "trámites vehiculares"],
    "excerpt": "La matrícula no es un valor único: son varios rubros que dependen del "
               "avalúo, del año y del cantón. Cuáles son, cuál pesa más y por qué dos "
               "autos parecidos pagan distinto.",
    "yoast_title": "Matricular un auto en Ecuador: qué se paga cada año",
    "yoast_desc": "La matrícula suma impuesto al rodaje, SPPAT, impuesto ambiental y tasas. "
                  "De qué depende cada rubro y por qué dos autos parecidos pagan distinto.",
    "focus_kw": "matricular un auto ecuador",
    "bloques": [
        "«¿Cuánto cuesta matricular un auto?» es una de las preguntas más buscadas del país "
        "y una de las peor respondidas, porque casi todas las respuestas dan una cifra "
        "única cuando en realidad no existe tal cosa.",

        "La matrícula es la suma de varios rubros distintos, y cada uno se calcula sobre "
        "una base diferente. Dos autos del mismo año y la misma marca pueden pagar valores "
        "muy distintos si tienen cilindrada o avalúo diferentes.",

        {"h2": "De qué se compone"},

        "Estos son los conceptos que aparecen en la mayoría de las matrículas de un "
        "vehículo liviano particular:",

        {"ul": [
            "<strong>Impuesto al rodaje municipal.</strong> Lo cobra el municipio donde el "
            "vehículo está registrado y se calcula sobre el avalúo.",
            "<strong>Impuesto a la propiedad de vehículos motorizados.</strong> Es "
            "nacional, lo administra el SRI y también depende del avalúo.",
            "<strong>Impuesto ambiental.</strong> Se calcula según cilindrada y antigüedad "
            "del vehículo. Es el que más castiga a los motores grandes y viejos.",
            "<strong>SPPAT.</strong> El servicio público para accidentes de tránsito, de "
            "valor fijo por tipo de vehículo.",
            "<strong>Tasas administrativas</strong> de la ANT o del organismo de tránsito "
            "del cantón.",
            "<strong>Multas pendientes</strong>, si las hay. Sin cancelarlas no se emite la "
            "matrícula.",
        ]},

        f"{AVISO_COSTOS}",

        {"h2": "Por qué el avalúo manda"},

        "Tres de los rubros se calculan sobre el avalúo que el SRI le asigna al vehículo, "
        "y ese avalúo baja cada año conforme el auto envejece. Esa es la razón por la que "
        "matricular un auto nuevo cuesta bastante más que matricular el mismo modelo con "
        "ocho años encima.",

        "Para quien compra usado, esto es una ventaja concreta que rara vez se contabiliza. "
        "Un vehículo de cinco o seis años no solo cuesta menos: también paga menos "
        "matrícula todos los años, y esa diferencia se acumula.",

        {"quote": "Cuando alguien compara un auto nuevo con un seminuevo, siempre le "
                  "pedimos que sume la matrícula de los próximos tres años. La diferencia "
                  "sorprende. No es el argumento principal para comprar usado, pero es "
                  "plata real que nadie pone en la hoja de cálculo.",
         "cite": CITA},

        {"h2": "El impuesto ambiental y los motores grandes"},

        "Merece un párrafo aparte porque es el rubro que más descoloca a los compradores "
        "primerizos.",

        "El impuesto ambiental se calcula combinando cilindrada y antigüedad: mientras más "
        "grande el motor y más viejo el vehículo, mayor el valor. Un motor de dos litros "
        "paga notoriamente menos que uno de tres y medio, y esa diferencia se repite cada "
        "año durante toda la tenencia.",

        "Por eso, al comparar dos camionetas o dos SUV usadas de precio parecido, conviene "
        "mirar la cilindrada. Un motor más grande puede ser más agradable de manejar y a la "
        "vez más caro de sostener, entre combustible y matrícula.",

        {"h2": "Qué revisar antes de comprar"},

        "Como el impuesto va con la placa y no con la persona, cualquier valor impago se "
        "convierte en un problema del comprador el día que quiera matricular o traspasar.",

        {"ol": [
            "Consultar impuestos vehiculares pendientes en el portal del SRI, con la placa.",
            "Consultar multas de tránsito en el sistema de la ANT.",
            "Verificar valores municipales en el cantón de matriculación.",
            "Confirmar que la revisión técnica esté vigente donde se exija.",
            "Pedir la última matrícula pagada, para ver el monto real del vehículo.",
        ]},

        "Ese último punto es el más útil y casi nadie lo pide: la matrícula anterior te "
        "dice exactamente cuánto vas a pagar el año siguiente, sin estimaciones. Si el "
        "vendedor no la tiene, es una señal de desorden que suele venir acompañada de "
        "otras.",

        f"El resto de la verificación documental está en "
        f"{link(PAPELES, 'qué papeles pedir antes de comprar un auto usado')}, y el trámite "
        f"posterior en la guía de {link(TRASPASO, 'traspaso de vehículo')}.",

        {"h2": "Matrícula y cantón"},

        "El vehículo se matricula en el cantón donde está registrado, y los valores "
        "municipales varían entre uno y otro. Un auto matriculado en Ibarra y uno "
        "matriculado en Quito pueden pagar distinto por el componente municipal, aunque el "
        "resto de los rubros nacionales sea idéntico.",

        "Al comprar un vehículo de otra provincia, conviene preguntar si conviene cambiar "
        "el cantón de matriculación y qué implica hacerlo. En Imbabura el trámite se "
        "resuelve en las agencias locales sin necesidad de viajar a Quito.",

        {"faq": [
            ("¿Cuánto cuesta matricular un auto en Ecuador?",
             "No hay una cifra única. La matrícula suma impuesto al rodaje municipal, "
             "impuesto a la propiedad, impuesto ambiental, SPPAT y tasas administrativas. "
             "Los tres primeros dependen del avalúo y de la cilindrada, así que varían "
             "mucho entre vehículos."),
            ("¿Por qué un auto viejo paga menos matrícula?",
             "Porque el avalúo asignado baja con los años y tres de los rubros se calculan "
             "sobre él. El impuesto ambiental, en cambio, sube con la antigüedad, así que "
             "en motores grandes y muy viejos ese componente puede compensar parte del "
             "ahorro."),
            ("¿Qué pasa si compro un auto con la matrícula vencida?",
             "Hay que ponerla al día antes de poder circular con normalidad y antes de "
             "completar el traspaso. Los valores pendientes le corresponden al vendedor por "
             "convención, y conviene resolverlo antes de pagar."),
            ("¿Puedo matricular en un cantón distinto al del vendedor?",
             "Sí, existe el cambio de cantón de matriculación. Conviene consultarlo en la "
             "agencia local, porque el componente municipal del impuesto varía entre "
             "cantones."),
        ]},

        f"En OKCars cada vehículo se entrega con impuestos y multas verificados. Mirá el "
        f"{link(LISTADO, 'listado de vehículos')} o escribinos al "
        f"{link(wa('Hola, quiero saber cuánto paga de matrícula un auto que vi en OKCars.'), 'WhatsApp')}. "
        f"Estamos en Ibarra y atendemos a compradores de Otavalo, Atuntaqui y Cayambe.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Consultar multas
# ════════════════════════════════════════════════════════════════════════════
consultar = {
    "title": "Cómo consultar las multas de un vehículo antes de comprarlo",
    "slug": "consultar-multas-vehiculo-antes-de-comprar",
    "date": "2026-10-30T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["consultar multas", "multas ANT", "SRI vehículos",
             "trámites vehiculares", "comprar auto usado"],
    "excerpt": "Toma dos minutos, es gratis y cambia por completo tu posición en la "
               "negociación. Dónde se consulta cada tipo de deuda y qué hacer con lo que "
               "encuentres.",
    "yoast_title": "Consultar multas de un vehículo antes de comprarlo",
    "yoast_desc": "Multas de tránsito, impuestos del SRI, valores municipales y gravámenes: "
                  "dónde se consulta cada uno con la placa y qué hacer si aparece algo.",
    "focus_kw": "consultar multas vehiculo",
    "bloques": [
        "Antes de ver un auto, antes de probarlo y mucho antes de hablar de precio, hay una "
        "consulta que conviene hacer y que casi nadie hace: averiguar qué deudas arrastra "
        "el vehículo.",

        "Es gratuita, se hace con la placa y toma menos de lo que demora llegar al patio. "
        "Y sin embargo, la mayoría de los compradores se entera de las multas cuando ya "
        "entregó una señal.",

        {"h2": "Cuatro consultas, cuatro fuentes distintas"},

        "Un vehículo puede arrastrar cuatro tipos de obligación, y cada una se consulta en "
        "un lugar diferente. Verificar solo una y quedarse tranquilo es el error más común.",

        {"tabla": [
            ["Qué se consulta", "Dónde", "Con qué dato"],
            ["Multas de tránsito", "Agencia Nacional de Tránsito", "Placa o cédula"],
            ["Impuestos vehiculares", "Servicio de Rentas Internas", "Placa"],
            ["Valores municipales", "Municipio del cantón de matriculación", "Placa"],
            ["Prendas y gravámenes", "Certificado de gravámenes", "Placa y datos del titular"],
        ]},

        "Las tres primeras son consultas en línea y gratuitas. El certificado de gravámenes "
        "tiene un costo pequeño y se obtiene en las oficinas correspondientes, pero es el "
        "único que confirma si el vehículo está libre de prenda.",

        {"h2": "Por qué la prenda es la que más duele"},

        "Las multas y los impuestos son un problema de dinero: se pagan y desaparecen. La "
        "prenda es un problema de propiedad.",

        "Si el vehículo respalda un crédito que sigue vigente, la entidad financiera tiene "
        "un derecho sobre él. El traspaso no se puede completar hasta que la prenda se "
        "levante, y eso depende de que la deuda se cancele. Quien compra sin verificarlo "
        "puede terminar con un auto que no puede poner a su nombre.",

        {"quote": "La consulta de multas la hacen algunos; el certificado de gravámenes, "
                  "casi nadie. Y es el que puede dejarte sin el auto y sin la plata. "
                  "Nosotros no recibimos una unidad en el patio sin ese certificado en la "
                  "carpeta, y al cliente se lo mostramos si lo pide.",
         "cite": CITA},

        {"h2": "Qué hacer con lo que encuentres"},

        "Encontrar deudas no significa que la compra sea mala. Significa que ahora tenés "
        "información para negociar. Estas son las tres respuestas razonables:",

        {"ol": [
            "<strong>Deuda pequeña y reciente:</strong> pedí que el vendedor la cancele "
            "antes de firmar. Es lo habitual y ningún vendedor serio se opone.",
            "<strong>Deuda considerable:</strong> negociá que se descuente del precio y "
            "dejalo por escrito en la compraventa, con el monto exacto.",
            "<strong>Prenda vigente:</strong> no entregues dinero hasta que la prenda esté "
            "levantada y tengas el certificado que lo acredite.",
        ]},

        "La cuarta respuesta, que también es válida, es retirarse. Un vehículo con muchas "
        "multas acumuladas durante años dice más sobre su dueño que sobre el auto, y esa "
        "información vale.",

        {"h2": "Lo que la consulta no te dice"},

        "Conviene ser claro sobre los límites de esta verificación, porque genera una falsa "
        "sensación de seguridad.",

        "La consulta de multas confirma que el vehículo está en regla frente a la "
        "autoridad. No te dice nada sobre su estado mecánico, ni sobre si tuvo un choque "
        "grave, ni sobre si el kilometraje fue alterado. Son verificaciones distintas y "
        "todas necesarias.",

        f"Para la parte mecánica está el {link(CHECKLIST, 'checklist de 20 puntos')} y la "
        f"{link(REVISION, 'revisión mecánica antes de comprar')}. Para el kilometraje, la "
        f"guía de {link(KILOMETRAJE, 'cuánto kilometraje es mucho')}.",

        {"h2": "Cuándo hacer la consulta"},

        "El momento correcto es antes de acordar el precio, no después. Suena obvio y aun "
        "así casi todo el mundo lo hace al revés: negocia, se entusiasma, da una señal, y "
        "recién entonces empieza a revisar.",

        "Pedir la placa por adelantado es una petición normal y ningún vendedor honesto la "
        "rechaza. Si alguien se resiste a darte la placa antes de que vayas a ver el auto, "
        "esa negativa ya es toda la información que necesitás.",

        {"faq": [
            ("¿Cómo consulto las multas de un vehículo?",
             "Con la placa, en el sistema de consultas de la Agencia Nacional de Tránsito "
             "para multas de tránsito, y en el portal del SRI para impuestos vehiculares. "
             "Ambas consultas son gratuitas y en línea."),
            ("¿Puedo consultar multas sin ser el dueño?",
             "Sí. La consulta por placa es pública y no requiere ser el titular. Por eso "
             "conviene hacerla antes de comprometerte con la compra."),
            ("¿Las multas del vendedor pasan al comprador?",
             "No pueden pasar, porque el traspaso queda bloqueado mientras existan. Ese "
             "bloqueo es lo que protege al comprador, siempre que no haya entregado dinero "
             "antes de verificar."),
            ("¿Qué es el certificado de gravámenes y por qué importa?",
             "Es el documento que confirma si el vehículo tiene una prenda vigente, es "
             "decir, si respalda un crédito. Sin levantar la prenda no se puede completar "
             "el traspaso, y es la verificación que más gente omite."),
        ]},

        f"En OKCars la carpeta de cada vehículo se arma antes de publicarlo. Mirá el "
        f"{link(LISTADO, 'listado disponible')} o escribinos al "
        f"{link(wa('Hola, quiero ver un auto de OKCars y revisar su documentación.'), 'WhatsApp')}. "
        f"Estamos en Ibarra, cerca de Otavalo, Atuntaqui y Cotacachi.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Revisión técnica vehicular
# ════════════════════════════════════════════════════════════════════════════
rtv = {
    "title": "Revisión técnica vehicular: cuándo toca y qué revisan",
    "slug": "revision-tecnica-vehicular-ecuador",
    "date": "2026-11-02T09:00:00",
    "cat": CAT["tramites"],
    "tags": ["revisión técnica vehicular", "RTV", "matrícula vehicular",
             "trámites vehiculares", "ANT"],
    "excerpt": "Qué mira la RTV, por qué un auto reprueba y qué revisar en un usado antes "
               "de comprarlo para no heredar una revisión que no va a pasar.",
    "yoast_title": "Revisión técnica vehicular en Ecuador: qué revisan",
    "yoast_desc": "Frenos, luces, emisiones, suspensión y dirección: qué mira la revisión "
                  "técnica, por qué reprueban los autos y qué verificar antes de comprar.",
    "focus_kw": "revision tecnica vehicular ecuador",
    "bloques": [
        "La revisión técnica vehicular es el control periódico que verifica que un vehículo "
        "esté en condiciones de circular con seguridad y dentro de los límites de emisiones.",

        "No se aplica igual en todo el país: cada cantón define su esquema, y en varios es "
        "requisito para completar la matrícula. Donde se exige, un vehículo que no la tiene "
        "vigente tampoco puede traspasarse.",

        {"h2": "Qué revisan"},

        "Los puntos varían entre centros, pero el núcleo de la inspección es consistente:",

        {"ul": [
            "<strong>Frenos.</strong> Eficacia y equilibrio entre ruedas del mismo eje, "
            "medidos en banco.",
            "<strong>Luces.</strong> Funcionamiento, alineación e intensidad de faros, "
            "direccionales y luces de freno.",
            "<strong>Emisiones.</strong> Gases de escape dentro de los límites permitidos "
            "según el tipo de motor.",
            "<strong>Suspensión y amortiguación.</strong> Estado y comportamiento en banco.",
            "<strong>Dirección.</strong> Holguras, alineación y estado de rótulas y "
            "terminales.",
            "<strong>Llantas.</strong> Profundidad de labrado, estado general y ausencia de "
            "daños estructurales.",
            "<strong>Carrocería y chasis.</strong> Coincidencia de números con la matrícula "
            "y ausencia de alteraciones.",
        ]},

        {"h2": "Por qué reprueban los autos"},

        "Las causas más frecuentes son también las más baratas de resolver, y esa es la "
        "buena noticia: la mayoría de los rechazos se evita con una preparación mínima.",

        {"ol": [
            "Luces quemadas o mal alineadas.",
            "Llantas con labrado por debajo del mínimo.",
            "Frenos desequilibrados entre ruedas del mismo eje.",
            "Emisiones fuera de rango por falta de mantenimiento del motor.",
            "Holguras en la dirección por rótulas o terminales gastados.",
            "Parabrisas con fisuras en el campo visual del conductor.",
        ]},

        "Revisar luces y llantas antes de ir al centro es gratis y resuelve una parte "
        "importante de los rechazos. Los frenos y las emisiones requieren taller.",

        {"quote": "Cuando recibimos un vehículo en el patio, lo pasamos por los mismos "
                  "puntos que mira la revisión antes de publicarlo. No para cumplir un "
                  "requisito: porque un auto que no pasaría la RTV tampoco debería estar a "
                  "la venta. Si algo no está, se arregla antes de que el cliente lo vea.",
         "cite": CITA},

        {"h2": "Qué significa esto al comprar un usado"},

        "Acá está la parte práctica para quien está evaluando una compra.",

        "Un vehículo con la revisión vigente te dice que hace poco pasó un control objetivo "
        "de frenos, luces, emisiones, suspensión y dirección. Es información real y "
        "verificable, distinta de la palabra del vendedor.",

        "Un vehículo con la revisión vencida no significa necesariamente que esté mal, pero "
        "sí que nadie verificó nada recientemente. Y si el cantón la exige, vas a tener que "
        "aprobarla para poder matricular y traspasar, así que cualquier problema pasa a ser "
        "tuyo.",

        "Nuestra recomendación es directa: si el auto que estás mirando tiene la revisión "
        "vencida, pedí que el vendedor la apruebe antes de cerrar. Si se niega, asumí que "
        "hay algo que no va a pasar el control y actuá en consecuencia.",

        {"h2": "La revisión no reemplaza una inspección de compra"},

        "Conviene no confundir dos cosas que miden objetivos distintos.",

        "La revisión técnica verifica seguridad y emisiones en el momento del control. No "
        "evalúa el estado del motor a mediano plazo, ni la caja, ni si el vehículo tuvo un "
        "choque estructural reparado, ni si el kilometraje es real.",

        f"Para eso está la inspección de compra, que es otra cosa y conviene hacer igual. "
        f"Los puntos están en el {link(CHECKLIST, 'checklist de 20 puntos')} y el "
        f"procedimiento en {link(REVISION, 'la revisión mecánica antes de comprar')}. "
        f"Un auto puede aprobar la RTV y aun así ser una mala compra.",

        f"Sobre los costos de tenencia asociados, la matrícula anual y sus rubros están "
        f"explicados en nuestro artículo sobre {link(MANTENIMIENTO, 'qué autos usados piden menos mantenimiento')}.",

        {"faq": [
            ("¿Cada cuánto se hace la revisión técnica vehicular?",
             "Depende del cantón y del tipo de vehículo. En varios cantones es anual para "
             "vehículos particulares y más frecuente para transporte público y comercial. "
             "Conviene consultarlo en el organismo de tránsito local."),
            ("¿Qué pasa si mi auto reprueba la revisión?",
             "Se otorga un plazo para corregir las observaciones y volver a presentarlo. "
             "Las causas más comunes —luces, llantas, emisiones— se resuelven con "
             "mantenimiento básico."),
            ("¿Se puede traspasar un auto con la revisión vencida?",
             "En los cantones donde la revisión es requisito para la matrícula, no: el "
             "trámite queda en pausa hasta que esté vigente."),
            ("¿La revisión técnica garantiza que el auto está bien?",
             "No. Verifica seguridad y emisiones en el momento del control, pero no evalúa "
             "el estado del motor a futuro, la caja, ni si hubo un choque estructural. Una "
             "inspección de compra sigue siendo necesaria."),
        ]},

        f"En OKCars cada unidad pasa revisión antes de publicarse. Mirá el "
        f"{link(LISTADO, 'listado de vehículos')} o escribinos al "
        f"{link(wa('Hola, quiero saber si un auto de OKCars tiene la revisión técnica vigente.'), 'WhatsApp')}. "
        f"Estamos en Ibarra, Imbabura.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Deepal S05  ← 523 impresiones en Search Console
# ════════════════════════════════════════════════════════════════════════════
deepal = {
    "title": "Deepal S05 en Ecuador: qué es, cuánto cuesta y con qué compite",
    "slug": "deepal-s05-ecuador-precio",
    "date": "2026-11-04T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["Deepal S05", "Changan", "SUV eléctrica", "autos eléctricos Ecuador",
             "autos chinos"],
    "excerpt": "Es uno de los modelos más buscados del momento en Ecuador y genera la "
               "misma duda en todos: qué marca es, cuánto vale y si conviene frente a las "
               "alternativas que ya se consiguen usadas.",
    "yoast_title": "Deepal S05 en Ecuador: precio y con qué compite",
    "yoast_desc": "Qué es el Deepal S05, de qué marca viene, qué autonomía ofrece y con "
                  "qué alternativas compite en Ecuador si preferís comprar seminuevo.",
    "focus_kw": "deepal s05 precio ecuador",
    "bloques": [
        "El Deepal S05 se convirtió en uno de los modelos más consultados del mercado "
        "ecuatoriano. La mayoría de las búsquedas apuntan a lo mismo: qué es exactamente, "
        "de qué marca viene y cuánto cuesta.",

        "Vamos por partes, y al final planteamos la comparación que casi nadie hace: si "
        "conviene ese modelo nuevo o una alternativa seminueva del mismo segmento.",

        {"h2": "Qué es y de qué marca viene"},

        "Deepal es la marca de vehículos electrificados de Changan, uno de los fabricantes "
        "más grandes de China y una marca ya conocida en Ecuador por sus camionetas y "
        "vehículos livianos.",

        "El S05 es una SUV compacta electrificada. Changan la comercializa en distintos "
        "mercados con configuraciones de propulsión que varían: versiones totalmente "
        "eléctricas y versiones de autonomía extendida, donde un motor de combustión actúa "
        "como generador para recargar la batería sin mover las ruedas directamente.",

        "Esa distinción importa mucho más de lo que parece al momento de comprar, porque "
        "define si vas a depender de un punto de carga o no. Conviene confirmar con el "
        "distribuidor qué configuración exacta se ofrece en el país antes de decidir.",

        {"quote": "El Deepal es la consulta que más nos llega y la que menos podemos "
                  "resolver, porque es un vehículo nuevo y nosotros vendemos seminuevos. "
                  "Lo que sí hacemos es explicarle al cliente qué está comparando: muchos "
                  "descubren que lo que buscan es una SUV electrificada, y ahí sí tenemos "
                  "opciones.",
         "cite": CITA},

        {"h2": "Sobre el precio"},

        "El precio de un vehículo nuevo lo fija el distribuidor oficial y cambia con las "
        "versiones, las promociones y las condiciones de importación. Cualquier cifra que "
        "leas en un artículo puede estar desactualizada la semana siguiente, así que la "
        "referencia válida es siempre el concesionario de la marca.",

        "Lo que sí podemos aportar es la otra mitad de la cuenta, la que rara vez aparece "
        "en la conversación: qué pasa con ese dinero a los tres años.",

        "Un vehículo nuevo pierde su mayor porcentaje de valor en los primeros años, y en "
        "modelos de marcas de entrada reciente al mercado esa curva suele ser más "
        f"pronunciada, porque todavía no hay un mercado secundario consolidado. Lo "
        f"desarrollamos en el artículo sobre {link(DEVALUA, 'cuánto se devalúa un auto en Ecuador')}.",

        {"h2": "Qué preguntarle al concesionario"},

        "Si vas a comprar un S05 nuevo, estas son las preguntas que conviene hacer y que la "
        "mayoría de compradores olvida:",

        {"ol": [
            "¿Qué configuración de propulsión tiene esta versión exactamente?",
            "¿Cuál es la autonomía homologada y en qué ciclo de medición se midió?",
            "¿Qué cubre la garantía de la batería y por cuántos años o kilómetros?",
            "¿Qué talleres autorizados hay fuera de Quito y Guayaquil?",
            "¿Cuánto cuestan los repuestos de mayor rotación y cuál es el plazo de entrega?",
            "¿Qué tipo de cargador incluye y qué instalación requiere en casa?",
        ]},

        "La cuarta pregunta es la que más pesa si vivís en Imbabura o en el Carchi. Una "
        "marca con red concentrada en las dos ciudades grandes implica viajar para "
        "mantenimientos que en otras marcas resolvés en Ibarra.",

        {"h2": "Las alternativas seminuevas del mismo segmento"},

        f"Si lo que buscás es una SUV electrificada y estás abierto a un seminuevo, en "
        f"nuestro patio de Ibarra hay tres opciones que cubren rangos distintos:",

        {"tabla": [
            ["Vehículo", "Año", "Kilómetros", "Precio", "Propulsión"],
            [FICHA['tang'][1], FICHA['tang'][2], FICHA['tang'][3], FICHA['tang'][4], "Eléctrica"],
            [FICHA['crosstrek'][1], FICHA['crosstrek'][2], FICHA['crosstrek'][3],
             FICHA['crosstrek'][4], "Híbrida, 4x4"],
            [FICHA['prius'][1], FICHA['prius'][2], FICHA['prius'][3], FICHA['prius'][4], "Híbrida"],
        ]},

        f"La {link(FICHA['tang'][0], 'BYD Tang')} es totalmente eléctrica y de otra "
        f"categoría de tamaño. La {link(FICHA['crosstrek'][0], 'Subaru Crosstrek')} suma "
        f"tracción a las cuatro ruedas. El {link(FICHA['prius'][0], 'Toyota Prius C')} es "
        "la entrada más económica al mundo híbrido, con la salvedad de su kilometraje alto.",

        f"Ninguna es un Deepal, y no pretendemos que lo sean. Si tu decisión ya está tomada "
        f"por ese modelo, el camino es el concesionario oficial. Si lo que te atrae es la "
        f"categoría, vale la pena comparar. Para entender el segmento completo escribimos "
        f"la {link(HIBRIDOS, 'guía de híbridos usados')} y la de "
        f"{link(CHINOS, 'autos chinos usados en Ecuador')}.",

        {"faq": [
            ("¿De qué marca es el Deepal S05?",
             "Deepal es la marca de vehículos electrificados de Changan, fabricante chino "
             "con presencia establecida en Ecuador. El S05 es su SUV compacta."),
            ("¿El Deepal S05 es totalmente eléctrico?",
             "Depende de la versión. Changan ofrece configuraciones totalmente eléctricas y "
             "de autonomía extendida, donde un motor de combustión funciona como generador. "
             "Conviene confirmar con el distribuidor cuál se comercializa en el país."),
            ("¿Cuánto cuesta el Deepal S05 en Ecuador?",
             "El precio lo fija el distribuidor oficial y varía con la versión y las "
             "condiciones de importación. Para un valor vigente hay que consultar "
             "directamente al concesionario de la marca."),
            ("¿Se consiguen Deepal usados en Ecuador?",
             "Es un modelo de introducción reciente, así que el mercado de seminuevos "
             "todavía es muy pequeño. Quien busca una SUV electrificada usada hoy encuentra "
             "más opciones en otras marcas."),
            ("¿Conviene comprar un eléctrico nuevo o un híbrido usado?",
             "Depende de cuánto recorrés y de si podés cargar en casa. Un eléctrico rinde "
             "cuando se usa mucho y se carga en domicilio; un híbrido usado no exige "
             "infraestructura y tiene menor costo de entrada."),
        ]},

        f"¿Querés comparar opciones electrificadas seminuevas? Escribinos al "
        f"{link(wa('Hola, estaba viendo el Deepal S05 y quiero comparar opciones híbridas o eléctricas seminuevas.'), 'WhatsApp de OKCars')} "
        f"o mirá el {link(LISTADO, 'listado de vehículos')}. Estamos en Ibarra y atendemos a "
        f"compradores de Otavalo, Atuntaqui, Cotacachi y Tulcán.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Chevrolet Sail por año
# ════════════════════════════════════════════════════════════════════════════
sail = {
    "title": "Chevrolet Sail usado por año: qué cambia entre 2018 y 2026",
    "slug": "chevrolet-sail-usado-por-ano-precios",
    "date": "2026-11-06T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["Chevrolet Sail", "sedán usado", "autos económicos Ecuador",
             "Chevrolet Ecuador", "primer auto"],
    "excerpt": "El Sail es de los usados más buscados del país. Qué diferencia hay entre "
               "un 2018 y uno reciente, qué revisar en cada rango y por qué el año importa "
               "menos que el mantenimiento.",
    "yoast_title": "Chevrolet Sail usado: qué cambia entre 2018 y 2026",
    "yoast_desc": "Diferencias entre las generaciones del Sail, qué revisar según el año y "
                  "por qué el historial de mantenimiento pesa más que la fecha de fábrica.",
    "focus_kw": "chevrolet sail usado precio",
    "bloques": [
        "El Chevrolet Sail es uno de los autos más buscados del mercado ecuatoriano de "
        "usados, y con razón: es barato de comprar, barato de mantener y hay repuestos en "
        "cualquier ciudad del país.",

        "Las búsquedas se reparten entre distintos años —2018, 2020, modelos recientes— y "
        "eso genera la pregunta lógica: cuánto cambia realmente de uno a otro.",

        {"h2": "Lo que se mantiene en todos los años"},

        "Antes de las diferencias, conviene entender qué hace del Sail lo que es, porque "
        "eso no cambió a lo largo de su vida comercial:",

        {"ul": [
            "<strong>Mecánica sencilla.</strong> Motor atmosférico de cuatro cilindros, sin "
            "turbo ni sistemas complejos que encarezcan una reparación.",
            "<strong>Repuestos por todos lados.</strong> Chevrolet tiene la red más "
            "extendida del país y el Sail se vendió en volumen: no hay pieza difícil.",
            "<strong>Mano de obra barata.</strong> Cualquier taller lo conoce, lo que baja "
            "el costo de cada intervención.",
            "<strong>Consumo contenido</strong>, gracias a un peso bajo y una cilindrada "
            "moderada.",
        ]},

        "Esa combinación explica por qué el Sail aparece tanto como primer auto y como "
        "vehículo de trabajo. No es el auto más refinado de su categoría, pero es de los "
        "más baratos de sostener.",

        {"h2": "Qué cambia con los años"},

        "Las diferencias entre un Sail de hace ocho años y uno reciente están sobre todo "
        "en equipamiento y seguridad, no en la mecánica de fondo.",

        {"tabla": [
            ["Aspecto", "Modelos más antiguos", "Modelos recientes"],
            ["Mecánica", "Atmosférica, sencilla", "Misma filosofía"],
            ["Equipamiento", "Básico", "Más completo de serie"],
            ["Seguridad", "Menos elementos", "Mejor dotación"],
            ["Precio de compra", "Notoriamente menor", "Mayor"],
            ["Matrícula anual", "Menor, por avalúo", "Mayor"],
        ]},

        {"quote": "Con el Sail el año importa menos que con casi cualquier otro auto. "
                  "Hemos visto un 2018 con historial completo en mejor estado que uno tres "
                  "años más nuevo que nadie mantuvo. Miren el libro de mantenimiento antes "
                  "que la fecha en la matrícula.",
         "cite": CITA},

        {"h2": "Qué revisar según el rango"},

        "En unidades de más años, el desgaste acumulado se concentra en puntos previsibles:",

        {"ol": [
            "Suspensión: amortiguadores, bujes y rótulas, que a partir de cierto "
            "kilometraje suelen estar vencidos.",
            "Embrague, en las versiones manuales que trabajaron en ciudad.",
            "Sistema de refrigeración: bomba de agua, termostato y mangueras.",
            "Óxido en zonas bajas, sobre todo en vehículos de costa o de zonas húmedas.",
            "Estado del tablero de instrumentos y de la electrónica básica.",
        ]},

        "En unidades más recientes, el foco cambia: menos desgaste mecánico y más atención "
        "a si el kilometraje declarado es coherente y a si hubo algún choque reparado. Un "
        "auto de pocos años con kilometraje muy alto suele venir de uso comercial "
        "intensivo, lo que no lo descalifica pero sí exige mirar más de cerca.",

        f"Los puntos completos están en el {link(CHECKLIST, 'checklist de 20 puntos')}, y "
        f"la relación entre años y kilometraje en la guía de "
        f"{link(KILOMETRAJE, 'cuánto kilometraje es mucho para un auto usado')}.",

        {"h2": "Para quién es y para quién no"},

        "El Sail funciona muy bien para un perfil concreto: quien necesita transporte "
        "confiable y económico, que se arregla en cualquier lado y no castiga el "
        "presupuesto mensual. Como primer auto es de las opciones más sensatas del mercado "
        "ecuatoriano.",

        "Nuestra recomendación en contra es igual de clara: si viajás seguido por carretera "
        "con el auto cargado y varias personas, o si hacés muchos kilómetros en montaña, un "
        "sedán compacto de motor pequeño te va a quedar corto. Ahí conviene mirar algo con "
        "más motor, aunque cueste más mantenerlo.",

        f"Si estás en esa situación, en el patio hay opciones de más porte como el "
        f"{link(FICHA['tucson11'][0], FICHA['tucson11'][1] + ' ' + FICHA['tucson11'][2])} o "
        f"la {link(FICHA['captiva'][0], FICHA['captiva'][1])}. Y si es tu primera compra, "
        f"la {link(PRIMER, 'guía para comprar el primer auto')} cubre lo esencial.",

        {"faq": [
            ("¿Cuánto cuesta un Chevrolet Sail usado en Ecuador?",
             "Varía mucho según año, kilometraje y estado. Es uno de los sedanes más "
             "accesibles del mercado de usados, y el rango entre una unidad antigua y una "
             "reciente es amplio. Conviene comparar unidades concretas, no promedios."),
            ("¿Qué año de Sail conviene comprar?",
             "Más que el año, decide el mantenimiento. Un modelo con historial completo "
             "suele estar mejor que uno más nuevo sin registros. Los años recientes aportan "
             "sobre todo equipamiento y seguridad."),
            ("¿Es caro mantener un Chevrolet Sail?",
             "Es de los más baratos de su categoría. Mecánica sencilla, repuestos "
             "disponibles en todo el país y mano de obra accesible por ser un modelo muy "
             "conocido en los talleres."),
            ("¿El Sail sirve para carretera?",
             "Cumple en trayectos normales, pero su motor pequeño se nota cargado y en "
             "pendiente. Para viajes frecuentes con varias personas conviene evaluar algo "
             "de mayor cilindrada."),
        ]},

        f"Si buscás un sedán económico y confiable, escribinos al "
        f"{link(wa('Hola, busco un sedán económico tipo Chevrolet Sail en OKCars.'), 'WhatsApp de OKCars')} "
        f"y te avisamos cuando entre uno. Mirá también el "
        f"{link(LISTADO, 'listado de vehículos disponibles')}. Estamos en Ibarra.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 6 · SUV o sedán
# ════════════════════════════════════════════════════════════════════════════
suv_sedan = {
    "title": "SUV o sedán usado: cuál conviene según cómo manejas",
    "slug": "suv-o-sedan-usado-cual-conviene",
    "date": "2026-11-09T09:00:00",
    "cat": CAT["guias"],
    "tags": ["SUV vs sedán", "guía de compra", "autos usados Ecuador",
             "consumo de combustible", "seminuevos Ibarra"],
    "excerpt": "La SUV domina las ventas, pero no siempre es la mejor decisión. Una "
               "comparación honesta de consumo, costo de mantenimiento, comodidad y "
               "reventa, con ejemplos reales del patio.",
    "yoast_title": "SUV o sedán usado: cuál conviene según tu uso",
    "yoast_desc": "Consumo, mantenimiento, comodidad y reventa comparados sin adornos. "
                  "Cuándo una SUV vale lo que cuesta y cuándo un sedán rinde más.",
    "focus_kw": "suv o sedan cual conviene",
    "bloques": [
        "La SUV se comió el mercado. En Ecuador y en casi todo el mundo, los compradores "
        "migraron del sedán al vehículo alto, y hoy cuesta encontrar un fabricante que "
        "siga apostando fuerte por el sedán.",

        "Eso no significa que la SUV sea siempre la decisión correcta. Significa que es la "
        "más popular, que es otra cosa.",

        {"h2": "Lo que realmente ganás con una SUV"},

        "Empecemos por lo legítimo, porque hay ventajas reales:",

        {"ul": [
            "<strong>Altura al piso.</strong> En caminos con baches, empedrados o entradas "
            "empinadas, es la diferencia entre pasar y raspar.",
            "<strong>Postura de manejo.</strong> Se sube y baja con menos esfuerzo, algo "
            "que pesa con adultos mayores o al cargar niños.",
            "<strong>Visibilidad.</strong> Ver por encima del tráfico da confianza, sobre "
            "todo a conductores con poca experiencia.",
            "<strong>Espacio de carga.</strong> El maletero suele ser más versátil por "
            "forma, más que por volumen puro.",
        ]},

        "En Imbabura esas ventajas no son teóricas. Quien vive en una parroquia rural, "
        "sube seguido a Cotacachi o entra a vías de tierra, las usa todas las semanas.",

        {"h2": "Lo que cuesta"},

        "Y ahora la parte que las fichas no destacan:",

        {"tabla": [
            ["Aspecto", "Sedán", "SUV"],
            ["Consumo", "Menor, por peso y aerodinámica", "Mayor"],
            ["Llantas", "Más baratas", "Más caras, medidas grandes"],
            ["Matrícula", "Menor, cilindrada suele ser menor", "Mayor"],
            ["Comportamiento en curva", "Más estable, centro de gravedad bajo", "Más balanceo"],
            ["Frenado", "Menor distancia por menor peso", "Mayor"],
            ["Precio de compra", "Menor a igualdad de año", "Mayor"],
        ]},

        "El consumo es la diferencia que más se acumula. Un vehículo más alto y más pesado "
        "gasta más combustible en el mismo recorrido, todos los días, durante toda la "
        "tenencia. En un uso urbano de muchos kilómetros, la brecha anual es considerable.",

        "Las llantas son el gasto que sorprende. Las medidas grandes que montan las SUV "
        "cuestan bastante más que las de un sedán, y se cambian con la misma frecuencia.",

        {"quote": "Al cliente que duda le preguntamos cuántas veces al mes sale del "
                  "asfalto. Si la respuesta es ninguna, le decimos que está pagando por una "
                  "capacidad que no usa. Igual muchos compran la SUV, y está bien: hay algo "
                  "de gusto en esto y el gusto también cuenta. Pero que lo compren sabiendo.",
         "cite": CITA},

        {"h2": "La reventa"},

        "Acá la SUV se defiende sola. La demanda del mercado ecuatoriano está claramente "
        "volcada hacia el vehículo alto, y eso se traduce en que una SUV usada se vende más "
        "rápido y sostiene mejor su precio que un sedán equivalente.",

        "Para quien cambia de auto cada tres o cuatro años, esa diferencia puede compensar "
        "buena parte del mayor consumo. Para quien se queda con el vehículo diez años, "
        "importa poco.",

        {"h2": "Cómo decidir en cinco preguntas"},

        {"ol": [
            "¿Cuántas veces al mes salís de una vía asfaltada?",
            "¿Cuántos kilómetros hacés al mes? Mientras más, más pesa el consumo.",
            "¿Vas a llevar habitualmente cinco personas o solo una o dos?",
            "¿Vas a cambiar de auto en pocos años o quedártelo mucho tiempo?",
            "¿Tu presupuesto mensual tolera un consumo mayor sin ajustar otra cosa?",
        ]},

        "Si las respuestas apuntan a poco uso fuera del asfalto, muchos kilómetros urbanos "
        "y un presupuesto mensual ajustado, el sedán es la decisión racional. Si hay "
        "caminos malos, carga frecuente o recambio cada pocos años, la SUV se justifica.",

        {"h2": "Ejemplos concretos del patio"},

        f"En Ibarra tenemos las dos familias representadas. Entre las SUV, la "
        f"{link(FICHA['cx5'][0], FICHA['cx5'][1])} del {FICHA['cx5'][2]} a "
        f"{FICHA['cx5'][4]} y el {link(FICHA['seltos'][0], FICHA['seltos'][1])} del "
        f"{FICHA['seltos'][2]} a {FICHA['seltos'][4]}. Con tracción real, la "
        f"{link(FICHA['crosstrek'][0], FICHA['crosstrek'][1])}.",

        f"En el extremo del ahorro, el {link(FICHA['prius'][0], FICHA['prius'][1])} "
        f"híbrido a {FICHA['prius'][4]} es la opción que menos combustible consume del "
        "listado, con la salvedad de su kilometraje alto.",

        f"Sobre el costo real de sostener cada opción, escribimos sobre "
        f"{link(MANTENIMIENTO, 'qué autos usados piden menos mantenimiento')} y sobre "
        f"{link(SEGURO, 'cuánto cuesta el seguro de un auto usado')}.",

        {"faq": [
            ("¿Una SUV consume mucho más que un sedán?",
             "Sí, por peso y aerodinámica. La diferencia varía entre modelos, pero es "
             "consistente y se acumula todos los meses. En uso urbano intensivo es donde "
             "más se nota."),
            ("¿Vale la pena una SUV si nunca salgo de la ciudad?",
             "Desde el punto de vista económico, no: pagás más de compra, más de consumo, "
             "más de llantas y más de matrícula por una capacidad que no usás. Desde el "
             "punto de vista de comodidad y visibilidad, hay razones legítimas para "
             "preferirla."),
            ("¿Qué se revende mejor en Ecuador?",
             "La SUV, con claridad. La demanda está volcada hacia el vehículo alto y eso "
             "acorta el tiempo de venta y sostiene mejor el precio."),
            ("¿Un sedán sirve para caminos de tierra?",
             "Para tramos ocasionales en buen estado, sí, con cuidado en los baches. Para "
             "uso frecuente en caminos malos, la altura al piso de una SUV evita golpes en "
             "los bajos que salen caros."),
        ]},

        f"Si querés probar las dos el mismo día y comparar, escribinos al "
        f"{link(wa('Hola, quiero comparar una SUV y un sedán seminuevo en OKCars.'), 'WhatsApp de OKCars')}. "
        f"Mirá el {link(LISTADO, 'listado completo')}. Estamos en Ibarra y atendemos a "
        f"compradores de Otavalo, Atuntaqui, Cayambe y Tulcán.",
    ],
}


if __name__ == "__main__":
    for spec in (matricula, consultar, rtv, deepal, sail, suv_sedan):
        guarda(spec)
        print("  spec escrito:", spec["slug"])
