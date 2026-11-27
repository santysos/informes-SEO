#!/usr/bin/env python3
"""Sube cw-kit.css al custom_css del kit 1873 y limpia la caché de Elementor."""
import time

import emcp

if __name__ == "__main__":
    for _ in range(6):
        try:
            emcp.init()
            break
        except Exception:
            time.sleep(8)
    css = open("cw-kit.css").read()
    print("kit css:", emcp.call("emcp-tools-update-page-settings",
                                {"post_id": 1873, "settings": {"custom_css": css}}),
          f"({len(css)} bytes)")
    emcp.flush_css()
    print("OK")
