<?php
session_start();
if (!isset($_SESSION['auth_odlife']) || $_SESSION['auth_odlife'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe SEO — Odontologia Life — Marzo 2026</title>
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

    .tab-btn { transition: all 0.2s; }
    .tab-btn.active { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border-color: rgba(59, 130, 246, 0.3); }
    .tab-btn:not(.active):hover { background: rgba(148, 163, 184, 0.08); }
    .tab-content { display: none; animation: fadeUp 0.4s ease; }
    .tab-content.active { display: block; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .kpi-card { transition: transform 0.2s; }
    .kpi-card:hover { transform: translateY(-2px); }

    .timeline-line { position: absolute; left: 23px; top: 48px; bottom: 0; width: 2px; background: linear-gradient(to bottom, #3b82f6, #6366f1, #8b5cf6); }

    .check-green::before { content: '\2713'; color: #22c55e; font-weight: 700; margin-right: 8px; }
    .check-red::before { content: '\2717'; color: #ef4444; font-weight: 700; margin-right: 8px; }

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
                        <h1 class="text-lg font-bold text-white">Informe SEO & Contenido</h1>
                        <p class="text-sm text-slate-400">Marzo 2026 — Mes Inicial</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">Odontologia Life</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fecha</p>
                    <p class="text-sm text-white font-medium">28 de Marzo, 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>

        <!-- Brand bar -->
        <div class="mt-4 glass-accent rounded-xl px-5 py-3 flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <span class="text-blue-300 font-semibold text-sm">Odontologia Life</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">odontologialife.com</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-10 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen Ejecutivo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('analisis')">Analisis del Sitio</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('trafico')">Trafico y Keywords</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('plan')">Plan 6 Meses</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('trabajo')">Trabajo Realizado</button>
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
                <p class="text-slate-400 text-sm leading-relaxed">Este es el primer informe SEO de su pagina web odontologialife.com. Aqui encontrara un resumen claro de como esta funcionando su sitio web en Google: cuantas personas lo visitan, que buscan, y que podemos mejorar. Tambien incluye el plan de trabajo de los proximos 6 meses para que su consultorio aparezca en los primeros resultados cuando alguien busque un dentista en Otavalo o servicios dentales en Ecuador. Todo explicado de forma sencilla, sin tecnicismos.</p>
            </div>
        </div>
    </div>

    <!-- KPI Cards -->
    <h2 class="text-white font-bold text-lg mb-4">Metricas Principales (Nov 2025 - Mar 2026)</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <!-- KPI 1 -->
        <div class="kpi-card glass rounded-xl p-4">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-2">Usuarios Totales</p>
            <p class="text-2xl font-bold text-white">428</p>
            <p class="text-xs text-slate-500 mt-1">5 meses</p>
        </div>
        <!-- KPI 2 -->
        <div class="kpi-card glass rounded-xl p-4">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-2">Usuarios Organicos</p>
            <p class="text-2xl font-bold text-emerald-400">242</p>
            <p class="text-xs text-emerald-400/70 mt-1">56.5% del total</p>
        </div>
        <!-- KPI 3 -->
        <div class="kpi-card glass rounded-xl p-4">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-2">Impresiones Google</p>
            <p class="text-2xl font-bold text-blue-400">28,000+</p>
            <p class="text-xs text-slate-500 mt-1">Search Console</p>
        </div>
        <!-- KPI 4 -->
        <div class="kpi-card glass rounded-xl p-4">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-2">Posts Publicados</p>
            <p class="text-2xl font-bold text-white">53</p>
            <p class="text-xs text-blue-400/70 mt-1">49 + 4 nuevos</p>
        </div>
        <!-- KPI 5 -->
        <div class="kpi-card glass rounded-xl p-4">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-2">Keywords Top 10</p>
            <p class="text-2xl font-bold text-purple-400">~8</p>
            <p class="text-xs text-slate-500 mt-1">primeros resultados</p>
        </div>
        <!-- KPI 6 -->
        <div class="kpi-card glass rounded-xl p-4">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-2">CTR Promedio</p>
            <p class="text-2xl font-bold text-amber-400">0.97%</p>
            <p class="text-xs text-slate-500 mt-1">tasa de clics</p>
        </div>
    </div>

    <!-- Diagnosis -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Fortalezas -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4 flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </span>
                Fortalezas
            </h3>
            <ul class="space-y-3">
                <li class="check-green text-slate-300 text-sm">Post de implantes dentales genera 183 clics y 17,767 impresiones</li>
                <li class="check-green text-slate-300 text-sm">Estructura de categorias bien organizada (13 categorias)</li>
                <li class="check-green text-slate-300 text-sm">Yoast SEO instalado y configurado</li>
                <li class="check-green text-slate-300 text-sm">49 articulos publicados con contenido relevante</li>
            </ul>
        </div>
        <!-- Problemas -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4 flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-red-500/20 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </span>
                Problemas Detectados
            </h3>
            <ul class="space-y-3">
                <li class="check-red text-slate-300 text-sm">URLs duplicadas en /uncategorized/ canibalizando contenido</li>
                <li class="check-red text-slate-300 text-sm">35+ posts publicados con 0 clics en Google</li>
                <li class="check-red text-slate-300 text-sm">CTR muy bajo en keywords de alto volumen</li>
                <li class="check-red text-slate-300 text-sm">Sin SEO local optimizado para Otavalo</li>
            </ul>
        </div>
    </div>

</div>

<!-- ==================== TAB 2: ANALISIS DEL SITIO ==================== -->
<div id="tab-analisis" class="tab-content">

    <!-- Tecnologia -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Tecnologia del Sitio</h3>
        <div class="grid sm:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-4">
                <p class="text-slate-500 text-xs font-semibold uppercase mb-1">CMS</p>
                <p class="text-white font-semibold">WordPress</p>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <p class="text-slate-500 text-xs font-semibold uppercase mb-1">Page Builder</p>
                <p class="text-white font-semibold">Elementor</p>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <p class="text-slate-500 text-xs font-semibold uppercase mb-1">SEO Plugin</p>
                <p class="text-white font-semibold">Yoast SEO</p>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-4 mt-4">
            <div class="glass-lighter rounded-xl p-4">
                <p class="text-slate-500 text-xs font-semibold uppercase mb-1">Categorias</p>
                <p class="text-white font-semibold">13 categorias organizadas</p>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <p class="text-slate-500 text-xs font-semibold uppercase mb-1">Contenido</p>
                <p class="text-white font-semibold">53 posts publicados (49 + 4 nuevos)</p>
            </div>
        </div>
    </div>

    <!-- Top 5 pages -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Top 5 Paginas por Trafico</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Pagina</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Clics</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Impresiones</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Posicion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">/implantes-dentales-ecuador/</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">183</td>
                        <td class="px-4 py-3 text-slate-300 text-right">17,767</td>
                        <td class="px-4 py-3 text-amber-400 text-right">7.7</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">/blanqueamiento-dental-ecuador/</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">13</td>
                        <td class="px-4 py-3 text-slate-300 text-right">4,037</td>
                        <td class="px-4 py-3 text-amber-400 text-right">9.2</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">/ (Homepage)</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">19</td>
                        <td class="px-4 py-3 text-slate-300 text-right">2,225</td>
                        <td class="px-4 py-3 text-amber-400 text-right">4.2</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">/ortodoncia-otavalo/</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">11</td>
                        <td class="px-4 py-3 text-slate-300 text-right">275</td>
                        <td class="px-4 py-3 text-amber-400 text-right">6.1</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">/odontopediatra-en-otavalo/</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">8</td>
                        <td class="px-4 py-3 text-slate-300 text-right">151</td>
                        <td class="px-4 py-3 text-amber-400 text-right">5.0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid md:grid-cols-2 gap-6 mb-6">
        <!-- Donut: Traffic Sources -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4">Fuentes de Trafico</h3>
            <div class="flex justify-center">
                <div style="max-width: 300px; width: 100%;">
                    <canvas id="trafficSourcesChart"></canvas>
                </div>
            </div>
        </div>
        <!-- Bar: Top Cities -->
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4">Top Ciudades (Usuarios)</h3>
            <canvas id="citiesChart"></canvas>
        </div>
    </div>

</div>

<!-- ==================== TAB 3: TRAFICO Y KEYWORDS ==================== -->
<div id="tab-trafico" class="tab-content">

    <!-- Top Keywords -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-1">Keywords con Mejor Rendimiento</h3>
        <p class="text-slate-500 text-sm mb-4">Palabras clave que ya generan clics desde Google</p>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Keyword</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Clics</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Impresiones</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">CTR</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Posicion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">cuanto cuesta un implante dental en ecuador</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">11</td>
                        <td class="px-4 py-3 text-slate-300 text-right">567</td>
                        <td class="px-4 py-3 text-slate-300 text-right">1.94%</td>
                        <td class="px-4 py-3 text-amber-400 text-right">4.5</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">cuanto cuesta un implante dental</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">5</td>
                        <td class="px-4 py-3 text-slate-300 text-right">131</td>
                        <td class="px-4 py-3 text-slate-300 text-right">3.82%</td>
                        <td class="px-4 py-3 text-amber-400 text-right">3.9</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">cuanto vale un implante dental en ecuador</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">5</td>
                        <td class="px-4 py-3 text-slate-300 text-right">137</td>
                        <td class="px-4 py-3 text-slate-300 text-right">3.65%</td>
                        <td class="px-4 py-3 text-amber-400 text-right">4.1</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">implante dental precio ecuador</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">3</td>
                        <td class="px-4 py-3 text-slate-300 text-right">120</td>
                        <td class="px-4 py-3 text-slate-300 text-right">2.50%</td>
                        <td class="px-4 py-3 text-amber-400 text-right">9.3</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-blue-400">cuanto cuesta una protesis dental en ecuador</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">2</td>
                        <td class="px-4 py-3 text-slate-300 text-right">51</td>
                        <td class="px-4 py-3 text-slate-300 text-right">3.92%</td>
                        <td class="px-4 py-3 text-amber-400 text-right">6.3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- High Impression 0 Clicks -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-1 flex items-center gap-2">
            <span class="w-6 h-6 rounded-full bg-amber-500/20 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            </span>
            Keywords de Alta Oportunidad (muchas impresiones, 0 clics)
        </h3>
        <p class="text-slate-500 text-sm mb-4">Google ya muestra su pagina para estas busquedas, pero nadie hace clic. Con mejoras de posicion y meta descriptions, estos pueden generar cientos de visitas.</p>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Keyword</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Impresiones</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Posicion</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Potencial</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-amber-400">blanqueamiento dental</td>
                        <td class="px-4 py-3 text-slate-300 text-right">533</td>
                        <td class="px-4 py-3 text-red-400 text-right">65</td>
                        <td class="px-4 py-3 text-right"><span class="bg-amber-500/15 text-amber-400 text-xs font-semibold px-2 py-1 rounded-full">Alto</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-amber-400">blanqueamiento dental precio</td>
                        <td class="px-4 py-3 text-slate-300 text-right">218</td>
                        <td class="px-4 py-3 text-amber-400 text-right">6.6</td>
                        <td class="px-4 py-3 text-right"><span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-1 rounded-full">Quick Win</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-amber-400">implante dental</td>
                        <td class="px-4 py-3 text-slate-300 text-right">204</td>
                        <td class="px-4 py-3 text-red-400 text-right">50</td>
                        <td class="px-4 py-3 text-right"><span class="bg-amber-500/15 text-amber-400 text-xs font-semibold px-2 py-1 rounded-full">Alto</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-amber-400">costo implante dental ecuador</td>
                        <td class="px-4 py-3 text-slate-300 text-right">112</td>
                        <td class="px-4 py-3 text-amber-400 text-right">4.8</td>
                        <td class="px-4 py-3 text-right"><span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-1 rounded-full">Quick Win</span></td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-amber-400">endodoncia</td>
                        <td class="px-4 py-3 text-slate-300 text-right">51</td>
                        <td class="px-4 py-3 text-amber-400 text-right">9</td>
                        <td class="px-4 py-3 text-right"><span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-1 rounded-full">Quick Win</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- New Users Growth Chart -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Crecimiento de Usuarios Nuevos por Dia</h3>
        <p class="text-slate-500 text-sm mb-4">Noviembre 2025 - Marzo 2026</p>
        <canvas id="usersGrowthChart" height="120"></canvas>
    </div>

</div>

<!-- ==================== TAB 4: PLAN 6 MESES ==================== -->
<div id="tab-plan" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Plan Estrategico SEO — 6 Meses</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Este es el plan de trabajo mes a mes para posicionar odontologialife.com en los primeros resultados de Google. Cada mes incluye 4 articulos nuevos optimizados y mejoras tecnicas progresivas.</p>
            </div>
        </div>
    </div>

    <!-- Timeline -->
    <div class="relative mb-8">
        <div class="timeline-line"></div>
        <div class="space-y-6">
            <!-- Mes 1 -->
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center flex-shrink-0 z-10">
                    <span class="text-emerald-400 font-bold text-sm">1</span>
                </div>
                <div class="glass rounded-xl p-5 flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <h4 class="text-white font-bold">Abril 2026</h4>
                        <span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-0.5 rounded-full">INICIADO</span>
                    </div>
                    <p class="text-slate-400 text-sm mb-2">Correcciones tecnicas + 4 posts (Quick Wins)</p>
                    <ul class="text-slate-500 text-xs space-y-1">
                        <li>- Redirigir URLs /uncategorized/</li>
                        <li>- Optimizar meta descriptions de posts existentes</li>
                        <li>- 4 posts: Protesis dental, Diseno de sonrisa, Dentista Otavalo, Endodoncia</li>
                    </ul>
                </div>
            </div>
            <!-- Mes 2 -->
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center flex-shrink-0 z-10">
                    <span class="text-blue-400 font-bold text-sm">2</span>
                </div>
                <div class="glass rounded-xl p-5 flex-1">
                    <h4 class="text-white font-bold mb-2">Mayo 2026</h4>
                    <p class="text-slate-400 text-sm mb-2">Contenido transaccional + SEO Local</p>
                    <ul class="text-slate-500 text-xs space-y-1">
                        <li>- 4 posts: Coronas dentales, Carillas dentales, Extraccion muelas juicio, Calzas y restauraciones</li>
                        <li>- Optimizar Google Business Profile</li>
                        <li>- Registrar en Doctoralia y Paginas Amarillas EC</li>
                    </ul>
                </div>
            </div>
            <!-- Mes 3 -->
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center flex-shrink-0 z-10">
                    <span class="text-blue-400 font-bold text-sm">3</span>
                </div>
                <div class="glass rounded-xl p-5 flex-1">
                    <h4 class="text-white font-bold mb-2">Junio 2026</h4>
                    <p class="text-slate-400 text-sm mb-2">Ortodoncia + Estetica</p>
                    <ul class="text-slate-500 text-xs space-y-1">
                        <li>- 4 posts sobre ortodoncia invisible, brackets, estetica dental</li>
                        <li>- Optimizar posts existentes de ortodoncia</li>
                        <li>- Solicitar resenas de pacientes</li>
                    </ul>
                </div>
            </div>
            <!-- Mes 4 -->
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center flex-shrink-0 z-10">
                    <span class="text-indigo-400 font-bold text-sm">4</span>
                </div>
                <div class="glass rounded-xl p-5 flex-1">
                    <h4 class="text-white font-bold mb-2">Julio 2026</h4>
                    <p class="text-slate-400 text-sm mb-2">Contenido educativo + E-E-A-T</p>
                    <ul class="text-slate-500 text-xs space-y-1">
                        <li>- 4 posts educativos de alta autoridad</li>
                        <li>- Fortalecer perfil del doctor en el sitio</li>
                        <li>- Schema de LocalBusiness y MedicalOrganization</li>
                    </ul>
                </div>
            </div>
            <!-- Mes 5 -->
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 border border-purple-500/30 flex items-center justify-center flex-shrink-0 z-10">
                    <span class="text-purple-400 font-bold text-sm">5</span>
                </div>
                <div class="glass rounded-xl p-5 flex-1">
                    <h4 class="text-white font-bold mb-2">Agosto 2026</h4>
                    <p class="text-slate-400 text-sm mb-2">Long tail + FAQ mega page</p>
                    <ul class="text-slate-500 text-xs space-y-1">
                        <li>- 4 posts long tail con preguntas frecuentes</li>
                        <li>- Crear pagina FAQ principal con Schema</li>
                        <li>- Link building con directorios locales</li>
                    </ul>
                </div>
            </div>
            <!-- Mes 6 -->
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-violet-500/20 border border-violet-500/30 flex items-center justify-center flex-shrink-0 z-10">
                    <span class="text-violet-400 font-bold text-sm">6</span>
                </div>
                <div class="glass rounded-xl p-5 flex-1">
                    <h4 class="text-white font-bold mb-2">Septiembre 2026</h4>
                    <p class="text-slate-400 text-sm mb-2">Escalado + Analisis de resultados</p>
                    <ul class="text-slate-500 text-xs space-y-1">
                        <li>- 4 posts de escalado y temas complementarios</li>
                        <li>- Analisis completo de 6 meses</li>
                        <li>- Informe de resultados y plan de renovacion</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- KPI Targets -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Metas a 6 Meses</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Metrica</th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Actual</th>
                        <th class="text-center px-4 py-3 text-slate-400 font-semibold text-xs uppercase"></th>
                        <th class="text-right px-4 py-3 text-slate-400 font-semibold text-xs uppercase">Meta (Sep 2026)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-300">Usuarios organicos/mes</td>
                        <td class="px-4 py-3 text-amber-400 text-right">50</td>
                        <td class="px-4 py-3 text-center text-slate-500">→</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">300+</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-300">Impresiones mensuales</td>
                        <td class="px-4 py-3 text-amber-400 text-right">5,500</td>
                        <td class="px-4 py-3 text-center text-slate-500">→</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">30,000+</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-300">Keywords en Top 10</td>
                        <td class="px-4 py-3 text-amber-400 text-right">8</td>
                        <td class="px-4 py-3 text-center text-slate-500">→</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">35+</td>
                    </tr>
                    <tr class="border-b border-slate-700/30 hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-300">CTR promedio</td>
                        <td class="px-4 py-3 text-amber-400 text-right">0.97%</td>
                        <td class="px-4 py-3 text-center text-slate-500">→</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">3%+</td>
                    </tr>
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-4 py-3 text-slate-300">Clics organicos/mes</td>
                        <td class="px-4 py-3 text-amber-400 text-right">55</td>
                        <td class="px-4 py-3 text-center text-slate-500">→</td>
                        <td class="px-4 py-3 text-emerald-400 text-right font-semibold">500+</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ==================== TAB 5: TRABAJO REALIZADO ==================== -->
<div id="tab-trabajo" class="tab-content">

    <!-- Completed Work -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4 flex items-center gap-2">
            <span class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
            </span>
            Trabajo Completado — Marzo 2026
        </h3>
        <div class="space-y-3">
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Auditoria SEO completa del sitio web</p>
                    <p class="text-slate-500 text-xs">Analisis de 53 paginas, estructura, categorias, velocidad y errores tecnicos</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Analisis de Google Analytics (5 meses de datos)</p>
                    <p class="text-slate-500 text-xs">428 usuarios, fuentes de trafico, ciudades, comportamiento</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Analisis de Search Console (keywords, posiciones, impresiones)</p>
                    <p class="text-slate-500 text-xs">500+ keywords identificadas, oportunidades de Quick Wins mapeadas</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Identificacion de keywords de alta oportunidad</p>
                    <p class="text-slate-500 text-xs">Keywords con alto volumen y baja competencia para contenido nuevo</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Plan SEO de 6 meses con calendario editorial detallado</p>
                    <p class="text-slate-500 text-xs">24 posts planificados, KPIs, metas y estrategia de SEO local</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Post 1: Protesis dental en Ecuador — tipos, ventajas y opciones</p>
                    <p class="text-slate-500 text-xs">/rehabilitacion-oral-estetica/protesis-dental-ecuador-tipos-opciones/</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Post 2: Diseno de sonrisa en Ecuador — procedimiento y beneficios</p>
                    <p class="text-slate-500 text-xs">/estetica-y-tendencias/diseno-de-sonrisa-ecuador-procedimiento/</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Post 3: Dentista en Otavalo — servicios y especialidades</p>
                    <p class="text-slate-500 text-xs">/servicios-generales-y-emergencias/dentista-otavalo-clinica-dental/</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Post 4: Endodoncia en Ecuador — guia completa tratamiento de conducto</p>
                    <p class="text-slate-500 text-xs">/endodoncia/endodoncia-ecuador-guia-tratamiento-conducto/</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">4 imagenes Freepik optimizadas (WebP, alt text SEO)</p>
                    <p class="text-slate-500 text-xs">Compresion agresiva: 9.4MB → 26KB, todas en formato WebP</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">FAQ Schema JSON-LD en posts nuevos</p>
                    <p class="text-slate-500 text-xs">Datos estructurados para que Google muestre preguntas frecuentes en resultados</p>
                </div>
            </div>
            <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                <span class="text-emerald-400 font-bold mt-0.5">&#10003;</span>
                <div>
                    <p class="text-white text-sm font-medium">Internal linking entre posts</p>
                    <p class="text-slate-500 text-xs">Enlaces internos entre articulos nuevos y existentes para mejorar autoridad</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Next Month -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4 flex items-center gap-2">
            <span class="w-6 h-6 rounded-full bg-blue-500/20 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
            </span>
            Proximo Mes — Abril 2026
        </h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="glass-lighter rounded-xl p-4">
                <h4 class="text-white text-sm font-semibold mb-2">4 Posts Nuevos</h4>
                <ul class="text-slate-400 text-xs space-y-1.5">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Coronas dentales en Ecuador</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Carillas dentales en Ecuador</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Extraccion de muelas del juicio</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Calzas y restauraciones dentales</li>
                </ul>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <h4 class="text-white text-sm font-semibold mb-2">SEO Local y Directorios</h4>
                <ul class="text-slate-400 text-xs space-y-1.5">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Optimizar Google Business Profile</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Registrar en Doctoralia</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Registrar en Paginas Amarillas EC</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Solicitar resenas a pacientes</li>
                </ul>
            </div>
        </div>
    </div>

</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 glass border-t border-slate-700/50 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-sm">Desarrollado por <a href="https://creativeweb.com.ec" target="_blank" class="text-slate-400 hover:text-blue-400 font-medium transition-colors">Creative Web</a> — creativeweb.com.ec</p>
    </div>
</footer>

<script>
// Tab switching
const tabNames = ['resumen', 'analisis', 'trafico', 'plan', 'trabajo'];

function switchTab(tabId) {
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.add('text-slate-400');
    });
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });

    const tabContent = document.getElementById('tab-' + tabId);
    if (tabContent) {
        tabContent.classList.add('active');
    }

    const buttons = document.querySelectorAll('.tab-btn');
    const index = tabNames.indexOf(tabId);
    if (index >= 0 && buttons[index]) {
        buttons[index].classList.add('active');
        buttons[index].classList.remove('text-slate-400');
    }

    window.scrollTo({ top: 0, behavior: 'smooth' });

    if (tabId === 'analisis') {
        setTimeout(() => {
            initTrafficSourcesChart();
            initCitiesChart();
        }, 100);
    }
    if (tabId === 'trafico') {
        setTimeout(initUsersGrowthChart, 100);
    }
}

// Chart instances
let trafficSourcesChartInstance = null;
let citiesChartInstance = null;
let usersGrowthChartInstance = null;

// Traffic Sources Donut Chart
function initTrafficSourcesChart() {
    const ctx = document.getElementById('trafficSourcesChart');
    if (!ctx) return;
    if (trafficSourcesChartInstance) { trafficSourcesChartInstance.destroy(); }

    trafficSourcesChartInstance = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Google (56.5%)', 'Directo (15.4%)', 'Bing (12.6%)', 'ChatGPT (7%)', 'Otros (8.5%)'],
            datasets: [{
                data: [56.5, 15.4, 12.6, 7, 8.5],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(100, 116, 139, 0.8)'
                ],
                borderColor: 'rgba(15, 23, 42, 0.8)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#94a3b8',
                        font: { size: 11, family: 'Inter' },
                        padding: 15
                    }
                }
            },
            cutout: '65%'
        }
    });
}

