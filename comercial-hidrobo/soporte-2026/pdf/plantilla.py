#!/usr/bin/env python3
"""Genera los HTML de las dos cotizaciones, con la misma estructura que el
documento firmado de 2025: carta de presentación, quiénes somos, detalle del
plan y valor.

  cot-1-sitio.html   → solo comercialhidrobo.com ($380 + IVA)
  cot-2-sitios.html  → comercialhidrobo.com + okcars.ec ($670 + IVA)

Después se convierten a PDF con Chrome headless (ver generar.sh).
"""
import os

HERE = os.path.dirname(os.path.abspath(__file__))
FECHA = "Otavalo, 19 de agosto de 2026"

CSS = """
@page { size: A4; margin: 16mm 17mm; }
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Inter',-apple-system,system-ui,sans-serif;
     font-size:10.2pt; line-height:1.55; color:#1c2733; background:#fff}
.hoja{page-break-after:always}
.hoja:last-child{page-break-after:auto}

.cab{display:flex; justify-content:space-between; align-items:flex-start;
     border-bottom:2px solid #003383; padding-bottom:10px; margin-bottom:20px}
.cab .marca{font-size:16pt; font-weight:800; color:#003383; letter-spacing:-.5px; line-height:1.1}
.cab .marca span{display:block; font-size:7.4pt; font-weight:600; color:#5a6b80;
  letter-spacing:2.2px; text-transform:uppercase; margin-top:3px}
.cab .doc{text-align:right; font-size:8pt; color:#5a6b80; line-height:1.45}
.cab .doc b{display:block; color:#003383; font-size:9pt; margin-bottom:2px}

.pie{margin-top:26px; border-top:1px solid #d8e0ec; padding-top:7px;
     font-size:7.4pt; color:#5a6b80; line-height:1.45;
     display:flex; justify-content:space-between}
.pie .der{text-align:right}

h1{font-size:15pt; color:#003383; font-weight:800; margin-bottom:4px; letter-spacing:-.3px}
h1 + .sub{color:#5a6b80; font-size:9.2pt; margin-bottom:14px}
h2{font-size:11.8pt; color:#003383; font-weight:700; margin:16px 0 7px; letter-spacing:-.2px}
h3{font-size:10.2pt; font-weight:700; margin:11px 0 4px}
p{margin-bottom:8px; text-align:justify}
ul{margin:0 0 8px 15px}
li{margin-bottom:4px}
.dest{color:#003383; font-weight:700}

.saludo{margin:18px 0 14px}
.firma{margin-top:30px}
.firma .linea{width:190px; border-top:1px solid #1c2733; margin-bottom:5px}
.firma b{font-size:10.2pt}
.firma span{display:block; font-size:8.6pt; color:#5a6b80}

table{width:100%; border-collapse:collapse; margin:10px 0 12px; font-size:9.6pt}
th{background:#003383; color:#fff; padding:7px 10px; text-align:left;
   font-size:7.8pt; letter-spacing:.9px; text-transform:uppercase; font-weight:700}
td{padding:7px 10px; border-bottom:1px solid #e2e8f2; vertical-align:top}
td.num{text-align:right; white-space:nowrap; font-variant-numeric:tabular-nums; font-weight:600}
tr.fila-sub td{background:#eef3fa; font-weight:700}
tr.tot td{background:#003383; color:#fff; font-weight:800; font-size:10.6pt}
td small{display:block; color:#5a6b80; font-size:8.1pt; font-weight:400; margin-top:2px}

.caja{border:1px solid #cfdaea; background:#f6f9fd; border-radius:4px; padding:11px 13px; margin:10px 0}
.caja .t{font-size:7.8pt; font-weight:700; color:#003383; letter-spacing:1px;
         text-transform:uppercase; margin-bottom:5px}
.caja p{margin-bottom:0; font-size:9.4pt}
.caja p + p{margin-top:6px}
.caja.ambar{border-color:#e8c9a0; background:#fdf7ef}
.caja.ambar .t{color:#a86a1c}
.caja.verde{border-color:#b6e3c8; background:#f2fbf6}
.caja.verde .t{color:#1a7a45}
"""

PIE = """<div class="pie">
  <div>Ing. Santiago O&ntilde;a S&aacute;nchez &middot; Creative Web<br>info@creativeweb.com.ec &middot; www.creativeweb.com.ec</div>
  <div class="der">Modesto Jaramillo 3-60 y Abd&oacute;n Calder&oacute;n, 2do piso, Otavalo<br>099 917 4980 &middot; 062 924 887</div>
</div>"""


