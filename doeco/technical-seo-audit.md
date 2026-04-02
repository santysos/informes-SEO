# AUDITORIA TECNICA SEO -- dimaparecuador.com
**Fecha:** 1 de abril de 2026  
**Dominio:** https://www.dimaparecuador.com/  
**Stack:** WordPress 6.9.4 + Elementor 4.0.1 + Elementor Pro 3.27.1 + WooCommerce 10.6.2 + Royal Elementor Kit/Addons  
**Contenido:** 27 paginas, 234 productos, 7 posts de blog, 12 categorias de producto, 3 marcas

---

## PUNTUACION GENERAL: 22/100

---

## 1. TITLE TAGS -- Puntuacion: 15/100

### Estado Actual
| Pagina | Title actual |
|--------|-------------|
| Homepage | `Dimapar Ecuador -- En las llantas y en la Industria` |
| Tienda | `Tienda -- Dimapar Ecuador` |
| Quienes somos | `Quienes somos -- Dimapar Ecuador` |
| Contacto | `Contacto -- Dimapar Ecuador` |
| Blog | `Blog -- Dimapar Ecuador` |
| Producto (ej.) | `Balanceadora B2P para Vehiculos Livianos Besser -- Dimapar Ecuador` |

**Problemas detectados:**
- Titulos 100% genericos en paginas clave (Tienda, Contacto, Blog)
- No incluyen keywords transaccionales ni geolocalizacion (Ecuador, Quito, etc.)
- No hay plugin SEO (Yoast/Rank Math) instalado = cero control sobre titles

### Recomendado
| Pagina | Title recomendado |
|--------|------------------|
| Homepage | `Dimapar Ecuador - Maquinaria y Herramientas Automotrices | Importador Directo` |
| Tienda | `Catalogo de Maquinaria Automotriz Ecuador - Alineadoras, Balanceadoras, Elevadores | Dimapar` |
| Quienes somos | `Quienes Somos - +20 Anos Importando Maquinaria Automotriz en Ecuador | Dimapar` |
| Contacto | `Contacto Dimapar Ecuador - Cotiza Maquinaria para tu Tecnicentro` |
| Blog | `Blog Automotriz - Consejos para Tecnicentros y Talleres | Dimapar Ecuador` |
| Categorias | `[Categoria] - Comprar en Ecuador | Dimapar` |

---

## 2. META DESCRIPTIONS -- Puntuacion: 0/100

### Estado Actual
- **NO existe NINGUNA meta description** en ninguna pagina del sitio
- No hay plugin SEO instalado que permita configurarlas
- Google genera automaticamente snippets del contenido de la pagina (poco control)

### Recomendado
- Instalar Rank Math SEO o Yoast SEO
- Escribir meta descriptions unicas para CADA pagina, producto y categoria
- Ejemplo Homepage: "Dimapar Ecuador: importador directo de maquinaria automotriz. Alineadoras, balanceadoras, elevadores, desmontadoras y herramientas para tecnicentros. +20 anos en el mercado."
- Ejemplo Producto: "Balanceadora B2P Besser para vehiculos livianos. Compra directa al importador en Ecuador. Solicita cotizacion."

---

## 3. JERARQUIA DE ENCABEZADOS H1-H6 -- Puntuacion: 15/100

### Estado Actual
**Homepage:** SIN H1. Los H2 del header/footer del template se repiten en TODAS las paginas:
- H2: "Main Menu" (x2 - desktop + mobile)
- H2: "Category Menu" (x2)
- H2: "Contact Details" (x2)
- H2 slider: "Soluciones Completas"
- H3 slider: "Maquinaria, herramientas y todo para su tecnicentro"

**Quienes somos:** H3 "QUIENES SOMOS?" aparece ANTES del H1 "MAS DE 20 ANOS DE EXPERIENCIA NOS RESPALDAN" (jerarquia invertida)

**Contacto:** H1 "Contactanos" (correcto pero generico)

**Blog:** SIN H1

**Tienda:** SIN H1. Los H2 son nombres de producto del loop WooCommerce

