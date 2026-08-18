<?php
session_start();
if (empty($_SESSION['auth_gordillo'])) {
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
<title>Propuesta: sitio web y posicionamiento &mdash; Dr. Ren&eacute; Gordillo</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
<style>
:root{
  --noche:#04121A; --carbon:#0E2A35; --panel:#0B222C;
  --aqua:#2ED3C6; --aqua-osc:#12A99C; --ambar:#F0A14B;
  --hueso:#F4F7F7; --niebla:#9FB5BD; --linea:rgba(255,255,255,.10);
  --ancho:1120px;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scroll-padding-top:80px}
body{
  font-family:'Sora',system-ui,sans-serif; background:var(--noche); color:var(--hueso);
  font-size:16px; line-height:1.6; -webkit-font-smoothing:antialiased;
}
img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
.wrap{max-width:var(--ancho);margin:0 auto;padding:0 26px}

.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;color:var(--aqua);
}
.eyebrow.gris{color:var(--niebla)}
.serif{font-family:'Instrument Serif',serif;font-style:italic;font-weight:400}
.mono{font-family:'JetBrains Mono',monospace}
h1,h2,h3{letter-spacing:-.03em;line-height:1.08;font-weight:800}
p.lead{color:var(--niebla);font-size:17px;line-height:1.7}

.panel{
  background:linear-gradient(180deg,rgba(14,42,53,.66),rgba(11,34,44,.5));
  border:1px solid var(--linea); border-radius:20px;
}
.sec{padding:76px 0}
.sec-cab{margin-bottom:38px}
.sec-cab h2{font-size:clamp(27px,3.6vw,42px);margin:12px 0 14px}

.btn{
  display:inline-flex;align-items:center;gap:10px;
  padding:15px 28px;border-radius:12px;font-weight:700;font-size:14.5px;
  transition:filter .2s,transform .12s;
}
.btn:active{transform:translateY(1px)}
.btn-aqua{background:linear-gradient(135deg,var(--aqua),var(--aqua-osc));color:var(--noche)}
.btn-aqua:hover{filter:brightness(1.08)}
.btn-line{border:1.5px solid rgba(255,255,255,.28);color:var(--hueso)}
.btn-line:hover{border-color:var(--aqua);color:var(--aqua)}

/* barra */
header.barra{
  position:sticky;top:0;z-index:60;
  background:rgba(4,18,26,.86);backdrop-filter:blur(18px);
  border-bottom:1px solid var(--linea);
}
header.barra .wrap{display:flex;align-items:center;justify-content:space-between;gap:18px;height:62px}
.barra .id{display:flex;align-items:center;gap:11px}
.barra .pt{
  width:34px;height:34px;border-radius:10px;
  background:linear-gradient(135deg,var(--aqua),var(--aqua-osc));
  display:grid;place-items:center;color:var(--noche);font-weight:800;font-size:15px;
}
.barra .id div p:first-child{font-family:'JetBrains Mono',monospace;font-size:9.5px;letter-spacing:.16em;text-transform:uppercase;color:var(--aqua)}
.barra .id div p:last-child{font-size:12.5px;font-weight:600}
.barra nav{display:flex;align-items:center;gap:22px;font-size:13.5px;font-weight:600}
.barra nav a{color:var(--niebla)}
.barra nav a:hover{color:var(--hueso)}
.barra nav .salir{color:var(--aqua)}

