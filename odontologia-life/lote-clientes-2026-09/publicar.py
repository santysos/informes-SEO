#!/usr/bin/env python3
"""OLIFE — primer lote de captación (sep 2026). 4 posts de intención de paciente,
gaps verificados con Search Console. Cada uno con el bloque de CTA de WhatsApp medible.
Precios como rangos referenciales; el valor del caso, por WhatsApp (no se inventan precios).
Cat: 7 implantologia · 9 rehabilitacion-oral-estetica · 14 publicos-especificos.
"""
import urllib.request, base64, json, time, os, re
ENV=os.path.join(os.path.dirname(os.path.abspath(__file__)),"..","..",".env")
env={}
for l in open(ENV):
    l=l.strip()
    if l.startswith("OLIFE_") and "=" in l: k,v=l.split("=",1); env[k]=v
AUTH=base64.b64encode(f"{env['OLIFE_WP_USER']}:{env['OLIFE_WP_APP_PASS']}".encode()).decode()
Hg={"Authorization":f"Basic {AUTH}","User-Agent":"Mozilla/5.0 Chrome/120"}
Hp={**Hg,"Content-Type":"application/json"}
API=env["OLIFE_WP_BASE"]
WA="https://api.whatsapp.com/send?phone=593984582733&text=Hola%2C%20quiero%20saber%20el%20precio%20de%20mi%20caso%20y%20agendar%20una%20valoraci%C3%B3n."