**Producto:** SIN H1 visible en head. Los encabezados del template (Main Menu, Category Menu) dominan la jerarquia

**Problemas graves:**
- 6+ encabezados H2 del template header/footer contaminan TODAS las paginas
- Homepage y Tienda carecen de H1
- Blog carece de H1
- Los H2 contienen textos en ingles ("Main Menu", "Category Menu") en un sitio en espanol

### Recomendado
- Cambiar los encabezados del template header/footer a `<div>` o `<span>` (no son headings semanticos)
- Agregar H1 unico y descriptivo en CADA pagina
- Mantener jerarquia H1 > H2 > H3 sin saltos

---

## 4. ESTRUCTURA DE URLs -- Puntuacion: 60/100

### Estado Actual
**Bueno:**
- Productos: `/producto/balanceadora-besser/` (slug en espanol, limpio)
- Categorias: `/categoria-producto/herramientas/herramientas-neumaticas/` (jerarquica)
- Blog: `/conceptos-de-balanceo-y-contrapesos-pesas/` (descriptivo)

**Problemas:**
- Paginas residuales del tema con slugs en ingles: `/shop-woo-auto-parts-v1/`, `/cart-woo-auto-parts-v1/`, `/checkout-woo-auto-parts-v1/`, `/my-account-woo-auto-parts-v1/`, `/blog-woo-auto-parts-v1/`, `/compare-woo-auto-parts-v1/`, `/wishlist-woo-auto-parts-v1/`
- Paginas duplicadas: `/contact/` Y `/contacto/`, `/about/` Y `/quienes-somos/`
- Paginas inutiles indexadas: `/our-staff/` (de 2017), `/hogar/`, `/tienda-inicio/`
- URL de blog post excesivamente larga: `/sabia-usted-que-1-galon-de-aceite-usado-puede-contaminar-1-millon-de-galones-de-agua/`
- Producto demo: `/producto/hoodie-with-logo/` (contenido demo de WooCommerce)

### Recomendado
- Eliminar o redirigir 301 todas las paginas `-woo-auto-parts-v1`
- Redirigir `/contact/` a `/contacto/` y `/about/` a `/quienes-somos/`
- Eliminar `/our-staff/`, `/hogar/`, `/tienda-inicio/`, `/wishsuite/`, `/alineadora-besser-gn-3/` (pagina suelta, no producto)
- Eliminar producto demo `hoodie-with-logo`
- Acortar URLs de blog excesivamente largas

---

## 5. ENLACES INTERNOS -- Puntuacion: 20/100

### Estado Actual
- La navegacion principal existe pero los links van a las paginas INCORRECTAS del tema (`/shop-woo-auto-parts-v1/` en vez de `/tienda/`)
- Cart URL configurada como `/cart-woo-auto-parts-v1/` en vez de `/carrito/`
- No hay breadcrumbs en paginas de producto ni categorias
- No hay enlaces de "productos relacionados" visibles
- Los 7 posts del blog no enlazan a productos relacionados
- No hay sidebar ni widgets con links a categorias populares
- Footer tiene estructura de enlaces pero con headings en ingles

### Recomendado
- Corregir URLs de navegacion al espanol (/tienda/, /carrito/, /finalizar-compra/)
- Implementar breadcrumbs en productos y categorias (BreadcrumbList schema)
- Agregar seccion "Productos Relacionados" en cada producto
- Crear enlaces internos desde blog posts hacia productos/categorias relevantes
- Agregar menu de categorias en sidebar de tienda

---

## 6. OPTIMIZACION DE IMAGENES -- Puntuacion: 15/100

