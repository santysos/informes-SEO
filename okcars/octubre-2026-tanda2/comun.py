#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Constantes compartidas por la tanda de octubre 2026 de OKCars (20 posts, lotes J a M).

OKCars se escribe en USTED (decisión del 2026-09-30): «escríbanos», «puede», «su auto».
Ni tú ni vos. publish_batch.py rechaza cualquier spec con formas de tuteo o voseo.

Las cifras de seguros, entrada y cuotas salen de los posts ya publicados en el sitio,
no de una estimación nueva: el sitio no puede contradecirse a sí mismo.
"""
import os
import sys

sys.path.insert(0, os.path.join(os.path.dirname(os.path.abspath(__file__)),
                                "..", "septiembre-2026"))

from gutenberg import CAT, LISTADO, SITE, link, wa  # noqa: E402
from gutenberg import guarda as _guarda  # noqa: E402

AQUI = os.path.dirname(os.path.abspath(__file__))
CITA = "Equipo comercial de OKCars"


def guarda(spec):
    """Escribe el spec en posts/ de ESTA carpeta (gutenberg.guarda usa la suya)."""
    return _guarda(spec, os.path.join(AQUI, "posts"))


def cierre(mensaje, texto=None):
    """Párrafo final de contacto, en usted."""
    texto = texto or ("Si quiere ver alguna unidad o resolver una duda puntual, "
                      "escríbanos al")
    return (f"{texto} {link(wa(mensaje), 'WhatsApp de OKCars')}. El "
            f"{link(LISTADO, 'listado completo de vehículos')} está actualizado con precio "
            f"y kilometraje de cada unidad.")


V = f"{SITE}/vehiculos-okcars"

# ── enlaces internos verificados contra el sitio el 2026-09-30 (los 76 publicados) ──
G = f"{SITE}/guias-de-compra"
T = f"{SITE}/tramites"
F = f"{SITE}/financiamiento"
M = f"{SITE}/modelos-y-comparativas"
I = f"{SITE}/seminuevos-ibarra"

CHECKLIST = f"{G}/checklist-revisar-auto-usado-antes-de-comprar/"
REVISION = f"{T}/revision-mecanica-antes-de-comprar-auto/"
KILOMETRAJE = f"{G}/kilometraje-auto-usado-cuanto-es-mucho/"
MANTENIMIENTO = f"{M}/autos-usados-menos-mantenimiento/"
PATIO = f"{G}/comprar-auto-patio-o-particular/"
PRIMER = f"{G}/primer-auto-ecuador-guia-primerizos/"
HIBRIDOS = f"{G}/autos-hibridos-usados-ecuador/"
CHINOS = f"{G}/autos-chinos-usados-ecuador-guia/"
DIESEL = f"{G}/camionetas-diesel-usadas-ecuador/"
DEVALUA = f"{G}/cuanto-se-devalua-un-auto-usado-ecuador/"
SUV_SEDAN = f"{G}/suv-o-sedan-usado-cual-conviene/"
SEGURO_DANOS = f"{G}/seguro-danos-a-terceros-auto/"
SEGURO_VIAJES = f"{G}/seguro-auto-viajes-interprovinciales/"
# El de precio se consolidó en SEGURO el 2026-10-01 (301). Se deja el alias por los lotes.
SEGURO_PRECIO = f"{F}/seguro-vehicular-autos-usados-ecuador/"
SEGURO_ANTIGUO = f"{G}/asegurar-auto-usado-antiguo-requisitos/"
REVENTA = f"{G}/autos-usados-que-mejor-se-revenden-ecuador/"
COSTO_MANTENER = f"{G}/cuanto-cuesta-mantener-auto-usado-ecuador/"

TRASPASO = f"{T}/traspaso-vehiculo-ecuador-requisitos-pasos/"
PAPELES = f"{T}/papeles-antes-de-comprar-auto-usado/"
PRENDA = f"{T}/comprar-auto-con-prenda-ecuador/"
DOMINIO = f"{T}/traspaso-de-dominio-vehiculo-ecuador/"
MULTAS = f"{T}/consultar-multas-vehiculo-antes-de-comprar/"
TRASPASO_MULTAS = f"{T}/traspaso-con-multas-pendientes-ecuador/"
MATRICULA = f"{T}/matricular-un-auto-ecuador-costos/"
REVISION_TECNICA = f"{T}/revision-tecnica-vehicular-ecuador/"
PODER = f"{T}/traspaso-vehiculo-poder-notarial-ecuador/"
CAMBIO_PROPIETARIO = f"{T}/cambio-de-propietario-vehiculo-ecuador/"

ENTRADA = f"{F}/cuanto-entrada-auto-usado-ecuador/"
SEGURO = f"{F}/seguro-vehicular-autos-usados-ecuador/"
CREDITO = f"{F}/credito-directo-auto-usado-ecuador/"
BANCO = f"{F}/banco-o-credito-directo-auto-usado/"
CUOTA = f"{F}/cuota-mensual-auto-usado-calculo/"
PARTE_PAGO = f"{F}/cambiar-auto-parte-de-pago/"
SIN_HISTORIAL = f"{F}/comprar-auto-credito-sin-historial/"
CENTRAL = f"{F}/comprar-auto-central-de-riesgos/"
APROBACION = f"{F}/cuanto-tarda-aprobacion-credito-auto/"

IBARRA_GARANTIA = f"{I}/autos-seminuevos-ibarra-con-garantia/"
CAYAMBE = f"{I}/comprar-seminuevo-desde-cayambe/"

# Los posts de modelo están en /modelos-y-comparativas/
POST_SELTOS = f"{M}/kia-seltos-usado-ecuador-guia/"
POST_TERRITORY = f"{M}/ford-territory-usada-ecuador/"
POST_MAXUS = f"{M}/maxus-t60-diesel-usada-ecuador/"
POST_HUNTER = f"{M}/changan-hunter-ecuador-camioneta/"
POST_TANG = f"{M}/byd-tang-electrico-usado-ecuador/"
POST_CX5 = f"{M}/mazda-cx5-usada-ecuador-vale-la-pena/"
POST_TUCSON = f"{M}/hyundai-tucson-usada-ecuador-precios/"
POST_PRIUS = f"{M}/toyota-prius-c-usado-ecuador-kilometraje/"

# ── costos referenciales del traspaso (del post publicado de traspaso) ──────
COSTO_NOTARIA = "20 y 40 dólares"
COSTO_GRAVAMENES = "5 y 10 dólares"
COSTO_TASA_ANT = "30 y 50 dólares"
PLAZO_ANT = "3 y 10 días hábiles"
AVISO_COSTOS = ("Los valores son referenciales y cambian entre cantones y notarías. "
                "Confírmelos en la agencia de tránsito de su zona antes de iniciar el trámite.")

# ── cifras de seguro (del post publicado «seguro de auto usado: qué cubre y cuánto») ──
# Prima anual aproximada por valor del vehículo; regla: 3,5 % a 5 % del valor al año.
SEGURO_TABLA = [
    ["Valor del vehículo", "Prima anual aproximada", "Al mes"],
    ["$10.000", "$400 – $600", "$33 – $50"],
    ["$15.000", "$550 – $800", "$46 – $67"],
    ["$20.000", "$700 – $1.000", "$58 – $83"],
    ["$30.000", "$1.000 – $1.500", "$83 – $125"],
]
SEGURO_REGLA = "entre el 3,5 % y el 5 % del valor del auto al año"
DEDUCIBLE_EJEMPLO = "10 % del siniestro con un mínimo de $250"

# ── financiamiento (de los posts publicados de entrada y cuota) ─────────────
# Entrada habitual: 20-40 % según el año; cuota ≤ 25 % del ingreso neto.
ENTRADA_RANGO = "entre el 20 % y el 40 % del valor del auto"
CUOTA_TOPE = "el 25 % del ingreso neto"

# ── inventario real (fichas verificadas el 2026-09-30) ──────────────────────
# (url, nombre, año, km, precio). Año None = no confirmado: NO mencionarlo.
# Seltos y Territory figuran como 2025 en posts de septiembre y como 2021/2022 en el
# listado del 8-sep: hasta confirmarlo con el cliente, no se escribe su año.
FICHA = {
    "prius": (f"{V}/toyota-prius-c-sport-ac-1-5-5p-4x2-ta-hybrid/",
              "Toyota Prius C Sport", "2018", "256.811", "$13.000"),
    "maxus": (f"{V}/maxus-t60-elite-ac-2-8-cd-4x4-tm-diesel/",
              "Maxus T60 Elite 4x4 diésel", "2024", "38.500", "$23.000"),
    "koleos": (f"{V}/koleos-4x2-2-5-cvt/", "Renault Koleos 2.5 CVT", "2012", "276.000", "$8.500"),
    "tang": (f"{V}/byd-tang-ac-5p-4x4-ta-ev/", "BYD Tang eléctrico", "2024", "63.000", "$45.000"),
    "sienna": (f"{V}/toyota-sienna-xle/", "Toyota Sienna XLE", "2011", "78.657", "$38.000"),
    "hunter": (f"{V}/hunter-ac-1-9-cd-4x2-tm-diesel/",
               "Changan Hunter 4x2 diésel", "2026", "4.500", "$25.900"),
    "tucson": (f"{V}/tucson-gl-gaa-4x2-ta-bhwds6b-4186/",
               "Hyundai Tucson GL", "2007", "281.682", "$9.500"),
    "cx5": (f"{V}/cx-5-active-ac-2-0-5p-4x2-ta/", "Mazda CX-5 Active", "2023", "46.500", "$31.900"),
    "seltos": (f"{V}/kia-seltos-1-6-t-a/", "Kia Seltos 1.6 automático", None, "64.560", "$20.500"),
    "territory": (f"{V}/ford-territory-1-5-t-a/", "Ford Territory 1.5 automático", None,
                  "67.000", "$20.500"),
}


def enlace_ficha(clave, texto=None):
    u, nombre, anio, _km, _p = FICHA[clave]
    return link(u, texto or (f"{nombre} {anio}" if anio else nombre))


def fila_ficha(clave):
    _u, nombre, anio, km, precio = FICHA[clave]
    return [nombre, anio or "—", f"{km} km", precio]


# ── calendario: 20 posts en octubre, uno cada 1-2 días, a las 09:00 ─────────
FECHAS = [f"2026-10-{d:02d}T09:00:00" for d in
          (2, 3, 5, 6, 8, 9, 12, 13, 15, 16, 19, 20, 22, 23, 26, 27, 28, 29, 30, 31)]
