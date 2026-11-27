#!/usr/bin/env python3
"""Tres metas de Yoast que no cuadraban.

- Hosting (1282): el title anunciaba «desde $59,99 al año» y la página muestra
  «desde $4.99/mes». Google penaliza que el snippet prometa un precio distinto
  al visible, y además la portada usa la cifra mensual.
- SEO (3624): la descripción estaba en «usted» y todo el sitio 2026 trata de «tú».
- Comercial Hidrobo (3878): title de 63 caracteres, se truncaba.
"""
import random
import time

import emcp

METAS = {
    1282: {"_yoast_wpseo_title": "Hosting web en Ecuador desde $4.99 al mes — Creative Web"},
    3624: {"_yoast_wpseo_metadesc":
           "Analizamos qué busca tu cliente, dónde apareces hoy y qué te frena. Con datos "
           "de Search Console, no estimaciones. El trabajo se mide en contactos."},
    3878: {"_yoast_wpseo_title": "Caso Comercial Hidrobo: web, SEO y citas de taller"},
}

if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    for pid, meta in METAS.items():
        r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                               params={"cb": random.randint(1, 10**9)},
                               json={"meta": meta}, timeout=90)
        k = next(iter(meta))
        print(f"{pid}: {r.status_code} | {k} = {len(meta[k])} caracteres")
    print("OK metas")
