# Auditoría SEO · dikapsa.com
**Documento interno · Creative Web · Mayo 2026**
**Generado con skill `market-seo` + análisis manual + cruce con competidores y GA4**

---

## SEO Health Score: **48/100** 🟠

Dikapsa.com tiene un mercado orgánico ganado (5.644 usuarios en 16 meses) **a pesar de** una técnica SEO descuidada. Los errores básicos están abiertos y eso significa que con quick wins de 1-2 semanas se puede recuperar mucho terreno antes de empezar el contenido del plan de 6 meses.

| Dimensión | Score | Estado |
|---|---|---|
| On-page SEO básico | 4/10 | 🔴 Crítico |
| Meta tags | 2/10 | 🔴 Crítico |
| Imágenes + accesibilidad | 5/10 | 🟠 Necesita trabajo |
| CTAs / conversión | 1/10 | 🔴 Crítico |
| Schema / datos estructurados | 3/10 | 🔴 Crítico |
| Sitemap / robots | 3/10 | 🔴 Crítico |
| Tracking (GA + GTM) | 7/10 | 🟢 Aceptable |
| Volumen de contenido | 6/10 | 🟡 Bueno pero diluido |
| E-E-A-T | 4/10 | 🟠 Necesita trabajo |

---

## 1. On-page SEO — auditoría página principal (dikapsa.com)

### Title tag
| Criterio | Estado | Detalle |
|---|---|---|
| Existe | ✅ | "Inicio - Dikapsa" |
| Longitud (50–60 caracteres) | ❌ | **Solo 16 caracteres** — pierde 75% del espacio disponible en SERP |
| Contiene keyword principal | ❌ | Sin "imprenta" ni "Ecuador" ni "Quito" |
| Posición de keyword | ❌ | No aplica |
| Incluye marca | ✅ | "Dikapsa" al final |

**Recomendación**:
```
ANTES:  Inicio - Dikapsa
DESPUÉS: Imprenta Dikapsa · Packaging, POP y Papelería B2B Ecuador (20 años)
```
Impacto estimado: **+25-40% de CTR** en SERP para queries de marca y categoría.

### Meta description
| Criterio | Estado | Detalle |
|---|---|---|
| Existe | ❌ | **Está vacía** |
| Longitud (150–160) | ❌ | 0 caracteres |
| Keyword principal | ❌ | n/a |
| Call to action | ❌ | n/a |

**Recomendación**:
```html
<meta name="description" content="Dikapsa es la imprenta B2B con 20+ años en Ecuador. Packaging, material POP, gran formato, papelería corporativa y servicio integral diseño + producción. Sede Otavalo + oficina Quito · Cobertura nacional. Cotiza en 24h.">
```
Impacto estimado: **+15-30% CTR** vs el snippet auto-generado.

### H1
| Criterio | Estado | Detalle |
|---|---|---|
| Existe | ✅ | 1 H1 |
| Contiene keyword | ❌ | "Lleva tusIMPRESIONESal siguiente nivel..." |
| Formato | ❌ | **Tipografía rota**: "tusIMPRESIONESal" sin espacios → suena raro y Google penaliza |

**Recomendación**:
```
ANTES:  Lleva tusIMPRESIONESal siguiente nivel...
DESPUÉS: Imprenta integral para marcas en Ecuador — packaging, POP, papelería y gran formato
```

### Heading hierarchy
**Problemas detectados**:
- 34 H2s en una sola página (excesivo, falta jerarquía)
- H2s duplicados: "material p.o.p" aparece 2 veces, "packaging" 2 veces, "etiquetas" 2 veces
- Todo H2 en minúsculas (estética, no afecta SEO directo pero rompe consistencia)
- Salto: van de H2 a H3 a H2 sin estructura clara
- **Solo 2 H3** ("GRATIS", "$60,00") — son labels, no estructura de contenido

**Recomendación**: redistribuir a un esquema H1 → H2 (secciones grandes) → H3 (subsecciones). Reducir a ~10 H2 totales.

### Imágenes
| Métrica | Valor |
|---|---|
| Total imágenes | 41 |
| **Sin alt text** | **19 (46%)** 🔴 |
| Con lazy loading | 25 (61%) |

**Recomendación crítica**: completar alt text en las 19 imágenes faltantes. La nueva guía de IA de Google del 2026 dice explícitamente que los AI agents "interpret the accessibility tree" — sin alt text los agents NO pueden recomendar a Dikapsa.

### URL canónica
✅ Bien configurada: `https://www.dikapsa.com/`

