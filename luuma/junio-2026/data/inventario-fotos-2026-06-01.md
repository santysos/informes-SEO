# Inventario de medios · Luuma WP · 1 de junio 2026

Resultado de GET /wp-json/wp/v2/media (214 items totales).
Filtrado: solo imágenes ≥600x400, sin logos/iconos.

Sirve para asignar `featured_media` y referencias inline en los posts del blog.

---

## 🍽 Platos (5 imágenes)

| ID | Tamaño | Alt | URL |
|---|---|---|---|
| **1246** | 1974×1714 | menú criollo manabita comida criolla en luuma manta | `/wp-content/uploads/2026/01/menu-criollo.webp` |
| 812 | 1024×1024 | chuleta plato típico en restaurante luuma manta | `/wp-content/uploads/2025/11/chuleta.webp` |
| 807 | 1024×1024 | pollo teriyaki con vegetales menú ejecutivo manta | `/wp-content/uploads/2025/11/pollo-teriyaki-con-vegetales.webp` |
| 178 | 2200×1467 | cena corte carne | `/wp-content/uploads/2025/07/Cena_Corte_Carne.webp` |
| 45 | 1760×2200 | sisa plato degustación | `/wp-content/uploads/2025/07/Sisa_plato_degustacion.webp` |
| 766 | 1024×1024 | lomo salteado con tacu tacu mariscos en manta | `/wp-content/uploads/2025/11/lomo-salteado-con-tacu-tacu.webp` |

**Gap:** no hay fotos de viche, encocado, corviche, ceviche manabita, bollo manabita. Para posts manabitas usamos `1246` (menú criollo) o `665` (experiencia gastronómica) como featured, mientras el cliente sube fotos específicas.

## 🏢 Rooftop / Ambiente (top 13 de 80)

Sesión profesional `luuma-rooftop-restaurant-manabi-manta-1` a `-13`:

| ID | Tamaño | Tema | Uso sugerido |
|---|---|---|---|
| 673 | 1500×2000 | restaurante rooftop en manta | featured de "rooftop manta" |
| 672 | 1500×2000 | terraza con vista | post "qué hacer en manta" |
| 670 | 1500×2000 | vista panorámica | post "rooftops en manta" |
| 669 | 1500×2000 | cena romántica con vista al mar | post "dónde cenar manta" |
| 668 | 1500×2000 | ambiente nocturno para eventos privados | post "vida nocturna manta" |
| 667 | 1500×2000 | bar de cócteles artesanales | post "coctel autor" |
| 666 | 1500×2000 | mariscos frescos | post "mariscos manta" |
| **665** | 2000×1500 | experiencia gastronómica | featured "platos típicos manabita" |
| 664 | 2000×1500 | rooftop con terraza y vista al mar | banner "qué hacer manta" |
| 663 | 2000×1500 | atardecer desde luuma rooftop | post "atardecer manta" |
| 662 | 2000×1500 | ambiente romántico para cenar | post "cenar manta vista al mar" |

## 🍸 Cocteles / bebidas (4)

| ID | Alt | URL |
|---|---|---|
| 627 | vino blanco luuma | `/wp-content/uploads/2025/10/vino-blanco-luuma.webp` |
| 625 | vino tinto luuma | `/wp-content/uploads/2025/10/vino-tinto-luuma.webp` |
| 552 | cervezas luuma | `/wp-content/uploads/2025/10/cervezas-luuma.webp` |
| 551 | cervezas | `/wp-content/uploads/2025/10/cervezas.webp` |

**Gap importante:** **0 fotos de cocteles autor o clásicos** (mojito, espresso martini, negroni, etc.). El post #8 "El coctel de autor con maracuyá" necesita foto específica. Pedir al cliente.

## 👥 Equipo (0)

**Gap total.** Pedir fotos del chef, bartender y anfitrión trabajando.

---

## Asignación de featured images por post planificado

| # | Post | Featured ID | Razón |
|---|---|---|---|
| 1 | Platos típicos de Manabí | **1246** | foto del menú criollo manabita (1974×1714) |
| 2 | Restaurantes en Manta | 670 | vista panorámica + ambiente |
| 3 | De Guayaquil/Quito a Manta | 664 | rooftop con vista, "lo que vas a ver" |
| 4 | Almuerzos en Manta por zona | 665 | experiencia gastronómica |
| 5 | Qué hacer este fin de semana en Manta | 668 | ambiente nocturno |
| 6 | Ceviche manabita: receta original | 1246 | menú criollo (mientras llega foto específica) |
| 7 | Playas de Manta: cuál elegir | 663 | atardecer desde rooftop |
| 8 | El coctel autor con maracuyá | 667 | bar de cócteles artesanales |
| 9 | Rooftops en Manta: cuáles abren | 672 | terraza con vista |
| 10 | Música en vivo este mes en Manta | 668 | ambiente nocturno |

---

## URLs de imágenes de eventos (uso futuro)

Detecté 30+ posters de eventos musicales en 2026/01 y 2026/02 (banda/tributo X-de mes-año.jpg). Estos pueden usarse como inline en el post de "Música en vivo en Manta" para mostrar agenda visual.

## Acción recomendada al cliente

Pedir al cliente subir al wp-admin → Media Library las siguientes 8 fotos prioritarias:
1. Viche de pescado emplatado (3/4 perfil)
2. Ceviche manabita servido con chifles
3. Encocado de pescado con arroz
4. Coctel de autor con maracuyá (vertical para Instagram)
5. Coctel clásico — old fashion o negroni
6. Chef trabajando en cocina (sin rostro completo si prefiere)
7. Bartender preparando un trago
8. Anfitriona o gerente recibiendo huésped en entrada del rooftop

Cuando estén subidas, hacer `GET /media?per_page=100&orderby=date&order=desc` y actualizar este inventario.
