#!/usr/bin/env python3
"""Bloque B · seguros, posts 9 a 12.

Cluster con ~500 impresiones sin capturar en Search Console y el sitio
en posiciones 11 a 26.
"""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

GUI = CAT["guias"]
FIN = CAT["financiamiento"]
U_CUOTA = post_url(FIN, "cuota-mensual-auto-usado-calculo")
U_DIRECTO = post_url(FIN, "credito-directo-auto-usado-ecuador")
U_SEGURO = post_url(GUI, "seguro-auto-usado-ecuador-precio")
U_TERCEROS = post_url(GUI, "seguro-danos-a-terceros-auto")
U_ANTIGUEDAD = post_url(GUI, "asegurar-auto-usado-antiguo-requisitos")
U_VIAJES = post_url(GUI, "seguro-auto-viajes-interprovinciales")

POSTS = []

# ── 9 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Seguro para auto usado en Ecuador: qué cubre y cuánto cuesta",
 "slug": "seguro-auto-usado-ecuador-precio",
 "date": "2026-09-18T09:00:00",
 "cat": GUI,
 "tags": ["seguro vehicular", "auto usado", "precios", "todo riesgo"],
 "focus_kw": "seguro para auto usado ecuador",
 "yoast_title": "Seguro para auto usado en Ecuador: qué cubre y precio",
 "yoast_desc": "Cuanto cuesta asegurar un seminuevo en Ecuador, que cubre una poliza todo riesgo, que la encarece y en que casos conviene el seguro a terceros.",
 "excerpt": "Cuánto cuesta asegurar un seminuevo, qué entra y qué no en una póliza todo riesgo, y qué variables hacen que dos autos parecidos paguen distinto.",
 "bloques": [
   "Después de la cuota, el seguro es el gasto que más sorprende a quien compra su primer auto. Y también el que más se subestima, porque suele cotizarse recién cuando el vehículo ya está comprado.",
   "Aquí va lo que cubre una póliza en Ecuador, cuánto cuesta en la práctica para un seminuevo y qué mueve ese precio hacia arriba o hacia abajo.",

   {"h2": "Cuánto cuesta, en cifras"},
   "El seguro todo riesgo en Ecuador se cotiza como un porcentaje del valor asegurado del vehículo. Los rangos habituales para un seminuevo:",
   {"tabla": [["Valor del vehículo", "Prima anual aproximada", "Al mes"], [
     ["$10.000", "$400 – $600", "$33 – $50"],
     ["$15.000", "$550 – $800", "$46 – $67"],
     ["$20.000", "$700 – $1.000", "$58 – $83"],
     ["$30.000", "$1.000 – $1.500", "$83 – $125"],
   ]]},
   "Son rangos referenciales: la cifra final depende de la aseguradora, de tu perfil como conductor y del modelo. Como regla mental, entre 3,5 % y 5 % del valor del auto al año funciona bien para estimar.",

   {"h2": "Qué cubre una póliza todo riesgo"},
   {"ul": [
     "<strong>Daños propios</strong> por choque, volcamiento o incendio.",
     "<strong>Robo total</strong> del vehículo, y en algunas pólizas robo parcial de partes.",
     "<strong>Responsabilidad civil</strong> por daños a terceros: sus vehículos, sus bienes y sus personas.",
     "<strong>Eventos de la naturaleza</strong> como inundación, granizo o caída de árboles.",
     "<strong>Asistencia</strong>: grúa, auxilio mecánico, cambio de llanta, paso de corriente.",
     "<strong>Defensa legal</strong> en el proceso derivado de un siniestro.",
   ]},
   "Lo que casi nunca cubre: desgaste normal, fallas mecánicas por mantenimiento, conducir sin licencia vigente, conducir bajo efectos del alcohol, y usar el vehículo para algo distinto de lo declarado, como transporte comercial no informado.",
   "Ese último punto genera reclamos rechazados con frecuencia. Si compras el auto para uso familiar y después empiezas a hacer transporte de pasajeros o reparto, hay que informarlo y ajustar la póliza. Si no, la aseguradora tiene argumento para no pagar.",

   {"h2": "El deducible: la parte que se olvida"},
   "El deducible es lo que tú pagas de tu bolsillo cada vez que usas el seguro. Suele expresarse como un porcentaje del siniestro con un mínimo fijo, por ejemplo «10 % con mínimo de $250».",
   "Esto importa más de lo que parece. Una prima barata con deducible alto puede salir peor que una prima cara con deducible bajo, si tienes un par de eventos menores. Y explica por qué mucha gente decide no reportar un rayón: el arreglo cuesta menos que el deducible.",
   {"tabla": [["", "Póliza A", "Póliza B"], [
     ["Prima anual", "$620", "$780"],
     ["Deducible mínimo", "$400", "$180"],
     ["Costo con un siniestro de $900", "$1.020", "$960"],
     ["Costo sin siniestros", "$620", "$780"],
   ]]},

   {"h2": "Cómo se fija el valor asegurado"},
   "Este es el número sobre el que se calcula todo y conviene entenderlo, porque decide cuánto te pagan si el auto se pierde por completo.",
   "El valor asegurado debería coincidir con el valor comercial del vehículo en el momento del siniestro, no con lo que pagaste por él. Si aseguras un auto de $18.000 declarando $22.000, pagas prima de más y la aseguradora igual te indemnizará por el valor real.",
   "El error contrario es peor. Declarar $14.000 por un auto que vale $18.000 abarata la prima, pero si lo roban recibes $14.000 y pierdes cuatro mil dólares. Además, en siniestros parciales muchas pólizas aplican la regla proporcional: si aseguraste el 78 % del valor, te pagan el 78 % del arreglo.",
   "Y hay un detalle que sorprende: la mayoría de pólizas ajustan el valor asegurado hacia abajo en cada renovación, siguiendo la depreciación. Vale revisar la cifra cada año en lugar de renovar en automático.",

   {"h2": "Qué sube y qué baja el precio"},
   {"h3": "Sube"},
   {"ul": [
     "Modelos con alto índice de robo en el país.",
     "Repuestos caros o de importación difícil.",
     "Conductor joven o con siniestros recientes.",
     "Uso comercial declarado.",
     "Circular habitualmente en zonas con más siniestralidad.",
   ]},
   {"h3": "Baja"},
   {"ul": [
     "Antigüedad sin siniestros, que casi todas las aseguradoras premian.",
     "Dispositivo de rastreo satelital instalado.",
     "Garaje cerrado declarado como lugar de pernocte.",
     "Pago anual en lugar de mensual.",
     "Aceptar un deducible más alto, si tienes con qué cubrirlo.",
   ]},

   {"quote": "El error más común es cotizar el seguro después de comprar. Cuando el cliente ya firmó y recién ahí descubre que la póliza le suma $70 al mes, el presupuesto que había armado ya no le cuadra. Nosotros lo metemos en la cuenta desde el inicio.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cómo cotizar sin perder tiempo"},
   "Pedir cotizaciones es rápido si mandas los mismos datos a todas las aseguradoras. Con esta información alcanza:",
   {"ul": [
     "Marca, modelo, año y versión exacta del vehículo.",
     "Valor comercial estimado y si tiene o no crédito vigente.",
     "Ciudad donde circula habitualmente y dónde pernocta.",
     "Edad del conductor principal y si hubo siniestros en los últimos tres años.",
     "Uso: particular, trabajo o transporte de terceros.",
   ]},
   "Al comparar las respuestas, mira siempre las mismas tres cosas: prima anual, deducible mínimo y qué asistencia incluye. Una cotización que solo te da el precio no sirve para comparar nada.",
   "Un consejo práctico para quien vive en Imbabura o Carchi: pregunta expresamente por la cobertura de grúa y su radio de acción. En carreteras de montaña o rutas hacia Tulcán, una asistencia limitada a la ciudad se vuelve inútil justo cuando más la necesitas.",

   {"h2": "El seguro dentro del presupuesto real del auto"},
   f"Tener un auto en Ecuador cuesta más que la cuota. Para un seminuevo de $20.000 usado a diario entre Ibarra y Otavalo, el gasto mensual realista se ve así:",
   {"tabla": [["Rubro", "Aproximado al mes"], [
     ["Seguro todo riesgo", "$60 – $85"],
     ["Combustible (uso diario)", "$90 – $150"],
     ["Mantenimiento prorrateado", "$40 – $60"],
     ["Matrícula prorrateada", "$25 – $45"],
     ["Total sin contar la cuota", "$215 – $340"],
   ]]},
   f"Ese total es el que hay que sumar a la cuota antes de decidir. Si quieres el otro lado del cálculo, la cuota la desglosamos en {link(U_CUOTA, 'cómo se calcula la cuota mensual de un auto usado')}.",
   f"En el {link(LISTADO, 'listado del patio')} los precios van desde $9.500 hasta $38.000, y la diferencia de seguro entre los extremos es de casi $100 mensuales. Vale considerarlo al elegir.",
   {"faq": [
     ("¿El seguro es obligatorio en Ecuador?",
      "Si compras a crédito, la entidad casi siempre lo exige mientras dure la deuda. Para un auto pagado no hay obligación legal de todo riesgo, aunque sí es muy recomendable."),
     ("¿Puedo pagar la póliza en cuotas?",
      "Sí, casi todas las aseguradoras lo permiten, generalmente con un recargo respecto al pago anual."),
     ("¿La póliza se transfiere si vendo el auto?",
      "Se puede endosar al nuevo dueño con autorización de la aseguradora, o cancelarla y recuperar la parte no consumida."),
     ("¿Cubre si otra persona maneja mi auto?",
      "Normalmente sí, siempre que tenga licencia vigente y no esté excluida en la póliza. Conviene revisarlo si hay conductores jóvenes en casa."),
   ]},
   f'¿Vas a comprar y quieres el número completo? <a href="{wa("Hola, quiero saber cuanto cuesta asegurar un auto de OKCars")}">Escríbenos por WhatsApp</a> con el vehículo que te interesa y te armamos el presupuesto real: cuota, seguro y gastos de tenencia en una sola cuenta.',
 ]})