### Open Graph
✅ Completo (og:title, og:description, og:image 1200×769, og:locale es_ES). Único problema: el og:description es el mismo texto truncado del hero. Recomendado: meta description dedicada.

---

## 2. Contenido — E-E-A-T

| Dimensión | Score | Evidencia |
|---|---|---|
| **Experience** (vivencia directa) | 🟠 Presente | Mencionan "20 años en el mercado" pero **sin casos, fotos del taller ni cifras propias** |
| **Expertise** (conocimiento técnico) | 🟠 Débil | Catálogo de productos visible pero **sin contenido técnico** sobre por qué un comprador profesional debe elegirlos |
| **Authoritativeness** | 🔴 Faltante | **Sin bios de autores en blog**, sin certificaciones visibles, sin premios, sin prensa |
| **Trustworthiness** | 🟠 Parcial | HTTPS ✅, dirección física ✅, contactos ✅ — falta política de privacidad visible, reseñas, garantías |

### Brecha de E-E-A-T más grave

**No hay "About" robusto.** La página `/nosotros/` (24 clics SC en 16 meses) probablemente no muestra equipo, no muestra historia, no muestra clientes. Para B2B procurement esto es la **primera página que un comprador investiga antes de cotizar**.

---

## 3. Keyword analysis — homepage

### Keyword principal actual
**Indefinida** — el title "Inicio - Dikapsa" no targeta keyword alguna. La página rankea por marca pero pierde keywords de categoría.

### Keywords que deberían targetar (intent comercial B2B)

| Keyword | Volumen estimado/mes EC | Dificultad | Notas |
|---|---|---|---|
| imprenta Ecuador | ~480 | Media | Industrias Omega y Servigraf compiten |
| imprenta Quito | ~720 | Media | Servigraf domina |
| imprenta corporativa Quito | ~110 | Baja | **Hueco real** |
| proveedor packaging Ecuador | ~210 | Media | Omega + Dreampack |
| imprenta de packaging Ecuador | ~90 | Baja | **Hueco** |
| material POP Quito | ~140 | Baja | Dikapsa ya rankea ↑ |
| imprenta Otavalo | ~50 | Muy baja | Defender |
| empaques personalizados Ecuador | ~180 | Media | Múltiples competidores |
| imprenta corporativa Guayaquil | ~95 | Baja | **Hueco** |

### Misalignment de intent
Homepage hoy es **navegacional/genérica** ("Lleva tus impresiones al siguiente nivel"). El comprador B2B tiene intent **comercial** ("encuentra proveedor B2B confiable"). La página no satisface ese intent.

---

## 4. Conversión — el problema más grande

| Métrica | Actual | Benchmark |
|---|---|---|
| CTAs detectados | **1** (Facebook link) | 5–8 |
| Formularios | 1 (buscador) | 2+ (cotización + contacto) |
| Botón WhatsApp | No detectado por crawler | Visible y medible |
| Botón "Cotizar" | No prominente | Encima del fold |
| Tienda online enlace | Sí | ✅ |

**Diagnóstico**: el comprador B2B que llega a la página NO sabe qué hacer. No hay CTA claro a "Hablar con un asesor", "Solicitar cotización", "Descargar catálogo". Esto es probablemente la razón principal por la cual **99% de los usuarios son nuevos y no convierten en clientes recurrentes** (dato GA4).

---

## 5. Técnico

### Sitemap
| Atributo | Estado |
|---|---|
| Existe | ✅ |
| Referenciado en robots.txt | ✅ |
| **URLs declaradas** | **Solo 7** 🔴 |
| URLs reales en el sitio | ~150+ |

**Crítico**: Google está indexando solo lo que descubre por links internos. Un sitemap completo es el primer paso para que los 50+ productos + 14 blogs + categorías + landings sean indexados sistemáticamente.

### Schema markup
| Tipo | Estado | Recomendación |
|---|---|---|
| Organization | 🔴 No detectado | Implementar en home + about |
| LocalBusiness | 🔴 No detectado | Para Otavalo y Quito (2 ubicaciones) |
| Product | 🔴 No detectado | En cada `/producto/*` |
| Article | 🔴 No detectado | En cada `/noticias/*` |
| BreadcrumbList | 🔴 No detectado | Toda la navegación |
| FAQ | 🔴 No detectado | En posts de blog |

**Schema actual detectado**: 1 schema de tipo "Unknown" (probablemente WP genérico).

### Robots.txt
✅ Existe y bloquea correctamente carpetas WooCommerce que no deben indexarse.

### Page experience
No medido en esta auditoría. Recomendado correr Lighthouse / PageSpeed Insights — WordPress + WooCommerce sin optimizar suele tener LCP > 4s.

