<?php
session_start();
if (!isset($_SESSION['auth_rolando']) || $_SESSION['auth_rolando'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe Marketing Digital — Rolando Constante — Abril 2026</title>
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
    .bg-pattern { position: fixed; inset: 0; z-index: 0; background-image: radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.07) 0%, transparent 50%), radial-gradient(circle at 85% 20%, rgba(14, 165, 233, 0.05) 0%, transparent 50%), radial-gradient(circle at 50% 85%, rgba(99, 102, 241, 0.04) 0%, transparent 50%); pointer-events: none; }
    .grid-bg { position: fixed; inset: 0; z-index: 0; background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(148,163,184,0.025) 39px, rgba(148,163,184,0.025) 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(148,163,184,0.025) 39px, rgba(148,163,184,0.025) 40px); pointer-events: none; }
    .tab-btn { transition: all 0.2s; cursor: pointer; -webkit-tap-highlight-color: transparent; }
    .tab-btn.active { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border-color: rgba(59, 130, 246, 0.3); }
    .tab-btn:not(.active):hover { background: rgba(148, 163, 184, 0.08); }
    .tab-content { display: none; animation: fadeUp 0.4s ease; }
    .tab-content.active { display: block; }
    #tabNav { -webkit-overflow-scrolling: touch; scrollbar-width: none; }
    #tabNav::-webkit-scrollbar { display: none; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .kpi-card { transition: transform 0.2s; }
    .kpi-card:hover { transform: translateY(-2px); }
    table { border-collapse: separate; border-spacing: 0; }
    thead th { position: sticky; top: 0; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: rgba(15,23,42,0.5); }
    ::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 3px; }
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
                        <h1 class="text-lg font-bold text-white">Informe de Marketing Digital y Oportunidades</h1>
                        <p class="text-sm text-slate-400">Abril 2026 — Diagnostico Completo + Propuesta</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">Rolando Constante</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fecha</p>
                    <p class="text-sm text-white font-medium">3 de Abril, 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>
        <div class="mt-4 glass-accent rounded-xl px-5 py-3 flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-blue-300 font-semibold text-sm">Rolando Constante</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">rolandoconstante.com — Instituto de Prosperidad Constante, Quito</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen Ejecutivo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('organico')">Organico vs Pagado</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('competencia')">Competencia</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('contenido')">Plan de Contenido</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('inversion')">Propuesta e Inversion</button>
        </div>
    </div>
</nav>

<main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-8">

