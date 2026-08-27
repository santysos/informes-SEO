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
body{background:radial-gradient(1100px 720px at 25% 0%, rgba(59,130,246,.14), transparent 60%), #0a0f16;}
.glass{background:rgba(17,26,36,.55);backdrop-filter:blur(18px)}
.tabla-scroll{overflow-x:auto}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<div class="max-w-4xl mx-auto px-5 py-12">

  <div class="flex items-start justify-between gap-4 mb-10">
    <div>
      <p class="font-mono text-[10.5px] tracking-[.2em] uppercase text-marca-400 mb-2">Creative Web &middot; Propuesta</p>
      <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">Tienda en línea y<br>facturación electrónica</h1>
      <p class="text-slate-400 mt-3 text-sm">Preparado para <strong class="text-slate-300">Vaslink</strong> &middot; agosto de 2026</p>
    </div>
    <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
  </div>

  <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-5 mb-6">
    <p class="text-sm text-slate-300 leading-relaxed">Después de conversar quedaron <strong class="text-white">tres caminos posibles</strong>, y no son tres precios del mismo trabajo: son tres decisiones distintas. Este documento los presenta uno por uno, con lo que cada uno resuelve y lo que cada uno deja pendiente.</p>
  </div>

  <div class="rounded-xl border border-slate-700/60 bg-slate-900/40 p-5 mb-10">
    <p class="text-sm text-slate-300 leading-relaxed">Como ya conversamos, el sistema contable del tercer escenario &mdash;Quipuy&mdash; lo desarrollamos nosotros y la integración con la tienda ya está construida. Por eso ahí la fecha de entrega la ponemos nosotros. <strong class="text-white">A cambio, es el escenario que exige un paso previo:</strong> confirmar que Quipuy cubre todo lo que hoy hacen con TINI, antes de que nadie firme nada. Está descrito más abajo y no tiene costo.</p>
  </div>

  <!-- ══════════ DIAGNÓSTICO ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Qué encontramos en la tienda actual</h2>
  <p class="text-sm text-slate-400 mb-6">Mediciones hechas sobre vaslinkec.com el 27 de agosto de 2026.</p>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="rounded-xl border border-slate-800/50 glass p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-slate-500 mb-1">Productos cargados</p>
      <p class="text-3xl font-bold text-white">2.109</p>
      <p class="text-xs text-slate-500 mt-1">un catálogo grande</p>
    </div>
    <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-red-400 mb-1">El buscador tarda</p>
      <p class="text-3xl font-bold text-white">7,3 s</p>
      <p class="text-xs text-slate-500 mt-1">por búsqueda</p>
    </div>
    <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-amber-400 mb-1">Imágenes sin optimizar</p>
      <p class="text-3xl font-bold text-white">65</p>
      <p class="text-xs text-slate-500 mt-1">de 136 en la portada</p>
    </div>
    <div class="rounded-xl border border-slate-800/50 glass p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-slate-500 mb-1">Archivos que carga</p>
      <p class="text-3xl font-bold text-white">64</p>
      <p class="text-xs text-slate-500 mt-1">solo en la portada</p>
    </div>
  </div>

  <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-3">El problema más caro: el buscador</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Con 2.109 productos, <strong class="text-white">nadie navega el catálogo: la gente busca</strong>. Escriben «laptop», «disco duro», «memoria» y esperan la respuesta.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Hoy esa búsqueda tarda <strong class="text-red-400">7,3 segundos</strong>. La portada carga en 1,6 — el problema no es el servidor, es cómo está resuelta la búsqueda sobre un catálogo de este tamaño.</p>
    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed">Para dimensionarlo: <strong class="text-white">la mitad de los visitantes abandona una página que tarda más de 3 segundos</strong>. Cada búsqueda de 7 segundos es una venta que se va, y en una tienda de tecnología —donde el comprador compara precios en tres pestañas a la vez— se va al competidor que ya tiene abierto.</p>
    </div>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-3">Lo demás que suma</h3>
    <ul class="space-y-3 text-sm text-slate-300">
      <li class="flex gap-3"><span class="text-amber-400 mt-0.5">›</span><div><strong class="text-white">65 imágenes se cargan aunque no se vean.</strong> De 136 en la portada, solo 71 esperan a que el visitante baje. Las otras 65 se descargan de una, y eso pesa sobre todo en celular con datos móviles.</div></li>
      <li class="flex gap-3"><span class="text-amber-400 mt-0.5">›</span><div><strong class="text-white">64 archivos distintos en la portada.</strong> Cada uno es un pedido al servidor. En una tienda armada con constructor visual es normal acumularlos, pero se pueden reducir bastante.</div></li>
      <li class="flex gap-3"><span class="text-amber-400 mt-0.5">›</span><div><strong class="text-white">Entrar por «www» agrega segundo y medio.</strong> Quien escribe <em>www.vaslinkec.com</em> pasa por un desvío antes de llegar. Se corrige en la configuración.</div></li>
      <li class="flex gap-3"><span class="text-amber-400 mt-0.5">›</span><div><strong class="text-white">El registro de distribuidores y la tienda están separados.</strong> Un mayorista y un cliente final ven lo mismo, cuando deberían ver precios y condiciones distintos.</div></li>
    </ul>
  </div>

  <!-- ══════════ COMPARATIVA ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Los tres escenarios, de un vistazo</h2>
  <p class="text-sm text-slate-400 mb-6">Qué resuelve cada uno, de quién depende la fecha y cuánto cuesta.</p>

  <div class="rounded-xl border border-slate-800/50 glass p-4 md:p-6 mb-4 tabla-scroll">
    <table class="w-full text-sm border-collapse min-w-[620px]">
      <thead>
        <tr class="border-b border-slate-700">
          <th class="text-left py-3 pr-3 font-mono text-[10px] uppercase tracking-widest text-slate-500 font-normal"></th>
          <th class="text-left py-3 px-3 text-white font-semibold">1 · Solo integrar</th>
          <th class="text-left py-3 px-3 text-white font-semibold">2 · Web nueva + TINI</th>
          <th class="text-left py-3 pl-3 text-marca-300 font-semibold">3 · Web nueva + Quipuy</th>
        </tr>
      </thead>
      <tbody class="text-slate-300">
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">La página web</td>
          <td class="py-3 px-3">La que tienen hoy</td>
          <td class="py-3 px-3 text-white">Nueva, desde cero</td>
          <td class="py-3 pl-3 text-white">Nueva, desde cero</td>
        </tr>
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">Búsqueda de 7,3 s</td>
          <td class="py-3 px-3 text-red-400">Sigue igual</td>
          <td class="py-3 px-3 text-emerald-400">Resuelta</td>
          <td class="py-3 pl-3 text-emerald-400">Resuelta</td>
        </tr>
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">Sistema de facturación</td>
          <td class="py-3 px-3">TINI</td>
          <td class="py-3 px-3">TINI</td>
          <td class="py-3 pl-3 text-white">Quipuy, sistema contable completo</td>
        </tr>
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">La conexión</td>
          <td class="py-3 px-3 text-amber-400">Por desarrollar</td>
          <td class="py-3 px-3 text-amber-400">Por desarrollar</td>
          <td class="py-3 pl-3 text-emerald-400">Ya construida y en uso</td>
        </tr>
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">¿De quién depende la fecha?</td>
          <td class="py-3 px-3 text-amber-400">De TINI</td>
          <td class="py-3 px-3 text-amber-400">De TINI</td>
          <td class="py-3 pl-3 text-emerald-400">De nosotros</td>
        </tr>
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">¿Se adapta a cómo trabajan ustedes?</td>
          <td class="py-3 px-3 text-slate-400">Ustedes se adaptan a él</td>
          <td class="py-3 px-3 text-slate-400">Ustedes se adaptan a él</td>
          <td class="py-3 pl-3 text-emerald-400">Sí, y está presupuestado</td>
        </tr>
        <tr class="border-b border-slate-800/60">
          <td class="py-3 pr-3 text-slate-500">Costo anual del sistema</td>
          <td class="py-3 px-3">El que ya pagan a TINI</td>
          <td class="py-3 px-3">El que ya pagan a TINI</td>
          <td class="py-3 pl-3 text-white">$350 + IVA, desde el año 2</td>
        </tr>
        <tr>
          <td class="py-4 pr-3 text-slate-500 font-semibold">Inversión</td>
          <td class="py-4 px-3 text-xl font-bold text-white">$680</td>
          <td class="py-4 px-3 text-xl font-bold text-white">$1.680</td>
          <td class="py-4 pl-3 text-xl font-bold text-marca-400">$2.550</td>
        </tr>
      </tbody>
    </table>
  </div>
  <p class="text-xs text-slate-500 mb-10">Todos los valores son + IVA.</p>

  <!-- ══════════ ESCENARIO 1 ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-6">Escenario 1 &mdash; Conectar la tienda actual con TINI</h2>

  <div class="rounded-xl border border-slate-700/60 glass p-6 mb-4">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-4">
      <div class="flex-1 min-w-[240px]">
        <span class="text-[10px] font-mono uppercase tracking-widest bg-slate-700/50 text-slate-300 px-2 py-1 rounded">La inversión más baja</span>
        <h3 class="text-lg font-semibold text-white mt-3">Nos encargamos solo del conector</h3>
      </div>
      <div class="text-right">
        <p class="text-4xl font-bold text-white">$680</p>
        <p class="text-xs text-slate-500">+ IVA</p>
      </div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed mb-5">La tienda se queda como está y desarrollamos el módulo que la conecta con TINI. Cuando entra un pedido deja de haber digitación manual: el pedido viaja a TINI y el stock, los precios y los datos de producto bajan a la web desde ahí.</p>

    <div class="grid md:grid-cols-2 gap-3 text-sm text-slate-300 mb-5">
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Desarrollo del módulo de conexión</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>El pedido de la web viaja a TINI</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Stock, precios y detalles llegan desde TINI</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Registro de cada envío para auditoría</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Pruebas con pedidos reales antes de activarlo</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Capacitación a quien lo va a operar</div></div>
    </div>

    <div class="rounded-lg border border-amber-500/30 bg-amber-500/5 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-amber-400">Sea consciente de esto:</strong> este escenario no toca ninguno de los problemas del diagnóstico. La búsqueda va a seguir tardando 7,3 segundos, las 65 imágenes van a seguir cargándose de más y mayoristas y clientes finales van a seguir viendo lo mismo. Resuelve la parte administrativa, no la comercial.</p>
    </div>
  </div>

  <div class="rounded-xl border border-slate-800/50 bg-slate-900/30 p-5 mb-10">
    <p class="text-sm text-slate-400 leading-relaxed">Cuesta más que los $480 que aparecen abajo como módulo porque acá va solo: hay que estudiar una tienda que no construimos nosotros, y adaptarnos a cómo esté armada por dentro. Dentro de un proyecto de web nueva ese trabajo ya está hecho.</p>
  </div>

  <!-- ══════════ ESCENARIO 2 ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-6">Escenario 2 &mdash; Tienda nueva conectada con TINI</h2>

  <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-6 mb-4">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-4">
      <div class="flex-1 min-w-[240px]">
        <span class="text-[10px] font-mono uppercase tracking-widest bg-marca-500/25 text-marca-300 px-2 py-1 rounded">Siguen con su facturador</span>
        <h3 class="text-lg font-semibold text-white mt-3">Tienda nueva + módulo de conexión con TINI</h3>
      </div>
      <div class="text-right">
        <p class="text-4xl font-bold text-white">$1.680</p>
        <p class="text-xs text-slate-500">+ IVA</p>
      </div>
    </div>
    <div class="grid md:grid-cols-2 gap-4 mb-5">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Tienda en línea completa</p>
        <p class="text-2xl font-bold text-white">$1.200</p>
      </div>
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Módulo de conexión con TINI</p>
        <p class="text-2xl font-bold text-white">$480</p>
      </div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed">Se resuelve todo el diagnóstico —búsqueda, velocidad, imágenes, fichas— y encima queda conectada con el sistema que ya usan. El detalle de lo que incluye la tienda nueva está más abajo, y aplica igual para el escenario 3.</p>
  </div>

  <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-6 mb-10">
    <h3 class="text-base font-semibold text-white mb-3">Lo que tienen que saber antes de elegir TINI</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Preferimos decirlo ahora y no en la semana seis. <strong class="text-white">En una integración con TINI, una parte del trabajo no es nuestra.</strong> El envío del stock, los precios y los detalles de producto hacia la web lo hace TINI desde su lado; nosotros construimos la parte de la tienda que recibe esa información y la que devuelve el pedido.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Eso significa que <strong class="text-white">el plazo de la integración lo marca el equipo de TINI, no nosotros.</strong> Podemos comprometernos con la fecha de la tienda; con la fecha en que la conexión quede andando, no, porque depende de cuándo ellos tengan lista su parte.</p>
    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-white">Qué hacemos al respecto:</strong> antes de firmar nada hablamos con TINI, revisamos su documentación y les traemos por escrito qué permite hacer y en qué plazo. <strong class="text-marca-400">Esa revisión no tiene costo</strong> y toma dos o tres días. Si de ahí sale que el valor final cambia, se los decimos antes de que paguen el anticipo.</p>
    </div>
  </div>

  <!-- ══════════ ESCENARIO 3 ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Escenario 3 &mdash; Tienda nueva + Quipuy</h2>
  <p class="text-sm text-slate-400 mb-6">Es el que recomendamos, y abajo está el porqué en números.</p>

  <div class="rounded-xl border-2 border-emerald-500/50 bg-emerald-500/10 p-6 mb-4">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-4">
      <div class="flex-1 min-w-[240px]">
        <span class="text-[10px] font-mono uppercase tracking-widest bg-emerald-500/25 text-emerald-300 px-2 py-1 rounded">Nuestra recomendación</span>
        <h3 class="text-lg font-semibold text-white mt-3">Tienda nueva + sistema contable completo, ya integrados</h3>
      </div>
      <div class="text-right">
        <p class="text-4xl font-bold text-emerald-400">$2.550</p>
        <p class="text-xs text-slate-500">+ IVA</p>
      </div>
    </div>

    <p class="text-sm text-slate-300 leading-relaxed mb-5">Acá no cambian de facturador: cambian de sistema. <strong class="text-white">Quipuy no es solo facturación electrónica</strong> — es facturación, inventario con kardex, compras, retenciones, caja, proformas, cuentas por cobrar, multisucursal y contabilidad completa, en un solo lugar y sincronizado con la tienda.</p>

    <div class="grid md:grid-cols-2 gap-4 mb-5">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Tienda en línea completa</p>
        <p class="text-2xl font-bold text-white">$1.200</p>
      </div>
      <div class="rounded-lg border border-emerald-500/30 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Quipuy implementado y adaptado</p>
        <p class="text-2xl font-bold text-emerald-400">$1.350</p>
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-3 text-sm text-slate-300 mb-5">
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Tienda en línea completa (todo el detalle de abajo)</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Módulo de conexión instalado y configurado</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Factura electrónica emitida y enviada sola</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Inventario sincronizado en los dos sentidos</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Primer año del sistema incluido</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Capacitación a su equipo en el sistema</div></div>
    </div>

    <div class="rounded-lg border border-emerald-500/30 bg-slate-900/40 p-4 mb-4">
      <p class="text-sm text-slate-300 leading-relaxed mb-3"><strong class="text-emerald-400">Los $1.350 no son una licencia: son el sistema puesto a funcionar como ustedes trabajan.</strong> Cubren la implementación, la carga inicial de datos, la capacitación y los ajustes de configuración, reportes y formatos para que calce con su operación.</p>
      <p class="text-sm text-slate-400 leading-relaxed">Es lo contrario de lo que pasa con un sistema grande, donde el que se adapta es el cliente. Pero tiene un límite y conviene decirlo: ajustar lo que existe está incluido; <strong class="text-slate-300">construir un módulo que Quipuy hoy no tiene, no</strong>. Para eso está el paso previo.</p>
    </div>

    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4 mb-4">
      <p class="text-sm font-semibold text-white mb-3">Lo que Quipuy cubre hoy, sin desarrollar nada</p>
      <div class="grid md:grid-cols-2 gap-x-6 gap-y-1.5 text-sm text-slate-400 mb-4">
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Facturación electrónica SRI</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Inventario con kardex</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Compras y retenciones</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Cuentas por cobrar y planes de pago</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Caja y proformas</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>ATS mensual</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Multisucursal</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Contabilidad completa y reportes fiscales</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Etiquetas de código de barras</div></div>
        <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>10 usuarios</div></div>
      </div>
      <p class="text-sm text-slate-400 leading-relaxed">Comparen esta lista contra lo que usan en TINI. <strong class="text-slate-300">Si hay algo que acá no aparezca, díganlo ahora</strong> y les decimos de una si es un ajuste, un desarrollo aparte, o una razón para quedarse en el escenario 2.</p>
    </div>

    <div class="rounded-lg border border-emerald-500/30 bg-slate-900/40 p-4 mb-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-emerald-400">La integración ya está construida y funcionando.</strong> No es un desarrollo por hacer ni una promesa: es una pieza probada que se instala y se configura. Por eso acá la fecha de entrega la ponemos nosotros y la cumplimos, sin depender del calendario de nadie más.</p>
    </div>

    <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-4 mb-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-emerald-400">No hace falta que nos crean:</strong> les mostramos el sistema funcionando, con un caso de su propia operación, antes de que decidan nada. Es media hora y se resuelven en la práctica las dudas que en papel quedan abiertas.</p>
    </div>

    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed mb-3"><strong class="text-white">Desde el año 2: $350 + IVA anuales.</strong> Es el plan Empresarial de Quipuy —facturas ilimitadas, 10 usuarios, multisucursal y contabilidad completa—. El primer año va incluido en los $1.350.</p>
      <p class="text-sm text-slate-400 leading-relaxed">Contra lo que hoy pagan por TINI, es una comparación que vale la pena que hagan ustedes con la factura en la mano.</p>
    </div>
  </div>

  <!-- Ancla de precio -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-4">
    <h3 class="text-base font-semibold text-white mb-3">Para ubicar los $2.550</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">El año pasado conectamos una tienda WooCommerce con otro sistema contable ecuatoriano de este mismo alcance. Lo que costó armar esa operación, sin la página web:</p>
    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4 mb-4">
      <div class="flex justify-between items-baseline py-2 border-b border-slate-800/60 text-sm"><span class="text-slate-400">Sistema contable</span><strong class="text-white">$4.000</strong></div>
      <div class="flex justify-between items-baseline py-2 border-b border-slate-800/60 text-sm"><span class="text-slate-400">Desarrollo adicional para su operación</span><strong class="text-white">$700</strong></div>
      <div class="flex justify-between items-baseline py-2 text-sm"><span class="text-slate-400">Renovación anual</span><strong class="text-white">$300</strong></div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed">Casi <strong class="text-white">$4.700 la primera vez</strong>, contra $1.350 acá — y con la página web incluida el total sigue quedando por debajo. <strong class="text-white">La renovación anual, en cambio, es prácticamente la misma:</strong> $300 allá, $350 acá. Se lo decimos para que quede claro dónde está la diferencia y dónde no.</p>
  </div>

  <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-6 mb-10">
    <h3 class="text-base font-semibold text-white mb-3">Por qué recomendamos este escenario</h3>
    <ul class="space-y-3 text-sm text-slate-300">
      <li class="flex gap-3"><span class="text-emerald-400 mt-0.5">1</span><div><strong class="text-white">Es el único con fecha firme.</strong> En los otros dos, el día en que la facturación quede automática depende de un tercero. Acá no hay tercero.</div></li>
      <li class="flex gap-3"><span class="text-emerald-400 mt-0.5">2</span><div><strong class="text-white">Es el único que se acomoda a ustedes.</strong> En los escenarios 1 y 2, si TINI no hace algo que necesitan, no hay conversación posible. Acá sí, y ya está pagada.</div></li>
      <li class="flex gap-3"><span class="text-emerald-400 mt-0.5">3</span><div><strong class="text-white">Un solo responsable.</strong> La tienda, el sistema contable y la conexión entre ambos los hace el mismo equipo. No hay dos proveedores señalándose entre sí.</div></li>
      <li class="flex gap-3"><span class="text-emerald-400 mt-0.5">4</span><div><strong class="text-white">No quedan amarrados.</strong> Si más adelante prefieren volver a TINI, la tienda queda hecha igual y el conector se cotiza aparte. Sus datos salen en formato del SRI cuando quieran.</div></li>
    </ul>
  </div>

  <div class="rounded-xl border border-marca-500/40 bg-marca-500/10 p-6 mb-10">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-3">
      <div class="flex-1 min-w-[240px]">
        <span class="text-[10px] font-mono uppercase tracking-widest bg-marca-500/25 text-marca-300 px-2 py-1 rounded">Antes de firmar</span>
        <h3 class="text-lg font-semibold text-white mt-3">Paso previo: comparar Quipuy contra lo que hacen en TINI</h3>
      </div>
      <div class="text-right">
        <p class="text-2xl font-bold text-marca-400">Sin costo</p>
        <p class="text-xs text-slate-500">2 a 3 días</p>
      </div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Llevan quince años operando con TINI y hay procesos suyos que nosotros todavía no conocemos. <strong class="text-white">Ese es el único riesgo real del escenario 3</strong>, y la manera de resolverlo no es prometer que todo va a estar cubierto: es revisarlo antes de que pongan un dólar.</p>
    <ul class="space-y-3 text-sm text-slate-300 mb-4">
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">1</span><div>Nos sentamos con quien usa TINI todos los días y anotamos qué módulos abre, qué reportes saca y qué pasos del proceso pasan por ahí.</div></li>
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">2</span><div>Marcamos cada punto en tres columnas: <strong class="text-white">lo cubre Quipuy tal cual</strong>, <strong class="text-white">es un ajuste incluido</strong>, o <strong class="text-white">es un desarrollo aparte</strong>.</div></li>
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">3</span><div>Les entregamos esa lista. Si aparece un desarrollo aparte, va con su valor y su plazo antes de que decidan nada.</div></li>
    </ul>
    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed">Puede pasar perfectamente que de esa revisión salga que <strong class="text-white">les conviene el escenario 2 y quedarse en TINI</strong>. Si es así se los vamos a decir, aunque nos convenga menos. Preferimos eso a entregarles un sistema al que le falte algo que usan todos los días.</p>
    </div>
  </div>

  <!-- ══════════ QUÉ INCLUYE LA TIENDA NUEVA ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Qué incluye la tienda nueva</h2>
  <p class="text-sm text-slate-400 mb-6">Aplica igual a los escenarios 2 y 3. Construida sobre WooCommerce, con los 2.109 productos migrados.</p>

  <div class="rounded-xl border border-marca-500/30 bg-gradient-to-br from-marca-500/10 to-transparent p-6 mb-10">
    <div class="grid md:grid-cols-2 gap-x-6 gap-y-2 text-sm text-slate-300">
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Diseño propio, no plantilla comprada</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Migración de los 2.109 productos</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Buscador rápido con filtros por categoría, marca y precio</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Fichas de producto optimizadas</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Carrito y proceso de compra simplificado</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Optimización de velocidad e imágenes</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Adaptada a celular, tablet y computadora</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Pasarela de pagos configurada</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Cálculo de envíos</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Correos automáticos de pedido al cliente</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Panel para que su equipo administre solo</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Medición de visitas, ventas y contactos</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Configuración inicial para Google</div></div>
      <div class="flex gap-2"><span class="text-marca-400">✓</span><div>Capacitación al equipo</div></div>
    </div>
  </div>

  <!-- ══════════ MÓDULO OPCIONAL B2B ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Módulo opcional</h2>
  <p class="text-sm text-slate-400 mb-6">Se puede sumar a cualquiera de los tres escenarios, ahora o más adelante.</p>

  <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-6 mb-10">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-3">
      <div class="flex-1 min-w-[240px]">
        <span class="text-[10px] font-mono uppercase tracking-widest bg-marca-500/25 text-marca-300 px-2 py-1 rounded">Dos negocios, una tienda</span>
        <h3 class="text-lg font-semibold text-white mt-3">Venta a empresas y a público, en el mismo sitio</h3>
      </div>
      <div class="text-right">
        <p class="text-3xl font-bold text-white">$520</p>
        <p class="text-xs text-slate-500">+ IVA</p>
        <p class="text-xs text-marca-400 mt-1">$470 junto al escenario 2 o 3</p>
      </div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed mb-5">Hoy un mayorista y un cliente final ven exactamente lo mismo. Este módulo separa los dos mundos <strong class="text-white">sin necesidad de tener dos tiendas</strong>: la misma web se comporta distinto según quién esté mirando.</p>

    <div class="grid md:grid-cols-2 gap-4 mb-5">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-5">
        <p class="font-mono text-[10px] tracking-widest uppercase text-marca-400 mb-2">Cliente final &middot; B2C</p>
        <p class="text-white font-semibold mb-3 text-sm">Compra normal, como cualquier tienda</p>
        <ul class="space-y-2 text-sm text-slate-400">
          <li class="flex gap-2"><span class="text-marca-400">›</span><div>Ve los precios de venta al público</div></li>
          <li class="flex gap-2"><span class="text-marca-400">›</span><div>Compra sin registrarse</div></li>
          <li class="flex gap-2"><span class="text-marca-400">›</span><div>Paga en línea con tarjeta o transferencia</div></li>
        </ul>
      </div>
      <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/5 p-5">
        <p class="font-mono text-[10px] tracking-widest uppercase text-emerald-400 mb-2">Empresa &middot; B2B</p>
        <p class="text-white font-semibold mb-3 text-sm">Acceso aprobado por ustedes</p>
        <ul class="space-y-2 text-sm text-slate-400">
          <li class="flex gap-2"><span class="text-emerald-400">›</span><div>Solicita su cuenta con RUC y datos de la empresa</div></li>
          <li class="flex gap-2"><span class="text-emerald-400">›</span><div><strong class="text-slate-300">Ustedes aprueban o rechazan</strong> cada solicitud</div></li>
          <li class="flex gap-2"><span class="text-emerald-400">›</span><div>Recién ahí ve los precios de mayorista</div></li>
        </ul>
      </div>
    </div>

    <h4 class="text-sm font-semibold text-white mb-3">Cómo funciona en la práctica</h4>
    <ul class="space-y-3 text-sm text-slate-300 mb-5">
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">1</span><div><strong class="text-white">Los precios de mayorista están ocultos.</strong> Quien no tiene cuenta aprobada no los ve — ni entrando por Google, ni compartiendo el enlace. En su lugar aparece un botón para solicitar acceso.</div></li>
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">2</span><div><strong class="text-white">La empresa se registra y queda en espera.</strong> Ustedes reciben la solicitud con el RUC y los datos, y deciden. Nadie entra al canal mayorista sin su aprobación.</div></li>
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">3</span><div><strong class="text-white">Al aprobarla, la tienda cambia para ese cliente.</strong> Entra con su usuario y ve sus precios, sus condiciones y sus mínimos de compra. El resto del mundo sigue viendo el precio normal.</div></li>
      <li class="flex gap-3"><span class="text-marca-400 mt-0.5">4</span><div><strong class="text-white">Reglas de descuento por cliente.</strong> Pueden dar un porcentaje distinto a cada empresa, o por categoría de producto, o por volumen de compra. Un distribuidor grande no tiene por qué ver lo mismo que uno que recién empieza.</div></li>
    </ul>

    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-white">Lo importante:</strong> su equipo administra todo desde el mismo panel. Aprobar una empresa, cambiarle el descuento o suspenderle el acceso son tres clics, sin depender de nosotros.</p>
    </div>
  </div>

  <!-- ══════════ PAGO Y PLAZOS ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-6">Forma de pago y plazos</h2>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <div class="grid md:grid-cols-2 gap-4 mb-6">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Para empezar</p>
        <p class="text-2xl font-bold text-white">60 %</p>
      </div>
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Al entregar funcionando</p>
        <p class="text-2xl font-bold text-white">40 %</p>
      </div>
    </div>

    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-5 mb-4">
      <p class="font-mono text-[10px] tracking-widest uppercase text-slate-500 mb-3">Escenario 1</p>
      <div class="space-y-2 text-sm">
        <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-24">Semana 1</span><div class="text-slate-300">Revisión de la documentación de TINI y de la tienda actual.</div></div>
        <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-24">Semana 2&ndash;3</span><div class="text-slate-300">Desarrollo del conector y pruebas con pedidos reales.</div></div>
      </div>
      <p class="text-sm text-slate-400 leading-relaxed mt-4"><strong class="text-slate-300">Dos a tres semanas de nuestro lado.</strong> La fecha en que quede andando depende además de cuándo TINI tenga lista su parte.</p>
    </div>

    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-5 mb-4">
      <p class="font-mono text-[10px] tracking-widest uppercase text-slate-500 mb-3">Escenarios 2 y 3</p>
      <div class="space-y-2 text-sm">
        <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-24">Semana 1&ndash;2</span><div class="text-slate-300">Diseño y estructura de la tienda para su revisión.</div></div>
        <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-24">Semana 3&ndash;4</span><div class="text-slate-300">Desarrollo, migración de los 2.109 productos y optimización.</div></div>
        <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-24">Semana 5</span><div class="text-slate-300">Facturación e inventario, y el módulo opcional si lo contratan.</div></div>
        <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-0.5 w-24">Semana 6</span><div class="text-slate-300">Pruebas, capacitación y salida en vivo.</div></div>
      </div>
      <p class="text-sm text-slate-400 leading-relaxed mt-4"><strong class="text-slate-300">Seis semanas.</strong> En el escenario 3 esa fecha es firme, porque la integración ya está construida. En el escenario 2, la semana 5 puede correrse según el equipo de TINI.</p>
      <p class="text-sm text-slate-400 leading-relaxed mt-3">En el escenario 3 estas seis semanas empiezan a contar <strong class="text-slate-300">después del paso previo</strong>, que se hace antes de firmar y no tiene costo. Si de ahí sale algún desarrollo aparte, se suma al plazo con su propio valor, ya conversado.</p>
    </div>

    <p class="text-sm text-slate-400 leading-relaxed">La tienda actual sigue funcionando mientras tanto: el cambio se hace recién cuando la nueva está probada.</p>
  </div>

  <!-- ══════════ NO INCLUYE ══════════ -->
  <div class="rounded-xl border border-slate-700/50 bg-slate-900/30 p-6 mb-10">
    <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
    <ul class="space-y-2 text-sm text-slate-400">
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Fotografía de producto ni edición de imágenes existentes</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Redacción de descripciones para los 2.109 productos</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Costos de pasarela de pagos ni comisiones bancarias</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>La suscripción anual del sistema de facturación <span class="text-xs">(en el escenario 3, el primer año va incluido y la renovación es de $350 + IVA desde el año 2)</span></div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Desarrollos que TINI tenga que hacer de su lado</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Módulos que Quipuy hoy no tenga y que su operación necesite <span class="text-xs">(se identifican en el paso previo y se cotizan aparte, antes de firmar; los ajustes de configuración, reportes y formatos sí van incluidos)</span></div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Migración del historial contable que tengan cargado en TINI <span class="text-xs">(se cotiza según el volumen y en qué formato lo puedan exportar)</span></div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Alojamiento y dominio <span class="text-xs">(se cotizan aparte según el tráfico que necesiten)</span></div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Plan de posicionamiento en Google <span class="text-xs">(se puede cotizar por separado)</span></div></li>
    </ul>
  </div>

  <!-- ══════════ EXPERIENCIA ══════════ -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-4">Por qué nosotros</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Trabajamos tiendas en línea sobre WooCommerce con catálogos grandes y necesidades de mayorista, y desarrollamos las integraciones de facturación electrónica nosotros mismos — no las tercerizamos ni dependemos de un plugin de terceros que mañana deje de actualizarse.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">El módulo de conexión con Quipuy está construido y en uso, y Quipuy es un producto nuestro. Hicimos también la misma integración contra otro sistema contable ecuatoriano distinto —el de los $4.700 que aparece arriba—, así que el problema de conectar WooCommerce con un facturador electrónico del país ya lo resolvimos desde los dos lados: desarrollando el sistema y desarrollando el conector hacia uno ajeno. Es por eso que podemos decirles con confianza qué se puede prometer con TINI y qué no.</p>
    <p class="text-sm text-slate-400 leading-relaxed">Además llevamos planes de contenido y posicionamiento para varios clientes en Ecuador, así que la tienda no se entrega y se abandona: sabemos qué hace falta después para que la encuentren.</p>
  </div>

  <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-6 text-center">
    <p class="text-sm text-slate-300 mb-4">Cualquier duda sobre esta propuesta, con gusto la conversamos.</p>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20de%20la%20tienda%20en%20linea" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-marca-600 to-marca-500 text-white font-semibold text-sm hover:brightness-110 transition">Escribir por WhatsApp</a>
    <p class="text-xs text-slate-500 mt-5">Creative Web &middot; Otavalo, Ecuador &middot; agosto de 2026</p>
  </div>

</div>
</body>
</html>