def cab(ref):
    return f"""<div class="cab">
  <div class="marca">Creative Web<span>Desarrollo web &middot; E-commerce &middot; Marketing digital</span></div>
  <div class="doc"><b>{ref}</b>{FECHA}</div>
</div>"""


def hoja(ref, contenido):
    return f'<div class="hoja">\n{cab(ref)}\n{contenido}\n{PIE}\n</div>\n'


def carta(ref):
    return hoja(ref, f"""<p style="font-size:9.2pt;color:#5a6b80">{FECHA}</p>
<div class="saludo">
  <p style="margin-bottom:2px"><b>Se&ntilde;ores</b></p>
  <p style="margin-bottom:2px"><b>COMERCIAL HIDROBO S.A.</b></p>
  <p>Presente.-</p>
</div>
<p>De nuestra consideraci&oacute;n:</p>
<p>Por medio del presente me permito saludarles muy cordialmente y a la vez poner a su
consideraci&oacute;n la <b>renovaci&oacute;n del Plan de Soporte, Actualizaci&oacute;n y Mantenimiento Web
Anual</b> para el per&iacute;odo <span class="dest">2026 &ndash; 2027</span>.</p>
<p>Creative Web es una empresa con m&aacute;s de diez a&ntilde;os de experiencia en desarrollo web,
comercio electr&oacute;nico y marketing digital. Durante los &uacute;ltimos per&iacute;odos hemos tenido el gusto
de mantener y dar soporte a los sitios de Comercial Hidrobo, garantizando su funcionamiento,
seguridad y actualizaci&oacute;n permanente.</p>
<p>El plan que se detalla en las p&aacute;ginas siguientes cubre la renovaci&oacute;n de las licencias
comerciales sobre las que est&aacute; construido el sitio, el mantenimiento mensual, los respaldos,
las comprobaciones de seguridad y rendimiento, el informe mensual de gesti&oacute;n y, como novedad
de este per&iacute;odo, <b>horas de soporte incluidas</b> para cambios menores y una
<b>optimizaci&oacute;n de velocidad trimestral</b>.</p>
<p>Agradecemos de antemano la atenci&oacute;n prestada al presente documento y quedamos atentos a
cualquier consulta o aclaraci&oacute;n que requieran.</p>
<div class="firma">
  <div class="linea"></div>
  <b>Ing. Santiago O&ntilde;a S&aacute;nchez</b>
  <span>Gerente General &middot; Creative Web</span>
  <span>099 917 4980 &middot; info@creativeweb.com.ec</span>
</div>""")


def empresa(ref):
    return hoja(ref, """<h1>&iquest;Qui&eacute;nes somos?</h1>
<p class="sub">Creative Web &middot; m&aacute;s de diez a&ntilde;os de experiencia</p>
<p>Somos una empresa de desarrollo de software y marketing digital que a lo largo de m&aacute;s de
diez a&ntilde;os en el mercado se ha consolidado adapt&aacute;ndose a los requerimientos de sus clientes,
con criterios de calidad, cumplimiento de plazos y un servicio personalizado.</p>
<p>Contamos con un equipo de profesionales calificados en todas nuestras &aacute;reas de trabajo y
procesos estandarizados que nos permiten entregar productos de calidad de forma consistente.</p>

<h2>Nuestras l&iacute;neas de productos y servicios</h2>
<h3>Desarrollo web profesional a medida</h3>
<p>Sitios web totalmente adaptables a computador, tablet y celular, construidos con una
combinaci&oacute;n de criterio t&eacute;cnico y dise&ntilde;o.</p>
<h3>Portales de comercio electr&oacute;nico</h3>
<p>Tiendas en l&iacute;nea integradas con redes sociales, medios de pago y facturaci&oacute;n electr&oacute;nica.</p>
<h3>Hosting y dominio</h3>
<p>Servidores disponibles las 24 horas, con espacio y cuentas de correo seg&uacute;n la necesidad de
cada proyecto, administrados desde cPanel.</p>
<h3>Desarrollo de software y sistemas web</h3>
<p>Sistemas a medida para resolver requerimientos espec&iacute;ficos de cada empresa.</p>
<h3>Integraciones de pago</h3>
<p>Conexi&oacute;n del sitio con los principales medios de pago del pa&iacute;s: Datafast, Payphone,
Pagomedios, Paymentez, entre otros.</p>
<h3>Posicionamiento y contenido</h3>
<p>Estrategia de posicionamiento en buscadores, redacci&oacute;n de contenidos y gesti&oacute;n del perfil
de empresa en Google.</p>

<div class="caja">
  <div class="t">Algunos de nuestros clientes</div>
  <p>Comercial Hidrobo &middot; OKCars &middot; Quimera Clothing &middot; Dimapar Ecuador &middot;
  Luuma Rooftop &middot; Odontolog&iacute;a Life &middot; Hotel Ajavi, entre otros.</p>
</div>""")


