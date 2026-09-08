#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote E — los 6 vehículos que están en stock y no tenían artículo.

Datos tomados de las fichas públicas de okcars.ec el 2026-09-08. Ninguna cifra
de precio, año o kilometraje está inventada: todas salen del listado del sitio.

    python3 lote_e_modelos_stock.py          # escribe los specs
    python3 publish_batch.py --validate      # valida antes de subir
"""
from gutenberg import CAT, LISTADO, SITE, guarda, link, post_url, wa

V = f"{SITE}/vehiculos-okcars"

# ── fichas reales en stock (listado del 2026-09-08) ─────────────────────────
FICHA = {
    "crosstrek": (f"{V}/subaru-crosstrek-ac-2-0-5p-4x4-ta-hybrid/", "2024", "25.000", "$26.900"),
    "captiva":   (f"{V}/chevrolet-captiva-ltz-turbo-5pas-ac-1-5-5p-4x2-tm/", "2022", "49.725", "$16.000"),
    "prius":     (f"{V}/toyota-prius-c-sport-ac-1-5-5p-4x2-ta-hybrid/", "2018", "256.811", "$13.000"),
    "maxus":     (f"{V}/maxus-t60-elite-ac-2-8-cd-4x4-tm-diesel/", "2024", "38.500", "$23.000"),
    "koleos":    (f"{V}/koleos-4x2-2-5-cvt/", "2012", "276.000", "$8.500"),
    "tang":      (f"{V}/byd-tang-ac-5p-4x4-ta-ev/", "2024", "63.000", "$45.000"),
    "hunter":    (f"{V}/hunter-ac-1-9-cd-4x2-tm-diesel/", "2026", "4.500", "$25.900"),
    "cx5":       (f"{V}/cx-5-active-ac-2-0-5p-4x2-ta/", "2023", "46.500", "$31.900"),
    "seltos":    (f"{V}/kia-seltos-1-6-t-a/", "2021", "64.560", "$20.500"),
    "territory": (f"{V}/ford-territory-1-5-t-a/", "2022", "67.000", "$20.500"),
    "tucson11":  (f"{V}/tucson-ix-gl-5p-4x2-2-0-ta-ac/", "2011", "186.604", "$16.500"),
}

CHECKLIST = f"{SITE}/guias-de-compra/checklist-revisar-auto-usado-antes-de-comprar/"
TRASPASO = f"{SITE}/tramites/traspaso-vehiculo-ecuador-requisitos-pasos/"
HIBRIDOS = f"{SITE}/guias-de-compra/autos-hibridos-usados-ecuador/"
CHINOS = f"{SITE}/guias-de-compra/autos-chinos-usados-ecuador-guia/"
DIESEL = f"{SITE}/guias-de-compra/camionetas-diesel-usadas-ecuador/"
HUNTER_POST = f"{SITE}/modelos-y-comparativas/changan-hunter-ecuador-camioneta/"
ENTRADA = f"{SITE}/financiamiento/cuanto-entrada-auto-usado-ecuador/"
SEGURO = f"{SITE}/financiamiento/seguro-vehicular-autos-usados-ecuador/"


# ════════════════════════════════════════════════════════════════════════════
# 1 · BYD Tang
# ════════════════════════════════════════════════════════════════════════════
tang = {
    "title": "BYD Tang usada en Ecuador: qué mirar antes de pagar $45.000",
    "slug": "byd-tang-electrico-usado-ecuador",
    "date": "2026-09-10T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["BYD Tang", "autos eléctricos Ecuador", "SUV eléctrico usado",
             "seminuevos Ibarra", "BYD Ecuador"],
    "excerpt": "Es el vehículo más caro del patio y el único totalmente eléctrico. "
               "Qué significan sus 63.000 km, cuánto cuesta cargarlo en casa y a quién "
               "le sirve de verdad una SUV eléctrica en el norte del Ecuador.",
    "yoast_title": "BYD Tang eléctrica usada: precio en Ecuador 2026",
    "yoast_desc": "Una BYD Tang 2024 con 63.000 km cuesta $45.000 en Ibarra. Qué revisar "
                  "en la batería, cuánto cuesta cargarla en casa y a quién le conviene de verdad.",
    "focus_kw": "byd tang precio ecuador",
    "bloques": [
        f"En el patio de OKCars en Ibarra hay una BYD Tang {FICHA['tang'][1]} con "
        f"{FICHA['tang'][2]} kilómetros marcados, en {FICHA['tang'][3]}. Es el vehículo "
        "más caro del inventario y el único que no consume una gota de combustible. "
        "También es el que más preguntas genera, y casi ninguna tiene que ver con el precio.",

        "La duda de fondo siempre es la misma: comprar un eléctrico usado suena a apostar "
        "por una batería que uno no puede ver. Este artículo va justamente sobre eso.",

        {"h2": "Qué dicen esos 63.000 kilómetros"},

        f"La Tang es del {FICHA['tang'][1]} y marca {FICHA['tang'][2]} km. La cuenta es "
        "directa: alrededor de 31.000 kilómetros al año, casi el doble de lo que recorre "
        "un vehículo particular promedio en Ecuador. Eso no descalifica al auto, pero sí "
        "cambia la conversación.",

        "Un kilometraje así casi siempre significa carretera. Y para un eléctrico, la "
        "carretera es la mejor noticia posible. La batería se degrada sobre todo por dos "
        "cosas: cargas rápidas repetidas y ciclos completos de descarga profunda. Un auto "
        "que hace tramos largos y constantes —Ibarra a Quito por la Panamericana, por "
        "ejemplo— sufre mucho menos que uno que vive en tráfico urbano con arranques y "
        "frenadas permanentes, donde el desgaste real está en otras piezas.",

        "El punto que sí hay que verificar es el estado de salud de la batería, lo que en "
        "el tablero y en los diagnósticos aparece como SOH. Es un porcentaje que indica "
        "cuánta capacidad original conserva el paquete. Un valor por encima del 90 % en un "
        "auto de dos años es normal; por debajo del 85 % ya hay algo que explicar.",

        {"quote": "Con un eléctrico usado la pregunta correcta no es cuántos kilómetros "
                  "tiene, es cómo los hizo. Nosotros pedimos el diagnóstico de batería antes "
                  "de recibir la unidad, y si el número no cuadra, la unidad no entra al patio. "
                  "Es el único componente que no se arregla con un service.",
         "cite": "Equipo comercial de OKCars"},

        {"h2": "Cuánto cuesta moverla de verdad"},

        "Acá está la razón por la que alguien paga lo que pide una Tang. El costo por "
        "kilómetro de un eléctrico en Ecuador no se parece al de un vehículo a gasolina, y "
        "la diferencia se nota al mes, no al año.",

        "Cargando en casa, en horario nocturno, el kilovatio hora residencial en Ecuador se "
        "mantiene entre los más baratos de la región. Una recarga completa de una batería "
        "grande como la de la Tang cuesta bastante menos que un tanque de gasolina de una "
        "SUV equivalente, y rinde un recorrido comparable. Quien maneja mucho recupera parte "
        "de la diferencia de precio de compra en el uso.",

        "El segundo ahorro es el mantenimiento. No hay cambios de aceite, ni filtros de "
        "aceite, ni bujías, ni correa de distribución, ni embrague. Los frenos duran "
        "notablemente más porque el auto frena regenerando. Lo que sí se mantiene son "
        "llantas, líquido de frenos, filtro de cabina, suspensión y el sistema de "
        "refrigeración de la batería.",

        {"tabla": [
            ["Rubro", "Vehículo a gasolina", "BYD Tang eléctrica"],
            ["Cambio de aceite y filtros", "Cada 5.000 – 10.000 km", "No aplica"],
            ["Bujías y correa", "Periódico", "No aplica"],
            ["Embrague", "Reemplazo eventual", "No aplica"],
            ["Frenos", "Desgaste normal", "Duran más por frenado regenerativo"],
            ["Llantas y suspensión", "Normal", "Normal, algo más por el peso"],
            ["Refrigerante de batería", "No aplica", "Revisión periódica"],
        ]},

        {"h2": "Dónde la vas a cargar"},

        "Esta es la parte que más gente pasa por alto y la que más arrepentimientos "
        "produce. Un eléctrico se compra pensando en dónde duerme, no en dónde viaja.",

        "El escenario cómodo es tener un punto de carga en casa. Con un cargador doméstico "
        "instalado, el auto se conecta en la noche y amanece lleno. Nunca haces fila, nunca "
        "planificas. Ese es el caso en el que una Tang tiene todo el sentido del mundo.",

        "El escenario incómodo es depender de carga pública. La red en Imbabura y Carchi ha "
        "crecido, pero sigue siendo delgada comparada con Quito o Guayaquil. Si vives en un "
        "departamento sin posibilidad de instalar un punto propio, o si tu ruta habitual "
        "sale del corredor Ibarra–Otavalo–Quito, la experiencia cambia bastante.",

        {"h2": "A quién no le recomendamos esta Tang"},

        "Aunque suene extraño viniendo de quien la vende, hay tres perfiles a los que les "
        "decimos que miren otra cosa del listado.",

        {"ul": [
            "<strong>Quien recorre poco.</strong> Si tu día son 15 o 20 kilómetros, jamás "
            "vas a recuperar en ahorro de combustible la diferencia de precio frente a una "
            "SUV a gasolina. El eléctrico rinde cuando se usa mucho.",
            "<strong>Quien no puede cargar en casa.</strong> Sin punto propio, un vehículo "
            "de batería grande se vuelve una gestión diaria en lugar de una comodidad.",
            "<strong>Quien viaja seguido fuera del corredor central.</strong> Si tus rutas "
            "son a la costa por vías secundarias o al oriente, la planificación de carga "
            "deja de ser trivial.",
        ]},

        f"Para esos casos tenemos alternativas concretas en el mismo patio: la "
        f"{link(FICHA['cx5'][0], 'Mazda CX-5 ' + FICHA['cx5'][1])} a {FICHA['cx5'][3]} o el "
        f"{link(FICHA['territory'][0], 'Ford Territory ' + FICHA['territory'][1])} a "
        f"{FICHA['territory'][3]}, ambos a gasolina y con red de servicio en toda la "
        "provincia. Y si lo que te atrae es el ahorro sin dar el salto completo, revisa "
        f"nuestra {link(HIBRIDOS, 'guía de híbridos usados en Ecuador')}.",

        {"h2": "Qué revisamos nosotros antes de recibirla"},

        "Una Tang usada pasa por controles distintos a los de un auto convencional. Estos "
        "son los que no se negocian:",

        {"ol": [
            "Diagnóstico de estado de salud de la batería, con reporte impreso.",
            "Historial de cargas rápidas, que queda registrado en el sistema del vehículo.",
            "Funcionamiento del sistema de refrigeración del paquete de baterías.",
            "Estado del cargador portátil y del puerto de carga, incluidos los pines.",
            "Actualizaciones de software pendientes.",
            "Lo de siempre: frenos, suspensión, llantas, carrocería y papeles al día.",
        ]},

        f"Los puntos mecánicos y legales son los mismos de cualquier seminuevo. Si querés "
        f"el detalle completo, está en nuestro "
        f"{link(CHECKLIST, 'checklist de 20 puntos para revisar un auto usado')}, y el "
        f"trámite posterior lo explicamos en la guía de "
        f"{link(TRASPASO, 'traspaso de vehículo en Ecuador')}.",

        {"h2": "El resumen honesto"},

        f"Una Tang {FICHA['tang'][1]} con {FICHA['tang'][2]} km en {FICHA['tang'][3]} es un "
        "auto para alguien que recorre mucho, puede cargar en casa y quiere bajar su costo "
        "mensual de operación de forma notoria. Para ese perfil, los números cierran solos.",

        "Para quien maneja poco o carga en la calle, el mismo auto se vuelve una decisión "
        "cara y complicada. No es un problema del vehículo: es un problema de calce.",

        {"faq": [
            ("¿Cuánto dura la batería de una BYD Tang?",
             "Los fabricantes diseñan estos paquetes para superar holgadamente los 200.000 "
             "kilómetros conservando la mayor parte de su capacidad. Lo que define la vida "
             "útil no es tanto el kilometraje como el tipo de carga: el uso constante de "
             "carga rápida acelera la degradación. Por eso pedimos el diagnóstico antes de "
             "recibir cualquier unidad eléctrica."),
            ("¿Se puede cargar en un tomacorriente normal?",
             "Sí, con el cargador portátil que viene con el vehículo, pero es lento: sirve "
             "para recuperar carga durante la noche si el recorrido diario es corto. Para "
             "un uso intensivo conviene instalar un cargador doméstico dedicado."),
            ("¿Qué pasa con el mantenimiento y los repuestos en Imbabura?",
             "El mantenimiento programado es mucho más liviano que el de un vehículo a "
             "combustión, y buena parte se resuelve localmente. Las piezas específicas del "
             "sistema eléctrico se gestionan por red de marca, lo que puede tomar más días "
             "que un repuesto convencional."),
            ("¿Aceptan mi auto actual como parte de pago?",
             "Sí. Recibimos vehículos como parte de pago y hacemos la valoración en el "
             "patio, sin costo. Sobre esa base se arma el saldo a financiar."),
            ("¿La puedo financiar?",
             "Sí, tanto por crédito directo como por entidad bancaria. Cuánto se necesita "
             "de entrada depende del plazo y del perfil; lo explicamos en nuestra guía de "
             "entrada para autos usados."),
        ]},

        f"¿Querés verla y hacer la prueba de manejo? Escribí al "
        f"{link(wa('Hola, quiero información de la BYD Tang eléctrica que tienen en OKCars y agendar una prueba de manejo.'), 'WhatsApp de OKCars')} "
        f"y coordinamos. También podés revisar la "
        f"{link(FICHA['tang'][0], 'ficha completa de la BYD Tang')} o el "
        f"{link(LISTADO, 'listado de vehículos disponibles')}. Estamos en Ibarra y "
        f"atendemos a compradores de Otavalo, Atuntaqui, Cayambe y Tulcán. "
        f"Si vas a financiar, mirá antes {link(ENTRADA, 'cuánto piden de entrada')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Subaru Crosstrek
# ════════════════════════════════════════════════════════════════════════════
crosstrek = {
    "title": "Subaru Crosstrek usada en Ecuador: el 4x4 que casi nadie mira",
    "slug": "subaru-crosstrek-usada-ecuador",
    "date": "2026-09-12T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["Subaru Crosstrek", "SUV 4x4 usada", "Subaru Ecuador",
             "seminuevos Imbabura", "tracción integral"],
    "excerpt": "Casi todas las SUV que se venden en Ecuador son 4x2 disfrazadas. "
               "La Crosstrek no: trae tracción a las cuatro ruedas permanente. Qué gana "
               "con eso, qué pierde y por qué igual le advertimos algo a cada comprador.",
    "yoast_title": "Subaru Crosstrek usada: precio en Ecuador y tracción 4x4",
    "yoast_desc": "Una Crosstrek 2024 con 25.000 km cuesta $26.900 en Ibarra. Qué aporta "
                  "su tracción permanente, cómo consume y la advertencia sobre repuestos.",
    "focus_kw": "subaru crosstrek usada ecuador",
    "bloques": [
        f"Hay una Subaru Crosstrek {FICHA['crosstrek'][1]} en el patio de OKCars con "
        f"{FICHA['crosstrek'][2]} kilómetros, en {FICHA['crosstrek'][3]}. Es la única "
        "Subaru del inventario y probablemente el vehículo que menos gente busca por "
        "nombre. Quien la prueba, sin embargo, suele quedarse pensando.",

        "La razón es una diferencia técnica que la mayoría de compradores desconoce hasta "
        "que se la explican.",

        {"h2": "La mayoría de las SUV en Ecuador son 4x2"},

        "Mirá el listado de casi cualquier patio del país y contá cuántas SUV dicen 4x2. "
        "Son la enorme mayoría. Tienen la altura, el tamaño y la postura de un todoterreno, "
        "pero mandan la fuerza a dos ruedas, igual que un sedán. En pavimento seco eso no "
        "importa; en un empedrado con lluvia saliendo de Cotacachi, sí.",

        "La Crosstrek trae tracción integral permanente. Las cuatro ruedas reciben fuerza "
        "todo el tiempo, sin que el conductor active nada y sin esperar a que una rueda "
        "patine para reaccionar. Es el sistema que Subaru monta desde hace décadas y es la "
        "razón por la que la marca tiene la reputación que tiene en climas difíciles.",

        "En la sierra norte esa diferencia se siente en situaciones concretas: subidas "
        "mojadas, tierra suelta, curvas con grava en la vía. No convierte al auto en un "
        "todoterreno de expedición —no lo es—, pero le da un margen de seguridad que una "
        "4x2 del mismo tamaño no tiene.",

        {"quote": "A la Crosstrek la vendemos en la prueba de manejo, no en la ficha. La "
                  "gente entra preguntando por qué cuesta más que una SUV parecida, sale de "
                  "una vía destapada y ya no pregunta lo mismo. El problema es que primero "
                  "hay que convencerlos de subirse.",
         "cite": "Equipo comercial de OKCars"},

        {"h2": "Qué es exactamente esta unidad"},

        f"Es una Crosstrek {FICHA['crosstrek'][1]} de motor 2.0, caja automática, tracción "
        f"a las cuatro ruedas y sistema híbrido ligero, con {FICHA['crosstrek'][2]} "
        f"kilómetros y un precio de {FICHA['crosstrek'][3]}.",

        "El kilometraje es la parte más interesante del asunto. Para un vehículo de ese "
        "año, 25.000 kilómetros es muy poco: hablamos de un auto que recorrió alrededor de "
        "un tercio de lo que recorre una unidad de uso normal. Prácticamente todo su "
        "desgaste está por delante.",

        "El sistema híbrido de la Crosstrek es de asistencia, no de los que mueven el auto "
        "solos en modo eléctrico. Un motor eléctrico pequeño apoya al de gasolina en los "
        "arranques y en las aceleraciones, que es donde más combustible se gasta. El efecto "
        "se nota sobre todo en ciudad, con el tráfico de Ibarra o de Otavalo en hora pico.",

        {"h2": "Lo que hay que saber antes de firmar"},

        "Acá viene la parte que preferimos decir de frente, porque después de la compra ya "
        "no sirve de nada.",

        "<strong>La red de servicio de Subaru en Ecuador es pequeña.</strong> No se compara "
        "con la de Toyota, Chevrolet o Hyundai. En Imbabura hay talleres capaces de hacer "
        "el mantenimiento periódico sin problema, pero un repuesto específico puede tomar "
        "más días que el de una marca masiva, y en ocasiones hay que traerlo de Quito.",

        "Eso tiene una consecuencia práctica: la Crosstrek es una buena compra para quien "
        "hace mantenimientos a tiempo y no le urge una reparación de emergencia el mismo "
        "día. Para quien usa el vehículo como herramienta de trabajo diaria y no puede "
        "quedarse sin auto ni 48 horas, una marca con más presencia local le va a dar menos "
        "dolores de cabeza.",

        "La otra advertencia es el consumo. Los motores bóxer de Subaru con tracción "
        "integral no son los más frugales de su categoría: mover cuatro ruedas cuesta "
        "combustible. La asistencia híbrida compensa parte, pero quien venga de un sedán "
        "pequeño va a notar la diferencia en el surtidor.",

        {"h2": "Contra qué compite dentro del mismo patio"},

        "La comparación útil no es contra un catálogo abstracto, sino contra lo que podés "
        "ver el mismo día en Ibarra:",

        {"tabla": [
            ["Vehículo", "Año", "Kilómetros", "Precio", "Tracción"],
            ["Subaru Crosstrek", FICHA['crosstrek'][1], FICHA['crosstrek'][2],
             FICHA['crosstrek'][3], "4x4 permanente"],
            ["Mazda CX-5 Active", FICHA['cx5'][1], FICHA['cx5'][2], FICHA['cx5'][3], "4x2"],
            ["Kia Seltos", FICHA['seltos'][1], FICHA['seltos'][2], FICHA['seltos'][3], "4x2"],
            ["Ford Territory", FICHA['territory'][1], FICHA['territory'][2],
             FICHA['territory'][3], "4x2"],
        ]},

        f"La {link(FICHA['cx5'][0], 'CX-5')} es más cara y más refinada en carretera. El "
        f"{link(FICHA['seltos'][0], 'Seltos')} y el "
        f"{link(FICHA['territory'][0], 'Territory')} cuestan bastante menos y tienen mejor "
        "red de servicio. La Crosstrek gana en un solo terreno, pero lo gana claro: cuando "
        "el piso deja de ser asfalto liso.",

        {"h2": "A quién le sirve de verdad"},

        {"ul": [
            "Quien vive o trabaja fuera del casco urbano y entra seguido a vías de tierra "
            "o empedrado.",
            "Quien viaja con frecuencia a zonas de páramo o de lluvia constante.",
            "Quien valora la seguridad activa por encima del costo de operación.",
            "Quien hace mantenimientos preventivos y puede planificar un repuesto.",
        ]},

        "Y a quien no: si tu recorrido es enteramente urbano y de asfalto, estás pagando "
        "por una capacidad que no vas a usar, con un consumo más alto y una red de servicio "
        "más chica. En ese caso el dinero rinde más en otro vehículo del listado.",

        {"h2": "Reventa y costo de tenerla"},

        "Un detalle que casi nadie calcula al comprar y todos sufren al vender: la Subaru "
        "es una marca de nicho en el mercado ecuatoriano. Eso juega en las dos direcciones. "
        "Al comprar, la baja demanda ayuda a que el precio sea más razonable de lo que "
        "sería una SUV equivalente de marca masiva con las mismas prestaciones. Al vender, "
        "el universo de compradores interesados es más chico y la unidad puede demorar más "
        "en salir.",

        "Quien compra una Crosstrek para quedársela varios años sale ganando. Quien la "
        "compra pensando en cambiarla en un año va a chocar con esa realidad. En el seguro "
        "pasa algo parecido: conviene cotizar antes de cerrar la compra, porque el valor "
        "asegurado y la disponibilidad de repuestos influyen en la prima. Lo explicamos en "
        f"la guía de {link(SEGURO, 'seguro vehicular para autos usados')}.",

        {"faq": [
            ("¿La tracción 4x4 de la Crosstrek se activa sola?",
             "No hay nada que activar. El sistema es permanente: las cuatro ruedas reciben "
             "fuerza todo el tiempo y el reparto se ajusta solo según la adherencia. Esa es "
             "la diferencia con los sistemas que esperan a que una rueda patine para "
             "enviar fuerza al otro eje."),
            ("¿Es un híbrido que anda en eléctrico?",
             "No. Es un híbrido de asistencia: el motor eléctrico apoya al de gasolina, "
             "sobre todo al arrancar y acelerar, pero no mueve el auto por sí solo en "
             "trayectos normales. El beneficio se ve en consumo urbano, no en autonomía "
             "eléctrica."),
            ("¿Hay repuestos de Subaru en Imbabura?",
             "El mantenimiento periódico se resuelve localmente. Los repuestos específicos "
             "suelen gestionarse desde Quito y pueden tomar algunos días más que los de una "
             "marca de mayor volumen. Conviene tenerlo claro antes de comprar."),
            ("¿Cuánto consume?",
             "Depende mucho del uso. Un motor bóxer con tracción integral consume más que "
             "un cuatro cilindros 4x2 equivalente; la asistencia híbrida recorta parte de "
             "esa diferencia en ciudad. En la prueba de manejo podés ver el consumo "
             "instantáneo en el tablero."),
        ]},

        f"Si querés probarla, escribí al "
        f"{link(wa('Hola, quiero agendar una prueba de manejo de la Subaru Crosstrek de OKCars.'), 'WhatsApp de OKCars')} "
        f"y la dejamos lista. La {link(FICHA['crosstrek'][0], 'ficha completa está acá')} y "
        f"el resto del inventario en el {link(LISTADO, 'listado de vehículos')}. Antes de "
        f"decidir, te recomendamos pasar por el "
        f"{link(CHECKLIST, 'checklist de revisión de un auto usado')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Toyota Prius C
# ════════════════════════════════════════════════════════════════════════════
prius = {
    "title": "Toyota Prius C con 256.000 km: ¿vale $13.000 un híbrido así?",
    "slug": "toyota-prius-c-usado-ecuador-kilometraje",
    "date": "2026-09-15T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["Toyota Prius", "autos híbridos usados", "kilometraje alto",
             "Toyota Ecuador", "seminuevos Ibarra"],
    "excerpt": "El kilometraje asusta y con razón hay que mirarlo. Pero en un híbrido "
               "Toyota la cifra del odómetro dice menos de lo que parece. Qué revisar, "
               "cuánto cuesta una batería y cuándo esta compra tiene sentido.",
    "yoast_title": "Toyota Prius C usado: precio en Ecuador y batería",
    "yoast_desc": "Un Prius C 2018 con 256.811 km cuesta $13.000 en Ibarra. Qué pasa con "
                  "la batería a ese kilometraje, qué revisar y para quién sí tiene sentido.",
    "focus_kw": "toyota prius usado ecuador",
    "bloques": [
        f"En el listado de OKCars hay un Toyota Prius C {FICHA['prius'][1]} con "
        f"{FICHA['prius'][2]} kilómetros, a {FICHA['prius'][3]}. El número del odómetro es "
        "lo primero que ve todo el mundo, y para muchos compradores la conversación termina "
        "ahí mismo.",

        "Nos parece justo explicar por qué, en este caso puntual, esa cifra merece más "
        "contexto del que suele recibir.",

        {"h2": "Por qué un híbrido envejece distinto"},

        "En un auto convencional el kilometraje castiga sobre todo al motor de combustión, "
        "a la caja y al embrague. En un híbrido Toyota esos tres componentes trabajan mucho "
        "menos de lo que sugiere el odómetro.",

        "El motor de gasolina no arranca en cada semáforo: el sistema lo apaga y lo vuelve "
        "a encender cuando hace falta. En trayectos urbanos, buena parte del avance lo hace "
        "el motor eléctrico. Un Prius con 256.000 kilómetros tiene su motor de combustión "
        "girando bastante menos que un auto a gasolina con el mismo recorrido.",

        "La caja tampoco es una caja tradicional. Los híbridos de Toyota usan un sistema de "
        "engranajes planetarios sin embrague ni convertidor de par convencional. No hay "
        "disco que se gaste ni bandas que patinen. Es una de las razones por las que estos "
        "autos aparecen con kilometrajes altísimos en flotas de taxi por todo el mundo.",

        "Y los frenos: el sistema regenerativo frena usando el motor eléctrico, así que las "
        "pastillas y los discos se desgastan mucho más despacio. Es común encontrar frenos "
        "originales en unidades con más de 200.000 kilómetros.",

        {"quote": "El Prius es el auto que más nos cuesta explicar y el que menos "
                  "problemas nos ha traído. La gente ve el kilometraje y se asusta; lo que "
                  "no ve es que ese motor arrancó la mitad de las veces que el de un auto "
                  "normal. Nosotros lo que miramos es la batería, no el odómetro.",
         "cite": "Equipo comercial de OKCars"},

        {"h2": "La pregunta de verdad: la batería"},

        "Con esto no estamos diciendo que el kilometraje no importe. Estamos diciendo que "
        "el riesgo se concentra en otro lado.",

        "La batería híbrida es el componente que define si esta compra sale bien o mal. Se "
        "degrada con el tiempo y con los ciclos de carga, y su reemplazo es el gasto más "
        "grande que puede aparecer. Antes de comprar cualquier híbrido usado hay que "
        "medirla, no confiar en que el auto encienda y ande.",

        "Un diagnóstico serio revisa el voltaje por bloques de celdas. Una batería sana "
        "muestra valores parejos entre bloques; una que empieza a fallar muestra un bloque "
        "por debajo de los demás, y ese desbalance es el aviso temprano. También se revisa "
        "el ventilador de refrigeración de la batería, que en autos de uso urbano suele "
        "acumular polvo y pelusa y es una causa evitable de deterioro.",

        {"ul": [
            "Voltaje parejo entre bloques de celdas, sin uno rezagado.",
            "Ventilador y ducto de refrigeración limpios y funcionando.",
            "Ausencia de códigos de falla del sistema híbrido en el escáner.",
            "Comportamiento del indicador de carga durante la prueba de manejo.",
            "Historial de mantenimiento, sobre todo si tuvo uso de flota.",
        ]},

        {"h2": "Qué pasa si hay que cambiarla"},

        "Conviene entrar a esta compra sabiendo el escenario malo, no solamente el bueno.",

        "Reemplazar una batería híbrida es un gasto relevante, y en un auto de este precio "
        "puede representar una fracción importante de lo que costó el vehículo. Existen "
        "tres caminos: batería nueva original, batería reacondicionada con celdas "
        "seleccionadas, o reemplazo del bloque puntual que falla. Los tres son viables en "
        "Ecuador y los precios varían bastante entre talleres.",

        "Nuestra recomendación es simple: si vas a comprar un híbrido con kilometraje alto, "
        "hacelo asumiendo que en algún momento del camino ese gasto puede aparecer. Si esa "
        "posibilidad te desarma el presupuesto, este no es tu auto. Y lo decimos aunque el "
        "auto esté en nuestro patio.",

        {"h2": "Para quién sí tiene sentido"},

        f"A {FICHA['prius'][3]}, este Prius C compite con sedanes y hatchbacks a gasolina "
        "de rango similar. La diferencia la hace el consumo.",

        "Un Prius en ciudad rinde de forma que ningún auto a gasolina de su tamaño alcanza. "
        "Para alguien que recorre mucho en trayectos urbanos —entre Ibarra, Otavalo y "
        "Atuntaqui, por ejemplo, o quien hace repartos y visitas todo el día— el ahorro "
        "mensual en combustible es real y se acumula rápido.",

        {"tabla": [
            ["Perfil de uso", "¿Le conviene este Prius?"],
            ["Muchos kilómetros urbanos al día", "Sí, es donde más rinde"],
            ["Recorrido corto y ocasional", "No compensa; el ahorro no aparece"],
            ["Presupuesto justo, sin margen para imprevistos", "No, por el riesgo de batería"],
            ["Viajes largos frecuentes en carretera", "Rinde bien, pero la ventaja se achica"],
        ]},

        f"Si el consumo es tu prioridad pero preferís menos kilometraje, en el mismo patio "
        f"está la {link(FICHA['crosstrek'][0], 'Subaru Crosstrek híbrida')} con "
        f"{FICHA['crosstrek'][2]} km, aunque en otro rango de precio. Y si querés entender "
        f"la categoría completa antes de decidir, escribimos una "
        f"{link(HIBRIDOS, 'guía de autos híbridos usados en Ecuador')}.",

        {"h2": "Lo que hacemos nosotros con esta unidad"},

        "Todo vehículo que entra a OKCars pasa revisión técnica antes de publicarse, y en "
        "los híbridos agregamos el diagnóstico del sistema de alto voltaje. El comprador "
        "puede pedir ese reporte y llevarlo a un tercero si quiere una segunda opinión: nos "
        "parece razonable y no nos molesta.",

        f"El resto de la revisión es la de siempre, la que detallamos en el "
        f"{link(CHECKLIST, 'checklist de 20 puntos')}, y los papeles se verifican antes de "
        f"iniciar el {link(TRASPASO, 'traspaso')}.",

        {"faq": [
            ("¿256.000 kilómetros es demasiado para un Prius?",
             "Es alto, pero no descalificante en este modelo. Los híbridos de Toyota tienen "
             "un historial largo de unidades que superan esa cifra sin intervenciones "
             "mayores, porque el motor de combustión y el sistema de transmisión trabajan "
             "menos que en un auto convencional. Lo determinante es el estado de la batería."),
            ("¿Cada cuánto se cambia la batería de un híbrido?",
             "No hay un plazo fijo. Depende del clima, del tipo de uso y de la limpieza del "
             "sistema de refrigeración. Hay unidades que llegan a kilometrajes muy altos con "
             "la batería original y otras que la necesitan antes. Por eso se mide en lugar "
             "de estimar."),
            ("¿El Prius sirve para carretera en la sierra?",
             "Anda bien y consume poco, aunque su mayor ventaja está en ciudad. En "
             "pendientes largas el motor de gasolina trabaja más y la diferencia frente a un "
             "auto convencional se reduce."),
            ("¿Se puede financiar un auto de este precio?",
             "Sí. En este rango es común el crédito directo con plazos cortos. Cuánto se "
             "pide de entrada depende del plazo y del perfil del comprador."),
        ]},

        f"Para verlo o pedir el reporte de batería, escribí al "
        f"{link(wa('Hola, quiero información del Toyota Prius C y el reporte de estado de la batería.'), 'WhatsApp de OKCars')}. "
        f"La {link(FICHA['prius'][0], 'ficha del Prius C está acá')} y el inventario "
        f"completo en el {link(LISTADO, 'listado de vehículos de OKCars')}. Estamos en "
        f"Ibarra y recibimos compradores de toda Imbabura y del Carchi.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Maxus T60
# ════════════════════════════════════════════════════════════════════════════
maxus = {
    "title": "Maxus T60 diésel usada: precio en Ecuador y duelo con la Hunter",
    "slug": "maxus-t60-diesel-usada-ecuador",
    "date": "2026-09-17T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["Maxus T60", "camionetas diésel usadas", "camionetas chinas",
             "4x4 Ecuador", "seminuevos Ibarra"],
    "excerpt": "Dos camionetas chinas diésel en el mismo patio y a precios parecidos: "
               "una 4x4 del 2024 con 38.500 km y una 4x2 casi nueva. Cuál conviene según "
               "el trabajo que le vayas a dar.",
    "yoast_title": "Maxus T60 diésel usada: precio en Ecuador 2026",
    "yoast_desc": "Una Maxus T60 4x4 del 2024 con 38.500 km cuesta $23.000 en Ibarra. "
                  "Comparada con la Hunter 4x2, qué revisar en el diésel y a quién le sirve cada una.",
    "focus_kw": "maxus t60 precio ecuador",
    "bloques": [
        f"En el patio de OKCars en Ibarra hay dos camionetas chinas diésel al mismo tiempo, "
        f"y la decisión entre ellas es de las más interesantes que se pueden plantear hoy: "
        f"una Maxus T60 Elite {FICHA['maxus'][1]} 4x4 con {FICHA['maxus'][2]} kilómetros a "
        f"{FICHA['maxus'][3]}, y una Changan Hunter {FICHA['hunter'][1]} 4x2 con apenas "
        f"{FICHA['hunter'][2]} kilómetros a {FICHA['hunter'][3]}.",

        "La diferencia de precio entre las dos es menor que la diferencia de lo que cada "
        "una puede hacer. Vale la pena entender qué se está comprando en cada caso.",

        {"h2": "Qué es la Maxus T60"},

        "Maxus es una marca china con origen en el fabricante estatal SAIC, el mismo grupo "
        "que produce vehículos bajo licencia para marcas europeas. La T60 es su camioneta "
        "de doble cabina, pensada para trabajo y con una presencia creciente en flotas "
        "sudamericanas.",

        f"Esta unidad es una versión Elite con motor diésel 2.8, caja manual y tracción "
        f"4x4. Del {FICHA['maxus'][1]}, con {FICHA['maxus'][2]} kilómetros: alrededor de "
        "19.000 kilómetros al año, un uso moderado para una camioneta de trabajo.",

        {"h2": "El punto que cambia todo: 4x4 contra 4x2"},

        "Acá está la decisión real. La Maxus tiene tracción a las cuatro ruedas; la Hunter, "
        "a las dos traseras.",

        "Si tu trabajo es urbano y de carretera —repartos entre Ibarra y Otavalo, materiales "
        "por la Panamericana, herramienta que va del taller a la obra por vía asfaltada— la "
        "4x2 hace el trabajo perfectamente y cuesta menos mantener.",

        "Si en cambio entrás a fincas, a caminos de tierra en épocas de lluvia, a zonas "
        "altas de Cotacachi o Pimampiro, o cargás peso en terreno irregular, la 4x4 deja de "
        "ser un lujo. Una camioneta cargada y sin tracción delantera se queda atascada en "
        "situaciones que a una 4x4 le resultan triviales, y sacarla cuesta tiempo y dinero.",

        {"quote": "Al cliente que duda entre las dos le hacemos una sola pregunta: "
                  "¿cuántas veces al año vas a salir del asfalto con carga? Si la respuesta "
                  "es ninguna, la Hunter le sobra y le queda casi nueva. Si es una vez al "
                  "mes, la Maxus le va a salir más barata aunque tenga más kilómetros.",
         "cite": "Equipo comercial de OKCars"},

        {"h2": "Las dos, lado a lado"},

        {"tabla": [
            ["", "Maxus T60 Elite", "Changan Hunter"],
            ["Año", FICHA['maxus'][1], FICHA['hunter'][1]],
            ["Kilómetros", FICHA['maxus'][2], FICHA['hunter'][2]],
            ["Motor", "Diésel 2.8", "Diésel 1.9"],
            ["Tracción", "4x4", "4x2"],
            ["Caja", "Manual", "Manual"],
            ["Precio", FICHA['maxus'][3], FICHA['hunter'][3]],
        ]},

        f"La lectura rápida: la Maxus cuesta menos, es 4x4 y tiene más motor; la "
        f"{link(FICHA['hunter'][0], 'Hunter')} cuesta más y está prácticamente sin usar. Es "
        "la clásica disyuntiva entre capacidad y estreno, con la particularidad de que acá "
        "la más capaz es la más barata.",

        {"h2": "Qué revisar en un diésel usado"},

        "Una camioneta diésel con 38.500 kilómetros es una unidad joven, pero el diésel "
        "tiene puntos propios que conviene verificar y que no aparecen en un motor a "
        "gasolina.",

        {"ol": [
            "<strong>Humo al arrancar en frío.</strong> Un poco de humo blanco que se "
            "disipa rápido es normal. Humo azul persistente o negro abundante en ralentí no "
            "lo es.",
            "<strong>Estado del filtro de partículas y del sistema de emisiones.</strong> "
            "En camionetas que hicieron sobre todo trayectos cortos puede acumular hollín.",
            "<strong>Fugas en inyectores y líneas de combustible.</strong> Se revisan en "
            "frío, con el motor limpio, para que cualquier humedad sea evidente.",
            "<strong>Correa o cadena de distribución.</strong> Confirmar si ya tocó "
            "servicio según el plan del fabricante.",
            "<strong>Calidad del combustible usado.</strong> El diésel es sensible a la "
            "contaminación; conviene preguntar dónde tanqueaba habitualmente.",
            "<strong>Estado del embrague</strong>, sobre todo si la camioneta trabajó "
            "cargada en pendiente.",
        ]},

        f"El resto de la revisión es la general de cualquier seminuevo: la tenés detallada "
        f"en el {link(CHECKLIST, 'checklist de 20 puntos')}. Y si querés el panorama de la "
        f"categoría completa, escribimos una guía sobre "
        f"{link(DIESEL, 'camionetas diésel usadas en Ecuador')}.",

        {"h2": "El tema de los repuestos"},

        "Es la objeción que más escuchamos con marcas chinas y merece una respuesta "
        "honesta, no un discurso comercial.",

        "Maxus tiene representación en Ecuador y red de posventa, pero es una marca de "
        "menor volumen que Toyota o Chevrolet. En la práctica eso significa que los "
        "consumibles habituales —filtros, pastillas, aceites— se consiguen sin drama, y que "
        "una pieza específica de carrocería o de electrónica puede demorar más y costar "
        "más que en una marca masiva.",

        "Nuestra recomendación en contra es concreta: si tu camioneta es la herramienta con "
        "la que facturás todos los días y no podés parar ni dos días, considerá que ese "
        "riesgo existe. Para uso mixto o para quien tiene un segundo vehículo, la ecuación "
        f"de precio y capacidad de la Maxus es difícil de igualar. Ampliamos el punto en "
        f"nuestra {link(CHINOS, 'guía de autos chinos usados en Ecuador')}.",

        {"h2": "Cuánto cuesta tenerla"},

        "Un diésel moderno consume menos que un motor a gasolina de potencia comparable, y "
        "esa diferencia se amplifica cuando la camioneta trabaja cargada o en pendiente. "
        "Para un uso de trabajo real, el diésel sigue teniendo la mejor cuenta.",

        "En contrapartida, los mantenimientos suelen ser algo más caros: más litros de "
        "aceite, filtros de combustible adicionales y sensibilidad a la calidad del "
        "combustible. Para un vehículo que recorre mucho, la cuenta cierra igual a favor "
        "del diésel; para uno que recorre poco, no tanto.",

        {"h2": "Qué pasa con la reventa"},

        "Una camioneta de trabajo se compra pensando en usarla, pero conviene saber cómo se "
        "comporta el día que toque cambiarla. Las camionetas diésel de doble cabina "
        "mantienen valor mejor que casi cualquier otra categoría en Ecuador, porque hay "
        "demanda sostenida de gente que las necesita para producir. Ese piso de demanda "
        "sostiene el precio de reventa.",

        "El matiz es la marca. Una Toyota o una Chevrolet se venden solas; una china de "
        "menor volumen toma más tiempo y suele cerrar algo por debajo. La compensación es "
        "que también se compró más barata. En términos de dinero perdido durante la "
        "tenencia, la cuenta suele quedar pareja, y quien más pierde es quien cambia de "
        "vehículo cada dos años, sin importar la marca.",

        {"faq": [
            ("¿La Maxus T60 es una buena camioneta de trabajo?",
             "Está diseñada para eso: doble cabina, motor diésel y, en esta versión, "
             "tracción 4x4. Con 38.500 kilómetros la unidad tiene la mayor parte de su vida "
             "útil por delante. Lo que hay que evaluar es la red de posventa disponible "
             "cerca de donde vas a trabajar."),
            ("¿Conviene más la Maxus o la Hunter?",
             "Depende de si salís del asfalto. La Hunter tiene menos kilómetros y es más "
             "nueva, pero es 4x2. La Maxus es 4x4 y cuesta menos. Para trabajo en tierra o "
             "en fincas la Maxus tiene ventaja clara; para uso urbano y carretera, la Hunter "
             "es una unidad casi sin estrenar."),
            ("¿Hay repuestos de Maxus en Imbabura?",
             "Los consumibles de mantenimiento se consiguen con normalidad. Las piezas "
             "específicas se gestionan por la red de la marca y pueden tomar más días que "
             "las de un fabricante de mayor volumen en el país."),
            ("¿Se puede financiar?",
             "Sí, con crédito directo o bancario. En camionetas de trabajo es frecuente que "
             "el comprador entregue su vehículo actual como parte de pago y financie el "
             "saldo."),
        ]},

        f"Si querés ver las dos el mismo día y compararlas manejando, escribí al "
        f"{link(wa('Hola, quiero ver la Maxus T60 y la Changan Hunter de OKCars y compararlas.'), 'WhatsApp de OKCars')}. "
        f"Están las dos en el patio de Ibarra. La "
        f"{link(FICHA['maxus'][0], 'ficha de la Maxus T60')} y el "
        f"{link(LISTADO, 'listado completo')} tienen el detalle. Atendemos a compradores de "
        f"Otavalo, Atuntaqui, Cotacachi, Cayambe y Tulcán.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Renault Koleos
# ════════════════════════════════════════════════════════════════════════════
koleos = {
    "title": "Renault Koleos a $8.500: cuándo una SUV barata sale cara",
    "slug": "renault-koleos-usado-ecuador",
    "date": "2026-09-19T09:00:00",
    "cat": CAT["guias"],
    "tags": ["Renault Koleos", "SUV usada barata", "caja CVT",
             "autos económicos Ecuador", "seminuevos Ibarra"],
    "excerpt": "Es la SUV más barata del patio y la de más kilómetros. Explicamos sin "
               "adornos qué se compra por ese precio, qué riesgo tiene la caja CVT y en "
               "qué caso preferimos que el cliente mire otra cosa.",
    "yoast_title": "Renault Koleos usado en Ecuador: precio y qué revisar",
    "yoast_desc": "Un Koleos 2012 con 276.000 km cuesta $8.500 en Ibarra. Qué se compra "
                  "por ese precio, el riesgo real de la caja CVT y en qué caso no conviene comprarlo.",
    "focus_kw": "renault koleos usado ecuador",
    "bloques": [
        f"El vehículo más barato del inventario de OKCars es un Renault Koleos "
        f"{FICHA['koleos'][1]}, 4x2, motor 2.5 con caja CVT, {FICHA['koleos'][2]} "
        f"kilómetros, a {FICHA['koleos'][3]}. Por menos de nueve mil dólares se lleva una "
        "SUV mediana con caja automática.",

        "Este artículo no va a tratar de convencerte de comprarlo. Va a explicar qué se "
        "compra exactamente por ese precio, para que la decisión sea informada. Hay "
        "compradores para los que este Koleos es exactamente lo que necesitan, y otros "
        "para los que sería un error.",

        {"h2": "Qué es lo que cuesta $8.500"},

        "El Koleos fue la SUV mediana de Renault, desarrollada sobre plataforma compartida "
        "con Nissan. En su momento compitió con vehículos bastante más caros: es un auto "
        "grande, cómodo en carretera y con buen espacio interior. Nada de eso se pierde con "
        "los años.",

        f"Lo que sí pesa es el kilometraje. {FICHA['koleos'][2]} kilómetros en un vehículo "
        f"del {FICHA['koleos'][1]} equivalen a unos 20.000 al año: un uso normal sostenido "
        "durante más de una década. No es un auto maltratado; es un auto que trabajó lo que "
        "le tocaba, durante mucho tiempo.",

        "A esa altura de la vida de un vehículo, el precio ya no refleja lo que el auto "
        "vale como máquina, sino lo que vale como transporte. Y ahí es donde puede ser una "
        "buena compra.",

        {"h2": "El riesgo que hay que nombrar: la caja CVT"},

        "Si hay algo que revisar con lupa en este auto, es la transmisión.",

        "Las cajas CVT no tienen engranajes fijos: usan una banda metálica que se desplaza "
        "sobre poleas cónicas para variar la relación de forma continua. Son suaves y "
        "eficientes, y a la vez son el componente que más caro sale reparar cuando el "
        "kilometraje se acumula, sobre todo si no recibió cambios de aceite específicos a "
        "tiempo.",

        "En una unidad con 276.000 kilómetros, el estado de la CVT define si la compra fue "
        "buena o mala. Las señales de alerta se detectan en la prueba de manejo:",

        {"ul": [
            "Tirones o sacudidas al acelerar desde parado.",
            "Zumbido metálico que sube con las revoluciones.",
            "Demora notoria entre acelerar y que el auto responda.",
            "Revoluciones que suben sin que la velocidad acompañe.",
            "Aceite de transmisión oscuro o con olor a quemado.",
        ]},

        {"quote": "Con un auto de este kilometraje no vendemos ilusiones. Le decimos al "
                  "cliente: manejalo veinte minutos, subí una cuesta con el auto lleno y "
                  "escuchá la caja. Si algo no te gusta, no lo compres. Preferimos perder "
                  "una venta que tener un reclamo a los tres meses.",
         "cite": "Equipo comercial de OKCars"},

        {"h2": "A quién le sirve este Koleos"},

        "Hay un perfil para el que esta compra tiene mucho sentido:",

        {"ul": [
            "Quien necesita una SUV de tamaño real con presupuesto de auto pequeño.",
            "Quien recorre poco al mes y usa el vehículo para trayectos urbanos y "
            "familiares dentro de Imbabura.",
            "Quien tiene mecánico de confianza y no le asusta un mantenimiento correctivo.",
            "Quien busca un segundo vehículo para la casa, no el único.",
        ]},

        {"h2": "Y a quién no se lo recomendamos"},

        "Acá vamos a ser directos, aunque el auto esté en nuestro patio.",

        "<strong>No lo compres si es tu único vehículo y dependés de él para trabajar.</strong> "
        "A este kilometraje, la probabilidad de un gasto correctivo en los próximos dos años "
        "es alta. Puede ser algo menor o puede ser la caja. Si quedarte sin auto una semana "
        "te desarma la vida, este no es el auto.",

        "<strong>No lo compres si tu presupuesto se agota en el precio de compra.</strong> "
        "Un vehículo de esta edad necesita un colchón para mantenimiento. Si los $8.500 son "
        "todo lo que tenés, conviene mirar algo más barato y guardar la diferencia.",

        f"Para esos casos, en el patio hay alternativas: el "
        f"{link(FICHA['tucson11'][0], 'Hyundai Tucson ' + FICHA['tucson11'][1])} con "
        f"{FICHA['tucson11'][2]} km a {FICHA['tucson11'][3]}, o la "
        f"{link(FICHA['captiva'][0], 'Chevrolet Captiva ' + FICHA['captiva'][1])} con solo "
        f"{FICHA['captiva'][2]} km a {FICHA['captiva'][3]}, bastante más nueva.",

        {"h2": "Cómo comprar bien un auto de kilometraje alto"},

        "Si decidís avanzar, estas son las condiciones mínimas que recomendamos exigir en "
        "cualquier patio, incluido el nuestro:",

        {"ol": [
            "Prueba de manejo larga, con cuestas y con el auto cargado.",
            "Revisión por un mecánico de tu confianza, además del taller del vendedor.",
            "Historial de mantenimiento, en particular de la transmisión.",
            "Verificación de multas, gravámenes y prenda antes de cualquier pago.",
            "Presupuesto reservado para mantenimiento correctivo del primer año.",
        ]},

        f"Los puntos técnicos están desarrollados en el "
        f"{link(CHECKLIST, 'checklist de 20 puntos')} y la parte legal en la guía de "
        f"{link(TRASPASO, 'traspaso de vehículo')}. Si vas a financiar, mirá antes "
        f"{link(ENTRADA, 'cuánto piden de entrada')}.",

        {"h2": "Qué mantenimientos esperar el primer año"},

        "Comprar un auto de esta edad con los ojos abiertos significa presupuestar. Estos "
        "son los rubros que con más frecuencia aparecen en unidades de kilometraje alto, "
        "ordenados de más a menos probable:",

        {"ul": [
            "Amortiguadores y bujes de suspensión, que a esta altura suelen estar vencidos.",
            "Bomba de agua, termostato y mangueras del sistema de refrigeración.",
            "Cambio completo del aceite de la transmisión, con el producto específico.",
            "Bujías, cables y filtros, si no hay registro reciente.",
            "Llantas, si las que trae ya tienen varios años de fabricación.",
            "Batería, que rara vez sobrevive más de tres o cuatro años.",
        ]},

        "Ninguno de esos es un gasto catastrófico por separado, pero sumados pueden "
        "representar una parte apreciable del precio del vehículo. Quien compra un auto "
        "barato y lo mantiene termina con un buen auto; quien lo compra barato y lo "
        "descuida termina vendiéndolo a pérdida en dos años.",

        "Nuestra sugerencia concreta es apartar un monto para el primer año desde el "
        "momento de la compra, y hacer los mantenimientos preventivos antes de que se "
        "conviertan en correctivos. Con un vehículo de más de una década, eso marca toda la "
        "diferencia entre una buena compra y un dolor de cabeza.",

        {"faq": [
            ("¿276.000 kilómetros es demasiado?",
             "Es un kilometraje alto que exige revisión mecánica seria antes de comprar. No "
             "descalifica automáticamente al vehículo —hay unidades que superan esa cifra "
             "sin problemas mayores— pero sí cambia el tipo de comprador para el que tiene "
             "sentido y obliga a presupuestar mantenimiento."),
            ("¿Qué tan caro es reparar una caja CVT?",
             "Es una de las reparaciones más costosas de un vehículo de este segmento y "
             "puede acercarse a una fracción importante del precio del auto. Por eso "
             "insistimos tanto en probarla antes de comprar."),
            ("¿Hay repuestos de Renault Koleos en Ecuador?",
             "Renault tiene presencia en el país y los consumibles se consiguen. Al ser un "
             "modelo que ya no se comercializa nuevo, algunas piezas específicas pueden "
             "requerir búsqueda o alternativas del mercado de repuestos."),
            ("¿Se puede financiar un auto de $8.500?",
             "Sí, aunque en este rango los plazos suelen ser más cortos y la entrada "
             "proporcionalmente mayor. Muchos compradores en este segmento pagan de contado "
             "o financian a doce o dieciocho meses."),
        ]},

        f"Si querés probarlo, escribí al "
        f"{link(wa('Hola, quiero agendar una prueba de manejo del Renault Koleos de OKCars.'), 'WhatsApp de OKCars')} "
        f"y lo dejamos listo. La {link(FICHA['koleos'][0], 'ficha del Koleos')} y el "
        f"{link(LISTADO, 'listado de vehículos')} están en el sitio. Estamos en Ibarra.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 6 · Chevrolet Captiva
# ════════════════════════════════════════════════════════════════════════════
captiva = {
    "title": "Chevrolet Captiva Turbo usada: precio en Ecuador y la caja manual",
    "slug": "chevrolet-captiva-turbo-usada-ecuador",
    "date": "2026-09-22T09:00:00",
    "cat": CAT["modelos"],
    "tags": ["Chevrolet Captiva", "SUV usada Ecuador", "caja manual",
             "motor turbo 1.5", "seminuevos Ibarra"],
    "excerpt": "Una SUV del 2022 con menos de 50.000 km por $16.000, con un detalle que "
               "divide compradores: es de caja manual. Qué gana y qué pierde con eso, y "
               "por qué el precio está donde está.",
    "yoast_title": "Chevrolet Captiva usada en Ecuador: precio y consumo",
    "yoast_desc": "Una Captiva LTZ Turbo 2022 con 49.725 km cuesta $16.000 en Ibarra. Qué "
                  "implica su caja manual, cómo consume el motor 1.5 turbo y qué revisar antes.",
    "focus_kw": "chevrolet captiva usada ecuador",
    "bloques": [
        f"Hay una Chevrolet Captiva LTZ Turbo {FICHA['captiva'][1]} en el patio de OKCars "
        f"con {FICHA['captiva'][2]} kilómetros, a {FICHA['captiva'][3]}. Para el año y el "
        "kilometraje que tiene, el precio llama la atención de casi todos los que la miran.",

        "Hay una razón, y no está escondida: es de caja manual.",

        {"h2": "Por qué la caja manual mueve el precio"},

        "En el mercado ecuatoriano de SUV usadas, la caja automática domina. La mayoría de "
        "compradores de este segmento la busca, y los patios lo saben. Una unidad manual "
        "tarda más en venderse y por eso suele quedar en un precio más bajo que una "
        "automática comparable.",

        "Eso es una desventaja si vas a revender pronto, y una oportunidad si vas a "
        "quedarte con el auto. Estás pagando menos por el mismo vehículo, con el mismo "
        "motor, el mismo equipamiento y los mismos años, a cambio de manejar con embrague.",

        "Para quien sabe manejar mecánico y no le molesta, la cuenta es sencilla: hay un "
        "ahorro concreto sobre la mesa. Para quien maneja en tráfico pesado todos los días, "
        "o para quien nunca usó caja manual, esa diferencia se paga en incomodidad diaria.",

        {"quote": "La Captiva manual es el auto que más rápido se vende cuando llega el "
                  "cliente correcto y el que más tiempo se queda cuando no. No tratamos de "
                  "convencer a nadie: si el comprador maneja automático desde hace diez "
                  "años, le mostramos otra cosa y todos salimos mejor.",
         "cite": "Equipo comercial de OKCars"},

        {"h2": "Lo que también trae la caja manual"},

        "El asunto no es solo de precio y comodidad. Hay ventajas técnicas reales que "
        "conviene poner sobre la mesa:",

        {"ul": [
            "<strong>Mantenimiento más simple y barato.</strong> Una caja manual tiene "
            "menos componentes que fallar que una automática moderna.",
            "<strong>Mejor control en pendiente.</strong> En la sierra norte, con subidas "
            "largas hacia Cotacachi o hacia el Carchi, poder elegir la marcha ayuda.",
            "<strong>Consumo levemente menor</strong> en manos de un conductor que sabe "
            "usarla.",
            "<strong>Reparación menos costosa.</strong> Un embrague se reemplaza; una caja "
            "automática dañada suele salir bastante más caro.",
        ]},

        "El costo del otro lado es conocido: en tráfico urbano denso, el embrague cansa, y "
        "el disco es una pieza de desgaste que en algún momento toca cambiar.",

        {"h2": "El motor 1.5 turbo"},

        "La versión LTZ Turbo monta un motor 1.5 turboalimentado. Es la tendencia de toda "
        "la industria: cilindrada chica con turbo, para dar potencia de un motor más grande "
        "consumiendo como uno pequeño.",

        "En la práctica funciona bien y consume razonablemente para el tamaño del vehículo. "
        "El punto que sí requiere disciplina es el mantenimiento: un motor turbo es más "
        "exigente con el aceite que uno atmosférico. El turbo trabaja a temperaturas altas y "
        "depende del aceite para lubricarse y enfriarse.",

        {"ol": [
            "Cambios de aceite en el intervalo indicado, sin estirarlos.",
            "Aceite de la especificación que pide el fabricante, no uno genérico.",
            "Historial de mantenimiento verificable, sobre todo en un turbo.",
            "Revisión de fugas y de holgura en el eje del turbo.",
            "Estado del intercooler y de las mangueras de presión.",
        ]},

        "Si el vendedor no puede mostrar historial de cambios de aceite en un motor turbo, "
        "eso por sí solo es motivo para bajar la oferta o retirarse. Lo decimos para "
        "cualquier compra, no únicamente para esta.",

        {"h2": "Contra qué compite"},

        f"A {FICHA['captiva'][3]} y con {FICHA['captiva'][2]} kilómetros, la Captiva se "
        "ubica en un punto interesante del inventario:",

        {"tabla": [
            ["Vehículo", "Año", "Kilómetros", "Precio", "Caja"],
            ["Chevrolet Captiva LTZ Turbo", FICHA['captiva'][1], FICHA['captiva'][2],
             FICHA['captiva'][3], "Manual"],
            ["Hyundai Tucson iX", FICHA['tucson11'][1], FICHA['tucson11'][2],
             FICHA['tucson11'][3], "Automática"],
            ["Kia Seltos", FICHA['seltos'][1], FICHA['seltos'][2], FICHA['seltos'][3],
             "Automática"],
            ["Ford Territory", FICHA['territory'][1], FICHA['territory'][2],
             FICHA['territory'][3], "Automática"],
        ]},

        f"Frente al {link(FICHA['tucson11'][0], 'Tucson del ' + FICHA['tucson11'][1])}, la "
        "Captiva es diez años más nueva y tiene una fracción de sus kilómetros, por un "
        f"precio parecido. Frente al {link(FICHA['seltos'][0], 'Seltos')} y al "
        f"{link(FICHA['territory'][0], 'Territory')}, cuesta cuatro mil quinientos dólares "
        "menos, y la diferencia principal es la caja.",

        "Ese es el trato. Si manejás mecánico, la Captiva es probablemente el vehículo con "
        "mejor relación año-kilometraje-precio del patio en este momento. Si no, hay tres "
        "automáticas esperando.",

        {"h2": "Respaldo y garantía"},

        "Chevrolet tiene una de las redes de servicio más extendidas del país, y en "
        "Imbabura eso se traduce en repuestos disponibles y talleres que conocen el "
        "producto. Para un comprador que valora no depender de una sola opción de "
        "servicio, es un punto a favor frente a marcas de menor volumen.",

        f"La unidad pasó por revisión técnica antes de publicarse, y el detalle de lo que "
        f"revisamos está en el {link(CHECKLIST, 'checklist de 20 puntos')}. Los papeles se "
        f"verifican antes de iniciar el {link(TRASPASO, 'traspaso')}.",

        {"h2": "Cómo saber si la caja manual es para vos"},

        "Antes de decidir por precio, conviene ser honesto con el uso real que le vas a dar "
        "al vehículo. Estas preguntas resuelven la duda mejor que cualquier argumento:",

        {"ol": [
            "¿Cuántos minutos al día pasás en tráfico detenido? Si son más de cuarenta, la "
            "caja manual se vuelve trabajo.",
            "¿Vas a manejar vos siempre, o el auto lo usan varias personas de la casa? Si "
            "alguien no maneja mecánico, el auto queda inutilizable para esa persona.",
            "¿Tu recorrido habitual tiene pendientes con semáforos? Arrancar en cuesta con "
            "embrague desgasta más y cansa más.",
            "¿Planeás quedarte con el auto más de tres años? Si sí, la desventaja de "
            "reventa importa poco y el ahorro de compra pesa mucho.",
        ]},

        "Una prueba de manejo larga responde estas preguntas mejor que cualquier lista. "
        "Recomendamos hacerla en hora pico, no en domingo por la mañana: si el auto te "
        "sigue gustando en el tráfico de Ibarra un martes a las seis de la tarde, es tu "
        "auto.",

        {"faq": [
            ("¿Por qué la Captiva cuesta menos que otras SUV del mismo año?",
             "Principalmente por la caja manual, que tiene menos demanda en este segmento "
             "en Ecuador. El vehículo en sí es más nuevo y tiene menos kilómetros que "
             "varias alternativas de precio similar."),
            ("¿El motor 1.5 turbo es confiable?",
             "Funciona bien si recibe el mantenimiento que pide, en particular cambios de "
             "aceite puntuales con la especificación correcta. Los motores turbo son menos "
             "tolerantes al descuido que los atmosféricos."),
            ("¿Cuánto consume una Captiva 1.5 turbo?",
             "Para el tamaño del vehículo, el consumo es contenido gracias a la cilindrada "
             "pequeña y al turbo. Varía bastante entre ciudad y carretera; en la prueba de "
             "manejo se puede ver el consumo real en el tablero."),
            ("¿Es difícil revender una SUV manual?",
             "Toma más tiempo que una automática porque el universo de compradores es menor. "
             "Si el plan es conservarla varios años, ese factor pesa poco; si es cambiarla "
             "en un año, conviene considerarlo."),
        ]},

        f"Si manejás mecánico y querés probarla, escribí al "
        f"{link(wa('Hola, quiero agendar una prueba de manejo de la Chevrolet Captiva Turbo de OKCars.'), 'WhatsApp de OKCars')}. "
        f"La {link(FICHA['captiva'][0], 'ficha de la Captiva')} y el "
        f"{link(LISTADO, 'listado completo de vehículos')} están en el sitio. Estamos en "
        f"Ibarra y atendemos a compradores de Otavalo, Atuntaqui, Cayambe y Tulcán.",
    ],
}


if __name__ == "__main__":
    for spec in (tang, crosstrek, prius, maxus, koleos, captiva):
        guarda(spec)
        print("  spec escrito:", spec["slug"])
