# Entrega — 10 posts SEO Dimapar (agosto 2026)

Publicados el 11-ago-2026 vía WP REST API como **borradores**. Los publica el cliente.
Usuario API: `admin@creativeweb.com.ec`. Categorías creadas: Guías de compra (48),
Llanteras y vulcanizadoras (49), Talleres automotrices (50), Mantenimiento de equipos (51).

Yoast SEO **sí** acepta los meta por REST: título SEO, meta description y focus keyword
quedaron guardados en cada entrada. No hay que pegar nada a mano.

| ID | Título | Slug | Palabra clave | Cat. |
|---|---|---|---|---|
| 496 | Cuánto cuesta montar una vulcanizadora en Ecuador: presupuesto real 2026 | `cuanto-cuesta-montar-vulcanizadora-ecuador` | montar una vulcanizadora en Ecuador | 49 |
| 497 | Balanceadora de llantas: cuál comprar según las llantas que mueve tu taller | `balanceadora-de-llantas-cual-elegir` | balanceadora de llantas | 48 |
| 498 | Desenllantadora: precios reales en Ecuador y cómo elegir sin pagar de más | `desenllantadora-de-llantas-tipos-precios` | desenllantadora | 48 |
| 499 | Parche radial o diagonal: cuál usar en cada daño, con precios por unidad | `parche-radial-o-diagonal-guia` | parche radial o diagonal | 49 |
| 500 | Cemento vulcanizante: cuál comprar, cuánto rinde y los 4 errores que despegan parches | `cemento-vulcanizante-rendimiento-errores` | cemento vulcanizante | 49 |
| 501 | Alineadora 3D: cuándo se justifica invertir entre $7.900 y $17.500 | `alineadora-3d-cuando-invertir` | alineadora 3d | 48 |
| 502 | Elevador para taller: 2 postes, 4 postes o tijera | `elevador-para-taller-guia` | elevador para taller | 48 |
| 503 | Calibración y mantenimiento de balanceadora y desenllantadora | `calibracion-mantenimiento-balanceadora-desenllantadora` | mantenimiento de balanceadora | 51 |
| 504 | Equipar un taller de llantas para camiones en Ecuador | `equipar-taller-llantas-camiones` | taller de llantas para camiones | 50 |
| 505 | Herramientas de taller: en qué gastar y en qué no | `herramientas-taller-en-que-gastar` | herramientas de taller | 50 |

## Cumplimiento del brief

- **Extensión:** 1.205–1.427 palabras (brief pide 1.200–1.800).
- **HTML:** solo `h2 h3 p ul li strong em table a blockquote cite`. Sin `div`, clases, `style` ni bloques Gutenberg.
- **Un solo H1:** lo pone el título; el contenido arranca en H2.
- **Enlaces internos:** 3–5 por post a `/categoria-producto/*`, `/contacto/`, `/soporte/`, `/catalogo/`,
  con ancla descriptiva, más enlaces a fichas de producto. Los 69 enlaces se verificaron con HEAD 200
  antes de publicar (se corrigió el slug del tanque recolector Thyson, que daba 404).
- **Datos:** todos los precios salen del catálogo real (snapshot de auditoría WooCommerce). No se
  inventó stock, plazos ni especificaciones. Los equipos sin precio publicado dicen "consultar".
- **Terminología ecuatoriana:** llanta, aro, desenllantadora, vulcanizadora, tecnicentro, elevador.
- **Contacto:** WhatsApp +593 96 866 3866 en todos los CTA; dirección av. Maldonado S59-100, Guamaní.
- **Sin imágenes destacadas todavía** — ver pendientes.

## Pendientes para el cliente

1. **Imagen destacada** de cada post (con `alt_text`). Sirven fotos de los equipos o del local.
2. **Nombre y cargo real** para las citas: hoy van atribuidas a "Equipo técnico de Dimapar Ecuador".
   Con un nombre real (p. ej. el jefe técnico) ganan bastante credibilidad.
3. **Revisar y publicar** los 10 borradores desde wp-admin.
4. Confirmar que los precios siguen vigentes: se tomaron del catálogo en agosto de 2026.
