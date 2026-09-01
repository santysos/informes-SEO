#!/usr/bin/env python3
"""Bloque B · logística del tratamiento y conversión, posts 1 a 5.

Política de precios aplicada aquí (más restrictiva que PRECIOS_DESDE de
gutenberg.py): solo se publican tres cifras, siempre con «desde» —
limpieza $25, resina o calza $30, extracción simple $35. De implantes,
ortodoncia, blanqueamiento, coronas, carillas y prótesis no se da ninguna
cifra ni rango.
"""
from urllib.parse import quote as _q
from gutenberg import CAT, link, url, guarda

WA_NUM = "593984582733"


def wa(mensaje):
    return f"https://wa.me/{WA_NUM}?text={_q(mensaje)}"


REFERENCIAL = ("Son valores referenciales y marcan un punto de partida: el número real "
               "depende de tu caso y del tratamiento que necesites. La valoración en la "
               "clínica no tiene costo, y es ahí donde se cierra el presupuesto.")

POSTS = []

U_LIMPIEZA   = url("limpieza-dental-otavalo-beneficios")
U_ENDO       = url("endodoncia-ecuador-guia-tratamiento-conducto")
U_ENDO_URG   = url("sintomas-que-indican-que-necesitas-una-endodoncia-urgente")
U_ORTO_DUR   = url("duracion-de-un-tratamiento-de-ortodoncia")
U_CORONA     = url("corona-dental-cuando-materiales")
U_MUELAS     = url("extraccion-de-muelas-del-juicio")
U_IMPLANTES  = url("implantes-dentales-ecuador")
U_DENTISTA   = url("dentista-otavalo-clinica-dental")
U_EMERG      = url("emergencias-dentales-dolor-muela-fractura")
U_MIEDO      = url("miedo-al-dentista-tecnicas-superar-ansiedad")
U_EMBARAZO   = url("cuidado-dental-en-embarazadas")
U_TABACO     = url("impacto-del-tabaco-en-la-salud-bucal")
U_BRUXISMO   = url("bruxismo-rechinar-dientes-ferula-descarga")
U_SENSIB     = url("sensibilidad-dental-causas-tratamiento")
U_ALIENTO    = url("mal-aliento-halitosis-causas-solucion")
U_GINGI      = url("gingivitis-vs-periodontitis-tratamientos")
U_PERIO      = url("enfermedad-periodontal-encias-inflamadas")
U_CADA_CTO   = url("cada-cuanto-ir-al-dentista-salud-bucal")
U_CALZA      = url("calza-dental-resina-amalgama")
U_PROTESIS   = url("protesis-dental-ecuador-tipos-opciones")
U_CARILLAS   = url("carillas-de-porcelana-vs-resina")


