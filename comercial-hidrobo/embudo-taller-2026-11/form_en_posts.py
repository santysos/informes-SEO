#!/usr/bin/env python3
"""Inserta el formulario de reserva de taller (JetFormBuilder 12079) dentro de los posts de
mantenimiento con más visitas, justo después del recuadro de WhatsApp a mitad de texto
(cta-temprano-v1). El enlace «reserve en línea» de ese recuadro pasa a bajar al formulario
(#reserva-taller) en vez de mandar a otra página.

Mismo formulario que la página de reserva: el taller recibe el mismo correo y la persona
termina en /gracias-cita-taller/. El post de origen se ve en GA4 como página anterior a
gracias (pageReferrer).

Uso:  python3 form_en_posts.py --dry-run [ID ...]   |   python3 form_en_posts.py [ID ...]
      python3 form_en_posts.py --revertir [ID ...]   (restaura el contenido respaldado)
"""
import json, os, sys, time, urllib.request, urllib.error

AQUI = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, os.path.join(AQUI, "../recuperacion-2026-11"))
from pilar_electricos import H, BASE

# Posts de mantenimiento/taller por visitas (GA4, 20-ago → 18-nov-2026)
POSTS = [11364, 8162, 8126, 9301, 8589, 8583, 8966, 11819, 8177, 11354, 9258, 9233, 9556, 12438, 8213]
MARCA = "<!-- cw-form-cita-v1 -->"
RESERVA = "https://www.comercialhidrobo.com/solicitar-cita-taller-mecanico/"

BLOQUE = """<!-- cw-form-cita-v1 -->
<!-- wp:group {"anchor":"reserva-taller","style":{"color":{"background":"#f2f6fa"},"border":{"color":"#c9d6e3","width":"1px"},"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}}}} -->
<div id="reserva-taller" class="wp-block-group has-border-color has-background" style="border-color:#c9d6e3;border-width:1px;background-color:#f2f6fa;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Reserve su cita en el taller</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Llene estos datos y un asesor le confirma el turno. Atendemos en Ibarra, Cayambe y Tulcán.</p>
<!-- /wp:paragraph -->
<!-- wp:jet-forms/form-block {"form_id":12079} /--></div>
<!-- /wp:group -->
<!-- /cw-form-cita-v1 -->"""

def api(method, path, body=None):
    req = urllib.request.Request(BASE + "/wp-json" + path, headers=H, method=method,
                                 data=json.dumps(body).encode() if body is not None else None)
    for intento in range(3):
        try:
            return json.loads(urllib.request.urlopen(req, timeout=120).read() or b"{}")
        except urllib.error.HTTPError as e:
            raise SystemExit(f"{method} {path} → HTTP {e.code}: {e.read()[:300]}")
        except Exception as e:
            print("   red:", e, "→ espero 90 s"); time.sleep(90)
    raise SystemExit("sin conexión")

def transformar(raw):
    fin = "<!-- /cta-temprano-v1 -->"
    if fin not in raw:
        return None, "sin recuadro cta-temprano-v1"
    ini = raw.index("<!-- cta-temprano-v1 -->")
    cta = raw[ini:raw.index(fin)]
    cta_nuevo = cta.replace(f'href="{RESERVA}"', 'href="#reserva-taller"')
    pos = raw.index(fin) + len(fin)
    nuevo = raw[:ini] + cta_nuevo + raw[ini + len(cta):pos] + "\n\n" + BLOQUE + raw[pos:]
    return nuevo, "enlace del recuadro → #reserva-taller" if cta_nuevo != cta else "recuadro sin enlace a reserva"

def main():
    dry, revertir = "--dry-run" in sys.argv, "--revertir" in sys.argv
    ids = [int(a) for a in sys.argv[1:] if a.isdigit()] or POSTS
    os.makedirs(os.path.join(AQUI, "antes"), exist_ok=True)
    for pid in ids:
        p = api("GET", f"/wp/v2/posts/{pid}?context=edit&_fields=id,link,content")
        raw = p["content"]["raw"]; respaldo = os.path.join(AQUI, "antes", f"post-{pid}.json")
        if revertir:
            if not os.path.exists(respaldo):
                print(pid, "sin respaldo, no se toca"); continue
            if not dry:
                api("POST", f"/wp/v2/posts/{pid}", {"content": json.load(open(respaldo))["raw"]})
            print(pid, "restaurado"); time.sleep(10); continue
        if MARCA in raw:
            print(pid, "ya tiene el formulario"); time.sleep(8); continue
        nuevo, nota = transformar(raw)
        if nuevo is None:
            print(pid, "SALTADO:", nota); time.sleep(8); continue
        print(pid, p["link"].replace(BASE, ""), "|", nota)
        if not dry:
            if not os.path.exists(respaldo):
                json.dump({"id": pid, "raw": raw}, open(respaldo, "w"), ensure_ascii=False)
            api("POST", f"/wp/v2/posts/{pid}", {"content": nuevo})
            print("   publicado")
        time.sleep(12)

if __name__ == "__main__":
    main()
