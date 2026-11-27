"""Helpers para construir árboles de Elementor (EMCP Tools) — Valencia Sports."""
import random
import re

_used = set()


def eid():
    while True:
        v = f"{random.randint(0, 0xfffffff):07x}"
        if v not in _used:
            _used.add(v)
            return v


def px(v):
    return {"unit": "px", "size": v, "sizes": []}


def pad(t, r, b, l):
    return {"top": str(t), "right": str(r), "bottom": str(b), "left": str(l),
            "unit": "px", "isLinked": False}


def gap(v):
    return {"column": str(v), "row": str(v), "isLinked": True, "unit": "px", "size": v}


def C(children, cls="", **s):
    """Contenedor (clases -> css_classes)."""
    st = {"content_width": "boxed", "flex_direction": "column"}
    st.update(s)
    if cls:
        st["css_classes"] = cls
    return {"id": eid(), "elType": "container", "settings": st,
            "elements": children, "isInner": False}


def W(wtype, cls="", **s):
    """Widget (clases -> _css_classes)."""
    if cls:
        s["_css_classes"] = cls
    return {"id": eid(), "elType": "widget", "widgetType": wtype, "settings": s,
            "elements": []}


def H(title, tag="h2", cls="", color=None, size=None, align=None, weight=None):
    # `<span class="l2">` hace el salto de línea visual, pero si va pegado al texto
    # anterior el H1 se serializa sin espacio y Google lee «páginas web quesalen en
    # google». El espacio es invisible (el span es display:block) y arregla el texto.
    title = re.sub(r'(?<=\S)<span class="l2">', ' <span class="l2">', title)
    s = {"title": title, "header_size": tag}
    if color:
        s["title_color"] = color
    if align:
        s["align"] = align
    if size or weight:
        s["typography_typography"] = "custom"
    if size:
        s["typography_font_size"] = px(size)
    if weight:
        s["typography_font_weight"] = str(weight)
    return W("heading", cls, **s)


def T(html, cls="", color=None, align=None):
    s = {"editor": html}
    if color:
        s["text_color"] = color
    if align:
        s["align"] = align
    return W("text-editor", cls, **s)


def BTN(text, url, cls="vs-btn vs-btn-rojo", icon=None, lib="fa-solid",
        align="right", target=False, size="md"):
    s = {"text": text, "size": size, "_element_width": "auto",
         "link": {"url": url, "is_external": "on" if target else "", "nofollow": ""}}
    if icon:
        s["selected_icon"] = {"value": icon, "library": lib}
        s["icon_align"] = align
    return W("button", cls, **s)


def ICON(icon, url=None, cls="vs-icon-btn", lib="fa-solid", size=17, color="#1f1646"):
    s = {"selected_icon": {"value": icon, "library": lib}, "view": "default",
         "primary_color": color, "size": px(size), "align": "center"}
    if url:
        s["link"] = {"url": url, "is_external": "", "nofollow": ""}
    return W("icon", cls, **s)


_MEDIA_URL = {}


def _media_url(mid):
    if mid not in _MEDIA_URL:
        import emcp
        r = emcp.rget(f"/wp-json/wp/v2/media/{mid}")
        _MEDIA_URL[mid] = r.json().get("source_url", "") if r.status_code == 200 else ""
    return _MEDIA_URL[mid]


def IMG(mid, cls="", h=None, url=None):
    s = {"image": {"id": mid, "url": _media_url(mid)}, "image_size": "full"}
    if h:
        s["width"] = {"unit": "px", "size": h, "sizes": []}
    if url:
        s["link_to"] = "custom"
        s["link"] = {"url": url, "is_external": "", "nofollow": ""}
    return W("image", cls, **s)


def LIST(items, cls="", icon=None, lib="fa-solid", inline=True, color=None):
    lst = []
    for it in items:
        txt, url = (it, None) if isinstance(it, str) else it
        e = {"text": txt, "_id": eid()[:7],
             "selected_icon": {"value": icon, "library": lib} if icon else {"value": "", "library": ""}}
        if url:
            e["link"] = {"url": url, "is_external": "", "nofollow": ""}
        lst.append(e)
    s = {"icon_list": lst}
    if inline:
        s["view"] = "inline"
    if color:
        s["text_color"] = color
    return W("icon-list", cls, **s)


def NAV(menu_id, cls="vs-menu"):
    return W("nav-menu", cls, menu=str(menu_id), layout="horizontal",
             pointer="none", submenu_icon="none")


def shape(l):
    return [(e["elType"], e.get("widgetType", ""), shape(e.get("elements", [])))
            for e in l]


def aplicar_clases(tree, post_id, mcp):
    """Reaplica css_classes a los contenedores tras import (el import las descarta)."""
    st = mcp.call("emcp-tools-get-page-structure", {"post_id": post_id})
    st = st.get("structure", st) if isinstance(st, dict) else st
    ops = []

    def pair(mine, real):
        for m, r in zip(mine, real):
            if m["elType"] == "container" and m["settings"].get("css_classes"):
                ops.append({"element_id": r["id"],
                            "settings": {"css_classes": m["settings"]["css_classes"]}})
            pair(m.get("elements", []), r.get("elements", []))

    pair(tree, st)
    if ops:
        mcp.call("emcp-tools-batch-update", {"post_id": post_id, "operations": ops})
    return len(ops)
