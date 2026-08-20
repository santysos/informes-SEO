#!/usr/bin/env python3
"""Bloque B (cierre) · seguros, posts 11 y 12."""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

GUI = CAT["guias"]
FIN = CAT["financiamiento"]
U_SEGURO = post_url(GUI, "seguro-auto-usado-ecuador-precio")
U_TERCEROS = post_url(GUI, "seguro-danos-a-terceros-auto")
U_ANTIGUEDAD = post_url(GUI, "asegurar-auto-usado-antiguo-requisitos")
U_ENTRADA = post_url(FIN, "cuanto-entrada-auto-usado-ecuador")

POSTS = []

# ── 11 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "¿Se puede asegurar un auto viejo? Requisitos y límites de antigüedad",
 "slug": "asegurar-auto-usado-antiguo-requisitos",
 "date": "2026-09-23T09:00:00",
 "cat": GUI,
 "tags": ["seguro vehicular", "auto antiguo", "requisitos", "inspección"],
 "focus_kw": "asegurar auto viejo ecuador",
 "yoast_title": "¿Se puede asegurar un auto viejo? Límites y requisitos",
 "yoast_desc": "Hasta que antiguedad aceptan las aseguradoras en Ecuador, que pasa con autos de mas de 15 anios y que alternativas quedan cuando te dicen que no.",
 "excerpt": "Las aseguradoras ponen topes de antigüedad, pero no son iguales en todas ni tan rígidos como se cree. Qué esperar según los años del vehículo.",
 "bloques": [
   "Es una de las preguntas más frecuentes de quien compra un seminuevo con varios años encima: «¿me lo van a asegurar?». La respuesta corta es que sí, hasta cierto punto, y que ese punto varía bastante entre aseguradoras.",
   "Aquí va cómo funcionan los límites de antigüedad en Ecuador, qué se pide para un auto con años y qué hacer cuando la respuesta es negativa.",

   {"h2": "Los rangos habituales"},
   {"tabla": [["Antigüedad del vehículo", "Qué esperar"], [
     ["Hasta 5 años", "Todo riesgo sin inconvenientes, prima estándar"],
     ["6 a 10 años", "Todo riesgo con inspección previa"],
     ["11 a 15 años", "Depende de la aseguradora; a veces con recargo o cobertura limitada"],
     ["16 a 20 años", "Pocas opciones de todo riesgo; responsabilidad civil sí"],
     ["Más de 20 años", "Prácticamente solo responsabilidad civil"],
   ]]},
   "El límite típico para todo riesgo ronda los 15 años, pero no es una norma legal sino una política de cada compañía. Vale cotizar en varias antes de asumir que no hay opción.",
   "Hay además una distinción que cambia el resultado: no es lo mismo asegurar por primera vez un auto de 14 años que renovar una póliza que viene corriendo desde que tenía 6. En el segundo caso muchas compañías mantienen la cobertura pasado el tope, y es una de las razones para no dejar caer una póliza vigente.",

   {"h2": "Por qué ponen límites"},
   "No es capricho. Un vehículo con muchos años concentra tres problemas para la aseguradora:",
   {"ul": [
     "<strong>Repuestos difíciles.</strong> Si el modelo salió de circulación, conseguir partes originales encarece y demora cada reparación.",
     "<strong>Mayor probabilidad de falla.</strong> Componentes desgastados generan más siniestros, aunque no todos sean cubiertos.",
     "<strong>Valor difícil de establecer.</strong> El mercado de un auto de 18 años es irregular y eso complica fijar el valor asegurado.",
   ]},
   "A eso se suma un factor práctico: en muchos casos el costo de reparar supera el valor del vehículo, lo que convierte casi cualquier siniestro en pérdida total.",

   {"h2": "Qué piden para asegurar un auto con años"},
   {"ol": [
     "<strong>Inspección física previa.</strong> Un perito revisa el estado real y toma fotos de todas las vistas. Es el requisito central.",
     "<strong>Matrícula vigente</strong> y revisión técnica al día.",
     "<strong>Fotos del vehículo</strong> en buen estado de limpieza, con el kilometraje visible.",
     "<strong>Declaración de daños preexistentes.</strong> Los golpes previos se registran y quedan excluidos.",
     "<strong>A veces, dispositivo de rastreo</strong>, sobre todo en modelos con alto índice de robo.",
   ]},
   "La inspección es donde se define todo. Un auto de 12 años bien mantenido puede recibir mejores condiciones que uno de 8 descuidado. La antigüedad abre o cierra la puerta; el estado decide el precio.",

   {"quote": "Los autos que salen de nuestro patio pasan revisión antes de entregarse, y eso ayuda en la inspección de la aseguradora. No es lo mismo llegar con un vehículo alistado que con uno comprado a un particular sin saber qué tiene por dentro.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cómo se asegura un auto con años, en la práctica"},
   "El proceso tiene un orden que conviene respetar, porque hacerlo al revés termina en cotizaciones que después no se pueden emitir.",
   {"ol": [
     "<strong>Averigua el tope de antigüedad</strong> de cada aseguradora antes de pedir cotización. Es una pregunta de un minuto por teléfono.",
     "<strong>Pide la cotización</strong> con los datos exactos: modelo, año, versión, kilometraje y valor comercial estimado.",
     "<strong>Agenda la inspección</strong> con el vehículo limpio y en buen estado de presentación.",
     "<strong>Revisa el acta de inspección</strong> antes de firmarla, porque ahí quedan los daños excluidos.",
     "<strong>Confirma el valor asegurado</strong> por escrito antes de pagar la primera prima.",
   ]},
   "El cuarto punto es el que más problemas evita. Si el perito anotó un golpe en la puerta trasera, esa puerta queda fuera de cobertura. Si crees que la observación es incorrecta, es el momento de discutirlo, no después de un siniestro.",

   {"h2": "Si la respuesta es no"},
   "Que una compañía rechace no significa que todas lo hagan. Antes de resignarse, vale recorrer estas opciones en orden:",
   {"ul": [
     "<strong>Cotizar en tres o cuatro aseguradoras más.</strong> Los topes de antigüedad difieren de forma notable.",
     "<strong>Consultar con brókers.</strong> Trabajan con varias compañías y conocen cuál acepta qué.",
     "<strong>Optar por responsabilidad civil.</strong> Casi no tiene límite de antigüedad y protege lo que más expuesto está: tu patrimonio frente a terceros.",
     "<strong>Revisar coberturas parciales</strong>, como robo total únicamente, que algunas compañías ofrecen para vehículos con años.",
   ]},
   f"Si terminas en responsabilidad civil, conviene entender bien qué cubre y qué no antes de contratar: lo explicamos en {link(U_TERCEROS, 'seguro contra daños a terceros')}.",

   {"h2": "La antigüedad también afecta el crédito"},
   "Hay un punto conectado que conviene tener presente si el auto lo vas a financiar: las entidades aplican sus propios topes de antigüedad, y suelen ser más estrictos que los de las aseguradoras.",
   {"tabla": [["Antigüedad al terminar de pagar", "Qué suele pasar"], [
     ["Menos de 10 años", "Financiamiento sin restricciones"],
     ["10 a 15 años", "Plazos más cortos y entrada mayor"],
     ["Más de 15 años", "Muy pocas entidades financian"],
   ]]},
   "Fíjate que el cálculo se hace sobre la antigüedad al final del crédito, no al inicio. Un auto de 12 años financiado a 4 años termina con 16, y ahí varias entidades ya dicen que no.",
   f"Por eso la antigüedad del vehículo termina definiendo también cuánta entrada vas a necesitar. El detalle de esos porcentajes está en {link(U_ENTRADA, 'cuánto de entrada necesitas para un auto usado')}.",

   {"h2": "El cálculo que conviene hacer"},
   "Con un auto de valor bajo, el todo riesgo pierde sentido económico rápido. Si el vehículo vale $5.000 y la prima con recargo por antigüedad sale en $450, estás pagando casi el 9 % del valor cada año.",
   "En ese escenario suele ser mejor contratar responsabilidad civil con buen tope —$150 a $250 al año— y guardar la diferencia en un fondo propio para reparaciones. Es lo que hace bastante gente con vehículos de trabajo antiguos en la zona de Ibarra y Otavalo.",
   f"Con todo, si estás comprando y la antigüedad te preocupa, quizá la respuesta esté en elegir otro vehículo. En el {link(LISTADO, 'listado del patio')} hay opciones recientes desde $20.500 que no tienen ningún problema de asegurabilidad, y otras más económicas donde este cálculo aplica de lleno.",
   "La regla práctica para decidir: si el auto tiene menos de 10 años, asegúralo todo riesgo sin pensarlo mucho. Entre 10 y 15, haz el cálculo del porcentaje. Sobre 15, ve directo a responsabilidad civil con buen tope y guarda la diferencia.",
   {"faq": [
     ("¿Cuál es el límite legal de antigüedad para asegurar en Ecuador?",
      "No existe un límite legal. Cada aseguradora define su política, y por eso conviene cotizar en varias."),
     ("¿Puedo mantener la póliza si el auto cumple el tope estando asegurado?",
      "Muchas compañías permiten renovar aunque el vehículo supere el tope, siempre que la póliza haya sido continua y sin siniestros graves."),
     ("¿La inspección tiene costo?",
      "Normalmente no, la asume la aseguradora como parte del proceso de emisión."),
     ("¿Un auto importado con años es más difícil de asegurar?",
      "Sí, sobre todo si los repuestos no se consiguen localmente. Ese es uno de los factores que más pesa."),
   ]},
   f'¿Te preocupa asegurar el auto que estás mirando? <a href="{wa("Hola, quiero saber si el auto que me interesa se puede asegurar")}">Escríbenos por WhatsApp</a> con el modelo y el año, y te decimos qué esperar antes de que avances con la compra.',
 ]})

