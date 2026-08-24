#!/usr/bin/env python3
"""Análisis de Search Console vía GA4 — Comercial Hidrobo, 21-may a 18-ago 2026."""
import csv, re, sys
from collections import defaultdict

DIR = "data"


def leer(nombre):
    with open(f"{DIR}/{nombre}", encoding="utf-8") as f:
        filas = [l for l in f if not l.startswith("#") and l.strip()]
    r = csv.reader(filas)
    cab = next(r)
    out = []
    for fila in r:
        if not fila or not fila[0].strip():
            continue
        d = dict(zip(cab, fila))
        out.append(d)
    return out


def num(x):
    try:
        return float(x)
    except (TypeError, ValueError):
        return 0.0


C = "Clics de la Búsqueda de Google orgánica"
I = "Impresiones de la Búsqueda de Google orgánica"
P = "Posición media en la Búsqueda de Google orgánica"
U = "Usuarios activos"
EV = "Eventos clave"
SI = "Sesiones con interacción"

paginas = leer("ch_paginas.csv")
queries = leer("ch_queries.csv")
QCOL = "Consulta de la Búsqueda de Google orgánica"
PCOL = "Página de destino y cadena de consulta"

# ── totales ──────────────────────────────────────────────────────────
tc = sum(num(x[C]) for x in paginas)
ti = sum(num(x[I]) for x in paginas)
tu = sum(num(x.get(U, 0)) for x in paginas)
tev = sum(num(x.get(EV, 0)) for x in paginas)
tsi = sum(num(x.get(SI, 0)) for x in paginas)
print("=" * 68)
print("TOTALES · 21-may a 18-ago 2026 (90 días)")
print("=" * 68)
print(f"  Clics orgánicos      {tc:>12,.0f}")
print(f"  Impresiones          {ti:>12,.0f}")
print(f"  CTR                  {tc/ti*100:>11.2f} %")
print(f"  Páginas con tráfico  {len(paginas):>12,}")
print(f"  Consultas distintas  {len(queries):>12,}")
print(f"  Usuarios activos     {tu:>12,.0f}")
print(f"  Sesiones c/interac.  {tsi:>12,.0f}")
print(f"  EVENTOS CLAVE        {tev:>12,.0f}")

# ── marca vs no marca ────────────────────────────────────────────────
MARCA = re.compile(r"hidrobo|okcars|ok cars|autos ok", re.I)
mc = sum(num(x[C]) for x in queries if MARCA.search(x[QCOL]))
mi = sum(num(x[I]) for x in queries if MARCA.search(x[QCOL]))
print(f"\n{'MARCA vs NO MARCA':-^68}")
print(f"  Marca      {mc:>7,.0f} clics ({mc/tc*100:5.1f} %) · {mi:>9,.0f} impr · CTR {mc/mi*100:.2f} %")
print(f"  No marca   {tc-mc:>7,.0f} clics ({(tc-mc)/tc*100:5.1f} %) · {ti-mi:>9,.0f} impr · CTR {(tc-mc)/(ti-mi)*100:.2f} %")

