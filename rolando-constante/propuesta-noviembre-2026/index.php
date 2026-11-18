<?php
session_start();
if (empty($_SESSION['auth_rolando_nov26'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta web 2027 &middot; Rolando Constante</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{--papel:#F7F4EE;--blanco:#fff;--tinta:#0E1A4A;--suave:#4A5378;--tenue:#8C92AE;--linea:#E4DCCD;--oro:#B8892B;--oro-claro:#E2BF6E;--profundo:#0B1640;--rojo:#B42318;--verde:#1D6B3F}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{font-family:'Outfit',system-ui,sans-serif;font-weight:300;background:var(--papel);color:var(--tinta);font-size:17.5px;line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{color:inherit}
img{max-width:100%;display:block}
.w{max-width:1040px;margin:0 auto;padding:0 22px}
section{scroll-margin-top:70px;padding:96px 0;border-top:1px solid var(--linea)}
h1,h2,h3{font-weight:300;letter-spacing:-.025em;line-height:1.08}
h1{font-size:clamp(2.6rem,6vw,4.6rem)}
h2{font-size:clamp(2rem,4vw,3.1rem)}
h3{font-size:1.45rem;font-weight:400;letter-spacing:-.015em}
b,strong{font-weight:500}
.oro{color:var(--oro)}
.label{display:flex;align-items:center;gap:12px;font-size:.74rem;letter-spacing:.22em;text-transform:uppercase;font-weight:500;color:var(--oro);margin-bottom:22px}
.label i{font-style:normal;letter-spacing:0;color:var(--tenue);font-weight:400;font-size:.95rem}
.label::after{content:"";width:48px;height:1px;background:currentColor;opacity:.45}
.intro{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:end;margin-bottom:56px}
.intro p{color:var(--suave)}
@media(max-width:820px){.intro{grid-template-columns:1fr;gap:18px;margin-bottom:40px}section{padding:68px 0}}

/* Menú */
.nav{position:sticky;top:0;z-index:50;background:rgba(247,244,238,.9);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid var(--linea)}
.nav .w{display:flex;align-items:center;gap:22px}
.nav img{height:15px;flex:none}
.nav .fila{display:flex;gap:2px;overflow-x:auto;padding:14px 0;scrollbar-width:none;margin-left:auto}
.nav .fila::-webkit-scrollbar{display:none}
.nav a{font-size:.92rem;font-weight:400;color:var(--suave);text-decoration:none;padding:7px 13px;border-radius:999px;white-space:nowrap;transition:background .3s,color .3s}
.nav a:hover{color:var(--tinta)}
.nav a.on{background:var(--tinta);color:#fff}
@media(max-width:640px){.nav img{display:none}.nav .fila{margin-left:0}}

/* Portada */
.portada{padding:76px 0 64px;border:0}
.logos{display:flex;align-items:center;gap:18px;margin-bottom:56px}
.logos img.cw{height:30px}
.logos img.rc{height:17px}
.logos span{width:1px;height:28px;background:var(--linea)}
.portada .lead{font-size:1.2rem;color:var(--suave);max-width:46ch;margin:26px 0 40px}
.meta{display:flex;flex-wrap:wrap;gap:10px 40px;font-size:.88rem;color:var(--tenue);padding-top:22px;border-top:1px solid var(--linea)}
.meta b{color:var(--tinta);font-weight:400}

/* Cifras */
.cifras{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid var(--tinta)}
.cifra{padding:30px 28px 0 0}
.cifra+.cifra{padding-left:28px;border-left:1px solid var(--linea)}
.cifra .n{font-size:clamp(3.2rem,6vw,4.6rem);font-weight:200;letter-spacing:-.04em;line-height:1}
.cifra .n.mal{color:var(--rojo)}
.cifra p{margin-top:12px;color:var(--suave);font-size:.98rem;max-width:26ch}
@media(max-width:760px){.cifras{grid-template-columns:1fr}.cifra,.cifra+.cifra{padding:24px 0;border-left:0;border-bottom:1px solid var(--linea)}}
.puntos{margin-top:56px;display:grid;gap:0}
.puntos li{list-style:none;display:grid;grid-template-columns:40px 1fr;gap:12px;padding:16px 0;border-bottom:1px solid var(--linea)}
.puntos li::before{content:"";width:9px;height:9px;border-radius:50%;background:var(--oro);margin-top:11px}
.puntos li.bien::before{background:var(--verde)}
.frase{margin-top:44px;font-size:clamp(1.35rem,2.4vw,1.75rem);font-weight:300;letter-spacing:-.015em;line-height:1.35;max-width:36ch}
.frase em{font-style:normal;color:var(--oro)}

/* Diagnóstico */
.items{border-top:1px solid var(--tinta)}
.item{display:grid;grid-template-columns:90px 1fr 1fr;gap:28px;padding:34px 0;border-bottom:1px solid var(--linea)}
.item .num{font-size:2.6rem;font-weight:200;letter-spacing:-.03em;line-height:1;color:var(--oro)}
.item h3{margin-bottom:10px}
.item .que{color:var(--suave)}
.item .como{color:var(--tinta);padding-left:20px;border-left:2px solid var(--oro)}
.item .como small{display:block;font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;color:var(--oro);font-weight:500;margin-bottom:6px}
.item .ej{grid-column:2/4;font-size:.92rem;color:var(--tenue)}
.item .ej code{font-family:inherit;color:var(--tinta);font-weight:400;background:var(--blanco);padding:2px 9px;border-radius:999px}
@media(max-width:820px){.item{grid-template-columns:52px 1fr;gap:14px 16px}.item .num{font-size:2rem}.item .como,.item .ej{grid-column:2/3}}

/* Dos columnas de listas */
.dos{display:grid;grid-template-columns:1fr 1fr;gap:0 56px}
.dos li{list-style:none;padding:18px 0;border-bottom:1px solid var(--linea)}
.dos li b{display:block;font-weight:400;font-size:1.08rem}
.dos li span{color:var(--suave);font-size:.95rem}
@media(max-width:760px){.dos{grid-template-columns:1fr}}

/* Mapa de páginas */
.mapa{border-top:1px solid var(--tinta)}
.mapa .r{display:grid;grid-template-columns:1.1fr .9fr 1.4fr;gap:24px;padding:20px 0;border-bottom:1px solid var(--linea);align-items:baseline}
.mapa .r b{font-weight:400;font-size:1.1rem}
.mapa .r span{color:var(--suave);font-size:.95rem}
.mapa .r.cab{padding:14px 0;font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;color:var(--tenue);font-weight:500}
.mapa .r.top b::after{content:"Prioridad";margin-left:10px;font-size:.66rem;letter-spacing:.16em;text-transform:uppercase;color:var(--oro);font-weight:500;vertical-align:middle}
@media(max-width:760px){.mapa .r{grid-template-columns:1fr;gap:2px}.mapa .r.cab{display:none}}
.previa{display:grid;grid-template-columns:1fr auto;gap:30px;align-items:center;margin-top:56px;padding:34px 0;border-top:1px solid var(--linea);border-bottom:1px solid var(--linea)}
.previa h3{font-size:1.7rem}
.previa p{color:var(--suave);margin-top:6px}
@media(max-width:700px){.previa{grid-template-columns:1fr}}

/* Botones */
.btn{display:inline-flex;align-items:center;gap:12px;background:var(--tinta);color:#fff;text-decoration:none;font-weight:400;font-size:1rem;padding:16px 26px;border-radius:999px;white-space:nowrap;transition:background .3s,transform .3s}
.btn:hover{background:#1B2C78;transform:translateY(-2px)}
.btn.oro{background:var(--oro-claro);color:var(--profundo)}
.btn svg{width:16px;height:16px}

/* Inversión */
.inv{border-top:1px solid var(--tinta)}
.linea-inv{display:grid;grid-template-columns:60px 1fr 200px;gap:24px;padding:32px 0;border-bottom:1px solid var(--linea);align-items:start}
.linea-inv .l{font-size:1.7rem;font-weight:200;color:var(--oro);line-height:1}
.linea-inv h3{margin-bottom:12px}
.linea-inv ul{display:grid;gap:4px;color:var(--suave);font-size:.95rem}
.linea-inv ul li{list-style:none;padding-left:18px;position:relative}
.linea-inv ul li::before{content:"–";position:absolute;left:0;color:var(--oro)}
.precio{text-align:right}
.precio s{display:block;color:var(--tenue);font-size:1.05rem;font-weight:300}
.precio .v{font-size:2.6rem;font-weight:200;letter-spacing:-.03em;line-height:1.05}
.precio small{display:block;color:var(--suave);font-size:.85rem;margin-top:4px}
.precio .incluido{font-size:1.5rem;font-weight:300;color:var(--verde)}
.bono{display:inline-block;font-size:.66rem;letter-spacing:.16em;text-transform:uppercase;color:var(--verde);font-weight:500;margin-left:8px;vertical-align:middle}
.paquete{display:grid;grid-template-columns:1fr auto;gap:24px;align-items:center;margin-top:40px;padding:34px 36px;background:var(--profundo);color:#fff;border-radius:28px}
.paquete h3{font-size:1.6rem}
.paquete p{color:#B7BEDF;font-size:.98rem;margin-top:6px;max-width:48ch}
.paquete .precio s{color:#8D95C2}
.paquete .precio .v{color:var(--oro-claro)}
.paquete .precio small{color:#B7BEDF}
.condiciones{margin-top:30px;display:flex;flex-wrap:wrap;gap:8px 34px;font-size:.9rem;color:var(--suave)}
.condiciones span::before{content:"";display:inline-block;width:6px;height:6px;border-radius:50%;background:var(--oro);margin-right:10px;vertical-align:middle}
@media(max-width:760px){.linea-inv{grid-template-columns:40px 1fr;gap:12px 14px}.precio{grid-column:2/3;text-align:left}.paquete{grid-template-columns:1fr;padding:28px}.paquete .precio{text-align:left}}

/* Plan */
.plan{display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid var(--tinta)}
.paso{padding:28px 24px 0 0}
.paso+.paso{padding-left:24px;border-left:1px solid var(--linea)}
.paso small{font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;color:var(--oro);font-weight:500}
.paso h3{margin:10px 0 8px;font-size:1.3rem}
.paso p{color:var(--suave);font-size:.95rem}
@media(max-width:860px){.plan{grid-template-columns:1fr 1fr}.paso,.paso+.paso{padding:24px 18px 24px 0;border-left:0;border-bottom:1px solid var(--linea)}}
@media(max-width:520px){.plan{grid-template-columns:1fr}}

/* Cierre */
.necesito{counter-reset:n;display:grid}
.necesito li{list-style:none;counter-increment:n;display:grid;grid-template-columns:52px 1fr;padding:16px 0;border-bottom:1px solid var(--linea)}
.necesito li::before{content:counter(n,decimal-leading-zero);font-weight:200;font-size:1.3rem;color:var(--oro)}
.final{margin-top:60px;display:grid;grid-template-columns:1fr auto;gap:30px;align-items:center}
.final h3{font-size:clamp(1.6rem,3vw,2.2rem)}
.final p{color:var(--suave);margin-top:8px;max-width:48ch}
.acciones{display:flex;flex-wrap:wrap;gap:12px}
.btn.claro{background:transparent;color:var(--tinta);border:1px solid var(--tinta)}
.btn.claro:hover{background:var(--tinta);color:#fff}
@media(max-width:760px){.final{grid-template-columns:1fr}}

footer{border-top:1px solid var(--linea);padding:40px 0 60px}
footer .w{display:flex;flex-wrap:wrap;justify-content:space-between;gap:16px;align-items:center;font-size:.85rem;color:var(--tenue)}
footer img{height:24px}
</style>
</head>
<body>

<nav class="nav">
  <div class="w">
    <img src="logo-constante.png" alt="Rolando Constante">
    <div class="fila">
      <a href="#resumen">Resumen</a>
      <a href="#diagnostico">Diagnóstico</a>
      <a href="#propuesta">Propuesta</a>
      <a href="#inversion">Inversión</a>
      <a href="#plan">Plan</a>
      <a href="#siguiente">Siguiente paso</a>
    </div>
  </div>
</nav>

<main>
<header class="portada">
  <div class="w">
    <div class="logos">
      <img class="cw" src="/informes/assets/creativeweb-iso.png" alt="Creative Web">
      <span></span>
      <img class="rc" src="logo-constante.png" alt="Rolando Constante">
    </div>
    <p class="label"><i>Proforma 1-2-1338</i>Diagnóstico y propuesta</p>
    <h1>Una web que traiga <span class="oro">empresas</span>, no solo visitas</h1>
    <p class="lead">Revisamos rolandoconstante.com completa, sus datos reales de Google y cómo se ve en computadora y celular. Esto es lo que encontramos y lo que proponemos hacer.</p>
    <div class="meta"><span>Para <b>Dr. Rolando Constante</b></span><span>Preparado por <b>Creative Web</b></span><span><b>18 de noviembre de 2026</b></span></div>
  </div>
</header>

<section id="resumen">
  <div class="w">
    <p class="label"><i>(01)</i>En un minuto</p>
    <div class="intro"><h2>Cómo encuentra la gente la web hoy</h2><p>Datos de Google Search Console y Google Analytics, las herramientas gratuitas de Google que miden las visitas.</p></div>
    <div class="cifras">
      <div class="cifra"><div class="n">174</div><p>personas llegaron desde Google en 6 meses. Menos de una por día.</p></div>
      <div class="cifra"><div class="n mal">0</div><p>llegaron buscando un servicio («capacitación en ventas», «curso de ventas»). Todas buscaban su nombre.</p></div>
      <div class="cifra"><div class="n mal">0</div><p>contactos registrados. La web no sabe cuándo alguien escribe por WhatsApp.</p></div>
    </div>
    <ul class="puntos">
      <li><span><b>7 de cada 10 visitantes se van sin hacer nada</b>: no leen, no hacen clic, no escriben.</span></li>
      <li><span><b>La web no le habla primero a las empresas</b>, que son el cliente que más deja.</span></li>
      <li class="bien"><span><b>La oportunidad:</b> en Ecuador casi nadie compite bien en Google por estos temas, y usted tiene lo más difícil de conseguir: 28 años de trayectoria, método propio, certificación SENESCYT y clientes como Kia, Chevrolet o Fybeca.</span></li>
    </ul>
    <p class="frase">Hoy la web funciona como una oficina bien ubicada pero <em>sin letrero en la puerta</em>: la encuentra quien ya conoce la dirección.</p>
  </div>
</section>

<section id="diagnostico">
  <div class="w">
    <p class="label"><i>(02)</i>Diagnóstico</p>
    <div class="intro"><h2>Lo que la web no hace y le cuesta clientes</h2><p>Ocho puntos críticos. Explican casi todos los números de arriba y son los primeros que corregiríamos.</p></div>
    <div class="items">
      <div class="item"><span class="num">01</span><div><h3>No mide los contactos</h3><p class="que">Cuando alguien toca WhatsApp o llena un formulario, no queda registrado. Es imposible saber cuántos clientes trae la web.</p></div><p class="como"><small>Cómo lo arreglamos</small>Cada clic en WhatsApp y cada formulario se registra en Google Analytics con la página de origen. El mensaje llega con «vengo de la web» ya escrito.</p></div>
      <div class="item"><span class="num">02</span><div><h3>Google no sabe qué vende</h3><p class="que">Los títulos que Google muestra dicen «Home - Constante». 28 de 34 páginas no tienen la descripción que aparece debajo en los resultados.</p></div><p class="como"><small>Cómo lo arreglamos</small>Título y descripción escritos para cada página, con las palabras que usa el cliente al buscar.</p><p class="ej">Hoy <code>Home - Constante</code> &nbsp;→&nbsp; propuesto <code>Capacitación en ventas para empresas en Ecuador | Rolando Constante</code></p></div>
      <div class="item"><span class="num">03</span><div><h3>«Constante» no sirve para que lo encuentren</h3><p class="que">Apareció 1.436 veces en Google por la palabra «constante» y nadie hizo clic: quien la busca quiere otra cosa. La búsqueda que sí funciona es «Rolando Constante».</p></div><p class="como"><small>Cómo lo arreglamos</small>El sitio se ordena alrededor de «Rolando Constante» como experto. Los logos no cambian.</p></div>
      <div class="item"><span class="num">04</span><div><h3>El inicio no le habla a las empresas</h3><p class="que">Lo primero que se lee es «un mundo cada día más próspero». Un gerente no entiende en cinco segundos qué ofrece ni si es para su empresa.</p></div><p class="como"><small>Cómo lo arreglamos</small>Mensaje directo para el gerente comercial, un botón claro de diagnóstico gratis y un segundo camino para el vendedor.</p></div>
      <div class="item"><span class="num">05</span><div><h3>Partes de la web se ven mal</h3><p class="que">Textos amarillos sobre blanco que no se leen, espacios vacíos enormes, cada página con un estilo distinto y textos repetidos.</p></div><p class="como"><small>Cómo lo arreglamos</small>Un diseño nuevo y único con el azul y el dorado de la marca, revisado en computadora y celular.</p></div>
      <div class="item"><span class="num">06</span><div><h3>Google muestra páginas que sobran</h3><p class="que">Casi la mitad de las 34 páginas son internas o repetidas: carrito, mi cuenta, registrar, «próximamente», «contacto» y «contacto 2».</p></div><p class="como"><small>Cómo lo arreglamos</small>Se ocultan las internas, se unen las repetidas y se redirigen las direcciones viejas para no perder visitas.</p></div>
      <div class="item"><span class="num">07</span><div><h3>Las inteligencias artificiales no lo conocen</h3><p class="que">Cada vez más gente pregunta a ChatGPT o Gemini quién capacita en ventas. La web tiene un solo artículo (de 2024) y ninguna información ordenada para que lo recomienden.</p></div><p class="como"><small>Cómo lo arreglamos</small>Fichas de datos para Google y las IA, preguntas frecuentes y guías de ventas con su experiencia.</p></div>
      <div class="item"><span class="num">08</span><div><h3>Lo que más lo vende está escondido</h3><p class="que">Clientes, testimonios, el método PAICODOCI y la certificación están en páginas internas. El registro SENESCYT figura como «#1234» y no hay casos con resultados.</p></div><p class="como"><small>Cómo lo arreglamos</small>Credenciales y clientes desde la primera pantalla, el número real de registro y una sección de casos con cifras.</p></div>
    </div>

    <div class="intro" style="margin-top:80px;margin-bottom:28px"><h2 style="font-size:clamp(1.6rem,3vw,2.2rem)">Otras mejoras, incluidas en el rediseño</h2><p></p></div>
    <ul class="dos">
      <li><b>Imágenes sin descripción</b><span>Google no entiende qué muestran.</span></li>
      <li><b>Títulos de página desordenados</b><span>Algunas sin título principal; el inicio tiene once.</span></li>
      <li><b>Velocidad irregular</b><span>Páginas de 4 a 6 segundos en responder.</span></li>
      <li><b>Redes desconectadas</b><span>TikTok, Reels e Instagram no se aprovechan en la web.</span></li>
      <li><b>Textos genéricos</b><span>Su voz y sus anécdotas venden más que frases de catálogo.</span></li>
      <li><b>Complementos sin uso</b><span>Ocupan espacio y pueden ser una puerta para ataques.</span></li>
    </ul>
  </div>
</section>

<section id="propuesta">
  <div class="w">
    <p class="label"><i>(03)</i>Propuesta</p>
    <div class="intro"><h2>Una web ordenada por lo que busca cada cliente</h2><p>Primero las empresas, luego los vendedores. Cada página tiene un objetivo y una forma de medirlo.</p></div>
    <div class="mapa">
      <div class="r cab"><span>Página</span><span>Para quién</span><span>Qué debe lograr</span></div>
      <div class="r"><b>Inicio</b><span>Empresas y vendedores</span><span>Decir en 5 segundos qué hace y llevar a cada uno a su camino.</span></div>
      <div class="r top"><b>Capacitación para empresas</b><span>Gerentes y Talento Humano</span><span>Solicitudes de diagnóstico por WhatsApp.</span></div>
      <div class="r"><b>Conferencias</b><span>Organizadores de eventos</span><span>Consultas de fecha para «El vendedor infalible».</span></div>
      <div class="r"><b>Gerencia comercial y coaching</b><span>Gerentes y dueños</span><span>Programa ejecutivo y coaching uno a uno.</span></div>
      <div class="r"><b>Escuela y Certificación</b><span>Vendedores</span><span>Inscripciones y consultas.</span></div>
      <div class="r"><b>Método PAICODOCI</b><span>Todos</span><span>Lo que lo diferencia de cualquier otro.</span></div>
      <div class="r"><b>Sobre Rolando</b><span>Todos</span><span>Trayectoria, credenciales y prensa.</span></div>
      <div class="r"><b>Por ciudad y país</b><span>Empresas que buscan local</span><span>Quito, Guayaquil, Cuenca, LATAM y EE. UU.</span></div>
      <div class="r"><b>Guías de ventas</b><span>Quien busca en Google o en una IA</span><span>Visitas nuevas cada mes.</span></div>
    </div>
    <div class="previa">
      <div><h3>Vea cómo se vería</h3><p>Preparamos la página de inicio con su foto, su método y sus clientes.</p></div>
      <a class="btn" href="/informes/rolando-constante/diseno-2027/" target="_blank" rel="noopener">Ver el diseño propuesto <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 12 12 4M5 4h7v7"/></svg></a>
    </div>
  </div>
</section>

<section id="inversion">
  <div class="w">
    <p class="label"><i>(04)</i>Inversión</p>
    <div class="intro"><h2>Lo que cuesta</h2><p>Precios sin IVA. Se trabaja sobre su hosting y su WordPress actuales: no hay costos nuevos de servidor.</p></div>
    <div class="inv">
      <div class="linea-inv">
        <span class="l">a</span>
        <div><h3>Rediseño web completo</h3>
          <ul><li>10 páginas nuevas en Elementor, con diseño y textos nuevos</li><li>Títulos, descripciones y fichas de datos para Google y las IA</li><li>Limpieza de páginas sobrantes y redirecciones</li><li>Revisión en computadora y celular</li></ul></div>
        <div class="precio"><s>$1.350</s><span class="v">$1.200</span><small>+ IVA</small></div>
      </div>
      <div class="linea-inv">
        <span class="l">+</span>
        <div><h3>Medición de contactos <span class="bono">Bono</span></h3>
          <ul><li>Cada clic en WhatsApp y formulario registrado en Google Analytics</li><li>Mensaje de WhatsApp con «vengo de la web» ya escrito</li></ul></div>
        <div class="precio"><s>$150</s><span class="incluido">Incluido</span></div>
      </div>
      <div class="linea-inv">
        <span class="l">b</span>
        <div><h3>Posicionamiento en Google e IA · 6 meses <span class="bono" style="color:var(--tenue)">Opcional</span></h3>
          <ul><li>Guías de ventas nuevas cada mes, con su experiencia</li><li>Páginas por ciudad y país, y ajustes según lo que la gente busca</li><li>Reunión e informe mensual de visitas y contactos</li></ul></div>
        <div class="precio"><span class="v">$600</span><small>pago único, $100 al mes</small><small>o $150 al mes durante 6 meses</small></div>
      </div>
    </div>
    <div class="paquete">
      <div><h3>Rediseño + posicionamiento</h3><p>Contratados juntos: la web nueva y seis meses para que empiece a traer empresas.</p></div>
      <div class="precio"><s>$1.800</s><span class="v">$1.650</span><small>+ IVA</small></div>
    </div>
    <div class="condiciones"><span>Forma de pago 60 % al iniciar y 40 % a la entrega</span><span>Entrega en 4 semanas</span><span>Validez de la propuesta: 15 días</span></div>
  </div>
</section>

<section id="plan">
  <div class="w">
    <p class="label"><i>(05)</i>Plan de trabajo</p>
    <div class="intro"><h2>Lo urgente se nota primero</h2><p>Desde la primera semana sabrá cuántos contactos trae la web.</p></div>
    <div class="plan">
      <div class="paso"><small>Semana 1</small><h3>Medir y ordenar</h3><p>Medición de WhatsApp y formularios. Limpieza de páginas que sobran.</p></div>
      <div class="paso"><small>Semanas 2 a 3</small><h3>Diseño y textos</h3><p>Las páginas nuevas, con su voz y sus fotos.</p></div>
      <div class="paso"><small>Semana 4</small><h3>Google y las IA</h3><p>Títulos, fichas de datos, preguntas frecuentes y publicación.</p></div>
      <div class="paso"><small>Desde el mes 2</small><h3>Crecer</h3><p>Guías nuevas e informe mensual, si contrata el posicionamiento.</p></div>
    </div>
  </div>
</section>

<section id="siguiente">
  <div class="w">
    <p class="label"><i>(06)</i>Siguiente paso</p>
    <div class="intro"><h2>Lo que necesitamos para empezar</h2><p>Con esto arrancamos al día siguiente de la aprobación.</p></div>
    <ul class="necesito">
      <li><span>El <b>número real de registro SENESCYT</b> de la certificación.</span></li>
      <li><span><b>Dos o tres casos reales</b> con resultados y autorización para publicarlos.</span></li>
      <li><span>Qué páginas de campañas siguen en uso: «Cierre a la N», «Cierre a la N express» y la masterclass.</span></li>
      <li><span>Fotos o vídeos recientes, y los enlaces a TikTok, Reels e Instagram.</span></li>
      <li><span>Una persona de su equipo que responda los WhatsApp que lleguen desde la web.</span></li>
    </ul>
    <div class="final">
      <div><h3>¿Empezamos?</h3><p>Ing. Santiago Oña · Creative Web · WhatsApp 099 917 4980</p></div>
      <div class="acciones">
        <a class="btn oro" href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20revis%C3%A9%20la%20propuesta%20de%20la%20web%20de%20Rolando%20Constante" target="_blank" rel="noopener">Aprobar por WhatsApp</a>
        <a class="btn claro" href="pdf/proforma-1-2-1338.pdf" target="_blank" rel="noopener">Descargar proforma PDF</a>
      </div>
    </div>
  </div>
</section>
</main>

<footer>
  <div class="w">
    <span style="display:flex;align-items:center;gap:12px"><img src="/informes/assets/creativeweb-iso.png" alt="Creative Web">Otavalo, Ecuador · noviembre de 2026</span>
    <a href="logout.php" style="text-decoration:none">Cerrar sesión</a>
  </div>
</footer>

<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{
  const vis=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
  if(!vis) return;
  const a=links.get(vis.target.id);
  if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');}
},{rootMargin:'-70px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>
</body>
</html>
