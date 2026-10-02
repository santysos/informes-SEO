# Creative Web 2026 — construcción Elementor

Nueva web de **creativeweb.com.ec** (diseño F aprobado, disposición Nixer) construida
en Elementor vía EMCP. **CUTOVER EJECUTADO el 17-sep-2026** (confirmado por el usuario):
portada = 3643 (`page_on_front`), las 10 internas volcadas sobre sus páginas reales
(mismas URLs), menú overlay con URLs finales, home vieja 184 en borrador con 301 de su
slug → `/` (Redirection id 65), páginas *-2026 en borrador (respaldo). Verificado
anónimo: `/`, `/servicios/`, `/contactanos/`, `/quienes-somos/`, `/servicios/seo-…/`
sirven el diseño nuevo; texto SEO intacto. Respaldos previos en `backups-cutover/`
(export Elementor + REST de cada página real, restaurables con import-template).

## Acceso / stack

- WP: `santysos@hotmail.com` · App Password en `informes-SEO/.env` (`CREATIVEWEB_WP_*`)
- EMCP Tools 3.15 en `/wp-json/mcp/emcp-tools-server` — cliente `emcp.py` + `builders.py`
- Elementor 4.2.4 + Pro 4.2.3 · Hello child · WHMpress (WHMCS) · Yoast · WP Super Cache
- Tienda WHMCS: `ventas.creativeweb.com.ec` (planes: /store/hosting-web/{inicial,webmaster,pymes,pro})

## Estado

| Pieza | ID | Nota |
|---|---|---|
| Kit | 1873 | `custom_css` = `cw-kit.css` (estaba vacío; TODO con ámbito `.cw-2026`) |
| Home nueva | **3643** | slug `inicio-2026`, **status private**, plantilla `elementor_canvas` |
| Mockup aprobado | — | `../borrador-2026-09/home-f.html` (artifact v9) |
| Logo oficial blanco | **3726** | `cw-logo-blanco-2026.png` (en headers/footers de las 11 páginas) |
| Favicon | **3727** | ya asignado como `site_icon` del sitio (cambio vivo, aprobado) |

**Internas 2026 (privadas, canvas, texto SEO intacto en cw-prosa):**
seo 3656 · tiendas 3663 · fact-woo 3670 · motrix 3677 · probador 3684 · quipuy 3691 ·
dentilab 3698 · contactanos 3705 (form → ventas@) · quienes-somos 3712 · servicios(índice) 3719.
Construidas con `build_internas.py` (importa header/footer/JS de `build_home.py`).

La página 3643 replica el mockup: header fijo propio, hero partido con wordmark outline
e informe SEO, portafolio (CH/Quipuy/Valencia/Reina), statement con revelado por palabra,
marquesina, servicios y hosting como filas, **buscador de dominios WHMpress real**
(`[whmpress_domain_search_ajax]`), productos, CTA y footer propios. JS de reveals
inyectado con `add-custom-js` en el último contenedor.

## Reglas de seguridad (sitio vivo)

