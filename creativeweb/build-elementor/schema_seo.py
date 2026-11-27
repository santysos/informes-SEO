#!/usr/bin/env python3
"""JSON-LD (schema.org) en las páginas de servicio y de producto.

Yoast ya emite WebPage, WebSite, BreadcrumbList y Organization, pero nada que
describa *qué se vende*. Esto añade, por página:

  - `Service` (servicios) o `SoftwareApplication` (los cinco productos propios),
    con su precio cuando la página lo muestra.
  - `FAQPage` con las preguntas frecuentes, tomadas del HTML real de la página.

Y, solo en la portada y en /contactanos/, un nodo `ProfessionalService` con los
datos del negocio (Otavalo, WhatsApp, horario). Yoast no los emite porque eso
vive en su addon de Local SEO, que no está instalado.

Reglas que se respetan a propósito:
  - `provider` apunta por @id al nodo Organization de Yoast, que ya está en la
    misma página; no se duplica.
  - Las preguntas y respuestas del FAQPage se extraen del contenido publicado,
    nunca se escriben aquí: si el schema y el texto visible no coinciden, Google
    lo trata como spam.
  - No hay `aggregateRating` en ninguna parte. No tenemos reseñas reales y
    inventarlas es motivo de penalización manual.
  - No hay `streetAddress`: la empresa no publica una dirección de calle, así
    que se declara solo la localidad.

Es idempotente: cada página guarda su JSON-LD en un widget HTML marcado con
`MARCA`, que se reemplaza en cada ejecución.
"""
import html as HTML
import json
import random
import re
import time

import emcp

B = "https://www.creativeweb.com.ec"
ORG = {"@id": f"{B}/#organization"}
MARCA = "cw-schema-seo"
ECUADOR = {"@type": "Country", "name": "Ecuador"}


def precio(valor, desc=None, moneda="USD"):
    o = {"@type": "Offer", "price": str(valor), "priceCurrency": moneda,
         "availability": "https://schema.org/InStock"}
    if desc:
        o["description"] = desc
    return o


