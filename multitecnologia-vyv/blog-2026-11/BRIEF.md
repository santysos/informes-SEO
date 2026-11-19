# Brief — mes 2 de Multitecnología VYV (20 artículos)

Lee esto completo antes de escribir. Temas, número (n) y lote en `PLAN.md`.
Referencia de estilo y formato: los 20 del mes 1 en `../blog-2026-10/specs/*.json` (lee 2 completos).

## El cliente
Multitecnología VYV, mayorista de tecnología en **Quito** que vende a **todo Ecuador** (Guayaquil,
Cuenca, Ambato, Riobamba, Ibarra, Manta, Loja, Puyo…). Público: **técnicos de laptops, tiendas de
computación y celulares, instaladores de redes y cámaras, y empresas**. Tienda B2B: los precios de
distribuidor se ven con la **cuenta comercial**. WhatsApp de ventas 098 407 2123 (los CTA ya lo traen).
Escribe en **tú** (como el mes 1). Nada de usted ni voseo.

## Qué entregas
- Un script `lote_<letra>.py` en esta carpeta que escribe tus specs como `specs/NN-slug.json`
  (NN = n con dos dígitos). Mismo esquema que el mes 1:
  `n, slug, title, focus_kw, meta_desc, excerpt, category, tags, featured{pexels_query,alt},
  inline_image{pexels_query,alt,after_section}, intro_html, sections[{h2,html}], products[ids],
  cta_mid{title,text,wa_text}, cta_end{title,text,wa_text}, faq[{q,a}], fuentes[urls]`.
- `category`: una de «Compras al por mayor», «Guías para técnicos», «Componentes y accesorios»,
  «Redes y seguridad», «Marcas y comparativas».
- Corre `python3 publish_batch.py --validate` hasta que **tus** specs salgan OK (ignora los demás).
- **NUNCA corras publish_batch.py sin `--validate`.** No toques WordPress. Temporales en `tmp-<letra>/`.
- Reporta al final: slugs, palabras, fuentes y datos que no pudiste verificar.

## Reglas (el validador rechaza si no se cumplen)
- **1.050 a 1.400 palabras** (intro + secciones + FAQ). Vas a escribir corto: agrega secciones con
  información nueva, no estires párrafos.
- 2 párrafos de entrada → H2 con la respuesta directa → 5-7 H2 → **una tabla** → una lista de pasos →
  una sección «Cuándo NO te conviene…» → FAQ de 4 preguntas (respuestas de 2-3 frases).
- Título ≤ 60 caracteres, keyword al inicio, sin marca VYV. Meta 120-160 caracteres, que continúe el
  título. `wa_text` empieza «Hola, vengo del artículo de …».
- **Sin precios en dólares** (el cliente no publica precios). Sin «2025».
- HTML solo con p, ul, ol, li, strong, em, h3, a, table/thead/tbody/tr/th/td, br. Sin style ni class.
- **Mínimo 2 enlaces internos en el texto**, solo a URLs de `productos.json`, `enlaces.json`
  (categorías y posts del mes 1). Enlaza al post del mes 1 relacionado cuando exista.
- `products`: 3 a 6 ids de `productos.json` con `stock: instock` e `img`. Elige los que de verdad
  corresponden al tema.
- Geografía real: Quito y al menos otra ciudad o provincia del país, con sentido (no de relleno).
- Frases prohibidas: lista `BLACKLIST` en `publish_batch.py` («no solo», «ya sea», «hoy en día»,
  «la mejor opción», «descubre»…). Sin tricolon («rápido, seguro y confiable»). H2 que adelanten
  contenido, nunca «Beneficios» o «Ventajas» solos.

## Datos: de dónde salen
- Especificaciones de productos: el nombre del producto en `productos.json` y la página oficial del
  fabricante. Abre la ficha del producto en la tienda (WebFetch de su `url`) si necesitas detalle.
- **Marcas que VYV no vende** (Forza, CDP, Powest, Hikvision, Dahua, Viggi, Xtech, Steren): solo datos
  verificables de su sitio oficial, guardados en `fuentes`. Compara por criterios objetivos (potencia,
  autonomía, tecnología, garantía, disponibilidad de repuestos), sin desprestigiar. Las tarjetas de
  producto y la recomendación final van hacia lo que VYV vende, con honestidad sobre cuándo otra
  opción encaja mejor.
- Deltatech: el cliente dice que la marca tiene **15 años** y que antes se llamaba **Delta**. Busca el
  sitio oficial de Deltatech; usa solo lo que encuentres. No inventes fundadores, fechas ni países.
- Leyes y normas (p. ej. grabación y privacidad en Ecuador): solo de fuentes oficiales (COIP,
  Registro Oficial, Superintendencia/Ministerio), con URL en `fuentes`.
- Si no encuentras un dato, no lo pongas.

## Anti-canibalización
Mira los títulos del mes 1 (`enlaces.json → posts`) y de los otros temas de este mes en `PLAN.md`.
Temas cercanos en el mismo lote (p. ej. n=2, 12 y 14; o n=1, 7 y 17) deben tener ángulos claramente
distintos y enlazarse entre sí solo cuando ya estén publicados (los de este mes aún no: no los enlaces).

## Prueba final
¿Lo podría haber escrito alguien que no conoce a un técnico de Quito ni el catálogo de VYV? Si sí,
falta trabajo.
