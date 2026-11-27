#!/usr/bin/env python3
"""Cliente MCP (EMCP Tools) + REST para creativeweb.com.ec."""
import json
import random
import time

import requests

AUTH = ("santysos@hotmail.com", "taYN vXx5 kd3o kbjf j476 Gw64")
WC = (None, None)  # rellenar si se crean claves WooCommerce dedicadas
BASE = "https://www.creativeweb.com.ec"
URL = BASE + "/wp-json/mcp/emcp-tools-server"
HEAD = {"User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) "
                      "AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126 Safari/537.36"}

_session = requests.Session()
_session.auth = AUTH
_sid = None
_rpc = [0]


def _cb():
    return {"cb": random.randint(1, 10 ** 9)}


def init():
    global _sid
    r = _session.post(URL, params=_cb(),
                      headers={**HEAD, "Accept": "application/json, text/event-stream",
                               "Content-Type": "application/json"},
                      json={"jsonrpc": "2.0", "id": 0, "method": "initialize",
                            "params": {"protocolVersion": "2025-03-26", "capabilities": {},
                                       "clientInfo": {"name": "creativeweb", "version": "1.0"}}},
                      timeout=60)
    _sid = r.headers.get("Mcp-Session-Id")
    return _sid


def call(tool, arguments=None, retries=6):
    if _sid is None:
        init()
    _rpc[0] += 1
    for _ in range(retries):
        try:
            r = _session.post(URL, params=_cb(),
                              headers={**HEAD, "Accept": "application/json, text/event-stream",
                                       "Content-Type": "application/json", "Mcp-Session-Id": _sid},
                              json={"jsonrpc": "2.0", "id": _rpc[0], "method": "tools/call",
                                    "params": {"name": tool, "arguments": arguments or {}}},
                              timeout=120)
        except Exception as e:
            print("conn:", str(e)[:60], "— espero 30s", flush=True)
            time.sleep(30)
            continue
        if r.status_code == 429:
            time.sleep(30)
            continue
        out = r.json()
        if "error" in out:
            return {"_error": out["error"]}
        res = out.get("result", {})
        if res.get("structuredContent") is not None:
            return res["structuredContent"]
        txt = "".join(c.get("text", "") for c in res.get("content", []) if c.get("type") == "text")
        try:
            return json.loads(txt)
        except Exception:
            return {"_text": txt, "_isError": res.get("isError")}
    return {"_error": "agotados reintentos"}


# ----- helpers REST -----
def rget(path, **kw):
    return _session.get(BASE + path, headers=HEAD, params=_cb(), timeout=90, **kw)


def rpost(path, payload, **kw):
    return _session.post(BASE + path, headers=HEAD, params=_cb(), json=payload, timeout=90, **kw)


def flush_css():
    _session.delete(BASE + "/wp-json/elementor/v1/cache", headers=HEAD, params=_cb(), timeout=60)
    rget("/")


if __name__ == "__main__":
    init()
    print("sitio:", json.dumps(call("emcp-tools-core-get-site-info"), ensure_ascii=False)[:200])
