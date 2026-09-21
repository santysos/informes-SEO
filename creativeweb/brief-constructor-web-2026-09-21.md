# Brief SEO ejecutable — creativeweb.com.ec

**Destinatario:** el agente (Claude) que construye/mantiene el sitio.
**Stack:** WordPress + Elementor + Yoast SEO.
**Origen:** revisión SEO de Creative Web (Search Console 12 meses + on-page en vivo), 2026-09-21.

Cada tarea trae: **objetivo**, **dónde**, **cómo**, **criterio de aceptación** (un check que
puedes correr para confirmar). Las tareas están ordenadas por prioridad. Donde dice
**[Contenido: Creative Web]**, el texto/imágenes los provee Creative Web; tú implementas la
estructura y el marcado.

> **Antes de tocar nada, lee «Trampas conocidas de este sitio» al final.** Son cosas que ya
> nos costaron tiempo (caché de Elementor, Yoast por REST, caché nginx de 10 min).

---

## 🔴 1. H1 con espacio faltante (varias páginas)

**Objetivo:** el texto del H1 se lee pegado porque falta un espacio antes de un `<span>`
estilizado. Código actual de ejemplo:

```html
<h1>páginas web que<span class="l2">salen en google</span></h1>
```

Se serializa como «páginas web **quesalen** en google».

**Dónde** (corregir el H1 de cada URL):

| URL | Debe decir |
|---|---|
| `/servicios/paginas-web/` | páginas web que **·** salen en google |
| `/servicios/correos-corporativos-empresariales/` | correo con el nombre **·** de tu empresa |
| `/servicios/hosting-web-ecuador/` | tu página, siempre **·** en línea |
| `/servicios/tiendas-online-ecuador/` | tiendas **·** en línea |
| `/servicios/seo-posicionamiento-web/` | posicionamiento **·** en google |
| `/proyectos/` | proyectos reales, **·** resultados medibles |

(El **·** marca dónde falta el espacio.)

**Cómo:** en el widget Heading de Elementor, agrega un espacio real antes del `<span class="l2">`
(o como primer carácter dentro del span). Mantén el `<span>` para no romper el salto de línea
visual. Tras editar, **regenera CSS de Elementor** (ver trampas).

**Criterio de aceptación:**
```bash
curl -s -A "Mozilla/5.0 Chrome/120" "https://www.creativeweb.com.ec/servicios/paginas-web/?v=$RANDOM" \
 | grep -oiE '<h1[^>]*>.*?</h1>' | head -1
# La 'que' y 'salen' deben quedar separadas por espacio (no 'quesalen').
```

---

## 🔴 2. Meta description vacía en `/proyectos/`

**Objetivo:** `/proyectos/` no tiene meta description.

**Cómo:** Yoast → campo «Meta description» de la página `/proyectos/`. Usar (152 car):

> Casos reales de Creative Web: páginas web, tiendas online y sistemas que dieron resultados medibles a empresas de Otavalo, Ibarra y todo el Ecuador.

**Criterio de aceptación:**
```bash
curl -s "https://www.creativeweb.com.ec/proyectos/?v=$RANDOM" | grep -oiE '<meta[^>]+name="description"[^>]*>'
# Debe devolver el meta con ~150 caracteres, no vacío.
```

---

## 🔴 3. Crear 5 casos de estudio en Proyectos

**Objetivo:** hoy solo existe `/proyectos/comercial-hidrobo/` y la sección tiene **0
impresiones orgánicas**. Faltan casos.

**Qué crear:** 5 páginas nuevas, misma plantilla que Comercial Hidrobo:

| Proyecto | URL objetivo |
|---|---|
| Quipuy | `/proyectos/quipuy/` |
| SRIFlow | `/proyectos/sriflow/` |
| Dimapar | `/proyectos/dimapar/` |
| Odontología Life | `/proyectos/odontologia-life/` |
| OKCars | `/proyectos/okcars/` |

**Estructura por página** (replicar la de comercial-hidrobo):
- Un solo H1, bien formado: nombre del cliente + resultado.
- Secciones H2: el reto → qué hicimos → resultados con números → servicio que lo resolvió.
- Enlace interno a la página de servicio relacionada (ej. tienda → `/servicios/tiendas-online-ecuador/`; facturación → `/servicios/quipuy-facturacion-electronica/`).
- Yoast: SEO title ≤ 60 car, meta 140-160 car.
- 800-1.200 palabras.
- Marcar como `Article` (ver tarea 7).

**[Contenido: Creative Web]** — te enviamos texto, números e imágenes por caso. Tú maquetas.

**Criterio de aceptación:**
```bash
for s in quipuy sriflow dimapar odontologia-life okcars; do
  curl -s -o /dev/null -w "%{http_code} $s\n" "https://www.creativeweb.com.ec/proyectos/$s/"
done   # las 5 deben dar 200
curl -s "https://www.creativeweb.com.ec/page-sitemap.xml" | grep -c "/proyectos/"  # >= 6
```

---

## 🔴 4. Enlazado interno de Proyectos

**Objetivo:** el listado `/proyectos/` no enlaza a ningún caso (el de Hidrobo está huérfano)
y el Inicio casi no apunta a Proyectos.

**Cómo:**
- En `/proyectos/`: cada tarjeta enlaza a su `/proyectos/{caso}/`.
- En cada caso: enlace de retorno a `/proyectos/`.
- En el Inicio: franja «Casos reales» con 3-4 enlaces a casos.

**Criterio de aceptación:**
```bash
curl -s "https://www.creativeweb.com.ec/proyectos/" | grep -oE 'href="[^"]*/proyectos/[a-z-]+/"' | sort -u   # >= 6
curl -s "https://www.creativeweb.com.ec/" | grep -oc 'href="[^"]*/proyectos/[a-z-]+/"'                       # >= 3
```

