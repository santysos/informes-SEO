# Dimapar Ecuador — Diagnóstico técnico y problemas detectados

> Listado consolidado de todos los problemas encontrados durante la auditoría previa al rediseño.
> Sitio analizado: `https://www.dimaparecuador.com`
> Stack: WordPress 6.9.4 + WooCommerce 10.7.0 + Elementor 4.0.9 + Elementor Pro 3.27.1
> Plantilla activa al momento de la auditoría: tema demo **"Woo Auto Parts"**

---

## Resumen ejecutivo

Encontramos **42 problemas** distribuidos en 7 áreas:

| Área | Críticos 🔴 | Importantes 🟠 | Menores 🟡 | Total |
|---|---|---|---|---|
| Contenido y marca | 3 | 2 | 1 | 6 |
| SEO técnico | 4 | 5 | 2 | 11 |
| Estructura de tienda (WooCommerce) | 2 | 4 | 3 | 9 |
| Performance | 0 | 4 | 3 | 7 |
| Seguridad | 1 | 1 | 4 | 6 |
| Accesibilidad | 0 | 2 | 0 | 2 |
| Tracking / Analítica | 0 | 1 | 0 | 1 |
| **TOTAL** | **10** | **19** | **13** | **42** |

---

## 1. Contenido y marca

### 🔴 1.1 — Sitio operando sobre tema demo "Woo Auto Parts" en inglés
El sitio nunca fue migrado a un diseño propio. La plantilla original viene con páginas, menús y configuración del demo de un comercio genérico de autopartes en EE.UU.

**Impacto:** lectores reciben un mensaje incoherente con la marca, los textos en inglés rompen la confianza, y las páginas del demo aparecen en Google indexadas como si fueran de Dimapar.

### 🔴 1.2 — 14 páginas del demo siguen públicas e indexables
Detectadas y verificadas vivas:

| Página demo | URL |
|---|---|
| About (en inglés) | `/about/` |
| Our Staff (en inglés) | `/our-staff/` |
| Compare WooAutoParts | `/compare-woo-auto-parts-v1/` |
| Wishlist WooAutoParts | `/wishlist-woo-auto-parts-v1/` |
| Home WooAutoParts | `/home-woo-auto-parts-v1/` |
| Shop WooAutoParts | `/shop-woo-auto-parts-v1/` |
| Cart WooAutoParts | `/cart-woo-auto-parts-v1/` |
| Checkout WooAutoParts | `/checkout-woo-auto-parts-v1/` |
| My Account WooAutoParts | `/my-account-woo-auto-parts-v1/` |
| WishSuite | `/wishsuite/` |
| Blog WooAutoParts | `/blog-woo-auto-parts-v1/` |
| Contact (en inglés) | `/contact/` |
| Hogar (duplicado) | `/hogar/` |
| Tienda-inicio (duplicado) | `/tienda-inicio/` |

**Impacto:** Google las indexa como contenido oficial, generando confusión y penalizaciones por contenido de baja calidad / duplicado.

### 🔴 1.3 — Tres menús de navegación del demo siguen configurados
- **Main Menu**: Home, Shop, About, Blog, Contact, Top Offers (todo en inglés)
- **Main Menu 2**: Headlights & Lights, Brakes & Suspension, Performance Upgrades, Seasonal Promotions, Battery Replacement (todo en inglés, autos genéricos)
- **Menú**: Auto Maintenance, Brake Repair, Shocks/Struts Replacement, Air Conditioning Services (todo en inglés)

**Impacto:** si alguien activa estos menús por error, todo el header del sitio aparece en inglés.

### 🟠 1.4 — Conflicto entre dos taglines de marca
- Logo oficial dice: *"…le damos más vida a su llanta"*
- Flyers comerciales dicen: *"En las llantas y en la Industria"*

**Recomendación:** elegir uno como tagline oficial.

### 🟠 1.5 — Falta página "Servicio Técnico" como diferenciador
El servicio post-venta y la asistencia técnica son el principal diferenciador para equipos industriales de alto ticket ($2.000 – $17.500), pero no existe una página dedicada que comunique esa propuesta de valor.

### 🟡 1.6 — Falta de testimonios y casos de uso reales
Equipos de ese rango de precio requieren prueba social. El sitio no muestra reseñas verificadas, testimonios de talleres clientes ni casos de implementación.

---

## 2. SEO técnico

### 🔴 2.1 — Cero bloques Schema.org (JSON-LD)
Google necesita Schema.org para entender qué vende cada página. El sitio no tiene ningún bloque estructurado: ni `Organization`, ni `WebSite`, ni `Product`, ni `BreadcrumbList`.

