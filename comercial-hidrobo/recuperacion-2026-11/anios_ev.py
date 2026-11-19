#!/usr/bin/env python3
"""Cluster eléctricos/híbridos: años, precios y duplicados (19-nov-2026).

Criterio de años: en nov-2026 las búsquedas con «2026» son 24× las de «2027» (10.370 vs 424
impresiones en 28 d); hace un año pasó lo mismo con 2025/2026 y el año siguiente recién
despegó en enero. Ahora se quita «2025»; el paso a 2027 se hace a inicios de enero.

Precios: el catálogo de CH solo publica el «desde» de cada modelo. Se corrige solo lo que
coincide sin ambigüedad (X-Trail e-Power: $43.990 → $41.990). Z9 PHEV, RAV4 híbrido y
Deepal S07 quedan pendientes de la lista por versión de CH.

1. 8903 X-Trail e-Power: 2025 → 2026 en texto, precio y título (5.179 impr, CTR 0,35 %).
2. 9669 mitos: el enlace que decía «… 2025» pasa a 2026.
3. 9451 eléctricos chinos: reescrito (recomendaba BYD, JAC y Geely). 3.773 impr, pos 18,6.
4. 11822 → 9604 (Ibarra): 9604 rinde más (361 vs 89 impr). Se pasa el contenido 2026 de
   11822 a la URL de 9604 y 11822 queda en borrador con 301.
5. 9423 → 9669 (mitos): 9423 tiene 42 impr en pos 23. Borrador + 301.
6. Enlaces internos a 11822 y 9423 → apuntan directo al destino.

Uso: python3 anios_ev.py --dry-run | python3 anios_ev.py
"""
import json, os, re, sys, time, urllib.request, urllib.error
from pilar_electricos import p, h2, h3, ul, table, quote, wa, H, BASE, AQUI, PRECIO_NOTA

DRY = "--dry-run" in sys.argv
EV = BASE + "/vehiculos-electricos-e-hibridos/"

def api(method, path, body=None):
    req = urllib.request.Request(BASE + "/wp-json" + path, headers=H, method=method,
                                 data=json.dumps(body).encode() if body is not None else None)
    for _ in range(3):
        try:
            return json.loads(urllib.request.urlopen(req, timeout=120).read() or b"{}")
        except urllib.error.HTTPError as e:
            raise SystemExit(f"{method} {path} → HTTP {e.code}: {e.read()[:300]}")
        except Exception as e:
            print("   red:", e, "→ 90 s"); time.sleep(90)
    raise SystemExit("sin conexión")

def get(pid):
    x = api("GET", f"/wp/v2/posts/{pid}?context=edit&_fields=id,link,title,meta,content,status")
    f = os.path.join(AQUI, "antes", f"{pid}-anios-ev.json")
    if not os.path.exists(f):
        json.dump(x, open(f, "w"), ensure_ascii=False)
    time.sleep(8)
    return x

def post(pid, body, nota):
    print(f"  {pid}: {nota}")
    if not DRY:
        r = api("POST", f"/wp/v2/posts/{pid}", body); print("     ok", r.get("modified"), r.get("status"))
    time.sleep(12)

def l(slug, txt): return f'<a href="{EV}{slug}/">{txt}</a>'

# ---------- 1. X-Trail e-Power ----------
def xtrail():
    x = get(8903); c = x["content"]["raw"]
    n = c.replace("$43.990", "$41.990").replace("X-Trail e-Power 2025", "X-Trail e-Power 2026") \
         .replace("precio Ecuador 2025", "precio Ecuador 2026").replace("e-Power 2025", "e-Power 2026")
    restan = n.count("2025")
    post(8903, {"title": "Nissan X-Trail e-Power 2026: precio en Ecuador y cómo funciona",
                "content": n,
                "meta": {"_yoast_wpseo_title": "Nissan X-Trail e-Power 2026: precio en Ecuador",
                         "_yoast_wpseo_metadesc": "El X-Trail e-Power se vende en Ecuador desde $41.990: un SUV "
                         "que se maneja como eléctrico sin enchufarse. Cómo funciona, consumo y dónde verlo en Ibarra.",
                         "_yoast_wpseo_focuskw": "nissan x-trail e-power precio ecuador"}},
         f"$43.990→$41.990 ({c.count('$43.990')}×), 2025→2026; quedan «2025»: {restan}")

# ---------- 2. Mitos: enlace con 2025 ----------
def mitos_enlace():
    x = get(9669); c = x["content"]["raw"]
    n = c.replace("Autos eléctricos en Ecuador 2025: Modelos, precios y autonomía",
                  "Autos eléctricos en Ecuador 2026: precios, modelos y autonomía")
    if n == c:
        print("  9669: no se encontró el texto del enlace"); return
    post(9669, {"content": n}, "texto del enlace 2025 → 2026")