# ── 1 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuántas citas necesita cada tratamiento dental",
 "slug": "cuantas-citas-necesita-cada-tratamiento-dental",
 "date": "2026-09-23T09:00:00",
 "cat": CAT["tratamientos"],
 "tags": ["citas dentales", "planificación", "tratamientos dentales", "tiempos", "agenda"],
 "focus_kw": "cuántas citas necesita un tratamiento dental",
 "yoast_title": "Cuántas citas lleva cada tratamiento dental",
 "yoast_desc": ("Cuadro por tratamiento: cuantas visitas lleva cada uno, cuanto se espera "
                "entre una y otra y por que hay pausas de laboratorio que no se pueden acortar."),
 "excerpt": "El número de visitas de cada tratamiento y las esperas obligatorias entre una y otra, para que puedas cuadrarlas con tu semana.",
 "bloques": [
   "«¿Y eso en cuántas veces se hace?» Aparece casi siempre antes que la pregunta del precio, y tiene sentido: detrás hay un permiso que pedir en el trabajo, un turno que cambiar en el almacén o un viaje desde Cotacachi que organizar.",
   "La respuesta corta es que la mayoría de lo que preocupa se resuelve en una o dos visitas. La larga incluye las esperas entre cita y cita, que son la parte que casi nadie explica y la que realmente te desordena el mes.",

   {"h2": "El cuadro completo, tratamiento por tratamiento"},
   "Los números de abajo corresponden a un caso sin complicaciones añadidas. Una infección activa, poco hueso o varias piezas comprometidas suman citas, y eso se ve en la radiografía inicial, no antes.",
   {"tabla": [["Tratamiento", "Citas habituales", "Espera entre citas"], [
     ["Valoración y diagnóstico", "1", "—"],
     ["Limpieza dental", "1", "—"],
     ["Resina o calza", "1 por sector; 2 o 3 si hay muchas piezas", "1 a 2 semanas"],
     ["Extracción simple", "1 más un control", "Control a los 7 a 10 días"],
     ["Muela del juicio incluida", "1 más el retiro de puntos", "7 a 10 días"],
     ["Endodoncia", "1 a 3 sesiones", "7 a 15 días"],
     ["Corona", "2 a 3", "1 a 2 semanas por el laboratorio"],
     ["Carillas", "3 a 4", "2 a 3 semanas por el laboratorio"],
     ["Blanqueamiento en consultorio", "1 a 3 sesiones", "7 días"],
     ["Implante", "Cirugía, controles y luego la corona", "3 a 6 meses de integración"],
     ["Prótesis removible", "4 a 5 con pruebas intermedias", "1 a 2 semanas"],
     ["Ortodoncia", "Un control cada 4 a 6 semanas", "Durante todo el tratamiento"],
   ]]},
   f"Las dos columnas se leen distinto. La de citas mide cuántas veces te sientas en el sillón; la de espera mide cuánto se estira el calendario. Una endodoncia de dos sesiones ocupa dos horas repartidas en tres semanas, y en {link(U_ENDO, 'esta guía del tratamiento de conducto')} está qué pasa en cada una.",

   {"h2": "Por qué existen las esperas entre una cita y otra"},
   {"h3": "Espera de laboratorio"},
   "Coronas, carillas y prótesis no se fabrican en el consultorio. Se toma la impresión, se manda al laboratorio y ahí se trabaja la pieza. Apurar ese tiempo baja la calidad, y una corona mal ajustada termina costando más citas de las que ahorró.",
   {"h3": "Espera de cicatrización"},
   f"La encía y el hueso tienen su propio reloj. Después de una extracción hace falta que el tejido cierre antes de seguir; después de colocar un implante, que el hueso lo integre. Es el mismo motivo por el que {link(U_MUELAS, 'la extracción de una muela del juicio')} lleva un control posterior en vez de resolverse y olvidarse.",
   {"h3": "Espera de observación"},
   "A veces la pausa existe para ver qué hace el diente. En una endodoncia con infección se deja medicación en el conducto y se cita a los diez o quince días: si calmó, se sella. Sellar antes de tiempo es la forma más rápida de repetir el tratamiento entero.",

   {"h2": "Lo que decide si son dos citas o seis"},
   {"ul": [
     "<strong>Cuántas piezas están comprometidas.</strong> Cuatro resinas en el mismo sector se hacen de una sentada; cuatro repartidas por toda la boca, no.",
     "<strong>Si hay infección activa.</strong> Primero se controla, después se rehabilita. Sin excepción.",
     "<strong>Si hay que coordinar dos especialidades.</strong> Un caso que pasa por periodoncia y luego por rehabilitación se ordena en fases, y cada fase tiene su ritmo.",
     "<strong>Cuánto aguantas en el sillón.</strong> Hay pacientes que prefieren sesiones de dos horas y otros que necesitan cortar a los cuarenta minutos. Las dos formas son válidas y cambian el número de citas.",
     "<strong>Si el resultado es visible.</strong> En tratamientos estéticos hay pruebas intermedias para aprobar forma y color antes de cementar. Saltarse esa prueba es apostar.",
   ]},

   {"quote": "Cuando un paciente nos dice que viene desde Ibarra o desde Atuntaqui, lo primero que hacemos es reordenar el plan para que rinda cada viaje. No cambiamos el tratamiento, cambiamos el orden y lo que se junta en cada sesión.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Cómo se ordena un plan de varias fases"},
   "Cuando hay bastante por hacer, el plan no se ejecuta en el orden en que a uno le molestan las cosas. Se ejecuta así:",
   {"ol": [
     "<strong>Valoración con radiografía.</strong> Sin la imagen no hay plan, hay suposiciones.",
     "<strong>Lo que duele o está infectado.</strong> Se controla primero, aunque no sea la pieza que más te preocupa estéticamente.",
     f"<strong>Fase básica.</strong> {link(U_LIMPIEZA, 'Limpieza')}, resinas, extracciones necesarias. Es la fase que estabiliza la boca.",
     "<strong>Fase de rehabilitación.</strong> Endodoncias, coronas, implantes, prótesis. Es la más larga y la que tiene esperas de laboratorio.",
     "<strong>Fase estética.</strong> Blanqueamiento o carillas van al final, cuando ya no hay caries activa ni encía inflamada.",
     "<strong>Controles.</strong> El plan termina con un calendario de revisiones, no con la última cita de trabajo.",
   ]},
   "El orden importa porque cada fase apoya a la siguiente. Blanquear sobre encías sangrantes da un resultado irregular; cementar una corona junto a una caries sin tratar es garantizar que en un año haya que retirarla.",

   {"h2": "Tres valores para dimensionar el gasto por visita"},
   {"ul": [
     "<strong>Limpieza dental: desde $25.</strong>",
     "<strong>Resina o calza: desde $30.</strong>",
     "<strong>Extracción simple: desde $35.</strong>",
   ]},
   REFERENCIAL,
   f"De implantes, ortodoncia o coronas no publicamos cifras: el rango es tan amplio que no significaría nada. Lo que sí se puede adelantar es el número de citas, y en {link(U_ORTO_DUR, 'el caso de la ortodoncia')} hasta el número de meses.",

   {"h2": "Cuándo pedir menos citas te sale caro"},
   "Concentrar todo en una sola sesión suena eficiente y a veces no lo es. Hay tres situaciones donde apurar el calendario termina costando más:",
   {"ul": [
     "Cuando se quiere colocar la corona definitiva sin esperar la integración del implante en un hueso que no está listo.",
     "Cuando se hacen ocho resinas seguidas y las últimas se trabajan con la boca cansada y la anestesia ya vencida.",
     "Cuando se sella una endodoncia sin la sesión de observación porque el paciente no quiere volver.",
   ]},
   "Si tu prioridad es reducir viajes, dilo en la consulta. Hay margen para agrupar procedimientos y también hay límites biológicos que no se negocian.",

   {"h2": "Cómo cuadrar las visitas con tu semana"},
   {"ol": [
     "<strong>Pide el plan por escrito</strong> con el número de citas y la duración estimada de cada una.",
     "<strong>Agenda dos o tres citas de una vez</strong> en lugar de una sola. Los espacios buenos se llenan.",
     "<strong>Avisa si viajas</strong> o si tienes semanas bloqueadas. El plan se acomoda mejor antes de empezar que a mitad.",
     "<strong>Pregunta cuánto dura cada sesión</strong>, además de cuántas son. Una cita de veinte minutos y una de dos horas no se organizan igual.",
     "<strong>Confirma qué pasa si faltas.</strong> En un plan con laboratorio de por medio, mover una cita puede correr todo dos semanas.",
   ]},
   f"Si todavía no tienes un plan y estás comparando dónde atenderte, la {link(U_DENTISTA, 'guía de servicios de nuestra clínica en Otavalo')} te da el panorama de qué se resuelve en un solo lugar.",

   {"faq": [
     ("¿Puedo hacer dos tratamientos distintos en la misma cita?",
      "Sí, siempre que no se pisen. Una limpieza y una resina en el mismo día es habitual. Una cirugía y un blanqueamiento el mismo día, no."),
     ("¿Qué pasa si dejo un tratamiento a la mitad?",
      "Depende de en qué punto lo dejes. Un diente abierto en medio de una endodoncia se contamina y puede perderse. Si vas a pausar, avisa para que se selle de forma provisional."),
     ("¿Las citas de control también cuestan?",
      "El control posterior a un procedimiento forma parte del tratamiento. La valoración inicial no tiene costo. Cualquier otro caso se aclara antes de agendar."),
     ("¿Cuánto dura una cita normal?",
      "Entre treinta minutos y una hora en la mayoría de los procedimientos. Las cirugías y las sesiones de rehabilitación pueden llegar a dos horas."),
   ]},
   f'¿Quieres saber cuántas citas necesita tu caso concreto? <a href="{wa("Hola, quiero saber cuantas citas necesita mi tratamiento")}">Escríbenos por WhatsApp</a> y agendamos la valoración, que no tiene costo. Con la radiografía sobre la mesa, el número deja de ser una suposición.',
 ]})


