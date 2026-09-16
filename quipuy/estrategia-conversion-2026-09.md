# Quipuy — Estrategia de conversión (registros y compras)
**Fecha:** 16 de septiembre de 2026 · **Fuentes:** Search Console + GA4 (90 días) + código del repo
**Producto propio.** Repo: `/Users/creativeweb/DESARROLLO/CLAUDIO/Quipuy` — Next.js 16, blog en
`content/posts` (166 MDX), deploy en Vercel. Remote git: `santysos/libmay`.

---

## 1. Los números de partida

### Búsqueda (Search Console, `sc-domain:quipuy.com`, 90 días)
- 1.225 clics · 184.653 impresiones · CTR 0,66 % · posición 7,8.
- Toda la visibilidad es blog; la única página comercial en el top es la home (126 clics).

### Conversión (GA4, propiedad 536146659, 90 días)
- 7.034 sesiones · 2.385 usuarios nuevos.
- Producto muy activo entre usuarios existentes: 6.754 ventas creadas, 1.159 facturas.
- **Registros nuevos: 23.** Onboarding completado: **6.** Orgánico aportó 9 de los 23.
- **17 de 23 registros aterrizaron en la home; solo ~4 desde el blog.**

---

## 2. Corrección al diagnóstico inicial

Mi primera lectura (solo con GSC/GA4) fue que «el blog no lleva a registrarse». **El código
lo desmiente:** la infraestructura de conversión ya está bien construida.
- Cada post cierra con un `CTABox` fuerte («Empieza desde $6/año · Crear mi cuenta / Ver planes»).
- **162 de 166 posts enlazan a `/registro`** en el cuerpo.
- Hay CTAs contextuales (`CtaInline`) en 21 posts y sección «Sigue leyendo».

**Entonces el cuello de botella NO es el CTA.** Es más de fondo.

---

## 3. El diagnóstico real, en cuatro hechos

1. **La mezcla de intención está desbalanceada.** De 166 posts, **143 (86 %) son informativos
   del SRI** (cómo declarar el formulario 104, actualizar RUC, etc.) y solo **23 (14 %) son de
   intención de compra** (comparaciones, alternativas, «software», precios). El contenido
   informativo atrae a quien hace un trámite puntual o busca el portal del SRI —**no a quien
   evalúa comprar un software**. Lee y se va, por bueno que sea el CTA.

2. **El CTR es el muro antes de la conversión.** 184k impresiones → 1.225 clics (0,66 %). Y los
   dos posts de mayor volumen —«alternativas al facturador SRI» (36.530 imp) y «sri y yo»
   (38.517 imp)— rinden **0,1 % de CTR**. Sin clic no hay conversión, y aquí casi no hay clic.

3. **El contenido que SÍ convierte está desaprovechado.** Los registros orgánicos salieron de
   posts de compra (alternativa a Alegra, sistemas contables pymes). Pero las comparaciones
   (Quipuy vs Datil, vs Siigo/Contífico) rankean en **posición ~6 con 0 clics**, y `/precios`
   está en **posición 1,7 sin demanda** (104 impresiones). Solo **6 posts enlazan a `/precios`**.

4. **Mina de intención comercial sin tocar.** «facturador sri» / «sri y yo» son ~60k
   impresiones de intención equivocada (quieren el portal del gobierno). Pero dentro hay oro:
   **«el facturador del sri no funciona» (CTR 6,4 %)**, «no puedo ingresar al facturador sri».
   El frustrado con el facturador gratuito del SRI es el cliente ideal de Quipuy.

**Sobre la medición (corregido tras revisar el código):** el evento de compra **sí existe y
está bien cableado** — `subscription_paid` (GA4 + Meta "Subscribe" con monto), disparado por
`WelcomeAnalytics` cuando PayPhone redirige a `/dashboard/suscripcion?paid=<monto>`. Que GA4
muestre **cero en 90 días no es un bug: es que casi no hubo pagos nuevos por PayPhone** en la
ventana. Es un hallazgo de negocio, no de instrumentación: el problema está arriba del embudo
(captación de compradores), no en la medición.

**Y los títulos/metas de los posts comerciales ya están bien escritos** (el de "facturador
SRI" ya dice "por qué falla tanto y qué usar en su lugar"). La operación de contenido es
madura. Por eso la Palanca 2 rinde menos de lo que parecía, y el peso real cae en las
Palancas 1 y 3.

---

## 4. La estrategia — por impacto en conversión

### Palanca 1 — Reorientar la inversión de contenido a intención de compra
El problema no es el CTA, es a quién atrae el contenido. Hay que inclinar la balanza:
- **Expandir el contenido de compra** (hoy solo 23 de 166): más comparaciones («Quipuy vs
  Contífico/Datil/Siigo/Alegra»), «mejor software de facturación electrónica Ecuador»,
  «software contable para pymes», y sobre todo el ángulo **alternativa/frustración con el
  facturador del SRI**.
- **Subir de posición y CTR** las comparaciones que ya existen (pos 6 → top 3). Es el contenido
  que más convierte.

### Palanca 2 — CTR en los posts de intención comercial (no en los de portal)
- Reescribir título y meta del post **«alternativas al facturador SRI»** (36.530 imp, 0,1 %)
  para capturar el clic del que busca reemplazar el facturador gratuito. Quipuy ES la
  alternativa.
- Trabajar las consultas de frustración («no funciona», «no puedo ingresar»): alta intención,
  poca competencia.
- **No** perseguir CTR en «sri y yo» / «sri facturador» puros: esos rebotan.

### Palanca 3 — Rutear la autoridad del blog informativo hacia las páginas que venden
Los 143 posts informativos tienen tráfico y autoridad; hoy se enlazan solo entre ellos.
- Enlazar desde los informativos relevantes hacia `/precios`, las comparaciones y el post de
  alternativa (hoy solo 6 apuntan a `/precios`).
- Añadir en «Sigue leyendo» / CTABox un enlace a la página comercial pertinente según la
  categoría del post.

### Palanca 4 — Instrumentar la compra y cerrar la activación
- **Medición:** agregar el evento de suscripción/pago en GA4 (sin esto no medimos compras).
- **Activación:** 23 registros → 6 onboarding. Reducir fricción del onboarding (producto/UX,
  Next.js) — se pierde la mitad del valor después del registro.

---

## 5. Orden de ejecución

1. Instrumentar el evento de compra en GA4 (base de medición).
2. Palanca 2 (títulos/meta de posts comerciales) — rápido, sobre impresiones existentes.
3. Palanca 3 (enlazado interno informativo → comercial).
4. Palanca 1 (nuevos posts de compra + subir comparaciones).
5. Palanca 4-activación (con el equipo de la app).

**Repo ya localizado**, así que las palancas 1-3 son ejecutables por código (MDX + componentes).

## 6. Ejecutado el 16-sep-2026
- **Palanca 3 (enlazado interno) — arrancada.** En el repo Quipuy, rama
  `seo/enlaces-comerciales-blog`: bloque de enlaces comerciales contextuales por categoría en
  la plantilla del post (`src/app/blog/[slug]/page.tsx`). Rutea a los 166 posts hacia
  `/precios`, la alternativa al facturador SRI y las comparativas. Typecheck limpio. **En rama,
  pendiente de revisar y desplegar** (el repo publica a producción en Vercel).

## 7. Meta a medir
Línea base 90 días: **23 registros · 6 onboarding · 9 registros orgánicos · ~0 pagos nuevos
PayPhone.** Medición a 30-60 días tras aplicar las palancas.
