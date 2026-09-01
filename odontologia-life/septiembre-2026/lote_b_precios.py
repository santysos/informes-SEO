#!/usr/bin/env python3
"""Bloque B · intención de precio y primera consulta (posts 1 a 5).

POLÍTICA DE PRECIOS DE ESTE LOTE
--------------------------------
Solo se dan tres cifras, siempre con «desde»:
    limpieza dental      desde $25
    resina o calza       desde $30
    extracción simple    desde $35

De implantes, ortodoncia, brackets, alineadores, blanqueamiento, coronas,
carillas y prótesis NO se da ninguna cifra, ni rango, ni aproximación.
Para esos casos se explica de qué depende el valor y se remite a la
valoración sin costo.
"""
from gutenberg import CAT, link, wa, url, aviso_precio, guarda

POSTS = []

DISCLAIMER = ("Valor referencial. El precio final depende de tu caso y se define en la "
              "valoración con el especialista, que no tiene costo.")

# Los tres únicos valores autorizados para este lote.
D_LIMPIEZA = "$25"
D_RESINA = "$30"
D_EXTRACCION = "$35"

U_LIMPIEZA = url("limpieza-dental-otavalo-beneficios")
U_CALZA = url("calza-dental-resina-amalgama")
U_DENTISTA = url("dentista-otavalo-clinica-dental")
U_PERIO = url("enfermedad-periodontal-encias-inflamadas")
U_MANT_PERIO = url("mantenimiento-periodontal-encias-sanas")
U_ORTO_PRECIO = url("cuanto-cuesta-ortodoncia-brackets-ecuador")
U_ORTO_OTAVALO = url("ortodoncia-otavalo-brackets-o-alineadores")
U_ENDO = url("endodoncia-ecuador-guia-tratamiento-conducto")
U_ENDO_URGENTE = url("sintomas-que-indican-que-necesitas-una-endodoncia-urgente")
U_CORONA = url("corona-dental-cuando-materiales")
U_MUELAS = url("extraccion-de-muelas-del-juicio")
U_CIRUGIA = url("cirugia-oral-procedimientos-cuidados")
U_EMERGENCIAS = url("emergencias-dentales-dolor-muela-fractura")
U_PROTESIS = url("protesis-dental-ecuador-tipos-opciones")
U_IMPLANTES = url("implantes-dentales-ecuador")
U_CADA_CUANTO = url("cada-cuanto-ir-al-dentista-salud-bucal")
U_MIEDO = url("miedo-al-dentista-tecnicas-superar-ansiedad")
U_SENSIBILIDAD = url("sensibilidad-dental-causas-tratamiento")
U_GINGIVITIS = url("gingivitis-vs-periodontitis-tratamientos")
U_BRUXISMO = url("bruxismo-rechinar-dientes-ferula-descarga")


