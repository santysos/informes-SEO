#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Serie UAFE — post 8 (7-dic-2026): el usuario de SISLAFT.

Por qué este tema: «sislaft» ~519 búsquedas/mes y «sislaft uafe» ~313 en Bing Ecuador
(GetKeywordStats, 24 semanas); en Google «crear usuario uafe» y «sislaft» aparecen en posición
~10 sin página propia. Y es el punto donde el correo decide todo: la activación, el usuario y la
recuperación llegan al correo registrado.

Datos: solo DATOS-VERIFICADOS.md (sección «Usuario de SISLAFT»). Tono: tú.
No damos asesoría legal ni hacemos el trámite ante la UAFE.
"""
from comun import (LANDING, UAFE_COMO_CODIGO, UAFE_RECUPERAR, guarda, link, url, wa)

P1 = url("que-correo-pide-la-uafe")
P2 = url("sujeto-obligado-uafe-como-saber")
P4 = url("oficial-de-cumplimiento-uafe-requisitos")
P5 = url("codigo-de-registro-uafe-requisitos")
P7 = url("certificado-de-cumplimiento-uafe-contratacion-publica")
SISLAFT = "https://sislaft.uafe.gob.ec/sislaft/"

WA_MSG = ("Hola, vengo del artículo del usuario de SISLAFT y necesito el correo institucional "
          "para la UAFE")

sislaft = {
    "title": "Usuario de SISLAFT: cómo obtenerlo y cómo recuperarlo si lo perdiste",
    "slug": "usuario-sislaft-uafe",
    "imagen": 2783,
    "tags": ["UAFE", "SISLAFT", "código de registro UAFE", "correo institucional",
             "sujetos obligados"],
    "excerpt": "El usuario de SISLAFT no se crea con un botón: sale de la solicitud del código de "
               "registro y llega al correo registrado. Cómo se obtiene, cómo se recupera y por "
               "qué ese correo tiene que ser uno que tu empresa controle.",
    "yoast_title": "SISLAFT UAFE: cómo obtener y recuperar tu usuario",
    "yoast_desc": "El usuario sale de la solicitud del código de registro y todo llega al correo "
                  "registrado. Los pasos para obtenerlo, recuperarlo y no perder el acceso.",
    "focus_kw": "sislaft",
    "bloques": [
        # ── respuesta en las tres primeras líneas ──
        "<strong>En SISLAFT no hay un botón de «crear usuario»: el usuario y la contraseña salen "
        "de la solicitud del código de registro, y todo llega al correo que registraste.</strong> "
        "Si ya lo tienes y lo olvidaste, se recupera en el mismo sistema con tu cédula y ese "
        "correo. Por eso el correo registrado tiene que ser uno que tu empresa controle hoy y "
        "dentro de cinco años.",

        "SISLAFT es el sistema en línea de la UAFE donde los sujetos obligados piden el código de "
        "registro, registran al oficial de cumplimiento y descargan el certificado de "
        f"cumplimiento. Está en {link(SISLAFT, 'sislaft.uafe.gob.ec')}, y desde la página de la "
        "UAFE se llega por Servicios → SISLAFT.",

        "Mucha gente lo busca cuando ya está apurada: le pidieron el certificado, le suspendieron "
        "el RUC o cambió el oficial. Y descubre que el usuario está atado a un correo que no "
        "revisa nadie, o que era del contador que ya no trabaja con la empresa.",

        {"h2": "Cómo se obtiene el usuario por primera vez"},
        f"El camino que describe la {link(UAFE_COMO_CODIGO, 'UAFE')} es este:",
        {"ol": [
            "Llenas la solicitud del código de registro en SISLAFT, con el formulario que "
            "corresponde a tu organismo de control y sector.",
            "Al correo del <strong>representante legal</strong> (o de la persona natural) llega "
            "un enlace. Tienes <strong>48 horas</strong> para abrirlo y activar la solicitud; si "
            "no aparece, revisa la carpeta de spam.",
            "La UAFE revisa la solicitud. Según su página, luego de <strong>cinco días "
            "hábiles</strong> te notifica por correo si fue aprobada o rechazada.",
            "Con la solicitud aprobada, entras a SISLAFT y recuperas el usuario y la contraseña.",
        ]},
        f"Los documentos y datos que necesitas reunidos antes del primer paso están en "
        f"{link(P5, 'qué tener listo para la solicitud del código de registro')}.",
        {"tabla": [
            ["Momento", "A qué correo llega", "Qué pasa si no llega"],
            ["Enlace de activación", "Correo del representante legal o de la persona natural",
             "La solicitud no se completa si no se activa en 48 horas"],
            ["Aprobación o rechazo", "Correo registrado", "No sabes si te aprobaron"],
            ["Usuario nuevo (recuperación)", "Correo registrado",
             "No puedes entrar al sistema"],
        ]},

        {"h2": "Cómo recuperar el usuario o la contraseña"},
        f"Son dos opciones distintas dentro de SISLAFT, según la "
        f"{link(UAFE_RECUPERAR, 'guía oficial de recuperación')}:",
        {"h3": "Si olvidaste el usuario"},
        {"ol": [
            "Entra a SISLAFT y elige <strong>Recuperar usuario</strong>.",
            "Escribe tu número de cédula o pasaporte y el <strong>correo registrado</strong>.",
            "El nuevo usuario llega a ese correo. Con él vuelves a entrar.",
        ]},
        {"h3": "Si olvidaste la contraseña"},
        {"ol": [
            "En SISLAFT elige <strong>Recuperar contraseña</strong>.",
            "Escribe tu usuario y el <strong>correo registrado</strong>.",
            "Revisa la bandeja de entrada y el spam, y entra con los datos nuevos.",
        ]},
        "Fíjate en lo que se repite: en los dos casos el sistema te pide el correo registrado y "
        "manda la respuesta ahí. La cédula sola no alcanza.",

        {"h2": "El problema real: un correo que tu empresa no controla"},
        "La recuperación funciona bien mientras tengas acceso al correo con el que te "
        "registraste. Los casos en que deja de funcionar se repiten:",
        {"ul": [
            "<strong>El correo era del contador o del abogado.</strong> Además de ser un dominio "
            "de terceros, que la UAFE rechaza, el día que cambias de contador el acceso se va "
            "con él.",
            "<strong>Era una cuenta compartida tipo info@ o gerencia@.</strong> La UAFE pide "
            "correos personalizados; una cuenta departamental es motivo de rechazo.",
            "<strong>Era el correo de un empleado que ya no está.</strong> Nadie sabe la "
            "contraseña de esa cuenta.",
            "<strong>Era un correo gratuito que nadie revisa.</strong> El enlace de 48 horas "
            "caduca en la carpeta de spam.",
        ]},
        "Las páginas oficiales de la UAFE no publican un procedimiento para cuando ya no tienes "
        "acceso al correo registrado o necesitas cambiarlo. Si te pasa, consulta directamente a "
        "la UAFE (el teléfono general de su sitio es 593-2 394-3940). Lo que sí está en tus "
        "manos es no llegar a ese punto.",
        {"quote": "El usuario de SISLAFT vale lo que vale el correo al que está atado. Si ese "
                  "correo es de otra persona, en realidad el acceso también es de otra "
                  "persona."},

        {"h2": "Qué correo registrar para no perder el acceso"},
        f"Representante legal, oficial titular y oficial suplente registran dos correos cada "
        f"uno: uno corporativo y uno personal. Para el corporativo, la UAFE ya dejó claro el "
        f"formato (ver {link(P1, 'qué correo pide la UAFE')}):",
        {"ul": [
            "Con nombre y apellido: <strong>nombre.apellido@tuempresa.com</strong>.",
            "Con el dominio de tu propia empresa, no el del contador ni el del proveedor.",
            "Una cuenta por persona. Si cambia el oficial, cuenta nueva con el nombre de quien "
            "entra; no se hereda la anterior cambiando la contraseña.",
            "En un servicio donde la empresa pueda recuperar o cerrar la cuenta aunque la "
            "persona se vaya.",
        ]},
        f"Ese último punto es la diferencia entre un correo gratuito personal y uno con tu "
        f"dominio: el dominio es de la empresa, y las cuentas también. Para el oficial de "
        f"cumplimiento, los detalles están en {link(P4, 'requisitos del oficial de cumplimiento')}.",

        {"h2": "Cuándo no necesitas nada de esto"},
        {"ul": [
            f"Si tu actividad no está sujeta a reporte, no necesitas SISLAFT. Revisa primero "
            f"{link(P2, 'cómo saber si eres sujeto obligado')}.",
            "Si ya entras a SISLAFT sin problema y el correo registrado es corporativo, con "
            "nombre y apellido y bajo control de la empresa: no hay nada que cambiar.",
            "Si tu duda es sobre reportes u obligaciones legales, eso lo responde la UAFE o tu "
            "abogado. Nosotros no hacemos el trámite ni damos asesoría legal.",
        ]},

        {"h2": "Revisión de cinco minutos para tu empresa"},
        {"ol": [
            "Anota qué correos están registrados en SISLAFT para el representante legal y el "
            "oficial.",
            "Comprueba que alguien de la empresa entra hoy a cada uno.",
            "Si alguno es del contador, departamental o de alguien que ya se fue, planifica el "
            "cambio antes de que te pidan un certificado con plazo.",
            f"Si vas a firmar un contrato con el Estado, recuerda que el certificado puede ir al "
            f"día siguiente de la firma: {link(P7, 'certificado de cumplimiento para contratistas')}.",
        ]},

        {"faq": [
            ("¿Cómo creo un usuario en SISLAFT?",
             "No se crea por separado. Sale de la solicitud del código de registro: activas el "
             "enlace que llega al correo del representante legal y, con la solicitud aprobada, "
             "recuperas el usuario y la contraseña en el sistema."),
            ("¿Cuánto tarda la UAFE en aprobar la solicitud?",
             "Según su página, la solicitud se verifica luego de cinco días hábiles y el "
             "resultado se notifica por correo. Antes, tienes 48 horas para activar el enlace."),
            ("No me llega el correo de recuperación, ¿qué hago?",
             "Revisa la carpeta de spam, como indica la UAFE. Si el correo registrado ya no "
             "existe o no tienes acceso, consulta directamente a la UAFE: el procedimiento para "
             "ese caso no está publicado."),
            ("¿Puedo usar el mismo correo para el representante legal y el oficial?",
             "No conviene. Cada persona registra sus propios correos, y la UAFE pide que sean "
             "personalizados, con el nombre de quien los usa."),
        ]},

        f"Si necesitas correos con el dominio de tu empresa para registrarlos en SISLAFT, mira "
        f"el {link(LANDING, 'paquete de correo institucional para la UAFE')}: dominio y hasta 10 "
        f"cuentas por $81,98 + IVA al año, listas el mismo día si ya tienes dominio. O "
        f"{link(wa(WA_MSG), 'escríbenos por WhatsApp')} y te contesta una persona.",
    ],
}

if __name__ == "__main__":
    ruta, pal = guarda(sislaft)
    print(ruta, pal, "palabras")