# ── 10 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Seguro contra daños a terceros: qué es y cuándo alcanza",
 "slug": "seguro-danos-a-terceros-auto",
 "date": "2026-09-21T09:00:00",
 "cat": GUI,
 "tags": ["seguro vehicular", "daños a terceros", "responsabilidad civil"],
 "focus_kw": "seguro daños a terceros auto",
 "yoast_title": "Seguro contra daños a terceros: qué cubre y precio",
 "yoast_desc": "Que cubre un seguro de responsabilidad civil, cuanto cuesta frente al todo riesgo y en que casos alcanza de verdad para un auto usado en Ecuador.",
 "excerpt": "Cuesta bastante menos que el todo riesgo, pero cubre otra cosa. Cuándo es suficiente y cuándo te deja expuesto.",
 "bloques": [
   "«Seguro contra daños a terceros» es de las búsquedas con más demanda y menos claridad. Mucha gente lo contrata pensando que cubre su auto, y descubre lo contrario en el peor momento.",
   "Vamos a lo concreto: qué cubre, qué no, cuánto cuesta y para qué perfil de conductor tiene sentido.",

   {"h2": "Qué es exactamente"},
   "También se lo llama responsabilidad civil. Cubre el daño que tú le causes a otros: el vehículo del otro conductor, un poste, la fachada de una casa, y las lesiones o gastos médicos de terceros involucrados.",
   "Lo que <strong>no</strong> cubre es tu propio auto. Si chocas y ambos vehículos quedan mal, esta póliza paga el del otro y el tuyo lo arreglas tú. Esa es toda la diferencia con el todo riesgo, y es enorme.",
   {"tabla": [["", "Daños a terceros", "Todo riesgo"], [
     ["Daño al vehículo del otro", "Sí", "Sí"],
     ["Daño a tu propio vehículo", "No", "Sí"],
     ["Robo de tu auto", "No", "Sí"],
     ["Lesiones a terceros", "Sí", "Sí"],
     ["Eventos naturales", "No", "Sí"],
     ["Costo anual referencial", "$120 – $280", "$400 – $1.500"],
   ]]},

   {"h2": "Por qué existe y por qué la gente lo contrata"},
   "La razón principal es el costo: cuesta entre un cuarto y un tercio de lo que cuesta un todo riesgo. Para alguien con un auto de $6.000, pagar $500 al año de póliza no tiene sentido económico, pero quedar debiendo $12.000 por chocar una camioneta ajena sí es un riesgo real.",
   "Ahí está la lógica de esta cobertura: no protege tu patrimonio automotor, protege tu patrimonio a secas. El daño que puedes causarle a un tercero no tiene techo, mientras que el daño a tu auto sí lo tiene —como máximo, lo que vale el auto—.",

   {"h2": "Cuándo alcanza"},
   {"ul": [
     "<strong>Auto de valor bajo.</strong> Si el vehículo vale $5.000 o $7.000, puedes asumir su pérdida; lo que no puedes asumir es un juicio de terceros.",
     "<strong>Auto ya pagado.</strong> Sin crédito vigente nadie te exige todo riesgo.",
     "<strong>Uso poco intensivo.</strong> Si manejas pocos kilómetros al mes y en zonas tranquilas.",
     "<strong>Presupuesto ajustado.</strong> Es infinitamente mejor que andar sin ningún seguro.",
   ]},
   {"h2": "Cuándo te deja expuesto"},
   {"ul": [
     "<strong>Si el auto está a crédito.</strong> La entidad va a exigir todo riesgo, y con razón: el vehículo es su garantía.",
     "<strong>Si el auto vale más de $12.000.</strong> Perderlo sin cobertura es un golpe patrimonial serio.",
     "<strong>Si dependes del auto para trabajar.</strong> Quedarte sin vehículo y sin indemnización te deja sin ingreso.",
     "<strong>Si el modelo es de alta demanda para robo.</strong> Es justo el escenario que esta póliza no cubre.",
   ]},

   {"quote": "Nos toca explicarlo seguido porque la gente compara precios y ve dos cifras muy distintas sin entender que son productos distintos. Cuando lo entienden, la mitad se va a terceros con toda razón y la otra mitad se va a todo riesgo con toda razón también.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "La cuenta que conviene hacer antes de decidir"},
   "Hay una forma sencilla de resolver la duda entre terceros y todo riesgo, y es comparar la prima contra lo que estás dispuesto a perder.",
   {"tabla": [["Vale tu auto", "Prima todo riesgo (aprox. anual)", "Qué pierdes si lo roban sin cobertura"], [
     ["$6.000", "$300 – $400", "$6.000"],
     ["$12.000", "$500 – $650", "$12.000"],
     ["$20.000", "$700 – $1.000", "$20.000"],
     ["$30.000", "$1.000 – $1.500", "$30.000"],
   ]]},
   "En la primera fila, pagar $350 al año para proteger $6.000 es discutible: en dos años pagaste más del 10 % del valor del auto. En la última, pagar $1.200 para proteger $30.000 es una decisión fácil.",
   "El punto de quiebre suele estar entre los $10.000 y los $13.000, y ahí entra el otro factor: si dependes del auto para trabajar, conviene asegurarlo aunque valga poco, porque lo que estás protegiendo no es el vehículo sino tu ingreso.",

   {"h2": "El punto que más importa: el límite de cobertura"},
   "Un seguro a terceros no cubre infinito. Tiene topes por tipo de daño, y esos topes son la parte que hay que leer antes de firmar.",
   {"ul": [
     "<strong>Daños materiales a terceros:</strong> típicamente entre $10.000 y $50.000.",
     "<strong>Lesiones o muerte por persona:</strong> topes específicos, a veces bajos.",
     "<strong>Límite total del evento:</strong> el máximo que paga la aseguradora por un mismo siniestro.",
   ]},
   "Una póliza con tope de $10.000 en daños materiales suena suficiente hasta que el otro vehículo es una camioneta nueva. Subir ese tope suele costar poco y es el ajuste con mejor relación costo-beneficio de todo el producto.",
   "Y conviene pensarlo en función de por dónde circulas. Si tu día a día es la Panamericana entre Otavalo, Atuntaqui e Ibarra, compartes vía con transporte pesado y con vehículos de trabajo caros. Un roce ahí no se parece en nada a uno en una calle de barrio.",

   {"h2": "Qué hacer si chocas y solo tienes esta cobertura"},
   {"ol": [
     "<strong>No mover los vehículos</strong> hasta que llegue la autoridad, salvo que obstruyan gravemente la vía.",
     "<strong>Llamar de inmediato a la aseguradora</strong>, casi siempre antes que a nadie más. Las pólizas exigen reporte dentro de un plazo corto.",
     "<strong>Tomar fotos</strong> de ambos vehículos, la posición final, las placas y el entorno.",
     "<strong>No admitir responsabilidad por escrito</strong> ni firmar acuerdos en el sitio: eso lo define el proceso.",
     "<strong>Guardar el parte policial</strong>, que es el documento base de todo el reclamo posterior.",
   ]},
   "Si el daño a tu propio auto es menor y decides no arreglarlo de inmediato, ten presente que en una futura venta o avalúo ese golpe descuenta. Vale hacer la cuenta antes de dejarlo pasar.",

   {"h2": "Y el SOAT o su equivalente"},
   "Vale aclarar la confusión más frecuente. En Ecuador existe una cobertura obligatoria para accidentes de tránsito que se paga con la matrícula y cubre atención médica de las personas involucradas, con topes definidos.",
   "Esa cobertura no reemplaza al seguro a terceros: no paga daños materiales, no paga el vehículo del otro y sus montos son limitados. Son complementarias, no alternativas.",
   f"Si tu auto está a crédito y necesitas todo riesgo obligatoriamente, conviene contemplar la prima dentro del presupuesto mensual desde el inicio — el desglose completo está en {link(U_SEGURO, 'cuánto cuesta asegurar un auto usado en Ecuador')}.",
   f"Y si estás definiendo cómo financiar la compra, mira antes {link(U_DIRECTO, 'cómo funciona el crédito directo')}, porque la exigencia de póliza varía según quién financie. En el {link(LISTADO, 'patio')} lo aclaramos antes de que firmes.",
   {"faq": [
     ("¿Puedo pasar de terceros a todo riesgo después?",
      "Sí. Requiere una inspección del vehículo y ajustar la prima, pero se hace en cualquier momento."),
     ("¿Cubre si el culpable del choque fui yo?",
      "Sí, justamente para eso existe: paga el daño que tú causaste a otro. Lo tuyo sigue sin cobertura."),
     ("¿Sirve para viajar a otras provincias?",
      "Sí, la cobertura es nacional. Para viajes largos y frecuentes conviene revisar la asistencia en carretera incluida."),
     ("¿Cuánto cuesta subir el tope de cobertura?",
      "Suele ser un incremento pequeño frente a la prima base. Es la mejora más recomendable de esta póliza."),
   ]},
   f'¿Dudas sobre qué cobertura te conviene? <a href="{wa("Hola, quiero asesoria sobre el seguro para el auto que voy a comprar")}">Escríbenos por WhatsApp</a> y lo vemos según el vehículo, su valor y cómo lo vas a usar. Es una decisión de cinco minutos que evita disgustos de años.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