<!-- ==================== TAB 1: RESUMEN EJECUTIVO ==================== -->
<div id="tab-resumen" class="tab-content active">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que es este informe?</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Este documento analiza la presencia digital del <strong class="text-white">Instituto de Prosperidad Constante</strong> y la marca personal de Rolando Constante. Evaluamos como lo encuentran en Google, de donde viene su trafico, que hace su competencia, y le proponemos un plan para que Google trabaje para usted — generando alumnos nuevos sin depender exclusivamente de la publicidad pagada.</p>
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
                    <span class="text-3xl font-extrabold text-yellow-400">50</span>
                    <span class="text-xs text-slate-400">de 100</span>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-500/20 text-yellow-400 border border-yellow-500/30">Grado D — Necesita mejora</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">Su sitio tiene buenas bases tecnicas (GA4, GTM, HubSpot, Elementor Pro, Schema basico) pero tiene una debilidad critica: <strong class="text-white">el 96% de su trafico viene de publicidad pagada y visitas directas.</strong> Solo el 4.5% viene de Google organico. Esto significa que si deja de pagar Meta Ads, su flujo de alumnos se detiene. Con 35 anos de experiencia, 7,000+ conferencias, y clientes como Toyota, Nissan y Ford, usted tiene la materia prima perfecta para dominar Google — solo falta convertirla en contenido.</p>
            </div>
        </div>
    </div>

    <!-- Score breakdown -->
    <h2 class="text-white text-lg font-bold mb-4">Desglose por Area</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Area evaluada</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Puntuacion</th>
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que significa para su negocio?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">SEO Tecnico</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">50/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Tiene Schema basico, canonical tags, GA4 y GTM. Pero los titles son genericos ("Home - Constante"), la homepage tiene 8 H1 (deberia tener 1), y el 87% de las imagenes no tienen texto alternativo. El robots.txt devuelve error 406.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Contenido y SEO On-Page</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">20/100</span></td>
                        <td class="px-6 py-4 text-slate-400">CERO articulos de blog. Toda la experiencia de 35 anos NO esta publicada en Internet. Sus competidores publican guias sobre ventas que capturan a SUS clientes potenciales. Tiene el conocimiento pero no lo comparte en formato digital.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Conversion (inscripciones)</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">60/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Tiene formularios con HubSpot, WhatsApp, pasarela de pago (Hotmart/PayPal), y la pagina "Gracias" tiene 17% de rebote (excelente). Pero las landing pages tienen rebote del 79-87% — la gente llega y se va sin actuar.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Posicion vs competencia</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400">65/100</span></td>
                        <td class="px-6 py-4 text-slate-400">La competencia local en Ecuador es DEBIL en SEO. EVN usa Wix, Escuela de Vendedores tiene 1 post desde 2013. Solo Perfil Comercial tiene blog activo. Si actua ahora, puede dominar "escuela de ventas" y "curso de ventas quito" en 3-6 meses.</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-white font-medium">Confianza y autoridad</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400">70/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Excelente materia prima: 35 anos, 7,000+ conferencias, clientes Fortune 500 (Toyota, Ford, Nissan), certificacion SENESCYT, testimonios en video, metodo PAICODOCI propio. Solo falta que Google lo sepa.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- KPIs -->
    <h2 class="text-white text-lg font-bold mb-4">Los Numeros Reales (3 anos: Mar 2023 — Abr 2026)</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-white">16,404</p>
            <p class="text-slate-400 text-xs mt-1">Usuarios totales</p>
            <p class="text-slate-500 text-[10px]">3 anos acumulado</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-white">~456</p>
            <p class="text-slate-400 text-xs mt-1">Usuarios/mes promedio</p>
            <p class="text-slate-500 text-[10px]">Todas las fuentes</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-red-400">745</p>
            <p class="text-slate-400 text-xs mt-1">Usuarios de Google organico</p>
            <p class="text-slate-500 text-[10px]">Solo 4.5% del total</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-blue-400">5,821</p>
            <p class="text-slate-400 text-xs mt-1">Usuarios de Meta Ads</p>
            <p class="text-slate-500 text-[10px]">35.5% del total</p>
        </div>
    </div>

    <!-- Alerts -->
    <h2 class="text-white text-lg font-bold mb-4">Alertas Criticas</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-1">CERO articulos de blog</h4>
            <p class="text-slate-400 text-xs leading-relaxed">En 3 anos, con 35 anos de experiencia, no se ha publicado ni un solo articulo. Google necesita contenido para posicionar un sitio. Es como tener un libro de 35 capitulos guardado en un cajon que nadie puede leer.</p>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <h4 class="text-red-400 font-bold text-sm mb-1">96% de dependencia en trafico pagado</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Si manana deja de pagar Meta Ads, su flujo de alumnos se reduce un 96%. El trafico organico (Google) es GRATIS y permanente. Cada articulo que publique trabajara para usted 24/7 sin costo adicional.</p>
        </div>
        <div class="kpi-card warning-card glass rounded-xl p-5">
            <h4 class="text-amber-400 font-bold text-sm mb-1">Titles genericos en todas las paginas</h4>
            <p class="text-slate-400 text-xs leading-relaxed">"Home - Constante" no le dice nada a Google ni al usuario. Deberia ser "Escuela de Ventas en Quito | Curso de Ventas Online | Rolando Constante". Lo mismo con "Contacto - Constante" y otras paginas.</p>
        </div>
        <div class="kpi-card warning-card glass rounded-xl p-5">
            <h4 class="text-amber-400 font-bold text-sm mb-1">11 URLs de sistema indexadas</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Paginas como /carrito/, /mi-cuenta/, /finalizar-compra/, /registrar/ estan en el sitemap y Google las indexa. Esto confunde a Google sobre el proposito de su sitio y diluye la autoridad de las paginas importantes.</p>
        </div>
    </div>

</div>

