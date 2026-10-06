#!/usr/bin/env python3
"""Valida los posts corregidos de despues/ contra BRIEF.md.

    python3 validar.py despues/497.json     # uno
    python3 validar.py                      # todos
"""
import glob, json, os, re, sys

AQUI = os.path.dirname(os.path.abspath(__file__))
cache = json.load(open(os.path.join(AQUI, "productos-cache.json")))
PERMITIDOS = set()
for v in cache.values():
    if v and v["price"] > 0:
        for x in (v["price"], round(v["price"] * 1.15, 2)):
            PERMITIDOS.add(round(x, 2))

WA_OK = "https://wa.me/593997966191?text="
PROHIBIDAS = ["en el mundo actual", "hoy en día", "en la actualidad", "cabe destacar", "cabe mencionar",
              "sin lugar a dudas", "en conclusión", "en resumen", "la mejor opción", "amplia gama",
              "soluciones integrales", "calidad premium", "aliado estratégico", "es importante destacar"]


def num(s):
    s = s.strip("$ ").rstrip(".,")
    if re.search(r",\d{1,2}$", s):
        s = s.replace(".", "").replace(",", ".")
    else:
        s = s.replace(",", "").replace(".", "") if re.search(r"\.\d{3}($|\D)", s) else s.replace(",", "")
    try:
        return round(float(s), 2)
    except ValueError:
        return None


def validar(p):
    e = []
    for k in ("id", "title", "yoast_title", "yoast_desc", "producto_portada", "content"):
        if k not in p:
            e.append(f"falta {k}")
    if e:
        return e, 0
    c = p["content"]
    plano = re.sub(r"<[^>]+>", " ", c)
    pal = len(plano.split())
    if not 1150 <= pal <= 1700:
        e.append(f"{pal} palabras (1.200-1.600)")
    for m in re.findall(r"\$\s?\d[\d.,]*", plano):
        v = num(m)
        if v is None or v not in PERMITIDOS:
            e.append(f"precio no permitido: {m.strip()}")
    if "excerpt" in p and re.search(r"\$\s?\d", p["excerpt"]):
        e.append("el resumen (excerpt) tiene precios")
    for t in (p["title"], p["yoast_title"], p["yoast_desc"], p.get("excerpt", "")):
        if re.search(r"\$\s?\d|precios? reales|con precios|precios 20", t, re.I):
            e.append(f"promete precios: «{t[:60]}»")
    if len(p["yoast_title"]) > 60:
        e.append(f"yoast_title {len(p['yoast_title'])} car.")
    if not 140 <= len(p["yoast_desc"]) <= 160:
        e.append(f"yoast_desc {len(p['yoast_desc'])} car.")
    was = re.findall(r'href="([^"]*(?:wa\.me|whatsapp)[^"]*)"', c)
    malos = [w for w in was if not w.startswith(WA_OK)]
    if malos:
        e.append(f"WhatsApp con otro número/formato: {malos[:2]}")
    if len(was) < 2:
        e.append(f"solo {len(was)} botones de WhatsApp (mínimo 2: intermedio y final)")
    if len(set(was)) > 1:
        e.append("los WhatsApp del post deben usar el mismo enlace")
    if "968663866" in c:
        e.append("queda el número 0968663866")
    if "https://www.dimaparecuador.com/contacto/" not in c:
        e.append("falta el botón al formulario de /contacto/")
    if re.search(r"\?p=\d+", c):
        e.append("quedan enlaces ?p= a borradores")
    if p["producto_portada"] not in cache or not cache[p["producto_portada"]]:
        e.append(f"producto_portada inexistente: {p['producto_portada']}")
    for s in set(re.findall(r'dimaparecuador\.com/producto/([^/"]+)', c)):
        if not cache.get(s):
            e.append(f"enlace a producto no verificado: {s} (usa solo los que ya estaban)")
    bajo = plano.lower()
    for f in PROHIBIDAS:
        if f in bajo:
            e.append(f"frase prohibida: {f}")
    if c.count("<!-- wp:") != c.count("<!-- /wp:") + c.count("/-->"):
        e.append("bloques Gutenberg desbalanceados")
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
