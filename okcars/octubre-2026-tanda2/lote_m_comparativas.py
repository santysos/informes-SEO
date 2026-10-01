#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote M — comparativas y cobertura local (4 posts, tanda de octubre 2026).

Un duelo que el patio permite mostrar en vivo (Seltos vs Territory al mismo precio), dos
decisiones de fondo (automático o manual, 4x4 o 4x2) y el comprador de Quito.

El Maxus T60 vs Changan Hunter se descartó: el post publicado de la Maxus ya hace esa
comparación y competirían por la misma búsqueda. Lo reemplaza lote_n_llantas.py.

Escrito en USTED. Los años de Seltos y Territory no se mencionan: hay una inconsistencia
entre posts publicados (2025) y el listado del 8-sep (2021/2022) pendiente de confirmar.
"""
from comun import (CAT, CAYAMBE, CHECKLIST, CHINOS, CITA, DIESEL, ENTRADA, FECHAS,
                   FICHA, IBARRA_GARANTIA, MATRICULA, PAPELES, PARTE_PAGO, POST_HUNTER,
                   POST_MAXUS, POST_SELTOS, POST_TERRITORY, REVENTA, REVISION,
                   REVISION_TECNICA, SUV_SEDAN, TRASPASO, CUOTA, KILOMETRAJE, HIBRIDOS, POST_TANG, SEGURO_PRECIO, cierre, enlace_ficha, guarda,
                   link)



# ════════════════════════════════════════════════════════════════════════════
# 1 · Kia Seltos vs Ford Territory
# ════════════════════════════════════════════════════════════════════════════
seltos_territory = {
    "title": "Kia Seltos vs Ford Territory usados: cuál conviene por $20.500",
    "slug": "kia-seltos-vs-ford-territory-usados",
    "date": FECHAS[3],
    "cat": CAT["modelos"],
    "tags": ["Kia Seltos usado", "Ford Territory usada", "SUV usadas Ecuador",
             "comparativa SUV", "OKCars"],
    "excerpt": "Dos SUV compactas al mismo precio y con kilometraje casi idéntico. La "
               "diferencia está en el uso que les va a dar: ciudad y reventa, o espacio y "
               "carretera. Cómo decidir sin quedarse con la duda.",
    "yoast_title": "Kia Seltos vs Ford Territory: cuál conviene usada",
    "yoast_desc": "Mismo precio, kilometraje parecido y dos filosofías distintas. Qué gana "
                  "con cada una en Ibarra, en la Panamericana y el día que quiera venderla.",
    "focus_kw": "kia seltos vs ford territory",
    "bloques": [
        "En el patio de OKCars en Ibarra hay dos SUV compactas que cuestan exactamente lo "
        "mismo: un Kia Seltos 1.6 automático y una Ford Territory 1.5 turbo automática, "
        "las dos a $20.500. Los kilometrajes también se parecen: 64.560 la Kia, 67.000 la "
        "Ford. Pocas veces el mercado ofrece una comparación tan limpia.",

        "Cuando el precio y el uso acumulado empatan, lo que decide es otra cosa: cómo va "
        "a manejar el auto los próximos cinco años y qué espera recuperar cuando lo venda. "
        "Este artículo ordena esa decisión.",

        {"h2": "La respuesta corta: espacio contra certeza"},

        "Si su familia viaja completa y el auto sale seguido a carretera, la Territory le "
        "da más vehículo por el mismo dinero. Si su uso es sobre todo urbano y le importa "
        "venderlo rápido y bien dentro de unos años, el Seltos tiene la apuesta más segura.",

        "Ninguna de las dos es un error. Son dos maneras distintas de gastar $20.500, y la "
        "correcta depende de su semana típica, no de cuál se ve mejor en la foto.",

        {"h2": "Las dos, lado a lado"},

        {"tabla": [
            ["", "Kia Seltos", "Ford Territory"],
            ["Precio en el patio", FICHA["seltos"][4], FICHA["territory"][4]],
            ["Kilometraje", f"{FICHA['seltos'][3]} km", f"{FICHA['territory'][3]} km"],
            ["Motor", "1.6 atmosférico", "1.5 turbo"],
            ["Caja", "Automática", "Automática"],
            ["Tamaño", "Compacta de interior aprovechado", "Más grande, viaja como mediana"],
            ["Respaldo", "Red Kia con años en el país", "Red Ford; fabricación en China"],
            ["Reventa", "Historial largo y demanda estable", "Curva todavía en formación"],
        ]},

        "La tabla resume lo que ya contamos en las guías individuales del "
        f"{link(POST_SELTOS, 'Seltos usado')} y de la "
        f"{link(POST_TERRITORY, 'Territory usada')}. Lo que sigue es cómo pesa cada fila "
        "según el uso real.",

        {"h2": "En la ciudad: Ibarra, tráfico corto y parqueo"},

        "Para el recorrido diario dentro de Ibarra, del centro a la avenida Mariano Acosta "
        "o hacia los barrios de El Olivo y Yacucalle, las dos se manejan con soltura. Ahí "
        "el Seltos tiene una ventaja pequeña pero constante: es más fácil de estacionar en "
        "calles del centro histórico, donde los espacios son angostos y se parquea en "
        "paralelo.",

        "El motor atmosférico 1.6 también es más simple de mantener. No tiene turbo que "
        "cuidar, y para trayectos cortos con arranques en frío esa sencillez es un punto "
        "a favor.",

        {"h2": "En carretera: la Panamericana y la altura"},

        "Aquí la Territory se defiende mejor. Su 1.5 turbo compensa la pérdida de potencia "
        "que sufren los motores atmosféricos en altura, y eso se nota en las subidas largas "
        "de la Panamericana: la cuesta de Guayllabamba camino a Quito, o el ascenso hacia "
        "Tulcán desde el valle del Chota.",

        "El Seltos no sufre en esos tramos, pero los adelantamientos hay que planificarlos "
        "con más margen, sobre todo con cuatro pasajeros y equipaje. Si va a Quito cada "
        "semana o viaja seguido a la frontera, la Territory va más holgada.",

        "La contrapartida del turbo es la disciplina: cambios de aceite a tiempo y con el "
        "lubricante correcto. Un turbo descuidado es una reparación cara. Pida las facturas "
        "de mantenimiento antes de cerrar, como en cualquier usado con turbo.",

        {"h2": "Atrás y en el maletero"},

        "La diferencia de tamaño se siente más en el asiento trasero que en las cifras. En "
        "la Territory tres adultos viajan atrás sin pelear los hombros. En el Seltos "
        "caben, pero el trayecto Ibarra–Quito con tres atrás se hace largo.",

        "Si su familia tiene niños pequeños con sillas, o si suele llevar a los abuelos los "
        "domingos a Yahuarcocha o a San Antonio, ese espacio extra deja de ser un detalle.",

        {"quote": "Cuando alguien duda entre las dos, le pedimos que se siente atrás en "
                  "ambas antes de probarlas manejando. La mitad decide ahí mismo, antes de "
                  "encender el motor.",
         "cite": CITA},

        {"h2": "El día que quiera venderla"},

        "Este es el argumento fuerte del Seltos. Kia tiene años construyendo red y "
        "reputación en Ecuador, y su modelo compacto se vende con facilidad en el mercado "
        "de usados. Los compradores lo conocen y saben qué esperar.",

        "La Territory es más reciente en el país. Que se fabrique en China bajo la marca "
        "Ford ya no asusta como hace unos años, pero su curva de reventa todavía se está "
        "escribiendo. Probablemente se venda bien; lo que no hay aún es un historial largo "
        f"que lo demuestre. Ampliamos el tema en {link(REVENTA, 'qué autos usados se revenden mejor')}.",

        {"h2": "Seguro y gastos fijos: aquí empatan"},

        "Al costar lo mismo, las dos se aseguran sobre un valor parecido. Con la referencia "
        "que usamos en el sitio, una prima anual de entre el 3,5 % y el 5 % del valor del "
        "auto, cada una ronda entre $720 y $1.025 al año en un seguro todo riesgo. La cifra "
        "final la pone la aseguradora según su perfil.",

        "La matrícula también se mueve en rangos similares, porque depende del avalúo y no "
        "de la marca. Donde sí puede haber diferencia es en repuestos de colisión: en la "
        "Territory, por ser un modelo más nuevo en el país, algunas piezas de carrocería "
        "tardan más en llegar a Ibarra. Pregunte en la aseguradora si eso cambia la "
        f"cotización. Más detalle en {link(SEGURO_PRECIO, 'cuánto cuesta asegurar un auto usado')}.",

        {"h2": "Cómo decidir en cuatro pasos"},

        {"ol": [
            "Anote su recorrido de una semana normal: cuántos kilómetros son ciudad y "
            "cuántos carretera.",
            "Cuente cuántas veces al mes viaja con el auto lleno.",
            "Defina cuántos años piensa quedarse con él. Menos de cuatro años inclina hacia "
            "la reventa; más de cuatro, hacia el uso.",
            "Pruebe las dos el mismo día, en el mismo recorrido, incluyendo una subida.",
        ]},

        "Ese cuarto paso es el que más aclara. Tener las dos unidades en el mismo patio "
        "permite comparar con el mismo asfalto, la misma hora y el mismo humor.",

        {"h2": "Cuándo ninguna de las dos le conviene"},

        "Si su trabajo le exige entrar a caminos de tierra con frecuencia, ninguna es la "
        "herramienta. Son SUV de ciudad y carretera, con tracción delantera. En ese caso "
        f"conviene mirar una camioneta, y si duda entre formatos, lea {link(SUV_SEDAN, 'SUV o sedán usado')}.",

        "Y si su presupuesto real está por debajo de los $20.500 contando entrada, seguro y "
        f"matrícula, no fuerce la compra. Revise primero {link(ENTRADA, 'cuánta entrada necesita')} "
        "y arme el número completo.",

        {"faq": [
            ("¿Cuál consume menos, el Seltos o la Territory?",
             "En ciudad la diferencia es pequeña. En carretera y en altura el turbo de la "
             "Territory trabaja con menos esfuerzo, pero si se maneja con pie pesado cobra "
             "en combustible. El hábito del conductor pesa más que la ficha técnica."),
            ("¿La Territory es un auto chino?",
             "Se fabrica en China, con ingeniería y respaldo de Ford. En la práctica lo que "
             "importa es quién responde después de la compra, y en Ecuador responde la red "
             "Ford."),
            ("¿Por qué las dos cuestan lo mismo si la Territory es más grande?",
             "Porque el mercado le cobra a la Territory la incertidumbre de reventa y le "
             "paga al Seltos su historial. Ese equilibrio es justamente lo que hace "
             "interesante la comparación."),
            ("¿Se pueden financiar las dos?",
             "Sí, con crédito directo o bancario. También recibimos su auto actual como "
             f"{link(PARTE_PAGO, 'parte de pago')}, lo que suele bajar bastante la entrada."),
            ("¿Puedo probarlas el mismo día?",
             "Sí. Las dos están en el patio de Ibarra. Coordine la visita por WhatsApp y se "
             "las tenemos listas para hacer el mismo recorrido con cada una."),
        ]},

        cierre("Hola, quiero comparar el Kia Seltos y la Ford Territory en OKCars.",
               "Si quiere hacer la prueba de las dos en el mismo recorrido, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Automático o manual
# ════════════════════════════════════════════════════════════════════════════
automatico_manual = {
    "title": "Auto automático o manual usado: cuál conviene en la Sierra",
    "slug": "automatico-o-manual-usado-cual-conviene",
    "date": FECHAS[7],
    "cat": CAT["guias"],
    "tags": ["auto automático usado", "auto manual usado", "caja automática",
             "CVT", "seminuevos Imbabura"],
    "excerpt": "Las subidas de Ibarra, el tráfico de Quito y el mantenimiento de cada caja "
               "cambian la respuesta. Cuándo vale la pena pagar por un automático, cuándo "
               "el manual sigue siendo mejor negocio y qué revisar en cada uno.",
    "yoast_title": "Auto automático o manual: cuál conviene comprar usado",
    "yoast_desc": "Subidas, tráfico, mantenimiento y reventa en el norte del Ecuador. Qué "
                  "caja le conviene según su uso y qué revisar antes de pagar por un usado.",
    "focus_kw": "auto automatico o manual cual conviene",
    "bloques": [
        "Hace quince años la pregunta casi no existía en Ecuador: el automático era un lujo "
        "y el manual era lo normal. Hoy, en el patio de OKCars, ocho de las diez unidades "
        "disponibles son automáticas. Las únicas manuales son las dos camionetas diésel.",

        "Ese cambio dice algo sobre lo que pide el mercado, pero no responde lo que usted "
        "necesita. La caja correcta depende de dónde maneja, cuánto maneja y para qué usa "
        "el vehículo.",

        {"h2": "La respuesta directa"},

        "Para uso de ciudad con tráfico, sobre todo si viaja a Quito con frecuencia, el "
        "automático compensa lo que cuesta. Para trabajo con carga, caminos de tierra o un "
        "presupuesto ajustado, el manual sigue siendo la opción más sensata.",

        "Entre esos dos extremos está la mayoría de compradores, y ahí deciden tres cosas: "
        "las pendientes de su recorrido, el estado de la caja que va a comprar y el precio "
        "al que espera venderla.",

        {"h2": "Las subidas de Ibarra y la Panamericana"},

        "Quien maneja en Ibarra conoce las arrancadas en pendiente: las calles que suben "
        "hacia la loma de Guayabillas, la salida a Yahuarcocha o los semáforos en cuesta "
        "camino a Caranqui. Con caja manual, cada parada en subida exige coordinar freno de "
        "mano, embrague y acelerador. Con automático, el auto se sostiene solo y arranca "
        "sin retroceder.",

        "En ruta larga la diferencia se achica. Por la Panamericana, entre Otavalo y "
        "Cayambe, un manual bien manejado va igual de cómodo y le permite elegir la marcha "
        "en las bajadas largas, frenando con motor.",

        {"h2": "El tráfico de Quito cambia la cuenta"},

        "Si viaja seguido a Quito, el argumento del automático se vuelve fuerte. Una hora "
        "en la entrada por Calderón o en la avenida Simón Bolívar en hora pico, pisando el "
        "embrague cada diez metros, cansa la pierna y desgasta el disco.",

        "Para quien hace ese recorrido una vez por semana, el automático deja de ser "
        "comodidad y pasa a ser calidad de vida.",

        {"h2": "Qué cuesta mantener cada una"},

        {"tabla": [
            ["", "Manual", "Automática convencional", "CVT"],
            ["Pieza de desgaste principal", "Embrague (disco y plato)",
             "Aceite y filtro de la caja", "Aceite y correa o cadena interna"],
            ["Mantenimiento clave", "Revisar embrague al comprar",
             "Cambio de aceite de caja según manual", "Aceite específico CVT, sin sustitutos"],
            ["Si se descuida", "Embrague patina", "Cambios bruscos o tardíos",
             "Tirones y zumbido al acelerar"],
            ["Talleres que la conocen", "Casi todos", "La mayoría", "Menos, conviene especialista"],
        ]},

        "El embrague de un manual es una pieza de desgaste: tarde o temprano se cambia, y "
        "cualquier taller del norte del país lo hace. Una caja automática bien mantenida "
        "dura mucho, pero cuando falla por descuido la reparación es más compleja.",

        "La CVT merece una línea aparte. Es una caja automática sin marchas fijas, como la "
        f"del {enlace_ficha('koleos', 'Renault Koleos 2.5 CVT')} que tenemos en el patio. Es "
        "suave y eficiente, pero exige su aceite específico y no perdona el descuido.",

        {"quote": "En un automático usado, la palabra del dueño anterior no alcanza. Pida las "
                  "facturas del cambio de aceite de la caja. Si no existen, tómela como una "
                  "caja que nunca se atendió.",
         "cite": CITA},

        {"h2": "Cómo revisar la caja antes de comprar"},

        {"ol": [
            "Encienda el motor en frío y pase por todas las posiciones de la palanca con el "
            "freno pisado. Cada cambio debe entrar con un golpe suave, no seco.",
            "En el automático, acelere de forma progresiva en plano: los cambios deben "
            "sentirse ordenados, sin que el motor se revolucione de golpe.",
            "Haga una arrancada en subida. El automático no debe retroceder; el manual no "
            "debe vibrar ni oler a quemado al soltar el embrague.",
            "En el manual, fíjese dónde engancha el embrague. Si engancha muy arriba, está "
            "gastado.",
            "Pida el historial de mantenimiento de la caja, además del motor.",
        ]},

        f"Estos puntos complementan el {link(CHECKLIST, 'checklist de 20 puntos')} y la "
        f"{link(REVISION, 'revisión mecánica antes de comprar')}.",

        {"h2": "Híbridos y eléctricos: la pregunta desaparece"},

        "Si está mirando un híbrido o un eléctrico, la discusión entre manual y automático "
        "no aplica. Los híbridos se venden con transmisión automática, y un eléctrico no "
        "tiene una caja de cambios como la de un auto a gasolina: entrega la fuerza desde "
        "cero, sin escalones.",

        f"En el patio hay un ejemplo de cada uno: el {enlace_ficha('prius', 'Toyota Prius C')} "
        f"híbrido y el {enlace_ficha('tang', 'BYD Tang')} eléctrico. En los dos, lo que se "
        "revisa no es la caja sino el estado de la batería y el historial de servicio. "
        f"Lo explicamos en la {link(HIBRIDOS, 'guía de híbridos usados')} y en la del "
        f"{link(POST_TANG, 'BYD Tang usado')}.",

        "Para quien maneja sobre todo en ciudad y quiere bajar el gasto en combustible, "
        "esa puede ser la respuesta a una pregunta que no se estaba haciendo.",

        {"h2": "Qué pasa con la reventa"},

        "En autos de ciudad y SUV, el automático se vende más rápido. La demanda del "
        "mercado usado se movió hacia esa caja y los compradores de SUV compactas casi no "
        "buscan manuales.",

        "En camionetas de trabajo pasa lo contrario: el manual sigue siendo lo esperado y "
        f"se revende sin problema. Lo desarrollamos en {link(REVENTA, 'qué autos usados se revenden mejor')}.",

        {"h2": "Cuándo el automático no le conviene"},

        "Si el presupuesto está justo y la diferencia de precio con un manual equivalente "
        "le obliga a bajar de año o subir de kilometraje, quédese con el manual en mejor "
        "estado. Un manual cuidado es mejor compra que un automático cansado.",

        "Tampoco conviene si el vehículo es para trabajo pesado con carga en caminos de "
        "tierra, como los de las comunidades de Cotacachi o Pimampiro. Ahí el control de "
        "marchas del manual y la simplicidad de reparación pesan más.",

        {"faq": [
            ("¿Un automático consume más que un manual?",
             "En modelos antiguos sí, de forma notoria. En autos de los últimos años la "
             "diferencia es pequeña y en algunos casos el automático consume igual o menos. "
             "Influye más el estilo de manejo que la caja."),
            ("¿La CVT es confiable?",
             "Una CVT bien mantenida funciona sin problemas. El riesgo está en las que nunca "
             "recibieron su cambio de aceite específico. En un usado con CVT, el historial "
             "de mantenimiento vale tanto como el kilometraje."),
            ("¿Cuánto dura un embrague?",
             "Depende mucho del uso: no es lo mismo ciudad con pendientes que carretera. "
             "Por eso, más que el kilometraje, conviene revisar en qué punto engancha y si "
             "patina al acelerar en subida."),
            ("¿Puedo aprender a manejar automático si siempre manejé manual?",
             "Sí, la adaptación toma pocos días. El error típico al principio es buscar el "
             "embrague con el pie izquierdo; se corrige rápido."),
            ("¿Qué automáticos tienen en el patio?",
             "Al cierre de este artículo, ocho de las diez unidades son automáticas, entre "
             "SUV, minivan, híbrido y eléctrico. El listado se actualiza seguido."),
        ]},

        cierre("Hola, estoy decidiendo entre automático y manual y quiero ver opciones en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Camioneta 4x4 o 4x2
# ════════════════════════════════════════════════════════════════════════════
cuatro_por_cuatro = {
    "title": "Camioneta 4x4 o 4x2: cuál necesita de verdad",
    "slug": "camioneta-4x4-o-4x2-cual-necesita",
    "date": FECHAS[15],
    "cat": CAT["guias"],
    "tags": ["camioneta 4x4", "camioneta 4x2", "camionetas usadas Ecuador",
             "tracción 4x4", "camionetas Imbabura"],
    "excerpt": "La 4x4 se vende como seguro contra todo, pero se paga todos los días en "
               "precio, consumo y mantenimiento. Cómo saber si su trabajo la justifica, "
               "con las rutas del norte del país como referencia.",
    "yoast_title": "Camioneta 4x4 o 4x2: cuál necesita de verdad",
    "yoast_desc": "Caminos de tierra, lluvia, páramo o pura carretera. Seis preguntas para "
                  "saber si su trabajo justifica la 4x4 o si está pagando tracción que no usa.",
    "focus_kw": "camioneta 4x4 o 4x2",
    "bloques": [
        "En el norte del Ecuador mucha gente compra camioneta 4x4 por si acaso. Por si "
        "llueve, por si toca entrar a la finca, por si algún día hace falta. Es una "
        "decisión comprensible y, muchas veces, cara.",

        "La tracción total sirve de verdad en ciertos terrenos y para ciertos trabajos. "
        "Fuera de ellos es peso, consumo y mantenimiento que se paga todos los meses sin "
        "recibir nada a cambio. Esta guía le ayuda a saber en qué lado está.",

        {"h2": "La respuesta directa"},

        "Necesita 4x4 si al menos una vez al mes sale del asfalto con carga, o si su ruta "
        "habitual incluye tierra, lodo o pendientes fuertes en época de lluvia. Si su "
        "camioneta vive en vías pavimentadas, una 4x2 hace el mismo trabajo, cuesta menos "
        "comprarla y menos mantenerla.",

        {"h2": "Dónde la 4x4 se gana su precio en el norte"},

        "Hay rutas donde la discusión no existe:",

        {"ul": [
            "<strong>La zona de Intag</strong>, saliendo de Cotacachi hacia Apuela y García "
            "Moreno, con tramos de tierra que en invierno se vuelven lodo.",
            "<strong>Los caminos a las comunidades</strong> de las faldas del Imbabura y del "
            "Cotacachi, empinados y sin pavimento.",
            "<strong>El páramo del Carchi</strong>, hacia El Ángel y las zonas altas de "
            "cultivo, con frío, neblina y suelo blando.",
            "<strong>Las fincas de Pimampiro</strong> y del valle del Chota, donde la "
            "entrada a la parcela rara vez está asfaltada.",
        ]},

        "Si su trabajo pasa por alguno de esos lugares de forma regular, la 4x4 deja de "
        "ser un lujo. Una camioneta 4x2 cargada se atasca en situaciones que una 4x4 "
        "resuelve sin esfuerzo, y sacarla cuesta tiempo, dinero y a veces la carga.",

        {"h2": "Lo que cuesta la 4x4 aunque no la use"},

        {"tabla": [
            ["Aspecto", "4x2", "4x4"],
            ["Precio de compra", "Menor", "Mayor en el mismo modelo y año"],
            ["Consumo", "Menor", "Algo mayor por el peso y la transmisión extra"],
            ["Componentes adicionales", "—", "Caja de transferencia y diferencial delantero"],
            ["Mantenimiento", "Básico", "Aceites adicionales y revisión del sistema"],
            ["Llantas", "Desgaste normal", "Conviene rotarlas y mantenerlas parejas"],
            ["Reventa", "Buena", "Mejor en zonas rurales"],
        ]},

        "Ninguna de esas diferencias es enorme por separado. Sumadas durante cinco años, "
        "sí lo son, sobre todo si la 4x4 se conectó tres veces en todo ese tiempo.",

        "Un dato a favor de la 4x4: en el norte del país se revende bien, porque hay "
        "demanda sostenida de agricultores y comerciantes que la necesitan. Parte de lo "
        "que paga de más lo recupera al vender.",

        {"quote": "Vemos camionetas 4x4 de cinco años cuya tracción delantera casi no se "
                  "usó. El dueño pagó por ella cada mes y nunca la necesitó. Ese dinero "
                  "pudo ir a una unidad más nueva.",
         "cite": CITA},

        {"h2": "Seis preguntas para decidir"},

        {"ol": [
            "¿Cuántas veces al mes sale del asfalto? Si la respuesta es cero, 4x2.",
            "Cuando sale, ¿va cargado? Tierra seca sin carga la resuelve una 4x2 con buenas "
            "llantas.",
            "¿Su ruta empeora en invierno? Un camino que en agosto es fácil puede ser "
            "imposible en abril.",
            "¿Tiene alternativa si se queda? Un vecino con tractor no es un plan de "
            "trabajo.",
            "¿Cuánto tiempo piensa quedarse con la camioneta? A más años, más pesa el "
            "costo de mantener la 4x4.",
            "¿Dónde la va a vender después? En zona rural la 4x4 se vende mejor; en ciudad "
            "la diferencia es menor.",
        ]},

        "Si respondió que sale del asfalto con carga y que su ruta empeora en invierno, la "
        "4x4 está justificada. Si la mayoría de respuestas apunta a la ciudad, no la "
        "necesita.",

        {"h2": "Si elige 4x2 para zona rural, mejore sus probabilidades"},

        "Hay quien entra a tierra de vez en cuando y decide no pagar la 4x4. Es una "
        "decisión razonable si se acompaña de algunas precauciones:",

        {"ul": [
            "<strong>Llantas todo terreno</strong> en lugar de las de carretera. Son la "
            "mejora más rentable para una 4x2 que sale del asfalto.",
            "<strong>Algo de peso en la tina.</strong> En una 4x2 la tracción va atrás, y "
            "una tina vacía deja esas ruedas con poco agarre en barro.",
            "<strong>Elegir el momento.</strong> El mismo camino que se sube sin problema "
            "en la mañana puede ser imposible después de un aguacero de la tarde.",
            "<strong>Una cuerda o eslinga de remolque</strong> siempre en el vehículo.",
        ]},

        "Si con todo eso se queda atascado más de un par de veces al año, la señal es "
        "clara: su trabajo ya pide 4x4.",

        {"h2": "Un ejemplo con las dos camionetas del patio"},

        f"En OKCars tenemos ahora una {enlace_ficha('maxus', 'Maxus T60 Elite 4x4')} del "
        f"2024 a {FICHA['maxus'][4]} y una {enlace_ficha('hunter', 'Changan Hunter 4x2')} "
        f"del 2026 a {FICHA['hunter'][4]}. La 4x4 es la más barata porque tiene más "
        "kilómetros. El caso muestra que la tracción no siempre encarece: depende del año "
        "y del uso de cada unidad.",

        f"La ficha de cada una y su contexto están en {link(POST_MAXUS, 'la guía de la Maxus T60 usada')} y {link(POST_HUNTER, 'la de la Changan Hunter')}.",

        {"h2": "Si compra una 4x4 usada, revise esto"},

        {"ul": [
            "Que la tracción entre y salga sin golpes ni ruidos durante la prueba.",
            "Que no haya luces de advertencia del sistema en el tablero.",
            "Golpes o raspones en el diferencial delantero y en los protectores de los "
            "bajos.",
            "Fugas de aceite en la caja de transferencia.",
            "Que las cuatro llantas sean de la misma medida y con desgaste parecido.",
        ]},

        f"El resto de la revisión de un diésel está en la "
        f"{link(DIESEL, 'guía de camionetas diésel usadas')}, y la general en el "
        f"{link(CHECKLIST, 'checklist de 20 puntos')}.",

        {"h2": "Cuándo la 4x4 no le conviene"},

        "Si su trabajo es de reparto urbano, obra en ciudad o carga por carretera "
        "pavimentada, la 4x4 es un gasto sin retorno. Con el dinero de la diferencia puede "
        "comprar una 4x2 más nueva o con menos kilómetros, y eso sí lo va a notar todos "
        "los días.",

        {"faq": [
            ("¿Una 4x2 con buenas llantas reemplaza a una 4x4?",
             "En tierra seca y sin mucha carga, ayuda bastante. En lodo, pendiente fuerte o "
             "con la tina llena, no. Las llantas mejoran el agarre pero no reemplazan la "
             "tracción delantera."),
            ("¿Manejar siempre en 4x4 desgasta la camioneta?",
             "En la mayoría de camionetas de trabajo la 4x4 se conecta solo cuando hace "
             "falta y no debe usarse en asfalto seco. Usarla así fuerza la transmisión. "
             "Revise el manual del modelo."),
            ("¿La 4x4 consume mucho más?",
             "Algo más, por el peso adicional de los componentes. La diferencia exacta "
             "depende del modelo y del uso, pero se nota a fin de mes en uso diario."),
            ("¿Una SUV con tracción integral sirve igual que una camioneta 4x4?",
             "Para lluvia en asfalto, caminos de tierra en buen estado o un tramo "
             "resbaloso, ayuda. Para trabajo con carga en lodo o pendientes fuertes, una "
             "camioneta 4x4 de trabajo está pensada para eso y una SUV no. Además, la tina "
             "y la altura al piso pesan tanto como la tracción."),
            ("¿Conviene más 4x4 gasolina o diésel?",
             "Para trabajo con carga, el diésel por su torque y consumo. Para uso mixto con "
             "pocos kilómetros al mes, una gasolina puede ser más sencilla de mantener."),
        ]},

        cierre("Hola, necesito una camioneta y quiero saber si me conviene 4x4 o 4x2."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Comprar en Ibarra desde Quito
# ════════════════════════════════════════════════════════════════════════════
desde_quito = {
    "title": "Comprar auto usado en Ibarra desde Quito: cómo hacerlo",
    "slug": "comprar-seminuevo-ibarra-desde-quito",
    "date": FECHAS[19],
    "cat": CAT["ibarra"],
    "tags": ["autos usados Ibarra", "comprar auto desde Quito", "seminuevos Imbabura",
             "traspaso Pichincha", "OKCars"],
    "excerpt": "Ibarra está a unas dos horas y media de Quito por la Panamericana. Cuándo "
               "vale la pena el viaje, qué coordinar antes de salir y cómo resolver traspaso "
               "y matrícula si usted vive en Pichincha.",
    "yoast_title": "Comprar auto usado en Ibarra desde Quito",
    "yoast_desc": "Qué coordinar antes del viaje, cómo verificar la unidad a distancia y "
                  "qué pasa con el traspaso y la matrícula cuando usted vive en Pichincha.",
    "focus_kw": "comprar auto usado en ibarra desde quito",
    "bloques": [
        "Quito tiene una oferta de autos usados enorme, y eso tiene una desventaja poco "
        "comentada: comparar lleva semanas. Patios en la avenida Galo Plaza, en el sur, en "
        "el valle; publicaciones que desaparecen en horas; vendedores que no contestan.",

        "Algunos compradores de la capital resuelven el problema subiendo a Ibarra. No "
        "porque allá todo sea más barato, sino porque pueden ver unidades verificadas en "
        "una sola visita. Esta guía explica cuándo conviene ese viaje y cómo organizarlo "
        "para no perder el día.",

        {"h2": "La respuesta directa: el viaje vale si lo prepara antes"},

        "Ibarra está a unas dos horas y media de Quito por la Panamericana, según el "
        "tráfico en la salida por Calderón y Guayllabamba. Es un viaje de ida y vuelta en "
        "el día, perfectamente posible.",

        "Lo que lo hace rentable es llegar con la unidad ya preseleccionada, los papeles "
        "verificados y la prueba de manejo reservada. Subir a ver qué hay es la forma más "
        "segura de perder una jornada.",

        {"h2": "Qué coordinar por WhatsApp antes de salir"},

        {"ol": [
            "Pida fotos actuales de la unidad: exterior, interior, tablero encendido con "
            "el kilometraje y el motor.",
            "Solicite un video corto con el motor arrancando en frío. Un buen video dice "
            "más que diez fotos.",
            "Pregunte por los papeles: matrícula, certificado de gravámenes, multas y "
            "si hay prenda vigente.",
            "Confirme que la unidad sigue disponible el mismo día del viaje, no la semana "
            "anterior.",
            "Reserve una hora para la prueba de manejo y, si quiere, para que su mecánico "
            "de confianza la revise.",
            "Pregunte por la forma de pago y si puede dejar una reserva.",
        ]},

        f"La lista de documentos que conviene pedir está en "
        f"{link(PAPELES, 'qué papeles revisar antes de comprar un auto usado')}.",

        {"quote": "Antes de viajar desde Quito, pida fotos, video y los papeles del auto. Si "
                  "algo no le convence a la distancia, mejor no viaje: un viaje perdido no "
                  "le sirve a nadie.",
         "cite": CITA},

        {"h2": "Qué gana viniendo a Ibarra"},

        "La ventaja principal no es el precio. Es que en un patio formal la unidad ya "
        "pasó por una revisión y sus papeles se verificaron antes de publicarla. Eso le "
        "ahorra las visitas a vendedores particulares que terminan en sorpresas.",

        {"ul": [
            "<strong>Varias unidades en un solo lugar</strong>, para comparar en la misma "
            "visita.",
            f"<strong>Garantía comercial</strong>, explicada en "
            f"{link(IBARRA_GARANTIA, 'autos seminuevos en Ibarra con garantía')}.",
            "<strong>Su auto actual como parte de pago</strong>, valorado en el mismo "
            "patio.",
            "<strong>Financiamiento</strong>, si no va a pagar todo de contado.",
        ]},

        {"h2": "La prueba de manejo, con la Panamericana como pista"},

        "Una ventaja del viaje es que la ruta de regreso ya es una prueba de carretera. "
        "Pero la prueba previa en Ibarra tiene que incluir tres cosas: una subida, un "
        "tramo a velocidad de carretera y una frenada firme.",

        "Si el auto que le interesa es automático, haga una arrancada en pendiente. Si es "
        "manual, preste atención al embrague. Y si va a regresar manejando a Quito, "
        "confirme que la llanta de emergencia y las herramientas estén en el vehículo.",

        {"h2": "Traspaso y matrícula si vive en Pichincha"},

        "Comprar en Imbabura no complica el trámite. El traspaso de dominio sigue los "
        f"mismos pasos en todo el país: los explicamos en "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador: requisitos y pasos')}.",

        "Lo que sí conviene saber como quiteño:",

        {"ul": [
            "Confirme con la agencia de tránsito de Quito los requisitos vigentes para "
            "registrar el traspaso y matricular el auto a su nombre.",
            f"En Quito la revisión técnica vehicular es obligatoria. Revise la "
            f"{link(REVISION_TECNICA, 'guía de revisión técnica vehicular')} antes de la "
            "fecha que le corresponda.",
            "El último dígito de la placa define los días de pico y placa en Quito. Si va "
            "a usar el auto a diario, considérelo antes de elegir.",
            f"Los costos y plazos de matrícula están en "
            f"{link(MATRICULA, 'cuánto cuesta matricular un auto en Ecuador')}.",
        ]},

        {"h2": "Cómo pagar sin viajar con efectivo"},

        "No conviene recorrer la Panamericana con el valor de un auto en efectivo. Lo "
        "práctico es coordinar una transferencia bancaria y confirmar antes del viaje los "
        "datos de la cuenta, que deben estar a nombre de la empresa vendedora.",

        "Si va a financiar, adelante la solicitud de crédito desde Quito. La aprobación "
        "puede tomar algunos días, y llegar con ella resuelta le permite cerrar en la "
        "misma visita.",

        {"h2": "Qué llevar el día de la visita"},

        {"ul": [
            "Su cédula y su licencia vigente, para la prueba de manejo y los documentos.",
            "El comprobante de la transferencia o la aprobación del crédito, si ya la tiene.",
            "Si entrega su auto como parte de pago, la matrícula y las llaves de repuesto.",
            "Una lista corta de preguntas que no quiere olvidar hacer.",
        ]},

        {"h2": "Volver manejando o dejarlo para otro día"},

        "Si el pago y los papeles quedan listos en la visita, puede regresar con el auto. "
        "Si falta algún paso, como la aprobación de un crédito o el reconocimiento de "
        "firmas en notaría, consulte si es posible dejar la unidad apartada y volver "
        "cuando todo esté cerrado.",

        "Algunos compradores aprovechan para combinar el viaje: suben un sábado, prueban el "
        "auto, almuerzan en Yahuarcocha o en Otavalo y regresan con la compra decidida.",

        {"h2": "Cuándo no le conviene viajar"},

        "Si todavía no sabe qué tipo de vehículo busca, el viaje se vuelve paseo. Defina "
        f"antes el presupuesto completo, con {link(ENTRADA, 'entrada')}, seguro y "
        "matrícula, y el formato que necesita.",

        "Tampoco vale la pena si la única unidad que le interesa ya tiene otro comprador "
        "con reserva. Pregunte antes de salir, sin pena. Para la ruta inversa, desde el "
        f"norte de Pichincha, revise {link(CAYAMBE, 'comprar un seminuevo desde Cayambe')}.",

        {"faq": [
            ("¿Cuánto tiempo toma el viaje de Quito a Ibarra?",
             "Unas dos horas y media por la Panamericana, dependiendo del tráfico en la "
             "salida norte de Quito. Es un viaje cómodo de ida y vuelta en el día."),
            ("¿Puedo hacer el traspaso en Quito si compro en Ibarra?",
             "El traspaso sigue un procedimiento nacional. Confirme en la agencia de "
             "tránsito de Quito los requisitos vigentes para registrarlo y matricular el "
             "auto a su nombre."),
            ("¿Puedo reservar un auto sin viajar?",
             "Consúltelo por WhatsApp. Lo habitual es coordinar fotos, video y papeles "
             "antes, y cerrar la compra en la visita después de la prueba de manejo."),
            ("¿Aceptan mi auto de Quito como parte de pago?",
             f"Sí. Lo valoramos en el patio, sin costo. Más detalle en "
             f"{link(PARTE_PAGO, 'cambiar su auto entregándolo como parte de pago')}."),
            ("¿Los precios en Ibarra son más bajos que en Quito?",
             "Depende de la unidad. Más que el precio de lista, compare el paquete "
             "completo: papeles verificados, revisión hecha y garantía comercial. Un auto "
             "algo más barato sin respaldo puede salir más caro a los tres meses."),
            ("¿Puedo llevar a mi mecánico?",
             "Sí, y lo recomendamos. Avísenos con tiempo para reservar el espacio y que "
             "pueda revisar la unidad con calma."),
        ]},

        cierre("Hola, estoy en Quito y quiero coordinar una visita a OKCars en Ibarra.",
               "Si está en Quito y quiere organizar la visita, escríbanos al"),
    ],
}


if __name__ == "__main__":
    for s in [seltos_territory, automatico_manual, cuatro_por_cuatro,
              desde_quito]:
        print(guarda(s))
