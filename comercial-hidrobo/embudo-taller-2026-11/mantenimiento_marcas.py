#!/usr/bin/env python3
"""Subir las páginas de mantenimiento Toyota y Renault (nov-2026).

Toyota (11364): posición ~9-10 en «mantenimiento toyota» (430 impr/90 d) y «toyota
mantenimiento» (403). Título nuevo con la consulta al inicio + año, y preguntas frecuentes
armadas solo con los costos referenciales que el post ya publica.

Renault (8966): posición 10,5 en «mantenimiento renault», 21 en «renault mantenimiento
precios», 26,7 en «mantenimiento renault duster». Tenía 612 palabras genéricas. El post
12438 («cuánto cuesta el mantenimiento de un Renault por km», sep-2026) tenía mejor
contenido pero 2 impresiones en dos meses: compite con 8966. Se pasa su contenido a 8966
(la URL que Google ya muestra), en usted, y 12438 queda en borrador con 301 hacia 8966.
Los precios «desde $120/$180/$250» ya estaban publicados en 8966; se mantienen como
referenciales (falta que CH los confirme).

Uso: python3 mantenimiento_marcas.py --dry-run | python3 mantenimiento_marcas.py
"""
import json, os, re, sys, time, urllib.request, urllib.error

AQUI = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, os.path.join(AQUI, "../recuperacion-2026-11"))
from pilar_electricos import p, h2, h3, ul, table, H, BASE

DRY = "--dry-run" in sys.argv
R = BASE + "/renault/mantenimiento-renault-comercial-hidrobo/"
VIEJA_RENAULT = "/cuidado-del-vehiculo-y-mantenimiento/cuanto-cuesta-mantenimiento-renault-kilometraje/"

def api(method, path, body=None):
    req = urllib.request.Request(BASE + "/wp-json" + path, headers=H, method=method,
                                 data=json.dumps(body).encode() if body is not None else None)
    try:
        return json.loads(urllib.request.urlopen(req, timeout=120).read() or b"{}")
    except urllib.error.HTTPError as e:
        raise SystemExit(f"{method} {path} → HTTP {e.code}: {e.read()[:300]}")

def respaldar(pid, raw):
    os.makedirs(os.path.join(AQUI, "antes"), exist_ok=True)
    f = os.path.join(AQUI, "antes", f"post-{pid}-mantenimiento.json")
    if not os.path.exists(f):
        json.dump({"id": pid, "raw": raw}, open(f, "w"), ensure_ascii=False)

def faq(pares):
    return "\n\n".join(h3(q) + "\n\n" + p(a) for q, a in pares)

# ---------- Toyota ----------
FAQ_TOYOTA = "<!-- cw-faq-v1 -->\n" + h2("Preguntas frecuentes sobre el mantenimiento Toyota") + "\n\n" + faq([
    ("¿Cuánto cuesta el mantenimiento de un Toyota en 2026?",
     "Depende del kilometraje y del modelo. Como referencia: el servicio de 5.000 km va de USD 60 a 90, el de "
     "10.000 km de USD 100 a 160, el de 20.000 km de USD 150 a 250 y el de 40.000 km de USD 200 a 350. Para el "
     "valor exacto de su vehículo, pida la cotización con modelo, año y kilometraje."),
    ("¿Cada cuánto se hace el mantenimiento de un Toyota?",
     "El servicio liviano toca cada 5.000 km y el estándar cada 10.000 km. A los 20.000, 40.000 y 60.000 km "
     "llegan los servicios más completos. Si maneja en altura, con polvo o con carga, conviene acortar los intervalos."),
    ("¿Qué incluye el servicio Toyota de 10.000 km?",
     "Cambio de aceite y filtro, filtro de aire del motor, filtro de cabina, revisión de pastillas y discos de "
     "freno, rotación de neumáticos y revisión de batería, además de la revisión de niveles del servicio liviano."),
    ("¿El mantenimiento de un Toyota híbrido es distinto?",
     "Sigue el mismo calendario base, pero suma la revisión del sistema de batería de alto voltaje, que en "
     "versiones como la RAV4 híbrida se recomienda cada 80.000 km."),
]) + "\n<!-- /cw-faq-v1 -->\n\n"