# ── 2 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Tratamientos largos cuando vives fuera de Otavalo",
 "slug": "tratamientos-largos-cuando-vives-fuera-de-otavalo",
 "date": "2026-09-25T09:00:00",
 "cat": CAT["emergencias"],
 "tags": ["viajes", "planificación", "tratamientos largos", "Otavalo", "logística"],
 "focus_kw": "tratamiento dental viviendo fuera de Otavalo",
 "yoast_title": "Tratamiento dental si vives fuera de Otavalo",
 "yoast_desc": ("Como agrupar procedimientos en menos viajes, que se resuelve en una sola "
                "visita, que no, y como no abandonar el tratamiento dental a la mitad del camino."),
 "excerpt": "Si cada cita te cuesta un viaje, el plan se ordena distinto. Qué se puede juntar, qué no, y cómo terminar lo que empezaste.",
 "bloques": [
   "El tratamiento en sí cuesta lo mismo para todos. Lo que cambia es lo que cuesta llegar: si vives en Cotacachi, en San Pablo o en Quito, cada cita suma transporte, medio día perdido y una negociación con tu propia agenda.",
   "Ese costo invisible es la razón número uno por la que se abandonan los planes a mitad de camino. No es el precio ni el miedo: es que la sexta cita coincidió con una semana complicada y ya no hubo séptima.",

   {"h2": "Qué se puede resolver en una sola visita y qué no"},
   "Antes de armar el calendario conviene saber qué entra en una sola venida. Esta es la separación real:",
   {"tabla": [["Procedimiento", "¿Una sola visita?", "Por qué"], [
     ["Valoración con radiografía", "Sí", "Se hace y se entrega el plan el mismo día"],
     ["Limpieza dental", "Sí", "No tiene fases"],
     ["Varias resinas del mismo lado", "Sí", "Se aprovecha la misma anestesia"],
     ["Extracción simple", "Sí, con control posterior", "El control puede coordinarse"],
     ["Endodoncia sin infección", "A veces", "Depende de cómo responda el diente"],
     ["Endodoncia con infección", "No", "Necesita medicación y una segunda sesión"],
     ["Corona", "No", "El laboratorio necesita días"],
     ["Implante", "No", "El hueso necesita meses"],
     ["Ortodoncia", "No", "Se ajusta cada 4 a 6 semanas"],
     ["Prótesis removible", "No", "Lleva pruebas intermedias"],
   ]]},
   "La columna del medio tiene tres respuestas y no dos a propósito. Ese «a veces» es el que se define mirando la radiografía, y por eso la valoración vale la pena aunque implique un viaje: sale de ahí sabiendo exactamente cuántas venidas te esperan.",

   {"h2": "Cómo agrupar procedimientos para bajar el número de viajes"},
   {"ol": [
     "<strong>Di de dónde vienes en la primera consulta.</strong> No es un dato social. Cambia cómo se arma el plan.",
     "<strong>Pide sesiones largas en vez de cortas.</strong> Dos horas bien usadas equivalen a tres viajes de cuarenta minutos.",
     "<strong>Junta lo que comparte anestesia.</strong> Todo lo que esté del mismo lado y arriba o abajo se puede trabajar seguido.",
     "<strong>Encadena la toma de impresión con otro procedimiento.</strong> Si igual tienes que venir a que te tomen medidas, que ese día se haga algo más.",
     "<strong>Haz coincidir el control con la siguiente fase.</strong> El retiro de puntos puede ser el mismo día que empieza lo siguiente si los tiempos calzan.",
     "<strong>Deja agendadas las tres próximas citas antes de irte.</strong> Con horarios que te sirvan, no los que queden libres el día que llames.",
   ]},
   f"Con ese ordenamiento, un plan que sobre el papel tenía nueve citas suele bajar a cinco o seis venidas reales. No se recorta el tratamiento; se recorta el desplazamiento. Y si estás decidiendo dónde atenderte, revisa qué especialidades hay bajo un mismo techo: repartir un caso entre {link(U_DENTISTA, 'una clínica en Otavalo')} y otra en Ibarra multiplica los viajes en vez de reducirlos.",

   {"h2": "Las esperas que no se pueden comprimir"},
   "Hay tres pausas que ninguna organización elimina, y conviene saberlo antes de armar expectativas:",
   {"ul": [
     f"<strong>La integración de un implante en el hueso.</strong> Tres a seis meses. No hay atajo. Está explicado en {link(U_IMPLANTES, 'la guía de implantes dentales')}.",
     "<strong>La fabricación en laboratorio.</strong> Una corona o unas carillas necesitan días de trabajo técnico fuera del consultorio.",
     "<strong>La cicatrización de la encía después de una cirugía.</strong> El tejido cierra a su ritmo y no acepta presión.",
   ]},
   "La buena noticia es que esas esperas son tiempo muerto, no tiempo de viaje. Durante los meses de integración de un implante no tienes que venir cada semana: son controles espaciados, y la mayoría se resuelven en quince minutos.",

   {"quote": "Tenemos pacientes que vienen desde Quito una vez al mes y terminan sus tratamientos completos. Lo que hacen distinto es simple: dejan las citas agendadas con anticipación y avisan antes de moverlas. El que llama el mismo día es el que termina abandonando.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "El tratamiento que más se abandona a la mitad"},
   f"La ortodoncia, por lejos. Necesita un control cada cuatro a seis semanas durante uno o dos años, y ese ritmo es el que castiga a quien vive lejos. Lo explicamos con detalle en {link(U_ORTO_DUR, 'cuánto dura un tratamiento de ortodoncia')}.",
   "Abandonarla no deja las cosas como estaban. Los dientes en movimiento siguen moviéndose sin control, y muchas veces terminan en una posición peor que la inicial. Retomar después de un año de ausencia casi siempre significa empezar de nuevo.",
   "Si sabes que no vas a poder sostener un control mensual, dilo antes de que te coloquen los brackets. Hay alternativas con controles más espaciados y hay casos donde conviene esperar a un momento de tu vida con más margen. Esa conversación honesta al principio ahorra un tratamiento fallido.",

   {"h2": "Cuándo NO conviene concentrar todo en un solo día"},
   "Agrupar tiene un límite y pasarlo es contraproducente:",
   {"ul": [
     "Después de una cirugía extensa no conviene manejar de vuelta a Ambato ni tomar un bus de tres horas. Las primeras horas son las de mayor sangrado.",
     "Cuatro horas seguidas en el sillón con la boca abierta dejan la articulación adolorida por días, y el trabajo de la última hora rara vez sale igual de bien.",
     "Si te van a extraer una pieza y colocar otra cosa el mismo día, alguien tiene que poder acompañarte de regreso.",
     "Con anestesia en los cuatro cuadrantes no vas a poder comer ni hablar bien durante horas. Si el viaje es largo, se reparte.",
   ]},
   "El punto medio suele ser sesiones de noventa minutos a dos horas, una o dos veces al mes. Rinde el viaje sin castigar el cuerpo.",

   {"h2": "Qué preguntar antes de agendar si vienes de lejos"},
   {"ol": [
     "¿Cuántas venidas reales necesito, no cuántas citas?",
     "¿Qué puedo juntar en la misma sesión y qué obliga a separar?",
     "¿Cuál es la espera mínima entre la cita A y la cita B?",
     "¿Qué pasa si tengo que mover una cita con dos días de aviso?",
     "¿Hay algo del control que se pueda resolver mandando una foto en lugar de venir?",
     "¿En qué punto del plan estaría si tengo que pausar tres meses?",
   ]},
   f"Esa última pregunta es la más útil de todas. Saber dónde puedes pausar sin dañar nada te da margen real, y evita la sensación de que abandonar es la única salida cuando la vida se complica. Los mismos criterios sirven para el {link(U_LIMPIEZA, 'mantenimiento preventivo')}, que es lo que te evita volver por urgencias.",

   {"faq": [
     ("¿Puedo empezar un tratamiento aquí y terminarlo en otra ciudad?",
      "Se puede, pero se complica. Cada profesional trabaja con sus criterios y sus materiales. Si es inevitable, pide tu historia clínica y las radiografías para llevarlas."),
     ("¿Hacen consultas por video?",
      "Un mensaje con fotos sirve para orientar y para decidir si el viaje vale la pena. El diagnóstico y cualquier procedimiento requieren verte en el sillón."),
     ("Vivo en Cotacachi, ¿atienden ahí?",
      "No. Tenemos un solo consultorio y está en Otavalo. Los pacientes de Cotacachi, Atuntaqui, Peguche y San Pablo vienen aquí, y por eso organizamos las citas pensando en el traslado."),
     ("¿Qué hago si tengo una urgencia y estoy lejos?",
      f"Escríbenos describiendo qué pasó. Hay medidas provisionales que se pueden indicar por mensaje mientras llegas, y están resumidas en {link(U_EMERG, 'la guía de emergencias dentales')}."),
   ]},
   f'¿Vives fuera y quieres saber en cuántos viajes se resuelve lo tuyo? <a href="{wa("Hola, vivo fuera de Otavalo y quiero organizar mi tratamiento en pocos viajes")}">Escríbenos por WhatsApp</a> contándonos de dónde vienes. Armamos el plan pensando en el traslado, además del sillón.',
 ]})


