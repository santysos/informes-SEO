<?php
session_start();
if (!isset($_SESSION['auth_doeco']) || $_SESSION['auth_doeco'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe SEO — Doeco — Noviembre 2024 - Marzo 2026</title>
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

    .pos-green { color: #22c55e; }
    .pos-yellow { color: #eab308; }
    .pos-red { color: #ef4444; }

    .before-card { border-left: 4px solid #ef4444; }
    .after-card { border-left: 4px solid #22c55e; }

    .score-ring { width: 120px; height: 120px; }
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
                        <h1 class="text-lg font-bold text-white">Informe SEO & Analisis de Marketing Digital</h1>
                        <p class="text-sm text-slate-400">Noviembre 2024 — Marzo 2026</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">Doeco — Empaques Ecologicos</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fecha</p>
                    <p class="text-sm text-white font-medium">1 de Abril, 2026</p>
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
            <span class="text-blue-300 font-semibold text-sm">Doeco — Empaques Ecologicos</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">doeco.ec</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen Ejecutivo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('antes')">Antes vs Despues del SEO</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('trafico')">Trafico Organico</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('consultas')">Consultas de Busqueda</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('plan')">Oportunidades y Plan de Accion</button>
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
                <p class="text-slate-400 text-sm leading-relaxed">Este informe presenta el analisis completo de la presencia digital de <strong class="text-white">Doeco (doeco.ec)</strong> desde noviembre 2024 hasta marzo 2026. Doeco tenia un sitio web desde hace anos vendiendo empaques ecologicos, pero sin ninguna estrategia SEO. A partir de 2025 se implementaron articulos de contenido SEO para "plantar semillas" que generen trafico organico a largo plazo. Este informe muestra la transformacion dramatica del antes y despues, y la hoja de ruta para seguir creciendo.</p>
            </div>
        </div>
    </div>

    <!-- KPI Cards -->
    <h2 class="text-white text-lg font-bold mb-4">Metricas Clave del Periodo</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-white">6,285</p>
            <p class="text-xs text-slate-400 mt-1">Queries unicas en Google</p>
            <p class="text-[10px] text-slate-500 mt-0.5">Palabras clave que muestran su sitio</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-white">150,722</p>
            <p class="text-xs text-slate-400 mt-1">Impresiones organicas</p>
            <p class="text-[10px] text-slate-500 mt-0.5">Veces que aparecio en Google</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-blue-400">3,077</p>
            <p class="text-xs text-slate-400 mt-1">Clics organicos</p>
            <p class="text-[10px] text-slate-500 mt-0.5">Personas que entraron desde Google</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-green-400">2.04%</p>
            <p class="text-xs text-slate-400 mt-1">CTR promedio</p>
            <p class="text-[10px] text-slate-500 mt-0.5">% que hizo clic al ver su sitio</p>
        </div>
    </div>

    <!-- Explanation -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-amber-400 font-bold mb-3 flex items-center gap-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            Que significan estos numeros?
        </h3>
        <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-400">
            <div>
                <p class="mb-2"><strong class="text-slate-200">Queries (consultas):</strong> Son las palabras que las personas escriben en Google. Si su sitio aparece para 6,285 palabras diferentes, significa que Google ya lo considera relevante para miles de busquedas distintas.</p>
                <p><strong class="text-slate-200">Impresiones:</strong> Cada vez que alguien busca algo en Google y su pagina aparece en los resultados (aunque no haga clic), cuenta como una impresion. 150,722 impresiones significa que su marca ya tiene visibilidad masiva.</p>
            </div>
            <div>
                <p class="mb-2"><strong class="text-slate-200">Clics:</strong> Cuando alguien ve su sitio en Google y decide hacer clic para visitarlo. Estos 3,077 clics son visitas GRATUITAS — no costaron ni un centavo en publicidad.</p>
                <p><strong class="text-slate-200">CTR (Click-Through Rate):</strong> Es el porcentaje de personas que ven su sitio en Google y hacen clic. Un 2.04% es un punto de partida que mejoraremos optimizando los titulos y descripciones de cada pagina.</p>
            </div>
        </div>
    </div>

    <!-- Marketing Score -->
    <h2 class="text-white text-lg font-bold mb-4">Puntuacion de Marketing Digital</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <!-- Score Circle -->
            <div class="flex flex-col items-center">
                <div class="relative score-ring flex items-center justify-center">
                    <canvas id="scoreRing" width="120" height="120"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-bold text-amber-400">42</span>
                        <span class="text-xs text-slate-400">/100</span>
                    </div>
                </div>
                <div class="mt-3 px-4 py-1.5 rounded-full bg-amber-500/15 border border-amber-500/25">
                    <span class="text-amber-400 font-bold text-sm">Grado D</span>
                </div>
                <p class="text-xs text-slate-500 mt-2">Hay mucho potencial de mejora</p>
            </div>
            <!-- Breakdown -->
            <div class="flex-1 w-full">
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-slate-400">Content & Messaging</span><span class="text-red-400 font-semibold">33/100</span></div>
                        <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-red-500 h-2 rounded-full" style="width:33%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-slate-400">Conversion Optimization</span><span class="text-red-400 font-semibold">38/100</span></div>
                        <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-red-500 h-2 rounded-full" style="width:38%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-slate-400">SEO & Discoverability</span><span class="text-amber-400 font-semibold">46/100</span></div>
                        <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-amber-500 h-2 rounded-full" style="width:46%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-slate-400">Competitive Positioning</span><span class="text-amber-400 font-semibold">54/100</span></div>
                        <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-amber-500 h-2 rounded-full" style="width:54%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-slate-400">Brand & Trust</span><span class="text-amber-400 font-semibold">48/100</span></div>
                        <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-amber-500 h-2 rounded-full" style="width:48%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-slate-400">Growth & Strategy</span><span class="text-amber-400 font-semibold">42/100</span></div>
                        <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-amber-500 h-2 rounded-full" style="width:42%"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 2: ANTES vs DESPUES DEL SEO ==================== -->
<div id="tab-antes" class="tab-content">

    <h2 class="text-white text-xl font-bold mb-2">El Antes y Despues del SEO</h2>
    <p class="text-slate-400 text-sm mb-6">Esta seccion muestra como la estrategia SEO transformo el trafico de Doeco. Los numeros hablan por si solos.</p>

    <!-- Main Evolution Chart -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1">Evolucion del Trafico Mensual (2022-2026)</h3>
        <p class="text-slate-500 text-xs mb-4">Usuarios mensuales — Las zonas de color muestran el periodo sin SEO (rojo) y con SEO (verde)</p>
        <div style="height: 400px;">
            <canvas id="evolutionChart"></canvas>
        </div>
    </div>

    <!-- Before vs After Cards -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- ANTES -->
        <div class="glass rounded-2xl p-6 before-card">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-red-500/15 border border-red-500/25 flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                </div>
                <div>
                    <h3 class="text-red-400 font-bold text-lg">ANTES</h3>
                    <p class="text-slate-500 text-xs">Abr - Dic 2024 (Sin estrategia SEO)</p>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Promedio mensual</span>
                    <span class="text-red-400 font-bold">~1,030 usuarios</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Fuente principal</span>
                    <span class="text-red-400 font-bold">Social organico</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Busquedas organicas</span>
                    <span class="text-red-400 font-bold">Minimas</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Keywords posicionadas</span>
                    <span class="text-red-400 font-bold">&lt; 50</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Blog posts SEO</span>
                    <span class="text-red-400 font-bold">0 articulos</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-slate-400 text-sm">Tendencia</span>
                    <span class="text-red-400 font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                        DESCENDENTE
                    </span>
                </div>
            </div>
        </div>

        <!-- DESPUES -->
        <div class="glass rounded-2xl p-6 after-card">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-green-500/15 border border-green-500/25 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div>
                    <h3 class="text-green-400 font-bold text-lg">DESPUES</h3>
                    <p class="text-slate-500 text-xs">Ene 2025 - Mar 2026 (Con estrategia SEO)</p>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Promedio mensual</span>
                    <span class="text-green-400 font-bold">~2,500 usuarios</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Oct-Dic 2025 vs Oct-Dic 2024</span>
                    <span class="text-green-400 font-bold">8,313 vs 3,081 = +170%</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Keywords posicionadas</span>
                    <span class="text-green-400 font-bold">6,285 queries</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Blog posts SEO</span>
                    <span class="text-green-400 font-bold">130+ articulos</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-700/30">
                    <span class="text-slate-400 text-sm">Trafico organico</span>
                    <span class="text-green-400 font-bold">+64% del total</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-slate-400 text-sm">Tendencia</span>
                    <span class="text-green-400 font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        ASCENDENTE
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quarterly Growth Chart -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1">Crecimiento Trimestral: Ultimo Trimestre 2024 vs 2025</h3>
        <p class="text-slate-500 text-xs mb-4">Comparamos los mismos 3 meses (octubre, noviembre y diciembre) de cada ano para ver el impacto real del SEO</p>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div style="width: 100%; max-width: 500px; height: 280px;">
                <canvas id="quarterlyChart"></canvas>
            </div>
            <div class="flex-1 text-center">
                <div class="inline-block glass-accent rounded-2xl p-6">
                    <p class="text-6xl font-bold text-green-400">+170%</p>
                    <p class="text-slate-400 mt-2">Crecimiento en trafico</p>
                    <p class="text-slate-500 text-sm mt-1">Oct-Dic 2024 (3,081) vs Oct-Dic 2025 (8,313)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Narrative: La Historia del Cambio -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            La Historia del Cambio
        </h3>
        <div class="relative pl-10">
            <div class="timeline-line"></div>
            <div class="space-y-6">
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-slate-700 border-2 border-slate-500 flex items-center justify-center"><span class="text-xs font-bold text-slate-300">22</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-white font-semibold text-sm">2022 — Lanzamiento del sitio</p>
                        <p class="text-slate-400 text-sm mt-1">El trafico provenia principalmente de redes sociales (Facebook/Instagram). Se alcanzaron picos de 5,000-7,000 usuarios mensuales gracias a publicaciones en redes, pero sin ninguna presencia en Google.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-slate-700 border-2 border-slate-500 flex items-center justify-center"><span class="text-xs font-bold text-slate-300">23</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-white font-semibold text-sm">2023 — Dependencia de redes sociales</p>
                        <p class="text-slate-400 text-sm mt-1">El trafico se mantuvo gracias a redes sociales, pero ya mostraba signos de declive. Sin contenido SEO, el sitio dependia 100% de la actividad en redes — cuando no se publicaba, el trafico caia.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-red-500/80 border-2 border-red-400 flex items-center justify-center"><span class="text-xs font-bold text-white">24</span></div>
                    <div class="glass-lighter rounded-xl p-4 border border-red-500/20">
                        <p class="text-red-400 font-semibold text-sm">Abril 2024 — El trafico SE DESPLOMO</p>
                        <p class="text-slate-400 text-sm mt-1">El trafico cayo de ~7,000 a ~1,000 usuarios mensuales. La dependencia de redes sociales quedo totalmente expuesta: cuando la actividad en redes disminuyo, no habia SEO ni trafico organico para sostener las visitas. El sitio paso 9 meses con apenas 1,000 visitas al mes.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-blue-500/80 border-2 border-blue-400 flex items-center justify-center"><span class="text-xs font-bold text-white">25</span></div>
                    <div class="glass-lighter rounded-xl p-4 border border-blue-500/20">
                        <p class="text-blue-400 font-semibold text-sm">2025 — Comienza la estrategia SEO</p>
                        <p class="text-slate-400 text-sm mt-1">Se comenzo a publicar articulos de blog optimizados para SEO. Cada articulo es una "semilla" que tarda meses en posicionarse en Google, pero una vez que lo hace, genera trafico gratuito las 24 horas. Se publicaron mas de 130 articulos durante el ano.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-green-500/80 border-2 border-green-400 flex items-center justify-center"><span class="text-xs font-bold text-white">26</span></div>
                    <div class="glass-lighter rounded-xl p-4 border border-green-500/20">
                        <p class="text-green-400 font-semibold text-sm">Q1 2026 — Crecimiento organico visible</p>
                        <p class="text-slate-400 text-sm mt-1">El trafico alcanzo 4,000 usuarios mensuales en enero 2026. La busqueda organica se esta convirtiendo en la fuente principal de trafico, reemplazando la dependencia de redes sociales. Los articulos SEO estan dando frutos.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Key quote -->
        <div class="mt-6 glass-accent rounded-xl p-5">
            <p class="text-blue-300 text-sm italic leading-relaxed">"Los articulos SEO son inversiones a largo plazo. Cada articulo es una semilla que tarda meses en dar frutos, pero una vez posicionado en Google, genera trafico GRATUITO las 24 horas del dia, los 365 dias del ano. A diferencia de las redes sociales donde un post dura horas, un articulo bien posicionado genera visitas durante anos."</p>
        </div>
    </div>

    <!-- Traffic Source Distribution -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1">Distribucion de Fuentes de Trafico</h3>
        <p class="text-slate-500 text-xs mb-4">De donde vienen los visitantes de doeco.ec (periodo completo Nov 2024 - Mar 2026)</p>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div style="width: 300px; height: 300px;">
                <canvas id="sourceChart"></canvas>
            </div>
            <div class="flex-1 space-y-3">
                <div class="flex items-center gap-3 p-3 glass-lighter rounded-xl">
                    <div class="w-3 h-3 rounded-full bg-purple-500"></div>
                    <span class="text-slate-300 text-sm flex-1">Organic Social (Redes sociales)</span>
                    <span class="text-white font-bold text-sm">69,646</span>
                    <span class="text-slate-400 text-sm">45.5%</span>
                </div>
                <div class="flex items-center gap-3 p-3 glass-lighter rounded-xl">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                    <span class="text-slate-300 text-sm flex-1">Direct (Acceso directo)</span>
                    <span class="text-white font-bold text-sm">43,057</span>
                    <span class="text-slate-400 text-sm">28.1%</span>
                </div>
                <div class="flex items-center gap-3 p-3 glass-lighter rounded-xl border border-green-500/20">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="text-green-300 text-sm flex-1 font-semibold">Organic Search (Google) — EN CRECIMIENTO</span>
                    <span class="text-green-400 font-bold text-sm">37,521</span>
                    <span class="text-green-400 text-sm">24.5%</span>
                </div>
                <div class="flex items-center gap-3 p-3 glass-lighter rounded-xl">
                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                    <span class="text-slate-300 text-sm flex-1">Referral (Otros sitios)</span>
                    <span class="text-white font-bold text-sm">1,969</span>
                    <span class="text-slate-400 text-sm">1.3%</span>
                </div>
                <div class="flex items-center gap-3 p-3 glass-lighter rounded-xl">
                    <div class="w-3 h-3 rounded-full bg-slate-500"></div>
                    <span class="text-slate-300 text-sm flex-1">Otros</span>
                    <span class="text-white font-bold text-sm">1,027</span>
                    <span class="text-slate-400 text-sm">0.7%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 3: TRAFICO ORGANICO ==================== -->
<div id="tab-trafico" class="tab-content">

    <h2 class="text-white text-xl font-bold mb-2">Trafico Organico — Desglose por Tipo de Pagina</h2>
    <p class="text-slate-400 text-sm mb-6">Analisis de que paginas atraen trafico desde Google. Los articulos de blog SEO ya representan el 34% de los clics organicos.</p>

    <!-- Traffic by Page Type -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-4">Distribucion de Clics por Tipo de Pagina</h3>
        <div class="space-y-4">
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-slate-300">Paginas de Producto</span>
                    <span class="text-white font-bold">3,379 clics (35.2%)</span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-4">
                    <div class="bg-blue-500 h-4 rounded-full flex items-center justify-end pr-2" style="width:35.2%">
                        <span class="text-[10px] text-white font-bold">35.2%</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-green-300 font-semibold">Blog / Articulos SEO</span>
                    <span class="text-green-400 font-bold">3,280 clics (34.2%)</span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-4">
                    <div class="bg-green-500 h-4 rounded-full flex items-center justify-end pr-2" style="width:34.2%">
                        <span class="text-[10px] text-white font-bold">34.2%</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-slate-300">Homepage</span>
                    <span class="text-white font-bold">1,690 clics (17.6%)</span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-4">
                    <div class="bg-purple-500 h-4 rounded-full flex items-center justify-end pr-2" style="width:17.6%">
                        <span class="text-[10px] text-white font-bold">17.6%</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-slate-300">Categorias</span>
                    <span class="text-white font-bold">1,049 clics (10.9%)</span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-4">
                    <div class="bg-amber-500 h-4 rounded-full flex items-center justify-end pr-2" style="width:10.9%">
                        <span class="text-[10px] text-white font-bold">10.9%</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-slate-300">Otros</span>
                    <span class="text-white font-bold">192 clics (2.0%)</span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-4">
                    <div class="bg-slate-500 h-4 rounded-full" style="width:2%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Highlight box -->
    <div class="glass-accent rounded-2xl p-5 mb-8 border border-green-500/20" style="background: rgba(34, 197, 94, 0.06);">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-green-400 font-semibold mb-1">3,280 clics que NO existirian sin SEO</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Los articulos de blog generaron 3,280 clics completamente gratuitos desde Google. Estas son personas que buscaron informacion sobre empaques y encontraron Doeco. Sin la estrategia de contenido SEO, estas 3,280 visitas simplemente no habrian ocurrido. Y lo mejor: estos articulos seguiran generando trafico mes tras mes.</p>
            </div>
        </div>
    </div>

    <!-- Top 15 Blog Posts -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1">Top 15 Articulos de Blog por Trafico</h3>
        <p class="text-slate-500 text-xs mb-4">Estos articulos fueron creados como parte de la estrategia SEO y ya generan trafico constante</p>
        <div class="overflow-x-auto rounded-xl" style="max-height: 600px; overflow-y: auto;">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-800/80">
                        <th class="text-left py-3 px-4 text-slate-400 font-semibold text-xs">#</th>
                        <th class="text-left py-3 px-4 text-slate-400 font-semibold text-xs">Articulo</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Clics</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Impresiones</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Posicion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">1</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Papel Antigrasa para Restaurantes Guayaquil</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">336</td>
                        <td class="py-3 px-4 text-right text-slate-300">4,616</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">6.5</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">2</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Cajas de Carton para Pasteles en Quito</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">320</td>
                        <td class="py-3 px-4 text-right text-slate-300">11,362</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">9.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">3</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Cajas para Reposteria: La Mejor Presentacion</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">247</td>
                        <td class="py-3 px-4 text-right text-slate-300">20,197</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">7.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">4</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Cajas para Pasteles Quito</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">184</td>
                        <td class="py-3 px-4 text-right text-slate-300">5,511</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">6.6</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">5</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Empaques Ecologicos Ecuador: Sostenibilidad</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">165</td>
                        <td class="py-3 px-4 text-right text-slate-300">10,286</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">9.1</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">6</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Packaging para Cosmetica Natural</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">137</td>
                        <td class="py-3 px-4 text-right text-slate-300">2,246</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">6.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">7</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Papel Antigrasa: Solucion para Alimentos Fritos</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">122</td>
                        <td class="py-3 px-4 text-right text-slate-300">8,459</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">8.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">8</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Normativa INEN para Empaques de Alimentos</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">108</td>
                        <td class="py-3 px-4 text-right text-slate-300">4,313</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">5.8</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">9</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Empaques para Heladerias Sostenibles</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">106</td>
                        <td class="py-3 px-4 text-right text-slate-300">2,075</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">6.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">10</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Tendencias Diseno Packaging 2026</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">99</td>
                        <td class="py-3 px-4 text-right text-slate-300">2,810</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">5.5</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">11</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Envases Ecologicos para Comida: Que Necesitas Saber</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">92</td>
                        <td class="py-3 px-4 text-right text-amber-400">28,245</td>
                        <td class="py-3 px-4 text-right pos-red font-bold">22.6</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">12</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Mejores Empaques para Hot Dogs y Comida Rapida</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">75</td>
                        <td class="py-3 px-4 text-right text-slate-300">6,323</td>
                        <td class="py-3 px-4 text-right pos-red font-bold">18.2</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">13</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Personalizado</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">68</td>
                        <td class="py-3 px-4 text-right text-slate-300">1,357</td>
                        <td class="py-3 px-4 text-right pos-red font-bold">10.1</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">14</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Incentivos Fiscales Empresas Sostenibles Ecuador</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">67</td>
                        <td class="py-3 px-4 text-right text-slate-300">2,509</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">6.6</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">15</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Empaques Ecologicos para Negocios de Comida</td>
                        <td class="py-3 px-4 text-right text-green-400 font-bold">58</td>
                        <td class="py-3 px-4 text-right text-slate-300">3,450</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">8.5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Top 10 Product Pages -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1">Top 10 Paginas de Producto</h3>
        <p class="text-slate-500 text-xs mb-4">Las paginas de producto que mas trafico organico reciben desde Google</p>
        <div class="overflow-x-auto rounded-xl">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-800/80">
                        <th class="text-left py-3 px-4 text-slate-400 font-semibold text-xs">#</th>
                        <th class="text-left py-3 px-4 text-slate-400 font-semibold text-xs">Producto</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Clics</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Impresiones</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Posicion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">1</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Papel Antigrasa</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">553</td>
                        <td class="py-3 px-4 text-right text-slate-300">8,911</td>
                        <td class="py-3 px-4 text-right pos-red font-bold">10.6</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">2</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Caja Pastel 26</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">402</td>
                        <td class="py-3 px-4 text-right text-slate-300">18,088</td>
                        <td class="py-3 px-4 text-right pos-green font-bold">4.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">3</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Contenedor Hot Dog Bio</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">343</td>
                        <td class="py-3 px-4 text-right text-slate-300">6,576</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">7.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">4</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Caja Hamburguesa Grande Bio</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">315</td>
                        <td class="py-3 px-4 text-right text-slate-300">7,597</td>
                        <td class="py-3 px-4 text-right pos-red font-bold">11.2</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">5</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Cono con Salsero</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">246</td>
                        <td class="py-3 px-4 text-right text-slate-300">3,294</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">5.8</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">6</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Individual de Mesa Mediano</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">150</td>
                        <td class="py-3 px-4 text-right text-slate-300">14,427</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">6.8</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">7</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Individuales de Mesa Grande</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">135</td>
                        <td class="py-3 px-4 text-right text-slate-300">15,649</td>
                        <td class="py-3 px-4 text-right pos-green font-bold">4.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">8</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Caja Panettone</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">121</td>
                        <td class="py-3 px-4 text-right text-slate-300">1,985</td>
                        <td class="py-3 px-4 text-right pos-red font-bold">14.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">9</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Base Porta Vasos</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">99</td>
                        <td class="py-3 px-4 text-right text-slate-300">5,287</td>
                        <td class="py-3 px-4 text-right pos-yellow font-bold">5.7</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="py-3 px-4 text-slate-500">10</td>
                        <td class="py-3 px-4 text-slate-200 text-xs">Caja Cupcake 6</td>
                        <td class="py-3 px-4 text-right text-blue-400 font-bold">80</td>
                        <td class="py-3 px-4 text-right text-slate-300">5,029</td>
                        <td class="py-3 px-4 text-right pos-green font-bold">4.1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ==================== TAB 4: CONSULTAS DE BUSQUEDA ==================== -->
<div id="tab-consultas" class="tab-content">

    <h2 class="text-white text-xl font-bold mb-2">Consultas de Busqueda en Google</h2>
    <p class="text-slate-400 text-sm mb-6">Estas son las palabras que las personas escriben en Google y que hacen que su sitio aparezca en los resultados. Cada "query" (consulta) es una oportunidad de negocio.</p>

    <!-- KPI Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-white">6,285</p>
            <p class="text-xs text-slate-400 mt-1">Keywords unicas</p>
            <p class="text-[10px] text-slate-500 mt-0.5">Palabras clave totales</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-blue-400">1,114</p>
            <p class="text-xs text-slate-400 mt-1">Clics branded</p>
            <p class="text-[10px] text-slate-500 mt-0.5">36% — buscan "doeco"</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-green-400">1,963</p>
            <p class="text-xs text-slate-400 mt-1">Clics non-branded</p>
            <p class="text-[10px] text-slate-500 mt-0.5">64% — buscan productos</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-2xl font-bold text-amber-400">7.2</p>
            <p class="text-xs text-slate-400 mt-1">Posicion promedio</p>
            <p class="text-[10px] text-slate-500 mt-0.5">Top queries</p>
        </div>
    </div>

    <!-- Explanation -->
    <div class="glass rounded-2xl p-5 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que significa Branded vs Non-Branded?</h3>
                <p class="text-slate-400 text-sm leading-relaxed"><strong class="text-blue-300">Branded (36%):</strong> Son personas que ya conocen Doeco y buscan directamente "doeco" en Google. Esto es bueno, pero ya eran clientes potenciales.<br><strong class="text-green-300">Non-Branded (64%):</strong> Son personas que buscan "empaques ecologicos", "cajas para pasteles" o "papel antigrasa" y encuentran Doeco. Estos son clientes NUEVOS que no conocian su marca. El SEO genera este tipo de trafico.</p>
            </div>
        </div>
    </div>

    <!-- Color coding legend -->
    <div class="flex gap-4 mb-4 text-xs">
        <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-green-500 inline-block"></span> <span class="text-slate-400">Posicion 1-5 (Excelente)</span></span>
        <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-yellow-500 inline-block"></span> <span class="text-slate-400">Posicion 5-10 (Buena)</span></span>
        <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-red-500 inline-block"></span> <span class="text-slate-400">Posicion 10+ (Oportunidad)</span></span>
    </div>

    <!-- Top 30 Queries Table -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1">Top 30 Consultas de Busqueda</h3>
        <p class="text-slate-500 text-xs mb-4">Ordenadas por numero de clics — la posicion indica donde aparece su sitio en Google (1 = primer resultado)</p>
        <div class="overflow-x-auto rounded-xl" style="max-height: 700px; overflow-y: auto;">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-800/80">
                        <th class="text-left py-3 px-4 text-slate-400 font-semibold text-xs">#</th>
                        <th class="text-left py-3 px-4 text-slate-400 font-semibold text-xs">Consulta (lo que buscan en Google)</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Clics</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Impresiones</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">CTR</th>
                        <th class="text-right py-3 px-4 text-slate-400 font-semibold text-xs">Posicion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">1</td>
                        <td class="py-2.5 px-4 text-blue-300 font-medium text-xs">doeco</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">1,042</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">1,709</td>
                        <td class="py-2.5 px-4 text-right text-green-400">61.0%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">1.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">2</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">papel antigrasa</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">126</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">2,908</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">4.3%</td>
                        <td class="py-2.5 px-4 text-right pos-red font-bold">16.5</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">3</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">papel antigrasa guayaquil</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">84</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">461</td>
                        <td class="py-2.5 px-4 text-right text-green-400">18.2%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">3.7</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">4</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">ecolpack</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">72</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">159</td>
                        <td class="py-2.5 px-4 text-right text-green-400">45.3%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.4</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">5</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">papel antigrasa personalizado</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">43</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">293</td>
                        <td class="py-2.5 px-4 text-right text-green-400">14.7%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">6.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">6</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para pasteles quito</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">41</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">478</td>
                        <td class="py-2.5 px-4 text-right text-green-400">8.6%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">3.1</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">7</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">fundas de papel</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">39</td>
                        <td class="py-2.5 px-4 text-right text-amber-400">5,510</td>
                        <td class="py-2.5 px-4 text-right text-slate-400">0.7%</td>
                        <td class="py-2.5 px-4 text-right pos-red font-bold">10.4</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30 bg-amber-500/5">
                        <td class="py-2.5 px-4 text-slate-500">8</td>
                        <td class="py-2.5 px-4 text-amber-300 font-medium text-xs">empaques ecologicos</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">32</td>
                        <td class="py-2.5 px-4 text-right text-amber-400 font-bold">7,214</td>
                        <td class="py-2.5 px-4 text-right text-red-400">0.4%</td>
                        <td class="py-2.5 px-4 text-right pos-red font-bold">11.6</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">9</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para hamburguesas</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">28</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">577</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">4.9%</td>
                        <td class="py-2.5 px-4 text-right pos-red font-bold">29.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">10</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">empaques quito</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">27</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">723</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">3.7%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">7.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">11</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para postres</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">26</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">3,515</td>
                        <td class="py-2.5 px-4 text-right text-slate-400">0.7%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">4.8</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">12</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">papel antigrasa quito</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">26</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">123</td>
                        <td class="py-2.5 px-4 text-right text-green-400">21.1%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">1.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">13</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para tortas</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">22</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">600</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">3.7%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.6</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">14</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para comida rapida</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">18</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">202</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">8.9%</td>
                        <td class="py-2.5 px-4 text-right pos-red font-bold">22.2</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">15</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para pasteles</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">18</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">784</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">2.3%</td>
                        <td class="py-2.5 px-4 text-right pos-red font-bold">15.3</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">16</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">conos para papas</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">18</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">106</td>
                        <td class="py-2.5 px-4 text-right text-green-400">17.0%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.4</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">17</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">empaques</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">18</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">3,167</td>
                        <td class="py-2.5 px-4 text-right text-slate-400">0.6%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">8.8</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">18</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">platos de carton</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">18</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">723</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">2.5%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">3.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">19</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">papel para hamburguesas</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">16</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">501</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">3.2%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">5.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">20</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas de carton para comida ecuador</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">15</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">159</td>
                        <td class="py-2.5 px-4 text-right text-green-400">9.4%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">3.8</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">21</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">conos para papas fritas</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">15</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">71</td>
                        <td class="py-2.5 px-4 text-right text-green-400">21.1%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">22</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">fundas de papel quito</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">15</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">1,270</td>
                        <td class="py-2.5 px-4 text-right text-slate-400">1.2%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">7.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">23</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para cupcakes</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">13</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">565</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">2.3%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">24</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para pastel</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">13</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">227</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">5.7%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.2</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">25</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">empaques ecuador</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">13</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">241</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">5.4%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">9.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">26</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para hot dog guayaquil</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">12</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">286</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">4.2%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">4.5</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">27</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">cajas para hot dog quito</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">12</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">77</td>
                        <td class="py-2.5 px-4 text-right text-green-400">15.6%</td>
                        <td class="py-2.5 px-4 text-right pos-green font-bold">2.6</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">28</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">empaques biodegradables</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">12</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">1,765</td>
                        <td class="py-2.5 px-4 text-right text-slate-400">0.7%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">10.0</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">29</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">fundas de papel para alimentos</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">12</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">470</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">2.6%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">5.9</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="py-2.5 px-4 text-slate-500">30</td>
                        <td class="py-2.5 px-4 text-slate-200 text-xs">porta cubiertos</td>
                        <td class="py-2.5 px-4 text-right text-white font-bold">12</td>
                        <td class="py-2.5 px-4 text-right text-slate-300">1,457</td>
                        <td class="py-2.5 px-4 text-right text-slate-400">0.8%</td>
                        <td class="py-2.5 px-4 text-right pos-yellow font-bold">6.1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Opportunity highlight -->
    <div class="glass rounded-2xl p-5 mb-8 border border-amber-500/20" style="background: rgba(245, 158, 11, 0.06);">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-amber-400 font-semibold mb-1">OPORTUNIDAD ENORME: "empaques ecologicos"</h3>
                <p class="text-slate-400 text-sm leading-relaxed">La consulta "empaques ecologicos" tiene <strong class="text-amber-300">7,214 impresiones</strong> pero Doeco aparece en la posicion 11.6 (segunda pagina de Google). Con solo mejorar a posicion 3, se podrian obtener entre <strong class="text-green-400">500 y 800 clics mensuales GRATIS</strong>. Este es exactamente el tipo de termino que Doeco deberia dominar — es la busqueda principal de su industria en Ecuador.</p>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 5: OPORTUNIDADES Y PLAN DE ACCION ==================== -->
<div id="tab-plan" class="tab-content">

    <h2 class="text-white text-xl font-bold mb-2">Oportunidades y Plan de Accion</h2>
    <p class="text-slate-400 text-sm mb-6">Las semillas SEO ya estan dando frutos. Ahora es el momento de optimizar y acelerar el crecimiento.</p>

    <!-- Quick Wins -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Quick Wins — Esta Semana
        </h3>
        <p class="text-slate-500 text-xs mb-4">Acciones que se pueden implementar inmediatamente y que tendran impacto rapido</p>
        <div class="space-y-3">
            <div class="glass-lighter rounded-xl p-4 flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-green-400 font-bold text-sm">1</span>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">Reescribir Title Tags</p>
                    <p class="text-slate-400 text-xs mt-1">Actualmente el homepage dice <span class="text-red-400">"Inicio - Doeco"</span>. Deberia decir: <span class="text-green-400">"Empaques Ecologicos Biodegradables en Ecuador | Doeco"</span>. Esto mejora inmediatamente el posicionamiento para busquedas clave.</p>
                </div>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-green-400 font-bold text-sm">2</span>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">Escribir Meta Descriptions para TODAS las paginas</p>
                    <p class="text-slate-400 text-xs mt-1">Las meta descriptions son el texto que aparece debajo del titulo en Google. Sin ellas, Google muestra texto aleatorio de la pagina, lo que reduce los clics. Una buena description puede aumentar el CTR entre un 20-50%.</p>
                </div>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-green-400 font-bold text-sm">3</span>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">Personalizar el boton de WhatsApp por producto</p>
                    <p class="text-slate-400 text-xs mt-1">El boton de WhatsApp ya existe en el sitio, lo cual es positivo. La mejora clave es <strong class="text-white">personalizar el mensaje segun la pagina donde se encuentre el visitante</strong>. Por ejemplo, si el cliente esta viendo la "Caja Hamburguesa Grande", el mensaje que llega al asesor seria: <em>"Hola, estoy interesado en: Caja Hamburguesa Grande Bio — doeco.ec"</em>. Asi el equipo de ventas sabe exactamente que producto le interesa antes de responder, lo que acelera la venta y mejora la experiencia del cliente.</p>
                </div>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-green-400 font-bold text-sm">4</span>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">Agregar Blog al menu principal</p>
                    <p class="text-slate-400 text-xs mt-1">El blog tiene mas de 130 articulos generando trafico, pero no aparece en la navegacion principal. Agregarlo al menu aumenta la visibilidad interna y mejora la experiencia del usuario.</p>
                </div>
            </div>
            <div class="glass-lighter rounded-xl p-4 flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-green-400 font-bold text-sm">5</span>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">Mover beneficios tecnicos al homepage</p>
                    <p class="text-slate-400 text-xs mt-1">Los beneficios principales de los empaques ecologicos (biodegradables, certificados, resistentes) deben estar visibles inmediatamente al entrar al sitio, no escondidos en paginas internas.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- High Impact Opportunities -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            Oportunidades de Mayor Impacto
        </h3>
        <p class="text-slate-500 text-xs mb-4">Estas keywords ya tienen miles de impresiones. Solo necesitan mejorar su posicion para generar cientos de clics gratis al mes.</p>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="glass-lighter rounded-xl p-5 border border-amber-500/15">
                <p class="text-amber-300 font-bold text-sm">"empaques ecologicos"</p>
                <div class="mt-2 space-y-1 text-xs">
                    <p class="text-slate-400">Impresiones: <span class="text-white font-bold">7,214</span></p>
                    <p class="text-slate-400">Posicion actual: <span class="text-red-400 font-bold">11.6</span></p>
                    <p class="text-slate-400">Si llega a posicion 3: <span class="text-green-400 font-bold">+500-800 clics/mes GRATIS</span></p>
                </div>
                <div class="mt-3 w-full bg-slate-700/50 rounded-full h-2">
                    <div class="bg-gradient-to-r from-red-500 to-green-500 h-2 rounded-full" style="width: 40%"></div>
                </div>
                <p class="text-slate-500 text-[10px] mt-1">Progreso: Posicion 11.6 → Meta: Posicion 3</p>
            </div>
            <div class="glass-lighter rounded-xl p-5 border border-amber-500/15">
                <p class="text-amber-300 font-bold text-sm">"cajas para reposteria"</p>
                <div class="mt-2 space-y-1 text-xs">
                    <p class="text-slate-400">Impresiones: <span class="text-white font-bold">20,197</span></p>
                    <p class="text-slate-400">Posicion actual: <span class="text-amber-400 font-bold">7.3</span></p>
                    <p class="text-slate-400">Si llega a posicion 3: <span class="text-green-400 font-bold">+300-500 clics/mes GRATIS</span></p>
                </div>
                <div class="mt-3 w-full bg-slate-700/50 rounded-full h-2">
                    <div class="bg-gradient-to-r from-amber-500 to-green-500 h-2 rounded-full" style="width: 60%"></div>
                </div>
                <p class="text-slate-500 text-[10px] mt-1">Progreso: Posicion 7.3 → Meta: Posicion 3</p>
            </div>
            <div class="glass-lighter rounded-xl p-5 border border-amber-500/15">
                <p class="text-amber-300 font-bold text-sm">"envases ecologicos para comida"</p>
                <div class="mt-2 space-y-1 text-xs">
                    <p class="text-slate-400">Impresiones: <span class="text-white font-bold">28,245</span></p>
                    <p class="text-slate-400">Posicion actual: <span class="text-red-400 font-bold">22.6</span></p>
                    <p class="text-slate-400">Si llega a posicion 3: <span class="text-green-400 font-bold">+1,000-2,000 clics/mes GRATIS</span></p>
                </div>
                <div class="mt-3 w-full bg-slate-700/50 rounded-full h-2">
                    <div class="bg-gradient-to-r from-red-500 to-green-500 h-2 rounded-full" style="width: 20%"></div>
                </div>
                <p class="text-slate-500 text-[10px] mt-1">Progreso: Posicion 22.6 → Meta: Posicion 3</p>
            </div>
            <div class="glass-lighter rounded-xl p-5 border border-amber-500/15">
                <p class="text-amber-300 font-bold text-sm">"fundas de papel"</p>
                <div class="mt-2 space-y-1 text-xs">
                    <p class="text-slate-400">Impresiones: <span class="text-white font-bold">5,510</span></p>
                    <p class="text-slate-400">Posicion actual: <span class="text-red-400 font-bold">10.4</span></p>
                    <p class="text-slate-400">Si llega a posicion 3: <span class="text-green-400 font-bold">+200-400 clics/mes GRATIS</span></p>
                </div>
                <div class="mt-3 w-full bg-slate-700/50 rounded-full h-2">
                    <div class="bg-gradient-to-r from-red-500 to-green-500 h-2 rounded-full" style="width: 35%"></div>
                </div>
                <p class="text-slate-500 text-[10px] mt-1">Progreso: Posicion 10.4 → Meta: Posicion 3</p>
            </div>
        </div>
        <!-- Total potential -->
        <div class="mt-6 glass-accent rounded-xl p-4 text-center">
            <p class="text-blue-300 text-sm font-semibold">Potencial total de estas 4 oportunidades: <span class="text-green-400 text-lg font-bold">+2,000 a +3,700 clics/mes GRATIS</span></p>
            <p class="text-slate-500 text-xs mt-1">Equivalente a $2,000 - $3,700/mes en publicidad pagada de Google Ads</p>
        </div>
    </div>

    <!-- Content Strategy: 20 Posts per Month -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            Estrategia de Contenido: 20 Articulos SEO por Mes
        </h3>
        <p class="text-slate-500 text-xs mb-4">Cada articulo es una "semilla" que posiciona a Doeco en Google para busquedas relevantes. 20 articulos mensuales = 120 nuevas puertas de entrada al sitio en 6 meses.</p>

        <!-- Explanation -->
        <div class="glass-accent rounded-xl p-4 mb-6">
            <p class="text-blue-300 text-sm leading-relaxed"><strong>Como funciona:</strong> Cuando alguien busca en Google "empaques biodegradables para delivery en Quito", si Doeco tiene un articulo optimizado sobre ese tema, aparece en los resultados. El visitante lee el articulo, conoce los productos, y compra o contacta al asesor. Cada articulo publicado es una nueva oportunidad de aparecer en Google — por eso publicaremos <strong class="text-white">20 articulos por mes</strong>, clasificados en 3 tipos segun la intencion del usuario:</p>
        </div>

        <!-- Intent Types Explanation -->
        <div class="grid md:grid-cols-3 gap-4 mb-6">
            <div class="glass-lighter rounded-xl p-4 border-l-4 border-blue-400">
                <p class="text-blue-400 font-bold text-sm mb-1">Informativo</p>
                <p class="text-slate-400 text-xs leading-relaxed">El usuario quiere <strong class="text-slate-300">aprender</strong>. Busca informacion, guias o datos. Ejemplo: "que es el bagazo de cana". Estos articulos atraen trafico nuevo y posicionan a Doeco como experto en el tema.</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 border-l-4 border-amber-400">
                <p class="text-amber-400 font-bold text-sm mb-1">Comercial</p>
                <p class="text-slate-400 text-xs leading-relaxed">El usuario esta <strong class="text-slate-300">comparando opciones</strong>. Busca cual es mejor, diferencias, rankings. Ejemplo: "mejores empaques ecologicos Ecuador". Estos articulos guian al visitante hacia los productos de Doeco.</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 border-l-4 border-green-400">
                <p class="text-green-400 font-bold text-sm mb-1">Transaccional</p>
                <p class="text-slate-400 text-xs leading-relaxed">El usuario quiere <strong class="text-slate-300">comprar</strong>. Busca precios, proveedores, tiendas. Ejemplo: "comprar empaques biodegradables Quito". Estos articulos convierten directamente en ventas porque el visitante ya esta listo para comprar.</p>
            </div>
        </div>

        <!-- First 20 Posts Calendar -->
        <h4 class="text-white font-semibold text-sm mb-3">Primeros 20 Articulos — Mes 1</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-left">
                        <th class="px-3 py-2 text-slate-400 font-semibold bg-slate-800/50 rounded-tl-lg">#</th>
                        <th class="px-3 py-2 text-slate-400 font-semibold bg-slate-800/50">Titulo del Articulo</th>
                        <th class="px-3 py-2 text-slate-400 font-semibold bg-slate-800/50">Tipo</th>
                        <th class="px-3 py-2 text-slate-400 font-semibold bg-slate-800/50">Keyword Principal</th>
                        <th class="px-3 py-2 text-slate-400 font-semibold bg-slate-800/50 rounded-tr-lg">Objetivo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">1</td>
                        <td class="px-3 py-2.5 text-white">Donde Comprar Empaques Biodegradables en Quito: Guia Completa 2026</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">comprar empaques biodegradables quito</td>
                        <td class="px-3 py-2.5 text-slate-400">Captar compradores listos en Quito</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">2</td>
                        <td class="px-3 py-2.5 text-white">Empaques Biodegradables al por Mayor en Ecuador: Precios y Proveedores</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques biodegradables al por mayor ecuador precios</td>
                        <td class="px-3 py-2.5 text-slate-400">Captar B2B buscando mayoreo</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">3</td>
                        <td class="px-3 py-2.5 text-white">Empaques Personalizados con Logo para Restaurantes en Ecuador</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques personalizados con logo ecuador</td>
                        <td class="px-3 py-2.5 text-slate-400">Leads de personalizacion B2B</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">4</td>
                        <td class="px-3 py-2.5 text-white">Empaques para Delivery de Comida: Como Elegir el Mejor para Tu Negocio</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques para delivery comida</td>
                        <td class="px-3 py-2.5 text-slate-400">Guiar hacia productos Doeco</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">5</td>
                        <td class="px-3 py-2.5 text-white">Contenedores de Bagazo de Cana vs Foam: Comparativa de Precio y Calidad</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">contenedores bagazo cana vs foam</td>
                        <td class="px-3 py-2.5 text-slate-400">Convencer a cambiar de material</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">6</td>
                        <td class="px-3 py-2.5 text-white">Ley de Plasticos en Ecuador 2026: Lo Que Todo Negocio Necesita Saber</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-blue-500/15 text-blue-400 text-[10px] font-semibold">Informativo</span></td>
                        <td class="px-3 py-2.5 text-slate-400">ley plasticos ecuador 2026</td>
                        <td class="px-3 py-2.5 text-slate-400">Trafico alto + urgencia regulatoria</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">7</td>
                        <td class="px-3 py-2.5 text-white">Proveedores de Empaques Ecologicos en Guayaquil: Opciones y Precios</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques ecologicos guayaquil</td>
                        <td class="px-3 py-2.5 text-slate-400">Captar mercado de Guayaquil</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">8</td>
                        <td class="px-3 py-2.5 text-white">Cuanto Cuesta Cambiar a Empaques Biodegradables en Tu Restaurante</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">costo empaques biodegradables restaurante</td>
                        <td class="px-3 py-2.5 text-slate-400">Romper objecion de precio</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">9</td>
                        <td class="px-3 py-2.5 text-white">Que es el Bagazo de Cana de Azucar y Por Que es el Mejor Material para Empaques</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-blue-500/15 text-blue-400 text-[10px] font-semibold">Informativo</span></td>
                        <td class="px-3 py-2.5 text-slate-400">bagazo de cana empaques</td>
                        <td class="px-3 py-2.5 text-slate-400">Educar + posicionar material Doeco</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">10</td>
                        <td class="px-3 py-2.5 text-white">Fundas de Papel Kraft al por Mayor en Ecuador: Guia de Compra</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">fundas papel kraft al por mayor ecuador</td>
                        <td class="px-3 py-2.5 text-slate-400">Venta directa de fundas</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">11</td>
                        <td class="px-3 py-2.5 text-white">Empaques para Emprendedores de Comida: Como Empezar con Poco Presupuesto</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques para emprendedores comida ecuador</td>
                        <td class="px-3 py-2.5 text-slate-400">Captar emprendedores nuevos</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">12</td>
                        <td class="px-3 py-2.5 text-white">Diferencia entre Biodegradable, Compostable y Reciclable: Guia Simple</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-blue-500/15 text-blue-400 text-[10px] font-semibold">Informativo</span></td>
                        <td class="px-3 py-2.5 text-slate-400">diferencia biodegradable compostable</td>
                        <td class="px-3 py-2.5 text-slate-400">Featured snippet + autoridad</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">13</td>
                        <td class="px-3 py-2.5 text-white">Empaques Ecologicos para Cafeterias en Cuenca: Opciones y Proveedores</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques ecologicos cafeterias cuenca</td>
                        <td class="px-3 py-2.5 text-slate-400">Captar mercado Cuenca</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">14</td>
                        <td class="px-3 py-2.5 text-white">Como Elegir el Empaque Ideal para Hamburguesas y Comida Rapida</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques hamburguesas comida rapida</td>
                        <td class="px-3 py-2.5 text-slate-400">Guiar hacia contenedores Doeco</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">15</td>
                        <td class="px-3 py-2.5 text-white">Cuanto Tarda en Degradarse un Empaque Biodegradable vs Plastico</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-blue-500/15 text-blue-400 text-[10px] font-semibold">Informativo</span></td>
                        <td class="px-3 py-2.5 text-slate-400">cuanto tarda degradarse empaque biodegradable</td>
                        <td class="px-3 py-2.5 text-slate-400">Featured snippet + conciencia</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">16</td>
                        <td class="px-3 py-2.5 text-white">Cajas para Tortas y Pasteles Biodegradables: Guia de Tamanos y Precios</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">cajas tortas biodegradables precios</td>
                        <td class="px-3 py-2.5 text-slate-400">Venta directa pasteleria</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">17</td>
                        <td class="px-3 py-2.5 text-white">Normativa INEN 2026 para Empaques de Alimentos: Que Debe Cumplir Tu Negocio</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-blue-500/15 text-blue-400 text-[10px] font-semibold">Informativo</span></td>
                        <td class="px-3 py-2.5 text-slate-400">normativa inen empaques alimentos 2026</td>
                        <td class="px-3 py-2.5 text-slate-400">Urgencia normativa + trafico</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">18</td>
                        <td class="px-3 py-2.5 text-white">Los 5 Mejores Empaques Ecologicos para Restaurantes en Ecuador</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">mejores empaques ecologicos restaurantes ecuador</td>
                        <td class="px-3 py-2.5 text-slate-400">Ranking donde Doeco es #1</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">19</td>
                        <td class="px-3 py-2.5 text-white">Empaques Biodegradables para el Sector Floricola Ecuatoriano</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-amber-500/15 text-amber-400 text-[10px] font-semibold">Comercial</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques biodegradables floricultura ecuador</td>
                        <td class="px-3 py-2.5 text-slate-400">Nuevo vertical de alto valor</td>
                    </tr>
                    <tr class="hover:bg-slate-800/30">
                        <td class="px-3 py-2.5 text-slate-500">20</td>
                        <td class="px-3 py-2.5 text-white">Empaques Ecologicos al por Mayor en Ambato, Riobamba e Ibarra</td>
                        <td class="px-3 py-2.5"><span class="px-2 py-0.5 rounded-full bg-green-500/15 text-green-400 text-[10px] font-semibold">Transaccional</span></td>
                        <td class="px-3 py-2.5 text-slate-400">empaques ecologicos ambato riobamba ibarra</td>
                        <td class="px-3 py-2.5 text-slate-400">Captar ciudades medianas Sierra</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Distribution Summary -->
        <div class="grid md:grid-cols-3 gap-4 mt-6">
            <div class="glass-lighter rounded-xl p-4 text-center border-t-2 border-green-400">
                <p class="text-2xl font-bold text-green-400">7</p>
                <p class="text-slate-400 text-xs mt-1">Transaccionales</p>
                <p class="text-slate-500 text-[10px]">Generan ventas directas</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center border-t-2 border-amber-400">
                <p class="text-2xl font-bold text-amber-400">7</p>
                <p class="text-slate-400 text-xs mt-1">Comerciales</p>
                <p class="text-slate-500 text-[10px]">Guian hacia la compra</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center border-t-2 border-blue-400">
                <p class="text-2xl font-bold text-blue-400">6</p>
                <p class="text-slate-400 text-xs mt-1">Informativos</p>
                <p class="text-slate-500 text-[10px]">Atraen trafico y autoridad</p>
            </div>
        </div>

        <div class="glass-accent rounded-xl p-4 mt-4">
            <p class="text-blue-300 text-xs leading-relaxed"><strong>Estrategia:</strong> Priorizamos los articulos transaccionales y comerciales (14 de 20) porque atraen visitantes que estan mas cerca de comprar. Los informativos (6 de 20) generan volumen de trafico y posicionan a Doeco como experto. Cada mes se publicaran 20 nuevos articulos siguiendo esta proporcion, adaptando los temas segun los resultados del mes anterior.</p>
        </div>
    </div>

    <!-- Investment Plans -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Inversion Recomendada en Marketing Digital
        </h3>
        <p class="text-slate-500 text-xs mb-4">Dos modalidades de pago flexibles para el plan SEO profesional</p>
        <div class="grid md:grid-cols-2 gap-6 max-w-3xl mx-auto">
            <!-- Pago mensual -->
            <div class="glass-lighter rounded-xl p-6 border border-slate-600/30">
                <div class="text-center mb-5">
                    <p class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Plan SEO — Pago Mensual</p>
                    <p class="text-4xl font-bold text-white mt-2">$180<span class="text-sm text-slate-400 font-normal">/mes</span></p>
                    <p class="text-slate-500 text-xs mt-1">Compromiso minimo: 6 meses</p>
                    <p class="text-slate-500 text-xs">Total: $1,080</p>
                </div>
                <div class="space-y-2 text-xs text-slate-400">
                    <p class="check-green">20 articulos SEO nuevos cada mes</p>
                    <p class="check-green">SEO on-page (titles, metas, headings)</p>
                    <p class="check-green">Optimizacion de contenido existente</p>
                    <p class="check-green">Schema markup (datos estructurados)</p>
                    <p class="check-green">Optimizacion de imagenes y velocidad</p>
                    <p class="check-green">Enlazado interno y arquitectura SEO</p>
                    <p class="check-green">Configuracion de Google Tag Manager</p>
                    <p class="check-green">WhatsApp personalizado por producto</p>
                    <p class="check-green">Reportes mensuales de progreso</p>
                    <p class="check-green">Soporte continuo por 6 meses</p>
                </div>
            </div>
            <!-- Pago unico -->
            <div class="rounded-xl p-6 border-2 border-green-500/40" style="background: rgba(34, 197, 94, 0.08);">
                <div class="text-center mb-5">
                    <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-300 text-[10px] font-bold uppercase tracking-wider">Ahorra $200</span>
                    <p class="text-slate-400 text-xs uppercase tracking-wider font-semibold mt-2">Plan SEO — Pago Unico</p>
                    <p class="text-4xl font-bold text-white mt-2">$880<span class="text-sm text-slate-400 font-normal"> un solo pago</span></p>
                    <p class="text-slate-500 text-xs mt-1">Cobertura completa por 6 meses</p>
                    <p class="text-green-400 text-xs font-semibold">Usted ahorra $200 vs. pago mensual</p>
                </div>
                <div class="space-y-2 text-xs text-slate-400">
                    <p class="check-green">Todo lo incluido en el plan mensual</p>
                    <p class="check-green">20 articulos SEO nuevos cada mes</p>
                    <p class="check-green">SEO on-page (titles, metas, headings)</p>
                    <p class="check-green">Optimizacion de contenido existente</p>
                    <p class="check-green">Schema markup (datos estructurados)</p>
                    <p class="check-green">Optimizacion de imagenes y velocidad</p>
                    <p class="check-green">Enlazado interno y arquitectura SEO</p>
                    <p class="check-green">Configuracion de Google Tag Manager</p>
                    <p class="check-green">WhatsApp personalizado por producto</p>
                    <p class="check-green">Reportes mensuales de progreso</p>
                    <p class="check-green">Soporte continuo por 6 meses</p>
                </div>
            </div>
        </div>
        <div class="glass-accent rounded-xl p-4 mt-4">
            <p class="text-blue-300 text-xs text-center"><strong>Nota:</strong> El presupuesto de Google Ads y Meta Ads es independiente y se paga directamente a las plataformas. Le asesoramos en la configuracion y optimizacion de sus campanas como parte del plan SEO.</p>
        </div>
    </div>

    <!-- Roadmap -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            Roadmap de 6 Meses
        </h3>
        <p class="text-slate-500 text-xs mb-4">Plan de implementacion progresiva para maximizar resultados</p>
        <div class="relative pl-10">
            <div class="timeline-line"></div>
            <div class="space-y-5">
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-blue-500/80 border-2 border-blue-400 flex items-center justify-center"><span class="text-xs font-bold text-white">M1</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-blue-300 font-semibold text-sm">Mes 1 — Fundamentos</p>
                        <p class="text-slate-400 text-xs mt-1">Reescribir title tags y meta descriptions de las 50 paginas principales. Implementar Schema markup en productos. Agregar WhatsApp flotante. Agregar blog al menu.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-blue-500/60 border-2 border-blue-400/60 flex items-center justify-center"><span class="text-xs font-bold text-white">M2</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-blue-300 font-semibold text-sm">Mes 2 — Optimizacion de Contenido</p>
                        <p class="text-slate-400 text-xs mt-1">Reoptimizar los 15 articulos de blog con mas trafico. Mejorar enlaces internos entre blog y productos. Optimizar velocidad de carga del sitio.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-purple-500/60 border-2 border-purple-400/60 flex items-center justify-center"><span class="text-xs font-bold text-white">M3</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-purple-300 font-semibold text-sm">Mes 3 — Contenido Estrategico</p>
                        <p class="text-slate-400 text-xs mt-1">Crear paginas pilares para "empaques ecologicos", "cajas para reposteria" y "envases para comida". Estos seran los contenidos clave para posicionarse en las busquedas de mayor volumen.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-purple-500/60 border-2 border-purple-400/60 flex items-center justify-center"><span class="text-xs font-bold text-white">M4</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-purple-300 font-semibold text-sm">Mes 4 — Autoridad y Backlinks</p>
                        <p class="text-slate-400 text-xs mt-1">Construir enlaces de calidad desde directorios empresariales ecuatorianos, camaras de comercio, y sitios del sector gastronomico. Esto aumenta la autoridad del dominio ante Google.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-green-500/60 border-2 border-green-400/60 flex items-center justify-center"><span class="text-xs font-bold text-white">M5</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-green-300 font-semibold text-sm">Mes 5 — Conversion y Ventas</p>
                        <p class="text-slate-400 text-xs mt-1">Optimizar paginas de producto para conversion. Mejorar imagenes, descripciones, y calls-to-action. Implementar testimonios y casos de exito de clientes.</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-green-500/80 border-2 border-green-400 flex items-center justify-center"><span class="text-xs font-bold text-white">M6</span></div>
                    <div class="glass-lighter rounded-xl p-4">
                        <p class="text-green-300 font-semibold text-sm">Mes 6 — Escalamiento</p>
                        <p class="text-slate-400 text-xs mt-1">Analizar resultados, duplicar lo que funciona, expandir a nuevas categorias de keywords. Evaluar lanzamiento de Google Ads para keywords comerciales de alta intencion de compra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Growth Projection -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            Proyeccion de Crecimiento
        </h3>
        <p class="text-slate-500 text-xs mb-4">Estimacion conservadora basada en el ritmo actual de crecimiento y las optimizaciones planificadas</p>
        <div style="height: 300px;">
            <canvas id="projectionChart"></canvas>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
            <div class="text-center p-3 glass-lighter rounded-xl">
                <p class="text-slate-400 text-xs">Actual (Mar 2026)</p>
                <p class="text-white font-bold text-lg">~3,900</p>
                <p class="text-slate-500 text-[10px]">usuarios/mes</p>
            </div>
            <div class="text-center p-3 glass-lighter rounded-xl">
                <p class="text-blue-400 text-xs">Mes 3 (Jun 2026)</p>
                <p class="text-blue-300 font-bold text-lg">~5,500</p>
                <p class="text-slate-500 text-[10px]">con SEO optimizaciones</p>
            </div>
            <div class="text-center p-3 glass-lighter rounded-xl">
                <p class="text-purple-400 text-xs">Mes 6 (Sep 2026)</p>
                <p class="text-purple-300 font-bold text-lg">~8,000</p>
                <p class="text-slate-500 text-[10px]">con SEO + ads</p>
            </div>
            <div class="text-center p-3 glass-lighter rounded-xl">
                <p class="text-green-400 text-xs">Mes 12 (Mar 2027)</p>
                <p class="text-green-300 font-bold text-lg">~12,000</p>
                <p class="text-slate-500 text-[10px]">implementacion completa</p>
            </div>
        </div>
    </div>
</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 glass border-t border-slate-700/50 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-sm">Desarrollado por <a href="https://creativeweb.com.ec" target="_blank" class="text-blue-400 hover:text-blue-300 transition-colors font-medium">Creative Web</a> — creativeweb.com.ec</p>
        <p class="text-slate-600 text-xs mt-1">Informe generado: 1 de Abril, 2026</p>
    </div>
</footer>

<!-- JAVASCRIPT -->
<script>
// Tab navigation
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => { b.classList.remove('active'); b.classList.add('text-slate-400'); });
    document.getElementById('tab-' + tabId).classList.add('active');
    const btns = document.querySelectorAll('.tab-btn');
    const tabMap = ['resumen', 'antes', 'trafico', 'consultas', 'plan'];
    const idx = tabMap.indexOf(tabId);
    if (idx >= 0) { btns[idx].classList.add('active'); btns[idx].classList.remove('text-slate-400'); }
    window.scrollTo({ top: 0, behavior: 'smooth' });
    // Render charts when tab becomes visible
    if (tabId === 'antes') setTimeout(renderAntesCharts, 100);
    if (tabId === 'plan') setTimeout(renderPlanCharts, 100);
}

// Score ring
const scoreCtx = document.getElementById('scoreRing').getContext('2d');
new Chart(scoreCtx, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [42, 58],
            backgroundColor: ['#f59e0b', 'rgba(51,65,85,0.3)'],
            borderWidth: 0
        }]
    },
    options: {
        cutout: '78%',
        responsive: false,
        plugins: { legend: { display: false }, tooltip: { enabled: false } }
    }
});

// ANTES VS DESPUES CHARTS
let antesChartsRendered = false;
function renderAntesCharts() {
    if (antesChartsRendered) return;
    antesChartsRendered = true;

    // Evolution chart
    const labels = [
        'Jun 22','Jul 22','Ago 22','Sep 22','Oct 22','Nov 22','Dic 22',
        'Ene 23','Feb 23','Mar 23','Abr 23','May 23','Jun 23','Jul 23','Ago 23','Sep 23','Oct 23','Nov 23','Dic 23',
        'Ene 24','Feb 24','Mar 24','Abr 24','May 24','Jun 24','Jul 24','Ago 24','Sep 24','Oct 24','Nov 24','Dic 24',
        'Ene 25','Feb 25','Mar 25','Abr 25','May 25','Jun 25','Jul 25','Ago 25','Sep 25','Oct 25','Nov 25','Dic 25',
        'Ene 26','Feb 26','Mar 26'
    ];
    const data = [
        2764,6918,7090,5349,5606,5829,5215,
        1932,1722,1432,1165,1758,4890,4239,3768,4558,5554,4298,5538,
        3157,7078,5984,1102,909,1100,1003,1030,1042,960,1050,1071,
        1550,1378,1618,1733,1924,2088,1920,2203,2308,2725,3193,2395,
        4083,3135,3915
    ];

    // Create background zones
    const redZone = data.map((v, i) => i <= 30 ? v : null);
    const greenZone = data.map((v, i) => i >= 30 ? v : null);

    const evoCtx = document.getElementById('evolutionChart').getContext('2d');
    new Chart(evoCtx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Sin estrategia SEO',
                    data: redZone,
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.08)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 2,
                    pointHoverRadius: 5,
                    borderWidth: 2,
                    spanGaps: false
                },
                {
                    label: 'Con estrategia SEO',
                    data: greenZone,
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34, 197, 94, 0.08)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 2,
                    pointHoverRadius: 5,
                    borderWidth: 2,
                    spanGaps: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { labels: { color: '#94a3b8', font: { size: 11 } } },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#94a3b8',
                    borderColor: 'rgba(148,163,184,0.2)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(ctx) { return ctx.dataset.label + ': ' + (ctx.parsed.y ? ctx.parsed.y.toLocaleString() : '-') + ' usuarios'; }
                    }
                }
            },
            scales: {
                y: {
                    grid: { color: 'rgba(148,163,184,0.06)' },
                    ticks: { color: '#64748b', font: { size: 10 }, callback: v => v.toLocaleString() }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#64748b', font: { size: 9 }, maxRotation: 45, autoSkip: true, maxTicksLimit: 20 }
                }
            }
        }
    });

    // Quarterly comparison chart
    const qCtx = document.getElementById('quarterlyChart').getContext('2d');
    new Chart(qCtx, {
        type: 'bar',
        data: {
            labels: ['Oct-Dic 2024', 'Oct-Dic 2025'],
            datasets: [{
                label: 'Usuarios',
                data: [3081, 8313],
                backgroundColor: ['rgba(239, 68, 68, 0.6)', 'rgba(34, 197, 94, 0.6)'],
                borderColor: ['#ef4444', '#22c55e'],
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#94a3b8',
                    callbacks: { label: ctx => ctx.parsed.y.toLocaleString() + ' usuarios' }
                }
            },
            scales: {
                y: {
                    grid: { color: 'rgba(148,163,184,0.06)' },
                    ticks: { color: '#64748b', callback: v => v.toLocaleString() }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#94a3b8', font: { size: 12, weight: '600' } }
                }
            }
        }
    });

    // Traffic source doughnut
    const srcCtx = document.getElementById('sourceChart').getContext('2d');
    new Chart(srcCtx, {
        type: 'doughnut',
        data: {
            labels: ['Organic Social', 'Direct', 'Organic Search', 'Referral', 'Otros'],
            datasets: [{
                data: [69646, 43057, 37521, 1969, 1027],
                backgroundColor: ['#a855f7', '#3b82f6', '#22c55e', '#f59e0b', '#64748b'],
                borderWidth: 0,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '55%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#94a3b8',
                    callbacks: {
                        label: ctx => ctx.label + ': ' + ctx.parsed.toLocaleString() + ' (' + ((ctx.parsed / 153220) * 100).toFixed(1) + '%)'
                    }
                }
            }
        }
    });
}

