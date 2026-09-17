# Fase 3 — las URLs «sin tema dominante»

Ejecutada el 2026-09-17. Cierra el pendiente que quedó de la Fase 1.

## El punto de partida

La Fase 1 dejó **32 URLs «sin tema dominante»** (~3.500 impresiones) sin tocar, porque
mandarlas en bloque al home es el error de la «redirección genérica» (Google lo trata como
soft-404 y suelta la URL igual). Había que revisarlas **una a una**.

## Qué se encontró al revisarlas con datos

De las candidatas «sin tema» quedaban vivas (200) solo **13 URLs de contenido** (3.421
impresiones). Al sacar la consulta real de cada una en Search Console, el veredicto fue claro:
**casi todas tienen cero clics y consultas sueltas, sin demanda comercial**. Redirigirlas
todas habría sido intención equivocada.

Lo demás que aparecía en la lista se descartó por regla: **imágenes `/wp-content/`** (Search
Console las muestra como páginas), **paginación** (`/blog/2/`…), **páginas estructurales**
(`/contactanos/`, `/quienes-somos/`, `/soporte/`) y **subdominios** de otros sitios.

## Lo ejecutado — 4 consolidaciones

Solo las 4 que son posts delgados sobre el tema comercial «páginas web / diseño web», que sí
canibalizan la página de servicio. Cada una: se despublicó el post y se creó un 301 a la
página de servicio ya enriquecida (Fase 1). **Verificadas en vivo.**

| URL consolidada | → destino |
|---|---|
| `/landing-pages-efectivas-2025/` | `/servicios/paginas-web/` |
| `/errores-en-sitios-web-que-afectan-ventas/` | `/servicios/paginas-web/` |
| `/desarrollo-web-profesional-…-codigo-limpio-y-eficiente/` | `/servicios/paginas-web/` |
| `/los-beneficios-de-un-sitio-web-100-responsivo-…-en-2024/` | `/servicios/paginas-web/` |

## Lo que se conservó (9) y por qué

- **Caso de éxito Comercial Hidrobo** — prueba social, se queda.
- **Howtos técnicos** (backup automático, firewall, contraseñas seguras, instalar Google
  Analytics, actualizaciones de WordPress, subir producto en WooCommerce) — informativos,
  no canibalizan ninguna página comercial; redirigirlos a una página de venta sería
  intención equivocada.
- **Chatbots vs WhatsApp Business** — Creative Web no vende chatbots; sin destino natural.
- **Progressive Web Apps** — consultas navegacionales/basura, sin valor comercial.

## Notas para wp-admin

- Al crear los primeros redirects se usaron 2 slugs **truncados** del JSON de la Fase 1
  (`redirecciones-en-espera.json`); quedaron **2 reglas inertes (ids 59 y 62)** que apuntan
  desde slugs que no existen. Son inofensivas, pero conviene **borrarlas desde wp-admin**
  (el borrado de redirecciones por API no funciona).
- La verificación de un 301 debe hacerse **sin** query string: un `?cb=` rompe el match
  exacto de Redirection y devuelve 404 engañoso.

## Estado del sitio tras la Fase 3

- **62 redirecciones activas** (58 previas + 4 nuevas).
- Pendiente menor: los **43 archivos de etiqueta/categoría** (373 impresiones) → poner
  `noindex`.
- **Medición a fin de octubre** contra la línea base del 8-sep (1.239.269 impresiones ·
  1.384 clics · CTR 0,11 % · pos 6,5).