# ---------- 3. Eléctricos chinos ----------
CTA_CHINOS = ("<!-- cta-temprano-v1 -->\n" + p(
    "<strong>¿Quiere manejar uno antes de decidir?</strong> En Ibarra tenemos eléctricos, enchufables y de rango "
    "extendido de marcas chinas para probar el mismo día. "
    f'<a href="{wa("Hola, vengo del artículo de autos eléctricos chinos. Quisiera agendar una prueba de manejo.")}">'
    "Agende la prueba por WhatsApp</a>.") + "\n<!-- /cta-temprano-v1 -->")

def chinos_bloques():
    return [
        p("Las marcas chinas son hoy la forma más accesible de entrar a la movilidad eléctrica en Ecuador. En el "
          "norte del país puede comprar un 100 % eléctrico con concesionario y taller desde unos $23.000, y un "
          "enchufable o de rango extendido desde $25.240."),
        p("La diferencia entre marcas ya no está tanto en la batería como en el respaldo: quién le recibe el auto "
          "en el taller y cuánto tarda un repuesto. Esta guía reúne los modelos electrificados chinos que vendemos "
          "y atendemos en Ibarra, Cayambe y Tulcán, con precio y tipo de tecnología."),
        h2("Autos eléctricos e híbridos chinos en Ecuador y sus precios"),
        table(["Marca", "Modelo", "Tecnología", "Precio desde"], [
            ["DongFeng", "Mage EV / Mage híbrido", "Eléctrico o híbrido", "$22.990*"],
            ["Changan", "CS55 R-EV", "Rango extendido", "$25.240"],
            ["Deepal", "S05", "Eléctrico o rango extendido", "$29.990"],
            ["Chery", "Tiggo 7 y Tiggo 8 Super Hybrid", "Híbrido enchufable", "$30.990"],
            ["Changan", "Hunter REEV (pickup)", "Rango extendido", "$37.990"],
            ["Deepal", "S07", "Eléctrico o rango extendido", "$38.990"],
            ["Chery", "Tiggo 9 Super Hybrid", "Híbrido enchufable", "$46.990"],
        ], "* El «desde» del Mage corresponde a la versión híbrida; la eléctrica cuesta un poco más. " + PRECIO_NOTA),
        p("También tenemos la línea Super Hybrid de Omoda | Jaecoo (Jaecoo J7 SHS desde $26.990 y Omoda C5 SHS "
          "desde $22.990). Confirme con el asesor el sistema exacto de cada versión."),
        h2("Por marca: qué ofrece cada una"),
        h3("Deepal: la línea eléctrica de Changan"),
        p("Es la marca más eléctrica del grupo. El S05 da 510 km declarados y el S07 llega a 620 km, la mayor "
          f"autonomía del catálogo. Los dos existen también con rango extendido. Más detalle en {l('deepal-ecuador-marca-modelos', 'Deepal en Ecuador')}."),
        h3("DongFeng: el eléctrico más accesible y una pickup enchufable"),
        p("El Mage EV, con batería LFP de 50,82 kWh y 445 km declarados, es la puerta de entrada al eléctrico con "
          f"taller propio en el norte. La Z9 es una pickup híbrida enchufable con 135 km en modo eléctrico. Vea {l('auto-electrico-mas-barato-ecuador-2026', 'el auto eléctrico más barato de Ecuador')}."),
        h3("Changan: rango extendido para quien no quiere depender del enchufe"),
        p("En el CS55 R-EV y la Hunter REEV las ruedas siempre las mueve el motor eléctrico; la gasolina solo "
          f"genera energía. Andan en eléctrico el día a día y no se quedan sin autonomía en viaje. Lo explicamos en {l('que-es-reev-changan-hunter-cs55-ecuador', 'qué es un REEV')}."),
        h3("Chery: híbridos enchufables para familia"),
        p("La línea Super Hybrid lleva la tecnología enchufable a los SUV Tiggo 7, 8 y 9, con unos 120 km en modo "
          f"eléctrico en el Tiggo 8. Detalle en {l('chery-super-hybrid-csh-ecuador', 'el sistema Super Hybrid de Chery')}."),
        CTA_CHINOS,
        h2("Eléctrico, enchufable o rango extendido: cuál le conviene"),
        p("Las marcas chinas ofrecen las tres tecnologías, y elegir mal pesa más que elegir la marca equivocada."),
        table(["Si usted…", "Le conviene", "Ejemplos"], [
            ["Tiene parqueadero propio y casi no sale de la ciudad", "100 % eléctrico", "Mage EV, Deepal S05 o S07 eléctricos"],
            ["Carga en casa pero viaja a Quito o Tulcán cada semana", "Híbrido enchufable", "Tiggo 7, 8 o 9 Super Hybrid, Z9"],
            ["No tiene dónde cargar o maneja muchos kilómetros", "Rango extendido o híbrido", "CS55 R-EV, Hunter REEV, Mage híbrido"],
        ]),
        p("Un enchufable o un rango extendido le da la mayor parte del ahorro de un eléctrico en el día a día, sin "
          "la preocupación por la autonomía en carretera. El eléctrico puro es el más barato de operar, pero pide "
          f"un cargador de pared en casa. La diferencia técnica entre las siglas está en {l('diferencia-phev-hev-reev-ev-ecuador', 'PHEV, HEV, REEV y EV')}."),
        h2("Lo que cuesta tenerlo, más allá del precio"),
        p("Un eléctrico no lleva aceite de motor, filtros de combustible, bujías ni embrague, y el frenado "
          "regenerativo alarga la vida de las pastillas. El mantenimiento se concentra en frenos, llantas, "
          "suspensión, filtro de cabina y el sistema de refrigeración de la batería. A eso se suma, una sola vez, "
          "el punto de carga en casa. Lo que todavía es incierto es la reventa: el mercado de eléctricos usados en "
          "Ecuador es pequeño y nadie puede asegurar cuánto valdrá un auto en cinco años."),
        h2("Qué revisar antes de comprar un eléctrico chino"),
        ul(["<strong>La química de la batería:</strong> LFP aguanta más ciclos y envejece mejor; NCM rinde más por kilo.",
            f"<strong>La garantía de la batería, por escrito:</strong> años y kilómetros. Comparamos las de cada marca en {l('bateria-auto-hibrido-duracion-costo-garantia-ecuador', 'cuánto dura la batería')}.",
            "<strong>Taller y repuestos cerca:</strong> un eléctrico se daña menos, pero cuando lo necesita no lo arregla cualquiera.",
            f"<strong>Dónde va a cargar:</strong> sin parqueadero propio, un enchufable o un rango extendido le conviene más. Vea {l('cuanto-cuesta-cargar-auto-electrico-casa-ecuador', 'cuánto cuesta cargar en casa')}."]),
        quote("La pregunta no es si el auto es chino, sino quién se lo atiende cuando lo necesita. Un eléctrico con "
              "taller autorizado cerca vale más que uno más barato sin respaldo.", "Equipo de postventa — Comercial Hidrobo"),
        h2("Cuándo un eléctrico chino no le conviene"),
        ul(["Va a venderlo en dos o tres años: el mercado de eléctricos usados en Ecuador todavía es pequeño.",
            "No tiene dónde cargar y hace viajes largos cada semana: ahí rinde más un rango extendido.",
            "Le interesa un modelo de una marca sin concesionario ni taller en su provincia."]),
        h2("Preguntas frecuentes"),
        h3("¿Qué marcas de autos eléctricos chinos hay en Ecuador?"),
        p("Entre otras, BYD, JAC, Geely, Deepal, DongFeng, Changan, Chery y Omoda | Jaecoo. En el norte del país, "
          "Comercial Hidrobo representa a las cinco últimas con taller y repuestos en Ibarra, Cayambe y Tulcán."),
        h3("¿Cuál es el auto eléctrico chino más barato?"),
        p("Con concesionario y taller en el norte, el DongFeng Mage EV. Hay opciones más baratas por importación "
          "directa, pero sin respaldo local de servicio."),
        h3("¿Los autos eléctricos chinos son confiables?"),
        p("Los de marcas con representación oficial vienen con garantía de batería por escrito y taller "
          "autorizado. Esa es la diferencia que más pesa con el paso de los años."),
        h3("¿Conviene un eléctrico puro o un híbrido enchufable?"),
        p(f"Depende de dónde carga y cuánto viaja. Lo comparamos en {l('electrico-o-hibrido-cual-conviene-ecuador', 'eléctrico o híbrido: cuál conviene')}."),
    ]

