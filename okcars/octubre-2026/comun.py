#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Constantes compartidas por los lotes F a I de OKCars (octubre–noviembre 2026).

Los costos del traspaso salen del artículo que ya está publicado en el sitio
(`/tramites/traspaso-vehiculo-ecuador-requisitos-pasos/`), no de una estimación
nueva. Se mantienen idénticos en todos los posts para que el sitio no se
contradiga a sí mismo.
"""
import os
import sys

sys.path.insert(0, os.path.join(os.path.dirname(os.path.abspath(__file__)),
                                "..", "septiembre-2026"))

from gutenberg import CAT, LISTADO, SITE, link, wa  # noqa: E402
from gutenberg import guarda as _guarda  # noqa: E402

AQUI = os.path.dirname(os.path.abspath(__file__))


def guarda(spec):
    """Escribe el spec en posts/ de ESTA carpeta.

    gutenberg.guarda() por defecto usa la ruta de gutenberg.py, que vive en
    septiembre-2026. Sin este envoltorio los specs de octubre caen en el lote
    equivocado y publish_batch los mezcla.
    """
    return _guarda(spec, os.path.join(AQUI, "posts"))

V = f"{SITE}/vehiculos-okcars"

# ── enlaces internos verificados ────────────────────────────────────────────
CHECKLIST = f"{SITE}/guias-de-compra/checklist-revisar-auto-usado-antes-de-comprar/"
TRASPASO = f"{SITE}/tramites/traspaso-vehiculo-ecuador-requisitos-pasos/"
PAPELES = f"{SITE}/tramites/papeles-antes-de-comprar-auto-usado/"
PRENDA = f"{SITE}/tramites/comprar-auto-con-prenda-ecuador/"
DOMINIO = f"{SITE}/tramites/traspaso-de-dominio-vehiculo-ecuador/"
HIBRIDOS = f"{SITE}/guias-de-compra/autos-hibridos-usados-ecuador/"
CHINOS = f"{SITE}/guias-de-compra/autos-chinos-usados-ecuador-guia/"
DIESEL = f"{SITE}/guias-de-compra/camionetas-diesel-usadas-ecuador/"
DEVALUA = f"{SITE}/guias-de-compra/cuanto-se-devalua-un-auto-usado-ecuador/"
KILOMETRAJE = f"{SITE}/guias-de-compra/kilometraje-auto-usado-cuanto-es-mucho/"
MANTENIMIENTO = f"{SITE}/guias-de-compra/autos-usados-menos-mantenimiento/"
PATIO = f"{SITE}/guias-de-compra/comprar-auto-patio-o-particular/"
PRIMER = f"{SITE}/guias-de-compra/primer-auto-ecuador-guia-primerizos/"
ENTRADA = f"{SITE}/financiamiento/cuanto-entrada-auto-usado-ecuador/"
SEGURO = f"{SITE}/financiamiento/seguro-vehicular-autos-usados-ecuador/"
CREDITO = f"{SITE}/financiamiento/credito-directo-auto-usado-ecuador/"
BANCO = f"{SITE}/financiamiento/banco-o-credito-directo-auto-usado/"
CUOTA = f"{SITE}/financiamiento/cuota-mensual-auto-usado-calculo/"
PARTE_PAGO = f"{SITE}/financiamiento/cambiar-auto-parte-de-pago/"
REVISION = f"{SITE}/guias-de-compra/revision-mecanica-antes-de-comprar-auto/"
IBARRA_GARANTIA = f"{SITE}/seminuevos-ibarra/autos-seminuevos-ibarra-garantia/"

# ── costos referenciales del traspaso (fuente: post ya publicado) ───────────
COSTO_NOTARIA = "20 y 40 dólares"
COSTO_GRAVAMENES = "5 y 10 dólares"
COSTO_TASA_ANT = "30 y 50 dólares"
PLAZO_ANT = "3 y 10 días hábiles"

AVISO_COSTOS = (
    "Los valores son referenciales y cambian entre cantones y notarías. "
    "Confirmalos en la agencia de tránsito de tu zona antes de iniciar el trámite."
)

# ── fichas reales del inventario (listado del 2026-09-08) ───────────────────
FICHA = {
    "crosstrek": (f"{V}/subaru-crosstrek-ac-2-0-5p-4x4-ta-hybrid/",
                  "Subaru Crosstrek", "2024", "25.000", "$26.900"),
    "captiva": (f"{V}/chevrolet-captiva-ltz-turbo-5pas-ac-1-5-5p-4x2-tm/",
                "Chevrolet Captiva LTZ Turbo", "2022", "49.725", "$16.000"),
    "prius": (f"{V}/toyota-prius-c-sport-ac-1-5-5p-4x2-ta-hybrid/",
              "Toyota Prius C", "2018", "256.811", "$13.000"),
    "maxus": (f"{V}/maxus-t60-elite-ac-2-8-cd-4x4-tm-diesel/",
              "Maxus T60 Elite", "2024", "38.500", "$23.000"),
    "koleos": (f"{V}/koleos-4x2-2-5-cvt/", "Renault Koleos", "2012", "276.000", "$8.500"),
    "tang": (f"{V}/byd-tang-ac-5p-4x4-ta-ev/", "BYD Tang", "2024", "63.000", "$45.000"),
    "hunter": (f"{V}/hunter-ac-1-9-cd-4x2-tm-diesel/", "Changan Hunter", "2026", "4.500", "$25.900"),
    "cx5": (f"{V}/cx-5-active-ac-2-0-5p-4x2-ta/", "Mazda CX-5 Active", "2023", "46.500", "$31.900"),
    "seltos": (f"{V}/kia-seltos-1-6-t-a/", "Kia Seltos", "2021", "64.560", "$20.500"),
    "territory": (f"{V}/ford-territory-1-5-t-a/", "Ford Territory", "2022", "67.000", "$20.500"),
    "tucson11": (f"{V}/tucson-ix-gl-5p-4x2-2-0-ta-ac/", "Hyundai Tucson iX", "2011", "186.604", "$16.500"),
    "tucson07": (f"{V}/tucson-gl-gaa-4x2-ta-bhwds6b-4186/", "Hyundai Tucson GL", "2007", "281.682", "$9.500"),
    "sienna": (f"{V}/toyota-sienna-xle/", "Toyota Sienna XLE", "2011", "78.657", "$38.000"),
}


def ficha(clave):
    """Devuelve (url, nombre, año, km, precio) de una unidad del inventario."""
    return FICHA[clave]


def enlace_ficha(clave, texto=None):
    u, nombre, anio, _km, _p = FICHA[clave]
    return link(u, texto or f"{nombre} {anio}")


__all__ = [
    "CAT", "LISTADO", "SITE", "V", "guarda", "link", "wa", "ficha", "enlace_ficha",
    "FICHA", "CHECKLIST", "TRASPASO", "PAPELES", "PRENDA", "DOMINIO", "HIBRIDOS",
    "CHINOS", "DIESEL", "DEVALUA", "KILOMETRAJE", "MANTENIMIENTO", "PATIO", "PRIMER",
    "ENTRADA", "SEGURO", "CREDITO", "BANCO", "CUOTA", "PARTE_PAGO", "REVISION",
    "IBARRA_GARANTIA", "COSTO_NOTARIA", "COSTO_GRAVAMENES", "COSTO_TASA_ANT",
    "PLAZO_ANT", "AVISO_COSTOS",
]