<!-- ==================== TAB 2: ORGANICO VS PAGADO ==================== -->
<div id="tab-organico" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">De Donde Vienen Sus Visitantes</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">El "trafico organico" son las personas que lo encuentran en Google sin que usted pague. El "trafico pagado" son las personas que llegan por sus anuncios en Meta (Facebook/Instagram) y Google Ads. <strong class="text-white">Lo ideal es tener ambos canales fuertes</strong>, pero hoy usted depende casi totalmente de la publicidad pagada.</p>
        </div>
    </div>

    <!-- Traffic source chart -->
    <div class="glass rounded-2xl p-6 mb-6">
        <h3 class="text-white font-bold mb-4">Distribucion de Trafico (3 anos)</h3>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-64 h-64">
                <canvas id="trafficChart"></canvas>
            </div>
            <div class="flex-1">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-purple-500"></div><span class="text-slate-300 text-sm">Meta Ads (pagado)</span></div>
                        <span class="text-white font-bold text-sm">5,177 <span class="text-slate-400 font-normal">(31.6%)</span></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-slate-400"></div><span class="text-slate-300 text-sm">Directo (ya lo conocen)</span></div>
                        <span class="text-white font-bold text-sm">4,419 <span class="text-slate-400 font-normal">(26.9%)</span></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-blue-500"></div><span class="text-slate-300 text-sm">Facebook referral</span></div>
                        <span class="text-white font-bold text-sm">2,334 <span class="text-slate-400 font-normal">(14.2%)</span></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-amber-500"></div><span class="text-slate-300 text-sm">Campanas Hotmart</span></div>
                        <span class="text-white font-bold text-sm">883 <span class="text-slate-400 font-normal">(5.4%)</span></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-green-500"></div><span class="text-slate-300 text-sm">Google organico (GRATIS)</span></div>
                        <span class="text-white font-bold text-sm">745 <span class="text-slate-400 font-normal">(4.5%)</span></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-red-500"></div><span class="text-slate-300 text-sm">Google Ads (pagado)</span></div>
                        <span class="text-white font-bold text-sm">644 <span class="text-slate-400 font-normal">(3.9%)</span></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-cyan-500"></div><span class="text-slate-300 text-sm">Otros (beacons, Instagram, etc.)</span></div>
                        <span class="text-white font-bold text-sm">2,202 <span class="text-slate-400 font-normal">(13.4%)</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paid vs organic comparison -->
    <h3 class="text-white font-bold mb-3">Pagado vs Organico: La Comparativa Critica</h3>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700/50">
                    <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Metrica</th>
                    <th class="text-center px-4 py-4 text-purple-400 font-semibold text-xs uppercase tracking-wider">Pagado (Meta + Google Ads)</th>
                    <th class="text-center px-4 py-4 text-green-400 font-semibold text-xs uppercase tracking-wider">Organico (Google)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Usuarios (3 anos)</td>
                    <td class="px-4 py-4 text-center text-purple-300 font-bold">6,704</td>
                    <td class="px-4 py-4 text-center text-green-300 font-bold">745</td>
                </tr>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Porcentaje del total</td>
                    <td class="px-4 py-4 text-center text-purple-300">40.9%</td>
                    <td class="px-4 py-4 text-center text-green-300">4.5%</td>
                </tr>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Costo estimado/mes*</td>
                    <td class="px-4 py-4 text-center text-red-400 font-bold">$300 — $800</td>
                    <td class="px-4 py-4 text-center text-green-400 font-bold">$0</td>
                </tr>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Que pasa si lo apaga?</td>
                    <td class="px-4 py-4 text-center text-red-400 text-xs">Trafico cae a CERO inmediatamente</td>
                    <td class="px-4 py-4 text-center text-green-400 text-xs">Trafico CRECE con el tiempo</td>
                </tr>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Calidad del visitante</td>
                    <td class="px-4 py-4 text-center text-slate-300 text-xs">Interrupcion (vio anuncio sin buscarlo)</td>
                    <td class="px-4 py-4 text-center text-green-400 text-xs">Intencion (busco activamente su servicio)</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-white font-medium">Tasa de conversion tipica</td>
                    <td class="px-4 py-4 text-center text-slate-300 text-xs">1-3% (promedio Meta Ads)</td>
                    <td class="px-4 py-4 text-center text-green-400 text-xs">5-8% (busqueda con intencion)</td>
                </tr>
            </tbody>
        </table>
        <div class="px-6 py-3 border-t border-slate-700/30">
            <p class="text-slate-500 text-[10px]">*Estimacion basada en CPC promedio Ecuador para sector educacion/capacitacion ($0.30-$1.50, fuente: WordStream Latin America Benchmarks 2024) y volumen de trafico pagado detectado.</p>
        </div>
    </div>

    <!-- Key insight -->
    <div class="alert-card glass rounded-2xl p-6 mb-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-red-400 font-bold text-lg mb-1">Costo de oportunidad</h3>
                <p class="text-white text-2xl font-extrabold">$3,600 — $9,600/ano en publicidad</p>
                <p class="text-slate-400 text-sm mt-1">Si posiciona 10 keywords de servicio en pagina 1 de Google, podria generar el mismo trafico que Meta Ads — pero GRATIS y de forma permanente. Cada articulo publicado es una inversion que se acumula, no un gasto que desaparece cuando deja de pagar.</p>
            </div>
        </div>
    </div>

    <!-- Top search queries -->
    <h3 class="text-white font-bold mb-3">Como Lo Buscan en Google (Dic 2024 — Abr 2026)</h3>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Busqueda</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Impresiones</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Clics</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Posicion</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Oportunidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"rolando constante"</td>
                        <td class="px-4 py-3 text-center text-slate-300">214</td>
                        <td class="px-4 py-3 text-center text-green-400 font-bold">107</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 font-bold">1.6</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Marca personal fuerte. Posicion 1.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"escuela de ventas"</td>
                        <td class="px-4 py-3 text-center text-slate-300">199</td>
                        <td class="px-4 py-3 text-center text-green-400 font-bold">7</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">47.7</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">OPORTUNIDAD ENORME. 199 imp, posicion 47. Con pagina optimizada puede subir a top 5.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"constante"</td>
                        <td class="px-4 py-3 text-center text-slate-300">160</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">13.3</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Termino ambiguo. Google no sabe si es el apellido o la palabra comun.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"academia de ventas"</td>
                        <td class="px-4 py-3 text-center text-slate-300">94</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">60</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Posicion 60 = pagina 6. No existe contenido para esta keyword.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"donde estudiar ventas en quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">38</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">33</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Busqueda LOCAL perfecta. Con 1 articulo optimizado puede ser #1.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"como hacer un cierre de ventas efectivo"</td>
                        <td class="px-4 py-3 text-center text-slate-300">27</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">84</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Posicion 84 = pagina 8. Pero Google ya lo asocia. Un articulo lo subiria a pagina 1.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"curso de ventas quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">25</td>
                        <td class="px-4 py-3 text-center text-green-400 font-bold">2</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-bold">21</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Pagina 2. Con SEO on-page sube a pagina 1 = 10x mas clics.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">"ventas carrera"</td>
                        <td class="px-4 py-3 text-center text-slate-300">31</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">93</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Gente buscando estudiar ventas como carrera. Pagina dedicada podria capturar este trafico.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Top pages -->
    <h3 class="text-white font-bold mb-3">Paginas Mas Visitadas (3 anos)</h3>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Pagina</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Vistas</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Rebote</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Analisis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Escuela de Gerencia Comercial</td>
                        <td class="px-4 py-3 text-center text-slate-300">5,688</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400">87%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Landing de ads con alto trafico pero 87% de rebote. 87 de cada 100 se van sin actuar.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Curso Ventas</td>
                        <td class="px-4 py-3 text-center text-slate-300">4,886</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400">83%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Misma situacion. Mucho trafico pagado pero rebote altisimo.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Cierre a la N</td>
                        <td class="px-4 py-3 text-center text-slate-300">4,804</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400">79%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Mejor que las otras pero aun muy alto. Necesita optimizar la experiencia.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Home</td>
                        <td class="px-4 py-3 text-center text-slate-300">1,943</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">57%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Mejor rebote. Trafico mas cualificado (organico + directo).</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Cursos 2025</td>
                        <td class="px-4 py-3 text-center text-slate-300">319</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">24%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">EXCELENTE rebote. La gente que llega aqui esta muy interesada.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium text-xs">Gracias (post-compra)</td>
                        <td class="px-4 py-3 text-center text-slate-300">217</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">17%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">217 personas llegaron a esta pagina = 217 conversiones en 3 anos.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <h4 class="text-green-400 font-bold text-sm mb-1">La oportunidad es clara</h4>
        <p class="text-slate-300 text-sm leading-relaxed">Usted ya tiene un negocio que funciona con publicidad pagada. El SEO no reemplaza los ads — <strong class="text-white">los complementa</strong>. Imagine que ademas de sus anuncios, cada vez que alguien busque "como cerrar una venta" o "curso de ventas Quito", encuentre a Rolando Constante. Eso es trafico GRATIS que se acumula mes a mes y reduce su dependencia de la publicidad.</p>
    </div>

