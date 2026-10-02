#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Constantes y helpers de la serie UAFE del blog de creativeweb.com.ec.

Tono: TÚ (como el resto del sitio). Sin jerga técnica. Los datos legales salen SOLO de
DATOS-VERIFICADOS.md. No hacemos el trámite ante la UAFE ni damos asesoría legal.
"""
import json
import os
import re
from urllib.parse import quote

AQUI = os.path.dirname(os.path.abspath(__file__))
SITE = "https://www.creativeweb.com.ec"
LANDING = f"{SITE}/servicios/correo-institucional-uafe/"
CORREOS = f"{SITE}/servicios/correos-corporativos-empresariales/"
DOMINIOS = f"{SITE}/servicios/comprar-dominio-ecuador/"
TUTORIAL_GMAIL = f"{SITE}/configurar-cuenta-correo-corporativo-gmail/"
SRIFLOW = f"{SITE}/servicios/sriflow-descargar-comprobantes-sri/"
WA = "593999174980"
CAT_NOTICIAS = 67
CITA = "Equipo de Creative Web"

# fuentes oficiales (enlaces externos permitidos)
UAFE_OFICIAL = "https://www.uafe.gob.ec/registro-o-cambio-del-oficial-de-cumplimiento-titular-y-o-suplente/"
UAFE_CODIGO = "https://www.uafe.gob.ec/solicitud-de-codigo-de-registro/"

# la serie: slug -> (fecha, título corto para anclas)
SERIE = {
    "que-correo-pide-la-uafe": ("2026-10-05T09:00:00", "qué correo pide la UAFE"),
    "sujeto-obligado-uafe-como-saber": ("2026-10-12T09:00:00", "cómo saber si eres sujeto obligado"),
    "ruc-suspendido-uafe-que-hacer": ("2026-10-19T09:00:00", "qué hacer si te suspendieron el RUC"),
    "oficial-de-cumplimiento-uafe-requisitos": ("2026-10-26T09:00:00", "requisitos del oficial de cumplimiento"),
    "codigo-de-registro-uafe-requisitos": ("2026-11-02T09:00:00", "qué tener listo para el código de registro"),
    "uafe-contadores-abogados": ("2026-11-09T09:00:00", "la UAFE para contadores y abogados"),
}


def url(slug):
    return f"{SITE}/{slug}/"


def p(t):
    return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"


def h2(t):
    return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'


def h3(t):
    return (f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{t}</h3>\n'
            f"<!-- /wp:heading -->")


def _lista(items, ordenada):
    lis = "".join(f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->\n" for i in items)
    if ordenada:
        return ('<!-- wp:list {"ordered":true} -->\n<ol class="wp-block-list">\n'
                f"{lis}</ol>\n<!-- /wp:list -->")
    return f'<!-- wp:list -->\n<ul class="wp-block-list">\n{lis}</ul>\n<!-- /wp:list -->'


def tabla(head, rows):
    th = "".join(f"<th>{h}</th>" for h in head)
    tb = "".join("<tr>" + "".join(f"<td>{c}</td>" for c in r) + "</tr>" for r in rows)
    return ('<!-- wp:table -->\n<figure class="wp-block-table"><table class="has-fixed-layout">'
            f"<thead><tr>{th}</tr></thead><tbody>{tb}</tbody></table></figure>\n<!-- /wp:table -->")


def quote_(texto, autor=CITA):
    return ('<!-- wp:quote -->\n<blockquote class="wp-block-quote">\n'
            f"<!-- wp:paragraph -->\n<p>{texto}</p>\n<!-- /wp:paragraph -->\n"
            f"<cite>{autor}</cite>\n</blockquote>\n<!-- /wp:quote -->")


def link(u, t):
    return f'<a href="{u}">{t}</a>'


def wa(msg):
    return f"https://wa.me/{WA}?text={quote(msg)}"


def render(bloques):
    out = []
    for b in bloques:
        if isinstance(b, str):
            out.append(p(b))
        elif "h2" in b:
            out.append(h2(b["h2"]))
        elif "h3" in b:
            out.append(h3(b["h3"]))
        elif "ul" in b:
            out.append(_lista(b["ul"], False))
        elif "ol" in b:
            out.append(_lista(b["ol"], True))
        elif "quote" in b:
            out.append(quote_(b["quote"]))
        elif "tabla" in b:
            out.append(tabla(b["tabla"][0], b["tabla"][1:]))
        elif "faq" in b:
            out.append(h2(b.get("faq_titulo", "Preguntas frecuentes")))
            for q, a in b["faq"]:
                out.append(h3(q))
                out.append(p(a))
    return "\n\n".join(out)


def guarda(spec):
    d = {
        "title": spec["title"], "slug": spec["slug"], "status": "future",
        "date": SERIE[spec["slug"]][0], "categories": [CAT_NOTICIAS],
        "tags": spec["tags"], "excerpt": spec["excerpt"],
        "featured_media": spec["imagen"],
        "meta": {"_yoast_wpseo_title": spec["yoast_title"],
                 "_yoast_wpseo_metadesc": spec["yoast_desc"],
                 "_yoast_wpseo_focuskw": spec["focus_kw"]},
        "content": render(spec["bloques"]),
    }
    ruta = os.path.join(AQUI, "posts", f"spec-{spec['slug']}.json")
    json.dump(d, open(ruta, "w", encoding="utf-8"), ensure_ascii=False, indent=1)
    return ruta, len(re.sub(r"<[^>]+>", " ", d["content"]).split())
