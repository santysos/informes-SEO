#!/usr/bin/env python3
"""Arregla el rechazo de formularios por nonce vencido (nov-2026).

LiteSpeed sirve las páginas de reserva y de repuestos desde caché con el `_wpnonce` de
JetFormBuilder escrito en el HTML. WordPress invalida ese nonce en 12-24 h, así que quien
llega a una copia vieja recibe `?status=nonce_failed` y su cita no se registra.
Medido en GA4: oct-2026 7 usuarios rechazados vs 9 citas; nov (1-18) 11 vs 7.

Arreglo: `load_nonce = "hide"` en los dos formularios públicos (opción «Disable» de
JetFormBuilder). El reCAPTCHA v3 que ya tienen sigue filtrando spam. La opción «csrf» de
JetFormBuilder no sirve: su token también se escribe en el HTML y la caché lo rompe igual.
Después se re-guardan las páginas para que LiteSpeed purgue su copia.

Uso:  python3 arreglar_nonce.py --dry-run | python3 arreglar_nonce.py | python3 arreglar_nonce.py --revertir
"""
import json, os, sys, time, urllib.request, urllib.error

AQUI = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, os.path.join(AQUI, "../recuperacion-2026-11"))
from pilar_electricos import H, BASE  # credenciales CH desde .env

FORMS = {12079: "Cita Taller (página 8753)", 8824: "Cotización de repuestos (página 8816)"}
PAGES = [8753, 8816]

def api(method, path, body=None):
    req = urllib.request.Request(BASE + "/wp-json" + path, headers=H, method=method,
                                 data=json.dumps(body).encode() if body is not None else None)
    try:
        return json.loads(urllib.request.urlopen(req, timeout=120).read() or b"{}")
    except urllib.error.HTTPError as e:
        raise SystemExit(f"{method} {path} → HTTP {e.code}: {e.read()[:300]}")

def main():
    dry, revertir = "--dry-run" in sys.argv, "--revertir" in sys.argv
    os.makedirs(os.path.join(AQUI, "antes"), exist_ok=True)
    for fid, nombre in FORMS.items():
        f = api("GET", f"/wp/v2/jet-form-builder/{fid}?context=edit&_fields=id,meta")
        args = json.loads(f["meta"]["_jf_args"] or "{}")
        respaldo = os.path.join(AQUI, "antes", f"jf_args-{fid}.json")
        if not os.path.exists(respaldo):
            json.dump(args, open(respaldo, "w"), indent=1)
        nuevo = dict(args)
        nuevo["load_nonce"] = json.load(open(respaldo)).get("load_nonce", "render") if revertir else "hide"
        print(f"{fid} {nombre}: load_nonce {args.get('load_nonce')!r} → {nuevo['load_nonce']!r}")
        if not dry and nuevo != args:
            r = api("POST", f"/wp/v2/jet-form-builder/{fid}", {"meta": {"_jf_args": json.dumps(nuevo)}})
            print("   guardado:", r["meta"]["_jf_args"])
        time.sleep(8)
    if dry:
        return
    for pid in PAGES:  # re-guardar la página dispara la purga de LiteSpeed de esa URL
        r = api("POST", f"/wp/v2/pages/{pid}", {})
        print(f"página {pid} re-guardada {r['modified']}")
        time.sleep(8)

if __name__ == "__main__":
    main()
