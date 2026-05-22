#!/usr/bin/env python3
"""Batch publish OKCars blog posts 2-20 to WordPress via REST API.

- Idempotent: skips if a post with the same slug already exists.
- No retries (avoids accidental duplicates that curl caused on Post 1).
- Creates blog tags on the fly if they don't exist.
"""
import base64
import json
import os
import time
import urllib.error
import urllib.parse
import urllib.request

DELAY_BETWEEN_OPS = 8   # seconds between any two API calls
DELAY_BETWEEN_POSTS = 25  # extra wait between full post publications
RETRY_ON_FAILURE = 3
RETRY_WAIT = 180  # seconds to wait if connection got reset

BASE = "https://okcars.ec/wp-json/wp/v2"
USER = "chidrobo"
PASS = "9Hus 69Hy a7Mt V9ZX FCsz AyCM"
WHATSAPP = "593986034317"
LIST_URL = "https://okcars.ec/vehiculos-okcars/"

AUTH = base64.b64encode(f"{USER}:{PASS}".encode()).decode()
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


def wa_link(article_title):
    msg = f'Hola, vengo del artículo "{article_title}" y quiero más información.'
    return f"https://wa.me/{WHATSAPP}?text={urllib.parse.quote(msg)}"


def cta_dual(article_title):
    wa = wa_link(article_title)
    return (
        '<!-- wp:buttons --><div class="wp-block-buttons">'
        '<!-- wp:button {"backgroundColor":"vivid-red"} --><div class="wp-block-button">'
        f'<a class="wp-block-button__link has-vivid-red-background-color has-background" href="{LIST_URL}">Ver inventario de seminuevos</a>'
        '</div><!-- /wp:button -->\n'
        '<!-- wp:button {"backgroundColor":"vivid-green-cyan"} --><div class="wp-block-button">'
        f'<a class="wp-block-button__link has-vivid-green-cyan-background-color has-background" href="{wa}">Hablar por WhatsApp</a>'
        '</div><!-- /wp:button -->'
        '</div><!-- /wp:buttons -->'
    )


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
    """items = list of (q, a)"""
    parts = ['<!-- wp:heading --><h2 class="wp-block-heading">Preguntas frecuentes</h2><!-- /wp:heading -->']
    for q, a in items:
        parts.append(f'<!-- wp:heading {{"level":3}} --><h3 class="wp-block-heading">{q}</h3><!-- /wp:heading -->')
        parts.append(f'<!-- wp:paragraph --><p>{a}</p><!-- /wp:paragraph -->')
    parts.append(faq_schema(items))
    return "\n\n".join(parts)


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


def conclusion_block(article_title, summary_paragraph):
    return "\n\n".join([
        h2("Conclusión"),
        p(summary_paragraph),
        p("En <strong>OKCars</strong> cada vehículo pasa por una inspección de más de 20 puntos, llega con documentos al día y respaldado por los 50 años de Comercial Hidrobo en el mercado ecuatoriano. Si quieres dar el siguiente paso con opciones verificadas:"),
        cta_dual(article_title),
    ])


def build_post(d):
    """Convert post spec dict into WP payload."""
    sections = d["sections"]
    parts = []
    # Lead
    for lp in d["lead"]:
        parts.append(p(lp))
    # Body sections
    for sec in sections:
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
    # Conclusion + CTA
    parts.append(conclusion_block(d["title"], d["conclusion"]))
    # FAQ
    parts.append(faq_html(d["faq"]))

    content = "\n\n".join(parts)

    tag_ids = [get_or_create_tag(t) for t in d["tags"]]
    return {
        "title": d["title"],
        "slug": d["slug"],
        "status": d["status"],
        "date": d["date"],
        "categories": [d["category_id"]],
        "tags": tag_ids,
        "excerpt": d["excerpt"],
        "content": content,
    }


def publish_post(spec):
    slug = spec["slug"]
    existing = api("GET", f"/posts?slug={slug}&_fields=id,slug,status,link")
    if isinstance(existing, list) and existing:
        print(f"  SKIP (exists id={existing[0]['id']}): {slug}")
        return existing[0]
    payload = build_post(spec)
    r = api("POST", "/posts", payload)
    if "_error" in r:
        print(f"  ERROR {slug}: {r}")
        return None
    word_count = len(payload["content"].split())
    print(f"  OK [{r['id']}] {slug} | ~{word_count} HTML-tokens | {r['link']}")
    return r


# ============================================================
# POSTS 2-20
# ============================================================

def load_posts():
    import glob
    here = os.path.dirname(os.path.abspath(__file__))
    files = sorted(glob.glob(os.path.join(here, "posts", "spec-*.json")))
    out = []
    for fp in files:
        with open(fp, encoding="utf-8") as f:
            out.append(json.load(f))
    return out


def main():
    posts = load_posts()
    print(f"Publishing {len(posts)} posts (delay {DELAY_BETWEEN_POSTS}s between posts)...")
    results = []
    for i, spec in enumerate(posts, 1):
        print(f"[{i}/{len(posts)}] {spec['slug']}")
        try:
            r = publish_post(spec)
            results.append((spec["slug"], r))
        except Exception as e:
            print(f"  EXC {spec['slug']}: {e}")
            results.append((spec["slug"], None))
        if i < len(posts):
            time.sleep(DELAY_BETWEEN_POSTS)
    print()
    ok = sum(1 for _, r in results if r and r.get("id"))
    print(f"Done: {ok}/{len(results)} published.")
    print()
    print("=== Resumen ===")
    for slug, r in results:
        if r and r.get("id"):
            print(f"  OK [{r['id']:5d}] {r.get('status','?'):8s} {r.get('date','')[:10]} {slug}")
        else:
            print(f"  FAIL  {slug}")


if __name__ == "__main__":
    main()
