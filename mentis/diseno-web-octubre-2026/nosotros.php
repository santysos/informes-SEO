<?php
session_start();
if (empty($_SESSION['auth_mentis'])) { header('Location: login.php'); exit; }
?>
<!doctype html>
<html lang="es-EC">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nosotros | Mentis Psicología</title>
<meta name="description" content="Conoce a Mentis Psicología: red de servicios psicológicos con enfoque cognitivo constructivista en Quito, Ibarra y en línea.">
<meta property="og:title" content="Nosotros | Mentis Psicología">
<meta property="og:description" content="Conoce a Mentis Psicología: red de servicios psicológicos con enfoque cognitivo constructivista en Quito, Ibarra y en línea.">
<meta property="og:image" content="img/equipo-sala.webp">
<meta name="theme-color" content="#F7F3EE">
<meta name="robots" content="noindex, nofollow">  <!-- borrador: quitar al publicar la web real -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..500;1,9..144,300..400&family=Outfit:wght@300..600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/styles.css?v=1793456252">
<script>try{var t=new URLSearchParams(location.search).get('paleta')||localStorage.getItem('mentis-paleta');if(t&&t!=='a')document.documentElement.dataset.theme=t;}catch(e){}</script>

</head>
<body>
<header class="site-header">
  <div class="wrap nav">
    <a href="index.php" class="logo" aria-label="Mentis Psicología, inicio"><span class="l1">MENTIS</span><span class="l2">PSICOLOGÍA</span></a>
    <nav aria-label="Principal"><ul class="menu"><li><a href="nosotros.php" aria-current="page">Nosotros</a></li><li class="has-mega"><a href="servicios.php" aria-haspopup="true">Servicios</a>
          <div class="mega" role="region" aria-label="Servicios">
            <div class="wrap mega-in">
              <div class="mm-intro">
                <span class="label">Servicios</span>
                <p class="mm-title">Acompañamiento para cada <em>etapa</em> de la vida</p>
                <p class="muted">Presencial en Quito e Ibarra, o en línea desde cualquier lugar.</p>
                <a href="servicios.php" class="link">Ver todos los servicios <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></a>
              </div>
              <ul class="mm-grid"><li><a href="servicio-terapia-individual.php" class="mm-item">
              <span class="mm-th"><img src="img/ref-consulta.webp" alt="" loading="lazy"></span>
              <span class="mm-tx"><span class="mm-no">01 · Adultos y adultos mayores</span><b>Terapia individual</b><small>Ansiedad, estrés, duelos, autoestima y conflictos internos.</small></span></a></li><li><a href="servicio-terapia-de-pareja.php" class="mm-item">
              <span class="mm-th"><img src="img/ref-pareja.webp" alt="" loading="lazy"></span>
              <span class="mm-tx"><span class="mm-no">02 · Parejas</span><b>Terapia de pareja</b><small>Comunicación, conflictos y fortalecimiento del vínculo.</small></span></a></li><li><a href="servicio-psicologia-infantil.php" class="mm-item">
              <span class="mm-th"><img src="img/ref-ninos.webp" alt="" loading="lazy"></span>
              <span class="mm-tx"><span class="mm-no">03 · Niños y adolescentes</span><b>Psicología infantil y neuropsicología</b><small>Neurodesarrollo, aprendizaje, conducta y atención temprana.</small></span></a></li><li><a href="servicio-psicopedagogia.php" class="mm-item">
              <span class="mm-th"><img src="img/ref-escritura.webp" alt="" loading="lazy"></span>
              <span class="mm-tx"><span class="mm-no">04 · Aprendizaje e inclusión</span><b>Psicopedagogía</b><small>Dificultades escolares, adaptación e inclusión educativa.</small></span></a></li><li><a href="servicio-evaluacion-y-orientacion-vocacional.php" class="mm-item">
              <span class="mm-th"><img src="img/ref-lectura.webp" alt="" loading="lazy"></span>
              <span class="mm-tx"><span class="mm-no">05 · Evaluación</span><b>Evaluación y orientación vocacional</b><small>Para decidir qué estudiar o hacia dónde crecer.</small></span></a></li><li><a href="servicio-supervision-clinica.php" class="mm-item">
              <span class="mm-th"><img src="img/ref-mesa.webp" alt="" loading="lazy"></span>
              <span class="mm-tx"><span class="mm-no">06 · Para psicólogos</span><b>Supervisión clínica</b><small>Supervisión de casos ética y basada en evidencia.</small></span></a></li></ul>
              <a href="empezar.php" class="mm-feature">
                <img src="img/equipo-sillones.webp" alt="" loading="lazy">
                <span class="mm-feature-tx"><small>¿No sabes por dónde empezar?</small><b>Te orientamos sin compromiso</b><span class="mm-cta">Escríbenos <svg class="arr" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span></span>
              </a>
            </div>
          </div></li><li><a href="equipo.php">Equipo</a></li><li><a href="cursos.php">Cursos y clases</a></li><li><a href="profesionales.php">Para profesionales</a></li><li><a href="contacto.php">Contacto</a></li></ul></nav>
    <div class="nav-cta">
      <a href="empezar.php" class="btn">Agendar cita <svg class="arr" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
      <button class="burger" aria-label="Abrir menú" aria-expanded="false"><span></span><span></span></button>
    </div>
  </div>
