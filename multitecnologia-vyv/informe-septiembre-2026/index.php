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
<title>Informe SEO Septiembre 2026 &mdash; Multitecnolog&iacute;a VYV</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--noche:#0a0f1a;--carbon:#131c2e;--carbon2:#0e1626;--rojo:#e94560;--rojo-osc:#c81e43;--ambar:#f0a14b;--verde:#34d39e;--hueso:#eef2f8;--niebla:#94a3b8;--linea:rgba(255,255,255,.10)}
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
.nav-logo{font-weight:800;font-size:16px}
.nav-logo span{color:var(--rojo)}
.nav .out{color:var(--niebla);text-decoration:none;font-size:12.5px;border:1px solid var(--linea);padding:6px 12px;border-radius:9px}
.nav .out:hover{border-color:var(--rojo);color:var(--rojo)}
.hero{padding:52px 0 42px;background:radial-gradient(800px 500px at 20% 0%, rgba(233,69,96,.16), transparent 60%),var(--noche);border-bottom:1px solid var(--linea)}
.meta{display:flex;flex-wrap:wrap;gap:8px 26px;margin-top:22px;font-size:13.5px;color:var(--niebla)}
.meta strong{color:var(--hueso)}
.sec{padding:46px 0;border-bottom:1px solid var(--linea)}
.sec.alt{background:linear-gradient(180deg,var(--carbon2),var(--noche))}
.resumen{background:rgba(19,28,46,.6);border:1px solid var(--linea);border-left:4px solid var(--rojo);border-radius:16px;padding:24px 26px}
.resumen .k{font-family:'JetBrains Mono',monospace;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--rojo);margin-bottom:10px}
.resumen p{font-size:17.5px;line-height:1.6;margin:0}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:8px}
.card{background:rgba(19,28,46,.55);border:1px solid var(--linea);border-radius:14px;padding:20px 22px}
.card .n{font-size:30px;font-weight:800;color:var(--rojo);line-height:1}
.card .lbl{color:var(--niebla);font-size:13.5px;margin-top:6px}
.analogia{display:grid;grid-template-columns:repeat(2,1fr);gap:0;margin-top:22px;border:1px solid var(--linea);border-radius:16px;overflow:hidden}
.analogia > div{padding:24px}
.analogia .ahora{background:rgba(240,161,75,.10)}
.analogia .meta2{background:rgba(52,211,158,.10)}
.analogia .tag{font-family:'JetBrains Mono',monospace;font-size:11.5px;font-weight:600;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px}
.analogia .ahora .tag{color:var(--ambar)}
.analogia .meta2 .tag{color:var(--verde)}
.analogia h4{font-size:16px;margin-bottom:8px}
.analogia p{color:var(--niebla);font-size:14.5px;margin:0}
table{width:100%;border-collapse:collapse;margin-top:14px;font-size:14.5px}
th,td{text-align:left;padding:10px 12px;border-bottom:1px solid var(--linea)}
th{font-family:'JetBrains Mono',monospace;font-size:11.5px;letter-spacing:.08em;text-transform:uppercase;color:var(--niebla)}
td .old{font-family:'JetBrains Mono',monospace;font-size:12.5px;color:var(--ambar)}
td .new{font-family:'JetBrains Mono',monospace;font-size:12.5px;color:var(--verde)}
ul.check{list-style:none;margin-top:12px}
ul.check li{position:relative;padding-left:28px;margin:9px 0;color:var(--niebla);font-size:15.5px}
ul.check li::before{content:"\2713";position:absolute;left:0;top:0;color:var(--verde);font-weight:700}
ul.next{list-style:none;margin-top:12px}
ul.next li{position:relative;padding-left:22px;margin:9px 0;color:var(--niebla);font-size:15.5px}
ul.next li::before{content:"\2192";position:absolute;left:0;color:var(--rojo)}
.pie{padding:34px 0;text-align:center;color:var(--niebla);font-size:13px}
@media(max-width:560px){.analogia{grid-template-columns:1fr}}
</style>
</head>
<body>

<nav class="nav"><div class="wrap navwrap">
  <div class="nav-logo">Multitecnolog&iacute;a <span>VYV</span></div>
  <a class="out" href="logout.php">Salir</a>
</div></nav>

<header class="hero"><div class="wrap">
  <span class="eyebrow">Informe SEO &middot; Septiembre 2026</span>
  <h1>Recuperamos las visitas que se perd&iacute;an por la mudanza de la tienda</h1>
  <p class="lead">Cuando pasaste tu tienda al sitio nuevo, las direcciones antiguas quedaron sueltas: quien las abr&iacute;a &mdash;o las encontraba en Google&mdash; llegaba a una p&aacute;gina de error. Este mes reconectamos todas esas direcciones con la p&aacute;gina que les corresponde.</p>
  <div class="meta">
    <span>Cliente: <strong>Multitecnolog&iacute;a VYV</strong></span>
    <span>Periodo: <strong>Septiembre 2026</strong></span>
    <span>Trabajo: <strong>Recuperaci&oacute;n de direcciones rotas</strong></span>
  </div>
</div></header>