### Estado Actual
- **Formato:** 100% PNG. CERO imagenes en WebP o AVIF
- **Nombres de archivo problematicos:** `Captura-de-pantalla-2025-09-29-230519.png`, `MEGASPIN-610-IMAGEN-DE-PRODCUTO.png` (typo: "PRODCUTO")
- **Placeholder images:** Al menos 5 productos en la tienda usan la imagen placeholder de WooCommerce con `alt="Marcador"` 
- **Alt tags:** Los productos CON imagen tienen alt text decente (nombre del producto), pero las 3 imagenes del header/logo tienen `alt=""`
- **Srcset:** Presente en productos (300w, 150w, 100w) -- correcto
- **Lazy loading:** `loading="lazy"` presente en imagenes below-the-fold -- correcto
- **Tamano del logo:** `cropped-logo-dimapar-scaled.png` sugiere una imagen enorme recortada por WP

### Recomendado
- Convertir TODAS las imagenes a WebP (ahorro estimado 40-60% en peso)
- Renombrar archivos con keywords: `balanceadora-besser-b2p.webp` en vez de `Captura-de-pantalla-...`
- Subir imagenes reales para los 5+ productos con placeholder
- Agregar alt text descriptivo al logo: `alt="Dimapar Ecuador - Maquinaria Automotriz"`
- Comprimir y redimensionar el logo original
- Implementar plugin de optimizacion (ShortPixel, Imagify o Smush)

---

## 7. RESPONSIVIDAD MOVIL -- Puntuacion: 55/100

### Estado Actual
- Viewport meta tag presente: `width=device-width, initial-scale=1.0, viewport-fit=cover`
- WooCommerce smallscreen CSS cargado para `max-width: 768px`
- Elementor tiene breakpoints adicionales configurados
- Header duplicado (desktop + mobile) genera contenido redundante

### Recomendado
- Verificar tiempos de carga en movil (demasiados CSS/JS)
- Asegurar que el menu mobile funcione correctamente
- Eliminar header desktop duplicado en vista mobile (afecta rendimiento)
- Probar con Google Mobile-Friendly Test

---

## 8. SCHEMA / DATOS ESTRUCTURADOS -- Puntuacion: 0/100

### Estado Actual
- **NO hay NINGUN JSON-LD** en ninguna pagina del sitio
- NO hay schema Product en paginas de producto
- NO hay schema Organization ni LocalBusiness
- NO hay schema BreadcrumbList
- NO hay schema Article en posts del blog
- NO hay schema WebSite (SearchAction)
- Sin plugin SEO = sin generacion automatica de schema

### Recomendado
- **Prioridad CRITICA.** Instalar Rank Math (genera schema automaticamente)
- Implementar como minimo:
  - `Organization` + `LocalBusiness` en homepage (con NAP, logo, horarios)
  - `Product` en cada producto (nombre, imagen, precio, disponibilidad, marca)
  - `BreadcrumbList` en productos y categorias
  - `WebSite` con `SearchAction` en homepage
  - `Article` en posts del blog
  - `ItemList` en paginas de categoria
- Sin schema, Google NO puede mostrar rich snippets (estrellas, precios, stock)

---

## 9. SITEMAP -- Puntuacion: 20/100

### Estado Actual
Sitemap nativo de WordPress (`wp-sitemap.xml`) con **13 sub-sitemaps**.

**Problemas graves en el sitemap:**

| Problema | URLs afectadas |
|----------|---------------|
| Templates WP indexados | 11 URLs `?wpr_templates=...` (header, footer, search, 404, etc.) |
| Mega menus indexados | 4 URLs `?wpr_mega_menu=...` |
| Paginas de usuario/autor | 4 URLs `/author/...` |
| Atributos de color indexados | 5 URLs `/color/rojo/`, `/color/negro/`, etc. |
| Paginas WooCommerce que no deben indexarse | `/carrito/`, `/finalizar-compra/`, `/mi-cuenta/`, `/cart-woo-auto-parts-v1/`, `/checkout-woo-auto-parts-v1/`, `/my-account-woo-auto-parts-v1/` |
| Paginas duplicadas | `/contact/` + `/contacto/`, `/about/` + `/quienes-somos/`, `/tienda/` + `/shop-woo-auto-parts-v1/`, `/blog/` + `/blog-woo-auto-parts-v1/` |
| Paginas obsoletas/demo | `/our-staff/` (2017), `/hogar/`, `/tienda-inicio/`, `/wishsuite/`, `/compare-woo-auto-parts-v1/`, `/wishlist-woo-auto-parts-v1/` |
| Producto demo | `/producto/hoodie-with-logo/` |
| Post_format, post_tag sitemaps | Probablemente con contenido thin |