def P(t): return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"
def H2(t): return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'
def Q(t): return f'<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>{t}</p></blockquote>\n<!-- /wp:quote -->'
def UL(items):
    lis="".join(f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->\n" for i in items)
    return f'<!-- wp:list -->\n<ul class="wp-block-list">\n{lis}</ul>\n<!-- /wp:list -->'
def TB(h,rows):
    th="".join(f"<th>{x}</th>" for x in h)
    tr="".join("<tr>"+"".join(f"<td>{c}</td>" for c in r)+"</tr>" for r in rows)
    return f'<!-- wp:table -->\n<figure class="wp-block-table"><table><thead><tr>{th}</tr></thead><tbody>{tr}</tbody></table></figure>\n<!-- /wp:table -->'
def CTA():
    return ('\n<!-- olife-cta-wa -->\n'
      + H2("¿Quieres saber el precio de tu caso?")
      + "\n" + P("El valor exacto depende de tu diagnóstico, no de un listado general. Escríbenos por WhatsApp, cuéntanos tu caso y agenda tu valoración en <strong>Odontología Life, Otavalo</strong>. Te respondemos rápido.")
      + f'\n<!-- wp:buttons -->\n<div class="wp-block-buttons"><!-- wp:button {{"backgroundColor":"vivid-green-cyan"}} -->\n<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{WA}">Escribir por WhatsApp</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->')

POSTS=[]
def add(cat,slug,title,meta,fkw,excerpt,blocks):
    POSTS.append(dict(cat=cat,slug=slug,title=title,meta=meta,fkw=fkw,excerpt=excerpt,
                      content="\n\n".join(blocks)+"\n"+CTA()))

# 1. All-on-4
add(7,"implantes-all-on-4-ecuador-dientes-fijos","Implantes All-on-4 en Ecuador: dientes fijos en pocos días",
    "Qué son los implantes All-on-4, para quién sirven, cuánto cuestan y cómo es el proceso para recuperar toda la dentadura fija en Ecuador. Valoración en Otavalo.",
    "implantes all on 4 ecuador",
    "Qué es el All-on-4, para quién sirve, cómo es el proceso y de qué depende el precio de recuperar toda la dentadura fija.",
    [
    P("Perder la mayoría de los dientes no significa resignarse a una dentadura removible que se mueve al comer o al hablar. La técnica <strong>All-on-4</strong> permite fijar toda una arcada de dientes sobre solo cuatro implantes, y en muchos casos salir el mismo día con dientes provisionales fijos."),
    P("Te explicamos qué es el All-on-4, para quién sirve de verdad, cómo es el proceso y de qué depende el precio, para que sepas si es tu solución antes de agendar."),
    H2("Qué es el All-on-4"),
    P("Es una rehabilitación de toda la arcada (superior o inferior) que se sostiene sobre <strong>cuatro implantes</strong> colocados en posiciones estratégicas para aprovechar el hueso disponible. Sobre ellos se ancla un puente fijo con todos los dientes. A diferencia de una dentadura removible, no se quita: se siente y funciona como dientes propios."),
    H2("Para quién sirve"),
    UL(["Personas que perdieron todos o casi todos los dientes de una arcada.","Quienes usan dentadura removible y están cansados de que se mueva o lastime.","Pacientes con pérdida de hueso que hacía difícil poner implantes uno por uno.","Quien busca una solución fija y definitiva, no un parche temporal."]),
    P("No todos son candidatos automáticos: hace falta una <strong>tomografía</strong> que mida el hueso y una valoración clínica. Esa evaluación es la que dice si el All-on-4 es lo tuyo o si conviene otra opción."),
    H2("Cómo es el proceso"),
    P("En términos simples, el tratamiento tiene cuatro momentos: valoración con tomografía, colocación de los cuatro implantes, entrega de una prótesis provisional fija (muchas veces el mismo día o en pocos días) y, tras la cicatrización, la prótesis definitiva. Entre la cirugía y la prótesis final pasan unos meses mientras el hueso integra los implantes."),
    Q("La gran ventaja del All-on-4 no es solo estética: es volver a morder y masticar con seguridad, algo que una dentadura removible nunca termina de dar."),
    H2("De qué depende el precio"),
    P("El All-on-4 es una inversión mayor que un implante suelto porque resuelve toda una arcada. Su valor depende del estado del hueso, del tipo de prótesis y de si necesitas una o las dos arcadas. Los rangos varían mucho de un caso a otro, así que un precio de listado no significa nada hasta ver tu tomografía."),
    TB(["Qué mueve el precio","Por qué"],
       [["Estado del hueso","Si falta hueso, puede requerir pasos extra"],
        ["Una arcada o las dos","El doble de trabajo si son ambas"],
        ["Tipo de prótesis","Los materiales cambian el costo y la duración"]]),
    P("Por eso el número real de tu caso sale de la valoración, no de un artículo. Ahí sí te damos una cifra exacta y las formas de pago."),
    H2("Cuándo NO es la opción indicada"),
    P("Si solo te falta uno o pocos dientes, el All-on-4 es exagerado: un implante individual o un puente resuelven mejor y más barato. El All-on-4 brilla cuando falta toda o casi toda la arcada. Un buen diagnóstico te evita pagar de más."),
    H2("El día de la cirugía y la recuperación"),
    P("El día de la colocación de implantes se trabaja con anestesia, y la mayoría de pacientes describe la molestia como manejable, comparable a una extracción. En muchos casos sales con una prótesis provisional fija, así que no te vas sin dientes. Los primeros días conviene una dieta blanda, hielo para la inflamación y seguir al pie de la letra las indicaciones de higiene y medicación."),
    P("Durante las semanas siguientes el hueso va integrando los implantes, un proceso natural que da la base firme para la prótesis definitiva. En ese periodo hay controles para verificar que todo cicatrice bien. Cumplir esos controles es lo que separa un resultado que dura años de uno con complicaciones evitables."),
    H2("All-on-4 frente a la dentadura removible"),
    P("Mucha gente llega dudando entre el All-on-4 y una dentadura completa removible. La removible cuesta bastante menos, pero se quita, puede moverse al comer y con el tiempo el hueso sigue reabsorbiéndose debajo. El All-on-4 cuesta más, pero es fijo, frena esa pérdida de hueso al estimularlo y devuelve una fuerza de mordida cercana a la natural."),
    TB(["","All-on-4","Dentadura removible"],
       [["Fijación","Fijo, no se quita","Se retira"],
        ["Al comer","Muerde con seguridad","Puede moverse"],
        ["Hueso","Lo estimula","Sigue reabsorbiéndose"],
        ["Inversión","Mayor","Menor"]]),
    P("No hay una respuesta única para todos: depende de tu presupuesto y de cuánto valoras no volver a preocuparte por una prótesis que se mueve. La valoración te muestra las dos opciones con su precio para que decidas con información."),
    H2("Cómo se cuida y cuánto dura"),
    P("El All-on-4 no pide cuidados raros, pero sí constantes. Se cepilla como los dientes naturales, se usa hilo o cepillos especiales por debajo del puente y se acude a controles periódicos para revisar los implantes y la prótesis. Esa higiene alrededor de los implantes es lo que evita la inflamación de la encía, que es la principal causa de problemas a largo plazo."),
    P("Con esos cuidados, los implantes están pensados para durar muchos años, y la prótesis que va encima puede necesitar mantenimiento o recambio con el tiempo, como cualquier pieza que trabaja todos los días al masticar. Es una solución de largo plazo, no un arreglo temporal, y esa durabilidad es parte de lo que justifica la inversión frente a una removible que se ajusta seguido."),
    H2("Preguntas frecuentes"),
    P("<strong>¿Salgo el mismo día con dientes?</strong><br>En muchos casos sí, con una prótesis provisional fija; la definitiva llega tras la cicatrización."),
    P("<strong>¿Duele?</strong><br>La cirugía se hace con anestesia y suele tolerarse bien; el postoperatorio se maneja con indicaciones y medicación."),
    P("<strong>¿Sirve si perdí mucho hueso?</strong><br>Muchas veces sí, porque los implantes se ubican donde hay más hueso; la tomografía lo confirma."),
    P("<strong>¿Cuánto dura?</strong><br>Con buena higiene y controles, es una solución de largo plazo."),
    ])

# 2. Placa / dentadura precio
add(9,"cuanto-cuesta-placa-dental-dentadura-ecuador","¿Cuánto cuesta una placa o dentadura dental en Ecuador?",
    "Cuánto cuesta una placa o dentadura dental en Ecuador, qué tipos hay y de qué depende el precio. Agenda tu valoración en Odontología Life, Otavalo.",
    "cuanto cuesta una placa dental ecuador",
    "Qué tipos de placa o dentadura existen, de qué depende el precio y cómo elegir la que te conviene según tu caso.",
    [
    P("Cuando faltan varios dientes, la primera pregunta suele ser cuánto cuesta una placa o dentadura para volver a comer y sonreír con normalidad. Y la respuesta honesta es: depende del tipo, porque bajo la palabra «placa» hay soluciones muy distintas en comodidad, duración y precio."),
    P("Te explicamos los tipos de dentadura que existen, de qué depende el precio y cómo elegir la que te conviene."),
    H2("Los tipos de dentadura, de menor a mayor"),
    UL(["<strong>Removible acrílica (placa tradicional):</strong> la más económica; se quita para limpiar y puede sentirse menos estable.","<strong>Removible flexible:</strong> más cómoda y estética, se adapta mejor a la encía, cuesta algo más.","<strong>Dentadura sobre implantes (sobredentadura):</strong> se ancla a implantes, no se mueve; es la más cómoda y la de mayor inversión."]),
    P("La diferencia entre una y otra no es capricho: es cuánta seguridad quieres al masticar y cuánto te importa que no se mueva al hablar."),
    H2("De qué depende el precio"),
    TB(["Factor","Cómo afecta"],
       [["Tipo de prótesis","Acrílica < flexible < sobre implantes"],
        ["Cuántos dientes reemplaza","Parcial o total"],
        ["Estado de encías y hueso","Puede requerir pasos previos"],
        ["Materiales","Cambian estética y duración"]]),
    P("Los rangos en el mercado ecuatoriano son amplios justamente por esto: una placa parcial acrílica y una sobredentadura son mundos distintos. Por eso un valor de listado no dice nada hasta ver tu boca."),
    Q("La dentadura más cara no es la mejor para todos, ni la más barata la peor: la correcta es la que te deja comer tranquilo y dura según lo que inviertes."),
    H2("Cómo elegir la tuya"),
    P("Piensa en tres cosas: cuánto presupuesto tienes, cuánta comodidad quieres y si te molesta que la prótesis se pueda mover. Si el presupuesto manda, la removible resuelve; si lo que más valoras es que no se mueva, la sobredentadura sobre implantes es la que da esa seguridad. En la valoración te mostramos las opciones para tu caso con su precio."),
    H2("Cuándo conviene esperar o cambiar de opción"),
    P("Si tienes infecciones o problemas de encías, primero hay que tratarlos: poner una prótesis sobre una boca enferma es construir sobre terreno flojo. Y si te alcanza, vale la pena preguntar por la sobredentadura antes de decidir por la removible: la comodidad de que no se mueva cambia el día a día."),
    H2("Cuánto dura cada tipo y su mantenimiento"),
    P("Una dentadura no es para siempre sin cuidados. La acrílica removible suele necesitar ajustes o rebases con el tiempo, porque la encía y el hueso debajo cambian. La flexible aguanta bien pero también pide revisiones. La sobredentadura sobre implantes es la más estable y duradera, y su mantenimiento se centra en la higiene de los implantes y controles periódicos."),
    P("En todos los casos, la limpieza diaria y las revisiones son las que estiran la vida de la prótesis. Una dentadura bien cuidada dura años; una descuidada lastima la encía y hay que rehacerla antes de tiempo, lo que termina costando más."),
    H2("El proceso de hacerla, paso a paso"),
    P("Hacer una dentadura no es de un día. Suele empezar con una valoración y toma de medidas de tu boca, seguir con pruebas para ajustar mordida y estética, y terminar con la entrega y los ajustes finales para que quede cómoda. Si es sobre implantes, se suma el tiempo de colocación e integración de los implantes."),
    P("Ese proceso por etapas es lo que hace que una dentadura calce bien y no lastime. Saltarse pasos para entregar rápido es la causa más común de prótesis que después no se pueden usar. Con calma y pruebas, el resultado se siente natural."),
    H2("Parcial o total: no es lo mismo"),
    P("Una placa <strong>parcial</strong> reemplaza algunos dientes y se apoya en los que aún tienes, con ganchos o attaches; conviene cuando conservas piezas sanas que sirven de soporte. Una dentadura <strong>total</strong> reemplaza toda la arcada cuando ya no quedan dientes. El precio y el trabajo son distintos, y también lo es el cuidado: en la parcial hay que proteger muy bien los dientes que sostienen la prótesis, porque de ellos depende que aguante."),
    P("Por eso la primera pregunta en la valoración no es «¿cuánto cuesta?» sino «¿cuántos dientes hay que reemplazar y en qué estado están los que quedan?». De esa respuesta sale todo lo demás, incluido el precio."),
    H2("Los primeros días con una dentadura nueva"),
    P("Toda dentadura nueva pide un periodo de adaptación. Los primeros días es normal sentirla voluminosa, notar más saliva y que hablar o comer cueste un poco. Se recomienda empezar con comidas blandas, cortar en trozos pequeños y masticar por ambos lados para repartir la fuerza. Con las removibles, leer en voz alta ayuda a acostumbrar la lengua y recuperar el habla normal en pocos días."),
    P("Si algún punto lastima, no hay que aguantarlo ni limarlo en casa: eso se resuelve con un ajuste rápido en la clínica. Una dentadura que roza y se deja así termina en llagas y en dejar de usarla. Los ajustes de las primeras semanas son parte normal del tratamiento, no una señal de que algo salió mal."),
    H2("Preguntas frecuentes"),
    P("<strong>¿Cuál es la más económica?</strong><br>La removible acrílica. La flexible y la sobredentadura cuestan más por comodidad y estabilidad."),
    P("<strong>¿La dentadura se mueve al comer?</strong><br>Las removibles pueden moverse; las sobredentaduras sobre implantes no."),
    P("<strong>¿Cuánto tarda hacerla?</strong><br>Unas semanas según el tipo; en la valoración te damos el plazo de tu caso."),
    P("<strong>¿Cuál es el precio exacto?</strong><br>Depende del tipo y de tu boca; te lo damos tras la valoración."),
    ])

# 3. Dentista Ibarra
add(14,"dentista-en-ibarra-donde-atenderte","Dentista en Ibarra: dónde atenderte y qué revisar antes",
    "Dentista en Ibarra: qué mirar para elegir bien y por qué muchos pacientes se atienden en nuestra clínica de Otavalo, a minutos. Agenda por WhatsApp.",
    "dentista en ibarra",
    "Qué mirar para elegir un buen dentista si vives en Ibarra, y por qué vale la pena la clínica de Otavalo a pocos minutos.",
    [
    P("Buscar un buen dentista en Ibarra no es solo cuestión de cercanía: es encontrar uno en quien confiar para cuidar tu salud y tu bolsillo a largo plazo. Elegir por lo más cercano o lo más barato, sin mirar nada más, suele salir caro."),
    P("Te explicamos qué revisar para elegir bien, y por qué muchos pacientes de Ibarra se atienden en nuestra clínica de Otavalo, a pocos minutos."),
    H2("Qué mirar para elegir un buen dentista"),
    UL(["<strong>Diagnóstico con imagen:</strong> que use radiografía o tomografía cuando el caso lo pide, no que recete a ojo.","<strong>Presupuesto claro por escrito:</strong> que te diga qué se hace, en qué orden y cuánto, sin sorpresas.","<strong>Especialidad para tu caso:</strong> implantes, ortodoncia o endodoncia piden experiencia específica.","<strong>Seguimiento:</strong> que responda dudas después del tratamiento, no únicamente mientras pagas."]),
    Q("El mejor dentista no es el más barato ni el más cercano: es el que te explica tu caso con claridad y te da un plan que puedes entender y pagar."),
    H2("Por qué la distancia importa menos de lo que crees"),
    P("Ibarra y Otavalo están a unos 20-25 minutos por la Panamericana. Para una limpieza quizá prefieras lo más cercano, pero para un tratamiento importante —implantes, ortodoncia, una rehabilitación— vale la pena elegir por el profesional y el diagnóstico, no por ahorrarte quince minutos de viaje. Un tratamiento bien hecho la primera vez ahorra más que la gasolina."),
    H2("Qué revisar antes de comprometerte"),
    P("Antes de aceptar un plan grande, pide una valoración con diagnóstico, un presupuesto detallado y, si tienes dudas, una segunda opinión. Un profesional serio no teme a que compares: te da la información para que decidas tranquilo."),
    H2("Las señales de alerta que conviene detectar a tiempo"),
    P("Hay pistas que ahorran disgustos. Desconfía de quien te promete un precio cerrado por teléfono sin haberte visto la boca, de quien empieza un tratamiento caro el mismo día sin radiografía, y de quien no te entrega nada por escrito. También de los descuentos agresivos que aparecen «solo por hoy»: la buena odontología no se vende con presión de tiempo."),
    P("Otra señal es la falta de esterilización visible. En una clínica seria ves instrumental empacado, guantes que se cambian delante de ti y superficies limpias. Si algo de eso no está, es motivo suficiente para buscar otro lado, por muy barato que sea."),
    H2("Cuánto pesa cada especialidad"),
    P("No todo dentista hace de todo con el mismo nivel. Para una limpieza o una calza, un odontólogo general resuelve sin problema. Pero para implantes, ortodoncia compleja o una rehabilitación de varias piezas, buscar a alguien con experiencia específica en eso marca la diferencia entre un resultado que dura y uno que toca rehacer."),
    TB(["Necesitas","A quién buscar"],
       [["Limpieza, calzas, revisión","Odontólogo general"],
        ["Brackets o alineadores","Ortodoncista"],
        ["Implantes y rehabilitación","Experiencia en implantología"],
        ["Dolor de nervio, conducto","Endodoncia"]]),
    P("Preguntar directamente cuántos casos como el tuyo ha resuelto el profesional no es descortés: es lo que haría cualquiera antes de una inversión importante en su salud."),
    H2("Atención para pacientes de Ibarra en Otavalo"),
    P("En <strong>Odontología Life</strong> atendemos a muchos pacientes de Ibarra en nuestra clínica de Otavalo, a pocos minutos por la Panamericana. Hacemos valoración con imagen diagnóstica, te entregamos el plan y el presupuesto por escrito, y coordinamos las citas para que el viaje te rinda. Si vienes de Ibarra, escríbenos y organizamos tu valoración."),
    H2("Qué tratamientos justifican elegir por el profesional"),
    P("Para una limpieza o una calza puntual, la clínica más cercana a tu casa está bien. La lógica cambia cuando el tratamiento es largo o define tu boca por años. Ahí unos minutos de viaje pesan mucho menos que acertar con quién lo hace."),
    UL(["<strong>Implantes:</strong> un implante mal planificado es caro de corregir; el diagnóstico con tomografía es decisivo.","<strong>Ortodoncia:</strong> son meses de seguimiento; la experiencia del ortodoncista se nota en el resultado final.","<strong>Rehabilitación de varias piezas:</strong> coronas, puentes o prótesis que deben calzar entre sí piden buen criterio.","<strong>Estética (carillas, diseño de sonrisa):</strong> es un trabajo fino donde el ojo del profesional marca la diferencia."]),
    H2("Cómo aprovechar el viaje desde Ibarra"),
    P("La clave para que venir de Ibarra no sea un problema es organizar las citas. Al agrupar procedimientos compatibles en una misma visita y planificar con anticipación los controles, la mayoría de tratamientos se resuelve con pocos viajes. Cuando agendas, avísanos que vienes de Ibarra para coordinar horarios que te calcen y evitar tiempos muertos."),
    P("Conviene también pedir el presupuesto completo por adelantado, así organizas los pagos y los viajes según las etapas del tratamiento. Un plan claro desde el inicio es lo que convierte la distancia en un detalle menor."),
    H2("Qué esperar en la primera valoración"),
    P("Una primera cita bien hecha no empieza con el torno. Empieza escuchando qué te trae, revisando tu boca, tomando la imagen diagnóstica que el caso pida y explicándote en palabras claras qué encontramos y qué opciones tienes. Al salir deberías tener claro tu diagnóstico, las alternativas de tratamiento con sus pros y contras, y un presupuesto por escrito. Con eso decides sin presión, en casa y con tiempo."),
    P("Si vienes desde Ibarra, aprovecha esa primera visita para preguntar todo: plazos, número de citas, formas de pago y qué se puede agrupar. Cuanto más claro salgas de la valoración, mejor planificas los viajes y menos vueltas das."),
    H2("Preguntas frecuentes"),
    P("<strong>¿Vale la pena viajar de Ibarra a Otavalo?</strong><br>Para tratamientos importantes, sí: eliges por el profesional y el diagnóstico, y son pocos minutos."),
    P("<strong>¿ Coordinan las citas para no viajar tanto?</strong><br>Sí, agrupamos lo posible para que cada visita rinda."),
    P("<strong>¿Dan presupuesto antes de empezar?</strong><br>Sí, detallado y por escrito tras la valoración."),
    P("<strong>¿Atienden urgencias?</strong><br>Escríbenos por WhatsApp y coordinamos según el caso."),
    ])

# 4. Prótesis fija vs removible
add(9,"protesis-fija-vs-removible-cual-conviene","Prótesis fija o removible: cuál te conviene y por qué",
    "Prótesis fija o removible: diferencias en comodidad, duración y precio, y cómo elegir la que te conviene. Valoración en Odontología Life, Otavalo.",
    "protesis fija o removible cual conviene",
    "Diferencias reales entre prótesis fija y removible en comodidad, duración y precio, y cómo saber cuál te conviene.",
    [
    P("Cuando hay que reemplazar dientes, la gran decisión es entre una prótesis <strong>fija</strong> —que no se quita— y una <strong>removible</strong> —que sacas para limpiar—. Las dos devuelven la sonrisa, pero cambian mucho en comodidad, duración y precio, y elegir mal se siente todos los días al comer."),
    P("Te explicamos las diferencias reales y cómo saber cuál te conviene."),
    H2("La diferencia de fondo"),
    P("La <strong>prótesis fija</strong> (sobre dientes o sobre implantes) queda anclada en la boca: funciona como dientes propios y no se mueve. La <strong>removible</strong> se apoya en la encía y se quita; es más económica, pero puede moverse y hay que acostumbrarse a ella."),
    TB(["","Fija","Removible"],
       [["Comodidad","Alta, no se mueve","Media, puede moverse"],
        ["Al comer","Como dientes propios","Requiere adaptación"],
        ["Precio","Mayor","Más accesible"],
        ["Duración","Larga con cuidado","Menor, se ajusta con el tiempo"],
        ["Limpieza","Como dientes naturales","Se retira para limpiar"]]),
    Q("La prótesis fija cuesta más pero se olvida uno de que la lleva; la removible cuesta menos pero recuerda cada día que está ahí. La elección es cuánto valoras esa diferencia."),
    H2("Cuál te conviene según tu caso"),
    UL(["<strong>Faltan uno o pocos dientes:</strong> la fija (implante o puente) suele ser la mejor.","<strong>Faltan muchos y el presupuesto manda:</strong> la removible resuelve por menos.","<strong>Quieres lo removible pero que no se mueva:</strong> la sobredentadura sobre implantes es el punto medio.","<strong>Falta hueso o hay enfermedad de encías:</strong> primero se trata; el plan se define después."]),
    H2("De qué depende el precio"),
    P("La fija cuesta más porque implica implantes o coronas y más trabajo de laboratorio; la removible es más accesible. Pero el precio real depende de cuántos dientes reemplazas y del estado de tu boca. Un valor de listado no aplica hasta ver tu caso."),
    H2("Cómo se cuida cada una en el día a día"),
    P("La prótesis fija se limpia como los dientes naturales: cepillado, hilo o cepillos interdentales y controles periódicos. La sobre implantes pide además cuidado alrededor de cada implante para evitar inflamación de la encía. La removible se retira para limpiarla, se cepilla fuera de la boca y conviene dejarla en remojo según la indicación; también hay que higienizar la encía que queda debajo."),
    P("Ese detalle cambia la rutina de cada día. A algunas personas les acomoda poder sacar la prótesis y limpiarla aparte; a otras les resulta un fastidio y prefieren la fija justamente para no pensar en eso. No es un tema menor: es lo que vas a hacer cada mañana durante años."),
    H2("Qué pasa con el hueso a largo plazo"),
    P("Hay una diferencia que no se ve pero pesa. Cuando falta un diente, el hueso de esa zona tiende a reabsorberse con el tiempo. Las prótesis sobre implantes estimulan el hueso y frenan esa pérdida, porque el implante trabaja parecido a una raíz. Las removibles que solo se apoyan en la encía no lo evitan, así que con los años el reborde cambia y la prótesis necesita ajustes o rebases para seguir calzando."),
    P("Por eso, en casos de pérdida de varias piezas, muchos pacientes que empiezan pensando solo en el precio terminan valorando el implante cuando entienden que protege el hueso que aún tienen. La valoración es donde ese cálculo se vuelve concreto para tu caso."),
    H2("Las tres formas de prótesis fija"),
    P("«Fija» no es una sola cosa. Cuando falta un diente entre dos sanos, un <strong>puente</strong> se apoya en los vecinos, aunque implica tallarlos. Cuando quieres reemplazar el diente sin tocar los de al lado, el <strong>implante unitario</strong> con su corona es la opción más conservadora. Y cuando faltan muchos dientes, una <strong>prótesis fija sobre varios implantes</strong> devuelve toda la arcada sin quitarse. Cada una encaja en un escenario distinto."),
    TB(["Situación","Opción fija típica"],
       [["Falta un diente, los vecinos sanos","Implante unitario"],
        ["Falta un diente, vecinos con coronas","Puente"],
        ["Faltan varios o toda la arcada","Prótesis fija sobre implantes"]]),
    P("El puente resuelve rápido pero compromete dientes sanos; el implante respeta el resto de tu boca pero pide hueso suficiente y más tiempo. Ninguna es mejor en abstracto: depende de qué dientes te faltan y del estado de los que quedan."),
    H2("Empezar removible y migrar a fija"),
    P("No siempre hay que decidir todo de golpe. Es válido empezar con una removible bien hecha —por presupuesto o por tiempo— y planificar migrar a implantes más adelante. Lo importante es que ese plan se converse desde el inicio, para cuidar el hueso mientras tanto y no tomar decisiones que cierren la puerta a la opción fija después. Una hoja de ruta clara vale más que elegir a las apuradas."),
    H2("Cuándo NO decidir solo por el precio"),
    P("Elegir la removible solo porque es más barata, cuando tu caso pedía una fija, termina en incomodidad diaria y ajustes constantes. Y pagar una fija cuando una removible bien hecha te servía es gastar de más. La valoración es la que evita los dos errores."),
    H2("Preguntas frecuentes"),
    P("<strong>¿La prótesis fija es siempre mejor?</strong><br>Es más cómoda y dura más, pero no siempre es la indicada; depende de tu caso y presupuesto."),
    P("<strong>¿La removible se ve natural?</strong><br>Las modernas (flexibles) se ven bien; aun así se sienten distintas a la fija."),
    P("<strong>¿ Puedo pasar de removible a fija después?</strong><br>Sí, muchos empiezan con removible y luego migran a implantes."),
    P("<strong>¿Cuál me conviene a mí?</strong><br>Depende de tu boca y presupuesto; en la valoración te mostramos las opciones con precio."),
    ])

def existing():
    got=set()
    for st in ("publish","future","draft","pending","private"):
        page=1
        while True:
            try:
                arr=json.loads(urllib.request.urlopen(urllib.request.Request(f"{API}/posts?per_page=100&page={page}&status={st}&_fields=slug",headers=Hg),timeout=30).read())
            except Exception: break
            if not arr: break
            got|={a['slug'] for a in arr}
            if len(arr)<100: break
            page+=1
    return got

def run():
    have=existing()
    for post in POSTS:
        if post['slug'] in have:
            print(f"  [YA] {post['slug']}"); continue
        w=len(re.findall(r'\w+',re.sub(r'<[^>]+>',' ',post['content'])))
        body={"slug":post['slug'],"title":post['title'],"status":"publish","content":post['content'],
              "excerpt":post['excerpt'],"categories":[post['cat']],
              "meta":{"_yoast_wpseo_title":post['title'][:60],"_yoast_wpseo_metadesc":post['meta'],"_yoast_wpseo_focuskw":post['fkw']}}
        try:
            r=urllib.request.urlopen(urllib.request.Request(f"{API}/posts",data=json.dumps(body).encode(),headers=Hp,method='POST'),timeout=45)
            d=json.loads(r.read()); print(f"  [OK] id={d['id']} {post['slug']} · {w} pal · {r.status}")
            time.sleep(6)
        except Exception as e:
            print(f"  [ERR] {post['slug']}: {str(e)[:130]}"); time.sleep(15)

if __name__=="__main__": run()
