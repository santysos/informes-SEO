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
  --ambar:#f0a14b; --verde:#34d39e; --hueso:#eef2f8; --niebla:#94a3b8; --linea:rgba(255,255,255,.10);
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Sora',system-ui,sans-serif;background:var(--noche);color:var(--hueso);line-height:1.6}
.wrap{max-width:900px;margin:0 auto;padding:0 28px}
.eyebrow{display:inline-block;font-family:'JetBrains Mono',monospace;font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--rojo);margin-bottom:14px}
h1{font-size:clamp(27px,4.4vw,42px);font-weight:800;line-height:1.13;letter-spacing:-.01em;margin-bottom:18px}
h2{font-size:clamp(20px,3vw,28px);font-weight:700;line-height:1.2;margin-bottom:6px;letter-spacing:-.01em}
h3{font-size:16.5px;font-weight:700;margin-bottom:6px}
.p{color:var(--niebla);font-size:16px;max-width:72ch;margin-bottom:14px}
.lead{color:var(--hueso);font-size:clamp(16px,2vw,19px);max-width:66ch;opacity:.92}
strong{color:var(--hueso)}
.nav{position:sticky;top:0;z-index:50;background:rgba(10,15,26,.86);backdrop-filter:blur(12px);border-bottom:1px solid var(--linea)}
.navwrap{display:flex;align-items:center;justify-content:space-between;height:58px}
.nav-logo{font-weight:800;font-size:16px;color:var(--hueso)}
.nav-logo span{color:var(--rojo)}
.nav .out{color:var(--niebla);text-decoration:none;font-size:12.5px;border:1px solid var(--linea);padding:6px 12px;border-radius:9px}
.nav .out:hover{border-color:var(--rojo);color:var(--rojo)}
.hero{padding:54px 0 42px;background:radial-gradient(800px 500px at 20% 0%, rgba(233,69,96,.16), transparent 60%),var(--noche);border-bottom:1px solid var(--linea)}
.meta{display:flex;flex-wrap:wrap;gap:8px 26px;margin-top:22px;font-size:13.5px;color:var(--niebla)}
.meta strong{color:var(--hueso)}
.sec{padding:44px 0;border-bottom:1px solid var(--linea)}
.sec.alt{background:linear-gradient(180deg,var(--carbon2),var(--noche))}
.contexto{background:rgba(19,28,46,.6);border:1px solid var(--linea);border-left:4px solid var(--rojo);border-radius:16px;padding:24px 26px}
.contexto .k{font-family:'JetBrains Mono',monospace;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--rojo);margin-bottom:10px}
.contexto p{font-size:16.5px;line-height:1.6;margin:0}
.item{margin-top:26px}
.item .num{font-family:'JetBrains Mono',monospace;color:var(--rojo);font-size:13px;font-weight:600}
.li{list-style:none;display:grid;gap:9px;margin-top:10px}
.li li{position:relative;padding-left:26px;font-size:15.5px;color:var(--hueso)}
.li li::before{content:"\2192";position:absolute;left:0;top:0;color:var(--rojo);font-weight:800}
.li li span{color:var(--niebla)}
.limites{display:grid;gap:12px;margin-top:22px}
.lim{background:rgba(19,28,46,.5);border:1px solid var(--linea);border-radius:13px;padding:18px 20px}
.lim h3{display:flex;align-items:center;gap:9px;margin-bottom:5px}
.lim p{color:var(--niebla);font-size:14.5px;margin:0}
.tag{font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:700;letter-spacing:.05em;padding:3px 9px;border-radius:999px;text-transform:uppercase}
.tag.inc{color:var(--verde);background:rgba(52,211,158,.14)}
.tag.no{color:var(--ambar);background:rgba(240,161,75,.14)}
footer{padding:40px 0 60px;color:var(--niebla);font-size:13px}
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
    <span class="eyebrow">Referencia de alcance &middot; Agosto 2026</span>
    <h1>Trabajos realizados fuera del alcance inicial</h1>
    <p class="lead">Detalle de las tareas y desarrollos ejecutados para su tienda que no estaban contemplados en la proforma #1-10-9819 del contrato inicial.</p>
    <div class="meta">
      <span>Preparado para: <strong>Multitecnolog&iacute;a VYV</strong></span>
      <span>28 de agosto de 2026</span>
    </div>
  </div>