</div>

<!-- ==================== TAB 3: COMPETENCIA ==================== -->
<div id="tab-competencia" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Sus Competidores en Internet</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <p class="text-slate-400 text-sm leading-relaxed">Analizamos quienes aparecen cuando sus clientes potenciales buscan "curso de ventas", "escuela de ventas", o "capacitacion comercial" en Google. <strong class="text-white">Hallazgo clave: la competencia local en Ecuador es MUY debil en SEO.</strong> Ninguno tiene una estrategia de contenido completa.</p>
    </div>

    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que tienen</th>
                        <th class="text-center px-4 py-4 text-yellow-400 font-semibold text-xs uppercase tracking-wider">Rolando</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Perfil Comercial</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">EVN</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Esc. Vendedores</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">V. Alto Octanaje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Blog SEO activo</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No (0 posts)</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Si (activo)</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">1 post (2013)</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">MUY activo</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Cursos online</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">$47-$58</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">150-320 EUR</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Clientes corporativos</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">Toyota, Ford, Nissan</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Favorita, Pronaca</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Si</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Parcial</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No Ecuador</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Certificacion oficial</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">SENESCYT</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Parcial</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Metodo propio</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">PAICODOCI</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Parcial</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">GA4 + GTM + HubSpot</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Todo</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">GA4</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">Wix basico</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">GA4</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">YouTube activo</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Canal existe</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Activo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Strengths -->
    <h3 class="text-white font-bold mb-3">Ventajas Competitivas de Rolando (No Explotadas)</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Unico con certificacion SENESCYT</h4>
            <p class="text-slate-400 text-xs leading-relaxed">NINGUN competidor local tiene certificacion visualizada en SENESCYT. Esto es un diferenciador gigante para el mercado corporativo y para Google (E-E-A-T). Deberia estar en el title de la homepage y en cada pagina de curso.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Metodo PAICODOCI = contenido unico</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Un metodo propio con nombre registrado. Esto genera busquedas de marca y contenido que NADIE mas puede tener. Articulos como "Que es el metodo PAICODOCI" o "Las 7 fases de la venta Constante" son exclusivos.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">Resultados auditables: +240% Nissan, +221% Great Wall</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Casos de exito con numeros reales de empresas reconocidas. Esto no lo tiene ningun competidor. Cada caso de exito puede ser un articulo SEO + una pieza de contenido para redes.</p>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <h4 class="text-green-400 font-bold text-sm mb-1">35 anos = 35 anos de historias para contar</h4>
            <p class="text-slate-400 text-xs leading-relaxed">Cada conferencia, cada seminario, cada cliente transformado es un articulo potencial. 7,000+ conferencias = contenido inagotable para un blog que domine las busquedas de ventas en Ecuador.</p>
        </div>
    </div>

