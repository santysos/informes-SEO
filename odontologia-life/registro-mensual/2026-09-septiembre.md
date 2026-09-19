# Registro de trabajo — Septiembre 2026
**Cliente:** Odontología Life (odontologialife.com) · Otavalo
**Presentación:** Septiembre 2026

---

## Resumen del mes

Dos frentes de trabajo, ambos orientados al mismo objetivo del cliente: **más visitas al
consultorio y más mensajes de WhatsApp, medibles para el dueño.**

1. **Conversión del tráfico que ya llega** — se añadió un bloque de CTA de WhatsApp medible
   a los 78 posts del blog, para que las visitas que ya recibe el sitio se traduzcan en
   mensajes (y en leads contables en GA4).
2. **Primer lote de captación** — 4 posts nuevos escogidos por datos de Search Console
   (gaps reales de demanda), cada uno con el mismo CTA medible.

**Estado del contrato de contenido: 82 / 120 posts** (20/mes, mínimo 120).

---

## Frente 1 — Medición y conversión de leads

### La medición ya funciona (para el dueño)

El sitio mide los contactos como **eventos clave** en GA4 (propiedad 511252406, medición
G-SBFB5GSLHH, contenedor GTM-5NHWF4TG):

- **`whatsapp_click`** — clic al botón de WhatsApp. Marcado como evento clave.
- **`form_submit`** — envío del formulario (con listener de Elementor). Marcado como clave.

**Leads de WhatsApp, últimos 90 días: 22.** Por mes: jun 3 · jul 8 · ago 5 · sep 6 (parcial).
- **82 % vienen de búsqueda orgánica** (18 de 22): el SEO es el que trae los leads.
- Antes salían casi todos de la home (10), /servicios/ (6) y /contacto/ (3); **los posts del
  blog casi no generaban clic** (2-3), aunque concentran el tráfico.
- `form_submit`: 0 en 90 días — la gente contacta por WhatsApp, no por formulario.

### El hallazgo y la acción (2026-09-19)

Los posts traían visitas pero no las convertían: los viejos no tenían ningún CTA de contacto
y los nuevos solo un enlace de texto poco visible.

**Se añadió a los 78 posts un bloque de CTA con botón de WhatsApp** («¿Quieres saber el
precio de tu caso?» → botón «Escribir por WhatsApp»), con el gancho de precio (el 92 % de las
búsquedas que convierten incluyen «precio»). Usa el formato `api.whatsapp.com` que el trigger
ya mide, así que **cada clic nuevo cuenta como lead**. Respaldo del contenido previo en
`backup/contenido/`.

Esto sube los mensajes de WhatsApp **sin necesitar más tráfico**: convierte el que ya llega.

---

## Frente 2 — Primer lote de captación (4 posts)

Temas escogidos por datos de Search Console, no por intuición: gaps reales de demanda y una
consulta de intención local pura. Precios como **rangos referenciales**; el valor exacto del
caso se deriva a la valoración por WhatsApp (no se inventan precios de la clínica).

| # | Post | Categoría | ID | Palabras | URL |
|---|------|-----------|----|----------|-----|
| 1 | Implantes All-on-4 en Ecuador: dientes fijos en pocos días | Implantología | 1188 | 1006 | /implantologia/implantes-all-on-4-ecuador-dientes-fijos/ |
| 2 | ¿Cuánto cuesta una placa o dentadura dental en Ecuador? | Rehabilitación oral estética | 1189 | 938 | /rehabilitacion-oral-estetica/cuanto-cuesta-placa-dental-dentadura-ecuador/ |
| 3 | Dentista en Ibarra: dónde atenderte y qué revisar antes | Públicos específicos | 1190 | 980 | /odontologia-para-publicos-especificos/dentista-en-ibarra-donde-atenderte/ |
| 4 | Prótesis fija o removible: cuál te conviene y por qué | Rehabilitación oral estética | 1191 | 927 | /rehabilitacion-oral-estetica/protesis-fija-vs-removible-cual-conviene/ |

**Por qué estos temas:**
- **All-on-4** — 74 impresiones acumuladas sin ningún post que las respondiera. Gap directo.
- **Precio de placa/dentadura** — la clínica dental convierte con consultas de «precio»
  (92 % de los clics que convierten). Post con rangos y derivación a valoración.
- **Dentista en Ibarra** — intención local pura; Ibarra está a 20-25 min por la Panamericana
  y ya aporta usuarios. Captura demanda de una ciudad cercana sin competir con los posts de
  Otavalo.
