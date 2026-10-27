#!/usr/bin/env python3
"""Publica la tanda con fechas pasadas: un artículo por día, del 6 al 25 de octubre (08:00 Ecuador)."""
import datetime as dt, json, warnings
warnings.filterwarnings("ignore")
from publish_batch import req, LOG

INICIO = dt.datetime(2026, 10, 6, 13, 0)   # 08:00 Ecuador
log = json.load(open(LOG))
for n, info in sorted(log.items(), key=lambda x: int(x[0])):
    fecha = INICIO + dt.timedelta(days=int(n) - 1)
    p = req(f"/wp/v2/posts/{info['id']}", "POST", {"status": "publish", "date_gmt": fecha.strftime("%Y-%m-%dT%H:%M:%S")})
    info.update(status=p["status"], fecha_utc=fecha.isoformat(), link=p["link"])
    json.dump(log, open(LOG, "w"), ensure_ascii=False, indent=1)
    print(f"[{n}] {p['status']} {fecha:%d-%b} {p['link']}", flush=True)
