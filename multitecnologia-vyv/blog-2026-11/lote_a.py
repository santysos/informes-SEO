#!/usr/bin/env python3
"""Lote A del mes 2 (Multitecnología VYV): n = 1, 7, 15, 17, 20.

Genera specs/NN-slug.json. Validar con: python3 publish_batch.py --validate

Datos verificados (2026-11-19):
- Deltatech: sitio oficial www.mydelta.tech (catálogo, frase de presentación y teléfonos
  098 407 2123 / 095 883 3134). Historia: solo lo que dice el cliente (15 años, antes Delta).
- Fichas técnicas Deltatech publicadas en la tienda (HDMI 2.0 y HDMI de fibra).
- Campo «Marca» de las fichas de la tienda: productos con «DELTA» en el nombre → Deltatech;
  ventilador KSB06105HA → DELTA; cable UTP «DELTA AMPXL» → Ampxl.
- HDMI: hdmi.org (categorías de cable y certificación).
- Xtech: fichas oficiales XTC-630/637/640 (PDF con dominio xtechamericas.com, alojadas por
  un distribuidor; la web oficial carga el catálogo por JavaScript).
- Steren: steren.com.ec (fichas de cada cable).
"""
import json, os

AQUI = os.path.dirname(os.path.abspath(__file__))
SPECS = os.path.join(AQUI, "specs")
os.makedirs(SPECS, exist_ok=True)

B = "https://multitecnologiavyv.com"
# Categorías y posts del mes 1 (enlaces.json)
CAT_HDMI = f"{B}/categoria-producto/cables/cable-hdmi/"
CAT_CONV = f"{B}/categoria-producto/accesorios-computadoras/convertidores-de-senal/"
CAT_ESTUCHES = f"{B}/categoria-producto/accesorios-computadoras/estuches-laptop/"
CAT_COOLER = f"{B}/categoria-producto/accesorios-computadoras/cooler-para-laptop/"
CAT_UTP = f"{B}/categoria-producto/networking-redes/cable-utp/"
CAT_EXT = f"{B}/categoria-producto/accesorios-computadoras/extensor-de-senal/"
CAT_SPLIT = f"{B}/categoria-producto/accesorios-computadoras/spliter-switch-kvm/"
CAT_CAMIP = f"{B}/categoria-producto/vigilancia-y-seguridad/div-camaras-ip/"
CAT_PASTA = f"{B}/categoria-producto/mantenimiento/pasta-termica/"
POST_ACC = f"{B}/compras-al-por-mayor/accesorios-computacion-por-mayor/"
POST_CUENTA = f"{B}/compras-al-por-mayor/cuenta-comercial-precios-distribuidor/"
POST_ENVIOS = f"{B}/compras-al-por-mayor/tecnologia-por-mayor-envios-ecuador/"
POST_PASTA = f"{B}/guias-para-tecnicos/pasta-termica-mantenimiento-laptop/"
POST_HDMI_LAN = f"{B}/redes-y-seguridad/adaptador-hdmi-lan-extensor-hdmi/"
POST_POE = f"{B}/redes-y-seguridad/switch-poe-camaras-ip/"
# Productos
P_HDMI14 = f"{B}/producto/cable-hdmi-v1-4-delta/"
P_HDMI20 = f"{B}/producto/cable-hdmi-v2-0-4k-delta/"
P_HDMI21 = f"{B}/producto/cable-hdmi-v2-1-8k-delta/"
P_FIBRA = f"{B}/producto/cable-hdmi-de-fibra-optica/"
P_POE8 = f"{B}/producto/switch-poe-8-puertos-10-100-deltatech/"
P_PCIE = f"{B}/producto/tarjeta-pci-express-a-rj45-10-100-1000-1gbps-deltatech/"
P_SPLIT = f"{B}/producto/cable-spliter-hdmi-a-2-hdmi-l-20cm-delta/"

P_CADDY = f"{B}/producto/lector-para-segundo-disco-duro-sata-hdd-ssd-caddy-9-5-mm-delta/"
P_CASE = f"{B}/producto/case-2-5-usb-3-0-plastico-delta/"
P_BASE = f"{B}/producto/base-vaiu-505-delta-5-ventiladores-4-niveles/"
P_MINI = f"{B}/producto/cable-hdmi-a-mini-hdmi-1-5-m-delta/"
P_MICRO = f"{B}/producto/cable-hdmi-a-micro-hdmi-1-5-m-delta/"
P_OTG = f"{B}/producto/cable-otg-usb-tipo-c-a-usb-3-0-tipo-a-hembra-delta/"
P_PS2 = f"{B}/producto/adaptador-de-usb-a-ps2-delta/"

F_DELTA = "https://www.mydelta.tech/"
F_DELTA_CAT = "https://www.mydelta.tech/catalogo"
F_FICHA20 = f"{B}/wp-content/uploads/2026/05/Ficha-tecnica-HDMI-V2.0-2.pdf"
F_FICHAFO = f"{B}/wp-content/uploads/2026/05/Ficha-Tecnica-Cable-HDMI-Fibra-Optica.pdf"
F_HDMI_CABLES = "https://www.hdmi.org/resource/cables"
F_HDMI_ULTRA = "https://hdmi.org/spec21Sub/UltraHighSpeedCable"
F_HDMI_PREMIUM = "https://hdmi.org/spec/premiumcable"


def a(url, txt):
    return f'<a href="{url}">{txt}</a>'


SPECS_A = []

