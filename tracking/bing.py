#!/usr/bin/env python3
"""Bing Webmaster Tools contra Google Search Console, sitio por sitio.

Uso (desde tracking/):
    ../.venv/bin/python bing.py                     # todos los sitios de Bing
    ../.venv/bin/python bing.py denti-lab quipuy    # solo los que contengan esos textos
    ../.venv/bin/python bing.py --consultas denti-lab   # además, las consultas de Bing

La clave va en .env como BING_WMT_API_KEY (una para todos los sitios; se genera en
Bing Webmaster → engranaje → API access). Los 42 sitios se importaron desde Search
Console el 2026-11-27; Bing tarda ~48 h en mostrar datos tras el alta.

Compara los mismos días en los dos buscadores. Lo que se mira:
- clics de Bing como % de los de Google (el post de AppGrabbit: en LatAm, casi 1:1);
- % de clics de marca en cada buscador (allá: 17 % en Bing contra 60 % en Google).
"""
import json, os, re, sys, urllib.parse, urllib.request
from datetime import date, datetime, timezone

sys.path.insert(0, os.path.dirname(__file__))
from auth import servicio

RAIZ = os.path.join(os.path.dirname(__file__), "..")
ENV = dict(re.findall(r"^([A-Z0-9_]+)=(.*)$", open(os.path.join(RAIZ, ".env")).read(), re.M))
KEY = ENV["BING_WMT_API_KEY"].strip()


def bing(metodo, sitio=None):
    q = {"apikey": KEY}
    if sitio:
        q["siteUrl"] = sitio
    url = f"https://ssl.bing.com/webmaster/api.svc/json/{metodo}?" + urllib.parse.urlencode(q)
    return json.load(urllib.request.urlopen(url, timeout=90))["d"]


def fecha(v):
    """Bing devuelve /Date(1732600000000-0800)/."""
    ms = int(re.search(r"-?\d+", v).group())
    return datetime.fromtimestamp(ms / 1000, timezone.utc).date()


def raiz_dominio(url):
    h = urllib.parse.urlparse(url).netloc.removeprefix("www.")
    return h.split(".")[0]


def propiedad_gsc(url_bing, propiedades):
    dom = urllib.parse.urlparse(url_bing).netloc.removeprefix("www.")
    for p in propiedades:  # preferir la de dominio, que ve todo el tráfico
        if p == f"sc-domain:{dom}":
            return p
    for p in propiedades:
        if urllib.parse.urlparse(p).netloc.removeprefix("www.") == dom:
            return p
    return None


def es_marca(consulta, marca):
    c = consulta.replace(" ", "").replace("-", "").lower()
    return marca.replace("-", "") in c


def main():
    args = [a for a in sys.argv[1:] if not a.startswith("--")]
    ver_consultas = "--consultas" in sys.argv
    gsc = servicio("searchconsole", "v1")
    propiedades = [s["siteUrl"] for s in gsc.sites().list().execute()["siteEntry"]]
    sitios = [s["Url"] for s in bing("GetUserSites")]
    if args:
        sitios = [s for s in sitios if any(a in s for a in args)]

    print(f"{'sitio':32} {'días':>4} {'clics B':>8} {'clics G':>8} {'B/G':>6} {'impr B':>8} {'impr G':>9} {'marca B':>8} {'marca G':>8}")
    for s in sitios:
        dias = bing("GetRankAndTrafficStats", s)
        if not dias:
            print(f"{s:32} sin datos en Bing todavía")
            continue
        fechas = sorted(fecha(d["Date"]) for d in dias)
        ini, fin = fechas[0], fechas[-1]
        cb = sum(d["Clicks"] for d in dias)
        ib = sum(d["Impressions"] for d in dias)

        marca = raiz_dominio(s)
        qb = bing("GetQueryStats", s)
        mb = sum(q["Clicks"] for q in qb if es_marca(q["Query"], marca))
        tb = sum(q["Clicks"] for q in qb) or 1

        p = propiedad_gsc(s, propiedades)
        cg = ig = 0
        mg_txt = "—"
        if p:
            cuerpo = {"startDate": str(ini), "endDate": str(fin), "dimensions": ["page"], "rowLimit": 25000}
            filas = gsc.searchanalytics().query(siteUrl=p, body=cuerpo).execute().get("rows", [])
            cg = sum(r["clicks"] for r in filas)
            ig = sum(r["impressions"] for r in filas)
            cuerpo["dimensions"] = ["query"]
            fq = gsc.searchanalytics().query(siteUrl=p, body=cuerpo).execute().get("rows", [])
            tg = sum(r["clicks"] for r in fq) or 1
            mg_txt = f"{100 * sum(r['clicks'] for r in fq if es_marca(r['keys'][0], marca)) / tg:.0f} %"
        ratio = f"{100 * cb / cg:.0f} %" if cg else "—"
        print(f"{s.split('//')[1].removeprefix('www.').rstrip('/'):32} {(fin - ini).days + 1:>4} {cb:>8} {cg:>8.0f} {ratio:>6} "
              f"{ib:>8} {ig:>9.0f} {100 * mb / tb:>6.0f} % {mg_txt:>8}")

        if ver_consultas:
            for q in sorted(qb, key=lambda q: -q["Impressions"])[:20]:
                print(f"    {q['Clicks']:>4} {q['Impressions']:>6}  pos {q['AvgImpressionPosition']:>5.1f}  {q['Query']}")
    print(f"\nRango: el que Bing tiene de cada sitio. Generado {date.today()}.")


if __name__ == "__main__":
    main()
