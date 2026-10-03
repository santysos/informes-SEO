#!/usr/bin/env python3
"""Actualiza en el sitio los 6 posts YA PUBLICADOS de la serie UAFE con el contenido de los
specs de posts/ (título, excerpt, contenido y metas de Yoast), sin tocar fecha ni estado.
Vuelve a agregar el bloque «Sigue la serie» al final.

Creado el 2-oct-2026 para aplicar la regla de formato de correos de la UAFE
(personalizados, nombre y apellido, nada de departamentales ni dominio de terceros).
"""
import json
import os

from comun import SERIE
from publicar_ya import AQUI, bloque_serie, call


def main():
    for slug in SERIE:
        spec = json.load(open(os.path.join(AQUI, "posts", f"spec-{slug}.json"), encoding="utf-8"))
        r = call("GET", "/posts", params={"slug": slug, "status": "publish",
                                          "_fields": "id,status"})
        posts = r.json()
        if len(posts) != 1:
            print(f"!! {slug}: {len(posts)} resultados, lo salto")
            continue
        pid = posts[0]["id"]
        r = call("POST", f"/posts/{pid}", json={
            "title": spec["title"], "excerpt": spec["excerpt"],
            "content": spec["content"] + bloque_serie(slug), "meta": spec["meta"]})
        j = r.json()
        c = j.get("content", {}).get("raw", "") if isinstance(j.get("content"), dict) else ""
        print(f"{pid} {slug}: {r.status_code} {j.get('status')} "
              f"departamental={'cumplimiento@' in c and 'Así no' not in c}")


if __name__ == "__main__":
    main()
