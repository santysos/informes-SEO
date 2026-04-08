<?php
session_start();
if (!isset($_SESSION['auth_kwoof']) || $_SESSION['auth_kwoof'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe de Marketing Digital — Kwoof Pet Care — Abril 2026</title>
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
    @keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .kpi-card { transition: transform 0.2s; }
    .kpi-card:hover { transform: translateY(-2px); }
    table { border-collapse: separate; border-spacing: 0; }
    thead th { position: sticky; top: 0; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: rgba(15,23,42,0.5); }
    ::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(148,163,184,0.5); }
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
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Informe de Marketing Digital y Oportunidades SEO</h1>
                        <p class="text-sm text-slate-400">Abril 2026 — Diagnostico Inicial</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">Kwoof Pet Care</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fecha</p>
                    <p class="text-sm text-white font-medium">7 de Abril, 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>
        <div class="mt-4 glass-accent rounded-xl px-5 py-3 flex flex-wrap items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-blue-300 font-semibold text-sm">Kwoof Pet Care</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">kwoofpetcare.com</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">Jackson Heights, Queens, NYC 11368</span>
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

<!-- ==================== TAB 1: RESUMEN ==================== -->
<div id="tab-resumen" class="tab-content active">

    <!-- Intro -->
    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que es este informe?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Este documento analiza la presencia en internet de <strong class="text-white">Kwoof Pet Care</strong> — es decir, como se ve su negocio en Google y que tan facil es para sus clientes potenciales en Queens y Brooklyn encontrarlo cuando buscan servicios de cuidado de mascotas. Le mostraremos que esta funcionando, que le falta, y cuanto dinero esta dejando de ganar.</p>
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
                <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-white">SEO</strong> significa "Search Engine Optimization" (Optimizacion para Motores de Busqueda). En palabras simples: <strong class="text-white">es el proceso de hacer que su sitio web aparezca en los primeros resultados de Google cuando alguien busca los servicios que usted ofrece.</strong></p>
                <p class="text-slate-400 text-sm leading-relaxed mb-3">Pienselo asi: cuando usted necesita un servicio, lo primero que hace es buscarlo en Google. Sus clientes hacen lo mismo. Si Kwoof no aparece en la primera pagina de Google, <strong class="text-white">es como tener un negocio de pet care en una calle por donde nadie pasa.</strong></p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Como funciona?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">Google envia "robots" que leen su sitio web. Basandose en lo que encuentran (textos, titulos, imagenes, velocidad), deciden en que posicion mostrar su sitio cuando alguien busca pet care en Queens o Brooklyn.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Por que importa?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">El 75% de las personas nunca pasa de la primera pagina de Google (fuente: Backlinko). Si usted esta en la pagina 2 o mas abajo, practicamente no existe para las personas que buscan pet care cerca de ellos.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-3">
                        <p class="text-cyan-400 font-bold text-xs mb-1">Cual es el beneficio?</p>
                        <p class="text-slate-400 text-[11px] leading-relaxed">A diferencia de los anuncios pagados (que dejan de funcionar cuando deja de pagar), el SEO genera visitas GRATIS y permanentes. Cada mejora que hacemos en su sitio se acumula con el tiempo como una bola de nieve.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Score -->
    <h2 class="text-white text-lg font-bold mb-4">Puntuacion General de Marketing Digital</h2>
    <div class="glass rounded-2xl p-8 mb-8">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="relative">
                <canvas id="scoreChart" width="160" height="160" class="score-ring"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-3xl font-extrabold text-red-400">25</span>
                    <span class="text-xs text-slate-400">de 100</span>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">Grado F — Critico</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">De 100 puntos posibles, su sitio web obtuvo <strong class="text-white">25 puntos</strong>. Esto significa que su presencia en internet tiene problemas serios que le estan costando clientes cada mes. La buena noticia: todos estos problemas tienen solucion y su potencial de crecimiento es enorme — especialmente porque la mayoria de sus competidores locales tampoco estan haciendo mucho.</p>
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
                        <td class="px-6 py-4 text-white font-medium">Visibilidad en Google</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">15/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Cuando alguien en Jackson Heights busca "dog walking near me" en Google, su negocio no aparece. Esos clientes potenciales van directamente a la competencia.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Google Maps y Presencia Local</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">5/100</span></td>
                        <td class="px-6 py-4 text-slate-400">NO tiene Google Business Profile. Esto significa que es completamente invisible en Google Maps — la forma #1 en que la gente encuentra servicios de pet care en NYC.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Contenido del Sitio Web</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">30/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Su sitio web solo tiene 5 paginas y no tiene blog. Necesita al menos 15-20 paginas para que Google entienda bien que servicios ofrece. A sus paginas les falta informacion clave que Google usa para decidir donde posicionarlo.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Resenas y Reputacion Online</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">0/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Tiene CERO resenas en cualquier plataforma — ni en Google, ni en Yelp, ni en Facebook. Cuando alguien elige entre usted y un competidor con 50+ resenas positivas, siempre elegiran al que tiene resenas.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Presencia en Redes Sociales</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">20/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Solo tiene Instagram (@kwoof__). Le falta Facebook, TikTok (el contenido de mascotas se vuelve viral!), Nextdoor (la app #1 donde los vecinos recomiendan servicios locales) y Yelp.</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-white font-medium">Salud Tecnica del Sitio</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">40/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Su sitio funciona en Squarespace con HTTPS — eso es una buena base. Pero hay problemas que confunden a Google: paginas duplicadas, titulos faltantes, un error de escritura ("Pet Bording" en vez de "Boarding"), y su sitio no le dice a Google que es un negocio local en Queens.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Alertas -->
    <h2 class="text-white text-lg font-bold mb-4">Alertas Criticas Que Necesita Saber</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">NO Existe en Google Maps</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Cuando alguien cerca de usted busca "pet care near me", Google muestra un mapa con 3 negocios. Usted NO es uno de ellos. Un Google Business Profile es GRATIS y es lo mas importante para cualquier negocio local. Sin el, usted es invisible para el 90% de sus clientes potenciales.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">CERO Resenas en Cualquier Plataforma</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">En Nueva York, las resenas lo son TODO. El 93% de los consumidores lee resenas antes de elegir un servicio local (fuente: BrightLocal 2024). Usted tiene cero resenas en Google, Yelp y Facebook. Un competidor con resenas siempre ganara al cliente, aunque su servicio sea mejor.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">No Esta en Yelp, Rover ni Ningun Directorio</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Su negocio no esta en Yelp (la plataforma #1 de resenas en NYC), Rover (el marketplace #1 de pet care), Nextdoor (la app del vecindario) ni ningun directorio. Estos perfiles son GRATIS y le traen clientes todos los dias. Es como tener un telefono que no esta en ninguna guia.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Solo 5 Paginas en Su Sitio Web</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Cada pagina de su sitio web es una oportunidad para que Google lo muestre. Con solo 5 paginas, aparece en muy pocas busquedas. Competidores con blogs y paginas de servicios tienen 50-100+ paginas — Google los muestra CIENTOS de veces mas que a usted.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 2: LO QUE ESTA PERDIENDO ==================== -->
<div id="tab-perdidas" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Clientes Que Lo Buscan Pero No Lo Encuentran</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Cada mes, cientos de personas en Queens y Brooklyn buscan en Google exactamente los servicios que usted ofrece — paseo de perros, pet sitting y boarding. Pero como su negocio no esta optimizado, esos clientes terminan contratando a otra persona. Aqui le mostramos exactamente que buscan y cuanto dinero representa.</p>
        </div>
    </div>

    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que buscan en Google</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Busquedas/mes*</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Aparece Kwoof?</th>
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Dinero que podria estar ganando</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"dog walking Jackson Heights"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~50-150</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~15-45 visitantes &rarr; 3-9 clientes nuevos a $20/paseo x 20 paseos/mes = <strong class="text-green-400">$1,200-$3,600/mes</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"pet sitting Queens NY"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~100-300</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~30-90 visitantes &rarr; 5-15 reservas nocturnas a $75/noche = <strong class="text-green-400">$375-$1,125/mes</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"dog walker near me" (Queens)</td>
                        <td class="px-4 py-4 text-center text-slate-300">~200-400</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~60-120 visitantes &rarr; 10-20 clientes nuevos a $20/paseo x 20 paseos/mes = <strong class="text-green-400">$4,000-$8,000/mes</strong></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-4 text-white font-medium">"pet boarding Queens"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~150-300</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">~45-90 visitantes &rarr; 5-10 estadias a $75/noche x 3 noches = <strong class="text-green-400">$1,125-$2,250/mes</strong></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-4 text-white font-medium">"pet care 11368"</td>
                        <td class="px-4 py-4 text-center text-slate-300">~10-30</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No aparece</span></td>
                        <td class="px-5 py-4 text-slate-400 text-xs">Poco volumen pero ALTA intencion — buscan exactamente su codigo postal = <strong class="text-green-400">$300-$900/mes</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-slate-700/30">
            <p class="text-slate-500 text-[10px] leading-relaxed">*Estimaciones basadas en Google Keyword Planner y Semrush. Los calculos de ingreso asumen que el primer resultado de Google recibe ~27% de los clics (Backlinko, 2023) y una tasa de conversion conservadora del 10-15% para servicios locales (WordStream 2024). Precios basados en promedios del mercado de pet care en Queens.</p>
        </div>
    </div>

    <!-- Total perdido -->
    <div class="alert-card glass rounded-2xl p-6 mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-red-400 font-bold text-lg mb-1">Dinero Que Esta Dejando de Ganar</h3>
                <p class="text-white text-2xl font-extrabold">$3,000 — $10,000+ mensuales</p>
                <p class="text-slate-400 text-sm mt-1">Estimamos que Kwoof esta perdiendo entre $3,000 y $10,000+ en ingresos mensuales de clientes que buscan pet care en Queens y Brooklyn en Google pero contratan a otra persona porque no lo pueden encontrar a usted.</p>
            </div>
        </div>
    </div>

    <!-- Problemas -->
    <h2 class="text-white text-lg font-bold mb-4">Problemas Que Le Estan Costando Dinero</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Sin Google Business Profile = Invisible en Maps</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Cuando alguien cerca de usted busca "dog walking near me", Google muestra un mapa con 3 negocios. Usted NO esta ahi. Un Google Business Profile es gratis y es lo mas importante para cualquier negocio local. Sin el, el 90% de sus clientes potenciales nunca sabran que usted existe.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Pagina de Inicio Duplicada Confunde a Google</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Su sitio web tiene dos versiones de la pagina principal (/ y /home) mostrando el mismo contenido. Esto confunde a Google — no sabe cual es la "real". Imagine tener dos tarjetas de presentacion identicas con diferentes telefonos — la gente no sabe a cual llamar.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">No Tiene Formulario de Contacto</h4>
            <p class="text-slate-400 text-xs leading-relaxed">No hay ningun formulario en su sitio para que clientes potenciales le escriban. Muchos duenos de mascotas jovenes en NYC prefieren enviar un mensaje rapido en vez de llamar. Sin formulario, pierde a todos esos clientes.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Titulos No Mencionan Su Ubicacion</h4>
            <p class="text-slate-400 text-xs leading-relaxed">El titulo de su sitio dice "Kwoof | Trusted Pet Care" pero nunca menciona Queens, Jackson Heights, Brooklyn o NYC. Google no sabe DONDE esta ubicado, asi que no puede mostrarlo a personas buscando cerca. Es como una tarjeta de presentacion sin direccion.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Pagina de Galeria con Titulo Generico</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Su pagina de galeria se titula "Gallery 3" — el nombre por defecto de la plantilla Squarespace — y no tiene descripcion para Google. Esta pagina podria mostrar mascotas felices y generar confianza, pero Google no tiene idea de que trata.</p>
        </div>
        <div class="alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-2">Error de Escritura: "Pet Bording"</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Uno de sus encabezados dice "Pet Bording" en vez de "Pet Boarding." Cuando los duenos de mascotas deciden a quien confiar sus peludos, los detalles importan. Google tambien puede mostrar este error en los resultados de busqueda.</p>
        </div>
    </div>

    <!-- Competidores -->
    <h2 class="text-white text-lg font-bold mb-4">Sus Competidores SI Estan Haciendo Esto</h2>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que tienen ellos</th>
                        <th class="text-center px-4 py-4 text-red-400 font-semibold text-xs uppercase tracking-wider">Kwoof</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Rover/Wag</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Competidores locales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30"><td class="px-5 py-3 text-white font-medium">Google Business Profile</td><td class="px-4 py-3 text-center text-red-400">No</td><td class="px-4 py-3 text-center text-green-400">Si</td><td class="px-4 py-3 text-center text-green-400">La mayoria si</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-5 py-3 text-white font-medium">Resenas en linea</td><td class="px-4 py-3 text-center text-red-400">Cero</td><td class="px-4 py-3 text-center text-green-400">50-200+</td><td class="px-4 py-3 text-center text-green-400">10-100+</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-5 py-3 text-white font-medium">Perfil en Yelp</td><td class="px-4 py-3 text-center text-red-400">No</td><td class="px-4 py-3 text-center text-green-400">Si</td><td class="px-4 py-3 text-center text-green-400">La mayoria</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-5 py-3 text-white font-medium">Blog/articulos de contenido</td><td class="px-4 py-3 text-center text-red-400">No tiene blog</td><td class="px-4 py-3 text-center text-green-400">Extenso</td><td class="px-4 py-3 text-center text-yellow-400">Algunos</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-5 py-3 text-white font-medium">Pagina de Facebook</td><td class="px-4 py-3 text-center text-red-400">No</td><td class="px-4 py-3 text-center text-green-400">Si</td><td class="px-4 py-3 text-center text-green-400">La mayoria</td></tr>
                    <tr><td class="px-5 py-3 text-white font-medium">Paginas por servicio</td><td class="px-4 py-3 text-center text-red-400">1 pagina para todo</td><td class="px-4 py-3 text-center text-green-400">Paginas separadas</td><td class="px-4 py-3 text-center text-yellow-400">Varia</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h4 class="text-green-400 font-bold text-sm mb-1">La Buena Noticia</h4>
                <p class="text-slate-300 text-sm leading-relaxed"><strong class="text-white">Jackson Heights tiene muy pocos negocios de pet care con una presencia online fuerte.</strong> La mayoria de los competidores locales tienen sitios web basicos y poco SEO. Si Kwoof actua ahora, puede convertirse en LA marca dominante de pet care en la zona en 6 meses. La ventana de oportunidad esta abierta.</p>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 3: FORTALEZAS ==================== -->
<div id="tab-fortalezas" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Lo Que Tiene a Favor</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">No todo son malas noticias. Kwoof Pet Care tiene bases solidas que muchos competidores no tienen. Solo necesitamos <strong class="text-white">hacer visibles estas ventajas en internet</strong> para que Google y sus clientes las conozcan.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Marca Memorable — "K-WOOF"</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Su nombre de marca es divertido, unico y facil de recordar. En un mercado lleno de nombres genericos como "Queens Pet Care", Kwoof se destaca. Una marca memorable significa que los clientes le recomendaran a sus amigos.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Totalmente Asegurado y con Fianza (Insured & Bonded)</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Esto es un factor de confianza ENORME. Muchos paseadores de perros en NYC no estan asegurados. Estar asegurado y con fianza hace que los duenos de mascotas se sientan seguros. Necesitamos poner esto al frente de cada pagina — es su diferenciador #1.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Sistema Profesional de Reservas (TimeToPet)</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Usa TimeToPet para agendar y manejar reservas. Esto lo hace ver mas profesional que competidores que solo usan mensajes de texto. Cuando los nuevos clientes lleguen del SEO, usted ya esta listo para manejar el volumen.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Areas de Servicio Bien Definidas</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Atiende Queens (Corona, LIC, area de 5 millas) y Brooklyn (Greenpoint, Williamsburg, PLG, Carroll Gardens). Tener areas definidas es excelente — podemos crear paginas dedicadas para cada vecindario.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Dominio y Sitio Web Propio</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Tener kwoofpetcare.com es una gran ventaja sobre cientos de dog walkers que solo tienen perfil en Rover. Su propio sitio web le da control total y Google lo ve como mas confiable.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Precios Competitivos para Queens</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Sus precios estan en el punto ideal — competitivos pero no baratos. Opciones por tiempo (15/30/45/60 min), tarifas de feriados, precios transparentes. Esto genera confianza y facilita la decision del cliente.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Seguridad HTTPS y Optimizacion de Imagenes</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Su sitio web tiene seguridad (el candado en el navegador), las imagenes cargan rapido con lazy loading y sus fotos tienen buenas descripciones. Estas son bases tecnicas que muchos negocios pequenos no tienen.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Jackson Heights = Mercado Sin Explotar</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Uno de los vecindarios mas diversos de NYC con una gran comunidad de duenos de mascotas. Muy pocos proveedores de pet care tienen presencia online real aqui. Si optimiza para esta zona, puede aduenar el mercado local antes que nadie.</p>
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
                <h3 class="text-white font-semibold mb-1">Por que su negocio necesita articulos de blog?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Cuando alguien busca en Google "best dog parks in Jackson Heights" y su sitio tiene un articulo sobre eso, Google muestra SU articulo. Esa persona lo lee, ve que usted ofrece paseo de perros, y agenda un meet & greet. <strong class="text-white">Cada articulo es como un vendedor que trabaja 24 horas al dia, 7 dias a la semana, sin cobrar sueldo.</strong></p>
            </div>
        </div>
    </div>

    <h3 class="text-white font-bold mb-3">Los 3 Tipos de Articulos y Para Que Sirven</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #22c55e;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400 mb-2">Transaccional</span>
            <p class="text-slate-400 text-xs leading-relaxed">La persona quiere <strong class="text-white">RESERVAR YA</strong>. Busca precios, disponibilidad, "near me". Estos generan reservas directas.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #f59e0b;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-500/15 text-amber-400 mb-2">Comercial</span>
            <p class="text-slate-400 text-xs leading-relaxed">La persona esta <strong class="text-white">COMPARANDO</strong> opciones. "Mejores dog walkers en Queens." Estos posicionan a Kwoof como el experto.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #3b82f6;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-blue-500/15 text-blue-400 mb-2">Informativo</span>
            <p class="text-slate-400 text-xs leading-relaxed">La persona quiere <strong class="text-white">APRENDER</strong>. Tips, guias, consejos. Estos atraen mucho trafico y establecen autoridad.</p>
        </div>
    </div>

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
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">1</td><td class="px-4 py-3 text-white text-xs font-medium">Best Dog Parks in Jackson Heights & Corona: A Complete Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog parks Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">2</td><td class="px-4 py-3 text-white text-xs font-medium">How Much Does Dog Walking Cost in Queens, NY? 2026 Pricing Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog walking cost Queens</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">3</td><td class="px-4 py-3 text-white text-xs font-medium">Dog Sitting vs. Dog Boarding: Which Is Better for Your Pet?</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog sitting vs boarding</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">4</td><td class="px-4 py-3 text-white text-xs font-medium">10 Tips for Keeping Your Dog Safe in NYC Summers</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog safety summer NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">5</td><td class="px-4 py-3 text-white text-xs font-medium">Finding Reliable Pet Care in Jackson Heights: What to Look For</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet care Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">6</td><td class="px-4 py-3 text-white text-xs font-medium">Dog Walking Services in Queens & Brooklyn — Book Kwoof Today</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog walking Queens Brooklyn</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">7</td><td class="px-4 py-3 text-white text-xs font-medium">Pet-Friendly Apartments in Jackson Heights: The Ultimate Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet friendly apartments Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">8</td><td class="px-4 py-3 text-white text-xs font-medium">5 Best Dog Walkers in Queens: How to Choose the Right One</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">best dog walkers Queens</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">9</td><td class="px-4 py-3 text-white text-xs font-medium">Overnight Pet Sitting in Queens: What to Expect & How to Prepare</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">overnight pet sitting Queens</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">10</td><td class="px-4 py-3 text-white text-xs font-medium">How to Prepare Your Dog for a Dog Walker: First-Time Tips</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">prepare dog for walker</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">11</td><td class="px-4 py-3 text-white text-xs font-medium">Why Insured & Bonded Pet Care Matters (And How to Verify)</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">insured bonded pet care NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">12</td><td class="px-4 py-3 text-white text-xs font-medium">Pet Boarding in Queens & Brooklyn: Rates, Tips & How to Book</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet boarding Queens Brooklyn</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">13</td><td class="px-4 py-3 text-white text-xs font-medium">Walking Your Dog in Winter in NYC: Cold Weather Safety Guide</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog walking winter NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">14</td><td class="px-4 py-3 text-white text-xs font-medium">Rover vs. Hiring a Local Dog Walker: Pros, Cons & Real Costs</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">Rover vs local dog walker</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">15</td><td class="px-4 py-3 text-white text-xs font-medium">In-Home Pet Sitting in Jackson Heights: Personalized Care</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet sitting Jackson Heights</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">16</td><td class="px-4 py-3 text-white text-xs font-medium">Separation Anxiety in Dogs: Signs & How Regular Walks Help</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">dog separation anxiety walks</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">17</td><td class="px-4 py-3 text-white text-xs font-medium">Cat Sitting in Queens: Why Your Cat Needs an In-Home Sitter</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">cat sitting Queens NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">18</td><td class="px-4 py-3 text-white text-xs font-medium">Holiday Pet Care in NYC: Planning for Thanksgiving & Christmas</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Info</span></td><td class="px-4 py-3 text-slate-400 text-xs">holiday pet care NYC</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">19</td><td class="px-4 py-3 text-white text-xs font-medium">Pet Care Near the 7 Train: Serving Corona, Woodside & Elmhurst</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Trans</span></td><td class="px-4 py-3 text-slate-400 text-xs">pet care Corona Woodside Queens</td></tr>
                    <tr><td class="px-3 py-3 text-center text-slate-500 text-xs">20</td><td class="px-4 py-3 text-white text-xs font-medium">Why Kwoof? Meet Stephanie & the Story Behind K-Woof Pet Care</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Com</span></td><td class="px-4 py-3 text-slate-400 text-xs">Kwoof pet care reviews</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass-accent rounded-2xl p-5 mb-6">
        <p class="text-slate-400 text-xs leading-relaxed"><strong class="text-blue-300">Nota importante:</strong> Los titulos de los articulos estan en ingles porque su mercado objetivo son clientes de habla inglesa en Queens y Brooklyn. Google posiciona los articulos segun el idioma en que la gente busca, y en NYC la mayoria de las busquedas de pet care son en ingles.</p>
    </div>

    <div class="glass rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold mb-4">Distribucion Estrategica del Contenido</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-blue-400 mb-1">7</div>
                <div class="text-xs text-slate-400">Articulos Informativos</div>
                <div class="text-[10px] text-slate-500 mt-1">35% — Atraen trafico masivo</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2"><div class="bg-blue-500 h-2 rounded-full" style="width: 35%"></div></div>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-amber-400 mb-1">7</div>
                <div class="text-xs text-slate-400">Articulos Comerciales</div>
                <div class="text-[10px] text-slate-500 mt-1">35% — Posicionan como experto</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2"><div class="bg-amber-500 h-2 rounded-full" style="width: 35%"></div></div>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <div class="text-2xl font-extrabold text-green-400 mb-1">6</div>
                <div class="text-xs text-slate-400">Articulos Transaccionales</div>
                <div class="text-[10px] text-slate-500 mt-1">30% — Generan reservas directas</div>
                <div class="w-full bg-slate-700/50 rounded-full h-2 mt-2"><div class="bg-green-500 h-2 rounded-full" style="width: 30%"></div></div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== TAB 5: INVERSION ==================== -->
<div id="tab-inversion" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-4">Fase 1 — Arreglar las Bases (Semanas 1-2)</h2>
    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #3b82f6;">
        <p class="text-slate-400 text-sm mb-4">Estos son los primeros pasos criticos para hacer visible su negocio en internet:</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Crear su <strong class="text-white">Google Business Profile</strong> — para aparecer en Google Maps</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Corregir <strong class="text-white">titulos de pagina</strong> con ubicacion (Queens, Brooklyn, NYC)</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Eliminar <strong class="text-white">paginas duplicadas</strong> (redirigir /home a /)</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Agregar <strong class="text-white">datos de negocio local</strong> para que Google sepa su nombre, direccion, telefono y horarios</p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Crear perfiles en <strong class="text-white">Yelp, Nextdoor y Facebook</strong></p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Corregir error de escritura, titulo de galeria y agregar <strong class="text-white">formulario de contacto</strong></p>
            </div>
            <div class="glass-lighter rounded-lg p-3 flex items-start gap-2 md:col-span-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-xs">Iniciar <strong class="text-white">estrategia de resenas</strong> — pedir a cada cliente satisfecho que deje una resena en Google. Conectar con su <a href="https://www.timetopet.com/portal/kwoofpetcare/create-account" target="_blank" class="text-blue-400 hover:text-blue-300 underline">sistema de reservas TimeToPet</a> para hacer el proceso fluido.</p>
            </div>
        </div>
    </div>

    <h2 class="text-white text-lg font-bold mb-4">Fase 2 — Plan SEO de 6 Meses (Para Dominar las Busquedas Locales)</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-1">Pago Mensual</h3>
            <div class="flex items-baseline gap-1 mb-2">
                <span class="text-3xl font-extrabold text-white">$180</span>
                <span class="text-slate-400 text-sm">/mes</span>
            </div>
            <p class="text-slate-400 text-sm mb-4">x 6 meses = <strong class="text-white">$1,080 total</strong></p>
            <div class="glass-lighter rounded-lg px-4 py-2"><p class="text-slate-400 text-xs">Compromiso minimo: 6 meses</p></div>
        </div>
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
            <p class="text-green-400 text-sm font-semibold">Usted ahorra $200</p>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Que incluyen ambos planes?</h3>
        <div class="space-y-3">
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">20 articulos nuevos cada mes</strong> para que Google encuentre su negocio en mas y mas busquedas (120 articulos en 6 meses)</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Paginas dedicadas por servicio</strong> (dog walking, pet sitting, boarding) y por cada vecindario</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Gestion de Google Business Profile</strong> — publicaciones semanales, fotos y preguntas/respuestas</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Reportes mensuales</strong> mostrando cuantas personas lo encontraron, que buscaron y cuantas lo contactaron</p>
            </div>
            <div class="flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <p class="text-slate-400 text-sm"><strong class="text-white">Correcciones tecnicas SEO</strong> y <strong class="text-white">soporte continuo</strong> por 6 meses</p>
            </div>
        </div>
    </div>

    <!-- Proyeccion -->
    <h2 class="text-white text-lg font-bold mb-4">Proyeccion de Resultados — 6 Meses</h2>
    <div class="glass rounded-2xl p-6 mb-6">
        <canvas id="projectionChart" height="300"></canvas>
    </div>
    <div class="glass rounded-2xl p-5 mb-8">
        <p class="text-slate-400 text-xs leading-relaxed">Proyecciones conservadoras basadas en el rendimiento promedio de SEO para negocios locales de pet care en NYC. Los resultados dependen de la consistencia, la competencia y la generacion de resenas. Fuente: promedios de campanas de Creative Web.</p>
    </div>

    <!-- CTA -->
    <div class="glass rounded-2xl p-8 text-center mb-8" style="border: 2px solid rgba(59, 130, 246, 0.3);">
        <h3 class="text-white text-xl font-bold mb-2">Listo para Empezar a Conseguir Mas Clientes?</h3>
        <p class="text-slate-400 text-sm mb-6">Cada dia sin SEO es otro dia en que sus competidores se llevan a SUS clientes. Empecemos a construir su presencia online hoy.</p>
        <a href="https://www.timetopet.com/portal/kwoofpetcare/create-account" target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Agendar un Meet & Greet
        </a>
    </div>
</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 glass border-t border-slate-700/50 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-xs mb-1">Desarrollado por <span class="text-slate-400 font-medium">Creative Web</span> — <a href="https://creativeweb.com.ec" class="text-blue-400 hover:text-blue-300 transition-colors" target="_blank">creativeweb.com.ec</a></p>
        <p class="text-slate-600 text-[10px]">Informe generado: 7 de Abril, 2026</p>
    </div>
</footer>

<script>
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tabId).classList.add('active');
    const buttons = document.querySelectorAll('.tab-btn');
    const tabMap = ['resumen', 'perdidas', 'fortalezas', 'contenido', 'inversion'];
    const idx = tabMap.indexOf(tabId);
    if (idx >= 0) buttons[idx].classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
    if (tabId === 'resumen') renderScoreChart();
    if (tabId === 'inversion') renderProjectionChart();
}