# ── 1 · La pieza central ─────────────────────────────────────────────
POSTS.append({
 "title": "Precios de tratamientos dentales en Otavalo: qué esperar",
 "slug": "precios-referenciales-tratamientos-dentales-otavalo",
 "date": "2026-09-13T09:00:00",
 "cat": CAT["tratamientos"],
 "tags": ["precios dentales", "presupuesto dental", "Otavalo", "valoración",
          "tratamientos dentales"],
 "focus_kw": "precios tratamientos dentales Otavalo",
 "yoast_title": "Precios de tratamientos dentales en Otavalo",
 "yoast_desc": "Tres valores de entrada que si son estables, y la explicacion honesta de por que el resto de tratamientos no puede tener un precio cerrado sin revisarte.",
 "excerpt": "Qué cuesta empezar, cuáles son los tres valores que sí se pueden dar por adelantado y por qué el resto se define recién en la valoración.",
 "bloques": [
   "Buscas cuánto cuesta arreglarte los dientes y encuentras listas que no coinciden entre sí. Una página muestra un número, otra muestra la mitad, y ninguna explica de dónde sale ni qué incluye.",
   "Esta página no tiene una tarifa completa, y vale explicar por qué. Hay tres valores de entrada que sí son estables y están abajo. El resto depende de cosas que no se ven en una pantalla.",

   {"h2": "Los tres valores que sí te podemos dar por adelantado"},
   aviso_precio(),
   {"tabla": [["Procedimiento", "Desde", "Qué cubre ese valor de entrada"], [
     ["Limpieza dental", D_LIMPIEZA, "Remoción de placa y sarro en una sesión, en una boca sin inflamación importante"],
     ["Resina o calza", D_RESINA, "Reconstrucción de una cara del diente, con caries pequeña y sin dolor"],
     ["Extracción simple", D_EXTRACCION, "Pieza visible en boca, sin abrir encía ni retirar hueso"],
   ]]},
   f"Estos tres se pueden anticipar porque son procedimientos acotados: una sesión, un objetivo, poca variación entre un paciente y otro. Aun así el <strong>desde</strong> importa. Marca el escenario más sencillo, no el promedio. Si tienes sarro debajo de la encía, la {link(U_LIMPIEZA, 'limpieza dental')} deja de ser una sesión de rutina y pasa a ser un tratamiento periodontal, que es otra cosa.",
   {"h2": "Por qué el resto no aparece con cifra en esta página"},
   "De implantes, ortodoncia, brackets, alineadores, blanqueamiento, coronas, carillas y prótesis no vas a leer un número aquí. La razón no es comercial: es que un precio cerrado sin diagnóstico es una cifra inventada, y tarde o temprano alguien la paga.",
   f"Piensa en la ortodoncia. El valor depende de cuántos meses dura el tratamiento, del tipo de aparato, de si hace falta extraer alguna pieza para abrir espacio y de los retenedores que vienen después. Ninguno de esos cuatro datos se conoce antes de tomar radiografías. Lo desarrollamos en {link(U_ORTO_PRECIO, 'qué define el valor de una ortodoncia')}.",
   f"Con los implantes pasa igual: cambia según el hueso disponible, según si hace falta un injerto previo, según el material de la corona y según cuántas piezas se reponen. Puedes ver el panorama completo en {link(U_IMPLANTES, 'nuestra página de implantes dentales')}.",
   "Cuando alguien te da un número cerrado por teléfono, sin verte, ese número tiene dos destinos posibles. O sube en el camino, cuando aparece lo que nadie había mirado. O se mantiene, pero recortando el tratamiento hasta que quepa en la cifra prometida.",

   {"h2": "De qué depende el número final"},
   "Estos son los factores que mueven el presupuesto, en orden de peso real:",
   {"ul": [
     "<strong>Cuántas piezas están comprometidas.</strong> Una caries es un presupuesto; seis caries en distinto grado es un plan de varias sesiones.",
     "<strong>Qué tan avanzado está el problema.</strong> La misma muela puede necesitar una resina, o una endodoncia con corona encima. La diferencia entre esos dos escenarios son meses de espera.",
     f"<strong>El estado de las encías.</strong> Si hay {link(U_PERIO, 'enfermedad periodontal activa')}, se trata antes de cualquier otra cosa. Colocar coronas o carillas sobre encías inflamadas es trabajo que se pierde.",
     "<strong>El hueso disponible.</strong> Define si un implante es directo o requiere un procedimiento previo.",
     "<strong>El material.</strong> En coronas y carillas hay varias opciones con comportamientos distintos, y cada una tiene su valor.",
     "<strong>El tiempo.</strong> Los tratamientos de ortodoncia se cobran en función de los meses de control, no de una sola cita.",
   ]},

   {"h2": "Cómo se arma un presupuesto de verdad"},
   {"ol": [
     "<strong>Valoración clínica.</strong> El especialista revisa dientes, encías, mordida y articulación. No tiene costo y dura entre veinte y cuarenta minutos.",
     "<strong>Radiografía.</strong> Muestra lo que no se ve: caries entre dientes, nivel de hueso, raíces, piezas retenidas.",
     "<strong>Diagnóstico escrito.</strong> Qué tiene cada pieza y qué necesita. Sin esto, cualquier cifra es una adivinanza.",
     "<strong>Plan por fases, en orden clínico.</strong> Primero lo que duele o infecta, después lo que estabiliza, al final lo estético.",
     "<strong>Presupuesto por fase.</strong> Cada bloque con su valor, para que puedas decidir dónde empiezas y a qué ritmo sigues.",
     "<strong>Tu decisión.</strong> Nadie firma nada ese día. El presupuesto se lleva a casa y se piensa.",
   ]},
   "Ese orden explica por qué dos personas con la misma queja salen con presupuestos muy distintos. Una necesitaba tres cosas; la otra, once.",

   {"quote": "Nos pasa cada semana: alguien llama y pide el precio de una ortodoncia. Damos la única respuesta honesta, que es «ven y lo vemos». Suena a evasiva hasta que llega, ve la radiografía y entiende que su caso necesitaba dos meses de trabajo previo que por teléfono nadie podía adivinar.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cuándo un precio bajo termina saliendo caro"},
   "Hay tres situaciones que vemos repetirse, y todas empezaron con una cifra atractiva:",
   f"La primera: una resina colocada en un diente que ya necesitaba {link(U_ENDO, 'tratamiento de conducto')}. La caries alcanzó el nervio, la resina lo tapó, y el dolor apareció tres semanas después. Se pagó la resina y después la endodoncia.",
   "La segunda: una extracción sin plan de reposición. El hueco queda, los dientes vecinos se inclinan hacia el espacio vacío y el de arriba baja buscando contacto. Dos años más tarde, el problema de una pieza es un problema de cuatro.",
   "La tercera: ortodoncia terminada sin retenedores. Los dientes vuelven hacia su posición original en meses, y toda la inversión se diluye.",
   "El punto no es que lo barato sea malo. Es que un presupuesto se compara por lo que resuelve, no por el número de arriba.",

   {"h2": "Cuándo pedir un presupuesto todavía no te conviene"},
   "Hay tres momentos en los que conviene esperar antes de cotizar:",
   {"ul": [
     f"<strong>Cuando tienes dolor activo o inflamación.</strong> Ahí no toca presupuestar, toca resolver la urgencia. Mira {link(U_EMERGENCIAS, 'qué hacer ante una emergencia dental')} y ven el mismo día.",
     "<strong>Cuando buscas solo estética y hay caries o encías sin tratar.</strong> El presupuesto estético cambia por completo después de resolver lo funcional, así que cotizarlo antes es cotizar dos veces.",
     "<strong>Cuando vas a comparar únicamente por el número.</strong> Sin saber qué materiales, cuántas sesiones y qué controles incluye cada propuesta, la comparación no informa nada.",
   ]},

   {"h2": "Qué preguntar cuando te entreguen la cifra"},
   "Con estas cuatro preguntas cualquier presupuesto se vuelve legible:",
   {"ol": [
     "¿Cuántas sesiones son y en cuánto tiempo?",
     "¿Qué pasa si al abrir aparece algo más? ¿Se avisa antes de continuar?",
     "¿Los controles posteriores están incluidos o se cobran aparte?",
     "¿Qué parte de esto es urgente y qué parte puede esperar tres meses?",
   ]},
   f"Atendemos en Otavalo y recibimos pacientes que llegan desde Cotacachi, Ibarra y las comunidades cercanas, muchos con presupuestos de otro lado bajo el brazo. Revisarlos juntos es parte de la consulta. Si quieres conocer cómo trabajamos, está en {link(U_DENTISTA, 'nuestra página de clínica dental en Otavalo')}.",

   {"faq": [
     ("¿La valoración realmente no tiene costo?",
      "Sí. Incluye revisión clínica y el plan de tratamiento por escrito. Si el caso necesita radiografía, se te informa antes de tomarla."),
     ("¿Por qué no publican una lista de precios completa?",
      "Porque para la mayoría de tratamientos esa lista sería falsa. Los tres valores de entrada que sí son estables están arriba en este artículo."),
     ("¿Puedo hacerme solo una parte del tratamiento?",
      "Sí, y es lo más común. El plan se divide en fases con un orden clínico, y tú decides dónde empiezas y a qué ritmo avanzas."),
     ("¿El precio de la limpieza cambia si tengo mucho sarro?",
      f"Sí. Cuando el sarro está debajo de la encía se trata de un procedimiento periodontal, no de una limpieza de rutina. La diferencia la explicamos en {link(U_MANT_PERIO, 'mantenimiento periodontal')}."),
   ]},
   f'¿Quieres saber cuánto costaría tu caso? <a href="{wa("Hola, quiero agendar una valoración para saber el presupuesto de mi tratamiento")}">Escríbenos por WhatsApp</a> y agendamos la valoración, que no tiene costo. Sales con el diagnóstico y el presupuesto por escrito, sin compromiso.',
 ]})


