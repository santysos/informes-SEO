#!/usr/bin/env python3
"""Bloque A · implantología, posts 1 a 3."""
from gutenberg import CAT, link, wa, url, desde, aviso_precio, guarda

POSTS = []

U_IMPLANTES = url("implantes-dentales-ecuador")
U_PRECIO_IMPL = url("cuanto-cuesta-implante-dental-ecuador")
U_CANDIDATO = url("candidato-para-implantes-dentales")
U_CARGA = url("carga-inmediata-en-implantes")
U_PROTESIS = url("protesis-dental-ecuador-tipos-opciones")
U_REGEN = url("regeneracion-osea-guiada-implante")
U_PERIO = url("enfermedad-periodontal-encias-inflamadas")
U_MANT_PERIO = url("mantenimiento-periodontal-encias-sanas")
U_CORONA = url("corona-dental-cuando-materiales")

# ── 1 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Implante dental o puente fijo: cuál te conviene según tu caso",
 "slug": "implante-dental-vs-puente-fijo",
 "date": "2026-09-02T09:00:00",
 "cat": CAT["implantologia"],
 "tags": ["implante dental", "puente fijo", "diente perdido", "rehabilitación"],
 "focus_kw": "implante dental o puente fijo",
 "yoast_title": "Implante dental o puente fijo: cuál conviene",
 "yoast_desc": "Las diferencias reales entre un implante y un puente fijo: cuanto duran, que le pasa a los dientes vecinos, costo a largo plazo y en que caso gana cada uno.",
 "excerpt": "Dos formas de reponer un diente perdido, con consecuencias muy distintas a diez años. Qué gana y qué pierde cada una.",
 "bloques": [
   "Cuando falta un diente y el hueco es visible o molesta al masticar, casi siempre aparecen las mismas dos opciones sobre la mesa: un implante o un puente fijo. Las dos funcionan y las dos se usan todos los días, pero resuelven el problema de maneras distintas.",
   "La diferencia de fondo es sencilla: el implante reemplaza la raíz que perdiste; el puente cuelga el diente nuevo de los dos vecinos. De ahí sale todo lo demás.",

   {"h2": "Qué es cada uno, sin tecnicismos"},
   {"h3": "El implante"},
   "Es un tornillo de titanio que se coloca en el hueso, en el mismo sitio donde estaba la raíz del diente que perdiste. Pasan unos meses mientras el hueso lo integra, y encima se atornilla una corona que hace de diente. Es una pieza independiente: no toca a los vecinos.",
   {"h3": "El puente fijo"},
   "Se tallan los dos dientes que rodean el hueco, se les colocan coronas, y entre esas dos coronas va suspendido el diente que falta. Todo va cementado en una sola pieza. No hay tornillo ni cirugía, y se resuelve en dos o tres citas.",

   {"h2": "La comparación que importa"},
   {"tabla": [["", "Implante", "Puente fijo"], [
     ["Toca los dientes vecinos", "No", "Sí, hay que tallarlos"],
     ["Tiempo hasta terminar", "3 a 6 meses", "2 a 3 semanas"],
     ["Cirugía", "Sí", "No"],
     ["Duración esperable", "15 años o más", "8 a 12 años"],
     ["Conserva el hueso", "Sí", "No, el hueso del hueco sigue perdiéndose"],
     ["Higiene diaria", "Como un diente normal", "Requiere hilo especial por debajo"],
     ["Si falla", "Se recoloca la pieza", "Hay que rehacer las tres piezas"],
   ]]},

   {"h2": "El punto que casi nadie menciona: los dientes vecinos"},
   "Para hacer un puente hay que desgastar dos dientes que probablemente estén sanos. Se les quita esmalte por todas las caras para que entren las coronas, y eso no tiene vuelta atrás.",
   "Si esos dientes estaban intactos, es un precio alto. Si ya tenían calzas grandes, coronas viejas o alguna fractura, el argumento se invierte: ya iban a necesitar tratamiento, y el puente resuelve las tres cosas de una vez.",
   "Por eso la primera pregunta en la consulta no es «¿implante o puente?», sino «¿cómo están los dos dientes de al lado?». La respuesta a esa pregunta decide buena parte del caso.",

   {"h2": "El segundo punto: el hueso"},
   "Cuando se pierde un diente, el hueso que sostenía su raíz deja de recibir estímulo y empieza a reabsorberse. Es un proceso lento pero constante.",
   "El implante frena eso porque el tornillo cumple la función de la raíz. El puente no: el hueso debajo del diente suspendido sigue perdiéndose año tras año. Con el tiempo aparece un espacio visible entre la encía y la pieza, sobre todo si el hueco está adelante.",
   f"Cuando ya se perdió bastante hueso antes de decidir, la opción del implante puede requerir un injerto previo. Lo explicamos en {link(U_REGEN, 'regeneración ósea para implantes')}.",

   {"quote": "Al paciente le mostramos la radiografía y le señalamos los dos dientes vecinos. Cuando ve que están sanos y que habría que limarlos, la conversación cambia sola. Y cuando ya tienen coronas viejas, muchas veces el puente es lo sensato.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cuánto cuesta cada opción"},
   aviso_precio(),
   {"ul": [
     desde("implante", "Implante con su corona"),
     "<strong>Puente fijo de tres piezas</strong>: el valor equivale aproximadamente a tres coronas, porque eso es lo que se fabrica.",
   ]},
   "En el momento de la consulta, el puente suele salir menos que el implante. La cuenta cambia si la miras a quince años: el implante generalmente sigue ahí, mientras que el puente probablemente se haya rehecho una vez, y en esa segunda vez los dientes pilares ya vienen más desgastados.",
   "No es una regla absoluta —hay puentes que duran veinte años y hay implantes que fallan— pero es la tendencia, y conviene tenerla presente antes de decidir solo por el número de hoy.",

   {"h2": "Cuándo conviene cada uno"},
   {"h3": "El implante gana si"},
   {"ul": [
     "Los dientes vecinos están sanos y no quieres tocarlos.",
     "Tienes buen hueso o estás dispuesto a un injerto.",
     "Puedes esperar los meses de integración.",
     "Faltan varios dientes seguidos y un puente quedaría demasiado largo.",
     "Piensas en el largo plazo y no te apura resolverlo esta semana.",
   ]},
   {"h3": "El puente gana si"},
   {"ul": [
     "Los dientes vecinos ya necesitan corona de todos modos.",
     "No hay hueso suficiente y no quieres someterte a un injerto.",
     "Tienes alguna condición de salud que desaconseja la cirugía.",
     "Necesitas resolverlo rápido, por trabajo o por un evento cercano.",
     "El presupuesto de hoy es la restricción principal.",
   ]},

   {"h2": "Cómo se decide en la consulta"},
   "El caso se resuelve mirando cuatro cosas, en este orden:",
   {"ol": [
     "<strong>Estado de los dientes vecinos.</strong> Si están sanos, el implante parte con ventaja. Si ya tienen coronas o calzas grandes, el puente entra con fuerza.",
     "<strong>Hueso disponible.</strong> Se ve en la radiografía. Define si el implante es directo o necesita injerto previo.",
     "<strong>Salud de las encías.</strong> Con enfermedad periodontal activa no se coloca nada hasta estabilizarla.",
     "<strong>Tu situación:</strong> cuánto puedes esperar, si tienes alguna condición médica, y qué presupuesto manejas.",
   ]},
   "En Otavalo atendemos bastantes casos de pacientes que llegan desde Cotacachi y Atuntaqui con el hueco ya de años. Ahí las cuatro respuestas suelen apuntar en la misma dirección, y la conversación se vuelve simple.",

   {"h2": "Lo que no deberías hacer"},
   "Dejar el hueco así, indefinidamente. Es la opción que más elige la gente y la que peor termina: los dientes vecinos se inclinan hacia el espacio vacío, el de arriba baja buscando contacto, y en un par de años la mordida se desordena.",
   f"Cuando eso pasa, resolver el hueco original ya no alcanza: hay que corregir también lo que se movió. Un problema de una pieza se vuelve uno de cuatro. Si vives en {link(U_IMPLANTES, 'Otavalo o los alrededores')} y llevas tiempo postergándolo, la valoración no tiene costo y sirve para saber en qué punto estás.",
   {"faq": [
     ("¿El implante duele?",
      "La cirugía se hace con anestesia local y la mayoría de pacientes la describe como más llevadera que una extracción. Las molestias posteriores duran dos o tres días y se controlan con analgésicos."),
     ("¿Cualquiera puede ponerse un implante?",
      f"La mayoría sí, pero hay que evaluar hueso, encías y estado de salud general. Lo desarrollamos en {link(U_CANDIDATO, 'quién es candidato para implantes')}."),
     ("¿Se puede hacer un puente si falta más de un diente?",
      "Sí, pero cuantas más piezas cuelguen, más carga soportan los pilares y menos dura el conjunto. Pasadas dos piezas seguidas suele ser mejor evaluar implantes."),
     ("¿Cuánto tiempo puedo esperar antes de decidir?",
      "Mientras menos, mejor. Los primeros seis meses tras la extracción son los de mayor pérdida ósea, y ahí es cuando más opciones tienes abiertas."),
   ]},
   f'¿Tienes un diente que falta y no sabes qué hacer? <a href="{wa("Hola, perdi un diente y quiero saber si me conviene implante o puente")}">Escríbenos por WhatsApp</a> y agendamos la valoración, que no tiene costo. Con una radiografía se ve en minutos cuál de las dos opciones es la tuya.',
 ]})