def chinos():
    x = get(9451); c = x["content"]["raw"]
    if "<!-- cta-ch-v1 -->" not in c:
        raise SystemExit("9451 sin cta-ch-v1")
    contenido = "<!-- cw-chinos-ev-v2 -->\n" + "\n\n".join(chinos_bloques()) + "\n\n" + c[c.index("<!-- cta-ch-v1 -->"):]
    texto = re.sub(r"<[^>]+>", " ", re.sub(r"<!--.*?-->", "", contenido, flags=re.S))
    malas = [w for w in ["descubre", " tú ", "puedes", "hoy en día", "amplia gama", "2025"] if w in texto.lower()]
    if malas: raise SystemExit(f"9451 no pasa validación: {malas}")
    post(9451, {"title": "Autos eléctricos chinos en Ecuador 2026: marcas, modelos y precios", "content": contenido,
                "excerpt": "Los eléctricos, enchufables y de rango extendido chinos que se venden con taller en el norte del Ecuador.",
                "meta": {"_yoast_wpseo_title": "Autos eléctricos chinos en Ecuador 2026: modelos y precios",
                         "_yoast_wpseo_metadesc": "Deepal, DongFeng, Changan y Chery: los eléctricos e híbridos "
                         "enchufables chinos con taller en el norte del Ecuador, desde $22.990, y qué revisar antes de comprar.",
                         "_yoast_wpseo_focuskw": "carros eléctricos chinos en ecuador"}},
         f"reescrito, {len(texto.split())} palabras")

