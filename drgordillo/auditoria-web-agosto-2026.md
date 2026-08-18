# Auditoría web y SEO — drrenegordillo.com

Fecha: 18 de agosto de 2026 · Sitio: https://www.drrenegordillo.com/
Plataforma detectada: **Wix** (servidor Pepyaka, 410 referencias a Wix en el código)

---

## 1. Lo primero: las visitas mensuales

**No es posible saber las visitas reales de un sitio ajeno desde fuera.** Nadie puede:
ni yo, ni ninguna herramienta, con exactitud. Lo que se publica en herramientas tipo
SimilarWeb son estimaciones estadísticas que, en sitios locales y pequeños como este,
suelen fallar por mucho o directamente no tener datos.

**La buena noticia**: el sitio **ya tiene Google Analytics y Google Tag Manager
instalados** (los detecté en el código). Los datos existen; solo hay que acceder.

Para tener la cifra real hay que pedirle al doctor:

1. **Acceso a Google Analytics 4** (invitación al correo, permiso de lectura). Ahí está:
   usuarios al mes, de dónde vienen, qué páginas ven, cuántos contactan.
2. **Acceso a Google Search Console** — más importante todavía para SEO: muestra por
   qué búsquedas aparece, en qué posición, cuántos clics recibe y qué errores ve Google.
   Si no está dado de alta (muy posible), se configura en 10 minutos y empieza a
   recoger datos desde ese día.

Sin esos dos accesos, cualquier cifra de tráfico que alguien te dé es inventada.

---

## 2. Resumen ejecutivo

| Área | Estado | Gravedad |
|---|---|---|
| Errores visuales (logo roto, textos superpuestos) | ❌ | **Crítico** |
| Velocidad de carga (9,1 s) | ❌ | **Crítico** |
| SEO técnico en páginas internas (sin H1 ni descripciones) | ❌ | **Alto** |
| Contenido (174 palabras en portada, blog parado desde 2020) | ❌ | **Alto** |
| Captación de pacientes (sin formulario de cita) | ❌ | **Alto** |
| Páginas duplicadas y basura indexadas (11) | ⚠️ | Medio |
| Base SEO de la portada (título, descripción, datos estructurados) | ✅ | Correcto |
| Está indexado y aparece en Google | ✅ | Correcto |

---

## 3. Errores de visualización (confirmados)

Verificado en Chrome sobre el sitio en vivo:

1. **El logo principal no carga.** Es una imagen rota de 368×220 px en la esquina
   superior izquierda: se ve el recuadro vacío con el icono de imagen partida. Es lo
   primero que ve un paciente al entrar.
   `86cff3_a8b328151cfb44129aaddb777d6df6ee~mv2.jpg` (con recorte aplicado)
2. **Textos superpuestos en la portada.** El bloque "Dr. René Gordillo" se solapa con
   el titular "Tu cambio YA!!!" (3.148 px² de superposición medidos). Se lee mal.
3. **Un "2026" suelto** flotando en la cabecera, sin contexto ni función.
4. **Cabecera desequilibrada**: un gran vacío arriba, el logo de la clínica descolgado
   a la derecha y el menú pegado abajo.

La causa de fondo es que es una plantilla Wix antigua con elementos posicionados a
mano, que se han ido descolocando con los cambios y las actualizaciones de la
plataforma.

---

## 4. Velocidad (medida en el navegador)

| Métrica | Valor | Referencia deseable |
|---|---|---|
| Carga completa | **9,1 segundos** | menos de 3 s |
| Peticiones de red | **185** | menos de 60 |
| Scripts cargados | **93** | menos de 20 |
| Peso del HTML | **691 KB** solo el HTML | menos de 100 KB |

Casi todo ese peso es de la propia plataforma Wix, no del contenido del doctor. En
móvil, con datos móviles, esto significa que **una parte de los pacientes se va antes
de que cargue**. Google lo penaliza además en el posicionamiento.

---

## 5. SEO — lo que está bien

- **Título de la portada correcto**: "Dr. René Gordillo | Cirujano en Ibarra |
  Tratamientos Obesidad" (62 caracteres, con la ciudad y el servicio).
- **Meta descripción** presente y descriptiva.
- **Un solo H1** en la portada, con ciudad incluida: "Recupera tu salud y tu peso ideal
  en Ibarra".
- **Datos estructurados** (JSON-LD) de tipo LocalBusiness y WebSite.
- **robots.txt y sitemaps correctos**; el sitio está indexado y aparece en Google al
  buscar "cirujano bariátrico Ibarra".
- Etiqueta canonical y viewport móvil presentes.

## 6. SEO — lo que falla (y cuánto duele)

### a) Las páginas de servicios están "en blanco" para Google

Son las páginas que deberían atraer pacientes, y les falta lo básico:

| Página | Título | Meta descripción | H1 |
|---|---|---|---|
| `/obesidad` | "Obesidad \| Drrenegordillo" (genérico) | ❌ no tiene | ❌ **no tiene** |
| `/cirugia-de-tiroides` | "Cirugía de Tiroides Convencional \| Drrenegordillo" | ❌ no tiene | ❌ **no tiene** |
| `/preguntasfrecuentes` | correcto | ⚠️ copiada de la portada | ❌ **no tiene** |
| `/about` | correcto | ⚠️ copiada de la portada | ❌ **9 H1 distintos** |

