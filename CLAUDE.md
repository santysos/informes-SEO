# CLAUDE.md — Repositorio informes-SEO

Contexto operativo para futuras sesiones de Claude trabajando en este repo. Última actualización: 2026-09-14.

---

## Qué es este repo

Repositorio que alberga **informes SEO web** entregables a clientes y los **assets que se deployan a `creativeweb.com.ec/informes/`** vía cPanel Git. Aquí no vive el código de los sitios de los clientes — vive el material que les mostramos.

**Auto-deploy:** existe (`.cpanel.yml`), pero **NO se dispara automáticamente con cada push**. Cada despliegue requiere ejecutarse manualmente en cPanel → Git Version Control → Manage → Pull or Deploy → "Update from Remote" + "Deploy HEAD Commit". Esperar al menos 1-2 min tras la operación.

**Hosting / paths:**
- Servidor: `pekesc5@…` (cPanel)
- `BASEPATH=/home/pekesc5/public_html/informes`
- Subdominios canonical: `creativeweb.com.ec` redirige (301) a `www.creativeweb.com.ec`

---

## Proyectos activos

### 1. Comercial Hidrobo (CH) — comercialhidrobo.com

Concesionario automotor del norte del Ecuador (Ibarra, Cayambe, Tulcán), más de 50 años en el mercado. Marcas: Renault, Nissan, Mazda, Toyota (postventa), DongFeng, Chery, Changan, Jeep, RAM, Fiat, Dodge.

**Estado SEO (informe Mes 1 Abr-May 2026):**
- 27.069 usuarios activos GA4 (ene-22 may)
- 8.952 clics orgánicos · 871.854 impresiones · CTR 1,03 % · 62.700 queries
- 731 páginas reciben tráfico orgánico
- GTM-WZDVLBX3 instalado con eventos `whatsapp_click` y `form_submit`
- 16 posts publicados el 4-may (rango 22-40 del plan)
- 35 posts en revisión (20 plan abril + 4 plan mayo + 11 cluster Híbridos/Eléctricos)
- **Aún no se han subido posts vía nuestra API** — se publican manualmente por el equipo CH

**Hallazgos clave del análisis (ene-22 may 2026):**
- **Cluster autos chinos = 26,9 % de TODOS los clics** (2.405 clics, 10.632 queries). Chery 436 · DongFeng 340 · Changan 96 · Omoda/Geely emergentes.
- **Cluster eléctricos/híbridos = 14,6 % de los clics** (1.305, 3.202 queries). Top: `autos electricos ecuador` 140, `carros electricos ecuador` 131.
- **Página #1 del sitio:** `/vehiculos-electricos-e-hibridos/autos-electricos-en-ecuador-2025/` con 2.285 clics, 79.458 impresiones, pos 5,3 — gran margen para subirla a top 3.

### 2. OKCars — okcars.ec

Submarca de seminuevos de Comercial Hidrobo. Sitio nuevo, sin trabajo SEO previo hasta abril.

**Estado SEO:**
- 721 usuarios activos (ene-22 may), 217 clics orgánicos, CTR 3,16 %
- 84 % del tráfico es brand (`ok cars`, `okcars`, `autos ok`) — 16 % non-brand
- 36 URLs con tráfico orgánico (la home concentra 40 %, fichas suman 60 clics, listado y financiamiento aparecen mínimo)
- Top no-brand: `deepal s05 precio ecuador` (10 clics, pos 6,9)
- **Medición (verificado 2026-08-24, corrige lo que decía antes este archivo):** hasta agosto OKCars **NO tenía GTM ni eventos de contacto**. Solo GA4 vía Site Kit (`GT-P3JC26Q9`, medición `G-F0H5W02BRF`) con los eventos automáticos. El único evento clave configurado era `purchase`, que nunca se disparó. El 24-ago se creó el contenedor **GTM-P7MNVQ65** (cuenta OKCars) y se instaló por Site Kit → Tag Manager.
- ⚠️ **El botón de WhatsApp existe solo en las fichas de vehículo.** Home, posts, páginas de marca y contacto no lo tienen: ~1.300 de 1.659 vistas caen en páginas sin salida. Medir no arregla eso.

**Estado al 2026-09-14:** 76 posts en el sitio (34 publicados, 42 programados hasta el 30 de
noviembre). Faltan 44 para los 120 del contrato. Se reescribieron 5 títulos que estaban en
posición 3 a 9 con cero clics, y se instaló Redirection con 13 reglas para las fichas de
vehículos vendidos — antes el 87 % de las impresiones de fichas caía en 404 porque al vender
se pasan a borrador. Instructivo para el equipo del cliente en `okcars/redirects/`.

