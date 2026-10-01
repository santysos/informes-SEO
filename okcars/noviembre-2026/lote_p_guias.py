#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote P — guías de uso y compra (5 posts, categoría 42, tanda de noviembre 2026).

Sin consulta de Search Console detrás de cada uno: la demanda medible del sitio ya está
cubierta. Son temas estratégicos para un comprador de la Sierra norte: el motor en la
altura, el viaje de fin de año, el consumo real, las luces del tablero y el auto
familiar.

Escritos en USTED. Datos técnicos solo en términos generales; nada de cifras de
consumo, potencia o precios de combustible inventadas.
"""
from comun import (AUTO_MANUAL, CAT, CHECKLIST, CITA, FECHAS, FICHA, HIBRIDOS,
                   KILOMETRAJE, LLANTAS, M, PRIMER_MANT, PRUEBA_MANEJO, SEGURO_VIAJES,
                   SELTOS_TERRITORY, SUV_SEDAN, cierre, enlace_ficha, guarda, link)

MINIVAN = f"{M}/minivan-usada-ecuador-toyota-sienna/"


# ════════════════════════════════════════════════════════════════════════════
# 1 · Motor turbo o atmosférico en la altura
# ════════════════════════════════════════════════════════════════════════════
turbo = {
    "title": "Motor turbo en la altura: qué rinde mejor en la Sierra",
    "slug": "motor-turbo-o-atmosferico-altura",
    "date": FECHAS[2],
    "cat": CAT["guias"],
    "tags": ["motor turbo", "manejar en la altura", "autos usados Sierra",
             "comprar auto usado Ibarra", "mantenimiento turbo"],
    "excerpt": "A 2.200 metros un motor sin turbo respira menos aire y lo nota en cada "
               "subida. Qué cambia con un turbo, qué cuidados pide uno usado y cuándo no "
               "vale la pena pagarlo.",
    "yoast_title": "Motor turbo en la altura: ¿conviene en la Sierra?",
    "yoast_desc": "Por qué un motor atmosférico pierde fuerza en Ibarra o Quito, cuánto "
                  "compensa el turbo y qué revisar en un motor turbo usado antes de comprarlo.",
    "focus_kw": "motor turbo en la altura",
    "bloques": [
        "Quien se cambia de un auto de la Costa a uno que vive en la Sierra lo nota en la "
        "primera subida: el mismo modelo que en Guayaquil adelantaba sin esfuerzo, en la "
        "salida de Ibarra hacia Quito pide una marcha menos. No es el auto. Es el aire.",

        "Ibarra está a unos 2.200 metros sobre el nivel del mar y Quito a unos 2.800. A "
        "esa altura el aire tiene menos oxígeno, y un motor quema combustible con el "
        "oxígeno que logra meter. Esta guía explica qué cambia entre un motor con turbo y "
        "uno sin él, y qué revisar si va a comprar uno usado.",

        {"h2": "La respuesta corta: el turbo recupera lo que la altura quita"},

        "Un motor atmosférico, el que no tiene turbo, aspira el aire tal como viene. En la "
        "altura ese aire es menos denso y el motor entrega menos fuerza que la anunciada en "
        "la ficha, que se mide a nivel del mar. Un motor turbo usa los gases de escape "
        "para mover una turbina que empuja más aire dentro de los cilindros, y así "
        "compensa buena parte de esa pérdida.",

        "En la práctica, un turbo pequeño se siente en la Sierra como un motor más grande. "
        "Un atmosférico de cilindrada parecida se siente más lento en subidas y al "
        "adelantar. No es una diferencia dramática en ciudad; sí lo es con el auto cargado "
        "en la subida a El Ángel o en los tramos largos de la Panamericana.",

        {"tabla": [
            ["Situación", "Motor atmosférico", "Motor turbo"],
            ["Ciudad, tráfico de Ibarra", "Suficiente", "Suficiente"],
            ["Subidas largas con carga", "Pide bajar marcha", "Mantiene mejor el ritmo"],
            ["Adelantar en carretera", "Necesita más espacio", "Responde antes"],
            ["Mantenimiento", "Más simple", "Exige aceite correcto y a tiempo"],
            ["Reparación mayor", "Menos componentes", "El turbo es una pieza cara"],
        ]},

        {"h2": "Dos ejemplos del patio, al mismo precio"},

        f"En el inventario hay un caso que lo ilustra bien: la "
        f"{enlace_ficha('territory')} lleva un motor 1.5 turbo y el "
        f"{enlace_ficha('seltos')} un 1.6 sin turbo. Las dos cuestan "
        f"{FICHA['territory'][4]}. La comparación completa está en "
        f"{link(SELTOS_TERRITORY, 'Kia Seltos vs Ford Territory usados')}.",

        "La Territory tiene la ventaja en carretera y en altura. El Seltos tiene la "
        "ventaja de la sencillez: no hay turbo que cuidar, y para quien hace trayectos "
        "cortos dentro de la ciudad con arranques en frío eso cuenta.",

        {"h2": "Qué revisar en un auto turbo usado"},

        "El turbo gira a velocidades muy altas y vive lubricado por el aceite del motor. "
        "Casi todos los turbos que fallan lo hacen por aceite viejo, aceite equivocado o "
        "malos hábitos de manejo. Por eso en un usado la revisión empieza por los papeles:",

        {"ol": [
            "Pida las facturas de los cambios de aceite y compruebe que se hicieron a "
            "tiempo y con el aceite que pide el fabricante.",
            "Arranque el motor en frío y mire el escape: humo azulado persistente indica "
            "que el turbo o el motor están quemando aceite.",
            "En la prueba de manejo, acelere a fondo en una subida: la entrega de fuerza "
            "debe ser progresiva, sin tirones ni un silbido metálico fuerte.",
            "Revise que no haya aceite en las mangueras que salen del turbo; un poco de "
            "humedad aceitosa ahí es señal de desgaste de sellos.",
            "Pida un diagnóstico con escáner para ver si hay códigos guardados de presión "
            "de sobrealimentación.",
        ]},

        f"La ruta de prueba que recomendamos está en "
        f"{link(PRUEBA_MANEJO, 'prueba de manejo de un auto usado')}: incluya siempre una "
        "subida, porque es donde un turbo cansado se delata.",

        {"quote": "El turbo no perdona el descuido, pero tampoco hay que tenerle miedo. Con "
                  "las facturas del aceite en la mano, la mitad de la duda está resuelta.",
         "cite": CITA},

        {"h2": "Los hábitos que alargan la vida de un turbo"},

        {"ul": [
            "<strong>No exigirlo en frío.</strong> Los primeros minutos, con el aceite "
            "todavía espeso, conviene manejar suave.",
            "<strong>Dejarlo enfriar.</strong> Después de una subida larga o un tramo "
            "rápido, unos segundos en ralentí antes de apagar le hacen bien.",
            "<strong>Respetar el intervalo de aceite.</strong> En la Sierra, con subidas y "
            "tráfico, conviene no estirarlo.",
            "<strong>Usar el combustible que indica el manual.</strong> Algunos motores "
            "turbo piden un octanaje mayor; el manual lo dice.",
        ]},

        {"h2": "El caso de las camionetas diésel"},

        "En las camionetas de trabajo la conversación es distinta. La mayoría de motores "
        "diésel modernos usan turbo, así que la pregunta no suele ser turbo sí o no, sino "
        "cómo se cuidó. Un diésel turbo que tira carga en la Sierra trabaja mucho, y el "
        "historial de aceite y de filtros pesa todavía más que en un auto de ciudad.",

        "Al probar una camioneta diésel usada, preste atención al arranque en frío en la "
        "mañana, cuando el aire de Ibarra o de Tulcán está más frío: debe encender sin "
        "demorar y sin una nube de humo prolongada. Y en la subida, cargada si es posible, "
        "debe empujar sin tirones.",

        {"h2": "Cuándo no vale la pena pagar por el turbo"},

        "Si el auto va a pasar casi todo el tiempo en recorridos cortos dentro de Ibarra u "
        "Otavalo, sin carga y sin viajes frecuentes, el turbo aporta poco y suma un "
        "componente más que mantener. Un atmosférico bien cuidado cumple de sobra.",

        "Tampoco conviene un turbo usado sin historial de mantenimiento. La diferencia de "
        "precio con un atmosférico se puede ir entera en una reparación de turbo.",

        f"Si además duda entre caja automática y manual, en la altura también hay "
        f"matices: los explicamos en {link(AUTO_MANUAL, 'automático o manual usado')}.",

        {"h2": "La regla práctica"},

        "Si sube seguido a Quito, viaja cargado o maneja en carretera de montaña, un turbo "
        "con mantenimiento demostrable es una buena compra. Si su uso es urbano y corto, "
        "un atmosférico sencillo le va a dar menos preocupaciones. En los dos casos, lo "
        "que decide es el historial, no la ficha técnica.",

        {"faq": [
            ("¿Por qué mi auto pierde fuerza en la Sierra?",
             "Porque el aire en la altura tiene menos oxígeno y el motor quema menos "
             "combustible en cada ciclo. Los motores sin turbo lo notan más; los turbo "
             "compensan buena parte de esa pérdida."),
            ("¿Un motor turbo consume más?",
             "Depende de cómo se maneje. Con pie suave puede ser eficiente; exigido a "
             "fondo todo el tiempo, consume más. En subidas, un turbo pequeño suele "
             "trabajar con menos esfuerzo que un atmosférico que va al límite."),
            ("¿Cuánto dura un turbo?",
             "Con aceite correcto y cambios a tiempo, puede durar tanto como el motor. "
             "Los que fallan antes casi siempre tienen un historial de mantenimiento "
             "descuidado."),
            ("¿Cómo sé si el turbo de un usado está mal?",
             "Humo azulado al acelerar, falta de fuerza en subidas, silbido metálico "
             "fuerte o aceite en las mangueras del turbo. Un diagnóstico con escáner "
             "ayuda a confirmarlo."),
            ("¿Un auto sin turbo sirve para la Sierra?",
             "Sí. Miles de autos atmosféricos circulan sin problema en Ibarra y Quito. "
             "Simplemente se sienten más lentos en subidas largas y al adelantar."),
        ]},

        cierre("Hola, quiero comparar un auto turbo y uno sin turbo en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Revisar el auto antes de viajar en fin de año
# ════════════════════════════════════════════════════════════════════════════
viaje = {
    "title": "Revisar el carro antes de viajar: lista para fin de año",
    "slug": "revisar-auto-antes-de-viajar-fin-de-ano",
    "date": FECHAS[6],
    "cat": CAT["guias"],
    "tags": ["revisar carro antes de viajar", "viaje fin de año", "mantenimiento auto",
             "viajar a la Costa", "autos usados Imbabura"],
    "excerpt": "En diciembre medio Imbabura baja a la Costa. La revisión que conviene "
               "hacer dos semanas antes, lo que debe ir en la cajuela y los detalles del "
               "seguro que se olvidan hasta que hacen falta.",
    "yoast_title": "Revisar el carro antes de viajar: lista de fin de año",
    "yoast_desc": "Llantas, frenos, refrigerante, luces y batería: qué revisar dos semanas "
                  "antes de bajar a la Costa, qué llevar en la cajuela y qué mirar del seguro.",
    "focus_kw": "revisar el carro antes de viajar",
    "bloques": [
        "Entre Navidad y Año Nuevo, la Panamericana y las vías que bajan a la Costa se "
        "llenan de familias de Imbabura y Carchi rumbo a Esmeraldas, Atacames o la Costa "
        "por Santo Domingo. Es también la época en que más autos se quedan a un lado de "
        "la vía por fallas que se veían venir.",

        "Un viaje de la Sierra a la Costa es exigente para cualquier auto: bajadas largas "
        "que castigan los frenos, calor y humedad que exigen al sistema de enfriamiento, y "
        "lluvias que ponen a prueba llantas y plumas. Esta es la revisión que conviene "
        "hacer con tiempo.",

        {"h2": "La respuesta corta: revise con dos semanas de anticipación"},

        "No deje la revisión para el día anterior. Si aparece algo, como pastillas "
        "gastadas o una fuga de refrigerante, en diciembre los talleres de Ibarra están "
        "llenos y los repuestos pueden tardar. Dos semanas antes le da margen para "
        "arreglar con calma.",

        {"tabla": [
            ["Qué revisar", "Por qué importa en este viaje", "Señal de alerta"],
            ["Frenos", "Las bajadas a la Costa son largas y continuas",
             "Pedal esponjoso, ruido metálico, vibración al frenar"],
            ["Refrigerante", "El calor de la Costa exige al motor",
             "Nivel bajo, manchas bajo el auto, aguja de temperatura alta"],
            ["Llantas", "Lluvia y asfalto caliente", "Labrado bajo, grietas, desgaste disparejo"],
            ["Batería", "Más uso de aire acondicionado y luces",
             "Arranque lento, más de tres o cuatro años de uso"],
            ["Luces y plumas", "Lluvias fuertes y neblina en la bajada",
             "Focos quemados, plumas que dejan franjas"],
            ["Aceite", "Muchas horas de motor seguidas", "Nivel bajo o cambio vencido"],
        ]},

        {"h2": "Paso a paso, en el orden en que conviene hacerlo"},

        {"ol": [
            "Revise la fecha del último cambio de aceite y adelántelo si le toca en las "
            "próximas semanas.",
            "Pida una revisión de frenos: pastillas, discos y líquido. El líquido de "
            "frenos viejo pierde eficacia justo en bajadas largas.",
            "Revise el nivel de refrigerante con el motor frío y busque manchas debajo "
            "del auto después de dejarlo estacionado una noche.",
            "Mire las cuatro llantas y la de repuesto, incluida su presión y su fecha de "
            "fabricación.",
            "Pruebe todas las luces, incluidas las de freno y las direccionales, con "
            "ayuda de alguien que mire desde afuera.",
            "Cambie las plumas si dejan franjas: en la neblina de la bajada no hay margen.",
            "Haga una prueba de batería en cualquier lubricadora o taller eléctrico.",
        ]},

        f"Para las llantas hay una guía aparte con lo que dice la fecha y el desgaste: "
        f"{link(LLANTAS, 'llantas de un auto usado')}.",

        {"quote": "Las bajadas a la Costa se comen los frenos que en la ciudad parecían "
                  "estar bien. Revíselos aunque no hagan ruido: el viaje largo es el que "
                  "los pone a prueba.",
         "cite": CITA},

        {"h2": "Lo que debe ir en la cajuela"},

        {"ul": [
            "Llanta de repuesto inflada, gata y llave de ruedas que funcionen.",
            "Triángulos de seguridad y chaleco reflectivo.",
            "Cables para pasar corriente.",
            "Botiquín básico.",
            "Agua para tomar y, aparte, un galón de agua o refrigerante para el motor.",
            "Linterna con pilas cargadas.",
            "Una copia de la matrícula y los datos del seguro en papel, además del "
            "teléfono.",
        ]},

        {"h2": "Si viaja con el auto lleno"},

        "Un auto con cinco pasajeros, maletas y a veces un portaequipaje en el techo se "
        "comporta distinto al de todos los días: frena en más distancia, consume más y "
        "las llantas trabajan con más carga.",

        {"ul": [
            "<strong>Presión de llantas según la carga.</strong> La etiqueta en el marco "
            "de la puerta del conductor indica la presión recomendada, y muchas veces una "
            "distinta para el auto cargado.",
            "<strong>Lo pesado, abajo y adelante en la cajuela.</strong> Así el auto "
            "conserva mejor su estabilidad en las curvas de la bajada.",
            "<strong>Portaequipaje solo si hace falta.</strong> Sube el consumo y el "
            "viento lateral se nota más en carretera.",
            "<strong>Nada suelto en la cabina.</strong> En una frenada fuerte, un objeto "
            "suelto se convierte en un proyectil.",
        ]},

        "Y planifique paradas cada dos horas más o menos. El cansancio del conductor en "
        "el regreso nocturno a la Sierra es uno de los riesgos menos comentados de los "
        "feriados.",

        {"h2": "El seguro: dos detalles que se revisan antes de salir"},

        "Primero, confirme que la póliza esté vigente durante todas las fechas del viaje. "
        "Una renovación que vence el 28 de diciembre arruina unas vacaciones.",

        "Segundo, pregunte por el radio de la grúa. Muchas pólizas incluyen asistencia, "
        "pero algunas la limitan a la ciudad o a cierta distancia. En la vía a Esmeraldas "
        "o en los tramos con poca cobertura de celular, eso hace una diferencia enorme. "
        f"Lo ampliamos en {link(SEGURO_VIAJES, 'seguro y viajes interprovinciales')}.",

        {"h2": "La vuelta a la Sierra también cuenta"},

        "La revisión se piensa para la ida, pero el regreso suele ser más exigente: subir "
        "desde la Costa hasta Ibarra con el auto cargado obliga al motor a trabajar "
        "durante horas en subida. Antes de volver, mire otra vez el nivel de aceite y de "
        "refrigerante, y la presión de las llantas, que con el calor de la Costa pudo "
        "cambiar.",

        {"h2": "Cuándo es mejor no viajar en ese auto"},

        "Si el auto tiene una falla conocida sin resolver, como recalentamiento, frenos "
        "que se van o una luz de advertencia roja encendida, no es el momento de "
        "probarlo en carretera. Es preferible aplazar, alquilar o viajar en bus.",

        f"Si compró el auto hace poco y no conoce su historial, haga primero el "
        f"{link(PRIMER_MANT, 'primer mantenimiento después de comprar un usado')}: "
        "aceite, filtros, frenos y refrigerante. Es la base para viajar tranquilo.",

        {"h2": "Una costumbre para el camino"},

        "Durante el viaje, mire la aguja de temperatura cada tanto, sobre todo en las "
        "subidas de regreso a la Sierra con el auto cargado. Y en las bajadas largas use "
        "una marcha baja para que el motor ayude a frenar; los frenos se lo van a "
        "agradecer.",

        {"faq": [
            ("¿Con cuánta anticipación conviene revisar el auto antes de viajar?",
             "Unas dos semanas. Así hay margen para arreglar lo que aparezca sin depender "
             "de talleres llenos ni de repuestos que tardan en diciembre."),
            ("¿Qué es lo más importante para bajar de la Sierra a la Costa?",
             "Los frenos y el sistema de enfriamiento. Las bajadas largas castigan los "
             "frenos y el calor exige al motor."),
            ("¿Cómo evito que se calienten los frenos en la bajada?",
             "Use una marcha baja para que el motor retenga el auto y frene por tramos en "
             "lugar de mantener el pedal pisado todo el tiempo."),
            ("¿Qué documentos debo llevar?",
             "Licencia vigente, matrícula y los datos de su seguro con el número de "
             "asistencia. Conviene tener copias en papel además del teléfono."),
            ("¿El seguro me cubre en otra provincia?",
             "En general sí, pero revise el radio de la asistencia en carretera y que la "
             "póliza esté vigente en todas las fechas del viaje."),
        ]},

        cierre("Hola, quiero revisar un auto antes de viajar en fin de año.",
               "Si está pensando en cambiar de auto antes del viaje, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Consumo real de un auto usado
# ════════════════════════════════════════════════════════════════════════════
consumo = {
    "title": "Cuánto consume un auto usado: cómo medirlo de verdad",
    "slug": "consumo-real-auto-usado",
    "date": FECHAS[9],
    "cat": CAT["guias"],
    "tags": ["consumo de combustible", "kilómetros por galón", "auto usado",
             "ahorrar gasolina", "manejar en Ibarra"],
    "excerpt": "La ficha técnica dice una cosa y el surtidor otra. Cómo medir el consumo "
               "real con el método del tanque lleno, por qué cambia en la Sierra y qué "
               "consumo delata un problema en un usado.",
    "yoast_title": "Cuánto consume un auto usado: cómo medirlo de verdad",
    "yoast_desc": "El método del tanque lleno, paso a paso, por qué la altura y las "
                  "subidas cambian la cifra y qué consumo anormal delata una falla en un usado.",
    "focus_kw": "cuanto consume un auto usado",
    "bloques": [
        "Pregunte a cinco dueños del mismo modelo cuánto consume y obtendrá cinco "
        "respuestas distintas. No mienten: cada uno maneja por rutas distintas, con "
        "hábitos distintos, y casi ninguno lo midió con método.",

        "Esta guía explica cómo medir el consumo real de un auto, por qué en Ibarra la "
        "cifra suele ser distinta a la de la ficha técnica y qué consumo debería hacerle "
        "sospechar de un problema mecánico en un usado.",

        {"h2": "La respuesta corta: mídalo con el tanque lleno, no con el tablero"},

        "La forma más confiable es el método del tanque lleno. No depende de la "
        "computadora del auto, que puede estar descalibrada, y se hace con una libreta.",

        {"ol": [
            "Llene el tanque hasta que la pistola se dispare sola, sin redondear.",
            "Ponga en cero el contador parcial de kilómetros, o anote el kilometraje total.",
            "Maneje normalmente hasta que el tanque esté por la mitad o menos.",
            "Vuelva a llenar en la misma gasolinera, si es posible en el mismo surtidor, "
            "hasta que la pistola se dispare.",
            "Anote los galones que entraron y los kilómetros recorridos.",
            "Divida los kilómetros entre los galones: ese es su consumo real en kilómetros "
            "por galón.",
        ]},

        "Repítalo dos o tres veces con distintos tipos de recorrido y saque el promedio. "
        "Una sola medición puede engañar.",

        {"h2": "Un ejemplo de cálculo"},

        "Las cifras de este ejemplo son ilustrativas, solo para mostrar la cuenta:",

        {"tabla": [
            ["Dato", "Ejemplo"],
            ["Kilómetros recorridos entre llenadas", "320 km"],
            ["Galones que entraron en la segunda llenada", "8 galones"],
            ["Consumo real", "320 ÷ 8 = 40 km por galón"],
            ["Costo por kilómetro", "Precio del galón del día ÷ 40"],
        ]},

        "Con el costo por kilómetro puede calcular cuánto le cuesta su recorrido diario. "
        "Multiplique por los kilómetros de su rutina, por ejemplo Ibarra–Otavalo ida y "
        "vuelta, y por los días que maneja al mes.",

        {"h2": "Por qué la cifra real no coincide con la ficha"},

        {"ul": [
            "<strong>Altura y subidas.</strong> En la Sierra el motor trabaja más en cada "
            "subida, y Ibarra tiene pocas rutas planas.",
            "<strong>Tráfico.</strong> Arrancar y frenar en el centro consume mucho más "
            "que un tramo constante en la Panamericana.",
            "<strong>Carga y pasajeros.</strong> El auto lleno consume más que con una "
            "sola persona.",
            "<strong>Aire acondicionado.</strong> Se nota sobre todo en la Costa y en "
            "trayectos cortos.",
            "<strong>Estado del auto.</strong> Llantas con poca presión, filtro de aire "
            "sucio o inyectores sucios suben el consumo sin que el conductor lo note.",
        ]},

        {"quote": "Casi nadie sabe cuánto consume su auto hasta que lo mide. La primera "
                  "vez que lo hacen, muchos descubren que el problema no era el auto sino "
                  "la ruta o la presión de las llantas.",
         "cite": CITA},

        {"h2": "Cuándo el consumo delata un problema en un usado"},

        "Si mide el consumo de un auto que acaba de comprar y está muy por encima de lo "
        "habitual para ese modelo y ese tipo de recorrido, vale buscar la causa:",

        {"ul": [
            "<strong>Humo negro en el escape:</strong> mezcla demasiado rica, posible "
            "problema de inyección o de sensores.",
            "<strong>Luz de check engine encendida:</strong> un sensor de oxígeno dañado "
            "puede disparar el consumo.",
            "<strong>Olor a gasolina:</strong> posible fuga, que además es un riesgo.",
            "<strong>Frenos que rozan:</strong> una mordaza trabada frena el auto todo el "
            "tiempo y consume combustible de más.",
        ]},

        f"Al comprar, el kilometraje y el historial dicen mucho de cómo va a consumir el "
        f"auto. Lo explicamos en {link(KILOMETRAJE, 'cuánto kilometraje es mucho')}.",

        {"h2": "Cómo medir el consumo antes de comprar"},

        "Al comprar un usado no tiene tiempo de hacer tres llenadas, pero sí puede "
        "acercarse a la cifra real. Pregunte al vendedor cuánto le dura un tanque en su "
        "rutina y con qué recorrido, y compárelo con lo que dicen otros dueños del mismo "
        "modelo. Una respuesta precisa, con kilómetros y galones, suele venir de alguien "
        "que cuidó el auto. Una respuesta vaga no prueba nada, pero tampoco ayuda.",

        "En la prueba de manejo, mire si el auto tiene computadora de viaje con consumo "
        "promedio. No es exacta, pero un promedio muy alto para el tipo de auto es una "
        "pista para pedir un diagnóstico de inyección y sensores.",

        {"h2": "Cuándo el consumo no debería decidir la compra"},

        "Si maneja pocos kilómetros al mes, la diferencia de consumo entre dos autos "
        "parecidos se traduce en poco dinero, y pesan más el precio, el estado y el "
        "mantenimiento. El consumo importa de verdad para quien recorre muchos kilómetros: "
        "quien trabaja con el auto o viaja todos los días entre ciudades.",

        f"Para ese perfil vale la pena mirar los híbridos, que en el tráfico de ciudad "
        f"consumen bastante menos. Hay una guía en {link(HIBRIDOS, 'autos híbridos usados')}, "
        f"y en el patio está el {enlace_ficha('prius')}.",

        {"h2": "Hábitos que bajan el consumo en una ciudad como Ibarra"},

        "Sin cambiar de auto, hay costumbres que mueven la cifra de forma visible:",

        {"ul": [
            "<strong>Revisar la presión de llantas una vez al mes</strong>, en frío. Una "
            "llanta baja aumenta la resistencia y el consumo.",
            "<strong>Anticipar las frenadas.</strong> Soltar el acelerador antes del "
            "semáforo en lugar de frenar a último momento ahorra combustible y pastillas.",
            "<strong>No calentar el motor parado mucho tiempo.</strong> Con un par de "
            "minutos basta; el motor se calienta mejor andando con suavidad.",
            "<strong>Cambiar el filtro de aire a tiempo</strong>, sobre todo si maneja "
            "por caminos de tierra en las comunidades o en el valle del Chota.",
            "<strong>Sacar el peso que no se usa</strong> de la cajuela.",
        ]},

        "Ninguno de estos hábitos hace milagros por separado. Juntos, en un mes de "
        "recorridos diarios, se notan en la cuenta del surtidor.",

        {"h2": "La regla para comparar dos autos"},

        "No compare la cifra de un dueño con la de la ficha de otro. Compare el costo por "
        "kilómetro medido con el mismo método y en recorridos parecidos. Es la única "
        "comparación honesta.",

        {"faq": [
            ("¿Cómo calculo cuántos kilómetros por galón hace mi auto?",
             "Llene el tanque, ponga en cero el contador parcial, maneje y vuelva a "
             "llenar. Divida los kilómetros recorridos entre los galones que entraron en "
             "la segunda llenada."),
            ("¿Es confiable el consumo que marca el tablero?",
             "Sirve de referencia, pero puede estar descalibrado. El método del tanque "
             "lleno es más preciso."),
            ("¿Por qué mi auto consume más en Ibarra que en la Costa?",
             "Por las subidas, el tráfico y la altura, que hacen trabajar más al motor. "
             "Los tramos planos y constantes son los que menos consumen."),
            ("¿Qué hace subir el consumo de un auto usado?",
             "Llantas con poca presión, filtro de aire sucio, inyectores sucios, sensores "
             "dañados o frenos que rozan. Un mantenimiento básico suele corregir buena "
             "parte."),
            ("¿Los híbridos consumen menos en la Sierra?",
             "En ciudad y en tráfico, sí, porque aprovechan el motor eléctrico al "
             "arrancar y en bajadas recuperan energía. En carretera constante la "
             "diferencia es menor."),
        ]},

        cierre("Hola, quiero saber el consumo de un auto que vi en OKCars."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Luces del tablero
# ════════════════════════════════════════════════════════════════════════════
tablero = {
    "title": "Luces del tablero del carro: qué significan y qué hacer",
    "slug": "luces-del-tablero-que-significan",
    "date": FECHAS[13],
    "cat": CAT["guias"],
    "tags": ["luces del tablero", "check engine", "testigos del auto",
             "revisar auto usado", "mecánica básica"],
    "excerpt": "Rojo es detenerse, amarillo es revisar pronto, verde y azul solo informan. "
               "Qué significa cada luz del tablero y la prueba que todo comprador de un "
               "usado debería hacer al dar contacto.",
    "yoast_title": "Luces del tablero del carro: qué significan",
    "yoast_desc": "Cuáles obligan a detenerse, cuáles pueden esperar al taller y la prueba "
                  "de las luces al dar contacto que delata a un usado con fallas ocultas.",
    "focus_kw": "luces del tablero del carro",
    "bloques": [
        "Una luz del tablero que se enciende de repente genera dos reacciones: pánico o "
        "indiferencia. Las dos son caras. Hay luces que piden detener el auto en el "
        "próximo lugar seguro, y otras que pueden esperar a la cita en el taller.",

        "Esta guía le explica cómo leerlas por color, qué hacer con cada una y una prueba "
        "sencilla que todo comprador de un auto usado debería hacer antes de pagar.",

        {"h2": "La respuesta corta: el color le dice la urgencia"},

        "Casi todos los fabricantes usan el mismo código de colores, parecido al de un "
        "semáforo:",

        {"tabla": [
            ["Color", "Qué indica", "Qué hacer"],
            ["Rojo", "Falla seria o riesgo de daño inmediato",
             "Detenerse en un lugar seguro y apagar el motor"],
            ["Amarillo o naranja", "Algo requiere revisión",
             "Seguir con precaución e ir al taller pronto"],
            ["Verde o azul", "Un sistema está activo (luces, direccionales)",
             "Nada: es informativo"],
        ]},

        "El símbolo exacto cambia entre marcas. El manual del propietario tiene la lista "
        "completa; si el auto usado no lo trae, suele encontrarse en la página del "
        "fabricante.",

        {"h2": "Las luces rojas: detenerse ya"},

        {"ul": [
            "<strong>Presión de aceite</strong> (una aceitera). El motor no está "
            "lubricando bien. Seguir manejando puede fundirlo en minutos.",
            "<strong>Temperatura</strong> (un termómetro en líquido). El motor se está "
            "recalentando. Detenga, apague y no abra la tapa del radiador en caliente.",
            "<strong>Frenos</strong> (un círculo con signo de admiración). Puede ser el "
            "freno de mano puesto o un nivel bajo de líquido de frenos.",
            "<strong>Batería o carga</strong> (una batería). El alternador no está "
            "cargando: el auto funcionará hasta que la batería se agote.",
        ]},

        "En subidas largas como la de Ibarra hacia Quito, la luz de temperatura merece "
        "atención especial: es donde un sistema de enfriamiento débil se rinde.",

        {"h2": "Las luces amarillas: al taller pronto"},

        {"ul": [
            "<strong>Check engine</strong> (un motor). Puede ser algo leve o algo serio. "
            "Si parpadea, la falla es más urgente.",
            "<strong>ABS</strong>. Los frenos funcionan, pero sin el sistema antibloqueo.",
            "<strong>Airbag</strong>. Las bolsas de aire podrían no activarse en un choque.",
            "<strong>Presión de llantas</strong>, en los autos que la miden. Una llanta "
            "está baja.",
        ]},

        {"h2": "Otras luces que conviene reconocer"},

        "Además de las rojas y amarillas, hay testigos que confunden a muchos conductores, "
        "sobre todo en un auto que todavía no conocen:",

        {"ul": [
            "<strong>Termómetro en azul</strong>, en algunos modelos: el motor todavía está "
            "frío. Conviene manejar suave hasta que se apague, algo frecuente en las "
            "mañanas frías de Ibarra.",
            "<strong>Dirección asistida</strong> (un volante con signo de admiración): el "
            "volante puede ponerse duro. Se maneja con cuidado hasta el taller.",
            "<strong>Llave o mantenimiento programado:</strong> en muchos autos solo "
            "recuerda que toca un servicio, no indica una falla.",
            "<strong>Luz alta</strong> en azul: solo informa que las luces altas están "
            "encendidas.",
        ]},

        "Si una luz se enciende y se apaga sola de forma intermitente, no la ignore "
        "porque desapareció. Las fallas intermitentes suelen quedar registradas en la "
        "computadora del auto, y un escáner puede leerlas aunque la luz esté apagada en "
        "ese momento.",

        {"quote": "Una luz de check engine encendida no siempre es grave, pero siempre "
                  "tiene una causa. Un escáner de diagnóstico la lee en minutos, y eso "
                  "vale más que cualquier explicación del vendedor.",
         "cite": CITA},

        {"h2": "La prueba del contacto, para quien compra un usado"},

        "Esta prueba lleva un minuto y puede ahorrarle una sorpresa cara. Las luces de "
        "advertencia se encienden todas un momento al dar contacto, como autodiagnóstico, "
        "y se apagan al arrancar.",

        {"ol": [
            "Con el motor apagado, gire la llave o presione el botón hasta la posición de "
            "contacto, sin arrancar.",
            "Mire el tablero: deben encenderse las luces de aceite, batería, check "
            "engine, ABS y airbag, entre otras.",
            "Si alguna de ellas no se enciende, desconfíe: puede tener el foco retirado o "
            "desconectado para ocultar una falla.",
            "Arranque el motor. Todas las luces de advertencia deben apagarse en pocos "
            "segundos.",
            "Si alguna queda encendida, pida que la diagnostiquen antes de negociar.",
        ]},

        f"Esta prueba es parte del {link(CHECKLIST, 'checklist para revisar un auto usado')} "
        f"y se completa en la {link(PRUEBA_MANEJO, 'prueba de manejo')}.",

        {"h2": "Cuándo una luz encendida no debería espantarlo"},

        "Una luz amarilla con diagnóstico claro, por ejemplo un sensor de presión de "
        "llantas que dejó de funcionar, no es motivo para descartar un auto que está bien "
        "en todo lo demás. Es un arreglo conocido que se puede negociar en el precio.",

        "Lo que sí debería frenarlo es una luz roja, una luz que el vendedor no sabe "
        "explicar o una que no enciende al dar contacto.",

        {"h2": "Qué hacer en carretera si se enciende una luz roja"},

        "En la Panamericana o en la vía a la Costa no siempre hay un lugar cómodo para "
        "detenerse. El orden es este: encienda las intermitentes, salga de la vía donde "
        "sea seguro, apague el motor y coloque los triángulos. Después llame a la "
        "asistencia de su seguro. Intentar llegar al siguiente pueblo con la luz de "
        "aceite o de temperatura encendida suele convertir una reparación menor en una "
        "mayor.",

        {"h2": "Lo que cuesta ignorar una luz"},

        "La mayoría de reparaciones caras empiezan como una luz que alguien decidió "
        "ignorar. Un nivel de aceite bajo que se corrige con un litro, ignorado, termina "
        "en un motor fundido. Un sensor que se reemplaza en el taller, ignorado, puede "
        "dañar el catalizador. Atender a tiempo casi siempre es la opción más barata.",

        {"h2": "La regla para el día a día"},

        "Rojo: deténgase. Amarillo: agende el taller esta semana. Y si compra un usado, "
        "haga la prueba del contacto antes de hablar de precio. Un tablero honesto se "
        "enciende entero y se apaga entero.",

        {"faq": [
            ("¿Qué hago si se enciende la luz de aceite manejando?",
             "Detenga el auto en un lugar seguro y apague el motor. Revise el nivel de "
             "aceite con el motor frío. Si está bien y la luz sigue, no lo maneje: pida "
             "asistencia."),
            ("¿Puedo seguir manejando con la luz de check engine?",
             "Si está fija y el auto anda normal, puede llegar al taller con precaución. "
             "Si parpadea o el auto pierde fuerza, deténgase."),
            ("¿Por qué se encienden todas las luces al dar contacto?",
             "Es una autoprueba del sistema. Sirve para confirmar que cada testigo "
             "funciona; todas deben apagarse al arrancar."),
            ("¿Qué significa la luz de batería encendida?",
             "Normalmente que el alternador no está cargando. El auto funcionará hasta "
             "que la batería se agote, así que conviene ir al taller de inmediato."),
            ("¿Cómo sé qué falla marca el check engine?",
             "Con un escáner de diagnóstico, que lee el código guardado en la computadora "
             "del auto. Muchos talleres de Ibarra lo hacen en minutos."),
        ]},

        cierre("Hola, quiero ver un auto en OKCars y revisar el tablero con calma."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Auto usado para familia con niños
# ════════════════════════════════════════════════════════════════════════════
familia = {
    "title": "Auto usado para familia con niños: qué mirar antes de comprar",
    "slug": "auto-usado-familia-con-ninos",
    "date": FECHAS[17],
    "cat": CAT["guias"],
    "tags": ["auto familiar", "ISOFIX", "silla para bebé", "SUV familiar usada",
             "minivan usada Ecuador"],
    "excerpt": "Con niños, el auto se elige por la fila de atrás, no por el motor. "
               "Anclajes para sillas, cajuela para el coche de bebé, puertas y seguros: lo "
               "que conviene revisar con la familia presente.",
    "yoast_title": "Auto para familia con niños: qué mirar en un usado",
    "yoast_desc": "Anclajes ISOFIX, espacio para el coche de bebé, seguros de puertas y "
                  "aire atrás: cómo probar un auto usado con toda la familia antes de decidir.",
    "focus_kw": "auto para familia con niños",
    "bloques": [
        "Cuando llegan los niños, el auto se empieza a elegir por la fila de atrás. "
        "Importa menos cuánta fuerza tiene el motor y más si entra la silla del bebé, si "
        "se puede abrir la puerta en un parqueadero estrecho y si el coche de paseo cabe "
        "en la cajuela junto con las compras.",

        "Esta guía reúne lo que conviene revisar en un auto usado pensado para una "
        "familia con niños pequeños, y una prueba sencilla que se hace en el patio, con "
        "toda la familia presente.",

        {"h2": "La respuesta corta: lleve la silla y el coche al patio"},

        "La forma más rápida de saber si un auto sirve para su familia es probarlo con lo "
        "que va a usar todos los días. Lleve la silla de auto y el coche de paseo, instale "
        "la silla, cierre la cajuela con el coche adentro y siente a los niños atrás. En "
        "diez minutos sabe más que con cualquier ficha técnica.",

        {"h2": "Los anclajes para sillas: ISOFIX"},

        "ISOFIX es un sistema de anclajes metálicos en el asiento trasero donde la silla "
        "del niño se engancha directamente a la estructura del auto, sin depender del "
        "cinturón. Es más fácil de instalar bien y reduce los errores de montaje.",

        "La mayoría de autos de los últimos años lo traen; en modelos más antiguos no "
        "siempre está. No asuma que un auto lo tiene: búsquelo. Suelen estar escondidos "
        "entre el respaldo y el cojín del asiento trasero, a veces marcados con una "
        "pequeña etiqueta.",

        {"ol": [
            "Busque los anclajes metálicos entre el respaldo y el asiento trasero.",
            "Revise si hay un tercer punto de anclaje, en el respaldo o detrás del asiento.",
            "Instale su silla y compruebe que quede firme, sin moverse hacia los lados.",
            "Si tiene dos niños, pruebe las dos sillas a la vez y mire cuánto espacio "
            "queda en el centro.",
            "Siéntese adelante con la silla instalada atrás y compruebe que el asiento "
            "delantero no quede demasiado adelante.",
        ]},

        {"h2": "La cajuela: el coche de paseo manda"},

        "Un coche de paseo plegado puede ocupar buena parte de la cajuela de un auto "
        "pequeño. Si además va al mercado de Ibarra los sábados o sale de viaje con "
        "maletas, la cajuela pasa a ser un criterio de compra.",

        {"tabla": [
            ["Tipo de auto", "Ventaja para la familia", "Lo que hay que mirar"],
            ["Sedán", "Cómodo en carretera, cajuela cerrada",
             "Boca de la cajuela estrecha para un coche grande"],
            ["SUV", "Altura cómoda para subir niños, cajuela amplia",
             "Consumo y precio mayores"],
            ["Minivan", "Puertas corredizas y mucho espacio",
             "Tamaño para parquear en el centro"],
        ]},

        f"Si duda entre los dos formatos más comunes, la comparación está en "
        f"{link(SUV_SEDAN, 'SUV o sedán usado')}. Y si la familia es grande, vale mirar "
        f"la {link(MINIVAN, 'guía de la minivan usada')}.",

        {"quote": "La prueba que más decisiones resuelve es la más simple: sentar a la "
                  "familia completa en el auto, con las sillas puestas. Ahí se ve si el "
                  "auto sirve o no, antes de hablar de precio.",
         "cite": CITA},

        {"h2": "Detalles que se notan con niños a bordo"},

        {"ul": [
            "<strong>Seguro de niños en las puertas traseras</strong>, que impide "
            "abrirlas desde adentro. Compruebe que funcione en las dos.",
            "<strong>Bloqueo de ventanas</strong> desde el puesto del conductor.",
            "<strong>Salidas de aire acondicionado atrás</strong>, que se agradecen en los "
            "viajes a la Costa.",
            "<strong>Tapicería fácil de limpiar.</strong> Las manchas de un usado dicen "
            "algo de cómo se cuidó.",
            "<strong>Altura de entrada.</strong> Subir a un niño a una SUV es más cómodo "
            "para la espalda que agacharse hacia un sedán bajo.",
        ]},

        {"h2": "La seguridad que no se ve en la prueba"},

        "Hay elementos que no se notan al sentarse pero que importan con niños a bordo. "
        "Conviene preguntarlos o verificarlos antes de cerrar:",

        {"ul": [
            "<strong>Cinturones de tres puntos en todos los asientos traseros</strong>, "
            "incluido el central. En algunos autos el del centro es solo abdominal.",
            "<strong>Bolsas de aire laterales o de cortina</strong>, que protegen la fila "
            "de atrás en un choque lateral. Pregunte qué tiene la versión concreta.",
            "<strong>Historial de choques</strong>: un auto con un golpe estructural mal "
            "reparado protege menos, aunque se vea bien.",
            "<strong>Testigo de airbag</strong>: debe encenderse al dar contacto y apagarse "
            "al arrancar.",
        ]},

        "Ninguno de estos puntos se resuelve con la vista. Por eso vale la pena pedir la "
        "ficha de la versión exacta, revisar la etiqueta de airbags en los pilares y "
        "pedir una revisión mecánica antes de comprar.",

        {"h2": "Algunas opciones del patio para mirar"},

        f"Para que se haga una idea de formatos y precios: la "
        f"{enlace_ficha('sienna')} a {FICHA['sienna'][4]}, el "
        f"{enlace_ficha('tang')} a {FICHA['tang'][4]}, la "
        f"{enlace_ficha('cx5')} a {FICHA['cx5'][4]} y el {enlace_ficha('seltos')} a "
        f"{FICHA['seltos'][4]}. Antes de decidir, confirme en el patio los anclajes y la "
        "configuración de asientos de la unidad concreta.",

        {"h2": "Cuándo no hace falta un auto más grande"},

        "Con un solo niño pequeño y uso mayormente urbano, un sedán o una SUV compacta "
        "suele bastar. Pasar a un auto grande sube el precio, el seguro y el consumo, y "
        "complica parquear en el centro de Ibarra u Otavalo.",

        "El salto a un auto grande se justifica con dos o más niños en sillas, viajes "
        "frecuentes con equipaje o cuando los abuelos también viajan con la familia.",

        {"h2": "La regla para decidir"},

        "Elija por la fila de atrás y la cajuela, no por la ficha. Si las sillas entran "
        "firmes, el coche cabe y los niños van cómodos, el resto se ajusta al presupuesto.",

        {"faq": [
            ("¿Qué es ISOFIX y por qué importa?",
             "Es un sistema de anclajes en el asiento trasero donde la silla del niño se "
             "engancha directamente al auto. Facilita una instalación firme y reduce los "
             "errores de montaje."),
            ("¿Todos los autos usados tienen ISOFIX?",
             "No. La mayoría de autos recientes lo traen, pero en modelos más antiguos no "
             "siempre está. Hay que comprobarlo en la unidad concreta."),
            ("¿Qué es mejor para una familia, una SUV o una minivan?",
             "La minivan tiene más espacio y puertas corredizas, muy cómodas con niños. "
             "La SUV es más fácil de parquear y se maneja como un auto normal. Depende del "
             "tamaño de la familia y del uso."),
            ("¿Puedo llevar mi silla al patio para probarla?",
             "Sí, y es lo más recomendable. Probar la silla y el coche de paseo en el auto "
             "resuelve en minutos dudas que la ficha técnica no contesta."),
            ("¿Dónde debe ir la silla del bebé?",
             "En el asiento trasero, nunca adelante si hay airbag frontal activo. Siga "
             "las instrucciones del fabricante de la silla sobre la posición y la "
             "orientación según la edad."),
        ]},

        cierre("Hola, quiero ver un auto familiar en OKCars y probar la silla de mi hijo.",
               "Si quiere venir con la familia y probar las sillas en el patio de Ibarra, "
               "escríbanos al"),
    ],
}


if __name__ == "__main__":
    for s in [turbo, viaje, consumo, tablero, familia]:
        print(guarda(s))
