#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Constantes y bloques de la tanda de diciembre 2026 de Comercial Hidrobo (36 posts).

Comercial Hidrobo se escribe en USTED. Cada lote_*.py arma sus posts con estas funciones y
llama a guarda(spec), que escribe posts/spec-<slug>.json. Después:
    python3 publish_batch.py --validate     # solo valida
    python3 publish_batch.py --dry-run
    python3 publish_batch.py                # publica (programados)

Datos de modelos: SOLO de la página oficial de la marca en Ecuador (o la ficha del sitio),
citando la fuente en el campo "fuentes" del spec. Precios: PRECIOS (catálogo de CH al
9-nov-2026). Costos de mantenimiento: estimados, siempre como «costo referencial
estimado» y con la nota de que se confirma con el asesor.
"""
import json
import os
import urllib.parse

AQUI = os.path.dirname(os.path.abspath(__file__))
SITE = "https://www.comercialhidrobo.com"

# ── enlaces internos permitidos (publicados al 19-nov-2026) ─────────────────────────────
_E = json.load(open(os.path.join(AQUI, "enlaces-verificados.json"), encoding="utf-8"))
POSTS = {x["url"]: x["titulo"] for x in _E["posts"]}
FICHAS = {x["url"]: x["modelo"] for x in _E["fichas"]}
PAGINAS = {x["url"]: x["titulo"] for x in _E["paginas"]}
ENLACES_OK = set(POSTS) | set(FICHAS) | set(PAGINAS)

RESERVA = f"{SITE}/solicitar-cita-taller-mecanico/"
REPUESTOS = f"{SITE}/cotizacion-de-repuestos-y-accesorios-originales/"
MARCAS = f"{SITE}/nuestras-marcas/"
FINANCIAMIENTO = f"{SITE}/financiacion-y-tramites/financiamiento-autos-comercial-hidrobo/"

# ── datos fijos verificados ────────────────────────────────────────────────────────────
WHATSAPP = "593996390233"          # taller y ventas del blog (099 639 0233)
WHATSAPP_TXT = "099 639 0233"
SEDES = "Ibarra, Cayambe y Tulcán"
DIRECCION_IBARRA = "Av. Mariano Acosta 20-120 y Lucio Tarquino Páez, Ibarra"
CITA = "Equipo de Comercial Hidrobo"   # nunca nombres propios en las citas

# Precios «desde» del menú de catálogo de comercialhidrobo.com al 9-nov-2026 (USD).
PRECIOS = {
    "Nissan Frontier": "46.990", "Nissan X-Trail e-Power": "41.990", "Nissan Qashqai": "29.990",
    "DongFeng Z9": "39.990", "DongFeng Paladin": "39.990", "DongFeng Mage": "22.990",
    "DongFeng Rich 7": "28.990", "DongFeng Huge": "25.590", "DongFeng Rich 6 Pro": "22.990",
    "Renault Koleos": "42.990", "Renault Arkana": "28.990", "Renault Kardian": "21.990",
    "Renault Kwid": "13.990", "Renault Duster": "19.990",
    "Fiat Fiorino": "21.499", "Fiat 600 Hybrid": "27.999", "Fiat Pulse": "21.999",
    "Jeep Avenger": "28.499", "Jeep Compass": "39.999",
    "Mazda CX-60": "59.999", "Mazda MX-5": "59.999", "Mazda CX-90": "64.999", "Mazda CX-5": "38.999",
    "Mazda 2": "20.999", "Mazda CX-30": "32.499", "Mazda BT-50": "49.999", "Mazda CX-3": "25.999",
    "Chery Tiggo 7 Super Hybrid": "30.990", "Chery Tiggo 9 Super Hybrid": "46.990",
    "Chery Tiggo 8 Super Hybrid": "30.990", "Chery Tiggo 4 Pro": "19.990", "Chery Tiggo 7 Pro Max": "24.990",
    "Chery Tiggo 2 Pro Max": "18.490", "Chery Arrizo 5 Pro Max": "16.990",
    "Toyota Yaris Cross": "31.990", "Toyota Corolla Cross": "33.999", "Toyota Raize": "20.000",
    "Toyota RAV4": "41.990", "Toyota Fortuner": "52.990", "Toyota Hilux": "33.390",
    "Toyota Corolla HV": "28.999", "Toyota Yaris Sedán": "24.999", "Toyota Agya": "16.990",
    "RAM 700": "21.999", "RAM 1500": "72.999",
    "Changan Nevo Q05": "19.990", "Changan Alsvin Plus": "16.990", "Changan Star Truck": "15.990",
    "Changan M60": "16.990", "Changan Honor S": "16.990", "Deepal G318": "46.990", "Deepal S05": "29.990",
    "Deepal S07": "38.990", "Changan Hunter REEV": "37.990", "Changan CS55 R-EV": "25.240",
    "Changan Hunter": "27.990", "Changan CS15": "17.990", "Changan V3": "14.990",
    "Foton Tunland V9": "44.990", "Foton Tunland V7": "29.490", "Foton Tunland G9": "31.990",
    "Foton Tunland G7": "24.990", "BAIC X55 II": "21.990", "BAIC X35": "16.990", "BAIC U5 Plus": "16.990",
    "Omoda E5 Next": "19.990", "Jaecoo J5 SHS": "21.990", "Jaecoo J7 SHS": "26.990", "Omoda C5 SHS": "22.990",
}
NOTA_PRECIOS = ("Precios «desde» del catálogo de Comercial Hidrobo a noviembre de 2026. Referenciales, "
                "sujetos a cambio sin previo aviso; confirme versión y valor final con un asesor.")
NOTA_COSTOS = ("Costos referenciales estimados para el mercado de Ecuador. Varían según modelo, motor y "
               "estado del vehículo; el valor exacto se lo confirma un asesor del taller.")

# ── bloques Gutenberg ─────────────────────────────────────────────────────────────────
def p(t): return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"
def h2(t): return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'
def h3(t): return f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{t}</h3>\n<!-- /wp:heading -->'
def quote(t, cite=CITA):
    return (f'<!-- wp:quote -->\n<blockquote class="wp-block-quote"><!-- wp:paragraph -->\n<p>{t}</p>\n'
            f'<!-- /wp:paragraph --><cite>{cite}</cite></blockquote>\n<!-- /wp:quote -->')
def ul(items): return '<!-- wp:list -->\n<ul class="wp-block-list">' + "".join(
    f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->" for i in items) + "</ul>\n<!-- /wp:list -->"
def ol(items): return '<!-- wp:list {"ordered":true} -->\n<ol class="wp-block-list">' + "".join(
    f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->" for i in items) + "</ol>\n<!-- /wp:list -->"
def table(head, rows, cap=""):
    th = "".join(f"<th>{x}</th>" for x in head)
    tb = "".join("<tr>" + "".join(f"<td>{x}</td>" for x in r) + "</tr>" for r in rows)
    fc = f'<figcaption class="wp-element-caption">{cap}</figcaption>' if cap else ""
    return (f'<!-- wp:table -->\n<figure class="wp-block-table"><table><thead><tr>{th}</tr></thead>'
            f"<tbody>{tb}</tbody></table>{fc}</figure>\n<!-- /wp:table -->")
def faq(pares): return "\n\n".join(h3(q) + "\n\n" + p(a) for q, a in pares)
def a(url, txt):
    assert url in ENLACES_OK, f"enlace no verificado: {url}"
    return f'<a href="{url}">{txt}</a>'
def wa(msg): return f"https://wa.me/{WHATSAPP}?text=" + urllib.parse.quote(msg)

def cta_temprano(pregunta, texto, boton, mensaje_wa, reserva=True):
    """Recuadro a mitad de texto (marcador cta-temprano-v1). mensaje_wa empieza con «Hola, vengo de…»."""
    extra = f' O si prefiere, <a href="#reserva-taller">reserve en línea</a>.' if reserva else ""
    return f"""<!-- cta-temprano-v1 -->
