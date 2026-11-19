# Brief — tanda de diciembre 2026 de Comercial Hidrobo

Lee esto completo antes de escribir. El plan con los 36 temas y su número está en
`../plan-diciembre-2026/PLAN.md`. La skill `posts-seo` (en `~/.claude/skills/posts-seo/SKILL.md`)
tiene el método completo; esto es lo que aplica a esta tanda.

## Qué entregas

- Un archivo `lote_<tu-letra>.py` en esta carpeta que hace `from comun import *`, arma cada post
  con las funciones de `comun.py` y llama a `guarda(spec)` → escribe `posts/spec-<slug>.json`.
- Corres `python3 publish_batch.py --validate` hasta que **tus** specs salgan `OK`. El validador
  revisa todos los specs de `posts/`: ignora los que no son tuyos.
- **NUNCA corras `publish_batch.py` sin `--validate`.** No publiques nada, no toques WordPress.
- Si necesitas archivos temporales, usa una subcarpeta propia `tmp-<tu-letra>/`.
- Al final, reporta: slugs creados, palabras de cada uno, fuentes usadas y cualquier dato que no
  pudiste verificar.

## El spec

```python
guarda(dict(
    n=17,                                  # número del tema en PLAN.md → fija la fecha
    title="…",                             # H1, puede ser más largo que el título SEO
    slug="omoda-jaecoo-ecuador-modelos-precios",   # sin año, en minúsculas, con guiones
    categories=[43],                        # ids en publish_batch.py → CATEGORIAS
    excerpt="…",                            # 1-2 frases
    meta={"_yoast_wpseo_title": "…",        # ≤ 60 caracteres, consulta al inicio, sin marca
          "_yoast_wpseo_metadesc": "…",     # 140-160 caracteres, continúa el título
          "_yoast_wpseo_focuskw": "…"},
    fuentes=["https://…", "https://…"],     # de dónde salió cada dato técnico
    content="\n\n".join([...bloques..., CIERRE]),
))
```

## Reglas de contenido (el validador rechaza si no se cumplen)

- **Usted**, nunca tú ni vos. Imperativos en usted: «revise», «agende», «escríbanos».
- **1.100 a 1.400 palabras** de texto visible. Vas a escribir corto: expande con secciones nuevas,
  no estirando párrafos.
- Estructura: 2 párrafos de entrada sin encabezado → H2 con la respuesta directa en las primeras
  200 palabras → 3-6 H2 de desarrollo → **una tabla** → **una cita** (`quote()`, firma
  «Equipo de Comercial Hidrobo», nunca un nombre propio) → H2 «Cuándo … NO le conviene» →
  H2 «Preguntas frecuentes» con **4 preguntas en h3** (`faq()`) → `CIERRE`.
- **Recuadro a mitad de texto** con `cta_temprano(...)`, con un mensaje de WhatsApp propio que
  empiece «Hola, vengo del artículo de …». En los posts de taller y mantenimiento, justo después
  va `FORM_CITA` (y `reserva=True`). En los de modelos, `reserva=False` y sin formulario.
- **Mínimo 2 enlaces internos** con `a(url, texto)`. Solo URLs de `enlaces-verificados.json`
  (`a()` falla si no existe). Enlace a la **ficha del modelo** (`FICHAS`) cuando hables de uno.
- **2 referencias geográficas** reales: Ibarra, Cayambe, Tulcán, Imbabura, Carchi, la Panamericana…
- Nada de «2025». Año en curso: 2026.
- Frases prohibidas (lista en `publish_batch.py → BLACKLIST`): «no solo», «ya sea», «hoy en día»,
  «es fundamental», «es importante destacar», «en conclusión», etc. Sin tricolon («rápido,
  seguro y confiable»). Sin encabezados vacíos («Beneficios»): el H2 adelanta contenido.

## Datos: de dónde salen

- **Especificaciones de modelos** (motor, potencia, batería, autonomía, equipamiento, garantía):
  solo de la **página oficial de la marca en Ecuador** (ej. chery.com.ec, omodajaecoo.ec,
  dongfeng.com.ec, changan.com.ec, baic.ec, foton.com.ec, fiat.com.ec, jeep.com.ec, ram.com.ec,
  mazda.com.ec, toyota.com.ec, nissan.com.ec — verifica la URL real con WebSearch/WebFetch).
  Si la página oficial de Ecuador no tiene el dato, usa la global de la marca y dilo. **Si no lo
  encuentras, no lo pongas.** Guarda cada URL en `fuentes`.
- **Precios:** solo `PRECIOS` de `comun.py` (catálogo de CH) con `NOTA_PRECIOS`. Nunca otro precio.
- **Costos de mantenimiento:** se dan como **costo referencial estimado** (rangos realistas del
  mercado ecuatoriano para ese servicio y segmento), con `NOTA_COSTOS`. Nunca como precio fijo.
- **Datos de CH:** `SEDES`, `DIRECCION_IBARRA`, `WHATSAPP_TXT`. No inventes horarios, promociones,
  descuentos, años de garantía de CH ni nombres de personas.
- **Trámites oficiales** (revisión técnica, matriculación): solo de la ANT, la AMT o el GAD/EPM
  correspondiente, con la URL en `fuentes`.
- No recomiendes marcas que CH no vende. Puedes mencionarlas como contexto en una pregunta frecuente.

## Anti-canibalización

Revisa los títulos de `enlaces-verificados.json → posts` antes de escribir. Si ya existe un post
del mismo tema, tu post tiene que tomar un ángulo distinto y enlazarlo. Los posts de modelos no
pueden competir con la ficha (`/vehiculos/…`): van con ángulo de comparativa, uso o «cuál elegir»,
y enlazan a la ficha.

## La prueba final

¿Esto lo podría haber escrito alguien que no conoce Imbabura ni el portafolio de Comercial
Hidrobo? Si la respuesta es sí, falta trabajo.