/* portada */
.portada{position:relative;overflow:hidden;border-bottom:1px solid var(--linea)}
.portada::before{
  content:'';position:absolute;inset:0;z-index:0;
  background:
    radial-gradient(760px 520px at 22% 8%, rgba(46,211,198,.15), transparent 62%),
    radial-gradient(560px 420px at 88% 82%, rgba(240,161,75,.07), transparent 60%);
}
.portada .wrap{position:relative;z-index:2;display:grid;grid-template-columns:1.12fr .88fr;gap:38px;align-items:center;padding-top:56px;padding-bottom:56px}
.portada h1{font-size:clamp(36px,5.2vw,62px);margin:18px 0 22px}
.portada h1 .serif{color:var(--aqua);display:block}
.portada .lead{max-width:460px;margin-bottom:30px}
.acc{display:flex;gap:12px;flex-wrap:wrap}
.retrato{position:relative;display:grid;place-items:center}
.retrato img{
  width:100%;max-width:330px;
  filter:drop-shadow(0 44px 70px rgba(0,0,0,.62));
}
.credencial{
  position:absolute;background:rgba(11,34,44,.94);
  border:1px solid var(--linea);border-left:2px solid var(--aqua);
  border-radius:12px;padding:11px 15px;backdrop-filter:blur(10px);
  box-shadow:0 16px 40px rgba(0,0,0,.45);
}
.credencial .t{font-size:13px;font-weight:700;line-height:1.3}
.credencial .s{font-size:11px;color:var(--niebla);margin-top:3px}
.credencial.c1{top:16%;left:-8%}
.credencial.c2{bottom:22%;right:-6%;border-left-color:var(--ambar)}

/* cifras del diagnóstico */
.diag{background:var(--carbon);border-block:1px solid var(--linea)}
.diag-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--linea);border:1px solid var(--linea);border-radius:16px;overflow:hidden}
.dg{background:var(--noche);padding:26px 22px}
.dg .n{font-size:34px;font-weight:800;letter-spacing:-.04em;color:var(--ambar);line-height:1}
.dg .t{font-size:13px;color:var(--niebla);margin-top:9px;line-height:1.5}

/* lista de hallazgos */
.hall{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
.h-item{background:rgba(14,42,53,.5);border:1px solid var(--linea);border-radius:14px;padding:20px 22px}
.h-item h4{font-size:15px;font-weight:700;margin-bottom:7px;display:flex;align-items:center;gap:9px}
.h-item h4::before{content:'';width:7px;height:7px;border-radius:50%;background:var(--ambar);flex-shrink:0}
.h-item p{font-size:13.5px;color:var(--niebla);line-height:1.6}

/* bloques de proyecto */
.proy{margin-bottom:22px;overflow:hidden}
.proy-cab{padding:28px 32px;border-bottom:1px solid var(--linea);display:flex;flex-wrap:wrap;align-items:flex-start;justify-content:space-between;gap:20px}
.proy-cab .num{
  font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.16em;
  color:var(--aqua);margin-bottom:9px;
}
.proy-cab h3{font-size:26px;margin-bottom:9px}
.proy-cab p{font-size:14.5px;color:var(--niebla);max-width:640px;line-height:1.65}
.proy-precio{text-align:right}
.proy-precio .antes{
  font-size:17px;font-weight:600;color:var(--niebla);
  text-decoration:line-through;text-decoration-color:rgba(240,161,75,.85);
  margin-bottom:2px;
}
.proy-precio .v{font-size:31px;font-weight:800;letter-spacing:-.03em;color:var(--aqua)}
.proy-precio .u{font-family:'JetBrains Mono',monospace;font-size:11px;color:var(--niebla);margin-top:3px}
.proy-cuerpo{padding:28px 32px}

.cols-3{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--linea);border:1px solid var(--linea);border-radius:14px;overflow:hidden}
.c3{background:rgba(4,18,26,.6);padding:20px 22px}
.c3 h5{font-size:14px;font-weight:700;margin-bottom:7px}
.c3 p{font-size:12.8px;color:var(--niebla);line-height:1.6}

.paginas{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-top:20px}
.pag{
  display:flex;align-items:center;gap:12px;
  background:rgba(4,18,26,.55);border:1px solid var(--linea);
  border-radius:11px;padding:13px 16px;font-size:13.8px;
}
.pag .i{
  font-family:'JetBrains Mono',monospace;font-size:10.5px;color:var(--aqua);
  border:1px solid rgba(46,211,198,.35);border-radius:6px;padding:2px 7px;flex-shrink:0;
}
.pag b{font-weight:600}
.pag span{color:var(--niebla);font-size:12.5px}

