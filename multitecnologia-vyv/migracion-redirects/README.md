# Multitecnología VYV — recuperación de direcciones rotas de la migración

Generado el 2026-09-17 con datos de Search Console (12 meses) del sitio nuevo.

## El diagnóstico

La tienda anterior era **PrestaShop**; la nueva es **WordPress + WooCommerce**. Al migrar,
**ninguna dirección vieja se redirigió**, así que todas dan 404 y Google sigue mostrándolas.

Estructura vieja (todas hoy en 404, verificado):

| Patrón viejo (PrestaShop) | Qué era | Ejemplo |
|---|---|---|
| `/NNN-nombre` | categoría | `/299-repuestos-laptop` |
| `/inicio/NNN-nombre.html` | ficha de producto | `/inicio/1803-vc-camara-web-720p-mod-q2.html` |
| `/content/N-...` | página de contenido | `/content/13-blog-...-fuente-de-poder` |
| `/contactenos`, `/iniciar-sesion`, `/2-inicio` | estáticas / home | — |

En 12 meses estas URLs suman ~**16.800 impresiones** perdidas. Las que más pesan:
el artículo de la **fuente de poder** (887 imp), **sobre nosotros** (421), **contáctenos**
(332) y las categorías top (repuestos-laptop, cable-de-impresora, hub-usb…).

## La solución — mapa completo

`mapa-redirecciones.json`: **100 redirecciones específicas + 3 regex** que cubren todo.

- **5 contenido/estáticas** — `/content/6-sobre-nosotros` → `/nosotros/`; el blog de la fuente
  de poder → `/categoria-producto/fuente-de-poder-pc/` (no hay blog nuevo); `/contactenos` →
  `/contactanos/`; `/iniciar-sesion` → `/mi-cuenta/`; `/portafolio-de-marcas/` → `/tienda/`.
- **95 categorías** `/NNN-nombre` → su `/categoria-producto/{slug}/` real (emparejadas por
  nombre; 90 con coincidencia exacta, 19 rescatadas a mano —«te-hp» = teclado HP →
  `teclado-laptop`, etc.—). Solo 5 sin categoría clara van a `/tienda/`.
- **3 regex catch-all** para el resto sin listar una por una:
  - `^/inicio/\d+-.*\.html$` → `/tienda/` (los ~1.300 productos viejos)
  - `^/\d+-.+` → `/tienda/` (cualquier categoría vieja no mapeada)
  - `^/2-inicio` → `/tienda/` (home/paginación vieja)

Todas son **301** y apuntan a una página que responde la misma intención (no al home en
bloque, que Google trataría como soft-404).

## Cómo se aplica

`aplicar.py` — instala el plugin Redirection por API, crea las tablas y carga las 100
específicas + las 3 regex. Necesita el **Application Password de admin** de
`multitecnologiavyv.com` en `.env`:

```
MVYV_WP_BASE=https://multitecnologiavyv.com/wp-json/wp/v2
MVYV_WP_USER=<usuario admin>
MVYV_WP_APP_PASS=<application password>
```

Pendiente: que el cliente/us genere ese Application Password para ejecutar.