Sin H1 y sin descripción propia, Google no entiende de qué trata cada página y se
inventa el fragmento que muestra en los resultados. La marca aparece además como
**"Drrenegordillo"**, todo junto y sin espacios.

### b) Contenido insuficiente

La portada tiene **174 palabras visibles**. Para competir por búsquedas como "cirugía
bariátrica Ibarra" o "manga gástrica Imbabura" hacen falta páginas con contenido real
(600-1.200 palabras por servicio): en qué consiste, para quién, riesgos, recuperación,
preguntas frecuentes y casos.

### c) El blog está abandonado desde 2020

Últimas 7 entradas: **la más reciente es de octubre de 2020** (casi 6 años). Varias
hablan de la pandemia. Para Google —y para un paciente que las lea— el sitio parece
desatendido.

### d) 11 páginas duplicadas o de campañas viejas, todas indexables

`/copia-de-manga-gástrica` · `/copia-de-lp-hemorroides` · `/copia-de-certificacion` ·
`/landing-page-bariatrica` · `/landing-page-bariatrica-2` · `/lp-febrero-2019` ·
`/lp-enero-hernia-vesicula-apendiciti` · `/lp-julio-baja-de-peso` ·
`/lp-beneficios-by-pass-gastrico` · `/lp-beneficios-manga-gastrica` · `/lp-hemorroides`

Comprobado: **responden 200 y no llevan etiqueta noindex**, así que Google puede
indexarlas. Son contenido duplicado que compite contra las páginas buenas y
transmiten dejadez si un paciente cae en una campaña de 2019.

### e) Datos estructurados incompletos para un médico

Está declarado como `LocalBusiness` genérico. Para un cirujano corresponde
**`Physician`** o `MedicalBusiness`, incluyendo especialidad médica, dirección
completa, teléfono, horarios y zona de servicio. Es lo que alimenta la ficha
enriquecida en Google.

---

## 7. Captación de pacientes (esto es lo que cuesta dinero)

- **No hay ningún formulario en la portada.** Cero. El único canal es un icono de
  WhatsApp en la cabecera.
- **El teléfono no aparece** en el texto de la portada.
- No hay llamada a la acción clara ("Agenda tu valoración"), ni indicación de dirección
  del consultorio, ni horarios visibles arriba.

Un sitio médico sin formulario de cita y sin teléfono visible desperdicia la mayoría
de las visitas que ya está recibiendo. **Esta es probablemente la mejora con mayor
retorno inmediato**, incluso antes que el SEO.

---

## 8. Competencia

Al buscar "cirujano bariátrico Ibarra Ecuador cirugía obesidad", el sitio **sí aparece**,
pero por delante y alrededor están: Obesity Hospital, Bariamet, Clínica Napoleón
Salgado, Dr. Alberto Gordillo, Dr. Darwin Ramos y varios directorios médicos
(doctoraisy, nutry.org, guiamedica). En Ibarra compite directamente con el **Dr. Max
Torres**, que aparece en directorios bien posicionados.

Ninguno de ellos es imbatible: son sitios de nivel medio. Con contenido serio por
servicio y una web rápida, hay margen real para ganar posiciones.

---

## 9. Plan de mejoras, por prioridad

### Urgente (esta semana, sobre el sitio actual)
1. **Arreglar el logo roto** y la superposición de textos de la portada.
2. **Quitar el "2026"** suelto de la cabecera.
3. **Poner noindex o eliminar** las 11 páginas copia/campañas viejas.
4. **Añadir teléfono visible y botón "Agenda tu cita"** en la cabecera.
5. **Dar de alta Search Console** y darte acceso a Analytics.

### Corto plazo (1-2 meses)
6. **H1 y meta descripción propios** en cada página de servicio.
7. **Reescribir las páginas de servicios** con 600-1.200 palabras útiles.
8. **Formulario de solicitud de cita** con los datos que el consultorio necesita.
9. **Datos estructurados de tipo Physician** con dirección, teléfono y horarios.
10. **Ficha de Google Business Profile** optimizada (es lo que más tráfico local da a
    un médico) y pedir reseñas a pacientes.

### Decisión de fondo: ¿arreglar Wix o rehacer el sitio?
El sitio arrastra una plantilla antigua, 9 segundos de carga y 93 scripts que **no se
pueden quitar en Wix**, porque son de la plataforma. Se puede maquillar, pero la
velocidad y la estructura seguirán limitadas.

**Mi recomendación**: rehacerlo en WordPress con un diseño propio y ligero, migrando
el contenido bueno y manteniendo las URLs que ya posicionan (con redirecciones 301
para las que cambien). Se gana velocidad, control total del SEO, blog usable y
posibilidad de crecer con landing pages de campaña bien hechas.

Mientras se decide, las cinco correcciones urgentes se pueden aplicar igualmente sobre
el Wix actual.
