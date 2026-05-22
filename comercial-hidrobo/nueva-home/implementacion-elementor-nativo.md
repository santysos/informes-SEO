# Implementación con widgets NATIVOS de Elementor Pro

**Esta es la guía oficial.** Cada sección de la home se construye con widgets de Elementor que el equipo de Comercial Hidrobo ya conoce. El glassmorphism y efectos custom se logran con **clases CSS** que aplicas desde el campo "CSS Classes" de cualquier widget en Elementor.

---

## Pre-setup (una sola vez, ~20 min)

### A. Colores globales

WP Admin → **Elementor → Site Settings → Global Colors** → agregar estos 6 colores con los nombres exactos:

| Nombre | Hex | Uso |
|--------|-----|-----|
| `CH Primary` | `#00628f` | Color principal corporativo |
| `CH Primary Dark` | `#004b70` | Hover de CTAs primarios |
| `CH Primary Soft` | `#cae6ff` | Acentos, badges, fondos suaves |
| `CH Ink` | `#1a1b1f` | Texto principal |
| `CH Ink Soft` | `#3f4850` | Texto secundario |
| `CH Surface` | `#faf8fe` | Fondo claro |

### B. Tipografía global

**Site Settings → Global Fonts:**

| Nombre | Fuente | Peso |
|--------|--------|------|
| `Headline` | Montserrat | 800 (Extra Bold) |
| `Body` | Plus Jakarta Sans | 400 |
| `Label` | Inter | 600 |

Elementor ya carga Google Fonts automáticamente.

### C. Custom CSS global (clases para glassmorphism)

**Site Settings → Custom CSS** → pegar:

```css
/* ============ GLASSMORPHISM ============ */
.ch-glass {
    background: rgba(255, 255, 255, 0.12) !important;
    backdrop-filter: blur(16px) saturate(140%) !important;
    -webkit-backdrop-filter: blur(16px) saturate(140%) !important;
    border: 1px solid rgba(255, 255, 255, 0.28) !important;
    box-shadow: 0 8px 32px 0 rgba(0, 75, 112, 0.18) !important;
}
.ch-glass-strong {
    background: rgba(255, 255, 255, 0.22) !important;
    backdrop-filter: blur(22px) saturate(160%) !important;
    -webkit-backdrop-filter: blur(22px) saturate(160%) !important;
    border: 1px solid rgba(255, 255, 255, 0.28) !important;
    box-shadow: 0 8px 32px 0 rgba(0, 75, 112, 0.18) !important;
}
.ch-glass-light {
    background: rgba(255, 255, 255, 0.55) !important;
    backdrop-filter: blur(10px) saturate(140%) !important;
    -webkit-backdrop-filter: blur(10px) saturate(140%) !important;
    border: 1px solid rgba(255, 255, 255, 0.6) !important;
    box-shadow: 0 6px 24px rgba(0, 98, 143, 0.08) !important;
}

/* ============ HOVER LIFT (cards de marcas, testimonios) ============ */
.ch-hover-lift {
    transition: all 0.5s ease !important;
}
.ch-hover-lift:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 20px 40px rgba(0, 98, 143, 0.15) !important;
    background: rgba(255, 255, 255, 0.85) !important;
}

/* ============ BOTÓN CTA GRANDE WHATSAPP ============ */
.ch-btn-whatsapp .elementor-button {
    background-color: #25D366 !important;
    transition: all 0.3s ease !important;
}
.ch-btn-whatsapp .elementor-button:hover {
    background-color: #1ebe5d !important;
    transform: scale(1.05) !important;
}

/* ============ GRADIENT HERO Y CTA FINAL ============ */
.ch-hero-overlay::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(26,27,31,0.45) 0%, rgba(26,27,31,0.1) 40%, rgba(26,27,31,0.85) 100%);
    pointer-events: none;
    z-index: 1;
}
.ch-hero-overlay > .elementor-container {
    position: relative;
    z-index: 2;
}
.ch-cta-final {
    background:
        radial-gradient(ellipse at 30% 20%, rgba(0,124,180,0.55) 0%, transparent 50%),
        radial-gradient(ellipse at 70% 80%, rgba(140,205,255,0.35) 0%, transparent 55%),
        #0a1b2e !important;
}

/* ============ TIPOGRAFÍA UPPERCASE LABELS ============ */
.ch-eyebrow {
    text-transform: uppercase !important;
    letter-spacing: 0.3em !important;
    font-size: 12px !important;
    font-weight: 700 !important;
}
```

### D. Schema markup en `<head>`

