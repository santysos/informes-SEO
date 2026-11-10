#!/usr/bin/env python3
"""Reescritura del pilar de autos chinos (post 9472) — recuperación noviembre 2026.

«carros chinos en ecuador» pasó de 531 impresiones en posición 2,0 (marzo) a 28 en 8,4
(octubre). Cuatro posts de ~700-880 palabras competían por las mismas consultas (9472, 9609,
9477, 9491) y los cuatro recomendaban marcas que CH no vende (Great Wall, JAC, BYD, Geely).

Este queda como pilar: las 6 marcas chinas que vende CH, con precios del catálogo y un
criterio de confiabilidad verificable (taller, repuestos, garantía por escrito).
Precios: menú de catálogo de comercialhidrobo.com al 9-nov-2026 («Desde»).

Uso:  python3 pilar_chinos.py --dry-run   |   python3 pilar_chinos.py
"""
import json, os, re, sys, urllib.request
from pilar_electricos import p, h2, h3, quote, ul, ol, table, wa, H, BASE, AQUI, PRECIO_NOTA

POST_ID = 9472
def l(path, txt): return f'<a href="{BASE}{path}">{txt}</a>'

CTA_MEDIO = ("<!-- cta-temprano-v1 -->\n" + p(
    "<strong>¿Duda entre dos marcas?</strong> Tenemos las seis en piso en Ibarra, Cayambe y Tulcán, y puede "
    "manejarlas el mismo día. "
    f'<a href="{wa("Hola, vengo de la guía de carros chinos 2026. Quisiera comparar dos modelos y agendar una prueba de manejo.")}">'
    "Escríbanos por WhatsApp</a> con los dos modelos y le armamos la comparación con precio final.")
    + "\n<!-- /cta-temprano-v1 -->")