**Trabajo realizado por nosotros (abril-mayo 2026):**
- 20 posts publicados vía REST API (IDs 1110-1130, fechas escalonadas 1-abr a 28-may, uno cada 3 días). 17 con status `publish`, 3 con `future` (los del 22, 25 y 28 de mayo).
- 5 categorías creadas (IDs 42-46): Guías de compra, Modelos y comparativas, Financiamiento, Trámites, Seminuevos en Ibarra.
- ~80 tags nuevos.
- ~30k palabras de contenido total.

**Pendientes documentados:**
- URLs antiguas `/usados/` → 404 (necesitan redirect 301 a `/vehiculos-okcars/`)
- Mejorar copy del home (recibe 40 % del tráfico orgánico)
- Marcar `whatsapp_click` y `form_submit` como **conversiones clave** en GA4

### 3. Dimapar Ecuador — dimaparecuador.com

Distribuidor B2B de equipos industriales y herramientas para talleres automotrices, llanteras y vulcanizadoras. Marcas que distribuye: Hofmann, Besser, Hydraulan, Muth, Thyson, Tramontina, Toptul, Vermar, Milton.

**Stack del sitio actual:** WP 6.9.4 + WooCommerce 10.7.0 + Elementor Pro 3.27.1 sobre tema demo "Woo Auto Parts" (sin personalizar).

**Estado del proyecto (mayo 2026):**
- 🔴 42 problemas detectados en auditoría técnica (10 críticos, 19 importantes, 13 menores)
- ✅ Reestructura WooCommerce aplicada: 51 categorías en 8 padres según organigrama del cliente
- ✅ 159 productos reclasificados automáticamente
- ✅ 4 atributos globales creados: Marca, Voltaje, Capacidad, Aplicación
- 🔄 Rediseño en proceso: nueva home aprobada (dark + cyan, hero "Hoja técnica" con foto del taller, fuente Outfit)
- 🔄 Página `inicio-2026` en WP creada (id=6203) con `_elementor_data` inyectado vía REST (gracias al mu-plugin `dimapar-rest-meta.php`)
- ⏳ Pendiente: subir `dimapar-tokens.css` + `image-slot.js` a `/wp-content/uploads/dimapar/` para que el render se complete

**REST API Dimapar:**
- Base: `https://www.dimaparecuador.com/wp-json`
- Usuario admin: `noritake` (Xavier Rojas), Application Password en `.env` (`DIMAPAR_WP_APP_PASS`)
- **Mu-plugin subido a `/wp-content/mu-plugins/dimapar-rest-meta.php`** que registra `_elementor_data`, `_elementor_page_settings`, etc. como REST-writable. Sin él, WP REST descarta silenciosamente los metas privados (con prefijo `_`).

**Entregables públicos:**
- Informe técnico abril 2026 (login `Dimapar-2026`): `creativeweb.com.ec/informes/dimapar/abril-2026/`
- Diagnóstico técnico de 42 problemas: `creativeweb.com.ec/informes/dimapar/diagnostico-tecnico/` (login `Dimapar-2026`)
- Preview rediseño home: `creativeweb.com.ec/informes/dimapar/redesign/` (sin login)
- Playbook Elementor: `creativeweb.com.ec/informes/dimapar/redesign/elementor-playbook.html`

### 4. Municipio de Cotacachi — Intag Trail + plataforma multi-evento

**Contexto comercial:** propuesta de venta a entidad pública (Municipio de Cotacachi) para construir una plataforma SaaS multi-evento que sirva como sistema de inscripciones digitales del cantón. Primer caso: Intag Trail (9-11 oct 2026), una carrera con 5 distancias (7K, 20K, 26K, 40K, 87K) y precios $20-$80. Segundo evento confirmado: Travesía Cuicocha.

**Contacto comercial cliente:** Santiago Echeverría (organizador Intag Trail / Energy Trail Team).

**Modelo de negocio definido en proforma:**
- Año 1: **USD $4.000 + IVA** (setup + 12 meses operación + capacitación)
- Año 2+: **USD $1.800 + IVA / año** (renovación)
- Hasta 5 eventos al año por organización
- Pasarela: **PayPhone únicamente** (comisión 6% solo al retiro de fondos)
- Dominio .com a nombre del municipio incluido año 1 ($21.99 + IVA)
- Multi-tenant: cada evento con su propio branding (logo, paleta)

**Stack técnico definido para la nueva app:**
- Next.js (App Router) + TypeScript + Tailwind + shadcn/ui
- Supabase (Postgres + Auth + Storage + RLS)
- Deploy en Vercel
- PayPhone Ecuador como única pasarela
- Resend para email transaccional
- Leaflet + Recharts para visor GPX con perfil de elevación