# ─── n=1 ─────────────────────────────────────────────────────────────────────
SPECS_A.append({
    "n": 1,
    "slug": "deltatech-marca-historia",
    "title": "Deltatech: historia de la marca y por qué confiar en ella",
    "focus_kw": "deltatech",
    "meta_desc": "Quién está detrás de Deltatech, qué líneas fabrica, qué dicen sus fichas técnicas y por qué técnicos y tiendas de Ecuador la eligen para sus clientes.",
    "excerpt": "Deltatech lleva 15 años en cables, adaptadores, estuches y accesorios. Qué vende, qué garantizan sus fichas técnicas y cuándo conviene ofrecerla en tu tienda.",
    "category": "Marcas y comparativas",
    "tags": ["Deltatech", "marcas de accesorios", "cables HDMI", "accesorios de computación", "tienda de computación"],
    "featured": {"pexels_query": "computer cables accessories flat lay", "alt": "Cables y accesorios de computación ordenados sobre una mesa de trabajo"},
    "inline_image": {"pexels_query": "technician desk laptop cables", "alt": "Técnico revisando cables y accesorios junto a una laptop", "after_section": 2},
    "intro_html": (
        "<p>Si tienes una tienda de computación o un taller, seguramente ya vendiste un cable, un estuche o una base de enfriamiento Deltatech sin pensar mucho en la marca. El cliente la pide por nombre, el producto funciona y vuelve por otro. Eso, en accesorios, vale más que cualquier anuncio.</p>"
        "<p>En este artículo te contamos quién es Deltatech, qué fabrica, qué dicen sus fichas técnicas y por qué puedes recomendarla con tranquilidad. También te decimos en qué casos otra opción le sirve mejor a tu cliente.</p>"
    ),
    "sections": [
        {"h2": "Deltatech en pocas palabras: 15 años en accesorios, antes con el nombre Delta",
         "html": (
             "<p><strong>Deltatech es una marca de cables, adaptadores y accesorios de computación con 15 años en el mercado</strong>, según la empresa, que antes se llamaba Delta. Sus productos se consiguen al por mayor en Multitecnología VYV, en Quito, con envío a todo el país.</p>"
             "<p>En su sitio oficial, mydelta.tech, la marca se presenta así: ofrece «soluciones de hardware para gamers, streamers, estudiantes, diseñadores, arquitectos y profesionales de varias ramas». Un detalle práctico: el número de contacto que publica, 098 407 2123, es el mismo WhatsApp de ventas de Multitecnología VYV. Si un cliente tuyo tiene un problema con un producto, hablas con el mismo equipo que te lo vendió.</p>"
         )},
        {"h2": "Qué fabrica Deltatech: las líneas que encuentras en el catálogo",
         "html": (
             "<p>Deltatech no es una marca de un solo producto. Esto es lo que aparece hoy en la tienda con su nombre:</p>"
             "<table><thead><tr><th>Línea</th><th>Ejemplos del catálogo</th><th>Quién la compra</th></tr></thead><tbody>"
             "<tr><td>Cables HDMI</td><td>HDMI 1.4, HDMI 2.0 4K, HDMI 2.1 8K y HDMI de fibra óptica de 50 a 100 m</td><td>Hogares, oficinas e instaladores</td></tr>"
             "<tr><td>Convertidores de señal</td><td>VGA a HDMI, HDMI a VGA con audio, USB 3.0 a HDMI, Mini DisplayPort</td><td>Quien conecta equipos viejos con pantallas nuevas</td></tr>"
             "<tr><td>Redes</td><td>Switch PoE de 4 y 8 puertos, tarjeta PCI Express gigabit</td><td>Instaladores de cámaras y técnicos de PC</td></tr>"
             "<tr><td>Estuches</td><td>De 13,3 a 17,3 pulgadas, sencillos y con bolsillo</td><td>Estudiantes y quien compra laptop nueva</td></tr>"
             "<tr><td>Bases de enfriamiento</td><td>VAIU-505 con cinco ventiladores y altura regulable</td><td>Gamers y laptops que trabajan muchas horas</td></tr>"
             "<tr><td>Mantenimiento</td><td>Pasta térmica de 4 g a 30 g en varias conductividades</td><td>Servicios técnicos</td></tr>"
             "<tr><td>USB y energía</td><td>Extensores USB, cable OTG tipo C, batería de UPS 12 V 9 Ah</td><td>Oficinas y técnicos</td></tr>"
             "</tbody></table>"
             f"<p>Puedes ver toda la línea de video en la categoría de {a(CAT_HDMI, 'cables HDMI')} y los estuches en {a(CAT_ESTUCHES, 'estuches para laptop')}.</p>"
         )},
        {"h2": "La primera razón para confiar: fichas técnicas que no exageran",
         "html": (
             "<p>Muchas marcas de accesorios imprimen «4K» en la caja y nada más. Deltatech publica fichas técnicas con los límites reales de cada producto, y eso le sirve a quien vende y a quien instala.</p>"
             f"<ul><li><strong>{a(P_HDMI20, 'Cable HDMI 2.0 4K')}:</strong> su ficha dice resolución máxima de 3840 × 2160 a 30 Hz, HDCP 1.4 y 2.2, forro con clasificación VW-1, calibre 30 AWG, largos de 1 a 25 m y garantía de un año.</li>"
             f"<li><strong>{a(P_FIBRA, 'Cable HDMI de fibra óptica')}:</strong> compatible con HDMI 2.0b, 18 Gbps, 4K a 60 Hz, HDR10, certificaciones CE, FCC y RoHS, y largos de 50 a 100 m.</li></ul>"
             "<p>Que una marca escriba «30 Hz» en su propia ficha, cuando sería más fácil callarlo, dice mucho. Tú sabes qué prometerle al cliente y no te llega un reclamo por una consola que no da 60 Hz.</p>"
         )},
        {"h2": "La segunda razón: garantía y soporte en Quito",
         "html": (
             "<p>Un accesorio barato sin respaldo sale caro cuando falla. Con Deltatech tienes dos ventajas concretas:</p>"
             "<ul><li><strong>Garantía declarada:</strong> la ficha del cable HDMI 2.0 indica un año. Para otros productos, confirma el plazo con un asesor antes de venderlos.</li>"
             "<li><strong>Soporte local:</strong> el reclamo se atiende en Quito, en José de Armero y El Oro, sin intermediarios ni envíos al exterior.</li>"
             "<li><strong>Reposición rápida:</strong> como el stock está en el país, un técnico de Riobamba o una tienda de Ambato repone en días, no en semanas.</li></ul>"
             f"<p>Si estás fuera de Quito, en la guía de {a(POST_ENVIOS, 'envíos de tecnología al por mayor a todo Ecuador')} te explicamos cómo llega el pedido.</p>"
         )},
        {"h2": "Cuatro productos Deltatech que resuelven problemas del taller",
         "html": (
             "<p>Más allá de los cables, hay piezas de la marca que un técnico usa casi todas las semanas:</p>"
             f"<ul><li><strong>{a(P_CADDY, 'Caddy para segundo disco')}:</strong> reemplaza la unidad de DVD de una laptop por un SSD o un disco SATA. Viene en 9,5 mm y 12,7 mm, así que mide el grosor de la unidad antes de pedirlo.</li>"
             f"<li><strong>{a(P_CASE, 'Case de 2,5 pulgadas USB 3.0')}:</strong> convierte el disco que sacaste de una laptop en un disco externo para devolverle al cliente sus archivos.</li>"
             f"<li><strong>{a(P_BASE, 'Base VAIU-505')}:</strong> cinco ventiladores para laptops que se calientan en jornadas largas, como las de diseño o las que pasan el día en una caja registradora.</li>"
             "<li><strong>Extensor USB por cable de red:</strong> lleva un teclado o un lector de código de barras a 40 o 100 m de la PC, útil en bodegas y locales grandes.</li></ul>"
             "<p>Son productos que el cliente no sabe que existen hasta que tú se los muestras, y por eso dejan buen margen.</p>"
         )},
        {"h2": "Cómo sumar Deltatech a tu tienda sin llenarte de stock",
         "html": (
             "<ol><li><strong>Empieza por lo que más rota:</strong> cables HDMI de 1,5 a 3 m, un convertidor VGA a HDMI y un estuche de 15,6 pulgadas.</li>"
             "<li><strong>Lee la ficha antes de prometer:</strong> si el cliente quiere 4K a 60 Hz, ofrécele el HDMI 2.1 8K y no el 2.0.</li>"
             f"<li><strong>Arma combos:</strong> laptop con estuche y {a(CAT_COOLER, 'base de enfriamiento')} se vende mejor que cada pieza por separado.</li>"
             f"<li><strong>Suma el taller:</strong> si haces mantenimiento, la pasta térmica Deltatech entra en el mismo pedido. Te explicamos cuál usar en la guía de {a(POST_PASTA, 'pasta térmica para laptop')}.</li>"
             f"<li><strong>Pide con cuenta comercial:</strong> los precios de distribuidor solo se ven al iniciar sesión. Aquí te contamos {a(POST_CUENTA, 'cómo abrir la cuenta comercial')}.</li></ol>"
         )},
        {"h2": "Cuándo NO te conviene Deltatech",
         "html": (
             "<p>Recomendar bien también es saber cuándo otra opción encaja mejor:</p>"
             "<ul><li><strong>Si el cliente exige la etiqueta de certificación HDMI con código QR:</strong> las fichas de Deltatech no mencionan esa certificación. Para un proyecto que la pida por contrato, busca un cable que la traiga impresa.</li>"
             "<li><strong>Si la red necesita puertos gigabit con PoE:</strong> los switches PoE de Deltatech son de 10/100. Alcanzan para cámaras IP, pero no para un servidor o una red de oficina con mucho tráfico.</li>"
             "<li><strong>Si la licitación pide una marca específica:</strong> en compras públicas o corporativas con marca definida, no hay margen para sustituir.</li></ul>"
             "<p>Fuera de esos casos, Deltatech cubre lo que un técnico o una tienda necesita a diario, con ficha clara y soporte en el país.</p>"
         )},
    ],
    "products": [9861, 9823, 6800, 6807, 7716, 7980],
    "cta_mid": {"title": "¿Quieres probar Deltatech en tu tienda?",
                "text": "Cuéntanos qué vendes más y te armamos un primer pedido con las líneas que rotan.",
                "wa_text": "Hola, vengo del artículo de Deltatech y quiero armar un primer pedido para mi tienda"},
    "cta_end": {"title": "Precios de distribuidor en Deltatech",
                "text": "Crea tu cuenta comercial y mira los precios por volumen en cables, estuches y accesorios.",
                "wa_text": "Hola, vengo del artículo de Deltatech y quiero abrir una cuenta comercial"},
    "faq": [
        {"q": "¿Deltatech es lo mismo que Delta?",
         "a": "Sí. Según la empresa, la marca se llamaba Delta y pasó a llamarse Deltatech. Por eso en el catálogo todavía conviven productos con los dos nombres."},
        {"q": "¿Cuántos años tiene la marca Deltatech?",
         "a": "La empresa indica que la marca tiene 15 años en el mercado, contando la etapa en que se llamaba Delta."},
        {"q": "¿Qué garantía tienen los productos Deltatech?",
         "a": "La ficha técnica del cable HDMI 2.0 declara un año de garantía. Para los demás productos, confirma el plazo con un asesor antes de venderlos."},
        {"q": "¿Dónde compro Deltatech al por mayor en Ecuador?",
         "a": "En Multitecnología VYV, en José de Armero y El Oro, en Quito. Con una cuenta comercial ves los precios de distribuidor y recibes el pedido en cualquier provincia."},
    ],
    "fuentes": [F_DELTA, F_DELTA_CAT, F_FICHA20, F_FICHAFO, P_HDMI20, P_FIBRA, P_POE8],
})

