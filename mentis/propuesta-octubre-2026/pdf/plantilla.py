#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Proformas de Mentis Psicología Ecuador (octubre 2026), en el formato oficial de una hoja A4:
  1-2-1333 · Sistema de gestión para las dos sedes (motor DentiLab adaptado a psicología)
  1-2-1334 · Sitio web con tests en línea y venta de cursos (+ plan SEO opcional)

    python3 plantilla.py   # escribe los HTML; el PDF sale con Chrome headless
"""
import os, base64

HERE = os.path.dirname(os.path.abspath(__file__))

CLIENTE    = "Mentis Psicolog&iacute;a Ecuador"
ATENCION   = ""
FECHA      = "5 de octubre de 2026"
VALIDEZ    = "15 d&iacute;as"
TELEFONO   = "099 680 8999"

def _b64(nombre):
    ruta = os.path.join(HERE, "assets", nombre)
    with open(ruta, "rb") as f:
        return base64.b64encode(f.read()).decode()

ISO = _b64("iso-creativeweb.png")
MENTIS = _b64("logo-mentis.jpg")

CSS = """
@page { size: A4; margin: 0; }
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Poppins', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: #22344f; background: #fff;
  -webkit-print-color-adjust: exact; print-color-adjust: exact;
}
.hoja {
  width: 210mm; height: 297mm; padding: 10mm 13mm 8mm;
  position: relative; overflow: hidden;
  display: flex; flex-direction: column;
}
.marca {
  position: absolute; left: -18mm; top: 92mm; width: 150mm;
  opacity: .045; transform: rotate(-8deg); z-index: 0;
}
.capa { position: relative; z-index: 1; display: flex; flex-direction: column; flex: 1 1 auto; min-height: 0; }

