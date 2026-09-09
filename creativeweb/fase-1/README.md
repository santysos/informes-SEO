# Fase 1 — triaje de contenido de creativeweb.com.ec

Generado el 2026-09-09 con datos de Search Console de los últimos 12 meses.

## El hallazgo que ordena todo

Nuestro propio blog está enterrando nuestras páginas de servicio.

| Grupo | URLs compitiendo | Impresiones | Clics | Posición de la página que vende |
|---|---|---|---|---|
| Correos corporativos | **33** | 13.000+ | 24 | **52** |
| Dominios | **36** | 25.080 | **5** | **30** |
| Hosting | 19 | 4.671 | **2** | **47** |
| Páginas web | **57** | 9.731 | 17 | — |

Google ve 33 páginas peleando por «correo corporativo», no sabe cuál es la principal, y
no posiciona bien ninguna. La que vende queda en la quinta página de resultados.

Esa es la explicación mecánica de por qué el contenido de SEO no vendió: **no es que no
sirviera, es que compitió contra nosotros mismos.**

## El reparto de las 353 URLs

| Cubo | URLs | Clics | Impresiones |
|---|---|---|---|
| Conservar | 45 | 982 | 158.194 |
| Fusionar | 29 | 43 | 19.380 |
| Consolidar | 68 | 0 | 14.849 |
| Reorientar (el post del «.com») | 1 | 337 | 1.049.410 |
| Archivos de etiqueta y categoría | 43 | 4 | 373 |
| Tienda | 167 | 18 | 3.095 |

Nueve URLs producen el 77 % de los clics. Veinte producen el 87 %.

## Qué se ejecuta ahora — 30 URLs

Solo donde el destino ya existe y responde a la misma intención.

| Grupo | URLs | Impresiones | Destino |
|---|---|---|---|
| Correos | 8 | 2.557 | `/servicios/correos-corporativos-empresariales/` |
| Dominios | 7 | 10.408 | `/servicios/venta-dominios-ecuador-comprar-dominio/` |
| Hosting | 5 | 1.199 | `/servicios/hosting-web-…/` |
| Páginas web | 10 | 1.293 | `/servicios/paginas-web/` |

Detalle en `redirecciones-ahora.json`.

### ⚠️ El orden importa: primero enriquecer, después redirigir

Las páginas de servicio son delgadas. Si redirigimos ocho artículos de correos hacia una
página de servicio que no dice casi nada, Google ve una degradación y perdemos lo que esos
artículos habían ganado.

La secuencia correcta es:

1. **Absorber el contenido útil** de los artículos que se van a fusionar dentro de su página
   de servicio, que pasa a ser la pieza completa del tema.
2. **Recién entonces redirigir** con 301.
3. Verificar que ninguna redirección apunte a una página que no exista o que no responda la
   intención de la búsqueda original.

Saltarse el paso 1 convierte una consolidación en una pérdida.

## Qué NO se toca todavía

**28 URLs de SEO · 14.083 impresiones.** No existe aún una página de servicio de SEO.
Mandarlas a «páginas web» sería un destino que no responde lo que buscan. Esperan a la
Fase 2, que es justamente cuando se crea esa página.

**32 URLs sin tema dominante · 3.503 impresiones.** Redirigirlas en bloque al home es el
error de la «redirección genérica»: Google lo trata como error suave y suelta la URL igual.
Hay que revisarlas una a una.

**7 páginas estructurales, excluidas del triaje por completo:**
`/contactanos/`, `/quienes-somos/`, `/blog/` y su paginación.

**El post del «.com»** conserva su dirección. Su tráfico no sirve, pero carga el 84 % de la
autoridad del dominio.

## Correcciones manuales sobre la clasificación automática

El script clasificó por el tema dominante de las consultas, y se equivocó en tres casos que
se corrigieron a mano:

- `/la-importancia-de-renovar-tu-dominio…/` estaba en «páginas web», es de dominios.
- `/optimizar-pagina-web-para-google/` estaba en «páginas web», es de SEO.
- `/estudio-de-palabras-clave-en-ecuador/` estaba sin tema, es de SEO.

Y barrió `/contactanos/` y `/quienes-somos/` hacia el cubo de consolidar porque tienen pocos
clics. Son páginas estructurales y quedaron excluidas.

## Archivos

- `inventario.json` — las 353 URLs con métricas y cubo asignado
- `mapa-redirecciones.json` — el mapa completo, con las correcciones aplicadas
- `redirecciones-ahora.json` — las 30 listas para ejecutar
- `redirecciones-en-espera.json` — las que esperan a la Fase 2