# ─── n=7 ─────────────────────────────────────────────────────────────────────
SPECS_A.append({
    "n": 7,
    "slug": "delta-ahora-es-deltatech",
    "title": "Delta ahora es Deltatech: cómo reconocer sus productos",
    "focus_kw": "delta ahora es deltatech",
    "meta_desc": "Por qué en el catálogo hay productos «DELTA» y «Deltatech», cómo saber cuáles son de la marca y los dos casos en que «Delta» significa otra cosa.",
    "excerpt": "En la tienda conviven productos que dicen DELTA y otros que dicen Deltatech. Son la misma marca: así los reconoces y así evitas confundirlos con otros Delta.",
    "category": "Marcas y comparativas",
    "tags": ["Deltatech", "Delta", "marcas de accesorios", "catálogo", "cables y adaptadores"],
    "featured": {"pexels_query": "product boxes warehouse shelf labels", "alt": "Cajas de productos con etiquetas en la percha de una bodega"},
    "inline_image": {"pexels_query": "hdmi cable connector close up", "alt": "Conector de un cable HDMI visto de cerca", "after_section": 3},
    "intro_html": (
        "<p>Si buscas en la tienda, vas a ver un «CASE 2.5 USB 3.0 PLASTICO DELTA» junto a un «ESTUCHE 15.6 SENCILLO DELTATECH». No es un error ni son dos proveedores: Delta cambió de nombre a Deltatech, y el catálogo todavía muestra los dos.</p>"
        "<p>Aquí te explicamos qué cambió, cómo reconocer un producto de la marca aunque diga solo «Delta», y los dos casos del catálogo en que «Delta» se refiere a otra cosa. Te sirve para comprar sin dudas y para responderle al cliente que llega pidiendo «el cable Delta».</p>"
    ),
    "sections": [
        {"h2": "Delta y Deltatech son la misma marca con nombre nuevo",
         "html": (
             "<p><strong>Delta ahora es Deltatech: es la misma marca, con los mismos productos y el mismo respaldo, bajo un nombre nuevo.</strong> Según la empresa, la marca tiene 15 años en el mercado y la mayoría de ellos los pasó como Delta.</p>"
             "<p>La prueba más simple está en la propia tienda. Abre la ficha de un producto que diga «DELTA» en el nombre, por ejemplo el extensor USB por cable de red de 100 m o la pasta térmica de 4 g, y mira el campo <strong>Marca</strong>: dice Deltatech.</p>"
         )},
        {"h2": "Por qué conviven los dos nombres en el catálogo",
         "html": (
             "<p>De los casi 90 productos de la marca que hay en la tienda, alrededor de 30 ya llevan el nombre Deltatech. El resto conserva «DELTA» en el título con el que entró al catálogo, aunque la ficha ya los registra con la marca nueva.</p>"
             "<p>Para ti no cambia nada en la práctica. El cable HDMI que pedías como Delta es el mismo producto, y en las líneas renovadas el nombre nuevo aparece de una vez, como en los cables HDMI 1.4, 2.0 y de fibra óptica.</p>"
             "<p>Lo que sí conviene es que tu vendedor lo sepa. Un cliente de Latacunga que compró un estuche Delta hace años y hoy ve uno Deltatech en tu percha puede pensar que es imitación. Una frase lo resuelve: «es la misma marca, cambió de nombre».</p>"
         )},
        {"h2": "Cómo aparece cada producto en la tienda",
         "html": (
             "<p>Esta tabla muestra productos reales del catálogo con el nombre que tienen y la marca que registra su ficha:</p>"
             "<table><thead><tr><th>Nombre en la tienda</th><th>Marca en la ficha</th><th>¿Es Deltatech?</th></tr></thead><tbody>"
             "<tr><td>Cable convertidor USB 3.0 a HDMI DELTA</td><td>Deltatech</td><td>Sí</td></tr>"
             "<tr><td>Extensor de señal USB 2.0 con cable de red, 100 m, DELTA</td><td>Deltatech</td><td>Sí</td></tr>"
             "<tr><td>Pasta térmica 4 g DELTA, conductividad 15,2</td><td>Deltatech</td><td>Sí</td></tr>"
             "<tr><td>Switch PoE 8 puertos 10/100 DELTATECH</td><td>Deltatech</td><td>Sí</td></tr>"
             "<tr><td>Ventilador laptop HP CQ42 G4 Delta KSB06105HA-9H1X</td><td>DELTA</td><td>No: es el fabricante del ventilador</td></tr>"
             "<tr><td>AMPXL cable UTP Cat5e 305 m DELTA</td><td>Ampxl</td><td>No: la marca es Ampxl</td></tr>"
             "</tbody></table>"
             f"<p>Si trabajas con pasta térmica, la guía de {a(POST_PASTA, 'pasta térmica para laptop')} te explica qué conductividad usar en cada equipo.</p>"
         )},
        {"h2": "Los dos casos que confunden: ventiladores y cable UTP",
         "html": (
             "<ul><li><strong>Ventiladores de laptop «Delta»:</strong> en repuestos como el ventilador para HP CQ42 y G42, «Delta» identifica al fabricante del ventilador original, que usa números de parte como KSB06105HA. Es otra empresa y no tiene relación con Deltatech. Ahí lo que importa es que el número de parte coincida con el del equipo.</li>"
             f"<li><strong>Cable UTP «DELTA AMPXL»:</strong> las bobinas de {a(CAT_UTP, 'cable UTP')} que llevan ese nombre están registradas con marca Ampxl. Para tu cotización, anótalas como Ampxl.</li></ul>"
             "<p>Fuera de esos dos casos, si un accesorio del catálogo dice Delta, es Deltatech. Si un cliente te trae un repuesto con la palabra Delta grabada, revisa primero si es un ventilador o una pieza interna del equipo: ahí casi nunca se trata de la marca.</p>"
         )},
        {"h2": "Cómo reconocer un producto Deltatech en cuatro pasos",
         "html": (
             "<ol><li><strong>Mira el campo Marca de la ficha.</strong> Es el dato que manda, por encima del nombre del producto.</li>"
             "<li><strong>Anota el SKU.</strong> Los cables HDMI, por ejemplo, usan códigos como C-HDMI-V1.4 o C-HDMI-FIBRA. Con el SKU el pedido sale sin errores.</li>"
             "<li><strong>Descarga la ficha técnica cuando exista.</strong> Las fichas de la marca llevan en la cabecera la dirección mydelta.tech y la firma @Deltatech.</li>"
             "<li><strong>Si dudas, pregunta por WhatsApp con el SKU.</strong> Un asesor te confirma si es de la marca y si hay stock.</li></ol>"
         )},
        {"h2": "Qué responder cuando el cliente pide «el cable Delta»",
         "html": (
             "<p>El nombre anterior tiene años en la memoria de los clientes, así que vas a escuchar «¿tiene el cable Delta?» por un buen tiempo. Tres respuestas que funcionan en el mostrador:</p>"
             "<ul><li><strong>Si tienes el producto con nombre nuevo:</strong> «Es el mismo, ahora la marca se llama Deltatech». Muéstrale la caja y la ficha si duda.</li>"
             "<li><strong>Si pide un modelo que ya no está:</strong> busca el equivalente por función. Un cliente que pide «el HDMI Delta de 3 metros» casi siempre quiere el HDMI 1.4 o el 2.0 de ese largo; pregúntale qué va a conectar.</li>"
             "<li><strong>Si compara con un producto que compró hace años:</strong> explícale que es la misma marca y que las líneas renovadas, como los cables HDMI, traen ficha técnica publicada.</li></ul>"
             "<p>Lo importante es que el cambio de nombre no se convierta en una venta perdida por desconfianza.</p>"
         )},
        {"h2": "Qué cambia para tu tienda con el nombre nuevo",
         "html": (
             "<ul><li><strong>Etiquetas y publicaciones:</strong> si vendes por redes o en una tienda en línea, escribe «Deltatech (antes Delta)» durante un tiempo. Así te encuentra quien busca cualquiera de los dos nombres.</li>"
             "<li><strong>Cotizaciones a empresas:</strong> usa Deltatech como marca y el SKU de la ficha. Evitas que un comprador de Guayaquil o de Cuenca crea que le cambiaste el producto.</li>"
             f"<li><strong>Surtido:</strong> la marca cubre cables, convertidores, estuches y bases. Si estás armando el surtido, revisa la guía de {a(POST_ACC, 'accesorios de computación al por mayor')}.</li></ul>"
         )},
        {"h2": "Cuándo NO te conviene esperar al empaque nuevo",
         "html": (
             "<p>Hay tiendas que prefieren no comprar mientras el nombre cambia, para no tener «dos marcas» en la percha. Si te pasa, piensa en esto:</p>"
             "<ul><li>El producto con nombre DELTA es el mismo artículo de la marca, con la misma ficha.</li>"
             "<li>Esperar significa perder ventas de productos de rotación diaria, como cables y convertidores.</li>"
             "<li>Si un cliente pregunta, la explicación toma diez segundos.</li></ul>"
             "<p>La única espera que tiene sentido es la de un pedido grande para una empresa que exige que todas las unidades lleguen con el mismo empaque. En ese caso, pídelo así al asesor y él te confirma qué hay en bodega.</p>"
         )},
    ],
    "products": [6770, 6845, 7716, 7980, 9837, 6822],
    "cta_mid": {"title": "¿Tienes un producto Delta y no sabes si es el mismo?",
                "text": "Mándanos el nombre o el SKU por WhatsApp y te confirmamos el equivalente Deltatech.",
                "wa_text": "Hola, vengo del artículo de Delta ahora es Deltatech y quiero confirmar un producto"},
    "cta_end": {"title": "Pide Deltatech con precios de distribuidor",
                "text": "Con tu cuenta comercial ves los precios por volumen de toda la línea, con nombre nuevo o anterior.",
                "wa_text": "Hola, vengo del artículo de Delta ahora es Deltatech y quiero cotizar productos de la marca"},
    "faq": [
        {"q": "¿Por qué Delta cambió de nombre a Deltatech?",
         "a": "La empresa no ha publicado el motivo del cambio. Lo que sí confirma es que es la misma marca, con los mismos productos."},
        {"q": "¿Un producto que dice DELTA es de menor calidad que uno Deltatech?",
         "a": "No. Es el mismo artículo con el nombre anterior en el título, y su ficha ya lo registra con marca Deltatech."},
        {"q": "¿Los ventiladores de laptop Delta son Deltatech?",
         "a": "No. En esos repuestos, Delta es el fabricante del ventilador original. Para elegirlos, guíate por el número de parte."},
        {"q": "¿Cómo sé si un producto es Deltatech antes de comprarlo?",
         "a": "Abre la ficha en la tienda y mira el campo Marca. Si tienes dudas, envía el SKU por WhatsApp y un asesor te lo confirma."},
    ],
    "fuentes": [F_DELTA, F_FICHA20, F_FICHAFO,
                f"{B}/producto/cable-convertidor-usb-3-0-a-hdmi-delta/",
                f"{B}/producto/ampxl-cable-utp-interior-cat6-cobre-cm-305m-delta-ampxl-23awg-azul/"],
})

