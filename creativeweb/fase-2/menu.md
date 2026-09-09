# El menú de navegación

Reorganizado el 2026-09-09. Respaldo del estado anterior en `menu-antes.json`.

## Cómo quedó

El menú activo es **Creative Web Header** (id 44). Pasó de 9 a 17 elementos.

```
Inicio
Empresa
Servicios ▾
    Páginas Web
    Tiendas Online
    Correos Corporativos
    Hosting Web
    Dominios
    SEO y Posicionamiento
Productos ▾
    Quipuy · Facturación electrónica
    Facturación en tu tienda
    Motrix · Consultorios
    DentiLab · Clínicas dentales
    Probador Virtual
Blog
Contáctanos
```

## Por qué se separó en dos

Once entradas en un solo desplegable no se leen. La división también dice algo cierto sobre
el negocio: **Servicios** es lo recurrente, lo que se contrata y se renueva; **Productos** es
software que construimos, que es lo que ninguna agencia de la zona puede ofrecer.

Es la arquitectura que planteaba el plan, y ahora existe en la navegación y no solo en un
documento.

## Detalles

- «Correos Corporativos Empresariales» se acortó a **«Correos Corporativos»**: en un menú, la
  palabra de más estorba.
- **Tiendas Online** quedó en segundo lugar, junto a Páginas Web, porque es la misma decisión
  de compra vista desde otro ángulo.
- **SEO y Posicionamiento** va al final del grupo: es el servicio que se contrata *después* de
  tener el sitio.

## Basura de la plantilla original, sin tocar

Al revisar aparecieron seis menús más, ninguno asignado a una ubicación, con restos del tema
que se usó al construir el sitio: entradas hacia `templatemonster.com`, hacia el subdominio de
desarrollo `crwb.creativeweb.com.ec`, y páginas de ejemplo tipo «SEO Copywriting» o
«Geo-targeted SEO» apuntando a `/?p=299`.

**No se tocaron**: no se muestran en el sitio y borrarlos no aporta nada hoy. Queda anotado
por si algún día se limpia la instalación.
