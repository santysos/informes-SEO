# Brief — revisión de los 10 posts de Dimapar para publicar (octubre 2026)

Los 10 posts se escribieron en agosto y quedaron en borrador. Antes de publicarlos hay que
corregirlos. El contenido base está en `antes/{id}-{slug}.html` (bloques Gutenberg).

## 1. Precios — la regla más importante

El **28-sep-2026 Dimapar quitó de la tienda el precio de todas las máquinas** (balanceadoras,
desenllantadoras, alineadoras, elevadores, etc.). No se publican.

- **Ninguna cifra en dólares**, salvo los precios de consumibles y herramientas que están en
  `precios-vigentes.md` con su valor actual (se puede escribir igual o con IVA incluido, × 1,15,
  aclarándolo). El validador rechaza cualquier otro «$».
- Eso incluye presupuestos totales, rangos («entre $7.900 y $17.500»), costos de operación,
  arriendos, sueldos, ahorros estimados, retorno de inversión en dólares: todo fuera.
- En su lugar: **comparar por gama** (entrada / media / alta), por capacidad, por volumen de
  trabajo, por lo que incluye cada equipo, y decir que el **precio es bajo cotización** con
  un motivo útil: depende de la configuración, la instalación y el envío a su ciudad.
- Retorno de inversión: se puede razonar en **unidades** («si haces 10 balanceos al día…»),
  sin dólares.
- Si el título, el título SEO o la meta prometen «precios», cámbialos: la promesa pasa a ser
  «cómo elegir», «qué incluye», «qué pedir en la cotización».

## 2. Datos verificados de Dimapar (de su web, 6-oct-2026) — usar solo estos

- Distribuidor de equipos industriales y herramientas para talleres automotrices, llanteras y
  vulcanizadoras. **Desde 2003.**
- Matriz: **Av. Maldonado S59-100 y S59D, Guamaní, Quito.**
- **Envíos a todo el Ecuador** (Sierra, Costa y Oriente).
- **Garantía de 1 año** en cada equipo.
- **Instalación profesional, calibración y puesta en marcha en sitio.** Capacitación al equipo
  del taller. Mantenimiento preventivo y reparación (servicio técnico).
- **Repuestos originales:** stock local de partes Hofmann y Besser.
- Página de servicio técnico con manuales, fichas técnicas y planos de instalación:
  https://www.dimaparecuador.com/soporte/
- Marcas: Hofmann, Besser, Hydraulan, Muth, Thyson, Tramontina, Toptul, Vermar, Milton, Torin.
- No mencionar horarios (la web tiene dos distintos) ni nombres de personas.

## 3. Información que hay que añadir en cada post

Revisa el post entero y **añade lo que falte para que el lector decida y escriba**:
- Una sección o párrafo sobre **qué incluye comprar en Dimapar**: instalación y calibración en
  sitio, capacitación, garantía de 1 año, repuestos locales, envío a su ciudad. Integrado con el
  tema del post, no pegado.
- **Qué preguntar o pedir en la cotización** (lista corta, específica del equipo).
- Si el post habla de mantenimiento o instalación, enlaza a https://www.dimaparecuador.com/soporte/.
- Mantén todo lo bueno que ya tiene (tablas técnicas, criterios, errores comunes). Corrige lo
  que dependa de precios. El largo final: 1.200-1.600 palabras.

## 4. CTA y WhatsApp — medidos

El sitio mide `whatsapp_click` (cualquier enlace a wa.me) y `cta_click` (enlaces a /contacto/).

- **Número correcto: 593997966191** (el de toda la web). El post trae 593968663866: reemplázalo
  en todos los enlaces.
- El mensaje de WhatsApp debe decir de qué artículo viene:
  `https://wa.me/593997966191?text=` + texto codificado tipo
  «Hola, vengo del artículo de {tema} en dimaparecuador.com. Quisiera cotizar {equipo}.»
