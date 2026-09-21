# Revisión SEO — creativeweb.com.ec (Inicio, Servicios, Proyectos)

Fecha: 2026-09-21. Fuentes: Search Console (`sc-domain:creativeweb.com.ec`, 12 meses) +
inspección on-page en vivo de cada página.

**Contexto de la línea base (12 meses):** 1.147.909 impresiones · 1.324 clics · CTR 0,11 % ·
355 páginas con tráfico. El grueso de impresiones sigue viniendo del blog (post «.com»), no de
las páginas que venden. Lo que sigue es qué falta en las tres secciones que pediste.

---

## 1. INICIO (Home)

**Rendimiento:** 4.958 imp · 99 clics · **posición 30** · 659 palabras. Es la página con más
clics del sitio, pero rankea en la página 3.

Lo que está bien: título (50c) y meta (157c) correctos y con intención local; H1 con frase
clara; schema completo (Organization, WebSite, WebPage, SearchAction, BreadcrumbList).

**Qué falta:**
- **Autoridad/CTR, no on-page.** El home está bien armado; su problema es que compite por
  términos genéricos («diseño web ecuador») en posición 30. Sube con enlaces internos desde
  contenido y con casos de proyecto que refuercen el tema (ver sección 3), no reescribiendo el
  home.
- **Enlazado interno débil hacia lo que vende:** el home enlaza solo 2 veces a `/proyectos/`.
  Conviene una franja de «casos reales» con 3-4 enlaces a casos de estudio (cuando existan).
- **Prueba social medible:** no hay schema de reseñas/valoración. Si hay testimonios reales,
  marcarlos con `Review`/`AggregateRating` habilita estrellas en Google y sube el CTR.

---

## 2. SERVICIOS

**Rendimiento por página (12 meses):**

| Página | Imp. | Clics | Pos. | Palabras |
|---|---|---|---|---|
| correos-corporativos | 5.071 | 32 | **35** | 656 |
| venta-dominios | 781 | 0 | 25 | — |
| paginas-web | 648 | 2 | **40** | 465 |
| hosting-web | 332 | 2 | 17 | 554 |
| motrix | 29 | 0 | 8 | — |
| seo-posicionamiento | ~0 | — | — | 681 |
| tiendas-online, quipuy, sriflow, dentilab, boxpli, probador, facturación | **~0 imp** | — | — | 465 y menos |

Títulos y metas están bien trabajados (longitud correcta, intención local, sin relleno). Los
problemas son otros:

**🔴 Alta prioridad**
- **`correos-corporativos` es la mayor oportunidad del sitio:** 5.071 impresiones en posición
  35. Título y contenido están bien, pero la página no tiene fuerza para subir. Palancas:
  ampliar a 1.100-1.300 palabras con FAQ real, enlazar hacia ella desde el home y desde posts
  del blog de correo, y añadir schema `Service` + `FAQPage`.
- **`paginas-web` rankea en posición 40 con 465 palabras** para el término núcleo del negocio.
  Es demasiado delgada para competir. Necesita profundidad (proceso, qué incluye, tabla de
  planes, ejemplos con enlace a casos), FAQ y schema `Service`.
- **Bug de H1 sin espacio (varias páginas).** El código es
  `páginas web que<span class="l2">salen en google</span>` — falta el espacio antes del span,
  así que el H1 se lee «páginas web **quesalen** en google». Se repite en correos
  («nombrede tu empresa»), hosting («siempreen línea»), tiendas («tiendasen línea»), SEO
  («posicionamientoen google») y el listado de proyectos. Arreglo trivial: un espacio antes
  del span o dentro de él.

**🟠 Media prioridad**
- **Páginas de producto invisibles (0 impresiones):** tiendas-online, quipuy, sriflow,
  dentilab, boxpli, probador-virtual, facturación. Hoy no captan ninguna búsqueda. Definir
  para cada una: ¿se quiere que rankee? Si sí, targetear una consulta real (ej. «tienda online
  ecuador», «software clínica dental») con contenido y FAQ. Si son solo fichas de venta, está
  bien que no rankeen, pero entonces deben captar tráfico por enlaces internos desde blog/home.
