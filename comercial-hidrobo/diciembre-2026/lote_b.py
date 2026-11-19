#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote B de la tanda de diciembre 2026 de Comercial Hidrobo: temas 11-16 y 34-36 del PLAN.

Taller (11-14): cta_temprano(reserva=True) + FORM_CITA, costos como referencia estimada.
Modelos y compra (15, 16, 34-36): precios SOLO de PRECIOS; datos técnicos de la web oficial
de cada marca en Ecuador o de la ficha del modelo en comercialhidrobo.com (citadas en fuentes).

Uso:  python3 lote_b.py && python3 publish_batch.py --validate
"""
from comun import *

def L(ruta):
    return SITE + ruta

def precio(modelo):
    return "$" + PRECIOS[modelo]

# rutas frecuentes (todas verificadas en enlaces-verificados.json)
P_DIAG = L("/postventa/diagnostico-computarizado-automotriz-ibarra/")
P_TABLERO = L("/consejos/luces-del-tablero-significado-cuales-obligan-a-parar/")
P_TIRONEA = L("/consejos/auto-tironea-pierde-fuerza-que-revisar/")
P_30K = L("/cuidado-del-vehiculo-y-mantenimiento/mantenimiento-30000-km-auto/")
P_RURAL = L("/cuidado-del-vehiculo-y-mantenimiento/mantenimiento-auto-zonas-rurales/")
P_TULCAN = L("/cuidado-del-vehiculo-y-mantenimiento/taller-automotriz-tulcan-comercial-hidrobo/")
P_RECALIENTA = L("/consejos/mi-carro-se-recalienta-que-hacer-y-causas/")
P_VIAJE = L("/consejos/checklist-antes-de-viaje-largo-sierra/")
P_RUIDOS = L("/consejos/ruidos-del-auto-al-girar-frenar-baches/")
P_AUTO_CVT = L("/comparativas-y-decisiones-inteligentes/autos-automaticos-vs-cvt-ecuador/")
P_NO_MANT = L("/cuidado-del-vehiculo-y-mantenimiento/consecuencias-no-hacer-mantenimiento-auto/")
P_GARANTIA = L("/consejos/que-cubre-y-que-no-cubre-la-garantia-de-fabrica/")
P_ALTURA = L("/estilo-de-vida-y-perfil-del-conductor/rendimiento-del-auto-en-altura-ibarra-sierra-ecuador/")
P_CAM_RURAL = L("/consejos/camioneta-mejor-para-zonas-rurales-en-ecuador/")
P_ACC_CAM = L("/consejos/accesorios-originales-camionetas-ecuador/")
P_HILUX = L("/toyota/toyota-hilux-ecuador-pickup-confiable/")
P_COMERCIAL = L("/comparativas-y-decisiones-inteligentes/mejor-camioneta-uso-comercial-ecuador/")
P_TOYOTA_KM = L("/cuidado-del-vehiculo-y-mantenimiento/tabla-mantenimiento-toyota-kilometraje/")
P_RENAULT_M = L("/renault/mantenimiento-renault-comercial-hidrobo/")


# ════════════════════════════════════════════════════════════════════════════════════
# 11. Embrague
# ════════════════════════════════════════════════════════════════════════════════════
def embrague():
    c = [
        p("El embrague casi nunca se daña de golpe. Avisa durante semanas: el pedal se siente distinto, el "
          "motor sube de revoluciones en la subida y el auto no avanza lo que debería, aparece un olor a "
          "quemado después de un parqueo en pendiente. Quien maneja en Ibarra, con calles empinadas, "
          "adoquín y semáforos en cuesta, lo gasta más rápido que quien maneja en plano."),
        p("Esta guía le ayuda a reconocer esas señales a tiempo, a separar lo que es desgaste normal de lo "
          "que es una falla de otra pieza y a tener una idea del costo antes de llegar al taller. Si su "
          "auto ya muestra dos o más síntomas de la lista, no espere a que el pedal se vaya al piso en "
          "plena Panamericana."),

        h2("Cómo saber si el embrague está gastado: la respuesta corta"),
        p("Hay una prueba sencilla que puede hacer usted mismo. Con el auto encendido y detenido en un lugar "
          "plano, ponga el freno de mano, meta tercera marcha y suelte el pedal despacio mientras acelera un "
          "poco. Si el motor se apaga, el embrague todavía agarra bien. Si el motor sigue encendido y sube "
          "de revoluciones sin que el auto intente moverse, el disco está patinando y el cambio está cerca."),
        p("Las cinco señales que más vemos en el taller, de la más temprana a la más grave:"),
        ol([
            "<strong>El punto de enganche sube.</strong> El auto empieza a moverse cuando el pedal ya está "
            "casi arriba. Es el primer aviso y suele aparecer meses antes que los demás.",
            "<strong>Patina en subida o al rebasar.</strong> El tacómetro sube y la velocidad no acompaña, "
            "sobre todo en marchas altas y con el auto cargado.",
            "<strong>Olor a quemado.</strong> Un olor parecido a papel o ferodo caliente después de una "
            "cuesta larga o de un arranque difícil en pendiente.",
            "<strong>Vibración al arrancar.</strong> El auto tiembla al salir en primera, como si diera "
            "pequeños saltos. Puede ser disco cristalizado o volante del motor dañado.",
            "<strong>Las marchas entran duro o raspan.</strong> El embrague no desacopla del todo. A veces "
            "es el disco, y a veces es el sistema hidráulico (bomba o líquido).",
        ]),

        h2("Por qué en la sierra norte el embrague dura menos"),
        p("Un kit de embrague bien usado puede pasar de 100.000 km. En la práctica, en Imbabura y Carchi "
          "vemos cambios bastante antes, y casi siempre por los mismos motivos:"),
        ul([
            "<strong>Arranques en cuesta todos los días.</strong> Las calles del centro de Ibarra, los barrios "
            "altos de Otavalo o la subida al mirador de Yahuarcocha obligan a sostener el auto con el "
            "embrague. Cada vez que lo hace, el disco roza y se calienta.",
            "<strong>Viajes largos con desnivel.</strong> La ruta del valle del Chota hacia Carchi tiene "
            "subidas largas en las que muchos conductores reducen tarde y dejan patinar el embrague para "
            "no perder velocidad.",
            "<strong>Carga y remolque.</strong> Una camioneta que lleva quintales o arrastra un tráiler pide "
            "más al embrague que un sedán con dos pasajeros.",
            "<strong>Hábitos.</strong> Llevar el pie apoyado en el pedal, esperar el semáforo con el "
            "embrague pisado y la marcha metida, o arrancar en segunda gastan el disco sin que se note.",
        ]),
        p("La altura también influye: un motor a gasolina atmosférico rinde menos sobre los 2.200 metros, y "
          "el conductor compensa acelerando más mientras suelta el pedal. Lo explicamos en "
          f"{a(P_ALTURA, 'el rendimiento del auto en altura')}."),

        cta_temprano("¿Su embrague ya patina?",
                     "Agende una revisión: medimos el punto de enganche, revisamos el sistema hidráulico y le "
                     "decimos si es el kit o algo más barato.",
                     "Revisar mi embrague por WhatsApp",
                     "Hola, vengo del artículo de embrague. Creo que el embrague de mi auto está gastado y "
                     "quisiera agendar una revisión.", reserva=True),
        FORM_CITA,

        h2("Cuánto cuesta cambiar el embrague"),
        p("El cambio se hace casi siempre en kit: disco, plato de presión (prensa) y rodamiento de empuje. "
          "Cambiar solo el disco ahorra poco en repuesto y obliga a desarmar la caja otra vez a los pocos "
          "meses, porque la mano de obra es la misma. Estos son rangos de mercado para Ecuador:"),
        table(["Tipo de vehículo", "Kit de embrague", "Mano de obra", "Total estimado"], [
            ["Auto compacto o sedán pequeño", "$150 - $300", "$120 - $200", "$270 - $500"],
            ["SUV compacta o mediana", "$250 - $450", "$150 - $250", "$400 - $700"],
            ["Camioneta diésel 4x2", "$350 - $600", "$200 - $300", "$550 - $900"],
            ["Camioneta diésel 4x4", "$400 - $700", "$250 - $400", "$650 - $1.100"],
        ], "Costo referencial estimado. " + NOTA_COSTOS),
        p("Dos piezas pueden subir la cuenta. La primera es el volante del motor: si está rayado o "
          "recalentado se rectifica, y si es bimasa (común en diésel modernos) a veces hay que reemplazarlo, "
          "lo que puede costar tanto como el kit. La segunda es el sistema hidráulico: si la bomba auxiliar "
          "o el cilindro pierden líquido, conviene cambiarlos en la misma intervención."),

        h2("Lo que puede parecer embrague y no lo es"),
        p("No todo pedal raro significa kit nuevo. Antes de aprobar un cambio, el técnico debería descartar "
          "estas causas, que se resuelven con mucho menos dinero:"),
        ul([
            "Líquido de embrague bajo o contaminado, que hace que el pedal se sienta esponjoso.",
            "Aire en el circuito hidráulico después de una reparación mal purgada.",
            "Cable de embrague estirado o mal ajustado, en los modelos que todavía lo usan.",
            "Soportes de motor rotos, que producen vibración al arrancar y se confunden con un disco dañado.",
            f"Problemas de motor que se sienten como falta de fuerza: los repasamos en {a(P_TIRONEA, 'el auto tironea o le falta fuerza')}.",
        ]),

        h2("Cómo hacer que el próximo embrague dure más"),
        ol([
            "Use el freno de mano para arrancar en subida en lugar de sostener el auto con el pedal.",
            "En semáforos largos, ponga neutro y suelte el embrague.",
            "Suelte el pedal por completo después de cada cambio; no lo use como apoyapié.",
            "Reduzca antes de la cuesta, no a mitad de ella.",
            "Arranque siempre en primera, aunque el auto venga cargado de poco.",
        ]),

        quote("La mitad de los embragues que cambiamos en Ibarra pudieron durar el doble. El disco no se "
              "gasta en carretera: se gasta en la cuadra empinada donde el conductor espera el semáforo con "
              "el pie en el pedal."),

        h2("Cuándo cambiar el embrague NO le conviene todavía"),
        p("Si la prueba de tercera marcha sale bien, el punto de enganche está a media carrera y el único "
          "síntoma es que las marchas entran un poco duro, lo más probable es que el problema sea hidráulico "
          "o de ajuste. Ahí cambiar el kit sería gastar de más."),
        p("Tampoco conviene si el auto tiene caja automática o CVT: no lleva embrague de pedal y sus fallas "
          f"son otras. Lo explicamos en {a(P_AUTO_CVT, 'automáticos frente a CVT')}. Y si el vehículo está "
          f"dentro de la garantía de fábrica, revise primero qué cubre; el embrague suele considerarse pieza de "
          f"desgaste, pero un defecto de fabricación sí entra. Detalle en {a(P_GARANTIA, 'qué cubre y qué no la garantía')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cada cuántos kilómetros se cambia el embrague?",
             "No tiene un kilometraje fijo como el aceite. Depende del uso: entre 60.000 y 120.000 km es un "
             "rango habitual, y en ciudad con muchas pendientes suele estar en la parte baja."),
            ("¿Puedo seguir manejando con el embrague patinando?",
             "Unos días, con cuidado, sí. Pero el disco se calienta cada vez más, puede dañar el volante del "
             "motor y dejarlo sin tracción en una subida. Agende la revisión cuanto antes."),
            ("¿Cuánto tiempo toma cambiar el embrague?",
             "En la mayoría de autos y camionetas, entre uno y dos días de taller, según el modelo y si hay "
             "que rectificar el volante o cambiar piezas del sistema hidráulico."),
            ("¿Conviene un kit original o uno alternativo?",
             "El original asegura que el disco y la prensa tengan la presión que diseñó el fabricante. Un "
             "alternativo barato puede vibrar o durar menos; el ahorro se pierde si hay que desarmar otra vez."),
        ]),
        p(f"Atendemos embragues en nuestros talleres de {SEDES}. Escríbanos al {WHATSAPP_TXT} con el modelo y "
          "el kilometraje de su auto y le damos una referencia antes de que lo traiga."),
        CIERRE,
    ]
    guarda(dict(
        n=11,
        title="Embrague gastado: señales de desgaste y costo estimado de cambio en Ecuador",
        slug="embrague-gastado-senales-costo-cambio",
        categories=[46],
        excerpt="Cinco señales de que el embrague se está acabando, una prueba que puede hacer usted mismo y "
                "cuánto cuesta cambiarlo en un auto, una SUV o una camioneta.",
        meta={"_yoast_wpseo_title": "Embrague gastado: señales y costo de cambio",
              "_yoast_wpseo_metadesc": "La prueba de tercera marcha, las cinco señales que avisan antes de "
                                       "que el pedal se vaya al piso y el costo estimado del kit en un auto, "
                                       "SUV o camioneta.",
              "_yoast_wpseo_focuskw": "embrague gastado"},
        fuentes=[],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# 12. Escáner / diagnóstico computarizado (ángulo: qué detecta y qué NO; el post 2026 de
#     diagnóstico computarizado en Ibarra ya existe y se enlaza)
# ════════════════════════════════════════════════════════════════════════════════════
def escaner():
    c = [
        p("Un escáner de $20 comprado por internet y el equipo de diagnóstico de un taller autorizado se "
          "conectan al mismo enchufe debajo del volante. Los dos muestran un código como P0300 en la "
          "pantalla. La diferencia está en lo que viene después: uno le dice «falla de encendido» y el otro "
          "le dice en qué cilindro, desde cuándo y con qué datos del motor ocurrió."),
        p("Este artículo explica qué detecta de verdad un escáner automotriz, qué cosas no puede ver aunque "
          "el técnico lo conecte, y en qué momentos conviene hacer el diagnóstico aunque el tablero no "
          f"muestre ninguna luz. Si busca la explicación general del servicio, la tiene en "
          f"{a(P_DIAG, 'diagnóstico computarizado automotriz en Ibarra')}."),

        h2("Qué detecta un escáner, en una frase"),
        p("Detecta lo que los sensores del auto pueden medir y la computadora considera fuera de rango. Si "
          "una pieza falla sin que ningún sensor lo note, el escáner no la ve. Por eso un diagnóstico serio "
          "combina tres cosas: los códigos, los datos en vivo y la revisión física del técnico."),
        table(["Lo que sí detecta", "Lo que no detecta"], [
            ["Fallas de encendido, inyección y mezcla aire-combustible", "Desgaste de pastillas o discos de freno"],
            ["Sensores dañados o desconectados (oxígeno, temperatura, posición)", "Amortiguadores vencidos o bujes rotos"],
            ["Fallas del ABS, airbags y control de estabilidad", "Fugas de aceite o refrigerante sin sensor que las mida"],
            ["Problemas de comunicación entre módulos", "Ruidos de suspensión, rodamientos o caja"],
            ["Errores de la caja automática y de los sistemas híbridos", "El estado real de una correa de distribución"],
            ["Historial de fallas guardado, aunque la luz ya se haya apagado", "Óxido, golpes o reparaciones mal hechas en la carrocería"],
        ]),

        h2("Un código no es un diagnóstico"),
        p("El código señala el síntoma que vio la computadora, no la pieza culpable. Tres ejemplos que "
          "vemos seguido en el taller:"),
        ul([
            "<strong>P0171, mezcla pobre.</strong> Puede ser el sensor de oxígeno, pero también una manguera de "
            "vacío rota, un inyector sucio o una bomba de combustible débil. Cambiar el sensor porque lo dice "
            "una aplicación es la forma más común de gastar sin resolver.",
            "<strong>P0300, falla de encendido aleatoria.</strong> Bujías, bobinas, inyectores, compresión baja "
            "o combustible de mala calidad. Los datos en vivo de cada cilindro son los que separan una causa "
            "de otra.",
            "<strong>Código de catalizador.</strong> Muchas veces el catalizador está bien y el que falla es el "
            "sensor que lo vigila, o el motor quema aceite y termina dañándolo.",
        ]),
        p("En la sierra se suma la altura. Sobre los 2.200 metros de Ibarra o los casi 3.000 de Tulcán, la "
          "computadora ajusta la mezcla por falta de oxígeno, y algunos valores que en la Costa serían "
          "anormales aquí son esperables. Leerlos bien requiere conocer el modelo y el lugar donde se maneja."),

        cta_temprano("¿Se encendió una luz en el tablero?",
                     "Tráigalo antes de comprar repuestos: escaneamos, revisamos los datos en vivo y le "
                     "decimos qué pieza es antes de cambiar nada.",
                     "Agendar diagnóstico por WhatsApp",
                     "Hola, vengo del artículo del escáner automotriz. Se encendió una luz en el tablero y "
                     "quisiera agendar un diagnóstico.", reserva=True),
        FORM_CITA,

        h2("Escáner genérico o equipo de concesionario: qué cambia"),
        p("Desde hace más de veinte años todos los autos tienen el puerto OBD-II, y cualquier lector barato "
          "puede leer los códigos genéricos de motor y emisiones. Lo que no lee son los módulos propios de "
          "cada marca: transmisión, carrocería, airbags, inmovilizador, asistencias de manejo y, en los "
          "híbridos y eléctricos, el sistema de batería de alto voltaje."),
        table(["", "Lector OBD-II genérico", "Equipo de diagnóstico del taller"], [
            ["Códigos de motor y emisiones", "Sí", "Sí"],
            ["Códigos de ABS, airbags, caja y carrocería", "Rara vez", "Sí"],
            ["Datos en vivo de sensores", "Básicos", "Completos y en gráfica"],
            ["Pruebas activas (inyectores, ventiladores, ABS)", "No", "Sí"],
            ["Programar llaves, módulos o calibrar sensores", "No", "Sí, según la marca"],
            ["Sistema híbrido y batería de alto voltaje", "No", "Sí, con equipo del fabricante"],
        ]),
        p("Un lector propio sirve para saber si una luz es urgente y para llegar al taller con el código "
          "anotado. Lo que no conviene es borrar el código y seguir manejando: la falla sigue ahí y el "
          "historial que habría ayudado al técnico desaparece."),

        h2("Cuándo hacer un diagnóstico aunque no haya luz encendida"),
        ol([
            "<strong>Antes de comprar un auto usado.</strong> El escáner muestra si alguien borró códigos hace "
            "poco: los monitores de emisiones aparecen como «no listos».",
            "<strong>Antes de la revisión técnica vehicular.</strong> Un código guardado puede hacer que el auto "
            "no pase. Mejor saberlo una semana antes.",
            "<strong>Antes de un viaje largo.</strong> Si va a bajar a la Costa o subir a Tulcán con la familia, "
            f"un escaneo complementa el {a(P_VIAJE, 'checklist antes de un viaje por la sierra')}.",
            "<strong>Cuando el consumo sube sin explicación.</strong> Un sensor que empieza a fallar puede hacer "
            "gastar más gasolina semanas antes de encender la luz.",
            "<strong>Después de un golpe o de un cambio de batería.</strong> Algunos módulos quedan con errores "
            "guardados o descalibrados.",
        ]),

        h2("Cuánto cuesta un diagnóstico con escáner"),
        table(["Servicio", "Costo referencial estimado"], [
            ["Lectura de códigos con informe", "$20 - $40"],
            ["Diagnóstico completo con datos en vivo y prueba de ruta", "$40 - $80"],
            ["Diagnóstico de sistema híbrido o eléctrico", "$60 - $120"],
            ["Programación o calibración de módulos", "$60 - $150"],
        ], NOTA_COSTOS),
        p("Muchas veces el valor del diagnóstico se descuenta o se compensa si la reparación se hace en el "
          "mismo taller; pregunte al asesor cómo funciona en su caso."),

        quote("El cliente que llega con el sensor ya comprado porque se lo dijo una aplicación es el que más "
              "gasta. El escáner cuenta qué vio la computadora; quién tiene la culpa lo dice la revisión."),

        h2("Cuándo un diagnóstico con escáner NO le resuelve el problema"),
        p("Si lo que nota es un ruido al pasar un bache, un volante que vibra o un pedal de freno que baja, "
          "el escáner probablemente no muestre nada. Esas fallas son mecánicas y se encuentran con el auto "
          f"en el elevador. Para orientarse antes de venir, revise {a(P_RUIDOS, 'qué significa cada ruido')} "
          f"y {a(P_TABLERO, 'qué luces del tablero obligan a parar')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿El escáner sirve en cualquier marca?",
             "La lectura de códigos genéricos de motor, sí. Los sistemas propios de cada marca necesitan el "
             "software del fabricante o un equipo profesional compatible con ese modelo."),
            ("¿Si borro el código, la falla se arregla?",
             "No. La luz se apaga un tiempo y vuelve cuando la computadora detecta otra vez el problema. Además "
             "se pierde el registro que ayuda a encontrar la causa."),
            ("¿Cuánto demora un diagnóstico?",
             "La lectura toma minutos. Un diagnóstico completo, con datos en vivo, prueba de ruta y revisión "
             "física, suele tomar entre una y dos horas."),
            ("¿Un auto híbrido necesita un escáner especial?",
             "Para leer el sistema híbrido y la batería, sí. Los códigos de motor se leen igual, pero el "
             "estado de la batería y de los motores eléctricos solo lo muestra el equipo del fabricante."),
        ]),
        p(f"Hacemos diagnósticos en {SEDES}. Si está en Carchi, vea también el {a(P_TULCAN, 'taller de Tulcán')}, "
          f"o escríbanos al {WHATSAPP_TXT} con el código que le apareció."),
        CIERRE,
    ]
    guarda(dict(
        n=12,
        title="Escáner automotriz: qué detecta, qué no detecta y cuándo conviene pasarlo",
        slug="escaner-automotriz-que-detecta-cuando-hacerlo",
        categories=[62],
        excerpt="Lo que un escáner automotriz puede ver, lo que no ve aunque lo conecten y los cinco momentos "
                "en que conviene un diagnóstico aunque no haya ninguna luz encendida.",
        meta={"_yoast_wpseo_title": "Escáner automotriz: qué detecta y qué no",
              "_yoast_wpseo_metadesc": "Por qué un código no es un diagnóstico, en qué se diferencia un lector "
                                       "de $20 del equipo del taller y cuándo pasar el escáner aunque el "
                                       "tablero esté limpio.",
              "_yoast_wpseo_focuskw": "escáner automotriz"},
        fuentes=[P_DIAG],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# 13. Correa de distribución
# ════════════════════════════════════════════════════════════════════════════════════
def correa():
    c = [
        p("La correa de distribución es la pieza más barata que puede costarle un motor. Cuesta lo que un par "
          "de llantas, no hace ruido antes de romperse y, en la mayoría de motores modernos, cuando se rompe "
          "las válvulas chocan con los pistones. La reparación pasa entonces de unos cientos de dólares a "
          "varios miles."),
        p("Aquí le explicamos cómo saber si su auto tiene correa o cadena, cada cuánto se cambia, qué conviene "
          "cambiar en la misma intervención y cuánto cuesta en el mercado ecuatoriano. Con un dato por delante: "
          "en el norte del país, con subidas largas y polvo en los caminos rurales, conviene no estirar el "
          "plazo del manual."),

        h2("Cada cuánto se cambia la correa de distribución"),
        p("La regla general la pone el fabricante en el manual: entre 60.000 y 100.000 km en la mayoría de "
          "motores a gasolina, o entre cuatro y cinco años, lo que ocurra primero. El tiempo cuenta tanto "
          "como los kilómetros porque la goma se reseca aunque el auto ande poco. Un auto de 2019 que recorre "
          "8.000 km al año ya debería tenerla cambiada."),
        p("Si el auto es usado y no hay factura del último cambio, asuma que no se hizo. Es la decisión más "
          "barata que puede tomar al comprar un seminuevo."),

        h2("¿Su auto tiene correa o cadena?"),
        p("No todos los motores llevan correa. Muchos modelos recientes usan cadena metálica, que está diseñada "
          "para durar lo mismo que el motor y no tiene un cambio programado. La forma segura de saberlo es el "
          "manual o la consulta al taller con el número de chasis. Algunas pistas:"),
        ul([
            "Si el manual de mantenimiento incluye «reemplazar correa de distribución» a cierto kilometraje, la tiene.",
            "Si al costado del motor hay una tapa plástica grande atornillada, suele cubrir una correa.",
            "Si la tapa es metálica y parte del bloque, normalmente es cadena.",
        ]),
        p("La cadena no se cambia por kilometraje, pero sí avisa cuando se estira: un traqueteo metálico al "
          "encender en frío durante los primeros segundos y, a veces, un código de sincronización en el "
          f"escáner. Si escucha eso, no lo deje pasar. Revise también {a(P_RUIDOS, 'qué significa cada ruido del auto')}."),

        h2("Qué se cambia junto con la correa"),
        p("El trabajo pesado es desarmar el frente del motor. Por eso conviene cambiar en la misma visita las "
          "piezas que trabajan con la correa y que tienen una vida parecida:"),
        ol([
            "<strong>Tensor y poleas guía.</strong> Si un rodamiento se traba, rompe la correa nueva. Se cambian siempre.",
            "<strong>Bomba de agua.</strong> En muchos motores la mueve la misma correa. Si gotea después, hay que "
            "desarmar todo otra vez.",
            "<strong>Retenes del cigüeñal y del árbol de levas.</strong> Una fuga de aceite sobre la correa "
            "nueva la destruye en meses.",
            "<strong>Correa de accesorios.</strong> No es la de distribución, pero ya está desmontada y es barata.",
            "<strong>Refrigerante.</strong> Si se cambia la bomba de agua, se renueva el líquido.",
        ]),

        cta_temprano("¿No sabe cuándo se cambió la correa por última vez?",
                     "Con el modelo y el kilometraje le decimos si le toca y cuánto costaría el kit completo.",
                     "Consultar mi correa por WhatsApp",
                     "Hola, vengo del artículo de la correa de distribución. Quisiera saber si a mi auto le "
                     "toca el cambio y cuánto costaría.", reserva=True),
        FORM_CITA,

        h2("Cuánto cuesta cambiar la correa de distribución"),
        table(["Tipo de motor", "Solo correa y tensor", "Kit con bomba de agua", "Si se rompe en marcha"], [
            ["Gasolina 1.0 a 1.6 (compacto)", "$180 - $300", "$280 - $450", "$900 - $2.000"],
            ["Gasolina 1.8 a 2.5 (SUV, sedán mediano)", "$250 - $420", "$380 - $650", "$1.500 - $3.000"],
            ["Diésel de camioneta", "$300 - $500", "$450 - $800", "$2.000 - $4.500"],
        ], "Costo referencial estimado, repuestos y mano de obra. " + NOTA_COSTOS),
        p("La última columna es la que importa. En los motores llamados de interferencia, que son la mayoría "
          "de los actuales, una correa rota dobla válvulas y puede dañar pistones y la culata. Pocas "
          "reparaciones tienen una diferencia tan grande entre prevenir y reparar."),

        h2("Lo que acorta la vida de la correa en Imbabura y Carchi"),
        ul([
            "<strong>Fugas de aceite o refrigerante</strong> que caen sobre la correa y ablandan la goma.",
            "<strong>Polvo de caminos de tierra</strong>, común en las parroquias rurales de Cotacachi, Pimampiro "
            "o el camino a las comunidades de Cayambe, que se mete bajo la tapa.",
            "<strong>Recalentamientos.</strong> Un motor que llegó a temperatura alta castiga la correa y la bomba. "
            f"Si le ha pasado, lea {a(P_RECALIENTA, 'qué hacer si el carro se recalienta')}.",
            "<strong>Años parado.</strong> Un auto que pasó mucho tiempo sin moverse puede tener la goma cuarteada "
            "con muy pocos kilómetros.",
        ]),

        quote("Nadie se arrepiente de haber cambiado la correa a tiempo. Los que se arrepienten son los que la "
              "estiraron veinte mil kilómetros más y terminaron pagando una culata."),

        h2("Cuándo el cambio de correa NO le conviene todavía"),
        p("Si su motor lleva cadena, no hay correa que cambiar y cualquiera que le ofrezca ese servicio por "
          "kilometraje está equivocado. Tampoco tiene sentido adelantar el cambio si la correa se cambió hace "
          "poco con factura y el auto no ha tenido fugas ni recalentamientos: esperar al plazo del manual es "
          "lo correcto."),
        p("Y si el auto está en garantía, el cambio debe hacerse en el taller autorizado y quedar registrado. "
          f"Revise el plan por kilometraje de su marca, por ejemplo la {a(P_TOYOTA_KM, 'tabla de mantenimiento Toyota')} "
          f"o el {a(P_RENAULT_M, 'mantenimiento Renault')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿La correa de distribución avisa antes de romperse?",
             "Rara vez. A veces hay un chillido del tensor o una fuga visible, pero lo normal es que se rompa "
             "sin aviso. Por eso se cambia por kilometraje o por años, no por síntomas."),
            ("¿Qué pasa si la correa se rompe mientras manejo?",
             "El motor se apaga de inmediato y no vuelve a encender. En motores de interferencia hay daño "
             "interno. Lo correcto es no intentar arrancar y llevarlo en grúa al taller."),
            ("¿Cuánto tarda el cambio?",
             "Entre medio día y un día completo, según el motor. En algunas camionetas diésel puede tomar más "
             "si hay que bajar otros componentes."),
            ("¿La cadena de distribución nunca se cambia?",
             "Está pensada para la vida del motor, pero se estira con aceite viejo o cambios atrasados. Si suena "
             "al encender en frío, hay que revisarla."),
        ]),
        p(f"Hacemos el cambio de kit de distribución en {SEDES}. Escríbanos al {WHATSAPP_TXT} con el modelo, "
          f"año y kilometraje, y si quiere ver qué más toca a esa altura, revise el {a(P_30K, 'mantenimiento de 30.000 km')}."),
        CIERRE,
    ]
    guarda(dict(
        n=13,
        title="Correa de distribución: cuándo cambiarla, qué incluye y costo estimado",
        slug="correa-de-distribucion-cuando-cambiarla-costo",
        categories=[46],
        excerpt="Cada cuántos kilómetros se cambia la correa de distribución, cómo saber si su auto lleva "
                "correa o cadena y cuánto cuesta prevenir frente a lo que cuesta repararla.",
        meta={"_yoast_wpseo_title": "Correa de distribución: cuándo cambiarla y costo",
              "_yoast_wpseo_metadesc": "El plazo en kilómetros y en años, qué piezas cambiar en la misma "
                                       "visita y la diferencia de costo entre hacerlo a tiempo y una correa "
                                       "rota en marcha.",
              "_yoast_wpseo_focuskw": "correa de distribución"},
        fuentes=[],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# 14. Mantenimiento de camionetas 4x4
# ════════════════════════════════════════════════════════════════════════════════════
def camionetas_4x4():
    c = [
        p("Una camioneta 4x4 tiene todo lo que tiene un auto normal y, además, un segundo juego de piezas que "
          "trabaja solo cuando se engancha la doble tracción: caja de transferencia, diferencial delantero, "
          "cardán delantero y, en muchos modelos, cubos que se bloquean. Esas piezas pueden pasar meses sin "
          "moverse en la ciudad y, el día que se necesitan en el lodo, fallar por falta de uso."),
        p("Esta guía repasa lo que el plan de mantenimiento de una 4x4 suma frente al de un auto, cada cuánto "
          "conviene revisarlo según el uso que se le da en Imbabura y Carchi, y cuánto cuesta. Vale igual para "
          "una camioneta de finca en Pimampiro que para una que sale los fines de semana hacia los páramos "
          "del Ángel."),

        h2("Lo que una 4x4 necesita y un auto normal no"),
        table(["Componente", "Qué se hace", "Frecuencia orientativa"], [
            ["Diferencial trasero", "Revisar nivel y cambiar aceite", "Cada 40.000 - 60.000 km o tras cruzar agua"],
            ["Diferencial delantero", "Revisar nivel y cambiar aceite", "Cada 40.000 - 60.000 km o tras cruzar agua"],
            ["Caja de transferencia", "Cambiar aceite y revisar retenes", "Cada 40.000 - 60.000 km"],
            ["Cardanes y crucetas", "Engrasar y revisar juego", "En cada mantenimiento si tienen grasera"],
            ["Juntas homocinéticas y guardapolvos", "Revisar cortes y fugas de grasa", "En cada mantenimiento"],
            ["Cubos de rueda libre (si los tiene)", "Probar acople y lubricar", "Cada 20.000 km"],
            ["Filtro de aire", "Limpiar o cambiar", "Cada 10.000 km, antes con polvo"],
        ], "Frecuencias de referencia. La que vale es la del manual de su modelo."),
        p("Los aceites de diferencial y transferencia son distintos del aceite de motor y entre ellos. Una "
          "transferencia que lleva aceite de caja automática no acepta aceite de diferencial, y al revés. "
          "Mezclarlos es uno de los errores más caros que vemos en camionetas que pasaron por talleres "
          "sin el manual a mano."),

        h2("El uso cambia el plan: ciudad, finca y aventura"),
        p("El fabricante suele dar dos tablas: uso normal y uso severo. En el norte del Ecuador, casi todas las "
          "camionetas que trabajan entran en la segunda sin que el dueño lo sepa."),
        ul([
            "<strong>Uso normal:</strong> ciudad y carretera pavimentada, la 4x4 se engancha pocas veces al año.",
            "<strong>Uso severo:</strong> caminos de tierra o empedrado a diario, carga frecuente cerca del máximo, "
            "remolque, polvo, cruces de ríos o quebradas, viajes cortos repetidos. Una camioneta de finca en el "
            "valle del Chota o de reparto entre Cayambe y las comunidades está aquí.",
        ]),
        p("En uso severo los intervalos de aceites, filtros y engrase se acortan a la mitad aproximadamente. Si "
          f"su camioneta trabaja en campo, complemente con el {a(P_RURAL, 'mantenimiento para zonas rurales')}."),

        h2("Después de cruzar agua o barro profundo"),
        p("Es el punto que más se descuida. Los diferenciales y la transferencia tienen respiraderos para que "
          "el aceite no haga presión al calentarse. Cuando la camioneta caliente entra en un río frío, el "
          "componente se contrae y puede chupar agua por ese respiradero. El aceite se vuelve lechoso y los "
          "rodamientos empiezan a picarse en pocas semanas."),
        ol([
            "Si cruzó agua que llegó a la altura de los ejes, revise el aceite de los diferenciales esa misma semana.",
            "Si el aceite se ve color café con leche, cámbielo aunque se haya cambiado hace poco.",
            "Lave los bajos con agua a presión para sacar el barro de cardanes, frenos y guardapolvos.",
            "Revise el filtro de aire: el barro y el polvo lo tapan rápido.",
        ]),

        cta_temprano("¿Su camioneta trabaja en campo o cruzó agua hace poco?",
                     "Revisamos diferenciales, transferencia y cardanes en una sola visita y le decimos qué "
                     "toca ahora y qué puede esperar.",
                     "Agendar revisión 4x4 por WhatsApp",
                     "Hola, vengo del artículo de mantenimiento de camionetas 4x4. Quisiera agendar una "
                     "revisión de la doble tracción.", reserva=True),
        FORM_CITA,

        h2("Use la 4x4 aunque no la necesite"),
        p("La caja de transferencia y el diferencial delantero se lubrican cuando giran. Si pasan meses sin "
          "engancharse, los retenes se secan y los sincronizadores se pegan. Una buena práctica es enganchar la "
          "4x4 unos kilómetros una vez al mes, en tierra o ripio, nunca en asfalto seco: en pavimento la "
          "tracción integral sin diferencial central fuerza la transmisión al girar."),
        p("También conviene probar la reductora (4L) de vez en cuando en una subida de tierra, para "
          "confirmar que entra y sale sin ruido."),

        h2("Llantas, frenos y suspensión: lo que más sufre"),
        ul([
            "<strong>Llantas iguales en las cuatro ruedas.</strong> En una 4x4 una llanta de diámetro distinto fuerza "
            "la transferencia. Rote cada 10.000 km y cambie las cuatro juntas si es posible.",
            "<strong>Frenos.</strong> El barro acelera el desgaste de pastillas y tambores. Revíselos en cada visita.",
            "<strong>Amortiguadores y bujes.</strong> El empedrado y la carga los castigan; un amortiguador vencido "
            "hace rebotar la camioneta vacía y la vuelve inestable cargada.",
            f"<strong>Protecciones y accesorios.</strong> Estribos, cubrebatea y barras ayudan a trabajar; vea "
            f"{a(P_ACC_CAM, 'accesorios originales para camionetas')}.",
        ]),

        h2("Cuánto cuesta el mantenimiento de una camioneta 4x4"),
        table(["Servicio", "Costo referencial estimado"], [
            ["Cambio de aceite de diferencial delantero y trasero", "$60 - $130"],
            ["Cambio de aceite de caja de transferencia", "$40 - $90"],
            ["Engrase de cardanes y revisión de crucetas", "$15 - $35"],
            ["Revisión 4x4 completa (aceites, cardanes, homocinéticas, cubos)", "$180 - $350"],
            ["Cambio de cruceta de cardán", "$60 - $150 por cruceta"],
        ], NOTA_COSTOS),
        p("Se suma al mantenimiento de motor del kilometraje que corresponda. En camionetas diésel, el filtro "
          "de combustible y el separador de agua pesan más que en las de gasolina por la calidad variable del "
          "diésel en estaciones rurales."),

        quote("Una 4x4 que solo se usa en ciudad envejece por dentro sin que el dueño lo note. El día que "
              "engancha la doble tracción en un camino con lodo, es cuando descubre que los retenes ya no sellan."),

        h2("Cuándo una camioneta 4x4 NO le conviene"),
        p("Si nunca sale del pavimento y no carga peso, la 4x4 suma mantenimiento, consumo y precio sin "
          "devolverle nada. Una 4x2 con buen despeje cubre a la mayoría de personas que viven en Ibarra y "
          "salen a la Panamericana. La doble tracción se justifica cuando hay tierra, lodo o pendientes de "
          f"ripio de forma habitual. Lo analizamos en {a(P_CAM_RURAL, 'qué camioneta conviene para zonas rurales')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cada cuánto se cambia el aceite del diferencial?",
             "Entre 40.000 y 60.000 km en uso normal según el manual. En uso severo, con agua, carga o remolque, "
             "cerca de la mitad, y siempre que el aceite se vea contaminado."),
            ("¿Puedo usar la 4x4 en carretera mojada?",
             "En lluvia fuerte, ripio o lodo sí. En asfalto seco no, salvo que su camioneta tenga tracción "
             "integral permanente o un modo automático; revíselo en el manual."),
            ("¿Qué pasa si no hago el mantenimiento de la transferencia?",
             "El aceite pierde propiedades y los engranajes se desgastan. Los primeros avisos son ruidos al "
             "enganchar la 4x4 o dificultad para entrar y salir de la reductora."),
            ("¿El mantenimiento 4x4 se hace en el mismo turno que el de motor?",
             "Sí. Lo ideal es sumarlo al mantenimiento por kilometraje para aprovechar el elevador y no "
             "inmovilizar la camioneta dos veces."),
        ]),
        p(f"Atendemos camionetas 4x4 en {SEDES}. Si la suya es Toyota, revise también la {a(P_HILUX, 'Hilux en Ecuador')}, "
          f"o escríbanos al {WHATSAPP_TXT} con el modelo y el uso que le da."),
        CIERRE,
    ]
    guarda(dict(
        n=14,
        title="Mantenimiento de camionetas 4x4: lo que no tiene un auto normal",
        slug="mantenimiento-camionetas-4x4",
        categories=[46],
        excerpt="Diferenciales, caja de transferencia, cardanes y qué revisar después de cruzar agua: lo que "
                "suma el mantenimiento de una camioneta 4x4 y cuánto cuesta.",
        meta={"_yoast_wpseo_title": "Mantenimiento de camionetas 4x4: qué incluye",
              "_yoast_wpseo_metadesc": "Diferenciales, transferencia y cardanes: cada cuánto se revisan según "
                                       "el uso en campo o ciudad, qué hacer tras cruzar agua y cuánto cuesta "
                                       "en Ecuador.",
              "_yoast_wpseo_focuskw": "mantenimiento camionetas 4x4"},
        fuentes=[],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# Fuentes y enlaces de los posts de modelos
# ════════════════════════════════════════════════════════════════════════════════════
EV = "/vehiculos-electricos-e-hibridos/"
P_PILAR_EV = L(EV + "autos-electricos-en-ecuador-2025/")
P_SIGLAS = L(EV + "diferencia-phev-hev-reev-ev-ecuador/")
P_PHEV = L(EV + "mejor-hibrido-enchufable-ecuador/")
P_REEV = L(EV + "que-es-reev-changan-hunter-cs55-ecuador/")
P_CSH = L(EV + "chery-super-hybrid-csh-ecuador/")
P_PRIMER_HIB = L(EV + "guia-comprar-primer-hibrido-ecuador-2026/")
P_BATERIA = L(EV + "bateria-auto-hibrido-duracion-costo-garantia-ecuador/")
P_AHORRO_HIB = L(EV + "ahorro-real-de-un-auto-hibrido-en-ecuador/")
P_PICO = L(EV + "pico-y-placa-hibridos-electricos-ecuador/")
P_SUV_HIB = L(EV + "mejores-suv-hibridos-electricos-ecuador-2026/")
P_MANT_HIB = L("/mantenimiento-y-tecnologia/mantenimiento-hibrido-costos-ecuador-2026/")
P_MAGE_VS = L("/comparativas-y-decisiones-inteligentes/dongfeng-mage-ev-vs-mage-hybrid/")
P_EPOWER = L("/nissan/nissan-e-power-ecuador-ahorro-combustible/")
P_CAM_HIB = L(EV + "camionetas-hibridas-electricas-ecuador-2026/")
P_EV_BARATO = L(EV + "auto-electrico-mas-barato-ecuador-2026/")

F = {  # fichas del sitio (FICHAS)
    "Tiggo 4 Pro": L("/vehiculos/tiggo-4-pro/"), "Tiggo 7 Pro Max": L("/vehiculos/chery-tiggo-7/"),
    "Tiggo 2 Pro Max": L("/vehiculos/chery-tiggo2-pro/"), "Arrizo 5 Pro Max": L("/vehiculos/chery-arrizo-3/"),
    "J5": L("/vehiculos/jaecoo-j5-shs/"), "J7": L("/vehiculos/jaecoo-j7-shs/"), "C5": L("/vehiculos/omoda-c5-chs/"),
    "E5": L("/vehiculos/omoda-e5-next/"), "Mage": L("/vehiculos/mage/"), "Huge": L("/vehiculos/huge-hybrid/"),
    "Z9": L("/vehiculos/z9/"), "Rich 7": L("/vehiculos/rich-7/"), "Rich 6": L("/vehiculos/dongfeng-rich-6/"),
    "Paladin": L("/vehiculos/paladin/"),
    "Corolla HV": L("/vehiculos/corolla-hv/"), "Yaris Cross": L("/vehiculos/yaris-cross/"),
    "Corolla Cross": L("/vehiculos/corolla-cross/"), "RAV4": L("/vehiculos/rav-4-2/"), "Raize": L("/vehiculos/raize/"),
    "Agya": L("/vehiculos/agya/"), "Hilux": L("/vehiculos/toyota-hillux/"),
    "X-Trail": L("/vehiculos/nissan-x-trail-epower/"), "Frontier": L("/vehiculos/nissan-frontier/"),
    "Tiggo 7 SH": L("/vehiculos/tigo-7-super-hybrid/"), "Tiggo 8 SH": L("/vehiculos/tigo-8-super-hybrid/"),
    "Tiggo 9 SH": L("/vehiculos/tigo-9-super-hybrid/"),
    "CS55 R-EV": L("/vehiculos/cs-35-2/"), "Hunter REEV": L("/vehiculos/hunter-reev/"), "Hunter": L("/vehiculos/hunter/"),
    "G318": L("/vehiculos/deepal-g138/"), "Nevo Q05": L("/vehiculos/changan-nevo-q05/"),
    "Alsvin Plus": L("/vehiculos/changan-alsvin-plus/"), "CS15": L("/vehiculos/cs-15/"), "V3": L("/vehiculos/alsvin-v3/"),
    "Star Truck": L("/vehiculos/changan-star-truck/"), "M60": L("/vehiculos/changan-m60/"), "Honor S": L("/vehiculos/changan-honor-s/"),
    "Fiat 600": L("/vehiculos/fiat-600/"), "Pulse": L("/vehiculos/fiat-pulse/"), "Avenger": L("/vehiculos/jeep-avenger/"),
    "Arkana": L("/vehiculos/renault-arkana/"), "Kardian": L("/vehiculos/renault-kardian/"), "Kwid": L("/vehiculos/renault-kwid/"),
    "Duster": L("/vehiculos/renault-duster/"), "CX-90": L("/vehiculos/mazda-cx-90/"), "CX-3": L("/vehiculos/mazda-cx-3/"),
    "BT-50": L("/vehiculos/mazda-bt-50/"), "Mazda 2": L("/vehiculos/mazda-2/"),
    "X35": L("/vehiculos/x35/"), "U5 Plus": L("/vehiculos/us-plus/"), "X55 II": L("/vehiculos/x55-ii/"),
    "Tunland G7": L("/vehiculos/tunland-g7/"), "Tunland V7": L("/vehiculos/tunland-v7/"),
    "Tunland G9": L("/vehiculos/tunland-g9/"), "Tunland V9": L("/vehiculos/tunland-v9/"),
    "RAM 700": L("/vehiculos/ram-700/"), "RAM 1500": L("/vehiculos/new-ram-1500-big-horn/"),
}
def fa(clave, txt=None):
    return a(F[clave], txt or clave)

SRC_CHERY_T4 = "https://www.chery.com.ec/vehiculo/tiggo-4-pro"
SRC_CHERY_T7PM = "https://www.chery.com.ec/vehiculo/tiggo-7-pro-max"
SRC_CHERY_T2 = "https://www.chery.com.ec/vehiculo/tiggo-2-pro-max"
SRC_CHERY_A5 = "https://www.chery.com.ec/vehiculo/arrizo-5-pro-max"
SRC_OJ = "https://omodajaecoo.ec/"
SRC_OJ_J7 = "https://omodajaecoo.ec/files/Ficha_Tecnica_JAECOO-J7.pdf"
SRC_OJ_C5 = "https://omodajaecoo.ec/files/Ficha_Tecnica_OMODA-C5.pdf"
SRC_OJ_J5 = "https://omodajaecoo.ec/models/jaecoo-j5"
SRC_OJ_E5 = "https://omodajaecoo.ec/models/omoda-e5-next"
SRC_JEEP = "https://www.jeep.com/ec/avenger-e-hybrid.html"
SRC_RAM700 = "https://www.ram.com/ec/ram-700.html"
CH_MAGE = L("/donfeng/dongfeng-mage/")
CH_HUGE = "https://www.comercialhidrobo.com/donfeng/dongfeng-huge/"
CH_Z9 = L("/donfeng/dongfeng-z9/")
CH_FIAT600 = L("/fiat/fiat-600/")
CH_COROLLA_HV = L("/toyota/toyota-corolla-hv/")
CH_YARIS_CROSS = L("/toyota/toyota-yaris-cross/")
CH_COROLLA_CROSS = L("/toyota/toyota-corolla-cross/")
CH_RAV4 = L("/toyota/toyota-rav-4/")
CH_XTRAIL = L("/nissan/nissan-x-trail-epower/")
CH_ARKANA = L("/reanult/renault-arkana/")
CH_KOLEOS = L("/reanult/renault-koleos/")
CH_CX90 = L("/mazda/mazda-cx-90/")
CH_G318 = L("/changan/changan-deepal-g138/")


# ════════════════════════════════════════════════════════════════════════════════════
# 15. Pilar general de híbridos
# ════════════════════════════════════════════════════════════════════════════════════
def pilar_hibridos():
    c = [
        p("En Ecuador ya se puede comprar un auto con algún tipo de sistema híbrido por menos de $20.000, y "
          "las opciones llegan hasta SUV de siete asientos y camionetas 4x4 que se enchufan. El problema es que "
          "la palabra «híbrido» se usa para tecnologías muy distintas: hay híbridos que nunca andan solo con "
          "electricidad y otros que hacen la semana entera sin gastar gasolina."),
        p("Esta guía ordena los híbridos que se venden en Comercial Hidrobo por tipo y por precio, con los "
          "datos de las fichas oficiales, y le ayuda a elegir según cómo maneja en Ibarra, Cayambe o Tulcán. "
          f"Si lo que busca es un auto 100 % eléctrico, eso está en {a(P_PILAR_EV, 'la guía de autos eléctricos en Ecuador')}."),

        h2("Cuánto cuesta un auto híbrido en Ecuador en 2026"),
        p(f"La respuesta corta: un híbrido ligero arranca en {precio('Chery Tiggo 4 Pro')} (Chery Tiggo 4 Pro), un híbrido "
          f"completo autorrecargable en {precio('Jaecoo J5 SHS')} (Jaecoo J5 SHS) y un auto que se enchufa en "
          f"{precio('Changan CS55 R-EV')} (Changan CS55 R-EV, de rango extendido). Por encima, la oferta sube hasta los "
          f"{precio('Mazda CX-90')} del Mazda CX-90."),
        table(["Tipo de híbrido", "¿Anda solo en eléctrico?", "¿Se enchufa?", "Desde"], [
            ["Híbrido ligero (MHEV, 48 V)", "No, o solo unos metros", "No", precio("Chery Tiggo 4 Pro")],
            ["Híbrido completo (HEV)", "Sí, a baja velocidad y trayectos cortos", "No", precio("Jaecoo J5 SHS")],
            ["Rango extendido (REEV)", "Sí, siempre mueve las ruedas el motor eléctrico", "Sí", precio("Changan CS55 R-EV")],
            ["Híbrido enchufable (PHEV)", "Sí, entre 90 y 140 km según el modelo", "Sí", precio("Jaecoo J7 SHS")],
        ], NOTA_PRECIOS),
        p(f"La explicación técnica de cada sigla, con ejemplos, está en {a(P_SIGLAS, 'PHEV, HEV, REEV y EV')}."),

        h2("Híbridos completos (HEV): los que no se enchufan"),
        p("Son los que la mayoría de gente imagina cuando dice «híbrido»: un motor a gasolina, uno o dos "
          "motores eléctricos y una batería pequeña que se recarga sola al frenar y con el propio motor. No "
          "necesitan enchufe ni cambian la rutina de quien los maneja."),
        table(["Modelo", "Sistema según la ficha oficial", "Precio desde"], [
            [fa("J5", "Jaecoo J5 SHS"), "Motor 1.5 turbo, batería de 1,83 kWh, autorrecargable", precio("Jaecoo J5 SHS")],
            [fa("Mage", "DongFeng Mage Hybrid"), "1.5 turbo, 288 HP, transmisión híbrida DHT", precio("DongFeng Mage")],
            [fa("C5", "Omoda C5 SHS"), "1.5, 221 HP combinados, batería de 1,83 kWh, DHT", precio("Omoda C5 SHS")],
            [fa("Huge", "DongFeng Huge"), "1.5 full hybrid, 241 HP, caja automática", precio("DongFeng Huge")],
            [fa("Corolla HV", "Toyota Corolla HV"), "1.8, 117 HP combinados, e-CVT", precio("Toyota Corolla HV")],
            [fa("Yaris Cross", "Toyota Yaris Cross"), "1.5 de 3 cilindros, 114 HP combinados, CVT", precio("Toyota Yaris Cross")],
            [fa("Corolla Cross", "Toyota Corolla Cross"), "1.8, 122 HP combinados, e-CVT", precio("Toyota Corolla Cross")],
            [fa("X-Trail", "Nissan X-Trail e-Power"), "e-POWER: la gasolina genera, las ruedas son eléctricas", precio("Nissan X-Trail e-Power")],
        ], NOTA_PRECIOS),
        p("Los chinos ofrecen más potencia por dólar; los Toyota, una garantía de componentes híbridos que la "
          "marca extiende hasta 10 años o 200.000 km en su portafolio. El RAV4 también tiene versiones híbridas "
          f"(LE y XLE): el «desde» de {precio('Toyota RAV4')} del catálogo no indica la versión, así que confirme el valor de la "
          f"híbrida con el asesor. El sistema de Nissan lo explicamos en {a(P_EPOWER, 'cómo funciona e-POWER')}."),

        cta_temprano("¿Quiere probar un híbrido antes de decidir?",
                     "En Ibarra puede manejar un híbrido completo y uno enchufable la misma mañana y notar la "
                     "diferencia en la primera subida.",
                     "Agendar prueba de manejo",
                     "Hola, vengo del artículo de autos híbridos en Ecuador. Quisiera agendar una prueba de "
                     "manejo de un híbrido.", reserva=False),

        h2("Enchufables y de rango extendido: los que hacen la semana sin gasolina"),
        p("Llevan una batería diez veces más grande que un híbrido completo y se cargan en un tomacorriente "
          "de casa. Con la batería llena andan en eléctrico el trayecto diario; cuando se agota, siguen como "
          "híbridos. En los de rango extendido (REEV) la gasolina nunca mueve las ruedas: solo genera energía."),
        table(["Modelo", "Tipo", "Autonomía eléctrica declarada", "Precio desde"], [
            [fa("CS55 R-EV", "Changan CS55 R-EV"), "REEV", "98 km reales en ciudad", precio("Changan CS55 R-EV")],
            [fa("J7", "Jaecoo J7 SHS"), "PHEV", "90 km (WLTP), 18,3 kWh", precio("Jaecoo J7 SHS")],
            [fa("Tiggo 7 SH", "Chery Tiggo 7 Super Hybrid"), "PHEV", "120 km", precio("Chery Tiggo 7 Super Hybrid")],
            [fa("Tiggo 8 SH", "Chery Tiggo 8 Super Hybrid"), "PHEV, 7 plazas", "120 km", precio("Chery Tiggo 8 Super Hybrid")],
            [fa("Hunter REEV", "Changan Hunter REEV"), "REEV, pickup", "100 km", precio("Changan Hunter REEV")],
            [fa("Z9", "DongFeng Z9 PHEV"), "PHEV, pickup 4x4", "135 km", precio("DongFeng Z9")],
            [fa("Tiggo 9 SH", "Chery Tiggo 9 Super Hybrid"), "PHEV", "140 km", precio("Chery Tiggo 9 Super Hybrid")],
            [fa("G318", "Deepal G318"), "Súper híbrido 4x4", "1.100 km combinados (NEDC)", precio("Deepal G318")],
        ], NOTA_PRECIOS),
        p(f"Los comparamos uno por uno en {a(P_PHEV, 'el mejor híbrido enchufable de Ecuador')} y explicamos el "
          f"sistema de Changan en {a(P_REEV, 'qué es un REEV')}. Los Deepal S05 y S07 existen también con rango "
          "extendido; sus «desde» del catálogo corresponden a la versión eléctrica."),

        h2("Híbridos ligeros: ahorran poco, cuestan poco"),
        p("Un híbrido ligero (MHEV) agrega un pequeño motor eléctrico de 48 voltios que ayuda al arrancar y "
          "permite apagar el motor en los semáforos. No mueve el auto por sí solo de forma sostenida. El ahorro "
          "de combustible es menor que en un HEV, pero el precio también."),
        ul([
            f"{fa('Tiggo 4 Pro', 'Chery Tiggo 4 Pro')} ({precio('Chery Tiggo 4 Pro')}): 1.5 turbo de 145 HP, motor eléctrico de 10 HP y caja CVT.",
            f"{fa('Tiggo 7 Pro Max', 'Chery Tiggo 7 Pro Max')} ({precio('Chery Tiggo 7 Pro Max')}): 1.5 de 155 HP con sistema mild hybrid y CVT.",
            f"{fa('Fiat 600', 'Fiat 600 Hybrid')} ({precio('Fiat 600 Hybrid')}): motor T-Gen3 turbo de 3 cilindros con batería de 48 V, 107 HP combinados.",
            f"{fa('Avenger', 'Jeep Avenger e-Hybrid')} ({precio('Jeep Avenger')}): 1.2 turbo, 48 V, hasta 100 CV y caja automática de doble embrague de 6 marchas.",
            f"{fa('CX-90', 'Mazda CX-90')} ({precio('Mazda CX-90')}): 3.3 turbo de seis cilindros con M-Hybrid Boost de 48 V y tracción AWD.",
        ]),
        p(f"El catálogo incluye además el {fa('Arkana', 'Renault Arkana')} 1.3 turbo «Hybrid» desde {precio('Renault Arkana')} y el "
          f"Renault Koleos E-Tech desde {precio('Renault Koleos')}. Pida al asesor el tipo exacto de sistema de cada versión antes "
          "de comparar consumos."),

        h2("Qué híbrido conviene según dónde y cómo maneja"),
        ul([
            "<strong>Ciudad con tráfico, como el centro de Ibarra o Quito:</strong> el híbrido completo rinde mejor que "
            "en carretera, porque recupera energía en cada frenada. Y tiene ventajas en la restricción vehicular, "
            f"como explicamos en {a(P_PICO, 'pico y placa para híbridos')}.",
            "<strong>Trayectos diarios cortos y parqueadero en casa:</strong> un enchufable o un REEV hace casi todo en "
            "eléctrico y guarda la gasolina para los viajes.",
            "<strong>Viajes frecuentes por la Panamericana hacia Tulcán o Quito:</strong> en carretera constante el "
            "ahorro del HEV baja. Un enchufable con batería llena aprovecha las bajadas para regenerar.",
            "<strong>Presupuesto ajustado:</strong> un híbrido ligero da caja automática y algo de ahorro por poco más "
            f"que un auto a gasolina. La lista por precio está en {a(P_SUV_HIB, 'los mejores SUV híbridos y eléctricos')}.",
        ]),
        p("La altura juega a favor: el motor eléctrico entrega la misma fuerza a 2.200 que a nivel del mar, "
          "mientras que un motor a gasolina atmosférico pierde potencia al subir."),

        quote("Casi nadie viene preguntando por un híbrido ligero, y muchos se van con uno. Lo que decide no es "
              "la sigla sino cuántos kilómetros hace al día y si tiene dónde enchufar."),

        h2("Cuándo un auto híbrido NO le conviene"),
        ul([
            "Hace casi todo su recorrido en carretera a velocidad constante y pocos kilómetros al año: el sobreprecio "
            "tarda mucho en pagarse.",
            "Necesita una camioneta de trabajo pesado con diésel y repuestos en cualquier pueblo de la ruta.",
            "Va a comprar un enchufable y no tiene dónde cargarlo: termina pagando una batería grande que usa poco.",
        ]),
        p(f"Si quiere hacer las cuentas con su recorrido, revise {a(P_AHORRO_HIB, 'el ahorro real de un auto híbrido')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuál es el auto híbrido más barato de Ecuador?",
             f"En nuestro catálogo, el Chery Tiggo 4 Pro, desde {precio('Chery Tiggo 4 Pro')}, con sistema mild hybrid. "
             f"El híbrido completo más barato es el Jaecoo J5 SHS, desde {precio('Jaecoo J5 SHS')}."),
            ("¿Cuánto dura la batería de un híbrido?",
             f"Las marcas la garantizan por años y kilómetros, y suele durar más que eso. Lo detallamos en "
             f"{a(P_BATERIA, 'cuánto dura la batería de un híbrido')}."),
            ("¿El mantenimiento de un híbrido es más caro?",
             f"No necesariamente: los frenos duran más y el motor trabaja menos. Hay revisiones propias del sistema "
             f"eléctrico; los costos están en {a(P_MANT_HIB, 'mantenimiento de híbridos')}."),
            ("¿Qué marcas de autos híbridos hay en Ecuador?",
             "Toyota, Nissan, Chery, Omoda | Jaecoo, DongFeng, Changan, Deepal, Fiat, Jeep, Renault y Mazda, entre "
             "las que vendemos; en el mercado hay otras como Hyundai, Kia o BYD."),
        ]),
        CIERRE,
    ]
    guarda(dict(
        n=15,
        title="Autos híbridos en Ecuador 2026: tipos, modelos y precios",
        slug="autos-hibridos-ecuador",
        categories=[58],
        excerpt="Los autos híbridos que se venden en Ecuador ordenados por tipo —ligero, completo, enchufable y "
                "de rango extendido— con precio, datos de ficha y cuál conviene según cómo maneja.",
        meta={"_yoast_wpseo_title": "Autos híbridos en Ecuador 2026: modelos y precios",
              "_yoast_wpseo_metadesc": "Desde $19.990: híbridos ligeros, completos, enchufables y de rango "
                                       "extendido con precio y datos de ficha, y cuál conviene según dónde "
                                       "maneja y carga.",
              "_yoast_wpseo_focuskw": "autos híbridos ecuador"},
        fuentes=[SRC_CHERY_T4, SRC_CHERY_T7PM, SRC_OJ, SRC_OJ_J5, SRC_OJ_J7, SRC_OJ_C5, SRC_JEEP, CH_MAGE, CH_HUGE,
                 CH_Z9, CH_FIAT600, CH_COROLLA_HV, CH_YARIS_CROSS, CH_COROLLA_CROSS, CH_RAV4, CH_XTRAIL, CH_ARKANA,
                 CH_KOLEOS, CH_CX90, CH_G318, P_PHEV, P_CSH, P_SUV_HIB],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# 16. Los híbridos más baratos
# ════════════════════════════════════════════════════════════════════════════════════
def hibridos_baratos():
    c = [
        p("Un híbrido barato en Ecuador cuesta hoy lo mismo que una SUV compacta a gasolina de gama media. "
          "La diferencia está en qué recibe a cambio: algunos de los más económicos son híbridos completos con "
          "más de 200 HP, y otros son híbridos ligeros que ahorran poco pero traen caja automática a precio de "
          "manual."),
        p("Aquí van los diez híbridos más baratos del catálogo de Comercial Hidrobo, de menor a mayor precio, "
          "con lo que trae cada uno según su ficha oficial y lo que se sacrifica al elegir el de menor valor. "
          f"Para la visión completa de tecnologías y gamas, revise {a(L(EV + 'autos-electricos-en-ecuador-2025/'), 'la guía de eléctricos e híbridos')}."),

        h2("Los 10 híbridos más baratos de Ecuador en 2026"),
        table(["#", "Modelo", "Tipo", "Precio desde"], [
            ["1", fa("Tiggo 4 Pro", "Chery Tiggo 4 Pro"), "Híbrido ligero 48 V", precio("Chery Tiggo 4 Pro")],
            ["2", fa("J5", "Jaecoo J5 SHS"), "Híbrido completo", precio("Jaecoo J5 SHS")],
            ["3", fa("Mage", "DongFeng Mage Hybrid"), "Híbrido completo", precio("DongFeng Mage")],
            ["4", fa("C5", "Omoda C5 SHS"), "Híbrido completo", precio("Omoda C5 SHS")],
            ["5", fa("Tiggo 7 Pro Max", "Chery Tiggo 7 Pro Max"), "Híbrido ligero", precio("Chery Tiggo 7 Pro Max")],
            ["6", fa("CS55 R-EV", "Changan CS55 R-EV"), "Rango extendido (se enchufa)", precio("Changan CS55 R-EV")],
            ["7", fa("Huge", "DongFeng Huge"), "Híbrido completo", precio("DongFeng Huge")],
            ["8", fa("J7", "Jaecoo J7 SHS"), "Híbrido enchufable", precio("Jaecoo J7 SHS")],
            ["9", fa("Fiat 600", "Fiat 600 Hybrid"), "Híbrido ligero 48 V", precio("Fiat 600 Hybrid")],
            ["10", fa("Avenger", "Jeep Avenger e-Hybrid"), "Híbrido ligero 48 V", precio("Jeep Avenger")],
        ], NOTA_PRECIOS),
        p("La lista llega a los $28.500. Justo por encima quedan el Renault Arkana híbrido "
          f"({precio('Renault Arkana')}) y el {fa('Corolla HV', 'Toyota Corolla HV')} ({precio('Toyota Corolla HV')}), el híbrido completo más barato de Toyota."),

        h2("Del 1 al 5: por debajo de $25.000"),
        h3(f"Chery Tiggo 4 Pro, {precio('Chery Tiggo 4 Pro')}"),
        p("El más barato de la lista y el único SUV con algo de hibridación por debajo de los $20.000. Según "
          "Chery Ecuador, lleva un 1.5 turbo de 145 HP, un motor eléctrico de 10 HP con batería de litio de 48 V "
          "y caja automática CVT. Es un híbrido ligero: el motor eléctrico ayuda, no mueve el auto solo."),
        h3(f"Jaecoo J5 SHS, {precio('Jaecoo J5 SHS')}"),
        p("El híbrido completo más económico del catálogo. Omoda | Jaecoo Ecuador lo describe con motor 1.5 TGDI "
          "ACTECO y batería de 1,83 kWh que se recarga sola. Es un SUV de estética todoterreno pensado para la "
          "ciudad y la carretera, con una cabina que la marca promociona como apta para mascotas."),
        h3(f"DongFeng Mage Hybrid, {precio('DongFeng Mage')}"),
        p("El que más potencia entrega por dólar: 288 HP y 565 Nm con transmisión híbrida DHT, y más de 1.000 km "
          "por tanque según la ficha. Existe en versión 100 % eléctrica por mil dólares más; la diferencia la "
          f"explicamos en {a(P_MAGE_VS, 'Mage eléctrica o híbrida')}."),
        h3(f"Omoda C5 SHS, {precio('Omoda C5 SHS')}"),
        p("Mismo precio que el Mage y mismo tipo de sistema. La ficha oficial declara 221 HP combinados, 290 Nm, "
          "batería de 1,83 kWh, transmisión híbrida dedicada y tracción delantera. Su fuerte es el diseño y el "
          "equipamiento interior."),
        h3(f"Chery Tiggo 7 Pro Max, {precio('Chery Tiggo 7 Pro Max')}"),
        p("Una SUV mediana con sistema mild hybrid, 155 HP y CVT, según Chery Ecuador. Para quien necesita más "
          "espacio que el del Tiggo 4 Pro y prefiere no subir a un enchufable."),

        cta_temprano("¿Duda entre un híbrido ligero y uno completo?",
                     "Cuéntenos cuántos kilómetros hace al mes y por dónde maneja, y le decimos cuál se paga solo "
                     "en su caso.",
                     "Consultar por WhatsApp",
                     "Hola, vengo del artículo de los híbridos más baratos de Ecuador. Quisiera ayuda para "
                     "elegir entre un híbrido ligero y uno completo.", reserva=False),

        h2("Del 6 al 10: entre $25.000 y $28.500"),
        p(f"El {fa('CS55 R-EV', 'Changan CS55 R-EV')} es el auto que se enchufa más barato del país: rango extendido, "
          "98 km reales en ciudad y más de 1.200 km de autonomía combinada. El DongFeng Huge, por poco más, es un "
          "híbrido completo de 241 HP y caja automática. El Jaecoo J7 SHS ya es enchufable de verdad: 341 HP "
          "combinados, batería de 18,3 kWh y 90 km eléctricos en ciclo WLTP, según su ficha oficial."),
        p("Cierran la lista dos europeos con hibridación ligera de 48 V: el Fiat 600 Hybrid, con motor turbo de "
          "tres cilindros y 107 HP combinados, y el Jeep Avenger e-Hybrid, con 1.2 turbo, hasta 100 CV y caja "
          "automática de doble embrague, en versiones Altitude y Summit."),

        h2("Lo que se pierde al ir al más barato"),
        ul([
            "<strong>Ahorro real.</strong> Un híbrido ligero gasta algo menos que su par a gasolina; un híbrido completo "
            "puede gastar bastante menos en ciudad. La diferencia de precio entre el Tiggo 4 Pro y el J5 SHS es de "
            "$2.000.",
            "<strong>Modo eléctrico.</strong> Solo los completos y los enchufables avanzan sin encender el motor a "
            "gasolina en el tráfico lento.",
            "<strong>Beneficios de circulación.</strong> Los incentivos y excepciones para híbridos dependen del tipo de "
            "sistema. Confirme en cada ciudad si un híbrido ligero entra.",
            f"<strong>Garantía de batería.</strong> Cambia entre marcas. Compárelas con {a(P_BATERIA, 'esta guía de baterías')}.",
        ]),
        p("En la sierra norte, con subidas largas como la de Ibarra hacia Tulcán, el motor eléctrico de un híbrido "
          "completo ayuda justo donde el motor a gasolina más sufre por la altura. Ese detalle pesa más que la "
          "diferencia de precio en muchos casos."),

        h2("Cómo elegir entre los diez en tres preguntas"),
        ol([
            "<strong>¿Tiene dónde enchufar en casa?</strong> Si la respuesta es sí y su recorrido diario es corto, "
            "mire primero el CS55 R-EV y el J7 SHS. Si no, descarte esos dos.",
            "<strong>¿Maneja sobre todo en ciudad?</strong> Entonces un híbrido completo (J5, Mage, C5 o Huge) "
            "aprovecha cada frenada. Si casi todo es carretera, un híbrido ligero rinde parecido y cuesta menos.",
            "<strong>¿Cuánto espacio necesita?</strong> Para dos o tres personas basta un compacto como el Tiggo 4 "
            "Pro o el Fiat 600. Para familia con maletas, el Tiggo 7 Pro Max o el Huge.",
        ]),

        quote("El más barato no siempre es el que menos gasta. Por dos mil dólares más, un híbrido completo "
              "suele devolver la diferencia en combustible antes de que termine de pagar el crédito."),

        h2("Cuándo un híbrido barato NO le conviene"),
        p("Si maneja menos de 8.000 km al año, casi siempre en carretera, el ahorro de combustible de cualquier "
          "híbrido de esta lista es pequeño y un auto a gasolina con caja automática puede salirle mejor. Y si "
          "puede cargar en casa y hace menos de 60 km al día, un enchufable como el CS55 R-EV o el J7 SHS rinde "
          "mucho más que un híbrido completo de precio parecido."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuál es el híbrido completo más barato de Ecuador?",
             f"En nuestro catálogo, el Jaecoo J5 SHS, desde {precio('Jaecoo J5 SHS')}. Le siguen el DongFeng Mage Hybrid y "
             f"el Omoda C5 SHS, ambos desde {precio('DongFeng Mage')}."),
            ("¿Un híbrido ligero es un híbrido de verdad?",
             "Tiene un motor eléctrico y una batería, pero no mueve el auto solo de forma sostenida. Ahorra menos "
             f"que un híbrido completo. La diferencia está en {a(P_SIGLAS, 'las siglas explicadas')}."),
            ("¿Se puede financiar un híbrido?",
             f"Sí, con los mismos planes que un auto a gasolina. Revise las opciones en {a(FINANCIAMIENTO, 'financiamiento en Comercial Hidrobo')}."),
            ("¿Qué híbrido barato tiene más potencia?",
             "El DongFeng Mage Hybrid, con 288 HP declarados, seguido del DongFeng Huge con 241 HP y el Omoda C5 "
             "SHS con 221 HP combinados."),
        ]),
        CIERRE,
    ]
    guarda(dict(
        n=16,
        title="Los híbridos más baratos de Ecuador en 2026: los 10 primeros, con precio",
        slug="hibridos-mas-baratos-ecuador",
        categories=[58],
        excerpt="Los diez híbridos más baratos que se venden en Ecuador, de $19.990 a $28.499, con el tipo de "
                "sistema de cada uno y lo que se sacrifica al elegir el de menor precio.",
        meta={"_yoast_wpseo_title": "Los híbridos más baratos de Ecuador en 2026",
              "_yoast_wpseo_metadesc": "Diez híbridos desde $19.990, ordenados por precio: cuáles son ligeros, "
                                       "cuáles completos o enchufables, y qué se pierde al elegir el de menor "
                                       "valor.",
              "_yoast_wpseo_focuskw": "híbridos más baratos ecuador"},
        fuentes=[SRC_CHERY_T4, SRC_CHERY_T7PM, SRC_OJ_J5, SRC_OJ_J7, SRC_OJ_C5, SRC_JEEP, CH_MAGE, CH_HUGE,
                 CH_FIAT600, P_PHEV, P_MAGE_VS],
        content="\n\n".join(c),
    ))


CHP = lambda r: L(r)  # páginas de modelo del sitio, usadas como fuente
P_PRESUPUESTO = L("/autos-nuevos/auto-ideal-segun-tu-presupuesto/")
P_SUV_COMPACTO = L("/suv/suv-compacto-ecuador-2025/")
P_SIN_ENTRADA = L("/financiacion-y-tramites/financiamiento-automotriz-sin-entrada-ecuador-2026/")
P_DUSTER_T4 = L("/comparativas-y-decisiones-inteligentes/renault-duster-vs-chery-tiggo-4-pro/")
P_T2_DUSTER = L("/comparativas-y-decisiones-inteligentes/chery-tiggo-2-pro-max-vs-renault-duster/")
P_UTILITARIOS = L("/estilo-de-vida-y-perfil-del-conductor/autos-utilitarios-comerciales-emprendedores-ecuador/")
P_CONSUMO_CAM = L("/consejos/camionetas-con-mejor-consumo-de-combustible/")
P_RICH6 = L("/dongfeng/dongfeng-rich-6-pro-ecuador-pickup/")
P_HUNTER_PLUS = L("/autos-nuevos/changan-hunter-plus-2026-ecuador/")
P_Z9_HUNTER = L("/comparativas-y-decisiones-inteligentes/dongfeng-z9-phev-vs-changan-hunter-reev/")
P_FRONTIER = L("/consejos/nissan-frontier-ecuador/")
P_CONTADO = L("/financiamiento-y-costos/comprar-al-contado-o-a-credito-ventajas-desventajas/")


# ════════════════════════════════════════════════════════════════════════════════════
# 34. Carros nuevos por menos de $20.000
# ════════════════════════════════════════════════════════════════════════════════════
def menos_20000():
    c = [
        p("Con $20.000 en Ecuador todavía se compra un carro nuevo, con garantía de fábrica y taller "
          "autorizado cerca. Lo que cambia es qué se lleva: por ese dinero hay sedanes, SUV compactas, dos "
          "eléctricos y hasta vehículos de trabajo, pero casi todos con caja manual y motores de entre 1.0 y "
          "1.5 litros."),
        p("Esta lista reúne los modelos del catálogo de Comercial Hidrobo que cuestan menos de $20.000, "
          "agrupados por tipo, con los datos de su ficha y para quién sirve cada uno. Todos se pueden ver en "
          f"nuestras agencias de {SEDES}."),

        h2("Qué carros nuevos cuestan menos de $20.000"),
        p(f"Son 16 modelos. El más barato es el Renault Kwid, desde {precio('Renault Kwid')}, y en el límite quedan "
          f"la Renault Duster, el Chery Tiggo 4 Pro y dos eléctricos, todos desde $19.990. El Toyota Raize, desde "
          f"{precio('Toyota Raize')}, queda justo en la línea."),
        table(["Modelo", "Tipo", "Precio desde"], [
            [fa("Kwid", "Renault Kwid"), "Compacto urbano", precio("Renault Kwid")],
            [fa("V3", "Changan V3"), "Sedán", precio("Changan V3")],
            [fa("Star Truck", "Changan Star Truck"), "Camión ligero de carga", precio("Changan Star Truck")],
            [fa("Arrizo 5 Pro Max", "Chery Arrizo 5 Pro Max"), "Sedán", precio("Chery Arrizo 5 Pro Max")],
            [fa("Agya", "Toyota Agya"), "Hatchback", precio("Toyota Agya")],
            [fa("Alsvin Plus", "Changan Alsvin Plus"), "Sedán", precio("Changan Alsvin Plus")],
            [fa("U5 Plus", "BAIC U5 Plus"), "Sedán", precio("BAIC U5 Plus")],
            [fa("X35", "BAIC X35"), "SUV compacta", precio("BAIC X35")],
            [fa("M60", "Changan M60"), "Van de carga", precio("Changan M60")],
            [fa("Honor S", "Changan Honor S"), "Van de carga", precio("Changan Honor S")],
            [fa("CS15", "Changan CS15"), "SUV compacta", precio("Changan CS15")],
            [fa("Tiggo 2 Pro Max", "Chery Tiggo 2 Pro Max"), "SUV compacta", precio("Chery Tiggo 2 Pro Max")],
            [fa("Duster", "Renault Duster"), "SUV", precio("Renault Duster")],
            [fa("Tiggo 4 Pro", "Chery Tiggo 4 Pro"), "SUV híbrida ligera", precio("Chery Tiggo 4 Pro")],
            [fa("Nevo Q05", "Changan Nevo Q05"), "SUV 100 % eléctrica", precio("Changan Nevo Q05")],
            [fa("E5", "Omoda E5 Next"), "SUV eléctrica", precio("Omoda E5 Next")],
        ], NOTA_PRECIOS),

        h2("Sedanes y compactos: el menor costo por kilómetro"),
        p("Si el auto es para ir al trabajo en Ibarra, hacer trámites en Otavalo y viajar de vez en cuando a "
          "Quito, un sedán o un compacto cumple y cuesta menos de mantener."),
        ul([
            f"<strong>Renault Kwid ({precio('Renault Kwid')}).</strong> Motor 1.0 y caja manual en la versión de entrada; "
            "el catálogo tiene también una Intens con caja CVT. Es el más barato y el más pequeño.",
            f"<strong>Toyota Agya ({precio('Toyota Agya')}).</strong> 1.2 de tres cilindros, 87 HP y caja manual de cinco "
            "marchas, según su ficha. La opción para quien quiere marca japonesa con el menor presupuesto.",
            f"<strong>Chery Arrizo 5 Pro Max ({precio('Chery Arrizo 5 Pro Max')}).</strong> Chery Ecuador declara un 1.5 de "
            "114 HP, caja manual de cinco y cadena de distribución. Es el sedán con más espacio de este grupo.",
            f"<strong>BAIC U5 Plus ({precio('BAIC U5 Plus')}).</strong> 1.5 de 111 HP, caja manual y maletero de 430 litros.",
            f"<strong>Changan Alsvin Plus y V3 ({precio('Changan V3')} a {precio('Changan Alsvin Plus')}).</strong> Sedanes con "
            "control de estabilidad y cámara de retro; el Alsvin Plus suma cuatro airbags.",
        ]),

        h2("SUV por menos de $20.000"),
        p("Es el grupo que más se cotiza. La altura extra ayuda con los rompevelocidades, el adoquín y las "
          f"entradas a fincas. Comparamos varias en {a(P_SUV_COMPACTO, 'SUV compactas en Ecuador')}."),
        ul([
            f"<strong>BAIC X35 ({precio('BAIC X35')}).</strong> 1.5 de 114 HP con caja manual en la versión de entrada; "
            "existe una automática CVT con motor turbo a mayor precio.",
            f"<strong>Changan CS15 ({precio('Changan CS15')}).</strong> 1.5 de 105 HP, manual de cinco marchas en todas "
            "sus versiones y asistencia de arranque en pendiente.",
            f"<strong>Chery Tiggo 2 Pro Max ({precio('Chery Tiggo 2 Pro Max')}).</strong> 1.5 de 114 HP y manual de cinco, "
            "según Chery Ecuador; hay versión CVT más arriba en precio.",
            f"<strong>Renault Duster ({precio('Renault Duster')}).</strong> La versión Zen lleva el 1.6 con caja manual; "
            f"las automáticas y 4x4 cuestan más. La enfrentamos al Tiggo 4 Pro en {a(P_DUSTER_T4, 'Duster vs Tiggo 4 Pro')}.",
            f"<strong>Chery Tiggo 4 Pro ({precio('Chery Tiggo 4 Pro')}).</strong> La única con caja automática desde la "
            "versión de entrada: 1.5 turbo de 145 HP, sistema mild hybrid de 48 V y CVT.",
        ]),

        cta_temprano("¿Su presupuesto está cerca de los $20.000?",
                     "Díganos para qué usará el carro y le armamos una comparación de dos o tres modelos con "
                     "el valor de la cuota.",
                     "Pedir comparación por WhatsApp",
                     "Hola, vengo del artículo de carros nuevos por menos de $20.000. Quisiera una "
                     "comparación de modelos y el valor de la cuota.", reserva=False),

        h2("Dos eléctricos dentro del presupuesto"),
        p(f"El {fa('Nevo Q05', 'Changan Nevo Q05')} es un SUV 100 % eléctrico: su ficha indica 161 HP y batería de "
          "40,3 kWh en la versión de entrada, con selector electrónico en lugar de palanca. El Omoda E5 Next "
          "también es eléctrico según Omoda | Jaecoo Ecuador, con batería de litio ferrofosfato y garantía de "
          "8 años o 150.000 km; confirme con el asesor la versión que corresponde a ese precio."),
        p(f"Un eléctrico pide un lugar para cargar en casa. Si no lo tiene, lea antes {a(P_EV_BARATO, 'el auto eléctrico más barato de Ecuador')}."),

        h2("Para trabajar: camión ligero y vans"),
        p("Tres vehículos de trabajo entran en el rango, pensados para negocio más que para familia. La "
          "Changan Star Truck es un camión ligero de dos plazas con caja de hasta 1,7 m³. Las vans Changan "
          "M60 y Honor S cargan 825 kg y 590 kg respectivamente, según sus fichas. Si su negocio reparte en "
          f"Ibarra o entre Cayambe y Tabacundo, revise {a(P_UTILITARIOS, 'autos utilitarios para emprendedores')}."),

        h2("Seguridad: lo que conviene revisar en este rango"),
        p("A este precio la diferencia entre modelos está en los airbags y en el control de estabilidad. El "
          "Arrizo 5 Pro Max y el Tiggo 4 Pro declaran seis airbags; el Tiggo 2 Pro Max y el Alsvin Plus, cuatro. "
          "Pregunte siempre por el control de estabilidad y la asistencia de arranque en pendiente: en las calles "
          "empinadas de Ibarra se usan todos los días."),

        quote("Por menos de veinte mil, la pregunta que más pesa no es la marca sino la caja. Casi todo es "
              "manual; el que necesita automático tiene que mirar dos o tres modelos, no veinte."),

        h2("Cuándo un carro de menos de $20.000 NO le conviene"),
        ul([
            "Lleva a cinco personas con equipaje en viajes largos con frecuencia: los motores de 1.0 a 1.5 sin "
            "turbo se quedan cortos cargados en las subidas de la sierra.",
            "Necesita caja automática y no quiere un híbrido ligero ni un eléctrico: casi todas las automáticas "
            "están por encima de este precio.",
            "Recorre caminos de tierra a diario: ninguno de estos modelos tiene tracción 4x4.",
        ]),
        p(f"Para ver qué entra en cada rango de precio, revise {a(P_PRESUPUESTO, 'el auto ideal según su presupuesto')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuál es el carro nuevo más barato de Ecuador en 2026?",
             f"En nuestro catálogo, el Renault Kwid, desde {precio('Renault Kwid')}. Le siguen el Changan V3 y la Star Truck."),
            ("¿Hay carros automáticos por menos de $20.000?",
             "Pocos. En este rango el Chery Tiggo 4 Pro trae CVT desde la versión de entrada, y los eléctricos "
             "Nevo Q05 y E5 Next no tienen caja de cambios manual."),
            ("¿Se pueden financiar sin entrada?",
             f"Depende del perfil y de la entidad. Lo explicamos en {a(P_SIN_ENTRADA, 'financiamiento sin entrada')}."),
            ("¿Qué SUV conviene por menos de $20.000?",
             "Para ciudad con tráfico, el Tiggo 4 Pro por su caja automática. Para caminos con adoquín y "
             "subidas, la Duster por su despeje. Para el menor precio, la BAIC X35."),
        ]),
        CIERRE,
    ]
    guarda(dict(
        n=34,
        title="Carros nuevos por menos de $20.000 en Ecuador 2026: los 16 que hay",
        slug="carros-nuevos-menos-de-20000-ecuador",
        categories=[43],
        excerpt="Sedanes, SUV, eléctricos y vehículos de trabajo nuevos por menos de $20.000, con ficha, precio "
                "desde y para quién sirve cada uno.",
        meta={"_yoast_wpseo_title": "Carros nuevos por menos de $20.000 en Ecuador 2026",
              "_yoast_wpseo_metadesc": "Desde $13.990: sedanes, SUV compactas, dos eléctricos y vans de trabajo "
                                       "con garantía y taller en el norte del país, con lo que trae cada uno "
                                       "de serie.",
              "_yoast_wpseo_focuskw": "carros nuevos por menos de 20000"},
        fuentes=[SRC_CHERY_T4, SRC_CHERY_T2, SRC_CHERY_A5, SRC_OJ_E5, CHP("/reanult/renault-kwid/"),
                 CHP("/toyota/toyota-agya/"), CHP("/changan/baic-us-plus/"), CHP("/changan/baic-x35/"),
                 CHP("/changan/cs15/"), CHP("/reanult/renault-duster/"), CHP("/changan/changan-nevo-q05-ev/"),
                 CHP("/changan/changan-alsvin-plus/"), CHP("/changan/changan-v3/"), CHP("/changan/changan-star-truck/"),
                 CHP("/changan/changan-m60/"), CHP("/changan/changan-honor-s/")],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# 35. Camionetas doble cabina más baratas
# ════════════════════════════════════════════════════════════════════════════════════
def doble_cabina():
    c = [
        p("La camioneta doble cabina es el vehículo de trabajo y de familia del norte del Ecuador: lleva cinco "
          "personas a la finca el domingo y quintales al mercado el lunes. Y es también el segmento donde más "
          "confunde el precio publicado, porque el «desde» de varias marcas corresponde a una versión con "
          "motor a gasolina, tracción 4x2 o incluso cabina simple."),
        p("Aquí ordenamos las camionetas del catálogo de Comercial Hidrobo de menor a mayor precio, con el "
          "motor, la caja y la tracción que trae la versión de entrada según su ficha, y le decimos qué preguntar "
          "antes de comparar precios entre marcas."),

        h2("Las camionetas doble cabina más baratas de 2026"),
        p(f"La de menor precio es la RAM 700, desde {precio('RAM 700')}, una pickup compacta. Entre las medianas, "
          f"la más barata es la DongFeng Rich 6 Pro, desde {precio('DongFeng Rich 6 Pro')}, y en diésel la Foton "
          f"Tunland G7, desde {precio('Foton Tunland G7')}."),
        table(["Camioneta", "Versión de entrada según su ficha", "Precio desde"], [
            [fa("RAM 700"), "Pickup compacta; SLT y Big Horn doble cabina, 5 ocupantes", precio("RAM 700")],
            [fa("Rich 6", "DongFeng Rich 6 Pro"), "Gasolina 2.4, 156 HP, manual 5, 4x2", precio("DongFeng Rich 6 Pro")],
            [fa("Tunland G7", "Foton Tunland G7"), "Diésel 2.0, 160 HP, manual 6, 4x2", precio("Foton Tunland G7")],
            [fa("Hunter", "Changan Hunter"), "Doble cabina 4x2", precio("Changan Hunter")],
            [fa("Rich 7", "DongFeng Rich 7"), "Diésel 2.3 turbo VGT, 163 HP, manual 6, 4x2", precio("DongFeng Rich 7")],
            [fa("Tunland V7", "Foton Tunland V7"), "Diésel 2.0 mild hybrid 48 V, 161 HP, manual 6, 4x2", precio("Foton Tunland V7")],
            [fa("Tunland G9", "Foton Tunland G9"), "Diésel 2.0, 160 HP, manual 6, 4x4", precio("Foton Tunland G9")],
            [fa("Hilux", "Toyota Hilux"), "Diésel; confirme cabina y tracción", precio("Toyota Hilux")],
            [fa("Hunter REEV", "Changan Hunter REEV"), "Rango extendido, 268 HP, 4x4", precio("Changan Hunter REEV")],
            [fa("Z9", "DongFeng Z9 PHEV"), "Híbrida enchufable, 4x4 automática", precio("DongFeng Z9")],
        ], NOTA_PRECIOS),
        p(f"Por encima quedan la Foton Tunland V9 ({precio('Foton Tunland V9')}), la Nissan Frontier ({precio('Nissan Frontier')}), "
          f"la Mazda BT-50 ({precio('Mazda BT-50')}) y la RAM 1500 ({precio('RAM 1500')})."),

        h2("Cómo leer el «desde» de una camioneta"),
        p("Dos camionetas con el mismo precio publicado pueden ser vehículos muy distintos. Antes de comparar, "
          "pregunte estas cuatro cosas de la versión exacta que le cotizan:"),
        ol([
            "<strong>Cabina.</strong> Simple, doble o extendida. En algunas marcas el precio más bajo es de cabina simple.",
            "<strong>Combustible.</strong> Gasolina o diésel. La Rich 6 Pro, por ejemplo, arranca en gasolina y sus "
            "versiones diésel cuestan más.",
            "<strong>Tracción.</strong> 4x2 o 4x4. Dentro de la misma marca, la 4x4 siempre es una versión más cara.",
            "<strong>Caja.</strong> Manual o automática. Casi todas las versiones de entrada son manuales.",
        ]),

        h2("Gasolina, diésel o electrificada"),
        ul([
            "<strong>Gasolina:</strong> más barata de comprar y de mantener, menos torque para carga. Sirve para uso "
            "mixto con poca carga, como la RAM 700 o la Rich 6 Pro de entrada.",
            "<strong>Diésel:</strong> más torque desde bajas vueltas, mejor para carga y subidas largas. La Rich 7 declara "
            "420 Nm y 1.005 kg de carga; la Tunland G7, 390 Nm.",
            "<strong>Diésel con hibridación ligera:</strong> las Tunland V7 y V9 suman un sistema de 48 V al motor 2.0 "
            "diésel, con 450 Nm según su ficha.",
            "<strong>Electrificada:</strong> la Hunter REEV y la Z9 PHEV se enchufan y hacen unos 100 y 135 km en "
            f"eléctrico. Las comparamos en {a(P_Z9_HUNTER, 'Z9 PHEV o Hunter REEV')}.",
        ]),

        cta_temprano("¿Necesita la camioneta para trabajo o para familia?",
                     "Cuéntenos cuánto carga y por dónde maneja, y le cotizamos la versión exacta: cabina, "
                     "tracción y caja.",
                     "Cotizar camioneta por WhatsApp",
                     "Hola, vengo del artículo de camionetas doble cabina baratas. Quisiera cotizar una "
                     "camioneta y saber qué versión me conviene.", reserva=False),

        h2("4x2 o 4x4 en Imbabura y Carchi"),
        p("Para la Panamericana, la ciudad y caminos lastrados en verano, una 4x2 con buen despeje alcanza. La "
          "4x4 se justifica en caminos de tierra con lluvia, como los accesos a las comunidades de Cotacachi o a "
          "las fincas de la zona de Mira y El Ángel, y cuando se arrastra carga en pendiente. Suma costo de "
          f"compra y de mantenimiento: lo explicamos en {a(L('/cuidado-del-vehiculo-y-mantenimiento/mantenimiento-auto-zonas-rurales/'), 'mantenimiento para zonas rurales')}."),
        p(f"Si ya decidió el uso, hay análisis de modelo en {a(P_RICH6, 'la Rich 6 Pro')}, {a(P_HUNTER_PLUS, 'la Hunter')} y "
          f"{a(P_HILUX, 'la Hilux')}."),

        h2("Lo que no se ve en el precio"),
        ul([
            "<strong>Consumo.</strong> Una diésel de 2.0 a 2.3 litros gasta menos que una gasolina de 2.4 cargada. "
            f"Más detalle en {a(P_CONSUMO_CAM, 'camionetas con mejor consumo')}.",
            "<strong>Valor de reventa.</strong> Las marcas con más años en el país se deprecian menos; las chinas "
            "compensan con más equipamiento por el mismo dinero.",
            "<strong>Repuestos en ruta.</strong> Si trabaja lejos de Ibarra o Tulcán, pregunte por la disponibilidad de "
            "filtros y pastillas para su modelo.",
        ]),

        h2("Carga y remolque: lo que dicen las fichas"),
        p("Si la camioneta va a trabajar, la capacidad de carga pesa más que la potencia. Estos son los datos "
          "publicados en las fichas de las versiones que los declaran:"),
        ul([
            "DongFeng Rich 7 diésel: 1.005 kg de carga, y 3 toneladas de arrastre en las versiones 4x4.",
            "DongFeng Rich 6 diésel: una tonelada de carga.",
            "DongFeng Z9 diésel: 1.000 kg de carga en la manual y 3.000 kg de remolque en la automática.",
            "Changan Hunter REEV: 800 kg de carga útil con tres modos de tracción (2WD, 4WD alta y baja).",
        ]),
        p("Cargar cerca del máximo todos los días acorta la vida de embrague, frenos y suspensión. Si ese es su "
          "caso, deje un margen de al menos un 20 % entre lo que carga y lo que declara la ficha."),

        h2("Qué probar en la prueba de manejo"),
        ol([
            "Suba una cuesta real con dos o tres personas a bordo; en Ibarra sobran opciones.",
            "Revise el espacio de la segunda fila con adultos sentados; mirarla con la puerta abierta engaña.",
            "Mida el balde si va a llevar carga específica, como cajas de flores o quintales.",
            "Pregunte cada cuántos kilómetros es el mantenimiento y qué incluye el primero.",
        ]),

        quote("El cliente compara dos camionetas por el precio de la publicidad y después descubre que una era "
              "cabina simple y gasolina. Pida siempre la cotización de la versión exacta que va a usar."),

        h2("Cuándo una camioneta doble cabina barata NO le conviene"),
        p("Si va a cargar cerca de una tonelada a diario o remolcar, la versión de entrada a gasolina se queda "
          "corta: conviene subir a una diésel aunque cueste más. Y si la camioneta será sobre todo un auto "
          "familiar de ciudad, una SUV le da más confort por el mismo precio."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuál es la camioneta doble cabina más barata de Ecuador?",
             f"En nuestro catálogo, la RAM 700, desde {precio('RAM 700')}, en versión compacta. Entre las medianas, la "
             f"DongFeng Rich 6 Pro, desde {precio('DongFeng Rich 6 Pro')}."),
            ("¿Cuál es la camioneta diésel más barata?",
             f"La Foton Tunland G7, desde {precio('Foton Tunland G7')}, con motor 2.0 diésel de 160 HP y caja manual de seis."),
            ("¿Hay camionetas automáticas baratas?",
             "Pocas en la versión de entrada. La Z9 PHEV y la Hunter REEV son automáticas y 4x4; en diésel, las "
             "versiones automáticas de las Tunland V7 y V9 están más arriba en precio."),
            ("¿Conviene una camioneta china o japonesa?",
             f"Depende del uso y del plazo en que piense venderla. La Frontier y la Hilux tienen más historia en el "
             f"país; vea {a(P_FRONTIER, 'la Nissan Frontier')} para comparar."),
        ]),
        CIERRE,
    ]
    guarda(dict(
        n=35,
        title="Camionetas doble cabina más baratas de Ecuador en 2026 (y cómo leer su precio)",
        slug="camionetas-doble-cabina-mas-baratas-ecuador",
        categories=[43],
        excerpt="Las camionetas doble cabina del catálogo ordenadas por precio, con motor, caja y tracción de la "
                "versión de entrada, y qué preguntar antes de comparar.",
        meta={"_yoast_wpseo_title": "Camionetas doble cabina más baratas en 2026",
              "_yoast_wpseo_metadesc": "Desde $21.999: diez pickups ordenadas por precio, con el motor, la caja "
                                       "y la tracción de su versión de entrada, y las 4 preguntas antes de "
                                       "comparar.",
              "_yoast_wpseo_focuskw": "camionetas doble cabina baratas"},
        fuentes=[SRC_RAM700, CHP("/donfeng/dongfeng-rich-6/"), CHP("/donfeng/dongfeng-rich-7/"),
                 CHP("/changan/foton-tundland-g7/"), CHP("/changan/foton-tundland-v7/"), CHP("/changan/foton-tundland-g9/"),
                 CHP("/changan/hunter-turbo/"), CHP("/changan/changan-hunter-reev/"), CH_Z9, CHP("/toyota/toyota-hillux/"),
                 P_HUNTER_PLUS, P_PHEV],
        content="\n\n".join(c),
    ))


# ════════════════════════════════════════════════════════════════════════════════════
# 36. SUV automáticas por menos de $25.000
# ════════════════════════════════════════════════════════════════════════════════════
def suv_automaticas():
    c = [
        p("Buscar una SUV automática por menos de $25.000 en Ecuador tiene una trampa: muchas marcas publican "
          "un precio «desde» que corresponde a la versión manual, y la automática del mismo modelo cuesta "
          "varios miles más. La lista real de SUV automáticas en ese rango es más corta de lo que parece."),
        p("Revisamos versión por versión en la web oficial de cada marca y en las fichas de nuestro catálogo. "
          "Abajo están las que sí son automáticas desde su versión de entrada, las que solo tienen la automática "
          "más arriba y las que no la ofrecen. Todas se pueden probar en Ibarra, Cayambe o Tulcán."),

        h2("SUV automáticas por menos de $25.000: la lista corta"),
        table(["SUV", "Caja o sistema en la versión de entrada", "Precio desde"], [
            [fa("Tiggo 4 Pro", "Chery Tiggo 4 Pro"), "CVT, mild hybrid 48 V, 145 HP", precio("Chery Tiggo 4 Pro")],
            [fa("Nevo Q05", "Changan Nevo Q05"), "Eléctrica, selector electrónico, 161 HP", precio("Changan Nevo Q05")],
            [fa("E5", "Omoda E5 Next"), "Eléctrica (confirme versión)", precio("Omoda E5 Next")],
            [fa("X55 II", "BAIC X55 II"), "Automática DCT de 7, 1.5 turbo de 188 HP", precio("BAIC X55 II")],
            [fa("J5", "Jaecoo J5 SHS"), "Híbrida autorrecargable, 1.5 turbo", precio("Jaecoo J5 SHS")],
            [fa("Mage", "DongFeng Mage Hybrid"), "Transmisión híbrida DHT, 288 HP", precio("DongFeng Mage")],
            [fa("C5", "Omoda C5 SHS"), "Transmisión híbrida DHT, 221 HP", precio("Omoda C5 SHS")],
            [fa("Tiggo 7 Pro Max", "Chery Tiggo 7 Pro Max"), "CVT de 9 marchas, mild hybrid, 155 HP", precio("Chery Tiggo 7 Pro Max")],
        ], NOTA_PRECIOS),
        p(f"Justo por encima del límite quedan el Changan CS55 R-EV ({precio('Changan CS55 R-EV')}), de rango extendido, y "
          f"la DongFeng Huge ({precio('DongFeng Huge')}), híbrida con caja automática."),

        h2("Las que publican un precio de manual"),
        p("Estos modelos tienen versión automática, pero su «desde» del catálogo corresponde a la manual. Si "
          "necesita automática, pida el precio de esa versión antes de comparar:"),
        ul([
            f"<strong>{fa('Kwid', 'Renault Kwid')}</strong> (desde {precio('Renault Kwid')}): la Zen es manual; la Intens lleva caja CVT.",
            f"<strong>{fa('X35', 'BAIC X35')}</strong> (desde {precio('BAIC X35')}): la manual tiene 114 HP; la automática CVT usa un 1.5 turbo.",
            f"<strong>{fa('Tiggo 2 Pro Max', 'Chery Tiggo 2 Pro Max')}</strong> (desde {precio('Chery Tiggo 2 Pro Max')}): manual de cinco en la "
            "entrada; Chery Ecuador ofrece una Luxury con CVT.",
            f"<strong>{fa('Duster', 'Renault Duster')}</strong> (desde {precio('Renault Duster')}): la Zen 1.6 es manual; la automática es la "
            "Iconic 1.3 turbo con caja CVT X-Tronic.",
            f"<strong>{fa('Raize', 'Toyota Raize')}</strong> (desde {precio('Toyota Raize')}): manual en la entrada y CVT en la versión TA.",
            f"<strong>{fa('Kardian', 'Renault Kardian')}</strong> (desde {precio('Renault Kardian')}): la Evolution 1.6 es manual; la Iconic "
            "1.0 turbo es automática.",
        ]),
        p(f"Y el {fa('CS15', 'Changan CS15')} ({precio('Changan CS15')}) solo se ofrece con caja manual de cinco marchas. Del Fiat "
          f"Pulse ({precio('Fiat Pulse')}) no encontramos la caja de la versión Drive en la ficha; confírmela con el asesor."),

        cta_temprano("¿Busca automática y el presupuesto es de $25.000?",
                     "Le enviamos el precio de la versión automática exacta de los modelos que le interesen, no el "
                     "«desde» de la manual.",
                     "Pedir precios por WhatsApp",
                     "Hola, vengo del artículo de SUV automáticas por menos de $25.000. Quisiera el precio "
                     "de las versiones automáticas.", reserva=False),

        h2("CVT, doble embrague, híbrida o eléctrica: no se manejan igual"),
        ul([
            "<strong>CVT (Tiggo 4 Pro, Tiggo 7 Pro Max):</strong> sin saltos entre marchas, muy suave en ciudad. En "
            "subidas largas el motor sube de vueltas y suena más de lo que avanza; es normal.",
            "<strong>Doble embrague DCT (X55 II):</strong> cambios rápidos, sensación más deportiva. En tráfico muy "
            "lento puede sentirse algo brusca al arrancar.",
            "<strong>Híbrida DHT (Mage, C5, J5):</strong> el motor eléctrico mueve el auto a baja velocidad y el de "
            "gasolina entra cuando hace falta. Es la más eficiente en el tráfico de la ciudad.",
            "<strong>Eléctrica (Nevo Q05, E5 Next):</strong> no tiene marchas. Aceleración inmediata y cero consumo de "
            "gasolina, pero necesita dónde cargar.",
        ]),
        p(f"Si duda entre automática tradicional y CVT, lo explicamos en {a(P_AUTO_CVT, 'automáticos vs CVT')}."),

        h2("Cuál elegir según su uso"),
        ul([
            "<strong>Ciudad con tráfico, como Ibarra en hora pico o Quito:</strong> una híbrida (Mage, C5 o J5) "
            "ahorra más combustible que una CVT a gasolina.",
            "<strong>Viajes por la Panamericana y subidas largas:</strong> el turbo ayuda en altura. La X55 II, con 188 HP "
            "y 305 Nm, y el Mage, con 288 HP, son las de más potencia del grupo.",
            "<strong>Primer auto o presupuesto ajustado:</strong> el Tiggo 4 Pro es la automática más barata a gasolina.",
            "<strong>Familia con espacio:</strong> el Tiggo 7 Pro Max es la más grande de la lista corta.",
        ]),

        h2("Qué revisar en la prueba de manejo de una automática"),
        ol([
            "Arranque en una subida y suelte el freno: compruebe que el asistente de arranque en pendiente sostiene el auto.",
            "Maneje en tráfico lento unos minutos; ahí se notan los tirones de una caja de doble embrague o la suavidad de una CVT.",
            "Acelere a fondo para incorporarse a la Panamericana y escuche cuánto sube de vueltas el motor.",
            "Pruebe el modo Sport o Eco si lo tiene: cambia bastante la respuesta en las cajas CVT.",
            "Pregunte cada cuántos kilómetros se cambia el aceite de la caja y si entra en el mantenimiento programado.",
        ]),

        h2("El mantenimiento de la caja automática"),
        p("Una caja automática o CVT dura tanto como una manual si se respeta el cambio de su aceite, que no es "
          "el mismo del motor. Una híbrida suma revisiones del sistema eléctrico pero ahorra en frenos, porque "
          "frena en buena parte con el motor eléctrico. Una eléctrica elimina el aceite de motor y de caja. "
          f"Los costos del caso híbrido están en {a(P_MANT_HIB, 'mantenimiento de híbridos')}."),

        quote("Muchos llegan con el precio de la manual en la cabeza y salen sorprendidos con la automática. "
              "En este rango, la que viene automática de fábrica suele salir mejor que subir de versión."),

        h2("Cuándo una SUV automática de este rango NO le conviene"),
        p("Si maneja sobre todo en caminos de tierra con pendiente o necesita tracción 4x4, ninguna de estas "
          "SUV la ofrece en la versión de entrada: le conviene mirar camionetas o subir de presupuesto. Y si "
          "casi todo su recorrido es carretera plana a velocidad constante, la ventaja de la automática se "
          "reduce y una manual bien equipada le deja dinero para otra cosa."),
        p(f"Para ver las SUV compactas con todas sus versiones, revise {a(P_SUV_COMPACTO, 'SUV compactas en Ecuador')}."),

        h2("Preguntas frecuentes"),
        faq([
            ("¿Cuál es la SUV automática más barata de Ecuador?",
             f"En nuestro catálogo, a gasolina, el Chery Tiggo 4 Pro desde {precio('Chery Tiggo 4 Pro')}, con CVT. Al mismo "
             "precio están las eléctricas Nevo Q05 y E5 Next."),
            ("¿Una SUV híbrida es automática?",
             "Las híbridas completas de esta lista no tienen pedal de embrague: el sistema decide cuándo usar el "
             "motor eléctrico y cuándo el de gasolina."),
            ("¿La CVT es confiable en la sierra?",
             "Sí, con el mantenimiento de su aceite a tiempo. Lo que cambia es la sensación al subir: el motor "
             "suena más alto que en una automática convencional."),
            ("¿Puedo financiar una SUV automática?",
             f"Sí, con entrada o con planes especiales. Revise {a(FINANCIAMIENTO, 'financiamiento en Comercial Hidrobo')}."),
        ]),
        CIERRE,
    ]
    guarda(dict(
        n=36,
        title="SUV automáticas por menos de $25.000 en Ecuador: las que sí lo son desde la versión de entrada",
        slug="suv-automaticas-menos-de-25000-ecuador",
        categories=[41],
        excerpt="Ocho SUV que son automáticas desde su versión más barata y por menos de $25.000, y cuáles publican "
                "un precio que corresponde a la manual.",
        meta={"_yoast_wpseo_title": "SUV automáticas por menos de $25.000 en Ecuador",
              "_yoast_wpseo_metadesc": "Ocho SUV automáticas desde su versión de entrada, de $19.990 a $24.990, "
                                       "y seis cuyo precio publicado es el de la manual. Revisado versión por "
                                       "versión.",
              "_yoast_wpseo_focuskw": "suv automáticas menos de 25000"},
        fuentes=[SRC_CHERY_T4, SRC_CHERY_T7PM, SRC_CHERY_T2, SRC_OJ_C5, SRC_OJ_J5, SRC_OJ_E5, CH_MAGE,
                 CHP("/changan/baic-x55-ii/"), CHP("/changan/changan-nevo-q05-ev/"), CHP("/changan/baic-x35/"),
                 CHP("/reanult/renault-kwid/"), CHP("/reanult/renault-duster/"), CHP("/toyota/toyota-raize/"),
                 CHP("/reanult/renault-kardian/"), CHP("/changan/cs15/"), CH_HUGE],
        content="\n\n".join(c),
    ))


if __name__ == "__main__":
    for f in (embrague, escaner, correa, camionetas_4x4, pilar_hibridos, hibridos_baratos,
              menos_20000, doble_cabina, suv_automaticas):
        f()
        print("ok", f.__name__)
