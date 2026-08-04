# Análisis de canibalización SEO — agosto 2026

Fuente: `post-sitemap.xml` de cada sitio, consultados el 2026-08-04.
Inventarios completos en `{cliente}/agosto-2026/inventario-posts.md`.

| Sitio | Posts publicados | Involucrados en solapamiento | Gravedad |
|---|---:|---:|---|
| Luuma Rooftop | 100 | ~45 | 🔴 Alta |
| Odontología Life | 54 | ~24 | 🟠 Media-alta |
| OKCars | 21 | ~6 | 🟡 Baja |

> **Alcance de este análisis.** Detecta solapamiento *de intención* comparando títulos y slugs — con esto basta para saber qué posts compiten entre sí. Para decidir **cuál conservar** en cada par hace falta el dato de Search Console que cruza consulta con página: se conserva el que ya tiene autoridad, no el que suena mejor. Ese cruce lo da la API de Search Console o, a mano, entrando a cada consulta y mirando la pestaña de Páginas.

---

## 1. Luuma Rooftop — 100 posts

37 publicados en junio y 63 en julio. Cien artículos en dos meses sobre una sola ciudad y un solo restaurante hace que el solapamiento sea inevitable, y se nota.

### 1.1 Duplicado literal — resolver ya

| Posts | Problema |
|---|---|
| `restaurantes-reservaciones-manta`<br>`restaurantes-reservaciones-manta-2` | El sufijo `-2` lo puso WordPress porque el slug ya existía. Son el mismo post publicado dos veces. |

**Acción:** borrar uno y redirigir 301 al que se conserve.

### 1.2 Pares casi idénticos

| Tema | Posts que compiten |
|---|---|
| Corviche | `corviche-manabita-receta` · `corviche-receta-tradicional` |
| Cerveza artesanal | `cerveza-artesanal-manta` · `cervezas-artesanales-ecuador-manta` |
| Brunch | `brunch-en-manta` · `brunch-domingo-manta` |
| Playas | `playas-de-manta-ecuador` · `playas-manta-cual-elegir` |
| Platos típicos | `platos-tipicos-manta-ecuador` · `platos-tipicos-manabi-guia-definitiva` |
| Cumpleaños | `celebrar-cumpleanos-manta-restaurantes` · `restaurantes-cumpleanos-manta` |
| Vida nocturna | `vida-nocturna-manta` · `manta-de-noche-que-hacer` |
| Cena con vista al mar | `cena-romantica-manta-vista-al-mar` · `cenar-manta-vista-mar-restaurantes-romanticos` |
| Desayunos | `desayunos-en-manta` · `desayunos-manabitas-manta` |

**Acción:** consolidar en uno, 301 del otro.

### 1.3 Clusters saturados

**Almuerzos — 5 posts para la misma intención**
`almuerzo-en-manta` · `almuerzos-manta-por-zona` · `menu-del-dia-manta` · `menu-ejecutivo-manta-almorzar` · `restaurantes-almorzar-manta`

**Romántico y pareja — 5 posts**
`actividades-pareja-manta-romantico` · `planes-en-pareja-manta` · `restaurantes-romanticos-manta` · `cena-romantica-manta-vista-al-mar` · `cenar-manta-vista-mar-restaurantes-romanticos`

**Vista al mar — 4 posts**
`restaurantes-frente-al-mar-manta` · `restaurantes-vista-al-mar-ecuador` + los dos de cena romántica de arriba

**Rooftop — 3 posts**
`rooftop-bar-ecuador` · `rooftop-manta-cuales-hay` · `rooftop-manta-experiencia-gastronomica`
*Crítico: es la keyword principal del negocio. Tener tres URLs compitiendo por ella es lo más caro de esta lista.*

**Música en vivo — 3 posts**
`eventos-musica-vivo-manta-agenda` · `musica-vivo-manta-este-mes` · `restaurantes-musica-vivo-manta`

**Mariscos — 3 posts**
`comida-de-mar-manta` · `mariscos-manta-ceviches-platos-mar` · `mariscos-baratos-manta-donde-comer`

**Qué hacer — 4 posts**
`que-hacer-manta-ecuador-guia-turistica` · `que-hacer-fin-de-semana-manta` · `planes-familia-manta-fin-de-semana` · `feriados-largos-manta-que-hacer`

**Restaurantes genérico — 3 posts por la keyword de cabecera**
`mejores-restaurantes-manta-ecuador` · `restaurante-manta-segun-quien-vive-aqui` · `restaurantes-baratos-manta`

### 1.4 Lo que sí está bien

El grueso de los `restaurantes-{modificador}-manta` (pet-friendly, wifi, estacionamiento, grupos grandes, terraza, vegetarianos, eventos privados, La Quadra, cerca del malecón) **no es canibalización**: cada uno responde a una búsqueda distinta y específica. Ese patrón está bien ejecutado y hay que conservarlo.

Las recetas (viche, sancocho, encocado, bollo, salsa de maní, ceviche manabita) tampoco compiten entre sí ni con los de "dónde comer": intención informacional contra comercial. Correcto.

---

## 2. Odontología Life — 54 posts

### 2.1 Pares a consolidar

