#!/usr/bin/env python3
"""Bloque D (cierre) · decisión de compra, posts 19 y 20."""
from gutenberg import CAT, LISTADO, INVENTARIO, link, wa, guarda, post_url

GUI = CAT["guias"]
MOD = CAT["modelos"]
TRA = CAT["tramites"]
FIN = CAT["financiamiento"]
U_DEVAL = post_url(GUI, "cuanto-se-devalua-un-auto-usado-ecuador")
U_KM = post_url(GUI, "kilometraje-auto-usado-cuanto-es-mucho")
U_MANT = post_url(MOD, "autos-usados-menos-mantenimiento")
U_PAPELES = post_url(TRA, "papeles-antes-de-comprar-auto-usado")
U_REVISION = post_url(TRA, "revision-mecanica-antes-de-comprar-auto")
U_DIRECTO = post_url(FIN, "credito-directo-auto-usado-ecuador")

POSTS = []

# ── 19 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Qué autos usados piden menos mantenimiento en Ecuador",
 "slug": "autos-usados-menos-mantenimiento",
 "date": "2026-10-12T09:00:00",
 "cat": MOD,
 "tags": ["mantenimiento", "confiabilidad", "repuestos", "auto usado"],
 "focus_kw": "autos usados con menos mantenimiento",
 "yoast_title": "Qué autos usados piden menos mantenimiento",
 "yoast_desc": "Que hace barato o caro mantener un auto en Ecuador: repuestos, red de talleres, mecanica simple y cuanto suma al anio cada tipo de vehiculo.",
 "excerpt": "No depende tanto de la marca como de tres factores concretos. Cómo estimar el costo anual antes de comprar.",
 "bloques": [
   "«¿Cuál es más económico de mantener?» es la pregunta que más se repite en el patio después del precio. Y la respuesta que la gente espera es una marca, cuando en realidad depende de tres factores que aplican a cualquier vehículo.",
   "Aquí van esos factores, cómo estimar el gasto anual antes de comprar y qué tipos de auto salen mejor parados en Ecuador.",

   {"h2": "Los tres factores que deciden"},
   {"h3": "1. Disponibilidad y precio de repuestos"},
   "Es el factor de mayor peso, por lejos. Un modelo con repuestos abundantes y alternativas genéricas se mantiene barato aunque tenga años. Uno con repuestos que hay que importar puede dejarte el auto parado tres semanas por una pieza de $80.",
   "La pregunta práctica antes de comprar: ¿hay repuestos de este modelo en Ibarra o hay que traerlos de Quito? Esa sola respuesta mueve el costo anual de forma notable.",
   {"h3": "2. Red de talleres que lo conozca"},
   "Un modelo común lo repara cualquier mecánico del barrio. Uno raro exige taller especializado, que cobra más y está más lejos. En provincia esto pesa el doble que en Quito o Guayaquil.",
   {"h3": "3. Complejidad mecánica"},
   "Menos sistemas, menos cosas que fallan. Un motor atmosférico sencillo con caja manual es más barato de mantener que uno turbo con caja automática de doble embrague, sin discusión.",
   "Eso no significa que lo complejo sea mala compra: significa que hay que presupuestarlo distinto.",

   {"h2": "Cuánto cuesta mantener un auto al año"},
   "Rangos realistas en Ecuador para un vehículo particular con uso normal, sin contar combustible ni seguro:",
   {"tabla": [["Tipo de vehículo", "Mantenimiento anual", "Qué incluye"], [
     ["Sedán compacto, motor simple", "$300 – $500", "2 cambios de aceite, filtros, frenos ocasionales"],
     ["SUV mediana a gasolina", "$450 – $750", "Lo anterior más neumáticos más caros"],
     ["Camioneta diésel", "$600 – $1.100", "Servicios más caros, pero intervalos más largos"],
     ["Vehículo turbo con caja automática", "$700 – $1.300", "Fluidos específicos y servicios especializados"],
   ]]},
   "A esos valores hay que sumarles los reemplazos por kilometraje —embrague, amortiguadores, correa de distribución—, que no son anuales pero llegan.",

   {"quote": "Al cliente le decimos que pregunte por el repuesto antes que por la marca. Traemos vehículos que se mantienen bien acá, con talleres cerca y piezas que se consiguen. Un auto barato que te deja parado esperando una pieza no salió barato.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Qué tipos salen mejor parados"},
   {"ul": [
     "<strong>Modelos con años en el mercado ecuatoriano.</strong> Cuando un modelo lleva tiempo circulando, hay repuestos, hay mecánicos que lo conocen y hay historial de qué le falla.",
     "<strong>Motores atmosféricos</strong> de cilindrada moderada, sin turbo ni sistemas de inyección directa complejos.",
     "<strong>Cajas manuales</strong>, más baratas de reparar que las automáticas, aunque menos cómodas en ciudad.",
     "<strong>Marcas con red de servicio consolidada</strong> en el norte del país, que es donde vas a llevar el auto.",
   ]},
   "Y en el otro extremo: vehículos importados en poca cantidad, modelos que salieron rápido del mercado, y versiones muy equipadas con electrónica que en provincia pocos talleres saben diagnosticar.",
   "Un matiz importante sobre las versiones tope de gama. Suelen ser tentadoras en el mercado de seminuevos porque su precio cayó más que el de las versiones básicas del mismo modelo. Lo que no cae es el costo de sus componentes: techo corredizo, suspensión electrónica, faros con módulos propios. Cuando algo de eso falla a los ocho años, la reparación no tiene nada de económica.",

   {"h2": "Lo que encarece el mantenimiento sin que sea culpa del auto"},
   "Buena parte del gasto anual no depende del vehículo sino de cómo se lo trata. Cuatro hábitos que suben la cuenta de cualquier modelo:",
   {"ul": [
     "<strong>Estirar los intervalos de servicio.</strong> Ahorrar un cambio de aceite es el camino más corto a una reparación de motor.",
     "<strong>Usar repuestos de la calidad más baja disponible.</strong> Duran menos y se reemplazan más seguido, así que terminan costando más.",
     "<strong>Ignorar ruidos pequeños.</strong> Un rodamiento que suena y se deja pasar termina llevándose la maza completa.",
     "<strong>Rotar de taller sin historial.</strong> Cuando nadie conoce el auto, cada diagnóstico empieza de cero y se paga de cero.",
   ]},
   "En la sierra hay además un factor de camino: pendientes constantes, empedrados y variaciones de temperatura castigan suspensión y frenos más que el uso en plano. Conviene revisar esos dos sistemas con más frecuencia de la que indica el manual.",

   {"h2": "El caso de los híbridos y eléctricos"},
   "Merecen párrafo propio porque la respuesta cambia según qué se mire. En mantenimiento rutinario salen bien: menos piezas móviles, frenos que duran más por la regeneración, sin cambios de aceite en el caso de los eléctricos.",
   "El punto a considerar es la batería, cuya vida útil es larga pero finita, y cuyo reemplazo es un gasto mayor. Antes de comprar un híbrido usado conviene averiguar el estado de la batería y qué cuesta reemplazarla en el país.",
   f"En el {link(LISTADO, 'patio')} hemos tenido opciones de este tipo, y lo que siempre recomendamos es hacer la cuenta a cinco años en lugar de solo mirar el ahorro mensual de combustible.",

   {"h2": "Cómo estimar el costo antes de comprar"},
   {"ol": [
     "<strong>Llama a dos talleres</strong> de tu ciudad y pregunta cuánto cobran un servicio completo de ese modelo.",
     "<strong>Cotiza tres repuestos comunes</strong>: pastillas de freno, filtro de aceite y un amortiguador. Si conseguirlos cuesta trabajo, ya sabes.",
     "<strong>Pregunta por el precio de los neumáticos</strong> en la medida que usa. En SUV grandes es un rubro fuerte y se olvida.",
     "<strong>Averigua si el modelo tiene fallas conocidas</strong> a cierto kilometraje. Los foros y los mecánicos locales lo saben.",
     "<strong>Suma todo y divídelo entre doce.</strong> Ese número va junto a la cuota, no aparte de ella.",
   ]},
   f"Ese cálculo, junto con el de {link(U_DEVAL, 'la depreciación del vehículo')}, es lo que de verdad dice cuánto cuesta un auto. El precio de la etiqueta es apenas el comienzo.",
   f"Y para revisar el estado real del vehículo que estás mirando, la guía está en {link(U_REVISION, 'la revisión mecánica antes de comprar')}.",
   {"faq": [
     ("¿Los autos chinos son caros de mantener?",
      "Depende de la marca y de su red en Ecuador. Las que llevan años con representación establecida tienen repuestos y talleres; las que recién llegan todavía no. Es una pregunta de red de servicio, no de origen."),
     ("¿Conviene un diésel para uso en ciudad?",
      "Generalmente no. Los diésel rinden en recorridos largos; en ciudad con trayectos cortos sufren y su mantenimiento es más caro."),
     ("¿La caja automática se daña más?",
      "No necesariamente, pero repararla cuesta bastante más. Con mantenimiento de fluido al día duran sin problema."),
     ("¿Cada cuánto hay que hacer el mantenimiento?",
      "Lo que diga el fabricante, y en Ecuador conviene acortar un poco los intervalos por las condiciones de camino y altura."),
   ]},
   f'¿Quieres saber qué cuesta mantener un auto específico? <a href="{wa("Hola, quiero saber cuanto cuesta mantener un auto de OKCars")}">Escríbenos por WhatsApp</a> con el modelo que te interesa y te damos los valores reales de servicio y repuestos en la zona.',
 ]})

