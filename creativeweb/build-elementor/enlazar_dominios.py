#!/usr/bin/env python3
"""La página de dominios era huérfana: nada del sitio la enlazaba salvo tres
entradas del blog. En /servicios/ la fila «Hosting y dominios» mezclaba dos
servicios y solo llevaba a hosting.

Se parte en dos filas —«Hosting web» y «Dominios»— para que el hub enlace a
las dos páginas. Además se recorta el title de Yoast de /servicios/, que estaba
en 63 caracteres y Google lo truncaba.
"""
import copy
import json
import random
import time

import emcp

SERVICIOS = 929
DOMINIOS_URL = "/servicios/comprar-dominio-ecuador/"
TITLE_SERVICIOS = "Servicios web, SEO, hosting y software — Creative Web"


def nuevo_id():
    return f"{random.randint(0, 0xfffffff):07x}"


def refrescar_ids(el):
    el["id"] = nuevo_id()
    for h in el.get("elements", []):
        refrescar_ids(h)
    return el


def partir_fila_hosting():
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{SERVICIOS}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    d = json.loads(r.json()["meta"]["_elementor_data"])
    filas = d[2]["elements"][0]["elements"]

    if any(DOMINIOS_URL in json.dumps(f, ensure_ascii=False) for f in filas):
        print("servicios: la fila de dominios ya existía")
        return

    i = next(i for i, f in enumerate(filas)
             if "/servicios/hosting-web-ecuador/" in ((f["settings"].get("link") or {}).get("url", "")))
    hosting = filas[i]

    def escribir(fila, titulo, desc, url=None):
        for w in fila["elements"]:
            s = w["settings"]
            if s.get("header_size") == "h3":
                s["title"] = titulo
            elif isinstance(s.get("editor"), str) and s.get("_css_classes") == "cw-desc":
                s["editor"] = f"<p>{desc}</p>"
        if url:
            fila["settings"]["link"] = {"url": url, "is_external": "", "nofollow": ""}

    escribir(hosting, "Hosting web",
             "El hogar de tu página: espacio, SSL y respaldos, con soporte local.")

    dominios = refrescar_ids(copy.deepcopy(hosting))
    escribir(dominios, "Dominios",
             "Tu dirección .com o .com.ec, registrada a nombre de tu empresa.",
             DOMINIOS_URL)
    # el degradado de la miniatura se repetiría con el de hosting
    for w in dominios["elements"]:
        h = w["settings"].get("html")
        if isinstance(h, str) and "cw-thumb" in h:
            w["settings"]["html"] = h.replace("linear-gradient(140deg,#0E2A44,#0070C0)",
                                              "linear-gradient(140deg,#0C2B26,#00A090)")
    filas.insert(i + 1, dominios)

    r2 = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{SERVICIOS}", headers=emcp.HEAD,
                            params={"cb": random.randint(1, 10**9)},
                            json={"meta": {"_elementor_data": json.dumps(d, ensure_ascii=False)}},
                            timeout=90)
    print(f"servicios: {r2.status_code} | fila «Dominios» insertada en la posición {i + 1}")


def recortar_title():
    r = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{SERVICIOS}", headers=emcp.HEAD,
                           params={"cb": random.randint(1, 10**9)},
                           json={"meta": {"_yoast_wpseo_title": TITLE_SERVICIOS}}, timeout=90)
    print(f"title servicios: {r.status_code} | {len(TITLE_SERVICIOS)} caracteres")


def regenerar_css(pid, url):
    for _ in range(3):
        emcp.call("emcp-tools-update-page-settings", {"post_id": pid,
                                                     "settings": {"hide_title": "yes"}})
        emcp.flush_css()
        time.sleep(2)
        emcp._session.get(url, headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                          params={"cb": random.randint(1, 10**9)}, timeout=90)
        c = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                              params={"cb": random.randint(1, 10**9)}, timeout=60)
        print(f"  css post-{pid}: {c.status_code}")
        if c.status_code == 200:
            return


if __name__ == "__main__":
    emcp.init()
    partir_fila_hosting()
    recortar_title()
    regenerar_css(SERVICIOS, f"{emcp.BASE}/servicios/")
    emcp.flush_css()
    print("OK enlaces de dominios")
