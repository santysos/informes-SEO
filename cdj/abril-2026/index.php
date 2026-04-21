<?php
session_start();
if (!isset($_SESSION['auth_cdj']) || $_SESSION['auth_cdj'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Auditoria de Marketing Digital — CDJ La Casa del Jean — Abril 2026</title>
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
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: rgba(15,23,42,0.5); }
    ::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(148,163,184,0.5); }
    .alert-card { border-left: 4px solid #ef4444; }
    .success-card { border-left: 4px solid #22c55e; }
    .warning-card { border-left: 4px solid #f59e0b; }
    .score-ring { width: 160px; height: 160px; }
    .chart-container { position: relative; height: 300px; }
    .chart-container-sm { position: relative; height: 240px; }
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
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Auditoria de Marketing Digital 360&deg;</h1>
                        <p class="text-sm text-slate-400">Abril 2026 &mdash; Diagnostico Web + Redes Sociales</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Cliente</p>
                    <p class="text-sm text-white font-medium">CDJ &mdash; La Casa del Jean</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Preparado por</p>
                    <p class="text-sm text-white font-medium">Creative Web</p>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Periodo analizado</p>
                    <p class="text-sm text-white font-medium">Ene 2025 &mdash; Abr 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>
        <div class="mt-4 glass-accent rounded-xl px-5 py-3 flex flex-wrap items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-blue-300 font-semibold text-sm">CDJ La Casa del Jean</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">lacasadeljean.com</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">Sucursales: Ibarra &middot; Otavalo &middot; Atuntaqui &middot; Cayambe</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen Ejecutivo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('conceptos')">Que es Marketing Digital</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('web')">Situacion Web</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('tiktok')">TikTok</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('ig-fb')">Instagram y Facebook</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('competidores')">Competidores</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('foda')">FODA + Plan 30/60/90</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('propuesta')">Propuesta Comercial</button>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-8">

<!-- ==================== TAB 1: RESUMEN EJECUTIVO ==================== -->
<div id="tab-resumen" class="tab-content active">

    <!-- Intro -->
    <div class="glass-accent rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-1">Que encontrara en este informe</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Este documento es una radiografia completa de la presencia digital de <strong class="text-white">CDJ La Casa del Jean</strong>: su sitio web, sus redes sociales y la forma en que esas dos cosas trabajan (o no) juntas para generar ventas. Usaremos los datos reales de su Google Analytics y de su TikTok (7,703 seguidores, 1.1 millones de vistas en el ultimo ano) para explicarle, en terminos sencillos, <strong class="text-white">que esta funcionando bien, que esta perdiendo dinero, y que movimientos concretos puede hacer en los proximos 90 dias para aumentar sus ventas online y hacer crecer su marca.</strong></p>
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
                    <span class="text-3xl font-extrabold text-amber-400">40</span>
                    <span class="text-xs text-slate-400">de 100</span>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30">Grado D &mdash; Con oportunidad grande</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">CDJ tiene una base solida: una marca reconocida con 30 anos de historia, 4 sucursales fisicas, una audiencia fiel de 7,703 personas en TikTok (72% mujeres, su cliente ideal) y un sitio web que recibe trafico organico de Google. <strong class="text-white">Sin embargo, hay una fuga enorme entre lo que genera en redes y lo que se convierte en ventas online.</strong> En los ultimos 16 meses, su pagina solo registro 35 personas agregando al carrito, mientras TikTok genero mas de 1 millon de vistas. Con los ajustes correctos, el potencial de crecimiento en ventas online es de 3x a 5x en 6 meses.</p>
            </div>
        </div>
    </div>

    <!-- Score breakdown -->
    <h2 class="text-white text-lg font-bold mb-4">Desglose: Como esta en cada area</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Area evaluada</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Puntuacion</th>
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que significa para su negocio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Sitio web (SEO basico)</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">35/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Su tienda online funciona, pero le faltan elementos basicos que Google necesita ver para darle visibilidad: el titulo de la pagina principal mide 194 caracteres (Google solo muestra 60), no tiene descripcion para los resultados de busqueda, y no tiene H1 (el titulo grande que marca de que trata la pagina). En las fichas de producto falta schema Product, que es lo que hace que aparezcan precios y estrellas directamente en Google.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Redes sociales (TikTok)</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">55/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Su TikTok @cdj.ec es su principal activo digital: 7,703 seguidores, audiencia 72% mujeres, pico horario de 19h a 22h. El contenido de historia de marca y tendencias funciona bien. <strong class="text-red-400">El problema: los ultimos 3 meses se estanco</strong> (solo 52 nuevos seguidores entre febrero y abril 2026, frente a +1,687 el resto del ano).</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Conversion de la web (el funnel)</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">15/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Esta es la alerta mas grande. En los ultimos 16 meses, 8,209 personas nuevas entraron a su web. De esas, solo 35 agregaron un producto al carrito. <strong class="text-red-400">Es una tasa de conversion del 0.43%</strong> cuando el promedio para tiendas de moda es 2% a 3%. Significa que el problema no es el trafico, sino lo que pasa cuando la gente llega a su sitio.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Marca y narrativa</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400">60/100</span></td>
                        <td class="px-6 py-4 text-slate-400">La transicion de "La Casa del Jean" a "CDJ" esta bien trabajada. El video "Por que ya no somos La Casa del Jean" genero 37,846 vistas. La historia del CEO Patricio Velasco (14,156 vistas) y la narrativa de 30 anos en la moda ecuatoriana funcionan. Falta unificar tono entre redes y consolidar el rebranding en el sitio web.</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-white font-medium">Medicion (tracking)</td>
                        <td class="px-4 py-4 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">40/100</span></td>
                        <td class="px-6 py-4 text-slate-400">Tiene Google Tag Manager y TikTok Pixel instalados &mdash; buen comienzo. Pero los eventos de ecommerce (ver_producto, agregar_al_carrito, iniciar_checkout, comprar) no estan configurados correctamente. Por eso Analytics muestra 0 compras en 16 meses. <strong class="text-white">Sin datos, no se pueden tomar decisiones.</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- KPIs destacados -->
    <h2 class="text-white text-lg font-bold mb-4">Numeros clave del ultimo ano</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-2">Seguidores TikTok</p>
            <p class="text-3xl font-extrabold text-white">7,703</p>
            <p class="text-xs text-green-400 mt-1">+1,687 vs abril 2025</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-2">Vistas TikTok (12 meses)</p>
            <p class="text-3xl font-extrabold text-white">~1.1M</p>
            <p class="text-xs text-slate-400 mt-1">Mejor mes: Julio 2025</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-2">Visitas web (16 meses)</p>
            <p class="text-3xl font-extrabold text-white">8,209</p>
            <p class="text-xs text-slate-400 mt-1">Personas distintas</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-2">Agregaron al carrito</p>
            <p class="text-3xl font-extrabold text-red-400">35</p>
            <p class="text-xs text-red-400 mt-1">0.43% de conversion</p>
        </div>
    </div>

    <!-- Hallazgos -->
    <h2 class="text-white text-lg font-bold mb-4">Los 3 hallazgos mas importantes</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">1. Fuga entre TikTok y su web</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">De 1.1 millones de vistas en TikTok, solo 652 personas llegaron a lacasadeljean.com (un 0.06%). Y el Linktree solo envia 636 sesiones. <strong class="text-white">Esta dejando pasar a decenas de miles de personas interesadas.</strong></p>
                </div>
            </div>
        </div>
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">2. TikTok estancado desde febrero</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Entre feb y abril 2026 solo sumo 52 seguidores. El ano anterior sumo 1,635 en el mismo periodo. <strong class="text-white">Paro la bola de nieve.</strong> Indica que bajo frecuencia de posteo o se agoto una formula de contenido.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card glass rounded-xl p-5 warning-card">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div>
                    <h4 class="text-amber-400 font-bold text-sm mb-1">3. No se pueden medir ventas</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">El sitio no reporta ventas a Google Analytics. Esto impide saber que productos venden mejor online, que canal funciona, o cuanto valor genera cada campana. <strong class="text-white">Sin datos, el crecimiento es a ciegas.</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Oportunidades -->
    <h2 class="text-white text-lg font-bold mb-4">Las 3 oportunidades que mas pueden mover la aguja</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5 success-card">
            <h4 class="text-green-400 font-bold text-sm mb-2">Activar boton WhatsApp en cada producto</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">Hoy, el cliente que ve una prenda debe crear cuenta, agregar al carrito y pasar checkout. Un boton "Comprar por WhatsApp" con el nombre del producto precargado convierte 3-5x mas en Ecuador (el 67% de los ecuatorianos compran por WhatsApp segun Statista 2025).</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 success-card">
            <h4 class="text-green-400 font-bold text-sm mb-2">Reactivar TikTok con calendario editorial</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">El contenido que ya funciono (historia CEO, tendencias denim, rebranding) se puede reciclar en nuevos formatos. 5 posts por semana + 2 lives mensuales + storytime mensual pueden reactivar el crecimiento y llevar a 10,000+ seguidores en 90 dias.</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 success-card">
            <h4 class="text-green-400 font-bold text-sm mb-2">Arreglar medicion de ventas online</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">Instalar eventos de ecommerce en Google Tag Manager + Facebook Pixel + TikTok Pixel toma 1 semana. Despues de eso, cada decision de marketing estara basada en datos reales (que producto se vende, que canal convierte, que anuncio retorna).</p>
        </div>
    </div>

</div>

<!-- ==================== TAB 2: QUE ES MARKETING DIGITAL ==================== -->
<div id="tab-conceptos" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">Antes de entrar en los numeros... que es "Marketing Digital"?</h3>
        <p class="text-slate-400 text-sm leading-relaxed">Si alguien ya le explico esto, puede saltar a la siguiente pestana. Si no, esta seccion le permitira entender el resto del informe sin perderse.</p>
    </div>

    <!-- Concepto -->
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-3 text-lg">Marketing Digital es todo lo que hace su negocio para vender en internet</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">Para un negocio de moda como CDJ, esto se divide en <strong class="text-white">3 grandes pilares</strong> que deben funcionar juntos:</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div class="glass-lighter rounded-lg p-4">
                        <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        </div>
                        <p class="text-blue-400 font-bold text-sm mb-1">1. Su sitio web</p>
                        <p class="text-slate-400 text-xs leading-relaxed">Es su tienda online, su catalogo, y el lugar donde se concretan las compras. Tiene que ser rapido, facil de usar, y tiene que aparecer en Google cuando alguien busca "jeans mujer Ecuador".</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-4">
                        <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <p class="text-purple-400 font-bold text-sm mb-1">2. Sus redes sociales</p>
                        <p class="text-slate-400 text-xs leading-relaxed">TikTok, Instagram, Facebook. Son sus "vitrinas ambulantes": es donde la gente descubre su marca, le toma confianza, y decide si vale la pena ir a su sitio web. En el caso de CDJ, TikTok es el fuerte.</p>
                    </div>
                    <div class="glass-lighter rounded-lg p-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center mb-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <p class="text-emerald-400 font-bold text-sm mb-1">3. La medicion</p>
                        <p class="text-slate-400 text-xs leading-relaxed">Las herramientas (Google Analytics, TikTok Analytics, Facebook Pixel) que le dicen si lo que hace en los pilares 1 y 2 esta trayendo ventas. Sin medicion, es imposible mejorar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analogia -->
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3">
            <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-3 text-lg">Analogia simple para entender su situacion hoy</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-3">Imagine que CDJ es un local en el centro de Otavalo. Su TikTok es como tener una banda en la entrada que atrae a 1 millon de personas a mirar el escaparate.</p>
                <p class="text-slate-400 text-sm leading-relaxed mb-3">Pero la <strong class="text-red-400">puerta del local solo se abre para 650</strong> de esas personas (las que hacen click al Linktree o al enlace de la bio), y de esas, <strong class="text-red-400">solo 35 intentaron probarse algo en 16 meses</strong>.</p>
                <p class="text-slate-400 text-sm leading-relaxed"><strong class="text-white">El problema no es el escaparate. Es la puerta, el probador, y la caja registradora.</strong> Esta auditoria se enfoca en eso: en convertir a los curiosos en clientes que compran.</p>
            </div>
        </div>
    </div>

    <!-- Por que moda es distinto -->
    <div class="glass rounded-2xl p-6">
        <div class="flex items-start gap-3">
            <div class="w-10 h-10 rounded-lg bg-pink-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-3 text-lg">Por que el marketing digital en moda es distinto</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-3">La moda se compra con los ojos, pero la decision se cierra con la confianza. Por eso los tres elementos mas importantes en una tienda online de moda son:</p>
                <ul class="text-slate-400 text-sm leading-relaxed space-y-2 ml-4">
                    <li><strong class="text-white">Foto buena y tallaje visible:</strong> una camisa mal fotografiada no se vende por mas barata que sea.</li>
                    <li><strong class="text-white">Respuesta inmediata:</strong> el 67% de compras en Ecuador se cierran por WhatsApp (Statista 2025). Si el cliente no tiene un boton directo para preguntar, no compra.</li>
                    <li><strong class="text-white">Comentarios y fotos de clientes reales:</strong> en moda, ver a otra persona usando la prenda aumenta la conversion hasta 4x (Bazaarvoice 2024).</li>
                </ul>
                <p class="text-slate-400 text-sm leading-relaxed mt-4 p-3 bg-slate-800/40 rounded-lg border-l-4 border-pink-400"><strong class="text-white">Hoy en lacasadeljean.com no hay ninguno de esos tres elementos optimizado.</strong> Hay fotos, pero no tiene reseñas, no tiene boton de WhatsApp por producto, y el tallaje aparece como lista seca sin guia visual.</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 3: SITUACION WEB ==================== -->
<div id="tab-web" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">Analisis tecnico y de conversion de lacasadeljean.com</h3>
        <p class="text-slate-400 text-sm leading-relaxed">Datos reales extraidos de Google Analytics 4 (periodo: 1 enero 2025 &mdash; 20 abril 2026, 475 dias). Ademas, auditamos tecnicamente la pagina principal y una ficha de producto para ver el codigo detras.</p>
    </div>

    <!-- Funnel de conversion -->
    <h2 class="text-white text-lg font-bold mb-4">El embudo real de su tienda online</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <p class="text-slate-400 text-sm leading-relaxed mb-6">Un "embudo" es el camino que recorre un cliente desde que entra a su pagina hasta que compra. Aqui cada escalon muestra cuantas personas avanzaron al siguiente paso:</p>
        <div class="space-y-3">
            <div class="flex items-center gap-4">
                <div class="w-32 text-right"><p class="text-slate-400 text-xs">Vieron alguna pagina</p></div>
                <div class="flex-1 h-12 bg-gradient-to-r from-blue-500/60 to-blue-500/40 rounded-lg flex items-center px-4" style="width: 100%"><span class="text-white font-bold">37,041</span></div>
                <div class="w-20 text-left"><p class="text-blue-400 font-bold text-sm">100%</p></div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-32 text-right"><p class="text-slate-400 text-xs">Iniciaron sesion nueva</p></div>
                <div class="h-12 bg-gradient-to-r from-cyan-500/60 to-cyan-500/40 rounded-lg flex items-center px-4" style="width: 27%"><span class="text-white font-bold">10,071</span></div>
                <div class="w-20 text-left"><p class="text-cyan-400 font-bold text-sm">27%</p></div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-32 text-right"><p class="text-slate-400 text-xs">Personas unicas nuevas</p></div>
                <div class="h-12 bg-gradient-to-r from-teal-500/60 to-teal-500/40 rounded-lg flex items-center px-4" style="width: 22%"><span class="text-white font-bold">8,209</span></div>
                <div class="w-20 text-left"><p class="text-teal-400 font-bold text-sm">22%</p></div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-32 text-right"><p class="text-slate-400 text-xs">Agregaron al carrito</p></div>
                <div class="h-12 bg-gradient-to-r from-amber-500/60 to-amber-500/40 rounded-lg flex items-center px-4" style="width: 0.3%; min-width: 80px"><span class="text-white font-bold">35</span></div>
                <div class="w-20 text-left"><p class="text-amber-400 font-bold text-sm">0.09%</p></div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-32 text-right"><p class="text-slate-400 text-xs">Compraron online</p></div>
                <div class="h-12 bg-red-500/40 border border-red-500/30 rounded-lg flex items-center px-4" style="min-width: 80px"><span class="text-red-400 font-bold">Sin registrar</span></div>
                <div class="w-20 text-left"><p class="text-red-400 font-bold text-sm">? </p></div>
            </div>
        </div>
        <div class="mt-6 p-4 bg-red-500/10 border-l-4 border-red-500 rounded-lg">
            <p class="text-red-300 text-sm font-semibold mb-1">Diagnostico:</p>
            <p class="text-slate-300 text-sm">En una tienda online promedio de moda en LATAM, <strong class="text-white">2-3% de los visitantes unicos terminan agregando al carrito</strong> (fuente: Shopify Commerce Report 2024). Su tienda esta en 0.43%. De cada 1,000 personas que entran, 2 meten algo al carrito. <strong class="text-white">Si llevamos este numero al promedio de la industria, CDJ pasaria de 35 a 164-246 carritos en el mismo periodo.</strong></p>
        </div>
    </div>

    <!-- Donde vienen las visitas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="glass rounded-2xl p-6">
            <h2 class="text-white text-lg font-bold mb-4">Por donde llegan los visitantes</h2>
            <div class="chart-container">
                <canvas id="canalesChart"></canvas>
            </div>
            <p class="text-slate-400 text-xs mt-4">Fuente: Google Analytics 4 &mdash; Grupo de canal predeterminado, usuarios nuevos 2025-2026</p>
        </div>
        <div class="glass rounded-2xl p-6">
            <h2 class="text-white text-lg font-bold mb-4">Top de paginas mas visitadas</h2>
            <div class="space-y-3">
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Inicio</span><span class="text-white font-bold text-sm">5,386</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Categoria Jeans</span><span class="text-white font-bold text-sm">2,091</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Categoria Chaquetas</span><span class="text-white font-bold text-sm">917</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Categoria Pantalones</span><span class="text-white font-bold text-sm">843</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Seccion Damas</span><span class="text-white font-bold text-sm">702</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Categoria Camisas</span><span class="text-white font-bold text-sm">696</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Seccion Caballeros</span><span class="text-white font-bold text-sm">579</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Contacto</span><span class="text-white font-bold text-sm">417</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Ficha Chaqueta Jean Capucha Fleece</span><span class="text-white font-bold text-sm">414</span></div>
                <div class="flex items-center justify-between"><span class="text-slate-300 text-sm">Tienda (todos)</span><span class="text-white font-bold text-sm">340</span></div>
            </div>
        </div>
    </div>

    <!-- Hallazgos tecnicos -->
    <h2 class="text-white text-lg font-bold mb-4">Hallazgos tecnicos al revisar su sitio</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <h4 class="text-red-400 font-bold text-sm mb-2">1. El titulo de la pagina principal mide 194 caracteres</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">El "title tag" es el titulo que aparece en azul en los resultados de Google. Google solo muestra los primeros 60 caracteres. Los 134 restantes se cortan.</p>
            <p class="text-slate-400 text-xs leading-relaxed">Titulo actual: "CDJ &ndash; La casa del jean &ndash; Jeans y moda urbana en Ecuador..."</p>
            <p class="text-slate-400 text-xs leading-relaxed mt-2"><strong class="text-green-400">Deberia ser:</strong> "CDJ Jeans Ecuador | Moda Urbana Mujer y Hombre" (48 caracteres, enfocado en palabras que la gente busca)</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <h4 class="text-red-400 font-bold text-sm mb-2">2. No tiene descripcion para Google</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">La "meta description" es el parrafo corto que aparece debajo del titulo en los resultados de busqueda. La pagina principal no la tiene, asi que Google inventa una con texto random del sitio.</p>
            <p class="text-slate-400 text-xs leading-relaxed"><strong class="text-white">Impacto:</strong> menos clicks desde Google (se estima 30-40% mas de clicks con una buena descripcion).</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <h4 class="text-red-400 font-bold text-sm mb-2">3. No hay H1 en el sitio</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">El H1 es el titulo mas grande de cada pagina &mdash; es lo primero que Google lee para entender de que trata. La pagina principal no tiene H1 definido.</p>
            <p class="text-slate-400 text-xs leading-relaxed"><strong class="text-white">Impacto:</strong> Google no sabe si esta pagina trata de "jeans", "moda", "CDJ" o "Ecuador". Queda a adivinar.</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <h4 class="text-red-400 font-bold text-sm mb-2">4. Falta schema Product en fichas</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">Es un codigo invisible para el usuario pero que Google lee para mostrar precios, estrellas y stock directamente en los resultados de busqueda. Las fichas de CDJ solo tienen BreadcrumbList (las miguitas de navegacion), no tienen Product.</p>
            <p class="text-slate-400 text-xs leading-relaxed"><strong class="text-white">Impacto:</strong> las fichas aparecen en Google sin precio visible, sin rating, sin disponibilidad. Los competidores que si lo tienen se ven 3x mas llamativos.</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <h4 class="text-red-400 font-bold text-sm mb-2">5. No hay tarjetas de redes sociales (Open Graph)</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">Cuando alguien comparte un enlace de CDJ en WhatsApp, Facebook o TikTok, deberia aparecer una tarjeta bonita con foto, titulo y descripcion. Hoy aparece solo el link pelado.</p>
            <p class="text-slate-400 text-xs leading-relaxed"><strong class="text-white">Impacto:</strong> enlaces menos atractivos en redes, menos clicks, menos virality.</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 alert-card">
            <h4 class="text-red-400 font-bold text-sm mb-2">6. En las fichas no hay boton WhatsApp</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">En Ecuador, el 67% de compras en tiendas online de moda se cierran por WhatsApp (Statista 2025). Una ficha sin ese boton pierde al cliente que tiene una duda sobre talla, color o disponibilidad en sucursal.</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 success-card">
            <h4 class="text-green-400 font-bold text-sm mb-2">Bueno: tiene Google Tag Manager y TikTok Pixel</h4>
            <p class="text-slate-400 text-xs leading-relaxed">La infraestructura de medicion esta instalada. Solo falta configurar los eventos de ecommerce (ver producto, agregar al carrito, iniciar checkout, comprar). Es un trabajo de 5-7 dias.</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 success-card">
            <h4 class="text-green-400 font-bold text-sm mb-2">Bueno: robots.txt y sitemap bien configurados</h4>
            <p class="text-slate-400 text-xs leading-relaxed">El archivo robots.txt bloquea correctamente las paginas internas (carritos, admin) y apunta al sitemap XML. Google puede rastrear el sitio sin problemas.</p>
        </div>
    </div>

    <!-- Llegadas desde social -->
    <h2 class="text-white text-lg font-bold mb-4">Desde donde llegan las visitas sociales</h2>
    <div class="glass rounded-2xl p-6 mb-8">
        <p class="text-slate-400 text-sm mb-4">De las 1,671 sesiones que llegaron de redes sociales en 16 meses:</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="glass-lighter rounded-lg p-4 text-center">
                <p class="text-xs text-slate-500 uppercase font-semibold mb-1">Instagram</p>
                <p class="text-2xl font-extrabold text-pink-400">670</p>
                <p class="text-xs text-slate-400 mt-1">sesiones</p>
            </div>
            <div class="glass-lighter rounded-lg p-4 text-center">
                <p class="text-xs text-slate-500 uppercase font-semibold mb-1">TikTok</p>
                <p class="text-2xl font-extrabold text-cyan-400">652</p>
                <p class="text-xs text-slate-400 mt-1">sesiones</p>
            </div>
            <div class="glass-lighter rounded-lg p-4 text-center">
                <p class="text-xs text-slate-500 uppercase font-semibold mb-1">Linktree (bio)</p>
                <p class="text-2xl font-extrabold text-green-400">636</p>
                <p class="text-xs text-slate-400 mt-1">sesiones</p>
            </div>
            <div class="glass-lighter rounded-lg p-4 text-center">
                <p class="text-xs text-slate-500 uppercase font-semibold mb-1">Facebook</p>
                <p class="text-2xl font-extrabold text-blue-400">117</p>
                <p class="text-xs text-slate-400 mt-1">sesiones</p>
            </div>
        </div>
        <div class="mt-6 p-4 bg-amber-500/10 border-l-4 border-amber-500 rounded-lg">
            <p class="text-amber-300 text-sm font-semibold mb-1">Dato interesante:</p>
            <p class="text-slate-300 text-sm">ChatGPT ya genera 47 sesiones a lacasadeljean.com. Es un canal nuevo que antes no existia &mdash; la gente pregunta a la IA por marcas de jeans en Ecuador y ChatGPT esta mencionando a CDJ. Fortalecer el contenido del sitio va a multiplicar este canal en los proximos 12 meses.</p>
        </div>
    </div>

</div>

<!-- ==================== TAB 4: TIKTOK ==================== -->
<div id="tab-tiktok" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">TikTok @cdj.ec &mdash; el pulmon de la marca</h3>
        <p class="text-slate-400 text-sm leading-relaxed">Analisis completo del periodo 19 abril 2025 &mdash; 18 abril 2026, con datos oficiales de TikTok Analytics exportados por Santiago.</p>
    </div>

    <!-- KPIs TikTok -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase mb-2">Seguidores hoy</p>
            <p class="text-3xl font-extrabold text-white">7,703</p>
            <p class="text-xs text-green-400 mt-1">+28% vs ano anterior</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase mb-2">Vistas totales</p>
            <p class="text-3xl font-extrabold text-white">~1.1M</p>
            <p class="text-xs text-slate-400 mt-1">12 meses</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase mb-2">Pico diario</p>
            <p class="text-3xl font-extrabold text-white">14,514</p>
            <p class="text-xs text-slate-400 mt-1">17 julio 2025</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5">
            <p class="text-xs text-slate-500 font-semibold uppercase mb-2">Ult. 3 meses</p>
            <p class="text-3xl font-extrabold text-red-400">+52</p>
            <p class="text-xs text-red-400 mt-1">Estancamiento</p>
        </div>
    </div>

    <!-- Evolucion seguidores -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h2 class="text-white text-lg font-bold mb-4">Evolucion de seguidores (12 meses)</h2>
        <div class="chart-container" style="height: 320px">
            <canvas id="followersChart"></canvas>
        </div>
        <p class="text-slate-400 text-xs mt-4">Fuente: TikTok Analytics &mdash; FollowerHistory.csv. Los picos coinciden con el rebranding (junio) y videos virales (julio, noviembre, enero).</p>
    </div>

    <!-- Audiencia -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="glass rounded-2xl p-6">
            <h2 class="text-white text-lg font-bold mb-4">Genero de su audiencia</h2>
            <div class="chart-container-sm">
                <canvas id="generoChart"></canvas>
            </div>
            <p class="text-slate-400 text-xs mt-3">72% mujeres. Es la audiencia ideal para CDJ &mdash; coincide con que los jeans de mujer tienen 7 fits especificos (slim, baggy, basta amplia, etc.) vs jeans de hombre que tienen menos variantes.</p>
        </div>
        <div class="glass rounded-2xl p-6">
            <h2 class="text-white text-lg font-bold mb-4">De donde son sus seguidores</h2>
            <div class="chart-container-sm">
                <canvas id="paisesChart"></canvas>
            </div>
            <p class="text-slate-400 text-xs mt-3"><strong class="text-white">67% Ecuador</strong>, pero <strong class="text-amber-400">33% del publico no esta en Ecuador</strong> (Bolivia 6%, Guatemala 5.7%, Peru 2.5%). Es audiencia que hoy no puede comprar &mdash; oportunidad futura para envios internacionales.</p>
        </div>
    </div>

    <!-- Horario -->
    <div class="glass rounded-2xl p-6 mb-8">
        <h2 class="text-white text-lg font-bold mb-4">A que hora estan despiertos sus seguidores</h2>
        <div class="chart-container" style="height: 280px">
            <canvas id="horarioChart"></canvas>
        </div>
        <p class="text-slate-400 text-xs mt-4">Fuente: FollowerActivity.csv, promedio semanal. <strong class="text-white">Horario ideal para publicar: 19h a 22h (3,000+ seguidores activos).</strong> Publicar a las 8am o 11am equivale a hablarle a la mitad de la audiencia.</p>
    </div>

    <!-- Top videos -->
    <h2 class="text-white text-lg font-bold mb-4">Los 10 videos que mas vistas generaron</h2>
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Video</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Vistas</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Likes</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Oferta de trabajo (fin de semana)</td>
                        <td class="px-4 py-3 text-center text-white font-bold">410,547</td>
                        <td class="px-4 py-3 text-center text-slate-300">15,994</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-amber-500/20 text-amber-400">Reclutamiento</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">30 anos en la moda ecuatoriana &mdash; tips</td>
                        <td class="px-4 py-3 text-center text-white font-bold">52,893</td>
                        <td class="px-4 py-3 text-center text-slate-300">746</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-green-500/20 text-green-400">Storytime</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Tendencias DENIM 2026</td>
                        <td class="px-4 py-3 text-center text-white font-bold">40,199</td>
                        <td class="px-4 py-3 text-center text-slate-300">722</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-blue-500/20 text-blue-400">Educativo</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Por que ya no somos La Casa del Jean</td>
                        <td class="px-4 py-3 text-center text-white font-bold">37,846</td>
                        <td class="px-4 py-3 text-center text-slate-300">744</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-purple-500/20 text-purple-400">Rebranding</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Tuviste alguna de estas prendas?</td>
                        <td class="px-4 py-3 text-center text-white font-bold">34,531</td>
                        <td class="px-4 py-3 text-center text-slate-300">562</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-green-500/20 text-green-400">Storytime</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Nos conoces desde nuestro primer local?</td>
                        <td class="px-4 py-3 text-center text-white font-bold">28,120</td>
                        <td class="px-4 py-3 text-center text-slate-300">722</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-green-500/20 text-green-400">Storytime</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Colab Kirby de Dulce (CDJ JEAN)</td>
                        <td class="px-4 py-3 text-center text-white font-bold">25,452</td>
                        <td class="px-4 py-3 text-center text-slate-300">830</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-pink-500/20 text-pink-400">Colab</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">La edad no define tu estilo</td>
                        <td class="px-4 py-3 text-center text-white font-bold">22,061</td>
                        <td class="px-4 py-3 text-center text-slate-300">215</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-cyan-500/20 text-cyan-400">Producto</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Historia Patricio Velasco (CEO)</td>
                        <td class="px-4 py-3 text-center text-white font-bold">14,156</td>
                        <td class="px-4 py-3 text-center text-slate-300">302</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-green-500/20 text-green-400">Storytime</span></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-white">Crear tu taller de confeccion Ecuador</td>
                        <td class="px-4 py-3 text-center text-white font-bold">12,978</td>
                        <td class="px-4 py-3 text-center text-slate-300">284</td>
                        <td class="px-4 py-3 text-center"><span class="px-2 py-0.5 rounded text-xs bg-blue-500/20 text-blue-400">Educativo</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-base mb-2">Lectura de los datos:</h3>
        <ul class="text-slate-400 text-sm space-y-2 ml-4 list-disc">
            <li><strong class="text-white">El storytime gana:</strong> 5 de los 10 videos top son sobre historia de marca (CEO, primer local, 30 anos). Es un activo unico que la competencia no puede copiar.</li>
            <li><strong class="text-white">La colab con Kirby de Dulce funciono:</strong> generaron un CDJ Jean co-branded de $49.90. Formula replicable con 2-4 colabs anuales.</li>
            <li><strong class="text-white">El video de reclutamiento es un outlier:</strong> 410k vistas pero no vende producto. Util para posicionar marca empleadora pero no para ventas.</li>
            <li><strong class="text-red-400">Estancamiento feb-abr 2026 (+52 seguidores):</strong> coincide con baja de frecuencia de posteo. El algoritmo de TikTok penaliza cuentas que publican menos.</li>
        </ul>
    </div>

</div>

<!-- ==================== TAB 5: IG Y FACEBOOK ==================== -->
<div id="tab-ig-fb" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">Instagram (@cdj.ec) y Facebook &mdash; analisis externo</h3>
        <p class="text-slate-400 text-sm leading-relaxed">No tuvimos acceso a los analytics internos de IG o FB, asi que esta seccion se basa en lo que se ve publicamente y en los datos de trafico que manda Google Analytics.</p>
    </div>

    <!-- Instagram -->
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3 mb-4">
            <div class="w-12 h-12 rounded-xl bg-pink-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-pink-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7.5 2C4.46 2 2 4.46 2 7.5v9C2 19.54 4.46 22 7.5 22h9c3.04 0 5.5-2.46 5.5-5.5v-9C22 4.46 19.54 2 16.5 2h-9zM12 7a5 5 0 110 10 5 5 0 010-10zm0 2a3 3 0 100 6 3 3 0 000-6zm5.5-3a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/></svg>
            </div>
            <div class="flex-1">
                <h2 class="text-white text-lg font-bold mb-1">Instagram @cdj.ec</h2>
                <p class="text-slate-400 text-sm">670 sesiones al sitio en 16 meses &mdash; segundo canal social mas importante despues de TikTok.</p>
            </div>
        </div>

        <h3 class="text-white font-semibold mb-3 mt-5">Fortalezas detectadas</h3>
        <ul class="text-slate-400 text-sm space-y-2 ml-4 list-disc mb-5">
            <li>El handle @cdj.ec coincide con TikTok &mdash; buena consistencia de marca.</li>
            <li>Tiene Linktree como link-in-bio (636 sesiones desde linktr.ee). Significa que la bio funciona como distribuidor de enlaces.</li>
            <li>El sitio web tiene el icono de Instagram enlazando al perfil.</li>
        </ul>

        <h3 class="text-white font-semibold mb-3">Oportunidades claves</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-pink-400 font-bold text-sm mb-2">Activar Instagram Shopping</p>
                <p class="text-slate-400 text-xs leading-relaxed">Conectar el catalogo de WooCommerce a IG Shopping permite etiquetar productos directamente en las fotos. Un carrusel con 10 jeans se convierte en 10 shortcuts a comprar. Requiere FB Commerce Manager configurado (2-3 dias de trabajo).</p>
            </div>
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-pink-400 font-bold text-sm mb-2">Cross-postear Reels de TikTok</p>
                <p class="text-slate-400 text-xs leading-relaxed">Cada video de TikTok se puede reutilizar como Reel en IG. Es aprovechar el contenido que ya funciona en otra plataforma sin invertir tiempo extra de produccion.</p>
            </div>
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-pink-400 font-bold text-sm mb-2">Highlights por sucursal</p>
                <p class="text-slate-400 text-xs leading-relaxed">Crear 4 highlights destacados: "Ibarra", "Otavalo", "Atuntaqui", "Cayambe" con fotos del local, horarios, Google Maps. El 40% de visitas IG de moda van a ver donde comprar (Meta 2024).</p>
            </div>
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-pink-400 font-bold text-sm mb-2">User Generated Content</p>
                <p class="text-slate-400 text-xs leading-relaxed">Repostear a clientas que usan CDJ con un hashtag propio (ej. #YoUsoCDJ). Aumenta credibilidad, baja el costo de produccion y fideliza a las clientas que participan.</p>
            </div>
        </div>
    </div>

    <!-- Facebook -->
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="flex items-start gap-3 mb-4">
            <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </div>
            <div class="flex-1">
                <h2 class="text-white text-lg font-bold mb-1">Facebook</h2>
                <p class="text-slate-400 text-sm">117 sesiones al sitio (apenas 7% del trafico social). Plataforma subutilizada.</p>
            </div>
        </div>

        <h3 class="text-white font-semibold mb-3 mt-5">Diagnostico rapido</h3>
        <p class="text-slate-400 text-sm leading-relaxed mb-5">Facebook genero solo 117 sesiones en 16 meses &mdash; es <strong class="text-amber-400">menos del 1% del trafico social combinado</strong>. En Ecuador, Facebook sigue siendo muy usado para marketplace y eventos, pero como canal de trafico a web tiene menor rendimiento que IG/TikTok para moda.</p>

        <h3 class="text-white font-semibold mb-3">Enfoque recomendado para Facebook</h3>
        <ul class="text-slate-400 text-sm space-y-2 ml-4 list-disc">
            <li><strong class="text-white">Activar Facebook Marketplace:</strong> muchos ecuatorianos buscan jeans por ciudad en Marketplace antes de Google. CDJ deberia listar 20-30 productos top por sucursal.</li>
            <li><strong class="text-white">Reseñas activas:</strong> pedir a clientes actuales que dejen 5 estrellas en la pagina de Facebook. Es visible publicamente y genera confianza.</li>
            <li><strong class="text-white">Eventos por sucursal:</strong> "Descuento del feriado en sucursal Otavalo" como evento de FB lleva trafico fisico y digital.</li>
            <li><strong class="text-white">Cross-post de IG:</strong> conectar IG y FB para que los posts se dupliquen automaticamente. No requiere trabajo extra.</li>
        </ul>
    </div>

    <!-- Linktree -->
    <div class="glass rounded-2xl p-6">
        <h2 class="text-white text-lg font-bold mb-3">Nota sobre Linktree (link-in-bio)</h2>
        <p class="text-slate-400 text-sm leading-relaxed mb-3">Linktr.ee envio 636 sesiones al sitio en 16 meses &mdash; <strong class="text-white">casi tanto como TikTok directo (652)</strong>. Es decir, Linktree esta funcionando como el principal puente entre redes sociales y la web.</p>
        <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-white">Recomendaciones:</strong></p>
        <ul class="text-slate-400 text-sm space-y-2 ml-4 list-disc">
            <li>Reducir enlaces en Linktree a 4-5 esenciales: "Comprar Jeans Mujer", "Comprar Jeans Hombre", "Chatear por WhatsApp", "Ubicaciones", "Ultimas ofertas". Mas enlaces = menos clicks por opcion.</li>
            <li>Poner UTM tracking en cada enlace del Linktree para saber desde que red llegan (UTMs son parametros invisibles en la URL que le dicen a Analytics de donde viene el click).</li>
            <li>Reemplazar Linktree por una pagina propia tipo lacasadeljean.com/redes que sea igual de simple pero quede bajo el dominio propio (mejor para SEO y branding).</li>
        </ul>
    </div>

</div>

<!-- ==================== TAB 6: COMPETIDORES ==================== -->
<div id="tab-competidores" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">Donde esta CDJ vs sus competidores</h3>
        <p class="text-slate-400 text-sm leading-relaxed">Analisis comparativo externo de 5 marcas de moda/denim en Ecuador. Las cifras de seguidores son a abril 2026 y publicas.</p>
    </div>

    <!-- Tabla comparativa -->
    <div class="glass rounded-2xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Marca</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Tipo</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">IG</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">TikTok</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Tienda online</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Promo visible</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30 bg-blue-500/5">
                        <td class="px-6 py-3 text-white font-semibold">CDJ (ustedes)</td>
                        <td class="px-4 py-3 text-slate-300">Especialista denim EC</td>
                        <td class="px-4 py-3 text-center text-slate-300">Cuenta @cdj.ec</td>
                        <td class="px-4 py-3 text-center text-white font-bold">7.7k</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">WooCommerce</span></td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 text-xs">Sin promo visible</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Etafashion</td>
                        <td class="px-4 py-3 text-slate-300">Retail general multi-marca</td>
                        <td class="px-4 py-3 text-center text-slate-300">~800k</td>
                        <td class="px-4 py-3 text-center text-slate-300">~100k</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">Completa + envio</span></td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">15% OFF 1a compra</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">De Prati</td>
                        <td class="px-4 py-3 text-slate-300">Retail general multi-marca</td>
                        <td class="px-4 py-3 text-center text-slate-300">~700k</td>
                        <td class="px-4 py-3 text-center text-slate-300">~75k</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">Completa</span></td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">Cupones activos</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Tiendas Industrial</td>
                        <td class="px-4 py-3 text-slate-300">Especialista jeans EC</td>
                        <td class="px-4 py-3 text-center text-slate-300">~60k</td>
                        <td class="px-4 py-3 text-center text-slate-300">~30k</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">Si</span></td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 text-xs">Ocasional</span></td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-3 text-white">Marathon</td>
                        <td class="px-4 py-3 text-slate-300">Retail deportivo</td>
                        <td class="px-4 py-3 text-center text-slate-300">~500k</td>
                        <td class="px-4 py-3 text-center text-slate-300">~40k</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">Completa</span></td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 text-xs">Programa puntos</span></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-white">Marcas Otavalo/Atuntaqui locales</td>
                        <td class="px-4 py-3 text-slate-300">Textil local</td>
                        <td class="px-4 py-3 text-center text-slate-300">Variable</td>
                        <td class="px-4 py-3 text-center text-slate-300">Baja</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 text-xs">Parcial</span></td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 text-xs">Sucursal fisica</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold text-base mb-3">Su ventaja competitiva real</h3>
            <ul class="text-slate-400 text-sm space-y-2 ml-4 list-disc">
                <li><strong class="text-white">Especializacion:</strong> las grandes (Etafashion, De Prati) venden de todo; CDJ es "el especialista en denim". Esa claridad genera confianza.</li>
                <li><strong class="text-white">Historia de 30 anos:</strong> el storytelling del CEO y los origenes (primer local) es un activo que las cadenas no tienen.</li>
                <li><strong class="text-white">Produccion propia:</strong> el video del taller de confeccion posiciona a CDJ como fabricante, no intermediario. Es un diferenciador fuerte.</li>
                <li><strong class="text-white">Narrativa ecuatoriana autentica:</strong> "jeans para ecuatorianas, resalta tu cuerpo" conecta con una necesidad especifica que las marcas extranjeras no atienden.</li>
                <li><strong class="text-white">4 sucursales fisicas en el norte:</strong> para clientes de Imbabura, Pichincha, Carchi, es mas cercano que las cadenas nacionales.</li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-6">
            <h3 class="text-white font-bold text-base mb-3">Donde le sacan ventaja los competidores</h3>
            <ul class="text-slate-400 text-sm space-y-2 ml-4 list-disc">
                <li><strong class="text-white">Promociones permanentes:</strong> Etafashion y De Prati siempre tienen un "15% off primera compra", cupones, o envio gratis. CDJ no tiene incentivo visible al primer visitante.</li>
                <li><strong class="text-white">Reviews y sellos de confianza:</strong> visiblemente publicados en las fichas. CDJ no tiene comentarios de clientes en las fichas.</li>
                <li><strong class="text-white">Volumen en Instagram:</strong> Etafashion tiene 100x mas seguidores en IG. Aunque CDJ tiene mejor engagement relativo, el alcance es menor.</li>
                <li><strong class="text-white">Multiples metodos de pago:</strong> las grandes aceptan tarjeta, Payphone, transferencia, contraentrega. La ficha de producto de CDJ no comunica esto claramente.</li>
                <li><strong class="text-white">Botones de WhatsApp por producto:</strong> las marcas ecuatorianas tipicas ya lo tienen; CDJ no.</li>
            </ul>
        </div>
    </div>

    <div class="glass rounded-2xl p-6">
        <h3 class="text-white font-bold text-base mb-3">Recomendacion estrategica</h3>
        <p class="text-slate-400 text-sm leading-relaxed">No tiene sentido que CDJ compita en volumen con Etafashion/De Prati. La estrategia ganadora es <strong class="text-white">profundizar el posicionamiento de "especialista en denim ecuatoriano con 30 anos de historia"</strong>, cobrar ticket medio similar al de retail, y ganar en lealtad de cliente (valor de vida del cliente). Una clienta fiel de CDJ vale mas que 10 visitas unicas de Etafashion.</p>
    </div>

</div>

<!-- ==================== TAB 7: FODA + PLAN ==================== -->
<div id="tab-foda" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">FODA &mdash; un resumen en 4 cuadros</h3>
        <p class="text-slate-400 text-sm leading-relaxed">FODA es el analisis clasico: <strong class="text-white">F</strong>ortalezas y <strong class="text-white">D</strong>ebilidades (cosas de adentro), <strong class="text-white">O</strong>portunidades y <strong class="text-white">A</strong>menazas (cosas de afuera).</p>
    </div>

    <!-- FODA Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
        <div class="glass rounded-2xl p-6 border-l-4 border-green-500">
            <h3 class="text-green-400 font-bold text-base mb-3">Fortalezas (lo que ya hace bien)</h3>
            <ul class="text-slate-300 text-sm space-y-2 ml-4 list-disc">
                <li>Marca de 30 anos con historia autentica</li>
                <li>TikTok con 7,703 seguidores y formato storytelling probado</li>
                <li>4 sucursales fisicas en el norte del pais</li>
                <li>Produccion propia (taller) como diferenciador</li>
                <li>Rebranding claro de "La Casa del Jean" a "CDJ"</li>
                <li>Web WooCommerce funcional con Google Tag Manager y TikTok Pixel</li>
                <li>Colab ya exitosa (Kirby de Dulce) replicable</li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-6 border-l-4 border-red-500">
            <h3 class="text-red-400 font-bold text-base mb-3">Debilidades (lo que esta fallando)</h3>
            <ul class="text-slate-300 text-sm space-y-2 ml-4 list-disc">
                <li>Tasa de conversion web 0.43% (industria: 2-3%)</li>
                <li>Solo 35 add_to_cart y 0 compras registradas en 16 meses</li>
                <li>SEO basico roto: sin H1, sin meta description, sin schema Product</li>
                <li>Ficha de producto sin WhatsApp, sin reseñas, sin alt text en imagenes</li>
                <li>TikTok estancado (+52 seguidores en los ultimos 90 dias)</li>
                <li>Facebook infrautilizado (117 sesiones en 16 meses)</li>
                <li>Sin promociones visibles para primer comprador</li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-6 border-l-4 border-cyan-500">
            <h3 class="text-cyan-400 font-bold text-base mb-3">Oportunidades (lo que el mercado ofrece)</h3>
            <ul class="text-slate-300 text-sm space-y-2 ml-4 list-disc">
                <li>33% de la audiencia TikTok esta fuera de Ecuador (Bolivia, Guatemala, Peru) &mdash; potencial futuro de envios internacionales</li>
                <li>ChatGPT ya envia trafico (47 sesiones) &mdash; canal emergente</li>
                <li>El storytelling y "made in Ecuador" es tendencia global post-2024</li>
                <li>Instagram Shopping aun no saturado en moda local</li>
                <li>Colabs con micro-influencers locales (aprox $100-$300 por video) siguen costo-efectivas</li>
                <li>Nueva generacion prefiere marcas con producto en video antes de comprar</li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-6 border-l-4 border-amber-500">
            <h3 class="text-amber-400 font-bold text-base mb-3">Amenazas (lo que puede afectar)</h3>
            <ul class="text-slate-300 text-sm space-y-2 ml-4 list-disc">
                <li>Shein, Temu y fast-fashion global bajando precios agresivamente</li>
                <li>Algoritmo de TikTok volatil &mdash; un cambio puede cortar vistas 50% de un dia a otro</li>
                <li>Cadenas nacionales (Etafashion, De Prati) con mayor presupuesto publicitario</li>
                <li>Costo de logistica interna (envio Sierra-Costa) puede subir</li>
                <li>Audiencia GenZ migra entre plataformas cada 2-3 anos (hoy TikTok, manana puede ser otra)</li>
            </ul>
        </div>
    </div>

    <!-- Plan 30/60/90 -->
    <h2 class="text-white text-xl font-bold mb-4">Plan de accion &mdash; 30, 60 y 90 dias</h2>
    <p class="text-slate-400 text-sm mb-6">Todo lo siguiente esta ordenado de <strong class="text-white">mayor impacto por menor esfuerzo</strong> primero. Se puede ejecutar con el equipo interno, con Creative Web, o combinado.</p>

    <div class="space-y-4">
        <!-- 30 dias -->
        <div class="glass rounded-2xl p-6 border-l-4 border-red-500">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-red-500/20 flex items-center justify-center">
                    <span class="text-red-400 font-extrabold text-sm">30d</span>
                </div>
                <h3 class="text-white font-bold text-lg">Primeros 30 dias &mdash; Quick wins</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-red-400 font-bold text-xs mb-1">ACCION 1</p>
                    <p class="text-white font-semibold text-sm mb-1">Fix tracking Google Analytics + TikTok Pixel</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Configurar eventos de ecommerce (view_item, add_to_cart, begin_checkout, purchase) via GTM. Sin esto, no hay como medir el retorno de las demas acciones.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-red-400 font-bold text-xs mb-1">ACCION 2</p>
                    <p class="text-white font-semibold text-sm mb-1">Agregar boton WhatsApp por producto</p>
                    <p class="text-slate-400 text-xs leading-relaxed">En cada ficha: "Comprar por WhatsApp" con el nombre y precio del producto precargado al mensaje. Expected uplift: +200-400% en leads (base Meta 2024).</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-red-400 font-bold text-xs mb-1">ACCION 3</p>
                    <p class="text-white font-semibold text-sm mb-1">Arreglar SEO basico</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Acortar title a 50-60 chars, escribir meta description para homepage y categorias top (Jeans, Chaquetas, Pantalones), agregar H1, completar alt text en todas las imagenes.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-red-400 font-bold text-xs mb-1">ACCION 4</p>
                    <p class="text-white font-semibold text-sm mb-1">Reactivar TikTok &mdash; 5 posts por semana</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Recuperar cadencia con mix: 2 storytime, 1 tendencia, 1 producto en uso, 1 detras de camaras. Todos publicados entre 19h y 22h.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-red-400 font-bold text-xs mb-1">ACCION 5</p>
                    <p class="text-white font-semibold text-sm mb-1">Optimizar Linktree</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Reducir a 5 enlaces clave con UTMs de tracking. Opcion: crear pagina propia lacasadeljean.com/redes que reemplace Linktree.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-red-400 font-bold text-xs mb-1">ACCION 6</p>
                    <p class="text-white font-semibold text-sm mb-1">Pop-up de 10% descuento primer pedido</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Capturar email del visitante a cambio de cupon de bienvenida. Arranca la base de datos de email marketing desde cero.</p>
                </div>
            </div>
        </div>

        <!-- 60 dias -->
        <div class="glass rounded-2xl p-6 border-l-4 border-amber-500">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center">
                    <span class="text-amber-400 font-extrabold text-sm">60d</span>
                </div>
                <h3 class="text-white font-bold text-lg">Dias 31-60 &mdash; Consolidacion</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-amber-400 font-bold text-xs mb-1">ACCION 7</p>
                    <p class="text-white font-semibold text-sm mb-1">Schema Product en fichas</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Implementar JSON-LD Product con precio, disponibilidad, rating. Para que Google muestre precios y estrellas directamente en resultados.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-amber-400 font-bold text-xs mb-1">ACCION 8</p>
                    <p class="text-white font-semibold text-sm mb-1">Instagram Shopping activado</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Sincronizar catalogo WooCommerce con IG Shopping via Meta Commerce Manager. Etiquetar productos en cada foto.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-amber-400 font-bold text-xs mb-1">ACCION 9</p>
                    <p class="text-white font-semibold text-sm mb-1">Cross-post TikTok a Reels y FB</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Automatizar via Meta Business Suite para que cada video de TikTok se publique tambien en Instagram Reels y Facebook. Cero trabajo extra.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-amber-400 font-bold text-xs mb-1">ACCION 10</p>
                    <p class="text-white font-semibold text-sm mb-1">Campana de reseñas</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Incluir codigo QR en cada prenda vendida en sucursal fisica que lleve a "Deje su reseña". Meta: 30+ reseñas en Google Business a los 60 dias.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-amber-400 font-bold text-xs mb-1">ACCION 11</p>
                    <p class="text-white font-semibold text-sm mb-1">Programa UGC &mdash; #YoUsoCDJ</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Concurso mensual: mejor foto con prenda CDJ gana un outfit. Se generan decenas de fotos de clientes reales que se pueden reutilizar en web y redes.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-amber-400 font-bold text-xs mb-1">ACCION 12</p>
                    <p class="text-white font-semibold text-sm mb-1">Highlights IG por sucursal</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Crear 4 highlights: Ibarra, Otavalo, Atuntaqui, Cayambe con fotos, horarios y mapa. Facilita que el cliente ubique la mas cercana.</p>
                </div>
            </div>
        </div>

        <!-- 90 dias -->
        <div class="glass rounded-2xl p-6 border-l-4 border-green-500">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-green-500/20 flex items-center justify-center">
                    <span class="text-green-400 font-extrabold text-sm">90d</span>
                </div>
                <h3 class="text-white font-bold text-lg">Dias 61-90 &mdash; Escalamiento</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-green-400 font-bold text-xs mb-1">ACCION 13</p>
                    <p class="text-white font-semibold text-sm mb-1">Email marketing con la lista capturada</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Secuencia de bienvenida (3 emails), newsletter quincenal con lanzamientos, campanas de fechas especiales (dia de la madre, Black Friday).</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-green-400 font-bold text-xs mb-1">ACCION 14</p>
                    <p class="text-white font-semibold text-sm mb-1">Colabs mensuales con micro-influencers</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Replicar el exito de Kirby de Dulce con 2-3 colabs por trimestre. Segmento: influencers de moda con 20k-100k seguidores Ecuador.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-green-400 font-bold text-xs mb-1">ACCION 15</p>
                    <p class="text-white font-semibold text-sm mb-1">Campana pagada TikTok y Meta</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Con tracking funcionando, lanzar campaña de retargeting ($100-200/mes) a visitantes del sitio que no compraron. ROAS esperado 3-5x.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-green-400 font-bold text-xs mb-1">ACCION 16</p>
                    <p class="text-white font-semibold text-sm mb-1">Programa de fidelizacion</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Club CDJ: acumulacion de puntos por cada compra, descuento extra en cumpleanos, acceso anticipado a lanzamientos. Aumenta valor de vida del cliente.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-green-400 font-bold text-xs mb-1">ACCION 17</p>
                    <p class="text-white font-semibold text-sm mb-1">Dashboard mensual</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Reporte automatico con KPIs: ventas online, trafico, conversion, ROAS, engagement social, top productos. Decisiones basadas en datos.</p>
                </div>
                <div class="glass-lighter rounded-lg p-4">
                    <p class="text-green-400 font-bold text-xs mb-1">ACCION 18</p>
                    <p class="text-white font-semibold text-sm mb-1">Contenido evergreen en blog</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Crear guias tipo "Como escoger el fit de jean segun tu cuerpo", "Como cuidar tu jean para que dure 5 anos". SEO a largo plazo que sigue funcionando 2-3 anos sin gasto adicional.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 8: PROPUESTA ==================== -->
<div id="tab-propuesta" class="tab-content">

    <div class="glass-accent rounded-2xl p-6 mb-8">
        <h3 class="text-white font-bold text-lg mb-2">Como lo implementamos juntos</h3>
        <p class="text-slate-400 text-sm leading-relaxed">Todo lo identificado en esta auditoria se puede ejecutar en los proximos 90 dias. A continuacion le presentamos 3 opciones segun su preferencia: que lo haga su equipo con nuestra guia, que lo hagamos nosotros, o una combinacion.</p>
    </div>

    <!-- Paquete 1: Social Media Management -->
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div>
                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-purple-500/20 text-purple-400 border border-purple-500/30 mb-2">PAQUETE 1</div>
                <h2 class="text-white text-xl font-bold">Gestion de Redes Sociales</h2>
                <p class="text-slate-400 text-sm mt-1">Reactive y haga crecer TikTok, Instagram y Facebook</p>
            </div>
            <div class="text-right">
                <p class="text-3xl font-extrabold text-purple-400">$350</p>
                <p class="text-xs text-slate-400">USD / mes</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
            <div>
                <h3 class="text-white font-semibold text-sm mb-3">Que incluye mensualmente:</h3>
                <ul class="text-slate-400 text-sm space-y-2">
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>12 a 16 publicaciones mensuales (TikTok + IG + FB)</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Calendario editorial aprobado antes de publicar</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Reactivacion estrategica de TikTok tras el estancamiento</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Cross-posteo automatico TikTok → Reels → FB</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Copywriting + hashtags optimizados</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Respuesta a comentarios y DMs (hasta 50/mes)</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Reporte mensual de resultados</li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold text-sm mb-3">Lo que usted obtiene:</h3>
                <ul class="text-slate-400 text-sm space-y-2">
                    <li class="flex gap-2"><span class="text-purple-400">&rarr;</span>Crecimiento esperado: +2,000 seguidores TikTok en 90 dias</li>
                    <li class="flex gap-2"><span class="text-purple-400">&rarr;</span>Meta de engagement: pasar de 2% a 4% en TikTok</li>
                    <li class="flex gap-2"><span class="text-purple-400">&rarr;</span>Consistencia visual entre las 3 plataformas</li>
                    <li class="flex gap-2"><span class="text-purple-400">&rarr;</span>Liberar tiempo interno que hoy se dedica a redes</li>
                    <li class="flex gap-2"><span class="text-purple-400">&rarr;</span>Acceso a nuestro equipo editorial y de grafica</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Paquete 2: Optimizacion Web -->
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div>
                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30 mb-2">PAQUETE 2</div>
                <h2 class="text-white text-xl font-bold">Optimizacion Web + Tracking</h2>
                <p class="text-slate-400 text-sm mt-1">Arregle el embudo de ventas y sepa que funciona</p>
            </div>
            <div class="text-right">
                <p class="text-3xl font-extrabold text-blue-400">$480</p>
                <p class="text-xs text-slate-400">USD pago unico</p>
                <p class="text-xs text-slate-500">+ $120/mes mantenimiento (opcional)</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
            <div>
                <h3 class="text-white font-semibold text-sm mb-3">Que se hace en el pago unico:</h3>
                <ul class="text-slate-400 text-sm space-y-2">
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Fix completo de Google Analytics (eventos ecommerce)</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Configuracion TikTok Pixel + Facebook Pixel con eventos</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Optimizacion SEO: title, meta, H1, schema Product, OG tags</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Boton WhatsApp por producto con mensaje precargado</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Trust signals en fichas (metodos de pago, envios, garantias)</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Pop-up de captura de email + descuento 10% primera compra</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Alt text en todas las imagenes</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Optimizacion de Linktree o pagina propia /redes</li>
                    <li class="flex gap-2"><span class="text-green-400">&check;</span>Dashboard de metricas en Google Looker Studio</li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold text-sm mb-3">Que incluye el mantenimiento mensual (opcional):</h3>
                <ul class="text-slate-400 text-sm space-y-2">
                    <li class="flex gap-2"><span class="text-blue-400">&rarr;</span>Monitoreo y ajuste de eventos si cambia algo en la web</li>
                    <li class="flex gap-2"><span class="text-blue-400">&rarr;</span>Reporte mensual con KPIs de ecommerce</li>
                    <li class="flex gap-2"><span class="text-blue-400">&rarr;</span>A/B testing de CTAs, banners y pop-ups</li>
                    <li class="flex gap-2"><span class="text-blue-400">&rarr;</span>Sync del catalogo WooCommerce con IG Shopping</li>
                    <li class="flex gap-2"><span class="text-blue-400">&rarr;</span>Ajustes menores de SEO y contenido</li>
                    <li class="flex gap-2"><span class="text-blue-400">&rarr;</span>Correcciones tecnicas ante cambios del sitio</li>
                </ul>
                <p class="text-xs text-slate-500 mt-4 p-3 bg-slate-800/40 rounded-lg">Duracion estimada del trabajo unico: <strong class="text-white">3 a 4 semanas</strong>. Se entrega con documentacion y capacitacion a su equipo.</p>
            </div>
        </div>
    </div>

    <!-- Paquete 3: Combo Recomendado -->
    <div class="glass rounded-2xl p-6 mb-8" style="border: 2px solid #3b82f6; background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.08));">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div>
                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-blue-500/30 to-purple-500/30 text-white border border-blue-500/50 mb-2">PAQUETE 3 &mdash; RECOMENDADO</div>
                <h2 class="text-white text-xl font-bold">Full Growth (Social + Web)</h2>
                <p class="text-slate-300 text-sm mt-1">Integramos los dos paquetes para maximo impacto</p>
            </div>
            <div class="text-right">
                <p class="text-3xl font-extrabold text-white">$450</p>
                <p class="text-xs text-slate-300">USD / mes</p>
                <p class="text-xs text-green-400">Ahorro de $80/mes</p>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-blue-400 font-bold text-sm mb-2">&check; Todo el Paquete 1</p>
                <p class="text-slate-400 text-xs leading-relaxed">Gestion completa de redes sociales + reportes mensuales</p>
            </div>
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-purple-400 font-bold text-sm mb-2">&check; Todo el Paquete 2</p>
                <p class="text-slate-400 text-xs leading-relaxed">Implementacion web inicial + mantenimiento mensual</p>
            </div>
            <div class="glass-lighter rounded-lg p-4">
                <p class="text-green-400 font-bold text-sm mb-2">+ Extras exclusivos</p>
                <ul class="text-slate-400 text-xs space-y-1 mt-1">
                    <li>&bull; 1 colab mensual coordinada (micro-influencer)</li>
                    <li>&bull; Campana paga TikTok/Meta gestionada (pauta aparte)</li>
                    <li>&bull; Dashboard unificado redes + web</li>
                </ul>
            </div>
        </div>

        <div class="mt-6 p-4 bg-slate-800/60 rounded-lg border-l-4 border-blue-400">
            <p class="text-slate-300 text-sm leading-relaxed"><strong class="text-white">Por que lo recomendamos:</strong> los dos servicios se potencian. El tracking de la web mejora las decisiones de contenido social; el contenido social bien medido reactiva el crecimiento. Ir por separado cuesta mas y los resultados son mas lentos porque no hay una sola persona vigilando todo el embudo.</p>
        </div>
    </div>

    <!-- Proximos pasos -->
    <div class="glass rounded-2xl p-6">
        <h3 class="text-white font-bold text-lg mb-4">Proximos pasos</h3>
        <ol class="text-slate-400 text-sm space-y-3 ml-5 list-decimal">
            <li><strong class="text-white">Revise este informe con calma.</strong> Cada pestana tiene datos que justifican las recomendaciones. Si algo no queda claro, avisenos.</li>
            <li><strong class="text-white">Decida el paquete que mejor se acomoda</strong> a sus prioridades del Q2 2026.</li>
            <li><strong class="text-white">Reunion de kickoff</strong> (30 min presencial o por videollamada) para alinear objetivos y calendario de ejecucion.</li>
            <li><strong class="text-white">Arranque inmediato:</strong> si firmamos en la semana, las primeras 3 acciones de "30 dias" estan en produccion en menos de 10 dias laborables.</li>
        </ol>
        <div class="mt-6 p-4 bg-blue-500/10 rounded-lg border border-blue-500/20 flex items-center justify-between flex-wrap gap-4">
            <div>
                <p class="text-white font-semibold text-sm">Contacto directo Creative Web</p>
                <p class="text-slate-300 text-xs mt-1">Santiago &mdash; santysos1@gmail.com</p>
            </div>
            <div class="flex gap-2">
                <a href="https://wa.me/593000000000" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-green-500/20 border border-green-500/30 text-green-400 text-xs font-semibold hover:bg-green-500/30 transition-all">WhatsApp</a>
                <a href="mailto:santysos1@gmail.com" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-500/20 border border-blue-500/30 text-blue-400 text-xs font-semibold hover:bg-blue-500/30 transition-all">Email</a>
            </div>
        </div>
    </div>

</div>

</main>

<!-- FOOTER -->
<footer class="relative z-10 glass border-t border-slate-700/50 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-xs">Informe confidencial preparado por <span class="text-slate-300 font-medium">Creative Web</span> para <span class="text-slate-300 font-medium">CDJ La Casa del Jean</span> &mdash; Abril 2026</p>
        <p class="text-slate-600 text-xs mt-2">creativeweb.com.ec</p>
    </div>
</footer>

<script>
// Tab switching
function switchTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => { b.classList.remove('active'); b.classList.add('text-slate-400'); });
    document.getElementById('tab-' + tabName).classList.add('active');
    event.currentTarget.classList.add('active');
    event.currentTarget.classList.remove('text-slate-400');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Chart.js default config
Chart.defaults.color = '#94a3b8';
Chart.defaults.borderColor = 'rgba(148, 163, 184, 0.1)';
Chart.defaults.font.family = 'Inter, sans-serif';

// ========== Score Chart ==========
new Chart(document.getElementById('scoreChart'), {
    type: 'doughnut',
    data: {
        labels: ['Obtenido', 'Restante'],
        datasets: [{
            data: [40, 60],
            backgroundColor: ['#f59e0b', 'rgba(71, 85, 105, 0.2)'],
            borderWidth: 0,
            cutout: '75%'
        }]
    },
    options: {
        plugins: { legend: { display: false }, tooltip: { enabled: false } },
        responsive: false,
        animation: { animateRotate: true, duration: 1200 }
    }
});

// ========== Canales Chart (donut) ==========
new Chart(document.getElementById('canalesChart'), {
    type: 'doughnut',
    data: {
        labels: ['Busqueda organica (Google)', 'Directo (escribieron la URL)', 'Redes sociales', 'Referencia (otros sitios)'],
        datasets: [{
            data: [3557, 2501, 1547, 582],
            backgroundColor: ['#3b82f6', '#06b6d4', '#a855f7', '#22c55e'],
            borderWidth: 0
        }]
    },
    options: {
        plugins: {
            legend: { position: 'bottom', labels: { padding: 15, font: { size: 11 } } }
        },
        maintainAspectRatio: false
    }
});

// ========== Followers Evolution Chart ==========
const followersData = {
    labels: ['Abr 19','May 1','May 15','Jun 1','Jun 15','Jul 1','Jul 15','Ago 1','Ago 15','Sep 1','Sep 15','Oct 1','Oct 15','Nov 1','Nov 15','Dic 1','Dic 15','Ene 1','Ene 15','Feb 1','Feb 15','Mar 1','Mar 15','Abr 1','Abr 18'],
    values: [6016,6060,6101,6117,6156,6275,6331,6637,6852,6951,6987,7072,7099,7119,7221,7411,7429,7468,7617,7651,7682,7700,7701,7705,7703]
};
new Chart(document.getElementById('followersChart'), {
    type: 'line',
    data: {
        labels: followersData.labels,
        datasets: [{
            label: 'Seguidores',
            data: followersData.values,
            borderColor: '#06b6d4',
            backgroundColor: 'rgba(6, 182, 212, 0.1)',
            tension: 0.35,
            pointRadius: 3,
            pointBackgroundColor: '#06b6d4',
            fill: true
        }]
    },
    options: {
        plugins: {
            legend: { display: false },
            tooltip: { backgroundColor: 'rgba(15, 23, 42, 0.95)', borderColor: 'rgba(148,163,184,0.2)', borderWidth: 1 }
        },
        scales: {
            y: { grid: { color: 'rgba(148,163,184,0.05)' }, beginAtZero: false, min: 5900 },
            x: { grid: { display: false }, ticks: { maxRotation: 45, minRotation: 45 } }
        },
        maintainAspectRatio: false
    }
});

// ========== Genero Donut ==========
new Chart(document.getElementById('generoChart'), {
    type: 'doughnut',
    data: {
        labels: ['Mujeres', 'Hombres'],
        datasets: [{
            data: [72, 28],
            backgroundColor: ['#ec4899', '#3b82f6'],
            borderWidth: 0
        }]
    },
    options: {
        plugins: { legend: { position: 'bottom', labels: { padding: 15, font: { size: 12 } } } },
        maintainAspectRatio: false,
        cutout: '55%'
    }
});

// ========== Paises Donut ==========
new Chart(document.getElementById('paisesChart'), {
    type: 'doughnut',
    data: {
        labels: ['Ecuador', 'Bolivia', 'Guatemala', 'Peru', 'El Salvador', 'Brasil', 'Otros'],
        datasets: [{
            data: [67.4, 6.0, 5.7, 2.5, 1.8, 1.2, 15.4],
            backgroundColor: ['#22c55e', '#f59e0b', '#8b5cf6', '#ef4444', '#06b6d4', '#ec4899', '#64748b'],
            borderWidth: 0
        }]
    },
    options: {
        plugins: { legend: { position: 'bottom', labels: { padding: 10, font: { size: 10 } } } },
        maintainAspectRatio: false,
        cutout: '55%'
    }
});

// ========== Horario Bar ==========
const horarioLabels = ['0h','1h','2h','3h','4h','5h','6h','7h','8h','9h','10h','11h','12h','13h','14h','15h','16h','17h','18h','19h','20h','21h','22h','23h'];
const horarioValues = [1003,503,303,265,385,870,1602,2012,2026,1960,1981,1969,2067,2275,2306,2223,2228,2284,2443,2711,2943,3059,2738,1868];
new Chart(document.getElementById('horarioChart'), {
    type: 'bar',
    data: {
        labels: horarioLabels,
        datasets: [{
            label: 'Seguidores activos promedio',
            data: horarioValues,
            backgroundColor: horarioValues.map(v => v >= 2700 ? '#22c55e' : v >= 2000 ? '#06b6d4' : v >= 1000 ? '#64748b' : '#475569'),
            borderRadius: 4
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: {
            y: { grid: { color: 'rgba(148,163,184,0.05)' }, beginAtZero: true },
            x: { grid: { display: false } }
        },
        maintainAspectRatio: false
    }
});
</script>

</body>
</html>
