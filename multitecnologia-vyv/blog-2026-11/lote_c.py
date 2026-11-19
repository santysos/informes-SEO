#!/usr/bin/env python3
"""Lote C del mes 2 (Multitecnología VYV): n = 3, 4, 6, 8, 18.

Escribe specs/NN-slug.json. Los enlaces internos salen de productos.json y
enlaces.json para que no haya URLs inventadas.

  python3 lote_c.py && python3 publish_batch.py --validate
"""
import json, os

AQUI = os.path.dirname(os.path.abspath(__file__))
PROD = {p["id"]: p for p in json.load(open(os.path.join(AQUI, "productos.json")))}
ENL = json.load(open(os.path.join(AQUI, "enlaces.json")))
CAT = {c["name"]: c["url"] for c in ENL["categorias"]}
POST = {p["slug"]: p["url"] for p in ENL["posts"]}


def a(url, texto):
    return f'<a href="{url}">{texto}</a>'


def pr(i, texto):
    return a(PROD[i]["url"], texto)


def cat(nombre, texto):
    return a(CAT[nombre], texto)


def post(slug, texto):
    return a(POST[slug], texto)


SPECS = []

# ─────────────────────────────────────────────────────────────────────────────
# n=3 · Candado para laptop
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 3,
    "slug": "candado-para-laptop-clave-llave-ranura",
    "title": "Candado para laptop: cómo elegir ranura, clave o llave",
    "focus_kw": "candado para laptop",
    "meta_desc": "Las tres ranuras de seguridad (estándar, nano y cuña de Dell), cómo medirlas y cuándo conviene clave o llave. Guía para oficinas y tiendas.",
    "excerpt": "Antes de pedir un candado para laptop tienes que saber qué ranura trae el equipo. Te explicamos las tres medidas, cómo reconocerlas y cuándo elegir clave o llave.",
    "category": "Componentes y accesorios",
    "tags": ["candado laptop", "seguridad", "accesorios laptop", "Dell", "oficinas"],
    "featured": {"pexels_query": "laptop security cable lock desk",
                 "alt": "Laptop asegurada a un escritorio con un candado de cable"},
    "inline_image": {"pexels_query": "laptop side ports closeup",
                     "alt": "Costado de una laptop con sus puertos y la ranura de seguridad",
                     "after_section": 2},
    "intro_html": (
        "<p>Un cliente entra a la tienda y pide «un candado para la laptop». Le vendes el primero que tienes, "
        "llega a la oficina y el cabezal no entra. El problema casi nunca es el candado: es la ranura, que no "
        "mide lo mismo en todas las marcas.</p>\n"
        "<p>Elegir un <strong>candado para laptop</strong> toma dos decisiones: qué ranura tiene el equipo y si "
        "el candado se abre con clave o con llave. Aquí te explicamos cómo reconocer cada ranura, cómo medirla "
        "y qué modelo pedir según quién va a usar la laptop.</p>"),
    "sections": [
        {"h2": "Respuesta corta: primero la ranura, después clave o llave",
         "html": (
             "<p>Existen tres ranuras de seguridad en laptops y no son intercambiables. Kensington, la marca que "
             "creó el sistema, las describe así: la <strong>estándar</strong> mide unos 3 × 7 mm, la "
             "<strong>nano</strong> unos 2,5 × 6 mm y la de <strong>cuña</strong>, que usa la mayoría de laptops "
             "Dell, unos 3,2 × 4,5 mm.</p>\n"
             "<p>Si el cabezal del candado no coincide con la ranura, no traba o queda flojo, y un candado flojo "
             "se saca con un tirón. Por eso la medida va primero. La elección entre clave y llave depende de "
             "cómo se maneja el equipo: una persona que lo lleva a todos lados o un área de sistemas que cuida "
             "veinte laptops.</p>")},
        {"h2": "Las tres ranuras y el candado que corresponde",
         "html": (
             "<p>La ranura suele estar en un costado, cerca de la parte trasera, y casi siempre tiene al lado un "
             "pequeño dibujo de un candado. Esta tabla te ayuda a ubicar cuál es:</p>\n"
             "<table>\n<thead><tr><th>Ranura</th><th>Medida aproximada</th><th>Dónde aparece</th>"
             "<th>Candado en nuestro catálogo</th></tr></thead>\n<tbody>\n"
             "<tr><td>Estándar (K-Slot)</td><td>3 × 7 mm</td><td>Laptops de oficina de varias marcas</td><td>"
             + pr(6735, "Candado con clave ranura 3.0×7.0 mm") + "</td></tr>\n"
             "<tr><td>Nano</td><td>2,5 × 6 mm</td><td>Equipos delgados de HP, Lenovo y Asus</td><td>"
             + pr(6738, "Candado HP y Lenovo ranura 2.5 × 6.0 mm") + " (consulta reposición)</td></tr>\n"
             "<tr><td>Cuña (Wedge)</td><td>3,2 × 4,5 mm</td><td>La mayoría de laptops Dell</td><td>"
             + pr(6736, "Candado Dell con clave") + " o " + pr(6737, "con llave") + "</td></tr>\n"
             "</tbody>\n</table>\n"
             "<p>Los cuatro modelos traen un cable de 1,80 m, suficiente para rodear la pata de un escritorio y "
             "llegar a la laptop sin tensión.</p>")},
        {"h2": "Cómo medir la ranura sin equivocarte",
         "html": (
             "<p>A simple vista la estándar y la nano se parecen mucho: las dos son rectangulares. La de cuña se "
             "reconoce porque es más corta y sus lados no son paralelos. Para no fallar, sigue este orden:</p>\n"
             "<ol>\n"
             "<li>Busca el ícono del candado en los costados y en la parte trasera de la laptop.</li>\n"
             "<li>Mira la forma: rectángulo de esquinas rectas (estándar o nano) o una abertura en forma de "
             "trapecio (cuña).</li>\n"
             "<li>Mide el largo con un calibrador. Unos 7 mm es estándar; unos 6 mm es nano.</li>\n"
             "<li>Si no tienes calibrador, busca el manual del modelo exacto en la página del fabricante: suele "
             "indicar el tipo de ranura.</li>\n"
             "<li>Anota la marca, el modelo y el tipo de ranura en la orden de compra antes de pedir.</li>\n"
             "</ol>\n"
             "<p>Si vas a equipar una oficina con laptops de varias marcas, haz este inventario antes de cotizar. "
             "Así pides la cantidad justa de cada medida y no te quedan candados sin uso.</p>")},
        {"h2": "Clave o llave: qué elegir según quién usa la laptop",
         "html": (
             "<p>El candado con <strong>clave</strong> funciona bien cuando la laptop tiene un solo usuario. No "
             "hay llave que perder y la persona lo abre en segundos al llegar o al irse. El riesgo es que la "
             "combinación se comparta o se olvide; anótala en un lugar seguro desde el primer día.</p>\n"
             "<p>El candado con <strong>llave</strong> encaja mejor en empresas, colegios y laboratorios. El área "
             "de sistemas guarda las llaves rotuladas y decide quién puede mover cada equipo. Para Dell tienes las "
             "dos versiones: " + pr(6736, "con clave") + " y " + pr(6737, "con llave") + ", ambas para la "
             "ranura de cuña.</p>\n"
             "<p>Un consejo práctico para quien entrega los equipos: deja el candado ya instalado y probado en la "
             "laptop. Muchas devoluciones son de personas que no encontraron la ranura o no sabían cómo girar el "
             "cabezal.</p>")},
        {"h2": "Dónde se usan más: oficinas, aulas y vitrinas",
         "html": (
             "<p>En Quito, la demanda viene sobre todo de oficinas con puestos compartidos, coworkings y "
             "consultorios donde la laptop queda sobre el escritorio mientras la persona sale a una reunión. En "
             "Cuenca y Loja se piden mucho para universidades y laboratorios de colegios, donde un mismo salón "
             "recibe a varios grupos al día.</p>\n"
             "<p>Las tiendas de computación de Guayaquil y Manta los usan en las laptops de exhibición: el cliente "
             "puede tocar el equipo y probar el teclado, pero no llevárselo. Para ese caso, pasa el cable por una "
             "pieza fija del mueble, nunca por una silla o una pata que se pueda levantar.</p>\n"
             "<p>En hoteles, ferias y salas de capacitación pasa lo mismo: el candado frena el robo de oportunidad, "
             "que es el más común.</p>")},
        {"h2": "Cuándo NO te conviene un candado de cable",
         "html": (
             "<ul>\n"
             "<li><strong>Si la laptop no tiene ranura.</strong> Varias ultradelgadas recientes y las MacBook no la "
             "traen. Ahí sirve más un cajón con llave o un mueble con seguro.</li>\n"
             "<li><strong>Si el riesgo es un robo planificado.</strong> Un cable de acero disuade y retrasa, pero "
             "una cizalla lo corta. En bodegas o locales con ese riesgo, la solución pasa por "
             + cat("CONTROLES DE ACCESO", "control de acceso") + " y cámaras.</li>\n"
             "<li><strong>Si la laptop viaja todo el día.</strong> Para quien se mueve entre clientes, conviene más "
             "un buen " + cat("ESTUCHES LAPTOP", "estuche o mochila") + " y no perder de vista el equipo.</li>\n"
             "</ul>")},
        {"h2": "Para tiendas y áreas de sistemas: cómo pedirlos",
         "html": (
             "<p>Si vendes accesorios, ten al menos candados para la ranura estándar y para Dell, que son los que "
             "más se piden en oficinas. Todos están en la categoría de "
             + cat("CANDADOS LAPTOP", "candados para laptop") + ", con la medida de la ranura en el nombre.</p>\n"
             "<p>Si compras para una empresa, arma un solo pedido con candados, estuches y protectores. En la guía "
             "de " + post("accesorios-computacion-por-mayor", "accesorios de computación por mayor") + " te "
             "contamos cómo organizar ese tipo de compra. Con tu cuenta comercial ves precios de distribuidor y "
             "despachamos desde Quito a cualquier provincia.</p>")},
    ],
    "products": [6735, 6736, 6737, 6807],
    "cta_mid": {"title": "¿No sabes qué ranura tiene la laptop?",
                "text": "Envíanos la marca y el modelo, o una foto del costado del equipo, y te decimos qué candado corresponde.",
                "wa_text": "Hola, vengo del artículo de candados para laptop y quiero saber cuál le sirve a mi equipo"},
    "cta_end": {"title": "Candados para laptop por mayor",
                "text": "Crea tu cuenta comercial y ve los precios de distribuidor en candados, estuches y accesorios para oficina.",
                "wa_text": "Hola, vengo del artículo de candados para laptop y quiero cotizar al por mayor"},
    "faq": [
        {"q": "¿Un candado para la ranura estándar sirve en una laptop Dell?",
         "a": "Por lo general no. La mayoría de laptops Dell usan la ranura de cuña, de unos 3,2 × 4,5 mm, y necesitan un candado hecho para esa forma. Revisa la ranura antes de comprar."},
        {"q": "¿Cómo sé si mi laptop tiene ranura de seguridad?",
         "a": "Busca en los costados una abertura pequeña junto a un ícono de candado. Si no la encuentras, revisa el manual del modelo en la página del fabricante."},
        {"q": "¿Qué es mejor, candado con clave o con llave?",
         "a": "La clave es más cómoda para una persona que usa siempre la misma laptop. La llave conviene en empresas y aulas, donde el área de sistemas controla quién puede mover cada equipo."},
        {"q": "¿Un candado evita cualquier robo?",
         "a": "No. Frena el robo de oportunidad, que es el más frecuente en oficinas, aulas y vitrinas. Contra un robo planificado con herramientas hace falta sumar otras medidas de seguridad."},
    ],
    "fuentes": [
        "https://www.kensington.com/news/security-blog/types-of-laptop-locks-kslot-nano-wedge-explained/",
        PROD[6735]["url"], PROD[6736]["url"], PROD[6737]["url"], PROD[6738]["url"],
    ],
})

