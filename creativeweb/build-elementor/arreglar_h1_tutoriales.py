#!/usr/bin/env python3
"""Dos tutoriales viejos hechos en Elementor salían sin ningún encabezado.

El título del post sí se mostraba —el widget tiene una etiqueta dinámica al
título—, pero el widget estaba en `h3`, así que la página no tenía H1. Y los
pasos («1.- Primer paso», «2.- Segundo paso»…) eran `<p><strong>`, no `<h2>`:
para Google esas guías no tenían estructura.

No se toca el texto, solo las etiquetas.
"""
import json
import random
import re
import time

import emcp

POSTS = (1872, 2183)
PASO = re.compile(r"^\s*<p>\s*<strong>(.{3,90}?)</strong>\s*</p>", re.S)


def arreglar(pid):
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/posts/{pid}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    d = json.loads(r.json()["meta"]["_elementor_data"])
    cambios = []

    def walk(els):
        for e in els:
            s = e.get("settings") or {}
            if e.get("widgetType") == "heading" and s.get("header_size") in ("h3", "h2"):
                if not cambios or not any(c.startswith("h1") for c in cambios):
                    s["header_size"] = "h1"
                    cambios.append(f"h1: «{str(s.get('title'))[:40]}»")
            if e.get("widgetType") == "text-editor" and isinstance(s.get("editor"), str):
                nuevo, n = PASO.subn(lambda m: f"<h2>{m.group(1)}</h2>", s["editor"], count=1)
                if n:
                    s["editor"] = nuevo
                    cambios.append("h2: " + re.sub(r"<[^>]+>", "", nuevo[:44]).strip())
            walk(e.get("elements", []))
    walk(d)
    if not cambios:
        print(f"{pid}: sin cambios")
        return
    r2 = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/posts/{pid}", headers=emcp.HEAD,
                            params={"cb": random.randint(1, 10**9)},
                            json={"meta": {"_elementor_data": json.dumps(d, ensure_ascii=False)}},
                            timeout=90)
    print(f"{pid}: {r2.status_code} | {len(cambios)} etiquetas")
    for c in cambios[:4]:
        print("   ", c)


def regenerar(pid, ruta):
    for _ in range(3):
        try:
            emcp.call("emcp-tools-update-page-settings", {"post_id": pid,
                                                         "settings": {"hide_title": "yes"}})
            emcp.flush_css()
            time.sleep(2)
            emcp._session.get(emcp.BASE + ruta,
                              headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                              params={"cb": random.randint(1, 10**9)}, timeout=90)
            c = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                                  params={"cb": random.randint(1, 10**9)}, timeout=60)
            if c.status_code == 200:
                return
        except Exception:
            time.sleep(8)


RUTAS = {1872: "/como-configurar-correos-imap-pop3-gmail-android/",
         2183: "/configurar-cuentas-de-correo-imap-en-mozilla-thunderbird/"}

if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    for pid in POSTS:
        arreglar(pid)
    for pid, ruta in RUTAS.items():
        regenerar(pid, ruta)
    emcp.flush_css()
    print("OK h1 tutoriales")
