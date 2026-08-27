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
<title>Plan de acci&oacute;n: velocidad de la tienda &mdash; Multitecnolog&iacute;a VYV</title>
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
.wrap{max-width:980px;margin:0 auto;padding:0 28px}
.eyebrow{display:inline-block;font-family:'JetBrains Mono',monospace;font-size:12px;
  letter-spacing:.14em;text-transform:uppercase;color:var(--rojo);margin-bottom:14px}
h1{font-size:clamp(28px,4.6vw,46px);font-weight:800;line-height:1.12;letter-spacing:-.01em;margin-bottom:18px}
h2{font-size:clamp(22px,3.2vw,32px);font-weight:700;line-height:1.18;margin-bottom:14px;letter-spacing:-.01em}
h3{font-size:17px;font-weight:700;margin-bottom:7px}
.p{color:var(--niebla);font-size:16px;max-width:70ch;margin-bottom:14px}
.lead{color:var(--hueso);font-size:clamp(16px,2vw,19px);max-width:64ch;opacity:.92}
strong{color:var(--hueso)}
/* Nav */
.nav{position:sticky;top:0;z-index:50;background:rgba(10,15,26,.86);backdrop-filter:blur(12px);border-bottom:1px solid var(--linea)}
.navwrap{display:flex;align-items:center;justify-content:space-between;height:60px}
.nav-logo{font-weight:800;font-size:16px;letter-spacing:-.01em;color:var(--hueso)}
.nav-logo span{color:var(--rojo)}
.nav nav{display:flex;gap:22px;flex-wrap:wrap}
.nav nav a{color:var(--niebla);text-decoration:none;font-size:13.5px;font-weight:600;transition:color .15s}
.nav nav a:hover{color:var(--rojo)}
.nav .out{color:var(--niebla);text-decoration:none;font-size:12.5px;border:1px solid var(--linea);padding:6px 12px;border-radius:9px}
.nav .out:hover{border-color:var(--rojo);color:var(--rojo)}
/* Hero */
.hero{padding:64px 0 56px;background:
  radial-gradient(800px 500px at 20% 0%, rgba(233,69,96,.16), transparent 60%),
  radial-gradient(700px 500px at 100% 100%, rgba(56,110,201,.10), transparent 55%),
  var(--noche);border-bottom:1px solid var(--linea)}
.meta{display:flex;flex-wrap:wrap;gap:10px 28px;margin-top:26px;font-size:13.5px;color:var(--niebla)}
.meta strong{color:var(--hueso)}
/* Secciones */
.sec{padding:56px 0;border-bottom:1px solid var(--linea);scroll-margin-top:70px}
.sec.alt{background:linear-gradient(180deg,var(--carbon2),var(--noche))}
/* Resumen destacado */
.resumen{background:rgba(19,28,46,.6);border:1px solid var(--linea);border-left:4px solid var(--rojo);
  border-radius:16px;padding:26px 28px;backdrop-filter:blur(8px)}
.resumen .k{font-family:'JetBrains Mono',monospace;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--rojo);margin-bottom:10px}
.resumen p{font-size:18px;line-height:1.6;margin:0}
/* Cards */
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:26px}
.card{background:rgba(19,28,46,.55);border:1px solid var(--linea);border-radius:16px;padding:22px 20px;backdrop-filter:blur(8px)}
.card .ic{font-size:24px;margin-bottom:10px}
.card p{color:var(--niebla);font-size:14.5px;margin:0}
/* Checklist */
.li{list-style:none;display:grid;gap:12px;margin-top:22px}
.li li{position:relative;padding-left:30px;font-size:15.5px;color:var(--hueso)}
.li li::before{content:"\2713";position:absolute;left:0;top:0;color:var(--verde);font-weight:800}
.li li span{color:var(--niebla)}
/* Callout */
.callout{background:rgba(19,28,46,.55);border:1px dashed var(--linea);border-radius:14px;padding:20px 24px;margin-top:22px}
.callout .lbl{font-family:'JetBrains Mono',monospace;font-size:11.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--rojo);margin-bottom:8px}
.callout p{margin:0;color:var(--hueso);font-size:15.5px}
.callout p span{color:var(--niebla)}
/* Analogía */
.analogia{display:grid;grid-template-columns:repeat(2,1fr);gap:0;margin-top:24px;border:1px solid var(--linea);border-radius:16px;overflow:hidden}
.analogia > div{padding:26px}
.analogia .ahora{background:rgba(240,161,75,.10)}
.analogia .meta2{background:rgba(52,211,158,.10)}
.analogia .tag{font-family:'JetBrains Mono',monospace;font-size:11.5px;font-weight:600;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px}
.analogia .ahora .tag{color:var(--ambar)}
.analogia .meta2 .tag{color:var(--verde)}
.analogia h4{font-size:18px;margin-bottom:8px}
.analogia p{color:var(--niebla);font-size:14.5px;margin:0}
/* Timeline pasos */
.timeline{display:grid;gap:16px;margin-top:26px}
.ti{display:flex;gap:20px;align-items:flex-start;background:rgba(19,28,46,.45);border:1px solid var(--linea);border-radius:14px;padding:20px 22px}
.ti .num{flex:none;width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--rojo),var(--rojo-osc));
  color:#fff;font-weight:800;font-size:18px;display:grid;place-items:center}
