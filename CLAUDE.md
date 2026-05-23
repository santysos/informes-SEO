# CLAUDE.md — Repositorio informes-SEO

Contexto operativo para futuras sesiones de Claude trabajando en este repo. Última actualización: 2026-05-23.

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
- **GTM instalado y activo** (mismos eventos que CH: `whatsapp_click`, `form_submit`)

**Trabajo realizado por nosotros (abril-mayo 2026):**
- 20 posts publicados vía REST API (IDs 1110-1130, fechas escalonadas 1-abr a 28-may, uno cada 3 días). 17 con status `publish`, 3 con `future` (los del 22, 25 y 28 de mayo).
- 5 categorías creadas (IDs 42-46): Guías de compra, Modelos y comparativas, Financiamiento, Trámites, Seminuevos en Ibarra.
- ~80 tags nuevos.
- ~30k palabras de contenido total.

**Pendientes documentados:**
- URLs antiguas `/usados/` → 404 (necesitan redirect 301 a `/vehiculos-okcars/`)
- Mejorar copy del home (recibe 40 % del tráfico orgánico)
- Marcar `whatsapp_click` y `form_submit` como **conversiones clave** en GA4

---

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
│   ├── marzo-2026/
│   │   ├── index.php                 # Informe principal (login: CH-Hidrobo-2026)
│   │   ├── avance-mayo.php           # Tab "Avance Mes 1" agregado en mayo 2026
│   │   ├── login.php, logout.php, .htaccess
│   │   └── data/                     # CSVs de GA4 + Search Console (gitignored)
│   ├── nueva-home/                   # Preview del rediseño de home (no requiere login)
│   │   ├── preview.html, home.php, copy.md, schema.json, ...
│   │   └── images/
│   └── registro-mensual/2026-03-marzo.md   # Registro de trabajo del mes
└── okcars/
    └── abril-2026/
        ├── publish_batch.py          # Publicador de posts con WAF-safe delays
        └── posts/                    # 20 specs JSON (post-01 + spec-02..20)
```

### Informe CH-OKCars en vivo

- **URL pública:** `https://creativeweb.com.ec/informes/comercial-hidrobo/marzo-2026/`
- **Login password:** `CH-Hidrobo-2026` (hardcodeada en `login.php`)
- **Tabs disponibles:**
  1. Resumen Ejecutivo
  2. Comercial Hidrobo (diagnóstico marzo)
  3. OKCars (diagnóstico marzo)
  4. Plan 6 Meses
  5. Mes 1: Abril (acciones)
  6. Contenido: Abril y Mayo (los 40+40 títulos del plan)
  7. **📊 Avance Mes 1 (Abr-May)** ← agregado en mayo 2026 con métricas reales
- **Preview nueva home CH:** `https://creativeweb.com.ec/informes/comercial-hidrobo/nueva-home/` (sin login)

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
- **Confidencialidad:** datos crudos de GA4 / Search Console del cliente NO van al repo (están en `.gitignore`). Application Passwords NO van al repo (están en `.env`).

---

## Notas técnicas para próximas sesiones

1. **OKCars WAF:** si vas a hacer muchos requests, usa el patrón del `publish_batch.py` (delays de 8s/25s, User-Agent navegador, no curl).
2. **cPanel deploy NO automático:** después de cualquier push relevante, recordar al usuario que ejecute "Update from Remote" + "Deploy HEAD Commit". Verificar tras 1-2 min con curl al sitio en vivo.
3. **Search Console + GA4 integration:** GA4 ofrece exports que ya cruzan datos de Search Console (con métricas combinadas). Es la fuente más rica para informes — pedirlos en lugar de pedir GSC por separado.
4. **CSVs con cabecera de comentarios:** los exports de GA4 traen 8-10 líneas comenzadas en `#` antes del header real. Hay que saltarlas al parsear.
5. **Yoast meta vía REST:** Yoast acepta `meta._yoast_wpseo_title`, `meta._yoast_wpseo_metadesc`, `meta._yoast_wpseo_focuskw` en el payload de creación de post — pero a veces los ignora silenciosamente. Si es crítico optimizar SEO de cada post, el usuario tiene que confirmar en /wp-admin que se guardaron.
6. **Para nueva preview/landing pública sin login:** patrón usado en `nueva-home/` y `reina-de-otavalo/media-kit-2026/`. Copia directa de archivos al `BASEPATH/...` con `cp -rf images/. images/`.
