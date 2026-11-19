# Comercial Hidrobo — embudo de contenido a citas de taller

Estrategia (definida 2026-09-16): el sitio no vende el auto por la web —es una compra larga y
offline—. El SEO trae visitas; **el embudo debe cerrar citas de taller**, que es la
recurrencia. Cada post de dueño de auto debe rutear a reservar.

## Diagnóstico (GSC + GA4, 90 días al 14-sep-2026)

- Sitio: 12.457 clics · 930.951 impresiones · CTR 1,34 % · pos 6,5. 577 páginas con
  impresiones, **49 % con cero clics**.
- GA4: 18.808 sesiones. Solo **312 (1,7 %) llegan a `/solicitar-cita-taller-mecanico/`**;
  53 envíos de `form_taller_cita`; **25 reservas confirmadas** (`/gracias-cita-taller/`);
  184 clics a WhatsApp.
- **El problema es ruteo, no tráfico.** 47 posts de dueño suman 267k impresiones / 2.323
  clics y morían en `/contacto/` genérico en vez de empujar a reservar.

## El bloque estandarizado

Botón «Reservar cita de taller» → `/solicitar-cita-taller-mecanico/` + botón «Agendar por
WhatsApp» → `wa.me/593996390233` con mensaje pre-armado (modelo/año/km) + mención de las 3
sedes (Ibarra, Cayambe, Tulcán). Patrón tomado del post de cambio de aceite, que ya
convertía.

## Estado del despliegue

Respaldo del contenido previo en `backup/contenido/{id}-{slug}-antes.html`.

| ID | Post | Impresiones | Estado |
|---|---|---:|---|
| 11364 | Tabla mantenimiento Toyota | 37.367 | ✅ |
| 8117 | Cilindrada del motor | 50.078 | ✅ |
| 8220 | Camionetas mejor consumo | 29.931 | ✅ |
| 8237 | Exoneración de autos | 27.793 | ✅ |
| 8099 | Qué significa torque | 23.571 | ✅ |
| 8282 | Qué cubre la garantía | 10.269 | ✅ |
| 8126 | Cambio de aceite | 15.620 | ✅ (ya lo tenía) |
| 8162 | Costos de mantenimiento por marca | 11.336 | ✅ (ya lo tenía) |
| 8589 | Consecuencias de no dar mantenimiento | 6.057 | ✅ (ya lo tenía) |
| 8583 | Mantenimiento 30.000 km | 3.419 | ✅ (ya lo tenía) |

Con esto los ~10 posts de mayor tráfico (≈206k de las 267k impresiones de dueño) rutean a
reserva.

### 2026-09-16 — despliegue completo

**Los 47 posts de dueño con tráfico ya tienen el bloque de reserva.** El lote final aplicó
30 posts nuevos (0 errores); 17 ya lo tenían de tandas previas. Respaldo del contenido
anterior de cada uno en `backup/contenido/{id}-{slug}-antes.html`. Con esto el 100 % de las
267k impresiones de dueño ya rutea a la página de cita o al WhatsApp del taller.

### 2026-09-16 — enlazado interno + schema

- **Enlazado interno (47/47):** cada post de dueño lleva un bloque «Contenido relacionado»
  que apunta a las 3 páginas pilar del taller (Tabla de mantenimiento, Cambio de aceite,
  Costos de mantenimiento), saltando el autoenlace. Consolida enlaces internos hacia las
  páginas que convierten.
- **Schema `AutoRepair` (24/24):** JSON-LD con `@id` compartido `#taller` en los posts del
  clúster de servicio/mantenimiento — nombre, dirección real (Ibarra), teléfono del taller,
  `areaServed` Ibarra/Cayambe/Tulcán, catálogo de 4 servicios y `ReserveAction` a la página
  de cita. Validado parseable en vivo.

## Fuera de nuestro alcance

**Las fichas de modelo (CPT de vehículos, ~97 URLs en `/vehiculos/`) NO se tocan.** No son
post ni blog; las administra directamente el equipo de CH, incluidos precios y año-modelo.
Nuestro trabajo se limita a los posts/blog del embudo de taller.

## Pendiente

- **Schema en la página de reserva `/solicitar-cita-taller-mecanico/`**: es Elementor, hay
  que meter el JSON-LD `AutoRepair` a mano en un widget HTML (no por API).
- Medir a 30-60 días: % de sesiones que llegan a la página de reserva y reservas confirmadas
  contra la línea base (1,7 % / 25).

### 2026-10-05 — CTA temprano en los 5 posts con más visitas

**Medición a 19 días (16-sep → 4-oct, GA4):** sin efecto todavía. `form_taller_cita` 14 → 13,
gracias-cita 16 → 19 frente a los 20 días previos. Por mes, las citas web se mantienen en 20-27
(ago fue la excepción con 8; sep 24). El tracking funciona (GTM v4, disparador `wa.me|whatsapp`
en todo el sitio), pero **el botón del bloque en los posts tuvo 0 clics** en ~700 vistas, y solo
1 llegada a la página de reserva vino de un post. Causa probable: el bloque está al ~90 % del
artículo; el lector se va al encontrar su respuesta.

