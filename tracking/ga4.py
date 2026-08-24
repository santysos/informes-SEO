#!/usr/bin/env python3
"""Helpers sobre la GA4 Admin API — marcar eventos clave y leer flujos."""
from auth import servicio

_API = None


def api():
    global _API
    if _API is None:
        _API = servicio("analyticsadmin", "v1beta")
    return _API


def buscar_propiedad(nombre_o_id):
    """Devuelve la propiedad por displayName o por su ID numérico."""
    a = api()
    for cuenta in a.accounts().list().execute().get("accounts", []):
        props = a.properties().list(
            filter=f"parent:{cuenta['name']}").execute().get("properties", [])
        for p in props:
            if nombre_o_id in (p["displayName"], p["name"].split("/")[-1]):
                return p
    raise SystemExit(f"No encontré la propiedad '{nombre_o_id}'")


def flujos(propiedad):
    return api().properties().dataStreams().list(
        parent=propiedad["name"]).execute().get("dataStreams", [])


def measurement_id(propiedad):
    for f in flujos(propiedad):
        web = f.get("webStreamData")
        if web and web.get("measurementId"):
            return web["measurementId"]
    return None


def eventos_clave(propiedad):
    return api().properties().keyEvents().list(
        parent=propiedad["name"]).execute().get("keyEvents", [])


def marcar_evento_clave(propiedad, nombre_evento):
    """Marca un evento como clave. Idempotente: si ya está, no hace nada."""
    a = api()
    for ev in eventos_clave(propiedad):
        if ev["eventName"] == nombre_evento:
            return ev, "ya estaba"
    creado = a.properties().keyEvents().create(
        parent=propiedad["name"],
        body={"eventName": nombre_evento, "countingMethod": "ONCE_PER_SESSION"},
    ).execute()
    return creado, "marcado"


def desmarcar_evento_clave(propiedad, nombre_evento):
    """Quita un evento clave. Útil para limpiar los que nunca se disparan."""
    a = api()
    for ev in eventos_clave(propiedad):
        if ev["eventName"] == nombre_evento:
            a.properties().keyEvents().delete(name=ev["name"]).execute()
            return True
    return False