**Impacto:** Google no genera rich snippets (precios, stock, ratings) en los resultados de búsqueda → menor CTR.

### 🔴 2.2 — Página principal sin meta description
La home no tiene meta description. Google muestra un fragmento aleatorio del HTML cuando alguien busca "Dimapar".

### 🔴 2.3 — Open Graph completamente vacío (0 tags)
Cuando alguien comparte cualquier URL del sitio en WhatsApp / Facebook / Twitter, no se ve preview con imagen, título ni descripción. Aparece la URL pelada y nada más.

### 🔴 2.4 — Plugin SEO (Rank Math) instalado pero **inactivo**
Rank Math está en el sitio sin activar. Por eso no hay sitemap óptimo, Schema, ni configuración SEO por página.

### 🟠 2.5 — `sitemap.xml` lista sólo 13 URLs
Con 159 productos, 8 categorías padre, ~30 subcategorías y varias páginas relevantes, el sitemap debería listar **200+ URLs**. Actualmente lista solo 13.

**Impacto:** Google no descubre la mayoría del catálogo.

### 🟠 2.6 — Falta atributo `lang` consistente
El HTML declara `lang="es"` pero debería ser `es-EC` (español Ecuador) para que Google identifique localización geográfica.

### 🟠 2.7 — Múltiples páginas duplicadas (Home, Cart, Checkout, Mi Cuenta)
- Existen 2 páginas "Home", 2 "Cart", 2 "Checkout", 2 "Mi Cuenta", 2 "Blog" (versión demo en inglés + versión personalizada).
- **Impacto:** contenido duplicado, riesgo de canibalización SEO.

### 🟠 2.8 — Falta canonical en varias páginas internas
Sin `<link rel="canonical">` Google decide solo qué versión indexar — sin garantía de que sea la correcta.

### 🟠 2.9 — URLs en inglés del demo todavía resuelven 200 OK
Cuando deberían devolver 404 o redirigir 301 a su equivalente en español.

### 🟡 2.10 — 506 tags de producto excesivos
Generan páginas de archivo de baja calidad y duplicado de contenido. Recomendación: consolidar a ~50 tags relevantes.

### 🟡 2.11 — Falta de breadcrumbs visibles
Las páginas internas no muestran breadcrumb navegable que ayude a usuario y a Google a entender la jerarquía.

---

## 3. Estructura de tienda (WooCommerce)

### ✅ 3.1 — RESUELTO · Categorías incoherentes con el catálogo real
**Antes:** 28 categorías sueltas, sin jerarquía clara, mezcla de español/inglés ("Cuchillas", "Tapones de Válvula", "Herramientas Hidráulicas").

**Después de la reestructura:** 51 categorías organizadas en 8 padres + subcategorías según el organigrama oficial enviado por Dimapar (Excel del 11-05).

### ✅ 3.2 — RESUELTO · "Maquinaria" con 90 productos sin subcategoría
**Antes:** la categoría Maquinaria tenía 90 productos asignados al padre sin clasificar entre alineadoras, balanceadoras, elevadores, etc.

**Después:** los 90 productos quedaron clasificados automáticamente (mediante reglas por título + marca) en sus subcategorías correctas (Alineadoras: 8, Balanceadoras: 11, Elevadores: 20, Compresores: 1, Desenllantadora: 12, Otros equipos: 17).

### ✅ 3.3 — RESUELTO · Atributos globales pobres (solo "Color")
**Antes:** el único atributo global era Color, sin Marca/Voltaje/Capacidad/Aplicación.

**Después:** atributos creados: **Marca, Voltaje, Capacidad, Aplicación** (más Color existente). Listos para filtros AJAX en archivos de categoría.

### 🔴 3.4 — Productos sin marca asignada
Aunque ahora existe el atributo "Marca", **ningún producto lo tiene poblado todavía**. Cada producto debe etiquetarse manualmente (Hofmann / Besser / Hydraulan / Muth / Thyson / etc.) para que los filtros funcionen.

### 🔴 3.5 — Productos sin Schema.org Product
Sin Rank Math activo, los productos no emiten Schema → no aparecen con precio/stock/rating en Google.

### 🟠 3.6 — Categorías huérfanas pendientes de eliminar
Quedaron categorías sin productos del tema demo: Cuchillas, Extensión de Válvula, Tapones de Válvula, Sin categorizar, Herramientas (padre viejo, ahora vacío), Herramientas Hidráulicas / Industriales / del Taller de Trabajo / de Renovado, Elevador Tijera, Elevadores de Lavado, Pesas Adhesivas, Piedra. Total: ~14 categorías huérfanas.

