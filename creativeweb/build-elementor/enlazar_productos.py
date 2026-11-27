#!/usr/bin/env python3
"""Conecta las páginas de producto con el resto del sitio.

1. /servicios/ (929): nueva sección «productos propios» con las 5 fichas, que
   hasta ahora eran páginas huérfanas (nada del sitio las enlazaba).
2. /proyectos/ (3856): las tarjetas de Quipuy y Boxpli dejan de apuntar al sitio
   externo y llevan a la página interna, que a su vez enlaza al producto. Además
   se corrige el texto de Boxpli: «de 20 minutos a 2 por pedido» venía de un
   testimonio de relleno de su propia landing, no de un dato medido.
"""
import json
import random
import time

import emcp
from builders import C, H, T, pad, aplicar_clases
from productos_base import ISO
from shared_2026 import HTM, CA

SERVICIOS = 929
PROYECTOS = 3856

PRODUCTOS = [
    ("linear-gradient(140deg,#0E2A44,#0070C0)", "Quipuy",
     "Facturación electrónica al SRI con inventario y contabilidad, y módulos para "
     "restaurante, alquileres y punto de venta.",
     "desde $6 <small>/año</small>", "/servicios/quipuy-facturacion-electronica/"),
    ("linear-gradient(140deg,#0B2D3E,#00A0E0)", "SriFlow",
     "Descarga los comprobantes del SRI de un mes o un año entero y te deja el Excel "
     "listo para declarar. Para contadores.",
     "desde $6 <small>/mes</small>", "/servicios/sriflow-descargar-comprobantes-sri/"),
    ("linear-gradient(140deg,#0C2B26,#00A090)", "DentiLab",
     "Historia clínica, odontograma y agenda con recordatorios por WhatsApp para "
     "consultorios y clínicas dentales.",
     "desde $20 <small>/mes</small>", "/servicios/dentilab-software-clinicas-dentales/"),
    ("linear-gradient(140deg,#14243A,#2E4763)", "Boxpli",
     "Etiquetas de envío en PDF y aviso de rastreo por WhatsApp para tiendas que "
     "despachan por courier.",
     "gratis o desde $9.90 <small>/mes</small>", "/servicios/boxpli-etiquetas-de-envio/"),
    ("linear-gradient(140deg,#0E2A44,#00A0E0)", "Motrix",
     "Software para consultorios médicos: historia clínica, agenda y seguimiento "
     "de pacientes.",
     "consultar", "/servicios/motrix-software-consultorios/"),
]


def fila(grad, nombre, desc, precio, url):
    return CA([
        HTM(f'<div class="cw-thumb" style="background:{grad}">{ISO}</div>'),
        H(nombre, "h3"),
        T(f"<p>{desc}</p>", cls="cw-desc"),
        T(f"<p>{precio}</p>", cls="cw-precio"),
        HTM('<div class="cw-ir">→</div>'),
    ], url, cls="cw-fila cw-rev", content_width="full")


seccion = C([
    H('productos propios<span class="l2">que ya están funcionando</span>', "h2",
      cls="cw-titulo-xl cw-blanco cw-rev"),
    T("<p>No solo hacemos software por encargo: mantenemos nuestros propios productos, "
      "con clientes pagando y soporte todos los días. Es la prueba más honesta de que "
      "sabemos construir y sostener un sistema en el tiempo.</p>", cls="cw-nota cw-rev"),
    C([fila(*p) for p in PRODUCTOS], cls="cw-filas", content_width="full",
      flex_direction="column",
      flex_gap={"column": "0", "row": "0", "isLinked": True, "unit": "px", "size": 0},
      padding=pad(24, 0, 0, 0)),
], cls="cw-2026 cw-negro cw-productos", content_width="boxed", flex_direction="column",
   flex_gap={"column": "14", "row": "14", "isLinked": True, "unit": "px", "size": 14},
   padding=pad(70, 24, 80, 24))


