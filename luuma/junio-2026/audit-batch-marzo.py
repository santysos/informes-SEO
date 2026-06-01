#!/usr/bin/env python3
"""Fase 4 — Auditoría del batch de 56 posts publicados el 28-mar-2026.

Patrón sospechoso: Google vio publicar 56 posts el mismo día → riesgo de Helpful Content.
Este script clasifica cada post en uno de 4 buckets:

  KEEP     → tiene tráfico o impresiones, voz humana, conservar
  REWRITE  → impresiones pero CTR <1%, contenido genérico, reescribir con voz Luuma
  MERGE    → 2-3 posts cubren la misma query (canibalización), fusionar
  NOINDEX  → sin tráfico ni oportunidad SEO, noindex,follow o 301 a categoría

Output:
  - audit/batch-marzo-{fecha}.csv con columnas: id, slug, title, date, words, ai_flags, action
  - audit/clusters.json agrupando posts por query/tópico (para decidir merges)

NO modifica nada en el sitio. Solo lee + analiza + reporta.

Para datos de Search Console hay que cruzar manualmente porque GSC no expone REST API
pública sin OAuth — exportar CSV de GSC y pasarlo con --gsc-csv {path}.
"""
import base64
import csv
import json
import re
import sys
import time
import urllib.error
import urllib.parse
import urllib.request
from collections import defaultdict
from datetime import datetime
from pathlib import Path

ROOT = Path(__file__).resolve().parents[2]
ENV_FILE = ROOT / ".env"
AUDIT_DIR = Path(__file__).resolve().parent / "audit"
AUDIT_DIR.mkdir(parents=True, exist_ok=True)

DELAY = 8

# Frases de la lista negra anti-IA (mismas que publish_batch.py)
AI_PHRASES = [
    "en conclusión", "en conclusion", "en resumen", "en definitiva",
    "para concluir", "sin duda alguna", "es importante destacar",
    "cabe mencionar", "mundo gastronómico", "mundo gastronomico",
    "experiencia única", "experiencia unica", "viaje sensorial",
    "deleitar el paladar", "si eres un amante de",
]

MANTA_REFS = [
    "flavio reyes", "malecón", "malecon", "la quadra", "tarqui",
    "umiña", "umina", "barbasquillo", "murciélago", "murcielago",
    "san mateo", "el palmar", "la aurora",
]


def load_env():
    env = {}
    if not ENV_FILE.exists():
        sys.exit(f"ERROR: no existe {ENV_FILE}.")
    for line in ENV_FILE.read_text().splitlines():
        line = line.strip()
        if not line or line.startswith("#") or "=" not in line:
            continue
        k, v = line.split("=", 1)
        env[k.strip()] = v.strip()
    for need in ["LUUMA_WP_BASE", "LUUMA_WP_USER", "LUUMA_WP_APP_PASS"]:
        if need not in env:
            sys.exit(f"ERROR: falta {need} en .env")
    return env


E = load_env()
BASE = E["LUUMA_WP_BASE"].rstrip("/")
AUTH = base64.b64encode(f"{E['LUUMA_WP_USER']}:{E['LUUMA_WP_APP_PASS']}".encode()).decode()
HEADERS = {
    "Authorization": f"Basic {AUTH}",
    "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36",
    "Accept": "application/json",
}


def api(method, path):
    url = f"{BASE}{path}"
    req = urllib.request.Request(url, headers=HEADERS, method=method)
    try:
        with urllib.request.urlopen(req, timeout=60) as r:
            time.sleep(DELAY)
            return json.loads(r.read().decode())
    except Exception as e:
        return {"_error": True, "_body": str(e)}


def fetch_all_posts():
    """Trae todos los posts paginando."""
    all_posts = []
    page = 1
    while True:
        # _fields para reducir peso de la respuesta
        r = api("GET", f"/posts?per_page=50&page={page}&_fields=id,slug,date,modified,title,content,categories,link")
        if not isinstance(r, list) or not r:
            break
        all_posts.extend(r)
        if len(r) < 50:
            break
        page += 1
    return all_posts


