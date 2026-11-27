#!/usr/bin/env python3
"""Enlaces internos rotos en el blog.

`find-broken-links` marcó 140 elementos; casi todo era ruido (las imágenes de
2017-2023 responden 200, y los templates de elementor_library no se renderizan).
Los que sí estaban rotos de verdad son estos: enlaces a slugs que cambiaron en
algún rediseño anterior, un enlace pegado a `wp-admin/post.php?...&action=edit`
en vez del permalink, y una interpolación de plantilla que quedó a medias
(`creativeweb.com.ec/{`).

Además se crean 301 de los slugs viejos, porque son URLs que Google pudo haber
indexado y que hoy dan 404.
"""
import json
import random
import time

import emcp

B = "https://www.creativeweb.com.ec"

# slug viejo (404) → slug actual del mismo contenido
SLUGS = {
    "configurar-tu-cuenta-de-correo-corporativo-con-gmail-actualizado":
        "configurar-cuenta-correo-corporativo-gmail",
    "configurar-cuentas-de-correo-electronico-imap-en-mozilla-thunderbird":
        "configurar-cuentas-de-correo-imap-en-mozilla-thunderbird",
    "configurar-cuentas-de-correo-electronico-imap-o-pop3-en-celulares-android":
        "como-configurar-correos-imap-pop3-gmail-android",
    "configurar-cuentas-de-correo-electronico-imap-en-iphone":
        "configurar-cuentas-correo-imap-iphone-guia-completa",
}

# reemplazos literales que no son un simple cambio de slug
LITERALES = {
    f'{B}/wp-admin/post.php?post=3301&amp;action=edit':
        f'{B}/dominio-perfecto-para-tu-negocio-en-ecuador/',
    f'{B}/wp-admin/post.php?post=3301&action=edit':
        f'{B}/dominio-perfecto-para-tu-negocio-en-ecuador/',
    f'href="{B}/{{"': f'href="{B}/"',
}


def reemplazos(html):
    n = 0
    for viejo, nuevo in SLUGS.items():
        for a, b in ((f"{B}/{viejo}/", f"{B}/{nuevo}/"), (f"/{viejo}/", f"/{nuevo}/")):
            if a in html:
                n += html.count(a)
                html = html.replace(a, b)
    for a, b in LITERALES.items():
        if a in html:
            n += html.count(a)
            html = html.replace(a, b)
    return html, n


def arreglar_contenido():
    tocados = 0
    pag = 1
    while True:
        r = emcp._session.get(emcp.BASE + "/wp-json/wp/v2/posts", headers=emcp.HEAD,
                              params={"context": "edit", "per_page": 50, "page": pag,
                                      "status": "publish,draft,private",
                                      "cb": random.randint(1, 10**9)}, timeout=120)
        posts = r.json()
        if not isinstance(posts, list) or not posts:
            break
        for p in posts:
            html = p["content"]["raw"]
            nuevo, n = reemplazos(html)
            if not n:
                continue
            u = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/posts/{p['id']}",
                                   headers=emcp.HEAD,
                                   params={"cb": random.randint(1, 10**9)},
                                   json={"content": nuevo}, timeout=90)
            tocados += 1
            print(f"  {p['id']} {p['slug'][:50]}: {n} enlace(s) → {u.status_code}")
        if len(posts) < 50:
            break
        pag += 1
    print(f"entradas corregidas: {tocados}")


def crear_301():
    for viejo, nuevo in SLUGS.items():
        origen, destino = f"/{viejo}/", f"/{nuevo}/"
        r = emcp._session.get(emcp.BASE + "/wp-json/redirection/v1/redirect", headers=emcp.HEAD,
                              params={"filterBy[url]": origen, "cb": random.randint(1, 10**9)},
                              timeout=60)
        if r.ok and r.json().get("items"):
            print(f"  301 {viejo[:44]} → ya existía")
            continue
        r = emcp._session.post(emcp.BASE + "/wp-json/redirection/v1/redirect", headers=emcp.HEAD,
                               params={"cb": random.randint(1, 10**9)},
                               json={"url": origen, "action_data": {"url": destino},
                                     "action_type": "url", "action_code": 301,
                                     "match_type": "url", "group_id": 1,
                                     "title": f"Blog: slug viejo → {nuevo}",
                                     "status": "enabled"}, timeout=60)
        print(f"  301 {viejo[:44]} → {r.status_code}")


if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    print("== contenido ==")
    arreglar_contenido()
    print("== redirecciones ==")
    crear_301()
    print("OK enlaces del blog")
