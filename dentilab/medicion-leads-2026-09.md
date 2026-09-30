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
- El `api_secret` se crea en GA4 → Admin → Flujos de datos → stream de DentiLab →
  **Measurement Protocol API secrets**, y se guarda en el `.env` del backend (no commitear).
  (Creative Web puede crearlo y pasártelo si prefieres.)

---

## 🟠 4. Conectar el embudo que ya existe

DentiLab ya tiene los eventos clave **`qualify_lead`** y **`close_convert_lead`** (y `purchase`)
configurados en GA4, pero **no se disparan** (0 eventos). Conectarlos desde donde se gestionan
los leads para seguir el camino completo:

`sign_up_completed` (registro) → `qualify_lead` (lead con intención real) → `close_convert_lead`
/ `purchase` (cliente que paga).

Así el informe podrá decir no solo cuántos se registran, sino cuántos se vuelven clientes y por
qué canal.

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
