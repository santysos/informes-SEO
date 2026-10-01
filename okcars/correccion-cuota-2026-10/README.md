# Corrección de cifras de crédito — 1 de octubre de 2026

**El error:** en el post de cuota mensual (1401), las cuotas se calcularon con una tasa
cercana al 14 % anual y la columna de intereses con una del 12 %. 48 cuotas de $395 sobre
$14.350 dan unos $4.610 de intereses, no los $3.900 que decía el post.

**La corrección:** todo queda a una tasa referencial de alrededor del 14 % anual, la misma
que ya usaba la tabla del post de entrada (1398). Las cifras se pueden verificar: cuota ×
meses − monto financiado.

| Plazo | Cuota | Intereses (antes → ahora) |
|---|---:|---|
| 24 meses | $680 → $690 | $1.900 → $2.200 |
| 36 meses | $490 | $2.900 → $3.300 |
| 48 meses | $395 | $3.900 → $4.600 |
| 60 meses | $340 → $335 | $4.900 → $5.750 |

Posts tocados:
- **1401 cuota mensual:** la tabla; «cae $200 / $60, más de mil dólares adicionales»; el
  ejemplo del transporte ($335 / $85). También se quitó el año «2025» del Seltos, que no
  está confirmado.
- **1398 entrada:** «diferencia de unos $55» (antes $45) y «cada $1.000 baja ~$27»
  (antes $25).
- **1836 precancelar** (programado para el 29-oct): intereses «cerca de $4.600».

Respaldo previo en `backup/`. Los specs locales quedaron con las mismas cifras.

**Regla para próximas tandas:** con un monto financiado de referencia, la tasa es del 14 %
anual. Calcular la cuota con la fórmula y no a ojo: este error se propagó a tres posts.
