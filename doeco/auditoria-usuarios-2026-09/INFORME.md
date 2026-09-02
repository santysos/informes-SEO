# Doeco — auditoría de usuarios · 1 de septiembre de 2026

## Qué pasó

Entre **diciembre de 2024 y diciembre de 2025**, el sitio acumuló ~1.800 cuentas de
cliente falsas. No fue un volcado masivo: se registraron **a goteo, en 637 días
distintos**, con un máximo de 44 en un día. Eso es actividad automatizada sostenida.

| Mes | Altas |
|---|---:|
| Media 2020-2024 | 5-15 |
| Diciembre 2024 | 33 |
| **Febrero 2025** | **457** |
| **Marzo 2025** | **466** |
| Mayo 2025 | 240 |
| 2026 | 1-3 |

## Por dónde entraron

El registro de WordPress está **deshabilitado**, pero WooCommerce lo tenía abierto:

```
woocommerce_enable_myaccount_registration         = yes
woocommerce_enable_signup_and_login_from_checkout = yes
```

El formulario de «Mi cuenta», sin captcha ni límite de intentos. Ese formulario **solo
crea cuentas con rol `customer`**, nunca administradores.

## Los 3 administradores son otra cosa

No pudieron salir de ese formulario. Su origen es distinto y no se ha determinado:
acceso legítimo de un tercero, credencial filtrada, o explotación de un plugin.
Borrarlos **no cierra la puerta**.

Riesgo principal: el plugin **Code Snippets** permite ejecutar PHP desde el panel. Es
el lugar natural para dejar una puerta trasera persistente.

## Cómo se decidió qué borrar

Cruce de las 2.249 cuentas de cliente contra los **287 pedidos** históricos del sitio.

| Grupo | Cuentas | Decisión |
|---|---:|---|
| Con al menos un pedido | 171 | conservar |
| Sin pedido, alta anterior a dic-2024 | 251 | conservar |
| **Sin pedido, alta desde dic-2024** | **1.827** | **borrar** |

El contraste entre cohortes confirma el diagnóstico:

| | Desde dic-2024 | Anteriores |
|---|---:|---:|
| Proveedores de EE.UU. (aol, comcast, att, verizon…) | 27 % | 2 % |
| Dominios basura | 4 % | 0 % |
| Dominios `.ec` | 0 % | 1 % |

Doeco vende empaques a negocios ecuatorianos. Una cohorte con 27 % de correos de
proveedores de internet estadounidenses y cero dominios ecuatorianos no son clientes.

Patrones encontrados: el truco de los puntos de Gmail para multiplicar una misma
dirección (`508gonzales`, `508gonz.ales`, `508g.onza.les`), cadenas aleatorias
(`75fe2325axvjw@eoqjjqg.com`) y 53 cuentas de `smallbutnaughty.com`.

Verificaciones de la lista: **cero** tienen pedidos, **cero** tienen id < 100.
El sitio quedaría con **422 clientes reales**.

## Contenido: limpio

Los cuatro autores con contenido son cuentas conocidas. Lo más reciente son artículos
sobre empaques biodegradables del editor Erick Maigua. Sin inyección de spam.

## Pendiente de cerrar

1. Revisar **Code Snippets** y borrar cualquier snippet desconocido.
2. Desinstalar el plugin **Datafast inactivo**: sigue en disco y es explotable.
3. Poner captcha en el registro de «Mi cuenta», o cerrarlo si no se usa.
4. Rotar contraseñas de las cuentas con privilegios y revocar Application Passwords.
5. Revisar accesos de **ManageWP - Worker**, que da control remoto del sitio.
6. Pedir al hosting los registros de acceso de diciembre 2024 para rastrear a los admin.

---

## Correcciones aplicadas el 1 de septiembre de 2026

**Sufijo de precio.** El ajuste global de WooCommerce decía `por caja + IVA` y se cambió a
`por paquete + IVA`. La frase no estaba escrita en cada producto: WooCommerce la pega a
todos los precios, así que un solo cambio corrigió los 52. Verificado después: cero
productos con «por caja», cero con la frase duplicada.

Queda pendiente, porque no se resuelve con un ajuste: los **10 productos variables** dicen
«por paquete» sin el «+ IVA», y **5 con precio rebajado** no muestran ningún sufijo, así
que ahí no se sabe si el precio es por unidad o por paquete.

**Auditoría de Code Snippets: limpio.** De los 9 snippets, 5 son los ejemplos que trae el
plugin. Los 4 propios son el CPT de Marcas y tres versiones del campo RUC/cédula con
consulta al SRI y al Registro Civil. Ninguno crea usuarios, otorga roles, escribe archivos
ni ejecuta código ofuscado; las llamadas externas van a `srienlinea.sri.gob.ec` y
`si.secap.gob.ec`. Descartada como vía de la puerta trasera.

Nota menor: los dos snippets de RUC contactan `infoplacas.herokuapp.com` como parte de la
cascada. Conviene comprobar si ese servicio sigue vivo.

**reCAPTCHA.** Se instaló en Elementor, pero **no protege el formulario nativo de
WooCommerce**: el `<form>` de registro de `/mi-cuenta/` solo tiene `email`, `password`,
nonce y referer, sin ningún widget. Para cerrarlo hay que engancharlo a
`woocommerce_register_form` y `woocommerce_registration_errors`.

**RESUELTO el 1 de septiembre.** Se creó el snippet **«reCAPTCHA v3 en el registro de
WooCommerce»** (id 10, ámbito global, activo), que reutiliza las claves ya configuradas en
Elementor Pro (`elementor_pro_recaptcha_v3_site_key` / `_secret_key`). Sin plugins nuevos.

Comprobado en vivo: el campo del token está, el script de v3 carga, `grecaptcha.execute`
corre, el formulario sigue intacto y no hay error de PHP.

Decisiones de diseño del snippet:
- Si faltan las claves de Elementor, **no hace nada**: el registro nunca queda roto.
- Si Google no responde, **deja pasar**. Mejor una cuenta basura de más que bloquear a un
  cliente real por una caída ajena.
- Umbral de puntuación **0,5**, el recomendado por Google. Subir a 0,7 si se cuela spam.
- Mensajes de error sin jerga y con salida para el cliente que caiga por error.

El código está versionado en `snippet-recaptcha-woo.php`, junto a este informe.

---

## Resultado de la limpieza · 2 de septiembre de 2026

**1.827 cuentas eliminadas, cero fallos.**

| | Antes | Después |
|---|---:|---:|
| Usuarios totales | 2.253 | **426** |
| Clientes | 2.249 | **422** |
| Administradores | 1 | 1 |
| Editores | 2 | 2 |
| Shop manager | 1 | 1 |

Verificado contra el sitio, no contra el log:

- Los **171 compradores sobrevivieron los 171**. Ninguno se perdió.
- Las cuatro cuentas con privilegios, intactas.
- Los 422 clientes finales coinciden exactamente con lo calculado antes de empezar.

El borrado se hizo en tres tandas con interrupciones, sin ningún problema: el script es
reanudable y en la última versión consulta primero qué ids siguen vivos, así que retomar
cuesta menos de un minuto en vez de veinte.
