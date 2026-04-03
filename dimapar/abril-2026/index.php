<?php
session_start();
if (!isset($_SESSION['auth_dimapar']) || $_SESSION['auth_dimapar'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe Marketing Digital — Dimapar Ecuador — Abril 2026</title>
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

    .check-green::before { content: '\2713'; color: #22c55e; font-weight: 700; margin-right: 8px; }
    .check-red::before { content: '\2717'; color: #ef4444; font-weight: 700; margin-right: 8px; }

    table { border-collapse: separate; border-spacing: 0; }
    thead th { position: sticky; top: 0; }

    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: rgba(15,23,42,0.5); }
    ::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(148,163,184,0.5); }

    .pos-green { color: #22c55e; }
    .pos-yellow { color: #eab308; }
    .pos-red { color: #ef4444; }

    .alert-card { border-left: 4px solid #ef4444; }
    .success-card { border-left: 4px solid #22c55e; }
    .warning-card { border-left: 4px solid #f59e0b; }

    .score-ring { width: 160px; height: 160px; }
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
                        <h1 class="text-lg font-bold text-white">Informe de Marketing Digital y Oportunidades</h1>
                        <p class="text-sm text-slate-400">Abril 2026 — Diagnostico Inicial</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">Dimapar Ecuador</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fecha</p>
                    <p class="text-sm text-white font-medium">2 de Abril, 2026</p>
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
            <span class="text-blue-300 font-semibold text-sm">Dimapar Ecuador</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">dimaparecuador.com</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen para el Dueno</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('perdidas')">Lo Que Esta Perdiendo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('fortalezas')">Sus Fortalezas</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('contenido')">Plan de Contenido</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('inversion')">Inversion y Proximos Pasos</button>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-8">

<!-- ==================== TAB 1: RESUMEN PARA EL DUENO ==================== -->
<div id="tab-resumen" class="tab-content active">

    <!-- Intro box -->
    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que es este informe?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Este documento analiza la presencia digital de <strong class="text-white">Dimapar Ecuador</strong> — es decir, como se ve su negocio en Internet y que tan facil es para sus clientes encontrarlo cuando buscan en Google. Le mostraremos que esta funcionando, que le falta, y cuanto dinero esta dejando de ganar por no tener una estrategia digital.</p>
            </div>
        </div>
    </div>

    <!-- Que es SEO -->
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">Pero primero... Que es "SEO" y por que le importa a su negocio?</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-white">SEO</strong> significa "Search Engine Optimization" (Optimizacion para Motores de Busqueda). En palabras simples: <strong class="text-white">es el proceso de hacer que su sitio web aparezca en los primeros resultados de Google cuando alguien busca lo que usted vende.</strong></p>
                <p class="text-slate-400 text-sm leading-relaxed mb-3">Pienselo asi: cuando usted necesita un servicio o producto, lo primero que hace es buscarlo en Google. Sus clientes hacen lo mismo. Si su negocio no aparece en la primera pagina de Google, <strong class="text-white">es como tener una tienda en una calle donde nadie pasa.</strong></p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Como funciona?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">Google envia "robots" que leen su sitio web. Basandose en lo que encuentran (textos, titulos, imagenes, velocidad), deciden en que posicion mostrarlo cuando alguien busca algo relacionado.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Por que importa?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">El 75% de las personas nunca pasa de la primera pagina de Google (fuente: Backlinko). Si usted esta en la pagina 2 o mas abajo, practicamente no existe para sus clientes potenciales.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Cual es el beneficio?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">A diferencia de la publicidad pagada (que deja de funcionar cuando deja de pagar), el SEO genera visitas GRATIS y permanentes. Cada mejora que hacemos en su sitio se acumula con el tiempo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Marketing Score -->
    <h2 class="text-white text-lg font-bold mb-4">Puntuacion General de Marketing Digital</h2>
    <div class="glass rounded-2xl p-8 mb-8">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="relative">
                <canvas id="scoreChart" width="160" height="160" class="score-ring"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-3xl font-extrabold text-red-400">30</span>
                    <span class="text-xs text-slate-400">de 100</span>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">Grado F — Critico</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">De 100 puntos posibles, su sitio web obtuvo <strong class="text-white">30 puntos</strong>. Esto significa que su presencia digital tiene problemas serios que le estan costando clientes y ventas cada mes. La buena noticia: estos problemas tienen solucion y el potencial de crecimiento es enorme.</p>
            </div>
        </div>
    </div>

    <!-- Score breakdown -->
    <h2 class="text-white text-lg font-bold mb-4">Desglose: Que Evaluamos y Que Significa</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Lo que evaluamos</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Puntuacion</th>
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que significa para su negocio?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Contenido y mensajes de venta</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">25/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Lo que dice su sitio web no convence a los visitantes de comprar. Los textos son genericos, algunos estan en ingles, y no destacan por que Dimapar es mejor que la competencia.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Facilidad para comprar o contactar</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">28/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">A sus clientes les cuesta trabajo hacer un pedido o contactarlo. No hay boton de WhatsApp visible, y el proceso de compra no esta optimizado para equipos industriales de alto valor.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Visibilidad en Google</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">22/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Cuando alguien busca "equipos para vulcanizadoras" en Google, su negocio casi no aparece. Esto significa que cientos de clientes potenciales cada mes van directamente a su competencia.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Posicion frente a competidores</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">46/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Sus competidores (Globaltech, Megatul, Autoequip) tienen mejor presencia online. Pero ninguno tiene una estrategia SEO completa — hay una ventana de oportunidad.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Confianza y credibilidad</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">30/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">El sitio no muestra testimonios, garantias ni certificaciones que generen confianza. Para equipos de $2,000 a $17,500, los clientes necesitan ver pruebas de que usted es confiable.</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-white font-medium">Estrategia de crecimiento</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">32/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">No hay herramientas para retener clientes ni generar ventas repetidas. No se recopilan correos, no hay seguimiento automatico, y no hay manera de saber que clientes regresan.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- KPI Alert Cards -->
    <h2 class="text-white text-lg font-bold mb-4">Alertas Criticas Que Necesita Saber</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Su sitio NO tiene Google Analytics</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Es como tener una tienda fisica sin contar cuantos clientes entran. No sabe cuantas personas visitan su web, de donde vienen, ni que productos les interesan. Sin estos datos, es imposible tomar buenas decisiones de negocio.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Su sitio NO aparece en Google Search Console</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Google no le esta reportando como aparece su negocio en las busquedas. No sabe si hay errores que impiden que lo encuentren. Es como conducir un auto sin tablero de instrumentos — no ve si hay problemas hasta que es tarde.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">0 de 254 productos tienen descripcion SEO</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Sus productos existen en la web pero Google no sabe de que tratan. Es como tener productos en la vitrina pero sin etiqueta de nombre ni precio. Google necesita textos claros para poder mostrar sus productos a quienes los buscan.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">0 testimonios de clientes</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Para un negocio que vende equipos de $2,000 a $17,500, no tener ni un testimonio es como pedirle a alguien que le confie miles de dolares sin una sola referencia. Los testimonios son el "boca a boca" digital que genera confianza.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 2: LO QUE ESTA PERDIENDO ==================== -->
<div id="tab-perdidas" class="tab-content">

    <!-- Section 1: Clientes que lo buscan -->
    <h2 class="text-white text-lg font-bold mb-2">Clientes Que Lo Buscan Pero No Lo Encuentran</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Cada mes, cientos de personas en Ecuador buscan en Google productos que usted vende. Pero como su sitio web no esta optimizado, esos clientes terminan comprandole a su competencia. A continuacion le mostramos exactamente que estan buscando y cuanto dinero representa.</p>
        </div>
    </div>

    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que buscan en Google</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Personas/mes*</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Aparece Dimapar?</th>
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Ventas que podria estar ganando</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"desmontadora de llantas Ecuador"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~200-400</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs leading-relaxed">Si apareciera primero: ~30-60 visitas &rarr; 2-3 ventas de $3,000-$8,000 = <strong class="text-green-400">$6,000-$24,000/mes</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"balanceadora de ruedas precio"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~150-300</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs leading-relaxed">~25-45 visitas &rarr; 1-2 ventas de $2,000-$5,000 = <strong class="text-green-400">$2,000-$10,000/mes</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"equipos para vulcanizadoras"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~300-500</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs leading-relaxed">~50-75 visitas &rarr; 2-4 ventas de $5,000-$15,000 = <strong class="text-green-400">$10,000-$60,000/mes</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"herramientas neumaticas Ecuador"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~200-400</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs leading-relaxed">~30-60 visitas &rarr; 5-10 ventas de $50-$300 = <strong class="text-green-400">$250-$3,000/mes</strong></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-4 text-white font-medium">"alineadora 3D precio Ecuador"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~100-200</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs leading-relaxed">~15-30 visitas &rarr; 1 venta de $8,000-$17,500 = <strong class="text-green-400">$8,000-$17,500/mes</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-slate-700/30">
            <p class="text-slate-500 text-[10px] leading-relaxed">*Estimaciones basadas en herramientas de investigacion de keywords (Google Keyword Planner, Semrush). Los calculos de ventas asumen que el primer resultado de Google recibe ~27% de los clics (fuente: Backlinko, 2023) y una tasa de conversion del 2-5% para e-commerce B2B industrial (fuente: WordStream, Industry Benchmarks 2024).</p>
        </div>
    </div>

    <!-- Total lost revenue -->
    <div class="alert-card glass rounded-2xl p-6 mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-red-400 font-bold text-lg mb-1">Dinero que esta dejando de ganar</h3>
                <p class="text-white text-2xl font-extrabold">$5,000 — $30,000 mensuales</p>
                <p class="text-slate-400 text-sm mt-1">Estimamos que Dimapar esta dejando de ganar entre $5,000 y $30,000 mensuales en ventas que actualmente van a su competencia por no aparecer en Google.</p>
            </div>
        </div>
    </div>

    <!-- Section 2: Problemas que cuestan dinero -->
    <h2 class="text-white text-lg font-bold mb-4">Problemas Que Le Estan Costando Dinero</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Paginas con texto en ingles sin traducir</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Su pagina /about/ muestra texto de relleno en ingles ("Improve ashamed married expense..."). Los clientes que llegan ahi piensan que el sitio no es serio o que esta abandonado. Esto destruye la confianza de un comprador que esta evaluando gastar miles de dolares.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Pagina de condiciones promociona un salon de unas</h4>
            <p class="text-slate-400 text-xs leading-relaxed">La pagina de Terminos y Condiciones muestra una promocion de "Flamingo Studio Nails", un negocio que no tiene nada que ver con maquinaria automotriz. Esto sugiere que el sitio fue construido con una plantilla y nunca se personalizo completamente.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Producto demo visible: hoodie-with-logo</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Hay un producto de prueba (una sudadera) visible en su catalogo de herramientas automotrices. Cuando un cliente profesional ve esto, pierde confianza inmediatamente. Es como encontrar juguetes en medio de un almacen de maquinaria industrial.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">35 paginas basura en el indice de Google</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Google esta indexando (registrando) 35 paginas que no deberian existir: plantillas del tema, menus internos, paginas vacias. Esto confunde a Google sobre de que trata su negocio y baja la calidad general de su sitio a los ojos del buscador.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5 md:col-span-2">
            <h4 class="text-red-400 font-bold text-sm mb-2">65 archivos de codigo cargando en cada pagina</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Su sitio web carga 65 archivos de diseno y programacion en cada visita. Esto hace que la pagina sea LENTA. Google penaliza los sitios lentos bajandolos de posicion en los resultados de busqueda. Ademas, los clientes se van si la pagina tarda mas de 3 segundos en cargar — usted esta perdiendo visitantes antes de que vean sus productos.</p>
        </div>
    </div>

    <!-- Section 3: Competidores -->
    <h2 class="text-white text-lg font-bold mb-4">Sus Competidores SI Estan Haciendo Esto</h2>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que tienen ellos</th>
                        <th class="text-center px-4 py-4 text-red-400 font-semibold text-xs uppercase tracking-wider">Dimapar</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Globaltech</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Megatul</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Autoequip</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Blog con articulos tecnicos</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">7 posts (abandonado)</td>
                        <td class="px-4 py-3 text-center text-green-400">Activo</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Google Analytics instalado</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Descripciones completas de productos</td>
                        <td class="px-4 py-3 text-center text-red-400">Minimas</td>
                        <td class="px-4 py-3 text-center text-green-400">Detalladas</td>
                        <td class="px-4 py-3 text-center text-green-400">Con fichas tecnicas</td>
                        <td class="px-4 py-3 text-center text-yellow-400">Parcial</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Testimonios de clientes</td>
                        <td class="px-4 py-3 text-center text-red-400">Cero</td>
                        <td class="px-4 py-3 text-center text-yellow-400">Parcial</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Videos de demostracion</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">Boton de WhatsApp</td>
                        <td class="px-4 py-3 text-center text-red-400">No visible</td>
                        <td class="px-4 py-3 text-center text-green-400">Si</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                        <td class="px-4 py-3 text-center text-red-400">No</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Positive highlight -->
    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h4 class="text-green-400 font-bold text-sm mb-1">La buena noticia</h4>
                <p class="text-slate-300 text-sm leading-relaxed"><strong class="text-white">NINGUNO de sus competidores tiene una estrategia SEO completa.</strong> Dimapar puede adelantarse a todos si actua ahora. El mercado de equipos automotrices en Ecuador esta practicamente sin competencia digital seria — quien llegue primero se lleva los clientes.</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 3: SUS FORTALEZAS ==================== -->
<div id="tab-fortalezas" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Lo Que Tiene a Favor</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">No todo son malas noticias. Dimapar tiene bases solidas que muchos competidores no tienen. Lo que necesitamos es <strong class="text-white">comunicar estas ventajas correctamente</strong> para que Google y sus clientes las conozcan.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">20+ anos de experiencia</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Esto es ORO para Google y para sus clientes. La experiencia genera confianza. Solo necesitamos comunicarlo mejor en su sitio web, en cada pagina de producto, y en articulos que demuestren su conocimiento del sector.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">Marcas premium internacionales</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Hofmann (Alemania), Chicago Pneumatic (USA), Besser. Estas marcas ya tienen prestigio mundial. Necesitamos que Google y sus clientes sepan que Dimapar es el distribuidor oficial en Ecuador. Esto genera confianza inmediata.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">254 productos en catalogo</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Tiene el catalogo mas amplio del sector en Ecuador. Solo necesitamos que Google pueda leerlo y mostrarlo. Cada producto bien optimizado es una puerta de entrada para un nuevo cliente que busca exactamente eso.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">E-commerce funcionando</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Ya tiene tienda online con carrito, busqueda y comparador. La base tecnologica existe — solo necesita optimizacion. Muchos de sus competidores ni siquiera tienen tienda online, lo cual le da una ventaja competitiva importante.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">Ubicacion estrategica</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Guamani, zona industrial de Quito. Cerca de su mercado principal de talleres y vulcanizadoras. Necesitamos que esto aparezca en Google Maps y en busquedas locales como "equipos automotrices sur de Quito".</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">Capacitacion y soporte tecnico</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Un diferenciador que sus competidores no tienen. Ofrecer capacitacion junto con la venta de equipos genera lealtad y justifica precios premium. Hay que comunicarlo como ventaja competitiva en cada pagina de producto.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 4: PLAN DE CONTENIDO ==================== -->
<div id="tab-contenido" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Plan de Contenido — 20 Articulos para el Mes 1</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Por que necesita articulos en su blog?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Cuando alguien busca en Google "como elegir una desmontadora de llantas", si Dimapar tiene un articulo sobre ese tema, Google lo muestra como resultado. La persona lee el articulo, conoce sus productos, y le contacta para comprar. <strong class="text-white">Cada articulo es como un vendedor que trabaja 24 horas al dia, 7 dias a la semana, sin cobrar sueldo.</strong></p>
            </div>
        </div>
    </div>

    <!-- 3 types explanation -->
    <h3 class="text-white font-bold mb-3">Los 3 Tipos de Articulos y Para Que Sirven</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #22c55e;">
            <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400">Transaccional</span>
            </div>
            <p class="text-slate-400 text-xs leading-relaxed">El cliente ya quiere <strong class="text-white">COMPRAR</strong>. Busca precios, proveedores, donde comprar. Estos articulos generan ventas directas porque el lector ya tiene la tarjeta en la mano.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #f59e0b;">
            <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-500/15 text-amber-400">Comercial</span>
            </div>
            <p class="text-slate-400 text-xs leading-relaxed">El cliente esta <strong class="text-white">COMPARANDO</strong> opciones. Busca cual es mejor, diferencias entre marcas. Estos articulos posicionan a Dimapar como el experto que ayuda a tomar la mejor decision.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #3b82f6;">
            <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-blue-500/15 text-blue-400">Informativo</span>
            </div>
            <p class="text-slate-400 text-xs leading-relaxed">El cliente quiere <strong class="text-white">APRENDER</strong>. Busca guias, explicaciones, consejos. Estos articulos atraen mucho trafico y establecen a Dimapar como autoridad en el sector automotriz.</p>
        </div>
    </div>

    <!-- Articles table -->
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-center px-3 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider w-8">#</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Titulo del Articulo</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Tipo</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Palabra clave objetivo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">1</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Guia completa: Que equipos necesitas para montar una vulcanizadora en Ecuador</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">equipos para vulcanizadoras Ecuador</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">2</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Desmontadora de llantas: Que es, como funciona y por que tu taller la necesita</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">desmontadora de llantas que es</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">3</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Diferencia entre alineacion y balanceo de ruedas: Guia para talleres</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">diferencia alineacion y balanceo</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">4</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Los 7 tipos de parches para llantas y cuando usar cada uno</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">tipos de parches para llantas</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">5</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">5 ventajas de inflar llantas con nitrogeno (y que equipo necesitas)</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">ventajas nitrogeno llantas</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">6</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Mejores marcas de desmontadoras: Besser, Mondolfo Ferro, Launch y mas</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">mejor marca desmontadora llantas</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">7</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Alineadora 3D vs convencional: Cual conviene para tu taller en Ecuador</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">alineadora 3D vs convencional</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">8</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Balanceadora de ruedas: Guia de compra para talleres ecuatorianos</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">balanceadora ruedas Ecuador comprar</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">9</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Equipos low cost vs profesionales para vulcanizadoras: Lo que nadie te dice</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">equipos vulcanizadoras calidad precio</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">10</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Top 10 herramientas neumaticas indispensables para un taller automotriz</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">herramientas neumaticas taller</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">11</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Desmontadoras de llantas en Ecuador: Precios, modelos y donde comprar</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">desmontadora llantas precio Ecuador</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">12</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Elevadores hidraulicos para taller: Guia de precios Ecuador 2026</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">elevador hidraulico taller Ecuador precio</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">13</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Chicago Pneumatic Ecuador: Distribuidor oficial de herramientas</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Chicago Pneumatic Ecuador distribuidor</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">14</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Equipos Hofmann en Ecuador: Balanceadoras, alineadoras y elevadores</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Hofmann Ecuador equipos</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">15</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Kit completo para vulcanizadora nueva: Lista de equipos y presupuesto</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">equipos vulcanizadora nueva precio</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">16</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Mantenimiento preventivo de desmontadoras y balanceadoras</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">mantenimiento desmontadora balanceadora</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">17</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Como elegir el compresor de aire correcto para tu vulcanizadora</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">compresor aire vulcanizadora</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">18</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Que pasa si no balanceas las llantas: Riesgos y costos</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">que pasa si no balanceo llantas</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">19</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Normativas y permisos para abrir una vulcanizadora en Ecuador 2026</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">permisos vulcanizadora Ecuador</td>
                    </tr>
                    <tr>
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">20</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Caso de exito: Como un taller duplico su productividad con equipos Dimapar</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">equipos taller automotriz Ecuador</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Distribution summary -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-4">Distribucion Estrategica del Contenido</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-blue-400 mb-1">8</div>
                <div class="text-xs text-slate-400">Articulos Informativos</div>
                <div class="text-[10px] text-slate-500 mt-1">40% — Atraen trafico masivo</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 40%"></div>
                </div>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-amber-400 mb-1">7</div>
                <div class="text-xs text-slate-400">Articulos Comerciales</div>
                <div class="text-[10px] text-slate-500 mt-1">35% — Posicionan como experto</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2">
                    <div class="bg-amber-500 h-2 rounded-full" style="width: 35%"></div>
                </div>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-green-400 mb-1">5</div>
                <div class="text-xs text-slate-400">Articulos Transaccionales</div>
                <div class="text-[10px] text-slate-500 mt-1">25% — Generan ventas directas</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 25%"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 5: INVERSION Y PROXIMOS PASOS ==================== -->
<div id="tab-inversion" class="tab-content">

    <!-- Fase 1: Rediseno Web -->
    <h2 class="text-white text-lg font-bold mb-4">Fase 1 — Rediseno Web Enfocado en Ventas</h2>
    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <div class="flex items-center gap-3 mb-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500/20 text-green-400 border border-green-500/30">APROBADO</span>
            <span class="text-white text-2xl font-extrabold">$380 + IVA</span>
        </div>
        <p class="text-slate-400 text-sm mb-4">Esta fase incluye la transformacion completa de su sitio web para que funcione como herramienta de ventas y sea visible en Google:</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Redisenar completamente su sitio web para que venda mas y aparezca en Google</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Instalar Google Analytics para saber cuantas personas visitan su web</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Instalar Google Tag Manager para medir todo: que productos ven, cuantos contactan, cuantos compran</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Registrar su sitio en Google Search Console para que Google le reporte como aparece</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Instalar Facebook Pixel para poder mostrar anuncios a personas que ya visitaron su web</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Agregar boton de WhatsApp inteligente: cuando un cliente ve un producto y toca WhatsApp, al asesor le llega el nombre del producto automaticamente</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Cada producto tendra titulo y descripcion que Google pueda entender y mostrar</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Eliminar las 35 paginas basura, el producto demo, y el texto en ingles</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Crear pagina de Quienes Somos profesional con su historia de 20+ anos</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Agregar logos de marcas que distribuyen: Hofmann, Besser, Chicago Pneumatic</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2 md:col-span-2">
                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Optimizar velocidad: reducir los 65 archivos de codigo y convertir imagenes a formato rapido (WebP)</p>
            </div>
        </div>
    </div>

    <!-- Fase 2: Plan SEO -->
    <h2 class="text-white text-lg font-bold mb-4">Fase 2 — Plan SEO de 6 Meses (Para Aparecer en Google)</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Card 1: Pago Mensual -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-1">Pago Mensual</h3>
            <div class="flex items-baseline gap-1 mb-2">
                <span class="text-3xl font-extrabold text-white">$180</span>
                <span class="text-slate-400 text-sm">/mes</span>
            </div>
            <p class="text-slate-400 text-sm mb-4">x 6 meses = <strong class="text-white">$1,080 total</strong></p>
            <div class="glass-lighter rounded-lg px-4 py-2 mb-4">
                <p class="text-slate-400 text-xs">Compromiso minimo: 6 meses</p>
            </div>
        </div>

        <!-- Card 2: Pago Unico (highlighted) -->
        <div class="glass rounded-2xl p-6 relative" style="border: 2px solid rgba(34, 197, 94, 0.4);">
            <div class="absolute -top-3 right-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500/20 text-green-400 border border-green-500/30">Ahorra $200</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-1">Pago Unico</h3>
            <div class="flex items-baseline gap-1 mb-2">
                <span class="text-3xl font-extrabold text-green-400">$880</span>
                <span class="text-slate-400 text-sm">un solo pago</span>
            </div>
            <p class="text-slate-400 text-sm mb-2">Cobertura completa por 6 meses</p>
            <p class="text-green-400 text-sm font-semibold mb-4">Usted ahorra $200</p>
        </div>
    </div>

    <!-- What's included -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Que incluyen ambos planes?</h3>
        <div class="space-y-3">
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">20 articulos nuevos cada mes</strong> para posicionar su negocio en Google (120 articulos en 6 meses)</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Optimizacion de sus 254 productos</strong> para que Google los muestre cuando alguien busca</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Reportes mensuales</strong> donde le mostraremos: cuantas personas encontraron su negocio, que buscaron, y cuantos le contactaron</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Soporte continuo</strong> durante 6 meses</p>
            </div>
        </div>
    </div>

    <!-- Google Ads note -->
    <div class="glass-accent rounded-2xl p-5 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed"><strong class="text-blue-300">Nota sobre Google Ads:</strong> El presupuesto de publicidad en Google Ads (si decide invertir) se paga directamente a Google y es independiente de este plan. El SEO genera trafico gratuito a largo plazo; Google Ads genera trafico pagado inmediato. Ambas estrategias se complementan.</p>
        </div>
    </div>

    <!-- Proyeccion de resultados -->
    <h2 class="text-white text-lg font-bold mb-4">Proyeccion de Resultados — 6 Meses</h2>
    <div class="glass rounded-2xl p-6 mb-6">
        <canvas id="projectionChart" height="300"></canvas>
    </div>
    <div class="glass rounded-2xl p-5 mb-8">
        <p class="text-slate-400 text-xs leading-relaxed">Estos numeros son proyecciones conservadoras basadas en el rendimiento promedio de articulos SEO en nichos industriales de Ecuador. Los resultados reales dependen de la consistencia de publicacion y la competencia. Fuente: datos promedio de campanas SEO de CreativeWeb con clientes similares en Ecuador.</p>
    </div>

</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 glass border-t border-slate-700/50 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-xs mb-1">Desarrollado por <span class="text-slate-400 font-medium">Creative Web</span> — <a href="https://creativeweb.com.ec" class="text-blue-400 hover:text-blue-300 transition-colors" target="_blank">creativeweb.com.ec</a></p>
        <p class="text-slate-600 text-[10px]">Informe generado: 2 de Abril, 2026</p>
    </div>
</footer>

<script>
// Tab switching
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tabId).classList.add('active');
    const buttons = document.querySelectorAll('.tab-btn');
    const tabMap = ['resumen', 'perdidas', 'fortalezas', 'contenido', 'inversion'];
    const idx = tabMap.indexOf(tabId);
    if (idx >= 0) buttons[idx].classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
    // Re-render charts if needed
    if (tabId === 'resumen') renderScoreChart();
    if (tabId === 'inversion') renderProjectionChart();
}

// Score Doughnut Chart
function renderScoreChart() {
    const ctx = document.getElementById('scoreChart');
    if (!ctx) return;
    if (ctx._chartInstance) ctx._chartInstance.destroy();
    ctx._chartInstance = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [30, 70],
                backgroundColor: ['#ef4444', 'rgba(51,65,85,0.3)'],
                borderWidth: 0,
                cutout: '78%'
            }]
        },
        options: {
            responsive: false,
            plugins: { legend: { display: false }, tooltip: { enabled: false } },
            animation: { animateRotate: true, duration: 1200 }
        }
    });
}

// Projection Line Chart
function renderProjectionChart() {
    const ctx = document.getElementById('projectionChart');
    if (!ctx) return;
    if (ctx._chartInstance) ctx._chartInstance.destroy();
    ctx._chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Actual (Mes 0)', 'Mes 1', 'Mes 2', 'Mes 3', 'Mes 4', 'Mes 5', 'Mes 6'],
            datasets: [{
                label: 'Visitas mensuales estimadas',
                data: [200, 400, 700, 1200, 1800, 2500, 3500],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#3b82f6',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: { color: '#94a3b8', font: { family: 'Inter', size: 12 } }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#94a3b8',
                    borderColor: 'rgba(148, 163, 184, 0.2)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return ' ~' + context.parsed.y.toLocaleString() + ' visitas/mes';
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: { color: '#64748b', font: { family: 'Inter', size: 11 } },
                    grid: { color: 'rgba(148, 163, 184, 0.06)' }
                },
                y: {
                    ticks: {
                        color: '#64748b',
                        font: { family: 'Inter', size: 11 },
                        callback: function(value) { return value.toLocaleString(); }
                    },
                    grid: { color: 'rgba(148, 163, 184, 0.06)' }
                }
            }
        }
    });
}

// Initial render
document.addEventListener('DOMContentLoaded', function() {
    renderScoreChart();
});
</script>
</body>
</html>
