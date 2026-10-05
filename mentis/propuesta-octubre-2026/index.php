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
colors:{azul:{400:'#7ea6e8',500:'#4f7fd0',600:'#1e4a96',700:'#183d7c'},crema:{200:'#efe6d8',400:'#c9b48f'}}}}}
</script>
<style>
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{font-family:'Inter',sans-serif;background:#0d1626;background-image:radial-gradient(circle at 15% 0%,rgba(30,74,150,.30),transparent 45%);overflow-x:hidden}
section{scroll-margin-top:64px}
.glass{background:rgba(255,255,255,.04);border:1px solid rgba(232,225,212,.11);border-radius:18px}
.eyebrow{font-family:'Outfit',sans-serif;font-size:11px;letter-spacing:.2em;text-transform:uppercase}
.nav a.on{color:#fff;background:rgba(79,127,208,.22)}
.check li{position:relative;padding-left:22px}
.check li:before{content:'';position:absolute;left:0;top:.6em;width:8px;height:8px;border-radius:50%;background:#4f7fd0}
.no li:before{background:#5b6578}
.nav-scroll{scrollbar-width:none}.nav-scroll::-webkit-scrollbar{display:none}
.precio{font-family:'Outfit',sans-serif;font-weight:700;color:#fff;line-height:1}
</style>
</head>
<body class="text-slate-300 antialiased text-[16px] pb-24 lg:pb-0">

<nav class="nav sticky top-0 z-50 border-b border-white/5 backdrop-blur-xl bg-[#0d1626]/90">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="nav-scroll flex gap-1 overflow-x-auto py-2.5 text-sm font-medium">
      <a href="#diagnostico" class="px-3.5 py-2 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Diagnóstico</a>
      <a href="#sistema" class="px-3.5 py-2 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Sistema</a>
      <a href="#web" class="px-3.5 py-2 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Sitio web</a>
      <a href="#seo" class="px-3.5 py-2 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Plan SEO</a>
      <a href="#cronograma" class="px-3.5 py-2 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Cronograma</a>
      <a href="#experiencia" class="px-3.5 py-2 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Experiencia</a>
    </div>
  </div>
</nav>

<main class="max-w-6xl mx-auto px-4 sm:px-6">

<!-- CABECERA -->
<header class="pt-8 sm:pt-12 pb-10">
  <div class="flex items-center gap-4 mb-6">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-7 sm:h-8 w-auto">
    <span class="w-px h-8 bg-white/15"></span>
    <img src="logo-mentis.jpg" alt="Mentis Psicología" class="h-12 w-12 sm:h-14 sm:w-14 rounded-full">
  </div>
  <div class="lg:grid lg:grid-cols-12 lg:gap-10 lg:items-end">
    <div class="lg:col-span-7">
      <p class="eyebrow text-crema-400 mb-3">Propuesta &middot; octubre de 2026</p>
      <h1 class="font-d text-[28px] leading-[1.15] sm:text-4xl lg:text-[44px] font-bold text-white mb-4">Un sistema para sus dos sedes y una web que convierta a sus seguidores en pacientes</h1>
    </div>
    <p class="lg:col-span-5 text-slate-400 text-[15px] sm:text-base lg:pb-2">Son dos proformas independientes: pueden aprobar una sin la otra. Los valores están en dólares y <strong class="text-white">no incluyen IVA</strong>.</p>
  </div>

  <div class="grid sm:grid-cols-3 gap-3 sm:gap-4 mt-8">
    <a href="#sistema" class="glass p-5 sm:p-6 hover:border-azul-500/60 transition flex sm:flex-col items-center sm:items-start justify-between gap-4">
      <div>
        <p class="eyebrow text-azul-400 mb-1.5">Proforma 1-2-1333</p>
        <p class="font-d text-white font-semibold text-lg">Sistema</p>
        <p class="text-sm text-slate-400 mt-0.5 hidden sm:block">Agenda, fichas, cobros y facturación por sede</p>
      </div>
      <div class="text-right sm:text-left sm:mt-auto sm:pt-2">
        <p class="precio text-3xl sm:text-4xl">$1.200</p>
        <p class="text-sm text-slate-400 mt-1">+ $59/mes por sede</p>
      </div>
    </a>
    <a href="#web" class="glass p-5 sm:p-6 hover:border-azul-500/60 transition flex sm:flex-col items-center sm:items-start justify-between gap-4">
      <div>
        <p class="eyebrow text-azul-400 mb-1.5">Proforma 1-2-1334</p>
        <p class="font-d text-white font-semibold text-lg">Sitio web</p>
        <p class="text-sm text-slate-400 mt-0.5 hidden sm:block">Tests en línea y venta de cursos</p>
      </div>
      <div class="text-right sm:text-left sm:mt-auto sm:pt-2">
        <p class="precio text-3xl sm:text-4xl">$1.000</p>
        <p class="text-sm text-slate-400 mt-1">pago único</p>
      </div>
    </a>
    <a href="#seo" class="glass p-5 sm:p-6 hover:border-azul-500/60 transition flex sm:flex-col items-center sm:items-start justify-between gap-4">
      <div>
        <p class="eyebrow text-crema-400 mb-1.5">Opcional</p>
        <p class="font-d text-white font-semibold text-lg">Plan SEO 6 meses</p>
        <p class="text-sm text-slate-400 mt-0.5 hidden sm:block">120 artículos para aparecer en Google</p>
      </div>
      <div class="text-right sm:text-left sm:mt-auto sm:pt-2">
        <p class="precio text-3xl sm:text-4xl">$600</p>
        <p class="text-sm text-slate-400 mt-1">o $150 al mes</p>
      </div>
    </a>
  </div>
</header>

<!-- DIAGNÓSTICO -->
<section id="diagnostico" class="py-10 sm:py-14 border-t border-white/5 lg:grid lg:grid-cols-12 lg:gap-10">
  <div class="lg:col-span-4 mb-6 lg:mb-0">
    <p class="eyebrow text-crema-400 mb-2">Diagnóstico</p>
    <h2 class="font-d text-2xl sm:text-3xl font-bold text-white leading-tight">Tienen la audiencia. Les falta dónde convertirla.</h2>
  </div>
  <div class="lg:col-span-8">
    <div class="grid grid-cols-3 gap-2.5 sm:gap-4 mb-6">
      <div class="glass p-3.5 sm:p-5"><p class="precio text-2xl sm:text-4xl">14,1k</p><p class="text-xs sm:text-sm text-slate-400 mt-2 leading-snug">seguidores en Instagram</p></div>
      <div class="glass p-3.5 sm:p-5"><p class="precio text-2xl sm:text-4xl">0</p><p class="text-xs sm:text-sm text-slate-400 mt-2 leading-snug">sitio web propio</p></div>
      <div class="glass p-3.5 sm:p-5"><p class="precio text-2xl sm:text-4xl">2</p><p class="text-xs sm:text-sm text-slate-400 mt-2 leading-snug">sedes, cada una con su RUC</p></div>
    </div>
    <ul class="check grid md:grid-cols-2 gap-x-8 gap-y-3.5 text-[15px] leading-relaxed">
      <li>Todo el contacto entra por dos WhatsApp, uno por sede: citas, preguntas y talleres los responde una persona a mano.</li>
      <li>En Google aparecen su Facebook e Instagram, pero ninguna página propia donde ver servicios, sedes y agendar.</li>
      <li>Los talleres y cursos se anuncian en redes, sin forma de inscribirse y pagar en el momento.</li>
      <li>Con 13 profesionales solo en Ibarra y dos razones sociales, las finanzas de cada sede deben separarse en el sistema, no en una hoja de cálculo.</li>
    </ul>
  </div>
</section>

<!-- SISTEMA -->
<section id="sistema" class="py-10 sm:py-14 border-t border-white/5 lg:grid lg:grid-cols-12 lg:gap-10">
  <div class="lg:col-span-4 mb-6 lg:mb-0">
    <p class="eyebrow text-azul-400 mb-2">Proforma 1-2-1333</p>
    <h2 class="font-d text-2xl sm:text-3xl font-bold text-white leading-tight mb-3">El sistema que vio en la reunión, adaptado a psicología</h2>
    <p class="text-slate-400 text-[15px]">El mismo motor de DentiLab, nuestro sistema para clínicas, configurado para dos sedes y con ficha psicológica en lugar de la dental.</p>
  </div>
  <div class="lg:col-span-8 space-y-4">
    <div class="grid md:grid-cols-2 gap-3 sm:gap-4">
      <div class="glass p-5 sm:p-6">
        <p class="font-d text-white font-semibold mb-3">Listo desde el primer día</p>
        <ul class="check space-y-2.5 text-[15px]">
          <li>Agenda por profesional, con feriados y ausencias</li>
          <li>Recordatorios y confirmaciones por WhatsApp</li>
          <li>Reserva de citas en línea, por sede</li>
          <li>Cobros, abonos, saldos y pago mixto</li>
          <li>Factura electrónica en un clic, ilimitada</li>
          <li>Ficha del paciente compartida entre sedes</li>
        </ul>
      </div>
      <div class="glass p-5 sm:p-6">
        <p class="font-d text-white font-semibold mb-3">Desarrollado para Mentis</p>
        <ul class="check space-y-2.5 text-[15px]">
          <li>Ficha psicológica: motivo de consulta, anamnesis, examen mental, CIE-10 y plan terapéutico</li>
          <li>Notas de cada sesión de terapia</li>
          <li>Cada sede ve solo sus ingresos; usted ve las dos</li>
          <li>Tarifas y profesionales propios de cada sede</li>
          <li>Facturación con el RUC de cada sede</li>
        </ul>
      </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
      <div class="glass p-5 sm:p-6 border-azul-500/40">
        <p class="text-sm text-slate-400">Implementación · pago único</p>
        <p class="precio text-4xl mt-2">$1.200</p>
        <p class="text-sm text-slate-400 mt-3">60 % al iniciar ($720) y 40 % a la entrega ($480). Incluye carga inicial y capacitación.</p>
      </div>
      <div class="glass p-5 sm:p-6">
        <p class="text-sm text-slate-400">Suscripción mensual</p>
        <p class="precio text-4xl mt-2">$59 <span class="text-base font-normal text-slate-400">por sede</span></p>
        <p class="text-sm text-slate-400 mt-3"><strong class="text-white">$118 al mes</strong> por Quito e Ibarra, desde la entrega. Profesionales y pacientes ilimitados, facturación SRI ilimitada, respaldos y soporte.</p>
      </div>
    </div>
    <div class="glass p-4 sm:p-5 text-[15px] border-l-2 border-l-crema-400"><strong class="text-white">Incluye una ficha psicológica</strong>, con las secciones que definamos juntos en una reunión de diseño. Los cambios posteriores a lo aprobado se cobran por hora técnica.</div>
    <p class="text-xs text-slate-500">Costos de terceros que no cobra Creative Web: mensajes de WhatsApp de Meta (aprox. $0,01 por mensaje) y la firma electrónica de cada RUC.</p>
  </div>
</section>

<!-- WEB -->
<section id="web" class="py-10 sm:py-14 border-t border-white/5">
  <div class="mb-6 lg:mb-8 max-w-3xl">
    <p class="eyebrow text-azul-400 mb-2">Proforma 1-2-1334</p>
    <h2 class="font-d text-2xl sm:text-3xl font-bold text-white leading-tight mb-3">Una web que agenda, capta y vende</h2>
    <p class="text-slate-400 text-[15px]">El botón «Agendar cita» entra directo a la agenda del sistema de cada sede.</p>
  </div>
  <div class="space-y-4">
    <div class="grid md:grid-cols-3 gap-3 sm:gap-4">
      <div class="glass p-5 sm:p-6 flex flex-col">
        <div class="flex items-baseline justify-between gap-3 mb-3"><p class="font-d text-white font-semibold text-lg">Sitio web</p><p class="precio text-2xl">$500</p></div>
        <ul class="check space-y-2 text-[15px]">
          <li>Servicios para niños, adolescentes, adultos, adultos mayores, parejas y familias</li>
          <li>Sedes con mapa y WhatsApp</li>
          <li>Equipo, testimonios y blog</li>
          <li>Hecho para celular</li>
          <li>SEO básico: Google Business y Search Console</li>
          <li>Primer año de dominio, hosting y correos</li>
        </ul>
      </div>
      <div class="glass p-5 sm:p-6 flex flex-col">
        <div class="flex items-baseline justify-between gap-3 mb-3"><p class="font-d text-white font-semibold text-lg">Tests gratuitos</p><p class="precio text-2xl">$200</p></div>
        <ul class="check space-y-2 text-[15px]">
          <li>Hasta 3 tests de tamizaje que elijan ustedes</li>
          <li>Piden nombre y WhatsApp</li>
          <li>El resultado les llega a ustedes</li>
          <li>El paciente ve una orientación y el botón para agendar</li>
        </ul>
      </div>
      <div class="glass p-5 sm:p-6 flex flex-col">
        <div class="flex items-baseline justify-between gap-3 mb-3"><p class="font-d text-white font-semibold text-lg">Cursos</p><p class="precio text-2xl">$300</p></div>
        <ul class="check space-y-2 text-[15px]">
          <li>Una página por curso o taller</li>
          <li>Inscripción y pago con tarjeta</li>
          <li>Confirmación por correo</li>
          <li>Listado de inscritos</li>
        </ul>
      </div>
    </div>
    <div class="glass p-5 sm:p-6 flex flex-wrap items-center justify-between gap-3 border-azul-500/40">
      <div><p class="text-white font-medium">Total, pago único</p><p class="text-sm text-slate-400">60 % al iniciar ($600) y 40 % a la entrega ($400)</p></div>
      <p class="precio text-4xl">$1.000</p>
    </div>
    <div class="grid sm:grid-cols-2 gap-3 sm:gap-4 text-[15px]">
      <div class="glass p-5"><p class="text-white font-medium mb-1.5">Renovación desde el año 2</p><p class="text-slate-400">Hosting $83,88 + dominio $21,99 = <strong class="text-white">$105,87 al año</strong></p></div>
      <div class="glass p-5"><p class="text-white font-medium mb-1.5">Dominio propuesto</p><p class="text-slate-400 break-all sm:break-normal"><strong class="text-white">mentispsicologiaecuador.com</strong></p><p class="text-slate-400 text-sm mt-1">Libre al 5 de octubre e igual a su Instagram. mentispsicologia.com ya es de otra persona.</p></div>
    </div>
    <ul class="check no space-y-1.5 text-xs text-slate-500">
      <li>La pasarela de pago cobra su comisión por cada venta de cursos.</li>
      <li>Los tests orientan; no reemplazan la evaluación de un profesional, y así se indica en la web.</li>
      <li>No incluye fotos ni videos, manejo de redes ni publicidad pagada.</li>
    </ul>
  </div>
</section>

<!-- SEO -->
<section id="seo" class="py-10 sm:py-14 border-t border-white/5 lg:grid lg:grid-cols-12 lg:gap-10">
  <div class="lg:col-span-4 mb-6 lg:mb-0">
    <p class="eyebrow text-crema-400 mb-2">Opcional</p>
    <h2 class="font-d text-2xl sm:text-3xl font-bold text-white leading-tight mb-3">Plan para aparecer en Google — 6 meses</h2>
    <p class="text-slate-400 text-[15px]">Se activa con la web publicada. Cada artículo responde algo que la gente busca («cómo saber si necesito terapia», «terapia de pareja en Quito») y lleva al botón de agendar.</p>
  </div>
  <div class="lg:col-span-8">
    <div class="grid grid-cols-2 gap-3 sm:gap-4">
      <div class="glass p-5 sm:p-6"><p class="eyebrow text-azul-400 mb-2">Un pago</p><p class="precio text-3xl sm:text-4xl">$600</p><p class="text-sm text-slate-400 mt-2">por los 6 meses</p></div>
      <div class="glass p-5 sm:p-6"><p class="eyebrow text-azul-400 mb-2">Mes a mes</p><p class="precio text-3xl sm:text-4xl">$150</p><p class="text-sm text-slate-400 mt-2">$900 en total</p></div>
    </div>
    <ul class="check grid sm:grid-cols-2 gap-x-8 gap-y-2.5 text-[15px] mt-5">
      <li>20 artículos al mes: 120 en seis meses</li>
      <li>Informe y reunión mensual con apariciones, visitas y posiciones</li>
    </ul>
  </div>
</section>

<!-- CRONOGRAMA -->
<section id="cronograma" class="py-10 sm:py-14 border-t border-white/5 lg:grid lg:grid-cols-12 lg:gap-10">
  <div class="lg:col-span-4 mb-6 lg:mb-0">
    <p class="eyebrow text-crema-400 mb-2">Cronograma</p>
    <h2 class="font-d text-2xl sm:text-3xl font-bold text-white leading-tight">De la aprobación a funcionar</h2>
  </div>
  <div class="lg:col-span-8 space-y-4">
    <div class="grid md:grid-cols-2 gap-3 sm:gap-4">
      <div class="glass p-5 sm:p-6">
        <p class="font-d text-white font-semibold mb-3">Sistema · 3 a 4 semanas</p>
        <ol class="space-y-2 text-[15px] list-decimal list-inside">
          <li>Reunión de diseño de la ficha</li>
          <li>Desarrollo y configuración de las sedes</li>
          <li>Carga de pacientes y prueba de facturación</li>
          <li>Capacitación y entrega</li>
        </ol>
      </div>
      <div class="glass p-5 sm:p-6">
        <p class="font-d text-white font-semibold mb-3">Sitio web · 4 a 5 semanas</p>
        <ol class="space-y-2 text-[15px] list-decimal list-inside">
          <li>Estructura y diseño aprobados</li>
          <li>Páginas, tests y cursos</li>
          <li>Conexión con la agenda y el pago</li>
          <li>Publicación y alta en Google</li>
        </ol>
      </div>
    </div>
    <div class="glass p-5 sm:p-6">
      <p class="text-white font-medium mb-3">Lo que necesitamos para arrancar</p>
      <ul class="check grid sm:grid-cols-2 gap-x-8 gap-y-2.5 text-[15px]">
        <li>Su ficha clínica actual</li>
        <li>Fotos del equipo y de las sedes</li>
        <li>Profesionales y tarifas de cada sede</li>
        <li>Los tests que quieren publicar</li>
        <li>RUC, punto de emisión y firma de cada sede</li>
        <li>Cursos y talleres con sus precios</li>
      </ul>
    </div>
  </div>
</section>

<!-- EXPERIENCIA -->
<section id="experiencia" class="py-10 sm:py-14 border-t border-white/5 lg:grid lg:grid-cols-12 lg:gap-10">
  <div class="lg:col-span-4 mb-6 lg:mb-0">
    <p class="eyebrow text-crema-400 mb-2">Experiencia</p>
    <h2 class="font-d text-2xl sm:text-3xl font-bold text-white leading-tight">Sistemas propios, en uso</h2>
  </div>
  <div class="lg:col-span-8 grid sm:grid-cols-2 gap-3 sm:gap-4 text-[15px]">
    <div class="glass p-5"><p class="text-white font-medium">DentiLab</p><p class="text-slate-400 mt-1">Nuestro sistema para clínicas: agenda, fichas, WhatsApp y cobros. Es la base del suyo.</p></div>
    <div class="glass p-5"><p class="text-white font-medium">Quipuy</p><p class="text-slate-400 mt-1">Nuestra facturación electrónica autorizada por el SRI, integrada al sistema.</p></div>
    <div class="glass p-5"><p class="text-white font-medium">Motrix · FisioVida</p><p class="text-slate-400 mt-1">Sistema de gestión para un centro de fisioterapia.</p></div>
    <div class="glass p-5"><p class="text-white font-medium">+60 sitios web</p><p class="text-slate-400 mt-1">Para empresas del Ecuador, con posicionamiento en Google.</p></div>
  </div>
</section>

<!-- DESCARGAS (escritorio) -->
<section id="descargas" class="py-10 border-t border-white/5 hidden lg:block">
  <div class="flex flex-wrap gap-3">
    <a href="pdf/proforma-1-2-1333-sistema.pdf" download="Proforma-1-2-1333-Sistema-Mentis.pdf" class="px-5 py-3 rounded-xl bg-azul-600 hover:bg-azul-700 text-white font-d font-semibold text-sm transition">Proforma del sistema (PDF)</a>
    <a href="pdf/proforma-1-2-1334-web.pdf" download="Proforma-1-2-1334-Web-Mentis.pdf" class="px-5 py-3 rounded-xl border border-white/15 hover:bg-white/5 text-white font-d font-semibold text-sm transition">Proforma de la web (PDF)</a>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20revis%C3%A9%20la%20propuesta%20de%20Mentis%20Psicolog%C3%ADa." class="px-5 py-3 rounded-xl border border-white/15 hover:bg-white/5 text-white font-d font-semibold text-sm transition">Escribir por WhatsApp</a>
  </div>
</section>

<footer class="py-8 border-t border-white/5">
  <p class="text-xs text-slate-500">Ing. Santiago Oña Sánchez &middot; Creative Web &middot; 099 917 4980 &middot; info@creativeweb.com.ec</p>
  <div class="flex items-center gap-3 mt-3">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
    <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; octubre de 2026 &middot; <a href="logout.php" class="hover:text-slate-300">Salir</a></p>
  </div>
</footer>
</main>

<!-- Barra fija en celular -->
<div class="lg:hidden fixed bottom-0 inset-x-0 z-50 border-t border-white/10 bg-[#0d1626]/95 backdrop-blur-xl px-3 py-3" style="padding-bottom:max(12px,env(safe-area-inset-bottom))">
  <div class="grid grid-cols-3 gap-2 text-[13px] font-d font-semibold">
    <a href="pdf/proforma-1-2-1333-sistema.pdf" download="Proforma-1-2-1333-Sistema-Mentis.pdf" class="text-center py-3 rounded-xl border border-white/15 text-white">PDF sistema</a>
    <a href="pdf/proforma-1-2-1334-web.pdf" download="Proforma-1-2-1334-Web-Mentis.pdf" class="text-center py-3 rounded-xl border border-white/15 text-white">PDF web</a>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20revis%C3%A9%20la%20propuesta%20de%20Mentis%20Psicolog%C3%ADa." class="text-center py-3 rounded-xl bg-azul-600 text-white">WhatsApp</a>
  </div>
</div>

<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{
  const vis=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
  if(!vis) return;
  const a=links.get(vis.target.id);
  if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');a.parentElement.scrollTo({left:a.offsetLeft-40,behavior:'smooth'});}
},{rootMargin:'-64px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>
</body>
</html>
