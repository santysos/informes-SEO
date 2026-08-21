#!/usr/bin/env python3
"""Helpers para construir los posts de Odontología Life en bloques Gutenberg.

Los specs se escriben como estructuras Python y este módulo los convierte al HTML
que espera WordPress.

POLÍTICA DE PRECIOS (definida por el cliente el 2026-08-20)
----------------------------------------------------------
La clínica NO publica tarifas: son reservadas. El formato acordado es
«desde $X», aclarando que el valor es referencial y que el precio final se
define en la valoración con el especialista, que no tiene costo.

Los valores de PRECIOS_DESDE salen de los tres posts que la propia clínica
publicó el 15-sep-2025 en su sitio. **Pendiente de confirmación del cliente.**
Si cambian, se cambian aquí y en ningún otro lado.
"""
import json, os, re

SITE = "https://www.odontologialife.com"
WA = "593984582733"          # WhatsApp general de la clínica
WA_URGENCIAS = WA            # ⚠ pendiente: confirmar el del Dr. Edison Andrade

# Solo tienen local en Otavalo (confirmado por el cliente el 2026-08-20).
CIUDAD = "Otavalo"
ZONA = ["Otavalo", "Ibarra", "Cotacachi", "Atuntaqui", "Imbabura", "plaza de Ponchos"]

CAT = {
    "prevencion": 13, "estetica": 15, "publicos": 14, "ortodoncia": 6,
    "tratamientos": 17, "habitos": 16, "implantologia": 7, "endodoncia": 10,
    "periodoncia": 8, "rehabilitacion": 9, "emergencias": 12, "cirugia": 11,
}
CAT_SLUG = {
    13: "prevencion-y-cuidado", 15: "estetica-y-tendencias",
    14: "odontologia-para-publicos-especificos", 6: "ortodoncia",
    17: "tratamientos-y-procedimientos", 16: "habitos-y-educacion",
    7: "implantologia", 10: "endodoncia", 8: "periodoncia",
    9: "rehabilitacion-oral-estetica", 12: "servicios-generales-y-emergencias",
    11: "cirugia-maxilofacial",
}

# Valores «desde» — referenciales. Ver nota de política arriba.
PRECIOS_DESDE = {
    "implante":        "$800",
    "blanqueamiento":  "$120",
    "brackets":        "$900",
    "brackets_esteticos": "$1.200",
    "alineadores":     "$1.800",
}

DISCLAIMER = ("Valor referencial. El precio final depende de tu caso y se define en la "
              "valoración con el especialista, que no tiene costo.")


def desde(servicio, texto=None):
    """Devuelve la etiqueta «desde $X» con su aclaración, en negrita."""
    v = PRECIOS_DESDE[servicio]
    etiqueta = texto or servicio.replace("_", " ")
    return f"<strong>{etiqueta}: desde {v}</strong>. {DISCLAIMER}"


def aviso_precio():
    """Párrafo de política de precios para los posts que hablan de costos."""
    return ("Un aviso antes de seguir: los valores que verás abajo son <strong>referenciales "
            "y marcan un punto de partida</strong>, no una tarifa cerrada. Dos casos que "
            "suenan iguales pueden costar distinto, y el número real sale de revisarte la "
            f"boca. Por eso en Odontología Life la <strong>valoración no tiene costo</strong>: "
            "es donde se define el presupuesto exacto, sin compromiso.")


# ── bloques Gutenberg ────────────────────────────────────────────────

def p(t):
    return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"

def h2(t):
    return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'

def h3(t):
    return (f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{t}</h3>\n'
            f"<!-- /wp:heading -->")

def ul(items):
    li = "".join(f"<li>{i}</li>" for i in items)
    return f'<!-- wp:list -->\n<ul class="wp-block-list">{li}</ul>\n<!-- /wp:list -->'

def ol(items):
    li = "".join(f"<li>{i}</li>" for i in items)
    return (f'<!-- wp:list {{"ordered":true}} -->\n<ol class="wp-block-list">{li}</ol>\n'
            f"<!-- /wp:list -->")

def quote(texto, cite):
    return ('<!-- wp:quote -->\n<blockquote class="wp-block-quote">'
            f"<p>{texto}</p><cite>{cite}</cite></blockquote>\n<!-- /wp:quote -->")

def tabla(datos):
    cab, filas = datos
    th = "".join(f"<th>{c}</th>" for c in cab)
    tr = "".join("<tr>" + "".join(f"<td>{c}</td>" for c in f) + "</tr>" for f in filas)
    return ('<!-- wp:table -->\n<figure class="wp-block-table"><table>'
            f"<thead><tr>{th}</tr></thead><tbody>{tr}</tbody>"
            "</table></figure>\n<!-- /wp:table -->")

def faq(pares):
    out = [h2("Preguntas frecuentes")]
    for preg, resp in pares:
        out.append(h3(preg))
        out.append(p(resp))
    return "\n\n".join(out)

def link(url, texto):
    return f'<a href="{url}">{texto}</a>'

def wa(mensaje):
    from urllib.parse import quote as q
    return f"https://api.whatsapp.com/send?phone={WA}&text={q(mensaje)}"


def render(bloques):
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
            out.append(quote(b["quote"], b.get("cite", "Equipo clínico de Odontología Life")))
        elif "tabla" in b:
            out.append(tabla(b["tabla"]))
        elif "faq" in b:
            out.append(faq(b["faq"]))
        else:
            raise ValueError(f"bloque desconocido: {list(b)}")
    return "\n\n".join(out)


def guarda(spec, carpeta="posts"):
    """Convierte el spec a payload de WP y lo guarda como JSON."""
    contenido = render(spec["bloques"])
    payload = {
        "title": spec["title"],
        "slug": spec["slug"],
        "date": spec["date"],
        "status": spec.get("status", "future"),
        "categories": [spec["cat"]],
        "tags": spec.get("tags", []),
        "excerpt": spec["excerpt"],
        "content": contenido,
        "meta": {
            "_yoast_wpseo_title": spec["yoast_title"],
            "_yoast_wpseo_metadesc": spec["yoast_desc"],
            "_yoast_wpseo_focuskw": spec["focus_kw"],
        },
    }
    os.makedirs(carpeta, exist_ok=True)
    ruta = os.path.join(carpeta, f"spec-{spec['slug']}.json")
    with open(ruta, "w", encoding="utf-8") as f:
        json.dump(payload, f, ensure_ascii=False, indent=1)
    palabras = len(re.sub(r"<[^>]+>", " ", contenido).split())
    return ruta, palabras


# ── mapa de URLs reales, para enlaces internos ───────────────────────

_MAPA = None

def url(slug):
    """URL pública real de un post existente. Falla si el slug no existe:
    es preferible a publicar un enlace roto."""
    global _MAPA
    if _MAPA is None:
        aquí = os.path.dirname(os.path.abspath(__file__))
        with open(os.path.join(aquí, "mapa-urls.json"), encoding="utf-8") as f:
            _MAPA = {x["slug"]: x["link"] for x in json.load(f)}
    if slug not in _MAPA:
        raise KeyError(f"slug inexistente en el sitio: {slug}")
    u = _MAPA[slug]
    if "?p=" in u:   # los posts future todavía no tienen permalink resuelto
        raise ValueError(f"'{slug}' aún no tiene URL limpia (está programado)")
    return u
