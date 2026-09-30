# DentiLab — medir cómo llegan los leads (spec para el equipo)

**Objetivo:** saber de dónde viene cada registro de prueba (Google, ChatGPT/IA, recomendación,
redes…), sin depender de que la persona lo cuente. Hoy los registros **no se miden** como
evento, y los leads de ChatGPT/boca a boca caen como «Directo» en GA4 (no pasan referente).

**Stack (verificado):** Next.js · gtag.js directo · GA4 `G-2KR6LYXZVP` (propiedad 550937814).
**Formulario de registro** (`/signup`) hoy pide: `full_name`, `email`, `clinic_name`,
`org_name`, `password`, `plan`. No pregunta el origen.

**Ya hecho por Creative Web (lado GA4):**
- ✅ Dimensión personalizada **`lead_source`** (alcance Evento) creada.
- ✅ Evento clave **`sign_up_completed`** creado (cuenta como conversión).

Falta lo del lado del código. Orden de prioridad:

---

## 🔴 1. Campo «¿Cómo nos conociste?» en el registro (lo más importante)

Agregar un desplegable **obligatorio** al formulario de `/signup` y guardarlo en la BD junto
al lead. Es lo único fiable para IA y boca a boca (que GA4 no ve).

Opciones y valores sugeridos (value → etiqueta):
```
google        → Google / buscando en internet
chatgpt_ia    → ChatGPT u otra IA
recomendacion → Recomendación de un colega
redes         → Redes sociales (Instagram, Facebook, TikTok)
publicidad    → Un anuncio
otro          → Otro
```
Guardar el `value` en la tabla del lead/organización (campo `lead_source`), para poder cruzarlo
después con el estado del lead (calificado, cliente).

---

## 🔴 2. Disparar `sign_up_completed` al completar el registro

Cuando el registro se crea con éxito (no al abrir el form), disparar el evento con el origen y
el plan. gtag ya está cargado en el sitio.

```ts
// tras crear la cuenta con éxito
function trackSignup(leadSource: string, plan: string) {
  if (typeof window === "undefined") return;
  const w = window as unknown as { gtag?: (...a: unknown[]) => void };
  w.gtag?.("event", "sign_up_completed", {
    lead_source: leadSource,   // el value del campo del paso 1
    plan: plan,
  });
}
```

- Dispararlo **una sola vez**, en el éxito real del registro.
- Con esto, GA4 cuenta cada prueba **y** le suma automáticamente la fuente técnica
  (google, chatgpt.com, directo…), que se cruza con el `lead_source` autoreportado.

---

## 🟠 3. Backup del lado del servidor (Measurement Protocol)

Si el registro se confirma en el backend (o hay activaciones manuales), enviar también el
evento server-side para no perder ninguno aunque el navegador no dispare. Mismo enfoque que en
SRIFlow.

```
POST https://www.google-analytics.com/mp/collect?measurement_id=G-2KR6LYXZVP&api_secret=<API_SECRET>
{
  "client_id": "<client_id de GA del usuario o uno estable, p.ej. hash del email>",
  "events": [{
    "name": "sign_up_completed",
    "params": { "lead_source": "chatgpt_ia", "plan": "pro", "source": "server" }
  }]
}
```
- ✅ **El `api_secret` ya está creado** por Creative Web (2026-09-29): stream de DentiLab
  `G-2KR6LYXZVP`, apodo «api», validado contra el endpoint debug de Google. El valor se
  entregó aparte (no se commitea). **Solo falta ponerlo en las variables de entorno de
  producción (Vercel) como `GA4_API_SECRET`** al desplegar la rama `seo/medicion-leads`.

---

## 🔴 4. El embudo: replicar el modelo de Quipuy (falta la ACTIVACIÓN)

**Verificación (2026-09-29):** los eventos clave de DentiLab (`purchase`, `qualify_lead`,
`close_convert_lead`, `sign_up_completed`) están **definidos en GA4 pero no se disparan**
(0 eventos en 180 días). El embudo está declarado, no cableado.

Como referencia, el embudo de **Quipuy sí funciona** porque cada evento se dispara desde el
propio producto, y su señal más fuerte es la **activación** intermedia:

| Quipuy (funciona) | DentiLab (equivalente a instrumentar) |
|---|---|
| `sign_up_completed` — registro | `sign_up_completed` — registro de prueba |
| **`first_invoice_authorized` — ACTIVACIÓN** (usó el producto de verdad) | **falta:** un evento de activación, p.ej. `first_patient_created` o `first_record_created` (creó su primer paciente / historia clínica / cita) |
| `subscription_paid` / `purchase` — pago | `subscription_paid` / `purchase` — pago |

**✅ Implementado (rama `seo/medicion-leads`, 2026-09-29):**
- `first_record_created` se dispara al crear el **primer paciente** de la clínica
  (`src/app/app/pacientes/actions.ts`), que es la activación del embudo. Evento clave ya
  creado en GA4.
- `sign_up_completed` también en el **registro con Google** (`completar-registro/actions.ts`),
  con el campo «¿Cómo nos conoció?» agregado a esa pantalla.

Solo falta que esto se **mergee a `main` y se despliegue** (+ la env var del punto 1).

Embudo objetivo de DentiLab:
`sign_up_completed` (registro) → **`first_record_created`** (activación: usó el sistema) →
`subscription_paid`/`purchase` (pago). Los `qualify_lead`/`close_convert_lead` quedan como
etapas de venta opcionales encima de eso, disparadas desde el CRM.

Cada evento debe **dispararse desde la app en la acción real** (como en Quipuy), no quedar solo
declarado en GA4.

---

## Verificación (cuando esté desplegado)

1. GA4 → **Tiempo real**: completar un registro de prueba y ver `sign_up_completed` con su
   `lead_source`.
2. En 24-48 h, en Informes/Exploraciones, cruzar `sign_up_completed` por **fuente de sesión** y
   por **Lead source** (la dimensión ya creada).

Con esto, cada mes Creative Web reporta: **«X registros — tantos de ChatGPT, tantos de Google,
tantos por recomendación»**, con número, no por lo que cuente la gente.

---

### Contexto que motiva esto (datos reales, 90 días)
- Sitio nuevo, en crecimiento: 82 usuarios/30d.
- **ChatGPT ya trae leads reales:** `chatgpt.com` = 8 sesiones/8 usuarios (+1 Copilot).
- El contenido posiciona en consultas de dentistas: «cie 10 odontología» (367 impresiones),
  formulario 033, abrir consultorio dental. Público B2B correcto.
- Pero los registros (ej. 2 pruebas el 29-sep) **no se miden hoy** — de ahí este spec.
