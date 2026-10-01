#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Consolida el post 1405 («Seguro para auto usado: qué cubre y cuánto cuesta») dentro del
1127 («Seguro vehicular en Ecuador»), que es el que tiene historial en Search Console.

Por qué: los dos apuntaban a la misma búsqueda. El 1127 tenía 3.399 impresiones en el año
(pos 13,7 para «seguro vehicular») y el 1405, publicado el 18-sep, cero. Se trasplantan las
secciones fuertes del 1405 (deducible, valor asegurado, qué sube y baja la prima, cómo
cotizar, presupuesto real) y se corrige lo que estaba mal en el 1127:

- Decía que el SOAT es el seguro obligatorio: desde 2016 es el SPPAT, que se paga con la
  matrícula.
- Tenía una tabla de primas distinta a la del 1405 y a la que usan los posts nuevos. Queda
  una sola, la de comun.py.
- Afirmaba un convenio con aseguradoras «del grupo Comercial Hidrobo» y un 15-25 % de
  ahorro: no están verificados. Se reemplazan por la recomendación de preguntar.
- Estaba en tú. OKCars va en usted.

Se conservan las tres imágenes y los botones del post original.

Uso:
  python3 consolidar.py            # genera nuevo-1127.html y muestra el conteo
  python3 consolidar.py --aplicar  # además actualiza el 1127 en el sitio