# ── 2 · Resina / calza ───────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto cuesta una resina o calza dental y de qué depende",
 "slug": "cuanto-cuesta-una-resina-o-calza-dental",
 "date": "2026-09-15T09:00:00",
 "cat": CAT["tratamientos"],
 "tags": ["resina dental", "calza dental", "caries", "precio resina"],
 "focus_kw": "cuánto cuesta una resina dental",
 "yoast_title": "Cuánto cuesta una resina o calza dental",
 "yoast_desc": "Una resina arranca desde 30 dolares y sube segun cuantas caras del diente haya que reconstruir. Cuando alcanza, cuando ya no alcanza y cuanto te dura.",
 "excerpt": "Desde $30 y sube según cuántas caras del diente haya que rehacer. Dónde está el límite entre una resina y una corona.",
 "bloques": [
   "Te encontraron una caries y lo primero que quieres saber es cuánto vas a pagar. Es una pregunta razonable y tiene una respuesta razonable, siempre que se entienda de qué depende.",
   "Una resina no es un producto de tamaño único. El mismo material puede tapar un puntito o reconstruir media muela, y entre esos dos trabajos hay una diferencia real de tiempo, dificultad y precio.",

   {"h2": "El valor de entrada y qué cubre"},
   aviso_precio(),
   f"<strong>Resina o calza dental: desde {D_RESINA}</strong>. {DISCLAIMER}",
   "Ese valor corresponde al caso más simple: una caries pequeña, en una sola cara del diente, sin dolor y sin compromiso del nervio. Se resuelve en una cita de treinta minutos y sales masticando normal el mismo día.",
   "A partir de ahí el número sube, y la variable principal no es el material. Es cuánto diente hay que reconstruir.",

   {"h2": "Las caras del diente: por qué cambian el precio"},
   "Cada diente tiene varias superficies, y una caries puede tomar una o varias. Reconstruir una cara plana es una cosa; rehacer una pared completa con su punto de contacto contra el diente vecino es otra muy distinta.",
   {"tabla": [["Extensión", "Qué implica", "Tiempo en el sillón"], [
     ["Una cara", "Se limpia la caries y se rellena. Trabajo directo.", "20 a 30 minutos"],
     ["Dos caras", "Hay que reconstruir el contacto con el diente de al lado", "40 a 50 minutos"],
     ["Tres o más caras", "Se rehace la anatomía de la muela casi entera", "60 minutos o más"],
     ["Diente anterior visible", "Exige capas de distinto color para igualar el diente natural", "45 a 70 minutos"],
   ]]},
   "El último renglón sorprende a mucha gente. Una resina en un diente de adelante puede tomar más tiempo que una en una muela, aunque la caries sea más chica, porque ahí el trabajo es de color y forma antes que de relleno.",

   {"h2": "Resina o amalgama: qué cambia en la práctica"},
   f"La amalgama, ese material metálico gris, todavía se usa en algunos casos por su resistencia. La resina se ve como diente y se adhiere a la estructura, lo que permite eliminar menos tejido sano al preparar la cavidad. Las diferencias completas están en {link(U_CALZA, 'resina o amalgama, cuál conviene')}.",
   "En la práctica, en muelas con carga fuerte de masticación la resina moderna aguanta bien siempre que la cavidad no sea enorme. Cuando ya lo es, el problema no se resuelve cambiando de material.",

   {"quote": "La pregunta que más recibimos es «¿me alcanza con una resina?». La respuesta está en cuánta pared le queda al diente. Si conserva sus cuatro paredes, la resina trabaja tranquila. Si perdió dos, la resina va a fallar en un año y conviene decirlo desde el principio.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cuándo la resina ya no alcanza"},
   "Hay tres señales que indican que el caso pasó de resina a corona:",
   {"ul": [
     "<strong>El diente perdió más de la mitad de su estructura.</strong> Una resina grande sin paredes que la sostengan se fractura, y arrastra parte del diente al romperse.",
     f"<strong>Hubo endodoncia previa.</strong> Un diente sin nervio se vuelve más frágil y casi siempre necesita {link(U_CORONA, 'una corona que lo abrace')} para no partirse.",
     "<strong>Hay una fisura visible.</strong> Rellenar sobre una fisura no la detiene; la corona sí distribuye la fuerza.",
   ]},
   f"Y hay un cuarto escenario: la caries llegó al nervio. Ahí ninguna resina sirve, porque el problema ya no es el hueco sino la infección de adentro. Las señales están en {link(U_ENDO_URGENTE, 'los síntomas que indican una endodoncia urgente')}.",

   {"h2": "Cómo es la cita, paso a paso"},
   {"ol": [
     "<strong>Anestesia local</strong>, si la caries es profunda. En las superficiales muchas veces no hace falta.",
     "<strong>Se retira el tejido cariado</strong> hasta llegar a diente sano. Este paso define el tamaño real del trabajo, y a veces la cavidad resulta mayor de lo que se veía.",
     "<strong>Se aísla el diente</strong> para que no llegue saliva. Sin esto la resina no se adhiere bien y dura la mitad.",
     "<strong>Se coloca el material en capas</strong>, endureciendo cada una con luz.",
     "<strong>Se ajusta la mordida</strong>. Si queda alta, vas a sentir molestia al masticar; se corrige ahí mismo.",
     "<strong>Pulido final</strong>, que evita que se pigmente en los bordes.",
   ]},
   "El tercer paso es el que más se salta cuando alguien trabaja apurado, y es el que más determina cuánto te va a durar.",

   {"h2": "Cuánto dura una resina y qué la rompe antes"},
   "Con buena higiene y una mordida equilibrada, una resina bien hecha aguanta entre cinco y diez años. Lo que la acorta:",
   {"ul": [
     f"<strong>Bruxismo.</strong> Apretar los dientes de noche fractura resinas grandes. Se resuelve con {link(U_BRUXISMO, 'una férula de descarga')}.",
     "<strong>Caries recurrente en el borde.</strong> Aparece cuando la higiene entre dientes falla, justo en el punto de unión.",
     "<strong>Morder cosas duras.</strong> Hielo, huesos de pollo, abrir fundas con los dientes.",
   ]},
   f"Si sientes molestia al frío durante unos días después de la calza, suele ser normal y cede. Si dura más de dos semanas o aparece dolor espontáneo, vuelve. Sobre esa sensación escribimos en {link(U_SENSIBILIDAD, 'sensibilidad dental')}.",

   {"h2": "Cuándo hacerte la resina ahora NO te conviene"},
   "Postergar rara vez es buena idea, pero hay excepciones honestas:",
   {"ul": [
     "<strong>Si tienes las encías inflamadas y sangrantes.</strong> Conviene estabilizarlas primero; trabajar sobre una encía que sangra complica el aislamiento y compromete el resultado.",
     "<strong>Si el diente ya tiene dolor espontáneo, de esos que despiertan de noche.</strong> Ese diente necesita otro tratamiento, y la resina sería dinero perdido.",
     "<strong>Si vas a entrar a ortodoncia en las próximas semanas.</strong> Algunas reconstrucciones conviene hacerlas después de mover las piezas, para que el ajuste sea el definitivo.",
   ]},
   f"Fuera de esos tres casos, esperar solo agranda la cavidad. Atendemos en Otavalo y vemos llegar pacientes de Cotacachi y Peguche con caries que hace un año eran una resina de una cara y ahora son otra conversación. Si hace tiempo que no te revisan, mira {link(U_CADA_CUANTO, 'cada cuánto conviene ir al dentista')}.",

   {"faq": [
     ("¿Duele hacerse una resina?",
      "En caries superficiales normalmente no se necesita ni anestesia. En las profundas se aplica anestesia local y no sientes el procedimiento."),
     ("¿Puedo comer después?",
      "Sí, la resina endurece con la luz en el momento. Conviene esperar a que pase la anestesia para no morderte el labio."),
     ("¿Se puede cambiar una amalgama vieja por resina?",
      "Se puede, y a veces conviene cuando la amalgama está filtrada o el diente se fisuró alrededor. Cambiarla solo por estética es una decisión tuya, no una necesidad clínica."),
     ("¿Cuántas resinas se pueden hacer en una sola cita?",
      "Depende de la ubicación. Varias piezas del mismo lado se resuelven en una sesión; repartidas por toda la boca es mejor dividirlas para no tenerte con anestesia dos horas."),
   ]},
   f'¿Tienes una caries y quieres saber en qué escenario cae tu caso? <a href="{wa("Hola, tengo una caries y quiero saber cuánto costaría la resina")}">Escríbenos por WhatsApp</a> y agendamos la valoración, que no tiene costo.',
 ]})


