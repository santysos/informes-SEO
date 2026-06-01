# Descubrimiento REST API · Luuma Rooftop · 1 de junio 2026

Resultado de las 5 llamadas GET de descubrimiento. Auth: `admin@creativeweb.com.ec` con Application Password.

---

## ✅ Auth OK

- User ID: **1** (admin principal)
- Login: `admin@creativeweb.com.ec`
- Auth via Application Password funciona en REST API.

## ✅ IDs de categorías del blog

| ID  | Slug                      | Posts | Nombre                    |
|-----|---------------------------|-------|---------------------------|
| **9** | gastronomia-manta         | **29** | Gastronomía en Manta      |
| **10** | vida-en-manta             | 11    | Vida en Manta             |
| **11** | eventos-entretenimiento   | 7     | Eventos y Entretenimiento |
| **12** | recetas-cocina            | 10    | Recetas y Cocina          |
| **13** | cocteles-mixologia        | 9     | Cócteles y Mixología      |
| 1   | uncategorized             | 0     | Uncategorized (default)   |

Total: 66 posts (coincide con sitemap del 28-mar).

⚠️ **`gastronomia-manta` ahora tiene 29 posts**, no 22 como decía el análisis original. Subió desde marzo. Sigue siendo la categoría sobre-poblada que hay que consolidar en Fase 4.

## ✅ IDs de páginas

| ID    | Slug          | URL                                                         |
|-------|---------------|-------------------------------------------------------------|
| **23**  | (home)        | https://www.luumarooftop.com/                              |
| **26**  | menu          | https://www.luumarooftop.com/menu/                         |
| **1539** | menu-almuerzo | https://www.luumarooftop.com/menu-almuerzo/                |
| **371** | bebidas       | https://www.luumarooftop.com/bebidas/                      |

## ✅ IDs de los posts a tocar en Fase 1

| ID    | Slug                                        | Categoría destino   |
|-------|---------------------------------------------|---------------------|
| 1528  | que-hacer-manta-ecuador-guia-turistica      | vida-en-manta (10)  |
| 1677  | gastronomia-manabi-costa-ecuatoriana        | recetas-cocina (12) |
| 1633  | vida-nocturna-manta                         | eventos (11)        |
| 1529  | eventos-musica-vivo-manta-agenda            | eventos (11)        |
| 1535  | menu-ejecutivo-manta-almorzar               | gastronomia (9)     |
| 1526  | mejores-restaurantes-manta-ecuador          | gastronomia (9)     |
| 1614  | restaurantes-la-quadra-manta                | gastronomia (9) — CONTROL, no tocar |

## ✅ Settings del sitio

- **Title:** Luuma
- **Description:** Restaurant & Rooftop
- **Lang:** `es_ES` ⚠️ (debería ser `es_EC` para señal local Ecuador — fix opcional)
- **Timezone:** vacío ⚠️ (debería ser `America/Guayaquil`)
- **Show on front:** page (page ID 23)
- **Posts page:** 0 (los posts del blog usan archive default)

---

## 🔴 Hallazgo CRÍTICO — Yoast meta NO expuesto en REST

Lo que esperaba ver:
```
meta = { "_yoast_wpseo_title": "...", "_yoast_wpseo_metadesc": "...", ... }
```

Lo que devuelve la API:
```
meta = { "footnotes", "_elementor_edit_mode", "_elementor_template_type",
         "_elementor_data", "_elementor_page_settings", "_elementor_conditions" }
```

**Yoast NO registró sus metas con `show_in_rest=true`.** El sitio sí tiene Yoast (probado durante la auditoría de marzo) pero los metas no son escribibles vía REST.

Si intento PUT a `meta._yoast_wpseo_title`, WordPress devuelve 200 OK pero **descarta el valor silenciosamente** (mismo síntoma que tuvimos con Dimapar).

### Solución: mu-plugin

Hay que subir el archivo `luuma/junio-2026/wp-plugin/luuma-yoast-rest.php` a `/wp-content/mu-plugins/luuma-yoast-rest.php` en el servidor.

Patrón idéntico al `dimapar-rest-meta.php` que ya funcionó.

**Cómo subirlo (el cliente lo hace en 5 min):**
1. cPanel → File Manager
2. Navegar a `/wp-content/`
3. ¿Existe carpeta `mu-plugins`? Si no, crearla (permisos 755)
4. Subir `luuma-yoast-rest.php` ahí (permisos 644)
5. Sin activación — los mu-plugins se cargan automáticamente
6. Test: volver a correr `curl ... /posts/1528?context=edit` — debe aparecer `_yoast_wpseo_title` en meta

---

## 📌 Otros hallazgos relevantes

1. **Sitio usa Elementor en páginas estáticas** (home, /menu/, etc.). Los posts del blog NO usan Elementor, usan editor estándar — bueno, porque podemos modificar contenido vía REST sin tocar Elementor.

2. **El title actual del post #1528 ya es razonable:** "Qué Hacer en Manta Ecuador: Guía Turística Completa 2026". El problema no es ortográfico, es la falta de hook humano (no menciona Luuma, no menciona cifra concreta, no menciona experiencia local). El rewrite Fase 1 lo va a cambiar a "Qué hacer en Manta: 17 planes reales contados por quien vive aquí".

3. **Lenguaje del sitio en español de España (`es_ES`)** — Google lo usa como señal de targeting. Cambiar a `es_EC` (español de Ecuador) ayuda SEO local. Fix de 30 segundos en `wp-admin/options-general.php`.

4. **Timezone vacío** — afecta el horario de publicación de posts programados. Setear a `America/Guayaquil`.

---

## 📊 Acciones inmediatas

| # | Acción | Quién | Estado |
|---|---|---|---|
| 1 | Subir `luuma-yoast-rest.php` a `/wp-content/mu-plugins/` | Cliente vía cPanel | ⏳ pendiente |
| 2 | Setear language a `es_EC` en wp-admin | Cliente o Creative Web (via REST) | ⏳ pendiente |
| 3 | Setear timezone a `America/Guayaquil` | Cliente o Creative Web | ⏳ pendiente |
| 4 | Actualizar specs JSON con `category_id` reales | Creative Web | ✅ hecho 1-jun |
| 5 | Una vez mu-plugin esté arriba, correr `update_yoast_meta.py --apply` | Creative Web | ⏳ |