| Tema | Posts que compiten |
|---|---|
| Implantes dentales | `implantes-dentales` · `implantes-dentales-ecuador` |
| Limpieza dental | `limpieza-dental-profesional-beneficios` · `limpieza-dental-otavalo-beneficios` |
| Emergencias | `emergencias-dentales-que-hacer` · `emergencias-dentales-dolor-muela-fractura` |
| Prótesis | `protesis-dental-ecuador-tipos-opciones` · `protesis-dentales-modernas-comodidad-estetica` |
| Diseño de sonrisa | `diseno-de-sonrisa-digital` · `diseno-de-sonrisa-ecuador-procedimiento` |

### 2.2 Endodoncia — 4 posts

`endodoncia-ecuador-guia-tratamiento-conducto` · `tratamiento-de-conducto-salvando-diente-del-dolor-y-la-extraccion` · `sintomas-que-indican-que-necesitas-una-endodoncia-urgente` · `duele-una-endodoncia-mitos-realidades`

Los dos primeros son el mismo tema con distinto nombre (endodoncia = tratamiento de conducto). Los otros dos son ángulos legítimos y se conservan.

### 2.3 Ortodoncia — 5 posts

`ortodoncia-invisible-vs-brackets-tradicionales` y `ortodoncia-otavalo-brackets-o-alineadores` resuelven la misma comparación. Los otros tres (duración, lingual, adultos) están bien diferenciados.

### 2.4 Otros solapamientos

- **Carillas:** `carillas-de-porcelana-vs-resina` vs `odontologia-estetica-otavalo-carillas-resinas`
- **Encías:** `enfermedad-periodontal-encias-inflamadas` vs `gingivitis-vs-periodontitis-tratamientos`

### 2.5 Limpieza pendiente

`blog` aparece en el sitemap de posts. Revisar si es un post vacío o una página mal clasificada; en cualquier caso no debería estar ahí.

---

## 3. OKCars — 21 posts

El sitio más sano de los tres, pero tiene el error más visible.

### 3.1 Borrar de inmediato

**`hello-world`** — es el post de ejemplo que crea WordPress al instalarse. Lleva publicado desde junio de 2025 y está en el sitemap, o sea que Google lo puede indexar. Borrarlo, no despublicarlo.

### 3.2 Duplicado real

| Posts | Problema |
|---|---|
| `autos-seminuevos-ibarra-con-garantia`<br>`autos-seminuevos-con-garantia-ibarra-que-cubre` | Misma keyword (*seminuevos Ibarra garantía*), mismo intent. Consolidar. |

Se suma `comprar-seminuevo-imbabura-respaldo`, que ataca la misma zona geográfica con otra palabra. Con Ibarra e Imbabura conviene definir cuál es la página principal y que la otra apunte a ella.

### 3.3 Solapamiento menor

- **Financiamiento:** `financiamiento-autos-usados-ecuador` vs `credito-directo-vs-credito-bancario-auto-usado` — el segundo es más específico; conservar ambos pero enlazar del general al específico.
- **Concesionario:** `concesionario-seminuevos-vs-comprar-particular` vs `senales-concesionario-seminuevos-confiable` — ángulos distintos, se conservan.

---

## 4. Qué hacer, en orden

### Prioridad 1 — esta semana, sin necesidad de más datos

1. Borrar `hello-world` de OKCars
2. Resolver `restaurantes-reservaciones-manta-2` en Luuma
3. Revisar `blog` en Odontología Life

### Prioridad 2 — requiere Search Console

Para cada par de la lista, sacar de Search Console qué URL recibe impresiones y clics para la consulta objetivo. Luego:

- **Conservar** la que tenga más autoridad acumulada, aunque el texto sea peor
- **Fusionar** el contenido bueno de la otra dentro de la que se conserva
- **301** de la eliminada hacia la que queda
- **Nunca** borrar sin redirigir: se pierde el enlazado y las señales acumuladas

### Prioridad 3 — antes de escribir nada nuevo

> **Recomendación de fondo: pausar los posts nuevos de Luuma.**
>
> Cien artículos en dos meses sobre una ciudad mediana ya saturó los temas obvios. Cada post adicional tiene alta probabilidad de chocar con uno existente, y mientras haya tres URLs peleando por *rooftop Manta* — la keyword del negocio — el esfuerzo rinde en contra.
>
> El trabajo de mayor retorno hoy no es escribir el post 101: es consolidar los 45 que se pisan y reforzar los que ya rankean.

Para Odontología Life y OKCars sí tiene sentido seguir produciendo, resolviendo en paralelo los pares listados.

---

## 5. Cómo evitar que vuelva a pasar

1. **Consultar el inventario antes de cada batch.** Los archivos `{cliente}/agosto-2026/inventario-posts.md` se regeneran desde el sitemap en segundos.
2. **Una keyword objetivo, una URL.** Registrar el focus keyword de cada post y no repetirlo nunca.
3. **Sospechar de los sinónimos.** Los peores casos de esta lista salieron de tratar como distintas dos formas de decir lo mismo: *endodoncia* y *tratamiento de conducto*; *almuerzo*, *menú del día* y *menú ejecutivo*; *vida nocturna* y *de noche*. Google las entiende como la misma búsqueda aunque a nosotros nos parezcan temas separados.
4. **Modificadores sí, sinónimos no.** `restaurantes-pet-friendly-manta` y `restaurantes-wifi-manta` conviven bien porque responden a necesidades distintas. `playas-de-manta` y `playas-manta-cual-elegir` no, porque responden a la misma.
