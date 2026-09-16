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

## Pendiente (recomendado, por prioridad)
1. Desplegar la rama y marcar los 3 eventos como conversiones en GA4.
2. Reescribir el título/meta del post de "comprobantes anulados" (8.602 imp a 0,9 % CTR) —
   máximo retorno inmediato.
3. Contenido de intención de compra alineado al producto: "descargar comprobantes SRI masivo /
   por rango de fechas", "exportar comprobantes SRI a Excel", ampliar "SRIFlow vs descarga
   manual".

## Nota de alcance
El repo `SRIFlow` tenía cambios de backend ajenos sin commitear (generadores de Excel); no se
tocaron. La rama de eventos solo incluye los 7 archivos de frontend de la instrumentación.
