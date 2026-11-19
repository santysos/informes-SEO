#!/usr/bin/env python3
"""Lote B del mes 2 (Multitecnología VYV): n = 2, 9, 12, 14, 19.

Escribe specs/NN-slug.json. Validar con: python3 publish_batch.py --validate
Fuentes verificadas el 2026-11-19 (ver campo «fuentes» de cada spec).
"""
import json, os

AQUI = os.path.dirname(os.path.abspath(__file__))
B = "https://multitecnologiavyv.com"


def a(url, texto):
    return f'<a href="{url}">{texto}</a>'


# Enlaces internos (todos están en productos.json o enlaces.json)
CAT_IP = B + "/categoria-producto/vigilancia-y-seguridad/div-camaras-ip/"
CAT_ANALOG = B + "/categoria-producto/vigilancia-y-seguridad/div-camaras-analogas/"
CAT_ESPIA = B + "/categoria-producto/vigilancia-y-seguridad/camara-espia/"
CAT_VIG = B + "/categoria-producto/vigilancia-y-seguridad/"
CAT_UTP = B + "/categoria-producto/networking-redes/cable-utp/"
CAT_HERR = B + "/categoria-producto/networking-redes/herramientas-cableado-estructurado/"
CAT_ENERGIA = B + "/categoria-producto/componentes-de-pc/proteccion-de-energia/"
POST_POE = B + "/redes-y-seguridad/switch-poe-camaras-ip/"
POST_ACCESO = B + "/redes-y-seguridad/control-de-acceso-oficinas/"
POST_ENVIOS = B + "/compras-al-por-mayor/tecnologia-por-mayor-envios-ecuador/"
POST_CUENTA = B + "/compras-al-por-mayor/cuenta-comercial-precios-distribuidor/"
P_AK_BALA = B + "/producto/camara-ip-ak-tipo-bala-2mp-2-8mm-color-ir-30m-fhd-mic-poe-ip67-tc-c321n-1cnb-tiandy/"
P_NVR_AK4 = B + "/producto/nvr-ak-4-canales-ip-poe-vga-hdmi-rj45-2xusb-onvif-rtsp-r3104-tiandy/"
P_NVR_AK8 = B + "/producto/nvr-ak-8-canales-ip-poe-vga-hdmi-rj45-2xusb-onvif-rtsp-r3108-tiandy/"
P_SW4 = B + "/producto/switch-poe-4-puertos-10-100-deltatech/"
P_BALUN = B + "/producto/balun-video-utp-hd-8mp-500-watt-12-36-v/"
P_TESTER = B + "/producto/comprobador-de-cable-de-red-nf-468s-poe-qc/"
P_OJO = B + "/producto/camara-ip-ojo-de-pez-5mp-1-4-mm-ir-30m-tc-c35vn-tiandy/"
P_IA_DOMO = B + "/producto/camara-ip-sk-tipo-domo-4mp-2-8mm-ir-30m-mic-poe-tc-c34hs-tiandy/"
P_LPR = B + "/producto/camara-ip-lpr-4mp-tipo-bala-motorizada-2-8-12-mm-tc-c34lq-2-8-tiandy/"
P_DOBLE = B + "/producto/camara-doble-ip-sk-2x4mp-ir-50m-2-8mm-tc-c38rn-tiandy/"
P_SK_BALA4 = B + "/producto/camara-ip-sk-color-maker-tipo-bala-4mp-2-8mm-ir-50m-mic-poe-tc-c34qn-tiandy/"
P_NVR_IA20 = B + "/producto/nvr-ia-ip-20ch-vga-hdmi-usb-rj45-r3120-2mc-tiandy/"
P_AK_DOMO = B + "/producto/camara-ip-ak-color-maker-tipo-domo-2mp-2-8mm-ir-30m-fhd-mic-poe-tc-c320n-1anb-tiandy/"
P_AK4MP = B + "/producto/camara-ip-ak-color-maker-tipo-bala-4mp-2-8mm-ir-30m-fhd-mic-poe-ip67-tc-c341n-1ana-tiandy/"
P_ESPIA_CARG = B + "/producto/camara-espia-cargador-de-pared/"
P_ESPIA_PECHO = B + "/producto/camara-espia-de-pecho/"

F_TIANDY_AK = "https://en.tiandy.com/ak-network-camera/"
F_TIANDY_C321 = "https://en.tiandy.com/ak-network-camera/68343169.html"
F_TIANDY_C321_4 = "https://en.tiandy.com/ak-network-camera/68343178.html"
F_TIANDY_R3104 = "https://en.tiandy.com/ak-nvr/63693200.html"
F_TIANDY_EMPRESA = "https://en.tiandy.com/tiandy-technologies-co-ltd.html"
F_TIANDY_EC_VENTAJAS = "https://www.tiandyecuador.com/ventajas-videovigilancia-cctv"
F_TIANDY_EC_TEC = "https://www.tiandyecuador.com/tecnologia-camara-videovigilancia"
F_HIK_COLORVU = "https://www.hikvision.com/en/core-technologies/see-clearer-technology/colorvu/"
F_HIK_ACUSENSE = "https://www.hikvision.com/us-en/core-technologies/ai-analytics/acusense/"
F_DAHUA_WIZ = "https://www.dahuasecurity.com/products/key-technologies/wizsense"
F_DAHUA_FULL = "https://www.dahuasecurity.com/products/network-products/network-cameras/WizSense-Series/Full-color"
F_VIGI = "https://www.tp-link.com/pe/business-networking/all-vigi-surveillance/"
F_COIP = "https://www.defensa.gob.ec/wp-content/uploads/downloads/2016/03/feb16CODIGO-ORGANICO-INTEGRAL-PENAL-COIP.pdf"
F_LOPDP = "https://consejodecomunicacion.gob.ec/wp-content/uploads/downloads/2021/07/lotaip/Ley%20Org%C3%A1nica%20de%20Protecci%C3%B3n%20de%20Datos%20Personales.pdf"

SPECS = []