# ── 2 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuánto dura un implante dental y qué hace que falle",
 "slug": "cuanto-dura-un-implante-dental",
 "date": "2026-09-04T09:00:00",
 "cat": CAT["implantologia"],
 "tags": ["implante dental", "duración", "periimplantitis", "cuidados"],
 "focus_kw": "cuánto dura un implante dental",
 "yoast_title": "Cuánto dura un implante dental y por qué falla",
 "yoast_desc": "Un implante bien cuidado supera los 15 anios, pero la corona se cambia antes. Que lo hace fallar de verdad y como cuidarlo para que dure toda la vida.",
 "excerpt": "La respuesta honesta es «depende de ti más que del implante». Qué dura cuánto y cuáles son las tres causas reales de fracaso.",
 "bloques": [
   "Es la pregunta que todo paciente hace antes de decidirse, y con razón: es una inversión importante y quiere saber si va a tener que repetirla.",
   "La respuesta corta es que el tornillo suele durar décadas y la corona bastante menos. La respuesta larga tiene que ver con la higiene, con el hueso y con si fumas.",

   {"h2": "Dos piezas con vidas distintas"},
   "Un implante no es una sola cosa. Son tres partes y cada una envejece a su ritmo:",
   {"tabla": [["Parte", "Qué es", "Duración esperable"], [
     ["El implante", "El tornillo de titanio en el hueso", "20 años o más; muchos duran toda la vida"],
     ["El pilar", "La pieza que conecta tornillo y corona", "Suele durar lo mismo que el tornillo"],
     ["La corona", "El diente visible", "10 a 15 años"],
   ]]},
   "Esto explica una confusión frecuente. Cuando alguien dice «se me dañó el implante», casi siempre se refiere a la corona, que se fracturó o se desgastó. Cambiarla es un procedimiento sencillo y mucho más económico que volver a empezar: el tornillo sigue en su sitio y sirve.",

   {"h2": "Las tres causas reales de fracaso"},
   {"h3": "1. Periimplantitis"},
   "Es la causa número uno y es prevenible. Funciona como la enfermedad de las encías, pero alrededor del implante: se acumula placa, la encía se inflama, y si nadie interviene el hueso que sostiene el tornillo empieza a perderse.",
   "El problema es que un implante no duele como un diente natural. No tiene nervio, así que no avisa. Cuando el paciente nota que la pieza se mueve, ya se perdió bastante hueso.",
   f"Por eso los controles periódicos no son opcionales en alguien con implantes. La lógica es la misma que explicamos en {link(U_MANT_PERIO, 'mantenimiento periodontal')}.",
   {"h3": "2. El tabaco"},
   "Fumar es el factor de riesgo aislado más fuerte. Reduce el riego sanguíneo en la encía, retrasa la cicatrización y multiplica la probabilidad de que el implante no llegue a integrarse en los primeros meses.",
   "No significa que un fumador no pueda ponerse implantes. Significa que el riesgo es más alto, que conviene ser honesto sobre el hábito en la consulta, y que dejar de fumar durante las semanas críticas cambia el pronóstico de verdad.",
   {"h3": "3. Fuerza mal repartida"},
   "Si aprietas los dientes por la noche, o si la mordida quedó descompensada, el implante recibe una carga para la que no fue calculado. El titanio aguanta, pero el hueso alrededor se resiente y la corona se fractura antes de tiempo.",
   "Es un problema que se resuelve fácil si se detecta: una férula de descarga y un ajuste de la mordida. El costo de no detectarlo es mucho mayor.",
   "Vale aclarar algo que preguntan seguido en la consulta: la altura no afecta a los implantes. Quien vive en Otavalo o Ibarra no corre un riesgo distinto por eso, ni tiene que tomar precauciones especiales al viajar a la costa o en avión. El titanio integrado en el hueso no responde a los cambios de presión.",

   {"quote": "Los implantes que hemos tenido que retirar tenían casi siempre lo mismo detrás: años sin control y mucha placa acumulada. El paciente sentía que ya estaba resuelto y dejó de venir. Un implante necesita más mantenimiento que un diente sano, no menos.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Qué depende de ti"},
   {"ol": [
     "<strong>Cepillado dos veces al día</strong>, incluyendo el borde donde la corona se encuentra con la encía. Ahí es donde empieza el problema.",
     "<strong>Limpieza entre las piezas</strong> con hilo o cepillo interdental. Es el punto que más se descuida y el más importante.",
     "<strong>Control cada seis meses</strong>, con revisión de encía y radiografía periódica para vigilar el hueso.",
     "<strong>Limpieza profesional</strong> con instrumental adecuado para implantes, que no es el mismo que para dientes naturales.",
     "<strong>Avisar si algo cambia</strong>: sangrado al cepillar, mal sabor, sensación de que la pieza se mueve.",
   ]},
   "Ese quinto punto vale por todos los demás. Un implante que empieza a fallar da señales pequeñas durante meses antes de que sea grave, y en esa ventana casi siempre se puede salvar.",

   {"h2": "Qué esperar en cada etapa"},
   "Saber cómo se comporta un implante con el paso del tiempo evita sustos innecesarios:",
   {"tabla": [["Momento", "Qué es normal", "Qué NO es normal"], [
     ["Primera semana", "Inflamación, molestia leve, algo de sangrado", "Dolor que aumenta al tercer día"],
     ["Primeros 3 meses", "Sensación de pieza extraña que se va", "Que el implante se mueva"],
     ["Primer año", "Adaptación completa, mordida estable", "Sangrado al cepillar esa zona"],
     ["De ahí en adelante", "Funciona como un diente más", "Mal sabor, encía retraída o pieza floja"],
   ]]},
   "La columna de la derecha es la que hay que memorizar. Cualquiera de esas cuatro señales merece una consulta esa misma semana, no en el próximo control.",

   {"h2": "Qué depende de la clínica"},
   "También es justo decir la otra parte. Un implante falla más si se planificó mal: si no se evaluó bien el hueso disponible, si se colocó en una posición que complica la higiene, o si la corona quedó con una mordida alta que sobrecarga la pieza.",
   f"Esas decisiones se toman antes de la cirugía, con estudio radiográfico y planificación. Es la razón por la que la valoración inicial —que en {link(U_IMPLANTES, 'nuestra clínica en Otavalo')} no tiene costo— importa tanto como la cirugía misma.",
   {"h2": "Qué pasa si un implante falla"},
   "No es el final. Lo habitual es retirar la pieza, dejar que el hueso cicatrice unos meses, evaluar si hace falta un injerto y volver a colocar. La tasa de éxito en un segundo intento sigue siendo alta cuando se corrigió la causa del primer fracaso.",
   f"Lo que no tiene sentido es repetir el procedimiento sin cambiar lo que lo hizo fallar. Si fue periimplantitis por higiene, hay que resolver la higiene; si fue bruxismo, la férula; si fue tabaco, hablar con franqueza de eso. Sobre el estado de las encías, sirve leer {link(U_PERIO, 'sobre la enfermedad periodontal')}.",
   {"faq": [
     ("¿El implante se puede picar?",
      "El titanio no se pica ni la corona de porcelana tampoco. Lo que sí se enferma es la encía y el hueso a su alrededor, que es donde hay que poner la atención."),
     ("¿Cuánto dura la corona sobre el implante?",
      f"Entre 10 y 15 años según el material y la mordida. Los tipos de corona los comparamos en {link(U_CORONA, 'este artículo sobre coronas dentales')}."),
     ("¿Los implantes se rechazan como un órgano?",
      "No. El titanio no genera rechazo inmunológico. Cuando un implante no se integra es por falta de estabilidad, infección o cicatrización deficiente, no por rechazo."),
     ("¿Puedo hacerme resonancia magnética con implantes?",
      "Sí. El titanio no representa un problema para ese estudio, aunque siempre conviene avisar al personal que los tienes."),
   ]},
   f'¿Tienes implantes y hace tiempo que no los revisan? <a href="{wa("Hola, tengo implantes y quiero agendar un control")}">Escríbenos por WhatsApp</a> y agendamos el control. Detectar un problema temprano es la diferencia entre una limpieza y una cirugía.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
