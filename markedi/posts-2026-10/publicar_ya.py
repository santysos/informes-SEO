#!/usr/bin/env python3
"""Publica de inmediato los 32 posts programados (pedido del usuario, 2026-10-05).

Fecha = ahora, un minuto entre cada uno, respetando el orden del calendario
(el primero del calendario queda como el más antiguo). Verifica por ID, sin caché.
"""
import base64, datetime as dt, json, os, re, time, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env")) if l.startswith("MARKEDI_") and "=" in l)
API = "https://www.markedi.ec/wp-json/wp/v2"
H = {"Authorization": "Basic " + base64.b64encode(f"{env['MARKEDI_WP_USER']}:{env['MARKEDI_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}

def call(method, path, body=None):
    req = urllib.request.Request(API + path, method=method, headers=H, data=json.dumps(body).encode() if body else None)
    return json.load(urllib.request.urlopen(req, timeout=90))

ids = [int(m) for m in re.findall(r"^\s+(\d+) \[", open(os.path.join(AQUI, "publicar.log")).read(), re.M)]
posts = call("GET", f"/posts?include={','.join(map(str, ids))}&per_page=100&status=future,publish&context=edit&_fields=id,slug,status,date&nc={int(time.time())}")
posts.sort(key=lambda p: p["date"])          # orden del calendario
ahora = dt.datetime.utcnow() - dt.timedelta(hours=5)   # hora de Ecuador
inicio = ahora - dt.timedelta(minutes=len(posts) + 1)
for i, p in enumerate(posts):
    if p["status"] == "publish":
        print(f"  {p['id']} ya publicado"); continue
    fecha = (inicio + dt.timedelta(minutes=i)).strftime("%Y-%m-%dT%H:%M:%S")
    r = call("POST", f"/posts/{p['id']}", {"status": "publish", "date": fecha})
    print(f"  {r['id']} [{r['status']}] {r['date']} {r['slug']}")
    time.sleep(8)

fin = call("GET", f"/posts?include={','.join(map(str, ids))}&per_page=100&status=future,publish&_fields=id,status&nc={int(time.time())}")
print("\nestados:", {s: sum(1 for p in fin if p["status"] == s) for s in {p["status"] for p in fin}})