def insertar_en_servicios():
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{SERVICIOS}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    d = json.loads(r.json()["meta"]["_elementor_data"])
    d = [c for c in d if "cw-productos" not in json.dumps(c, ensure_ascii=False)]
    # antes del CTA final (penúltimo es cw-final, último cw-pie)
    idx = next((i for i, c in enumerate(d)
                if "cw-final" in (c.get("settings") or {}).get("css_classes", "")), len(d) - 1)
    d.insert(idx, seccion)
    r2 = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{SERVICIOS}", headers=emcp.HEAD,
                            params={"cb": random.randint(1, 10**9)},
                            json={"meta": {"_elementor_data": json.dumps(d, ensure_ascii=False)}},
                            timeout=90)
    print("servicios 929:", r2.status_code, "| sección insertada en posición", idx)
    # OJO: NO usar aplicar_clases() con un árbol parcial. Recorre la página por
    # orden, así que le puso las clases de esta sección al PRIMER contenedor (el
    # header, que perdió `cw-header` y quedó descuadrado en móvil). Aquí las
    # clases ya viajan dentro del JSON que se escribe, no hace falta reaplicarlas.


CAMBIOS_PROYECTOS = {
    "quipuy.com": ("/servicios/quipuy-facturacion-electronica/", None),
    "boxpli.com": ("/servicios/boxpli-etiquetas-de-envio/",
                   "Etiquetas de envío en PDF y avisos de rastreo por WhatsApp para tiendas "
                   "que despachan por courier."),
}
TEXTO_VIEJO_BOXPLI = ("Nuestra plataforma de envíos: despachos de tienda en línea de 20 "
                      "minutos a 2 por pedido.")
TEXTO_NUEVO_BOXPLI = ("Nuestra plataforma de envíos: etiquetas en PDF listas para imprimir y "
                      "aviso de rastreo por WhatsApp, sin copiar datos a mano.")


def arreglar_proyectos():
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{PROYECTOS}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    d = json.loads(r.json()["meta"]["_elementor_data"])
    cambios = []

    def walk(els):
        if not isinstance(els, list):
            return
        for e in els:
            if not isinstance(e, dict):
                continue
            s = e.get("settings")
            if isinstance(s, dict):
                enlace = s.get("link") or {}
                url = enlace.get("url", "") if isinstance(enlace, dict) else ""
                for dominio, (destino, _) in CAMBIOS_PROYECTOS.items():
                    if dominio in url:
                        s["link"] = {"url": destino, "is_external": "", "nofollow": ""}
                        cambios.append(f"{dominio} → {destino}")
                ed = s.get("editor")
                if isinstance(ed, str) and TEXTO_VIEJO_BOXPLI in ed:
                    s["editor"] = ed.replace(TEXTO_VIEJO_BOXPLI, TEXTO_NUEVO_BOXPLI)
                    cambios.append("texto de Boxpli corregido")
            walk(e.get("elements"))
    walk(d)
    if not cambios:
        print("proyectos 3856: sin cambios")
        return
    r2 = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{PROYECTOS}", headers=emcp.HEAD,
                            params={"cb": random.randint(1, 10**9)},
                            json={"meta": {"_elementor_data": json.dumps(d, ensure_ascii=False)}},
                            timeout=90)
    print("proyectos 3856:", r2.status_code, "|", " · ".join(cambios))


def regenerar_css(pid, url):
    for _ in range(3):
        emcp.call("emcp-tools-update-page-settings", {"post_id": pid, "settings": {"hide_title": "yes"}})
        emcp.flush_css()
        time.sleep(2)
        emcp._session.get(url, headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                          params={"cb": random.randint(1, 10**9)}, timeout=90)
        c = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                              params={"cb": random.randint(1, 10**9)}, timeout=60)
        print(f"  css post-{pid}: {c.status_code}")
        if c.status_code == 200:
            return


if __name__ == "__main__":
    emcp.init()
    insertar_en_servicios()
    arreglar_proyectos()
    regenerar_css(SERVICIOS, f"{emcp.BASE}/servicios/")
    regenerar_css(PROYECTOS, f"{emcp.BASE}/proyectos/")
    emcp.flush_css()
    print("OK enlaces de productos")