/* meses del plan */
.meses{display:grid;gap:12px}
.mes{display:grid;grid-template-columns:112px 1fr;gap:22px;background:rgba(4,18,26,.55);border:1px solid var(--linea);border-radius:13px;padding:20px 24px}
.mes .et{font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.1em;color:var(--aqua);text-transform:uppercase}
.mes h5{font-size:15.5px;font-weight:700;margin-bottom:8px}
.mes ul{list-style:none;display:grid;gap:6px}
.mes li{font-size:13.5px;color:var(--niebla);display:flex;gap:10px;line-height:1.55}
.mes li::before{content:'—';color:var(--aqua);flex-shrink:0}

/* inversión */
.inv-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:20px;align-items:stretch}
.inv-card{padding:32px;display:flex;flex-direction:column}
.inv-linea{display:flex;align-items:baseline;justify-content:space-between;gap:14px;padding:14px 0;border-bottom:1px solid var(--linea)}
.inv-linea:last-of-type{border-bottom:0}
.inv-linea .d{font-size:14.5px}
.inv-linea .d small{display:block;color:var(--niebla);font-size:12px;margin-top:3px}
.inv-linea .v{font-family:'JetBrains Mono',monospace;font-weight:700;font-size:16px;white-space:nowrap}
.inv-total{margin-top:auto;padding-top:22px;border-top:1px solid var(--linea);display:flex;align-items:baseline;flex-wrap:wrap;gap:12px}
.inv-total .lbl{font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--niebla);margin-right:auto}
.inv-total .big{font-size:46px;font-weight:800;letter-spacing:-.04em;color:var(--aqua);line-height:1}
.inv-total .iva{color:var(--niebla);font-weight:600;font-size:14px}


