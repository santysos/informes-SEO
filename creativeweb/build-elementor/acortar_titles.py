#!/usr/bin/env python3
"""Diez entradas con el title de Google truncado.

Google corta el título alrededor de los 60 caracteres. Estos pasaban de 64 y
perdían justo el final, que en varios casos era la parte que vendía. El caso
peor era 2685: no tenía title propio, así que Yoast le pegaba « - Creative Web»
y llegaba a 79.

Se conserva la palabra clave al principio en todos.
"""
import random
import time

import emcp

TITLES = {
    2685: "Correos corporativos en Ecuador: por qué convienen",
    2704: "Correo corporativo en la era digital: ventajas reales",
    2745: "Correo corporativo y comunicación interna en la empresa",
    2763: "Correo empresarial: buenas prácticas para protegerlo",
    3165: "¿Qué significa .com? Extensiones de dominio explicadas",
    3492: "Backup automático de sitios web: por qué es imprescindible",
    3507: "Uptime 99,9 % en hosting: qué significa y por qué importa",
    3518: "Señales de que tu sitio web fue hackeado (y qué hacer)",
    3526: "Firewall para sitios web: tu defensa contra ciberataques",
    3587: "Accesibilidad web: haz tu sitio inclusivo y mejora el SEO",
}

if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    for pid, t in TITLES.items():
        for intento in range(4):
            try:
                r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/posts/{pid}",
                                       headers=emcp.HEAD,
                                       params={"cb": random.randint(1, 10**9)},
                                       json={"meta": {"_yoast_wpseo_title": t}}, timeout=90)
                print(f"{pid}: {r.status_code} | ({len(t)}) {t}")
                break
            except Exception as e:
                print(f"{pid}: reintento {intento + 1} ({type(e).__name__})")
                time.sleep(8)
                emcp.init()
    print("OK titles")
