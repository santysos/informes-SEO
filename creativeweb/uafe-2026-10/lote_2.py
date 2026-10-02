#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Serie UAFE — posts 4, 5 y 6 (26-oct, 2-nov y 9-nov de 2026).

Datos: solo DATOS-VERIFICADOS.md. Tono: tú. No damos asesoría legal ni hacemos el trámite
ante la UAFE: resolvemos el correo institucional.
"""
from comun import (CITA, CORREOS, DOMINIOS, LANDING, SRIFLOW, UAFE_CODIGO, UAFE_OFICIAL,
                   guarda, link, url, wa)

P1 = url("que-correo-pide-la-uafe")
P2 = url("sujeto-obligado-uafe-como-saber")
P3 = url("ruc-suspendido-uafe-que-hacer")
P4 = url("oficial-de-cumplimiento-uafe-requisitos")
P5 = url("codigo-de-registro-uafe-requisitos")


def cierre(articulo):
    return (f"Si el correo es lo que te falta para avanzar, mira el "
            f"{link(LANDING, 'paquete de correo institucional para la UAFE')}: dominio y hasta "
            f"10 cuentas con el nombre de tu empresa por $81,98 + IVA al año. O "
            f"{link(wa(f'Hola, vengo del artículo {articulo} y necesito el correo institucional para la UAFE'), 'escríbenos por WhatsApp')} "
            f"y te contesta una persona.")


# ════════════════════════════════════════════════════════════════════════════
# 4 · Oficial de cumplimiento
# ════════════════════════════════════════════════════════════════════════════
oficial = {
    "title": "Oficial de cumplimiento UAFE: quién puede ser y qué te piden",
    "slug": "oficial-de-cumplimiento-uafe-requisitos",
    "imagen": 2783,
    "tags": ["UAFE", "oficial de cumplimiento", "sujetos obligados",
             "correo institucional", "prevención de lavado de activos"],
    "excerpt": "Quién puede ser oficial de cumplimiento, qué documentos te pide cada "
               "organismo de control, cuándo hace falta un suplente y por qué el oficial "
               "necesita un correo institucional propio.",
    "yoast_title": "Oficial de cumplimiento UAFE: requisitos y quién puede ser",
    "yoast_desc": "Título o experiencia, resolución de calificación, suplente, plazo de 15 "
                  "días y el correo exclusivo que pide la UAFE. Todo lo que necesitas reunir.",
    "focus_kw": "oficial de cumplimiento uafe requisitos",
    "bloques": [
        "Cuando una empresa descubre que es sujeto obligado a reportar a la UAFE, la primera "
        "pregunta práctica casi siempre es la misma: ¿quién va a ser el oficial de "
        "cumplimiento? Es la persona que queda registrada como responsable ante la UAFE, y "
        "sin ella no se completa el registro.",

        "Lo que te piden para registrarla depende de quién controla a tu negocio. No es lo "
        "mismo una inmobiliaria que responde directamente a la UAFE que una cooperativa de "
        "la Superintendencia de Economía Popular y Solidaria. Aquí te ordenamos lo que piden "
        "en cada caso, con lo que dice la fuente oficial.",

        {"h2": "La respuesta corta: depende de tu organismo de control"},

        "Si tu negocio lo controla directamente la UAFE, el oficial necesita un oficio de "
        "designación firmado con su aceptación, más un título de tercer nivel o un "
        "certificado de dos años de experiencia en gestión de riesgos. Si te controla la "
        "Superintendencia de Compañías, la de Economía Popular y Solidaria o la de Bancos, "
        "lo que se presenta es la resolución de calificación que emite ese organismo.",

        "En todos los casos se registran los mismos datos de la persona, incluido un correo "
        "institucional de uso exclusivo del oficial. Los requisitos completos están en la "
        f"{link(UAFE_OFICIAL, 'página oficial de registro del oficial de cumplimiento')}.",

        {"h2": "Qué te pide cada organismo de control"},

        {"tabla": [
            ["Organismo que te controla", "Qué documento se presenta", "¿Suplente obligatorio?"],
            ["UAFE (directamente)", "Oficio de designación con firma de aceptación + título "
             "de tercer nivel o certificado de 2 años de experiencia en gestión de riesgos", "No"],
            ["Superintendencia de Compañías, Valores y Seguros",
             "Copia de la resolución de calificación", "No"],
            ["Superintendencia de Economía Popular y Solidaria",
             "Copia de la resolución de calificación + comprobante de registro", "No"],
            ["Superintendencia de Bancos", "Copia de la resolución de calificación", "Sí"],
        ]},

        "El título de tercer nivel puede ser en Derecho, en Economía o en otras carreras. Si "
        "la persona que tienes en mente no tiene título, la alternativa que acepta la UAFE "
        "para los sujetos que controla directamente es el certificado de experiencia en "
        "gestión de riesgos.",

        "Si no sabes qué organismo te controla, ese es el primer dato a confirmar. Lo "
        f"explicamos en {link(P2, 'cómo saber si tu negocio es sujeto obligado')}.",

        {"h2": "Los datos de la persona que se registran"},

        "Además del documento, la UAFE pide estos datos del oficial de cumplimiento:",

        {"ul": [
            "Nombres y apellidos completos.",
            "Número de cédula.",
            "Dos correos: uno personal y uno institucional, de uso exclusivo del oficial.",
            "Teléfono celular y teléfono fijo.",
            "Dirección del domicilio del sujeto obligado.",
        ]},

        "El tercer punto es el que más detiene a las empresas pequeñas. El correo personal "
        "lo tiene cualquiera. El institucional tiene que llevar el dominio de tu empresa y "
        "ser solo del oficial: no sirve el info@ que revisan tres personas. Si todavía no lo "
        f"tienes, en {link(P1, 'qué correo pide la UAFE')} te explicamos el detalle.",

        {"quote": "Elige al oficial pensando en quién va a seguir en la empresa dentro de un "
                  "año. Cada cambio se vuelve a informar, y el correo exclusivo se le "
                  "entrega a la persona nueva, no se comparte."},

        {"h2": "El suplente: solo obligatorio en la Superintendencia de Bancos"},

        "Mucha gente asume que siempre hay que registrar un titular y un suplente. Según la "
        "UAFE, el oficial suplente es obligatorio solo para los sujetos controlados por la "
        "Superintendencia de Bancos. Para el resto, el titular alcanza.",

        "Si te toca registrar suplente, necesita sus propios datos y su propio correo "
        "institucional. Son dos personas distintas con dos cuentas distintas.",

        {"h2": "Cómo se informa el registro o el cambio, paso a paso"},

        {"ol": [
            "Confirma qué organismo controla a tu negocio.",
            "Elige a la persona y reúne su documento: oficio con título o experiencia, o la "
            "resolución de calificación de tu superintendencia.",
            "Crea la cuenta institucional exclusiva del oficial antes de llenar nada.",
            "Escanea los documentos en PDF de máximo 2 MB cada uno.",
            "Envíalos a secretariageneral@uafe.gob.ec o entrégalos en la oficina de la UAFE "
            "en Quito (Av. Portugal E9-138 y Av. República de El Salvador, edificio Plaza Real).",
            "Hazlo dentro de los 15 días que da la UAFE para informar el registro o el cambio.",
        ]},

        "Cuando cambia el oficial, el proceso se repite con la persona nueva. Del lado del "
        "correo es simple: se cambia la contraseña de la cuenta o se crea una nueva, en un "
        "par de minutos.",

        {"h2": "Cómo nombrar y cuidar la cuenta del oficial"},

        "Un detalle que parece menor y ahorra problemas: el nombre de la cuenta. Si la creas "
        "con el nombre de la persona (maria@tuempresa.com), cuando cambie el oficial vas a "
        "tener que crear otra y volver a informar un correo distinto. Si la creas por la "
        "función (cumplimiento@tuempresa.com), la cuenta sigue siendo la misma y solo cambia "
        "quién la usa.",

        "Las dos opciones son válidas. Lo que conviene evitar es que la cuenta del oficial "
        "termine compartida con otras tareas, porque la UAFE la pide de uso exclusivo:",

        {"ul": [
            "No la uses para facturación, ventas ni atención a clientes.",
            "No la reenvíes automáticamente a la bandeja de otra persona.",
            "Guarda la contraseña en un lugar seguro de la empresa, además del celular del "
            "oficial.",
            "Revísala con frecuencia: es la que la UAFE tiene registrada para contactarte.",
        ]},

        {"h2": "Cuándo esto no te aplica"},

        "Si tu negocio no figura como sujeto obligado, no necesitas registrar oficial de "
        "cumplimiento. Y si ya lo tienes registrado con un correo de tu dominio que usa solo "
        "esa persona, no hay nada que cambiar. Este artículo tampoco reemplaza lo que te diga "
        "tu contador, tu abogado o la propia UAFE sobre tu caso concreto.",

        {"h2": "Lo que conviene dejar listo esta semana"},

        "Antes de juntar papeles, define tres cosas: quién va a ser el oficial, qué organismo "
        "te controla y con qué correo exclusivo lo vas a registrar. Con esas tres respuestas, "
        "el resto es reunir documentos. El correo es lo único que puedes resolver hoy mismo "
        "sin esperar a nadie.",

        {"faq": [
            ("¿El dueño del negocio puede ser el oficial de cumplimiento?",
             "Eso depende de lo que exija tu organismo de control y de tu tipo de negocio, "
             "y no es algo que podamos responder nosotros. Confírmalo con tu contador, tu "
             "abogado o la UAFE antes de designar a nadie."),
            ("¿El oficial necesita un título universitario?",
             "Para los sujetos que controla directamente la UAFE, se presenta un título de "
             "tercer nivel o un certificado de dos años de experiencia en gestión de riesgos. "
             "En las superintendencias se presenta la resolución de calificación."),
            ("¿Cuánto tiempo tengo para informar a la UAFE?",
             "La UAFE da un máximo de 15 días para informar el registro o el cambio del "
             "oficial de cumplimiento."),
            ("¿Puede el oficial usar el correo general de la empresa?",
             "La UAFE pide un correo institucional de uso exclusivo del oficial. Lo correcto "
             "es crearle una cuenta propia con el dominio de tu empresa."),
            ("¿Qué pasa con el correo si el oficial se va?",
             "La cuenta es de la empresa, no de la persona. Se cambia la contraseña o se crea "
             "una nueva para quien entra, y el cambio se informa a la UAFE."),
        ]},

        cierre("del oficial de cumplimiento"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 5 · Código de registro
# ════════════════════════════════════════════════════════════════════════════
codigo = {
    "title": "Código de registro UAFE: lo que tienes que tener listo antes de entrar a SISLAFT",
    "slug": "codigo-de-registro-uafe-requisitos",
    "imagen": 2814,
    "tags": ["UAFE", "código de registro UAFE", "SISLAFT", "sujetos obligados",
             "correo institucional", "RUC"],
    "excerpt": "La lista de lo que necesitas reunido antes de pedir el código de registro "
               "en SISLAFT, y por qué el correo del representante legal tiene que funcionar "
               "desde el primer minuto.",
    "yoast_title": "Código de registro UAFE: qué tener listo antes de empezar",
    "yoast_desc": "RUC, representante legal con dos correos, oficial de cumplimiento y PDF "
                  "por sector. La lista para pedir el código en SISLAFT sin quedarte a medias.",
    "focus_kw": "codigo de registro uafe",
    "bloques": [
        "El código de registro de la UAFE es el número que confirma que tu negocio, como "
        "sujeto obligado, quedó inscrito. Desde septiembre de 2025 no es un trámite que se "
        "pueda dejar para después: si el SRI te marca como sujeto obligado, tienes 30 días "
        "hábiles para obtenerlo o tu RUC se suspende.",

        "El formulario se llena en SISLAFT, el sistema en línea de la UAFE. No es difícil, "
        "pero se traba fácil si llegas sin algo. Esta es la lista de preparación que nos "
        "habría gustado que alguien nos diera. <strong>No reemplaza al instructivo oficial</strong>: "
        f"tenlo abierto en la {link(UAFE_CODIGO, 'página de solicitud de código de registro')}.",

        {"h2": "La respuesta corta: seis bloques de información y un correo que funcione"},

        "El formulario tiene seis secciones: datos de la institución, representante legal, "
        "oficial de cumplimiento titular, oficial suplente, oficinas y agencias, y documentos "
        "adjuntos. Lo llena el representante legal o un apoderado, o la persona natural si el "
        "obligado eres tú.",

        "El detalle que más gente pasa por alto: el enlace para activar la solicitud llega "
        "al correo del representante legal, y hay que activarla dentro de las 48 horas. Si "
        "ese correo no existe todavía o nadie lo revisa, el trámite se queda a medias.",

        {"h2": "La lista de preparación, sección por sección"},

        {"tabla": [
            ["Sección de SISLAFT", "Qué tener a mano"],
            ["Datos de la institución", "El RUC. Al ingresarlo, el sistema completa los datos "
             "que tiene el SRI"],
            ["Representante legal", "Sus datos y dos correos: uno corporativo y uno personal"],
            ["Oficial de cumplimiento titular", "Sus datos, calificados ante tu organismo de "
             "control, y la cuenta institucional exclusiva del oficial"],
            ["Oficial suplente", "Solo si te controla la Superintendencia de Bancos"],
            ["Oficinas y agencias", "Los establecimientos de tu negocio"],
            ["Documentos adjuntos", "Los requisitos de tu sector, escaneados en PDF"],
        ]},

        "Los documentos cambian según el sector económico, y la propia UAFE recomienda "
        "verificar los del tuyo antes de empezar. No supongas que lo que le pidieron a una "
        "constructora es lo mismo que le van a pedir a una cooperativa.",

        "Si todavía no tienes definido al oficial, resuélvelo primero: lo explicamos en "
        f"{link(P4, 'requisitos del oficial de cumplimiento')}.",

        {"h2": "Los correos: el paso que conviene resolver antes que todo"},

        "En este trámite aparecen dos pedidos de correo distintos, y ninguno se improvisa en "
        "el momento:",

        {"ul": [
            "<strong>El representante legal</strong> registra un correo corporativo y uno "
            "personal. Al primero llega, entre otras cosas, el enlace de activación y después "
            "el usuario y la contraseña.",
            "<strong>El oficial de cumplimiento</strong> registra un correo personal y uno "
            "institucional de uso exclusivo.",
        ]},

        "En la práctica son al menos dos cuentas con el dominio de tu empresa, una para cada "
        "persona. Si el representante legal y el oficial son la misma persona, igual conviene "
        "separar la cuenta del oficial, porque la UAFE la pide de uso exclusivo.",

        {"quote": "Haz una prueba antes de abrir SISLAFT: envíate un correo desde otra cuenta "
                  "a la del representante legal y confirma que llega. Son dos minutos que "
                  "evitan perder la activación de 48 horas."},

        {"h2": "El orden que recomendamos, paso a paso"},

        {"ol": [
            "Confirma en tu certificado de RUC que eres sujeto obligado y qué organismo te "
            "controla.",
            "Crea los correos con el dominio de tu empresa: el del representante legal y el "
            "del oficial.",
            "Prueba que los dos envían y reciben.",
            "Reúne los documentos de tu sector y escanéalos en PDF.",
            "Entra a SISLAFT por el enlace que corresponde a tu organismo de control y llena "
            "las seis secciones.",
            "Revisa el correo del representante legal y activa la solicitud dentro de las 48 "
            "horas.",
            "Guarda el código de registro y el usuario que te llegan.",
        ]},

        "Si el plazo ya se te pasó y te suspendieron el RUC, el camino es otro: lo contamos "
        f"en {link(P3, 'qué hacer si te suspendieron el RUC por la UAFE')}.",

        {"h2": "Los errores que más hacen repetir el trámite"},

        "Casi todos los tropiezos con el código de registro tienen que ver con algo que "
        "faltaba antes de empezar, no con el sistema en sí:",

        {"ul": [
            "<strong>Usar un correo que nadie revisa.</strong> El enlace de activación llega, "
            "pasan las 48 horas y hay que volver a empezar.",
            "<strong>Registrar el mismo correo para el representante legal y para el "
            "oficial.</strong> La cuenta del oficial es de uso exclusivo; conviene que sean "
            "cuentas distintas.",
            "<strong>Llegar sin los documentos del sector.</strong> Cada sector tiene los "
            "suyos, y subir los de otro obliga a corregir.",
            "<strong>Escanear mal.</strong> Los documentos se suben en PDF; un archivo "
            "ilegible o en otro formato no sirve.",
            "<strong>Dejarlo para la última semana.</strong> Si hay que registrar un dominio "
            "nuevo, eso suma entre uno y tres días hábiles al plazo de 30.",
        ]},

        "Y un error de fondo: confundir el código de registro con el registro del oficial. "
        "Son dos pasos relacionados pero distintos. El oficial se informa con sus documentos "
        "en un plazo de 15 días; el código se pide en SISLAFT dentro de los 30 días hábiles "
        "que da el SRI. Conviene llevar las dos fechas anotadas.",

        "El último punto es el que más se subestima. Si no tienes dominio propio, el correo "
        "es lo primero que hay que pedir, porque es lo único del trámite que depende de un "
        "tercero y no de ti.",

        {"h2": "Cuándo esto no te aplica"},

        "Si tu certificado de RUC dice que no eres sujeto obligado, no tienes que pedir "
        "código de registro. Y si ya lo tienes, lo que te toca es mantener los datos al día, "
        "incluido el correo del oficial cuando cambie la persona. Para las dudas sobre los "
        "documentos de tu sector, la referencia es la UAFE o tu contador.",

        {"h2": "La regla para no quedarte a medias"},

        "Ningún paso de SISLAFT empieza sin los correos funcionando. El sistema autocompleta "
        "lo del SRI y te pide documentos que puedes juntar en una tarde, pero la activación "
        "depende de un correo que alguien lea a tiempo. Resuélvelo primero y el resto avanza solo.",

        {"faq": [
            ("¿Quién tiene que llenar la solicitud del código de registro?",
             "El representante legal o un apoderado de la institución. Si el obligado es una "
             "persona natural, lo hace ella misma."),
            ("¿Cuánto tiempo tengo para activar la solicitud?",
             "La UAFE indica que la solicitud debe activarse dentro de las 48 horas, con el "
             "enlace que llega al correo del representante legal."),
            ("¿Qué documentos tengo que subir?",
             "Depende de tu sector económico. Se suben escaneados en PDF, y la UAFE "
             "recomienda verificar los requisitos de tu sector antes de empezar."),
            ("¿Necesito registrar un oficial suplente?",
             "Solo si tu organismo de control es la Superintendencia de Bancos. Para los "
             "demás, el titular es suficiente."),
            ("¿Cuánto plazo tengo para obtener el código?",
             "Si el SRI te marca como sujeto obligado al inscribir o actualizar el RUC, "
             "tienes 30 días hábiles. Si no lo obtienes, el RUC se suspende de oficio."),
        ]},

        cierre("del código de registro"),
    ],
}


# ════════════════════════════════════════════════════════════════════════════
# 6 · Contadores y abogados
# ════════════════════════════════════════════════════════════════════════════
contadores = {
    "title": "Contadores y abogados ante la UAFE: lo que te toca y lo que les toca a tus clientes",
    "slug": "uafe-contadores-abogados",
    "imagen": 3460,
    "tags": ["UAFE", "contadores", "abogados", "sujetos obligados", "correo institucional"],
    "excerpt": "Contadores y abogados figuran entre los sujetos obligados a registrarse en la "
               "UAFE. Qué implica para tu propio registro y cómo ayudar a los clientes que te "
               "van a preguntar por el suyo.",
    "yoast_title": "UAFE contadores y abogados: tu registro y el de tus clientes",
    "yoast_desc": "Contadores y abogados están en la lista de sujetos obligados de la UAFE. "
                  "Tu registro, tu correo institucional y lo que te van a pedir tus clientes.",
    "focus_kw": "uafe contadores y abogados",
    "bloques": [
        "Si eres contador o abogado, la UAFE te llega por dos lados. Por un lado, tu "
        "profesión aparece en la lista oficial de sujetos obligados, así que tu propio "
        "registro te toca de cerca. Por el otro, desde que el SRI empezó a marcar a los "
        "obligados en el RUC, tus clientes te están llamando para preguntar qué hacer.",

        "Este artículo ordena los dos frentes. No es asesoría legal, que en tu caso "
        "probablemente das tú mismo: es la parte práctica que suele trabar a todos, y que se "
        "resuelve rápido si sabes dónde mirar.",

        {"h2": "La respuesta corta: estás en la lista, y tus clientes también"},

        "En la página oficial de solicitud de código de registro de la UAFE, contadores y "
        "abogados figuran entre los sectores bajo la Superintendencia de Compañías, Valores "
        "y Seguros. Eso implica pasar por el mismo proceso que cualquier sujeto obligado: "
        "código de registro en SISLAFT, oficial de cumplimiento y los correos que piden en "
        f"cada paso. La lista completa está en la {link(UAFE_CODIGO, 'página oficial de la UAFE')}.",

        "Si ejerces como persona natural o a través de una compañía, lo que corresponde en tu "
        "caso concreto lo defines tú con la norma y con tu organismo de control. Aquí nos "
        "quedamos en lo operativo.",

        {"h2": "Tu propio registro: los correos que te van a pedir"},

        "En el trámite aparecen dos pedidos de correo que conviene tener resueltos antes de "
        "abrir el sistema:",

        {"tabla": [
            ["Quién", "Correos que se registran", "Por qué importa"],
            ["Representante legal", "Uno corporativo y uno personal",
             "Al correo del representante legal llega el enlace de activación, que vence "
             "en 48 horas"],
            ["Oficial de cumplimiento", "Uno personal y uno institucional de uso exclusivo",
             "La cuenta institucional es solo del oficial; no sirve la general del estudio"],
        ]},

        "Muchos estudios contables y jurídicos pequeños trabajan con una cuenta gratuita a "
        "nombre del titular. Para este trámite lo que corresponde es una cuenta con el "
        "dominio del estudio. El detalle de lo que pide la SISLAFT está en "
        f"{link(P5, 'qué tener listo para el código de registro')}.",

        {"quote": "Si vas a ayudar a tus clientes con la UAFE, resuelve primero tu propio "
                  "registro. Es la mejor forma de conocer de memoria dónde se traba cada "
                  "paso antes de explicárselo a otro."},

        {"h2": "Tus clientes: quiénes te van a preguntar"},

        "Según la misma lista oficial, entre los sujetos obligados están muchos de los "
        "negocios que suelen llevar los estudios contables y jurídicos de provincia:",

        {"ul": [
            "Comercializadoras de vehículos.",
            "Constructoras e inmobiliarias.",
            "Negociadores de joyas, metales y piedras preciosas.",
            "Couriers y empresas de transferencia de fondos.",
            "Cooperativas de ahorro y crédito y mutualistas.",
            "Fundaciones, ONG, asociaciones, consorcios y sociedades de hecho.",
        ]},

        "A todos les pasa lo mismo: el SRI les indica al inscribir o actualizar el RUC que "
        "son sujetos obligados, y desde ahí tienen 30 días hábiles para obtener el código de "
        "registro. Si no lo hacen, el RUC se suspende de oficio. Para confirmar quién entra, "
        f"tus clientes pueden leer {link(P2, 'cómo saber si un negocio es sujeto obligado')}.",

        {"h2": "Dónde se traban tus clientes, y qué parte te podemos quitar de encima"},

        "La parte legal y la de los documentos la conoces mejor que nadie. Pero hay un paso "
        "que no es ni contable ni jurídico y que frena a muchos negocios pequeños: no tienen "
        "dominio propio, así que no tienen correo institucional para el oficial ni correo "
        "corporativo para el representante legal.",

        "Ese paso lo podemos resolver nosotros, de principio a fin y a distancia:",

        {"ol": [
            "Tu cliente nos escribe por WhatsApp, o nos escribes tú por él.",
            "Elegimos el dominio con el nombre del negocio y lo registramos a su nombre.",
            "Creamos las cuentas del representante legal, del oficial y las que necesite.",
            "Las dejamos funcionando en su celular y su computadora, con un correo de prueba.",
            "Tu cliente vuelve contigo con los correos listos para completar el registro.",
        ]},

        "Si ya tiene dominio, queda funcionando el mismo día. Si hay que registrarlo, entre "
        "uno y tres días hábiles. Atendemos negocios de todo el Ecuador desde Otavalo. "
        "Ya trabajamos con contadores: tenemos "
        f"{link(SRIFLOW, 'SriFlow, una herramienta para descargar comprobantes del SRI')}.",

        {"h2": "Cómo explicárselo a un cliente en tres frases"},

        "Muchos de tus clientes no saben qué es un dominio, y no tienen por qué saberlo. Lo "
        "que necesitan entender es corto:",

        {"ol": [
            "«La UAFE te pide un correo con el nombre de tu negocio para el oficial de "
            "cumplimiento, aparte del correo personal del oficial.»",
            "«Si hoy usas un correo gratuito, hay que crear uno nuevo con tu propio "
            "dominio.»",
            "«Eso se resuelve aparte y rápido; mientras tanto, yo preparo los documentos.»",
        ]},

        "Si el cliente prefiere que lo hagas tú, también funciona: nos escribes con el nombre "
        "del negocio y el de la persona que será oficial, y coordinamos el resto directamente "
        "con el cliente para que el dominio quede a su nombre y no al tuyo.",

        "Dividir el trabajo así evita que el cliente llegue a la última semana del plazo con "
        "los documentos listos y sin correo para registrar. Mientras tú preparas lo legal y lo "
        "contable, el correo avanza en paralelo.",

        {"h2": "Cuándo esto no te aplica"},

        "Si tu estudio ya está registrado con correos del dominio propio, y tus clientes "
        "obligados también, no hay nada que resolver del lado del correo. Y si un cliente "
        "tiene dudas sobre si entra o no en la lista, eso se responde con la norma y con la "
        "UAFE, no con un proveedor de correo.",

        {"h2": "La regla práctica para este trimestre"},

        "Cuando un cliente te diga que el SRI lo marcó como sujeto obligado, la primera "
        "pregunta conviene que sea: «¿tienes correo con el dominio de tu negocio?». Si la "
        "respuesta es no, ese es el primer paso del plazo de 30 días, y el que menos depende "
        "de papeles.",

        {"faq": [
            ("¿Los contadores son sujetos obligados a la UAFE?",
             "En la página oficial de solicitud de código de registro, los contadores "
             "figuran entre los sectores bajo la Superintendencia de Compañías, Valores y "
             "Seguros. Tu caso concreto confírmalo con la norma y la UAFE."),
            ("¿Y los abogados?",
             "También figuran en esa misma lista, bajo la Superintendencia de Compañías, "
             "Valores y Seguros."),
            ("¿Qué correos me piden para el registro?",
             "El representante legal registra uno corporativo y uno personal, y el oficial "
             "de cumplimiento uno personal y uno institucional de uso exclusivo."),
            ("¿Pueden crear los correos de mis clientes?",
             "Sí. Registramos el dominio a nombre de tu cliente, creamos las cuentas y las "
             "dejamos funcionando. El trámite ante la UAFE lo sigue llevando el cliente "
             "contigo."),
            ("¿Cuánto cuesta para cada cliente?",
             "El paquete UAFE cuesta $81,98 + IVA al año: dominio .com y hasta 10 correos con "
             "4.000 MB compartidos. Si el cliente ya tiene dominio, solo paga los correos."),
        ]},

        cierre("de contadores y abogados ante la UAFE"),
    ],
}


if __name__ == "__main__":
    for s in [oficial, codigo, contadores]:
        print(guarda(s))