</header>
<div class="mobile-menu">
  <ul><li><a href="index.php">Inicio</a></li><li><a href="nosotros.php">Nosotros</a></li><li><a href="servicios.php">Servicios</a><div class="mob-sub"><a href="servicio-terapia-individual.php">Terapia individual</a><a href="servicio-terapia-de-pareja.php">Terapia de pareja</a><a href="servicio-psicologia-infantil.php">Psicología infantil y neuropsicología</a><a href="servicio-psicopedagogia.php">Psicopedagogía</a><a href="servicio-evaluacion-y-orientacion-vocacional.php">Evaluación y orientación vocacional</a><a href="servicio-supervision-clinica.php">Supervisión clínica</a></div></li><li><a href="equipo.php">Equipo</a></li><li><a href="cursos.php">Cursos y clases</a></li><li><a href="profesionales.php">Para profesionales</a></li><li><a href="contacto.php">Contacto</a></li></ul>
  <div class="meta">Quito · Ibarra · En línea<br><a href="empezar.php" class="link">Agendar cita <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></a></div>
</div>
<main>
<section class="page-hero"><svg class="deco corner tr sm" viewBox="0 0 300 300" aria-hidden="true"><path class="d-fill" d="M300 0V300C252 262 238 206 198 174C150 136 82 152 50 104C24 64 38 22 58 0Z"/><path class="d-line" pathLength="1" d="M34 0C14 34 22 86 58 120C100 158 168 146 214 186C250 218 262 262 298 292"/></svg>
  <div class="wrap">
    <ol class="crumbs fade"><li><a href="index.php">Inicio</a></li><li aria-current="page">Nosotros</li></ol>
    <div class="row">
      <h1 class="split">Una psicología desde la <span class="ring"><em>identidad</em><svg viewBox="0 0 300 24" preserveAspectRatio="none" aria-hidden="true"><path d="M4 15C46 8 118 5 184 5.5c42 .3 82 2 110 4.6 3 .3 4 3.4 1.4 4.6-2 .9-6 1.3-12 1.5C214 17 150 16.5 92 18.6 58 19.8 30 21.6 10 22.6 4 23 1 21.4 1.6 18.6 2 17 2.8 15.7 4 15z"/><path class="b2" d="M24 21.4c48-2.6 120-4.4 190-4.6 26 0 52 .4 70 1.4" fill="none"/></svg></span></h1>
      <p class="lead fade">Mentis Psicología es una red de servicios psicológicos con atención en Ecuador y a nivel internacional, orientada al trabajo identitario y a la actualización profesional continua.</p>
    </div>
    <div class="reveal-img page-cover"><img data-parallax=".05" src="img/equipo-arco.webp" alt="Equipo de Mentis Psicología" style="object-position:50% 35%"></div>
  </div>
