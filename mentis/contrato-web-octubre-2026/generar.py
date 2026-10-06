#!/usr/bin/env python3
"""Genera el contrato del sitio web de Mentis Psicología con el formato Creative Web
(isotipo + barra azul de las proformas, cláusulas tradicionales, fuente Outfit).

    python3 generar.py   # escribe contrato.html y el PDF con Chrome headless
"""
import base64, os, re, subprocess

AQUI = os.path.dirname(os.path.abspath(__file__))
ISO = base64.b64encode(open(os.path.join(AQUI, "..", "propuesta-octubre-2026", "pdf", "assets", "iso-creativeweb.png"), "rb").read()).decode()
ORD = ["PRIMERA", "SEGUNDA", "TERCERA", "CUARTA", "QUINTA", "SEXTA", "SÉPTIMA", "OCTAVA", "NOVENA", "DÉCIMA", "DÉCIMA PRIMERA"]

CLAUSULAS = [
    ("Antecedentes", """
<p>EL PROVEEDOR presentó a EL CLIENTE la proforma N.º 1-2-1334 del 5 de octubre de 2026 para el sitio web de Mentis Psicología. EL CLIENTE aprobó el desarrollo del <b>sitio web</b> descrito en esa proforma (ítem «Sitio web Mentis Psicología»). Los tests psicológicos en línea, la venta de cursos con pago en línea y el plan de posicionamiento, también cotizados, no forman parte de este contrato.</p>"""),
    ("Objeto", """
<p>EL PROVEEDOR diseñará, desarrollará y publicará el sitio web de Mentis Psicología, con sus sedes de Quito e Ibarra, para presentar sus servicios y facilitar que los pacientes la contacten y agenden su cita.</p>"""),
    ("Alcance del servicio", """
<p>Conforme a la proforma N.º 1-2-1334, el sitio web comprende:</p>
<ol type="a">
<li>Inicio y servicios para niños, adolescentes, adultos, adultos mayores, parejas y familias, en modalidad presencial y virtual.</li>
<li>Sedes de Quito e Ibarra con su mapa y WhatsApp; equipo, testimonios y blog.</li>
<li>Reservas en tiempo real: el sitio muestra en vivo los horarios libres de la agenda del sistema de cada sede y la cita entra directo a esa agenda.</li>
<li>Diseño adaptado a celular. SEO básico: Google Business, Search Console y títulos de cada página.</li>
<li>Instalación y publicación del sitio en el hosting y el dominio que ya tiene EL CLIENTE.</li>
</ol>
<p class="nota">Las reservas en tiempo real funcionan con el sistema de gestión de Mentis (proforma N.º 1-2-1333). Mientras ese sistema no esté activo, el botón «Agendar cita» lleva al WhatsApp de la sede correspondiente.</p>"""),
    ("Exclusiones", """
<p>Este contrato no cubre:</p>
<ol type="a">
<li>Tests psicológicos en línea ni venta de cursos o talleres con pago en línea.</li>
<li>El sistema de gestión para las sedes (agenda, fichas, cobros y facturación), que se rige por la proforma N.º 1-2-1333.</li>
<li>Plan de posicionamiento mensual con artículos de blog.</li>
<li>Hosting, dominio, correos corporativos y su renovación, que son de EL CLIENTE.</li>
<li>Fotos, videos y manejo de redes sociales.</li>
</ol>
<p>Cualquier trabajo adicional se cotiza aparte y con anticipación, y requiere la aprobación escrita de EL CLIENTE.</p>"""),
    ("Plazo", """
<p>El sitio se entrega en un plazo de <b>cuatro (4) a cinco (5) semanas</b>, contadas desde la confirmación del anticipo y la entrega completa de la información por parte de EL CLIENTE. El trabajo sigue este orden: aprobación de la estructura y el diseño, desarrollo de las páginas con los contenidos, revisión de EL CLIENTE y ajustes, y publicación y alta en Google.</p>"""),
    ("Valor y forma de pago", """
<table class="valores">
<thead><tr><th>Descripción</th><th>Valor</th></tr></thead>
<tbody>
<tr><td>Sitio web Mentis Psicología</td><td>USD 500,00</td></tr>
<tr><td>Subtotal</td><td>USD 500,00</td></tr>
<tr><td>IVA 15 %</td><td>USD 75,00</td></tr>
<tr class="tot"><td>TOTAL</td><td>USD 575,00</td></tr>
</tbody></table>
<p>El valor se paga en dos partes: un <b>anticipo del 60 %</b>, USD 300,00 más IVA (<b>USD 345,00</b>), a la firma de este contrato, con el que inicia el trabajo; y el <b>saldo del 40 %</b>, USD 200,00 más IVA (<b>USD 230,00</b>), a la entrega del sitio publicado y aprobado.</p>"""),
    ("Hosting y dominio", """
<p>EL CLIENTE ya dispone de un hosting y un dominio propios, en los que se publicará el sitio. Por ello, este contrato no incluye hosting, dominio ni correos, y <b>su renovación no se realiza con Creative Web</b>: EL CLIENTE los contrata, paga y renueva directamente con su proveedor, y debe mantenerlos activos para que el sitio siga en línea.</p>"""),
    ("Obligaciones de EL CLIENTE", """
<ol type="a">
<li>Entregar la información necesaria para el sitio: servicios, datos de las sedes, profesionales del equipo, fotografías, logotipo y testimonios autorizados.</li>
<li>Entregar los accesos a su hosting y a la administración de su dominio para instalar y publicar el sitio.</li>
<li>Revisar y dar retroalimentación de los avances en un plazo razonable. El silencio por más de cinco (5) días hábiles se entiende como conformidad.</li>
<li>Realizar los pagos acordados en la cláusula sexta.</li>
</ol>"""),
    ("Obligaciones de EL PROVEEDOR", """
<ol type="a">
<li>Desarrollar el sitio descrito en la cláusula tercera con calidad profesional y dentro del plazo.</li>
<li>Entregar a EL CLIENTE todos los accesos de administración del sitio al finalizar.</li>
<li>Usar la información de EL CLIENTE solo para lo pactado y mantener la confidencialidad.</li>
</ol>"""),
    ("Propiedad, confidencialidad y terminación", """
<p>Una vez pagado el valor total, el sitio web y sus textos son propiedad de EL CLIENTE. Ambas partes guardarán reserva sobre la información y los accesos a los que tengan acceso con ocasión de este contrato. Si EL CLIENTE decide no continuar después de pagar el anticipo, este cubre el trabajo realizado hasta ese momento.</p>"""),
    ("Aceptación", """
<p>Las partes declaran haber leído y entendido este contrato, y lo aceptan en todas sus cláusulas, firmando en dos ejemplares de igual tenor en Otavalo, el 6 de octubre de 2026.</p>"""),
]

