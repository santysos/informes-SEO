#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote K — seguros y crédito (5 posts). Tanda de octubre 2026.

Search Console muestra un cluster de seguros con miles de impresiones entre las
posiciones 15 y 45 («seguros de autos baratos» 35 impr pos 22,9; «cuanto cuesta un
seguro de auto» 55 pos 12,6; «seguro vehicular precios» 61 pos 16,7). El post
publicado «seguro de auto usado: qué cubre y cuánto cuesta» ya responde el precio;
estos tres van a ángulos que ese post solo roza: el deducible, cómo pagar menos y las
exclusiones del todo riesgo.

Los dos de crédito atacan perfiles que el sitio no tenía: quien no tiene rol de pagos
(gran parte del comercio de Otavalo) y quien quiere terminar de pagar antes.

Escrito en USTED. Las cifras salen de comun.py (posts ya publicados).
"""
from comun import (CAT, CENTRAL, CITA, CREDITO, CUOTA, DEDUCIBLE_EJEMPLO, ENTRADA,
                   ENTRADA_RANGO, CUOTA_TOPE, FECHAS, FICHA, LISTADO, PRENDA,
                   SEGURO, SEGURO_ANTIGUO, SEGURO_DANOS, SEGURO_PRECIO, SEGURO_REGLA,
                   SEGURO_TABLA, SEGURO_VIAJES, SIN_HISTORIAL, BANCO, APROBACION,
                   cierre, enlace_ficha, guarda, link)

# ════════════════════════════════════════════════════════════════════════════
# 1 · Deducible
# ════════════════════════════════════════════════════════════════════════════
deducible = {
    "title": "Deducible del seguro vehicular: cómo funciona y cuándo reclamar",
    "slug": "deducible-seguro-vehicular-como-funciona",
    "date": FECHAS[1],
    "cat": CAT["guias"],
    "tags": ["deducible seguro vehicular", "seguro todo riesgo", "seguro auto usado",
             "siniestro vehicular", "seguros Imbabura"],
    "excerpt": "El deducible es la parte del arreglo que paga usted aunque tenga seguro. "
               "Cómo se calcula en cada tipo de siniestro, cómo cambia la prima y en qué "
               "casos conviene no reclamar un daño pequeño.",
    "yoast_title": "Deducible del seguro vehicular: cómo funciona",
    "yoast_desc": "Qué parte del arreglo paga usted, cómo se calcula en choques, robo y "
                  "pérdida total, y cuándo un daño pequeño no conviene reclamarlo al seguro.",
    "focus_kw": "deducible seguro vehicular",
    "bloques": [
        "Mucha gente descubre el deducible el día del primer choque. Lleva el auto al "
        "taller, la aseguradora aprueba el arreglo y aun así le piden que pague una parte. "
        "No es un cobro sorpresa: estaba en la póliza desde el primer día, solo que nadie "
        "la leyó con calma.",

        "Entender esa cifra antes de firmar cambia dos decisiones: qué póliza elegir y qué "
        "hacer cuando el daño es menor. Aquí va cómo funciona en la práctica, con números.",

        {"h2": "El deducible es lo que usted pone en cada siniestro"},

        "El deducible es la parte del daño que asume el asegurado cada vez que usa el "
        "seguro. La aseguradora paga el resto. En Ecuador casi siempre se expresa como un "
        f"porcentaje del siniestro con un piso fijo, del tipo «{DEDUCIBLE_EJEMPLO}».",

        "Eso significa que se paga el mayor de los dos valores. Si el arreglo cuesta "
        "$1.800, el 10 % son $180, pero como el mínimo es $250, usted paga $250 y la "
        "aseguradora $1.550. Si el arreglo cuesta $4.000, el 10 % son $400: ahí ya manda "
        "el porcentaje.",

        {"tabla": [
            ["Costo del arreglo", "10 % del daño", "Usted paga", "Paga la aseguradora"],
            ["$600", "$60", "$250", "$350"],
            ["$1.800", "$180", "$250", "$1.550"],
            ["$4.000", "$400", "$400", "$3.600"],
            ["$9.000", "$900", "$900", "$8.100"],
        ]},

        "El ejemplo usa una fórmula referencial. Cada póliza fija su propio porcentaje y su "
        "propio mínimo, y esos dos números son lo primero que conviene buscar en la "
        "cotización.",

        {"h2": "No hay un solo deducible: cambia según lo que pase"},

        "Una misma póliza suele tener deducibles distintos para cada tipo de evento. Es "
        "común encontrar algo así:",

        {"ul": [
            "<strong>Daño parcial por choque:</strong> el porcentaje con mínimo que se "
            "explicó arriba. Es el que más se usa.",
            "<strong>Pérdida total:</strong> cuando el arreglo supera cierto porcentaje del "
            "valor del auto, se indemniza el valor asegurado menos un deducible que suele "
            "ser un porcentaje del valor total.",
            "<strong>Robo total:</strong> a veces con un deducible mayor si el auto no "
            "tiene dispositivo de rastreo instalado.",
            "<strong>Rotura de vidrios:</strong> en algunas pólizas sin deducible o con uno "
            "bajo; en otras, con el mismo de daño parcial.",
            "<strong>Responsabilidad civil:</strong> los daños que usted causa a otros "
            "normalmente no tienen deducible para el tercero afectado.",
        ]},

        "Antes de firmar, pida la tabla completa de deducibles y no se quede con el de choque. La "
        "diferencia entre una póliza y otra suele esconderse en el de robo o en el de "
        "pérdida total.",

        {"h2": "Prima baja y deducible alto: la cuenta que hay que hacer"},

        "Deducible y prima se mueven en sentido contrario. Aceptar un deducible más alto "
        "abarata la prima anual, porque usted asume una parte mayor del riesgo. La pregunta "
        "es si tiene con qué pagar ese deducible el día que lo necesite.",

        f"En el artículo sobre {link(SEGURO_PRECIO, 'cuánto cuesta el seguro de un auto usado')} "
        "comparamos dos pólizas con un solo siniestro. Aquí la misma lógica con tres "
        "escenarios a lo largo de un año:",

        {"tabla": [
            ["Escenario del año", "Póliza A (prima $620, mínimo $400)",
             "Póliza B (prima $780, mínimo $180)"],
            ["Sin siniestros", "$620", "$780"],
            ["Un choque de $900", "$1.020", "$960"],
            ["Dos choques de $900", "$1.420", "$1.140"],
        ]},

        "Para quien maneja poco y con cuidado, la póliza A sale más barata la mayoría de "
        "los años. Para quien recorre a diario la Panamericana entre Ibarra y Otavalo o "
        "estaciona en la calle, la B empieza a ganar desde el primer golpe.",

        {"quote": "Cuando un cliente compra con crédito le pedimos que piense en el deducible "
                  "como un ahorro que tiene que existir. Si el día del choque no tiene esos "
                  "$400, el auto se queda parado en el taller aunque el seguro ya haya "
                  "aprobado el arreglo.",
         "cite": CITA},

        {"h2": "Cuándo no conviene reclamar un daño pequeño"},

        "Hay daños que el seguro cubre pero que no vale la pena reportar. Un rayón en la "
        "puerta o un faro roto en un parqueadero de Ibarra pueden costar menos que el "
        "deducible mínimo; en ese caso el seguro no pagaría nada y el reclamo igual queda "
        "registrado.",

        "Ese registro importa en la renovación: muchas aseguradoras premian los años sin "
        "siniestros con una prima menor. Un reclamo pequeño puede costarle ese descuento.",

        "Para decidir, siga este orden:",

        {"ol": [
            "Pida una cotización del arreglo en un taller de confianza.",
            "Compárela con el deducible mínimo de su póliza.",
            "Si el arreglo es menor o apenas mayor que el deducible, pague por su cuenta.",
            "Si hay un tercero involucrado o lesionados, reporte siempre, aunque el daño "
            "propio sea mínimo.",
            "Si duda, consulte con su asesor de seguros antes de reportar: muchos orientan "
            "sin abrir el caso formalmente.",
        ]},

        "El cuarto punto no admite excepción. Un acuerdo verbal con el otro conductor puede "
        "romperse días después, y un reclamo tardío es una de las causas más comunes de "
        "rechazo.",

        {"h2": "Cuándo un deducible alto no le conviene"},

        "Subir el deducible para pagar menos prima tiene sentido para quien tiene ahorro "
        "disponible y maneja en condiciones de poco riesgo. No le conviene si:",

        {"ul": [
            "Compró con crédito y su presupuesto mensual ya está ajustado.",
            "Usa el auto para trabajar y cada día parado le cuesta ingresos.",
            "Recorre a menudo rutas de montaña o viaja seguido a Tulcán o a Quito.",
            "Es un conductor nuevo, sin años de experiencia al volante.",
        ]},

        f"Si viaja con frecuencia entre provincias, revise además lo que explicamos sobre "
        f"{link(SEGURO_VIAJES, 'el seguro en viajes interprovinciales')}.",

        {"h2": "Tres preguntas para hacer antes de firmar la póliza"},

        "Con estas tres respuestas puede comparar cotizaciones de forma honesta:",

        {"ol": [
            "¿Cuál es el deducible para choque, para robo y para pérdida total, con "
            "porcentaje y mínimo de cada uno?",
            "¿El deducible de robo cambia si el auto no tiene rastreo satelital?",
            "¿Cuánto sube la prima en la renovación después de un reclamo?",
        ]},

        "Si una cotización no responde esas tres cosas por escrito, todavía no está "
        "completa.",

        {"faq": [
            ("¿El deducible se paga cada vez que uso el seguro?",
             "Sí. Se aplica a cada siniestro por separado. Si tiene dos choques en el año, "
             "paga el deducible dos veces, según el monto de cada arreglo."),
            ("¿Quién paga el deducible si el otro conductor tuvo la culpa?",
             "Si el responsable es el otro y su seguro asume el daño, normalmente usted no "
             "paga deducible. Si usa su propia póliza mientras se resuelve la "
             "responsabilidad, puede tener que pagarlo y luego recuperarlo."),
            ("¿Conviene un seguro sin deducible?",
             "Existen coberturas con deducible muy bajo o cero para ciertos eventos, pero la "
             "prima sube bastante. Para la mayoría de conductores rinde más un deducible "
             "moderado que pueda pagar sin problema."),
            ("¿El deducible se puede financiar?",
             "Algunos talleres y aseguradoras lo permiten, pero no es la regla. Lo prudente "
             "es tener ese valor separado desde que compra el auto."),
            ("¿Reclamar un daño pequeño sube la prima?",
             "Puede hacerlo. Muchas aseguradoras dan descuento por años sin siniestros, y un "
             "reclamo menor puede hacerle perder ese beneficio en la renovación."),
        ]},

        cierre("Hola, quiero cotizar un seminuevo en OKCars incluyendo el seguro.",
               "Si está comparando autos y quiere saber cuánto sumaría el seguro de cada "
               "uno, escríbanos al"),
    ],
}

# ════════════════════════════════════════════════════════════════════════════
# 2 · Cómo pagar menos seguro
# ════════════════════════════════════════════════════════════════════════════
pagar_menos = {
    "title": "Seguro vehicular barato: cómo pagar menos sin quedar desprotegido",
    "slug": "como-pagar-menos-seguro-vehicular",
    "date": FECHAS[5],
    "cat": CAT["guias"],
    "tags": ["seguro vehicular barato", "seguro de auto precio", "seguro auto usado",
             "ahorrar seguro auto", "seguros Ibarra"],
    "excerpt": "Bajar la prima del seguro es posible sin recortar lo que importa. Las "
               "palancas que de verdad mueven el precio, cuánto ahorra cada una y los "
               "recortes que salen caros el día del siniestro.",
    "yoast_title": "Seguro vehicular barato: cómo pagar menos",
    "yoast_desc": "Las palancas que de verdad bajan la prima: deducible, valor asegurado, "
                  "rastreo y forma de pago. Y los recortes que salen caros el día del choque.",
    "focus_kw": "seguro vehicular barato",
    "bloques": [
        "Quien busca un seguro barato casi siempre compara una sola cifra: la prima "
        "mensual. Y casi siempre termina eligiendo la póliza que menos protege, porque el "
        "precio bajo se consigue quitando coberturas que solo se extrañan el día del "
        "choque.",

        "Se puede pagar menos sin caer en eso. Hay ajustes que bajan la prima de forma "
        "legítima y otros que solo trasladan el riesgo a su bolsillo. La diferencia está en "
        "saber cuál es cuál.",

        {"h2": "La respuesta corta: cuatro ajustes bajan el precio de verdad"},

        f"Como referencia, el seguro todo riesgo de un seminuevo cuesta {SEGURO_REGLA}. "
        "Dentro de ese rango, lo que más mueve su cifra es el deducible que acepte, que el "
        "valor asegurado sea el correcto, tener rastreo satelital y pagar la prima anual "
        "de una vez. Lo demás son detalles.",

        {"tabla": SEGURO_TABLA},

        f"Son los rangos que publicamos en {link(SEGURO_PRECIO, 'cuánto cuesta el seguro de un auto usado')}. "
        "La meta de este artículo es ubicarse en la parte baja de cada fila sin perder "
        "cobertura.",

        {"h2": "Subir el deducible, solo si puede pagarlo"},

        "Es la palanca más directa. Aceptar un deducible mayor reduce la prima porque usted "
        "asume una parte más grande de cada arreglo. Funciona bien para quien tiene ahorro "
        "disponible y maneja poco.",

        "El riesgo es quedarse sin ese dinero el día del choque. Si el auto se compró con "
        "crédito y el presupuesto está justo, un deducible alto puede dejar el vehículo "
        "parado en el taller aunque el seguro ya haya aprobado el arreglo.",

        {"h2": "Asegurar por el valor real, ni más ni menos"},

        "Declarar un valor más alto que el comercial solo encarece la prima: en una pérdida "
        "total la aseguradora indemniza el valor real. Declarar menos parece un ahorro, pero "
        "en un robo recibe el valor declarado y en un daño parcial muchas pólizas pagan solo "
        "la proporción asegurada.",

        "Hay un ajuste que pocos hacen: revisar el valor asegurado en cada renovación. Un "
        "auto pierde valor cada año y la póliza debería acompañar esa baja. Si se renueva en "
        "automático por la misma cifra, se paga prima sobre dinero que nunca le van a "
        "reconocer.",

        {"h2": "Lo que el perfil y el uso cambian en la prima"},

        "Las aseguradoras cotizan el riesgo, y varios factores de ese riesgo dependen de "
        "decisiones que usted controla:",

        {"ul": [
            "<strong>Rastreo satelital.</strong> Reduce el riesgo de robo y muchas pólizas "
            "lo premian, en algunas incluso es requisito para ciertos modelos.",
            "<strong>Lugar de pernocte.</strong> Un garaje cerrado en casa no se cotiza igual "
            "que la calle frente al edificio.",
            "<strong>Uso declarado.</strong> Uso particular cuesta menos que uso comercial, "
            "pero hay que declarar la verdad: si el auto trabaja en aplicaciones y no se "
            "informó, el reclamo puede ser rechazado.",
            "<strong>Conductor principal.</strong> Declarar como principal a quien de verdad "
            "maneja más, con su edad y su historial reales.",
            "<strong>Años sin siniestros.</strong> Un historial limpio baja la prima en la "
            "renovación; reclamar daños menores puede hacerle perder ese descuento.",
        ]},

        {"quote": "Vemos clientes que eligen el auto y después descubren que su seguro cuesta "
                  "casi lo mismo que un mes de cuota. Cotice el seguro antes de decidir, no "
                  "después: a veces el modelo que parecía caro termina siendo el más barato "
                  "de mantener.",
         "cite": CITA},

        {"h2": "El modelo que elige ya decide buena parte del precio"},

        "Antes de comprar, el factor más grande es el propio vehículo. Modelos con mucho "
        "robo en el país o con repuestos importados difíciles de conseguir se cotizan más "
        "caros, aunque el valor del auto sea parecido.",

        f"Por eso conviene pedir cotización de dos o tres opciones antes de decidir. En el "
        f"patio de Ibarra, por ejemplo, el {enlace_ficha('seltos')} y el "
        f"{enlace_ficha('territory')} cuestan lo mismo ({FICHA['seltos'][4]}), pero su "
        f"seguro puede no costar igual. Esa diferencia, repetida doce meses al año, pesa.",

        {"h2": "Cómo pedir cotizaciones para comparar de verdad"},

        {"ol": [
            "Envíe los mismos datos a todas: marca, modelo, año, versión, valor comercial, "
            "ciudad de circulación, lugar de pernocte, edad del conductor y uso.",
            "Pida en cada respuesta la prima anual, la mensual y el deducible de choque, "
            "robo y pérdida total.",
            "Pregunte qué asistencia incluye y cuál es el radio de la grúa.",
            "Compare cuánto pagaría en un año sin siniestros y en un año con un choque.",
            "Pregunte el descuento por pago anual y por años sin siniestros.",
        ]},

        "El radio de la grúa importa más en el norte del país que en una ciudad grande: "
        "una asistencia limitada al casco urbano no sirve si el auto se queda en la vía a "
        "Tulcán o en una subida de Imbabura.",

        {"h2": "Los recortes que salen caros"},

        "Hay ahorros que no le convienen aunque bajen la prima. Evítelos si su auto vale "
        "más de lo que podría reponer de su bolsillo:",

        {"ul": [
            "Quedarse solo con daños a terceros en un auto de valor alto. Lo explicamos en "
            f"{link(SEGURO_DANOS, 'el artículo sobre seguro contra daños a terceros')}.",
            "Quitar la cobertura de robo para ahorrar unos dólares al mes.",
            "Infraasegurar el vehículo declarando un valor menor.",
            "Elegir la póliza sin leer las exclusiones.",
        ]},

        f"Si su auto tiene varios años, revise además los "
        f"{link(SEGURO_ANTIGUO, 'límites de antigüedad que ponen las aseguradoras')}.",

        {"h2": "Una regla práctica para decidir"},

        "La póliza barata es la que le cuesta menos en el año que tenga un choque, no la de "
        "prima más baja. Haga esa cuenta con cada cotización y la elección suele quedar "
        "clara.",

        {"faq": [
            ("¿Cuál es el seguro vehicular más barato en Ecuador?",
             "Depende del auto, del conductor y del uso. Una póliza solo de daños a terceros "
             "es la de menor prima, pero no cubre los daños de su propio vehículo. Para un "
             "seminuevo, el todo riesgo suele costar " + SEGURO_REGLA + "."),
            ("¿Pagar el seguro anual sale más barato que mensual?",
             "En muchas aseguradoras sí, porque el pago fraccionado suele tener un recargo. "
             "Pregunte el precio de las dos formas antes de elegir."),
            ("¿El rastreo satelital baja el precio del seguro?",
             "En muchas pólizas sí, porque reduce el riesgo de robo. En algunos modelos con "
             "alto índice de robo incluso es requisito para asegurarlos."),
            ("¿Puedo bajar el valor asegurado para pagar menos?",
             "Puede, pero si el auto se pierde o lo roban recibirá ese valor menor, y en "
             "daños parciales muchas pólizas pagan solo la proporción asegurada. Lo correcto "
             "es asegurar por el valor comercial real."),
            ("¿Conviene cambiar de aseguradora cada año?",
             "Conviene cotizar en cada renovación. Cambiar tiene sentido si la diferencia es "
             "real con las mismas coberturas, sin perder el historial sin siniestros."),
        ]},

        cierre("Hola, quiero ver un seminuevo en OKCars y saber cuánto costaría su seguro.",
               "Si quiere comparar el seguro de dos o tres autos antes de decidir, "
               "escríbanos al"),
    ],
}

# ════════════════════════════════════════════════════════════════════════════
# 3 · Lo que no cubre el todo riesgo
# ════════════════════════════════════════════════════════════════════════════
no_cubre = {
    "title": "Seguro todo riesgo: lo que no cubre y por qué rechazan reclamos",
    "slug": "seguro-todo-riesgo-que-no-cubre",
    "date": FECHAS[9],
    "cat": CAT["guias"],
    "tags": ["seguro todo riesgo", "exclusiones seguro vehicular", "reclamo seguro auto",
             "seguro auto usado", "seguros Imbabura"],
    "excerpt": "Todo riesgo no quiere decir todo cubierto. Las exclusiones que más reclamos "
               "tumban en Ecuador, cómo evitar cada una y qué revisar en la póliza antes de "
               "firmar.",
    "yoast_title": "Seguro todo riesgo: lo que no cubre",
    "yoast_desc": "Las exclusiones que más reclamos tumban: uso no declarado, licencia, "
                  "alcohol, desgaste y aviso tardío. Cómo evitar cada una antes de necesitarla.",
    "focus_kw": "seguro todo riesgo que no cubre",
    "bloques": [
        "El nombre engaña. «Todo riesgo» suena a que cualquier cosa que le pase al auto "
        "está cubierta, y por eso duele tanto cuando un reclamo se rechaza. Casi siempre el "
        "motivo estaba escrito en la póliza, en la sección de exclusiones que nadie lee al "
        "firmar.",

        "Este artículo no reemplaza la lectura de su póliza, porque cada aseguradora redacta "
        "las suyas. Reúne las exclusiones que se repiten en casi todas y que más reclamos "
        "tumban, para que sepa qué buscar.",

        {"h2": "Lo que casi ninguna póliza todo riesgo paga"},

        "Las exclusiones típicas se agrupan en cinco temas. Si conoce estos cinco, conoce "
        "la mayoría de los rechazos:",

        {"ol": [
            "Conducir sin licencia vigente o con una categoría que no corresponde al "
            "vehículo.",
            "Conducir bajo efectos del alcohol o de sustancias.",
            "Usar el auto para algo distinto de lo declarado, como transporte de pasajeros o "
            "reparto.",
            "Desgaste normal y fallas mecánicas o eléctricas que no vienen de un accidente.",
            "No avisar a tiempo o alterar la escena antes de la inspección.",
        ]},

        "A eso se suman exclusiones más específicas que varían por póliza: objetos dentro "
        "del auto, accesorios no declarados, daños en competencias o vías no habilitadas y, "
        "en algunas, eventos de la naturaleza.",

        {"h2": "El uso no declarado es la causa que más se repite"},

        "En el norte del país es muy común comprar un auto para la familia y, meses "
        "después, usarlo para hacer carreras en aplicaciones o para repartir mercadería. "
        "Si eso no se informó a la aseguradora, el auto está asegurado para un uso que ya no "
        "es el real.",

        "El día del choque, el ajustador pregunta qué hacía el vehículo. Si había pasajeros "
        "de una aplicación, la aseguradora tiene argumento para no pagar. La solución es "
        "sencilla: avisar el cambio de uso y aceptar el ajuste de prima.",

        {"quote": "Cuando alguien nos cuenta que va a usar el auto para trabajar con "
                  "aplicaciones, lo primero que le decimos es que lo declare en el seguro. Esa "
                  "diferencia de prima es mucho menor que perder la cobertura en el primer "
                  "choque.",
         "cite": CITA},

        {"h2": "Fallas mecánicas: el seguro no es una garantía"},

        "Otra confusión frecuente. El seguro paga daños causados por un evento súbito: un "
        "choque, un volcamiento, un incendio. No paga que el motor se funda por falta de "
        "aceite, que la caja automática falle por desgaste o que las pastillas de freno se "
        "terminen.",

        "Para eso existe el mantenimiento y, en un seminuevo, la garantía comercial del "
        "vendedor. Son coberturas distintas y conviene tener claro cuál responde por qué.",

        {"tabla": [
            ["Situación", "¿La cubre el seguro?", "Quién responde"],
            ["Choque con otro vehículo", "Sí, menos el deducible", "Aseguradora"],
            ["Motor fundido por falta de aceite", "No", "El dueño"],
            ["Caja automática que falla por desgaste", "No", "Garantía comercial, si aplica"],
            ["Inundación del motor al cruzar una vía anegada", "Depende de la póliza", "Revisar exclusiones"],
            ["Robo de la radio o de objetos personales", "Muchas veces no", "Revisar cobertura de accesorios"],
        ]},

        {"h2": "El aviso tardío y la escena alterada"},

        "Las pólizas fijan un plazo para reportar el siniestro, normalmente corto. Si pasa "
        "ese plazo, la aseguradora puede negarse a pagar porque ya no puede verificar qué "
        "ocurrió.",

        "Lo mismo pasa si se mueve el vehículo, se arregla por cuenta propia o se llega a "
        "un acuerdo con el otro conductor sin avisar. Después de un choque, el orden "
        "correcto es este:",

        {"ol": [
            "Ponerse a salvo y señalizar el lugar.",
            "Llamar a la línea de asistencia de su aseguradora desde el sitio.",
            "Tomar fotos del lugar, de los vehículos y de los documentos del otro conductor.",
            "No firmar acuerdos ni reconocer culpa antes de hablar con la aseguradora.",
            "Esperar la inspección o seguir las instrucciones que le den por teléfono.",
        ]},

        f"Si el accidente involucra a otro vehículo o a personas, la parte de terceros se "
        f"rige por lo que explicamos en {link(SEGURO_DANOS, 'el seguro contra daños a terceros')}.",

        {"h2": "Agua, granizo y accesorios: las zonas grises"},

        "Hay coberturas que unas pólizas incluyen y otras no, y que en la Sierra norte "
        "pesan más de lo que parece. Las lluvias fuertes de la temporada invernal anegan "
        "tramos de vía, y el granizo cae con frecuencia en zonas altas de Imbabura y "
        "Carchi.",

        "Un motor que se apaga al cruzar un charco profundo y se daña al intentar "
        "encenderlo de nuevo es un caso clásico de discusión. Algunas pólizas lo pagan "
        "como evento de la naturaleza; otras lo consideran negligencia del conductor. La "
        "diferencia está en la redacción y conviene leerla antes de la primera lluvia "
        "fuerte.",

        "Con los accesorios pasa algo parecido. Aros de lujo, una pantalla nueva, un "
        "balde con cobertor o una barra antivuelco instalados después de la compra "
        "normalmente no están asegurados si no se declararon. Si el auto se roba o se "
        "choca, la aseguradora paga el vehículo como estaba en la póliza, sin lo que se "
        "le agregó.",

        "La solución es simple: cada vez que instale algo de valor, envíe la factura a su "
        "asesor y pida que lo agregue. Suele sumar poco a la prima.",

        {"h2": "Cuándo una exclusión no aplica aunque parezca"},

        "No todo lo que suena a exclusión lo es. Algunos casos que generan dudas en Ibarra y "
        "alrededores:",

        {"ul": [
            "<strong>Prestar el auto a un familiar</strong> con licencia vigente suele estar "
            "cubierto, pero algunas pólizas limitan los conductores autorizados.",
            "<strong>Viajar a otra provincia</strong> está cubierto en la mayoría de pólizas "
            f"nacionales; lo detallamos en {link(SEGURO_VIAJES, 'seguro y viajes interprovinciales')}.",
            "<strong>Caminos de tierra</strong> rumbo a comunidades de Imbabura suelen estar "
            "cubiertos si son vías de uso público, no si se trata de competencias o "
            "terrenos cerrados.",
        ]},

        {"h2": "Qué revisar en su póliza esta semana"},

        "Busque la sección de exclusiones y confirme estos cinco puntos. Si alguno no está "
        "claro, pregunte por escrito a su asesor:",

        {"ul": [
            "Qué uso está declarado y si coincide con el uso real.",
            "Quiénes pueden manejar el auto.",
            "Cuál es el plazo para reportar un siniestro.",
            "Si los accesorios instalados después de la compra están declarados.",
            "Qué pasa con daños por agua o eventos de la naturaleza.",
        ]},

        {"faq": [
            ("¿El seguro todo riesgo cubre fallas mecánicas?",
             "No. Cubre daños causados por eventos súbitos como choques, volcamientos o "
             "incendios. Las fallas por desgaste o falta de mantenimiento corren por cuenta "
             "del dueño o de la garantía comercial, si la hay."),
            ("¿Me pagan si choco usando el auto en una aplicación de transporte?",
             "Solo si ese uso estaba declarado en la póliza. Si el auto estaba asegurado para "
             "uso particular, la aseguradora puede rechazar el reclamo."),
            ("¿Cuánto tiempo tengo para reportar un choque?",
             "Depende de la póliza, pero el plazo suele ser corto. Lo más seguro es llamar a "
             "la línea de asistencia desde el lugar del accidente."),
            ("¿El seguro cubre los objetos que estaban dentro del auto?",
             "En muchas pólizas no, o solo con una cobertura adicional. Revise la sección de "
             "exclusiones y la de accesorios."),
            ("¿Si presto el auto a otra persona sigue asegurado?",
             "Generalmente sí, si esa persona tiene licencia vigente y de la categoría "
             "correcta. Algunas pólizas limitan los conductores autorizados, así que conviene "
             "confirmarlo."),
        ]},

        cierre("Hola, quiero ver un seminuevo en OKCars y entender qué seguro le conviene.",
               "Si va a comprar y quiere entender qué póliza le conviene al auto que "
               "elija, escríbanos al"),
    ],
}

# ════════════════════════════════════════════════════════════════════════════
# 4 · Crédito sin rol de pagos
# ════════════════════════════════════════════════════════════════════════════
independientes = {
    "title": "Crédito para auto sin rol de pagos: cómo califican los independientes",
    "slug": "credito-auto-comerciantes-independientes",
    "date": FECHAS[13],
    "cat": CAT["financiamiento"],
    "tags": ["credito auto sin rol de pagos", "credito vehicular independientes",
             "financiamiento comerciantes", "credito auto Otavalo", "seminuevos Imbabura"],
    "excerpt": "Comerciantes, transportistas y agricultores sí califican para un crédito "
               "vehicular aunque no tengan rol de pagos. Qué papeles demuestran ingresos, "
               "por qué suelen pedir más entrada y cómo prepararse.",
    "yoast_title": "Crédito para auto sin rol de pagos: cómo calificar",
    "yoast_desc": "Comerciantes, transportistas y agricultores sí califican. Qué papeles "
                  "demuestran sus ingresos, cuánta entrada suelen pedir y cómo prepararse.",
    "focus_kw": "credito para auto sin rol de pagos",
    "bloques": [
        "En Imbabura una parte grande de quienes compran auto no tiene rol de pagos. Son "
        "comerciantes de la plaza de Otavalo, transportistas, dueños de talleres o "
        "productores de Cayambe que ganan bien, pero cuyo ingreso no llega en una "
        "transferencia fija cada quince días.",

        "Ese perfil sí puede financiar un vehículo. Lo que cambia es la forma de demostrar "
        "el ingreso y, casi siempre, el monto de la entrada. Aquí va qué piden y cómo "
        "prepararse para que la respuesta sea sí.",

        {"h2": "Sí califica, pero con más entrada"},

        "Quien no tiene rol de pagos puede acceder a un crédito vehicular si demuestra un "
        "ingreso estable con documentos. La diferencia principal está en la entrada: un "
        "comerciante con buen movimiento suele calificar poniendo entre el 35 % y el 40 % "
        "del valor del auto, cuando con rol de pagos habría entrado con alrededor del 25 %.",

        f"La razón es simple: la entidad que presta ve más riesgo en un ingreso que varía de "
        f"un mes a otro, y lo compensa pidiendo que el comprador ponga más dinero propio. "
        f"El rango general para cualquier comprador va {ENTRADA_RANGO}, según el año del "
        f"vehículo; lo explicamos en {link(ENTRADA, 'cuánto de entrada piden para un auto usado')}.",

        {"tabla": [
            ["Perfil", "Entrada habitual", "Qué pesa más en la evaluación"],
            ["Empleado con rol de pagos", "alrededor del 25 %", "Sueldo y estabilidad laboral"],
            ["Comerciante con RUC y movimiento bancario", "35 % – 40 %", "Estados de cuenta y declaraciones"],
            ["Independiente sin papeles en orden", "Difícil de aprobar", "Primero hay que formalizar el ingreso"],
        ]},

        {"h2": "Los papeles que reemplazan al rol de pagos"},

        "Lo que se busca es la misma información que da un rol: cuánto gana, desde hace "
        "cuánto y con qué regularidad. Para un independiente, eso se arma con:",

        {"ul": [
            "<strong>RUC o régimen simplificado activo</strong>, con algunos años de "
            "antigüedad. Un RUC sacado el mes pasado pesa poco.",
            "<strong>Declaraciones de impuestos</strong> de los últimos periodos, que "
            "muestren ventas o ingresos coherentes con la cuota que pide.",
            "<strong>Estados de cuenta bancarios</strong> de los últimos meses, con "
            "depósitos regulares. Aquí se nota si el negocio mueve dinero por el banco o "
            "solo en efectivo.",
            "<strong>Facturas o contratos</strong> con clientes fijos, si los tiene: una "
            "cooperativa de transporte, un mayorista, una empresa a la que provee.",
            "<strong>Patrimonio</strong>: escrituras de un terreno o local, otro vehículo a "
            "su nombre. No sustituyen al ingreso, pero dan respaldo.",
        ]},

        {"quote": "El problema casi nunca es que el comerciante gane poco. Es que todo lo "
                  "cobra en efectivo y nada pasa por el banco. Cuando nos cuentan eso, les "
                  "sugerimos depositar las ventas durante unos meses antes de pedir el crédito. "
                  "Ese historial cambia la respuesta.",
         "cite": CITA},

        {"h2": "Cómo prepararse en los meses previos"},

        "Si está pensando comprar dentro de unos meses, puede mejorar mucho su perfil con "
        "pasos sencillos:",

        {"ol": [
            "Deposite sus ventas en una sola cuenta bancaria, de forma regular.",
            "Ponga al día sus declaraciones, aunque los valores sean bajos.",
            "Evite atrasos en tarjetas o préstamos pequeños durante ese tiempo.",
            "Separe la entrada en esa misma cuenta: el ahorro visible también cuenta.",
            "Reúna facturas o contratos con sus clientes más constantes.",
        ]},

        f"Si además nunca tuvo un crédito a su nombre, el caso tiene un paso adicional que "
        f"explicamos en {link(SIN_HISTORIAL, 'comprar auto a crédito sin historial crediticio')}.",

        {"h2": "Crédito directo o banco para un independiente"},

        f"Los bancos aplican políticas fijas y un ingreso variable a veces no encaja en su "
        f"formulario. El {link(CREDITO, 'crédito directo')} lo evalúa el propio "
        f"concesionario caso a caso, y por eso suele adaptarse mejor a un comerciante con "
        f"buen movimiento pero sin sueldo fijo. A cambio, conviene comparar el costo total "
        f"del financiamiento, como explicamos en {link(BANCO, 'banco o crédito directo')}.",

        "Hay un factor que juega a favor del independiente: si el auto es para trabajar, "
        "la cuota no compite contra un sueldo sino contra lo que hoy gasta en fletes o "
        "buses. Para un comerciante que viaja cada semana entre Otavalo e Ibarra con "
        "mercadería, ese cálculo cambia la decisión.",

        {"h2": "Transportistas y agricultores: dos casos frecuentes"},

        "Dos perfiles se repiten mucho en el norte del país y cada uno tiene su forma de "
        "demostrar ingresos.",

        "<strong>Transportistas.</strong> Quien trabaja en una cooperativa de carga o de "
        "pasajeros puede pedir un certificado de la cooperativa con su antigüedad y un "
        "promedio de lo que factura. Si además tiene un vehículo de trabajo a su nombre, "
        "ese patrimonio respalda la solicitud. Una camioneta para trabajo puede incluso "
        "justificarse como herramienta del negocio y no como gasto.",

        "<strong>Productores agrícolas.</strong> En Cayambe o en el valle del Chota el "
        "ingreso llega por cosechas o por entregas a acopiadores y florícolas. Aquí sirven "
        "las liquidaciones de venta, los contratos de entrega y los estados de cuenta de "
        "los meses de cosecha. Lo importante es mostrar varios ciclos, no uno solo bueno.",

        "En los dos casos, una carta de un cliente o proveedor estable ayuda a explicar "
        "un ingreso que no tiene forma de sueldo.",

        {"h2": "Cuándo es mejor esperar"},

        "Hay situaciones en que pedir el crédito ahora solo trae un no, o una aprobación con "
        "condiciones que luego pesan:",

        {"ul": [
            "Si el negocio tiene menos de un año de funcionamiento demostrable.",
            "Si casi todo el ingreso es en efectivo y no hay forma de respaldarlo.",
            f"Si hay deudas reportadas en mora; ese caso lo vemos en {link(CENTRAL, 'comprar auto estando en central de riesgos')}.",
            f"Si la cuota superaría {CUOTA_TOPE}, una vez sumadas sus otras deudas.",
        ]},

        "En esos casos, unos meses de orden valen más que una aprobación forzada.",

        {"h2": "La regla para un comerciante"},

        "Calcule la cuota con su mes más flojo, no con el mejor. Si en temporada baja "
        "también la puede pagar, el crédito está bien dimensionado.",

        {"faq": [
            ("¿Puedo sacar un crédito vehicular sin rol de pagos?",
             "Sí. Los independientes califican demostrando ingresos con RUC, declaraciones y "
             "estados de cuenta. Lo habitual es que pidan una entrada mayor, entre el 35 % y "
             "el 40 %."),
            ("¿Sirve el RISE o régimen simplificado para un crédito de auto?",
             "Sirve como prueba de que tiene una actividad registrada. Lo que más pesa es que "
             "los ingresos se vean también en sus estados de cuenta."),
            ("¿Qué pasa si cobro todo en efectivo?",
             "Es el caso más difícil, porque no hay forma de verificar el ingreso. Lo "
             "recomendable es depositar las ventas en una cuenta durante algunos meses antes "
             "de solicitar el crédito."),
            ("¿Cuánto tarda la aprobación para un independiente?",
             "Suele tardar algo más que para un empleado, porque hay más documentos que "
             f"revisar. Los plazos generales están en {link(APROBACION, 'cuánto tarda la aprobación de un crédito')}."),
            ("¿Puedo usar mi auto actual como parte de la entrada?",
             "Sí. Su auto se valora y ese monto se suma a la entrada, lo que ayuda a llegar "
             "al porcentaje que piden a un independiente."),
        ]},

        cierre("Hola, soy comerciante independiente y quiero saber si califico para un "
               "crédito en OKCars.",
               "Si trabaja por su cuenta y quiere saber con cuánto de entrada podría "
               "calificar, escríbanos al"),
    ],
}

# ════════════════════════════════════════════════════════════════════════════
# 5 · Precancelar
# ════════════════════════════════════════════════════════════════════════════
_u, _n, _a, _km, _p = FICHA["seltos"]

precancelar = {
    "title": "Precancelar el crédito vehicular: cuándo conviene y cuánto ahorra",
    "slug": "precancelar-credito-vehicular-conviene",
    "date": FECHAS[17],
    "cat": CAT["financiamiento"],
    "tags": ["precancelar credito vehicular", "abono a capital", "credito auto usado",
             "levantar prenda vehicular", "financiamiento Ibarra"],
    "excerpt": "Abonar a capital o cancelar el crédito antes de tiempo puede ahorrar cientos "
               "de dólares en intereses. Cuándo conviene, si es mejor bajar la cuota o el "
               "plazo, y qué hacer con la prenda al terminar.",
    "yoast_title": "Precancelar el crédito vehicular: cuándo conviene",
    "yoast_desc": "Abono a capital o pago total: cuánto ahorra en intereses, si conviene "
                  "bajar la cuota o el plazo, y cómo levantar la prenda cuando termina de pagar.",
    "focus_kw": "precancelar credito vehicular",
    "bloques": [
        "Llega un ingreso extra: una buena temporada en el negocio, un décimo, la venta de "
        "un terreno. Y aparece la pregunta de si conviene meter ese dinero al crédito del "
        "auto o guardarlo.",

        "La respuesta corta es que casi siempre conviene, y que conviene más cuanto antes "
        "se haga. Pero hay matices: cómo se aplica el abono, qué dice su contrato y qué "
        "pasa con la prenda cuando termina de pagar.",

        {"h2": "Sí conviene, y más al inicio del crédito"},

        "En un crédito vehicular, las primeras cuotas son sobre todo interés, porque todavía "
        "debe casi todo el capital. Por eso un abono temprano ahorra mucho más que uno al "
        "final: cada dólar que baja del capital deja de generar interés todos los meses "
        "que faltan.",

        f"Un ejemplo con números que ya publicamos en {link(CUOTA, 'cómo se calcula la cuota')}: "
        f"un {link(_u, 'Kia Seltos')} de {_p} con 30 % de entrada deja $14.350 por financiar. "
        "A 48 meses, la cuota ronda los $395 y los intereses del crédito completo suman "
        "cerca de $4.600.",

        "Con esa misma deuda, el efecto de un abono cambia mucho según el momento en que "
        "se haga:",

        {"tabla": [
            ["Momento del abono", "Capital pendiente aproximado", "Intereses que quedan por delante"],
            ["Mes 6", "la mayor parte de la deuda", "la mayor parte de los $4.600"],
            ["Mes 24 (mitad del plazo)", "algo más de la mitad", "menos de un tercio"],
            ["Mes 42", "una fracción pequeña", "muy poco"],
        ]},

        "Las cifras exactas dependen de la tasa de su contrato. La forma de la curva es "
        "siempre la misma: el interés se concentra al principio, y ahí es donde el abono "
        "rinde.",

        {"h2": "Abono a capital o precancelación total"},

        "Son dos cosas distintas y conviene tenerlas claras antes de ir a la entidad:",

        {"ul": [
            "<strong>Abono a capital:</strong> paga una parte extra que va directo a reducir "
            "la deuda. El crédito sigue, pero más pequeño.",
            "<strong>Precancelación total:</strong> paga todo el saldo pendiente y el "
            "crédito termina. Solo paga el interés generado hasta ese día.",
        ]},

        "Si hace un abono, la entidad normalmente le pregunta qué prefiere: mantener el "
        "plazo y bajar la cuota, o mantener la cuota y terminar antes.",

        {"h2": "Cómo pedir el saldo exacto antes de pagar"},

        "El saldo que aparece en la aplicación del banco o en el último estado de cuenta "
        "no siempre es el valor para cancelar. Puede faltar el interés de los días "
        "corridos desde la última cuota o algún cargo pendiente.",

        "Lo correcto es pedir un certificado de saldo para precancelación con una fecha "
        "concreta de pago. Con ese documento sabe el monto exacto y evita quedar debiendo "
        "unos pocos dólares que después generan mora. Si vive en Otavalo, Cotacachi o "
        "Atuntaqui y su crédito es con una entidad de Ibarra, pregunte si puede pedirlo "
        "por correo para no viajar dos veces.",

        {"h2": "Bajar la cuota o acortar el plazo"},

        "Acortar el plazo ahorra más interés, porque elimina meses completos de deuda. "
        "Bajar la cuota ahorra menos, pero le da aire al presupuesto mensual.",

        "La elección depende de su situación. Si su ingreso es estable y la cuota actual no "
        "le aprieta, acorte el plazo. Si es comerciante o trabaja por temporadas, una cuota "
        "más baja le protege en los meses flojos, y eso también vale dinero.",

        {"quote": "Muchos clientes de Imbabura cobran fuerte en ciertas épocas del año. A ellos "
                  "les sugerimos abonar al capital cada vez que llega esa temporada, en lugar "
                  "de comprometerse desde el inicio a una cuota alta que en los meses bajos no "
                  "pueden sostener.",
         "cite": CITA},

        {"h2": "Lo que hay que revisar en el contrato antes de abonar"},

        "Las condiciones de precancelación las fija cada contrato. Antes de abonar, confirme "
        "por escrito:",

        {"ol": [
            "Si hay algún cargo por pagar antes de tiempo y cuánto es.",
            "Si el abono se aplica a capital o a cuotas futuras. Debe ir a capital.",
            "Si necesita avisar con anticipación o puede abonar cualquier día.",
            "Qué pasa con el seguro de desgravamen y el seguro del auto si estaban "
            "financiados.",
            "Cuánto tiempo toma emitir el certificado de cancelación cuando termine.",
        ]},

        "El segundo punto es el más importante. Si el abono se toma como adelanto de "
        "cuotas, no reduce el interés: solo le da unos meses sin pagar. Pida el nuevo cuadro "
        "de amortización para verificar que el capital bajó.",

        {"h2": "Al terminar: levantar la prenda"},

        "Cuando el auto se compró a crédito, queda una prenda a favor de quien prestó. "
        "Pagar la última cuota no la borra sola: hay que pedir el certificado de cancelación "
        "y hacer el levantamiento para que el vehículo quede libre.",

        f"Sin ese trámite, el auto no se puede vender ni traspasar con normalidad. Lo "
        f"explicamos en detalle en {link(PRENDA, 'comprar o vender un auto con prenda')}. Haga "
        "el levantamiento apenas termine de pagar, aunque no piense vender pronto.",

        {"h2": "Si piensa cambiar de auto antes de terminar"},

        "Hay quien compra pensando en cambiar el vehículo en dos o tres años. En ese caso "
        "el saldo pendiente se cancela al momento del cambio, normalmente con parte del "
        "valor del propio auto.",

        "Ahí los abonos también ayudan, aunque de otra forma: cuanto menor sea el saldo, "
        "más del valor de su auto queda libre como entrada para el siguiente. Un cliente "
        "que llegó al patio con la mitad del crédito pagado tiene mucho más margen que uno "
        "que apenas empezó.",

        {"h2": "Cuándo no le conviene abonar"},

        "Hay casos en que ese dinero rinde más en otro lado:",

        {"ul": [
            "Si no tiene un fondo de emergencia. Quedarse sin ahorro para pagar menos interés "
            "es un mal cambio el día que algo falla.",
            "Si tiene otra deuda más cara, como una tarjeta de crédito en mora: conviene "
            "pagar esa primero.",
            "Si su contrato cobra un cargo de precancelación que se come el ahorro.",
            "Si le falta poco para terminar: el interés que queda es mínimo.",
        ]},

        {"h2": "Una regla sencilla"},

        "Mantenga tres meses de gastos en ahorro y abone todo lo que supere eso, en la "
        "primera mitad del crédito. Después de la mitad, abonar sigue ayudando, pero cada "
        "dólar ahorra menos.",

        {"faq": [
            ("¿Me cobran por precancelar un crédito vehicular?",
             "Depende de su contrato. Revise la cláusula de pago anticipado y pida por "
             "escrito el valor exacto antes de hacer el pago."),
            ("¿Conviene más bajar la cuota o el plazo?",
             "Acortar el plazo ahorra más interés. Bajar la cuota da más tranquilidad si su "
             "ingreso varía durante el año."),
            ("¿Cuánto ahorro si abono a capital?",
             "Depende de la tasa y del momento. Un abono en los primeros meses ahorra mucho "
             "más que uno cerca del final, porque al inicio la cuota es sobre todo interés."),
            ("¿Qué hago cuando termino de pagar el crédito del auto?",
             "Pida el certificado de cancelación y haga el levantamiento de la prenda. Sin "
             "eso, el auto no se puede vender ni traspasar con normalidad."),
            ("¿Puedo vender el auto antes de terminar de pagarlo?",
             "Sí, pero primero hay que cancelar el saldo o acordar con la entidad cómo se "
             "hace, porque la prenda impide el traspaso."),
        ]},

        cierre("Hola, quiero saber cómo funcionan los abonos en el crédito de OKCars.",
               "Si quiere armar un crédito que le permita abonar sin complicaciones, "
               "escríbanos al"),
    ],
}

if __name__ == "__main__":
    for s in [deducible, pagar_menos, no_cubre, independientes, precancelar]:
        print(guarda(s))
