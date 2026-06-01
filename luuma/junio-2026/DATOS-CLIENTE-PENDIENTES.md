# Datos pendientes del cliente · Luuma Rooftop · Junio 2026

Lista única de todo lo que necesitamos del cliente para arrancar la campaña SEO local. Está priorizado por bloqueo: lo de arriba bloquea más cosas que lo de abajo.

---

## 🔴 Bloqueantes inmediatos (sin esto no podemos publicar nada)

### 1. Acceso WordPress vía REST API ✅ RECIBIDO 1-jun
- [x] Application Password recibida y guardada en `.env` como `LUUMA_WP_APP_PASS`
- [x] Usuario: `admin@creativeweb.com.ec` (LUUMA_WP_USER)
- [x] URL base: `https://www.luumarooftop.com/wp-json/wp/v2`
- [ ] **Pendiente:** autorizar a Claude las llamadas REST en producción para verificar acceso, listar IDs de categorías y descubrir IDs de las pages /menu/ y home.

### 2. IDs de las 5 categorías del blog
Necesitamos los IDs reales (no slugs) para los specs JSON:
- gastronomia-manta → ID = ?
- vida-en-manta → ID = ?
- eventos-entretenimiento → ID = ?
- recetas-cocina → ID = ?
- cocteles-mixologia → ID = ?

*Esto lo podemos detectar nosotros via REST una vez tengamos el Application Password. Pero confirmar que las 5 categorías siguen activas.*

### 3. Número de WhatsApp oficial + URLs de carta ✅ COMPLETO 1-jun
- [x] WhatsApp: **593963485983** → `.env` como `LUUMA_WHATSAPP`
- [x] **URLs de carta confirmadas (1-jun):**
  - Menú general (carta): `https://www.luumarooftop.com/menu/` → `LUUMA_MENU_URL`
  - Menú de almuerzos: `https://www.luumarooftop.com/menu-almuerzo/` → `LUUMA_MENU_ALMUERZO_URL`
  - Bebidas y cocteles: `https://www.luumarooftop.com/bebidas/` → `LUUMA_BEBIDAS_URL`

  *Estas 3 URLs vivas alimentan: Schema Menu, CTAs específicos por post (post de almuerzos → link a /menu-almuerzo/; post de coctel autor → link a /bebidas/), y tablas de precios reales en cada post.*

---

## 🟠 Bloqueantes para tono humano (los posts suenan a IA sin esto)

### 4. Datos del equipo ✅ RESUELTO con voz colectiva 1-jun
- [x] Cliente confirmó NO compartir nombres → usamos **voz colectiva honesta** en lugar de inventar
- Citas se atribuyen a "Equipo de cocina de Luuma Rooftop" / "Equipo de barra de Luuma Rooftop"
- Voz dominante en primera persona plural ("nosotros en Luuma", "lo que servimos", "cuando alguien llega")
- Anécdotas en plural ("aprendimos cocinando aquí", "cuando empezamos a hacer este coctel")
- **Si en el futuro Luuma quiere dar nombres específicos**, las citas se pueden actualizar sin reescribir el resto

### 5. Lista de precios actualizada del menú ✅ PARCIAL 1-jun
- [x] Las 3 cartas vivas en el sitio: `/menu/`, `/menu-almuerzo/`, `/bebidas/`. Vamos a parsear directamente desde ahí.
- [ ] Identificar 3-5 platos "signature" (los que diferencian a Luuma) — pedir al chef
- [ ] Identificar 3-5 cocteles "signature" — pedir al bartender
- [ ] Identificar el plato y el coctel más vendidos — pedir a operaciones

*Las URLs vivas alimentan Schema Menu, tablas de los posts, y el contenido del CTA.*

### 6. Fotos ✅ PARCIAL 1-jun (usando librería existente)
Inventario completo en `data/inventario-fotos-2026-06-01.md`:
- [x] 214 imágenes en wp-uploads. Categorizadas
- [x] 6 fotos de platos (menú criollo, chuleta, pollo teriyaki, corte de carne, sisa, lomo salteado)
- [x] 80 fotos profesionales del rooftop/ambiente (sesión `luuma-rooftop-restaurant-manabi-manta-1` a 13)
- [x] 4 fotos vinos/cervezas
- [x] Asignación de `featured_media` para los 10 posts planificados