.ti h3{margin-bottom:6px;display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.ti p{color:var(--niebla);font-size:14.5px;margin:0}
.estado{font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:600;letter-spacing:.04em;padding:3px 9px;border-radius:999px;text-transform:uppercase}
.estado.done{color:var(--verde);background:rgba(52,211,158,.14)}
.estado.now{color:var(--ambar);background:rgba(240,161,75,.14)}
.estado.next{color:var(--rojo);background:rgba(233,69,96,.14)}
/* Footer */
footer{padding:40px 0 60px;color:var(--niebla);font-size:13px}
footer b{color:var(--hueso)}
@media(max-width:760px){
  .grid{grid-template-columns:1fr}
  .analogia{grid-template-columns:1fr}
  .nav nav{display:none}
}
</style>
</head>
<body>

<div class="nav">
  <div class="wrap navwrap">
    <div class="nav-logo">Creative <span>Web</span></div>
    <nav>
      <a href="#diagnostico">Diagn&oacute;stico</a>
      <a href="#hecho">Lo hecho</a>
      <a href="#servidor">Servidor</a>
      <a href="#plan">Plan</a>
    </nav>
    <a class="out" href="logout.php">Salir</a>
  </div>
</div>

<!-- HERO -->
<header class="hero">
  <div class="wrap">
    <span class="eyebrow">Plan de acci&oacute;n &middot; Agosto 2026</span>
    <h1>Plan de acci&oacute;n para la velocidad de la tienda</h1>
    <p class="lead">Qu&eacute; encontramos, qu&eacute; ya mejoramos, y el paso principal que recomendamos para que la tienda sea r&aacute;pida de forma constante.</p>
    <div class="meta">
      <span>Preparado para: <strong>Multitecnolog&iacute;a VYV</strong></span>
      <span>27 de agosto de 2026</span>
      <span>Creative Web</span>
    </div>
  </div>
</header>

<!-- RESUMEN -->
<section class="sec">
  <div class="wrap">
    <div class="resumen">
      <div class="k">En resumen</div>
      <p>Ya aplicamos <strong>varias mejoras en la web</strong> y la tienda est&aacute; optimizada. Sin embargo, la mejora <strong>principal y definitiva</strong> est&aacute; en el <strong>servidor</strong>: hoy comparte sus recursos con otros sitios y, en los momentos de mucha gente, se congestiona. La soluci&oacute;n de fondo es un <strong>servidor dedicado (VPS)</strong> con recursos exclusivos para VYV.</p>
    </div>
  </div>
</section>

<!-- DIAGNOSTICO -->
<section class="sec alt" id="diagnostico">
  <div class="wrap">
    <span class="eyebrow">Qu&eacute; encontramos</span>
    <h2>El punto a mejorar est&aacute; en el servidor, no en la web</h2>
    <p class="p">La tienda est&aacute; bien construida y optimizada. Lo que hace que a ratos se sienta lenta es c&oacute;mo responde el <strong>servidor</strong> donde est&aacute; alojada.</p>
    <div class="grid">
      <div class="card">
        <div class="ic">&#128202;</div>
        <h3>Servidor compartido</h3>
        <p>Hoy el servidor comparte su capacidad con otros sitios web. No es exclusivo de VYV.</p>
      </div>
      <div class="card">
        <div class="ic">&#128200;</div>
        <h3>Picos de saturaci&oacute;n</h3>
        <p>Cuando entran muchos visitantes a la vez, el servidor se congestiona y la web tarda m&aacute;s en esos momentos.</p>
      </div>
      <div class="card">
        <div class="ic">&#9201;&#65039;</div>
        <h3>Respuesta variable</h3>
        <p>Por eso a veces carga r&aacute;pido y a veces lento: depende de cu&aacute;nta carga tenga el servidor en ese instante.</p>
      </div>
    </div>
  </div>
</section>

<!-- PEDIDOS DUPLICADOS -->
<section class="sec">
  <div class="wrap">
    <span class="eyebrow">Un problema que ya resolvimos</span>
    <h2>Por qu&eacute; se generaban pedidos duplicados</h2>
    <p class="p">Los pedidos duplicados <strong>no eran una falla de la tienda</strong>. Ocurr&iacute;an justamente en esos <strong>picos de saturaci&oacute;n del servidor</strong>: cuando hab&iacute;a mucha gente, procesar un pedido tardaba demasiado. Al no ver respuesta, algunos clientes volv&iacute;an a enviar el pedido &mdash; y as&iacute; se duplicaba.</p>
    <div class="callout">
      <div class="lbl">Estado</div>
      <p><strong>Ya lo mejoramos.</strong> <span>Ajustamos la tienda para reducir estos casos. Y con un servidor que responda siempre r&aacute;pido, el problema se elimina de ra&iacute;z, porque el pedido se procesa al instante.</span></p>
    </div>
  </div>
</section>

<!-- LO QUE YA HICIMOS -->
<section class="sec alt" id="hecho">
  <div class="wrap">
    <span class="eyebrow">Lo que ya hicimos</span>
    <h2>Mejoras aplicadas en la web esta semana</h2>
    <p class="p">Todo esto ya est&aacute; funcionando, sin costo adicional para ti:</p>
    <ul class="li">
      <li><strong>Sistema de cach&eacute; reactivado.</strong> <span>La web &ldquo;recuerda&rdquo; las p&aacute;ginas ya visitadas y las entrega mucho m&aacute;s r&aacute;pido.</span></li>
      <li><strong>Im&aacute;genes optimizadas.</strong> <span>Formato moderno m&aacute;s liviano y carga prioritaria de la imagen principal, para que aparezca cuanto antes.</span></li>
      <li><strong>C&oacute;digo comprimido y simplificado.</strong> <span>Menos peso en cada p&aacute;gina.</span></li>
      <li><strong>Carga m&aacute;s r&aacute;pida para quienes vuelven.</strong> <span>El navegador guarda partes de la web hasta un a&ntilde;o, as&iacute; las visitas siguientes son casi instant&aacute;neas.</span></li>
      <li><strong>Causa de los pedidos duplicados corregida.</strong></li>
    </ul>
  </div>
</section>

<!-- PRUEBA DE AYER -->
<section class="sec">
  <div class="wrap">
    <span class="eyebrow">La prueba de ayer</span>
    <h2>Ampliamos los recursos del servidor para medir hoy</h2>
    <p class="p">El proveedor actual permite <strong>aumentar temporalmente los recursos del servidor por 24 horas, sin costo</strong>, para probar el desempe&ntilde;o. <strong>Lo activamos ayer</strong> con un objetivo concreto:</p>
    <div class="callout">
      <div class="lbl">Objetivo de la prueba</div>
      <p>Observar <strong>hoy, en un d&iacute;a normal de VYV</strong>, <span>cu&aacute;nto mejora la experiencia con m&aacute;s recursos disponibles. As&iacute; tenemos evidencia real &mdash;con el flujo verdadero de clientes&mdash; antes de tomar la decisi&oacute;n del cambio permanente.</span></p>
    </div>
    <p class="p" style="margin-top:16px">Si con recursos ampliados la web se siente notablemente m&aacute;s fluida y estable, confirma que el camino correcto es darle a VYV recursos propios de forma permanente.</p>
  </div>
</section>

<!-- SERVIDOR VPS -->
<section class="sec alt" id="servidor">
  <div class="wrap">
    <span class="eyebrow">El paso principal</span>
    <h2>Un servidor dedicado (VPS) solo para VYV</h2>
    <p class="p">La forma m&aacute;s simple de entender la diferencia:</p>
    <div class="analogia">
      <div class="ahora">
        <div class="tag">Hoy &middot; Servidor compartido</div>
        <h4>&#127970; Como un edificio de departamentos</h4>
        <p>Todos comparten el agua y la luz. Si un vecino consume mucho, a los dem&aacute;s les baja la presi&oacute;n. En horas pico, la web se resiente.</p>
      </div>
      <div class="meta2">
        <div class="tag">Recomendado &middot; Servidor VPS</div>
        <h4>&#127968; Como tu propia casa</h4>
        <p>Los recursos son exclusivos de VYV. No importa qu&eacute; hagan los dem&aacute;s: la velocidad se mantiene estable siempre, incluso con mucha gente.</p>
      </div>
    </div>
    <p class="p" style="margin-top:24px">Con un <strong>VPS (servidor privado)</strong>, VYV deja de compartir capacidad. Los beneficios directos:</p>
    <ul class="li">
      <li><strong>Velocidad constante</strong>, <span>sin los picos lentos de ahora.</span></li>
      <li><strong>Aguanta campa&ntilde;as y promociones</strong> <span>sin caerse ni ralentizarse.</span></li>
      <li><strong>Elimina de ra&iacute;z</strong> <span>los pedidos duplicados por lentitud.</span></li>
      <li><strong>Base s&oacute;lida para crecer</strong> <span>a medida que aumenten las visitas y ventas.</span></li>
    </ul>
  </div>
</section>

<!-- PLAN PASO A PASO -->
<section class="sec" id="plan">
  <div class="wrap">
    <span class="eyebrow">El plan, paso a paso</span>
    <h2>C&oacute;mo avanzamos</h2>
    <div class="timeline">
      <div class="ti">
        <div class="num">1</div>
        <div>
          <h3>Optimizaci&oacute;n de la web <span class="estado done">Hecho</span></h3>
          <p>Cach&eacute;, im&aacute;genes, c&oacute;digo y carga r&aacute;pida &mdash; todo aplicado esta semana. Tambi&eacute;n corregimos la causa de los pedidos duplicados.</p>
        </div>
      </div>
      <div class="ti">
        <div class="num">2</div>
        <div>
          <h3>Prueba de rendimiento con m&aacute;s recursos <span class="estado now">En curso hoy</span></h3>
          <p>Ampliamos temporalmente el servidor (prueba gratuita de 24 h) para medir hoy, con el flujo real de clientes, cu&aacute;nto mejora la experiencia.</p>
        </div>
      </div>
      <div class="ti">
        <div class="num">3</div>
        <div>
          <h3>Migraci&oacute;n a servidor dedicado (VPS) <span class="estado next">Recomendado</span></h3>
          <p>El paso principal: pasar a un servidor con recursos exclusivos para VYV, para lograr velocidad estable de forma permanente. Te presentaremos las opciones con sus costos.</p>
        </div>
      </div>
      <div class="ti">
        <div class="num">4</div>
        <div>
          <h3>Monitoreo y ajuste fino <span class="estado next">Siguiente</span></h3>
          <p>Una vez en el servidor nuevo, seguimos midiendo y afinando para mantener el mejor desempe&ntilde;o en el tiempo.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CIERRE -->
<section class="sec alt">
  <div class="wrap">
    <span class="eyebrow">Recomendaci&oacute;n</span>
    <h2>Nuestra recomendaci&oacute;n</h2>
    <p class="p">Las mejoras en la web <strong>ya est&aacute;n hechas</strong>. Con la prueba de hoy confirmaremos el impacto de tener m&aacute;s recursos. El siguiente paso &mdash;y el de mayor efecto&mdash; es <strong>migrar a un servidor dedicado (VPS)</strong> para que la tienda sea r&aacute;pida de forma constante, sin depender de la carga de otros sitios.</p>
    <p class="p">Quedamos atentos para presentarte las opciones de servidor con sus costos y coordinar el cambio cuando lo decidas.</p>
  </div>
</section>

<footer>
  <div class="wrap">
    <p><b>Creative Web</b> &middot; Desarrollo y mantenimiento web &middot; creativeweb.com.ec</p>
    <p style="margin-top:4px">Documento preparado para Multitecnolog&iacute;a VYV &middot; 27 de agosto de 2026.</p>
  </div>
</footer>

</body>
</html>
