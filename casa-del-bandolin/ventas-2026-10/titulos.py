#!/usr/bin/env python3
"""Títulos y metas de Yoast para los posts con más impresiones y CTR bajo (2026-10-06).

Cada título apunta a la búsqueda real que trae la gente (Search Console jul-oct 2026) y solo
promete lo que el post ya contiene. Fuera: 1564/1742 (requinto vs guitarra, se consolidan),
1121 (ébano: tráfico de la madera) y 2282 («La música», genérico).

    python3 titulos.py        # muestra y valida largos
    python3 titulos.py --ya   # aplica (guarda los valores previos en antes/yoast-previo.json)
"""
import base64, json, os, sys, time, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env")) if l.startswith("BANDOLIN") and "=" in l)
H = {"Authorization": "Basic " + base64.b64encode(f"{env['BANDOLIN_WP_USER']}:{env['BANDOLIN_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}
API = "https://www.lacasadelbandolin.com/wp-json/wp/v2/posts/"

NUEVOS = {
    1798: ("Charango: historia, origen y evolución del instrumento",
           "Qué es el charango, de dónde viene y cómo pasó de los Andes a la música latinoamericana actual. Y los charangos que puedes conseguir en Otavalo."),
    1780: ("Acordes y notas del charango de 10 cuerdas (con gráficos)",
           "Notas de cada cuerda, afinación y acordes mayores y menores del charango de 10 cuerdas, con gráficos claros para empezar a tocar desde hoy mismo."),
    1691: ("Requinto: qué es, su historia y cómo se usa hoy",
           "Qué es el requinto, en qué se diferencia de la guitarra y cómo llegó a ser clave en el pasillo y la música ecuatoriana, desde sus orígenes hasta hoy."),
    1803: ("Instrumentos andinos poco conocidos y cómo suenan",
           "Conoce instrumentos andinos menos famosos que el charango, cómo suenan y qué papel cumplen junto a él en la música tradicional de los Andes."),
    1705: ("Zampoña: qué es, cómo se fabrica y cómo suena",
           "Qué es la zampoña, cómo se fabrica a mano en Ecuador, de qué caña está hecha y por qué su sonido es tan especial en la música andina tradicional."),
    1695: ("Afinación del requinto: cómo afinarlo con una guitarra",
           "Cómo afinar el requinto paso a paso usando una guitarra como referencia: las notas de cada cuerda y los errores comunes que conviene evitar al afinar."),
    1732: ("Rondador: el instrumento ecuatoriano y su significado",
           "Qué es el rondador, cómo se toca y por qué es símbolo de la música tradicional del Ecuador. Su historia, sus usos y dónde conseguir uno en Otavalo."),
    1712: ("Cómo afinar un charango con afinador, paso a paso",
           "Afina tu charango con afinador en pocos minutos: las notas de cada orden de cuerdas, en qué orden afinar y cómo evitar que se desafine tan rápido."),
    1720: ("Charango vs. bandolín: diferencias y cuál elegir",
           "Charango o bandolín: diferencias de tamaño, cuerdas, afinación y sonido entre los dos, y cuál te conviene según la música andina que quieres tocar."),
    1807: ("Cómo tocar el charango: técnicas para principiantes",
           "Postura, rasgueo y primeros acordes para tocar charango desde cero. Las técnicas básicas explicadas paso a paso para principiantes, sin saber música."),
    1759: ("Ronroco: qué es, sus notas y cómo se afina",
           "Qué es el ronroco, en qué se diferencia del charango, cuáles son sus notas y cómo se afina este instrumento de cuerda tradicional de los Andes."),
    1379: ("¿Cuántas cuerdas tiene el charango? Tipos y afinación",
           "El charango tiene 10 cuerdas agrupadas en 5 órdenes dobles. Te explicamos cómo se afinan, qué variantes existen y qué cuerdas conviene usar."),
    1788: ("Rondín: qué es, su historia y cómo se toca",
           "Qué es el rondín, la armónica que se volvió parte de la música andina, cuál es su historia en el Ecuador y cómo empezar a tocarlo paso a paso."),
    1792: ("Notas de charango para principiantes: acordes básicos",
           "Las notas y los acordes básicos del charango para empezar a tocar hoy, con la posición de cada dedo explicada de forma sencilla para principiantes."),
}


def main():
    ya = "--ya" in sys.argv
    malos = 0
    for pid, (t, d) in NUEVOS.items():
        ok = len(t) <= 60 and 140 <= len(d) <= 160
        malos += not ok
        print(f"{'OK ' if ok else 'MAL'} {pid} t={len(t)} d={len(d)}  {t}")
    if malos:
        sys.exit(f"{malos} con largo fuera de rango")
    if not ya:
        return
    previo = {}
    for pid, (t, d) in NUEVOS.items():
        cur = json.load(urllib.request.urlopen(urllib.request.Request(f"{API}{pid}?context=edit&_fields=meta", headers=H), timeout=90))["meta"]
        previo[pid] = {k: cur.get(k) for k in ("_yoast_wpseo_title", "_yoast_wpseo_metadesc")}
        r = json.load(urllib.request.urlopen(urllib.request.Request(f"{API}{pid}", headers=H, method="POST",
                      data=json.dumps({"meta": {"_yoast_wpseo_title": t, "_yoast_wpseo_metadesc": d}}).encode()), timeout=120))
        print(pid, "→", r["meta"]["_yoast_wpseo_title"] == t)
        time.sleep(2)
    json.dump(previo, open(os.path.join(AQUI, "antes", "yoast-previo.json"), "w"), ensure_ascii=False, indent=1)


if __name__ == "__main__":
    main()