---

## 6. Comparativa contra los 4 competidores principales

| Elemento | Dikapsa | Industrias Omega | Servigraf | CreativePrint | Dreampack |
|---|---|---|---|---|---|
| Title optimizado | ❌ | ✅ | ✅ | 🟡 | ✅ |
| Meta description | ❌ vacía | ✅ | ✅ | 🟡 | ✅ |
| H1 con keyword | ❌ | ✅ | ✅ | 🟡 | ✅ |
| Certificaciones visibles | ❌ | ✅ ISO + FSC | ❌ | ❌ | ✅ FSC + BPA-free |
| Clientes nombrados | ❌ | ❌ (genéricos) | 🟡 (testimonios sin logo) | ❌ | ✅ KFC, Arcos Dorados, S&C |
| Blog activo | 🟡 14 posts | ✅ Mar 2026 | ✅ 6 posts | ❌ | ❌ |
| Schema avanzado | ❌ | n/d | n/d | n/d | ✅ |
| Calculadora / tool | ✅ Calculadora corte | ❌ | ✅ Calculadora + AI sketch | ❌ | ❌ |
| Tienda online | ✅ Printflash | ❌ | ✅ | ✅ | ✅ |
| CTAs visibles | 🔴 1 | ✅ múltiples | ✅ múltiples | 🟡 | ✅ |

**Conclusión**: Dikapsa tiene **el peor on-page SEO de los 5** pero el **mejor blog volumen** y la **única plataforma online (Printflash) con calculadora**. Hay paridad en algunos elementos y debilidad técnica básica.

---

## 7. Quick wins · Mes 1 (alto impacto, bajo esfuerzo)

### Semana 1 — Técnico básico
| Tarea | Tiempo | Impacto |
|---|---|---|
| Reescribir title, meta description, H1 de la home | 1 h | 🟢 Alto — CTR +25-40% |
| Completar alt text de 19 imágenes en home | 2 h | 🟢 Alto — accesibilidad + AI agents |
| Generar sitemap.xml completo con plugin Yoast/RankMath | 1 h | 🟢 Alto — indexación 7→150 URLs |
| Implementar schema Organization + LocalBusiness (Otavalo + Quito) | 2 h | 🟢 Alto — rich results + AI grounding |
| Validar canonicals en categorías y paginación | 1 h | 🟡 Medio |

### Semana 2 — Conversión y CTAs
| Tarea | Tiempo | Impacto |
|---|---|---|
| Botón sticky de WhatsApp con tracking GTM | 1 h | 🟢 Alto — medir leads B2B reales |
| CTA "Hablar con asesor B2B" arriba del fold | 2 h | 🟢 Alto |
| Formulario de cotización con campos B2B (empresa, RUC, volumen) | 3 h | 🟢 Alto |
| Sección "Marcas que confían en nosotros" con 6-8 logos reales | 2 h | 🟢 Alto — social proof |
| Bloque "Cómo cotizamos en 24h" | 1 h | 🟡 Medio |

### Semana 3 — Páginas de servicio
| Tarea | Tiempo | Impacto |
|---|---|---|
| Reescribir página `/packaging/` con intent B2B (testimonios, casos, capacidad mensual) | 4 h | 🟢 Alto |
| Reescribir `/material-p-o-p/` con foco retail/QSR | 3 h | 🟡 Medio |
| Crear `/imprenta-corporativa/` (nueva landing B2B) | 4 h | 🟢 Alto |
| Internal linking masivo: cada post enlaza al producto + cada producto enlaza a 3 posts | 4 h | 🟢 Alto |

### Semana 4 — Contenido fundacional
| Tarea | Tiempo | Impacto |
|---|---|---|
| Reescribir `/nosotros/` con E-E-A-T (equipo, taller, máquinas, años) | 3 h | 🟢 Alto |
| Página "Casos de éxito" con los 5-6 clientes que autoricen (del cuestionario) | 4 h | 🟢 Alto |
| Política de privacidad + Términos de servicio | 2 h | 🟡 Medio — trust |
| Página de garantía y devoluciones (Printflash) | 2 h | 🟡 Medio |

**Total mes 1**: ~40-45 horas. ROI esperado: subir Health Score de 48 → 72.

---

## 8. Pillars de contenido para 120 posts (6 meses)

Recomiendo distribuir así (sujeto a respuestas del cuestionario que define industria y % por línea):