# ─── n=15 ────────────────────────────────────────────────────────────────────
SPECS_A.append({
    "n": 15,
    "slug": "cable-hdmi-4k-8k-como-comprobarlo",
    "title": "Cable HDMI 4K u 8K: cómo comprobar si de verdad lo es",
    "focus_kw": "cable hdmi 4k",
    "meta_desc": "Qué categoría de cable necesita cada resolución, cómo leer la etiqueta de certificación y una prueba en seis pasos para saber si tu cable da 4K a 60 Hz u 8K.",
    "excerpt": "Que la caja diga 4K no garantiza 4K a 60 Hz. Cómo leer la categoría del cable, verificar la etiqueta y probarlo en un televisor o una PC antes de entregarlo.",
    "category": "Guías para técnicos",
    "tags": ["cable HDMI", "HDMI 4K", "HDMI 8K", "HDMI fibra óptica", "instalación de pantallas"],
    "featured": {"pexels_query": "hdmi cable tv back port", "alt": "Cable HDMI conectado a la parte posterior de un televisor"},
    "inline_image": {"pexels_query": "gaming console tv living room", "alt": "Consola de videojuegos conectada a un televisor 4K", "after_section": 2},
    "intro_html": (
        "<p>Un técnico instala un televisor 4K en un restaurante de Guayaquil, conecta la consola o el reproductor y la imagen parpadea cada pocos minutos. El televisor está bien y la consola también. El problema es el cable, que decía «4K» en la caja pero no aguanta la señal que le están pidiendo.</p>"
        "<p>En esta guía te explicamos cómo saber qué puede transmitir un cable HDMI, cómo leer la etiqueta de certificación y cómo probarlo en diez minutos antes de entregar el trabajo.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: lo que define el cable es su ancho de banda",
         "html": (
             "<p><strong>Un cable HDMI es 4K u 8K según el ancho de banda que soporta, no según el número de versión impreso en la caja.</strong> La organización que licencia HDMI clasifica los cables en categorías, y cada una está pensada para ciertas resoluciones:</p>"
             "<table><thead><tr><th>Categoría</th><th>Ancho de banda</th><th>Pensado para</th></tr></thead><tbody>"
             "<tr><td>Standard</td><td>No especificado</td><td>720p y 1080i</td></tr>"
             "<tr><td>High Speed</td><td>Hasta 10,2 Gbps</td><td>1080p y 4K a 30 Hz</td></tr>"
             "<tr><td>Premium High Speed</td><td>Hasta 18 Gbps</td><td>4K a 60 Hz con HDR</td></tr>"
             "<tr><td>Ultra High Speed</td><td>Hasta 48 Gbps</td><td>8K a 60 Hz y 4K a 120 Hz</td></tr>"
             "<tr><td>Ultra96</td><td>Hasta 96 Gbps</td><td>8K a 60 Hz y 4K a 240 Hz con color completo</td></tr>"
             "</tbody></table>"
             "<p>Por eso «4K» solo no basta: un cable High Speed transmite 4K, pero a 30 Hz. Para 4K a 60 Hz necesitas 18 Gbps.</p>"
         )},
        {"h2": "La etiqueta de certificación y su código QR",
         "html": (
             "<p>Los cables Premium High Speed y Ultra High Speed certificados pasan pruebas en un centro autorizado y deben llevar una etiqueta oficial en el empaque. En los Ultra High Speed esa etiqueta se escanea con cualquier lector de códigos QR y muestra la marca, el modelo y el largo del cable.</p>"
             "<ul><li><strong>Si la etiqueta está y el escaneo coincide</strong> con lo que tienes en la mano, el cable fue probado para esa categoría.</li>"
             "<li><strong>Si no hay etiqueta</strong>, no significa que el cable sea malo: muchos cables sin certificar funcionan bien en su rango. Significa que tienes que comprobarlo tú.</li>"
             "<li><strong>Si el código lleva a otra marca o a otro largo</strong>, desconfía del producto.</li></ul>"
         )},
        {"h2": "Prueba en seis pasos antes de entregar la instalación",
         "html": (
             "<ol><li><strong>Confirma qué pueden dar los equipos.</strong> En muchos televisores solo algunos puertos HDMI aceptan 4K a 60 Hz o 120 Hz. Usa el puerto marcado para eso.</li>"
             "<li><strong>Conecta y mira la información de la señal</strong> en el menú del televisor: debe mostrar la resolución y la frecuencia que esperas.</li>"
             "<li><strong>En una PC con Windows</strong>, entra a Configuración, Pantalla, Configuración avanzada de pantalla, y revisa la frecuencia de actualización. Si 60 Hz no aparece en 4K, el cable o el puerto no dan.</li>"
             "<li><strong>Reproduce contenido 4K con HDR durante diez minutos.</strong> Los cortes suelen aparecer con el equipo caliente, no en el primer minuto.</li>"
             "<li><strong>Cambia el cable por uno de referencia</strong> que sepas que funciona. Si el problema desaparece, ya sabes quién fallaba.</li>"
             "<li><strong>Si falla solo en largos grandes</strong>, acorta el tramo o pasa a fibra óptica o a un extensor por cable de red.</li></ol>"
         )},
        {"h2": "Síntomas de un cable que no aguanta la señal",
         "html": (
             "<ul><li><strong>Pantalla negra por uno o dos segundos</strong>, que vuelve sola.</li>"
             "<li><strong>Puntos blancos o «chispas»</strong> en zonas oscuras de la imagen.</li>"
             "<li><strong>El HDR se desactiva</strong> o el color se ve lavado.</li>"
             "<li><strong>La opción de 60 Hz o 120 Hz no aparece</strong> en el menú de la consola o de la PC.</li>"
             "<li><strong>El audio se corta</strong> cuando la barra de sonido está conectada por ARC.</li></ul>"
             "<p>Si ves cualquiera de estos síntomas con un cable de 10 m o más, la distancia es la primera sospecha.</p>"
         )},
        {"h2": "Distancia: hasta dónde llega el cobre y cuándo pasar a fibra",
         "html": (
             "<p>Cuanto más largo es un cable de cobre, más le cuesta sostener anchos de banda altos. Para salas de reuniones en Quito o pantallas de menú en un local de Cuenca, con la fuente lejos de la pantalla, tienes dos caminos:</p>"
             f"<ul><li><strong>{a(P_FIBRA, 'HDMI de fibra óptica')}:</strong> el de Deltatech declara 4K a 60 Hz, 18 Gbps y HDR10 en largos de 50 a 100 m. Es de una sola dirección: el conector SOURCE va a la fuente y DISPLAY a la pantalla.</li>"
             "<li><strong>Extensor HDMI por cable de red:</strong> envía la señal por UTP Cat5e o Cat6. Te explicamos cuándo conviene en la guía de "
             f"{a(POST_HDMI_LAN, 'extensores HDMI por cable de red')}.</li></ul>"
         )},
        {"h2": "Qué cable Deltatech elegir para cada caso",
         "html": (
             f"<ul><li><strong>Proyectores, monitores Full HD y grabadores de cámaras:</strong> el {a(P_HDMI14, 'HDMI 1.4')}, que va de 1 a 30 m.</li>"
             f"<li><strong>Televisores 4K con contenido a 30 Hz, TV box y laptops:</strong> el {a(P_HDMI20, 'HDMI 2.0 4K')}. Su ficha declara 3840 × 2160 a 30 Hz, así que no lo ofrezcas para 4K a 60 Hz.</li>"
             f"<li><strong>Consolas y televisores que piden 4K a 60 Hz o más:</strong> el {a(P_HDMI21, 'HDMI 2.1 8K')}, en 1,5, 2 y 5 m.</li>"
             "<li><strong>Tramos de 50 m en adelante:</strong> el HDMI de fibra óptica.</li></ul>"
             f"<p>Todos están en la categoría de {a(CAT_HDMI, 'cables HDMI')} de la tienda.</p>"
         )},
        {"h2": "Mini HDMI, micro HDMI y otros conectores: las mismas reglas",
         "html": (
             f"<p>Cámaras fotográficas, tablets y algunas placas de desarrollo usan conectores más pequeños. Un {a(P_MINI, 'cable HDMI a mini HDMI')} o un {a(P_MICRO, 'cable HDMI a micro HDMI')} de 1,5 m transmite la misma señal que uno estándar, y lo que define su capacidad sigue siendo el ancho de banda, no la forma del conector.</p>"
             "<ul><li><strong>Revisa qué entrega el equipo:</strong> muchas cámaras sacan 1080p por su puerto mini HDMI, y ahí cualquier cable de buena construcción cumple.</li>"
             "<li><strong>Evita sumar adaptadores en cadena:</strong> cada unión es un punto donde la señal puede fallar. Un cable directo es más confiable que un cable estándar con dos adaptadores.</li>"
             "<li><strong>Cuida el conector:</strong> los puertos micro HDMI son frágiles. Un cable que tira hacia abajo termina dañando el puerto del equipo, y esa reparación sale más cara que el cable.</li></ul>"
         )},
        {"h2": "Cuándo NO te conviene un cable 8K",
         "html": (
             "<p>Vender el cable más caro no siempre es vender bien. Un cable 8K no le aporta nada a un proyector de 1080p, a un monitor de oficina Full HD ni a la salida HDMI de un grabador de cámaras. En esos casos, un HDMI 1.4 del largo correcto resuelve igual y el cliente vuelve porque le recomendaste lo justo.</p>"
             "<p>Guarda el 8K para consolas de última generación, televisores con 120 Hz y PC gamer, donde sí se usa el ancho de banda.</p>"
         )},
    ],
    "products": [10460, 9861, 9823, 9837, 11477],
    "cta_mid": {"title": "¿No sabes qué cable pide tu instalación?",
                "text": "Dinos qué equipos conectas y a qué distancia, y te decimos qué cable o extensor usar.",
                "wa_text": "Hola, vengo del artículo de cable HDMI 4K u 8K y quiero saber qué cable necesito"},
    "cta_end": {"title": "Cables HDMI con precio de distribuidor",
                "text": "Crea tu cuenta comercial y mira los precios por volumen en cables HDMI, fibra óptica y extensores.",
                "wa_text": "Hola, vengo del artículo de cable HDMI 4K u 8K y quiero cotizar cables por mayor"},
    "faq": [
        {"q": "¿Un cable HDMI 2.0 siempre da 4K a 60 Hz?",
         "a": "No necesariamente. Lo que define si da 4K a 60 Hz es que soporte 18 Gbps, la categoría Premium High Speed. Revisa la ficha del cable antes de prometerlo."},
        {"q": "¿Cómo sé si mi cable HDMI es certificado?",
         "a": "Busca la etiqueta oficial de certificación en el empaque. En los Ultra High Speed se escanea con un lector de QR y muestra marca, modelo y largo."},
        {"q": "¿Puedo usar un cable 8K con un televisor 4K?",
         "a": "Sí, los cables HDMI son compatibles hacia atrás. Solo que el televisor usará la resolución máxima que admite."},
        {"q": "¿Cuál es el largo máximo de un cable HDMI?",
         "a": "Depende del cable y de la señal. Para 4K en tramos de 50 a 100 m, lo seguro es fibra óptica o un extensor por cable de red."},
    ],
    "fuentes": [F_HDMI_CABLES, F_HDMI_ULTRA, F_HDMI_PREMIUM, F_FICHA20, F_FICHAFO, P_HDMI14, P_HDMI21],
})