**Total de URLs que NO deberian estar en el sitemap: ~35-40 URLs**

### Recomendado
- Instalar Rank Math SEO para control total del sitemap
- Excluir del sitemap: templates, mega menus, autores, colores, carrito/checkout/mi-cuenta
- Eliminar paginas duplicadas y del tema demo
- Eliminar producto demo hoodie-with-logo
- Resultado esperado: sitemap limpio con ~250 URLs (productos + paginas reales + categorias + blog)

---

## 10. ROBOTS.TXT -- Puntuacion: 45/100

### Estado Actual
```
User-agent: *
Disallow: /wp-content/uploads/wc-logs/
Disallow: /wp-content/uploads/woocommerce_transient_files/
Disallow: /wp-content/uploads/woocommerce_uploads/
Disallow: /*?add-to-cart=
Disallow: /*?*add-to-cart=
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php
Sitemap: https://www.dimaparecuador.com/wp-sitemap.xml
```

**Lo bueno:** Bloquea logs, archivos transitorios, wp-admin, y parametros add-to-cart
**Lo malo:**
- NO bloquea `/carrito/`, `/finalizar-compra/`, `/mi-cuenta/`
- NO bloquea las paginas del tema demo (`*-woo-auto-parts-v1`)
- NO bloquea `/author/`
- NO bloquea `?wpr_templates=` ni `?wpr_mega_menu=`
- NO bloquea `/color/`

### Recomendado
Agregar reglas:
```
Disallow: /carrito/
Disallow: /finalizar-compra/
Disallow: /mi-cuenta/
Disallow: /*woo-auto-parts-v1*
Disallow: /author/
Disallow: /?wpr_templates=
Disallow: /?wpr_mega_menu=
Disallow: /color/
Disallow: /our-staff/
Disallow: /wishsuite/
```

---

## 11. CANONICAL TAGS -- Puntuacion: 40/100

### Estado Actual
- Canonicals presentes y autorreferenciales en las paginas principales:
  - Homepage: `<link rel="canonical" href="https://www.dimaparecuador.com/" />`
  - Tienda: `canonical href="/tienda/"`
  - Producto: `canonical href="/producto/balanceadora-besser/"`
- **PERO:** Las paginas duplicadas (`/contact/`, `/about/`, `/shop-woo-auto-parts-v1/`) probablemente tienen canonicals autorreferenciales tambien, lo que CONFIRMA el contenido duplicado a Google en vez de resolverlo

### Recomendado
- Las paginas duplicadas deben hacer redirect 301 o tener canonical apuntando a la version principal
- `/contact/` -> canonical a `/contacto/`
- `/about/` -> canonical a `/quienes-somos/`
- `/shop-woo-auto-parts-v1/` -> canonical a `/tienda/`

---

## 12. OPEN GRAPH / SOCIAL META TAGS -- Puntuacion: 5/100

### Estado Actual
- **NO hay tags Open Graph** (og:title, og:description, og:image, og:type) en NINGUNA pagina
- **NO hay Twitter Card tags**
- Solo existe: `<meta name="facebook-domain-verification" content="dj01glbz7i6zl8js7s9e91cgtmh7h3" />`
- Verificacion de Facebook activa pero sin OG tags = compartir en redes muestra previsualizacion generica/fea

### Recomendado
- Instalar Rank Math (genera OG tags automaticamente)
- Configurar imagen OG por defecto (logo o banner de la marca)
- Cada producto debe tener og:image con foto del producto
- Validar con Facebook Sharing Debugger despues de implementar

---

## 13. SENALES DE CORE WEB VITALS -- Puntuacion: 20/100

