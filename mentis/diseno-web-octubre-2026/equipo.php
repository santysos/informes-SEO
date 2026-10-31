<?php
session_start();
if (empty($_SESSION['auth_mentis'])) { header('Location: login.php'); exit; }
?>
<!doctype html>
<html lang="es-EC">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Equipo de psicólogos | Mentis Psicología</title>
<meta name="description" content="Conoce a las psicólogas, psicólogos y psicopedagogas de Mentis Psicología en Quito e Ibarra.">
<meta property="og:title" content="Equipo de psicólogos | Mentis Psicología">
<meta property="og:description" content="Conoce a las psicólogas, psicólogos y psicopedagogas de Mentis Psicología en Quito e Ibarra.">
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
    <nav aria-label="Principal"><ul class="menu"><li><a href="nosotros.php">Nosotros</a></li><li class="has-mega"><a href="servicios.php" aria-haspopup="true">Servicios</a>
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
          </div></li><li><a href="equipo.php" aria-current="page">Equipo</a></li><li><a href="cursos.php">Cursos y clases</a></li><li><a href="profesionales.php">Para profesionales</a></li><li><a href="contacto.php">Contacto</a></li></ul></nav>
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
    <ol class="crumbs fade"><li><a href="index.php">Inicio</a></li><li aria-current="page">Equipo</li></ol>
    <div class="row">
      <h1 class="split">Las personas que te van a <span class="ring"><em>escuchar</em><svg viewBox="0 0 300 24" preserveAspectRatio="none" aria-hidden="true"><path d="M4 15C46 8 118 5 184 5.5c42 .3 82 2 110 4.6 3 .3 4 3.4 1.4 4.6-2 .9-6 1.3-12 1.5C214 17 150 16.5 92 18.6 58 19.8 30 21.6 10 22.6 4 23 1 21.4 1.6 18.6 2 17 2.8 15.7 4 15z"/><path class="b2" d="M24 21.4c48-2.6 120-4.4 190-4.6 26 0 52 .4 70 1.4" fill="none"/></svg></span></h1>
      <p class="lead fade">Psicólogas, psicólogos y psicopedagogas formados en Ecuador, Argentina y España. Elige con quién quieres empezar.</p>
    </div>
  </div>
</section>
<section style="padding-top:0">
  <div class="wrap"><div class="team-grid" data-stagger><a href="equipo-cristina-munoz.php" class="person">
  <div class="ph"><img src="img/cristina.webp" alt="Cristina Muñoz, Psicóloga clínica" loading="lazy"></div>
  <div class="hd"><div><h3>Cristina Muñoz</h3><span class="role">Psicóloga clínica</span></div><span class="go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></div>
  <p>Adultos, adultos mayores y parejas. Más de 8 años de experiencia clínica.</p>
</a><a href="equipo-jacobo-recalde.php" class="person">
  <div class="ph"><img src="img/jacobo.webp" alt="Jacobo Recalde, Psicólogo clínico y psicoterapeuta" loading="lazy"></div>
  <div class="hd"><div><h3>Jacobo Recalde</h3><span class="role">Psicólogo clínico y psicoterapeuta</span></div><span class="go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></div>
  <p>Adultos, conflictos internos y relaciones. Más de 20 años de experiencia.</p>
</a><a href="equipo-pamela-villegas.php" class="person">
  <div class="ph"><span class="mono">PV</span><small>Foto por asignar</small></div>
  <div class="hd"><div><h3>Pamela Villegas</h3><span class="role">Psicóloga infantil y neuropsicóloga</span></div><span class="go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></div>
  <p>Neurodesarrollo, aprendizaje y atención temprana. Formada en Ecuador y España.</p>
</a><a href="equipo-francisco-vasquez.php" class="person">
  <div class="ph"><span class="mono">FV</span><small>Foto por asignar</small></div>
  <div class="hd"><div><h3>Francisco Vásquez</h3><span class="role">Psicólogo · Psicoterapia</span></div><span class="go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></div>
  <p>Ansiedad, estrés y Terapia de Aceptación y Compromiso. Más de 5 años de experiencia.</p>
</a><a href="equipo-allison-garrido.php" class="person">
  <div class="ph"><img src="img/allison.webp" alt="Allison Garrido, Psicopedagoga" loading="lazy"></div>
  <div class="hd"><div><h3>Allison Garrido</h3><span class="role">Psicopedagoga</span></div><span class="go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></div>
  <p>Niños y adolescentes, inclusión educativa y neurodiversidad. Presencial y en línea.</p>
</a></div></div>
</section>

<section class="unis" aria-label="Nuestro equipo se formó en">
  <p class="unis-t">Nuestro equipo se formó en</p>
  <div class="unis-row"><div class="unis-track"><span>Universidad Central del Ecuador</span><span>Universidad de las Américas</span><span>Universidad San Francisco de Quito</span><span>Universidad Técnica Particular de Loja</span><span>Universidad Técnica del Norte</span><span>Universitat de Barcelona</span><span>Universidad de Palermo</span><span>Universidad Maimónides</span><span>Universidad Central del Ecuador</span><span>Universidad de las Américas</span><span>Universidad San Francisco de Quito</span><span>Universidad Técnica Particular de Loja</span><span>Universidad Técnica del Norte</span><span>Universitat de Barcelona</span><span>Universidad de Palermo</span><span>Universidad Maimónides</span></div></div>
</section>
<section style="padding-top:0">
  <div class="wrap"><div class="reveal-img page-cover"><img data-parallax=".05" src="img/equipo-sillones.webp" alt="Equipo de Mentis Psicología en el consultorio" style="object-position:50% 40%"></div></div>
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