# ─── n=17 ────────────────────────────────────────────────────────────────────
SPECS_A.append({
    "n": 17,
    "slug": "deltatech-conectividad-cables-switches-adaptadores",
    "title": "Deltatech conectividad: cables, switches y adaptadores",
    "focus_kw": "deltatech conectividad",
    "meta_desc": "Qué piezas de conectividad Deltatech usar en cada instalación: cámaras IP, proyectores, pantallas duplicadas, PC sin red y equipos con puerto serial.",
    "excerpt": "Switches PoE, convertidores HDMI y VGA, splitters, tarjetas de red y extensores USB: cómo armar soluciones de conectividad completas con la línea Deltatech.",
    "category": "Componentes y accesorios",
    "tags": ["Deltatech", "conectividad", "switch PoE", "convertidores de señal", "instaladores"],
    "featured": {"pexels_query": "network switch ethernet cables installation", "alt": "Switch de red con cables Ethernet conectados en una instalación"},
    "inline_image": {"pexels_query": "projector meeting room laptop", "alt": "Laptop conectada a un proyector en una sala de reuniones", "after_section": 3},
    "intro_html": (
        "<p>Un instalador de Ibarra tiene en la misma semana cuatro cámaras IP en una ferretería, un proyector VGA en un colegio y una caja que necesita una balanza con puerto serial. Son tres trabajos distintos, pero todos se resuelven con piezas pequeñas de conectividad que conviene tener en la camioneta.</p>"
        "<p>Esta guía ordena la línea de conectividad Deltatech por situación: qué pieza resuelve cada problema, qué complemento necesita y en qué casos te conviene otra cosa.</p>"
    ),
    "sections": [
        {"h2": "Qué cubre Deltatech en conectividad",
         "html": (
             "<p><strong>La línea de conectividad Deltatech cubre tres frentes: video, red y USB.</strong> En video tiene cables HDMI, convertidores entre HDMI, VGA y DisplayPort, y un splitter HDMI. En red, switches PoE de 4 y 8 puertos y una tarjeta PCI Express gigabit. En USB, extensores por cable de red, cables OTG y cables USB a serial DB9.</p>"
             "<p>Lo que no fabrica es el cable UTP de bobina: las bobinas que acompañan estas instalaciones en la tienda son de marca Ampxl.</p>"
         )},
        {"h2": "Qué pieza usar en cada instalación",
         "html": (
             "<table><thead><tr><th>Situación</th><th>Pieza Deltatech</th><th>Complemento</th></tr></thead><tbody>"
             "<tr><td>Cuatro cámaras IP en un local</td><td>Switch PoE 4 puertos 10/100</td><td>Cable UTP y grabador NVR</td></tr>"
             "<tr><td>Laptop nueva con proyector VGA</td><td>Convertidor HDMI a VGA con audio</td><td>Parlante si el proyector no tiene</td></tr>"
             "<tr><td>PC antigua con salida VGA y TV moderno</td><td>Convertidor VGA a HDMI</td><td>Cable HDMI del largo justo</td></tr>"
             "<tr><td>Misma imagen en dos pantallas</td><td>Splitter HDMI a 2 HDMI</td><td>Dos pantallas de igual resolución</td></tr>"
             "<tr><td>PC sin red o con el puerto dañado</td><td>Tarjeta PCI Express RJ45 gigabit</td><td>Patch cord</td></tr>"
             "<tr><td>Teclado o cámara web lejos de la PC</td><td>Extensor USB por cable de red de 40 o 100 m</td><td>Cable UTP</td></tr>"
             "<tr><td>Balanza o equipo con puerto serial</td><td>Cable USB a DB9 de 1,8 m</td><td>Driver del adaptador</td></tr>"
             "</tbody></table>"
         )},
        {"h2": "Cámaras IP: switch PoE de 4 u 8 puertos",
         "html": (
             f"<p>El switch PoE envía datos y energía por el mismo cable, así que cada cámara se instala sin un tomacorriente al lado. Deltatech tiene modelos de 4 y {a(P_POE8, '8 puertos')}, ambos de 10/100, una velocidad que alcanza para el tráfico de cámaras IP de vigilancia.</p>"
             f"<p>Antes de elegir, suma el consumo de las cámaras y compáralo con lo que entrega el switch. Lo explicamos paso a paso en la guía de {a(POST_POE, 'switch PoE para cámaras IP')}, y los equipos están en la categoría de {a(CAT_CAMIP, 'cámaras IP')}.</p>"
             "<p>Una regla práctica: elige el switch con al menos un puerto libre más de los que necesitas hoy. El cliente que empieza con tres cámaras casi siempre pide la cuarta a los pocos meses, y cambiar el switch cuesta más que haberlo previsto.</p>"
         )},
        {"h2": "Video: del HDMI al VGA y de vuelta",
         "html": (
             "<ul><li><strong>HDMI a VGA:</strong> para proyectores y monitores viejos que todavía se usan en colegios y oficinas públicas. Deltatech tiene uno tipo flash y otro de 20 cm con salida de audio.</li>"
             "<li><strong>VGA a HDMI:</strong> en cable o en caja, para PC antiguas conectadas a televisores.</li>"
             "<li><strong>USB 3.0 a HDMI o VGA:</strong> agrega una pantalla a una laptop que no tiene la salida.</li>"
             f"<li><strong>{a(P_SPLIT, 'Splitter HDMI a 2 HDMI')}:</strong> duplica la imagen. La ficha advierte que las dos pantallas deben tener la misma resolución.</li></ul>"
             f"<p>Todos están en {a(CAT_CONV, 'convertidores de señal')}.</p>"
         )},
        {"h2": "Red y USB cuando la distancia o el puerto no ayudan",
         "html": (
             f"<p>La {a(P_PCIE, 'tarjeta PCI Express RJ45 gigabit')} revive una PC de escritorio con el puerto de red quemado, un daño común después de una tormenta eléctrica. Se instala en una ranura libre y se olvida.</p>"
             f"<p>El {a(CAT_EXT, 'extensor USB por cable de red')} lleva un teclado, un lector de código de barras o una cámara web a 40 o 100 m de la PC, por un cable UTP común. Y el cable USB a DB9 conecta balanzas, impresoras fiscales y equipos con puerto serial a una PC que solo tiene USB.</p>"
         )},
        {"h2": "Celulares y periféricos: OTG y adaptadores pequeños",
         "html": (
             f"<p>La conectividad también pasa por el celular. El {a(P_OTG, 'cable OTG tipo C a USB 3.0 hembra')} permite conectar una memoria, un teclado o un lector de tarjetas a un celular o tablet con puerto tipo C, útil para pasar fotos de una cámara sin computadora.</p>"
             f"<p>En el otro extremo están los equipos antiguos: el {a(P_PS2, 'adaptador de USB a PS2')} conecta un teclado o mouse USB a una PC vieja que solo tiene puertos PS2, algo que todavía aparece en máquinas de producción y cajas registradoras. Y el adaptador tipo C a tipo C con salida de 3,5 mm permite cargar el celular y usar audífonos de cable al mismo tiempo.</p>"
         )},
        {"h2": "El kit básico que conviene llevar a cada visita",
         "html": (
             "<p>Si haces instalaciones fuera de tu ciudad, como un técnico de Otavalo que atiende en Cotacachi o en Atuntaqui, volver por una pieza cuesta medio día. Este kit cabe en una caja pequeña y resuelve la mayoría de imprevistos:</p>"
             "<ul><li>Un convertidor HDMI a VGA y uno VGA a HDMI.</li>"
             "<li>Un cable HDMI de 1,5 m y otro de 5 m.</li>"
             "<li>Un switch PoE de 4 puertos para la cámara que falta.</li>"
             "<li>Un cable OTG tipo C y un adaptador USB a PS2.</li>"
             "<li>Patch cords de distintos largos y conectores RJ45.</li></ul>"
             "<p>Repón el kit cada vez que uses una pieza y súmala al siguiente pedido.</p>"
         )},
        {"h2": "Cómo armar el pedido de una instalación",
         "html": (
             "<ol><li><strong>Haz la lista de equipos y distancias</strong> en la visita, con fotos de los puertos.</li>"
             "<li><strong>Elige la pieza por situación</strong> con la tabla de arriba.</li>"
             "<li><strong>Suma cable y conectores</strong>: UTP, patch cords y cables HDMI del largo justo.</li>"
             "<li><strong>Agrega un repuesto de lo que más falla</strong>, como un convertidor HDMI a VGA, para no volver al sitio.</li>"
             "<li><strong>Envía la lista por WhatsApp</strong> con tu cuenta comercial. El pedido sale desde Quito a tu ciudad.</li></ol>"
         )},
        {"h2": "Cuándo NO te conviene una pieza Deltatech",
         "html": (
             "<ul><li><strong>Red de oficina con mucho tráfico:</strong> los switches PoE de Deltatech son de 10/100. Para servidores o transferencias grandes, busca un switch gigabit.</li>"
             "<li><strong>Pantallas de distinta resolución:</strong> el splitter de 20 cm pide pantallas iguales. Para cuatro pantallas, la tienda tiene splitters HDMI de 4 puertos 4K; si las pantallas son distintas, consulta con un asesor antes de elegir.</li>"
             "<li><strong>4K a 60 Hz por un tramo de 30 m:</strong> un cable de cobre no es la vía. Usa el HDMI de fibra o un extensor por cable de red.</li></ul>"
         )},
    ],
    "products": [7977, 7980, 6761, 6775, 7670, 6845],
    "cta_mid": {"title": "¿Tienes una instalación en puerta?",
                "text": "Mándanos la lista de equipos y distancias y te armamos el pedido completo.",
                "wa_text": "Hola, vengo del artículo de Deltatech conectividad y quiero armar el pedido de una instalación"},
    "cta_end": {"title": "Conectividad Deltatech al por mayor",
                "text": "Con tu cuenta comercial ves los precios por volumen en switches, convertidores y extensores.",
                "wa_text": "Hola, vengo del artículo de Deltatech conectividad y quiero abrir una cuenta comercial"},
    "faq": [
        {"q": "¿Los switches PoE Deltatech sirven para cámaras IP?",
         "a": "Sí. Envían datos y energía por el mismo cable y tienen versiones de 4 y 8 puertos. Suma el consumo de las cámaras antes de elegir."},
        {"q": "¿El splitter HDMI Deltatech funciona con pantallas distintas?",
         "a": "La ficha indica que las dos pantallas deben tener la misma resolución. Con pantallas distintas, consulta con un asesor antes de elegir el splitter."},
        {"q": "¿Cómo conecto una laptop sin VGA a un proyector viejo?",
         "a": "Con un convertidor HDMI a VGA. Si necesitas sonido, elige el modelo con salida de audio."},
        {"q": "¿Deltatech fabrica cable UTP?",
         "a": "En la tienda, las bobinas UTP que acompañan estas instalaciones son de marca Ampxl. Deltatech pone switches, adaptadores y extensores."},
    ],
    "fuentes": [F_DELTA, F_DELTA_CAT, P_POE8, P_SPLIT, P_PCIE,
                f"{B}/producto/extensor-de-senal-usb-2-0-con-cable-de-red-alcance-100-m-delta/"],
})