def toyota():
    pid = 11364
    raw = api("GET", f"/wp/v2/posts/{pid}?context=edit&_fields=content")["content"]["raw"]
    ancla = '<!-- wp:heading -->\n<h2 class="wp-block-heading">Su próximo paso'
    body = {"meta": {"_yoast_wpseo_title": "Mantenimiento Toyota por kilometraje 2026: tabla y costos",
                     "_yoast_wpseo_metadesc": "Qué incluye cada servicio Toyota de 5.000 a 160.000 km y su costo "
                     "referencial en Ecuador. Reserve su cita de taller en Ibarra, Cayambe o Tulcán aquí mismo.",
                     "_yoast_wpseo_focuskw": "mantenimiento toyota"}}
    if "cw-faq-v1" not in raw:
        if raw.count(ancla) != 1:
            raise SystemExit("Toyota: no encuentro el encabezado «Su próximo paso»")
        body["content"] = raw.replace(ancla, FAQ_TOYOTA + ancla)
    print("Toyota 11364:", "FAQ + título/meta" if "content" in body else "solo título/meta",
          f"| título {len(body['meta']['_yoast_wpseo_title'])} | meta {len(body['meta']['_yoast_wpseo_metadesc'])}")
    if not DRY:
        respaldar(pid, raw); r = api("POST", f"/wp/v2/posts/{pid}", body)
        print("   publicado", r["modified"], r["meta"].get("_yoast_wpseo_title"))

# ---------- Renault ----------
def renault_bloques(cta_y_form):
    stepway = BASE + "/renault/mantenimiento-renault-stepway-ecuador/"
    logan = BASE + "/renault/mantenimiento-del-renault-logan-que-incluye/"
    return [
        p("El mantenimiento de un Renault no tiene por qué ser una sorpresa: sigue un calendario que se puede "
          "prever. Saber qué toca a cada kilometraje y cuánto cuesta cada servicio evita el susto de la factura y, "
          "sobre todo, evita que una revisión saltada se convierta meses después en una reparación cara."),
        p("Aquí está qué incluye cada mantenimiento Renault por kilometraje, cuánto cuesta como referencia, qué "
          "mueve el precio según el modelo y cuándo conviene adelantarlo. Lo atendemos en nuestros talleres de "
          "Ibarra, Cayambe y Tulcán."),
        h2("Cada cuánto se hace el mantenimiento de un Renault"),
        p("Los mantenimientos se agrupan por kilometraje y cada uno suma tareas al anterior. Los básicos son "
          "frecuentes y económicos; los mayores llegan cada cierto tramo y conviene tenerlos previstos."),
        table(["Kilometraje", "Qué incluye, en general", "Tipo"], [
            ["5.000 - 10.000 km", "Cambio de aceite y filtro, revisión de niveles y frenos", "Básico"],
            ["20.000 km", "Lo anterior + filtros de aire y de habitáculo, rotación de llantas", "Intermedio"],
            ["40.000 km", "Revisión de frenos a fondo, líquidos, bujías según motor", "Mayor"],
            ["60.000 - 80.000 km", "Correa o cadena según modelo, revisión completa", "Mayor"],
        ], "Las tareas exactas dependen del modelo y del motor. Su asesor le confirma el plan de su vehículo."),
        h2("Cuánto cuesta el mantenimiento Renault"),
        ul(["<strong>10.000 km:</strong> desde $120",
            "<strong>20.000 km:</strong> desde $180",
            "<strong>40.000 km o más:</strong> desde $250"]),
        p("Valores referenciales con mano de obra y repuestos originales Renault. Varían según el modelo, el motor "
          "y el estado del vehículo: confirme el valor de su Renault con un asesor."),
        cta_y_form,
        h2("Por qué el precio cambia de un Renault a otro"),
        p("Dos Renault del mismo año pueden tener mantenimientos de distinto costo. Lo que más lo mueve:"),
        ul(["<strong>El motor:</strong> un motor turbo pide insumos distintos y a veces más caros que uno de aspiración natural.",
            "<strong>El estado en que llega el auto:</strong> si se saltaron revisiones, primero hay que ponerse al día, y ese atraso cuesta más que el mantenimiento normal.",
            "<strong>Repuestos originales o genéricos:</strong> los originales cuestan más por servicio, pero duran y no arrastran el desgaste a otras piezas."]),
        h2("Notas por modelo"),
        ul([f"<strong>Duster:</strong> es el Renault que más trabaja en caminos de tierra y subidas. Si es su caso, conviene revisar el filtro de aire y la suspensión antes de lo que marca el manual.",
            f"<strong>Stepway y Sandero:</strong> siguen el calendario base. El detalle está en <a href=\"{stepway}\">el mantenimiento del Renault Stepway</a>.",
            f"<strong>Logan:</strong> mantenimiento sencillo y de los más económicos de la marca. Vea <a href=\"{logan}\">qué incluye el mantenimiento del Logan</a>.",
            "<strong>Kwid E-Tech (eléctrico):</strong> no lleva cambio de aceite ni filtros de motor. Su mantenimiento se concentra en frenos, llantas, suspensión y el sistema eléctrico."]),
        h2("Cuándo conviene adelantar una revisión"),
        p("Si maneja mucho en carretera de montaña, con polvo o con carga, su Renault trabaja más que el promedio "
          "y el desgaste llega antes que el kilometraje del manual. El norte del Ecuador, con sus subidas y sus "
          "caminos lastrados, es justo ese tipo de uso exigente."),
        h2("Qué no cubre el mantenimiento de rutina"),
        p("El mantenimiento programado cubre lo previsible: aceite, filtros, revisión de frenos, líquidos y los "
          "cambios por kilometraje. No cubre reparaciones por desgaste anticipado o mal uso: un embrague quemado, "
          "una llanta dañada por un hueco o un daño por haberse saltado revisiones anteriores."),
        h2("Preguntas frecuentes"),
        faq([
            ("¿Cada cuánto se hace el mantenimiento de un Renault?",
             "Los básicos cada 5.000 a 10.000 km; los mayores a los 20.000, 40.000 y 60.000-80.000 km, según el modelo."),
            ("¿Cuánto cuesta el mantenimiento de un Renault en 2026?",
             "Como referencia, desde $120 el de 10.000 km, desde $180 el de 20.000 km y desde $250 el de 40.000 km o más. "
             "El valor final depende del modelo y del motor."),
            ("¿Pierdo la garantía si no lo hago en el concesionario?",
             "Puede perder cobertura si no cumple el plan o si se usan piezas no adecuadas. Hacerlo en un taller autorizado la protege."),
            ("¿Puedo estirar el cambio de aceite para ahorrar?",
             "No conviene: el aceite vencido desgasta el motor y el ahorro se termina pagando con una reparación mayor."),
        ]),
    ]