# pid -> (ruta, nodo base del servicio/producto)
PAGINAS = {
    1436: ("/servicios/paginas-web/", {
        "@type": "Service",
        "name": "Diseño y desarrollo de páginas web",
        "serviceType": "Diseño y desarrollo web",
        "description": "Páginas web rápidas en el celular y preparadas para aparecer en Google, "
                       "con dominio, hosting y correos incluidos el primer año.",
        "offers": precio(480, "desde $480 + IVA, según el alcance del proyecto"),
    }),
    3625: ("/servicios/tiendas-online-ecuador/", {
        "@type": "Service",
        "name": "Desarrollo de tiendas en línea con WooCommerce",
        "serviceType": "Desarrollo de comercio electrónico",
        "description": "Tiendas en línea sobre WooCommerce que cobran en línea, controlan "
                       "inventario, calculan envíos y se conectan con la facturación del SRI.",
        "offers": precio(680, "desde $680 + IVA, según el catálogo y las integraciones"),
    }),
    3624: ("/servicios/seo-posicionamiento-web/", {
        "@type": "Service",
        "name": "Posicionamiento SEO en Google",
        "serviceType": "Posicionamiento en buscadores (SEO)",
        "description": "Análisis con datos de Search Console y trabajo mensual de contenido, "
                       "estructura y arreglos técnicos, medido en contactos y ventas.",
        "offers": precio(100, "desde $100 + IVA al mes"),
    }),
    1282: ("/servicios/hosting-web-ecuador/", {
        "@type": "Service",
        "name": "Hosting web en Ecuador",
        "serviceType": "Alojamiento web",
        "description": "Alojamiento con cPanel en español, certificado SSL, correos "
                       "corporativos, respaldos y soporte local por WhatsApp.",
        "offers": precio(4.99, "desde $4.99 + IVA al mes, con contratación anual"),
    }),
    1699: ("/servicios/comprar-dominio-ecuador/", {
        "@type": "Service",
        "name": "Registro de dominios .com, .ec y .com.ec",
        "serviceType": "Registro de nombres de dominio",
        "description": "Registro y renovación de dominios a nombre de tu empresa, con la "
                       "configuración de DNS, hosting y correos incluida.",
        "offers": precio(21.99, "desde $21.99 + IVA al año (.com, .net, .org); "
                                "$43.99 los dominios .ec y .com.ec"),
    }),
    931: ("/servicios/correos-corporativos-empresariales/", {
        "@type": "Service",
        "name": "Correo corporativo con dominio propio",
        "serviceType": "Correo electrónico empresarial",
        "description": "Cuentas nombre@tuempresa.com con antispam y antivirus, configuradas "
                       "por nosotros en el celular y la computadora.",
    }),
    3629: ("/servicios/facturacion-electronica-woocommerce-sri/", {
        "@type": "Service",
        "name": "Facturación electrónica del SRI en WooCommerce",
        "serviceType": "Integración de facturación electrónica",
        "description": "Integración para que cada pedido pagado emita su comprobante "
                       "electrónico al SRI sin copiar datos a otro sistema.",
    }),
    3627: ("/servicios/probador-virtual-tienda-ropa/", {
        "@type": "Service",
        "name": "Probador virtual para tiendas de ropa",
        "serviceType": "Probador virtual con inteligencia artificial",
        "description": "La clienta se ve con la prenda antes de comprar, desde su teléfono y "
                       "dentro de la misma tienda, sin instalar nada.",
    }),
    3630: ("/servicios/quipuy-facturacion-electronica/", {
        "@type": "SoftwareApplication",
        "name": "Quipuy",
        "applicationCategory": "BusinessApplication",
        "description": "Sistema de facturación electrónica al SRI con inventario, "
                       "contabilidad NIIF y módulos para restaurante, alquileres y punto "
                       "de venta.",
        "offers": precio(6, "desde $6 al año"),
    }),
    3975: ("/servicios/sriflow-descargar-comprobantes-sri/", {
        "@type": "SoftwareApplication",
        "name": "SriFlow",
        "applicationCategory": "BusinessApplication",
        "description": "Programa para contadores que descarga en lote los comprobantes "
                       "electrónicos del SRI y entrega el Excel con el IVA desglosado.",
        "offers": precio(6, "desde $6 al mes"),
    }),
    3631: ("/servicios/dentilab-software-clinicas-dentales/", {
        "@type": "SoftwareApplication",
        "name": "DentiLab",
        "applicationCategory": "HealthApplication",
        "description": "Software para consultorios y clínicas dentales: historia clínica "
                       "MSP-033, odontograma FDI, agenda con recordatorios por WhatsApp y "
                       "facturación al SRI.",
        "offers": precio(20, "desde $20 al mes"),
    }),
    3981: ("/servicios/boxpli-etiquetas-de-envio/", {
        "@type": "SoftwareApplication",
        "name": "Boxpli",
        "applicationCategory": "BusinessApplication",
        "description": "Genera etiquetas de envío en PDF, imprime en lote y avisa al cliente "
                       "por WhatsApp con su número de rastreo.",
        "offers": precio(0, "plan gratuito; planes de pago desde $9.90 al mes"),
    }),
    3626: ("/servicios/motrix-software-consultorios/", {
        "@type": "SoftwareApplication",
        "name": "Motrix",
        "applicationCategory": "HealthApplication",
        "description": "Sistema de gestión para consultorios y centros de terapia: pacientes, "
                       "citas, historial, consentimiento informado y facturación al SRI.",
    }),
}

NEGOCIO = {
    "@type": "ProfessionalService",
    "@id": f"{B}/#negocio",
    "name": "Creative Web",
    "description": "Agencia de desarrollo web, posicionamiento en Google y software a medida "
                   "en Otavalo, Ecuador.",
    "url": f"{B}/",
    "telephone": "+593999174980",
    "email": "info@creativeweb.com.ec",
    "priceRange": "$$",
    "address": {"@type": "PostalAddress", "addressLocality": "Otavalo",
                "addressRegion": "Imbabura", "addressCountry": "EC"},
    "areaServed": ECUADOR,
    "parentOrganization": ORG,
    "openingHoursSpecification": [{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:00", "closes": "18:00",
    }],
    "sameAs": ["https://es-la.facebook.com/creativewebecuador/"],
}
CON_NEGOCIO = {3643: "/", 293: "/contactanos/"}


# ---------------------------------------------------------------- FAQ

def texto_plano(h):
    h = re.sub(r"<br\s*/?>", " ", h)
    h = re.sub(r"</p>\s*<p[^>]*>", " ", h)
    h = re.sub(r"<[^>]+>", "", h)
    h = HTML.unescape(h)
    return re.sub(r"\s+", " ", h).strip()


def faqs_de(editor_html):
    """Pares (pregunta, respuesta) a partir de `<h3>…</h3>` + los `<p>`/`<ul>`
    que le siguen, hasta el próximo encabezado."""
    pares = []
    for m in re.finditer(r"<h3[^>]*>(.*?)</h3>(.*?)(?=<h[1-3][^>]*>|$)",
                         editor_html, re.S | re.I):
        preg = texto_plano(m.group(1))
        resp = texto_plano(m.group(2))
        if preg.endswith("?") and resp:
            pares.append((preg, resp))
    return pares


