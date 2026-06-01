# Briefs de los 9 posts restantes (Fase 2 · Luuma)

Documentación de los 9 posts pendientes de redactar. Cada uno se convierte en un `spec-XX-{slug}.json` cuando esté listo, siguiendo la estructura de `spec-01-platos-tipicos-manabi.json`.

**Reglas obligatorias para cada uno (no negociables):**
- Mínimo 2 referencias geográficas concretas de Manta (av. Flavio Reyes, malecón, La Quadra, Tarqui, Umiña, Barbasquillo, Murciélago, San Mateo)
- 1 cita textual de alguien del equipo de Luuma (chef, bartender, anfitrión)
- Precios reales en dólares cuando aplique
- Cierre con CTA específico (reserva WhatsApp o link al menú) — NO con "esperamos verte"
- NO usar frases de la lista negra (ver `publish_batch.py` constante `BLACKLIST_PHRASES`)
- 1.200–1.600 palabras
- FAQ 3-5 preguntas al final
- 2-3 internal links al final

---

## Post #2 — Restaurantes en Manta

- **Slug:** `restaurante-manta-segun-quien-vive-aqui`
- **Categoría:** gastronomia-manta
- **Title sugerido:** Restaurantes en Manta: lo que recomendamos cuando un amigo nos visita
- **Yoast title:** Restaurantes en Manta: 15 lugares según quien vive aquí
- **Yoast metadesc (145-155):** Recomendamos 15 restaurantes en Manta según barrio y ocasión — desde almuerzos de $6 en Tarqui hasta cenas con vista al mar. Sí, Luuma está en la lista.
- **Focus kw:** restaurante manta
- **Intent:** comercial — defensa de query competitiva
- **Estructura propuesta:**
  - Lead: por qué hicimos esta lista, qué tiene de distinto
  - Sección por zona: Tarqui · Umiña · La Aurora · Flavio Reyes · La Quadra · Murciélago · Barbasquillo
  - Tabla comparativa con precio promedio, especialidad y horarios
  - Honestidad sobre Luuma al final (nos incluimos pero con criterio)
  - Cita: pedirle al gerente cuál es su restaurante favorito en Manta que NO sea Luuma
- **Datos pendientes:** lista de 15 restaurantes con dirección, especialidad y precio promedio
- **Estimado:** 1.500 palabras

---

## Post #3 — De Guayaquil/Quito a Manta

- **Slug:** `visitar-manta-desde-guayaquil-quito`
- **Categoría:** vida-en-manta
- **Title sugerido:** De Guayaquil/Quito a Manta: ruta, tiempos y por dónde empezar
- **Yoast title:** De Guayaquil/Quito a Manta: ruta, costos y plan de fin de semana
- **Yoast metadesc:** Cómo llegar de Guayaquil o Quito a Manta, cuánto cuesta el bus o auto, qué hacer el primer día y dónde comer rooftop con vista al Pacífico.
- **Focus kw:** manta ecuador (cubre también "viajar a manta")
- **Intent:** informacional turista — el 49,8% del tráfico viene de Guayaquil, esto los convierte
- **Estructura:**
  - Lead: por qué Manta vale el viaje
  - Cómo llegar (bus, avión, auto) con tiempos y costos reales actualizados
  - Plan día 1 (atardecer + cena en rooftop)
  - Plan día 2 (playa + almuerzo manabita típico)
  - Dónde dormir (3-4 opciones de hoteles cerca al rooftop)
  - Mapa embed con Luuma como referencia
- **Datos pendientes:** precios bus actualizados (Reina del Camino, Manantial), hoteles vecinos
- **Estimado:** 1.600 palabras

---

## Post #4 — Almuerzos en Manta por zona

- **Slug:** `almuerzos-manta-por-zona`
- **Categoría:** gastronomia-manta
- **Title sugerido:** Almuerzos en Manta por zona: Tarqui, Umiña, Flavio Reyes, La Quadra
- **Yoast title:** Almuerzos en Manta por zona: dónde y cuánto ($5 a $20)
- **Yoast metadesc:** Comparativa real de menús ejecutivos en Manta por zona y precio. De $5 en Tarqui a $20 con vista al mar. Lo que pedimos los locales entre semana.
- **Focus kw:** almuerzos manta
- **Intent:** comercial local
- **Estructura:**
  - Lead: el almuerzo en Manta es distinto al de Quito (más temprano, más rápido, costa)
  - Tabla por zona: 4-5 lugares por barrio con plato fuerte y precio
  - Sección "el menú ejecutivo de Luuma" honesta: cuánto cuesta, qué incluye, por qué
  - Cita del chef sobre su plato favorito del menú ejecutivo
