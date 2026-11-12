#!/usr/bin/env python3
"""Reescritura de «mejor marca china calidad precio» (post 9477) — recuperación nov-2026.

Se queda como página propia porque responde otra pregunta que el pilar 9472: no «qué marcas
hay» sino «cuál conviene». Antes recomendaba BYD, Geely y Great Wall (que CH no vende).
Ahora responde por uso, con los modelos y precios del catálogo de CH al 9-nov-2026.

Uso:  python3 mejor_marca_china.py --dry-run   |   python3 mejor_marca_china.py
"""
import json, os, re, sys, urllib.request
from pilar_electricos import p, h2, h3, quote, ul, ol, table, wa, H, BASE, AQUI, PRECIO_NOTA

POST_ID = 9477
def l(path, txt): return f'<a href="{BASE}{path}">{txt}</a>'
PILAR = l("/marcas-chinas-y-comparativas/marcas-de-autos-chinos-mas-confiables-en-ecuador/", "la guía de carros chinos en Ecuador")

CTA_MEDIO = ("<!-- cta-temprano-v1 -->\n" + p(
    "<strong>¿Ya sabe qué uso le va a dar?</strong> Cuéntenos su presupuesto y para qué lo necesita, y le "
    "respondemos con los dos modelos que mejor calzan y su precio final. "
    f'<a href="{wa("Hola, vengo del artículo de la mejor marca china calidad precio. Mi presupuesto es ___ y lo necesito para ___.")}">'
    "Escríbanos por WhatsApp</a>.") + "\n<!-- /cta-temprano-v1 -->")