1. **NO cambiar los colores globales del kit** (#6EC1E4 etc.) — las páginas viejas los usan.
   Por eso `cw-kit.css` pisa colores con `!important` bajo `.cw-2026`.
2. Todo CSS nuevo va dentro del ámbito `.cw-2026`; el `@import` de fuentes es global (inofensivo).
3. La home vieja (id 184) NO se toca hasta el cutover.

## Trampas locales

- Página creada por REST necesita meta `_elementor_edit_mode: builder` +
  `_elementor_template_type: wp-page`, si no renderiza sin Elementor.
- `template: elementor_canvas` (vía REST) quita header/footer del tema.
- `import-template` pierde `_element_id` de contenedores → los anclajes (#dominios,
  #hosting, #contacto) sí quedaron (van en settings), verificar tras re-imports.
- El primario viejo del kit pinta headings — cada color de heading nuevo necesita
  `!important` (bloque "correcciones de especificidad" del css).
- Caché: WP Super Cache — leer con `?cb=` y `emcp.flush_css()` tras cambios.

## Actualizaciones post-cutover (17-sep tarde)

- Datos corregidos en todo: WhatsApp **+593 99 917 4980** (`wa.me/593999174980`),
  email **info@creativeweb.com.ec**, ciudad **Otavalo** (no Ibarra).
- Hero v2: header ancho completo, wordmark centrado (creative + WEB gigante con
  gradiente animado), «sigue bajando» clicable con flecha en círculo, franja de datos
  con barras de color. `shared_2026.py` = piezas post-cutover (usar SIEMPRE para
  páginas nuevas; `build_home.py` quedó desactualizado en logo/menú).
- **/proyectos/ (3856)**: nueva, publicada, 6 casos con enlaces externos. En menú y footer.
- **/blog/ (1893)**: rediseñado — «guías y tutoriales» (cat 46 con `posts_include_term_ids`)
  separado de «artículos y noticias» (excluye cat 46, paginado). Respaldo en backups-cutover.
- **/servicios/paginas-web/ (1436)**: reconstruida con copy nuevo en lenguaje llano
  (el viejo era marketing delgado, sin valor SEO que preservar; respaldos guardados).

## Casos de estudio (sistema aprobado)

Arquitectura: casos completos como **páginas hijas de /proyectos/** (8-12 destacados),
filtros por servicio EN /proyectos/ (no páginas por servicio — canibalizarían las money
pages), sección «casos» dentro de cada money page, y muro compacto para los 60+ clientes
sin página individual. **Piloto construido: /proyectos/comercial-hidrobo/ (id 3878)** con
datos reales de informes-SEO (27.069 visitantes, embudo de taller: 47 posts ruteando a
cita, 25 reservas base). La card de CH en /proyectos/ enlaza al caso. `build_caso_ch.py`
es la plantilla a replicar. **Muro de clientes construido** (sección en /proyectos/, 56
clientes de su gestor de sitios, enlaces `nofollow`, 4 institucionales sin URL por nombre
truncado en el pantallazo — confirmar dominios con el usuario). Faltan: casos de OKCars,
Quipuy, Valencia, Reina, Dimapar, Boxpli, DentiLab + secciones de casos en money pages.

## Pendiente (fases siguientes)

1. **Money pages viejas en Elementor** (hosting 1282, dominios 1699, correos 931):
   su copy SEO vive DENTRO de `_elementor_data` — migración dedicada
   extrayendo textos con cuidado antes de re-vestirlas. NO tocar sin esa pasada.
2. **Cutover** (todo junto, coordinado con informes-SEO):
   - Front page: 3643 → `page_on_front` (URL `/` se mantiene).
   - Internas: volcar contenido de cada *-2026 sobre su página real (mismo ID/URL) y
     borrar las *-2026; copiar Yoast title/desc de las reales.
   - **Reescribir los enlaces del menú overlay** (viven en el JS `MENU_JS` duplicado en
     cada página — apuntan a los slugs *-2026 para el preview; cambiarlos a los reales).
   - Soporte (2433) y blog: pendientes de rediseño.
3. Quitar el botón flotante de click-to-chat si estorba con el diseño.
4. Probar un envío real del form de contacto (SMTP).

## Fix header móvil (20-sep)

En ≤767px el contenedor de acciones (Cotizar + hamburguesa) colapsaba a ~80px y el
botón desbordaba ENCIMA del hamburguesa. Fix en cw-kit.css: bloque «header móvil —
UNA fila» (`width: max-content` en el grupo de acciones + `flex: 0 0 auto` en sus
widgets + nowrap en `.e-con-inner`). Verificado a 390px; overlay del menú OK.

## Fixes 20-sep (noche): móvil proyectos/blog + soporte nueva

- ~~**Header sólido**~~: el 20-sep le puse fondo sólido + blur + borde porque el
  contenido se leía a través al hacer scroll. **Revertido el 21-sep**: al usuario no le
  gustó la franja negra. No volver a solidificarlo.
- **Degradado difuminado (21-sep)**: el degradado de 2 paradas cortaba en seco justo en
  el borde inferior del header y parecía «una sombra pegada al header». Ahora el fondo
  del header es `transparent` y el degradado vive en `.cw-header::before`, que se
  extiende **96 px por debajo** del header (64 px en móvil) con **11 paradas** (arranca en
  **35 %** de opacidad (92 → 70 → 50 → 35 a pedido del usuario; a partir de 50 % el
  blanco sobre contenido claro pierde contraste, así que logo, botón y hamburguesa
  llevan sombra propia)) para que
  la caída sea gradual y se funda con la página. `pointer-events:none` + `z-index:-1`
  para que no tape los clics ni el logo.
- **Móvil ≤767**: reveals `.cw-rev` forzados visibles (sin depender del JS), hero-sub
  padding-top 120, `.cw-proy-meta` apilada con tags en fila, gap de cards 44px.
- **Soporte (2433) reconstruida** con `build_soporte.py`: hero + 3 canales (WhatsApp,
  correo, formulario) + qué cubre + formulario. Ancla `#ticket`. Respaldo del original en
  backups-cutover/pagina-2433-soporte.json. Botones sobre cards claras: `.cw-canal
  .elementor-button` pill oscura.
- **HubSpot eliminado (21-sep)**: el cliente no usa esa herramienta. El formulario es
  ahora de **Elementor**, igual que el de contacto: campos nombre, correo, WhatsApp,
  servicio afectado, urgencia y descripción + `recaptcha_v3`; va a `info@creativeweb.com.ec`
  con asunto «Soporte — [urgencia] — [servicio]» y `reply_to` al correo de quien escribe.
  Ancho acotado con `.cw-ticket .cw-form { max-width: 760px !important }` (sin
  `!important` Elementor lo pisa con el CSS por página).
- **Trampa**: al crear/reconstruir páginas, si `post-{id}.css` da 404 los contenedores
  colapsan (`display:inline` por `var(--display)` sin definir). Forzar regeneración:
  update-page-settings (touch) + flush + GET con `?cb=`.
- Cachés WP Super Cache purgadas en ambos sitios (admin bar → Vaciar la caché).

## Entradas del blog — plantilla single 2026 (21-sep)

Las entradas servían **Header_crwb (1918) + Entrada_blog (2533) + footer_crwb (1899)**,
las tres del diseño viejo. Ahora:

| Pieza | ID | Condición | Sirve a |
|---|---|---|---|
| Cabecera 2026 — Blog | **3910** | `include/singular/post` | entradas |
| Pie 2026 — Blog | **3914** | `include/singular/post` | entradas |
| Entrada_blog (single) | 2533 | `include/singular/post` | entradas |
| Header_crwb | 1918 | `include/general` + `exclude/singular/post` | money pages viejas |
| footer_crwb | 1899 | idem | money pages viejas |

`build_single_post.py` reconstruye la 2533 (hero oscuro con título dinámico y
fecha/categorías, foto destacada a caballo entre el hero y el papel, cuerpo en
`.cw-prosa` a 46em, compartir + navegación, CTA y «sigue leyendo» excluyendo la
entrada actual) y ajusta las condiciones de las viejas.
`build_blog_theme_parts.py` crea/actualiza 3910 y 3914 con `header()`/`footer()`
de `shared_2026`. Respaldo de la plantilla original en
`backups-cutover/plantilla-2533-entrada-blog.json`.

### Trampas de Theme Builder (importantes)

1. **`emcp-tools-set-template-conditions` NO sirve** para `elementor_library`
   (gestiona el CPT propio de EMCP) → devuelve «Template not found». El meta
   `_elementor_conditions` **sí** se escribe por REST como array de strings
   (`["include/general", "exclude/singular/post"]`).
2. **La caché de condiciones no se regenera sola.** Elementor Pro guarda
   `elementor_pro_theme_builder_conditions` (opción serializada) y al escribir el
   meta por REST queda obsoleta → la plantilla no cambia en el frontend. Se fuerza
   con `update-page-settings` sobre un documento **de tipo `section`** pasando
   `{"location": ""}`: `Documents\Section::save_settings()` llama a
   `Conditions_Cache::regenerate()`, que reconstruye leyendo el meta de TODAS las
   plantillas. Se usa Grafico_1 (2416) como disparador inofensivo.
3. **Si se excluyen las entradas del header de Elementor sin darles otro**, el tema
   Hello pinta SU cabecera (franja blanca con el menú viejo). Por eso existen 3910/3914.
4. `_wp_page_template: elementor_canvas` en el documento de plantilla **no** quita
   header/footer en el frontend (sólo afecta a la vista previa del editor).
5. `import-template` descarta widgets de plugins de terceros (pasó con `hubspot-form`
   en soporte) y `max-width` de Elementor pisa el del kit: `.cw-prosa` necesitó
   `max-width: 46em !important`.

Los archivos de categoría/etiqueta siguen con el header viejo (`include/general`);
pendiente decidir si se les crea plantilla de archivo.

## Money pages migradas (21-sep) — `build_money_pages.py`

Las 3 páginas viejas que quedaban ya están en el diseño 2026, con el copy SEO
extraído antes de tocar nada (`migracion-money/texto-931.md`,
`texto-1282-limpio.md`; respaldos íntegros en `backups-cutover/pagina-{id}-original.json`).
Se normalizó el trato de «usted» a «tú» para cuadrar con el resto del sitio, sin
cambiar términos de búsqueda. Yoast intacto.

| Página | ID | Slug |
|---|---|---|
| Correos corporativos | 931 | `correos-corporativos-empresariales` (sin cambio) |
| Hosting web | 1282 | **`hosting-web-ecuador`** (antes: 180+ caracteres con las 20 provincias) |

- **301** creado con el plugin Redirection (id 66) del slug viejo al nuevo. Verificado.
- Enlaces internos actualizados a la URL nueva: **15 entradas del blog** + la página
  Servicios (929) y la plantilla 3283, que además tenían una variante distinta y rota
  del slug (`…-quito-otavalo-ibarra-galapagos/`, truncada).

## Páginas de producto a fondo (21-sep) — `build_productos.py` + `productos_base.py`

Eran páginas de ~9 KB (hero + 2 párrafos + enlace). Ahora tienen problema, funciones
en tarjetas, planes con precios reales y FAQ (~75 elementos cada una).

| Producto | ID | Slug | Sitio |
|---|---|---|---|
| Quipuy | 3630 | `quipuy-facturacion-electronica` | quipuy.com |
| DentiLab | 3631 | `dentilab-software-clinicas-dentales` | **denti-lab.com** (¡con guion!) |
| SriFlow | **3975** | `sriflow-descargar-comprobantes-sri` | sriflow.com |
| Boxpli | **3981** | `boxpli-etiquetas-de-envio` | boxpli.com |

**Decisión SEO:** estas páginas NO compiten por las keywords del producto (esas las
gana su propio dominio). Cuentan el producto a fondo para probar que construimos
software real y mandan la compra al sitio del producto con enlace en pestaña nueva.
Así no hay canibalización entre dominios propios.

**Datos verificados** contra los sitios en vivo y los repos (informe de 3 agentes).
**NO usar** en estas páginas: los testimonios de las landings de SriFlow y Boxpli ni
sus cifras de tracción («+200 contadores», «10× más rápido», «de 20 a 2 minutos») —
son de relleno o no tienen respaldo.

### Enlazado (`enlazar_productos.py`)

- Las 5 páginas de producto eran **huérfanas**: nada del sitio las enlazaba. Se añadió
  la sección «productos propios» a /servicios/ (929) con las 5 fichas.
- En /proyectos/ (3856) las tarjetas de Quipuy y Boxpli ahora van a la página interna
  (antes salían directo al sitio externo) y se corrigió el texto de Boxpli, que
  presentaba como resultado una cifra sacada de un testimonio inventado.

## Pie de página roto (corregido 21-sep)

El primer enlace del pie era `<a href="#trabajo">Trabajo</a>` — un ancla inexistente
(`/trabajo/` da 404 y ninguna página tiene `id="trabajo"`). Estaba en **11 páginas**,
portada incluida. Corregido a `<a href="/proyectos/">Proyectos</a>`. `shared_2026.footer()`
ya estaba bien; las páginas viejas conservaban la versión anterior.

## CTA final: botones iguales (21-sep)

En la sección `cw-final` el botón primario (`cw-btn-grande`: 60 px / 16 px / peso 600)
y el secundario (`cw-btn-pill`: 42 px / 13,5 px / peso 500) tenían medidas distintas.
Ahora un bloque en cw-kit.css los iguala dentro de `.cw-final` —solo los distingue el
estilo, relleno vs contorno— con su equivalente móvil (52 px / 14 px). Aplica a todas
las páginas con CTA final.

## Responsive de las páginas de producto (21-sep)

Revisadas las 4 a 390 px. Estructura sana (sin scroll horizontal, tarjetas a una
columna, heroes y FAQ legibles). Dos defectos reales encontrados y corregidos:

1. **Las filas ocultaban su descripción en ≤980px.** La regla
   `.cw-fila .cw-desc, .cw-fila .cw-specs { display: none }` dejaba los planes como
   «PYME · $19», sin decir qué incluyen. Ahora la fila se apila en móvil
   (miniatura | título | flecha · descripción · precio) con `nth-child` explícito,
   porque el auto-placement del grid descolocaba la flecha. Mejora también los
   planes de hosting de la portada.
2. **`aplicar_clases()` con un árbol PARCIAL rompe la página.** Recorre la página
   por orden, así que al llamarlo con solo la sección nueva le puso esas clases al
   PRIMER contenedor: el header de /servicios/ perdió `cw-header` y se partió en dos
   filas en móvil. Reparado y documentado en `enlazar_productos.py`.
   **Regla: pasarle siempre el árbol completo, o no llamarlo** (las clases ya viajan
   en el JSON cuando se escribe `_elementor_data` directo por REST).

## Brief SEO — tareas 1 a 4 ejecutadas (21-sep)

> Las tareas 7 y 8 (schema `Service` / `FAQPage` / `Article`) se hicieron después,
> en la pasada completa del final del documento (`schema_seo.py`). `Article` lo
> emite Yoast solo en las entradas; los casos de estudio siguen bloqueados por
> contenido del cliente.

Del brief de tareas SEO (artifact G7K2LnoorCL5PP46u3UsGN). Verifiqué las 8 contra el
sitio: 7 eran ciertas. Ejecutadas:

1. **H1 sin espacio** — `<span class="l2">` pegado al texto hacía que Google leyera
   «páginas web **quesalen** en google». Afectaba a **20 documentos / 31 títulos**
   (el brief listaba 6). Corregido insertando un espacio antes del span (invisible,
   el span es `display:block`). **`builders.H()` ahora lo normaliza solo**, así que
   no puede reaparecer al reconstruir.
2. **Meta description de /proyectos/** — estaba vacía. Puesta (150 car) + SEO title.
3. **Sitemap** — el índice ya solo lista `post-sitemap` y `page-sitemap`. Categorías,
   etiquetas y archivos de autor dan 404 (Yoast → «Mostrar … en los resultados de
   búsqueda» = No, en las 3 secciones). El brief solo pedía categorías.
4. **Enlazado** — las 4 tarjetas de la portada **no tenían enlace** (defecto no
   detectado por el brief). Ahora: Comercial Hidrobo → su caso, Quipuy → su página de
   producto, Valencia y Reina → sus sitios. /proyectos/ enlaza al caso de CH y a las
   páginas de producto.
   **Pendiente**: cuando existan los casos de Valencia, Reina y OKCars, repuntar esas
   tarjetas a `/proyectos/{caso}/`.

### Notas del brief que NO aplican a este sitio
Están escritas para otro proyecto del grupo: dice que hay caché de nginx de 10 min
(aquí es `max-age=3` + WP Super Cache), que los metas por REST se descartan sin un
mu-plugin (aquí **sí** funcionan, EMCP los expone) y pregunta si hay Redirection
(sí, y se usó para el 301 del hosting).

### Conflicto de arquitectura pendiente de decisión
El brief pide casos en `/proyectos/quipuy/` y `/proyectos/sriflow/`, pero esos ya
tienen página de producto en `/servicios/`. Recomendación dada: casos solo para
clientes (Dimapar, Odontología Life, OKCars); Quipuy y SriFlow se quedan como producto.

## Trampa extra

- **Mod Security del hosting bloquea POST binario a /wp-json/wp/v2/media (406)** —
  subir medios SIEMPRE con `emcp-tools-upload-media` (base64 por el canal MCP).

## Pasada SEO completa (21-sep) — «haz lo que tengas que hacer»

Auditoría de las 126 URL del sitemap y corrección de todo lo que salió. Estado
final verificado en producción: **0 páginas con problemas, 0 titles duplicados**.

### 1. `/servicios/` (929) servía `noindex, nofollow` — lo más grave
La página que enlaza a los 13 servicios estaba fuera del índice **y sin seguir
enlaces**, así que Google no llegaba a ninguna money page desde ahí. Ni siquiera
aparecía en `page-sitemap.xml`.

Cómo se arregló, porque costó:
- REST a `_yoast_wpseo_meta-robots-noindex` → **se ignora** (meta protegida).
- `emcp-tools-update-post` con esa meta → **«Refusing to write protected meta key»**.
- En el editor de bloques, poner `select.value` con el setter nativo + `dispatchEvent`
  → el radio de nofollow sí, pero el select **no**: React lo vuelve a pintar desde
  su store. Y la caja de metaboxes está a `0x0`, así que tampoco se puede clicar.
- **Lo que funciona**: el store de Yoast.
  ```js
  wp.data.dispatch('yoast-seo/editor').setNoIndex('0');
  wp.data.dispatch('yoast-seo/editor').setNoFollow('0');
  await wp.data.dispatch('core/editor').savePost();   // aunque isEditedPostDirty() sea false
  ```
  Deja las filas de `wp_postmeta` borradas y el indexable con `is_robots_noindex = NULL`.

### 2. Dominios (1699) — `build_dominios.py`
Última money page con diseño viejo, **sin ningún H1** y con precios de TLD
desactualizados. Migrada a 2026, slug `venta-dominios-ecuador-comprar-dominio` →
`comprar-dominio-ecuador` con 301 (Redirection id 67), precios a $21.99 / $43.99.
Se conserva el buscador de WHMpress (shortcode en un text-editor); como ahora va
sobre fondo negro, `cw-kit.css` tiene un bloque `.cw-negro .cw-buscador` que
invierte tinta y botón.

`enlazar_dominios.py` parte la fila «Hosting y dominios» de /servicios/ en dos, para
que el hub enlace también a la página de dominios (era huérfana: solo la enlazaban
tres entradas del blog).

### 3. Cinco páginas de servicio se quedaron en «usted» — `reescribir_5_servicios.py`
tiendas (3625), seo (3624), facturación SRI (3629), probador (3627) y motrix (3626).
Además sus preguntas frecuentes eran `<p><strong>…</strong></p>`, no `<h3>`, así que
ni Google ni el schema las veían como preguntas, y **ninguna tenía un solo enlace
interno en el cuerpo**. Las tres cosas corregidas en la misma pasada (14 enlaces
contextuales nuevos). Cada página tiene un único text-editor `cw-prosa` con todo el
cuerpo, así que se reemplaza por su ID de widget.

### 4. Schema JSON-LD — `schema_seo.py`
`Service` (8 servicios) o `SoftwareApplication` (5 productos) + `FAQPage` con las
62 preguntas reales, en las 13 páginas; `ProfessionalService` con los datos del
negocio en portada y /contactanos/ (Yoast no los emite: eso vive en su addon Local
SEO, que no está instalado).

Decisiones deliberadas:
- `provider` apunta por `@id` al nodo Organization **de Yoast**, que ya está en la
  misma página. No se duplica.
- Las preguntas y respuestas se **extraen del HTML publicado**, nunca se escriben en
  el script: si el schema y el texto visible no coinciden, Google lo trata como spam.
- **Sin `aggregateRating`** en ninguna parte: no hay reseñas reales.
- **Sin `streetAddress`**: la empresa no publica dirección de calle, solo localidad.
- Es idempotente: el JSON-LD vive en un widget HTML marcado `cw-schema-seo`, dentro
  de un contenedor con padding y gap a 0 (altura medida en producción: **0 px**).

### 5. Enlaces internos rotos — `arreglar_enlaces_blog.py`
`find-broken-links` dio 140 hallazgos y **casi todo era ruido**: las imágenes de
2017-2023 responden 200 (la herramienta comprueba si hay un *post* en esa URL, no si
el archivo existe) y los `elementor_library` no se renderizan. Reales: 18 enlaces en
6 entradas (slugs que cambiaron, un `wp-admin/post.php?…&action=edit` pegado en vez
del permalink y un `creativeweb.com.ec/{` de una plantilla a medio interpolar).
Más 4 redirecciones 301 de los slugs viejos.

### 6. Dos tutoriales sin H1 — `arreglar_h1_tutoriales.py`
1872 y 2183: el widget del título estaba en `h3` (el texto sí salía, es etiqueta
dinámica) y los pasos eran `<p><strong>`. Ahora `h1` + `h2`.

### 7. Metas — `arreglar_metas.py` y `acortar_titles.py`
- Hosting (1282): el title decía «desde $59,99 al año» y la página muestra $4.99/mes.
- SEO (3624): descripción en «usted».
- Hidrobo (3878): title de 63.
- 10 entradas con el title por encima de 64 (la peor, 2685, llegaba a 79 porque no
  tenía title propio y Yoast le pegaba « - Creative Web»).

## Ampliación de correos y páginas web (21-sep) — `ampliar_correos_paginas.py`

Eran las dos únicas money pages por debajo de 500 palabras (431 y 474) mientras el
resto está entre 900 y 1.400; competían en desventaja por sus propias búsquedas.
/servicios/paginas-web/ además no tenía **ninguna sección intermedia**: hero, un
bloque de texto y CTA.

- **paginas-web 1436: 431 → 1.596 palabras.** Fichas «qué tipo de página
  necesitas», sección oscura «cuánto cuesta una página web en Ecuador» (la keyword
  pasa a H2 y el detalle del precio a H3), «qué necesitamos de ti», «lo que vemos
  en las páginas que nos traen a arreglar», «cuándo no te conviene hacerla con
  nosotros». FAQ de 3 a 9 preguntas.
- **correos 931: 474 → 1.892 palabras.** Sección oscura «por qué una cuenta
  gratuita no te alcanza», más cuántas cuentas hacen falta, cómo nombrarlas, el
  fraude del número de cuenta cambiado y cómo migramos sin caídas. FAQ de 5 a 10.

Ningún dato nuevo: planes, espacio y precios salen de /servicios/hosting-web-ecuador/
y las cifras de la empresa ya estaban en la página. Sin testimonios inventados.

### Tres trampas que aparecieron aquí

1. **Insertar antes de `cw-final` deja el contenido nuevo DEBAJO de la FAQ.** En
   correos la sección de preguntas ya estaba ahí, así que hay que sacarla con
   `pop()` y volver a ponerla al final de la lista de secciones nuevas.
2. **`.cw-nota-clara` solo pinta `<p>`.** En cuanto el bloque oscuro lleva `<ul>`
   o `<strong>`, esos elementos heredan el gris oscuro y desaparecen sobre el
   negro. Para eso está ahora **`.cw-prosa-clara`**, que es `.cw-prosa` en versión
   oscura (texto #C3CED7, negritas y encabezados en blanco, enlaces y viñetas en
   cian). Úsala siempre en secciones `cw-negro` con prosa de verdad.
3. **`.cw-prosa` nunca aplicó su `max-width: 46em`.** `.elementor-widget { max-width:
   100% }` lo pisaba, así que TODA la prosa del sitio salía a 1140px — líneas de
   ~130 caracteres, casi el doble de lo legible. El template del blog ya lo
   resolvía con `!important`; ahora la regla es global y la prosa va a 782px.
   Es un cambio visual en todas las páginas de servicio, pero es la intención
   original del kit, no un rediseño.

Tras ampliar hay que **volver a correr `schema_seo.py`** para esas páginas: el
FAQPage se extrae del HTML publicado (9 y 10 preguntas ahora).

## Landing UAFE (2-oct-2026) — `build_uafe.py`

`/servicios/correo-institucional-uafe/` (4063, hija de 929). Nicho: los sujetos obligados
a la UAFE necesitan un correo institucional exclusivo para el oficial de cumplimiento.
Estrategia en `../uafe-2026-10/ESTRATEGIA.md`. Se reconstruye entera con
`python3 build_uafe.py --publicar` (borrar e importar, Yoast, schema y CSS).

- **Trampa nueva:** pedir `post-{id}.css` con un `?cb=` aleatorio devuelve 404, aunque el
  archivo exista (pasa también con el 931). El aviso «css no se regeneró» de
  `regenerar_css()` puede ser falso: hay que comprobarlo sin parámetro o con el `?ver=` que
  trae la página.
- Las capturas de Chrome sin pantalla a 390 px cortan el texto a la derecha en TODAS las
  páginas (también en la 931). Es un efecto de la captura, no del diseño.