def servicio(ref, subtitulo):
    return hoja(ref, f"""<h1>Plan de Soporte, Actualizaci&oacute;n y Mantenimiento Web Anual</h1>
<p class="sub">{subtitulo}</p>

<h2>Descripci&oacute;n del servicio</h2>
<p>Este plan garantiza que los sitios funcionen de manera &oacute;ptima, segura y actualizada durante
los doce meses del per&iacute;odo. Incluye las licencias comerciales indispensables, el mantenimiento
mensual y el reporte de gesti&oacute;n.</p>

<h2>Incluido en el servicio</h2>
<h3>Licencias comerciales</h3>
<ul>
  <li><b>Elementor Pro</b> &mdash; licencia anual con un valor de $99,00. Es el constructor
      visual sobre el que est&aacute; desarrollado el sitio; sin la licencia activa deja de recibir
      actualizaciones de seguridad y compatibilidad.</li>
  <li><b>Crocoblock para Elementor</b> &mdash; licencia anual con un valor de $199,00.
      Conjunto de complementos Jet que sostienen el cat&aacute;logo de veh&iacute;culos, los filtros y las
      fichas de producto.</li>
</ul>
<h3>Mantenimiento y actualizaciones mensuales</h3>
<ul>
  <li><b>Actualizaci&oacute;n de plugins y componentes,</b> previniendo incompatibilidades y
      vulnerabilidades.</li>
  <li><b>Respaldo completo del sitio:</b> copia mensual de archivos y base de datos, guardada
      fuera del servidor.</li>
  <li><b>Comprobaci&oacute;n de seguridad:</b> revisi&oacute;n de vulnerabilidades, detecci&oacute;n de c&oacute;digo
      malicioso y verificaci&oacute;n de la integridad del sitio.</li>
  <li><b>Comprobaci&oacute;n de rendimiento:</b> an&aacute;lisis de los tiempos de carga y de la experiencia
      de navegaci&oacute;n.</li>
</ul>
<h3>Nuevo en el per&iacute;odo 2026 &ndash; 2027</h3>
<ul>
  <li><b>Dos horas mensuales de soporte por cada sitio</b> para cambios menores: actualizar un
      banner, corregir un texto, subir un documento o modificar un dato de contacto. La hora
      t&eacute;cnica fuera de plan tiene un valor de $25,00.</li>
  <li><b>Optimizaci&oacute;n de velocidad trimestral,</b> con limpieza de base de datos y revisi&oacute;n de
      im&aacute;genes.</li>
</ul>
<h3>Informe mensual de gesti&oacute;n</h3>
<p>Un reporte por cada sitio con el resumen de actualizaciones, respaldos, seguridad,
disponibilidad y rendimiento del mes.</p>""")


HISTORICO = """<div class="caja ambar">
  <div class="t">Sobre el valor del per&iacute;odo anterior</div>
  <p>El plan 2024&ndash;2025 se factur&oacute; en $380,00. La cotizaci&oacute;n 2025&ndash;2026 se emiti&oacute; por
  $280,00 debido a un error nuestro al elaborarla, que asumimos y sostuvimos durante todo el
  a&ntilde;o sin trasladar diferencia alguna al cliente.</p>
  <p>El presente per&iacute;odo retoma el valor que corresponde al plan y que ya estuvo vigente en
  2024&ndash;2025.</p>
</div>"""


