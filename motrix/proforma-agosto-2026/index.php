<?php
session_start();
if (empty($_SESSION['auth_motrix'])) {
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
<title>Nuevas funciones para Motrix &mdash; FisioVida</title>
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
body{background:radial-gradient(1200px 780px at 22% 0%, rgba(20,184,166,.13), transparent 62%), #0a0f16;}
.glass{background:rgba(17,26,36,.5);backdrop-filter:blur(18px)}
section{scroll-margin-top:80px}
.anc{scroll-margin-top:80px}
.nav a.on{color:#fff;background:rgba(20,184,166,.18)}
.prosa{max-width:64ch}
.tabla-scroll{overflow-x:auto}
.eyebrow{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0a0f16]/85">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#consentimiento" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Consentimiento</a>
      <a href="#reportes" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Reportes</a>
      <a href="#asistencias" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Asistencias</a>
      <a href="#origen" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Origen y tablero</a>
      <a href="#sri" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Facturación SRI</a>
      <a href="#inversion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Inversión</a>
    </div>
  </div>
</nav>

<div class="max-w-6xl mx-auto px-6">

  <!-- ══════════ PORTADA ══════════ -->
  <header class="pt-14 pb-10">
    <div class="flex items-start justify-between gap-6">
      <div>
        <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-5">
        <p class="eyebrow text-marca-400 mb-3">Propuesta</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-[1.08] tracking-tight">Nuevas funciones<br>para Motrix</h1>
        <p class="text-slate-400 mt-4">FisioVida &middot; Sr. Fernando Landeta &middot; agosto de 2026</p>
      </div>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
    </div>
  </header>

  <div class="grid md:grid-cols-3 gap-4 mb-4">
    <a href="#inversion" class="rounded-2xl border border-marca-500/40 bg-marca-500/10 p-6 hover:border-marca-500/70 transition">
      <p class="eyebrow text-marca-400 mb-3">Nuevas funciones</p>
      <p class="text-3xl font-bold text-marca-400 mb-2">$280</p>
      <p class="text-sm text-slate-400">Los cuatro módulos, + IVA</p>
    </a>
    <a href="#sri" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Facturación electrónica</p>
      <p class="text-3xl font-bold text-white mb-2">$100</p>
      <p class="text-sm text-slate-400">+ IVA &middot; y <strong class="text-slate-300">$28 al año</strong>, facturas ilimitadas</p>
    </a>
    <a href="#inversion" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Total una sola vez</p>
      <p class="text-3xl font-bold text-white mb-2">$380</p>
      <p class="text-sm text-slate-400">+ IVA &middot; entrega en 4 semanas</p>
    </a>
  </div>
  <p class="text-xs text-slate-500 prosa">Todo se construye sobre el Motrix que ya está funcionando en la clínica. No hay que reinstalar nada ni migrar información.</p>

  <!-- ══════════ MÓDULO 1 ══════════ -->
  <section id="consentimiento" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">Módulo 01</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Consentimiento informado y enfermedades preexistentes</h2>
          <p class="text-3xl font-bold text-white">$110</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">Motrix genera el consentimiento informado del paciente ya llenado con sus datos, listo para imprimir y firmar. Y la ficha de ingreso pasa a recoger las enfermedades preexistentes, que es la información que alimenta ese documento.</p>

        <div class="grid sm:grid-cols-2 gap-x-8 gap-y-2.5 text-sm text-slate-300 mb-8">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Impresión de la plantilla del consentimiento desde la ficha del paciente</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Registro de fecha y hora de cada generación</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Auditoría: queda registrado qué usuario lo generó</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Listado de enfermedades preexistentes con casillas de verificación</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Campo libre para escribir lo que no esté en la lista</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Esos datos se vuelcan automáticamente en el consentimiento</div></div>
        </div>

        <div class="border-l-2 border-marca-500 pl-6 mb-8">
          <h3 class="text-base font-semibold text-white mb-2">Los pacientes que ya están registrados</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Hoy no tienen el consentimiento cargado. Se habilita la opción de editar y volver a consultar su ficha, para completarles las preexistencias y generarles el documento sin tener que crearlos de nuevo.</p>
        </div>

        <div class="border-l-2 border-amber-500 pl-6">
          <h3 class="text-base font-semibold text-white mb-2">Cómo queda la firma, para que no haya sorpresas</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">La firma es <strong class="text-amber-400">física, en papel</strong>: el sistema imprime, el paciente firma y ese documento firmado lo archiva la clínica de forma manual. Motrix <strong class="text-white">no almacena la firma digital ni el escaneo</strong> del papel. Lo que sí queda en el sistema es el registro de que se generó, cuándo y quién.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ MÓDULO 2 ══════════ -->
  <section id="reportes" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">Módulo 02</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Reportes gerenciales por rango de fechas</h2>
          <p class="text-3xl font-bold text-white">$95</p>
          <p class="text-xs text-slate-500">+ IVA</p>
          <p class="text-xs text-slate-500 mt-3">Los solicitó Ricardo.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">Seis reportes, todos con el mismo filtro: usted elige desde qué fecha hasta qué fecha y el sistema arma el período. Sirve igual para ver un mes, un trimestre o el año.</p>

        <div class="grid sm:grid-cols-2 gap-3 mb-8">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-1">Pacientes del período</p>
            <p class="text-sm text-slate-400 leading-relaxed">Cuántos atendió la clínica en el rango elegido.</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-1">Pacientes que deben</p>
            <p class="text-sm text-slate-400 leading-relaxed">La cartera pendiente, con el detalle por paciente.</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-1">Horas de mayor afluencia</p>
            <p class="text-sm text-slate-400 leading-relaxed">En qué franjas se concentra la atención, para ordenar la agenda y el personal.</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-1">Mejores pacientes</p>
            <p class="text-sm text-slate-400 leading-relaxed">Calificados por asistencia, pagos y deudas.</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-1">Media de demora</p>
            <p class="text-sm text-slate-400 leading-relaxed">Cuánto se retrasan los pacientes en promedio.</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-1">Top de sesiones</p>
            <p class="text-sm text-slate-400 leading-relaxed">Qué sesiones son las más realizadas.</p>
          </div>
        </div>

        <div class="border-l-2 border-amber-500 pl-6">
          <h3 class="text-base font-semibold text-white mb-2">Sobre la media de demora, con honestidad</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">El cálculo sale de la marcación que hoy existe en el sistema, y los fisioterapeutas no siempre marcan a la hora exacta. Ese dato tiene un margen: <strong class="text-white">léalo como tendencia, no como cifra exacta</strong>. Proponemos calcularlo sobre la marcación real disponible y dejarlo indicado en el propio reporte, para que nadie lo tome por lo que no es.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ MÓDULO 3 ══════════ -->
  <section id="asistencias" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">Módulo 03</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Registro de asistencias en PDF</h2>
          <p class="text-3xl font-bold text-white">$50</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">Un listado imprimible de las sesiones de un paciente, que se descarga en PDF desde su ficha.</p>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-8">
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-sm font-semibold text-white">Fecha</p>
          </div>
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-sm font-semibold text-white">Tipo de sesión</p>
          </div>
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-sm font-semibold text-white">Técnicas aplicadas</p>
          </div>
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-sm font-semibold text-white">Duración</p>
          </div>
        </div>

        <div class="border-l-2 border-marca-500 pl-6">
          <h3 class="text-base font-semibold text-white mb-2">Para qué se usa de verdad</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Es el respaldo de asistencia del doctor, y sobre todo el documento que piden los pacientes <strong class="text-white">para presentarlo al seguro</strong>. Con esto se entrega en el momento, en PDF y con el formato de la clínica.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ MÓDULO 4 ══════════ -->
  <section id="origen" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">Módulo 04</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Origen del paciente y período en el tablero</h2>
          <p class="text-3xl font-bold text-white">$25</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="grid lg:grid-cols-2 gap-4">
          <div class="rounded-2xl border border-slate-800/50 glass p-6">
            <h3 class="text-base font-semibold text-white mb-3">Por dónde llegó el paciente</h3>
            <p class="text-sm text-slate-400 leading-relaxed mb-4">Un campo nuevo en la creación del paciente, con opciones fijas:</p>
            <div class="grid grid-cols-2 gap-x-6 gap-y-1.5 text-sm text-slate-300 mb-4">
              <div class="flex gap-2"><span class="text-marca-400">›</span><div>Recomendación</div></div>
              <div class="flex gap-2"><span class="text-marca-400">›</span><div>Facebook</div></div>
              <div class="flex gap-2"><span class="text-marca-400">›</span><div>Instagram</div></div>
              <div class="flex gap-2"><span class="text-marca-400">›</span><div>TikTok</div></div>
              <div class="flex gap-2"><span class="text-marca-400">›</span><div>Radio</div></div>
              <div class="flex gap-2"><span class="text-marca-400">›</span><div>Otro</div></div>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed">Si marca <strong class="text-white">recomendación</strong>, se habilita un campo para anotar quién lo recomendó.</p>
          </div>
          <div class="rounded-2xl border border-slate-800/50 glass p-6">
            <h3 class="text-base font-semibold text-white mb-3">El período, visible en el tablero</h3>
            <p class="text-sm text-slate-400 leading-relaxed">Hoy el tablero muestra cifras pero no queda claro a qué fechas corresponden. Se agrega el rango de fechas de los datos que se están viendo, en un lugar visible de la pantalla.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ MÓDULO 5 ══════════ -->
  <section id="sri" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">Módulo 05</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Facturación electrónica SRI</h2>
          <p class="text-3xl font-bold text-white">$100</p>
          <p class="text-xs text-slate-500">+ IVA, una sola vez</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">Motrix pasa a emitir facturas electrónicas válidas ante el SRI desde la misma pantalla en la que hoy se registra el cobro. La integración se hace con <strong class="text-white">Quipuy</strong>, nuestro sistema de facturación electrónica, que es el que emite y envía los comprobantes.</p>

        <div class="grid sm:grid-cols-2 gap-3">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-xs text-slate-500 mb-1">Integración</p>
            <p class="text-2xl font-bold text-white">$100 <span class="text-sm font-normal text-slate-500">+ IVA</span></p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Pago único, dentro del desarrollo.</p>
          </div>
          <div class="rounded-xl border border-marca-500/40 bg-marca-500/10 p-5">
            <p class="text-xs text-slate-500 mb-1">Costo anual del facturador</p>
            <p class="text-2xl font-bold text-marca-400">$28 <span class="text-sm font-normal text-slate-500">+ IVA / año</span></p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Con facturas ilimitadas.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ INVERSIÓN ══════════ -->
  <section id="inversion" class="mt-20 pt-10 border-t border-slate-800/70 pb-16">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">Resumen</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Inversión, pago y plazo</h2>
        <p class="text-xs text-slate-500 mt-3">Todos los valores + IVA.</p>
      </div>

      <div class="md:col-span-9">
        <div class="tabla-scroll mb-10">
          <table class="w-full text-sm border-collapse min-w-[480px]">
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500 w-10">01</td>
                <td class="py-3 px-3">Consentimiento informado y enfermedades preexistentes</td>
                <td class="py-3 pl-3 text-right font-semibold text-white whitespace-nowrap">$110</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">02</td>
                <td class="py-3 px-3">Reportes gerenciales por rango de fechas</td>
                <td class="py-3 pl-3 text-right font-semibold text-white whitespace-nowrap">$95</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">03</td>
                <td class="py-3 px-3">Registro de asistencias en PDF</td>
                <td class="py-3 pl-3 text-right font-semibold text-white whitespace-nowrap">$50</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">04</td>
                <td class="py-3 px-3">Origen del paciente y período en el tablero</td>
                <td class="py-3 pl-3 text-right font-semibold text-white whitespace-nowrap">$25</td>
              </tr>
              <tr class="border-b border-slate-700">
                <td class="py-3 pr-3"></td>
                <td class="py-3 px-3 font-semibold text-white">Nuevas funciones del sistema</td>
                <td class="py-3 pl-3 text-right text-xl font-bold text-white whitespace-nowrap">$280</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">05</td>
                <td class="py-3 px-3">Facturación electrónica SRI &mdash; puesta en marcha</td>
                <td class="py-3 pl-3 text-right font-semibold text-white whitespace-nowrap">$100</td>
              </tr>
              <tr class="border-b border-slate-700">
                <td class="py-3 pr-3"></td>
                <td class="py-3 px-3 font-semibold text-white">Facturación electrónica</td>
                <td class="py-3 pl-3 text-right text-xl font-bold text-white whitespace-nowrap">$100</td>
              </tr>
              <tr>
                <td class="py-4 pr-3"></td>
                <td class="py-4 px-3 font-semibold text-white">Total a pagar una sola vez</td>
                <td class="py-4 pl-3 text-right text-2xl font-bold text-marca-400 whitespace-nowrap">$380</td>
              </tr>
              <tr>
                <td class="py-1 pr-3"></td>
                <td class="py-1 px-3 text-slate-500">Facturación electrónica, costo anual desde la puesta en marcha</td>
                <td class="py-1 pl-3 text-right font-semibold text-white whitespace-nowrap">$28 / año</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="border-l-2 border-slate-700 pl-6 mb-10">
          <p class="text-sm text-slate-300 leading-relaxed prosa">Cada módulo se cotizó por separado a propósito: <strong class="text-white">pueden contratarlos todos ahora o tomarlos en el orden que les convenga</strong>. Ninguno depende de otro para funcionar, con una sola excepción — las enfermedades preexistentes alimentan el consentimiento, así que esos dos van juntos.</p>
        </div>

        <div class="grid sm:grid-cols-2 gap-3 mb-10">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-xs text-slate-500 mb-1">Para empezar &middot; 60 %</p>
            <p class="text-2xl font-bold text-white">$228</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-xs text-slate-500 mb-1">Al entregar funcionando &middot; 40 %</p>
            <p class="text-2xl font-bold text-white">$152</p>
          </div>
        </div>

        <p class="eyebrow text-slate-500 mb-4">Plazo &middot; 4 semanas desde el anticipo</p>
        <div class="space-y-1.5 text-sm mb-10">
          <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Semana 1</span><div class="text-slate-300">Consentimiento informado y enfermedades preexistentes.</div></div>
          <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Semana 2</span><div class="text-slate-300">Los seis reportes gerenciales.</div></div>
          <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Semana 3</span><div class="text-slate-300">Asistencias en PDF, origen del paciente y período en el tablero.</div></div>
          <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Semana 4</span><div class="text-slate-300">Facturación electrónica, pruebas con la clínica y capacitación.</div></div>
        </div>

        <div class="border-l-2 border-amber-500 pl-6 mb-10">
          <h3 class="text-base font-semibold text-white mb-2">Lo que necesitamos de ustedes para cumplir la fecha</h3>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-300">
            <div class="flex gap-2"><span class="text-amber-400">›</span><div>El texto definitivo del consentimiento informado</div></div>
            <div class="flex gap-2"><span class="text-amber-400">›</span><div>La lista de enfermedades preexistentes a incluir</div></div>
            <div class="flex gap-2"><span class="text-amber-400">›</span><div>Datos tributarios y firma electrónica vigente para el SRI</div></div>
            <div class="flex gap-2"><span class="text-amber-400">›</span><div>Una revisión de Ricardo a los reportes antes de cerrarlos</div></div>
          </div>
        </div>

        <div class="border-l-2 border-slate-700 pl-6 mb-12">
          <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-400">
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Almacenamiento digital del consentimiento firmado</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Escaneo o digitalización de documentos</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Firma electrónica <span class="text-xs">(se tramita ante una entidad certificadora)</span></div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Reportes distintos a los seis descritos</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Llenar las preexistencias de los pacientes ya registrados <span class="text-xs">(la herramienta queda lista; la carga la hace la clínica)</span></div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Cambios en módulos de Motrix fuera de lo descrito aquí</div></div>
          </div>
        </div>

        <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 p-8 flex flex-wrap items-center justify-between gap-5">
          <div>
            <p class="text-lg font-semibold text-white">Cualquier duda, la conversamos.</p>
            <div class="flex items-center gap-3 mt-3">
              <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
              <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; agosto de 2026</p>
            </div>
          </div>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20de%20las%20nuevas%20funciones%20de%20Motrix" class="px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition whitespace-nowrap">Escribir por WhatsApp</a>
        
          <div class="mt-8 pt-6 border-t border-slate-800/60">
            <p class="text-xs text-slate-500 mb-3">Descargue la cotización en PDF</p>
            <div class="flex flex-wrap gap-3">
            <a href="pdf/cotizacion.pdf" download class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-600 text-slate-200 font-semibold text-sm hover:border-slate-400 hover:text-white transition whitespace-nowrap">&darr;&nbsp; Descargar cotización</a>
            </div>
          </div>
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