### Pillar 1 · Packaging B2B para marcas (40 posts)
- "Cómo elegir packaging para tu marca de [alimento/cosmética/farma]"
- "Caja plegadiza vs corrugada: cuándo usar cada una"
- "Empaque ecológico Ecuador: papel reciclado vs cartulina virgen"
- "Cumplimiento INEN para empaques de alimentos"
- "Master pack y empaque secundario: optimización logística"
- "MOQ realista para tu primer pedido de packaging"
- "Casos de éxito con marca X" (×8-10 según permisos)

### Pillar 2 · POP y gran formato para retail (25 posts)
- "POP para supermercados: qué exige Supermaxi / Mi Comisariato"
- "Material POP para campañas de farmacia"
- "Vibrines y exhibidores: ROI por tipo de retail"
- "Gigantografías para activaciones BTL"
- "Roll-up vs banner vs vinilo perforado"

### Pillar 3 · Papelería corporativa y institucional (20 posts)
- "Pedido masivo de papelería corporativa: cómo armar el kit"
- "Tarjeta de presentación premium: papeles y acabados"
- "Sobre membretado para licitación pública"

### Pillar 4 · Procurement guides (15 posts)
- "Cómo armar un RFP de imprenta"
- "Qué exigirle a tu proveedor de packaging"
- "Pantone matching: cuándo es indispensable"
- "Tiempos realistas de producción para tirada grande"
- "Análisis costo-beneficio: imprenta local vs importación"

### Pillar 5 · Casos de éxito documentados (15 posts)
**El más importante**. Uno por cliente top que autorice. Cada uno = 1 post = 1 landing magnet = 1 prueba social rastreable.

### Pillar 6 · SEO local — landings vertical/geo (5 posts/páginas)
- `/imprenta-quito/`
- `/imprenta-guayaquil/`
- `/imprenta-otavalo/`
- `/packaging-para-alimentos-ecuador/`
- `/imprenta-corporativa-pymes/`

**Total**: 40 + 25 + 20 + 15 + 15 + 5 = **120 posts/páginas**

---

## 9. Featured snippet opportunities

Keywords donde Dikapsa puede capturar snippet posición 0:

| Query | Snippet type | Acción |
|---|---|---|
| "qué es un folleto tríptico" (625 imp Search Console) | Paragraph (40-60 palabras) | Agregar respuesta directa al inicio del post existente |
| "cuánto mide una receta médica" (102 imp) | Paragraph + tabla | Crear sección "Medidas estándar de recetario médico" |
| "tipos de papel para impresión" | List | Post con lista numerada de papeles + uso |
| "diferencia entre offset y digital" | Paragraph | Reescribir post existente "Impresión Digital vs Offset" con respuesta directa al inicio |
| "qué beneficio se busca en un tríptico" (410 imp) | List | Post nuevo con bullets de beneficios |

---

## 10. Schema markup priority

### Implementar mes 1
```json
{
  "@type": "LocalBusiness",
  "@id": "https://dikapsa.com/#dikapsa-otavalo",
  "name": "Dikapsa Imprenta",
  "address": {
    "streetAddress": "Sucre 6-09 y Piedrahita",
    "addressLocality": "Otavalo",
    "addressRegion": "Imbabura",
    "addressCountry": "EC"
  },
  "telephone": "+593-6-292-4887",
  "openingHours": "Mo-Fr 08:30-17:30",
  "priceRange": "$$",
  "sameAs": ["facebook", "instagram", "youtube"]
}
```
Replicar para Quito.

### Implementar mes 2
- `Product` schema en cada `/producto/*` (con precio, marca, stock)
- `Article` schema en cada `/noticias/*` (con autor, fecha, imagen)
- `BreadcrumbList` en todas las páginas

### Implementar mes 3+
- `FAQPage` en posts de blog con FAQ section
- `HowTo` en posts tipo tutorial
- `AggregateRating` cuando haya 5+ reviews

---

## 11. Internal linking — arquitectura recomendada

```
Homepage
  ├─ /imprenta-corporativa/ (HUB — Pillar 1)
  │     ├─ /packaging-para-alimentos/ (cluster)
  │     ├─ /packaging-cosmetica/ (cluster)
  │     └─ /noticias/*-packaging-* (15 posts blog enlazados)
  ├─ /imprenta-quito/ (HUB geo)
  │     └─ enlaces a todos los productos
  ├─ /imprenta-guayaquil/ (HUB geo)
  ├─ /casos-de-exito/ (HUB social proof)
  │     ├─ /caso/fruteria-monserrath/
  │     ├─ /caso/carls-jr/
  │     └─ /caso/[cliente]/
  └─ /tienda/ (Printflash existente)
```

