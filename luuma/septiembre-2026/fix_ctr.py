#!/usr/bin/env python3
"""Reescribe títulos y metas de las páginas que desperdician impresiones.

Diagnóstico (Search Console, 21-may a 18-ago 2026): el sitio tiene 50.689
impresiones y 557 clics, CTR 1,10 %. Varias páginas están en posición 5-9 con
CTR por debajo del 0,6 %, cuando lo esperable ahí es 3-6 %.

Cada cambio de abajo está justificado por la consulta real que la página ya
capta y que el título actual no responde.

Uso:
  python3 fix_ctr.py --dry-run
  python3 fix_ctr.py
"""
import re, sys, time, random, os
import requests

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.abspath(os.path.join(HERE, "..", ".."))
UA = {"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/126"}

# id: (slug, título del post, yoast_title (≤60), meta description (140-160), por qué)
CAMBIOS = {
 1679: (
   "rooftop-bar-ecuador",
   "Rooftop bars en Ecuador: cuáles hay y cuánto cuesta ir (2026)",
   "Rooftop bars en Ecuador: cuáles hay y precios",
   "Quito, Guayaquil, Cuenca y Manta comparados: dónde están los rooftop bars de Ecuador, qué cuesta un cóctel en cada ciudad y cuál conviene según el viaje.",
   "3.843 impresiones y 5 clics (CTR 0,13 %), posición 8,5. El título no dice "
   "ciudades ni precios, que es lo que busca quien compara antes de salir."),

 1873: (
   "visitar-manta-desde-guayaquil-quito",
   "Manta, Ecuador: cómo llegar desde Guayaquil o Quito y qué hacer",
   "Manta Ecuador: cómo llegar y qué hacer",
   "Manta desde Guayaquil o Quito: cuánto tarda el bus y el auto, cuánto cuesta, dónde alojarse y qué hacer el primer día. Guía práctica de la costa.",
   "3.412 impresiones y 4 clics (CTR 0,12 %). Capta «manta ecuador» (2.422 impr.) "
   "y «manta» (1.772 impr.), pero el título empieza por la ruta y no por el destino."),

 1629: (
   "sushi-en-manta-ecuador",
   "Sushi en Manta: dónde comerlo y cuánto cuesta (2026)",
   "Sushi en Manta: dónde comerlo y precios 2026",
   "Manta descarga atún todos los días, así que el sushi de aquí parte con ventaja. Dónde comerlo, qué pedir y cuánto cuesta un roll en la ciudad.",
   "2.823 impresiones y 6 clics (CTR 0,21 %). «Mejor sushi fresco» es una promesa "
   "vaga; el usuario busca dónde y cuánto."),

 1689: (
   "comida-de-mar-manta",
   "Comida de mar en Manta: qué pedir, dónde y a qué precio",
   "Comida de mar en Manta: qué pedir y precios",
   "Ceviche, viche, encocado y pescado del día en Manta: qué es cada plato, dónde comerlo bien y cuánto debería costar según la zona de la ciudad.",
   "1.571 impresiones y 9 clics (CTR 0,57 %). Además absorbe el post de mariscos "
   "en esta misma pasada, así que el título tiene que cubrir ambos temas."),

 2557: (
   "best-rooftop-bar-manta-ecuador",
   "Best Rooftop Bar in Manta, Ecuador: Prices, Hours & Sunset (2026)",
   "Best Rooftop Bar in Manta: Prices & Hours",
   "Manta's rooftop bars compared: opening hours, cocktail prices in USD, the exact sunset window and how to get there. Written by locals, updated 2026.",
   "1.074 impresiones y 0 clics. Ya aparece en inglés pero «An Honest Guide» no "
   "promete nada concreto frente a «prices, hours, sunset»."),

 1633: (
   "vida-nocturna-manta",
   "Vida nocturna en Manta: dónde salir según el plan y qué cuesta",
   "Vida nocturna en Manta: dónde salir y precios",
   "Bares, rooftops y malecón: dónde salir de noche en Manta según el plan, a qué hora se llena cada zona, cuánto cuesta un trago y cómo moverse.",
   "3.947 impresiones con CTR 2,28 %, de los mejores del sitio. Añadir precio y "
   "«según el plan» debería subirlo más."),

 1526: (
   "mejores-restaurantes-manta-ecuador",
   "Dónde comer en Manta: los mejores restaurantes por zona y precio",
   "Dónde comer en Manta: restaurantes por zona",
   "Guía de restaurantes de Manta por zona: Tarqui, Umiña, malecón Murciélago y La Quadra. Qué se come en cada una, con precios reales y horarios.",
   "5.204 impresiones y CTR 1,31 %. «Mejores restaurantes» es genérico; por zona "
   "y precio responde mejor a cómo busca la gente."),

 1527: (
   "rooftop-manta-experiencia-gastronomica",
   "Rooftops en Manta: cuáles hay, horarios y cuánto cuesta cada uno",
   "Rooftops en Manta: cuáles hay y precios",
   "Los rooftops que abren de verdad en Manta, con horarios, precios por persona y qué tipo de plan sirve cada uno. Comparativa honesta y actualizada.",
   "Capta consultas de comparación de rooftops; el título actual habla de "
   "«experiencia gastronómica», que nadie busca."),
}