</section>

<section class="frankl">
  <div class="wrap"><svg class="deco leaf sprig" viewBox="0 0 120 200" aria-hidden="true"><g pathLength="1"><path pathLength="1" d="M60 196C57 150 61 100 71 8"/><path pathLength="1" d="M59.5 152C40 142 28 122 30 100C46 108 58 128 59.5 152Z"/><path pathLength="1" d="M61 122C80 114 92 94 90 72C74 80 63 98 61 122Z"/><path pathLength="1" d="M64 86C46 77 38 59 41 41C56 50 64 67 64 86Z"/><path pathLength="1" d="M67.5 56C82 49 90 33 88 17C76 23 68 39 67.5 56Z"/></g></svg>
    <blockquote class="split">«El sufrimiento deja de ser sufrimiento en el momento en que encuentra un <em>sentido</em>.»</blockquote>
    <cite class="fade">Viktor Frankl</cite><span class="orn" aria-hidden="true"><i></i></span>
  </div>
</section>
<section style="padding-top:20px">
  <div class="wrap two-col wide">
    <span class="label fade"><span class="n">(01)</span> Nuestro enfoque</span>
    <div class="prose">
      <p class="statement split">Cada persona construye su realidad a partir de su <em>historia</em>, sus <em>emociones</em> y sus <em>vínculos</em>.</p>
      <p class="fade" style="margin-top:34px">Por eso trabajamos desde el enfoque cognitivo constructivista. En lugar de aplicar una receta, buscamos comprender cómo das sentido a lo que vives, para que el cambio sea tuyo y se sostenga en el tiempo.</p>
      <p class="fade">Integramos la evidencia científica con una mirada humana, cercana y ética, y acompañamos cada proceso con profundo respeto por la singularidad de cada persona.</p>
    </div>
  </div>
</section>

<section style="padding-top:0">
  <div class="wrap">
    <ul class="svc-list" data-stagger style="border-top:1px solid var(--line)">
      <li><a><span class="no">i.</span><span class="ttl"><span class="ttl"><span class="thumb"></span><h3>Filosofía</h3></span></span><p>Creemos en una psicología cercana, consciente y respetuosa con cada proceso personal.</p><span></span></a></li>
      <li><a><span class="no">ii.</span><span class="ttl"><span class="ttl"><span class="thumb"></span><h3>Modelo</h3></span></span><p>Trabajamos desde el enfoque cognitivo constructivista integrando identidad y emociones.</p><span></span></a></li>
      <li><a><span class="no">iii.</span><span class="ttl"><span class="ttl"><span class="thumb"></span><h3>Forma de trabajar</h3></span></span><p>Acompañamos procesos reales, sin juicios, con herramientas prácticas y humanas.</p><span></span></a></li>
      <li><a><span class="no">iv.</span><span class="ttl"><span class="ttl"><span class="thumb"></span><h3>Capacitación</h3></span></span><p>Nos capacitamos constantemente para ofrecer una psicología ética, actualizada y responsable.</p><span></span></a></li>
    </ul>
  </div>
</section>

<section class="process">
  <div class="wrap sticky-grid">
    <div class="stick">
      <span class="label fade"><span class="n">(02)</span> Qué hacemos</span>
      <h2 class="split" style="margin-top:22px">Más que <em>consulta</em></h2>
    </div>
    <ol class="steps" data-stagger>
      <li><div><h3>Atención psicológica</h3><p>Individual, de pareja e infantil, centrada en la identidad y el bienestar integral.</p></div></li>
      <li><div><h3>Evaluación y orientación vocacional</h3><p>Adaptadas a necesidades personales, académicas y profesionales.</p></div></li>
      <li><div><h3>Cursos y talleres</h3><p>Psicoeducación para población general, profesionales e instituciones.</p></div></li>
      <li><div><h3>Supervisión y pasantías</h3><p>Supervisión clínica de casos y programas de pasantías para una formación responsable.</p></div></li>
    </ol>
  </div>