# ─────────────────────────────────────────────────────────────────────────────
# n = 2 · Cámaras IP vs análogas (ángulo: el instalador)
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 2,
    "slug": "camaras-ip-vs-analogas",
    "title": "Cámaras IP vs análogas: por qué conviene pasar a IP",
    "focus_kw": "cámaras IP vs análogas",
    "meta_desc": "Cámaras IP vs análogas para el instalador: cableado, resolución, NVR contra DVR y cómo migrar un sistema viejo a IP sin rehacer toda la obra.",
    "excerpt": "Comparación técnica entre cámaras IP y análogas: cable, energía, resolución, grabador y un plan para migrar un sistema análogo a IP por etapas.",
    "category": "Redes y seguridad",
    "tags": ["cámaras IP", "cámaras análogas", "NVR", "DVR", "videovigilancia"],
    "featured": {"pexels_query": "cctv camera installation technician ladder",
                 "alt": "Técnico instalando una cámara de seguridad en lo alto de una pared"},
    "inline_image": {"pexels_query": "network cables patch panel",
                     "alt": "Cables de red UTP conectados en un panel",
                     "after_section": 2},
    "intro_html": (
        "<p>Muchos sistemas que te llaman a revisar todavía funcionan con cámaras análogas: coaxial, conectores BNC, "
        "una fuente de 12 V con pulpo y un DVR en el cuarto de atrás. Funcionan, pero cada ampliación cuesta más trabajo "
        "que la anterior, y el cliente ya pregunta por ver las cámaras en el celular con buena imagen.</p>"
        "<p>Esta comparación de <strong>cámaras IP vs análogas</strong> está pensada para el instalador: qué cambia en el "
        "cable, en la energía, en el grabador y en la resolución, y cómo pasar un sistema viejo a IP por etapas. "
        "Está escrita desde Quito, para técnicos que instalan aquí y en provincia.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: IP gana en cableado y en gestión",
         "html": (
             "<p>Para una instalación nueva, IP conviene casi siempre. Un solo cable UTP lleva video, audio y energía; "
             "la cámara procesa la imagen y la envía comprimida por la red; el grabador (NVR) la guarda tal como llega. "
             "En análogo necesitas coaxial para el video, un par aparte para la energía y otro para el audio si lo hay.</p>"
             "<p>La diferencia de precio entre una cámara análoga y una IP de entrada ya es pequeña. Tiandy, por ejemplo, "
             "tiene una línea IP de entrada pensada para reemplazar al análogo, con micrófono incorporado y alimentación PoE. "
             "Lo que sigue explica cuándo el cambio vale la pena y cuándo todavía no.</p>")},
        {"h2": "El cable cambia todo: coaxial y fuente contra UTP con PoE",
         "html": (
             "<p>En análogo, cada cámara tiene su tramo de coaxial hasta el DVR y su alimentación desde una fuente central "
             "o un adaptador junto a la cámara. Muchos instaladores ya usan UTP con <em>baluns</em> para no tender coaxial, "
             "pero siguen dependiendo de la fuente de 12 V y de un par para la energía.</p>"
             "<p>En IP, el cable es el mismo UTP de cualquier red de datos y la energía llega por <strong>PoE</strong> desde el "
             "switch o desde el NVR. Explicamos el cálculo de potencia y la elección de puertos en la guía de "
             + a(POST_POE, "switch PoE para cámaras IP") + ".</p>"
             "<ul><li><strong>Límite de distancia:</strong> 100 metros de UTP por tramo, el del estándar Ethernet. El coaxial "
             "análogo HD admite tramos más largos, y ese es uno de los pocos puntos donde gana.</li>"
             "<li><strong>Prueba del cable:</strong> en IP, un mal ponchado se ve como cámara que se desconecta o se reinicia. "
             "Prueba cada tramo con un " + a(P_TESTER, "comprobador de cable de red con PoE") + " antes de cerrar la canaleta.</li>"
             "<li><strong>Cobre puro:</strong> el cable CCA pierde más energía y falla con PoE en tramos largos.</li></ul>")},
        {"h2": "Resolución, audio y analítica: dónde se nota la diferencia",
         "html": (
             "<p>Las tecnologías análogas HD subieron mucho la resolución; hay baluns pasivos que ya se venden para 8 MP. "
             "La diferencia está en todo lo demás: la cámara IP comprime con H.265, manda audio por el mismo cable y puede "
             "hacer detección de movimiento o analítica dentro de ella.</p>"
             "<table><thead><tr><th>Punto</th><th>Análoga HD</th><th>IP</th></tr></thead><tbody>"
             "<tr><td>Cable de video</td><td>Coaxial o UTP con balun</td><td>UTP Cat5e o Cat6</td></tr>"
             "<tr><td>Energía</td><td>Fuente de 12 V aparte</td><td>PoE por el mismo cable</td></tr>"
             "<tr><td>Audio</td><td>Cable o balun adicional</td><td>Micrófono integrado en muchos modelos</td></tr>"
             "<tr><td>Grabador</td><td>DVR (o XVR híbrido)</td><td>NVR</td></tr>"
             "<tr><td>Distancia por tramo</td><td>Mayor por coaxial</td><td>100 m por tramo de UTP</td></tr>"
             "<tr><td>Ampliar el sistema</td><td>Limitado por las entradas BNC del DVR</td><td>Switch adicional y canales libres del NVR</td></tr>"
             "<tr><td>Analítica</td><td>Básica, depende del DVR</td><td>En la cámara o en el NVR, según el modelo</td></tr>"
             "</tbody></table>")},
        {"h2": "DVR, XVR y NVR: qué grabador va con cada sistema",
         "html": (
             "<p>El <strong>DVR</strong> recibe señal análoga por BNC y la digitaliza. El <strong>NVR</strong> recibe video "
             "ya digitalizado por la red: no tiene entradas BNC y se conecta a las cámaras por RJ45, directo en sus puertos "
             "PoE o a través de un switch. Los grabadores híbridos (muchas marcas los llaman XVR) aceptan cámaras análogas y "
             "algunas IP al mismo tiempo, y sirven de puente en una migración.</p>"
             "<p>Al elegir un NVR revisa tres datos de la ficha: número de canales, puertos PoE incluidos y capacidad de "
             "decodificación, que dice cuántas cámaras de cierta resolución puede mostrar a la vez. Un "
             + a(P_NVR_AK4, "NVR de 4 canales con 4 puertos PoE") + " resuelve una casa o un local sin switch aparte.</p>")},
        {"h2": "Cómo migrar un sistema análogo a IP sin rehacer toda la obra",
         "html": (
             "<p>El cliente no siempre puede cambiar todo de una vez. Este orden te deja avanzar por etapas:</p>"
             "<ol><li><strong>Haz inventario:</strong> cámaras, tramos, estado de la canaleta y canales libres del DVR.</li>"
             "<li><strong>Reutiliza la ruta, no el cable:</strong> el coaxial no transporta Ethernet sin convertidores; "
             "aprovecha canaletas y tubería para pasar UTP nuevo.</li>"
             "<li><strong>Empieza por las cámaras críticas:</strong> entrada, caja y bodega, donde más se nota la mejora.</li>"
             "<li><strong>Instala el NVR o un switch PoE</strong> junto al DVR y deja convivir los dos sistemas durante la transición.</li>"
             "<li><strong>Prueba y etiqueta</strong> cada cable en ambos extremos.</li>"
             "<li><strong>Configura el acceso por app</strong> en el NVR y retira el DVR cuando el último canal análogo pase a IP.</li></ol>"
             "<p>Si el cliente ya tiene UTP con baluns, mejor: ese cable suele servir para IP si es Cat5e o superior y pasa la prueba.</p>")},
        {"h2": "La red también se cuida: claves y equipos aparte",
         "html": (
             "<p>Una cámara análoga no tiene dirección en la red; una IP sí, y eso trae una tarea nueva para el instalador. "
             "Cambia la clave de fábrica de cada cámara y del NVR el mismo día de la instalación, y entrega al cliente un "
             "documento con usuarios, direcciones IP y el canal de cada cámara.</p>"
             "<p>En negocios con red de oficina, conviene que las cámaras vayan en su propio switch o en una red separada: el "
             "video no compite con las computadoras y un equipo del personal no puede llegar a las cámaras. Actualiza el "
             "firmware del NVR cuando el fabricante publique una versión nueva.</p>")},
        {"h2": "Cuándo NO te conviene pasar a IP todavía",
         "html": (
             "<ul><li><strong>El sistema análogo es reciente y cumple:</strong> si el DVR tiene canales libres y el cliente "
             "solo necesita una cámara más, añadir una análoga es más barato que migrar.</li>"
             "<li><strong>Tramos largos sin punto intermedio:</strong> si una cámara está a más de 100 m y no hay dónde poner "
             "un switch con energía, el coaxial sigue siendo la solución práctica.</li>"
             "<li><strong>No hay presupuesto para recablear:</strong> si la obra está terminada y no hay ruta para el UTP, "
             "un XVR híbrido te permite mejorar la grabación y dejar la migración para después.</li></ul>"
             "<p>En esos casos tienes fuentes, baluns y conectores en " + a(CAT_ANALOG, "cámaras análogas y accesorios") + ".</p>")},
        {"h2": "Arma la cotización IP completa con un distribuidor",
         "html": (
             "<p>Una cotización IP bien hecha lleva cámaras, NVR, switch PoE si hace falta, " + a(CAT_UTP, "cable UTP") + ", "
             "conectores y un UPS para que el sistema siga grabando en un corte de luz. En " + a(CAT_IP, "cámaras IP") + " "
             "tienes cámaras y NVR Tiandy en stock en Quito, con envío a Cuenca, Manta, Ambato y el resto del país. Con la "
             "cuenta comercial ves los precios de distribuidor para armar tu margen.</p>")},
    ],
    "products": [9486, 9510, 7977, 7953, 9474],
    "cta_mid": {"title": "¿Vas a migrar un sistema análogo?",
                "text": "Cotiza cámaras IP, NVR, switch PoE y cableado en una sola compra con precio de distribuidor.",
                "wa_text": "Hola, vengo del artículo de cámaras IP vs análogas y quiero cotizar una migración a IP"},
    "cta_end": {"title": "Pasa tus proyectos a IP con stock en Quito",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en cámaras Tiandy, NVR y accesorios de cableado.",
                "wa_text": "Hola, vengo del artículo de cámaras IP vs análogas, ¿me ayudan con una cotización?"},
    "faq": [
        {"q": "¿Puedo usar el cable coaxial de mis cámaras análogas para cámaras IP?",
         "a": "No directamente. El coaxial no transporta Ethernet sin convertidores especiales, así que lo normal es pasar UTP nuevo aprovechando la misma canaleta o tubería."},
        {"q": "¿Un DVR graba cámaras IP?",
         "a": "Un DVR análogo puro no. Los grabadores híbridos (XVR) aceptan cámaras análogas y algunas IP a la vez; para un sistema solo IP necesitas un NVR."},
        {"q": "¿Las cámaras IP necesitan internet para grabar?",
         "a": "No. La cámara y el NVR se comunican por la red local y graban sin internet. El internet solo hace falta para ver las cámaras desde el celular fuera del lugar."},
        {"q": "¿Qué cable uso para cámaras IP?",
         "a": "UTP Cat5e o Cat6 de cobre puro, con tramos de hasta 100 metros. Prueba cada cable antes de cerrar la canaleta para evitar desconexiones."},
    ],
    "fuentes": [F_TIANDY_C321, F_TIANDY_R3104, F_TIANDY_AK],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 9 · Mejores cámaras de seguridad en Ecuador (comparativa de marcas)
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 9,
    "slug": "mejores-camaras-de-seguridad-ecuador",
    "title": "Mejores cámaras de seguridad en Ecuador: 4 marcas",
    "focus_kw": "mejores cámaras de seguridad en Ecuador",
    "meta_desc": "Mejores cámaras de seguridad en Ecuador: Hikvision, Dahua, Tiandy y VIGI comparadas con datos oficiales de color nocturno, analítica y soporte.",
    "excerpt": "Hikvision, Dahua, Tiandy y VIGI comparadas con lo que cada fabricante publica: color de noche, analítica, gamas y qué tener en cuenta en Ecuador.",
    "category": "Marcas y comparativas",
    "tags": ["cámaras de seguridad", "Tiandy", "Hikvision", "Dahua", "comparativa"],
    "featured": {"pexels_query": "security cameras on building wall",
                 "alt": "Varias cámaras de seguridad instaladas en la fachada de un edificio"},
    "inline_image": {"pexels_query": "cctv monitor control room",
                     "alt": "Pantalla con varias vistas de cámaras de vigilancia",
                     "after_section": 3},
    "intro_html": (
        "<p>Cuando un cliente pregunta cuáles son las <strong>mejores cámaras de seguridad en Ecuador</strong>, casi siempre "
        "salen cuatro nombres: Hikvision, Dahua, Tiandy y la que muchos escriben «Viggi», que en realidad es VIGI, la línea de "
        "videovigilancia de TP-Link. Las cuatro tienen cámaras IP con visión nocturna a color, analítica y app para el celular.</p>"
        "<p>Para esta comparación usamos solo lo que cada fabricante publica en su sitio oficial, con los enlaces al final. "
        "Te lo decimos de frente: en Multitecnología VYV distribuimos Tiandy en Quito y no vendemos las otras tres, así que las "
        "tarjetas de producto son de Tiandy. Por eso mismo incluimos los casos en que otra marca te encaja mejor.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: las cuatro sirven; decide el soporte y la gama",
         "html": (
             "<p>Las cuatro marcas ofrecen lo que hoy espera un cliente: imagen a color de noche, detección de personas y "
             "vehículos y acceso desde el celular. La diferencia práctica para un instalador en Ecuador está en tres puntos: "
             "si el modelo que necesitas está en stock aquí, si tienes a quién llamar cuando falla y si la gama de entrada "
             "cabe en el presupuesto de tu cliente.</p>"
             "<p>Ninguna marca gana en todo. Mira la tabla de la mitad del artículo y elige por el proyecto, no por la marca.</p>")},
        {"h2": "Hikvision y Dahua: color de noche e IA con nombre propio",
         "html": (
             "<p><strong>Hikvision</strong> llama <em>ColorVu</em> a su tecnología de imagen a color con poca luz. Según su sitio, "
             "combina lentes de gran apertura, hasta F1.0, con sensores de alta sensibilidad; el fabricante indica que F1.0 deja "
             "entrar cuatro veces más luz que un lente F2.0. Para analítica usa <em>AcuSense</em>, que clasifica lo que ve como "
             "persona, vehículo u otro y dispara la alarma solo con los dos primeros, para reducir falsas alarmas por lluvia, "
             "animales u hojas.</p>"
             "<p><strong>Dahua</strong> agrupa su analítica bajo <em>WizSense</em>, una serie de productos con IA que reconoce "
             "personas y vehículos. Su detección inteligente de movimiento (SMD) filtra objetos irrelevantes para evitar falsas "
             "alarmas. En su línea <em>Full-color</em> describe cámaras que dan color con muy poca luz y modelos con luz cálida "
             "que se enciende al detectar un objetivo.</p>")},
        {"h2": "Tiandy: tres gamas y una línea de entrada pensada contra el análogo",
         "html": (
             "<p><strong>Tiandy</strong> es una empresa china fundada en 1994 que, según su sitio corporativo, atiende clientes "
             "en más de 80 países. Ordena sus cámaras IP en tres gamas: <strong>AK</strong> (entrada), <strong>SK</strong> "
             "(pequeña y mediana empresa) y <strong>LK</strong> (profesional), con NVR para cada una.</p>"
             "<p>La gama AK es la que más interesa al instalador que todavía cotiza análogo: Tiandy Ecuador la presenta como "
             "«Analog Killer», cámaras IP con micrófono y PoE al precio de un sistema análogo. Su ficha oficial del modelo "
             "TC-C321N indica 2 MP, compresión H.265, infrarrojo de 30 m, protección IP67 y compatibilidad ONVIF. En la gama SK "
             "están modelos con analítica de perímetro y cruce de línea, como la "
             + a(P_IA_DOMO, "domo 4 MP con IA de perímetro") + ". Todo el catálogo está en "
             + a(CAT_IP, "cámaras IP") + ".</p>")},
        {"h2": "VIGI de TP-Link: la opción de quien ya trabaja con su red",
         "html": (
             "<p><strong>VIGI</strong> es la línea de videovigilancia de TP-Link. En su sitio para Latinoamérica muestra "
             "cámaras IP con color las 24 horas, clasificación de personas y vehículos, NVR con PoE+ y la app VIGI para "
             "Android e iOS con notificaciones.</p>"
             "<p>Su atractivo está en el ecosistema: si tu cliente ya tiene switches y routers TP-Link, comprar las cámaras "
             "de la misma marca le simplifica la compra. En gama de cámaras especializadas (PTZ de largo alcance, lectura de "
             "placas, ojo de pez) los fabricantes dedicados solo a seguridad suelen tener un catálogo más amplio.</p>")},
        {"h2": "Las cuatro marcas lado a lado",
         "html": (
             "<table><thead><tr><th>Criterio</th><th>Hikvision</th><th>Dahua</th><th>Tiandy</th><th>VIGI (TP-Link)</th></tr></thead><tbody>"
             "<tr><td>Color de noche</td><td>ColorVu</td><td>Full-color</td><td>Color Maker y Starlight</td><td>Color 24 horas en varios modelos</td></tr>"
             "<tr><td>Analítica</td><td>AcuSense</td><td>WizSense y SMD</td><td>Perímetro y cruce de línea en gama SK</td><td>Clasificación de personas y vehículos</td></tr>"
             "<tr><td>Gamas</td><td>Varias series</td><td>Varias series</td><td>AK, SK y LK</td><td>Línea dentro de TP-Link</td></tr>"
             "<tr><td>Estándar abierto</td><td>Según modelo</td><td>Según modelo</td><td>ONVIF Profile S/T en AK</td><td>Según modelo</td></tr>"
             "<tr><td>En el catálogo de VYV</td><td>No</td><td>No</td><td>Sí, con stock en Quito</td><td>No</td></tr>"
             "</tbody></table>"
             "<p>Los nombres de tecnología son los que usa cada fabricante. Revisa siempre la ficha del modelo exacto: dos "
             "cámaras de la misma marca pueden traer funciones muy distintas.</p>")},
        {"h2": "Cómo elegir la marca para un proyecto concreto",
         "html": (
             "<ol><li><strong>Define qué tiene que ver la cámara:</strong> identificar rostros en una puerta pide otra lente que "
             "vigilar un patio.</li>"
             "<li><strong>Revisa lo que ya está instalado:</strong> si el cliente tiene NVR de una marca, la analítica avanzada "
             "suele funcionar completa solo con cámaras de esa misma marca.</li>"
             "<li><strong>Confirma stock y garantía en el país:</strong> pregunta quién cambia el equipo si falla en Guayaquil, "
             "Loja o Puyo, y en cuánto tiempo.</li>"
             "<li><strong>Compara la ficha, no el folleto:</strong> resolución, alcance infrarrojo, IP67 y consumo PoE.</li>"
             "<li><strong>Calcula el sistema completo:</strong> cámaras, NVR, disco, switch, cable y UPS.</li></ol>")},
        {"h2": "Soporte y garantía en Ecuador: la pregunta que más pesa",
         "html": (
             "<p>Las fichas técnicas de las cuatro marcas se parecen más de lo que el cliente cree. Lo que cambia la experiencia "
             "es lo que pasa después de instalar: quién responde cuando una cámara deja de grabar, cuánto tarda el cambio en "
             "garantía y si el repuesto está en el país.</p>"
             "<p>Tiandy Ecuador indica en su sitio que trabaja con una red de distribuidores y soporte técnico local, y que sus "
             "equipos traen carcasas IP67 y protección contra sobretensiones de fábrica. En nuestro caso, el stock y la "
             "atención técnica están en Quito y los envíos salen a Guayaquil, Cuenca o Manta. Antes de cerrar con cualquier "
             "marca, pide por escrito el plazo de garantía y dónde se tramita.</p>")},
        {"h2": "Cuándo NO te conviene Tiandy",
         "html": (
             "<ul><li><strong>El cliente ya tiene un sistema grande de otra marca</strong> con su software de gestión: ampliar "
             "con la misma marca evita perder funciones de analítica entre cámara y grabador.</li>"
             "<li><strong>La empresa estandarizó su red con TP-Link</strong> y su área de sistemas quiere un solo proveedor: "
             "VIGI encaja mejor en esa lógica.</li>"
             "<li><strong>El pliego exige una marca específica.</strong> En ese caso cumple el pliego.</li></ul>"
             "<p>Para lo demás, cotizar con un distribuidor que tiene stock en Quito y despacha a provincia te ahorra semanas. "
             "Así funciona el envío: " + a(POST_ENVIOS, "tecnología al por mayor con envíos a todo Ecuador") + ".</p>")},
    ],
    "products": [9495, 9501, 9487, 12822, 7976],
    "cta_mid": {"title": "¿Comparando marcas para un proyecto?",
                "text": "Te ayudamos a armar el sistema Tiandy equivalente con fichas técnicas y precio de distribuidor.",
                "wa_text": "Hola, vengo del artículo de las mejores cámaras de seguridad en Ecuador y quiero comparar opciones Tiandy"},
    "cta_end": {"title": "Cotiza cámaras Tiandy con stock en Quito",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en cámaras AK, SK y NVR Tiandy.",
                "wa_text": "Hola, vengo del artículo de las mejores cámaras de seguridad en Ecuador, ¿me ayudan con una cotización?"},
    "faq": [
        {"q": "¿Cuál es la mejor marca de cámaras de seguridad en Ecuador?",
         "a": "No hay una sola. Hikvision, Dahua, Tiandy y VIGI tienen cámaras IP con color de noche y analítica; decide por el stock local, la garantía en el país y la gama que entra en el presupuesto."},
        {"q": "¿Viggi y VIGI son la misma marca?",
         "a": "En el mercado se escribe de las dos formas, pero la línea de cámaras es VIGI, de TP-Link. Busca ese nombre en su sitio oficial para ver los modelos."},
        {"q": "¿Puedo mezclar cámaras de distintas marcas en un NVR?",
         "a": "Sí, si las dos son compatibles con ONVIF. Lo normal es que la imagen funcione y que algunas funciones de analítica se pierdan entre marcas distintas."},
        {"q": "¿Qué es la serie AK de Tiandy?",
         "a": "Es la gama de entrada de cámaras IP de Tiandy. Tiandy Ecuador la llama Analog Killer porque busca reemplazar al sistema análogo con un costo similar."},
    ],
    "fuentes": [F_HIK_COLORVU, F_HIK_ACUSENSE, F_DAHUA_WIZ, F_DAHUA_FULL, F_TIANDY_EMPRESA, F_TIANDY_AK,
                F_TIANDY_C321, F_TIANDY_EC_VENTAJAS, F_TIANDY_EC_TEC, F_VIGI],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 12 · Por qué tu negocio necesita cámaras IP (ángulo: el dueño)
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 12,
    "slug": "sistema-camaras-ip-negocio",
    "title": "Sistema de cámaras IP para tu negocio: qué ganas",
    "focus_kw": "sistema de cámaras IP para negocio",
    "meta_desc": "Sistema de cámaras IP para tu negocio: ver el local desde el celular, evidencia útil y alertas. Casos de tienda, oficina y bodega.",
    "excerpt": "Qué gana un dueño de negocio con un sistema de cámaras IP: ver el local desde el celular, evidencia que sirve, alertas y cómo empezar por partes.",
    "category": "Redes y seguridad",
    "tags": ["cámaras IP", "seguridad para negocios", "videovigilancia", "NVR", "analítica de video"],
    "featured": {"pexels_query": "small shop owner phone counter",
                 "alt": "Dueña de una tienda revisando su celular detrás del mostrador"},
    "inline_image": {"pexels_query": "warehouse shelves boxes",
                     "alt": "Pasillo de una bodega con estanterías y cajas",
                     "after_section": 3},
    "intro_html": (
        "<p>Si tienes una tienda, una oficina o una bodega, ya sabes lo que pasa cuando no estás: alguien pregunta por "
        "WhatsApp si llegó la mercadería, un cliente reclama un cobro y nadie recuerda qué pasó, o te enteras de un faltante "
        "una semana después.</p>"
        "<p>Un <strong>sistema de cámaras IP para tu negocio</strong> resuelve esas situaciones: ves el local en vivo, revisas lo que pasó y "
        "recibes avisos. Aquí te contamos qué ganas en la práctica, qué cámara va en cada lugar y cómo empezar sin gastar de más, "
        "con ejemplos de negocios en Quito y en otras ciudades del país.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: ver el local, tener pruebas y recibir avisos",
         "html": (
             "<p>Un sistema IP graba en un equipo dentro de tu local (el NVR) y te deja ver las cámaras en vivo o la grabación "
             "desde una app en el celular. Ganas tres cosas concretas:</p>"
             "<ul><li><strong>Control a distancia:</strong> revisas la apertura, la caja o la bodega desde la casa o desde otra sucursal.</li>"
             "<li><strong>Evidencia:</strong> video con detalle suficiente para aclarar un reclamo o entregar a la Policía.</li>"
             "<li><strong>Alertas:</strong> el sistema te avisa si alguien cruza una zona fuera de horario.</li></ul>")},
        {"h2": "Verlo todo desde el celular, con o sin internet en el local",
         "html": (
             "<p>Las cámaras graban en el NVR aunque se caiga el internet; la conexión solo hace falta para ver desde fuera. "
             "Los NVR de Tiandy, por ejemplo, traen acceso desde Android e iOS por P2P, sin configurar el router a mano.</p>"
             "<p>Dos detalles que conviene pedir al instalador: que el NVR y el router estén conectados a un UPS, para que "
             "un corte de luz no te deje sin grabación, y que la clave de la app no sea la que viene de fábrica. Tienes "
             "equipos de respaldo en " + a(CAT_ENERGIA, "protección de energía") + ".</p>")},
        {"h2": "Evidencia que sirve: resolución, lente y altura",
         "html": (
             "<p>Una cámara puede «ver» a una persona a 40 metros y, aun así, no servir para reconocerla. Los fabricantes lo "
             "explican con distancias de detección, observación, reconocimiento e identificación. En la ficha oficial de una "
             "cámara Tiandy de 2 MP con lente de 2,8 mm, la identificación llega a unos 4 metros y la detección a más de 40.</p>"
             "<p>Por eso la cámara de la puerta y la de la caja deben estar cerca y a la altura de la cara, y la del patio puede "
             "ser más abierta. Para cubrir un salón entero con un solo equipo existe la "
             + a(P_OJO, "cámara ojo de pez de 5 MP") + ", que muestra todo el ambiente desde el techo.</p>")},
        {"h2": "Qué cámara va en cada tipo de negocio",
         "html": (
             "<table><thead><tr><th>Negocio</th><th>Dónde poner cámaras</th><th>Qué conviene</th></tr></thead><tbody>"
             "<tr><td>Tienda o local de barrio</td><td>Entrada, caja y salón</td><td>Domo con micrófono en caja; ojo de pez para el salón</td></tr>"
             "<tr><td>Oficina</td><td>Recepción, pasillos y puerta de servidores</td><td>Domos discretos; se combinan con control de acceso</td></tr>"
             "<tr><td>Bodega</td><td>Puerta de carga, pasillos y perímetro</td><td>Cámaras con analítica de perímetro y alcance infrarrojo largo</td></tr>"
             "<tr><td>Parqueadero</td><td>Ingreso y salida de vehículos</td><td>Cámara de lectura de placas</td></tr>"
             "</tbody></table>"
             "<p>En oficinas, las cámaras rinden más junto a un registro de quién entra; lo explicamos en "
             + a(POST_ACCESO, "control de acceso para oficinas") + ".</p>")},
        {"h2": "Alertas que distinguen a una persona de una sombra",
         "html": (
             "<p>La detección de movimiento clásica avisa por cualquier cambio en la imagen: una sombra, un perro o un foco que "
             "parpadea. Después de diez alertas falsas, el dueño apaga las notificaciones. La analítica de perímetro y cruce de "
             "línea, en cambio, avisa solo cuando algo atraviesa la zona que marcaste. En Tiandy la traen modelos como la "
             + a(P_IA_DOMO, "domo de 4 MP con IA de perímetro y cruce de línea") + ".</p>"
             "<p>Úsala en la bodega de noche o en la puerta trasera fuera del horario de atención.</p>")},
        {"h2": "Cuántos días de video guardas: el disco manda",
         "html": (
             "<p>El NVR graba en un disco duro, y cuando se llena borra lo más antiguo. Los días que guardas dependen de la "
             "resolución, del número de cámaras y de si grabas todo el tiempo o solo cuando hay movimiento. La compresión H.265 "
             "ocupa menos espacio que la H.264 con la misma imagen.</p>"
             "<p>Define con el instalador cuántos días necesitas tener: si un faltante se detecta en el inventario de fin de "
             "mes, una semana de grabación no te sirve. Pide que te muestren en la app cuál es el video más antiguo guardado.</p>")},
        {"h2": "Quién mira las cámaras y quién tiene la clave",
         "html": (
             "<p>Un sistema de cámaras es tan bueno como la persona que lo usa. Decide quién tiene acceso desde el celular: "
             "el dueño, el administrador o la persona de confianza de cada sucursal. Los NVR permiten crear usuarios con "
             "permisos distintos, por ejemplo, ver en vivo sin poder borrar ni descargar grabaciones.</p>"
             "<p>Cuando alguien deja la empresa, cambia la clave. Y si tienes locales en Quito y en Santo Domingo, cada NVR "
             "puede aparecer en la misma app para revisarlos desde un solo lugar.</p>")},
        {"h2": "Cómo empezar sin gastar de más",
         "html": (
             "<ol><li><strong>Haz la lista de riesgos:</strong> dónde se pierde plata o mercadería y a qué hora.</li>"
             "<li><strong>Empieza con cuatro cámaras</strong> en los puntos de esa lista y un NVR con PoE integrado.</li>"
             "<li><strong>Deja canales libres:</strong> un NVR de 8 canales con 4 cámaras te permite crecer sin cambiar el equipo.</li>"
             "<li><strong>Protege la energía:</strong> UPS para el NVR y el router.</li>"
             "<li><strong>Pon un aviso visible</strong> de que el local tiene videovigilancia: disuade y te ordena frente a la ley de datos.</li>"
             "<li><strong>Revisa la grabación una vez por semana</strong> para confirmar que todo graba.</li></ol>")},
        {"h2": "Cuándo NO te hace falta un sistema IP completo",
         "html": (
             "<ul><li><strong>Un local muy pequeño que solo quieres ver de vez en cuando:</strong> una cámara Wi-Fi con memoria "
             "puede bastar para empezar.</li>"
             "<li><strong>Ya tienes un sistema análogo que graba bien</strong> y no necesitas ver detalle desde el celular: "
             "cámbialo cuando lo amplíes.</li>"
             "<li><strong>No hay quién mire las grabaciones ni atienda las alertas:</strong> primero define quién lo hará.</li>"
             "<li><strong>Arriendas por pocos meses</strong> y no puedes pasar cable: una cámara Wi-Fi que te llevas al mudarte resuelve mientras tanto.</li></ul>"
             "<p>Si tu negocio está en Guayaquil, Ambato o Ibarra, tu instalador puede pedir los equipos a Quito y recibirlos "
             "por envío. El catálogo completo está en " + a(CAT_IP, "cámaras IP") + ".</p>")},
    ],
    "products": [9490, 9501, 12678, 9511, 10389],
    "cta_mid": {"title": "¿Quieres cámaras para tu negocio?",
                "text": "Cuéntanos qué tipo de local tienes y te sugerimos cámaras y NVR Tiandy, o te conectamos con un instalador.",
                "wa_text": "Hola, vengo del artículo de cámaras IP para negocios y quiero cotizar un sistema para mi local"},
    "cta_end": {"title": "Cámaras IP para tu local, con stock en Quito",
                "text": "Si eres instalador, crea tu cuenta comercial y ve precios de distribuidor en cámaras y NVR Tiandy.",
                "wa_text": "Hola, vengo del artículo de cámaras IP para negocios, ¿me ayudan con una cotización?"},
    "faq": [
        {"q": "¿Cuántas cámaras necesita un local pequeño?",
         "a": "Para una tienda de barrio suelen bastar cuatro: entrada, caja, salón y bodega o puerta trasera. Elige un NVR con canales libres para sumar más después."},
        {"q": "¿Puedo ver mis cámaras desde el celular si se va el internet del local?",
         "a": "No en vivo, pero el NVR sigue grabando. Cuando vuelve la conexión puedes revisar todo lo que pasó desde la app."},
        {"q": "¿Las cámaras IP sirven como prueba en una denuncia?",
         "a": "La grabación sirve como apoyo para identificar a una persona o un hecho. Para eso necesitas buena resolución en la zona clave y la fecha y hora del NVR bien configuradas."},
        {"q": "¿Tengo que poner un letrero de que hay cámaras?",
         "a": "Es lo recomendable. La Ley Orgánica de Protección de Datos Personales pide que el tratamiento de datos sea transparente, y un aviso visible además disuade."},
    ],
    "fuentes": [F_TIANDY_C321, F_TIANDY_R3104, F_LOPDP],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 14 · Tiandy AK (Analog Killer)
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 14,
    "slug": "tiandy-ak-analog-killer",
    "title": "Tiandy AK (Analog Killer): cámaras IP a precio de análoga",
    "focus_kw": "Tiandy AK",
    "meta_desc": "Tiandy AK, la gama de entrada IP: ficha oficial de la TC-C321N, el NVR AK de 4 canales con 28 W de PoE y cómo armar un kit de cuatro cámaras.",
    "excerpt": "Qué es la serie AK de Tiandy, qué trae su cámara de entrada según la ficha oficial, cómo calcular el PoE del NVR AK y cuándo conviene subir a SK.",
    "category": "Marcas y comparativas",
    "tags": ["Tiandy", "Tiandy AK", "cámaras IP", "NVR", "PoE"],
    "featured": {"pexels_query": "white bullet security camera wall",
                 "alt": "Cámara de seguridad tipo bala blanca montada en una pared"},
    "inline_image": {"pexels_query": "technician network rack installation",
                     "alt": "Técnico conectando equipos en un rack de red",
                     "after_section": 2},
    "intro_html": (
        "<p>Durante años, el argumento para seguir cotizando análogo fue el precio: la cámara IP costaba más y el cliente "
        "elegía lo barato. Tiandy armó una gama entera para quitar ese argumento y en Ecuador la presenta con un nombre "
        "directo: <strong>AK, Analog Killer</strong>.</p>"
        "<p>En esta guía revisamos la serie <strong>Tiandy AK</strong> con los datos de las fichas oficiales del fabricante: "
        "qué trae la cámara de entrada, cuánta energía pide, qué soporta el NVR de la misma línea y dónde se queda corta. "
        "Somos distribuidores de Tiandy en Quito, así que también te contamos cómo la armamos en kits para instaladores.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: AK es la gama IP de entrada de Tiandy",
         "html": (
             "<p>Tiandy divide sus cámaras IP en tres gamas: <strong>AK</strong> (entrada), <strong>SK</strong> (pequeña y "
             "mediana empresa) y <strong>LK</strong> (profesional). La AK es la más sencilla y la más económica, y viene con "
             "su propio NVR. Tiandy Ecuador la describe como tecnología 100 % IP, con mejor definición, gestión digital y "
             "micrófono integrado, al precio de un sistema análogo.</p>"
             "<p>Ese precio se ve con la cuenta comercial. Lo que sigue son los datos técnicos para que decidas si la AK "
             "alcanza para tu proyecto.</p>")},
        {"h2": "Qué trae una cámara AK: la ficha oficial de la TC-C321N",
         "html": (
             "<p>Tomamos la " + a(P_AK_BALA, "cámara AK tipo bala de 2 MP TC-C321N") + ", modelo de entrada de la línea. "
             "Estos son los datos de la ficha oficial de Tiandy para la versión de 2,8 mm:</p>"
             "<table><thead><tr><th>Característica</th><th>Dato oficial</th></tr></thead><tbody>"
             "<tr><td>Resolución</td><td>2 MP, 1920 × 1080 a 30 cuadros por segundo</td></tr>"
             "<tr><td>Sensor y lente</td><td>CMOS de 1/3 pulgada, lente fija de 2,8 mm F2.0</td></tr>"
             "<tr><td>Ángulo horizontal</td><td>93°</td></tr>"
             "<tr><td>Infrarrojo</td><td>Hasta 30 m</td></tr>"
             "<tr><td>Compresión</td><td>S+265, H.265 y H.264</td></tr>"
             "<tr><td>Audio</td><td>Micrófono incorporado</td></tr>"
             "<tr><td>Alimentación</td><td>PoE IEEE 802.3af, máximo 2 W</td></tr>"
             "<tr><td>Protección</td><td>IP67, sobretensión 4.000 V</td></tr>"
             "<tr><td>Temperatura</td><td>-30 °C a 60 °C</td></tr>"
             "<tr><td>Compatibilidad</td><td>ONVIF Profile S y T</td></tr>"
             "</tbody></table>"
             "<p>La ficha también da las distancias DORI: identificación a 4,1 m y detección a 41,48 m con lente de 2,8 mm. "
             "La versión de 4 mm cierra el ángulo a 73,5° y lleva la identificación a 5,93 m: sirve para pasillos y entradas.</p>")},
        {"h2": "El NVR AK de 4 canales: 28 W para cuatro cámaras",
         "html": (
             "<p>El " + a(P_NVR_AK4, "NVR AK R3104") + " trae cuatro puertos PoE de 10/100 Mbps. Según la ficha oficial, su "
             "presupuesto PoE es de 28 W, acepta resoluciones de hasta 6 MP y muestra cuatro canales a 1080p al mismo tiempo. "
             "Tiene una bahía SATA para el disco, salidas HDMI y VGA, dos USB y acceso desde Android e iOS por P2P.</p>"
             "<p>La cuenta es sencilla: cuatro cámaras TC-C321N a 2 W como máximo suman 8 W, lejos de los 28 W del grabador. "
             "Te queda margen de sobra para la noche, cuando se encienden los infrarrojos. Si el proyecto pasa de cuatro "
             "cámaras, está el " + a(P_NVR_AK8, "NVR AK de 8 canales") + ".</p>")},
        {"h2": "AK, SK o LK: dónde se queda corta la gama de entrada",
         "html": (
             "<p>La AK está pensada para casas, locales y oficinas pequeñas. Su ficha muestra lo justo: detección de movimiento, "
             "alarmas de excepción, cuatro máscaras de privacidad y puerto de red de 10/100. No trae la analítica de perímetro "
             "ni de cruce de línea que sí tienen modelos SK como la TC-C34HS.</p>"
             "<p>La gama AK tampoco se queda en 2 MP: el catálogo oficial de Tiandy incluye cámaras AK Color Maker de 4 MP en "
             "formato bala y domo, como la " + a(P_AK4MP, "TC-C341N de 4 MP") + ". Son la opción cuando el cliente pide más "
             "detalle sin salir de la línea de entrada; antes de cotizarlas, confirma que el NVR acepte esa resolución en "
             "todos sus canales.</p>"
             "<ul><li><strong>Quédate en AK</strong> si el cliente quiere ver y grabar bien, con audio, desde el celular.</li>"
             "<li><strong>Sube a SK</strong> si necesita alertas que distingan a una persona que cruza una zona, lentes motorizadas o más resolución.</li>"
             "<li><strong>Ve a LK</strong> en proyectos corporativos o con requisitos de pliego.</li></ul>")},
        {"h2": "Cómo armar un kit AK de cuatro cámaras",
         "html": (
             "<ol><li><strong>Elige el formato de cada cámara:</strong> bala para exteriores y domo para interiores.</li>"
             "<li><strong>Elige la lente:</strong> 2,8 mm para ambientes abiertos y 4 mm para entradas y pasillos.</li>"
             "<li><strong>Suma el NVR AK de 4 canales</strong> y un disco duro de videovigilancia de la capacidad que pida el cliente.</li>"
             "<li><strong>Calcula el cable:</strong> UTP de cobre puro, un tramo por cámara, máximo 100 m.</li>"
             "<li><strong>Prueba cada tramo</strong> con un comprobador antes de conectar.</li>"
             "<li><strong>Configura la app</strong> en el celular del cliente y cambia la clave de fábrica.</li></ol>"
             "<p>Si necesitas más puertos, revisa la guía de " + a(POST_POE, "switch PoE para cámaras IP") + ".</p>")},
        {"h2": "Ajustes que conviene hacer al instalarla",
         "html": (
             "<p>La ficha de la TC-C321N trae varias funciones que vienen activas o se configuran en minutos y marcan la "
             "diferencia en la entrega:</p>"
             "<ul><li><strong>Compresión H.265 o S+265:</strong> úsala en el flujo principal para ahorrar disco.</li>"
             "<li><strong>Flujo secundario:</strong> la cámara envía una segunda imagen de menor resolución que la app usa en el celular, más liviana para datos móviles.</li>"
             "<li><strong>Máscaras de privacidad:</strong> tapa con hasta cuatro zonas negras la ventana del vecino o un área que no debes grabar.</li>"
             "<li><strong>Detección de movimiento:</strong> márcala solo en la zona útil, para que las alertas no se disparen por la calle.</li></ul>"
             "<p>Para exteriores, la carcasa IP67 y el rango de -30 °C a 60 °C cubren la lluvia de la Sierra y el calor de la Costa.</p>")},
        {"h2": "Cuándo NO te conviene una cámara AK",
         "html": (
             "<ul><li><strong>Necesitas identificar placas o rostros a distancia:</strong> ahí va una cámara de lectura de placas o una lente motorizada.</li>"
             "<li><strong>El cliente quiere alertas inteligentes</strong> por intrusión en bodegas o patios: la AK no tiene analítica de perímetro.</li>"
             "<li><strong>El ambiente supera las condiciones de la ficha</strong>, como frío extremo o calor por encima de 60 °C.</li>"
             "<li><strong>La zona a vigilar está a más de 30 m</strong> de noche y sin luz: el infrarrojo de la AK no llega; busca modelos con 50 u 80 m.</li></ul>")},
        {"h2": "Para técnicos en Quito y provincia",
         "html": (
             "<p>Tenemos cámaras y NVR AK en stock en Quito y enviamos a Riobamba, Ibarra, Loja y el resto del país. Con la "
             + a(POST_CUENTA, "cuenta comercial") + " ves el precio de distribuidor de cada modelo y puedes comparar el costo "
             "de un kit AK contra el análogo que cotizabas.</p>")},
    ],
    "products": [9488, 9486, 9489, 12850, 9510, 9511],
    "cta_mid": {"title": "¿Cotizando un kit AK?",
                "text": "Te armamos el kit de cuatro u ocho cámaras AK con NVR y cable, con precio de distribuidor.",
                "wa_text": "Hola, vengo del artículo de Tiandy AK y quiero cotizar un kit de cámaras AK"},
    "cta_end": {"title": "Cámaras Tiandy AK con stock en Quito",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en cámaras y NVR de la serie AK.",
                "wa_text": "Hola, vengo del artículo de Tiandy AK, ¿me ayudan con una cotización?"},
    "faq": [
        {"q": "¿Qué significa AK en las cámaras Tiandy?",
         "a": "AK es la gama IP de entrada de Tiandy. En Ecuador se presenta como Analog Killer porque busca reemplazar a las cámaras análogas con un costo similar."},
        {"q": "¿Las cámaras Tiandy AK tienen audio?",
         "a": "Sí. La ficha oficial de la TC-C321N indica micrófono incorporado, y el audio viaja por el mismo cable de red que el video."},
        {"q": "¿Puedo conectar cámaras AK a un NVR de otra marca?",
         "a": "La ficha indica compatibilidad ONVIF Profile S y T, así que la imagen debería funcionar en un NVR compatible. Algunas funciones pueden quedar disponibles solo con un NVR Tiandy."},
        {"q": "¿Cuántas cámaras AK soporta el NVR de 4 canales?",
         "a": "Cuatro cámaras, conectadas directo a sus cuatro puertos PoE. El presupuesto de 28 W alcanza con margen para cuatro cámaras de 2 W."},
    ],
    "fuentes": [F_TIANDY_AK, F_TIANDY_C321, F_TIANDY_C321_4, F_TIANDY_R3104, F_TIANDY_EC_VENTAJAS],
})

