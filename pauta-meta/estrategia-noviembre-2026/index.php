<?php
session_start();
if (empty($_SESSION['auth_pauta_nov2026'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="es-EC"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Informe de pauta en Meta · Jomar · Noviembre 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
*{font-family:'Inter',sans-serif} .font-display{font-family:'Outfit',sans-serif;letter-spacing:-.02em} .font-mono,.num{font-family:'JetBrains Mono',monospace}
body{background:#0b1016;background-image:radial-gradient(900px 600px at 85% -10%,rgba(59,130,246,.10),transparent 60%),radial-gradient(700px 500px at 0% 100%,rgba(52,211,153,.07),transparent 55%);color:#e5e7eb}
.card{background:rgba(255,255,255,.035);border:1px solid rgba(255,255,255,.08)}
.num{font-size:1.05rem;font-weight:600;color:#fff} .lbl{font-size:.7rem;color:#94a3b8;margin-top:2px;line-height:1.2}
html{scroll-behavior:smooth} section{scroll-margin-top:78px} .nav a.on{color:#fff;background:rgba(59,130,246,.18)}
@media (max-width:640px){.num{font-size:.9rem}}
</style></head>
<body>
<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0b1016]/85">
  <div class="max-w-5xl mx-auto px-5 flex items-center justify-between gap-4">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#resumen" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Resumen</a>
      <a href="#comparacion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Comparación</a>
      <a href="#monto" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Monto diario</a>
      <a href="#detalle" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Por publicación</a>
      <a href="#porque" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Por qué pasa</a>
      <a href="#recomendacion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Recomendación</a>
    </div>
    <a href="logout.php" class="text-xs text-slate-500 hover:text-white whitespace-nowrap">Salir</a>
  </div>
</nav>

<main class="max-w-5xl mx-auto px-5 pb-20">

<header class="pt-14 pb-10">
  <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-5">
  <p class="font-mono text-xs uppercase tracking-widest text-sky-400 mb-3">Jomar · Informe de pauta en Meta (Facebook e Instagram)</p>
  <h1 class="font-display text-3xl md:text-5xl font-bold text-white leading-tight mb-4">El problema no son los días:<br class="hidden md:block"> es cuánto se gasta por día</h1>
  <p class="text-slate-400 max-w-2xl">Análisis de las 16 publicaciones de Jomar pautadas entre septiembre y noviembre de 2026, comparadas con una referencia de pauta repartida en varios días. Datos de la cuenta publicitaria al 19 de noviembre de 2026.</p>
</header>

<section id="resumen" class="mb-16">
  <div class="grid md:grid-cols-3 gap-4 mb-6">
    <div class="card rounded-2xl p-6"><p class="text-xs text-slate-400 mb-2">Costo por 1.000 personas · $30-50 por día</p>
      <p class="font-display text-4xl font-bold" style="color:#f87171">$1,38</p></div>
    <div class="card rounded-2xl p-6"><p class="text-xs text-slate-400 mb-2">Costo por 1.000 personas · referencia, varios días a ~$1 diario</p>
      <p class="font-display text-4xl font-bold" style="color:#34d399">$0,50</p></div>
    <div class="card rounded-2xl p-6 border-sky-500/40"><p class="text-xs text-slate-400 mb-2">Diferencia</p>
      <p class="font-display text-4xl font-bold text-white">2,7 veces</p><p class="text-sm text-slate-400 mt-1">más caro llegar a cada persona gastando $30-50 por día</p></div>
  </div>
  <ul class="space-y-2 text-slate-300">
    <li>• <strong>Pasando los ~$12 por día, cada persona sale mucho más cara.</strong> Hasta $12 diarios, llegar a 1.000 personas costó entre $0,58 y $0,70; desde $14 diarios, entre $1,05 y $1,53.</li>
    <li>• <strong>Y el anuncio le llega más veces a la misma gente:</strong> cada persona lo vio 1,04 veces con $1 diario y 1,32 con $30-50 diarios.</li>
    <li>• <strong>La pauta de $14 diarios del 18-nov lo confirma:</strong> gastó el doble que la de $1 diario de «Imbabura es emprendedora», llegó casi a la misma gente (2.570 vs 2.217) y tuvo la mitad de reproducciones completas (407 vs 1.012).</li>
    <li>• <strong>Recomendación:</strong> no pasar de <strong>$3 a $5 diarios por publicación</strong> y, si hace falta más alcance, sumar días en vez de subir el monto.</li>
  </ul>
</section>

<section id="comparacion" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-2">La comparación</h2>
  <p class="text-slate-400 mb-6">Totales de cada forma de pautar. Todas son publicaciones con video, optimizadas para reproducciones. La <strong class="text-slate-300">referencia</strong> son 6 publicaciones de otra página de la región, pautadas a ~$1 diario por 6 días en septiembre de 2026, con el mismo tipo de anuncio.</p>
  <div class="card rounded-2xl p-5 overflow-x-auto mb-8">
    <table class="w-full text-sm min-w-[760px]">
      <thead class="text-slate-400 text-xs border-b border-slate-700/60"><tr>
        <th class="text-left py-2 pr-3 font-medium">Forma de pautar</th><th class="text-right px-2 font-medium">Gasto</th>
        <th class="text-right px-2 font-medium">Alcance</th><th class="text-right px-2 font-medium">Costo por 1.000 personas</th>
        <th class="text-right px-2 font-medium">Personas por $1</th><th class="text-right px-2 font-medium">Costo por 1.000 ThruPlays</th>
        <th class="text-right px-2 font-medium">Interacciones por $10</th><th class="text-right pl-2 font-medium">Veces que vio cada persona</th>
      </tr></thead>
      <tbody class="divide-y divide-slate-800"><tr>
  <td class="py-3 pr-3"><span class="inline-block w-2.5 h-2.5 rounded-full mr-2" style="background:#f87171"></span>1 día · $30 a $50<span class="block text-xs text-slate-500 ml-4">8 publicaciones</span></td>
  <td class="py-3 px-2 text-right font-mono">$259,02</td>
  <td class="py-3 px-2 text-right font-mono">187.812</td>
  <td class="py-3 px-2 text-right font-mono" style="color:#f87171">$1,38</td>
  <td class="py-3 px-2 text-right font-mono">725</td>
  <td class="py-3 px-2 text-right font-mono">$2,22</td>
  <td class="py-3 px-2 text-right font-mono">51</td>
  <td class="py-3 pl-2 text-right font-mono">1,32</td>
</tr><tr>
  <td class="py-3 pr-3"><span class="inline-block w-2.5 h-2.5 rounded-full mr-2" style="background:#fbbf24"></span>1 día · $12<span class="block text-xs text-slate-500 ml-4">5 publicaciones</span></td>
  <td class="py-3 px-2 text-right font-mono">$59,75</td>
  <td class="py-3 px-2 text-right font-mono">102.340</td>
  <td class="py-3 px-2 text-right font-mono" style="color:#fbbf24">$0,58</td>
  <td class="py-3 px-2 text-right font-mono">1.713</td>
  <td class="py-3 px-2 text-right font-mono">$1,62</td>
  <td class="py-3 px-2 text-right font-mono">173</td>
  <td class="py-3 pl-2 text-right font-mono">1,15</td>
</tr><tr>
  <td class="py-3 pr-3"><span class="inline-block w-2.5 h-2.5 rounded-full mr-2" style="background:#34d399"></span>Referencia · 6 días, ~$1 diario<span class="block text-xs text-slate-500 ml-4">6 publicaciones</span></td>
  <td class="py-3 px-2 text-right font-mono">$35,02</td>
  <td class="py-3 px-2 text-right font-mono">69.375</td>
  <td class="py-3 px-2 text-right font-mono" style="color:#34d399">$0,50</td>
  <td class="py-3 px-2 text-right font-mono">1.981</td>
  <td class="py-3 px-2 text-right font-mono">$1,27</td>
  <td class="py-3 px-2 text-right font-mono">174</td>
  <td class="py-3 pl-2 text-right font-mono">1,26</td>
</tr></tbody>
    </table>
  </div>
  <div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-4">Costo por 1.000 personas alcanzadas <span class="text-slate-500 font-normal text-sm">(menos es mejor)</span></p>
      <div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">1 día · $30 a $50</span><span class="font-mono text-white">$1,38</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:100.0%;background:#f87171"></div></div>
</div><div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">1 día · $12</span><span class="font-mono text-white">$0,58</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:42.3%;background:#fbbf24"></div></div>
</div><div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">Referencia · 6 días, ~$1 diario</span><span class="font-mono text-white">$0,50</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:36.6%;background:#34d399"></div></div>
</div></div>
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-4">Personas alcanzadas por cada $1 <span class="text-slate-500 font-normal text-sm">(más es mejor)</span></p>
      <div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">1 día · $30 a $50</span><span class="font-mono text-white">725</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:36.6%;background:#f87171"></div></div>
</div><div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">1 día · $12</span><span class="font-mono text-white">1.713</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:86.5%;background:#fbbf24"></div></div>
</div><div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">Referencia · 6 días, ~$1 diario</span><span class="font-mono text-white">1.981</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:100.0%;background:#34d399"></div></div>
</div></div>
  </div>
  <div class="card rounded-2xl p-6">
    <p class="font-display font-semibold text-white mb-3">En plata: lo que cuesta llegar a 25.000 personas</p>
    <div class="grid sm:grid-cols-3 gap-4">
      <div><p class="text-xs text-slate-400">1 día · $30 a $50</p><p class="font-display text-2xl font-bold" style="color:#f87171">$34,48</p></div><div><p class="text-xs text-slate-400">1 día · $12</p><p class="font-display text-2xl font-bold" style="color:#fbbf24">$14,60</p></div><div><p class="text-xs text-slate-400">Referencia · 6 días, ~$1 diario</p><p class="font-display text-2xl font-bold" style="color:#34d399">$12,62</p></div>
    </div>
  </div>
</section>

<section id="monto" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-2">Lo que cambia es el monto diario</h2>
  <p class="text-slate-400 mb-6">Una pauta de un día no es mala por sí misma: las de $12 en un día rindieron tan bien como las de $1 diario. El costo se dispara cuando el gasto diario pasa de ese nivel, y el anuncio empieza a repetirse a las mismas personas.</p>
  <div class="card rounded-2xl p-5 overflow-x-auto mb-8">
    <table class="w-full text-sm min-w-[560px]"><thead class="text-slate-400 text-xs border-b border-slate-700/60"><tr>
      <th class="text-left py-2 pr-3 font-medium">Gasto por día</th><th class="text-left px-2 font-medium">Pautas</th>
      <th class="text-right px-2 font-medium">Costo por 1.000 personas</th><th class="text-right pl-2 font-medium">Veces que vio cada persona</th>
    </tr></thead><tbody class="divide-y divide-slate-800"><tr><td class="py-2.5 pr-3 font-semibold text-white">$1 diario</td><td class="py-2.5 px-2 text-slate-400">Jomar · 2 pautas en curso</td>
<td class="py-2.5 px-2 text-right font-mono">$0,70</td><td class="py-2.5 pl-2 text-right font-mono">1,04</td></tr><tr><td class="py-2.5 pr-3 font-semibold text-white">$12 en 1 día</td><td class="py-2.5 px-2 text-slate-400">Jomar · 5 pautas</td>
<td class="py-2.5 px-2 text-right font-mono">$0,58</td><td class="py-2.5 pl-2 text-right font-mono">1,15</td></tr><tr><td class="py-2.5 pr-3 font-semibold text-white">$14 diarios</td><td class="py-2.5 px-2 text-slate-400">Jomar · pauta del 18-nov (captura)</td>
<td class="py-2.5 px-2 text-right font-mono">$1,05</td><td class="py-2.5 pl-2 text-right font-mono">—</td></tr><tr><td class="py-2.5 pr-3 font-semibold text-white">$30 en 1 día</td><td class="py-2.5 px-2 text-slate-400">Jomar · 7 pautas</td>
<td class="py-2.5 px-2 text-right font-mono">$1,35</td><td class="py-2.5 pl-2 text-right font-mono">1,33</td></tr><tr><td class="py-2.5 pr-3 font-semibold text-white">$50 en 1 día</td><td class="py-2.5 px-2 text-slate-400">Jomar · 1 pauta</td>
<td class="py-2.5 px-2 text-right font-mono">$1,53</td><td class="py-2.5 pl-2 text-right font-mono">1,24</td></tr></tbody></table>
  </div>
  <div class="card rounded-2xl p-6 border-red-500/30">
    <p class="font-display text-lg font-semibold text-white mb-1">El caso de la pauta de $14 diarios</p>
    <p class="text-sm text-slate-400 mb-5">Datos del Administrador de anuncios del 19-nov a las 6:51, las tres pautas a la misma hora.</p>
    <div class="grid md:grid-cols-3 gap-4"><div class="rounded-xl p-4" style="background:rgba(255,255,255,.03);border:1px solid #f8717155">
<p class="text-xs mb-1" style="color:#f87171">$14 diarios</p><p class="font-semibold text-white text-sm mb-3 leading-snug">Imbabura es un escenario pot…</p>
<div class="grid grid-cols-2 gap-2"><div><p class="num">2.829</p><p class="lbl">Reproducciones</p></div><div><p class="num">2.570</p><p class="lbl">Alcance</p></div>
<div><p class="num">407</p><p class="lbl">ThruPlays</p></div><div><p class="num">$2,71</p><p class="lbl">gastado</p></div></div>
<p class="font-mono text-xs mt-3" style="color:#f87171">$1,05 / 1.000 personas</p></div><div class="rounded-xl p-4" style="background:rgba(255,255,255,.03);border:1px solid #34d39955">
<p class="text-xs mb-1" style="color:#34d399">$1 diario</p><p class="font-semibold text-white text-sm mb-3 leading-snug">Imbabura es emprendedora</p>
<div class="grid grid-cols-2 gap-2"><div><p class="num">2.709</p><p class="lbl">Reproducciones</p></div><div><p class="num">2.217</p><p class="lbl">Alcance</p></div>
<div><p class="num">1.012</p><p class="lbl">ThruPlays</p></div><div><p class="num">$1,48</p><p class="lbl">gastado</p></div></div>
<p class="font-mono text-xs mt-3" style="color:#34d399">$0,67 / 1.000 personas</p></div><div class="rounded-xl p-4" style="background:rgba(255,255,255,.03);border:1px solid #34d39955">
<p class="text-xs mb-1" style="color:#34d399">$1 diario</p><p class="font-semibold text-white text-sm mb-3 leading-snug">Vamos a sanar los ríos de Imbabura</p>
<div class="grid grid-cols-2 gap-2"><div><p class="num">1.828</p><p class="lbl">Reproducciones</p></div><div><p class="num">1.679</p><p class="lbl">Alcance</p></div>
<div><p class="num">505</p><p class="lbl">ThruPlays</p></div><div><p class="num">$1,29</p><p class="lbl">gastado</p></div></div>
<p class="font-mono text-xs mt-3" style="color:#34d399">$0,77 / 1.000 personas</p></div></div>
    <ul class="mt-5 space-y-1 text-sm text-slate-300">
      <li>• Gastó <strong>1,8 veces</strong> lo de «Emprendedora» y llegó a solo <strong>16 % más personas</strong>.</li>
      <li>• Cada reproducción completa le costó <strong>$6,66</strong> por cada 1.000, contra <strong>$1,46</strong> de «Emprendedora»: <strong>4,6 veces más</strong>.</li>
      <li>• Más presupuesto no trajo más alcance: trajo más costo.</li>
    </ul>
  </div>
</section>

<section id="detalle" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-6">Publicación por publicación</h2>
  <h3 class="font-display text-lg font-semibold mb-3" style="color:#f87171">1 día · $30 a $50</h3>
  <div class="grid md:grid-cols-2 gap-4 mb-10">
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>12 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,53 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Imbabura debe ser sede de ferias internacionales</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">39.503</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">32.765</p><p class="lbl">Alcance</p></div>
    <div><p class="num">17.456</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$49,98</p><p class="lbl">$49,98 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>9 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,09 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">La Cacería del Zorro es hoy un referente ecuestre</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">36.917</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">27.519</p><p class="lbl">Alcance</p></div>
    <div><p class="num">17.522</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$29,99</p><p class="lbl">$29,99 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>10 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,24 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">La belleza de nuestras tradiciones</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">28.999</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">24.157</p><p class="lbl">Alcance</p></div>
    <div><p class="num">13.097</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$29,91</p><p class="lbl">$29,91 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>8 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,24 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Imbabura ha esperado demasiado por la vía a los…</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">32.958</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">24.121</p><p class="lbl">Alcance</p></div>
    <div><p class="num">15.528</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$30,00</p><p class="lbl">$30,00 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>30 oct · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,32 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Andamos buscando la guagua de pan más rica de Ibarra</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">26.789</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">22.719</p><p class="lbl">Alcance</p></div>
    <div><p class="num">10.943</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$29,98</p><p class="lbl">$29,98 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>3 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,43 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">San Antonio de Ibarra</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">29.923</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">20.818</p><p class="lbl">Alcance</p></div>
    <div><p class="num">16.024</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$29,68</p><p class="lbl">$29,68 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>5 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,63 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">El profe Nelson sabe</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">23.056</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">18.065</p><p class="lbl">Alcance</p></div>
    <div><p class="num">13.520</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$29,48</p><p class="lbl">$29,48 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#f87171"></span>8 nov · 1 día</span>
    <span class="font-mono" style="color:#f87171">$1,70 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Imbabura ha esperado demasiado por sus vías</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">21.380</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">17.648</p><p class="lbl">Alcance</p></div>
    <div><p class="num">12.364</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$30,00</p><p class="lbl">$30,00 por día</p></div>
  </div>
</div></div>
  <h3 class="font-display text-lg font-semibold mb-3" style="color:#fbbf24">1 día · $12</h3>
  <div class="grid md:grid-cols-2 gap-4 mb-10">
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#fbbf24"></span>3 oct · 1 día</span>
    <span class="font-mono" style="color:#fbbf24">$0,54 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Se viene la alegría a #Imbabura</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">25.020</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">22.213</p><p class="lbl">Alcance</p></div>
    <div><p class="num">7.052</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$11,93</p><p class="lbl">$11,93 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#fbbf24"></span>14 sep · 1 día</span>
    <span class="font-mono" style="color:#fbbf24">$0,57 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Cañitas para el viaje</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">23.168</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">21.116</p><p class="lbl">Alcance</p></div>
    <div><p class="num">8.271</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$12,00</p><p class="lbl">$12,00 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#fbbf24"></span>19 sep · 1 día</span>
    <span class="font-mono" style="color:#fbbf24">$0,60 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">El imbabureño cuando escucha bomba…</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">22.083</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">19.962</p><p class="lbl">Alcance</p></div>
    <div><p class="num">7.373</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$11,95</p><p class="lbl">$11,95 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#fbbf24"></span>23 sep · 1 día</span>
    <span class="font-mono" style="color:#fbbf24">$0,60 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">#Imbabura está repleta de lugares y sabores</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">20.796</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">19.872</p><p class="lbl">Alcance</p></div>
    <div><p class="num">7.991</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$12,00</p><p class="lbl">$12,00 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#fbbf24"></span>26 sep · 1 día</span>
    <span class="font-mono" style="color:#fbbf24">$0,62 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">#Imbabura no solo es potencia turística</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">20.282</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">19.177</p><p class="lbl">Alcance</p></div>
    <div><p class="num">6.236</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$11,87</p><p class="lbl">$11,87 por día</p></div>
  </div>
</div></div>
  <h3 class="font-display text-lg font-semibold mb-1" style="color:#34d399">Varios días · $1 diario <span class="text-sm font-normal text-slate-500">(en curso, llevan 2 días)</span></h3>
  <p class="text-sm text-slate-400 mb-3">Las primeras pautas de Jomar con el gasto repartido. Ya muestran un costo por persona más bajo que cualquiera de las de 1 día.</p>
  <div class="grid md:grid-cols-2 gap-4">
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#34d399"></span>desde 17 nov · 2 días</span>
    <span class="font-mono" style="color:#34d399">$0,65 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Imbabura es emprendedora</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">2.502</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">2.462</p><p class="lbl">Alcance</p></div>
    <div><p class="num">1.119</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$1,60</p><p class="lbl">$0,80 por día</p></div>
  </div>
</div>
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:#34d399"></span>desde 17 nov · 2 días</span>
    <span class="font-mono" style="color:#34d399">$0,76 / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">Vamos a sanar los ríos de Imbabura</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">1.820</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">1.791</p><p class="lbl">Alcance</p></div>
    <div><p class="num">535</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">$1,37</p><p class="lbl">$0,69 por día</p></div>
  </div>
</div></div>
</section>

<section id="porque" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-6">Por qué pasa</h2>
  <div class="grid md:grid-cols-3 gap-4">
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-2">Meta cobra más por apurarse</p>
      <p class="text-sm text-slate-400">Para gastar $30 o $50 en 24 horas, el anuncio tiene que ganarle espacio a muchos otros anunciantes a la vez. Eso sube el precio de cada vista.</p></div>
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-2">Repite el anuncio a la misma gente</p>
      <p class="text-sm text-slate-400">Con $30-50 en un día, cada persona vio el anuncio 1,32 veces en promedio. En las pautas repartidas de Jomar, 1,04. Cada repetición se paga, y no suma gente nueva.</p></div>
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-2">No da tiempo a aprender</p>
      <p class="text-sm text-slate-400">En los primeros días Meta prueba a quién mostrar el anuncio. Con varios días encuentra el público que más lo mira; en uno solo, se acaba antes de aprender.</p></div>
  </div>
  <p class="text-xs text-slate-500 mt-5">Nota: la referencia es otra página, con otro público y otros videos, y eso también influye. Las dos pautas repartidas de Jomar que están corriendo confirman la tendencia con datos propios. La diferencia de costo es consistente en todo el grupo: ninguna pauta de $30-50 en un día bajó de $1,09 por 1.000 personas, y ninguna de la referencia pasó de $0,61.</p>
</section>

<section id="recomendacion" class="mb-10">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-6">Recomendación</h2>
  <div class="card rounded-2xl p-6 md:p-8 border-emerald-500/30 mb-6">
    <p class="text-sm text-emerald-300 font-mono uppercase tracking-wider mb-2">Nueva forma de pautar</p>
    <p class="font-display text-2xl md:text-3xl font-bold text-white mb-4">Máximo $3 a $5 diarios por publicación, durante 5 a 7 días</p>
    <ul class="grid md:grid-cols-2 gap-x-8 gap-y-2 text-slate-300 text-sm">
      <li>✓ El tope diario manda: para más alcance se suman días, no dólares por día</li>
      <li>✓ Mismo dinero: $30 se reparte en 6-10 días en vez de 1</li>
      <li>✓ Siempre con fecha de cierre, para que no siga cobrando</li>
      <li>✓ Máximo 7 días: después la gente ya vio el anuncio</li>
      <li>✓ Las fechas puntuales (eventos, anuncios del día) se pautan con 2-3 días de anticipación</li>
      <li>✓ Una publicación nueva entra cuando la anterior está por terminar</li>
      <li>✓ Se revisa el costo por 1.000 personas a los 3 días y se ajusta</li>
    </ul>
  </div>
  <div class="card rounded-2xl p-6">
    <p class="font-display font-semibold text-white mb-3">Cómo se ve con $30</p>
    <div class="grid sm:grid-cols-2 gap-4 text-sm">
      <div class="rounded-xl bg-red-500/5 border border-red-500/20 p-4"><p class="text-red-300 font-semibold mb-1">Antes</p><p class="text-slate-300">$30 en 1 día · ~21.753 personas</p></div>
      <div class="rounded-xl bg-emerald-500/5 border border-emerald-500/20 p-4"><p class="text-emerald-300 font-semibold mb-1">Ahora</p><p class="text-slate-300">$5 diarios × 6 días · se estima entre 51.384 y 59.430 personas según lo que rindió la pauta de $12 de Jomar y la referencia</p></div>
    </div>
  </div>
</section>

<footer class="border-t border-slate-800 pt-6 mt-16">
  <p class="text-xs text-slate-500">Fuente: Administrador de anuncios de Meta, datos al 19 de noviembre de 2026. ThruPlay = reproducción del video completo o de al menos 15 segundos.</p>
  <div class="flex items-center gap-3 mt-3">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
    <p class="text-xs text-slate-500">Otavalo, Ecuador · noviembre de 2026</p>
  </div>
</footer>
</main>
<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a[href^="#"]')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{const v=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
if(!v)return;const a=links.get(v.target.id);if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');}},{rootMargin:'-78px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>
</body></html>