# ── 12 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Seguro y viajes interprovinciales: lo que hay que revisar antes de salir",
 "slug": "seguro-auto-viajes-interprovinciales",
 "date": "2026-09-25T09:00:00",
 "cat": GUI,
 "tags": ["seguro vehicular", "viajes", "asistencia en carretera", "grúa"],
 "focus_kw": "seguro auto viajes interprovinciales",
 "yoast_title": "Seguro para viajes interprovinciales: qué revisar",
 "yoast_desc": "Asistencia en carretera, radio de gruas y coberturas que fallan justo en viaje. Que revisar en tu poliza antes de salir de Imbabura por carretera.",
 "excerpt": "La cobertura es nacional, pero la asistencia no siempre. Qué revisar en tu póliza antes de un viaje largo por carretera.",
 "bloques": [
   "Vivir en el norte del país significa manejar en carretera con frecuencia: Quito por trabajo, la costa por vacaciones, Tulcán por trámites o comercio. Y es justo ahí donde las diferencias entre pólizas se notan.",
   "La cobertura de daños es nacional en cualquier seguro serio. Lo que cambia —y mucho— es la asistencia: qué pasa cuando te quedas varado a 200 kilómetros de casa.",

   {"h2": "La diferencia entre cobertura y asistencia"},
   "Vale separar dos cosas que suelen confundirse porque vienen en el mismo contrato.",
   "La <strong>cobertura</strong> es lo que la aseguradora paga si el auto se daña: choque, robo, responsabilidad frente a terceros. Esa parte funciona igual en Ibarra que en Manta, sin distinción geográfica.",
   "La <strong>asistencia</strong> es el servicio operativo: grúa, auxilio mecánico, cerrajería, hospedaje. Y esa sí tiene condiciones territoriales, límites de kilómetros y cantidad de usos anuales.",
   "Cuando alguien dice «mi seguro no me cubrió en el viaje», casi siempre se refiere a la asistencia, no a la cobertura. Por eso los cuatro puntos que siguen son los que de verdad hay que revisar antes de salir.",

   {"h2": "Los cuatro puntos que hay que revisar"},
   {"h3": "1. El radio de la grúa"},
   "Es el punto más importante y el que menos se lee. Muchas pólizas cubren remolque solo dentro de un radio determinado desde la ciudad donde está registrado el vehículo, o hasta cierta cantidad de kilómetros por evento.",
   "Si tu póliza cubre 50 km y te quedas varado camino a Esmeraldas, el resto lo pagas tú. Y la grúa en carretera abierta no es barata.",
   {"h3": "2. Cuántos eventos al año"},
   "La asistencia suele tener un límite anual de usos: dos, tres o cuatro eventos según el plan. Conviene saber el número antes de gastarlo en cosas menores como un paso de corriente.",
   {"h3": "3. Qué incluye además del remolque"},
   {"ul": [
     "Cambio de llanta en sitio.",
     "Paso de corriente si la batería falla.",
     "Envío de combustible si te quedas sin gasolina.",
     "Cerrajería si dejaste las llaves adentro.",
     "Hospedaje o transporte alternativo si el vehículo queda inmovilizado lejos.",
   ]},
   "Ese último punto es el que más se agradece en un viaje familiar y el que menos pólizas incluyen. Vale preguntarlo específicamente.",
   {"h3": "4. Los tiempos de respuesta"},
   "Una cosa es la asistencia en Quito o Guayaquil y otra en una vía secundaria de la sierra norte. Pregunta por la cobertura efectiva en rutas de montaña, porque en la práctica los tiempos se estiran.",

   {"quote": "A la gente le vendemos autos para toda la provincia y más allá: Tulcán, Cayambe, la costa. Lo que siempre les decimos es que revisen la letra de la asistencia, no la del seguro. En viaje, lo que te salva el día es la grúa, no la cobertura de choque.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Qué hacer si tienes un accidente lejos de casa"},
   "El procedimiento cambia respecto a un siniestro en tu ciudad, y saberlo de antemano ahorra horas.",
   {"ol": [
     "<strong>Llama primero a la aseguradora</strong>, incluso antes de mover el vehículo. Ellos coordinan perito y grúa desde el inicio.",
     "<strong>Pide el número de siniestro</strong> y anótalo. Todo el trámite posterior gira alrededor de ese número.",
     "<strong>Espera el parte policial</strong>, que en carretera puede demorar más que en ciudad.",
     "<strong>Documenta todo con fotos</strong>: posición de los vehículos, señalización de la vía, condiciones del clima.",
     "<strong>Pregunta a dónde llevan el auto</strong> y si el taller asignado está en esa provincia o en la tuya.",
   ]},
   "Ese último punto define cuánto vas a tardar en recuperar el vehículo. Si lo remolcan a un taller de otra provincia, coordinar la reparación a distancia añade semanas al proceso.",

   {"h2": "Lo que no cubre ninguna póliza en viaje"},
   {"ul": [
     "<strong>Fallas por mantenimiento vencido.</strong> Si reventó la correa a los 140.000 km sin cambiarla, es tuyo.",
     "<strong>Llantas en mal estado.</strong> Un reventón por desgaste no es un siniestro cubierto.",
     "<strong>Sobrecarga.</strong> Viajar con el vehículo cargado por encima de su capacidad puede invalidar el reclamo.",
     "<strong>Conducir con licencia caducada</strong>, aunque el accidente no haya sido tu culpa.",
     "<strong>Salir del país</strong> sin cobertura internacional contratada, algo relevante si cruzas a Colombia por Tulcán.",
   ]},
   "Ese último punto merece atención en el norte. Cruzar a Ipiales es cosa de todos los días para mucha gente de Carchi e Imbabura, y la mayoría de pólizas ecuatorianas no cubren fuera del territorio nacional. Existe cobertura adicional para eso y hay que contratarla aparte.",

   {"h2": "Las rutas del norte y lo que cada una exige"},
   "No todos los viajes ponen a prueba lo mismo. Vale mirar la póliza pensando en la ruta que realmente vas a hacer.",
   {"tabla": [["Ruta desde Ibarra", "Lo que más importa"], [
     ["A Quito por la Panamericana", "Cobertura de choque; hay tráfico pesado y la asistencia responde rápido"],
     ["A Tulcán y la frontera", "Cobertura internacional si cruzas; radio de grúa amplio"],
     ["A la costa por Calacalí o Santo Domingo", "Frenos, asistencia en montaña y hospedaje si el auto queda inmovilizado"],
     ["A Intag o vías secundarias", "Asistencia en zonas rurales y tiempos de respuesta reales"],
   ]]},
   "La última fila es la que más se subestima. En vías de segundo orden, la diferencia entre una asistencia buena y una mediocre puede ser de horas de espera con la familia adentro del auto.",

   {"h2": "La revisión previa que evita el 80 % de los problemas"},
   "Antes de un viaje largo, media hora de revisión ahorra el mal rato completo:",
   {"ol": [
     "<strong>Llantas:</strong> presión, profundidad de labrado y estado de la de repuesto, que casi nadie mira.",
     "<strong>Niveles:</strong> aceite, refrigerante, líquido de frenos.",
     "<strong>Frenos:</strong> especialmente si el viaje incluye bajadas largas como las de la vía a la costa.",
     "<strong>Luces:</strong> todas, incluidas las de freno y las direccionales.",
     "<strong>Batería:</strong> si ya tiene tres o cuatro años, revísala antes en lugar de descubrirlo en la vía.",
     "<strong>Documentos:</strong> matrícula, licencia y datos de contacto de tu aseguradora en el celular.",
   ]},
   f"Los vehículos que salen del {link(LISTADO, 'patio')} van con revisión mecánica hecha, pero eso no reemplaza el chequeo antes de cada viaje largo, sobre todo si el auto ya lleva meses contigo.",
   f"Y si todavía estás definiendo qué póliza contratar, el panorama completo de coberturas y precios está en {link(U_SEGURO, 'seguro para auto usado en Ecuador')}.",
   {"faq": [
     ("¿Mi seguro ecuatoriano cubre en Colombia?",
      "Por defecto no. Hay que contratar cobertura internacional específica, algo a considerar si viajas seguido por el paso de Tulcán."),
     ("¿La grúa me lleva hasta mi ciudad o hasta el taller más cercano?",
      "Depende de la póliza. Muchas cubren solo hasta el taller más cercano, y el traslado adicional corre por tu cuenta."),
     ("¿La asistencia funciona de noche y en feriados?",
      "Las líneas son 24/7, pero los tiempos de llegada en zonas rurales y en feriados largos se extienden bastante."),
     ("¿Conviene contratar asistencia aparte?",
      "Si viajas con mucha frecuencia por carretera, un plan de asistencia independiente puede complementar bien una póliza básica."),
   ]},
   f'¿Vas a comprar un auto para viajar seguido? <a href="{wa("Hola, busco un auto para viajes por carretera, quiero asesoria")}">Escríbenos por WhatsApp</a> y te ayudamos a elegir según la ruta que vas a hacer. No es lo mismo un auto para ciudad que uno para subir y bajar a la costa cada mes.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
