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

## Pendiente

- Los ~37 posts de dueño restantes (cola larga, ~60k impresiones).
- Enlazado interno: informativos → Tabla Toyota y página de reserva.
- Schema `AutoRepair` en los de servicio.
- Fichas de modelo (compradores): coherencia de año-modelo (título ya en 2026/2027 según
  unidad en piso; cuerpo aún en 2025) + puente suave a taller. Precios los actualiza CH.
- Medir a 30-60 días: % de sesiones que llegan a la página de reserva y reservas confirmadas
  contra la línea base (1,7 % / 25).
