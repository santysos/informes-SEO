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