### 🟠 3.7 — Productos sin descripción extendida o ficha técnica
Muchos productos solo tienen título y precio; faltan: descripción de uso, especificaciones técnicas, manuales descargables, voltaje/capacidad, video demo.

### 🟠 3.8 — Conteo de productos del informe inicial vs realidad
El informe Fase 1 hablaba de "254 productos". La realidad son 159 (de los cuales solo algunos publicados activamente).

### 🟠 3.9 — Sin categorías 100% completas para el plan editorial
MOC Products tiene apenas 2 productos cargados (de los 6 subgrupos planificados). Herramientas manuales / neumáticas / de llantera tienen entre 1 y 3 productos. **Hace falta cargar el catálogo completo del proveedor.**

### 🟡 3.10 — Pesas de balanceo / Válvulas / Lubricantes de taller vacíos
Subcategorías del Excel del cliente con 0 productos cargados.

### 🟡 3.11 — Falta página de Marcas (logos + ficha por marca)
Las marcas que distribuye Dimapar (Hofmann, Besser, Hydraulan, Muth, Thyson, Tramontina, Toptul, Vermar, Milton) son un activo de credibilidad. No hay página que las consolide.

### 🟡 3.12 — Falta página "Catálogos descargables"
Existe `/catalogo/` pero está oculta como "private". Los PDFs de marca no están listados públicamente.

---

## 4. Performance

### 🟠 4.1 — 35 hojas CSS y 30 scripts cargando en la home
Acumulación del demo + plugins inactivos no desinstalados.
**Impacto:** LCP (Largest Contentful Paint) tarda **2.268 ms** — el target de Google es < 2.500 ms, estamos al borde.

### 🟠 4.2 — 29 imágenes sin `loading="lazy"`
Todas las imágenes cargan al inicio aunque estén bajo el fold. Penaliza Core Web Vitals.

### 🟠 4.3 — Imágenes sin dimensiones declaradas (`width`/`height`)
Provoca CLS (Cumulative Layout Shift) — la página "salta" al cargar.

### 🟠 4.4 — Imágenes en JPG/PNG, no en WebP/AVIF
El sitio no entrega imágenes en formato moderno. Las imágenes del catálogo pesan 2-5 veces más de lo necesario.

### 🟡 4.5 — Cache server-side activo pero servido sin invalidación clara
Detectamos cache nginx (`x-proxy-cache: HIT`). No hay forma de purgarlo desde wp-admin (no hay plugin de caché).

### 🟡 4.6 — Fuente de iconos antigua (Font Awesome 5.1.5)
Pesada y desactualizada. Reemplazable por Lucide SVG (90% menos peso).

### 🟡 4.7 — 6 plugins activos generan ~12 archivos CSS / JS adicionales
Cada plugin de Elementor (Royal Elementor Addons, etc.) suma assets propios. Auditable después con Asset CleanUp.

---

## 5. Seguridad

### 🔴 5.1 — Plugin "WooCommerce Legacy REST API" instalado (inactivo)
Plugin oficialmente deprecado por WooCommerce por riesgo de seguridad. Aunque está inactivo, su sola presencia en el filesystem es un vector potencial.

### 🟠 5.2 — Sin Content Security Policy (CSP)
Falta header `Content-Security-Policy` que previene XSS y carga de scripts no autorizados.

### 🟡 5.3 — Sin HSTS (Strict-Transport-Security)
Falta el header que fuerza navegadores a usar siempre HTTPS, previene downgrade attacks.

### 🟡 5.4 — Sin X-Content-Type-Options
Falta el header `X-Content-Type-Options: nosniff` que previene MIME-sniffing attacks.

### 🟡 5.5 — Server header revela versión nginx (footprint)
`server: nginx/1.31.1` expone la versión exacta — atacantes pueden buscar CVEs específicos.

### 🟡 5.6 — 21 plugins inactivos sin desinstalar
Cada plugin inactivo es código en el filesystem que puede tener vulnerabilidades. Lista completa:

`AirLift, Akismet Anti-spam, Ally Web Accessibility, Anti-Malware Security, Astra Pro, Better Font Awesome, BlogLentor for Elementor, Editor clásico, Font Awesome (viejo), HUSKY Products Filter, Hustle, Kadence Security Basic, Rank Math SEO ⚠️ debería activarse, Real3D Flipbook PDF Viewer, reCAPTCHA for WooCommerce, ShopEngine, Smash Balloon Instagram, Ultimate Addons for Elementor, WhatsApp Chat by NinjaTeam, WooCommerce Legacy REST API ⚠️ deprecado, WPForms Lite`

