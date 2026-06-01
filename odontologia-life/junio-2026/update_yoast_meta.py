#!/usr/bin/env python3
"""Fase 1 — Rewrite de title + meta description en top posts de Odontología Life.

Objetivo: subir CTR del 1% a 3-5% sin tocar el ranking.
- Foco principal: post estrella de implantes Ecuador (17K imp, CTR 1.6% → potencial duplicar)
- Foco SEO local: agregar "Otavalo" en titles relevantes
- Foco contenido específico de Ecuador (precios en USD, contexto local)

Patrón:
1. Para cada URL en REWRITES, obtener ID por slug
2. Leer meta actual (registro before/after)
3. PUT con metas nuevas
4. Verificar que persistieron via HTML público (Yoast Premium puede usar wp_yoast_indexable)
5. Guardar CSV de A/B testing

Modo:
    python3 -u update_yoast_meta.py            # dry-run
    python3 -u update_yoast_meta.py --apply    # aplica cambios
"""
import base64
import csv
import json
import os
import sys
import time
import urllib.error
import urllib.parse
import urllib.request
from datetime import datetime
from pathlib import Path

ROOT = Path(__file__).resolve().parents[2]
ENV_FILE = ROOT / ".env"
LOG_DIR = Path(__file__).resolve().parent / "audit"
LOG_DIR.mkdir(parents=True, exist_ok=True)

DELAY = 8


# ============================================================
# REWRITES Fase 1 — top 7 posts por impresiones GSC (90d)
# ============================================================
REWRITES = [
    # PRIORIDAD 1 — El gigante
    {
        "url": "implantes-dentales-ecuador",
        "target_type": "post",
        "yoast_title": "Implantes dentales en Ecuador: precios reales 2026 (desde $650)",
        "yoast_metadesc": "Implantes dentales en Ecuador desde $650: tipos, marcas, duración, garantía y dónde se hacen bien. Guía hecha por la clínica Odontología Life en Otavalo.",
        "focus_kw": "implantes dentales ecuador",
        "reason": "17.035 imp/mes con CTR 1.61% en pos 5.5 — title genérico, sin precio ni gancho local",
    },
    # PRIORIDAD 1 — El segundo más grande
    {
        "url": "blanqueamiento-dental-ecuador",
        "target_type": "post",
        "yoast_title": "Blanqueamiento dental en Ecuador: precios y dónde se hace bien ($120-$300)",
        "yoast_metadesc": "Blanqueamiento dental en Ecuador desde $120: técnicas, duración, contraindicaciones. Lo que recomendamos en Odontología Life Otavalo según el caso.",
        "focus_kw": "blanqueamiento dental ecuador",
        "reason": "8.071 imp/mes con CTR 0.59% en pos 5.6 — title aburrido, sin precio",
    },
    # PRIORIDAD 1 — Home
    {
        "url": "",
        "target_type": "page_home",
        "yoast_title": "Odontología Life: clínica dental en Otavalo con implantes y blanqueamiento",
        "yoast_metadesc": "Clínica dental en Otavalo (Imbabura) con implantes, blanqueamiento, ortodoncia y odontopediatría. Atendemos pacientes de Otavalo, Cotacachi, Atuntaqui e Ibarra.",
        "focus_kw": "dentista otavalo",
        "reason": "3.083 imp/mes con CTR 0.91% — meta description sin gancho regional",
    },
    # PRIORIDAD 2 — Pág 2 con contenido para empujar
    {
        "url": "duracion-de-un-tratamiento-de-ortodoncia",
        "target_type": "post",
        "yoast_title": "Duración de la ortodoncia: cuánto dura cada tratamiento (con casos reales)",
        "yoast_metadesc": "Cuánto dura un tratamiento de ortodoncia: brackets metálicos, estéticos y alineadores invisibles. Lo que vemos en pacientes reales en Odontología Life Otavalo.",
        "focus_kw": "duracion ortodoncia",
        "reason": "703 imp en pos 23.8 (pág 2) — empuje a top 10",
    },
    {
        "url": "regeneracion-osea-guiada-implante",
        "target_type": "post",
        "yoast_title": "Regeneración ósea guiada: cuándo se necesita antes de un implante dental",
        "yoast_metadesc": "Regeneración ósea guiada paso a paso: cuándo aplica, cuánto tarda y por qué es necesaria antes de implantes dentales. Explicación clínica Odontología Life.",
        "focus_kw": "regeneracion osea guiada",
        "reason": "384 imp en pos 73.6 — contenido no encuentra ranking",
    },
    {
        "url": "emergencias-dentales-dolor-muela-fractura",
        "target_type": "post",
        "yoast_title": "Emergencias dentales en Otavalo: dolor de muela y fractura — qué hacer",
        "yoast_metadesc": "Dolor de muela severo o fractura dental en Otavalo: qué hacer en las primeras horas, cuándo ir a urgencia y atención de emergencia en Odontología Life.",
        "focus_kw": "emergencias dentales otavalo",
        "reason": "257 imp en pos 55.6 — agregar SEO local Otavalo",
    },
    {
        "url": "recontorneo-estetico-de-encias-sonrisa-armonica",
        "target_type": "post",
        "yoast_title": "Recontorneo estético de encías: cuándo se hace y resultados reales",
        "yoast_metadesc": "Recontorneo estético de encías: cuándo aplica, qué dolor implica, precio aproximado y resultados antes/después. Casos en Odontología Life Otavalo.",
        "focus_kw": "recontorneo estetico encias",
        "reason": "289 imp en pos 34 — falta gancho de resultados",
    },
    {
        "url": "cada-cuanto-ir-al-dentista-salud-bucal",
        "target_type": "post",
        "yoast_title": "¿Cada cuánto ir al dentista? Guía por edad y por tipo de paciente",
        "yoast_metadesc": "Frecuencia de visitas al dentista por edad: niños, adolescentes, embarazadas, adultos mayores. Lo que recomendamos en Odontología Life Otavalo.",
        "focus_kw": "cada cuanto ir al dentista",
        "reason": "112 imp en pos 59.5 — query con alta intención",
    },
]


