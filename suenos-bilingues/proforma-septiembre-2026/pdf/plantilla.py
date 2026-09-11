#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Genera la cotizacion del sistema de matricula de Suenos Bilingues en el formato oficial
de proforma de Creative Web: una sola hoja A4, sin carta de presentación.
"""
import os, base64

HERE = os.path.dirname(os.path.abspath(__file__))

# ─── Datos que se cambian a mano ────────────────────────────────────────────
PROFORMA   = "1-2-1329"
CLIENTE    = "Sueños Bilingües — Saravino"
FECHA      = "11 de septiembre de 2026"
VALIDEZ    = "30 días"
COBERTURA  = "2 a 3 semanas"
TELEFONO   = ""
RENOVACION = "RENOVACION ANUAL $90"

def _b64(nombre):
    ruta = os.path.join(HERE, "assets", nombre)
    with open(ruta, "rb") as f:
        return base64.b64encode(f.read()).decode()

ISO = _b64("iso-creativeweb.png")

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
.logo { display: flex; align-items: center; justify-content: center; gap: 4mm; margin-bottom: 6mm; }
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
table.items td { border: .35mm solid #7fa9cc; padding: 2.6mm 4.5mm; vertical-align: middle; }
td.item  { width: 13mm; text-align: center; font-size: 10.5pt; }
td.valor { width: 27mm; text-align: center; font-size: 11.5pt; white-space: nowrap; }
td.desc  { font-size: 9.2pt; line-height: 1.44; }
td.desc b { font-size: 9.8pt; display: block; margin-bottom: 1.8mm; }

/* totales */
.cierre { display: flex; align-items: stretch; margin-top: -.35mm; }
.cierre .izq { flex: 1; border: .35mm solid #7fa9cc; border-right: 0; padding: 3mm 4.5mm; }
.cierre .izq h4 { font-size: 11pt; font-weight: 400; margin-bottom: 2.5mm; }
.cierre .izq p { font-size: 8pt; line-height: 1.55; color: #46586f; }
table.tot { border-collapse: collapse; width: 62mm; }
table.tot td { border: .35mm solid #7fa9cc; padding: 1.9mm 3mm; font-size: 10.5pt; }
table.tot td.et { border-left: 0; border-right: 0; text-align: right; }
table.tot td.nu { width: 27mm; text-align: center; white-space: nowrap; }
table.tot tr.total td { font-weight: 700; }

/* pie */
.pie { margin-top: auto; padding-top: 5mm; display: flex; align-items: flex-end; justify-content: space-between; }
.pie .firma { font-size: 11pt; line-height: 1.5; }
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

def documento(numero, filas_items, filas_tot, nota):
    return f"""<!DOCTYPE html><html lang="es"><head><meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>{CSS}</style></head><body>
<div class="hoja">
  <img class="marca" src="data:image/png;base64,{ISO}">
  <div class="capa">
    <div class="logo">
      <img src="data:image/png;base64,{ISO}">
      <span>creative web</span>
    </div>

    <div class="barra">PROFORMA # {numero}</div>

    <div class="datos">
      <div class="col">
        <div class="k">Cliente:</div><div class="v">{CLIENTE}</div>
        <div class="k">Fecha:</div><div class="v">{FECHA}</div>
      </div>
      <div class="col">
        <div class="k">Cobertura:</div><div class="v">{COBERTURA}</div>
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
        <h4>PRECIOS NO INCLUYEN IVA &ndash; <b>{RENOVACION}</b></h4>
        <p>{nota}</p>
      </div>
      <table class="tot">{filas_tot}</table>
    </div>

    <div class="pie">
      <div class="firma">Ing. Santiago O&ntilde;a S&aacute;nchez<br>CREATIVE WEB</div>
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

# ─── Contenido de los ítems ─────────────────────────────────────────────────
ITEM_A = fila("a",
    "SISTEMA QUIPUY &ndash; PRIMER A&Ntilde;O",
    ["Plataforma base sobre la que funciona el m&oacute;dulo de matr&iacute;cula",
     "Acceso para el equipo administrativo",
     "Se renueva cada a&ntilde;o"],
    "90.00")

ITEM_B = fila("b",
    "M&Oacute;DULO DE MATR&Iacute;CULA Y AGENDA DE CLASES",
    ["Ficha de alumno con fecha de nacimiento",
     "Ficha de representante con parentesco y n&uacute;mero de WhatsApp",
     "Asignaci&oacute;n autom&aacute;tica del grupo seg&uacute;n la edad, con cambio manual por el administrador",
     "Cuatro grupos: Tiny Club, Junior Learners, Future Speakers y EFE",
     "Agenda de los cuatro horarios de 14:00 a 18:00",
     "Control de cupo: m&aacute;ximo 7 alumnos por hora de clase",
     "Cambio de horario del alumno con liberaci&oacute;n autom&aacute;tica del cupo",
     "Mensaje de confirmaci&oacute;n de la matr&iacute;cula",
     "Capacitaci&oacute;n al equipo y un mes de soporte",
     "Pago &uacute;nico"],
    "120.00")

ITEM_C = fila("c",
    "INTEGRACI&Oacute;N CON WHATSAPP",
    ["Env&iacute;o autom&aacute;tico de la confirmaci&oacute;n al representante",
     "Aviso autom&aacute;tico cuando se cambia el horario",
     "Pago &uacute;nico"],
    "50.00")

NOTA = ("Forma de pago: un solo pago al iniciar.<br>"
        "Desde el segundo a&ntilde;o solo se renueva el sistema Quipuy: $90.00 + IVA anuales. El m&oacute;dulo y "
        "la integraci&oacute;n son desarrollo, se pagan una vez.<br>"
        "No incluye cobro de pensiones en l&iacute;nea, control de asistencia diaria, calificaciones, "
        "aplicaci&oacute;n para celular ni migraci&oacute;n de alumnos ya registrados.")

DOCS = {
 "cotizacion": documento(
    PROFORMA, ITEM_A + ITEM_B + ITEM_C,
    totales([("Subtotal:", "$ 260.00", ""), ("Descuento:", "", ""),
             ("IVA 15%:", "", ""), ("TOTAL:", "$ 260.00", "total")]),
    NOTA),
}

if __name__ == "__main__":
    for nombre, html in DOCS.items():
        ruta = os.path.join(HERE, nombre + ".html")
        with open(ruta, "w", encoding="utf-8") as f:
            f.write(html)
        print("  escrito:", nombre + ".html")
