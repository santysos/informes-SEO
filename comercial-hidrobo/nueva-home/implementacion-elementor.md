# Implementación con WordPress + Elementor Pro

Estrategia: usar Elementor Pro como contenedor pero mantener el diseño custom intacto.

**Por qué este método y no otro:**
- ❌ Replicar el diseño con widgets nativos de Elementor → 4-6 horas de trabajo, el glassmorphism quedaría a medias, y Elementor genera 40-60 wrappers `<div>` por sección que afectan SEO.
- ❌ Subir el `home.php` al child theme → requiere FTP, el cliente no puede editar después.
- ✅ **HTML widget de Elementor + Custom Code de Elementor Pro** → diseño 100% fiel, todo editable desde WP Admin, sin tocar archivos del servidor.

---

## Paso 1 — Agregar CSS, fuentes y schema en el `<head>` (solo en la home)

Elementor Pro tiene una función "Custom Code" que inyecta código en `<head>` o `<body>` con condiciones (solo en ciertas páginas).

### Cómo agregar:

1. WP Admin → **Elementor** → **Custom Code** → **Add New**
2. Llenar:
   - **Title:** `Home — Estilos + Schema`
   - **Location:** `<head> – Start`
   - **Priority:** `5`
3. En **Conditions**, click "Add Condition" → **Include** → **Singular** → **Front Page** (o la página específica donde irá la home)
4. Pegar el contenido del archivo `elementor-head-code.html` (lo genero abajo) en el campo de código
5. **Publish**

Este código carga:
- Tailwind CDN
- Google Fonts (Montserrat + Plus Jakarta Sans + Inter + Material Symbols)
- CSS custom de glassmorphism
- Config de Tailwind con los colores `ch-primary`, etc.
- Schema JSON-LD (Organization + AutoDealer + LocalBusiness + FAQPage)

---

## Paso 2 — Crear la página y configurarla

1. WP Admin → **Páginas** → **Añadir nueva**
2. Título: `Home Nueva` (cuando esté lista, la convertimos en la home oficial)
3. En el sidebar derecho:
   - **Page Attributes → Template:** seleccionar **"Elementor Full Width"** (es un template de Elementor Pro que quita los wrappers del tema y mantiene solo header/footer)
4. **Guardar borrador** (no publicar aún)
5. Click en **"Edit with Elementor"**

---

## Paso 3 — Construir con Elementor (modo simple)

Una vez en el editor de Elementor:

1. **Eliminar cualquier sección por defecto** que Elementor cargue
2. Click en el ➕ → **Estructura** → seleccionar **una sola columna** (un section de 100% ancho)
3. Configurar el section:
   - **Layout → Content Width:** Full Width
   - **Layout → Height:** Default
   - **Layout → Columns Gap:** No Gap
   - **Style → Padding:** 0 en todos los lados
   - **Advanced → Margin:** 0
4. Dentro de la columna, arrastrar el widget **"HTML"** (está en widgets básicos)
5. Pegar el contenido del archivo `elementor-body-code.html` (lo genero abajo) dentro del widget HTML
6. **Update** / **Publish**

---

## Paso 4 — Blog dinámico (mejora opcional pero recomendada)

El HTML del Paso 3 trae 3 cards de blog hardcoded. Para que sean **dinámicos** (que se actualicen solos cuando publiques nuevos posts), tienes 2 opciones:

### Opción A (más rápida): dejar hardcoded
Cambia los 3 cards manualmente cuando publiques posts importantes. Le toma 5 minutos al mes.

### Opción B (mejor): reemplazar la sección 9 con widget Posts de Elementor

1. En Elementor, identificar dónde termina la sección 8 (FAQ) y dónde empieza la 10 (CTA final)
2. Cortar la sección 9 (blog) del HTML widget — quitarla
3. Crear una **nueva sección** debajo con un widget **"Posts"** (Elementor Pro)
4. Configurar el widget Posts:
   - **Layout:** Grid, 3 columns
   - **Posts per page:** 3
   - **Order by:** Date, DESC
   - **Image position:** Top, Aspect Ratio 16:10
   - **Custom CSS classes:** copiar el styling de las cards (te dejo el snippet abajo)

Vale la pena solo si publicas posts seguido (el plan SEO indica 20 posts/mes en CH → sí vale la pena).

---

## Paso 5 — Convertir en homepage oficial

Cuando ya esté revisada y aprobada:

1. WP Admin → **Settings → Reading**
2. **Your homepage displays:** seleccionar **"A static page"**
3. **Homepage:** elegir la página `Home Nueva` (o renómbrala a `Inicio`)
4. **Save Changes**

Inmediatamente la nueva home reemplaza a la actual.

---

## Backup antes de publicar

**Antes del Paso 5**, hacer:

1. Backup completo del sitio (ManageWP → Backups → "Backup Now")
2. En WP Admin → Pages, **duplicar** la home actual (con plugin Duplicate Page) → renombrarla a `Home Anterior (backup)` por si hay que revertir rápido

---

## Verificación post-publicación

Una vez publicada:

- [ ] Abrir comercialhidrobo.com en incógnito → ver que carga el diseño nuevo
- [ ] Probar los CTAs de WhatsApp → debe abrir WhatsApp con mensaje prellenado
- [ ] Probar en mobile (responsive)
- [ ] Verificar schema JSON-LD: https://validator.schema.org/ pegando la URL de la home
- [ ] Verificar rich results: https://search.google.com/test/rich-results
- [ ] Revisar PageSpeed Insights — debería estar arriba de 80 en mobile
- [ ] Verificar GTM/GA4 — eventos siguen disparando (whatsapp_click + form_submit)
- [ ] Forzar re-indexación: Google Search Console → URL Inspection → Request Indexing

---

## Limitación a tener en cuenta

Elementor va a envolver el HTML widget en estos divs:
```html
<section class="elementor-section ...">
  <div class="elementor-container">
    <div class="elementor-column ...">
      <div class="elementor-widget-html ...">
        [NUESTRO HTML AQUÍ]
      </div>
    </div>
  </div>
</section>
```

Por eso configuramos el section en Paso 3 con **padding 0 y full width** — para que esos wrappers no estorben visualmente. El SEO no se ve afectado porque los headings y schema están en nuestro HTML interno.

---

## Resumen de archivos a usar

| Archivo | Dónde va |
|---------|-----------|
| `elementor-head-code.html` | Elementor → Custom Code → `<head>` |
| `elementor-body-code.html` | Elementor → Widget HTML dentro de la página |
| `home.php` | NO se usa con esta vía (era el plan A descartado) |
| `schema.json` | Solo para validar en validator.schema.org |
| `preview.html` | Solo para mostrar al cliente / referencia visual |
| `copy.md` | Referencia de textos por sección |
| `mockups.md` | Referencia de layouts |
