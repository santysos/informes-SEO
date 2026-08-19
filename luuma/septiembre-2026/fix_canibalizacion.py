#!/usr/bin/env python3
"""Cierra la canibalización pendiente y las redirecciones que faltaban.

Situación encontrada:
  · Los pares de playas y de cerveza artesanal ya se consolidaron en agosto:
    el post absorbido está en draft y su 301 existe. Nada que hacer.
  · Queda vivo el par de mariscos:
      /recetas-cocina/comida-de-mar-manta/            1.571 impr · 9 clics · 695 palabras
      /gastronomia-manta/mariscos-manta-ceviches-platos-mar/  859 impr · 3 clics · 1.196 palabras
    Se conserva la URL con más tráfico (comida-de-mar-manta) y se le trasplantan
    las secciones que solo tiene la otra. Después, draft + 301.
  · El draft 1701 (restaurantes-reservaciones-manta-2) quedó sin redirección.

Uso:
  python3 fix_canibalizacion.py --dry-run
  python3 fix_canibalizacion.py
"""
import re, sys, time, random, os
import requests

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT_DIR = os.path.abspath(os.path.join(HERE, "..", ".."))
UA = {"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/126"}

CONSERVA = 1689          # comida-de-mar-manta
ABSORBE = 1530           # mariscos-manta-ceviches-platos-mar

# Secciones del post absorbido que se trasplantan (por su H2)
TRASPLANTAR = [
    "Temporadas y Disponibilidad",
    "Mariscos Premium en Luuma",
    "Por Qué los Mariscos de Manta Son Únicos",
]

# Redirecciones que faltan: (origen, destino)
REDIRECTS = [
    ("/gastronomia-manta/mariscos-manta-ceviches-platos-mar/",
     "/recetas-cocina/comida-de-mar-manta/"),
    ("/gastronomia-manta/restaurantes-reservaciones-manta-2/",
     "/gastronomia-manta/mejores-restaurantes-manta-ecuador/"),
]


def cargar_env():
    env = {}
    with open(os.path.join(ROOT_DIR, ".env")) as f:
        for line in f:
            line = line.strip()
            if line and not line.startswith("#") and "=" in line:
                k, v = line.split("=", 1)
                env[k] = v.strip().strip('"')
    return env


def secciones(html):
    """Parte el contenido en bloques por H2. Devuelve [(titulo, html_de_la_seccion)]."""
    partes = re.split(r'(<!-- wp:heading -->\s*<h2[^>]*>.*?</h2>\s*<!-- /wp:heading -->)',
                      html, flags=re.S)
    out, i = [], 1
    while i < len(partes):
        cab = partes[i]
        cuerpo = partes[i + 1] if i + 1 < len(partes) else ""
        titulo = re.sub(r"<[^>]+>", "", re.search(r"<h2[^>]*>(.*?)</h2>", cab, re.S).group(1)).strip()
        out.append((titulo, cab + cuerpo))
        i += 2
    return out


def main():
    dry = "--dry-run" in sys.argv
    env = cargar_env()
    auth = (env["LUUMA_WP_USER"], env["LUUMA_WP_APP_PASS"])
    B = env["LUUMA_WP_BASE"].rstrip("/")
    API = B.rsplit("/wp/v2", 1)[0]
    s = requests.Session(); s.headers.update(UA)

    def get(path, **params):
        params["cb"] = random.randint(1, 10**9)
        r = s.get(B + path, auth=auth, params=params, timeout=60)
        r.raise_for_status()
        return r.json()

    print("=" * 78)
    print("CONSOLIDACIÓN DEL PAR DE MARISCOS")
    print("=" * 78)

    conserva = get(f"/posts/{CONSERVA}", context="edit",
                   _fields="id,slug,title,content,link")
    absorbe = get(f"/posts/{ABSORBE}", context="edit",
                  _fields="id,slug,title,content,link")

    c_html = conserva["content"]["raw"]
    a_html = absorbe["content"]["raw"]
    palabras = lambda h: len(re.sub(r"<[^>]+>", " ", h).split())

    print(f"\nSe conserva : /{conserva['slug']}/  ({palabras(c_html)} palabras)")
    print(f"Se absorbe  : /{absorbe['slug']}/  ({palabras(a_html)} palabras)")

    secs_a = secciones(a_html)
    disponibles = [t for t, _ in secs_a]
    print(f"\nSecciones del post absorbido: {disponibles}")

    nuevas = []
    for titulo in TRASPLANTAR:
        match = [(t, h) for t, h in secs_a if titulo.lower() in t.lower()]
        if not match:
            print(f"  ⚠ no encontré la sección «{titulo}»")
            continue
        nuevas.append(match[0])
        print(f"  ✓ se trasplanta «{match[0][0]}» ({palabras(match[0][1])} palabras)")

    # el trasplante entra antes de la sección de preguntas frecuentes
    secs_c = secciones(c_html)
    idx_faq = next((i for i, (t, _) in enumerate(secs_c)
                    if "frecuente" in t.lower()), len(secs_c))
    cabecera = c_html.split(secs_c[0][1])[0] if secs_c else c_html
    cuerpo = [h for _, h in secs_c]
    for _, h in nuevas:
        cuerpo.insert(idx_faq, h)
    nuevo_html = cabecera + "\n\n".join(cuerpo)

    print(f"\nResultado: {palabras(c_html)} → {palabras(nuevo_html)} palabras")

    if not dry:
        time.sleep(8)
        r = s.post(f"{B}/posts/{CONSERVA}", auth=auth,
                   params={"cb": random.randint(1, 10**9)},
                   json={"content": nuevo_html}, timeout=60)
        print(f"  contenido fusionado → {'OK' if r.status_code < 400 else 'ERROR ' + str(r.status_code)}")

        time.sleep(8)
        r = s.post(f"{B}/posts/{ABSORBE}", auth=auth,
                   params={"cb": random.randint(1, 10**9)},
                   json={"status": "draft"}, timeout=60)
        print(f"  post absorbido a draft → {'OK' if r.status_code < 400 else 'ERROR ' + str(r.status_code)}")

    print("\n" + "=" * 78)
    print("REDIRECCIONES 301")
    print("=" * 78)

    r = s.get(API + "/redirection/v1/redirect", auth=auth,
              params={"per_page": 200, "cb": random.randint(1, 10**9)}, timeout=40)
    existentes = {it["url"] for it in r.json().get("items", [])}

    for origen, destino in REDIRECTS:
        if origen in existentes:
            print(f"  ya existe: {origen}")
            continue
        print(f"  crear: {origen}\n         → {destino}")
        if dry:
            continue
        time.sleep(6)
        payload = {"url": origen, "action_type": "url", "action_code": 301,
                   "action_data": {"url": destino}, "group_id": 1,
                   "match_type": "url", "title": "Consolidación de contenido"}
        rr = s.post(API + "/redirection/v1/redirect", auth=auth,
                    params={"cb": random.randint(1, 10**9)}, json=payload, timeout=40)
        print(f"         {'OK' if rr.status_code < 400 else 'ERROR ' + str(rr.status_code) + ' ' + rr.text[:120]}")

    if dry:
        print("\n--dry-run: no se aplicó ningún cambio.")


if __name__ == "__main__":
    main()
