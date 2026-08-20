#!/usr/bin/env python3
"""Helpers para construir el `content` en bloques Gutenberg de los posts de OKCars.

Los specs se escriben como estructuras Python y este módulo los convierte al HTML
que espera WordPress. Evita escribir bloques a mano y garantiza que todos los posts
salgan con el mismo formato.
"""
import json, os, re

SITE = "https://okcars.ec"
WA = "593986034317"
LISTADO = f"{SITE}/vehiculos-okcars/"

CAT = {"guias": 42, "modelos": 43, "financiamiento": 44,
       "tramites": 45, "ibarra": 46}

# Inventario verificado en las fichas públicas (agosto 2026).
# Sirve para dar ejemplos reales en lugar de cifras inventadas.
INVENTARIO = {
    "tucson_alta":  ("Hyundai Tucson", "$16.500", "186.604 km"),
    "tucson_baja":  ("Hyundai Tucson", "$9.500",  "281.682 km"),
    "cx5":          ("Mazda CX-5",     "$31.900", "46.500 km"),
    "seltos":       ("Kia Seltos 2025","$20.500", "64.560 km"),
    "territory":    ("Ford Territory 2025", "$20.500", "67.000 km"),
    "bt50":         ("Mazda BT-50",    "$25.900", "145.000 km"),
    "hunter":       ("Changan Hunter", "$25.900", "4.500 km"),
    "sienna":       ("Toyota Sienna XLE", "$38.000", "78.657 km"),
}


def p(t):
    return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"

def h2(t):
    return (f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n'
            f"<!-- /wp:heading -->")

def h3(t):
    return (f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{t}</h3>\n'
            f"<!-- /wp:heading -->")

def ul(items):
    lis = "".join(f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->\n" for i in items)
    return f'<!-- wp:list -->\n<ul class="wp-block-list">\n{lis}</ul>\n<!-- /wp:list -->'

def ol(items):
    lis = "".join(f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->\n" for i in items)
    return ('<!-- wp:list {"ordered":true} -->\n<ol class="wp-block-list">\n'
            f"{lis}</ol>\n<!-- /wp:list -->")

def quote(texto, autor):
    return ('<!-- wp:quote -->\n<blockquote class="wp-block-quote">\n'
            f"<!-- wp:paragraph -->\n<p>{texto}</p>\n<!-- /wp:paragraph -->\n"
            f"<cite>{autor}</cite>\n</blockquote>\n<!-- /wp:quote -->")

def tabla(head, rows):
    th = "".join(f"<th>{h}</th>" for h in head)
    tb = "".join("<tr>" + "".join(f"<td>{c}</td>" for c in r) + "</tr>" for r in rows)
    return ('<!-- wp:table -->\n<figure class="wp-block-table"><table class="has-fixed-layout">'
            f"<thead><tr>{th}</tr></thead><tbody>{tb}</tbody></table></figure>\n"
            "<!-- /wp:table -->")

def link(url, texto):
    return f'<a href="{url}">{texto}</a>'

def wa(mensaje):
    from urllib.parse import quote as q
    return f"https://wa.me/{WA}?text={q(mensaje)}"


def render(bloques):
    """Convierte una lista de bloques (dicts o strings) en HTML Gutenberg."""
    out = []
    for b in bloques:
        if isinstance(b, str):
            out.append(p(b))
        elif "h2" in b:
            out.append(h2(b["h2"]))
        elif "h3" in b:
            out.append(h3(b["h3"]))
        elif "ul" in b:
            out.append(ul(b["ul"]))
        elif "ol" in b:
            out.append(ol(b["ol"]))
        elif "quote" in b:
            out.append(quote(b["quote"], b["cite"]))
        elif "tabla" in b:
            out.append(tabla(b["tabla"][0], b["tabla"][1]))
        elif "faq" in b:
            out.append(h2(b.get("faq_titulo", "Preguntas frecuentes")))
            for q_, a_ in b["faq"]:
                out.append(h3(q_))
                out.append(p(a_))
    return "\n\n".join(out)


def guarda(spec, carpeta=None):
    """Escribe el spec como JSON listo para publish_batch.py."""
    carpeta = carpeta or os.path.join(os.path.dirname(os.path.abspath(__file__)), "posts")
    os.makedirs(carpeta, exist_ok=True)
    d = {
        "title": spec["title"],
        "slug": spec["slug"],
        "status": spec.get("status", "future"),
        "date": spec["date"],
        "categories": [spec["cat"]],
        "tags": spec["tags"],
        "excerpt": spec["excerpt"],
        "meta": {
            "_yoast_wpseo_title": spec["yoast_title"],
            "_yoast_wpseo_metadesc": spec["yoast_desc"],
            "_yoast_wpseo_focuskw": spec["focus_kw"],
        },
        "content": render(spec["bloques"]),
    }
    ruta = os.path.join(carpeta, f"spec-{spec['slug']}.json")
    with open(ruta, "w", encoding="utf-8") as f:
        json.dump(d, f, ensure_ascii=False, indent=1)
    palabras = len(re.sub(r"<[^>]+>", " ", d["content"]).split())
    return ruta, palabras
