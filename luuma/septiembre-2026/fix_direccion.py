#!/usr/bin/env python3
"""Corrige la dirección de Luuma en los posts publicados.

El problema: en 31 de los 95 posts se ubica a Luuma (y en algunos casos a La Quadra)
en la av. Flavio Reyes. La dirección real es:

    Plaza La Quadra, Redondel de Barbasquillo, 130214 Manta

Importante: la av. Flavio Reyes **sí existe** y es la columna gastronómica de Manta.
Las menciones que hablan de la avenida como zona de la ciudad son correctas y NO se
tocan. Solo se corrigen las que atribuyen esa ubicación a Luuma o a La Quadra.

Uso:
  python3 fix_direccion.py --dry-run    # muestra qué cambiaría, no toca el sitio
  python3 fix_direccion.py              # aplica los cambios
"""
import re, sys, time, random, json, os
import requests

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.abspath(os.path.join(HERE, "..", ".."))
UA = {"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/126"}

DIR_REAL = "Plaza La Quadra, redondel de Barbasquillo"

# Reglas ordenadas: de la más específica a la más general.
# Cada una es (patrón, reemplazo, nota).
REGLAS = [
    # ---------- español ----------
    (r"Luuma es rooftop en Flavio Reyes",
     "Luuma es rooftop en La Quadra, junto al redondel de Barbasquillo,",
     "ubica a Luuma en la avenida equivocada"),

    (r"[Rr]ooftops? de (?:la )?av\.? Flavio Reyes como Luuma",
     "rooftops de La Quadra como Luuma",
     "«rooftops de Flavio Reyes como Luuma»"),

    (r"[Rr]ooftops? de Flavio Reyes como Luuma",
     "rooftops de La Quadra como Luuma",
     "«rooftops de Flavio Reyes como Luuma»"),

    (r"[Rr]ooftops? independientes de Flavio Reyes como Luuma",
     "rooftops independientes de La Quadra como Luuma",
     "idem con «independientes»"),

    (r"Independientes de Flavio Reyes como Luuma",
     "Independientes de La Quadra como Luuma",
     "idem"),

    (r"dos independientes en zona Flavio Reyes \(Luuma y uno más nuevo\)",
     "uno en La Quadra (Luuma) y otro más nuevo",
     "conteo de rooftops por zona"),

    (r"dos en av\.? Flavio Reyes \(Luuma y otro independiente con DJ\)",
     "uno en La Quadra (Luuma) y otro independiente con DJ",
     "conteo de rooftops por zona"),

    (r"Rooftop Flavio Reyes \(Luuma o similar\)",
     "Rooftop en La Quadra (Luuma o similar)",
     "tabla de planes"),

    (r"La Quadra es el centro comercial gastronómico que abrió hace un par de años en Flavio Reyes",
     "La Quadra es el centro comercial gastronómico que abrió hace un par de años junto al redondel de Barbasquillo",
     "ubica La Quadra en la avenida equivocada"),

    (r"Rooftop independiente Flavio Reyes con DJ",
     "Rooftop independiente con DJ",
     "horarios: no es Luuma, se quita la zona errónea"),

    # ---------- el patrón dominante: «Luuma av. Flavio Reyes» ----------
    (r"Luuma Rooftop, av\. Flavio Reyes en Manta",
     "Luuma Rooftop, en La Quadra, Manta",
     "«Luuma Rooftop, av. Flavio Reyes en Manta»"),

    (r"Luuma Rooftop, av\. Flavio Reyes",
     "Luuma Rooftop, La Quadra",
     "«Luuma Rooftop, av. Flavio Reyes»"),

    (r"Luuma av\. Flavio Reyes",
     "Luuma, en La Quadra,",
     "«Luuma av. Flavio Reyes»"),

    (r"En Luuma rooftop, operamos todo el año en av\. Flavio Reyes",
     "En Luuma rooftop operamos todo el año en La Quadra",
     "«operamos en av. Flavio Reyes»"),

    (r"Coordinamos cumpleaños desde pareja íntimo hasta familiar de 20 personas en av\. Flavio Reyes",
     "Coordinamos cumpleaños desde pareja íntimo hasta familiar de 20 personas en La Quadra",
     "cumpleaños ubicados en la avenida equivocada"),

    (r"En Luuma servimos versión rooftop de viche, encocado y ceviche manabita en la av\. Flavio Reyes",
     "En Luuma servimos versión rooftop de viche, encocado y ceviche manabita en La Quadra",
     "«servimos … en la av. Flavio Reyes»"),

    (r"sigues caminando 8 minutos a av\. Flavio Reyes y llegas a Luuma",
     "sigues caminando 8 minutos a La Quadra y llegas a Luuma",
     "trayecto desde el malecón"),

    (r"Si te hospedas cerca de av\. Flavio Reyes, Luuma queda caminable",
     "Si te hospedas cerca de Barbasquillo, Luuma queda caminable",
     "hospedaje cercano"),

    (r"[Rr]ooftops? de av\. Flavio Reyes a 5 minutos como Luuma",
     "rooftops de La Quadra a 5 minutos como Luuma",
     "«rooftops de av. Flavio Reyes a 5 minutos como Luuma»"),

    (r"cualquiera de los rooftops de av\. Flavio Reyes que está a 5 minutos del malecón",
     "cualquiera de los rooftops de La Quadra, a 5 minutos del malecón",
     "rooftops cerca del malecón"),

    (r"cena en Luuma o en algún rooftop de Flavio Reyes",
     "cena en Luuma o en algún otro rooftop de la ciudad",
     "«Luuma o algún rooftop de Flavio Reyes»"),

    (r"dejar el auto cerca de Flavio Reyes antes de subir",
     "dejar el auto cerca de La Quadra antes de subir",
     "estacionamiento antes del faro"),

    (r"En av\. Flavio Reyes, los rooftops como Luuma específicamente, ofrecen",
     "En La Quadra, los rooftops como Luuma ofrecen",
     "«En av. Flavio Reyes, los rooftops como Luuma»"),

    (r"Luuma Rooftop \(Flavio Reyes area\)",
     "Luuma Rooftop (La Quadra, Barbasquillo)",
     "tabla comparativa en inglés"),

    (r"\(Flavio Reyes area\)",
     "(La Quadra, Barbasquillo)",
     "«(Flavio Reyes area)» junto a Luuma en tabla"),

    (r"up to Avenida Flavio Reyes, and that's where the rooftops are",
     "up to Avenida Flavio Reyes and the Barbasquillo roundabout, where the rooftops are",
     "zona turística: faltaba Barbasquillo"),

    # ---------- inglés ----------
    (r"Luuma Rooftop \(Flavio Reyes area\)",
     "Luuma Rooftop (La Quadra, Barbasquillo)",
     "tabla comparativa en inglés"),

    (r"Luuma sits in the Flavio Reyes zone",
     "Luuma sits in La Quadra, by the Barbasquillo roundabout",
     "ubicación en inglés"),

    (r"DJ rooftop on Flavio Reyes",
     "DJ rooftop on Flavio Reyes",   # correcto: ese otro sí está allí
     None),
]