# ─────────────────────────────────────────────────────────────────────────────
# n = 19 · Cámara espía: usos legítimos y ley en Ecuador
# ─────────────────────────────────────────────────────────────────────────────
SPECS.append({
    "n": 19,
    "slug": "camara-espia-usos-ley-ecuador",
    "title": "Cámara espía: usos legítimos y qué dice la ley en Ecuador",
    "focus_kw": "cámara espía",
    "meta_desc": "Cámara espía en Ecuador: qué permite el COIP y la ley de datos personales, usos legítimos en casa y en el negocio, y los límites que no debes cruzar.",
    "excerpt": "Usos legítimos de una cámara espía en casa y en el negocio, lo que dicen el COIP y la Ley de Protección de Datos Personales, y los límites que no debes cruzar.",
    "category": "Redes y seguridad",
    "tags": ["cámara espía", "cámara oculta", "videovigilancia", "privacidad", "ley Ecuador"],
    "featured": {"pexels_query": "small hidden camera home interior",
                 "alt": "Sala de una casa con un pequeño dispositivo electrónico junto a un enchufe"},
    "inline_image": {"pexels_query": "security guard uniform body camera",
                     "alt": "Guardia de seguridad con cámara corporal en el pecho",
                     "after_section": 4},
    "intro_html": (
        "<p>Las búsquedas de <strong>cámara espía</strong> crecen por razones muy distintas: el que quiere saber qué pasa en "
        "su casa cuando no está, el dueño de un local con faltantes, el guardia que necesita registrar su ronda. Algunas de "
        "esas razones son legítimas y otras pueden terminar en un juicio.</p>"
        "<p>En esta guía separamos los usos legítimos de los que no lo son, con lo que dicen el Código Orgánico Integral "
        "Penal y la Ley Orgánica de Protección de Datos Personales, y te mostramos qué tipo de cámara va con cada caso. "
        "No es asesoría legal: si tu caso tiene dudas, consulta con un abogado en Quito, Cuenca o tu ciudad antes de grabar.</p>"
    ),
    "sections": [
        {"h2": "La respuesta corta: tu espacio sí; la intimidad de otros, no",
         "html": (
             "<p>Una cámara discreta es legal como equipo. Lo que la ley mira es <strong>a quién grabas, dónde y qué haces con "
             "la grabación</strong>. Vigilar tu propia casa o tu local para cuidar tus bienes es un uso razonable. Grabar a "
             "otra persona en un espacio íntimo o sus conversaciones privadas sin su consentimiento puede ser delito.</p>"
             "<p>La diferencia entre un caso y otro casi nunca está en el aparato, sino en el lugar donde lo pones y en si las "
             "personas grabadas saben, o deberían saber, que hay una cámara.</p>")},
        {"h2": "Qué dice el COIP: el artículo 178",
         "html": (
             "<p>El artículo 178 del COIP, «Violación a la intimidad», sanciona con uno a tres años de prisión a la persona "
             "que, «sin contar con el consentimiento o la autorización legal», acceda, intercepte, grabe, reproduzca, difunda o "
             "publique «datos personales, mensajes de datos, voz, audio y vídeo» o «comunicaciones privadas o reservadas de "
             "otra persona por cualquier medio».</p>"
             "<p>El mismo artículo aclara que la norma no se aplica a quien divulgue grabaciones de audio y video en las que "
             "interviene personalmente, ni a la información pública según la ley. Las palabras clave son "
             "<strong>consentimiento</strong> y <strong>comunicaciones privadas</strong>: el audio de una conversación ajena "
             "es el terreno más delicado. Si tu cámara graba sonido, piensa dos veces dónde la pones.</p>")},
        {"h2": "La Ley de Protección de Datos: casa contra negocio",
         "html": (
             "<p>La Ley Orgánica de Protección de Datos Personales define como dato personal cualquier dato que identifica "
             "o hace identificable a una persona, y una imagen de video puede serlo. Su artículo 2 excluye a las personas "
             "naturales que usan esos datos en <strong>actividades familiares o domésticas</strong>: la cámara de tu casa "
             "queda en ese terreno.</p>"
             "<p>Un negocio, en cambio, sí entra en la ley. El artículo 7 enumera las bases legítimas para tratar datos, entre "
             "ellas el consentimiento y el interés legítimo del responsable, y el artículo 9 pide que en ese caso el "
             "tratamiento sea <strong>transparente</strong> para la persona y se limite a los datos estrictamente necesarios. "
             "En la práctica: aviso visible de videovigilancia y cámaras solo donde hay un motivo de seguridad.</p>")},
        {"h2": "Usos legítimos y dónde están los límites",
         "html": (
             "<table><thead><tr><th>Uso</th><th>Razonable si…</th><th>Límite</th></tr></thead><tbody>"
             "<tr><td>Vigilar tu casa cuando sales</td><td>Grabas tus espacios comunes: sala, entrada, cocina</td><td>Nada en baños ni en el cuarto de otra persona</td></tr>"
             "<tr><td>Ver a la niñera o a quien cuida a un familiar</td><td>Le informas que hay cámaras en las áreas de cuidado</td><td>Sin audio de sus conversaciones privadas ni cámaras en su espacio personal</td></tr>"
             "<tr><td>Negocio o bodega</td><td>Hay aviso visible y un motivo de seguridad</td><td>Nada en baños ni vestidores</td></tr>"
             "<tr><td>Guardia o personal en ronda</td><td>La cámara corporal se usa a la vista y en horario de trabajo</td><td>Sin grabar fuera de la función</td></tr>"
             "</tbody></table>"
             "<p>Ten presente que un aviso o una conversación con la persona no convierten en legal una grabación en un "
             "espacio íntimo. En casos dudosos, la cámara visible suele ser la decisión más segura.</p>")},
        {"h2": "Qué tipo de cámara discreta va con cada uso",
         "html": (
             "<ul><li><strong>Casa u oficina:</strong> la " + a(P_ESPIA_CARG, "cámara con forma de cargador de pared") + " "
             "graba en 1080p, tiene lente de 150°, Wi-Fi 2.4G para verla en el celular y memoria microSD de hasta 128 GB. Se "
             "alimenta del tomacorriente, así que no depende de batería.</li>"
             "<li><strong>Guardias, rondas y supervisión de campo:</strong> la " + a(P_ESPIA_PECHO, "cámara de pecho") + " y la "
             "linterna de cabeza con cámara registran lo que ve quien la lleva.</li>"
             "<li><strong>Registro de tus propias reuniones o inspecciones:</strong> el esfero y las gafas con cámara.</li></ul>"
             "<p>Toda la línea está en " + a(CAT_ESPIA, "cámaras espía") + ". Para vigilar un local de forma permanente, una "
             "cámara IP visible rinde más: graba en un NVR, disuade y no genera dudas legales. Las tienes en "
             + a(CAT_IP, "cámaras IP") + ".</p>")},
        {"h2": "Antes de instalarla: pasos para quedarte del lado correcto",
         "html": (
             "<ol><li><strong>Define el motivo:</strong> seguridad de tus bienes o de un familiar, no curiosidad sobre otra persona.</li>"
             "<li><strong>Elige el lugar:</strong> espacios comunes de tu casa o áreas de trabajo del negocio.</li>"
             "<li><strong>Desactiva el audio</strong> si no lo necesitas.</li>"
             "<li><strong>Informa</strong> a empleados y cuidadores, y pon aviso en el negocio.</li>"
             "<li><strong>Protege la grabación:</strong> cambia la clave de la app y no compartas videos en redes ni grupos.</li>"
             "<li><strong>Borra lo que no sirve</strong> y guarda solo lo que documente un hecho concreto.</li></ol>")},
        {"h2": "Si ya grabaste algo: cómo manejar el video",
         "html": (
             "<p>Supón que la cámara de tu local registró un robo o la de tu casa grabó un maltrato a un familiar. El primer "
             "impulso es subir el video a redes. No lo hagas: el artículo 178 también sanciona difundir o publicar audio y "
             "video de otra persona sin consentimiento, y además puedes entorpecer la investigación.</p>"
             "<ul><li>Guarda una copia del archivo original sin editarlo, con la fecha y la hora que marca el equipo.</li>"
             "<li>Anota dónde estaba la cámara y quién tiene acceso a ella.</li>"
             "<li>Lleva la copia cuando presentes la denuncia ante la Fiscalía y deja que la autoridad decida su uso.</li></ul>")},
        {"h2": "Cuándo NO te conviene una cámara espía",
         "html": (
             "<ul><li><strong>Quieres disuadir robos:</strong> una cámara oculta no asusta a nadie; una visible sí.</li>"
             "<li><strong>Necesitas grabar varias zonas todo el día:</strong> un sistema IP con NVR guarda semanas de video y "
             "una microSD no.</li>"
             "<li><strong>El lugar es íntimo o la persona no sabe</strong> que existe la cámara en su espacio privado: ahí el "
             "riesgo legal es tuyo.</li></ul>")},
    ],
    "products": [9459, 9460, 9463, 9461, 9462],
    "cta_mid": {"title": "¿Buscas una cámara discreta para tu casa o negocio?",
                "text": "Te ayudamos a elegir el modelo según el uso y, si conviene, te sugerimos una cámara IP visible.",
                "wa_text": "Hola, vengo del artículo de cámara espía y quiero saber qué modelo me conviene"},
    "cta_end": {"title": "Cámaras discretas y cámaras IP en un solo lugar",
                "text": "Crea tu cuenta comercial y ve precios de distribuidor en cámaras espía y sistemas de videovigilancia.",
                "wa_text": "Hola, vengo del artículo de cámara espía, ¿me ayudan con una cotización?"},
    "faq": [
        {"q": "¿Es legal comprar una cámara espía en Ecuador?",
         "a": "Comprar el equipo no es delito. Lo que puede ser delito según el artículo 178 del COIP es grabar o difundir comunicaciones privadas o datos de otra persona sin su consentimiento."},
        {"q": "¿Puedo poner una cámara oculta para vigilar a la niñera?",
         "a": "En los espacios comunes de tu casa es un uso doméstico, pero lo prudente es informarle que hay cámaras. Evita grabar audio de sus conversaciones y nunca pongas cámaras en su espacio personal."},
        {"q": "¿Puedo grabar a mis empleados con cámaras ocultas?",
         "a": "Un negocio está sujeto a la Ley de Protección de Datos Personales, que pide transparencia. Usa cámaras visibles con aviso en áreas de trabajo y consulta con un abogado antes de usar una oculta."},
        {"q": "¿Cuánto graba una cámara espía con memoria de 128 GB?",
         "a": "Depende de la resolución y de si graba continuo o por movimiento. Para grabaciones largas y varias zonas conviene un sistema IP con NVR y disco duro."},
    ],
    "fuentes": [F_COIP, F_LOPDP],
})


