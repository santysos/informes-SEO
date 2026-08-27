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
<title>Desarrollo de tienda en línea &mdash; Vaslink</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{marca:{400:'#60a5fa',500:'#3b82f6',600:'#2563eb'}}
}}}
</script>
<style>
body{background:radial-gradient(1100px 720px at 25% 0%, rgba(59,130,246,.14), transparent 60%), #0a0f16;}
.glass{background:rgba(17,26,36,.55);backdrop-filter:blur(18px)}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<div class="max-w-4xl mx-auto px-5 py-12">

  <div class="flex items-start justify-between gap-4 mb-10">
    <div>
      <p class="font-mono text-[10.5px] tracking-[.2em] uppercase text-marca-400 mb-2">Creative Web &middot; Propuesta</p>
      <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">Desarrollo de la nueva<br>tienda en línea</h1>
      <p class="text-slate-400 mt-3 text-sm">Preparado para <strong class="text-slate-300">Vaslink</strong> &middot; agosto de 2026</p>
    </div>
    <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
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

  <!-- ══════════ PROPUESTA ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Qué proponemos</h2>
  <p class="text-sm text-slate-400 mb-6">Una tienda nueva, construida sobre WooCommerce, con los 2.109 productos migrados y la experiencia de compra rehecha.</p>

  <div class="rounded-xl border border-marca-500/30 bg-gradient-to-br from-marca-500/10 to-transparent p-6 mb-6">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-5">
      <div>
        <p class="font-mono text-[10px] tracking-widest uppercase text-marca-400 mb-1">Base del proyecto</p>
        <h3 class="text-xl font-semibold text-white">Tienda en línea completa</h3>
      </div>
      <div class="text-right">
        <p class="text-xs text-slate-500">desde</p>
        <p class="text-4xl font-bold text-white">$1.200</p>
        <p class="text-xs text-slate-500">+ IVA</p>
      </div>
    </div>
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

  <!-- ══════════ MÓDULOS ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Módulos e integraciones</h2>
  <p class="text-sm text-slate-400 mb-6">Se suman a la base según lo que necesiten. Cada uno se puede agregar ahora o más adelante.</p>

  <!-- Quipuy destacado -->
  <div class="rounded-xl border border-emerald-500/40 bg-emerald-500/10 p-6 mb-4">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-3">
      <div class="flex-1 min-w-[240px]">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-[10px] font-mono uppercase tracking-widest bg-emerald-500/25 text-emerald-300 px-2 py-1 rounded">Ya desarrollado</span>
        </div>
        <h3 class="text-lg font-semibold text-white">Facturación electrónica e inventario en tiempo real</h3>
      </div>
      <div class="text-right">
        <p class="text-3xl font-bold text-emerald-400">$480</p>
        <p class="text-xs text-slate-500">+ IVA</p>
      </div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Conecta la tienda con su sistema de facturación. Cuando entra un pedido, <strong class="text-white">se emite la factura electrónica sola y el inventario se descuenta al instante</strong>, sin que nadie tenga que copiar datos de un sistema a otro.</p>
    <div class="grid md:grid-cols-2 gap-3 text-sm text-slate-300 mb-4">
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Factura emitida y enviada automáticamente</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Inventario sincronizado en ambos sentidos</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Sin doble digitación ni errores de tipeo</div></div>
      <div class="flex gap-2"><span class="text-emerald-400">✓</span><div>Registro de cada envío para auditoría</div></div>
    </div>
    <div class="rounded-lg border border-emerald-500/30 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-emerald-400">Este módulo ya está construido y funcionando</strong> con Quipuy, uno de los proveedores de facturación electrónica autorizados en Ecuador. No es un desarrollo por hacer: es una pieza probada que se instala y se configura.</p>
    </div>
  </div>

  <!-- TINI -->
  <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-6 mb-4">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-3">
      <div class="flex-1 min-w-[240px]">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-[10px] font-mono uppercase tracking-widest bg-marca-500/25 text-marca-300 px-2 py-1 rounded">A medida</span>
        </div>
        <h3 class="text-lg font-semibold text-white">Integración con TINI</h3>
      </div>
      <div class="text-right">
        <p class="text-xs text-slate-500">desde</p>
        <p class="text-3xl font-bold text-white">$480</p>
        <p class="text-xs text-slate-500">+ IVA</p>
      </div>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Si prefieren seguir con TINI, desarrollamos la misma conexión contra ese sistema: factura automática al confirmarse el pedido e inventario sincronizado.</p>
    <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-white">Ya hicimos esta integración con dos sistemas de facturación distintos.</strong> La lógica de conexión está resuelta y probada; lo que cambia entre uno y otro es la forma en que cada sistema recibe los datos. Por eso el precio parte del mismo valor.</p>
      <p class="text-sm text-slate-400 leading-relaxed mt-3">Para confirmar el valor final necesitamos revisar la documentación técnica de TINI y saber si permite conexión externa. <strong class="text-slate-300">Esa revisión no tiene costo</strong> y toma dos o tres días.</p>
    </div>
  </div>

  <!-- B2B + B2C -->
  <div class="rounded-xl border border-marca-500/30 bg-marca-500/5 p-6 mb-4">
    <div class="flex items-start justify-between gap-4 flex-wrap mb-3">
      <div class="flex-1 min-w-[240px]">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-[10px] font-mono uppercase tracking-widest bg-marca-500/25 text-marca-300 px-2 py-1 rounded">Dos negocios, una tienda</span>
        </div>
        <h3 class="text-lg font-semibold text-white">Venta a empresas y a público, en el mismo sitio</h3>
      </div>
      <div class="text-right">
        <p class="text-3xl font-bold text-white">$520</p>
        <p class="text-xs text-slate-500">+ IVA</p>
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

  <!-- Ejemplos de armado -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-4">Tres formas de armarlo</h3>
    <div class="grid md:grid-cols-3 gap-4">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-5 flex flex-col">
        <p class="text-white font-semibold mb-1">Para arrancar</p>
        <p class="text-xs text-slate-500 mb-4">La tienda nueva funcionando</p>
        <ul class="space-y-1 text-sm text-slate-400 mb-4">
          <li>› Tienda completa</li>
        </ul>
        <div class="mt-auto pt-4 border-t border-slate-800">
          <p class="text-2xl font-bold text-white">$1.200</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-5 flex flex-col">
        <p class="text-white font-semibold mb-1">Con facturación</p>
        <p class="text-xs text-slate-500 mb-4">Sin volver a digitar una factura</p>
        <ul class="space-y-1 text-sm text-slate-400 mb-4">
          <li>› Tienda completa</li>
          <li>› Facturación e inventario</li>
        </ul>
        <div class="mt-auto pt-4 border-t border-slate-800">
          <p class="text-2xl font-bold text-white">$1.680</p>
          <p class="text-xs text-slate-500">+ IVA</p>
        </div>
      </div>
      <div class="rounded-lg border border-marca-500/40 bg-marca-500/10 p-5 flex flex-col">
        <p class="text-white font-semibold mb-1">Completo</p>
        <p class="text-xs text-slate-500 mb-4">Mayoristas y facturación incluidos</p>
        <ul class="space-y-1 text-sm text-slate-400 mb-4">
          <li>› Tienda completa</li>
          <li>› Facturación e inventario</li>
          <li>› Venta a empresas y a público</li>
        </ul>
        <div class="mt-auto pt-4 border-t border-slate-700">
          <p class="text-2xl font-bold text-marca-400">$2.100</p>
          <p class="text-xs text-slate-500">+ IVA · con 10 % de descuento en los módulos</p>
        </div>
      </div>
    </div>
    <p class="text-xs text-slate-500 mt-4">Son ejemplos para dimensionar. Si contratan dos o más módulos junto con la base. se aplica un <strong class="text-slate-400">10 % de descuento sobre el total de módulos</strong>.</p>
  </div>

  <!-- Forma de pago -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-4">Forma de pago y plazos</h3>
    <div class="grid md:grid-cols-2 gap-4 mb-5">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Para empezar</p>
        <p class="text-2xl font-bold text-white">60 %</p>
      </div>
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-xs text-slate-500 mb-1">Al entregar funcionando</p>
        <p class="text-2xl font-bold text-white">40 %</p>
      </div>
    </div>
    <div class="space-y-3 text-sm">
      <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-1 w-24">Semana 1&ndash;2</span><div class="text-slate-300">Diseño y estructura de la tienda para su revisión.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-1 w-24">Semana 3&ndash;4</span><div class="text-slate-300">Desarrollo, migración de los 2.109 productos y optimización.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-1 w-24">Semana 5</span><div class="text-slate-300">Módulos e integraciones contratadas.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-marca-400 whitespace-nowrap mt-1 w-24">Semana 6</span><div class="text-slate-300">Pruebas, capacitación y salida en vivo.</div></div>
    </div>
    <p class="text-sm text-slate-400 leading-relaxed mt-5"><strong class="text-slate-300">Seis semanas</strong> para la tienda base. Los módulos pueden alargar el plazo una o dos semanas según cuáles se contraten. La tienda actual sigue funcionando mientras tanto: el cambio se hace cuando la nueva está probada.</p>
  </div>

  <!-- Qué no incluye -->
  <div class="rounded-xl border border-slate-700/50 bg-slate-900/30 p-6 mb-10">
    <h3 class="text-sm font-semibold text-slate-400 mb-3">Qué no está incluido</h3>
    <ul class="space-y-2 text-sm text-slate-400">
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Fotografía de producto ni edición de imágenes existentes</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Redacción de descripciones para los 2.109 productos</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Costos de pasarela de pagos ni comisiones bancarias</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Licencias del sistema de facturación electrónica</div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Alojamiento y dominio <span class="text-xs">(se cotizan aparte según el tráfico que necesiten)</span></div></li>
      <li class="flex gap-2"><span class="text-slate-600">·</span><div>Plan de posicionamiento en Google <span class="text-xs">(se puede cotizar por separado)</span></div></li>
    </ul>
  </div>

  <!-- Experiencia -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-4">Por qué nosotros</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Trabajamos tiendas en línea sobre WooCommerce con catálogos grandes y necesidades de mayorista, y desarrollamos las integraciones de facturación electrónica nosotros mismos — no las tercerizamos ni dependemos de un plugin de terceros que mañana deje de actualizarse.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">El módulo de facturación con Quipuy que se menciona arriba está construido y en uso. Hicimos también la misma integración contra otro sistema de facturación distinto, así que el problema de conectar WooCommerce con un facturador electrónico ecuatoriano ya lo resolvimos dos veces.</p>
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
