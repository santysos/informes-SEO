#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote D — tanda de diciembre 2026 de Comercial Hidrobo: 8 posts de modelos (temas 26-33 del plan).

Ángulo de comparativa o «para quién sirve» para no competir con las fichas /vehiculos/…
Datos técnicos: web oficial de cada marca en Ecuador (o la página del modelo en el sitio de CH
cuando la oficial no se puede leer), citados en «fuentes». Precios: solo PRECIOS de comun.py.

Uso: python3 lote_d.py && python3 publish_batch.py --validate
"""
from comun import *

S = SITE
def P(path): return f"{S}{path}"

FICHA = {
    "alsvin": P("/vehiculos/changan-alsvin-plus/"), "arrizo": P("/vehiculos/chery-arrizo-3/"),
    "raize": P("/vehiculos/raize/"), "yaris_cross": P("/vehiculos/yaris-cross/"),
    "corolla_cross": P("/vehiculos/corolla-cross/"),
    "m60": P("/vehiculos/changan-m60/"), "honor": P("/vehiculos/changan-honor-s/"),
    "star_truck": P("/vehiculos/changan-star-truck/"), "fiorino": P("/vehiculos/fiat-fiorino/"),
    "fiat600": P("/vehiculos/fiat-600/"), "pulse": P("/vehiculos/fiat-pulse/"),
    "avenger": P("/vehiculos/jeep-avenger/"), "compass": P("/vehiculos/jeep-compass-2/"),
    "rich7": P("/vehiculos/rich-7/"), "rich6": P("/vehiculos/dongfeng-rich-6/"),
    "ram700": P("/vehiculos/ram-700/"), "cx60": P("/vehiculos/mazda-cx-60/"),
    "cx5": P("/vehiculos/mazda-cx-5/"), "cx90": P("/vehiculos/mazda-cx-90/"),
}
def pr(m): return f"${PRECIOS[m]}"


# ═══════════════════════════════════════════════════════════════════════════════════════
# 26 · Changan Alsvin Plus vs Chery Arrizo 5 Pro Max
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=26,
    title="Changan Alsvin Plus vs Chery Arrizo 5 Pro Max: dos sedanes al mismo precio, dos formas de gastar el dinero",
    slug="changan-alsvin-plus-vs-chery-arrizo-5-pro-max",
    categories=[48, 59],
    excerpt=("Cuestan lo mismo, $16.990, y los dos son sedanes chinos con motor 1.5. La diferencia está en "
             "qué trae cada uno: airbags, baúl, potencia y garantía, comparados con datos oficiales."),
    meta={"_yoast_wpseo_title": "Alsvin Plus vs Arrizo 5 Pro Max: cuál sedán conviene",
          "_yoast_wpseo_metadesc": ("Los dos arrancan en $16.990. Comparamos airbags, potencia, baúl y garantía "
                                    "con datos oficiales para que sepa cuál calza con su uso en Imbabura."),
          "_yoast_wpseo_focuskw": "alsvin plus vs arrizo 5 pro max"},
    fuentes=["https://www.changanecuador.com/vehiculos/alsvin-plus",
             "https://admin.changanecuador.com/uploads/ALSVIN_PLUS_a37850f4ca.pdf",
             "https://www.changanecuador.com/postventa/garant%C3%ADa",
             "https://www.chery.com.ec/vehiculo/arrizo-5-pro-max",
             "https://www.chery.com.ec/posventa"],
    content="\n\n".join([
        p("Si su presupuesto para un auto nuevo está alrededor de los $17.000 y quiere un sedán, en nuestro catálogo "
          "hay dos que empatan exacto en precio: el Changan Alsvin Plus y el Chery Arrizo 5 Pro Max, ambos desde "
          f"{pr('Changan Alsvin Plus')}. Los dos son chinos, los dos llevan motor 1.5 a gasolina con caja manual de "
          "cinco velocidades y los dos apuntan al mismo comprador: quien deja el bus o el taxi, o quien cambia un "
          "sedán usado por uno con garantía."),
        p("Con el precio empatado, la decisión se mueve a otra parte. Uno pone más dinero en seguridad pasiva y "
          "espacio; el otro, en potencia y en una calificación de choque. Aquí los comparamos con los datos que "
          "publican Changan Ecuador y Chery Ecuador, sin adornos, y le decimos a quién le sirve cada uno. Si ya leyó "
          f"{a(P('/chery/chery-arrizo-5-equipamiento-sedan/'), 'nuestra revisión del equipamiento del Arrizo 5 Pro Max')}, "
          "este artículo es el siguiente paso: ponerlo frente a su rival directo."),

        h2("La respuesta corta: Alsvin Plus para familia, Arrizo 5 para quien maneja mucho en carretera"),
        p("El <strong>Alsvin Plus</strong> trae <strong>cuatro airbags</strong> contra dos del Arrizo, un baúl de "
          "<strong>500 litros</strong>, llave inteligente y frenos de disco en las cuatro ruedas, según la página de "
          "Changan Ecuador. Si va a llevar niños o viaja con la cajuela llena, esa diferencia pesa."),
        p("El <strong>Arrizo 5 Pro Max</strong> tiene <strong>114 HP</strong> contra 102 HP del Alsvin, una "
          "calificación de cinco estrellas en C-NCAP (la prueba de choque china) que Chery publica, control de "
          "estabilidad y asistente de arranque en pendiente. Para quien sube y baja la Panamericana todas las semanas, "
          "esos 12 caballos se notan al rebasar."),

        h2("Los números oficiales, uno al lado del otro"),
        table(["", "Changan Alsvin Plus", "Chery Arrizo 5 Pro Max"], [
            ["Precio desde", pr("Changan Alsvin Plus"), pr("Chery Arrizo 5 Pro Max")],
            ["Motor", "1.5 L gasolina, cadena de distribución", "1.5 L ACTECO DVVT, cadena de distribución"],
            ["Potencia", "102 HP", "114 HP a 6.150 rpm"],
            ["Torque", "145 Nm", "141 Nm a 3.800 rpm"],
            ["Caja", "Manual de 5 velocidades", "Manual de 5 velocidades"],
            ["Airbags", "4", "2"],
            ["Frenos", "Disco en las 4 ruedas", "Disco ventilado adelante, disco sólido atrás"],
            ["Ayudas electrónicas", "ABS, EBD, ESP, TCS, BA y arranque en pendiente", "ABS, ESP y arranque en pendiente (HAC)"],
            ["Pantalla", "Apple CarPlay y Android Auto", "8 pulgadas, Apple CarPlay y Android Auto"],
            ["Baúl", "500 litros", "Chery no lo publica en su página"],
            ["Prueba de choque", "Changan no la publica", "5 estrellas C-NCAP"],
        ], "Datos de changanecuador.com y chery.com.ec, noviembre de 2026. " + NOTA_PRECIOS),

        h2("Seguridad: cuatro airbags contra cinco estrellas"),
        p("Aquí está el centro de la comparación, porque cada marca juega una carta distinta. Changan suma "
          "bolsas de aire: el Alsvin Plus lleva cuatro, frontales y laterales, más una lista larga de ayudas "
          "electrónicas que incluye control de tracción y asistencia de frenado de emergencia."),
        p("Chery pone por delante el resultado de una prueba: cinco estrellas en C-NCAP, con una estructura que "
          "llama «Safe Cage». El Arrizo trae dos airbags, control de estabilidad, cámara de retro con guías "
          "dinámicas y cuatro sensores de reversa."),
        p("¿Cuál pesa más? Una calificación de choque mide cómo se comporta la carrocería; los airbags laterales "
          "protegen en el impacto de costado, que es el más común en los cruces de ciudad. Si en su casa el auto va a "
          "llevar a la familia entera, nosotros nos inclinamos por los cuatro airbags. Si maneja casi siempre solo, "
          "la ventaja del Alsvin se achica."),

        h2("Motor: la diferencia se siente subiendo, no en la ciudad"),
        p("En el tráfico de Ibarra los dos motores se comportan parecido. El Arrizo tiene 12 HP más y el Alsvin "
          "tiene un poco más de torque (145 contra 141 Nm), así que en arranques y a baja velocidad no hay un ganador "
          "claro."),
        p("La diferencia aparece en carretera y en altura. Subiendo de Ibarra hacia Cayambe o cruzando el páramo "
          "rumbo a Tulcán, la potencia extra del Arrizo le da algo más de margen para rebasar un camión con el auto "
          "cargado. No es una diferencia enorme, pero si hace ese trayecto cada semana, la va a notar."),
        p("Un dato que comparten y que conviene valorar: los dos usan <strong>cadena de distribución</strong> y no "
          "banda. Eso le ahorra un cambio de banda que en otros autos de este precio llega entre los 60.000 y los "
          "100.000 km."),

        cta_temprano("¿Quiere manejarlos uno detrás del otro?",
                     "Le preparamos la prueba de manejo de los dos sedanes el mismo día, en la ruta que usted maneja.",
                     "Pedir prueba de manejo por WhatsApp",
                     "Hola, vengo del artículo de Alsvin Plus vs Arrizo 5 Pro Max. Quisiera hacer la prueba de manejo "
                     "de los dos sedanes.", reserva=False),

        h2("Espacio y equipamiento: lo que se usa todos los días"),
        p("El Alsvin Plus es el más nuevo de los dos y se nota en la lista: luces LED, espejos con ajuste y plegado "
          "eléctrico, llave inteligente que abre el maletero a distancia, asiento del conductor con ajuste eléctrico y "
          "tapizado en eco-cuero, según la página de Changan Ecuador. Pregunte qué de eso trae la versión de entrada, "
          "porque la página muestra el modelo completo."),
        p("El Arrizo 5 Pro Max responde con pantalla de 8 pulgadas, aros de aleación de 16 pulgadas, faros "
          "posteriores LED y vidrios eléctricos en las cuatro puertas. Los faros delanteros son halógenos de "
          f"proyección. Si quiere el detalle versión por versión, está en {a(P('/chery/arrizo-5-pro-max-2025-precio-en-ecuador/'), 'la ficha técnica y versiones del Arrizo 5 Pro Max')}."),
        p("Los 500 litros de baúl del Alsvin son una cifra alta para un sedán de este tamaño. Chery no publica la "
          "capacidad del maletero en su página, así que si el espacio es decisivo para usted, lo mejor es ir con la "
          "maleta o el coche de bebé y probar los dos."),

        h2("Garantía y mantenimiento: lo que cuesta después de firmar"),
        p("Changan Ecuador publica una garantía de <strong>5 años o 150.000 km</strong> para motor y componentes en "
          "vehículos de 2024 en adelante, y de 3 años o 100.000 km para carrocería."),
        p("Chery maneja un plan de mantenimiento prepagado de cuatro mantenimientos o tres años con precios "
          "congelados, según su página de posventa. Las condiciones de la garantía de fábrica las explicamos en "
          f"{a(P('/consejos/garantia-chery-ecuador-cobertura/'), 'cómo funciona la garantía Chery')}."),
        p("Los dos se atienden en nuestros talleres de Ibarra, Cayambe y Tulcán, así que el mantenimiento no "
          "le obliga a viajar a Quito."),

        quote("Cuando dos autos cuestan lo mismo, la pregunta útil es quién va sentado atrás. Si son sus hijos, "
              "miramos primero los airbags; si va solo por carretera, miramos el motor."),

        h2("Cuándo ninguno de los dos le conviene"),
        ul([
            "<strong>Si necesita caja automática.</strong> Las páginas oficiales muestran los dos con caja manual de cinco velocidades. Pregunte por disponibilidad antes de enamorarse de uno.",
            "<strong>Si va a entrar seguido a caminos de tierra.</strong> Un sedán tiene poca altura al piso; para fincas o vías lastradas, un SUV compacto le va a durar más.",
            f"<strong>Si busca el menor precio posible.</strong> El {a(P('/vehiculos/alsvin-v3/'), 'Changan V3')} arranca en {pr('Changan V3')}, dos mil dólares menos.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuál gasta menos combustible, el Alsvin Plus o el Arrizo 5?",
             "Ninguna de las dos marcas publica el consumo en su página de Ecuador. Con motores 1.5 de potencia similar y "
             "la misma caja, la diferencia real depende más de cómo maneja usted que del auto."),
            ("¿Cuál tiene más espacio atrás?",
             "Changan publica 500 litros de baúl para el Alsvin Plus; Chery no publica el dato del Arrizo. Para el espacio "
             "de piernas atrás, lo honesto es sentarse en los dos: en el concesionario se resuelve en cinco minutos."),
            ("¿Los dos tienen Apple CarPlay y Android Auto?",
             "Sí. Las páginas oficiales de las dos marcas lo incluyen. El Arrizo especifica pantalla de 8 pulgadas."),
            ("¿Dónde puedo ver los dos en el norte del país?",
             f"En Comercial Hidrobo los tenemos en el mismo portafolio. Puede ver las fichas del {a(FICHA['alsvin'], 'Alsvin Plus')} "
             f"y del {a(FICHA['arrizo'], 'Arrizo 5 Pro Max')}, o escribirnos al {WHATSAPP_TXT} para coordinar la visita."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 27 · Toyota Raize vs Yaris Cross
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=27,
    title="Toyota Raize vs Yaris Cross: qué se compra con los $12.000 de diferencia",
    slug="toyota-raize-vs-yaris-cross",
    categories=[48, 56],
    excerpt=("El Raize arranca en $20.000 y el Yaris Cross en $31.990. No es el mismo auto con más equipo: "
             "uno es un SUV urbano a gasolina y el otro es híbrido. Cuándo se justifica pagar la diferencia."),
    meta={"_yoast_wpseo_title": "Toyota Raize vs Yaris Cross: cuál conviene en Ecuador",
          "_yoast_wpseo_metadesc": ("Casi $12.000 los separan. Motor, caja, sistema híbrido y seguridad comparados "
                                    "para decidir si el Yaris Cross vale la diferencia o le basta el Raize."),
          "_yoast_wpseo_focuskw": "raize vs yaris cross"},
    fuentes=["https://www.comercialhidrobo.com/toyota/toyota-raize/",
             "https://www.comercialhidrobo.com/toyota/toyota-yaris-cross/",
             "https://www.toyota.com.ec/modelos/raize"],
    content="\n\n".join([
        p("Entre los SUV pequeños de Toyota hay dos que se parecen en el tamaño y en nada más. El Raize arranca en "
          f"{pr('Toyota Raize')} y el Yaris Cross en {pr('Toyota Yaris Cross')}. Son casi doce mil dólares de "
          "diferencia, y quien los compara en la vitrina suele preguntar lo mismo: ¿qué tiene el Yaris Cross que "
          "cueste tanto más?"),
        p("La respuesta no está en el tamaño de la pantalla ni en los aros. Está debajo del capó: el Raize es un "
          "SUV urbano con motor a gasolina de tres cilindros y el Yaris Cross es un híbrido autorrecargable. "
          "Comparamos los dos con los datos técnicos que Toyota entrega para Ecuador y que publicamos en las "
          "páginas de cada modelo, y le decimos en qué casos la diferencia se paga sola y en cuáles no."),

        h2("La respuesta corta: el Raize para presupuesto, el Yaris Cross para quien maneja mucho"),
        p("Si su uso es ciudad, pocos kilómetros al mes y el presupuesto manda, el <strong>Raize</strong> le da la "
          "marca Toyota, la red de servicio y un SUV fácil de estacionar por el precio más bajo de la gama. Puede "
          "elegirlo con caja manual o automática."),
        p("Si maneja a diario, pasa horas en tráfico o viaja seguido entre ciudades, el <strong>Yaris Cross</strong> "
          "le da más potencia, caja automática de serie y el paquete de seguridad Toyota Safety Sense. El ahorro de "
          "combustible ayuda, pero ojo: solo con gasolina no se recuperan doce mil dólares."),

        h2("Los datos técnicos, lado a lado"),
        table(["", "Toyota Raize", "Toyota Yaris Cross"], [
            ["Precio desde", pr("Toyota Raize"), pr("Toyota Yaris Cross")],
            ["Motor", "1.198 cc, 3 cilindros, gasolina", "1.490 cc, 3 cilindros, híbrido"],
            ["Potencia", "87 HP a 6.000 rpm", "114 HP combinados"],
            ["Torque", "113 Nm a 4.500 rpm", "120 Nm"],
            ["Transmisión", "Manual de 5 velocidades o automática CVT", "Automática CVT"],
            ["Tracción", "4x2", "4x2"],
            ["Seguridad destacada", "Según versión", "Toyota Safety Sense (TSS)"],
            ["Conectividad", "Pantalla táctil con Apple CarPlay y Android Auto", "Según versión"],
        ], "Datos técnicos de las páginas de modelo de comercialhidrobo.com con la información de Toyota del Ecuador. "
           + NOTA_PRECIOS),

        h2("El motor: 87 contra 114 caballos, y eso en la sierra se nota"),
        p("El Raize usa un motor de 1.2 litros y tres cilindros con 87 HP. En la ciudad alcanza sin problema: el "
          "auto es liviano y el motor está pensado para eso. Donde se queda justo es subiendo con cuatro personas y "
          "equipaje, por ejemplo en la cuesta de Ibarra hacia Otavalo o en los tramos largos de la Panamericana hacia "
          "Tulcán."),
        p("El Yaris Cross suma 114 HP entre el motor a gasolina de 1.5 litros y el eléctrico. El motor eléctrico "
          "entrega su fuerza desde parado, lo que se siente en cada arranque del semáforo y en las subidas cortas. "
          "Para quien vive en Imbabura, esa diferencia de respuesta es más importante que el consumo."),

        h2("Cómo funciona el híbrido del Yaris Cross, en dos líneas"),
        p("Es un híbrido autorrecargable: no se enchufa. La batería se carga con el motor y con la energía que se "
          "recupera al frenar y al bajar pendientes. En tráfico lento, el auto puede moverse con el motor eléctrico; "
          "en carretera, trabajan los dos."),
        p("Las bajadas largas de la sierra norte le juegan a favor: cada descenso recarga la batería que después usa "
          "en la subida. Si quiere entender qué pasa con esa batería con los años, lo explicamos en "
          f"{a(P('/vehiculos-electricos-e-hibridos/bateria-auto-hibrido-duracion-costo-garantia-ecuador/'), 'cuánto dura la batería de un híbrido')}."),

        cta_temprano("¿Quiere sentir la diferencia en una subida?",
                     "Agendamos la prueba de manejo del Raize y del Yaris Cross en la misma ruta, para que compare con sus propios pies.",
                     "Pedir prueba de manejo por WhatsApp",
                     "Hola, vengo del artículo de Toyota Raize vs Yaris Cross. Quisiera hacer la prueba de manejo de los dos.",
                     reserva=False),

        h2("¿Se paga la diferencia con el ahorro de gasolina?"),
        p("Hagamos la cuenta sin trampas. La diferencia de precio de entrada es de casi $12.000. Si el híbrido le "
          "ahorrara, por decir una cifra, $50 al mes en combustible, tardaría unos veinte años en recuperarla. "
          "Con $100 al mes, unos diez. Haga la cuenta con su gasto real de hoy."),
        p("Por eso no recomendamos el Yaris Cross como una inversión en combustible. Lo recomendamos cuando el comprador "
          "valora además la caja automática, la potencia extra y el paquete de seguridad Toyota Safety Sense. "
          "Sumando todo, la diferencia tiene sentido para quien maneja mucho y piensa quedarse el auto varios años. "
          f"Los números completos de un híbrido están en {a(P('/vehiculos-electricos-e-hibridos/ahorro-real-de-un-auto-hibrido-en-ecuador/'), 'el ahorro real de un auto híbrido en Ecuador')}."),

        h2("Mantenimiento: los dos con la misma red de taller"),
        p("Ambos siguen el plan de mantenimiento de Toyota por kilometraje, que detallamos en "
          f"{a(P('/cuidado-del-vehiculo-y-mantenimiento/tabla-mantenimiento-toyota-kilometraje/'), 'la tabla de mantenimiento Toyota')}. "
          "El híbrido suma revisiones del sistema eléctrico, pero tiene una ventaja que pocos conocen: el frenado "
          "regenerativo hace que las pastillas de freno duren más."),
        p("En Comercial Hidrobo damos servicio Toyota en Ibarra, así que el mantenimiento de cualquiera de los "
          "dos se hace cerca de casa."),

        h2("Y si ninguno de los dos le convence: el paso intermedio"),
        p(f"Entre el Yaris Cross y el {a(FICHA['corolla_cross'], 'Corolla Cross')} (desde {pr('Toyota Corolla Cross')}) hay "
          "solo dos mil dólares. Si su prioridad es espacio para la familia, vale la pena verlo antes de cerrar. "
          f"Lo comparamos con su rival directo en {a(P('/comparativas-y-decisiones-inteligentes/toyota-corolla-cross-vs-mazda-cx-30-comparativa-suv-hibridos/'), 'Corolla Cross vs Mazda CX-30')}."),

        quote("El Raize no es un Yaris Cross barato ni el Yaris Cross es un Raize caro. Son dos respuestas a dos "
              "preguntas distintas: cuánto quiere gastar hoy y cuánto va a manejar los próximos cinco años."),

        h2("Cuándo el Yaris Cross NO le conviene"),
        ul([
            "<strong>Si maneja menos de 800 km al mes.</strong> El ahorro de combustible será pequeño y la diferencia de precio pesa más.",
            "<strong>Si quiere caja manual.</strong> El Yaris Cross solo viene con automática CVT; el Raize le da a elegir.",
            "<strong>Si necesita entrar a caminos de tierra con frecuencia.</strong> Los dos son 4x2 y están pensados para asfalto.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿El Yaris Cross se enchufa?",
             "No. Es un híbrido autorrecargable: la batería se carga sola con el motor y al frenar. No necesita cargador "
             "en casa."),
            ("¿El Raize tiene caja automática?",
             "Sí. Además de la versión manual de cinco velocidades, hay versión automática CVT. El precio desde de "
             f"{pr('Toyota Raize')} corresponde a la versión de entrada; confirme con el asesor el valor de la automática."),
            ("¿Cuál tiene más potencia para la sierra?",
             "El Yaris Cross, con 114 HP combinados frente a 87 HP del Raize. En subidas con el auto lleno, la diferencia "
             "se siente."),
            ("¿Dónde veo las fichas completas?",
             f"En las fichas del {a(FICHA['raize'], 'Toyota Raize')} y del {a(FICHA['yaris_cross'], 'Yaris Cross')}. "
             f"Para la prueba de manejo, escríbanos al {WHATSAPP_TXT}."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 28 · Vans Changan M60 y Honor S
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=28,
    title="Changan M60 y Honor S: cuál van le sirve a su negocio, carga o pasajeros",
    slug="vans-changan-m60-honor-s",
    categories=[43, 59],
    excerpt=("Las dos cuestan $16.990, pero no hacen el mismo trabajo. La Honor S es una van de carga de 590 kg y "
             "3,4 m³; la M60 que publica Changan Ecuador lleva 11 pasajeros. Cómo elegir según su negocio."),
    meta={"_yoast_wpseo_title": "Changan M60 o Honor S: qué van le sirve a su negocio",
          "_yoast_wpseo_metadesc": ("Las dos desde $16.990. Carga útil, volumen, asientos y motor comparados con "
                                    "datos oficiales para elegir entre reparto, transporte de personal o los dos."),
          "_yoast_wpseo_focuskw": "changan m60 honor s"},
    fuentes=["https://www.changanecuador.com/vehiculos/honor",
             "https://admin.changanecuador.com/uploads/Ficha_HONOR_S_V2_603115b7eb.pdf",
             "https://www.changanecuador.com/vehiculos/m60",
             "https://admin.changanecuador.com/uploads/Ficha_M60_V5_78e4c0dbcd.pdf",
             "https://www.changanecuador.com/postventa/garant%C3%ADa"],
    content="\n\n".join([
        p("Para un negocio pequeño, la primera van es una decisión más importante que el primer auto de la familia. "
          "Se compra para trabajar, se paga con el trabajo y, si se elige mal, hay que cargarla con viajes de más o "
          f"dejar mercadería en el local. Changan tiene dos opciones al mismo precio, desde {pr('Changan Honor S')}: "
          "la Honor S y la M60."),
        p("Parecen hermanas y no hacen lo mismo. La Honor S es una van de carga de dos asientos. La M60, en la ficha "
          "que publica Changan Ecuador, es una van de 11 pasajeros, y la marca menciona también una versión M60 Cargo. "
          "Aquí ordenamos los datos oficiales de las dos para que elija por el trabajo que va a hacer, que es lo que "
          "importa."),

        h2("La respuesta corta: Honor S para reparto, M60 para mover gente"),
        p("Si su negocio reparte mercadería, hace instalaciones o lleva herramientas, la <strong>Honor S</strong> es "
          "la que corresponde: <strong>590 kg de carga útil y 3,4 m³ de volumen</strong>, con dos puertas corredizas "
          "laterales y portón posterior."),
        p("Si necesita llevar personal, turistas o estudiantes, la <strong>M60 de pasajeros</strong> lleva "
          "<strong>11 personas</strong> y declara 825 kg de capacidad de carga, con un motor algo más potente. Si lo que "
          "busca es la M60 Cargo, pregunte al asesor por disponibilidad y ficha, porque Changan Ecuador publica la "
          "ficha técnica de la versión de pasajeros."),

        h2("Ficha contra ficha"),
        table(["", "Changan Honor S Cargo", "Changan M60 Pasajeros"], [
            ["Precio desde", pr("Changan Honor S"), pr("Changan M60")],
            ["Motor", "1.480 cc, 4 cilindros, MPFI", "1.499 cc, 4 cilindros, inyección directa"],
            ["Potencia", "95 HP a 5.500 rpm", "107 HP a 6.000 rpm"],
            ["Torque", "137 Nm a 4.500 rpm", "153 Nm a 4.500 rpm"],
            ["Caja y tracción", "Manual de 5, tracción posterior", "Manual de 5, tracción posterior"],
            ["Capacidad de carga", "590 kg", "825 kg"],
            ["Volumen de carga", "3,4 m³", "No aplica (asientos)"],
            ["Ocupantes", "2", "11"],
            ["Largo / alto", "4.450 mm / 1.810 mm", "4.498 mm / 1.990 mm"],
            ["Distancia entre ejes", "2.750 mm", "3.000 mm"],
            ["Tanque", "42 litros", "50 litros"],
            ["Airbags", "2 delanteros", "Changan no los lista en la ficha"],
        ], "Fichas técnicas oficiales de Changan Ecuador, noviembre de 2026. " + NOTA_PRECIOS),

        h2("Honor S: lo que la hace buena para reparto"),
        p("Para trabajo de distribución, tres datos de su ficha cuentan más que la potencia. Primero, las "
          "<strong>dos puertas corredizas laterales</strong>: en una calle estrecha del centro de Ibarra o de Otavalo, "
          "poder cargar desde la vereda sin abrir hacia el tráfico ahorra tiempo y golpes. Segundo, el portón "
          "posterior de apertura vertical, que sirve de techo cuando descarga con lluvia. Tercero, su tamaño: 4,45 m "
          "de largo, casi lo mismo que un sedán, para estacionar donde una camioneta no entra."),
        p("En seguridad, Changan le da control de estabilidad, airbags delanteros, ABS con asistencia de frenado, "
          "cámara y sensor de reversa y monitor de presión de neumáticos. La cámara pesa en una van sin ventanas "
          "atrás: es la diferencia entre retroceder a ciegas y hacerlo bien."),

        h2("M60: más motor y más espacio para quien transporta personas"),
        p("La M60 de pasajeros tiene 25 cm más de distancia entre ejes que la Honor S y 18 cm más de altura. Ese "
          "espacio extra es el que permite tres filas de asientos detrás del conductor. Su motor de 107 HP y 153 Nm, "
          "con inyección directa, le da más margen cuando va llena."),
        p("Trae anclajes ISOFIX, monitor de presión de neumáticos, sensor de reversa y aire acondicionado con salidas "
          "laterales en la fila delantera, según su ficha. La suspensión trasera es de ballestas, la misma solución de "
          "las camionetas de trabajo, pensada para soportar peso."),

        cta_temprano("¿Ya sabe cuánto carga por viaje?",
                     "Cuéntenos qué transporta y cuántos kilos por viaje, y le decimos cuál de las dos le conviene y su precio final.",
                     "Cotizar por WhatsApp",
                     "Hola, vengo del artículo de las vans Changan M60 y Honor S. Quisiera una cotización. Lo que transporto es: ___",
                     reserva=False),

        h2("Cómo calcular la van que necesita, en tres pasos"),
        ol([
            "<strong>Pese su carga típica.</strong> Sume lo que lleva en un viaje normal, no en el mejor día. Si pasa de 500 kg con frecuencia, la Honor S trabaja al límite.",
            "<strong>Mida el volumen.</strong> Hay cargas livianas que ocupan mucho, como colchones, muebles o cajas vacías. Ahí manda el volumen de 3,4 m³ y no los kilos.",
            "<strong>Cuente sus rutas.</strong> Si sale de Ibarra hacia Tulcán o hacia Quito con la van llena, la subida pide motor. Si reparte dentro de la ciudad, la Honor S alcanza.",
        ]),

        h2("Garantía: el respaldo que se usa en un vehículo de trabajo"),
        p("Las dos fichas oficiales anuncian <strong>garantía de 5 años o 150.000 km</strong>. Una van de trabajo "
          "suma kilómetros rápido, así que conviene preguntar al comprar qué componentes cubre cada plazo y qué "
          "mantenimientos hay que cumplir para conservarla."),
        p("El mantenimiento de las dos se hace en nuestros talleres de Ibarra, Cayambe y Tulcán. Si la van es su "
          "herramienta de trabajo, agendar con anticipación evita perder un día de reparto."),

        h2("Otras opciones del portafolio si ninguna calza"),
        p(f"Si su carga es más pesada o necesita balde abierto, el {a(FICHA['star_truck'], 'Changan Star Truck')} es un "
          f"camión de carga ligero desde {pr('Changan Star Truck')}. Si prefiere una furgoneta más pequeña para reparto "
          f"urbano, está la {a(FICHA['fiorino'], 'Fiat Fiorino')} desde {pr('Fiat Fiorino')}. Y si duda entre van y "
          f"camioneta, revise {a(P('/autos-nuevos/camionetas-para-negocio-entrega/'), 'nuestra guía de camionetas para negocio')}."),

        quote("En una van de trabajo no se elige por el precio, que aquí es el mismo. Se elige por el viaje más "
              "pesado que va a hacer en el mes, no por el promedio."),

        h2("Cuándo una van no le conviene"),
        ul([
            "<strong>Si su ruta incluye caminos de tierra o fincas.</strong> Las dos son de tracción posterior y altura modesta; para eso, una camioneta.",
            "<strong>Si su carga se ensucia o se moja.</strong> Arena, abono o material de construcción van mejor en un balde que se lava con manguera.",
            "<strong>Si necesita llevar carga y más de un acompañante.</strong> La Honor S tiene dos asientos; una camioneta doble cabina resuelve las dos cosas.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuánto carga la Changan Honor S?",
             "Hasta 590 kg de carga útil y 3,4 m³ de volumen, con peso bruto vehicular de 1.800 kg, según la ficha "
             "oficial de Changan Ecuador."),
            ("¿La M60 es de carga o de pasajeros?",
             "La ficha técnica que publica Changan Ecuador es de la M60 de pasajeros, con 11 asientos. La marca menciona "
             "también una M60 Cargo; confirme con el asesor qué versión hay disponible."),
            ("¿Las dos usan banda o cadena de distribución?",
             "Las dos usan cadena de distribución, según Changan Ecuador. Eso evita el cambio periódico de banda."),
            ("¿Puedo verlas en Cayambe o en Tulcán?",
             f"Sí. Changan tiene a Comercial Hidrobo Cayambe y Tulcán en su red. Revise las fichas de la {a(FICHA['honor'], 'Honor S')} "
             f"y de la {a(FICHA['m60'], 'M60')}, o escríbanos al {WHATSAPP_TXT}."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 29 · Fiat 600 Hybrid
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=29,
    title="Fiat 600 Hybrid: qué es un híbrido de 48 V y a quién le sirve este SUV italiano",
    slug="fiat-600-hybrid-para-quien-sirve",
    categories=[55, 58],
    excerpt=("El Fiat 600 Hybrid cuesta desde $27.999 y lleva un sistema híbrido de 48 V. Qué hace ese sistema, "
             "qué no hace y frente a qué otros SUV del mismo precio conviene ponerlo antes de decidir."),
    meta={"_yoast_wpseo_title": "Fiat 600 Hybrid: qué es y para quién sirve en Ecuador",
          "_yoast_wpseo_metadesc": ("Desde $27.999, con motor turbo y sistema de 48 V. Qué hace ese híbrido, qué no, "
                                    "y cómo se compara con el Jeep Avenger y el Yaris Cross antes de comprar."),
          "_yoast_wpseo_focuskw": "fiat 600 hybrid"},
    fuentes=["https://www.comercialhidrobo.com/fiat/fiat-600/",
             "https://www.jeep.com/ec/avenger-e-hybrid.html",
             "https://www.comercialhidrobo.com/toyota/toyota-yaris-cross/"],
    content="\n\n".join([
        p(f"El Fiat 600 Hybrid llegó al catálogo con un precio desde {pr('Fiat 600 Hybrid')} y una palabra que hoy "
          "vende sola: híbrido. Pero no todos los híbridos son iguales, y quien compra un 600 esperando lo mismo que "
          "un Toyota híbrido puede llevarse una sorpresa, buena o mala, según lo que buscaba."),
        p("Este artículo no repite la ficha. Explica qué tipo de híbrido es el 600, qué hace su sistema de 48 V en el "
          "día a día de Ibarra o Quito, y frente a qué otros SUV del mismo rango de precio conviene ponerlo antes de "
          "firmar. Los datos técnicos son los de la página del modelo en nuestro sitio; el sitio de Fiat Ecuador no "
          "se pudo consultar al preparar este texto."),

        h2("La respuesta corta: un SUV urbano con ayuda eléctrica, no un auto que anda solo con batería"),
        p("El 600 Hybrid combina un motor turbo de tres cilindros con un motor eléctrico de 21 kW alimentado por "
          "una batería de iones de litio de <strong>48 voltios</strong>. Juntos entregan <strong>107 HP</strong>. El "
          "sistema eléctrico ayuda al motor en los arranques y en la aceleración, que es justo donde un motor a "
          "gasolina gasta más."),
        p("Le sirve a quien maneja sobre todo en ciudad, quiere un SUV con diseño distinto y valora la marca "
          "italiana. No es la elección para quien busca el máximo ahorro de combustible del mercado: para eso existen "
          "los híbridos completos y los enchufables, que cuestan más."),

        h2("Qué es un híbrido de 48 V, sin tecnicismos"),
        p("Piense en tres escalones. En el primero están los híbridos de 48 V como el 600: un motor eléctrico pequeño "
          "que empuja junto al de gasolina, recupera energía al frenar y hace más suaves los arranques y paradas. En el "
          "segundo, los híbridos completos como el Yaris Cross, con más batería y capacidad de moverse en eléctrico en "
          "el tráfico. En el tercero, los enchufables, que se cargan en casa y hacen decenas de kilómetros sin gasolina."),
        p("Cada escalón cuesta más que el anterior y ahorra más. El de 48 V es el más barato de los tres y, por "
          "eso, el que menos cambia la cuenta de combustible. Las cuatro tecnologías las explicamos con ejemplos en "
          f"{a(P('/vehiculos-electricos-e-hibridos/diferencia-phev-hev-reev-ev-ecuador/'), 'PHEV, HEV, REEV y EV explicados')}."),

        h2("Lo que trae el 600, según su ficha"),
        ul([
            "Motor T-Gen3 de 3 cilindros turboalimentado, con 74 kW, más el motor eléctrico de 21 kW: 107 HP combinados.",
            "Batería de iones de litio de 48 V.",
            "Radio Uconnect de 10 pulgadas con navegación, audio de seis parlantes y cargador inalámbrico para el celular.",
            "Sensor y cámara de retroceso.",
            "Llantas de 16 pulgadas en la versión de acceso y de aleación de 18 pulgadas en la más equipada.",
        ]),
        p("El turbo tiene una ventaja que en la sierra cuenta: un motor turboalimentado pierde menos fuerza con la "
          "altura que uno atmosférico. Subiendo de Ibarra hacia el páramo de El Ángel, eso se agradece."),

        cta_temprano("¿Quiere probarlo en su ruta?",
                     "Agendamos la prueba de manejo del Fiat 600 Hybrid para que sienta cómo responde en subida y en tráfico.",
                     "Pedir prueba de manejo por WhatsApp",
                     "Hola, vengo del artículo del Fiat 600 Hybrid. Quisiera agendar una prueba de manejo.",
                     reserva=False),

        h2("Frente a qué otros SUV ponerlo antes de decidir"),
        table(["Modelo", "Desde", "Tipo de motorización", "Para quién"], [
            ["Fiat 600 Hybrid", pr("Fiat 600 Hybrid"), "Turbo con sistema de 48 V, 107 HP", "Ciudad, diseño, marca italiana"],
            ["Jeep Avenger", pr("Jeep Avenger"), "1.2 turbo con sistema de 48 V, 100 CV", "Quien quiere ayudas de terreno de Jeep"],
            ["Toyota Yaris Cross", pr("Toyota Yaris Cross"), "Híbrido completo, 114 HP", "Quien maneja mucho en tráfico"],
            ["Fiat Pulse", pr("Fiat Pulse"), "Gasolina, versión Drive", "Presupuesto más ajustado dentro de Fiat"],
        ], "Datos: página del Fiat 600 en comercialhidrobo.com, jeep.com/ec y página del Yaris Cross en comercialhidrobo.com. "
           + NOTA_PRECIOS),
        p(f"El rival más directo es el {a(FICHA['avenger'], 'Jeep Avenger')}: cuesta $500 más y Jeep Ecuador lo "
          "describe con un motor 1.2 turbo y batería de 48 V, una arquitectura parecida. La diferencia está en el "
          "carácter: el Avenger suma control de descenso y modos de terreno. Si duda entre los dos, maneje ambos el "
          "mismo día."),
        p(f"Si la idea de un híbrido es gastar mucho menos, mire el Yaris Cross: cuesta cuatro mil dólares más, pero "
          "es un híbrido completo. Y si el presupuesto manda, el Pulse está seis mil dólares abajo; lo revisamos en "
          f"{a(P('/autos-nuevos/fiat-pulse-2026-precio-ecuador/'), 'la guía del Fiat Pulse')}."),

        h2("Mantenimiento y taller: qué cambia con un 48 V"),
        p("Un híbrido de 48 V se mantiene casi igual que un auto a gasolina: aceite, filtros, frenos y revisiones por "
          "kilometraje. El sistema eléctrico se revisa en el mismo servicio, con el escáner del taller autorizado. No "
          "hay que cargarlo, no tiene cable y no cambia su rutina."),
        p(f"El servicio Fiat lo hacemos en el norte del país; lo que incluye está en {a(P('/fiat/taller-fiat-ecuador-mantenimiento-repuestos/'), 'mantenimiento y repuestos Fiat en Ecuador')}. "
          "Pregunte al comprar por la garantía de fábrica de la batería de 48 V y sus condiciones."),

        h2("Qué preguntar antes de firmar"),
        ul([
            "Qué versión corresponde al precio desde y qué equipamiento trae: aros, pantalla y asistencias cambian entre versiones.",
            "Qué garantía tiene la batería de 48 V y qué mantenimientos hay que cumplir para conservarla.",
            "Cuánto cuestan los mantenimientos hasta los 50.000 km, para compararlo con el Avenger o el Yaris Cross.",
        ]),

        quote("Un híbrido de 48 V no cambia su forma de manejar ni le pide un cargador. Le cambia la forma en que el "
              "auto arranca y acelera, y ahí es donde más se nota en el tráfico de la ciudad."),

        h2("Cuándo el Fiat 600 Hybrid NO le conviene"),
        ul([
            "<strong>Si su objetivo principal es gastar lo mínimo en combustible.</strong> Un híbrido completo o un enchufable ahorran más.",
            "<strong>Si entra seguido a caminos de tierra.</strong> Es un SUV urbano; para fincas o lastre hay opciones con más altura y tracción.",
            "<strong>Si necesita siete asientos o un maletero grande.</strong> El 600 es compacto, pensado para pareja o familia pequeña.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿El Fiat 600 Hybrid se enchufa?",
             "No. La batería de 48 V se recarga sola con el motor y al frenar. No necesita cargador ni cambia su rutina."),
            ("¿Cuánta potencia tiene?",
             "107 HP combinados, entre el motor turbo de tres cilindros (74 kW) y el eléctrico (21 kW), según la ficha "
             "del modelo."),
            ("¿Es mejor que el Jeep Avenger?",
             "Usan una arquitectura parecida, con motor turbo y sistema de 48 V. El 600 cuesta $500 menos; el Avenger "
             "suma ayudas de terreno propias de Jeep. La decisión suele ser de diseño y de uso."),
            ("¿Dónde lo veo en el norte del país?",
             f"En Comercial Hidrobo, en Ibarra. La ficha está en {a(FICHA['fiat600'], 'Fiat 600 Hybrid')} y puede escribirnos "
             f"al {WHATSAPP_TXT} para coordinar la prueba."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 30 · Jeep Avenger vs Fiat Pulse
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=30,
    title="Jeep Avenger vs Fiat Pulse: qué recibe por los $6.500 de diferencia",
    slug="jeep-avenger-vs-fiat-pulse",
    categories=[48, 55],
    excerpt=("El Pulse arranca en $21.999 y el Avenger en $28.499. Los dos son SUV compactos del mismo grupo, "
             "pero el Avenger suma sistema híbrido de 48 V, caja automática de doble embrague y ayudas Jeep."),
    meta={"_yoast_wpseo_title": "Jeep Avenger vs Fiat Pulse: cuál SUV compacto elegir",
          "_yoast_wpseo_metadesc": ("$6.500 los separan. Qué agrega el Avenger con su híbrido de 48 V y su caja "
                                    "automática, y cuándo el Pulse le alcanza de sobra para la ciudad y la familia."),
          "_yoast_wpseo_focuskw": "jeep avenger vs fiat pulse"},
    fuentes=["https://www.jeep.com/ec/avenger-e-hybrid.html",
             "https://www.comercialhidrobo.com/fiat/fiat-pulse/",
             "https://www.comercialhidrobo.com/autos-nuevos/fiat-pulse-2026-precio-ecuador/"],
    content="\n\n".join([
        p("El Jeep Avenger y el Fiat Pulse vienen del mismo grupo automotriz y compiten por el mismo cliente: quien "
          f"quiere un SUV compacto, nuevo y con marca de tradición. El Pulse arranca en {pr('Fiat Pulse')} y el "
          f"Avenger en {pr('Jeep Avenger')}. Entre los dos hay $6.500, la cuota inicial de muchos créditos."),
        p("La pregunta, entonces, no es cuál es mejor, sino qué se lleva por esos $6.500 y si a usted le sirve. "
          "Usamos los datos que publica Jeep Ecuador para el Avenger y el catálogo de Comercial Hidrobo para el Pulse. "
          f"Si todavía no conoce el Fiat, empiece por {a(P('/autos-nuevos/fiat-pulse-2026-precio-ecuador/'), 'nuestra guía del Fiat Pulse')} y vuelva aquí para la comparación."),

        h2("La respuesta corta: el Pulse si el presupuesto manda, el Avenger si quiere automático e híbrido"),
        p("El <strong>Pulse Drive</strong> es la forma más económica de tener un SUV de marca italiana en el "
          "catálogo: un auto a gasolina, sin sistema híbrido, pensado para ciudad y carretera."),
        p("El <strong>Avenger e-Hybrid</strong> agrega lo que el Pulse no tiene: un motor 1.2 turbo con sistema "
          "eléctrico de <strong>48 V</strong>, caja automática de doble embrague de seis velocidades con levas al "
          "volante, <strong>205 Nm</strong> de torque y las ayudas de manejo en terreno de Jeep. Si va a manejar en "
          "tráfico todos los días, la caja automática sola ya vale buena parte de la diferencia."),

        h2("Qué le da el Avenger, según Jeep Ecuador"),
        ul([
            "Motor 1.2 L turbo con motor eléctrico de 48 V: potencia total de hasta 100 CV.",
            "Torque máximo de 205 Nm, que Jeep presenta como el mayor de su clase.",
            "Caja automática eDCT de doble embrague y 6 velocidades, con paletas en el volante.",
            "Control de descenso de pendientes y selector de terreno.",
            "Protección de carrocería de 360° con plástico resistente a rayones.",
            "Sistemas de asistencia al conductor ADAS; la versión más equipada declara nivel II, techo panorámico y portón eléctrico.",
            "Velocidad máxima declarada de 184 km/h.",
        ]),
        p("En el catálogo de Comercial Hidrobo el Avenger aparece en las versiones Altitude y Summit. Pregunte qué "
          "incluye cada una: el precio desde corresponde a la de entrada."),

        h2("La comparación en una tabla"),
        table(["", "Fiat Pulse", "Jeep Avenger"], [
            ["Precio desde", pr("Fiat Pulse"), pr("Jeep Avenger")],
            ["Versión del catálogo", "Drive", "Altitude y Summit"],
            ["Motorización", "Gasolina, sin sistema híbrido", "1.2 turbo con sistema de 48 V, hasta 100 CV"],
            ["Torque", "Ver ficha del modelo", "205 Nm"],
            ["Caja", "Ver ficha del modelo", "Automática de doble embrague, 6 velocidades"],
            ["Ayudas de terreno", "No se anuncian", "Control de descenso y selector de terreno"],
            ["Diferencia de precio", "—", "$6.500 más"],
        ], "Datos del Avenger: jeep.com/ec. Datos del Pulse: catálogo y página del modelo en comercialhidrobo.com. "
           + NOTA_PRECIOS),

        cta_temprano("¿Le ayudamos a decidir con el volante en la mano?",
                     "Podemos agendar la prueba de manejo del Pulse y del Avenger el mismo día, en Ibarra.",
                     "Pedir prueba de manejo por WhatsApp",
                     "Hola, vengo del artículo de Jeep Avenger vs Fiat Pulse. Quisiera hacer la prueba de manejo de los dos.",
                     reserva=False),

        h2("El torque es lo que más se nota en la sierra"),
        p("Los 205 Nm del Avenger son una cifra alta para un motor de 1.2 litros. El torque es la fuerza que sienta "
          "cuando pisa el acelerador a pocas revoluciones: al salir de un semáforo en subida, al incorporarse a la "
          "Panamericana o al rebasar con el auto lleno rumbo a Otavalo o a Cayambe."),
        p("El turbo, además, pierde menos fuerza con la altura que un motor atmosférico. Para quien vive a más de "
          "2.000 metros, como en Ibarra, esa diferencia se siente desde la primera prueba de manejo."),

        h2("¿Y el «Jeep» del Avenger sirve fuera del asfalto?"),
        p("Con honestidad: el Avenger es un SUV compacto y Jeep Ecuador no anuncia tracción 4x4 en su página. Lo que "
          "sí trae es control de descenso de pendientes y un selector de modos de terreno, que ayudan en una entrada "
          "de tierra, en lastre mojado o en la bajada a una finca."),
        p(f"Si su uso incluye caminos difíciles de verdad, el paso siguiente dentro de la marca es el {a(FICHA['compass'], 'Jeep Compass')}, "
          f"desde {pr('Jeep Compass')}. Para lastre ocasional, el Avenger cumple mejor que la mayoría de SUV urbanos."),

        h2("Tecnología a bordo: lo que se usa cada día"),
        p("Jeep Ecuador destaca en el Avenger los servicios Uconnect con conectividad integrada y un paquete de "
          "asistencias al conductor (ADAS) que, en la versión más equipada, Jeep declara de nivel II. Pida al asesor la "
          "lista exacta de asistencias de cada versión. Esa misma versión suma techo panorámico y portón trasero eléctrico."),
        p("Las paletas al volante de la caja de doble embrague tienen un uso muy concreto en la sierra: en una bajada "
          "larga, como la de Cayambe hacia Tabacundo, permiten reducir una marcha y frenar con el motor sin recalentar "
          "los frenos."),

        h2("Mantenimiento: los dos en el mismo taller"),
        p("El Avenger y el Pulse pertenecen al mismo grupo y se atienden en la misma red de servicio. El sistema de "
          "48 V del Avenger se revisa con el escáner del taller autorizado en cada mantenimiento; no necesita cargarse "
          "ni cambia la rutina de servicio. Pregunte al comprar por la garantía de fábrica de la batería de 48 V y por "
          "el costo de los mantenimientos de los primeros 50.000 km de cada modelo: es la cifra que completa la "
          "comparación de precio."),

        h2("Cómo pensar los $6.500, en cuotas"),
        p("Si financia, esa diferencia no se paga de golpe. Se reparte en las cuotas del crédito, y conviene verla así "
          "antes de descartar el Avenger por precio. Pida al asesor la cuota mensual de los dos con la misma entrada y "
          "el mismo plazo: la diferencia mensual es la cifra con la que tiene que decidir."),
        p(f"Las opciones de crédito que manejamos están en {a(FINANCIAMIENTO, 'financiamiento de autos en Comercial Hidrobo')}."),

        quote("Cuando dos SUV del mismo grupo se separan por $6.500, lo que hay que mirar es la caja y el motor. El "
              "resto del equipamiento se parece más de lo que dice el precio."),

        h2("Cuándo el Avenger NO le conviene"),
        ul([
            "<strong>Si su presupuesto está cerrado en $22.000.</strong> El Pulse cumple para ciudad y carretera, y el ahorro le alcanza para seguro y matrícula.",
            "<strong>Si prefiere caja manual.</strong> El Avenger de Ecuador viene con caja automática de doble embrague.",
            "<strong>Si necesita 4x4 real para trabajo o finca.</strong> Mire el Compass o una camioneta.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿El Jeep Avenger es híbrido?",
             "Sí, es un híbrido de 48 V: un motor 1.2 turbo con un motor eléctrico que ayuda en la aceleración y en los "
             "arranques. No se enchufa."),
            ("¿El Fiat Pulse es híbrido?",
             "La versión Drive del catálogo de Comercial Hidrobo no se vende como híbrida. Si quiere un Fiat con sistema "
             f"de 48 V, el modelo es el {a(FICHA['fiat600'], 'Fiat 600 Hybrid')}, desde {pr('Fiat 600 Hybrid')}."),
            ("¿El Avenger tiene tracción 4x4?",
             "Jeep Ecuador no anuncia tracción 4x4 para el Avenger. Trae control de descenso y selector de terreno, que "
             "ayudan en caminos de tierra livianos."),
            ("¿Dónde veo las fichas?",
             f"En las fichas del {a(FICHA['avenger'], 'Jeep Avenger')} y del {a(FICHA['pulse'], 'Fiat Pulse')}. Para la "
             f"prueba de manejo, escríbanos al {WHATSAPP_TXT}."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 31 · DongFeng Rich 7 vs Rich 6 Pro
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=31,
    title="DongFeng Rich 7 vs Rich 6 Pro: cuándo vale la pena subir a la pickup nueva",
    slug="dongfeng-rich-7-vs-rich-6-pro",
    categories=[48, 51],
    excerpt=("Cargan lo mismo, 1.005 kg, y remolcan lo mismo, 3.000 kg. La Rich 7 suma motor diésel de 163 hp y "
             "420 Nm, caja de seis marchas y pantalla de 13 pulgadas. Cuándo se justifican los $6.000 extra."),
    meta={"_yoast_wpseo_title": "Rich 7 vs Rich 6 Pro: diferencias y cuál conviene",
          "_yoast_wpseo_metadesc": ("Misma carga y mismo balde, distinto motor y caja. Comparamos las dos pickups "
                                    "DongFeng con datos oficiales para que sepa si le conviene pagar la diferencia."),
          "_yoast_wpseo_focuskw": "rich 7 vs rich 6"},
    fuentes=["https://dongfeng.ec/modelo/rich-7/",
             "https://dongfeng.ec/modelo/nueva-rich-6-pro-diesel/",
             "https://dongfeng.ec/modelo/rich-6-gasolina/"],
    content="\n\n".join([
        p("La Rich 6 es la pickup DongFeng que más se ve trabajando en Imbabura y Carchi. La Rich 7 es la nueva, "
          f"y la pregunta que más nos hacen es si vale la pena el salto: la Rich 6 Pro arranca en {pr('DongFeng Rich 6 Pro')} "
          f"y la Rich 7 en {pr('DongFeng Rich 7')}, $6.000 más."),
        p("Ya escribimos sobre la Rich 6 por separado, en "
          f"{a(P('/dongfeng/dongfeng-rich-6-pro-ecuador-pickup/'), 'la Rich 6 Pro frente a las marcas tradicionales')}. "
          "Aquí ponemos las dos una al lado de la otra con los datos que publica DongFeng Ecuador, para que sepa qué "
          "cambia, qué se mantiene y para qué tipo de trabajo tiene sentido pagar más."),

        h2("La respuesta corta: la Rich 7 si su trabajo pide motor, la Rich 6 Pro si pide balde"),
        p("Las dos cargan <strong>1.005 kg</strong>, remolcan <strong>3.000 kg</strong> y tienen exactamente el mismo "
          "balde: 1,51 m de largo, 1,56 m de ancho y 47,5 cm de alto. Si su trabajo es llevar peso por caminos "
          "conocidos, la Rich 6 Pro hace lo mismo por menos."),
        p("La <strong>Rich 7</strong> se justifica cuando importa cómo llega con esa carga: viene con el motor diésel "
          "2.3 turbo de geometría variable con <strong>163 hp y 420 Nm</strong>, caja manual de <strong>seis</strong> "
          "marchas, mejores ángulos para el campo y una cabina más moderna."),

        h2("Lado a lado, con los datos de DongFeng Ecuador"),
        table(["", "Rich 6 Pro", "Rich 7"], [
            ["Precio desde", pr("DongFeng Rich 6 Pro"), pr("DongFeng Rich 7")],
            ["Motores", "2.4 L gasolina (156 hp, 240 Nm) o 2.3 L turbo diésel M9T (140 hp)", "2.3 L turbo diésel M9T de geometría variable"],
            ["Potencia y torque diésel", "140 hp", "163 hp y 420 Nm"],
            ["Caja", "Manual de 5 velocidades", "Manual de 6 velocidades"],
            ["Tracción", "4x2; diésel también 4x4 (2H, 4H, 4L)", "4x2 o 4x4 (2H, 4H, 4L)"],
            ["Carga / arrastre", "1.005 kg / 3.000 kg", "1.005 kg / 3.000 kg"],
            ["Ángulo de entrada / salida", "31° / 26°", "33° / 25°"],
            ["Suspensión trasera", "Ballesta con amortiguadores de doble acción", "Ballesta con amortiguadores de doble acción y barra estabilizadora"],
            ["Pantalla", "Táctil de 10 pulgadas", "Flotante de 13 pulgadas"],
        ], "Datos de dongfeng.ec, noviembre de 2026. El precio desde de la Rich 6 Pro corresponde a la versión de entrada. "
           + NOTA_PRECIOS),

        h2("El motor: la diferencia que se siente con el balde lleno"),
        p("Las dos diésel usan el mismo bloque M9T de origen Renault-Nissan, de 2.3 litros. La Rich 7 lo trae afinado "
          "con más potencia: 163 hp contra 140 hp de la Rich 6 Pro diésel, y 420 Nm de torque."),
        p("¿Dónde se nota? Con una tonelada en el balde subiendo de Ibarra hacia Cayambe, o en las cuestas entre "
          "Tulcán y San Gabriel. Más torque significa menos cambios de marcha y menos esfuerzo del motor. La sexta "
          "marcha de la Rich 7 se agradece en la Panamericana: el motor va más descansado a velocidad de crucero."),
        p("Si su Rich va a trabajar sobre todo dentro de la ciudad, con cargas medianas, esa diferencia pierde peso."),

        cta_temprano("¿Quiere probarlas con carga?",
                     "Cuéntenos qué lleva y por dónde, y le armamos la comparación de las dos pickups con precio final de cada versión.",
                     "Cotizar por WhatsApp",
                     "Hola, vengo del artículo de DongFeng Rich 7 vs Rich 6 Pro. Quisiera cotización y prueba de manejo de las dos.",
                     reserva=False),

        h2("En el campo: ángulos, estabilidad y tracción"),
        p("Las dos ofrecen versiones 4x4 con modos 2H, 4H y 4L, así que en tracción la Rich 6 Pro diésel no se queda "
          "atrás. Donde la Rich 7 gana es en geometría: su ángulo de entrada de 33° frente a 31° le deja enfrentar una "
          "rampa o una cuneta un poco más pronunciada sin golpear el frente. DongFeng le declara un ángulo máximo de "
          "ascenso de 40°."),
        p("Atrás, la Rich 7 suma una barra estabilizadora a las ballestas. En curvas de montaña con carga alta, esa "
          "barra reduce el balanceo de la caja. Para quien lleva sacos o tanques en las vías de Pimampiro o del valle "
          "del Chota, es un detalle práctico."),

        h2("Seguridad y cabina: el salto generacional"),
        p("La Rich 7 trae airbags delanteros, cámara y sensores de parqueo, ABS con EBD, asistencia de frenado, "
          "asistente de arranque en pendiente y control de tracción. La Rich 6 Pro tiene una lista parecida: cámara "
          "de reversa con línea guía, sensores posteriores, monitor de presión de neumáticos, ABS con EBD, asistencia "
          "en pendiente y control de tracción."),
        p("Donde la diferencia se ve es en la cabina. La Rich 7 tiene pantalla flotante de 13 pulgadas con Apple "
          "CarPlay y Android Auto y volante en eco-cuero. Si la pickup es también el auto de la familia el fin de "
          "semana, eso pesa."),

        h2("Antes de comparar con la Rich 7: ¿gasolina o diésel?"),
        p("Dentro de la Rich 6 Pro hay una decisión previa. La versión a gasolina 2.4, de 156 hp y 240 Nm, es la de "
          "entrada y viene solo en 4x2. La diésel 2.3 cuesta más, pero ofrece 4x4 y el torque del turbo diésel, que "
          "es lo que mueve una tonelada en subida."),
        p("Una regla práctica que usamos con los clientes: si la pickup va a pasar más de la mitad del tiempo cargada "
          "o en caminos de tierra, la comparación correcta es Rich 6 Pro diésel contra Rich 7, no la de gasolina. Y "
          "entre esas dos, la diferencia de precio se achica. Pida al asesor el precio de las dos diésel en la misma "
          "tracción antes de decidir."),

        h2("Garantía y servicio"),
        p(f"Las condiciones de garantía de DongFeng con nosotros están en {a(P('/dongfeng/garantia-dongfeng-comercial-hidrobo/'), 'la garantía DongFeng en Comercial Hidrobo')}. "
          "Las dos se atienden en nuestros talleres de Ibarra, Cayambe y Tulcán con repuestos de la marca."),

        quote("Si las dos cargan lo mismo, la pregunta no es cuánto lleva sino por dónde. En ciudad la Rich 6 Pro "
              "cumple; en cuestas largas con el balde lleno, el motor de la Rich 7 se gana su precio."),

        h2("Cuándo la Rich 7 NO le conviene"),
        ul([
            "<strong>Si su carga típica es liviana y su ruta es urbana.</strong> La Rich 6 Pro a gasolina hace el trabajo por menos.",
            "<strong>Si necesita más de 1.005 kg de carga útil.</strong> Las dos tienen el mismo límite; para más, hay que mirar otra categoría.",
            "<strong>Si quiere caja automática.</strong> DongFeng Ecuador publica las dos con caja manual.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿La Rich 7 carga más que la Rich 6?",
             "No. Las dos tienen 1.005 kg de capacidad de carga y 3.000 kg de arrastre, con el mismo balde. La diferencia "
             "está en el motor y la caja."),
            ("¿Las dos tienen motor diésel?",
             "La Rich 7 es diésel. La Rich 6 Pro tiene versión a gasolina 2.4 y versión diésel 2.3 M9T. El precio desde "
             f"de {pr('DongFeng Rich 6 Pro')} corresponde a la versión de entrada; confirme el de la diésel con el asesor."),
            ("¿La Rich 7 es 4x4?",
             "Hay versiones 4x2 y 4x4 con modos 2H, 4H y 4L, según DongFeng Ecuador."),
            ("¿Dónde veo las fichas?",
             f"En las fichas de la {a(FICHA['rich7'], 'Rich 7')} y de la {a(FICHA['rich6'], 'Rich 6 Pro')}. También "
             f"comparamos la Rich 6 con su rival en {a(P('/comparativas-y-decisiones-inteligentes/dongfeng-rich-6-vs-changan-hunter-plus/'), 'Rich 6 vs Changan Hunter Plus')}."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 32 · RAM 700
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=32,
    title="RAM 700: la pickup compacta y para quién sirve (y para quién no)",
    slug="ram-700-pickup-compacta-para-quien-sirve",
    categories=[57, 43],
    excerpt=("La RAM 700 cuesta desde $21.999, carga 650 kg y tiene doble cabina para cinco. No es una pickup "
             "mediana más pequeña: es otra herramienta. A qué negocios y familias les calza mejor."),
    meta={"_yoast_wpseo_title": "RAM 700: para quién sirve esta pickup compacta",
          "_yoast_wpseo_metadesc": ("Carga 650 kg, doble cabina y precio desde $21.999. Qué trabajos hace bien, "
                                    "cuáles no y frente a qué otras opciones conviene compararla antes de comprar."),
          "_yoast_wpseo_focuskw": "ram 700"},
    fuentes=["https://www.ram.com/ec/ram-700.html"],
    content="\n\n".join([
        p(f"La RAM 700 tiene algo raro para una pickup: es pequeña a propósito. Con precio desde {pr('RAM 700')}, "
          "RAM Ecuador la presenta como la primera pickup compacta de cuatro puertas, con espacio para cinco "
          "personas y un balde que carga 650 kg. Está a medio camino entre un auto y una camioneta de trabajo pesado."),
        p("Eso la hace perfecta para algunos compradores y una mala compra para otros. En este artículo no repetimos "
          "la ficha, que está en la página del modelo: explicamos con los datos de RAM Ecuador para qué trabajos sirve, "
          "dónde se queda corta y contra qué otras opciones del portafolio conviene medirla."),

        h2("La respuesta corta: para quien necesita balde en la ciudad, no para el trabajo pesado"),
        p("La RAM 700 le sirve a quien lleva carga mediana dentro de la ciudad o entre ciudades cercanas y también "
          "usa el vehículo para la familia: un técnico que carga herramientas, un pequeño comercio que reparte, una "
          "familia que va los fines de semana a la finca por carretera asfaltada."),
        p("No le sirve a quien carga más de 650 kg con frecuencia, remolca o necesita 4x4 para caminos difíciles. "
          "Para eso hay pickups medianas que cuestan poco más."),

        h2("Lo que RAM Ecuador publica de la 700"),
        ul([
            "<strong>Carga:</strong> 650 kg de capacidad y 691 litros de volumen en el balde.",
            "<strong>Altura:</strong> hasta 191 mm de despeje del suelo y ángulo de entrada de 24°.",
            "<strong>Seguridad:</strong> 4 airbags (frontales y laterales), cinturones con pretensores, anclajes ISOFIX, control de estabilidad (ESC) y de tracción TC Plus, bloqueo diferencial electrónico y asistente de arranque en pendiente.",
            "<strong>Cabina:</strong> doble cabina de cuatro puertas para cinco ocupantes, pantalla táctil de 7 pulgadas con Apple CarPlay y Android Auto, cámara de estacionamiento con sensores.",
            "<strong>Balde:</strong> lona de carga marítima y portalón trasero con cierre eléctrico.",
            "<strong>Versiones:</strong> SLT y Big Horn; la Big Horn suma aros de aleación de 15 pulgadas.",
        ]),
        p("RAM publica un torque máximo de 128 Nm. No publica en esta página la cilindrada ni la potencia, así que "
          "pídalas al asesor junto con la ficha completa."),

        h2("Para quién sí: cuatro perfiles"),
        p("<strong>El técnico o instalador.</strong> Electricistas, plomeros, técnicos de internet o de aire "
          "acondicionado. Llevan herramientas y materiales que no pesan una tonelada, y necesitan estacionar en el "
          "centro de Ibarra o en un conjunto residencial donde una camioneta grande no entra cómoda."),
        p("<strong>El pequeño comercio que reparte.</strong> Panaderías, distribuidoras de bebidas, ferreterías de "
          "barrio. La lona marítima protege la carga de la lluvia de la tarde, tan común en Imbabura."),
        p("<strong>La familia con finca de fin de semana.</strong> Cinco asientos para ir a Urcuquí o a Pimampiro y "
          "un balde para traer la cosecha o la leña, siempre que la vía sea asfaltada o de lastre en buen estado."),
        p("<strong>Quien quiere su primera pickup.</strong> Se maneja casi como un auto, y el balde de 691 litros "
          "cambia lo que puede hacer en un fin de semana."),

        cta_temprano("¿Quiere saber si la RAM 700 le alcanza?",
                     "Cuéntenos qué carga y por dónde maneja, y le decimos si la 700 le sirve o si le conviene otra del portafolio.",
                     "Cotizar por WhatsApp",
                     "Hola, vengo del artículo de la RAM 700. Quisiera una cotización. Lo que cargo normalmente es: ___",
                     reserva=False),

        h2("Contra qué compararla antes de firmar"),
        table(["Modelo", "Desde", "Carga útil", "Cuándo mirarla"], [
            ["RAM 700", pr("RAM 700"), "650 kg", "Carga mediana, ciudad y familia"],
            ["DongFeng Rich 6 Pro", pr("DongFeng Rich 6 Pro"), "1.005 kg", "Cuando la carga pasa de 650 kg"],
            ["Changan Star Truck", pr("Changan Star Truck"), "Ver ficha", "Solo trabajo, menor presupuesto"],
            ["Fiat Fiorino", pr("Fiat Fiorino"), "Ver ficha", "Carga que debe ir cerrada"],
        ], "Carga de la RAM 700: ram.com/ec. Carga de la Rich 6 Pro: dongfeng.ec. " + NOTA_PRECIOS),
        p(f"La comparación que más hacemos en vitrina es con la {a(FICHA['rich6'], 'DongFeng Rich 6 Pro')}: cuesta "
          "mil dólares más y carga 1.005 kg, más de 350 kg por encima. Si su trabajo pesa, la diferencia de precio es "
          f"mínima frente a lo que gana en capacidad. Para el panorama completo, revise {a(P('/comparativas-y-decisiones-inteligentes/mejor-camioneta-uso-comercial-ecuador/'), 'qué camioneta conviene para uso comercial')}."),

        h2("En la sierra norte: lo que hay que saber"),
        p("Con 191 mm de despeje y bloqueo diferencial electrónico, la 700 se defiende en un camino de lastre o en "
          "una entrada de tierra con lodo. Lo que no tiene, según la página de RAM Ecuador, es tracción 4x4. Para "
          "las vías empinadas de tierra de las parroquias altas, una 4x4 es la herramienta correcta."),
        p("El asistente de arranque en pendiente sí se agradece en ciudades como Ibarra o Tulcán, donde muchas "
          "calles tienen cuesta y se para en subida en cada esquina."),

        h2("Cómo trabajar con la RAM 700 sin pasarse de su capacidad"),
        ol([
            "<strong>Pese una carga normal.</strong> Un saco de cemento pesa 50 kg: trece sacos ya llegan a los 650 kg. Con la cuenta a la vista, se evita cargar de más sin darse cuenta.",
            "<strong>Cuente a los pasajeros.</strong> En la mayoría de pickups la capacidad de carga incluye a los ocupantes. Pregunte al asesor cómo lo calcula RAM para la 700 y reste a su familia de lo que piensa llevar en el balde.",
            "<strong>Reparta el peso.</strong> Lo más pesado, contra la cabina y centrado. La pickup frena y gira mejor.",
            "<strong>Use la lona.</strong> Además de proteger de la lluvia, evita que la carga liviana vuele en la Panamericana.",
        ]),
        p("Si al hacer la cuenta la RAM 700 se queda justa en la mitad de sus viajes, no es su pickup. Mejor saberlo "
          "en la vitrina que después de seis meses de trabajo."),

        quote("La RAM 700 es la pickup para quien antes cargaba todo en el baúl de un sedán y se quedaba corto. Para "
              "quien antes tenía una camioneta grande, es un paso atrás."),

        h2("Cuándo la RAM 700 NO le conviene"),
        ul([
            "<strong>Si carga más de 650 kg con frecuencia.</strong> Trabajar siempre al límite desgasta suspensión y frenos.",
            "<strong>Si necesita 4x4 o remolcar.</strong> RAM Ecuador no anuncia esas capacidades para la 700.",
            "<strong>Si su ruta diaria incluye caminos de tierra empinados.</strong> Una pickup mediana con reductora le va a durar más.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuánto carga la RAM 700?",
             "650 kg de capacidad de carga y 691 litros de volumen en el balde, según RAM Ecuador."),
            ("¿La RAM 700 es 4x4?",
             "RAM Ecuador no anuncia versión 4x4. Trae control de tracción TC Plus y bloqueo diferencial electrónico, "
             "que ayudan en lastre y lodo liviano."),
            ("¿Cuántas personas lleva?",
             "Cinco, en doble cabina de cuatro puertas. RAM la presenta como la primera pickup compacta con esa "
             "configuración."),
            ("¿Dónde la puedo ver?",
             f"En Comercial Hidrobo, en Ibarra. La ficha está en {a(FICHA['ram700'], 'RAM 700')} y puede escribirnos al "
             f"{WHATSAPP_TXT} para coordinar una prueba de manejo."),
        ]),
        CIERRE,
    ]),
))


# ═══════════════════════════════════════════════════════════════════════════════════════
# 33 · Mazda CX-60
# ═══════════════════════════════════════════════════════════════════════════════════════
guarda(dict(
    n=33,
    title="Mazda CX-60: para quién tiene sentido un SUV de 280 HP y cómo se ubica entre el CX-5 y el CX-90",
    slug="mazda-cx-60-para-quien-sirve",
    categories=[53, 41],
    excerpt=("El CX-60 arranca en $59.999 con motor 3.3 turbo de 280 HP, tracción AWD y caja de 8 marchas. "
             "Cuándo conviene frente al CX-5, que cuesta $21.000 menos, y frente al CX-90 de tres filas."),
    meta={"_yoast_wpseo_title": "Mazda CX-60: para quién es y cómo se compara",
          "_yoast_wpseo_metadesc": ("Motor 3.3 turbo de 280 HP y AWD desde $59.999. Qué agrega frente al CX-5, "
                                    "cuándo conviene el CX-90 y qué ofrece la versión híbrida enchufable."),
          "_yoast_wpseo_focuskw": "mazda cx-60"},
    fuentes=["https://www.mazda.com.ec/vehiculo/mazda-cx-60",
             "https://www.mazda.com.ec/vehiculo/mazda-cx-60?version=plug-in-hybrid",
             "https://www.comercialhidrobo.com/mazda/mazda-cx-60/"],
    content="\n\n".join([
        p(f"El Mazda CX-60 arranca en {pr('Mazda CX-60')}. A ese precio, quien lo mira ya no está comparando "
          "con SUV chinos de entrada, sino con lo mejor de Mazda y con los SUV premium europeos. La pregunta no es si "
          "es bueno, sino si es el Mazda correcto para usted o si le conviene uno de sus hermanos."),
        p("Este artículo responde eso con los datos que publica Mazda Ecuador: qué trae el CX-60, en qué se diferencia "
          "del CX-5 y del CX-90, y qué ofrece la versión híbrida enchufable. Si busca la ficha completa, está en la "
          "página del modelo; aquí vamos a la decisión."),

        h2("La respuesta corta: para quien quiere potencia y lujo en un SUV de dos filas"),
        p("El CX-60 tiene sentido para quien quiere un SUV de cinco asientos con motor grande, tracción integral y "
          "un interior de nivel premium, y no necesita una tercera fila. Su versión Turbo trae un motor "
          "<strong>3.3 L turbo de 280 HP y 450 Nm</strong>, caja automática de ocho velocidades y tracción AWD, "
          "según Mazda Ecuador."),
        p(f"Si su prioridad es el espacio de siete asientos, el modelo es el {a(FICHA['cx90'], 'CX-90')}. Si quiere "
          f"tracción AWD y calidad Mazda sin pasar de $40.000, el {a(FICHA['cx5'], 'CX-5')} cumple."),

        h2("Lo que trae la versión Turbo, según Mazda Ecuador"),
        ul([
            "Motor 3.3 L Turbo e-SKYACTIV G: 280 HP entre 5.000 y 6.000 rpm y 450 Nm entre 2.000 y 3.500 rpm.",
            "Caja automática SKYACTIV de 8 velocidades y tracción integral AWD.",
            "Nueve asistencias de conducción i-Activsense y siete airbags.",
            "Cámara de 360°, Head-up Display y reconocimiento facial del conductor.",
            "Interior en cuero Nappa, audio Bose de 12 parlantes, climatizador bizona y cargador inalámbrico.",
            "Techo panorámico y portón con sensor de apertura con el pie.",
            "Mantenimiento cada 10.000 km.",
        ]),

        h2("CX-5, CX-60 o CX-90: la tabla para ubicarse"),
        table(["", "Mazda CX-5", "Mazda CX-60", "Mazda CX-90"], [
            ["Precio desde", pr("Mazda CX-5"), pr("Mazda CX-60"), pr("Mazda CX-90")],
            ["Motor (según Mazda Ecuador)", "2.5 L SKYACTIV-G, 185 HP", "3.3 L turbo, 280 HP", "e-SKYACTIV G"],
            ["Tracción", "AWD", "AWD", "Consulte versión"],
            ["Filas de asientos", "2", "2", "3"],
            ["Para quién", "Familia que quiere un Mazda AWD", "Quien busca potencia y lujo en cinco asientos", "Familia de seis o siete"],
        ], "Datos de motor y tracción: mazda.com.ec, noviembre de 2026. " + NOTA_PRECIOS),
        p("La distancia entre el CX-5 y el CX-60 es de $21.000. Lo que paga con esa diferencia es motor (95 HP "
          "más), una caja de ocho marchas, un interior de otro nivel y más asistencias. Si su uso es ciudad y "
          f"carretera sin apuro, el CX-5 es una compra muy sensata; lo revisamos en {a(P('/mazda/mazda-cx-5-ecuador-suv/'), 'nuestra reseña del Mazda CX-5')}."),

        cta_temprano("¿Quiere manejar el CX-60?",
                     "Agendamos su prueba de manejo y le preparamos la cotización de la versión que le interese.",
                     "Pedir prueba de manejo por WhatsApp",
                     "Hola, vengo del artículo del Mazda CX-60. Quisiera una prueba de manejo y la cotización.",
                     reserva=False),

        h2("Seguridad: siete airbags y nueve asistencias"),
        p("Mazda Ecuador anuncia para la versión Turbo siete airbags y nueve asistencias de conducción i-Activsense. "
          "A eso suma una cámara de 360°, que en un SUV de este tamaño sirve más de lo que parece: estacionar en las "
          "calles angostas del centro de Ibarra o en un parqueadero lleno deja de ser un problema."),
        p("El Head-up Display proyecta la velocidad y la navegación sobre el parabrisas, para no bajar la vista en "
          "carretera. Y el sistema de reconocimiento facial identifica a quien se sienta al volante."),

        h2("280 HP en la sierra: qué significa al volante"),
        p("En la Panamericana entre Ibarra y Quito hay tramos de subida larga, como la salida hacia Cayambe, donde "
          "un SUV familiar con motor atmosférico pierde fuerza con la altura y con el auto lleno. Un motor turbo "
          "compensa buena parte de esa pérdida, y con 450 Nm disponibles desde 2.000 rpm, el CX-60 rebasa sin "
          "reducir dos marchas."),
        p("La tracción AWD suma en lluvia, en las curvas mojadas de la vía a Tulcán o en una entrada de tierra a una "
          "casa de campo. No lo convierte en un todoterreno, pero le da un margen de agarre que se nota."),

        h2("La versión híbrida enchufable: 80 km sin gasolina"),
        p("Mazda Ecuador ofrece también el <strong>CX-60 Plug-in Hybrid</strong>: potencia combinada de hasta "
          "<strong>323 HP</strong>, autonomía de hasta <strong>80 km en modo 100 % eléctrico</strong>, autonomía "
          "combinada de hasta 800 km y tracción AWD. Su precio no está en nuestro catálogo actual; pídalo al asesor."),
        p("Ochenta kilómetros eléctricos cubren el día a día de mucha gente: ir y volver del trabajo dentro de Ibarra, "
          "o un viaje de ida a Otavalo, sin gastar gasolina, siempre que pueda cargar en casa. Para entender si le "
          f"conviene un enchufable, revise {a(P('/vehiculos-electricos-e-hibridos/mejor-hibrido-enchufable-ecuador/'), 'los híbridos enchufables que se venden en Ecuador')}."),

        h2("Cómo aprovechar la prueba de manejo"),
        ol([
            "<strong>Pídala en una ruta con subida.</strong> Es donde se nota el motor turbo; en plano, los tres Mazda se sienten parecidos.",
            "<strong>Lleve a quien va a ir atrás.</strong> El espacio de la segunda fila es lo que más cambia entre el CX-5 y el CX-60.",
            "<strong>Pruebe la cámara de 360° estacionando.</strong> Es la función que más usará en la ciudad.",
            "<strong>Pregunte por la versión enchufable.</strong> Si carga en casa, compare su costo con el de la Turbo antes de elegir.",
        ]),

        quote("El CX-60 no compite con el CX-5 por precio. Compite por quién lo maneja: alguien que quiere sentir el "
              "motor en cada subida y que no necesita la tercera fila."),

        h2("Cuándo el CX-60 NO le conviene"),
        ul([
            "<strong>Si necesita siete asientos.</strong> El CX-60 es de dos filas; para familias grandes, el CX-90.",
            "<strong>Si maneja casi solo en ciudad y poco.</strong> Un motor de 280 HP no se aprovecha en tráfico; el CX-5 o el CX-30 cubren ese uso por mucho menos.",
            "<strong>Si su prioridad es el menor costo por kilómetro.</strong> Mire la versión enchufable o un híbrido de otro segmento.",
        ]),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Qué motor tiene el Mazda CX-60 en Ecuador?",
             "La versión Turbo lleva un 3.3 L Turbo e-SKYACTIV G con 280 HP y 450 Nm, caja automática de ocho velocidades "
             "y tracción AWD, según Mazda Ecuador. Existe además una versión híbrida enchufable de hasta 323 HP."),
            ("¿El CX-60 tiene tercera fila?",
             f"No, es de dos filas y cinco asientos. Para siete, el modelo es el CX-90; lo analizamos en {a(P('/mazda/mazda-cx-90-2025-precio-ecuador/'), '¿vale pagar el CX-90?')}."),
            ("¿Cada cuánto es el mantenimiento?",
             "Mazda Ecuador indica mantenimiento cada 10.000 km para la versión Turbo. En Comercial Hidrobo damos servicio "
             "Mazda en el norte del país."),
            ("¿Dónde lo puedo ver?",
             f"En Comercial Hidrobo. La ficha está en {a(FICHA['cx60'], 'Mazda CX-60')} y puede escribirnos al "
             f"{WHATSAPP_TXT} para coordinar la prueba de manejo."),
        ]),
        CIERRE,
    ]),
))

print("lote D: 8 specs escritos")