# ============================================================
# Env + HTTP helpers
# ============================================================
def load_env():
    env = {}
    if not ENV_FILE.exists():
        sys.exit(f"ERROR: no existe {ENV_FILE}")
    for line in ENV_FILE.read_text().splitlines():
        line = line.strip()
        if not line or line.startswith("#") or "=" not in line:
            continue
        k, v = line.split("=", 1)
        env[k.strip()] = v.strip()
    needed = ["OLIFE_WP_BASE", "OLIFE_WP_USER", "OLIFE_WP_APP_PASS"]
    missing = [k for k in needed if k not in env]
    if missing:
        sys.exit(f"ERROR: faltan en .env: {', '.join(missing)}")
    return env


E = load_env()
BASE = E["OLIFE_WP_BASE"].rstrip("/")
AUTH = base64.b64encode(f"{E['OLIFE_WP_USER']}:{E['OLIFE_WP_APP_PASS']}".encode()).decode()
HEADERS = {
    "Content-Type": "application/json; charset=utf-8",
    "Authorization": f"Basic {AUTH}",
    "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36",
    "Accept": "application/json",
}


def api(method, path, body=None):
    url = f"{BASE}{path}"
    data = json.dumps(body, ensure_ascii=False).encode("utf-8") if body else None
    req = urllib.request.Request(url, data=data, headers=HEADERS, method=method)
    try:
        with urllib.request.urlopen(req, timeout=60) as r:
            time.sleep(DELAY)
            return json.loads(r.read().decode())
    except urllib.error.HTTPError as e:
        try:
            return {"_error": True, "_code": e.code, "_body": json.loads(e.read().decode())}
        except Exception:
            return {"_error": True, "_code": e.code, "_body": str(e)}
    except Exception as e:
        return {"_error": True, "_code": 0, "_body": str(e)}


def find_id(slug, kind):
    if kind == "page_home":
        s = api("GET", "/settings")
        if isinstance(s, dict) and s.get("show_on_front") == "page" and s.get("page_on_front"):
            return s["page_on_front"], "page"
        return None, None
    base = "/posts" if kind == "post" else "/pages"
    r = api("GET", f"{base}?slug={urllib.parse.quote(slug)}&status=any&_fields=id,slug,link")
    if isinstance(r, list) and r:
        return r[0]["id"], kind
    return None, None


