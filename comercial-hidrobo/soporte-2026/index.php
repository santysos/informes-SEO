<?php
session_start();
if (empty($_SESSION['auth_ch_soporte'])) {
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
<title>Plan de Soporte Web Anual 2026-2027 &mdash; Comercial Hidrobo</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
<style>
:root{
  --azul:#003383; --azul-osc:#00256a; --azul-claro:#3656a5;
  --hielo:#c5d4ed; --noche:#0e1a2e; --tinta:#001144;
  --papel:#ffffff; --gris:#8494b4; --verde:#25d366; --ambar:#f0a14b;
  --ancho:1120px;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scroll-padding-top:78px}
body{
  font-family:'Inter',system-ui,sans-serif; background:var(--noche); color:#eaf0fa;
  font-size:16px; line-height:1.6; -webkit-font-smoothing:antialiased;
}
a{color:inherit;text-decoration:none}
.wrap{max-width:var(--ancho);margin:0 auto;padding:0 26px}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;color:var(--hielo);
}
.mono{font-family:'JetBrains Mono',monospace}
h1,h2,h3{letter-spacing:-.025em;line-height:1.15;font-weight:800}
p.lead{color:var(--gris);font-size:17px;line-height:1.7}
.panel{
  background:linear-gradient(180deg,rgba(0,37,106,.42),rgba(0,17,68,.3));
  border:1px solid rgba(197,212,237,.15); border-radius:16px;
}
.sec{padding:70px 0}
.sec-cab{margin-bottom:34px}
.sec-cab h2{font-size:clamp(26px,3.4vw,40px);margin:12px 0 14px}
.btn{
  display:inline-flex;align-items:center;gap:10px;
  padding:15px 28px;border-radius:11px;font-weight:700;font-size:14.5px;transition:filter .2s;
}
.btn-azul{background:linear-gradient(135deg,var(--azul),var(--azul-claro));color:#fff}
.btn-azul:hover{filter:brightness(1.14)}
.btn-line{border:1.5px solid rgba(197,212,237,.35);color:#eaf0fa}
.btn-line:hover{border-color:var(--hielo)}

header.barra{
  position:sticky;top:0;z-index:60;background:rgba(14,26,46,.9);
  backdrop-filter:blur(16px);border-bottom:1px solid rgba(197,212,237,.12);
}
header.barra .wrap{display:flex;align-items:center;justify-content:space-between;gap:18px;height:60px}
.barra .id{display:flex;align-items:center;gap:11px}
.barra .pt{
  width:34px;height:34px;border-radius:9px;background:linear-gradient(135deg,var(--azul),var(--azul-claro));
  display:grid;place-items:center;color:#fff;font-weight:800;font-size:14px;
}
.barra .id p:first-child{font-family:'JetBrains Mono',monospace;font-size:9.5px;letter-spacing:.16em;text-transform:uppercase;color:var(--hielo)}
.barra .id p:last-child{font-size:12.5px;font-weight:600}
.barra nav{display:flex;gap:22px;font-size:13.5px;font-weight:600}
.barra nav a{color:var(--gris)} .barra nav a:hover{color:#eaf0fa}
.barra nav .salir{color:var(--hielo)}

/* portada */
.portada{position:relative;overflow:hidden;border-bottom:1px solid rgba(197,212,237,.12)}
.portada::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(760px 520px at 24% 6%, rgba(54,86,165,.32), transparent 62%);
}
.portada .wrap{position:relative;z-index:2;padding-top:60px;padding-bottom:56px;text-align:center}
.portada h1{font-size:clamp(32px,5vw,58px);margin:18px auto 22px;max-width:840px}
.portada .lead{max-width:640px;margin:0 auto 32px}
.chips{display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-bottom:34px}
.chip{
  background:rgba(0,51,131,.4);border:1px solid rgba(197,212,237,.2);
  border-radius:999px;padding:8px 17px;font-size:13px;font-weight:600;
}
.chip b{color:var(--hielo)}

/* comparativa año anterior */
.compara{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:rgba(197,212,237,.15);border:1px solid rgba(197,212,237,.15);border-radius:14px;overflow:hidden}
.compara > div{background:rgba(0,17,68,.5);padding:24px 26px}
.compara .et{font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--gris);margin-bottom:12px}
.compara ul{list-style:none;display:grid;gap:9px}
.compara li{font-size:13.8px;display:flex;gap:10px;line-height:1.55}
.compara li::before{content:'—';color:var(--azul-claro);flex-shrink:0}
.compara .nuevo li::before{content:'+';color:var(--verde);font-weight:800}

/* bloques de servicio */
.grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.card{padding:24px 22px}
.card .ic{
  width:40px;height:40px;border-radius:10px;
  background:rgba(0,51,131,.55);border:1px solid rgba(197,212,237,.2);
  display:grid;place-items:center;margin-bottom:14px;
}
.card .ic svg{width:19px;height:19px;color:var(--hielo)}
.card h3{font-size:16px;margin-bottom:8px}
.card p{font-size:13.5px;color:var(--gris);line-height:1.65}

/* tabla de licencias */
.tabla{width:100%;border-collapse:collapse;border:1px solid rgba(197,212,237,.15);border-radius:12px;overflow:hidden}
.tabla th{
  background:rgba(0,51,131,.5);padding:13px 16px;text-align:left;
  font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.12em;
  text-transform:uppercase;color:var(--hielo);font-weight:700;
}
.tabla td{padding:14px 16px;font-size:14px;border-top:1px solid rgba(197,212,237,.1);background:rgba(0,17,68,.35)}
.tabla td:last-child{text-align:right;font-family:'JetBrains Mono',monospace;font-weight:700;white-space:nowrap}
.tabla tr.total td{background:rgba(0,51,131,.45);font-weight:700}
.tabla small{display:block;color:var(--gris);font-size:12px;margin-top:3px;font-weight:400}

/* sitios */
.sitios{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.sitio{padding:26px}
.sitio .dom{font-family:'JetBrains Mono',monospace;font-size:13px;color:var(--hielo);margin-bottom:6px}
.sitio h3{font-size:20px;margin-bottom:10px}
.sitio p{font-size:13.5px;color:var(--gris);line-height:1.6;margin-bottom:16px}
.sitio .precio{font-size:32px;font-weight:800;letter-spacing:-.03em}
.sitio .precio span{font-size:13px;color:var(--gris);font-weight:600}
.sitio .tag{
  display:inline-block;background:rgba(37,211,102,.14);border:1px solid rgba(37,211,102,.4);
  color:var(--verde);font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;padding:4px 9px;border-radius:5px;margin-bottom:12px;
}

.total-caja{
  margin-top:16px;padding:26px 30px;display:flex;align-items:center;
  justify-content:space-between;gap:24px;flex-wrap:wrap;
}
.total-caja .lbl{font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--gris)}
.total-caja .big{font-size:44px;font-weight:900;letter-spacing:-.04em}
.total-caja .iva{color:var(--gris);font-weight:600;font-size:14px}
.total-caja .ahorro{font-size:13.5px;color:var(--verde);font-weight:600}

.nota{background:rgba(0,51,131,.28);border:1px solid rgba(197,212,237,.2);border-radius:12px;padding:20px 22px}
.nota .t{font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--hielo);margin-bottom:9px}
.nota p{font-size:14px;line-height:1.7;color:#dbe5f5}

.cond{display:grid;grid-template-columns:repeat(2,1fr);gap:22px 40px}
.cond p:first-child{font-size:14px;font-weight:700;margin-bottom:4px}
.cond p:last-child{font-size:13.5px;color:var(--gris);line-height:1.6}

.cierre{text-align:center;padding:76px 0 88px}
.cierre h2{font-size:clamp(27px,3.8vw,42px);margin-bottom:16px}
.cierre p{color:var(--gris);font-size:17px;max-width:580px;margin:0 auto 30px;line-height:1.7}

@media print{
  body{background:#fff;color:#0e1a2e}
  .barra,.no-print{display:none!important}
  .panel,.compara>div,.tabla td,.nota{background:#f4f7fc!important;border-color:#d5deef!important}
  section{page-break-inside:avoid}
}
@media(max-width:900px){
  .grid3,.sitios,.compara,.cond{grid-template-columns:1fr}
  .barra nav a:not(.salir){display:none}
}
</style>
</head>
<body>

<header class="barra">
  <div class="wrap">
    <div class="id">
      <div class="pt">CH</div>
      <div>
        <p>Creative Web &middot; Renovación</p>
        <p>Comercial Hidrobo &middot; 2026-2027</p>
      </div>
    </div>
    <nav>
      <a href="#incluye">Qué incluye</a>
      <a href="#inversion">Inversión</a>
      <a href="logout.php" class="salir">Salir</a>
    </nav>
  </div>
</header>

<!-- PORTADA -->
<section class="portada">
  <div class="wrap">
    <p class="eyebrow">Plan de soporte y mantenimiento web &middot; período 2026-2027</p>
    <h1>Sus dos sitios, cuidados<br>durante todo el año</h1>
    <p class="lead">
      Renovación del plan de soporte para <strong>comercialhidrobo.com</strong>, ahora con la
      opción de cubrir también <strong>okcars.ec</strong>, que corre sobre las mismas licencias
      y hoy está fuera de cualquier plan.
    </p>
    <div class="chips">
      <span class="chip"><b>12</b> meses de cobertura</span>
      <span class="chip"><b>2</b> sitios</span>
      <span class="chip"><b>24</b> informes al año</span>
      <span class="chip"><b>4 h</b> de soporte al mes</span>
    </div>
    <a href="#inversion" class="btn btn-azul no-print">Ver la inversión</a>
  </div>
</section>

<!-- QUÉ CAMBIA -->
<section class="sec">
  <div class="wrap">
    <div class="sec-cab">
      <p class="eyebrow">Respecto al plan anterior</p>
      <h2>Qué se mantiene y qué se suma</h2>
      <p class="lead" style="max-width:720px">
        El valor del plan para comercialhidrobo.com <strong>se mantiene en $380</strong>, igual
        que el período anterior. Lo que cambia es lo que incluye: se conserva todo lo que ya
        tenía y se suman dos servicios que hasta ahora se hacían sin estar cotizados.
      </p>
    </div>
    <div class="compara">
      <div>
        <div class="et">Se mantiene</div>
        <ul>
          <li>Licencia anual de Elementor Pro</li>
          <li>Licencia anual de Crocoblock para Elementor</li>
          <li>Actualización mensual de plugins y componentes</li>
          <li>Respaldo completo del sitio, cada mes</li>
          <li>Comprobación de seguridad y malware</li>
          <li>Comprobación de rendimiento</li>
          <li>Informe mensual detallado</li>
        </ul>
      </div>
      <div class="nuevo">
        <div class="et" style="color:var(--verde)">Nuevo en 2026-2027</div>
        <ul>
          <li><strong>2 horas mensuales de soporte por cada sitio</strong> — 4 al mes, 48 al año. A tarifa normal de $25 la hora, son $1.200 anuales que no se cobran</li>
          <li><strong>Optimización de velocidad trimestral</strong> con limpieza de base de datos y revisión de imágenes</li>
          <li><strong>Cobertura de okcars.ec</strong> bajo el mismo plan, con su propio informe mensual</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- QUÉ INCLUYE -->
<section class="sec" id="incluye" style="padding-top:0">
  <div class="wrap">
    <div class="sec-cab">
      <p class="eyebrow">El detalle</p>
      <h2>Qué se hace cada mes</h2>
    </div>
    <div class="grid3">
      <div class="panel card">
        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 4.9 5.4.8-3.9 3.8.9 5.4-4.8-2.5-4.8 2.5.9-5.4L4.2 7.7l5.4-.8z"/></svg></div>
        <h3>Licencias al día</h3>
        <p>Elementor Pro y Crocoblock renovadas y activas. Sin ellas, el sitio deja de recibir actualizaciones y con el tiempo se rompe.</p>
      </div>
      <div class="panel card">
        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h16v3H4zm0 5.7h16v2.6H4zm0 5.3h16V18H4z"/></svg></div>
        <h3>Actualizaciones</h3>
        <p>WordPress, tema y todos los plugins revisados y actualizados cada mes, comprobando después que el sitio siga funcionando.</p>
      </div>
      <div class="panel card">
        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L4 5.4v6.2c0 5 3.4 9.2 8 10.4 4.6-1.2 8-5.4 8-10.4V5.4zm-1 13.5l-3.2-3.2 1.5-1.5 1.7 1.7 4-4 1.5 1.5z"/></svg></div>
        <h3>Seguridad</h3>
        <p>Revisión de vulnerabilidades, escaneo de malware y comprobación de la integridad del sitio.</p>
      </div>
      <div class="panel card">
        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 3h14v4H5zm0 6h14v12H5zm3 3v6h8v-6z"/></svg></div>
        <h3>Respaldos</h3>
        <p>Copia completa mensual de archivos y base de datos, guardada fuera del servidor para poder restaurar ante cualquier problema.</p>
      </div>
      <div class="panel card">
        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 2L3 14h7l-1 8 10-12h-7z"/></svg></div>
        <h3>Rendimiento</h3>
        <p>Medición de los tiempos de carga cada mes y, cada tres meses, una optimización a fondo con limpieza de base de datos.</p>
      </div>
      <div class="panel card">
        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 4h18v11H8l-5 4.5z"/></svg></div>
        <h3>2 horas de soporte por sitio</h3>
        <p>Cada mes, por cada web — 48 horas al año en total. Fuera de plan, la hora técnica cuesta $25. Cambios menores sin cotizar aparte: un banner, un texto, subir un documento o corregir un dato.</p>
      </div>
    </div>
  </div>
</section>

<!-- INFORME -->
<section class="sec" style="padding-top:0">
  <div class="wrap">
    <div class="panel" style="padding:34px 38px">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:36px" class="grid3-informe">
        <div>
          <p class="eyebrow">Cada mes en su correo</p>
          <h2 style="font-size:26px;margin:12px 0 14px">El informe mensual</h2>
          <p style="font-size:14.5px;color:var(--gris);line-height:1.7">
            Un documento claro con todo lo que se hizo en el mes, para que sepan exactamente
            en qué se invirtió el plan. Uno por cada sitio: <strong>24 informes al año</strong>.
          </p>
        </div>
        <div>
          <table class="tabla">
            <tr><td>Actualizaciones aplicadas<small>Qué se actualizó y en qué fecha</small></td><td>✓</td></tr>
            <tr><td>Respaldos realizados<small>Cuándo se hizo y dónde quedó guardado</small></td><td>✓</td></tr>
            <tr><td>Seguridad<small>Vulnerabilidades revisadas y malware</small></td><td>✓</td></tr>
            <tr><td>Rendimiento<small>Tiempo de carga del mes</small></td><td>✓</td></tr>
            <tr><td>Disponibilidad<small>Si el sitio estuvo caído en algún momento</small></td><td>✓</td></tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INVERSIÓN -->
<section class="sec" id="inversion" style="padding-top:0">
  <div class="wrap">
    <div class="sec-cab" style="text-align:center">
      <p class="eyebrow">Inversión</p>
      <h2>Cuánto cuesta</h2>
    </div>

    <div class="sitios">
      <div class="panel sitio">
        <div class="dom">comercialhidrobo.com</div>
        <h3>Sitio principal</h3>
        <p>Sitio corporativo con catálogo de vehículos, postventa y blog activo, con más de 4.300 visitas orgánicas al mes.</p>
        <div class="precio">$380 <span>+ IVA / año</span></div>
      </div>
      <div class="panel sitio">
        <span class="tag">Nuevo en el plan</span>
        <div class="dom">okcars.ec</div>
        <h3>Segundo sitio</h3>
        <p>Corre sobre Elementor Pro y Jet igual que el principal, y hoy no está cubierto por ningún plan de soporte.</p>
        <div class="precio">$290 <span>+ IVA / año</span></div>
      </div>
    </div>

    <div class="panel total-caja">
      <div>
        <div class="lbl">Total anual por los dos sitios</div>
        <div class="ahorro" style="margin-top:6px">Ahorran $90 frente a contratar dos planes por separado</div>
      </div>
      <div style="display:flex;align-items:baseline;gap:12px">
        <span class="big">$670</span>
        <span class="iva">+ IVA</span>
      </div>
    </div>

    <!-- desglose de licencias -->
    <div style="margin-top:34px">
      <p class="eyebrow" style="margin-bottom:14px">De dónde sale el valor</p>
      <table class="tabla">
        <thead><tr><th>Concepto</th><th style="text-align:right">Costo anual</th></tr></thead>
        <tbody>
          <tr><td>Licencia Elementor Pro<small>Constructor visual sobre el que está hecho el sitio</small></td><td>$99,00</td></tr>
          <tr><td>Licencia Crocoblock para Elementor<small>Conjunto de plugins Jet que sostienen el catálogo y los filtros</small></td><td>$199,00</td></tr>
          <tr class="total"><td>Subtotal solo en licencias</td><td>$298,00</td></tr>
          <tr><td>Mantenimiento, respaldos, seguridad e informes mensuales</td><td>$82,00</td></tr>
          <tr class="total"><td>Plan anual comercialhidrobo.com</td><td>$380,00</td></tr>
        </tbody>
      </table>
      <div class="nota" style="margin-top:18px">
        <div class="t">El precio no sube</div>
        <p>
          comercialhidrobo.com mantiene el mismo valor del período anterior: <strong>$380 + IVA
          al año</strong>. Como las licencias por sí solas cuestan $298, el trabajo de
          mantenimiento queda en $82 anuales — poco menos de $7 al mes. Y este año, además,
          entran las horas de soporte y la optimización trimestral sin costo adicional.
        </p>
      </div>

      <!-- valor de las horas incluidas -->
      <div style="margin-top:26px">
        <p class="eyebrow" style="margin-bottom:14px">Lo que además va incluido y no se cobra</p>
        <table class="tabla">
          <thead><tr><th>Soporte incluido</th><th style="text-align:right">Si se cobrara aparte</th></tr></thead>
          <tbody>
            <tr><td>Tarifa de hora técnica fuera de plan<small>Es lo que cuesta hoy cualquier cambio pedido suelto</small></td><td>$25,00 / hora</td></tr>
            <tr><td>2 horas mensuales por sitio<small>24 horas al año por cada web</small></td><td>$50,00 / mes</td></tr>
            <tr class="total"><td>Valor anual del soporte, por sitio</td><td>$600,00</td></tr>
            <tr class="total"><td>Valor anual del soporte, por los dos sitios</td><td>$1.200,00</td></tr>
          </tbody>
        </table>
        <div class="nota" style="margin-top:16px;border-color:rgba(37,211,102,.4);background:rgba(37,211,102,.08)">
          <div class="t" style="color:var(--verde)">Para dimensionarlo</div>
          <p>
            Las 48 horas de soporte que entran en el plan valdrían <strong>$1.200 al año</strong>
            si se cobraran por hora. El plan completo por los dos sitios cuesta $670. Dicho de
            otro modo: con usar poco más de la mitad de las horas, el plan ya se pagó solo.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CONDICIONES -->
<section class="sec" style="padding-top:0">
  <div class="wrap">
    <div class="panel" style="padding:28px 32px">
      <p class="eyebrow" style="margin-bottom:20px">Condiciones</p>
      <div class="cond">
        <div>
          <p>Vigencia</p>
          <p>12 meses desde la fecha de contratación, con las licencias activas durante todo el período.</p>
        </div>
        <div>
          <p>Forma de pago</p>
          <p>Pago anual por adelantado. Es lo que permite renovar las licencias por el año completo.</p>
        </div>
        <div>
          <p>Horas de soporte</p>
          <p>2 horas mensuales por cada sitio, 4 en total. No se acumulan de un mes al siguiente.</p>
        </div>
        <div>
          <p>Qué no incluye</p>
          <p>Desarrollo de funciones nuevas, rediseños y creación de contenido. Se cotizan aparte y por escrito.</p>
        </div>
        <div>
          <p>Hosting y dominio</p>
          <p>No están incluidos: los mantiene el cliente con su proveedor actual.</p>
        </div>
        <div>
          <p>Las licencias son suyas</p>
          <p>Elementor Pro y Crocoblock quedan activas sobre sus dominios mientras el plan esté vigente.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CIERRE -->
<section class="cierre">
  <div class="wrap">
    <p class="eyebrow">Siguiente paso</p>
    <h2>¿Renovamos?</h2>
    <p>
      Cualquier duda sobre el alcance o la forma de pago, escríbanos y la resolvemos.
    </p>
    <a href="https://wa.me/593999174980?text=Hola%2C%20quiero%20conversar%20sobre%20la%20renovaci%C3%B3n%20del%20plan%20de%20soporte%20web"
       class="btn btn-azul no-print">
      <svg viewBox="0 0 24 24" fill="currentColor" style="width:19px;height:19px"><path d="M12 2a10 10 0 00-8.6 15l-1.3 4.7 4.8-1.3A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.8.8.8-2.8-.2-.3A8 8 0 1112 20z"/></svg>
      Escribir por WhatsApp
    </a>
    <p class="mono" style="font-size:12.5px;color:var(--gris);margin-top:26px">
      Ing. Santiago Oña Sánchez &middot; Creative Web<br>
      099 917 4980 &middot; 062 924 887 &middot; info@creativeweb.com.ec<br>
      Modesto Jaramillo 3-60 y Abdón Calderón, 2do piso, Otavalo
    </p>
  </div>
</section>

</body>
</html>
