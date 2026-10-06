#!/usr/bin/env python3
"""URL Inspection API de Search Console para las URLs de Dimapar: estado de rastreo según Google."""
import json, sys, time
sys.path.insert(0, "../../tracking")
from auth import servicio
g = servicio("searchconsole", "v1"); site = "https://www.dimaparecuador.com/"
urls = json.load(open("urls-gsc.json"))
out = {}
for i, u in enumerate(urls):
    for intento in range(3):
        try:
            r = g.urlInspection().index().inspect(body={"inspectionUrl": u, "siteUrl": site}).execute()
            ir = r["inspectionResult"]["indexStatusResult"]
            out[u] = {k: ir.get(k) for k in ("verdict", "coverageState", "pageFetchState", "lastCrawlTime", "robotsTxtState", "indexingState", "googleCanonical")}
            break
        except Exception as e:
            out[u] = {"error": str(e)[:200]}; time.sleep(5)
    if i % 50 == 0:
        print(i, len(urls), flush=True); json.dump(out, open("inspeccion.json", "w"), indent=0)
    time.sleep(0.3)
json.dump(out, open("inspeccion.json", "w"), indent=0)
from collections import Counter
print(Counter(v.get("pageFetchState") for v in out.values()))
print(Counter(v.get("coverageState") for v in out.values()))