blocks = [
    p("No hay una mejor marca china en general. Hay una mejor marca para cada uso, y la diferencia entre acertar y "
      "equivocarse suele estar en elegir por la marca cuando había que elegir por el modelo. Una marca puede tener "
      "el mejor SUV de su precio y una pickup mediocre, o al revés."),
    p("Por eso esta comparación va por uso y por presupuesto, con los modelos que vendemos y atendemos en Ibarra, "
      f"Cayambe y Tulcán. Si lo que busca es el panorama de todas las marcas, está en {PILAR}."),

    h2("La respuesta corta, según para qué lo quiere"),
    table(["Si busca…", "Marca que mejor responde", "Modelo para mirar primero", "Desde"], [
        ["El auto nuevo más barato posible", "Changan", "Changan V3", "$14.990"],
        ["Un sedán para ciudad", "Chery", "Arrizo 5 Pro Max", "$16.990"],
        ["Un SUV compacto con poco presupuesto", "BAIC / Chery", "BAIC X35 · Tiggo 2 Pro Max", "$16.990 · $18.490"],
        ["Un SUV familiar mediano", "Chery", "Tiggo 7 Pro Max", "$24.990"],
        ["Gastar menos en combustible", "Omoda | Jaecoo / Chery", "Jaecoo J5 SHS · Tiggo 7 Super Hybrid", "$21.990 · $30.990"],
        ["Un 100 % eléctrico", "Deepal / DongFeng", "Deepal S05 · Mage EV", "$29.990 · $22.990*"],
        ["Una pickup de trabajo", "DongFeng / Foton", "Rich 6 Pro · Tunland G7", "$22.990 · $24.990"],
        ["Una pickup que ahorre combustible", "Changan / DongFeng", "Hunter REEV · Z9 PHEV", "$37.990 · $39.990"],
    ], "* Precio «desde» del Mage, que incluye la versión híbrida. " + PRECIO_NOTA),

    h2("Cómo medir calidad precio sin quedarse en la etiqueta"),
    p("El precio de lista es solo la primera cifra. Para comparar en serio dos carros chinos, sume lo que va a pagar "
      "en los primeros cinco años:"),
    ol([
        "<strong>Precio final con matrícula</strong>, no el «desde»: la versión que de verdad va a comprar suele estar una o dos arriba.",
        "<strong>Mantenimientos de la garantía:</strong> pida el valor de cada uno hasta los 50.000 km. Varía bastante entre marcas.",
        "<strong>Consumo:</strong> un híbrido que cuesta $3.000 más puede devolverlos en combustible en tres o cuatro años si maneja mucho.",
        "<strong>Seguro:</strong> cotícelo antes de firmar; dos SUV del mismo precio pueden tener primas distintas.",
        "<strong>Valor de reventa:</strong> pregunte cuánto se paga hoy por uno de tres años del mismo modelo.",
    ]),
    p(f"Los costos de mantenimiento por marca los comparamos en {l('/consejos/costos-promedio-de-mantenimiento-por-marca/', 'costos de mantenimiento por marca')}."),

    h2("Marca por marca: dónde está cada una más fuerte"),
    h3("Chery: la más completa para familia"),
    p("Tiene la escalera más larga: sedán, tres tamaños de SUV y la línea Super Hybrid enchufable. Su punto fuerte "
      "es el SUV familiar; el Tiggo 7 Pro Max es el que más se compara contra los japoneses del mismo tamaño. "
      f"Revise {l('/consejos/garantia-chery-ecuador-cobertura/', 'cómo funciona la garantía Chery')} antes de decidir."),
    h3("DongFeng: pickups y electrificados"),
    p("Fuerte en pickups de trabajo (Rich 6 Pro y Rich 7) y con dos apuestas electrificadas que no tienen casi "
      "competencia en su precio: el Mage, que existe en eléctrico e híbrido, y la pickup Z9 PHEV. "
      f"Las dos versiones del Mage las comparamos en {l('/comparativas-y-decisiones-inteligentes/dongfeng-mage-ev-vs-mage-hybrid/', 'Mage EV vs Mage híbrido')}."),
    h3("Changan: lo más accesible y el rango extendido"),
    p("La puerta de entrada más baja del mercado con respaldo local y, al otro extremo, la tecnología de rango "
      "extendido en el CS55 R-EV y la Hunter REEV. Deepal es su línea eléctrica, para quien ya decidió dejar la gasolina."),
    h3("Omoda | Jaecoo: híbridos a precio de SUV a gasolina"),
    p("Llegó en 2026 con SUV híbridos que arrancan por debajo de los $23.000. Es la opción a mirar si quiere "
      "ahorrar combustible sin pagar el salto de precio de un enchufable. Al ser la más nueva, pregunte por "
      "repuestos de desgaste en stock antes de firmar."),
    h3("BAIC y Foton: nichos bien cubiertos"),
    p("BAIC compite en SUV compactos baratos (X35, U5 Plus, X55 II). Foton se concentra en pickups Tunland, de "
      "la G7 a la V9, para quien necesita capacidad de carga."),

    CTA_MEDIO,

    h2("Tres errores comunes al buscar calidad precio"),
    p("<strong>Comparar versiones distintas.</strong> El «desde» de una marca suele ser la versión manual más básica, y "
      "el de la otra puede ser automática. Antes de decir que una es más barata, compare la misma transmisión, el "
      "mismo número de airbags y el mismo tamaño de pantalla."),
    p("<strong>Ignorar la versión híbrida del mismo modelo.</strong> En varias marcas la diferencia entre la versión a "
      "gasolina y la híbrida es menor de lo que parece, y con el combustible al precio actual se paga sola en pocos años "
      "si usted maneja todos los días."),
    p("<strong>Elegir sin probar en subida.</strong> Un motor pequeño que se siente bien en plano puede quedarse corto "
      "subiendo de Ibarra a Cayambe con cinco personas. Pida la prueba de manejo en una ruta que se parezca a la suya."),

    quote("La pregunta que más ayuda no es qué marca es mejor, sino qué va a hacer con el auto los próximos cinco "
          "años. Con esa respuesta, la lista se reduce a dos o tres modelos.",
          "Equipo comercial — Comercial Hidrobo"),

    h2("Cuándo la marca más barata no es la de mejor calidad precio"),
    ul([
        "Cuando maneja más de 25.000 km al año: el consumo pesa más que la diferencia de precio.",
        "Cuando necesita llevar carga o subir a fincas: un SUV urbano barato se desgasta rápido fuera del asfalto.",
        "Cuando va a vender en dos o tres años: la reventa de un modelo poco conocido castiga más.",
    ]),

    h2("Preguntas frecuentes"),
    h3("¿Cuál es la marca china más confiable en Ecuador?"),
    p("La que tiene taller autorizado y repuestos cerca de usted. Las cuatro preguntas para comprobarlo están en "
      f"{PILAR}."),
    h3("¿Chery o Changan?"),
    p("Para SUV familiar, Chery tiene una gama más completa. Para el menor precio de entrada o una pickup de rango "
      "extendido, Changan."),
    h3("¿Conviene más un chino híbrido o uno a gasolina?"),
    p("Si maneja más de 1.000 km al mes, el híbrido suele recuperar la diferencia de precio en pocos años. Si maneja "
      f"poco, el de gasolina sale más barato. Lo detallamos en {l('/vehiculos-electricos-e-hibridos/ahorro-real-de-un-auto-hibrido-en-ecuador/', 'el ahorro real de un auto híbrido')}."),
    h3("¿Cuál es la mejor camioneta china?"),
    p("Para trabajo pesado, la Rich 6 Pro o la Tunland; para ahorrar combustible, la Hunter REEV o la Z9 PHEV. "
      f"La comparación directa está en {l('/comparativas-y-decisiones-inteligentes/dongfeng-z9-phev-vs-changan-hunter-reev/', 'Z9 PHEV vs Hunter REEV')}."),
    p("Si quiere que le armemos la comparación de dos modelos con precio final, escríbanos al 099 639 0233."),
]