# ── 3 · Extracción simple ────────────────────────────────────────────
POSTS.append({
 "title": "Extracción dental simple: cuándo se necesita y cómo es",
 "slug": "extraccion-dental-simple-cuando-se-necesita",
 "date": "2026-09-17T09:00:00",
 "cat": CAT["cirugia"],
 "tags": ["extracción dental", "extracción simple", "cirugía oral", "postoperatorio"],
 "focus_kw": "extracción dental simple",
 "yoast_title": "Extracción dental simple: cuándo se necesita",
 "yoast_desc": "Desde 35 dolares. En que se diferencia de una extraccion quirurgica, cuando un diente ya no se puede salvar y como cuidar el hueco las primeras 48 horas.",
 "excerpt": "Desde $35. Qué distingue una extracción simple de una quirúrgica, cuándo el diente ya no se salva y qué hacer después.",
 "bloques": [
   "Que te digan que hay que sacar un diente nunca cae bien. La reacción normal es preguntar si no hay otra salida, y en muchos casos sí la hay, pero no siempre.",
   "Cuando la extracción es la vía, conviene saber de qué tipo hablamos. No es lo mismo retirar una pieza que asoma completa en boca que abrir encía para sacar una raíz partida bajo el hueso.",

   {"h2": "Qué es exactamente una extracción simple"},
   aviso_precio(),
   f"<strong>Extracción dental simple: desde {D_EXTRACCION}</strong>. {DISCLAIMER}",
   "Se llama simple cuando el diente está visible en boca, tiene corona suficiente para sujetarlo y sale con movimientos controlados, sin necesidad de cortar encía ni retirar hueso. Se hace con anestesia local y toma entre quince y treinta minutos.",
   "No es sinónimo de fácil, aunque el nombre lo sugiera. Una raíz curva o un hueso muy denso pueden complicar una extracción que en la radiografía parecía directa.",

   {"h2": "La diferencia con una extracción quirúrgica"},
   {"tabla": [["", "Simple", "Quirúrgica"], [
     ["El diente", "Visible y accesible en boca", "Retenido, fracturado a nivel de encía o dentro del hueso"],
     ["Encía", "No se abre", "Se levanta un colgajo"],
     ["Hueso", "No se toca", "A veces se retira una porción"],
     ["Puntos", "Habitualmente no", "Casi siempre"],
     ["Duración", "15 a 30 minutos", "30 a 60 minutos o más"],
     ["Recuperación", "2 a 3 días", "5 a 7 días con más inflamación"],
   ]]},
   f"La mayoría de las muelas del juicio caen del lado quirúrgico, sobre todo las que están inclinadas o cubiertas por encía. Ese escenario lo tratamos aparte en {link(U_MUELAS, 'extracción de muelas del juicio')}, porque el manejo y los cuidados son distintos.",

   {"h2": "Cuándo un diente ya no se puede salvar"},
   "Estas son las situaciones donde la extracción deja de ser una opción entre varias y pasa a ser la indicada:",
   {"ul": [
     "<strong>Caries que llegó por debajo de la encía.</strong> Si no queda pared sana sobre la que reconstruir, no hay dónde anclar una corona.",
     "<strong>Fractura vertical de la raíz.</strong> Una raíz partida a lo largo no se repara. Es de los pocos diagnósticos sin discusión.",
     f"<strong>Movilidad avanzada por pérdida de hueso.</strong> Cuando la {link(U_GINGIVITIS, 'periodontitis')} consumió el soporte, el diente ya no tiene de dónde sostenerse.",
     "<strong>Infección que no responde al tratamiento de conducto.</strong> Se intenta primero salvarlo; si la lesión persiste, se retira.",
     "<strong>Falta de espacio en un plan de ortodoncia.</strong> A veces se extrae una pieza sana para alinear el resto. Es una decisión planificada, no una urgencia.",
   ]},
   f"Antes de llegar a cualquiera de esos puntos hay margen. Muchos dientes que parecían perdidos se recuperan con {link(U_ENDO, 'un tratamiento de conducto')} y una corona. La extracción se decide después de descartar eso, no antes.",

   {"quote": "Un diente que se puede salvar, se salva. Nadie repone la raíz natural con nada mejor. Pero también hemos visto pacientes que gastaron tres veces en rescatar una pieza que ya no tenía soporte, y ese dinero habría rendido más en reponerla bien.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cómo es la cita, paso a paso"},
   {"ol": [
     "<strong>Radiografía previa.</strong> Muestra la forma de las raíces y su relación con el nervio o el seno maxilar. Define si el caso es simple o quirúrgico.",
     "<strong>Anestesia local.</strong> Se espera a que haga efecto completo. Vas a sentir presión, no dolor.",
     "<strong>Luxación de la pieza.</strong> Se ensancha el espacio del ligamento con movimientos suaves. Es la parte que toma más tiempo.",
     "<strong>Salida del diente.</strong> Ocurre en segundos cuando el paso anterior se hizo bien.",
     "<strong>Limpieza del alvéolo</strong> y compresión con gasa para formar el coágulo.",
     "<strong>Indicaciones por escrito</strong> y control a los pocos días si hace falta.",
   ]},
   "El paso tres es el que marca la diferencia entre una extracción tranquila y una complicada. Cuando se hace con paciencia, el diente sale sin fuerza y el hueso queda intacto para lo que venga después.",

   {"h2": "Las primeras 48 horas: qué hacer y qué evitar"},
   "El objetivo de estos dos días es proteger el coágulo que se forma en el hueco. Si se pierde, aparece el alvéolo seco, que duele bastante y retrasa todo.",
   {"ul": [
     "<strong>Muerde la gasa 30 a 45 minutos</strong> sin estar cambiándola cada rato para revisar.",
     "<strong>Frío desde afuera</strong> las primeras horas, en intervalos de quince minutos.",
     "<strong>Nada de enjuagues fuertes ni escupir</strong> durante el primer día. La succión desaloja el coágulo.",
     "<strong>Sin sorbete y sin fumar.</strong> Ambos generan succión; el cigarrillo además retrasa la cicatrización.",
     "<strong>Comida blanda y templada</strong>, masticando del otro lado.",
     "<strong>Duerme con la cabeza algo elevada</strong> la primera noche.",
   ]},
   f"Sangrado leve en las primeras horas es esperable. Si a las cuatro horas sigue saliendo sangre roja de forma continua, o si al tercer día el dolor aumenta en vez de bajar, comunícate. Esas dos señales están entre las de {link(U_EMERGENCIAS, 'una emergencia dental')}.",

   {"h2": "Qué hacer con el hueco que queda"},
   f"Una extracción resuelve el problema de hoy y abre uno nuevo si el espacio queda vacío mucho tiempo. Los dientes vecinos se inclinan, el antagonista de arriba desciende y la mordida se desordena. Las opciones para reponer están en {link(U_PROTESIS, 'tipos de prótesis dental')}.",
   "En molares posteriores que ya no cumplen función masticatoria, a veces la decisión es dejar el espacio. Es una conversación que se tiene en la consulta, mirando cómo cierra tu mordida.",

   {"h2": "Cuándo NO conviene extraer todavía"},
   {"ul": [
     "<strong>Si hay infección aguda con inflamación importante.</strong> Muchas veces se controla primero y se extrae después, con menos riesgo y mejor anestesia.",
     "<strong>Si tomas anticoagulantes o tienes una condición médica de peso.</strong> No impide la extracción, pero cambia la preparación y a veces requiere coordinación con tu médico.",
     "<strong>Si el diente todavía es rescatable y solo quieres ahorrarte el tratamiento.</strong> Sacar es más barato hoy; reponer sale más caro mañana.",
   ]},
   f"Atendemos extracciones en Otavalo y recibimos pacientes de Cotacachi, Atuntaqui y las comunidades de la zona. Si el procedimiento te genera ansiedad, dilo al agendar: se maneja distinto y ayuda leer {link(U_MIEDO, 'cómo superar el miedo al dentista')}.",

   {"faq": [
     ("¿Cuánto duele una extracción simple?",
      "Durante el procedimiento no duele: la anestesia bloquea la zona y solo sientes presión. Las molestias posteriores duran dos o tres días y se controlan con el analgésico indicado."),
     ("¿Puedo ir solo y manejar después?",
      "Con anestesia local, sí. Es una anestesia de la zona, no una sedación, así que sales caminando y en condiciones de manejar."),
     ("¿Cuándo puedo volver a hacer ejercicio?",
      "Conviene esperar unas 72 horas. El esfuerzo aumenta la presión y puede reactivar el sangrado."),
     ("¿Me tienen que dar antibiótico siempre?",
      f"No. Se receta cuando hay infección o cuando tu situación de salud lo justifica. En una extracción simple sin infección normalmente no hace falta. Más sobre el postoperatorio en {link(U_CIRUGIA, 'cirugía oral y sus cuidados')}."),
   ]},
   f'¿Tienes una pieza que te preocupa? <a href="{wa("Hola, creo que necesito una extracción y quiero que me revisen")}">Escríbenos por WhatsApp</a> y agendamos la valoración, que no tiene costo. Con la radiografía se define en minutos si el diente todavía se salva.',
 ]})


