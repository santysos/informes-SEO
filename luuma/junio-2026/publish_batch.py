#!/usr/bin/env python3
"""Batch publish Luuma Rooftop blog posts (Fase 2 — 10 posts hiperlocales) vía WP REST API.

Patrón heredado de okcars/abril-2026/publish_batch.py con cambios clave:

- NO incluye bloque "Conclusión" (regla anti-IA explícita del cliente).
- Cierre obligatorio: CTA específico (reserva WhatsApp, link al menú) + 2-3 enlaces internos.
- Yoast meta vía REST: _yoast_wpseo_title, _yoast_wpseo_metadesc, _yoast_wpseo_focuskw.
  (Si Yoast los bloquea silenciosamente, hay fallback mu-plugin tipo Dimapar.)
- Validación anti-IA: rechaza el post si detecta frases de la lista negra.
- WAF-safe: delays 8s/25s, User-Agent navegador, urllib no curl.
- Idempotente: skip si el slug ya existe.

Credenciales en .env del repo: LUUMA_WP_BASE, LUUMA_WP_USER, LUUMA_WP_APP_PASS, LUUMA_WHATSAPP.
"""
import base64
import json
import os
import sys
import time
import urllib.error
import urllib.parse
import urllib.request
from pathlib import Path

# ============================================================
# Config
# ============================================================
ROOT = Path(__file__).resolve().parents[2]
ENV_FILE = ROOT / ".env"

DELAY_BETWEEN_OPS = 8       # segundos entre cualquier par de llamadas API
DELAY_BETWEEN_POSTS = 25    # extra entre publicaciones completas
# IMPORTANTE: este script publica de a 1-2 posts por semana, NO en batch masivo.
# Razón: Google ya nos vio publicar 56 posts el 28-mar. Patrón humano = espaciado.
RETRY_ON_FAILURE = 3
RETRY_WAIT = 180

# Lista negra anti-IA (cliente lo pidió explícitamente)
BLACKLIST_PHRASES = [
    "en conclusión",
    "en conclusion",
    "en resumen",
    "en definitiva",
    "para concluir",
    "sin duda alguna",
    "es importante destacar",
    "cabe mencionar",
    "mundo gastronómico",
    "mundo gastronomico",
    "experiencia única",
    "experiencia unica",
    "viaje sensorial",
    "deleitar el paladar",
    "si eres un amante de",
    "esperamos verte pronto",
]

# Calles/zonas de Manta — exigir al menos 2 menciones por post
MANTA_REFERENCES = [
    "flavio reyes", "malecón", "malecon", "la quadra", "tarqui",
    "umiña", "umina", "barbasquillo", "murciélago", "murcielago",
    "san mateo", "el palmar", "la aurora", "manabí", "manabi",
]


# ============================================================
# Env loader
# ============================================================
def load_env():
    env = {}
    if not ENV_FILE.exists():
        sys.exit(f"ERROR: no existe {ENV_FILE}. Agrega LUUMA_WP_BASE, LUUMA_WP_USER, LUUMA_WP_APP_PASS, LUUMA_WHATSAPP.")
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
BASE = E["LUUMA_WP_BASE"].rstrip("/")  # ej. https://www.luumarooftop.com/wp-json/wp/v2
USER = E["LUUMA_WP_USER"]
PASS = E["LUUMA_WP_APP_PASS"]
WHATSAPP = E.get("LUUMA_WHATSAPP", "")  # ej. 593963485983
MENU_URL = E.get("LUUMA_MENU_URL", "https://www.luumarooftop.com/menu/")

AUTH = base64.b64encode(f"{USER}:{PASS}".encode()).decode()
HEADERS = {
    "Content-Type": "application/json; charset=utf-8",
    "Authorization": f"Basic {AUTH}",
    "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36",
    "Accept": "application/json, */*;q=0.8",
    "Accept-Language": "es-EC,es;q=0.9,en;q=0.8",
}


