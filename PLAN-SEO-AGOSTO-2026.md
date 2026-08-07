# Plan SEO agosto 2026 — decisiones de consolidación y próximos posts

Datos: GA4 + Search Console, **6 de mayo a 3 de agosto de 2026**.
Inventarios en `{cliente}/agosto-2026/inventario-posts.md` · diagnóstico previo en `ANALISIS-CANIBALIZACION-2026-08.md`.

Criterio de decisión: en cada par se **conserva la URL con más clics acumulados**, no la mejor escrita. El contenido bueno de la que se elimina se fusiona dentro de la que queda, y siempre va 301.

---

## 1. Luuma Rooftop

### 1.1 Consolidaciones — qué conservar y qué redirigir

| Tema | ✅ Conservar | ↪ 301 hacia la anterior |
|---|---|---|
| Platos típicos | `platos-tipicos-manta-ecuador` · 160 clics | `platos-tipicos-manabi-guia-definitiva` · 153 clics |
| Playas | `playas-manta-cual-elegir` · 44 clics | `playas-de-manta-ecuador` · 14 clics |
| Vida nocturna | `vida-nocturna-manta` · 80 clics | `manta-de-noche-que-hacer` · 1 clic |
| Restaurantes genérico | `mejores-restaurantes-manta-ecuador` · 58 clics | `restaurante-manta-segun-quien-vive-aqui` · sin datos |
| Cumpleaños | `restaurantes-cumpleanos-manta` · 31 clics | `celebrar-cumpleanos-manta-restaurantes` · 0 clics |
| Música en vivo | `eventos-musica-vivo-manta-agenda` · 27 clics | `musica-vivo-manta-este-mes` · 2 clics |
| Corviche | `corviche-manabita-receta` · 20 clics | `corviche-receta-tradicional` · sin datos |
| Vista al mar | `restaurantes-frente-al-mar-manta` · 14 clics | `cena-romantica-manta-vista-al-mar` · 1 clic<br>`restaurantes-vista-al-mar-ecuador` · 4 clics |
| Cerveza artesanal | `cerveza-artesanal-manta` · 7 clics | `cervezas-artesanales-ecuador-manta` · 5 clics |
| Desayunos | `desayunos-en-manta` · 6 clics | `desayunos-manabitas-manta` · sin datos |
| Brunch | `brunch-en-manta` · 564 impr | `brunch-domingo-manta` · sin datos |

**Almuerzos — 5 posts, consolidar a 2**
Conservar `menu-ejecutivo-manta-almorzar` (16 clics) y `almuerzos-manta-por-zona` (16 clics, enfoque por barrio, no compite).
301 hacia el primero: `restaurantes-almorzar-manta` · `almuerzo-en-manta` · `menu-del-dia-manta` (1 clic cada uno).

**Reservaciones — el duplicado literal**
`restaurantes-reservaciones-manta-2` tiene más impresiones (141 vs 53) pero **ambos están en cero clics**. Con esa diferencia la autoridad acumulada es despreciable, así que conviene quedarse con el **slug limpio** `restaurantes-reservaciones-manta`, pasarle el mejor contenido de los dos y redirigir el `-2`.

### 1.2 Rooftop — corrección del diagnóstico anterior

En el análisis previo marqué este cluster como el problema más caro. **Los datos lo desmienten:** los tres posts juntos suman 13 clics.

| URL | Clics | Impresiones | Posición |
|---|---:|---:|---:|
| `rooftop-manta-experiencia-gastronomica` | 7 | 561 | 5,9 |
| `rooftop-bar-ecuador` | 5 | 3.295 | 8,4 |
| `rooftop-manta-cuales-hay` | 1 | 174 | 5,0 |

El problema real no es que se canibalicen: es que **`rooftop-bar-ecuador` acumula 3.295 impresiones y solo convierte 5 clics**. Aparece y nadie entra. Ahí el trabajo es de título y meta description, no de consolidación.

Aun así conviene fusionar `rooftop-manta-cuales-hay` (1 clic) dentro de `rooftop-manta-experiencia-gastronomica`, y dejar `rooftop-bar-ecuador` como pieza aparte porque ataca una búsqueda nacional, no local.

### 1.3 Dónde está el dinero de Luuma

