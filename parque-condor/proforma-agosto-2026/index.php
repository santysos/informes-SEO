<?php
session_start();
if (empty($_SESSION['auth_condor'])) {
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
<title>Sitio web nuevo &mdash; Parque Cóndor</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{
    marca:{300:'#a7dcae',400:'#7cc98a',500:'#4f9d63',600:'#3a7a4c'},
    tierra:{300:'#e6c98a',400:'#d9a441',500:'#bd8a2c'}
  }
}}}
</script>
<style>
html{scroll-behavior:smooth}
body{background:radial-gradient(1200px 780px at 22% 0%, rgba(79,157,99,.16), transparent 62%), #0a1210;}
.glass{background:rgba(17,31,25,.5);backdrop-filter:blur(18px)}
section{scroll-margin-top:80px}
.anc{scroll-margin-top:80px}
.nav a.on{color:#fff;background:rgba(79,157,99,.22)}
.prosa{max-width:64ch}
.tabla-scroll{overflow-x:auto}
.eyebrow{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<nav class="nav sticky top-0 z-50 border-b border-emerald-900/50 backdrop-blur-xl bg-[#0a1210]/85">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#diagnostico" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-emerald-900/40 whitespace-nowrap transition">Diagnóstico</a>
      <a href="#web" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-emerald-900/40 whitespace-nowrap transition">La web nueva</a>
      <a href="#seo" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-emerald-900/40 whitespace-nowrap transition">Plan SEO</a>
      <a href="#renovacion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-emerald-900/40 whitespace-nowrap transition">Renovación</a>
      <a href="#plazos" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-emerald-900/40 whitespace-nowrap transition">Plazos</a>
      <a href="#contacto" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-emerald-900/40 whitespace-nowrap transition">Contacto</a>
    </div>
  </div>
</nav>

<div class="max-w-6xl mx-auto px-6">

  <!-- ══════════ PORTADA ══════════ -->
  <header class="pt-14 pb-10">
    <div class="flex items-start justify-between gap-6">
      <div>
        <p class="eyebrow text-marca-400 mb-3">Creative Web &middot; Propuesta</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-[1.08] tracking-tight">Sitio web nuevo<br>para Parque Cóndor</h1>
        <p class="text-slate-400 mt-4">Fundación Parque Cóndor &middot; agosto de 2026</p>
      </div>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
    </div>
  </header>

  <div class="grid md:grid-cols-3 gap-4 mb-4">
    <a href="#web" class="rounded-2xl border border-marca-500/40 bg-marca-500/10 p-6 hover:border-marca-500/70 transition">
      <p class="eyebrow text-marca-300 mb-3">Sitio web nuevo</p>
      <p class="text-3xl font-bold text-marca-300 mb-2">$580</p>
      <p class="text-sm text-slate-400">Pago único &middot; + IVA</p>
    </a>
    <a href="#renovacion" class="rounded-2xl border border-emerald-900/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Renovación anual</p>
      <p class="text-3xl font-bold text-white mb-2">$156,99</p>
      <p class="text-sm text-slate-400">Hosting y dominio, un año</p>
    </a>
    <a href="#seo" class="rounded-2xl border border-emerald-900/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Plan SEO &middot; opcional</p>
      <p class="text-3xl font-bold text-white mb-2">desde $600</p>
      <p class="text-sm text-slate-400">6 meses &middot; + IVA</p>
    </a>
  </div>
  <p class="text-xs text-slate-500 prosa">Valores sin IVA. El plan de posicionamiento es opcional y se contrata aparte del sitio.</p>

  <!-- ══════════ DIAGNÓSTICO ══════════ -->
  <section id="diagnostico" class="mt-20 pt-10 border-t border-emerald-900/50">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">01</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Dónde están hoy</h2>
          <p class="text-xs text-slate-500 mt-3">Sitio medido el 27 de agosto de 2026. Datos de Google Search Console de los últimos 12 meses.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-8">
          <div class="rounded-xl border border-emerald-900/50 glass p-4">
            <p class="text-3xl font-bold text-white">9.671</p>
            <p class="text-xs text-slate-500 mt-1">visitas desde Google</p>
          </div>
          <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-4">
            <p class="text-3xl font-bold text-white">443.817</p>
            <p class="text-xs text-marca-300 mt-1">veces que los mostró</p>
          </div>
          <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-4">
            <p class="text-3xl font-bold text-white">2,18 %</p>
            <p class="text-xs text-red-400 mt-1">de esas veces entran</p>
          </div>
          <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-4">
            <p class="text-3xl font-bold text-white">56</p>
            <p class="text-xs text-amber-400 mt-1">archivos en la portada</p>
          </div>
        </div>

        <div class="border-l-2 border-red-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">Google ya los muestra. La gente no entra.</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Casi <strong class="text-white">444 mil veces</strong> apareció el sitio en resultados de búsqueda en un año, y solo 2 de cada 100 personas lo abrieron. La portada sola acumula <strong class="text-white">120.997 apariciones en posición 7,9</strong>: está al final de la primera página, donde casi nadie llega. Ese es el margen más grande que tienen, y no depende de conseguir más turistas: depende de aprovechar los que ya los están buscando.</p>
        </div>

        <div class="border-l-2 border-marca-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">Las leyendas son su mayor imán</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">La página de la leyenda del Aya Huma trae <strong class="text-white">2.605 visitas y 92.284 apariciones</strong> ella sola: más que casi todo el resto del sitio junto. Es la prueba de que el contenido funciona para ustedes, y de que hay una audiencia interesada en la cultura andina que hoy llega y no encuentra nada más que leer.</p>
        </div>

        <div class="border-l-2 border-amber-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">Buscan boletos y horarios, y no hay dónde escribir</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa">«Boletos para parque cóndor» y «parque cóndor horarios» aparecen en primer lugar en Google y llevan a un sitio <strong class="text-white">sin un solo formulario de contacto</strong>. Quien quiere preguntar algo tiene que salir a buscar el WhatsApp por su cuenta. Hay intención de visita que hoy se pierde en el camino.</p>
        </div>

        <p class="text-sm font-semibold text-white mb-3">Lo técnico, medido</p>
        <ul class="space-y-2.5 text-sm text-slate-300">
          <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">56 archivos</strong> se cargan en la portada; cada uno es un pedido al servidor.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>Las <strong class="text-white">4 imágenes</strong> de la portada se descargan todas de golpe, aunque el visitante no llegue a verlas.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>Entrar por el dominio sin «www» agrega <strong class="text-white">1,4 segundos</strong> de desvío (2,21 s contra 0,80 s).</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>Todo el sitio tiene <strong class="text-white">8 secciones</strong> de contenido: muy poco para 64 páginas que ya reciben visitas.</div></li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ══════════ LA WEB NUEVA ══════════ -->
  <section id="web" class="mt-20 pt-10 border-t border-emerald-900/50">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">02</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">El sitio web nuevo</h2>
          <p class="text-3xl font-bold text-marca-300">$580</p>
          <p class="text-xs text-slate-500">+ IVA &middot; pago único</p>
        </div>
      </div>
      <div class="md:col-span-9">

        <div class="grid sm:grid-cols-2 gap-4 mb-8">
          <div class="rounded-2xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-sm font-semibold text-white mb-2">Las aves, una por una</p>
            <p class="text-sm text-slate-400 leading-relaxed">Una ficha por especie: foto, nombre común y científico, de dónde viene y su historia dentro del parque. Cada ficha es una página más que Google puede mostrar, y la razón por la que alguien decide venir.</p>
          </div>
          <div class="rounded-2xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-sm font-semibold text-white mb-2">Las leyendas, en serio</p>
            <p class="text-sm text-slate-400 leading-relaxed">Sección propia con índice, navegación entre leyendas y enlaces hacia la visita y cómo llegar. Hoy quien llega por el Aya Huma se va; ahí es donde se convierte en visitante.</p>
          </div>
          <div class="rounded-2xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-sm font-semibold text-white mb-2">La visita, clarísima</p>
            <p class="text-sm text-slate-400 leading-relaxed">Horarios, valores y qué se ve en el recorrido, visibles desde la cabecera en todas las páginas. Es lo que la gente busca y hoy tiene que rastrear.</p>
          </div>
          <div class="rounded-2xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-sm font-semibold text-white mb-2">Cómo llegar, con mapa</p>
            <p class="text-sm text-slate-400 leading-relaxed">Mapa interactivo, indicaciones desde Otavalo y botón para abrir la ruta en el celular. Esa página ya recibe 535 visitas al año: merece funcionar bien.</p>
          </div>
          <div class="rounded-2xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-sm font-semibold text-white mb-2">Formularios de contacto</p>
            <p class="text-sm text-slate-400 leading-relaxed">Uno general y uno para grupos e instituciones educativas, que llegan a su correo. Botón de WhatsApp fijo en todas las páginas, no solo en una.</p>
          </div>
          <div class="rounded-2xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-sm font-semibold text-white mb-2">La fundación, contada</p>
            <p class="text-sm text-slate-400 leading-relaxed">Espacio propio para el trabajo de rescate, conservación y educación, con la vía de contacto para quien quiera apoyar o colaborar.</p>
          </div>
        </div>

        <p class="text-sm font-semibold text-white mb-3">Y por debajo</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-2.5 text-sm text-slate-300 mb-8">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Diseño propio, no plantilla comprada</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Pensado primero para el celular</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Menos archivos y carga diferida de imágenes</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Resuelto el desvío del dominio sin «www»</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Galería de fotos y video</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Títulos y descripciones para Google, página por página</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Datos estructurados de atracción turística</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Se conservan las direcciones que ya posicionan</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Medición de visitas y de cada contacto recibido</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Panel para que ustedes actualicen sin llamarnos</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Migración del contenido actual</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Capacitación al equipo</div></div>
        </div>

        <div class="border-l-2 border-slate-700 pl-6">
          <h3 class="text-sm font-semibold text-white mb-2">Sobre el valor, con transparencia</h3>
          <p class="text-sm text-slate-400 leading-relaxed prosa">El sitio que tienen hoy lo hicimos nosotros en 2022 y costó <strong class="text-slate-300">$480</strong>. Este cuesta <strong class="text-white">$580</strong>: cuatro años después, con estructura de contenido nueva, fichas de aves, formularios, mapa y toda la preparación para Google que en 2022 no iba incluida.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ PLAN SEO ══════════ -->
  <section id="seo" class="mt-20 pt-10 border-t border-emerald-900/50">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">03 &middot; Opcional</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Plan de posicionamiento</h2>
          <p class="text-3xl font-bold text-white">desde $600</p>
          <p class="text-xs text-slate-500">+ IVA &middot; 6 meses</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">Ustedes ya tienen la prueba de que esto funciona: una sola leyenda les trajo 2.605 visitas. El plan hace eso mismo, todos los meses y a propósito. Se contrata aparte del sitio y puede empezar cuando quieran.</p>

        <div class="grid sm:grid-cols-2 gap-3 mb-6">
          <div class="rounded-xl border border-marca-500/40 bg-marca-500/10 p-5 flex flex-col">
            <p class="eyebrow text-marca-300 mb-3">Un solo pago</p>
            <p class="text-3xl font-bold text-marca-300">$600</p>
            <p class="text-xs text-slate-500 mb-3">+ IVA por los 6 meses</p>
            <p class="text-sm text-slate-400 mt-auto">Equivale a $100 al mes.</p>
          </div>
          <div class="rounded-xl border border-emerald-900/60 bg-emerald-950/30 p-5 flex flex-col">
            <p class="eyebrow text-slate-500 mb-3">Mes a mes</p>
            <p class="text-3xl font-bold text-white">$150</p>
            <p class="text-xs text-slate-500 mb-3">+ IVA al mes</p>
            <p class="text-sm text-slate-400 mt-auto">$900 en total: $300 más por la comodidad de pagar mensual.</p>
          </div>
        </div>

        <div class="grid sm:grid-cols-3 gap-x-6 gap-y-2.5 text-sm text-slate-300 mb-8">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div><strong class="text-white">20 artículos al mes</strong>, 120 en los 6 meses</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Medición instalada y revisada</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Reporte mensual de resultados</div></div>
        </div>

        <p class="text-sm font-semibold text-white mb-3">Lo que ya buscan, en sus propios números</p>
        <div class="tabla-scroll mb-5">
          <table class="w-full text-sm border-collapse min-w-[480px]">
            <thead>
              <tr class="border-b border-slate-700">
                <th class="text-left py-3 pr-3 text-white font-semibold">Lo que escriben en Google</th>
                <th class="text-right py-3 px-3 text-white font-semibold">Visitas al año</th>
                <th class="text-right py-3 pl-3 text-white font-semibold">Posición</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">parque condor</td><td class="py-2.5 px-3 text-right font-mono">1.161</td><td class="py-2.5 pl-3 text-right font-mono">2,3</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">aya huma</td><td class="py-2.5 px-3 text-right font-mono">738</td><td class="py-2.5 pl-3 text-right font-mono">2,1</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">parque del condor</td><td class="py-2.5 px-3 text-right font-mono">543</td><td class="py-2.5 pl-3 text-right font-mono">&mdash;</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">parque condor otavalo</td><td class="py-2.5 px-3 text-right font-mono">255</td><td class="py-2.5 pl-3 text-right font-mono">&mdash;</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">boletos para parque cóndor</td><td class="py-2.5 px-3 text-right font-mono">141</td><td class="py-2.5 pl-3 text-right font-mono">1,1</td></tr>
              <tr class="border-b border-slate-800/60"><td class="py-2.5 pr-3">leyenda del aya huma</td><td class="py-2.5 px-3 text-right font-mono">96</td><td class="py-2.5 pl-3 text-right font-mono">&mdash;</td></tr>
              <tr><td class="py-2.5 pr-3">parque condor horarios</td><td class="py-2.5 px-3 text-right font-mono">72</td><td class="py-2.5 pl-3 text-right font-mono">1,2</td></tr>
            </tbody>
          </table>
        </div>

        <div class="border-l-2 border-marca-500 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">Sobre qué escribimos: más leyendas y cultura andina, ficha por ficha de las aves del parque, y el turismo alrededor de Otavalo que hoy los está buscando sin encontrarlos. El objetivo es subir la portada de la posición 7,9 al grupo de arriba y multiplicar las páginas que reciben visitas, que hoy son 64.</p>
          <p class="text-sm text-slate-400 leading-relaxed prosa">No prometemos posiciones: nadie serio lo hace. Prometemos el trabajo, el reporte cada mes y que ustedes vean el movimiento en sus propios números.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ RENOVACIÓN ══════════ -->
  <section id="renovacion" class="mt-20 pt-10 border-t border-emerald-900/50">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">04</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Renovación anual</h2>
          <p class="text-xs text-slate-500 mt-3">Del 15 de octubre de 2026 al 15 de octubre de 2027.</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <div class="max-w-md mb-5">
          <div class="flex justify-between py-3 border-b border-slate-800/60 text-sm"><span class="text-slate-400">Alojamiento del sitio (hosting)</span><strong class="text-white">$135,00</strong></div>
          <div class="flex justify-between py-3 border-b border-slate-800/60 text-sm"><span class="text-slate-400">Dominio parquecondor.com</span><strong class="text-white">$21,99</strong></div>
          <div class="flex justify-between py-3 text-base"><span class="text-white font-semibold">Total del año</span><strong class="text-marca-300 text-xl">$156,99</strong></div>
        </div>
        <p class="text-sm text-slate-400 leading-relaxed prosa">Es el costo de mantener el sitio en línea, y se paga una vez al año exista o no un sitio nuevo. Valores sin IVA.</p>
      </div>
    </div>
  </section>

  <!-- ══════════ PLAZOS Y PAGO ══════════ -->
  <section id="plazos" class="mt-20 pt-10 border-t border-emerald-900/50">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">05</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Plazos y forma de pago</h2>
        </div>
      </div>
      <div class="md:col-span-9">
        <div class="grid sm:grid-cols-2 gap-3 mb-8">
          <div class="rounded-xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-xs text-slate-500 mb-1">Para empezar &middot; 60 %</p>
            <p class="text-2xl font-bold text-white">$348</p>
          </div>
          <div class="rounded-xl border border-emerald-900/60 bg-emerald-950/30 p-5">
            <p class="text-xs text-slate-500 mb-1">Al entregar en línea &middot; 40 %</p>
            <p class="text-2xl font-bold text-white">$232</p>
          </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 mb-8">
          <div>
            <p class="eyebrow text-slate-500 mb-3">4 semanas</p>
            <div class="space-y-1.5 text-sm">
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-16">Sem. 1</span><div class="text-slate-300">Estructura y diseño, para su revisión.</div></div>
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-16">Sem. 2</span><div class="text-slate-300">Desarrollo y migración del contenido actual.</div></div>
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-16">Sem. 3</span><div class="text-slate-300">Fichas de aves, leyendas, mapa y formularios.</div></div>
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-16">Sem. 4</span><div class="text-slate-300">Velocidad, medición, pruebas, capacitación y salida en vivo.</div></div>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed mt-4">El sitio actual sigue funcionando hasta que el nuevo esté probado.</p>
          </div>
          <div>
            <p class="eyebrow text-slate-500 mb-3">Qué necesitamos de ustedes</p>
            <ul class="space-y-2 text-sm text-slate-300">
              <li class="flex gap-3"><span class="text-marca-400">›</span><div>Horarios y valores de entrada vigentes.</div></li>
              <li class="flex gap-3"><span class="text-marca-400">›</span><div>Listado de las aves con sus fotos y su historia.</div></li>
              <li class="flex gap-3"><span class="text-marca-400">›</span><div>Fotos del parque y del recorrido.</div></li>
              <li class="flex gap-3"><span class="text-marca-400">›</span><div>Correo donde deben llegar los formularios.</div></li>
            </ul>
            <p class="text-sm text-slate-400 leading-relaxed mt-4">La semana 1 arranca cuando tengamos el anticipo y ese material.</p>
          </div>
        </div>

        <div class="border-l-2 border-slate-700 pl-6">
          <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-400">
            <div class="flex gap-2"><span class="text-slate-600">·</span><div><strong class="text-slate-300">Venta de entradas y reservas en línea</strong> <span class="text-xs">(no fue solicitado)</span></div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Fotografía y video profesional</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>El plan SEO, que se contrata aparte</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Publicidad pagada en Google o redes</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Manejo de redes sociales</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>La renovación anual de hosting y dominio</div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ CONTACTO ══════════ -->
  <section id="contacto" class="mt-20 pt-10 border-t border-emerald-900/50 pb-16">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">06</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Para conversarlo</h2>
      </div>
      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-8">Conocemos el sitio porque lo construimos nosotros en 2022, y sabemos qué se quedó corto. Si algo de esta propuesta les sirve a medias, dígannoslo: se ajusta antes de firmar.</p>

        <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 p-8 flex flex-wrap items-center justify-between gap-5">
          <div>
            <p class="text-lg font-semibold text-white">Cualquier duda, la conversamos.</p>
            <p class="text-xs text-slate-500 mt-2">Creative Web &middot; Otavalo, Ecuador &middot; agosto de 2026</p>
          </div>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vimos%20la%20propuesta%20del%20sitio%20web%20de%20Parque%20Condor" class="px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition whitespace-nowrap">Escribir por WhatsApp</a>
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