**Aplicado:** recuadro con botón de WhatsApp + enlace a reserva a mitad del texto
(`cta-temprano-2026-10/aplicar.py`, marcador `cta-temprano-v1`, respaldo en `antes/`):
Toyota 11364 (palabra 533/994), Consumo 8220 (325/957), Cilindrada 8117 (311/640),
Torque 8099 (318/622) y Exoneración 8237 (434/1033, este a exonerados/ventas, no al taller).
Cada botón lleva un mensaje propio («vengo de…») → se atribuye en GA4 por `linkUrl` del
evento `whatsapp_click`.

**Extendido el mismo día a los 48 restantes** (`aplicar_resto.py`): los 53 posts con bloque de
taller tienen ahora exactamente 1 CTA temprano (verificado por API). 4 de compra (REEV, e-POWER,
carrocerías, pendientes) llevan botón de consulta/prueba de manejo; 3 de repuestos, consulta de
repuesto. Se pierde el A/B limpio 5 vs resto, pero cada post sigue atribuible por su mensaje.

**Medir a fin de octubre:** clics con «vengo%20de» en `linkUrl` del evento `whatsapp_click`,
formularios `form_taller_cita` y visitas a `/gracias-cita-taller/` contra 20-27/mes.

### 2026-11-09 — Medición del CTA temprano (5-oct → 8-nov)

**Sin efecto.** 5 clics de WhatsApp con «vengo de…» en todo el periodo (4 de posts de
taller/repuestos + 1 del CTA genérico del blog). `form_taller_cita`: 24 en sep → 19 en oct;
`/gracias-cita-taller/`: 32 → 12; sesiones a la página de reserva: 81 → 75. Octubre quedó
por debajo del rango habitual (20-27). Los CTAs se dejan (no estorban), pero no hay que
esperar más de ellos: la siguiente pieza tiene que ser otra (ver
`registro-mensual/2026-11-noviembre.md`).

### 2026-11-19 — Hallazgo: el formulario de reserva rechaza a la mayoría

LiteSpeed sirve `/solicitar-cita-taller-mecanico/` desde caché (`x-litespeed-cache: hit`)
con el `_wpnonce` de JetFormBuilder (form 12079, `load_nonce: render`) escrito en el HTML.
WordPress vence ese nonce en 12-24 h: quien recibe una copia vieja envía el formulario y
cae en `?status=nonce_failed`. La cita no se registra.

| Mes | Usuarios rechazados (`nonce_failed`) | Citas completadas (`/gracias-cita-taller/`) |
|---|---:|---:|
| ago-2026 | 1 | 7 |
| oct-2026 | 7 | 9 |
| nov-2026 (1-18) | 11 | 7 |

Mismo problema en el formulario de repuestos (8824, página 8816), con menos volumen.
**Parte de la caída de citas que se atribuyó al contenido es este error.** También explica
por qué `form_taller_cita` (clic en enviar) supera a las visitas a gracias.

**Arreglo preparado** (`embudo-taller-2026-11/arreglar_nonce.py`, con `--dry-run` y
`--revertir`): `load_nonce = "hide"` en 12079 y 8824 + re-guardar las páginas 8753 y 8816
para purgar LiteSpeed. El reCAPTCHA v3 sigue filtrando spam. La opción `csrf` de JFB no
sirve (su token también va en el HTML). Alternativa equivalente a mano: LiteSpeed →
Caché → Excluir → «No cachear URIs» con las dos páginas.

**Aplicado 2026-11-19 10:43** (aprobado por el usuario): 12079 y 8824 con `load_nonce: hide`,
páginas 8753 y 8816 re-guardadas. Verificado en vivo: `x-litespeed-cache: miss`, formulario
presente, sin `_wpnonce` en el HTML. Como la verificación queda apagada en el servidor,
ninguna copia vieja en caché puede volver a fallar. No se hizo un envío de prueba (llegaría
al correo del taller como cita real).
**Medir:** visitas a `?status=nonce_failed` deben caer a 0, y `/gracias-cita-taller/` debería
acercarse a `form_taller_cita`. Revisar a fin de noviembre y en diciembre.

### 2026-11-19 — Formulario de reserva dentro de 15 posts de mantenimiento

`embudo-taller-2026-11/form_en_posts.py` (marcador `cw-form-cita-v1`, respaldos en `antes/`,
`--revertir`): el formulario 12079 va embebido justo después del recuadro de WhatsApp a mitad
de texto, en un bloque con ancla `#reserva-taller`. El enlace «reserve en línea» del recuadro
ahora baja al formulario en vez de abrir otra página. Mismo formulario: el taller recibe el
mismo correo y la persona termina en `/gracias-cita-taller/`.

Posts (por visitas GA4 90 d): 11364 Toyota (1.095), 8162 costos por marca, 8126 cambio de
aceite, 9301 Fiat, 8589 consecuencias, 8583 30.000 km, 8966 Renault, 11819 híbrido costos,
8177 20.000 km, 11354 Tulcán, 9258 Nissan, 9233 Stepway, 9556 híbrido, 12438 Renault km,
8213 Logan. **Verificado en vivo 15/15.**

**Medir:** el evento `form_taller_cita` solo cuenta envíos en la página de reserva (regla de
GA4 por `page_location`). Los envíos desde posts salen como `form_submit`; para atribuirlos,
mirar `/gracias-cita-taller/` con `pageReferrer` = URL del post.
