#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Constantes de la tanda de diciembre 2026 de OKCars (los 5 últimos posts del contrato, lote S).

Reutiliza noviembre-2026/comun.py, que a su vez carga octubre-2026-tanda2/comun.py (enlaces
verificados, inventario FICHA, cifras de seguro y crédito, TASA_ANUAL y cuota()), y agrega:
- los enlaces a los posts de noviembre, que para el 2 de diciembre ya están publicados
  (verificado por API el 2026-11-19: los de antes del 19-nov en «publish», el resto en
  «future» hasta el 30-nov);
- el calendario de diciembre.

Inventario: las 10 fichas de FICHA siguen publicadas al 2026-11-19 (verificado por API) y los
precios de Koleos ($8.500), Tucson 2007 ($9.500) y Prius C ($13.000) coinciden con la ficha
pública ese día.

OKCars va en USTED. Las cuotas se calculan con cuota(), nunca a ojo.
"""
import os
import importlib.util

AQUI = os.path.dirname(os.path.abspath(__file__))
# El comun.py de noviembre se carga con otro nombre: los archivos se llaman igual.
_spec = importlib.util.spec_from_file_location(
    "comun_noviembre", os.path.join(AQUI, "..", "noviembre-2026", "comun.py"))
_nov = importlib.util.module_from_spec(_spec)
_spec.loader.exec_module(_nov)
globals().update({k: v for k, v in vars(_nov).items()
                  if not k.startswith("__") and k not in ("guarda", "FECHAS", "AQUI")})
_guarda = _nov._guarda
FICHA = _nov.FICHA
cuota = _nov.cuota
TASA_ANUAL = _nov.TASA_ANUAL


def guarda(spec):
    """Escribe el spec en posts/ de ESTA carpeta (diciembre)."""
    return _guarda(spec, os.path.join(AQUI, "posts"))


# ── posts de noviembre (publicados antes del 2-dic) ─────────────────────────
DUSTER = f"{M}/renault-duster-usada-ecuador/"
KICKS = f"{M}/nissan-kicks-usado-ecuador/"
SPORTAGE = f"{M}/kia-sportage-usada-ecuador/"
XTRAIL = f"{M}/nissan-x-trail-usada-ecuador/"
TIGGO = f"{M}/chery-tiggo-usado-ecuador/"
VITARA = f"{M}/suzuki-grand-vitara-usado-ecuador/"
DMAX = f"{M}/chevrolet-dmax-usada-ecuador/"
MAZDA3 = f"{M}/mazda-3-usado-ecuador/"
ACCENT = f"{M}/hyundai-accent-usado-ecuador/"
MEJORES_SUV = f"{M}/mejores-suv-usadas-ecuador/"
MOTOR_TURBO = f"{G}/motor-turbo-o-atmosferico-altura/"
CONSUMO = f"{G}/consumo-real-auto-usado/"
CUANTO_VALE = f"{G}/cuanto-vale-mi-auto-usado/"
LUCES = f"{G}/luces-del-tablero-que-significan/"
FAMILIA = f"{G}/auto-usado-familia-con-ninos/"
VIAJE_FIN_ANO = f"{G}/revisar-auto-antes-de-viajar-fin-de-ano/"
DECIMO = f"{F}/decimo-tercer-sueldo-entrada-auto/"

# otros posts publicados útiles para esta tanda
POST_KOLEOS = f"{G}/renault-koleos-usado-ecuador/"
POST_SIENNA = f"{M}/minivan-usada-ecuador-toyota-sienna/"
CAPTIVA = f"{M}/chevrolet-captiva-turbo-usada-ecuador/"
CROSSTREK = f"{M}/subaru-crosstrek-usada-ecuador/"

# ── calendario: 5 posts, los miércoles de diciembre, a las 09:00 ────────────
FECHAS = [f"2026-12-{d:02d}T09:00:00" for d in (2, 9, 16, 23, 30)]
