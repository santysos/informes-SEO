#!/usr/bin/env python3
"""Fase 1 — Rewrite de title + meta description en top 10 páginas por impresiones.

Objetivo: subir CTR de ~1% a 3-5% sin tocar el ranking.
Sólo modifica metas Yoast (_yoast_wpseo_title, _yoast_wpseo_metadesc).
NO toca el contenido del post.

Patrón de operación:
1. Para cada URL en REWRITES, hace GET /posts?slug=... para obtener el ID.
2. Lee meta actual (para guardar registro before/after).
3. PUT con metas nuevas.
4. Verifica que persistieron (Yoast puede ignorar silenciosamente vía REST).
5. Guarda un CSV con el registro before/after para A/B testing.

Para correr:
    python3 -u update_yoast_meta.py            # modo dry-run, muestra lo que haría
    python3 -u update_yoast_meta.py --apply    # aplica los cambios

Después de 14 días, comparar CTR en Search Console (filtro por URL).
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
# Tabla de rewrites (Fase 1 — top 10 por impresiones)
# ============================================================
# Estructura por entrada:
#   url:                slug del post (relativo, sin dominio)
#   target_type:        "post" | "page" (la home y /menu/ son pages)
#   variant:            "A" o "B"  → para A/B testing
#   yoast_title:        nuevo title (50-60 chars)
#   yoast_metadesc:     nueva meta description (145-155 chars)
#   focus_kw:           keyword principal Yoast
#   reason:             hipótesis del problema (queda en log)

REWRITES = [
    {
        "url": "que-hacer-manta-ecuador-guia-turistica",
        "target_type": "post",
        "variant": "A",
        "yoast_title": "Qué hacer en Manta: 17 planes reales contados por quien vive aquí",
        "yoast_metadesc": "Reúne los 17 planes que recomendamos a quien nos visita: playas, comida manabita, vida nocturna y un rooftop con vista al Pacífico.",
        "focus_kw": "que hacer en manta",
        "reason": "Title genérico tipo 'Guía turística'; 8.639 imp/mes con CTR 1,03% en pos 8,5",
    },
    {
        "url": "gastronomia-manabi-costa-ecuatoriana",
        "target_type": "post",
        "variant": "A",
        "yoast_title": "Gastronomía manabita: 12 platos que probar antes de irte de Manta",
        "yoast_metadesc": "Desde el viche hasta el corviche: los 12 platos que el equipo de Luuma recomienda probar en Manta, con dónde encontrarlos y por qué nos importan.",
        "focus_kw": "gastronomía manabita",
        "reason": "Suena a Wikipedia; 5.037 imp/mes con CTR 1,13% en pos 6,6",
    },
    {
        "url": "vida-nocturna-manta",
        "target_type": "post",
        "variant": "A",
        "yoast_title": "Vida nocturna en Manta: jueves, viernes y sábado (lo que hacemos los locales)",
        "yoast_metadesc": "Salir en Manta entre semana es distinto al fin de semana. Te contamos por barrio qué abre, qué cuesta y por dónde empezamos los que vivimos aquí.",
        "focus_kw": "vida nocturna manta",
        "reason": "Abstracto; ~2.500 imp/mes con CTR ~1%",
    },
    {
        "url": "eventos-musica-vivo-manta-agenda",
        "target_type": "post",
        "variant": "A",
        "yoast_title": "Música en vivo en Manta: agenda actualizada (mes en curso) 2026",
        "yoast_metadesc": "Agenda de música en vivo en Manta actualizada: bandas, horarios y dónde verlos. Incluye nuestra programación en el rooftop de Luuma.",
        "focus_kw": "música en vivo manta",
        "reason": "Agenda sin fecha activa señal de obsoleto; ~2.000 imp/mes con CTR ~1%",
    },
    {
        "url": "menu-ejecutivo-manta-almorzar",
        "target_type": "post",
        "variant": "A",
        "yoast_title": "Almuerzo ejecutivo en Manta: dónde almuerzan los mantenses ($6–$18)",
        "yoast_metadesc": "Comparativa real de menús ejecutivos en Manta por zona y precio. De $6 en Tarqui a $18 en Flavio Reyes con vista al mar.",
        "focus_kw": "almuerzo ejecutivo manta",
        "reason": "Sin gancho de precio; ~900 imp/mes con CTR 1,7%",
    },
    {
        "url": "mejores-restaurantes-manta-ecuador",
        "target_type": "post",
        "variant": "A",
        "yoast_title": "Los 11 mejores restaurantes de Manta según el equipo de Luuma",
        "yoast_metadesc": "Lista honesta de los 11 restaurantes de Manta que recomendamos a quien nos visita. Sí, nos incluimos al final (te explicamos por qué).",
        "focus_kw": "mejores restaurantes manta",
        "reason": "Listicle genérico; ~700 imp/mes con CTR 1,4%",
    },
    {
        "url": "menu",
        "target_type": "page",
        "variant": "A",
        "yoast_title": "Carta de Luuma Rooftop: cocina manabita y cocteles de autor",
        "yoast_metadesc": "Carta completa de Luuma Rooftop en Manta: entradas, fuertes manabitas, mariscos del Pacífico y cocteles de autor. Av. Flavio Reyes.",
        "focus_kw": "luuma menu",
        "reason": "Sin meta description registrada",
    },
    {
        "url": "",  # home — caso especial
        "target_type": "page_home",
        "variant": "A",
        "yoast_title": "Luuma Rooftop Manta: cocina manabita y mixología, av. Flavio Reyes",
        "yoast_metadesc": "Rooftop en Manta con cocina manabita contemporánea y mixología de autor. Reservas en av. Flavio Reyes, con vista al Pacífico.",
        "focus_kw": "luuma rooftop manta",
        "reason": "Probable duplicación 'Luuma Rooftop Luuma Rooftop'",
    },
    # Las dos siguientes son template — completar slugs reales después de inspeccionar el sitio
    # {
    #     "url": "restaurantes-la-quadra-manta",
    #     "target_type": "post",
    #     "variant": "control",  # NO tocar — ya tiene CTR 6,60%, sirve de control del A/B
    #     "yoast_title": "(mantener)",
    #     "yoast_metadesc": "(mantener)",
    #     "focus_kw": "restaurantes la quadra manta",
    #     "reason": "Patrón ganador — replicar a otras zonas en posts nuevos, no tocar este",
    # },
]


# ============================================================
# Env loader
# ============================================================
def load_env():
    env = {}
    if not ENV_FILE.exists():
        sys.exit(f"ERROR: no existe {ENV_FILE}. Agrega LUUMA_WP_BASE, LUUMA_WP_USER, LUUMA_WP_APP_PASS.")
    for line in ENV_FILE.read_text().splitlines():
        line = line.strip()
        if not line or line.startswith("#") or "=" not in line:
            continue
        k, v = line.split("=", 1)
        env[k.strip()] = v.strip()
    needed = ["LUUMA_WP_BASE", "LUUMA_WP_USER", "LUUMA_WP_APP_PASS"]
    missing = [k for k in needed if k not in env]
    if missing:
        sys.exit(f"ERROR: faltan en .env: {', '.join(missing)}")
    return env


E = load_env()
BASE = E["LUUMA_WP_BASE"].rstrip("/")
AUTH = base64.b64encode(f"{E['LUUMA_WP_USER']}:{E['LUUMA_WP_APP_PASS']}".encode()).decode()
HEADERS = {
    "Content-Type": "application/json; charset=utf-8",
    "Authorization": f"Basic {AUTH}",
    "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36",
    "Accept": "application/json, */*;q=0.8",
    "Accept-Language": "es-EC,es;q=0.9,en;q=0.8",
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
    """Devuelve (id, type) para el slug. kind: 'post' | 'page' | 'page_home'."""
    if kind == "page_home":
        # Buscar la home (page asignada como front_page en WP settings)
        # Fallback: page con slug 'home' o id=2
        s = api("GET", "/settings")
        if isinstance(s, dict) and s.get("show_on_front") == "page" and s.get("page_on_front"):
            return s["page_on_front"], "page"
        # fallback: home con slug
        cand = api("GET", "/pages?slug=home")
        if isinstance(cand, list) and cand:
            return cand[0]["id"], "page"
        cand = api("GET", "/pages?slug=inicio")
        if isinstance(cand, list) and cand:
            return cand[0]["id"], "page"
        return None, None
    base = "/posts" if kind == "post" else "/pages"
    r = api("GET", f"{base}?slug={urllib.parse.quote(slug)}&_fields=id,slug,link")
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


# ============================================================
# Main
# ============================================================
def main():
    apply = "--apply" in sys.argv
    mode = "APPLY" if apply else "DRY-RUN"
    print(f"=== Luuma · Fase 1 Yoast Rewrites — {mode} ===\n")
    if not apply:
        print("⚠ Modo dry-run. Para aplicar, corre con --apply\n")

    log_rows = []

    for i, r in enumerate(REWRITES, 1):
        print(f"[{i}/{len(REWRITES)}] {r['url'] or '(home)'}  variant={r['variant']}")
        print(f"    motivo: {r['reason']}")

        # Encontrar ID
        post_id, kind = find_id(r["url"], r["target_type"])
        if not post_id:
            print(f"    ✗ no encontré el {r['target_type']} para slug='{r['url']}'")
            log_rows.append([datetime.now().isoformat(), r["url"], r["variant"], "NOT FOUND", "", "", "", "", "", ""])
            continue

        # Leer meta actual
        cur_meta = get_current_meta(post_id, kind)
        before_title = cur_meta.get("_yoast_wpseo_title", "")
        before_metadesc = cur_meta.get("_yoast_wpseo_metadesc", "")
        before_focus = cur_meta.get("_yoast_wpseo_focuskw", "")

        print(f"    id={post_id} kind={kind}")
        print(f"    title antes:   '{before_title[:80]}'")
        print(f"    title nuevo:   '{r['yoast_title'][:80]}'")
        print(f"    meta antes:    '{before_metadesc[:80]}'")
        print(f"    meta nueva:    '{r['yoast_metadesc'][:80]}'")

        # Validar longitudes
        if len(r["yoast_title"]) > 65:
            print(f"    ⚠ title de {len(r['yoast_title'])} chars (recomendado 50-60)")
        if not (140 <= len(r["yoast_metadesc"]) <= 160):
            print(f"    ⚠ metadesc de {len(r['yoast_metadesc'])} chars (recomendado 145-155)")

        if apply:
            resp = update_meta(post_id, kind, r["yoast_title"], r["yoast_metadesc"], r["focus_kw"])
            if "_error" in resp:
                print(f"    ✗ error: {resp}")
                log_rows.append([datetime.now().isoformat(), r["url"], r["variant"], "ERROR", before_title, r["yoast_title"], before_metadesc, r["yoast_metadesc"], before_focus, r["focus_kw"]])
                continue

            # Verificar que persistió
            after_meta = get_current_meta(post_id, kind)
            persisted_title = after_meta.get("_yoast_wpseo_title", "")
            if persisted_title != r["yoast_title"]:
                print(f"    ⚠ Yoast meta no persistió. Verificar en /wp-admin/post.php?post={post_id}&action=edit")
                status = "NOT PERSISTED"
            else:
                print(f"    ✓ aplicado y verificado")
                status = "APPLIED"
            log_rows.append([datetime.now().isoformat(), r["url"], r["variant"], status, before_title, r["yoast_title"], before_metadesc, r["yoast_metadesc"], before_focus, r["focus_kw"]])
        else:
            log_rows.append([datetime.now().isoformat(), r["url"], r["variant"], "DRY-RUN", before_title, r["yoast_title"], before_metadesc, r["yoast_metadesc"], before_focus, r["focus_kw"]])

        print()

    # Guardar log CSV (para A/B testing después)
    log_path = LOG_DIR / f"rewrites-fase1-{datetime.now().strftime('%Y%m%d-%H%M%S')}.csv"
    with log_path.open("w", newline="", encoding="utf-8") as f:
        w = csv.writer(f)
        w.writerow(["timestamp", "url", "variant", "status",
                    "before_title", "after_title",
                    "before_metadesc", "after_metadesc",
                    "before_focus_kw", "after_focus_kw"])
        w.writerows(log_rows)
    print(f"\nLog guardado: {log_path}")


if __name__ == "__main__":
    main()