- **Prótesis fija vs removible** — sustituye al post de «casos de éxito» que se había
  propuesto, porque los casos requieren fotos antes/después y consentimiento de la clínica
  que aún no tenemos. No se inventan testimonios.

**Cada post cumple el estándar de calidad:** título ≤60 caracteres, meta 140-160, sin frases
de la lista negra de IA, con tabla de datos, cita destacada, sección «cuándo NO conviene»,
FAQ de 4 preguntas y el **bloque de CTA de WhatsApp medible** (teléfono 593984582733, formato
`api.whatsapp.com` que el trigger cuenta como lead).

**Verificación en vivo (2026-09-19):** los 4 responden 200, con el permalink de categoría
correcto, el título de Yoast aplicado y el botón de WhatsApp presente. Publicados con
`publicar.py` en `odontologia-life/lote-clientes-2026-09/`.

---

## Frente 3 — Análisis de competencia y optimización por posicionamiento (2026-09-19)

Detalle completo en `analisis-competencia-2026-09.md`.

**Hallazgo:** los competidores de Otavalo (Livi Dental, Dentsonrisas) **no hacen contenido
SEO** — Life ya les gana en cualquier consulta informativa o de precio. La pelea real por las
palabras que dan dinero es contra clínicas de Quito/Guayaquil con más autoridad. La estrategia
se enfocó en el terreno disputado que muestra nuestro propio Search Console.

**Consolidación de canibalización — blanqueamiento:** había tres URLs peleando por las mismas
consultas de precio (todas en posición 5-6, alternándose y frenándose entre sí):
- Se conservó el post principal (id 257, más impresiones e historial) y se le trasplantó el
  cuerpo superior del duplicado (1.262 palabras: tabla de precios por técnica, costo por año,
  «cuándo NO», aviso de ofertas de $49, Otavalo vs. Quito, FAQ). Se le quitó una frase de la
  lista negra de IA que arrastraba.
- El duplicado (id 770) pasó a borrador y **redirige 301** al principal.
- El viejo duplicado de `/uncategorized/` ya redirigía al principal (verificado).

**Reescrituras verificadas, ya estaban hechas:** los posts de ortodoncia/brackets (id 774,
«desde $900», pos 4,9-8) ya tenían título y meta optimizados. No requerían cambios.

**Posts nuevos de gaps reales de precio** (los cachaba por accidente el post de implantes,
en posición 9-12; los posts dedicados los capturan y descargan ese post):

| Post | Categoría | ID | Palabras |
|---|---|----|----------|
| ¿Cuánto cuesta una corona dental en Ecuador? Precios 2026 | Rehabilitación oral | 1193 | 1034 |
| ¿Cuánto cuesta reemplazar un diente en Ecuador? Precios 2026 | Rehabilitación oral | 1194 | 1009 |

Ambos con tabla de precios referenciales por opción, «cuándo NO», FAQ, enlaces internos a los
posts de implantes/puente/prótesis, y el CTA de WhatsApp medible. Verificados en vivo (200).

## Diagnóstico de tráfico (por qué esta estrategia)

El blog está bien cubierto (ahora 82 posts en todos los clusters). La demanda grande de
implantes, prótesis y blanqueamiento cae sobre **posts que ya existen rankeando en posición
11-59** — p. ej. «implante dental precio» (219 imp) en posición 11,3. Es un problema de
ranking/CTR, no de posts faltantes. Por eso la palanca del mes fue **convertir** el tráfico
(CTA) y **cubrir gaps concretos** (4 posts), no producir volumen a ciegas.

---

## Métricas del mes

| Métrica | Valor |
|---------|-------|
| Posts nuevos este mes | 6 (lote captación 1188-1191 + lote precios 1193-1194) |
| Consolidación anti-canibalización | Blanqueamiento: 3 URLs → 1 (301 aplicado) |
| Posts con CTA de WhatsApp medible | Todos los publicados |
| Leads WhatsApp (90 días) | 22 (82 % orgánicos) |
| Eventos clave en GA4 | `whatsapp_click`, `form_submit` |

---

## Pendiente (por orden de retorno)

1. **Subir los posts de implantes/prótesis** que ya rankean en posición 11-13: reescritura
   de título/meta + enlazado interno hacia las páginas/posts de precio. Captura demanda que
   ya se tiene.
2. **Ritmo constante** hacia los 120 del contrato (82/120), con temas frescos, no relleno.
3. **Medir a 30-60 días** el aumento de `whatsapp_click` tras el CTA nuevo (línea base:
   22/90d).
4. **Casos de éxito reales:** post con fotos antes/después + consentimiento de la clínica
   (queda a la espera del material del cliente; no se inventan testimonios).
