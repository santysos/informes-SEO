# Mockups ASCII — Home Comercial Hidrobo

Layouts compactos por sección. Para validar jerarquía antes de tocar visual final.

---

## SECCIÓN 1 — Hero (full-screen)

```
╔══════════════════════════════════════════════════════════════════╗
║  [Foto: auto premium en exteriores con volcán Imbabura al fondo] ║
║  [Overlay gradient oscuro abajo, transparente arriba]            ║
║                                                                  ║
║                                                                  ║
║         CONCESIONARIO DE AUTOS NUEVOS                            ║
║         EN EL NORTE DEL ECUADOR                                  ║
║                                                                  ║
║         Renault · [Marca 2] · [Marca 3] · [Marca 4]              ║
║         Sucursales en Ibarra, Otavalo y Quito                    ║
║                                                                  ║
║   [● Cotizar por WhatsApp]  [○ Ver inventario]                   ║
║      (CTA primario sólido) (CTA secundario glass)                ║
║                                                                  ║
║                                                                  ║
║   ┌──────────────────────────────────────────────────────────┐  ║
║   │ [Glass card semi-transparente con backdrop-blur]         │  ║
║   │  ✓ Desde 1974   ✓ Distribuidor oficial   ✓ Garantía CKD  │  ║
║   └──────────────────────────────────────────────────────────┘  ║
╚══════════════════════════════════════════════════════════════════╝
```

**H1:** "Concesionario de autos nuevos en el norte del Ecuador"
**Keywords objetivo:** concesionario autos Ibarra, autos nuevos Imbabura, comprar auto Norte Ecuador

---

## SECCIÓN 2 — Trust Bar (cinta horizontal)

```
┌──────────────────────────────────────────────────────────────────┐
│   50+              4              100%             3             │
│   AÑOS         MARCAS        REPUESTOS       SUCURSALES          │
│ DESDE 1974    OFICIALES       GENUINOS    IBARRA · OTAVALO·QUITO │
└──────────────────────────────────────────────────────────────────┘
```

Cinta de fondo claro, métricas con números grandes color primary.

---

## SECCIÓN 3 — Portafolio de 12 marcas (grid 6x2)

```
┌──────────────────────────────────────────────────────────────────────┐
│                    12 MARCAS OFICIALES                               │
│      El portafolio más completo del norte del Ecuador                │
│                                                                      │
│ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐               │
│ │NISSAN│ │TOYOTA│ │RENAUL│ │MAZDA │ │ JEEP │ │ RAM  │               │
│ │ logo │ │ logo │ │ logo │ │ logo │ │ logo │ │ logo │               │
│ └──────┘ └──────┘ └──────┘ └──────┘ └──────┘ └──────┘               │
│                                                                      │
│ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐               │
│ │ FIAT │ │CHERY │ │CHANG │ │DONGFE│ │ BAIC │ │FOTON │               │
│ │ logo │ │ logo │ │ logo │ │ logo │ │ logo │ │ logo │               │
│ └──────┘ └──────┘ └──────┘ └──────┘ └──────┘ └──────┘               │
│                                                                      │
│            [Explorar todo el inventario →]                           │
└──────────────────────────────────────────────────────────────────────┘
```

**Layout responsive:**
- Desktop (lg+): 6 columnas × 2 filas
- Tablet (md): 4 columnas × 3 filas
- Mobile (sm): 3 columnas × 4 filas
- xs: 2 columnas × 6 filas

**Card pattern:** Solo logo grande + nombre debajo. Sin tagline (sería ruido con 12 cards). Hover: leve elevación + glass effect + logo scale 1.1.

Cada card linkea a `/marcas/[slug]/`. H3 con nombre para SEO.

CTA general al final: "Explorar todo el inventario" — resuelve también el caso de quien busca por modelo, no por marca.

---

## SECCIÓN 4 — Financiamiento (2 columnas)

