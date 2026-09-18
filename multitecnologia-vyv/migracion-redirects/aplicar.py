#!/usr/bin/env python3
"""Aplica las redirecciones de la migración de Multitecnología VYV.

Lee mapa-redirecciones.json, instala/activa el plugin Redirection por API,
crea las tablas y carga las 301 (específicas + regex). Idempotente: no duplica
las que ya existen.

Requiere en .env del repo:
  MVYV_WP_BASE=https://multitecnologiavyv.com/wp-json/wp/v2
  MVYV_WP_USER=<admin>
  MVYV_WP_APP_PASS=<application password>
"""
import json, time, base64, urllib.request, urllib.error, os, sys

ROOT = os.path.dirname(os.path.abspath(__file__))
ENV = os.path.join(ROOT, "..", "..", ".env")

def env():
    d = {}
    for l in open(ENV):
        l = l.strip()
        if l.startswith("MVYV_WP") and "=" in l:
            k, v = l.split("=", 1); d[k] = v
    return d

def main():
    e = env()
    user, pw = e.get("MVYV_WP_USER"), e.get("MVYV_WP_APP_PASS")
    if not user or not pw:
        sys.exit("Faltan MVYV_WP_USER / MVYV_WP_APP_PASS en .env")
    wpbase = e.get("MVYV_WP_BASE", "https://multitecnologiavyv.com/wp-json/wp/v2")
    root = wpbase.rsplit("/wp/v2", 1)[0]
    auth = base64.b64encode(f"{user}:{pw}".encode()).decode()
    H = {"Authorization": f"Basic {auth}", "User-Agent": "Mozilla/5.0", "Content-Type": "application/json"}

    def call(method, url, body=None):
        data = json.dumps(body).encode() if body is not None else None
        req = urllib.request.Request(url, data=data, headers=H, method=method)
        return json.loads(urllib.request.urlopen(req, timeout=45).read() or "{}")

    # 1) instalar + activar Redirection
    try:
        call("POST", f"{wpbase}/plugins", {"slug": "redirection", "status": "active"})
        print("Redirection instalado/activado")
    except urllib.error.HTTPError as ex:
        print("plugins:", ex.code, ex.read()[:120])
    # 2) crear tablas (repetir hasta finish-install)
    for _ in range(6):
        try:
            r = call("POST", f"{root}/redirection/v1/plugin/data", {"upgrade": "retry"})
            st = json.dumps(r)[:80]; print("  db:", st)
            if "finish-install" in json.dumps(r) or r.get("status") == "ok": break
        except Exception as ex:
            print("  db err:", str(ex)[:80])
        time.sleep(2)

    # 3) cargar redirecciones
    m = json.load(open(os.path.join(ROOT, "mapa-redirecciones.json")))
    def crear(src, dest, regex=False):
        body = {"url": src, "action_type": "url", "action_code": 301,
                "action_data": {"url": dest}, "match_type": "url",
                "regex": bool(regex), "group_id": 1}
        call("POST", f"{root}/redirection/v1/redirect", body)

    ok = 0
    for r in m["especificas"]:
        try:
            crear(r["de"], r["a"], regex=False); ok += 1
            print(f"  [{ok}] {r['de']} → {r['a']}")
            time.sleep(1.2)
        except Exception as ex:
            print(f"  ERR {r['de']}: {str(ex)[:90]}"); time.sleep(3)
    for r in m["regex"]:
        try:
            crear(r["de"], r["a"], regex=True); print(f"  [regex] {r['de']} → {r['a']}")
            time.sleep(1.2)
        except Exception as ex:
            print(f"  ERR regex {r['de']}: {str(ex)[:90]}")
    print(f"\nListo: {ok} específicas + {len(m['regex'])} regex.")

if __name__ == "__main__":
    main()