Elementor → **Custom Code → Add New**:
- Title: `Home — Schema Organization + AutoDealer + LocalBusiness`
- Location: `<head> – Start`
- Conditions: Singular → Front Page
- Pegar el contenido de `elementor-head-code.html` **pero quita la parte de FAQPage** (porque el widget FAQ de Elementor genera su propio schema automáticamente).

---

## Construcción sección por sección

### SECCIÓN 1 — Hero

**Estructura:** 1 Sección con fondo de imagen

**Section settings:**
- Layout → Content Width: Boxed (1200px)
- Layout → Height: Min Height = 92vh
- Layout → Vertical Align: Middle
- Style → Background → Image: sube tu foto hero
- Style → Background Overlay: usar gradient o agregar CSS class `ch-hero-overlay`
- Advanced → CSS Classes: `ch-hero-overlay`
- Advanced → Padding: 100px arriba/abajo

**Widgets dentro (en orden):**

1. **Heading widget** — eyebrow:
   - Texto: `Desde 1974 · Distribuidor oficial`
   - HTML Tag: span
   - Typography → Global: Label
   - Color: blanco
   - Advanced → CSS Classes: `ch-glass-strong ch-eyebrow`
   - Padding: 8px 24px, border-radius: 999px
   - Display: inline-block

2. **Heading widget** — H1:
   - Texto: `Concesionario de autos nuevos en el norte del Ecuador`
   - HTML Tag: **h1** (importante para SEO)
   - Typography → Global: Headline, size 64px desktop / 48px tablet / 36px mobile
   - Weight: 900
   - Color: blanco
   - Align: center

3. **Text Editor widget** — subtítulo:
   - Texto: `Distribuidor oficial de 12 marcas: Nissan, Toyota, Renault, Mazda, Jeep, RAM, Fiat, Chery, Changan, DongFeng, BAIC y Foton. Sucursales en Ibarra, Otavalo y Quito. Más de 50 años acompañándote en la carretera.`
   - Color: rgba(255,255,255,0.85)
   - Size: 20px

4. **Inner Section** con 2 columnas (CTAs):
   - Columna 1 → **Button widget**:
     - Texto: `Cotizar por WhatsApp`
     - Link: `https://wa.me/593XXXXXXXXX?text=Hola%2C%20vi%20su%20p%C3%A1gina%20web%20y%20quiero%20cotizar%20un%20auto.`
     - Icon: chat (Material Icons o emoji 💬)
     - Border-radius: 999px
     - Padding: 16px 32px
     - Advanced → CSS Classes: `ch-btn-whatsapp`
   - Columna 2 → **Button widget**:
     - Texto: `Ver inventario`
     - Link: `/inventario/`
     - Style: outline, color blanco
     - Border-radius: 999px
     - Advanced → CSS Classes: `ch-glass-strong`

5. **Inner Section** con 3 columnas (trust badges):
   - Cada columna: **Icon Box widget**
     - Iconos: verified / workspace_premium / shield
     - Títulos: `Desde 1974`, `Distribuidor oficial`, `Garantía de fábrica`
     - Color blanco, layout horizontal compacto
   - En la Inner Section completa → Advanced → CSS Classes: `ch-glass`
   - Padding inner section: 16px 32px, border-radius 999px

---

### SECCIÓN 2 — Trust Bar

**Section settings:**
- Background: `CH Surface` (color global)
- Padding vertical: 80px

**Widgets:** 1 columna con 4 widgets **Counter** (Elementor Pro) en una fila o usar 4 columnas con widget Counter cada una.

**Cada Counter:**
| # | Number | Text Suffix | Title |
|---|--------|-------------|-------|
| 1 | 50 | + | Años de trayectoria desde 1974 |
| 2 | 12 | (vacío) | Marcas oficiales que distribuimos |
| 3 | 100 | % | Repuestos genuinos de fábrica |
| 4 | 3 | (vacío) | Sucursales: Ibarra · Otavalo · Quito |

- Number color: `CH Primary`
- Number typography: Headline, 64px, weight 900
- Title: small caps, tracking amplio, color `CH Ink Soft`

---

### SECCIÓN 3 — 12 Marcas

