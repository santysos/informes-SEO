#!/usr/bin/env python3
"""Lote D del mes 2 (Multitecnología VYV): n = 5, 10, 11, 13, 16.

Escribe specs/NN-slug.json. Los enlaces internos salen de productos.json y
enlaces.json (no se escriben URLs a mano). Validar con:
    python3 publish_batch.py --validate
"""
import json, os

AQUI = os.path.dirname(os.path.abspath(__file__))
PROD = {p["id"]: p for p in json.load(open(os.path.join(AQUI, "productos.json")))}
ENL = json.load(open(os.path.join(AQUI, "enlaces.json")))
CAT = {c["name"]: c["url"] for c in ENL["categorias"]}
POST = {p["slug"]: p["url"] for p in ENL["posts"]}


def a(url, texto):
    return f'<a href="{url}">{texto}</a>'


def ap(pid, texto):
    return a(PROD[pid]["url"], texto)


def ac(nombre, texto):
    return a(CAT[nombre], texto)


def apost(slug, texto):
    return a(POST[slug], texto)


SPECS = []

# ─────────────────────────────────────────────────────────────────────────────
# n = 5 · Repuestos Epson L3150 / L4160
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 5,
    "slug": "repuestos-epson-l3150-l4160",
    "title": "Repuestos Epson L3150 y L4160: damper, sensor y almohadillas",
    "focus_kw": "repuestos Epson L3150",
    "meta_desc": "Qué pieza cambiar según el síntoma, cómo reemplazar el damper y cuándo conviene reparar o reemplazar la impresora. Guía para técnicos de impresoras.",
    "excerpt": "Damper, sensor de papel, esponja y bomba de limpieza de las Epson L3150 y L4160: cómo reconocer la falla, qué repuesto pedir y cuándo ya no vale la pena reparar.",
    "category": "Guías para técnicos",
    "tags": ["Epson L3150", "Epson L4160", "repuestos de impresora", "damper", "servicio técnico"],
    "featured": {
        "pexels_query": "inkjet printer repair technician",
        "alt": "Técnico revisando por dentro una impresora de tinta",
    },
    "inline_image": {
        "pexels_query": "printer ink bottles refill",
        "alt": "Botellas de tinta junto a una impresora con tanques",
        "after_section": 2,
    },
    "intro_html": (
        "<p>Las Epson L3150 y L4160 son de las impresoras de tanque que más llegan a los talleres. Se vendieron por miles "
        "en oficinas, cyber y casas, y muchas ya pasaron varios años imprimiendo a diario. Las fallas se repiten: colores "
        "que desaparecen, la luz de papel que parpadea sin razón o el aviso de que una almohadilla llegó al final de su vida útil.</p>"
        "<p>Esta guía es para técnicos de impresoras en Quito y en el resto del país. Te decimos qué repuesto corresponde a "
        "cada síntoma, cómo cambiar el damper sin regar tinta y cuándo te conviene decirle al cliente que la reparación ya no "
        "compensa. Los datos técnicos salen de los manuales de Epson y de las fichas de nuestra tienda.</p>"
    ),
    "sections": [
        {
            "h2": "Qué repuesto cambiar según el síntoma",
            "html": (
                "<p>Antes de abrir la impresora, cruza el síntoma con la pieza más probable. En estas dos series las fallas "
                "mecánicas se concentran en el carro, el camino del papel y la estación de limpieza.</p>"
                "<table><thead><tr><th>Síntoma</th><th>Pieza probable</th><th>Repuesto en tienda</th></tr></thead><tbody>"
                f"<tr><td>Un color sale con rayas o no sale, aunque el tanque está lleno</td><td>Damper (filtro sobre el cabezal)</td><td>{ap(8241, 'Damper L3110/L3150')} o {ap(8240, 'damper L4150/L4160')}</td></tr>"
                f"<tr><td>La luz de papel queda encendida con papel cargado, o marca atasco sin hoja atascada</td><td>Sensor o palanca del sensor de papel</td><td>{ap(8263, 'Papel sensor L3110/L4150/L4160')}</td></tr>"
                "<tr><td>Las luces de encendido y papel parpadean juntas</td><td>Almohadillas de tinta al final de su vida útil</td><td>Esponja por modelo</td></tr>"
                f"<tr><td>La limpieza de cabezal no recupera inyectores y la tinta no baja por la manguera de desecho</td><td>Bomba o unidad de limpieza</td><td>{ap(8229, 'Bomba L4150/L4160')}</td></tr>"
                "</tbody></table>"
                "<p>La tercera fila no es una suposición del taller: en el manual de la L3150, Epson indica que el parpadeo "
                "simultáneo de las luces de encendido y de papel significa que una almohadilla de tinta está llegando o llegó "
                "al final de su vida útil.</p>"
            ),
        },
        {
            "h2": "Damper: la pieza que corta un color sin que se vacíe el tanque",
            "html": (
                "<p>El damper va montado sobre el cabezal, en el carro. Recibe la tinta que baja por las mangueras y la "
                "entrega al cabezal con presión estable. Cuando se tapa o entra aire, el color correspondiente sale débil, "
                "con bandas o desaparece, aunque el tanque esté lleno y las limpiezas no cambien nada.</p>"
                "<p>Pide el repuesto por serie, porque no es el mismo en las dos impresoras:</p>"
                f"<ul><li><strong>L3110 y L3150:</strong> {ap(8241, 'damper L3110/L3150')}.</li>"
                f"<li><strong>L4150 y L4160:</strong> {ap(8240, 'damper color L4150/L4160')}.</li></ul>"
                "<p>Si las mangueras también están manchadas por dentro o rígidas, cámbialas en la misma visita. Hay "
                f"{ap(8262, 'mangueras de 62 cm para L4150/L4160')} y {ap(8261, 'de 53 cm para L3110')}. Purgar un damper nuevo "
                "con mangueras viejas suele devolver la falla en pocas semanas.</p>"
            ),
        },
        {
            "h2": "Sensor de papel: cuando la luz no se apaga",
            "html": (
                "<p>Según el manual de Epson para la L3150, la luz de papel encendida indica que no hay papel cargado o que "
                "avanzaron varias hojas a la vez, y la luz de papel parpadeando indica un atasco. Si el cliente asegura que "
                "hay papel y no hay ninguna hoja trabada, la sospecha pasa al sensor.</p>"
                "<ul><li><strong>Palanca del sensor:</strong> es una pieza plástica que el papel empuja al entrar. Se rompe o "
                "se traba con clips, grapas y etiquetas que se quedan adentro.</li>"
                f"<li><strong>Sensor electrónico:</strong> el {ap(8268, 'sensor de 4 pines para L3110/L4160')} se vende sin "
                "garantía, según su ficha. Pruébalo bien antes de cerrar la carcasa.</li></ul>"
                "<p>Revisa primero la palanca con una linterna. Muchas veces el problema es un pedazo de papel o una grapa "
                "y no hace falta ningún repuesto.</p>"
            ),
        },
        {
            "h2": "Almohadillas, esponja y bomba de limpieza",
            "html": (
                "<p>Cada limpieza de cabezal manda tinta a la estación de limpieza. La bomba la succiona y la lleva a unas "
                "almohadillas absorbentes dentro de la impresora. El equipo cuenta cuánta tinta ha enviado ahí y, al llegar "
                "a su límite, avisa y deja de imprimir.</p>"
                "<p>Epson es clara en su manual: las almohadillas de tinta no pueden ser reemplazadas por el usuario. Si la "
                "impresora está en garantía, el cambio lo cubre Epson. Fuera de garantía, puede hacerlo un proveedor de "
                "servicio de productos Epson. Para el taller, eso significa dos cosas:</p>"
                "<ul><li>Cambiar la esponja saturada y reiniciar el contador. Reiniciar el contador sin cambiar la esponja "
                "solo aplaza el problema: la tinta termina saliendo por la base y manchando el escritorio del cliente.</li>"
                f"<li>Revisar la bomba. En la serie L4150/L4160 tienes la {ap(8229, 'bomba o unidad de limpieza')}, y para "
                f"modelos más nuevos de la familia, como la L4158, la L4168 o la L4266, la {ap(12112, 'pump unit con ink pad')}.</li></ul>"
                f"<p>La esponja se pide por serie: {ap(8245, 'esponja L3110/L3150')} o {ap(8246, 'esponja L4150/L4160')}.</p>"
            ),
        },
        {
            "h2": "Cómo cambiar el damper paso a paso",
            "html": (
                "<p>El cambio es sencillo si trabajas en orden y con la impresora bien protegida:</p>"
                "<ol><li>Imprime un patrón de inyectores antes de abrir. Te deja una referencia para comparar al final.</li>"
                "<li>Apaga y desconecta la impresora. Pon papel absorbente debajo del carro.</li>"
                "<li>Cierra las válvulas de los tanques o mantén la impresora nivelada para que la tinta no baje por gravedad.</li>"
                "<li>Libera el carro y retira la tapa de los dampers. Toma una foto del orden de colores antes de soltar nada.</li>"
                "<li>Cambia el damper y conecta la manguera del mismo color. Revisa que el empaque asiente parejo.</li>"
                "<li>Purga la tinta con una jeringa desde el damper hasta que no queden burbujas.</li>"
                "<li>Cierra, enciende, haz una limpieza de cabezal e imprime otro patrón de inyectores para compararlo con el primero.</li></ol>"
                f"<p>Si al final el patrón sigue con huecos, prueba con {ap(8257, 'limpiador de cabezales')} antes de condenar el cabezal.</p>"
            ),
        },
        {
            "h2": "Reparar o reemplazar: la cuenta que haces con el cliente",
            "html": (
                "<p>Las dos impresoras ya tienen sucesora. En su sitio regional del Caribe, Epson marca la L3150 como "
                "descontinuada y propone la L3250 como reemplazo, y hace lo mismo con la L4160, reemplazada por la L4260. "
                "Eso no vuelve inútil la reparación: los repuestos siguen disponibles y el equipo de la oficina ya está "
                "instalado y conocido.</p>"
                "<p>Repara cuando la falla es puntual (damper, sensor, esponja) y el cabezal imprime bien. Recomienda "
                "reemplazar cuando el cabezal está dañado, cuando se juntan dos o más fallas grandes, o cuando la tarjeta "
                f"principal ya fue cambiada antes. Para la L3150 existe la {ap(8259, 'mainboard L3150/L3156')}, pero si se suma "
                "a un cabezal dañado, la cuenta ya no suele cerrar.</p>"
                "<p>Si recién empiezas a recibir impresoras en tu taller, en "
                f"{apost('como-abrir-servicio-tecnico-laptops', 'cómo abrir un servicio técnico')} tienes ideas para "
                "organizar el inventario de repuestos por modelo.</p>"
            ),
        },
        {
            "h2": "Cuándo NO te conviene reparar una L3150 o una L4160",
            "html": (
                "<ul><li><strong>Si sigue en garantía:</strong> el cambio de almohadillas lo cubre Epson. Abrirla en el "
                "taller puede hacerle perder esa cobertura al cliente.</li>"
                "<li><strong>Si el cabezal tiene inyectores muertos</strong> que no vuelven después del damper nuevo y del "
                "limpiador. Ahí la reparación se acerca al valor de una impresora nueva.</li>"
                "<li><strong>Si el cliente necesita red cableada o más volumen:</strong> ninguna de las dos tiene puerto de "
                "red (Epson lista USB y Wi-Fi), y un equipo de otra gama le resolverá mejor el trabajo.</li></ul>"
                "<p>En talleres de Ambato, Riobamba o Santo Domingo, donde esperar un repuesto cuesta días de trabajo, "
                f"conviene tener en stock los dampers y las esponjas de las dos series. Revisa la categoría "
                f"{ac('REP. IMPRESORA', 'repuestos de impresora')}: enviamos desde Quito a todo el país.</p>"
            ),
        },
    ],
    "products": [8241, 8240, 8263, 8268, 8229, 8245],
    "cta_mid": {
        "title": "¿Tienes una Epson en el banco de trabajo?",
        "text": "Dinos el modelo y el síntoma y te confirmamos qué damper, sensor o esponja corresponde.",
        "wa_text": "Hola, vengo del artículo de repuestos Epson L3150 y L4160, necesito cotizar repuestos",
    },
    "cta_end": {
        "title": "Repuestos de impresora con precio de distribuidor",
        "text": "Crea tu cuenta comercial y ve los precios para taller de dampers, sensores, bombas y esponjas Epson.",
        "wa_text": "Hola, vengo del artículo de repuestos Epson L3150 y L4160, quiero abrir una cuenta comercial",
    },
    "faq": [
        {"q": "¿El damper de la L3150 sirve en la L4160?",
         "a": "No. En nuestra tienda se venden por serie: uno para L3110 y L3150, y otro para L4150 y L4160. Pide siempre el de la serie exacta."},
        {"q": "¿Qué significa que parpadeen juntas la luz de encendido y la de papel?",
         "a": "En la L3150, Epson indica que una almohadilla de tinta está llegando o llegó al final de su vida útil. Hay que cambiar la esponja y reiniciar el contador, o llevarla a Epson si está en garantía."},
        {"q": "¿Puedo solo reiniciar el contador de almohadillas?",
         "a": "La impresora volverá a imprimir, pero la esponja sigue saturada. Con el tiempo la tinta se desborda por la base, así que el reinicio debe ir junto con el cambio de esponja."},
        {"q": "¿La L4160 tiene repuestos todavía?",
         "a": "Sí. Aunque Epson ya la reemplazó por la L4260 en algunos mercados, en la tienda hay damper, sensor de papel, esponja, bomba de limpieza y mangueras para esa serie."},
    ],
    "fuentes": [
        "https://files.support.epson.com/docid/cpd5/cpd55465/source/troubleshooting/reference/l3150/problem_light_status_l3150.html",
        "https://epson.com.jm/p/C11CG86301",
        "https://epson.com.jm/p/C11CG23301",
        "https://files.support.epson.com/docid/cpd5/cpd54045/helpcontents.html",
    ],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 11 · Cable de red: ponchadora, RJ45, Cat5e vs Cat6
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 11,
    "slug": "cable-de-red-ponchadora-rj45-cat5e-cat6",
    "title": "Cable de red: ponchadora, conector RJ45 y Cat5e vs Cat6",
    "focus_kw": "cable de red",
    "meta_desc": "Qué categoría tender, cómo leer la etiqueta de la bobina, qué conector RJ45 y ponchadora usar y cómo ponchar con la norma T568B. Guía para instaladores.",
    "excerpt": "Cat5e o Cat6, cobre o CCA, conector normal, pass through o blindado: cómo armar un cable de red que pase la prueba a la primera.",
    "category": "Redes y seguridad",
    "tags": ["cable de red", "cable UTP", "Cat6", "conector RJ45", "ponchadora"],
    "featured": {
        "pexels_query": "ethernet cable rj45 connector",
        "alt": "Cable de red con conector RJ45 transparente",
    },
    "inline_image": {
        "pexels_query": "network cabling patch panel technician",
        "alt": "Técnico organizando cables de red en un patch panel",
        "after_section": 3,
    },
    "intro_html": (
        "<p>Un cable de red mal hecho no siempre falla de inmediato. A veces la computadora conecta, pero a 100 Mbps en "
        "lugar de 1 Gbps, o la cámara IP se reinicia de noche cuando encienden sus infrarrojos. Casi siempre el origen "
        "está en tres decisiones: la categoría del cable, el material del conductor y el conector.</p>"
        "<p>En esta guía repasamos esas tres decisiones, qué ponchadora comprar y cómo ponchar con la norma T568B paso a "
        "paso. Está pensada para instaladores y técnicos que cablean oficinas, locales y casas en Quito, Ibarra o "
        "cualquier ciudad del país.</p>"
    ),
    "sections": [
        {
            "h2": "Cat5e o Cat6: para la mayoría de oficinas, Cat6",
            "html": (
                "<p>Las dos categorías llevan 1 Gbps hasta 100 metros por tramo. La diferencia está en el margen: Cat6 "
                "trabaja con más frecuencia, tiene menos interferencia entre pares y es la que te deja más espacio para "
                "crecer. Estos son los datos de Fluke Networks, el fabricante de los certificadores de cableado:</p>"
                "<table><thead><tr><th>Categoría</th><th>Frecuencia</th><th>Velocidad a 100 m</th><th>10 Gbps</th></tr></thead><tbody>"
                "<tr><td>Cat5e</td><td>100 MHz</td><td>1 Gbps</td><td>No</td></tr>"
                "<tr><td>Cat6</td><td>250 MHz</td><td>1 Gbps</td><td>Solo en tramos cortos (Fluke indica hasta 35 m)</td></tr>"
                "<tr><td>Cat6A</td><td>500 MHz</td><td>10 Gbps</td><td>Sí, en los 100 m</td></tr></tbody></table>"
                "<p>Cat5e sigue siendo válido para una casa, un local con pocos puntos o un sistema de cámaras de 2 a 4 MP. "
                "Para una oficina nueva donde el cable va a quedar diez años dentro de la pared, la diferencia de costo entre "
                "Cat5e y Cat6 es pequeña frente a volver a cablear.</p>"
            ),
        },
        {
            "h2": "Cobre puro o CCA: lee la etiqueta antes de la categoría",
            "html": (
                "<p>Dos bobinas pueden decir Cat6 y comportarse distinto. La clave es el conductor:</p>"
                "<ul><li><strong>Cobre puro:</strong> menor resistencia, mejor para tramos largos y para PoE. Por ejemplo, el "
                f"{ap(7947, 'cable UTP Cat6 de cobre AMPXL de 23 AWG')}.</li>"
                "<li><strong>Mezcla cobre y aluminio:</strong> la etiqueta trae el porcentaje, como el "
                f"{ap(7945, 'Cat5e 80 % cobre y 20 % aluminio de 24 AWG')}. Sirve para datos en tramos normales, pero pierde "
                "más energía cuando alimentas cámaras o teléfonos por el mismo cable.</li>"
                "<li><strong>AWG:</strong> mientras más bajo el número, más grueso el conductor. 23 AWG es más grueso que 24, "
                "y 24 más que 26.</li></ul>"
                "<p>Si el proyecto lleva cámaras IP alimentadas por el cable, revisa también "
                f"{apost('switch-poe-camaras-ip', 'cómo elegir el switch PoE y calcular la potencia')}: un cable con más "
                "resistencia se come parte de ese presupuesto.</p>"
            ),
        },
        {
            "h2": "Conector RJ45: normal, pass through o blindado",
            "html": (
                "<p>En la tienda tienes tres tipos de conector, cada uno con su uso:</p>"
                f"<ul><li><strong>{ap(10482, 'RJ45 estándar')}</strong>: el de toda la vida. Los hilos entran hasta el tope y "
                "no se ven por delante. Exige cortar parejo los ocho hilos antes de insertarlos.</li>"
                f"<li><strong>{ap(10326, 'RJ45 pass through')}</strong>: los hilos atraviesan el conector y salen por la punta. "
                "Ves el orden de colores antes de ponchar y cortas el sobrante después. Necesitas una ponchadora con cuchilla "
                "para pass through.</li>"
                f"<li><strong>{ap(10476, 'RJ45 blindado FTP')}</strong>: con cubierta metálica, para cable FTP. Solo sirve si "
                "el cable también es blindado y la malla se conecta a tierra en el otro extremo.</li></ul>"
                f"<p>Pon un {ap(10471, 'capuchón')} en cada conector: protege la pestaña, que es lo primero que se rompe en un "
                "patch cord que se conecta y desconecta seguido.</p>"
            ),
        },
        {
            "h2": "La ponchadora: 8P para red, 6P para teléfono",
            "html": (
                "<p>En las ponchadoras verás «8P» y «6P»: 8P es el conector RJ45 de red y 6P el RJ11 o RJ12 de telefonía. "
                f"La {ap(7966, 'ponchadora TL-200R')} trabaja RJ45, RJ11 y RJ12, útil si también instalas centrales "
                f"telefónicas. La {ap(7965, 'ponchadora para Cat5, Cat6 y Cat7')} está pensada para quien cablea redes "
                "a diario.</p>"
                "<p>Antes de comprar, revisa tres cosas: que el dado presione los ocho contactos a la vez y de forma pareja, "
                "que tenga cuchilla de corte y pelador, y que el mango tenga trinquete para que no sueltes antes de terminar "
                "el ponchado.</p>"
            ),
        },
        {
            "h2": "Cómo ponchar un cable RJ45 con la norma T568B",
            "html": (
                "<p>La T568B es la norma más usada en instalaciones de datos. Si los dos extremos llevan la misma norma, "
                "tienes un cable directo, que es lo que necesitas casi siempre.</p>"
                "<ol><li>Pela unos 3 cm de la chaqueta sin cortar el aislamiento de los hilos.</li>"
                "<li>Destrenza los pares y ordénalos: blanco-naranja, naranja, blanco-verde, azul, blanco-azul, verde, "
                "blanco-marrón, marrón.</li>"
                "<li>Alinea los hilos planos y córtalos parejo a 1,2 o 1,3 cm (con pass through, déjalos largos).</li>"
                "<li>Inserta con la pestaña del conector hacia abajo hasta que los ocho hilos toquen el fondo.</li>"
                "<li>Revisa que la chaqueta quede dentro del conector, debajo del seguro.</li>"
                "<li>Poncha con un solo apretón firme hasta que el trinquete libere.</li>"
                "<li>Repite en el otro extremo y prueba el cable.</li></ol>"
                "<p>La T568A cambia el orden de los pares naranja y verde. Se usa en algunas instalaciones antiguas, pero lo "
                "importante es no mezclar normas dentro del mismo proyecto.</p>"
            ),
        },
        {
            "h2": "Prueba cada cable antes de cerrar la canaleta",
            "html": (
                "<p>Un comprobador te dice en segundos si hay un hilo abierto, cruzado o en corto. Probar al final, con la "
                "canaleta cerrada y el cielo raso puesto, cuesta horas.</p>"
                f"<ul><li>El {ap(7953, 'comprobador NF-468S con PoE')} prueba UTP y RJ11, y además detecta si el puerto "
                "entrega PoE.</li>"
                f"<li>El {ap(7968, 'seguidor de tonos NF-811')} te ayuda a encontrar un cable dentro de un manojo sin "
                "etiquetas.</li></ul>"
                f"<p>Encuentras ponchadoras, probadores y peladores en "
                f"{ac('HERRAMIENTAS CABLEADO ESTRUCTURADO', 'herramientas de cableado estructurado')}, y bobinas de 305 m "
                f"en {ac('CABLE UTP', 'cable UTP')}.</p>"
            ),
        },
        {
            "h2": "Cuándo NO te conviene ponchar tú mismo",
            "html": (
                "<ul><li><strong>Para cables cortos de rack o escritorio:</strong> un "
                f"{ap(10506, 'patch cord Cat6 de cobre')} de fábrica es más confiable y se ve más ordenado.</li>"
                "<li><strong>Para 10 Gbps en tramos largos:</strong> ahí corresponde Cat6A con jacks y certificación, no "
                "conectores ponchados en campo.</li>"
                "<li><strong>En exteriores con lluvia o sol directo:</strong> usa cable para exterior y protege la conexión. "
                "En la Costa, la humedad de Manta o Guayaquil oxida los contactos de un conector expuesto en pocos meses.</li></ul>"
                "<p>En instalaciones fijas, lo profesional es terminar en "
                f"{ap(7880, 'cajetines')} y patch panel, y dejar el ponchado de conectores para los cables móviles.</p>"
            ),
        },
    ],
    "products": [7947, 7965, 7966, 10482, 10326, 7953],
    "cta_mid": {
        "title": "¿Cableando una oficina?",
        "text": "Cotiza bobinas, conectores, ponchadoras y probadores en un solo pedido con precio de distribuidor.",
        "wa_text": "Hola, vengo del artículo de cable de red, quiero cotizar cable UTP y conectores RJ45",
    },
    "cta_end": {
        "title": "Todo el cableado estructurado en un solo proveedor",
        "text": "Crea tu cuenta comercial y ve precios de distribuidor en cable UTP, conectores, jacks y herramientas.",
        "wa_text": "Hola, vengo del artículo de cable de red, necesito materiales para una instalación",
    },
    "faq": [
        {"q": "¿Cuál es la diferencia entre Cat5e y Cat6?",
         "a": "Las dos llevan 1 Gbps hasta 100 metros. Cat6 trabaja hasta 250 MHz frente a 100 MHz de Cat5e, tiene más margen contra interferencias y admite 10 Gbps en tramos cortos."},
        {"q": "¿Puedo usar conectores Cat5e con cable Cat6?",
         "a": "No es lo recomendable, porque el cable Cat6 es más grueso y el conector puede quedar forzado. Usa conectores marcados para Cat6 o los que indican compatibilidad con las dos categorías."},
        {"q": "¿Qué norma uso, T568A o T568B?",
         "a": "Cualquiera funciona si usas la misma en los dos extremos y en todo el proyecto. La T568B es la más común en instalaciones de datos."},
        {"q": "¿Cuál es la distancia máxima de un cable de red?",
         "a": "100 metros por tramo para Ethernet de cobre. Si necesitas más, coloca un switch en el camino o pasa a fibra óptica."},
    ],
    "fuentes": [
        "https://flukenetworks.com/blog/cabling-chronicles/ethernet-cable-history",
    ],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 13 · Audífonos para call center
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 13,
    "slug": "audifonos-call-center-usb-mono-binaural",
    "title": "Audífonos para call center: USB o 3,5 mm, mono o binaural",
    "focus_kw": "audífonos para call center",
    "meta_desc": "Cómo elegir la conexión según el equipo, cuándo conviene mono o binaural, qué es un conector QD y cómo equipar las posiciones de un call center.",
    "excerpt": "USB, 3,5 mm o QD; un auricular o dos; cancelación de ruido: qué audífono necesita cada puesto de un call center o una mesa de ayuda.",
    "category": "Componentes y accesorios",
    "tags": ["audífonos call center", "headset USB", "conector QD", "telefonía IP", "VT"],
    "featured": {
        "pexels_query": "call center agent headset computer",
        "alt": "Agente de call center con audífono y micrófono frente a una computadora",
    },
    "inline_image": {
        "pexels_query": "customer service team office headsets",
        "alt": "Equipo de atención al cliente trabajando con audífonos en una oficina",
        "after_section": 2,
    },
    "intro_html": (
        "<p>Un agente de call center pasa siete u ocho horas con el audífono puesto. Si el micrófono capta la conversación "
        "del puesto de al lado, el cliente se queja; si la diadema aprieta, el agente se lo quita a media llamada. El "
        "audífono es la herramienta de trabajo más usada de la operación y la que más se descuida al comprar.</p>"
        "<p>Esta guía es para empresas, mesas de ayuda y técnicos que equipan call centers en Quito, Guayaquil o cualquier "
        "ciudad. Te explicamos cómo elegir la conexión según dónde contesta el agente, cuándo conviene un auricular o dos "
        "y qué ganas con un conector QD.</p>"
    ),
    "sections": [
        {
            "h2": "USB, 3,5 mm o QD: depende de dónde contesta el agente",
            "html": (
                "<p>La primera pregunta no es la marca, es el equipo. Si el agente atiende desde un programa en la "
                "computadora (Teams, Zoom, 3CX, MicroSIP), el audífono va por USB. Si atiende desde un teléfono IP de "
                "escritorio, va con conector QD y el cable que corresponde a la marca del teléfono.</p>"
                "<table><thead><tr><th>Dónde contesta</th><th>Conexión</th><th>Ejemplo en tienda</th></tr></thead><tbody>"
                f"<tr><td>Softphone en la PC</td><td>USB</td><td>{ap(11554, 'VT1000M mono USB')}</td></tr>"
                f"<tr><td>Teléfono IP Yealink o Grandstream</td><td>QD + cable Plug 03</td><td>{ap(6961, 'cable GN QD Plug 03')}</td></tr>"
                f"<tr><td>Teléfono IP Cisco</td><td>QD + cable Plug 02</td><td>{ap(6960, 'cable GN QD Plug 02')}</td></tr>"
                f"<tr><td>Teléfono IP Poly, Fanvil o Sangoma</td><td>QD + cable Plug 01</td><td>{ap(6959, 'cable GN QD Plug 01')}</td></tr>"
                "<tr><td>Celular o laptop con conector combo</td><td>3,5 mm</td><td>Audífono con plug de 4 polos</td></tr>"
                "</tbody></table>"
                "<p>El 3,5 mm funciona, pero en una PC de escritorio depende de la tarjeta de sonido y del estado del "
                "conector frontal, que es lo primero que se desgasta. Por eso en call centers predomina el USB: el audio "
                "se procesa en el propio cable y suena igual en todas las máquinas.</p>"
            ),
        },
        {
            "h2": "Mono o binaural: el ruido del piso decide",
            "html": (
                "<ul><li><strong>Mono (un auricular):</strong> el agente escucha al cliente con un oído y a su supervisor o "
                "compañero con el otro. Conviene en mesas de ayuda, recepción y equipos que coordinan entre sí mientras "
                f"atienden. Por ejemplo, el {ap(6971, 'VT6300 monoaural con control de llamada')}.</li>"
                "<li><strong>Binaural (dos auriculares):</strong> aísla al agente del ruido del piso y le permite concentrarse. "
                "Conviene en salas grandes, cobranzas y ventas, donde cada llamada exige atención completa. Por ejemplo, el "
                f"{ap(11553, 'VT1000 binaural con controlador')}.</li></ul>"
                "<p>Si en la misma sala trabajan cuarenta personas, el binaural casi siempre gana. Si son cinco personas en una "
                "oficina tranquila, el mono basta y deja al agente atento a lo que pasa a su alrededor.</p>"
            ),
        },
        {
            "h2": "El micrófono importa más que el auricular",
            "html": (
                "<p>El cliente nunca escucha tu auricular, escucha tu micrófono. Los modelos para call center traen un "
                "micrófono en brazo, cerca de la boca, y filtros para que el ruido del entorno no pase a la llamada.</p>"
                f"<ul><li>El {ap(6970, 'VT6300 doble')} usa tecnología ENC de cancelación de ruido ambiental y, según su "
                "ficha, está certificado para Zoom y funciona sin drivers con Teams, Zoom, Skype for Business y MicroSIP.</li>"
                f"<li>El {ap(6973, 'VTX200 Pro doble')} trae botones para contestar, colgar, ajustar volumen y silenciar el "
                "micrófono, además de una luz indicadora.</li></ul>"
                "<p>Pide a cada agente que ubique el micrófono a dos dedos de la comisura de la boca. Un micrófono mal "
                "colocado anula cualquier cancelación de ruido.</p>"
            ),
        },
        {
            "h2": "Conector QD: cambiar de turno sin desconectar el teléfono",
            "html": (
                "<p>QD significa <em>Quick Disconnect</em>, desconexión rápida. El audífono queda unido a un cable corto que "
                "se separa del cable del teléfono o de la PC con un clic. Eso ayuda en dos situaciones:</p>"
                "<ul><li><strong>Turnos rotativos:</strong> cada agente tiene su audífono y lo conecta al cable de la posición "
                "al llegar. Es más higiénico que compartir diademas.</li>"
                "<li><strong>Pausas:</strong> el agente se levanta sin arrancar el cable del teléfono ni cortar la llamada en espera.</li></ul>"
                f"<p>Con un audífono QD como el {ap(6972, 'VT6300 QD')} puedes pasar de teléfono IP a computadora cambiando "
                f"solo el cable, por ejemplo con el {ap(6968, 'cable QD a USB para Teams')}, que permite contestar y colgar.</p>"
            ),
        },
        {
            "h2": "Comodidad: lo que se nota en la sexta hora del turno",
            "html": (
                "<p>Un audífono que se siente bien en la tienda puede doler al final de la jornada. Revisa estos puntos "
                "antes de comprar para todo el equipo:</p>"
                "<ul><li><strong>Diadema acolchada y ajustable:</strong> el VTX200 Pro, por ejemplo, trae diadema de "
                "polipiel suave pensada para uso de todo el día, según su ficha.</li>"
                "<li><strong>Almohadillas reemplazables:</strong> son lo primero que se gasta y lo que más se ensucia. Pide "
                "repuestos junto con el pedido inicial.</li>"
                "<li><strong>Brazo del micrófono flexible:</strong> cada agente lo acomoda a su cara sin forzar la diadema.</li>"
                "<li><strong>Cable con largo suficiente:</strong> el agente debe poder girar en la silla sin tensar el cable "
                "ni arrastrar el teléfono.</li></ul>"
                "<p>Pide una muestra y deja que dos o tres agentes la usen un turno completo. Su opinión vale más que "
                "cualquier ficha técnica.</p>"
            ),
        },
        {
            "h2": "Cómo equipar un call center paso a paso",
            "html": (
                "<ol><li>Haz la lista de posiciones y anota en cada una si se atiende por softphone o por teléfono IP, y de "
                "qué marca.</li>"
                "<li>Decide mono o binaural por área, no por persona. Así mantienes un solo modelo en bodega.</li>"
                "<li>Para teléfonos IP, elige audífonos QD y pide el cable de la marca exacta del teléfono.</li>"
                "<li>Compra un 10 % extra de audífonos y cables para reemplazos inmediatos.</li>"
                "<li>Prueba una posición completa con el sistema real antes de comprar para todo el equipo.</li>"
                "<li>Entrega cada audífono con nombre y enseña a colocar el micrófono.</li></ol>"
                f"<p>Si al armar los puestos te faltan puertos USB, revisa "
                f"{apost('hub-usb-lightning-hub', 'cómo elegir un hub USB')}; y si alguna PC tiene el conector de audio "
                f"dañado, una {ap(6899, 'tarjeta de sonido USB externa')} lo resuelve sin abrir el equipo.</p>"
            ),
        },
        {
            "h2": "Cuándo NO te conviene un audífono de call center",
            "html": (
                "<ul><li><strong>Para quien tiene dos o tres reuniones a la semana:</strong> un audífono Bluetooth o la "
                "cámara web con micrófono integrado alcanzan.</li>"
                "<li><strong>Para trabajo en movimiento:</strong> un vendedor que atiende desde el celular en la calle "
                f"necesita algo inalámbrico, como los {ac('AUDIFONOS TWS', 'audífonos TWS')}.</li>"
                "<li><strong>Para juegos o edición de audio:</strong> el audífono de call center está afinado para voz, no "
                "para música.</li></ul>"
                f"<p>Toda la línea VT para call center está en {ac('AUDIFONOS VT', 'audífonos VT')}. Despachamos desde "
                "Quito a empresas de Cuenca, Ambato, Manta y el resto del país.</p>"
            ),
        },
    ],
    "products": [11554, 11553, 6971, 6970, 6972, 6968],
    "cta_mid": {
        "title": "¿Equipando posiciones de call center?",
        "text": "Dinos cuántos puestos y qué teléfonos usan, y te armamos la cotización con audífonos y cables QD.",
        "wa_text": "Hola, vengo del artículo de audífonos para call center, quiero cotizar audífonos VT",
    },
    "cta_end": {
        "title": "Audífonos para call center con precio por volumen",
        "text": "Crea tu cuenta comercial y ve precios de distribuidor en audífonos VT, cables QD y accesorios.",
        "wa_text": "Hola, vengo del artículo de audífonos para call center, necesito equipar varios puestos",
    },
    "faq": [
        {"q": "¿Qué es mejor para call center, USB o 3,5 mm?",
         "a": "Para atender desde la computadora, USB. Suena igual en todas las PC porque no depende de la tarjeta de sonido, y los modelos para call center traen control de llamada en el cable."},
        {"q": "¿Qué significa QD en un audífono?",
         "a": "Quick Disconnect: un conector que separa el audífono del cable con un clic. Permite cambiar entre teléfono IP y computadora cambiando solo el cable."},
        {"q": "¿Mono o binaural para un call center?",
         "a": "Binaural en salas grandes y ruidosas, porque aísla al agente. Mono en mesas de ayuda o recepción, donde el agente necesita escuchar lo que pasa a su alrededor."},
        {"q": "¿Sirve cualquier cable QD para cualquier teléfono IP?",
         "a": "No. Cada marca usa un cableado distinto: en la tienda hay cables para Yealink y Grandstream, para Cisco y para Poly, Fanvil y Sangoma. Pide el de la marca exacta."},
    ],
    "fuentes": [
        PROD[6970]["url"],
        PROD[6973]["url"],
    ],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 16 · Puntero láser para presentaciones
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 16,
    "slug": "puntero-laser-presentaciones",
    "title": "Puntero láser para presentaciones: cuál elegir",
    "focus_kw": "puntero láser",
    "meta_desc": "Presentador con receptor USB o puntero simple, qué potencia es segura, cómo leer la etiqueta y cómo preparar el equipo antes de una charla o una clase.",
    "excerpt": "Qué diferencia hay entre un puntero simple y un presentador inalámbrico, qué potencia es segura y qué revisar antes de exponer.",
    "category": "Componentes y accesorios",
    "tags": ["puntero láser", "presentador inalámbrico", "presentaciones", "accesorios de oficina"],
    "featured": {
        "pexels_query": "business presentation projector speaker",
        "alt": "Persona exponiendo frente a una proyección en una sala de reuniones",
    },
    "inline_image": {
        "pexels_query": "classroom projector lecture",
        "alt": "Aula con proyector durante una clase",
        "after_section": 2,
    },
    "intro_html": (
        "<p>En una exposición, el puntero cumple dos trabajos: señalar el dato que importa y pasar las diapositivas sin "
        "volver a la laptop. Cuando falla, el expositor termina caminando hasta el teclado cada minuto o señalando con la "
        "mano una pantalla de tres metros.</p>"
        "<p>Esta guía es para empresas, docentes y tiendas que venden accesorios de oficina en Quito, Cuenca o Loja. Te "
        "contamos qué tipo de puntero elegir, qué potencia es segura según la FDA de Estados Unidos y qué revisar antes de "
        "una charla.</p>"
    ),
    "sections": [
        {
            "h2": "Para la mayoría: presentador con láser y receptor USB",
            "html": (
                "<p>Si vas a exponer con diapositivas, lo que necesitas es un presentador: un control inalámbrico que pasa "
                "las diapositivas hacia adelante y atrás, con un láser incluido para señalar. Se conecta con un receptor USB "
                "que se reconoce como teclado, así que no pide programas.</p>"
                f"<p>El {ap(10258, 'puntero láser con control remoto de diapositivas')} de la tienda funciona con Mac, Windows "
                "y Android, según su ficha. Para señalar en una pizarra o en un plano, sin pasar diapositivas, alcanza con un "
                f"puntero simple como el {ap(6883, 'puntero láser recargable')}.</p>"
                "<table><thead><tr><th>Tipo</th><th>Para qué sirve</th><th>Qué revisar</th></tr></thead><tbody>"
                "<tr><td>Presentador con receptor USB</td><td>Clases, reuniones, conferencias con diapositivas</td><td>Que el receptor se guarde dentro del control</td></tr>"
                "<tr><td>Puntero láser simple</td><td>Pizarras, planos, maquetas, visitas guiadas</td><td>Clase y potencia en la etiqueta</td></tr>"
                "<tr><td>Control por Bluetooth</td><td>Laptops sin puertos USB-A libres</td><td>Compatibilidad con el sistema operativo</td></tr>"
                "</tbody></table>"
            ),
        },
        {
            "h2": "Potencia: para una sala basta con menos de 5 mW",
            "html": (
                "<p>La FDA de Estados Unidos limita los punteros láser a 5 milivatios en el rango de luz visible. Su modelo de etiqueta muestra "
                "un láser Clase IIIa con salida máxima menor a 5 mW. Para una sala de reuniones o un auditorio, esa potencia "
                "se ve sin problema en una proyección.</p>"
                "<p>Lee la etiqueta antes de comprar o revender. Un puntero serio indica la clase, la potencia máxima y la "
                "longitud de onda. Si un producto no trae nada de eso, no sabes qué le estás poniendo en la mano a un expositor "
                "o a un estudiante.</p>"
                "<p>Esto aplica también a lo que vendemos. El puntero recargable de la tienda se anuncia como de alta "
                "potencia: antes de entregarlo para un aula o revenderlo, confirma en la etiqueta de la unidad su clase y "
                "su potencia, y recomiéndalo para señalar en pizarras y planos, siempre lejos de la cara de las personas.</p>"
                "<p>La misma FDA recomienda no apuntar un láser a personas, mascotas, vehículos ni aviones, y advierte que "
                "incluso uno por debajo de 5 mW puede hacer daño si se usa mal. En una charla, apunta siempre a la pantalla y nunca al público.</p>"
            ),
        },
        {
            "h2": "Rojo o verde: lo que dice el color",
            "html": (
                "<p>El rojo es el más común en presentadores y es suficiente en una sala con la luz controlada. El verde se ve "
                "más brillante a la misma potencia, y por eso a veces se ofrece para salas grandes o muy iluminadas.</p>"
                "<p>Ojo con el brillo como medida de potencia. La FDA advierte que los láseres azules o violetas se ven más "
                "tenues que uno verde o rojo de la misma potencia, así que un punto que parece débil puede venir de un láser "
                "potente. Una vez más, lo que manda es la etiqueta.</p>"
            ),
        },
        {
            "h2": "Receptor USB: revisa los puertos de la laptop",
            "html": (
                "<p>Muchas laptops nuevas solo traen puertos USB-C. Un presentador con receptor USB-A necesita un adaptador o "
                "un hub, y conviene llevarlo en el maletín desde la oficina. En "
                f"{apost('hub-usb-lightning-hub', 'nuestra guía de hubs USB')} tienes las opciones.</p>"
                "<p>Si además conectas la laptop al proyector o al televisor de la sala, revisa "
                f"{apost('adaptador-hdmi-lan-extensor-hdmi', 'qué adaptador HDMI o extensor necesitas')}. Lo habitual en "
                "salas de capacitación es que el problema no sea el puntero, sino el cable de video.</p>"
            ),
        },
        {
            "h2": "Recargable o con pilas: piensa en quién lo va a usar",
            "html": (
                "<p>Un puntero recargable evita comprar pilas, pero depende de que alguien lo cargue. Uno con pilas se "
                "resuelve en dos minutos si falla en plena exposición, siempre que haya pilas a mano.</p>"
                "<ul><li><strong>Para un expositor que viaja:</strong> recargable, con el cable en el mismo estuche. Si da "
                "charlas en Quito un día y en Guayaquil al siguiente, no quiere buscar una tienda de pilas.</li>"
                "<li><strong>Para la sala de reuniones de una empresa:</strong> con pilas. Lo usan varias personas, nadie se "
                "acuerda de cargarlo y un blíster de repuesto en el cajón resuelve el problema.</li>"
                "<li><strong>Para un docente:</strong> cualquiera de los dos, pero con el receptor guardado dentro del "
                "control. Es la pieza que más se pierde en las aulas.</li></ul>"
                "<p>Si compras para un equipo grande, elige un solo modelo para todos. Así los receptores, los cables y las "
                "pilas sirven en cualquier sala y el área de sistemas tiene un solo aparato que soportar.</p>"
            ),
        },
        {
            "h2": "Cómo preparar el presentador antes de una charla",
            "html": (
                "<ol><li>Carga el puntero o cambia las pilas el día anterior, no en la sala.</li>"
                "<li>Conecta el receptor a la laptop y abre la presentación en modo de pantalla completa.</li>"
                "<li>Prueba avanzar y retroceder diapositivas desde el fondo de la sala.</li>"
                "<li>Verifica que el punto láser se vea en la proyección con las luces encendidas.</li>"
                "<li>Desactiva el ahorro de energía de la laptop para que no se apague a mitad de la charla.</li>"
                "<li>Al terminar, guarda el receptor dentro del control para no perderlo.</li></ol>"
                f"<p>Si el presentador usa pilas, ten un blíster de {ap(6931, 'pilas AAA')} o {ap(6921, 'AA')} en la sala de "
                "capacitación.</p>"
            ),
        },
        {
            "h2": "Cuándo NO te conviene un puntero láser",
            "html": (
                "<ul><li><strong>Con pantallas LED o televisores grandes:</strong> el punto láser casi no se ve sobre una "
                "pantalla que emite luz. Ahí conviene un presentador con puntero digital en pantalla o señalar con el cursor.</li>"
                "<li><strong>En reuniones virtuales:</strong> el público no ve el láser. Usa el puntero del programa de la "
                "videollamada.</li>"
                "<li><strong>Con niños pequeños:</strong> en escuelas, un presentador sin láser o un puntero físico evita "
                "riesgos con los ojos.</li></ul>"
                "<p>Para tiendas cercanas a universidades y colegios, en Quito o en Loja, los punteros se mueven en inicio de "
                "semestre y temporada de tesis. Revisa la categoría "
                f"{ac('PUNTERO LASER Y BLUETOOTH', 'punteros láser y Bluetooth')} y abastece tu vitrina antes de esas fechas.</p>"
            ),
        },
    ],
    "products": [10258, 6883, 6931, 6921],
    "cta_mid": {
        "title": "¿Vendes accesorios de oficina?",
        "text": "Cotiza punteros, presentadores y pilas para tu tienda con precio de distribuidor.",
        "wa_text": "Hola, vengo del artículo de puntero láser, quiero cotizar punteros para presentaciones",
    },
    "cta_end": {
        "title": "Accesorios para presentaciones al por mayor",
        "text": "Crea tu cuenta comercial y ve los precios de distribuidor en punteros, hubs y adaptadores.",
        "wa_text": "Hola, vengo del artículo de puntero láser, necesito presentadores para mi empresa",
    },
    "faq": [
        {"q": "¿Qué diferencia hay entre un puntero láser y un presentador?",
         "a": "El puntero solo proyecta un punto de luz. El presentador además pasa las diapositivas de forma inalámbrica mediante un receptor USB, y casi siempre incluye el láser."},
        {"q": "¿Qué potencia debe tener un puntero láser para presentaciones?",
         "a": "Menos de 5 mW. Es el límite que la FDA de Estados Unidos fija para punteros de mano y se ve bien sobre una proyección en una sala normal."},
        {"q": "¿El puntero láser funciona en pantallas LED?",
         "a": "Muy poco. El punto se pierde sobre una pantalla que emite luz, así que en televisores grandes conviene usar el cursor o un presentador con puntero digital."},
        {"q": "¿Necesito instalar programas para usar el presentador?",
         "a": "Normalmente no. El receptor USB se reconoce como un teclado y funciona con PowerPoint, Keynote o Google Slides sin configuración."},
    ],
    "fuentes": [
        "https://www.fda.gov/radiation-emitting-products/alerts-and-notices/consumer-safety-alert-internet-sales-laser-products",
        "https://www.fda.gov/radiation-emitting-products/laser-products-and-instruments/important-information-laser-pointer-manufacturers",
    ],
})


