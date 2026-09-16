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
