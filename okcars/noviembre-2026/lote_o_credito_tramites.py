#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote O — crédito y trámites de la tanda de noviembre (5 posts).

Para noviembre la demanda medible de Search Console ya está cubierta por posts
publicados, así que este lote es estratégico: el décimo tercer sueldo como entrada
(temporada), vender un auto que todavía se paga, cuánto vale el auto propio (lado del
vendedor, complementa «precio justo»), y dos trámites que faltaban: cambio de motor o
color y placas perdidas.

Escrito en USTED. Las cifras de crédito salen de cuota() con TASA_ANUAL; no hay
montos legales, costos de trámites ni plazos que no estén verificados.
"""
from comun import (CAT, CHOCADO, CITA, CONTRATO, REVENTA, TODO_RIESGO, CUOTA, DEVALUA, ENTRADA, FECHAS, FICHA,
                   FIN_DE_ANO, MATRICULA, MULTAS, PARTE_PAGO, PRECANCELAR,
                   PRECIO_JUSTO, PRENDA, REVISION_TECNICA, TRASPASO,
                   VENDER_REQUISITOS, VERIFICAR_DEUDAS, cierre, cuota, guarda, link)


def usd(x):
    """Formato $1.234 redondeado."""
    return "$" + f"{round(x):,}".replace(",", ".")


# ── cifras de crédito calculadas, no a ojo ─────────────────────────────────
_PRECIO = 20500                      # Kia Seltos del patio
_ENT30 = 6150                        # 30 % de entrada, igual que en los posts de cuota
_FIN = _PRECIO - _ENT30              # 14.350
C_BASE = cuota(_FIN, 48)             # ≈ 392
C_MIL = cuota(_FIN - 1000, 48)       # con $1.000 más de entrada
C_1500 = cuota(_FIN - 1500, 48)
C_2000 = cuota(_FIN - 2000, 48)
POR_MIL = cuota(1000, 48)            # ≈ 27,3
INT_BASE = C_BASE * 48 - _FIN
INT_MIL = C_MIL * 48 - (_FIN - 1000)


# ════════════════════════════════════════════════════════════════════════════
# 1 · Décimo tercer sueldo como entrada
# ════════════════════════════════════════════════════════════════════════════
decimo = {
    "title": "Décimo tercer sueldo para comprar auto: cómo usarlo de entrada",
    "slug": "decimo-tercer-sueldo-entrada-auto",
    "date": FECHAS[0],
    "cat": CAT["financiamiento"],
    "tags": ["décimo tercer sueldo", "entrada auto usado", "comprar auto en diciembre",
             "financiamiento auto usado", "cuota mensual"],
    "excerpt": "El décimo tercero llega hasta el 24 de diciembre y muchos lo piensan como "
               "entrada para un auto. Cuánto baja la cuota cada mil dólares, cuándo "
               "conviene usarlo y cuándo es mejor guardarlo.",
    "yoast_title": "Décimo tercer sueldo para comprar auto: úselo bien",
    "yoast_desc": "Cuánto baja la cuota cada mil dólares de entrada, por qué conviene "
                  "planificarlo desde noviembre y en qué casos es mejor no tocar ese "
                  "dinero.",
    "focus_kw": "decimo tercer sueldo para comprar auto",
    "bloques": [
        "En diciembre llega el décimo tercer sueldo y, con él, la tentación de cambiar de "
        "auto o de comprar el primero. Es un dinero que no estaba en el presupuesto del "
        "mes, y por eso se siente disponible.",

        "Usarlo como parte de la entrada puede ser una muy buena decisión. También puede "
        "dejarlo sin colchón en enero, que es el mes más pesado del año. Esta guía le "
        "ayuda a calcular cuánto le rinde ese dinero en un crédito y a decidir con números.",

        {"h2": "Lo que rinde cada mil dólares de entrada"},

        f"La respuesta corta: a 48 meses, cada $1.000 adicionales de entrada bajan la cuota "
        f"unos {usd(POR_MIL)} al mes y le ahorran intereses durante todo el crédito. Lo "
        f"calculamos con la tasa referencial que usamos en todos nuestros ejemplos, de "
        f"alrededor del 14 % anual.",

        "El décimo tercero equivale a la doceava parte de lo que usted ganó en el año, y "
        "se paga hasta el 24 de diciembre. Su monto exacto depende de sus ingresos; lo "
        "importante es saber qué hace cada mil dólares cuando entran al crédito.",

        f"Tomemos el Kia Seltos del patio, en {usd(_PRECIO)}, con una entrada base del "
        f"30 % ({usd(_ENT30)}). Así cambia la cuota a 48 meses según cuánto del décimo "
        f"sume a esa entrada:",

        {"tabla": [
            ["Décimo sumado a la entrada", "Monto financiado", "Cuota a 48 meses"],
            ["Nada", usd(_FIN), usd(C_BASE)],
            ["$1.000", usd(_FIN - 1000), usd(C_MIL)],
            ["$1.500", usd(_FIN - 1500), usd(C_1500)],
            ["$2.000", usd(_FIN - 2000), usd(C_2000)],
        ]},

        f"Con $1.000 adicionales, además de la cuota más baja, el total de intereses pasa "
        f"de unos {usd(INT_BASE)} a unos {usd(INT_MIL)}. La lógica completa de la cuota "
        f"está en {link(CUOTA, 'cómo se calcula la cuota mensual de un auto usado')}.",

        {"h2": "Por qué conviene planificarlo desde noviembre"},

        "El décimo llega justo cuando los patios y concesionarios tienen más movimiento, y "
        "cuando también llegan los gastos de fin de año. Quien decide el 23 de diciembre "
        "suele decidir apurado. Planificar desde noviembre le da tres semanas para "
        "comparar con calma.",

        {"ol": [
            "Calcule cuánto recibirá aproximadamente y defina qué parte puede ir al auto sin "
            "tocar sus gastos de diciembre y enero.",
            "Elija el rango de vehículo con ese monto ya sumado a la entrada que tiene.",
            "Pida la precalificación del crédito antes de que llegue el dinero: así sabe qué "
            "le aprueban y en qué plazo.",
            "Reserve la prueba de manejo para la primera quincena de diciembre, cuando "
            "todavía hay tiempo para revisar papeles.",
            "Cuando el décimo esté en su cuenta, cierre la compra con el monto definido, no "
            "con todo lo que llegó.",
        ]},

        f"Si todavía no sabe cuánto de entrada le van a pedir, la referencia está en "
        f"{link(ENTRADA, 'cuánto de entrada piden para un auto usado')}: el porcentaje "
        f"depende mucho del año del vehículo.",

        {"quote": "Una entrada más grande sirve, pero un fondo para imprevistos sirve más. "
                  "Si para subir la entrada tiene que quedarse sin nada en la cuenta, "
                  "mejor ponga un poco menos y conserve ese respaldo.",
         "cite": CITA},

        {"h2": "Entrada más grande o plazo más corto"},

        "Con el mismo dinero extra hay dos caminos. Puede sumarlo a la entrada y mantener "
        "el plazo, para tener una cuota más liviana. O puede mantener la cuota y acortar el "
        "plazo, para terminar antes y pagar menos intereses en total.",

        "La primera opción conviene si su ingreso mensual está justo. La segunda conviene "
        "si la cuota ya le resultaba cómoda y lo que quiere es salir pronto de la deuda. "
        "Ninguna es mejor en abstracto: depende de cuánto aire le queda cada mes.",

        {"h2": "Cuándo no le conviene usar el décimo en el auto"},

        {"ul": [
            "<strong>Si no tiene fondo de emergencia.</strong> Un auto usado puede pedir una "
            "reparación en los primeros meses, y el seguro tiene deducible. Quedarse sin "
            "colchón justo después de comprar es mala combinación.",
            "<strong>Si tiene deudas más caras.</strong> Una tarjeta con saldo pendiente "
            "suele cobrar más que un crédito vehicular. Pagarla primero rinde más.",
            "<strong>Si enero ya viene cargado.</strong> Matrículas escolares, útiles y "
            "cuentas atrasadas de diciembre llegan juntas. Un décimo gastado entero en "
            "diciembre complica enero.",
            "<strong>Si la compra todavía no está decidida.</strong> El dinero no se "
            "pierde por esperar. Comprar apurado para «aprovechar» el décimo sí sale caro.",
        ]},

        {"h2": "Una cuenta rápida para decidir"},

        "Antes de sumar el décimo a la entrada, haga esta cuenta en un papel: cuota mensual "
        "más seguro, combustible y mantenimiento, comparada con lo que le queda libre "
        "cada mes. Si el total supera un cuarto de su ingreso neto, la entrada más grande "
        "no es un lujo sino una necesidad. Si queda holgado, conserve parte del décimo.",

        "Para quien vive en Otavalo, Cayambe o Tulcán y trabaja en Ibarra, sume también el "
        "combustible del viaje diario por la Panamericana: es el rubro que más se olvida "
        "en esa cuenta.",

        f"Diciembre tiene además sus propias ventajas y riesgos como mes de compra; los "
        f"repasamos en {link(FIN_DE_ANO, 'comprar un auto usado a fin de año')}.",

        {"h2": "Tres situaciones y lo que conviene en cada una"},

        "<strong>Primer auto, ingreso fijo y sin deudas.</strong> Es el caso donde el "
        "décimo más rinde como entrada. Úselo para bajar el monto financiado y elija un "
        "plazo que le deje la cuota cómoda; si le sobra, guárdelo para el primer "
        "mantenimiento y las llantas.",

        "<strong>Cambio de auto con uno actual para entregar.</strong> Aquí el décimo "
        "completa la diferencia entre lo que vale su auto y el que quiere. Antes de "
        "sumarlo, pida la valoración del suyo: a veces la diferencia es menor de lo que "
        "pensaba y el décimo puede quedarse en la cuenta.",

        "<strong>Comerciante o independiente con ingresos de temporada.</strong> Si "
        "diciembre es su mejor mes, quizá le convenga más una entrada normal y usar los "
        "meses fuertes para abonar al capital. Esa estrategia la explicamos en "
        f"{link(PRECANCELAR, 'precancelar el crédito vehicular')}.",

        "En los tres casos la pregunta es la misma: qué le deja más tranquilo en marzo, no "
        "qué se ve mejor el día de la compra.",

        {"faq": [
            ("¿Cuándo se paga el décimo tercer sueldo?",
             "Hasta el 24 de diciembre. Algunos trabajadores lo reciben mensualizado, "
             "repartido en cada rol de pagos; en ese caso no llega como un monto único en "
             "diciembre."),
            ("¿Cuánto baja la cuota si pongo $1.000 más de entrada?",
             f"A 48 meses y con una tasa referencial del 14 % anual, unos {usd(POR_MIL)} "
             f"al mes. La cifra exacta depende de la tasa de su crédito."),
            ("¿Me conviene usar todo el décimo como entrada?",
             "Solo si ya tiene un fondo para imprevistos y no arrastra deudas más caras. "
             "Si no, use una parte y conserve el resto."),
            ("¿Puedo reservar un auto en noviembre y pagar la entrada con el décimo?",
             "Consúltelo con el patio: las condiciones de reserva cambian según la unidad. "
             "Lo que sí puede adelantar es la precalificación del crédito."),
            ("¿Es buen momento diciembre para comprar un auto usado?",
             "Tiene movimiento y ofertas, pero también compradores apurados. Si llega con "
             "el presupuesto definido desde noviembre, compra con ventaja."),
        ]},

        cierre("Hola, quiero calcular cuánto bajaría mi cuota usando el décimo como entrada.",
               "Si quiere hacer la cuenta con una unidad concreta, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Vender un auto que todavía se está pagando
# ════════════════════════════════════════════════════════════════════════════
vender_pagando = {
    "title": "Vender un carro que todavía se está pagando: cómo hacerlo bien",
    "slug": "vender-auto-que-aun-esta-pagando",
    "date": FECHAS[3],
    "cat": CAT["tramites"],
    "tags": ["vender auto con crédito", "prenda vehicular", "reserva de dominio",
             "vender auto usado", "trámites vehiculares Ecuador"],
    "excerpt": "Mientras el crédito no esté cancelado, el auto tiene una prenda o reserva "
               "de dominio y no se puede traspasar. Las tres formas seguras de venderlo y "
               "la que conviene evitar.",
    "yoast_title": "Vender un carro que todavía se está pagando",
    "yoast_desc": "Por qué la prenda impide el traspaso, cómo usar el dinero del comprador "
                  "para cancelar el crédito y el riesgo de vender con un simple papel de "
                  "cesión.",
    "focus_kw": "vender un carro que todavia se esta pagando",
    "bloques": [
        "Pasa seguido: el auto ya no le sirve, o necesita uno más grande, pero todavía le "
        "quedan cuotas por pagar. La pregunta es si puede venderlo así, con la deuda viva.",

        "Se puede, pero no de cualquier forma. Mientras el crédito esté vigente, el auto "
        "tiene un gravamen a favor de la entidad que lo financió, y ese detalle cambia "
        "todo el orden de la venta.",

        {"h2": "La regla: primero se levanta la prenda, después se traspasa"},

        "Cuando un auto se compra a crédito, la entidad registra una prenda o una reserva de "
        "dominio sobre él. Es su garantía. Mientras exista, la agencia de tránsito no "
        "registra el traspaso a otro dueño.",

        f"Por eso, cualquier venta segura pasa por cancelar el saldo y levantar ese "
        f"gravamen. La explicación completa de cómo funciona está en "
        f"{link(PRENDA, 'comprar un auto con prenda en Ecuador')}, escrita desde el lado "
        f"del comprador.",

        {"h2": "Las tres formas seguras de vender"},

        {"tabla": [
            ["Camino", "Cómo funciona", "Para quién conviene"],
            ["Cancelar con sus ahorros", "Usted paga el saldo, levanta la prenda y vende "
             "libre", "Quien tiene el dinero disponible"],
            ["Cancelar con el dinero del comprador", "El pago del comprador va directo a la "
             "entidad y el resto a usted", "Ventas entre particulares con confianza mutua"],
            ["Entregarlo como parte de pago", "El patio valora el auto y descuenta el saldo "
             "pendiente", "Quien quiere cambiar de auto en una sola operación"],
        ]},

        {"h3": "Cancelar con el dinero del comprador"},

        "Es el camino más común entre particulares y el que más cuidado pide. Para que nadie "
        "quede expuesto, el orden importa:",

        {"ol": [
            "Pida a la entidad un certificado del saldo para precancelar, con fecha.",
            "Firme con el comprador un documento que diga precio, saldo a cancelar y plazo "
            "para entregar el auto.",
            "Que el comprador pague el saldo directamente a la entidad, no a usted, y "
            "guarde el comprobante.",
            "Reciba la diferencia entre el precio y el saldo.",
            "Solicite el levantamiento de la prenda y, con ese documento, hagan el traspaso.",
        ]},

        f"Cómo funciona la precancelación por dentro, y si su contrato cobra algo por "
        f"hacerla, lo explicamos en {link(PRECANCELAR, 'precancelar el crédito vehicular')}.",

        {"h3": "Entregarlo como parte de pago"},

        f"Si lo que busca es cambiar de auto, entregar el actual como parte de pago le "
        f"ahorra la búsqueda de comprador. Pregunte siempre si el patio gestiona la "
        f"cancelación del saldo pendiente con la entidad, porque no todos lo hacen. El "
        f"proceso general está en {link(PARTE_PAGO, 'cambiar su auto entregándolo como parte de pago')}.",

        {"quote": "La venta con prenda no es complicada si el dinero sigue un solo camino: "
                  "del comprador a la entidad, y de la entidad la liberación. Cuando el "
                  "dinero pasa primero por manos del vendedor, empiezan los problemas.",
         "cite": CITA},

        {"h2": "La forma que conviene evitar: la cesión de derechos informal"},

        "Algunos vendedores entregan el auto con un papel de «cesión de derechos» y el "
        "comprador se compromete a seguir pagando las cuotas. Parece práctico. Para las "
        "dos partes es un riesgo grande.",

        {"ul": [
            "<strong>Para el vendedor:</strong> el crédito sigue a su nombre. Si el "
            "comprador deja de pagar, la deuda y la mancha en el buró son suyas. Y el auto "
            "sigue registrado a su nombre, con las multas que genere.",
            "<strong>Para el comprador:</strong> paga un auto que legalmente no es suyo. "
            "Si el vendedor tiene otras deudas o fallece, recuperar el auto puede volverse "
            "un juicio largo.",
        ]},

        "Si la entidad permite trasladar el crédito al comprador, ese trámite formal es "
        "otra cosa y sí puede ser una salida. Pero tiene que hacerse con la entidad, no con "
        "un papel firmado entre las dos partes.",

        {"h2": "Cuándo no le conviene vender todavía"},

        "Si le quedan pocas cuotas, a veces conviene terminar de pagar y vender libre: la "
        "venta es más simple y el comprador paga mejor un auto sin trámites pendientes. "
        "También conviene esperar si el saldo es mayor que lo que el auto vale hoy: vender "
        "en ese caso lo obliga a poner dinero de su bolsillo para cerrar.",

        {"h2": "Qué tener listo antes de publicar"},

        {"ul": [
            "Certificado de saldo actualizado de la entidad.",
            "Matrícula vigente y sin multas pendientes.",
            "Un valor de referencia realista del auto, comparado con publicaciones de "
            "Ibarra y Quito del mismo modelo.",
            "La decisión tomada sobre cuál de los tres caminos va a ofrecer.",
        ]},

        f"El resto de papeles y requisitos de cualquier venta está en "
        f"{link(VENDER_REQUISITOS, 'requisitos para vender un carro en Ecuador')}.",

        {"h2": "Cómo saber si le conviene vender ahora"},

        "La cuenta es sencilla y conviene hacerla antes de publicar. Al valor realista "
        "de su auto réstele el saldo que le falta pagar, incluido lo que cobre la entidad "
        "por precancelar. Lo que queda es lo que efectivamente recibe.",

        {"tabla": [
            ["Ejemplo", "Auto A", "Auto B"],
            ["Valor realista del auto", "$15.000", "$12.000"],
            ["Saldo para precancelar", "$7.000", "$12.500"],
            ["Lo que usted recibe", "$8.000", "Tiene que poner $500"],
        ]},

        "Las cifras son un ejemplo para mostrar la cuenta. En el caso A la venta tiene "
        "sentido. En el B, vender obliga a poner dinero; salvo que necesite deshacerse del "
        "auto por otra razón, conviene seguir pagando unos meses más.",

        {"h2": "Qué decirle al comprador desde el primer mensaje"},

        "Diga en la publicación que el auto tiene crédito vigente y cómo propone cerrarlo. "
        "Ocultarlo no sirve: el comprador lo va a ver en el certificado de gravámenes y "
        "la confianza se pierde. Dicho de entrada, filtra a quien no quiere ese trámite y "
        "atrae a quien entiende el proceso.",

        {"faq": [
            ("¿Puedo vender mi carro si todavía lo estoy pagando?",
             "Sí, pero el traspaso solo se registra cuando se cancela el crédito y se "
             "levanta la prenda. Lo seguro es que el pago del comprador cubra ese saldo "
             "directamente en la entidad."),
            ("¿Qué es la reserva de dominio?",
             "Es la figura por la que la entidad conserva un derecho sobre el auto hasta que "
             "usted termine de pagar. Mientras exista, el auto no puede pasar a otro dueño."),
            ("¿Es seguro vender con cesión de derechos?",
             "No. El crédito y el registro del auto siguen a su nombre, y si el comprador "
             "deja de pagar, la deuda es suya."),
            ("¿Un patio puede recibir mi auto con saldo pendiente?",
             "Algunos lo hacen, descontando el saldo de la valoración. Pregunte siempre si "
             "el patio gestiona la cancelación con la entidad."),
            ("¿Puedo usar el dinero de la venta para comprar otro auto?",
             "Sí, una vez cancelado el saldo. Si va a comprar en un patio, entregar el auto "
             "con saldo como parte de pago puede resolver las dos cosas en una sola "
             "operación."),
            ("¿Cuánto tarda levantar la prenda?",
             "Depende de la entidad y de la agencia de tránsito. Pida el plazo por escrito "
             "al precancelar y no entregue el auto antes de tener claro ese paso."),
        ]},

        cierre("Hola, todavía estoy pagando mi auto y quiero saber si puedo entregarlo como "
               "parte de pago.",
               "Si quiere consultar si su auto con saldo pendiente puede entrar como parte de "
               "pago, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Cuánto vale mi auto usado
# ════════════════════════════════════════════════════════════════════════════
cuanto_vale = {
    "title": "Cuánto vale mi auto usado: cómo calcular un precio realista",
    "slug": "cuanto-vale-mi-auto-usado",
    "date": FECHAS[7],
    "cat": CAT["guias"],
    "tags": ["cuánto vale mi auto", "vender auto usado", "precio auto usado",
             "avalúo vehículo", "parte de pago"],
    "excerpt": "El precio que usted cree que vale su auto, el que piden en internet y el que "
               "de verdad se paga son tres cifras distintas. Cómo llegar a la tercera sin "
               "regalar el auto ni quedarse meses publicándolo.",
    "yoast_title": "Cuánto vale mi auto usado: cómo calcularlo",
    "yoast_desc": "Cómo comparar publicaciones, cuánto restar por estado y papeles, y por "
                  "qué un patio ofrece menos que un particular cuando recibe su auto en "
                  "parte de pago.",
    "focus_kw": "cuanto vale mi auto usado",
    "bloques": [
        "Todo dueño tiene una cifra en la cabeza para su auto. Casi siempre es más alta "
        "que la que el mercado paga, porque incluye años de cuidado, el cariño y lo que "
        "costó en su momento.",

        "El comprador no ve nada de eso. Ve el año, el kilometraje, el estado y los "
        "papeles, y compara con otras diez publicaciones. Esta guía le ayuda a ponerse en "
        "ese lugar y sacar un precio con el que el auto se venda.",

        {"h2": "La respuesta corta: su auto vale lo que se paga por autos iguales"},

        "El valor real de su auto es el precio al que se cierran ventas de unidades del "
        "mismo modelo, año y kilometraje parecido, en su zona. No el precio de publicación, "
        "que casi siempre incluye un margen para negociar.",

        "Para estimarlo hace falta comparar bien y después ajustar por lo que hace distinto "
        "a su auto. Son tres pasos.",

        {"h2": "Paso 1: compare con publicaciones de verdad parecidas"},

        {"ol": [
            "Busque el mismo modelo y la misma versión; la marca sola no alcanza.",
            "Quédese con unidades de su mismo año o de un año más o menos.",
            "Filtre por kilometraje parecido, con un margen de unos 20.000 kilómetros.",
            "Mire publicaciones de Imbabura y de Quito: el mercado de Ibarra se mueve con "
            "el de la capital.",
            "Anote al menos cinco precios y descarte el más alto y el más bajo.",
        ]},

        "El promedio de lo que queda es el precio de publicación de referencia. Todavía no "
        "es lo que va a recibir.",

        {"h2": "Paso 2: ajuste por lo que hace distinto a su auto"},

        {"tabla": [
            ["Factor", "Sube el valor", "Baja el valor"],
            ["Mantenimiento", "Facturas o registro completo", "Sin historial"],
            ["Estado", "Pintura original, interior cuidado", "Golpes, óxido, tapicería gastada"],
            ["Llantas y batería", "Recientes", "Por cambiar"],
            ["Papeles", "Matrícula al día, sin multas ni gravámenes", "Trámites pendientes"],
            ["Dueños", "Un solo dueño", "Varios traspasos seguidos"],
        ]},

        f"Lo que más pesa, de lejos, es el historial de mantenimiento: un auto con facturas "
        f"genera confianza y se vende antes. Lo segundo son los papeles limpios. Si tiene "
        f"multas o un gravamen, resuélvalos antes de publicar o descuéntelos del precio. "
        f"Cómo pierde valor un auto con los años lo explicamos en "
        f"{link(DEVALUA, 'cuánto se devalúa un auto usado en Ecuador')}.",

        {"h2": "Paso 3: separe el precio de publicación del precio de cierre"},

        "En una venta entre particulares casi siempre hay negociación. Publique con un "
        "margen razonable sobre el precio al que está dispuesto a vender, pero no tan alto "
        "que el auto quede fuera de las búsquedas. Un auto muy por encima del promedio no "
        "recibe ni llamadas.",

        "Una señal útil: si en dos semanas no recibe consultas serias, el precio está alto. "
        "Si en dos días le llueven ofertas, probablemente está bajo.",

        {"quote": "El precio que más rápido vende no es el más bajo, es el que el comprador "
                  "entiende. Un auto con facturas de mantenimiento y papeles al día se "
                  "defiende solo en la negociación.",
         "cite": CITA},

        {"h2": "Por qué un patio le ofrece menos que un particular"},

        "Si recibe una valoración por su auto como parte de pago, va a ser menor que el "
        "precio al que lo vendería por su cuenta. No es un abuso: el patio tiene que "
        "revisarlo, hacer los arreglos, verificar los papeles, sostener una garantía y "
        "esperar a que se venda. Todo eso cuesta.",

        "La pregunta correcta no es cuál cifra es más alta, sino cuánto le cuesta a usted "
        "la diferencia. Vender por su cuenta puede tomar semanas o meses, con visitas, "
        "pruebas de manejo, curiosos y el riesgo de estafas. Para mucha gente, esa "
        f"diferencia es el precio de la tranquilidad. El proceso está en "
        f"{link(PARTE_PAGO, 'cambiar su auto entregándolo como parte de pago')}.",

        {"h2": "Cuándo no le conviene vender por su cuenta"},

        "Si necesita el dinero con fecha fija, si no tiene tiempo para atender visitas o si "
        "el auto tiene detalles que un comprador particular va a usar para regatear fuerte, "
        "la venta por su cuenta pierde ventaja. En esos casos, una valoración en un patio "
        "suele ser más práctica, aunque la cifra sea menor.",

        f"Y si va a estar del otro lado, comprando, la guía para saber si un precio es "
        f"razonable está en {link(PRECIO_JUSTO, 'cuánto pagar por un auto usado')}.",

        {"h2": "Qué tipo de auto conserva mejor su valor"},

        "No todos los autos pierden valor al mismo ritmo. En la Sierra, las camionetas y "
        "las SUV con buena red de repuestos suelen sostener mejor su precio que los sedanes "
        "de marcas con poca presencia en la zona. Un auto difícil de reparar en Ibarra o "
        "Tulcán lo paga el siguiente dueño, y eso se refleja en lo que ofrece.",

        "También pesa la versión. Un auto automático, con cámara de retroceso o con "
        "tracción 4x4 en una camioneta, suele pedirse más en Imbabura y Carchi que la "
        "versión más básica del mismo modelo, y eso se nota en lo que el comprador paga.",

        f"Los modelos que mejor se revenden y por qué están en "
        f"{link(REVENTA, 'los autos usados que mejor se revenden en Ecuador')}.",

        {"h2": "Cómo presentar el auto para que valga lo que pide"},

        {"ul": [
            "<strong>Limpieza a fondo</strong>, por dentro y por fuera, incluido el motor. "
            "Es lo más barato que sube la impresión del comprador.",
            "<strong>Fotos de día</strong>, con el auto completo, el tablero encendido "
            "mostrando el kilometraje y el interior.",
            "<strong>Papeles juntos en una carpeta</strong>: matrícula, facturas de "
            "mantenimiento y certificado de gravámenes.",
            "<strong>Detalles chicos resueltos</strong>: focos, plumas, tapa del tanque. "
            "Cada uno es un argumento menos para regatear.",
        ]},

        {"faq": [
            ("¿Cómo sé cuánto vale mi auto usado?",
             "Compare al menos cinco publicaciones del mismo modelo, año y kilometraje "
             "parecido, descarte los extremos y ajuste por mantenimiento, estado y papeles."),
            ("¿Cuánto debo dejar para negociar?",
             "Un margen razonable sobre su precio mínimo, sin salirse del rango de "
             "publicaciones similares. Si nadie llama en dos semanas, el precio está alto."),
            ("¿Por qué el patio me ofrece menos?",
             "Porque asume la revisión, los arreglos, la verificación de papeles, la "
             "garantía y el tiempo hasta venderlo. A cambio, usted cierra el mismo día."),
            ("¿Sube el precio si arreglo los detalles antes de vender?",
             "Los arreglos baratos y visibles suelen pagarse solos: limpieza a fondo, focos, "
             "plumas. Las reparaciones grandes casi nunca se recuperan completas."),
            ("¿El kilometraje alto baja mucho el precio?",
             "Baja, pero menos de lo que se cree si el auto tiene mantenimiento "
             "documentado. Un kilometraje alto sin facturas es lo que más castiga el "
             "precio."),
            ("¿Conviene vender antes de la matrícula del año?",
             "Un auto con la matrícula al día se vende mejor. Si la renovación está cerca, "
             "considere hacerla o descontar ese valor del precio para que el comprador no lo "
             "use para regatear de más."),
            ("¿Conviene vender en Ibarra o en Quito?",
             "En Quito hay más compradores, pero también más competencia. Publicar en las "
             "dos zonas amplía el alcance sin bajar el precio."),
        ]},

        cierre("Hola, quiero que valoren mi auto como parte de pago.",
               "Si quiere una valoración de su auto en Ibarra, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Cambio de motor o de color
# ════════════════════════════════════════════════════════════════════════════
cambio_motor = {
    "title": "Cambio de motor o color del vehículo: qué trámite hacer",
    "slug": "cambio-de-motor-o-color-vehiculo-tramite",
    "date": FECHAS[11],
    "cat": CAT["tramites"],
    "tags": ["cambio de motor vehículo", "cambio de color vehículo", "trámites ANT",
             "traspaso de vehículo", "revisión técnica vehicular"],
    "excerpt": "Si al auto le cambiaron el motor o lo pintaron de otro color y nadie lo "
               "registró, el traspaso y la revisión técnica se traban. Cómo regularizarlo "
               "y qué revisar si va a comprar un auto así.",
    "yoast_title": "Cambio de motor de un vehículo: qué trámite hacer",
    "yoast_desc": "Por qué un motor o un color que no coinciden con la matrícula traban el "
                  "traspaso, qué papeles conviene tener y qué revisar antes de comprar un "
                  "auto así.",
    "focus_kw": "cambio de motor vehiculo tramite",
    "bloques": [
        "Un motor que se fundió y se reemplazó, o un auto que se pintó de otro color tras "
        "un choque: son cambios frecuentes y perfectamente legales. El problema aparece "
        "cuando nadie los registra.",

        "La matrícula dice un número de motor y un color. Si el auto tiene otros, para la "
        "agencia de tránsito no coincide con lo registrado, y eso se nota justo en los dos "
        "momentos clave: la revisión técnica y el traspaso.",

        {"h2": "La respuesta corta: el cambio se registra en la agencia de tránsito"},

        "Tanto el cambio de motor como el de color tienen que actualizarse en el registro "
        "del vehículo, en la agencia de tránsito que corresponda a su cantón. Hasta que eso "
        "ocurra, el auto queda con datos que no coinciden con la realidad.",

        "Los requisitos exactos y el costo los fija cada agencia y pueden cambiar. Antes de "
        "ir, confírmelos en la agencia de su zona o en los canales de la ANT. Lo que sí "
        "conviene tener claro es qué papeles suelen pedir y por qué.",

        {"h2": "Qué papeles conviene tener"},

        {"tabla": [
            ["Cambio", "Papeles que suelen pedir", "Por qué importan"],
            ["Motor nuevo o importado", "Factura del motor a nombre del dueño",
             "Demuestra el origen legal del motor"],
            ["Motor usado", "Documento de compra y datos del vehículo de donde salió",
             "Evita que sea un motor de un auto robado"],
            ["Color", "Factura o constancia del taller que pintó",
             "Respalda el cambio ante la agencia"],
            ["Ambos", "Matrícula, cédula y revisión del vehículo",
             "Confirman que el auto es el mismo"],
        ]},

        "Un motor sin factura es el caso más delicado. Si el motor no tiene un origen "
        "demostrable, regularizarlo puede volverse muy difícil, y ese problema pasa al "
        "siguiente dueño.",

        {"h2": "Cómo regularizarlo, paso a paso"},

        {"ol": [
            "Reúna la factura o el documento de compra del motor, o la constancia del taller "
            "si fue el color.",
            "Consulte en la agencia de tránsito de su cantón los requisitos vigentes y si "
            "necesita turno.",
            "Lleve el auto: en estos trámites suele hacerse una revisión física para "
            "comprobar los números.",
            "Pida la matrícula actualizada con el nuevo número de motor o el nuevo color.",
            "Guarde todo el expediente: es lo primero que le va a pedir un comprador.",
        ]},

        f"Si el auto no pasa por este trámite, la {link(REVISION_TECNICA, 'revisión técnica vehicular')} "
        f"detecta la diferencia y el traspaso no se completa.",

        {"quote": "Un número de motor que no coincide no es un detalle de papeles: es lo "
                  "que frena un traspaso en la agencia. Revíselo antes de pagar, con la "
                  "matrícula en la mano y el capó abierto.",
         "cite": CITA},

        {"h2": "Si va a comprar un auto con el motor cambiado"},

        "Un motor cambiado no es malo en sí mismo. A veces es un motor nuevo y el auto "
        "queda mejor que antes. Lo que tiene que verificar es que el cambio esté en regla.",

        {"ul": [
            "<strong>Compare el número de motor</strong> grabado en el bloque con el de la "
            "matrícula. Si no coinciden, pregunte por qué.",
            "<strong>Pida la factura del motor.</strong> Sin ella, no compre hasta que el "
            "vendedor regularice.",
            "<strong>Revise el color de la matrícula</strong> contra el del auto, y mire "
            "dentro de las puertas y del baúl: si allí aparece otro color, hubo repintura.",
            "<strong>Deje constancia en el contrato</strong> del número de motor y del color "
            "reales.",
        ]},

        f"Qué debe decir ese contrato y por qué los datos tienen que coincidir con la "
        f"matrícula está en {link(CONTRATO, 'contrato de compraventa de vehículo')}. Y el "
        f"resto del procedimiento, en {link(TRASPASO, 'traspaso de vehículo en Ecuador')}.",

        {"h2": "Cuándo no le conviene seguir adelante con la compra"},

        "Si el vendedor no tiene factura del motor y no puede explicar de dónde salió, o si "
        "el número de chasis también muestra señales de manipulación, no compre. Tampoco si "
        "le proponen «arreglarlo después del traspaso»: el traspaso no se puede hacer con "
        "esa diferencia, y usted quedaría con un auto que no puede poner a su nombre.",

        {"h2": "La regla para no tener sorpresas"},

        "Antes de pagar cualquier auto usado en Ibarra, Otavalo o donde sea, compare tres "
        "números con la matrícula: placa, chasis y motor. Y el color. Son cinco minutos con "
        "el capó abierto y le evitan el problema más difícil de resolver después.",

        {"h2": "Repintura: cuándo es estética y cuándo esconde un golpe"},

        "Un cambio de color completo suele ser una decisión del dueño. Una repintura "
        "parcial, en una puerta o un guardafango, casi siempre viene de un golpe. La "
        "primera hay que registrarla; la segunda no cambia el color de la matrícula, pero "
        "le dice algo del pasado del auto.",

        f"Las señales para distinguir un retoque de un choque fuerte están en "
        f"{link(CHOCADO, 'cómo saber si un auto fue chocado')}.",

        {"h2": "Motor nuevo o usado: qué cambia en el valor del auto"},

        "Un motor nuevo, con factura y registrado, puede sumar valor: el auto tiene menos "
        "desgaste en su pieza más cara. Un motor usado registrado no suma ni resta mucho, "
        "y conviene revisarlo como si fuera el original.",

        "En ambos casos, pida al vendedor el registro del taller que hizo el cambio: "
        "quién lo instaló, cuándo y con qué kilometraje. Ese dato le dice cuánto lleva "
        "trabajando el motor actual, que es lo que de verdad importa.",

        "Lo que sí resta, y bastante, es un motor sin papeles. Para un comprador informado "
        "es un auto que no se puede traspasar con tranquilidad, y eso se paga con un "
        "precio mucho más bajo o con la venta que no se cierra.",

        {"faq": [
            ("¿Es obligatorio registrar un cambio de motor?",
             "Sí. El número de motor es parte del registro del vehículo, y si no coincide, "
             "la revisión técnica y el traspaso se traban."),
            ("¿Qué pasa si pinto mi auto de otro color?",
             "Debe actualizar el color en el registro. Si no, el auto no coincide con su "
             "matrícula y puede tener problemas en controles y trámites."),
            ("¿Cuánto cuesta el trámite de cambio de motor?",
             "Lo fija cada agencia de tránsito y puede cambiar. Confírmelo en la de su "
             "cantón antes de ir."),
            ("¿Puedo comprar un auto con motor cambiado?",
             "Sí, si el cambio está registrado y hay factura del motor. Si no lo está, "
             "pida que el vendedor lo regularice antes de pagar."),
            ("¿Un motor cambiado baja el precio del auto?",
             "Si está registrado y tiene factura, no necesariamente; un motor nuevo puede "
             "incluso sumar. Sin papeles, el precio cae mucho porque el traspaso queda en "
             "duda."),
            ("¿Qué hago si compré un auto y descubro que el motor no coincide?",
             "Hable con el vendedor de inmediato y pida la factura del motor. Si no la "
             "tiene, consulte en la agencia de tránsito qué opciones hay antes de seguir "
             "circulando o intentar el traspaso."),
            ("¿Dónde veo el número de motor?",
             "Está grabado en el bloque del motor y figura en la matrícula. Un mecánico "
             "puede ubicarlo si no lo encuentra."),
        ]},

        cierre("Hola, quiero verificar los números de motor y chasis de un auto de OKCars.",
               "Si quiere revisar una unidad del patio con la matrícula en la mano, "
               "escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Placas perdidas
# ════════════════════════════════════════════════════════════════════════════
placas = {
    "title": "Perdí las placas de mi carro: qué hacer y en qué orden",
    "slug": "placas-perdidas-que-hacer",
    "date": FECHAS[15],
    "cat": CAT["tramites"],
    "tags": ["placas perdidas", "duplicado de placas", "placas robadas",
             "trámites ANT", "matrícula vehicular"],
    "excerpt": "Una placa que se cayó en un bache o que le robaron no es solo un trámite: "
               "si alguien la usa en otro auto, las multas llegan a su nombre. El orden "
               "correcto para resolverlo.",
    "yoast_title": "Perdí las placas de mi carro: qué hago",
    "yoast_desc": "Cuándo poner la denuncia, cómo pedir el duplicado en la agencia de "
                  "tránsito y por qué una placa robada puede llenarle de multas que no son "
                  "suyas.",
    "focus_kw": "perdi las placas de mi carro que hago",
    "bloques": [
        "Las placas se pierden más de lo que parece. Un bache en la vía, un lavado donde "
        "quedaron mal sujetas o, en el peor caso, un robo. Lo primero que se piensa es en "
        "el trámite del duplicado.",

        "Pero el riesgo real está en otro lado: una placa suelta puede terminar en otro "
        "vehículo, y las multas de ese vehículo llegan a su nombre. Por eso el orden en que "
        "actúa importa tanto como el trámite.",

        {"h2": "La respuesta corta: deje constancia primero y pida el duplicado después"},

        "Si la placa fue robada o no sabe dónde la perdió, ponga la denuncia antes de "
        "cualquier otra cosa. Esa denuncia es su respaldo si alguien la usa. Después, "
        "solicite el duplicado en la agencia de tránsito de su cantón.",

        "Los requisitos, el costo y el tiempo de entrega los fija cada agencia. Confírmelos "
        "en la de su zona o en los canales de la ANT antes de ir.",

        {"h2": "Qué hacer, paso a paso"},

        {"ol": [
            "Revise el recorrido: si se cayó en un bache o en un lavado, a veces aparece "
            "en el mismo lugar.",
            "Si no aparece o fue robada, presente la denuncia y guarde una copia.",
            "Consulte en la agencia de tránsito los requisitos vigentes para el duplicado y "
            "si necesita turno.",
            "Lleve la matrícula, su cédula y la denuncia; si le queda una de las dos placas, "
            "pregunte si debe entregarla.",
            "Mientras recibe las nuevas, pregunte en la agencia qué documento le permite "
            "circular y llévelo siempre en el auto.",
        ]},

        "Ese último punto conviene aclararlo en la misma agencia: circular sin placas sin "
        "un respaldo puede terminar en una citación o en el auto retenido.",

        {"h2": "El riesgo de una placa robada"},

        "Una placa robada vale para quien quiere esconder la identidad de otro vehículo. Si "
        "ese vehículo pasa un radar, se mete en un accidente o se usa para algo peor, el "
        "registro apunta a su auto.",

        {"tabla": [
            ["Situación", "Qué puede pasar", "Qué le protege"],
            ["Multas de radar con su placa", "Le llegan citaciones que no son suyas",
             "La denuncia con fecha anterior"],
            ["Accidente con su placa", "Lo buscan como responsable",
             "La denuncia y la ubicación de su auto ese día"],
            ["Placa usada en un delito", "Su auto aparece en una investigación",
             "La denuncia presentada a tiempo"],
        ]},

        f"Por eso, después de perder una placa, revise sus multas cada cierto tiempo. Cómo "
        f"consultarlas por placa lo explicamos en "
        f"{link(MULTAS, 'consultar multas de un vehículo')}.",

        {"quote": "La denuncia parece un trámite de más cuando la placa solo se cayó. Pero "
                  "si alguien la recoge y la usa, ese papel con fecha es lo único que "
                  "demuestra que usted no estaba ahí.",
         "cite": CITA},

        {"h2": "Cómo evitar perderlas"},

        {"ul": [
            "<strong>Revise los tornillos</strong> cada vez que lave el auto: las placas "
            "flojas son las que se caen en los baches.",
            "<strong>Use tornillos de seguridad</strong>, que se venden en almacenes de "
            "accesorios y piden una llave especial.",
            "<strong>Mire las placas al volver de un viaje</strong> por caminos de tierra, "
            "como los de las comunidades de Imbabura o la vía a Intag.",
            "<strong>Si compra un auto usado</strong>, compruebe que las placas coincidan "
            "con la matrícula antes de pagar.",
        ]},

        {"h2": "Si va a comprar un auto con placas provisionales o duplicadas"},

        "No es raro encontrar autos usados que circulan con un documento provisional porque "
        "el dueño perdió las placas. No es motivo para descartarlos, pero pida ver la "
        "denuncia o el trámite de duplicado en curso, y compruebe que la placa de la "
        "matrícula sea la misma que se va a entregar.",

        f"Y como en cualquier compra, revise que la matrícula esté al día; el detalle de "
        f"costos y plazos está en {link(MATRICULA, 'matricular un auto en Ecuador')}.",

        "Un detalle práctico para quien viaja seguido por la Panamericana entre Ibarra, "
        "Otavalo y Cayambe: tome una foto de las dos placas y de la matrícula y guárdela en "
        "el celular. Si pierde una placa en carretera, esa foto agiliza la denuncia y el "
        "trámite, porque tiene todos los datos a mano.",

        "Y si el auto está asegurado, avise también a su aseguradora: algunas pólizas "
        "piden que se les informe cualquier cambio en la identificación del vehículo.",

        {"h2": "Cuándo no hace falta la denuncia"},

        "Si la placa se dañó pero la tiene en la mano, por ejemplo doblada tras un golpe "
        "en el parqueadero, no hubo pérdida: puede pedir el reemplazo entregando la placa "
        "dañada. La denuncia sirve cuando la placa quedó fuera de su control.",

        {"h2": "Si le robaron las placas junto con otras piezas"},

        "En algunos robos se llevan las placas junto con espejos, logos o llantas. Ponga "
        "una sola denuncia con todo lo que falta. Si tiene seguro todo riesgo, revise si "
        f"cubre el robo de partes; no todas las pólizas lo hacen, como explicamos en "
        f"{link(TODO_RIESGO, 'lo que no cubre el seguro todo riesgo')}.",

        {"h2": "Cómo vigilar que nadie use su placa"},

        "Durante los meses siguientes a la pérdida, revise sus multas por placa una vez "
        "al mes. Si aparece una citación de un lugar donde usted no estuvo, por ejemplo "
        "un radar en una vía que no recorre, guarde la evidencia de dónde estaba su auto "
        "ese día y presente la impugnación con la denuncia.",

        "Para quien vive en Ibarra y casi nunca baja a Quito, una multa en la capital es "
        "la alerta más clara. Antes de pagarla para «salir del paso», consulte en la "
        "agencia cómo impugnarla con su denuncia.",

        {"faq": [
            ("¿Qué hago si perdí una placa de mi carro?",
             "Si no sabe dónde quedó o se la robaron, ponga la denuncia y luego pida el "
             "duplicado en la agencia de tránsito de su cantón, con su matrícula y cédula."),
            ("¿Puedo circular sin una placa mientras sale el duplicado?",
             "Pregunte en la agencia qué documento le autoriza a circular mientras tanto y "
             "llévelo siempre en el auto."),
            ("¿Cuánto cuesta el duplicado de placas?",
             "Lo fija cada agencia de tránsito y puede cambiar. Confírmelo antes de ir."),
            ("¿Qué pasa si alguien usa mi placa robada?",
             "Las multas y registros llegan a su auto. La denuncia con fecha es la que le "
             "permite demostrar que no fue usted."),
            ("¿Necesito la denuncia si solo se cayó una placa en la vía?",
             "Es lo recomendable. Aunque sepa que se cayó, no sabe quién la recogió; la "
             "denuncia con fecha lo protege si alguien la usa después."),
            ("¿Las placas duplicadas tienen el mismo número?",
             "Confírmelo en la agencia al hacer el trámite y revise que la matrícula quede "
             "con los datos correctos antes de salir."),
            ("¿Se puede vender un auto mientras salen las placas nuevas?",
             "Conviene esperar a tenerlas: el comprador va a pedir que la placa y la "
             "matrícula coincidan para hacer el traspaso."),
        ]},

        cierre("Hola, tengo una consulta sobre placas y papeles de un auto de OKCars.",
               "Si tiene dudas sobre los papeles de una unidad del patio en Ibarra, "
               "escríbanos al"),
    ],
}


if __name__ == "__main__":
    for s in [decimo, vender_pagando, cuanto_vale, cambio_motor, placas]:
        print(guarda(s))
