"""Piezas compartidas del diseño 2026 — versión POST-cutover.
Logo real, menú overlay con URLs finales (incluye proyectos), info@, Otavalo."""
from builders import C, W, H, T, pad

LOGO_URL = "https://www.creativeweb.com.ec/wp-content/uploads/2026/09/cw-logo-blanco-2026.png"
WA = "https://wa.me/593999174980"
EMAIL = "info@creativeweb.com.ec"


def HTM(html, cls=""):
    s = {"html": html}
    if cls:
        s["_css_classes"] = cls
    return W("html", **s)


def BTNP(texto, url, cls="cw-btn-pill"):
    return W("button", cls, text=texto, size="sm", _element_width="auto",
             link={"url": url, "is_external": "", "nofollow": ""})


def CA(children, url, cls="", externo=False, **s):
    c = C(children, cls=cls, **s)
    c["settings"]["html_tag"] = "a"
    c["settings"]["link"] = {"url": url, "is_external": "on" if externo else "", "nofollow": ""}
    return c


def header():
    return C([
        C([
            HTM(f'<a href="/" style="display:flex;align-items:center;flex-shrink:0">'
                f'<img src="{LOGO_URL}" alt="Creative Web" style="height:34px;width:auto"></a>'),
            C([BTNP("Cotizar", "/contactanos/"),
               HTM('<div class="cw-hamb" role="button" aria-label="Abrir menú" '
                   'style="display:flex;flex-direction:column;gap:5px;padding:8px 2px">'
                   '<span style="width:30px;height:2px;background:#fff;display:block"></span>'
                   '<span style="width:30px;height:2px;background:#fff;display:block"></span>'
                   '<span style="width:30px;height:2px;background:#fff;display:block"></span></div>')],
              content_width="full", flex_direction="row", flex_align_items="center",
              flex_gap={"column": "18", "row": "10", "isLinked": False, "unit": "px", "size": 18},
              width={"unit": "auto", "size": ""}),
        ], content_width="boxed", flex_direction="row", flex_align_items="center",
           flex_justify_content="space-between", padding=pad(16, 24, 16, 24)),
    ], cls="cw-2026 cw-header", content_width="full", flex_direction="column")


def footer():
    return C([
        C([
            HTM(f'<img src="{LOGO_URL}" alt="Creative Web" style="height:26px;width:auto">'),
            T('<p><a href="/proyectos/">Proyectos</a> &nbsp;&nbsp; <a href="/servicios/">Servicios</a> &nbsp;&nbsp; '
              '<a href="/blog/">Blog</a> &nbsp;&nbsp; <a href="/soporte/">Soporte</a></p>'),
            T('<p class="mini">© 2026 — Otavalo, Ecuador</p>', cls="mini"),
        ], content_width="boxed", flex_direction="row", flex_justify_content="space-between",
           flex_align_items="center", flex_wrap="wrap", padding=pad(40, 24, 40, 24),
           flex_gap={"column": "20", "row": "14", "isLinked": False, "unit": "px", "size": 20}),
    ], cls="cw-2026 cw-negro cw-pie", content_width="full", flex_direction="column")


def hero_sub(kicker, titulo_html):
    return C([
        H(kicker, "div", cls="cw-kick"),
        W("heading", "cw-titulo-xl cw-blanco", title=titulo_html, header_size="h1"),
    ], cls="cw-2026 cw-negro cw-hero-sub", content_width="boxed", flex_direction="column",
       flex_gap={"column": "18", "row": "18", "isLinked": True, "unit": "px", "size": 18},
       padding=pad(150, 24, 70, 24))


def cta_mini():
    return C([
        W("heading", "cw-cta-mini", header_size="h2", title='¿Hablamos de <b>tu proyecto</b>?'),
        C([BTNP("Quiero mi diagnóstico gratis", "/contactanos/", "cw-btn-grande"),
           BTNP("Escríbenos por WhatsApp", WA)],
          content_width="full", flex_direction="row", flex_wrap="wrap",
          flex_gap={"column": "16", "row": "12", "isLinked": False, "unit": "px", "size": 16}),
    ], cls="cw-2026 cw-negro cw-final", content_width="boxed", flex_direction="column",
       flex_gap={"column": "30", "row": "30", "isLinked": True, "unit": "px", "size": 30},
       padding=pad(90, 24, 90, 24))


JS = r"""(function () {
  var reducido = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var revs = document.querySelectorAll('.cw-rev');
  if (reducido) { revs.forEach(function (el) { el.classList.add('visto'); }); }
  else {
    var obs = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('visto'); obs.unobserve(e.target); } });
    }, { threshold: 0.12 });
    revs.forEach(function (el) { obs.observe(el); });
  }
})();
(function () {
  var LINKS = [
    ['inicio', '/'],
    ['servicios', '/servicios/'],
    ['proyectos', '/proyectos/'],
    ['quiénes somos', '/quienes-somos/'],
    ['blog', '/blog/'],
    ['soporte', '/soporte/'],
    ['contacto', '/contactanos/']
  ];
  var ov = document.createElement('div');
  ov.className = 'cw-overlay';
  ov.setAttribute('role', 'dialog');
  ov.setAttribute('aria-label', 'Menú');
  var nav = '<nav>';
  LINKS.forEach(function (l, i) {
    nav += '<a href="' + l[1] + '" style="transition-delay:' + (0.05 + i * 0.05) + 's">' + l[0] + '</a>';
  });
  nav += '</nav>';
  ov.innerHTML = '<button class="cerrar" aria-label="Cerrar menú">✕</button>' + nav +
    '<p class="datos">info@creativeweb.com.ec<br><a href="https://wa.me/593999174980">WhatsApp +593 99 917 4980</a><br>Otavalo, Ecuador</p>';
  document.body.appendChild(ov);
  function abrir() { ov.classList.add('abierto'); document.body.classList.add('cw-sin-scroll'); }
  function cerrar() { ov.classList.remove('abierto'); document.body.classList.remove('cw-sin-scroll'); }
  document.querySelectorAll('.cw-hamb').forEach(function (h) {
    h.addEventListener('click', abrir);
    h.setAttribute('tabindex', '0');
    h.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); abrir(); } });
  });
  ov.querySelector('.cerrar').addEventListener('click', cerrar);
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') cerrar(); });
})();"""