**IMPORTANTE — app nueva, no reusar Otavalo Explorer:**
- Existe `/Users/creativeweb/DESARROLLO/CLAUDIO/App-registros-online` con un proyecto previo "Otavalo Explorer" (multi-tenant similar). **NO usar como base ni mencionar**. Nunca salió a producción.
- La app de Intag Trail / Cotacachi es proyecto nuevo desde cero, en repo aparte.
- El desarrollo lo maneja otro Claude en otra sesión. El contexto para él vive en `/Users/creativeweb/Downloads/intag-trail-app-context.md`.

**Restricciones de branding:**
- ⚠️ Intag Trail **NO es UTMB Index Race** (confirmado por cliente 28-may). Solo proyecta homologación UTMB para la 2ª edición. **No usar "UTMB" como argumento de venta presente**, solo como proyección futura.
- Línea gráfica oficial Intag Trail: negro `#0E1410` + amarillo dorado `#D4A332` + crema `#F5F0E5`. Fuente display: sans condensada bold (`Anton` o equivalente).

**Entregables comerciales:**
- Proforma protegida (clave `Cotacachi-2026`): `creativeweb.com.ec/informes/cotacachi/proforma/`
- Deck de presentación HTML público: `creativeweb.com.ec/informes/cotacachi/presentacion/`
- Guía de reunión (uso interno): `/Users/creativeweb/Downloads/guia-reunion-cotacachi.html`
- Brief al otro Claude: `/Users/creativeweb/Downloads/intag-trail-app-context.md`

### 5. Mattco — sistema de control de combustible (proforma julio 2026)

Sistema web para control de combustible + peajes + viajes La Favorita. 3 módulos: M1 Combustible con lectura de tickets por IA ($700), M2 Peajes prepago ($150), M3 Viajes cabezal-Favorita ($350). Dos razones sociales (RUCs del ticket). Control antirrobo por saldo del tanquero (110 gal, no siempre a full).

**Números finales de la proforma:**
- Desarrollo: **$1.200 + IVA** (60% anticipo $720 / 40% entrega $480). Entrega 2-3 semanas.
- Mensual desde mes 2: **$35 + IVA** (servidor $12 / IA $8 / dominio $2 / soporte $13). Opción anual: **$350/año** (2 meses gratis).
- Compatible con celular, tablet y computadora (NO decir "app instalable"). NO mencionar funcionalidad offline ni manuales en video.
- Incluye sección de experiencia: Quipuy (facturación SRI), SRIFlow (descarga comprobantes SRI, usuaria Leticia Merlo), Motrix (FisioVida), Dentilab (Odontología Life), +60 sitios web.
- OCR de tickets: Claude API claude-opus-5 con structured outputs, ~$0,019/ticket.
- Pendiente: nombre de contacto + lista de peajes. Logo en `mattco/proforma-julio-2026/assets/logo-mattco.png`.

### 6. Chavarrea-Merlo — página web para nueva empresa contable (proforma agosto 2026)

Magui Chavarrea y **Leticia Merlo** (ya es usuaria de SRIFlow — usar como rompehielos en reunión): dos contadoras que se unen para ofrecer declaraciones en línea a todo el Ecuador. **La empresa aún no tiene nombre** — ellas lo eligen (no ofrecer ayuda de naming); el nombre es el primer insumo del cronograma.

**Números finales de la proforma:**
- Desarrollo web: **$680 tachado → $500 + IVA** ("precio especial de lanzamiento"). Pago 60/40: $300 al empezar / $200 a la entrega.
- Incluido 1 año: dominio, hosting, responsive, correos corporativos (ejemplos `magui@suempresa.com` / `lety@suempresa.com`), formularios + WhatsApp, SEO inicial, soporte.
- Regalo: logotipo + manual de marca ($200 tachado → $0).
- Renovación año 2: dominio $21,99 + hosting $120,00 = **$141,99/año** ("menos de $12 al mes").
- Opcional: plan SEO 6 meses — **$600 + IVA un solo pago** o **$150/mes + IVA** (+20 artículos/mes, +120 al final). ⚠️ Mismo precio que Dikapsa pero allá son 4 artículos/mes.
- Entrega: 3-4 semanas desde que entreguen nombre, fotos y lista de servicios.
- **Lenguaje 100 % no técnico** (dominio = "dirección de su oficina en internet", hosting = "el local que la mantiene abierta 24h"). Paleta azul marino `#0a1828`/`#16324f` + dorado `#d4af37`/`#e9c95c`.

---

### 7. Creative Web — nuestro propio sitio (septiembre 2026)

