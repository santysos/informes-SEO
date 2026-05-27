<?php
session_start();
if (!isset($_SESSION['auth_cotacachi_proforma']) || $_SESSION['auth_cotacachi_proforma'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es-EC">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Propuesta — Plataforma de Inscripciones Deportivas · Cotacachi</title>
<meta name="robots" content="noindex, nofollow">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&family=Anton&display=swap" rel="stylesheet">
<style>
    :root {
      --bg-deep: #060D0A;
      --bg-base: #0F1B16;
      --bg-elevated: #1A2620;
      --bg-panel: #243430;
      --bg-line: #2F4239;
      --emerald-300: #6EE7B7;
      --emerald-400: #34D399;
      --emerald-500: #10B981;
      --emerald-600: #059669;
      --emerald-700: #047857;
      --emerald-deep: #064E3B;
      --gold-300: #FCD34D;
      --gold-400: #FBBF24;
      --gold-500: #D4A332;
      --gold-600: #B08925;
      --fg: #FAFAFA;
      --fg-sec: #D1D5DB;
      --fg-mut: #9CA3AF;
    }
    * { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Outfit', sans-serif; letter-spacing: -0.02em; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    .font-trail { font-family: 'Anton', sans-serif; letter-spacing: 0.01em; }
    body {
        background: var(--bg-base);
        color: var(--fg);
        background-image:
          radial-gradient(900px 600px at 90% -10%, rgba(16,185,129,0.10), transparent 60%),
          radial-gradient(700px 500px at -5% 80%, rgba(6,78,59,0.18), transparent 55%);
        background-attachment: fixed;
    }
    .glass {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(255,255,255,0.10);
    }
    .glass-emerald {
        background: linear-gradient(135deg, rgba(16,185,129,0.10), rgba(255,255,255,0.02));
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(52,211,153,0.25);
    }
    .glass-gold {
        background: linear-gradient(135deg, rgba(212,163,50,0.10), rgba(255,255,255,0.02));
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(212,163,50,0.30);
    }

    .pill {
        display:inline-flex; align-items:center; gap:6px;
        padding:4px 10px; border-radius:6px;
        font-family:'JetBrains Mono',monospace;
        font-size:10px; font-weight:600;
        text-transform:uppercase; letter-spacing:0.10em;
    }
    .pill-emerald { background:rgba(16,185,129,0.12); color:#6EE7B7; border:1px solid rgba(16,185,129,0.30); }
    .pill-gold    { background:rgba(212,163,50,0.12); color:#FCD34D; border:1px solid rgba(212,163,50,0.30); }
    .pill-red     { background:rgba(239,68,68,0.10); color:#FCA5A5; border:1px solid rgba(239,68,68,0.25); }

    .feature-card {
        background: var(--bg-panel);
        border:1px solid rgba(255,255,255,0.08);
        border-radius:16px;
        padding:24px;
        transition: all .25s ease;
    }
    .feature-card:hover { border-color: rgba(52,211,153,0.35); transform: translateY(-2px); }

    /* Mockup Intag Trail look */
    .intag-mockup {
        background: linear-gradient(180deg, #0E1410 0%, #1A2218 100%);
        border: 1px solid rgba(212,163,50,0.25);
        border-radius: 20px;
        overflow: hidden;
        position: relative;
    }
    .intag-mockup .it-stats-bar {
        background: #1A2616;
        border-top: 2px solid #D4A332;
        border-bottom: 2px solid #D4A332;
    }

    .timeline-dot {
        width: 14px; height: 14px;
        background: var(--emerald-500);
        border-radius: 50%;
        box-shadow: 0 0 20px rgba(52,211,153,0.5);
    }

    /* Print */
    @media print {
        body { background: white !important; color: black !important; }
        .no-print { display: none !important; }
        .glass, .glass-emerald, .glass-gold, .feature-card { background: white !important; border-color: #ddd !important; color: black !important; }
        h1, h2, h3, p, li, td, th { color: black !important; }
        section { page-break-inside: avoid; }
    }

    ::-webkit-scrollbar { width: 10px; height: 10px; }
    ::-webkit-scrollbar-track { background: var(--bg-base); }
    ::-webkit-scrollbar-thumb { background: var(--bg-line); border-radius: 5px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--emerald-700); }

    html { scroll-behavior: smooth; }
</style>
</head>
<body>

<!-- HEADER -->
<header class="sticky top-0 z-50 glass border-b border-emerald-900/40 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background:linear-gradient(135deg,#10B981,#064E3B); box-shadow:0 0 20px rgba(52,211,153,0.25);">
                    <span class="font-display font-extrabold text-white text-lg">cw</span>
                </div>
                <div>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-400">Propuesta</p>
                    <h1 class="font-display text-lg font-bold text-white leading-tight">Plataforma de Inscripciones Deportivas</h1>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="hidden md:block text-right">
                    <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500">Cliente</p>
                    <p class="text-sm font-medium text-white">Municipio de Cotacachi</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-slate-800/60 hover:bg-slate-700/60 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>

        <nav class="mt-3 -mb-1 overflow-x-auto">
            <div class="flex gap-1 min-w-max text-xs">
                <a href="#hero" class="px-3 py-2 text-slate-300 hover:text-emerald-400 transition font-medium">Inicio</a>
                <a href="#resumen" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Resumen</a>
                <a href="#reto" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">El reto</a>
                <a href="#modulos" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Módulos</a>
                <a href="#comparativa" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Comparativa</a>
                <a href="#intag" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Intag Trail</a>
                <a href="#multievento" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Multi-evento</a>
                <a href="#inversion" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Inversión</a>
                <a href="#cronograma" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Cronograma</a>
                <a href="#cierre" class="px-3 py-2 text-slate-400 hover:text-emerald-400 transition font-medium">Próximos pasos</a>
            </div>
        </nav>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6">

<!-- HERO -->
<section id="hero" class="py-16 md:py-24">
    <div class="mb-6">
        <span class="pill pill-emerald">Propuesta confidencial · Mayo 2026</span>
    </div>
    <h1 class="font-display text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-[1.05]">
        Una plataforma profesional<br>
        para todos los eventos<br>
        deportivos de <span style="color:#34D399;">Cotacachi.</span>
    </h1>
    <p class="text-lg md:text-xl text-slate-300 max-w-3xl leading-relaxed mb-10">
        Sistema dedicado de inscripciones, pagos y gestión de corredores. Construido específicamente para carreras de trail running y eventos deportivos. Operado bajo administración técnica de Creative Web.
    </p>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl">
        <div class="glass rounded-xl p-5">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Primer evento</p>
            <p class="font-display text-2xl font-bold text-white">Intag Trail</p>
            <p class="font-mono text-xs text-emerald-400 mt-1">9·10·11 Oct 2026</p>
        </div>
        <div class="glass rounded-xl p-5">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Distancias</p>
            <p class="font-display text-2xl font-bold text-white">5 rutas</p>
            <p class="font-mono text-xs text-emerald-400 mt-1">7K · 20K · 26K · 40K · 87K</p>
        </div>
        <div class="glass rounded-xl p-5">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Corredores esperados</p>
            <p class="font-display text-2xl font-bold text-white">500–1.000</p>
            <p class="font-mono text-xs text-emerald-400 mt-1">por edición</p>
        </div>
        <div class="glass-gold rounded-xl p-5">
            <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-2">Homologación</p>
            <p class="font-display text-2xl font-bold text-white">UTMB Index</p>
            <p class="font-mono text-xs text-yellow-200 mt-1">Atrae internacional</p>
        </div>
    </div>
</section>

<!-- RESUMEN EJECUTIVO -->
<section id="resumen" class="py-16">
    <span class="pill pill-emerald mb-4">Resumen ejecutivo</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-8 leading-tight">Lo que proponemos en 3 líneas</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="glass rounded-2xl p-6">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background:rgba(16,185,129,0.15);">
                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-400 mb-2">Una plataforma · varios eventos</p>
            <h3 class="font-display text-xl font-bold text-white mb-2">No es una página web. Es un sistema operativo.</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Una sola plataforma que el municipio activa para Intag Trail, Travesía Cuicocha y los próximos eventos deportivos del cantón. Sin tener que volver a contratar para cada carrera.</p>
        </div>
        <div class="glass rounded-2xl p-6">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background:rgba(16,185,129,0.15);">
                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-400 mb-2">Hecha para trail</p>
            <h3 class="font-display text-xl font-bold text-white mb-2">No es WordPress maquillado.</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Es software dedicado: panel de inscripciones nativo, contador de cupos con lock atómico, visor de rutas GPX, pasarela integrada, base de datos real. Diseñado para soportar 1.000 inscripciones simultáneas sin caerse.</p>
        </div>
        <div class="glass rounded-2xl p-6">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background:rgba(16,185,129,0.15);">
                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-400 mb-2">Operada por nosotros</p>
            <h3 class="font-display text-xl font-bold text-white mb-2">El municipio usa. Nosotros operamos.</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Modelo SaaS profesional. Creative Web administra la infraestructura técnica (hosting, base de datos, actualizaciones, seguridad). El municipio solo accede al panel para gestionar eventos.</p>
        </div>
    </div>
</section>

<!-- EL RETO -->
<section id="reto" class="py-16">
    <span class="pill pill-emerald mb-4">El contexto</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-8 leading-tight">Por qué Intag Trail necesita una plataforma seria</h2>

    <div class="glass-gold rounded-2xl p-6 md:p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <div>
                <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-2">Diferenciador clave</p>
                <h3 class="font-display text-2xl md:text-3xl font-bold text-white mb-3">Es una carrera UTMB Index Race</h3>
                <p class="text-slate-300 text-sm md:text-base leading-relaxed">Intag Trail está homologada al <strong class="text-white">circuito UTMB</strong> (Ultra-Trail du Mont-Blanc), el más prestigioso del mundo. Los corredores que terminen reciben puntos que les sirven para clasificar a carreras internacionales como Chamonix, Sierra Zinal y Madeira.</p>
                <p class="text-slate-300 text-sm md:text-base leading-relaxed mt-3"><strong class="text-yellow-300">Esto cambia todo:</strong> el evento atrae corredores internacionales. Y los corredores internacionales esperan una experiencia de inscripción de nivel internacional — flujo claro, pago seguro, confirmación inmediata por correo, certificado descargable post-evento.</p>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-4 text-center">
                    <p class="font-display text-3xl font-extrabold text-yellow-300">500-1.000</p>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-200/70 mt-1">corredores esperados</p>
                </div>
                <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-4 text-center">
                    <p class="font-display text-3xl font-extrabold text-yellow-300">87 km</p>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-200/70 mt-1">distancia ultra</p>
                </div>
                <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-4 text-center">
                    <p class="font-display text-3xl font-extrabold text-yellow-300">5</p>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-200/70 mt-1">distancias</p>
                </div>
                <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-4 text-center">
                    <p class="font-display text-3xl font-extrabold text-yellow-300">3 días</p>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-200/70 mt-1">9·10·11 oct</p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="font-display text-xl font-bold text-white mb-4">Los retos digitales concretos</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="feature-card">
            <p class="font-mono text-[10px] uppercase tracking-widest text-red-400 mb-2">Reto 1</p>
            <h4 class="font-display text-lg font-bold text-white mb-2">El día del lanzamiento de inscripciones</h4>
            <p class="text-slate-400 text-sm leading-relaxed">Cientos de corredores intentan inscribirse en la misma hora. Un sistema mal hecho colapsa, sobrevende cupos, o cobra dos veces. Nuestra plataforma maneja inscripciones concurrentes con bloqueo atómico de cupos.</p>
        </div>
        <div class="feature-card">
            <p class="font-mono text-[10px] uppercase tracking-widest text-red-400 mb-2">Reto 2</p>
            <h4 class="font-display text-lg font-bold text-white mb-2">5 distancias con 5 lógicas distintas</h4>
            <p class="text-slate-400 text-sm leading-relaxed">Cada ruta tiene precio distinto ($20 a $80), GPX propio, capacidad propia, ficha técnica, abastos, materiales obligatorios. Configurarlas todas en plugins genéricos toma semanas. Nuestra plataforma las maneja desde un panel dedicado.</p>
        </div>
        <div class="feature-card">
            <p class="font-mono text-[10px] uppercase tracking-widest text-red-400 mb-2">Reto 3</p>
            <h4 class="font-display text-lg font-bold text-white mb-2">Pagos con factura electrónica</h4>
            <p class="text-slate-400 text-sm leading-relaxed">Cada inscrito necesita comprobante. La pasarela debe acreditar pagos automáticamente y emitir confirmación. Integración nativa con Datafast o PayPhone Ecuador.</p>
        </div>
        <div class="feature-card">
            <p class="font-mono text-[10px] uppercase tracking-widest text-red-400 mb-2">Reto 4</p>
            <h4 class="font-display text-lg font-bold text-white mb-2">Comunicación masiva con corredores</h4>
            <p class="text-slate-400 text-sm leading-relaxed">800 correos de confirmación, recordatorios pre-evento, instrucciones logísticas, agradecimiento post-evento. Todo automatizado, segmentado por distancia.</p>
        </div>
        <div class="feature-card">
            <p class="font-mono text-[10px] uppercase tracking-widest text-red-400 mb-2">Reto 5</p>
            <h4 class="font-display text-lg font-bold text-white mb-2">Entrega de kits ordenada</h4>
            <p class="text-slate-400 text-sm leading-relaxed">El día previo al evento: 800 personas vienen a retirar kit. Lista buscable, marcado de entrega, escaneo opcional de cédula, control de tallas de camiseta. Operable desde tablet.</p>
        </div>
        <div class="feature-card">
            <p class="font-mono text-[10px] uppercase tracking-widest text-red-400 mb-2">Reto 6</p>
            <h4 class="font-display text-lg font-bold text-white mb-2">Reportes para rendir cuentas</h4>
            <p class="text-slate-400 text-sm leading-relaxed">Post-evento: cuántos inscritos por distancia, ingresos totales, demografía, gastos por kit. Reporte exportable Excel para el cierre administrativo del municipio.</p>
        </div>
    </div>
</section>

<!-- MÓDULOS DEL SISTEMA -->
<section id="modulos" class="py-16">
    <span class="pill pill-emerald mb-4">Nuestra propuesta</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">Los 12 módulos que vienen incluidos</h2>
    <p class="text-slate-400 mb-10 max-w-3xl">Una plataforma completa, ya construida, lista para activar. Cada módulo está pensado para carreras de trail.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php
        $modulos = [
            ['01','Panel de inscripciones nativo','Flujo de inscripción optimizado: selección de distancia → modalidad → datos del corredor → pago. Validación en tiempo real. Una sola pantalla.','users'],
            ['02','Contador de cupos en tiempo real','Cada distancia con cupo máximo. El sistema bloquea el cupo al iniciar la inscripción y lo libera si no se completa el pago en 72 horas.','clock'],
            ['03','Pasarela de pagos integrada','Datafast, PayPhone o Kushki. El corredor paga online con tarjeta. El sistema recibe la confirmación automática y activa la inscripción.','credit-card'],
            ['04','Base de datos de corredores','Postgres real en Supabase. Cada corredor con perfil único, historial de eventos, exportable a Excel con un click.','database'],
            ['05','Correos automáticos','Confirmación al inscribirse, recordatorios pre-evento, instrucciones logísticas, certificado post-evento. Diseño profesional.','mail'],
            ['06','Visor de rutas GPX','Carga del archivo .gpx de cada distancia. El sitio muestra el mapa interactivo + perfil de elevación (D+, D-, km marcadores).','map'],
            ['07','Cupones y descuentos','Códigos de descuento configurables (early bird, residentes Cotacachi, grupos 3+, estudiantes). Aplica automáticamente en checkout.','tag'],
            ['08','Categorías por edad y género','Sub-18, 18-29, 30-39, 40-49, 50+. Por género. El sistema asigna automáticamente y genera el ranking por categoría.','grid'],
            ['09','Gestión de sponsors','Carga de auspiciantes con logo + link + nivel (Diamante, Oro, Plata). Aparecen ordenados en la web pública.','star'],
            ['10','Control de kits y tallas','Reporte de tallas vendidas para hacer pedido al proveedor. Sistema de marcado de "kit entregado" al corredor el día previo.','package'],
            ['11','Galería y ranking post-evento','Carga de fotos del evento + ranking oficial con tiempos y puntos UTMB. Visible públicamente para los corredores.','image'],
            ['12','Reportes ejecutivos','Estadísticas ejecutivas: ingresos totales, distribución por distancia, demografía. Exportable a Excel y PDF.','bar-chart'],
        ];
        foreach ($modulos as [$num,$titulo,$desc,$icon]):
        ?>
        <div class="feature-card">
            <div class="flex items-start justify-between mb-3">
                <span class="font-mono text-2xl font-bold text-emerald-400/40"><?= $num ?></span>
                <span class="w-9 h-9 rounded-lg flex items-center justify-center" style="background:rgba(16,185,129,0.15);">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <?php switch($icon){
                            case 'users': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>'; break;
                            case 'clock': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>'; break;
                            case 'credit-card': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>'; break;
                            case 'database': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>'; break;
                            case 'mail': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>'; break;
                            case 'map': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>'; break;
                            case 'tag': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>'; break;
                            case 'grid': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>'; break;
                            case 'star': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.539 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>'; break;
                            case 'package': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>'; break;
                            case 'image': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'; break;
                            case 'bar-chart': echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>'; break;
                        } ?>
                    </svg>
                </span>
            </div>
            <h3 class="font-display text-base font-bold text-white mb-2"><?= $titulo ?></h3>
            <p class="text-slate-400 text-sm leading-relaxed"><?= $desc ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- COMPARATIVA -->
<section id="comparativa" class="py-16">
    <span class="pill pill-red mb-4">Lo que no es</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">No es una página WordPress con un formulario pegado</h2>
    <p class="text-slate-400 mb-10 max-w-3xl">La diferencia entre un sistema dedicado y "una página web con plugins" se siente el día del lanzamiento de inscripciones.</p>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <!-- WP -->
        <div class="rounded-2xl p-6 md:p-8" style="background:rgba(239,68,68,0.05); border:1px solid rgba(239,68,68,0.25);">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-red-300 mb-1">La alternativa típica</p>
                    <h3 class="font-display text-2xl font-bold text-white">WordPress + plugins</h3>
                </div>
                <span class="pill pill-red">$1.500–2.500</span>
            </div>
            <ul class="space-y-3">
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Plantilla genérica de eventos (la misma que ven en 50 sitios)</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Formulario de inscripción = plugin <code class="font-mono text-xs text-red-300">WPForms</code> o similar</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Pagos = otro plugin (WooCommerce + pasarela)</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Cupos limitados = manual o tercer plugin frágil</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">GPX = cuarto plugin que rara vez funciona bien</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Base de datos = tablas WP + 10 tablas de plugins</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Riesgo de caída con tráfico simultáneo (típico WordPress + LiteSpeed)</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Cualquier plugin que se actualice mal rompe el sitio</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Cada evento es proyecto nuevo (no reutilizable)</div></li>
                <li class="flex items-start gap-2"><span class="text-red-400 font-bold flex-shrink-0">✗</span><div class="text-sm text-slate-300">Licencias anuales de plantilla + plugins ~$80/año</div></li>
            </ul>
            <div class="mt-5 pt-5 border-t border-red-500/20">
                <p class="text-xs text-red-300 font-mono uppercase tracking-widest mb-1">Resultado</p>
                <p class="text-slate-300 text-sm">Sistema frágil que necesita un técnico cada vez que algo cambia. Y si colapsa el día del lanzamiento, el evento entero pierde credibilidad.</p>
            </div>
        </div>

        <!-- Nuestra plataforma -->
        <div class="rounded-2xl p-6 md:p-8 glass-emerald" style="border-width:2px;">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-300 mb-1">Lo que ofrecemos</p>
                    <h3 class="font-display text-2xl font-bold text-white">Plataforma SaaS dedicada</h3>
                </div>
                <span class="pill pill-emerald">$4.000 año 1</span>
            </div>
            <ul class="space-y-3">
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Diseño UX/UI dedicado al flujo de inscripción</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Panel de inscripciones <strong>nativo</strong> (no plugin)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Pasarela integrada al flujo nativo</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Lock atómico de cupos (no sobreventa posible)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Visor GPX nativo con perfil de elevación</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Postgres real en Supabase (escalable, exportable)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Diseñada para 1.000+ inscripciones concurrentes</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Sin plugins frágiles que se rompan en updates</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Multi-evento: Intag Trail + Cuicocha + futuros</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Sin licencias anuales de terceros</div></li>
            </ul>
            <div class="mt-5 pt-5 border-t border-emerald-500/20">
                <p class="text-xs text-emerald-300 font-mono uppercase tracking-widest mb-1">Resultado</p>
                <p class="text-slate-200 text-sm">Sistema que opera el día del lanzamiento sin colapsar. Que se reutiliza para Cuicocha sin desarrollo nuevo. Que el municipio puede mostrar a sponsors como infraestructura cantonal.</p>
            </div>
        </div>
    </div>
</section>

<!-- INTAG TRAIL CASO -->
<section id="intag" class="py-16">
    <span class="pill pill-gold mb-4">El primer caso: Intag Trail</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">Así se verá la web del evento</h2>
    <p class="text-slate-400 mb-10 max-w-3xl">Con la línea gráfica oficial del Intag Trail: amarillo dorado sobre fondo oscuro, tipografía condensada, fotos del paisaje andino. La plataforma se adapta al brand del evento, no al revés.</p>

    <!-- Mockup Intag Trail -->
    <div class="intag-mockup mb-8">
        <!-- Header del mockup -->
        <div class="px-6 py-4 border-b border-yellow-700/30">
            <p class="font-trail text-xl uppercase tracking-wider"><span class="text-yellow-500">INTAG</span> <span class="text-stone-100">TRAIL</span></p>
        </div>
        <!-- Stats bar -->
        <div class="it-stats-bar grid grid-cols-2 md:grid-cols-5 gap-6 px-6 py-5 text-center">
            <div><p class="font-trail text-3xl text-stone-100">5</p><p class="font-mono text-[10px] uppercase tracking-widest text-stone-400 mt-1">distancias</p></div>
            <div><p class="font-trail text-3xl text-stone-100">87 KM</p><p class="font-mono text-[10px] uppercase tracking-widest text-stone-400 mt-1">ultra</p></div>
            <div><p class="font-trail text-3xl text-stone-100">1.000</p><p class="font-mono text-[10px] uppercase tracking-widest text-stone-400 mt-1">corredores</p></div>
            <div><p class="font-trail text-3xl text-yellow-500">UTMB</p><p class="font-mono text-[10px] uppercase tracking-widest text-stone-400 mt-1">index race</p></div>
            <div><p class="font-trail text-3xl text-yellow-500">INTAG</p><p class="font-mono text-[10px] uppercase tracking-widest text-stone-400 mt-1">valle sagrado</p></div>
        </div>
        <!-- Hero del mockup -->
        <div class="px-6 py-10 md:py-12">
            <p class="font-mono text-[11px] uppercase tracking-widest text-yellow-500/80 mb-3">— IMBABURA · ECUADOR · TRAIL RUNNING</p>
            <h3 class="font-trail text-5xl md:text-7xl uppercase leading-[0.95]">
                <span class="text-stone-100">INTAG</span><br>
                <span class="text-yellow-500">TRAIL</span><br>
                <span class="text-stone-100">RUN</span>
            </h3>
            <p class="text-stone-300 text-sm md:text-base mt-6 max-w-2xl">Entre volcanes, lagunas de páramo y senderos ancestrales de la Sierra norte del Ecuador.</p>
            <p class="font-mono text-xs text-yellow-500/80 mt-4">📅 OCTUBRE 9-11 · COTACACHI, IMBABURA</p>
            <div class="flex flex-wrap gap-3 mt-6">
                <span class="inline-block px-6 py-3 font-trail text-sm uppercase tracking-widest bg-yellow-500 text-stone-900 rounded-sm">Inscríbete ahora</span>
                <span class="inline-block px-6 py-3 font-trail text-sm uppercase tracking-widest border border-stone-300 text-stone-100 rounded-sm">Ver distancias</span>
            </div>
        </div>
    </div>

    <!-- Cards de las 5 distancias -->
    <h3 class="font-display text-xl font-bold text-white mb-4">Las 5 distancias configuradas</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php
        $distancias = [
            ['Panela', '7K', '$20', 'Familiar / Iniciación'],
            ['Río Intag', '20K', '$20', 'Intermedio'],
            ['Pan de Azúcar', '26K', '$30', 'Trail medio'],
            ['Cara de Intag', '40K', '$50', 'Trail largo'],
            ['Yana Urku', '87K', '$80', 'Ultra · UTMB'],
        ];
        foreach ($distancias as [$nombre,$km,$precio,$tipo]):
        ?>
        <div class="rounded-xl p-5" style="background:rgba(212,163,50,0.06); border:1px solid rgba(212,163,50,0.25);">
            <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-2"><?= $tipo ?></p>
            <h4 class="font-trail text-xl uppercase text-stone-100 mb-1"><?= $nombre ?></h4>
            <p class="font-display text-3xl font-extrabold text-yellow-400"><?= $km ?></p>
            <p class="font-mono text-sm text-stone-300 mt-2"><?= $precio ?> USD</p>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Escenario financiero -->
    <div class="glass rounded-2xl p-6 md:p-8 mt-8">
        <h3 class="font-display text-xl font-bold text-white mb-2">Escenario financiero estimado para Intag Trail</h3>
        <p class="text-slate-400 text-sm mb-5">Distribución típica de corredores en un trail con 5 distancias, según referencias de Chota Trail y Quito Trail.</p>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50 text-slate-400 font-mono text-[10px] uppercase tracking-widest">
                        <th class="text-left py-3 px-2">Distancia</th>
                        <th class="text-center py-3 px-2">% típico</th>
                        <th class="text-center py-3 px-2">500 corredores</th>
                        <th class="text-center py-3 px-2">750 (medio)</th>
                        <th class="text-center py-3 px-2">1.000 corredores</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-2 text-white font-medium">Panela 7K · $20</td><td class="text-center">35%</td><td class="text-center">$3.500</td><td class="text-center">$5.250</td><td class="text-center">$7.000</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-2 text-white font-medium">Río Intag 20K · $20</td><td class="text-center">25%</td><td class="text-center">$2.500</td><td class="text-center">$3.750</td><td class="text-center">$5.000</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-2 text-white font-medium">Pan de Azúcar 26K · $30</td><td class="text-center">20%</td><td class="text-center">$3.000</td><td class="text-center">$4.500</td><td class="text-center">$6.000</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-2 text-white font-medium">Cara de Intag 40K · $50</td><td class="text-center">12%</td><td class="text-center">$3.000</td><td class="text-center">$4.500</td><td class="text-center">$6.000</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-2 text-white font-medium">Yana Urku 87K · $80</td><td class="text-center">8%</td><td class="text-center">$3.200</td><td class="text-center">$4.800</td><td class="text-center">$6.400</td></tr>
                    <tr class="font-semibold text-white"><td class="py-3 px-2 font-display text-base">Ingreso bruto del evento</td><td class="text-center">—</td><td class="text-center text-emerald-400">$15.200</td><td class="text-center text-emerald-400">$22.800</td><td class="text-center text-emerald-400">$30.400</td></tr>
                </tbody>
            </table>
        </div>
        <p class="text-slate-500 text-xs mt-4 italic">El costo de nuestra plataforma representa entre 13% y 26% del ingreso bruto del primer evento. Y la plataforma queda disponible para todos los demás eventos del año.</p>
    </div>
</section>

<!-- MULTI-EVENTO -->
<section id="multievento" class="py-16">
    <span class="pill pill-emerald mb-4">Más allá de Intag Trail</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">La plataforma sirve para todos los eventos del cantón</h2>
    <p class="text-slate-400 mb-10 max-w-3xl">Una vez instalada, cualquier evento futuro del municipio se configura en 1-2 días. Mismo sistema, marca distinta para cada uno.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="rounded-2xl p-6" style="background:rgba(212,163,50,0.08); border:1px solid rgba(212,163,50,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-2">Evento 1 · Oct 2026</p>
            <h3 class="font-trail text-2xl uppercase text-stone-100 mb-2">Intag Trail</h3>
            <p class="text-slate-400 text-sm mb-4">5 distancias · 500-1.000 corredores · UTMB Index Race</p>
            <p class="font-mono text-xs text-emerald-300">✓ Incluido en setup año 1</p>
        </div>
        <div class="glass-emerald rounded-2xl p-6">
            <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-300 mb-2">Evento 2 · 2026/2027</p>
            <h3 class="font-display text-2xl font-bold text-white mb-2">Travesía Cuicocha</h3>
            <p class="text-slate-400 text-sm mb-4">Trekking laguna · público mixto · familiar y deportivo</p>
            <p class="font-mono text-xs text-emerald-300">✓ Incluido como segundo evento del año</p>
        </div>
        <div class="glass rounded-2xl p-6">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-400 mb-2">Futuros eventos</p>
            <h3 class="font-display text-2xl font-bold text-white mb-2">Maratón cantonal · Ciclopaseo · Caminatas</h3>
            <p class="text-slate-400 text-sm mb-4">Cualquier evento deportivo o cultural con inscripción.</p>
            <p class="font-mono text-xs text-emerald-300">✓ Hasta 5 eventos incluidos por año</p>
        </div>
    </div>

    <div class="glass-emerald rounded-2xl p-6 md:p-8 mt-8">
        <div class="flex items-start gap-4">
            <svg class="w-8 h-8 text-emerald-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            <div>
                <h4 class="font-display text-xl font-bold text-white mb-2">El valor del modelo multi-evento</h4>
                <p class="text-slate-300 text-sm leading-relaxed mb-3">Si se contratara cada evento por separado con un proveedor distinto, cada uno costaría ~$3.000-$4.500. <strong class="text-white">5 eventos al año = entre $15.000 y $22.500.</strong></p>
                <p class="text-slate-300 text-sm leading-relaxed">Con nuestra plataforma anual: <strong class="text-emerald-300">$4.000 año 1 + $1.800 anual.</strong> Ahorro estimado de $10.000+ al año para el municipio. Y se construye una base de datos unificada de corredores, base útil para futuras campañas turísticas.</p>
            </div>
        </div>
    </div>
</section>

<!-- INVERSIÓN -->
<section id="inversion" class="py-16">
    <span class="pill pill-emerald mb-4">Inversión</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">Modelo SaaS · Plataforma como Servicio Anual</h2>
    <p class="text-slate-400 mb-10 max-w-3xl">El municipio paga una membresía anual. Creative Web administra la infraestructura técnica completa. El municipio solo accede al panel para gestionar sus eventos.</p>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- AÑO 1 -->
        <div class="glass-emerald rounded-2xl p-8" style="border-width:2px;">
            <div class="flex items-center justify-between mb-4">
                <span class="pill pill-emerald">Año 1 · Lanzamiento</span>
                <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-300">Pago único anual</p>
            </div>
            <h3 class="font-display text-2xl font-bold text-white mb-2">Activación completa</h3>
            <div class="flex items-baseline gap-2 mb-6">
                <span class="font-display text-6xl font-extrabold text-emerald-300">$4.000</span>
                <span class="text-slate-400 font-medium">+ IVA</span>
            </div>
            <ul class="space-y-3 mb-6">
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Setup completo de la plataforma con branding Intag Trail</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Configuración de las 5 distancias con GPX, ficha técnica, abastos</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Configuración del segundo evento del año (Cuicocha)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Hasta 5 eventos configurables en 12 meses</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Integración pasarela de pagos (Datafast / PayPhone / Kushki)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Sistema de correos automáticos (hasta 10.000 envíos/mes)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Hosting Vercel + base de datos Supabase Pro · 12 meses</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Capacitación al equipo del municipio · 4 horas</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Soporte técnico continuo durante todo el año</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Atención prioritaria 15 días pre-evento + día del evento</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Actualizaciones y mejoras del sistema sin costo adicional</div></li>
            </ul>
            <p class="text-slate-400 text-xs italic">Factura emitida al RUC del Municipio de Cotacachi.</p>
        </div>

        <!-- AÑO 2+ -->
        <div class="glass rounded-2xl p-8">
            <div class="flex items-center justify-between mb-4">
                <span class="pill pill-emerald">Año 2 en adelante</span>
                <p class="font-mono text-[10px] uppercase tracking-widest text-slate-400">Renovación anual</p>
            </div>
            <h3 class="font-display text-2xl font-bold text-white mb-2">Operación + soporte</h3>
            <div class="flex items-baseline gap-2 mb-6">
                <span class="font-display text-6xl font-extrabold text-white">$1.800</span>
                <span class="text-slate-400 font-medium">+ IVA / año</span>
            </div>
            <ul class="space-y-3 mb-6">
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Mantiene la plataforma operativa todo el año</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Hosting Vercel + Supabase Pro · 12 meses adicionales</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Continuación del envío de correos automáticos</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Hasta 5 eventos del año (Intag Trail 2027, Cuicocha, otros)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Soporte técnico continuo</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Capacitación de refresco (2 horas)</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Actualizaciones y nuevas funciones</div></li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span><div class="text-sm text-slate-200">Reportes ejecutivos cuando se necesiten</div></li>
            </ul>
            <p class="text-slate-400 text-xs italic">El municipio puede cancelar la renovación al final del primer año si lo desea — la plataforma sigue siendo de uso continuo del cantón.</p>
        </div>
    </div>

    <!-- TCO Comparado -->
    <div class="glass rounded-2xl p-6 md:p-8 mt-8">
        <h3 class="font-display text-xl font-bold text-white mb-4">Comparación de costos a 3 años</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50 text-slate-400 font-mono text-[10px] uppercase tracking-widest">
                        <th class="text-left py-3 px-2">Escenario</th>
                        <th class="text-center py-3 px-2">Año 1</th>
                        <th class="text-center py-3 px-2">Año 2</th>
                        <th class="text-center py-3 px-2">Año 3</th>
                        <th class="text-center py-3 px-2">Total 3 años</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-700/30">
                        <td class="py-3 px-2 text-white font-medium">Contratar nuevo sistema cada año (alternativa típica)</td>
                        <td class="text-center text-red-300">$4.500 ×3 eventos = $13.500</td>
                        <td class="text-center text-red-300">$13.500</td>
                        <td class="text-center text-red-300">$13.500</td>
                        <td class="text-center font-bold text-red-300">$40.500</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="py-3 px-2 text-white font-medium">WordPress + plugins (rotación cada año)</td>
                        <td class="text-center text-yellow-300">$2.500 ×3 = $7.500</td>
                        <td class="text-center text-yellow-300">$7.500</td>
                        <td class="text-center text-yellow-300">$7.500</td>
                        <td class="text-center font-bold text-yellow-300">$22.500</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-2 text-white font-medium">Plataforma Creative Web (SaaS anual)</td>
                        <td class="text-center text-emerald-300">$4.000</td>
                        <td class="text-center text-emerald-300">$1.800</td>
                        <td class="text-center text-emerald-300">$1.800</td>
                        <td class="text-center font-bold text-emerald-300 text-base">$7.600</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-emerald-300 text-sm mt-5 font-semibold">A 3 años, el ahorro vs sistemas WordPress + plugins es de ~$15.000. Vs sistemas SaaS por evento separados, ~$33.000.</p>
    </div>
</section>

<!-- CRONOGRAMA -->
<section id="cronograma" class="py-16">
    <span class="pill pill-emerald mb-4">Cronograma</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">3 semanas de implementación</h2>
    <p class="text-slate-400 mb-10 max-w-3xl">Tiempo total desde firma de contrato hasta apertura de inscripciones Intag Trail.</p>

    <div class="relative">
        <div class="absolute left-7 top-2 bottom-2 w-px bg-emerald-900/40"></div>

        <?php
        $fases = [
            ['Semana 1','Configuración inicial','Onboarding del proyecto · Recolección de assets de Intag Trail (logo, fotos, GPX) · Configuración de la organización en la plataforma · Setup de subdominio o dominio · Configuración de las 5 distancias'],
            ['Semana 2','Personalización y pagos','Aplicación del branding Intag Trail (línea gráfica amarillo+negro) · Integración pasarela de pagos · Configuración de correos automáticos · Carga de auspiciantes · Carga de FAQ y reglamento'],
            ['Semana 3','Pruebas, capacitación y lanzamiento','Pruebas integrales del flujo de inscripción · Capacitación al equipo del municipio · Documentación · Apertura oficial de inscripciones · Acompañamiento durante el día de lanzamiento'],
            ['Mes 4 en adelante','Operación continua','Soporte durante toda la temporada de inscripciones · Reportes mensuales de progreso · Configuración del segundo evento (Cuicocha) en paralelo · Atención prioritaria pre y durante el evento'],
        ];
        foreach ($fases as $i => [$semana,$titulo,$desc]):
        ?>
        <div class="flex gap-5 mb-6 relative">
            <div class="flex-shrink-0 w-14 flex justify-center">
                <div class="timeline-dot mt-2 relative z-10"></div>
            </div>
            <div class="glass rounded-xl p-5 flex-1">
                <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-400 mb-1"><?= $semana ?></p>
                <h3 class="font-display text-lg font-bold text-white mb-2"><?= $titulo ?></h3>
                <p class="text-slate-400 text-sm leading-relaxed"><?= $desc ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- TÉRMINOS -->
<section class="py-16">
    <span class="pill pill-emerald mb-4">Términos y condiciones</span>
    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">Lo que entra y lo que no</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
        <div class="glass rounded-2xl p-6">
            <h3 class="font-display text-lg font-bold text-emerald-300 mb-3">✓ Incluido</h3>
            <ul class="text-sm text-slate-300 space-y-2">
                <li>• Plataforma operativa 12 meses (Año 1)</li>
                <li>• Hasta 5 eventos configurados por año</li>
                <li>• Soporte técnico durante todo el año</li>
                <li>• Hosting + base de datos premium</li>
                <li>• Pasarela de pagos integrada</li>
                <li>• Hasta 10.000 correos automáticos/mes</li>
                <li>• Capacitación inicial (4 horas)</li>
                <li>• Reportes y exports</li>
                <li>• Actualizaciones del sistema</li>
                <li>• Atención prioritaria pre-evento</li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-6">
            <h3 class="font-display text-lg font-bold text-yellow-300 mb-3">✗ NO incluido</h3>
            <ul class="text-sm text-slate-300 space-y-2">
                <li>• Comisión de la pasarela de pagos (Datafast/PayPhone ~3-5% por transacción — cobrada directo al organizador por la pasarela)</li>
                <li>• Dominio personalizado del evento (~$15-25/año a Namecheap o GoDaddy)</li>
                <li>• Diseño de logos del evento (si Intag Trail ya tiene logo, no aplica)</li>
                <li>• Producción de contenido del sitio (fotos, videos, textos de las rutas — los provee el organizador)</li>
                <li>• Atención al corredor por WhatsApp (lo maneja el equipo del municipio)</li>
                <li>• Eventos más allá de 5 al año (cada evento extra: $400)</li>
                <li>• Más de 10.000 correos/mes (cada paquete extra: $50)</li>
            </ul>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mt-6">
        <h3 class="font-display text-lg font-bold text-white mb-3">Condiciones generales</h3>
        <ul class="text-sm text-slate-300 space-y-2">
            <li><strong class="text-white">Forma de pago:</strong> Factura emitida al inicio del proyecto. Plazo de pago según términos municipales (típico 30-60 días).</li>
            <li><strong class="text-white">Propiedad:</strong> El software es propiedad de Creative Web. El municipio recibe licencia de uso ilimitada durante la vigencia del contrato anual. Los datos generados (corredores, eventos, reportes) son propiedad del municipio y se entregan exportados si el contrato termina.</li>
            <li><strong class="text-white">Infraestructura:</strong> Creative Web administra las cuentas de Vercel (hosting) y Supabase (base de datos). Esto garantiza soporte continuo y seguridad. Las credenciales no se transfieren al municipio (igual modelo que SaaS profesionales como Salesforce o HubSpot).</li>
            <li><strong class="text-white">Renovación:</strong> Automática al término del año salvo notificación contraria del municipio 30 días antes. Si el municipio decide no renovar, la plataforma se desactiva y se entrega export completo de datos.</li>
            <li><strong class="text-white">Cancelación anticipada:</strong> Sin reembolso del año en curso pero los datos generados son del municipio y se entregan.</li>
            <li><strong class="text-white">Validez de la propuesta:</strong> 30 días desde su emisión.</li>
        </ul>
    </div>
</section>

<!-- CIERRE -->
<section id="cierre" class="py-16">
    <div class="glass-emerald rounded-3xl p-8 md:p-12 text-center">
        <span class="pill pill-emerald mb-5 inline-flex">Próximos pasos</span>
        <h2 class="font-display text-3xl md:text-5xl font-bold text-white mb-5 leading-tight">Para arrancar necesitamos<br>3 confirmaciones</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10 max-w-4xl mx-auto text-left">
            <div class="bg-emerald-500/5 border border-emerald-500/20 rounded-xl p-5">
                <p class="font-display text-4xl font-extrabold text-emerald-300 mb-2">1</p>
                <h3 class="font-display text-lg font-bold text-white mb-1">Aprobación de la propuesta</h3>
                <p class="text-slate-400 text-sm">Por el responsable financiero del municipio.</p>
            </div>
            <div class="bg-emerald-500/5 border border-emerald-500/20 rounded-xl p-5">
                <p class="font-display text-4xl font-extrabold text-emerald-300 mb-2">2</p>
                <h3 class="font-display text-lg font-bold text-white mb-1">Firma del contrato y emisión de factura</h3>
                <p class="text-slate-400 text-sm">Trámite estándar de contratación municipal.</p>
            </div>
            <div class="bg-emerald-500/5 border border-emerald-500/20 rounded-xl p-5">
                <p class="font-display text-4xl font-extrabold text-emerald-300 mb-2">3</p>
                <h3 class="font-display text-lg font-bold text-white mb-1">Kick-off del proyecto</h3>
                <p class="text-slate-400 text-sm">Recolección de assets + arranque de configuración.</p>
            </div>
        </div>
        <p class="text-slate-300 text-base md:text-lg max-w-2xl mx-auto mb-8">
            Una vez aprobada, podemos tener las inscripciones de Intag Trail abiertas en <strong class="text-emerald-300">3 semanas</strong>.
        </p>
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="https://wa.me/593968663866" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-white font-semibold text-sm transition-all"
               style="box-shadow:0 8px 24px rgba(52,211,153,0.35);">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                Hablar con Creative Web
            </a>
            <a href="mailto:contacto@creativeweb.com.ec" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl glass hover:bg-white/10 text-white font-semibold text-sm transition-all border border-white/20">
                Enviar correo
            </a>
        </div>
    </div>
</section>

</main>

<!-- FOOTER -->
<footer class="mt-16 border-t border-emerald-900/30 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 text-center">
        <p class="text-slate-500 text-xs mb-1">Propuesta elaborada por <span class="text-slate-300 font-medium">Creative Web</span> — <a href="https://creativeweb.com.ec" class="text-emerald-400 hover:text-emerald-300" target="_blank">creativeweb.com.ec</a></p>
        <p class="text-slate-600 text-[10px] font-mono">Mayo 2026 · Documento confidencial · Municipio de Cotacachi</p>
    </div>
</footer>

</body>
</html>
