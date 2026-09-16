# Comercial Hidrobo — 2ª tanda de reescritura de títulos (16-sep-2026)

## Por qué títulos y no 10 posts nuevos

El pedido era "10 posts para fomentar visitas". Los datos lo desaconsejaron: el blog está
**saturado** (205 posts; eléctricos/híbridos ya con 28, chinos y modelos todos cubiertos), y
la demanda cae sobre **posts que ya existen** rankeando en primera página con CTR pésimo.

**79 páginas tienen ≥2.000 impresiones en posición ≤10 con CTR <2% — suman 642.426
impresiones desaprovechadas.** Escribir posts nuevos canibalizaría y tardaría meses; reescribir
títulos actúa hoy sobre demanda existente. El usuario aprobó reescribir 10 títulos.

## Las 10 reescritas (aplicadas por Yoast vía API, verificadas en vivo)

Respaldo de los valores anteriores: `comercial-hidrobo/backup/yoast-antes-2026-09-16.json`.

| ID | Página | Impr. | CTR | Consulta que ahora captura |
|---|---|---:|---:|---|
| 11314 | matriculación vehicular | 25.144 | 1,6% | «matriculación vehicular 2026» (3.691) — el título decía «Imbabura» |
| 9477 | mejor marca china | 14.291 | 1,0% | «cuál es la mejor marca de auto chino» |
| 9361 | RAM 1500 | 12.367 | 0,4% | «ram 1500 precio ecuador» (1.181) — faltaba «precio» |
| 8156 | Duster para viajar | 11.487 | 0,7% | intención de viaje (se mantiene nicho, no canibaliza la de precio) |
| 8162 | costos de mantenimiento | 11.479 | 0,7% | «costos de mantenimiento por marca» + fix typo «tú» |
| 9396 | Chery Arrizo 5 Pro | 11.303 | 0,4% | «chery arrizo 5 pro precio ecuador» (794) — faltaba «Chery» |
| 9522 | seguridad infantil | 10.173 | 0,8% | reorientado a «sillas de auto para niños Ecuador» |
| 8282 | garantía de fábrica | 9.711 | 0,5% | «garantía de fábrica auto nuevo» (está en pos 3,8, gran upside) |
| 9609 | marcas de autos chinos | 9.107 | 0,7% | «carros chinos en ecuador» (621) — diferenciada de la 9477 |
| 8901 | Nissan Frontier | 7.942 | 0,6% | «nissan frontier» (2.459) — quitado el relleno «Modo Pro» |

Los dos de autos chinos (9477 y 9609) se separaron a propósito: 9477 = «cuál es la mejor»,
9609 = «qué marcas hay». Así no compiten entre sí.

## Reglas aplicadas
Título ≤ 60 caracteres, la consulta real al inicio, año en curso donde aporta, sin marca de
la empresa, sin «Descubre». Meta 140-160 que continúa el título con un motivo para el clic.
No se tocó el H1 ni el contenido (Yoast sirve su propio `<title>`, que es el que ve Google).

## Pendiente
- La página `/reanult/renault-duster/` (23.904 impr, la del typo) sigue **manual**: es página,
  no entrada, y Yoast no expone sus campos por API.
- Medir CTR a 30-60 días contra la línea base de estas 10.
- Quedan ~60 páginas más en la lista de 642k impresiones para futuras tandas.