Las consultas con volumen real y CTR casi nulo:

| Consulta | Impresiones | Clics | Posición |
|---|---:|---:|---:|
| manta ecuador | 2.859 | 6 | 7,9 |
| manta | 2.628 | 2 | 11,2 |
| **best rooftop bars near me** | **2.624** | **0** | **7,8** |
| playas de manta *(+3 variantes)* | 2.823 | 7 | 7,9–9,6 |
| platos típicos de manabí *(+4 variantes)* | 3.220 | 35 | 5,7–8,5 |
| restaurantes manta | 483 | 7 | 8,0 |
| la quadra manta | 427 | 3 | 7,4 |

Tres lecturas:

1. **`best rooftop bars near me` — 2.624 impresiones, cero clics, posición 7,8.** Es una consulta en inglés: turistas extranjeros. Aparecemos y no entra nadie, casi seguro porque el snippet está en español. Vale la pena una versión en inglés o al menos un bloque que hable a ese visitante.
2. **El cluster de playas suma 2.823 impresiones y 7 clics.** Rankeamos para toda variante de "playas de Manta" y no convertimos. Después de consolidar los dos posts, este es el que más margen tiene.
3. **`la quadra manta` y `sushi manta`** son búsquedas de competidores y locales ajenos. Que aparezcamos ahí es bueno; hay que asegurarse de que el post que rankea los mencione con honestidad y ofrezca a Luuma como alternativa, sin sonar a autobombo.

---

## 2. Odontología Life

### 2.1 Consolidaciones

| Tema | ✅ Conservar | ↪ 301 |
|---|---|---|
| Implantes | `implantes-dentales-ecuador` · **337 clics, 16.654 impr** | `implantes-dentales` · sin datos |
| Ortodoncia comparativa | `ortodoncia-otavalo-brackets-o-alineadores` · 14 clics | `ortodoncia-invisible-vs-brackets-tradicionales` · sin datos |
| Prótesis | `protesis-dentales-modernas-comodidad-estetica` · 57 impr | `protesis-dental-ecuador-tipos-opciones` · sin datos |
| Carillas | `carillas-de-porcelana-vs-resina` · 66 impr | `odontologia-estetica-otavalo-carillas-resinas` · sin datos |
| Emergencias | `emergencias-dentales-dolor-muela-fractura` · 79 impr | `emergencias-dentales-que-hacer` · 49 impr |
| Endodoncia | `tratamiento-de-conducto-salvando-diente...` | `endodoncia-ecuador-guia-tratamiento-conducto` · 0 impresiones |
| Diseño de sonrisa | `diseno-sonrisa-con-inteligencia-artificial` · 15 impr | `diseno-de-sonrisa-digital` · `diseno-de-sonrisa-ecuador-procedimiento` |
| Limpieza dental | *ninguno tiene datos* — decidir por calidad del texto | |

`implantes-dentales-ecuador` genera **el 70% de todo el tráfico orgánico del sitio**. Cualquier movimiento sobre esa URL hay que hacerlo con cuidado: no tocar el slug, no cambiar el H1, no reestructurar. Solo se le fusiona contenido.

### 2.2 El hallazgo más importante de todo el análisis

Las cuatro únicas consultas con volumen y CTR bajo son **todas de precio**:

| Consulta | Impresiones | Clics | Posición |
|---|---:|---:|---:|
| blanqueamiento dental precio | 419 | 2 | 6,5 |
| cuánto cuesta un blanqueamiento dental | 266 | 0 | 5,3 |
| implante dental precio | 238 | 4 | 8,9 |
| implantes dentales precio | 238 | 4 | 11,0 |

**1.161 impresiones, 10 clics.** Rankeamos en primera página para gente que pregunta cuánto cuesta, y no entran — porque el título no promete el precio, y quien busca precio abre el resultado que se lo da.

Es la oportunidad más limpia de los tres sitios: **dos posts con rangos de precio reales**, uno de blanqueamiento y otro de implantes. Con rangos honestos ("entre $X y $Y según…"), qué incluye y qué lo encarece.

Requiere que el cliente entregue los precios. Sin eso no se puede escribir, y es exactamente lo que pide la regla 3 de `LINEAMIENTOS-CONTENIDO.md`.

---

## 3. OKCars

