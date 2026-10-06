#!/usr/bin/env python3
"""Revisa el código HTTP de todas las URLs que Google conoce de dimaparecuador.com
(Search Console 2026 + sitemaps). Una por segundo, sin seguir redirecciones."""
import json, re, time, urllib.request, urllib.error
UA = "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)"
class NoRedir(urllib.request.HTTPRedirectHandler):
    def redirect_request(self, *a, **k): return None
op = urllib.request.build_opener(NoRedir)
def get(u, t=30):
    t0 = time.time()
    try:
        r = op.open(urllib.request.Request(u, headers={"User-Agent": UA}), timeout=t); return r.status, round(time.time()-t0, 2), r.headers.get("Location")
    except urllib.error.HTTPError as e: return e.code, round(time.time()-t0, 2), e.headers.get("Location")
    except Exception as e: return f"ERR {type(e).__name__}", round(time.time()-t0, 2), None
urls = set(json.load(open("urls-gsc.json")))
idx = urllib.request.urlopen(urllib.request.Request("https://www.dimaparecuador.com/sitemap_index.xml", headers={"User-Agent": UA}), timeout=30).read().decode()
for sm in re.findall(r"<loc>([^<]+)</loc>", idx):
    x = urllib.request.urlopen(urllib.request.Request(sm, headers={"User-Agent": UA}), timeout=60).read().decode()
    urls |= set(re.findall(r"<loc>([^<]+)</loc>", x)); time.sleep(1)
urls = sorted(u for u in urls if "/wp-content/" not in u)
res = {}
for i, u in enumerate(urls):
    res[u] = get(u); time.sleep(1)
    if i % 50 == 0: print(i, len(urls), flush=True)
json.dump(res, open("estado-urls.json", "w"), indent=0)
from collections import Counter
print(Counter(str(v[0]) for v in res.values()))