# ── clusters temáticos ───────────────────────────────────────────────
CLUSTERS = {
    "Eléctricos e híbridos": r"electric|hibrid|híbrid|ev\b|enchufab",
    "Autos chinos":          r"chery|dongfeng|changan|omoda|geely|byd|jetour|jac|great wall|haval|chino",
    "Renault":               r"renault|duster|arkana|kwid|logan|sandero|koleos|oroch",
    "Nissan":                r"nissan|kicks|versa|frontier|x-trail|xtrail|sentra",
    "RAM / Jeep / Dodge":    r"\bram\b|jeep|dodge|fiat",
    "Mazda":                 r"mazda|cx-\d|bt-50",
    "Toyota":                r"toyota|hilux|corolla|fortuner|rav4",
    "Trámites y matrícula":  r"matricul|revisi[óo]n t[ée]cnic|traspaso|placa|impuesto|exoner|prenda|ant\b",
    "Precios":               r"precio|cuesta|cu[áa]nto vale|valor",
    "Financiamiento":        r"cr[ée]dito|financ|cuota|entrada|banco",
    "Seguros":               r"seguro|p[óo]liza|soat",
    "Mantenimiento":         r"aceite|manteni|repuesto|taller|km|kil[óo]metr",
}
print(f"\n{'CLUSTERS (por consulta)':-^68}")
print(f"  {'cluster':<24}{'clics':>7}{'impr':>10}{'CTR':>8}{'pos':>7}{'% clics':>9}")
filas_cluster = []
for nombre, pat in CLUSTERS.items():
    rx = re.compile(pat, re.I)
    sel = [x for x in queries if rx.search(x[QCOL])]
    c = sum(num(x[C]) for x in sel); i = sum(num(x[I]) for x in sel)
    if not i:
        continue
    pos = sum(num(x[P]) * num(x[I]) for x in sel) / i
    filas_cluster.append((nombre, c, i, c/i*100, pos, c/tc*100))
for n, c, i, ctr, pos, share in sorted(filas_cluster, key=lambda r: -r[2]):
    print(f"  {n:<24}{c:>7,.0f}{i:>10,.0f}{ctr:>7.2f}%{pos:>7.1f}{share:>8.1f}%")

# ── páginas: dónde está el dinero perdido ────────────────────────────
print(f"\n{'PÁGINAS CON MÁS IMPRESIONES DESAPROVECHADAS':-^68}")
print("  (posición 1-10 y CTR bajo = el título no convence)")
cand = [x for x in paginas
        if num(x[I]) >= 5000 and 1 <= num(x[P]) <= 10 and num(x[C])/max(num(x[I]),1) < 0.02]
cand.sort(key=lambda x: -num(x[I]))
perdidos = 0
print(f"  {'impr':>9}{'clics':>7}{'CTR':>7}{'pos':>6}  página")
for x in cand[:15]:
    i, c, pos = num(x[I]), num(x[C]), num(x[P])
    # clic esperado con un CTR conservador de 3 % en top-10
    perdidos += i * 0.03 - c
    print(f"  {i:>9,.0f}{c:>7,.0f}{c/i*100:>6.2f}%{pos:>6.1f}  {x[PCOL][:44]}")
print(f"\n  Clics adicionales si esas {len(cand)} páginas llegaran a 3 % de CTR: ~{perdidos:,.0f}")

# ── eventos clave por página ─────────────────────────────────────────
conv = [x for x in paginas if num(x.get(EV, 0)) > 0]
print(f"\n{'CONVERSIONES (eventos clave)':-^68}")
if conv:
    conv.sort(key=lambda x: -num(x[EV]))
    print(f"  {'eventos':>8}{'clics':>7}{'tasa':>8}  página")
    for x in conv[:15]:
        e, c = num(x[EV]), num(x[C])
        print(f"  {e:>8,.0f}{c:>7,.0f}{(e/c*100 if c else 0):>7.1f}%  {x[PCOL][:44]}")
    print(f"\n  Total eventos clave: {tev:,.0f} · tasa global {tev/tc*100:.2f} % de los clics")
else:
    print("  ⚠ Ninguna página registra eventos clave.")
    print("    Los eventos whatsapp_click y form_submit NO están marcados como")
    print("    conversión clave en GA4. Sin eso no se puede medir el retorno del SEO.")

# ── top consultas sin capturar ───────────────────────────────────────
print(f"\n{'CONSULTAS CON DEMANDA Y CERO O CASI CERO CLICS':-^68}")
sin = [x for x in queries if num(x[I]) >= 400 and num(x[C]) <= 2 and not MARCA.search(x[QCOL])]
sin.sort(key=lambda x: -num(x[I]))
print(f"  {'impr':>8}{'clics':>7}{'pos':>7}  consulta")
for x in sin[:20]:
    print(f"  {num(x[I]):>8,.0f}{num(x[C]):>7,.0f}{num(x[P]):>7.1f}  {x[QCOL][:46]}")