# ─── Fusiones: el brief pide 5-7 H2; algunas secciones se escribieron aparte y se unen aquí ───
def _sec(s, h2):
    return next(x for x in s["sections"] if x["h2"] == h2)


def fusionar(n, origen, destino, nuevo_h2=None):
    s = next(x for x in SPECS if x["n"] == n)
    o, d = _sec(s, origen), _sec(s, destino)
    d["html"] += o["html"]
    if nuevo_h2:
        d["h2"] = nuevo_h2
    s["sections"].remove(o)


fusionar(2, "Arma la cotización IP completa con un distribuidor", "Cuándo NO te conviene pasar a IP todavía")
fusionar(9, "Soporte y garantía en Ecuador: la pregunta que más pesa", "Cómo elegir la marca para un proyecto concreto")
fusionar(12, "Quién mira las cámaras y quién tiene la clave", "Verlo todo desde el celular, con o sin internet en el local")
fusionar(12, "Cuántos días de video guardas: el disco manda", "Evidencia que sirve: resolución, lente y altura",
         "Evidencia que sirve: resolución, lente y días de grabación")
fusionar(14, "Para técnicos en Quito y provincia", "Cómo armar un kit AK de cuatro cámaras")
fusionar(19, "Si ya grabaste algo: cómo manejar el video", "Antes de instalarla: pasos para quedarte del lado correcto",
         "Antes y después de grabar: pasos para quedarte del lado correcto")


def main():
    os.makedirs(os.path.join(AQUI, "specs"), exist_ok=True)
    for s in SPECS:
        ruta = os.path.join(AQUI, "specs", f"{s['n']:02d}-{s['slug']}.json")
        with open(ruta, "w", encoding="utf-8") as f:
            json.dump(s, f, ensure_ascii=False, indent=2)
        print(f"[{s['n']:>2}] {len(s['title'])} car. título · {len(s['meta_desc'])} car. meta · {ruta}")


if __name__ == "__main__":
    main()
