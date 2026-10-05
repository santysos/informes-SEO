#!/usr/bin/env python3
"""Lista los posts con el bloque de reserva de taller y propone dónde va el CTA temprano."""
import urllib.request, base64, json, os, re, time
AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env")) if l.startswith("CH_") and "=" in l)
AUTH = base64.b64encode(f"{env['CH_WP_USER']}:{env['CH_WP_APP_PASS']}".encode()).decode()
H = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0"}
API = "https://comercialhidrobo.com/wp-json/wp/v2"
todos, pag = [], 1
while True:
    req = urllib.request.Request(f"{API}/posts?context=edit&per_page=100&page={pag}&status=publish&_fields=id,slug,title,content,link", headers=H)
    try: r = urllib.request.urlopen(req, timeout=120)
    except urllib.error.HTTPError as e:
        if e.code == 400: break
        raise
    lote = json.load(r); todos += lote
    if pag >= int(r.headers.get("X-WP-TotalPages", 1)): break
    pag += 1; time.sleep(4)
pal = lambda t: len(re.sub(r"<[^>]+>", " ", t).split())
sel = []
for p in todos:
    raw = p["content"]["raw"]
    if "solicitar-cita-taller-mecanico" not in raw and "593996390233" not in raw: continue
    if "Agende su cita de taller" not in raw and "agendar" not in raw.lower(): continue
    tot = pal(raw)
    h2s = [(pal(raw[:m.start()]), re.sub(r"<[^>]+>", "", m.group(1)).strip())
           for m in re.finditer(r"<!-- wp:heading -->\s*<h2[^>]*>(.*?)</h2>", raw, re.S)]
    sel.append(dict(id=p["id"], slug=p["slug"], title=p["title"]["raw"], link=p["link"], palabras=tot,
                    tiene_cta="cta-temprano-v1" in raw, h2=h2s))
json.dump(sel, open("inventario.json", "w"), ensure_ascii=False, indent=1)
print(len(todos), "posts publicados ·", len(sel), "con bloque de reserva")
for s in sel:
    print(f"\n{s['id']} {s['slug']} · {s['palabras']}p {'[YA]' if s['tiene_cta'] else ''}")
    for w, t in s["h2"]: print(f"   {w:>5} {t[:75]}")
