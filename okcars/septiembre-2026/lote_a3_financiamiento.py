#!/usr/bin/env python3
"""Bloque A (cierre) · financiamiento, posts 5 a 8."""
from gutenberg import CAT, LISTADO, INVENTARIO, link, wa, guarda, post_url

FIN = CAT["financiamiento"]
U_ENTRADA = post_url(FIN, "cuanto-entrada-auto-usado-ecuador")
U_HISTORIAL = post_url(FIN, "comprar-auto-credito-sin-historial")
U_RIESGOS = post_url(FIN, "comprar-auto-central-de-riesgos")
U_APROBACION = post_url(FIN, "cuanto-tarda-aprobacion-credito-auto")
U_DIRECTO = post_url(FIN, "credito-directo-auto-usado-ecuador")
U_CUOTA = post_url(FIN, "cuota-mensual-auto-usado-calculo")
U_BANCO = post_url(FIN, "banco-o-credito-directo-auto-usado")
U_PARTE = post_url(FIN, "cambiar-auto-parte-de-pago")

POSTS = []

# ── 5 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Crédito directo para auto usado: cómo funciona y qué piden",
 "slug": "credito-directo-auto-usado-ecuador",
 "date": "2026-09-09T09:00:00",
 "cat": FIN,
 "tags": ["crédito directo", "financiamiento", "auto usado", "requisitos"],
 "focus_kw": "crédito directo auto usado",
 "yoast_title": "Crédito directo para auto usado en Ecuador",
 "yoast_desc": "Como funciona el credito directo de un patio de seminuevos, que documentos piden, en que se diferencia del bancario y cuando conviene de verdad.",
 "excerpt": "Cuando el patio financia en lugar del banco cambian los requisitos, los plazos y también los costos. Cómo funciona por dentro y cuándo conviene.",
 "bloques": [
   "«Crédito directo» es una de las frases más buscadas por quien quiere comprar auto en Ecuador, y también una de las peor explicadas. Mucha gente cree que significa «sin requisitos» o «sin revisar el buró», y no es ninguna de las dos cosas.",
   "Significa algo más simple: quien te vende el auto es también quien te presta la plata, sin banco en el medio. Eso cambia el proceso, no lo elimina.",

   {"h2": "Qué es exactamente"},
   "En un crédito bancario intervienen tres partes: tú, el vendedor y la entidad financiera. El banco desembolsa el valor al vendedor y tú quedas debiéndole al banco.",
   "En el crédito directo hay dos partes. El concesionario te entrega el vehículo y tú le pagas a él en cuotas, según un contrato firmado entre ambos. El auto normalmente queda con reserva de dominio hasta terminar de pagar, que es la garantía del vendedor.",
   {"tabla": [["", "Crédito bancario", "Crédito directo"], [
     ["Quién evalúa", "Un analista según política fija", "El propio concesionario, caso a caso"],
     ["Tiempo de respuesta", "3 a 8 días", "24 a 72 horas"],
     ["Peso del buró", "Determinante", "Importante pero no único"],
     ["Entrada típica", "20 – 30 %", "30 – 50 %"],
     ["Plazos", "Hasta 60 meses o más", "Normalmente 12 a 36 meses"],
     ["Costo del dinero", "Tasa regulada, más baja", "Suele ser más alto"],
   ]]},

   {"h2": "Por qué existe esta modalidad"},
   "En Ecuador una porción grande de la gente que trabaja y genera ingresos no aparece bien en el sistema financiero formal. Comerciantes de feria, transportistas, dueños de talleres, agricultores: facturan, tienen flujo, pero no tienen rol de pagos ni aportes continuos.",
   "El crédito directo nació para atender justamente a ese grupo. Es más caro porque el vendedor asume un riesgo que el banco no quiso asumir, y ese sobreprecio es, en el fondo, el costo de que alguien evalúe tu caso mirándolo en vez de descartándolo por no encajar en un formulario.",
   "Por eso la comparación honesta no es «cuál tiene mejor tasa» —el banco casi siempre gana esa— sino «cuál me da acceso hoy y a qué costo».",

   {"h2": "Qué se necesita presentar"},
   "Los requisitos son menos que los de un banco, pero existen. Lo habitual:",
   {"ul": [
     "Cédula y papeleta de votación vigentes.",
     "Comprobante de ingresos: rol de pagos, RUC con declaraciones o movimientos bancarios de los últimos meses.",
     "Planilla de un servicio básico a nombre tuyo o de un familiar directo, para verificar domicilio.",
     "Referencias personales y, en muchos casos, comerciales.",
     "La entrada disponible en efectivo o transferencia.",
   ]},
   "Si eres independiente —comerciante, transportista, artesano— este es el punto donde el crédito directo se vuelve más flexible que el banco. Un ingreso real pero informal se puede sustentar con facturas, cuadernos de venta o movimientos, y del otro lado hay alguien dispuesto a escucharlo.",

   {"quote": "Al banco le entregas papeles y esperas. Aquí te sentás a conversar. Muchos de nuestros clientes son comerciantes de Otavalo o Atuntaqui que facturan bien pero no tienen rol de pagos, y esa conversación es la que destraba la compra.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cuándo conviene y cuándo no"},
   {"h3": "Conviene si"},
   {"ul": [
     "Tu ingreso es real pero difícil de demostrar con documentos formales.",
     "Necesitas el auto pronto y no puedes esperar dos semanas de trámite.",
     "Tienes buena entrada y piensas pagar en plazo corto, donde la diferencia de tasa pesa poco.",
     "Tuviste tropiezos de historial ya resueltos.",
   ]},
   {"h3": "No conviene si"},
   {"ul": [
     "Tienes rol de pagos, aportes al IESS y buen historial: un banco te va a dar mejor tasa.",
     "Necesitas un plazo largo para que la cuota entre en tu presupuesto.",
     "La entrada que tienes está por debajo del 30 %.",
   ]},

   {"h2": "Lo que hay que revisar antes de firmar"},
   "El crédito directo se rige por un contrato privado, así que la letra importa más que en un producto bancario estandarizado. Cinco cosas que conviene leer con calma:",
   {"ol": [
     "<strong>El costo total.</strong> Más allá de la cuota: cuánto vas a pagar sumado todo y cuánto de eso es interés.",
     "<strong>Qué pasa si te atrasas.</strong> Mora, recargos y en qué momento el vendedor puede reclamar el vehículo.",
     "<strong>Si se puede pagar antes.</strong> Pregunta si hay descuento por prepago o si la cuota es fija sin importar cuándo termines.",
     "<strong>La reserva de dominio.</strong> Quién figura en la matrícula durante el crédito y cómo se levanta al final.",
     "<strong>Qué incluye y qué no.</strong> Traspaso, matriculación, seguro: aclarar quién paga cada cosa evita sorpresas.",
   ]},
   f"Sobre el punto del costo total, vale hacer el ejercicio completo antes de decidir: lo explicamos con números en {link(U_CUOTA, 'cómo se calcula la cuota de un auto usado')}. Y si te preocupa cuánto va a tardar el trámite, los plazos reales están en {link(U_APROBACION, 'cuánto tarda la aprobación de un crédito')}.",

   {"h2": "Cómo se ve el proceso de principio a fin"},
   {"ol": [
     "Eliges el vehículo y se acuerda el precio.",
     "Presentas los documentos y se conversa tu situación de ingresos.",
     "El concesionario define la entrada mínima y el plazo posible para tu caso.",
     "Se firma el contrato con la tabla de pagos y se inscribe la reserva de dominio.",
     "Entregas la entrada y recibes el vehículo.",
     "Pagas las cuotas y, al cancelar, se levanta la reserva y la matrícula queda limpia a tu nombre.",
   ]},
   "Entre el paso 1 y el 5 suelen pasar dos o tres días si llegas con los papeles listos. Es la principal ventaja de esta modalidad frente a la bancaria, sobre todo para quien viene desde Tulcán o Cayambe y no quiere hacer tres viajes a Ibarra por un trámite.",

   {"h2": "Tres malentendidos frecuentes"},
   {"ul": [
     "<strong>«No piden nada».</strong> Piden menos, y distinto. Sin comprobar ingreso ni domicilio no hay operación seria en ningún lado.",
     "<strong>«El auto es mío desde el primer día».</strong> Lo manejas desde el primer día, pero con reserva de dominio la titularidad plena llega al cancelar.",
     "<strong>«Es para gente que no califica».</strong> Buena parte de quienes lo usan sí calificarían en un banco; eligen esta vía por rapidez o por evitar el papeleo.",
   ]},

   {"h2": "Un ejemplo con un vehículo real"},
   f"Tomemos el {link(LISTADO, 'Ford Territory 2025 del patio')}, en $20.500. Con una entrada del 40 % —$8.200— quedan $12.300 por financiar. A 24 meses eso es una cuota alrededor de $600 según la tasa, y el crédito termina en dos años.",
   "Si en cambio pones el 25 % y estiras a 48 meses, la cuota baja bastante pero el total pagado sube varios miles. Ninguna de las dos opciones es incorrecta: dependen de cuánto puedes destinar al mes sin apretarte.",
   {"faq": [
     ("¿El crédito directo revisa la central de riesgos?",
      "Sí. La diferencia es que el resultado no es automático: se pondera junto con la entrada, el ingreso y las referencias."),
     ("¿Puedo vender el auto antes de terminar de pagar?",
      "No mientras exista reserva de dominio. Primero hay que cancelar el saldo y levantarla."),
     ("¿La tasa es más alta que la de un banco?",
      "Generalmente sí, porque el riesgo lo asume el concesionario. En plazos cortos la diferencia en dinero es menor de lo que parece."),
     ("¿Necesito garante?",
      "No siempre. Depende de la entrada, del monto y de qué tan verificable sea tu ingreso."),
   ]},
   f'¿Quieres saber si calificas? <a href="{wa("Hola, quiero informacion sobre credito directo en OKCars")}">Escríbenos por WhatsApp</a> contándonos tu situación. Te decimos el mismo día qué se puede hacer, sin que tengas que viajar hasta Ibarra para averiguarlo.',
 ]})

