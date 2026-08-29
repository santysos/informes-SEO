<?php
session_start();
if (empty($_SESSION['auth_vyv'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Trabajos Adicionales &mdash; Multitecnolog&iacute;a VYV</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  --noche:#0a0f1a; --carbon:#131c2e; --carbon2:#0e1626; --rojo:#e94560; --rojo-osc:#c81e43;
  --verde:#34d39e; --hueso:#eef2f8; --niebla:#94a3b8; --linea:rgba(255,255,255,.10);
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Sora',system-ui,sans-serif;background:var(--noche);color:var(--hueso);line-height:1.6}
.wrap{max-width:820px;margin:0 auto;padding:0 28px}
.eyebrow{display:inline-block;font-family:'JetBrains Mono',monospace;font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--rojo);margin-bottom:14px}
h1{font-size:clamp(26px,4.2vw,40px);font-weight:800;line-height:1.14;letter-spacing:-.01em;margin-bottom:16px}
h2{font-size:clamp(19px,2.8vw,26px);font-weight:700;line-height:1.2;margin-bottom:10px;letter-spacing:-.01em}
.p{color:var(--niebla);font-size:16px;max-width:66ch;margin-bottom:14px}
.lead{color:var(--hueso);font-size:clamp(16px,2vw,18px);max-width:62ch;opacity:.92}
strong{color:var(--hueso)}
.nav{position:sticky;top:0;z-index:50;background:rgba(10,15,26,.86);backdrop-filter:blur(12px);border-bottom:1px solid var(--linea)}
.navwrap{display:flex;align-items:center;justify-content:space-between;height:58px}
.nav-logo{font-weight:800;font-size:16px;color:var(--hueso)}
.nav-logo span{color:var(--rojo)}
.nav .out{color:var(--niebla);text-decoration:none;font-size:12.5px;border:1px solid var(--linea);padding:6px 12px;border-radius:9px}
.nav .out:hover{border-color:var(--rojo);color:var(--rojo)}
.hero{padding:52px 0 40px;background:radial-gradient(800px 500px at 20% 0%, rgba(233,69,96,.16), transparent 60%),var(--noche);border-bottom:1px solid var(--linea)}
.meta{display:flex;flex-wrap:wrap;gap:8px 26px;margin-top:20px;font-size:13.5px;color:var(--niebla)}
.meta strong{color:var(--hueso)}
.sec{padding:42px 0;border-bottom:1px solid var(--linea)}
.sec.alt{background:linear-gradient(180deg,var(--carbon2),var(--noche))}
.items{list-style:none;display:grid;gap:16px;margin-top:8px}
.items li{background:rgba(19,28,46,.5);border:1px solid var(--linea);border-radius:13px;padding:16px 20px}
.items h3{font-size:16px;font-weight:700;margin-bottom:4px}
.items p{color:var(--niebla);font-size:14.5px;margin:0}
.solic{display:inline-block;margin-top:9px;font-family:'JetBrains Mono',monospace;font-size:11.5px;color:var(--rojo);background:rgba(233,69,96,.10);padding:3px 10px;border-radius:999px}
.cuadro{background:rgba(19,28,46,.55);border:1px solid var(--linea);border-radius:14px;overflow:hidden;margin-top:14px;max-width:520px}
.fila{display:flex;justify-content:space-between;align-items:center;gap:16px;padding:15px 22px;border-bottom:1px solid var(--linea);font-size:15.5px;color:var(--niebla)}
.fila:last-child{border-bottom:none}
.fila strong{color:var(--hueso);font-variant-numeric:tabular-nums}
.fila.total{background:rgba(233,69,96,.12)}
.fila.total span,.fila.total strong{color:#fff;font-size:18px;font-weight:800}
.nota{margin-top:12px;font-size:13px;color:var(--niebla)}
.valorbox{margin-top:18px;background:linear-gradient(135deg, rgba(233,69,96,.12), rgba(19,28,46,.55));border:1px solid rgba(233,69,96,.35);border-radius:16px;padding:28px 30px;max-width:460px;text-align:center}
.valorbox .monto{font-size:42px;font-weight:800;color:#fff;line-height:1;font-variant-numeric:tabular-nums}
.valorbox .monto small{font-size:17px;font-weight:600;color:var(--niebla)}
.valorbox .sub{margin-top:9px;font-size:14px;color:var(--niebla)}
footer{padding:38px 0 56px;color:var(--niebla);font-size:13px}
footer b{color:var(--hueso)}
</style>
</head>
<body>

<div class="nav">
  <div class="wrap navwrap">
    <div class="nav-logo">Creative <span>Web</span></div>
    <a class="out" href="logout.php">Salir</a>
  </div>
</div>

<header class="hero">
  <div class="wrap">
    <span class="eyebrow">Trabajos adicionales &middot; Agosto 2026</span>
    <h1>Trabajos adicionales realizados en su tienda</h1>
    <p class="lead">Un breve resumen de las tareas y desarrollos que realizamos para Multitecnolog&iacute;a VYV, adicionales al proyecto inicial (proforma&nbsp;#1-10-9819).</p>
    <div class="meta">
      <span>Preparado para: <strong>Multitecnolog&iacute;a VYV</strong></span>
      <span>28 de agosto de 2026</span>
    </div>
  </div>
</header>

<!-- TRABAJOS ADICIONALES -->
<section class="sec">
  <div class="wrap">
    <p class="p">Ante todo, le agradecemos la confianza depositada en Creative Web. A lo largo del proyecto fueron surgiendo, a su solicitud, varias tareas y desarrollos adicionales para mejorar y hacer crecer su tienda. Con gusto se los resumimos:</p>
    <ul class="items">
      <li>
        <h3>Migraci&oacute;n del sitio anterior (PrestaShop)</h3>
        <p>Reubicaci&oacute;n del sistema anterior a un nuevo dominio, migraci&oacute;n de m&aacute;s de 1.600 productos y vinculaci&oacute;n de aproximadamente 1.777 im&aacute;genes.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Depuraci&oacute;n y normalizaci&oacute;n del cat&aacute;logo</h3>
        <p>Correcci&oacute;n de nombres, reorganizaci&oacute;n de productos y atributos, y auditor&iacute;as de inventario.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Sistema de env&iacute;os por ciudad</h3>
        <p>Complemento propio para env&iacute;os por ciudad y provincia con m&uacute;ltiples transportistas y retiro en oficina.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Buscador mejorado</h3>
        <p>Buscador que prioriza el nombre del producto para resultados m&aacute;s precisos.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>N&uacute;meros de parte compatibles</h3>
        <p>Ingreso y gesti&oacute;n de n&uacute;meros de parte compatibles en las fichas de producto.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Documentaci&oacute;n legal</h3>
        <p>T&eacute;rminos y Condiciones, Devoluciones, Privacidad y Env&iacute;os, seg&uacute;n la normativa ecuatoriana.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Herramientas de gesti&oacute;n</h3>
        <p>Archivo de gesti&oacute;n de stock y precios, y herramienta de carga masiva de productos.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Creaci&oacute;n masiva de cuentas de clientes</h3>
        <p>Creaci&oacute;n y aprobaci&oacute;n de 323 cuentas de clientes, cada una con su grupo de descuento asignado.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
      <li>
        <h3>Optimizaci&oacute;n de rendimiento</h3>
        <p>Diagn&oacute;stico del servidor, informe de rendimiento y optimizaciones t&eacute;cnicas del sitio.</p>
        <span class="solic">Solicitado por: [POR CONFIRMAR]</span>
      </li>
    </ul>
  </div>
</section>

<!-- RECONOCIMIENTO SIMBÓLICO -->
<section class="sec alt">
  <div class="wrap">
    <span class="eyebrow">Reconocimiento</span>
    <h2>Un valor simb&oacute;lico</h2>
    <p class="p">Todo este trabajo lo hicimos con gusto, como parte de nuestro compromiso con el crecimiento de su tienda. <strong>M&aacute;s que un costo adicional, lo entendemos como parte de acompa&ntilde;arlos.</strong> Por eso, y muy por debajo de su valor real, consideramos un &uacute;nico valor simb&oacute;lico de reconocimiento:</p>
    <div class="valorbox">
      <div class="monto">USD 450 <small>+ IVA</small></div>
      <div class="sub">por todo el trabajo adicional descrito</div>
    </div>
  </div>
</section>

<!-- CIERRE -->
<section class="sec">
  <div class="wrap">
    <p class="p" style="font-size:16.5px;color:var(--hueso)">Seguimos con gusto a su disposici&oacute;n para el soporte y el crecimiento de su tienda. Cualquier consulta, ser&aacute; un placer atenderla.</p>
    <p class="p">Gracias por confiar en Creative Web.</p>
  </div>
</section>

<footer>
  <div class="wrap">
    <p><b>Creative Web</b> &middot; Desarrollo y mantenimiento web &middot; creativeweb.com.ec</p>
    <p style="margin-top:4px">Documento preparado para Multitecnolog&iacute;a VYV &middot; 28 de agosto de 2026.</p>
  </div>
</footer>

</body>
</html>