# ─────────────────────────────────────────────────────────────────────────────
# n=4 · Comparativa de UPS
# ─────────────────────────────────────────────────────────────────────────────
CDP_1008 = "https://cdpenergy.com/productdetails.asp?prd=MTA2&prdn=Ui1VUFIxMDA4&mf="
SPECS.append({
    "n": 4,
    "slug": "comparativa-ups-aplus-forza-cdp-powest",
    "title": "Comparativa de UPS: Aplus, Forza, CDP y Powest",
    "focus_kw": "comparativa de UPS",
    "meta_desc": "Potencia real, batería, tipo interactivo u online, tomas y repuestos: cómo comparar UPS de cuatro marcas para tu casa u oficina en Ecuador.",
    "excerpt": "Comparamos UPS de Aplus, Forza, CDP y Powest con los datos que publica cada fabricante: vatios, batería, tomas con respaldo, regulación y repuesto de batería.",
    "category": "Marcas y comparativas",
    "tags": ["UPS", "Aplus", "protección de energía", "cortes de luz", "comparativa"],
    "featured": {"pexels_query": "uninterruptible power supply office computer",
                 "alt": "UPS de escritorio conectado a una computadora de oficina"},
    "inline_image": {"pexels_query": "power outage office dark computer",
                     "alt": "Oficina con una computadora encendida durante un corte de luz",
                     "after_section": 3},
    "intro_html": (
        "<p>Después de los cortes de luz programados de 2024, muchos hogares y oficinas de Ecuador compraron su "
        "primer UPS. Algunos acertaron y otros descubrieron, en el primer apagón, que el equipo se apagaba en "
        "dos minutos o que la computadora no estaba conectada a una toma con batería.</p>\n"
        "<p>Esta <strong>comparativa de UPS</strong> pone lado a lado cuatro marcas que se encuentran en el país: "
        "Aplus, que es la que distribuimos, y Forza, CDP y Powest. Usamos solo los datos que cada fabricante "
        "publica en su sitio oficial y comparamos por criterios que se pueden medir.</p>"),
    "sections": [
        {"h2": "Respuesta corta: compara vatios, batería y tomas, no la marca",
         "html": (
             "<p>Para una PC de oficina con su monitor, un módem y un router, un UPS interactivo de 800 a 1000 VA "
             "con regulador de voltaje cubre lo necesario en casa o en una oficina pequeña. Las cuatro marcas "
             "tienen modelos así. Lo que cambia entre ellas son tres datos: los <strong>vatios reales</strong>, la "
             "<strong>energía de la batería</strong> y cuántas tomas tienen respaldo.</p>\n"
             "<p>Si necesitas un servidor encendido sin interrupciones o equipos sensibles a la forma de onda, ahí "
             "conviene un UPS online, y ese tipo no lo tenemos en catálogo: Powest, CDP y Forza sí lo ofrecen.</p>")},
        {"h2": "Seis criterios que sí se pueden comparar",
         "html": (
             "<ul>\n"
             "<li><strong>VA y vatios.</strong> El VA es la potencia aparente; el límite real son los vatios (W). "
             "Un UPS de 1000 VA puede entregar 500 W o 600 W según el modelo.</li>\n"
             "<li><strong>Tipo.</strong> El interactivo pasa a batería cuando se va la luz y regula el voltaje "
             "mientras tanto. El online trabaja siempre desde su inversor, sin tiempo de transferencia.</li>\n"
             "<li><strong>Batería.</strong> Multiplica voltios por amperios hora: 12 V × 9 Ah son 108 Wh. Es la "
             "forma más honesta de comparar cuánta energía guarda cada equipo.</li>\n"
             "<li><strong>Tomas con respaldo.</strong> No todas las tomas tienen batería; algunas solo protegen "
             "contra picos.</li>\n"
             "<li><strong>Regulación de voltaje (AVR).</strong> Corrige bajones y subidas sin gastar batería.</li>\n"
             "<li><strong>Repuesto de batería.</strong> La batería se cambia cada pocos años. Importa que el "
             "formato sea común y que el compartimiento sea fácil de abrir.</li>\n"
             "</ul>")},
        {"h2": "Tabla: modelos de 800 a 1000 VA de las cuatro marcas",
         "html": (
             "<table>\n<thead><tr><th>Modelo</th><th>Potencia</th><th>Batería</th><th>Tomas</th>"
             "<th>Autonomía publicada</th><th>Otros datos</th></tr></thead>\n<tbody>\n"
             "<tr><td>" + pr(7650, "Aplus 5E1000N") + "</td><td>1000 VA / 600 W</td><td>2 × 12 V 7 Ah (168 Wh)</td>"
             "<td>10 + 2 RJ45</td><td>No figura en la ficha</td><td>Interactivo con regulador; compartimiento "
             "de batería de fácil recambio</td></tr>\n"
             "<tr><td>" + pr(7654, "Aplus 1E-800N") + "</td><td>800 VA / 480 W</td><td>1 × 12 V 9 Ah (108 Wh)</td>"
             "<td>8</td><td>No figura en la ficha</td><td>Regulador de dos pasos de subida y uno de bajada; arranque "
             "sin luz</td></tr>\n"
             "<tr><td>CDP R-UPR1008</td><td>1000 VA / 500 W</td><td>1 × 12 V 9 Ah (108 Wh)</td><td>8: 4 con "
             "batería y 4 solo con supresión</td><td>4 min a plena carga, 8 min a media carga</td><td>Interactivo, "
             "salida 120 V ±10 %, recarga al 90 % en 4 h, 300 J</td></tr>\n"
             "<tr><td>Powest Interactiva 1000VA</td><td>La ficha indica 1250 VA y factor 0,48</td><td>No figura "
             "en la ficha</td><td>6 reguladas + 2 bypass</td><td>7 min, sin indicar la carga</td><td>Onda senoidal "
             "modificada, entrada de 90 a 145 V, transferencia de 3 a 10 ms, USB</td></tr>\n"
             "<tr><td>Forza (series NT, FX, HT, SL, XG)</td><td>Varía por modelo</td><td>Varía por modelo</td>"
             "<td>Varía por modelo</td><td>Calculadora de autonomía en su sitio</td><td>Herramienta para "
             "buscar la batería de reemplazo</td></tr>\n"
             "</tbody>\n</table>\n"
             "<p>Lo que muestra la tabla: con la misma batería de 108 Wh, CDP publica 4 minutos a plena carga. El "
             "Aplus 5E1000N lleva dos baterías y suma 168 Wh, así que con la misma carga conectada guarda más "
             "energía. Las fichas de Forza se consultan modelo por modelo en su sitio; no las resumimos para no "
             "mezclar datos de versiones de 120 V y 220 V.</p>")},
        {"h2": "Interactivo u online: qué necesita cada caso",
         "html": (
             "<p>El <strong>interactivo</strong> es el que usa la mayoría de casas y oficinas. Cuando se va la luz, "
             "cambia a batería en pocos milisegundos: CDP publica de 2 a 4 ms y Powest de 3 a 10 ms en los modelos "
             "de la tabla. Una PC normal no nota el cambio.</p>\n"
             "<p>El <strong>online</strong> o de doble conversión entrega siempre la energía desde el inversor. "
             "Powest tiene la línea Winner de 1 kVA, con entrada de 80 a 140 V y factor de potencia 0,8; CDP ofrece "
             "online monofásicos de 1 a 3 kVA, y Forza las series EOS y Atlas. Es el tipo indicado para servidores, "
             "centrales telefónicas y equipos que trabajan las 24 horas.</p>\n"
             "<p>Una señal práctica: si una PC se reinicia justo cuando el UPS pasa a batería, su fuente no se lleva "
             "bien con la onda de ese equipo. En ese caso conviene un modelo de onda senoidal pura u online.</p>")},
        {"h2": "Cómo calcular el UPS que necesitas",
         "html": (
             "<ol>\n"
             "<li>Haz la lista de lo que va al UPS: CPU, monitor, módem, router. La impresora láser no va, porque su "
             "consumo al calentar supera lo que aguanta un UPS de escritorio.</li>\n"
             "<li>Suma los vatios de cada equipo según su etiqueta o su fuente.</li>\n"
             "<li>Elige un UPS cuyos vatios superen esa suma en un 30 % o más.</li>\n"
             "<li>Decide cuántos minutos necesitas: guardar y apagar, o seguir trabajando un rato.</li>\n"
             "<li>Cuenta las tomas con batería, no las tomas totales.</li>\n"
             "</ol>\n"
             "<p>Para el router y el módem de una casa basta un equipo pequeño como el "
             + pr(7648, "Aplus de 600 VA con 9 tomas") + ". Para dos o tres puestos de oficina, el "
             + pr(7652, "Aplus de 2000 VA y 1200 W") + " deja margen.</p>")},
        {"h2": "La batería de repuesto: el costo que pocos miran",
         "html": (
             "<p>Las baterías de plomo-ácido selladas pierden capacidad con los años y con el calor. En Guayaquil, "
             "Machala o Manta, donde el UPS trabaja a mayor temperatura que en Quito o Cuenca, conviene revisar la "
             "autonomía con más frecuencia.</p>\n"
             "<p>El formato de 12 V 9 Ah es de los más comunes: lo usan el Aplus 1E-800N y el CDP R-UPR1008. En "
             "nuestra tienda tienes la " + pr(7631, "batería Aplus 12 V 9 Ah") + ", de 151 × 65 × 94 mm, y la "
             + pr(7632, "Deltatech H9-12") + " con la misma medida. Antes de cambiarla en un equipo de otra marca, "
             "compara medidas y tipo de terminal. Powest, por su parte, tiene su oficina en Calderón, Quito, para "
             "consultas sobre sus equipos.</p>")},
        {"h2": "Cuándo NO te conviene un UPS interactivo",
         "html": (
             "<ul>\n"
             "<li><strong>Si el problema son bajones, no cortes.</strong> Un " + pr(7644, "regulador de voltaje Aplus") +
             " corrige el voltaje sin batería que mantener.</li>\n"
             "<li><strong>Si necesitas horas, no minutos.</strong> Un UPS de escritorio no está hecho para eso. Para "
             "respaldo largo se usa un " + pr(7649, "inversor cargador") + " con baterías externas de mayor "
             "capacidad.</li>\n"
             "<li><strong>Si es un servidor 24/7.</strong> Ahí corresponde un UPS online, que no distribuimos.</li>\n"
             "</ul>\n"
             "<p>Toda la línea está en " + cat("PROTECCION DE ENERGIA", "protección de energía") + ". Si además "
             "armas puestos de trabajo completos, la guía de " + post("fuente-de-poder-pc", "fuente de poder para PC") +
             " te ayuda a estimar el consumo de cada equipo.</p>")},
    ],
    "products": [7648, 7654, 7650, 7652, 7631, 7644],
    "cta_mid": {"title": "¿No sabes de cuántos VA lo necesitas?",
                "text": "Cuéntanos qué equipos vas a conectar y cuántos minutos quieres de respaldo, y te sugerimos el modelo Aplus que corresponde.",
                "wa_text": "Hola, vengo del artículo de comparativa de UPS y quiero que me ayuden a elegir uno"},
    "cta_end": {"title": "UPS Aplus y baterías al por mayor",
                "text": "Crea tu cuenta comercial para ver precios de distribuidor en UPS, reguladores y baterías de reemplazo.",
                "wa_text": "Hola, vengo del artículo de comparativa de UPS y quiero cotizar UPS Aplus al por mayor"},
    "faq": [
        {"q": "¿Qué diferencia hay entre VA y vatios en un UPS?",
         "a": "El VA es la potencia aparente y los vatios son la potencia real que puede entregar. Para elegir, suma los vatios de tus equipos y compáralos con los vatios del UPS, no con los VA."},
        {"q": "¿Cuántos minutos dura un UPS de 1000 VA?",
         "a": "Depende de la carga conectada y de la batería. Como referencia, CDP publica 4 minutos a plena carga y 8 a media carga para su modelo de 1000 VA con una batería de 12 V 9 Ah."},
        {"q": "¿Puedo conectar una impresora láser al UPS?",
         "a": "No es recomendable. Al calentar, la impresora láser consume mucha más potencia que una PC y puede sobrecargar un UPS de escritorio. Conéctala a un protector de voltaje."},
        {"q": "¿Cada cuánto se cambia la batería del UPS?",
         "a": "Cuando la autonomía baja de forma notoria o el equipo avisa con una alarma. El calor acorta su vida, así que en la Costa conviene revisarla con más frecuencia que en la Sierra."},
    ],
    "fuentes": [
        CDP_1008,
        "https://cdpenergy.com/subsubcategorysuft.asp?scid=52",
        "https://cdpenergy.com/subcategory.asp?cid=1",
        "https://powest.com.ec/producto/ups_interactiva_powest_1050va/",
        "https://powest.com.ec/producto/ups-online-powest-1kva-winner/",
        "https://powest.com.ec/",
        "https://www.forzaups.com/products/landing/interactive-ups/",
        "https://www.forzaups.com/products/landing/online-ups/",
        "https://www.forzaups.com/tools/runtime-calculator/",
        "https://www.forzaups.com/tools/battery-replacement/",
        PROD[7650]["url"], PROD[7654]["url"], PROD[7648]["url"], PROD[7631]["url"],
    ],
})

