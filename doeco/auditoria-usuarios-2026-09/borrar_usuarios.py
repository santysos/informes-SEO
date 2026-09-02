#!/usr/bin/env python3
"""Borra las cuentas de cliente falsas de doeco.ec.

    python3 doeco/auditoria-usuarios-2026-09/borrar_usuarios.py --dry-run
    python3 doeco/auditoria-usuarios-2026-09/borrar_usuarios.py

Criterio (ver INFORME.md): rol cliente, alta desde el 2024-12-01 y CERO pedidos
en los 287 del historial. Se puede interrumpir con Ctrl+C y relanzar: relee la
lista y salta los que ya no existen.

⚠️ El borrado de usuarios en WordPress es PERMANENTE, no van a la papelera.
"""
import base64, json, os, sys, time, urllib.error, urllib.request

AQUI = os.path.dirname(os.path.abspath(__file__))
RAIZ = os.path.abspath(os.path.join(AQUI, "..", ".."))
LISTA = "/tmp/doeco_borrar.json"
PROTEGIDOS = "/tmp/doeco_compradores.json"

PAUSA = 1.5        # entre borrados; el sitio es lento y ya devolvió un 503
ESPERA_5XX = 45    # si el servidor se queja, se le da aire


def env():
    d = {}
    with open(os.path.join(RAIZ, ".env"), encoding="utf-8") as f:
        for l in f:
            if "=" in l and not l.strip().startswith("#"):
                k, v = l.strip().split("=", 1)
                d[k] = v.strip().strip('"').strip("'")
    return d


def main():
    seco = "--dry-run" in sys.argv
    e = env()
    base = e["DOECO_WP_BASE"].rstrip("/")
    tok = f"{e['DOECO_WP_USER']}:{e['DOECO_WP_APP_PASS']}".encode()
    h = {"Authorization": "Basic " + base64.b64encode(tok).decode(),
         "User-Agent": ("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) "
                        "AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0 Safari/537.36")}

    ids = json.load(open(LISTA))
    protegidos = set(json.load(open(PROTEGIDOS)))

    # Tres redes de seguridad, por si la lista llegara alterada.
    antes = len(ids)
    ids = [i for i in ids if i not in protegidos]   # nunca un comprador
    ids = [i for i in ids if i > 100]               # nunca una cuenta antigua
    ids = sorted(set(ids))
    print(f"lista: {antes} → {len(ids)} tras las verificaciones de seguridad")
    print(f"protegidos por tener pedidos: {len(protegidos)}")

    # Arranque rápido: se pregunta al sitio qué ids siguen existiendo y solo se
    # recorren esos. Sin esto, un relanzamiento gasta 1,5 s por cada cuenta ya
    # borrada solo para confirmar un 404 — con 1.000 hechas son 25 minutos.
    print("\nconsultando qué cuentas siguen vivas…", flush=True)
    vivos, pagina = set(), 1
    while True:
        u = f"{base}/users?context=edit&roles=customer&per_page=100&page={pagina}&_fields=id"
        try:
            lote = json.loads(urllib.request.urlopen(
                urllib.request.Request(u, headers=h), timeout=90).read())
        except Exception:
            print("  no se pudo consultar; se recorre la lista completa")
            vivos = None
            break
        if not lote:
            break
        vivos |= {x["id"] for x in lote}
        if len(lote) < 100:
            break
        pagina += 1
        time.sleep(1)
    if vivos is not None:
        antes_vivos = len(ids)
        ids = [i for i in ids if i in vivos]
        print(f"  {antes_vivos - len(ids)} ya estaban borradas · quedan {len(ids)} por borrar")
    if seco:
        print("\n--dry-run: no se borra nada. Primeros 10 ids:", ids[:10])
        return

    print(f"\nborrando {len(ids)} cuentas · pausa de {PAUSA}s · Ctrl+C para parar\n")
    ok = ausentes = err = 0
    fallos = []
    for n, uid in enumerate(ids, 1):
        url = f"{base}/users/{uid}?force=true&reassign=1"
        hecho = False
        for intento in range(3):
            try:
                req = urllib.request.Request(url, method="DELETE", headers=h)
                urllib.request.urlopen(req, timeout=90).read()
                ok += 1
                hecho = True
                break
            except urllib.error.HTTPError as ex:
                if ex.code in (404, 410):        # ya no existe: relanzado
                    ausentes += 1
                    hecho = True
                    break
                if ex.code in (429, 500, 502, 503, 504):
                    time.sleep(ESPERA_5XX)
                    continue
                fallos.append([uid, ex.code])
                break
            except Exception:
                time.sleep(ESPERA_5XX)
                continue
        if not hecho:
            err += 1
            if not any(f[0] == uid for f in fallos):
                fallos.append([uid, "sin respuesta"])
        if n % 25 == 0 or n == len(ids):
            print(f"  {n}/{len(ids)}  borrados={ok}  ya no estaban={ausentes}  fallidos={err}",
                  flush=True)
        time.sleep(PAUSA)

    print(f"\nTERMINADO · borrados={ok} · ya no estaban={ausentes} · fallidos={err}")
    if fallos:
        json.dump(fallos, open("/tmp/doeco_fallos.json", "w"))
        print("  ids con problema en /tmp/doeco_fallos.json — relanza el script para reintentarlos")


if __name__ == "__main__":
    main()
