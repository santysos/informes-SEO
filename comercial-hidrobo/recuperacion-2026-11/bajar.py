#!/usr/bin/env python3
"""Baja (respaldo) los posts de los clusters que cayeron: eléctricos y autos chinos."""
import base64, json, os, re, time, urllib.request
AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "../../.env")) if "=" in l and not l.startswith("#"))
AUTH = base64.b64encode(f"{env['CH_WP_USER']}:{env['CH_WP_APP_PASS']}".encode()).decode()
H = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120.0 Safari/537.36"}
BASE = "https://www.comercialhidrobo.com/wp-json/wp/v2"
SLUGS = ["autos-electricos-en-ecuador-2025", "autos-hibridos-y-electricos-en-ecuador",
         "auto-electrico-mas-barato-ecuador-2026",
         "marcas-de-autos-chinos-mas-confiables-en-ecuador", "marcas-de-autos-chinos-en-ecuador",
         "mejor-marca-china-calidad-precio-en-ecuador", "autos-chinos-en-ecuador-calidad-durabilidad"]
def get(u):
    return json.loads(urllib.request.urlopen(urllib.request.Request(u, headers=H), timeout=60).read())
for s in SLUGS:
    r = get(f"{BASE}/posts?slug={s}&context=edit&status=publish")
    if not r: print("NO", s); continue
    p = r[0]
    json.dump(p, open(os.path.join(AQUI, "antes", f"{p['id']}-{s}.json"), "w"), ensure_ascii=False, indent=1)
    txt = re.sub(r"<[^>]+>", " ", p["content"]["raw"]); words = len(txt.split())
    m = p.get("meta", {}) or {}
    print(f"{p['id']} | {s} | pub {p['date'][:10]} mod {p['modified'][:10]} | {words} pal\n   H1: {p['title']['raw']}\n   SEO: {m.get('_yoast_wpseo_title')}\n   META: {m.get('_yoast_wpseo_metadesc')}")
    time.sleep(8)