def cargar_env():
    env = {}
    with open(os.path.join(ROOT, ".env")) as f:
        for line in f:
            line = line.strip()
            if line and not line.startswith("#") and "=" in line:
                k, v = line.split("=", 1)
                env[k] = v.strip().strip('"')
    return env


def main():
    dry = "--dry-run" in sys.argv
    env = cargar_env()
    auth = (env["LUUMA_WP_USER"], env["LUUMA_WP_APP_PASS"])
    B = env["LUUMA_WP_BASE"].rstrip("/")
    s = requests.Session(); s.headers.update(UA)

    print(f"{'='*78}\nREESCRITURA DE TÍTULOS Y METAS · {len(CAMBIOS)} páginas\n{'='*78}\n")
    errores = 0
    for pid, (slug, titulo, ytitle, ydesc, motivo) in CAMBIOS.items():
        # validaciones de longitud antes de tocar nada
        avisos = []
        if len(ytitle) > 60:
            avisos.append(f"yoast_title {len(ytitle)} car. (máx 60)")
        if not (140 <= len(ydesc) <= 160):
            avisos.append(f"metadesc {len(ydesc)} car. (140-160)")

        r = s.get(f"{B}/posts/{pid}", auth=auth,
                  params={"context": "edit", "_fields": "id,slug,title,meta",
                          "cb": random.randint(1, 10**9)}, timeout=40)
        if r.status_code != 200:
            print(f"  [{pid}] ERROR al leer: {r.status_code}"); errores += 1; continue
        p = r.json()
        if p["slug"] != slug:
            print(f"  [{pid}] ⚠ slug no coincide: esperaba {slug}, encontré {p['slug']}")
            errores += 1; continue

        actual_t = re.sub(r"<[^>]+>", "", p["title"]["raw"])
        actual_y = p.get("meta", {}).get("_yoast_wpseo_title", "")

        print(f"[{pid}] /{slug}/")
        print(f"   motivo : {motivo}")
        print(f"   antes  : {actual_t[:74]}")
        print(f"   ahora  : {titulo[:74]}")
        print(f"   yoast  : {ytitle}  ({len(ytitle)} car.)")
        print(f"   meta   : {ydesc[:76]}…  ({len(ydesc)} car.)")
        if avisos:
            print(f"   ⚠ {' · '.join(avisos)}")
        print()

        if dry:
            continue

        time.sleep(8)
        payload = {"title": titulo, "meta": {
            "_yoast_wpseo_title": ytitle,
            "_yoast_wpseo_metadesc": ydesc,
        }}
        rr = s.post(f"{B}/posts/{pid}", auth=auth,
                    params={"cb": random.randint(1, 10**9)}, json=payload, timeout=60)
        print(f"   → {'OK' if rr.status_code < 400 else 'ERROR ' + str(rr.status_code)}\n")
        if rr.status_code >= 400:
            errores += 1

    if dry:
        print("--dry-run: no se aplicó ningún cambio.")
    else:
        print(f"Listo. {len(CAMBIOS) - errores} de {len(CAMBIOS)} páginas actualizadas.")


if __name__ == "__main__":
    main()
