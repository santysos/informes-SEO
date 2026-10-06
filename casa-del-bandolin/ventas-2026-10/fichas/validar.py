#!/usr/bin/env python3
"""Valida las fichas reescritas (despues/*.json) contra BRIEF.md y fuente.json."""
import glob, json, os, re, sys, urllib.parse

AQUI = os.path.dirname(os.path.abspath(__file__))
fuente = {f["id"]: f for f in json.load(open(os.path.join(AQUI, "fuente.json")))}
PROHIBIDAS = ["en el mundo actual", "sin lugar a dudas", "calidad premium", "la mejor opción", "experiencia única",
              "transporta", "sumérgete", "joya", "obra maestra", "hecho a mano", "artesanal", "luthier", "garantía",
              "estuche incluido", "incluye estuche", "precio"]
PERMITIDOS = {"99", "99,99", "098", "078", "8561"}


def numeros(t):
    return set(re.findall(r"\d+(?:[.,]\d+)?", t))


def validar(p):
    e = []
    f = fuente.get(p.get("id"))
    if not f:
        return [f"id {p.get('id')} no está en fuente.json"], 0
    d = p.get("description", "")
    plano = re.sub(r"<[^>]+>", " ", d)
    pal = len(plano.split())
    if not 140 <= pal <= 300:
        e.append(f"{pal} palabras (150-280)")
    src = " ".join([f["nombre"], f["descripcion_actual"], f["descripcion_corta"], json.dumps(f["atributos"], ensure_ascii=False)])
    nums_src = numeros(src) | PERMITIDOS
    extra = sorted(n for n in numeros(plano) if n not in nums_src and n.replace(",", ".") not in nums_src)
    if extra:
        e.append(f"números que no están en la fuente: {extra}")
    bajo = plano.lower()
    for x in PROHIBIDAS:
        if x in bajo:
            e.append(f"palabra prohibida: {x}")
    if re.search(r"\$\s?\d", plano.replace("$99,99", "")):
        e.append("menciona precios")
    was = re.findall(r'href="(https://wa\.me/593980788561\?text=[^"]+)"', d)
    if len(was) != 1:
        e.append("debe tener exactamente 1 enlace de WhatsApp a 593980788561 con texto")
    elif urllib.parse.unquote(was[0]).lower().find(f["nombre"].lower()[:12]) < 0:
        e.append("el mensaje de WhatsApp debe nombrar el producto")
    for tag in ("<h3", "<ul", "<p"):
        if tag not in d:
            e.append(f"falta {tag}>")
    return e, pal


def main():
    rutas = sys.argv[1:] or sorted(glob.glob(os.path.join(AQUI, "despues", "*.json")))
    malos = 0
    for r in rutas:
        p = json.load(open(r if os.path.isabs(r) else os.path.join(AQUI, r)))
        e, pal = validar(p)
        print(f"[{'FAIL' if e else 'OK  '}] {os.path.basename(r)} — {pal} palabras")
        for x in e:
            print("   -", x)
        malos += bool(e)
    sys.exit(1 if malos else 0)


if __name__ == "__main__":
    main()
