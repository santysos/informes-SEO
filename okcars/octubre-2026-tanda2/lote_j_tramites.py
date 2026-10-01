#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote J — trámites de compraventa, SPPAT y qué hacer tras un choque (5 posts).

Por qué estos temas: el cluster de traspaso es el más fuerte del sitio en Search
Console (el post de requisitos tiene 14.043 impresiones en posición 7,3) y alrededor
de él aparecen consultas sin un post que las responda de frente:
«quien paga el traspaso de un carro» (35 impresiones, pos 7,9), «cuando se vende un
carro quien paga el traspaso» (16), «cuando se compra un carro quien paga el
traspaso» (13) y «requisitos para vender un carro en ecuador» (10, pos 9,3).

SPPAT y «qué hacer después de un choque» completan el cluster de seguros, que tiene
demanda (seguro vehicular 197 impresiones) pero responde solo la parte comercial.

Escrito en USTED. Sin montos legales ni plazos que no estén verificados.
"""
from comun import (AVISO_COSTOS, CAT, CITA, COSTO_GRAVAMENES, COSTO_NOTARIA,
                   COSTO_TASA_ANT, DEDUCIBLE_EJEMPLO, DEVALUA, FECHAS, MATRICULA,
                   MULTAS, PAPELES, REVENTA,
                   PARTE_PAGO, PLAZO_ANT, PODER, PRENDA, SEGURO_DANOS, SEGURO_PRECIO,
                   SEGURO_VIAJES, TRASPASO, TRASPASO_MULTAS, cierre, guarda, link)


# ════════════════════════════════════════════════════════════════════════════
# 1 · Quién paga el traspaso
# ════════════════════════════════════════════════════════════════════════════
quien_paga = {
    "title": "Quién paga el traspaso de un carro: comprador o vendedor",
    "slug": "quien-paga-el-traspaso-de-un-carro",
    "date": FECHAS[0],
    "cat": CAT["tramites"],
    "tags": ["traspaso de vehículo", "quién paga el traspaso", "compraventa de autos",
             "trámites vehiculares Ecuador", "autos usados Ibarra"],
    "excerpt": "La costumbre en Ecuador es que el comprador pague el traspaso y el vendedor "
               "entregue el auto libre de multas e impuestos. Cómo repartir cada gasto y "
               "por qué conviene dejarlo por escrito.",
    "yoast_title": "Quién paga el traspaso de un carro: comprador o vendedor",
    "yoast_desc": "La costumbre en Ecuador, cuánto cuesta cada parte del trámite y qué "
                  "pasa con las multas si el traspaso no se registra. Con tabla para "
                  "repartir los gastos.",
    "focus_kw": "quien paga el traspaso de un carro",
    "bloques": [
        "Es una de las primeras dudas que aparece cuando el precio ya está acordado y "
        "alguien pregunta: «¿y el traspaso quién lo paga?». Si nadie lo habló antes, esa "
        "pregunta puede tensar una negociación que parecía cerrada.",

        "No existe una norma que obligue a uno u otro a pagar cada rubro. Lo que hay es "
        "una costumbre bastante extendida en Ibarra y en el resto del país, y lo que "
        "realmente protege a las dos partes es dejarlo escrito en el contrato.",

        {"h2": "La respuesta corta: el comprador paga el traspaso"},

        "En la práctica, el comprador asume los gastos del traspaso: la tasa de la "
        "agencia de tránsito, el certificado de gravámenes y el reconocimiento de firmas "
        "en la notaría. El vendedor, por su parte, entrega el vehículo al día: sin multas "
        "pendientes, con la matrícula pagada y sin prendas ni embargos.",

        "La lógica es sencilla. El traspaso beneficia a quien compra, porque es lo que "
        "pone el auto a su nombre. Las deudas, en cambio, se generaron cuando el auto era "
        "del vendedor, así que le corresponden a él.",

        {"h2": "Cómo se reparten los gastos, rubro por rubro"},

        "Esta es la división más habitual. Los montos son los mismos que publicamos en "
        f"nuestra {link(TRASPASO, 'guía de requisitos y pasos del traspaso')}:",

        {"tabla": [
            ["Rubro", "Quién lo paga normalmente", "Costo referencial"],
            ["Reconocimiento de firmas en notaría", "Comprador", f"Entre {COSTO_NOTARIA}"],
            ["Certificado de gravámenes", "Comprador", f"Entre {COSTO_GRAVAMENES}"],
            ["Tasa de traspaso en la agencia", "Comprador", f"Entre {COSTO_TASA_ANT}"],
            ["Multas de tránsito pendientes", "Vendedor", "Según cada multa"],
            ["Matrícula del año en curso", "Vendedor", "Según el vehículo"],
            ["Levantamiento de prenda, si existe", "Vendedor", "Según la entidad"],
        ]},

        AVISO_COSTOS,

        "El trámite en la agencia suele tardar entre " + PLAZO_ANT + ". Durante ese "
        "tiempo el auto todavía figura a nombre del vendedor, y por eso conviene que los "
        "dos sigan en contacto hasta que salga la nueva matrícula.",

        {"h2": "Por qué al vendedor también le conviene que se haga rápido"},

        "Aquí está el punto que muchos vendedores no tienen presente. Mientras el "
        "traspaso no se registre, el auto sigue a nombre de quien lo vendió. Si el nuevo "
        "dueño recibe una fotomulta en la Panamericana o en la vía a Otavalo, esa multa "
        "llega al vendedor.",

        "Lo mismo pasa con la matrícula del año siguiente y, en el peor caso, con un "
        "accidente. Hay vendedores en Imbabura que descubrieron meses después que seguían "
        "respondiendo por un auto que ya no tenían.",

        "La ley fija un plazo para que el comprador registre el traspaso y el retraso "
        "tiene recargo. El plazo y el valor del recargo pueden cambiar, así que "
        "confírmelos en la agencia de tránsito de su cantón antes de cerrar la venta.",

        {"quote": "Cuando un vendedor particular nos pregunta qué hacer para no tener "
                  "problemas, le decimos lo mismo siempre: no entregue el auto sin que "
                  "el comprador tenga fecha para ir a la agencia. La plata del traspaso es "
                  "poca; el problema de seguir siendo dueño de un auto que maneja otro, "
                  "no.",
         "cite": CITA},

        {"h2": "Cómo dejarlo por escrito, paso a paso"},

        "Un acuerdo de palabra funciona hasta que aparece la primera multa. Estos pasos "
        "evitan la discusión:",

        {"ol": [
            "Antes de fijar el precio, revisen juntos las multas por placa. Explicamos cómo "
            f"en {link(MULTAS, 'consultar multas de un vehículo antes de comprar')}.",
            "Acuerden si el precio incluye o no los gastos del traspaso, y escríbanlo en "
            "esos términos: «el comprador asume los gastos de traspaso».",
            "Incluyan en el contrato una cláusula con el plazo en que el comprador se "
            "compromete a registrar el traspaso.",
            "El vendedor entrega el certificado de gravámenes limpio y el comprobante de "
            "matrícula pagada.",
            "Firmen el contrato con reconocimiento de firmas en notaría.",
            "El vendedor guarda una copia del contrato notariado: es su respaldo si llega "
            "una multa con fecha posterior a la venta.",
        ]},

        {"h2": "Casos en que la costumbre se invierte"},

        "La división anterior es la base, no una regla fija. Hay situaciones en que tiene "
        "sentido cambiarla:",

        {"ul": [
            "<strong>Vendedor apurado.</strong> Quien necesita vender rápido a veces "
            "ofrece pagar el traspaso como incentivo. Es un descuento disfrazado y vale lo "
            "mismo que bajar el precio.",
            "<strong>Auto con multas grandes.</strong> Si el vendedor no tiene el dinero "
            "para pagarlas antes, se descuentan del precio y el comprador las cancela. "
            f"Lo detallamos en {link(TRASPASO_MULTAS, 'traspaso con multas pendientes')}.",
            "<strong>Auto con prenda.</strong> El saldo del crédito se paga con parte del "
            "precio de venta, en presencia de los dos. Ver "
            f"{link(PRENDA, 'comprar un auto con prenda')}.",
            "<strong>Compra en un patio.</strong> En un concesionario los papeles ya están "
            "verificados antes de publicar el vehículo y el traspaso se coordina con el "
            "comprador como parte de la venta.",
        ]},

        {"h2": "Si el comprador es de otro cantón"},

        "Es frecuente que un auto de Ibarra lo compre alguien de Otavalo, Cayambe o "
        "Tulcán. El traspaso se puede hacer en la agencia de cualquiera de los dos "
        "cantones, pero conviene acordar dónde antes de firmar: si el comprador se lleva "
        "el auto y los papeles a su ciudad, el vendedor pierde el control de cuándo se "
        "registra. En ese caso, la cláusula con fecha en el contrato vale todavía más.",

        {"h2": "Cuándo no le conviene ceder en este punto"},

        "Si usted es el comprador y el vendedor insiste en que usted pague también las "
        "multas, sin descontarlas del precio, la negociación ya no es equilibrada. Y si "
        "usted vende y el comprador propone «hacer el traspaso más adelante», no acepte "
        "sin una fecha concreta y escrita. Esos dos escenarios concentran casi todos los "
        "problemas que vemos después de una venta entre particulares.",

        {"h2": "La regla práctica para no discutir"},

        "Quien compra paga lo que pone el auto a su nombre; quien vende paga lo que el "
        "auto debe hasta el día de la venta. Si las dos partes aceptan esa frase antes de "
        "hablar de precio, el resto sale solo.",

        {"faq": [
            ("¿Es obligatorio que el comprador pague el traspaso?",
             "No hay una obligación legal sobre quién paga cada gasto. Es una costumbre "
             "muy extendida en Ecuador y lo que manda es lo que las partes firmen en el "
             "contrato de compraventa."),
            ("¿Cuánto cuesta el traspaso de un carro en Ecuador?",
             f"Sumando notaría (entre {COSTO_NOTARIA}), certificado de gravámenes (entre "
             f"{COSTO_GRAVAMENES}) y tasa de la agencia (entre {COSTO_TASA_ANT}), el "
             "trámite básico suele quedar entre 55 y 100 dólares. Varía por cantón."),
            ("¿Quién paga las multas que tenía el carro antes de la venta?",
             "El vendedor, porque se generaron cuando el vehículo era suyo. Si no las "
             "paga antes, lo justo es descontarlas del precio."),
            ("¿Qué pasa si el comprador nunca hace el traspaso?",
             "El vehículo sigue a nombre del vendedor y le llegan las multas, la matrícula "
             "y cualquier responsabilidad. Por eso conviene fijar un plazo en el contrato "
             "y guardar una copia notariada."),
            ("¿Puede hacer el traspaso otra persona en mi nombre?",
             "Sí, con un poder notarial. Explicamos cómo en "
             f"{link(PODER, 'traspaso de vehículo con poder notarial')}."),
        ]},

        cierre("Hola, tengo una duda sobre el traspaso de un vehículo."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Requisitos para vender un carro
# ════════════════════════════════════════════════════════════════════════════
vender = {
    "title": "Requisitos para vender un carro en Ecuador: lista completa",
    "slug": "requisitos-para-vender-un-carro-ecuador",
    "date": FECHAS[4],
    "cat": CAT["tramites"],
    "tags": ["vender auto usado", "requisitos para vender un carro",
             "trámites vehiculares Ecuador", "parte de pago", "autos usados Imbabura"],
    "excerpt": "Qué papeles necesita para vender su carro, cómo dejarlo sin multas, qué "
               "formas de pago son seguras y cuándo conviene más entregarlo como parte "
               "de pago que venderlo por su cuenta.",
    "yoast_title": "Requisitos para vender un carro en Ecuador: lista completa",
    "yoast_desc": "Documentos, deudas que hay que saldar antes, cómo cobrar sin riesgo y "
                  "cuándo conviene entregar el auto como parte de pago. Guía desde el "
                  "lado del vendedor.",
    "focus_kw": "requisitos para vender un carro en ecuador",
    "bloques": [
        "La mayoría de guías sobre compraventa de autos están escritas para quien compra. "
        "Esta es para el otro lado: usted tiene un carro, quiere venderlo y no quiere que "
        "la venta se trabe por un papel que faltaba o que, meses después, le llegue una "
        "multa de un auto que ya no es suyo.",

        "Vender bien no es solo conseguir buen precio. Es entregar un vehículo con los "
        "papeles en orden, cobrar de forma segura y asegurarse de que el traspaso se "
        "registre.",

        {"h2": "Lo que necesita tener listo antes de publicar"},

        "Estos son los requisitos básicos para vender un carro en Ecuador. Tenerlos antes "
        "de publicar el anuncio acelera la venta, porque el comprador serio los va a "
        "pedir en la primera visita:",

        {"tabla": [
            ["Documento o requisito", "Para qué sirve", "Dónde se obtiene"],
            ["Matrícula vigente", "Prueba que el auto está a su nombre y al día",
             "Agencia de tránsito"],
            ["Cédula del propietario", "Identifica a quien vende", "Su documento"],
            ["Certificado de gravámenes", "Demuestra que no hay prenda ni embargo",
             "Agencia de tránsito, en línea"],
            ["Consulta de multas en cero", "El traspaso no avanza con multas",
             "Portal de la ANT o del cantón"],
            ["Matrícula del año pagada", "Evita que el comprador herede la deuda",
             "Agencia de tránsito"],
            ["Revisión técnica aprobada", "En cantones donde aplica", "Centro de revisión"],
        ]},

        f"Si el auto tiene un crédito vigente, primero hay que resolver la prenda. Lo "
        f"explicamos en {link(PRENDA, 'comprar o vender un auto con prenda')}.",

        {"h2": "Deje el auto sin deudas antes de recibir ofertas"},

        "Un auto con multas pendientes no se puede traspasar hasta que se paguen. Y si el "
        "comprador se entera de ellas en la notaría, la negociación se reabre con usted "
        "en desventaja.",

        f"Revise por placa antes de publicar. El procedimiento está en "
        f"{link(MULTAS, 'cómo consultar multas de un vehículo')}. Si son altas y no puede "
        f"pagarlas de inmediato, dígalo desde el inicio y descuéntelas del precio: "
        f"detallamos esa salida en {link(TRASPASO_MULTAS, 'traspaso con multas pendientes')}.",

        {"h2": "Cuánto pedir sin espantar compradores"},

        "Un precio alto alarga la venta y uno bajo deja dinero en la mesa. Para fijarlo "
        "con criterio, compare con tres o cuatro anuncios del mismo modelo, año y "
        "kilometraje parecido, y descuente si su auto tiene detalles visibles.",

        "Tenga en cuenta que los precios de los anuncios no son precios de venta: casi "
        "todos se negocian. Publicar un margen moderado por encima de lo que espera "
        "recibir es razonable; publicar muy por encima solo atrae ofertas de quienes "
        "buscan rebajar mucho.",

        f"Si quiere entender por qué su auto vale lo que vale, revise "
        f"{link(DEVALUA, 'cuánto se devalúa un auto usado en Ecuador')}. Y si el suyo "
        f"está entre los modelos más buscados, puede pedir con más firmeza: los "
        f"listamos en {link(REVENTA, 'los autos usados que mejor se revenden')}.",

        "En Imbabura, las camionetas y las SUV medianas suelen venderse más rápido que "
        "los sedanes grandes, por las vías rurales y las subidas que hay en casi todos "
        "los cantones.",

        {"h2": "Cómo cobrar sin arriesgarse"},

        "Este es el punto donde más se pierde dinero en ventas entre particulares. El "
        "orden correcto es:",

        {"ol": [
            "Acordar el precio y la forma de pago por escrito.",
            "Recibir el pago completo por transferencia y confirmarlo en su banca en "
            "línea, o recibir un cheque certificado y verificarlo con el banco emisor.",
            "Solo con el dinero acreditado, firmar el contrato de compraventa con "
            "reconocimiento de firmas en notaría.",
            "Entregar llaves, matrícula original y documentos del vehículo.",
            "Guardar copia del contrato y de la cédula del comprador.",
            "Hacer seguimiento hasta que el traspaso salga a nombre del comprador.",
        ]},

        "No acepte capturas de pantalla como prueba de una transferencia. Tampoco "
        "entregue el carro «a prueba» por un fin de semana a alguien que no conoce.",

        {"quote": "Muchos vendedores llegan después de pasar dos o tres meses con el auto "
                  "publicado en redes. El problema casi nunca es el precio: es el tiempo "
                  "que hay que dedicar a mostrarlo, filtrar curiosos y cuidarse de "
                  "estafas.",
         "cite": CITA},

        {"h2": "Vender por su cuenta o entregarlo como parte de pago"},

        "Si además de vender va a comprar otro vehículo, hay una alternativa que conviene "
        "comparar con calma:",

        {"tabla": [
            ["Aspecto", "Venta a particular", "Parte de pago en un patio"],
            ["Precio recibido", "Normalmente más alto", "Algo menor"],
            ["Tiempo hasta cerrar", "Semanas o meses", "Un día de valoración"],
            ["Riesgo de pago", "Lo asume usted", "Ninguno"],
            ["Trámites", "Los coordina usted", "Los coordina el patio"],
            ["Visitas de curiosos", "Muchas", "Ninguna"],
        ]},

        f"Lo explicamos en detalle en {link(PARTE_PAGO, 'cambiar su auto entregándolo como parte de pago')}. "
        "En OKCars, en Ibarra, hacemos la valoración en el patio sin costo y sobre esa "
        "cifra se arma el saldo del vehículo que usted elija.",

        {"h2": "Cuándo no le conviene la parte de pago"},

        "Si su auto es muy buscado, tiene poco kilometraje y usted tiene tiempo, venderlo "
        "por su cuenta suele dejarle más dinero. Lo mismo si no piensa comprar otro auto: "
        "la parte de pago solo tiene sentido cuando hay un segundo vehículo de por medio.",

        "En cambio, si vive en Otavalo, Cayambe o Tulcán y no quiere coordinar visitas "
        "durante semanas, la diferencia de precio suele compensarse con el tiempo que "
        "ahorra.",

        {"h2": "Preparar el auto sin gastar de más"},

        "Antes de mostrarlo, vale la pena invertir poco en lo que se ve:",

        {"ul": [
            "Lavado completo, incluido motor y tapicería.",
            "Cambio de focos quemados y plumas del limpiaparabrisas.",
            "Historial de mantenimiento ordenado en una carpeta.",
            "Los dos juegos de llaves y el manual.",
        ]},

        "No conviene hacer reparaciones grandes justo antes de vender: rara vez se "
        "recuperan en el precio.",

        {"h2": "Su lista final antes de firmar"},

        "Matrícula y cédula en mano, gravámenes limpios, multas en cero, matrícula del año "
        "pagada, pago acreditado en su cuenta, contrato con firmas reconocidas y una "
        "copia guardada. Si los siete puntos están cumplidos, la venta está cerrada.",

        {"faq": [
            ("¿Qué documentos necesito para vender mi carro en Ecuador?",
             "Matrícula vigente, cédula, certificado de gravámenes, multas en cero y "
             "matrícula del año pagada. En algunos cantones también se pide la revisión "
             "técnica aprobada."),
            ("¿Puedo vender un carro que todavía tiene prenda?",
             "Sí, pero la prenda debe levantarse antes del traspaso. Lo habitual es usar "
             "parte del precio de venta para cancelar el saldo del crédito."),
            ("¿Quién paga el traspaso cuando vendo mi carro?",
             "Por costumbre lo paga el comprador. Usted, como vendedor, entrega el auto sin "
             "multas, con la matrícula pagada y libre de gravámenes."),
            ("¿Qué forma de pago es más segura?",
             "Transferencia confirmada en su banca en línea o cheque certificado verificado "
             "con el banco. No firme ni entregue el auto antes de tener el dinero "
             "acreditado."),
            ("¿Conviene vender mi auto en Ibarra o en Quito?",
             "En Quito hay más compradores, pero también más oferta y más tiempo de "
             "traslado para mostrar el auto. Para un vehículo matriculado en Imbabura, "
             "vender cerca suele ser más práctico."),
            ("¿Compran autos usados en OKCars?",
             "Recibimos autos como parte de pago de un vehículo del patio. La valoración se "
             "hace en Ibarra y no tiene costo."),
        ]},

        cierre("Hola, quiero entregar mi auto como parte de pago en OKCars.",
               "Si quiere saber cuánto vale su auto como parte de pago, escríbanos al"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · Contrato de compraventa
# ════════════════════════════════════════════════════════════════════════════
contrato = {
    "title": "Contrato de compraventa de vehículo: qué debe decir",
    "slug": "contrato-compraventa-vehiculo-ecuador",
    "date": FECHAS[8],
    "cat": CAT["tramites"],
    "tags": ["contrato de compraventa de vehículo", "traspaso de vehículo",
             "notaría", "trámites vehiculares Ecuador", "autos usados Ibarra"],
    "excerpt": "Las cláusulas que no pueden faltar en el contrato de compraventa de un "
               "auto usado, cómo se reconocen las firmas en la notaría y los errores que "
               "después traban el traspaso.",
    "yoast_title": "Contrato de compraventa de vehículo: qué debe decir",
    "yoast_desc": "Datos del auto, precio, forma de pago, estado declarado y quién paga "
                  "el traspaso: las cláusulas clave y los errores que frenan el trámite "
                  "en la agencia.",
    "focus_kw": "contrato de compraventa de vehiculo",
    "bloques": [
        "El contrato de compraventa es el documento que respalda todo lo que se acordó en "
        "la venta de un auto. Sin él no hay traspaso, y con uno mal hecho el traspaso se "
        "traba en la agencia o, peor, deja a una de las partes sin cómo reclamar.",

        "No hace falta un abogado para la mayoría de compraventas entre particulares. Sí "
        "hace falta saber qué debe decir el documento y revisarlo con calma antes de ir a "
        "la notaría.",

        {"h2": "Lo esencial: identificar bien a las partes y al auto"},

        "Un contrato de compraventa de vehículo sirve si deja claras tres cosas: quién "
        "vende y quién compra, qué auto exacto se vende, y en qué condiciones. Todo lo "
        "demás es detalle que protege a una u otra parte.",

        "El error más común no es una cláusula olvidada: es un número de chasis o de "
        "motor mal copiado. La agencia de tránsito compara esos datos con los del "
        "vehículo y, si no coinciden, el trámite se detiene.",

        {"h2": "Las cláusulas que no pueden faltar"},

        {"tabla": [
            ["Cláusula", "Qué debe incluir", "Por qué importa"],
            ["Comparecientes", "Nombres, cédulas, estado civil y domicilio",
             "Si el vendedor es casado, puede requerirse la firma del cónyuge"],
            ["Objeto", "Marca, modelo, año, color, placa, número de motor y de chasis",
             "Es lo que la agencia verifica"],
            ["Precio", "Valor en números y en letras", "Evita discusiones posteriores"],
            ["Forma de pago", "Transferencia, cheque, cuotas; fechas y montos",
             "Respaldo si un pago no llega"],
            ["Estado del vehículo", "Que se vende en el estado en que se encuentra, "
             "revisado por el comprador", "Delimita reclamos posteriores"],
            ["Gravámenes y multas", "Declaración del vendedor de que no existen",
             "Base para reclamar si aparecen"],
            ["Gastos de traspaso", "Quién paga cada rubro", "Evita la discusión final"],
            ["Plazo del traspaso", "Fecha en que el comprador lo registrará",
             "Protege al vendedor de multas futuras"],
        ]},

        f"Sobre quién paga cada gasto, la costumbre y las excepciones están en "
        f"{link(TRASPASO, 'la guía de requisitos y pasos del traspaso')}.",

        {"h2": "Cómo se firma: el reconocimiento en notaría"},

        "El contrato puede redactarse en casa o pedirlo en la notaría, pero las firmas "
        "tienen que reconocerse ante notario para que la agencia de tránsito lo acepte. "
        "El proceso es breve:",

        {"ol": [
            "Verificar en la matrícula y en el vehículo los números de placa, motor y "
            "chasis antes de imprimir el contrato.",
            "Ir juntos a la notaría con cédulas originales y la matrícula.",
            "Si el vendedor es casado bajo sociedad conyugal, llevar también al cónyuge o "
            "una autorización; confírmelo con la notaría.",
            "Leer el contrato completo antes de firmar, en especial precio y forma de pago.",
            "Firmar ante el notario y pagar el reconocimiento de firmas.",
            "Sacar copias: una para cada parte y la original para el traspaso.",
        ]},

        f"El reconocimiento de firmas cuesta entre {COSTO_NOTARIA}. {AVISO_COSTOS}",

        "En Ibarra hay varias notarías en el centro, lo que permite firmar y llegar a la "
        "agencia de tránsito el mismo día si los papeles están completos.",

        {"quote": "Los contratos que más problemas dan son los que se firman apurados en "
                  "la notaría, copiando los datos de la matrícula vieja. Si el motor fue "
                  "cambiado alguna vez y eso no se regularizó, el número no coincide y el "
                  "traspaso se cae.",
         "cite": CITA},

        {"h2": "Qué llevar a la notaría para no volver"},

        {"ul": [
            "Cédulas originales de comprador y vendedor, y del cónyuge si corresponde.",
            "Matrícula original del vehículo.",
            "Certificado de gravámenes reciente.",
            "El contrato impreso, si lo trajeron redactado; si no, los datos del vehículo "
            "verificados.",
            "Comprobante del pago, si ya se hizo la transferencia.",
        ]},

        "En muchas notarías de Imbabura conviene ir temprano: a media mañana se forman "
        "filas, y un documento que falta obliga a volver otro día.",

        {"h2": "Cinco errores que traban el traspaso"},

        {"ul": [
            "<strong>Datos copiados de una matrícula vencida</strong> en vez de verificar "
            "el vehículo.",
            "<strong>Precio simbólico</strong> («1.000 dólares») para pagar menos, que "
            "después deja al comprador sin respaldo del valor real si hay un reclamo.",
            "<strong>Firma solo del vendedor</strong> cuando el auto pertenece a la "
            "sociedad conyugal.",
            "<strong>Sin cláusula de plazo para el traspaso</strong>, lo que deja al "
            "vendedor expuesto a multas del nuevo conductor.",
            "<strong>Pago «contra entrega» sin detalle</strong>: si no se escribe cómo y "
            "cuándo se paga, no hay forma de exigirlo.",
        ]},

        {"h2": "Cuándo un contrato simple no alcanza"},

        "Si el pago va a hacerse en cuotas entre particulares, si el auto tiene una prenda "
        "que se cancela con el precio de venta, o si una de las partes firma con poder, el "
        "contrato necesita cláusulas adicionales y conviene que lo revise un abogado. Los "
        f"casos con prenda los tratamos en {link(PRENDA, 'comprar un auto con prenda')} y "
        f"los de poder en {link(PODER, 'traspaso con poder notarial')}.",

        "En una venta a plazos entre particulares, por ejemplo con un comprador de "
        "Otavalo que paga la mitad al firmar y el resto en tres meses, el contrato debe "
        "decir cuánto se paga en cada fecha, qué pasa si una cuota se atrasa y si el "
        "traspaso se hace al inicio o al terminar de pagar. Si el traspaso se hace "
        "antes, el vendedor queda sin garantía; si se hace después, el comprador maneja "
        "un auto que no está a su nombre. Esa decisión es la que más conviene consultar "
        "con un abogado.",

        "Cuando la compra es en un patio, el contrato lo prepara el concesionario con los "
        "datos ya verificados. Igual vale la pena leerlo completo antes de firmar.",

        {"h2": "La revisión de dos minutos antes de firmar"},

        "Con el contrato impreso, salga al vehículo y compare tres números: placa, motor "
        "y chasis. Después revise que el precio en letras coincida con el de números y "
        "que la forma de pago esté escrita como se acordó. Esos dos minutos ahorran un "
        "segundo viaje a la notaría.",

        {"faq": [
            ("¿El contrato de compraventa de un vehículo tiene que ser notariado?",
             "Las firmas deben reconocerse ante notario para que la agencia de tránsito "
             "acepte el contrato en el traspaso."),
            ("¿Cuánto cuesta el contrato en la notaría?",
             f"El reconocimiento de firmas suele costar entre {COSTO_NOTARIA}, según la "
             "notaría y el cantón."),
            ("¿Necesito la firma de mi cónyuge para vender mi auto?",
             "Si está casado bajo sociedad conyugal, normalmente sí. Confírmelo con la "
             "notaría antes de ir, para no perder el viaje."),
            ("¿Puedo poner un precio menor al real en el contrato?",
             "No es recomendable. Deja al comprador sin respaldo del valor pagado si "
             "después necesita reclamar algo, y puede generar problemas con el SRI."),
            ("¿Cómo se hace el contrato si el auto es de una empresa?",
             "Firma el representante legal con su nombramiento vigente y el RUC de la "
             "empresa. Confirme con la notaría qué documentos piden antes de ir."),
            ("¿Qué pasa si un número del contrato está mal?",
             "La agencia rechaza el traspaso y hay que hacer un nuevo contrato o una "
             "aclaratoria en la notaría, con un costo adicional."),
        ]},

        cierre("Hola, quiero consultar sobre el contrato de compraventa de un auto."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 4 · SPPAT
# ════════════════════════════════════════════════════════════════════════════
sppat = {
    "title": "SPPAT: qué cubre y qué no cubre tras un accidente",
    "slug": "sppat-accidente-de-transito-que-cubre",
    "date": FECHAS[12],
    "cat": CAT["guias"],
    "tags": ["SPPAT", "accidente de tránsito", "seguro vehicular",
             "seguro daños a terceros", "matrícula vehicular Ecuador"],
    "excerpt": "El SPPAT reemplazó al SOAT y se paga junto con la matrícula. Cubre a las "
               "personas heridas en un accidente, no al auto. Qué significa eso en la "
               "práctica y qué seguro cubre el resto.",
    "yoast_title": "SPPAT: qué cubre y qué no cubre tras un accidente",
    "yoast_desc": "Se paga con la matrícula y protege a las víctimas, no al vehículo. Qué "
                  "atiende, qué queda fuera y por qué hace falta un seguro privado para "
                  "los daños.",
    "focus_kw": "sppat que cubre",
    "bloques": [
        "Muchos conductores en Ecuador creen que, como pagan la matrícula, su auto está "
        "asegurado. Una parte de esa idea es correcta: con la matrícula se paga el SPPAT. "
        "La otra parte es un malentendido que sale caro el día de un choque.",

        "El SPPAT protege a las personas. No repara su carro ni el del otro conductor. "
        "Entender esa diferencia es lo que separa a quien sale de un accidente con una "
        "molestia de quien sale con una deuda.",

        {"h2": "Qué es el SPPAT, en una frase"},

        "El SPPAT es el Servicio Público para Pago de Accidentes de Tránsito. Reemplazó "
        "al antiguo SOAT en 2016 y cubre la atención médica y otros gastos de las "
        "víctimas de un accidente de tránsito: conductores, pasajeros y peatones. Se paga "
        "junto con la matrícula, así que todo vehículo matriculado lo tiene.",

        "No cubre daños materiales: ni la carrocería de su auto, ni el poste, ni el "
        "vehículo con el que chocó.",

        {"h2": "Lo que cubre y lo que queda fuera"},

        {"tabla": [
            ["Situación", "¿La cubre el SPPAT?", "Qué la cubre"],
            ["Atención médica de heridos", "Sí, según sus condiciones", "SPPAT"],
            ["Gastos por fallecimiento de una víctima", "Sí, según sus condiciones",
             "SPPAT"],
            ["Arreglo de su propio auto", "No", "Seguro privado todo riesgo"],
            ["Daños al auto de otra persona", "No", "Seguro de daños a terceros"],
            ["Daños a propiedad (muros, postes)", "No",
             "Seguro de responsabilidad civil"],
            ["Robo del vehículo", "No", "Seguro privado con cobertura de robo"],
        ]},

        "Los montos máximos de cada cobertura y el procedimiento de reclamo los fija la "
        "entidad que administra el servicio y pueden cambiar. Antes de dar una cifra que "
        "quede vieja, preferimos remitirle a la fuente: consúltelos en la ANT o en la "
        "agencia de tránsito de su cantón.",

        {"h2": "A quién protege: conductor, pasajeros y peatones"},

        "Una característica del SPPAT que poca gente conoce es que no depende de quién "
        "tuvo la culpa. Protege a las víctimas del accidente, sean el conductor, los "
        "pasajeros o un peatón que cruzaba la calle.",

        "Eso tiene sentido en una ciudad como Ibarra, con tanto movimiento de peatones "
        "y motociclistas en el centro y en las vías de salida. La atención médica de "
        "urgencia no espera a que se aclare la responsabilidad.",

        "Lo que el SPPAT no hace es pagar la indemnización que el responsable le debe a "
        "la víctima más allá de esos gastos. Para eso existe la responsabilidad civil, "
        "que cubre un seguro privado o, si no lo hay, el propio conductor.",

        {"h2": "Por qué el SPPAT no reemplaza un seguro privado"},

        "Un choque leve en la Panamericana, a la entrada de Ibarra, sin heridos, es el "
        "caso más común. En ese escenario el SPPAT no interviene, porque no hay víctimas "
        "que atender. Todo lo que queda es daño material, y ese lo paga el responsable "
        "de su bolsillo o su aseguradora.",

        f"Para un auto usado, la protección mínima razonable es un seguro de daños a "
        f"terceros. Explicamos qué cubre y cuándo alcanza en "
        f"{link(SEGURO_DANOS, 'seguro contra daños a terceros')}. Si quiere cubrir "
        f"también su propio auto, los costos están en "
        f"{link(SEGURO_PRECIO, 'cuánto cuesta asegurar un auto usado')}.",

        {"quote": "La pregunta que más escuchamos al entregar un auto es si ya viene "
                  "asegurado porque tiene la matrícula al día. Viene con el SPPAT, que "
                  "cuida a las personas. El carro, si no se le contrata nada más, no "
                  "tiene quién lo respalde.",
         "cite": CITA},

        {"h2": "Tres confusiones que conviene aclarar"},

        {"ul": [
            "<strong>«Tengo la matrícula al día, entonces estoy asegurado».</strong> "
            "Está cubierto para la atención de personas heridas, no para los daños del "
            "vehículo.",
            "<strong>«Si el choque no fue mi culpa, el SPPAT no me cubre».</strong> La "
            "cobertura protege a las víctimas, sin esperar a que se defina la "
            "responsabilidad.",
            "<strong>«Solo cubre al dueño del auto».</strong> Cubre también a pasajeros y "
            "peatones involucrados en el accidente, dentro de sus condiciones.",
        ]},

        "Las tres ideas circulan mucho y las tres llevan a decisiones equivocadas: "
        "no contratar un seguro privado, no reclamar cuando sí corresponde o no atender a "
        "tiempo a un pasajero.",

        {"h2": "Qué hacer para usar el SPPAT si hay heridos"},

        {"ol": [
            "Llame al ECU 911 y pida atención médica para los heridos.",
            "No mueva a una persona herida salvo peligro inmediato.",
            "Los centros de salud públicos y privados deben atender la emergencia; el "
            "SPPAT responde por la atención de las víctimas según sus condiciones.",
            "Guarde todo documento que le entreguen: parte policial, informe médico, "
            "facturas.",
            "Consulte en la ANT los requisitos y plazos del reclamo, porque varían según "
            "el tipo de gasto.",
        ]},

        "Si además tiene un seguro privado, avise a su aseguradora en el plazo que fija "
        "su póliza. Las dos coberturas funcionan en paralelo, no se excluyen.",

        {"h2": "Si va a comprar un auto usado"},

        "Como el SPPAT va con la matrícula, al comprar un usado conviene revisar que la "
        "matrícula del año esté pagada. Si no lo está, además de heredar la deuda, la "
        "situación de la cobertura queda en duda hasta regularizarla.",

        f"Los costos y pasos de la matrícula están en "
        f"{link(MATRICULA, 'cuánto cuesta matricular un auto en Ecuador')}, y la lista "
        f"de documentos que debe pedir al vendedor, en "
        f"{link(PAPELES, 'qué papeles pedir antes de comprar un auto usado')}.",

        "En los vehículos del patio de OKCars, la matrícula del año se verifica antes de "
        "publicar la unidad, junto con multas y gravámenes.",

        {"h2": "Cuándo el SPPAT puede quedarse corto"},

        "Para lesiones graves con hospitalización larga o rehabilitación, la cobertura "
        "pública tiene un tope y los gastos pueden superarlo. Quien maneja mucho por "
        "carretera —el tramo Ibarra–Tulcán, viajes frecuentes a Quito— hace bien en "
        "revisar si su póliza privada incluye gastos médicos de ocupantes. Lo tratamos "
        f"en {link(SEGURO_VIAJES, 'seguro y viajes interprovinciales')}.",

        {"h2": "La regla para no confundirse"},

        "SPPAT para las personas, seguro privado para los autos. Si recuerda esa división, "
        "sabrá a quién llamar el día que lo necesite y qué gastos quedan a su cargo si no "
        "contrató nada más.",

        "Revise hoy mismo qué tiene contratado. Si la respuesta es «solo la matrícula», "
        "ya sabe que cualquier daño material de un choque saldrá de su bolsillo.",

        {"faq": [
            ("¿El SPPAT es lo mismo que el SOAT?",
             "Lo reemplazó en 2016. Cumple una función parecida: cubrir a las víctimas de "
             "accidentes de tránsito. La diferencia principal es que se paga junto con la "
             "matrícula."),
            ("¿El SPPAT cubre los daños de mi carro?",
             "No. Cubre a las personas heridas o fallecidas en el accidente. Los daños "
             "materiales requieren un seguro privado."),
            ("¿Cómo sé si tengo SPPAT?",
             "Si su vehículo tiene la matrícula pagada, el SPPAT está incluido. Un auto "
             "con la matrícula vencida puede dejar dudas sobre la cobertura."),
            ("¿Cuánto cubre el SPPAT?",
             "Los montos máximos los fija la entidad que administra el servicio y se "
             "actualizan. Consulte los valores vigentes en la ANT."),
            ("¿Necesito un seguro privado si ya tengo SPPAT?",
             "Para proteger su auto y responder por daños a otros vehículos, sí. El seguro "
             "de daños a terceros es la cobertura mínima razonable."),
        ]},

        cierre("Hola, quiero consultar opciones de seguro para un auto usado."),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Qué hacer después de un choque
# ════════════════════════════════════════════════════════════════════════════
choque = {
    "title": "Qué hacer después de un choque y no perder el seguro",
    "slug": "que-hacer-despues-de-un-choque-ecuador",
    "date": FECHAS[16],
    "cat": CAT["guias"],
    "tags": ["qué hacer después de un choque", "accidente de tránsito",
             "seguro vehicular", "reclamo al seguro", "conducir en Imbabura"],
    "excerpt": "Los primeros minutos después de un choque deciden si su seguro responde o "
               "no. Qué hacer en orden, qué fotos tomar, qué datos pedir y los errores "
               "que hacen perder la cobertura.",
    "yoast_title": "Qué hacer después de un choque y no perder el seguro",
    "yoast_desc": "Seguridad, ECU 911, fotos, datos del otro conductor y aviso a la "
                  "aseguradora, en orden. Más los errores que dejan un reclamo sin "
                  "cobertura en Ecuador.",
    "focus_kw": "que hacer despues de un choque",
    "bloques": [
        "Un choque, aunque sea leve, deja a cualquiera nervioso. Y en ese estado se toman "
        "las decisiones que después pesan en el reclamo: mover el auto antes de tiempo, "
        "aceptar un arreglo de palabra o no pedir los datos del otro conductor.",

        "Esta guía es para leerla antes de necesitarla. Los pasos son los mismos en una "
        "calle de Ibarra que en la Panamericana; lo que cambia es la rapidez con que hay "
        "que hacerlos.",

        {"h2": "La respuesta corta: seguridad, registro y aviso"},

        "Después de un choque, el orden es: proteger a las personas, dejar constancia de "
        "lo que pasó y avisar a su aseguradora dentro del plazo de su póliza. Si alguno "
        "de los tres se hace mal, el reclamo se complica o se pierde.",

        {"h2": "Los pasos, en orden"},

        {"ol": [
            "<strong>Detenga el auto y encienda las luces de emergencia.</strong> Coloque "
            "los triángulos a una distancia prudente, sobre todo en curvas o de noche.",
            "<strong>Revise si hay heridos.</strong> Si los hay, llame al ECU 911 y no los "
            "mueva salvo peligro inmediato, como fuego.",
            "<strong>No mueva los vehículos si hay heridos</strong> o si la "
            "responsabilidad no está clara; la posición final es una prueba.",
            "<strong>Tome fotos</strong> antes de mover nada (ver la lista más abajo).",
            "<strong>Pida los datos del otro conductor</strong>: nombre, cédula, placa, "
            "teléfono y aseguradora.",
            "<strong>Llame a su aseguradora</strong> desde el lugar si su póliza tiene "
            "asistencia en sitio. Muchas envían un inspector.",
            "<strong>Pida el parte policial</strong> cuando hay heridos, desacuerdo sobre "
            "la culpa o daños considerables.",
            "<strong>Reporte formalmente el siniestro</strong> dentro del plazo que indica "
            "su póliza.",
        ]},

        {"h2": "Las fotos que después le van a pedir"},

        {"tabla": [
            ["Foto", "Para qué sirve"],
            ["Plano general con los dos autos", "Muestra la posición final"],
            ["Placas de los vehículos involucrados", "Identifica a las partes"],
            ["Daños de cada auto, de cerca y de lejos", "Base de la valoración"],
            ["Señales de tránsito y semáforos cercanos", "Ayuda a definir responsabilidad"],
            ["Marcas de frenado y restos en la vía", "Reconstruye cómo ocurrió"],
            ["Documentos del otro conductor", "Evita errores al copiar datos"],
        ]},

        "Con el celular en la mano, esto toma menos de cinco minutos y puede definir "
        "quién paga.",

        {"quote": "Lo que más complica un reclamo no es el choque: es lo que se hizo en "
                  "los diez minutos siguientes. Un cliente aceptó que el otro conductor "
                  "le pagara «mañana», no tomó la placa y ya no hubo a quién reclamar.",
         "cite": CITA},

        {"h2": "Errores que hacen perder la cobertura"},

        {"ul": [
            "<strong>Avisar tarde.</strong> Las pólizas fijan un plazo para reportar el "
            "siniestro; revíselo hoy en su contrato, no el día del choque.",
            "<strong>Reparar antes de la inspección.</strong> Si el taller arregla el auto "
            "sin que la aseguradora lo haya visto, el reclamo puede rechazarse.",
            "<strong>Aceptar culpa por escrito</strong> sin consultar a su aseguradora.",
            "<strong>Manejar sin licencia vigente</strong> o bajo efectos del alcohol: "
            "casi todas las pólizas excluyen esos casos.",
            "<strong>Que maneje alguien no autorizado</strong> por las condiciones de la "
            "póliza.",
        ]},

        f"Si todavía no tiene seguro, revise qué cubre cada opción en "
        f"{link(SEGURO_DANOS, 'seguro contra daños a terceros')} y los costos en "
        f"{link(SEGURO_PRECIO, 'cuánto cuesta asegurar un auto usado')}. Allí también "
        f"explicamos el deducible, que suele expresarse como «{DEDUCIBLE_EJEMPLO}».",

        {"h2": "Cuándo conviene arreglar sin pasar por el seguro"},

        "No todo choque merece un reclamo. Si el daño es menor que el deducible de su "
        "póliza, el seguro no le va a pagar nada y el reclamo puede afectar la renovación. "
        "En ese caso, un acuerdo entre las partes, por escrito y con los datos completos "
        "del otro conductor, puede ser más práctico.",

        "Ese acuerdo no le conviene cuando hay heridos, cuando el otro conductor no tiene "
        "documentos o cuando no está claro quién tuvo la culpa. Ahí, siempre parte "
        "policial y aviso a la aseguradora.",

        {"h2": "Si el otro conductor se va del lugar"},

        "Pasa más de lo que se cree, sobre todo de noche. Si el otro vehículo se va, no "
        "lo persiga. Anote o fotografíe la placa si alcanza, la marca, el color y la "
        "dirección en que se fue, y llame al ECU 911 para reportarlo.",

        "Pregunte en los locales cercanos si tienen cámaras: en el centro de Ibarra y en "
        "varias gasolineras de la Panamericana hay grabaciones que se borran en pocos "
        "días. Con el reporte policial y esas imágenes, su aseguradora tiene con qué "
        "trabajar.",

        {"h2": "Con un auto recién comprado, revise la póliza"},

        "Un error típico: alguien compra un usado que tenía seguro y da por hecho que la "
        "póliza sigue vigente. Las pólizas suelen estar a nombre del dueño anterior, y "
        "con el cambio de propietario pueden quedar sin efecto.",

        "Antes de salir a la carretera con su nuevo auto, confirme con la aseguradora si "
        "la póliza se traspasa o hay que contratar una nueva. Ese mismo día es cuando más "
        "se maneja, para mostrar el auto a la familia o hacer el primer viaje largo.",

        {"h2": "Si el choque es fuera de su ciudad"},

        "Un percance en la vía a Tulcán o entre Cayambe y Quito suma un problema: el "
        "taller de confianza queda lejos. Pregunte a su aseguradora si cubre el remolque "
        "hasta su ciudad o solo hasta el taller más cercano, y guarde ese número en el "
        f"celular. Lo tratamos en {link(SEGURO_VIAJES, 'seguro y viajes interprovinciales')}.",

        {"h2": "Lo que conviene dejar listo hoy"},

        "Guarde en la guantera los triángulos, una copia de la póliza y el teléfono de "
        "asistencia de su aseguradora. Lea el plazo de aviso de siniestro de su contrato. "
        "Con eso resuelto, el día del choque solo tiene que seguir la lista.",

        "Y si comparte el auto con otra persona de la familia, cuéntele estos pasos. El "
        "choque casi nunca le pasa a quien leyó la póliza.",

        {"faq": [
            ("¿Qué es lo primero que debo hacer después de un choque?",
             "Detener el auto, encender las luces de emergencia y revisar si hay heridos. "
             "Si los hay, llamar al ECU 911 antes que cualquier otra cosa."),
            ("¿Puedo mover mi auto después de un choque?",
             "Si no hay heridos y el tránsito lo requiere, puede moverlo después de tomar "
             "fotos de la posición final. Si hay heridos o desacuerdo, espere a la "
             "autoridad."),
            ("¿Cuánto tiempo tengo para avisar al seguro?",
             "Depende de su póliza; cada aseguradora fija su plazo. Revíselo en su "
             "contrato antes de necesitarlo."),
            ("¿Necesito parte policial para reclamar al seguro?",
             "Cuando hay heridos, daños considerables o desacuerdo sobre la culpa, sí. En "
             "choques leves algunas aseguradoras aceptan el reporte con fotos e inspección."),
            ("¿Debo llamar a la policía si el choque fue leve?",
             "Si no hay heridos y las dos partes están de acuerdo sobre lo que pasó, "
             "muchas veces basta con fotos, datos completos y el aviso a la aseguradora. "
             "Si hay cualquier desacuerdo, pida el parte policial."),
            ("¿Qué pasa si el otro conductor no tiene seguro?",
             "Responde con su propio dinero por los daños que causó. Si usted tiene "
             "seguro todo riesgo, su aseguradora puede cubrirle y luego reclamarle al "
             "responsable."),
        ]},

        cierre("Hola, quiero cotizar un seguro para un auto usado."),
    ],
}


for s in [quien_paga, vender, contrato, sppat, choque]:
    print(guarda(s))