# ─────────────────────────────────────────────────────────────────────────────
# n=6 · Base de enfriamiento para laptop
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 6,
    "slug": "base-de-enfriamiento-laptop",
    "title": "Base de enfriamiento para laptop: cuál elegir",
    "focus_kw": "base de enfriamiento para laptop",
    "meta_desc": "Cuándo ayuda una base de enfriamiento, cuántos ventiladores necesitas y en qué casos el calor de la laptop se resuelve con mantenimiento.",
    "excerpt": "Si tu laptop se calienta, una base de enfriamiento puede bajar la temperatura, pero no siempre. Te explicamos cuándo sirve, qué tipo elegir y cuándo toca mantenimiento.",
    "category": "Componentes y accesorios",
    "tags": ["cooler laptop", "base de enfriamiento", "temperatura", "accesorios laptop", "gamer"],
    "featured": {"pexels_query": "laptop cooling pad fans desk",
                 "alt": "Laptop sobre una base de enfriamiento con ventiladores"},
    "inline_image": {"pexels_query": "laptop bottom vents",
                     "alt": "Parte inferior de una laptop con las rejillas de ventilación",
                     "after_section": 2},
    "intro_html": (
        "<p>La laptop se pone caliente en la parte de abajo, el ventilador suena fuerte y los programas se "
        "vuelven lentos a media tarde. Es una de las quejas más comunes en cualquier servicio técnico, y casi "
        "siempre aparece la misma pregunta: ¿le compro un cooler?</p>\n"
        "<p>Una <strong>base de enfriamiento para laptop</strong> ayuda cuando el problema es de flujo de aire. "
        "Cuando el problema está adentro del equipo, no alcanza. En esta guía te explicamos cómo distinguir los "
        "dos casos y qué base elegir según el uso.</p>"),
    "sections": [
        {"h2": "Respuesta corta: la base ayuda, pero no reemplaza el mantenimiento",
         "html": (
             "<p>La base empuja aire fresco hacia la parte inferior de la laptop, que es por donde muchos modelos "
             "toman aire. Si la laptop está limpia y solo trabaja exigida, la base baja la temperatura y el "
             "ventilador interno trabaja más tranquilo.</p>\n"
             "<p>Si en cambio el disipador está tapado de polvo o la pasta térmica se secó, la base apenas hace "
             "diferencia. En ese caso revisa primero el " + post("ventilador-laptop-cuando-cambiarlo", "ventilador de la laptop") +
             " y la " + post("pasta-termica-mantenimiento-laptop", "pasta térmica") + ". La base se compra después, "
             "como apoyo.</p>")},
        {"h2": "Señales de que la laptop se calienta de más",
         "html": (
             "<p>Antes de comprar nada, confirma que el problema es temperatura. Estas son las señales que más "
             "vemos en el taller:</p>\n"
             "<ul>\n"
             "<li>El ventilador suena fuerte con tareas simples, como el navegador o una hoja de cálculo.</li>\n"
             "<li>El equipo va bien al encender y se pone lento después de media hora de trabajo.</li>\n"
             "<li>Los juegos bajan de cuadros por segundo de golpe y luego se recuperan.</li>\n"
             "<li>La zona sobre el teclado o la base quema al tacto.</li>\n"
             "<li>La laptop se apaga sola sin aviso, sobre todo con carga.</li>\n"
             "</ul>\n"
             "<p>Un programa de monitoreo como HWMonitor muestra la temperatura del procesador en tiempo real. "
             "Compara la lectura en reposo y con el equipo exigido: si sube muy rápido y el rendimiento cae, el "
             "procesador está bajando su velocidad para protegerse. Esa prueba de diez minutos te dice si "
             "empezar por la limpieza o por la base.</p>")},
        {"h2": "Por dónde respira tu laptop y qué base le sirve",
         "html": (
             "<p>Dale la vuelta al equipo. Si tiene rejillas grandes en la base, toma aire por abajo y una base con "
             "ventiladores le sirve mucho. Si las rejillas están en los costados o atrás, y la base es casi lisa, "
             "la ganancia será menor.</p>\n"
             "<p>La salida del aire caliente casi siempre está en un costado o en la parte trasera. Para esos "
             "equipos existe otra solución: el " + pr(6788, "aspirador de calor Ice Troll") + ", que se acopla a la "
             "rejilla de salida y extrae el aire caliente hacia afuera.</p>\n"
             "<p>Otra cosa que conviene revisar son las patas de goma. Si se perdieron, la laptop queda pegada a la "
             "mesa y se ahoga. Una base, aunque no tenga ventilador, ya le devuelve ese espacio.</p>\n"
             "<table>\n<thead><tr><th>Modelo</th><th>Ventiladores</th><th>Altura</th><th>Para quién</th></tr></thead>\n<tbody>\n"
             "<tr><td>" + pr(13495, "Rapoo CF100") + "</td><td>1, regulable</td><td>Fija</td><td>Oficina y estudio; trae "
             "soporte para el celular</td></tr>\n"
             "<tr><td>" + pr(6803, "VAIU-019") + "</td><td>2</td><td>4 niveles</td><td>Uso diario en laptops de 14 y 15,6 pulgadas</td></tr>\n"
             "<tr><td>" + pr(6801, "Gamer H1") + "</td><td>3</td><td>4 niveles</td><td>Juegos y edición en jornadas largas</td></tr>\n"
             "<tr><td>" + pr(6800, "VAIU-505 Deltatech") + "</td><td>5</td><td>6 niveles</td><td>Laptops gamer grandes</td></tr>\n"
             "<tr><td>" + pr(6788, "Aspirador Ice Troll") + "</td><td>Extractor</td><td>No aplica</td><td>Equipos que botan el "
             "aire por un costado</td></tr>\n"
             "<tr><td>" + pr(13313, "Soporte de aluminio N2") + "</td><td>Ninguno</td><td>Inclinación</td><td>Ergonomía y "
             "ventilación pasiva</td></tr>\n"
             "</tbody>\n</table>\n"
             "<p>Más ventiladores no siempre es mejor. Lo que importa es que coincidan con la zona por donde la "
             "laptop toma aire.</p>")},
        {"h2": "Cómo elegir la base en cinco pasos",
         "html": (
             "<ol>\n"
             "<li>Mide la laptop: la base debe ser igual o más grande que el equipo para que no quede en el aire.</li>\n"
             "<li>Ubica las rejillas de entrada y elige una base cuyos ventiladores caigan debajo de ellas.</li>\n"
             "<li>Ten en cuenta que la base se alimenta por USB y ocupa un puerto de la laptop.</li>\n"
             "<li>Si trabajas en una oficina silenciosa, prefiere menos ventiladores o uno regulable.</li>\n"
             "<li>Usa los niveles de altura para dejar la pantalla más cerca de la vista y el teclado cómodo.</li>\n"
             "</ol>\n"
             "<p>Si la laptop tiene pocos puertos, combina la base con un " + cat("HUB USB", "hub USB") + " para no "
             "quedarte sin conexión para el mouse o la memoria.</p>")},
        {"h2": "El clima también cuenta: Quito no es Guayaquil",
         "html": (
             "<p>Un ventilador enfría con el aire que lo rodea. En Guayaquil, Machala o Portoviejo, con una mañana "
             "que ya pasa de 30 °C, ese aire llega caliente y la laptop trabaja más cerca de su límite. Ahí una "
             "base hace una diferencia que se nota en el tacto.</p>\n"
             "<p>En Quito, Ambato o Riobamba el ambiente es más fresco, pero el aire de altura es menos denso y "
             "arrastra menos calor por cada vuelta del ventilador. Por eso también en la Sierra se ven laptops "
             "gamer que se calientan con juegos o renderizado. En los dos casos, la base complementa a un equipo "
             "limpio.</p>")},
        {"h2": "Cuándo NO te conviene una base de enfriamiento",
         "html": (
             "<ul>\n"
             "<li><strong>Si la laptop se apaga sola por calor.</strong> Eso indica disipador tapado, ventilador "
             "dañado o pasta seca. Primero mantenimiento.</li>\n"
             "<li><strong>Si el equipo no tiene rejillas inferiores.</strong> Varias ultradelgadas toman aire por "
             "el teclado o los costados; un soporte sin ventilador basta.</li>\n"
             "<li><strong>Si la laptop se usa en la cama.</strong> Las cobijas tapan las rejillas igual. Ahí sirve "
             "más una mesa portátil que una base.</li>\n"
             "</ul>")},
        {"h2": "Para tiendas: qué bases tener en stock",
         "html": (
             "<p>Con tres modelos cubres casi toda la demanda: una base sencilla de uno o dos ventiladores para "
             "estudiantes y oficina, una gamer de tres a cinco ventiladores y el aspirador para quien no quiere "
             "cargar una base. La VAIU-505 viene en cajas de 12 unidades y la Gamer H1 en cajas de 20.</p>\n"
             "<p>En temporada de regreso a clases, en la Sierra en septiembre y en la Costa en abril, las bases sencillas se mueven más; las gamer se venden parejo todo el año.</p>\n"
             "<p>Toda la línea está en " + cat("COOLER PARA LAPTOP", "cooler para laptop") + ". Si además das "
             "mantenimiento, ten a mano repuestos de " + cat("VENTILADOR LAPTOP", "ventiladores de laptop") +
             ". Con tu cuenta comercial ves los precios de distribuidor y enviamos desde Quito a todo el país.</p>")},
    ],
    "products": [6800, 6801, 6803, 13495, 6788, 13313],
    "cta_mid": {"title": "¿Qué base le sirve a esta laptop?",
                "text": "Envíanos el modelo o una foto de la parte de abajo del equipo y te decimos qué base o extractor conviene.",
                "wa_text": "Hola, vengo del artículo de bases de enfriamiento y quiero saber cuál le sirve a mi laptop"},
    "cta_end": {"title": "Bases de enfriamiento por mayor",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en bases, extractores y soportes para laptop.",
                "wa_text": "Hola, vengo del artículo de bases de enfriamiento y quiero cotizar al por mayor"},
    "faq": [
        {"q": "¿Una base de enfriamiento baja mucho la temperatura?",
         "a": "Depende del equipo. En laptops que toman aire por abajo la mejora se nota; en equipos con disipador sucio o pasta seca la diferencia es mínima hasta hacer mantenimiento."},
        {"q": "¿La base de enfriamiento gasta la batería?",
         "a": "Se alimenta por USB desde la laptop, así que consume algo de energía. Si trabajas con batería, conéctala solo cuando el equipo esté exigido o enchufado."},
        {"q": "¿Qué es mejor, base con ventiladores o aspirador de calor?",
         "a": "La base sopla aire por debajo y sirve en equipos con rejillas inferiores. El aspirador extrae el aire caliente por la salida lateral y conviene en laptops que botan el calor por un costado."},
        {"q": "¿Cuántos ventiladores necesita una laptop gamer?",
         "a": "No hay un número fijo. Lo importante es que los ventiladores queden debajo de las entradas de aire. En laptops grandes, una base de tres a cinco ventiladores suele cubrir esa zona."},
    ],
    "fuentes": [PROD[6800]["url"], PROD[6801]["url"], PROD[13495]["url"], PROD[6788]["url"]],
})