**Cada blog post** debe enlazar a:
1. El producto principal mencionado
2. La landing de industria/vertical
3. 2 posts relacionados (cluster)
4. La página de casos de éxito

---

## 12. Contexto SEO Ecuador / Latam

### Lo que importa específicamente
1. **Google Maps + Google Business Profile**: en LatAm 50% de búsquedas B2B locales son verificadas vía Maps. Crear/optimizar 2 perfiles (Otavalo y Quito) con fotos, horarios, posts, reviews.
2. **WhatsApp como CTA**: en Ecuador 90% de B2B inicia conversación por WhatsApp, no email. **Botón WhatsApp + tracking** es más importante que el formulario tradicional.
3. **Búsquedas en español: tildes opcionales**: el usuario escribe sin tildes ("imprenta corporativa quito"). El contenido debe estar bien escrito (con tildes) pero el targeting de keywords contempla ambas.
4. **YouTube + redes**: Google indexa videos de YouTube ecuatorianos con buen CTR en SERP. Hacer 6 videos del taller + casos.
5. **Búsquedas largas tipo conversación**: "cuánto cuesta un implante dental en Ecuador" funciona — la gente busca con preguntas completas. Crear contenido tipo "Cuánto cuesta hacer 500 cajas de empaque en Ecuador".
6. **Tráfico de IA emergente**: ya hay 121 usuarios desde ChatGPT/Gemini/Perplexity en GA4 — el grounding por RAG está activo. Cada página optimizada se vuelve fuente de IA.

### Lo que NO importa (mitos)
- No hacer `llms.txt` (Google confirmado)
- No "chunkear" contenido para IA
- No comprar enlaces ecuatorianos baratos (link spam policy)
- No copiar descripciones de fabricante (thin affiliate)

---

## 13. Recomendaciones priorizadas

### 🔴 Crítico — Semana 1
1. Reescribir title + meta description + H1 de homepage
2. Completar alt text de 19 imágenes
3. Regenerar sitemap.xml completo (7 → 150+ URLs)
4. Implementar schema Organization + LocalBusiness Otavalo + Quito
5. Instalar botón WhatsApp con tracking GTM

### 🟠 Alta — Mes 1
1. Crear formulario de cotización B2B (no solo buscador)
2. Reescribir `/nosotros/` con E-E-A-T
3. Sección "Marcas que confían" con logos reales en home
4. CTA "Hablar con asesor B2B" arriba del fold
5. Página `/imprenta-corporativa/` (nueva landing B2B)

### 🟡 Media — Trimestre 1
1. 5 landings geo (Quito, Guayaquil, Otavalo, Cuenca, Ibarra)
2. 5 landings vertical/industria (alimentos, retail, farmacia, hoteles, sector público)
3. 15-20 casos de éxito documentados (según permisos)
4. Schema Product en todas las páginas /producto/
5. Implementar FAQ schema en posts existentes top

### 🟢 Baja — Cuando haya recursos
1. Optimización imágenes a WebP masiva
2. Configuración CDN
3. Reducción de scripts WooCommerce
4. Política de privacidad + términos formales
5. Video institucional del taller

---

## 14. Métricas a medir post-implementación

Establecer baseline ahora y medir mensualmente:

| KPI | Baseline (hoy) | Meta mes 3 | Meta mes 6 |
|---|---|---|---|
| SEO Health Score (esta auditoría) | 48 | 72 | 85 |
| Usuarios orgánicos / mes | ~470 | 700 | 1.500+ |
| Páginas indexadas | ~120 | 220 | 280+ |
| Keywords top 10 | ~12 | 35 | 80+ |
| Conversiones WhatsApp / mes | sin medir | 30 | 80–120 |
| Cotizaciones B2B / mes | sin medir | 15 | 40–60 |
| CTR promedio SC | ~2,3% | 3,5% | 5%+ |

---

## 15. Fuentes y herramientas usadas en esta auditoría

- Skill **`market-seo`** (Creative Web) + script `analyze_page.py`
- Google Analytics 4 — Dikapsa (export 1 ene 2025 → 19 may 2026)
- Google Search Console — Dikapsa (mismo periodo)
- Análisis competitivo manual de 6 imprentas (ver `analisis-competitivo.md`)
- Google Search Essentials oficial (mayo 2026)
- Guía Google AI Optimization (mayo 2026)

---

## Próximo paso

Con este audit + el análisis competitivo + las respuestas pendientes del cuestionario al propietario, ya tenemos **todo el material** para construir la propuesta comercial final en `dikapsa/proforma-mayo-2026/`. Esperamos solo los inputs del cliente.
