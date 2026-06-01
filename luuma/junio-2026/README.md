# Luuma · Junio 2026 · Campaña SEO Local

Implementación de la campaña SEO local planificada el 2026-06-01. El plan completo vive en `/Users/creativeweb/.claude/plans/te-voy-a-enviar-virtual-deer.md`.

## Estructura de la carpeta

```
luuma/junio-2026/
├── README.md                          # Este archivo
├── DATOS-CLIENTE-PENDIENTES.md        # Todo lo que necesitamos del cliente
├── publish_batch.py                   # Script de publicación de Fase 2 (10 posts nuevos)
├── update_yoast_meta.py               # Script Fase 1 (rewrites de title/meta)
├── audit-batch-marzo.py               # Script Fase 4 (auditoría 56 posts batch 28-mar)
├── posts/
│   ├── spec-01-platos-tipicos-manabi.json  # Post #1 completo (template referencia)
│   └── _BRIEFS-02-10.md               # Briefs de los 9 restantes
└── audit/                              # Outputs de scripts (CSVs, JSONs de logs)
```

## Cómo arrancar

### Paso 1 — Antes de tocar cualquier script
Leer `DATOS-CLIENTE-PENDIENTES.md` y pedir al cliente lo de la sección "Bloqueantes inmediatos":
- Application Password WP → `.env` como `LUUMA_WP_APP_PASS`
- IDs de las 5 categorías del blog
- Número WhatsApp + URL del menú

### Paso 2 — Verificar credenciales y descubrir IDs
```bash
# Verificar acceso REST
curl -A "Mozilla/5.0" -u "noritake:$LUUMA_WP_APP_PASS" \
  https://www.luumarooftop.com/wp-json/wp/v2/users/me

# Listar categorías (anotar IDs en los specs)
curl -A "Mozilla/5.0" -u "noritake:$LUUMA_WP_APP_PASS" \
  https://www.luumarooftop.com/wp-json/wp/v2/categories?per_page=20
```

### Paso 3 — Fase 1: Rewrites de Yoast (semana 1)
```bash
# Dry-run primero
python3 -u update_yoast_meta.py

# Si se ve bien, aplicar
python3 -u update_yoast_meta.py --apply
```

Si Yoast bloquea los metas silenciosamente (verificar manualmente en /wp-admin):
- Subir mu-plugin tipo `dimapar-rest-meta.php` (ver `/dimapar/redesign/wp-plugin/dimapar-rest-meta.php`)
- O entregar lista Excel al cliente para que copie-pegue en admin

### Paso 4 — Fase 2: Posts nuevos (semanas 2-8)
Cuando llegue la info del equipo (citas reales, anécdotas) y los precios del menú:

1. Completar `posts/spec-01-platos-tipicos-manabi.json` (reemplazar `{{...}}`)
2. Quitar `"skip": true` cuando esté listo
3. Convertir los briefs `_BRIEFS-02-10.md` en specs JSON uno por uno
4. Publicar de 1-2 por semana:
   ```bash
   python3 -u publish_batch.py 2>&1 | tee /tmp/luuma-publish.log
   ```

**NO publicar varios el mismo día.** Google ya nos vio publicar 56 el 28-mar, hay que romper ese patrón.

### Paso 5 — Fase 4: Auditoría batch marzo (semana 6)
```bash
# Sin GSC primero (solo análisis de contenido)
python3 -u audit-batch-marzo.py

# Con GSC (mejor): exportar CSV de Search Console (período: últimos 90 días)
python3 -u audit-batch-marzo.py --gsc-csv ~/Downloads/Pages.csv
```

El output (CSV + clusters JSON) en `audit/` se revisa manualmente y se decide con el cliente qué acción ejecutar por post.

## Reglas no negociables

### Anti-IA (lista negra que `publish_batch.py` valida automáticamente)
- "En conclusión", "En resumen", "En definitiva", "Para concluir"
- "Sin duda alguna", "Es importante destacar", "Cabe mencionar"
- "Mundo gastronómico", "experiencia única", "viaje sensorial", "deleitar el paladar"
- "Sumérgete", "descubre", "explora" como verbos iniciales
- "Si eres un amante de..."
- "Esperamos verte pronto"

### Obligatorios en cada post
- Mínimo 2 referencias geográficas concretas de Manta
- 1 cita textual real del equipo (blockquote)
- Cierre con CTA específico (NO con "esperamos verte")

Si un post no pasa la validación, el script lo skipea automáticamente. Para forzar publicación (sin recomendación), agregar `"force": true` al spec.

## Convenciones técnicas heredadas del repo

- WAF-safe: delays 8s entre llamadas + 25s entre posts, User-Agent navegador, urllib no curl (ver `CLAUDE.md` nota 1)
- Yoast meta vía REST a veces ignora silenciosamente — verificar manualmente (nota 5)
- Si metas privados son rechazados, mu-plugin con `show_in_rest=true` (nota 7)
- Push siempre a `origin/main` al finalizar tarea

## KPIs y meta

| KPI | Baseline (mar-may) | Meta mes 3 | Meta mes 6 |
|---|---|---|---|
| Clics orgánicos/mes | 219 | 600 | 1.200 |
| CTR | 3,5% | 5,0% | 5,5% |
| % no-brand | 26,2% | 35% | 45% |
| Reseñas Google | 0 | 30 | 80 |

## Logs y registro

- `/luuma/registro-mensual/2026-06-junio.md` — qué se hizo este mes
- `audit/rewrites-fase1-{fecha}.csv` — log de cada rewrite con before/after
- `audit/batch-marzo-{fecha}.csv` — clasificación de los 56 posts del batch
- `audit/clusters-{fecha}.json` — agrupación de posts por tópico para decidir MERGE