blocks = [
    p("En Ecuador se venden más de una docena de marcas de carros chinos y la diferencia entre ellas ya no está "
      "tanto en el auto como en lo que pasa después de comprarlo: quién se lo recibe en el taller, cuánto tarda "
      "un repuesto y qué dice la garantía por escrito. Una marca china confiable, en la práctica, es la que tiene "
      "esas tres cosas cerca de su casa."),
    p("Esta guía reúne las seis marcas chinas que vendemos y atendemos en el norte del país —Chery, DongFeng, "
      "Changan con su línea eléctrica Deepal, Omoda | Jaecoo, BAIC y Foton—, con los precios vigentes del catálogo y la forma de "
      "comprobar por su cuenta si una marca le va a responder."),

    h2("Marcas de carros chinos en Ecuador y sus precios en 2026"),
    table(["Marca", "Qué vende", "Precios desde", "Modelo de entrada"], [
        ["Chery", "Sedán, SUV y SUV híbridos enchufables", "$16.990 a $46.990", "Arrizo 5 Pro Max ($16.990)"],
        ["DongFeng", "SUV, pickups y electrificados", "$22.990 a $39.990", "Mage y Rich 6 Pro ($22.990)"],
        ["Changan", "Autos, SUV, pickups y comerciales", "$14.990 a $37.990", "Changan V3 ($14.990)"],
        ["Deepal", "SUV eléctricos y de rango extendido", "$29.990 a $46.990", "Deepal S05 ($29.990)"],
        ["Omoda | Jaecoo", "SUV híbridos", "$19.990 a $26.990", "Omoda E5 Next ($19.990)"],
        ["BAIC", "SUV compactos y medianos", "$16.990 a $21.990", "X35 y U5 Plus ($16.990)"],
        ["Foton", "Pickups Tunland", "$24.990 a $44.990", "Tunland G7 ($24.990)"],
    ], PRECIO_NOTA),
    p("El rango es amplio a propósito: entre un Changan V3 de $14.990 y un Chery Tiggo 9 Super Hybrid de $46.990 "
      "hay tres segmentos de distancia. Comparar «marca contra marca» sirve poco; conviene comparar el modelo que "
      "usted necesita dentro de cada una."),

    h2("Cómo saber si una marca china es confiable"),
    p("Las listas de «las más confiables» suelen ordenar marcas por fama. Para quien compra en Imbabura o Carchi, "
      "estas cuatro preguntas dicen bastante más:"),
    ol([
        "<strong>¿Hay taller autorizado a menos de una hora?</strong> Un auto en garantía tiene que ir a mantenimiento "
        "al taller de la marca. Si el más cercano está en Quito, cada servicio es un día perdido.",
        "<strong>¿Los repuestos de desgaste están en stock?</strong> Pregunte por pastillas, filtros y un faro del modelo "
        "exacto. Si la respuesta es «se pide», ya sabe cuánto va a esperar después de un choque leve.",
        "<strong>¿La garantía está por escrito, en años y kilómetros?</strong> Y qué pide para mantenerla vigente. "
        f"Lo explicamos en {l('/consejos/que-cubre-y-que-no-cubre-la-garantia-de-fabrica/', 'qué cubre y qué no cubre la garantía de fábrica')}.",
        "<strong>¿Cuántos años lleva la marca en el país con el mismo importador?</strong> Las marcas que cambian de "
        "representante dejan a los dueños anteriores sin a quién reclamar.",
    ]),

    h2("Las marcas, una por una"),
    h3("Chery: la gama más amplia"),
    p("Va desde el sedán Arrizo 5 Pro Max ($16.990) y el Tiggo 2 Pro Max ($18.490) hasta los SUV Tiggo 4 Pro "
      "($19.990) y Tiggo 7 Pro Max ($24.990). Arriba están los Super Hybrid enchufables: Tiggo 7 y Tiggo 8 desde "
      "$30.990 y Tiggo 9 desde $46.990. Revise {l('/consejos/garantia-chery-ecuador-cobertura/', 'las condiciones de la garantía Chery')} "
      f"y {l('/vehiculos-electricos-e-hibridos/chery-super-hybrid-csh-ecuador/', 'cómo funciona su sistema Super Hybrid')}."),
    h3("DongFeng: pickups y SUV de trabajo"),
    p("La Rich 6 Pro ($22.990) y la Rich 7 ($28.990) son pickups pensadas para carga y caminos de tercer orden; "
      "el Huge ($25.590) y el Mage ($22.990) cubren el lado familiar, y la Z9 ($39.990) es una pickup híbrida "
      f"enchufable. Si su duda es la marca en sí, la respondemos en {l('/dongfeng/dongfeng-es-confiable-ecuador/', '¿DongFeng es confiable?')} "
      f"y en {l('/dongfeng/garantia-dongfeng-comercial-hidrobo/', 'la garantía DongFeng')}."),
    h3("Changan y Deepal: de lo más económico a lo eléctrico"),
    p("Changan tiene la puerta de entrada más baja de la lista, el V3 desde $14.990, seguida del Alsvin Plus "
      "($16.990) y el CS15 ($17.990). En pickups está la Hunter ($27.990) y su versión de rango extendido, la "
      "Hunter REEV ($37.990). Deepal es su línea eléctrica: S05 desde $29.990, S07 desde $38.990 y G138 desde "
      f"$46.990. Comparamos los dos SUV en {l('/comparativas-y-decisiones-inteligentes/deepal-s05-vs-s07-ecuador/', 'Deepal S05 vs S07')}."),
    h3("Omoda | Jaecoo: la llegada de 2026"),
    p("Llegó a nuestras agencias en septiembre de 2026. Omoda E5 Next desde $19.990, Jaecoo J5 SHS desde "
      "$21.990, Omoda C5 SHS desde $22.990 y Jaecoo J7 SHS desde $26.990. Al ser la más nueva, es justamente "
      "donde más vale hacer las cuatro preguntas de arriba antes de firmar."),
    h3("BAIC: SUV compactos a buen precio"),
    p("X35 y U5 Plus desde $16.990 y X55 II desde $21.990. Una alternativa para quien busca un SUV pequeño "
      "nuevo con presupuesto de usado."),
    h3("Foton: la familia Tunland"),
    p("Cuatro pickups: Tunland G7 desde $24.990, V7 desde $29.490, G9 desde $31.990 y V9 desde $44.990. Para "
      "quien necesita una camioneta de trabajo y compara con las marcas japonesas tradicionales."),

    CTA_MEDIO,

    h2("Carro chino o japonés: dónde está la diferencia real"),
    p("En equipamiento por dólar, el carro chino gana casi siempre: por el precio de un SUV japonés de entrada se "
      "lleva uno chino con pantalla grande, cámara 360 y más asistentes de manejo. Donde el japonés sigue "
      "adelante es en la reventa y en el historial: hay más datos de cómo envejece un motor japonés a los 200.000 km."),
    p("Si piensa tener el auto ocho o diez años y llevarlo siempre a taller autorizado, esa ventaja del japonés pesa "
      "menos. Si lo va a vender en tres, pesa más. Lo medimos modelo contra modelo en "
      f"{l('/comparativas-y-decisiones-inteligentes/renault-duster-vs-chery-tiggo-4-pro/', 'Duster vs Tiggo 4 Pro')}, "
      f"{l('/comparativas-y-decisiones-inteligentes/toyota-rav4-hybrid-vs-chery-tiggo-8-csh/', 'RAV4 Hybrid vs Tiggo 8 CSH')} y "
      f"{l('/marcas-chinas-y-comparativas/comparativa-de-sedanes-marcas-chinas-vs-tradicionales/', 'sedanes chinos vs tradicionales')}."),

    quote("Antes de elegir la marca, elija el taller. Un carro chino bien mantenido en taller autorizado dura lo "
          "mismo que cualquier otro; el que se descuida en talleres sin repuestos originales es el que da la mala fama.",
          "Equipo de postventa — Comercial Hidrobo"),

    h2("Cuándo un carro chino NO le conviene"),
    ul([
        "Piensa venderlo en menos de tres años y el valor de reventa es lo que más le importa.",
        "Vive lejos de cualquier taller autorizado de la marca y no piensa viajar para los mantenimientos.",
        "Busca un modelo recién llegado al país sin historial local y no quiere ser de los primeros dueños.",
    ]),
    p("Fuera de esos casos, la decisión depende más del modelo que del país de origen. "
      f"Si le preocupa la mecánica, revise {l('/sin-categoria/motor-chery-acteco-rendimiento-durabilidad/', 'cómo rinde el motor Chery Acteco')}."),

    h2("Preguntas frecuentes"),
    h3("¿Qué marcas de carros chinos hay en Ecuador?"),
    p("Las más presentes son Chery, DongFeng, Changan, Deepal, Omoda | Jaecoo, BAIC, Foton, JAC, Great Wall, "
      "Geely y BYD, entre otras. En el norte del país, Comercial Hidrobo representa a las seis primeras con "
      "taller y repuestos en Ibarra, Cayambe y Tulcán."),
    h3("¿Cuál es el carro chino más barato en Ecuador?"),
    p("En nuestro catálogo, el Changan V3 desde $14.990. Le siguen el Chery Arrizo 5 Pro Max, el Changan Alsvin "
      "Plus y los BAIC X35 y U5 Plus, todos desde $16.990."),
    h3("¿Los carros chinos duran?"),
    p("Con mantenimiento a tiempo en taller autorizado, sí. La mala fama viene en buena parte de los primeros "
      "modelos que llegaron hace más de diez años y de autos sin respaldo de repuestos."),
    h3("¿Cuál es la mejor marca china calidad precio?"),
    p("Depende del uso: no es la misma respuesta para un SUV familiar que para una pickup de trabajo. La "
      f"desarrollamos en {l('/marcas-chinas-y-comparativas/mejor-marca-china-calidad-precio-en-ecuador/', 'cuál es la mejor marca china calidad precio')}."),
    p("Si quiere la comparación con precio final de dos modelos concretos, escríbanos al 099 639 0233 y se la "
      "enviamos el mismo día."),
]

