<?php
session_start();
if (empty($_SESSION['auth_vaslink'])) {
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
<title>Tienda en línea y facturación electrónica &mdash; Vaslink</title>
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
      <a href="#diagnostico" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Diagnóstico</a>
      <a href="#escenarios" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Los 3 escenarios</a>
      <a href="#tienda" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">La tienda</a>
      <a href="#modulo" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Módulo B2B</a>
      <a href="#pago" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Pago y plazos</a>
      <a href="#nosotros" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 whitespace-nowrap transition">Nosotros</a>
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
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-[1.08] tracking-tight">Tienda en línea y<br>facturación electrónica</h1>
        <p class="text-slate-400 mt-4">Vaslink &middot; agosto de 2026</p>
      </div>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
    </div>
  </header>

  <div class="grid md:grid-cols-3 gap-4 mb-4">
    <a href="#esc1" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Escenario 1</p>
      <p class="text-3xl font-bold text-white mb-2">$680</p>
      <p class="text-sm text-slate-400">Web actual + TINI</p>
    </a>
    <a href="#esc2" class="rounded-2xl border border-slate-700/60 glass p-6 hover:border-slate-500 transition">
      <p class="eyebrow text-slate-500 mb-3">Escenario 2</p>
      <p class="text-3xl font-bold text-white mb-2">$1.680</p>
      <p class="text-sm text-slate-400">Web nueva + TINI</p>
    </a>
    <a href="#esc3" class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 p-6 hover:border-emerald-500/70 transition">
      <p class="eyebrow text-emerald-400 mb-3">Escenario 3 &middot; recomendado</p>
      <p class="text-3xl font-bold text-emerald-400 mb-2">$3.280</p>
      <p class="text-sm text-slate-400">Web nueva + Quipuy</p>
    </a>
  </div>
  <p class="text-xs text-slate-500 prosa">Valores + IVA. El sistema contable del escenario 3 es nuestro, como ya conversamos: por eso la integración ya existe y la fecha la ponemos nosotros.</p>

  <!-- ══════════ DIAGNÓSTICO ══════════ -->
  <section id="diagnostico" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">01</p>
        <h2 class="text-2xl font-bold text-white leading-tight">El diagnóstico</h2>
        <p class="text-xs text-slate-500 mt-3">Medido sobre vaslinkec.com el 27 de agosto de 2026.</p>
      </div>

      <div class="md:col-span-9">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-8">
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-3xl font-bold text-white">2.109</p>
            <p class="text-xs text-slate-500 mt-1">productos</p>
          </div>
          <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-4">
            <p class="text-3xl font-bold text-white">7,3 s</p>
            <p class="text-xs text-red-400 mt-1">tarda el buscador</p>
          </div>
          <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-4">
            <p class="text-3xl font-bold text-white">65</p>
            <p class="text-xs text-amber-400 mt-1">imágenes sin optimizar</p>
          </div>
          <div class="rounded-xl border border-slate-800/50 glass p-4">
            <p class="text-3xl font-bold text-white">64</p>
            <p class="text-xs text-slate-500 mt-1">archivos en la portada</p>
          </div>
        </div>

        <div class="border-l-2 border-red-500 pl-6 mb-8">
          <h3 class="text-lg font-semibold text-white mb-3">El problema más caro: el buscador</h3>
          <p class="text-sm text-slate-300 leading-relaxed prosa mb-3">Con 2.109 productos nadie navega el catálogo: la gente busca. Y cada búsqueda tarda <strong class="text-red-400">7,3 segundos</strong>, contra 1,6 de la portada. No es el servidor.</p>
          <p class="text-sm text-slate-300 leading-relaxed prosa">La mitad de los visitantes abandona una página que pasa de 3 segundos. En tecnología, donde se compara en tres pestañas a la vez, esa venta se va al competidor que ya está abierto.</p>
        </div>

        <ul class="space-y-2.5 text-sm text-slate-300">
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>65 de 136 imágenes se descargan aunque no se vean. Pesa sobre todo en celular.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>64 archivos en la portada, cada uno un pedido al servidor.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>Entrar por «www» agrega segundo y medio de desvío.</div></li>
          <li class="flex gap-3"><span class="text-amber-400">›</span><div>Mayoristas y clientes finales ven exactamente lo mismo.</div></li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ══════════ ESCENARIOS ══════════ -->
  <section id="escenarios" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10 mb-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">02</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Los tres escenarios</h2>
        <p class="text-xs text-slate-500 mt-3">Todos los valores + IVA.</p>
      </div>
      <div class="md:col-span-9 tabla-scroll">
        <table class="w-full text-sm border-collapse min-w-[620px]">
          <thead>
            <tr class="border-b border-slate-700">
              <th class="text-left py-3 pr-3"></th>
              <th class="text-left py-3 px-3 text-white font-semibold">1 · Solo integrar</th>
              <th class="text-left py-3 px-3 text-white font-semibold">2 · Web + TINI</th>
              <th class="text-left py-3 pl-3 text-emerald-400 font-semibold">3 · Web + Quipuy</th>
            </tr>
          </thead>
          <tbody class="text-slate-300">
            <tr class="border-b border-slate-800/60">
              <td class="py-3 pr-3 text-slate-500">La página web</td>
              <td class="py-3 px-3">La de hoy</td>
              <td class="py-3 px-3 text-white">Nueva</td>
              <td class="py-3 pl-3 text-white">Nueva</td>
            </tr>
            <tr class="border-b border-slate-800/60">
              <td class="py-3 pr-3 text-slate-500">Búsqueda de 7,3 s</td>
              <td class="py-3 px-3 text-red-400">Sigue igual</td>
              <td class="py-3 px-3 text-emerald-400">Resuelta</td>
              <td class="py-3 pl-3 text-emerald-400">Resuelta</td>
            </tr>
            <tr class="border-b border-slate-800/60">
              <td class="py-3 pr-3 text-slate-500">La conexión</td>
              <td class="py-3 px-3 text-amber-400">Por desarrollar</td>
              <td class="py-3 px-3 text-amber-400">Por desarrollar</td>
              <td class="py-3 pl-3 text-emerald-400">Ya construida</td>
            </tr>
            <tr class="border-b border-slate-800/60">
              <td class="py-3 pr-3 text-slate-500">La fecha depende de</td>
              <td class="py-3 px-3 text-amber-400">TINI</td>
              <td class="py-3 px-3 text-amber-400">TINI</td>
              <td class="py-3 pl-3 text-emerald-400">Nosotros</td>
            </tr>
            <tr class="border-b border-slate-800/60">
              <td class="py-3 pr-3 text-slate-500">Se adapta a ustedes</td>
              <td class="py-3 px-3 text-slate-500">No</td>
              <td class="py-3 px-3 text-slate-500">No</td>
              <td class="py-3 pl-3 text-emerald-400">Sí, presupuestado</td>
            </tr>
            <tr class="border-b border-slate-800/60">
              <td class="py-3 pr-3 text-slate-500">Costo anual</td>
              <td class="py-3 px-3">El de TINI</td>
              <td class="py-3 px-3">El de TINI</td>
              <td class="py-3 pl-3 text-white">$350, desde el año 2</td>
            </tr>
            <tr>
              <td class="py-4 pr-3 text-slate-500 font-semibold">Inversión</td>
              <td class="py-4 px-3 text-xl font-bold text-white">$680</td>
              <td class="py-4 px-3 text-xl font-bold text-white">$1.680</td>
              <td class="py-4 pl-3 text-xl font-bold text-emerald-400">$3.280</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Escenario 1 -->
    <div id="esc1" class="anc md:grid md:grid-cols-12 md:gap-10 pt-10 border-t border-slate-800/50">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-slate-500 mb-2">Escenario 1</p>
          <h3 class="text-xl font-semibold text-white leading-tight mb-4">Conectar la tienda actual con TINI</h3>
          <p class="text-3xl font-bold text-white">$680</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-5">La tienda queda como está y desarrollamos el conector. Se acaba la digitación manual: el pedido viaja a TINI, y el stock, los precios y los detalles bajan a la web desde ahí.</p>
        <div class="grid sm:grid-cols-2 gap-2 text-sm text-slate-400 mb-6">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Módulo de conexión</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Registro de envíos para auditoría</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Pruebas con pedidos reales</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Capacitación a quien lo opere</div></div>
        </div>
        <div class="border-l-2 border-amber-500 pl-6 mb-4">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-amber-400">Ojo:</strong> no toca nada del diagnóstico. La búsqueda seguirá en 7,3 segundos y mayoristas y clientes finales seguirán viendo lo mismo. Resuelve lo administrativo, no lo comercial.</p>
        </div>
        <p class="text-xs text-slate-500 prosa">Cuesta más que los $480 que vale como módulo porque acá va solo: hay que estudiar una tienda que no construimos nosotros.</p>
      </div>
    </div>

    <!-- Escenario 2 -->
    <div id="esc2" class="anc md:grid md:grid-cols-12 md:gap-10 mt-14 pt-10 border-t border-slate-800/50">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-slate-500 mb-2">Escenario 2</p>
          <h3 class="text-xl font-semibold text-white leading-tight mb-4">Tienda nueva conectada con TINI</h3>
          <p class="text-3xl font-bold text-white">$1.680</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <div class="grid sm:grid-cols-2 gap-3 mb-6">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-4">
            <p class="text-xs text-slate-500 mb-1">Tienda completa</p>
            <p class="text-xl font-bold text-white">$1.200</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-4">
            <p class="text-xs text-slate-500 mb-1">Conexión con TINI</p>
            <p class="text-xl font-bold text-white">$480</p>
          </div>
        </div>
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">Se resuelve todo el diagnóstico y queda conectada con el sistema que ya usan.</p>

        <div class="border-l-2 border-amber-500 pl-6">
          <h4 class="text-base font-semibold text-white mb-3">Antes de elegir TINI</h4>
          <ul class="space-y-3 text-sm text-slate-300 prosa">
            <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">Una parte del trabajo no es nuestra.</strong> El envío de stock, precios y detalles hacia la web lo hace TINI desde su lado; nosotros construimos lo que recibe esa información y lo que devuelve el pedido.</div></li>
            <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">El plazo lo marca su equipo.</strong> Nos comprometemos con la fecha de la tienda; con la de la conexión, no podemos.</div></li>
            <li class="flex gap-3"><span class="text-amber-400">›</span><div><strong class="text-white">Lo revisamos antes de firmar.</strong> Hablamos con TINI y les traemos por escrito qué permite y en qué plazo. Sin costo, dos o tres días.</div></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Escenario 3 -->
    <div id="esc3" class="anc md:grid md:grid-cols-12 md:gap-10 mt-14 pt-10 border-t border-emerald-500/30">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <span class="eyebrow bg-emerald-500/20 text-emerald-300 px-2 py-1 rounded">Recomendado</span>
          <h3 class="text-xl font-semibold text-white leading-tight mb-4 mt-3">Tienda nueva + Quipuy</h3>
          <p class="text-3xl font-bold text-emerald-400">$3.280</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <div class="grid sm:grid-cols-2 gap-3 mb-6">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-4">
            <p class="text-xs text-slate-500 mb-1">Tienda completa</p>
            <p class="text-xl font-bold text-white">$1.200</p>
          </div>
          <div class="rounded-xl border border-emerald-500/40 bg-emerald-500/10 p-4">
            <p class="text-xs text-slate-500 mb-1">Quipuy implementado y adaptado</p>
            <p class="text-xl font-bold text-emerald-400">$2.080</p>
          </div>
        </div>

        <p class="text-sm text-slate-300 leading-relaxed prosa mb-7">No cambian de facturador: cambian de sistema. Quipuy es facturación, inventario, compras, caja y contabilidad completa, sincronizado con la tienda. <strong class="text-white">La integración ya está construida</strong>, así que la fecha la ponemos nosotros.</p>

        <p class="text-sm font-semibold text-white mb-3">Lo que cubre hoy, sin desarrollar nada</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-2 text-sm text-slate-400 mb-4">
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Facturación electrónica SRI</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Inventario con kardex</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Compras y retenciones</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Cuentas por cobrar</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Caja y proformas</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>ATS mensual</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Multisucursal</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Contabilidad y reportes fiscales</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Etiquetas de código de barras</div></div>
          <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>10 usuarios</div></div>
        </div>
        <div class="border-l-2 border-emerald-500 pl-6 mb-7">
          <p class="text-sm text-slate-300 leading-relaxed prosa"><strong class="text-white">Si usan algo que acá no aparece, cuéntenoslo: se puede implementar.</strong> Quipuy es modular, así que sumar una pieza no obliga a rehacer el resto y los plazos son cortos. Lo evaluamos con el equipo que desarrolla el sistema y les damos valor y tiempo antes de que decidan.</p>
        </div>

        <div class="grid sm:grid-cols-2 gap-3">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-2">Qué cubren los $2.080</p>
            <p class="text-sm text-slate-400 leading-relaxed">Implementación, carga inicial, capacitación, primer año del sistema y los ajustes de configuración, reportes y formatos. Un módulo nuevo también lo desarrollamos, con valor y plazo propios.</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-sm font-semibold text-white mb-2">Desde el año 2</p>
            <p class="text-sm text-slate-400 leading-relaxed"><strong class="text-white">$350 + IVA anuales.</strong> Plan Empresarial: facturas ilimitadas, 10 usuarios, multisucursal. Comparen contra lo que pagan hoy por TINI.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Ancla de precio + paso previo -->
    <div class="md:grid md:grid-cols-12 md:gap-10 mt-14 pt-10 border-t border-slate-800/50">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">Antes de decidir</p>
        <h3 class="text-xl font-semibold text-white leading-tight">Lo que conviene tener claro</h3>
      </div>
      <div class="md:col-span-9">
        <div class="mb-4">
          <div class="rounded-2xl border border-marca-500/40 bg-marca-500/10 p-6">
            <div class="flex items-start justify-between gap-3 mb-3">
              <h4 class="text-base font-semibold text-white">Paso previo, antes de firmar</h4>
              <div class="text-right whitespace-nowrap">
                <p class="text-lg font-bold text-marca-400">Sin costo</p>
                <p class="text-xs text-slate-500">2 a 3 días</p>
              </div>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Llevan años operando con TINI y hay procesos suyos que todavía no conocemos. <strong class="text-white">Ese es el único riesgo real del escenario 3</strong>, y se resuelve revisándolo antes de que pongan un dólar.</p>
            <ul class="space-y-2 text-sm text-slate-300 mb-4">
              <li class="flex gap-3"><span class="text-marca-400">1</span><div>Nos sentamos con quien usa TINI a diario: qué módulos abre, qué reportes saca.</div></li>
              <li class="flex gap-3"><span class="text-marca-400">2</span><div>Clasificamos cada punto: lo cubre tal cual · es un ajuste incluido · es un módulo aparte.</div></li>
              <li class="flex gap-3"><span class="text-marca-400">3</span><div>Les entregamos la lista, con valor y plazo de lo que vaya aparte.</div></li>
            </ul>
            <p class="text-sm text-slate-400 leading-relaxed">Puede salir de ahí que les convenga el escenario 2 y quedarse en TINI. Si es así se los decimos, aunque nos convenga menos.</p>
          </div>
        </div>

        <div class="border-l-2 border-emerald-500 pl-6">
          <h4 class="text-base font-semibold text-white mb-3">Por qué recomendamos el escenario 3</h4>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-2 text-sm text-slate-300">
            <div class="flex gap-3"><span class="text-emerald-400">1</span><div><strong class="text-white">Fecha firme.</strong> En los otros dos depende de un tercero.</div></div>
            <div class="flex gap-3"><span class="text-emerald-400">2</span><div><strong class="text-white">Se acomoda a ustedes.</strong> Con TINI, si falta algo no hay conversación posible.</div></div>
            <div class="flex gap-3"><span class="text-emerald-400">3</span><div><strong class="text-white">Un solo responsable.</strong> Tienda, sistema y conexión los hace el mismo equipo.</div></div>
            <div class="flex gap-3"><span class="text-emerald-400">4</span><div><strong class="text-white">No quedan amarrados.</strong> Sus datos salen en formato del SRI cuando quieran.</div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ LA TIENDA ══════════ -->
  <section id="tienda" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">03</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Qué incluye la tienda nueva</h2>
        <p class="text-xs text-slate-500 mt-3">Escenarios 2 y 3. WooCommerce, con los 2.109 productos migrados.</p>
      </div>
      <div class="md:col-span-9">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-2.5 text-sm text-slate-300">
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Diseño propio, no plantilla comprada</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Migración de los 2.109 productos</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Buscador rápido con filtros</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Fichas de producto optimizadas</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Carrito y compra simplificados</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Optimización de velocidad e imágenes</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Adaptada a celular y tablet</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Pasarela de pagos configurada</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Cálculo de envíos</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Correos automáticos de pedido</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Panel para administrar solos</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Medición de visitas y ventas</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Configuración inicial para Google</div></div>
          <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Capacitación al equipo</div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ MÓDULO B2B ══════════ -->
  <section id="modulo" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <div class="md:sticky md:top-24">
          <p class="eyebrow text-marca-400 mb-2">04 &middot; Opcional</p>
          <h2 class="text-2xl font-bold text-white leading-tight mb-4">Venta a empresas y a público</h2>
          <p class="text-3xl font-bold text-white">$520</p>
          <p class="text-xs text-slate-500">+ IVA</p>
          <p class="text-xs text-marca-400 mt-2">$470 junto al escenario 2 o 3</p>
        </div>
      </div>
      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-6">La misma web se comporta distinto según quién esté mirando, sin necesidad de tener dos tiendas. Se suma a cualquiera de los tres escenarios, ahora o después.</p>

        <div class="grid sm:grid-cols-2 gap-3 mb-6">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="eyebrow text-marca-400 mb-3">Cliente final</p>
            <ul class="space-y-1.5 text-sm text-slate-400">
              <li class="flex gap-2"><span class="text-marca-400">›</span><div>Ve precios de público</div></li>
              <li class="flex gap-2"><span class="text-marca-400">›</span><div>Compra sin registrarse</div></li>
            </ul>
          </div>
          <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-5">
            <p class="eyebrow text-emerald-400 mb-3">Empresa</p>
            <ul class="space-y-1.5 text-sm text-slate-400">
              <li class="flex gap-2"><span class="text-emerald-400">›</span><div>Solicita cuenta con RUC</div></li>
              <li class="flex gap-2"><span class="text-emerald-400">›</span><div>Ustedes aprueban o rechazan</div></li>
            </ul>
          </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-x-8 gap-y-3 text-sm text-slate-300 mb-5">
          <div class="flex gap-3"><span class="text-marca-400">1</span><div><strong class="text-white">Los precios de mayorista están ocultos.</strong> Ni por Google, ni compartiendo el enlace.</div></div>
          <div class="flex gap-3"><span class="text-marca-400">2</span><div><strong class="text-white">Nadie entra sin su aprobación.</strong> Reciben la solicitud con el RUC y deciden.</div></div>
          <div class="flex gap-3"><span class="text-marca-400">3</span><div><strong class="text-white">La tienda cambia para ese cliente.</strong> Sus precios, sus condiciones, sus mínimos.</div></div>
          <div class="flex gap-3"><span class="text-marca-400">4</span><div><strong class="text-white">Descuentos por cliente, categoría o volumen.</strong></div></div>
        </div>
        <p class="text-sm text-slate-400 prosa">Aprobar una empresa, cambiarle el descuento o suspenderla son tres clics desde su panel, sin depender de nosotros.</p>
      </div>
    </div>
  </section>

  <!-- ══════════ PAGO Y PLAZOS ══════════ -->
  <section id="pago" class="mt-20 pt-10 border-t border-slate-800/70">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">05</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Pago y plazos</h2>
      </div>
      <div class="md:col-span-9">
        <div class="grid sm:grid-cols-2 gap-3 mb-6">
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-xs text-slate-500 mb-1">Para empezar</p>
            <p class="text-2xl font-bold text-white">60 %</p>
          </div>
          <div class="rounded-xl border border-slate-800/60 bg-slate-900/40 p-5">
            <p class="text-xs text-slate-500 mb-1">Al entregar funcionando</p>
            <p class="text-2xl font-bold text-white">40 %</p>
          </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6 mb-8">
          <div>
            <p class="eyebrow text-slate-500 mb-3">Escenario 1 &middot; 2 a 3 semanas</p>
            <p class="text-sm text-slate-400 leading-relaxed">Revisión de TINI y de la tienda actual, desarrollo del conector y pruebas. La fecha final depende también de TINI.</p>
          </div>
          <div>
            <p class="eyebrow text-slate-500 mb-3">Escenarios 2 y 3 &middot; 6 semanas</p>
            <div class="space-y-1.5 text-sm mb-3">
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Sem. 1&ndash;2</span><div class="text-slate-300">Diseño y estructura para su revisión.</div></div>
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Sem. 3&ndash;4</span><div class="text-slate-300">Desarrollo, migración y optimización.</div></div>
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Sem. 5</span><div class="text-slate-300">Facturación y módulos contratados.</div></div>
              <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-20">Sem. 6</span><div class="text-slate-300">Pruebas, capacitación y salida en vivo.</div></div>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed">En el escenario 3 la fecha es firme. En el 2, la semana 5 puede correrse según TINI. La tienda actual sigue funcionando hasta que la nueva esté probada.</p>
          </div>
        </div>

        <div class="border-l-2 border-slate-700 pl-6">
          <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
          <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1.5 text-sm text-slate-400">
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Fotografía y edición de imágenes</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Redacción de descripciones de los 2.109 productos</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Comisiones de la pasarela de pagos</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Desarrollos que TINI haga de su lado</div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Módulos que Quipuy hoy no tenga <span class="text-xs">(se identifican en el paso previo y se cotizan aparte, antes de firmar)</span></div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Migración del historial contable de TINI <span class="text-xs">(según volumen y formato de exportación)</span></div></div>
            <div class="flex gap-2"><span class="text-slate-600">·</span><div>Alojamiento, dominio y plan de posicionamiento <span class="text-xs">(se cotizan aparte)</span></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════ NOSOTROS ══════════ -->
  <section id="nosotros" class="mt-20 pt-10 border-t border-slate-800/70 pb-16">
    <div class="md:grid md:grid-cols-12 md:gap-10">
      <div class="md:col-span-3 mb-6 md:mb-0">
        <p class="eyebrow text-marca-400 mb-2">06</p>
        <h2 class="text-2xl font-bold text-white leading-tight">Por qué nosotros</h2>
      </div>
      <div class="md:col-span-9">
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-4">Trabajamos tiendas WooCommerce con catálogos grandes y necesidades de mayorista, y las integraciones de facturación las desarrollamos nosotros: no dependemos de un plugin de terceros que mañana deje de actualizarse.</p>
        <p class="text-sm text-slate-300 leading-relaxed prosa mb-10">Quipuy es un producto nuestro, y también construimos el conector hacia otro sistema contable ajeno. Resolvimos el problema desde los dos lados &mdash;desarrollando el sistema y desarrollando la conexión hacia uno que no controlamos&mdash;, y por eso podemos decirles con criterio qué se puede prometer con TINI y qué no.</p>

        <div class="rounded-2xl border border-marca-500/30 bg-marca-500/5 p-8 flex flex-wrap items-center justify-between gap-5">
          <div>
            <p class="text-lg font-semibold text-white">Cualquier duda, la conversamos.</p>
            <div class="flex items-center gap-3 mt-3">
              <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
              <p class="text-xs text-slate-500">Otavalo, Ecuador &middot; agosto de 2026</p>
            </div>
          </div>
          <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20de%20la%20tienda%20en%20linea" class="px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition whitespace-nowrap">Escribir por WhatsApp</a>
        
          <div class="mt-8 pt-6 border-t border-slate-800/60">
            <p class="text-xs text-slate-500 mb-3">Descargue en PDF la cotización que prefiera</p>
            <div class="flex flex-wrap gap-3">
            <a href="pdf/escenario-1.pdf" download class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-600 text-slate-200 font-semibold text-sm hover:border-slate-400 hover:text-white transition whitespace-nowrap">&darr;&nbsp; Escenario 1</a>
            <a href="pdf/escenario-2.pdf" download class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-600 text-slate-200 font-semibold text-sm hover:border-slate-400 hover:text-white transition whitespace-nowrap">&darr;&nbsp; Escenario 2</a>
            <a href="pdf/escenario-3.pdf" download class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-600 text-slate-200 font-semibold text-sm hover:border-slate-400 hover:text-white transition whitespace-nowrap">&darr;&nbsp; Escenario 3</a>
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