</section>

<section>
  <div class="wrap two-col" style="align-items:center">
    <div>
      <span class="label fade"><span class="n">(03)</span> Lo que queda</span>
      <h2 class="split" style="margin:22px 0 26px">Las cartas de nuestros <em>pacientes</em></h2>
      <p class="lead fade">En las paredes del consultorio guardamos las cartas que nos dejan quienes terminan su proceso. Son el mejor recordatorio de por qué hacemos lo que hacemos.</p>
    </div>
    <div class="collage">
      <div class="reveal-img tall"><img src="img/notas.webp" alt="Carta de agradecimiento de un paciente enmarcada" loading="lazy"></div>
      <div class="reveal-img short"><img src="img/notas2.webp" alt="Cartas de pacientes en el consultorio" loading="lazy"></div>
    </div>
  </div>
</section>

<section class="quote-sec"><svg class="deco leaf q-leaf" viewBox="0 0 120 200" aria-hidden="true"><g pathLength="1"><path pathLength="1" d="M60 196C57 150 61 100 71 8"/><path pathLength="1" d="M59.5 152C40 142 28 122 30 100C46 108 58 128 59.5 152Z"/><path pathLength="1" d="M61 122C80 114 92 94 90 72C74 80 63 98 61 122Z"/><path pathLength="1" d="M64 86C46 77 38 59 41 41C56 50 64 67 64 86Z"/><path pathLength="1" d="M67.5 56C82 49 90 33 88 17C76 23 68 39 67.5 56Z"/></g></svg><svg class="deco blob side" viewBox="0 0 400 400" aria-hidden="true"><path class="d-fill" d="M322 26C380 66 404 152 378 232C352 312 270 382 180 372C92 362 22 302 12 212C2 122 62 42 150 16C212-2 272-6 322 26Z"/><path class="d-line" pathLength="1" transform="translate(-16 14)" d="M322 26C380 66 404 152 378 232C352 312 270 382 180 372C92 362 22 302 12 212C2 122 62 42 150 16C212-2 272-6 322 26Z"/></svg>
  <div class="wrap" data-quotes>
    <span class="label fade">Testimonios</span>
    <div class="fade" style="margin-top:36px"><svg class="quote-mark" viewBox="0 0 48 48" fill="currentColor"><path d="M20 12C11 14 6 21 6 30v6h14V24h-7c0-5 3-8 8-9zM42 12c-9 2-14 9-14 18v6h14V24h-7c0-5 3-8 8-9z"/></svg><div class="q-slide"><p class="q">Desde la primera sesión me sentí escuchada de verdad, <em>sin juicios</em> y con mucha calma.</p><cite class="who"><span class="av">P</span><span><b>Paciente de Francisco</b><small>Terapia individual · Ciudad por confirmar</small></span></cite></div><div class="q-slide"><p class="q">Hoy en casa hay más calma, más comunicación y nuestra hija está <em>mucho más segura</em> de sí misma.</p><cite class="who"><span class="av">F</span><span><b>Familia de una paciente</b><small>Psicología infantil · Ciudad por confirmar</small></span></cite></div><div class="q-slide"><p class="q">Lo que más aprecio es lo seguro que se siente poder ser sincero y <em>hablar desde la realidad</em>.</p><cite class="who"><span class="av">A</span><span><b>Alejandro, 22 años</b><small>Estudiante universitario · Ciudad por confirmar</small></span></cite></div><div class="q-slide"><p class="q">Me ayudó a ver mis fortalezas y no mis debilidades, a <em>amarme más</em> y a cerrar heridas.</p><cite class="who"><span class="av">P</span><span><b>Paciente de Camila</b><small>Terapia individual · Ciudad por confirmar</small></span></cite></div></div>
    <div class="q-nav">
      <button class="prev" aria-label="Anterior"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M19 12H5M11 6l-6 6 6 6"/></svg></button>
      <span class="count">1 / 4</span>
      <button class="next" aria-label="Siguiente"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
    </div>
  </div>