def valor_1(ref):
    return hoja(ref, f"""<h1>Valor del plan</h1>
<p class="sub">Per&iacute;odo 2026 &ndash; 2027 &middot; sitio comercialhidrobo.com</p>
<table>
  <thead><tr><th>Concepto</th><th style="text-align:right">Valor anual</th></tr></thead>
  <tbody>
    <tr><td>Licencia Elementor Pro</td><td class="num">$99,00</td></tr>
    <tr><td>Licencia Crocoblock para Elementor</td><td class="num">$199,00</td></tr>
    <tr class="fila-sub"><td>Subtotal en licencias</td><td class="num">$298,00</td></tr>
    <tr><td>Mantenimiento, respaldos, seguridad e informes mensuales</td><td class="num">$82,00</td></tr>
    <tr class="tot"><td>Plan anual &middot; comercialhidrobo.com</td><td class="num">$380,00 + IVA</td></tr>
  </tbody>
</table>
<div class="caja verde">
  <div class="t">Soporte incluido sin costo adicional</div>
  <p>24 horas de soporte al a&ntilde;o, dos cada mes. A la tarifa de $25,00 la hora representan
  <b>$600,00 anuales</b> que no se facturan.</p>
</div>
{HISTORICO}
<h2>Condiciones</h2>
<ul>
  <li>Vigencia de doce meses desde la fecha de contrataci&oacute;n.</li>
  <li>Pago anual por adelantado, que es lo que permite renovar las licencias por el per&iacute;odo completo.</li>
  <li>Las horas de soporte no son acumulables de un mes al siguiente.</li>
  <li>No incluye desarrollo de funciones nuevas, redise&ntilde;os ni creaci&oacute;n de contenido; se cotizan por separado.</li>
  <li>No incluye hosting ni dominio, que el cliente mantiene con su proveedor actual.</li>
  <li>Los valores indicados no incluyen IVA.</li>
</ul>""")


def valor_2(ref):
    return hoja(ref, f"""<h1>Valor del plan</h1>
<p class="sub">Per&iacute;odo 2026 &ndash; 2027 &middot; sitios comercialhidrobo.com y okcars.ec</p>
<table>
  <thead><tr><th>Sitio</th><th style="text-align:right">Valor anual</th></tr></thead>
  <tbody>
    <tr><td>comercialhidrobo.com<small>Sitio corporativo con cat&aacute;logo de veh&iacute;culos, postventa y blog</small></td><td class="num">$380,00</td></tr>
    <tr><td>okcars.ec<small>Desarrollado sobre las mismas licencias; hasta hoy sin plan de soporte</small></td><td class="num">$290,00</td></tr>
    <tr class="tot"><td>Total anual por los dos sitios</td><td class="num">$670,00 + IVA</td></tr>
  </tbody>
</table>
<div class="caja verde">
  <div class="t">Ventajas de contratar los dos juntos</div>
  <p>Por separado los dos planes suman $760,00; en conjunto quedan en <b>$670,00</b>, con un
  ahorro de $90,00 anuales.</p>
  <p>Adem&aacute;s, las 48 horas de soporte del per&iacute;odo (24 por sitio) equivalen a <b>$1.200,00</b> a
  la tarifa de $25,00 la hora, incluidas sin costo.</p>
</div>
{HISTORICO}
<h2>Condiciones</h2>
<ul>
  <li>Vigencia de doce meses desde la fecha de contrataci&oacute;n, para ambos sitios.</li>
  <li>Pago anual por adelantado, que es lo que permite renovar las licencias por el per&iacute;odo completo.</li>
  <li>Dos horas mensuales de soporte por cada sitio, cuatro en total. No acumulables entre meses.</li>
  <li>Un informe mensual por cada sitio: veinticuatro informes en el per&iacute;odo.</li>
  <li>No incluye desarrollo de funciones nuevas, redise&ntilde;os ni creaci&oacute;n de contenido; se cotizan por separado.</li>
  <li>No incluye hosting ni dominio, que el cliente mantiene con su proveedor actual.</li>
  <li>Los valores indicados no incluyen IVA.</li>
</ul>""")


def documento(titulo, hojas):
    return f"""<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>{titulo}</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>{CSS}</style></head><body>
{''.join(hojas)}
</body></html>"""


if __name__ == "__main__":
    r1, r2 = "COT-2026-CH-01", "COT-2026-CH-02"
    docs = {
        "cot-1-sitio.html": documento(
            "Cotizacion Plan de Soporte Anual 2026-2027 - Comercial Hidrobo",
            [carta(r1), empresa(r1),
             servicio(r1, "Per&iacute;odo 2026 &ndash; 2027 &middot; sitio comercialhidrobo.com"),
             valor_1(r1)]),
        "cot-2-sitios.html": documento(
            "Cotizacion Plan de Soporte Anual 2026-2027 - Comercial Hidrobo y OKCars",
            [carta(r2), empresa(r2),
             servicio(r2, "Per&iacute;odo 2026 &ndash; 2027 &middot; sitios comercialhidrobo.com y okcars.ec"),
             valor_2(r2)]),
    }
    for nombre, html in docs.items():
        with open(os.path.join(HERE, nombre), "w", encoding="utf-8") as f:
            f.write(html)
        print("  escrito:", nombre)