# ============================================================
# REST helper
# ============================================================
def api(method, path, body=None):
    url = f"{BASE}{path}"
    data = json.dumps(body, ensure_ascii=False).encode("utf-8") if body else None
    last_err = None
    for attempt in range(RETRY_ON_FAILURE + 1):
        req = urllib.request.Request(url, data=data, headers=HEADERS, method=method)
        try:
            with urllib.request.urlopen(req, timeout=90) as r:
                time.sleep(DELAY_BETWEEN_OPS)
                return json.loads(r.read().decode())
        except urllib.error.HTTPError as e:
            try:
                return {"_error": True, "_code": e.code, "_body": json.loads(e.read().decode())}
            except Exception:
                return {"_error": True, "_code": e.code, "_body": str(e)}
        except (urllib.error.URLError, ConnectionResetError, TimeoutError) as e:
            last_err = e
            print(f"    [retry {attempt+1}/{RETRY_ON_FAILURE}] {method} {path}: {e}; waiting {RETRY_WAIT}s")
            time.sleep(RETRY_WAIT)
    return {"_error": True, "_code": 0, "_body": f"All retries failed: {last_err}"}


# ============================================================
# Helpers de tags / slugify
# ============================================================
def slugify(s):
    repl = str.maketrans("áàäéèëíìïóòöúùüñÁÀÄÉÈËÍÌÏÓÒÖÚÙÜÑ", "aaaeeeiiiooouuunAAAEEEIIIOOOUUUN")
    s = s.translate(repl).lower()
    out = []
    for ch in s:
        if ch.isalnum():
            out.append(ch)
        elif ch in " -_":
            out.append("-")
    s2 = "".join(out)
    while "--" in s2:
        s2 = s2.replace("--", "-")
    return s2.strip("-")


_tag_cache = {}


def get_or_create_tag(name):
    if name in _tag_cache:
        return _tag_cache[name]
    slug = slugify(name)
    existing = api("GET", f"/tags?slug={urllib.parse.quote(slug)}")
    if isinstance(existing, list) and existing:
        _tag_cache[name] = existing[0]["id"]
        return existing[0]["id"]
    r = api("POST", "/tags", {"name": name})
    if "_error" in r:
        existing = api("GET", f"/tags?search={urllib.parse.quote(name)}")
        if isinstance(existing, list) and existing:
            _tag_cache[name] = existing[0]["id"]
            return existing[0]["id"]
        raise RuntimeError(f"Tag '{name}' failed: {r}")
    _tag_cache[name] = r["id"]
    return r["id"]


# ============================================================
# CTAs
# ============================================================
def wa_link(article_title):
    if not WHATSAPP:
        return "#whatsapp-pendiente"
    msg = f'Hola, vengo del artículo "{article_title}" en luumarooftop.com y quiero reservar.'
    return f"https://wa.me/{WHATSAPP}?text={urllib.parse.quote(msg)}"


def cta_reservar(article_title):
    """Cierre del post: CTA reserva WhatsApp + link al menú. NUNCA con frase tipo 'esperamos verte'."""
    wa = wa_link(article_title)
    return (
        '<!-- wp:buttons --><div class="wp-block-buttons">'
        '<!-- wp:button {"backgroundColor":"vivid-red"} --><div class="wp-block-button">'
        f'<a class="wp-block-button__link has-vivid-red-background-color has-background" href="{wa}">Reservar mesa por WhatsApp</a>'
        '</div><!-- /wp:button -->\n'
        '<!-- wp:button {"className":"is-style-outline"} --><div class="wp-block-button is-style-outline">'
        f'<a class="wp-block-button__link" href="{MENU_URL}">Ver nuestra carta</a>'
        '</div><!-- /wp:button -->'
        '</div><!-- /wp:buttons -->'
    )


def internal_links_block(links):
    """links = [(label, url), ...]  → 2-3 enlaces internos relacionados."""
    if not links:
        return ""
    items = "".join(f'<li><a href="{url}">{label}</a></li>' for label, url in links)
    return (
        '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Sigue leyendo</h3><!-- /wp:heading -->\n'
        f'<!-- wp:list --><ul>{items}</ul><!-- /wp:list -->'
    )


# ============================================================
# FAQ + schema
# ============================================================
def faq_schema(items):
    schema = {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": q,
                "acceptedAnswer": {"@type": "Answer", "text": a},
            }
            for q, a in items
        ],
    }
    return (
        '<!-- wp:html --><script type="application/ld+json">\n'
        + json.dumps(schema, ensure_ascii=False, indent=2)
        + '\n</script><!-- /wp:html -->'
    )


