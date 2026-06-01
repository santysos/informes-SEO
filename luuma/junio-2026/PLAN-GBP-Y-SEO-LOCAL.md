# Plan SEO Local — Luuma Rooftop · Junio 2026

Acciones de SEO local que NO se hacen via REST API y necesitan trabajo manual o decisiones del cliente.

---

## 🔴 P0 — Esta semana (alto impacto, bloquea pack local)

### 1. Subir `luuma-schema-local.php` a mu-plugins
Archivo: `luuma/junio-2026/wp-plugin/luuma-schema-local.php`
- Destino: `/wp-content/mu-plugins/luuma-schema-local.php`
- Permisos: 644
- Inyecta JSON-LD `Restaurant` + `Menu` con precios reales

**Validar después de subir:**
1. https://search.google.com/test/rich-results — pegar https://www.luumarooftop.com/
2. Buscar bloque "Restaurant" en resultados — debe aparecer con NAP, horarios, priceRange.
3. Probar también /menu/ y /bebidas/ → debe detectar Schema `Menu` con MenuItems.

**Si algún dato necesita corrección** (dirección exacta, horarios, coordenadas geo), edito el array `luuma_nap()` y vuelvo a subir.

### 2. Google Business Profile (GBP)

**Si NO existe perfil aún:**
1. Ir a https://business.google.com/create
2. Buscar "Luuma Rooftop" → debe decir "no encontrado"
3. Crear nuevo, llenar:
   - Nombre: `Luuma Rooftop`
   - Categoría primaria: `Restaurante`
   - Categorías secundarias: `Restaurante de mariscos`, `Bar`, `Restaurante latinoamericano`
   - Dirección: `Av. Flavio Reyes, Manta, Manabí, Ecuador` (confirmar exacta)
   - Sí servimos a clientes en mi dirección
   - Teléfono: `+593 96 348 5983`
   - URL: `https://www.luumarooftop.com`
4. Elegir método de verificación:
   - **Postal** (más confiable): tarjeta con código llega en 14-21 días
   - **Video**: grabas un video mostrando el local + interior + tu rostro en el rooftop. Se aprueba en 5-7 días si el video cumple
5. Mientras llega la verificación, NO se puede editar nada — esperar.

**Si YA existe perfil:**
- Pedir al dueño actual que agregue a Creative Web como gestor: en GBP → Usuarios → Agregar (correo @creativeweb.com.ec con permiso "Gerente")

### 3. Marcar conversiones clave en GA4 (5 min en GA4 web)
- Admin → Conversiones → marcar como conversión:
  - `whatsapp_click` (ya está enviándose)
  - `form_submit` (si existe)
  - Crear evento personalizado `menu_view` que se dispare en /menu/, /menu-almuerzo/, /bebidas/
  - Crear evento `reservation_click` en cualquier link a WhatsApp

---

## 🟠 P1 — Semanas 2-4 (autoridad local)

### 4. Setup completo de GBP (una vez verificado)
- **Horarios reales** por día + horarios especiales (feriados, cierre evento privado)
- **25+ fotos categorizadas:**
  - Interior (5+)
  - Exterior y fachada (3+)
  - Equipo trabajando (3-5) — sin rostros si prefieren
  - Platos signature (8+)
  - Atardecer / ambiente (4+)
- **Atributos:**
  - ✅ terraza al aire libre
  - ✅ reservaciones
  - ✅ vista al mar
  - ✅ vegetariano disponible
  - ✅ apto para grupos
  - ✅ ambiente nocturno
  - ✅ música en vivo
  - ✅ pago con tarjeta
- **Q&A pre-pobladas (8-10):** crear estas preguntas vía GBP web para anticipar dudas
  - ¿Tienen vista al mar?
  - ¿Aceptan reservaciones?
  - ¿Cuál es el rango de precios por persona?
  - ¿Tienen menú vegetariano?
  - ¿A qué hora abren?
  - ¿Tienen estacionamiento?
  - ¿Aceptan tarjeta?
  - ¿Hay música en vivo?
  - ¿Aceptan grupos?
  - ¿Cómo reservo mesa?

### 5. 5 directorios prioritarios (NAP idéntico copiado del Schema)