---

## 🔴 5. Quitar categorías del sitemap

**Objetivo:** las categorías están en `noindex` (correcto) pero **siguen en
`category-sitemap.xml`** → señal contradictoria (URLs noindex dentro del sitemap).

**Cómo:** Yoast → Ajustes → Categorías (Taxonomías) → «Mostrar las categorías en los
resultados de búsqueda» = **No**. No tocar el mu-plugin de noindex; esto lo complementa.

**Criterio de aceptación:**
```bash
curl -s -o /dev/null -w "%{http_code}\n" "https://www.creativeweb.com.ec/category-sitemap.xml"
# Debe dar 404 (o el sitemap ya no debe listarse en sitemap_index.xml).
```

---

## 🟠 6. Ampliar `correos-corporativos` y `paginas-web`

**Objetivo:** son las páginas con más impresiones y peor posición (correos: 5.071 imp,
pos 35; páginas web: pos 40) y están cortas (465-656 palabras).

**Cómo:** **[Contenido: Creative Web]** te pasamos contenido ampliado (proceso, qué incluye,
tabla de planes, FAQ). Maquétalo manteniendo el diseño; deja las FAQ como bloques Yoast FAQ
(alimentan la tarea 7).

**Criterio de aceptación:** cada página > ~1.100 palabras y con bloque de FAQ visible.

---

## 🟠 7. Schema `Service` + `FAQPage` en páginas de servicio

**Objetivo:** hoy las páginas de servicio solo emiten WebPage/Organization. Falta `Service` y,
donde haya preguntas, `FAQPage`.

**Cómo:** las FAQ, con bloques FAQ de Yoast (genera `FAQPage` solo). Para `Service`, inserta un
JSON-LD por página. Plantilla (ajustar `name`, `description`, `url` por página):

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Diseño de páginas web",
  "serviceType": "Diseño y desarrollo web",
  "provider": {
    "@type": "Organization",
    "name": "Creative Web",
    "url": "https://www.creativeweb.com.ec/"
  },
  "areaServed": { "@type": "Country", "name": "Ecuador" },
  "url": "https://www.creativeweb.com.ec/servicios/paginas-web/"
}
</script>
```

Insértalo por HTML widget o en el `<head>` de la plantilla de servicios.

**Criterio de aceptación:** el
[Rich Results Test](https://search.google.com/test/rich-results) detecta `Service` y
`FAQPage` sin errores en las páginas de servicio.

---

## 🟠 8. Schema `Article` en los casos de estudio

**Objetivo:** un caso marcado como artículo (fecha, autor, imagen) compite mejor que uno como
página simple.

**Cómo:** que las páginas de `/proyectos/{caso}/` sean entradas/artículos, o insertar JSON-LD.
Plantilla:

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Caso de estudio: {Cliente} — {resultado}",
  "author": { "@type": "Organization", "name": "Creative Web" },
  "publisher": {
    "@type": "Organization",
    "name": "Creative Web",
    "logo": { "@type": "ImageObject", "url": "URL_DEL_LOGO" }
  },
  "datePublished": "2026-09-21",
  "image": "URL_IMAGEN_DESTACADA",
  "mainEntityOfPage": "https://www.creativeweb.com.ec/proyectos/{caso}/"
}
</script>
```

**Criterio de aceptación:** el Rich Results Test detecta `Article` en cada caso.

---

## Trampas conocidas de este sitio (léelas antes de ejecutar)

1. **Elementor cachea.** Escribir por REST o editar sin guardar desde el editor **guarda en la
   base pero no se ve en el sitio**. Tras cualquier cambio en Elementor:
   **wp-admin → Elementor → Herramientas → Regenerar archivos y datos.**
2. **Elementor guarda los acentos escapados.** Para buscar/reemplazar en `_elementor_data`,
   usa `"Páginas Web"`, no el texto con tilde.
3. **Metas privados por REST (incluido `_elementor_data` y los de Yoast) se descartan** salvo
   que estén registrados por un mu-plugin (`register_post_meta` con `show_in_rest`). Para Yoast
   ya existe uno reutilizable en el repo: `creativeweb/fase-0/cw-yoast-rest.php`. **No** llames
   `do_action('wpseo_save_indexable', ...)` (provoca fatal).
4. **Caché nginx de ~10 min** (`cache-control: max-age=600`). Para verificar cambios al toque,
   añade `?v=$RANDOM` a la URL en tus checks (como en los criterios de aceptación de arriba).
5. **Cambios de URL → siempre 301** de la vieja a la nueva. No dejes 404 (ya hay Redirection
   instalado en varios sitios del grupo; confirmar en este).
6. **No toques** el mu-plugin que pone en noindex categorías/tags/autor/fecha: ya funciona
   (fase 3). La tarea 5 es solo el ajuste de sitemap en Yoast.

---

## Resumen

| # | Tarea | Prioridad | Texto |
|---|---|---|---|
| 1 | Espacio en los H1 | 🔴 | — |
| 2 | Meta description `/proyectos/` | 🔴 | incluido |
| 3 | 5 casos de estudio | 🔴 | Creative Web |
| 4 | Enlazado Proyectos ↔ casos ↔ Inicio | 🔴 | — |
| 5 | Categorías fuera del sitemap | 🔴 | — |
| 6 | Ampliar correos y páginas-web | 🟠 | Creative Web |
| 7 | Schema Service + FAQPage | 🟠 | plantilla incluida |
| 8 | Schema Article en casos | 🟠 | plantilla incluida |

Textos e imágenes de 3 y 6 se envían al confirmar arranque.
