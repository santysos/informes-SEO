#!/usr/bin/env python3
"""Publica en markedi.ec los payloads de posts/ (generados por construir.py).

    python3 publicar.py --dry-run   # muestra qué subiría, sin escribir
    python3 publicar.py             # publica (programados, status future)

Protecciones aprendidas en OKCars y Odontología Life:
- Duplicados: lee los slugs existentes estado por estado y paginando
  (status=any no devuelve los programados).
- Timeout: si un POST se corta, busca el slug antes de reintentar; el post
  pudo haberse creado igual.
- Relanzable: salta los slugs que ya están en el sitio.
- Sin curl. Pausas de 8 s entre llamadas y 25 s entre posts.
"""
import base64, glob, json, os, sys, time, urllib.error, urllib.parse, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env"))
           if l.startswith("MARKEDI_") and "=" in l)
API = "https://www.markedi.ec/wp-json/wp/v2"
AUTH = "Basic " + base64.b64encode(f"{env['MARKEDI_WP_USER']}:{env['MARKEDI_WP_APP_PASS']}".encode()).decode()
UA = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/128 Safari/537.36"
DELAY, DELAY_POST, BACKOFF = 8, 25, 90
_ultimo = 0.0


def call(method, path, body=None, params=None, espera=DELAY):
    global _ultimo
    url = API + path + ("?" + urllib.parse.urlencode(params) if params else "")
    for intento in range(4):
        gap = time.time() - _ultimo
        if gap < espera:
            time.sleep(espera - gap)
        req = urllib.request.Request(url, method=method, data=json.dumps(body).encode() if body else None,
                                     headers={"Authorization": AUTH, "User-Agent": UA,
                                              "Content-Type": "application/json"})
        try:
            with urllib.request.urlopen(req, timeout=90) as r:
                _ultimo = time.time()
                return json.loads(r.read().decode() or "null")
        except urllib.error.HTTPError as e:
            _ultimo = time.time()
            if e.code in (429, 500, 502, 503, 504):
                print(f"    HTTP {e.code} · espero {BACKOFF}s"); time.sleep(BACKOFF); continue
            raise RuntimeError(f"{method} {path} -> {e.code}: {e.read()[:300]}")
        except Exception as e:
            _ultimo = time.time()
            print(f"    red: {e} · espero {BACKOFF}s"); time.sleep(BACKOFF)
            if method == "POST" and path == "/posts" and body and body.get("slug"):
                ya = buscar_slug(body["slug"])
                if ya:
                    print(f"    el POST sí se creó (id {ya['id']}); no reintento")
                    return ya
    raise RuntimeError(f"{method} {path}: agotados los reintentos")


def buscar_slug(slug):
    for estado in ("future", "publish", "draft", "pending", "private"):
        r = call("GET", "/posts", params={"slug": slug, "status": estado, "_fields": "id,status,slug"})
        if r:
            return r[0]
    return None


def slugs_existentes():
    vistos = set()
    for estado in ("publish", "future", "draft", "pending", "private"):
        pag = 1
        while True:
            # nc: el sitio cachea los GET del REST y devolvía el listado viejo tras publicar
            lote = call("GET", "/posts", params={"per_page": 100, "page": pag, "status": estado,
                                                 "_fields": "slug", "nc": int(time.time())})
            vistos |= {p["slug"] for p in lote}
            if len(lote) < 100:
                break
            pag += 1
    return vistos


def tags_existentes():
    out, pag = {}, 1
    while True:
        lote = call("GET", "/tags", params={"per_page": 100, "page": pag, "_fields": "id,name"})
        out.update({t["name"].lower(): t["id"] for t in lote})
        if len(lote) < 100:
            return out
        pag += 1


def main():
    dry = "--dry-run" in sys.argv
    specs = [json.load(open(r, encoding="utf-8")) for r in sorted(glob.glob(os.path.join(AQUI, "posts", "spec-*.json")))]
    if not specs:
        sys.exit("no hay payloads en posts/ — corre construir.py primero")
    print(f"{len(specs)} payloads")

    existentes = slugs_existentes()
    print(f"{len(existentes)} slugs ya en el sitio")
    pendientes = [s for s in specs if s["slug"] not in existentes]
    if len(pendientes) < len(specs):
        print(f"salto {len(specs) - len(pendientes)} que ya están")
    if dry:
        for s in pendientes:
            print(f"  {s['date'][:10]}  cat {s['categories'][0]}  {s['slug']}")
        return

    tag_ids = tags_existentes()
    for t in sorted({t for s in pendientes for t in s["tags"]}):
        if t.lower() not in tag_ids:
            tag_ids[t.lower()] = call("POST", "/tags", {"name": t})["id"]
            print(f"  + tag {t}")

    creados = []
    for s in pendientes:
        body = dict(s, tags=[tag_ids[t.lower()] for t in s["tags"]])
        r = call("POST", "/posts", body, espera=DELAY_POST)
        creados.append(r["id"])
        print(f"  {r['id']} [{r['status']}] {s['date'][:10]} {s['slug']}")

    print(f"\n{len(creados)} posts creados. Verificando contra el sitio…")
    finales = slugs_existentes()
    base = lambda x: x.rsplit("-", 1)[0] if x.rsplit("-", 1)[-1].isdigit() else x
    sufijados = [x for x in finales if base(x) != x and base(x) in {s["slug"] for s in specs}]
    faltan = [s["slug"] for s in specs if s["slug"] not in finales]
    print(f"  faltan: {faltan or 'ninguno'} · duplicados con sufijo: {sufijados or 'ninguno'}")


if __name__ == "__main__":
    main()