# ── 20 ───────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Comprar en patio o a particular: ventajas y riesgos de cada opción",
 "slug": "comprar-auto-patio-o-particular",
 "date": "2026-10-14T09:00:00",
 "cat": GUI,
 "tags": ["guía de compra", "seminuevos", "patio de autos", "particular"],
 "focus_kw": "comprar auto en patio o particular",
 "yoast_title": "Comprar auto en patio o a particular: qué conviene",
 "yoast_desc": "Cuanto cuesta de verdad cada opcion, que riesgos asume el comprador en cada una y en que casos comprar a un particular sale mejor que ir a un patio.",
 "excerpt": "El particular es más barato en la etiqueta. La pregunta es cuánto vale lo que asumes tú y no asume nadie más.",
 "bloques": [
   "Un mismo auto puede costar $1.500 más en un patio que en un anuncio de un particular. Esa diferencia es real y merece una explicación honesta, sobre todo viniendo de un patio.",
   "Aquí va la comparación completa, incluyendo los casos donde comprar a un particular es la decisión correcta.",

   {"h2": "Por qué el precio es distinto"},
   "La diferencia no es margen puro. Entre que un vehículo entra a un patio y sale vendido, hay costos que el particular no tiene:",
   {"tabla": [["Concepto", "Patio", "Particular"], [
     ["Revisión mecánica previa", "La hace el patio", "No existe"],
     ["Alistamiento y reparaciones menores", "Incluido", "A cuenta del comprador"],
     ["Verificación documental", "Hecha antes de recibir el auto", "Tarea del comprador"],
     ["Garantía comercial", "Sí, según el patio", "Ninguna"],
     ["Gestión de traspaso", "Generalmente incluida", "La haces tú"],
     ["Opción de financiamiento", "Sí", "Solo si consigues crédito aparte"],
     ["Recibir tu auto en parte de pago", "Sí", "Casi nunca"],
   ]]},
   "Dicho de forma directa: el patio cobra por asumir riesgo y trabajo que, en la otra opción, asume el comprador.",
   "Hay además un costo que no aparece en ninguna tabla: el capital detenido. Un vehículo puede pasar semanas o meses en el patio antes de venderse, y ese dinero inmovilizado tiene un precio. El particular no lo tiene porque vende un solo auto, el suyo, y mientras tanto lo sigue usando.",

   {"h2": "Cuándo conviene comprar a un particular"},
   "Hay casos claros, y decirlos no nos quita nada:",
   {"ul": [
     "<strong>Si conoces al vendedor</strong> y sabes cómo usó el auto. Es la mejor compra posible cuando existe.",
     "<strong>Si sabes de mecánica</strong> o tienes un mecánico de confianza que lo revise a fondo.",
     "<strong>Si vas a pagar de contado</strong> y no necesitas financiamiento ni entregar otro vehículo.",
     "<strong>Si tienes tiempo</strong> para buscar, ver varios autos, hacer trámites y esperar.",
     "<strong>Si el precio es claramente mejor</strong> y la diferencia cubre con holgura cualquier arreglo previsible.",
   ]},

   {"h2": "Cuándo conviene el patio"},
   {"ul": [
     "<strong>Si necesitas financiamiento.</strong> Es la razón más frecuente y la más práctica.",
     "<strong>Si vas a entregar tu auto actual</strong> como parte de pago.",
     "<strong>Si no quieres asumir el riesgo documental.</strong> Prendas, multas y gravámenes son el problema más caro de la compra entre particulares.",
     "<strong>Si valoras tener a quién reclamar</strong> si algo aparece en las primeras semanas.",
     "<strong>Si tienes poco tiempo</strong> y prefieres ver varias opciones el mismo día en un solo lugar.",
   ]},

   {"quote": "Le decimos al cliente que si tiene un tío con un auto bien cuidado, se lo compre al tío. Nosotros competimos con lo demás: con el anuncio de un desconocido, con el auto sin revisar, con el que trae una prenda que nadie mencionó.",
    "cite": "Equipo comercial de OKCars"},

   {"h2": "Cómo comprar bien a un particular"},
   "Si eliges esa vía, el procedimiento que reduce casi todo el riesgo es este, en este orden:",
   {"ol": [
     "<strong>Pide copia de matrícula y cédula del titular</strong> antes de ir a ver el auto.",
     "<strong>Haz las consultas en línea</strong> de multas y gravámenes con la placa, desde tu casa.",
     "<strong>Verifica chasis y motor</strong> contra la matrícula, físicamente, en el vehículo.",
     "<strong>Llévalo a un peritaje</strong> en un taller que elijas tú, nunca el que sugiera el vendedor.",
     "<strong>Negocia con las cotizaciones en la mano</strong>, no con adjetivos.",
     "<strong>Paga y firma en el mismo acto</strong>, ante notario, sin excepciones.",
     "<strong>Haz el traspaso de inmediato</strong>, no «la próxima semana».",
   ]},
   "Los siete pasos toman una semana y cuestan menos de $200 entre peritaje y trámites. Saltarse cualquiera de ellos es donde nacen las historias que llegan después al patio.",

   {"h2": "Los riesgos concretos de la compra entre particulares"},
   "No son teóricos. Son los casos que llegan al patio después de haber pasado:",
   {"ol": [
     "<strong>Vehículo con prenda vigente.</strong> El comprador pagó, no puede transferir, y el vendedor ya gastó el dinero.",
     "<strong>Multas heredadas.</strong> Aparecen al intentar el traspaso y salen del bolsillo del comprador.",
     "<strong>Falla mecánica en las primeras semanas.</strong> Sin garantía y sin a quién reclamar.",
     "<strong>Kilometraje alterado.</strong> Se descubre en el primer servicio de taller.",
     "<strong>Vendedor que no es el titular</strong> y no tiene poder para vender.",
     "<strong>Choque estructural oculto</strong> bajo una pintura reciente.",
   ]},
   f"Todos se previenen con la revisión documental y mecánica. Las guías están en {link(U_PAPELES, 'papeles que debes pedir antes de comprar')} y en {link(U_REVISION, 'la revisión mecánica previa')}. Si vas a comprar a un particular, esos dos pasos no son opcionales.",

   {"h2": "Qué preguntarle a un patio antes de comprarle"},
   "No todos los patios trabajan igual, y la diferencia entre uno serio y uno que solo intermedia se detecta con cinco preguntas:",
   {"ul": [
     "<strong>¿Qué revisión le hicieron a este vehículo</strong> y me la pueden mostrar?",
     "<strong>¿Puedo llevarlo a mi mecánico?</strong> La respuesta define bastante.",
     "<strong>¿Qué garantía dan, qué cubre y por cuánto tiempo?</strong> Que quede por escrito.",
     "<strong>¿El traspaso está incluido</strong> o se cobra aparte?",
     "<strong>¿De dónde vino el auto</strong> y por qué lo vendieron?",
   ]},
   "Un patio que responde las cinco con soltura te está mostrando cómo trabaja. Uno que se incomoda con la segunda o la quinta también.",

   {"h2": "La cuenta completa, no la de la etiqueta"},
   "Supongamos el mismo vehículo: $13.000 en un patio, $11.500 en un anuncio particular. La diferencia parece de $1.500.",
   {"tabla": [["Concepto", "Patio", "Particular"], [
     ["Precio", "$13.000", "$11.500"],
     ["Peritaje mecánico", "—", "$50"],
     ["Alistamiento previsible", "—", "$300 – $800"],
     ["Trámite de traspaso", "Incluido", "$120"],
     ["Tu tiempo (búsqueda y gestiones)", "—", "1 a 3 semanas"],
     ["Riesgo documental", "Del patio", "Tuyo"],
     ["Total en dinero", "$13.000", "$11.970 – $12.470"],
   ]]},
   "La diferencia real termina entre $500 y $1.000, no $1.500, y a cambio el comprador particular asume todo el riesgo y varias semanas de gestión. Para algunas personas ese cambio vale la pena; para otras, no.",
   f"Si además necesitas financiar, la comparación se cierra sola: conseguir crédito para una compra entre particulares es bastante más difícil. El panorama de opciones está en {link(U_DIRECTO, 'cómo funciona el crédito directo')}.",
   f"En Ibarra, Otavalo y toda la zona norte hay buen mercado en ambos lados. Lo que recomendamos es no decidir por el precio de la etiqueta sino por esta cuenta completa, mires el {link(LISTADO, 'listado del patio')} o un anuncio de un particular.",
   {"faq": [
     ("¿Los patios dan garantía?",
      "Varía por patio y por vehículo. Conviene preguntar qué cubre exactamente y por cuánto tiempo, y que quede por escrito."),
     ("¿Puedo llevar mi mecánico a revisar un auto del patio?",
      "En un patio serio, sí. Una negativa a eso es señal suficiente para irse."),
     ("¿Es más caro el traspaso comprando a un particular?",
      "El trámite cuesta lo mismo, pero lo gestionas tú. Muchos patios lo incluyen en el precio."),
     ("¿Conviene comprar por redes sociales?",
      "Es un anuncio de particular con menos filtro todavía. Aplican las mismas verificaciones, con más cuidado."),
   ]},
   f'¿Estás comparando opciones? <a href="{wa("Hola, estoy comparando autos y quiero asesoria")}">Escríbenos por WhatsApp</a> y te damos nuestra opinión honesta sobre el auto que estás mirando, sea nuestro o de un particular. Preferimos que compres bien a que compres apurado.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
