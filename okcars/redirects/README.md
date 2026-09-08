# Redirecciones de fichas vendidas — okcars.ec

## El problema

Cuando en OKCars se vende un vehículo, su ficha pasa a **borrador**. En WordPress un
borrador devuelve **404**: la página desaparece para el visitante y para Google.

Medido en Search Console (180 días, corte 2026-09-05): **el 87 % de las impresiones de
fichas de vehículo iban a páginas con error.**

| Ficha | Impresiones | Clics | Posición |
|---|---|---|---|
| changan-deepal-s05 | **865** | **17** | 6,9 |
| chery-tiggo-4 | 51 | 1 | 9,9 |
| grand-vitara | 19 | 0 | 6,6 |
| citroen-c5-aircross | 13 | 0 | 7,2 |
| ford-escape | 13 | 0 | 4,5 |

## Qué se hizo (2026-09-08)

Se instaló **Redirection 5.10.0** por API y se cargaron **12 redirecciones 301**.
Verificadas en vivo: las doce devuelven 200 en el destino final.

## ⚠️ Pendiente: reapuntar cuando se publiquen los artículos

Nueve redirecciones apuntan hoy a un **destino provisional**, porque su destino ideal es
un artículo todavía programado. Un 301 hacia un artículo `future` cae en 404, que es peor
que el 404 original.

Hay que volver a apuntarlas en estas fechas:

| Ficha | Destino provisional (hoy) | Destino final | Publica |
|---|---|---|---|
| changan-deepal-s05 | autos-chinos-usados-ecuador-guia | **deepal-s05-ecuador-precio** | 4-nov |
| ford-escape | /vehiculos-okcars/ | suv-o-sedan-usado-cual-conviene | 9-nov |
| grand-vitara | /vehiculos-okcars/ | suv-o-sedan-usado-cual-conviene | 9-nov |
| citroen-c5-aircross | /vehiculos-okcars/ | suv-o-sedan-usado-cual-conviene | 9-nov |
| x-trail | /vehiculos-okcars/ | suv-o-sedan-usado-cual-conviene | 9-nov |
| kia-sorento | /vehiculos-okcars/ | suv-o-sedan-usado-cual-conviene | 9-nov |
| captiva (vendida) | ficha de la Captiva en stock | chevrolet-captiva-turbo-usada-ecuador | 22-sep |
| aion-ut | ficha del BYD Tang en stock | byd-tang-electrico-usado-ecuador | 10-sep |
| toyota-prius-c-2013 | ficha del Prius C en stock | toyota-prius-c-usado-ecuador-kilometraje | 15-sep |

Las tres últimas apuntan a la unidad equivalente que sí está en stock, que
comercialmente funciona bien y puede quedarse así si se prefiere.

**El Deepal conviene resolverlo antes.** Son 865 impresiones que hoy llegan a la guía
genérica de autos chinos en vez del artículo específico. Adelantar la publicación de
`deepal-s05-ecuador-precio` cierra el tema de una vez.

## La solución definitiva

Redirigir conserva parte del valor, no todo: Google termina tratando una redirección
masiva hacia contenido genérico como error suave y suelta la URL.

Lo que no pierde nada es **mantener la ficha publicada, marcada como «Vendido»**. Hacen
falta tres cosas:

1. Un campo o taxonomía «estado» en el CPT `vehiculos-okcars`, desde JetEngine.
2. Excluir del listado y de los filtros los vehículos con ese estado.
3. En la plantilla de la ficha: distintivo «Vendido» en lugar del precio, aviso en lugar
   de los botones de contacto, y un bloque de vehículos similares disponibles.

Con eso la URL sigue devolviendo 200 y convierte la visita en vez de perderla.

## Archivos

- `redirecciones.json` — el mapa, con destino provisional y destino final.
- `okcars-fichas-vendidas.php` / `.zip` — alternativa sin plugin, por si algún día se
  quiere quitar Redirection. No está instalada.