CSS = """
@page { size: A4; margin: 16mm 18mm 16mm; }
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Outfit', sans-serif; color: #22344f; font-size: 10.2pt; line-height: 1.55; font-weight: 400;
       -webkit-print-color-adjust: exact; print-color-adjust: exact; }
.cab { display: flex; align-items: center; justify-content: center; gap: 4mm; margin-bottom: 5mm; }
.cab img { height: 12mm; }
.cab span { font-size: 24pt; font-weight: 500; letter-spacing: -.01em; color: #1b2a4e; }
.barra { background: #1668c1; color: #fff; text-align: center; padding: 2.6mm; border-radius: 1.2mm;
         font-size: 12.5pt; font-weight: 600; letter-spacing: .02em; }
.sub { text-align: center; font-size: 9.5pt; color: #46586f; margin: 2.5mm 0 6mm; }
h1 { font-size: 10.5pt; }
.comparecientes { margin-bottom: 5mm; text-align: justify; }
.comparecientes b { font-weight: 600; }
.clausula { margin-bottom: 4mm; }
.clausula h2 { font-size: 10.2pt; font-weight: 700; color: #1668c1; margin-bottom: 1.5mm; letter-spacing: .02em; break-after: avoid; }
.clausula h2 span { color: #1b2a4e; }
.clausula p { text-align: justify; margin: 1.5mm 0; }
.clausula ol { margin: 1.5mm 0 1.5mm 6mm; }
.clausula li { margin: 1mm 0; padding-left: 1.5mm; text-align: justify; break-inside: avoid; }
.nota { font-size: 9pt; color: #46586f; font-style: italic; }
table.valores { width: 100%; border-collapse: collapse; margin: 2.5mm 0 3mm; font-size: 10pt; break-inside: avoid; }
table.valores th { background: #c9e3f7; border: .35mm solid #7fa9cc; font-weight: 500; padding: 2mm 4mm; text-align: left; }
table.valores th:last-child, table.valores td:last-child { text-align: right; width: 38mm; white-space: nowrap; }
table.valores td { border: .35mm solid #7fa9cc; padding: 2mm 4mm; }
table.valores tr.tot td { font-weight: 700; background: #eef6fc; }
.firmas { display: flex; gap: 18mm; margin-top: 16mm; break-inside: avoid; }
.firmas div { flex: 1; text-align: center; font-size: 9.5pt; line-height: 1.45; }
.firmas .ln { border-top: .35mm solid #22344f; margin-bottom: 2mm; }
.firmas b { font-weight: 600; display: block; }
.pie { margin-top: 10mm; padding-top: 3mm; border-top: .35mm solid #b9c6d6; display: flex; justify-content: space-between;
       align-items: center; font-size: 8.5pt; color: #46586f; break-inside: avoid; }
.pie img { height: 8mm; }
@media screen { body { background: #eef2f7; } .hoja { max-width: 800px; margin: 24px auto; background: #fff; padding: 16mm 18mm; } }
"""


