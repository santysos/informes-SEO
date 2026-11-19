#!/usr/bin/env python3
"""Reescritura del pilar de eléctricos (post 9405) — recuperación noviembre 2026.

La página #1 del sitio cayó de posición 4,1 a 10,1 (448 → 152 clics/mes, mar → oct).
Tenía 672 palabras, decía «2025» en todo el texto y precios desactualizados o
contradictorios (Kwid a $14.890 en un párrafo y «desde $22.000» en otro).

Se conserva la URL (historial) y el bloque CTA final (cta-ch-v1).
Precios: menú de catálogo de comercialhidrobo.com al 9-nov-2026 («Desde»).
Autonomías y baterías: posts propios del cluster (11805, 11816, 11818, 11803).

Uso:  python3 pilar_electricos.py --dry-run   |   python3 pilar_electricos.py
"""
import base64, json, os, re, sys, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "../../.env")) if "=" in l and not l.startswith("#"))
AUTH = base64.b64encode(f"{env['CH_WP_USER']}:{env['CH_WP_APP_PASS']}".encode()).decode()
H = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120.0 Safari/537.36",
     "Content-Type": "application/json"}
BASE = "https://www.comercialhidrobo.com"
POST_ID = 9405
C = BASE + "/vehiculos-electricos-e-hibridos/"

def p(t): return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"
def h2(t): return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'
def h3(t): return f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{t}</h3>\n<!-- /wp:heading -->'
def quote(t, cite): return (f'<!-- wp:quote -->\n<blockquote class="wp-block-quote"><!-- wp:paragraph -->\n<p>{t}</p>\n'
                            f'<!-- /wp:paragraph --><cite>{cite}</cite></blockquote>\n<!-- /wp:quote -->')
