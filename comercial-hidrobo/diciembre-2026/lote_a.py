#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote A — tanda de diciembre 2026 de Comercial Hidrobo: 10 posts de taller (temas 1-10 del plan).

Uso: python3 lote_a.py && python3 publish_batch.py --validate
NO publica nada: solo escribe posts/spec-<slug>.json.
"""
from comun import *

S = SITE
NOTA = p(f"<em>{NOTA_COSTOS}</em>")

# ── enlaces que se repiten ───────────────────────────────────────────────────────────
TOYOTA_MANT = f"{S}/cuidado-del-vehiculo-y-mantenimiento/tabla-mantenimiento-toyota-kilometraje/"
RENAULT_MANT = f"{S}/renault/mantenimiento-renault-comercial-hidrobo/"
FRENOS = f"{S}/cuidado-del-vehiculo-y-mantenimiento/mantenimiento-frenos-ibarra/"
DIAGNOSTICO = f"{S}/postventa/diagnostico-computarizado-automotriz-ibarra/"
VOLANTE = f"{S}/cuidado-del-vehiculo-y-mantenimiento/volante-vibra-causas-segun-velocidad/"
LLANTAS = f"{S}/consejos/desgaste-de-llantas-como-leerlo-cuando-cambiarlas/"
CHECKLIST_SIERRA = f"{S}/consejos/checklist-antes-de-viaje-largo-sierra/"
RURALES = f"{S}/cuidado-del-vehiculo-y-mantenimiento/mantenimiento-auto-zonas-rurales/"
AC_NO_ENFRIA = f"{S}/consejos/aire-acondicionado-auto-no-enfria-causas/"
MATRICULA = f"{S}/consejos/matriculacion-vehicular-imbabura-2026/"
TULCAN = f"{S}/cuidado-del-vehiculo-y-mantenimiento/taller-automotriz-tulcan-comercial-hidrobo/"
HIBRIDO_MANT = f"{S}/mantenimiento-y-tecnologia/mantenimiento-hibrido-costos-ecuador-2026/"
POSTVENTA_PREMIUM = f"{S}/postventa/postventa-toyota-mazda-jeep-servicio-capacitado/"
F = lambda slug: f"{S}/vehiculos/{slug}/"


def meta(t, d, k):
    return {"_yoast_wpseo_title": t, "_yoast_wpseo_metadesc": d, "_yoast_wpseo_focuskw": k}


def cta(pregunta, texto, boton, msg):
    return cta_temprano(pregunta, texto, boton, msg, reserva=True) + "\n\n" + FORM_CITA


def post(n, title, slug, cats, excerpt, m, fuentes, bloques):
    return guarda(dict(n=n, title=title, slug=slug, categories=cats, excerpt=excerpt, meta=m,
                       fuentes=fuentes, content="\n\n".join(bloques + [CIERRE])))


# ═════════════════════════════════════════════════════════════════════════════════════
# 1. Chery
# ═════════════════════════════════════════════════════════════════════════════════════
post(1, "Mantenimiento Chery por kilometraje: qué incluye cada servicio y cuánto cuesta",
     "mantenimiento-chery-kilometraje", [52],
     "Calendario de mantenimiento Chery por kilometraje, qué se hace en cada servicio, costos referenciales "
     "en Ecuador y lo que cambia en los Tiggo Super Hybrid.",
     meta("Mantenimiento Chery por kilometraje: tabla y costos",
          "Qué incluye cada servicio Chery de 5.000 a 60.000 km, cuánto cuesta como referencia y qué cambia "
          "en los Tiggo híbridos. Agende en Ibarra, Cayambe o Tulcán.",
          "mantenimiento chery"),
     ["https://www.chery.com.ec/posventa", "https://www.chery.com.ec/"],
     [
    p("Un Chery nuevo sale del concesionario con una garantía amplia y un plan de mantenimientos que casi "
      "nadie lee hasta que el tablero enciende la llave inglesa. Ahí empiezan las preguntas: qué toca a "
      "este kilometraje, si es solo el aceite o algo más, y cuánto va a costar."),
    p("Esta guía ordena el mantenimiento Chery por kilometraje: qué se hace en cada visita, cuánto cuesta "
      "como referencia en Ecuador, qué cambia en los Tiggo Super Hybrid y cuándo conviene adelantar un "
      "servicio si usted maneja entre Ibarra, Cayambe y Tulcán, con subidas largas y caminos lastrados."),
    h2("Cada cuánto se hace el mantenimiento de un Chery"),
    p("Chery Ecuador no publica en su página una tabla única de intervalos: su sección de posventa indica que "
      "los servicios van «según kilometraje» y que el detalle depende del modelo. Como referencia general, "
      "el esquema que siguen la mayoría de modelos a gasolina es un servicio liviano cada <strong>5.000 km</strong> "
      "y uno completo cada <strong>10.000 km</strong>, con servicios mayores a los 20.000, 40.000 y 60.000 km. "
      "Es un calendario referencial: confirme con el plan de su modelo, que viene en el manual de garantía."),
    p("La regla que sí aplica a todos: lo que llegue primero, kilómetros o meses. Un Tiggo 2 Pro Max que hace "
      "poco recorrido dentro de Ibarra puede necesitar el cambio de aceite por tiempo antes que por kilómetros."),
    table(["Kilometraje", "Qué incluye", "Costo referencial estimado"], [
        ["5.000 km", "Aceite y filtro de aceite, revisión de niveles, frenos, luces y llantas", "USD 70 - 110"],
        ["10.000 km", "Lo anterior + filtro de aire, limpieza de cuerpo de aceleración, rotación de llantas", "USD 120 - 180"],
        ["20.000 km", "Lo anterior + filtro de cabina, limpieza de inyección, alineación y balanceo, diagnóstico", "USD 180 - 280"],
        ["40.000 km", "Lo anterior + líquido de frenos, bujías según motor, revisión de bandas", "USD 250 - 400"],
        ["60.000 km", "Lo anterior + aceite de caja según versión, refrigerante, revisión de suspensión", "USD 300 - 500"],
    ], "Calendario referencial; las tareas exactas dependen del modelo y del motor."),
    NOTA,
    h2("Qué incluye un mantenimiento Chery, tarea por tarea"),
    p("La lista de Chery Care, el plan prepagado de la marca en Ecuador, sirve de mapa de lo que entra en "
      "los servicios. Chery la agrupa en cuatro frentes:"),
    ul(["<strong>Fluidos:</strong> aceite de motor con su filtro, aceite de caja o diferencial, líquido de frenos y refrigerante.",
        "<strong>Motor:</strong> limpieza del cuerpo de aceleración y de la inyección, filtro de aire, revisión o cambio de la banda de accesorios y bujías de iridio cuando corresponde.",
        "<strong>Seguridad:</strong> inspección de 20 puntos que recorre motor, transmisión, dirección, carrocería y sistemas de seguridad activa y pasiva.",
        "<strong>Frenos, dirección y suspensión:</strong> limpieza y regulación de frenos, alineación, balanceo y rotación de llantas."]),
    p("No todo se hace en cada visita. El cambio de aceite es de todas las veces; el líquido de frenos y las "
      "bujías llegan en los servicios mayores. Por eso el costo sube y baja a lo largo del calendario."),
    cta("¿Su Chery ya llegó a uno de estos kilometrajes?",
        "Escríbanos el modelo, el año y el kilometraje, y le confirmamos el turno y el costo en Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento Chery",
        "Hola, vengo del artículo de mantenimiento Chery por kilometraje. Quiero agendar el servicio de mi Chery."),
    h2("Lo que cambia en los Tiggo Super Hybrid"),
    p(f"Los {a(F('tigo-7-super-hybrid'), 'Tiggo 7 Super Hybrid')}, Tiggo 8 y Tiggo 9 Super Hybrid combinan un "
      "motor a gasolina con uno eléctrico. El motor de combustión sigue necesitando aceite, filtros y bujías, "
      "así que el calendario base no desaparece. Lo que se suma es el diagnóstico de la batería de alto "
      "voltaje, que Chery incluye en la lista de su plan de mantenimiento."),
    p(f"Hay una diferencia de uso que conviene conocer: en ciudad el híbrido apaga mucho el motor de gasolina, "
      f"y eso alarga la vida de las pastillas de freno porque parte del frenado lo hace el motor eléctrico. Si "
      f"quiere ver cómo funciona el sistema, lo explicamos en {a(f'{S}/vehiculos-electricos-e-hibridos/chery-super-hybrid-csh-ecuador/', 'qué es el Chery Super Hybrid')}."),
    h2("Notas por modelo del portafolio Chery"),
    ul([f"<strong>{a(F('chery-tiggo-7'), 'Tiggo 7 Pro Max')}:</strong> la SUV a gasolina más vendida de la gama; sigue el calendario base. Si viaja seguido por la Panamericana hacia Quito con la familia y carga, revise frenos en cada servicio.",
        f"<strong>{a(F('tiggo-4-pro'), 'Tiggo 4 Pro')}:</strong> SUV compacta de uso urbano. Mucho trayecto corto con motor frío pide no estirar el cambio de aceite por tiempo.",
        f"<strong>{a(F('chery-tiggo2-pro'), 'Tiggo 2 Pro Max')} y {a(F('chery-arrizo-3'), 'Arrizo 5 Pro Max')}:</strong> los de mantenimiento más económico de la marca; los servicios livianos son los que más se repiten.",
        "<strong>Tiggo 8 y Tiggo 9 Super Hybrid:</strong> calendario base más diagnóstico de batería de alto voltaje. Con siete asientos y carga completa, las llantas y la suspensión trabajan más."]),
    h2("Garantía Chery y mantenimiento: qué dice la marca"),
    p(f"En sus preguntas frecuentes, Chery Ecuador aclara que hacer el mantenimiento fuera de su red no "
      f"necesariamente hace perder la garantía, pero recomienda repuestos originales y talleres autorizados para "
      f"conservar la cobertura completa de fábrica. El detalle de lo que cubre está en {a(f'{S}/consejos/garantia-chery-ecuador-cobertura/', 'la garantía Chery en Ecuador')}."),
    p("En la práctica, lo que protege su garantía es tener cada servicio registrado a tiempo, con fecha y "
      "kilometraje. Si un día hay que reclamar algo del motor, ese historial es lo primero que se revisa."),
    h2("Cuándo adelantar un servicio si maneja en el norte"),
    p("El calendario de fábrica supone un uso promedio. En Imbabura y Carchi hay tres situaciones que cambian "
      "la cuenta:"),
    ol(["<strong>Caminos de tierra o lastre</strong>, como las vías hacia comunidades de Otavalo o Pimampiro: el filtro de aire se tapa antes. Revíselo cada 5.000 km.",
        "<strong>Subidas largas con carga</strong>, como el ascenso desde el valle del Chota hacia Tulcán: el motor y los frenos trabajan más que en el manual.",
        "<strong>Trayectos cortos y repetidos</strong> dentro de la ciudad: el aceite se degrada aunque el odómetro avance poco."]),
    quote("El Chery que mejor llega a los 100.000 km no es el que menos gastó en talleres, sino el que nunca se "
          "saltó un cambio de aceite. Lo que más vemos en los motores con problemas es un servicio que se "
          "postergó dos o tres veces."),
    h2("Cuándo el mantenimiento en el concesionario NO le conviene"),
    p("Si su Chery ya salió de garantía, tiene muchos kilómetros y usted solo necesita un cambio de aceite "
      "puntual, un taller de confianza cercano puede resolverlo. Lo que no conviene es usar repuestos "
      "genéricos en piezas críticas, como frenos o la banda de accesorios, ni saltarse el diagnóstico de la "
      "batería en un híbrido: ese sí necesita herramienta de la marca."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se cambia el aceite de un Chery?",
         "Como referencia, cada 5.000 km o el tiempo que indique el manual, lo que llegue primero. Algunos modelos "
         "admiten intervalos más largos con aceite sintético; confírmelo con el plan de su versión."),
        ("¿Cuánto cuesta el mantenimiento de 10.000 km de un Chery?",
         "Como costo referencial estimado, entre USD 120 y 180 según el modelo y el motor. El valor exacto se lo "
         "confirma un asesor con el modelo, el año y el kilometraje."),
        ("¿Qué es Chery Care?",
         "Es el plan de mantenimiento prepagado de Chery Ecuador: cubre cuatro mantenimientos o tres años, congela "
         "el precio de partes y mano de obra y da descuentos en repuestos de desgaste y accesorios."),
        ("¿Un Tiggo Super Hybrid cuesta más de mantener?",
         "El calendario base es el mismo que el de un Chery a gasolina y se suma el diagnóstico de la batería de "
         "alto voltaje. En ciudad suele desgastar menos los frenos, lo que compensa parte de la diferencia."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 2. DongFeng
# ═════════════════════════════════════════════════════════════════════════════════════
DF_PALADIN = "https://dongfeng.ec/wp-content/uploads/2026/05/MARESA-DONGFENG-PALADIN-01082025.pdf"
DF_MAGE = "https://dongfeng.ec/wp-content/uploads/2026/05/MARESA-DONGFENG-MAGE-EV-MNT-19012026.pdf"
post(2, "Mantenimiento DongFeng por kilometraje: calendario, qué incluye y costos",
     "mantenimiento-dongfeng-kilometraje", [51],
     "El calendario oficial de mantenimiento DongFeng cada 10.000 km, qué se hace en cada servicio y cuánto "
     "cuesta, con las tablas publicadas por la marca para la Paladin y la Mage EV.",
     meta("Mantenimiento DongFeng por kilometraje: tabla y costos",
          "DongFeng hace el mantenimiento cada 10.000 km. Vea qué incluye cada servicio, los valores que publica "
          "la marca y cuánto cuesta en su modelo. Reserve en línea.",
          "mantenimiento dongfeng"),
     [DF_PALADIN, DF_MAGE, "https://dongfeng.ec/"],
     [
    p("DongFeng es de las pocas marcas que publica en Ecuador sus tablas de mantenimiento con valores por "
      "kilometraje. Eso es una ventaja para el dueño: se puede saber con meses de anticipación cuánto va a "
      "costar el servicio de los 40.000 km y no llevarse sorpresas."),
    p("Aquí está cómo funciona el calendario DongFeng, qué se hace en cada visita, cuánto cuesta según las "
      "tablas de la marca y qué cambia entre una SUV a gasolina, una pickup y un modelo eléctrico. Lo "
      "atendemos en nuestros talleres de Ibarra, Cayambe y Tulcán."),
    h2("Cada cuánto se hace el mantenimiento de un DongFeng"),
    p("<strong>Cada 10.000 km.</strong> Las tablas que publica DongFeng Ecuador para sus modelos organizan "
      "el mantenimiento preventivo en servicios cada 10.000 km, con uno más completo cada 20.000 km. Los "
      "servicios de 10.000, 30.000 y 50.000 km son los livianos; los de 20.000, 40.000 y 80.000 km suman "
      "fluidos, bujías y aire acondicionado, y por eso cuestan más."),
    p("La propia marca aclara en sus tablas que algunas tareas dependen del kilometraje y no se repiten en "
      "todos los mantenimientos. Por eso el precio sube y baja en vez de crecer en línea recta."),
    h2("Qué incluye cada servicio DongFeng"),
    p("Tomando como ejemplo la tabla oficial de la Paladin (SUV 4x4 a gasolina), el reparto es este:"),
    table(["Tarea", "Cada 10.000 km", "Cada 20.000 km"], [
        ["Aceite y filtro de motor", "Sí", "Sí"],
        ["Aceite de diferenciales delantero y posterior", "Sí", "Sí"],
        ["Aceite de la caja de transferencia", "—", "Sí"],
        ["Líquido de frenos y refrigerante", "—", "Sí"],
        ["Filtro de aire, limpieza de cuerpo de aceleración e inyección", "Sí", "Sí"],
        ["Bujías de iridio y bandas de accesorios", "—", "Sí"],
        ["Mantenimiento del aire acondicionado", "—", "Sí"],
        ["Inspección de 20 puntos, ABC de frenos, alineación, balanceo y rotación", "Sí", "Sí"],
        ["Diagnóstico computarizado", "Sí", "Sí"],
    ], "Fuente: tabla de operaciones de mantenimiento de la DongFeng Paladin, publicada por DongFeng Ecuador."),
    p("Un detalle que no traen muchas marcas: la alineación, el balanceo y la rotación de llantas entran en "
      "cada servicio de 10.000 km. En una SUV que sube y baja por la sierra todos los días, eso se nota en la "
      "duración de las llantas."),
    cta("¿Su DongFeng ya marca 10.000, 20.000 o 40.000 km?",
        "Díganos el modelo, el año y el kilometraje y le confirmamos el turno y el valor en Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento DongFeng",
        "Hola, vengo del artículo de mantenimiento DongFeng por kilometraje. Quiero agendar el servicio de mi DongFeng."),
    h2("Cuánto cuesta el mantenimiento DongFeng"),
    p("El costo depende sobre todo del tipo de servicio y del motor. Como referencia, estos son rangos "
      "estimados sin partes de desgaste (pastillas, llantas, amortiguadores):"),
    table(["Servicio", "SUV y pickups a gasolina o diésel", "Mage eléctrica"], [
        ["Liviano (10.000, 30.000, 50.000 km)", "USD 200 - 300", "USD 150 - 200"],
        ["Intermedio (20.000, 60.000 km)", "USD 380 - 520", "USD 130 - 180"],
        ["Mayor (40.000, 80.000 km)", "USD 550 - 800", "USD 280 - 350"],
    ]),
    p("En las versiones 4x4 el servicio mayor suma los aceites de diferenciales y caja de transferencia, por "
      "eso queda en la parte alta del rango."),
    NOTA,
    h2("Cómo planificar el gasto sin sorprenderse"),
    p("El calendario DongFeng sigue un patrón que se repite en casi todos los modelos: los servicios de 10.000, "
      "30.000, 50.000, 70.000 y 90.000 km cuestan lo mismo, porque son el servicio liviano. Los de 20.000 y 60.000 "
      "km suben porque suman fluidos y bujías. Y los de 40.000 y 80.000 km son los más caros del ciclo, porque "
      "coinciden casi todas las tareas a la vez."),
    p("Con eso se puede planificar: si su DongFeng recorre 20.000 km al año, sabrá que cada dos años le toca uno de "
      "los servicios caros. Separar ese valor mes a mes es más fácil que encontrarlo de golpe."),
    h2("Notas por modelo DongFeng"),
    ul([f"<strong>{a(F('paladin'), 'Paladin')}:</strong> la 4x4 tiene diferenciales y caja de transferencia, y por eso su mantenimiento es de los más completos. Si sale a caminos de tierra, el filtro de aire merece revisión antes.",
        f"<strong>{a(F('mage'), 'Mage')}:</strong> la versión eléctrica no lleva aceite de motor ni filtros de motor. Su plan cambia aceite de la caja reductora, líquido de frenos y refrigerante del sistema de batería en kilometrajes puntuales, y revisa frenos, llantas y aire acondicionado en cada visita.",
        f"<strong>{a(F('rich-7'), 'Rich 7')} y {a(F('dongfeng-rich-6'), 'Rich 6 Pro')}:</strong> pickups de trabajo. Con carga frecuente, revise frenos y suspensión en cada servicio, sin esperar al mayor.",
        f"<strong>{a(F('huge-hybrid'), 'Huge')} y {a(F('z9'), 'Z9')}:</strong> electrificados con motor a gasolina; siguen el calendario de aceite y filtros más la revisión del sistema eléctrico."]),
    h2("Por qué conviene hacerlo en un taller autorizado DongFeng"),
    p(f"El diagnóstico computarizado de la marca entra en cada servicio, y en los modelos electrificados es la "
      f"única forma de leer el estado del sistema híbrido o de la batería. Además, el historial de servicios "
      f"registrados es el que sostiene la garantía: el detalle está en {a(f'{S}/dongfeng/garantia-dongfeng-comercial-hidrobo/', 'la garantía DongFeng en Comercial Hidrobo')}."),
    p(f"Si todavía duda de la marca, en {a(f'{S}/dongfeng/dongfeng-es-confiable-ecuador/', 'este análisis de confiabilidad de DongFeng')} "
      "revisamos repuestos y respaldo en Ecuador."),
    quote("El calendario de DongFeng tiene una ventaja que pocos aprovechan: permite saber hoy cuándo llega el "
          "servicio caro de los 40.000 km. El que lo planifica no lo posterga, y el que no lo posterga no termina "
          "pagando una reparación."),
    h2("Cuándo el mantenimiento de agencia NO le conviene"),
    p("Si su DongFeng es de un modelo antiguo que ya salió de garantía y solo necesita un cambio de aceite, un "
      "taller de barrio de confianza puede bastar. Para los electrificados (Mage, Huge, Z9) no es buena idea: "
      "sin el diagnóstico de la marca, un problema del sistema híbrido o de la batería pasa sin verse."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se hace el mantenimiento de un DongFeng?",
         "Cada 10.000 km, según las tablas que publica DongFeng Ecuador. Cada 20.000 km llega un servicio más "
         "completo que suma fluidos, bujías y aire acondicionado."),
        ("¿Cuánto cuesta el mantenimiento de 10.000 km de una DongFeng Paladin?",
         "Como costo referencial estimado, entre USD 200 y 300 sin partes de desgaste. "
         "El valor exacto de su versión se lo confirma un asesor."),
        ("¿El DongFeng Mage eléctrico necesita mantenimiento?",
         "Sí, aunque no lleva aceite de motor. Su plan revisa frenos, llantas y aire acondicionado cada 10.000 km "
         "y cambia aceite de la caja reductora, líquido de frenos y refrigerante de la batería en kilometrajes puntuales."),
        ("¿El mantenimiento incluye pastillas y llantas?",
         "No. El servicio preventivo cubre las partes y operaciones del plan; las piezas de desgaste se cotizan "
         "aparte cuando hace falta cambiarlas."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 3. Changan
# ═════════════════════════════════════════════════════════════════════════════════════
CH_GARANTIA = "https://www.changanecuador.com/postventa/garantía"
post(3, "Mantenimiento Changan por kilometraje: qué incluye, costos y garantía",
     "mantenimiento-changan-kilometraje", [46],
     "Calendario referencial de mantenimiento Changan, qué se hace en cada servicio, costos estimados en "
     "Ecuador y qué exige la garantía de 5 años o 150.000 km.",
     meta("Mantenimiento Changan por kilometraje: tabla y costos",
          "Qué incluye cada servicio Changan, cuánto cuesta como referencia y cómo cuidar la garantía de 5 años o "
          "150.000 km. Para CS15, Hunter, Alsvin y los REEV.",
          "mantenimiento changan"),
     [CH_GARANTIA, "https://www.changanecuador.com/"],
     [
    p("Changan creció rápido en el norte del país: CS15, Alsvin, Hunter y ahora los REEV que cargan su batería "
      "con un motor a gasolina. Con tantos modelos distintos, la pregunta en el taller se repite: qué toca a "
      "cada kilometraje y cuánto cuesta mantener la garantía vigente."),
    p("Aquí está el calendario de mantenimiento Changan por kilometraje, qué incluye cada servicio, los costos "
      "referenciales en Ecuador y las notas por modelo para quien maneja en Ibarra, Cayambe o Tulcán."),
    h2("Cada cuánto se hace el mantenimiento de un Changan"),
    p("Changan Ecuador no publica una tabla de intervalos en su sitio: remite al manual de garantía que se "
      "entrega con el vehículo. Como referencia, el esquema estándar es un servicio liviano cada "
      "<strong>5.000 km</strong> y uno completo cada <strong>10.000 km</strong>, con servicios mayores a los "
      "20.000, 40.000 y 60.000 km. Es un calendario referencial: confirme con el plan de su modelo."),
    p("Lo que sí publica la marca es su garantía, y eso pesa sobre el calendario: para modelos 2024 en adelante, "
      "el motor y sus componentes tienen <strong>5 años o 150.000 km</strong>, y las camionetas <strong>10 años o "
      "150.000 km</strong>. Esa cobertura depende de cumplir los mantenimientos del manual."),
    table(["Kilometraje", "Qué incluye", "Costo referencial estimado"], [
        ["5.000 km", "Aceite y filtro de aceite, revisión de niveles, frenos, luces y llantas", "USD 60 - 100"],
        ["10.000 km", "Lo anterior + filtro de aire, rotación de llantas, revisión de batería", "USD 110 - 170"],
        ["20.000 km", "Lo anterior + filtro de cabina, limpieza de inyección, alineación, diagnóstico", "USD 170 - 260"],
        ["40.000 km", "Lo anterior + líquido de frenos, bujías, revisión de bandas y suspensión", "USD 230 - 380"],
        ["60.000 km", "Lo anterior + refrigerante, aceite de caja según versión", "USD 280 - 480"],
    ], "Calendario referencial; las tareas exactas dependen del modelo y del motor."),
    NOTA,
    h2("Qué cubre la garantía Changan y qué no"),
    p("La página de garantía de Changan Ecuador separa la cobertura por componente:"),
    ul(["<strong>Motor y componentes:</strong> 5 años o 150.000 km en modelos 2024 en adelante (camionetas: 10 años o 150.000 km). En modelos anteriores, 5 años o 100.000 km.",
        "<strong>Carrocería:</strong> 3 años o 100.000 km.",
        "<strong>Batería de 12 voltios y carga del aire acondicionado:</strong> 1 año o 20.000 km.",
        "<strong>Componentes y baterías híbridas:</strong> 8 años o 160.000 km."]),
    p("Las piezas de desgaste y el mantenimiento preventivo no entran en la garantía: pastillas, llantas, "
      "filtros y aceite los paga el dueño. Lo que la garantía exige es que esos servicios se hagan a tiempo."),
    cta("¿Le toca el mantenimiento a su Changan?",
        "Escríbanos el modelo, el año y el kilometraje, y le confirmamos turno y costo en Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento Changan",
        "Hola, vengo del artículo de mantenimiento Changan por kilometraje. Quiero agendar el servicio de mi Changan."),
    h2("Los REEV: un motor a gasolina que no mueve las ruedas"),
    p(f"El {a(F('hunter-reev'), 'Hunter REEV')} y el {a(F('cs-35-2'), 'CS55 R-EV')} se mueven con motor "
      f"eléctrico, pero llevan un motor a gasolina que funciona como generador para cargar la batería. Ese motor "
      f"necesita aceite, filtros y bujías como cualquier otro, aunque trabaje menos horas. Lo explicamos en "
      f"{a(f'{S}/vehiculos-electricos-e-hibridos/que-es-reev-changan-hunter-cs55-ecuador/', 'qué es un REEV')}."),
    p("Lo que se suma es la revisión del sistema de alto voltaje con el escáner de la marca, y la batería tiene "
      "su propia garantía de 8 años o 160.000 km. Si usted carga poco y usa mucho el generador, el aceite se "
      "consume como en un auto convencional: no estire el cambio."),
    h2("Notas por modelo Changan"),
    ul([f"<strong>{a(F('cs-15'), 'CS15')} y {a(F('alsvin-v3'), 'Changan V3')}:</strong> de mantenimiento sencillo y económico. Mucho uso urbano con trayectos cortos pide respetar el cambio de aceite por tiempo.",
        f"<strong>{a(F('hunter'), 'Hunter')}:</strong> pickup con la garantía de camioneta de 10 años o 150.000 km en motor. Con carga en el balde, revise frenos y suspensión en cada servicio.",
        "<strong>Star Truck, M60 y Honor S:</strong> vehículos de trabajo que suelen recorrer más kilómetros al mes que un particular; el calendario se cumple más rápido y conviene agendarlo con tiempo.",
        "<strong>Deepal S05, S07 y G318:</strong> la línea electrificada de Changan; el mantenimiento se concentra en frenos, llantas, suspensión y el diagnóstico del sistema eléctrico."]),
    h2("Lo que usted puede revisar entre un servicio y otro"),
    p("Entre visita y visita hay cinco minutos de revisión que cualquier dueño puede hacer en la cochera, y que "
      "evitan llegar al taller con un problema ya avanzado:"),
    ul(["<strong>Nivel de aceite</strong> con la varilla, en plano y con el motor frío. Si baja entre servicios, avísele al asesor.",
        "<strong>Presión de las llantas</strong> una vez al mes, con el valor que trae la etiqueta de la puerta del conductor.",
        "<strong>Testigos del tablero</strong> al encender: si alguno queda prendido, no espere al próximo servicio.",
        "<strong>Ruidos al frenar</strong> o un pedal que se siente más largo de lo normal.",
        "<strong>Manchas en el piso</strong> donde se estaciona: aceite, refrigerante o líquido de frenos dejan rastros distintos."]),
    h2("El uso en la sierra norte cambia el calendario"),
    p("El manual supone un uso promedio. Si su Changan sube a diario a sectores altos de Ibarra, recorre "
      "caminos lastrados hacia las parroquias rurales o trabaja con carga hacia el Carchi, el desgaste llega "
      f"antes. Más detalles en {a(RURALES, 'el mantenimiento para autos en zonas rurales')}."),
    quote("Con la garantía de Changan pasa algo curioso: el dueño cuida los primeros 20.000 km y luego se "
          "relaja, justo cuando la cobertura del motor todavía tiene cuatro años por delante. El registro de "
          "servicios es lo que la mantiene viva."),
    h2("Cuándo el mantenimiento en agencia NO le conviene"),
    p("Si su Changan es un modelo anterior con la garantía ya vencida y solo necesita un cambio de aceite, "
      "puede resolverlo en un taller de confianza. Mientras siga dentro de los 5 años o 150.000 km, saltarse "
      "el taller autorizado arriesga una cobertura que vale mucho más que lo que se ahorra."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se hace el mantenimiento de un Changan?",
         "Como referencia, un servicio liviano cada 5.000 km y uno completo cada 10.000 km. El intervalo exacto "
         "de su modelo está en el manual de garantía que entrega la marca."),
        ("¿Cuánto dura la garantía de Changan en Ecuador?",
         "Para modelos 2024 en adelante, 5 años o 150.000 km en motor y 10 años o 150.000 km en camionetas, "
         "según la página de garantía de Changan Ecuador."),
        ("¿El Hunter REEV necesita cambio de aceite?",
         "Sí. Su motor a gasolina funciona como generador y necesita aceite, filtros y bujías, aunque trabaje "
         "menos horas que el de una pickup convencional."),
        ("¿La garantía cubre pastillas y llantas?",
         "No. Las piezas de desgaste y el mantenimiento preventivo quedan fuera de la garantía; lo que la "
         "garantía pide es que esos servicios se hagan a tiempo."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 4. Nissan
# ═════════════════════════════════════════════════════════════════════════════════════
post(4, "Mantenimiento Nissan por kilometraje: el calendario de Frontier, X-Trail e-Power y Qashqai",
     "mantenimiento-nissan-kilometraje", [50],
     "Qué se hace en cada mantenimiento Nissan por kilometraje, cuánto cuesta como referencia y qué cambia "
     "en la Frontier, la X-Trail e-Power y el Qashqai.",
     meta("Mantenimiento Nissan por kilometraje: tabla y costos",
          "Calendario de mantenimiento Nissan cada 5.000 km o 6 meses, qué incluye cada servicio y notas para "
          "Frontier, X-Trail e-Power y Qashqai. Agende en Ibarra.",
          "mantenimiento nissan"),
     ["https://ecuador.patiotuerca.com/blog/nissan-responde-cuales-son-las-consultas-mas-frecuentes-sobre-el-mantenimiento/",
      "https://www.nissan.com.ec/servicios/planes-de-mantenimiento.html"],
     [
    p("Ya explicamos en otro artículo por qué conviene llevar un Nissan a un taller autorizado. Este va un paso "
      "más allá: qué se hace exactamente a los 5.000, 10.000, 20.000 o 40.000 km, cuánto cuesta cada servicio "
      "como referencia y qué cambia según el Nissan que usted tenga."),
    p("La idea es que llegue al taller sabiendo qué le van a hacer a su vehículo y por qué. Lo atendemos en "
      "Ibarra, Cayambe y Tulcán, con repuestos originales y el escáner de la marca."),
    h2("Cada cuánto se hace el mantenimiento de un Nissan"),
    p("Nissan Ecuador recomienda revisar el vehículo <strong>cada 5.000 km o cada 6 meses</strong>, lo que "
      "ocurra primero. Sobre esa base se arma el calendario: servicios livianos que se repiten y servicios "
      "mayores a los 20.000, 40.000 y 60.000 km. Las tareas exactas dependen del modelo y del motor; tómelas "
      "como referencia y confirme con el plan de su versión."),
    table(["Kilometraje", "Qué incluye", "Costo referencial estimado"], [
        ["5.000 km", "Aceite y filtro, revisión de niveles, frenos, luces, llantas y fugas", "USD 70 - 110"],
        ["10.000 km", "Lo anterior + filtro de aire, rotación de llantas, revisión de batería", "USD 120 - 190"],
        ["20.000 km", "Lo anterior + filtro de cabina, alineación y balanceo, diagnóstico electrónico", "USD 180 - 290"],
        ["40.000 km", "Lo anterior + líquido de frenos, bujías según motor, filtro de combustible en diésel", "USD 260 - 420"],
        ["60.000 km", "Lo anterior + aceite de caja o CVT según versión, refrigerante, revisión de suspensión", "USD 320 - 550"],
    ], "Calendario referencial; las tareas exactas dependen del modelo, el motor y la tracción."),
    NOTA,
    p(f"Si quiere el contexto de por qué el taller autorizado importa en un Nissan, está en "
      f"{a(f'{S}/consejos/taller-autorizado-nissan-ecuador/', 'repuestos y servicio técnico Nissan en Ecuador')}. "
      "Aquí nos quedamos en el calendario."),
    h2("Qué se revisa en un servicio liviano y qué en uno mayor"),
    p("El servicio liviano es corto: aceite, filtro, una revisión visual de frenos, llantas y fugas, y los "
      "niveles de refrigerante, frenos y limpiaparabrisas. Bien hecho, toma poco tiempo."),
    p("El servicio mayor es otra cosa. Suma fluidos que no se cambian seguido (líquido de frenos, refrigerante, "
      "aceite de caja), bujías, alineación y el diagnóstico electrónico completo. Es el que no conviene "
      "postergar, porque es donde aparecen los desgastes que todavía se arreglan barato."),
    cta("¿Su Nissan ya llegó al próximo servicio?",
        "Díganos modelo, año y kilometraje y le confirmamos turno y costo en Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento Nissan",
        "Hola, vengo del artículo de mantenimiento Nissan por kilometraje. Quiero agendar el servicio de mi Nissan."),
    h2("X-Trail e-Power: el motor a gasolina no mueve las ruedas, pero sí se mantiene"),
    p(f"En la {a(F('nissan-x-trail-epower'), 'X-Trail e-Power')} las ruedas las mueve siempre el motor eléctrico; "
      f"el motor a gasolina funciona como generador. Por eso sigue necesitando aceite, filtros y bujías. Lo que "
      f"se suma es la revisión del sistema eléctrico con el escáner de Nissan. El funcionamiento está explicado "
      f"en {a(f'{S}/nissan/nissan-e-power-ecuador-ahorro-combustible/', 'cómo funciona el Nissan e-POWER')}."),
    p("Un efecto práctico: como buena parte del frenado lo hace el motor eléctrico, las pastillas suelen durar "
      "más que en una SUV convencional del mismo tamaño. No es motivo para saltarse su revisión."),
    h2("Frontier: la pickup que más castiga el calendario"),
    p(f"La {a(F('nissan-frontier'), 'Frontier')} es la Nissan que más trabaja en el norte: carga en el balde, "
      "caminos de tierra hacia fincas y subidas largas como la de la Panamericana hacia el Carchi. Tres cosas "
      "que conviene vigilar más de lo que pide el manual:"),
    ol(["<strong>El filtro de aire</strong>, si entra a caminos lastrados: revíselo en cada servicio liviano.",
        "<strong>Los aceites de diferencial y de la caja de transferencia</strong> en las versiones 4x4, sobre todo si cruza agua o barro.",
        "<strong>El filtro de combustible</strong> en las versiones diésel, que protege la inyección."]),
    h2("Qashqai: SUV de ciudad con calendario estándar"),
    p(f"El {a(F('nissan-qashqai'), 'Qashqai')} sigue el calendario base. Su enemigo en Ibarra no es la carretera "
      "sino el uso corto: ir y volver del trabajo con el motor que nunca llega a calentarse del todo degrada el "
      "aceite más rápido de lo que dice el odómetro. Respetar los 6 meses le ahorra problemas."),
    h2("Señales para no esperar al próximo servicio"),
    p("El calendario marca lo previsible. Hay síntomas que justifican ir al taller antes de que llegue el "
      "kilometraje:"),
    ul(["<strong>Un testigo encendido en el tablero</strong>, sobre todo el de motor o el del sistema e-POWER.",
        "<strong>Un ruido metálico al frenar</strong> o vibración en el pedal.",
        f"<strong>El volante que vibra</strong> a cierta velocidad: casi siempre es balanceo o llantas. Lo explicamos en {a(VOLANTE, 'por qué vibra el volante')}.",
        "<strong>Consumo de combustible que sube</strong> sin cambio en su forma de manejar.",
        "<strong>Una mancha bajo el vehículo</strong> donde se estaciona cada noche."]),
    p("Cualquiera de estas señales se revisa con diagnóstico electrónico en una visita corta, y casi siempre sale "
      "más barato atenderla temprano que esperar al servicio programado."),
    quote("En un Nissan, el servicio que más se posterga es el de los 40.000 km, porque coincide con la "
          "época en que el auto ya no se siente nuevo. Es justo el que detecta a tiempo frenos, fluidos y "
          "bujías antes de que se conviertan en una reparación."),
    h2("Cuándo el mantenimiento en agencia NO le conviene"),
    p(f"Si su Nissan es un modelo antiguo, ya sin garantía, y solo necesita un cambio de aceite, un taller de "
      f"confianza puede resolverlo. En la X-Trail e-Power y en cualquier Nissan con garantía vigente no conviene: "
      f"el diagnóstico del sistema eléctrico y el registro de servicios solo se hacen con la herramienta de la "
      f"marca. Si busca piezas, vea {a(f'{S}/postventa/repuestos-nissan-comercial-hidrobo-ecuador/', 'repuestos originales Nissan')}."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se hace el mantenimiento de un Nissan?",
         "Nissan Ecuador recomienda revisar el vehículo cada 5.000 km o cada 6 meses, lo que ocurra primero. Los "
         "servicios mayores llegan a los 20.000, 40.000 y 60.000 km."),
        ("¿Cuánto cuesta el mantenimiento de 10.000 km de un Nissan?",
         "Como costo referencial estimado, entre USD 120 y 190 según el modelo. El valor exacto lo confirma un "
         "asesor con el modelo, el año y el kilometraje."),
        ("¿La X-Trail e-Power necesita cambio de aceite?",
         "Sí. Su motor a gasolina funciona como generador y necesita aceite, filtros y bujías como cualquier "
         "motor de combustión."),
        ("¿Una Frontier 4x4 necesita servicios distintos?",
         "Suma el cambio de aceite de diferenciales y caja de transferencia en los servicios mayores, y en uso "
         "de campo conviene revisar el filtro de aire más seguido."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 5. Mazda
# ═════════════════════════════════════════════════════════════════════════════════════
MZ_PREPAGO = "https://www.mazda.com.ec/posventa/mantenimiento-prepagado"
post(5, "Mantenimiento Mazda por kilometraje: qué incluye cada servicio y cuánto cuesta",
     "mantenimiento-mazda-kilometraje", [53],
     "Calendario referencial de mantenimiento Mazda, qué se hace en cada servicio, costos estimados en "
     "Ecuador y cómo funciona el prepago de la marca.",
     meta("Mantenimiento Mazda por kilometraje: tabla y costos",
          "Qué incluye cada servicio Mazda de 10.000 a 60.000 km, cuánto cuesta como referencia y cómo funciona "
          "el prepago de la marca. Para CX-5, CX-30, Mazda 2 y BT-50.",
          "mantenimiento mazda"),
     [MZ_PREPAGO, "https://www.mazda.com.ec/posventa"],
     [
    p("Quien compra un Mazda suele cuidarlo: es un auto que se elige por cómo se maneja y por cómo envejece. "
      "Pero ese envejecimiento depende de algo poco glamoroso, el calendario de mantenimiento, y de no "
      "saltarse los servicios que parecen innecesarios porque el auto «anda perfecto»."),
    p("Aquí está el mantenimiento Mazda por kilometraje: qué se hace en cada visita, cuánto cuesta como "
      "referencia en Ecuador, cómo funciona el prepago de la marca y qué cambia entre una CX-5, una BT-50 "
      "y un Mazda 2. Lo atendemos en Ibarra, Cayambe y Tulcán."),
    h2("Cada cuánto se hace el mantenimiento de un Mazda"),
    p("Mazda Ecuador no publica la tabla de intervalos en su sitio; el plan exacto está en el manual de "
      "garantía de cada modelo. Como referencia, el esquema estándar es un servicio completo cada "
      "<strong>10.000 km</strong>, con una revisión liviana a los <strong>5.000 km</strong> cuando el uso es "
      "exigente, y servicios mayores a los 20.000, 40.000 y 60.000 km. Es referencial: confirme con el plan "
      "de su modelo."),
    table(["Kilometraje", "Qué incluye", "Costo referencial estimado"], [
        ["5.000 km (uso exigente)", "Revisión de niveles, frenos, llantas y fugas; aceite si el manual lo pide", "USD 60 - 100"],
        ["10.000 km", "Aceite y filtro, filtro de aire, rotación de llantas, revisión de batería y frenos", "USD 130 - 200"],
        ["20.000 km", "Lo anterior + filtro de cabina, alineación y balanceo, diagnóstico", "USD 190 - 300"],
        ["40.000 km", "Lo anterior + líquido de frenos, bujías según motor, revisión de suspensión", "USD 280 - 450"],
        ["60.000 km", "Lo anterior + aceite de caja automática según versión, refrigerante", "USD 350 - 600"],
    ], "Calendario referencial; las tareas exactas dependen del modelo, el motor y la tracción."),
    NOTA,
    h2("Qué se hace en cada servicio Mazda"),
    p("La lógica es acumulativa: cada servicio mayor incluye lo del anterior y suma tareas. En el de 10.000 km "
      "entran el aceite con su filtro, el filtro de aire del motor, la rotación de llantas y la revisión de "
      "frenos, batería y niveles. A los 20.000 km se suman el filtro de cabina, la alineación y el diagnóstico "
      "electrónico. A los 40.000 km llegan el líquido de frenos y, según el motor, las bujías."),
    p("Los motores Skyactiv trabajan con tolerancias finas y aceite de baja viscosidad. Usar el aceite que "
      "indica el manual no es un detalle de marca: es parte del rendimiento y del consumo que usted pagó."),
    cta("¿Su Mazda ya marca el próximo servicio?",
        "Escríbanos el modelo, el año y el kilometraje, y le confirmamos turno y costo en Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento Mazda",
        "Hola, vengo del artículo de mantenimiento Mazda por kilometraje. Quiero agendar el servicio de mi Mazda."),
    h2("El prepago Mazda: qué incluye"),
    p("Mazda Ecuador ofrece dos formas de pagar el mantenimiento por adelantado:"),
    ul(["<strong>Prepago Full:</strong> de 3 a 4 mantenimientos futuros con el valor congelado, hasta 20 % de descuento, 10 % en repuestos, 5 % en accesorios, tres lavadas de motor y tres enceradas. Es transferible al nuevo propietario.",
        "<strong>Prepago Next:</strong> adelanta solo el próximo mantenimiento, con 10 % de descuento y los mismos descuentos en repuestos y accesorios."]),
    p("El prepago tiene sentido si usted piensa quedarse con el auto varios años y recorre un kilometraje "
      "estable. Que sea transferible ayuda además al vender: el comprador recibe mantenimientos ya pagados."),
    h2("Notas por modelo Mazda"),
    ul([f"<strong>{a(F('mazda-cx-5'), 'CX-5')}:</strong> la SUV más vista en nuestro taller. Sigue el calendario base; con viajes frecuentes por la Panamericana, revise frenos y llantas en cada servicio.",
        f"<strong>{a(F('mazda-cx-30'), 'CX-30')} y {a(F('mazda-2'), 'Mazda 2')}:</strong> de uso más urbano. Muchos trayectos cortos piden respetar el cambio de aceite por tiempo, aunque el odómetro avance poco.",
        f"<strong>{a(F('mazda-bt-50'), 'BT-50')}:</strong> la pickup de la marca. Con carga o en caminos de tierra hacia fincas de Imbabura, el filtro de aire y los aceites de diferencial merecen revisión más seguida.",
        f"<strong>{a(F('mazda-cx-60'), 'CX-60')} y CX-90:</strong> las SUV grandes de Mazda. Más peso implica más trabajo para frenos, llantas y suspensión: no estire esas revisiones."]),
    h2("Por qué el servicio en altura importa"),
    p(f"Ibarra está a más de 2.200 metros y Tulcán sobre los 2.900. En altura el motor respira menos aire, y "
      f"los filtros y la mezcla de combustible tienen más incidencia en el rendimiento. Lo explicamos en "
      f"{a(f'{S}/estilo-de-vida-y-perfil-del-conductor/rendimiento-del-auto-en-altura-ibarra-sierra-ecuador/', 'el rendimiento del auto en altura')}. "
      f"Y si quiere conocer cómo trabajamos la postventa de marcas como Mazda, vea {a(POSTVENTA_PREMIUM, 'nuestra postventa para Toyota, Mazda y Jeep')}."),
    quote("Un Mazda bien mantenido se vende mejor. El comprador de un seminuevo pregunta por el historial "
          "antes que por los kilómetros, y un libro de servicios completo pesa en la negociación."),
    h2("Lo que cuesta saltarse un servicio"),
    p("El ahorro de postergar un mantenimiento es pequeño y la cuenta llega después. Tres ejemplos que vemos en "
      "el taller:"),
    ol(["<strong>Aceite vencido:</strong> pierde capacidad de proteger y el desgaste interno del motor se acelera. En un motor de tolerancias finas, eso no se recupera con el siguiente cambio.",
        "<strong>Líquido de frenos viejo:</strong> absorbe humedad con el tiempo y el pedal pierde firmeza en bajadas largas, como la de Ibarra hacia el valle del Chota.",
        "<strong>Filtro de aire tapado:</strong> el motor consume más y rinde menos, algo que en altura se nota todavía más."]),
    p("Además, un servicio saltado deja un hueco en el historial que el comprador de su Mazda va a notar el día "
      "que lo venda."),
    h2("Cuándo el prepago NO le conviene"),
    p("Si piensa vender el auto en menos de un año o recorre muy pocos kilómetros, pagar tres o cuatro "
      "mantenimientos por adelantado inmoviliza dinero que quizá no use a tiempo. En ese caso, pague servicio "
      "por servicio y conserve las facturas como historial."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se hace el mantenimiento de un Mazda?",
         "Como referencia, un servicio completo cada 10.000 km, con revisión liviana a los 5.000 km si el uso es "
         "exigente. El intervalo exacto de su modelo está en el manual de garantía."),
        ("¿Cuánto cuesta el mantenimiento de 10.000 km de un Mazda?",
         "Como costo referencial estimado, entre USD 130 y 200 según el modelo y el motor. Un asesor le confirma "
         "el valor exacto."),
        ("¿El prepago de Mazda se puede transferir?",
         "Sí. Según Mazda Ecuador, el Prepago Full y el Prepago Next son transferibles al nuevo propietario del vehículo."),
        ("¿Qué aceite usa un motor Skyactiv?",
         "El que indica el manual de su modelo, normalmente de baja viscosidad. Usar otro grado puede afectar el "
         "consumo y la protección del motor."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 6. Jeep y RAM
# ═════════════════════════════════════════════════════════════════════════════════════
post(6, "Mantenimiento Jeep y RAM en Ibarra: calendario, costos y lo que pide cada modelo",
     "mantenimiento-jeep-ram-ibarra", [57],
     "Calendario referencial de mantenimiento para Jeep Avenger, Compass, RAM 700 y RAM 1500, qué incluye cada "
     "servicio y cuánto cuesta como referencia en Ibarra.",
     meta("Mantenimiento Jeep y RAM en Ibarra: calendario y costos",
          "Qué incluye cada servicio de Jeep Compass, Avenger, RAM 700 y RAM 1500, cada cuánto se hace y su costo "
          "referencial. Taller en Ibarra, Cayambe y Tulcán.",
          "mantenimiento jeep ram ibarra"),
     [],
     [
    p("Jeep y RAM comparten algo más que el grupo que las fabrica: sus dueños suelen usarlas fuera del "
      "asfalto. Una Compass que sube los fines de semana a una finca, una RAM 700 que trabaja de lunes a "
      "sábado o una RAM 1500 que remolca. Ese uso es justo el que más castiga el calendario de mantenimiento."),
    p("Aquí está qué se hace en cada servicio, cuánto cuesta como referencia y qué vigilar en cada modelo del "
      "portafolio, para quien maneja en Ibarra, Cayambe, Tulcán y las vías rurales de Imbabura."),
    h2("Cada cuánto se hace el mantenimiento de un Jeep o una RAM"),
    p("Jeep y RAM no publican en Ecuador una tabla de intervalos que podamos citar: el plan de cada modelo "
      "viene en su manual de garantía y mantenimiento. Como referencia, el esquema estándar es un servicio liviano "
      "cada <strong>5.000 km</strong> y uno completo cada <strong>10.000 km</strong>, con servicios mayores a "
      "los 20.000, 40.000 y 60.000 km. Es referencial: confirme con el plan de su modelo."),
    table(["Kilometraje", "Qué incluye", "Jeep (referencial)", "RAM (referencial)"], [
        ["5.000 km", "Aceite y filtro, niveles, frenos, luces, llantas", "USD 80 - 120", "USD 70 - 150"],
        ["10.000 km", "Lo anterior + filtro de aire, rotación de llantas, batería", "USD 140 - 210", "USD 130 - 260"],
        ["20.000 km", "Lo anterior + filtro de cabina, alineación, diagnóstico", "USD 200 - 320", "USD 190 - 380"],
        ["40.000 km", "Lo anterior + líquido de frenos, bujías, aceites de diferencial", "USD 300 - 480", "USD 280 - 600"],
        ["60.000 km", "Lo anterior + aceite de caja y transferencia según versión", "USD 380 - 650", "USD 350 - 800"],
    ], "Costos referenciales estimados. En RAM el rango es amplio porque va de la RAM 700 a la RAM 1500."),
    NOTA,
    h2("Qué incluye cada servicio, en orden"),
    p("El servicio liviano es aceite, filtro y una revisión visual: frenos, llantas, luces, fugas y niveles. El "
      "de 10.000 km suma el filtro de aire del motor, la rotación de llantas y la revisión de batería. A los "
      "20.000 km llegan el filtro de cabina, la alineación y el diagnóstico electrónico completo."),
    p("Los servicios de 40.000 y 60.000 km son los que separan a un Jeep o una RAM de un auto de ciudad: en las "
      "versiones con tracción 4x4 se cambian los aceites de los diferenciales y de la caja de transferencia, "
      "piezas que en un sedán no existen."),
    cta("¿Su Jeep o su RAM ya llegó al próximo servicio?",
        "Díganos el modelo, el año y el kilometraje, y le confirmamos turno y costo en Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento Jeep o RAM",
        "Hola, vengo del artículo de mantenimiento Jeep y RAM. Quiero agendar el servicio de mi vehículo."),
    h2("Notas por modelo Jeep"),
    ul([f"<strong>{a(F('jeep-compass-2'), 'Jeep Compass')}:</strong> SUV mediana que muchos usan entre semana en la ciudad y el fin de semana en caminos de tierra. Ese uso mixto pide revisar el filtro de aire y la suspensión en cada servicio, sin esperar a los mayores.",
        f"<strong>{a(F('jeep-avenger'), 'Jeep Avenger')}:</strong> la SUV compacta de la marca, de uso más urbano. Su calendario es el estándar; respete el cambio de aceite por tiempo si recorre poco."]),
    h2("Notas por modelo RAM"),
    ul([f"<strong>{a(F('ram-700'), 'RAM 700')}:</strong> pickup compacta de trabajo. Si lleva carga a diario por Ibarra y sus parroquias, frenos y amortiguadores posteriores se desgastan antes que en un uso particular.",
        f"<strong>{a(F('new-ram-1500-big-horn'), 'RAM 1500')}:</strong> pickup grande con motor de gran cilindrada. Más aceite por cambio y frenos más grandes explican que su servicio cueste más. Si remolca, adelante la revisión de frenos, refrigeración y caja. Más sobre el modelo en {a(f'{S}/ram/ram-1500-ecuador-lujo-motor-hemi/', 'la RAM 1500 en Ecuador')}."]),
    h2("El uso que obliga a acortar los intervalos"),
    p("Los manuales de casi todas las marcas distinguen un uso normal de uno severo. En el norte del país, el "
      "uso severo no es la excepción:"),
    ol(["<strong>Caminos de polvo o lastre</strong>, como los accesos a fincas en Intag o en las afueras de Cayambe.",
        "<strong>Remolque o carga pesada</strong> de forma frecuente.",
        "<strong>Subidas largas y sostenidas</strong>, como la Panamericana entre Ibarra y Tulcán.",
        "<strong>Cruce de agua o barro</strong>, que puede contaminar los aceites de diferencial."]),
    p("Si su vehículo cumple dos o más de estas condiciones, conviene tratar el servicio liviano como "
      "obligatorio y no estirar los cambios de aceite."),
    h2("Cómo llegar preparado a la cita"),
    p("Un servicio rinde más cuando el asesor sabe qué pasa con el vehículo. Antes de la cita, anote tres cosas: "
      "el kilometraje exacto, cualquier ruido o vibración que haya notado y en qué situación aparece (en frío, "
      "en bajada, con carga). Si su versión es 4x4, cuente también si usa la tracción seguido o casi nunca: un "
      "sistema que pasa meses sin engranarse también se revisa. Lleve el manual o el libro de servicios para "
      "que el registro quede completo."),
    h2("Garantía y taller autorizado"),
    p(f"Mientras su Jeep o su RAM esté en garantía, el registro de servicios hechos a tiempo y con repuestos "
      f"adecuados es lo que la sostiene. Nuestro equipo de postventa trabaja con estas marcas; lo contamos en "
      f"{a(POSTVENTA_PREMIUM, 'la postventa para Toyota, Mazda y Jeep')}. Y si necesita una pieza puntual, "
      f"puede {a(REPUESTOS, 'cotizar repuestos originales')}."),
    quote("En una pickup de trabajo, el servicio que más se salta es el liviano, porque el vehículo no puede "
          "parar. Es una mala cuenta: un día en el taller cuesta menos que una semana parado por una avería."),
    h2("Cuándo el taller de agencia NO le conviene"),
    p("Si su Jeep o su RAM ya salió de garantía y usted solo necesita un cambio de aceite rápido, un taller "
      "de confianza puede resolverlo. Para los servicios mayores, con aceites de diferencial, transferencia y "
      "diagnóstico electrónico, conviene el taller que conoce el modelo y tiene su escáner."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se hace el mantenimiento de una Jeep Compass?",
         "Como referencia, un servicio liviano cada 5.000 km y uno completo cada 10.000 km. El intervalo exacto "
         "está en el manual de garantía de su modelo."),
        ("¿Cuánto cuesta el mantenimiento de una RAM 1500?",
         "Más que el de una pickup mediana, por la cantidad de aceite y el tamaño de los frenos. Como costo "
         "referencial estimado, un servicio de 10.000 km puede llegar a USD 260; confírmelo con un asesor."),
        ("¿Qué es el uso severo en un Jeep?",
         "Manejar en polvo, remolcar, subir pendientes largas o cruzar agua. En esas condiciones se acortan los "
         "intervalos de aceite, filtros y diferenciales."),
        ("¿Pueden atender mi Jeep en Tulcán?",
         f"Sí, atendemos en Ibarra, Cayambe y Tulcán. Los servicios del taller de Tulcán están en {a(TULCAN, 'esta página')}."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 7. Revisión técnica vehicular en Ibarra
# ═════════════════════════════════════════════════════════════════════════════════════
MOV = "https://www.movidelnor.gob.ec/"
MOV_RTV = "https://www.movidelnor.gob.ec/web/webepm/renovacion-matricula-revision/"
MOV_EXENTOS = "https://www.movidelnor.gob.ec/web/webepm/renovacion-permiso-de-circulacion/"
MOV_TARIFARIO = "https://www.movidelnor.gob.ec/web/webepm/wp-content/uploads/2026/01/2025-TARIFARIO-DE-SERVICIOS-EPM.pdf"
SISMERT = "https://www.gob.ec/gadmc-ibarra/tramites/certificado-no-adeudar-al-sismert"
post(7, "Revisión técnica vehicular en Ibarra 2026: requisitos, costos y cómo pasarla a la primera",
     "revision-tecnica-vehicular-ibarra", [44],
     "Quién hace la revisión técnica vehicular en Ibarra, qué documentos y pagos pide Movidelnor, cuánto "
     "cuesta y qué revisar en el auto antes para no volver.",
     meta("Revisión técnica vehicular en Ibarra 2026: requisitos",
          "Qué pide Movidelnor para la revisión técnica en Ibarra, cuánto cuesta cada intento y qué revisar en su "
          "auto antes de ir para aprobar a la primera.",
          "revisión técnica vehicular ibarra"),
     [MOV, MOV_RTV, MOV_EXENTOS, MOV_TARIFARIO, SISMERT],
     [
    p("La revisión técnica vehicular es de esos trámites que se dejan para el último mes y luego se complican: "
      "una luz quemada, una multa pendiente o un papel que faltaba, y toca volver otro día. En Ibarra, además, "
      "hay pagos propios del cantón que en otras ciudades no existen."),
    p("Esta guía junta lo que pide la entidad que hace la revisión en Ibarra, cuánto cuesta según su tarifario "
      "publicado y, sobre todo, qué revisar en el auto antes de ir para aprobar a la primera. Los datos salen de "
      "Movidelnor y del Municipio de Ibarra; donde no hay un dato oficial claro, lo decimos."),
    h2("Quién hace la revisión técnica en Ibarra y qué necesita"),
    p("En Ibarra la revisión técnica vehicular y la matriculación las hace <strong>Movidelnor</strong>, la "
      "empresa pública de movilidad de la mancomunidad del norte, bajo las normas de la Agencia Nacional de "
      "Tránsito. Su oficina matriz está en la calle Vicente Rocafuerte 1-43 y Mariano Peñaherrera. Según su "
      "página, los requisitos para renovar la matrícula con revisión son:"),
    ul(["Matrícula original o Certificado Único Vehicular (CUV).",
        "Si perdió la matrícula, la denuncia por pérdida o robo emitida en la página del Consejo de la Judicatura.",
        "Los comprobantes de todos los pagos: SRI, SISMERT, Movidelnor y las multas de tránsito de la ANT y de la EPM.",
        "Cédula y certificado de votación del propietario, obligatorios si la matrícula está caducada."]),
    p("En Ibarra se suma un pago propio del cantón: el <strong>certificado de no adeudar al SISMERT</strong>, "
      "el sistema de estacionamiento rotativo del Municipio. Cuesta USD 2 por vehículo, más las multas de "
      "SISMERT si las tiene, y se genera en línea desde la página de Movidelnor con la placa y el cantón."),
    h2("El trámite paso a paso"),
    ol(["Genere la orden de pago de renovación y revisión técnica en movidelnor.gob.ec.",
        "Elija el cantón donde hará el trámite y digite el número de placa.",
        "Pague la orden en el Banco del Pacífico o en los puntos autorizados, junto con el SRI y el SISMERT.",
        "Saque el turno con el generador de turnos de la misma página.",
        "Lleve el vehículo y los documentos el día del turno."]),
    p(f"Si además tiene que matricular por primera vez o cambiar de dueño, los pasos de la matrícula los "
      f"explicamos aparte en {a(MATRICULA, 'la matriculación vehicular en Imbabura 2026')}. Este artículo se "
      "concentra en la revisión."),
    h2("Cuánto cuesta la revisión técnica en Ibarra"),
    p("El tarifario de servicios publicado por Movidelnor fija estos valores para vehículos livianos (con IVA):"),
    table(["Concepto", "Valor"], [
        ["Revisión técnica, vehículo liviano, primera vez", "USD 31,05"],
        ["Segunda revisión (si no aprobó la primera)", "Sin costo"],
        ["Tercera revisión", "USD 15,53"],
        ["Cuarta revisión", "USD 31,05"],
        ["Recargo por calendarización (fuera del mes de su placa)", "USD 25,00"],
        ["Recargo por volver fuera de los 30 días, para segunda, tercera o cuarta revisión", "USD 25,00"],
        ["Sticker de revisión técnica", "USD 6,43"],
    ], "Fuente: tarifario de servicios de Movidelnor. Confirme el valor vigente en la orden de pago, que lo calcula con su placa."),
    p("La lectura práctica de la tabla: la segunda revisión es gratis, pero solo si vuelve dentro de los 30 "
      "días. Si deja pasar ese plazo o no aprueba la segunda, cada intento le cuesta más."),
    cta("¿Quiere pasar la revisión técnica a la primera?",
        "Le hacemos una revisión previa en el taller: luces, frenos, llantas, suspensión y emisiones, en Ibarra, Cayambe o Tulcán.",
        "Agendar revisión previa",
        "Hola, vengo del artículo de revisión técnica vehicular en Ibarra. Quiero una revisión previa de mi vehículo."),
    h2("¿Su vehículo debe pasar la revisión o solo renovar el permiso?"),
    p("Movidelnor tiene un trámite aparte, la renovación del permiso de circulación, para los vehículos exentos "
      "de revisión técnica. Su página indica que esos vehículos exentos son livianos, de menos de 3,5 toneladas "
      "y de servicio particular; no necesitan turno y el trámite es presencial, 24 horas después de completar "
      "los pagos. Como las condiciones de la exención las fija la ANT y pueden cambiar, confirme con Movidelnor "
      "cuál de los dos trámites le corresponde antes de sacar turno."),
    h2("Qué revisar en el auto antes de ir"),
    p("La línea de revisión, según la norma técnica ecuatoriana NTE INEN 2349, mide luces, emisiones, frenos, "
      "suspensión, alineación y el estado de llantas y carrocería. Estas son las causas de rechazo que más "
      "vemos y que se arreglan antes en pocos minutos:"),
    ul(["<strong>Luces:</strong> un foco quemado de placa, freno o direccional. Pruebe todas con alguien que mire desde afuera.",
        f"<strong>Frenos:</strong> un desequilibrio entre las ruedas de un mismo eje. Si el auto se jala al frenar, revíselo; lo explicamos en {a(FRENOS, 'mantenimiento de frenos en Ibarra')}.",
        "<strong>Llantas:</strong> labrado al límite o llantas distintas en el mismo eje.",
        "<strong>Emisiones:</strong> un filtro de aire tapado o un sensor dañado pueden hacer fallar la medición de gases. Un escáner previo lo detecta.",
        "<strong>Parabrisas y espejos:</strong> trizaduras grandes en el campo de visión o un espejo roto.",
        "<strong>Testigos del tablero:</strong> un testigo de motor encendido es aviso de que algo se va a medir mal."]),
    p(f"Un {a(DIAGNOSTICO, 'diagnóstico computarizado')} días antes de la cita suele ser lo que separa aprobar "
      "a la primera de tener que volver."),
    quote("La mayoría de autos que no pasan la revisión técnica no tienen un problema grave: tienen un foco "
          "quemado o una llanta gastada que nadie miró antes. Diez minutos de revisión previa ahorran el "
          "segundo viaje y, a veces, un recargo."),
    h2("Cuándo la revisión previa en el taller NO le hace falta"),
    p("Si su vehículo tuvo su mantenimiento hace poco, no tiene testigos encendidos, las luces funcionan y "
      "las llantas están bien, puede ir directo a la revisión. La revisión previa tiene sentido en autos con "
      "varios años, con un mantenimiento atrasado o que no aprobaron el año anterior."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Quién hace la revisión técnica vehicular en Ibarra?",
         "Movidelnor, la empresa pública de movilidad de la mancomunidad del norte, bajo las normas de la ANT. "
         "La orden de pago y el turno se generan en movidelnor.gob.ec."),
        ("¿Cuánto cuesta la revisión técnica en Ibarra?",
         "Según el tarifario de Movidelnor, USD 31,05 la primera revisión de un vehículo liviano. La segunda es "
         "gratis si vuelve dentro de los 30 días."),
        ("¿Qué es el certificado del SISMERT?",
         "Es el certificado de no adeudar al sistema de estacionamiento rotativo del Municipio de Ibarra, requisito "
         "previo a la matriculación en el cantón. Cuesta USD 2 por vehículo más las multas pendientes."),
        ("¿Qué pasa si no aprobé la revisión?",
         "Debe corregir los defectos y volver. La segunda revisión no tiene costo dentro de los 30 días; fuera de "
         "ese plazo se cobra un recargo de USD 25."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 8. Alineación y balanceo
# ═════════════════════════════════════════════════════════════════════════════════════
post(8, "Alineación y balanceo: cada cuánto hacerlos, cuánto cuestan y cómo saber que toca",
     "alineacion-balanceo-cada-cuanto-costo", [46],
     "La diferencia entre alineación y balanceo, cada cuántos kilómetros se hacen, cuánto cuestan como "
     "referencia en Ecuador y las señales de que su auto los necesita ya.",
     meta("Alineación y balanceo: cada cuánto y cuánto cuesta",
          "Cada cuántos kilómetros alinear y balancear, la diferencia entre los dos, el costo referencial en "
          "Ecuador y las señales de que su auto lo necesita ya.",
          "alineación y balanceo"),
     [DF_PALADIN, "https://www.chery.com.ec/posventa"],
     [
    p("Alineación y balanceo se piden juntos en casi todos los talleres, como si fueran lo mismo. No lo son: "
      "uno corrige los ángulos de las ruedas y el otro el peso de cada llanta. Confundirlos hace que a veces "
      "se pague uno cuando el problema era el otro."),
    p("Aquí está qué hace cada servicio, cada cuánto conviene hacerlos, cuánto cuestan como referencia en "
      "Ecuador y cómo leer las señales del auto. Con un detalle local: en las calles empedradas y los "
      "rompevelocidades de Ibarra y Otavalo, la alineación se pierde más rápido de lo que dice cualquier manual."),
    h2("Cada cuánto se hacen la alineación y el balanceo"),
    p("<strong>Como referencia, cada 10.000 km</strong>, y además cada vez que cambie llantas, después de un "
      "golpe fuerte contra un bache o un bordillo, y cuando cambie piezas de suspensión o dirección. Varias "
      "marcas lo incluyen en su mantenimiento: la tabla oficial de DongFeng Ecuador para la Paladin trae "
      "alineación, balanceo y rotación en cada servicio de 10.000 km, y el plan Chery Care de Chery Ecuador "
      "también los incluye."),
    table(["Servicio", "Qué corrige", "Cada cuánto (referencial)", "Costo referencial estimado"], [
        ["Alineación", "Los ángulos de las ruedas respecto al auto y al piso", "10.000 km o tras un golpe", "USD 20 - 40 auto · USD 30 - 55 SUV o pickup"],
        ["Balanceo", "El reparto del peso de cada llanta con su aro", "10.000 km o al montar llantas", "USD 3 - 7 por llanta"],
        ["Rotación", "El desgaste desigual entre llantas delanteras y traseras", "Cada 10.000 km", "Suele ir incluida con el balanceo"],
    ], "Rangos referenciales del mercado ecuatoriano; varían según el vehículo y el equipo."),
    NOTA,
    h2("Qué es la alineación"),
    p("Alinear es ajustar los ángulos con los que cada rueda toca el piso: la convergencia (si las ruedas "
      "apuntan hacia adentro o hacia afuera), la caída (si se inclinan) y el avance (el ángulo del eje de "
      "dirección). Cuando se salen de la medida de fábrica, el auto tira hacia un lado, el volante queda "
      "torcido y las llantas se gastan por un solo borde."),
    p("Lo que desalinea un auto en el norte del país es concreto: un hueco en la Panamericana, un "
      "rompevelocidades tomado rápido, las calles adoquinadas o empedradas y los caminos de tierra de las "
      "parroquias rurales. Cada golpe mueve un poco las piezas."),
    h2("Qué es el balanceo"),
    p("Balancear es repartir el peso de la llanta y el aro para que gire parejo. Ninguna llanta sale perfecta "
      "de fábrica, así que se colocan pequeños contrapesos en el aro. Cuando uno se cae o la llanta se gasta de "
      "forma irregular, aparece la vibración."),
    p(f"La señal típica de un balanceo perdido es el volante que vibra a cierta velocidad, por ejemplo entre "
      f"80 y 100 km/h, y deja de vibrar al pasar ese rango. Lo detallamos en {a(VOLANTE, 'por qué vibra el volante según la velocidad')}."),
    cta("¿Su auto tira hacia un lado o el volante vibra?",
        "Lo revisamos en el taller y le decimos si es alineación, balanceo u otra cosa, en Ibarra, Cayambe o Tulcán.",
        "Agendar alineación y balanceo",
        "Hola, vengo del artículo de alineación y balanceo. Quiero agendar una revisión para mi vehículo."),
    h2("Cinco señales de que toca hoy, no en el próximo servicio"),
    ol(["<strong>El auto se va hacia un lado</strong> en una recta plana, con el volante suelto.",
        "<strong>El volante está torcido</strong> cuando el auto va derecho.",
        "<strong>El volante vibra</strong> en un rango de velocidad y luego se calma.",
        f"<strong>Una llanta se gasta por un borde</strong> más que por el centro. Cómo leer ese desgaste está en {a(LLANTAS, 'el desgaste de las llantas')}.",
        "<strong>Las llantas chillan en curvas</strong> suaves, sin ir rápido."]),
    p("Si la señal es tirar hacia un lado, piense en alineación. Si es vibración, en balanceo. Si son las dos, "
      "o si el problema vuelve a las pocas semanas, puede haber una pieza de suspensión o dirección gastada, "
      "y ahí alinear sin cambiarla es tirar el dinero."),
    h2("Lo que cuesta no hacerlo"),
    p("Una alineación cuesta una fracción de una llanta. Una llanta gastada por un borde a los 15.000 km, "
      "cuando podía durar 40.000, se lleva ese ahorro varias veces. Y un auto desalineado consume un poco más "
      "de combustible, porque las ruedas arrastran en vez de rodar."),
    p("Hay además un costo de seguridad: con lluvia, en las bajadas de la sierra, un auto que tira hacia un "
      "lado frena peor y exige corregir el volante justo cuando menos conviene."),
    h2("Qué pedir en el taller para no pagar de más"),
    ul(["Que le entreguen la medición <strong>antes y después</strong> de la alineación: es la única prueba de que se hizo.",
        "Que revisen terminales, rótulas y bujes antes de alinear. Con una pieza floja, la alineación no dura.",
        "Que roten las llantas al balancear, si el calendario lo pide.",
        "Que revisen la presión de las cuatro llantas y la de emergencia al terminar."]),
    quote("Muchos clientes llegan pidiendo balanceo porque el volante vibra, y resulta que la vibración era "
          "una llanta deformada por un bache. Por eso preferimos mirar el auto antes de cobrar el servicio "
          "que el cliente cree que necesita."),
    h2("Cuándo la alineación NO le resuelve el problema"),
    p("Si el auto sigue tirando después de alinear, el problema puede ser una llanta con defecto, una presión "
      "desigual o un freno que se queda pegado. Y si la alineación se pierde a las pocas semanas, la causa es "
      "una pieza de suspensión gastada. En esos casos, volver a alinear sin revisar lo demás no sirve."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se hace la alineación y el balanceo?",
         "Como referencia, cada 10.000 km, al cambiar llantas y después de un golpe fuerte. En calles empedradas "
         "o caminos de tierra conviene revisarlo antes."),
        ("¿Cuánto cuesta la alineación y el balanceo en Ecuador?",
         "Como costo referencial estimado, la alineación va de USD 20 a 55 según el vehículo y el balanceo de USD 3 "
         "a 7 por llanta. Un asesor le confirma el valor exacto."),
        ("¿Qué pasa si no alineo el auto?",
         "Las llantas se gastan por un borde y duran mucho menos, el auto tira hacia un lado y consume un poco más "
         "de combustible."),
        ("¿La vibración del volante es alineación o balanceo?",
         "Casi siempre es balanceo o una llanta deformada. La alineación se nota más en que el auto se va hacia un "
         "lado o el volante queda torcido."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 9. Amortiguadores
# ═════════════════════════════════════════════════════════════════════════════════════
post(9, "Amortiguadores: cuándo cambiarlos y cómo se nota el desgaste en la sierra",
     "amortiguadores-cuando-cambiarlos", [46],
     "Las señales de amortiguadores gastados, cada cuánto se revisan, cuánto cuesta cambiarlos como "
     "referencia en Ecuador y por qué en la sierra se desgastan antes.",
     meta("Amortiguadores: cuándo cambiarlos y cuánto cuestan",
          "Las señales de un amortiguador gastado, cada cuántos kilómetros revisarlos y el costo referencial de "
          "cambiarlos en Ecuador. Con lo que cambia en la sierra.",
          "cuándo cambiar amortiguadores"),
     [],
     [
    p("El amortiguador es la pieza que menos se nota cuando funciona y la que más se extraña cuando falla. Se "
      "gasta de a poco, durante miles de kilómetros, y el conductor se acostumbra: el rebote extra, el auto que "
      "se inclina en las curvas, la frenada un poco más larga. Hasta que alguien maneja el mismo modelo con "
      "amortiguadores nuevos y nota la diferencia."),
    p("Aquí está cómo saber si los suyos están gastados, cada cuánto conviene revisarlos, cuánto cuesta "
      "cambiarlos como referencia y por qué en la sierra norte (Ibarra, Otavalo, Cayambe, Tulcán) se gastan "
      "antes que en una ciudad plana."),
    h2("Cuándo hay que cambiar los amortiguadores"),
    p("<strong>Como referencia, se revisan desde los 40.000 km y se cambian, en uso normal, entre los 60.000 y "
      "los 100.000 km.</strong> No hay un kilometraje fijo: lo que decide es el estado. En caminos de tierra, "
      "con carga frecuente o con muchos rompevelocidades, pueden pedir cambio bastante antes. La regla segura "
      "es revisarlos en cada servicio mayor y cambiarlos cuando la prueba lo indique, siempre de a pares por eje."),
    table(["Uso del vehículo", "Revisión", "Cambio habitual (referencial)"], [
        ["Ciudad y carretera asfaltada", "Desde 40.000 km, en cada servicio mayor", "80.000 - 100.000 km"],
        ["Uso mixto con empedrado y rompevelocidades", "Desde 30.000 km", "60.000 - 80.000 km"],
        ["Caminos de tierra, carga o remolque", "En cada servicio", "40.000 - 60.000 km"],
    ], "Rangos referenciales; el estado real se confirma con la revisión en el taller."),
    h2("Seis señales de amortiguadores gastados"),
    ol(["<strong>El auto rebota</strong> más de una vez después de pasar un rompevelocidades o un bache.",
        "<strong>La trompa se hunde al frenar</strong> y la cola se agacha al acelerar.",
        "<strong>El auto se inclina mucho en las curvas</strong>, como si flotara.",
        "<strong>Hay aceite en el cuerpo del amortiguador</strong>: es una fuga, y un amortiguador que pierde aceite ya no amortigua.",
        "<strong>Las llantas se gastan en parches</strong>, con zonas lisas alternadas.",
        "<strong>Ruidos secos</strong> al pasar por empedrado, que pueden ser el amortiguador o sus bases."]),
    p("Una prueba casera: empuje con fuerza una esquina del auto hacia abajo y suéltela. Si sube y se queda, "
      "está bien; si rebota dos o tres veces, merece revisión en el taller."),
    h2("Por qué en la sierra se gastan antes"),
    p("La geografía del norte trabaja contra los amortiguadores. Las calles empedradas y adoquinadas de los "
      "centros de Ibarra y Otavalo, los rompevelocidades en las vías de acceso a las parroquias y los caminos "
      "de tierra hacia las comunidades y fincas los hacen trabajar sin descanso."),
    p("A eso se suman las bajadas largas, como la de Ibarra hacia el valle del Chota o la de la Panamericana "
      "hacia Tulcán. En una bajada con curvas, el amortiguador es el que mantiene la llanta pegada al piso "
      "mientras usted frena. Si está gastado, la llanta pierde contacto en las irregularidades y la frenada se "
      f"alarga. Lo repasamos en {a(CHECKLIST_SIERRA, 'el checklist antes de un viaje por la sierra')}."),
    cta("¿Su auto rebota o se inclina más que antes?",
        "Revisamos amortiguadores, bases y bujes y le decimos si toca cambiar o todavía no, en Ibarra, Cayambe o Tulcán.",
        "Agendar revisión de suspensión",
        "Hola, vengo del artículo de amortiguadores. Quiero revisar la suspensión de mi vehículo."),
    h2("Cuánto cuesta cambiar los amortiguadores"),
    p("El valor depende del vehículo, de si son originales o alternos y de si se cambian también las bases y "
      "los topes, que suelen gastarse a la par."),
    ul(["<strong>Auto o SUV compacta:</strong> USD 150 - 350 el par instalado.",
        "<strong>SUV mediana:</strong> USD 220 - 450 el par instalado.",
        "<strong>Pickup:</strong> USD 200 - 500 el par instalado, según si son delanteros o traseros y la versión."]),
    NOTA,
    p("Después del cambio conviene alinear, porque al desmontar la suspensión los ángulos de las ruedas se "
      "mueven un poco. Es un costo pequeño que protege las llantas nuevas o las que ya tiene."),
    h2("Amortiguador, resorte y bujes: qué hace cada uno"),
    p("En el taller se habla de «la suspensión» como si fuera una sola pieza, y son varias. El resorte sostiene "
      "el peso del auto y define su altura. El amortiguador frena el movimiento del resorte para que el auto no "
      "siga rebotando. Los bujes y las bases son las gomas que unen todo a la carrocería y absorben las "
      "vibraciones pequeñas."),
    p("La diferencia importa al momento de pagar: un auto que suena en el empedrado puede necesitar solo un "
      "buje, y uno que rebota necesita amortiguadores. Un diagnóstico bien hecho separa una cosa de la otra "
      "antes de cambiar piezas."),
    h2("Por qué se cambian de a pares"),
    p("Si se cambia uno solo, el lado nuevo y el lado viejo responden distinto: el auto se inclina más hacia "
      "un lado al frenar o en una curva. Por eso se cambian de a pares por eje, los dos delanteros o los dos "
      "traseros. Si los cuatro están gastados, se cambian los cuatro."),
    h2("Lo que arrastra un amortiguador gastado"),
    p(f"Un amortiguador que no trabaja no falla solo. Gasta las llantas en parches, hace trabajar de más a los "
      f"bujes y rótulas, alarga la frenada y desgasta antes las pastillas. Si ya nota que la frenada no es la de "
      f"antes, revise también {a(FRENOS, 'el estado de los frenos')}. Y en zonas rurales, donde el uso es más duro, "
      f"vea {a(RURALES, 'el mantenimiento para autos en zonas rurales')}."),
    quote("El cliente casi nunca viene por los amortiguadores: viene porque se le gastó una llanta rara o "
          "porque el auto se siente flojo en la bajada. Cuando cambiamos los amortiguadores, lo primero que "
          "dice es que no sabía cuánto había empeorado."),
    h2("Cuándo cambiar amortiguadores NO le conviene todavía"),
    p("Si los suyos pasan la prueba del taller, no tienen fugas y el auto no rebota, cambiarlos solo por el "
      "kilometraje es gastar antes de tiempo. Tampoco conviene si el ruido viene de otra pieza: un buje o una "
      "base gastada se cambia sola y cuesta mucho menos."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuántos kilómetros se cambian los amortiguadores?",
         "Como referencia, entre 60.000 y 100.000 km en uso normal, y antes en caminos de tierra o con carga. Lo "
         "que decide es el estado, que se revisa en cada servicio mayor."),
        ("¿Cuánto cuesta cambiar los amortiguadores?",
         "Como costo referencial estimado, entre USD 150 y 500 el par instalado según el vehículo y el tipo de "
         "repuesto. Un asesor le confirma el valor de su modelo."),
        ("¿Se puede cambiar un solo amortiguador?",
         "No es recomendable. Se cambian de a pares por eje para que los dos lados respondan igual al frenar y en "
         "las curvas."),
        ("¿Un amortiguador gastado afecta los frenos?",
         "Sí. Con la llanta rebotando, pierde contacto con el piso y la frenada se alarga, sobre todo en bajadas "
         "con irregularidades."),
    ]),
])

# ═════════════════════════════════════════════════════════════════════════════════════
# 10. Aire acondicionado
# ═════════════════════════════════════════════════════════════════════════════════════
post(10, "Mantenimiento del aire acondicionado del auto: cada cuánto, qué incluye y fallas comunes",
     "mantenimiento-aire-acondicionado-auto", [62],
     "Qué incluye el mantenimiento del aire acondicionado del auto, cada cuánto hacerlo, cuánto cuesta como "
     "referencia y las fallas más comunes que se evitan.",
     meta("Aire acondicionado del auto: mantenimiento y fallas",
          "Cada cuánto dar mantenimiento al aire acondicionado del auto, qué incluye, cuánto cuesta como "
          "referencia y las fallas que se evitan. También en la sierra.",
          "mantenimiento aire acondicionado auto"),
     [DF_PALADIN, DF_MAGE, "https://www.chery.com.ec/posventa", CH_GARANTIA],
     [
    p("En Ibarra el aire acondicionado parece un lujo de la costa: el clima es templado y en Tulcán hace frío "
      "casi todo el año. Pero el sistema trabaja más de lo que parece. Es el que seca el aire para desempañar "
      "el parabrisas en una mañana de lluvia o de neblina en la Panamericana, y ahí sí se extraña."),
    p(f"Si su aire ya no enfría, empiece por {a(AC_NO_ENFRIA, 'las causas de un aire que no enfría')}. Este "
      "artículo va antes de la falla: qué incluye el mantenimiento, cada cuánto hacerlo, cuánto cuesta y "
      "qué fallas se evitan con él."),
    h2("Cada cuánto se da mantenimiento al aire acondicionado"),
    p("<strong>Como referencia, una revisión cada 20.000 km o una vez al año, y el filtro de cabina cada "
      "10.000 a 20.000 km.</strong> Las marcas lo incluyen en sus planes: la tabla oficial de DongFeng Ecuador "
      "para la Paladin pone el mantenimiento del aire acondicionado en los servicios de cada 20.000 km, y la de "
      "la Mage EV lo revisa en cada servicio de 10.000 km. Chery Ecuador también lo incluye en su plan Chery Care."),
    table(["Servicio", "Cada cuánto (referencial)", "Costo referencial estimado"], [
        ["Cambio de filtro de cabina", "10.000 - 20.000 km", "USD 15 - 45"],
        ["Limpieza y desinfección del sistema (ductos y evaporador)", "Una vez al año", "USD 30 - 60"],
        ["Revisión de presiones y fugas", "Cada 20.000 km o al notar menos frío", "USD 20 - 40"],
        ["Recarga de gas refrigerante", "Solo si hay pérdida, tras reparar la fuga", "USD 50 - 120"],
        ["Cambio de compresor", "Por falla", "USD 400 - 1.200"],
    ], "Rangos referenciales del mercado ecuatoriano; dependen del vehículo y del tipo de refrigerante."),
    NOTA,
    h2("Qué incluye un mantenimiento de aire acondicionado"),
    ul(["<strong>Filtro de cabina:</strong> retiene polvo y polen antes de que entren al habitáculo. Uno tapado reduce el caudal de aire y hace trabajar más al sistema.",
        "<strong>Limpieza del evaporador y los ductos:</strong> ahí se acumula humedad y aparecen hongos y bacterias, que son los que dan el olor a humedad.",
        "<strong>Revisión de presiones:</strong> con manómetros se comprueba si el gas está en el nivel correcto.",
        "<strong>Prueba de fugas:</strong> si falta gas, es porque se escapó por algún lado. Recargar sin encontrar la fuga es pagar dos veces.",
        "<strong>Revisión del compresor, la banda y el condensador:</strong> el condensador va al frente del auto y recibe piedras e insectos de la carretera."]),
    cta("¿Su aire huele a humedad o enfría menos que antes?",
        "Le revisamos filtro, presiones y fugas en Ibarra, Cayambe o Tulcán, y le decimos si hace falta recarga o no.",
        "Agendar revisión del aire",
        "Hola, vengo del artículo de mantenimiento del aire acondicionado. Quiero revisar el aire de mi vehículo."),
    h2("Las fallas más comunes y cómo se evitan"),
    ol(["<strong>Olor a humedad al encender:</strong> hongos en el evaporador. Se evita con limpieza anual y con un truco: apague el aire un par de minutos antes de llegar, con el ventilador encendido, para que se seque.",
        "<strong>Enfría poco:</strong> casi siempre falta gas por una fuga pequeña, o el filtro de cabina está tapado.",
        "<strong>Ruido al encender el aire:</strong> puede ser el embrague del compresor o la banda. Atenderlo temprano evita cambiar el compresor completo.",
        "<strong>Agua dentro del auto, a los pies del copiloto:</strong> el desagüe del evaporador está tapado.",
        "<strong>El parabrisas tarda en desempañar:</strong> el sistema no está secando el aire como debería."]),
    h2("Lo que puede revisar usted mismo"),
    ul(["<strong>El caudal de aire:</strong> si con el ventilador al máximo sale poco aire, el filtro de cabina probablemente está tapado.",
        "<strong>El olor en los primeros minutos:</strong> un olor a humedad o a guardado es la primera señal de que toca limpieza.",
        "<strong>El frente del auto:</strong> mire el condensador detrás de la parrilla; si está lleno de insectos o con aletas aplastadas, enfría peor.",
        "<strong>El goteo bajo el auto:</strong> unas gotas de agua bajo el motor después de usar el aire son normales; aceite o líquido de color, no."]),
    p("Si nota algo de esto, menciónelo al agendar: ahorra tiempo de diagnóstico y el técnico va directo a la causa."),
    h2("Por qué usarlo aunque haga frío"),
    p("El aceite que lubrica el compresor circula junto con el gas. Si el aire pasa meses sin encenderse, los "
      "sellos se resecan y aparecen fugas. Por eso conviene encenderlo unos minutos cada semana, aunque sea en "
      "pleno invierno en Tulcán o Cayambe."),
    p("Además, es su mejor aliado contra el empañamiento. En una mañana fría con lluvia, el aire acondicionado "
      "seca el aire del habitáculo y despeja el parabrisas mucho más rápido que solo la calefacción."),
    h2("En híbridos y eléctricos, el aire es otra cosa"),
    p(f"En muchos híbridos y eléctricos el compresor del aire es eléctrico y se alimenta de la batería de alto "
      f"voltaje, no de una banda del motor. Su mantenimiento lo hace un técnico capacitado en esos sistemas, "
      f"con el aceite específico que pide el fabricante. Lo repasamos en {a(HIBRIDO_MANT, 'el mantenimiento de vehículos híbridos')}. "
      "En los Changan, la garantía de la carga del aire acondicionado es de 1 año o 20.000 km, según la marca."),
    quote("El aire acondicionado que más caro sale es el que se recarga cada año sin buscar la fuga. El gas "
          "se vuelve a ir, el compresor trabaja con poco aceite y un día deja de funcionar. Encontrar la fuga "
          "a tiempo cuesta mucho menos."),
    h2("Cuándo una recarga de gas NO le conviene"),
    p("Si el aire enfría bien y no hay olor, no necesita recarga: el sistema es cerrado y el gas no se gasta "
      "con el uso. Recargar sin que falte gas no mejora nada y puede sobrecargar el compresor. Y si falta gas, "
      "primero hay que encontrar y reparar la fuga."),
    h2("Preguntas frecuentes"),
    faq([
        ("¿Cada cuánto se da mantenimiento al aire acondicionado del auto?",
         "Como referencia, una revisión una vez al año o cada 20.000 km, y el filtro de cabina cada 10.000 a "
         "20.000 km. El plan de su marca puede pedirlo más seguido."),
        ("¿Cuánto cuesta el mantenimiento del aire acondicionado?",
         "Como costo referencial estimado, una limpieza con cambio de filtro va de USD 45 a 100. La recarga de "
         "gas, si hace falta, se cobra aparte."),
        ("¿Por qué el aire del auto huele a humedad?",
         "Por hongos y bacterias en el evaporador. Se corrige con una limpieza del sistema y se previene "
         "secándolo antes de apagar el auto."),
        ("¿Hay que usar el aire acondicionado en invierno?",
         "Sí, unos minutos cada semana. Mantiene lubricados los sellos del compresor y ayuda a desempañar el "
         "parabrisas con lluvia o neblina."),
    ]),
])