- **Dos bloques de CTA por post**, con este HTML exacto (cambia solo los textos):

Bloque intermedio (después de la sección que responde la duda principal, ~40 % del texto):
```html
<!-- wp:group {"style":{"spacing":{"padding":{"top":"18px","bottom":"18px","left":"22px","right":"22px"}},"border":{"left":{"color":"#25d366","width":"4px"}}},"backgroundColor":"light-green-cyan"} -->
<div class="wp-block-group has-light-green-cyan-background-color has-background" style="border-left-color:#25d366;border-left-width:4px;padding-top:18px;padding-right:22px;padding-bottom:18px;padding-left:22px"><!-- wp:paragraph -->
<p><strong>{GANCHO CORTO}</strong> {UNA FRASE}. Te enviamos la cotización con instalación y envío a tu ciudad.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"vivid-green-cyan"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{WA}">Cotizar por WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
```

Bloque final (reemplaza el CTA final que tenga el post):
```html
<!-- wp:heading -->
<h2 class="wp-block-heading">Cotiza {equipo} con Dimapar</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>{2 frases: qué incluye (instalación, calibración, capacitación, garantía de 1 año, repuestos) y envío a todo el Ecuador desde Quito.}</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"vivid-green-cyan"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{WA}">Cotizar por WhatsApp</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://www.dimaparecuador.com/contacto/">Pedir cotización por formulario</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
```
Los dos bloques usan el **mismo enlace {WA}** del post.

## 5. Enlaces entre posts

Los borradores enlazan entre sí con `?p=NNN`. Reemplázalos por estas URLs finales:

| ID | URL |
|---|---|
| 496 | https://www.dimaparecuador.com/llanteras-y-vulcanizadoras/cuanto-cuesta-montar-vulcanizadora-ecuador/ |
| 497 | https://www.dimaparecuador.com/guias-de-compra/balanceadora-de-llantas-cual-elegir/ |
| 498 | https://www.dimaparecuador.com/guias-de-compra/desenllantadora-de-llantas-tipos-precios/ |
| 499 | https://www.dimaparecuador.com/llanteras-y-vulcanizadoras/parche-radial-o-diagonal-guia/ |
| 500 | https://www.dimaparecuador.com/llanteras-y-vulcanizadoras/cemento-vulcanizante-rendimiento-errores/ |
| 501 | https://www.dimaparecuador.com/guias-de-compra/alineadora-3d-cuando-invertir/ |
| 502 | https://www.dimaparecuador.com/guias-de-compra/elevador-para-taller-guia/ |
| 503 | https://www.dimaparecuador.com/mantenimiento-de-equipos/calibracion-mantenimiento-balanceadora-desenllantadora/ |
| 504 | https://www.dimaparecuador.com/talleres-automotrices/equipar-taller-llantas-camiones/ |
| 505 | https://www.dimaparecuador.com/talleres-automotrices/herramientas-taller-en-que-gastar/ |

Los slugs **no se cambian** aunque digan «precios» (496 «cuanto-cuesta», 498 «tipos-precios»):
el título visible sí.

## 6. Voz

Tuteo, español ecuatoriano, de técnico que vende equipos. Nada de: «en el mundo actual»,
«hoy en día», «cabe destacar», «sin lugar a dudas», «en conclusión», «la mejor opción»,
«amplia gama», «soluciones integrales», «calidad premium», «aliado estratégico». Las citas, si
hay, firmadas «Equipo técnico de Dimapar Ecuador».

## 7. Entrega

Por cada post, `despues/{id}.json`:
```json
{"id": 497, "title": "...", "yoast_title": "≤60 car.", "yoast_desc": "140-160 car.",
 "producto_portada": "slug-del-producto-principal (para la imagen destacada)",
 "content": "<!-- wp:... --> HTML Gutenberg completo"}
```
Valida con `python3 validar.py despues/{id}.json` hasta que diga OK.
