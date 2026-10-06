# Brief — fichas de producto de La Casa del Bandolín (octubre 2026)

Tienda de instrumentos andinos en Otavalo, Ecuador (lacasadelbandolin.com). 51 fichas tienen
descripciones de menos de 80 palabras. Hay que reescribirlas para que **vendan**: que quien llega
desde Google entienda qué es el instrumento, para quién conviene y cómo comprarlo.

Los datos de cada producto están en `fuente.json` (nombre, categoría, descripción actual,
descripción corta y atributos).

## Regla número 1: no inventar especificaciones

- **Solo** puedes afirmar datos del producto que estén en su `fuente.json`: medidas, colores,
  notas de afinación, número de tubos, material **si está escrito**, marca/modelo del nombre.
- **Prohibido inventar:** maderas, tipo de caña, medidas, peso, número de cuerdas o tubos que no
  estén en la fuente, «hecho a mano», «artesanal», luthier, garantía, tiempo de fabricación,
  incluye estuche/funda, calibración, etc. Si no está en la fuente, no lo digas.
- **Sí puedes** usar conocimiento general y cierto del tipo de instrumento: qué es una quena, cómo
  se usa la zampoña en la música andina, qué es un rondín en Imbabura, para qué sirven las
  chajchas. Sin cifras.
- No escribas precios (los muestra la tienda).
- El validador marca cualquier número que no esté en la fuente; si aparece, sácalo.

## Datos verificados de la tienda (puedes usarlos)

- Tienda física en **Otavalo, Ecuador**; se puede **retirar en la tienda**.
- **Envío a todo el Ecuador**, **gratis desde $99,99**; **envíos al exterior** (Sudamérica,
  Norteamérica y Europa).
- Pago con tarjeta y PayPal (y transferencia dentro de Ecuador).
- Asesoría por **WhatsApp 098 078 8561**.

## Estructura (HTML simple, 150-280 palabras)

```html
<p>Párrafo de entrada: qué es y por qué este modelo (2-3 frases, sin relleno).</p>
<h3>Características</h3>
<ul><li>Solo datos de la fuente (medidas, notas, colores, modelo…)</li></ul>
<h3>¿Para quién es?</h3>
<p>Uso y nivel: principiante, grupo de música andina, coleccionista, danza… según el tipo de instrumento.</p>
<h3>Compra con confianza</h3>
<p>Envío a todo el Ecuador (gratis desde $99,99) y al exterior, o retíralo en nuestra tienda de Otavalo.
<a href="{WA}">¿Tienes dudas? Escríbenos por WhatsApp</a>.</p>
```

`{WA}` = `https://wa.me/593980788561?text=` + texto codificado (urllib.parse.quote) tipo
«Hola, me interesa {nombre del producto} que vi en lacasadelbandolin.com. ¿Me ayudan?»

## Voz

Español neutro ecuatoriano, **tuteo**, cercano y concreto. Nada de: «en el mundo actual», «sin
lugar a dudas», «calidad premium», «la mejor opción», «experiencia única», «transporta», «sumérgete»,
«joya», «obra maestra». Frases cortas.

## Entrega

`despues/{id}.json`: `{"id": 123, "description": "<p>…</p>…"}`.
Valida con `python3 validar.py despues/{id}.json` hasta OK. No publiques nada ni toques WordPress.