// Cities Bar Chart
function initCitiesChart() {
    const ctx = document.getElementById('citiesChart');
    if (!ctx) return;
    if (citiesChartInstance) { citiesChartInstance.destroy(); }

    citiesChartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Quito', 'Guayaquil', 'Ibarra', 'Madrid', 'Bogota'],
            datasets: [{
                label: 'Usuarios',
                data: [75, 36, 12, 10, 7],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(59, 130, 246, 0.6)',
                    'rgba(59, 130, 246, 0.5)',
                    'rgba(59, 130, 246, 0.4)',
                    'rgba(59, 130, 246, 0.3)'
                ],
                borderColor: 'rgba(59, 130, 246, 0.9)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y',
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { color: 'rgba(148, 163, 184, 0.06)' },
                    ticks: { color: '#94a3b8', font: { size: 11, family: 'Inter' } }
                },
                y: {
                    grid: { display: false },
                    ticks: { color: '#e2e8f0', font: { size: 12, family: 'Inter', weight: '500' } }
                }
            }
        }
    });
}

// Users Growth Line Chart
function initUsersGrowthChart() {
    const ctx = document.getElementById('usersGrowthChart');
    if (!ctx) return;
    if (usersGrowthChartInstance) { usersGrowthChartInstance.destroy(); }

    const labels = [
        'Nov 1', 'Nov 8', 'Nov 15', 'Nov 22', 'Nov 29',
        'Dic 6', 'Dic 13', 'Dic 20', 'Dic 27',
        'Ene 3', 'Ene 10', 'Ene 17', 'Ene 24', 'Ene 31',
        'Feb 7', 'Feb 14', 'Feb 21', 'Feb 28',
        'Mar 7', 'Mar 14', 'Mar 21', 'Mar 28'
    ];
    const data = [1, 1, 2, 1, 2, 2, 3, 1, 2, 3, 2, 3, 4, 3, 4, 5, 4, 5, 6, 7, 5, 8];

    usersGrowthChartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Usuarios nuevos/dia',
                data: data,
                borderColor: 'rgba(59, 130, 246, 0.9)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                pointBorderColor: '#0f172a',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: { color: '#94a3b8', font: { size: 11, family: 'Inter' } }
                }
            },
            scales: {
                x: {
                    grid: { color: 'rgba(148, 163, 184, 0.06)' },
                    ticks: { color: '#94a3b8', font: { size: 10, family: 'Inter' }, maxRotation: 45 }
                },
                y: {
                    grid: { color: 'rgba(148, 163, 184, 0.06)' },
                    ticks: { color: '#94a3b8', font: { size: 11, family: 'Inter' } },
                    beginAtZero: true
                }
            }
        }
    });
}
</script>
</body>
</html>