- **Datos pendientes:** menú ejecutivo de Luuma + 15-20 lugares por zona
- **Estimado:** 1.300 palabras

---

## Post #5 — Qué hacer este fin de semana en Manta

- **Slug:** `que-hacer-fin-de-semana-manta`
- **Categoría:** eventos-entretenimiento
- **Title sugerido:** Qué hacer este fin de semana en Manta (agenda actualizada)
- **Yoast title:** Fin de semana en Manta: agenda actualizada (semana en curso)
- **Yoast metadesc:** Eventos del fin de semana en Manta: música en vivo, mercados, playas y planes culturales. Actualizado cada viernes. Más nuestra programación en el rooftop.
- **Focus kw:** que hacer fin de semana manta
- **Intent:** evergreen actualizable (cada viernes el equipo de Luuma actualiza)
- **Estructura:**
  - Lead corto: actualizado el {fecha}
  - Viernes (música en vivo en Luuma + alternativas)
  - Sábado (mercados, playas, ferias)
  - Domingo (planes en familia, día tranquilo)
  - Cita del anfitrión: "lo que más nos preguntan los huéspedes en viernes"
- **Datos pendientes:** mecanismo de actualización semanal (ver si el equipo del cliente puede actualizar o nosotros)
- **Estimado:** 1.000 palabras + actualización semanal
- **Nota técnica:** Schema `Event` por cada evento listado

---

## Post #6 — Ceviche manabita receta

- **Slug:** `ceviche-manabita-receta-original`
- **Categoría:** recetas-cocina
- **Title sugerido:** Ceviche manabita: receta original (no es el mismo del Pacífico peruano)
- **Yoast title:** Ceviche manabita: receta, ingredientes y diferencias con el peruano
- **Yoast metadesc:** Receta del ceviche manabita: maní tostado, naranja agria, cebolla colorada. Lo que cambia versus el peruano. Cómo lo servimos en Luuma Rooftop.
- **Focus kw:** ceviche manabita
- **Intent:** informacional + autoridad gastronómica
- **Estructura:**
  - Lead: por qué nos enoja cuando confunden ceviche manabita con peruano
  - Diferencias clave (tabla comparativa)
  - Ingredientes del ceviche manabita real
  - Receta paso a paso (la del chef de Luuma)
  - Variaciones por zona de Manabí (Manta vs Bahía vs Crucita)
  - Dónde comerlo en Manta si no lo quieres preparar
- **Datos pendientes:** receta exacta + foto del proceso + posiblemente video corto del chef
- **Estimado:** 1.400 palabras

---

## Post #7 — Playas de Manta

- **Slug:** `playas-manta-cual-elegir`
- **Categoría:** vida-en-manta
- **Title sugerido:** Playas de Manta: cuál elegir según tu plan (familia, surf, atardecer)
- **Yoast title:** Playas de Manta: cuál elegir según tu plan (5 opciones)
- **Yoast metadesc:** Murciélago, San Mateo, Santa Marianita, Barbasquillo y Tarqui — guía honesta de las playas de Manta según vayas con familia, surf, o un atardecer.
- **Focus kw:** playas manta
- **Intent:** informacional turismo (cubre también "playa murciélago manta" y "playa de manta")
- **Estructura:**
  - Lead: cada playa de Manta sirve para algo distinto
  - Tabla comparativa: 5 playas, qué hay, mejor para qué, accesos
  - Murciélago — la urbana, malecón, restaurantes
  - San Mateo — pescadores, ceviche real, sin turistas
  - Santa Marianita — kitesurf, atardecer
  - Barbasquillo — familiar, tranquila
  - Tarqui — pesca, no para bañarse
  - "Lo que no te dicen" — cuál evitar en cierta época
- **Datos pendientes:** fotos del equipo en las playas + dato sobre seguridad/oleaje por temporada
- **Estimado:** 1.500 palabras