### Estado Actual
- **35 archivos CSS** cargados en homepage (render-blocking)
- **30 archivos JavaScript** cargados en homepage
- La mayoria de JS tiene `defer` (bueno), pero jQuery core carga sin defer (bloqueante)
- No hay cache headers visibles (`Cache-Control`, `Expires`)
- No hay compresion GZIP/Brotli visible en headers
- Elementor lazy load de secciones implementado (parcial)
- Multiples fuentes externas: Poppins, Montserrat, Roboto, Roboto Slab, Raleway (5 familias = excesivo)
- Montserrat carga desde Google Fonts (externo), las demas estan localizadas
- No hay `preconnect` ni `preload` para recursos criticos
- Favicon en formato PNG (deberia ser ICO o SVG)

### Recomendado
- Instalar plugin de cache (LiteSpeed Cache, WP Rocket o W3 Total Cache)
- Habilitar GZIP/Brotli en servidor
- Reducir fuentes a maximo 2 familias
- Localizar Montserrat (como las demas) o eliminarla
- Agregar `preconnect` para dominios externos
- Minificar y combinar CSS/JS
- Eliminar CSS/JS de Royal Elementor Addons en paginas que no lo usan
- Implementar Critical CSS para above-the-fold

---

## 14. SSL / HTTPS -- Puntuacion: 70/100

### Estado Actual
- HTTPS activo y funcionando
- Canonical URLs usan HTTPS
- **NO hay header `Strict-Transport-Security`** (HSTS)
- Servidor: nginx/1.29.4
- Algunos assets cargan correctamente por HTTPS

### Recomendado
- Implementar HSTS header: `Strict-Transport-Security: max-age=31536000; includeSubDomains`
- Verificar que no haya mixed content (HTTP dentro de HTTPS)
- Ocultar version de nginx por seguridad

---

## 15. VELOCIDAD DE CARGA (INDICADORES) -- Puntuacion: 15/100

### Estado Actual
**Indicadores negativos detectados:**
- 35 CSS + 30 JS = **65 requests** solo de assets (sin contar imagenes)
- 5 familias tipograficas (Poppins, Montserrat, Roboto, Roboto Slab, Raleway)
- Imagenes 100% en PNG (pesado vs WebP)
- Header template duplicado (desktop + mobile) = HTML redundante
- Sin plugin de cache
- Sin CDN visible
- Sin compresion de servidor visible
- Royal Elementor Addons carga 7+ CSS de animaciones en TODAS las paginas
- WooCommerce carga scripts en paginas que no son de tienda

### Recomendado
- Implementar WP Rocket o LiteSpeed Cache
- Usar CDN (Cloudflare gratuito)
- Convertir imagenes a WebP
- Reducir fuentes a 2 maximo
- Cargar condicionalmente WooCommerce scripts
- Desactivar animaciones CSS de Royal Addons si no se usan
- Objetivo: < 3s de carga en movil

---

## PROBLEMAS CRITICOS ADICIONALES

### Paginas que NO deben estar indexadas (actualmente en sitemap)
| URL | Razon |
|-----|-------|
| `/carrito/` | Pagina de carrito |
| `/finalizar-compra/` | Checkout |
| `/mi-cuenta/` | Cuenta de usuario |
| `/cart-woo-auto-parts-v1/` | Carrito duplicado (tema demo) |
| `/checkout-woo-auto-parts-v1/` | Checkout duplicado (tema demo) |
| `/my-account-woo-auto-parts-v1/` | Cuenta duplicado (tema demo) |
| `/compare-woo-auto-parts-v1/` | Comparador del tema |
| `/wishlist-woo-auto-parts-v1/` | Lista de deseos del tema |
| `/wishsuite/` | Lista de deseos duplicada |
| `/our-staff/` | Pagina de 2017, contenido del tema demo |
| `/hogar/` | Pagina sin proposito claro |
| `/tienda-inicio/` | Tienda duplicada |
| `/alineadora-besser-gn-3/` | Pagina suelta (no producto) |
| `/producto/hoodie-with-logo/` | Producto demo de WooCommerce |
| 11 URLs `?wpr_templates=...` | Templates internos |
| 4 URLs `?wpr_mega_menu=...` | Mega menus internos |
| 4 URLs `/author/...` | Paginas de autor thin |
| 5 URLs `/color/...` | Atributos de producto |