# ─── n=20 ────────────────────────────────────────────────────────────────────
SPECS_A.append({
    "n": 20,
    "slug": "cable-hdmi-deltatech-vs-xtech-vs-steren",
    "title": "Cable HDMI Deltatech vs Xtech vs Steren: cuál conviene",
    "focus_kw": "cable hdmi deltatech",
    "meta_desc": "Comparamos las fichas oficiales de los cables HDMI de Deltatech, Xtech y Steren: resolución, ancho de banda, largos, fibra óptica y garantía. Sin adornos.",
    "excerpt": "Tres marcas de cables HDMI que se consiguen en Ecuador, comparadas con sus propias fichas técnicas: qué declara cada una en 4K, 8K y fibra óptica.",
    "category": "Marcas y comparativas",
    "tags": ["cable HDMI", "Deltatech", "Xtech", "Steren", "comparativa"],
    "featured": {"pexels_query": "hdmi cables comparison desk", "alt": "Varios cables HDMI sobre un escritorio listos para comparar"},
    "inline_image": {"pexels_query": "long cable roll installation", "alt": "Rollo de cable listo para una instalación de larga distancia", "after_section": 4},
    "intro_html": (
        "<p>Deltatech, Xtech y Steren son tres nombres que un cliente en Ecuador puede encontrar cuando busca un cable HDMI. Las tres tienen líneas 4K y 8K, y cada una publica fichas técnicas. La diferencia está en lo que dice cada ficha, y ahí hay sorpresas.</p>"
        "<p>Comparamos lo que declara cada marca en su información oficial, sin opiniones de foros. Te decimos dónde gana cada una y cuándo te conviene vender otra cosa que no sea Deltatech.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: depende de la distancia y de los hercios",
         "html": (
             "<p><strong>Para tramos largos en 4K, Deltatech es la que declara más: fibra óptica hasta 100 m con 4K a 60 Hz. Para 4K a 60 Hz en cobre de pocos metros con ancho de banda documentado, Xtech y Steren publican 18 Gbps en sus fichas.</strong> En 8K, Xtech y Steren declaran 48 Gbps, y Deltatech solo indica compatibilidad con HDR 8K.</p>"
             "<p>Ninguna de las fichas consultadas menciona la etiqueta de certificación oficial HDMI, así que en los tres casos conviene probar el cable en la instalación.</p>"
         )},
        {"h2": "Las tres marcas lado a lado",
         "html": (
             "<table><thead><tr><th>Dato de ficha</th><th>Deltatech</th><th>Xtech</th><th>Steren</th></tr></thead><tbody>"
             "<tr><td>Cable 4K de cobre</td><td>HDMI 2.0: 4K a 30 Hz, 1 a 25 m</td><td>XTC-630: 4K a 60 Hz, 18 Gbps, 3 m</td><td>HDMI 2.0: 4K a 50/60 Hz, 18 Gbps, 1 a 7,6 m</td></tr>"
             "<tr><td>Cable 8K</td><td>HDMI 2.1 HDR 8K, 1,5 a 5 m</td><td>XTC-637 y XTC-640: 8K a 60 Hz, 48 Gbps, 1,8 y 3 m</td><td>HDMI 2.1: 8K a 50/60 Hz, 48 Gbps, 1 a 5 m</td></tr>"
             "<tr><td>Fibra óptica</td><td>4K a 60 Hz, 18 Gbps, 50 a 100 m</td><td>No la encontramos en sus fichas</td><td>4K a 30 Hz, 10,2 Gbps, 30 y 50 m</td></tr>"
             "<tr><td>Garantía publicada</td><td>Un año (ficha HDMI 2.0)</td><td>Un año</td><td>Según su política de garantías</td></tr>"
             "<tr><td>Venta al por mayor en Quito</td><td>Sí, en Multitecnología VYV</td><td>Por sus distribuidores</td><td>En sus tiendas propias</td></tr>"
             "</tbody></table>"
         )},
        {"h2": "Cables 4K: la ficha de Deltatech dice 30 Hz, y conviene saberlo",
         "html": (
             f"<p>La ficha del {a(P_HDMI20, 'HDMI 2.0 4K de Deltatech')} declara una resolución máxima de 3840 × 2160 a 30 Hz, con HDR, 3D, HDCP 2.2, forro VW-1 y largos de hasta 25 m. Sirve para TV box, laptops, grabadores y televisores que reproducen series y canales.</p>"
             "<p>Xtech, con el XTC-630 trenzado de 3 m, y Steren, con su HDMI 2.0 Premium High Speed, declaran 4K a 60 Hz y 18 Gbps. Si tu cliente conecta una consola o una PC que pide 60 Hz, ese dato importa.</p>"
             f"<p>Dentro de Deltatech, la respuesta para 4K a 60 Hz es subir al {a(P_HDMI21, 'HDMI 2.1 8K')}, que viene en 1,5, 2 y 5 m.</p>"
         )},
        {"h2": "Cables 8K: Xtech y Steren publican 48 Gbps",
         "html": (
             "<p>Las fichas del Xtech XTC-637 y XTC-640 y del Steren HDMI 2.1 coinciden: 48 Gbps, 8K a 60 Hz y eARC. Steren agrega 4K a 120 Hz. Xtech detalla calibre, diámetro y trenzado de nailon.</p>"
             "<p>Deltatech describe su HDMI 2.1 como compatible con HDR 8K, de alta velocidad con Ethernet, con blindaje reforzado y forro VW-1, pero no publica el ancho de banda. Para un gamer que solo quiere que su consola funcione, alcanza. Para un integrador que necesita los 48 Gbps escritos en la propuesta, las otras dos fichas lo dejan por escrito.</p>"
         )},
        {"h2": "Distancias largas: aquí Deltatech saca ventaja",
         "html": (
             f"<p>El {a(P_FIBRA, 'HDMI de fibra óptica de Deltatech')} declara HDMI 2.0b, 18 Gbps, 4K a 60 Hz, HDR10 y HDCP 2.3, en largos de 50, 60, 70, 80, 90 y 100 m. La fibra de Steren declara 10,2 Gbps y 4K a 30 Hz en 30 y 50 m. En las fichas de Xtech que consultamos no aparece un HDMI de fibra.</p>"
             "<p>Para una pantalla de menú en un local de Manta, un auditorio en Loja o una sala de capacitación en Quito con el proyector al fondo, la fibra de Deltatech es la única de las tres que promete 4K a 60 Hz a esa distancia. Recuerda instalarla en el sentido correcto: SOURCE a la fuente y DISPLAY a la pantalla.</p>"
         )},
        {"h2": "Por dentro: lo que dicen las fichas sobre la construcción",
         "html": (
             "<p>El ancho de banda importa, pero un cable también tiene que aguantar el uso. Esto declara cada marca sobre la construcción:</p>"
             "<ul><li><strong>Deltatech HDMI 2.0:</strong> calibre 30 AWG, cubierta de PVC flexible con clasificación VW-1 y conectores de aleación de cobre con niquelado y latón.</li>"
             "<li><strong>Deltatech fibra óptica:</strong> conectores bañados en oro, diámetro de 4 mm, refuerzo de aramida, resistencia a 12 kgf de tracción y a más de 1.000 dobleces de 180 grados.</li>"
             "<li><strong>Xtech XTC-637 y XTC-640:</strong> calibre 30 y 28 AWG, pines bañados en oro, blindaje de aleación de aluminio y magnesio, y trenzado de nailon.</li>"
             "<li><strong>Steren HDMI 2.0 y 2.1:</strong> conectores con terminación en oro, doble blindaje con lámina y malla, y cubierta de PVC.</li></ul>"
             "<p>Para una instalación que pasa por canaletas o techo falso, la resistencia a tracción y dobleces de la fibra Deltatech es un dato que pocas fichas publican.</p>"
         )},
        {"h2": "Cómo decidir en cinco pasos",
         "html": (
             "<ol><li><strong>Mide la distancia real</strong> entre la fuente y la pantalla, sumando subidas y curvas.</li>"
             "<li><strong>Pregunta qué se va a conectar</strong> y a cuántos hercios: no es lo mismo un TV box que una consola.</li>"
             "<li><strong>Más de 25 m en 4K:</strong> fibra de Deltatech o un extensor por cable de red.</li>"
             "<li><strong>4K a 60 Hz en pocos metros:</strong> Deltatech HDMI 2.1, o una marca que declare 18 Gbps si el cliente lo pide en papel.</li>"
             f"<li><strong>Proyector o monitor Full HD:</strong> un {a(P_HDMI14, 'HDMI 1.4')} del largo justo es suficiente.</li></ol>"
             f"<p>Si dudas entre fibra y extensor, la guía de {a(POST_HDMI_LAN, 'extensores HDMI por cable de red')} te ayuda a decidir.</p>"
         )},
        {"h2": "Cuándo NO te conviene Deltatech",
         "html": (
             "<ul><li><strong>Si el cliente necesita 4K a 60 Hz con el HDMI 2.0:</strong> la ficha dice 30 Hz. Ofrece el 2.1 o una marca que declare 18 Gbps.</li>"
             "<li><strong>Si la propuesta exige el ancho de banda o la certificación por escrito:</strong> Xtech y Steren publican 48 Gbps en sus cables 8K.</li>"
             "<li><strong>Si el cliente quiere una sola unidad hoy, en un centro comercial:</strong> Steren tiene tiendas propias. Deltatech se mueve por distribuidores y tiendas de tecnología.</li></ul>"
             f"<p>Para tu tienda o tus instalaciones, Deltatech cubre del HDMI 1.4 a la fibra de 100 m en un mismo pedido. Mira la línea completa en {a(CAT_HDMI, 'cables HDMI')}.</p>"
         )},
    ],
    "products": [10460, 9861, 9823, 9837, 7036],
    "cta_mid": {"title": "¿No sabes qué cable ofrecerle a tu cliente?",
                "text": "Dinos qué conecta y a qué distancia, y te recomendamos el cable que cumple.",
                "wa_text": "Hola, vengo del artículo de cable HDMI Deltatech vs Xtech vs Steren y quiero una recomendación"},
    "cta_end": {"title": "Cables HDMI Deltatech por mayor",
                "text": "Crea tu cuenta comercial y mira los precios por volumen de toda la línea HDMI, incluida la fibra óptica.",
                "wa_text": "Hola, vengo del artículo de cable HDMI Deltatech vs Xtech vs Steren y quiero cotizar cables"},
    "faq": [
        {"q": "¿Cuál es mejor, Deltatech, Xtech o Steren?",
         "a": "Depende del uso. Deltatech declara más en fibra de larga distancia; Xtech y Steren documentan 18 y 48 Gbps en sus cables de cobre de pocos metros."},
        {"q": "¿El cable HDMI 2.0 Deltatech da 4K a 60 Hz?",
         "a": "Su ficha técnica declara 4K a 30 Hz. Para 4K a 60 Hz, usa el HDMI 2.1 8K o la fibra óptica de la marca."},
        {"q": "¿Qué cable HDMI sirve para 100 metros?",
         "a": "Un HDMI de fibra óptica como el de Deltatech, que declara 4K a 60 Hz de 50 a 100 m. Otra vía es un extensor HDMI por cable de red."},
        {"q": "¿Los cables HDMI de estas marcas están certificados?",
         "a": "Las fichas que consultamos no mencionan la etiqueta oficial de certificación HDMI. Si la necesitas, busca la etiqueta con código QR en el empaque."},
    ],
    "fuentes": [F_FICHA20, F_FICHAFO, P_HDMI21, F_HDMI_CABLES,
                "https://www.xtechamericas.com/es/catalogo/cables-y-adaptadores/hdmi-es/",
                "https://cdn.panacompu.com/doc/pd/xtech-xtc630-datasheet.pdf",
                "https://cdn.panacompu.com/doc/pd/xtc-637-data-sheet-spa.pdf",
                "https://cdn.panacompu.com/doc/pd/xtc-640-data-sheet-spa.pdf",
                "https://www.steren.com.ec/cables/cables-hdmi-y-de-video",
                "https://www.steren.com.ec/cable-hdmi-2-0-de-alta-velocidad-de-2-m.html",
                "https://www.steren.com.ec/cable-hdmi-tm-2-1-de-ultra-alta-velocidad-de-2-m.html",
                "https://www.steren.com.ec/cable-hdmi-4k-de-fibra-optica-30-m.html"],
})

