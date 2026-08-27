#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Genera los PDF descargables de las proformas en el formato oficial de Creative Web:
una hoja A4 por cotización. Se corre desde la raíz del repo:

    python3 tools/generar_pdfs.py           # escribe los .html
    bash tools/generar_pdfs.sh              # html + pdf con Chrome headless

Los números de proforma están al inicio de cada definición. Si el consecutivo real
del estudio es otro, se cambian ahí y se regenera.
"""
import os, base64

RAIZ = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
ISO = base64.b64encode(open(os.path.join(RAIZ, "assets", "creativeweb-iso.png"), "rb").read()).decode()

CSS = """
@page { size: A4; margin: 0; }
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Poppins','Helvetica Neue',Helvetica,Arial,sans-serif; color:#22344f;
       background:#fff; -webkit-print-color-adjust:exact; print-color-adjust:exact; }
.hoja { width:210mm; height:297mm; padding:10mm 13mm 8mm; position:relative;
        overflow:hidden; display:flex; flex-direction:column; }
.marca { position:absolute; left:-18mm; top:92mm; width:150mm; opacity:.045;
         transform:rotate(-8deg); z-index:0; }
.capa { position:relative; z-index:1; display:flex; flex-direction:column; flex:1 1 auto; min-height:0; }
.logo { display:flex; align-items:center; justify-content:center; gap:4mm; margin-bottom:6mm; }
.logo img { height:12mm; }
.logo span { font-size:25pt; font-weight:500; letter-spacing:-.015em; color:#1b2a4e; }
.barra { background:#1668c1; color:#fff; text-align:center; padding:2.7mm;
         border-radius:1.2mm; margin-bottom:4.5mm; font-size:13.5pt; font-weight:700; }
.datos { display:flex; justify-content:space-between; margin:0 6mm 4.5mm; font-size:10pt; }
.datos .col { display:grid; grid-template-columns:auto auto; gap:2.2mm 4mm; }
.datos .k { font-weight:600; text-align:right; white-space:nowrap; }
.datos .v { white-space:nowrap; }
table.items { width:100%; border-collapse:collapse; }
table.items th { background:#c9e3f7; border:.35mm solid #7fa9cc; color:#22344f;
                 font-size:9.5pt; font-weight:500; padding:2mm; }
table.items td { border:.35mm solid #7fa9cc; padding:2.6mm 4.5mm; vertical-align:middle; }
td.item { width:13mm; text-align:center; font-size:10.5pt; }
td.valor { width:27mm; text-align:center; font-size:11.5pt; white-space:nowrap; }
td.desc { font-size:9.2pt; line-height:1.44; }
td.desc b { font-size:9.8pt; display:block; margin-bottom:1.8mm; }
.cierre { display:flex; align-items:stretch; margin-top:-.35mm; }
.cierre .izq { flex:1; border:.35mm solid #7fa9cc; border-right:0; padding:3mm 4.5mm; }
.cierre .izq h4 { font-size:11pt; font-weight:400; margin-bottom:2.5mm; }
.cierre .izq p { font-size:8pt; line-height:1.55; color:#46586f; }
table.tot { border-collapse:collapse; width:62mm; }
table.tot td { border:.35mm solid #7fa9cc; padding:1.9mm 3mm; font-size:10.5pt; }
table.tot td.et { border-left:0; border-right:0; text-align:right; }
table.tot td.nu { width:27mm; text-align:center; white-space:nowrap; }
table.tot tr.total td { font-weight:700; }
.pie { margin-top:auto; padding-top:5mm; display:flex; align-items:flex-end; justify-content:space-between; }
.pie .firma { font-size:11pt; line-height:1.5; }
.pie .cont { display:flex; align-items:center; gap:4mm; }
.pie .cont .txt { text-align:right; font-size:9.5pt; font-weight:600; line-height:1.55;
                  border-right:.4mm solid #b9c6d6; padding-right:4mm; }
.pie .cont img { height:13mm; }
"""

def fila(letra, titulo, lineas, valor):
    return (f'<tr><td class="item">{letra}</td>'
            f'<td class="desc"><b>{titulo}</b>{"<br>".join(lineas)}</td>'
            f'<td class="valor">$ {valor}</td></tr>')

def totales(pares):
    return "".join(f'<tr class="{c}"><td class="et">{e}</td><td class="nu">{n}</td></tr>'
                   for e, n, c in pares)

def hoja(numero, cliente, fecha, derecha, items, tot, leyenda, nota):
    izq_der = "".join(f'<div class="k">{k}</div><div class="v">{v}</div>' for k, v in derecha)
    return f"""<!DOCTYPE html><html lang="es"><head><meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>{CSS}</style></head><body>
<div class="hoja">
  <img class="marca" src="data:image/png;base64,{ISO}">
  <div class="capa">
    <div class="logo"><img src="data:image/png;base64,{ISO}"><span>creative web</span></div>
    <div class="barra">PROFORMA # {numero}</div>
    <div class="datos">
      <div class="col">
        <div class="k">Cliente:</div><div class="v">{cliente}</div>
        <div class="k">Fecha:</div><div class="v">{fecha}</div>
      </div>
      <div class="col">{izq_der}</div>
    </div>
    <table class="items">
      <thead><tr><th>&Iacute;tem</th><th>Descripci&oacute;n</th><th>Valor</th></tr></thead>
      <tbody>{items}</tbody>
    </table>
    <div class="cierre">
      <div class="izq"><h4>PRECIOS NO INCLUYEN IVA{leyenda}</h4><p>{nota}</p></div>
      <table class="tot">{tot}</table>
    </div>
    <div class="pie">
      <div class="firma">Ing. Santiago O&ntilde;a S&aacute;nchez<br>CREATIVE WEB</div>
      <div class="cont">
        <div class="txt">info@creativeweb.com.ec<br>Modesto Jaramillo 3-60 y<br>
        Abd&oacute;n Calder&oacute;n 2do piso, Otavalo<br>099 917 4980 &ndash; 062 924 887</div>
        <img src="data:image/png;base64,{ISO}">
      </div>
    </div>
  </div>
</div></body></html>"""

FECHA = "27 de agosto de 2026"
PAGO  = "Forma de pago: 60% para iniciar y 40% contra entrega funcionando."
ENTREGA = lambda t: [("Tiempo de Entrega:", t), ("Tiempo de Validez:", "30 d&iacute;as"), ("Telefono:", "")]

DOCS = {}

# ─── MOTRIX ────────────────────────────────────────────────────────────────
DOCS["motrix/proforma-agosto-2026/pdf/cotizacion"] = hoja(
  "1-2-1320", "FisioVida &ndash; Sr. Fernando Landeta", FECHA, ENTREGA("4 semanas"),
  fila("a", "NUEVAS FUNCIONES PARA EL SISTEMA MOTRIX", [
      "Consentimiento informado impreso desde la ficha, con enfermedades preexistentes, "
      "fecha, hora y auditor&iacute;a del usuario que lo gener&oacute; &nbsp;&mdash;&nbsp; <b style='display:inline;font-size:9.2pt'>$110.00</b>",
      "Reportes gerenciales por rango de fechas: pacientes, cartera pendiente, horas de mayor "
      "afluencia, mejores pacientes, media de demora y top de sesiones &nbsp;&mdash;&nbsp; <b style='display:inline;font-size:9.2pt'>$95.00</b>",
      "Registro de asistencias del paciente en PDF, con fecha, tipo de sesi&oacute;n, t&eacute;cnicas "
      "aplicadas y duraci&oacute;n &nbsp;&mdash;&nbsp; <b style='display:inline;font-size:9.2pt'>$50.00</b>",
      "Origen del paciente en la ficha de ingreso y per&iacute;odo visible en el tablero "
      "&nbsp;&mdash;&nbsp; <b style='display:inline;font-size:9.2pt'>$25.00</b>",
  ], "280.00") +
  fila("b", "FACTURACI&Oacute;N ELECTR&Oacute;NICA SRI &ndash; PUESTA EN MARCHA", [
      "Integraci&oacute;n para emitir facturas electr&oacute;nicas v&aacute;lidas ante el SRI desde Motrix",
      "Configuraci&oacute;n de datos tributarios y pruebas de emisi&oacute;n",
      "Capacitaci&oacute;n al personal que va a facturar",
      "<b style='display:inline;font-size:9.2pt'>Costo anual del facturador: $28.00 + IVA al a&ntilde;o, facturas ilimitadas</b>",
  ], "100.00"),
  totales([("Subtotal:", "$ 380.00", ""), ("Descuento:", "", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 380.00", "total")]),
  "",
  "Todo se construye sobre el Motrix que ya opera en la cl&iacute;nica: no hay reinstalaci&oacute;n ni "
  "migraci&oacute;n de informaci&oacute;n.<br>La firma del consentimiento es f&iacute;sica; el sistema no almacena "
  "la firma ni el escaneo del documento.<br>La firma electr&oacute;nica ante una entidad certificadora la "
  "tramita el cliente.<br>" + PAGO)

# ─── VASLINK · tres escenarios ─────────────────────────────────────────────
B2B = ("M&oacute;dulo opcional de venta a empresas y a p&uacute;blico en el mismo sitio: $520.00, "
       "o $470.00 contratado junto a este escenario.<br>")

TIENDA = ["Dise&ntilde;o propio, migraci&oacute;n de los 2.109 productos y fichas optimizadas",
          "Buscador r&aacute;pido con filtros por categor&iacute;a, marca y precio",
          "Carrito y proceso de compra simplificado, con pasarela de pagos y c&aacute;lculo de env&iacute;os",
          "Optimizaci&oacute;n de velocidad e im&aacute;genes, adaptada a celular y tablet",
          "Panel de autogesti&oacute;n, medici&oacute;n de visitas y ventas, y capacitaci&oacute;n al equipo"]

DOCS["vaslink/proforma-agosto-2026/pdf/escenario-1"] = hoja(
  "1-2-1321", "Vaslink", FECHA, ENTREGA("2 a 3 semanas"),
  fila("a", "CONEXI&Oacute;N DE LA TIENDA ACTUAL CON TINI", [
      "Desarrollo del m&oacute;dulo que conecta la tienda con TINI",
      "El pedido de la web viaja a TINI; el stock, los precios y los detalles bajan desde TINI",
      "Registro de cada env&iacute;o para auditor&iacute;a",
      "Pruebas con pedidos reales antes de activarlo y capacitaci&oacute;n a quien lo opere",
  ], "680.00"),
  totales([("Subtotal:", "$ 680.00", ""), ("Descuento:", "", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 680.00", "total")]),
  "",
  "El env&iacute;o de stock, precios y detalles hacia la web lo ejecuta TINI desde su lado: el plazo "
  "de esa parte depende de su equipo.<br>No incluye desarrollos que TINI deba realizar ni cambios "
  "de dise&ntilde;o en la tienda actual.<br>" + B2B + PAGO)

DOCS["vaslink/proforma-agosto-2026/pdf/escenario-2"] = hoja(
  "1-2-1322", "Vaslink", FECHA, ENTREGA("6 semanas"),
  fila("a", "TIENDA EN L&Iacute;NEA NUEVA SOBRE WOOCOMMERCE", TIENDA, "1,200.00") +
  fila("b", "M&Oacute;DULO DE CONEXI&Oacute;N CON TINI", [
      "Factura autom&aacute;tica al confirmarse el pedido e inventario sincronizado",
      "El stock, los precios y los detalles llegan a la web desde TINI",
      "Registro de cada env&iacute;o para auditor&iacute;a y pruebas con pedidos reales",
  ], "480.00"),
  totales([("Subtotal:", "$ 1,680.00", ""), ("Descuento:", "", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 1,680.00", "total")]),
  "",
  "El plazo del m&oacute;dulo de conexi&oacute;n depende del equipo de TINI, que ejecuta la parte de su "
  "lado.<br>No incluye fotograf&iacute;a, redacci&oacute;n de descripciones, alojamiento ni dominio.<br>"
  + B2B + PAGO)

DOCS["vaslink/proforma-agosto-2026/pdf/escenario-3"] = hoja(
  "1-2-1323", "Vaslink", FECHA, ENTREGA("6 semanas"),
  fila("a", "TIENDA EN L&Iacute;NEA NUEVA SOBRE WOOCOMMERCE", TIENDA, "1,200.00") +
  fila("b", "SISTEMA CONTABLE QUIPUY IMPLEMENTADO Y ADAPTADO", [
      "Facturaci&oacute;n electr&oacute;nica SRI, inventario con kardex, compras y retenciones",
      "Cuentas por cobrar, caja, proformas, ATS mensual y multisucursal",
      "Contabilidad completa y reportes fiscales &middot; 10 usuarios",
      "M&oacute;dulo de conexi&oacute;n con la tienda, ya construido, instalado y configurado",
      "Implementaci&oacute;n, carga inicial, capacitaci&oacute;n y primer a&ntilde;o del sistema incluidos",
      "<b style='display:inline;font-size:9.2pt'>Renovaci&oacute;n desde el a&ntilde;o 2: $350.00 + IVA anuales</b>",
  ], "1,350.00"),
  totales([("Subtotal:", "$ 2,550.00", ""), ("Descuento:", "", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 2,550.00", "total")]),
  "",
  "Antes de firmar se realiza, sin costo, el levantamiento de los m&oacute;dulos que hoy usan en TINI. "
  "Los ajustes de configuraci&oacute;n, reportes y formatos van incluidos; un m&oacute;dulo que Quipuy no "
  "tenga se cotiza aparte.<br>No incluye la migraci&oacute;n del historial contable de TINI.<br>"
  + B2B + PAGO)

# ─── PARQUE CÓNDOR ─────────────────────────────────────────────────────────
DOCS["parque-condor/proforma-agosto-2026/pdf/sitio-web"] = hoja(
  "1-2-1324", "Fundaci&oacute;n Parque C&oacute;ndor", FECHA, ENTREGA("4 semanas"),
  fila("a", "SITIO WEB NUEVO", [
      "Dise&ntilde;o propio y estructura de contenido nueva, adaptada a celular y tablet",
      "Fichas por especie de ave y secci&oacute;n de leyendas con navegaci&oacute;n interna",
      "C&oacute;mo llegar con mapa interactivo e indicaciones desde Otavalo",
      "Formularios de contacto, general y para grupos e instituciones educativas",
      "Optimizaci&oacute;n de velocidad e im&aacute;genes; conservaci&oacute;n de las direcciones que ya posicionan",
      "T&iacute;tulos y descripciones por p&aacute;gina, datos estructurados y medici&oacute;n de visitas y contactos",
      "Migraci&oacute;n del contenido actual, panel de autogesti&oacute;n y capacitaci&oacute;n",
  ], "580.00") +
  fila("b", "ALOJAMIENTO Y DOMINIO &ndash; 15 DE OCTUBRE DE 2026 AL 15 DE OCTUBRE DE 2027", [
      "Hosting anual &nbsp;&mdash;&nbsp; $135.00",
      "Renovaci&oacute;n del dominio .com &nbsp;&mdash;&nbsp; $21.99",
  ], "156.99"),
  totales([("Subtotal:", "$ 736.99", ""), ("Descuento:", "", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 736.99", "total")]),
  " &ndash; <b>RENOVACION 15 OCTUBRE 2026</b>",
  "No incluye venta de entradas ni reservas en l&iacute;nea, por no haber sido solicitadas, ni "
  "fotograf&iacute;a o video profesional.<br>El plan de posicionamiento en Google se cotiza por "
  "separado.<br>" + PAGO)

DOCS["parque-condor/proforma-agosto-2026/pdf/plan-seo"] = hoja(
  "1-2-1325", "Fundaci&oacute;n Parque C&oacute;ndor", FECHA,
  [("Duraci&oacute;n:", "6 meses"), ("Tiempo de Validez:", "30 d&iacute;as"), ("Telefono:", "")],
  fila("a", "PLAN DE POSICIONAMIENTO EN GOOGLE &ndash; 6 MESES", [
      "20 art&iacute;culos publicados cada mes, 120 en total",
      "Reescritura de t&iacute;tulos y descripciones de las p&aacute;ginas que ya aparecen en Google",
      "Instalaci&oacute;n de las herramientas de medici&oacute;n",
      "Reuni&oacute;n y reporte mensual de resultados",
      "<b style='display:inline;font-size:9.2pt'>Alternativa en cuotas: $150.00 + IVA al mes durante 6 meses ($900.00)</b>",
  ], "600.00"),
  totales([("Subtotal:", "$ 600.00", ""), ("Descuento:", "", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 600.00", "total")]),
  "",
  "Valor por el pago &uacute;nico al inicio, que cubre los seis meses y equivale a $100.00 al mes.<br>"
  "No cobramos porcentaje por las visitas ni por los clientes que lleguen.<br>"
  "Es independiente del desarrollo del sitio web y puede contratarse por separado.")

# ─── DIKAPSA + DOECO ───────────────────────────────────────────────────────
DOCS["dikapsa/proforma-seo-agosto-2026/pdf/plan-seo"] = hoja(
  "1-2-1326", "Dikapsa y Doeco &ndash; Sr. Diego O&ntilde;a", FECHA,
  [("Duraci&oacute;n:", "6 meses"), ("Tiempo de Validez:", "30 d&iacute;as"), ("Telefono:", "")],
  fila("a", "PLAN DE POSICIONAMIENTO EN GOOGLE &ndash; DOS EMPRESAS, 6 MESES", [
      "<b style='display:inline;font-size:9.2pt'>dikapsa.com</b> &nbsp;&middot;&nbsp; 20 art&iacute;culos al mes, 120 en total",
      "<b style='display:inline;font-size:9.2pt'>doeco.ec</b> &nbsp;&middot;&nbsp; 20 art&iacute;culos al mes, 120 en total",
      "Reescritura de t&iacute;tulos y descripciones de las p&aacute;ginas que ya posicionan",
      "Instalaci&oacute;n de las herramientas de medici&oacute;n en ambos sitios",
      "Reuni&oacute;n mensual y reporte separado por empresa",
      "<b style='display:inline;font-size:9.2pt'>Alternativa en cuotas: $180.00 + IVA al mes durante 6 meses ($1,080.00)</b>",
  ], "980.00"),
  totales([("Subtotal:", "$ 1,200.00", ""), ("Descuento:", "$ 220.00", ""),
           ("IVA 15%:", "", ""), ("TOTAL:", "$ 980.00", "total")]),
  "",
  "Contratados por separado los dos planes suman $1,200.00; en conjunto quedan en <b>$980.00</b>, "
  "con un ahorro de $220.00.<br>Valor por el pago &uacute;nico al inicio, que cubre los seis meses.<br>"
  "No cobramos porcentaje por las ventas ni por los clientes nuevos.<br>"
  "Una tercera empresa se cotiza en las mismas condiciones.")

if __name__ == "__main__":
    for ruta, html in DOCS.items():
        destino = os.path.join(RAIZ, ruta + ".html")
        os.makedirs(os.path.dirname(destino), exist_ok=True)
        with open(destino, "w", encoding="utf-8") as f:
            f.write(html)
        print("  escrito:", ruta + ".html")