### 3.1 Borrar

**`hello-world`** — post de ejemplo de WordPress, publicado desde junio 2025 y en el sitemap.

### 3.2 Canibalización: no urgente

Los tres posts de *seminuevos Ibarra garantía* y los dos de *financiamiento* aparecen **sin datos** — no reciben impresiones. No se están canibalizando porque ninguno rankea todavía.

De los 21 posts, solo tres tienen tráfico:

| URL | Clics | Impresiones | Posición |
|---|---:|---:|---:|
| `checklist-revisar-auto-usado-antes-de-comprar` | 22 | 1.791 | 8,6 |
| `traspaso-vehiculo-ecuador-requisitos-pasos` | 17 | 4.052 | 7,6 |
| `primer-auto-ecuador-guia-primerizos` | 7 | 538 | 6,6 |

La única consulta con volumen es **`autos ok`** (1.713 impresiones, 30 clics) — o sea, marca.

**Diagnóstico:** el sitio no tiene un problema de canibalización sino de madurez. Los posts se publicaron en junio, llevan dos meses, y todavía no ganan posiciones. Corregir los duplicados de slug igual conviene hacerlo ahora que no cuesta nada, pero la prioridad aquí es **seguir publicando y esperar**, no consolidar.

`traspaso-vehiculo-ecuador-requisitos-pasos` con 4.052 impresiones y 17 clics es el que más margen tiene: trámite con demanda real y CTR de 0,4%. Revisar título y meta.

---

## 4. Orden de trabajo

**Esta semana — ✅ EJECUTADO el 2026-08-04**

| # | Acción | Estado |
|---|---|---|
| 1 | `hello-world` de OKCars (ID 1) | ✅ A papelera · verificado 404 en vivo |
| 2 | Duplicado `restaurantes-reservaciones-manta-2` de Luuma (ID 1701) | ✅ A papelera · verificado 404 · se conservó el slug limpio (ID 1665), que responde 200 |
| 3 | URL `blog` de Odontología Life | ✅ Revisada — **falsa alarma**, no se tocó |

Detalle del duplicado de Luuma: los dos posts (ID 1665 y 1701) se publicaron el mismo día, con **el mismo título y prácticamente el mismo texto** (423 y 424 palabras). Duplicado literal, sin ambigüedad.

Sobre el `blog` de Odontología Life: no es un post sino la **página índice del blog** (ID 184). Yoast incluye la página de entradas dentro de `post-sitemap.xml` por diseño, así que su presencia ahí es correcta. No había nada que corregir.

Ambos borrados fueron **a papelera, no permanentes** — se pueden restaurar desde `wp-admin` si hiciera falta.

**Siguientes dos semanas — consolidación**

> 🔴 **Bloqueo detectado.** Luuma y Odontología Life tienen instalado **Yoast SEO en su versión gratuita**, que **no incluye gestor de redirecciones** — esa función es de Yoast Premium. Hoy no hay forma de crear un 301 en ninguno de los dos sitios.
>
> Para las dos borradas esta semana no importó: `hello-world` no tenía tráfico y el duplicado de Luuma tenía 141 impresiones con cero clics, así que el 404 no cuesta nada.
>
> **Para la consolidación sí es obligatorio.** Varias URLs a redirigir tienen tráfico real — `platos-tipicos-manabi-guia-definitiva` acumula **153 clics**. Borrarla sin 301 tira ese tráfico a la basura en vez de traspasarlo.
>
> **Antes de tocar nada de esta fase:** instalar el plugin **Redirection** (gratuito, es el estándar) en Luuma y en Odontología Life. Alternativa: reglas en `.htaccess`, que necesita acceso a cPanel de cada sitio.

#### Registro de ejecución — Luuma (completado 2026-08-07)

Método: **trasplante** — se conserva la URL con autoridad y se le pasa el contenido del post nuevo, que resultó ser bastante mejor. Respaldo de los 29 posts en `luuma/agosto-2026/backup-consolidacion/`.

**Hallazgo que cambió el método:** los posts de junio-julio 2026 (el batch escrito con los briefs) son claramente superiores a los de diciembre 2025 — desglose por barrio, datos concretos, comparativas y secciones que recomiendan en contra de algo. Pero la autoridad SEO estaba en los viejos. Se resolvió conservando la URL vieja con el cuerpo del post nuevo.