def faq_html(items):
    if not items:
        return ""
    parts = ['<!-- wp:heading --><h2 class="wp-block-heading">Preguntas frecuentes</h2><!-- /wp:heading -->']
    for q, a in items:
        parts.append(f'<!-- wp:heading {{"level":3}} --><h3 class="wp-block-heading">{q}</h3><!-- /wp:heading -->')
        parts.append(f'<!-- wp:paragraph --><p>{a}</p><!-- /wp:paragraph -->')
    parts.append(faq_schema(items))
    return "\n\n".join(parts)


# ============================================================
# Bloques Gutenberg helpers
# ============================================================
def p(text):
    return f"<!-- wp:paragraph --><p>{text}</p><!-- /wp:paragraph -->"


def h2(text):
    return f'<!-- wp:heading --><h2 class="wp-block-heading">{text}</h2><!-- /wp:heading -->'


def h3(text):
    return f'<!-- wp:heading {{"level":3}} --><h3 class="wp-block-heading">{text}</h3><!-- /wp:heading -->'


def ul(items):
    lis = "".join(f"<li>{i}</li>" for i in items)
    return f"<!-- wp:list --><ul>{lis}</ul><!-- /wp:list -->"


def ol(items):
    lis = "".join(f"<li>{i}</li>" for i in items)
    return f'<!-- wp:list {{"ordered":true}} --><ol>{lis}</ol><!-- /wp:list -->'


def table(headers, rows):
    head = "".join(f"<th>{h}</th>" for h in headers)
    body = "".join(
        "<tr>" + "".join(f"<td>{c}</td>" for c in r) + "</tr>" for r in rows
    )
    return (
        '<!-- wp:table --><figure class="wp-block-table"><table>'
        f"<thead><tr>{head}</tr></thead><tbody>{body}</tbody></table></figure><!-- /wp:table -->"
    )


def quote_block(text, citation):
    """Cita textual del equipo (chef, bartender, gerente). Obligatoria en cada post."""
    return (
        '<!-- wp:quote --><blockquote class="wp-block-quote">'
        f'<p>{text}</p>'
        f'<cite>{citation}</cite>'
        '</blockquote><!-- /wp:quote -->'
    )


# ============================================================
# Anti-IA validator
# ============================================================
def validate_anti_ai(content, slug):
    """Rechaza el post si suena a IA genérica. Devuelve lista de issues."""
    issues = []
    low = content.lower()

    # Lista negra de frases
    for phrase in BLACKLIST_PHRASES:
        if phrase in low:
            issues.append(f"contiene frase prohibida: '{phrase}'")

    # Mínimo 2 referencias geográficas concretas de Manta
    refs_found = sum(1 for ref in MANTA_REFERENCES if ref in low)
    if refs_found < 2:
        issues.append(f"solo {refs_found} referencias geográficas Manta (mínimo 2)")

    # Debe tener al menos un blockquote (cita del equipo)
    if "wp-block-quote" not in content:
        issues.append("no contiene cita textual del equipo (blockquote)")

    return issues


