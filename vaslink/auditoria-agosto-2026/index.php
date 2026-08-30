<?php
session_start();
if (empty($_SESSION['auth_vaslink_audit'])) {
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
<title>Auditoría técnica de vaslinkec.com &mdash; Vaslink</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{marca:{300:'#93c5fd',400:'#60a5fa',500:'#3b82f6',600:'#2563eb'}}
}}}
</script>
<style>
html{scroll-behavior:smooth}
body{background:radial-gradient(1200px 780px at 22% 0%, rgba(59,130,246,.13), transparent 62%), #0a0f16;}
.glass{background:rgba(17,26,36,.5);backdrop-filter:blur(18px)}
section{scroll-margin-top:80px}
.anc{scroll-margin-top:80px}
.nav a.on{color:#fff;background:rgba(59,130,246,.18)}
.prosa{max-width:64ch}
.tabla-scroll{overflow-x:auto}
.eyebrow{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0a0f16]/85">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#buscador" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Buscador</a>
      <a href="#peso" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Peso</a>
      <a href="#tiempos" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Tiempos</a>
      <a href="#instalado" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Instalado</a>
      <a href="#servidor" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Servidor</a>
      <a href="#decision" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">La decisión</a>
      <a href="#pendiente" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Por confirmar</a>
    </div>
  </div>
</nav>

<div class="max-w-6xl mx-auto px-6">

  <!-- ══════════ PORTADA ══════════ -->
  <header class="pt-14 pb-10">
    <div class="flex items-start justify-between gap-6">
      <div>
        <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-5">
        <p class="eyebrow text-marca-400 mb-3">Informe</p>
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-[1.08] tracking-tight">Auditoría técnica<br>de vaslinkec.com</h1>
        <p class="text-slate-400 mt-4">Vaslink &middot; 30 de agosto de 2026</p>
      </div>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
    </div>
  </header>

  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <a href="#tiempos" class="rounded-2xl border border-amber-500/30 bg-amber-500/5 p-6 hover:border-amber-500/60 transition">
      <p class="text-3xl font-bold text-white mb-2">56<span class="text-lg text-slate-500">/100</span></p>
      <p class="text-sm text-amber-400">puntaje en celular</p>
    </a>
    <a href="#tiempos" class="rounded-2xl border border-amber-500/30 bg-amber-500/5 p-6 hover:border-amber-500/60 transition">
      <p class="text-3xl font-bold text-white mb-2">12,0 s</p>
      <p class="text-sm text-amber-400">en aparecer el contenido</p>
    </a>
    <a href="#peso" class="rounded-2xl border border-amber-500/30 bg-amber-500/5 p-6 hover:border-amber-500/60 transition">
      <p class="text-3xl font-bold text-white mb-2">31,8 MB</p>
      <p class="text-sm text-amber-400">pesa la portada</p>
    </a>
    <a href="#buscador" class="rounded-2xl border border-red-500/40 bg-red-500/10 p-6 hover:border-red-500/70 transition">
      <p class="text-3xl font-bold text-white mb-2">Caído</p>
      <p class="text-sm text-red-400">el buscador de productos</p>
    </a>
  </div>
  <p class="text-xs text-slate-500 prosa">Todo lo de este informe fue medido sobre vaslinkec.com el 30 de agosto de 2026, desde afuera: como lo ve cualquier visitante, sin acceso al panel de administración.</p>

  <!-- ══════════ BUSCADOR ══════════ -->
  <section id="buscador" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-red-400 mb-2">01 &middot; Crítico</p>
          <h2 class="text-2xl font-bold text-white leading-tight">La búsqueda de productos está caída</h2>
          <p class="text-xs text-slate-500 mt-3">Es lo más urgente del informe y por eso abre.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="border-l-2 border-red-500 pl-6 mb-8">
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">No es que la búsqueda sea lenta. <strong class="text-white">Falla.</strong> Quien escribe en la caja de búsqueda del sitio no recibe productos: recibe la pantalla de WordPress que dice <strong class="text-red-400">«Ha habido un error crítico en esta web»</strong>.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Nada más. Ni resultados, ni sugerencias, ni un camino de vuelta al catálogo.</p>
        </div>

        <p class="text-sm text-slate-300 leading-relaxed prosa mb-5">Se probaron seis términos &mdash;<span class="text-white">laptop, mouse, disco duro, impresora, teclado y memoria</span>&mdash;. Los seis fallan, y siempre igual: unos <strong class="text-white">4 segundos</strong> de espera y una respuesta de <strong class="text-white">182 bytes</strong>, el tamaño de una página de error, no el de un listado de productos.</p>

        <div class="tabla-scroll mb-6">
          <table class="w-full text-sm border-collapse min-w-[520px]">
            <thead>
              <tr class="border-b border-slate-700">
                <th class="text-left py-3 pr-3 text-white font-semibold">Prueba</th>
                <th class="text-left py-3 px-3 text-white font-semibold">Respuesta</th>
                <th class="text-left py-3 pl-3 text-white font-semibold">Resultado</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Búsqueda de productos<br><span class="text-xs">(la de la caja del sitio)</span></td>
                <td class="py-3 px-3">~4 s &middot; 182 bytes</td>
                <td class="py-3 pl-3 text-red-400">Error crítico</td>
              </tr>
              <tr>
                <td class="py-3 pr-3 text-slate-500">Búsqueda general de WordPress<br><span class="text-xs">(sin filtrar por producto)</span></td>
                <td class="py-3 px-3">1,7 s &middot; 247 KB</td>
                <td class="py-3 pl-3 text-emerald-400">Funciona</td>
              </tr>
            </tbody>
          </table>
        </div>

        <ul class="space-y-2.5 text-sm text-slate-300 mb-6">
          <li class="flex gap-3"><span class="text-red-400">›</span><div>El fallo es <strong class="text-white">específico de las búsquedas de productos</strong>, que es exactamente lo que envía la caja de búsqueda de la tienda. La búsqueda general del sitio responde bien.</div></li>
          <li class="flex gap-3"><span class="text-red-400">›</span><div>Con <strong class="text-white">2.109 productos en 48 categorías</strong>, buscar es la forma principal de encontrar algo. Nadie recorre 48 categorías a mano, y quien usa el buscador es justamente el que ya sabe qué quiere comprar.</div></li>
        </ul>

        <div class="border-l-2 border-marca-500 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-white">Esto se arregla ya</strong>, sin esperar a ninguna otra decisión de este informe. Se rehaga o no el sitio, el buscador no puede seguir devolviendo un error.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ PESO ══════════ -->
  <section id="peso" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">02</p>
          <h2 class="text-2xl font-bold text-white leading-tight">El peso de la portada</h2>
          <p class="text-xs text-slate-500 mt-3">181 peticiones al servidor para armar una sola pantalla.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="grid grid-cols-3 gap-3 mb-8">
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-3xl font-bold text-white">31,8 MB</p>
            <p class="text-xs text-slate-500 mt-1">pesa la portada</p>
          </div>
          <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-4">
            <p class="text-3xl font-bold text-white">30,5 MB</p>
            <p class="text-xs text-red-400 mt-1">son solo imágenes</p>
          </div>
          <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-4">
            <p class="text-3xl font-bold text-white">96 %</p>
            <p class="text-xs text-red-400 mt-1">del peso total</p>
          </div>
        </div>

        <div class="tabla-scroll mb-7">
          <table class="w-full text-sm border-collapse min-w-[480px]">
            <thead>
              <tr class="border-b border-slate-700">
                <th class="text-left py-3 pr-3 text-white font-semibold">Tipo de archivo</th>
                <th class="text-right py-3 px-3 text-white font-semibold">Cantidad</th>
                <th class="text-right py-3 pl-3 text-white font-semibold">Peso</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60 bg-red-500/5">
                <td class="py-3 pr-3 text-white font-semibold">Imágenes</td>
                <td class="py-3 px-3 text-right">99</td>
                <td class="py-3 pl-3 text-right text-red-400 font-semibold">30,50 MB</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Scripts</td>
                <td class="py-3 px-3 text-right">48</td>
                <td class="py-3 pl-3 text-right">0,60 MB</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Fuentes tipográficas</td>
                <td class="py-3 px-3 text-right">5</td>
                <td class="py-3 pl-3 text-right">0,36 MB</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Hojas de estilo</td>
                <td class="py-3 px-3 text-right">23</td>
                <td class="py-3 pl-3 text-right">0,23 MB</td>
              </tr>
              <tr>
                <td class="py-3 pr-3 text-slate-500">Documento HTML</td>
                <td class="py-3 px-3 text-right">1</td>
                <td class="py-3 pl-3 text-right">0,05 MB</td>
              </tr>
            </tbody>
          </table>
        </div>

        <p class="text-sm font-semibold text-white mb-3">De dónde salen esos 30,5 MB</p>
        <ul class="space-y-2.5 text-sm text-slate-300 mb-6">
          <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">16 imágenes pesan más de 1 MB cada una.</strong> La más pesada, <span class="font-mono text-xs text-slate-400">ANGOCHAGUA.png</span>, pesa 1,81 MB &mdash; ella sola, casi tanto como todos los scripts, estilos y fuentes juntos.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">77 archivos PNG distintos</strong> en la portada. Ninguno está en WebP, el formato liviano que hoy entienden todos los navegadores.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">34 imágenes se entregan en su tamaño original</strong> en vez de una miniatura: fotos de 1080&times;1080 px guardadas como PNG, con nombres de cantones &mdash;Angochagua, Ibarra, Cotacachi, Urcuquí, Carchi, Cayambe, La Esperanza, San Isidro, Mira&mdash;.</div></li>
        </ul>

        <div class="border-l-2 border-amber-500 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa">El visitante descarga una foto grande para verla del tamaño de una estampilla. Es el gasto más evitable de todo el informe: <strong class="text-white">las imágenes no son un problema de programación, son un problema de preparación de archivos.</strong></p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ TIEMPOS ══════════ -->
  <section id="tiempos" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">03</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Los tiempos medidos</h2>
          <p class="text-xs text-slate-500 mt-3">Lighthouse, la herramienta de medición de Google, el 30 de agosto de 2026.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="tabla-scroll mb-6">
          <table class="w-full text-sm border-collapse min-w-[520px]">
            <thead>
              <tr class="border-b border-slate-700">
                <th class="text-left py-3 pr-3"></th>
                <th class="text-right py-3 px-3 text-white font-semibold">Celular</th>
                <th class="text-right py-3 pl-3 text-white font-semibold">Escritorio</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Puntaje general</td>
                <td class="py-3 px-3 text-right text-amber-400 font-semibold">56/100</td>
                <td class="py-3 pl-3 text-right text-amber-400 font-semibold">62/100</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Aparece lo primero</td>
                <td class="py-3 px-3 text-right">4,7 s</td>
                <td class="py-3 pl-3 text-right">2,0 s</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Aparece el contenido principal</td>
                <td class="py-3 px-3 text-right text-red-400 font-semibold">12,0 s</td>
                <td class="py-3 pl-3 text-right">3,9 s</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">La página queda usable</td>
                <td class="py-3 px-3 text-right text-red-400 font-semibold">30,9 s</td>
                <td class="py-3 pl-3 text-right">3,9 s</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Índice de velocidad</td>
                <td class="py-3 px-3 text-right">14,1 s</td>
                <td class="py-3 pl-3 text-right">8,3 s</td>
              </tr>
              <tr>
                <td class="py-3 pr-3 text-slate-500">Peso transferido</td>
                <td class="py-3 px-3 text-right">12,5 MB</td>
                <td class="py-3 pl-3 text-right text-red-400 font-semibold">31,8 MB</td>
              </tr>
            </tbody>
          </table>
        </div>

        <ul class="space-y-2.5 text-sm text-slate-300 mb-8">
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>En celular pasan <strong class="text-white">12 segundos</strong> hasta que se ve el contenido principal, y <strong class="text-white">casi medio minuto</strong> hasta que la página responde bien a un toque.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>En escritorio el peso es mayor &mdash;se cargan las imágenes a tamaño completo&mdash;, pero la prueba simula una conexión más rápida y por eso los tiempos son mejores. <strong class="text-white">En celular ese peso sí se paga.</strong></div></li>
        </ul>

        <p class="text-sm font-semibold text-white mb-3">Cuánto tarda el servidor en responder, por tipo de página</p>
        <div class="tabla-scroll mb-6">
          <table class="w-full text-sm border-collapse min-w-[520px]">
            <thead>
              <tr class="border-b border-slate-700">
                <th class="text-left py-3 pr-3 text-white font-semibold">Página</th>
                <th class="text-right py-3 px-3 text-white font-semibold">Primera respuesta</th>
                <th class="text-right py-3 pl-3 text-white font-semibold">Descarga completa</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Portada</td>
                <td class="py-3 px-3 text-right">0,83 s</td>
                <td class="py-3 pl-3 text-right">1,62 s</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Tienda</td>
                <td class="py-3 px-3 text-right">0,81 s</td>
                <td class="py-3 pl-3 text-right">1,49 s</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Ficha de producto</td>
                <td class="py-3 px-3 text-right">0,83 s</td>
                <td class="py-3 pl-3 text-right">1,61 s</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Carrito</td>
                <td class="py-3 px-3 text-right">0,88 s</td>
                <td class="py-3 pl-3 text-right">1,72 s</td>
              </tr>
              <tr>
                <td class="py-3 pr-3 text-slate-500">Portada entrando por «www»</td>
                <td class="py-3 px-3 text-right text-amber-400">1,44 s</td>
                <td class="py-3 pl-3 text-right text-slate-600">&mdash;</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="border-l-2 border-emerald-500 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-white">El servidor responde bien: menos de un segundo en todas las páginas.</strong> El problema no está en dónde está alojado el sitio, está en la cantidad de cosas que se le pide cargar. Una ficha de producto, por ejemplo, arrastra 69 archivos de programación y estilos y 78 imágenes, ninguna en formato liviano.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ INSTALADO ══════════ -->
  <section id="instalado" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">04</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Qué está instalado</h2>
          <p class="text-xs text-slate-500 mt-3">Detectado por dos vías independientes &mdash;nuestra lectura del código del sitio y una herramienta externa de detección&mdash;, con resultados coincidentes.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="border-l-2 border-amber-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">Se cargan dos constructores, pero cada uno hace algo distinto</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-4">Un constructor es la herramienta con la que se arman visualmente las páginas. El sitio tiene dos instalados y ambos viajan en cada visita, pero el reparto del trabajo es muy desigual:</p>
          <div class="grid sm:grid-cols-2 gap-3 mb-5">
            <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-4">
              <p class="text-xs text-slate-500 mb-1">WPBakery &middot; lo trae el tema</p>
              <p class="text-2xl font-bold text-white">Solo la cabecera</p>
              <p class="text-xs text-slate-500 mt-1">178 bloques arriba &middot; 0 en el contenido &middot; 0 en el pie</p>
            </div>
            <div class="rounded-xl border border-marca-500/40 bg-marca-500/10 p-4">
              <p class="text-xs text-slate-500 mb-1">Elementor 3.35.3</p>
              <p class="text-2xl font-bold text-white">El contenido</p>
              <p class="text-xs text-slate-500 mt-1">entre 9 y 22 widgets por página</p>
            </div>
          </div>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-4">Revisamos 20 páginas. En todas hay exactamente los mismos 178 bloques de WPBakery, incluso en las de políticas de privacidad y garantía, que no tienen diseño ninguno. Ese número idéntico es la prueba: <strong class="text-white">no es contenido de página, es la cabecera del tema Electro repitiéndose igual en todo el sitio.</strong> El contenido &mdash;cambio de teclado, reballing de procesadores, mantenimiento de impresoras, quiénes somos, formas de pago&mdash; está hecho en Elementor, y no quedó ni un solo bloque de WPBakery a medio convertir.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa">El problema sigue siendo real, pero la causa es otra: <strong class="text-white">nadie construyó con los dos. El tema obliga a cargar WPBakery aunque el contenido no lo use.</strong></p>
        </div>

        <div class="border-l-2 border-red-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">Más de la mitad de cada página es cabecera</h3>
          <div class="grid sm:grid-cols-2 gap-3 mb-4">
            <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-4">
              <p class="text-3xl font-bold text-white">56 %</p>
              <p class="text-xs text-red-400 mt-1">del código de la página, antes de la primera línea de contenido</p>
            </div>
            <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-4">
              <p class="text-3xl font-bold text-white">125.799</p>
              <p class="text-xs text-slate-500 mt-1">bytes de cabecera, sobre 223.901 del código de la página sin comprimir</p>
            </div>
          </div>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Es el mega menú de Electro, que escribe las <strong class="text-white">48 categorías completas dentro de cada página</strong> del sitio. Se descarga entero en cada visita, esté o no desplegado, y hay que atravesarlo antes de llegar a lo que la persona vino a leer.</p>
        </div>

        <div class="tabla-scroll mb-6">
          <table class="w-full text-sm border-collapse min-w-[520px]">
            <thead>
              <tr class="border-b border-slate-700">
                <th class="text-left py-3 pr-3 text-white font-semibold">Componente</th>
                <th class="text-left py-3 pl-3 text-white font-semibold">Detalle</th>
              </tr>
            </thead>
            <tbody class="text-slate-300">
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Gestor de contenidos</td>
                <td class="py-3 pl-3">WordPress 7.1</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Tienda</td>
                <td class="py-3 pl-3">WooCommerce 10.5.0 &middot; 2.109 productos en 48 categorías</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Tema</td>
                <td class="py-3 pl-3">Electro 3.6.5, de MadrasThemes <span class="text-xs text-amber-400">(tema de pago, vendido en ThemeForest)</span></td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Constructores</td>
                <td class="py-3 pl-3">Elementor 3.35.3 <span class="text-xs text-slate-500">(el contenido)</span> y WPBakery <span class="text-xs text-amber-400">(de pago, solo la cabecera del tema)</span></td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Carruseles</td>
                <td class="py-3 pl-3">Slider Revolution &mdash; 53 referencias en la portada</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Pagos</td>
                <td class="py-3 pl-3">PayPhone</td>
              </tr>
              <tr class="border-b border-slate-800/60">
                <td class="py-3 pr-3 text-slate-500">Complementos de tienda</td>
                <td class="py-3 pl-3">YITH Wishlist &middot; YITH Compare &middot; módulo de punto de venta</td>
              </tr>
              <tr>
                <td class="py-3 pr-3 text-slate-500">Otros</td>
                <td class="py-3 pl-3">CookieAdmin y CookieAdmin Pro &middot; Jetpack</td>
              </tr>
            </tbody>
          </table>
        </div>

        <ul class="space-y-2.5 text-sm text-slate-300">
          <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">El tema Electro y WPBakery son productos con licencia de pago.</strong> Mientras el sitio dependa de ellos hay que sostener esas licencias al día para seguir recibiendo actualizaciones y correcciones de seguridad. La última versión publicada por el autor del tema es del 5 de junio de 2026.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>Aparecen instalados <strong class="text-white">CookieAdmin y CookieAdmin Pro</strong>, que cumplen la misma función. Vale revisar si los dos hacen falta.</div></li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ══════════ SERVIDOR ══════════ -->
  <section id="servidor" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">05</p>
          <h2 class="text-2xl font-bold text-white leading-tight">Servidor y caché</h2>
          <p class="text-xs text-slate-500 mt-3">Acá hay cosas bien hechas y conviene decirlo.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="grid sm:grid-cols-2 gap-3 mb-7">
          <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-5">
            <p class="eyebrow text-emerald-400 mb-3">Lo que está bien</p>
            <ul class="space-y-2 text-sm text-slate-300">
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Servidor LiteSpeed con HTTP/2, rápido y moderno</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Compresión activa: la portada viaja de 291 KB a 55 KB</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>El navegador guarda los archivos fijos 7 días, así que quien vuelve no los descarga otra vez</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Responde en menos de un segundo en todas las páginas probadas</div></li>
            </ul>
          </div>
          <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-5">
            <p class="eyebrow text-amber-400 mb-3">Lo que falta</p>
            <ul class="space-y-2 text-sm text-slate-300">
              <li class="flex gap-2"><span class="text-amber-400">›</span><div>No hay caché de página: <strong class="text-white">cada visita vuelve a armar la página desde cero</strong>, ejecutando programación y consultando la base de datos</div></li>
              <li class="flex gap-2"><span class="text-amber-400">›</span><div>Entrar por «www» agrega un salto de redirección: 1,44 s contra 0,83 s del dominio sin «www», que es el oficial</div></li>
            </ul>
          </div>
        </div>

        <div class="border-l-2 border-slate-700 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa">El servidor tiene activado lo que hay que tener activado, salvo lo principal: guardar la página ya armada para no volver a construirla en cada visita. Es de las mejoras más rápidas de aplicar y de las que más alivian a un sitio con este catálogo.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ LA DECISIÓN ══════════ -->
  <section id="decision" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">06</p>
          <h2 class="text-2xl font-bold text-white leading-tight">¿Arreglar la actual o hacer una nueva?</h2>
          <p class="text-xs text-slate-500 mt-3">La pregunta de fondo. Va sin valores ni plazos: este informe termina en el diagnóstico.</p>
        </div>
      </div>

      <div class="md:col-span-9">
        <div class="border-l-2 border-amber-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">La lentitud no se arregla haciendo otra página</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">Conviene decirlo antes que nada, aunque juegue en contra de proponer un sitio nuevo. <strong class="text-white">Si se migran esas mismas 99 imágenes a un sitio nuevo, el sitio nuevo va a pesar los mismos 31,8 MB.</strong> El peso no viene del diseño ni de la plataforma: viene de los archivos.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa">Optimizar esas imágenes deja la portada por debajo de <strong class="text-white">2 MB</strong>, y ese trabajo se hace sobre la web actual, sin tocar nada más.</p>
        </div>

        <div class="border-l-2 border-marca-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">Lo que sí justificaría rehacerla es estructural</h3>
          <ul class="space-y-2.5 text-sm text-slate-300 prosa">
            <li class="flex gap-3"><span class="text-marca-400">1</span><div><strong class="text-white">El tema obliga a cargar WPBakery.</strong> El contenido no lo usa, pero la cabecera sí, y la cabecera está en todas las páginas. Mientras siga el tema, sigue esa carga.</div></li>
            <li class="flex gap-3"><span class="text-marca-400">2</span><div><strong class="text-white">El 56 % del código de cada página es esa cabecera.</strong> Se paga en cada visita y no se puede aligerar de verdad sin tocar el tema.</div></li>
            <li class="flex gap-3"><span class="text-marca-400">3</span><div><strong class="text-white">El buscador roto vive dentro de esa maquinaria.</strong> Se puede reparar donde está, pero seguirá dependiendo de ella.</div></li>
          </ul>
        </div>

        <div class="border-l-2 border-emerald-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">La buena noticia: el contenido ya está en Elementor</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">Esto cambia las cuentas a favor de ustedes. <strong class="text-white">Cambiar de tema no obliga a rehacer el contenido de las páginas</strong>: las páginas de servicios, «quiénes somos», formas de pago y demás están armadas con Elementor y sobreviven al cambio.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-4">Lo que habría que rehacer es acotado: <strong class="text-white">la cabecera, el pie, y las plantillas de la tienda y de la ficha de producto.</strong> Es un trabajo de estructura, no de volver a escribir el sitio entero.</p>
          <p class="text-sm text-slate-400 leading-relaxed prosa">Una condición técnica a tener en cuenta antes de decidir: armar esas plantillas de tienda con Elementor requiere su versión de pago. No damos esa compra por hecha &mdash;hay otros caminos&mdash;, pero es de las cosas que conviene evaluar antes y no descubrir a mitad del trabajo.</p>
        </div>

        <div class="grid sm:grid-cols-2 gap-3 mb-6">
          <div class="rounded-2xl border border-slate-700/60 glass p-6">
            <p class="eyebrow text-slate-500 mb-3">Ruta A</p>
            <h4 class="text-lg font-semibold text-white mb-4">Optimizar la web actual</h4>
            <p class="text-xs text-emerald-400 mb-2 font-semibold">Resuelve</p>
            <ul class="space-y-1.5 text-sm text-slate-300 mb-5">
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>El buscador caído</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Los 31,8 MB de imágenes</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>El caché de página</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>La redirección del «www»</div></li>
            </ul>
            <p class="text-xs text-amber-400 mb-2 font-semibold">Deja pendiente</p>
            <ul class="space-y-1.5 text-sm text-slate-400">
              <li class="flex gap-2"><span class="text-amber-400">›</span><div>La cabecera que ocupa el 56 % de cada página</div></li>
              <li class="flex gap-2"><span class="text-amber-400">›</span><div>La carga de WPBakery que el contenido no usa</div></li>
              <li class="flex gap-2"><span class="text-amber-400">›</span><div>La dependencia del tema y sus licencias</div></li>
            </ul>
          </div>

          <div class="rounded-2xl border border-slate-700/60 glass p-6">
            <p class="eyebrow text-slate-500 mb-3">Ruta B</p>
            <h4 class="text-lg font-semibold text-white mb-4">Rehacer el sitio</h4>
            <p class="text-xs text-emerald-400 mb-2 font-semibold">Resuelve</p>
            <ul class="space-y-1.5 text-sm text-slate-300 mb-5">
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Todo lo de la ruta A</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Una sola maquinaria, sin WPBakery de arrastre</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Cabecera propia, sin el mega menú de 48 categorías en cada página</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Buscador construido desde cero para 2.109 productos</div></li>
            </ul>
            <p class="text-xs text-emerald-400 mb-2 font-semibold">No hay que rehacer</p>
            <ul class="space-y-1.5 text-sm text-slate-400 mb-5">
              <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>El contenido de las páginas: ya está en Elementor y se conserva</div></li>
            </ul>
            <p class="text-xs text-amber-400 mb-2 font-semibold">Deja pendiente</p>
            <ul class="space-y-1.5 text-sm text-slate-400">
              <li class="flex gap-2"><span class="text-amber-400">›</span><div><strong class="text-slate-300">Las imágenes hay que optimizarlas igual.</strong> Si se migran tal cual, el problema viaja con ellas</div></li>
              <li class="flex gap-2"><span class="text-amber-400">›</span><div>Cabecera, pie y plantillas de tienda y ficha se rehacen: es un proyecto, no un ajuste</div></li>
            </ul>
          </div>
        </div>

        <div class="border-l-2 border-red-500 pl-6">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-white">Lo urgente no depende de esta decisión.</strong> Se elija la ruta que se elija, y tome el tiempo que tome elegirla, el buscador de productos hay que arreglarlo ahora.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ POR CONFIRMAR ══════════ -->
  <section id="pendiente" class="mt-20 pt-10 border-t border-slate-800/70 pb-16">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">07</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Qué falta confirmar</h2>
        <p class="text-xs text-slate-500 mt-3">El límite honesto de esta auditoría.</p>
      </div>

      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-5">Todo lo anterior se midió desde afuera, sin acceso al panel de administración del sitio. Con ese acceso se podría confirmar:</p>
        <ul class="space-y-2.5 text-sm text-slate-300 mb-6">
          <li class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">La causa exacta del error del buscador</strong>, revisando el registro de errores del servidor. Sabemos que falla y qué lo dispara; no cuál de los componentes lo provoca.</div></li>
          <li class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">La lista completa de plugins instalados</strong>, incluidos los que no dejan rastro visible en la página, y cuáles quedaron activos sin uso.</div></li>
          <li class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">La configuración de LiteSpeed Cache</strong> y por qué el sitio no está entregando páginas guardadas.</div></li>
          <li class="flex gap-3"><span class="text-marca-400">›</span><div><strong class="text-white">El tamaño y el estado de la base de datos</strong>, que en tiendas con este catálogo suele acumular datos que ya no se usan.</div></li>
        </ul>

        <div class="border-l-2 border-slate-700 pl-6 mb-10">
          <p class="text-sm text-slate-300 leading-relaxed prosa">Con lo medido alcanza para decidir por dónde empezar, pero no para dar la revisión por cerrada.</p>
        </div>

        <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 p-8 flex flex-wrap items-center justify-between gap-5">
          <div>
            <p class="text-lg font-semibold text-white">Cualquier duda del informe, la conversamos.</p>
            <div class="flex items-center gap-3 mt-3">
              <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
              <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; 30 de agosto de 2026</p>
            </div>
          </div>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20le%20escribo%20por%20la%20auditoria%20tecnica%20de%20vaslinkec.com" class="px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition whitespace-nowrap">Escribir por WhatsApp</a>
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