# ─────────────────────────────────────────────────────────────────────────────
# n=8 · Cargador 5V 2A y USB tipo A/C
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 8,
    "slug": "cargador-5v-2a-usb-tipo-a-tipo-c",
    "title": "Cargador 5V 2A y USB tipo A o C: cómo elegirlo",
    "focus_kw": "cargador 5V 2A",
    "meta_desc": "Voltaje, amperaje, tipo A, tipo C y carga rápida: cómo elegir un cargador de celular o una fuente de 5V 2A sin dañar el equipo. Guía para tiendas.",
    "excerpt": "Qué significa 5V 2A, en qué se diferencian los cargadores USB tipo A y tipo C, cómo funciona la carga rápida y cuándo lo que necesitas es una fuente con plug.",
    "category": "Componentes y accesorios",
    "tags": ["cargador celular", "cargador 5V 2A", "USB tipo C", "carga rápida", "fuente de poder"],
    "featured": {"pexels_query": "usb wall charger phone cable",
                 "alt": "Cargador USB de pared con su cable junto a un celular"},
    "inline_image": {"pexels_query": "usb c charger closeup",
                     "alt": "Cargador con puertos USB tipo A y tipo C",
                     "after_section": 2},
    "intro_html": (
        "<p>«Necesito un cargador de 5V 2A». Esa frase llega a una tienda de celulares o a un servicio técnico "
        "varias veces por semana, y puede significar tres cosas distintas: un cubo USB para el teléfono, un "
        "cargador tipo C de carga rápida o una fuente con plug redondo para un TV box.</p>\n"
        "<p>En esta guía te explicamos qué significa <strong>cargador 5V 2A</strong>, cómo leer la etiqueta y "
        "cómo elegir entre tipo A y tipo C. Si lo que buscas es el cargador de una laptop, tenemos una guía "
        "aparte sobre " + post("cargador-laptop-voltaje-conector", "voltaje y conector del cargador de laptop") +
        ".</p>"),
    "sections": [
        {"h2": "Respuesta corta: el voltaje se respeta y el amperaje es un máximo",
         "html": (
             "<p>5V 2A quiere decir que el cargador entrega 5 voltios y puede dar hasta 2 amperios, o sea 10 W. El "
             "equipo toma solo la corriente que necesita: un cargador de 2,4 A sirve donde iba uno de 1 A.</p>\n"
             "<p>El voltaje es otra historia. En un cubo USB la salida base es de 5 V y solo sube si el teléfono la "
             "pide con carga rápida, así que el riesgo es bajo. En una fuente con plug redondo, en cambio, tienes que respetar el voltaje exacto: "
             "una fuente de 12 V en un equipo de 5 V lo daña.</p>")},
        {"h2": "Tipo A, tipo C y fuente con plug: tres productos distintos",
         "html": (
             "<p><strong>Cubo USB tipo A.</strong> Es el cargador de toda la vida. Entrega 5 V y su potencia se "
             "indica en amperios: 1 A, 2 A o 2,4 A. Se usa con el cable que corresponda al teléfono, por ejemplo "
             "un " + pr(11506, "cable USB tipo A a tipo C") + ".</p>\n"
             "<p><strong>Cubo USB tipo C con PD.</strong> Arranca en 5 V y, si el celular lo pide, sube a 9 V o "
             "más para cargar rápido. Por eso se describe en vatios: 20 W, 30 W o 65 W.</p>\n"
             "<p><strong>Fuente con plug.</strong> Es un adaptador con cable fijo y un conector redondo, como el "
             + pr(9454, "cargador 5V 2A con plug 5.5×2.5") + ". No es para celulares: alimenta TV box, hubs, "
             "extensores USB y otros equipos que traen esa entrada.</p>")},
        {"h2": "Qué salida necesita cada equipo",
         "html": (
             "<table>\n<thead><tr><th>Salida</th><th>Potencia</th><th>Uso típico</th><th>Ejemplo en catálogo</th></tr></thead>\n<tbody>\n"
             "<tr><td>5 V 1 A</td><td>5 W</td><td>Audífonos, relojes, parlantes pequeños</td><td>"
             + cat("CARGADORES VARIOS", "Cargadores varios") + "</td></tr>\n"
             "<tr><td>5 V 2,4 A (tipo A)</td><td>12 W</td><td>Celulares sin carga rápida</td><td>"
             + pr(10423, "Combo tipo A 2.4A 1Hora") + "</td></tr>\n"
             "<tr><td>PD 20 W (tipo C)</td><td>20 W</td><td>Celulares con carga rápida</td><td>"
             + pr(10414, "Cargador tipo C PD 20W 1Hora") + "</td></tr>\n"
             "<tr><td>Tipo C 30 W</td><td>30 W</td><td>Celulares y tablets que aceptan más potencia</td><td>"
             + pr(10341, "Cubo 30W tipo C 1Hora") + "</td></tr>\n"
             "<tr><td>PD 65 W + USB A</td><td>65 W por tipo C</td><td>Tablets y equipos que cargan por tipo C</td><td>"
             + pr(6687, "Cargador PD 65W") + "</td></tr>\n"
             "<tr><td>5 V 2 A con plug 5.5×2.5</td><td>10 W</td><td>TV box, hubs con alimentación</td><td>"
             + pr(9454, "Fuente 5V 2A") + "</td></tr>\n"
             "</tbody>\n</table>")},
        {"h2": "Cómo leer la etiqueta y elegir el reemplazo",
         "html": (
             "<ol>\n"
             "<li>Busca la línea <em>Output</em> del cargador original o la entrada del equipo, por ejemplo "
             "<strong>5V ⎓ 2A</strong>.</li>\n"
             "<li>Si es una fuente con plug, el voltaje del reemplazo tiene que ser igual.</li>\n"
             "<li>El amperaje puede ser igual o mayor, nunca menor.</li>\n"
             "<li>Mide el plug (5.5×2.5, 5.5×2.1, 3.5×1.35) y revisa el dibujo de polaridad de la etiqueta.</li>\n"
             "<li>Si es un cubo USB para celular, confirma qué carga rápida acepta el teléfono antes de elegir "
             "tipo A o tipo C.</li>\n"
             "</ol>\n"
             "<p>La diferencia entre 5.5×2.5 y 5.5×2.1 es el pin interno. Un plug que entra flojo hace falso "
             "contacto y termina dañando la entrada del equipo.</p>")},
        {"h2": "Carga rápida y calidad: qué revisar antes de comprar",
         "html": (
             "<p>La carga rápida funciona cuando el cargador y el celular hablan el mismo protocolo. El "
             + pr(6690, "cargador Aplus de 20 W tipo C + tipo A") + ", por ejemplo, declara compatibilidad con PD "
             "2.0/3.0, QC 2.0/3.0, FCP y SCP, y en el puerto A admite los modos de 2 A y 2,4 A de Samsung y Apple.</p>\n"
             "<p>El cable también cuenta. Un cable delgado o dañado limita la corriente aunque el cubo sea "
             "potente. Para tipo C a tipo C, usa uno de 3 A, como el " + pr(6668, "cable tipo C de 60 W") + ".</p>\n"
             "<p>Según USB-IF, la organización que define el estándar, USB Power Delivery 3.1 llega hasta 240 W "
             "con el cable adecuado. Un celular usa una fracción de eso.</p>\n"
             "<p>Un cargador barato que no cumple lo que dice la etiqueta es el que más regresa al local. Antes de "
             "elegir un proveedor, revisa tres cosas en el producto y en su ficha:</p>\n"
             "<ul>\n"
             "<li><strong>Entrada de 100 a 240 V.</strong> Permite usarlo con la corriente de casa sin problema "
             "y es señal de un diseño completo.</li>\n"
             "<li><strong>Protecciones declaradas.</strong> Las fichas serias las listan con siglas: OCP "
             "(sobrecorriente), OVP (sobrevoltaje), SCP (cortocircuito) y OTP (temperatura). El cargador PD 65W "
             "de nuestro catálogo, por ejemplo, declara las cuatro.</li>\n"
             "<li><strong>Etiqueta legible.</strong> Modelo, entrada y salida impresos en el cargador y también en la caja.</li>\n"
             "</ul>\n"
             "<p>Si el cliente vuelve porque el cargador «se calienta mucho», pregunta qué equipo carga. Un cubo "
             "de 1 A con una tablet trabaja al límite todo el tiempo, y eso se arregla con uno de más potencia.</p>")},
        {"h2": "Cuándo NO te conviene un cargador de 5V",
         "html": (
             "<ul>\n"
             "<li><strong>Para una laptop.</strong> Pide entre 45 W y 100 W o más. Revisa la guía de "
             + post("cargador-laptop-voltaje-conector", "cargadores de laptop") + ".</li>\n"
             "<li><strong>Para cámaras analógicas o routers de 12 V.</strong> Necesitan una fuente de 12 V, como el "
             + pr(9448, "cargador 12V 2A con plug 5.5×2.5") + ".</li>\n"
             "<li><strong>Si no sabes qué voltaje pide el equipo.</strong> Un "
             + pr(9445, "cargador universal de 3 a 12 V") + " sirve en el taller para probar, pero una mala "
             "selección del voltaje puede dañar el equipo del cliente.</li>\n"
             "</ul>")},
        {"h2": "Para tiendas de celulares: qué combinación tener",
         "html": (
             "<p>En los locales de accesorios del centro de Quito, de Ambato o de Santo Domingo, lo que más rota son "
             "los combos tipo A de 2,4 A con cable, para teléfonos de gama de entrada, y los cubos tipo C de 20 W "
             "para equipos con carga rápida. Las fuentes de 5V 2A con plug se piden menos, pero el técnico que las "
             "necesita las necesita ese mismo día.</p>\n"
             "<p>Encuentras todo en " + cat("CARGADOR DE CELULARES", "cargadores de celulares") + " y "
             + cat("CABLE USB CELULAR", "cables USB para celular") + ". Con tu cuenta comercial ves precios de "
             "distribuidor y despachamos desde Quito a todas las provincias.</p>")},
    ],
    "products": [10423, 10414, 6690, 10341, 6687, 9454],
    "cta_mid": {"title": "¿No sabes qué cargador pedir?",
                "text": "Envíanos una foto de la etiqueta del cargador o de la entrada del equipo y te decimos cuál corresponde.",
                "wa_text": "Hola, vengo del artículo de cargadores 5V 2A y quiero saber cuál necesito"},
    "cta_end": {"title": "Cargadores USB y fuentes por mayor",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en cargadores, cables y fuentes de 5V y 12V.",
                "wa_text": "Hola, vengo del artículo de cargadores 5V 2A y quiero cotizar al por mayor"},
    "faq": [
        {"q": "¿Puedo usar un cargador de 5V 2A donde iba uno de 5V 1A?",
         "a": "Sí. El equipo toma solo la corriente que necesita y el voltaje es el mismo. Lo que no debes hacer es usar uno de menos amperios, porque se calienta y carga lento."},
        {"q": "¿Qué diferencia hay entre un cargador tipo A y uno tipo C?",
         "a": "El tipo A entrega 5 V y su potencia se mide en amperios. El tipo C con PD puede subir el voltaje para cargar más rápido y se describe en vatios, como 20 W o 30 W."},
        {"q": "¿Un cargador de carga rápida daña la batería del celular?",
         "a": "No, si el celular es compatible con ese protocolo. El cargador y el teléfono acuerdan la potencia, y el celular la reduce cuando la batería se acerca a llenarse."},
        {"q": "¿Para qué sirve un cargador 5V 2A con plug redondo?",
         "a": "Para equipos que traen una entrada de corriente redonda y piden 5 V, como TV box, hubs con alimentación o extensores USB. No sirve para celulares."},
    ],
    "fuentes": [
        "https://www.usb.org/usb-charger-pd",
        PROD[6690]["url"], PROD[6687]["url"], PROD[9454]["url"],
    ],
})