def filter_batch_marzo(posts):
    """Devuelve los posts publicados el 28-mar-2026 (UTC ± dia)."""
    target = "2026-03-28"
    return [p for p in posts if str(p.get("date", "")).startswith(target)]


def strip_html(s):
    s = re.sub(r"<[^>]+>", " ", s)
    return re.sub(r"\s+", " ", s).strip()


def detect_ai_flags(content):
    """Cuenta señales de contenido IA-genérico."""
    low = content.lower()
    flags = []

    # Frases prohibidas
    for ph in AI_PHRASES:
        if ph in low:
            flags.append(f"frase: '{ph}'")

    # Pocas referencias geográficas
    refs = sum(1 for r in MANTA_REFS if r in low)
    if refs < 2:
        flags.append(f"solo {refs} refs Manta")

    # Sin cita textual
    if "blockquote" not in low and "<q>" not in low:
        flags.append("sin cita del equipo")

    # Patrón de listas que arrancan con sustantivos abstractos
    abstract_starts = re.findall(r"<li[^>]*>\s*(?:<strong>)?\s*(Sabor|Tradición|Pasión|Experiencia|Calidad|Excelencia)",
                                 content, re.IGNORECASE)
    if len(abstract_starts) > 2:
        flags.append(f"{len(abstract_starts)} listas con sustantivo abstracto")

    return flags


def load_gsc_csv(path):
    """Carga CSV de Search Console: cruza por URL → (clics, impresiones, ctr, pos)."""
    if not path or not Path(path).exists():
        return {}
    metrics = {}
    with open(path, encoding="utf-8") as f:
        # GSC suele tener líneas de comentario al principio
        lines = [l for l in f if not l.startswith("#")]
    reader = csv.DictReader(lines)
    for row in reader:
        # Encabezados varían: "Página", "Page", "URL"
        url = row.get("Página") or row.get("Page") or row.get("URL") or row.get("Landing page")
        if not url:
            continue
        try:
            clicks = int(row.get("Clics", row.get("Clicks", 0)) or 0)
            imp = int(row.get("Impresiones", row.get("Impressions", 0)) or 0)
            ctr = float(str(row.get("CTR", "0")).replace("%", "").replace(",", ".") or 0)
            pos = float(str(row.get("Posición", row.get("Position", 0))).replace(",", ".") or 0)
        except (ValueError, TypeError):
            continue
        # Normalizar: nos quedamos con el slug final
        slug_match = re.search(r"/([^/]+)/?$", url)
        if slug_match:
            metrics[slug_match.group(1)] = {"clicks": clicks, "imp": imp, "ctr": ctr, "pos": pos}
    return metrics


def classify(post, gsc):
    """Asigna un bucket: KEEP / REWRITE / MERGE / NOINDEX."""
    slug = post["slug"]
    content_raw = post.get("content", {}).get("rendered", "")
    text = strip_html(content_raw)
    words = len(text.split())
    ai_flags = detect_ai_flags(content_raw)

    metrics = gsc.get(slug, {})
    clicks = metrics.get("clicks", 0)
    imp = metrics.get("imp", 0)
    ctr = metrics.get("ctr", 0.0)
    pos = metrics.get("pos", 0.0)

    # Reglas de clasificación
    if clicks > 5 or imp > 200:
        if len(ai_flags) <= 1:
            action = "KEEP"
            note = "tráfico aceptable, voz aceptable"
        else:
            action = "REWRITE"
            note = f"tiene tráfico pero {len(ai_flags)} flags IA"
    elif imp > 100:
        action = "REWRITE"
        note = "impresiones sin clic, posible problema de calidad"
    elif words < 400:
        action = "NOINDEX"
        note = f"post muy corto ({words} palabras)"
    elif imp < 20 and clicks == 0:
        action = "NOINDEX"
        note = "sin tráfico ni señal de oportunidad"
    else:
        action = "REWRITE"
        note = "candidato a reescritura"

    return {
        "id": post["id"],
        "slug": slug,
        "title": strip_html(post.get("title", {}).get("rendered", "")),
        "date": post.get("date", "")[:10],
        "words": words,
        "clicks": clicks,
        "imp": imp,
        "ctr": ctr,
        "pos": pos,
        "ai_flags": " · ".join(ai_flags),
        "action": action,
        "note": note,
    }