# ── 3 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cómo agendar tu cita dental por WhatsApp sin dar vueltas",
 "slug": "como-agendar-tu-cita-dental-por-whatsapp",
 "date": "2026-09-27T09:00:00",
 "cat": CAT["emergencias"],
 "tags": ["agendar cita", "WhatsApp", "primera consulta", "orientación"],
 "focus_kw": "agendar cita dental por whatsapp",
 "yoast_title": "Cómo agendar tu cita dental por WhatsApp",
 "yoast_desc": ("Que datos tener a mano, como describir un dolor para que te orienten bien "
                "y que se puede resolver por mensaje sin necesidad de ir hasta la clinica."),
 "excerpt": "Un mensaje bien escrito ahorra tres idas y vueltas. Qué contar, cómo describir un dolor y qué exige verte en el sillón.",
 "bloques": [
   "Casi todas las citas empiezan hoy con un mensaje. El problema es que la mayoría dice «buenas, quisiera información», y a partir de ahí vienen cinco preguntas de respuesta obligatoria antes de poder ayudarte de verdad.",
   "Con dos o tres frases más en ese primer mensaje, la conversación se resuelve de una. Esto es lo que conviene incluir y, sobre todo, cómo describir lo que te pasa para que del otro lado se entienda.",

   {"h2": "Los cinco datos del primer mensaje"},
   {"ol": [
     "<strong>Qué te pasa o qué quieres hacerte.</strong> «Me duele una muela de abajo del lado derecho» o «quiero una limpieza». Concreto.",
     "<strong>Desde cuándo.</strong> Tres días no es lo mismo que tres meses, y cambia la urgencia con la que se te busca espacio.",
     "<strong>Si hay hinchazón o fiebre.</strong> Es el dato que decide si se te atiende esta semana o cuando puedas.",
     "<strong>Tu disponibilidad real.</strong> «Puedo mañanas de martes a jueves» ahorra seis mensajes de tanteo.",
     "<strong>Si vienes de fuera de Otavalo.</strong> Quien viaja desde Cotacachi, Atuntaqui o Ibarra necesita un plan armado con menos venidas, y eso se decide desde el primer mensaje.",
   ]},
   "Con eso ya se puede proponer un horario y adelantarte qué esperar. Si además es tu primera vez en la clínica, dilo: hay cosas que conviene traer y es mejor saberlo antes de salir de casa.",

   {"h2": "Cómo describir un dolor para que te orienten bien"},
   "La descripción del dolor es información clínica, no un relato. Cambia mucho lo que se entiende según cómo lo cuentes:",
   {"tabla": [["En vez de decir", "Escribe esto", "Qué permite deducir"], [
     ["Me duele la muela", "Me duele al morder, en un punto exacto", "Puede haber fisura o ligamento inflamado"],
     ["Me duele con el frío", "Duele con el frío y pasa apenas trago", "Sensibilidad, muchas veces reversible"],
     ["Me duele mucho", "Duele solo y me despierta en la noche", "Compromiso del nervio, prioridad alta"],
     ["Tengo la encía mal", "Me sangra al cepillar hace dos semanas", "Encía inflamada, no urgencia"],
     ["Se me rompió un diente", "Se rompió un pedazo y está filo, sin dolor", "Se puede esperar unos días"],
     ["Estoy hinchado", "Tengo la mejilla hinchada y fiebre", "Infección activa, se atiende ya"],
   ]]},
   f"La diferencia entre «duele con el frío» y «duele solo por la noche» es enorme. La primera suele ser {link(U_SENSIB, 'sensibilidad dental')}; la segunda apunta a que el nervio está comprometido, y ahí conviene revisar {link(U_ENDO_URG, 'los síntomas que indican una endodoncia urgente')}.",

   {"h2": "Qué se puede resolver por mensaje y qué exige verte"},
   {"ul": [
     "<strong>Se resuelve por mensaje:</strong> agendar, reagendar, saber qué llevar, indicaciones después de una cirugía, dudas sobre un medicamento ya recetado, confirmar si algo que sientes es esperable en tu postoperatorio.",
     "<strong>Se orienta por mensaje, se define en el sillón:</strong> qué podría estar pasando, si conviene venir esta semana o la próxima, un rango de citas probable.",
     "<strong>Exige verte:</strong> cualquier diagnóstico, cualquier presupuesto cerrado, cualquier decisión entre dos tratamientos. Sin radiografía y sin revisar la boca, lo que se diga es una suposición con buena intención.",
   ]},
   "Esa última línea es la que más incomoda y la que más protege al paciente. Un precio dado por chat sin haberte revisado se cae en la primera cita, y esa corrección genera una desconfianza que se pudo evitar diciendo la verdad desde el principio.",

   {"quote": "Un mensaje que dice desde cuándo duele, si hay hinchazón y qué días puede venir, nos permite responder con un horario concreto en vez de con otra pregunta. Eso es lo que hace la diferencia, no la hora a la que escribas.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Las fotos que sirven y las que no"},
   "Una foto ayuda cuando cumple tres condiciones: luz directa sobre la zona, el labio apartado con el dedo, y el celular cerca pero enfocado. Sin luz, todo se ve igual de oscuro y no aporta nada.",
   {"ul": [
     "<strong>Sirve:</strong> una encía visiblemente inflamada, un diente fracturado, una corona que se salió, una llaga, un bracket suelto.",
     "<strong>No sirve:</strong> una foto de una muela del fondo, cualquier cosa que esté debajo de la encía, o un dolor sin nada visible.",
     "<strong>Sirve mucho:</strong> la foto de una radiografía anterior, aunque sea de otra clínica, apoyada sobre una pantalla blanca.",
   ]},
   "Si tienes una radiografía previa en el celular, mándala aunque tenga dos años. Comparar cómo estaba tu boca antes con cómo está ahora es información que no se consigue de otra forma.",
   "Un detalle práctico: manda las fotos como imagen, no como documento, y todas en el mismo mensaje. Cuando llegan sueltas a lo largo de media hora, se pierde cuál corresponde a qué diente y hay que preguntarlo otra vez.",
   "Y si la foto es de un bracket suelto o de una corona que se te salió, guarda la pieza. Muchas veces se recementa la misma y eso ahorra una cita entera. Tirar lo que se cayó es un error frecuente y difícil de deshacer.",

   {"h2": "Qué no conviene pedir por chat"},
   "Hay tres pedidos que aparecen seguido y que no se pueden atender responsablemente por mensaje: una receta de antibiótico sin haberte revisado, un diagnóstico a partir de una foto, y un presupuesto cerrado de un tratamiento largo.",
   "Los tres tienen el mismo problema de fondo. Un antibiótico mal indicado enmascara una infección que sigue avanzando; un diagnóstico por foto ignora todo lo que está bajo la encía; y un presupuesto sin radiografía es un número que se va a corregir en la primera cita.",

   {"h2": "Cuándo el mensaje no es el canal"},
   f"Hay situaciones donde escribir y esperar respuesta es perder tiempo valioso. Si tienes la cara hinchada de un lado, dificultad para tragar o abrir la boca, o un golpe que sacó un diente completo de su sitio, muévete hacia atención inmediata mientras avisas. Las medidas de primeros auxilios están en {link(U_EMERG, 'nuestra guía de emergencias dentales')}.",
   "Un diente que se salió entero por un golpe tiene una ventana de minutos, no de horas. Ese caso concreto no se maneja por chat: se guarda la pieza en leche o en suero, no se limpia con agua, y se busca atención de inmediato.",

   {"h2": "Qué pasa después de que mandas el mensaje"},
   {"ol": [
     "<strong>Se revisa lo que contaste</strong> y se clasifica según urgencia. Un caso con hinchazón entra antes que una limpieza de rutina.",
     "<strong>Se te propone un horario</strong> según lo que dijiste que te sirve.",
     "<strong>Se te dice qué llevar</strong> si es tu primera vez: radiografías previas y la lista de medicamentos que tomas.",
     "<strong>Se confirma la cita.</strong> Guarda la conversación; ahí queda el día y la hora acordados.",
     "<strong>Si algo cambia, avisas por el mismo chat.</strong> Mover una cita con anticipación libera el espacio para otro paciente y te mantiene la prioridad en la agenda.",
   ]},
   f"Si es tu primera consulta, el paso tres importa más de lo que parece. Y si lo que te frena para escribir no es la logística sino el nervio de sentarte en el sillón, dilo también: {link(U_MIEDO, 'la ansiedad al dentista')} se maneja mejor cuando el equipo lo sabe de antemano.",

   {"faq": [
     ("¿Me pueden dar el precio por WhatsApp?",
      "Se pueden dar valores referenciales de partida —una limpieza desde $25, una resina desde $30, una extracción simple desde $35—, pero el presupuesto real sale de la valoración, que no tiene costo."),
     ("¿Puedo mandar la radiografía que me tomaron en otro lado?",
      "Sí, y conviene. Una foto nítida de la placa o el archivo digital sirven para orientar mejor tu caso antes de la cita."),
     ("¿Tengo que llamar o basta con escribir?",
      "Escribir alcanza para agendar y para dudas. Para algo que no puede esperar, la llamada o venir directo es más seguro que quedarte esperando una respuesta."),
     ("¿Puedo agendar para otra persona?",
      "Sí. Manda el nombre de quien va a atenderse, su edad y qué le pasa. Si es un menor, tiene que venir acompañado por su representante."),
   ]},
   f'¿Listo para escribir? <a href="{wa("Hola, quiero agendar una cita. Les cuento que me pasa:")}">Abre el chat de WhatsApp</a> y cuéntanos qué te pasa, desde cuándo y qué días puedes venir. Con eso alcanza para proponerte un horario.',
 ]})