</header>

<!-- CONTEXTO -->
<section class="sec">
  <div class="wrap">
    <div class="contexto">
      <div class="k">Contexto</div>
      <p>El contrato inicial (proforma #1-10-9819, por USD 1.800 + IVA) contemplaba el <strong>desarrollo del sitio e-commerce</strong>: dise&ntilde;o a medida, tienda B2B/B2C con grupos de precios, ficha de producto, SEO b&aacute;sico, Analytics y reCAPTCHA, redes sociales, bot&oacute;n de pagos (Payphone), chat de WhatsApp, capacitaci&oacute;n, integraci&oacute;n con el sistema GSC y hosting por un a&ntilde;o, con soporte t&eacute;cnico durante 12 meses.</p>
    </div>
    <p class="p" style="margin-top:22px">Durante el desarrollo y el per&iacute;odo posterior al lanzamiento surgieron necesidades que <strong>ampliaron ese alcance</strong>. A continuaci&oacute;n le presentamos, con total transparencia, el detalle de esos trabajos adicionales.</p>
  </div>
</section>

<!-- TRABAJOS ADICIONALES -->
<section class="sec alt">
  <div class="wrap">
    <span class="eyebrow">Trabajos adicionales realizados</span>
    <h2>Lo que no estaba en el precio inicial</h2>

    <div class="item">
      <span class="num">01</span>
      <h3>Migraci&oacute;n del sitio anterior (PrestaShop)</h3>
      <ul class="li">
        <li><strong>Reubicaci&oacute;n del sistema anterior</strong> <span>(PrestaShop) a un nuevo dominio (vyvy.online), con ajustes de servidor, base de datos y puesta en l&iacute;nea, para liberar el dominio principal.</span></li>
        <li><strong>Migraci&oacute;n de m&aacute;s de 1.600 productos</strong> <span>al nuevo sistema, con sus categor&iacute;as, marcas y atributos.</span></li>
        <li><strong>Vinculaci&oacute;n de im&aacute;genes de aproximadamente 1.777 productos.</strong></li>
      </ul>
    </div>

    <div class="item">
      <span class="num">02</span>
      <h3>Depuraci&oacute;n y normalizaci&oacute;n del cat&aacute;logo</h3>
      <ul class="li">
        <li><strong>Correcci&oacute;n de formato</strong> <span>de nombres en m&aacute;s de 1.600 productos.</span></li>
        <li><strong>Reorganizaci&oacute;n de productos</strong> <span>(variaciones, consolidaci&oacute;n de art&iacute;culos y atributos).</span></li>
        <li><strong>Auditor&iacute;as</strong> <span>de productos e inventario.</span></li>
      </ul>
    </div>

    <div class="item">
      <span class="num">03</span>
      <h3>Desarrollos a medida (no cotizados)</h3>
      <ul class="li">
        <li><strong>Sistema de env&iacute;os por ciudad y provincia</strong> <span>con m&uacute;ltiples transportistas y retiro en oficina (complemento propio).</span></li>
        <li><strong>Buscador mejorado</strong> <span>que prioriza el nombre del producto.</span></li>
        <li><strong>Ingreso y gesti&oacute;n de n&uacute;meros de parte compatibles</strong> <span>en las fichas de producto.</span></li>
      </ul>
    </div>

    <div class="item">
      <span class="num">04</span>
      <h3>Documentaci&oacute;n legal</h3>
      <ul class="li">
        <li><strong>T&eacute;rminos y Condiciones, Pol&iacute;ticas de Devoluciones, Privacidad y Env&iacute;os</strong> <span>redactadas seg&uacute;n la normativa ecuatoriana.</span></li>
      </ul>
    </div>

    <div class="item">
      <span class="num">05</span>
      <h3>Herramientas de gesti&oacute;n</h3>
      <ul class="li">
        <li><strong>Archivo de gesti&oacute;n de stock y precios</strong> <span>y herramienta de carga masiva de productos.</span></li>
      </ul>
    </div>

    <div class="item">
      <span class="num">06</span>
      <h3>Creaci&oacute;n masiva de cuentas de clientes</h3>
      <ul class="li">
        <li><strong>Creaci&oacute;n y aprobaci&oacute;n de 323 cuentas de clientes</strong> <span>a partir del sistema GSC, cada una con su grupo de descuento asignado.</span></li>
      </ul>
    </div>

    <div class="item">
      <span class="num">07</span>
      <h3>Optimizaci&oacute;n de rendimiento e infraestructura</h3>
      <ul class="li">
        <li><strong>Diagn&oacute;stico del servidor</strong> <span>e informe de rendimiento con pruebas de velocidad.</span></li>
        <li><strong>Optimizaciones t&eacute;cnicas</strong> <span>(cach&eacute;, im&aacute;genes, carga).</span></li>
        <li><strong>Gesti&oacute;n del cambio de plan de hosting.</strong></li>
      </ul>
    </div>
  </div>
</section>

<!-- LÍMITES / ACLARACIONES -->
<section class="sec">
  <div class="wrap">
    <span class="eyebrow">Para su referencia</span>
    <h2>Qu&eacute; cubre el contrato y qu&eacute; no</h2>
    <p class="p">Para mayor claridad, dejamos definidos los l&iacute;mites del servicio contratado:</p>
    <div class="limites">
      <div class="lim">
        <h3><span class="tag inc">Incluido</span> Soporte t&eacute;cnico (12 meses)</h3>
        <p>Correcci&oacute;n de errores del sistema entregado, ajustes menores y atenci&oacute;n de consultas.</p>
      </div>
      <div class="lim">
        <h3><span class="tag no">No incluido</span> Infraestructura del servidor</h3>
        <p>La capacidad y velocidad del hosting dependen del plan contratado. Situaciones como el <strong>error 504</strong> al sincronizar corresponden a la capacidad del servidor, <strong>no a un defecto del sistema</strong>.</p>
      </div>
      <div class="lim">
        <h3><span class="tag no">No incluido</span> Sistemas de terceros</h3>
        <p>El sistema contable <strong>GSC</strong> es un servicio externo; sus fallos o limitaciones no corresponden al desarrollo web.</p>
      </div>
      <div class="lim">
        <h3><span class="tag no">No incluido</span> Carga de datos por su equipo</h3>
        <p>La creaci&oacute;n y configuraci&oacute;n de productos &mdash;por ejemplo, asignar correctamente las variaciones&mdash; es responsabilidad de su personal, para lo cual se brind&oacute; la <strong>capacitaci&oacute;n</strong> contemplada en el contrato.</p>
      </div>
      <div class="lim">
        <h3><span class="tag no">No incluido</span> Mantenimiento del sitio anterior</h3>
        <p>El sitio anterior (vyvy.online) y su continuidad quedan fuera del contrato del nuevo e-commerce.</p>
      </div>
    </div>
  </div>
</section>

<!-- CIERRE -->
<section class="sec alt">
  <div class="wrap">
    <span class="eyebrow">Cierre</span>
    <h2>Quedamos a su disposici&oacute;n</h2>
    <p class="p">Este documento tiene por objeto dejar constancia, con transparencia, del trabajo adicional realizado m&aacute;s all&aacute; del alcance inicial, as&iacute; como de los l&iacute;mites del servicio contratado.</p>
    <p class="p">Quedamos atentos para ampliar cualquier punto y, si usted lo considera oportuno, cotizar formalmente estos trabajos adicionales.</p>
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
