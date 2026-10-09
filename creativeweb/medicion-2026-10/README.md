# Creative Web — medición instalada (2026-10-08)

- **Problema:** el contenedor GTM-5H98NZ63 (v2 «Medición de contactos y CTAs», sep-2026) nunca se
  instaló en el sitio. GA4 324865677 tenía 0 whatsapp_click / form_submit desde julio.
- **Además** GA4 `G-P66GR3XMGR` se cargaba dos veces: Site Kit + Código personalizado de Elementor
  2599 «Head» con un gtag pegado a mano (gtag une el mismo ID, no duplicaba page_view, pero sobraba).
- **Arreglo:** el snippet 2599 ahora contiene solo el código de GTM (respaldo del gtag anterior en
  `snippet-2599-antes.html`). GA4 queda cargado una sola vez por Site Kit; GTM solo envía eventos
  (etiquetas gaawe con measurementIdOverride, sin etiqueta de configuración → sin page_view doble).
- **GTM v3:** se sumó el disparador «Clic — WhatsApp flotante (Click to Chat)» (selector CSS
  `#ht-ctc-chat`) a la misma etiqueta `whatsapp_click`: el botón de Click to Chat no es un enlace.
- Caché vaciada (Elementor + WP Super Cache por REST `wp-super-cache/v1/cache`).
- **No sumar** `whatsapp_click` con el `click` saliente de la medición mejorada ni con el `Click`
  de Click to Chat: son el mismo clic visto por tres vías.