| Resultado | |
|---|---|
| Trasplantes de contenido | **9** |
| Redirecciones 301 creadas | **15** (14 + vida nocturna) |
| Posts a papelera | **15** |
| Enlaces internos corregidos | **15 posts** |
| Enlaces rotos restantes | **0** ✅ |
| Posts publicados | 100 → **84** |

| Tema | Acción | URL conservada |
|---|---|---|
| Playas | Solo 301 | `/vida-en-manta/playas-manta-cual-elegir/` |
| Restaurantes genérico | Trasplante + 301 | `/gastronomia-manta/mejores-restaurantes-manta-ecuador/` |
| Cumpleaños | Trasplante + 301 | `/eventos-entretenimiento/restaurantes-cumpleanos-manta/` |
| Música en vivo | Trasplante + 301 | `/eventos-entretenimiento/eventos-musica-vivo-manta-agenda/` |
| Corviche | Trasplante + 301 | `/recetas-cocina/corviche-manabita-receta/` |
| Vista al mar | Trasplante + 301 | `/gastronomia-manta/restaurantes-frente-al-mar-manta/` |
| ↳ | Trasplante + 301 | `/gastronomia-manta/restaurantes-frente-al-mar-manta/` |
| Cerveza artesanal | Trasplante + 301 | `/cocteles-mixologia/cerveza-artesanal-manta/` |
| Desayunos | Trasplante + 301 | `/gastronomia-manta/desayunos-en-manta/` |
| Brunch | Trasplante + 301 | `/vida-en-manta/brunch-en-manta/` |
| Almuerzos | Solo 301 | `/gastronomia-manta/menu-ejecutivo-manta-almorzar/` |
| ↳ | Solo 301 | `/gastronomia-manta/menu-ejecutivo-manta-almorzar/` |
| ↳ | Solo 301 | `/gastronomia-manta/menu-ejecutivo-manta-almorzar/` |
| Rooftop | Trasplante + 301 | `/gastronomia-manta/rooftop-manta-experiencia-gastronomica/` |

Todas las 301 verificadas en producción: responden `301 → 200`.

**Platos típicos queda fuera a propósito.** Único par donde las dos URLs rinden (160 y 153 clics) y además una es Manta ciudad y la otra Manabí provincia. Se diferencian en vez de fusionarse.

**Pendiente:** revisar los títulos de las páginas trasplantadas. Por ejemplo `mejores-restaurantes-manta-ecuador` conserva el título "Los 10 Mejores Restaurantes…" pero el contenido nuevo está organizado por zonas, no como lista numerada de 10. No lo toqué porque cambiar el título de una página que rankea es riesgoso y merece decidirse aparte.

4. ✅ Consolidación de Luuma — completada
5. Ejecutar las 301 de Odontología Life, **empezando por las que no tocan `implantes-dentales-ecuador`**
6. Reescribir títulos y meta descriptions de las tres páginas con muchas impresiones y CTR bajo: `rooftop-bar-ecuador`, el cluster de playas y `traspaso-vehiculo-ecuador-requisitos-pasos`

**Contenido nuevo — por prioridad de retorno**
7. **Odontología Life: 2 posts de precios** (blanqueamiento e implantes) ← lo de mayor retorno inmediato
8. **Luuma: versión en inglés o bloque para visitante extranjero**, por las 2.624 impresiones de `best rooftop bars near me`
9. **OKCars: seguir el plan editorial normal.** Es el sitio que más necesita volumen y el que menos riesgo de canibalización tiene.

**Luuma: sostener la pausa de posts nuevos.** El diagnóstico se confirma con datos — 100 posts y las consultas de mayor volumen mal aprovechadas. Consolidar y optimizar snippets rinde más que el post 101.

---

## 5. Qué pedirle a cada cliente

| Cliente | Dato |
|---|---|
| Odontología Life | **Rangos de precio** de blanqueamiento e implantes, y qué los encarece. Bloquea los dos posts de mayor retorno. |
| Luuma | Confirmar si quieren atacar al turista extranjero en inglés |
| Todos | Una cita del equipo por cada 3-4 posts, según la regla 2 de `LINEAMIENTOS-CONTENIDO.md` |
