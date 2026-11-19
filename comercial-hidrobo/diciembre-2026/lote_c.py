#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote C — tanda de diciembre 2026 de Comercial Hidrobo: 9 posts de modelos (temas 17-25 del plan).

Uso: python3 lote_c.py && python3 publish_batch.py --validate
NO publica nada: solo escribe posts/spec-<slug>.json.

Datos técnicos: SOLO de las páginas y fichas oficiales de cada marca en Ecuador (URLs en
`fuentes` de cada spec). Precios: PRECIOS de comun.py (catálogo de CH, 9-nov-2026).
"""
from comun import *

S = SITE
F = lambda slug: f"{S}/vehiculos/{slug}/"
NP = p(f"<em>{NOTA_PRECIOS}</em>")


def pr(modelo):
    return "$" + PRECIOS[modelo]


def meta(t, d, k):
    return {"_yoast_wpseo_title": t, "_yoast_wpseo_metadesc": d, "_yoast_wpseo_focuskw": k}


def cta(pregunta, texto, boton, msg):
    assert msg.startswith("Hola, vengo del artículo de")
    return cta_temprano(pregunta, texto, boton, msg, reserva=False)


def post(n, title, slug, cats, excerpt, m, fuentes, bloques):
    return guarda(dict(n=n, title=title, slug=slug, categories=cats, excerpt=excerpt, meta=m,
                       fuentes=fuentes, content="\n\n".join(bloques + [CIERRE])))


# ── enlaces internos (todos en enlaces-verificados.json) ─────────────────────────────
PILAR_CHINOS = f"{S}/marcas-chinas-y-comparativas/marcas-de-autos-chinos-mas-confiables-en-ecuador/"
MEJOR_CHINA = f"{S}/marcas-chinas-y-comparativas/mejor-marca-china-calidad-precio-en-ecuador/"
CSH = f"{S}/vehiculos-electricos-e-hibridos/chery-super-hybrid-csh-ecuador/"
PHEV_MEJOR = f"{S}/vehiculos-electricos-e-hibridos/mejor-hibrido-enchufable-ecuador/"
TECNOLOGIAS = f"{S}/vehiculos-electricos-e-hibridos/diferencia-phev-hev-reev-ev-ecuador/"
REEV = f"{S}/vehiculos-electricos-e-hibridos/que-es-reev-changan-hunter-cs55-ecuador/"
DEEPAL_MARCA = f"{S}/vehiculos-electricos-e-hibridos/deepal-ecuador-marca-modelos/"
EV_BARATO = f"{S}/vehiculos-electricos-e-hibridos/auto-electrico-mas-barato-ecuador-2026/"
CARGA_CASA = f"{S}/vehiculos-electricos-e-hibridos/cuanto-cuesta-cargar-auto-electrico-casa-ecuador/"
ELEC_O_HIB = f"{S}/vehiculos-electricos-e-hibridos/electrico-o-hibrido-cual-conviene-ecuador/"
EV_CHINOS = f"{S}/vehiculos-electricos-e-hibridos/marcas-autos-electricos-chinos-ecuador/"
PICO_PLACA = f"{S}/vehiculos-electricos-e-hibridos/pico-y-placa-hibridos-electricos-ecuador/"
PRIMER_HIBRIDO = f"{S}/vehiculos-electricos-e-hibridos/guia-comprar-primer-hibrido-ecuador-2026/"
CAMIONETAS_ELEC = f"{S}/vehiculos-electricos-e-hibridos/camionetas-hibridas-electricas-ecuador-2026/"
AHORRO_HIB = f"{S}/vehiculos-electricos-e-hibridos/ahorro-real-de-un-auto-hibrido-en-ecuador/"
Z9_HUNTER = f"{S}/comparativas-y-decisiones-inteligentes/dongfeng-z9-phev-vs-changan-hunter-reev/"
RAV4_T8 = f"{S}/comparativas-y-decisiones-inteligentes/toyota-rav4-hybrid-vs-chery-tiggo-8-csh/"
DUSTER_T4 = f"{S}/comparativas-y-decisiones-inteligentes/renault-duster-vs-chery-tiggo-4-pro/"
T2_DUSTER = f"{S}/comparativas-y-decisiones-inteligentes/chery-tiggo-2-pro-max-vs-renault-duster/"
CAMIONETA_COMERCIAL = f"{S}/comparativas-y-decisiones-inteligentes/mejor-camioneta-uso-comercial-ecuador/"
GARANTIA_CHERY = f"{S}/consejos/garantia-chery-ecuador-cobertura/"
GARANTIA_FAB = f"{S}/consejos/que-cubre-y-que-no-cubre-la-garantia-de-fabrica/"
CAMIONETA_RURAL = f"{S}/consejos/camioneta-mejor-para-zonas-rurales-en-ecuador/"
CAMIONETAS_CONSUMO = f"{S}/consejos/camionetas-con-mejor-consumo-de-combustible/"
SUV_COMPACTO = f"{S}/suv/suv-compacto-ecuador-2025/"
SUV_FAMILIAS = f"{S}/suv/suv-ideal-para-familias-en-ecuador/"
ALTURA = f"{S}/estilo-de-vida-y-perfil-del-conductor/rendimiento-del-auto-en-altura-ibarra-sierra-ecuador/"
MOTOR_ACTECO = f"{S}/sin-categoria/motor-chery-acteco-rendimiento-durabilidad/"
REVENTA = f"{S}/comparativas-y-decisiones-inteligentes/valor-reventa-autos-ecuador/"
PAG_OJ = f"{S}/omoda-jaecoo/"
PAG_BAIC = f"{S}/baic/"
PAG_FOTON = f"{S}/foton/"
PAG_NEVO = f"{S}/changan/changan-nevo-q05-ev/"
PAG_V7 = f"{S}/changan/foton-tundland-v7/"

# ── fuentes oficiales ────────────────────────────────────────────────────────────────
OJ = "https://omodajaecoo.ec"
SRC_OJ_HOME = f"{OJ}/"
SRC_E5 = [f"{OJ}/models/omoda-e5-next", f"{OJ}/files/Ficha_Tecnica_OMODA-E5-NEXT.pdf"]
SRC_J7 = [f"{OJ}/models/jaecoo-j7", f"{OJ}/files/Ficha_Tecnica_JAECOO-J7.pdf"]
SRC_J5 = [f"{OJ}/models/jaecoo-j5", f"{OJ}/files/Ficha_Tecnica_JAECOO-J5.pdf"]
SRC_C5 = [f"{OJ}/models/omoda-c5", f"{OJ}/files/Ficha_Tecnica_OMODA-C5.pdf"]
SRC_T9 = ["https://www.chery.com.ec/vehiculo/tiggo-9-phev-csh",
          "https://www.chery.com.ec/hubfs/CHERY/CSH/CSH9/FICHA%20TEC/Ficha%20Tecnica%20Chery%20TIGGO%209%20PHEV%20CSH-1.pdf"]
SRC_T7 = ["https://www.chery.com.ec/vehiculo/tiggo-7-phev-csh",
          "https://www.chery.com.ec/hubfs/CHERY/CSH/CSH7/FICHA%20TEC/Ficha%20tecnica%20TIGGO%207%20PHEV.pdf"]
SRC_T8 = ["https://www.chery.com.ec/vehiculo/tiggo-8-phev-csh"]
SRC_T2 = ["https://www.chery.com.ec/vehiculo/tiggo-2-pro-max"]
SRC_CHERY_POSVENTA = ["https://www.chery.com.ec/posventa"]
SRC_Q05 = ["https://www.changanecuador.com/vehiculos/nevo-q05-electrico",
           "https://admin.changanecuador.com/uploads/ficha_Q05_5308b9c297.pdf"]
SRC_CS15 = ["https://www.changanecuador.com/vehiculos/cs15",
            "https://admin.changanecuador.com/uploads/Ficha_New_CS_15_7a56135d50.pdf"]
SRC_X35 = ["https://baic.ec/x35/", "https://baic.ec/wp-content/uploads/2026/08/ficha-tecnica-x35-2026.pdf"]
SRC_U5 = ["https://baic.ec/u5-plus/", "https://baic.ec/wp-content/uploads/2024/07/baic-ficha-tecnica-u5-plus.pdf"]
SRC_X55 = ["https://baic.ec/nuevo-x55/", "https://baic.ec/wp-content/uploads/2026/10/ficha-tecnica-baic-x5.pdf"]
FT = "https://fotonecuador.com"
SRC_FOTON = [f"{FT}/gama-de-vehiculos/livianos/camionetas/serie-g/g7/",
             f"{FT}/gama-de-vehiculos/livianos/camionetas/serie-g/g9/",
             f"{FT}/gama-de-vehiculos/livianos/camionetas/serie-v/v7/",
             f"{FT}/gama-de-vehiculos/livianos/camionetas/serie-v/v9/",
             f"{FT}/wp-content/uploads/2026/09/ficha-tecnica-tunland-g7.pdf",
             f"{FT}/wp-content/uploads/2025/10/ficha-tecnica-tunland-g9.pdf",
             f"{FT}/wp-content/uploads/2026/09/ficha-tecnica-tunland-v7.pdf",
             f"{FT}/wp-content/uploads/2026/09/ficha-tecnica-tunland-v9.pdf"]
SRC_G318 = ["https://www.deepal.com.ec/modelos/g318",
            "https://admin.deepal.com.ec/uploads/ficha_deepal_g318_de097a5c02.pdf"]


# ═══════════════════════════════════════════════════════════════════════════════════
# 17 · Omoda | Jaecoo en Ecuador
# ═══════════════════════════════════════════════════════════════════════════════════
post(17,
     "Omoda | Jaecoo en Ecuador: qué marca es, sus cuatro SUV y cuál le conviene",
     "omoda-jaecoo-ecuador-modelos-precios", [59],
     "Omoda | Jaecoo vende en Ecuador cuatro SUV con tres tecnologías distintas: un eléctrico, dos "
     "híbridos que no se enchufan y un híbrido enchufable. Qué es cada uno, cuánto cuesta y para quién sirve.",
     meta("Omoda Jaecoo en Ecuador: modelos, precios y garantía",
          "Cuatro SUV desde $19.990: el eléctrico E5 Next, los híbridos J5 y C5 y el enchufable J7. "
          "Qué tecnología lleva cada uno y cuál conviene según su uso.",
          "omoda jaecoo ecuador"),
     [SRC_OJ_HOME] + SRC_E5 + SRC_J5 + SRC_C5 + SRC_J7,
     [
         p("Omoda | Jaecoo es la marca que más preguntas nos genera desde que llegó a nuestras agencias en "
           "septiembre de 2026. Las dudas se repiten: si es lo mismo que Chery, por qué tiene dos nombres, cuál de "
           "sus modelos es eléctrico y cuál se enchufa. Son preguntas razonables, porque en cuatro modelos la "
           "marca mezcla tres tecnologías distintas."),
         p("Esta guía ordena todo eso con los precios de nuestro catálogo y los datos de las fichas técnicas "
           "oficiales que publica la marca en Ecuador. Al final sabrá qué modelo encaja con su forma de manejar, "
           "sea que se mueva dentro de Ibarra o que suba todas las semanas a Tulcán."),

         h2("Omoda | Jaecoo en pocas palabras: cuatro SUV, tres tecnologías, desde $19.990"),
         p("Son dos líneas que se venden juntas. <strong>Omoda</strong> agrupa los modelos de estilo más urbano "
           "(E5 Next y C5 SHS) y <strong>Jaecoo</strong> los de aspecto más cuadrado y aventurero (J5 SHS y J7 SHS). "
           "Los cuatro son SUV de cinco plazas y comparten importador, garantía y red de servicio."),
         table(["Modelo", "Tecnología", "Potencia", "Desde"], [
             [a(F("omoda-e5-next"), "Omoda E5 Next"), "100 % eléctrico, batería de 50,6 kWh", "208 HP", pr("Omoda E5 Next")],
             [a(F("jaecoo-j5-shs"), "Jaecoo J5 SHS"), "Híbrido que no se enchufa", "221 HP combinados", pr("Jaecoo J5 SHS")],
             [a(F("omoda-c5-chs"), "Omoda C5 SHS"), "Híbrido que no se enchufa (full hybrid)", "221 HP combinados", pr("Omoda C5 SHS")],
             [a(F("jaecoo-j7-shs"), "Jaecoo J7 SHS"), "Híbrido enchufable, 90 km eléctricos (WLTP)", "341 HP combinados", pr("Jaecoo J7 SHS")],
         ], "Datos técnicos: fichas oficiales de omodajaecoo.ec, edición de septiembre de 2026. " + NOTA_PRECIOS),
         p("Si solo quiere la respuesta rápida: el E5 Next es para quien puede cargar en casa, el J5 y el C5 son "
           "para quien quiere gastar menos gasolina sin cambiar de hábitos, y el J7 es para quien hace recorridos "
           "cortos en eléctrico y viajes largos con el motor a gasolina."),

         h2("¿Omoda y Jaecoo son lo mismo que Chery?"),
         p("Son marcas del grupo Chery, con identidad y red comercial propias. En la práctica eso se nota en la "
           "mecánica: las fichas oficiales de los tres híbridos declaran un motor 1.5 turbo de tecnología Acteco, "
           f"la misma familia de motores que usa Chery y que analizamos en {a(MOTOR_ACTECO, 'cómo rinde el motor Acteco')}. "
           "La batería del Jaecoo J7, de 18,3 kWh y celdas CATL, coincide con la que la ficha de Chery declara para "
           "el Tiggo 7 Super Hybrid."),
         p("En Ecuador la marca la importa Automotores y Anexos (AYASA), cuyo logotipo aparece en todas las fichas "
           "técnicas. Es el mismo grupo que representa a BAIC en el país, un dato útil para saber quién responde por "
           "la garantía."),

         h2("Qué significa SHS en tres de los cuatro modelos"),
         p("SHS es la sigla de <em>Super Hybrid System</em>, el sistema híbrido de la marca. Funciona con un motor a "
           "gasolina, uno o más motores eléctricos y una transmisión híbrida dedicada (DHT). Lo que cambia entre "
           "modelos es el tamaño de la batería, y eso define si se enchufa o no:"),
         ul([
             "<strong>J5 SHS y C5 SHS:</strong> híbridos convencionales. La batería es pequeña (1,83 kWh en el C5, "
             "según su ficha) y se recarga sola al frenar y con el motor. No tienen enchufe.",
             "<strong>J7 SHS:</strong> híbrido enchufable. Batería de 18,3 kWh que se carga en casa (6,6 kW en "
             "corriente alterna) o en un cargador rápido de 40 kW, donde pasa del 30 % al 80 % en unos 20 minutos.",
             "<strong>E5 Next:</strong> no es SHS. Es un eléctrico puro, sin motor a gasolina.",
         ]),
         p(f"Si las siglas HEV, PHEV y EV todavía se le cruzan, las explicamos con ejemplos en "
           f"{a(TECNOLOGIAS, 'PHEV, HEV, REEV y EV: las cuatro tecnologías')}."),

         h2("Modelo por modelo: para quién es cada uno"),
         h3("Omoda E5 Next: el eléctrico de entrada"),
         p("Batería LFP de 50,6 kWh, 208 HP, 288 Nm y una autonomía declarada de 422 km en ciclo NEDC o 350 km en "
           "WLTP, el ciclo más cercano al uso real. Trae siete airbags y acelera de 0 a 100 km/h en 7,2 segundos. "
           "Encaja con quien se mueve entre Ibarra, Otavalo y Atuntaqui y puede cargar de noche en su garaje."),
         h3("Jaecoo J5 SHS: el híbrido familiar más accesible"),
         p("Mide 4.380 mm y su maletero va de 480 a 1.180 litros con los asientos abatidos. Tiene dos versiones: "
           "Comfort, con cuatro airbags, y Excellent, con seis airbags y el paquete completo de asistentes de "
           "manejo (frenado autónomo, control crucero adaptativo, detector de punto ciego)."),
         h3("Omoda C5 SHS: el mismo sistema híbrido con otro estilo"),
         p("Comparte con el J5 los 221 HP y 290 Nm combinados, pero tiene una silueta más deportiva, siete airbags "
           "en sus dos versiones y una pantalla curva doble de 24,6 pulgadas. A cambio, su maletero es más chico: "
           "378 litros."),
         h3("Jaecoo J7 SHS: el más grande y potente"),
         p("341 HP y 525 Nm combinados, 4.500 mm de largo, maletero de 410 a 1.335 litros y techo panorámico. Su "
           "ficha declara 21° de ángulo de ataque, 29° de salida y 600 mm de profundidad de vadeo. Ojo con un "
           "detalle: la tracción es <strong>2WD</strong>. Se ve todoterreno, pero no es un 4x4."),

         cta("¿Quiere manejar dos de los cuatro el mismo día?",
             "Le preparamos la prueba de manejo y la cotización con el precio final de la versión que elija.",
             "Agendar prueba por WhatsApp",
             "Hola, vengo del artículo de Omoda | Jaecoo en Ecuador. Quisiera una prueba de manejo y cotización "
             "del modelo ___."),

         h2("La garantía: 7 años o 200.000 km, y la batería aparte"),
         p("Las cuatro fichas oficiales declaran la misma cobertura: <strong>7 años o 200.000 km</strong> para el "
           "vehículo y <strong>8 años o 150.000 km</strong> para la batería. Es de las garantías más largas del "
           "catálogo chino que vendemos, y vale la pena leer qué pide para mantenerse vigente: lo resumimos en "
           f"{a(GARANTIA_FAB, 'qué cubre y qué no cubre la garantía de fábrica')}."),
         p("Las fichas mencionan además dos programas de la marca, ambos con asterisco: «Promise», que ofrece el "
           "repuesto en 10 días o lo paga la marca, y «Upgrade», que asegura un valor de reventa. Antes de firmar, "
           "pida por escrito las condiciones de cada uno."),

         quote("En Omoda | Jaecoo la pregunta no es qué marca elegir, sino si usted puede cargar en casa. Con esa "
               "respuesta, de cuatro modelos quedan uno o dos."),

         h2("Cuándo Omoda | Jaecoo NO le conviene"),
         ul([
             "Necesita 4x4 de verdad para caminos de páramo o fincas: ninguno de los cuatro tiene tracción integral. "
             "Mire una pickup o el Deepal G318.",
             "Necesita siete asientos: los cuatro son de cinco plazas. El Chery Tiggo 9 Super Hybrid tiene tres filas.",
             "Quiere un eléctrico pero no tiene dónde cargar: con el E5 Next dependería de cargadores públicos, que "
             "en Imbabura y Carchi todavía son pocos.",
             "Le importa mucho la reventa a corto plazo: es una marca nueva en el país y aún no hay historial de usados.",
         ]),
         p(f"Para comparar con las otras marcas chinas que vendemos, revise {a(PILAR_CHINOS, 'la guía de carros chinos en Ecuador')} "
           f"y la página de {a(PAG_OJ, 'Omoda | Jaecoo')} en nuestro sitio."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿Omoda | Jaecoo tiene autos eléctricos en Ecuador?",
              "Sí, el Omoda E5 Next es 100 % eléctrico según su ficha oficial. Los otros tres modelos son híbridos: "
              "el J5 y el C5 no se enchufan y el J7 es híbrido enchufable."),
             ("¿Cuál es el Omoda | Jaecoo más barato?",
              f"El Omoda E5 Next, desde {pr('Omoda E5 Next')} en nuestro catálogo. El híbrido más accesible es el "
              f"Jaecoo J5 SHS, desde {pr('Jaecoo J5 SHS')}."),
             ("¿El Jaecoo J7 es 4x4?",
              "No. Su ficha técnica declara tracción 2WD. Tiene buenos ángulos de ataque y salida y 600 mm de vadeo, "
              "pero no tracción en las cuatro ruedas."),
             ("¿Dónde ver Omoda | Jaecoo en Ibarra?",
              f"En Comercial Hidrobo, {DIRECCION_IBARRA}. Escríbanos al {WHATSAPP_TXT} para confirmar en qué agencia "
              "está el modelo que quiere probar."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 18 · Jaecoo J7 SHS vs Chery Tiggo 7 Super Hybrid
# ═══════════════════════════════════════════════════════════════════════════════════
post(18,
     "Jaecoo J7 SHS vs Chery Tiggo 7 Super Hybrid: dos enchufables con la misma batería y $4.000 de diferencia",
     "jaecoo-j7-shs-vs-chery-tiggo-7-super-hybrid", [48],
     "El Jaecoo J7 SHS y el Chery Tiggo 7 Super Hybrid comparten motor base y batería, pero no precio ni "
     "tamaño. Comparamos potencia, autonomía, carga, maletero y garantía para decidir cuál conviene.",
     meta("Jaecoo J7 SHS vs Tiggo 7 Super Hybrid: cuál elegir",
          "Mismo motor 1.5 turbo y misma batería de 18,3 kWh, pero $4.000 de diferencia. Potencia, autonomía, "
          "carga y maletero, comparados con las fichas oficiales.",
          "jaecoo j7 vs tiggo 7 super hybrid"),
     SRC_J7 + SRC_T7 + SRC_T8 + SRC_CHERY_POSVENTA,
     [
         p("Quien busca un SUV híbrido enchufable de tamaño mediano en nuestro catálogo termina casi siempre frente "
           "a estos dos. Tiene sentido: el Jaecoo J7 SHS y el Chery Tiggo 7 Super Hybrid usan un motor 1.5 turbo de "
           "la misma familia y, según sus fichas oficiales, la misma batería CATL de 18,3 kWh."),
         p(f"Lo que los separa es el precio, {pr('Jaecoo J7 SHS')} contra {pr('Chery Tiggo 7 Super Hybrid')}, y una "
           "serie de diferencias de tamaño, potencia y equipamiento que vale la pena poner lado a lado antes de "
           "elegir. Las comparamos con los datos que publica cada marca en Ecuador."),

         h2("La respuesta corta: el J7 da más potencia por menos; el Tiggo 7 da más espacio y pantalla"),
         p("Si su prioridad es el precio y la respuesta del motor, el J7 entrega 341 HP combinados frente a 315 y "
           "cuesta $4.000 menos. Si lleva familia y equipaje con frecuencia, el Tiggo 7 Super Hybrid tiene más "
           "distancia entre ejes, un maletero de 475 litros contra 410 y la pantalla panorámica de 24,6 pulgadas. "
           "En lo eléctrico, la batería es la misma: la diferencia de autonomía que muestran los catálogos se "
           "explica sobre todo por el ciclo de medición."),
         table(["", a(F("jaecoo-j7-shs"), "Jaecoo J7 SHS"), a(F("tigo-7-super-hybrid"), "Tiggo 7 Super Hybrid")], [
             ["Precio desde", pr("Jaecoo J7 SHS"), pr("Chery Tiggo 7 Super Hybrid")],
             ["Motor a gasolina", "1.5 turbo (TGDI) Acteco", "1.5 TGDI Acteco"],
             ["Potencia combinada", "341 HP", "315 HP"],
             ["Torque combinado", "525 Nm", "525 Nm"],
             ["Batería", "18,3 kWh, CATL LFP", "18,3 kWh, CATL LFP"],
             ["Autonomía eléctrica", "90 km (WLTP)", "120 km (la ficha no indica el ciclo)"],
             ["Carga rápida DC", "40 kW, 30 % a 80 % en 20 min", "20 % a 80 % en 30-45 min"],
             ["Tracción", "2WD", "Delantera (FWD)"],
             ["Largo / entre ejes", "4.500 / 2.672 mm", "4.553 / 2.710 mm"],
             ["Maletero", "410 L (1.335 L abatido)", "475 L"],
             ["Airbags", "6 (Standard) o 7 (Premium)", "7"],
             ["Garantía de fábrica", "7 años o 200.000 km; batería 8 años o 150.000 km", "Confírmela con el asesor"],
         ], "Datos: fichas técnicas de omodajaecoo.ec (septiembre de 2026) y chery.com.ec. " + NOTA_PRECIOS),

         h2("Lo que comparten: el mismo corazón"),
         p("Los dos combinan un 1.5 turbo de inyección directa con motores eléctricos y una transmisión híbrida "
           "dedicada. La batería, de fosfato de hierro y litio (LFP), es la química que hoy se prefiere por su "
           "tolerancia a muchos ciclos de carga. Ambos se cargan con conector Tipo 2, y la ficha del J7 suma "
           "función V2L de 3,3 kW para alimentar aparatos externos, útil en un paseo o en un corte de luz."),
         p(f"El sistema de Chery lo explicamos con detalle en {a(CSH, 'Chery Super Hybrid: qué es y cuáles llegan a Ecuador')}. "
           "El de Jaecoo, que la marca llama SHS, funciona con la misma lógica: maneja en eléctrico mientras hay "
           "batería y arranca el motor a gasolina cuando hace falta potencia o autonomía."),

         h2("Dónde se separan: potencia, tamaño y cabina"),
         ul([
             "<strong>Potencia:</strong> 26 HP más en el J7. Se nota al rebasar en la Panamericana, sobre todo en "
             "las subidas entre Ibarra y Cayambe.",
             "<strong>Tamaño:</strong> el Tiggo 7 es 53 mm más largo y tiene 38 mm más entre ejes. Atrás eso "
             "significa algo más de espacio para las piernas.",
             "<strong>Maletero:</strong> 475 litros en el Tiggo 7 frente a 410 en el J7, una diferencia que se "
             "siente en un viaje familiar con maletas.",
             "<strong>Cabina:</strong> el Tiggo 7 junta dos pantallas de 12,3 pulgadas en un solo panel. El J7 "
             "usa una pantalla vertical de 13,2 o 14,8 pulgadas según versión y suma head-up display en la Premium.",
         ]),

         h2("Autonomía eléctrica: por qué 90 y 120 km no se comparan directo"),
         p("La ficha del J7 declara 90 km en ciclo WLTP, que es más exigente y más cercano al uso real. La del "
           "Tiggo 7 declara 120 km sin decir en qué ciclo. Con la misma batería de 18,3 kWh, lo prudente es asumir "
           "que en la práctica los dos recorren distancias parecidas en modo eléctrico."),
         p("Para el uso diario alcanza en ambos casos. Un trayecto de ida y vuelta entre Ibarra y Otavalo cabe en "
           "la batería, y en las bajadas, como la que va de Cayambe hacia el valle, la regeneración devuelve algo "
           "de carga. Donde sí cambia la cuenta es en la carga rápida: el J7 publica 20 minutos del 30 % al 80 % "
           "con 40 kW; el Tiggo 7, entre 30 y 45 minutos del 20 % al 80 %."),

         cta("¿Quiere probarlos en la misma ruta?",
             "Le agendamos los dos enchufables seguidos para que compare respuesta, espacio y pantalla con su "
             "propio recorrido.",
             "Pedir prueba de manejo",
             "Hola, vengo del artículo de Jaecoo J7 SHS vs Chery Tiggo 7 Super Hybrid. Quisiera probar los dos "
             "y recibir cotización."),

         h2("Garantía y posventa: dónde también hay diferencias"),
         p("La ficha del J7 publica 7 años o 200.000 km de garantía y 8 años o 150.000 km para la batería. La de "
           "Chery para el Tiggo 7 Super Hybrid no incluye la cobertura; la explicamos en "
           f"{a(GARANTIA_CHERY, 'la garantía Chery en Ecuador')} y conviene pedir por escrito la vigente al cotizar."),
         p("En posventa, Chery Ecuador informa en su sitio un plan de mantenimiento prepagado de cuatro servicios o "
           "tres años con precios congelados, un año de garantía sobre repuestos originales y mano de obra, y más "
           "de 8.000 referencias en su bodega central. Omoda | Jaecoo, por su parte, anuncia en sus fichas el "
           "programa «Promise» de repuesto en 10 días, con condiciones."),

         quote("Si los dos tienen la misma batería, la elección se reduce a una pregunta práctica: ¿le sirven más "
               "26 HP y $4.000 en el bolsillo, o 65 litros más de maletero y algo más de espacio atrás?"),

         h2("Cuándo ninguno de los dos le conviene"),
         ul([
             f"Necesita siete asientos: el Tiggo 8 Super Hybrid tiene tres filas desde {pr('Chery Tiggo 8 Super Hybrid')} "
             "en nuestro catálogo, con el mismo sistema híbrido.",
             "No tiene dónde cargar: pagaría por una batería grande que casi no usaría. Un híbrido que no se "
             f"enchufa, como el Jaecoo J5 SHS desde {pr('Jaecoo J5 SHS')}, hace más sentido.",
             "Necesita 4x4: ninguno lo tiene. Para caminos de tierra exigentes, mire una pickup.",
         ]),
         p(f"Para ver los otros enchufables que se venden en el país, revise {a(PHEV_MEJOR, 'cuál es el mejor híbrido enchufable en Ecuador')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿El Jaecoo J7 y el Tiggo 7 Super Hybrid tienen el mismo motor?",
              "Según sus fichas, ambos usan un 1.5 turbo de inyección directa de la familia Acteco y una batería "
              "CATL de 18,3 kWh. La potencia combinada declarada es distinta: 341 HP el J7 y 315 HP el Tiggo 7."),
             ("¿Cuál tiene más autonomía eléctrica?",
              "En papel el Tiggo 7 (120 km contra 90 km), pero el J7 mide en WLTP y la ficha de Chery no indica el "
              "ciclo. Con la misma batería, en la práctica la diferencia es pequeña."),
             ("¿Cuál es más barato?",
              f"El Jaecoo J7 SHS, desde {pr('Jaecoo J7 SHS')}. El Tiggo 7 Super Hybrid parte de "
              f"{pr('Chery Tiggo 7 Super Hybrid')} en nuestro catálogo."),
             ("¿Dónde puedo probarlos?",
              f"En nuestras agencias de {SEDES}. Escríbanos al {WHATSAPP_TXT} y le confirmamos dónde está cada "
              "unidad de prueba."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 19 · Chery Tiggo 9 Super Hybrid
# ═══════════════════════════════════════════════════════════════════════════════════
post(19,
     "Chery Tiggo 9 Super Hybrid: el SUV enchufable de 7 asientos y tracción integral, ¿vale lo que cuesta?",
     "chery-tiggo-9-super-hybrid-7-asientos", [52],
     "El Tiggo 9 Super Hybrid es el SUV más grande y potente de Chery en Ecuador: siete asientos, tres motores, "
     "tracción integral y 140 km en eléctrico. Qué compra frente al Tiggo 8 y para quién tiene sentido.",
     meta("Chery Tiggo 9 Super Hybrid: 7 asientos, AWD y 422 HP",
          "SUV híbrido enchufable de tres filas desde $46.990: qué trae frente al Tiggo 8 Super Hybrid, cuánto "
          "recorre en eléctrico y para quién vale la diferencia.",
          "chery tiggo 9 super hybrid"),
     SRC_T9 + SRC_T8,
     [
         p("Una familia de seis o siete personas que quiere dejar de gastar tanto en gasolina tiene pocas "
           "opciones. Casi todos los híbridos enchufables del mercado son de cinco plazas, y los SUV de tres filas "
           "suelen ser a gasolina o diésel. El Chery Tiggo 9 Super Hybrid está justo en ese cruce."),
         p(f"Cuesta desde {pr('Chery Tiggo 9 Super Hybrid')} en nuestro catálogo, una cifra que pide explicaciones. "
           "Aquí revisamos qué trae según la ficha oficial de Chery Ecuador, qué compra frente a su hermano menor, "
           "el Tiggo 8 Super Hybrid, y en qué casos sí vale la diferencia."),

         h2("Qué es el Tiggo 9 Super Hybrid, en una frase"),
         p("Es un SUV híbrido enchufable de siete asientos (2+3+2) con tres motores eléctricos, un 1.5 turbo "
           "Acteco y tracción integral (AWD). La ficha declara <strong>422,4 HP y 580 Nm combinados</strong>, una "
           "batería CATL de 34,46 kWh, <strong>140 km en modo eléctrico</strong> y hasta 1.400 km de autonomía "
           "combinada. Acelera de 0 a 100 km/h en 5,4 segundos, cifra de auto deportivo en un vehículo de 2.233 kg."),
         p(f"Puede ver la ficha del modelo en {a(F('tigo-9-super-hybrid'), 'Chery Tiggo 9 Super Hybrid')} y el "
           f"funcionamiento del sistema en {a(CSH, 'Chery Super Hybrid: qué es y cuáles llegan a Ecuador')}."),

         cta("¿Quiere verlo con su familia completa adentro?",
             "Agende una prueba de manejo y suba a todos: la tercera fila se entiende mejor sentado que en fotos.",
             "Agendar prueba de manejo",
             "Hola, vengo del artículo de Chery Tiggo 9 Super Hybrid. Quisiera una prueba de manejo y cotización."),

         h2("Tiggo 9 o Tiggo 8 Super Hybrid: qué compran los $16.000 de diferencia"),
         p(f"El Tiggo 8 Super Hybrid también tiene tres filas y parte de {pr('Chery Tiggo 8 Super Hybrid')}. Es la "
           "comparación que hay que hacer antes que cualquier otra:"),
         table(["", a(F("tigo-8-super-hybrid"), "Tiggo 8 Super Hybrid"), "Tiggo 9 Super Hybrid"], [
             ["Precio desde", pr("Chery Tiggo 8 Super Hybrid"), pr("Chery Tiggo 9 Super Hybrid")],
             ["Asientos", "7 (2+3+2)", "7 (2+3+2)"],
             ["Motores eléctricos", "2", "3"],
             ["Potencia combinada", "315 HP", "422,4 HP"],
             ["Torque combinado", "525 Nm", "580 Nm"],
             ["Batería", "18,3 kWh (CATL, LFP)", "34,46 kWh (CATL)"],
             ["Autonomía eléctrica", "120 km", "140 km"],
             ["Autonomía combinada", "1.200 km", "1.400 km"],
             ["0 a 100 km/h", "8,2 s", "5,4 s"],
             ["Largo / entre ejes", "4.725 / 2.800 mm", "4.810 / 2.800 mm"],
         ], "Datos: páginas y fichas de chery.com.ec. " + NOTA_PRECIOS),
         p("La distancia entre ejes es la misma, así que el espacio interior no cambia tanto como sugiere el "
           "precio. Lo que paga en el Tiggo 9 es potencia, una batería casi del doble, tracción integral y un "
           "equipamiento de otra categoría."),

         h2("Tres filas: cuánto espacio queda para el equipaje"),
         p("Es el punto que más conviene revisar en persona. Con las siete plazas en uso, el maletero queda "
           "pequeño: la marca declara entre 143 y 155 litros según la fuente (página o ficha), suficiente para "
           "mochilas y compras. Con la tercera fila abatida sube a entre 448 y 500 litros."),
         p("Para un viaje largo con siete personas, por ejemplo de Ibarra a la Costa, la solución práctica son los "
           "rieles portaequipaje que trae de serie. Y si piensa llevar un remolque pequeño, la ficha incluye gancho "
           "de remolque."),

         h2("Tracción integral y modos de manejo: lo que sirve en Imbabura y Carchi"),
         p("La ficha declara tracción AWD y seis modos: Eco, Normal, Sport, Arena, Nieve y Off Road, más asistentes "
           "de arranque en pendiente (HAC) y de descenso (HDC). Para el lastre que lleva a una hacienda en Cotacachi "
           "o a una finca en el Carchi, eso da tranquilidad."),
         p("Conviene tener claro el límite: es un SUV con tracción integral, no una camioneta todoterreno. La ficha "
           "no menciona reductora ni bloqueo de diferencial, y sus llantas 245/50 R20 son de carretera. Para "
           "caminos de páramo con barro profundo, la herramienta es otra."),

         h2("Carga: en casa por la noche, en carretera en menos de una hora"),
         ul([
             "Corriente alterna, del 20 % al 80 %: unas 3,5 horas con 7,2 kW o 6,2 horas con 5 kW.",
             "Carga rápida en corriente continua, del 20 % al 80 %: entre 30 y 45 minutos.",
             "Conector Mennekes Tipo 2 y CCS2, el estándar de los cargadores públicos del país.",
             "La ficha menciona cargadores portátiles de 3,2 y 5 kW; pregunte cuál se incluye en la versión que cotice.",
         ]),
         p(f"Cuánto sube la planilla de luz al cargar en casa lo calculamos en {a(CARGA_CASA, 'cuánto cuesta cargar un auto eléctrico en casa')}."),

         h2("El equipamiento que explica el precio"),
         ul([
             "10 airbags, incluidos laterales para la segunda fila y uno central delantero.",
             "Cámaras de 540°, estacionamiento autónomo y más de diez asistentes de manejo, entre ellos control "
             "crucero adaptativo, frenado autónomo de emergencia y monitor de punto ciego.",
             "Pantalla de 15,6 pulgadas, head-up display y sonido Sony de 14 parlantes.",
             "Asientos de cuero con calefacción y ventilación en cinco plazas, y masaje en los delanteros.",
             "Carrocería con aluminio y 60 % de acero de alta resistencia, según la marca.",
         ]),

         quote("El Tiggo 9 tiene sentido para la familia que usa la tercera fila todas las semanas y maneja mucho. "
               "Si la tercera fila es para emergencias, el Tiggo 8 Super Hybrid resuelve lo mismo por bastante menos."),

         h2("Cuándo el Tiggo 9 Super Hybrid NO le conviene"),
         ul([
             "Usa la tercera fila pocas veces al año: el Tiggo 8 Super Hybrid o incluso un SUV de cinco plazas sale mejor.",
             "No puede cargar en casa: perdería la mitad de su ventaja y cargaría 2.233 kg con gasolina.",
             "Necesita un 4x4 para trabajo rural pesado: una pickup con reductora cumple mejor.",
             "Quiere la marca con más historial de reventa en el segmento: revise antes cómo se comportan los usados.",
         ]),
         p(f"Si su duda es frente a un japonés, la comparación del hermano menor está en {a(RAV4_T8, 'RAV4 Híbrido vs Tiggo 8 Súper Hybrid')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿El Tiggo 9 Super Hybrid es eléctrico o híbrido?",
              "Es un híbrido enchufable (PHEV): tiene motor 1.5 turbo a gasolina y tres motores eléctricos. Puede "
              "recorrer hasta 140 km solo con la batería, según la ficha de Chery Ecuador."),
             ("¿El Tiggo 9 es 4x4?",
              "Tiene tracción integral (AWD) y modos para arena, nieve y off road. La ficha no declara reductora, "
              "así que es más un SUV para lastre y lluvia que un todoterreno."),
             ("¿Cuánto cuesta el Tiggo 9 Super Hybrid en Ecuador?",
              f"Desde {pr('Chery Tiggo 9 Super Hybrid')} en el catálogo de Comercial Hidrobo. " + NOTA_PRECIOS),
             ("¿Dónde puedo verlo en el norte del país?",
              f"En Comercial Hidrobo, {DIRECCION_IBARRA}, y en nuestras agencias de Cayambe y Tulcán. Escríbanos "
              f"al {WHATSAPP_TXT} para confirmar la unidad de prueba."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 20 · Omoda E5 Next
# ═══════════════════════════════════════════════════════════════════════════════════
post(20,
     "Omoda E5 Next: ¿eléctrico o híbrido? Lo que dice la ficha oficial y para quién sirve",
     "omoda-e5-next-electrico-o-hibrido", [43],
     "El Omoda E5 Next suele aparecer junto a los Super Hybrid de la marca, pero su ficha oficial lo define como "
     "100 % eléctrico. Batería, autonomía, versiones y cómo se compara con el Changan Nevo Q05 al mismo precio.",
     meta("Omoda E5 Next: ¿eléctrico o híbrido? Lo que dice la ficha",
          "Es 100 % eléctrico: 50,6 kWh, 208 HP y 350 km WLTP. Sus dos versiones, la garantía de 7 años y cómo "
          "se compara con el Nevo Q05 al mismo precio de $19.990.",
          "omoda e5 next"),
     SRC_E5 + SRC_Q05 + [SRC_OJ_HOME],
     [
         p("La pregunta llega casi igual cada semana: «¿el Omoda E5 Next es híbrido o eléctrico?». La confusión "
           "tiene una causa sencilla. Los otros tres modelos de Omoda | Jaecoo llevan la sigla SHS, de Super Hybrid "
           "System, y en algunos listados el E5 Next aparece junto a ellos, dentro de la misma familia."),
         p("Fuimos a la fuente: la ficha técnica oficial que publica la marca en omodajaecoo.ec, edición de "
           "septiembre de 2026. Con ella respondemos la duda, repasamos las dos versiones y lo comparamos con el "
           f"otro eléctrico que vendemos al mismo precio, {pr('Omoda E5 Next')}."),

         h2("Es 100 % eléctrico: no tiene motor a gasolina"),
         p("La ficha lo dice sin rodeos: <strong>tipo de motor, eléctrico</strong>. No tiene tanque de combustible "
           "ni motor de combustión. Se mueve con un motor eléctrico de 155 kW (208 HP) y 288 Nm alimentado por una "
           "batería LFP de 50,6 kWh, y se carga con conector CCS2 / Tipo 2. La propia página del modelo lo presenta "
           "como la «siguiente generación eléctrica» de Omoda."),
         p(f"Si quiere entender en qué se diferencia de un híbrido o de un enchufable, lo explicamos en "
           f"{a(TECNOLOGIAS, 'PHEV, HEV, REEV y EV: las cuatro tecnologías explicadas')}."),

         h2("Los números del E5 Next, según su ficha"),
         table(["Dato", "Omoda E5 Next"], [
             ["Precio desde", pr("Omoda E5 Next")],
             ["Batería", "50,6 kWh, litio-ferrofosfato (LFP)"],
             ["Potencia / torque", "155 kW (208 HP) / 288 Nm"],
             ["0 a 100 km/h", "7,2 segundos"],
             ["Autonomía", "422 km (NEDC) / 350 km (WLTP)"],
             ["Tracción", "Delantera (FWD)"],
             ["Airbags", "7"],
             ["Largo / entre ejes", "4.545 / 2.630 mm"],
             ["Maletero", "442 litros"],
             ["Garantía", "7 años o 200.000 km; batería 8 años o 150.000 km"],
         ], "Datos: ficha técnica oficial de omodajaecoo.ec (septiembre de 2026). " + NOTA_PRECIOS),
         p(f"La ficha del modelo en nuestro sitio está en {a(F('omoda-e5-next'), 'Omoda E5 Next')}."),

         h2("Lite Comfort o Lite Luxury: qué cambia entre las dos versiones"),
         p("La mecánica y la batería son las mismas. La diferencia está en equipamiento:"),
         ul([
             "<strong>Pantalla:</strong> 12,3 pulgadas en la Comfort y 15,6 en la Luxury.",
             "<strong>Luces y cámara:</strong> faros halógenos y cámara de 180° en la Comfort; LED y cámara de 540° en la Luxury.",
             "<strong>Asistentes:</strong> la Luxury suma detector de punto ciego, alerta de tráfico cruzado con "
             "frenado y alerta de apertura de puertas. La Comfort no los trae.",
             "<strong>Confort:</strong> tela y ajustes manuales en la Comfort; ecocuero, ajuste eléctrico, "
             "ventilación y masaje en la Luxury.",
         ]),
         p("El precio «desde» de un catálogo corresponde normalmente a la versión de entrada. Si le interesa la "
           "Luxury, pida la cotización de esa versión en concreto."),

         h2("Qué significan 350 km WLTP en la sierra norte"),
         p("WLTP es el ciclo más realista de los dos que publica la marca, así que 350 km es la cifra con la que "
           "conviene hacer cuentas. Para la mayoría de quienes viven en Ibarra y trabajan en la ciudad o en Otavalo, "
           "eso alcanza para varios días sin enchufar."),
         p("Dos cosas cambian el número en esta zona. Las subidas largas, como la de Ibarra hacia Cayambe, consumen "
           "más; las bajadas devuelven parte de esa energía al frenar con el motor. Y la velocidad sostenida en la "
           "Panamericana gasta más que el tráfico urbano. Un viaje de ida y vuelta a Quito es posible, pero conviene "
           "planificar dónde cargar."),

         cta("¿Quiere saber si el E5 Next le alcanza para su rutina?",
             "Cuéntenos cuántos kilómetros hace al día y si tiene garaje, y le respondemos con la versión que le "
             "conviene y una prueba de manejo.",
             "Consultar por WhatsApp",
             "Hola, vengo del artículo de Omoda E5 Next. Quisiera una prueba de manejo y cotización de la versión ___."),

         h2("E5 Next o Changan Nevo Q05: dos eléctricos al mismo precio"),
         p(f"En nuestro catálogo, el {a(F('changan-nevo-q05'), 'Changan Nevo Q05')} también parte de {pr('Changan Nevo Q05')}. "
           "Las dos fichas oficiales permiten compararlos punto por punto:"),
         ul([
             "<strong>Potencia:</strong> 208 HP el E5 Next contra 161 HP el Nevo Q05.",
             "<strong>Batería y autonomía (NEDC):</strong> 50,6 kWh y 422 km el E5 Next; el Nevo Q05 tiene 40,3 kWh "
             "y 360 km en su versión Elite, y 51,9 kWh y 460 km en Luxury y Premium.",
             "<strong>Airbags:</strong> 7 contra 6.",
             "<strong>Garantía:</strong> 7 años o 200.000 km el E5 Next; 5 años o 150.000 km el Nevo Q05. En "
             "batería, 8 años o 150.000 km contra 8 años o 160.000 km.",
         ]),
         p("Ojo con comparar el «desde» de uno con la versión tope del otro. Pida las dos cotizaciones en la versión "
           f"que de verdad compraría. Para ver el resto de eléctricos del país, revise {a(EV_BARATO, 'el auto eléctrico más barato de Ecuador')}."),

         h2("Cuatro preguntas para hacer antes de reservar un E5 Next"),
         ol([
             "<strong>¿Qué versión es la del precio que me dan?</strong> Lite Comfort y Lite Luxury comparten batería, "
             "pero no pantalla, luces ni asistentes.",
             "<strong>¿Qué incluye para cargar en casa?</strong> Pregunte si viene un cargador portátil o si hay que "
             "instalar uno de pared, y quién lo instala.",
             "<strong>¿Qué pide la garantía de la batería?</strong> Los 8 años o 150.000 km suelen depender de hacer "
             "los mantenimientos en taller autorizado.",
             "<strong>¿Qué colores hay en stock?</strong> La ficha muestra siete: verde, rojo, negro, blanco, plomo, "
             "azul y plata. No todos llegan en cada lote.",
         ]),

         quote("Antes de elegir entre dos eléctricos, resuelva dónde va a cargar. Con un enchufe en casa, cualquiera "
               "de los dos le sirve para el día a día en Imbabura; sin él, ninguno es buena idea todavía."),

         h2("Cuándo el E5 Next NO le conviene"),
         ul([
             "No tiene garaje ni un punto de carga fijo: dependería de cargadores públicos, todavía escasos en el "
             f"norte del país. Un híbrido como el Jaecoo J5 SHS, desde {pr('Jaecoo J5 SHS')}, no necesita enchufe.",
             "Viaja seguido a la Costa o al Oriente por rutas sin cargadores rápidos.",
             "Necesita más de cinco plazas o un maletero grande para trabajo.",
         ]),
         p(f"Si todavía duda entre las dos tecnologías, lea {a(ELEC_O_HIB, '¿eléctrico o híbrido? Cuál conviene de verdad en Ecuador')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿El Omoda E5 Next es híbrido?",
              "No. Su ficha técnica oficial lo define como eléctrico, con batería de 50,6 kWh y sin motor a gasolina. "
              "Los modelos híbridos de la marca son el J5 SHS, el C5 SHS y el J7 SHS."),
             ("¿Cuánta garantía tiene la batería del E5 Next?",
              "La ficha declara 8 años o 150.000 km para la batería y 7 años o 200.000 km para el vehículo. Pida "
              "las condiciones por escrito al momento de comprar."),
             ("¿Cuánto cuesta cargarlo en casa?",
              f"Depende de su tarifa eléctrica y de cuánto maneje. Lo calculamos paso a paso en "
              f"{a(CARGA_CASA, 'cuánto cuesta cargar un auto eléctrico en casa en Ecuador')}."),
             ("¿Aplica el pico y placa para el E5 Next?",
              f"Las reglas para eléctricos e híbridos las resumimos en {a(PICO_PLACA, 'pico y placa para híbridos y eléctricos')}. "
              "Confirme siempre la ordenanza vigente de su ciudad."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 21 · Changan Nevo Q05
# ═══════════════════════════════════════════════════════════════════════════════════
post(21,
     "Changan Nevo Q05: Elite, Luxury o Premium, qué versión del eléctrico elegir",
     "changan-nevo-q05-versiones-autonomia", [43],
     "El Changan Nevo Q05 es un SUV 100 % eléctrico con tres versiones y dos baterías. Qué cambia entre Elite, "
     "Luxury y Premium, cuánto recorre según Changan y para quién conviene cada una.",
     meta("Changan Nevo Q05: versiones, autonomía y cuál elegir",
          "SUV 100 % eléctrico desde $19.990 con baterías de 40,3 o 51,9 kWh. Qué cambia entre Elite, Luxury y "
          "Premium y cuánto recorre según Changan Ecuador.",
          "changan nevo q05"),
     SRC_Q05 + SRC_E5,
     [
         p("El Changan Nevo Q05 es uno de los eléctricos más baratos que se pueden comprar en Ecuador, y eso hace que "
           "mucha gente llegue a la agencia con una sola pregunta: ¿cuánto recorre de verdad? La respuesta depende de "
           "algo que pocos anuncios aclaran: el Nevo Q05 se vende en tres versiones y no todas tienen la misma batería."),
         p(f"Con la ficha técnica oficial de Changan Ecuador, repasamos qué cambia entre Elite, Luxury y Premium y qué "
           f"versión tiene sentido según cómo maneje. El precio de entrada en nuestro catálogo es {pr('Changan Nevo Q05')}."),

         h2("Es 100 % eléctrico, con dos tamaños de batería"),
         p("La ficha lo titula «Nevo Q05 100 % eléctrico» y la página del modelo lo describe como un SUV eléctrico "
           "compacto. No tiene motor a gasolina. Las tres versiones comparten motor de 161 HP y 190 Nm, tracción "
           "delantera y batería de fosfato de hierro y litio (LFP) con celdas CATL. Lo que cambia es la capacidad:"),
         table(["", "Elite", "Luxury", "Premium"], [
             ["Batería", "40,3 kWh", "51,9 kWh", "51,9 kWh"],
             ["Autonomía (NEDC)", "360 km", "460 km", "460 km"],
             ["Consumo declarado", "12,8 kWh/100 km", "13 kWh/100 km", "13 kWh/100 km"],
             ["Peso vacío", "1.425 kg", "1.535 kg", "1.535 kg"],
             ["Rines", "Acero R17", "Aluminio R17", "Aluminio R18"],
             ["Audio", "4 parlantes", "6 parlantes", "8 parlantes"],
             ["Asientos delanteros", "Ajuste manual", "Conductor eléctrico", "Eléctricos"],
             ["Asistencias de manejo", "Control crucero", "Crucero adaptativo, frenado autónomo, mantenimiento de carril",
              "Lo de Luxury más cambio de carril, alerta de apertura de puertas y tráfico cruzado trasero"],
         ], "Datos: ficha técnica oficial de changanecuador.com. " + NOTA_PRECIOS),
         p(f"La ficha del modelo en nuestro sitio está en {a(F('changan-nevo-q05'), 'Changan Nevo Q05')}, y tiene "
           f"además su página en {a(PAG_NEVO, 'Changan Nevo Q05 EV')}."),

         h2("Lo que las tres versiones comparten"),
         ul([
             "Seis airbags, control de estabilidad, asistente de arranque y descenso en pendiente y monitoreo de "
             "presión de llantas.",
             "Pantalla de 14,6 pulgadas con Apple CarPlay y Android Auto, y control por voz.",
             "Cargador a bordo de 6,6 kW y puerto CCS2 (Tipo 2) para carga lenta y rápida.",
             "Función V2L para alimentar aparatos externos, útil en un paseo o un corte de luz.",
             "Garantía de 5 años o 150.000 km, y de 8 años o 160.000 km en batería y componentes eléctricos.",
         ]),

         h2("Cuánto recorre en la sierra: cómo leer las cifras de Changan"),
         p("Changan Ecuador publica dos números para la batería grande: 460 km en ciclo NEDC y 450 km «comprobados "
           "en Ecuador», según la página del modelo. El NEDC es un ciclo optimista; en uso real, con subidas y "
           "velocidad de carretera, lo prudente es planificar con bastante menos."),
         p("Para el uso típico de la zona alcanza con margen. Quien vive en Cayambe y trabaja en Ibarra recorre algo "
           "más de 110 km al día entre ida y vuelta: la batería grande lo cubre con holgura y la Elite también, "
           "aunque con ella conviene cargar cada noche. Changan declara además una carga "
           "rápida del 30 % al 80 % en 21 minutos, que resuelve un viaje más largo con una parada."),

         cta("¿No sabe si le basta la Elite?",
             "Cuéntenos su recorrido diario y si tiene garaje. Le decimos qué versión le alcanza y le agendamos la "
             "prueba de manejo.",
             "Consultar por WhatsApp",
             "Hola, vengo del artículo de Changan Nevo Q05. Quisiera saber qué versión me conviene y agendar una prueba de manejo."),

         h2("Cómo se carga en casa"),
         p("Las tres versiones traen un cargador a bordo de 6,6 kW. En la práctica eso significa que un cargador de "
           "pared instalado en su garaje le devuelve la batería llena durante la noche, mientras que un tomacorriente "
           "común lo hace mucho más despacio. Para quien maneja menos de 60 km al día, enchufar todas las noches en "
           "un tomacorriente bien instalado puede ser suficiente."),
         p(f"La cuenta de cuánto sube la planilla la hacemos en {a(CARGA_CASA, 'cuánto cuesta cargar un auto eléctrico en casa')}. "
           "Antes de comprar, pida a un electricista que revise si su instalación aguanta la carga."),

         h2("Qué versión elegir según su uso"),
         ol([
             "<strong>Elite:</strong> ciudad y trayectos cortos, con carga en casa todas las noches. Es la más liviana "
             "y la de menor consumo declarado. El precio «desde» del catálogo suele corresponder a esta versión.",
             "<strong>Luxury:</strong> la batería grande y los asistentes que más se usan en carretera, como el "
             "crucero adaptativo y el frenado autónomo. Es la opción equilibrada si sale seguido a Quito o a Tulcán.",
             "<strong>Premium:</strong> para quien pasa muchas horas al volante y valora el equipamiento completo de "
             "seguridad y confort.",
         ]),
         p("Confirme el precio final de cada versión con un asesor antes de decidir: la diferencia entre Elite y "
           "Luxury es la que define si la batería grande le compensa."),

         h2("Nevo Q05 frente al Omoda E5 Next"),
         p(f"El otro eléctrico que vendemos desde {pr('Omoda E5 Next')} es el {a(F('omoda-e5-next'), 'Omoda E5 Next')}. "
           "Según las fichas oficiales, el E5 Next tiene más potencia (208 HP contra 161) y una garantía general más "
           "larga (7 años o 200.000 km). El Nevo Q05 responde con más autonomía NEDC en sus versiones Luxury y "
           "Premium (460 km contra 422) y con una distancia entre ejes de 2.735 mm que se nota atrás y en el "
           "maletero, que la marca declara en hasta 1.380 litros con los asientos abatidos."),

         quote("En un eléctrico, la versión importa más que en uno a gasolina, porque cambia la batería. Antes de "
               "mirar la pantalla o los rines, pregunte cuántos kWh trae la unidad que le están cotizando."),

         h2("Cuándo el Nevo Q05 NO le conviene"),
         ul([
             "No tiene dónde cargar de forma fija: en Imbabura y Carchi todavía hay pocos cargadores públicos.",
             "Hace viajes largos frecuentes por rutas sin carga rápida: un híbrido le dará menos preocupaciones.",
             "Necesita tracción en las cuatro ruedas o más de cinco plazas.",
         ]),
         p(f"Para ver el resto de opciones, revise {a(EV_CHINOS, 'autos eléctricos chinos en Ecuador')} y "
           f"{a(ELEC_O_HIB, '¿eléctrico o híbrido? Cuál conviene de verdad')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿El Changan Nevo Q05 es híbrido o eléctrico?",
              "Es 100 % eléctrico. La ficha oficial de Changan Ecuador lo identifica así y no tiene motor a gasolina."),
             ("¿Cuánto tarda en cargar el Nevo Q05?",
              "Changan declara del 30 % al 80 % en 21 minutos en carga rápida. En casa, con el cargador a bordo de "
              "6,6 kW, la carga completa toma varias horas, ideal para hacerla de noche."),
             ("¿Qué garantía tiene la batería?",
              "8 años o 160.000 km en batería y componentes eléctricos, y 5 años o 150.000 km para el vehículo, "
              "según la ficha de Changan Ecuador."),
             ("¿Dónde puedo cotizar el Nevo Q05 en el norte del país?",
              f"En Comercial Hidrobo: Ibarra, Cayambe y Tulcán. Las agencias de Cayambe y Tulcán figuran también en "
              f"el formulario de cotización de Changan Ecuador. Escríbanos al {WHATSAPP_TXT}."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 22 · BAIC en Ecuador
# ═══════════════════════════════════════════════════════════════════════════════════
post(22,
     "BAIC en Ecuador: X35, U5 Plus y X55 II, qué ofrece cada uno y cuál elegir",
     "baic-ecuador-x35-u5-plus-x55", [43],
     "BAIC vende en nuestro catálogo dos SUV y un sedán desde $16.990. Qué motor trae cada uno, qué garantía "
     "declara la marca y una aclaración necesaria sobre el X55 II.",
     meta("BAIC en Ecuador: X35, U5 Plus y X55 II, cuál elegir",
          "Dos SUV y un sedán desde $16.990: el X35 turbo, el U5 Plus de 430 litros de maletero y el X55 II. "
          "Motores, seguridad y garantía de 7 años, uno por uno.",
          "baic ecuador"),
     SRC_X35 + SRC_U5 + SRC_X55,
     [
         p("BAIC es de las marcas chinas que menos se explican en las agencias, y por eso suele quedar fuera de la "
           "comparación. Es una pena, porque en el rango de los $17.000 tiene propuestas que no son obvias: un SUV "
           "compacto con motor turbo y un sedán con maletero de auto más grande."),
         p("Repasamos los tres modelos de BAIC que tenemos en catálogo con los datos de las fichas técnicas que "
           "publica la marca en baic.ec, y una aclaración sobre el X55 II que conviene conocer antes de cotizar."),

         h2("Dos SUV y un sedán, desde $16.990"),
         p("La primera sorpresa para muchos: el U5 Plus no es un SUV, es un sedán. BAIC lo clasifica así en su "
           "propia web. Los tres modelos, con lo que declara la marca:"),
         table(["", a(F("x35"), "BAIC X35"), a(F("us-plus"), "BAIC U5 Plus"), a(F("x55-ii"), "BAIC X55 II")], [
             ["Carrocería", "SUV compacto", "Sedán", "SUV mediano"],
             ["Precio desde", pr("BAIC X35"), pr("BAIC U5 Plus"), pr("BAIC X55 II")],
             ["Motor", "1.5 turbo, 150 HP, 210 Nm", "1.5, 111 HP, 142 Nm", "Confirmar versión con el asesor"],
             ["Transmisión", "Manual de 6 o CVT", "Manual de 5", "Confirmar con el asesor"],
             ["Maletero", "390 litros", "430 litros", "—"],
             ["Airbags", "2", "2 (frontales)", "—"],
             ["Garantía declarada", "7 años o 150.000 km", "7 años o 150.000 km", "Confirmar con el asesor"],
         ], "Datos: fichas técnicas de baic.ec (X35, edición 2026; U5 Plus). " + NOTA_PRECIOS),

         h2("BAIC X35: el turbo es lo que lo separa en la sierra"),
         p("Su ficha declara un motor 1.5 turbo de 150 HP y 210 Nm (la página del modelo dice 148 HP), con caja "
           "manual de seis velocidades o automática CVT. Es más potencia de la que suele traer un SUV de este precio, "
           "y en altura eso pesa: un motor turbo pierde menos fuerza a 2.200 metros, en Ibarra, o a casi 3.000, en "
           f"Tulcán. Lo explicamos en {a(ALTURA, 'cómo rinde un auto en la altura de la sierra')}."),
         p("Lo demás es correcto para su segmento: control de estabilidad y de tracción, freno de estacionamiento "
           "electrónico, pantalla de 8 pulgadas, sensores de reversa y 180 mm de despeje al suelo. El punto débil "
           "está en la seguridad pasiva: la ficha declara dos airbags."),
         p("Conviene mirar con atención la versión L, porque la página de BAIC le asigna varios de los elementos "
           "que más se notan en el uso diario: cámara de reversa, techo panorámico con sunroof, asientos mixtos de "
           "cuero y tela y aros de aleación de 17 pulgadas."),

         h2("BAIC U5 Plus: un sedán grande con precio de compacto"),
         p("Mide 4.660 mm de largo, más que muchos sedanes de su precio, y su maletero de 430 litros es de los "
           "amplios del catálogo. La ficha declara un 1.5 de 111 HP y 142 Nm con caja manual de cinco velocidades, "
           "control de estabilidad y de tracción, y airbags frontales."),
         p("En equipamiento, la página de BAIC destaca pantalla central de 12,3 pulgadas, instrumentos digitales de "
           "7, llave inteligente con botón de encendido, auto hold, sensor de presión de llantas y filtro de aire "
           "CN95. Es una opción para taxistas ejecutivos o familias que necesitan maletero y no altura."),

         h2("BAIC X55 II: el SUV mediano, y una aclaración"),
         p(f"En nuestro catálogo, el X55 II parte de {pr('BAIC X55 II')}. Al revisar la web de BAIC Ecuador "
           "encontramos que hoy publica el <strong>nuevo X55</strong>, una versión distinta que la marca define como "
           "«eléctrico no enchufable», con motor 1.5 turbo, 214 HP, 310 Nm y una autonomía aproximada de 904 km. "
           "La ficha del X55 II ya no está publicada."),
         p("Por eso no le damos aquí especificaciones del X55 II que no podemos respaldar con la fuente oficial. Si le "
           "interesa, pida al asesor la ficha de la unidad que se le está cotizando y confirme si es el X55 II o el "
           "nuevo X55. Son vehículos diferentes, con precios diferentes."),

         h2("X35 o U5 Plus: el mismo precio, dos necesidades distintas"),
         p(f"Los dos parten de {pr('BAIC X35')}, así que la decisión no pasa por el bolsillo sino por el uso. El "
           "X35 tiene la altura de un SUV, 180 mm de despeje y un motor que responde mejor en subidas; sirve para "
           "quien entra a caminos de tierra hacia Urcuquí o Pimampiro, o para quien vive en una zona alta y sube "
           "cuestas todos los días."),
         p("El U5 Plus es más largo, más bajo y tiene 40 litros más de maletero. Para quien maneja casi siempre en "
           "asfalto, por ejemplo entre Ibarra y Otavalo por la Panamericana, un sedán suele ser más estable a "
           "velocidad y más cómodo para los pasajeros de atrás. Si duda, pruebe los dos en la misma ruta."),

         cta("¿Le interesa uno de los tres?",
             "Le enviamos la ficha de la unidad disponible, el precio final y le agendamos la prueba de manejo.",
             "Pedir ficha y cotización",
             "Hola, vengo del artículo de BAIC en Ecuador. Quisiera la ficha técnica y cotización del modelo ___."),

         h2("Quién responde por BAIC en Ecuador"),
         p("Las fichas de BAIC llevan el sello de AYASA (Automotores y Anexos), el mismo importador de Omoda | Jaecoo. "
           "La garantía que declaran las fichas del X35 y del U5 Plus es de <strong>7 años o 150.000 km</strong>, de "
           "las más largas del segmento. Conviene leer qué mantenimientos exige para seguir vigente: lo explicamos en "
           f"{a(GARANTIA_FAB, 'qué cubre y qué no cubre la garantía de fábrica')}."),
         p(f"Puede ver la marca completa en nuestra página de {a(PAG_BAIC, 'BAIC')}."),

         quote("En BAIC, el X35 es el modelo que más sorprende en la prueba de manejo: la diferencia del turbo se "
               "siente apenas empieza la primera subida."),

         h2("Cuándo BAIC NO le conviene"),
         ul([
             "La seguridad pasiva es su prioridad: el X35 declara dos airbags. El Changan CS15 y el Chery Tiggo 2 Pro Max traen cuatro.",
             "Quiere un sedán automático: la ficha del U5 Plus solo muestra caja manual.",
             "Busca la marca con más talleres en el país: compare la red de servicio antes de decidir.",
         ]),
         p(f"Para ver a BAIC frente a las demás marcas chinas, revise {a(PILAR_CHINOS, 'la guía de carros chinos en Ecuador')} "
           f"o {a(MEJOR_CHINA, 'cuál es la mejor marca china calidad precio')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿El BAIC U5 Plus es SUV o sedán?",
              "Es un sedán. BAIC lo clasifica como tal en su web, con 4.660 mm de largo y 430 litros de maletero."),
             ("¿Cuál es el BAIC más barato?",
              f"El X35 y el U5 Plus, ambos desde {pr('BAIC X35')} en el catálogo de Comercial Hidrobo."),
             ("¿Qué garantía tiene BAIC en Ecuador?",
              "Las fichas del X35 y del U5 Plus declaran 7 años o 150.000 km. Confirme la cobertura de la unidad "
              "que compre con el asesor."),
             ("¿El X35 tiene caja automática?",
              "Sí. Su ficha muestra dos versiones: Turbo MT, con manual de seis velocidades, y Turbo AT, con caja CVT."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 23 · SUV por menos de $20.000
# ═══════════════════════════════════════════════════════════════════════════════════
post(23,
     "SUV por menos de $20.000: BAIC X35 vs Changan CS15 vs Chery Tiggo 2 Pro Max",
     "suv-menos-de-20000-x35-cs15-tiggo-2-pro-max", [48],
     "Tres SUV nuevos por menos de $20.000, separados por $1.500. El BAIC X35 tiene turbo, el Changan CS15 "
     "y el Tiggo 2 Pro Max más airbags. Comparamos motor, seguridad, equipamiento y garantía.",
     meta("SUV por menos de $20.000: X35 vs CS15 vs Tiggo 2 Pro Max",
          "Tres SUV nuevos entre $16.990 y $18.490: el único con turbo, los dos con cuatro airbags, su "
          "equipamiento y la garantía de cada marca. Cuál conviene.",
          "suv por menos de 20000"),
     SRC_X35 + SRC_CS15 + SRC_T2,
     [
         p("Con $20.000 de presupuesto, un SUV nuevo ya no es un sueño. En nuestro catálogo hay tres que entran con "
           f"margen: el BAIC X35 desde {pr('BAIC X35')}, el Changan CS15 desde {pr('Changan CS15')} y el Chery Tiggo 2 "
           f"Pro Max desde {pr('Chery Tiggo 2 Pro Max')}. Entre el más barato y el más caro hay $1.500."),
         p("Con diferencias de precio tan pequeñas, lo que decide es otra cosa: el motor, la seguridad y el "
           "equipamiento. Los comparamos con los datos que publica cada marca en Ecuador, pensando en quien maneja "
           "en Ibarra, sube a Cayambe o viaja a Tulcán."),

         h2("La respuesta corta"),
         p("Si su prioridad es el motor, el <strong>BAIC X35</strong> es el único con turbo y el único con opción de "
           "caja automática entre los tres. Si su prioridad es la seguridad, el <strong>Changan CS15</strong> y el "
           "<strong>Tiggo 2 Pro Max</strong> declaran cuatro airbags frente a dos. Entre esos dos, el CS15 trae "
           "pantalla más grande y sunroof; el Tiggo 2 Pro Max, freno de mano electrónico con auto hold y CarPlay "
           "inalámbrico."),
         table(["", a(F("x35"), "BAIC X35"), a(F("cs-15"), "Changan CS15"), a(F("chery-tiggo2-pro"), "Tiggo 2 Pro Max")], [
             ["Precio desde", pr("BAIC X35"), pr("Changan CS15"), pr("Chery Tiggo 2 Pro Max")],
             ["Motor", "1.5 turbo", "1.5 Blue Core", "1.5 Acteco"],
             ["Potencia / torque", "150 HP / 210 Nm", "105 HP / 137 Nm", "114 HP / 141 Nm"],
             ["Transmisión", "Manual de 6 o CVT", "Manual de 5", "Manual de 5"],
             ["Airbags", "2", "4", "4"],
             ["Control de estabilidad", "Sí", "Sí", "Sí"],
             ["Pantalla", "8 pulgadas", "10 pulgadas", "9 pulgadas"],
             ["Maletero", "390 L", "361 L", "No lo publica la marca"],
             ["Despeje al suelo", "180 mm", "180 mm", "No lo publica la marca"],
             ["Garantía declarada", "7 años o 150.000 km", "5 años o 150.000 km", "Confirmar con el asesor"],
         ], "Datos: fichas y páginas oficiales de baic.ec, changanecuador.com y chery.com.ec. " + NOTA_PRECIOS),

         h2("Motor: el turbo del X35 contra dos 1.5 atmosféricos"),
         p("El X35 declara 150 HP y 210 Nm. El CS15 tiene 105 HP y 137 Nm con inyección multipunto, y el Tiggo 2 "
           "Pro Max, 114 HP y 141 Nm. La diferencia no es menor: frente al CS15, el X35 tiene un 43 % más de potencia "
           "y un 53 % más de torque."),
         p("En la sierra norte se nota más que en la Costa. Un motor sin turbo pierde fuerza con la altura, y "
           "entre Ibarra, a unos 2.200 metros, y Tulcán, a casi 3.000, esa pérdida es real. Con cinco personas a "
           "bordo, la subida desde el valle del Chota hacia el Carchi separa a estos tres autos con claridad. "
           f"Lo explicamos en {a(ALTURA, 'cómo rinde un auto en la altura')}."),

         h2("Seguridad: dos airbags contra cuatro"),
         p("Es el contrapeso del X35. Su ficha declara airbags para conductor y pasajero, nada más. El CS15 suma "
           "laterales delanteros y el Tiggo 2 Pro Max también declara cuatro. Los tres tienen control de estabilidad, "
           "algo que no siempre se encontraba en este rango de precio hace pocos años, y el CS15 y el Tiggo 2 Pro "
           "Max declaran frenos de disco en las cuatro ruedas."),
         p("Si lleva niños o maneja muchas horas en carretera, esos dos airbags de diferencia deberían pesar en la "
           "decisión tanto como el motor."),

         cta("¿Quiere manejar los tres en la misma subida?",
             "Le agendamos la prueba de manejo de los tres SUV y le enviamos el precio final de cada versión.",
             "Agendar prueba por WhatsApp",
             "Hola, vengo del artículo de SUV por menos de $20.000. Quisiera probar el X35, el CS15 y el Tiggo 2 Pro Max."),

         h2("Equipamiento: dónde gana cada uno"),
         ul([
             "<strong>BAIC X35:</strong> freno de estacionamiento electrónico, pantalla de 8 pulgadas, sensores de "
             "reversa y, en la versión L, cámara de reversa, sunroof y aros de 17 pulgadas.",
             "<strong>Changan CS15:</strong> pantalla de 10 pulgadas con Apple CarPlay y Android Auto, encendido sin "
             "llave, sunroof, control crucero, cámara de retro y aros de aluminio de 17 pulgadas.",
             "<strong>Tiggo 2 Pro Max:</strong> pantalla de 9 pulgadas con CarPlay y Android Auto inalámbricos, freno "
             "electrónico con auto hold, cámara de retro con guías dinámicas y aros de 16 pulgadas.",
         ]),

         h2("Garantía: la diferencia que se nota después de comprar"),
         p("La ficha del X35 declara 7 años o 150.000 km y la del CS15, 5 años o 150.000 km. La página del Tiggo 2 "
           f"Pro Max no publica la cifra; las condiciones de Chery las explicamos en {a(GARANTIA_CHERY, 'la garantía Chery en Ecuador')}. "
           "En cualquier caso, pida la garantía por escrito con la cotización y pregunte qué mantenimientos exige."),
         p(f"Los tres se atienden en nuestro taller de Ibarra, en la Av. Mariano Acosta, y en las agencias de Cayambe "
           "y Tulcán, así que no tendrá que viajar a Quito para los mantenimientos de la garantía."),

         h2("Cuál elegir según su uso"),
         ol([
             "<strong>Vive en zona alta o sube cuestas a diario:</strong> el X35, por el turbo.",
             "<strong>Quiere caja automática sin pasar de $20.000:</strong> el X35 en versión CVT. Confirme el precio "
             "de esa versión, porque el «desde» suele ser la manual.",
             "<strong>Lleva familia y prioriza seguridad:</strong> el CS15 o el Tiggo 2 Pro Max, por los cuatro airbags.",
             "<strong>Usa mucho el celular en el auto:</strong> el Tiggo 2 Pro Max, por la conexión inalámbrica.",
         ]),

         quote("En este rango de precio no hay un ganador absoluto: hay un turbo con dos airbags y dos atmosféricos "
               "con cuatro. Decida cuál de las dos cosas usa más todos los días."),

         h2("Cuándo ninguno de los tres le conviene"),
         ul([
             f"Necesita más espacio o motor: con $1.500 más que el Tiggo 2 Pro Max está el Chery Tiggo 4 Pro desde {pr('Chery Tiggo 4 Pro')}, "
             f"que comparamos en {a(DUSTER_T4, 'Duster vs Tiggo 4 Pro')}.",
             f"Quiere dejar la gasolina: el Changan Nevo Q05 y el Omoda E5 Next, ambos eléctricos, parten de {pr('Changan Nevo Q05')}.",
             "Lleva carga pesada o entra a fincas con lodo: ninguno tiene 4x4; mire una pickup.",
         ]),
         p(f"Si quiere ampliar la lista, revise {a(SUV_COMPACTO, 'la comparativa de SUV compactos')} y "
           f"{a(T2_DUSTER, 'Tiggo 2 Pro Max vs Renault Duster')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿Cuál es el SUV nuevo más barato del catálogo?",
              f"Entre los tres de esta comparación, el BAIC X35, desde {pr('BAIC X35')}. " + NOTA_PRECIOS),
             ("¿Cuál de los tres tiene caja automática?",
              "Según las fichas oficiales, el BAIC X35 tiene versión con caja CVT. El CS15 y el Tiggo 2 Pro Max "
              "figuran con caja manual de cinco velocidades."),
             ("¿Cuál es el más seguro?",
              "El CS15 y el Tiggo 2 Pro Max declaran cuatro airbags; el X35, dos. Los tres tienen control de estabilidad."),
             ("¿Puedo financiar un SUV de menos de $20.000?",
              f"Sí. Revise las opciones en {a(FINANCIAMIENTO, 'financiamiento de autos en Comercial Hidrobo')} o "
              f"escríbanos al {WHATSAPP_TXT} con el modelo y la entrada que tiene."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 24 · Foton Tunland
# ═══════════════════════════════════════════════════════════════════════════════════
post(24,
     "Foton Tunland G7, V7, G9 o V9: cuál de las cuatro camionetas elegir",
     "foton-tunland-g7-v7-g9-v9-cual-elegir", [43],
     "Las cuatro Tunland de Foton se parecen por fuera y se separan por dentro: dos son diésel convencional y "
     "dos suman un sistema híbrido de 48 V. Motor, caja, tracción, carga y arrastre para elegir la correcta.",
     meta("Foton Tunland G7, V7, G9 o V9: cuál elegir",
          "La G es diésel convencional y la V suma un sistema híbrido de 48 V. Motor, caja, tracción, carga y "
          "arrastre de las cuatro Tunland, desde $24.990.",
          "foton tunland"),
     SRC_FOTON,
     [
         p("Foton vende cuatro camionetas Tunland y los nombres no ayudan: G7, V7, G9 y V9. Vistas en el patio de "
           "la agencia se parecen, pero entre la más barata y la más cara hay $20.000 de diferencia, y no es solo "
           "por el equipamiento."),
         p("Esta guía ordena la familia con las fichas técnicas oficiales de Foton Ecuador. Si ya decidió por la "
           f"V7, su ficha está en {a(F('tunland-v7'), 'Foton Tunland V7')} y su página en "
           f"{a(PAG_V7, 'Foton Tunland V7')}; aquí la comparamos con sus tres hermanas."),

         h2("La regla para entender los nombres"),
         p("<strong>La letra indica la tecnología del motor</strong>: la G es diésel convencional y la V es diésel "
           "con un sistema híbrido de 48 V que Foton llama <em>Diesel Hybrid</em>. <strong>El número indica el "
           "nivel</strong>: el 7 es la versión de trabajo, con más configuraciones, y el 9 es la de equipamiento "
           "superior, siempre 4x4."),
         table(["", a(F("tunland-g7"), "Tunland G7"), a(F("tunland-v7"), "Tunland V7"),
                a(F("tunland-g9"), "Tunland G9"), a(F("tunland-v9"), "Tunland V9")], [
             ["Precio desde", pr("Foton Tunland G7"), pr("Foton Tunland V7"), pr("Foton Tunland G9"), pr("Foton Tunland V9")],
             ["Motor", "2.0 diésel", "2.0 turbodiésel + 48 V", "2.0 diésel", "2.0 turbodiésel + 48 V"],
             ["Potencia", "160 HP", "173 HP combinados", "160 HP", "173 HP combinados"],
             ["Torque", "390 Nm", "450 Nm combinados", "390 Nm", "450 Nm combinados"],
             ["Transmisión", "Manual 6 o automática 8", "Manual 6 o automática ZF de 8", "Manual 6 o automática 8", "Automática ZF de 8"],
             ["Tracción", "4x2 o 4x4", "4x2 o 4x4 de tiempo parcial", "4x4", "4x4 de tiempo parcial"],
             ["Suspensión trasera", "Ballestas", "Ballestas", "Ballestas", "Multilink"],
             ["Airbags", "2 a 6 según versión", "2 a 6 según versión", "2", "8"],
         ], "Datos: fichas técnicas oficiales de fotonecuador.com (G7, V7 y V9 edición 2026; G9). " + NOTA_PRECIOS),

         h2("G o V: qué agrega el sistema de 48 V"),
         p("La V no es un híbrido enchufable. Su ficha describe un motor 2.0 turbodiésel de geometría variable "
           "(160 HP y 390 Nm) apoyado por un motor eléctrico de 48 V que suma 13 HP y 60 Nm. Ese empuje extra "
           "llega al arrancar y al acelerar, justo cuando una camioneta cargada más lo necesita, y la batería se "
           "recarga sola."),
         p("La ficha de la V7 y la V9 declara un consumo de hasta 8 litros cada 100 km, unos 47 km por galón. La "
           "ficha de la G no publica consumo, así que no podemos darle la diferencia exacta; sí podemos decirle que "
           f"en uso de ciudad, con muchas arrancadas, es donde el 48 V rinde más. Más opciones de bajo consumo en "
           f"{a(CAMIONETAS_CONSUMO, 'camionetas con mejor consumo de combustible')}."),

         h2("Carga y arrastre: el dato que cambia la elección"),
         p("Aquí aparece una diferencia que pocos preguntan. La V7 y la V9 declaran la misma capacidad de carga en "
           "el balde, 770 kg, pero no el mismo arrastre: la V7 puede remolcar hasta <strong>3.500 kg</strong> y la "
           "V9, <strong>2.000 kg</strong>. La razón está en la suspensión: la V7 usa ballestas atrás, pensadas para "
           "peso, y la V9 una suspensión multilink, más cómoda pero de menor capacidad de remolque."),
         p("Si su trabajo incluye mover un remolque con ganado, maquinaria o materiales hacia una finca en "
           "Pimampiro o en el valle del Chota, la V7 tiene más sentido que la V9 aunque cueste $15.500 menos."),

         cta("¿Duda entre dos Tunland?",
             "Cuéntenos qué carga, cuánto remolca y por qué caminos entra, y le decimos cuál conviene con el precio final.",
             "Consultar por WhatsApp",
             "Hola, vengo del artículo de Foton Tunland G7, V7, G9 o V9. Quisiera cotizar la versión ___ y agendar "
             "una prueba de manejo."),

         h2("Manual o automática: qué conviene en la sierra"),
         p("La caja manual de seis velocidades abarata la camioneta y es la preferida en flotas, donde varios "
           "conductores la usan y el mantenimiento se quiere simple. La automática de ocho velocidades, que en la "
           "V7 y la V9 es de la marca alemana ZF según la ficha, tiene sentido si maneja mucho en ciudad o si sube "
           "cuestas largas con carga: mantiene el motor en su mejor rango sin que usted tenga que buscar el cambio."),
         p("Una regla práctica: si la camioneta va a pasar el día entre el tráfico de Ibarra y caminos de segundo "
           "orden, la automática cansa menos y protege el embrague. Si va a hacer recorridos largos y constantes "
           "por la Panamericana, la manual cumple igual de bien y cuesta menos."),

         h2("Para quién es cada una"),
         ul([
             "<strong>Tunland G7:</strong> la de entrada y la más versátil. Foton Ecuador la ofrece en 4x2 y 4x4, "
             "con caja manual o automática, y además en versión a gasolina y en cabina simple. Para flotas y trabajo diario.",
             "<strong>Tunland V7:</strong> la de trabajo con mejor respuesta. Mismo uso que la G7, con el empuje del "
             "48 V, menor consumo declarado, arrastre de 3.500 kg y hasta seis airbags en la versión LX.",
             "<strong>Tunland G9:</strong> 4x4 diésel con mejor terminado, aros de 18 pulgadas y bloqueo de "
             "diferencial. Para quien quiere tracción y comodidad sin pagar el sistema híbrido.",
             "<strong>Tunland V9:</strong> la tope de gama. Automática ZF de 8 velocidades, suspensión multilink, "
             "ocho airbags, cámara de 540° y sonido Harman. Para quien usa la camioneta como auto familiar.",
         ]),
         p(f"Para el trabajo rural en general, revise {a(CAMIONETA_RURAL, 'qué camioneta es mejor para zonas rurales')} "
           f"y {a(CAMIONETA_COMERCIAL, 'qué camioneta es mejor para uso comercial')}."),

         quote("En pickups, el número que más decisiones cambia no es la potencia sino el arrastre. Antes de mirar "
               "pantallas, pregunte cuánto remolca la versión que le están cotizando."),

         h2("Cuándo una Tunland NO le conviene"),
         ul([
             "Necesita bajar al máximo el consumo: una pickup híbrida enchufable o de rango extendido gasta menos "
             f"en ciudad. Las comparamos en {a(Z9_HUNTER, 'Z9 PHEV vs Hunter REEV')}.",
             "Casi nunca carga peso y maneja en ciudad: un SUV será más cómodo y fácil de estacionar.",
             "Necesita la G9 con muchos airbags: su ficha declara dos. Para eso está la V9.",
         ]),
         p(f"Puede ver la marca completa en nuestra página de {a(PAG_FOTON, 'Foton')}."),

         h2("Preguntas frecuentes"),
         faq([
             ("¿La Foton Tunland V7 es híbrida?",
              "Sí, es un híbrido suave de 48 V: un 2.0 turbodiésel con un motor eléctrico que suma 13 HP y 60 Nm. No "
              "se enchufa; la batería se recarga sola."),
             ("¿Cuál es la Tunland más barata?",
              f"La G7, desde {pr('Foton Tunland G7')} en el catálogo de Comercial Hidrobo. " + NOTA_PRECIOS),
             ("¿Qué Tunland tienen caja automática?",
              "Según las fichas, la G7, la V7 y la G9 tienen versiones automáticas de 8 velocidades, y la V9 solo se "
              "vende automática."),
             ("¿Cuánto puede remolcar una Tunland?",
              "La ficha de la V7 declara hasta 3.500 kg y la de la V9, 2.000 kg. Confirme el dato de la versión exacta "
              "con el asesor."),
         ]),
     ])


# ═══════════════════════════════════════════════════════════════════════════════════
# 25 · Deepal G318
# ═══════════════════════════════════════════════════════════════════════════════════
post(25,
     "Deepal G318: el 4x4 de rango extendido que se maneja como eléctrico",
     "deepal-g318-4x4-rango-extendido", [58],
     "El Deepal G318 es un todoterreno 4x4 que siempre mueve las ruedas con electricidad y usa un motor a "
     "gasolina solo para generarla. Cómo funciona, qué trae para el campo y en qué versión conviene.",
     meta("Deepal G318: el 4x4 de rango extendido, explicado",
          "433 HP, tracción 4x4 y 143 km en eléctrico antes de que el motor a gasolina genere energía. Cómo "
          "funciona, versiones Elite y GT, y para quién conviene.",
          "deepal g318"),
     SRC_G318,
     [
         p("El Deepal G318 llama la atención apenas entra al patio: es cuadrado, alto y tiene la puerta trasera con "
           "apertura lateral, como los todoterreno de antes. Lo que no se ve es lo más interesante. Aunque tiene un "
           "motor a gasolina, sus ruedas siempre se mueven con electricidad."),
         p("Puede encontrarlo escrito como G138 en algunos listados; el nombre que usa la marca es G318. Aquí "
           "explicamos cómo funciona, qué trae para caminos difíciles según la ficha oficial de Deepal Ecuador y "
           f"para quién tiene sentido pagar los {pr('Deepal G318')} que marca nuestro catálogo."),

         h2("Qué es: un 4x4 eléctrico con su propio generador a bordo"),
         p("La ficha lo identifica como <strong>REEV</strong>, un vehículo eléctrico de rango extendido. Tiene dos "
           "motores eléctricos, uno por eje: 185 HP adelante y 248 HP atrás, para <strong>433 HP y 572 Nm</strong> "
           "en total, con tracción 4WD. Esos motores toman la energía de una batería LFP de 35,07 kWh."),
         p("El motor 1.5 turbo a gasolina, de 147 HP, no mueve las ruedas: funciona como generador cuando la "
           "batería baja. La ficha lo resume con una frase, «propulsión eléctrica completa». Por eso se maneja como "
           f"un eléctrico, con respuesta inmediata y silencio. La tecnología la explicamos en {a(REEV, 'qué es un REEV')}."),

         h2("Elite o GT: qué cambia entre las dos versiones"),
         table(["", "Elite", "GT"], [
             ["Precio desde", pr("Deepal G318"), "Consultar"],
             ["Potencia / torque", "433 HP / 572 Nm", "433 HP / 572 Nm"],
             ["Batería / autonomía eléctrica", "35,07 kWh / 143 km (NEDC)", "35,07 kWh / 143 km (NEDC)"],
             ["Autonomía combinada", "1.100 km", "1.100 km"],
             ["Llantas", "255/65 R18", "255/55 R20"],
             ["Suspensión neumática con sensores", "No", "Sí"],
             ["Ajuste continuo de amortiguación", "No", "Sí"],
             ["Sistema de audio", "8 parlantes", "16 parlantes"],
             ["Rack de techo", "Estándar", "Outdoor, con luces de camping"],
         ], "Datos: ficha técnica oficial de deepal.com.ec. " + NOTA_PRECIOS),
         p(f"La ficha del modelo en nuestro sitio está en {a(F('deepal-g138'), 'Deepal G318')}. Si va a usarlo en "
           "caminos de tierra con frecuencia, las llantas de 18 pulgadas de la Elite, con más perfil, toleran mejor "
           "los huecos; la suspensión neumática de la GT, en cambio, permite subir la carrocería cuando hace falta."),

         h2("Lo que trae para caminos de verdad"),
         ul([
             "Modos de manejo para arena, gravilla, barro y agua, y un modo de avance controlado para pendientes "
             "fuertes (gateo), según la ficha.",
             "Bloqueo de diferencial y giro en U sobre su propio eje, que la marca llama Tank Turn.",
             "Asistentes de arranque y descenso en pendiente y prevención de vuelco.",
             "Gancho de remolque que arrastra hasta 1.600 kg, según la página del modelo.",
             "Toma de 220 V y 3.300 W en el maletero y función V2L: alimenta herramientas o un campamento.",
         ]),
         p("Para quien recorre las vías de tercer orden de la zona de Intag o sube a los páramos de El Ángel en el "
           "Carchi, esa combinación de tracción eléctrica en ambos ejes y bloqueo de diferencial es lo que separa al "
           "G318 de un SUV con tracción integral."),
         p("Hay detalles pensados para el uso real. La puerta trasera se abre hacia la derecha, cierra sola por "
           "succión eléctrica y tiene un brazo amortiguador con bloqueo para que no se cierre con el viento. Los "
           "frenos son de disco ventilado en las cuatro ruedas, algo que se agradece en las bajadas largas, como la "
           "que va de Tulcán hacia el valle del Chota, con el vehículo cargado."),

         cta("¿Quiere probarlo fuera del asfalto?",
             "Le agendamos una prueba de manejo y le enviamos la cotización de la versión Elite o GT.",
             "Agendar prueba de manejo",
             "Hola, vengo del artículo de Deepal G318. Quisiera una prueba de manejo y cotización de la versión ___."),

         h2("Cuánto recorre con la batería y cuándo entra la gasolina"),
         p("La ficha declara 143 km en modo eléctrico (ciclo NEDC) y 1.100 km de autonomía combinada con el tanque "
           "lleno. En la práctica, quien carga en casa puede hacer sus recorridos diarios por Ibarra sin encender el "
           "generador, y en un viaje largo, a Quito o a la Costa, el motor a gasolina mantiene la batería sin que "
           "usted tenga que buscar un cargador."),
         p("Se carga con conector CCS2 (Tipo 2). En carga lenta de 7 kW, la ficha indica cinco horas o más. "
           f"Las diferencias con un híbrido enchufable las explicamos en {a(TECNOLOGIAS, 'PHEV, HEV, REEV y EV')}."),

         h2("Seguridad y garantía"),
         p("La ficha declara ocho airbags (frontales, laterales delanteros y posteriores, y de cortina), cámaras de "
           "540° con grabación, control crucero adaptativo, frenado autónomo de emergencia y mantenimiento de carril. "
           "La garantía es de <strong>5 años o 150.000 km</strong> para el vehículo y de <strong>8 años o 160.000 km</strong> "
           f"para la batería y los componentes eléctricos. Más sobre la marca en {a(DEEPAL_MARCA, 'Deepal en Ecuador')}."),

         h2("Cuatro preguntas antes de reservar un G318"),
         ol([
             "<strong>¿Elite o GT?</strong> Si va a entrar a caminos de tierra con frecuencia, pruebe las dos: las "
             "llantas y la suspensión cambian bastante el manejo.",
             "<strong>¿Dónde va a cargar?</strong> Para aprovechar los 143 km eléctricos necesita un punto de carga "
             "en casa o en el trabajo. Sin eso, el generador trabajará casi siempre.",
             "<strong>¿Dónde se hacen los mantenimientos?</strong> Pregunte qué taller atiende la garantía y cada "
             "cuántos kilómetros hay que llevarlo.",
             "<strong>¿Qué pide la garantía de la batería?</strong> Los 8 años o 160.000 km tienen condiciones; "
             "pídalas por escrito con la cotización.",
         ]),
         p(f"Si ya tiene claro que quiere un vehículo electrificado pero duda del tipo, la guía "
           f"{a(PRIMER_HIBRIDO, 'para comprar su primer híbrido')} le ordena las decisiones antes de firmar."),

         quote("El G318 tiene sentido para quien necesita un 4x4 de verdad y quiere dejar de pagar diésel en la "
               "ciudad. Si nunca sale del asfalto, está pagando capacidades que no va a usar."),

         h2("Cuándo el G318 NO le conviene"),
         ul([
             f"No necesita 4x4: con el mismo presupuesto, el Chery Tiggo 9 Super Hybrid ({pr('Chery Tiggo 9 Super Hybrid')}) "
             "ofrece siete asientos y tracción integral para asfalto y lastre.",
             f"Necesita un balde de carga: una pickup electrificada como la Changan Hunter REEV, desde {pr('Changan Hunter REEV')}, "
             f"resuelve mejor el trabajo. La comparamos en {a(Z9_HUNTER, 'Z9 PHEV vs Hunter REEV')}.",
             "No tiene dónde cargar: funcionará con gasolina casi todo el tiempo y perderá buena parte de la ventaja.",
         ]),

         h2("Preguntas frecuentes"),
         faq([
             ("¿El Deepal G318 es eléctrico o híbrido?",
              "Es un eléctrico de rango extendido (REEV). Las ruedas siempre las mueven motores eléctricos; el motor "
              "1.5 turbo a gasolina solo genera electricidad cuando la batería baja."),
             ("¿Se escribe G318 o G138?",
              "El nombre oficial de la marca es Deepal G318. G138 es una variante que circula en algunos listados."),
             ("¿Qué garantía tiene el G318?",
              "5 años o 150.000 km para el vehículo y 8 años o 160.000 km para la batería y los componentes "
              "eléctricos, según la ficha de Deepal Ecuador."),
             ("¿Cuánto puede remolcar el Deepal G318?",
              "Hasta 1.600 kg con su gancho de remolque, según la página oficial del modelo."),
         ]),
     ])
