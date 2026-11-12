#!/usr/bin/env python3
"""Instala y activa Redirection en comercialhidrobo.com por API y crea sus tablas."""
import json, time, urllib.request, urllib.error
from pilar_electricos import H, BASE
def jcall(method, path, body=None):
    req = urllib.request.Request(BASE + "/wp-json" + path, data=json.dumps(body).encode() if body else None, headers=H, method=method)
    try:
        r = urllib.request.urlopen(req, timeout=180); return r.getcode(), json.loads(r.read() or b"{}")
    except urllib.error.HTTPError as e: return e.code, e.read().decode()[:300]
print("instalar:", jcall("POST", "/wp/v2/plugins", {"slug": "redirection", "status": "active"}))
time.sleep(15)
print("home:", urllib.request.urlopen(urllib.request.Request(BASE + "/", headers=H), timeout=60).getcode())
for i in range(12):
    time.sleep(8)
    c, r = jcall("POST", "/redirection/v1/plugin/data", {"upgrade": "retry"})
    estado = r.get("status") if isinstance(r, dict) else r
    print(i, c, estado, (r.get("result") if isinstance(r, dict) else ""))
    if estado == "finish-install" or (isinstance(r, dict) and r.get("complete") == 100): break