// PLAN CHARTS
let planChartsRendered = false;
function renderPlanCharts() {
    if (planChartsRendered) return;
    planChartsRendered = true;

    const projCtx = document.getElementById('projectionChart').getContext('2d');
    new Chart(projCtx, {
        type: 'line',
        data: {
            labels: ['Mar 26', 'Abr 26', 'May 26', 'Jun 26', 'Jul 26', 'Ago 26', 'Sep 26', 'Oct 26', 'Nov 26', 'Dic 26', 'Ene 27', 'Feb 27', 'Mar 27'],
            datasets: [
                {
                    label: 'Proyeccion con SEO',
                    data: [3915, 4200, 4600, 5500, 5800, 6200, 6800, 7200, 7600, 8000, 9000, 10000, 10500],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.08)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    borderWidth: 2
                },
                {
                    label: 'Proyeccion con SEO + Ads',
                    data: [3915, 4200, 4800, 5500, 6200, 7000, 8000, 8800, 9500, 10200, 10800, 11500, 12000],
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34, 197, 94, 0.06)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    borderWidth: 2,
                    borderDash: [5, 5]
                },
                {
                    label: 'Sin cambios (estimado)',
                    data: [3915, 3800, 3700, 3600, 3500, 3400, 3400, 3300, 3300, 3200, 3200, 3100, 3100],
                    borderColor: '#64748b',
                    backgroundColor: 'transparent',
                    fill: false,
                    tension: 0.4,
                    pointRadius: 2,
                    borderWidth: 1,
                    borderDash: [3, 3]
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { labels: { color: '#94a3b8', font: { size: 11 } } },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#94a3b8',
                    callbacks: { label: ctx => ctx.dataset.label + ': ' + ctx.parsed.y.toLocaleString() + ' usuarios/mes' }
                }
            },
            scales: {
                y: {
                    grid: { color: 'rgba(148,163,184,0.06)' },
                    ticks: { color: '#64748b', callback: v => v.toLocaleString() }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#64748b', font: { size: 10 } }
                }
            }
        }
    });
}
</script>
</body>
</html>
