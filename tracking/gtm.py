#!/usr/bin/env python3
"""Helpers sobre la API de Google Tag Manager v2.

Todo es idempotente: si el trigger o el tag ya existe con ese nombre, lo
actualiza en vez de duplicarlo. Así el script se puede correr las veces que
haga falta sin ensuciar el contenedor.
"""
from auth import servicio

_API = None


def api():
    global _API
    if _API is None:
        _API = servicio("tagmanager", "v2")
    return _API


# ── localizar cuenta / contenedor / workspace ────────────────────────

def buscar_contenedor(nombre_contenedor):
    """Devuelve (cuenta, contenedor) buscando por nombre o por publicId (GTM-XXXX)."""
    g = api()
    for cuenta in g.accounts().list().execute().get("account", []):
        cont = g.accounts().containers().list(
            parent=cuenta["path"]).execute().get("container", [])
        for c in cont:
            if nombre_contenedor in (c["name"], c.get("publicId")):
                return cuenta, c
    raise SystemExit(f"No encontré el contenedor '{nombre_contenedor}'")


def workspace(contenedor, nombre="Default Workspace"):
    g = api()
    ws = g.accounts().containers().workspaces().list(
        parent=contenedor["path"]).execute().get("workspace", [])
    for w in ws:
        if w["name"] == nombre:
            return w
    return ws[0] if ws else None


# ── variables integradas ─────────────────────────────────────────────

def habilitar_variables(ws, tipos):
    """Activa las variables integradas que necesiten los triggers."""
    g = api()
    activas = {v["type"] for v in g.accounts().containers().workspaces()
               .built_in_variables().list(parent=ws["path"])
               .execute().get("builtInVariable", [])}
    faltan = [t for t in tipos if t not in activas]
    if faltan:
        g.accounts().containers().workspaces().built_in_variables().create(
            parent=ws["path"], type=faltan).execute()
    return faltan


# ── triggers y tags, idempotentes ────────────────────────────────────

def _existente(items, clave, nombre):
    for x in items:
        if x["name"] == nombre:
            return x
    return None


def upsert_trigger(ws, cuerpo):
    g = api()
    actuales = g.accounts().containers().workspaces().triggers().list(
        parent=ws["path"]).execute().get("trigger", [])
    previo = _existente(actuales, "trigger", cuerpo["name"])
    if previo:
        r = g.accounts().containers().workspaces().triggers().update(
            path=previo["path"], body=cuerpo).execute()
        return r, "actualizado"
    r = g.accounts().containers().workspaces().triggers().create(
        parent=ws["path"], body=cuerpo).execute()
    return r, "creado"


def upsert_tag(ws, cuerpo):
    g = api()
    actuales = g.accounts().containers().workspaces().tags().list(
        parent=ws["path"]).execute().get("tag", [])
    previo = _existente(actuales, "tag", cuerpo["name"])
    if previo:
        r = g.accounts().containers().workspaces().tags().update(
            path=previo["path"], body=cuerpo).execute()
        return r, "actualizado"
    r = g.accounts().containers().workspaces().tags().create(
        parent=ws["path"], body=cuerpo).execute()
    return r, "creado"


# ── publicar ─────────────────────────────────────────────────────────

def publicar(ws, nombre, notas=""):
    """Crea una versión del contenedor y la publica. Acción visible en el sitio."""
    g = api()
    ver = g.accounts().containers().workspaces().create_version(
        path=ws["path"], body={"name": nombre, "notes": notas}).execute()
    if not ver.get("containerVersion"):
        raise SystemExit(f"No se pudo crear la versión: {ver}")
    cv = ver["containerVersion"]
    g.accounts().containers().versions().publish(path=cv["path"]).execute()
    return cv


# ── plantillas de configuración reutilizables ────────────────────────

def trigger_clic_enlace(nombre, contiene):
    """Trigger de clic en enlaces cuya URL contenga `contiene`.

    Ojo con la forma del payload: `waitForTags` y `checkValidation` son objetos
    Parameter sueltos, NO listas. Mandarlos como lista devuelve un 400 con
    «Proto field is not repeating».
    """
    return {
        "name": nombre,
        "type": "linkClick",
        "waitForTags": {"type": "boolean", "key": "waitForTags", "value": "false"},
        "checkValidation": {"type": "boolean", "key": "checkValidation", "value": "false"},
        "filter": [{
            "type": "contains",
            "parameter": [
                {"type": "template", "key": "arg0", "value": "{{Click URL}}"},
                {"type": "template", "key": "arg1", "value": contiene},
            ],
        }],
    }


def trigger_evento_personalizado(nombre, evento):
    return {
        "name": nombre,
        "type": "customEvent",
        "customEventFilter": [{
            "type": "equals",
            "parameter": [
                {"type": "template", "key": "arg0", "value": "{{_event}}"},
                {"type": "template", "key": "arg1", "value": evento},
            ],
        }],
    }


def tag_ga4_evento(nombre, evento, measurement_id, trigger_ids, parametros=None):
    """Tag de evento GA4 apuntando directo al ID de medición.

    No usa etiqueta de configuración a propósito: si el sitio ya carga GA4 por
    otra vía (Site Kit, gtag directo), añadir una config duplicaría las vistas
    de página. Así solo viajan los eventos que definimos acá.
    """
    params = [
        {"type": "template", "key": "eventName", "value": evento},
        {"type": "boolean", "key": "sendEcommerceData", "value": "false"},
        {"type": "template", "key": "measurementIdOverride", "value": measurement_id},
    ]
    if parametros:
        params.append({
            "type": "list", "key": "eventParameters",
            "list": [{
                "type": "map",
                "map": [
                    {"type": "template", "key": "name", "value": k},
                    {"type": "template", "key": "value", "value": v},
                ],
            } for k, v in parametros.items()],
        })
    return {
        "name": nombre,
        "type": "gaawe",
        "parameter": params,
        "firingTriggerId": [str(t) for t in trigger_ids],
    }


def tag_html(nombre, html, trigger_ids):
    return {
        "name": nombre,
        "type": "html",
        "parameter": [
            {"type": "template", "key": "html", "value": html},
            {"type": "boolean", "key": "supportDocumentWrite", "value": "false"},
        ],
        "firingTriggerId": [str(t) for t in trigger_ids],
    }