---

## 6. Accesibilidad (WCAG)

### 🟠 6.1 — 14 imágenes sin atributo `alt` descriptivo
Incluido **el logo principal** (`cropped-logo-dimapar-scaled.png` y `Logo.png`) sin `alt`. Lectores de pantalla no pueden interpretar la marca.

### 🟠 6.2 — Falta de skip-link al contenido principal
Usuarios con lectores de pantalla deben pasar por todo el header en cada página.

---

## 7. Tracking / Analítica

### 🟠 7.1 — Estado de Google Analytics 4, GTM y Facebook Pixel no claro
El informe Fase 1 menciona que GA4 debe instalarse, pero no hemos confirmado vía REST si está activo, qué eventos rastrea, ni si Google Tag Manager y Facebook Pixel están configurados.

**Acción:** verificar `<script>` de GTM en el `<head>`, GA4 measurement ID, Pixel de Meta — y dejar todo configurado en el rediseño con eventos clave: `view_item`, `add_to_cart`, `whatsapp_click`, `form_submit`, `pdf_download`.

---

## Cómo se conecta esto con el rediseño

El rediseño de Fase 1 que estamos ejecutando resuelve directamente la mayoría de problemas críticos y muchos importantes:

| Problema | Cómo se resuelve en el rediseño |
|---|---|
| 1.1 Tema demo "Woo Auto Parts" | Cambio a Hello Elementor + tokens propios |
| 1.2 14 páginas demo públicas | Movidas a draft + redirects 301 |
| 1.3 Menús en inglés | Reemplazados por menú "Principal Dimapar 2026" con las 8 categorías nuevas |
| 1.5 Falta página Servicio Técnico | Sección dedicada en home + página `/servicio-tecnico/` |
| 2.1 Cero Schema JSON-LD | Bloques `Organization`, `WebSite`, `BreadcrumbList`, `Product` activados con Rank Math |
| 2.2 Home sin meta description | Configurada en el rediseño |
| 2.3 Open Graph vacío | OG completo + imagen 1200×630 |
| 2.4 Rank Math inactivo | Activación + configuración guiada |
| 2.5 Sitemap incompleto | Re-generación con todos los productos / categorías / páginas |
| 3.1 Categorías incoherentes | ✅ Reestructurado a 51 cats en 8 padres |
| 3.2 Maquinaria sin subs | ✅ 90 productos clasificados automáticamente |
| 3.3 Atributos globales pobres | ✅ Marca / Voltaje / Capacidad / Aplicación creados |
| 4.2 Imágenes sin lazy-load | Lazy aplicado en el nuevo Theme Builder |
| 4.4 Imágenes JPG/PNG pesadas | Conversión a WebP en proceso |
| 6.1 Imágenes sin alt | Alt descriptivos definidos en cada bloque del diseño |
| 7.1 Tracking no claro | GTM + GA4 + Pixel configurados en el rediseño |

**Problemas que quedan fuera del scope de Fase 1** (Fase 2 SEO):
- Carga masiva del catálogo (MOC Products, Lubricantes, Pesas, Válvulas)
- Marcado manual de "Marca" en cada producto existente
- Consolidación de 506 tags → ~50
- Borrado quirúrgico de las 14 categorías huérfanas (post-cutover)
- Configuración de cache plugin (WP Rocket o similar)
- Headers de seguridad (CSP, HSTS) — requiere coordinación con hosting
- Desinstalación segura de los 21 plugins inactivos

---

## Estado actual del rediseño

| Tarea | Estado |
|---|---|
| Auditoría técnica completa | ✅ |
| Estructura WooCommerce realineada al Excel del cliente | ✅ |
| 159 productos clasificados a las nuevas categorías | ✅ |
| Atributos globales creados | ✅ |
| Diseño visual aprobado (dark premium con cyan, hero "Hoja técnica") | ✅ |
| Preview HTML publicado en `creativeweb.com.ec/informes/dimapar/redesign/` | ✅ |
| Playbook Elementor publicado | ✅ |
| Página WordPress "Inicio 2026" creada (draft) | ✅ |
| MU-plugin para REST writes subido | ✅ |
| Tokens CSS publicados como archivo externo | ⏳ pendiente subir |
| Rebuild en Elementor con widgets | 🔄 en curso |
| Theme Builder Header + Footer custom | ⏳ pendiente |
| Activación Rank Math + Schema | ⏳ pendiente |
| Cutover: cambiar `Inicio 2026` a Home oficial | ⏳ final |
| Limpieza Fase F: páginas demo, menús viejos, plugins inactivos | ⏳ post-cutover |