def cargar_env():
    env = {}
    with open(os.path.join(ROOT, ".env")) as f:
        for line in f:
            line = line.strip()
            if line and not line.startswith("#") and "=" in line:
                k, v = line.split("=", 1)
                env[k] = v.strip().strip('"')
    return env


def main():
    dry = "--dry-run" in sys.argv
    env = cargar_env()
    auth = (env["LUUMA_WP_USER"], env["LUUMA_WP_APP_PASS"])
    B = env["LUUMA_WP_BASE"].rstrip("/")
    s = requests.Session(); s.headers.update(UA)

    def get(path, **params):
        params["cb"] = random.randint(1, 10**9)
        r = s.get(B + path, auth=auth, params=params, timeout=60)
        r.raise_for_status()
        return r.json()

    print("Descargando posts…")
    posts = []
    for page in (1, 2, 3):
        try:
            d = get("/posts", per_page=100, page=page, status="any", context="edit",
                    _fields="id,slug,title,content,status")
        except Exception:
            break          # la última página devuelve 400 cuando ya no hay más
        if not d:
            break
        posts += d
        time.sleep(1)
    print(f"  {len(posts)} posts\n")

    cambiados, total_reemplazos = [], 0
    for p in posts:
        c = p["content"]["raw"]
        if "flavio" not in c.lower():
            continue
        nuevo = c
        aplicadas = []
        for pat, rep, nota in REGLAS:
            if nota is None:
                continue
            nuevo2, n = re.subn(pat, rep, nuevo)
            if n:
                aplicadas.append((n, nota))
                nuevo = nuevo2
        if nuevo != c:
            cambiados.append((p, nuevo, aplicadas))
            total_reemplazos += sum(n for n, _ in aplicadas)

    print(f"{len(cambiados)} posts a corregir · {total_reemplazos} reemplazos\n")
    for p, _, aplicadas in cambiados:
        print(f"  {p['id']:>5} [{p['status']:7}] {p['slug'][:50]}")
        for n, nota in aplicadas:
            print(f"          {n}× {nota}")

    # las menciones que quedan (correctas) por post
    print("\nMenciones a Flavio Reyes que se conservan (la avenida sí existe):")
    for p, nuevo, _ in cambiados:
        quedan = len(re.findall(r"flavio\s+reyes", nuevo, re.I))
        if quedan:
            print(f"  {p['id']:>5} conserva {quedan} mención(es) legítimas · {p['slug'][:44]}")

    if dry:
        print("\n--dry-run: no se aplicó ningún cambio.")
        return

    print("\nAplicando…")
    for p, nuevo, _ in cambiados:
        time.sleep(8)
        r = s.post(f"{B}/posts/{p['id']}", auth=auth,
                   params={"cb": random.randint(1, 10**9)},
                   json={"content": nuevo}, timeout=60)
        estado = "OK" if r.status_code < 400 else f"ERROR {r.status_code}"
        print(f"  {p['id']} {estado} · {p['slug'][:48]}")
    print(f"\n{len(cambiados)} posts actualizados.")


if __name__ == "__main__":
    main()
