#!/usr/bin/env python3
"""Publica las 51 descripciones de producto de despues/ (respaldo previo en ../productos-admin.json)."""
import base64, glob, json, os, sys, time, urllib.request, urllib.error
AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", "..", ".env")) if l.startswith("BANDOLIN") and "=" in l)
H = {"Authorization": "Basic " + base64.b64encode(f"{env['BANDOLIN_WP_USER']}:{env['BANDOLIN_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}
for r in sorted(glob.glob(os.path.join(AQUI, "despues", "*.json"))):
    p = json.load(open(r))
    for i in range(3):
        try:
            res = json.load(urllib.request.urlopen(urllib.request.Request(f"https://www.lacasadelbandolin.com/wp-json/wc/v3/products/{p['id']}",
                  headers=H, method="PUT", data=json.dumps({"description": p["description"]}).encode()), timeout=120))
            print(p["id"], "OK", res["name"][:50]); break
        except Exception as e:
            print(p["id"], "reintento", e); time.sleep(15)
    time.sleep(2)