.precio-tach{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.precio-tach .tachado{
  font-size:23px;font-weight:600;color:var(--niebla);
  text-decoration:line-through;text-decoration-color:rgba(240,161,75,.9);
}
.precio-tach .etiq{
  font-family:'JetBrains Mono',monospace;font-size:9.5px;font-weight:700;
  letter-spacing:.14em;text-transform:uppercase;
  background:rgba(240,161,75,.16);border:1px solid rgba(240,161,75,.4);
  color:var(--ambar);padding:4px 9px;border-radius:6px;
}
.opcion-pago{
  background:rgba(4,18,26,.55);border:1px solid var(--linea);
  border-radius:12px;padding:16px 18px;margin-bottom:11px;
}
.opcion-pago.destacada{border-color:rgba(46,211,198,.45);background:rgba(46,211,198,.07)}
.opcion-pago .op-cab{display:flex;align-items:center;justify-content:space-between;gap:14px}
.opcion-pago .op-t{font-size:14.5px;font-weight:700}
.opcion-pago .op-s{font-size:12.5px;color:var(--niebla);margin-top:3px}
.opcion-pago.destacada .op-s{color:var(--aqua)}
.opcion-pago .op-v{
  font-family:'JetBrains Mono',monospace;font-weight:700;font-size:22px;
  white-space:nowrap;letter-spacing:-.02em;
}
.opcion-pago.destacada .op-v{color:var(--aqua)}
.totales{margin-top:20px;padding:26px 30px;display:grid;grid-template-columns:1fr 1fr;gap:30px}
.totales .tot .et{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:var(--niebla);margin-bottom:9px}
.totales .tot .v{font-size:31px;font-weight:800;letter-spacing:-.03em;color:var(--aqua);line-height:1}
.totales .tot .v span{font-size:13px;font-weight:600;color:var(--niebla)}
.totales .tot .d{font-size:12.5px;color:var(--niebla);margin-top:8px;line-height:1.5}

.nota-b{background:rgba(46,211,198,.07);border:1px solid rgba(46,211,198,.24);border-radius:13px;padding:18px 20px}
.nota-b .t{font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.15em;text-transform:uppercase;color:var(--aqua);margin-bottom:8px}
.nota-b p{font-size:13.8px;color:var(--hueso);line-height:1.65;opacity:.92}

.nota-a{background:rgba(240,161,75,.08);border:1px solid rgba(240,161,75,.26);border-radius:13px;padding:18px 20px}
.nota-a .t{font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.15em;text-transform:uppercase;color:var(--ambar);margin-bottom:8px}
.nota-a p{font-size:13.8px;color:var(--hueso);line-height:1.65;opacity:.92}

.cond{display:grid;grid-template-columns:repeat(2,1fr);gap:22px 40px}
.cond div p:first-child{font-size:14px;font-weight:700;margin-bottom:4px}
.cond div p:last-child{font-size:13.5px;color:var(--niebla);line-height:1.6}

.cierre{text-align:center;padding:84px 0 96px}
.cierre h2{font-size:clamp(28px,4vw,44px);margin-bottom:16px}
.cierre p{color:var(--niebla);font-size:17px;max-width:600px;margin:0 auto 30px;line-height:1.7}

@media print{
  body{background:#fff;color:#0b2029}
  .barra,.no-print{display:none!important}
  .panel,.h-item,.pag,.mes,.c3,.dg{background:#f4f7f7!important;border-color:#d8e2e5!important}
  .portada::before{display:none}
  section{page-break-inside:avoid}
}
@media(max-width:960px){
  .portada .wrap{grid-template-columns:1fr}
  .retrato{order:-1}
  .retrato img{max-width:230px}
  .credencial{display:none}
  .diag-grid{grid-template-columns:repeat(2,1fr)}
  .hall,.paginas,.cond{grid-template-columns:1fr}
  .cols-3{grid-template-columns:1fr}
  .inv-grid{grid-template-columns:1fr}
  .totales{grid-template-columns:1fr;gap:22px}
  .barra nav a:not(.salir){display:none}
  .mes{grid-template-columns:1fr;gap:10px}
}
@media(max-width:560px){
  .diag-grid{grid-template-columns:1fr}
  .proy-cab,.proy-cuerpo,.inv-card{padding:22px}
}
</style>
</head>
<body>

<header class="barra">
  <div class="wrap">
    <div class="id">
      <div class="pt">G</div>
      <div>
        <p>Creative Web &middot; Propuesta</p>
        <p>Dr. René Gordillo &middot; Agosto 2026</p>
      </div>
    </div>
    <nav>
      <a href="#diagnostico">Diagnóstico</a>
      <a href="#proyectos">Propuesta</a>
      <a href="#inversion">Inversión</a>
      <a href="logout.php" class="salir">Salir</a>
    </nav>
  </div>
</header>

<!-- ======== PORTADA ======== -->
<section class="portada">
  <div class="wrap">
    <div>
      <p class="eyebrow">Sitio web nuevo + posicionamiento en Google</p>
      <h1>Su trayectoria no<br>aparece en internet.<span class="serif">Vamos a cambiarlo.</span></h1>
      <p class="lead">
        Usted realizó la primera cirugía HIPEC de Ibarra y la primera serie documentada de
        tiroidectomía endoscópica del Ecuador. Hoy, un paciente que lo busca en Google no
        encuentra nada de eso — y tampoco encuentra dónde dejar sus datos.
      </p>
      <div class="acc">
        <a href="#inversion" class="btn btn-aqua">Ver la inversión</a>
      </div>
    </div>
    <div class="retrato">
      <img src="assets/dr-retrato.png" alt="Dr. René Gordillo">
      <div class="credencial c1">
        <div class="t">American College of Surgeons</div>
        <div class="s">Miembro acreditado</div>
      </div>
      <div class="credencial c2">
        <div class="t">1.ª cirugía HIPEC en Ibarra</div>
        <div class="s">Cáncer avanzado de abdomen</div>
      </div>
    </div>
  </div>
</section>

<!-- ======== DIAGNÓSTICO ======== -->
<section class="sec diag" id="diagnostico">
  <div class="wrap">
    <div class="sec-cab">
      <p class="eyebrow">Lo que encontramos</p>
      <h2>El diagnóstico de su web actual</h2>
      <p class="lead" style="max-width:720px">
        Revisamos su sitio en Wix con las mismas herramientas que usa Google. Todo lo que
        sigue está medido, no es una opinión.
      </p>
    </div>

    <div class="diag-grid" style="margin-bottom:26px">
      <div class="dg">
        <div class="n">9,1 s</div>
        <div class="t">tarda en cargar por completo. Google recomienda menos de 2,5 s.</div>
      </div>
      <div class="dg">
        <div class="n">0</div>
        <div class="t">formularios en todo el sitio. No hay dónde dejar los datos.</div>
      </div>
      <div class="dg">
        <div class="n">174</div>
        <div class="t">palabras en la portada. Google necesita texto para entender de qué trata.</div>
      </div>
      <div class="dg">
        <div class="n">2020</div>
        <div class="t">última publicación del blog. Todavía habla de la pandemia.</div>
      </div>
    </div>

    <div class="hall">
      <div class="h-item">
        <h4>El logo no carga</h4>
        <p>En la esquina superior izquierda aparece el recuadro de imagen rota. Es lo primero que ve un paciente nuevo.</p>
      </div>
      <div class="h-item">
        <h4>Textos superpuestos</h4>
        <p>Su nombre se encima con el titular «Tu cambio YA!!!» y hay un «2026» suelto flotando en la cabecera.</p>
      </div>
      <div class="h-item">
        <h4>Sus servicios no compiten en Google</h4>
        <p>Las páginas de obesidad y tiroides no tienen título ni encabezado propio. Para Google son páginas sin tema definido.</p>
      </div>
      <div class="h-item">
        <h4>Su marca está mal escrita</h4>
        <p>En los resultados de búsqueda aparece como «Drrenegordillo», todo junto, en lugar de su nombre.</p>
      </div>
      <div class="h-item">
        <h4>El teléfono no está en la portada</h4>
        <p>El único canal de contacto es un ícono de WhatsApp en la cabecera. Quien prefiere llamar, se va.</p>
      </div>
      <div class="h-item">
        <h4>11 páginas viejas siguen visibles</h4>
        <p>Campañas de 2019 y copias de páginas que Google todavía indexa y que compiten contra sus páginas buenas.</p>
      </div>
    </div>

    <div class="nota-b" style="margin-top:24px">
      <div class="t">La conclusión comercial</div>
      <p>
        Su web sí recibe visitas. El problema es que no las puede convertir: quien llega no
        encuentra teléfono visible ni formulario, y si viene desde el celular, la mayoría se
        va antes de que la página termine de cargar. Ese es el punto más caro de todos, y
        también el más fácil de resolver.
      </p>
    </div>
  </div>
</section>

<!-- ======== PROYECTOS ======== -->
<section class="sec" id="proyectos">
  <div class="wrap">
    <div class="sec-cab">
      <p class="eyebrow">La propuesta</p>
      <h2>Dos proyectos que trabajan juntos</h2>
      <p class="lead" style="max-width:720px">
        El primero construye la casa; el segundo hace que la gente llegue a ella. Se pueden
        contratar por separado, pero uno sin el otro rinde la mitad.
      </p>
    </div>

    <!-- PROYECTO 1 -->
    <div class="panel proy">
      <div class="proy-cab">
        <div>
          <div class="num">PROYECTO 01</div>
          <h3>Sitio web nuevo en WordPress</h3>
          <p>
            Una web nueva, propia y rápida, construida con nuestra estructura y pensada
            para que el paciente pida su valoración.
          </p>
        </div>
        <div class="proy-precio">
          <div class="antes">$980</div>
          <div class="v">$720</div>
          <div class="u">+ IVA · pago único</div>
        </div>
      </div>
      <div class="proy-cuerpo">
        <div class="cols-3" style="margin-bottom:22px">
          <div class="c3">
            <h5>Diseño a medida</h5>
            <p>Diseño propio, creado para su consultorio y adaptado a computador, tablet y celular.</p>
          </div>
          <div class="c3">
            <h5>Velocidad</h5>
            <p>Objetivo: bajar de 9,1 segundos a menos de 2. Sin los 93 scripts que Wix obliga a cargar.</p>
          </div>
          <div class="c3">
            <h5>Su información, mejor contada</h5>
            <p>Partimos de lo que ya tiene publicado y lo reescribimos con la estructura que Google entiende.</p>
          </div>
        </div>

        <p class="eyebrow gris" style="margin-bottom:14px">Las páginas que se construyen</p>
        <div class="paginas">
          <div class="pag"><span class="i">01</span><div><b>Portada</b> <span>· diseño a medida</span></div></div>
          <div class="pag"><span class="i">02</span><div><b>Quién es el Dr. Gordillo</b> <span>· trayectoria y credenciales</span></div></div>
          <div class="pag"><span class="i">03</span><div><b>Bypass gástrico</b> <span>· página propia</span></div></div>
          <div class="pag"><span class="i">04</span><div><b>Manga gástrica</b> <span>· página propia</span></div></div>
          <div class="pag"><span class="i">05</span><div><b>Balón intragástrico</b> <span>· página propia</span></div></div>
          <div class="pag"><span class="i">06</span><div><b>Tiroides sin cicatriz</b> <span>· página propia</span></div></div>
          <div class="pag"><span class="i">07</span><div><b>Hernia de hiato y reflujo</b> <span>· página propia</span></div></div>
          <div class="pag"><span class="i">08</span><div><b>Cirugía oncológica · HIPEC</b> <span>· página propia</span></div></div>
          <div class="pag"><span class="i">09</span><div><b>Preguntas frecuentes</b> <span>· preparada para Google</span></div></div>
          <div class="pag"><span class="i">10</span><div><b>Testimonios</b> <span>· casos con autorización</span></div></div>
          <div class="pag"><span class="i">11</span><div><b>Blog</b> <span>· plantilla lista para publicar</span></div></div>
          <div class="pag"><span class="i">12</span><div><b>Contacto</b> <span>· formulario, mapa y datos</span></div></div>
        </div>

        <div class="nota-b" style="margin-top:22px">
          <div class="t">Por qué una página por procedimiento</div>
          <p>
            Nadie busca «cirujano bariátrico». La gente busca «cuánto cuesta la manga gástrica
            en Ecuador» o «tiroides sin cicatriz». Cada procedimiento necesita su propia página
            para competir por su propia búsqueda: es el motor de todo el posicionamiento.
            <strong style="color:var(--aqua)">Los textos de las seis páginas los escribimos nosotros</strong>
            — usted solo revisa que sea correcto clínicamente.
          </p>
        </div>

        <p class="eyebrow gris" style="margin:26px 0 14px">Además, incluido</p>
        <div class="cols-3">
          <div class="c3">
            <h5>Dominio y hosting</h5>
            <p>El primer año va incluido, con correos propios y copias de seguridad.</p>
          </div>
          <div class="c3">
            <h5>Formulario y WhatsApp</h5>
            <p>Solicitud de valoración con los campos que necesita el consultorio, botón de WhatsApp y llamada directa.</p>
          </div>
          <div class="c3">
            <h5>Ficha médica para Google</h5>
            <p>Marcado de médico, procedimientos y preguntas frecuentes, para que Google lo muestre como profesional de salud.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- PROYECTO 2 -->
    <div class="panel proy">
      <div class="proy-cab">
        <div>
          <div class="num">PROYECTO 02</div>
          <h3>Plan de posicionamiento · 6 meses</h3>
          <p>
            Trabajo mensual para que su web aparezca cuando alguien de Imbabura, Carchi o el
            norte de Pichincha busca lo que usted opera.
          </p>
        </div>
        <div class="proy-precio">
          <div class="v">$680</div>
          <div class="u">+ IVA · los 6 meses<br>o $150 al mes</div>
        </div>
      </div>
      <div class="proy-cuerpo">
        <div class="meses">
          <div class="mes">
            <div class="et">Mes 1<br>Cimientos</div>
            <div>
              <h5>Dejar todo medido y en orden</h5>
              <ul>
                <li>Alta y configuración de Google Search Console y Analytics — hoy no sabemos cuánta gente lo busca</li>
                <li>Investigación de las búsquedas reales del sector en Imbabura</li>
                <li>Optimización de su Perfil de Empresa en Google y estrategia de reseñas</li>
                <li>Corrección técnica y mapa del sitio para Google</li>
              </ul>
            </div>
          </div>
          <div class="mes">
            <div class="et">Meses 2 a 6<br>Ejecución</div>
            <div>
              <h5>Contenido y mejora continua</h5>
              <ul>
                <li><strong style="color:var(--hueso)">4 artículos mensuales</strong> sobre lo que sus pacientes preguntan de verdad</li>
                <li>Mejora continua de las páginas de procedimientos</li>
                <li>Publicaciones y gestión del Perfil de Empresa en Google</li>
                <li>Seguimiento de su posición frente a la competencia local</li>
                <li>Informe mensual de lo trabajado y lo conseguido</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="nota-b" style="margin-top:20px">
          <div class="t">Temas con demanda comprobada</div>
          <p>
            Cuánto cuesta una cirugía bariátrica en Ecuador · bypass o manga, cuál elegir ·
            requisitos para ser candidato · cómo es la recuperación · diabetes y cirugía
            metabólica · tiroides sin cicatriz · balón gástrico. Son búsquedas que la gente
            hace hoy y que nadie en la zona está respondiendo bien.
          </p>
        </div>

        <div class="nota-a" style="margin-top:14px">
          <div class="t">Lo que no le vamos a prometer</div>
          <p>
            No prometemos una posición concreta en Google ni un número de visitas: nadie
            serio puede garantizarlo, y menos en salud. Lo que sí garantizamos es el trabajo
            hecho, medido y reportado cada mes, para que usted vea exactamente en qué se
            invirtió y qué se movió.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======== INVERSIÓN ======== -->
<section class="sec" id="inversion">
  <div class="wrap">
    <div class="sec-cab" style="text-align:center">
      <p class="eyebrow">Inversión</p>
      <h2>Cuánto cuesta</h2>
    </div>

    <div class="inv-grid">
      <div class="panel inv-card">
        <p class="eyebrow gris" style="margin-bottom:6px">Proyecto 01</p>
        <p style="font-size:19px;font-weight:700;margin-bottom:6px">Sitio web nuevo</p>
        <p style="font-size:13.5px;color:var(--niebla);line-height:1.6;margin-bottom:20px">
          Pago único. Incluye las 12 páginas, los textos de los procedimientos, y el dominio
          y hosting del primer año.
        </p>

        <div class="precio-tach">
          <span class="tachado">$980</span>
          <span class="etiq">Precio de lanzamiento</span>
        </div>
        <div class="inv-total" style="margin-top:10px;padding-top:0;border-top:0">
          <span class="big">$720</span>
          <span class="iva">+ IVA</span>
        </div>

        <div class="nota-b" style="margin-top:auto">
          <div class="t">Un solo pago</div>
          <p>
            Sin anticipos ni cuotas: se cancela el valor completo al confirmar el proyecto y
            arrancamos.
          </p>
        </div>
      </div>

      <div class="panel inv-card">
        <p class="eyebrow gris" style="margin-bottom:6px">Proyecto 02</p>
        <p style="font-size:19px;font-weight:700;margin-bottom:6px">Posicionamiento · 6 meses</p>
        <p style="font-size:13.5px;color:var(--niebla);line-height:1.6;margin-bottom:20px">
          Dos formas de tomarlo. El contenido y el trabajo son exactamente los mismos.
        </p>

        <div class="opcion-pago destacada">
          <div class="op-cab">
            <div>
              <p class="op-t">Los 6 meses por adelantado</p>
              <p class="op-s">Ahorra $220 frente al pago mensual</p>
            </div>
            <span class="op-v">$680</span>
          </div>
        </div>

        <div class="opcion-pago">
          <div class="op-cab">
            <div>
              <p class="op-t">Mes a mes</p>
              <p class="op-s">$150 al mes durante 6 meses · suman $900</p>
            </div>
            <span class="op-v">$150</span>
          </div>
        </div>

        <div class="nota-b" style="margin-top:auto">
          <div class="t">Para ponerlo en perspectiva</div>
          <p>
            Una sola cirugía bariátrica cuesta varios miles de dólares. Un paciente captado
            por la web en todo el semestre ya cubre la inversión completa.
          </p>
        </div>
      </div>
    </div>

    <div class="panel totales">
      <div class="tot">
        <p class="et">Todo junto, con el plan pagado por adelantado</p>
        <p class="v">$1.400 <span>+ IVA</span></p>
        <p class="d">$720 el sitio web + $680 los seis meses de posicionamiento</p>
      </div>
      <div class="tot">
        <p class="et">Todo junto, con el plan mes a mes</p>
        <p class="v">$1.620 <span>+ IVA</span></p>
        <p class="d">$720 el sitio web + $150 al mes durante seis meses</p>
      </div>
    </div>

    <div class="panel" style="padding:26px 30px;margin-top:20px">
      <div class="cond">
        <div>
          <p>Tiempo de entrega del sitio</p>
          <p>4 a 5 semanas desde que recibimos los accesos y la información de contacto.</p>
        </div>
        <div>
          <p>Renovación desde el segundo año</p>
          <p>Dominio y hosting: alrededor de $142 al año. El primer año va incluido.</p>
        </div>
        <div>
          <p>El sitio es suyo</p>
          <p>Dominio, web y correos quedan a su nombre. WordPress es suyo, no alquilado como Wix.</p>
        </div>
        <div>
          <p>Soporte</p>
          <p>30 días de acompañamiento tras la entrega, sin costo, para ajustes de lo desarrollado.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======== LO QUE NECESITAMOS ======== -->
<section class="sec" style="padding-top:0">
  <div class="wrap">
    <div class="sec-cab">
      <p class="eyebrow">Para arrancar</p>
      <h2>Lo que necesitamos de usted</h2>
      <p class="lead" style="max-width:700px">
        Nada complicado, pero sin esto el proyecto no puede avanzar. Lo recogemos en una
        sola reunión.
      </p>
    </div>
    <div class="hall">
      <div class="h-item" style="border-left:2px solid var(--aqua)">
        <h4 style="--d:none">Accesos</h4>
        <p>Dominio, Google Analytics y Search Console. Son necesarios para publicar el sitio y empezar a medir desde el primer día.</p>
      </div>
      <div class="h-item" style="border-left:2px solid var(--aqua)">
        <h4>Datos de contacto reales</h4>
        <p>Teléfono del consultorio, dirección exacta, horarios de atención y a quién llegan los mensajes del formulario.</p>
      </div>
      <div class="h-item" style="border-left:2px solid var(--aqua)">
        <h4>Su trayectoria en números</h4>
        <p>Años de experiencia y número aproximado de cirugías realizadas. Es lo que más pesa cuando un paciente decide.</p>
      </div>
      <div class="h-item" style="border-left:2px solid var(--aqua)">
        <h4>Testimonios y fotos</h4>
        <p>Testimonios reales con autorización del paciente, y fotografías suyas o de la clínica. Si no las tiene, coordinamos una sesión aparte.</p>
      </div>
    </div>

    <div class="nota-a" style="margin-top:18px">
      <div class="t">Sobre la suscripción de Wix</div>
      <p>
        Mientras construimos el sitio nuevo, el actual debe seguir en línea para no quedarse
        sin presencia. Conviene definir desde ahora en qué momento se cancela esa
        suscripción — normalmente, apenas el sitio nuevo queda publicado y apuntando a su
        dominio.
      </p>
    </div>
  </div>
</section>

<!-- ======== CIERRE ======== -->
<section class="cierre">
  <div class="wrap">
    <p class="eyebrow">Siguiente paso</p>
    <h2>¿Empezamos, doctor?</h2>
    <p>
      Cualquier duda sobre el alcance, los tiempos o la forma de pago, escríbanos y la
      resolvemos sin compromiso.
    </p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
      <a href="https://wa.me/593999174980?text=Hola%2C%20soy%20el%20Dr.%20Gordillo.%20Revis%C3%A9%20la%20propuesta%20de%20la%20web%20y%20el%20plan%20SEO"
         class="btn btn-aqua no-print">
        <svg viewBox="0 0 24 24" fill="currentColor" style="width:19px;height:19px"><path d="M12 2a10 10 0 00-8.6 15l-1.3 4.7 4.8-1.3A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.8.8.8-2.8-.2-.3A8 8 0 1112 20z"/></svg>
        Escribir por WhatsApp
      </a>
    </div>
    <p class="mono" style="font-size:12.5px;color:var(--niebla);margin-top:26px">
      +593 99 917 4980 &middot; Creative Web &middot; Ibarra, Ecuador
    </p>
  </div>
</section>

</body>
</html>