### Contenido duplicado confirmado
| URL A | URL B | Accion |
|-------|-------|--------|
| `/contact/` | `/contacto/` | 301 contact -> contacto |
| `/about/` | `/quienes-somos/` | 301 about -> quienes-somos |
| `/shop-woo-auto-parts-v1/` | `/tienda/` | 301 shop-woo -> tienda |
| `/blog-woo-auto-parts-v1/` | `/blog/` | 301 blog-woo -> blog |
| `/catalogo/` | `/catalogo-2/` | Verificar y consolidar |

### Errores 406 detectados
Las siguientes URLs retornan Error 406 (bloqueadas por ModSecurity):
- `/shop-woo-auto-parts-v1/` 
- `/about/`
- `/our-staff/`
- `/producto/hoodie-with-logo/`

Esto indica que el WAF bloquea estas paginas pero siguen en el sitemap = crawl budget desperdiciado + errores en Google Search Console.

---

## ANALISIS DE ANALITICA

| Herramienta | Estado |
|-------------|--------|
| Google Analytics 4 | NO instalado |
| Google Tag Manager | NO instalado |
| Google Search Console | Desconocido (probablemente no configurado) |
| TikTok Pixel | Activo: `CHBPV33C77U2I5R8RC50` |
| Facebook Pixel | NO instalado (solo domain verification) |
| Microsoft Clarity | NO instalado |

**Sin GA4 ni GSC, es imposible medir trafico, conversiones ni detectar errores de indexacion.**

---

## RESUMEN DE PUNTUACIONES

| # | Elemento | Puntuacion | Prioridad |
|---|----------|-----------|-----------|
| 1 | Title Tags | 15/100 | ALTA |
| 2 | Meta Descriptions | 0/100 | CRITICA |
| 3 | Jerarquia H1-H6 | 15/100 | ALTA |
| 4 | Estructura URLs | 60/100 | MEDIA |
| 5 | Enlaces Internos | 20/100 | ALTA |
| 6 | Optimizacion Imagenes | 15/100 | ALTA |
| 7 | Responsividad Movil | 55/100 | MEDIA |
| 8 | Schema / Datos Estructurados | 0/100 | CRITICA |
| 9 | Sitemap | 20/100 | CRITICA |
| 10 | Robots.txt | 45/100 | MEDIA |
| 11 | Canonical Tags | 40/100 | MEDIA |
| 12 | Open Graph / Social | 5/100 | ALTA |
| 13 | Core Web Vitals | 20/100 | ALTA |
| 14 | SSL / HTTPS | 70/100 | BAJA |
| 15 | Velocidad de Carga | 15/100 | CRITICA |
| **PROMEDIO** | | **22/100** | |

---

## TOP 10 ACCIONES PRIORITARIAS

1. **Instalar Rank Math SEO** -- Resuelve: titles, meta descriptions, schema, OG tags, sitemap, noindex de paginas privadas
2. **Instalar plugin de cache** (WP Rocket / LiteSpeed Cache) -- Resuelve: velocidad, Core Web Vitals, compresion, minificacion
3. **Limpiar sitemap** -- Eliminar 35+ URLs que no deben indexarse
4. **Eliminar/redirigir paginas duplicadas y del tema demo** -- 15+ paginas a eliminar o redirigir
5. **Configurar GA4 + GTM + Google Search Console** -- Sin esto no hay medicion posible
6. **Corregir jerarquia de headings** -- Cambiar H2/H3 del template a divs, agregar H1 en todas las paginas
7. **Convertir imagenes a WebP** -- 234 productos x imagenes en PNG = mucho peso innecesario
8. **Subir imagenes reales** para productos con placeholder
9. **Implementar schema Product** en los 234 productos
10. **Actualizar robots.txt** con reglas para paginas privadas y spam