</div>

<!-- ==================== TAB 4: PLAN DE CONTENIDO ==================== -->
<div id="tab-contenido" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Plan de Contenido — 20 Articulos para el Mes 1</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <p class="text-slate-400 text-sm leading-relaxed">Cuando alguien busca "como cerrar una venta" en Google, si Rolando Constante tiene un articulo sobre ese tema, Google lo muestra. La persona lee, descubre el metodo PAICODOCI, y se inscribe en un curso. <strong class="text-white">Cada articulo es un vendedor digital que trabaja 24/7 sin sueldo y sin presupuesto de ads.</strong></p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #22c55e;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400 mb-2">Transaccional</span>
            <p class="text-slate-400 text-xs leading-relaxed">La persona ya quiere <strong class="text-white">INSCRIBIRSE</strong>. Busca cursos, precios, donde estudiar. Genera matriculas directas.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #f59e0b;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-500/15 text-amber-400 mb-2">Comercial</span>
            <p class="text-slate-400 text-xs leading-relaxed">La persona esta <strong class="text-white">COMPARANDO</strong>. Busca que curso es mejor, opiniones, certificaciones. Posiciona a Rolando como la mejor opcion.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #3b82f6;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-blue-500/15 text-blue-400 mb-2">Informativo</span>
            <p class="text-slate-400 text-xs leading-relaxed">La persona quiere <strong class="text-white">APRENDER</strong>. Busca tecnicas, guias, consejos. Genera mucho trafico y establece autoridad.</p>
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
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Keyword objetivo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">1</td><td class="px-4 py-3 text-white text-xs font-medium">Como Cerrar una Venta: 7 Tecnicas Probadas que Funcionan en 2026</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">como cerrar una venta</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">2</td><td class="px-4 py-3 text-white text-xs font-medium">Curso de Ventas en Quito: Donde Estudiar y Que Certificacion Elegir</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td><td class="px-4 py-3 text-slate-400 text-xs">curso de ventas quito</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">3</td><td class="px-4 py-3 text-white text-xs font-medium">Escuela de Ventas en Ecuador: La Guia Definitiva para Profesionales</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td><td class="px-4 py-3 text-slate-400 text-xs">escuela de ventas ecuador</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">4</td><td class="px-4 py-3 text-white text-xs font-medium">Las 7 Fases del Proceso de Ventas: Metodo PAICODOCI Explicado</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">proceso de ventas fases</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">5</td><td class="px-4 py-3 text-white text-xs font-medium">Tecnicas de Cierre de Ventas: 10 Estrategias para No Perder Clientes</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">tecnicas de cierre de ventas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">6</td><td class="px-4 py-3 text-white text-xs font-medium">Capacitacion en Ventas para Empresas: Como Aumentar Resultados en 90 Dias</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td><td class="px-4 py-3 text-slate-400 text-xs">capacitacion ventas empresas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">7</td><td class="px-4 py-3 text-white text-xs font-medium">Como Vender Mas: 15 Estrategias que Todo Vendedor Debe Conocer</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">como vender mas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">8</td><td class="px-4 py-3 text-white text-xs font-medium">Caso de Exito: Como Nissan/Renault Aumento sus Ventas 240% con el Metodo Constante</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td><td class="px-4 py-3 text-slate-400 text-xs">capacitacion ventas automotriz</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">9</td><td class="px-4 py-3 text-white text-xs font-medium">Curso de Cierre de Ventas Online: Que Aprender y Donde Estudiar</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td><td class="px-4 py-3 text-slate-400 text-xs">curso cierre de ventas online</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">10</td><td class="px-4 py-3 text-white text-xs font-medium">Las 5 Habilidades de un Vendedor Exitoso en 2026</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">habilidades vendedor exitoso</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">11</td><td class="px-4 py-3 text-white text-xs font-medium">Gerencia Comercial: Que Es y Como Transformar tu Equipo de Ventas</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td><td class="px-4 py-3 text-slate-400 text-xs">gerencia comercial que es</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">12</td><td class="px-4 py-3 text-white text-xs font-medium">Objeciones en Ventas: Como Manejar las 10 Mas Comunes</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">objeciones en ventas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">13</td><td class="px-4 py-3 text-white text-xs font-medium">Coaching de Ventas: Que Es, Como Funciona y Para Quien Es</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td><td class="px-4 py-3 text-slate-400 text-xs">coaching de ventas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">14</td><td class="px-4 py-3 text-white text-xs font-medium">Inteligencia Comercial: 7 Indicadores que Todo Gerente Debe Medir</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">inteligencia comercial indicadores</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">15</td><td class="px-4 py-3 text-white text-xs font-medium">Ventas como Carrera Profesional: Guia para Empezar en Ecuador</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td><td class="px-4 py-3 text-slate-400 text-xs">ventas como carrera ecuador</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">16</td><td class="px-4 py-3 text-white text-xs font-medium">Que es el Metodo PAICODOCI y Por Que Funciona para Vender Mas</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td><td class="px-4 py-3 text-slate-400 text-xs">metodo paicodoci ventas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">17</td><td class="px-4 py-3 text-white text-xs font-medium">Tipos de Cierre de Ventas: Guia Completa con Ejemplos Reales</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">tipos de cierre de ventas</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">18</td><td class="px-4 py-3 text-white text-xs font-medium">Los 5 Mejores Cursos de Ventas en Ecuador [Comparativa 2026]</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td><td class="px-4 py-3 text-slate-400 text-xs">mejores cursos ventas ecuador</td></tr>
                    <tr class="border-b border-slate-700/30"><td class="px-3 py-3 text-center text-slate-500 text-xs">19</td><td class="px-4 py-3 text-white text-xs font-medium">Psicologia del Comprador: Como Entender a tu Cliente para Vender Mejor</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">psicologia del comprador</td></tr>
                    <tr><td class="px-3 py-3 text-center text-slate-500 text-xs">20</td><td class="px-4 py-3 text-white text-xs font-medium">Como Motivar a un Equipo de Ventas: Estrategias para Gerentes Comerciales</td><td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td><td class="px-4 py-3 text-slate-400 text-xs">como motivar equipo ventas</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <h4 class="text-green-400 font-bold text-sm mb-3">Resultados Esperados (6 meses)</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-4 text-center">
                <p class="text-2xl font-extrabold text-green-400">10-15</p>
                <p class="text-slate-400 text-xs">Keywords en pagina 1</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <p class="text-2xl font-extrabold text-green-400">1,500-3,000</p>
                <p class="text-slate-400 text-xs">Visitas organicas/mes (hoy: ~50)</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <p class="text-2xl font-extrabold text-green-400">30-60x</p>
                <p class="text-slate-400 text-xs">Crecimiento de trafico organico</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 5: PROPUESTA E INVERSION ==================== -->
