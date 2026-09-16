# SRIFlow — Revisión y medición de conversión
**Fecha:** 16 de septiembre de 2026 · **Fuentes:** Search Console + GA4 + repos
**Producto propio (Creative Web).** SaaS que automatiza la descarga masiva de comprobantes
electrónicos del SRI. Dominio sriflow.com.

## Qué es
Tres piezas: **Landing + Dashboard web** (Vite + React 19, `SRIFlow/frontend/dashboard`),
**Backend API** (FastAPI + Postgres, DigitalOcean) y **SRIFlow Desktop** (PyQt6), que es donde
ocurre la descarga real desde el portal del SRI vía Selenium. Blog en Next.js
(`sriflow-blog`, 33 posts). Pago por **PayPhone**.

**El embudo real:** registro web → pago (PayPhone) → descarga de la app de escritorio → uso.

## Datos (90 días)
- **GSC (www.sriflow.com):** 199 clics · 13.017 impresiones · CTR 1,53 % · pos 7,0. Sitio joven.
  Un post concentra el tráfico: `/blog/como-revisar-comprobantes-anulados-sri` (81 clics,
  8.602 imp, CTR 0,9 %). `/signup` y `/signin` rankean con ~0 clics orgánicos.
- **GA4 (prop 501535833):** 1.172 sesiones (608 orgánicas), 766 usuarios nuevos.

## El hallazgo crítico
**No se medía ninguna conversión.** GA4 no tenía eventos de registro, pago ni descarga — solo
`form_submit` (30) y `file_download` (69) genéricos. Para un producto de pago con flujo
registro → pago → descarga, no medir esos pasos es el problema número uno: imposible optimizar
lo que no se ve.

El ruteo del blog a `/signup` sí existe (los 33 posts enlazan), así que el problema no es el
CTA: es la falta de medición y la poca escala/intención del tráfico.

## Ejecutado el 16-sep-2026 — instrumentación de eventos
Repo `SRIFlow`, rama **`seo/eventos-conversion`**. Helper `trackEvent` (GA4 + Meta Pixel)
en `frontend/dashboard/src/lib/track.ts`, cableado en:
- **`sign_up_completed`** — al registrarse (`SignUpForm.tsx`).
- **`subscription_paid`** (monto USD) — al aprobarse el pago (`RespuestaPayphone.tsx`).
- **`app_downloaded`** (windows/mac) — en los 4 puntos de descarga de la app (Landing,
  Dashboard, Bienvenida, DescargarComprobantes).

Typecheck limpio. **En rama, pendiente de revisar y desplegar.** Los tres eventos deben
marcarse como **conversiones clave / eventos clave en GA4** una vez que empiecen a llegar.

## Ejecutado el 16-sep-2026 — CTR y contenido (repo `sriflow-blog`)

⚠️ `sriflow-blog` **no está bajo git** (export estático que se despliega a `/blog/` de nginx).
Los cambios están en disco; requieren `npm run build` + deploy manual.

- **Título/meta reescritos** en `como-revisar-comprobantes-anulados-sri.mdx` (8.602 imp a
  0,9 % CTR). Antes: «Cómo revisar comprobantes anulados del SRI». Ahora:
  **«Cómo saber si una factura está anulada en el SRI (2026)»** — calza con la consulta real
  que la gente escribe («como saber si una factura esta anulada», 145+ imp). Sube el CTR sin
  tocar el contenido.
- **Post nuevo** `aceptar-anulacion-comprobante-sri.mdx` — gap con demanda sin cubrir
  («aceptar anulacion de retencion sri» y variantes, ~250 imp, pos 15-21, sin post). Escrito
  con la normativa verificada (Resolución NAC-DGERCGC25-00000014): 5 días hábiles, silencio =
  rechazo, solo retenciones/NC/ND requieren aceptación. 1.159 palabras, build OK. El blog de
  compra ya estaba maduro (por-rango-fechas, exportar-excel, año-completo, vs-manual existen),
  así que en vez de canibalizar se atacó este gap.

## Sobre el "contenido de compra"
El blog ya cubre las consultas de compra (descargar por rango, exportar a Excel, año completo,
SRIFlow vs descarga manual). No se crearon posts que canibalizaran; el valor se puso en CTR
(título de anulados) y en el gap real (aceptar anulación).

## Eventos clave en GA4 (marcados el 16-sep-2026)
- **SRIFlow** (prop 501535833): creados como key events `sign_up_completed`,
  `subscription_paid`, `app_downloaded`.
- **Quipuy** (prop 536146659): ya tenía `sign_up_completed` y `first_invoice_authorized`;
  se agregó el que faltaba, `subscription_paid`.
- Nota: en ambas quedan key events por defecto de GA4 (`purchase`, `qualify_lead`,
  `close_convert_lead`) que no se disparan — plantillas vacías, se pueden desactivar.

## Pendiente (recomendado, por prioridad)
1. Desplegar la rama de eventos (`SRIFlow` / `seo/eventos-conversion`) para que los eventos
   empiecen a disparar. (Los key events ya están creados en GA4.)
2. `npm run build` + deploy del `sriflow-blog` con el título nuevo y el post nuevo.
3. Imágenes hero propias para el post nuevo (hoy placeholder).
4. Medir a 30-60 días: CTR del post de anulados y primeras conversiones instrumentadas.

## Nota de alcance
El repo `SRIFlow` tenía cambios de backend ajenos sin commitear (generadores de Excel); no se
tocaron. La rama de eventos solo incluye los 7 archivos de frontend de la instrumentación.
