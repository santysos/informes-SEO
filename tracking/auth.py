#!/usr/bin/env python3
"""Autenticación OAuth para las APIs de Google Tag Manager y GA4 Admin.

La primera vez abre el navegador para autorizar; después reutiliza el refresh
token guardado en `token.json`. Ambos archivos van gitignorados.

    from auth import servicio
    gtm = servicio("tagmanager", "v2")
    ga4 = servicio("analyticsadmin", "v1beta")
"""
import os
from google.auth.transport.requests import Request
from google.oauth2.credentials import Credentials
from google_auth_oauthlib.flow import InstalledAppFlow
from googleapiclient.discovery import build

AQUI = os.path.dirname(os.path.abspath(__file__))
CREDENCIALES = os.path.join(AQUI, "credentials.json")   # el OAuth client de Google Cloud
TOKEN = os.path.join(AQUI, "token.json")                # se genera solo

SCOPES = [
    # Tag Manager: leer, editar y publicar contenedores
    "https://www.googleapis.com/auth/tagmanager.readonly",
    "https://www.googleapis.com/auth/tagmanager.edit.containers",
    "https://www.googleapis.com/auth/tagmanager.edit.containerversions",
    "https://www.googleapis.com/auth/tagmanager.publish",
    # GA4 Admin: marcar eventos clave, leer flujos de datos
    "https://www.googleapis.com/auth/analytics.edit",
    "https://www.googleapis.com/auth/analytics.readonly",
]


def credenciales():
    if not os.path.exists(CREDENCIALES):
        raise SystemExit(
            f"Falta {CREDENCIALES}.\n"
            "Descárgalo de Google Cloud Console → APIs y servicios → Credenciales →\n"
            "Crear credenciales → ID de cliente de OAuth → Aplicación de escritorio.\n"
            "Ver README.md en esta carpeta para los pasos completos."
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
    return cred


def servicio(nombre, version):
    return build(nombre, version, credentials=credenciales(), cache_discovery=False)


if __name__ == "__main__":
    gtm = servicio("tagmanager", "v2")
    cuentas = gtm.accounts().list().execute().get("account", [])
    print(f"Autenticación OK · {len(cuentas)} cuentas de GTM visibles:")
    for c in cuentas:
        print(f"  {c['accountId']:>12}  {c['name']}")
