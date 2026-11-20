#!/usr/bin/env python3
"""Bionext 2026-11-20.

1. bionext.com.ec: instala Redirection y crea 301 para las 2 categorías que el sitio nuevo
   (oct-2026) dejó en 404 y que todavía tenían impresiones en Google.
2. bionext.en-otavalo.com (copia de pruebas, indexable): noindex con Code Snippets.
   Se revierte desactivando el fragmento «noindex copia de pruebas».
"""
import base64, json, os, re, time, urllib.error, urllib.request

ENV = dict(re.findall(r"^([A-Z0-9_]+)=(.*)$", open(os.path.join(os.path.dirname(__file__), "../../.env")).read(), re.M))
AUTH = "Basic " + base64.b64encode(f"{ENV['BIONEXT_WP_USER']}:{ENV['BIONEXT_WP_APP_PASS']}".encode()).decode()
PROD, COPIA = "https://www.bionext.com.ec", "https://bionext.en-otavalo.com"
MAPA = {
    "/categoria-producto/elicitores-generadores-de-autodefensas/": "/categoria-producto/elicitores-autodefensas/",
    "/categoria-producto/enmiendas-y-acondicionadores-de-suelo/": "/categoria-producto/enmiendas-suelo/",
}


def api(base, path, data=None):
    req = urllib.request.Request(
        base + "/wp-json" + path,
        data=json.dumps(data).encode() if data is not None else None,
        headers={"Authorization": AUTH, "User-Agent": "Mozilla/5.0 Chrome/141", "Content-Type": "application/json"},
        method="POST" if data is not None else "GET")
    try:
        return json.load(urllib.request.urlopen(req, timeout=180))
    except urllib.error.HTTPError as e:
        return {"_error": e.code, "_body": e.read()[:300].decode("utf8", "replace")}


def status(url):
    class NoRedirect(urllib.request.HTTPRedirectHandler):
        def redirect_request(self, *a, **k):
            return None
    try:
        r = urllib.request.build_opener(NoRedirect).open(
            urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"}), timeout=60)
        return r.status, ""
    except urllib.error.HTTPError as e:
        return e.code, e.headers.get("Location", "")


def activar_plugin(base, slug):
    instalados = {p["plugin"]: p["status"] for p in api(base, "/wp/v2/plugins")}
    ya = [k for k in instalados if k.startswith(slug + "/")]
    if ya:
        r = api(base, f"/wp/v2/plugins/{ya[0]}", {"status": "active"})
    else:
        r = api(base, "/wp/v2/plugins", {"slug": slug, "status": "active"})
    print(base, slug, r.get("status") or r)


def redirecciones():
    for d in MAPA.values():
        assert status(PROD + d)[0] == 200, f"destino no responde 200: {d}"
    activar_plugin(PROD, "redirection")
    for _ in range(8):
        r = api(PROD, "/redirection/v1/plugin/data", {"upgrade": "retry"})
        print("instalación Redirection:", str(r)[:100])
        if "finish" in str(r):
            break
        time.sleep(3)
    existentes = {x["url"] for x in api(PROD, "/redirection/v1/redirect?per_page=200").get("items", [])}
    for o, d in MAPA.items():
        if o not in existentes:
            r = api(PROD, "/redirection/v1/redirect", {
                "url": o, "match_type": "url", "action_type": "url", "action_code": 301,
                "group_id": 1, "action_data": {"url": d}})
            print("creada" if "_error" not in r else r, o)
    for o in MAPA:
        print(status(PROD + o), o)


def noindex_copia():
    activar_plugin(COPIA, "code-snippets")
    codigo = ("add_filter('wp_robots', 'wp_robots_no_robots');\n"
              "add_action('send_headers', function () { header('X-Robots-Tag: noindex, nofollow', true); });")
    lista = api(COPIA, "/code-snippets/v1/snippets")
    if any("noindex copia" in s.get("name", "") for s in lista if isinstance(s, dict)):
        print("fragmento ya existe")
        return
    r = api(COPIA, "/code-snippets/v1/snippets", {
        "name": "noindex copia de pruebas (Creative Web)", "code": codigo, "scope": "global", "active": True})
    print("fragmento", r.get("id") or r)


if __name__ == "__main__":
    redirecciones()
    noindex_copia()
