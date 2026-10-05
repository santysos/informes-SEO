#!/usr/bin/env python3
"""Baja el contenido crudo (context=edit) de los 5 posts y lista sus H2 con la posición en palabras."""
import urllib.request, base64, json, os, re, time
ENV = os.path.join(os.path.dirname(os.path.abspath(__file__)), "..", "..", ".env")
env = dict(l.strip().split("=", 1) for l in open(ENV) if l.startswith("CH_") and "=" in l)
AUTH = base64.b64encode(f"{env['CH_WP_USER']}:{env['CH_WP_APP_PASS']}".encode()).decode()
H = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0"}
API = "https://comercialhidrobo.com/wp-json/wp/v2"
IDS = [11364, 8220, 8117, 8237, 8099]
os.makedirs("antes", exist_ok=True)
for pid in IDS:
    r = json.load(urllib.request.urlopen(urllib.request.Request(f"{API}/posts/{pid}?context=edit", headers=H), timeout=60))
    raw = r["content"]["raw"]
    open(f"antes/{pid}-{r['slug']}.html", "w").write(raw)
    plain = lambda t: len(re.sub(r"<[^>]+>", " ", t).split())
    tot = plain(raw)
    print(f"\n== {pid} {r['slug']} · {tot} palabras · elementor={'_elementor' in json.dumps(r.get('meta',{}))}")
    for m in re.finditer(r"<(h2|h3|table|figure)[^>]*>(.*?)</\1>", raw, re.S):
        tag = m.group(1)
        txt = re.sub(r"<[^>]+>", "", m.group(2))[:70] if tag in ("h2","h3") else "[" + tag + "]"
        print(f"  {plain(raw[:m.start()]):>5}  {tag}: {txt}")
    time.sleep(3)