<div id="tab-inversion" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Propuesta: Plan SEO + Contenido</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <p class="text-slate-400 text-sm leading-relaxed">Su sitio ya tiene buenas bases tecnicas (GA4, GTM, HubSpot, Elementor Pro). Lo que le falta es <strong class="text-white">contenido optimizado para Google</strong>. Le proponemos un plan de SEO y contenido mensual para que Google trabaje como su vendedor mas eficiente — generando alumnos nuevos sin costo publicitario adicional.</p>
    </div>

    <!-- SEO Plan -->
    <h3 class="text-white font-bold mb-3">Plan SEO + Contenido Mensual</h3>
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="glass-lighter rounded-xl p-5 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-green-500/20 text-green-400 text-[10px] font-bold px-3 py-1 rounded-bl-lg">AHORRA $200</div>
                <h4 class="text-white font-bold mb-1">Plan Semestral</h4>
                <p class="text-3xl font-extrabold text-white mb-1">$880</p>
                <p class="text-slate-400 text-xs mb-4">Pago unico por 6 meses</p>
                <ul class="space-y-2 mb-4">
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>20 articulos SEO optimizados/mes (120 total)</li>
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>SEO on-page: titles, metas, H1 corregidos</li>
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Schema Course en cada curso + FAQ Schema</li>
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Limpieza sitemap (remover URLs basura)</li>
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Alt text en imagenes + optimizacion WebP</li>
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Reportes mensuales de progreso</li>
                </ul>
                <p class="text-green-400 text-xs font-bold">= $147/mes (ahorra $200 vs mensual)</p>
            </div>
            <div class="glass-lighter rounded-xl p-5">
                <h4 class="text-white font-bold mb-1">Plan Mensual</h4>
                <p class="text-3xl font-extrabold text-white mb-1">$180<span class="text-lg text-slate-400">/mes</span></p>
                <p class="text-slate-400 text-xs mb-4">x 6 meses ($1,080 total)</p>
                <ul class="space-y-2 mb-4">
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Todo lo incluido en el plan semestral</li>
                    <li class="text-slate-400 text-xs flex items-start gap-2"><svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Flexibilidad de pago mensual</li>
                </ul>
                <p class="text-slate-400 text-xs">Compromiso minimo: 6 meses</p>
            </div>
        </div>
    </div>

    <!-- ROI -->
    <h3 class="text-white font-bold mb-3">Retorno de Inversion Estimado</h3>
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="glass-accent rounded-xl p-5 mb-4">
            <p class="text-slate-400 text-xs leading-relaxed"><strong class="text-white">Formula:</strong> Keywords posicionadas x Busquedas mensuales x CTR pagina 1 (27%, fuente: Backlinko 2023) x Tasa de conversion educacion online (3-5%, fuente: WordStream 2024) x Ticket promedio por curso</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-3 text-slate-400 font-semibold text-xs uppercase tracking-wider">Metrica</th>
                        <th class="text-center px-4 py-3 text-slate-400 font-semibold text-xs uppercase tracking-wider">Mes 3</th>
                        <th class="text-center px-4 py-3 text-slate-400 font-semibold text-xs uppercase tracking-wider">Mes 6</th>
                        <th class="text-center px-4 py-3 text-slate-400 font-semibold text-xs uppercase tracking-wider">Mes 12</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white text-xs">Keywords en pagina 1</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">5-8</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">10-15</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">20-35</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white text-xs">Visitas organicas/mes</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">300-600</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">1,500-3,000</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">5,000-10,000</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white text-xs">Alumnos nuevos estimados/mes</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">10-20</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">45-90</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">150-300</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white text-xs">Ingresos estimados/mes</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">$500-$1,200</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">$2,500-$5,000</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">$8,000-$18,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3 px-5"><p class="text-slate-500 text-[10px]">*Ticket promedio: $50-$60 (cursos online) + leads corporativos de alto valor ($2,000-$10,000 por contrato). Los ingresos corporativos no se estiman aqui pero representan el mayor ROI del SEO.</p></div>
    </div>

    <!-- CTA -->
    <div class="bg-gradient-to-r from-blue-600/20 via-cyan-600/15 to-blue-600/20 rounded-2xl p-8 border border-blue-500/20 text-center mb-8">
        <h3 class="text-white text-xl font-bold mb-3">Listo para que Google trabaje para usted?</h3>
        <p class="text-slate-400 text-sm mb-4 max-w-xl mx-auto">Contactenos para definir los proximos pasos. Con 35 anos de experiencia, solo necesita que Internet lo sepa.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/593999174980?text=Hola%2C%20vi%20el%20informe%20de%20marketing%20digital%20de%20Rolando%20Constante%20y%20me%20interesa%20la%20propuesta%20de%20SEO" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-green-600 hover:bg-green-500 text-white font-semibold text-sm transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Escribir por WhatsApp
            </a>
            <a href="mailto:info@creativeweb.com.ec" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-700/50 hover:bg-slate-600/50 text-white font-semibold text-sm transition-all border border-slate-600/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                info@creativeweb.com.ec
            </a>
        </div>
    </div>

