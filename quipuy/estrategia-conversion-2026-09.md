# Quipuy — Estrategia de conversión (registros y compras)
**Fecha:** 16 de septiembre de 2026 · **Fuentes:** Search Console + GA4 (90 días, 16-jun a 14-sep)
**Producto propio.** quipuy.com es Next.js (los cambios van por código, no por WordPress).

---

## 1. Los números de partida

### Búsqueda (Search Console, `sc-domain:quipuy.com`)
- 1.225 clics · 184.653 impresiones · CTR 0,66 % · posición 7,8.
- **Toda la visibilidad es blog.** La única página comercial en el top es la home
  (126 clics, CTR 27,5 %, pos 3,9).

### Comportamiento y conversión (GA4, propiedad 536146659)
- 7.034 sesiones · 2.412 usuarios · 2.385 nuevos.
- Producto muy activo entre usuarios existentes: **6.754 ventas creadas, 1.159 facturas
  autorizadas**.
- **Registros nuevos: 23 en 90 días.** Onboarding completado: **6**.
- Registros por canal: Directo 11 · **Orgánico 9** · IA 2 · otros 1.
- **De dónde registran: 17 de 23 aterrizaron en la home; solo ~4 desde el blog.**

---

## 2. El diagnóstico, en cuatro hechos

1. **El blog trae el tráfico pero no convierte.** ~2.477 sesiones orgánicas y casi ningún
   registro salen de él. Son guías del SRI (retenciones, depreciación, formularios) que
   posicionan pero terminan en un callejón sin salida: no llevan a registrarse.

2. **La home convierte pero casi no recibe demanda de búsqueda.** Es la que genera 17 de 23
   registros, pero en Search Console apenas tiene 458 impresiones. Convierte a quien llega,
   pero llega poca gente por SEO.

3. **Las páginas comerciales posicionan y nadie las ve.** `/precios` está en **posición 1,7**
   con solo 104 impresiones. Los posts de comparación (Quipuy vs Datil, vs Siigo/Contifico,
   alternativa a Alegra) rankean ~pos 6 con **0 clics**. Es el contenido que más convierte y
   está desaprovechado, sin enlaces internos que empujen hacia él.

4. **Hay una mina de intención comercial sin capturar.** «facturador sri» (19.460 imp),
   «sri y yo» (13.534), «sri y yo en línea» (~10k) son ~60k impresiones de gente que busca el
   **portal del propio SRI** — intención equivocada, CTR ~0 %. Pero dentro de eso hay oro
   comercial: **«el facturador del sri no funciona» (CTR 6,4 %)**, «no puedo ingresar al
   facturador sri» (79 sesiones), «recuperar clave facturador sri» (110 sesiones). Quien está
   frustrado con el facturador gratuito del SRI es el cliente ideal de Quipuy.

**Además — hueco de medición:** GA4 registra `sign_up_completed` y `onboarding_completed`,
pero **no hay evento de suscripción pagada / compra**. No se puede optimizar lo que no se mide:
hay que instrumentar el paso de pago para hablar de "más compras" con datos.

---

## 3. La estrategia — tres palancas por impacto en conversión

### Palanca 1 — Convertir el tráfico del blog (el mayor golpe inmediato)
El tráfico ya existe; falta el puente a registrarse. Mismo principio que funcionó en el
embudo de taller de Comercial Hidrobo, pero **contextual, no genérico**:
- En cada post, cerrar con un CTA atado al dolor del artículo. Ej.: el post «cómo facturar a
  cliente extranjero» termina con «Quipuy lo hace en un clic → crea tu cuenta gratis».
- Mención de producto dentro del texto donde el artículo resuelve el problema **a mano** y
  Quipuy lo resuelve **automático**.
- Enlazar del blog a `/precios` y a las comparaciones (que hoy no reciben enlaces internos).
- Aprovechar que existe **plan gratis** (visto en el flujo `/auth/completar?plan=FREE`): el
  CTA es «empieza gratis», que es la fricción más baja.

### Palanca 2 — Ganar las consultas de intención comercial
- **Post «alternativas al facturador SRI»** (36.530 imp, CTR 0,1 %, pos 8,7): reescribir
  título y meta para capturar el clic y reorientarlo a la conversión. Quipuy ES la
  alternativa.
- **Contenido de frustración**: «el facturador del SRI no funciona», «no puedo ingresar al
  facturador» — alta intención, poca competencia. Posicionar y convertir.
- **Comparaciones** (vs Datil, Siigo, Contífico, Alegra): subirlas de posición y CTR. Es el
  contenido que más convierte (ya produjo un registro).
- **`/precios`**: darle enlaces internos y trabajar la consulta «precio software facturación
  Ecuador» para que su posición 1,7 reciba demanda real.

### Palanca 3 — Cerrar la fuga posterior al registro (activación)
23 registros → solo 6 onboarding completado. Aunque dupliquemos registros, se pierde la mitad
en el onboarding. Es un arreglo de producto/UX en la app (Next.js): reducir fricción del
onboarding y llevar al usuario a su primera factura. Se sale del SEO, pero es donde se pierde
la mitad del valor.

---

## 4. Orden de ejecución propuesto

1. **Instrumentar el evento de compra/suscripción** en GA4 — sin esto no medimos "más compras".
2. **Palanca 1** (CTA contextual + enlazado interno en el blog): golpe rápido sobre tráfico
   existente.
3. **Palanca 2** (títulos/meta de alternativas y comparaciones + `/precios`).
4. **Palanca 3** (onboarding) — coordinar con el desarrollo de la app.

**Bloqueo de ejecución:** quipuy.com es Next.js y el **repositorio local no está ubicado**.
Para ejecutar palancas 1 y 2 (que son cambios de contenido/código) hay que localizar el repo o
definir cómo se gestiona el blog. Paso previo a cualquier cambio.

---

## 5. La meta a medir
Línea base 90 días: **23 registros / 6 onboarding / 9 registros orgánicos.** El objetivo es
subir esos números; medición a 30-60 días tras aplicar las palancas 1 y 2.
