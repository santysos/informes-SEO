# OKCars · tanda septiembre-octubre 2026 — 20 posts

Escritos el 20 de agosto de 2026. Publicación programada del 1 de septiembre al 14 de
octubre, un post cada 2 o 3 días.

---

## Por qué estos temas

La tanda sale de los datos de Search Console, no de una lluvia de ideas. El sitio tenía
5.642 impresiones y 124 clics en el período analizado, con **el 57 % de los clics viniendo
de búsquedas de marca** (`okcars`, `autos ok`). Fuera de la marca, el sitio casi no
capturaba nada.

El hueco concreto eran tres clusters con demanda real donde el sitio aparecía entre las
posiciones 25 y 70:

| Cluster | Impresiones sin capturar | CTR previo |
|---|---:|---:|
| Precio y financiamiento | 924 | 0,00 % |
| Seminuevos | 517 | 0,00 % |
| Seguros | ~500 | 0,00 % |
| Trámites | 432 | 0,69 % |

Consultas puntuales que motivaron posts específicos: `carros creditos` (194 impresiones,
posición 41), `carros nuevos a credito` (167, pos 51), `seguro vehicular` (148, pos 26),
`credito directo auto` (68, pos 69), `seguros para autos daños a terceros precios`
(60, pos 11).

Comercialmente es el mejor cluster posible para un patio de seminuevos: quien busca
«crédito directo auto» ya decidió comprar y está resolviendo el cómo.

---

## Los 20 posts

### Financiamiento — 8 posts (categoría 44)

| Fecha | Post | Palabras |
|---|---|---:|
| 01-sep | Cuánto de entrada piden para un auto usado en Ecuador | 1.185 |
| 03-sep | Comprar auto a crédito sin historial crediticio | 1.148 |
| 05-sep | Comprar auto estando en central de riesgos | 1.181 |
| 07-sep | Cuánto tarda la aprobación de un crédito | 1.142 |
| 09-sep | Crédito directo para auto usado: cómo funciona | 1.193 |
| 11-sep | Cuota mensual: cómo se calcula y qué la sube | 1.153 |
| 14-sep | Banco o crédito directo: cuál conviene | 1.174 |
| 16-sep | Cambiar de auto entregando el tuyo como parte de pago | 1.100 |

### Seguros — 4 posts (categoría 42)

| Fecha | Post | Palabras |
|---|---|---:|
| 18-sep | Seguro para auto usado: qué cubre y cuánto cuesta | 1.136 |
| 21-sep | Seguro contra daños a terceros: qué es y cuándo alcanza | 1.159 |
| 23-sep | ¿Se puede asegurar un auto viejo? Límites de antigüedad | 1.179 |
| 25-sep | Seguro y viajes interprovinciales | 1.162 |

### Trámites — 4 posts (categoría 45)

| Fecha | Post | Palabras |
|---|---|---:|
| 28-sep | Papeles que debes pedir antes de comprar | 1.119 |
| 30-sep | Traspaso de dominio: pasos, costos y quién paga | 1.129 |
| 02-oct | Comprar un auto con prenda: cómo se levanta | 1.176 |
| 05-oct | Revisión mecánica antes de comprar | 1.109 |

### Decisión de compra — 4 posts (categorías 42 y 43)

| Fecha | Post | Palabras |
|---|---|---:|
| 07-oct | Cuánto se devalúa un auto en Ecuador | 1.132 |
| 09-oct | Kilometraje: cuánto es mucho según el año | 1.130 |
| 12-oct | Qué autos usados piden menos mantenimiento | 1.124 |
| 14-oct | Comprar en patio o a particular | 1.118 |

**Total: 22.949 palabras.**

---

## Cómo se construyeron

- `gutenberg.py` — helpers que convierten estructuras Python en bloques Gutenberg, más el
  inventario verificado del patio y `post_url()` para los enlaces internos entre posts.
- `lote_*.py` — los posts como datos, agrupados por cluster.
- `publish_batch.py` — validación y publicación con pacing anti-WAF (12 s entre llamadas,
  30 s entre posts, 120 s de backoff, User-Agent de navegador, nunca curl).

Todos pasan el validador: mínimo 1.100 palabras, sin frases de la blacklist automotriz,
al menos 2 enlaces internos, al menos 2 referencias geográficas del norte del país, cita
destacada obligatoria, meta descripción de 140 a 160 caracteres y título SEO de máximo 60.

Los precios y kilometrajes usados en los ejemplos salen del inventario real publicado en
las fichas del sitio: Kia Seltos 2025 en $20.500 con 64.560 km, Ford Territory 2025 en
$20.500, Mazda CX-5 en $31.900, Toyota Sienna XLE en $38.000, entre otros. **No hay cifras
inventadas.**

Las citas destacadas se atribuyen a «Equipo comercial de OKCars», no a una persona con
nombre. Si el cliente quiere atribuirlas a alguien real, hay que pedirle el nombre y una
frase verificada.

---

## Qué medir y cuándo

A las 8 semanas de la primera publicación —es decir, a finales de octubre— hay que pedir
el export de GA4 → Adquisición → Tráfico de búsqueda orgánica de Google, en las dos
vistas (Consultas y Página de destino), por todo el período.

Lo que hay que mirar:

1. **Si bajó el peso de las búsquedas de marca.** Estaba en 57 %. Si baja, el contenido
   está trayendo demanda nueva, que es el objetivo.
2. **Impresiones del cluster de financiamiento.** Eran 924 con 0 clics. Es la apuesta
   principal de la tanda.
3. **Posiciones nuevas entre 20 y 70**, que serán la base de la tanda siguiente.
4. **CTR de los posts que ya tengan impresiones.** Si alguno queda en buena posición con
   CTR bajo, se reescribe el título antes de escribir contenido nuevo.

---

## Pendiente del contrato

OKCars queda en **50 de 120 posts**. Faltan 70, es decir tres tandas y media más. La
siguiente debe planificarse con los datos de esta, no antes de finales de octubre.