</div>

</main>

<footer class="relative z-10 border-t border-slate-700/50 py-6 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
        <p class="text-slate-500 text-xs">Desarrollado por <span class="text-slate-400 font-medium">Creative Web</span> — creativeweb.com.ec</p>
    </div>
</footer>

<script>
function switchTab(id) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + id).classList.add('active');
    event.target.classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Score chart
new Chart(document.getElementById('scoreChart').getContext('2d'), {
    type: 'doughnut',
    data: { datasets: [{ data: [50, 50], backgroundColor: ['#eab308', 'rgba(51, 65, 85, 0.4)'], borderWidth: 0, cutout: '78%' }] },
    options: { responsive: false, plugins: { legend: { display: false }, tooltip: { enabled: false } }, animation: { animateRotate: true, duration: 1500 } }
});

// Traffic chart
new Chart(document.getElementById('trafficChart').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: ['Meta Ads', 'Directo', 'Facebook ref', 'Hotmart', 'Google organico', 'Google Ads', 'Otros'],
        datasets: [{
            data: [5177, 4419, 2334, 883, 745, 644, 2202],
            backgroundColor: ['#a855f7', '#94a3b8', '#3b82f6', '#f59e0b', '#22c55e', '#ef4444', '#06b6d4'],
            borderWidth: 0
        }]
    },
    options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { display: false }, tooltip: { callbacks: { label: function(ctx) { return ctx.label + ': ' + ctx.raw.toLocaleString() + ' usuarios'; } } } } }
});
</script>
</body>
</html>
