#!/usr/bin/env python3
"""Autenticación para las APIs de Tag Manager, GA4 Admin y Search Console.

Dos caminos, en este orden de preferencia:

1. **ADC — credenciales por defecto de la aplicación** (recomendado). Se obtienen
   por consola y no requieren crear cliente OAuth ni configurar pantalla de
   consentimiento, porque usan el cliente de la propia CLI de Google:

       gcloud auth login
       gcloud config set project creative-web-tracking
       gcloud auth application-default login --scopes=<los de SCOPES>

2. **credentials.json** — cliente OAuth de escritorio descargado de Google Cloud.
   Sirve de respaldo si ADC no puede pedir alguno de los scopes.

    from auth import servicio
    gtm = servicio("tagmanager", "v2")
    ga4 = servicio("analyticsadmin", "v1beta")
    gsc = servicio("searchconsole", "v1")
"""
import os
import google.auth
from google.auth.transport.requests import Request
from google.oauth2.credentials import Credentials
from google_auth_oauthlib.flow import InstalledAppFlow
from googleapiclient.discovery import build

AQUI = os.path.dirname(os.path.abspath(__file__))
CREDENCIALES = os.path.join(AQUI, "credentials.json")   # opcional, camino 2
TOKEN = os.path.join(AQUI, "token.json")                # se genera solo

PROYECTO = "creative-web-tracking"

SCOPES = [
    # Tag Manager: leer, editar y publicar contenedores
    "https://www.googleapis.com/auth/tagmanager.readonly",
    "https://www.googleapis.com/auth/tagmanager.edit.containers",
    "https://www.googleapis.com/auth/tagmanager.edit.containerversions",
    "https://www.googleapis.com/auth/tagmanager.publish",
    # GA4 Admin: marcar eventos clave, leer flujos de datos
    "https://www.googleapis.com/auth/analytics.edit",
    "https://www.googleapis.com/auth/analytics.readonly",
    # Search Console: consultas, páginas, CTR y posiciones
    "https://www.googleapis.com/auth/webmasters.readonly",
]

_CRED = None


def credenciales():
    global _CRED
    if _CRED is not None:
        return _CRED

    # Camino 1 — ADC
    try:
        cred, _ = google.auth.default(scopes=SCOPES)
        _CRED = cred
        return cred
    except google.auth.exceptions.DefaultCredentialsError:
        pass

    # Camino 2 — cliente OAuth propio
    if not os.path.exists(CREDENCIALES):
        raise SystemExit(
            "No hay credenciales.\n\n"
            "Opción A (recomendada), por consola:\n"
            "  gcloud auth login\n"
            f"  gcloud config set project {PROYECTO}\n"
            "  gcloud auth application-default login --scopes=" + ",".join(SCOPES) + "\n\n"
            f"Opción B: descarga un cliente OAuth de escritorio y guárdalo en {CREDENCIALES}.\n"
            "Ver README.md en esta carpeta."
        )
    cred = None
    if os.path.exists(TOKEN):
        cred = Credentials.from_authorized_user_file(TOKEN, SCOPES)
    if not cred or not cred.valid:
        if cred and cred.expired and cred.refresh_token:
            cred.refresh(Request())
        else:
            flujo = InstalledAppFlow.from_client_secrets_file(CREDENCIALES, SCOPES)
            cred = flujo.run_local_server(port=0, prompt="consent")
        with open(TOKEN, "w") as f:
            f.write(cred.to_json())
        os.chmod(TOKEN, 0o600)
    _CRED = cred
    return cred


def servicio(nombre, version):
    return build(nombre, version, credentials=credenciales(), cache_discovery=False)


if __name__ == "__main__":
    print("== Comprobando acceso ==\n")

    gtm = servicio("tagmanager", "v2")
    cuentas = gtm.accounts().list().execute().get("account", [])
    print(f"Tag Manager · {len(cuentas)} cuentas:")
    for c in cuentas:
        print(f"  {c['accountId']:>12}  {c['name']}")

    ga4 = servicio("analyticsadmin", "v1beta")
    cta = ga4.accounts().list().execute().get("accounts", [])
    print(f"\nGA4 Admin · {len(cta)} cuentas:")
    for c in cta[:10]:
        print(f"  {c['name'].split('/')[-1]:>12}  {c['displayName']}")

    gsc = servicio("searchconsole", "v1")
    sitios = gsc.sites().list().execute().get("siteEntry", [])
    print(f"\nSearch Console · {len(sitios)} propiedades:")
    for s in sitios[:15]:
        print(f"  {s.get('permissionLevel','?'):>18}  {s['siteUrl']}")
