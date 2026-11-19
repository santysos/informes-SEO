# Registro de trabajo — Noviembre 2026
**Cliente:** Comercial Hidrobo · comercialhidrobo.com
**Foco del mes:** recuperar las páginas que perdieron posiciones desde marzo + medir el embudo de taller
**Inicio del registro:** 9 de noviembre de 2026

Insumo para el informe mensual. Datos sacados por API de Search Console
(`https://www.comercialhidrobo.com/`, vista por página) y GA4 (`properties/299617258`).
Scripts y respaldos en `comercial-hidrobo/recuperacion-2026-11/`.

---

## 1. Cómo está el sitio (al 9-nov-2026)

### Search Console por mes (2026)

| Mes | Clics | Impresiones | CTR | Posición |
|---|---:|---:|---:|---:|
| Ene | 5.429 | 588.112 | 0,92 % | 4,0 |
| Feb | 4.958 | 532.493 | 0,93 % | 3,8 |
| Mar | 5.638 | 569.576 | 0,99 % | 3,7 |
| Abr | 5.598 | 500.508 | 1,12 % | 4,6 |
| May | 5.668 | 417.155 | 1,36 % | 6,1 |
| Jun | 4.333 | 310.660 | 1,39 % | 6,4 |
| Jul | 4.269 | 305.944 | 1,40 % | 6,3 |
| Ago | 4.423 | 338.090 | 1,31 % | 6,6 |
| Sep | 4.132 | 320.579 | 1,29 % | 6,6 |
| Oct | 4.028 | 311.857 | 1,29 % | 6,7 |

- **Contra el año pasado, crecemos:** 10-oct → 6-nov 2026 = 3.555 clics vs 3.156 en el
  mismo periodo de 2025 (**+13 %**).
- **Contra marzo, bajamos ~25 %.** La caída fue entre abril y junio; desde junio la curva
  está plana (~4.000-4.400 clics/mes). El CTR subió de 0,99 % a 1,29 % (efecto de la
  reescritura de títulos de septiembre), pero no compensa la pérdida de posiciones.
- Sesiones orgánicas GA4 estables: ~5.100/mes (jun-oct).

### De dónde viene la caída (marzo vs octubre, por página)

| Página | Clics mar → oct | Posición | Lectura |
|---|---|---|---|
| Autos eléctricos en Ecuador (9405) | 448 → 152 | 4,1 → 10,1 | **Pérdida real.** Decía «2025», 672 palabras, precios viejos |
| Kicks vs Tiggo 4 (9243) | 251 → 5 | 3,0 → 5,2 | Rankeaba por «chery», «omoda», «tiggo» a secas: tráfico ajeno a la intención. Google lo corrigió. No se persigue |
| Camionetas con mejor consumo | 190 → 55 | 3,0 → 6,2 | Perdió consultas genéricas («camioneta 4x4 diesel»); las de intención se mantienen |
| Cilindrada del motor | 146 → 49 | 2,4 → 5,2 | Perdió «1.6», «1.4» a secas (tráfico basura); «qué significa 1.6» **crece** |
| Marcas chinas confiables (9472) + otras 3 | 332 → 203 y más | 3,1 → 5,3 | **Pérdida real + canibalización** (ver abajo) |
| Exoneración | 171 → 57 | 7,4 → 8,0 | Perdió «exoneración» a secas (2.900 impresiones genéricas) |

**Conclusión:** de la caída, una parte es tráfico de consultas genéricas que nunca iba a
convertir (Google afinó a quién muestra cada página). La pérdida que sí importa está en dos
clusters: **eléctricos** y **autos chinos**.

**Canibalización en autos chinos:** cuatro posts competían por «carros chinos en ecuador» y
«marcas de carros chinos» (9472, 9609, 9477, 9491), ninguno pasaba de 880 palabras y **los
cuatro recomendaban marcas que CH no vende** (Great Wall, JAC, BYD, Geely).

**Lo que compensa:** páginas nuevas del plan de junio que ya traen tráfico — tabla de
mantenimiento Toyota (205 clics en 28 días), auto eléctrico más barato 2026 (137),
matriculación Imbabura 2026 (112), mejor híbrido enchufable (103), DongFeng Z9 PHEV (93),
Deepal (73), pico y placa híbridos (68, posición 3,3).

