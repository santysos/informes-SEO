# Fase 0 — qué hay que subir y dónde

Dos archivos a la tienda (`ventas.creativeweb.com.ec`), por cPanel → Administrador de
archivos. Ninguno de los dos necesita activarse.

| Archivo | Dónde va |
|---|---|
| `robots.txt` | la **raíz** del subdominio · `/public_html/ventas/robots.txt` |
| `seo_tienda.php` | `/public_html/ventas/includes/hooks/seo_tienda.php` |

Si la carpeta del subdominio no se llama `ventas`, es la que aparezca en cPanel →
Subdominios. La carpeta `includes/hooks/` ya existe en toda instalación de WHMCS.

## Cómo comprobar que quedó bien

1. Abrir `https://ventas.creativeweb.com.ec/robots.txt` — debe mostrar el texto,
   no una página de error.
2. Abrir `https://ventas.creativeweb.com.ec/store/hosting-web` y ver el código fuente:
   el `<title>` ya no debe decir «Carrito».
3. Entrar a `/login` y confirmar que funciona con normalidad. Ahora lleva
   `<meta name="robots" content="noindex,follow">`.
4. En Search Console, pedir indexación de `/store` y `/store/hosting-web`.

Si después de subirlo el título siguiera diciendo «Carrito», es que la plantilla del
formulario de pedido no usa la variable `pagetitle`. Avisar y se resuelve tocando la
plantilla; el resto (descripción, canonical y noindex) funciona igual.

## Por qué esto es lo más urgente

Search Console, 16 meses, corte 2026-09-05:

- Las páginas de producto de la tienda: **0 apariciones**.
- `/login?language=german`, `?language=italian`, `?language=dutch`, `?language=arabic`,
  `?language=farsi` y compañía: **3.196 apariciones y 20 clics**.
- Posición media de la tienda: **11,8 en nov-2025 → 76,6 en mar-2026 → 74 hoy**.

Google no encontró nada mejor que indexar, así que indexó los inicios de sesión.

## ⚠️ Antes de subirlo: confirmar los precios

Los textos llevan los precios que **cobra la tienda hoy**, que no coinciden con los de la
proforma oficial:

| Plan | Proforma oficial | Tienda | En el archivo |
|---|---|---|---|
| Inicial | $59,99 | $59,99 | $59,99 |
| Webmaster | $83,99 | **$83,88** | $83,88 |
| Pymes | $95,99 | **$95,88** | $95,88 |
| Cuarto plan | «Ilimitado» | se llama **«Pro»** | Pro |

Si el precio bueno es el de la proforma, hay que cambiarlo en la tienda **y** en este
archivo antes de subirlo. Ojo: la proforma de Stelmap (1-2-1327) salió con $95,99.

## Lo que falta de la Fase 0

Los otros tres arreglos son sobre el WordPress de `creativeweb.com.ec` y necesito una
contraseña de aplicación para aplicarlos por API:

- Reescribir cinco títulos que ya rankean y no convierten
- Completar la meta descripción de `/servicios/paginas-web/`
- Cambiar el H1 del home de «Páginas Web en Quito» a Otavalo

Se genera en wp-admin → Usuarios → tu perfil → Contraseñas de aplicación.
