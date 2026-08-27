#!/bin/bash
# Genera los HTML y sus PDF de una hoja. Correr desde la raíz del repo.
set -e
cd "$(dirname "$0")/.."
python3 tools/generar_pdfs.py
CHROME="/Applications/Google Chrome.app/Contents/MacOS/Google Chrome"
python3 - <<'PY' > /tmp/rutas_pdf.txt
import sys, os
sys.path.insert(0, "tools")
import generar_pdfs
print("\n".join(generar_pdfs.DOCS.keys()))
PY
while read -r r; do
  [ -z "$r" ] && continue
  "$CHROME" --headless=new --disable-gpu --no-pdf-header-footer \
    --print-to-pdf="$r.pdf" --virtual-time-budget=9000 "file://$PWD/$r.html" 2>/dev/null
  printf "  %-58s %s\n" "$r.pdf" "$(du -h "$r.pdf" | cut -f1)"
done < /tmp/rutas_pdf.txt
