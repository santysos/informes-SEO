#!/usr/bin/env python3
"""Publica los 10 posts corregidos de Dimapar (despues/*.json) — 2026-10-06.

Actualiza cada borrador (IDs 496-505) con el contenido revisado, título y metas de Yoast,
imagen destacada = foto del producto principal, y lo publica con fecha de hoy (un minuto
entre cada uno). Revalida antes de escribir; si algún post no pasa, no publica nada.

    python3 publicar.py --dry-run
    python3 publicar.py
"""
import base64, datetime as dt, glob, json, os, sys, time, urllib.request
from validar import validar

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env")) if l.startswith("DIMAPAR") and "=" in l)
H = {"Authorization": "Basic " + base64.b64encode(f"{env['DIMAPAR_WP_USER']}:{env['DIMAPAR_WP_APP_PASS']}".encode()).decode(),
     "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128", "Content-Type": "application/json"}
API = "https://www.dimaparecuador.com/wp-json/wp/v2"
cache = json.load(open(os.path.join(AQUI, "productos-cache.json")))


def call(m, p, b=None):
    req = urllib.request.Request(API + p, method=m, headers=H, data=json.dumps(b).encode() if b else None)
    return json.load(urllib.request.urlopen(req, timeout=120))


def main():
    dry = "--dry-run" in sys.argv
    posts = [json.load(open(r)) for r in sorted(glob.glob(os.path.join(AQUI, "despues", "*.json")))]
    if len(posts) != 10:
        sys.exit(f"hay {len(posts)} posts en despues/, se esperan 10")
    malos = [p["id"] for p in posts if validar(p)[0]]
    if malos:
        sys.exit(f"no pasan la validación: {malos}")
    ahora = dt.datetime.now(dt.timezone.utc) - dt.timedelta(hours=5)
    inicio = ahora - dt.timedelta(minutes=len(posts) + 1)
    for i, p in enumerate(sorted(posts, key=lambda x: x["id"])):
        img = cache[p["producto_portada"]]["img"]
        fecha = (inicio + dt.timedelta(minutes=i)).strftime("%Y-%m-%dT%H:%M:%S")
        body = {"title": p["title"], "content": p["content"], "status": "publish", "date": fecha,
                "meta": {"_yoast_wpseo_title": p["yoast_title"], "_yoast_wpseo_metadesc": p["yoast_desc"]}}
        if img:
            body["featured_media"] = img
        print(f"{p['id']} · {fecha} · img {img} · {p['title'][:70]}")
        if not dry:
            r = call("POST", f"/posts/{p['id']}", body)
            print(f"   → {r['status']} {r['link']}")
            time.sleep(6)


if __name__ == "__main__":
    main()
