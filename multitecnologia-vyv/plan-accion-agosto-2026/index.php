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
<title>Velocidad de la tienda &mdash; Multitecnolog&iacute;a VYV</title>
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
h1{font-size:clamp(28px,4.6vw,44px);font-weight:800;line-height:1.12;letter-spacing:-.01em;margin-bottom:18px}
h2{font-size:clamp(21px,3.2vw,30px);font-weight:700;line-height:1.18;margin-bottom:14px;letter-spacing:-.01em}
h3{font-size:17px;font-weight:700;margin-bottom:7px}
.p{color:var(--niebla);font-size:16px;max-width:70ch;margin-bottom:14px}
.lead{color:var(--hueso);font-size:clamp(16px,2vw,19px);max-width:64ch;opacity:.92}
strong{color:var(--hueso)}
.nav{position:sticky;top:0;z-index:50;background:rgba(10,15,26,.86);backdrop-filter:blur(12px);border-bottom:1px solid var(--linea)}
.navwrap{display:flex;align-items:center;justify-content:space-between;height:58px}
.nav-logo{font-weight:800;font-size:16px;color:var(--hueso)}
.nav-logo span{color:var(--rojo)}
.nav .out{color:var(--niebla);text-decoration:none;font-size:12.5px;border:1px solid var(--linea);padding:6px 12px;border-radius:9px}
.nav .out:hover{border-color:var(--rojo);color:var(--rojo)}
.hero{padding:56px 0 44px;background:radial-gradient(800px 500px at 20% 0%, rgba(233,69,96,.16), transparent 60%),var(--noche);border-bottom:1px solid var(--linea)}
.meta{display:flex;flex-wrap:wrap;gap:8px 26px;margin-top:22px;font-size:13.5px;color:var(--niebla)}
.meta strong{color:var(--hueso)}
.sec{padding:50px 0;border-bottom:1px solid var(--linea)}
.sec.alt{background:linear-gradient(180deg,var(--carbon2),var(--noche))}
.resumen{background:rgba(19,28,46,.6);border:1px solid var(--linea);border-left:4px solid var(--rojo);border-radius:16px;padding:24px 26px}
.resumen .k{font-family:'JetBrains Mono',monospace;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--rojo);margin-bottom:10px}
.resumen p{font-size:18px;line-height:1.6;margin:0}
.analogia{display:grid;grid-template-columns:repeat(2,1fr);gap:0;margin-top:22px;border:1px solid var(--linea);border-radius:16px;overflow:hidden}
.analogia > div{padding:24px}
.analogia .ahora{background:rgba(240,161,75,.10)}
.analogia .meta2{background:rgba(52,211,158,.10)}
.analogia .tag{font-family:'JetBrains Mono',monospace;font-size:11.5px;font-weight:600;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px}
.analogia .ahora .tag{color:var(--ambar)}
.analogia .meta2 .tag{color:var(--verde)}
.analogia h4{font-size:17px;margin-bottom:8px}
.analogia p{color:var(--niebla);font-size:14.5px;margin:0}
.callout{background:rgba(19,28,46,.55);border:1px dashed var(--linea);border-radius:14px;padding:20px 24px;margin-top:20px}
.callout .lbl{font-family:'JetBrains Mono',monospace;font-size:11.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--rojo);margin-bottom:8px}
.callout p{margin:0;color:var(--hueso);font-size:15.5px}
.callout p span{color:var(--niebla)}
.li{list-style:none;display:grid;gap:11px;margin-top:20px}
.li li{position:relative;padding-left:28px;font-size:15.5px;color:var(--hueso)}
.li li::before{content:"\2713";position:absolute;left:0;top:0;color:var(--verde);font-weight:800}
.li li span{color:var(--niebla)}
.metricrow{display:flex;flex-wrap:wrap;gap:10px;margin-top:18px}
.metricrow .m{flex:1 1 120px;background:rgba(19,28,46,.55);border:1px solid var(--linea);border-radius:12px;padding:14px 16px;text-align:center}
.metricrow .m .v{font-size:24px;font-weight:800;color:#fff;line-height:1.1}
.metricrow .m .v.bad{color:var(--rojo)} .metricrow .m .v.ok{color:var(--verde)}
.metricrow .m .l{font-size:11.5px;color:var(--niebla);text-transform:uppercase;letter-spacing:.05em;margin-top:4px}
.shot{margin:22px 0 0;border:1px solid var(--linea);border-radius:14px;overflow:hidden;background:#0f1626;box-shadow:0 24px 60px rgba(0,0,0,.4)}
.shot img{display:block;width:100%;height:auto}
.shot figcaption{padding:14px 20px;font-size:13.5px;color:var(--niebla);border-top:1px solid var(--linea);background:rgba(19,28,46,.7);line-height:1.55}
.shot figcaption b{color:var(--hueso)}
footer{padding:40px 0 60px;color:var(--niebla);font-size:13px}
footer b{color:var(--hueso)}
@media(max-width:700px){ .analogia{grid-template-columns:1fr} }
</style>
</head>
<body>

<div class="nav">
  <div class="wrap navwrap">
    <div class="nav-logo">Creative <span>Web</span></div>
    <a class="out" href="logout.php">Salir</a>
  </div>
</div>

<!-- HERO -->
<header class="hero">
  <div class="wrap">
    <span class="eyebrow">Plan de acci&oacute;n &middot; Agosto 2026</span>
    <h1>La velocidad de la tienda: qu&eacute; encontramos y qu&eacute; recomendamos</h1>
    <p class="lead">Ya optimizamos la web. Una prueba controlada confirm&oacute; que lo que falta es <strong>capacidad de servidor</strong> &mdash; y hay una soluci&oacute;n directa.</p>
    <div class="meta">
      <span>Preparado para: <strong>Multitecnolog&iacute;a VYV</strong></span>
      <span>28 de agosto de 2026</span>
    </div>
  </div>
</header>

<!-- RESUMEN -->
<section class="sec">
  <div class="wrap">
    <div class="resumen">
      <div class="k">En una l&iacute;nea</div>
      <p>La web est&aacute; bien construida y optimizada. La lentitud (y los pedidos duplicados) vienen de que el <strong>servidor actual se satura en horas pico</strong>. La soluci&oacute;n: <strong>subir al plan con Cach&eacute; de Objetos y m&aacute;s recursos</strong>.</p>
    </div>
  </div>
</section>

<!-- LA PRUEBA A/B -->
<section class="sec alt">
  <div class="wrap">
    <span class="eyebrow">La prueba que lo confirma</span>
    <h2>Un d&iacute;a con m&aacute;s recursos, un d&iacute;a sin ellos</h2>
    <p class="p">Hostinger permite ampliar los recursos del servidor <strong>gratis por 24 horas</strong> para probar. Hicimos la prueba con el flujo real de clientes, y el resultado fue muy claro:</p>
    <div class="analogia">
      <div class="meta2">
        <div class="tag">27 de agosto &middot; Recursos ampliados</div>
        <h4>&#10003; Todo funcion&oacute; bien</h4>
        <p><strong>Cero errores</strong> y <strong>cero pedidos duplicados</strong> en todo el d&iacute;a. La web se sinti&oacute; m&aacute;s fluida y el checkout, m&aacute;s r&aacute;pido.</p>
      </div>
      <div class="ahora">
        <div class="tag">28 de agosto &middot; Servidor b&aacute;sico otra vez</div>
        <h4>&#10007; Volvieron los problemas</h4>
        <p>Al regresar al plan actual, <strong>reaparecieron la lentitud y los inconvenientes</strong> de siempre.</p>
      </div>
    </div>
    <p class="p" style="margin-top:22px">La causa se ve en el uso del servidor: la <strong>CPU llega al 100%</strong> (su tope) una y otra vez en los momentos de m&aacute;s gente. Cuando eso pasa, la web tarda y algunos pedidos se duplican porque el cliente reintenta.</p>
    <figure class="shot">
      <img src="test-cpu-saturacion.jpg" alt="Uso de CPU del servidor llegando al 100% varias veces" loading="lazy">
      <figcaption>Uso real de <b>CPU del servidor</b> (Hostinger). Las zonas rojas son momentos en que la CPU <b>toc&oacute; el 100%</b> &mdash; ah&iacute; es cuando la tienda se pone lenta.</figcaption>
    </figure>
  </div>
</section>

<!-- PRUEBAS DE VELOCIDAD + MÉTRICAS VS REALIDAD -->
<section class="sec">
  <div class="wrap">
    <span class="eyebrow">Las pruebas de velocidad</span>
    <h2>Las m&eacute;tricas de Google vs. la realidad</h2>
    <p class="p">Medimos con <strong>Google PageSpeed</strong>. Estas son las m&eacute;tricas de la tienda:</p>
    <div class="metricrow">
      <div class="m"><div class="v bad">2.6 s</div><div class="l">Respuesta del servidor</div></div>
      <div class="m"><div class="v bad">4.9 s</div><div class="l">Carga principal</div></div>
      <div class="m"><div class="v ok">0.02</div><div class="l">Estabilidad visual</div></div>
    </div>
    <figure class="shot">
      <img src="test-pagespeed.jpg" alt="Prueba de velocidad de multitecnologiavyv.com en Google PageSpeed" loading="lazy">
      <figcaption>Prueba real en <b>Google PageSpeed</b>. El punto rojo es la <b>respuesta del servidor (2.6 s)</b>; la <b>estabilidad (0.02)</b> en verde confirma que la web est&aacute; bien construida.</figcaption>
    </figure>

    <div class="callout" style="margin-top:26px">
      <div class="lbl">C&oacute;mo leer estos n&uacute;meros</div>
      <p><strong>El puntaje de Google es una prueba dura y relativa</strong>, <span>que simula un celular modesto con internet lento. Bajo esa vara, casi todas las tiendas grandes puntúan bajo &mdash; por ejemplo, <b>Nike obtiene un puntaje a&uacute;n m&aacute;s bajo</b> que VYV. En la vida real la tienda carga en tiempos razonables; el &uacute;nico punto rojo de fondo es la <b>respuesta del servidor en horas pico</b>, que es justo lo que resuelve m&aacute;s capacidad.</span></p>
    </div>

    <h3 style="margin-top:32px">En la vida real, la tienda carga r&aacute;pido</h3>
    <p class="p">Otras herramientas, midiendo la carga real desde distintas ciudades, muestran <strong>buenos tiempos</strong> y calificaciones B/A:</p>
    <div class="metricrow">
      <div class="m"><div class="v ok">752 ms</div><div class="l">Pingdom &middot; Londres</div></div>
      <div class="m"><div class="v ok">1.29 s</div><div class="l">ManageWP &middot; Londres</div></div>
      <div class="m"><div class="v ok">B (83%)</div><div class="l">ManageWP PageSpeed</div></div>
    </div>
    <figure class="shot">
      <img src="test-pingdom.jpg" alt="Prueba en Pingdom Tools: 752 ms de carga" loading="lazy">
      <figcaption>Prueba en <b>Pingdom Tools</b> (Londres): la tienda carg&oacute; en <b>752 ms</b>.</figcaption>
    </figure>
    <figure class="shot">
      <img src="test-managewp.jpg" alt="Historial de rendimiento en ManageWP con calificaciones B y buenos tiempos" loading="lazy">
      <figcaption>Historial de <b>ManageWP</b>: calificaci&oacute;n <b>B (83%)</b> y tiempos de <b>1.29 a 3.23 s</b> desde varias ciudades (una hasta con <b>A 91%</b>).</figcaption>
    </figure>
  </div>
</section>

<!-- RECOMENDACIÓN -->
<section class="sec alt">
  <div class="wrap">
    <span class="eyebrow">La recomendaci&oacute;n</span>
    <h2>Subir al plan con Cach&eacute; de Objetos</h2>
    <p class="p">El plan actual <strong>no incluye Cach&eacute; de Objetos</strong>. El siguiente (<strong>Business</strong>) s&iacute; la trae, adem&aacute;s de m&aacute;s recursos. Es el cambio de mayor impacto.</p>
    <div class="callout">
      <div class="lbl">&iquest;Qu&eacute; es la Cach&eacute; de Objetos?</div>
      <p><strong>Una memoria r&aacute;pida donde el servidor guarda lo que m&aacute;s usa</strong> <span>(precios, men&uacute;s, productos), para no recalcularlo en cada visita. Resultado: <strong>menos carga de CPU</strong> &rarr; m&aacute;s velocidad y estabilidad, justo en las horas pico.</span></p>
    </div>
    <p class="p" style="margin-top:22px">Al subir al plan Business, VYV gana:</p>
    <ul class="li">
      <li><strong>Cach&eacute; de Objetos</strong> <span>&mdash; menos saturaci&oacute;n de CPU.</span></li>
      <li><strong>M&aacute;s recursos y almacenamiento NVMe</strong> <span>(m&aacute;s r&aacute;pido).</span></li>
      <li><strong>CDN incluido y respaldos diarios</strong> <span>(hoy son semanales).</span></li>
      <li><strong>Velocidad estable en horas pico</strong> <span>&mdash; sin lentitud ni pedidos duplicados.</span></li>
    </ul>
    <p class="p" style="margin-top:22px">La prueba del 27 de agosto ya demostr&oacute; el efecto. Este plan lo vuelve <strong>permanente</strong>. Quedamos atentos para coordinar la actualizaci&oacute;n cuando usted lo decida.</p>
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