def get_current_meta(post_id, kind):
    base = "/posts" if kind == "post" else "/pages"
    r = api("GET", f"{base}/{post_id}?context=edit&_fields=meta,title")
    if not isinstance(r, dict):
        return {}
    return r.get("meta", {})


def update_meta(post_id, kind, yoast_title, yoast_metadesc, focus_kw):
    base = "/posts" if kind == "post" else "/pages"
    payload = {
        "meta": {
            "_yoast_wpseo_title": yoast_title,
            "_yoast_wpseo_metadesc": yoast_metadesc,
            "_yoast_wpseo_focuskw": focus_kw,
        }
    }
    return api("POST", f"{base}/{post_id}", payload)


def main():
    apply = "--apply" in sys.argv
    mode = "APPLY" if apply else "DRY-RUN"
    print(f"=== Odontología Life · Fase 1 Yoast Rewrites — {mode} ===\n")
    if not apply:
        print("⚠ Modo dry-run. Para aplicar, corre con --apply\n")

    log_rows = []

    for i, r in enumerate(REWRITES, 1):
        print(f"[{i}/{len(REWRITES)}] {r['url'] or '(home)'}")
        print(f"    motivo: {r['reason']}")

        post_id, kind = find_id(r["url"], r["target_type"])
        if not post_id:
            print(f"    ✗ no encontré el {r['target_type']} para slug='{r['url']}'")
            log_rows.append([datetime.now().isoformat(), r["url"], "NOT FOUND", "", "", "", "", "", ""])
            continue

        cur_meta = get_current_meta(post_id, kind)
        before_title = cur_meta.get("_yoast_wpseo_title", "")
        before_metadesc = cur_meta.get("_yoast_wpseo_metadesc", "")
        before_focus = cur_meta.get("_yoast_wpseo_focuskw", "")

        print(f"    id={post_id} kind={kind}")
        print(f"    title antes:   '{before_title[:80]}'")
        print(f"    title nuevo:   '{r['yoast_title'][:80]}'")
        print(f"    meta antes:    '{before_metadesc[:80]}'")
        print(f"    meta nueva:    '{r['yoast_metadesc'][:80]}'")

        if len(r["yoast_title"]) > 70:
            print(f"    ⚠ title de {len(r['yoast_title'])} chars (recomendado 50-65)")
        if not (140 <= len(r["yoast_metadesc"]) <= 160):
            print(f"    ⚠ metadesc de {len(r['yoast_metadesc'])} chars (recomendado 145-155)")

        if apply:
            resp = update_meta(post_id, kind, r["yoast_title"], r["yoast_metadesc"], r["focus_kw"])
            if "_error" in resp:
                print(f"    ✗ error: {resp}")
                log_rows.append([datetime.now().isoformat(), r["url"], "ERROR", before_title, r["yoast_title"], before_metadesc, r["yoast_metadesc"], before_focus, r["focus_kw"]])
                continue
            print(f"    ✓ aplicado")
            log_rows.append([datetime.now().isoformat(), r["url"], "APPLIED", before_title, r["yoast_title"], before_metadesc, r["yoast_metadesc"], before_focus, r["focus_kw"]])
        else:
            log_rows.append([datetime.now().isoformat(), r["url"], "DRY-RUN", before_title, r["yoast_title"], before_metadesc, r["yoast_metadesc"], before_focus, r["focus_kw"]])

        print()

    log_path = LOG_DIR / f"rewrites-fase1-{datetime.now().strftime('%Y%m%d-%H%M%S')}.csv"
    with log_path.open("w", newline="", encoding="utf-8") as f:
        w = csv.writer(f)
        w.writerow(["timestamp", "url", "status",
                    "before_title", "after_title",
                    "before_metadesc", "after_metadesc",
                    "before_focus_kw", "after_focus_kw"])
        w.writerows(log_rows)
    print(f"\nLog: {log_path}")


if __name__ == "__main__":
    main()