---

## 2. Embudo de citas de taller — medición de octubre

| | Jun | Jul | Ago | Sep | Oct |
|---|---:|---:|---:|---:|---:|
| `form_taller_cita` | 24 | 27 | 8 | 24 | 19 |
| Vistas a `/gracias-cita-taller/` | – | 3 | 8 | 32 | 12 |
| Sesiones que llegan a la página de reserva | 83 | 105 | 78 | 81 | 75 |
| `whatsapp_click` | 61 | 57 | 53 | 106 | 75 |

- **El CTA a mitad de texto (aplicado el 5-oct en 53 posts) no movió el embudo:** 5 clics
  con mensaje «vengo de…» en todo el periodo 5-oct → 8-nov (costos de mantenimiento,
  mantenimiento Renault, repuestos Nissan, repuestos Renault, y 1 del CTA genérico del blog).
- Octubre quedó en 19 formularios de cita, por debajo del rango habitual (20-27/mes).
- Lectura: el lector de estos posts busca una respuesta, la encuentra y se va. Más botones
  en los mismos posts no lo convierten en cita. Hace falta otra pieza (p. ej. una página de
  reserva por marca/kilometraje a la que lleven las búsquedas con intención de taller).

---

## 3. Trabajo ejecutado

### 9-nov — Pilar de eléctricos reescrito (post 9405)
`/vehiculos-electricos-e-hibridos/autos-electricos-en-ecuador-2025/` — la página que fue #1
del sitio. Se mantiene la URL (conserva el historial).

- 672 → **1.599 palabras**. Todo el texto pasó de 2025 a noviembre de 2026.
- **Precios vigentes del catálogo de CH** (menú del sitio al 9-nov) en lugar de los viejos,
  que además se contradecían entre párrafos.
- Tabla de eléctricos puros (Mage EV, Deepal S05, S07, Kwid E-Tech), tabla de las cuatro
  tecnologías (EV, PHEV, REEV, HEV) y tabla de enchufables/rango extendido con precio.
- Sección «Cuándo un eléctrico puro NO le conviene», 4 preguntas frecuentes, cita del
  equipo comercial.
- **12 enlaces internos** al resto del cluster (antes 1).
- CTA a mitad de texto con WhatsApp atribuible: «vengo de la guía de autos eléctricos 2026».
- Título SEO: «Carros eléctricos en Ecuador 2026: precios y modelos» (antes «Autos
  eléctricos en Ecuador 2026: Modelos, precios y autonomía»). Meta nueva de 154 caracteres.
- Verificado en vivo.

### 9-nov — Pilar de autos chinos reescrito (post 9472)
`/marcas-chinas-y-comparativas/marcas-de-autos-chinos-mas-confiables-en-ecuador/`

- 804 → **1.303 palabras**. Fuera Great Wall, JAC, BYD y Geely como recomendación; ahora
  presenta **las marcas chinas que vende CH** (Chery, DongFeng, Changan/Deepal,
  Omoda | Jaecoo, BAIC, Foton) con rango de precios de cada una.
- Criterio de confiabilidad que el lector puede comprobar (taller cercano, repuestos en
  stock, garantía por escrito, años con el mismo importador) en lugar de un ranking por fama.
- Sección chino vs japonés con enlaces a las comparativas, «Cuándo NO le conviene», FAQ.
- 11 enlaces internos, CTA medio atribuible («vengo de la guía de carros chinos 2026») y el
  bloque de cotización estándar al final (no lo tenía).
- Título SEO: «Carros chinos en Ecuador 2026: marcas confiables y precios».
- Verificado en vivo.

Respaldo del contenido anterior de cada post en `recuperacion-2026-11/antes/`.

### 10/11-nov — Consolidación de los clusters canibalizados

**Plugin Redirection instalado** en el sitio (por API, 10-nov; antes no tenía cómo hacer 301).

Antes de redirigir, lo útil de cada post absorbido se pasó al pilar:
- Al pilar de eléctricos (9405, ahora **1.778 palabras**) se sumó la sección «Eléctrico,
  enchufable o híbrido según dónde vive» (Quito, Ibarra y valles, viajes largos, zona
  rural), que era el ángulo propio del 9415.