</section>
<section class="cta">
  <div class="wrap">
    <div class="cta-box fade">
      <svg class="deco corner tr cta-c" viewBox="0 0 300 300" aria-hidden="true"><path class="d-fill" d="M300 0V300C252 262 238 206 198 174C150 136 82 152 50 104C24 64 38 22 58 0Z"/><path class="d-line" pathLength="1" d="M34 0C14 34 22 86 58 120C100 158 168 146 214 186C250 218 262 262 298 292"/></svg>
      <svg class="deco corner bl cta-c" viewBox="0 0 300 300" aria-hidden="true"><path class="d-fill" d="M300 0V300C252 262 238 206 198 174C150 136 82 152 50 104C24 64 38 22 58 0Z"/><path class="d-line" pathLength="1" d="M34 0C14 34 22 86 58 120C100 158 168 146 214 186C250 218 262 262 298 292"/></svg>
      <span class="label">El primer paso</span>
      <h2 class="split">Pedir ayuda también es <span class="ring"><em>cuidarte</em><svg viewBox="0 0 300 24" preserveAspectRatio="none" aria-hidden="true"><path d="M4 15C46 8 118 5 184 5.5c42 .3 82 2 110 4.6 3 .3 4 3.4 1.4 4.6-2 .9-6 1.3-12 1.5C214 17 150 16.5 92 18.6 58 19.8 30 21.6 10 22.6 4 23 1 21.4 1.6 18.6 2 17 2.8 15.7 4 15z"/><path class="b2" d="M24 21.4c48-2.6 120-4.4 190-4.6 26 0 52 .4 70 1.4" fill="none"/></svg></span></h2>
      <p>Responde 3 preguntas y te recomendamos a la profesional indicada para ti, en Quito, Ibarra o en línea.</p>
      <div class="acts">
        <a href="empezar.php" class="btn btn-light">Empezar ahora <svg class="arr" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        <a href="contacto.php" class="btn btn-light" style="--bg:transparent;--fg:#fff;box-shadow:inset 0 0 0 1px rgba(255,255,255,.5)">Ver sedes</a>
      </div>
    </div>
  </div>
</section>
</main>
<footer class="site-footer">
  <div class="wrap">
    <div class="foot-top">
      <div>
        <p class="foot-claim">Acompañamiento emocional desde la <em>identidad</em>.</p>
        <div class="social">
          <a href="https://www.instagram.com/mentispsicologiaecuador/" target="_blank" rel="noopener" aria-label="Instagram de Mentis Psicología"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".6"/></svg></a>
          <a href="https://www.facebook.com/mentis.psicologiauio" target="_blank" rel="noopener" aria-label="Facebook Mentis Quito" title="Facebook Quito"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M14 8h3V4h-3a4 4 0 00-4 4v3H7v4h3v6h4v-6h3l1-4h-4V8z"/></svg></a>
          <a href="https://www.facebook.com/mentis.psicologia.ibarra" target="_blank" rel="noopener" aria-label="Facebook Mentis Ibarra" title="Facebook Ibarra"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M14 8h3V4h-3a4 4 0 00-4 4v3H7v4h3v6h4v-6h3l1-4h-4V8z"/></svg></a>
          <a href="https://www.tiktok.com/@mentis_psicologia" target="_blank" rel="noopener" aria-label="TikTok de Mentis Psicología"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M14 3v11a4 4 0 11-4-4M14 3c.5 2.5 2.5 4.5 5 5"/></svg></a>
        </div>
      </div>
      <div><h4>Servicios</h4><ul><li><a href="servicio-terapia-individual.php">Terapia individual</a></li><li><a href="servicio-terapia-de-pareja.php">Terapia de pareja</a></li><li><a href="servicio-psicologia-infantil.php">Psicología infantil y neuropsicología</a></li><li><a href="servicio-psicopedagogia.php">Psicopedagogía</a></li><li><a href="servicio-evaluacion-y-orientacion-vocacional.php">Evaluación y orientación vocacional</a></li><li><a href="servicio-supervision-clinica.php">Supervisión clínica</a></li></ul></div>
      <div><h4>Mentis</h4><ul><li><a href="nosotros.php">Nosotros</a></li><li><a href="equipo.php">Equipo</a></li><li><a href="cursos.php">Cursos y clases</a></li><li><a href="profesionales.php">Para profesionales</a></li><li><a href="contacto.php">Contacto</a></li><li><a href="#">Blog</a></li></ul></div>
      <div><h4>Sedes</h4><ul><li><b style="color:#fff;font-weight:450">Quito</b> · El Porvenir y El Telégrafo</li><li><b style="color:#fff;font-weight:450">Ibarra</b> · Luis Cabezas Borja 1-35</li><li><b style="color:#fff;font-weight:450">En línea</b> · Ecuador y exterior</li><li><a href="tel:+593987082627">098 708 2627</a> · <a href="tel:+593984352682">098 435 2682</a></li><li><a href="mailto:mentis.psicologia@gmail.com">mentis.psicologia@gmail.com</a></li></ul></div>
    </div>
    <div class="emergency"><b>¿Estás en una emergencia?</b> Llama al 911 o acude al hospital más cercano. Mentis Psicología no brinda atención de crisis las 24 horas.</div>
    <div class="big-word" aria-hidden="true">MENTIS</div>
    <div class="legal"><span>© <span data-year>2026</span> Mentis Psicología. Todos los derechos reservados.</span><span><a href="privacidad.php">Política de privacidad</a> · <a href="#" data-cookies-open>Cookies</a> · Diseño: Creative Web</span></div>
  </div>
