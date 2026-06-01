# Carta de Luuma · Datos parseados de las 3 URLs

Datos extraídos del HTML público de `/menu/`, `/menu-almuerzo/` y `/bebidas/` el 1-jun-2026.
Sirven para: Schema Menu, tablas de precios en posts, datos del Google Business Profile.

Precios en USD (formato local Ecuador). Convertir comas a puntos para Schema.

---

## 🍽 Carta de comida (/menu/ y /menu-almuerzo/)

### Entradas y aperitivos

| Plato | Precio |
|---|---|
| Tradicional (snack manabita) | $8.50 |
| Jipijapa | $9.50 |
| Nuggets de pollo | $5.99 |
| Papa francesa de la casa con chorizo | $4.99 |
| Mini pizza clásica de jamón y queso | $5.99 |

### Pastas

| Plato | Precio |
|---|---|
| Carbonara | $13.60 |

### Fuertes

| Plato | Precio |
|---|---|
| Pechuga de pollo | $14.80 |
| Camarones | $15.90 |
| Pesca blanca | $17.80 |

**Rango de precios detectados en la carta de comida:** $2.00 – $17.80 (median ~$9.50).

---

## 🍸 Bebidas y cocteles (/bebidas/)

### Cocteles autor / signature

| Coctel | Precio | Notas |
|---|---|---|
| Aperol spritz | $13.80 | Más caro de la carta |
| Espresso martini | $10.90 | |
| Negroni | $11.50 | Clásico italiano |
| Manhattan | $10.50 | |
| Cosmopolitan | $9.85 | |
| Old fashion | $9.50 | |
| Mojito (no detectado en HTML — verificar) | s/d | |

### Cocteles clásicos tropicales

| Coctel | Precio |
|---|---|
| Piña colada | $10.95 |
| Mai tai | $11.95 |
| Blue Hawaiana | $10.35 |
| Huracán | $10.95 |
| Sex on the beach | $9.95 |
| Long Island ice tea | $8.60 |
| Mimosa | $6.95 |
| Paloma | $10.60 |
| Moscú mule | $9.90 |
| Gin basil smash | $9.60 |
| Saltamontes | $10.95 |
| Alexander | $11.50 |
| Caramelo | $10.45 |
| Orgasmo | $11.80 |
| Splice | $9.85 |

### Cervezas

| Cerveza | Precio |
|---|---|
| Club verde | $5.00 |
| Heineken | $6.00 |
| Corona | $6.00 |
| Stella Artois | $6.00 |

**Rango de precios bebidas:** $1.25 – $13.80.

---

## 📊 Datos útiles para SEO / Schema / Posts

### Para Schema Menu (JSON-LD)
```json
{
  "@context": "https://schema.org",
  "@type": "Menu",
  "name": "Carta de Luuma Rooftop",
  "hasMenuSection": [
    {
      "@type": "MenuSection",
      "name": "Entradas",
      "hasMenuItem": [
        {"@type": "MenuItem", "name": "Jipijapa", "offers": {"@type": "Offer", "price": "9.50", "priceCurrency": "USD"}},
        {"@type": "MenuItem", "name": "Tradicional", "offers": {"@type": "Offer", "price": "8.50", "priceCurrency": "USD"}}
      ]
    },
    {
      "@type": "MenuSection",
      "name": "Fuertes",
      "hasMenuItem": [
        {"@type": "MenuItem", "name": "Pesca blanca", "offers": {"@type": "Offer", "price": "17.80", "priceCurrency": "USD"}},
        {"@type": "MenuItem", "name": "Camarones", "offers": {"@type": "Offer", "price": "15.90", "priceCurrency": "USD"}}
      ]
    }
  ]
}
```

### Para posts del blog (uso de precios reales)
- **Post #5 "Almuerzo ejecutivo en Manta por zona":** mostrar que el rango de almuerzos de Luuma es **$4.99 – $17.80**, ubicar contra picanterías ($6–$8) y Flavio Reyes ($12–$18).
- **Post #8 "El coctel que creamos en Luuma con maracuyá":** mencionar el rango de la carta ($8.60 – $13.80) y que los autor están en $10–$13.
- **Post #6 "Mejores restaurantes de Manta":** posicionar Luuma como rango medio-alto ($10–$18 promedio en fuerte) vs picanterías ($5–$10).

### Para el snippet de Google (Knowledge Panel)
Cuando GBP esté verificado, declarar:
- Rango de precios: **$$ ($10–$30 promedio por persona)**
- Categoría: Restaurante latinoamericano, Bar, Rooftop, Marisquería

### Observaciones importantes

1. **NO se detectó precio del "viche"** en la carta automática parseada. Verificar manualmente: puede que esté en imagen o en la versión nueva del menú que no leyó el parser. Pedir al chef.
2. **NO se detectó "ceviche manabita"** explícito — probable que esté en imagen/PDF. Pedir.
3. **Los precios usan coma decimal** (`9,50`) en HTML local — Schema requiere punto decimal (`9.50`).
4. **No se detectaron "fuertes" manabitas tradicionales** (encocado, guatita) en el parseo — sospecho que la carta tiene foco en cocina más internacional (pastas, parrilla) que en manabita pura. Esto **contradice el posicionamiento que queríamos** ("cocina manabita contemporánea"). **Confirmar con el cliente:** ¿qué % del menú es manabita y qué % es internacional?
5. **Cervezas industriales solo** — no detecté cerveza artesanal de Manabí ni Iguana / Páramo. Sería diferenciador agregarlas.

---

## 🚧 Pendiente con el cliente

- Confirmar nombres en el menú: "Tradicional" y "Jipijapa" son nombres de plato cortos sin descripción. Pedir descripción de cada uno (ingredientes, origen).
- Pedir lista cerrada de "platos signature" (3-5 que diferencian a Luuma).
- Pedir lista de "cocteles autor" propios (los detectados son todos clásicos internacionales, no autor).
- Confirmar precio del viche/ceviche manabita.