# ── 4 · Formas de pago ───────────────────────────────────────────────
POSTS.append({
 "title": "Cómo se organiza el pago de un tratamiento dental largo",
 "slug": "formas-de-pago-y-financiamiento-dental",
 "date": "2026-09-19T09:00:00",
 "cat": CAT["emergencias"],
 "tags": ["formas de pago", "presupuesto dental", "tratamiento por fases",
          "financiamiento dental"],
 "focus_kw": "formas de pago tratamiento dental",
 "yoast_title": "Cómo se organiza el pago de un tratamiento dental",
 "yoast_desc": "Un tratamiento largo no se paga de una sola vez. Como se divide por fases, en que orden conviene avanzar y las seis preguntas que debes hacer antes.",
 "excerpt": "Por qué un plan largo se divide por fases, cómo se ordena el pago y qué preguntar antes de empezar cualquier tratamiento.",
 "bloques": [
   "Te entregan un presupuesto con varios procedimientos y el total impresiona. Es la reacción más común, y casi siempre nace de una confusión: leer ese número como si fuera un pago único de la próxima semana.",
   "Un tratamiento dental extenso no funciona así. Se ejecuta en meses, en etapas, y el pago sigue el mismo ritmo que el trabajo clínico.",

   {"h2": "Por qué el total no se paga de una vez"},
   "La razón es clínica antes que financiera. Un plan completo tiene procedimientos que dependen unos de otros y que exigen tiempos de cicatrización entre medio. No se puede acelerar aunque quisieras.",
   "Si hay una infección, se trata y se espera. Si se retiró una pieza, el hueso necesita semanas. Si las encías están inflamadas, se estabilizan antes de colocar cualquier cosa encima. Ese calendario clínico es el que ordena el pago, no al revés.",
   "Por eso un presupuesto bien armado no es un número: es una secuencia de bloques con su valor cada uno.",
   "Hay una consecuencia práctica de esto que conviene tener clara desde el principio. Si el plan completo se va a ejecutar en seis meses, el desembolso también se reparte en seis meses. Mirar el total como si venciera el viernes lleva a mucha gente a no empezar nunca, y ese es el peor de los escenarios posibles: el problema sigue creciendo mientras la persona junta una cifra que en realidad nadie le iba a pedir de golpe.",

   {"h2": "Cómo se divide un plan por fases"},
   aviso_precio(),
   {"tabla": [["Fase", "Qué se resuelve", "Cuándo se ejecuta"], [
     ["Urgencia", "Dolor, infección, fractura", "De inmediato"],
     ["Estabilización", "Encías, caries, endodoncias, extracciones necesarias", "Primeras semanas"],
     ["Rehabilitación", "Coronas, prótesis, implantes, reposición de piezas", "Cuando el terreno está sano"],
     ["Estética", "Blanqueamiento, carillas, ajustes de forma", "Al final del proceso"],
     ["Mantenimiento", "Controles y limpiezas periódicas", "Cada seis meses, de por vida"],
   ]]},
   f"Cada fila es un momento distinto del calendario, y ese es el punto. Una {link(U_LIMPIEZA, 'limpieza dental')} de mantenimiento arranca desde {D_LIMPIEZA} y se resuelve en una cita. Una rehabilitación completa se extiende varios meses. Meterlas en el mismo saldo no ayuda a nadie.",

   {"h2": "El orden clínico también es el orden más económico"},
   "Respetar la secuencia no es una formalidad. Alterarla cuesta dinero de verdad:",
   {"ul": [
     "<strong>Colocar coronas sobre encías enfermas.</strong> El nivel de la encía sigue cambiando y el borde de la corona queda expuesto en un año. Trabajo perdido.",
     "<strong>Blanquear antes de resolver caries.</strong> El agente blanqueador sobre un diente con caries genera dolor, y el color de las resinas viejas no cambia, así que quedan de otro tono.",
     f"<strong>Poner una prótesis sobre piezas sin tratar.</strong> Cuando el diente que sostiene la prótesis se enferma, hay que rehacerla entera. Las opciones y sus soportes están en {link(U_PROTESIS, 'tipos de prótesis dental')}.",
     "<strong>Empezar ortodoncia con caries activas.</strong> Los aparatos dificultan la higiene y aceleran lo que ya estaba avanzando.",
   ]},
   "Si el presupuesto no alcanza para todo, la respuesta no es saltarse fases. Es hacer menos, pero en el orden correcto.",

   {"quote": "Cuando alguien nos dice que este mes solo puede una parte, no hay drama: se define cuál es esa parte y se hace bien. Lo que sí evitamos es empezar tres cosas a medias. Un tratamiento interrumpido a mitad de camino suele terminar costando más que no haberlo empezado.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Qué preguntar antes de empezar"},
   "Estas seis preguntas ordenan cualquier conversación de presupuesto, aquí o en cualquier consultorio:",
   {"ol": [
     "<strong>¿Cuáles de estos procedimientos son urgentes y cuáles pueden esperar?</strong> Es la pregunta que más plata ahorra, porque separa lo que no admite demora de lo que sí.",
     "<strong>¿En cuántas sesiones se hace cada fase y cuánto tiempo hay entre una y otra?</strong> Con eso armas tu calendario real.",
     "<strong>¿Qué pasa si al abrir aparece algo que no estaba en la radiografía?</strong> Debe haber un acuerdo previo de que se te avisa antes de continuar.",
     "<strong>¿Los controles posteriores están incluidos?</strong> En ortodoncia, implantes y prótesis los controles son parte del tratamiento, no un extra.",
     "<strong>¿Qué pasa si necesito pausar unos meses?</strong> Algunas fases se pueden detener sin consecuencia; otras no. Conviene saber cuáles antes de empezar.",
     "<strong>¿Me lo pueden entregar por escrito, con el detalle por fase?</strong> Un presupuesto verbal no se puede comparar ni reclamar.",
   ]},

   {"h2": "Las señales de un presupuesto mal armado"},
   "Hay tres señales que conviene mirar antes de aceptar cualquier propuesta:",
   {"ul": [
     "<strong>Un número global sin detalle.</strong> Si no dice qué piezas, qué materiales y cuántas sesiones, no se puede comparar con nada.",
     "<strong>Presión para decidir el mismo día.</strong> Ningún tratamiento dental planificado exige una firma inmediata. Las urgencias son otra cosa y se ven aparte.",
     "<strong>Todo cotizado y nada priorizado.</strong> Un plan que no distingue lo urgente de lo estético no te está ayudando a decidir.",
   ]},
   f"Recibimos con frecuencia a pacientes de Otavalo, Cotacachi e Ibarra que llegan con una cotización de otro lugar y quieren una segunda mirada. Revisarla y explicarte qué es urgente y qué no forma parte de la valoración. Puedes conocer cómo trabajamos en {link(U_DENTISTA, 'nuestra clínica dental en Otavalo')}.",

   {"h2": "Cuándo dividir el tratamiento NO te conviene"},
   "Fraccionar es útil en la mayoría de casos, pero hay excepciones claras:",
   {"ul": [
     "<strong>Cuando hay infección activa.</strong> Esa fase no espera al mes siguiente, sin importar el presupuesto.",
     f"<strong>Cuando la pausa deja un diente sin protección.</strong> Un diente con {link(U_ENDO, 'endodoncia')} terminada y sin corona se fractura, y ahí ya no hay nada que reconstruir.",
     "<strong>Cuando el espacio de una extracción queda abierto por meses.</strong> Los dientes vecinos se mueven, y reponer después de que se movieron sale más caro.",
     "<strong>Durante un tratamiento de ortodoncia en curso.</strong> Suspender los controles a mitad de camino desordena lo avanzado.",
   ]},
   f"En esos escenarios lo sensato es reducir el alcance del plan, no partirlo por la mitad. Hacer tres cosas completas rinde más que empezar ocho. Si tu caso incluye ortodoncia, conviene revisar antes {link(U_ORTO_OTAVALO, 'las opciones de ortodoncia en Otavalo')}.",

   {"faq": [
     ("¿Tengo que pagar todo el tratamiento antes de empezar?",
      "No. El plan se divide en fases y cada una se define en su momento. Lo habitual es acordar cómo se organiza cada bloque antes de iniciarlo."),
     ("¿Puedo hacer solo la fase urgente y decidir el resto después?",
      "Sí, y es lo más razonable cuando el presupuesto aprieta. Resolver dolor e infección primero deja el resto abierto para cuando puedas."),
     ("¿El presupuesto se puede modificar en el camino?",
      "Puede cambiar si al intervenir aparece algo que la radiografía no mostraba. Lo correcto es que te lo comuniquen antes de continuar, no después."),
     ("¿Cuánto tiempo vale el presupuesto que me entregan?",
      "Depende del caso. Si pasan muchos meses, la boca cambió y conviene revisar el diagnóstico antes de retomar el plan original."),
   ]},
   f'¿Tienes un presupuesto y quieres entender qué es urgente y qué puede esperar? <a href="{wa("Hola, quiero revisar un presupuesto dental y saber cómo organizarlo")}">Escríbenos por WhatsApp</a> y agendamos la valoración, que no tiene costo.',
 ]})