**El proyecto más importante en curso y el que más aprendizaje dejó.** Diagnóstico completo
en los artefactos «Casa de herrero» y «Del tráfico a la venta».

**La línea base, registrada el 2026-09-08 para poder medir la mejora:**
1.239.269 impresiones · 1.384 clics · CTR 0,11 % · posición media 6,5 en 12 meses.

**El diagnóstico, en cuatro hechos:**
- **El 84 % de las impresiones venía de UNA URL**: el post «qué significa .com», que atrae
  gente escribiendo mal una dirección. 912.093 impresiones y 251 clics en el año.
- **261 de 353 URLs tuvieron impresiones y CERO clics** en 12 meses.
- **Nuestro blog enterraba nuestras páginas de servicio**: 33 URLs competían por «correo
  corporativo» con la página que vende en posición 52; 36 por «dominio» con 5 clics en todo
  el año. Esa canibalización es la explicación mecánica de por qué el contenido SEO no vendió.
- **Dejar de publicar costó tres cuartas partes del tráfico.** El contenido de septiembre 2025
  siguió madurando seis meses (posición 45 → 14, clics 58 → 128) y al parar cayó a 32 clics y
  posición 31 en cuatro meses. **El ritmo vale más que el volumen.**

**Lo ejecutado (fases 0, 1 y 2):**
- Tienda WHMCS (`ventas.creativeweb.com.ec`): `robots.txt` + hook `seo_tienda.php` que da
  título, descripción y canonical a cada página del catálogo. Antes todas se llamaban
  «Carrito» y Google indexaba los `/login?language=alemán|holandés|farsi`; la tienda había
  caído de posición 11,8 a 76,6.
- 4 páginas de servicio enriquecidas **antes** de redirigir hacia ellas (correos 535→1.122
  palabras, hosting 435→793, dominios 333→629, páginas web 264→638).
- 7 páginas comerciales nuevas · **58 redirecciones activas** con Redirection.
- Menú reorganizado en Servicios (6) y Productos (5).

**Pendiente:** 32 URLs sin tema dominante para revisar una a una, y la medición a fin de
octubre contra la línea base.

### 8. Quipuy — pendiente de tratamiento SEO

**El premio más grande del grupo y está sin tocar.** quipuy.com tiene **1.138 clics y
174.445 impresiones en 90 días** (posición 7,8): más en tres meses que creativeweb.com.ec en
doce. Y tiene exactamente la misma enfermedad: todo su tráfico es blog, **ninguna página de
producto entre sus 20 más vistas**, y sus dos artículos mayores son consultas al portal del
SRI con 0,06 % y 0,12 % de CTR — el mismo caso del «.com».

Es **Next.js, no WordPress**, así que los cambios van por código. En Search Console como
`sc-domain:quipuy.com`. El repositorio local no se encontró en la búsqueda inicial.

### 9. Proformas de septiembre 2026

| Cliente | Qué | Valor | Nº |
|---|---|---|---|
| **Stelmap S.A.S.** (Dalila Andrango) | Hosting Pymes + dominio | $117,98 + IVA | 1-2-1327 |
| **CompuZero** (Fabián Ortega) | Tienda catálogo de laptops y PC | $1.200 + IVA | 1-2-1328 |
| **Sueños Bilingües** (Saravino) | Quipuy + módulo de matrícula y agenda | $260 + IVA | 1-2-1329 |
| **Multitecnología VYV** | Blog + plan SEO 6 meses | $140 + $600 | 1-2-1330 |

Detalles y hallazgos de cada una en sus carpetas.


## Stack técnico

### Sitios WordPress de los clientes

| Sitio | Builder | CPT | Plugins relevantes |
|---|---|---|---|
| `okcars.ec` | Elementor + JetEngine | `vehiculos-okcars` (rest_base igual) | Yoast SEO v27.6, JetEngine, Elementor |
| `comercialhidrobo.com` | (no inspeccionado a detalle) | (no relevante para nuestro trabajo) | Yoast SEO, GTM |

**Taxonomías OKCars:**
- `marca` (Ford 2, Hyundai 2, Kia 2, Mazda 1, Toyota 1, GAC 1, Changan/Chery/Audi/etc 0)
- `color-vehiculos`

**Inventario OKCars (snapshot al 21-may-2026):** 9 vehículos.
- AION UT EV, Hyundai Tucson (×2), Mazda CX-5, Kia Seltos, Toyota Prius, Ford Escape, Kia Sorento, Ford Territory.
- URL ficha: `https://okcars.ec/vehiculos-okcars/{slug}/`
- URL listado público: `https://okcars.ec/vehiculos-okcars/`

### REST API WordPress de OKCars

