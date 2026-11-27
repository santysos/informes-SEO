#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Serie UAFE — post 7 (30-nov-2026): certificado de cumplimiento para contratistas del Estado.

Por qué este tema: «certificado de cumplimiento uafe» y variantes sumaron ~275 impresiones en
oct-nov en posición 10 sin clics, y ninguna página nuestra lo responde. El top 10 lo encabezan
las dos páginas oficiales de la UAFE con el paso a paso de SISLAFT; no competimos con eso. El
ángulo nuevo es la contratación pública (art. 60 del RGLOSNCP, Decreto 461 de jul-2026): quien
firma con el Estado tiene 30 días —o un día— para presentarlo, y si no tiene código de registro
la cadena empieza por los correos con nombre y apellido.

Datos: solo DATOS-VERIFICADOS.md (sección «Certificado de Cumplimiento»). Tono: tú.
No damos asesoría legal ni hacemos el trámite ante la UAFE.
"""
from comun import (LANDING, PGE_INFOGRAFIA, UAFE_CERTIFICADO, UAFE_CODIGO, guarda, link,
                   url, wa)

P1 = url("que-correo-pide-la-uafe")
P2 = url("sujeto-obligado-uafe-como-saber")
P3 = url("ruc-suspendido-uafe-que-hacer")
P4 = url("oficial-de-cumplimiento-uafe-requisitos")
P5 = url("codigo-de-registro-uafe-requisitos")

SLUG = "certificado-de-cumplimiento-uafe-contratacion-publica"
WA_MSG = ("Hola, vengo del artículo del certificado de cumplimiento UAFE y necesito el "
          "correo institucional para la UAFE")

certificado = {
    "title": "Certificado de cumplimiento UAFE si firmaste un contrato con el Estado",
    "slug": SLUG,
    "imagen": 2814,
    "tags": ["UAFE", "certificado de cumplimiento", "contratación pública", "SERCOP",
             "código de registro UAFE", "SISLAFT"],
    "excerpt": "Si tu actividad está sujeta a reporte a la UAFE, la entidad que te contrató te "
               "pedirá el certificado de cumplimiento en 30 días desde la firma, o al día "
               "siguiente en contratos cortos. Qué necesitas antes y en qué orden.",
    "yoast_title": "Certificado de cumplimiento UAFE: contratos con el Estado",
    "yoast_desc": "Tienes 30 días desde la firma, o un día en contratos cortos, para presentarlo. "
                  "Qué necesitas antes de sacarlo en SISLAFT y qué pasa si no llega a tiempo.",
    "focus_kw": "certificado de cumplimiento uafe",
    "bloques": [
        # ── respuesta en las tres primeras líneas ──
        "<strong>Si firmaste un contrato con el Estado y tu actividad está sujeta a reporte a la "
        "UAFE, tienes que presentar el certificado de cumplimiento dentro de 30 días desde la "
        "firma, o al día siguiente si el contrato dura menos de 30 días.</strong> Lo descarga el "
        "representante legal en SISLAFT, pero solo si ya tienes el código de registro y el "
        "oficial de cumplimiento registrado. Si no lo presentas, la entidad puede terminar el "
        "contrato de forma unilateral.",

        "La exigencia no es nueva, pero se volvió más estricta. La Procuraduría General del "
        "Estado publicó en 2026 una guía para las entidades contratantes sobre cómo pedir y "
        "revisar este certificado, y un decreto de julio cerró la salida de cambiar la actividad "
        "del RUC para no presentarlo. Si eres constructor, vendes vehículos o tienes otra "
        "actividad de la lista de la UAFE y le vendes al Estado, esto te toca.",

        "El problema casi nunca es el certificado en sí, que se imprime en un par de clics. El "
        "problema es llegar a la firma del contrato sin código de registro: ahí empieza una "
        "cadena de trámites que no cabe en un día.",

        {"h2": "Los plazos que fija el reglamento"},
        f"Los define el artículo 60 del Reglamento General de la Ley de Contratación Pública, "
        f"según la {link(PGE_INFOGRAFIA, 'guía de la Procuraduría General del Estado')}:",
        {"tabla": [
            ["Tu contrato", "Cuándo presentas el certificado", "Si no lo presentas"],
            ["Plazo de ejecución de 30 días o más",
             "Dentro del término de 30 días desde la firma",
             "Causal de terminación unilateral y anticipada"],
            ["Plazo de ejecución menor a 30 días",
             "Al día siguiente de la firma",
             "Causal de terminación unilateral y anticipada"],
        ]},
        "Dos detalles que cambian cómo te organizas. El certificado no se evalúa en la oferta: "
        "se verifica solo durante la ejecución del contrato, así que nadie te lo va a pedir al "
        "postular y es fácil olvidarlo. Y la entidad publica tu certificado en el Portal de "
        "Contratación Pública, junto con el resto de documentos del proceso.",

        {"h2": "Quién tiene que presentarlo"},
        "No todos los contratistas del Estado. Solo quienes realizan una actividad sujeta a "
        "reporte a la UAFE. Para decidirlo, la entidad contratante revisa las actividades "
        "<strong>principales y secundarias</strong> de tu RUC; si alguna está en la lista, te "
        "notifica que debes obtener el código de registro y el certificado, e informa al "
        "SERCOP tu nombre, RUC y actividades.",
        "La ley de prevención de lavado de activos nombra expresamente a la "
        "<strong>construcción</strong>, que es la actividad más común entre contratistas de obra "
        "pública. La lista de la UAFE incluye además, entre otras, la comercialización de "
        "vehículos, los couriers, las inmobiliarias, la transferencia de fondos y los "
        "negociadores de joyas.",
        f"Si no sabes si tu actividad está en la lista, revisa primero "
        f"{link(P2, 'cómo saber si eres sujeto obligado')}: el certificado del RUC ya lo dice.",
        {"h3": "Cambiar la actividad del RUC ya no te libra"},
        "El Decreto Ejecutivo 461, publicado en el Registro Oficial el 30 de julio de 2026, "
        "agregó al mismo artículo 60 que el contratista debe presentar el certificado «incluso "
        "cuando haya modificado su actividad económica por una que no se encuentre sujeta a la "
        "obligación de reporte». Si la obligación nació con el contrato, se mantiene.",

        {"h2": "Cómo se saca el certificado, si ya tienes todo"},
        f"Es la parte corta. Según la {link(UAFE_CERTIFICADO, 'página oficial de la UAFE')}:",
        {"ol": [
            "El representante legal entra a SISLAFT con <strong>su</strong> usuario y "
            "contraseña. Si eres persona natural, entras con el tuyo.",
            "En el menú eliges <strong>Servicios</strong> y luego <strong>Certificado de "
            "Cumplimiento</strong>. Se abre una ventana con los datos que llevará.",
            "Tocas <strong>Imprimir</strong> y el certificado queda listo.",
        ]},
        "La UAFE lo emite si cumples tres condiciones: ser sujeto obligado, tener código de "
        "registro y estar al día con tus obligaciones ante la UAFE. La entidad, además, revisa "
        "que el documento no reporte incumplimientos; si los reporta, los toma en cuenta en la "
        "administración del contrato.",

        {"h2": "Si todavía no tienes código de registro: el orden que ahorra días"},
        "Aquí se va el tiempo. Sin código no hay certificado, y el código tiene sus propios "
        "requisitos. El orden que recomendamos:",
        {"ol": [
            f"<strong>Los correos, primero.</strong> El representante legal necesita dos (uno "
            f"corporativo y uno personal) y el oficial de cumplimiento, uno institucional de uso "
            f"exclusivo. Detalle en {link(P1, 'qué correo pide la UAFE')}.",
            f"<strong>La solicitud del código en SISLAFT.</strong> Con los datos de la empresa, "
            f"del representante legal, del oficial y los documentos en PDF. La lista completa "
            f"está en {link(P5, 'lo que tienes que tener listo para el código de registro')}. "
            f"El enlace de activación llega al correo del representante legal y la solicitud "
            f"se activa dentro de 48 horas.",
            f"<strong>El oficial de cumplimiento registrado.</strong> Con su título o "
            f"experiencia y el oficio de designación; ver "
            f"{link(P4, 'requisitos del oficial de cumplimiento')}.",
            "<strong>El certificado.</strong> Recién aquí, con los tres pasos de arriba.",
        ]},
        "Si tu contrato dura menos de 30 días, haz la cuenta: el certificado va al día "
        "siguiente de la firma. En la práctica tienes que tenerlo <strong>antes</strong> de "
        "firmar.",

        {"h2": "El tropiezo que más días cuesta: el formato del correo"},
        "En septiembre de 2026 acompañamos a una clienta cuya solicitud de código de registro "
        "fue <strong>negada</strong>. El motivo, textual de la notificación de la UAFE: los "
        "correos del sujeto obligado, del representante legal y del oficial «deben ser "
        "personalizados, no deben ser seudónimos o alias o departamentales o dominio de "
        "TERCEROS».",
        {"ul": [
            "<strong>Rechazados:</strong> cumplimiento@, gerencia@, info@, oficial@ y cualquier "
            "cuenta por cargo o área.",
            "<strong>Rechazados:</strong> correos con el dominio del contador, del abogado o del "
            "proveedor.",
            "<strong>Aceptado:</strong> nombre.apellido@tuempresa.com, con el dominio de tu "
            "propia empresa.",
        ]},
        "Una solicitud negada te devuelve al principio, y con un contrato firmado cada día "
        "cuenta.",
        {"quote": "El certificado se imprime en un minuto. Lo que no se resuelve en un minuto "
                  "es llegar a ese minuto sin código de registro, y casi siempre la primera "
                  "traba es un correo que la UAFE no acepta."},

        {"h2": "Cuándo esto no te aplica"},
        {"ul": [
            "Si ninguna de las actividades de tu RUC, principal ni secundaria, está sujeta a "
            "reporte: la entidad no debería pedírtelo.",
            "Si ya tienes código de registro y estás al día: solo te falta imprimirlo. No "
            "necesitas nada más de nosotros.",
            "Si tu duda es legal (si tu actividad califica, qué reportes debes) eso lo responde "
            "la UAFE o tu abogado. Nosotros no hacemos el trámite ni damos asesoría legal.",
        ]},

        {"h2": "Antes de firmar tu próximo contrato con el Estado"},
        {"ul": [
            f"Revisa si alguna actividad de tu RUC está en la lista ({link(P2, 'cómo saberlo')}).",
            "Si lo está, confirma que tienes código de registro y oficial registrado.",
            "Si no los tienes, empieza por los correos con nombre y apellido: es lo único que "
            "puedes resolver el mismo día.",
            "Si el contrato dura menos de 30 días, saca el certificado antes de firmar.",
            f"Si te suspendieron el RUC por lo mismo, el camino está en "
            f"{link(P3, 'qué hacer con el RUC suspendido')}.",
        ]},

        {"faq": [
            ("¿Me piden el certificado de cumplimiento al presentar la oferta?",
             "No. El reglamento dice que se verifica exclusivamente en la fase de ejecución del "
             "contrato. Te lo piden después de firmar, con el plazo de 30 días o de un día."),
            ("¿Qué pasa si no lo presento a tiempo?",
             "Omitirlo en el término de 30 días es causal de terminación unilateral y anticipada "
             "del contrato. La entidad tiene que seguir el procedimiento de terminación, pero la "
             "causal queda abierta."),
            ("Cambié la actividad de mi RUC, ¿igual tengo que presentarlo?",
             "Sí. Desde el Decreto Ejecutivo 461 de julio de 2026, el certificado se presenta "
             "incluso si cambiaste tu actividad por una que no está sujeta a reporte."),
            ("¿Quién puede descargar el certificado?",
             "El representante legal, con su usuario de SISLAFT. Si eres persona natural, tú "
             "con el tuyo. Por eso los correos del representante legal tienen que estar bien "
             "desde la solicitud del código."),
        ]},

        f"Si el correo es lo que te falta para pedir el código, mira el "
        f"{link(LANDING, 'paquete de correo institucional para la UAFE')}: dominio y hasta 10 "
        f"cuentas con el nombre de tu empresa por $81,98 + IVA al año, listas el mismo día si "
        f"ya tienes dominio. O {link(wa(WA_MSG), 'escríbenos por WhatsApp')} y te contesta una "
        f"persona.",
    ],
}

if __name__ == "__main__":
    ruta, pal = guarda(certificado)
    print(ruta, pal, "palabras")
