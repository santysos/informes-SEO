<?php
session_start();
if (empty($_SESSION['auth_dikapsa_seo'])) {
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
<title>Plan SEO 6 meses &mdash; Dikapsa y Doeco</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{marca:{300:'#7cc4ec',400:'#4baae3',500:'#0087cc',600:'#00679c'}}
}}}
</script>
<style>
html{scroll-behavior:smooth}
body{background:radial-gradient(1200px 780px at 22% 0%, rgba(0,135,204,.14), transparent 62%), #0a0f16;}
.glass{background:rgba(17,26,36,.5);backdrop-filter:blur(18px)}
section{scroll-margin-top:80px}
.anc{scroll-margin-top:80px}
.nav a.on{color:#fff;background:rgba(0,135,204,.22)}
.prosa{max-width:64ch}
.tabla-scroll{overflow-x:auto}
.eyebrow{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0a0f16]/85">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#hallazgo" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">El hallazgo</a>
      <a href="#empresas" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Las dos webs</a>
      <a href="#plan" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">El plan</a>
      <a href="#inversion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Inversión</a>
      <a href="#alcance" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Alcance</a>
    </div>
  </div>
</nav>

<div class="max-w-6xl mx-auto px-6">

  <!-- ══════════ PORTADA ══════════ -->
  <header class="pt-14 pb-9">
    <div class="flex items-start justify-between gap-6">
      <div>
        <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-5">
        <p class="eyebrow text-marca-400 mb-3">Propuesta para Diego Oña</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-[1.08] tracking-tight">Plan de posicionamiento<br>para Dikapsa y Doeco</h1>
        <p class="text-slate-400 mt-4">6 meses &middot; agosto de 2026</p>
      </div>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
    </div>
  </header>

  <div class="grid md:grid-cols-2 gap-4">
    <a href="#inversion" class="rounded-2xl border border-marca-500/45 bg-marca-500/10 p-6 hover:border-marca-500/80 transition">
      <p class="eyebrow text-marca-300 mb-3">Un solo pago &middot; recomendado</p>
      <p class="text-3xl font-bold text-white mb-2">$980</p>
      <p class="text-sm text-slate-400">+ IVA por los 6 meses, las dos empresas</p>
    </a>
    <a href="#inversion" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Pago mensual</p>
      <p class="text-3xl font-bold text-white mb-2">$180 <span class="text-lg font-medium text-slate-400">/mes</span></p>
      <p class="text-sm text-slate-400">+ IVA &middot; $1.080 en los 6 meses</p>
    </a>
  </div>

  <!-- ══════════ HALLAZGO ══════════ -->
  <section id="hallazgo" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">01</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Lo que muestran los números</h2>
          <p class="text-xs text-slate-500 mt-3">Search Console de las dos webs, del 27 de agosto de 2025 al 25 de agosto de 2026.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="border-l-2 border-red-500 pl-6 mb-9">
          <h3 class="text-lg font-semibold text-white mb-3">Dikapsa sale casi primero en «recetario médico» y casi nadie le hace clic</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">En un año, <strong class="text-white">18.066 personas</strong> vieron a Dikapsa en esa búsqueda, en <strong class="text-white">posición 1,4</strong>: primero o segundo resultado. Entraron <strong class="text-red-400">107</strong>. De cada 1.000 que la vieron, 994 eligieron otro.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Google ya los muestra. Lo que falla es lo que la gente lee cuando aparecen: el título y las dos líneas de descripción. Eso se reescribe, y es lo primero que hace el plan.</p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-9">
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-2xl font-bold text-white">839.610</p>
            <p class="text-xs text-slate-500 mt-1">veces aparecieron las dos webs</p>
          </div>
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-2xl font-bold text-white">11.787</p>
            <p class="text-xs text-slate-500 mt-1">visitas que entraron</p>
          </div>
          <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-4">
            <p class="text-2xl font-bold text-white">0,67 %</p>
            <p class="text-xs text-red-400 mt-1">de clic en Dikapsa</p>
          </div>
          <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-4">
            <p class="text-2xl font-bold text-white">2,15 %</p>
            <p class="text-xs text-emerald-400 mt-1">de clic en Doeco</p>
          </div>
        </div>

        <div class="border-l-2 border-marca-500 pl-6 mb-9">
          <h3 class="text-lg font-semibold text-white mb-3">Doeco convierte tres veces mejor que Dikapsa</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">Mismo dueño, mismo equipo, mismo tipo de comprador. Doeco saca 2,15 visitas de cada 100 veces que aparece; Dikapsa saca 0,67.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Si Dikapsa llegara a ese mismo 2,15 % con las 423.808 apariciones que <em>ya tiene hoy</em>, serían unas <strong class="text-white">9.100 visitas al año</strong> en lugar de 2.846. No es una promesa: es la aritmética de lo que ya pasa en la otra empresa de la casa.</p>
        </div>

        <div class="border-l-2 border-slate-700 pl-6">
          <h3 class="text-lg font-semibold text-white mb-3">Y Doeco ya probó que publicar contenido sirve</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Doeco tiene <strong class="text-white">550 páginas</strong> recibiendo visitas desde Google. Dikapsa tiene 160. La diferencia no es el rubro ni la competencia: es cuánto se ha publicado. Esa es la receta que el plan le lleva a Dikapsa, y que en Doeco sigue rindiendo.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ LAS DOS WEBS ══════════ -->
  <section id="empresas" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10 mb-12">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">02</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Cada web tiene un problema distinto</h2>
      </div>
      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa">Dikapsa está arriba y no le hacen clic. Doeco sí convierte, pero está en la mitad de abajo de la primera página. Se atacan con las mismas herramientas, en distinto orden.</p>
      </div>
    </div>

    <!-- Dikapsa -->
    <div class="md:grid md:grid-cols-12 md:gap-10 pt-10 border-t border-slate-800/50">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-slate-500 mb-2">Empresa 1</p>
          <h3 class="text-xl font-semibold text-white leading-tight mb-1">Dikapsa</h3>
          <p class="text-xs text-slate-500 mb-4">dikapsa.com &middot; imprenta y artes gráficas</p>
          <div class="space-y-1 text-sm">
            <div class="flex justify-between border-b border-slate-800/60 py-1.5"><span class="text-slate-500">Visitas</span><strong class="text-white">2.846</strong></div>
            <div class="flex justify-between border-b border-slate-800/60 py-1.5"><span class="text-slate-500">Apariciones</span><strong class="text-white">423.808</strong></div>
            <div class="flex justify-between border-b border-slate-800/60 py-1.5"><span class="text-slate-500">Clic</span><strong class="text-red-400">0,67 %</strong></div>
            <div class="flex justify-between py-1.5"><span class="text-slate-500">Páginas con visitas</span><strong class="text-white">160</strong></div>
          </div>
        </div>
      </div>
      <div class="md:col-span-9">
        <p class="eyebrow text-slate-500 mb-3">Lo que más busca la gente</p>
        <div class="tabla-scroll mb-7">
          <table class="w-full text-sm border-collapse min-w-[500px]">
            <thead>
              <tr class="border-b border-slate-700 text-xs text-slate-500">
                <th class="text-left py-2 pr-3 font-medium">Búsqueda</th>
                <th class="text-right py-2 px-3 font-medium">Visitas</th>
                <th class="text-right py-2 px-3 font-medium">Apariciones</th>
                <th class="text-right py-2 pl-3 font-medium">Posición</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">recetario médico</td><td class="py-2.5 px-3 text-right">107</td><td class="py-2.5 px-3 text-right">18.066</td><td class="py-2.5 pl-3 text-right text-emerald-400">1,4</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">recetarios médicos</td><td class="py-2.5 px-3 text-right">38</td><td class="py-2.5 px-3 text-right">4.312</td><td class="py-2.5 pl-3 text-right text-emerald-400">2,7</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">material pop quito</td><td class="py-2.5 px-3 text-right">32</td><td class="py-2.5 px-3 text-right">&mdash;</td><td class="py-2.5 pl-3 text-right text-amber-400">7,4</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">vibrines</td><td class="py-2.5 px-3 text-right">26</td><td class="py-2.5 px-3 text-right">3.692</td><td class="py-2.5 pl-3 text-right text-emerald-400">1,2</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">calculadora de papel</td><td class="py-2.5 px-3 text-right">20</td><td class="py-2.5 px-3 text-right">1.448</td><td class="py-2.5 pl-3 text-right text-amber-400">6,9</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">tarjetas de presentación quito</td><td class="py-2.5 px-3 text-right">16</td><td class="py-2.5 px-3 text-right">&mdash;</td><td class="py-2.5 pl-3 text-right text-amber-400">7,8</td></tr>
              <tr><td class="py-2.5 pr-3">tríptico</td><td class="py-2.5 px-3 text-right text-red-400">13</td><td class="py-2.5 px-3 text-right">6.147</td><td class="py-2.5 pl-3 text-right text-emerald-400">2,3</td></tr>
            </tbody>
          </table>
        </div>
        <p class="text-xs text-slate-500 mb-8">La marca «dikapsa» aporta otras 410 visitas: gente que ya los conocía. No cuenta como cliente nuevo.</p>

        <div class="grid sm:grid-cols-2 gap-x-8 gap-y-3 text-sm text-slate-300 mb-7">
          <div class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">«Tríptico» es el caso más extremo:</strong> 6.147 apariciones en posición 2,3 y 13 visitas. Ahí no hay nada que escalar, solo que reescribir.</div></div>
          <div class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">Recetarios y vibrines están en posición 1 y 2.</strong> Son las dos páginas que más rápido rinden con solo cambiar título y descripción.</div></div>
          <div class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">Material POP y tarjetas están en 7-8.</strong> Esas sí necesitan contenido nuevo para subir.</div></div>
          <div class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">La calculadora de corte de papel trae 146 visitas al año</strong> sin ser un producto. Es una puerta de entrada que conviene conectar con el catálogo.</div></div>
        </div>

        <p class="eyebrow text-slate-500 mb-3">Las páginas que más traen</p>
        <div class="tabla-scroll">
          <table class="w-full text-sm border-collapse min-w-[500px]">
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Portada</td><td class="py-2.5 px-3 text-right">720</td><td class="py-2.5 px-3 text-right text-slate-500">8.693</td><td class="py-2.5 pl-3 text-right text-amber-400">6,5</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Recetario médico</td><td class="py-2.5 px-3 text-right">484</td><td class="py-2.5 px-3 text-right text-slate-500">48.647</td><td class="py-2.5 pl-3 text-right text-emerald-400">2,8</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Tarjetas de presentación</td><td class="py-2.5 px-3 text-right">156</td><td class="py-2.5 px-3 text-right text-slate-500">29.417</td><td class="py-2.5 pl-3 text-right text-amber-400">6,8</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Calculadora de corte de papel</td><td class="py-2.5 px-3 text-right">146</td><td class="py-2.5 px-3 text-right text-slate-500">8.945</td><td class="py-2.5 pl-3 text-right text-amber-400">7,5</td></tr>
              <tr><td class="py-2.5 pr-3 text-slate-400">Vibrines</td><td class="py-2.5 px-3 text-right">128</td><td class="py-2.5 px-3 text-right text-slate-500">14.186</td><td class="py-2.5 pl-3 text-right text-emerald-400">2,0</td></tr>
            </tbody>
          </table>
        </div>
        <p class="text-xs text-slate-500 mt-3">La página de recetario médico apareció 48.647 veces en el año. Es la más vista de las dos empresas y la que menos aprovecha lo que ya tiene.</p>
      </div>
    </div>

    <!-- Doeco -->
    <div class="md:grid md:grid-cols-12 md:gap-10 mt-14 pt-10 border-t border-emerald-500/25">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-emerald-400 mb-2">Empresa 2</p>
          <h3 class="text-xl font-semibold text-white leading-tight mb-1">Doeco</h3>
          <p class="text-xs text-slate-500 mb-4">doeco.ec &middot; empaques ecológicos</p>
          <div class="space-y-1 text-sm">
            <div class="flex justify-between border-b border-slate-800/60 py-1.5"><span class="text-slate-500">Visitas</span><strong class="text-white">8.941</strong></div>
            <div class="flex justify-between border-b border-slate-800/60 py-1.5"><span class="text-slate-500">Apariciones</span><strong class="text-white">415.802</strong></div>
            <div class="flex justify-between border-b border-slate-800/60 py-1.5"><span class="text-slate-500">Clic</span><strong class="text-emerald-400">2,15 %</strong></div>
            <div class="flex justify-between py-1.5"><span class="text-slate-500">Páginas con visitas</span><strong class="text-white">550</strong></div>
          </div>
        </div>
      </div>
      <div class="md:col-span-9">
        <p class="eyebrow text-slate-500 mb-3">Lo que más busca la gente</p>
        <div class="tabla-scroll mb-7">
          <table class="w-full text-sm border-collapse min-w-[500px]">
            <thead>
              <tr class="border-b border-slate-700 text-xs text-slate-500">
                <th class="text-left py-2 pr-3 font-medium">Búsqueda</th>
                <th class="text-right py-2 px-3 font-medium">Visitas</th>
                <th class="text-right py-2 px-3 font-medium">Apariciones</th>
                <th class="text-right py-2 pl-3 font-medium">Posición</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">papel antigrasa</td><td class="py-2.5 px-3 text-right">102</td><td class="py-2.5 px-3 text-right">2.042</td><td class="py-2.5 pl-3 text-right text-amber-400">6,2</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">papel antigrasa guayaquil</td><td class="py-2.5 px-3 text-right">67</td><td class="py-2.5 px-3 text-right">&mdash;</td><td class="py-2.5 pl-3 text-right text-emerald-400">2,4</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">fundas de papel</td><td class="py-2.5 px-3 text-right">47</td><td class="py-2.5 px-3 text-right">5.786</td><td class="py-2.5 pl-3 text-right text-amber-400">7,8</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">cajas para pasteles quito</td><td class="py-2.5 px-3 text-right">31</td><td class="py-2.5 px-3 text-right">&mdash;</td><td class="py-2.5 pl-3 text-right text-slate-500">&mdash;</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">envases para helados en ecuador</td><td class="py-2.5 px-3 text-right">25</td><td class="py-2.5 px-3 text-right">&mdash;</td><td class="py-2.5 pl-3 text-right text-slate-500">&mdash;</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">cajas para hamburguesas</td><td class="py-2.5 px-3 text-right">19</td><td class="py-2.5 px-3 text-right">&mdash;</td><td class="py-2.5 pl-3 text-right text-slate-500">&mdash;</td></tr>
              <tr><td class="py-2.5 pr-3">fundas de papel quito</td><td class="py-2.5 px-3 text-right">19</td><td class="py-2.5 px-3 text-right">1.474</td><td class="py-2.5 pl-3 text-right text-amber-400">7,8</td></tr>
            </tbody>
          </table>
        </div>
        <p class="text-xs text-slate-500 mb-8">La marca «doeco» aporta otras 779 visitas.</p>

        <div class="grid sm:grid-cols-2 gap-x-8 gap-y-3 text-sm text-slate-300 mb-7">
          <div class="flex gap-3"><span class="text-emerald-400">›</span><div><strong class="text-white">La portada rinde desde la posición 9,4:</strong> es el último lugar de la primera página y aun así trae 1.140 visitas. Cada puesto que suba se nota mucho.</div></div>
          <div class="flex gap-3"><span class="text-emerald-400">›</span><div><strong class="text-white">«Fundas de papel»:</strong> 5.786 apariciones y solo 47 visitas, pero en posición 7,8. Acá el problema es la posición, no el título.</div></div>
          <div class="flex gap-3"><span class="text-emerald-400">›</span><div><strong class="text-white">Con ciudad rinde mejor.</strong> «Papel antigrasa guayaquil» está en 2,4 y el término solo en 6,2. Ese patrón se replica por producto y por ciudad.</div></div>
          <div class="flex gap-3"><span class="text-emerald-400">›</span><div><strong class="text-white">550 páginas ya construidas.</strong> No hay que empezar de cero: hay que ordenar y reforzar lo que existe.</div></div>
        </div>

        <p class="eyebrow text-slate-500 mb-3">Las páginas que más traen</p>
        <div class="tabla-scroll">
          <table class="w-full text-sm border-collapse min-w-[500px]">
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Portada</td><td class="py-2.5 px-3 text-right">1.140</td><td class="py-2.5 px-3 text-right text-slate-500">7.845</td><td class="py-2.5 pl-3 text-right text-amber-400">9,4</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Papel antigrasa</td><td class="py-2.5 px-3 text-right">460</td><td class="py-2.5 px-3 text-right text-slate-500">7.482</td><td class="py-2.5 pl-3 text-right text-amber-400">4,8</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Cajas para pasteles Quito</td><td class="py-2.5 px-3 text-right">378</td><td class="py-2.5 px-3 text-right text-slate-500">11.668</td><td class="py-2.5 pl-3 text-right text-amber-400">6,0</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3 text-slate-400">Papel antigrasa restaurantes Guayaquil</td><td class="py-2.5 px-3 text-right">305</td><td class="py-2.5 px-3 text-right text-slate-500">5.271</td><td class="py-2.5 pl-3 text-right text-amber-400">6,1</td></tr>
              <tr><td class="py-2.5 pr-3 text-slate-400">Categoría fundas</td><td class="py-2.5 px-3 text-right">273</td><td class="py-2.5 px-3 text-right text-slate-500">17.886</td><td class="py-2.5 pl-3 text-right text-amber-400">7,7</td></tr>
            </tbody>
          </table>
        </div>
        <p class="text-xs text-slate-500 mt-3">Ninguna de las cinco está en el podio. Todas están entre la posición 4 y la 9: el rango donde subir dos puestos duplica las visitas.</p>
      </div>
    </div>
  </section>

  <!-- ══════════ EL PLAN ══════════ -->
  <section id="plan" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">03</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Qué hacemos cada mes</h2>
          <p class="text-xs text-slate-500 mt-3">Todo se hace en las dos webs, en paralelo. 20 artículos por empresa al mes.</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <div class="space-y-6">
          <div class="border-l-2 border-marca-500 pl-6">
            <div class="flex items-baseline gap-3 mb-2">
              <span class="font-mono text-xs text-marca-400">MES 1</span>
              <h3 class="text-base font-semibold text-white">Títulos, descripciones y medición</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed prosa mb-2">Reescribimos el título y la descripción de las páginas que ya aparecen mucho. En Dikapsa: recetario médico, vibrines, trípticos, tarjetas de presentación y la calculadora. En Doeco: portada, papel antigrasa, cajas para pasteles y fundas.</p>
            <p class="text-sm text-slate-400 leading-relaxed prosa">Dejamos instalada la medición para saber cuántos contactos llegan desde Google. Primeros 20 artículos por empresa.</p>
          </div>

          <div class="border-l-2 border-slate-700 pl-6">
            <div class="flex items-baseline gap-3 mb-2">
              <span class="font-mono text-xs text-marca-400">MESES 2 y 3</span>
              <h3 class="text-base font-semibold text-white">Contenido por línea de producto</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed prosa">Dikapsa: recetarios y material médico, tarjetas de presentación, vibrines, trípticos y material POP. Doeco: papel antigrasa, fundas de papel, cajas para pasteles y hamburguesas, envases para helados. 40 artículos por empresa en los dos meses.</p>
          </div>

          <div class="border-l-2 border-slate-700 pl-6">
            <div class="flex items-baseline gap-3 mb-2">
              <span class="font-mono text-xs text-marca-400">MES 4</span>
              <h3 class="text-base font-semibold text-white">Ciudades y búsquedas largas</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed prosa">Replicamos el patrón que ya funciona en Doeco &mdash;producto más ciudad&mdash; en las dos webs: Quito, Guayaquil y las plazas que valga la pena atacar. 20 artículos por empresa.</p>
          </div>

          <div class="border-l-2 border-slate-700 pl-6">
            <div class="flex items-baseline gap-3 mb-2">
              <span class="font-mono text-xs text-marca-400">MES 5</span>
              <h3 class="text-base font-semibold text-white">Corrección con datos reales</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed prosa">Revisamos qué subió y qué no. Reescribimos las páginas que quedaron entre la posición 5 y la 15: son las que están a un empujón de rendir. 20 artículos por empresa.</p>
          </div>

          <div class="border-l-2 border-slate-700 pl-6">
            <div class="flex items-baseline gap-3 mb-2">
              <span class="font-mono text-xs text-marca-400">MES 6</span>
              <h3 class="text-base font-semibold text-white">Cierre y reporte final</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed prosa">Últimos 20 artículos por empresa y un reporte por cada una: qué posiciones se movieron, cuántas visitas más entraron y qué conviene hacer el semestre siguiente.</p>
          </div>
        </div>

        <div class="mt-9 pt-8 border-t border-slate-800/60">
          <p class="text-sm font-semibold text-white mb-3">Todos los meses, en las dos</p>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-2 text-sm text-slate-400">
            <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Reunión mensual para revisar y ajustar</div></div>
            <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Reporte separado por empresa</div></div>
            <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Ustedes aprueban los artículos antes de publicar</div></div>
            <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Publicación escalonada, 4 o 5 por semana</div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ INVERSIÓN ══════════ -->
  <section id="inversion" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">04</p>
          <h2 class="text-2xl font-bold text-white leading-tight">La inversión</h2>
          <p class="text-xs text-slate-500 mt-3">Los dos valores cubren las dos empresas y los 6 meses. Sin IVA.</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <div class="grid md:grid-cols-2 gap-4 mb-8">
          <div class="rounded-2xl border border-marca-500/45 bg-marca-500/10 p-7 flex flex-col">
            <span class="eyebrow bg-marca-500/25 text-marca-300 px-2 py-1 rounded self-start">Recomendado</span>
            <p class="text-sm text-slate-400 mt-4 mb-1">Un solo pago</p>
            <p class="text-4xl font-bold text-white">$980</p>
            <p class="text-xs text-slate-500 mb-5">+ IVA &middot; al inicio</p>
            <div class="space-y-2 text-sm text-slate-300 mt-auto">
              <div class="flex gap-2"><span class="text-marca-400">✓</span><div>$163 al mes por las dos empresas</div></div>
              <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Unos $82 al mes por empresa</div></div>
              <div class="flex gap-2"><span class="text-marca-400">✓</span><div>240 artículos en total</div></div>
            </div>
          </div>
          <div class="rounded-2xl border border-slate-700/60 glass p-7 flex flex-col">
            <span class="eyebrow text-slate-500 self-start py-1">&nbsp;</span>
            <p class="text-sm text-slate-400 mt-4 mb-1">Pago mensual</p>
            <p class="text-4xl font-bold text-white">$180<span class="text-lg font-medium text-slate-400"> /mes</span></p>
            <p class="text-xs text-slate-500 mb-5">+ IVA &middot; durante 6 meses</p>
            <div class="space-y-2 text-sm text-slate-300 mt-auto">
              <div class="flex gap-2"><span class="text-slate-500">·</span><div>Exactamente el mismo trabajo</div></div>
              <div class="flex gap-2"><span class="text-slate-500">·</span><div>Total: $1.080 + IVA</div></div>
              <div class="flex gap-2"><span class="text-slate-500">·</span><div>$100 más caro, por la comodidad de pagar mes a mes</div></div>
            </div>
          </div>
        </div>

        <p class="text-sm font-semibold text-white mb-3">Qué incluye, por cada empresa</p>
        <div class="grid sm:grid-cols-2 gap-x-8 gap-y-2.5 text-sm text-slate-300 mb-8">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div><strong class="text-white">20 artículos al mes</strong> &mdash; 120 en los 6 meses</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Reescritura de títulos y descripciones de las páginas que ya posicionan</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Medición instalada y funcionando</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Reunión y reporte mensual</div></div>
        </div>

        <div class="border-l-2 border-marca-500 pl-6 mb-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-white">Contratar las dos juntas ahorra $220.</strong> Por separado, cada plan cuesta $600 + IVA: $1.200 por las dos. Juntas se comparten el análisis, la reunión y el reporte, y por eso el valor baja a $980.</p>
        </div>

        <div class="border-l-2 border-slate-700 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-white">Sin cobro por venta:</strong> no cobramos un porcentaje de los clientes nuevos. Si los clientes no llegan, ajustamos sin costo extra.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ ALCANCE ══════════ -->
  <section id="alcance" class="mt-20 pt-10 border-t border-slate-800/70 pb-16">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">05</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Alcance</h2>
      </div>
      <div class="md:col-span-9">
        <div class="border-l-2 border-slate-700 pl-6 mb-9">
          <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-400">
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Publicidad pagada en Google o redes</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Rediseño de las webs</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Fotografía de producto</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Manejo de redes sociales</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Tienda en línea o pasarela de pagos</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Alojamiento y dominios de las dos webs</div></div>
          </div>
        </div>

        <div class="border-l-2 border-marca-500 pl-6 mb-10">
          <h3 class="text-base font-semibold text-white mb-2">Si más adelante quieren sumar una tercera empresa</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Esta propuesta cubre Dikapsa y Doeco. Si después quieren incorporar otra de sus empresas, se cotiza en las mismas condiciones: mismo alcance mensual y el mismo criterio de valor por sumarla al grupo.</p>
        </div>

        <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 p-8 flex flex-wrap items-center justify-between gap-5">
          <div>
            <p class="text-lg font-semibold text-white">Cualquier duda, la conversamos.</p>
            <div class="flex items-center gap-3 mt-3">
              <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
              <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; agosto de 2026 &middot; vigencia 30 días</p>
            </div>
          </div>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20de%20SEO%20para%20Dikapsa%20y%20Doeco" target="_blank" rel="noopener" class="px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition whitespace-nowrap">Escribir por WhatsApp</a>
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