- Base: `https://okcars.ec/wp-json/wp/v2`
- Usuario: `chidrobo` (ID 1)
- Application Password en `/Users/creativeweb/DESARROLLO/CLAUDIO/informes-SEO/.env` (gitignored). Variable: `OKCARS_WP_APP_PASS`.
- Permisos validados: `POST /posts`, `POST /categories`, `POST /tags`, `DELETE /posts/{id}?force=true`.
- **WAF agresivo:** envía connection-reset si se hacen muchos requests seguidos. **Usar mínimo 8 s entre cualquier llamada y 25 s entre publicaciones de posts**. Si se bloquea, esperar 90 s y reintentar con `User-Agent` de navegador. Ver `okcars/abril-2026/publish_batch.py` para el patrón seguro.

### REST API WordPress de Comercial Hidrobo

- Base: `https://comercialhidrobo.com/wp-json/wp/v2`
- **Sin credenciales aún.** Usuario tiene que generar Application Password cuando llegue el momento de publicar nuestros posts CH.

---

## Estructura de carpetas relevantes

```
informes-SEO/
├── .cpanel.yml                       # Deploy config — agregar entrada por cada nuevo deliverable
├── .env                              # Credenciales API (gitignored)
├── .gitignore                        # Incluye .env y data crudos de GA/GSC
├── CLAUDE.md                         # Este archivo
├── comercial-hidrobo/
│   ├── marzo-2026/                   # Informe principal CH/OKCars (login CH-Hidrobo-2026)
│   ├── nueva-home/                   # Preview rediseño home (sin login)
│   └── registro-mensual/
├── okcars/
│   └── abril-2026/                   # publish_batch.py + specs JSON de 20 posts
├── dimapar/
│   ├── abril-2026/                   # Informe Fase 1 (login Dimapar-2026)
│   ├── diagnostico-tecnico/          # Diagnóstico 42 problemas (login Dimapar-2026)
│   └── redesign/                     # Preview rediseño + playbook + assets
│       ├── preview.html              # Mockup home aprobado (dark + cyan + Outfit)
│       ├── elementor-playbook.html
│       ├── dimapar-tokens.css        # CSS variables (pendiente subir a wp-uploads)
│       ├── image-slot.js
│       ├── build_elementor.py        # Inyecta _elementor_data vía REST
│       ├── wp-plugin/dimapar-rest-meta.php  # mu-plugin (ya subido a sitio)
│       └── audit/                    # Scripts inventario WC + análisis técnico
├── cotacachi/
│   ├── proforma/                     # Proforma SaaS Intag Trail (login Cotacachi-2026)
│   └── presentacion/                 # Deck HTML público para reunión
├── mattco/
│   └── proforma-julio-2026/          # Proforma sistema combustible (login Mattco-2026)
└── chavarrea-merlo/
    └── proforma-agosto-2026/         # Proforma web contadoras (login Contadoras-2026)
```

### Entregables en vivo (resumen por cliente)

| Cliente | Tipo | URL | Clave |
|---|---|---|---|
| Comercial Hidrobo | Informe SEO mensual | `creativeweb.com.ec/informes/comercial-hidrobo/marzo-2026/` | `CH-Hidrobo-2026` |
| Comercial Hidrobo | Preview nueva home | `creativeweb.com.ec/informes/comercial-hidrobo/nueva-home/` | sin login |
| Dimapar | Informe Fase 1 | `creativeweb.com.ec/informes/dimapar/abril-2026/` | `Dimapar-2026` |
| Dimapar | Diagnóstico técnico (42 problemas) | `creativeweb.com.ec/informes/dimapar/diagnostico-tecnico/` | `Dimapar-2026` |
| Dimapar | Preview rediseño home | `creativeweb.com.ec/informes/dimapar/redesign/` | sin login |
| Cotacachi | Proforma SaaS Intag Trail | `creativeweb.com.ec/informes/cotacachi/proforma/` | `Cotacachi-2026` |
| Cotacachi | Deck de presentación | `creativeweb.com.ec/informes/cotacachi/presentacion/` | sin login |
| Mattco | Proforma sistema combustible | `creativeweb.com.ec/informes/mattco/proforma-julio-2026/` | `Mattco-2026` |
| Chavarrea-Merlo | Proforma página web | `creativeweb.com.ec/informes/chavarrea-merlo/proforma-agosto-2026/` | `Contadoras-2026` |