# ── 4 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Qué llevar a tu primera cita dental y qué conviene contar",
 "slug": "que-llevar-a-tu-primera-cita-dental",
 "date": "2026-09-29T09:00:00",
 "cat": CAT["emergencias"],
 "tags": ["primera cita", "historia clínica", "radiografías", "medicamentos"],
 "focus_kw": "qué llevar a la primera cita dental",
 "yoast_title": "Qué llevar a tu primera cita dental",
 "yoast_desc": ("Radiografias previas, lista de medicamentos y antecedentes medicos: que "
                "llevar a la primera cita y por que contar lo que da verguenza mejora el diagnostico."),
 "excerpt": "Lo que traes y lo que cuentas en la primera cita define el plan. Incluido eso que te da vergüenza y que en realidad cambia el diagnóstico.",
 "bloques": [
   "La primera cita no es un trámite. Es donde se define qué se te va a hacer, en qué orden y cuánto va a costar, y buena parte de esa decisión se apoya en información que solo tú tienes.",
   "Nada de lo que sigue es complicado de conseguir. Casi todo lo tienes en el celular o en un cajón de la casa, y llevarlo cambia la calidad de lo que sale de esa hora.",

   {"h2": "La lista corta de lo que hay que traer"},
   {"ul": [
     "<strong>Cédula.</strong> Para abrir tu historia clínica.",
     "<strong>Radiografías previas</strong>, aunque sean de otra clínica y tengan años. En papel, en CD o como foto en el celular.",
     "<strong>La lista de medicamentos que tomas</strong>, con dosis. Si es más fácil, trae las cajas o una foto de ellas.",
     "<strong>Informes médicos recientes</strong> si tienes alguna condición controlada por un especialista.",
     "<strong>El carné del seguro</strong>, si tienes cobertura odontológica.",
     "<strong>Tus preguntas anotadas.</strong> En el sillón se olvidan; en una nota del celular, no.",
   ]},
   "Si es la cita de un menor, tiene que venir con su representante, y conviene traer el carné de vacunas si hay alguna condición de por medio. Para adultos mayores que llegan acompañados, quien acompaña debería conocer la medicación.",
   "Un apunte para quien viaja: si vienes desde Ibarra, Cotacachi o Atuntaqui, avísalo al agendar. Con eso se reserva una cita más larga y se aprovecha para resolver en el mismo día lo que se pueda.",

   {"h2": "Las radiografías viejas valen más de lo que crees"},
   "Una radiografía de hace tres años no sirve para diagnosticar hoy, pero sirve para algo que ninguna placa nueva puede dar: comparación. Ver cómo estaba un hueso o una lesión hace tres años dice si el problema avanza rápido, lento o está detenido.",
   "Eso cambia decisiones concretas. Una caries que no creció en tres años se vigila; la misma imagen sin historial se trata de inmediato. Un nivel de hueso estable permite planificar distinto que uno que se está perdiendo.",
   f"También evita repetir estudios. Si trajiste una panorámica reciente, quizá no haga falta otra, y eso es una radiación menos y un gasto menos. En casos de {link(U_IMPLANTES, 'implantes dentales')} el historial radiográfico es especialmente valioso.",

   {"h2": "Los medicamentos y condiciones que cambian el plan"},
   "Esta es la parte que más se subestima. Hay tratamientos que se modifican, se posponen o se coordinan con tu médico según lo que estés tomando:",
   {"tabla": [["Qué tomas o tienes", "Por qué importa", "Qué se ajusta"], [
     ["Anticoagulantes", "Sangrado prolongado en extracciones", "Se coordina con tu médico antes de cualquier cirugía"],
     ["Bifosfonatos u osteoporosis", "Afectan la cicatrización del hueso", "Cambia el enfoque de extracciones e implantes"],
     ["Diabetes", "Cicatrización más lenta, más riesgo de infección", "Se controla la glucosa y se ajustan tiempos"],
     ["Hipertensión", "La anestesia con vasoconstrictor puede subir la presión", "Se elige otro tipo de anestesia"],
     ["Embarazo", "Hay procedimientos y fármacos que se posponen", "Se prioriza el segundo trimestre"],
     ["Alergias a antibióticos o anestesia", "Riesgo de reacción", "Se cambia el fármaco"],
     ["Tratamiento oncológico", "Afecta mucosa, saliva y defensas", "Se coordina todo con el oncólogo"],
     ["Válvula cardíaca o prótesis articular", "Riesgo de infección a distancia", "Puede requerir profilaxis antibiótica"],
   ]]},
   f"Los antihipertensivos y los antidepresivos, además, resecan la boca. Menos saliva es más caries y más molestias, y eso explica síntomas que el paciente no relaciona con su medicación. Si tienes dudas sobre el {link(U_EMBARAZO, 'cuidado dental durante el embarazo')}, ahí está el detalle de qué se puede y qué no.",

   {"quote": "Nos ha pasado tener a un paciente listo para una extracción y descubrir en la conversación que toma anticoagulantes desde hace un año. Nadie lo ocultó: simplemente no le pareció que tuviera que ver con los dientes. Sí tiene que ver, y mucho.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Lo que da vergüenza contar y aun así mejora el diagnóstico"},
   "Hay una lista de cosas que los pacientes callan por incomodidad y que son justamente las que explican lo que se ve en la boca. Contarlas no genera un juicio; genera un plan que funciona.",
   {"ul": [
     "<strong>Que hace años que no te cepillas dos veces al día.</strong> Se nota en la boca de todas formas. Decirlo permite empezar por lo básico en lugar de asumir una rutina que no existe.",
     f"<strong>Que fumas y cuánto.</strong> Cambia el pronóstico de encías, implantes y cicatrización. Está desarrollado en {link(U_TABACO, 'el impacto del tabaco en la salud bucal')}.",
     "<strong>Que te automedicaste.</strong> Tomar antibiótico por tu cuenta enmascara una infección y hace que la revisión de hoy muestre una imagen falsamente tranquila.",
     "<strong>Que abandonaste un tratamiento anterior.</strong> Saber por qué —costo, dolor, tiempo, distancia— permite armar uno que sí puedas terminar.",
     "<strong>Que te da miedo.</strong> No es un detalle de carácter, es un dato clínico que cambia el manejo de la cita.",
     "<strong>Que tomas mucha bebida azucarada o energizante.</strong> Explica desgaste y caries que de otro modo no cuadran.",
     "<strong>Que aprietas los dientes cuando estás tenso.</strong> Explica desgaste, fracturas y dolor de mandíbula al despertar.",
   ]},
   f"Ese último punto merece atención propia: mucha gente no sabe que aprieta hasta que alguien se lo señala. Los signos están descritos en {link(U_BRUXISMO, 'el artículo sobre bruxismo')}, y si te reconoces, cuéntalo en la primera cita.",
   f"Sobre el miedo, vale insistir. Un paciente que avisa recibe otra cita: más pausas, más explicación previa, sesiones más cortas. Las técnicas concretas están en {link(U_MIEDO, 'cómo superar la ansiedad al dentista')}.",

   {"h2": "Cómo transcurre esa primera hora"},
   {"ol": [
     "<strong>Historia clínica.</strong> Preguntas sobre salud general, medicación y antecedentes.",
     "<strong>Motivo de consulta.</strong> Qué te trajo, desde cuándo, qué te preocupa más.",
     "<strong>Revisión de la boca.</strong> Dientes, encías, mordida, articulación, tejidos blandos.",
     "<strong>Radiografía</strong> si hace falta, o revisión de la que trajiste.",
     "<strong>Explicación del hallazgo</strong> con la imagen a la vista.",
     "<strong>Plan y presupuesto</strong> con fases, número de citas y prioridades.",
   ]},
   "Sales de ahí con un documento, no con una idea general. Si no te lo ofrecen, pídelo: un plan por escrito es lo que te permite comparar, consultar en casa y decidir sin presión.",

   {"h2": "Cuándo esta no es la cita que necesitas"},
   f"Si tienes la cara hinchada, fiebre o un dolor que no te deja dormir, lo tuyo no es una valoración de rutina: es una urgencia y se maneja distinto. Avísalo al escribir para que se te atienda como corresponde, y revisa mientras tanto {link(U_EMERG, 'qué hacer ante una emergencia dental')}.",
   f"Tampoco tiene mucho sentido venir solo a preguntar precios sin dejarte revisar. El presupuesto sale del diagnóstico. Y si lo que buscas es entender cada cuánto deberías controlarte cuando todo está bien, eso está en {link(U_CADA_CTO, 'la guía de frecuencia de controles')}.",

   {"faq": [
     ("¿Tengo que ir en ayunas?",
      "No. Come normal antes de venir, sobre todo si vas a recibir anestesia. Llegar en ayunas aumenta la probabilidad de marearte en el sillón."),
     ("¿Y si no tengo ninguna radiografía?",
      "No es un problema. Se toma en la clínica. Traerla solo ahorra tiempo y permite comparar."),
     ("¿Puedo ir si estoy con la regla o resfriado?",
      "Con la regla sí, sin ningún inconveniente. Con un resfriado fuerte y la nariz tapada conviene reagendar: estar una hora con la boca abierta se vuelve incómodo."),
     ("¿Me van a hacer algo el mismo día?",
      "Depende del hallazgo y de tu tiempo. Una limpieza suele poder hacerse el mismo día. Un tratamiento más largo se agenda con el plan ya definido."),
   ]},
   f'¿Agendamos tu primera valoración? <a href="{wa("Hola, quiero agendar mi primera cita. Que necesito llevar?")}">Escríbenos por WhatsApp</a> y te confirmamos qué traer según tu caso. La valoración en nuestro consultorio de Otavalo no tiene costo.',
 ]})