# ---------- 4 y 5. Consolidaciones ----------
def redir(vieja, nueva, titulo):
    existentes = {r["url"] for r in api("GET", "/redirection/v1/redirect?per_page=200").get("items", [])}
    time.sleep(8)
    print(f"  301 {vieja} → {nueva}", "(ya existe)" if vieja in existentes else "")
    if not DRY and vieja not in existentes:
        api("POST", "/redirection/v1/redirect", {"url": vieja, "action_data": {"url": nueva}, "action_type": "url",
            "action_code": 301, "match_type": "url", "group_id": 1, "title": titulo})
        time.sleep(8)

def ibarra():
    nuevo, viejo = get(11822), get(9604)
    if "<!-- cw-ibarra-v2 -->" in viejo["content"]["raw"]:
        print("  9604 ya tiene el contenido 2026")
    else:
        post(9604, {"title": nuevo["title"]["raw"], "content": "<!-- cw-ibarra-v2 -->\n" + nuevo["content"]["raw"],
                    "meta": {k: nuevo["meta"].get(k, "") for k in ("_yoast_wpseo_title", "_yoast_wpseo_metadesc", "_yoast_wpseo_focuskw")}},
             f"recibe el contenido 2026 de 11822 («{nuevo['title']['raw']}»)")
    redir("/vehiculos-electricos-e-hibridos/donde-probar-hibrido-electrico-ibarra-2026/",
          "/vehiculos-electricos-e-hibridos/autos-hibridos-y-electricos-en-ibarra-2025/", "Consolidación Ibarra nov-2026")
    post(11822, {"status": "draft"}, "a borrador")

def mitos():
    redir("/vehiculos-electricos-e-hibridos/mitos-y-realidades-de-los-autos-electricos/",
          "/vehiculos-electricos-e-hibridos/autos-electricos-en-ecuador-mitos-y-realidades/", "Consolidación mitos nov-2026")
    get(9423)  # respaldo
    post(9423, {"status": "draft"}, "a borrador")

def enlaces():
    pares = [(EV + "donde-probar-hibrido-electrico-ibarra-2026/", EV + "autos-hibridos-y-electricos-en-ibarra-2025/"),
             (EV + "mitos-y-realidades-de-los-autos-electricos/", EV + "autos-electricos-en-ecuador-mitos-y-realidades/")]
    for viejo, nuevo in pares:
        slug = viejo.rstrip("/").rsplit("/", 1)[1]
        for x in api("GET", f"/wp/v2/posts?search={slug}&per_page=50&_fields=id"):
            time.sleep(8)
            c = api("GET", f"/wp/v2/posts/{x['id']}?context=edit&_fields=content,status")
            if c.get("status") != "publish" or viejo not in c["content"]["raw"]: continue
            f = os.path.join(AQUI, "antes", f"{x['id']}-enlaces-ev.json")
            if not os.path.exists(f): json.dump({"id": x["id"], "raw": c["content"]["raw"]}, open(f, "w"), ensure_ascii=False)
            post(x["id"], {"content": c["content"]["raw"].replace(viejo, nuevo)}, f"enlace {slug} → destino")
        time.sleep(8)

if __name__ == "__main__":
    os.makedirs(os.path.join(AQUI, "antes"), exist_ok=True)
    print("1. X-Trail"); xtrail()
    print("2. Mitos (enlace)"); mitos_enlace()
    print("3. Eléctricos chinos"); chinos()
    print("4. Ibarra"); ibarra()
    print("5. Mitos (consolidación)"); mitos()
    print("6. Enlaces internos"); enlaces()