**Patrón de proforma/informe protegido con login (PHP):**
- `login.php` con form POST a sí mismo, valida clave hardcoded, setea `$_SESSION['auth_xxx'] = true`, redirige a `index.php`
- `index.php` con `session_start()` y guard al inicio: si no auth, `header('Location: login.php'); exit;`
- `logout.php` simple: destroy session + redirect a login
- `.htaccess` con `DirectoryIndex login.php index.php` + header `X-Robots-Tag: noindex,nofollow,noarchive,nosnippet`
- Estilo: Tailwind CDN + Outfit/Inter/JetBrains Mono + paleta dark + glass cards. Coherencia visual con el rediseño del cliente respectivo (ej: cyan para Dimapar, emerald + gold para Cotacachi).

---

## Workflows establecidos

### Publicar un batch de posts en WordPress (caso OKCars, mayo 2026)

1. Generar specs JSON en `okcars/{mes-año}/posts/spec-XX-slug.json` con el schema esperado por `publish_batch.py`:
   - `title, slug, status, date, category_id, tags, excerpt, lead[], sections[].h2/.blocks[], conclusion, faq[]`
2. Verificar que las categorías existan (IDs 42-46 OKCars). Si necesitas más, crear primero con `POST /categories`.
3. Correr `python3 -u publish_batch.py 2>&1 | tee /tmp/publish.log` (importante el `-u` para output unbuffered).
4. El script: (a) verifica duplicados por slug, (b) crea tags faltantes, (c) sube cada post con `urllib`. **No usa curl** porque curl puede reintentar automáticamente y crear duplicados.
5. Verificar en `wp-admin` y revisar que las fechas escalonadas funcionen correctamente.
6. Commit + push los specs y el log al repo.

### Agregar una nueva sección/tab al informe en producción

1. Editar/crear los archivos relevantes en `comercial-hidrobo/marzo-2026/` (u otra carpeta).
2. **Si añades archivos nuevos:** modificar `.cpanel.yml` para que los copie. Patrón: una línea `cp -f` por archivo o `cp -rf` por directorio.
3. Validar PHP local: `php -l archivo.php`.
4. Commit + push.
5. Ir a cPanel → Git Version Control → Manage → Pull or Deploy → "Update from Remote" + "Deploy HEAD Commit".
6. Verificar URL en vivo (post-login con cookie jar) que aparezca el cambio.

### Generar el informe mensual de avance

Datos necesarios del cliente:
- GA4: Adquisición visión general, Páginas top, Eventos, Demografía (CSVs).
- Search Console: Consultas y Páginas (CSVs).
- Periodo: el año en curso completo, no solo el mes (para gráficos de evolución).

Archivos esperados en `comercial-hidrobo/marzo-2026/data/`:
- `ch_ga4_panoramico.csv`, `ch_paginas_organicas.csv`, `ch_queries.csv`
- `okcars_ga4_panoramico.csv`, `okcars_paginas_organicas.csv`, `okcars_queries.csv`

Notas:
- Los exports de GA4 + Search Console que vienen del informe combinado (GA4 → Adquisición → Tráfico de búsqueda orgánica de Google) son los más útiles porque incluyen clics, impresiones, CTR, posición y métricas GA4 cruzadas (usuarios, sesiones con interacción, eventos, ingresos).
- Saltar líneas de comentario al principio del CSV (`#`).

---

## Plan editorial — próximos meses (visión SEO)

Documentado en el tab "Avance Mes 1" del informe. Resumen:

| Mes | Comercial Hidrobo | OKCars |
|---|---|---|
| **Junio (Mes 2)** | 11 cluster Híbridos/Eléctricos + 5 comparativas chinos vs japoneses + 4 pillar marcas chinas | 20 posts seminuevos derivados del comportamiento abr-may |
| **Julio (Mes 3)** | 6 marcas emergentes (Omoda, BYD) + 8 Renault/Nissan derivados + 6 long-tail confiabilidad | 20 posts según queries detectadas |
| **Agosto (Mes 4)** | Pillar refresh "Eléctricos 2026" + 10 landings locales + 10 posts demanda-data | 20 posts |
| **Septiembre (Mes 5)** | Comparativas premium + financiamiento + refresh posts top | 20 posts |
| **Octubre (Mes 6)** | Posts estacionales fin de año + casos de éxito + plan 2027 | 20 posts |

**Ejes estratégicos identificados:**
- Eje 1: Eléctricos/Híbridos (acelerar el cluster)
- Eje 2: Autos chinos (pillar por marca + comparativas intra-china)
- Eje 3: Modelos con tracción (Duster, Kicks, Deepal S05)
- Eje 4: Conversión y optimización técnica (CTAs, internal linking, schema)
- Eje 5: Calendario sugerido junio-octubre

---

## Preferencias del usuario relevantes

