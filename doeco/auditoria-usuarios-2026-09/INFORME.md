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