def bloques_texto(arbol):
    out = []

    def walk(els):
        for e in els:
            s = e.get("settings") or {}
            if e.get("widgetType") == "text-editor" and isinstance(s.get("editor"), str):
                out.append(s["editor"])
            walk(e.get("elements", []))
    walk(arbol)
    return out


# ---------------------------------------------------------------- inyección

def widget_jsonld(grafo):
    payload = json.dumps({"@context": "https://schema.org", "@graph": grafo},
                         ensure_ascii=False, separators=(",", ":"))
    return {"id": f"{random.randint(0, 0xfffffff):07x}", "elType": "widget",
            "widgetType": "html", "elements": [],
            "settings": {"html": f'<!--{MARCA}-->\n'
                                 f'<script type="application/ld+json">{payload}</script>',
                         "_css_classes": MARCA}}


def contenedor_schema(grafo):
    cero = {"top": "0", "right": "0", "bottom": "0", "left": "0",
            "unit": "px", "isLinked": True}
    return {"id": f"{random.randint(0, 0xfffffff):07x}", "elType": "container",
            "isInner": False, "elements": [widget_jsonld(grafo)],
            "settings": {"content_width": "full", "flex_direction": "column",
                         "css_classes": f"{MARCA}-caja",
                         "padding": cero, "margin": cero,
                         "flex_gap": {"column": "0", "row": "0", "isLinked": True,
                                      "unit": "px", "size": 0}}}


def inyectar(pid, ruta, base):
    r = emcp._session.get(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                          params={"context": "edit", "cb": random.randint(1, 10**9)}, timeout=90)
    arbol = json.loads(r.json()["meta"]["_elementor_data"])

    grafo = []
    if base:
        nodo = dict(base)
        nodo["@id"] = f"{B}{ruta}#servicio"
        nodo["url"] = f"{B}{ruta}"
        nodo["provider"] = ORG
        nodo["areaServed"] = ECUADOR
        if nodo["@type"] == "SoftwareApplication":
            nodo["author"] = ORG
            nodo["publisher"] = ORG
            nodo.pop("areaServed", None)
        grafo.append(nodo)

    pares = []
    for h in bloques_texto(arbol):
        pares += faqs_de(h)
    if pares:
        grafo.append({
            "@type": "FAQPage", "@id": f"{B}{ruta}#faq",
            "url": f"{B}{ruta}",
            "mainEntity": [{"@type": "Question", "name": p,
                            "acceptedAnswer": {"@type": "Answer", "text": a}}
                           for p, a in pares],
        })
    if pid in CON_NEGOCIO:
        grafo.append(NEGOCIO)
    if not grafo:
        print(f"  {pid}: nada que añadir")
        return 0

    # fuera el bloque anterior (idempotencia)
    def limpio(els):
        res = []
        for e in els:
            if MARCA in json.dumps(e, ensure_ascii=False):
                continue
            e["elements"] = limpio(e.get("elements", []))
            res.append(e)
        return res
    arbol = limpio(arbol)
    arbol.append(contenedor_schema(grafo))

    r2 = emcp._session.post(emcp.BASE + f"/wp-json/wp/v2/pages/{pid}", headers=emcp.HEAD,
                            params={"cb": random.randint(1, 10**9)},
                            json={"meta": {"_elementor_data": json.dumps(arbol,
                                                                        ensure_ascii=False)}},
                            timeout=90)
    tipos = " + ".join(n["@type"] for n in grafo)
    print(f"  {pid} {ruta}: {r2.status_code} | {tipos} | {len(pares)} preguntas")
    return len(pares)


def regenerar_css(pid, ruta):
    for _ in range(3):
        emcp.call("emcp-tools-update-page-settings", {"post_id": pid,
                                                     "settings": {"hide_title": "yes"}})
        emcp.flush_css()
        time.sleep(2)
        emcp._session.get(emcp.BASE + ruta,
                          headers={"User-Agent": "Mozilla/5.0 (Macintosh) Chrome/120"},
                          params={"cb": random.randint(1, 10**9)}, timeout=90)
        c = emcp._session.get(f"{emcp.BASE}/wp-content/uploads/elementor/css/post-{pid}.css",
                              params={"cb": random.randint(1, 10**9)}, timeout=60)
        if c.status_code == 200:
            return
    print(f"  ojo: css post-{pid} no se regeneró")


if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    total = 0
    todas = dict(PAGINAS)
    for pid, ruta in CON_NEGOCIO.items():
        todas.setdefault(pid, (ruta, None))
    for pid, (ruta, base) in todas.items():
        total += inyectar(pid, ruta, base)
    print(f"preguntas marcadas: {total}")
    for pid, (ruta, _b) in todas.items():
        regenerar_css(pid, ruta)
    emcp.flush_css()
    print("OK schema")