- **Falta schema `Service` y `FAQPage` en todas las páginas de servicio.** Hoy solo tienen
  WebPage/Organization. `Service` ayuda a Google a entender la oferta; `FAQPage` puede ganar
  espacio extra en el resultado (las páginas ya tienen H2 que se pueden convertir en FAQ).

---

## 3. PROYECTOS — el vacío más grande

**Rendimiento: 0 impresiones orgánicas.** Ni `/proyectos/` ni el único caso
(`/proyectos/comercial-hidrobo/`) reciben tráfico. La sección es invisible para Google.

**Qué falta:**
- **Solo existe 1 caso de estudio** (Comercial Hidrobo), cuando la agencia tiene 60+ sitios y
  productos con nombre propio (Quipuy, SRIFlow, Dimapar, Motrix, Dentilab, OKCars, Odontología
  Life…). Cada caso es una página que puede rankear por «[sector] página web», por el nombre
  del cliente y, sobre todo, construir autoridad temática y enlazar a las páginas de servicio.
  **Esta es la acción de mayor retorno de toda la revisión.**
- **`/proyectos/` tiene la meta description VACÍA.** Miss directo.
- **El listado no enlaza a ninguna página de caso** (cero enlaces con patrón `/proyectos/x/`):
  el caso de Comercial Hidrobo está huérfano del listado. Sin enlaces internos, Google apenas
  lo descubre.
- **El caso existente solo tiene schema WebPage,** no `Article`/`CreativeWork`. Un caso de
  estudio marcado como artículo con fecha, autor e imagen compite mejor.
- Contenido delgado: el listado tiene 443 palabras y el caso 493. Un buen caso de estudio
  rinde con 800-1.200 palabras (problema → qué hicimos → resultados con números → enlace al
  servicio que lo resolvió).

**Plan sugerido:** crear 5-6 casos de estudio partiendo de los proyectos que ya tenemos
documentados (Comercial Hidrobo ya está; siguen Quipuy, SRIFlow, Dimapar, Odontología Life,
OKCars), cada uno enlazando a 1-2 páginas de servicio. Eso alimenta a la vez Proyectos,
Servicios (enlaces internos) e Inicio (franja de casos).

---

## 4. Técnico transversal

- **Archivos noindex: OK.** Las categorías y tags salen `noindex, follow` y el archivo de
  autor da 404. La fase 3 quedó aplicada. ✅
- **Pero el `category-sitemap.xml` sigue listando las 10 categorías** aunque estén noindex.
  Es una señal contradictoria (enviar en el sitemap URLs marcadas noindex). Excluir las
  categorías del sitemap de Yoast o desactivar ese sitemap.
- **URL larga de hosting → 301 correcto** a `/servicios/hosting-web-ecuador/`. ✅
- **Enlazado interno pobre hacia Proyectos** (home 2 enlaces; listado→casos 0). Reforzar.
- **CTR del sitio 0,11 %:** el post «.com» sigue inflando impresiones sin traer clics. No es
  un problema de estas tres secciones, pero conviene recordarlo al medir la mejora.
- **Pendiente previo aún abierto:** las 32 URLs «sin tema dominante» de la fase 3.

---

## Resumen priorizado (qué hacer primero)

1. **Crear 5-6 casos de estudio en Proyectos** (Quipuy, SRIFlow, Dimapar, Odontología Life,
   OKCars) + meta description del listado + enlaces internos listado↔casos↔servicios. 🔴
2. **Enriquecer `correos-corporativos` y `paginas-web`** a 1.100-1.300 palabras con FAQ y
   schema `Service`+`FAQPage`. Son las de más impresiones/posición mejorable. 🔴
3. **Arreglar el bug de espacio en los H1** de todas las páginas de servicio y proyectos. 🔴
4. Definir qué páginas de producto deben rankear y targetear su consulta; el resto, nutrir por
   enlaces internos. 🟠
5. Añadir schema `Service`/`FAQPage` al resto de servicios y `Article` al caso de estudio. 🟠
6. Excluir categorías noindex del sitemap. 🟡