**Gaps a pedir al cliente (cuando pueda):**
- [ ] Fotos específicas de viche, encocado, corviche, ceviche manabita (no hay en librería)
- [ ] Fotos de cocteles autor (mojito, espresso martini, coctel maracuyá)
- [ ] 2-3 fotos del equipo trabajando (sin rostro si prefieren)

---

## 🟡 Bloqueantes para SEO local (sin esto no entramos al pack)

### 7. Google Business Profile
- [ ] ¿Existe el perfil? Si sí: enviar invitación de gestor a un correo de Creative Web
- [ ] Si no existe: empezar verificación postal o video (puede tomar 4-6 semanas)
- [ ] Confirmar dirección exacta para verificación
- [ ] Confirmar horarios reales por día + horarios especiales (feriados, cierre por evento privado)

### 8. NAP canónico (Name + Address + Phone)
- [ ] Nombre legal exacto: "Luuma Rooftop" (o variación oficial)
- [ ] Dirección exacta (calle + número + piso + barrio + ciudad + provincia + país)
- [ ] Teléfono fijo (si aplica) + WhatsApp
- [ ] Email institucional para directorios

*Este NAP va idéntico, caracter por caracter, en los 14 directorios.*

### 9. Accesos analítica
- [ ] Acceso editor a Google Search Console (Property delegada o usuario invitado)
- [ ] Acceso editor a Google Analytics 4 (Property)
- [ ] ¿Existe contenedor Google Tag Manager? Si sí, acceso editor. Si no, autorizar instalación.
- [ ] Acceso a Yoast SEO Premium si está instalado (para configurar Schema avanzado)

---

## 🟢 Datos contextuales (no bloquean, mejoran la calidad)

### 10. Posicionamiento de marca
- [ ] ¿Cómo describirían a Luuma en una sola frase a alguien que nunca ha estado?
- [ ] ¿Qué los diferencia del resto de rooftops de Manta?
- [ ] ¿Cuál es la queja más común del cliente que reciben?
- [ ] ¿Cuál es el elogio más común?
- [ ] ¿Qué historia detrás del nombre "Luuma"?

### 11. Eventos recurrentes y especiales
- [ ] Calendario de eventos recurrentes (música en vivo días X, brunch los domingos, etc.)
- [ ] Próximos 3 eventos especiales con fecha y banda
- [ ] Eventos privados aceptados (cumpleaños, empresariales): rango de capacidad y precios

### 12. Reseñas existentes
- [ ] Link del Google Business Profile actual (si existe)
- [ ] Link de TripAdvisor (si existe)
- [ ] Link de Facebook page
- [ ] Link de Instagram (@usuario)
- [ ] ¿Tienen sistema actual de pedir reseñas? ¿Cuántas reseñas tienen aproximadamente?

### 13. Competencia identificada
- [ ] ¿Qué 3-5 lugares en Manta consideran competencia directa?
- [ ] ¿Hay algún lugar al que NO les molesta recomendar a un cliente que pida algo que ellos no sirven?

*Esto alimenta los posts de "Restaurantes en Manta" y "Rooftops en Manta" — la honestidad genera autoridad.*

---

## Resumen ejecutivo de lo que necesitamos esta semana

Si pides solo lo más urgente al cliente:

1. **Application Password de WP + URL base** → para correr cualquier script
2. **IDs de categorías + número WhatsApp + URL menú** → para los specs JSON
3. **Datos de 3 miembros del equipo (cita real + anécdota)** → sin esto no hay voz humana
4. **Lista de precios del menú + 5 fotos sin marca de agua** → para Schema Menu y los posts
5. **Acceso GSC + GA4** → para medir el impacto

Con esos 5 podemos empezar Fase 1 (rewrites Yoast) y la redacción de Post #1 esta semana.

Los demás puntos pueden venir progresivamente durante las primeras 2-3 semanas.
