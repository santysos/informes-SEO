# Comercial Hidrobo — plan de contenido, agosto 2026

Análisis hecho el 2026-08-19 sobre los **196 posts publicados**, descargados por la API
pública de `comercialhidrobo.com` (no hace falta credencial para leer).

---

## 1. Estado del blog

| | |
|---|---|
| Posts publicados | 196 |
| Publicados por nosotros (may–ago 2026) | 36 |
| Última publicación | **4 de agosto de 2026** |
| Ritmo de agosto | **2 posts** — cayó respecto a mayo (16), junio (9) y julio (9) |

El blog está vivo y el equipo de CH sí publica lo que entregamos. El problema es de ritmo:
agosto va en 2 posts contra un compromiso de 20 mensuales.

---

## 2. Dónde está saturado y dónde está el hueco

Conteo de menciones en los 196 títulos:

| Tema | Posts | Lectura |
|---|---|---|
| Marcas japonesas/europeas | 41 | bien cubierto |
| Compra y financiamiento | 40 | bien cubierto |
| Electrificados (híbrido/eléctrico/PHEV/REEV) | 30 | **saturado** — junio a agosto fue casi solo esto |
| Marcas chinas | 27 | bien cubierto, pero concentrado en Chery y DongFeng |
| Mantenimiento | 27 | bien cubierto |
| Local / geográfico | 20 | correcto |
| SUV | 16 | correcto |
| Camionetas | 15 | correcto |
| Seguridad | 13 | mejorable |
| **Trámites** | **5** | 🔴 **el hueco más grande** |
| **Seminuevos** | **5** | 🟡 lo cubre OKCars, pero CH también vende |

### Marcas sin un solo post

`Omoda` · `Geely` · `BYD` · `Jetour` — cero menciones en 196 títulos.

El informe de mayo ya había detectado a **Omoda y Geely como marcas emergentes** en las
consultas de búsqueda del sitio. Siguen sin contenido.

### El detalle de trámites

De los 5 posts que rozan el tema, solo **uno** es de trámite puro:
*Matriculación vehicular en Imbabura 2026*. El resto son de seguros y de pico y placa.

Quedan sin cubrir, todos con volumen de búsqueda alto en Ecuador:
traspaso de dominio · revisión técnica vehicular · cómo sacar placas por primera vez ·
impuestos anuales del vehículo · consulta y pago de multas · licencia de conducir ·
qué hacer si el auto tiene prenda · duplicado de matrícula.

---

## 3. Propuesta: 20 posts

Reparto pensado para atacar los huecos sin repetir nada de lo publicado.

### Bloque A · Trámites vehiculares (8 posts) — la mayor oportunidad

1. Traspaso de dominio de un vehículo en Ecuador: pasos, costos y errores que lo demoran
2. Revisión técnica vehicular en Imbabura: qué revisan, cuánto cuesta y por qué reprueban
3. Cómo sacar las placas de un auto nuevo en Ecuador y cuánto tarda
4. Impuestos del vehículo en Ecuador: cuáles se pagan cada año y cómo se calculan
5. Cómo consultar y pagar las multas de tránsito en Ecuador
6. Comprar un auto con prenda: qué significa y cómo se levanta
7. Duplicado de matrícula: qué hacer si la perdió
8. Papeles que debe pedir antes de comprar un auto usado en Ecuador

### Bloque B · Marcas sin contenido (5 posts)

9. Omoda en Ecuador: qué modelos hay y a quién le convienen
10. Geely en Ecuador 2026: la marca, los modelos y qué respaldo tienen
11. BYD en Ecuador: qué llegó, qué cuesta y cómo se compara con Chery y DongFeng
12. Jetour: la marca china de SUV que está creciendo en el norte del país
13. Omoda o Chery: son de la misma casa, ¿en qué se diferencian?

### Bloque C · Renault y Nissan con enfoque local (4 posts)

*(Son las marcas fuertes del concesionario y las que más venden, pero el contenido
reciente se fue todo a electrificados.)*

14. Renault Duster 2026 en Ecuador: precio, versiones y para quién es
15. Nissan Kicks: por qué sigue siendo el SUV más vendido del norte
16. Renault o Nissan: cuál conviene según cómo maneja usted
17. Repuestos Renault y Nissan en Ibarra: disponibilidad, precios y tiempos

### Bloque D · Local y conversión (3 posts)

18. Comprar un auto en Ibarra sin vivir en Imbabura: cómo funciona el proceso
19. Cuánto cuesta mantener un auto al año en el norte del Ecuador
20. Test drive: qué probar de verdad en los 20 minutos que dura

---

## 4. Qué hace falta para ejecutar

| | Estado |
|---|---|
| Saber qué está publicado, para no repetir | ✅ resuelto por API pública |
| Escribir los 20 posts | ✅ podemos empezar ya |
| **Publicarlos por API** | 🔴 **falta Application Password** |
| Priorizar por datos reales de búsqueda | 🟡 opcional, con los CSV de Search Console |

### Para el Application Password

En `comercialhidrobo.com/wp-admin` → **Usuarios** → perfil del administrador →
**Contraseñas de aplicación** → nombre «Creative Web API» → generar. Se guarda en `.env`
como `CH_WP_USER` y `CH_WP_APP_PASS`.

Sin eso, la alternativa es entregar los 20 posts en un documento y que CH los publique a
mano — que es lo que se hizo hasta ahora y lo que explica que agosto vaya en 2.

---

## 5. Nota sobre el ritmo

El compromiso es de 20 posts mensuales. Con 36 entregados entre mayo y agosto, el ritmo
real va muy por debajo. Conviene revisar con el cliente si el cuello de botella es la
publicación manual — si es así, el Application Password lo resuelve de raíz y permite
programar los 20 del mes de una sola vez, escalonados.
