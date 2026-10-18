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
<title>Sistema multiespecialidad &mdash; FisioVida</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{marca:{300:'#5eead4',400:'#2dd4bf',500:'#14b8a6',600:'#0d9488'}}
}}}
</script>
<style>
html{scroll-behavior:smooth}
body{background:radial-gradient(1200px 780px at 22% 0%, rgba(20,184,166,.13), transparent 62%), #0a0f16;overflow-x:hidden}
.glass{background:rgba(17,26,36,.5);backdrop-filter:blur(18px)}
section{scroll-margin-top:80px}
.anc{scroll-margin-top:80px}
.nav a.on{color:#fff;background:rgba(20,184,166,.18)}
.prosa{max-width:64ch}
.eyebrow{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase}
.paso{width:28px;height:28px;border-radius:999px;background:rgba(20,184,166,.15);color:#2dd4bf;font-weight:700;font-size:13px;display:grid;place-items:center;flex:none}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0a0f16]/85">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#sistema" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">El sistema</a>
      <a href="#historia" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Historia clínica</a>
      <a href="#adicionales" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Adicionales</a>
      <a href="#inversion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Inversión</a>
      <a href="#cronograma" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Cronograma</a>
    </div>
  </div>
</nav>

<div class="max-w-6xl mx-auto px-6">

  <!-- ══════════ PORTADA ══════════ -->
  <header class="pt-14 pb-10">
    <div class="flex items-start justify-between gap-6">
      <div>
        <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-5">
        <p class="eyebrow text-marca-400 mb-3">Propuesta &middot; Proforma 1-2-1336</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-[1.08] tracking-tight">Un sistema para todas<br>las especialidades de FisioVida</h1>
        <p class="text-slate-400 mt-4">FisioVida &middot; Sr. Fernando Landeta &middot; octubre de 2026</p>
      </div>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
    </div>
  </header>

  <div class="grid md:grid-cols-3 gap-4 mb-4">
    <a href="#inversion" class="rounded-2xl border border-marca-500/40 bg-marca-500/10 p-6 hover:border-marca-500/70 transition flex flex-col">
      <p class="eyebrow text-marca-400 mb-3">El sistema</p>
      <p class="text-3xl font-bold text-marca-400 mb-2">$2.200</p>
      <p class="text-sm text-slate-400 mt-auto">+ IVA &middot; una sola vez, 8 especialidades y todas las sedes</p>
    </a>
    <a href="#adicionales" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition flex flex-col">
      <p class="eyebrow text-slate-500 mb-3">Adicionales</p>
      <p class="text-3xl font-bold text-white mb-2">$200 a $350</p>
      <p class="text-sm text-slate-400 mt-auto">+ IVA cada uno &middot; reserva en línea, WhatsApp y facturación</p>
    </a>
    <a href="#inversion" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition flex flex-col">
      <p class="eyebrow text-slate-500 mb-3">Cada mes</p>
      <p class="text-3xl font-bold text-white mb-2">$49</p>
      <p class="text-sm text-slate-400 mt-auto">+ IVA por sede &middot; desde la entrega</p>
    </a>
  </div>
  <p class="text-xs text-slate-500 prosa">Es un sistema nuevo, solo para FisioVida. Motrix sigue funcionando como hoy.</p>

  <!-- ══════════ EL SISTEMA ══════════ -->
  <section id="sistema" class="mt-20 pt-10 border-t border-slate-800/70">
    <p class="eyebrow text-marca-400 mb-2">El sistema</p>
    <h2 class="text-3xl font-bold text-white leading-tight mb-3">Agenda, atención y ficha, especialidad por especialidad</h2>
    <p class="text-slate-400 prosa mb-10">Funciona en la computadora, la tablet y el celular, sin instalar nada. Cada persona entra con su usuario y ve lo que le corresponde.</p>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-10">
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <div class="flex items-center gap-3 mb-3"><span class="paso">1</span><p class="font-semibold text-white">Recepción agenda</p></div>
        <p class="text-sm text-slate-400">Filtra por especialidad, médico o sede y ve los espacios libres. Cada especialidad con la duración de cita que le corresponde.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <div class="flex items-center gap-3 mb-3"><span class="paso">2</span><p class="font-semibold text-white">El médico ve su día</p></div>
        <p class="text-sm text-slate-400">Su agenda, sus pacientes y sus horarios, con feriados y vacaciones bloqueados.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <div class="flex items-center gap-3 mb-3"><span class="paso">3</span><p class="font-semibold text-white">Atiende y registra</p></div>
        <p class="text-sm text-slate-400">Abre la ficha de su especialidad y anota la sesión. Cada atención queda guardada con fecha y médico.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <div class="flex items-center gap-3 mb-3"><span class="paso">4</span><p class="font-semibold text-white">Receta y certificado</p></div>
        <p class="text-sm text-slate-400">Los imprime desde la atención, con el logo de FisioVida y los datos del médico.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <div class="flex items-center gap-3 mb-3"><span class="paso">5</span><p class="font-semibold text-white">Adjunta exámenes</p></div>
        <p class="text-sm text-slate-400">Radiografías, exámenes de laboratorio y fotos quedan dentro de la historia del paciente.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <div class="flex items-center gap-3 mb-3"><span class="paso">6</span><p class="font-semibold text-white">Administración controla</p></div>
        <p class="text-sm text-slate-400">Atenciones por especialidad, médico y sede, en el rango de fechas que elija.</p>
      </div>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <p class="eyebrow text-marca-400 mb-2">Especialidades</p>
        <p class="text-sm text-slate-300">Arranca con las 8 de hoy. Si suman otra, se agrega desde el sistema.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <p class="eyebrow text-marca-400 mb-2">Sedes</p>
        <p class="text-sm text-slate-300">Cada médico y cada cita pertenecen a una sede. Se filtra y se reporta por sede.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <p class="eyebrow text-marca-400 mb-2">Usuarios</p>
        <p class="text-sm text-slate-300">Médicos, recepción y administración, sin límite. Cada rol ve solo lo que necesita.</p>
      </div>
    </div>
  </section>

  <!-- ══════════ HISTORIA CLÍNICA ══════════ -->
  <section id="historia" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-5 mb-8 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">Historia clínica</p>
        <h2 class="text-3xl font-bold text-white leading-tight mb-4">Todo el paciente en una sola pantalla</h2>
        <p class="text-slate-400 mb-6">El médico abre al paciente y ve cada sesión de cada especialidad, en orden, con sus antecedentes arriba. No hace falta preguntarle a otro colega qué se le hizo.</p>
        <div class="space-y-2.5 text-sm text-slate-300">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Una ficha propia por especialidad, hecha a partir de lo que llena hoy cada médico</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Antecedentes comunes: alergias, enfermedades y medicación</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Diagnósticos con código CIE-10, en las especialidades que lo usen</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Todos los médicos ven toda la historia, salvo lo marcado como privado</div></div>
        </div>
        <div class="border-l-2 border-amber-500 pl-5 mt-6">
          <p class="text-sm text-slate-300"><strong class="text-white">Lo privado se queda en su especialidad.</strong> Psicología, o cualquier parte que ustedes decidan, solo la ve la especialidad que la escribió.</p>
        </div>
      </div>

      <!-- Maqueta de línea de tiempo -->
      <div class="md:col-span-7">
        <div class="rounded-2xl border border-slate-700/60 glass p-6">
          <div class="flex items-center justify-between border-b border-slate-800 pb-4 mb-5">
            <div>
              <p class="text-white font-semibold">María Pérez &middot; 42 años</p>
              <p class="text-xs text-slate-500">Paciente de ejemplo</p>
            </div>
            <span class="text-xs rounded-full bg-red-500/15 text-red-300 px-3 py-1">Alergia: penicilina</span>
          </div>
          <div class="space-y-4">
            <div class="flex gap-4">
              <div class="w-24 shrink-0 text-xs text-slate-500 pt-0.5">14 oct</div>
              <div class="flex-1 rounded-xl bg-marca-500/10 border border-marca-500/30 px-4 py-3">
                <p class="text-xs text-marca-300 mb-1">Fisioterapia &middot; Sesión 6</p>
                <p class="text-sm text-slate-300">Lumbalgia. Mejora la movilidad; se ajustan ejercicios.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="w-24 shrink-0 text-xs text-slate-500 pt-0.5">10 oct</div>
              <div class="flex-1 rounded-xl bg-slate-800/50 border border-slate-700/60 px-4 py-3">
                <p class="text-xs text-sky-300 mb-1">Medicina general</p>
                <p class="text-sm text-slate-300">M54.5 &middot; Receta de antiinflamatorio. Se deriva a fisioterapia.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="w-24 shrink-0 text-xs text-slate-500 pt-0.5">3 oct</div>
              <div class="flex-1 rounded-xl bg-slate-800/50 border border-slate-700/60 px-4 py-3">
                <p class="text-xs text-violet-300 mb-1">Psicología</p>
                <p class="text-sm text-slate-500 italic">🔒 Nota privada de la especialidad</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="w-24 shrink-0 text-xs text-slate-500 pt-0.5">28 sep</div>
              <div class="flex-1 rounded-xl bg-slate-800/50 border border-slate-700/60 px-4 py-3">
                <p class="text-xs text-amber-300 mb-1">Nutrición</p>
                <p class="text-sm text-slate-300">Plan de alimentación. Adjunto: exámenes de laboratorio.pdf</p>
              </div>
            </div>
          </div>
        </div>
        <p class="text-xs text-slate-500 mt-3">Ilustración. Las especialidades y los campos reales salen de las fichas de FisioVida.</p>
      </div>
    </div>
  </section>

  <!-- ══════════ ADICIONALES ══════════ -->
  <section id="adicionales" class="mt-20 pt-10 border-t border-slate-800/70">
    <p class="eyebrow text-marca-400 mb-2">Adicionales</p>
    <h2 class="text-3xl font-bold text-white leading-tight mb-3">Tres funciones que se contratan por separado</h2>
    <p class="text-slate-400 prosa mb-10">Se pueden sumar al inicio o después. Cada una funciona sobre el sistema.</p>

    <div class="grid md:grid-cols-3 gap-4">
      <div class="rounded-2xl border border-slate-700/60 glass p-6 flex flex-col">
        <p class="eyebrow text-marca-400 mb-2">Adicional A</p>
        <p class="text-xl font-bold text-white mb-1">Reserva en línea</p>
        <p class="text-2xl font-bold text-white mb-4">$300 <span class="text-xs font-normal text-slate-500">+ IVA</span></p>
        <div class="space-y-2 text-sm text-slate-300">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>El paciente elige especialidad, sede y hora libre</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div><strong class="text-white">Con pago anticipado</strong> por PayPhone: la cita queda confirmada al pagar</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div><strong class="text-white">O gratis</strong>: la solicitud llega a recepción y se confirma al aprobarla</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Un enlace para la web, Instagram y Facebook</div></div>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6 flex flex-col">
        <p class="eyebrow text-marca-400 mb-2">Adicional B</p>
        <p class="text-xl font-bold text-white mb-1">Recordatorios por WhatsApp</p>
        <p class="text-2xl font-bold text-white mb-4">$350 <span class="text-xs font-normal text-slate-500">+ IVA</span></p>
        <div class="space-y-2 text-sm text-slate-300">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Cada especialidad envía desde su propio número</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Recordatorio automático antes de la cita</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>El paciente confirma o avisa que no va</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Cada médico recibe la lista de pacientes de su día</div></div>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6 flex flex-col">
        <p class="eyebrow text-marca-400 mb-2">Adicional C</p>
        <p class="text-xl font-bold text-white mb-1">Factura en un clic</p>
        <p class="text-2xl font-bold text-white mb-4">$200 <span class="text-xs font-normal text-slate-500">+ IVA</span></p>
        <div class="space-y-2 text-sm text-slate-300">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Cada médico factura su atención con su propio RUC</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Los datos del paciente y del servicio ya van llenados</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Autorizada por el SRI y enviada al correo del paciente</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Con Quipuy, nuestro sistema de facturación: facturas ilimitadas</div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ INVERSIÓN ══════════ -->
  <section id="inversion" class="mt-20 pt-10 border-t border-slate-800/70">
    <p class="eyebrow text-marca-400 mb-2">Inversión</p>
    <h2 class="text-3xl font-bold text-white leading-tight mb-8">Valores en dólares, sin IVA</h2>

    <div class="grid md:grid-cols-2 gap-4 mb-4">
      <div class="rounded-2xl border border-marca-500/40 bg-marca-500/5 p-7 flex flex-col">
        <p class="text-slate-400 text-sm">Desarrollo &middot; se paga una vez</p>
        <div class="mt-4 space-y-2.5 text-sm">
          <div class="flex justify-between gap-4 border-b border-slate-800 pb-2.5"><span class="text-slate-300">Sistema multiespecialidad</span><strong class="text-white">$2.200</strong></div>
          <div class="flex justify-between gap-4 border-b border-slate-800 pb-2.5"><span class="text-slate-400">A &middot; Reserva en línea</span><span class="text-slate-300">$300</span></div>
          <div class="flex justify-between gap-4 border-b border-slate-800 pb-2.5"><span class="text-slate-400">B &middot; Recordatorios por WhatsApp</span><span class="text-slate-300">$350</span></div>
          <div class="flex justify-between gap-4 border-b border-slate-800 pb-2.5"><span class="text-slate-400">C &middot; Factura en un clic</span><span class="text-slate-300">$200</span></div>
          <div class="flex justify-between gap-4 pt-1"><span class="text-white font-semibold">Todo junto</span><strong class="text-marca-400 text-lg">$3.050 + IVA</strong></div>
        </div>
        <p class="text-xs text-slate-500 mt-auto pt-5">Forma de pago: 60 % al empezar y 40 % a la entrega. Solo el sistema: $1.320 y $880.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-7 flex flex-col">
        <p class="text-slate-400 text-sm">Uso del sistema &middot; cada mes</p>
        <p class="text-4xl font-bold text-white mt-3">$49 <span class="text-base font-normal text-slate-400">+ IVA por sede</span></p>
        <p class="text-sm text-slate-400 mt-1 mb-5">Desde la entrega.</p>
        <div class="space-y-2 text-sm text-slate-300">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Médicos, usuarios y pacientes sin límite</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Servidor propio de FisioVida y respaldos diarios</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Soporte por WhatsApp</div></div>
        </div>
      </div>
    </div>

    <div class="rounded-2xl border border-slate-700/60 p-6">
      <p class="text-sm font-semibold text-white mb-3">Costos de terceros, que no cobra Creative Web</p>
      <div class="grid sm:grid-cols-2 gap-x-8 gap-y-2 text-sm text-slate-400">
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Quipuy: $28 + IVA al año por cada médico que factura <span class="text-xs">(adicional C)</span></div></div>
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Firma electrónica de cada médico que factura</div></div>
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Meta cobra cada mensaje de WhatsApp, aprox. $0,01 <span class="text-xs">(adicional B)</span></div></div>
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>PayPhone cobra una comisión por cada pago <span class="text-xs">(adicional A)</span></div></div>
      </div>
    </div>
  </section>

  <!-- ══════════ CRONOGRAMA ══════════ -->
  <section id="cronograma" class="mt-20 pt-10 border-t border-slate-800/70">
    <p class="eyebrow text-marca-400 mb-2">Cronograma</p>
    <h2 class="text-3xl font-bold text-white leading-tight mb-8">De la aprobación a funcionar</h2>

    <div class="grid md:grid-cols-3 gap-4 mb-10">
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <p class="text-marca-400 font-semibold mb-1">Semanas 1 a 2</p>
        <p class="text-white font-semibold mb-2">Las fichas</p>
        <p class="text-sm text-slate-400">Reunión con cada especialidad para armar su ficha. Configuramos sedes, médicos y horarios.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <p class="text-marca-400 font-semibold mb-1">Semanas 3 a 5</p>
        <p class="text-white font-semibold mb-2">El sistema</p>
        <p class="text-sm text-slate-400">Agenda, atenciones e historia clínica. Lo prueban con pacientes de ejemplo.</p>
      </div>
      <div class="rounded-2xl border border-slate-700/60 glass p-6">
        <p class="text-marca-400 font-semibold mb-1">Semana 6</p>
        <p class="text-white font-semibold mb-2">Entrega</p>
        <p class="text-sm text-slate-400">Capacitación a médicos, recepción y administración. Los adicionales suman 1 a 2 semanas.</p>
      </div>
    </div>

    <div class="border-l-2 border-amber-500 pl-6 mb-10">
      <h3 class="text-base font-semibold text-white mb-3">Lo que necesitamos de ustedes</h3>
      <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-300">
        <div class="flex gap-2"><span class="text-amber-400">›</span><div>El formulario que llena hoy cada especialidad</div></div>
        <div class="flex gap-2"><span class="text-amber-400">›</span><div>Médicos con su especialidad, sede, horario y duración de cita</div></div>
        <div class="flex gap-2"><span class="text-amber-400">›</span><div>Usuarios de recepción y administración de cada sede</div></div>
        <div class="flex gap-2"><span class="text-amber-400">›</span><div>Qué partes de la historia van como privadas</div></div>
        <div class="flex gap-2"><span class="text-amber-400">›</span><div>Para WhatsApp: el número de cada especialidad</div></div>
        <div class="flex gap-2"><span class="text-amber-400">›</span><div>Para facturar: RUC y firma electrónica de cada médico</div></div>
      </div>
      <p class="text-xs text-slate-500 mt-4 prosa">WhatsApp necesita que Meta apruebe cada número y los mensajes. Ese trámite suele tomar de unos días a dos semanas y no depende de nosotros.</p>
    </div>

    <div class="border-l-2 border-slate-700 pl-6 mb-12">
      <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
      <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-400">
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Pasar los datos de Motrix al sistema nuevo</div></div>
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Paquetes de sesiones prepagadas</div></div>
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Página web de FisioVida</div></div>
        <div class="flex gap-2"><span class="text-slate-600">·</span><div>Cambios fuera de lo descrito, que se cotizan aparte</div></div>
      </div>
    </div>

    <div class="grid md:grid-cols-3 gap-4 mb-12">
      <div class="rounded-2xl border border-slate-700/60 p-5"><p class="text-white font-semibold mb-1">Motrix</p><p class="text-sm text-slate-400">El sistema que FisioVida ya usa en fisioterapia.</p></div>
      <div class="rounded-2xl border border-slate-700/60 p-5"><p class="text-white font-semibold mb-1">DentiLab</p><p class="text-sm text-slate-400">Agenda, historias y recordatorios para clínicas dentales. Es la base de este sistema.</p></div>
      <div class="rounded-2xl border border-slate-700/60 p-5"><p class="text-white font-semibold mb-1">Quipuy</p><p class="text-sm text-slate-400">Nuestro sistema de facturación electrónica SRI.</p></div>
    </div>

    <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 p-8 mb-16">
      <div class="flex flex-wrap items-center justify-between gap-5">
        <div>
          <p class="text-lg font-semibold text-white">Cualquier duda, la conversamos.</p>
          <div class="flex items-center gap-3 mt-3">
            <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
            <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; octubre de 2026</p>
          </div>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="pdf/proforma-1-2-1336.pdf" download="Proforma-1-2-1336-FisioVida.pdf" class="px-6 py-3 rounded-xl border border-slate-600 text-slate-200 font-semibold text-sm hover:border-slate-400 hover:text-white transition whitespace-nowrap">&darr;&nbsp; Proforma en PDF</a>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20del%20sistema%20multiespecialidad%20de%20FisioVida" class="px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition whitespace-nowrap">Escribir por WhatsApp</a>
        </div>
      </div>
    </div>
  </section>

</div>

<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{
  const vis=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
  if(!vis) return;
  const a=links.get(vis.target.id);
  if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');}
},{rootMargin:'-80px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>
</body>
</html>