---

## Post #8 — Coctel autor Luuma (rescate categoría cocteles)

- **Slug:** `coctel-autor-luuma-maracuya`
- **Categoría:** cocteles-mixologia
- **Title sugerido:** El coctel que creamos en Luuma con maracuyá y aguardiente de caña
- **Yoast title:** Coctel de maracuyá y aguardiente: receta del bartender de Luuma
- **Yoast metadesc:** Cómo nació el coctel insignia de Luuma Rooftop en Manta. Maracuyá, aguardiente artesanal de caña manabita, jarabe de panela. Receta + historia.
- **Focus kw:** coctel maracuyá manabí
- **Intent:** brand storytelling + rescate categoría muerta (2 clics en 3 meses)
- **Estructura:**
  - Lead: el día que el bartender llegó con una idea y la barra dijo que no
  - Historia del coctel (cómo nació)
  - Ingredientes y por qué cada uno (aguardiente de Junín, maracuyá de Olmedo)
  - Receta en casa vs receta en barra
  - Cita del bartender sobre la inspiración
  - Foto destacada del coctel + cómo pedirlo
- **Datos pendientes:** nombre y datos del bartender + historia real + receta + foto profesional
- **Estimado:** 1.000 palabras (más corto, más visual)

---

## Post #9 — Rooftops en Manta

- **Slug:** `rooftop-manta-cuales-hay`
- **Categoría:** gastronomia-manta
- **Title sugerido:** Rooftops en Manta: cuáles abren actualmente (mapa y horarios)
- **Yoast title:** Rooftops en Manta: 6 opciones actuales (mapa y horarios)
- **Yoast metadesc:** Listado honesto de los rooftops abiertos en Manta hoy: ubicación, horarios, precio promedio. Incluye Luuma (al cierre, con criterio).
- **Focus kw:** rooftop manta
- **Intent:** defensa de categoría propia (Luuma es la query brand pero hay competencia genérica)
- **Estructura:**
  - Lead: por qué Manta es buena ciudad para rooftops
  - Mapa con los 5-6 rooftops abiertos
  - Listicle honesto, uno por uno (incluyendo competencia con respeto)
  - Tabla comparativa: vista, precio promedio, especialidad
  - Luuma al final con CTA
- **Datos pendientes:** lista de competencia (hotel Oro Verde, Howard Johnson, etc.) actualizada
- **Estimado:** 1.300 palabras

---

## Post #10 — Música en vivo este mes

- **Slug:** `musica-vivo-manta-este-mes`
- **Categoría:** eventos-entretenimiento
- **Title sugerido:** Música en vivo en Manta este mes: nuestra programación + la de la ciudad
- **Yoast title:** Música en vivo en Manta este mes: 12 noches + agenda ciudad
- **Yoast metadesc:** Programación de música en vivo en Luuma Rooftop este mes + lo que pasa en el resto de Manta. Actualizado cada mes.
- **Focus kw:** música en vivo manta
- **Intent:** evergreen actualizable + Schema MusicEvent
- **Estructura:**
  - Lead: por qué decidimos publicar esto cada mes
  - Programación de Luuma con tabla (día, banda, hora, cover si aplica)
  - Resto de bares con música en vivo en Manta esta semana/mes
  - Sección "cómo funciona la noche en Manta" (horarios, dress code)
  - Cita del anfitrión sobre su banda favorita del mes
- **Datos pendientes:** programación oficial de Luuma + competencia
- **Estimado:** 900 palabras
- **Nota técnica:** Schema MusicEvent por cada presentación

---

## Calendario de publicación sugerido (1-2 por semana, evitar batch)

| Semana | Post | Día sugerido |
|---|---|---|
| 2 | #1 platos típicos manabí | lunes |
| 3 | #2 restaurantes Manta | miércoles |
| 4 | #3 de Guayaquil/Quito a Manta | lunes |
| 5 | #4 almuerzos por zona + #5 fin de semana | miércoles + viernes |
| 6 | #6 ceviche manabita | miércoles |
| 7 | #7 playas Manta + #8 coctel autor | lunes + viernes |
| 8 | #9 rooftops Manta + #10 música en vivo | miércoles + viernes |

NO publicar el mismo día — el batch de marzo nos enseñó que Google nota el patrón.