def main():
    dry = "--dry-run" in sys.argv
    antes = json.load(open(os.path.join(AQUI, "antes", f"{POST_ID}-marcas-de-autos-chinos-mas-confiables-en-ecuador.json")))
    # 9472 no tenía el bloque CTA estándar: se toma del pilar de eléctricos (cta-ch-v1)
    ref = json.load(open(os.path.join(AQUI, "antes", "9405-autos-electricos-en-ecuador-2025.json")))["content"]["raw"]
    contenido = "\n\n".join(blocks) + "\n\n" + ref[ref.index("<!-- cta-ch-v1 -->"):]
    texto = re.sub(r"<[^>]+>", " ", contenido)
    prohibidas = ["hoy en día", "en la actualidad", "cabe destacar", "es importante", "sin lugar a dudas", "en resumen",
                  "en conclusión", "no solo", "amplia gama", "la mejor opción", "descubre", " tú ", " tu ", "puedes", "2025"]
    fallos = [w for w in prohibidas if w in texto.lower()]
    titulo_seo = "Carros chinos en Ecuador 2026: marcas confiables y precios"
    meta = ("Las marcas chinas que se venden en Ecuador, sus precios desde $14.990 y cuatro preguntas para saber "
            "si una marca le va a responder con taller y repuestos.")
    print(f"palabras {len(texto.split())} | título SEO {len(titulo_seo)} | meta {len(meta)} | prohibidas {fallos}")
    if fallos or len(titulo_seo) > 60 or not 140 <= len(meta) <= 160:
        sys.exit("No pasa la validación.")
    body = {"title": "Carros chinos en Ecuador 2026: marcas, precios y cuáles son confiables",
            "content": contenido, "excerpt": meta,
            "meta": {"_yoast_wpseo_title": titulo_seo, "_yoast_wpseo_metadesc": meta,
                     "_yoast_wpseo_focuskw": "carros chinos en ecuador"}}
    if dry:
        open(os.path.join(AQUI, f"{POST_ID}-preview.html"), "w").write(contenido); print("dry-run ok"); return
    req = urllib.request.Request(f"{BASE}/wp-json/wp/v2/posts/{POST_ID}", data=json.dumps(body).encode(), headers=H, method="POST")
    r = json.loads(urllib.request.urlopen(req, timeout=120).read())
    print("OK", r["id"], r["modified"], r["link"], r.get("meta", {}).get("_yoast_wpseo_title"))

if __name__ == "__main__":
    main()
