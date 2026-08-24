<?php
session_start();
if (empty($_SESSION['auth_optica'])) {
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
<title>Propuesta: sistema para &Oacute;ptica Pluss &mdash; Creative Web</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  --noche:#061421; --carbon:#0d2437; --carbon2:#0a1d2d; --aqua:#2ed3c6; --aqua-osc:#12a99c;
  --ambar:#f0a14b; --hueso:#eef4f6; --niebla:#9fb5bd; --linea:rgba(255,255,255,.10);
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Sora',system-ui,sans-serif;background:var(--noche);color:var(--hueso);line-height:1.6}
.wrap{max-width:980px;margin:0 auto;padding:0 28px}
.eyebrow,.tag{display:inline-block;font-family:'JetBrains Mono',monospace;font-size:12px;
  letter-spacing:.14em;text-transform:uppercase;color:var(--aqua);margin-bottom:14px}
h1{font-size:clamp(28px,4.6vw,46px);font-weight:800;line-height:1.12;letter-spacing:-.01em;margin-bottom:18px}
h2{font-size:clamp(22px,3.2vw,32px);font-weight:700;line-height:1.18;margin-bottom:14px;letter-spacing:-.01em}
h3{font-size:17px;font-weight:700;margin-bottom:7px}
h4{font-size:13px;text-transform:uppercase;letter-spacing:.1em;margin-bottom:14px}
.p{color:var(--niebla);font-size:16px;max-width:70ch;margin-bottom:8px}
.lead{color:var(--hueso);font-size:clamp(16px,2vw,19px);max-width:64ch;opacity:.92}
/* Nav */
.nav{position:sticky;top:0;z-index:50;background:rgba(6,20,33,.86);backdrop-filter:blur(12px);
  border-bottom:1px solid var(--linea)}
.navwrap{display:flex;align-items:center;justify-content:space-between;height:60px}
.nav-logo{font-weight:800;font-size:16px;letter-spacing:-.01em;color:var(--hueso)}
.nav-logo span{color:var(--aqua)}
.nav nav{display:flex;gap:22px;flex-wrap:wrap}
.nav nav a{color:var(--niebla);text-decoration:none;font-size:13.5px;font-weight:600;transition:color .15s}
.nav nav a:hover{color:var(--aqua)}
/* Hero */
.hero{padding:64px 0 56px;background:
  radial-gradient(800px 500px at 20% 0%, rgba(46,211,198,.14), transparent 60%),
  radial-gradient(700px 500px at 100% 100%, rgba(0,117,201,.10), transparent 55%),
  var(--noche);border-bottom:1px solid var(--linea)}
.logo{height:34px;margin-bottom:26px;opacity:.95}
.meta{display:flex;flex-wrap:wrap;gap:10px 28px;margin-top:26px;font-size:13.5px;color:var(--niebla)}
.meta strong{color:var(--hueso)}
.dl{display:inline-flex;align-items:center;gap:8px;margin-top:22px;padding:11px 20px;border-radius:11px;
  background:linear-gradient(135deg,var(--aqua),var(--aqua-osc));color:#04121a;font-weight:700;font-size:14px;text-decoration:none}
.dl:hover{filter:brightness(1.07)}
/* Secciones */
.sec{padding:58px 0;border-bottom:1px solid var(--linea);scroll-margin-top:70px}
.sec.alt{background:linear-gradient(180deg,var(--carbon2),var(--noche))}
.grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px;margin-top:26px}
.card{background:rgba(13,36,55,.55);border:1px solid var(--linea);border-radius:16px;padding:22px 20px;backdrop-filter:blur(8px)}
.card .ic{font-size:24px;margin-bottom:10px}
.card p{color:var(--niebla);font-size:14.5px}
.card .big{font-size:22px;font-weight:800;color:#fff;margin:2px 0 6px}
.card .big small{font-size:13px;color:var(--niebla);font-weight:600}
.flow{display:flex;flex-wrap:wrap;align-items:center;gap:8px;margin:26px 0 8px}
.flow span{background:rgba(46,211,198,.12);border:1px solid rgba(46,211,198,.35);color:var(--hueso);
  border-radius:999px;padding:7px 14px;font-size:13.5px;font-weight:600}
.flow i{color:var(--aqua);font-style:normal;font-weight:700}
.cols{display:grid;grid-template-columns:1.4fr 1fr;gap:30px;margin-top:24px}
h4.ok{color:var(--aqua)} h4.no{color:var(--ambar)}
.li{list-style:none;display:grid;gap:10px}
.li li{position:relative;padding-left:26px;font-size:15px;color:var(--hueso)}
.ok-li li::before{content:"\2713";position:absolute;left:0;top:0;color:var(--aqua);font-weight:800}
.no-li li{color:var(--niebla)}
.no-li li::before{content:"\2014";position:absolute;left:0;top:0;color:var(--ambar)}
.planes{display:grid;grid-template-columns:repeat(2,1fr);gap:18px;margin:26px 0 20px;align-items:stretch}
.plan{position:relative;background:rgba(13,36,55,.55);border:1px solid var(--linea);border-radius:18px;padding:26px 24px;display:flex;flex-direction:column}
.plan.pop{border-color:rgba(46,211,198,.55);box-shadow:0 0 0 1px rgba(46,211,198,.25),0 20px 50px rgba(0,0,0,.35)}
.badge{position:absolute;top:-11px;left:24px;background:linear-gradient(135deg,var(--aqua),var(--aqua-osc));
  color:#04121a;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;padding:4px 12px;border-radius:999px}
.precio{font-size:38px;font-weight:800;margin:6px 0 10px;color:#fff}
.precio small{font-size:15px;color:var(--niebla);font-weight:600}
.plan .pd{color:var(--niebla);font-size:14.5px}
.cuadro{background:rgba(13,36,55,.55);border:1px solid var(--linea);border-radius:14px;overflow:hidden;margin-top:6px}
.fila{display:flex;justify-content:space-between;align-items:center;gap:16px;padding:15px 20px;border-bottom:1px solid var(--linea);font-size:15px;color:var(--niebla)}
.fila:last-child{border-bottom:none}
.fila strong{color:var(--hueso);text-align:right}
.nota{margin-top:16px;font-size:13px;color:var(--niebla);max-width:74ch}
.timeline{display:grid;gap:14px;margin:24px 0 28px}
.ti{display:flex;gap:18px;align-items:flex-start;background:rgba(13,36,55,.45);border:1px solid var(--linea);border-radius:14px;padding:16px 20px}
.ti .w{font-family:'JetBrains Mono',monospace;color:var(--aqua);font-size:13px;font-weight:600;min-width:96px}
.ti p{color:var(--niebla);font-size:14.5px}
.need{background:rgba(240,161,75,.08);border:1px solid rgba(240,161,75,.3);border-radius:14px;padding:20px 22px}
.need h4{color:var(--ambar)}
.cta{margin-top:30px;background:linear-gradient(135deg,rgba(46,211,198,.14),rgba(0,117,201,.10));
  border:1px solid rgba(46,211,198,.35);border-radius:18px;padding:34px 30px;text-align:center}
.cta h3{font-size:22px;margin-bottom:6px}
.cta p{color:var(--niebla);margin-bottom:20px}
.cta-btns{display:flex;flex-wrap:wrap;gap:12px;justify-content:center}
.btn{display:inline-flex;align-items:center;gap:9px;padding:13px 24px;border-radius:12px;font-weight:700;font-size:15px;text-decoration:none}
.btn-wa{background:linear-gradient(135deg,#25d366,#128c53);color:#03210f}
.btn-mail{background:transparent;border:1px solid var(--linea);color:var(--hueso)}
.btn:hover{filter:brightness(1.08)}
footer{padding:40px 0;text-align:center;background:var(--carbon2)}
.logo-f{height:26px;opacity:.85;margin-bottom:14px}
footer p{color:var(--niebla);font-size:13px}
footer .fine{margin-top:8px;font-size:12px;opacity:.7}
@media (max-width:720px){
  .grid,.cols,.planes{grid-template-columns:1fr}
  .ti{flex-direction:column;gap:6px}
  .nav nav{gap:14px;font-size:12.5px}
  .nav-logo{font-size:14px}
}
@media print{.dl,.nav{display:none}}
</style>
</head>
<body>

<header class="nav">
  <div class="wrap navwrap">
    <span class="nav-logo">Creative<span>Web</span></span>
    <nav>
      <a href="#diagnostico">Diagn&oacute;stico</a>
      <a href="#propuesta">Propuesta</a>
      <a href="#incluye">Qu&eacute; incluye</a>
      <a href="#inversion">Inversi&oacute;n</a>
      <a href="#cronograma">Cronograma</a>
    </nav>
  </div>
</header>

<section class="hero">
  <div class="wrap">
    <img class="logo" src="data:image/png;base64,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UmVhZHlxyWU8AAADKWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgMTAuMC1jMDAwIDc5LmQyMGU0NjYzMCwgMjAyNS8xMi8wOS0wMjoxMToyMyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI3LjUgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RkYzRDBDNzkzNEQ3MTFGMTg5NDRCRURBMjAzNEM2QTIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RkYzRDBDN0EzNEQ3MTFGMTg5NDRCRURBMjAzNEM2QTIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGRjNEMEM3NzM0RDcxMUYxODk0NEJFREEyMDM0QzZBMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGRjNEMEM3ODM0RDcxMUYxODk0NEJFREEyMDM0QzZBMiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmBcghwAABodSURBVHja7F0LnI5V/j8zmFwSYd1CE5XLJvy3mI21IhYpTLkUq3FpQvW39de/WkqyWpvJylJ2QkNILpNcSmpdZzGR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" alt="Creative Web">
    <span class="eyebrow">Propuesta &middot; Agosto 2026</span>
    <h1>Un solo sistema para su &oacute;ptica:<br>pacientes, ex&aacute;menes, ventas e inventario</h1>
    <p class="lead">Deje el Excel y los formularios a mano. Toda la operaci&oacute;n de sus <strong>4 locales</strong> y sus <strong>2 RUCs</strong> en un solo lugar, con la ficha del paciente capturada una sola vez.</p>
    <div class="meta">
      <span>Para: <strong>&Oacute;ptica Pluss</strong></span>
      <span>De: <strong>Creative Web</strong> &middot; RUC 1002906426001</span>
    </div>
    <a class="dl" href="proforma.pdf" download>&#11015; Descargar en PDF</a>
  </div>
</section>

<section id="diagnostico" class="sec">
  <div class="wrap">
    <span class="tag">01 &middot; C&oacute;mo trabaja hoy</span>
    <h2>El problema no es la falta de datos. Es que est&aacute;n sueltos.</h2>
    <p class="p">Hoy la informaci&oacute;n de cada paciente vive en varios lados y se vuelve a escribir a mano en cada paso. Eso cuesta tiempo, genera errores y no deja ver el negocio completo.</p>
    <div class="grid">
      <div class="card"><div class="ic">&#128203;</div><h3>Tres formularios a mano</h3><p>Ficha de ex&aacute;menes, recibo y orden de trabajo se llenan a mano, repitiendo los datos del cliente en cada uno.</p></div>
      <div class="card"><div class="ic">&#128202;</div><h3>Todo en Excel</h3><p>Clientes, ventas e inventario en hojas de c&aacute;lculo separadas &mdash; sin conexi&oacute;n entre s&iacute; ni respaldo real.</p></div>
      <div class="card"><div class="ic">&#128065;</div><h3>Sin historial del paciente</h3><p>No hay forma r&aacute;pida de ver las visitas y recetas anteriores de un paciente, ni de reusar su medida.</p></div>
      <div class="card"><div class="ic">&#127970;</div><h3>4 locales, 2 RUCs, sin vista &uacute;nica</h3><p>Cada local y cada RUC por su lado. No hay un tablero que muestre las ventas de todos juntos.</p></div>
    </div>
  </div>
</section>

<section id="propuesta" class="sec alt">
  <div class="wrap">
    <span class="tag">02 &middot; Lo que proponemos</span>
    <h2>Quipuy + un m&oacute;dulo hecho para &oacute;pticas</h2>
    <p class="p">Sobre <strong>Quipuy</strong> &mdash; nuestra plataforma de facturaci&oacute;n electr&oacute;nica e inventario, ya autorizada por el SRI y en producci&oacute;n &mdash; construimos un <strong>m&oacute;dulo de &oacute;ptica</strong> que cierra todo el circuito de atenci&oacute;n en un flujo continuo:</p>
    <div class="flow">
      <span>Paciente</span><i>&rarr;</i>
      <span>Examen + lectura de tickets</span><i>&rarr;</i>
      <span>Proforma de lunas</span><i>&rarr;</i>
      <span>Recibo + anticipo</span><i>&rarr;</i>
      <span>Orden al laboratorio</span><i>&rarr;</i>
      <span>Aviso de retiro</span><i>&rarr;</i>
      <span>Pago y entrega</span>
    </div>
    <p class="p">El dato del cliente y su receta se capturan <strong>una sola vez</strong> y viajan por todo el flujo. Un solo acceso para administrar los 4 locales y los 2 RUCs, con un <strong>panel del due&ntilde;o</strong> que muestra las ventas por sucursal de todo el negocio.</p>
  </div>
</section>

<section id="incluye" class="sec">
  <div class="wrap">
    <span class="tag">03 &middot; Qu&eacute; incluye</span>
    <h2>Todo lo que necesita su operaci&oacute;n</h2>
    <div class="cols">
      <div>
        <h4 class="ok">Incluido</h4>
        <ul class="li ok-li">
          <li>Ficha del paciente &uacute;nica (se captura una vez).</li>
          <li>Ficha de ex&aacute;menes digital, imprimible.</li>
          <li>Receta estructurada + historial de visitas del paciente.</li>
          <li>Proforma con opciones de lunas por material (varios precios).</li>
          <li>Promociones y combos (ej. marco de cortes&iacute;a con lunas premium).</li>
          <li>Recibo con anticipo y fecha de entrega (apartado).</li>
          <li>Orden de trabajo al laboratorio, imprimible.</li>
          <li>Aviso &laquo;ya puede retirar&raquo; por email + WhatsApp manual.</li>
          <li>Facturaci&oacute;n electr&oacute;nica SRI en sus dos RUCs.</li>
          <li>Inventario por local + control multi&ndash;sucursal.</li>
          <li>Un solo acceso para los 4 locales / 2 RUCs + panel del due&ntilde;o consolidado.</li>
        </ul>
      </div>
      <div>
        <h4 class="no">No incluye</h4>
        <ul class="li no-li">
          <li>Recordatorios autom&aacute;ticos de nuevas medidas y WhatsApp autom&aacute;tico por API (fase futura).</li>
          <li>Equipos y hardware (autorefract&oacute;metro, lens&oacute;metro, impresoras).</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="inversion" class="sec alt">
  <div class="wrap">
    <span class="tag">04 &middot; Inversi&oacute;n</span>
    <h2>Elija c&oacute;mo empezar</h2>
    <p class="p">Dos formas de arrancar. La diferencia es la <strong>lectura autom&aacute;tica de los tickets con inteligencia artificial</strong>: sube la foto del examen computarizado y del lens&oacute;metro, y el sistema llena la receta solo &mdash; el opt&oacute;metra la revisa y confirma. Probamos con sus propios tickets y la lectura sali&oacute; exacta.</p>
    <div class="planes">
      <div class="plan pop">
        <span class="badge">Recomendado</span>
        <h3>Con lectura por IA</h3>
        <div class="precio">$1.200 <small>+ IVA</small></div>
        <p class="pd">Pago &uacute;nico. Incluye todo el m&oacute;dulo &oacute;ptica <strong>+ lectura autom&aacute;tica de los 2 tickets con IA</strong> (con validaci&oacute;n del opt&oacute;metra).</p>
      </div>
      <div class="plan">
        <h3>Sin lectura por IA</h3>
        <div class="precio">$980 <small>+ IVA</small></div>
        <p class="pd">Pago &uacute;nico. Todo el m&oacute;dulo &oacute;ptica; la receta se escribe a mano en la ficha (sin lectura autom&aacute;tica de tickets).</p>
      </div>
    </div>
    <div class="cuadro">
      <div class="fila"><span>Forma de pago</span><strong>70% al iniciar &middot; 30% a la entrega</strong></div>
      <div class="fila"><span>Suscripci&oacute;n mensual (Quipuy, 4 locales / 2 RUCs)</span><strong>$60 / mes + IVA &nbsp;&middot;&nbsp; $15 por local</strong></div>
      <div class="fila"><span>Lectura con IA (solo opci&oacute;n con IA)</span><strong>al costo real, con informe mensual</strong></div>
    </div>
    <p class="nota">Todos los valores est&aacute;n en d&oacute;lares y <strong>no incluyen IVA</strong>. La lectura con IA se factura seg&uacute;n el uso real (referencia: ~1 centavo por examen); cada mes recibe un informe con la cantidad de lecturas y su costo.</p>
  </div>
</section>

<section id="costos" class="sec">
  <div class="wrap">
    <span class="tag">05 &middot; Costos recurrentes</span>
    <h2>Lo que paga mes a mes</h2>
    <p class="p">Sin sorpresas: la suscripci&oacute;n del sistema y, solo si elige la opci&oacute;n con IA, el consumo real de la inteligencia artificial.</p>
    <div class="grid g2">
      <div class="card">
        <h3>Suscripci&oacute;n Quipuy</h3>
        <div class="big">$60 <small>/ mes + IVA</small></div>
        <p>Los 4 locales y los 2 RUCs, con todos los m&oacute;dulos: facturaci&oacute;n, inventario, apartados y &oacute;ptica. Equivale a <strong>$15 por local al mes</strong>. Sin costo mensual extra por el m&oacute;dulo.</p>
      </div>
      <div class="card">
        <h3>Lectura con IA &mdash; al costo</h3>
        <div class="big">~$2&ndash;4 <small>/ mes por local</small></div>
        <p>Solo si elige la opci&oacute;n con IA. Se cobra exactamente lo que consume la inteligencia artificial, seg&uacute;n el volumen de ex&aacute;menes, con un informe mensual transparente.</p>
      </div>
    </div>
  </div>
</section>

<section id="cronograma" class="sec alt">
  <div class="wrap">
    <span class="tag">06 &middot; C&oacute;mo lo hacemos</span>
    <h2>Cronograma estimado</h2>
    <div class="timeline">
      <div class="ti"><span class="w">Semana 1</span><p>Arranca el desarrollo: configuraci&oacute;n de las 2 empresas (RUCs) y los 4 locales, carga del cat&aacute;logo e inventario, e inicio del m&oacute;dulo &oacute;ptica.</p></div>
      <div class="ti"><span class="w">Semanas 2&ndash;3</span><p>Desarrollo del m&oacute;dulo &oacute;ptica: ficha, receta, orden de trabajo y panel del due&ntilde;o. Lectura de tickets con IA (si aplica).</p></div>
      <div class="ti"><span class="w">Semana 4</span><p>Capacitaci&oacute;n al personal de los locales y puesta en marcha.</p></div>
    </div>
    <div class="need">
      <h4>Para arrancar necesitamos de usted</h4>
      <ul class="li ok-li">
        <li>Sus certificados de firma electr&oacute;nica ya existentes, para configurar la facturaci&oacute;n en el sistema.</li>
        <li>El cat&aacute;logo e inventario actual (sus Excel).</li>
        <li>Datos de los 4 locales: direcciones y establecimientos SRI.</li>
        <li>Acceso a los equipos para calibrar la lectura de tickets.</li>
      </ul>
    </div>
  </div>
</section>

<section id="experiencia" class="sec">
  <div class="wrap">
    <span class="tag">07 &middot; Con qui&eacute;n trabaja</span>
    <h2>No partimos de cero</h2>
    <p class="p"><strong>Quipuy</strong> (quipuy.com) es nuestra propia plataforma de facturaci&oacute;n electr&oacute;nica e inventario, <strong>autorizada por el SRI</strong> y en producci&oacute;n con negocios reales en Ecuador &mdash; incluyendo comercios con varios locales e inventario. El m&oacute;dulo de &oacute;ptica se construye sobre esa base ya probada: no es un experimento, es una extensi&oacute;n de un sistema que ya factura todos los d&iacute;as.</p>
    <div class="cta">
      <h3>&iquest;Arrancamos?</h3>
      <p>Cuando confirme la opci&oacute;n, preparamos la configuraci&oacute;n de sus 2 RUCs y coordinamos la carga de datos.</p>
      <div class="cta-btns">
        <a class="btn btn-wa" href="https://wa.me/593999174980?text=Hola%2C%20revis%C3%A9%20la%20propuesta%20del%20sistema%20para%20%C3%93ptica%20Pluss%20y%20deseo%20aceptarla%20para%20iniciar.%20Quedo%20atento%20a%20los%20siguientes%20pasos." target="_blank" rel="noopener">&#128241; Aceptar por WhatsApp</a>
        <a class="btn btn-mail" href="mailto:info@creativeweb.com.ec?subject=Aceptaci%C3%B3n%20de%20propuesta%20%E2%80%94%20%C3%93ptica%20Pluss&body=Estimados%20Creative%20Web%2C%0D%0A%0D%0ARevis%C3%A9%20la%20propuesta%20del%20sistema%20para%20la%20%C3%B3ptica%20y%20deseo%20aceptarla%20para%20iniciar%20el%20desarrollo.%20Por%20favor%20ind%C3%ADquenme%20los%20siguientes%20pasos%20y%20la%20coordinaci%C3%B3n%20para%20la%20configuraci%C3%B3n%20de%20nuestros%202%20RUCs.%0D%0A%0D%0AGracias.">&#9993;&#65039; Aceptar por correo</a>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="wrap">
    <img class="logo-f" src="data:image/png;base64,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UmVhZHlxyWU8AAADKWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgMTAuMC1jMDAwIDc5LmQyMGU0NjYzMCwgMjAyNS8xMi8wOS0wMjoxMToyMyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDI3LjUgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RkYzRDBDNzkzNEQ3MTFGMTg5NDRCRURBMjAzNEM2QTIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RkYzRDBDN0EzNEQ3MTFGMTg5NDRCRURBMjAzNEM2QTIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGRjNEMEM3NzM0RDcxMUYxODk0NEJFREEyMDM0QzZBMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGRjNEMEM3ODM0RDcxMUYxODk0NEJFREEyMDM0QzZBMiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmBcghwAABodSURBVHja7F0LnI5V/j8zmFwSYd1CE5XLJvy3mI21IhYpTLkUq3FpQvW39de/WkqyWpvJylJ2QkNILpNcSmpdZzGR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" alt="Creative Web">
    <p>H&eacute;ctor Santiago O&ntilde;a S&aacute;nchez &middot; RUC 1002906426001 &middot; WhatsApp 0999174980 &middot; info@creativeweb.com.ec</p>
    <p class="fine">Propuesta v&aacute;lida por 30 d&iacute;as. Precios sin IVA.</p>
  </div>
</footer>

</body>
</html>