</footer>
<a href="empezar.php" class="wa" aria-label="Escribir por WhatsApp"><span>¿Hablamos?</span><i><svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 00-8.6 15.1L2 22l5-1.3A10 10 0 1012 2zm0 18.2a8.2 8.2 0 01-4.2-1.1l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1112 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 01-3.3-2.9c-.3-.4.3-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 00-.7.3 3 3 0 00-.9 2.2 5.2 5.2 0 001.1 2.7 11.8 11.8 0 004.5 4c1.7.7 2.3.8 3.2.6a2.7 2.7 0 001.8-1.2 2.2 2.2 0 00.1-1.3c0-.1-.2-.2-.5-.3z"/></svg></i></a>
<aside class="nudge" aria-label="Empieza tu proceso" hidden>
  <button class="nudge-x" aria-label="Cerrar">&times;</button>
  <span class="label">Empieza hoy</span>
  <p class="nudge-t">¿Buscas un proceso de <em>cambio</em>?</p>
  <p class="nudge-p">Responde 3 preguntas y te recomendamos a la profesional indicada.</p>
  <a href="empezar.php" class="btn">Empezar <svg class="arr" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
</aside>
<div class="cookies" role="dialog" aria-label="Uso de cookies" hidden>
  <p>Usamos cookies necesarias para que la web funcione y, si lo aceptas, cookies de medición para mejorarla. Más información en nuestra <a href="privacidad.php" class="link">política de privacidad</a>.</p>
  <div class="cookies-acts"><button class="btn btn-line" data-cookies="min">Solo necesarias</button><button class="btn" data-cookies="all">Aceptar</button></div>
</div>
<div class="theme-pick" role="group" aria-label="Opciones de color">
  <button data-theme-set="a" style="--a:#2F7476;--b:#C6DEDE" aria-pressed="true"><span>A · Aguamarina (recomendada)</span></button>
  <button data-theme-set="b" style="--a:#4E6E7A;--b:#C1A486" aria-pressed="false"><span>B · Arena y celeste</span></button>
  <button data-theme-set="c" style="--a:#56746A;--b:#EDE3D6" aria-pressed="false"><span>C · Salvia</span></button>
</div>
<script src="assets/main.js?v=1793456252" defer></script>
</body>
</html>