```
┌──────────────────────────────────────────────────────────────────┐
│  ┌─────────────────────────┐  ┌────────────────────────────────┐│
│  │                         │  │ [Foto: entrega de llaves bajo  ││
│  │ Financiamiento que se   │  │  sol cálido, montaña al fondo] ││
│  │ ajusta a tu realidad    │  │                                ││
│  │                         │  │ ┌─────────────────────────┐    ││
│  │ ✓ Tasa preferencial     │  │ │ 0% ENTRADA              │    ││
│  │ ✓ Aprobación en 24h     │  │ │ en planes seleccionados │    ││
│  │ ✓ Hasta 60 meses plazo  │  │ │ [glass card flotante]   │    ││
│  │ ✓ Convenios banca       │  │ └─────────────────────────┘    ││
│  │   nacional              │  │                                ││
│  │                         │  │                                ││
│  │ [Solicitar asesoría]    │  │                                ││
│  └─────────────────────────┘  └────────────────────────────────┘│
└──────────────────────────────────────────────────────────────────┘
```

CTA "Solicitar asesoría" → abre modal con form corto JetFormBuilder (4 campos: nombre, teléfono, vehículo de interés, presupuesto).

---

## SECCIÓN 5 — Taller certificado (hero secundario)

```
╔══════════════════════════════════════════════════════════════════╗
║ [Foto fondo: taller real con técnicos trabajando en auto]        ║
║                                                                  ║
║                      ┌─────────────────────────────────────┐    ║
║                      │ [Panel glassmorphism a la derecha]  │    ║
║                      │                                     │    ║
║                      │ Taller certificado por las marcas   │    ║
║                      │                                     │    ║
║                      │ Nuestros técnicos están capacitados │    ║
║                      │ por las casas matrices para         │    ║
║                      │ mantener tu auto al estándar de     │    ║
║                      │ fábrica.                            │    ║
║                      │                                     │    ║
║                      │ ✓ Diagnóstico computarizado         │    ║
║                      │ ✓ Repuestos genuinos                │    ║
║                      │ ✓ Garantía en cada servicio         │    ║
║                      │                                     │    ║
║                      │ [Agendar cita en el taller →]       │    ║
║                      └─────────────────────────────────────┘    ║
╚══════════════════════════════════════════════════════════════════╝
```

CTA lleva a `/agendar-cita-taller/` (página actual con form de JetFormBuilder).

---

## SECCIÓN 6 — Repuestos (2 columnas inverted)

```
┌──────────────────────────────────────────────────────────────────┐
│  ┌────────────────────────┐  ┌────────────────────────────────┐  │
│  │ [Foto: repuestos       │  │  GARANTÍA DE ORIGEN            │  │
│  │  genuinos en estantes  │  │                                │  │
│  │  con iluminación clean]│  │  Repuestos genuinos para tu    │  │
│  │                        │  │  vehículo                      │  │
│  │                        │  │                                │  │
│  │                        │  │  Cada componente cumple las    │  │
│  │                        │  │  especificaciones de fábrica.  │  │
│  │                        │  │  No arriesgues tu garantía     │  │
│  │                        │  │  con alternativas genéricas.   │  │
│  │                        │  │                                │  │
│  │                        │  │  [Solicitar un repuesto →]     │  │
│  └────────────────────────┘  └────────────────────────────────┘  │
└──────────────────────────────────────────────────────────────────┘
```

CTA lleva a form de repuestos (JetFormBuilder), pero con **dropdown de marcas pre-filtrado** solo con las marcas que CH vende → resuelve el problema del memo.

---

## SECCIÓN 7 — Testimonios (3 cards)

```
┌──────────────────────────────────────────────────────────────────┐
│             Clientes que ya manejan con nosotros                 │
│                                                                  │
│  ┌────────────┐    ┌────────────┐    ┌────────────┐             │
│  │ 「          │    │ 「          │    │ 「          │             │
│  │ "Atención  │    │ "El finan- │    │ "El taller │             │
│  │ excelente, │    │ ciamiento  │    │ siempre    │             │
│  │ me asesoro │    │ fue rápido │    │ cumple los │             │
│  │ ron con..."│    │ y claro."  │    │ tiempos."  │             │
│  │            │    │            │    │            │             │
│  │ ◯ Foto     │    │ ◯ Foto     │    │ ◯ Foto     │             │
│  │ Nombre     │    │ Nombre     │    │ Nombre     │             │
│  │ Profesión  │    │ Profesión  │    │ Profesión  │             │
│  └────────────┘    └────────────┘    └────────────┘             │
└──────────────────────────────────────────────────────────────────┘
```

Cards con glass effect sutil. Necesitas conseguir 3 testimonios reales.

---

## SECCIÓN 8 — FAQ (acordeón con schema)

