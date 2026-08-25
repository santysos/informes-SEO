#!/usr/bin/env python3
"""Helpers sobre la GA4 Admin API — marcar eventos clave y leer flujos."""
import time
from googleapiclient.errors import HttpError
from auth import servicio

_API = None
TRANSITORIOS = (429, 500, 502, 503, 504)


def api():
    global _API
    if _API is None:
        _API = servicio("analyticsadmin", "v1beta")
    return _API


def reintentar(peticion, intentos=5):
    """Ejecuta una petición reintentando los errores transitorios.

    Recorrer decenas de cuentas hace que un 503 suelto sea cuestión de tiempo;
    sin esto el script muere a mitad de camino.
    """
    for i in range(intentos):
        try:
            return peticion.execute()
        except HttpError as e:
            if e.resp.status not in TRANSITORIOS or i == intentos - 1:
                raise
            espera = 2 ** i
            print(f"    HTTP {e.resp.status} · reintento en {espera}s")
            time.sleep(espera)


def _paginar(metodo, clave, **kw):
    """Recorre todas las páginas de un list() de la Admin API."""
    token, out = None, []
    while True:
        r = reintentar(metodo(pageSize=200, pageToken=token, **kw))
        out += r.get(clave, [])
        token = r.get("nextPageToken")
        if not token:
            return out


def cuentas():
    return _paginar(api().accounts().list, "accounts")


def propiedades(cuenta_name):
    return _paginar(api().properties().list, "properties",
                    filter=f"parent:{cuenta_name}")


def buscar_propiedad(texto):
    """Busca una propiedad por su nombre, su ID numérico o el nombre de su cuenta.

    Ojo: el nombre de la CUENTA y el de la PROPIEDAD suelen diferir —en OKCars la
    cuenta se llama «OKCARS» y la propiedad «okcars.ec»—, así que aceptamos los dos
    y solo exigimos coincidencia exacta cuando hay ambigüedad.
    """
    t = texto.strip().lower()
    exactas, parciales = [], []
    for c in cuentas():
        cn = c["displayName"].lower()
        for p in propiedades(c["name"]):
            pid = p["name"].split("/")[-1]
            pn = p["displayName"].lower()
            if t == pid or t == pn:
                exactas.append(p)
            elif t in pn or t == cn or t in cn:
                parciales.append(p)
    if len(exactas) == 1:
        return exactas[0]
    if exactas:
        raise SystemExit("Varias propiedades coinciden exactamente con "
                         f"'{texto}': " + ", ".join(p["displayName"] for p in exactas))
    if len(parciales) == 1:
        return parciales[0]
    if parciales:
        raise SystemExit(f"'{texto}' es ambiguo. Coinciden: " +
                         ", ".join(f"{p['displayName']} ({p['name'].split('/')[-1]})"
                                   for p in parciales) +
                         "\nUsa el ID numérico para desambiguar.")
    raise SystemExit(f"No encontré ninguna propiedad para '{texto}'")


def flujos(propiedad):
    return reintentar(api().properties().dataStreams().list(
        parent=propiedad["name"])).get("dataStreams", [])


def measurement_id(propiedad):
    for f in flujos(propiedad):
        web = f.get("webStreamData")
        if web and web.get("measurementId"):
            return web["measurementId"]
    return None


def eventos_clave(propiedad):
    return reintentar(api().properties().keyEvents().list(
        parent=propiedad["name"])).get("keyEvents", [])


def marcar_evento_clave(propiedad, nombre_evento):
    """Marca un evento como clave. Idempotente: si ya está, no hace nada."""
    a = api()
    for ev in eventos_clave(propiedad):
        if ev["eventName"] == nombre_evento:
            return ev, "ya estaba"
    creado = reintentar(a.properties().keyEvents().create(
        parent=propiedad["name"],
        body={"eventName": nombre_evento, "countingMethod": "ONCE_PER_SESSION"},
    ))
    return creado, "marcado"


def desmarcar_evento_clave(propiedad, nombre_evento):
    """Quita un evento clave. Útil para limpiar los que nunca se disparan.

    Devuelve "quitado", "no estaba" o "no se puede": GA4 protege algunos eventos
    reservados —`purchase` entre ellos— y responde 400 «The event cannot be
    deleted». No es un fallo nuestro; hay que dejarlos y explicarlo en el informe.
    """
    a = api()
    for ev in eventos_clave(propiedad):
        if ev["eventName"] == nombre_evento:
            try:
                reintentar(a.properties().keyEvents().delete(name=ev["name"]))
                return "quitado"
            except HttpError as e:
                if e.resp.status == 400 and b"cannot be deleted" in e.content:
                    return "no se puede (evento reservado de GA4)"
                raise
    return "no estaba"