# ── 5 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Señales tempranas de problemas dentales, antes del dolor",
 "slug": "senales-tempranas-de-problemas-dentales",
 "date": "2026-10-01T09:00:00",
 "cat": CAT["prevencion"],
 "tags": ["señales tempranas", "prevención", "sangrado de encías", "detección"],
 "focus_kw": "señales tempranas de problemas dentales",
 "yoast_title": "Señales de problemas dentales antes del dolor",
 "yoast_desc": ("Sangrado al cepillar, sensibilidad puntual, mal sabor y un diente que se "
                "siente raro al morder: que significa cada senal y cuanto margen tienes."),
 "excerpt": "El dolor llega tarde. Estas son las señales pequeñas que aparecen meses antes y que casi todo el mundo deja pasar.",
 "bloques": [
   "Cuando un diente duele de verdad, el problema lleva meses instalado. El dolor no es el aviso: es el momento en que se acabaron los avisos y el cuerpo sube el volumen.",
   "Lo interesante es lo que pasa antes. Hay una serie de señales pequeñas, poco espectaculares y fáciles de normalizar que aparecen mucho antes, y que abren una ventana donde todo se resuelve con procedimientos simples.",

   {"h2": "Por qué el diente avisa tarde"},
   "El esmalte no tiene nervios. Una caries puede atravesarlo entero sin producir ninguna molestia, porque literalmente no hay quién la reporte. Recién cuando llega a la dentina empiezan las señales, y cuando alcanza la pulpa aparece el dolor.",
   "Con las encías pasa algo parecido por otro motivo. La inflamación crónica no duele: molesta poco, sangra un poco y se acostumbra uno. Se puede perder hueso de soporte durante años sin un solo episodio doloroso, y el primer síntoma llamativo llega a ser un diente flojo.",
   "De ahí que la habilidad útil no sea aguantar el dolor, sino reconocer lo que pasa antes. La lista que sigue es esa.",

   {"h2": "Las señales que aparecen antes del dolor"},
   {"tabla": [["Señal", "Qué suele estar pasando", "Cuánto margen tienes"], [
     ["Sangrado al cepillar", "Encía inflamada por placa acumulada", "Semanas; es reversible al principio"],
     ["Sensibilidad en un solo diente", "Fisura, filtración o retracción localizada", "Semanas, y conviene no esperar"],
     ["Mal sabor en un punto fijo", "Restos atrapados o una filtración", "Días a semanas"],
     ["Diente que se siente raro al morder", "Contacto alto, fisura o ligamento irritado", "Días; es de las más ignoradas"],
     ["El hilo se deshilacha siempre en el mismo sitio", "Un borde roto o una calza filtrada", "Semanas"],
     ["Comida que se atasca donde antes no", "Cambió un punto de contacto", "Semanas"],
     ["El diente se ve más largo", "Retracción de encía y raíz expuesta", "Meses, pero no se revierte solo"],
     ["Mandíbula cansada al despertar", "Apretamiento nocturno", "Meses de desgaste acumulado"],
     ["Encía blanquecina o abultada", "Reacción local o fístula incipiente", "Consulta esa semana"],
     ["Mancha oscura en un surco", "Caries iniciando", "Meses si no llegó a la dentina"],
   ]]},
   "La columna de la derecha no es una autorización para esperar. Es una escala de urgencia relativa: todo lo de esa lista termina en el sillón, y la única variable es si llegas cuando alcanza una resina o cuando ya hace falta algo más grande.",

   {"h2": "Las tres que más se normalizan"},
   {"h3": "«Es normal que sangre un poco»"},
   f"No lo es. Una encía sana no sangra al cepillarse, igual que una piel sana no sangra al lavarse. El sangrado es el primer signo de gingivitis, que en esa etapa se revierte con una limpieza y una técnica de cepillado corregida. Si se deja avanzar, pasa a periodontitis y ahí ya se pierde hueso. La diferencia entre las dos está explicada en {link(U_GINGI, 'gingivitis y periodontitis')}.",
   {"h3": "«Me duele con el frío pero se me pasa»"},
   f"La clave está en si es generalizado o en un solo punto. Si varios dientes reaccionan al frío y calma rápido, suele ser {link(U_SENSIB, 'sensibilidad dental')} y se maneja con pasta específica y revisión de la técnica. Si es un solo diente el que reacciona, y cada vez tarda más en calmar, ese diente tiene algo concreto y hay que mirarlo.",
   {"h3": "«Se siente raro pero no duele»"},
   "Esta es la señal que más veces oímos justo antes de un diagnóstico serio. La sensación de que una pieza «está distinta» al morder viene de un cambio real: una fisura que se abre al masticar, un contacto que quedó alto, un ligamento irritado. El paciente no sabe describirlo mejor porque todavía no duele, y tiene razón en sospechar.",

   {"h2": "La revisión de sesenta segundos frente al espejo"},
   "Una vez al mes, con buena luz de día, dedica un minuto a esto. Da igual si estás en Otavalo, en Cotacachi o de viaje: lo único que hace falta es un espejo y un poco de hilo dental.",
   "Este es el orden:",
   {"ol": [
     "<strong>Mira el color de la encía.</strong> Rosada y firme está bien. Roja, brillante o hinchada en el borde, no.",
     "<strong>Pasa el hilo entre todos los dientes.</strong> Anota si sangra en algún punto y si se deshilacha siempre en el mismo lugar.",
     "<strong>Levanta el labio y compara los cuellos de los dientes.</strong> Si uno se ve más largo que su simétrico, hay retracción.",
     "<strong>Muerde despacio y luego con fuerza.</strong> Cualquier pieza que responda distinto merece atención.",
     "<strong>Huele el hilo después de usarlo.</strong> Un olor localizado en un punto siempre significa algo.",
     "<strong>Recorre la lengua por el borde de tus calzas antiguas.</strong> Si notas un escalón o un filo, esa calza está fallando.",
   ]},
   f"Ese quinto punto sorprende, pero es de los más fiables. Un olor concentrado en un solo espacio apunta a un problema local, distinto de la halitosis general que tratamos en {link(U_ALIENTO, 'el artículo sobre mal aliento')}.",

   {"quote": "La frase que más escuchamos antes de una endodoncia es «hace meses lo sentía raro pero no me dolía». Esa sensación rara es información. Cuando llega a doler, las opciones ya son menos y más caras.",
    "cite": "Equipo clínico de Odontología Life"},

   {"h2": "Qué cuesta llegar temprano y qué cuesta llegar tarde"},
   "La diferencia no es solo clínica, también es económica y de tiempo:",
   {"ul": [
     "<strong>Mancha detectada a tiempo:</strong> una resina, una cita, desde $30.",
     "<strong>Encía sangrante en etapa inicial:</strong> una limpieza, una cita, desde $25.",
     "<strong>La misma caries un año después:</strong> endodoncia más corona, varias citas y varias semanas.",
     "<strong>La misma encía tres años después:</strong> tratamiento periodontal con varias sesiones y mantenimiento de por vida.",
   ]},
   REFERENCIAL,
   f"Ese salto entre una línea y la siguiente es todo el argumento de la prevención. Si te interesa el detalle de qué material se usa en cada caso, está en {link(U_CALZA, 'la guía de calzas y resinas')}.",

   {"h2": "Cuándo esto ya no aplica"},
   f"Este artículo trata de lo que pasa antes del dolor. Si ya tienes dolor pulsátil, la cara hinchada, fiebre o un diente que se movió después de un golpe, saltaste esa etapa y lo tuyo se maneja como urgencia. Ve directo a {link(U_EMERG, 'qué hacer ante una emergencia dental')} y busca atención el mismo día.",
   f"Tampoco aplica si el dolor te despierta en la noche o aparece sin que nada lo provoque. Esa es la firma de un nervio comprometido y está descrita en {link(U_ENDO_URG, 'los síntomas de una endodoncia urgente')}. En ese punto la conversación ya no es sobre detectar temprano.",
   "Y una aclaración honesta: esta autoexploración no reemplaza la revisión profesional. Detecta lo que se ve y lo que se siente. Lo que ocurre entre dos muelas o debajo del hueso solo aparece en una radiografía.",

   {"faq": [
     ("Si no me duele nada, ¿igual tengo que revisarme?",
      f"Sí. Casi todo lo grave empieza sin dolor. La frecuencia recomendada según tu caso está en {link(U_CADA_CTO, 'esta guía de controles')}."),
     ("¿El sangrado al cepillar se quita cepillando más fuerte?",
      "No. Cepillar más fuerte empeora la retracción de la encía. Lo que resuelve es limpiar bien el borde de la encía y usar hilo todos los días."),
     ("¿Una mancha oscura siempre es caries?",
      "No siempre. Puede ser pigmentación por café, té o tabaco. La forma de distinguirlas es la textura: la caries se siente blanda al explorarla, la mancha no."),
     ("Mis dientes se mueven un poquito, ¿es normal?",
      f"Un diente adulto no debería moverse de forma perceptible. Si lo hace, casi siempre hay pérdida de soporte y conviene revisar {link(U_PERIO, 'el estado de tus encías')} cuanto antes."),
   ]},
   f'¿Reconociste alguna de estas señales? <a href="{wa("Hola, note una senal temprana y quiero que me revisen")}">Escríbenos por WhatsApp</a> contándonos cuál. La valoración en Otavalo no tiene costo, y en esta etapa suele resolverse con una sola cita.',
 ]})


if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        t, d = s["yoast_title"], s["yoast_desc"]
        print(f"  {pal:>5} pal · title {len(t):>2} · desc {len(d):>3} · {ruta.split('/')[-1]}")