<section class="sec"><div class="wrap">
  <div class="resumen">
    <div class="k">En una frase</div>
    <p>Hab&iacute;a m&aacute;s de <strong>1.900 direcciones antiguas cayendo en una p&aacute;gina de error</strong>, que en el &uacute;ltimo a&ntilde;o Google mostr&oacute; unas <strong>16.800 veces</strong>. Hoy todas llevan al lugar correcto de tu tienda nueva, sin errores.</p>
  </div>
</div></section>

<section class="sec alt"><div class="wrap">
  <h2>Qu&eacute; encontramos</h2>
  <p class="p">Tu tienda anterior y la nueva usan direcciones distintas para las mismas p&aacute;ginas. En la mudanza, las direcciones viejas no se conectaron con las nuevas, as&iacute; que se quedaron &laquo;colgadas&raquo;: cualquiera que llegara a una de ellas ve&iacute;a una p&aacute;gina de error, y Google tambi&eacute;n. Eso hace perder visitas y le resta puntos a tu posici&oacute;n en las b&uacute;squedas.</p>
  <div class="analogia">
    <div class="ahora">
      <div class="tag">Antes</div>
      <h4>La direcci&oacute;n vieja &rarr; error</h4>
      <p>El cliente busca en Google &laquo;fuente de poder&raquo;, hace clic en tu resultado y aterriza en una p&aacute;gina de error. Se va. Esa visita se pierde.</p>
    </div>
    <div class="meta2">
      <div class="tag">Ahora</div>
      <h4>La direcci&oacute;n vieja &rarr; la p&aacute;gina correcta</h4>
      <p>La misma b&uacute;squeda ahora lo lleva directo a la categor&iacute;a de fuentes de poder de tu tienda. La visita se aprovecha.</p>
    </div>
  </div>
  <div class="grid" style="margin-top:22px">
    <div class="card"><div class="n">1.903</div><div class="lbl">direcciones viejas que daban error</div></div>
    <div class="card"><div class="n">~16.800</div><div class="lbl">veces que Google las mostr&oacute; en un a&ntilde;o</div></div>
    <div class="card"><div class="n">103</div><div class="lbl">reconexiones creadas para cubrirlas todas</div></div>
  </div>
</div></section>

<section class="sec"><div class="wrap">
  <h2>Qu&eacute; hicimos</h2>
  <p class="p">Creamos <strong>reconexiones autom&aacute;ticas</strong> (redirecciones permanentes) para que cada direcci&oacute;n antigua lleve a la p&aacute;gina nueva que responde a lo que la persona buscaba &mdash;no a la portada gen&eacute;rica, que Google castiga&mdash;. Estas son las de mayor peso:</p>
  <table>
    <thead><tr><th>Direcci&oacute;n antigua</th><th>Ahora lleva a</th></tr></thead>
    <tbody>
      <tr><td><span class="old">Art&iacute;culo &laquo;fuente de poder&raquo;</span></td><td><span class="new">Categor&iacute;a Fuentes de poder</span></td></tr>
      <tr><td><span class="old">Sobre nosotros (vieja)</span></td><td><span class="new">P&aacute;gina Nosotros</span></td></tr>
      <tr><td><span class="old">Cont&aacute;ctenos (vieja)</span></td><td><span class="new">P&aacute;gina Contacto</span></td></tr>
      <tr><td><span class="old">Repuestos laptop, Hub USB, Pantallas&hellip;</span></td><td><span class="new">Su categor&iacute;a en la tienda nueva</span></td></tr>
      <tr><td><span class="old">~1.300 fichas de producto viejas</span></td><td><span class="new">La Tienda</span></td></tr>
    </tbody>
  </table>
  <ul class="check">
    <li>103 reconexiones creadas y <strong>verificadas una por una</strong>: ninguna direcci&oacute;n vieja da error ya.</li>
    <li>Cada una lleva a una p&aacute;gina con el mismo tema, para que la visita sirva y no rebote.</li>
    <li>Las categor&iacute;as viejas se emparejaron con su categor&iacute;a real de la tienda nueva.</li>
  </ul>
</div></section>

<section class="sec alt"><div class="wrap">
  <h2>Por qu&eacute; importa</h2>
  <p class="p">Recuperar estas direcciones tiene efecto inmediato: <strong>dejas de perder</strong> a quien te encuentra por una direcci&oacute;n antigua, y Google deja de ver errores en tu sitio &mdash;algo que ven&iacute;a frenando tu posici&oacute;n&mdash;. Es la base sobre la que se construye el resto del plan de posicionamiento.</p>
</div></section>

<section class="sec"><div class="wrap">
  <h2>Lo que sigue</h2>
  <ul class="next">
    <li>Reescritura de t&iacute;tulos y descripciones de las p&aacute;ginas que ya aparecen en Google, para que reciban m&aacute;s clics.</li>
    <li>Publicaci&oacute;n de art&iacute;culos mensuales enlazados a tus productos, para atraer clientes nuevos.</li>
    <li>Medici&oacute;n instalada y reporte mensual con las cifras y su evoluci&oacute;n.</li>
  </ul>
</div></section>

<div class="pie">Creative Web &middot; info@creativeweb.com.ec &middot; 099 917 4980 &middot; Informe SEO &mdash; Septiembre 2026</div>

</body>
</html>
