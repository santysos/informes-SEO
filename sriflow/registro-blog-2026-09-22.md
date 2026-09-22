# SRIFlow — trabajo en el blog (2026-09-22)

Ejecución de la parte "blog" de la estrategia (`estrategia-2026-09-22.md`). Objetivo:
convertir mejor el tráfico del blog, que ya trae al cliente correcto pero casi no registra ni
compra.

## Qué se hizo (desplegado en producción)

Repo del blog: `/Users/creativeweb/DESARROLLO/sriflow-blog` (Next.js static export, **no está
en git** — ver riesgo abajo). Desplegado con `scripts/deploy.sh` a
`root@134.199.200.185:/var/www/sriflow/blog`. Backup del deploy: `blog.backup-20260922-121351`.

1. **CTA a mitad de artículo, en los 34 posts.** Antes solo había CTA al final (donde poca
   gente llega). Se agregó `src/components/CtaBox.tsx` y se inyecta automáticamente desde el
   renderizador (`src/app/[slug]/page.tsx`): parte el MDX en un encabezado H2 cercano al 45 %
   del contenido e inserta el bloque de CTA ahí. Cubre todos los posts sin editarlos uno por
   uno, y los futuros lo heredan.
2. **Medición de los clics del CTA.** Cada clic dispara el evento GA4 `blog_cta_click` con el
   parámetro `cta_location` = `mid` | `final`. Así sabremos qué CTA convierte.
3. **Dimensión registrada en GA4:** `CTA location` (parámetro `cta_location`, alcance Evento)
   en la propiedad 501535833. Los datos cuentan desde hoy.

Verificado en vivo: los tres posts top muestran CTA mid + final y enlazan a `/signup`.

## Hallazgos de medición (importantes)

- **El blog y el sitio comparten la misma propiedad GA4** (501535833) y el mismo measurement
  ID `G-1C3D5GJ2NG` (stream "Sriflow Web"). El embudo está unificado; la baja conversión no es
  un artefacto de propiedades separadas.
- 🔴 **Bug de medición de ventas:** hubo una venta real este mes (plan trimestral pagado por
  PayPhone), pero GA4 marca `subscription_paid = 0` en 180 días. **El evento de pago no está
  llegando a GA4.** Es lo más importante a arreglar del lado del equipo: sin esto no se puede
  medir ni optimizar la conversión a pago. (El evento `subscription_paid` se instrumentó en
  `RespuestaPayphone`; hay que verificar que dispare en el flujo real de PayPhone.)

## Riesgo — resuelto

- **El blog ya está bajo control de versiones.** Se inicializó git en `sriflow-blog`
  (`.gitignore` con node_modules/.next/out, commit inicial `e6ef013`, 34 posts + fuente).
  Falta solo, si se quiere, crear el remoto en GitHub (como Quipuy/SRIFlow).

## Aviso al equipo/otro Claude de SRIFlow

Se dejó un handoff con las correcciones del lado de la app en
`/Users/creativeweb/DESARROLLO/boxpli/AVISO-SRIFLOW-CONVERSION-2026-09-22.md` (boxpli es el hub
del VPS compartido Boxpli+SRIFlow). Incluye: (1) el bug de `subscription_paid` con el fix por
Measurement Protocol server-side, (2) fricción de registro, (3) el acantilado de descarga de la
app.

## Pendiente del blog (siguiente pasada)

- **Lead magnet:** plantilla del Formulario 104 en Excel como descarga a cambio del correo
  (hay demanda clara de esa query). Necesita el archivo + captura de correo (infra).
- Reforzar el pivote al producto dentro del texto de los posts del cluster de anulaciones y
  104-Excel (el contenido ya es bueno; el CTA visible ya se agregó).
- A 2-3 semanas: revisar `blog_cta_click` por `cta_location` para ver qué CTA rinde y ajustar.

## Ampliación: 8 posts nuevos (2026-09-22, tarde)

Se agregaron 8 posts al blog (34 → 42), con verificación anti-canibalización previa contra
los focus keywords existentes. Enfoque: **intención comercial** (atraer a quien busca una
herramienta, que convierte mejor) + gaps reales, en vez de más contenido informativo que ya
estaba cubierto. Todos heredan el CTA mid+final medible y llevan enlazado interno.

**Intención de herramienta (mayor conversión):**
1. `programa-para-descargar-comprobantes-del-sri` — quien busca una solución, no un tutorial.
2. `herramientas-estudio-contable-ecuador-2026` — persona compradora (estudios con varios clientes).
3. `cuanto-tiempo-pierde-contador-portal-sri` — ángulo dolor/ROI.

**Gaps reales / volumen:**
4. `formulario-104a-rimpe-que-es-como-llenarlo` — el cluster RIMPE estaba mal cubierto (pos 40-62).
5. `calendario-tributario-sri-2026` — imán estacional recurrente.
6. `respaldar-comprobantes-sri-antes-de-que-caduquen` — encaje directo con el producto.
7. `notas-de-credito-y-debito-sri-como-afectan-iva` — gap (no había post dedicado).
8. `declarar-iva-en-cero-sri-sin-movimientos` — demanda real, distinto de los 104 existentes.

Descartados por canibalización: "descarga masiva/varios RUC" (pisaba `como-manejar-multiples-rucs`)
y un 3er post de anulaciones (pisaba los 2 existentes).

Desplegado (`blog.backup-20260922-124143`), los 8 verificados en vivo (200) con CTA. Commit del
blog `733f808`. **Recordatorio:** esto es la palanca #2 (alcance); la #1 sigue siendo la
conversión de la app (aviso en `boxpli/AVISO-SRIFLOW-CONVERSION-2026-09-22.md`).

## Secreto de Measurement Protocol puesto (2026-09-22)

El otro Claude ya implementó el envío server-side de `subscription_paid`. Creé el
Measurement Protocol API secret en GA4 (stream "Sriflow Web", `dataStreams/12044904694`), lo
escribí en `/root/SRIFlow/backend/.env` (`GA4_API_SECRET=`, por stdin) y reinicié `sriflow`
(active, sitio 200). Validado contra el endpoint debug de MP: `validationMessages: []`.
Falta que el equipo confirme con una compra de prueba que aparece en GA4 y marque
`subscription_paid` como evento clave. Detalle en `boxpli/AVISO-SRIFLOW-CONVERSION-2026-09-22.md`.
