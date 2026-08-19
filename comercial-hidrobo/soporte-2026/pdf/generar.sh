#!/bin/bash
# Regenera los dos PDF de cotización desde los HTML.
cd "$(dirname "$0")"
python3 plantilla.py
CHROME="/Applications/Google Chrome.app/Contents/MacOS/Google Chrome"
for f in cot-1-sitio cot-2-sitios; do
  "$CHROME" --headless=new --disable-gpu --no-pdf-header-footer \
    --print-to-pdf="$f.pdf" --virtual-time-budget=9000 "file://$PWD/$f.html" 2>/dev/null
  echo "  $f.pdf  ($(du -h "$f.pdf" | cut -f1))"
done