def main():
    dry = "--dry-run" in sys.argv
    antes = json.load(open(os.path.join(AQUI, "antes", f"{POST_ID}-mejor-marca-china-calidad-precio-en-ecuador.json")))
    raw = antes["content"]["raw"]
    if "<!-- cta-ch-v1 -->" in raw:
        cta = raw[raw.index("<!-- cta-ch-v1 -->"):]
    else:
        ref = json.load(open(os.path.join(AQUI, "antes", "9405-autos-electricos-en-ecuador-2025.json")))["content"]["raw"]
        cta = ref[ref.index("<!-- cta-ch-v1 -->"):]
    contenido = "\n\n".join(blocks) + "\n\n" + cta
    texto = re.sub(r"<[^>]+>", " ", contenido)
    prohibidas = ["hoy en día", "en la actualidad", "cabe destacar", "es importante", "sin lugar a dudas", "en resumen",
                  "en conclusión", "no solo", "amplia gama", "la mejor opción", "descubre", " tú ", " tu ", "puedes",
                  "2025", "byd", "geely", "great wall", "jac "]
    fallos = [w for w in prohibidas if w in texto.lower()]
    titulo_seo = "Cuál es la mejor marca de auto chino en Ecuador 2026"
    meta = ("No hay una mejor en general: la que conviene según el uso, del SUV familiar a la pickup de trabajo, "
            "con modelos y precios desde $14.990 y cómo comparar.")
    print(f"palabras {len(texto.split())} | título SEO {len(titulo_seo)} | meta {len(meta)} | prohibidas {fallos}")
    if fallos or len(titulo_seo) > 60 or not 140 <= len(meta) <= 160:
        sys.exit("No pasa la validación.")
    body = {"title": "Mejor marca china calidad precio en Ecuador: cuál conviene según el uso",
            "content": contenido, "excerpt": meta,
            "meta": {"_yoast_wpseo_title": titulo_seo, "_yoast_wpseo_metadesc": meta,
                     "_yoast_wpseo_focuskw": "mejor marca china calidad precio"}}
    if dry:
        print("dry-run ok"); return
    req = urllib.request.Request(f"{BASE}/wp-json/wp/v2/posts/{POST_ID}", data=json.dumps(body).encode(), headers=H, method="POST")
    r = json.loads(urllib.request.urlopen(req, timeout=120).read())
    print("OK", r["id"], r["modified"], r["link"], r.get("meta", {}).get("_yoast_wpseo_title"))

if __name__ == "__main__":
    main()
