<?php
session_start();
if (!isset($_SESSION['auth_gt']) || $_SESSION['auth_gt'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe SEO — Global Trading Asia — Febrero-Marzo 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    * { font-family: 'Inter', sans-serif; }
    body { background: #0f172a; color: #e2e8f0; }

    .glass { background: rgba(30, 41, 59, 0.6); backdrop-filter: blur(16px); border: 1px solid rgba(148, 163, 184, 0.08); }
    .glass-lighter { background: rgba(51, 65, 85, 0.4); border: 1px solid rgba(148, 163, 184, 0.06); }
    .glass-accent { background: rgba(59, 130, 246, 0.08); border: 1px solid rgba(59, 130, 246, 0.15); }

    .bg-pattern {
        position: fixed; inset: 0; z-index: 0;
        background-image:
            radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.07) 0%, transparent 50%),
            radial-gradient(circle at 85% 20%, rgba(14, 165, 233, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 50% 85%, rgba(99, 102, 241, 0.04) 0%, transparent 50%);
        pointer-events: none;
    }
    .grid-bg {
        position: fixed; inset: 0; z-index: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(148,163,184,0.025) 39px, rgba(148,163,184,0.025) 40px),
            repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(148,163,184,0.025) 39px, rgba(148,163,184,0.025) 40px);
        pointer-events: none;
    }

    .tab-btn { transition: all 0.2s; cursor: pointer; -webkit-tap-highlight-color: transparent; }
    .tab-btn.active { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border-color: rgba(59, 130, 246, 0.3); }
    .tab-btn:not(.active):hover { background: rgba(148, 163, 184, 0.08); }
    .tab-content { display: none; animation: fadeUp 0.4s ease; }
    .tab-content.active { display: block; }
    #tabNav { -webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none; }
    #tabNav::-webkit-scrollbar { display: none; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .kpi-card { transition: transform 0.2s; }
    .kpi-card:hover { transform: translateY(-2px); }

    .timeline-line { position: absolute; left: 23px; top: 48px; bottom: 0; width: 2px; background: linear-gradient(to bottom, #3b82f6, #6366f1, #8b5cf6); }

    .check-green::before { content: '\2713'; color: #22c55e; font-weight: 700; margin-right: 8px; }
    .check-red::before { content: '\2717'; color: #ef4444; font-weight: 700; margin-right: 8px; }

    .funnel-bar { transition: width 0.8s ease; }

    table { border-collapse: separate; border-spacing: 0; }
    thead th { position: sticky; top: 0; }

    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: rgba(15,23,42,0.5); }
    ::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(148,163,184,0.5); }
</style>
</head>
<body class="min-h-screen">
<div class="bg-pattern"></div>
<div class="grid-bg"></div>

<!-- HEADER -->
<header class="relative z-10 glass border-b border-slate-700/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/15 border border-blue-500/25 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Informe SEO & Estrategia de Contenidos</h1>
                        <p class="text-sm text-slate-400">Febrero - Marzo 2026 — Periodo Inicial</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">Galo Salamea</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fecha</p>
                    <p class="text-sm text-white font-medium">24 de Marzo, 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>

        <!-- Brand bar -->
        <div class="mt-4 glass-accent rounded-xl px-5 py-3 flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-blue-300 font-semibold text-sm">Global Trading Asia</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">globaltrading.asia</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen Ejecutivo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('trabajo')">Trabajo Realizado</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('analisis')">Analisis del Sitio</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('plan')">Plan de Accion</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('pendientes')">Pendientes</button>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-8">

<!-- ==================== TAB 1: RESUMEN EJECUTIVO ==================== -->
<div id="tab-resumen" class="tab-content active">

    <!-- Intro box -->
    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que es este informe?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Este es el primer informe SEO de Global Trading Asia, correspondiente al periodo febrero-marzo 2026. Documenta el estado inicial del sitio web, el bloqueo de indexacion por parte de Google que fue resuelto, toda la estrategia de contenidos implementada, y el plan de accion para los proximos 6 meses. El objetivo es posicionar globaltrading.asia como la referencia #1 en importacion desde China para Ecuador.</p>
            </div>
        </div>
    </div>

    <!-- KPI Cards -->
    <h2 class="text-white text-lg font-bold mb-4">Metricas Actuales (Ultimos 3 meses)</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <!-- KPI 1 -->
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-white">24</p>
            <p class="text-xs text-slate-400 mt-1">Visitas totales</p>
            <p class="text-[10px] text-slate-500 mt-0.5">3 meses</p>
        </div>
        <!-- KPI 2 -->
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-white">24</p>
            <p class="text-xs text-slate-400 mt-1">Usuarios nuevos</p>
            <p class="text-[10px] text-slate-500 mt-0.5">100% nuevos</p>
        </div>
        <!-- KPI 3 -->
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-amber-400">21s</p>
            <p class="text-xs text-slate-400 mt-1">Tiempo interaccion</p>
            <p class="text-[10px] text-slate-500 mt-0.5">promedio</p>
        </div>
        <!-- KPI 4 -->
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-red-400">80.77%</p>
            <p class="text-xs text-slate-400 mt-1">Tasa de rebote</p>
            <p class="text-[10px] text-slate-500 mt-0.5">homepage</p>
        </div>
        <!-- KPI 5 -->
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-red-400">0</p>
            <p class="text-xs text-slate-400 mt-1">Visitas organicas</p>
            <p class="text-[10px] text-slate-500 mt-0.5">sin SEO previo</p>
        </div>
        <!-- KPI 6 -->
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-red-400">0</p>
            <p class="text-xs text-slate-400 mt-1">Leads / mes</p>
            <p class="text-[10px] text-slate-500 mt-0.5">sin tracking</p>
        </div>
    </div>

    <!-- Explanation box -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-amber-400 font-bold mb-3 flex items-center gap-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            Que significan estos numeros?
        </h3>
        <div class="text-slate-400 text-sm leading-relaxed space-y-3">
            <p>El sitio web de Global Trading Asia es <span class="text-white font-medium">un sitio nuevo que Google tenia bloqueado</span>. A pesar de estar correctamente construido, Google no podia indexar ninguna pagina debido a un bloqueo en la comunicacion entre el servidor y los bots de Google.</p>
            <p><span class="text-white font-medium">0 visitas organicas</span> porque Google no habia podido rastrear ni indexar el sitio. Despues de multiples solicitudes a Google Search Console y ajustes en la configuracion del servidor, logramos desbloquear la indexacion. El sitio ahora esta siendo rastreado y las paginas estan comenzando a aparecer en los resultados de busqueda.</p>
            <p><span class="text-white font-medium">0 leads medidos</span> porque aun no se habia configurado un sistema de tracking para medir clics en WhatsApp o envios de formularios. No significa que no haya habido contactos, sino que no habia forma de medirlos.</p>
            <p class="text-blue-400 font-medium">El bloqueo ya esta resuelto y el posicionamiento esta comenzando. Este informe es el punto de partida — el "antes" contra el cual mediremos todo el progreso.</p>
        </div>
    </div>

    <!-- Diagnostico -->
    <h2 class="text-white text-lg font-bold mb-4">Diagnostico Inicial</h2>
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Fortalezas del sitio -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-green-400 font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Fortalezas del Sitio Web
            </h3>
            <ul class="space-y-3 text-sm">
                <li class="check-green text-slate-300">Sitio web profesional con diseno moderno y responsivo</li>
                <li class="check-green text-slate-300">SSL/HTTPS activo y funcionando correctamente</li>
                <li class="check-green text-slate-300">Contenido de servicios bien estructurado y completo</li>
                <li class="check-green text-slate-300">Oficinas reales en Shanghai y Cuenca (E-E-A-T)</li>
                <li class="check-green text-slate-300">30+ anos de experiencia documentados</li>
                <li class="check-green text-slate-300">Estructura de paginas y navegacion clara</li>
                <li class="check-green text-slate-300">Formulario de contacto y WhatsApp operativos</li>
            </ul>
        </div>
        <!-- Bloqueo de Google resuelto -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-amber-400 font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                Bloqueo de Google (Resuelto)
            </h3>
            <ul class="space-y-3 text-sm">
                <li class="text-slate-300"><span class="text-green-400 font-bold mr-2">&#10003;</span> Google no podia leer el sitemap del sitio <span class="text-green-400 text-xs font-semibold ml-1">RESUELTO</span></li>
                <li class="text-slate-300"><span class="text-green-400 font-bold mr-2">&#10003;</span> El servidor rechazaba las solicitudes de Googlebot <span class="text-green-400 text-xs font-semibold ml-1">RESUELTO</span></li>
                <li class="text-slate-300"><span class="text-green-400 font-bold mr-2">&#10003;</span> Se solicito la indexacion multiples veces a Google <span class="text-green-400 text-xs font-semibold ml-1">RESUELTO</span></li>
                <li class="text-slate-300"><span class="text-green-400 font-bold mr-2">&#10003;</span> Sitemap XML verificado y funcional <span class="text-green-400 text-xs font-semibold ml-1">RESUELTO</span></li>
                <li class="text-slate-300"><span class="text-green-400 font-bold mr-2">&#10003;</span> Google ya esta rastreando e indexando el sitio <span class="text-green-400 text-xs font-semibold ml-1">ACTIVO</span></li>
            </ul>
            <div class="mt-4 p-3 rounded-xl bg-green-500/10 border border-green-500/20">
                <p class="text-green-300 text-xs">Despues de multiples solicitudes y ajustes en la configuracion del servidor, el bloqueo fue completamente resuelto. Google ahora puede rastrear e indexar todas las paginas del sitio.</p>
            </div>
        </div>
    </div>

    <!-- Optimizaciones SEO -->
    <h2 class="text-white text-lg font-bold mb-4">Optimizaciones SEO Implementadas y Pendientes</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <h4 class="text-green-400 font-semibold text-sm mb-3">Completado</h4>
                <ul class="space-y-2 text-sm">
                    <li class="check-green text-slate-300">43 articulos de blog con SEO optimizado</li>
                    <li class="check-green text-slate-300">FAQ Schema JSON-LD en cada articulo</li>
                    <li class="check-green text-slate-300">Enlaces internos entre posts y servicios</li>
                    <li class="check-green text-slate-300">CTAs con WhatsApp en cada articulo</li>
                    <li class="check-green text-slate-300">Indexacion enviada via API de Google</li>
                    <li class="check-green text-slate-300">LiteSpeed Cache reactivado</li>
                </ul>
            </div>
            <div>
                <h4 class="text-amber-400 font-semibold text-sm mb-3">Proximos pasos (Marzo)</h4>
                <ul class="space-y-2 text-sm">
                    <li class="text-slate-300">&#8226; Agregar meta descriptions en cada pagina</li>
                    <li class="text-slate-300">&#8226; Optimizar title tags para mejor CTR</li>
                    <li class="text-slate-300">&#8226; Agregar imagenes con alt text SEO (88 imagenes)</li>
                    <li class="text-slate-300">&#8226; Configurar tracking de conversiones</li>
                    <li class="text-slate-300">&#8226; Crear Google Business Profile</li>
                    <li class="text-slate-300">&#8226; Monitorear posiciones en Search Console</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Funnel Problem -->
    <h2 class="text-white text-lg font-bold mb-4">Estado del Funnel de Conversion</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <p class="text-slate-400 text-sm mb-6">Asi se ve el embudo de conversion actual de Global Trading Asia. Practicamente no existe:</p>
        <div class="space-y-4 max-w-2xl">
            <div>
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm text-slate-300 font-medium">Visitas totales (3 meses)</span>
                    <span class="text-sm text-white font-bold">24</span>
                </div>
                <div class="w-full h-8 bg-slate-700/50 rounded-lg overflow-hidden">
                    <div class="funnel-bar h-full bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg flex items-center justify-center" style="width: 100%">
                        <span class="text-xs font-bold text-white">24 visitas</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm text-slate-300 font-medium">Visitas organicas</span>
                    <span class="text-sm text-red-400 font-bold">0</span>
                </div>
                <div class="w-full h-8 bg-slate-700/50 rounded-lg overflow-hidden">
                    <div class="funnel-bar h-full bg-gradient-to-r from-red-600 to-red-400 rounded-lg flex items-center justify-center" style="width: 2%; min-width: 60px;">
                        <span class="text-xs font-bold text-white">0</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm text-slate-300 font-medium">Contactos medidos</span>
                    <span class="text-sm text-red-400 font-bold">0</span>
                </div>
                <div class="w-full h-8 bg-slate-700/50 rounded-lg overflow-hidden">
                    <div class="funnel-bar h-full bg-gradient-to-r from-red-600 to-red-400 rounded-lg flex items-center justify-center" style="width: 2%; min-width: 60px;">
                        <span class="text-xs font-bold text-white">0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 p-4 rounded-xl bg-amber-500/10 border border-amber-500/20">
            <p class="text-amber-300 text-sm"><strong>Conclusion:</strong> Debido al bloqueo de Google, el sitio no estaba recibiendo trafico organico. Ahora que el bloqueo fue resuelto y se han publicado 43 articulos optimizados, el funnel comenzara a activarse en las proximas semanas a medida que Google indexe el contenido.</p>
        </div>
    </div>

    <!-- Goals Table -->
    <h2 class="text-white text-lg font-bold mb-4">Metas a 6 Meses</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Metrica</th>
                        <th class="text-center px-6 py-4 text-xs font-semibold text-red-400 uppercase tracking-wider">Actual</th>
                        <th class="text-center px-6 py-4 text-xs font-semibold text-green-400 uppercase tracking-wider">Meta 6 meses</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4 text-slate-300">Visitas totales / mes</td>
                        <td class="px-6 py-4 text-center text-red-400 font-semibold">~8</td>
                        <td class="px-6 py-4 text-center text-green-400 font-semibold">1,500+</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4 text-slate-300">Visitas organicas / mes</td>
                        <td class="px-6 py-4 text-center text-red-400 font-semibold">0</td>
                        <td class="px-6 py-4 text-center text-green-400 font-semibold">800+</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4 text-slate-300">Keywords en top 20</td>
                        <td class="px-6 py-4 text-center text-red-400 font-semibold">0</td>
                        <td class="px-6 py-4 text-center text-green-400 font-semibold">50+</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4 text-slate-300">Articulos de blog</td>
                        <td class="px-6 py-4 text-center text-amber-400 font-semibold">3 &rarr; 43</td>
                        <td class="px-6 py-4 text-center text-green-400 font-semibold">100+</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4 text-slate-300">Contactos WhatsApp / mes</td>
                        <td class="px-6 py-4 text-center text-red-400 font-semibold">0</td>
                        <td class="px-6 py-4 text-center text-green-400 font-semibold">15-20</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4 text-slate-300">Cotizaciones / mes</td>
                        <td class="px-6 py-4 text-center text-red-400 font-semibold">0</td>
                        <td class="px-6 py-4 text-center text-green-400 font-semibold">10+</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ==================== TAB 2: TRABAJO REALIZADO ==================== -->
<div id="tab-trabajo" class="tab-content">

    <!-- Bloqueo de Google resuelto -->
    <h2 class="text-white text-lg font-bold mb-4">Bloqueo de Indexacion de Google — Resuelto</h2>
    <div class="grid md:grid-cols-2 gap-4 mb-8">
        <div class="glass rounded-2xl p-6">
            <div class="flex items-center gap-2 mb-3">
                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-green-500/20 text-green-400 text-xs font-bold">1</span>
                <h3 class="text-white font-semibold text-sm">X-Robots-Tag noindex en sitemap</h3>
            </div>
            <p class="text-slate-400 text-sm mb-3">Google no podia leer el sitemap XML del sitio debido a una directiva del servidor que le indicaba no indexar este archivo. Se requirieron multiples solicitudes y ajustes para resolver el bloqueo.</p>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-500/15 text-green-400 text-xs font-semibold">RESUELTO</span>
                <span class="text-slate-500 text-xs">Ajuste de configuracion del servidor</span>
            </div>
        </div>
        <div class="glass rounded-2xl p-6">
            <div class="flex items-center gap-2 mb-3">
                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-green-500/20 text-green-400 text-xs font-bold">2</span>
                <h3 class="text-white font-semibold text-sm">ModSecurity HTTP 406</h3>
            </div>
            <p class="text-slate-400 text-sm mb-3">Las reglas de seguridad del servidor estaban rechazando las solicitudes de los bots de Google, impidiendo que pudieran rastrear el sitio web. Se ajustaron las reglas para permitir el acceso de bots legitimos.</p>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-500/15 text-green-400 text-xs font-semibold">RESUELTO</span>
                <span class="text-slate-500 text-xs">Reglas de seguridad ajustadas</span>
            </div>
        </div>
        <div class="glass rounded-2xl p-6">
            <div class="flex items-center gap-2 mb-3">
                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-blue-500/20 text-blue-400 text-xs font-bold">3</span>
                <h3 class="text-white font-semibold text-sm">Sitemap enviado a Search Console</h3>
            </div>
            <p class="text-slate-400 text-sm mb-3">El sitemap corregido fue enviado a Google Search Console para que comience a descubrir e indexar todas las paginas y posts del sitio.</p>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-1 rounded-md bg-blue-500/15 text-blue-400 text-xs font-semibold">PROCESANDO</span>
                <span class="text-slate-500 text-xs">Google esta procesando el sitemap</span>
            </div>
        </div>
        <div class="glass rounded-2xl p-6">
            <div class="flex items-center gap-2 mb-3">
                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-green-500/20 text-green-400 text-xs font-bold">4</span>
                <h3 class="text-white font-semibold text-sm">LiteSpeed Cache reactivado</h3>
            </div>
            <p class="text-slate-400 text-sm mb-3">Se optimizo la velocidad del sitio activando el sistema de cache del servidor para mejorar los tiempos de carga y la experiencia del usuario.</p>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-500/15 text-green-400 text-xs font-semibold">RESUELTO</span>
                <span class="text-slate-500 text-xs">Cache activo y funcionando</span>
            </div>
        </div>
    </div>

    <!-- Contenido Creado - Big numbers -->
    <h2 class="text-white text-lg font-bold mb-4">Contenido Creado (Febrero - Marzo 2026)</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="glass rounded-2xl p-6 text-center">
            <p class="text-4xl font-extrabold text-blue-400">40</p>
            <p class="text-sm text-slate-400 mt-1">Articulos de blog publicados</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center">
            <p class="text-4xl font-extrabold text-blue-400">65K+</p>
            <p class="text-sm text-slate-400 mt-1">Palabras de contenido SEO</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center">
            <p class="text-4xl font-extrabold text-blue-400">43</p>
            <p class="text-sm text-slate-400 mt-1">Frases clave unicas</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center">
            <p class="text-4xl font-extrabold text-blue-400">40</p>
            <p class="text-sm text-slate-400 mt-1">FAQ Schema JSON-LD</p>
        </div>
    </div>

    <!-- Content features -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-semibold mb-3">Caracteristicas del contenido creado:</h3>
        <ul class="grid md:grid-cols-2 gap-2 text-sm text-slate-400">
            <li class="flex items-center gap-2"><span class="text-green-400">&#10003;</span> FAQ Schema JSON-LD en cada post (SEO estructurado)</li>
            <li class="flex items-center gap-2"><span class="text-green-400">&#10003;</span> Enlaces internos entre posts y paginas de servicio</li>
            <li class="flex items-center gap-2"><span class="text-green-400">&#10003;</span> CTAs con WhatsApp en cada articulo</li>
            <li class="flex items-center gap-2"><span class="text-green-400">&#10003;</span> Fechas distribuidas naturalmente (enero-marzo 2026)</li>
            <li class="flex items-center gap-2"><span class="text-green-400">&#10003;</span> Contenido optimizado para busquedas en Ecuador</li>
            <li class="flex items-center gap-2"><span class="text-green-400">&#10003;</span> Palabras clave long-tail y de intencion comercial</li>
        </ul>
    </div>

    <!-- 40 Posts Table -->
    <h2 class="text-white text-lg font-bold mb-4">Lista Completa de Posts Publicados</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto max-h-[600px] overflow-y-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50 bg-slate-800/60">
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-400 uppercase tracking-wider w-8">#</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-400 uppercase tracking-wider">Post</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-400 uppercase tracking-wider">Keyword Principal</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-400 uppercase tracking-wider w-28">Fecha</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">1</td>
                        <td class="px-4 py-3 text-slate-300">Costos reales de importar desde China a Ecuador en 2026</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">costos importar desde china a ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">8 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">2</td>
                        <td class="px-4 py-3 text-slate-300">Guia completa para importar productos de China a Ecuador</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar productos de china a ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">10 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">3</td>
                        <td class="px-4 py-3 text-slate-300">Mejores proveedores chinos: como encontrarlos sin riesgo</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">proveedores chinos confiables</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">14 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">4</td>
                        <td class="px-4 py-3 text-slate-300">Agente de compras en China: por que necesitas uno</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">agente de compras en china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">17 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">5</td>
                        <td class="px-4 py-3 text-slate-300">Control de calidad en fabricas chinas: guia practica</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">control de calidad china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">20 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">6</td>
                        <td class="px-4 py-3 text-slate-300">Feria de Canton 2026: guia completa para compradores ecuatorianos</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">feria de canton 2026</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">23 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">7</td>
                        <td class="px-4 py-3 text-slate-300">Aranceles de importacion Ecuador 2026: lo que debes saber</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">aranceles importacion ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">26 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">8</td>
                        <td class="px-4 py-3 text-slate-300">Como negociar con proveedores chinos y obtener mejores precios</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">negociar con proveedores chinos</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">29 Ene 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">9</td>
                        <td class="px-4 py-3 text-slate-300">Logistica de importacion China-Ecuador: transporte maritimo vs aereo</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">logistica importacion china ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">1 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">10</td>
                        <td class="px-4 py-3 text-slate-300">Incoterms 2026: FOB, CIF y EXW explicados para importadores</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">incoterms importacion china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">4 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">11</td>
                        <td class="px-4 py-3 text-slate-300">Documentos necesarios para importar desde China a Ecuador</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">documentos importar china ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">6 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">12</td>
                        <td class="px-4 py-3 text-slate-300">Errores comunes al importar de China y como evitarlos</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">errores importar de china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">9 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">13</td>
                        <td class="px-4 py-3 text-slate-300">Alibaba vs Feria de Canton: donde comprar productos de China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">alibaba vs feria de canton</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">12 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">14</td>
                        <td class="px-4 py-3 text-slate-300">Importar maquinaria industrial de China: guia completa</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar maquinaria de china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">14 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">15</td>
                        <td class="px-4 py-3 text-slate-300">Desarrollo de productos en China: de la idea al prototipo</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">desarrollo de productos en china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">17 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">16</td>
                        <td class="px-4 py-3 text-slate-300">Como verificar fabricas chinas antes de hacer un pedido</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">verificar fabricas en china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">19 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">17</td>
                        <td class="px-4 py-3 text-slate-300">Pagos internacionales a China: metodos seguros para ecuatorianos</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">pagos internacionales a china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">21 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">18</td>
                        <td class="px-4 py-3 text-slate-300">Importar repuestos automotrices de China a Ecuador</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar repuestos de china ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">23 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">19</td>
                        <td class="px-4 py-3 text-slate-300">Consolidacion de carga desde China: ahorra en envios</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">consolidacion de carga china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">25 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">20</td>
                        <td class="px-4 py-3 text-slate-300">Marca propia con productos chinos: como crear tu marca en Ecuador</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">marca propia productos chinos</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">27 Feb 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">21</td>
                        <td class="px-4 py-3 text-slate-300">Certificaciones y normas INEN para productos importados de China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">normas inen productos importados</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">1 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">22</td>
                        <td class="px-4 py-3 text-slate-300">Importar tecnologia y electronica desde China: guia 2026</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar electronica de china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">2 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">23</td>
                        <td class="px-4 py-3 text-slate-300">Tiempos de entrega desde China a Ecuador: que esperar</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">tiempos entrega china ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">4 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">24</td>
                        <td class="px-4 py-3 text-slate-300">Seguro de carga internacional: protege tu importacion desde China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">seguro de carga importacion china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">5 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">25</td>
                        <td class="px-4 py-3 text-slate-300">Como calcular el costo total de importacion (landed cost)</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">calcular costo importacion china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">7 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">26</td>
                        <td class="px-4 py-3 text-slate-300">Importar textiles y ropa desde China a Ecuador</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar ropa de china ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">8 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">27</td>
                        <td class="px-4 py-3 text-slate-300">Despacho aduanero en Ecuador: proceso paso a paso</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">despacho aduanero ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">9 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">28</td>
                        <td class="px-4 py-3 text-slate-300">Proyectos llave en mano desde China para Ecuador</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">proyectos llave en mano china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">10 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">29</td>
                        <td class="px-4 py-3 text-slate-300">Ventajas de tener una oficina en Shanghai para importar</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">oficina en shanghai importaciones</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">11 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">30</td>
                        <td class="px-4 py-3 text-slate-300">Importar materiales de construccion desde China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar materiales construccion china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">13 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">31</td>
                        <td class="px-4 py-3 text-slate-300">Trading company vs fabrica directa: que conviene mas</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">trading company vs fabrica china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">14 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">32</td>
                        <td class="px-4 py-3 text-slate-300">Importar productos de acero y metal desde China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar acero desde china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">15 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">33</td>
                        <td class="px-4 py-3 text-slate-300">Regulaciones SENAE para importaciones desde China 2026</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">regulaciones senae importaciones</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">16 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">34</td>
                        <td class="px-4 py-3 text-slate-300">Como importar muebles y mobiliario desde China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar muebles de china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">17 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">35</td>
                        <td class="px-4 py-3 text-slate-300">Sourcing estrategico en China: mas alla de Alibaba</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">sourcing estrategico china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">18 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">36</td>
                        <td class="px-4 py-3 text-slate-300">Importar equipos medicos y hospitalarios desde China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">importar equipos medicos china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">19 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">37</td>
                        <td class="px-4 py-3 text-slate-300">Empaque y embalaje para importaciones de China: evita danos</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">empaque embalaje importaciones china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">20 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">38</td>
                        <td class="px-4 py-3 text-slate-300">Contenedor completo vs carga compartida: cual elegir</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">contenedor completo vs carga compartida</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">21 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">39</td>
                        <td class="px-4 py-3 text-slate-300">Oportunidades de importacion desde China para emprendedores ecuatorianos</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">oportunidades importacion china ecuador</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">22 Mar 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-500">40</td>
                        <td class="px-4 py-3 text-slate-300">Por que elegir un agente con oficina propia en China</td>
                        <td class="px-4 py-3 text-blue-400 text-xs">agente con oficina en china</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">23 Mar 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Auditoria SEO -->
    <h2 class="text-white text-lg font-bold mb-4">Auditoria SEO Completada</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-20 h-20 rounded-2xl bg-amber-500/15 border border-amber-500/25 flex items-center justify-center">
                <span class="text-3xl font-extrabold text-amber-400">38</span>
            </div>
            <div>
                <p class="text-white font-semibold">Score SEO Inicial: 38/100</p>
                <p class="text-slate-400 text-sm">Multiples mejoras ya implementadas, otras pendientes</p>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-3">
            <div class="glass-lighter rounded-xl p-4 flex items-center justify-between">
                <span class="text-sm text-slate-300">Meta descriptions</span>
                <span class="text-xs font-semibold text-amber-400 bg-amber-500/15 px-2 py-1 rounded-md">PENDIENTE</span>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-center justify-between">
                <span class="text-sm text-slate-300">Title tags optimizados</span>
                <span class="text-xs font-semibold text-amber-400 bg-amber-500/15 px-2 py-1 rounded-md">PENDIENTE</span>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-center justify-between">
                <span class="text-sm text-slate-300">Alt text imagenes</span>
                <span class="text-xs font-semibold text-amber-400 bg-amber-500/15 px-2 py-1 rounded-md">PENDIENTE</span>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-center justify-between">
                <span class="text-sm text-slate-300">Canonical tags</span>
                <span class="text-xs font-semibold text-amber-400 bg-amber-500/15 px-2 py-1 rounded-md">PENDIENTE VERIFICACION</span>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-center justify-between">
                <span class="text-sm text-slate-300">Guia de imagenes SEO</span>
                <span class="text-xs font-semibold text-green-400 bg-green-500/15 px-2 py-1 rounded-md">CREADA (88 imagenes)</span>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-center justify-between">
                <span class="text-sm text-slate-300">Sitemap XML</span>
                <span class="text-xs font-semibold text-green-400 bg-green-500/15 px-2 py-1 rounded-md">CORREGIDO</span>
            </div>
        </div>
    </div>

    <!-- Indexacion -->
    <h2 class="text-white text-lg font-bold mb-4">Indexacion</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="grid md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-5 text-center">
                <p class="text-2xl font-bold text-blue-400">43</p>
                <p class="text-xs text-slate-400 mt-1">URLs enviadas a Google via Rank Math Instant Index API</p>
            </div>
            <div class="glass-lighter rounded-xl p-5 text-center">
                <p class="text-lg font-bold text-green-400">&#10003;</p>
                <p class="text-xs text-slate-400 mt-1">Sitemap funcional</p>
                <p class="text-[10px] text-slate-500 mt-1 break-all">globaltrading.asia/sitemap_index.xml</p>
            </div>
            <div class="glass-lighter rounded-xl p-5 text-center">
                <p class="text-lg font-bold text-green-400">&#10003;</p>
                <p class="text-xs text-slate-400 mt-1">robots.txt verificado y correcto</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 3: ANALISIS DEL SITIO ==================== -->
<div id="tab-analisis" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-4">Fuentes de Trafico (Ultimos 3 meses)</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="max-w-lg mx-auto" style="height: 300px;">
            <canvas id="trafficChart"></canvas>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-6">
            <div class="text-center">
                <p class="text-2xl font-bold text-blue-400">18</p>
                <p class="text-xs text-slate-400">Directo</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-amber-400">6</p>
                <p class="text-xs text-slate-400">Referral (bots)</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-red-400">0</p>
                <p class="text-xs text-slate-400">Organico</p>
            </div>
        </div>
    </div>

    <!-- Top Pages -->
    <h2 class="text-white text-lg font-bold mb-4">Paginas Mas Visitadas</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700/50">
                    <th class="text-left px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Pagina</th>
                    <th class="text-center px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Vistas</th>
                    <th class="text-center px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Rebote</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/30">
                <tr class="hover:bg-slate-700/20 transition-colors">
                    <td class="px-6 py-4 text-slate-300">Home (globaltrading.asia)</td>
                    <td class="px-6 py-4 text-center text-white font-semibold">27</td>
                    <td class="px-6 py-4 text-center text-red-400 font-semibold">80.77%</td>
                </tr>
                <tr class="hover:bg-slate-700/20 transition-colors">
                    <td class="px-6 py-4 text-slate-300">Desarrollo de Proyectos</td>
                    <td class="px-6 py-4 text-center text-white font-semibold">1</td>
                    <td class="px-6 py-4 text-center text-red-400 font-semibold">100%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- City data -->
    <h2 class="text-white text-lg font-bold mb-4">Ubicacion de Visitantes</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700/50">
                    <th class="text-left px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Ciudad</th>
                    <th class="text-center px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Usuarios</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Tipo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/30">
                <tr class="hover:bg-slate-700/20 transition-colors">
                    <td class="px-6 py-4 text-slate-300">Ashburn, Virginia (USA)</td>
                    <td class="px-6 py-4 text-center text-white font-semibold">8</td>
                    <td class="px-6 py-4"><span class="inline-flex items-center px-2 py-1 rounded-md bg-red-500/15 text-red-400 text-xs font-semibold">Datacenter - Bot traffic</span></td>
                </tr>
                <tr class="hover:bg-slate-700/20 transition-colors">
                    <td class="px-6 py-4 text-slate-300">Moses Lake, Washington (USA)</td>
                    <td class="px-6 py-4 text-center text-white font-semibold">3</td>
                    <td class="px-6 py-4"><span class="inline-flex items-center px-2 py-1 rounded-md bg-red-500/15 text-red-400 text-xs font-semibold">Datacenter - Bot traffic</span></td>
                </tr>
                <tr class="hover:bg-slate-700/20 transition-colors">
                    <td class="px-6 py-4 text-slate-300">Cuenca, Ecuador</td>
                    <td class="px-6 py-4 text-center text-white font-semibold">1</td>
                    <td class="px-6 py-4"><span class="inline-flex items-center px-2 py-1 rounded-md bg-green-500/15 text-green-400 text-xs font-semibold">Usuario real</span></td>
                </tr>
                <tr class="hover:bg-slate-700/20 transition-colors">
                    <td class="px-6 py-4 text-slate-300">Otras ubicaciones</td>
                    <td class="px-6 py-4 text-center text-white font-semibold">12</td>
                    <td class="px-6 py-4"><span class="inline-flex items-center px-2 py-1 rounded-md bg-red-500/15 text-red-400 text-xs font-semibold">Datacenters varios</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Explanation -->
    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que significa este trafico?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">La mayoria del trafico actual proviene de datacenters (bots), no de personas reales. Ashburn y Moses Lake son ubicaciones de servidores de Amazon y Microsoft. El unico usuario real identificado es de Cuenca, Ecuador. Esto es completamente normal para un sitio nuevo sin SEO. Los bots de referral visitan sitios web de forma automatizada y no representan interes real. Con la estrategia SEO en marcha, el trafico real de personas buscando servicios de importacion comenzara a llegar en las proximas semanas.</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 4: PLAN DE ACCION ==================== -->
<div id="tab-plan" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Plan de Accion - 6 Meses</h2>
    <p class="text-slate-400 text-sm mb-8">Estrategia mes a mes para posicionar Global Trading Asia como la referencia #1 en importacion desde China para Ecuador.</p>

    <div class="relative pl-14 space-y-8">
        <div class="timeline-line"></div>

        <!-- Month 1 -->
        <div class="relative">
            <div class="absolute -left-14 w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-blue-600/30 z-10">M1</div>
            <div class="glass rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-3">
                    <h3 class="text-white font-bold">Marzo 2026 — Quick Wins</h3>
                    <span class="text-xs font-semibold text-blue-400 bg-blue-500/15 px-2 py-1 rounded-md">PROXIMO</span>
                </div>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Agregar meta descriptions a TODAS las paginas y posts</li>
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Optimizar title tags (especialmente homepage)</li>
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Agregar alt text a las 88 imagenes</li>
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Configurar GTM + tracking de WhatsApp y formularios</li>
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Verificar canonical tags</li>
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Crear perfil de Google Business Profile (Cuenca)</li>
                    <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">&#8226;</span> Monitorear indexacion de los 43 posts</li>
                </ul>
                <div class="mt-4 p-3 rounded-xl bg-blue-500/10 border border-blue-500/20">
                    <p class="text-blue-300 text-xs font-semibold">Meta: 200 visitas organicas, primeras keywords posicionadas</p>
                </div>
            </div>
        </div>

        <!-- Month 2 -->
        <div class="relative">
            <div class="absolute -left-14 w-12 h-12 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-indigo-600/30 z-10">M2</div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold mb-3">Abril 2026 — Contenido + SEO Local</h3>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li class="flex items-start gap-2"><span class="text-indigo-400 mt-0.5">&#8226;</span> 20 posts adicionales de blog</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-400 mt-0.5">&#8226;</span> Optimizar los posts con mejor rendimiento (agregar contenido, actualizar)</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-400 mt-0.5">&#8226;</span> Google Business Profile Shanghai</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-400 mt-0.5">&#8226;</span> Schema LocalBusiness para ambas oficinas</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-400 mt-0.5">&#8226;</span> Schema Service para paginas de servicio</li>
                </ul>
                <div class="mt-4 p-3 rounded-xl bg-indigo-500/10 border border-indigo-500/20">
                    <p class="text-indigo-300 text-xs font-semibold">Meta: 500 visitas organicas, 5 contactos</p>
                </div>
            </div>
        </div>

        <!-- Month 3 -->
        <div class="relative">
            <div class="absolute -left-14 w-12 h-12 rounded-full bg-violet-600 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-violet-600/30 z-10">M3</div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold mb-3">Mayo 2026 — Escalar</h3>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li class="flex items-start gap-2"><span class="text-violet-400 mt-0.5">&#8226;</span> 20 posts adicionales (temas basados en datos de Search Console)</li>
                    <li class="flex items-start gap-2"><span class="text-violet-400 mt-0.5">&#8226;</span> Pop-up de salida con lead magnet</li>
                    <li class="flex items-start gap-2"><span class="text-violet-400 mt-0.5">&#8226;</span> Pixel de Meta para remarketing</li>
                    <li class="flex items-start gap-2"><span class="text-violet-400 mt-0.5">&#8226;</span> Optimizar Core Web Vitals</li>
                </ul>
                <div class="mt-4 p-3 rounded-xl bg-violet-500/10 border border-violet-500/20">
                    <p class="text-violet-300 text-xs font-semibold">Meta: 800 visitas organicas, 10 contactos</p>
                </div>
            </div>
        </div>

        <!-- Month 4 -->
        <div class="relative">
            <div class="absolute -left-14 w-12 h-12 rounded-full bg-purple-600 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-purple-600/30 z-10">M4</div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold mb-3">Junio 2026 — Autoridad</h3>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">&#8226;</span> 20 posts adicionales</li>
                    <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">&#8226;</span> Link building (directorios de comercio exterior)</li>
                    <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">&#8226;</span> Guest posts en portales de comercio exterior Ecuador</li>
                </ul>
                <div class="mt-4 p-3 rounded-xl bg-purple-500/10 border border-purple-500/20">
                    <p class="text-purple-300 text-xs font-semibold">Meta: 1,200 visitas organicas, 15 contactos</p>
                </div>
            </div>
        </div>

        <!-- Month 5 -->
        <div class="relative">
            <div class="absolute -left-14 w-12 h-12 rounded-full bg-fuchsia-600 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-fuchsia-600/30 z-10">M5</div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold mb-3">Julio 2026 — Conversion</h3>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li class="flex items-start gap-2"><span class="text-fuchsia-400 mt-0.5">&#8226;</span> 20 posts adicionales</li>
                    <li class="flex items-start gap-2"><span class="text-fuchsia-400 mt-0.5">&#8226;</span> A/B testing de CTAs</li>
                    <li class="flex items-start gap-2"><span class="text-fuchsia-400 mt-0.5">&#8226;</span> Landing pages especificas por servicio</li>
                    <li class="flex items-start gap-2"><span class="text-fuchsia-400 mt-0.5">&#8226;</span> Email marketing setup</li>
                </ul>
                <div class="mt-4 p-3 rounded-xl bg-fuchsia-500/10 border border-fuchsia-500/20">
                    <p class="text-fuchsia-300 text-xs font-semibold">Meta: 1,500 visitas organicas, 20 contactos</p>
                </div>
            </div>
        </div>

        <!-- Month 6 -->
        <div class="relative">
            <div class="absolute -left-14 w-12 h-12 rounded-full bg-pink-600 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-pink-600/30 z-10">M6</div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold mb-3">Agosto 2026 — Consolidacion</h3>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">&#8226;</span> 20 posts adicionales</li>
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">&#8226;</span> Analisis completo de ROI</li>
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">&#8226;</span> Ajuste de estrategia basado en datos</li>
                </ul>
                <div class="mt-4 p-3 rounded-xl bg-pink-500/10 border border-pink-500/20">
                    <p class="text-pink-300 text-xs font-semibold">Meta: 2,000+ visitas organicas, 25+ contactos</p>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- ==================== TAB 5: PENDIENTES ==================== -->
<div id="tab-pendientes" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Tareas Pendientes</h2>
    <p class="text-slate-400 text-sm mb-8">Lista de acciones pendientes para completar la optimizacion del sitio. Estas tareas son prioritarias para el proximo mes.</p>

    <div class="glass rounded-2xl p-6 mb-8">
        <div class="space-y-4">
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Agregar meta descriptions (Yoast/Rank Math) a las 7 paginas estaticas</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad alta — Impacto directo en CTR de Google</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Optimizar title tags de todas las paginas</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad alta — Los titulos actuales son genericos</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Subir 88 imagenes con alt text SEO</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad alta — Guia de imagenes ya creada</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Configurar Google Tag Manager</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad alta — Base para todo el tracking</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Configurar tracking de clics en WhatsApp</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad alta — Medir contactos reales</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Configurar tracking de formulario de contacto</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad alta — Medir cotizaciones</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Crear Google Business Profile Cuenca</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad media — SEO local para Ecuador</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Configurar perfil de autor profesional para los posts del blog</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad media — Mejora E-E-A-T</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Reenviar sitemap en Search Console (despues de 24h)</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad media — Confirmar que Google procesa todo</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Verificar indexacion de los 43 posts (1 semana)</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad media — Revisar en Search Console</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-slate-700/20 transition-colors">
                <div class="w-6 h-6 rounded-md border-2 border-slate-600 flex-shrink-0 mt-0.5"></div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Activar CDN (Cloudflare gratuito)</p>
                    <p class="text-slate-500 text-xs mt-0.5">Prioridad media — Mejorar velocidad global</p>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-accent rounded-2xl p-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Nota importante</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Estas tareas seran ejecutadas progresivamente durante marzo 2026. Algunas requieren acceso al panel de WordPress del sitio, y otras se pueden hacer desde Search Console o Google Tag Manager. Creative Web se encargara de la implementacion tecnica.</p>
            </div>
        </div>
    </div>

</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 border-t border-slate-700/50 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-slate-500 text-xs">Desarrollado por <span class="text-slate-400 font-medium">Creative Web</span></p>
        <p class="text-slate-600 text-xs">Informe confidencial — Global Trading Asia — Febrero-Marzo 2026</p>
    </div>
</footer>

<!-- JAVASCRIPT -->
<script>
// Tab switching
function switchTab(tabId) {
    // Remove active from all tabs and content
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.add('text-slate-400');
    });
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });

    // Activate selected tab
    const tabContent = document.getElementById('tab-' + tabId);
    if (tabContent) {
        tabContent.classList.add('active');
    }

    // Activate button
    const buttons = document.querySelectorAll('.tab-btn');
    const tabNames = ['resumen', 'trabajo', 'analisis', 'plan', 'pendientes'];
    const index = tabNames.indexOf(tabId);
    if (index >= 0 && buttons[index]) {
        buttons[index].classList.add('active');
        buttons[index].classList.remove('text-slate-400');
    }

    // Scroll to top of content
    window.scrollTo({ top: 0, behavior: 'smooth' });

    // Initialize chart if analytics tab
    if (tabId === 'analisis') {
        setTimeout(initTrafficChart, 100);
    }
}