def ul(items): return "<!-- wp:list -->\n<ul class=\"wp-block-list\">" + "".join(
    f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->" for i in items) + "</ul>\n<!-- /wp:list -->"
def ol(items): return "<!-- wp:list {\"ordered\":true} -->\n<ol class=\"wp-block-list\">" + "".join(
    f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->" for i in items) + "</ol>\n<!-- /wp:list -->"
def table(head, rows, cap=""):
    th = "".join(f"<th>{x}</th>" for x in head)
    tb = "".join("<tr>" + "".join(f"<td>{x}</td>" for x in r) + "</tr>" for r in rows)
    fc = f'<figcaption class="wp-element-caption">{cap}</figcaption>' if cap else ""
    return (f'<!-- wp:table -->\n<figure class="wp-block-table"><table><thead><tr>{th}</tr></thead>'
            f"<tbody>{tb}</tbody></table>{fc}</figure>\n<!-- /wp:table -->")
def a(slug, txt): return f'<a href="{C}{slug}/">{txt}</a>'
def wa(msg): return "https://wa.me/593996390233?text=" + urllib.request.quote(msg)

CTA_MEDIO = ("<!-- cta-temprano-v1 -->\n" + p(
    "<strong>¿Quiere manejar uno antes de decidir?</strong> En Ibarra puede probar un eléctrico puro, "
    "un enchufable y un rango extendido la misma mañana. "
    f'<a href="{wa("Hola, vengo de la guía de autos eléctricos 2026. Quisiera agendar una prueba de manejo de un eléctrico o híbrido.")}">'
    "Agende la prueba por WhatsApp</a> o revise "
    f'{a("autos-hibridos-y-electricos-en-ibarra-2025", "qué modelos hay en piso")}.') + "\n<!-- /cta-temprano-v1 -->")

PRECIO_NOTA = ("Precios «desde» del catálogo de Comercial Hidrobo al 9 de noviembre de 2026. Referenciales, "
               "sujetos a cambio sin previo aviso; confirme la versión y el valor final con un asesor.")

blocks = [
    p("En noviembre de 2026, un auto 100 % eléctrico con concesionario, garantía y taller en el norte del "
      "Ecuador arranca alrededor de los $23.000 y llega hasta los 620 km de autonomía declarada. Por debajo de "
      "esa cifra hay importaciones directas y microcarros sin representación local: se pueden comprar, pero "
      "nadie se los recibe en un taller autorizado cuando fallan."),
    p("Esta guía separa lo que de verdad es eléctrico de lo que solo se vende como tal, pone los precios "
      "vigentes del catálogo y le dice qué tipo de electrificado conviene según dónde vive y cuánto maneja. "
      "Todo lo que aparece aquí está disponible en nuestras agencias de Ibarra, Cayambe y Tulcán."),

    h2("Cuánto cuesta un carro eléctrico en Ecuador en 2026"),
    p("La respuesta corta, ordenada de menor a mayor precio entre los 100 % eléctricos con respaldo local:"),
    table(["Modelo", "Tipo", "Precio desde", "Batería", "Autonomía declarada"], [
        ["DongFeng Mage EV", "100 % eléctrico", "$22.990*", "LFP 50,82 kWh", "445 km (CLTC)"],
        ["Deepal S05", "Eléctrico o rango extendido", "$29.990", "LFP 56,12 kWh", "510 km (NEDC)"],
        ["Deepal S07", "Eléctrico o rango extendido", "$38.990", "NCM 79,97 kWh", "620 km (CLTC)"],
        ["Renault Kwid E-Tech", "100 % eléctrico, urbano", "consultar", "—", "uso urbano"],
    ], "* El Mage se vende en versión eléctrica e híbrida; el «desde» del catálogo corresponde a la de menor "
       "precio. " + PRECIO_NOTA),
    p("Dos cosas que la tabla no dice. La autonomía de catálogo es de laboratorio: en uso real cuente entre un "
      "20 % y un 30 % menos, y algo más si sube a la sierra con el auto cargado. Y al precio del auto hay que "
      f"sumarle el punto de carga en casa, que explicamos en {a('como-instalar-punto-de-carga-para-auto-electrico-en-casa', 'cómo instalar un cargador de pared')}."),

    h2("Eléctrico, enchufable, rango extendido o híbrido: no es lo mismo"),
    p("Buena parte de la confusión al buscar «carros eléctricos» viene de que en la misma vitrina conviven "
      "cuatro tecnologías distintas. Todas reducen el consumo, pero solo una prescinde por completo de la gasolina."),
    table(["Tecnología", "Cómo funciona", "¿Se enchufa?", "Ejemplos en nuestro catálogo"], [
        ["Eléctrico (EV)", "Solo batería y motor eléctrico", "Sí, siempre", "Mage EV, Deepal S05 y S07, Kwid E-Tech"],
        ["Híbrido enchufable (PHEV)", "Batería grande para el día a día y motor a gasolina para viajes", "Sí, pero puede andar sin cargar",
         "DongFeng Z9, Chery Tiggo 7, 8 y 9 Super Hybrid"],
        ["Rango extendido (REEV)", "Siempre mueve las ruedas el motor eléctrico; la gasolina solo genera energía", "Sí, opcional",
         "Changan CS55 R-EV, Hunter REEV"],
        ["Híbrido (HEV)", "Se recarga solo al frenar y con el motor", "No", "Mage híbrido, Corolla híbrido, Nissan X-Trail e-Power"],
    ]),
    p(f"Si quiere el detalle técnico de cada sigla, lo tiene en {a('diferencia-phev-hev-reev-ev-ecuador', 'la diferencia entre PHEV, HEV, REEV y EV')}."),

    h2("Los eléctricos puros, uno por uno"),
    h3("DongFeng Mage EV: la puerta de entrada"),
    p("161 HP, batería de litio-ferrofosfato de 50,82 kWh y 445 km declarados. La carga rápida lo lleva del 30 % "
      "al 80 % en unos 28 minutos y la batería tiene garantía de 8 años o 150.000 km. Es el eléctrico más "
      "accesible con taller propio en el norte, y lo analizamos a fondo en "
      f"{a('auto-electrico-mas-barato-ecuador-2026', 'el auto eléctrico más barato de Ecuador')}."),
    p("Un dato que pesa: el mismo Mage existe en versión híbrida, sin enchufe, por un precio muy parecido. Si "
      "usted no tiene dónde cargar en casa, esa es la versión que le conviene."),
    h3("Deepal S05: el equilibrio"),
    p("234 HP, batería de 56,12 kWh y 510 km declarados. Trae función V2L, que convierte el auto en un "
      "tomacorriente de 220 V para alimentar equipos afuera: suena a capricho hasta el primer apagón. Existe "
      "también en versión de rango extendido para quien hace carretera seguido."),
    h3("Deepal S07: la mayor autonomía del catálogo"),
    p("Batería NCM de 79,97 kWh y 620 km declarados. Cargarla completa en casa toma unas once horas, así que "
      "pide un cargador de pared y no un tomacorriente común. Es la opción para quien quiere un SUV mediano "
      f"eléctrico y hace Ibarra-Quito con frecuencia. Más sobre la marca en {a('deepal-ecuador-marca-modelos', 'Deepal en Ecuador')}."),
    h3("Renault Kwid E-Tech: el urbano"),
    p("Es el más pequeño y el que mejor responde a quien busca un carro eléctrico para la ciudad y trayectos "
      "cortos. El precio se mueve con las promociones de Renault, por eso conviene confirmarlo con un asesor "
      "antes de hacer cuentas."),

    CTA_MEDIO,

    h2("Si no puede cargar en casa, mire los enchufables y los de rango extendido"),
    p("La mayoría de quienes llegan preguntando por un eléctrico puro termina llevándose otra cosa. La razón casi "
      "siempre es la misma: viven en departamento, parquean en la calle o hacen viajes largos cada semana."),
    table(["Modelo", "Tipo", "Precio desde", "Kilómetros en modo eléctrico"], [
        ["Changan CS55 R-EV", "Rango extendido", "$25.240", "98 km reales"],
        ["Chery Tiggo 7 Super Hybrid", "Híbrido enchufable", "$30.990", "consultar"],
        ["Chery Tiggo 8 Super Hybrid", "Híbrido enchufable", "$30.990", "120 km"],
        ["Changan Hunter REEV (pickup)", "Rango extendido", "$37.990", "consultar"],
        ["DongFeng Z9 PHEV (pickup)", "Híbrido enchufable", "$39.990", "135 km"],
        ["Chery Tiggo 9 Super Hybrid", "Híbrido enchufable", "$46.990", "consultar"],
    ], PRECIO_NOTA),
    p("Con 100 a 135 km eléctricos, un enchufable cubre la semana de trabajo de casi cualquier persona en Ibarra "
      "sin gastar gasolina, y el fin de semana sale a la Panamericana sin mirar el porcentaje de batería. "
      f"Comparamos los mejores en {a('mejor-hibrido-enchufable-ecuador', 'el mejor híbrido enchufable de Ecuador')} "
      f"y explicamos el sistema de Changan en {a('que-es-reev-changan-hunter-cs55-ecuador', 'qué es un REEV')}."),

    h2("Lo que cuesta tener un eléctrico, más allá del precio"),
    ul([
        "<strong>Electricidad:</strong> cargar en casa cuesta una fracción de lo que se paga en gasolina por los mismos "
        f"kilómetros. Hicimos el cálculo con la tarifa residencial en {a('cuanto-cuesta-cargar-auto-electrico-casa-ecuador', 'cuánto cuesta cargar un auto eléctrico en casa')}.",
        "<strong>Mantenimiento:</strong> sin aceite de motor, filtros de combustible, bujías ni embrague. Queda filtro de "
        "cabina, líquido de frenos, refrigerante de la batería, llantas y alineación. Las pastillas duran más por el frenado regenerativo.",
        "<strong>Batería:</strong> la garantía va en años y en kilómetros a la vez, y vence la que llegue primero. "
        f"Los detalles por marca están en {a('bateria-auto-hibrido-duracion-costo-garantia-ecuador', 'cuánto dura la batería y qué cubre la garantía')}.",
        "<strong>Reventa:</strong> el mercado de eléctricos usados en Ecuador todavía es pequeño. Nadie puede asegurar cuánto "
        "valdrá un eléctrico en cinco años; un híbrido de marca japonesa tiene ese camino más recorrido.",
    ]),
    p(f"Y un beneficio que se nota desde el primer día en Quito: los eléctricos e híbridos tienen tratamiento especial "
      f"en la restricción vehicular, como explicamos en {a('pico-y-placa-hibridos-electricos-ecuador', 'pico y placa para híbridos y eléctricos')}."),

    h2("Eléctrico, enchufable o híbrido según dónde vive"),
    p("La misma tecnología rinde distinto en Quito que en Ibarra o en la Costa. El tipo de trayecto pesa tanto como el precio."),
    ul([
        "<strong>Quito:</strong> tráfico de para y arranca, donde el eléctrico y el híbrido rinden mejor que en carretera, "
        "y la restricción vehicular pesa en el día a día. Un eléctrico con cargador en casa es la opción más cómoda si "
        "rara vez sale de la ciudad.",
        "<strong>Ibarra, Otavalo, Cayambe y los valles:</strong> recorridos diarios cortos y parqueadero propio en la mayoría "
        "de casas. Es el escenario ideal para un eléctrico puro o para un enchufable que casi nunca usa gasolina.",
        "<strong>Si viaja seguido a Quito, Tulcán o la Costa:</strong> las bajadas recuperan energía con el frenado "
        "regenerativo, pero las subidas largas la consumen rápido. Ahí un enchufable o un rango extendido evita depender "
        "de los pocos cargadores públicos de la ruta.",
        "<strong>Zonas rurales o caminos de tierra:</strong> antes que la tecnología, mire el despeje y el taller más cercano. "
        "Una pickup híbrida enchufable como la Z9 resuelve las dos cosas.",
    ]),

    quote("De los que vienen preguntando por el eléctrico más barato, la mayoría termina en un enchufable. "
          "El eléctrico puro se lo lleva el que tiene segundo auto o el que casi no sale de la ciudad.",
          "Asesor comercial — Comercial Hidrobo"),

    h2("Cuándo un eléctrico puro NO le conviene"),
    ul([
        "No tiene un parqueadero propio donde instalar un cargador de 220 V.",
        "Hace más de 300 km seguidos varias veces al mes, sobre todo hacia la Costa o el Oriente.",
        "Es su único auto y la familia viaja cargada los fines de semana.",
        "Piensa venderlo en dos o tres años y le importa sobre todo el valor de reventa.",
    ]),
    p("Si se reconoce en dos o más de esos puntos, un híbrido enchufable o un rango extendido le da casi todo el "
      f"ahorro sin la ansiedad de autonomía. La comparación completa está en {a('electrico-o-hibrido-cual-conviene-ecuador', 'eléctrico o híbrido: cuál conviene')}."),

    h2("Cómo elegir en cuatro pasos"),
    ol([
        "Revise dónde va a cargar. Sin cargador en casa, descarte el eléctrico puro.",
        "Sume los kilómetros de una semana normal. Si pasan de 150 diarios con frecuencia, mire enchufables o rango extendido.",
        "Pida la garantía de batería por escrito, en años y kilómetros.",
        "Maneje al menos dos tecnologías distintas antes de firmar. La diferencia se siente en la primera subida.",
    ]),

    h2("Preguntas frecuentes"),
    h3("¿Cuál es el carro eléctrico más barato de Ecuador?"),
    p("Entre los que se venden con concesionario, garantía y taller en el norte del país, el DongFeng Mage EV. "
      "Hay opciones más baratas por importación directa, pero sin respaldo local de repuestos ni servicio."),
    h3("¿Cuántos kilómetros recorre realmente un auto eléctrico?"),
    p("Entre un 20 % y un 30 % menos que lo que dice el catálogo. Un Mage EV con 445 km declarados anda en la "
      "práctica entre 310 y 350 km, y menos en subida, con el auto lleno o con el aire acondicionado al máximo."),
    h3("¿Hay dónde cargar un auto eléctrico en Ecuador?"),
    p("Sí, en Quito, Guayaquil, Cuenca y en algunas estaciones sobre las vías principales, pero la red pública "
      "todavía es corta. En la práctica, casi toda la carga se hace en casa durante la noche."),
    h3("¿Los autos eléctricos pagan menos impuestos en Ecuador?"),
    p("Tienen beneficios arancelarios y tributarios que cambian con la normativa de cada año. Los vigentes los "
      f"resumimos en {a('incentivos-por-comprar-autos-electricos-en-ecuador', 'incentivos por comprar autos eléctricos')}."),
    p("Si quiere saber cuál le conviene a usted, escríbanos al 099 639 0233 con cuántos kilómetros hace al mes y "
      "dónde parquea. Le respondemos con los modelos que encajan y los que conviene descartar."),
]

def main():
    dry = "--dry-run" in sys.argv
    antes = json.load(open(os.path.join(AQUI, "antes", f"{POST_ID}-autos-electricos-en-ecuador-2025.json")))
    raw = antes["content"]["raw"]
    cta = raw[raw.index("<!-- cta-ch-v1 -->"):]
    contenido = "\n\n".join(blocks) + "\n\n" + cta
    texto = re.sub(r"<[^>]+>", " ", contenido)
    palabras = len(texto.split())
    prohibidas = ["hoy en día", "en la actualidad", "cabe destacar", "es importante", "sin lugar a dudas", "en resumen",
                  "en conclusión", "no solo", "amplia gama", "amplia oferta", "la mejor opción", "vehículo de tus sueños",
                  "descubre", " tú ", " tu ", "puedes", "2025"]
    fallos = [w for w in prohibidas if w in texto.lower()]
    titulo_seo = "Carros eléctricos en Ecuador 2026: precios y modelos"
    meta = ("Desde $22.990 con taller en el norte: modelos 100 % eléctricos, enchufables y de rango extendido, "
            "con autonomía real y cuál le conviene según dónde carga.")
    print(f"palabras {palabras} | título SEO {len(titulo_seo)} | meta {len(meta)} | prohibidas {fallos}")
    if fallos or len(titulo_seo) > 60 or not 140 <= len(meta) <= 160:
        sys.exit("No pasa la validación.")
    body = {"title": "Autos eléctricos en Ecuador 2026: precios, modelos y autonomía real",
            "content": contenido, "excerpt": meta,
            "meta": {"_yoast_wpseo_title": titulo_seo, "_yoast_wpseo_metadesc": meta,
                     "_yoast_wpseo_focuskw": "carros eléctricos ecuador"}}
    if dry:
        open(os.path.join(AQUI, f"{POST_ID}-preview.html"), "w").write(contenido); print("dry-run ok"); return
    req = urllib.request.Request(f"{BASE}/wp-json/wp/v2/posts/{POST_ID}", data=json.dumps(body).encode(), headers=H, method="POST")
    r = json.loads(urllib.request.urlopen(req, timeout=120).read())
    print("OK", r["id"], r["modified"], r["link"], r.get("meta", {}).get("_yoast_wpseo_title"))

if __name__ == "__main__":
    main()
