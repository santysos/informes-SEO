#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Constantes de la tanda de noviembre 2026 de OKCars (20 posts, lotes O a R).

Reutiliza todo lo de octubre-2026-tanda2/comun.py (enlaces verificados, inventario, cifras
de seguro y crédito, TASA_ANUAL y cuota()) y agrega:
- los enlaces a los 20 posts de octubre, que para el 2 de noviembre ya están publicados;
- el calendario de noviembre.

OKCars va en USTED. Las cuotas se calculan con cuota(), nunca a ojo.
"""
import os
import sys

import importlib.util

AQUI = os.path.dirname(os.path.abspath(__file__))
# El comun.py de octubre se carga con otro nombre: los dos archivos se llaman igual.
_spec = importlib.util.spec_from_file_location(
    "comun_octubre", os.path.join(AQUI, "..", "octubre-2026-tanda2", "comun.py"))
_oct = importlib.util.module_from_spec(_spec)
_spec.loader.exec_module(_oct)
globals().update({k: v for k, v in vars(_oct).items()
                  if not k.startswith("__") and k not in ("guarda", "FECHAS", "AQUI")})
G, T, F, M, I, SITE, _guarda = _oct.G, _oct.T, _oct.F, _oct.M, _oct.I, _oct.SITE, _oct._guarda

FICHA = _oct.FICHA
cuota = _oct.cuota
TASA_ANUAL = _oct.TASA_ANUAL


def guarda(spec):
    """Escribe el spec en posts/ de ESTA carpeta (noviembre)."""
    return _guarda(spec, os.path.join(AQUI, "posts"))


# ── posts de octubre (publicados antes del 2-nov) ───────────────────────────
QUIEN_PAGA_TRASPASO = f"{T}/quien-paga-el-traspaso-de-un-carro/"
VENDER_REQUISITOS = f"{T}/requisitos-para-vender-un-carro-ecuador/"
CONTRATO = f"{T}/contrato-compraventa-vehiculo-ecuador/"
SPPAT = f"{G}/sppat-accidente-de-transito-que-cubre/"
CHOQUE = f"{G}/que-hacer-despues-de-un-choque-ecuador/"
DEDUCIBLE = f"{G}/deducible-seguro-vehicular-como-funciona/"
SEGURO_BARATO = f"{G}/como-pagar-menos-seguro-vehicular/"
TODO_RIESGO = f"{G}/seguro-todo-riesgo-que-no-cubre/"
INDEPENDIENTES = f"{F}/credito-auto-comerciantes-independientes/"
PRECANCELAR = f"{F}/precancelar-credito-vehicular-conviene/"
CHOCADO = f"{G}/como-saber-si-un-auto-fue-chocado/"
PRUEBA_MANEJO = f"{G}/prueba-de-manejo-auto-usado-que-observar/"
PRECIO_JUSTO = f"{G}/precio-justo-auto-usado-como-saberlo/"
ELECTRICO = f"{G}/auto-electrico-usado-revisar-bateria/"
PRIMER_MANT = f"{G}/primer-mantenimiento-despues-de-comprar-usado/"
LLANTAS = f"{G}/llantas-auto-usado-cuando-cambiarlas/"
SELTOS_TERRITORY = f"{M}/kia-seltos-vs-ford-territory-usados/"
AUTO_MANUAL = f"{G}/automatico-o-manual-usado-cual-conviene/"
CUATRO_X_CUATRO = f"{G}/camioneta-4x4-o-4x2-cual-necesita/"
DESDE_QUITO = f"{I}/comprar-seminuevo-ibarra-desde-quito/"

# otros posts publicados útiles para esta tanda
KIA_RIO = f"{M}/kia-rio-usado-ecuador-precio-versiones/"
HILUX = f"{G}/toyota-hilux-usada-ecuador-guia-compra/"
SAIL = f"{M}/chevrolet-sail-usado-ecuador-vale-la-pena/"
MAS_VENDIDOS = f"{G}/autos-usados-mas-vendidos-ecuador-2026/"
DESDE_8000 = f"{G}/autos-seminuevos-desde-8000-ecuador/"
FIN_DE_ANO = f"{G}/comprar-auto-usado-fin-de-ano/"
VERIFICAR_DEUDAS = f"{T}/verificar-auto-usado-deudas-problemas-legales-ecuador/"
PARTE_PAGO_IBARRA = f"{I}/vender-auto-parte-de-pago-ibarra/"

# ── calendario: 20 posts del 2 al 30 de noviembre, a las 09:00 ──────────────
FECHAS = [f"2026-11-{d:02d}T09:00:00" for d in
          (2, 3, 5, 6, 9, 10, 12, 13, 16, 17, 19, 20, 23, 24, 25, 26, 27, 28, 29, 30)]