"""
import json
import os
import re
import sys
import time

AQUI = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, os.path.join(AQUI, "..", "octubre-2026-tanda2"))
sys.path.insert(0, os.path.join(AQUI, "..", "septiembre-2026"))

from gutenberg import h2, h3, link, ol, p, quote, tabla, ul  # noqa: E402
from comun import (CITA, CREDITO, CUOTA, LISTADO, SEGURO_ANTIGUO, SEGURO_DANOS,  # noqa: E402
                   SEGURO_REGLA, SEGURO_TABLA, SEGURO_VIAJES, wa)

WA_MSG = ("Hola, vengo del artículo sobre seguro vehicular y quiero saber cuánto "
          "costaría asegurar un auto de OKCars.")

# ── bloques originales que se conservan (imágenes y botones) ────────────────
IMG_CONTRATO = (
    '<!-- wp:image {"id":1245,"width":"700px","sizeSlug":"large","linkDestination":"none","align":"center"} -->\n'
    '<figure class="wp-block-image aligncenter size-large is-resized"><img src="https://okcars.ec/wp-content/uploads/2026/06/seguro_vehicular_contrato_Ecuador-1024x512.webp" alt="Contrato de seguro vehicular firmado para un vehículo en Ecuador." class="wp-image-1245" style="width:700px"/>'
    '<figcaption class="wp-element-caption">Antes de firmar, lea las exclusiones: pesan tanto como las coberturas.</figcaption></figure>\n'
    '<!-- /wp:image -->')


def media_texto(media_id, src, alt, interior):
    return (f'<!-- wp:media-text {{"mediaId":{media_id},"linkDestination":"none","mediaType":"image"}} -->\n'
            f'<div class="wp-block-media-text is-stacked-on-mobile"><figure class="wp-block-media-text__media">'
            f'<img src="{src}" alt="{alt}" class="wp-image-{media_id} size-full"/></figure>'
            f'<div class="wp-block-media-text__content">{interior}</div></div>\n'
            '<!-- /wp:media-text -->')


BOTONES = (
    '<!-- wp:buttons -->\n<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"vivid-red"} -->\n'
    f'<div class="wp-block-button"><a class="wp-block-button__link has-vivid-red-background-color has-background wp-element-button" href="{LISTADO}">Ver inventario de seminuevos</a></div>\n'
    '<!-- /wp:button -->\n\n<!-- wp:button {"backgroundColor":"vivid-green-cyan"} -->\n'
    f'<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{wa(WA_MSG)}">Hablar por WhatsApp</a></div>\n'
    '<!-- /wp:button --></div>\n<!-- /wp:buttons -->')

FAQ = [
    ("¿Qué seguro es obligatorio para un auto en Ecuador?",
     "El SPPAT, que se paga junto con la matrícula y cubre a las personas heridas en un "
     "accidente de tránsito. No cubre los daños del auto: para eso hace falta un seguro "
     "privado, que es voluntario salvo que el auto esté financiado."),
    ("¿Cuánto cuesta un seguro todo riesgo para un auto de $15.000?",
     "Como referencia, entre $550 y $800 al año, es decir, de $46 a $67 al mes. La cifra "
     "final depende de la aseguradora, del modelo, del uso que declare y de su historial "
     "como conductor."),
    ("¿Qué es el deducible?",
     "Es la parte del arreglo que usted paga cada vez que usa el seguro. Suele ser un "
     "porcentaje del siniestro con un mínimo fijo, por ejemplo 10 % con mínimo de $250. "
     "Un deducible alto abarata la prima, pero hay que tener ese dinero disponible."),
    ("¿Me conviene asegurar el auto por menos de lo que vale?",
     "No. Pagará menos de prima, pero si el auto se pierde le pagan el valor declarado, y en "
     "un choque parcial muchas pólizas le reconocen solo la proporción que aseguró."),
    ("¿El seguro cubre si otra persona maneja mi auto?",
     "Normalmente sí, si tiene licencia vigente y no está excluida en la póliza. Revíselo si "
     "en casa hay conductores jóvenes, porque algunas pólizas los restringen."),
    ("¿Puedo contratar el seguro al comprar el auto en OKCars?",
     "Pregunte a su asesor por las opciones de seguro disponibles al momento de la compra. "
     "Lo que sí recomendamos siempre es cotizarlo antes de cerrar, para que entre en el "
     "presupuesto desde el principio."),
]


def bloques():
    b = []
    b.append(p("El seguro es el gasto que más sorprende a quien compra un auto, después de "
               "la cuota. Y el que más se subestima, porque casi siempre se cotiza cuando el "
               "vehículo ya está pagado y el presupuesto ya no tiene margen."))
    b.append(p("Esta guía reúne lo que necesita para decidir: cuánto cuesta un seguro "
               "vehicular en Ecuador según el valor del auto, qué tipos de cobertura hay, qué "
               "cubre de verdad el todo riesgo y los errores que hacen que la aseguradora "
               "pague menos de lo esperado el día del choque. No vendemos seguros: le damos "
               "el mapa para comparar."))

    b.append(h2("Cuánto cuesta un seguro vehicular en Ecuador"))
    b.append(p("El seguro todo riesgo se calcula como un porcentaje del valor asegurado del "
               f"auto. Como regla para estimar, cuente con {SEGURO_REGLA}. Estos son los "
               "rangos habituales para un seminuevo:"))
    b.append(tabla(SEGURO_TABLA[0], SEGURO_TABLA[1:]))
    b.append(p("Son valores referenciales. La cifra final depende de la aseguradora, del "
               "modelo, de la edad del conductor, del uso que declare y de si tuvo "
               "siniestros recientes. Por eso conviene pedir al menos tres cotizaciones para "
               "el mismo auto antes de elegir."))

    b.append(h2("Los cuatro niveles de cobertura que existen"))
    b.append(p("No todos los seguros cubren lo mismo, y el nombre no siempre ayuda. De menor "
               "a mayor protección:"))
    b.append(ul([
        "<strong>SPPAT.</strong> Es el único obligatorio y se paga con la matrícula. Cubre "
        "a las personas heridas en un accidente de tránsito, no los daños del auto.",
        "<strong>Responsabilidad civil.</strong> Cubre lo que usted le haga a otros: su "
        "vehículo, sus bienes o sus personas. Su propio auto queda sin protección. Lo "
        f"explicamos en {link(SEGURO_DANOS, 'el seguro contra daños a terceros')}.",
        "<strong>Cobertura intermedia.</strong> Suma a la anterior el robo total o la "
        "pérdida total, pero no los choques con culpa suya.",
        "<strong>Todo riesgo o cobertura amplia.</strong> Cubre su auto en casi cualquier "
        "evento, haya culpa o no, además de los daños a terceros.",
    ]))

    b.append(h2("Qué cubre realmente el todo riesgo, y qué no"))
    b.append(p("El nombre suena absoluto, pero ninguna póliza cubre todo. La cobertura amplia "
               "típica incluye esto:"))
    b.append(media_texto(
        1246, "https://okcars.ec/wp-content/uploads/2026/06/seguro-vehicular-ecuador-1024x682.webp",
        "Automóvil protegido por un seguro vehicular circulando en una ciudad de Ecuador.",
        ul([
            "<strong>Daños a su vehículo</strong> por choque, volcamiento o incendio, con "
            "culpa o sin ella",
            "<strong>Robo total</strong> y, en algunas pólizas, robo de partes",
            "<strong>Pérdida total</strong>, cuando el arreglo supera el valor del auto",
            "<strong>Daños a terceros</strong> hasta el límite contratado",
            "<strong>Eventos de la naturaleza</strong>, como inundación, granizo o caída "
            "de árboles",
            "<strong>Asistencia en carretera</strong>: grúa, auxilio mecánico, cambio de "
            "llanta",
            "<strong>Defensa legal</strong> en el proceso que siga a un accidente",
        ])))
    b.append(p("Lo que casi nunca cubre: el desgaste normal, las fallas mecánicas por falta "
               "de mantenimiento, manejar sin licencia vigente o bajo efectos del alcohol, y "
               "usar el auto para algo distinto de lo declarado."))
    b.append(p("Ese último punto es el que más reclamos rechazados genera. Si compró el auto "
               "para uso familiar y después empieza a trabajar con aplicaciones o a hacer "
               "reparto, infórmelo y ajuste la póliza. Si no lo hace, la aseguradora tiene "
               "un argumento sólido para no pagar."))
    b.append(IMG_CONTRATO)

    b.append(h2("El deducible: lo que usted paga cada vez que usa el seguro"))
    b.append(p("El deducible es la parte del arreglo que sale de su bolsillo. Suele "
               "expresarse como un porcentaje del siniestro con un mínimo fijo, por ejemplo "
               "«10 % con mínimo de $250». Pesa más de lo que parece: una prima barata con "
               "deducible alto puede salir peor que una prima cara con deducible bajo si "
               "tiene un par de golpes en el año."))
    b.append(tabla(["", "Póliza A", "Póliza B"], [
        ["Prima anual", "$620", "$780"],
        ["Deducible mínimo", "$400", "$180"],
        ["Costo con un siniestro de $900", "$1.020", "$960"],
        ["Costo sin siniestros", "$620", "$780"],
    ]))
    b.append(p("También explica por qué mucha gente no reporta un rayón: si el arreglo cuesta "
               "menos que el deducible, usar el seguro no tiene sentido."))

    b.append(h2("El valor asegurado decide cuánto le pagan"))
    b.append(p("Es el número sobre el que se calcula todo. Debería coincidir con el valor "
               "comercial del auto, no con lo que pagó por él. Si asegura un auto de $18.000 "
               "declarando $22.000, paga prima de más y la aseguradora igual le indemniza por "
               "el valor real."))
    b.append(p("El error contrario es peor. Declarar $14.000 por un auto que vale $18.000 "
               "abarata la prima, pero si se lo roban recibe $14.000 y pierde cuatro mil "
               "dólares. Y en choques parciales muchas pólizas aplican la regla proporcional: "
               "si aseguró el 78 % del valor, le pagan el 78 % del arreglo."))
    b.append(p("Un detalle que sorprende: la mayoría de pólizas bajan el valor asegurado en "
               "cada renovación, siguiendo la depreciación. Revise la cifra cada año en lugar "
               "de renovar en automático."))

    b.append(h2("Qué sube y qué baja la prima"))
    b.append(h3("La sube"))
    b.append(ul([
        "Modelos con alto índice de robo en el país",
        "Repuestos caros o de importación difícil",
        "Conductor joven o con siniestros recientes",
        "Uso comercial declarado",
    ]))
    b.append(h3("La baja"))
    b.append(ul([
        "Años sin siniestros, que casi todas las aseguradoras premian",
        "Dispositivo de rastreo satelital instalado",
        "Garaje cerrado declarado como lugar donde pasa la noche",
        "Pago anual en lugar de mensual",
        "Un deducible más alto, si tiene con qué cubrirlo",
    ]))
    b.append(p("Si el auto ya tiene varios años, los límites cambian: lo explicamos en "
               f"{link(SEGURO_ANTIGUO, 'asegurar un auto usado antiguo')}."))

    b.append(h2("Cobertura amplia o intermedia: cuándo conviene cada una"))
    b.append(tabla(["Situación", "Lo razonable"], [
        ["Auto financiado", "Amplia: la entidad casi siempre la exige mientras dure la deuda"],
        ["Auto de más de $12.000", "Amplia: un robo o pérdida total no se absorbe con ahorros"],
        ["Uso diario en carretera o para trabajar", "Amplia"],
        ["Auto de menos de $8.000, pagado", "Intermedia o responsabilidad civil"],
        ["Poco uso y garaje cerrado", "Intermedia, revisando bien el límite de terceros"],
    ]))
    b.append(p("Quien viaja seguido entre provincias tiene además un punto propio que "
               f"revisar, que desarrollamos en {link(SEGURO_VIAJES, 'seguro y viajes interprovinciales')}."))

    b.append(h2("Si el auto está financiado"))
    b.append(p("Casi todos los bancos exigen cobertura amplia mientras dure el crédito, porque "
               "el auto es la garantía. En el crédito directo de concesionario suele pasar lo "
               f"mismo; lo detallamos en {link(CREDITO, 'crédito directo para auto usado')}."))
    b.append(p("Antes de elegir aseguradora, pregunte si la entidad que le financia tiene "
               "convenios. A veces el seguro por convenio sale más barato y a veces no: "
               "compárelo con las otras cotizaciones antes de aceptarlo."))

    b.append(h2("Cómo cotizar sin perder tiempo"))
    b.append(p("Pedir cotizaciones es rápido si manda los mismos datos a todas las "
               "aseguradoras:"))
    b.append(ol([
        "Marca, modelo, año y versión exacta del vehículo.",
        "Valor comercial estimado y si tiene crédito vigente.",
        "Ciudad donde circula y dónde pasa la noche el auto.",
        "Edad del conductor principal y siniestros de los últimos tres años.",
        "Uso: particular, trabajo o transporte de terceros.",
    ]))
    b.append(p("Al comparar, mire siempre tres cosas: prima anual, deducible mínimo y qué "
               "asistencia incluye. Una cotización que solo da el precio no sirve para "
               "comparar."))
    b.append(p("Si vive en Imbabura o Carchi, pregunte expresamente por el radio de acción de "
               "la grúa. En la vía a Tulcán o en caminos de montaña, una asistencia limitada "
               "a la ciudad se vuelve inútil justo cuando más la necesita."))

    b.append(quote("El error más común es cotizar el seguro después de comprar. Cuando la "
                   "póliza aparece después de firmar y le suma $70 al mes, el presupuesto que "
                   "el cliente había armado ya no le cuadra.", CITA))

    b.append(h2("El seguro dentro del costo real de tener el auto"))
    b.append(p("Tener un auto cuesta más que la cuota. Para un seminuevo de $20.000 usado a "
               "diario entre Ibarra y Otavalo, el gasto mensual realista se ve así:"))
    b.append(tabla(["Rubro", "Aproximado al mes"], [
        ["Seguro todo riesgo", "$60 – $85"],
        ["Combustible (uso diario)", "$90 – $150"],
        ["Mantenimiento prorrateado", "$40 – $60"],
        ["Matrícula prorrateada", "$25 – $45"],
        ["Total sin contar la cuota", "$215 – $340"],
    ]))
    b.append(p("Ese total hay que sumarlo a la cuota antes de decidir. El otro lado del "
               f"cálculo está en {link(CUOTA, 'cómo se calcula la cuota mensual de un auto usado')}. "
               f"En el {link(LISTADO, 'listado del patio')} hay autos de precios muy distintos, "
               "y la diferencia de seguro entre los extremos puede rondar los $100 al mes."))

    b.append(h2("Antes de firmar una póliza, revise esto"))
    b.append(ul([
        "<strong>Las exclusiones</strong>, con la misma atención que las coberturas.",
        "<strong>Que el valor asegurado sea el comercial</strong>, ni más ni menos.",
        "<strong>El uso declarado</strong>, sobre todo si va a trabajar con el auto.",
        "<strong>El deducible</strong>, y si tiene ese dinero disponible.",
        "<strong>La fecha de renovación</strong>: un solo día sin cobertura basta para "
        "quedar expuesto.",
    ]))

    b.append(media_texto(
        939, "https://okcars.ec/wp-content/uploads/2026/01/WhatsApp-Image-2026-01-09-at-10.32.42-AM-1024x768.jpeg",
        "Interior de un vehículo limpio y bien cuidado en Ecuador.",
        p("En <strong>OKCars</strong>, en Ibarra, cada vehículo llega revisado y con los "
          "documentos al día, con el respaldo de Comercial Hidrobo. Si quiere armar el "
          "presupuesto completo de un auto, con cuota y seguro en la misma cuenta:")))
    b.append(BOTONES)

    b.append(h2("Preguntas frecuentes"))
    for q, a in FAQ:
        b.append(h3(q))
        b.append(p(a))
    schema = {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [
        {"@type": "Question", "name": q, "acceptedAnswer": {"@type": "Answer", "text": a}}
        for q, a in FAQ]}
    b.append("<!-- wp:html -->\n<script type=\"application/ld+json\">\n"
             + json.dumps(schema, ensure_ascii=False, indent=2) + "\n</script>\n<!-- /wp:html -->")
    return "\n\n".join(b)


EXCERPT = ("Cuánto cuesta un seguro vehicular en Ecuador según el valor del auto, qué cubre de "
           "verdad el todo riesgo, cómo funciona el deducible y los errores que hacen que la "
           "aseguradora pague menos.")
TITULO = "Seguro vehicular en Ecuador: cuánto cuesta y qué cubre"


def main():
    html = bloques()
    open(os.path.join(AQUI, "nuevo-1127.html"), "w").write(html)
    texto = re.sub(r"<script.*?</script>", " ", html, flags=re.S)
    texto = re.sub(r"<[^>]+>", " ", re.sub(r"<!--.*?-->", " ", texto, flags=re.S))
    print(f"{len(texto.split())} palabras")

    sys.path.insert(0, os.path.join(AQUI, "..", "octubre-2026-tanda2"))
    import publish_batch as pb
    low = texto.lower() + " " + EXCERPT.lower()
    for patron, nombre in ((pb.TUTEO, "tuteo"), (pb.VOSEO, "voseo")):
        hits = sorted(set(patron.findall(low)))
        print(f"{nombre}: {hits or 'ninguno'}")
    prohibidas = [f for f in pb.BLACKLIST if pb.word_re(f).search(low)]
    print(f"lista negra: {prohibidas or 'ninguna'}")

    if "--aplicar" not in sys.argv:
        return
    import requests
    env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env"))
               if "=" in l and not l.startswith("#"))
    base = env["OKCARS_WP_BASE"].rstrip("/")
    auth = (env["OKCARS_WP_USER"], env["OKCARS_WP_APP_PASS"])
    r = requests.post(f"{base}/posts/1127", auth=auth, headers={"User-Agent": pb.UA},
                      timeout=120, json={"title": TITULO, "content": html, "excerpt": EXCERPT})
    print("1127 ->", r.status_code, r.json().get("modified"))
    time.sleep(12)


if __name__ == "__main__":
    main()
