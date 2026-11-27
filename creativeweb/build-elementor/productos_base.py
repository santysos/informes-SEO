"""Constructor común de las páginas de producto (SriFlow, Boxpli, Quipuy, DentiLab).

Enfoque SEO deliberado: estas páginas NO compiten por las palabras clave del
producto (esas las gana su propio sitio: sriflow.com, boxpli.com…). Aquí el
objetivo es doble —contar el producto a fondo para demostrar que Creative Web
construye software real, y mandar el tráfico de compra al sitio del producto con
un enlace que abre en pestaña nueva—. Así no hay canibalización entre dominios
propios.
"""
from builders import C, W, H, T, pad
from shared_2026 import HTM, BTNP, CA, header, footer, hero_sub, cta_mini

ISO = '<span class="cw-iso"><i></i><i></i><i></i></span>'


def tarjeta(titulo, desc):
    return C([
        H(titulo, "h3", cls="cw-canal-tit"),
        T(f"<p>{desc}</p>", cls="cw-canal-desc"),
    ], cls="cw-canal", content_width="full", flex_direction="column",
       flex_gap={"column": "8", "row": "8", "isLinked": True, "unit": "px", "size": 8},
       padding=pad(24, 22, 24, 22),
       width={"unit": "%", "size": 31}, width_tablet={"unit": "%", "size": 48},
       width_mobile={"unit": "%", "size": 100})


def fila_plan(grad, nombre, specs, precio, url, extra="", sufijo=""):
    suf = f" <small>{sufijo}</small>" if sufijo else ""
    return CA([
        HTM(f'<div class="cw-thumb" style="background:{grad}">{ISO}</div>'),
        H(nombre, "h3"),
        T(f"<p>{specs}</p>", cls="cw-specs"),
        T(f"<p>{precio}{suf}</p>", cls="cw-precio"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls=f"cw-fila cw-rev {extra}", content_width="full", externo=True)


GRADS = ["linear-gradient(140deg,#0E2A44,#0070C0)",
         "linear-gradient(140deg,#0B2D3E,#00A0E0)",
         "linear-gradient(140deg,#0C2B26,#00A090)",
         "linear-gradient(140deg,#14243A,#2E4763)"]


def bloque_prosa(html, fondo="cw-papel", padding=None):
    return C([T(html, cls="cw-prosa")],
             cls=f"cw-2026 {fondo}", content_width="boxed", flex_direction="column",
             padding=padding or pad(70, 24, 30, 24))


def rejilla(tarjetas, titulo=None, fondo="cw-papel"):
    hijos = []
    if titulo:
        hijos.append(H(titulo, "h2", cls="cw-tit-seccion cw-rev"))
    hijos.append(C(tarjetas, content_width="full", flex_direction="row", flex_wrap="wrap",
                   flex_gap={"column": "20", "row": "20", "isLinked": True, "unit": "px", "size": 20},
                   padding=pad(16, 0, 0, 0)))
    return C(hijos, cls=f"cw-2026 {fondo}", content_width="boxed", flex_direction="column",
             flex_gap={"column": "10", "row": "10", "isLinked": True, "unit": "px", "size": 10},
             padding=pad(40, 24, 70, 24))


def cta_producto(nombre, url, texto):
    """CTA doble: al sitio del producto (pestaña nueva) y a contacto."""
    ver = BTNP(f"Ver {nombre} ↗", url, "cw-btn-grande")
    ver["settings"]["link"]["is_external"] = "on"
    return C([
        H(texto, "h2", cls="cw-cta-mini"),
        C([ver, BTNP("Hablar con nosotros", "/contactanos/")],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_justify_content="center",
          flex_gap={"column": "16", "row": "12", "isLinked": False, "unit": "px", "size": 16}),
    ], cls="cw-2026 cw-negro cw-final", content_width="boxed", flex_direction="column",
       flex_gap={"column": "26", "row": "26", "isLinked": True, "unit": "px", "size": 26},
       padding=pad(80, 24, 80, 24))


def planes(titulo, filas, nota=None):
    hijos = [H(titulo, "h2", cls="cw-titulo-xl cw-blanco cw-rev"),
             C(filas, cls="cw-filas", content_width="full", flex_direction="column",
               flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
               padding=pad(30, 0, 0, 0))]
    if nota:
        hijos.append(H(nota, "div", cls="cw-aviso"))
    return C(hijos, cls="cw-2026 cw-negro", content_width="boxed", flex_direction="column",
             padding=pad(70, 24, 70, 24))
