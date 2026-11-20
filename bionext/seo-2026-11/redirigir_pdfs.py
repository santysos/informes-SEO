#!/usr/bin/env python3
"""301 de las 27 hojas técnicas del sitio viejo (/2021/07/HT_*.pdf, 404 desde oct-2026) a sus PDF nuevos (/2026/09/)."""
import json, os, sys
sys.path.insert(0, os.path.dirname(__file__))
from arreglos import api, status, PROD

mapa = json.load(open(os.path.join(os.path.dirname(__file__), "mapa-pdf.json")))
existentes = {x["url"] for x in api(PROD, "/redirection/v1/redirect?per_page=200").get("items", [])}
for viejo, v in sorted(mapa.items(), key=lambda x: -x[1]["imp"]):
    destino = v["pdf"].replace("https://www.bionext.com.ec", "")
    if viejo not in existentes:
        r = api(PROD, "/redirection/v1/redirect", {"url": viejo, "match_type": "url", "action_type": "url",
              "action_code": 301, "group_id": 1, "action_data": {"url": destino}})
        if "_error" in r:
            print("ERROR", viejo, r); continue
    c, loc = status(PROD + viejo)
    print(c, viejo.split("/")[-1], "->", loc.split("/")[-1])
