#!/usr/bin/env python3
"""CTA temprano en los 5 posts de dueño con más visitas (2026-10-05).

Diagnóstico: el bloque de reserva quedó al 90 % del artículo y en 19 días no
recibió un solo clic. Este script mete un botón corto a mitad del texto, justo
donde el lector ya obtuvo la respuesta. Cada post lleva su propio mensaje de
WhatsApp para atribuir el clic en GA4 (dimensión linkUrl del evento
whatsapp_click).

    python3 aplicar.py          # simulación: muestra dónde inserta
    python3 aplicar.py --ya     # aplica

Es idempotente: si el post ya tiene el marcador cta-temprano-v1, lo salta.
Respaldo del contenido previo en antes/.
"""
import urllib.request, urllib.parse, base64, json, os, re, sys, time

AQUI = os.path.dirname(os.path.abspath(__file__))
env = dict(l.strip().split("=", 1) for l in open(os.path.join(AQUI, "..", "..", ".env"))
           if l.startswith("CH_") and "=" in l)
AUTH = base64.b64encode(f"{env['CH_WP_USER']}:{env['CH_WP_APP_PASS']}".encode()).decode()
H = {"Authorization": f"Basic {AUTH}", "User-Agent": "Mozilla/5.0", "Content-Type": "application/json"}
API = "https://comercialhidrobo.com/wp-json/wp/v2"
RESERVA = "https://www.comercialhidrobo.com/solicitar-cita-taller-mecanico/"
MARCA = "cta-temprano-v1"


def wa(texto):
    return "https://wa.me/593996390233?text=" + urllib.parse.quote(texto)


def bloque(texto, boton, href, enlace=None):
    extra = f' O si prefiere, <a href="{enlace[1]}">{enlace[0]}</a>.' if enlace else ""
    return f'''<!-- {MARCA} -->
<!-- wp:group {{"style":{{"spacing":{{"padding":{{"top":"16px","bottom":"16px","left":"20px","right":"20px"}}}},"border":{{"left":{{"color":"#25d366","width":"4px"}}}}}},"backgroundColor":"light-green-cyan"}} -->
<div class="wp-block-group has-light-green-cyan-background-color has-background" style="border-left-color:#25d366;border-left-width:4px;padding-top:16px;padding-right:20px;padding-bottom:16px;padding-left:20px"><!-- wp:paragraph -->
<p>{texto}{extra}</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {{"backgroundColor":"vivid-green-cyan"}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{href}">{boton}</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /{MARCA} -->

'''


# (id, H2 antes del cual se inserta, bloque)
PLAN = [
    (11364, "Particularidades en Ecuador", bloque(
        "<strong>¿Su Toyota ya llegó a uno de estos kilometrajes?</strong> Agende el mantenimiento en nuestro taller de Ibarra, Cayambe o Tulcán. Díganos el modelo, el año y el kilometraje, y le confirmamos turno y costo.",
        "Agendar mantenimiento por WhatsApp",
        wa("Hola, vengo de la tabla de mantenimiento Toyota. Quiero agendar. Modelo: ___ Año: ___ Km: ___"),
        ("reserve en línea", RESERVA))),
    (8220, "Las mejores camionetas con mejor consumo de combustible", bloque(
        "<strong>¿Su camioneta está gastando más combustible que antes?</strong> Filtros sucios, inyectores o llantas mal calibradas suben el consumo sin que se note. Lo revisamos en nuestro taller de Ibarra, Cayambe o Tulcán.",
        "Agendar revisión por WhatsApp",
        wa("Hola, vengo del artículo de consumo de camionetas. Quiero agendar una revisión. Modelo: ___ Año: ___ Km: ___"),
        ("reserve en línea", RESERVA))),
    (8117, "¿Qué cilindrada me conviene en Ecuador?", bloque(
        "<strong>Cada motor pide su propio plan de mantenimiento.</strong> Si ya tiene su auto, lo revisamos según su cilindrada y kilometraje en nuestro taller de Ibarra, Cayambe o Tulcán.",
        "Agendar mantenimiento por WhatsApp",
        wa("Hola, vengo del artículo de cilindrada. Quiero agendar un mantenimiento. Modelo: ___ Año: ___ Km: ___"),
        ("reserve en línea", RESERVA))),
    (8237, "¿Qué requisitos son necesarios para acceder a la exoneración de autos?", bloque(
        "<strong>¿Cree que califica para la exoneración?</strong> Revisamos su caso sin compromiso y le decimos qué modelos aplican y cuánto baja el precio final. El trámite lo acompañamos nosotros.",
        "Consultar mi caso por WhatsApp",
        wa("Hola, vengo del artículo de exoneración. Quisiera saber si califico y qué modelos aplican."),
        ("vea los vehículos exonerados", "https://www.comercialhidrobo.com/exonerados/"))),
    (8099, "¿Qué valores de torque son buenos?", bloque(
        "<strong>¿Siente que su auto perdió fuerza en las subidas?</strong> Casi siempre es mantenimiento: bujías, filtros, inyectores o el embrague. Lo diagnosticamos en nuestro taller de Ibarra, Cayambe o Tulcán.",
        "Agendar diagnóstico por WhatsApp",
        wa("Hola, vengo del artículo de torque. Mi auto perdió fuerza y quiero agendar un diagnóstico. Modelo: ___ Año: ___ Km: ___"),
        ("reserve en línea", RESERVA))),
]


def pedir(url, data=None, metodo="GET"):
    req = urllib.request.Request(url, headers=H, method=metodo,
                                 data=json.dumps(data).encode() if data else None)
    return json.load(urllib.request.urlopen(req, timeout=90))


def palabras(t):
    return len(re.sub(r"<[^>]+>", " ", t).split())


def main():
    aplicar = "--ya" in sys.argv
    for pid, h2, cta in PLAN:
        r = pedir(f"{API}/posts/{pid}?context=edit")
        raw = r["content"]["raw"]
        if MARCA in raw:
            print(f"{pid}: ya tiene el CTA, salto"); continue
        i = raw.find(f">{h2}</h2>")
        assert i > 0, f"{pid}: no encuentro el H2 «{h2}»"
        j = raw.rfind("<!-- wp:heading", 0, i)
        assert 0 < j < i and i - j < 200, f"{pid}: comentario de bloque raro"
        nuevo = raw[:j] + cta + raw[j:]
        print(f"{pid} {r['slug']}: inserta en palabra {palabras(raw[:j])}/{palabras(raw)}")
        if aplicar:
            res = pedir(f"{API}/posts/{pid}", {"content": nuevo}, "POST")
            ok = MARCA in res["content"]["raw"]
            print(f"   → {'OK' if ok else 'FALLÓ'} · modified {res['modified']}")
        time.sleep(8)


if __name__ == "__main__":
    main()
