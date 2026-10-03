#!/usr/bin/env python3
"""Publica YA los 6 posts de la serie UAFE (que se subieron programados) y les agrega al final
un bloque «Sigue la serie» con enlaces a los otros cinco.

Decisión del 2-oct-2026: la demanda es urgente (30 días hábiles del SRI) y la serie se
refuerza enlazada completa desde el primer día. El ritmo se sostiene después con posts
nuevos, no goteando estos seis.

Los posts se publican con la fecha de hoy y minutos escalonados para conservar el orden de la
serie (el 1 es el más antiguo).
"""
import json
import os
import re
import time
from datetime import datetime, timedelta

import requests

from comun import SERIE, url

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env"))
           if "=" in l and not l.startswith("#"))
WP = env["CREATIVEWEB_WP_BASE"].rstrip("/")
AUTH = (env["CREATIVEWEB_WP_USER"], env["CREATIVEWEB_WP_APP_PASS"])
H = {"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 "
                   "(KHTML, like Gecko) Chrome/126 Safari/537.36"}
MARCA = "cw-serie-uafe"

TITULOS = {
    "que-correo-pide-la-uafe": "Qué correo pide la UAFE para registrar al oficial de cumplimiento",
    "sujeto-obligado-uafe-como-saber": "¿Mi negocio es sujeto obligado a la UAFE? Cómo saberlo",
    "ruc-suspendido-uafe-que-hacer": "RUC suspendido por no registrarse en la UAFE: qué hacer",
    "oficial-de-cumplimiento-uafe-requisitos": "Oficial de cumplimiento UAFE: quién puede ser y qué te piden",
    "codigo-de-registro-uafe-requisitos": "Código de registro UAFE: lo que tienes que tener listo",
    "uafe-contadores-abogados": "Contadores y abogados ante la UAFE",
}


def call(method, path, **kw):
    for i in range(4):
        try:
            r = requests.request(method, WP + path, auth=AUTH, headers=H, timeout=90, **kw)
            time.sleep(5)
            return r
        except requests.RequestException as e:
            print("  red:", e, "· reintento en 60 s")
            time.sleep(60)
    raise RuntimeError(path)


def bloque_serie(actual):
    items = "".join(
        f'<!-- wp:list-item -->\n<li><a href="{url(s)}">{TITULOS[s]}</a></li>\n<!-- /wp:list-item -->\n'
        for s in SERIE if s != actual)
    return (f'\n\n<!-- wp:group {{"className":"{MARCA}"}} -->\n<div class="wp-block-group {MARCA}">'
            '<!-- wp:heading -->\n<h2 class="wp-block-heading">Sigue la serie sobre la UAFE</h2>\n'
            '<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul class="wp-block-list">\n'
            f'{items}</ul>\n<!-- /wp:list --></div>\n<!-- /wp:group -->')


def main():
    base = datetime.now().replace(second=0, microsecond=0) - timedelta(minutes=70)
    for n, slug in enumerate(SERIE):
        r = call("GET", "/posts", params={"slug": slug, "status": "future,publish",
                                          "context": "edit", "_fields": "id,status,content"})
        posts = r.json()
        if len(posts) != 1:
            print(f"!! {slug}: {len(posts)} resultados, lo salto")
            continue
        p = posts[0]
        raw = p["content"]["raw"]
        if MARCA in raw:
            raw = re.sub(r'\n*<!-- wp:group \{"className":"' + MARCA + r'"\}.*?<!-- /wp:group -->',
                         "", raw, flags=re.S)
        raw += bloque_serie(slug)
        fecha = (base + timedelta(minutes=10 * n)).strftime("%Y-%m-%dT%H:%M:%S")
        r = call("POST", f"/posts/{p['id']}", json={"status": "publish", "date": fecha,
                                                     "content": raw})
        j = r.json()
        print(f"{p['id']} {slug}: {r.status_code} {j.get('status')} {j.get('date')} {j.get('link')}")


if __name__ == "__main__":
    main()