def html():
    cl = "".join(f'<div class="clausula"><h2>{ORD[i]}. <span>{t.upper()}</span></h2>{c}</div>' for i, (t, c) in enumerate(CLAUSULAS))
    return f"""<!DOCTYPE html><html lang="es"><head><meta charset="utf-8">
<title>Contrato sitio web — Mentis Psicología</title>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>{CSS}</style></head><body><div class="hoja">
<div class="cab"><img src="data:image/png;base64,{ISO}" alt=""><span>creative web</span></div>
<div class="barra">CONTRATO DE PRESTACIÓN DE SERVICIOS · SITIO WEB</div>
<p class="sub">Contrato N.º CW-WEB-2026-MEN &nbsp;·&nbsp; Proforma N.º 1-2-1334 &nbsp;·&nbsp; Otavalo, 6 de octubre de 2026</p>
<p class="comparecientes">Comparecen a la celebración del presente contrato, por una parte, <b>Santiago Oña Sánchez</b>, con RUC 1002906426001, en representación de <b>Creative Web</b>, con domicilio en Modesto Jaramillo 3-60 y Abdón Calderón, 2.º piso, Otavalo, a quien en adelante se denominará <b>EL PROVEEDOR</b>; y, por otra parte, <b>Ana Cristina Muñoz Cervantes</b>, con cédula de ciudadanía 1003084082, por <b>Mentis Psicología</b>, domiciliada en Ibarra, teléfono +593 99 108 9666, a quien en adelante se denominará <b>EL CLIENTE</b>. Las partes, mayores de edad y legalmente capaces, acuerdan las siguientes cláusulas:</p>
{cl}
<div class="firmas">
<div><div class="ln"></div><b>EL PROVEEDOR</b>Santiago Oña Sánchez<br>Creative Web · RUC 1002906426001</div>
<div><div class="ln"></div><b>EL CLIENTE</b>Ana Cristina Muñoz Cervantes<br>Mentis Psicología · C.I. 1003084082</div>
</div>
<div class="pie"><span>Creative Web · Modesto Jaramillo 3-60 y Abdón Calderón, 2.º piso, Otavalo · 099 917 4980 · info@creativeweb.com.ec</span><img src="data:image/png;base64,{ISO}" alt=""></div>
</div></body></html>"""


if __name__ == "__main__":
    ruta = os.path.join(AQUI, "contrato.html")
    open(ruta, "w", encoding="utf-8").write(html())
    pdf = os.path.join(AQUI, "Contrato-sitio-web-Mentis-Psicologia.pdf")
    subprocess.run(["/Applications/Google Chrome.app/Contents/MacOS/Google Chrome", "--headless=new", "--disable-gpu",
                    "--no-pdf-header-footer", "--virtual-time-budget=9000", f"--print-to-pdf={pdf}", ruta],
                   capture_output=True)
    print("páginas:", len(re.findall(rb"/Type\s*/Page[^s]", open(pdf, "rb").read())))