- Al pilar de autos chinos (9472, ahora **1.529 palabras**) se sumaron «¿Los carros chinos
  duran?» (del 9491) y «Dónde ver carros chinos en Imbabura, Pichincha y Carchi» (del 9609).

| Post absorbido | URL vieja | Ahora |
|---|---|---|
| 9609 Marcas de autos chinos en Ecuador | `/chery/marcas-de-autos-chinos-en-ecuador/` | 301 → pilar chinos 9472 |
| 9491 Autos chinos: calidad y durabilidad | `/marcas-chinas-y-comparativas/autos-chinos-en-ecuador-calidad-durabilidad/` | 301 → pilar chinos 9472 |
| 9415 Híbridos y eléctricos en Ecuador | `/vehiculos-electricos-e-hibridos/autos-hibridos-y-electricos-en-ecuador/` | 301 → pilar eléctricos 9405 |

Los tres posts quedaron en **borrador** (no se borraron). Los 301 se verificaron en vivo:
cada URL vieja hace un solo salto y llega al pilar con 200. Se revisaron los 207 posts
publicados: solo uno (9579) enlazaba a una URL vieja y ya apunta directo al pilar.

**Post 9477 «Mejor marca china calidad precio» reescrito** (764 → 1.148 palabras). Se
mantiene como página propia porque responde otra pregunta («cuál conviene» y no «qué marcas
hay»). Antes recomendaba BYD, Geely y Great Wall; ahora responde por uso (sedán, SUV
familiar, ahorro de combustible, eléctrico, pickup) con modelos y precios del catálogo de CH,
cómo comparar el costo a cinco años y errores comunes. CTA atribuible: «vengo del artículo
de la mejor marca china calidad precio».

**Resultado:** las búsquedas «carros chinos en ecuador» / «marcas de carros chinos» pasan de
4 URLs compitiendo a 1 pilar + 1 comparativa con intención distinta; «carros eléctricos
ecuador» queda con una sola página fuerte.

---

### 19-nov — Arreglado el formulario de reserva que rechazaba citas

El formulario de reserva de taller (y el de cotización de repuestos) rechazaba a parte de
quienes lo enviaban con el error `nonce_failed`: la caché de LiteSpeed servía un código de
seguridad vencido. En noviembre (1-18) fueron **11 personas rechazadas frente a 7 citas
completadas**; en octubre, 7 frente a 9. Empezó en agosto.

Se desactivó esa verificación en los dos formularios (el reCAPTCHA sigue filtrando spam) y
se renovó la caché de las dos páginas. Verificado en vivo. Detalle técnico en
`EMBUDO-TALLER.md`. **A medir:** rechazos en 0 y más citas completadas desde el 19-nov.

Datos que salieron del análisis del embudo (90 días): las búsquedas con intención de
taller son el 6 % de los clics orgánicos (244 de 4.065); casi todas las citas entran
directo a la página de reserva y dos de cada tres no vienen de Google. Oportunidades:
«mantenimiento toyota» (~990 impresiones, pos. 9-13), «mantenimiento renault» (~650,
pos. 11-27), «primer mantenimiento auto nuevo» (585, pos. 20, 0 clics).

## 4. Pendiente

- Modelos nuevos sin ningún post: Omoda | Jaecoo (desde sep-2026), Chery Tiggo Super Hybrid
  7/8/9, Changan Nevo Q05 (oct-2026). Confirmar con CH el tipo exacto (eléctrico/híbrido)
  del Omoda E5 Next y del Nevo Q05: el menú y la taxonomía del sitio se contradicen.
- **Medir los pilares y la consolidación a 4-6 semanas** (mediados de diciembre): posición de «carros
  eléctricos ecuador», «autos electricos ecuador», «carros chinos en ecuador», «marcas de
  carros chinos», y clics «vengo de la guía…» en GA4.
- Pedir indexación en Search Console de 9405, 9472 y 9477 (la API no lo permite).
- Embudo de taller: poner el formulario de reserva dentro de los posts de mantenimiento con más
  visitas (Toyota, Renault, cambio de aceite, 30.000 km) y subir mantenimiento Toyota/Renault.
