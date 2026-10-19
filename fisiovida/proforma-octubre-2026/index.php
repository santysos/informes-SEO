<?php
session_start();
if (empty($_SESSION['auth_fisiovida'])) {
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
<title>Un solo centro &mdash; FisioVida</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{marca:{200:'#99f6e4',300:'#5eead4',400:'#2dd4bf',500:'#14b8a6',600:'#0d9488',700:'#0f766e'}}
}}}
</script>
<style>
html{scroll-behavior:smooth}
body{background:#0a0f16;overflow-x:hidden}
section{scroll-margin-top:70px}
.glass{background:rgba(17,26,36,.55);backdrop-filter:blur(18px)}
.nav a.on{color:#fff;background:rgba(20,184,166,.18)}
.eyebrow{font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.2em;text-transform:uppercase}
.hero-bg{background:radial-gradient(900px 600px at 15% 10%,rgba(20,184,166,.22),transparent 60%),radial-gradient(700px 500px at 90% 40%,rgba(56,189,248,.10),transparent 60%)}
.reveal{opacity:0;transform:translateY(24px);transition:opacity .7s ease,transform .7s ease}
.reveal.vis{opacity:1;transform:none}
.paso-btn{transition:all .25s}
.paso-btn.on{background:rgba(20,184,166,.14);border-color:rgba(45,212,191,.6)}
.paso-btn.on .num{background:#14b8a6;color:#0a0f16}
.pantalla{display:none;animation:fade .45s ease}
.pantalla.on{display:block}
@keyframes fade{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
.tel{width:250px;border-radius:34px;background:#1e293b;padding:9px;box-shadow:0 30px 60px -20px rgba(0,0,0,.6)}
.tel .in{border-radius:27px;overflow:hidden;background:#f8fafc;color:#0f172a;min-height:420px}
.nav-scroll{scrollbar-width:none}.nav-scroll::-webkit-scrollbar{display:none}
.tog{width:44px;height:24px;border-radius:99px;background:#334155;position:relative;transition:.25s;flex:none}
.tog::after{content:'';position:absolute;top:3px;left:3px;width:18px;height:18px;border-radius:99px;background:#fff;transition:.25s}
input:checked + .tog{background:#14b8a6}
input:checked + .tog::after{left:23px}
.opcion{transition:.25s}
.opcion:has(input:checked){border-color:rgba(45,212,191,.6);background:rgba(20,184,166,.07)}
</style>
</head>
<body class="text-slate-200 font-sans antialiased pb-20 lg:pb-0">

<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0a0f16]/85">
  <div class="max-w-6xl mx-auto px-5 flex items-center gap-4">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto hidden md:block">
    <div class="nav-scroll flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#reto" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">El reto</a>
      <a href="#recorrido" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Un día en FisioVida</a>
      <a href="#historia" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">La historia</a>
      <a href="#cambia" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Lo que cambia</a>
      <a href="#arme" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap transition">Arme su sistema</a>
    </div>
    <a href="logout.php" class="ml-auto text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap">Salir</a>
  </div>
</nav>

<!-- ══════════ PORTADA ══════════ -->
<header class="hero-bg">
  <div class="max-w-6xl mx-auto px-5 pt-16 pb-20 md:pt-24 md:pb-28">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-8 md:hidden">
    <p class="eyebrow text-marca-400 mb-5">Propuesta para FisioVida &middot; Sr. Fernando Landeta</p>
    <h1 class="text-[40px] md:text-7xl font-bold text-white leading-[1.03] tracking-tight max-w-4xl">Ocho especialidades.<br><span class="text-marca-400">Un solo centro.</span></h1>
    <p class="text-lg md:text-xl text-slate-400 mt-6 max-w-2xl">Un sistema hecho solo para FisioVida, donde cada médico tiene su agenda y cada paciente tiene una sola historia, la de todas las especialidades.</p>
    <a href="#reto" class="inline-flex items-center gap-2 mt-10 px-7 py-4 rounded-2xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold hover:brightness-110 transition">Empezar el recorrido <span aria-hidden="true">↓</span></a>
  </div>
</header>

<div class="max-w-6xl mx-auto px-5">

  <!-- ══════════ EL RETO ══════════ -->
  <section id="reto" class="pt-20 md:pt-28">
    <div class="reveal max-w-3xl">
      <p class="eyebrow text-marca-400 mb-3">El reto</p>
      <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight">Cuando un centro crece, la información se reparte</h2>
      <p class="text-lg text-slate-400 mt-5">Con ocho especialidades, lo que ustedes nos pidieron resolver es esto:</p>
    </div>
    <div class="grid md:grid-cols-3 gap-4 mt-10">
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-7">
        <p class="text-4xl mb-4">🗓️</p>
        <p class="text-xl font-semibold text-white mb-2">Una agenda que se entienda</p>
        <p class="text-slate-400">Por especialidad y por médico, cada una con su duración de cita.</p>
      </div>
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-7" style="transition-delay:.1s">
        <p class="text-4xl mb-4">📋</p>
        <p class="text-xl font-semibold text-white mb-2">Cada sesión registrada</p>
        <p class="text-slate-400">Que cada atención quede guardada, con lo que anotó el médico en su propia ficha.</p>
      </div>
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-7" style="transition-delay:.2s">
        <p class="text-4xl mb-4">🔎</p>
        <p class="text-xl font-semibold text-white mb-2">El paciente completo</p>
        <p class="text-slate-400">Que el médico vea en un solo lugar todo lo que se le ha hecho, en todas las especialidades.</p>
      </div>
    </div>
  </section>

  <!-- ══════════ RECORRIDO ══════════ -->
  <section id="recorrido" class="pt-24 md:pt-32">
    <div class="reveal max-w-3xl mb-10">
      <p class="eyebrow text-marca-400 mb-3">Un día en FisioVida</p>
      <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight">Acompañe a una paciente de principio a fin</h2>
      <p class="text-lg text-slate-400 mt-5">Toque cada paso para ver lo que pasa en el sistema.</p>
    </div>

    <div class="grid lg:grid-cols-12 gap-6 lg:gap-10 items-start">
      <!-- pasos -->
      <div class="lg:col-span-5 flex lg:flex-col gap-2 overflow-x-auto nav-scroll pb-2 lg:pb-0 -mx-5 px-5 lg:mx-0 lg:px-0" id="pasos">
        <button data-p="0" class="paso-btn on shrink-0 w-64 lg:w-auto text-left rounded-2xl border border-slate-700/60 px-4 py-3.5 flex gap-3 items-start">
          <span class="num w-7 h-7 rounded-full bg-slate-800 text-slate-300 grid place-items-center text-sm font-bold shrink-0">1</span>
          <span><span class="block text-white font-semibold">Reserva desde su celular</span><span class="block text-sm text-slate-400">Elige especialidad, sede y hora</span></span>
        </button>
        <button data-p="1" class="paso-btn shrink-0 w-64 lg:w-auto text-left rounded-2xl border border-slate-700/60 px-4 py-3.5 flex gap-3 items-start">
          <span class="num w-7 h-7 rounded-full bg-slate-800 text-slate-300 grid place-items-center text-sm font-bold shrink-0">2</span>
          <span><span class="block text-white font-semibold">Le llega un recordatorio</span><span class="block text-sm text-slate-400">Por WhatsApp, de su especialidad</span></span>
        </button>
        <button data-p="2" class="paso-btn shrink-0 w-64 lg:w-auto text-left rounded-2xl border border-slate-700/60 px-4 py-3.5 flex gap-3 items-start">
          <span class="num w-7 h-7 rounded-full bg-slate-800 text-slate-300 grid place-items-center text-sm font-bold shrink-0">3</span>
          <span><span class="block text-white font-semibold">Recepción la recibe</span><span class="block text-sm text-slate-400">El día de todo el centro a la vista</span></span>
        </button>
        <button data-p="3" class="paso-btn shrink-0 w-64 lg:w-auto text-left rounded-2xl border border-slate-700/60 px-4 py-3.5 flex gap-3 items-start">
          <span class="num w-7 h-7 rounded-full bg-slate-800 text-slate-300 grid place-items-center text-sm font-bold shrink-0">4</span>
          <span><span class="block text-white font-semibold">El médico la atiende</span><span class="block text-sm text-slate-400">Ve su historia y anota la sesión</span></span>
        </button>
        <button data-p="4" class="paso-btn shrink-0 w-64 lg:w-auto text-left rounded-2xl border border-slate-700/60 px-4 py-3.5 flex gap-3 items-start">
          <span class="num w-7 h-7 rounded-full bg-slate-800 text-slate-300 grid place-items-center text-sm font-bold shrink-0">5</span>
          <span><span class="block text-white font-semibold">Sale con su factura</span><span class="block text-sm text-slate-400">Un clic, con el RUC del médico</span></span>
        </button>
        <button data-p="5" class="paso-btn shrink-0 w-64 lg:w-auto text-left rounded-2xl border border-slate-700/60 px-4 py-3.5 flex gap-3 items-start">
          <span class="num w-7 h-7 rounded-full bg-slate-800 text-slate-300 grid place-items-center text-sm font-bold shrink-0">6</span>
          <span><span class="block text-white font-semibold">Usted ve cómo va el centro</span><span class="block text-sm text-slate-400">Por especialidad, médico y sede</span></span>
        </button>
      </div>

      <!-- pantallas -->
      <div class="lg:col-span-7 rounded-3xl border border-slate-700/60 glass p-6 md:p-8 min-h-[520px] flex flex-col">

        <!-- 1 reserva -->
        <div class="pantalla on" data-s="0">
          <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="tel shrink-0"><div class="in">
              <div class="bg-marca-600 text-white px-5 py-4"><p class="text-xs opacity-80">FisioVida</p><p class="font-semibold">Reserve su cita</p></div>
              <div class="p-4 space-y-2 text-sm">
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Especialidad</p>
                <div class="rounded-xl border-2 border-marca-500 bg-marca-500/10 px-3 py-2 font-medium">Fisioterapia</div>
                <div class="rounded-xl border border-slate-200 px-3 py-2 text-slate-500">Medicina general</div>
                <div class="rounded-xl border border-slate-200 px-3 py-2 text-slate-500">Nutrición</div>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider pt-2">Martes 14</p>
                <div class="grid grid-cols-3 gap-1.5 text-center text-xs">
                  <span class="rounded-lg border border-slate-200 py-1.5 text-slate-300 line-through">08:00</span>
                  <span class="rounded-lg bg-marca-600 text-white py-1.5">09:00</span>
                  <span class="rounded-lg border border-slate-200 py-1.5">10:00</span>
                </div>
                <div class="rounded-xl bg-slate-900 text-white text-center py-2.5 mt-3 font-medium">Pagar y confirmar</div>
              </div>
            </div></div>
            <div>
              <span class="inline-block text-[11px] font-mono uppercase tracking-widest text-amber-300 bg-amber-500/10 rounded-full px-3 py-1 mb-3">Adicional A</span>
              <p class="text-2xl font-bold text-white mb-3">La cita se agenda sola</p>
              <p class="text-slate-400 mb-4">Desde la web, Instagram o Facebook. Ve solo los horarios libres, así que nunca choca con otra cita.</p>
              <ul class="space-y-2 text-sm text-slate-300">
                <li>✓ Con pago anticipado por PayPhone, queda confirmada al pagar</li>
                <li>✓ O gratis: recepción la aprueba con un clic</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- 2 whatsapp -->
        <div class="pantalla" data-s="1">
          <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="tel shrink-0"><div class="in" style="background:#e7ded3">
              <div class="bg-[#075e54] text-white px-4 py-3 flex items-center gap-3"><span class="w-8 h-8 rounded-full bg-white/20 grid place-items-center text-xs">FV</span><div><p class="text-sm font-semibold">FisioVida · Fisioterapia</p><p class="text-[10px] opacity-75">Cuenta de empresa</p></div></div>
              <div class="p-3 space-y-2 text-[13px]">
                <div class="bg-white rounded-lg rounded-tl-none p-3 max-w-[90%] shadow-sm">Hola María 👋 Le recordamos su cita de <b>Fisioterapia</b> mañana martes 14 a las <b>09:00</b> en la sede Centro.<p class="text-[10px] text-slate-400 text-right mt-1">18:00</p></div>
                <div class="flex gap-1.5"><span class="bg-white rounded-lg px-3 py-1.5 text-[#075e54] font-medium shadow-sm">✓ Confirmo</span><span class="bg-white rounded-lg px-3 py-1.5 text-[#075e54] font-medium shadow-sm">No puedo ir</span></div>
                <div class="bg-[#dcf8c6] rounded-lg rounded-tr-none p-3 max-w-[60%] ml-auto shadow-sm">✓ Confirmo<p class="text-[10px] text-slate-400 text-right mt-1">18:03 ✓✓</p></div>
              </div>
            </div></div>
            <div>
              <span class="inline-block text-[11px] font-mono uppercase tracking-widest text-amber-300 bg-amber-500/10 rounded-full px-3 py-1 mb-3">Adicional B</span>
              <p class="text-2xl font-bold text-white mb-3">Nadie tiene que llamar a recordar</p>
              <p class="text-slate-400 mb-4">El mensaje sale solo, desde el número de cada especialidad, como trabajan hoy.</p>
              <ul class="space-y-2 text-sm text-slate-300">
                <li>✓ La paciente confirma o avisa que no va</li>
                <li>✓ Si no va, el espacio queda libre para otro</li>
                <li>✓ Cada médico recibe su lista del día</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- 3 recepción -->
        <div class="pantalla" data-s="2">
          <p class="text-2xl font-bold text-white mb-2">Todo el centro en una pantalla</p>
          <p class="text-slate-400 mb-6">Recepción filtra por sede, especialidad o médico. Cada especialidad con su duración de cita.</p>
          <div class="rounded-2xl bg-slate-950/60 border border-slate-800 p-4 overflow-x-auto">
            <div class="flex gap-2 mb-4 text-xs">
              <span class="rounded-full bg-marca-500/20 text-marca-300 px-3 py-1">Sede Centro</span>
              <span class="rounded-full bg-slate-800 text-slate-400 px-3 py-1">Todas las especialidades</span>
              <span class="rounded-full bg-slate-800 text-slate-400 px-3 py-1">Martes 14</span>
            </div>
            <div class="grid grid-cols-[52px_repeat(4,minmax(110px,1fr))] gap-1.5 text-[11px] min-w-[520px]">
              <span></span><span class="text-slate-400 font-semibold px-1">Fisioterapia</span><span class="text-slate-400 font-semibold px-1">Medicina</span><span class="text-slate-400 font-semibold px-1">Nutrición</span><span class="text-slate-400 font-semibold px-1">Psicología</span>
              <span class="text-slate-500 pt-2">08:00</span><span class="rounded-lg bg-marca-500/20 text-marca-200 p-2">Luis A. · S4</span><span class="rounded-lg bg-sky-500/20 text-sky-200 p-2">Ana T.</span><span></span><span class="rounded-lg bg-violet-500/20 text-violet-200 p-2 row-span-2">Carlos M.</span>
              <span class="text-slate-500 pt-2">09:00</span><span class="rounded-lg bg-marca-500/30 text-white p-2 ring-1 ring-marca-400">María P. ✓</span><span></span><span class="rounded-lg bg-amber-500/20 text-amber-200 p-2">Rosa Q.</span>
              <span class="text-slate-500 pt-2">10:00</span><span class="rounded-lg bg-marca-500/20 text-marca-200 p-2">Jorge V. · S9</span><span class="rounded-lg bg-sky-500/20 text-sky-200 p-2">Pedro L.</span><span></span><span></span>
            </div>
          </div>
          <p class="text-xs text-slate-500 mt-3">Pantalla de ejemplo.</p>
        </div>

        <!-- 4 médico -->
        <div class="pantalla" data-s="3">
          <p class="text-2xl font-bold text-white mb-2">Antes de saludarla, ya la conoce</p>
          <p class="text-slate-400 mb-6">El fisioterapeuta ve que la semana pasada fue a medicina general y qué le recetaron. Luego anota la sesión en su propia ficha.</p>
          <div class="grid md:grid-cols-2 gap-4">
            <div class="rounded-2xl bg-slate-950/60 border border-slate-800 p-4 text-sm space-y-2.5">
              <p class="text-xs text-slate-500 uppercase tracking-wider">Historia de María</p>
              <div class="rounded-lg bg-sky-500/10 border border-sky-500/30 p-2.5"><p class="text-[11px] text-sky-300">Medicina general · 10 oct</p><p class="text-slate-300">Lumbalgia (M54.5). Se deriva a fisioterapia.</p></div>
              <div class="rounded-lg bg-amber-500/10 border border-amber-500/30 p-2.5"><p class="text-[11px] text-amber-300">Nutrición · 28 sep</p><p class="text-slate-300">Plan de alimentación · exámenes.pdf</p></div>
              <div class="rounded-lg bg-slate-800/60 border border-slate-700 p-2.5"><p class="text-[11px] text-violet-300">Psicología · 3 oct</p><p class="text-slate-500 italic">🔒 Privado</p></div>
            </div>
            <div class="rounded-2xl bg-slate-950/60 border border-marca-500/40 p-4 text-sm space-y-2.5">
              <p class="text-xs text-marca-300 uppercase tracking-wider">Ficha de fisioterapia · Sesión 6</p>
              <div><p class="text-[11px] text-slate-500">Dolor (0-10)</p><div class="h-2 rounded-full bg-slate-800 mt-1"><div class="h-2 rounded-full bg-marca-500 w-[30%]"></div></div></div>
              <div><p class="text-[11px] text-slate-500">Técnicas aplicadas</p><p class="text-slate-300">Terapia manual · ejercicios de core</p></div>
              <div><p class="text-[11px] text-slate-500">Evolución</p><p class="text-slate-300">Mejora la movilidad lumbar.</p></div>
              <div class="flex gap-2 pt-1"><span class="rounded-lg bg-marca-600 text-white px-3 py-1.5 text-xs">Guardar sesión</span><span class="rounded-lg border border-slate-700 px-3 py-1.5 text-xs text-slate-300">Receta</span><span class="rounded-lg border border-slate-700 px-3 py-1.5 text-xs text-slate-300">Certificado</span></div>
            </div>
          </div>
          <p class="text-xs text-slate-500 mt-3">Ejemplo. Los campos reales salen de la ficha que hoy usa cada especialidad.</p>
        </div>

        <!-- 5 factura -->
        <div class="pantalla" data-s="4">
          <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="w-full md:w-72 shrink-0 rounded-2xl bg-white text-slate-900 p-5 shadow-2xl">
              <div class="flex justify-between items-start mb-4"><div><p class="text-[10px] text-slate-500 uppercase tracking-wider">Factura electrónica</p><p class="font-bold text-sm whitespace-nowrap">001-001-000000245</p></div><span class="text-[10px] rounded-full bg-emerald-100 text-emerald-700 px-2 py-1 font-semibold">AUTORIZADA SRI</span></div>
              <div class="text-xs space-y-1 border-y border-slate-200 py-3 mb-3"><p><span class="text-slate-500">Emisor:</span> Dr. (RUC del médico)</p><p><span class="text-slate-500">Cliente:</span> María Pérez</p><p><span class="text-slate-500">Servicio:</span> Sesión de fisioterapia</p></div>
              <p class="text-xs text-slate-500">Enviada a su correo ✓</p>
            </div>
            <div>
              <span class="inline-block text-[11px] font-mono uppercase tracking-widest text-amber-300 bg-amber-500/10 rounded-full px-3 py-1 mb-3">Adicional C</span>
              <p class="text-2xl font-bold text-white mb-3">Factura sin volver a escribir nada</p>
              <p class="text-slate-400 mb-4">Los datos de la paciente y del servicio ya están en la atención. El médico toca un botón y la factura sale con su propio RUC.</p>
              <ul class="space-y-2 text-sm text-slate-300">
                <li>✓ Autorizada por el SRI al momento</li>
                <li>✓ Facturas ilimitadas, con Quipuy</li>
                <li>✓ <strong class="text-marca-300">Quipuy va incluido en la mensualidad</strong>: ahorran $28 + IVA al año por cada médico</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- 6 administración -->
        <div class="pantalla" data-s="5">
          <p class="text-2xl font-bold text-white mb-2">Decidir con datos, no con intuición</p>
          <p class="text-slate-400 mb-6">Atenciones por especialidad, médico y sede, en las fechas que usted elija.</p>
          <div class="rounded-2xl bg-slate-950/60 border border-slate-800 p-5">
            <p class="text-xs text-slate-500 mb-4">Atenciones del mes por especialidad</p>
            <div class="space-y-2.5 text-xs">
              <div class="flex items-center gap-3"><span class="w-28 text-slate-400">Fisioterapia</span><div class="flex-1 h-5 rounded bg-slate-800"><div class="h-5 rounded bg-marca-500 w-[88%]"></div></div></div>
              <div class="flex items-center gap-3"><span class="w-28 text-slate-400">Medicina</span><div class="flex-1 h-5 rounded bg-slate-800"><div class="h-5 rounded bg-sky-500 w-[62%]"></div></div></div>
              <div class="flex items-center gap-3"><span class="w-28 text-slate-400">Nutrición</span><div class="flex-1 h-5 rounded bg-slate-800"><div class="h-5 rounded bg-amber-500 w-[45%]"></div></div></div>
              <div class="flex items-center gap-3"><span class="w-28 text-slate-400">Psicología</span><div class="flex-1 h-5 rounded bg-slate-800"><div class="h-5 rounded bg-violet-500 w-[38%]"></div></div></div>
              <div class="flex items-center gap-3"><span class="w-28 text-slate-400">+ 4 más</span><div class="flex-1 h-5 rounded bg-slate-800"><div class="h-5 rounded bg-slate-600 w-[30%]"></div></div></div>
            </div>
          </div>
          <p class="text-xs text-slate-500 mt-3">Gráfico de ejemplo, sin datos reales.</p>
        </div>

        <div class="mt-auto pt-6 flex justify-between items-center">
          <button id="ant" class="text-sm text-slate-400 hover:text-white">← Anterior</button>
          <button id="sig" class="px-5 py-2.5 rounded-xl bg-marca-600 hover:bg-marca-500 text-white text-sm font-semibold transition">Siguiente paso →</button>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ HISTORIA / PRIVACIDAD ══════════ -->
  <section id="historia" class="pt-24 md:pt-32">
    <div class="grid md:grid-cols-2 gap-10 items-center">
      <div class="reveal">
        <p class="eyebrow text-marca-400 mb-3">La historia clínica</p>
        <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight">Todos ven todo.<br>Salvo lo que debe ser privado.</h2>
        <p class="text-lg text-slate-400 mt-5">Psicología, o cualquier parte que ustedes decidan, solo la ve la especialidad que la escribió. El resto del equipo sabe que existe, pero no la lee.</p>
      </div>
      <div class="reveal grid grid-cols-2 gap-3">
        <div class="rounded-2xl border border-slate-700/60 glass p-5"><p class="text-2xl mb-2">🧾</p><p class="text-white font-semibold">Una ficha por especialidad</p><p class="text-sm text-slate-400 mt-1">Armada con lo que hoy llena cada médico</p></div>
        <div class="rounded-2xl border border-slate-700/60 glass p-5"><p class="text-2xl mb-2">📎</p><p class="text-white font-semibold">Exámenes adjuntos</p><p class="text-sm text-slate-400 mt-1">Radiografías, laboratorio y fotos</p></div>
        <div class="rounded-2xl border border-slate-700/60 glass p-5"><p class="text-2xl mb-2">💊</p><p class="text-white font-semibold">Recetas y certificados</p><p class="text-sm text-slate-400 mt-1">Impresos con el logo de FisioVida</p></div>
        <div class="rounded-2xl border border-slate-700/60 glass p-5"><p class="text-2xl mb-2">🏷️</p><p class="text-white font-semibold">Diagnósticos CIE-10</p><p class="text-sm text-slate-400 mt-1">En las especialidades que lo usen</p></div>
      </div>
    </div>
  </section>

  <!-- ══════════ LO QUE CAMBIA ══════════ -->
  <section id="cambia" class="pt-24 md:pt-32">
    <div class="reveal max-w-3xl mb-10">
      <p class="eyebrow text-marca-400 mb-3">Lo que cambia</p>
      <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight">Para cada persona del centro</h2>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-6"><p class="eyebrow text-marca-400 mb-3">El paciente</p><p class="text-slate-300">Reserva a cualquier hora, recibe su recordatorio y no tiene que repetir su historia en cada consulta.</p></div>
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-6" style="transition-delay:.08s"><p class="eyebrow text-marca-400 mb-3">El médico</p><p class="text-slate-300">Su agenda, su ficha y la historia completa del paciente, desde la computadora o el celular.</p></div>
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-6" style="transition-delay:.16s"><p class="eyebrow text-marca-400 mb-3">Recepción</p><p class="text-slate-300">Un solo lugar para agendar las ocho especialidades, sin cruces.</p></div>
      <div class="reveal rounded-3xl border border-slate-700/60 glass p-6" style="transition-delay:.24s"><p class="eyebrow text-marca-400 mb-3">Administración</p><p class="text-slate-300">Cuántas atenciones hace cada especialidad, cada médico y cada sede.</p></div>
    </div>

    <!-- confianza -->
    <div class="reveal mt-16 rounded-3xl border border-marca-500/30 bg-marca-500/5 p-7 md:p-10">
      <p class="eyebrow text-marca-400 mb-3">Por qué nosotros</p>
      <p class="text-2xl md:text-3xl font-bold text-white leading-snug max-w-3xl">Ya conocemos FisioVida: Motrix trabaja con ustedes todos los días.</p>
      <div class="grid md:grid-cols-3 gap-6 mt-8 text-sm">
        <div><p class="text-white font-semibold mb-1">Motrix</p><p class="text-slate-400">Su sistema de fisioterapia. Sigue funcionando como hoy.</p></div>
        <div><p class="text-white font-semibold mb-1">DentiLab</p><p class="text-slate-400">Agenda, historias, reservas y recordatorios para clínicas. Es la base del sistema nuevo.</p></div>
        <div><p class="text-white font-semibold mb-1">Quipuy</p><p class="text-slate-400">Nuestro sistema de facturación electrónica SRI.</p></div>
      </div>
    </div>
  </section>

  <!-- ══════════ ARME SU SISTEMA ══════════ -->
  <section id="arme" class="pt-24 md:pt-32">
    <div class="reveal max-w-3xl mb-10">
      <p class="eyebrow text-marca-400 mb-3">Arme su sistema</p>
      <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight">Empiece con lo esencial y sume lo que necesite</h2>
      <p class="text-lg text-slate-400 mt-5">El sistema base ya resuelve agenda, sesiones e historia clínica. Los adicionales se suman ahora o más adelante.</p>
    </div>

    <div class="reveal grid sm:grid-cols-2 gap-3 mb-8">
      <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 px-5 py-4 flex items-baseline gap-3">
        <p class="text-sm text-slate-400">menos de</p>
        <p class="text-3xl font-bold text-white">$1,70</p>
        <p class="text-marca-300 font-semibold">al día para usarlo</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass px-5 py-4 flex items-baseline gap-3">
        <p class="text-sm text-slate-400">menos de</p>
        <p class="text-3xl font-bold text-white">$103</p>
        <p class="text-marca-300 font-semibold">por especialidad</p>
      </div>
    </div>

    <div class="grid lg:grid-cols-12 gap-6 items-start">
      <div class="lg:col-span-7 space-y-3">
        <div class="opcion rounded-2xl border border-marca-500/60 bg-marca-500/10 p-5">
          <div class="flex justify-between gap-4">
            <div><p class="text-white font-semibold text-lg">Sistema multiespecialidad</p><p class="text-sm text-slate-400 mt-1">8 especialidades · agenda, sesiones, historia clínica unificada, recetas, certificados y reportes · capacitación al equipo</p></div>
            <div class="text-right shrink-0"><p class="text-sm text-slate-500 line-through">$1.200</p><p class="text-white font-bold text-lg">$820</p><p class="text-[11px] text-marca-300">Precio de lanzamiento</p></div>
          </div>
        </div>
        <label class="opcion block cursor-pointer rounded-2xl border border-slate-700/60 glass p-5">
          <div class="flex justify-between gap-4 items-center">
            <div class="flex gap-4 items-center"><input type="checkbox" class="sr-only extra" data-v="300"><span class="tog"></span><div><p class="text-white font-semibold">Reserva en línea</p><p class="text-sm text-slate-400">Con pago por PayPhone o con aprobación de recepción</p></div></div>
            <p class="text-white font-bold shrink-0">$300</p>
          </div>
        </label>
        <label class="opcion block cursor-pointer rounded-2xl border border-slate-700/60 glass p-5">
          <div class="flex justify-between gap-4 items-center">
            <div class="flex gap-4 items-center"><input type="checkbox" class="sr-only extra" data-v="350"><span class="tog"></span><div><p class="text-white font-semibold">Recordatorios por WhatsApp</p><p class="text-sm text-slate-400">Un número por especialidad</p></div></div>
            <p class="text-white font-bold shrink-0">$350</p>
          </div>
        </label>
        <label class="opcion block cursor-pointer rounded-2xl border border-slate-700/60 glass p-5">
          <div class="flex justify-between gap-4 items-center">
            <div class="flex gap-4 items-center"><input type="checkbox" class="sr-only extra" data-v="200"><span class="tog"></span><div><p class="text-white font-semibold">Factura en un clic</p><p class="text-sm text-slate-400">Cada médico con su RUC, vía Quipuy</p></div></div>
            <p class="text-white font-bold shrink-0">$200</p>
          </div>
        </label>
      </div>

      <div class="lg:col-span-5 lg:sticky lg:top-20">
        <div class="rounded-3xl border border-marca-500/40 bg-gradient-to-b from-marca-500/15 to-transparent p-7">
          <p class="text-sm text-slate-400">Inversión para dejarlo funcionando</p>
          <p class="text-5xl font-bold text-white mt-2"><span id="total">$820</span><span class="text-base font-normal text-slate-400"> + IVA</span></p>
          <p class="text-sm text-slate-400 mt-2">Se paga una sola vez: <span id="p60" class="text-slate-200">$492</span> al empezar y <span id="p40" class="text-slate-200">$328</span> a la entrega.</p>
          <div class="border-t border-slate-700/60 my-6"></div>
          <p class="text-sm text-slate-400">Uso del sistema, cada mes</p>
          <p class="text-3xl font-bold text-white mt-1"><span id="mes">$49</span><span class="text-base font-normal text-slate-400"> + IVA</span></p>
          <p class="text-sm text-slate-400 mt-1">Servidor propio, respaldos diarios y soporte por WhatsApp. Médicos, usuarios y pacientes sin límite.</p>
          <p class="text-xs text-slate-500 mt-2">Valor por sede. Si FisioVida atiende en más de una sede, se suman $49 + IVA por cada sede adicional.</p>
          <div class="rounded-2xl border border-marca-500/40 bg-marca-500/10 p-5 mt-5 text-sm">
            <p class="text-white font-semibold">🎁 Plan de lanzamiento · 12 meses</p>
            <ul class="text-slate-300 mt-3 space-y-2">
              <li>✓ El sistema a <strong class="text-marca-300">$820</strong> en vez de $1.200</li>
              <li>✓ Su mensualidad de $49 queda <strong class="text-marca-300">congelada por 12 meses</strong></li>
              <li>✓ <strong class="text-marca-300">Quipuy incluido</strong> para cada médico: ahorran $28 + IVA al año por médico, con facturas ilimitadas</li>
            </ul>
          </div>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20del%20sistema%20de%20FisioVida%20y%20quiero%20conversar" class="block text-center mt-6 px-6 py-4 rounded-2xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold hover:brightness-110 transition">Quiero empezar</a>
        </div>
      </div>
    </div>

    <!-- detalles finos -->
    <div class="grid md:grid-cols-3 gap-4 mt-12 text-sm">
      <div class="rounded-2xl border border-slate-700/60 p-6">
        <p class="text-white font-semibold mb-3">En 6 semanas</p>
        <ol class="space-y-2 text-slate-400">
          <li><span class="text-marca-400">1–2</span> · Armamos la ficha con cada especialidad</li>
          <li><span class="text-marca-400">3–5</span> · Construimos y prueban con pacientes de ejemplo</li>
          <li><span class="text-marca-400">6</span> · Capacitación y entrega</li>
        </ol>
        <p class="text-slate-500 mt-3">Los adicionales suman 1 a 2 semanas.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 p-6">
        <p class="text-white font-semibold mb-3">Para empezar necesitamos</p>
        <ul class="space-y-1.5 text-slate-400">
          <li>› El formulario que hoy llena cada especialidad</li>
          <li>› Médicos con sede, horario y duración de cita</li>
          <li>› Qué partes de la historia son privadas</li>
          <li>› Números de WhatsApp y RUC de los médicos, si suman esos adicionales</li>
        </ul>
      </div>
      <div class="rounded-2xl border border-slate-700/60 p-6">
        <p class="text-white font-semibold mb-3">Para que no haya sorpresas</p>
        <ul class="space-y-1.5 text-slate-400">
          <li>· Aparte cobran Meta (aprox. $0,01 por mensaje) y PayPhone (comisión por pago)</li>
          <li>· Cada médico que factura necesita su firma electrónica</li>
          <li>· Meta aprueba cada número en días o hasta dos semanas</li>
          <li>· No incluye pasar datos de Motrix ni paquetes de sesiones</li>
          <li>· El precio de lanzamiento corresponde al plan de 12 meses. Si lo terminan antes, se factura la parte proporcional del descuento: $31,67 por cada mes que falte</li>
        </ul>
      </div>
    </div>

    <div class="flex flex-wrap items-center justify-between gap-5 mt-12 mb-16 pt-8 border-t border-slate-800/70">
      <div class="flex items-center gap-3">
        <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
        <p class="text-xs text-slate-500">Proforma 1-2-1336 &middot; Otavalo, Ecuador &middot; octubre de 2026 &middot; Valores sin IVA</p>
      </div>
      <a href="pdf/proforma-1-2-1336.pdf" download="Proforma-1-2-1336-FisioVida.pdf" class="px-5 py-3 rounded-xl border border-slate-600 text-slate-200 font-semibold text-sm hover:border-slate-400 hover:text-white transition">&darr;&nbsp; Proforma formal en PDF</a>
    </div>
  </section>

</div>

<!-- barra fija en celular -->
<div class="lg:hidden fixed bottom-0 inset-x-0 z-50 border-t border-slate-800 bg-[#0a0f16]/95 backdrop-blur px-4 py-3" style="padding-bottom:max(12px,env(safe-area-inset-bottom))">
  <div class="grid grid-cols-2 gap-2 text-sm font-semibold">
    <a href="#recorrido" class="text-center py-3 rounded-xl border border-slate-700 text-slate-200">Ver el recorrido</a>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20del%20sistema%20de%20FisioVida" class="text-center py-3 rounded-xl bg-marca-600 text-white">WhatsApp</a>
  </div>
</div>

<script>
// aparición al hacer scroll
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('vis');io.unobserve(e.target)}}),{threshold:.12});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

// recorrido
const btns=[...document.querySelectorAll('.paso-btn')], pants=[...document.querySelectorAll('.pantalla')];
let cur=0;
function ir(i){
  cur=(i+btns.length)%btns.length;
  btns.forEach((b,k)=>b.classList.toggle('on',k===cur));
  pants.forEach((p,k)=>p.classList.toggle('on',k===cur));
  const b=btns[cur], cont=document.getElementById('pasos');
  if(cont.scrollWidth>cont.clientWidth) cont.scrollTo({left:b.offsetLeft-20,behavior:'smooth'});
  document.getElementById('sig').textContent = cur===btns.length-1 ? 'Volver al inicio ↺' : 'Siguiente paso →';
}
btns.forEach((b,i)=>b.addEventListener('click',()=>ir(i)));
document.getElementById('sig').onclick=()=>ir(cur+1);
document.getElementById('ant').onclick=()=>ir(cur-1);

// arme su sistema
const fmt=n=>'$'+n.toLocaleString('es-EC').replace(/,/g,'.');
function calc(){
  let t=820; document.querySelectorAll('.extra').forEach(c=>{if(c.checked)t+=+c.dataset.v});
  document.getElementById('total').textContent=fmt(t);
  document.getElementById('p60').textContent=fmt(Math.round(t*.6));
  document.getElementById('p40').textContent=fmt(t-Math.round(t*.6));
}
document.querySelectorAll('.extra').forEach(c=>c.addEventListener('change',calc));
calc();

// menú activo
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a[href^="#"]')].map(a=>[a.getAttribute('href').slice(1),a]));
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
