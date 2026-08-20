#!/usr/bin/env python3
"""Bloque C · trámites de compraventa, posts 13 a 16."""
from gutenberg import CAT, LISTADO, link, wa, guarda, post_url

TRA = CAT["tramites"]
GUI = CAT["guias"]
FIN = CAT["financiamiento"]
U_PAPELES = post_url(TRA, "papeles-antes-de-comprar-auto-usado")
U_TRASPASO = post_url(TRA, "traspaso-de-dominio-vehiculo-ecuador")
U_PRENDA = post_url(TRA, "comprar-auto-con-prenda-ecuador")
U_REVISION = post_url(TRA, "revision-mecanica-antes-de-comprar-auto")
U_SEGURO = post_url(GUI, "seguro-auto-usado-ecuador-precio")
U_PARTE = post_url(FIN, "cambiar-auto-parte-de-pago")

POSTS = []

# ── 13 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Papeles que debes pedir antes de comprar un auto usado",
 "slug": "papeles-antes-de-comprar-auto-usado",
 "date": "2026-09-28T09:00:00",
 "cat": TRA,
 "tags": ["trámites", "documentos", "matrícula", "compraventa"],
 "focus_kw": "papeles para comprar auto usado",
 "yoast_title": "Papeles que debes pedir antes de comprar un auto usado",
 "yoast_desc": "La lista completa de documentos que hay que revisar antes de pagar por un seminuevo en Ecuador y las senales de alerta que conviene no dejar pasar.",
 "excerpt": "La lista completa de lo que hay que revisar antes de entregar dinero, y las señales que deberían frenar la compra.",
 "bloques": [
   "La parte mecánica de comprar un auto usado se revisa con un mecánico. La parte documental se revisa con paciencia, y es donde ocurren los problemas más caros: un vehículo con un pendiente legal puede quedar inmovilizado o directamente perderse.",
   "Esta es la lista de lo que hay que pedir, en el orden en que conviene pedirlo.",

   {"h2": "Los documentos básicos"},
   {"ol": [
     "<strong>Matrícula vigente.</strong> Verifica que los datos del vehículo coincidan con los físicos: placa, chasis, motor, color, año y modelo.",
     "<strong>Cédula del propietario.</strong> El nombre debe ser exactamente el de la matrícula.",
     "<strong>Certificado de revisión técnica</strong> del último período, según el calendario de la provincia.",
     "<strong>Comprobante de pago de matriculación</strong> del año en curso.",
     "<strong>Certificado de gravámenes</strong>, que muestra si el vehículo tiene prenda, reserva de dominio o alguna medida judicial.",
   ]},
   "El quinto es el que más se olvida y el que más problemas evita. Se obtiene en línea y confirma si el auto está libre para transferirse.",

   {"h2": "Lo que hay que verificar físicamente"},
   "Los papeles se contrastan contra el vehículo. Tres verificaciones que toman cinco minutos:",
   {"ul": [
     "<strong>Número de chasis.</strong> Debe coincidir con la matrícula y no mostrar signos de haber sido alterado, regrabado o cubierto.",
     "<strong>Número de motor.</strong> Mismo criterio. Si el motor fue cambiado, tiene que estar registrado en la matrícula.",
     "<strong>Placa.</strong> Que corresponda al vehículo y no presente reemplazos irregulares.",
   ]},
   "Si alguno de estos números no cuadra con el documento, la compra se detiene ahí. No hay explicación aceptable, y un vehículo con numeración alterada no se puede transferir ni matricular.",

   {"h2": "Las consultas en línea que conviene hacer"},
   {"tabla": [["Qué consultar", "Para qué sirve"], [
     ["Multas y valores pendientes", "Se transfieren con el vehículo si no se pagan antes"],
     ["Gravámenes y prendas", "Confirma que el auto puede cambiar de dueño"],
     ["Historial de matriculación", "Muestra si el vehículo cambió de provincia o de dueño con frecuencia"],
     ["Estado de la revisión técnica", "Evita heredar un proceso pendiente"],
     ["Denuncias de robo", "Verificación básica de procedencia"],
   ]]},
   "Todas se hacen con la placa o el número de chasis desde los portales oficiales, sin costo. Media hora de consultas vale más que cualquier promesa verbal.",
   "Vale hacerlas dos veces: una cuando ves el auto por primera vez y otra el día antes de firmar. Una multa puede aparecer en el medio, y quien la genera es quien todavía figura como titular.",

   {"quote": "Cuando alguien compra a un particular le recomendamos siempre hacer las consultas antes de dar cualquier anticipo. Nos han llegado clientes que pagaron y después descubrieron multas de $600 o una prenda sin levantar. Recuperar eso es lento y a veces imposible.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "El historial del vehículo: lo que los papeles cuentan sin decirlo"},
   "Más allá de que los documentos estén en regla, la secuencia que muestran dice bastante del auto. Tres lecturas que vale hacer:",
   {"h3": "Cuántos dueños tuvo"},
   "Un vehículo de siete años con cinco propietarios distintos es una señal. No siempre significa que tenga problemas, pero sí que nadie quiso quedárselo mucho tiempo. Vale preguntar por qué se vende y contrastar la respuesta con la revisión mecánica.",
   {"h3": "De qué provincia viene"},
   "Un auto que pasó su vida en la costa estuvo expuesto a humedad y salinidad; uno de la sierra, a más exigencia de frenos y motor por altura y pendientes. Ninguna condición descalifica, pero orientan qué revisar con más cuidado.",
   {"h3": "Cuándo se hicieron las revisiones técnicas"},
   "Si hay años sin revisión, o si la última se hizo apenas la semana pasada tras un vacío largo, conviene preguntar qué pasó en el medio. A veces el vehículo estuvo parado, y un auto detenido mucho tiempo tiene sus propios problemas.",

   {"h2": "Señales de alerta"},
   {"ul": [
     "<strong>El vendedor no es el titular</strong> y no tiene poder notariado. Muy común y muy riesgoso.",
     "<strong>Apuro por cerrar.</strong> Presión para pagar antes de verificar es señal suficiente para retirarse.",
     "<strong>Se niega a la revisión mecánica</strong> en un taller que tú elijas.",
     "<strong>Precio muy por debajo del mercado</strong> sin una razón verificable.",
     "<strong>Matrícula recién emitida</strong> con varios cambios de dueño seguidos en poco tiempo.",
     "<strong>No entrega copia de los documentos</strong> para que los verifiques por tu cuenta.",
   ]},

   {"h2": "El orden correcto de la compra"},
   "Mucha gente hace las cosas al revés: primero paga un anticipo para «apartar» el auto y después revisa. Ese orden es el que genera pérdidas. La secuencia que funciona es esta:",
   {"ol": [
     "Ver el vehículo y pedir copia de matrícula y cédula del titular.",
     "Hacer las consultas en línea con la placa y el chasis, desde tu casa y con calma.",
     "Verificar físicamente los números de chasis y motor contra la matrícula.",
     "Llevar el auto a revisión mecánica en un taller de tu confianza.",
     "Recién ahí negociar precio y firmar cualquier documento con dinero de por medio.",
   ]},
   "Los pasos 2 y 3 no cuestan nada y toman una tarde. El paso 4 cuesta entre $30 y $60 en Ibarra u Otavalo, y ese gasto se paga solo la primera vez que detecta algo.",
   f"Sobre ese cuarto punto, qué exactamente debe revisar el mecánico lo detallamos en {link(U_REVISION, 'la revisión mecánica antes de comprar')}.",

   {"h2": "Comprar a particular o en patio: qué cambia en lo documental"},
   {"tabla": [["", "A particular", "En un patio"], [
     ["Quién verifica los papeles", "Tú", "El patio antes de recibir el vehículo"],
     ["Riesgo de pendientes ocultos", "Tuyo", "Del patio"],
     ["Trámite de traspaso", "Lo gestionas tú", "Generalmente incluido"],
     ["Respaldo posterior", "Ninguno", "Factura y garantía comercial"],
   ]]},
   f"Esa diferencia explica buena parte de la brecha de precio entre las dos opciones. Los vehículos del {link(LISTADO, 'patio')} llegan con la revisión documental hecha, que es exactamente el trabajo que un comprador particular tiene que hacer solo.",
   f"Si el auto tiene una prenda registrada, no significa que la compra sea imposible, pero sí que hay un paso extra: lo explicamos en {link(U_PRENDA, 'comprar un auto con prenda')}.",
   f"Y una vez resuelto lo documental, el siguiente paso es el traspaso. El detalle de costos y tiempos está en {link(U_TRASPASO, 'cómo funciona el traspaso de dominio')}.",
   {"faq": [
     ("¿Puedo comprar un auto con multas pendientes?",
      "Sí, pero no se puede transferir hasta cancelarlas. Lo habitual es descontar ese valor del precio y pagarlas antes del traspaso."),
     ("¿Qué pasa si el vendedor no es el dueño registrado?",
      "Necesita un poder notariado del titular. Sin eso, el traspaso no se puede hacer."),
     ("¿Las consultas en línea tienen costo?",
      "Las básicas de multas y estado del vehículo son gratuitas. Algunos certificados formales sí tienen un valor menor."),
     ("¿Sirve de algo un contrato de compraventa entre particulares?",
      "Ayuda como respaldo, pero no reemplaza el traspaso. Mientras no cambie el registro, el titular sigue siendo responsable ante la ley."),
   ]},
   f'¿Estás mirando un auto y quieres una segunda opinión? <a href="{wa("Hola, quiero asesoria sobre los papeles de un auto usado")}">Escríbenos por WhatsApp</a> con la placa y te decimos qué revisar. Preferimos que compres informado, sea con nosotros o no.',
 ]})

