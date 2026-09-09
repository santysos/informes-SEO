# Página de correos corporativos — cambio de enfoque

2026-09-09. Reescrita a pedido del usuario.

## Qué estaba mal

La primera versión que escribí explicaba puertos 993 y 465, la diferencia entre IMAP y POP3,
y los registros SPF y DKIM. La página original ya traía «Registro SPF + DKIM» y «Cuentas de
correo IMAP - POP3 con SMTP» como si fueran argumentos de venta.

**A quien busca un correo con el nombre de su empresa no le interesa nada de eso.** Peor:
lo ahuyenta, porque le hace sentir que va a tener que aprender algo.

## Qué dice ahora

El argumento pasó a ser el que de verdad nos diferencia de Google, Microsoft y los hosting
internacionales: **que hay alguien del otro lado.**

Las cuatro secciones nuevas:

1. **«No lo va a hacer solo»** — con un proveedor grande usted queda con un manual. Acá lo
   acompañamos hasta que su primer correo esté funcionando y haya enviado un mensaje de
   prueba.
2. **«Soporte por WhatsApp, con una persona»** — sin formulario, sin número de ticket, sin
   esperar 48 horas. Es lo que ningún proveedor grande puede ofrecer.
3. **«Nos encargamos de que sus correos lleguen»** — el problema de terminar en spam,
   explicado por su consecuencia y no por su solución técnica. La configuración la hacemos
   nosotros y el cliente no toca nada.
4. **«Funciona donde usted ya trabaja»** — Gmail, Outlook, celular, navegador. Sin nombres de
   protocolos.

## Las traducciones que se hicieron

| Antes | Ahora |
|---|---|
| «Registro SPF + DKIM» | «Tus correos llegan a la bandeja, no al spam» |
| «Cuentas de correo IMAP - POP3 con SMTP» | «Se lee desde Gmail, Outlook, el celular o el navegador» |
| «Configuramos los registros SPF y DKIM de forma automática…» | «Dejamos tu correo configurado para que llegue a la bandeja de entrada y no a la carpeta de spam. Usted no tiene que tocar nada.» |

El criterio quedó guardado en memoria como `feedback-lenguaje-publico`: el término técnico se
convierte en promesa, y si un dato hace falta va en preguntas frecuentes, nunca en el
argumento principal.

## Título y descripción

- **T (56):** Correos corporativos en Ecuador con soporte por WhatsApp
- **D (150):** Correo con el dominio de tu empresa, configurado por nosotros hasta que envíes
  el primero. Soporte por WhatsApp con una persona, no con un formulario.

El título lleva el diferenciador al frente, que es lo que ninguna de las empresas grandes
puede poner en el suyo.

## Pendiente

Elementor sirve una copia cacheada: en la base de datos la jerga ya no existe, pero la página
publicada sigue mostrándola. Hace falta **Elementor → Herramientas → Regenerar archivos y
datos** para que salga.
