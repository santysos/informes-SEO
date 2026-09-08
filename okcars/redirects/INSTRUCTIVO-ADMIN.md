# Qué hacer cuando se vende un vehículo — okcars.ec

Para el equipo que administra el sitio. Actualizado el 8 de septiembre de 2026.

---

## La respuesta corta

**Sigan haciendo exactamente lo mismo que hacían: pasar la ficha a borrador.**

Ya no hay que hacer nada más. El sitio ahora se encarga solo de que esa dirección no
quede rota.

---

## Qué pasaba antes y por qué se arregló

Cuando se vendía un vehículo y la ficha pasaba a borrador, esa dirección quedaba dando
**error 404**. El problema es que Google sigue mostrando esas páginas en los resultados
durante meses: la gente hacía clic desde el buscador y llegaba a una página de error.

Medido en Search Console, **el 87 % de las visitas que Google mandaba a fichas de
vehículo caían en un error**. El caso más grave fue el Changan Deepal S05: 865 apariciones
en Google y 17 personas que hicieron clic para encontrarse con una página rota.

---

## Qué hace el sitio ahora, solo

Al pasar una ficha a borrador, cualquiera que entre a esa dirección —desde Google, desde
un enlace guardado o desde una publicación en redes— **aterriza automáticamente en el
listado de vehículos disponibles**.

No se pierde la visita: la persona que buscaba un auto ve los que sí están en stock.

---

## Cuándo sí conviene avisarnos

Hay un caso en que se puede hacer algo mejor que mandar al listado: cuando el vehículo
vendido tenía **mucho tráfico desde Google** o cuando hay **una unidad muy parecida en
stock**.

Ejemplos de lo que ya está configurado así:

| Se vendió | A dónde va ahora |
|---|---|
| AION UT (eléctrico) | A la ficha del BYD Tang, que sí está disponible |
| Toyota Prius C 2013 | A la ficha del Prius C que está en stock |
| Chevrolet Captiva | A la ficha de la Captiva que está en stock |
| Mazda BT-50 | A la guía de camionetas diésel |
| Changan Deepal S05 | A la guía de autos chinos |

Si venden un vehículo que se movía mucho, escríbannos y lo apuntamos a la unidad
equivalente. No es urgente: mientras tanto ya está yendo al listado.

---

## Lo que NO hay que hacer

- **No borren la ficha definitivamente.** Pasarla a borrador está bien; borrarla del todo
  hace perder información que sirve.
- **No cambien el enlace permanente (slug) de un vehículo** que ya lleva tiempo publicado.
  Si Google lo tiene indexado con una dirección y se cambia, se pierde el posicionamiento.
- **No desactiven el plugin Redirection.** Es el que sostiene todo lo anterior.

---

## Si alguien quiere ver o cambiar las redirecciones

Están en **wp-admin → Herramientas → Redirection**.

Hay 13 reglas:

- Las 12 primeras son fichas concretas que ya se vendieron, cada una con su destino.
- La número 13 es la regla general: manda al listado cualquier ficha de vehículo que no
  exista. Es la que hace que no haya que configurar nada cuando se vende una unidad nueva.

**La regla 13 no debe borrarse.** Si se borra, volvemos al problema del 404.

---

## Detalle técnico, por si alguien pregunta

Las 12 redirecciones específicas usan código **301** (permanente), porque esos vehículos
no vuelven y así Google traspasa el valor de la página vieja a la nueva.

La regla general usa **302** (temporal) a propósito. Si alguien despublica una ficha por
error y después la vuelve a publicar, un 301 habría quedado guardado en el navegador de
quien la visitó y esa persona seguiría siendo redirigida aunque la ficha ya esté de vuelta.
Con 302 eso no pasa.

La regla general solo actúa sobre direcciones que empiezan con `/vehiculos-okcars/` **y**
que devuelven error. Un vehículo publicado nunca se ve afectado, y una página de error en
otra parte del sitio sigue comportándose como antes.

---

## Lo que todavía se puede mejorar

Redirigir recupera buena parte del tráfico, pero no todo: con el tiempo Google deja de
mostrar una dirección que siempre redirige.

Lo ideal sería que la ficha **siga publicada con un sello de «Vendido»**, mostrando el
vehículo, un aviso de que ya no está disponible y un bloque con las unidades parecidas que
sí lo están. Así la página conserva su posición en Google y convierte la visita en lugar de
desviarla.

Eso requiere tres cambios en el sitio y está detallado en el `README.md` de esta carpeta.
Es la segunda etapa, cuando se decida hacerla.