// Traffic Sources Chart
let trafficChartInstance = null;
function initTrafficChart() {
    const ctx = document.getElementById('trafficChart');
    if (!ctx) return;

    if (trafficChartInstance) {
        trafficChartInstance.destroy();
    }

    trafficChartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Directo', 'Referral (bots)', 'Organico'],
            datasets: [{
                label: 'Usuarios',
                data: [18, 6, 0],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(245, 158, 11, 0.7)',
                    'rgba(239, 68, 68, 0.7)'
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(239, 68, 68, 1)'
                ],
                borderWidth: 1,
                borderRadius: 8,
                maxBarThickness: 80
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#94a3b8',
                    borderColor: 'rgba(148, 163, 184, 0.2)',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 12
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(148, 163, 184, 0.08)' },
                    ticks: { color: '#64748b', font: { size: 11 } }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#94a3b8', font: { size: 12, weight: '500' } }
                }
            }
        }
    });
}

// Initialize chart if analytics tab is active on load
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth entrance animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.glass, .kpi-card, .glass-accent').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(12px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(el);
    });

    // Trigger animations for initially visible elements
    setTimeout(() => {
        document.querySelectorAll('#tab-resumen .glass, #tab-resumen .kpi-card, #tab-resumen .glass-accent').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        });
    }, 100);
});
</script>

</body>
</html>