/* cabecera */
.logos { display: flex; align-items: center; justify-content: center; gap: 7mm; margin-bottom: 6mm; }
.logos .sep { width: .4mm; height: 11mm; background: #b9c6d6; }
.logo { display: flex; align-items: center; justify-content: center; gap: 4mm; }
.logo.cli img { height: 19mm; }
.logo.dl span { font-weight: 600; }
.logo.dl span b { color: #2d4ed8; font-weight: 600; }
.logo img { height: 12mm; }
.logo span { font-size: 25pt; font-weight: 500; letter-spacing: -.015em; color: #1b2a4e; }

.barra {
  background: #1668c1; color: #fff; text-align: center;
  padding: 2.7mm; border-radius: 1.2mm; margin-bottom: 4.5mm;
  font-size: 13.5pt; font-weight: 700; letter-spacing: .01em;
}

/* datos */
.datos { display: flex; justify-content: space-between; margin: 0 6mm 4.5mm; font-size: 10pt; }
.datos .col { display: grid; grid-template-columns: auto auto; gap: 2.2mm 4mm; }
.datos .k { font-weight: 600; text-align: right; white-space: nowrap; }
.datos .v { white-space: nowrap; }

/* tabla */
table.items { width: 100%; border-collapse: collapse; }
table.items th {
  background: #c9e3f7; border: .35mm solid #7fa9cc; color: #22344f;
  font-size: 9.5pt; font-weight: 500; padding: 2mm;
}
table.items td { border: .35mm solid #7fa9cc; padding: 2.1mm 4.5mm; vertical-align: middle; }
td.item  { width: 13mm; text-align: center; font-size: 10.5pt; }
td.valor { width: 27mm; text-align: center; font-size: 11.5pt; white-space: nowrap; }
td.desc  { font-size: 9pt; line-height: 1.38; }
td.desc b { font-size: 9.6pt; display: block; margin-bottom: 1.2mm; }

/* totales */
.cierre { display: flex; align-items: stretch; margin-top: -.35mm; }
.cierre .izq { flex: 1; border: .35mm solid #7fa9cc; border-right: 0; padding: 3mm 4.5mm; }
.cierre .izq h4 { font-size: 11pt; font-weight: 400; margin-bottom: 2.5mm; }
.cierre .izq p { font-size: 8pt; line-height: 1.55; color: #46586f; }
table.tot { border-collapse: collapse; width: 74mm; }
table.tot td { border: .35mm solid #7fa9cc; padding: 1.9mm 3mm; font-size: 10.5pt; }
table.tot td.et { border-left: 0; border-right: 0; text-align: right; }
table.tot td.nu { width: 27mm; text-align: center; white-space: nowrap; }
table.tot tr.total td { font-weight: 700; }

/* pie */
.pie { margin-top: auto; padding-top: 5mm; display: flex; align-items: flex-end; justify-content: space-between; }
.pie .firma { font-size: 11pt; line-height: 1.5; }
.pie .firma .rubrica {
  font-family: 'Great Vibes', cursive; color: #000; font-size: 26pt; line-height: 1;
  border-bottom: .3mm solid #22344f; padding: 0 2mm 1.5mm; margin-bottom: 1.5mm;
  display: block; width: fit-content;
}
.pie .cont { display: flex; align-items: center; gap: 4mm; }
.pie .cont .txt { text-align: right; font-size: 9.5pt; font-weight: 600; line-height: 1.55; border-right: .4mm solid #b9c6d6; padding-right: 4mm; }
.pie .cont img { height: 13mm; }
"""

def fila(letra, titulo, lineas, valor):
    cuerpo = "<br>".join(lineas)
    return f"""<tr>
      <td class="item">{letra}</td>
      <td class="desc"><b>{titulo}</b>{cuerpo}</td>
      <td class="valor">$ {valor}</td>
    </tr>"""

def totales(filas):
    out = ""
    for et, nu, cls in filas:
        out += f'<tr class="{cls}"><td class="et">{et}</td><td class="nu">{nu}</td></tr>'
    return out

def documento(numero, cobertura, renovacion, filas_items, filas_tot, nota):
    return f"""<!DOCTYPE html><html lang="es"><head><meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Great+Vibes&display=swap" rel="stylesheet">
<style>{CSS}</style></head><body>
<div class="hoja">
  <img class="marca" src="data:image/png;base64,{ISO}">
  <div class="capa">
    <div class="logos">
      <div class="logo">
        <img src="data:image/png;base64,{ISO}">
        <span>creative web</span>
      </div>
      <div class="sep"></div>
      <div class="logo cli"><img src="data:image/jpeg;base64,{MENTIS}"></div>
    </div>

    <div class="barra">PROFORMA # {numero}</div>

    <div class="datos">
      <div class="col">
        <div class="k">Cliente:</div><div class="v">{CLIENTE}</div>
                <div class="k">Fecha:</div><div class="v">{FECHA}</div>
      </div>
      <div class="col">
        <div class="k">Cobertura:</div><div class="v">{cobertura}</div>
        <div class="k">Tiempo de Validez:</div><div class="v">{VALIDEZ}</div>
        <div class="k">Telefono:</div><div class="v">{TELEFONO}</div>
      </div>
    </div>

    <table class="items">
      <thead><tr><th>&Iacute;tem</th><th>Descripci&oacute;n</th><th>Valor</th></tr></thead>
      <tbody>{filas_items}</tbody>
    </table>

    <div class="cierre">
      <div class="izq">
        <h4>PRECIOS NO INCLUYEN IVA &ndash; <b>{renovacion}</b></h4>
        <p>{nota}</p>
      </div>
      <table class="tot">{filas_tot}</table>
    </div>

    <div class="pie">
      <div class="firma"><div class="rubrica">Santiago O&ntilde;a S</div>Ing. Santiago O&ntilde;a S&aacute;nchez<br>CREATIVE WEB</div>
      <div class="cont">
        <div class="txt">
          info@creativeweb.com.ec<br>
          Modesto Jaramillo 3-60 y<br>
          Abd&oacute;n Calder&oacute;n 2do piso, Otavalo<br>
          099 917 4980 &ndash; 062 924 887
        </div>
        <img src="data:image/png;base64,{ISO}">
      </div>
    </div>
  </div>
</div>
</body></html>"""

# ─── Proforma 1-2-1333 · Sistema ───────────────────────────────────────────
S_A = fila("a",
    "IMPLEMENTACI&Oacute;N DEL SISTEMA PARA LAS SEDES DE QUITO E IBARRA &ndash; PAGO &Uacute;NICO",
    ["Ficha cl&iacute;nica psicol&oacute;gica: motivo de consulta, anamnesis, antecedentes, evaluaci&oacute;n del estado, diagn&oacute;stico CIE-10 y plan terap&eacute;utico",
     "Registro de cada sesi&oacute;n con notas de terapia e historial del paciente",
     "Cada sede ve solo sus ingresos y saldos; la propietaria ve las dos por separado",
     "Tarifas propias por sede y profesionales asignados a cada una",
     "Facturaci&oacute;n electr&oacute;nica configurada por sede, con su RUC y punto de emisi&oacute;n",
     "Carga inicial de pacientes, configuraci&oacute;n de las dos sedes y capacitaci&oacute;n del equipo",
     "Forma de pago: 60&nbsp;% al iniciar ($ 720.00) y 40&nbsp;% a la entrega ($ 480.00)"],
    "1,200.00")
S_B = fila("b",
    "SUSCRIPCI&Oacute;N MENSUAL &ndash; $ 59.00 POR SEDE (QUITO E IBARRA)",
    ["Profesionales y pacientes ilimitados en cada sede",
     "Agenda por profesional, con bloqueo de feriados, vacaciones y ausencias",
     "Recordatorios y confirmaciones de cita por WhatsApp",
     "Reservas en tiempo real desde la p&aacute;gina web, con la agenda en vivo",
     "Cada psic&oacute;logo recibe su lista de pacientes el d&iacute;a anterior y la ma&ntilde;ana de la cita",
     "Cobros, abonos y saldos del paciente, con pago mixto",
     "Facturaci&oacute;n electr&oacute;nica al SRI ilimitada, incluida en este valor",
     "Servidor, respaldos diarios y soporte"],
    "118.00")
S_NOTA = ("<b>Primer pago:</b> 60&nbsp;% de la implementaci&oacute;n ($ 720.00). La suscripci&oacute;n se cobra desde la entrega.<br>"
          "<b>La ficha psicol&oacute;gica</b> se define con Mentis en una reuni&oacute;n de dise&ntilde;o.<br>"
          "<b>Costos de terceros, no los cobra Creative Web:</b> mensajes de WhatsApp que cobra Meta (aprox. $ 0.01 por mensaje) "
          "y la firma electr&oacute;nica de cada RUC para facturar.")

# ─── Proforma 1-2-1334 · Sitio web ─────────────────────────────────────────
W_A = fila("a",
    "SITIO WEB MENTIS PSICOLOG&Iacute;A",
    ["Inicio, servicios (ni&ntilde;os, adolescentes, adultos, adultos mayores, parejas y familias), presencial y virtual",
     "Sedes de Quito e Ibarra con mapa y WhatsApp &middot; equipo, testimonios y blog",
     "Reservas en tiempo real: muestra en vivo los horarios libres de la agenda del sistema",
     "Adaptado a celular &middot; SEO b&aacute;sico: Google Business, Search Console y t&iacute;tulos",
     "Primer a&ntilde;o incluido: dominio mentispsicologiaecuador.com, hosting y correos"],
    "500.00")
W_B = fila("b",
    "TESTS PSICOL&Oacute;GICOS EN L&Iacute;NEA &ndash; GRATUITOS",
    ["Hasta 3 tests de tamizaje definidos con Mentis (p. ej. ansiedad, estr&eacute;s, &aacute;nimo)",
     "Piden nombre y WhatsApp; el resultado llega a Mentis para dar seguimiento",
     "El paciente ve una orientaci&oacute;n general y el bot&oacute;n para agendar su cita"],
    "200.00")
W_C = fila("c",
    "CURSOS Y TALLERES CON PAGO EN L&Iacute;NEA",
    ["Cat&aacute;logo con una p&aacute;gina por curso o taller: fecha, temario y facilitador",
     "Inscripci&oacute;n y pago con tarjeta en la web, con confirmaci&oacute;n por correo",
     "Listado de inscritos por curso para Mentis"],
    "300.00")
W_D = fila("d",
    "PLAN DE POSICIONAMIENTO &ndash; 6 MESES (OPCIONAL, NO SUMADO)",
    ["20 art&iacute;culos al mes &mdash; 120 en los seis meses",
     "Informe y reuni&oacute;n mensual con apariciones, visitas y posiciones en Google",
     "Alternativa mes a mes: $ 150.00 + IVA mensuales, $ 900.00 en total"],
    "600.00")
W_NOTA = ("<b>Forma de pago:</b> 60&nbsp;% al iniciar ($ 492.00) y 40&nbsp;% a la entrega ($ 328.00). El &iacute;tem d es opcional.<br>"
          "<b>Renovaci&oacute;n desde el segundo a&ntilde;o:</b> hosting y correos corporativos $ 120.00 + dominio $ 21.99 = $ 141.99 + IVA al a&ntilde;o.<br>"
          "<b>Costos de terceros:</b> la pasarela de pago cobra su comisi&oacute;n por cada venta de cursos. "
          "Los tests son de orientaci&oacute;n y no reemplazan la evaluaci&oacute;n de un profesional.")

DOCS = {
 "proforma-1-2-1333-sistema": documento("1-2-1333", "Mensual", "SUSCRIPCI&Oacute;N MENSUAL POR SEDE", S_A + S_B,
    totales([("Implementaci&oacute;n:", "$ 1,200.00", ""), ("Mensual (2 sedes):", "$ 118.00", ""),
             ("IVA 15%:", "", ""), ("TOTAL:", "$ 1,318.00", "total")]), S_NOTA),
 "proforma-1-2-1334-web": documento("1-2-1334", "Anual", "RENOVACI&Oacute;N ANUAL DESDE EL A&Ntilde;O 2", W_A + W_B + W_C + W_D,
    totales([("Subtotal:", "$ 1,000.00", ""), ("Descuento:", "$ 180.00", ""),
             ("IVA 15%:", "", ""), ("TOTAL:", "$ 820.00", "total")]), W_NOTA),
}

if __name__ == "__main__":
    for nombre, html in DOCS.items():
        with open(os.path.join(HERE, nombre + ".html"), "w", encoding="utf-8") as f:
            f.write(html)
        print("  escrito:", nombre + ".html")