def renault():
    pid = 8966
    raw = api("GET", f"/wp/v2/posts/{pid}?context=edit&_fields=content")["content"]["raw"]
    if "cw-renault-v2" in raw:
        print("Renault 8966: ya reescrito"); return
    i, j = raw.find("<!-- cta-temprano-v1 -->"), raw.find("<!-- /cw-form-cita-v1 -->")
    k = raw.find("<!-- cta-ch-v1 -->")
    if min(i, j, k) < 0:
        raise SystemExit("Renault: faltan marcadores cta-temprano / cw-form-cita / cta-ch")
    cta_y_form = raw[i:j + len("<!-- /cw-form-cita-v1 -->")]
    contenido = "<!-- cw-renault-v2 -->\n" + "\n\n".join(renault_bloques(cta_y_form)) + "\n\n" + raw[k:]
    texto = re.sub(r"<[^>]+>", " ", re.sub(r"<!--.*?-->", "", contenido, flags=re.S))
    body = {"title": "Mantenimiento Renault: cada cuánto, qué incluye y cuánto cuesta",
            "content": contenido,
            "meta": {"_yoast_wpseo_title": "Mantenimiento Renault 2026: costos y qué incluye por km",
                     "_yoast_wpseo_metadesc": "Calendario de mantenimiento Renault por kilometraje, costos "
                     "referenciales y notas para Duster, Stepway, Logan y Kwid. Agende en Ibarra, Cayambe o Tulcán.",
                     "_yoast_wpseo_focuskw": "mantenimiento renault"}}
    print(f"Renault 8966: {len(texto.split())} palabras | título {len(body['meta']['_yoast_wpseo_title'])} | "
          f"meta {len(body['meta']['_yoast_wpseo_metadesc'])}")
    if not DRY:
        respaldar(pid, raw); r = api("POST", f"/wp/v2/posts/{pid}", body)
        print("   publicado", r["modified"], r["meta"].get("_yoast_wpseo_title"))

def consolidar_12438():
    existentes = {x["url"] for x in api("GET", "/redirection/v1/redirect?per_page=200").get("items", [])}
    print("12438 → 301 a 8966 y borrador", "(ya existe el 301)" if VIEJA_RENAULT in existentes else "")
    if DRY: return
    if VIEJA_RENAULT not in existentes:
        api("POST", "/redirection/v1/redirect", {"url": VIEJA_RENAULT, "action_data": {"url": R.replace(BASE, "")},
            "action_type": "url", "action_code": 301, "match_type": "url", "group_id": 1, "title": "Consolidación Renault nov-2026"})
        time.sleep(8)
    raw = api("GET", "/wp/v2/posts/12438?context=edit&_fields=content")["content"]["raw"]
    respaldar(12438, raw); time.sleep(8)
    api("POST", "/wp/v2/posts/12438", {"status": "draft"})
    # posts que enlazan a la URL vieja (la búsqueda de WP mira el contenido)
    time.sleep(8)
    for x in api("GET", "/wp/v2/posts?search=cuanto-cuesta-mantenimiento-renault-kilometraje&per_page=50&_fields=id"):
        if x["id"] == 12438: continue
        c = api("GET", f"/wp/v2/posts/{x['id']}?context=edit&_fields=content")["content"]["raw"]
        if BASE + VIEJA_RENAULT in c:
            respaldar(x["id"], c); time.sleep(8)
            api("POST", f"/wp/v2/posts/{x['id']}", {"content": c.replace(BASE + VIEJA_RENAULT, R)})
            print("   enlace actualizado en", x["id"])
        time.sleep(8)

if __name__ == "__main__":
    toyota(); time.sleep(12)
    renault(); time.sleep(12)
    consolidar_12438()
