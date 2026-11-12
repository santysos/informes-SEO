#!/usr/bin/env python3
"""Consolidación de posts canibalizados — recuperación nov-2026.

Para cada post absorbido: (1) crea el 301 hacia el pilar con Redirection, (2) pasa el
post a borrador, (3) verifica en vivo que la URL vieja responde 301 → destino 200.
Después reemplaza en todos los posts publicados los enlaces internos a las URLs viejas.

El contenido útil de cada absorbido ya se trasplantó al pilar antes (pilar_*.py).

Uso:  python3 consolidar.py --dry-run   |   python3 consolidar.py
"""
import json, sys, time, urllib.request, urllib.error
from pilar_electricos import H, BASE

S = BASE
MAPA = [  # (id absorbido, url vieja, url destino)
    (9609, "/chery/marcas-de-autos-chinos-en-ecuador/",
     "/marcas-chinas-y-comparativas/marcas-de-autos-chinos-mas-confiables-en-ecuador/"),
    (9491, "/marcas-chinas-y-comparativas/autos-chinos-en-ecuador-calidad-durabilidad/",
     "/marcas-chinas-y-comparativas/marcas-de-autos-chinos-mas-confiables-en-ecuador/"),
    (9415, "/vehiculos-electricos-e-hibridos/autos-hibridos-y-electricos-en-ecuador/",
     "/vehiculos-electricos-e-hibridos/autos-electricos-en-ecuador-2025/"),
]
DRY = "--dry-run" in sys.argv

def api(method, path, body=None):
    req = urllib.request.Request(S + "/wp-json" + path, data=json.dumps(body).encode() if body is not None else None,
                                 headers=H, method=method)
    for intento in range(3):
        try:
            r = urllib.request.urlopen(req, timeout=120)
            return json.loads(r.read() or b"{}")
        except urllib.error.HTTPError:
            raise
        except Exception as e:
            print("   red:", e, "→ espero 90 s"); time.sleep(90)
    raise SystemExit("sin conexión")

class NoRedirect(urllib.request.HTTPRedirectHandler):
    def redirect_request(self, *a, **k): return None

def estado(url):
    op = urllib.request.build_opener(NoRedirect)
    try:
        r = op.open(urllib.request.Request(url, headers={"User-Agent": H["User-Agent"]}), timeout=60)
        return r.getcode(), None
    except urllib.error.HTTPError as e:
        return e.code, e.headers.get("Location")

def main():
    existentes = {r["url"] for r in api("GET", "/redirection/v1/redirect?per_page=200").get("items", [])}
    for pid, vieja, destino in MAPA:
        print(f"\n{pid}: {vieja} → {destino}")
        if estado(S + destino)[0] != 200:
            sys.exit(f"   el destino no responde 200, no se redirige")
        if DRY: continue
        if vieja not in existentes:
            api("POST", "/redirection/v1/redirect", {"url": vieja, "action_data": {"url": destino}, "action_type": "url",
                                                    "action_code": 301, "match_type": "url", "group_id": 1,
                                                    "title": "Consolidación nov-2026"})
            print("   301 creado"); time.sleep(8)
        api("POST", f"/wp/v2/posts/{pid}", {"status": "draft"}); print("   post a borrador"); time.sleep(8)
        c, loc = estado(S + vieja)
        print(f"   verificación: {c} → {loc}")

    # Enlaces internos que apuntan a las URLs viejas
    print("\nEnlaces internos:")
    posts, pagina = [], 1
    while True:
        lote = api("GET", f"/wp/v2/posts?status=publish&per_page=20&page={pagina}&context=edit&_fields=id,content")
        posts += lote
        print(f"   página {pagina}: {len(lote)} posts", flush=True)
        if len(lote) < 20: break
        pagina += 1; time.sleep(8)
    for post in posts:
        raw = post["content"]["raw"]; nuevo = raw
        for _, vieja, destino in MAPA:
            nuevo = nuevo.replace(S + vieja, S + destino).replace(S + vieja.rstrip("/") + '"', S + destino + '"')
        if nuevo != raw:
            print(f"   post {post['id']}: " + ("tiene enlaces a URLs viejas" if DRY else "enlaces actualizados"))
            if not DRY:
                json.dump({"id": post["id"], "raw": raw}, open(f"antes/enlaces-{post['id']}.json", "w"), ensure_ascii=False)
                api("POST", f"/wp/v2/posts/{post['id']}", {"content": nuevo}); time.sleep(12)
    print(f"\n{len(posts)} posts publicados revisados.")

if __name__ == "__main__":
    main()
