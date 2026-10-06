#!/usr/bin/env python3
"""Saca GA4, Search Console e inventario de posts/productos de lacasadelbandolin.com (data/ va a .gitignore)."""
import json, re, sys, time, urllib.request
sys.path.insert(0, "../../tracking")
from auth import servicio
PID = "properties/366860071"; SITE = "https://www.lacasadelbandolin.com/"
d = servicio("analyticsdata", "v1beta"); g = servicio("searchconsole", "v1")
def ga(body):
    r = d.properties().runReport(property=PID, body=body).execute()
    return [[v["value"] for v in x["dimensionValues"]] + [v["value"] for v in x["metricValues"]] for x in r.get("rows", [])]
Y = [{"startDate": "2025-10-01", "endDate": "2026-10-05"}]
out = {}
out["mes"] = ga({"dateRanges": Y, "dimensions": [{"name": "yearMonth"}], "metrics": [{"name": n} for n in ("sessions", "totalUsers", "engagedSessions", "transactions", "purchaseRevenue", "keyEvents")], "orderBys": [{"dimension": {"dimensionName": "yearMonth"}}]})
out["canal"] = ga({"dateRanges": Y, "dimensions": [{"name": "sessionDefaultChannelGroup"}], "metrics": [{"name": n} for n in ("sessions", "engagedSessions", "transactions", "purchaseRevenue")], "orderBys": [{"metric": {"metricName": "sessions"}, "desc": True}]})
out["eventos"] = ga({"dateRanges": Y, "dimensions": [{"name": "eventName"}], "metrics": [{"name": "eventCount"}, {"name": "totalUsers"}], "orderBys": [{"metric": {"metricName": "eventCount"}, "desc": True}]})
out["landing"] = ga({"dateRanges": Y, "dimensions": [{"name": "landingPage"}], "metrics": [{"name": n} for n in ("sessions", "engagedSessions", "transactions", "purchaseRevenue")], "orderBys": [{"metric": {"metricName": "sessions"}, "desc": True}], "limit": 60})
out["landing_organico"] = ga({"dateRanges": Y, "dimensions": [{"name": "landingPage"}], "metrics": [{"name": n} for n in ("sessions", "engagedSessions", "transactions", "purchaseRevenue")], "dimensionFilter": {"filter": {"fieldName": "sessionDefaultChannelGroup", "stringFilter": {"value": "Organic Search"}}}, "orderBys": [{"metric": {"metricName": "sessions"}, "desc": True}], "limit": 60})
out["productos_vendidos"] = ga({"dateRanges": Y, "dimensions": [{"name": "itemName"}], "metrics": [{"name": "itemsPurchased"}, {"name": "itemRevenue"}, {"name": "itemsViewed"}, {"name": "itemsAddedToCart"}], "orderBys": [{"metric": {"metricName": "itemRevenue"}, "desc": True}], "limit": 30})
out["pais_ciudad"] = ga({"dateRanges": Y, "dimensions": [{"name": "country"}, {"name": "city"}], "metrics": [{"name": "sessions"}, {"name": "transactions"}], "orderBys": [{"metric": {"metricName": "sessions"}, "desc": True}], "limit": 25})
out["dispositivo"] = ga({"dateRanges": Y, "dimensions": [{"name": "deviceCategory"}], "metrics": [{"name": "sessions"}, {"name": "transactions"}, {"name": "purchaseRevenue"}]})
a = servicio("analyticsadmin", "v1beta")
out["eventos_clave"] = [k["eventName"] for k in a.properties().keyEvents().list(parent=PID).execute().get("keyEvents", [])]
def gsc(dims, start="2025-10-01", end="2026-10-04", rows=5000, **kw):
    b = {"startDate": start, "endDate": end, "dimensions": dims, "rowLimit": rows}; b.update(kw)
    return g.searchanalytics().query(siteUrl=SITE, body=b).execute().get("rows", [])
out["gsc_pages"] = gsc(["page"]); out["gsc_queries"] = gsc(["query"])
out["gsc_pq"] = gsc(["page", "query"], start="2026-07-01", rows=25000)
out["gsc_mes"] = gsc(["date"], rows=500)
out["gsc_pais"] = gsc(["country"], rows=20)
UA = {"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/128"}
posts, page = [], 1
while True:
    r = urllib.request.urlopen(urllib.request.Request(f"{SITE}wp-json/wp/v2/posts?per_page=100&page={page}&_fields=id,slug,link,date,modified,title,content,categories,excerpt", headers=UA), timeout=90)
    lote = json.load(r); posts += lote
    if page >= int(r.headers.get("X-WP-TotalPages", 1)): break
    page += 1; time.sleep(2)
cats = {c["id"]: c["name"] for c in json.load(urllib.request.urlopen(urllib.request.Request(f"{SITE}wp-json/wp/v2/categories?per_page=100", headers=UA), timeout=60))}
inv = []
for p in posts:
    h = p["content"]["rendered"]; txt = re.sub(r"<[^>]+>", " ", h)
    inv.append({"id": p["id"], "link": p["link"], "date": p["date"][:10], "modified": p["modified"][:10], "title": re.sub(r"<[^>]+>", "", p["title"]["rendered"]),
                "palabras": len(txt.split()), "cats": [cats.get(c) for c in p["categories"]],
                "links_producto": len(re.findall(r'href="[^"]*/(producto|product|tienda|shop)/', h)), "links_internos": len(re.findall(r'href="https?://(www\.)?lacasadelbandolin\.com', h)),
                "wa": len(re.findall(r"wa\.me|whatsapp", h)), "h2": len(re.findall(r"<h2", h)), "img": len(re.findall(r"<img", h))})
out["posts"] = inv
prods, page = [], 1
while True:
    r = urllib.request.urlopen(urllib.request.Request(f"{SITE}wp-json/wc/store/v1/products?per_page=100&page={page}", headers=UA), timeout=90)
    lote = json.load(r); prods += [{"name": x["name"], "link": x["permalink"], "price": int(x["prices"]["price"]) / 10 ** x["prices"]["currency_minor_unit"], "stock": x["is_in_stock"], "cats": [c["name"] for c in x["categories"]], "desc_pal": len(re.sub(r"<[^>]+>", " ", x["description"]).split())} for x in lote]
    if page >= int(r.headers.get("X-WP-TotalPages", 1)): break
    page += 1; time.sleep(2)
out["productos"] = prods
json.dump(out, open("data/datos.json", "w"), ensure_ascii=False, indent=0)
print({k: len(v) for k, v in out.items()})