# ── 6 ────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Cuota mensual de un auto usado: cómo se calcula y qué la sube",
 "slug": "cuota-mensual-auto-usado-calculo",
 "date": "2026-09-11T09:00:00",
 "cat": FIN,
 "tags": ["cuota mensual", "crédito vehicular", "tasa de interés", "plazo"],
 "focus_kw": "cuota mensual auto usado",
 "yoast_title": "Cuota mensual de un auto usado: cómo se calcula",
 "yoast_desc": "Las cuatro variables que definen tu cuota, por que dos creditos del mismo monto cuestan distinto y cuanto termina costando alargar el plazo.",
 "excerpt": "Cuatro variables definen lo que pagas al mes. Entenderlas evita la sorpresa de descubrir que el auto costó mucho más de lo que decía la etiqueta.",
 "bloques": [
   "La pregunta que abre casi toda conversación en el patio es «¿en cuánto me queda la cuota?». Es la pregunta correcta, pero incompleta: dos créditos con la misma cuota pueden costar miles de dólares de diferencia.",
   "Aquí va cómo se arma ese número, qué lo mueve y qué mirar además de la cuota.",

   {"h2": "Las cuatro variables"},
   {"ol": [
     "<strong>Monto financiado.</strong> El precio del auto menos tu entrada. No el precio del auto.",
     "<strong>Tasa de interés.</strong> Lo que cuesta el dinero prestado, expresada en porcentaje anual.",
     "<strong>Plazo.</strong> En cuántos meses lo pagas.",
     "<strong>Cargos adicionales.</strong> Seguro de desgravamen, seguro del vehículo si se financia, gastos de formalización.",
   ]},
   "El cuarto punto es el que más sorprende. Una cuota que en la calculadora daba $380 puede llegar a $430 en el contrato, y la diferencia no es un error: son los rubros que nadie mencionó al inicio.",

   {"h2": "Por qué alargar el plazo no es gratis"},
   f"Tomemos el {link(LISTADO, 'Kia Seltos 2025 del patio')}, en $20.500, con una entrada del 30 % ($6.150). Quedan $14.350 por financiar. Así se comporta ese mismo monto según el plazo, con una tasa referencial:",
   {"tabla": [["Plazo", "Cuota aproximada", "Total pagado en intereses"], [
     ["24 meses", "$680", "cerca de $1.900"],
     ["36 meses", "$490", "cerca de $2.900"],
     ["48 meses", "$395", "cerca de $3.900"],
     ["60 meses", "$340", "cerca de $4.900"],
   ]]},
   "Las cifras son referenciales y cambian según la entidad y tu perfil, pero la forma de la curva siempre es la misma: cada año extra de plazo baja la cuota cada vez menos y sube el interés casi igual.",
   "Entre 24 y 36 meses la cuota cae $190. Entre 48 y 60 cae apenas $55, y por esos $55 pagas mil dólares más. Ese es el tramo donde alargar deja de tener sentido.",

   {"quote": "El error típico es elegir el plazo más largo porque la cuota se ve cómoda, y no mirar el total. Le mostramos al cliente las dos columnas juntas y muchos se corren a un plazo menor apenas ven la diferencia en dinero.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cómo se arma el número, en concreto"},
   "No hace falta la fórmula financiera para entender de dónde sale la cuota. Basta con esta idea: cada mes pagas dos cosas juntas, una parte de la deuda y el alquiler del dinero que todavía debes.",
   "Al principio la mayor parte de la cuota es interés, porque debes casi todo. Con los meses la proporción se invierte y cada vez más de lo que pagas baja el capital. Por eso abonar temprano ahorra mucho más que abonar al final.",
   "Ese detalle explica algo que confunde a mucha gente: si a mitad del crédito preguntas cuánto falta para cancelar, el saldo es más alto de lo que esperabas. No te estafaron; simplemente todavía no habías bajado mucho capital.",
   f"Y explica también por qué conviene poner la mayor entrada posible. Cada dólar de entrada es un dólar sobre el que nunca pagas interés. Lo desarrollamos en {link(U_ENTRADA, 'cuánto de entrada necesitas para un auto usado')}.",

   {"h2": "Qué sube tu cuota sin que lo notes"},
   {"h3": "El seguro financiado"},
   "Muchos créditos incluyen la póliza dentro del monto. Es cómodo, pero significa que pagas intereses sobre el seguro. Si puedes cubrirla aparte, la cuota baja.",
   {"h3": "El desgravamen"},
   "Es un seguro que cubre el saldo si el deudor fallece. Es obligatorio en casi todas las entidades y se cobra mes a mes sobre el saldo pendiente. Suele ser un rubro pequeño, pero está.",
   {"h3": "Tu perfil de riesgo"},
   f"La tasa no es la misma para todos. Un historial limpio y un ingreso verificable te ubican en el tramo bajo; lo contrario, en el alto. Sobre esto tratamos aparte en {link(U_HISTORIAL, 'comprar auto a crédito sin historial')}.",
   {"h3": "La frecuencia de pago"},
   "Algunos créditos se pactan quincenales. La cuota individual se ve más pequeña, pero al mes estás pagando lo mismo o más. Conviene comparar siempre en base mensual.",

   {"h2": "Compara estas tres cifras, nunca una sola"},
   "Cuando pidas cotizaciones a distintas entidades, exige que te den los tres números juntos. Con eso comparas peras con peras:",
   {"ul": [
     "<strong>Cuota mensual completa</strong>, con seguros y cargos incluidos, no la cuota «pelada».",
     "<strong>Total a pagar</strong> al final del crédito, sumando todas las cuotas más la entrada.",
     "<strong>Costo del financiamiento</strong>, que es ese total menos el precio del auto.",
   ]},
   "Esa tercera cifra es la que de verdad compara ofertas. Si un crédito te cuesta $2.900 y otro $4.100 por el mismo vehículo, ahí está la decisión, aunque la cuota del segundo se vea más simpática.",
   f"Un patio serio te entrega ese cuadro sin que lo pidas. Si al preguntar el total te responden solo con la cuota, insiste. En el {link(LISTADO, 'patio')} lo armamos para cualquier vehículo antes de que firmes nada.",

   {"h2": "Un detalle que cambia según dónde vivas"},
   "Si el auto lo vas a usar para trabajar —y en Imbabura buena parte de las compras son exactamente eso: comerciantes de Otavalo, gente que sube a diario a Ibarra, transportistas de Atuntaqui— el cálculo cambia de sentido.",
   "Ahí la cuota no compite contra tu sueldo sino contra lo que hoy gastas en fletes, buses o alquiler de vehículo. Si actualmente pagas $250 al mes en transporte y la cuota es $340, el costo real que asumes es $90, no $340.",
   "Ese razonamiento no aplica si el auto es solo para uso familiar, y conviene ser honesto sobre cuál de los dos casos es el tuyo antes de justificar una cuota alta.",

   {"h2": "La regla que sí sirve para decidir"},
   "Antes de mirar autos, define cuánto puedes destinar al mes. La referencia razonable es que la cuota no pase del 25 % de tu ingreso neto, contando ya cualquier otra deuda que tengas.",
   "Con $1.200 de ingreso, eso son $300 de cuota máxima. Y a esos $300 hay que restarles lo que el auto cuesta por existir: combustible, matrícula, seguro y mantenimiento suman fácil $150 a $200 mensuales en Ecuador.",
   f"Si haces ese cálculo antes de enamorarte de un vehículo, llegas al patio sabiendo tu rango. Y desde ahí es fácil ver qué opciones del {link(LISTADO, 'listado')} entran de verdad en tu presupuesto.",
   {"faq": [
     ("¿Conviene siempre el plazo más corto?",
      "Conviene el plazo más corto que puedas pagar cómodamente. Apretarse para acortar termina en atrasos, que salen más caros que el interés."),
     ("¿Puedo abonar al capital para bajar la cuota?",
      "En la mayoría de créditos sí. Pregunta si el abono reduce la cuota o acorta el plazo, porque no es lo mismo."),
     ("¿La tasa se puede negociar?",
      "En bancos poco, porque responde a política. En crédito directo hay más margen, sobre todo si subes la entrada."),
     ("¿Qué pasa si me atraso una cuota?",
      "Se generan intereses de mora y queda registro en el buró. Si prevés un mes difícil, avisa antes: casi siempre hay forma de reprogramar."),
   ]},
   f'¿Quieres el número exacto para un auto específico? <a href="{wa("Hola, quiero saber la cuota mensual de un auto de OKCars")}">Escríbenos por WhatsApp</a> con el vehículo que te interesa y cuánto tienes de entrada, y te armamos el cuadro completo con cuota y total.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
