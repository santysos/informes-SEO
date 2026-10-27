# Multitecnología VYV — Blog, tanda 1 (octubre-noviembre 2026)

Primer mes del plan SEO de 3 meses (contrato CW-SEO-RUC-2026-MVY): 20 artículos enfocados en
«distribuidor de tecnología al por mayor» en Quito/Ecuador y en las búsquedas de producto que
Search Console mostró con impresiones y sin clics.

- `specs/` — los 20 artículos (JSON). `publish_batch.py` los publica: imagen destacada + imagen
  interna de Pexels (WebP), tarjetas de productos reales, 2 CTA (WhatsApp 0984072123 + cuenta
  comercial), FAQ con schema. Publicados con fecha pasada, uno por día del 6 al 25 de octubre (`retrofechar.py`).
  `--rearmar` regenera el HTML de los ya publicados sin tocar imágenes.
- `build_blog_elementor.py` — plantilla de entrada única (13112), archivo de categorías/etiquetas
  (13115), página /blog/ (13117) y sección «Guías para tu negocio» al final del home (id
  `blog-home`). Respaldo del home en `backups/home-8-antes.json`.
- Medición: Código personalizado de Elementor 13093 → `whatsapp_click` (evento clave) y
  `cta_click`, con dimensiones `pagina`, `cta_ubicacion`, `tipo_pagina`, `cta_texto`
  (GA4 properties/551482124). En los artículos, `cta_ubicacion` = `blog-medio`, `blog-final`,
  `blog-producto`, `blog-*-cuenta`.

## Trampas de este sitio (verificadas 2026-10-26)

- Al **crear** un post por REST se descartan categorías, etiquetas, imagen destacada y metas;
  en una **actualización** posterior sí se guardan. El script lo hace en dos pasos.
- El hosting (InMotion) responde ~12 s por petición y da 503/504 o corta la lectura bajo
  carga aunque guarde. Reintentar solo lecturas y actualizaciones, nunca creaciones.
- Las condiciones de plantillas de Elementor se guardan con
  `PUT /elementor/v1/site-editor/templates-conditions/{id}`; escribir solo el meta no aplica.
- Widgets de tema (título, extracto, imagen, título de archivo) necesitan su `__dynamic__`;
  el widget Archive Posts usa `_skin: archive_cards` y prefijo `archive_cards_`.
