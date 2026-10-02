#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Serie UAFE — posts 1 a 3 (5, 12 y 19 de octubre de 2026).

Datos solo de DATOS-VERIFICADOS.md. Tono tú. Los posts informan; la venta va a la landing.
"""
from comun import (CORREOS, LANDING, UAFE_CODIGO, UAFE_OFICIAL, guarda, link, url, wa)

P1 = url("que-correo-pide-la-uafe")
P2 = url("sujeto-obligado-uafe-como-saber")


# ════════════════════════════════════════════════════════════════════════════
# 1 · Qué correo pide la UAFE
# ════════════════════════════════════════════════════════════════════════════
post1 = {
    "title": "Qué correo pide la UAFE para registrar al oficial de cumplimiento",
    "slug": "que-correo-pide-la-uafe",
    "imagen": 2806,
    "tags": ["UAFE", "correo institucional", "oficial de cumplimiento",
             "sujetos obligados", "código de registro"],
    "excerpt": "La UAFE pide dos correos para el oficial de cumplimiento y otros dos para el "
               "representante legal. Cuáles son, por qué el correo compartido de la empresa no "
               "sirve y cómo nombrar cada cuenta.",
    "yoast_title": "Qué correo pide la UAFE: oficial y representante legal",
    "yoast_desc": "Cuatro correos en total, dos de ellos con el dominio de tu empresa. Quién "
                  "necesita cada uno, por qué el info@ no sirve y qué hacer si cambia el oficial.",
    "focus_kw": "que correo pide la uafe",
    "bloques": [
        "Una clienta de otra provincia nos encontró buscando correo con el nombre de la "
        "empresa. Lo necesitaba por una razón muy concreta: la UAFE se lo pedía y no tenía "
        "uno. Detrás de su pedido había una pregunta que seguramente se hacen otros en su situación: "
        "¿qué correo me están pidiendo exactamente?",

        "Desde que el SRI empezó a avisar a los sujetos obligados al inscribir o actualizar el "
        "RUC, es fácil llegar al registro de la UAFE sin saber que van "
        "a necesitar varias direcciones de correo, y no cualquiera. Aquí va la respuesta "
        "completa, con lo que dice la propia UAFE.",

        {"h2": "La respuesta corta: cuatro correos, dos con el dominio de tu empresa"},

        "La UAFE pide correos en dos momentos distintos del trámite, para dos personas "
        "distintas:",

        {"ul": [
            "<strong>Para el oficial de cumplimiento:</strong> un correo personal y otro "
            "<strong>institucional, de uso exclusivo del oficial</strong>.",
            "<strong>Para el representante legal:</strong> al solicitar el código de registro, "
            "un correo <strong>corporativo</strong> y otro personal.",
        ]},

        f"Los personales pueden ser los que ya usan. Los otros dos son los que llevan el "
        f"nombre de tu empresa, del tipo cumplimiento@tuempresa.com. Lo puedes confirmar en la "
        f"{link(UAFE_OFICIAL, 'página oficial de registro del oficial de cumplimiento')} y en "
        f"la de {link(UAFE_CODIGO, 'solicitud del código de registro')}.",

        {"tabla": [
            ["Quién", "Qué correos pide la UAFE", "Ejemplo"],
            ["Oficial de cumplimiento", "Personal + institucional de uso exclusivo",
             "maria.lopez@gmail.com + cumplimiento@tuempresa.com"],
            ["Representante legal", "Personal + corporativo",
             "jperez@gmail.com + gerencia@tuempresa.com"],
        ]},

        {"h2": "Por qué el representante legal también necesita uno"},

        "Mucha gente se concentra en el oficial y se olvida de esta parte. Cuando el "
        "representante legal solicita el código de registro, el formulario le pide dos "
        "correos: uno corporativo y uno personal. Y es a esa dirección adonde llega el enlace "
        "para activar la solicitud, que hay que usar dentro de las 48 horas.",

        "Si ese correo no existe o nadie lo revisa, la solicitud queda a medias. Por eso "
        "conviene crear las dos cuentas el mismo día: la del oficial y la del representante "
        "legal.",

        {"h2": "Qué es un correo institucional y en qué se diferencia del tuyo"},

        "Un correo institucional es el que lleva el dominio de la organización: lo que va "
        "después de la arroba es el nombre de tu empresa, no el de un proveedor gratuito. "
        "Identifica a la institución y, después, a la persona que lo usa.",

        "Esa diferencia importa en un trámite como este. La UAFE necesita saber que la "
        "dirección pertenece al negocio y no a alguien que mañana puede irse con ella. Por "
        "eso pide los dos: el personal sirve para ubicar a la persona y el institucional "
        "queda atado a la empresa.",

        "Ojo con un detalle: la UAFE pide un correo institucional <em>además</em> del "
        "personal. No dice que tu Gmail esté prohibido; dice que ese no alcanza para el campo "
        "institucional.",

        {"h2": "Por qué el info@ de la empresa no te sirve para el oficial"},

        "Muchos negocios ya tienen un correo con su dominio, del tipo info@ o ventas@, que lo "
        "revisan dos o tres personas. Parece la solución obvia, pero la UAFE pide que el "
        "correo institucional del oficial sea <strong>de uso exclusivo</strong> del oficial.",

        "Un buzón compartido no cumple esa condición. Si por ahí llegan cotizaciones, "
        "reclamos y comunicaciones de la UAFE al mismo tiempo, cualquiera de los que lo "
        "revisan puede abrir, borrar o pasar por alto un mensaje que solo le corresponde al "
        "oficial. La salida es una cuenta propia, separada del resto.",

        {"quote": "El correo del oficial no es un trámite más que se llena y se olvida. Es la dirección que queda registrada a su nombre ante la UAFE, así que conviene que funcione desde el primer día y que el oficial la abra con frecuencia."},

        {"h2": "Cómo nombrar las cuentas para que no haya confusiones"},

        "Te recomendamos nombrar las cuentas por función y no por persona. Así, si cambia "
        "quien ocupa el puesto, la dirección se queda y solo cambias la contraseña:",

        {"ol": [
            "<strong>cumplimiento@tuempresa.com</strong> para el oficial de cumplimiento.",
            "<strong>gerencia@tuempresa.com</strong> para el representante legal.",
            "<strong>suplente@tuempresa.com</strong> si tu organismo de control te pide "
            "también un oficial suplente (es obligatorio solo para la Superintendencia de "
            "Bancos).",
            "El resto del equipo, con el mismo dominio: contabilidad@, ventas@, facturacion@.",
        ]},

        f"Si todavía no tienes dominio, ese es el primer paso. Lo explicamos en nuestra página "
        f"de {link(LANDING, 'correo institucional para la UAFE')}, donde está el paquete con "
        f"dominio y hasta 10 cuentas.",

        {"h2": "Qué pasa cuando cambia el oficial de cumplimiento"},

        "Las personas rotan. Cuando el oficial deja el puesto, hay que registrar al nuevo y "
        "la UAFE da un plazo máximo de <strong>15 días</strong> para informar el registro o "
        "el cambio. Entre los datos que vuelve a pedir están, otra vez, sus dos correos.",

        "Aquí se ve la ventaja de haber nombrado la cuenta por función. Si el correo era "
        "cumplimiento@, el nuevo oficial recibe la misma dirección con una contraseña nueva y "
        "el historial queda en la empresa. Si el correo llevaba el nombre de la persona que "
        "se fue, toca crear otro y explicar el cambio.",

        {"h2": "Cuándo nada de esto te aplica"},

        "Si tu negocio no es sujeto obligado, la UAFE no te va a pedir oficial de "
        "cumplimiento ni estos correos. La condición aparece en el certificado de tu RUC. Si "
        "tienes dudas, confírmalo con tu contador antes de hacer cualquier trámite.",

        "Y si ya tienes correos con el dominio de tu empresa, no necesitas empezar de cero: "
        "basta con crear una cuenta exclusiva para el oficial y otra para el representante "
        "legal, si todavía no la tiene.",

        {"h2": "Antes de entrar al registro, revisa esto"},

        {"ul": [
            "Que el oficial tenga el correo institucional funcionando y que haya enviado y "
            "recibido al menos un mensaje.",
            "Que el representante legal tenga el correo corporativo listo, porque el enlace de "
            "activación de la solicitud llega a esa dirección y hay que activarla dentro de las "
            "48 horas.",
            "Que las contraseñas estén guardadas donde la empresa las pueda recuperar.",
        ]},

        {"faq": [
            ("¿Puedo usar mi Gmail para el registro en la UAFE?",
             "Sí, como correo personal. Para el campo institucional del oficial y el "
             "corporativo del representante legal corresponde una cuenta con el dominio de tu "
             "empresa."),
            ("¿El oficial y el representante legal pueden compartir el mismo correo?",
             "No es lo recomendable. El correo institucional del oficial tiene que ser de uso "
             "exclusivo, así que lo correcto es que cada uno tenga su propia cuenta."),
            ("¿Cuántas cuentas necesito como mínimo?",
             "Dos con el dominio de tu empresa: la del oficial de cumplimiento y la del "
             "representante legal. Si te piden suplente, una más."),
            ("¿Qué hago si el oficial deja la empresa?",
             "Cambias la contraseña de su cuenta y se la entregas al nuevo oficial. El cambio "
             "se informa a la UAFE en un plazo máximo de 15 días."),
            ("¿Creative Web hace el trámite ante la UAFE?",
             "No. Nosotros dejamos los correos funcionando. El registro lo hace tu negocio en "
             "la plataforma de la UAFE, normalmente con su contador."),
        ]},

        f"Si te falta el correo institucional, te lo armamos con el dominio de tu empresa y "
        f"te acompañamos hasta que envíes el primero. Mira el "
        f"{link(LANDING, 'paquete de correo institucional para la UAFE')} o "
        f"{link(wa('Hola, vengo del artículo sobre qué correo pide la UAFE y necesito el correo institucional para la UAFE'), 'escríbenos por WhatsApp')}. "
        f"Para el resto del equipo tenemos {link(CORREOS, 'correos con tu dominio')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 2 · Sujeto obligado
# ════════════════════════════════════════════════════════════════════════════
post2 = {
    "title": "¿Mi negocio es sujeto obligado a la UAFE? Cómo saberlo",
    "slug": "sujeto-obligado-uafe-como-saber",
    "imagen": 2751,
    "tags": ["UAFE", "sujetos obligados", "RUC", "SRI", "código de registro"],
    "excerpt": "Desde septiembre de 2025, el certificado del RUC dice si tu negocio tiene que "
               "registrarse en la UAFE. Cómo revisarlo, qué sectores están obligados y qué "
               "hacer en los 30 días hábiles que tienes.",
    "yoast_title": "Sujeto obligado UAFE: cómo saber si tu negocio lo es",
    "yoast_desc": "Tu certificado del RUC ya lo dice. Qué sectores están obligados según la "
                  "UAFE, cómo verificarlo paso a paso y qué tienes que hacer si lo eres.",
    "focus_kw": "sujeto obligado uafe",
    "bloques": [
        "Hasta hace poco, saber si tu negocio tenía que reportar a la UAFE dependía de que "
        "alguien te avisara: el contador, un colega del gremio o una noticia. Muchos negocios "
        "pequeños nunca se enteraron y siguieron operando sin registrarse.",

        "Eso cambió. Ahora la información está en un documento que todo negocio tiene: el "
        "certificado del RUC. Aquí te explicamos cómo leerlo, qué sectores están en la lista "
        "y qué hacer si te toca.",

        {"h2": "La respuesta corta: míralo en tu certificado del RUC"},

        "Con la Resolución NAC-DGERCGC25-00000018, del 6 de agosto de 2025, el SRI incluyó en "
        "el certificado del RUC la condición de <strong>sujeto obligado o no obligado</strong> "
        "a reportar ante la UAFE. Y desde el 10 de septiembre de 2025, quien inscribe o "
        "actualiza su RUC puede verificar esa condición en el mismo proceso.",

        "Si el certificado dice que eres sujeto obligado, tienes <strong>30 días "
        "hábiles</strong> para obtener tu código de registro en la UAFE. Si no lo haces, el "
        "SRI suspende el RUC de oficio.",

        {"h2": "Cómo verificarlo, paso a paso"},

        {"ol": [
            "Descarga el certificado de tu RUC desde los servicios en línea del SRI, o "
            "pídeselo a tu contador.",
            "Busca la línea sobre la condición frente a la UAFE: obligado o no obligado.",
            "Si dice obligado, anota la fecha en que inscribiste o actualizaste el RUC: desde "
            "ahí corren los 30 días hábiles.",
            "Revisa qué organismo de control te corresponde, porque los requisitos del "
            "registro cambian según el sector.",
            "Antes de entrar al sistema de la UAFE, deja listos los correos que te van a "
            "pedir.",
        ]},

        {"h2": "Qué sectores están obligados, según la UAFE"},

        f"La lista la publica la propia UAFE en su página de "
        f"{link(UAFE_CODIGO, 'solicitud del código de registro')}, ordenada por organismo de "
        f"control. Este es un resumen:",

        {"tabla": [
            ["Organismo de control", "Algunos sectores obligados"],
            ["Superintendencia de Bancos", "Bancos, casas de cambio, tarjetas de crédito, "
             "sociedades financieras, proveedores de activos virtuales"],
            ["Superintendencia de Compañías, Valores y Seguros", "Comercialización de "
             "vehículos, constructoras, inmobiliarias, couriers, joyas y metales preciosos, "
             "contadores, abogados, aseguradoras, factoring"],
            ["Superintendencia de Economía Popular y Solidaria", "Cooperativas de ahorro y "
             "crédito, mutualistas, negociadores de joyas"],
            ["Directamente la UAFE", "Notarías, registros de la propiedad y mercantiles, "
             "fundaciones, ONG, asociaciones, consorcios, sociedades de hecho, clubes de "
             "fútbol profesional"],
            ["Consejo Nacional Electoral", "Partidos y movimientos políticos nacionales"],
        ]},

        "Además, en octubre de 2025 se anunció la incorporación de nuevos sectores, entre "
        "ellos cajas de ahorro, cajas y bancos comunales, asesores productores de seguros y "
        "fundaciones nacionales. La lista se ha ido ampliando, así que conviene revisarla "
        "aunque el año pasado no te tocara.",

        {"quote": "No esperes a que te llegue la suspensión del RUC para averiguar. Revisar el "
                  "certificado toma cinco minutos, y los 30 días hábiles se van más rápido de "
                  "lo que parece cuando hay que juntar documentos."},

        {"h2": "Si eres sujeto obligado, esto es lo que viene"},

        "El registro tiene tres piezas que conviene preparar en este orden:",

        {"ul": [
            "<strong>Los correos.</strong> El representante legal necesita un correo "
            "corporativo y uno personal, y el oficial de cumplimiento uno personal y otro "
            f"institucional de uso exclusivo. Lo explicamos en detalle en "
            f"{link(P1, 'qué correo pide la UAFE')}.",
            "<strong>El oficial de cumplimiento.</strong> Hay que designarlo y registrarlo. "
            "Los requisitos cambian según el organismo de control.",
            "<strong>El código de registro.</strong> Se solicita en SISLAFT, el sistema en "
            "línea de la UAFE, y lo hace el representante legal o apoderado.",
        ]},

        "Los correos son la pieza más rápida de resolver y la que más gente deja para el "
        "final. Sin ellos no puedes completar el formulario, y el enlace para activar la "
        "solicitud llega precisamente al correo del representante legal.",

        {"h2": "Tres confusiones frecuentes"},

        {"ul": [
            "<strong>«Soy pequeño, eso es para empresas grandes».</strong> La obligación "
            "depende de la actividad, no del tamaño. La UAFE indica que el código de registro "
            "lo puede solicitar también una persona natural obligada.",
            "<strong>«Ya declaro en el SRI, con eso basta».</strong> Son dos registros "
            "distintos. Estar al día con el SRI no reemplaza el código de registro de la UAFE.",
            "<strong>«Lo hago cuando me llegue un aviso».</strong> El plazo empieza a correr "
            "con la inscripción o actualización del RUC, no con un aviso aparte.",
        ]},

        "Si alguna de estas te sonó familiar, vale la pena revisar el certificado hoy mismo "
        "y salir de la duda.",

        {"h2": "Qué cambia según tu organismo de control"},

        "El sistema de la UAFE tiene un enlace distinto para cada organismo de control y "
        "sector, y los documentos que hay que adjuntar también cambian. Un ejemplo claro es el "
        "oficial suplente: es obligatorio solo para las entidades de la Superintendencia de "
        "Bancos. Para el resto basta con el titular.",

        "Con el oficial pasa algo parecido. Si tu negocio lo controla directamente la UAFE, "
        "el oficial se acredita con un oficio de designación y un título de tercer nivel o un "
        "certificado de dos años de experiencia en gestión de riesgos. Si te controla la "
        "Superintendencia de Compañías, la de Economía Popular y Solidaria o la de Bancos, se "
        "presenta la resolución de calificación de ese organismo. Por eso el primer paso, "
        "antes de llenar nada, es saber cuál es el tuyo.",

        {"h2": "Cuándo no tienes que hacer nada"},

        "Si tu certificado del RUC dice que no eres sujeto obligado, no tienes que "
        "registrarte ni designar oficial de cumplimiento. Tampoco tienes que contratar nada "
        "por las dudas.",

        "Lo que sí vale la pena es volver a mirar el certificado cada vez que actualices el "
        "RUC, por ejemplo si agregas una actividad económica nueva. Un cambio de actividad "
        "puede cambiar tu condición.",

        {"h2": "Una regla práctica para no perder el plazo"},

        "Apenas veas «obligado» en el certificado, cuenta los 30 días hábiles en un "
        "calendario y reparte la primera semana así: los correos el primer día, el oficial "
        "designado al tercero y la solicitud en SISLAFT antes del quinto. Lo que se traba "
        "casi siempre son los documentos, y para eso necesitas margen.",

        {"faq": [
            ("¿Dónde veo si soy sujeto obligado a la UAFE?",
             "En el certificado de tu RUC. Desde la resolución del SRI de agosto de 2025, ahí "
             "aparece la condición de obligado o no obligado a reportar a la UAFE."),
            ("¿Cuánto tiempo tengo para registrarme?",
             "30 días hábiles para obtener el código de registro. Si no lo consigues en ese "
             "plazo, el SRI suspende el RUC de oficio."),
            ("¿Los contadores y abogados son sujetos obligados?",
             "Aparecen en la lista oficial de la UAFE dentro de los sectores de la "
             "Superintendencia de Compañías, Valores y Seguros. Revisa tu certificado del RUC "
             "para confirmar tu caso."),
            ("¿Una persona natural puede ser sujeto obligado?",
             "Sí. La UAFE indica que el código de registro lo solicita el representante legal, "
             "el apoderado o la persona natural obligada."),
            ("¿Qué hago si no estoy seguro de mi sector?",
             "Pregúntale a tu contador o consulta directamente a la UAFE antes de que corra "
             "el plazo. Nosotros no damos asesoría legal: resolvemos los correos."),
        ]},

        f"Si ya sabes que eres sujeto obligado y te falta el correo, te lo dejamos funcionando "
        f"con el dominio de tu empresa. Mira el "
        f"{link(LANDING, 'paquete de correo institucional para la UAFE')} o "
        f"{link(wa('Hola, vengo del artículo sobre sujetos obligados y necesito el correo institucional para la UAFE'), 'escríbenos por WhatsApp')}.",
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 3 · RUC suspendido
# ════════════════════════════════════════════════════════════════════════════
post3 = {
    "title": "RUC suspendido por no registrarse en la UAFE: qué hacer",
    "slug": "ruc-suspendido-uafe-que-hacer",
    "imagen": 2764,
    "tags": ["RUC suspendido", "UAFE", "SRI", "código de registro",
             "certificado de cumplimiento"],
    "excerpt": "Si pasaron los 30 días hábiles sin código de registro, el SRI suspende el RUC "
               "de oficio. Cómo se levanta la suspensión y en qué orden conviene hacer los "
               "pasos para no perder más días.",
    "yoast_title": "RUC suspendido por la UAFE: cómo levantarlo",
    "yoast_desc": "El SRI suspende el RUC si no obtienes el código de registro en 30 días "
                  "hábiles. Qué documento lo levanta y el orden de pasos para salir rápido.",
    "focus_kw": "ruc suspendido uafe",
    "bloques": [
        "Te llega el aviso o lo descubres cuando algo deja de funcionar: tu RUC aparece "
        "suspendido. Revisas y la causa no es una declaración atrasada ni una deuda, sino un "
        "registro que no hiciste en la UAFE.",

        "Le está pasando a muchos negocios desde que el SRI empezó a cruzar el RUC con la "
        "UAFE. La buena noticia es que el camino para salir está definido. La mala es que "
        "tiene varios pasos y ninguno se salta.",

        {"h2": "La respuesta corta: se levanta con el certificado de la UAFE"},

        "El SRI suspende el RUC de oficio cuando un sujeto obligado no obtiene su "
        "<strong>código de registro</strong> en la UAFE dentro de los <strong>30 días "
        "hábiles</strong> siguientes a la inscripción o actualización del RUC.",

        "Para levantar la suspensión, tienes que presentar el <strong>Certificado de "
        "Cumplimiento de Obligaciones</strong> emitido por la UAFE, que acredita que ya "
        "obtuviste el código de registro. En otras palabras: primero se arregla en la UAFE y "
        "después en el SRI.",

        {"h2": "Por qué te suspendieron el RUC"},

        f"Desde agosto de 2025, el certificado del RUC indica si eres sujeto obligado a "
        f"reportar a la UAFE, y desde el 10 de septiembre de 2025 esa condición se verifica al "
        f"inscribir o actualizar el RUC. Si eras obligado y el plazo corrió sin que "
        f"consiguieras el código, la suspensión es automática. Si no sabes si te toca, lo "
        f"explicamos en {link(P2, 'cómo saber si eres sujeto obligado')}.",

        "La suspensión no es una multa por algo que hiciste mal en tus impuestos. Es la "
        "consecuencia de no haber completado un registro. Por eso no se arregla pagando, "
        "sino terminando ese registro.",

        {"h2": "El orden de pasos para salir de la suspensión"},

        "Este es el orden que conviene seguir. Saltarse el primero es lo que más tiempo "
        "hace perder:",

        {"ol": [
            "<strong>Deja listos los correos.</strong> El formulario del código de registro "
            "pide un correo corporativo y uno personal del representante legal, y el oficial "
            "necesita uno institucional de uso exclusivo.",
            "<strong>Designa al oficial de cumplimiento</strong> y reúne sus documentos, que "
            "varían según tu organismo de control.",
            "<strong>Solicita el código de registro en SISLAFT</strong>, el sistema en línea "
            "de la UAFE. Lo hace el representante legal o apoderado.",
            "<strong>Activa la solicitud</strong> con el enlace que llega al correo del "
            "representante legal, dentro de las 48 horas.",
            "<strong>Obtén el Certificado de Cumplimiento de Obligaciones</strong> de la "
            "UAFE.",
            "<strong>Preséntalo al SRI</strong> para que levante la suspensión del RUC.",
        ]},

        f"El detalle de los correos está en {link(P1, 'qué correo pide la UAFE')}, y los "
        f"requisitos del registro, en la página oficial de "
        f"{link(UAFE_CODIGO, 'solicitud del código de registro')}.",

        {"quote": "El paso que más se traba no es el más difícil, es el que nadie previó. "
                  "Llegar al formulario sin un correo con el dominio de la empresa obliga a "
                  "parar todo, y con el RUC suspendido cada día cuenta."},

        {"h2": "Cuánto puede tomar salir de la suspensión"},

        "Depende sobre todo de lo que ya tengas listo. Los correos, si ya tienes dominio, "
        "pueden quedar funcionando el mismo día; si hay que registrarlo, toma de uno a tres "
        "días hábiles. La solicitud en SISLAFT se completa en una sentada si los documentos "
        "están escaneados. Lo que no depende de ti son los tiempos de revisión de la UAFE y "
        "del SRI.",

        "Por eso vale la pena hacer en paralelo todo lo que sí depende de ti: mientras se "
        "crean los correos, el contador puede ir juntando los documentos del sector y el "
        "oficial puede preparar su oficio de designación.",

        {"h2": "Qué tener a mano antes de empezar"},

        {"tabla": [
            ["Qué", "Para qué sirve", "Quién lo prepara"],
            ["Correo corporativo del representante legal",
             "Recibir el enlace de activación y las credenciales", "La empresa"],
            ["Correo institucional del oficial",
             "Registrar al oficial de cumplimiento", "La empresa"],
            ["Documentos del sector, en PDF",
             "Adjuntarlos en la solicitud del código", "La empresa con su contador"],
            ["Datos del RUC", "Se autocompletan desde el SRI", "Ya están en el sistema"],
        ]},

        "Mientras el RUC está suspendido, la operación normal del negocio se complica. Los "
        "efectos concretos en tu caso conviene revisarlos con tu contador o directamente con "
        "el SRI; lo que sí está claro es que cuanto antes empieces, antes sales.",

        {"h2": "Los errores que alargan la suspensión"},

        {"ul": [
            "<strong>Usar un correo que nadie revisa.</strong> El enlace de activación llega "
            "al correo del representante legal y vence a las 48 horas. Si se pierde, toca "
            "volver a empezar.",
            "<strong>Registrar al oficial con el correo general de la empresa.</strong> La "
            "UAFE pide que el institucional sea de uso exclusivo del oficial.",
            "<strong>Subir documentos que no corresponden a tu sector.</strong> La propia UAFE "
            "recomienda verificar los requisitos de tu sector económico antes de cargar los "
            "PDF.",
            "<strong>Ir al SRI antes de tener el certificado.</strong> Sin el Certificado de "
            "Cumplimiento de Obligaciones, la suspensión no se levanta.",
        ]},

        "Ninguno de estos errores es grave por sí solo, pero cada uno suma días. Con el RUC "
        "suspendido, lo que se busca es hacer el recorrido una sola vez y bien.",

        {"h2": "Cuándo esto no te aplica"},

        "Si tu RUC está suspendido por otra causa, como declaraciones pendientes o falta de "
        "actividad, este camino no te sirve: el certificado de la UAFE solo levanta la "
        "suspensión que vino por no tener el código de registro. Revisa la causa exacta con "
        "el SRI antes de empezar.",

        "Y si todavía estás dentro de los 30 días hábiles, no esperes a la suspensión. Haz "
        "el mismo recorrido ahora y te ahorras el paso final ante el SRI.",

        {"h2": "La regla para no volver a pasar por esto"},

        "Guarda en un mismo lugar el código de registro, el certificado de cumplimiento y "
        "las contraseñas de los correos del oficial y del representante legal. Cada vez que "
        "cambie el oficial, recuerda que hay un máximo de 15 días para informar el cambio a "
        "la UAFE. Con eso ordenado, una actualización del RUC no te vuelve a tomar por "
        "sorpresa.",

        {"faq": [
            ("¿Por qué el SRI suspende el RUC por la UAFE?",
             "Porque el contribuyente era sujeto obligado y no obtuvo su código de registro en "
             "la UAFE dentro de los 30 días hábiles siguientes a la inscripción o "
             "actualización del RUC."),
            ("¿Qué documento levanta la suspensión?",
             "El Certificado de Cumplimiento de Obligaciones emitido por la UAFE, que acredita "
             "que ya obtuviste el código de registro."),
            ("¿Puedo pedir el código de registro con el RUC suspendido?",
             "El camino para levantar la suspensión pasa justamente por obtener el código y el "
             "certificado de la UAFE. Para tu caso puntual, confírmalo con la UAFE o con tu "
             "contador."),
            ("¿Cuánto tarda en estar listo el correo institucional?",
             "Con nosotros, el mismo día si ya tienes dominio, y de uno a tres días hábiles si "
             "hay que registrarlo."),
            ("¿Creative Web levanta la suspensión del RUC?",
             "No. Nosotros dejamos listos los correos que pide la UAFE. El registro y el "
             "trámite ante el SRI los hace tu negocio, normalmente con su contador."),
        ]},

        f"Si el correo es lo que te está frenando, empieza por ahí: te lo armamos con el "
        f"dominio de tu empresa. Mira el "
        f"{link(LANDING, 'paquete de correo institucional para la UAFE')} o "
        f"{link(wa('Hola, vengo del artículo sobre el RUC suspendido y necesito el correo institucional para la UAFE'), 'escríbenos por WhatsApp')}.",
    ],
}


if __name__ == "__main__":
    for s in [post1, post2, post3]:
        print(guarda(s))