- **Idioma:** español neutro ecuatoriano. Usar **tú** (no vos, no usted). Imperativos directos: "toca", "abre", "envía", "mira".
- **Comunicación:** terso y directo. Sin trailing summaries cuando no agregan valor.
- **Git workflow:** siempre push a `origin/main` al finalizar una tarea (auto-deploy del repo aunque haya que disparar manualmente en cPanel).
- **Lenguaje en páginas públicas:** sin jerga técnica. Nada de SPF, DKIM, IMAP, puertos ni
  propagación de DNS. El término técnico se convierte en promesa: «configuramos SPF y DKIM» se
  escribe «dejamos todo listo para que tus correos lleguen y no caigan en spam». El
  diferenciador frente a los proveedores grandes es **la atención personalizada y el soporte
  inmediato por WhatsApp**, no las especificaciones.
- **Confidencialidad:** datos crudos de GA4 / Search Console del cliente NO van al repo (están en `.gitignore`). Application Passwords NO van al repo (están en `.env`).

---

## Notas técnicas para próximas sesiones

1. **OKCars WAF:** si vas a hacer muchos requests, usa el patrón del `publish_batch.py` (delays de 8s/25s, User-Agent navegador, no curl).
2. **cPanel deploy NO automático:** después de cualquier push relevante, recordar al usuario que ejecute "Update from Remote" + "Deploy HEAD Commit". Verificar tras 1-2 min con curl al sitio en vivo.
3. **Search Console + GA4 integration:** GA4 ofrece exports que ya cruzan datos de Search Console (con métricas combinadas). Es la fuente más rica para informes — pedirlos en lugar de pedir GSC por separado.
4. **CSVs con cabecera de comentarios:** los exports de GA4 traen 8-10 líneas comenzadas en `#` antes del header real. Hay que saltarlas al parsear.
5. **Yoast meta vía REST:** Yoast acepta `meta._yoast_wpseo_title`, `meta._yoast_wpseo_metadesc`, `meta._yoast_wpseo_focuskw` en el payload de creación de post — pero a veces los ignora silenciosamente. Si es crítico optimizar SEO de cada post, el usuario tiene que confirmar en /wp-admin que se guardaron.
6. **Para nueva preview/landing pública sin login:** patrón usado en `nueva-home/` y `reina-de-otavalo/media-kit-2026/`. Copia directa de archivos al `BASEPATH/...` con `cp -rf images/. images/`.
7. **WP REST + metas privados:** WordPress por seguridad descarta silenciosamente metas con prefijo `_` (como `_elementor_data`) en escrituras REST, aunque devuelva 200. Para escribirlos necesitás un mu-plugin que los registre con `register_post_meta(..., 'show_in_rest' => true)`. Patrón usado en Dimapar: `dimapar-rest-meta.php` en `/wp-content/mu-plugins/`.
8. **Elementor 4.x acepta tanto `section/column` (legacy) como `container` (3.16+):** si el sitio tiene contenido viejo en formato section/column, inyectar containers nuevos puede causar que el editor descarte silenciosamente. Usar el mismo formato que la página ya tiene cuando inyectes `_elementor_data`.
9. **Elementor purga `<style>` en widgets HTML por seguridad** pero permite `<link rel="stylesheet">` y `<script src=...>`. Para inyectar CSS custom desde un widget HTML, subir el CSS como archivo externo y referenciarlo con `<link>`.
10. **ModSecurity del hosting bloquea uploads de `.css` y `.js` vía WP REST media** (HTTP 406). Para subir esos archivos hay que usar cPanel File Manager directamente, no automatizar vía REST.
11. **Proyecto Cotacachi/Intag Trail = SaaS nuevo, NO Otavalo Explorer:** si el usuario menciona la app de inscripciones, recordar que el desarrollo es en otro repo nuevo (no en `/App-registros-online`) y lo maneja otro Claude. Yo aquí solo manejo entregables comerciales.

---

## Notas técnicas de septiembre 2026

Todas comprobadas en producción, no teóricas.

### APIs de Google — el entorno

Las librerías no están en el Python del sistema. **Hay un venv en `.venv/` del repo**
(gitignored) con `google-auth`, `google-auth-oauthlib` y `google-api-python-client`. Se usa
`../.venv/bin/python` desde `tracking/`.

El **token OAuth expira cada 7 días** con la pantalla de consentimiento en modo prueba. Se
renueva con `rm tracking/token.json && .venv/bin/python tracking/auth.py`, que abre el
navegador. El usuario tiene que correrlo él.

**El alcance es solo de lectura** (`webmasters.readonly`): se puede consultar Search Console
e inspeccionar URLs, pero **no reenviar sitemaps**. Y pedir indexación de una URL **no existe
en la API** de Google, solo en la interfaz — hay que pedírselo al usuario.

### Elementor — la trampa que apareció cinco veces

