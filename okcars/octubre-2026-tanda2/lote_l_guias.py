#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote L — guías de compra con ángulo específico (5 posts, categoría 42).

El cluster «qué revisar en un auto usado» suma cientos de impresiones en posiciones
13 a 35 y ya lo cubren el checklist de 20 puntos y la revisión mecánica. Estos cinco
no los repiten: bajan a una pregunta concreta cada uno (choque, prueba de manejo,
precio, batería de un eléctrico, primer mantenimiento).

Escritos en USTED.
"""
from comun import (CAT, CHECKLIST, CITA, COSTO_MANTENER, DEVALUA, FECHAS, FICHA,
                   HIBRIDOS, KILOMETRAJE, MANTENIMIENTO, PAPELES, PATIO, POST_TANG,
                   REVISION, REVISION_TECNICA, cierre, enlace_ficha, fila_ficha, guarda,
                   link)


# ════════════════════════════════════════════════════════════════════════════
# 1 · Cómo saber si un auto fue chocado
# ════════════════════════════════════════════════════════════════════════════
chocado = {
    "title": "Cómo saber si un auto fue chocado: 9 señales que no se esconden",
    "slug": "como-saber-si-un-auto-fue-chocado",
    "date": FECHAS[2],
    "cat": CAT["guias"],
    "tags": ["auto chocado", "revisar auto usado", "comprar auto usado Ecuador",
             "inspección carrocería", "seminuevos Ibarra"],
    "excerpt": "Un choque bien reparado no es un problema. Uno mal reparado y escondido sí. "
               "Las señales que se revisan en diez minutos, sin herramientas, antes de "
               "pagar un solo dólar.",
    "yoast_title": "Cómo saber si un auto fue chocado: 9 señales",
    "yoast_desc": "Luz entre paneles, pintura en las gomas, pernos movidos y llantas "
                  "gastadas de un lado: lo que delata un choque y cuándo descartar el "
                  "auto de inmediato.",
    "focus_kw": "como saber si un auto fue chocado",
    "bloques": [
        "Casi ningún vendedor dice «este auto estuvo chocado». La mayoría no miente: "
        "simplemente no lo menciona, o lo describe como «un toponcito que se arregló». "
        "Y en muchos casos es verdad. Un golpe en el parachoques trasero, bien reparado, "
        "no le quita nada al vehículo.",

        "El problema son los otros: los choques que tocaron la estructura y se taparon "
        "con masilla y pintura. Esos autos tiran hacia un lado, gastan llantas, hacen "
        "ruidos que nadie encuentra y, sobre todo, ya no protegen igual en un segundo "
        "accidente. Lo bueno es que dejan huellas, y la mayoría se detectan a simple vista.",

        {"h2": "La respuesta corta: mire las uniones, no las superficies"},

        "Una puerta repintada puede quedar perfecta. Lo que casi nunca queda perfecto es "
        "el encuentro entre esa puerta y lo que la rodea. Por eso la regla es revisar "
        "bordes, uniones, gomas y pernos antes que la pintura en sí.",

        "Si encuentra una o dos señales aisladas en piezas exteriores, probablemente fue "
        "un golpe menor. Si encuentra varias concentradas en la parte delantera o en un "
        "costado, y además el auto tira hacia un lado, ahí hay un choque de los que "
        "importan.",

        {"h2": "Las nueve señales, de la más leve a la más grave"},

        {"tabla": [
            ["Señal", "Qué indica", "Gravedad"],
            ["Luz desigual entre capó y guardafangos", "Pieza desmontada o reemplazada",
             "Leve a media"],
            ["Tono de pintura distinto entre paneles vecinos", "Repintado parcial",
             "Leve"],
            ["Pintura sobre gomas, bisagras o plásticos", "Repintado sin desmontar",
             "Media"],
            ["Pernos de guardafangos con marcas de llave", "Pieza retirada o cambiada",
             "Media"],
            ["Faros de distinta marca o antigüedad", "Golpe frontal", "Media"],
            ["Soldaduras o pliegues en largueros", "Daño estructural", "Grave"],
            ["Desgaste de llantas solo en un borde", "Alineación que no corrige: "
             "posible chasis torcido", "Grave"],
            ["Testigo de airbag encendido o tapizado del tablero reemplazado",
             "Airbag que se activó", "Grave"],
            ["Óxido o humedad en el piso de la cajuela", "Golpe trasero mal sellado",
             "Media a grave"],
        ]},

        {"h2": "Cómo revisarlas en diez minutos"},

        "No necesita herramientas ni saber de mecánica. Necesita luz de día, un lugar "
        "plano y la paciencia de mirar el auto de cerca y de lejos.",

        {"ol": [
            "<strong>Mire el auto desde cada esquina, agachado</strong>, a la altura de "
            "la puerta. Los reflejos en la pintura revelan ondas de masilla que de frente "
            "pasan inadvertidas.",
            "<strong>Recorra con el dedo la luz entre capó y guardafangos</strong>, a "
            "ambos lados. Tiene que ser pareja. Si de un lado entra el dedo y del otro no, "
            "algo se movió.",
            "<strong>Abra cada puerta y mire las gomas</strong> y las bisagras. Una "
            "fábrica no pinta sobre la goma; un taller apurado sí.",
            "<strong>Levante el capó y mire los pernos</strong> que sujetan los "
            "guardafangos. Si tienen la pintura saltada o marcas de llave, alguien los "
            "sacó.",
            "<strong>Compare los faros</strong>. Si uno es más claro, más nuevo o de otra "
            "marca, hubo un golpe adelante.",
            "<strong>Abra la cajuela y levante la alfombra</strong>. Busque óxido, "
            "humedad o soldaduras que no parecen de fábrica.",
            "<strong>Agáchese frente a cada llanta delantera</strong> y compare el "
            "desgaste del borde interno contra el externo.",
        ]},

        "Estos pasos completan el bloque de carrocería del "
        f"{link(CHECKLIST, 'checklist de 20 puntos para revisar un auto usado')}. La "
        "estructura de abajo, en cambio, solo se ve bien con el auto levantado.",

        {"h2": "Lo que solo se ve en una fosa o un elevador"},

        "Los largueros son las vigas que corren por debajo del motor y sostienen todo el "
        "frente. Si un choque los dobló, se pueden enderezar, pero rara vez quedan como "
        "salieron de fábrica. Un mecánico con el auto en elevador ve soldaduras, "
        "pliegues y marcas de tiro de la bancada de enderezado en cinco minutos.",

        "Por eso, si las señales de arriba le dejan dudas, el siguiente paso no es "
        "negociar el precio sino pagar una "
        f"{link(REVISION, 'revisión mecánica antes de comprar')}. Cuesta mucho menos que "
        "una alineación que nunca termina de corregir.",

        {"quote": "Un golpe de parachoques bien reparado no debería asustarlo. Un larguero "
                  "soldado es otra historia: ahí ya no se habla de estética sino de cómo "
                  "se comporta el auto en el próximo choque.",
         "cite": CITA},

        {"h2": "Cuándo un choque reparado no es motivo para descartar"},

        "No todo auto con pintura repetida es un mal negocio. Un auto que circuló años "
        "por Ibarra y Otavalo acumula raspones de parqueadero, golpes de puerta y algún "
        "toque en un retorno de la Panamericana. Repintar eso es mantenimiento, no "
        "ocultamiento.",

        "La línea está en la estructura y en los sistemas de seguridad. Si el daño fue "
        "en piezas que se atornillan (parachoques, guardafangos, puertas, capó) y la "
        "reparación está bien hecha, el auto puede ser una buena compra, incluso con un "
        "descuento razonable por el historial. Si tocó largueros, pilares o airbags, "
        "nuestra recomendación es buscar otro.",

        {"h2": "Un detalle que casi nadie mira: los vidrios"},

        "Cada vidrio de fábrica lleva impresa una marca con el logotipo del fabricante "
        "y, en muchos modelos, el año de producción. Si todos los vidrios coinciden y "
        "uno no, ese vidrio se cambió. Puede ser por una piedra en la Panamericana, que "
        "es frecuente, o por un golpe lateral. Sumado a otras señales en el mismo "
        "costado, ayuda a reconstruir lo que pasó.",

        {"h2": "El papel también delata"},

        "Hay choques que no dejan marca visible pero sí rastro en documentos. Pregunte "
        "si el auto tuvo un siniestro reportado al seguro, pida las facturas de "
        "reparación si existen y revise si la revisión técnica tiene observaciones "
        "previas. Lo que debe pedir antes de pagar está en "
        f"{link(PAPELES, 'qué papeles revisar antes de comprar un auto usado')}.",

        "Un vendedor que reconoce el golpe, muestra la factura del taller y explica qué "
        "se cambió suele ser más confiable que uno que jura que el auto nunca tuvo un "
        "rasguño.",

        {"h2": "Regla práctica para el día de la visita"},

        {"ul": [
            "Una señal leve y aislada: anótela y siga revisando.",
            "Varias señales en la misma zona: pida la historia del golpe y las facturas.",
            "Cualquier señal grave: no compre sin revisión en elevador.",
            "Airbag activado o largueros soldados: busque otra unidad.",
        ]},

        {"faq": [
            ("¿Un auto chocado pierde mucho valor?",
             "Depende de dónde fue el golpe. Un choque en piezas exteriores bien reparado "
             "afecta poco el precio. Uno estructural lo baja bastante y además complica "
             "la reventa, porque el siguiente comprador también lo va a detectar."),
            ("¿La pintura repetida siempre significa choque?",
             "No. Muchos autos se repintan por raspones, sol o granizo. Lo que conviene "
             "mirar es si el repintado coincide con piezas desmontadas, pernos movidos o "
             "luces desiguales entre paneles."),
            ("¿Puedo saber si el auto tuvo un siniestro con el seguro?",
             "Puede preguntarlo y pedir los documentos de la reparación. No existe una "
             "consulta pública única de siniestros, así que la revisión física sigue "
             "siendo la prueba más confiable."),
            ("¿Qué pasa si descubro el choque después de comprar?",
             "Con un particular, el reclamo es difícil y depende de lo que diga el "
             "contrato. En un patio con garantía comercial hay un responsable "
             "identificable. Por eso la revisión va antes del pago, no después."),
            ("¿Cuánto toma revisar un auto por choques?",
             "La revisión visual toma unos diez minutos. La revisión con el auto en "
             "elevador, que es la que confirma la estructura, la hace un mecánico en "
             "menos de una hora."),
        ]},

        cierre("Hola, quiero revisar un auto usado en OKCars antes de comprar."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Prueba de manejo
# ════════════════════════════════════════════════════════════════════════════
prueba = {
    "title": "Prueba de manejo de un auto usado: qué observar en 20 minutos",
    "slug": "prueba-de-manejo-auto-usado-que-observar",
    "date": FECHAS[6],
    "cat": CAT["guias"],
    "tags": ["prueba de manejo", "test drive auto usado", "revisar auto usado",
             "comprar auto usado Ibarra", "chequeo pre compra"],
    "excerpt": "Una vuelta a la manzana no sirve para nada. Cómo armar una prueba de "
               "manejo de veinte minutos que combine ciudad, subida y carretera, y qué "
               "escuchar en cada tramo.",
    "yoast_title": "Prueba de manejo de un auto usado: qué observar",
    "yoast_desc": "Arranque en frío, frenos, caja, dirección y ruidos: el recorrido de "
                  "veinte minutos que revela lo que el vendedor no menciona y lo que "
                  "conviene anotar.",
    "focus_kw": "prueba de manejo auto usado",
    "bloques": [
        "La prueba de manejo es el momento en que más se decide y menos se observa. El "
        "auto está limpio, el vendedor conversa, la radio está prendida y la vuelta dura "
        "cinco minutos por calles planas. Uno se baja con una impresión, no con "
        "información.",

        "Bien hecha, en cambio, es la revisión más barata que existe: veinte minutos que "
        "detectan problemas de motor, caja, frenos y suspensión que no aparecen en las "
        "fotos ni en la ficha. Así se organiza.",

        {"h2": "Lo esencial: arranque en frío, radio apagada y tres tipos de vía"},

        "Si solo recuerda tres cosas, que sean estas. Pida que el motor no se encienda "
        "antes de que usted llegue. Apague la radio y el aire durante la primera parte. "
        "Y maneje por ciudad, por una subida y por un tramo donde pueda llegar a "
        "velocidad de carretera. Cada tipo de vía revela fallas distintas.",

        {"h2": "Antes de arrancar: el motor tiene que estar frío"},

        "Un motor caliente esconde mucho. Arranca fácil, no hace humo y los ruidos de "
        "válvulas se calman. Por eso, al coordinar la visita, pida expresamente que no "
        "lo enciendan antes. Si al llegar el capó está tibio, pregunte por qué.",

        "En el arranque en frío fíjese en tres detalles: que encienda al primer intento, "
        "que el escape no bote humo azul (aceite) ni blanco espeso que persista "
        "(refrigerante), y que el ralentí se estabilice en menos de un minuto.",

        {"h2": "El recorrido, tramo por tramo"},

        "En Ibarra se puede armar un recorrido completo sin salir de la ciudad: calles "
        "con semáforos y adoquín en el centro, alguna de las subidas hacia los barrios "
        "altos o hacia Yahuarcocha, y un tramo de la Panamericana para probar velocidad.",

        {"tabla": [
            ["Tramo", "Qué probar", "Qué es mala señal"],
            ["Ciudad con semáforos", "Arranques, cambios bajos, frenadas suaves",
             "Tirones, cambios bruscos, freno que vibra"],
            ["Adoquín o calle irregular", "Suspensión y carrocería",
             "Golpes secos, crujidos, volante que se sacude"],
            ["Subida", "Fuerza del motor y caja bajo carga",
             "El motor se ahoga, la caja patina o sube de revoluciones sin avanzar"],
            ["Carretera", "Estabilidad, ruido, dirección",
             "Tira hacia un lado, zumbido que crece con la velocidad"],
            ["Parqueo", "Giro completo de volante en ambos sentidos",
             "Chasquidos al girar: juntas homocinéticas gastadas"],
        ]},

        {"h2": "Qué hacer en cada tramo"},

        {"ol": [
            "<strong>Primeros minutos con radio y aire apagados.</strong> Escuche el "
            "motor y la suspensión sin ruido de fondo.",
            "<strong>Frene firme una vez, en recta y sin tráfico detrás.</strong> El auto "
            "tiene que detenerse derecho, sin que el volante vibre ni se vaya hacia un "
            "lado.",
            "<strong>En la subida, deténgase y arranque de nuevo.</strong> En un manual "
            "revela un embrague cansado; en un automático, una caja que patina.",
            "<strong>En carretera suelte el volante un instante</strong>, con cuidado. Si "
            "el auto se va hacia un lado en vía recta, hay un problema de alineación o "
            "algo más serio.",
            "<strong>Encienda el aire acondicionado al final.</strong> Tiene que enfriar "
            "en un par de minutos, y el motor no debe perder fuerza de forma notoria.",
            "<strong>Al volver, deje el motor encendido y mire debajo.</strong> Una gota "
            "de agua del aire es normal; aceite o líquido de color, no.",
        ]},

        {"quote": "Una vuelta a la manzana no le dice casi nada de un auto. Pida subir un poco "
                  "y salir a la Panamericana: un auto que está bien no tiene nada que "
                  "esconder en una subida.",
         "cite": CITA},

        {"h2": "Lo que el tablero le está diciendo"},

        "Al dar contacto, todas las luces del tablero tienen que encenderse un segundo y "
        "apagarse al arrancar. Si la luz del motor, del ABS o del airbag nunca se "
        "enciende, alguien pudo haberla desconectado para ocultar una falla. Si queda "
        "encendida, la falla está ahí.",

        "Revise también que el kilometraje del tablero tenga sentido con el desgaste de "
        f"volante, pedales y asiento. Cómo leer esa cifra está en "
        f"{link(KILOMETRAJE, 'cuánto kilometraje es mucho en un auto usado')}.",

        {"h2": "Cuándo la prueba de manejo no alcanza"},

        "Una buena prueba descarta muchos autos, pero no confirma que uno esté sano. Hay "
        "fallas que no se sienten en veinte minutos: un desgaste interno de caja que "
        "aparece con el uso, una fuga lenta, un problema eléctrico intermitente. Si el "
        "auto le gustó y el precio es importante para usted, el paso siguiente es la "
        f"{link(REVISION, 'revisión mecánica antes de comprar')}, con escáner y elevador.",

        "Y si va a usar el auto sobre todo en carretera, por ejemplo entre Ibarra y "
        "Cayambe o hacia Tulcán todos los días, dedique más tiempo al tramo rápido que a "
        "la ciudad. Es donde va a pasar la mayor parte de su vida útil.",

        {"h2": "Manual o automático: lo que cambia en la prueba"},

        "En un auto manual, preste atención al punto en que agarra el embrague. Si "
        "engancha casi al final del recorrido del pedal, está gastado. Pruebe también "
        "pasar todos los cambios, incluida la reversa, sin que raspen.",

        "En un automático, lo importante es la suavidad. Los cambios tienen que pasar "
        "sin golpes, tanto al acelerar como al bajar la velocidad. Al poner la reversa "
        "desde el parqueo, el auto no debería dar un tirón seco. Un automático que "
        "duda o golpea puede necesitar una reparación costosa.",

        {"h2": "Una hoja de notas para no olvidar nada"},

        {"ul": [
            "¿Arrancó en frío al primer intento y sin humo?",
            "¿Frenó derecho y sin vibraciones?",
            "¿Subió sin que la caja patine?",
            "¿Se mantuvo recto en carretera?",
            "¿Las luces del tablero se encendieron y apagaron como deben?",
            "¿El aire enfrió?",
            "¿Había manchas debajo al volver?",
        ]},

        "Llévela impresa o en el celular y llénela durante la prueba, no después. "
        "Con varios autos vistos en un mismo día, la memoria mezcla los detalles.",

        "Si alguna respuesta es «no», no significa descartar: significa preguntar y, si "
        "hace falta, pedir que un mecánico lo confirme.",

        {"faq": [
            ("¿Cuánto debe durar una prueba de manejo?",
             "Entre quince y veinte minutos es suficiente si el recorrido incluye ciudad, "
             "una subida y un tramo de carretera. Una vuelta corta por calles planas no "
             "revela casi nada."),
            ("¿Puedo pedir que el auto esté frío?",
             "Sí, y conviene hacerlo al coordinar la visita. Un motor ya caliente oculta "
             "problemas de arranque, humo y ruidos de válvulas."),
            ("¿Qué hago si el vendedor no me deja manejar?",
             "Es una señal a tomar en cuenta. Puede haber razones de seguro, pero un "
             "vendedor serio busca la forma de que usted pruebe el auto, aunque sea "
             "acompañado."),
            ("¿Necesito licencia para la prueba de manejo?",
             "Sí. Lleve su licencia vigente y su cédula; cualquier vendedor responsable "
             "las va a pedir antes de entregarle la llave."),
            ("¿Puedo llevar a mi mecánico a la prueba?",
             "Sí, y es una buena idea. Un mecánico detecta en la prueba ruidos y "
             "comportamientos que a usted se le pueden pasar."),
        ]},

        cierre("Hola, quiero agendar una prueba de manejo en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Precio justo
# ════════════════════════════════════════════════════════════════════════════
precio = {
    "title": "Cuánto pagar por un auto usado: cómo saber si el precio es justo",
    "slug": "precio-justo-auto-usado-como-saberlo",
    "date": FECHAS[10],
    "cat": CAT["guias"],
    "tags": ["precio auto usado", "cuánto pagar auto usado", "comprar auto usado Ecuador",
             "negociar precio auto", "seminuevos Imbabura"],
    "excerpt": "No hay una tabla oficial de precios de autos usados en Ecuador. Hay un "
               "método para comparar publicaciones, ajustar por kilometraje y estado, y "
               "detectar el precio que es demasiado bueno.",
    "yoast_title": "Cuánto pagar por un auto usado: método en 5 pasos",
    "yoast_desc": "Cómo comparar publicaciones del mismo modelo, ajustar por kilometraje, "
                  "mantenimiento y papeles, y por qué un precio muy bajo preocupa más "
                  "que uno alto.",
    "focus_kw": "cuanto pagar por un auto usado",
    "bloques": [
        "La pregunta que más escuchamos antes de una compra no es «qué auto me "
        "conviene», sino «¿está bien ese precio?». Y tiene sentido: es mucho dinero y "
        "nadie quiere sentir que pagó de más.",

        "En Ecuador no existe una tabla oficial que diga cuánto vale un auto usado. Lo "
        "que sí existe es el mercado, y con un poco de método se puede leer bastante "
        "bien. Aquí va el proceso que usamos nosotros para fijar precios, explicado para "
        "que usted lo aplique a cualquier auto, lo compre donde lo compre.",

        {"h2": "La respuesta: el precio justo es un rango, no un número"},

        "Para el mismo modelo, año y versión, el mercado se mueve en un rango. Lo que "
        "ubica a un auto arriba o abajo de ese rango es su kilometraje, su estado, su "
        "historial de mantenimiento y la limpieza de sus papeles. Un precio justo es el "
        "que corresponde a dónde cae ese auto dentro del rango, no el más bajo que "
        "encontró.",

        {"h2": "Paso a paso para armar el rango"},

        {"ol": [
            "<strong>Busque al menos cinco publicaciones</strong> del mismo modelo, con "
            "un año de diferencia como máximo hacia arriba o hacia abajo.",
            "<strong>Descarte las de versión distinta.</strong> Un automático contra un "
            "manual, o un 4x4 contra un 4x2, no se comparan.",
            "<strong>Ordénelas por kilometraje</strong>, no por precio. La relación entre "
            "las dos cifras dice más que cualquiera por separado.",
            "<strong>Quite la más cara y la más barata.</strong> Los extremos suelen ser "
            "un vendedor que pide de más o un auto con algún problema.",
            "<strong>Lo que queda es su rango.</strong> Ubique el auto que le interesa "
            "dentro de él según los ajustes de la tabla siguiente.",
        ]},

        "Guarde capturas de cada publicación con la fecha. Los anuncios se editan o se "
        "borran, y tener el registro le permite volver a la comparación cuando llegue el "
        "momento de negociar.",

        "En Imbabura conviene ampliar la búsqueda a Quito. El mercado de la capital es "
        "más grande y da una referencia más estable, aunque después compre en Ibarra u "
        "Otavalo.",

        {"h2": "Qué sube y qué baja un precio dentro del rango"},

        {"tabla": [
            ["Factor", "Sube el precio", "Baja el precio"],
            ["Kilometraje", "Por debajo del promedio para su año",
             "Muy por encima del promedio"],
            ["Mantenimiento", "Historial completo con facturas", "Sin registro alguno"],
            ["Dueños", "Uno o dos, identificables", "Muchos, o cadena sin registrar"],
            ["Papeles", "Matrícula al día, sin multas ni gravámenes",
             "Multas, prenda o traspasos pendientes"],
            ["Estado", "Sin choques estructurales, llantas en buen estado",
             "Choques, llantas y batería por cambiar"],
            ["Garantía", "Con garantía comercial", "Venta «tal como está»"],
        ]},

        "Las llantas y la batería merecen una nota aparte. Si el auto necesita las "
        "cuatro llantas y una batería nueva, ese gasto es parte del precio real aunque "
        "no aparezca en el anuncio.",

        {"h2": "El precio publicado no es el precio final"},

        "Al comparar, sume lo que el anuncio no dice. El traspaso, las multas "
        "pendientes, la matrícula del año si no está pagada y cualquier arreglo "
        "inmediato forman parte de lo que el auto le va a costar. Dos autos con el mismo "
        "precio publicado pueden terminar separados por varios cientos de dólares cuando "
        "se suman esos rubros.",

        "La forma práctica de hacerlo es pedir a cada vendedor la misma información: "
        "estado de la matrícula, multas por placa, gravámenes y quién asume el "
        "traspaso. Con eso en una hoja, la comparación deja de ser entre anuncios y "
        "pasa a ser entre costos reales.",

        {"h2": "Por qué el precio muy bajo debería preocuparle"},

        "Un auto que está claramente por debajo de su rango casi siempre tiene una "
        "explicación, y rara vez es la generosidad del vendedor. Las más comunes:",

        {"ul": [
            "Una prenda o un crédito vigente que impide el traspaso.",
            "Multas acumuladas que el comprador termina pagando.",
            "Un choque estructural mal reparado.",
            "Kilometraje alterado.",
            "Necesidad urgente de vender, que sí existe pero es la excepción.",
        ]},

        "Una ganga publicada en un grupo de Imbabura con fotos de otro lugar, un "
        "vendedor que solo acepta verse en un parqueadero y que pide un anticipo para "
        "«separar» el auto reúne las señales más repetidas de estafa. Ahí no se negocia.",

        "Antes de entusiasmarse con una ganga, revise los papeles con la guía de "
        f"{link(PAPELES, 'qué documentos pedir antes de comprar')}. Si todo está limpio "
        "y el vendedor explica el apuro, puede ser una oportunidad real.",

        {"quote": "Cuando un cliente nos muestra una publicación mucho más barata que "
                  "nuestro precio, le pedimos que la revise con calma. A veces es un buen "
                  "negocio y se lo decimos. Muchas otras veces, al mirar los papeles, "
                  "aparece la razón.",
         "cite": CITA},

        {"h2": "Patio o particular: la diferencia que se paga"},

        "Un mismo auto suele costar algo más en un patio formal que con un particular. "
        "Esa diferencia no es margen gratuito: cubre papeles verificados, revisión "
        "técnica, arreglos ya hechos y garantía. Si usted tiene tiempo y criterio para "
        "hacer todo eso por su cuenta, comprar a un particular puede salir mejor. Lo "
        f"comparamos en detalle en {link(PATIO, 'comprar en patio o a un particular')}.",

        "Como referencia de rango dentro de nuestro propio inventario:",

        {"tabla": [
            ["Vehículo", "Año", "Kilometraje", "Precio"],
            fila_ficha("koleos"),
            fila_ficha("tucson"),
            fila_ficha("prius"),
            fila_ficha("cx5"),
        ]},

        f"Del {enlace_ficha('koleos', 'Koleos')} a la {enlace_ficha('cx5', 'CX-5')} hay "
        "casi veinte años de diferencia de modelo y el precio lo refleja. El inventario "
        "cambia seguido, así que conviene mirarlo el mismo día.",

        {"h2": "Cuándo no vale la pena pelear el precio"},

        "Si el auto está bien ubicado en su rango, tiene papeles limpios y un historial "
        "claro, discutir cien o doscientos dólares puede costarle la unidad. En autos "
        "que se venden rápido en el norte del país, como las SUV medianas, el que duda "
        "suele perderla.",

        "Recuerde también que el precio de compra es solo una parte. Un auto que se "
        f"{link(DEVALUA, 'devalúa más lento')} o que gasta menos en mantenimiento puede "
        "ser más barato en cinco años aunque cueste más hoy.",

        {"faq": [
            ("¿Existe una tabla oficial de precios de autos usados en Ecuador?",
             "No hay una tabla pública de referencia para compraventa entre particulares. "
             "Lo práctico es comparar publicaciones del mismo modelo, año y versión, y "
             "ajustar por kilometraje y estado."),
            ("¿Cuántas publicaciones necesito comparar?",
             "Con cinco o más del mismo modelo y año cercano ya tiene un rango útil. "
             "Descarte siempre la más cara y la más barata."),
            ("¿Cuánto se puede negociar en un auto usado?",
             "Depende de dónde esté el auto dentro de su rango. Si está alto, hay margen. "
             "Si ya está bien ubicado, conviene negociar condiciones como traspaso o "
             "mantenimiento antes que el precio."),
            ("¿Un precio muy bajo siempre es mala señal?",
             "No siempre, pero casi siempre tiene una explicación. Revise prenda, multas "
             "y estructura antes de pagar."),
            ("¿Sirve comparar con precios de Quito?",
             "Sí. Quito tiene más oferta y da una referencia más estable. Las diferencias "
             "con Ibarra suelen ser pequeñas en modelos comunes."),
        ]},

        cierre("Hola, quiero saber si el precio de un auto usado está bien."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Auto eléctrico usado: la batería
# ════════════════════════════════════════════════════════════════════════════
_t_url, _t_nom, _t_anio, _t_km, _t_precio = FICHA["tang"]

electrico = {
    "title": "Auto eléctrico usado: cómo revisar la batería antes de comprar",
    "slug": "auto-electrico-usado-revisar-bateria",
    "date": FECHAS[14],
    "cat": CAT["guias"],
    "tags": ["auto eléctrico usado", "batería auto eléctrico", "BYD Tang",
             "eléctricos Ecuador", "seminuevos Ibarra"],
    "excerpt": "En un eléctrico usado, la batería es casi todo. Qué es el estado de salud, "
               "cómo comparar la autonomía real con la anunciada y qué preguntar sobre la "
               "garantía antes de pagar.",
    "yoast_title": "Auto eléctrico usado: cómo revisar la batería",
    "yoast_desc": "Estado de salud, autonomía real, historial de carga rápida y garantía "
                  "del fabricante: lo que define si un eléctrico usado es buena compra en "
                  "la Sierra norte.",
    "focus_kw": "auto electrico usado bateria",
    "bloques": [
        "Con un auto a gasolina usado uno revisa motor, caja, frenos y suspensión. Con "
        "un eléctrico, buena parte de esa lista desaparece: no hay cambios de aceite, "
        "no hay embrague, los frenos se gastan menos. Lo que queda concentra casi todo el "
        "valor del vehículo, y es la batería.",

        "Por eso comprar un eléctrico usado se parece menos a revisar un auto y más a "
        "revisar un componente. Si la batería está sana, el resto del auto suele estar "
        "bien. Si está degradada, ningún buen estado del interior compensa.",

        {"h2": "Lo primero: pida el estado de salud de la batería"},

        "El estado de salud, que en las fichas técnicas aparece como SOH, es el "
        "porcentaje de capacidad que la batería conserva frente a cuando era nueva. Una "
        "batería con 100 % retiene toda su capacidad original; con el uso, esa cifra "
        "baja de forma gradual.",

        "Ese dato se obtiene con un escáner de diagnóstico o desde el concesionario de "
        "la marca. Es la cifra más importante de toda la compra. Si el vendedor no puede "
        "o no quiere mostrarla, tómelo en cuenta antes de seguir.",

        {"h2": "Qué revisar, en orden"},

        {"ol": [
            "<strong>Estado de salud de la batería</strong> por diagnóstico, no por "
            "estimación del vendedor.",
            "<strong>Autonomía que muestra el auto con carga completa.</strong> Compárela "
            "con la que anunciaba el fabricante para esa versión.",
            "<strong>Historial de carga.</strong> Pregunte si se cargaba sobre todo en "
            "casa o en cargadores rápidos de carretera.",
            "<strong>Garantía de la batería.</strong> Confirme con la marca si sigue "
            "vigente y si se transfiere al nuevo dueño.",
            "<strong>Registros de servicio</strong> en el concesionario oficial, "
            "incluidas actualizaciones de software.",
            "<strong>Cargador y cables.</strong> Que vengan con el auto y funcionen.",
        ]},

        {"h2": "Autonomía real contra autonomía anunciada"},

        "La cifra que publica el fabricante se mide en condiciones de prueba. En la "
        "práctica, la autonomía cambia con la velocidad, la temperatura, el uso del aire "
        "y, en la Sierra, con la geografía.",

        "En el norte del país eso pesa. Una ruta de Ibarra a Quito sube y baja varias "
        "veces, y las subidas consumen más que el plano. A cambio, las bajadas "
        "recuperan energía con el frenado regenerativo, algo que un auto a gasolina "
        "desperdicia. La única forma honesta de saber cómo rinde un eléctrico en su "
        "recorrido es probarlo en ese recorrido.",

        {"tabla": [
            ["Factor", "Efecto en la autonomía"],
            ["Velocidad alta sostenida", "La reduce de forma notoria"],
            ["Subidas largas", "La reducen"],
            ["Bajadas", "Recuperan parte por frenado regenerativo"],
            ["Aire acondicionado o calefacción", "La reducen un poco"],
            ["Batería con menor estado de salud", "La reduce de forma permanente"],
        ]},

        {"h2": "Lo que sí se gasta en un eléctrico y conviene revisar"},

        "Que no haya cambios de aceite no significa que no haya nada que revisar. Un "
        "eléctrico suele pesar más que un auto a gasolina de su tamaño, por el peso de "
        "la batería. Eso se nota en llantas y en suspensión, que trabajan más.",

        {"ul": [
            "<strong>Llantas:</strong> revise el desgaste; el par instantáneo de un "
            "eléctrico las gasta más rápido si el dueño anterior aceleraba fuerte.",
            "<strong>Suspensión:</strong> en adoquín, escuche golpes secos y crujidos.",
            "<strong>Batería auxiliar de 12 voltios:</strong> la tienen casi todos los "
            "eléctricos y, si falla, el auto no enciende aunque la batería principal "
            "esté cargada.",
            "<strong>Sistema de climatización:</strong> también cuida la temperatura de "
            "la batería en muchos modelos.",
        ]},

        {"h2": "Un caso real del inventario"},

        f"En el patio de Ibarra tenemos un {link(_t_url, f'{_t_nom} {_t_anio}')} con "
        f"{_t_km} km, en {_t_precio}. Es un SUV eléctrico de siete plazas y tracción "
        "4x4, de los pocos de su tipo en el mercado de seminuevos del norte del Ecuador.",

        "Con un auto así, las preguntas de esta guía son exactamente las que hay que "
        "hacer, y las respondemos con la unidad delante. Si quiere conocer el modelo en "
        f"detalle, lo analizamos en {link(POST_TANG, 'el BYD Tang usado en Ecuador')}.",

        {"quote": "Con un eléctrico, el cliente pregunta primero por la autonomía. "
                  "Nosotros le pedimos que pregunte primero por la batería. La autonomía "
                  "es consecuencia; la batería es la causa.",
         "cite": CITA},

        {"h2": "Cargar en casa en Ibarra"},

        "Antes de comprar, piense dónde va a cargar. Para la mayoría de usuarios la "
        "carga ocurre en casa, durante la noche. Eso exige un punto de conexión "
        "adecuado, y en muchos casos conviene que un electricista revise la instalación "
        "antes de conectar el cargador del auto.",

        "Un detalle práctico: el costo de cargar en casa depende de la tarifa eléctrica "
        "de su vivienda y del consumo del modelo. Antes de comprar, pida al vendedor que "
        "le muestre en la pantalla del auto el consumo promedio registrado; con ese dato "
        "y su planilla de luz puede estimar el gasto mensual con bastante precisión.",

        "Para viajes largos, la red de carga pública en el país todavía es más "
        "limitada que la de gasolineras. Si su uso es ir y volver de Ibarra a Otavalo o "
        "Cotacachi, la carga en casa alcanza de sobra. Si viaja seguido a Tulcán o más "
        "lejos, planifique dónde va a cargar antes de salir.",

        {"h2": "Preguntas para hacerle al vendedor"},

        "Además de los datos técnicos, la conversación con el vendedor dice mucho. "
        "Estas preguntas ordenan la visita:",

        {"ol": [
            "¿Dónde cargaba el auto la mayor parte del tiempo?",
            "¿Con qué frecuencia lo dejaba al 100 % o lo dejaba bajar casi a cero?",
            "¿Tuvo alguna alerta de batería o del sistema eléctrico?",
            "¿Se hicieron los mantenimientos en el concesionario de la marca?",
            "¿Tiene el reporte de estado de salud de la batería?",
        ]},

        {"h2": "Cuándo un eléctrico usado no le conviene"},

        "Si no tiene dónde cargar en casa o en el trabajo, cualquier eléctrico se vuelve "
        "incómodo. Tampoco conviene si recorre a diario distancias largas por zonas sin "
        "cargadores. En esos casos, un híbrido puede darle buena parte del ahorro sin "
        f"depender de enchufes. Lo explicamos en {link(HIBRIDOS, 'autos híbridos usados en Ecuador')}.",

        {"faq": [
            ("¿Cuánto dura la batería de un auto eléctrico?",
             "Depende del fabricante, del uso y del tipo de carga. Lo que sí se puede "
             "medir es cuánto conserva hoy, con el estado de salud que entrega un "
             "diagnóstico. Esa es la cifra que importa al comprar."),
            ("¿La garantía de la batería pasa al nuevo dueño?",
             "En muchas marcas sí, pero depende de cada fabricante y de que el auto "
             "tenga sus mantenimientos al día. Confírmelo con el concesionario oficial "
             "antes de pagar."),
            ("¿La carga rápida daña la batería?",
             "Un uso frecuente de carga rápida puede acelerar el desgaste en algunos "
             "modelos. Por eso conviene preguntar cómo se cargaba el auto y mirar el "
             "estado de salud real."),
            ("¿Un eléctrico rinde bien en la Sierra?",
             "Las subidas consumen más, pero las bajadas recuperan energía con el "
             "frenado regenerativo. La forma de saberlo es probarlo en su propio "
             "recorrido."),
            ("¿Necesito instalar algo en casa para cargarlo?",
             "Necesita un punto de conexión adecuado. Conviene que un electricista "
             "revise la instalación antes de empezar a cargar a diario."),
        ]},

        cierre("Hola, quiero información sobre el BYD Tang eléctrico de OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Primer mantenimiento después de comprar
# ════════════════════════════════════════════════════════════════════════════
mantenimiento = {
    "title": "Primer mantenimiento después de comprar un auto usado",
    "slug": "primer-mantenimiento-despues-de-comprar-usado",
    "date": FECHAS[18],
    "cat": CAT["guias"],
    "tags": ["mantenimiento auto usado", "primer mantenimiento", "auto recién comprado",
             "historial de mantenimiento", "talleres Ibarra"],
    "excerpt": "Acaba de comprar un auto usado y no sabe cuándo fue su último cambio de "
               "aceite. Qué conviene hacer en el primer mes, en qué orden y cómo armar "
               "el historial desde cero.",
    "yoast_title": "Mantenimiento después de comprar un auto usado",
    "yoast_desc": "Aceite, filtros, frenos, refrigerante y distribución: qué revisar en el "
                  "primer mes, qué puede esperar y cómo empezar un historial que después "
                  "le sube el valor.",
    "focus_kw": "mantenimiento despues de comprar un auto usado",
    "bloques": [
        "Un auto usado llega con una historia que usted no vivió. A veces viene con "
        "facturas de cada servicio, ordenadas por fecha. Muchas otras viene con un "
        "sticker de cambio de aceite en el parabrisas y la palabra del dueño anterior.",

        "En ese segundo caso, la forma más tranquila de empezar es asumir que nada se "
        "hizo y poner el auto en cero. Cuesta un poco al principio y le ahorra "
        "sorpresas en carretera. Así se ordena ese primer mantenimiento.",

        {"h2": "La regla del primer mes: si no hay registro, se cambia"},

        "Si no puede comprobar con una factura cuándo se cambió un líquido o un filtro, "
        "trátelo como vencido. Aceite, filtros y líquido de frenos son baratos frente "
        "a lo que protegen. La banda de distribución es más cara, pero romperla cuesta "
        "mucho más.",

        {"h2": "Qué revisar, por prioridad"},

        {"tabla": [
            ["Elemento", "Prioridad", "Por qué"],
            ["Aceite y filtro de aceite", "Inmediata",
             "Es lo más barato y protege el motor"],
            ["Banda o cadena de distribución", "Inmediata si no hay registro",
             "Si se rompe, puede dañar el motor"],
            ["Líquido de frenos", "Primer mes", "Absorbe humedad con el tiempo"],
            ["Refrigerante", "Primer mes", "Evita recalentamientos en subidas"],
            ["Filtros de aire y de cabina", "Primer mes", "Baratos y fáciles de cambiar"],
            ["Llantas", "Primer mes", "Revisar profundidad, fecha y desgaste parejo"],
            ["Batería", "Primer mes", "Probar carga antes de que falle"],
            ["Alineación y balanceo", "Primer mes", "Evita gastar llantas nuevas"],
        ]},

        "El costo de cada rubro varía según el modelo y el taller. Lo que se mantiene "
        f"igual es el orden. Para tener una idea del gasto anual, revise "
        f"{link(COSTO_MANTENER, 'cuánto cuesta mantener un auto usado en Ecuador')}.",

        {"h2": "Señales en la primera semana que adelantan la visita al taller"},

        "Hay síntomas que no esperan al calendario. Si aparece alguno en los primeros "
        "días, adelante la revisión:",

        {"ul": [
            "La aguja de temperatura sube más de lo habitual en una subida.",
            "Una luz del tablero se enciende y no se apaga.",
            "El freno se siente esponjoso o el auto tira hacia un lado al frenar.",
            "Manchas en el piso del garaje después de una noche.",
            "Olor a quemado o a refrigerante al apagar el motor.",
        ]},

        "Ninguno de esos síntomas significa necesariamente una falla grave, pero todos "
        "son más baratos de atender temprano.",

        {"h2": "La banda de distribución merece una pregunta aparte"},

        "Muchos motores usan una banda dentada que sincroniza partes internas. Tiene un "
        "intervalo de cambio que fija el fabricante, en kilómetros o en años. Si se "
        "rompe con el motor en marcha, en varios modelos el daño es grave.",

        "Otros motores usan cadena, que dura mucho más y normalmente no se cambia por "
        "calendario. Antes de decidir, pregunte en el taller qué lleva su motor. Si "
        "lleva banda y no hay factura del último cambio, póngala al inicio de la lista.",

        {"h2": "Paso a paso para la primera visita al taller"},

        {"ol": [
            "<strong>Lleve todo lo que recibió:</strong> facturas, manual, stickers, "
            "incluso fotos del tablero con el kilometraje.",
            "<strong>Pida un diagnóstico con escáner</strong> para ver si hay códigos "
            "de falla guardados.",
            "<strong>Cambie aceite y filtros</strong> y anote el kilometraje.",
            "<strong>Pregunte por la distribución:</strong> banda o cadena, y cuándo "
            "corresponde.",
            "<strong>Revise frenos, llantas y batería</strong> con números, no con "
            "impresiones: milímetros de pastilla, profundidad de llanta, prueba de carga.",
            "<strong>Pida que todo quede en una factura detallada</strong> a nombre suyo.",
        ]},

        {"quote": "Los autos que salen del patio llevan la revisión hecha y los arreglos "
                  "ejecutados, pero igual recomendamos a cada cliente abrir su propia "
                  "carpeta de mantenimiento desde el primer mes. Es lo que más valor le "
                  "da al auto cuando lo vuelva a vender.",
         "cite": CITA},

        {"h2": "Llantas: tres datos que se leen sin herramientas"},

        "Las llantas son el único contacto del auto con la vía y suelen ser lo que más "
        "se descuida en un usado. Revise tres cosas. La profundidad del dibujo, con los "
        "indicadores de desgaste que traen entre los canales. La fecha de fabricación, "
        "impresa en el costado con cuatro dígitos: semana y año. Y el desgaste parejo "
        "entre el borde interno y el externo. Una llanta con buen dibujo pero muchos años "
        "puede estar endurecida y agarrar menos en lluvia, algo que en las vías de la "
        "Sierra se siente.",

        {"h2": "Cómo armar el historial desde cero"},

        "El historial de mantenimiento vale dinero al momento de vender. Un comprador "
        "paga más por un auto con facturas ordenadas que por el mismo auto sin papeles. "
        "Empezarlo es simple:",

        {"ul": [
            "Una carpeta física o una carpeta en el celular con foto de cada factura.",
            "Cada factura con fecha, kilometraje y detalle de lo que se hizo.",
            "Una hoja con los próximos cambios y a qué kilometraje tocan.",
        ]},

        "Ese registro también le sirve en la "
        f"{link(REVISION_TECNICA, 'revisión técnica vehicular')}: si sabe qué se cambió "
        "y cuándo, llega preparado.",

        {"h2": "El uso en la Sierra norte cambia el calendario"},

        "En Imbabura y Carchi los autos trabajan más que en una ciudad plana. Subidas "
        "largas hacia Yahuarcocha o en la vía a Tulcán exigen frenos y refrigerante; el "
        "adoquín de los centros históricos castiga la suspensión. Si su recorrido es "
        "así, revise frenos y suspensión con más frecuencia que lo que indica el manual "
        "para uso normal.",

        {"h2": "Taller de marca o taller de confianza"},

        "Para el primer mantenimiento no hace falta ir siempre al concesionario. Un "
        "taller independiente serio de Ibarra u Otavalo puede hacer aceite, filtros, "
        "frenos y distribución sin problema. El concesionario conviene cuando hay "
        "garantía de fábrica vigente, actualizaciones de software o fallas electrónicas "
        "que requieren su equipo de diagnóstico.",

        "Lo que no conviene es repartir el mantenimiento entre muchos talleres sin "
        "registro. Elija uno, pida facturas detalladas y vuelva al mismo: el mecánico "
        "que ya conoce su auto detecta antes lo que cambió.",

        {"h2": "Cuándo no hace falta empezar de cero"},

        "Si el auto viene con facturas completas de un taller identificable, no tiene "
        "sentido repetir lo que ya está hecho. En ese caso basta con revisar los "
        "elementos que vencen pronto y continuar el calendario. Por eso, al comparar "
        "autos, el historial es un factor de precio: le ahorra dinero en este primer "
        f"mes. Los modelos que menos piden en taller están en "
        f"{link(MANTENIMIENTO, 'autos usados con menos mantenimiento')}.",

        {"faq": [
            ("¿Debo cambiar el aceite apenas compro un auto usado?",
             "Si no hay una factura reciente que diga cuándo se cambió, sí. Es barato y "
             "le da un punto de partida claro para el calendario."),
            ("¿Cómo sé si mi auto tiene banda o cadena de distribución?",
             "Lo indica el manual del vehículo y lo confirma cualquier taller en minutos. "
             "Pregúntelo en la primera visita."),
            ("¿Cuánto cuesta el primer mantenimiento de un auto usado?",
             "Depende del modelo, del taller y de lo que haga falta. Aceite y filtros son "
             "lo más económico; la distribución es el rubro que más puede pesar si toca."),
            ("¿Vale la pena guardar las facturas de mantenimiento?",
             "Sí. Un historial ordenado sube el valor de reventa y le da tranquilidad al "
             "siguiente comprador."),
            ("¿Con qué frecuencia reviso frenos si manejo en la Sierra?",
             "Con más frecuencia que en una ciudad plana. Las subidas y bajadas largas "
             "gastan pastillas y exigen el líquido de frenos."),
        ]},

        cierre("Hola, compré un auto y quiero saber qué mantenimiento hacerle."),
    ],
}


if __name__ == "__main__":
    for s in [chocado, prueba, precio, electrico, mantenimiento]:
        print(guarda(s))
