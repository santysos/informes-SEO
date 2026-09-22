# SRIFlow — estrategia para más visitas y más ventas (2026-09-22)

Fuentes: GA4 (properties/501535833) + Search Console (`https://www.sriflow.com/`) +
inspección del sitio y el embudo en vivo.

---

## La conclusión, primero

SRIFlow tiene **el mejor encaje contenido↔producto de todo el grupo**: el blog atrae justo a
quien necesita el producto (gente peleando con comprobantes, anulaciones y formularios del
SRI), la oferta es clara ($18 mes / $45 trimestre / $72 año, 7 días gratis sin tarjeta) y el
producto resuelve exactamente esa búsqueda. **Y aun así casi no convierte.**

El problema **no son las visitas** (crecen +28 %). El problema es la **conversión**: el embudo
de visita → registro → descarga → pago está roto o no se está midiendo. Duplicar el tráfico no
sirve si la conversión sigue cerca de cero. **La prioridad es la conversión, no las visitas.**

---

## Estado actual (datos)

**Tráfico (GA4):** en subida. Últimos 30 días: **304 usuarios, +28 %** vs. mes previo. Pico en
julio (338). Canal principal: **búsqueda orgánica (530 usuarios/90d)**, luego Directo.

**Search Console (90d):** 13.762 impresiones · 225 clics · 17 páginas. Todo consultas del SRI:
`formulario 104 en excel`, `cómo saber si una factura está anulada`, `aceptar anulación de
retención en el sri`, `descargar formulario 104`. Posiciones 5-22 (margen para subir). Marca
`sriflow`: solo 13 impresiones — todavía no hay reconocimiento de marca.

**Contenido:** el blog trae casi todo el tráfico. Top: cómo revisar comprobantes anulados,
actualizar RUC, formulario 104, error captcha SRI, qué hacer si el SRI no deja descargar. Los
posts **ya tienen CTA a `/signup` y `/#precios`** y mencionan el producto — el CTA no es el
problema.

**Conversión (GA4, 180 días) — el cuello de botella:**

| Evento | 180 días |
|---|---|
| first_visit | 823 (90d) |
| form_start | 202 (90d) |
| form_submit | 29 (90d) |
| **sign_up_completed** | **2** |
| **app_downloaded** | **1** |
| **subscription_paid** | **0** |
| begin_checkout / purchase | 0 (no existen) |

Del formulario, **86 % lo abandona** (202 empiezan, 29 envían). Y de ahí a registro completo,
casi nadie. **Cero pagos medidos en 180 días**, pese a que el producto tiene clientes que pagan
(cuentas activas y migradas). El producto real es una **app de escritorio** (SRIFlow Desktop):
la web gestiona cuenta/plan, y el trabajo ocurre en la app descargada.

---

## Estrategia

### A. Medición — arreglar esto PRIMERO (no se puede optimizar a ciegas)

Hay clientes que pagan pero **`subscription_paid` = 0**. O las ventas pasan por fuera
(WhatsApp/transferencia + activación manual — el historial de planes muestra "Migración
manual"), o el evento de pago no dispara. **Hay que determinar cuál**, porque cambia todo:

1. **Confirmar con el equipo/DB cuántas ventas reales hubo en 90 días y por qué canal.** Si son
   por WhatsApp, el embudo self-serve no se está usando — es oportunidad, no fracaso.
2. **Verificar que `subscription_paid` dispare en el pago real** (respuesta de PayPhone). Si el
   pago es manual, registrar la conversión del lado del servidor para poder medirla.
3. **Instrumentar el embudo completo** para ver dónde se cae: clic al CTA del blog → inicio de
   registro → registro completo → correo verificado → app descargada → prueba iniciada → pago.
   Hoy hay huecos entre cada paso.

### B. Conversión — donde está el dinero

Con ~530 usuarios orgánicos/mes y encaje perfecto, subir la conversión de ~0,2 % a 2 % es
**10× más clientes con el mismo tráfico.** Palancas:

1. **Bajar la fricción del registro.** 86 % abandona el formulario. Como la prueba es *sin
   tarjeta*, el registro debería ser mínimo: correo + contraseña o **login con Google**, y pedir
   RUC/datos después, dentro de la prueba. Revisar cuántos campos exige hoy.
2. **La verificación de correo como muro.** Si exige verificar el correo antes de usar, ahí se
   pierde gente. Permitir empezar la prueba y verificar en paralelo, o verificación de 1 clic.
3. **El salto a la app de escritorio es un acantilado** (app_downloaded = 1). Registro web →
   descargar → instalar → volver a iniciar sesión → recién usar. Reducirlo: onboarding guiado
   post-registro, y evaluar una **demo/preview web** para que vean el valor antes de instalar.
4. **Puente blog → prueba más fuerte.** Los posts ya enlazan, pero conviene: un **GIF/demo
   embebido** mostrando a SRIFlow haciendo en 1 clic lo que el artículo explica a mano, un CTA
   **a mitad** del artículo (no solo al final), y un **lead magnet** (ej. la plantilla del
   Formulario 104 en Excel — hay demanda clara de esa query) para capturar el correo y nutrir
   hacia la prueba aunque no se registren hoy.

### C. Visitas (SEO) — secundario, ya funciona

El tráfico crece solo; el foco debe ser traer **el tráfico que más convierte**: consultas donde
SRIFlow resuelve el problema en un clic. Clusters con demanda y encaje directo:

- **Anulaciones** (gran volumen desaprovechado): `anuladas` 113 imp, `cómo aceptar la anulación
  de una factura en el SRI` 81, `aceptar anulación de retención` 79 — hoy en posición 15-22.
  SRIFlow detecta anulados; es el post que más debería convertir.
- **Formulario 104 en Excel** (pos 8, cluster fuerte): la función "Excel con IVA desglosado" es
  la respuesta exacta. Reforzar y enlazar a la prueba.
- **Descargar/exportar comprobantes y retenciones a Excel, ATS**: features literales del producto.

Acciones: reescribir título/meta de los posts en posición 5-15 para subirlos, y crear/ampliar
los del cluster de anulaciones. La marca (`sriflow`, 13 imp) crecerá sola con las ventas; no es
prioridad ahora.

---

## Resumen priorizado

1. **Medición (bloqueante):** confirmar ventas reales y canal; hacer que `subscription_paid`
   mida el pago real; instrumentar el embudo completo. 🔴
2. **Fricción de registro y descarga:** login con Google, menos campos, verificación no
   bloqueante, onboarding a la app. 🔴
3. **Puente blog → prueba:** demo/GIF en los posts, CTA a mitad, lead magnet (plantilla 104). 🟠
4. **SEO de intención comercial:** cluster de anulaciones + 104 en Excel + exportar a Excel. 🟠

La frase para recordar: **el blog ya trae al cliente correcto; el trabajo ahora es dejar de
perderlo entre el clic y el pago.**