# ─────────────────────────────────────────────────────────────────────────────
# n = 10 · Regalos corporativos con audífonos y parlantes 1Hora (sale el 2-dic)
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 10,
    "slug": "regalos-corporativos-audifonos-parlantes",
    "title": "Regalos corporativos: audífonos y parlantes para fin de año",
    "focus_kw": "regalos corporativos",
    "meta_desc": "Por qué los audífonos y parlantes Bluetooth funcionan como regalo de empresa, qué modelo 1Hora elegir para cada destinatario y cómo armar el pedido a tiempo.",
    "excerpt": "Audífonos TWS, diadema y parlantes Bluetooth 1Hora como regalo de fin de año para clientes y empleados: qué elegir, cómo comprar por volumen y cuándo no conviene.",
    "category": "Compras al por mayor",
    "tags": ["regalos corporativos", "1Hora", "parlantes Bluetooth", "audífonos Bluetooth", "compras por volumen"],
    "featured": {
        "pexels_query": "wrapped gifts office desk christmas",
        "alt": "Regalos envueltos sobre un escritorio de oficina en temporada navideña",
    },
    "inline_image": {
        "pexels_query": "wireless earbuds case table",
        "alt": "Audífonos inalámbricos con su estuche de carga sobre una mesa",
        "after_section": 2,
    },
    "intro_html": (
        "<p>Diciembre llega y la lista se repite: canastas para los clientes, algo para el equipo y un detalle para los "
        "proveedores. El problema de muchos regalos de empresa es que terminan en un cajón. Un audífono o un parlante "
        "Bluetooth, en cambio, se usa todos los días: en el bus, en el gimnasio, en la oficina o en la casa.</p>"
        "<p>Esta guía es para empresas que compran regalos por volumen en Quito, Guayaquil o cualquier ciudad, y para "
        "tiendas que arman combos de temporada. Te contamos qué modelos de la marca 1Hora tenemos en catálogo, qué dicen "
        "sus fichas y cómo organizar el pedido para que llegue antes de la fiesta de fin de año.</p>"
    ),
    "sections": [
        {
            "h2": "Por qué audífonos y parlantes funcionan como regalo de empresa",
            "html": (
                "<p>Un buen regalo corporativo cumple tres condiciones: lo usa casi cualquier persona, dura más que la "
                "temporada y no exige saber la talla ni el gusto exacto de quien lo recibe. El audio inalámbrico cumple las "
                "tres.</p>"
                "<ul><li><strong>Uso diario:</strong> cada vez que tu cliente se pone los audífonos, tiene en la mano algo que "
                "le dio tu empresa.</li>"
                "<li><strong>Compatibilidad amplia:</strong> funcionan con cualquier celular con Bluetooth, sea Android o iPhone.</li>"
                "<li><strong>Escala:</strong> puedes pedir el mismo modelo para cincuenta personas y mantener un regalo "
                "parejo para todo el equipo.</li>"
                "<li><strong>Fácil de enviar:</strong> una caja pequeña y liviana viaja a provincia sin riesgo de que se "
                "dañe o caduque, algo que no pasa con una canasta de alimentos.</li></ul>"
                "<p>Una empresa de Quito con clientes en Guayaquil, Ambato y Manta puede despachar el mismo regalo a todos "
                "desde un solo pedido, y cada cliente recibe exactamente lo mismo. Eso evita comparaciones incómodas entre "
                "clientes de distintas ciudades.</p>"
            ),
        },
        {
            "h2": "Qué modelo elegir según a quién se lo das",
            "html": (
                "<p>Estos son los modelos 1Hora del catálogo, con los datos de sus fichas en la tienda y en el sitio oficial "
                "de 1Hora:</p>"
                "<table><thead><tr><th>Destinatario</th><th>Modelo</th><th>Lo que dice la ficha</th></tr></thead><tbody>"
                f"<tr><td>Equipo que viaja o hace deporte</td><td>{ap(10440, 'Audífonos TWS AUT203')}</td><td>Bluetooth 5.3, 5 h de reproducción y 17 h con el estuche, carga por tipo C</td></tr>"
                f"<tr><td>Público joven</td><td>{ap(10443, 'Audífonos TWS AUT205')}</td><td>Con luces LED; en blanco o negro</td></tr>"
                f"<tr><td>Clientes que trabajan en la computadora</td><td>{ap(6927, 'Audífonos de diadema AUT250')}</td><td>Batería de 1000 mAh, hasta 100 h de música, micrófono y cable de 3,5 mm</td></tr>"
                f"<tr><td>Regalo para la oficina o el hogar</td><td>{ap(6975, 'Barra de sonido BOC241')}</td><td>10 W, 8 modos de luz LED, entrada de 3,5 mm, USB y tarjeta TF</td></tr>"
                f"<tr><td>Detalle para muchos empleados</td><td>{ap(10454, 'Parlante portátil BOC060')}</td><td>10 W; en negro o rojo</td></tr>"
                f"<tr><td>Proveedores y personal de campo</td><td>{ap(10451, 'Parlante BOC062')}</td><td>5 W, con radio FM</td></tr>"
                "</tbody></table>"
                "<p>Las potencias de los parlantes salen del sitio oficial de 1Hora. La autonomía de los audífonos AUT203 se "
                "mide con el volumen al 100 %, así que a volumen normal suele durar más.</p>"
            ),
        },
        {
            "h2": "Audífonos de diadema para quien trabaja en la computadora",
            "html": (
                "<p>Si tus clientes o tu equipo pasan el día en reuniones virtuales, el regalo más útil es un audífono de "
                f"diadema con micrófono. El {ap(6927, 'AUT250 de 1Hora')} trae, según su ficha, drivers de 40 mm, tres modos "
                "de ecualización, Bluetooth 5.3 con alcance de hasta 10 metros y almohadillas de cuero sintético. Se pliega "
                "para guardarlo en la mochila.</p>"
                "<p>Un detalle práctico: además de Bluetooth, acepta cable de 3,5 mm. Si la batería se descarga en medio de "
                "una reunión, se sigue usando conectado.</p>"
            ),
        },
        {
            "h2": "Parlantes: el regalo que se comparte",
            "html": (
                "<p>El parlante llega a más gente que el audífono, porque termina sonando en la reunión familiar o en la "
                "oficina. Tres escenarios comunes:</p>"
                f"<ul><li><strong>Para escritorio o sala:</strong> la {ap(6975, 'barra de sonido BOC241')} tiene, según su "
                "ficha, batería de 2000 mAh con al menos 5 horas al 100 % de potencia, y se conecta por Bluetooth, cable de "
                "3,5 mm, USB o tarjeta TF.</li>"
                "<li><strong>Para entregar en cantidad:</strong> los parlantes portátiles BOC060, BOC242 y BOC244 vienen en "
                "negro y rojo, útil si quieres acercarte a los colores de tu marca.</li>"
                "<li><strong>Para quien escucha radio:</strong> el BOC062 incluye radio FM, pensado para guardias, bodegas "
                "o personal que trabaja fuera de la oficina.</li></ul>"
                f"<p>Todos los modelos están en {ac('PARLANTES', 'parlantes')} y {ac('AUDIFONOS TWS', 'audífonos TWS')}.</p>"
            ),
        },
        {
            "h2": "Cómo armar el pedido de regalos paso a paso",
            "html": (
                "<ol><li>Cuenta destinatarios por grupo: clientes clave, clientes generales, empleados y proveedores.</li>"
                "<li>Asigna un modelo por grupo. Dos o tres modelos en total facilitan la logística y el envoltorio.</li>"
                "<li>Define colores. Pregunta disponibilidad por color antes de cerrar, porque en temporada se agotan primero.</li>"
                "<li>Pide la cotización con la cantidad exacta de cada modelo y color.</li>"
                "<li>Agrega un 5 % de reserva para invitados de último momento o un equipo que falle.</li>"
                "<li>Coordina el envío a cada sucursal. Si tu empresa tiene oficinas en Cuenca o Loja, despachamos directo "
                "desde Quito.</li>"
                "<li>Prueba una unidad de cada modelo al recibir el pedido: carga completa y emparejamiento con un celular.</li></ol>"
                f"<p>En {apost('tecnologia-por-mayor-envios-ecuador', 'envíos a todo Ecuador')} tienes cómo funcionan los "
                "despachos a provincia.</p>"
            ),
        },
        {
            "h2": "Para tiendas: arma combos de temporada",
            "html": (
                "<p>Si tienes una tienda de celulares o tecnología, diciembre es el mes en que más se venden audífonos y "
                "parlantes como regalo. Arma combos con un audífono TWS y un "
                f"{ap(10423, 'cargador tipo A con cable tipo C')} de la misma marca, o un parlante con un "
                f"{ap(10411, 'cable V8')} de repuesto. Con la "
                f"{apost('cuenta-comercial-precios-distribuidor', 'cuenta comercial')} ves los precios de distribuidor y "
                "calculas tu margen antes de pedir.</p>"
            ),
        },
        {
            "h2": "Cuándo NO te conviene regalar audífonos o parlantes",
            "html": (
                "<ul><li><strong>Si el regalo es para trabajar en llamadas todo el día:</strong> ahí corresponde un audífono "
                "de call center con micrófono en brazo, no uno Bluetooth de uso personal.</li>"
                "<li><strong>Si necesitas el logo de tu empresa en el producto:</strong> estos modelos se entregan con su "
                "empaque de marca 1Hora. Si el logo es indispensable, combina el audífono con una tarjeta o un empaque "
                "propio.</li>"
                "<li><strong>Si pides tarde:</strong> las cantidades grandes en un solo color se confirman con anticipación. "
                "Pedir la última semana de diciembre limita los modelos disponibles.</li></ul>"
            ),
        },
    ],
    "products": [10440, 10443, 6927, 6975, 10454, 10451],
    "cta_mid": {
        "title": "¿Armando los regalos de fin de año?",
        "text": "Dinos cuántas unidades y qué colores necesitas y te confirmamos disponibilidad de audífonos y parlantes 1Hora.",
        "wa_text": "Hola, vengo del artículo de regalos corporativos, quiero cotizar audífonos y parlantes 1Hora",
    },
    "cta_end": {
        "title": "Regalos de empresa con precio de distribuidor",
        "text": "Crea tu cuenta comercial y ve precios por volumen en audífonos, parlantes y accesorios 1Hora.",
        "wa_text": "Hola, vengo del artículo de regalos corporativos, necesito cotizar regalos por volumen",
    },
    "faq": [
        {"q": "¿Qué regalo corporativo es útil para clientes y empleados?",
         "a": "Un audífono o un parlante Bluetooth, porque se usa todos los días y funciona con cualquier celular. Así el regalo no termina guardado en un cajón."},
        {"q": "¿Puedo pedir el mismo modelo en varios colores?",
         "a": "Sí, varios modelos 1Hora vienen en más de un color, por ejemplo los parlantes en negro y rojo. Confirma la disponibilidad por color al cotizar, sobre todo en diciembre."},
        {"q": "¿Cuánto dura la batería de los audífonos AUT203?",
         "a": "Según su ficha, 5 horas de reproducción al 100 % del volumen y 17 horas en total con el estuche de carga. La carga completa toma alrededor de hora y media."},
        {"q": "¿Envían regalos a sucursales en otras ciudades?",
         "a": "Sí. Despachamos desde Quito a todo Ecuador, así que puedes enviar el pedido de cada sucursal directo a su ciudad."},
    ],
    "fuentes": [
        PROD[10440]["url"],
        PROD[6927]["url"],
        PROD[6975]["url"],
        "https://1hora.com/products/1hora-bocina-bluetooth-portatil-5-3-boc060",
        "https://1hora.com/products/1hora-bocina-bluetooth-portatil-boc062",
        "https://1hora.com/products/1hora-audifonos-inalambricos-aut205",
        "https://1hora.com/products/boc244-portable-bluetooth-speaker-7w",
    ],
})

# ─── Escritura ───────────────────────────────────────────────────────────────
if __name__ == "__main__":
    os.makedirs(os.path.join(AQUI, "specs"), exist_ok=True)
    for s in sorted(SPECS, key=lambda x: x["n"]):
        assert len(s["title"]) <= 60, (s["n"], len(s["title"]))
        assert all(f["wa_text"].startswith("Hola, vengo del artículo de") for f in (s["cta_mid"], s["cta_end"]))
        ruta = os.path.join(AQUI, "specs", f"{s['n']:02d}-{s['slug']}.json")
        json.dump(s, open(ruta, "w"), ensure_ascii=False, indent=2)
        print("escrito", os.path.relpath(ruta, AQUI))