```
┌──────────────────────────────────────────────────────────────────┐
│                    Preguntas frecuentes                          │
│                                                                  │
│ ┌──────────────────────────────────────────────────────────────┐ │
│ │ ▼ ¿Qué necesito para financiar mi auto en Comercial Hidrobo? │ │
│ │   Necesitas cédula, planilla de servicios y rol de pagos de  │ │
│ │   los últimos 3 meses. Aprobamos tu crédito en 24h hábiles.  │ │
│ └──────────────────────────────────────────────────────────────┘ │
│ ┌──────────────────────────────────────────────────────────────┐ │
│ │ ▶ ¿Aceptan mi auto usado como parte de pago?                 │ │
│ ├──────────────────────────────────────────────────────────────┤ │
│ │ ▶ ¿Qué garantía tiene un auto nuevo de Comercial Hidrobo?    │ │
│ ├──────────────────────────────────────────────────────────────┤ │
│ │ ▶ ¿Dónde están sus sucursales?                               │ │
│ ├──────────────────────────────────────────────────────────────┤ │
│ │ ▶ ¿Hacen entregas a otras ciudades del Ecuador?              │ │
│ ├──────────────────────────────────────────────────────────────┤ │
│ │ ▶ ¿Tienen taller para vehículos de otras marcas?             │ │
│ └──────────────────────────────────────────────────────────────┘ │
└──────────────────────────────────────────────────────────────────┘
```

Items con glass effect. Schema FAQPage embebido (Google muestra rich snippet).

---

## SECCIÓN 9 — Blog / Novedades (3 posts dinámicos)

```
┌──────────────────────────────────────────────────────────────────┐
│ Novedades del sector                          [Ver todo el blog→]│
│ Información útil para conductores en Ecuador                     │
│                                                                  │
│ ┌──────────────┐  ┌──────────────┐  ┌──────────────┐            │
│ │ [img post]   │  │ [img post]   │  │ [img post]   │            │
│ │              │  │              │  │              │            │
│ │ CATEGORÍA    │  │ CATEGORÍA    │  │ CATEGORÍA    │            │
│ │ Título post  │  │ Título post  │  │ Título post  │            │
│ │ excerpt...   │  │ excerpt...   │  │ excerpt...   │            │
│ └──────────────┘  └──────────────┘  └──────────────┘            │
│ ← dinámicos via WP_Query (últimos 3 posts publicados)            │
└──────────────────────────────────────────────────────────────────┘
```

PHP carga últimos 3 posts. Sin hardcodear nada.

---

## SECCIÓN 10 — CTA final ancho

```
╔══════════════════════════════════════════════════════════════════╗
║ [Fondo: auto premium en sombras + leve gradient color primary]   ║
║                                                                  ║
║         ┌────────────────────────────────────────────┐           ║
║         │ [Panel glass grande con backdrop-blur]     │           ║
║         │                                            │           ║
║         │  ¿Listo para llevarte tu próximo auto?     │           ║
║         │                                            │           ║
║         │  Habla directo con un asesor o recorre     │           ║
║         │  nuestro inventario completo.              │           ║
║         │                                            │           ║
║         │  [● Cotizar por WhatsApp]                  │           ║
║         │  [○ Ver inventario completo]               │           ║
║         └────────────────────────────────────────────┘           ║
╚══════════════════════════════════════════════════════════════════╝
```

---

## Orden de scroll y razonamiento de conversión

| # | Sección | Objetivo |
|---|---------|----------|
| 1 | Hero | Convertir al 30% que ya viene decidido → WhatsApp inmediato |
| 2 | Trust bar | Reforzar credibilidad para los que dudan |
| 3 | Marcas | Mostrar variedad → reduce "¿venderán mi marca preferida?" |
| 4 | Financiamiento | Bloqueador principal de compra → eliminarlo |
| 5 | Taller | Diferenciador post-venta → eleva valor percibido |
| 6 | Repuestos | Trust de largo plazo + lead capture secundario |
| 7 | Testimonios | Prueba social → convierte indecisos del 30-60% |
| 8 | FAQ | Elimina objeciones residuales + SEO long-tail |
| 9 | Blog | Engage al que no compra hoy + SEO topical authority |
| 10 | CTA final | Última oportunidad antes de salir |

Cada sección abre una puerta de conversión sin saturar al usuario.