| # | Directorio | URL | Setup |
|---|---|---|---|
| 1 | Apple Maps Connect | https://mapsconnect.apple.com | Crear perfil, vinculado a Apple ID |
| 2 | TripAdvisor | https://www.tripadvisor.com | Reclamar listing o crear |
| 3 | Facebook Page | https://facebook.com | Reclamar página + agregar info NAP completo |
| 4 | Instagram Business | https://business.instagram.com | Convertir cuenta personal a business |
| 5 | The Fork (ex Restorando) | https://www.thefork.com.ec | Crear restaurante con reservaciones |

**Regla crítica:** copiar el NAP idéntico (mismo formato de dirección, mismo número de teléfono) en los 5. Cualquier inconsistencia perjudica el ranking local.

### 6. Sistema de reseñas Google
- Generar link corto: `g.page/r/{ID-DEL-NEGOCIO}/review`
- QR físico en mesa + cuenta + recepción
- Mensaje WhatsApp post-visita (automatizable con `whatsapp_click`):
  > "Gracias por venir a Luuma. Si tu experiencia fue buena, una reseña en Google nos ayuda mucho a seguir mejorando: [link]"
- Protocolo de respuesta a reseñas: SLA <24h, plantilla por rango (5⭐ vs 3⭐ vs 1⭐)

**Meta:** 30 reseñas / 4,6⭐+ a 3 meses · 80 reseñas / 4,7⭐+ a 6 meses

---

## 🟡 P2 — Mes 2-3 (consolidación)

### 7. 9 directorios secundarios

- Yelp
- Foursquare / Swarm
- Waze (para que aparezca en navegación)
- Bing Places
- Páginas Amarillas Ecuador
- Cámara de Turismo Manabí (asociación local — autoridad)
- Guías turísticas Manta (local)
- Tripadvisor Restaurantes (versión nicho)
- ZomatoLite (descontinuado pero igual reclamar URL)

### 8. Eventos en GBP (Schema MusicEvent)
Para los viernes y sábados con música en vivo: crear el evento en GBP Posts → seleccionar tipo "Evento". Esto:
- Aparece como bandera en el panel de búsqueda
- Schema MusicEvent automático
- Aparece en Google Calendar de quien lo guarde

### 9. Optimización Instagram Bio link
- Crear página `/ig/` o usar Linktree pero **branded**
- Botones grandes (criterio touch target 44px):
  - 📅 Reservar (WhatsApp)
  - 🍽️ Ver carta
  - ⭐ Reseñas (Google)
  - 📍 Cómo llegar (Maps)
  - 🎵 Música este fin de semana
- UTM en todos: `?utm_source=instagram&utm_medium=bio&utm_campaign=organic`

---

## Schema técnico inyectado (resumen)

Con el mu-plugin `luuma-schema-local.php` ya tendrás:

| Tipo | Dónde aparece | Datos |
|---|---|---|
| `Restaurant` | TODAS las páginas | NAP, horarios, telephone, geo, priceRange, servesCuisine, paymentAccepted, acceptsReservations |
| `Menu` (food) | /menu/ (id 26) | 3 secciones, 9 platos con precios USD |
| `Menu` (drinks) | /bebidas/ (id 371) | 2 secciones, 17 items con precios |

Faltarían (lo dejamos para fase 3 cuando haya datos):
- `Event` / `MusicEvent` por presentación
- `AggregateRating` cuando GBP tenga 5+ reseñas
- `FAQPage` por post con FAQ (ya viene incluido en el contenido del post, Google lo detecta solo)

---

## KPIs a medir desde la próxima semana

- **CTR de los 8 posts/pages con rewrite Yoast** (filtro por URL en GSC, baseline vs post-cambio a 14 días)
- **Impresiones por query "rooftop manta"** (defensa de categoría)
- **% de tráfico no-brand** (baseline 26%, meta 35% a 3 meses, 45% a 6 meses)
- **Apariciones en pack local de Google Maps** (búsquedas: rooftop manta, restaurante manta, donde cenar manta)
- **Reseñas Google nuevas** (objetivo 10-15 por mes una vez GBP verificado)

Una vez tengamos GSC + GA4 con acceso editor, podemos automatizar el reporte mensual.
