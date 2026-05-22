# Nueva Home — Comercial Hidrobo

Rediseño completo de la home enfocado en **conversión + SEO local Ecuador**, con estética glassmorphism premium.

## Archivos en esta carpeta

- `home.php` — Page template de WordPress lista para pegar en el child theme
- `mockups.md` — Layouts ASCII de cada sección para validar antes del código
- `copy.md` — Textos en español Ecuador, por sección
- `schema.json` — JSON-LD markup (Organization + AutoDealer + LocalBusiness + FAQPage)
- `README.md` — este archivo

---

## Decisiones técnicas

### Builder: Page Template PHP (NO Elementor para la home)

**Por qué NO Elementor para esta home:**
- Elementor agrega ~40-60 wrappers `<div>` por sección, lo cual diluye los H1/H2/H3 que necesitamos para SEO
- El schema JSON-LD lo controlamos mejor en el head del template que en widgets dispersos
- Glassmorphism + animaciones quedan más limpios con CSS propio que con widgets

**Cómo se mantiene la integración con el resto del sitio:**
- `get_header()` y `get_footer()` heredan el menú y footer del tema actual (no se tocan)
- Los formularios siguen siendo `[shortcodes]` de JetFormBuilder / Elementor Forms (no se reemplazan)
- El WhatsApp flotante actual sigue funcionando (es plugin/script aparte)
- HubSpot LeadIn sigue funcionando (carga global)

**Instalación:**

1. Copiar `home.php` al child theme: `/wp-content/themes/[tu-child-theme]/home.php`
2. En WP Admin → Pages → Edit "Inicio" (o la home) → en el sidebar derecho, Page Attributes → Template → seleccionar **"Home - Comercial Hidrobo"**
3. Actualizar la página

### Formularios: NO cambiar nada

Ya tienes lo que necesitas:
- **JetFormBuilder** para citas de taller y solicitudes de repuestos (ya instalado, ya tiene leads entrando)
- **Elementor Forms** para cotización de vehículos (ya instalado)
- **WhatsApp flotante** con mensaje prellenado contextual (ya funcionando — memoria lo confirma)

En la home, los CTAs van a **WhatsApp directo** (cero fricción) o a páginas internas que ya tienen los formularios. No se necesita un form nuevo.

Si en algún momento quieres comparar plugins: WPForms y Gravity son superiores en UX a CF7, pero **no tiene sentido sumar otro plugin de forms** cuando JetFormBuilder ya está dialed in y los leads están entrando.

### Tailwind: CDN embebido

Embebido vía CDN como pediste, con config inline. Para producción a 6 meses+ vale la pena migrar a Tailwind compilado (mejora ~2s de LCP), pero para v1 está bien.

---

## Decisiones de UX / conversión

### Jerarquía de CTAs (orden de prioridad de conversión)

1. **WhatsApp directo al asesor** — mensaje prellenado, cero fricción. Es el CTA principal en hero y CTA final.
2. **Ver inventario** — secundario en hero. Lleva a página de catálogo (ya existe).
3. **Solicitar asesoría financiamiento** — sección 4, formulario corto (4 campos máx) que dispara a WhatsApp + email.
4. **Agendar cita de taller** — sección 5, lleva al form actual de JetFormBuilder.
5. **Solicitar repuesto** — sección 6, lleva al form actual de JetFormBuilder con dropdown filtrado por marca (para resolver el problema del memo: "Formulario de repuestos recibe solicitudes de marcas que CH no vende").

### Trust signals — distribuidos en TODA la página, no solo trust bar

- Hero: 3 badges en glass card (50+ años, distribuidor oficial, garantía fábrica)
- Trust bar: 4 métricas (años, marcas, repuestos, sucursales)
- Cada sección reitera trust con frase corta (ej: financiamiento → "convenios con la banca nacional")
- Testimonios con nombre real + profesión + foto
- Footer hereda info de contacto y RUC (visible en el footer actual)

### Microcopy en español Ecuador

- "Cotiza" no "Solicita un presupuesto"
- "Acércate a la sucursal" no "Visite nuestro showroom"
- "Te ayudamos" no "Le asistimos"
- Tono profesional pero cercano (no formal extremo, no callejero)

---

## Pendientes antes de publicar

El template tiene placeholders que **debes reemplazar** antes de subir:

- [ ] **Número de WhatsApp del asesor principal** (busca todas las ocurrencias de `593XXXXXXXXX`)
- [ ] **12 logos SVG** subidos a `/assets/marcas/` (nissan.svg, toyota.svg, renault.svg, mazda.svg, jeep.svg, ram.svg, fiat.svg, chery.svg, changan.svg, dongfeng.svg, baic.svg, foton.svg)
- [ ] **URLs reales** de las sub-páginas de cada marca (el template asume `/marcas/[slug]/` — confirma si la estructura actual del sitio es diferente)
- [ ] **3 fotos profesionales reales**: hero (auto + paisaje Imbabura/concesionario), taller (taller real con técnicos), repuestos (repuestos genuinos en exhibición)
- [ ] **3 testimonios reales** con foto, nombre, profesión (pueden pedirse a clientes recientes vía WhatsApp después de entrega)
- [ ] **Coordenadas geo reales** de cada sucursal (en el schema JSON-LD)
- [ ] **Horarios reales** de atención
- [ ] **3 posts recientes** del blog (el template los carga dinámicamente con WP_Query — no necesitas hardcodear)

---

## Marcas — Portafolio real confirmado (12)

Confirmado desde comercialhidrobo.com:

1. **Nissan** (Pathfinder, Qashqai, Frontier, Kicks, X-Trail)
2. **Toyota** (Yaris, Corolla, RAV4, Fortuner, Hilux, Land Cruiser)
3. **Renault** (Kwid, Koleos, Arkana, Kardian, Duster, Stepway, Logan)
4. **Mazda** (CX-60, MX-5, CX-90, CX-5, 2, CX-30, BT-50, CX-3)
5. **Jeep** (Compass)
6. **RAM** (700, 1500)
7. **Fiat** (Fiorino, 600, Pulse)
8. **Chery** (Tiggo 4, Tiggo 7, Tiggo 2, Arrizo 5, CS55, Hunter, CS15)
9. **Changan** (V3, V9, V7, G9, G7)
10. **DongFeng** (Z9, Paladin, Mage, Rich 7, Huge, Rich 6)
11. **BAIC** (Deepal G138, S05, S07, Hunter REEV, X55 II, X35, U5 Plus)
12. **Foton** (Tunland series)

### Logos requeridos

Subir 12 archivos SVG a `/wp-content/themes/[child-theme]/assets/marcas/`:

```
nissan.svg
toyota.svg
renault.svg
mazda.svg
jeep.svg
ram.svg
fiat.svg
chery.svg
changan.svg
dongfeng.svg
baic.svg
foton.svg
```

Recomendación: SVG transparente, monocromo neutro (gris oscuro). En hover el grid los ilumina con scale 1.10. Si las marcas tienen brand guidelines estrictas, usa los SVG oficiales en color.

### Layout de la sección

12 marcas en grid:
- Desktop: 6 columnas × 2 filas
- Tablet: 4 columnas × 3 filas
- Mobile: 2 columnas × 6 filas

Cards compactas (solo logo + nombre) — sin tagline individual, sería ruido visual con 12 cards. CTA general "Explorar todo el inventario" al final de la sección.
