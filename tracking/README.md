# Tracking por API — GTM v2 + GA4 Admin

Deja medidos por script los dos contactos que importan en un sitio WordPress:
**clic a WhatsApp** y **envío de formulario**. Pensado para repetirlo cliente por
cliente sin volver a hacer cuarenta clics en la interfaz.

---

## Setup, una sola vez

### 1. Proyecto en Google Cloud

1. Entra a `console.cloud.google.com` con la cuenta que administra los GTM/GA4.
2. **Crear proyecto** → nombre `creativeweb-tracking`.
3. **APIs y servicios → Biblioteca**, y habilita las dos:
   - *Tag Manager API*
   - *Google Analytics Admin API*

### 2. Pantalla de consentimiento

**APIs y servicios → Pantalla de consentimiento de OAuth**
- Tipo: **Externo** (o Interno si la cuenta es de Workspace).
- Nombre de la app: `Creative Web Tracking`. Correo de asistencia y de contacto: el tuyo.
- En **Usuarios de prueba**, agrega tu propio correo de Google. Sin esto el flujo falla.

### 3. Credenciales

**APIs y servicios → Credenciales → Crear credenciales → ID de cliente de OAuth**
- Tipo de aplicación: **Aplicación de escritorio**.
- Descarga el JSON y guárdalo en esta carpeta como **`credentials.json`**.

### 4. Autorizar

```bash
tracking/.venv/bin/python tracking/auth.py
```

Abre el navegador una vez, autorizas, y queda un `token.json` que se reutiliza.
Google va a advertir que la app no está verificada: es tuya, entra en
*Configuración avanzada → Ir a Creative Web Tracking*.

> `credentials.json` y `token.json` están gitignorados. **Nunca los subas.**

---

## Uso

```bash
cd tracking

# Ver qué se va a configurar, sin publicar nada
.venv/bin/python configurar_contacto.py --contenedor GTM-P7MNVQ65 --propiedad OKCARS

# Publicarlo en vivo
.venv/bin/python configurar_contacto.py --contenedor GTM-P7MNVQ65 --propiedad OKCARS --publicar
```

| Parámetro | Para qué |
|---|---|
| `--contenedor` | `GTM-XXXXXXX` o el nombre del contenedor |
| `--propiedad` | Nombre o ID numérico de la propiedad GA4 |
| `--formulario` | `elementor` (por defecto), `cf7` o `gravity` |
| `--publicar` | Sin esto queda en el workspace para probar con Vista previa |

**Todo es idempotente.** Si un trigger o tag ya existe con ese nombre, lo actualiza
en lugar de duplicarlo, así que se puede correr las veces que haga falta.

---

## Qué crea, exactamente

| Elemento | Tipo | Qué hace |
|---|---|---|
| `Clic — WhatsApp` | Trigger de clic en enlace | Se dispara si la URL del enlace contiene `whatsapp` |
| `GA4 — whatsapp_click` | Tag de evento GA4 | Envía `whatsapp_click` con `link_url` y `pagina` |
| `Listener — formulario …` | HTML personalizado | Escucha el envío AJAX y empuja `form_enviado` al dataLayer |
| `Formulario enviado` | Trigger de evento personalizado | Escucha `form_enviado` |
| `GA4 — form_submit` | Tag de evento GA4 | Envía `form_submit` con `pagina` |

Y en GA4 marca `whatsapp_click` y `form_submit` como **eventos clave**.

### Por qué el listener del formulario

Elementor, Contact Form 7 y Gravity envían por **AJAX**. GA4 solo dispara
`form_submit` automático con envíos nativos del navegador, así que con estos
plugins llega `form_start` y nunca el envío. El listener traduce el evento propio
del plugin (`submit_success`, `wpcf7mailsent`, `gform_confirmation_loaded`) a un
evento del dataLayer que GTM sí puede escuchar.

### Por qué los tags no llevan etiqueta de configuración

Los tags de evento apuntan directo al ID de medición con `measurementIdOverride`.
Si el sitio ya carga GA4 por otra vía —**Site Kit**, gtag directo— añadir una
etiqueta de configuración en GTM **duplicaría las vistas de página**. Así solo
viajan los eventos que definimos y lo demás sigue como estaba.

---

## Antes de dar por bueno el trabajo

1. **Modo Vista previa de GTM** sobre el sitio: haz clic en un WhatsApp y envía un
   formulario de prueba, y confirma que los dos tags disparan.
2. **GA4 → Tiempo real**: los eventos deben aparecer en menos de un minuto.
3. Recuerda que los eventos clave **solo cuentan desde que se marcan**; el
   histórico no se recalcula.
4. Si el sitio usa **Site Kit**, el contenedor se instala desde
   *Site Kit → Ajustes → Tag Manager*, no pegando el snippet a mano. Site Kit
   coloca el `<script>` del head y el `<noscript>` del body en su sitio.

---

## Lo que esto NO resuelve

Medir no sirve si no hay qué medir. Antes de configurar, revisa que **las páginas
que reciben tráfico tengan un canal de contacto visible**. En OKCars el botón de
WhatsApp existía solo en las fichas de vehículo, mientras que el 62 % del tráfico
llegaba a la home y a los posts, que no tenían ninguna salida. Con el mejor
tracking del mundo, eso mide cero.
