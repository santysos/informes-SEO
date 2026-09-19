# Odontología Life — leads de WhatsApp y conversión (septiembre 2026)

## Medición (ya funcionando, para el dueño)

El sitio mide los contactos como eventos clave en GA4 (propiedad 511252406, medición
G-SBFB5GSLHH, contenedor GTM-5NHWF4TG):

- **`whatsapp_click`** — clic al botón de WhatsApp. Marcado como evento clave.
- **`form_submit`** — envío del formulario (con listener de Elementor). Marcado como clave.

**Leads de WhatsApp, últimos 90 días: 22.** Por mes: jun 3 · jul 8 · ago 5 · sep 6 (parcial).
- **82 % vienen de búsqueda orgánica** (18 de 22): el SEO trae los leads.
- Antes salían casi todos de la home (10), /servicios/ (6) y /contacto/ (3); **los posts del
  blog casi no generaban clic** (2-3), aunque concentran el tráfico.
- `form_submit`: 0 en 90 días — la gente contacta por WhatsApp, no por formulario.

## El hallazgo y la acción (2026-09-19)

Los posts traían visitas pero no las convertían a WhatsApp: los viejos no tenían ningún
CTA de contacto y los nuevos solo un enlace de texto poco visible.

**Se añadió a los 78 posts un bloque de CTA con botón de WhatsApp** («¿Quieres saber el
precio de tu caso?» → botón «Escribir por WhatsApp»), con el gancho de precio (el 92 % de
las búsquedas que convierten incluyen «precio»). Usa el formato `api.whatsapp.com` que el
trigger ya mide, así que cada clic nuevo cuenta como lead. Respaldo del contenido previo en
`backup/contenido/`.

Esto sube los mensajes de WhatsApp **sin necesitar más tráfico**: convierte el que ya llega.

## Diagnóstico de tráfico

El blog está bien cubierto (78 posts en todos los clusters). La demanda grande de implantes,
prótesis y blanqueamiento cae sobre **posts que ya existen rankeando en posición 11-59** —
p. ej. «implante dental precio» (219 imp) en posición 11,3. Es un problema de ranking/CTR,
no de posts faltantes.

## Pendiente (por retorno)
1. **Subir los posts de implantes/prótesis** que ya rankean pos 11-13: título/meta +
   enlazado interno hacia las páginas de precio. Captura demanda que ya se tiene.
2. **Post nuevo del gap real:** «implantes All-on-4 en Ecuador» (74 imp, sin post).
3. **Ritmo constante** hacia los 120 del contrato (78/120), con temas frescos, no relleno.
4. Medir a 30-60 días el aumento de `whatsapp_click` tras el CTA nuevo (línea base: 22/90d).
