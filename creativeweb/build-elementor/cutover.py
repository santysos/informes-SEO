#!/usr/bin/env python3
"""CUTOVER (confirmado por el usuario) — el diseño 2026 pasa a producción.
1) Respaldo de las páginas reales.  2) Volcado *-2026 → reales.  3) Menú a URLs finales.
4) Portada → 3643 (Yoast heredado de 184).  5) 184 y *-2026 a borrador + redirect.
"""
import json
import os
import random

import emcp

PARES = {  # real: 2026
    3624: 3656, 3625: 3663, 3629: 3670, 3626: 3677, 3627: 3684,
    3630: 3691, 3631: 3698, 293: 3705, 253: 3712, 929: 3719,
}
HOME_2026 = 3643
HOME_VIEJA = 184

LINKS_FINALES = {
    "/inicio-2026/": "/",
    "/servicios-2026/": "/servicios/",
    "/quienes-somos-2026/": "/quienes-somos/",
    "/contactanos-2026/": "/contactanos/",
}


def rest(metodo, path, payload=None):
    fn = emcp._session.post if metodo == "post" else emcp._session.get
    kw = {"headers": emcp.HEAD, "params": {"cb": random.randint(1, 10**9)}, "timeout": 90}
    if payload is not None:
        kw["json"] = payload
    return fn(emcp.BASE + path, **kw)


emcp.init()

# ---------- 1. respaldos ----------
print("== respaldos")
os.makedirs("backups-cutover", exist_ok=True)
for pid in list(PARES) + [HOME_VIEJA]:
    ex = emcp.call("emcp-tools-export-page", {"post_id": pid})
    open(f"backups-cutover/pagina-{pid}.json", "w").write(json.dumps(ex, ensure_ascii=False))
    r = rest("get", f"/wp-json/wp/v2/pages/{pid}?context=edit&_fields=id,slug,title,meta,template,content")
    open(f"backups-cutover/pagina-{pid}-rest.json", "w").write(json.dumps(r.json(), ensure_ascii=False))
    print(f"  respaldada {pid}")

# ---------- 2. volcado 2026 -> reales ----------
print("== volcado de contenido")
for real, nueva in PARES.items():
    ex = emcp.call("emcp-tools-export-page", {"post_id": nueva})
    arbol = None
    if isinstance(ex, dict):
        for v in ex.values():
            if isinstance(v, list) and v and isinstance(v[0], dict) and v[0].get("elType"):
                arbol = v
                break
    if not isinstance(arbol, list):
        print(f"  !! {real}: no pude extraer árbol de {nueva} — SALTADA")
        continue
    emcp.call("emcp-tools-delete-page-content", {"post_id": real})
    ri = emcp.call("emcp-tools-import-template", {"post_id": real, "template_json": arbol})
    rest("post", f"/wp-json/wp/v2/pages/{real}", {
        "template": "elementor_canvas",
        "meta": {"_elementor_edit_mode": "builder", "_elementor_template_type": "wp-page"}})
    emcp.call("emcp-tools-update-page-settings", {"post_id": real, "settings": {"hide_title": "yes"}})
    print(f"  {nueva} -> {real}: elementos={ri.get('elements_count')}")

# ---------- 3. menú a URLs finales ----------
print("== menú a URLs finales")
for pid in list(PARES.keys()) + [HOME_2026]:
    st = emcp.call("emcp-tools-get-page-structure", {"post_id": pid})
    widgets = []

    def walk(els):
        for e in els:
            if e.get("widgetType") == "html":
                widgets.append(e["id"])
            walk(e.get("elements", []))
    walk(st.get("structure", []))
    ops = []
    for wid in widgets:
        r = emcp.call("emcp-tools-get-element-settings", {"post_id": pid, "element_id": wid})
        s = r.get("settings", r) if isinstance(r, dict) else {}
        h = s.get("html", "") if isinstance(s, dict) else ""
        if any(k in h for k in LINKS_FINALES):
            nuevo = h
            for viejo, final in LINKS_FINALES.items():
                nuevo = nuevo.replace(viejo, final)
            ops.append({"element_id": wid, "settings": {"html": nuevo}})
    if ops:
        emcp.call("emcp-tools-batch-update", {"post_id": pid, "operations": ops})
    print(f"  {pid}: {len(ops)} widgets de menú actualizados")

# ---------- 4. portada ----------
print("== portada")
r = rest("get", f"/wp-json/wp/v2/pages/{HOME_VIEJA}?context=edit&_fields=meta")
m = r.json().get("meta", {})
rest("post", f"/wp-json/wp/v2/pages/{HOME_2026}", {
    "status": "publish",
    "meta": {
        "_yoast_wpseo_title": m.get("_yoast_wpseo_title") or "",
        "_yoast_wpseo_metadesc": m.get("_yoast_wpseo_metadesc") or "",
        "_yoast_wpseo_canonical": "https://www.creativeweb.com.ec/",
    }})
r = rest("post", "/wp-json/wp/v2/settings", {"page_on_front": HOME_2026, "show_on_front": "page"})
print("  page_on_front:", r.json().get("page_on_front"))

# ---------- 5. retiradas + redirect ----------
print("== retiradas")
r = rest("post", f"/wp-json/wp/v2/pages/{HOME_VIEJA}", {"status": "draft"})
print("  184 -> draft:", r.status_code)
for nueva in PARES.values():
    rest("post", f"/wp-json/wp/v2/pages/{nueva}", {"status": "draft"})
print("  *-2026 -> draft")

slug_vieja = "creativeweb-desarrollo-web-wordpress-hosting-dominios-correos-corporativos-software-a-medida"
r = rest("post", "/wp-json/redirection/v1/redirect", {
    "url": f"/{slug_vieja}/", "match_type": "url", "action_type": "url",
    "action_code": 301, "action_data": {"url": "/"}, "group_id": 1})
print("  redirect 301 home vieja:", r.status_code, str(r.text)[:120])

# ---------- 6. caché elementor ----------
emcp.flush_css()
print("  elementor cache limpiado")
print("CUTOVER TERMINADO")
