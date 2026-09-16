# Registro de trabajo — Septiembre 2026
**Cliente:** Comercial Hidrobo · comercialhidrobo.com
**Foco del mes:** convertir el tráfico SEO en citas de taller (embudo de conversión)
**Fecha del registro:** 16 de septiembre de 2026

Este documento es el insumo para el informe mensual. Reúne el diagnóstico con datos, las
decisiones tomadas y todo lo ejecutado y verificado. Detalle técnico complementario en
`comercial-hidrobo/EMBUDO-TALLER.md`.

---

## 1. La estrategia que definimos

El sitio de un concesionario **no cierra la venta del auto por la web**: comprar un vehículo
es una decisión larga, de varias visitas y contacto humano. Forzar el sitio a "vender autos"
online rinde poco. En cambio, el **taller de servicio** es la conversión realista y
recurrente: quien mantiene su auto vuelve cada pocos meses.

**Decisión central:** el SEO trae las visitas, pero el embudo del sitio debe estar diseñado
para **cerrar citas de taller**. Todo el contenido de dueños de auto tiene que empujar hacia
la reserva de taller.

---

## 2. Diagnóstico con datos (Search Console + GA4, 90 días al 14-sep-2026)

### El sitio en búsqueda (Search Console)
- 12.457 clics · 930.951 impresiones · CTR 1,34 % · posición media 6,5.
- 577 páginas reciben impresiones, pero **el 49 % tiene impresiones y cero clics**.

### El comportamiento de las visitas (GA4)
- 18.808 sesiones en el período.
- Solo **312 sesiones (1,7 %) llegan a la página de reserva** `/solicitar-cita-taller-mecanico/`.
- 53 envíos del formulario de cita de taller · **25 reservas confirmadas** (página de gracias).
- 184 clics a WhatsApp.

### El hallazgo clave
**El problema no es tráfico, es ruteo.** Existen **47 posts dirigidos a dueños de auto**
(mantenimiento, garantía, consumo, cuidado, postventa) que suman **267.382 impresiones y
2.323 clics** — la audiencia perfecta para el taller. Pero **morían en un enlace a
`/contacto/` genérico**, sin llevar a reservar.

El caso más claro: la página **Tabla de mantenimiento Toyota** —la #1 en clics del sitio
(37.367 impresiones, 689 clics)— tenía el **peor CTA** (solo `/contacto/`). En cambio,
"Cambio de aceite" ya tenía el patrón correcto (botón a reservar + WhatsApp del taller). O
sea: la solución ya existía en una página, faltaba estandarizarla en todas.

---

## 3. Decisiones tomadas

1. **Norte del embudo: citas de taller.** El contenido de dueños se convierte en fuente de
   reservas.
2. **Estandarizar el bloque de reserva** (el que ya funcionaba en Cambio de aceite) sobre
   todos los posts de dueño.
3. **Priorizar por tráfico real**, cruzando Search Console con la intención de cada post — no
   por corazonada. No tiene sentido ponerle CTA a un post que nadie ve.
4. **Año en títulos y contenido:**
   - En títulos, el año en curso da frescura (ya aplicado a las 12 páginas top en el trabajo
     previo del 7-sep).
   - El **año-modelo** se escribe según la unidad que hay en piso (en autos, el modelo del año
     siguiente se comercializa desde octubre; poner 2027 no es mentir si esa es la unidad).
   - **No se hace un reemplazo mecánico** de "2025→2026": los precios cambian con el año y un
     precio viejo con fecha nueva es peor que la fecha vieja.
5. **Los precios los actualiza el equipo de CH**, no nosotros.
6. **Las fichas de modelo (CPT de vehículos, ~97 URLs) NO se tocan** — no son post ni blog;
   las administra directamente CH. Nuestro trabajo se limita a posts/blog.
7. **Schema:** en los posts (Gutenberg) se inyecta por API; en la página de reserva
   (Elementor) se instala a mano.

---

## 4. Trabajo ejecutado y verificado

### 4.1 Reescritura de títulos y meta descripciones (trabajo previo del 7-sep, consolidado)
- **11 de 12 páginas** de mayor tráfico con título y meta nuevos, aplicados por API y
  verificados en el HTML en vivo. Suman ~290.000 impresiones.
- Regla: título ≤ 60 caracteres, la palabra que la gente busca al inicio, año en curso donde
  aporta.
- Pendiente **manual**: la página #6, Renault Duster en `/reanult/` (dirección con error de
  tipeo). Es página, no entrada, y Yoast no expone sus campos por API.

### 4.2 Bloque de reserva de taller en todos los posts de dueño
- Bloque estandarizado: botón **"Reservar cita de taller"** → `/solicitar-cita-taller-mecanico/`
  + botón **"Agendar por WhatsApp"** (con mensaje pre-armado: modelo/año/km) + mención de las
  **3 sedes** (Ibarra, Cayambe, Tulcán).
- Aplicado a los **47 posts de dueño** (30 nuevos esta ronda + 17 que ya lo tenían). Cero
  errores. Verificado en vivo.
- Impacto: el **100 % de las 267k impresiones** de contenido de dueño ahora rutea a reservar.

### 4.3 Enlazado interno
- Bloque **"Contenido relacionado"** en los 47 posts, apuntando a las 3 páginas pilar del
  taller (Tabla de mantenimiento, Cambio de aceite, Costos de mantenimiento), saltando el
  autoenlace. Consolida autoridad interna hacia las páginas que convierten. 47/47, verificado.

### 4.4 Datos estructurados (Schema AutoRepair)
- JSON-LD `AutoRepair` con identificador compartido (`#taller`) en **24 posts de servicio** +
  en la **página de reserva** (instalada a mano en Elementor).
- Declara a Google que todo ese contenido describe **un solo taller**, con dirección real
  (Ibarra), teléfono, zona de servicio (Ibarra/Cayambe/Tulcán), catálogo de 4 servicios y la
  acción de reservar. Ayuda a competir por búsquedas locales tipo "taller mecánico Ibarra".
- Validado parseable en vivo en posts y en la página de reserva.

### 4.5 Respaldo
- Contenido previo de cada post modificado guardado en `comercial-hidrobo/backup/contenido/`.

---

## 5. Resultado y línea base para medir

El embudo quedó completo de punta a punta: **los 47 posts empujan a reservar → se enlazan a
los pilares → los pilares y la página de reserva declaran el taller a Google como una sola
entidad.**

**Línea base al 16-sep-2026 (para medir la mejora):**
- Sesiones que llegan a la página de reserva: **1,7 %** (312 de 18.808 en 90 días).
- Reservas de taller confirmadas: **25** en 90 días.

**Próxima medición: a 30-60 días.** El KPI a mostrar al cliente es la subida de esos dos
números.

---

## 6. Pendientes

- **Título de la página #6** (Renault Duster `/reanult/`): aplicar a mano en wp-admin. Sigue
  abierta la decisión de consolidarla con la otra ficha de Duster antes de invertir en esa
  dirección mal escrita.
- **Horario de atención en el schema:** falta el dato real del taller para incluirlo (se dejó
  fuera para no inventar horas).
- **Medición a 30-60 días** contra la línea base.

---

## 7. Nota de alcance

Las fichas de modelo (CPT de vehículos) y los precios los maneja directamente el equipo de
Comercial Hidrobo. Nuestro trabajo de este mes se concentró en el contenido de blog/posts y
en el embudo hacia el taller.