# ─────────────────────────────────────────────────────────────────────────────
# n=18 · Mica para laptop
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 18,
    "slug": "mica-para-laptop-protector-pantalla",
    "title": "Mica para laptop: qué protege y cómo elegir la medida",
    "focus_kw": "mica para laptop",
    "meta_desc": "Qué protege una mica para laptop, cómo medir 14 o 15,6 pulgadas, cómo colocarla sin burbujas y en qué se diferencia de un filtro de privacidad.",
    "excerpt": "La mica para laptop protege la pantalla de rayones y polvo; la privacidad es otro producto. Te explicamos qué tipo necesitas, cómo medir y cómo colocarla bien.",
    "category": "Componentes y accesorios",
    "tags": ["mica laptop", "protector de pantalla", "accesorios laptop", "pantalla laptop", "limpieza"],
    "featured": {"pexels_query": "laptop screen clean desk",
                 "alt": "Laptop abierta con la pantalla limpia sobre un escritorio"},
    "inline_image": {"pexels_query": "cleaning laptop screen cloth",
                     "alt": "Persona limpiando la pantalla de una laptop con un paño",
                     "after_section": 3},
    "intro_html": (
        "<p>Quien busca una mica para laptop suele querer una de dos cosas: que la pantalla no se raye con el "
        "teclado al cerrar la tapa o que la persona de al lado no vea lo que está en la pantalla. Son dos "
        "productos distintos, y confundirlos termina en una devolución.</p>\n"
        "<p>Aquí te explicamos qué hace una <strong>mica para laptop</strong>, qué es exactamente la que tenemos "
        "en catálogo, cómo elegir la medida y cómo colocarla sin burbujas. También te contamos cuándo lo que "
        "necesitas es un filtro de privacidad.</p>"),
    "sections": [
        {"h2": "Respuesta corta: la mica protege; la privacidad es otro producto",
         "html": (
             "<p>Una mica transparente es una lámina delgada que se pega sobre la pantalla. Evita rayones del día a "
             "día, como las marcas que deja el teclado cuando la laptop viaja cerrada en la mochila, y hace más "
             "fácil limpiar el polvo y las huellas.</p>\n"
             "<p>Un filtro de privacidad, en cambio, oscurece la pantalla vista de lado para que solo la lea quien "
             "está de frente. Ese producto no lo tenemos en catálogo. Si tu cliente busca privacidad, la mica "
             "transparente no le va a servir.</p>")},
        {"h2": "Qué es exactamente la mica de nuestro catálogo y qué otras opciones hay",
         "html": (
             "<p>La " + pr(10435, "mica pantalla laptop") + " es una lámina plástica transparente con adhesivo, "
             "presentada en un sobre como protector de pantalla LCD. Se vende en dos medidas, 14 y 15,6 pulgadas. "
             "No es vidrio templado ni filtro de privacidad.</p>\n"
             "<p>Para quien quiere proteger el equipo completo está el " + pr(10432, "kit protector de laptop") +
             ", que incluye protector de pantalla, protector de teclado y un protector transparente para la tapa, "
             "también en 14 y 15,6 pulgadas. El " + pr(11509, "protector de teclado") + " se vende además por "
             "separado.</p>\n"
             "<table>\n<thead><tr><th>Producto</th><th>Qué hace</th><th>Qué no hace</th><th>En catálogo</th></tr></thead>\n<tbody>\n"
             "<tr><td>Mica transparente</td><td>Protege de rayones y polvo</td><td>No da privacidad ni resiste golpes</td><td>Sí, 14 y 15,6</td></tr>\n"
             "<tr><td>Kit 3 en 1</td><td>Pantalla, teclado y tapa</td><td>No protege de caídas</td><td>Sí, 14 y 15,6</td></tr>\n"
             "<tr><td>Protector de teclado</td><td>Frena polvo y líquidos sobre las teclas</td><td>No cuida la pantalla</td><td>Sí</td></tr>\n"
             "<tr><td>Filtro de privacidad</td><td>Oscurece la vista lateral</td><td>Baja algo el brillo de frente</td><td>No</td></tr>\n"
             "</tbody>\n</table>\n"
             "<p>Para un estudiante o alguien que viaja con la laptop, el kit 3 en 1 resuelve casi todo. Para un "
             "equipo que no sale de la oficina, la mica sola suele bastar.</p>")},
        {"h2": "Cómo saber si es de 14 o de 15,6 pulgadas",
         "html": (
             "<p>Las pulgadas de una laptop se miden en diagonal, de esquina a esquina del área que se ilumina, sin "
             "contar el marco. 14 pulgadas son unos 35,6 cm y 15,6 pulgadas unos 39,6 cm.</p>\n"
             "<p>Si no tienes cinta métrica, busca el modelo en la etiqueta de la base y revisa la ficha del "
             "fabricante. En el taller también puedes guiarte por el código del panel, el mismo que usas al pedir "
             "una " + post("pantalla-laptop-30-40-pines", "pantalla de laptop de 30 o 40 pines") + ".</p>\n"
             "<p>Algunas laptops recientes tienen pantallas más altas, en formato 16:10. Si la mica queda un poco "
             "más ancha, recórtala con una regla y un cuchillo de precisión antes de quitar el respaldo.</p>")},
        {"h2": "Cómo colocarla sin burbujas",
         "html": (
             "<ol>\n"
             "<li>Apaga la laptop para ver mejor el polvo sobre el fondo negro.</li>\n"
             "<li>Limpia la pantalla con un " + pr(7709, "kit limpiador de pantalla LCD") + " y un paño de "
             "microfibra, sin presionar.</li>\n"
             "<li>Presenta la mica sin quitar el respaldo y marca cómo va alineada.</li>\n"
             "<li>Despega el respaldo unos centímetros, pega el borde superior y baja poco a poco.</li>\n"
             "<li>Alisa con una tarjeta desde el centro hacia los bordes para sacar el aire.</li>\n"
             "</ol>\n"
             "<p>Hazlo en un lugar sin corriente de aire ni ventilador encendido. Una mota de polvo atrapada deja "
             "una burbuja que no sale.</p>")},
        {"h2": "Teclado, mochila y limpieza: lo que raya la pantalla",
         "html": (
             "<p>Muchas marcas en la pantalla no vienen de afuera, sino del propio teclado. Cuando la laptop viaja "
             "cerrada dentro de una mochila apretada, la presión hace que las teclas toquen el panel y dejen su "
             "huella con el tiempo. La mica recibe ese roce en lugar de la pantalla.</p>\n"
             "<p>El protector de teclado ataca el mismo problema desde abajo y además frena polvo, migas y "
             "salpicaduras de café. Por eso el kit 3 en 1 tiene sentido para quien se mueve todos los días.</p>\n"
             "<p>Un detalle antes de vender los dos: en laptops muy delgadas, prueba que la tapa cierre bien con el "
             "protector de teclado puesto. Si queda forzada, deja solo la mica.</p>\n"
             "<ul>\n"
             "<li>Limpia con un paño de microfibra y un líquido para pantallas; nunca con alcohol puro ni "
             "limpiavidrios.</li>\n"
             "<li>Rocía el líquido sobre el paño, no sobre la pantalla, para que no se filtre por los bordes.</li>\n"
             "<li>No dejes esferos, audífonos ni el mouse sobre el teclado al cerrar la tapa.</li>\n"
             "<li>Abre y cierra la laptop desde el centro de la tapa, no desde una esquina.</li>\n"
             "</ul>\n"
             "<p>Para el día a día en la oficina, las " + pr(7710, "toallitas húmedas para computadores") + " son "
             "prácticas porque no requieren líquido aparte.</p>")},
        {"h2": "Cuándo NO te conviene una mica",
         "html": (
             "<ul>\n"
             "<li><strong>Si el cliente busca privacidad.</strong> Necesita un filtro de privacidad, no una mica.</li>\n"
             "<li><strong>Si la pantalla ya tiene rayones profundos o manchas.</strong> La mica no los esconde. Si el "
             "panel está dañado, toca cambiarlo.</li>\n"
             "<li><strong>Si la pantalla es mate y trabajas al sol.</strong> Una lámina brillante puede sumar "
             "reflejos sobre un panel que fue hecho para no tenerlos.</li>\n"
             "</ul>")},
        {"h2": "Para tiendas y técnicos: ofrécela como servicio",
         "html": (
             "<p>Las tiendas de celulares de Quito y Loja ya cobran por colocar micas en teléfonos. Con laptops "
             "pasa igual: el cliente prefiere que se la pongan en el local. Si das mantenimiento, ofrécela al "
             "entregar el equipo limpio.</p>\n"
             "<p>En Ambato, Riobamba y Latacunga, cuando cae ceniza de los volcanes, el polvo que se deposita sobre "
             "las pantallas es abrasivo y raya si se limpia en seco. Una mica se cambia; un panel cuesta mucho "
             "más. Todo está en " + cat("MICA Y PROTECTOR DE TECLADO", "mica y protector de teclado") + ", y en "
             + cat("LIMPIEZA", "limpieza") + " encuentras los líquidos y las toallitas.</p>")},
    ],
    "products": [10435, 10432, 11509, 7709, 7710],
    "cta_mid": {"title": "¿Qué medida de mica necesitas?",
                "text": "Envíanos el modelo de la laptop y te confirmamos si va la de 14 o la de 15,6 pulgadas.",
                "wa_text": "Hola, vengo del artículo de mica para laptop y quiero saber qué medida necesito"},
    "cta_end": {"title": "Micas y protectores por mayor",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en micas, kits protectores y productos de limpieza.",
                "wa_text": "Hola, vengo del artículo de mica para laptop y quiero cotizar al por mayor"},
    "faq": [
        {"q": "¿La mica para laptop sirve como filtro de privacidad?",
         "a": "No. La mica transparente protege la pantalla de rayones y polvo, pero se ve igual desde cualquier ángulo. Para privacidad hace falta un filtro específico."},
        {"q": "¿Qué medidas de mica para laptop tienen?",
         "a": "La mica y el kit protector vienen en 14 y 15,6 pulgadas. Si la pantalla es un poco distinta, la lámina se puede recortar antes de colocarla."},
        {"q": "¿Cómo saco una burbuja de la mica?",
         "a": "Si es de aire, empújala con una tarjeta hacia el borde más cercano. Si hay polvo atrapado, levanta con cuidado esa zona, retira la mota con cinta adhesiva y vuelve a bajarla."},
        {"q": "¿La mica afecta el uso de una pantalla táctil?",
         "a": "Una lámina delgada bien pegada suele permitir el toque. Si notas que responde peor, revisa que no queden burbujas sobre la zona donde tocas."},
    ],
    "fuentes": [PROD[10435]["url"], PROD[10432]["url"], PROD[11509]["url"]],
})


def main():
    os.makedirs(os.path.join(AQUI, "specs"), exist_ok=True)
    for s in SPECS:
        for i in s["products"]:
            p = PROD[i]
            assert p["stock"] == "instock" and p["img"], f"{s['n']}: producto {i} sin stock/imagen"
        ruta = os.path.join(AQUI, "specs", f"{s['n']:02d}-{s['slug']}.json")
        with open(ruta, "w") as f:
            json.dump(s, f, ensure_ascii=False, indent=2)
        print(f"[{s['n']:>2}] {len(s['title'])} car. título · {len(s['meta_desc'])} car. meta · {ruta}")


if __name__ == "__main__":
    main()