<!-- wp:group {{"style":{{"spacing":{{"padding":{{"top":"16px","bottom":"16px","left":"20px","right":"20px"}}}},"border":{{"left":{{"color":"#25d366","width":"4px"}}}}}},"backgroundColor":"light-green-cyan"}} -->
<div class="wp-block-group has-light-green-cyan-background-color has-background" style="border-left-color:#25d366;border-left-width:4px;padding-top:16px;padding-right:20px;padding-bottom:16px;padding-left:20px"><!-- wp:paragraph -->
<p><strong>{pregunta}</strong> {texto}{extra}</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {{"backgroundColor":"vivid-green-cyan"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{wa(mensaje_wa)}">{boton}</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /cta-temprano-v1 -->"""

# Formulario de reserva de taller (JetFormBuilder 12079). Va justo después de cta_temprano()
# en los posts de taller y mantenimiento.
FORM_CITA = """<!-- cw-form-cita-v1 -->
<!-- wp:group {"anchor":"reserva-taller","style":{"color":{"background":"#f2f6fa"},"border":{"color":"#c9d6e3","width":"1px"},"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}}}} -->
<div id="reserva-taller" class="wp-block-group has-border-color has-background" style="border-color:#c9d6e3;border-width:1px;background-color:#f2f6fa;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Reserve su cita en el taller</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Llene estos datos y un asesor le confirma el turno. Atendemos en Ibarra, Cayambe y Tulcán.</p>
<!-- /wp:paragraph -->
<!-- wp:jet-forms/form-block {"form_id":12079} /--></div>
<!-- /wp:group -->
<!-- /cw-form-cita-v1 -->"""

# Cierre comercial estándar (cta-ch-v1): va al final de TODOS los posts.
CIERRE = open(os.path.join(AQUI, "cierre-ventas.html"), encoding="utf-8").read()

# ── calendario: 36 posts del 1 al 31 de diciembre, intercalando bloques ───────────────
# Cada bloque se reparte parejo en el mes (orden por posición relativa dentro del bloque),
# para que no salgan seguidos seis de mantenimiento o diez de modelos.
_BLOQUES = [list(range(1, 7)), list(range(7, 15)), [15, 16, 34, 35, 36], list(range(17, 34))]
_ORDEN = [n for _, n in sorted((((i + 0.5) / len(b), k), n) for k, b in enumerate(_BLOQUES) for i, n in enumerate(b))]
# Pedido del usuario (19-nov): fechar los 36 entre el 1 y el 20 de noviembre, con horas variadas.
# 16 días con 2 posts y 4 días con 1. Las fechas pasadas se publican al subir; las futuras quedan programadas.
_HORAS_A = ["07:42", "08:15", "09:05", "09:38", "10:12", "10:47", "11:20", "11:53", "12:31", "13:06"]
_HORAS_B = ["14:18", "15:02", "15:44", "16:27", "17:09", "17:51", "18:36", "19:14", "20:03", "20:41"]
_SLOTS = []
for d in range(1, 21):
    _SLOTS.append(f"2026-11-{d:02d}T{_HORAS_A[(d * 3) % 10]}:00")
    if d not in (7, 14, 19, 20):
        _SLOTS.append(f"2026-11-{d:02d}T{_HORAS_B[(d * 7) % 10]}:00")
_SLOTS.sort()
FECHAS = dict(zip(_ORDEN, _SLOTS))

def guarda(spec):
    """Escribe posts/spec-<slug>.json. El spec lleva: n (número del plan), title, slug, date,
    categories, excerpt, meta{_yoast_wpseo_title,_yoast_wpseo_metadesc,_yoast_wpseo_focuskw},
    content (debe terminar con CIERRE) y fuentes (lista de URLs de donde salieron los datos)."""
    import datetime
    spec["date"] = FECHAS[spec["n"]]
    ahora = datetime.datetime.now(datetime.timezone(datetime.timedelta(hours=-5))).replace(tzinfo=None)
    spec["status"] = "publish" if datetime.datetime.fromisoformat(spec["date"]) <= ahora else "future"
    assert spec["content"].rstrip().endswith("<!-- /cta-ch-v1 -->") or "cta-ch-v1" in spec["content"], "falta CIERRE"
    f = os.path.join(AQUI, "posts", f"spec-{spec['slug']}.json")
    json.dump(spec, open(f, "w", encoding="utf-8"), ensure_ascii=False, indent=1)
    return f