Escribir `_elementor_data` por REST **guarda en la base pero no se ve en el sitio**: Elementor
sirve una copia cacheada y la escritura por API no dispara su hook de guardado.

Después de cualquier cambio hay que pedirle al usuario:
**wp-admin → Elementor → Herramientas → Regenerar archivos y datos**.

Detalle que costó un rato: el contenido guarda los acentos escapados, así que para buscar y
reemplazar hay que usar `"P\\u00e1ginas Web en Quito"`, no el texto con tilde.

Y el CSS de Elementor convierte `<b>` en bloque dentro de `td.desc`, así que **una negrita
dentro de una viñeta parte la línea en dos**.

### Yoast por API — necesita un mu-plugin

WordPress descarta silenciosamente los metas con prefijo `_` en escrituras REST, así que los
campos de Yoast no se pueden editar. Peor: **cambiar el título del post no cambia lo que se ve
en Google**, porque Yoast guarda el suyo aparte y ese es el que manda (el H1 sí cambia, el
`<title>` no).

La solución está en `creativeweb/fase-0/cw-yoast-rest.php`, lista para reusar.

⚠️ **No llamar a `do_action('wpseo_save_indexable', $post_id)`**: Yoast lo engancha a
`Indexable_Ancestor_Watcher::reset_children()`, que espera más argumentos, y provoca un error
fatal. El meta alcanza a guardarse y la petición devuelve 500, así que las escrituras quedan
a medias. Basta con borrar la fila de `wp_yoast_indexable`.

### Redirection — se instala entero por API

`POST /wp/v2/plugins {"slug":"redirection","status":"active"}` y después
`POST /redirection/v1/plugin/data {"upgrade":"retry"}` (el parámetro solo acepta
`stop`, `skip` o `retry`) para crear las tablas. Hay que repetirlo hasta que devuelva
`finish-install`.

Las redirecciones se crean con `POST /redirection/v1/redirect`. **El borrado por API no
funcionó** con ninguna de las formas probadas; hay que hacerlo desde wp-admin.

Para un catch-all de 404 se usa `match_type: "page"` con
`action_data: {"page":"404","url":"..."}` y regex en `url`. Así solo actúa sobre páginas que
no existen y no toca las vivas.

⚠️ **Filtrar `/wp-content/` al generar un mapa de redirecciones.** Search Console devuelve
archivos de imagen como si fueran páginas, porque aparecen en búsqueda de imágenes.
Redirigirlos es inofensivo —los estáticos no pasan por WordPress— pero ensucia la lista.

### Redirecciones — la regla que se aprendió fallando

**Verificar que el destino exista antes de crear el 301.** En OKCars se crearon
redirecciones hacia artículos que estaban programados y todavía no publicados: el resultado
era 301 → 404, que es peor que el 404 original.

Y al consolidar contenido: **enriquecer la página destino antes de redirigir hacia ella**.
Redirigir ocho artículos hacia una página delgada es una degradación, no una consolidación.

### publish_batch.py — el bug de los duplicados

El detector usaba `status=any`, que **no devuelve los posts programados**. Un relanzamiento
duplicaba todo el lote (pasó en Odontología Life con 20 posts). Ya está corregido en OKCars:
pide cada estado por nombre y pagina. **Verificar que la copia que se use tenga el arreglo.**

### Números de proforma

Se usan dos series: **1-2-13XX** para desarrollo y **1-6-XXXX** para hosting (la real de
hosting, vista en la proforma 1-6-2374 de junio 2026). La serie 1-2 la veníamos inventando;
si hay duda, preguntar el número que corresponde.

### Precios anuales de hosting — no multiplicar

| Plan | Anual | Correos | Disco |
|---|---|---|---|
| Inicial | $59,99 | 10 | 3 GB |
| Webmaster | $83,88 | 20 | 10 GB |
| Pymes | $95,88 | ilimitados | 20 GB |
| Pro (la web lo llama «Ilimitado») | $239,88 | ilimitados | ilimitado |
| Dominio .com | $21,99 | | |
| Dominio .com.ec / .ec | $48,99 | | |

Los $4,99 / $6,99 / $7,99 de la web son **valores mensuales de escaparate**; el anual no
siempre es esa cifra × 12. **La tienda manda**: es lo que efectivamente se cobra.

### Acceso a archivos del usuario

macOS bloquea iCloud, Escritorio y Descargas. Con el sandbox desactivado se puede abrir un
archivo suelto de Descargas si se conoce la ruta exacta, pero **no listar la carpeta**. Lo
práctico es pedirle que pegue la imagen con `Ctrl+V` o que deje el archivo en
`_entrada/` del repo (gitignored).