def cluster_by_topic(rows):
    """Agrupa por palabras-clave del slug para detectar canibalización (candidatos a MERGE)."""
    clusters = defaultdict(list)
    for r in rows:
        # Token principal: primeras 2 palabras del slug
        tokens = r["slug"].split("-")
        key = "-".join(tokens[:2]) if len(tokens) >= 2 else r["slug"]
        clusters[key].append(r)
    # Solo devuelve clusters de 2+ posts
    return {k: v for k, v in clusters.items() if len(v) >= 2}


def main():
    gsc_csv = None
    for i, arg in enumerate(sys.argv):
        if arg == "--gsc-csv" and i + 1 < len(sys.argv):
            gsc_csv = sys.argv[i + 1]

    print(f"=== Luuma · Fase 4 Auditoría batch 28-mar-2026 ===")
    print(f"GSC CSV: {gsc_csv or '(no provisto, se omitirán métricas)'}\n")

    print("Descargando todos los posts del sitio...")
    posts = fetch_all_posts()
    print(f"  total posts en el sitio: {len(posts)}")

    batch = filter_batch_marzo(posts)
    print(f"  posts publicados el 28-mar: {len(batch)}")

    gsc = load_gsc_csv(gsc_csv) if gsc_csv else {}
    print(f"  métricas GSC cargadas para {len(gsc)} URLs\n")

    # Clasificar
    rows = [classify(p, gsc) for p in batch]

    # Resumen por bucket
    by_action = defaultdict(int)
    for r in rows:
        by_action[r["action"]] += 1
    print("=== Clasificación ===")
    for action in ["KEEP", "REWRITE", "MERGE", "NOINDEX"]:
        print(f"  {action:8s}  {by_action[action]:3d} posts")
    print()

    # Cluster para MERGE
    clusters = cluster_by_topic(rows)
    print(f"=== Clusters con 2+ posts (candidatos a MERGE): {len(clusters)} ===")
    for key, group in sorted(clusters.items(), key=lambda x: -len(x[1])):
        print(f"\n  cluster '{key}' ({len(group)} posts):")
        for r in group:
            print(f"    [{r['action']}] {r['slug']} | clicks={r['clicks']} imp={r['imp']}")
            # Marcar como MERGE en el output si están en cluster con 2+ con tráfico similar
            if len(group) >= 2 and r["action"] != "NOINDEX":
                r["action"] = "MERGE"
                r["note"] = f"canibalización con {len(group)-1} más"

    # CSV de salida
    out_csv = AUDIT_DIR / f"batch-marzo-{datetime.now().strftime('%Y%m%d-%H%M%S')}.csv"
    with out_csv.open("w", newline="", encoding="utf-8") as f:
        w = csv.DictWriter(f, fieldnames=["id", "slug", "title", "date", "words",
                                          "clicks", "imp", "ctr", "pos",
                                          "ai_flags", "action", "note"])
        w.writeheader()
        w.writerows(rows)
    print(f"\n=== Output CSV: {out_csv} ===")

    # JSON de clusters
    out_json = AUDIT_DIR / f"clusters-{datetime.now().strftime('%Y%m%d-%H%M%S')}.json"
    with out_json.open("w", encoding="utf-8") as f:
        json.dump(clusters, f, indent=2, ensure_ascii=False)
    print(f"=== Clusters JSON: {out_json} ===")

    print("\n→ Revisar el CSV manualmente y aprobar la lista de acciones antes de ejecutar cambios.")
    print("→ No hay script automático de NOINDEX/301/MERGE — esas decisiones las toma el cliente con nosotros.")


if __name__ == "__main__":
    main()
