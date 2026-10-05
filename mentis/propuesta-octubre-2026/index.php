<?php
session_start();
if (empty($_SESSION['auth_mentis'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta &middot; Mentis Psicología</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{fontFamily:{d:['Outfit','sans-serif'],s:['Inter','sans-serif']},
colors:{tinta:'#0d1626',azul:{400:'#6f9ae0',500:'#4f7fd0',600:'#1e4a96'},crema:{200:'#efe6d8',400:'#c9b48f'}}}}}
</script>
<style>
html{scroll-behavior:smooth}
body{font-family:'Inter',sans-serif;background:#0d1626;background-image:radial-gradient(circle at 15% 0%,rgba(30,74,150,.30),transparent 45%)}
section{scroll-margin-top:78px}
.glass{background:rgba(255,255,255,.035);border:1px solid rgba(232,225,212,.10);border-radius:18px}
.eyebrow{font-family:'Outfit',sans-serif;font-size:11px;letter-spacing:.2em;text-transform:uppercase}
.nav a.on{color:#fff;background:rgba(79,127,208,.20)}
.check li{position:relative;padding-left:22px}
.check li:before{content:'';position:absolute;left:0;top:.55em;width:9px;height:9px;border-radius:50%;background:#4f7fd0}
.no li:before{background:#5b6578}
</style>
</head>
<body class="text-slate-300 antialiased">

<nav class="nav sticky top-0 z-50 border-b border-white/5 backdrop-blur-xl bg-[#0d1626]/85">
  <div class="max-w-4xl mx-auto px-5">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#diagnostico" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 whitespace-nowrap transition">Diagnóstico</a>
      <a href="#sistema" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 whitespace-nowrap transition">Sistema</a>
      <a href="#web" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 whitespace-nowrap transition">Sitio web</a>
      <a href="#seo" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 whitespace-nowrap transition">Plan SEO</a>
      <a href="#cronograma" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 whitespace-nowrap transition">Cronograma</a>
      <a href="#experiencia" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 whitespace-nowrap transition">Experiencia</a>
    </div>
  </div>
</nav>

<main class="max-w-4xl mx-auto px-5 pb-20">

<!-- CABECERA -->
<header class="pt-12 pb-10">
  <div class="flex items-center gap-4 mb-6">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto">
    <span class="w-px h-8 bg-white/15"></span>
    <img src="logo-mentis.jpg" alt="Mentis Psicología" class="h-14 w-14 rounded-full">
  </div>
  <p class="eyebrow text-crema-400 mb-3">Propuesta &middot; octubre de 2026</p>
  <h1 class="font-d text-3xl md:text-4xl font-bold text-white leading-tight mb-4">Un sistema para sus dos sedes y una web que convierta a sus seguidores en pacientes</h1>
  <p class="text-slate-400 max-w-2xl">Dos proformas independientes: puede aprobar una sin la otra. Todos los valores son en dólares y <strong class="text-white">no incluyen IVA</strong>.</p>

  <div class="grid md:grid-cols-3 gap-4 mt-8">
    <a href="#sistema" class="glass p-5 hover:border-azul-500/50 transition flex flex-col">
      <p class="eyebrow text-azul-400 mb-2">Proforma 1-2-1333</p>
      <p class="font-d text-white font-semibold text-lg mb-1">Sistema</p>
      <p class="font-d text-3xl font-bold text-white">$1.200</p>
      <p class="text-sm text-slate-400 mt-1">+ $59 al mes por sede</p>
      <p class="text-xs text-slate-500 mt-auto pt-3">Agenda, fichas, cobros y facturación por sede</p>
    </a>
    <a href="#web" class="glass p-5 hover:border-azul-500/50 transition flex flex-col">
      <p class="eyebrow text-azul-400 mb-2">Proforma 1-2-1334</p>
      <p class="font-d text-white font-semibold text-lg mb-1">Sitio web</p>
      <p class="font-d text-3xl font-bold text-white">$1.000</p>
      <p class="text-sm text-slate-400 mt-1">pago único · primer año incluido</p>
      <p class="text-xs text-slate-500 mt-auto pt-3">Tests en línea y venta de cursos</p>
    </a>
    <a href="#seo" class="glass p-5 hover:border-azul-500/50 transition flex flex-col">
      <p class="eyebrow text-crema-400 mb-2">Opcional</p>
      <p class="font-d text-white font-semibold text-lg mb-1">Plan SEO 6 meses</p>
      <p class="font-d text-3xl font-bold text-white">$600</p>
      <p class="text-sm text-slate-400 mt-1">o $150 al mes</p>
      <p class="text-xs text-slate-500 mt-auto pt-3">120 artículos para aparecer en Google</p>
    </a>
  </div>
</header>

<!-- DIAGNÓSTICO -->
<section id="diagnostico" class="py-10 border-t border-white/5">
  <p class="eyebrow text-crema-400 mb-2">Diagnóstico</p>
  <h2 class="font-d text-2xl font-bold text-white mb-6">Tienen la audiencia. Les falta dónde convertirla.</h2>
  <div class="grid sm:grid-cols-3 gap-4 mb-6">
    <div class="glass p-5"><p class="font-d text-3xl font-bold text-white">14,1 mil</p><p class="text-sm text-slate-400 mt-1">seguidores en Instagram, con 524 publicaciones</p></div>
    <div class="glass p-5"><p class="font-d text-3xl font-bold text-white">0</p><p class="text-sm text-slate-400 mt-1">sitio web: solo la ficha de Google Business</p></div>
    <div class="glass p-5"><p class="font-d text-3xl font-bold text-white">2 sedes</p><p class="text-sm text-slate-400 mt-1">cada una con su RUC, su punto de emisión y su WhatsApp</p></div>
  </div>
  <ul class="check space-y-2.5 text-[15px]">
    <li>Todo el contacto entra por dos WhatsApp distintos, uno por sede: citas, preguntas y talleres pasan por una persona que responde a mano.</li>
    <li>Quien busca a Mentis en Google encuentra su Facebook e Instagram, pero ninguna página propia donde ver servicios, sedes y agendar.</li>
    <li>Los talleres y cursos se anuncian en redes, pero no hay forma de inscribirse y pagar en el momento.</li>
    <li>Con 13 profesionales solo en Ibarra y dos razones sociales, las finanzas de cada sede tienen que estar separadas desde el sistema, no en una hoja de cálculo.</li>
  </ul>
</section>

<!-- SISTEMA -->
<section id="sistema" class="py-10 border-t border-white/5">
  <p class="eyebrow text-azul-400 mb-2">Proforma 1-2-1333 &middot; Sistema</p>
  <h2 class="font-d text-2xl font-bold text-white mb-3">El sistema que vio en la reunión, adaptado a psicología</h2>
  <p class="text-slate-400 mb-6">Es el mismo motor de DentiLab, nuestro sistema para clínicas, configurado para dos sedes y con una ficha clínica psicológica en lugar de la dental.</p>

  <div class="grid md:grid-cols-2 gap-4 mb-6">
    <div class="glass p-6">
      <p class="font-d text-white font-semibold mb-3">Listo desde el primer día</p>
      <ul class="check space-y-2 text-sm">
        <li>Agenda por profesional, con feriados, vacaciones y ausencias</li>
        <li>Recordatorios y confirmaciones automáticas por WhatsApp</li>
        <li>Reserva de citas en línea, por sede</li>
        <li>Cobros, abonos, saldos y pago mixto</li>
        <li>Factura electrónica en un clic, ilimitada</li>
        <li>Ficha del paciente compartida entre las dos sedes</li>
      </ul>
    </div>
    <div class="glass p-6">
      <p class="font-d text-white font-semibold mb-3">Desarrollado para Mentis</p>
      <ul class="check space-y-2 text-sm">
        <li>Ficha psicológica: motivo de consulta, anamnesis, antecedentes, examen mental, diagnóstico CIE-10 y plan terapéutico</li>
        <li>Notas de cada sesión de terapia</li>
        <li>Cada sede ve solo sus ingresos; usted ve las dos por separado</li>
        <li>Tarifas y profesionales propios de cada sede</li>
        <li>Facturación con el RUC y punto de emisión de cada sede</li>
      </ul>
    </div>
  </div>

  <div class="overflow-x-auto glass mb-4">
    <table class="w-full text-sm">
      <thead><tr class="text-left text-slate-400 border-b border-white/10"><th class="p-4 font-medium">Concepto</th><th class="p-4 font-medium text-right">Valor + IVA</th></tr></thead>
      <tbody>
        <tr class="border-b border-white/5"><td class="p-4 text-white">Implementación (pago único)<br><span class="text-slate-400 text-xs">60 % al iniciar ($720) y 40 % a la entrega ($480). Incluye carga inicial y capacitación.</span></td><td class="p-4 text-right font-d text-xl text-white font-semibold whitespace-nowrap">$1.200</td></tr>
        <tr class="border-b border-white/5"><td class="p-4 text-white">Suscripción mensual por sede<br><span class="text-slate-400 text-xs">Profesionales y pacientes ilimitados, facturación SRI ilimitada, servidor, respaldos y soporte. Desde la entrega.</span></td><td class="p-4 text-right font-d text-xl text-white font-semibold whitespace-nowrap">$59</td></tr>
        <tr><td class="p-4 text-slate-300">Quito + Ibarra, al mes</td><td class="p-4 text-right font-d text-xl text-white font-semibold">$118</td></tr>
      </tbody>
    </table>
  </div>
  <div class="glass p-4 text-sm border-l-2 border-l-crema-400 mb-3"><strong class="text-white">Incluye una ficha psicológica</strong>, con las secciones que definamos juntos en una reunión de diseño. Los cambios posteriores a lo aprobado se cobran por hora técnica.</div>
  <p class="text-xs text-slate-500">Costos de terceros que no cobra Creative Web: los mensajes de WhatsApp que cobra Meta (aprox. $0,01 por mensaje) y la firma electrónica de cada RUC.</p>
</section>

<!-- WEB -->
<section id="web" class="py-10 border-t border-white/5">
  <p class="eyebrow text-azul-400 mb-2">Proforma 1-2-1334 &middot; Sitio web</p>
  <h2 class="font-d text-2xl font-bold text-white mb-6">Una web que agenda, capta y vende</h2>

  <div class="overflow-x-auto glass mb-4">
    <table class="w-full text-sm">
      <thead><tr class="text-left text-slate-400 border-b border-white/10"><th class="p-4 font-medium">Qué incluye</th><th class="p-4 font-medium text-right">Valor + IVA</th></tr></thead>
      <tbody>
        <tr class="border-b border-white/5"><td class="p-4"><span class="text-white font-medium">Sitio web</span><br><span class="text-slate-400 text-xs">Servicios para niños, adolescentes, adultos, adultos mayores, parejas y familias · sedes con mapa y WhatsApp · equipo, testimonios y blog · botón «Agendar cita» que entra directo a la agenda del sistema · adaptado a celular · SEO básico (Google Business, Search Console, títulos). Primer año de dominio, hosting y correos incluido.</span></td><td class="p-4 text-right font-d text-lg text-white font-semibold">$500</td></tr>
        <tr class="border-b border-white/5"><td class="p-4"><span class="text-white font-medium">Tests psicológicos gratuitos</span><br><span class="text-slate-400 text-xs">Hasta 3 tests de tamizaje que elijan ustedes. Piden nombre y WhatsApp; el resultado les llega a ustedes y el paciente ve una orientación general con el botón para agendar.</span></td><td class="p-4 text-right font-d text-lg text-white font-semibold">$200</td></tr>
        <tr class="border-b border-white/5"><td class="p-4"><span class="text-white font-medium">Cursos y talleres con pago en línea</span><br><span class="text-slate-400 text-xs">Una página por curso (fecha, temario, facilitador), inscripción y pago con tarjeta, confirmación por correo y listado de inscritos.</span></td><td class="p-4 text-right font-d text-lg text-white font-semibold">$300</td></tr>
        <tr><td class="p-4 text-white font-medium">Total, pago único</td><td class="p-4 text-right font-d text-2xl text-white font-bold">$1.000</td></tr>
      </tbody>
    </table>
  </div>
  <div class="grid sm:grid-cols-2 gap-4 text-sm">
    <div class="glass p-5">
      <p class="text-white font-medium mb-2">Pago y renovación</p>
      <p class="text-slate-400">60 % al iniciar ($600) y 40 % a la entrega ($400). Desde el segundo año: hosting $83,88 + dominio $21,99 = <strong class="text-white">$105,87 al año</strong>.</p>
    </div>
    <div class="glass p-5">
      <p class="text-white font-medium mb-2">Dominio propuesto</p>
      <p class="text-slate-400"><strong class="text-white">mentispsicologiaecuador.com</strong>, libre al 5 de octubre y igual a su Instagram. mentispsicologia.com ya está registrado por otra persona.</p>
    </div>
  </div>
  <ul class="check no space-y-2 text-xs text-slate-500 mt-5">
    <li>La pasarela de pago cobra su propia comisión por cada venta de cursos.</li>
    <li>Los tests orientan; no reemplazan la evaluación de un profesional, y así se indica en la web.</li>
    <li>No incluye producción de fotos ni videos, manejo de redes sociales ni publicidad pagada.</li>
  </ul>
</section>

<!-- SEO -->
<section id="seo" class="py-10 border-t border-white/5">
  <p class="eyebrow text-crema-400 mb-2">Opcional</p>
  <h2 class="font-d text-2xl font-bold text-white mb-3">Plan de posicionamiento en Google — 6 meses</h2>
  <p class="text-slate-400 mb-6">Se activa cuando la web ya esté publicada. Cada artículo responde algo que la gente busca («cómo saber si necesito terapia», «terapia de pareja en Quito») y lleva al botón de agendar.</p>
  <div class="grid sm:grid-cols-2 gap-4 items-stretch">
    <div class="glass p-6 flex flex-col"><p class="eyebrow text-azul-400 mb-2">Un solo pago</p><p class="font-d text-3xl font-bold text-white">$600</p><p class="text-sm text-slate-400 mt-auto pt-3">por los 6 meses</p></div>
    <div class="glass p-6 flex flex-col"><p class="eyebrow text-azul-400 mb-2">Mes a mes</p><p class="font-d text-3xl font-bold text-white">$150<span class="text-base text-slate-400 font-normal"> /mes</span></p><p class="text-sm text-slate-400 mt-auto pt-3">$900 en total</p></div>
  </div>
  <ul class="check space-y-2 text-sm mt-5">
    <li>20 artículos al mes: 120 al terminar los seis meses</li>
    <li>Informe y reunión mensual con apariciones, visitas y posiciones en Google</li>
  </ul>
</section>

<!-- CRONOGRAMA -->
<section id="cronograma" class="py-10 border-t border-white/5">
  <p class="eyebrow text-crema-400 mb-2">Cronograma</p>
  <h2 class="font-d text-2xl font-bold text-white mb-6">De la aprobación a funcionar</h2>
  <div class="grid md:grid-cols-2 gap-4 mb-6">
    <div class="glass p-6">
      <p class="font-d text-white font-semibold mb-3">Sistema · 3 a 4 semanas</p>
      <ol class="space-y-2 text-sm list-decimal list-inside text-slate-300">
        <li>Reunión de diseño de la ficha psicológica</li>
        <li>Desarrollo y configuración de las dos sedes</li>
        <li>Carga de pacientes y pruebas de facturación</li>
        <li>Capacitación y entrega</li>
      </ol>
    </div>
    <div class="glass p-6">
      <p class="font-d text-white font-semibold mb-3">Sitio web · 4 a 5 semanas</p>
      <ol class="space-y-2 text-sm list-decimal list-inside text-slate-300">
        <li>Estructura y diseño aprobados</li>
        <li>Páginas, tests y cursos</li>
        <li>Conexión con la agenda y la pasarela de pago</li>
        <li>Publicación y alta en Google</li>
      </ol>
    </div>
  </div>
  <div class="glass p-6 text-sm">
    <p class="text-white font-medium mb-3">Lo que necesitamos de ustedes para arrancar</p>
    <div class="grid sm:grid-cols-2 gap-x-6">
      <ul class="check space-y-2"><li>Su ficha clínica actual</li><li>Profesionales y tarifas de cada sede</li><li>RUC, punto de emisión y firma electrónica de cada sede</li></ul>
      <ul class="check space-y-2"><li>Fotos del equipo y de las sedes</li><li>Los tests que quieren publicar</li><li>Lista de cursos y talleres con sus precios</li></ul>
    </div>
  </div>
</section>

<!-- EXPERIENCIA -->
<section id="experiencia" class="py-10 border-t border-white/5">
  <p class="eyebrow text-crema-400 mb-2">Experiencia</p>
  <h2 class="font-d text-2xl font-bold text-white mb-6">Sistemas propios, en uso</h2>
  <div class="grid sm:grid-cols-2 gap-4 text-sm">
    <div class="glass p-5"><p class="text-white font-medium">DentiLab</p><p class="text-slate-400 mt-1">Nuestro sistema para clínicas: agenda, fichas, WhatsApp y cobros. Es la base de su sistema.</p></div>
    <div class="glass p-5"><p class="text-white font-medium">Quipuy</p><p class="text-slate-400 mt-1">Nuestra facturación electrónica autorizada por el SRI, integrada al sistema.</p></div>
    <div class="glass p-5"><p class="text-white font-medium">Motrix · FisioVida</p><p class="text-slate-400 mt-1">Sistema de gestión para un centro de fisioterapia.</p></div>
    <div class="glass p-5"><p class="text-white font-medium">+60 sitios web</p><p class="text-slate-400 mt-1">Para empresas del Ecuador, con posicionamiento en Google.</p></div>
  </div>
</section>

<!-- DESCARGAS -->
<section id="descargas" class="py-10 border-t border-white/5">
  <div class="flex flex-wrap gap-3">
    <a href="pdf/proforma-1-2-1333-sistema.pdf" download="Proforma-1-2-1333-Sistema-Mentis.pdf" class="px-5 py-3 rounded-xl bg-azul-600 hover:bg-[#25579f] text-white font-d font-semibold text-sm transition">Descargar proforma del sistema (PDF)</a>
    <a href="pdf/proforma-1-2-1334-web.pdf" download="Proforma-1-2-1334-Web-Mentis.pdf" class="px-5 py-3 rounded-xl border border-white/15 hover:bg-white/5 text-white font-d font-semibold text-sm transition">Descargar proforma de la web (PDF)</a>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20revis%C3%A9%20la%20propuesta%20de%20Mentis%20Psicolog%C3%ADa." class="px-5 py-3 rounded-xl border border-white/15 hover:bg-white/5 text-white font-d font-semibold text-sm transition">Escribir por WhatsApp</a>
  </div>
</section>

<footer class="pt-8 border-t border-white/5">
  <p class="text-xs text-slate-500">Ing. Santiago Oña Sánchez &middot; Creative Web &middot; 099 917 4980 &middot; info@creativeweb.com.ec</p>
  <div class="flex items-center gap-3 mt-3">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
    <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; octubre de 2026 &middot; <a href="logout.php" class="hover:text-slate-300">Salir</a></p>
  </div>
</footer>
</main>

<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{
  const vis=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
  if(!vis) return;
  const a=links.get(vis.target.id);
  if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');}
},{rootMargin:'-78px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>
</body>
</html>
