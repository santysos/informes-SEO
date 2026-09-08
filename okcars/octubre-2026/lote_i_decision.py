#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote I — decisión de compra (4 posts).

«carros nuevos a credito» acumula 175 impresiones en posición 47,4 y
«carros creditos» 185 en posición 41,5: hay demanda de crédito para auto nuevo
que el sitio recibe y no puede atender bien. El primer post de este lote la
enfrenta de cara, sin fingir que vendemos autos nuevos.
"""
from comun import (CAT, CHECKLIST, CUOTA, DEVALUA, ENTRADA, FICHA, KILOMETRAJE,
                   LISTADO, MANTENIMIENTO, PARTE_PAGO, PATIO, SEGURO, guarda, link, wa)

CITA = "Equipo comercial de OKCars"


# ════════════════════════════════════════════════════════════════════════════
# 1 · Nuevo a crédito o seminuevo
# ════════════════════════════════════════════════════════════════════════════
nuevo_vs = {
    "title": "¿Carro nuevo a crédito o seminuevo? La cuenta completa",
    "slug": "carro-nuevo-a-credito-o-seminuevo",
    "date": "2026-11-23T09:00:00",
    "cat": CAT["guias"],
    "tags": ["auto nuevo o usado", "crédito automotriz", "devaluación",
             "guía de compra", "financiamiento"],
    "excerpt": "Comparamos las dos opciones con la cuenta de tres años puesta entera: "
               "cuota, devaluación, matrícula y seguro. Y decimos en qué casos el auto "
               "nuevo sí es la mejor decisión.",
    "yoast_title": "¿Auto nuevo a crédito o seminuevo? La cuenta a 3 años",
    "yoast_desc": "Cuota, devaluación, matrícula y seguro comparados a tres años. Cuándo "
                  "conviene el seminuevo y en qué casos concretos el auto nuevo sí tiene sentido.",
    "focus_kw": "carro nuevo a credito o usado",
    "bloques": [
        "Es la decisión que más gente posterga: comprar un auto nuevo financiado a cinco "
        "años, o un seminuevo con menos deuda encima.",

        "Vamos a hacer la cuenta completa, incluyendo lo que casi nunca se pone sobre la "
        "mesa. Y al final decimos en qué casos el auto nuevo es la mejor opción, porque los "
        "hay y no somos honestos si los escondemos.",

        {"h2": "Los cuatro rubros que hay que sumar"},

        "Comparar solo el precio de compra o solo la cuota mensual deja fuera más de la "
        "mitad del costo real. Son cuatro rubros y todos se mueven:",

        {"ul": [
            "<strong>La cuota</strong>, que depende del monto financiado, del plazo y de la "
            "tasa.",
            "<strong>La devaluación</strong>, que es dinero que se pierde aunque el auto "
            "esté parado en el garaje.",
            "<strong>La matrícula anual</strong>, que se calcula sobre el avalúo y por lo "
            "tanto es mayor en un auto nuevo.",
            "<strong>El seguro</strong>, cuya prima también se calcula sobre el valor "
            "asegurado.",
        ]},

        "Los dos últimos son los que más gente olvida, y no son menores: se pagan todos los "
        "años, durante toda la tenencia.",

        {"h2": "La devaluación es el rubro invisible"},

        "Un auto nuevo pierde su mayor porcentaje de valor durante los primeros años, y la "
        "curva es más pronunciada al principio. Esa pérdida es real: es la diferencia entre "
        "lo que pagaste y lo que te van a dar cuando lo vendas.",

        "Un seminuevo de tres o cuatro años ya atravesó la parte más empinada de esa curva. "
        "El segundo dueño compra el mismo vehículo después de que otro absorbió la caída "
        "más fuerte, y a partir de ahí la depreciación es mucho más suave.",

        f"Lo desarrollamos con más detalle en "
        f"{link(DEVALUA, 'cuánto se devalúa un auto en Ecuador')}.",

        {"quote": "Al cliente que llega decidido por el auto nuevo le pedimos que haga una "
                  "sola cuenta: cuánto va a haber pagado en tres años y cuánto le van a dar "
                  "por el auto ese día. Muchos igual compran nuevo, y está perfecto. Pero ya "
                  "saben qué están comprando además del auto.",
         "cite": CITA},

        {"h2": "Dónde gana el seminuevo"},

        {"ol": [
            "<strong>Menor monto financiado</strong>, por lo tanto menos intereses pagados "
            "en total.",
            "<strong>Plazos más cortos</strong>, que terminan la deuda antes.",
            "<strong>Depreciación más suave</strong> desde el primer día.",
            "<strong>Matrícula menor</strong>, porque el avalúo es más bajo.",
            "<strong>Prima de seguro menor</strong>, por la misma razón.",
            "<strong>Posibilidad de pagar de contado</strong> o con una entrada mucho más "
            "alta en proporción.",
        ]},

        "Ese último punto es el más subestimado. Con el presupuesto de la entrada de un "
        "auto nuevo, mucha gente puede comprar un seminuevo completo sin deuda. Salir de la "
        "concesionaria sin cuota mensual cambia bastante la vida financiera de una familia.",

        {"h2": "Dónde gana el auto nuevo"},

        "Ahora la parte honesta, y la decimos aunque vendamos seminuevos.",

        {"ul": [
            "<strong>Garantía de fábrica completa</strong>, por varios años, que cubre "
            "fallas mayores sin costo.",
            "<strong>Cero incertidumbre sobre el historial.</strong> Nadie lo maltrató "
            "antes que vos.",
            "<strong>Tasas promocionales.</strong> Las marcas a veces financian a tasas "
            "muy por debajo del mercado, y eso puede dar vuelta la cuenta.",
            "<strong>Tecnología y seguridad actuales</strong>, que en algunos casos "
            "representan una diferencia real.",
            "<strong>Uso intensivo previsible.</strong> Quien recorre muchísimo puede "
            "preferir arrancar de cero con garantía.",
        ]},

        "Si conseguís una tasa promocional muy baja y pensás quedarte con el auto ocho o "
        "diez años, la cuenta del auto nuevo puede cerrar mejor que la del seminuevo. Es un "
        "escenario real y vale la pena buscarlo antes de decidir.",

        {"h2": "Cómo hacer tu propia cuenta"},

        "No hay una respuesta general; hay una respuesta para tu caso. Estos son los datos "
        "que necesitás reunir:",

        {"ol": [
            "Precio de las dos opciones que estás comparando de verdad.",
            "Cuota y plazo de cada una, con la tasa que efectivamente te ofrecen.",
            "Total de intereses que vas a pagar en cada caso.",
            "Valor estimado de reventa de cada vehículo al año en que pensás cambiarlo.",
            "Matrícula anual de cada uno.",
            "Cotización de seguro para cada uno.",
        ]},

        f"Con esos seis datos la decisión deja de ser una intuición. Para la parte del "
        f"financiamiento tenemos guías sobre {link(ENTRADA, 'cuánto piden de entrada')} y "
        f"{link(CUOTA, 'cómo se calcula la cuota mensual')}, y sobre el seguro en "
        f"{link(SEGURO, 'cuánto cuesta asegurar un auto usado')}.",

        {"h2": "Un punto intermedio que poca gente considera"},

        f"Existe una tercera opción: un seminuevo muy reciente. En el patio, por ejemplo, "
        f"la {link(FICHA['crosstrek'][0], FICHA['crosstrek'][1] + ' ' + FICHA['crosstrek'][2])} "
        f"tiene apenas {FICHA['crosstrek'][3]} kilómetros, y la "
        f"{link(FICHA['hunter'][0], FICHA['hunter'][1] + ' ' + FICHA['hunter'][2])} tiene "
        f"{FICHA['hunter'][3]}.",

        "Son vehículos prácticamente nuevos que ya absorbieron la caída inicial de valor. "
        "Para quien quiere lo nuevo sin pagar la devaluación del primer año, es la opción "
        "que más sentido económico tiene y la que menos gente busca.",

        {"h2": "El error de mirar solo la cuota"},

        "Es la trampa más común del financiamiento automotriz y la usan todos los "
        "vendedores del mundo, nosotros incluidos si no tenemos cuidado.",

        "Cuando la conversación se reduce a «¿cuánto puede pagar al mes?», cualquier "
        "vehículo entra en cualquier presupuesto: basta con estirar el plazo. Un auto que "
        "no podías pagar a tres años se vuelve accesible a siete, y la cuota se ve "
        "razonable.",

        "Lo que se esconde ahí es el total pagado. Estirar el plazo baja la cuota y sube "
        "bastante los intereses acumulados, y además alarga el período en que debés más de "
        "lo que vale el auto. Si necesitás venderlo a mitad de camino, te encontrás con que "
        "la deuda supera el valor del vehículo.",

        {"ul": [
            "Preguntá siempre el <strong>total a pagar</strong>, además de la cuota mensual.",
            "Compará el total de intereses entre los plazos que te ofrezcan.",
            "Verificá si hay penalidad por prepago, para poder adelantar cuotas después.",
            "Confirmá qué seguros van incluidos en la cuota y cuáles son obligatorios.",
        ]},

        {"faq": [
            ("¿Por qué no hay que mirar solo la cuota mensual?",
             "Porque estirando el plazo cualquier vehículo entra en cualquier presupuesto. "
             "Lo que sube es el total de intereses, y además se alarga el período en que "
             "debés más de lo que vale el auto. Preguntá siempre el total a pagar y si hay "
             "penalidad por prepago."),
            ("¿Conviene comprar un auto nuevo a crédito?",
             "Depende de la tasa y de cuánto tiempo pienses quedártelo. Con una tasa "
             "promocional baja y una tenencia larga, la cuenta puede cerrar bien. Con tasa "
             "de mercado y recambio a los tres o cuatro años, el seminuevo suele salir "
             "mejor por la devaluación."),
            ("¿Cuánto se pierde por devaluación en un auto nuevo?",
             "La caída más fuerte ocurre en los primeros años y luego se suaviza. Por eso "
             "un seminuevo de tres o cuatro años ya pasó la parte más costosa de esa curva."),
            ("¿Un seminuevo tiene garantía?",
             "En un patio formal sí existe garantía comercial, distinta de la garantía de "
             "fábrica de un auto nuevo. Conviene preguntar qué cubre exactamente y por "
             "cuánto tiempo antes de comprar."),
            ("¿Qué conviene con el mismo presupuesto?",
             "Con lo que sería la entrada de un auto nuevo, muchas veces se compra un "
             "seminuevo completo sin deuda. Vale la pena hacer esa comparación antes de "
             "firmar un crédito a cinco años."),
        ]},

        f"Si querés que hagamos la cuenta juntos con números reales, escribinos al "
        f"{link(wa('Hola, quiero comparar comprar un auto nuevo a crédito contra un seminuevo.'), 'WhatsApp de OKCars')}. "
        f"Mirá también el {link(LISTADO, 'listado de vehículos')}. Estamos en Ibarra y "
        f"atendemos a compradores de Otavalo, Atuntaqui, Cayambe y Tulcán.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Qué se revende mejor
# ════════════════════════════════════════════════════════════════════════════
reventa = {
    "title": "Qué autos usados se revenden mejor en Ecuador",
    "slug": "autos-usados-que-mejor-se-revenden-ecuador",
    "date": "2026-11-25T09:00:00",
    "cat": CAT["guias"],
    "tags": ["reventa de autos", "valor de reventa", "guía de compra",
             "devaluación", "seminuevos Ecuador"],
    "excerpt": "El día que compras ya estás decidiendo cuánto vas a perder al vender. Qué "
               "características sostienen el precio en el mercado ecuatoriano y cuáles lo "
               "hunden, con ejemplos concretos.",
    "yoast_title": "Qué autos usados se revenden mejor en Ecuador",
    "yoast_desc": "Qué sostiene el precio de reventa en Ecuador y qué lo hunde: marca, "
                  "caja, color, tracción y red de servicio, con ejemplos concretos del inventario.",
    "focus_kw": "autos que mejor se revenden ecuador",
    "bloques": [
        "Casi nadie piensa en la reventa el día que compra, y es justamente el día en que "
        "se decide. Las características que elegís al comprar determinan cuánto vas a "
        "recuperar cuando quieras cambiar de auto.",

        "En el mercado ecuatoriano hay patrones bastante consistentes sobre qué sostiene el "
        "precio y qué lo hunde. Los enumeramos sin adornos.",

        {"h2": "Lo que sostiene el precio"},

        {"ol": [
            "<strong>Marca con red de servicio amplia.</strong> Toyota, Chevrolet, Hyundai "
            "y Kia se venden más rápido porque el comprador sabe que conseguirá repuestos "
            "en cualquier ciudad.",
            "<strong>Caja automática.</strong> En SUV y camionetas, la demanda está "
            "claramente volcada hacia la automática.",
            "<strong>Carrocería alta.</strong> SUV y camionetas dominan la demanda y por "
            "eso sostienen mejor su valor que los sedanes.",
            "<strong>Colores neutros.</strong> Blanco, plata, gris y negro se venden a "
            "cualquiera. Un color llamativo achica el universo de compradores.",
            "<strong>Diésel en camionetas de trabajo.</strong> Hay demanda estructural de "
            "gente que las necesita para producir.",
            "<strong>Historial de mantenimiento documentado.</strong> Vale dinero real al "
            "momento de vender.",
        ]},

        {"h2": "Lo que lo hunde"},

        {"ul": [
            "<strong>Marcas sin red consolidada.</strong> Aunque el vehículo sea bueno, el "
            "comprador teme quedarse sin repuestos.",
            "<strong>Caja manual en segmentos donde se espera automática.</strong> Alarga "
            "mucho el tiempo de venta.",
            "<strong>Kilometraje muy por encima del promedio</strong> para el año del "
            "vehículo.",
            "<strong>Modificaciones.</strong> Suspensiones alteradas, equipos de sonido "
            "grandes o cambios estéticos reducen compradores en lugar de sumar.",
            "<strong>Choques declarados o evidentes</strong>, y con más razón los mal "
            "reparados.",
            "<strong>Falta de papeles.</strong> Un vehículo con documentación incompleta "
            "vale bastante menos, sin importar su estado.",
        ]},

        {"quote": "El color es lo que más sorprende a la gente. Un auto igual, mismo año, "
                  "mismo kilometraje, en blanco se vende en dos semanas y en un color raro "
                  "puede quedarse tres meses. No es que valga menos: es que hay menos gente "
                  "dispuesta a comprarlo, y eso termina moviendo el precio.",
         "cite": CITA},

        {"h2": "El caso de las marcas nuevas"},

        "Merece un párrafo aparte porque es la duda del momento. Las marcas chinas ofrecen "
        "mucho equipamiento por el precio, y eso es real y verificable.",

        "El punto de la reventa es distinto: cuando una marca lleva pocos años en el país, "
        "el mercado secundario todavía no está consolidado y el comprador de usado duda. "
        "Esa duda se traduce en más tiempo de venta y en un precio algo menor.",

        "Eso puede cambiar y de hecho está cambiando: a medida que crece el parque y se "
        "consolida la red de servicio, la reventa mejora. Quien compra hoy asume parte de "
        "ese riesgo a cambio de un precio de entrada mejor.",

        f"Lo tratamos con más detalle en nuestra guía de "
        f"{link(MANTENIMIENTO, 'qué autos usados piden menos mantenimiento')}.",

        {"h2": "El equipamiento no siempre suma"},

        "Hay una idea extendida de que mientras más equipado, mejor se revende. En el "
        "mercado ecuatoriano eso funciona solo hasta cierto punto.",

        "El equipamiento que suma es el que el comprador de usado valora: aire "
        "acondicionado, caja automática, cámara de reversa, buenos elementos de seguridad. "
        "El que no suma es el muy específico o el que encarece el mantenimiento, como "
        "techos panorámicos o sistemas electrónicos complejos que asustan por lo que cuesta "
        "repararlos.",

        "Un vehículo de gama media bien mantenido suele revenderse mejor y más rápido que "
        "uno de gama alta con el mismo kilometraje, porque el universo de compradores que "
        "puede pagarlo y sostenerlo es mucho más grande.",

        {"h2": "Cómo cuidar el valor mientras lo tenés"},

        "Buena parte del precio de reventa se construye durante la tenencia, no en la "
        "compra:",

        {"ol": [
            "Guardá todas las facturas de mantenimiento, aunque parezcan menores.",
            "Respetá los intervalos de servicio del fabricante.",
            "Arreglá los golpes de carrocería pronto, antes de que aparezca óxido.",
            "Mantené el interior: es lo primero que mira quien va a comprar.",
            "Conservá los dos juegos de llaves y el manual original.",
            "Mantené los papeles al día, sin multas acumuladas.",
        ]},

        "Ese primer punto es el de mejor retorno. Una carpeta con el historial completo "
        "justifica un precio mayor y acorta la negociación, porque le quita al comprador la "
        "principal incertidumbre.",

        {"h2": "Ejemplos del listado"},

        f"En el patio se ve el patrón. La "
        f"{link(FICHA['cx5'][0], FICHA['cx5'][1] + ' ' + FICHA['cx5'][2])} y el "
        f"{link(FICHA['seltos'][0], FICHA['seltos'][1] + ' ' + FICHA['seltos'][2])} son "
        f"automáticos, de marcas con red amplia y de carrocería alta: tres de las "
        f"características que mejor sostienen el precio.",

        f"La {link(FICHA['captiva'][0], FICHA['captiva'][1])}, en cambio, es manual, y por "
        f"eso está a {FICHA['captiva'][4]} pese a ser del {FICHA['captiva'][2]} con solo "
        f"{FICHA['captiva'][3]} kilómetros. Para el comprador que maneja mecánico y piensa "
        "quedársela, esa desventaja de reventa es directamente un descuento en la compra.",

        {"h2": "El tiempo de venta también es un costo"},

        "Cuando se habla de reventa casi siempre se piensa en el precio, y se olvida la otra "
        "variable: cuánto tarda en venderse.",

        "Un vehículo que se queda tres meses publicado tiene un costo real. Seguís pagando "
        "seguro y matrícula, el auto sigue depreciándose, y muchas veces terminás bajando "
        "el precio igual por cansancio. Vender rápido a un precio razonable suele dejar más "
        "que vender lento a un precio ambicioso.",

        "En Imbabura eso se nota con claridad: en Ibarra y Otavalo los vehículos de marcas "
        "conocidas, automáticos y en colores neutros se mueven en semanas, mientras que uno "
        "con alguna característica poco común puede quedarse meses aunque esté impecable.",

        {"h2": "Cuándo conviene vender"},

        "Hay un momento en la vida de un vehículo donde la ecuación empieza a girar en "
        "contra: cuando los mantenimientos correctivos comienzan a acumularse y el valor de "
        "reventa ya cayó lo suficiente como para que arreglarlo no se recupere.",

        {"ol": [
            "Antes de que toque una reparación mayor previsible, no después.",
            "Con la revisión técnica y los papeles al día, que suman al precio.",
            "Con el historial de mantenimiento ordenado y disponible.",
            "Sin multas pendientes, que traban el traspaso y espantan compradores.",
        ]},

        {"faq": [
            ("¿Por qué importa cuánto tarda en venderse?",
             "Porque mientras está publicado seguís pagando seguro y matrícula, el vehículo "
             "sigue depreciándose y muchas veces terminás bajando el precio por cansancio. "
             "Vender rápido a un precio razonable suele dejar más que vender lento a uno "
             "ambicioso."),
            ("¿Cuándo conviene vender el auto?",
             "Antes de que toque una reparación mayor previsible, con la revisión técnica y "
             "los papeles al día, el historial de mantenimiento ordenado y sin multas "
             "pendientes que traben el traspaso."),
            ("¿Qué marcas se revenden mejor en Ecuador?",
             "Las de red de servicio amplia y parque grande: Toyota, Chevrolet, Hyundai y "
             "Kia encabezan por disponibilidad de repuestos y confianza del comprador de "
             "usado."),
            ("¿El color influye en la reventa?",
             "Bastante. Blanco, plata, gris y negro tienen el universo más amplio de "
             "compradores. Un color llamativo no baja el valor del vehículo en sí, pero "
             "alarga el tiempo de venta y eso termina presionando el precio."),
            ("¿Una caja manual se revende peor?",
             "En SUV y camionetas, sí: la demanda espera automática. En autos pequeños y "
             "económicos la manual tiene mejor aceptación."),
            ("¿Los autos chinos se revenden mal?",
             "Toman más tiempo porque el mercado secundario aún se está consolidando. A "
             "cambio, el precio de compra suele ser mejor, así que la pérdida total durante "
             "la tenencia no siempre es mayor."),
        ]},

        f"Si querés saber cuánto vale hoy tu auto actual, lo valoramos sin costo en el "
        f"patio. Escribinos al "
        f"{link(wa('Hola, quiero saber cuánto vale mi auto actual y qué opciones de cambio tengo.'), 'WhatsApp de OKCars')} "
        f"o mirá cómo funciona {link(PARTE_PAGO, 'entregarlo como parte de pago')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Comprar a fin de año
# ════════════════════════════════════════════════════════════════════════════
fin_ano = {
    "title": "Comprar un auto usado a fin de año: ¿conviene esperar?",
    "slug": "comprar-auto-usado-fin-de-ano",
    "date": "2026-11-27T09:00:00",
    "cat": CAT["guias"],
    "tags": ["comprar auto fin de año", "estacionalidad", "guía de compra",
             "décimo tercer sueldo", "seminuevos Ecuador"],
    "excerpt": "Diciembre trae décimo, promociones y prisa. Qué cambia de verdad en el "
               "mercado de usados a fin de año, qué conviene aprovechar y qué trampa "
               "aparece siempre en esa época.",
    "yoast_title": "Comprar auto usado a fin de año: ¿conviene esperar?",
    "yoast_desc": "Qué cambia realmente en el mercado de seminuevos en diciembre y enero, "
                  "qué conviene aprovechar, qué apuro sale caro y si vale la pena esperar a enero.",
    "focus_kw": "comprar auto usado fin de ano",
    "bloques": [
        "Cada diciembre pasa lo mismo: llega el décimo tercer sueldo, aparecen las "
        "promociones y mucha gente decide que es el momento de cambiar de auto.",

        "¿Es realmente mejor comprar en diciembre? Sí y no, y conviene entender qué cambia "
        "de verdad antes de dejarse llevar por la fecha.",

        {"h2": "Lo que sí cambia en diciembre"},

        {"ul": [
            "<strong>Hay más dinero circulando.</strong> El décimo tercero pone liquidez en "
            "el mercado y eso mueve compras que estaban esperando.",
            "<strong>Las marcas empujan el cierre de año.</strong> Buscan cumplir metas "
            "anuales, y eso a veces se traduce en mejores condiciones de financiamiento.",
            "<strong>Aparecen más seminuevos.</strong> Quien compra nuevo entrega el suyo, "
            "y eso amplía la oferta de usados.",
            "<strong>Hay prisa.</strong> Mucha gente quiere resolver antes de las fiestas o "
            "estrenar el auto en vacaciones.",
        ]},

        "Ese último punto es a la vez la oportunidad y la trampa, según de qué lado estés.",

        {"h2": "Lo que no cambia"},

        "El precio de un seminuevo lo determinan sobre todo el año, el kilometraje, el "
        "estado y la demanda del modelo. Diciembre no vuelve barato a un vehículo caro ni "
        "convierte en buena compra a uno con problemas.",

        "Las promociones más agresivas suelen concentrarse en vehículos nuevos, donde las "
        "marcas tienen margen para mover condiciones. En el mercado de usados el efecto es "
        "más suave.",

        {"quote": "En diciembre vendemos más, pero no porque bajemos los precios: porque "
                  "hay más gente comprando. Lo que sí le decimos a todo el mundo es que no "
                  "compre apurado por la fecha. El auto que te apuraste a comprar en "
                  "diciembre lo vas a manejar todo el año siguiente.",
         "cite": CITA},

        {"h2": "La trampa de la prisa"},

        "Es el riesgo real de comprar a fin de año, y lo vemos todos los diciembres.",

        "Quien tiene el dinero en la mano y una fecha en la cabeza revisa menos, negocia "
        "peor y acepta cosas que en marzo no aceptaría. Se salta la revisión mecánica "
        "porque el taller está lleno, no verifica los papeles porque «después se arregla», "
        "o compra el que había disponible en lugar del que quería.",

        "El resultado se paga durante los tres años siguientes, no durante las fiestas.",

        {"ol": [
            "No dejes de hacer la revisión mecánica por falta de tiempo.",
            "No entregues dinero sin el certificado de gravámenes.",
            "No aceptes un «arreglamos el traspaso en enero».",
            "No compres el que había si no es el que querías.",
            "No estires el presupuesto porque el décimo lo hace parecer posible.",
        ]},

        f"Los puntos técnicos están en el {link(CHECKLIST, 'checklist de 20 puntos')} y la "
        f"verificación documental en {link(PATIO, 'comprar en patio o a un particular')}.",

        {"h2": "¿Y enero?"},

        "Enero tiene una dinámica distinta y para algunos compradores es mejor momento.",

        "Pasada la euforia de diciembre, la demanda baja y quien no vendió en las fiestas "
        "suele estar más dispuesto a negociar. Al mismo tiempo, aparece la cuenta de "
        "matrícula y de gastos escolares, así que hay vendedores con apuro por liquidez.",

        "La contrapartida es que la oferta es menor: lo mejor de diciembre ya se vendió. Es "
        "un intercambio entre variedad y poder de negociación.",

        {"tabla": [
            ["", "Diciembre", "Enero"],
            ["Oferta disponible", "Mayor", "Menor"],
            ["Poder de negociación", "Menor", "Mayor"],
            ["Prisa del comprador", "Alta", "Baja"],
            ["Promociones de financiamiento", "Más frecuentes", "Menos"],
        ]},

        {"h2": "El décimo como entrada"},

        "Para muchos compradores el décimo tercero es exactamente lo que faltaba para la "
        "entrada, y eso es un uso perfectamente sensato.",

        "Lo que recomendamos es no destinarlo entero. Un vehículo usado necesita un colchón "
        "para el primer mantenimiento, la matrícula del año y el seguro. Dejar una parte "
        "reservada para eso evita que el auto nuevo se convierta en un problema en febrero.",

        f"Sobre cuánto conviene poner de entrada escribimos "
        f"{link(ENTRADA, 'esta guía')}, y sobre cómo queda la cuota, "
        f"{link(CUOTA, 'esta otra')}.",

        {"h2": "Lo que sí conviene aprovechar de diciembre"},

        "Con todas las advertencias dichas, hay tres cosas concretas que la época sí "
        "habilita y vale la pena usar:",

        {"ol": [
            "<strong>Más oferta para comparar.</strong> Con más vehículos disponibles al "
            "mismo tiempo, podés ver tres o cuatro unidades del mismo segmento en un día y "
            "elegir con criterio.",
            "<strong>Mejor posición para negociar la parte de pago.</strong> Los patios "
            "reciben más vehículos en esta época y hay más disposición a hacer una "
            "valoración competitiva del tuyo.",
            "<strong>Condiciones de financiamiento.</strong> El cierre de año a veces trae "
            "plazos o tasas que en marzo no están.",
        ]},

        "Lo que no conviene aprovechar es la sensación de urgencia. La oferta de diciembre "
        "existe también en enero, con menos gente compitiendo por ella.",

        {"h2": "Si vas a vender el tuyo"},

        "Para el lado vendedor la lectura se invierte: diciembre es buen momento porque hay "
        "más compradores con liquidez. Si pensás cambiar de auto, tener el tuyo listo antes "
        "de que empiece el movimiento juega a favor.",

        "Eso significa papeles al día, sin multas, con la revisión vigente y con el "
        "historial de mantenimiento a mano. Un vehículo así se vende más rápido y sostiene "
        "mejor el precio que uno con la carpeta a medias.",

        {"faq": [
            ("¿Qué sí conviene aprovechar de diciembre?",
             "Más oferta para comparar varias unidades el mismo día, mejor disposición de "
             "los patios a valorar tu auto como parte de pago, y condiciones de "
             "financiamiento de cierre de año. Lo que no conviene aprovechar es la "
             "sensación de urgencia."),
            ("Si voy a vender el mío, ¿diciembre es buen momento?",
             "Sí, porque hay más compradores con liquidez. Conviene tenerlo listo antes de "
             "que empiece el movimiento: papeles al día, sin multas, revisión vigente y el "
             "historial de mantenimiento a mano."),
            ("¿Los autos usados bajan de precio en diciembre?",
             "No de forma significativa. El precio de un seminuevo depende del año, el "
             "kilometraje, el estado y la demanda del modelo. En diciembre hay más "
             "movimiento y más oferta, pero no una caída general de precios."),
            ("¿Conviene esperar a enero para comprar?",
             "Depende de qué priorices. En enero hay menos oferta pero más poder de "
             "negociación; en diciembre hay más variedad y más promociones de "
             "financiamiento, con el riesgo de comprar apurado."),
            ("¿Puedo usar el décimo tercero como entrada?",
             "Sí, y es un uso habitual. La recomendación es no destinarlo entero: conviene "
             "reservar una parte para el primer mantenimiento, la matrícula del año y el "
             "seguro."),
            ("¿Qué no debo dejar de hacer aunque tenga prisa?",
             "La revisión mecánica y la verificación de papeles, en especial el certificado "
             "de gravámenes. Son los dos pasos que evitan los problemas más caros, y son "
             "justamente los que la prisa hace saltar."),
        ]},

        f"Si estás pensando en cambiar de auto antes de fin de año, escribinos al "
        f"{link(wa('Hola, quiero cambiar de auto antes de fin de año y ver qué opciones hay.'), 'WhatsApp de OKCars')} "
        f"y coordinamos. Mirá el {link(LISTADO, 'listado de vehículos disponibles')}. "
        f"Estamos en Ibarra y atendemos a compradores de toda Imbabura y del Carchi.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · Auto para aplicaciones
# ════════════════════════════════════════════════════════════════════════════
apps = {
    "title": "Auto usado para trabajar en aplicaciones: qué mirar antes de comprar",
    "slug": "auto-usado-para-trabajar-aplicaciones",
    "date": "2026-11-30T09:00:00",
    "cat": CAT["guias"],
    "tags": ["auto para aplicaciones", "trabajar con el auto", "consumo de combustible",
             "guía de compra", "seminuevos Ecuador"],
    "excerpt": "Cuando el auto es la herramienta de trabajo, la cuenta cambia: el consumo "
               "y el costo de mantenimiento pesan más que el precio de compra. Qué "
               "priorizar y qué evitar.",
    "yoast_title": "Auto usado para trabajar en aplicaciones: qué mirar",
    "yoast_desc": "Consumo, mantenimiento, espacio y confiabilidad: qué priorizar al "
                  "comprar un auto usado que va a trabajar muchas horas al día, y qué evitar del todo.",
    "focus_kw": "auto usado para trabajar aplicaciones",
    "bloques": [
        "Cuando el auto deja de ser transporte y se convierte en herramienta de trabajo, "
        "todos los criterios de compra cambian de orden.",

        "El precio de compra pasa a segundo plano. Lo que manda es cuánto cuesta operarlo "
        "cada día, porque ese costo se multiplica por muchas horas y muchos kilómetros.",

        {"h2": "El consumo manda"},

        "Es el rubro más grande y el más constante. Un vehículo que consume un poco más por "
        "cada cien kilómetros, multiplicado por los kilómetros de un mes de trabajo "
        "intensivo, se convierte en una diferencia mensual considerable.",

        "Por eso los híbridos aparecen tanto en este uso a nivel mundial. En trayectos "
        "urbanos con muchas paradas —que es exactamente el patrón de trabajo con "
        "aplicaciones— un híbrido rinde de forma que ningún auto a gasolina equivalente "
        "alcanza.",

        f"En el patio, el {link(FICHA['prius'][0], FICHA['prius'][1] + ' ' + FICHA['prius'][2])} "
        f"a {FICHA['prius'][4]} es la opción de menor consumo del listado. Tiene "
        f"{FICHA['prius'][3]} kilómetros, que es mucho, y por eso conviene leer con "
        f"atención lo que escribimos sobre "
        f"{link(KILOMETRAJE, 'cuánto kilometraje es mucho en un auto usado')}.",

        {"quote": "Al que va a trabajar con el auto le decimos que sume el combustible de "
                  "un mes antes de mirar el precio. La diferencia entre dos autos puede ser "
                  "de mil dólares en la compra y de esa misma cifra en combustible en un "
                  "año. La cuenta se da vuelta rápido.",
         "cite": CITA},

        {"h2": "Lo segundo: costo de mantenimiento"},

        "Un auto que trabaja hace en un año los kilómetros que uno particular hace en tres. "
        "Los mantenimientos llegan tres veces más rápido, y con ellos las pastillas, las "
        "llantas, los amortiguadores y todo lo demás.",

        {"ol": [
            "<strong>Repuestos disponibles y baratos.</strong> Marcas de parque grande, no "
            "modelos exóticos.",
            "<strong>Mecánica sencilla.</strong> Menos sistemas complejos, menos cosas "
            "caras que fallar.",
            "<strong>Talleres que lo conozcan</strong> cerca de donde trabajás.",
            "<strong>Intervalos de servicio razonables</strong>, no un plan de "
            "mantenimiento costoso.",
        ]},

        "Un vehículo con repuestos caros o difíciles convierte cada parada en el taller en "
        "días sin facturar, que es el costo que más duele en este trabajo.",

        {"h2": "Lo tercero: comodidad y espacio"},

        "El conductor pasa muchas horas dentro, y los pasajeros califican la experiencia. "
        "Ambas cosas tienen consecuencias económicas.",

        {"ul": [
            "Asiento del conductor cómodo y regulable, que es lo que sostiene la espalda "
            "durante ocho horas.",
            "Plazas traseras con espacio real para las piernas.",
            "Maletero que acepte equipaje sin pelear.",
            "Aire acondicionado funcionando bien, que en este uso no es un lujo.",
            "Puertas traseras que abran amplio, para que subir y bajar sea cómodo.",
        ]},

        {"h2": "Qué evitar"},

        "Nuestra recomendación en contra, que va en tres puntos concretos:",

        {"ol": [
            "<strong>El auto más barato del mercado.</strong> Si pasa mucho tiempo en el "
            "taller, cada día parado cuesta más de lo que ahorraste.",
            "<strong>Motores grandes.</strong> Consumo y matrícula altos sin ningún "
            "beneficio para este uso.",
            "<strong>Modelos de marcas sin red establecida.</strong> El riesgo de esperar "
            "un repuesto es demasiado alto cuando el auto es tu ingreso.",
        ]},

        "Agregamos un cuarto: revisá qué requisitos de año y de estado exige la plataforma "
        "con la que vas a trabajar antes de comprar. Comprar un vehículo que después no "
        "califica es un error caro y perfectamente evitable.",

        {"h2": "La cuenta que hay que hacer"},

        "Antes de decidir, armá esta cuenta mensual con números tuyos:",

        {"ol": [
            "Kilómetros que estimás recorrer al mes.",
            "Consumo del vehículo y precio del combustible que usa.",
            "Mantenimiento prorrateado: cada cuántos kilómetros toca y cuánto cuesta.",
            "Llantas prorrateadas por su duración esperada.",
            "Seguro mensual.",
            "Cuota, si vas a financiar.",
        ]},

        f"La suma te dice cuánto tenés que facturar solo para cubrir el auto. Para las "
        f"partes de financiamiento y seguro, mirá {link(CUOTA, 'cómo se calcula la cuota')} "
        f"y {link(SEGURO, 'cuánto cuesta el seguro de un auto usado')}.",

        {"h2": "El desgaste que nadie calcula"},

        "Un auto que trabaja acumula un tipo de desgaste que el uso particular no genera, y "
        "conviene preverlo desde el día de la compra.",

        {"ul": [
            "<strong>Asientos y tapicería</strong>, por el ingreso y salida constante de "
            "pasajeros.",
            "<strong>Puertas y manijas</strong>, que se abren y cierran muchísimas veces "
            "por día.",
            "<strong>Embrague</strong>, en versiones manuales que trabajan en tráfico.",
            "<strong>Suspensión</strong>, por circular cargado en calles irregulares.",
            "<strong>Frenos</strong>, que en uso urbano se consumen mucho más rápido.",
        ]},

        "Por eso, entre dos vehículos parecidos, conviene el que tenga interior más "
        "resistente y mecánica más simple. Y por eso también un vehículo que ya trabajó "
        "antes se vende más barato: su desgaste está adelantado respecto de su kilometraje.",

        {"h2": "Autonomía y tiempos muertos"},

        "Hay un factor que solo aparece cuando el auto es tu ingreso: el tiempo que pasás "
        "sin facturar.",

        "Un vehículo con buena autonomía de tanque implica menos paradas a cargar "
        "combustible durante la jornada. Uno que pasa seguido por el taller implica días "
        "completos sin trabajar. Ambas cosas se traducen en dinero que no entra, y en este "
        "uso pesan más que la diferencia de precio de compra.",

        "Nuestra recomendación concreta es priorizar confiabilidad por encima de "
        "equipamiento. Un auto sencillo que arranca todos los días rinde más que uno "
        "completo que falla una vez al mes.",

        {"faq": [
            ("¿Qué se desgasta más en un auto que trabaja?",
             "Asientos y tapicería por el ingreso constante de pasajeros, puertas y "
             "manijas, embrague en versiones manuales que andan en tráfico, suspensión por "
             "circular cargado y frenos, que en uso urbano se consumen mucho más rápido."),
            ("¿Conviene un auto con mucho equipamiento?",
             "Para este uso, no. Priorizá confiabilidad y mecánica simple: un auto sencillo "
             "que arranca todos los días rinde más que uno completo que falla una vez al "
             "mes, porque cada día en el taller es un día sin facturar."),
            ("¿Conviene un híbrido para trabajar en aplicaciones?",
             "En uso urbano con muchas paradas es donde más rinde, y el ahorro mensual de "
             "combustible es real. Lo que hay que verificar antes de comprar uno usado es "
             "el estado de la batería híbrida, que es el componente crítico."),
            ("¿Qué kilometraje es aceptable para un auto de trabajo?",
             "Depende del modelo y del historial. Un vehículo con mecánica sencilla y "
             "mantenimiento documentado tolera kilometrajes altos mejor que uno complejo "
             "con historial incierto."),
            ("¿Es mejor gasolina o diésel para este uso?",
             "En uso urbano de auto liviano, la gasolina o un híbrido suelen tener mejor "
             "cuenta. El diésel rinde en vehículos pesados o con mucha carretera y carga."),
            ("¿Qué reviso antes de comprar un auto para trabajar?",
             "Además de la revisión mecánica habitual, el costo de los repuestos de mayor "
             "rotación, la disponibilidad de talleres cerca y los requisitos de la "
             "plataforma con la que vas a trabajar."),
        ]},

        f"Si trabajás con aplicaciones en Ibarra, Otavalo o el resto de Imbabura y querés que hagamos la cuenta de consumo "
        f"juntos, escribinos al "
        f"{link(wa('Hola, busco un auto usado para trabajar en aplicaciones y quiero ver opciones económicas.'), 'WhatsApp de OKCars')}. "
        f"Mirá el {link(LISTADO, 'listado disponible')}. Estamos en Ibarra.",
    ],
}


if __name__ == "__main__":
    for spec in (nuevo_vs, reventa, fin_ano, apps):
        guarda(spec)
        print("  spec escrito:", spec["slug"])