function renderScoreChart() {
    const ctx = document.getElementById('scoreChart');
    if (!ctx) return;
    if (ctx._chartInstance) ctx._chartInstance.destroy();
    ctx._chartInstance = new Chart(ctx, {
        type: 'doughnut',
        data: { datasets: [{ data: [25, 75], backgroundColor: ['#ef4444', 'rgba(51,65,85,0.3)'], borderWidth: 0, cutout: '78%' }] },
        options: { responsive: false, plugins: { legend: { display: false }, tooltip: { enabled: false } }, animation: { animateRotate: true, duration: 1200 } }
    });
}

function renderProjectionChart() {
    const ctx = document.getElementById('projectionChart');
    if (!ctx) return;
    if (ctx._chartInstance) ctx._chartInstance.destroy();
    ctx._chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Actual', 'Mes 1', 'Mes 2', 'Mes 3', 'Mes 4', 'Mes 5', 'Mes 6'],
            datasets: [
                { label: 'Visitas mensuales al sitio', data: [50, 150, 350, 600, 1000, 1500, 2200], borderColor: '#3b82f6', backgroundColor: 'rgba(59,130,246,0.1)', fill: true, tension: 0.4, pointBackgroundColor: '#3b82f6', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 5 },
                { label: 'Nuevos clientes/mes', data: [2, 5, 10, 18, 28, 40, 55], borderColor: '#22c55e', backgroundColor: 'rgba(34,197,94,0.08)', fill: true, tension: 0.4, pointBackgroundColor: '#22c55e', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 5, yAxisID: 'y1' }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#94a3b8', font: { family: 'Inter', size: 12 } } }, tooltip: { backgroundColor: 'rgba(15,23,42,0.9)', titleColor: '#e2e8f0', bodyColor: '#94a3b8', borderColor: 'rgba(148,163,184,0.2)', borderWidth: 1 } },
            scales: {
                x: { ticks: { color: '#64748b', font: { family: 'Inter', size: 11 } }, grid: { color: 'rgba(148,163,184,0.06)' } },
                y: { position: 'left', ticks: { color: '#64748b', font: { family: 'Inter', size: 11 }, callback: v => v.toLocaleString() + ' visitas' }, grid: { color: 'rgba(148,163,184,0.06)' } },
                y1: { position: 'right', ticks: { color: '#22c55e', font: { family: 'Inter', size: 11 }, callback: v => v + ' clientes' }, grid: { display: false } }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', function() { renderScoreChart(); });
</script>
</body>
</html>