# ── 14 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Traspaso de dominio de un vehículo: pasos, costos y quién lo paga",
 "slug": "traspaso-de-dominio-vehiculo-ecuador",
 "date": "2026-09-30T09:00:00",
 "cat": TRA,
 "tags": ["traspaso de dominio", "trámites", "ANT", "matriculación"],
 "focus_kw": "traspaso de dominio vehículo ecuador",
 "yoast_title": "Traspaso de dominio de vehículo: pasos y costos",
 "yoast_desc": "Como se hace el traspaso de dominio de un auto en Ecuador: documentos que piden, cuanto cuesta cada rubro, cuanto demora el tramite y quien paga que.",
 "excerpt": "El trámite que convierte al comprador en dueño legal. Qué se necesita, cuánto cuesta, cuánto demora y quién asume cada gasto.",
 "bloques": [
   "Pagar el auto y recibir las llaves no te convierte en propietario. Lo que te convierte en propietario es el traspaso de dominio, y mientras no se haga, el vehículo sigue registrado a nombre de otra persona con todo lo que eso implica.",
   "Es un trámite sencillo si los papeles están en orden, y una pesadilla si no. Aquí va el proceso completo.",

   {"h2": "Por qué importa hacerlo de inmediato"},
   "Mientras el registro no cambie, el vendedor sigue siendo el responsable legal del vehículo: multas, accidentes, cualquier hecho de tránsito. Y del lado del comprador, no puedes venderlo, ni asegurarlo correctamente a tu nombre, ni acreditar que es tuyo.",
   "Hay historias que se repiten: alguien compró hace dos años, nunca traspasó, el vendedor falleció y ahora el trámite pasa por una sucesión. Lo que era un procedimiento de un día se volvió un proceso legal de meses.",

   {"h2": "Los pasos"},
   {"ol": [
     "<strong>Verificar que no haya pendientes.</strong> Multas, gravámenes, prendas y revisión técnica al día.",
     "<strong>Firmar el contrato de compraventa</strong> reconocido ante notario, con los datos exactos de ambas partes y del vehículo.",
     "<strong>Pagar el impuesto correspondiente</strong> a la transferencia de dominio.",
     "<strong>Ingresar el trámite</strong> en la entidad competente de matriculación de tu provincia.",
     "<strong>Retirar la nueva matrícula</strong> ya emitida a nombre del comprador.",
   ]},
   "Con todo en regla, el trámite se resuelve en pocos días. En temporada alta de matriculación puede extenderse.",

   {"h2": "Cuánto cuesta"},
   {"tabla": [["Rubro", "Valor referencial"], [
     ["Contrato de compraventa notariado", "$25 – $60"],
     ["Impuesto a la transferencia de dominio", "Según avalúo del vehículo"],
     ["Tasas del trámite de matriculación", "$20 – $50"],
     ["Especies y emisión de matrícula", "$10 – $30"],
   ]]},
   "Los valores varían por provincia y por avalúo, así que conviene confirmarlos antes en la entidad correspondiente. Como referencia general, un traspaso completo sobre un vehículo de gama media suele moverse entre $80 y $200 sumando todo.",

   {"h2": "Quién paga qué"},
   "No hay una regla legal que lo defina; es materia de acuerdo. Lo habitual en Ecuador:",
   {"ul": [
     "<strong>El vendedor</strong> deja el vehículo sin multas, con matrícula del año pagada y sin gravámenes. Eso es lo mínimo esperable.",
     "<strong>El comprador</strong> asume el costo del traspaso, el impuesto y las tasas.",
     "<strong>La notaría</strong> suele dividirse, aunque también es común que la pague el comprador.",
   ]},
   "Lo importante es acordarlo por escrito antes de pagar. Un acuerdo verbal sobre quién cubre $150 se convierte en discusión el día del trámite.",

   {"quote": "Cuando la venta sale del patio, el traspaso lo gestionamos nosotros y el cliente se lleva la matrícula a su nombre. Entre particulares es donde vemos los enredos, casi siempre por no haber acordado antes quién paga qué y en qué plazo.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cómo debería ocurrir el pago"},
   "El punto más delicado de toda la operación entre particulares no es el trámite, es el momento en que el dinero cambia de manos. Tres reglas que evitan casi todos los problemas:",
   {"ul": [
     "<strong>Pago y firma en el mismo acto.</strong> Nunca entregar el total antes de que el contrato esté firmado ante notario.",
     "<strong>Transferencia bancaria antes que efectivo.</strong> Deja rastro verificable de quién pagó, cuánto y cuándo.",
     "<strong>Anticipo por escrito.</strong> Si dejas una reserva, que quede documentada con las condiciones de devolución.",
   ]},
   "Si el vendedor propone entregar el auto ahora y firmar «la próxima semana», o pide el total en efectivo sin documento, conviene detenerse. No hay razón legítima para esa estructura.",

   {"h2": "Casos que complican el trámite"},
   {"ul": [
     "<strong>Vehículo con prenda vigente.</strong> Hay que levantarla primero con el certificado de la entidad acreedora.",
     "<strong>Titular fallecido.</strong> Requiere posesión efectiva y participación de los herederos.",
     "<strong>Titular fuera del país.</strong> Necesita poder notariado y apostillado.",
     "<strong>Vehículo a nombre de una empresa.</strong> Se necesita nombramiento vigente del representante legal y la autorización societaria.",
     "<strong>Cambio de motor no registrado.</strong> Hay que regularizarlo antes de transferir.",
   ]},
   "Ninguno es imposible, pero todos suman semanas. Si detectas uno de estos casos, conviene resolverlo antes de entregar dinero, no después.",
   "El más frecuente por lejos es el de la prenda vigente. Pasa cuando el vendedor todavía está pagando el auto y quiere venderlo para cancelar la deuda con ese dinero. Se puede hacer, pero exige coordinar el pago directamente con la entidad acreedora en lugar de entregárselo al vendedor.",

   {"h2": "Qué revisar en el contrato antes de firmar"},
   "El contrato de compraventa es breve, y justamente por eso hay que leerlo entero. Cinco datos que deben estar exactos:",
   {"ul": [
     "<strong>Identificación completa del vehículo:</strong> placa, chasis, motor, marca, modelo, año y color, tal como constan en la matrícula.",
     "<strong>Valor de la transacción</strong>, escrito en números y en letras.",
     "<strong>Forma y fecha de pago</strong>, especificando si hubo anticipo.",
     "<strong>Estado en que se entrega</strong> y qué accesorios incluye: llanta de repuesto, herramientas, segunda llave.",
     "<strong>Declaración del vendedor</strong> de que el vehículo está libre de gravámenes y sin pendientes.",
   ]},
   "Ese último punto es tu respaldo si después aparece algo. Sin esa declaración por escrito, reclamar es mucho más difícil.",
   f"Y si el auto que entregas forma parte de la operación, el traspaso corre en ambos sentidos y conviene coordinarlos juntos. Lo tratamos en {link(U_PARTE, 'entregar tu auto como parte de pago')}.",

   {"h2": "Después del traspaso"},
   "Con la matrícula nueva en la mano quedan tres cosas por hacer, y ninguna es opcional:",
   {"ol": [
     "<strong>Actualizar el seguro</strong> a tu nombre, o contratarlo si el auto viene sin póliza.",
     "<strong>Revisar el calendario de matriculación</strong> de tu provincia, que puede diferir del anterior si el vehículo cambió de jurisdicción.",
     "<strong>Guardar copia de todo</strong>: contrato, comprobantes y matrícula anterior. Sirve para cualquier reclamo posterior.",
   ]},
   f"Sobre el seguro, si es tu primera compra vale mirar el panorama de coberturas y precios en {link(U_SEGURO, 'seguro para auto usado en Ecuador')} antes de contratar el primero que te ofrezcan.",
   f"Y si vives en Otavalo, Atuntaqui o Cayambe y compras en Ibarra, confirma en qué provincia se hará el trámite: eso define a qué entidad acudir y qué calendario de matriculación te toca desde el año siguiente. En el {link(LISTADO, 'patio')} lo aclaramos al momento de la venta.",
   {"faq": [
     ("¿Cuánto tiempo tengo para hacer el traspaso?",
      "Conviene hacerlo de inmediato. Cada día que pasa, cualquier multa o siniestro sigue recayendo sobre el vendedor y complica la relación entre las partes."),
     ("¿Se puede hacer el traspaso en línea?",
      "Algunas etapas y consultas sí, pero el trámite requiere gestión presencial en la mayoría de provincias."),
     ("¿Qué pasa si el vendedor se niega a firmar después de recibir el dinero?",
      "Es un problema serio y por eso el pago y la firma del contrato deben ocurrir en el mismo acto, nunca separados."),
     ("¿El traspaso se puede hacer en cualquier provincia?",
      "Se realiza donde esté matriculado el vehículo o donde el nuevo dueño vaya a matricularlo, según la normativa vigente. Conviene consultarlo antes."),
   ]},
   f'¿Compraste y no sabes cómo seguir? <a href="{wa("Hola, tengo dudas sobre el traspaso de dominio de un vehiculo")}">Escríbenos por WhatsApp</a> y te orientamos con el proceso, aunque el auto no lo hayas comprado con nosotros.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