# ── 5 · Valoración sin costo ─────────────────────────────────────────
POSTS.append({
 "title": "Qué incluye la valoración dental sin costo y con qué sales",
 "slug": "que-incluye-la-valoracion-dental-sin-costo",
 "date": "2026-09-21T09:00:00",
 "cat": CAT["emergencias"],
 "tags": ["valoración dental", "primera consulta", "diagnóstico dental", "Otavalo"],
 "focus_kw": "valoración dental sin costo",
 "yoast_title": "Qué incluye la valoración dental sin costo",
 "yoast_desc": "Que se revisa en la primera cita, cuanto dura, con que documentos sales y por que es ahi y no por telefono donde se define el presupuesto real.",
 "excerpt": "Qué se revisa en esa primera cita, cuánto dura, con qué sales y por qué es ahí donde se define el presupuesto real.",
 "bloques": [
   "«Valoración sin costo» suena a gancho comercial, y en muchos lugares lo es: te miran diez segundos y te pasan una cifra. Vale aclarar entonces qué debería incluir de verdad esa cita.",
   "Es la consulta en la que se levanta el diagnóstico completo. Sin ella, cualquier presupuesto es una estimación a ciegas, y a ciegas los números siempre se mueven después.",

   {"h2": "Qué pasa en esa primera cita, paso a paso"},
   {"ol": [
     "<strong>Conversación inicial.</strong> Qué te trae, desde cuándo, si hay dolor, qué tratamientos te has hecho antes y qué esperas conseguir. Toma unos minutos y orienta todo lo demás.",
     "<strong>Historia médica.</strong> Enfermedades, medicación habitual, alergias, embarazo. Hay condiciones que cambian el plan por completo, y anticoagulantes o diabetes se manejan distinto.",
     "<strong>Examen de dientes.</strong> Pieza por pieza: caries, restauraciones antiguas filtradas, fracturas, desgaste, piezas ausentes.",
     "<strong>Examen de encías.</strong> Se revisa color, sangrado y profundidad del surco. Ahí se detecta la enfermedad periodontal, que en etapas iniciales no duele.",
     "<strong>Mordida y articulación.</strong> Cómo cierran los dientes, si hay contactos que sobrecargan una pieza, si hay signos de bruxismo o ruido al abrir la boca.",
     "<strong>Radiografía cuando el caso lo requiere.</strong> Muestra lo que el ojo no alcanza: caries entre dientes, nivel de hueso, raíces, piezas retenidas. Si hace falta, se te informa antes.",
     "<strong>Explicación del hallazgo y plan por escrito.</strong> Qué encontramos, qué es urgente, qué puede esperar y qué opciones tienes en cada punto.",
   ]},
   "El proceso completo toma entre veinte y cuarenta minutos según la complejidad. Nadie te pide firmar ni decidir ese día.",
   "El segundo punto merece un paréntesis, porque suele tomarse a la ligera. Una consulta odontológica es una consulta médica, y hay medicamentos de uso diario que cambian por completo cómo se planifica una extracción o una cirugía. Contarlo al inicio evita sorpresas en la mitad de un procedimiento.",

   {"h2": "Lo que se revisa además de los dientes"},
   "La parte que más sorprende a los pacientes es cuánto se mira fuera de las piezas. Encías, hueso, articulación, mucosas, lengua y paladar.",
   f"Ese examen detecta cosas que no dan síntoma. La {link(U_PERIO, 'enfermedad periodontal')} avanza durante años sin dolor y es la primera causa de pérdida de dientes en adultos. Cuando alguien nota que una pieza se mueve, ya se perdió bastante hueso.",
   "También se revisan los tejidos blandos, buscando lesiones que la persona no había visto. Es un chequeo de treinta segundos que ningún examen de dientes debería omitir.",

   {"h2": "Con qué sales de esa cita"},
   {"tabla": [["Sales con", "Para qué te sirve"], [
     ["Diagnóstico por pieza", "Saber exactamente qué tiene cada diente, sin generalidades"],
     ["Plan de tratamiento en fases", "Entender el orden clínico y el calendario real"],
     ["Separación entre urgente y postergable", "Decidir por dónde empezar si el presupuesto es limitado"],
     ["Presupuesto por fase, por escrito", "Poder compararlo, consultarlo en casa y volver cuando decidas"],
     ["Las alternativas de cada punto", "Saber que casi siempre hay más de un camino y cuál conviene a tu caso"],
   ]]},
   "Ese cuarto renglón es el que más se pide y el que menos se entrega en otros lugares. Un presupuesto verbal no se puede comparar con nada ni reclamar después.",

   {"h2": "Por qué el presupuesto no sale por teléfono"},
   aviso_precio(),
   f"Hay procedimientos acotados donde sí se puede anticipar un valor de entrada: una {link(U_LIMPIEZA, 'limpieza dental')} arranca desde {D_LIMPIEZA} y una {link(U_CALZA, 'resina o calza')} desde {D_RESINA}. Son trabajos de una sesión y con poca variación entre pacientes.",
   "Para todo lo demás el número depende de lo que muestra la radiografía. La misma queja —«me molesta esta muela»— puede terminar en una resina de una cara o en una endodoncia con corona. La diferencia entre esos dos caminos es enorme, y nadie la resuelve por WhatsApp.",
   "Cuando alguien te da una cifra cerrada sin verte, esa cifra sube después o el tratamiento se recorta para que quepa. No hay una tercera posibilidad.",

   {"quote": "El momento que más se repite en la valoración es cuando mostramos la radiografía en la pantalla. La persona vino por un diente y ve tres que estaban trabajando en silencio. No es para asustar: es para que la decisión la tome sabiendo lo que hay.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cómo prepararte y qué llevar"},
   {"ul": [
     "<strong>Radiografías o estudios previos</strong>, si te los tomaron en otro lado. Sirven para comparar la evolución.",
     "<strong>La lista de medicamentos que tomas</strong>, con nombre y dosis. Anticoagulantes, bifosfonatos y algunos tratamientos oncológicos cambian el plan.",
     "<strong>Presupuestos de otras clínicas</strong>, si los tienes. Revisarlos juntos es parte de la consulta.",
     "<strong>Tus dudas anotadas.</strong> En el sillón se olvidan; en un papel, no.",
     "<strong>Tiempo suficiente.</strong> Reserva una hora para no salir corriendo a mitad de la explicación.",
   ]},
   f"Si las visitas al dentista te generan ansiedad, avísalo al agendar. La cita se maneja con otro ritmo y ayuda leer antes {link(U_MIEDO, 'cómo manejar el miedo al dentista')}.",

   {"h2": "Cuándo la valoración sin costo NO es lo que necesitas"},
   "Hay tres situaciones donde esta cita no es el punto de entrada correcto:",
   {"ul": [
     f"<strong>Cuando tienes dolor intenso o el rostro inflamado.</strong> Eso es una urgencia y se atiende como tal, resolviendo el síntoma primero. Mira {link(U_EMERGENCIAS, 'qué hacer ante una emergencia dental')}.",
     "<strong>Cuando hubo un golpe y se movió o salió una pieza.</strong> Ahí el tiempo se mide en minutos, no en días. Se va directo a la atención de urgencia.",
     "<strong>Cuando solo quieres el número y no piensas mostrar la boca.</strong> En ese caso la cita no te va a servir, porque el diagnóstico es justamente lo que se entrega.",
   ]},
   f"Fuera de esos casos, la valoración es el paso que ordena todo lo demás. Atendemos en Otavalo y recibimos pacientes de Cotacachi, Atuntaqui y las comunidades de la zona, muchos que llevaban años sin una revisión completa. Si es tu caso, revisa {link(U_CADA_CUANTO, 'cada cuánto conviene ir al dentista')}.",

   {"faq": [
     ("¿La radiografía también es sin costo?",
      "La valoración clínica y el plan de tratamiento no tienen costo. Si tu caso necesita estudio radiográfico, se te informa antes de tomarlo para que decidas."),
     ("¿Cuánto dura la cita?",
      "Entre veinte y cuarenta minutos. Los casos con muchas piezas comprometidas toman más, porque el examen es pieza por pieza."),
     ("¿Tengo que empezar el tratamiento ese mismo día?",
      "No. Sales con el plan y el presupuesto por escrito, y decides en casa. Solo si hay dolor o infección se resuelve algo en el momento."),
     ("¿Sirve para una segunda opinión?",
      f"Sí, es uno de los motivos más frecuentes. Trae el presupuesto y las radiografías que tengas. Si el tema es una {link(U_CORONA, 'corona')} o una rehabilitación grande, la segunda mirada vale especialmente la pena."),
   ]},
   f'¿Quieres saber en qué estado está tu boca y cuánto costaría resolverlo? <a href="{wa("Hola, quiero agendar la valoración sin costo")}">Escríbenos por WhatsApp</a> y coordinamos el día. Sales con el diagnóstico y el presupuesto por escrito, sin compromiso.',
 ]})


if __name__ == "__main__":
    import os, sys
    carpeta = os.path.join(os.path.dirname(os.path.abspath(__file__)), "posts")
    for spec in POSTS:
        ruta, palabras = guarda(spec, carpeta)
        print(f"{palabras:5d} palabras  {os.path.basename(ruta)}")
        t = spec["yoast_title"]; d = spec["yoast_desc"]
        print(f"        title {len(t)}  ·  metadesc {len(d)}")