**Section settings:**
- Background: `CH Surface 2` (#f4f3f8)
- Padding: 112px arriba/abajo

**Estructura:**

1. **Heading** (eyebrow): `12 marcas oficiales` con CSS class `ch-eyebrow`, color `CH Primary`
2. **Heading H2:** `El portafolio más completo del norte del Ecuador`
3. **Text Editor:** `Somos concesionario autorizado por 12 casas matrices. Desde compactos y SUVs hasta camionetas de trabajo, tenemos la marca y el modelo que necesitas.`
4. **Inner Section** con 6 columnas (en desktop). Cada columna contiene **un Image Box widget** (×12 total):
   - Imagen: logo SVG de la marca
   - Título: nombre de la marca (H3)
   - Link: `/marcas/[slug]/`
   - Advanced → CSS Classes: `ch-glass-light ch-hover-lift`
   - Border-radius: 16px
   - Padding interno: 20px

   Responsive: 6 columnas desktop → 4 tablet → 3 mobile-L → 2 mobile.

5. **Button** debajo: `Explorar todo el inventario` link a `/inventario/`, color primary

---

### SECCIÓN 4 — Financiamiento

**Section settings:**
- Background: `CH Surface`
- Padding: 112px

**Estructura: 2 columnas (50/50)**

**Columna izquierda (texto):**
1. Heading eyebrow: `Crédito vehicular` (clase `ch-eyebrow`)
2. Heading H2: `Financiamiento que se ajusta a tu realidad`
3. Text Editor con párrafo intro
4. **Icon List widget** con los 4 ítems:
   - Tasa preferencial
   - Aprobación en 24 horas
   - Plazos de hasta 60 meses
   - Entrada desde 0%
   - Icon de cada uno: check_circle, color `CH Primary`
5. **Button** primary: `Solicitar asesoría de financiamiento` con link WhatsApp prellenado

**Columna derecha (imagen + card flotante):**
1. **Image widget** con foto del asesor entregando llaves
   - Border-radius: 24px
   - Box shadow: large
2. **Heading** widget flotante (Advanced → Positioning → Custom → bottom-left, negative offsets):
   - Texto: `0% Entrada en planes seleccionados`
   - Advanced → CSS Classes: `ch-glass-light`
   - Padding: 24px, border-radius: 16px

---

### SECCIÓN 5 — Taller Certificado

**Section settings:**
- Background → Image: foto del taller real
- Background → Overlay: gradient from-left dark (`from-ch-ink/85 to-transparent`)
- Min height: 80vh
- Padding: 80px
- Content alignment: Left

**Estructura: 1 inner section a la izquierda (max-width 600px), color blanco:**

1. Heading eyebrow: `Servicio postventa` color `CH Primary Soft`
2. Heading H2: `Taller certificado por las marcas que vendemos` blanco
3. Text editor con párrafo
4. **Icon List** con 4 ítems (color iconos `CH Primary Soft`)
5. **Button**: `Agendar cita en el taller`, link `/agendar-cita-taller/`, color blanco con texto azul

**Inner section completo → Advanced → CSS Classes: `ch-glass-strong`**
- Padding interno: 40-56px
- Border-radius: 24px

---

### SECCIÓN 6 — Repuestos

**Section settings:**
- Background: `CH Surface 2`
- Padding: 112px

**Estructura: 2 columnas (50/50), imagen IZQUIERDA, texto DERECHA:**

**Columna izquierda:**
- Image widget con foto de repuestos, border-radius 24px

**Columna derecha:**
1. Heading eyebrow: `Garantía de origen` clase `ch-eyebrow`
2. Heading H2: `Repuestos genuinos para tu vehículo`
3. Text editor con párrafo
4. **Button** primary: `Solicitar un repuesto` link a form de repuestos

**Mobile responsive:** invertir orden para que primero salga texto, luego imagen.

---

### SECCIÓN 7 — Testimonios

**Section settings:**
- Background: `CH Surface`
- Padding: 112px

**Estructura:**

1. Heading eyebrow centrado: `Lo que dicen nuestros clientes`
2. Heading H2 centrado: `Clientes que ya manejan con nosotros`
3. **Testimonial Carousel widget** (Elementor Pro) o 3 columnas con **Testimonial widget** cada una

**Cada testimonio:**
- Texto del testimonio
- Imagen: foto del cliente
- Nombre: María Andrade / Carlos Pozo / Fernanda Cevallos
- Title (subtítulo): Ingeniera Agrónoma / Comerciante / Médica
- Style: card-like
- Advanced → CSS Classes: `ch-glass-light`
- Padding interno: 40px, border-radius: 24px

---

### SECCIÓN 8 — FAQ

**Section settings:**
- Background: `CH Surface 2`
- Padding: 112px

**Estructura:**

1. Heading eyebrow centrado: `Resolvemos tus dudas`
2. Heading H2 centrado: `Preguntas frecuentes`
3. **FAQ widget de Elementor Pro** (este widget genera schema automáticamente)

**Agregar 6 ítems:**

| # | Pregunta | Respuesta (resumen) |
|---|----------|---------------------|
| 1 | ¿Qué necesito para financiar mi auto en Comercial Hidrobo? | Ver archivo `copy.md` |
| 2 | ¿Aceptan mi auto usado como parte de pago? | Ver archivo `copy.md` |
| 3 | ¿Qué garantía tiene un auto nuevo de Comercial Hidrobo? | Ver archivo `copy.md` |
| 4 | ¿Dónde están sus sucursales? | Ver archivo `copy.md` |
| 5 | ¿Hacen entregas a otras ciudades del Ecuador? | Ver archivo `copy.md` |
| 6 | ¿Tienen taller para vehículos de otras marcas? | Ver archivo `copy.md` |

**Settings del widget FAQ:**
- Schema: **ON** (importante para SEO — esto reemplaza el FAQPage del schema custom)
- Default: primer ítem abierto
- Icon: + / − o chevron
- Style → Active color: `CH Primary`
- Style → Background: blanco con border-radius 16px (no glass aquí porque va sobre fondo claro)

---

### SECCIÓN 9 — Blog dinámico

**Section settings:**
- Background: `CH Surface`
- Padding: 112px

**Estructura:**

1. Inner Section con 2 columnas:
   - Izq: Heading eyebrow `Blog` + H2 `Novedades del sector` + Text editor
   - Der: Button link `Ver todo el blog` con border-bottom

2. **Posts widget de Elementor Pro:**
   - Layout: Grid, 3 columnas
   - Posts per page: 3
   - Order: Date DESC
   - Image position: Top
   - Image aspect ratio: 16:10
   - Title HTML tag: h3
   - Show: Image + Category + Title + Excerpt
   - Excerpt length: 22 palabras
   - Style → Image border-radius: 16px
   - Style → Hover image scale: 1.1

---

### SECCIÓN 10 — CTA Final

**Section settings:**
- Background: gradient personalizado o color `#0a1b2e`
- Advanced → CSS Classes: `ch-cta-final`
- Padding: 128px arriba/abajo
- Content alignment: center

**Estructura: Inner section con clase `ch-glass-strong`, max-width 800px:**

1. Heading H2 blanco: `¿Listo para llevarte tu próximo auto?` (48-64px)
2. Text editor: párrafo
3. **Button group** (2 botones):
   - WhatsApp: clase `ch-btn-whatsapp`, link WhatsApp prellenado
   - Ver inventario: outline glass, link `/inventario/`

---

## Paso final — Convertir en homepage

1. Hacer backup en ManageWP
2. Duplicar la home actual con plugin Duplicate Page (renombrar a "Home Anterior backup")
3. WP Admin → Settings → Reading → Static page → Home: seleccionar la nueva
4. Save Changes
5. Probar en incógnito + mobile + tablet

---

## Verificación SEO post-publicación

- [ ] https://validator.schema.org/ → pegar URL home → debe detectar Organization + AutoDealer + LocalBusiness + FAQPage
- [ ] https://search.google.com/test/rich-results → debe mostrar las FAQs como rich result candidato
- [ ] PageSpeed Insights mobile → debe estar arriba de 80
- [ ] Google Search Console → URL Inspection → Request Indexing

---

## Resumen de widgets por sección

| Sección | Widgets principales |
|---------|---------------------|
| 1 Hero | Section bg-image + Heading + Text + Button × 2 + Inner Section con Icon Box × 3 |
| 2 Trust Bar | Counter × 4 |
| 3 Marcas | Heading × 3 + Inner Section con Image Box × 12 + Button |
| 4 Financiamiento | 2 columnas: Heading + Text + Icon List + Button + Image + Heading flotante |
| 5 Taller | Section bg-image + Inner Section con Heading + Text + Icon List + Button |
| 6 Repuestos | 2 columnas: Image + Heading + Text + Button |
| 7 Testimonios | Heading + Testimonial Carousel (Pro) |
| 8 FAQ | Heading + FAQ widget (Pro, con schema) |
| 9 Blog | Heading + Posts widget (Pro) |
| 10 CTA Final | Heading + Text + Button × 2 |

Todos los widgets son **estándar de Elementor Pro** — el equipo no necesita aprender nada nuevo.

---

## Tiempo estimado de construcción

- Pre-setup (colores, fuentes, CSS, schema): 20 min
- Cada sección: 25-45 min
- Total construcción inicial: 5-7 horas
- Refinamiento responsive (mobile/tablet): 1-2 horas adicionales

Recomendación: hacer 3 sesiones de 2-3 horas cada una.