# ============================================================
# Build post
# ============================================================
def build_post(d):
    """Convierte spec dict en payload WP. Sin bloque conclusión por regla anti-IA."""
    parts = []

    # Lead (introducción 80-120 palabras)
    for lp in d["lead"]:
        parts.append(p(lp))

    # Body
    for sec in d["sections"]:
        parts.append(h2(sec["h2"]))
        for block in sec.get("blocks", []):
            kind = block["type"]
            if kind == "p":
                parts.append(p(block["text"]))
            elif kind == "h3":
                parts.append(h3(block["text"]))
            elif kind == "ul":
                parts.append(ul(block["items"]))
            elif kind == "ol":
                parts.append(ol(block["items"]))
            elif kind == "table":
                parts.append(table(block["headers"], block["rows"]))
            elif kind == "quote":
                parts.append(quote_block(block["text"], block["citation"]))

    # CTA cierre (NO bloque "Conclusión")
    parts.append(h2(d.get("cta_heading", "Te esperamos en Luuma")))
    if d.get("cta_paragraph"):
        parts.append(p(d["cta_paragraph"]))
    parts.append(cta_reservar(d["title"]))

    # Enlaces internos (sigue leyendo)
    if d.get("internal_links"):
        parts.append(internal_links_block([(l["label"], l["url"]) for l in d["internal_links"]]))

    # FAQ
    if d.get("faq"):
        parts.append(faq_html([(f["q"], f["a"]) for f in d["faq"]]))

    content = "\n\n".join(parts)

    # Validación anti-IA
    issues = validate_anti_ai(content, d["slug"])
    if issues:
        print(f"  ⚠ ANTI-IA WARNINGS para {d['slug']}:")
        for i in issues:
            print(f"     - {i}")
        if d.get("force") is not True:
            print(f"  ✗ SKIP: agrega \"force\": true al spec si quieres publicar igual.")
            return None

    tag_ids = [get_or_create_tag(t) for t in d.get("tags", [])]

    payload = {
        "title": d["title"],
        "slug": d["slug"],
        "status": d.get("status", "draft"),
        "date": d.get("date"),
        "categories": [d["category_id"]],
        "tags": tag_ids,
        "excerpt": d.get("excerpt", ""),
        "content": content,
        "meta": {
            "_yoast_wpseo_title": d.get("yoast_title", ""),
            "_yoast_wpseo_metadesc": d.get("yoast_metadesc", ""),
            "_yoast_wpseo_focuskw": d.get("yoast_focuskw", ""),
        },
    }
    if d.get("featured_media"):
        payload["featured_media"] = d["featured_media"]
    return payload


# ============================================================
# Publish (idempotent)
# ============================================================
def publish_post(spec):
    slug = spec["slug"]
    # Buscar en cualquier status (draft, future, publish, private) — no solo publish.
    # El default de la REST devuelve solo publish, que falla con posts programados.
    existing = api("GET", f"/posts?slug={slug}&status=any&_fields=id,slug,status,link")
    if isinstance(existing, list) and existing:
        print(f"  SKIP (exists id={existing[0]['id']}): {slug}")
        return existing[0]
    payload = build_post(spec)
    if payload is None:
        return None
    r = api("POST", "/posts", payload)
    if "_error" in r:
        print(f"  ERROR {slug}: {r}")
        return None
    word_count = len(payload["content"].split())
    print(f"  OK [{r['id']}] {slug} | ~{word_count} HTML-tokens | {r['link']}")

    # Verificación Yoast: leer el post y avisar si el meta no se guardó
    check = api("GET", f"/posts/{r['id']}?context=edit&_fields=meta")
    if isinstance(check, dict):
        meta_check = check.get("meta", {})
        if not meta_check.get("_yoast_wpseo_title"):
            print(f"  ⚠ Yoast meta NO se persistió. Verifica manualmente en /wp-admin/post.php?post={r['id']}&action=edit")
    return r


# ============================================================
# Loader + main
# ============================================================
def load_specs():
    import glob
    here = Path(__file__).resolve().parent
    files = sorted(glob.glob(str(here / "posts" / "spec-*.json")))
    out = []
    for fp in files:
        with open(fp, encoding="utf-8") as f:
            spec = json.load(f)
            if spec.get("skip"):
                continue
            out.append(spec)
    return out


def main():
    specs = load_specs()
    if not specs:
        print("No hay specs publicables en posts/. Si los specs tienen 'skip': true, sácalo cuando estén listos.")
        return
    print(f"Publicando {len(specs)} posts (delay {DELAY_BETWEEN_POSTS}s entre posts)...")
    print(f"⚠ Recordatorio: publicación humana = 1-2 posts/semana, no batch masivo.")
    results = []
    for i, spec in enumerate(specs, 1):
        print(f"\n[{i}/{len(specs)}] {spec['slug']}")
        try:
            r = publish_post(spec)
            results.append((spec["slug"], r))
        except Exception as e:
            print(f"  EXC {spec['slug']}: {e}")
            results.append((spec["slug"], None))
        if i < len(specs):
            time.sleep(DELAY_BETWEEN_POSTS)
    print()
    ok = sum(1 for _, r in results if r and r.get("id"))
    print(f"\n=== Resumen: {ok}/{len(results)} publicados ===")
    for slug, r in results:
        if r and r.get("id"):
            print(f"  OK [{r['id']:5d}] {r.get('status','?'):8s} {r.get('date','')[:10]} {slug}")
        else:
            print(f"  FAIL  {slug}")


if __name__ == "__main__":
    main()