def fusionar(n, h2_a, h2_b, nuevo_h2):
    """Une la sección h2_b dentro de h2_a (h2_b pasa a ser un h3) para quedar en 5-7 H2."""
    s = next(x for x in SPECS_A if x["n"] == n)
    ia = next(i for i, x in enumerate(s["sections"]) if x["h2"].startswith(h2_a))
    ib = next(i for i, x in enumerate(s["sections"]) if x["h2"].startswith(h2_b))
    b = s["sections"].pop(ib)
    sa = s["sections"][ia if ia < ib else ia - 1]
    sa["html"] += f"<h3>{b['h2']}</h3>" + b["html"]
    sa["h2"] = nuevo_h2


fusionar(7, "Qué cambia para tu tienda", "Qué responder cuando",
         "Qué cambia para tu tienda y qué responder al cliente")
fusionar(15, "Prueba en seis pasos", "Síntomas de un cable",
         "Prueba en seis pasos antes de entregar la instalación")
fusionar(17, "Red y USB", "Celulares y periféricos",
         "Red, USB y celulares: cuando la distancia o el puerto no ayudan")
fusionar(17, "Cómo armar el pedido", "El kit básico",
         "Cómo armar el pedido de una instalación")
fusionar(20, "Cables 4K", "Cables 8K",
         "Cables de cobre: la ficha 4K de Deltatech dice 30 Hz")

for s in SPECS_A:
    assert 5 <= len(s["sections"]) <= 7, (s["n"], len(s["sections"]))
    path = os.path.join(SPECS, f"{s['n']:02d}-{s['slug']}.json")
    json.dump(s, open(path, "w"), ensure_ascii=False, indent=2)
    print("escrito", os.path.relpath(path, AQUI))
