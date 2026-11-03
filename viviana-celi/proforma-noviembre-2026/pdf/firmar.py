#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Firma electrónicamente las proformas 1-2-1337 con el certificado .p12 de Santiago Oña.

La clave se pide en la terminal y no se guarda ni se muestra. Correr desde la raíz del repo:

    .venv/bin/python viviana-celi/proforma-noviembre-2026/pdf/firmar.py /ruta/a/firma.p12

Deja junto a cada PDF su copia «-firmada.pdf», con el sello visible encima del nombre.
"""
import getpass, os, sys

from pyhanko.pdf_utils.incremental_writer import IncrementalPdfFileWriter
from pyhanko.sign import fields, signers
from pyhanko.stamp import TextStampStyle

HERE = os.path.dirname(os.path.abspath(__file__))
PDFS = ["proforma-1-2-1337-tienda.pdf", "proforma-1-2-1337-tienda-foto-video.pdf"]

# Caja del sello en puntos desde la esquina inferior izquierda (A4 = 595 x 842):
# el hueco que queda encima de «Ing. Santiago Oña Sánchez».
CAJA = (36, 66, 250, 118)

ESTILO = TextStampStyle(
    stamp_text="Firmado electrónicamente por:\n%(signer)s\nFecha: %(ts)s",
    timestamp_format="%d/%m/%Y %H:%M",
    border_width=0,
)


def main():
    if len(sys.argv) != 2:
        sys.exit("Uso: firmar.py /ruta/a/firma.p12")
    p12 = sys.argv[1]
    clave = getpass.getpass("Clave del certificado: ").encode()
    firmante = signers.SimpleSigner.load_pkcs12(p12, passphrase=clave)
    if firmante is None:
        sys.exit("No se pudo abrir el certificado: revisa la ruta o la clave.")

    for nombre in PDFS:
        origen = os.path.join(HERE, nombre)
        destino = origen.replace(".pdf", "-firmada.pdf")
        with open(origen, "rb") as f:
            w = IncrementalPdfFileWriter(f)
            meta = signers.PdfSignatureMetadata(
                field_name="Firma", reason="Proforma 1-2-1337", location="Otavalo, Ecuador")
            pdf_signer = signers.PdfSigner(
                meta, signer=firmante, stamp_style=ESTILO,
                new_field_spec=fields.SigFieldSpec("Firma", on_page=0, box=CAJA))
            with open(destino, "wb") as out:
                pdf_signer.sign_pdf(w, output=out)
        print("  firmada:", destino)


if __name__ == "__main__":
    main()
