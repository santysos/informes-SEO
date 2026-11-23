#!/usr/bin/env python3
"""Agrega el bloque ampliado (fichas/<slug>.html) al final de la descripción de los productos de antes/ (o los slugs pasados como argumento) y fija título y
meta de Yoast. Respaldo previo en antes/. Idempotente: marca <!-- cw-ficha-ampliada-v1 -->."""
import glob, json, os, re, sys
sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
from arreglos import api, PROD
AQUI = os.path.dirname(os.path.abspath(__file__))
MARCA = "<!-- cw-ficha-ampliada-v1 -->"
SOLO = set(sys.argv[1:])  # slugs a publicar; vacío = todos
for f in sorted(glob.glob(os.path.join(AQUI, "antes", "producto-*.json"))):
    a = json.load(open(f)); slug, pid = a["slug"], a["id"]
    if SOLO and slug not in SOLO:
        continue
    bloque = open(os.path.join(AQUI, "fichas", slug + ".html")).read().strip()
    meta = json.load(open(os.path.join(AQUI, "fichas", slug + ".json")))
    actual = api(PROD, f"/wc/v3/products/{pid}?_fields=description")["description"]
    if MARCA in actual:
        actual = actual.split(MARCA)[0].rstrip()
    nuevo = actual + "\n\n" + MARCA + "\n" + bloque
    r = api(PROD, f"/wc/v3/products/{pid}", {"description": nuevo, "meta_data": [
        {"key": "_yoast_wpseo_title", "value": meta["meta_title"]},
        {"key": "_yoast_wpseo_metadesc", "value": meta["meta_desc"]}]})
    print(slug, "ERROR " + str(r) if "_error" in r else "ok", len(re.sub("<[^>]+>", " ", r.get("description", "")).split()), "palabras")
