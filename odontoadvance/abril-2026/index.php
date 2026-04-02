<?php
session_start();
if (!isset($_SESSION['auth_odontoadvance']) || $_SESSION['auth_odontoadvance'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informe Marketing Digital — OdontoAdvance — Abril 2026</title>
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
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
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
                    <p class="text-sm text-white font-medium">OdontoAdvance</p>
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
            <span class="text-blue-300 font-semibold text-sm">OdontoAdvance</span>
            <span class="text-slate-500 text-sm">|</span>
            <span class="text-slate-400 text-sm">odontoadvance.ec — Clinica de Especialidades Odontologicas, Quito</span>
        </div>
    </div>
</header>

<!-- TAB NAVIGATION -->
<nav class="relative z-50 glass border-b border-slate-700/50 sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex gap-1 py-2 overflow-x-auto" id="tabNav">
            <button class="tab-btn active px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent whitespace-nowrap" onclick="switchTab('resumen')">Resumen Ejecutivo</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('trafico')">Trafico y Busquedas</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('competencia')">Competencia</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('contenido')">Plan de Contenido</button>
            <button class="tab-btn px-4 py-2.5 rounded-lg text-xs font-semibold border border-transparent text-slate-400 whitespace-nowrap" onclick="switchTab('inversion')">Propuesta e Inversion</button>
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
                <p class="text-slate-400 text-sm leading-relaxed">Este documento analiza la presencia digital de <strong class="text-white">OdontoAdvance</strong> — es decir, como se ve su clinica dental en Internet, que tan facil es para los pacientes encontrarla en Google, y cuantos pacientes nuevos esta perdiendo cada mes por no tener una estrategia digital. Le mostraremos los datos reales de su sitio web y le propondremos un plan concreto para crecer.</p>
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
                    <span class="text-3xl font-extrabold text-red-400">25</span>
                    <span class="text-xs text-slate-400">de 100</span>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">Grado F — Critico</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">De 100 puntos posibles, su sitio web obtuvo <strong class="text-white">25 puntos</strong>. Su web fue creada en 2016 y no ha recibido actualizaciones tecnicas en casi 10 anos. Esto significa que Google no la puede leer correctamente, los pacientes no la encuentran cuando buscan "dentista en Quito", y usted esta perdiendo pacientes cada dia. <strong class="text-white">La buena noticia:</strong> su clinica tiene 15+ anos de trayectoria, convenios con 7 aseguradoras, y sedacion dental — ventajas que NINGUN competidor comunica bien. Solo necesitamos que su sitio web este a la altura de su clinica.</p>
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
                        <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que significa para su clinica?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Visibilidad en Google (SEO)</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">15/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Su sitio no tiene meta descriptions, no tiene datos estructurados (Schema), el sitemap solo tiene 1 URL desde 2016, y Google no puede indexar correctamente sus paginas. Cuando alguien busca "dentista Quito" o "implantes dentales Quito", su clinica NO aparece.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Contenido y mensajes</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">20/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">El blog lleva 8 anos sin actualizarse (ultimo post: febrero 2018). Los textos son genericos y no explican por que OdontoAdvance es diferente. No hay paginas individuales por servicio — todo esta agrupado en una sola pagina.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Conversion (pacientes nuevos)</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">30/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">El boton de WhatsApp existe pero no es personalizado por servicio. No hay precios de referencia. Solo hay 1 testimonio en toda la web. Los formularios no especifican que servicio necesita el paciente. Porcentaje de rebote del 59% en la homepage — 6 de cada 10 visitantes se van sin hacer nada.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Posicion frente a competidores</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">35/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Depau Dental tiene web moderna con blog SEO activo. Smile Design tiene TikTok y YouTube. Dental 360 tiene 2 sedes y emergencias 24/7. Zirconia tiene sitio bilingue para turismo dental. OdontoAdvance tiene ventajas que no comunica: sedacion, 7 aseguradoras, 15 anos.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-6 py-4 text-white font-medium">Tecnologia y velocidad</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400">18/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">WordPress 6.2.9 (desactualizado 2 anos). Tema de 2016 sin soporte. Google Analytics muerto desde julio 2023. Cache de 3 segundos. Imagenes sin optimizar. MotoPress Slider lento. Su sitio tarda mas de 4 segundos en cargar — Google penaliza los sitios lentos.</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-white font-medium">Confianza y credibilidad</td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">35/100</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Tiene logos de 7 aseguradoras y 1 testimonio, pero no hay resenas de Google integradas, no hay casos antes/despues, y los perfiles de doctores no muestran credenciales completas. Para tratamientos de $500-$5,000, los pacientes necesitan mas pruebas de confianza.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- KPI Alert Cards -->
    <h2 class="text-white text-lg font-bold mb-4">Alertas Criticas</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Google Analytics MUERTO desde julio 2023</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Su sitio usa Universal Analytics (UA-79841273-1), que Google dejo de procesar hace casi 3 anos. NO tiene Google Analytics 4 (GA4) instalado. Es decir: <strong class="text-white">no tiene idea de cuantos pacientes visitan su web, de donde vienen, ni que servicios les interesan.</strong></p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Blog abandonado 8 anos (desde 2018)</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Google valora los sitios que publican contenido nuevo regularmente. Un blog que lleva 8 anos sin actualizarse le dice a Google que este negocio esta inactivo. Mientras tanto, sus competidores como Depau Dental publican articulos con precios y guias que capturan a SUS pacientes.</p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">CERO datos estructurados (Schema)</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Los "datos estructurados" son un codigo especial que le dice a Google: "somos una clinica dental, estamos en esta direccion, ofrecemos estos servicios, estos son nuestros doctores". Sin esto, Google no puede mostrar su clinica con estrellas, horarios ni telefono en los resultados de busqueda. <strong class="text-white">Todos sus competidores ya lo tienen.</strong></p>
                </div>
            </div>
        </div>
        <div class="kpi-card alert-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-red-400 font-bold text-sm mb-1">Sitemap con 1 sola URL desde 2016</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">El "sitemap" es como el mapa de su sitio web que usted le entrega a Google para que sepa que paginas existen. El suyo solo tiene 1 pagina registrada (la principal) y no se ha actualizado desde junio de 2016. Google no puede descubrir sus ~70 paginas de servicios, doctores y blog.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Data highlights -->
    <h2 class="text-white text-lg font-bold mb-4">Los Numeros Reales de Su Sitio Web</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-white">7,779</p>
            <p class="text-slate-400 text-xs mt-1">Usuarios totales (3 anos)</p>
            <p class="text-slate-500 text-[10px] mt-0.5">Abr 2023 — Abr 2026</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-yellow-400">~216</p>
            <p class="text-slate-400 text-xs mt-1">Usuarios por mes</p>
            <p class="text-slate-500 text-[10px] mt-0.5">Promedio mensual</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-red-400">43</p>
            <p class="text-slate-400 text-xs mt-1">Clics organicos totales</p>
            <p class="text-slate-500 text-[10px] mt-0.5">Ene 2025 — Abr 2026 (15 meses)</p>
        </div>
        <div class="kpi-card glass rounded-xl p-5 text-center">
            <p class="text-2xl font-extrabold text-red-400">1.2%</p>
            <p class="text-slate-400 text-xs mt-1">CTR organico</p>
            <p class="text-slate-500 text-[10px] mt-0.5">Promedio industria: 3-5%</p>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #f59e0b;">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h4 class="text-amber-400 font-bold text-sm mb-1">Que significan estos numeros?</h4>
                <p class="text-slate-300 text-sm leading-relaxed">En 15 meses, solo 43 personas llegaron a su sitio desde Google por busquedas organicas. Eso es menos de 3 personas al mes desde Google. Mientras tanto, keywords como "implantes dentales Quito" tienen entre 1,200 y 1,800 busquedas mensuales. <strong class="text-white">Usted esta capturando menos del 0.2% del trafico disponible.</strong></p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 2: TRAFICO Y BUSQUEDAS ==================== -->
<div id="tab-trafico" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Como Lo Buscan en Google</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Estos son los terminos reales que la gente escribe en Google y que muestran su sitio como resultado. Los datos vienen directamente de Google Search Console (enero 2025 a abril 2026). El problema: <strong class="text-white">casi el 100% de las busquedas son por su nombre de marca.</strong> Nadie lo encuentra cuando busca servicios dentales genericos.</p>
        </div>
    </div>

    <!-- Top queries -->
    <h3 class="text-white font-bold mb-3">Top Busquedas Que Muestran Su Sitio</h3>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que buscan en Google</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Impresiones</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Clics</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Posicion</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que significa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"odonto advance"</td>
                        <td class="px-4 py-3 text-center text-slate-300">719</td>
                        <td class="px-4 py-3 text-center text-green-400 font-bold">23</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-bold">4.3</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Busqueda de marca. Solo lo buscan quienes ya lo conocen.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"odontoadvance"</td>
                        <td class="px-4 py-3 text-center text-slate-300">480</td>
                        <td class="px-4 py-3 text-center text-green-400 font-bold">6</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400 font-bold">3.5</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Variacion de marca. CTR bajo (1.25%).</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"odontologia"</td>
                        <td class="px-4 py-3 text-center text-slate-300">227</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">3.8</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Aparece pero nadie hace clic. Termino demasiado generico.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"dental sanitas"</td>
                        <td class="px-4 py-3 text-center text-slate-300">141</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">5.6</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Oportunidad ENORME. 141 impresiones pero 0 clics. Landing de Ecua Sanitas no optimizada.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"advance"</td>
                        <td class="px-4 py-3 text-center text-slate-300">271</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-bold">3.7</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Termino ambiguo, no es trafico util.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"odontologia quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">29</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">10.5</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Pagina 2 de Google. Con SEO basico pasaria a pagina 1.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"dental advance la kennedy"</td>
                        <td class="px-4 py-3 text-center text-slate-300">29</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">7.0</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Buscan OTRO "Advance" en La Kennedy. Google confunde.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"dentista quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">18</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">9.9</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Keyword clave con 1,000+ busquedas/mes. Posicion 10 = al final de pagina 1.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"ortodoncia"</td>
                        <td class="px-4 py-3 text-center text-slate-300">14</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-bold">2.6</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Buena posicion pero termino generico sin "Quito". Necesita pagina optimizada.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">"invisalign"</td>
                        <td class="px-4 py-3 text-center text-slate-300">6</td>
                        <td class="px-4 py-3 text-center text-red-400">0</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400 font-bold">5.8</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Pocas impresiones porque no tiene pagina dedicada a Invisalign.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Top pages -->
    <h3 class="text-white font-bold mb-3">Paginas Mas Visitadas de Su Sitio (3 anos)</h3>
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
                        <td class="px-5 py-3 text-white font-medium text-xs">Homepage</td>
                        <td class="px-4 py-3 text-center text-slate-300">3,941</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">59%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Alto rebote. 6 de cada 10 se van sin interactuar.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Contactos</td>
                        <td class="px-4 py-3 text-center text-slate-300">1,357</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">54%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Buena intencion de los visitantes, pero mas de la mitad no completa el formulario.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Blog: "Musculos al besar"</td>
                        <td class="px-4 py-3 text-center text-slate-300">1,095</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400">81%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Trafico viral pero INUTIL: no son pacientes, solo curiosos. 81% de rebote.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Equident (seguros)</td>
                        <td class="px-4 py-3 text-center text-slate-300">937</td>
                        <td class="px-4 py-3 text-center"><span class="text-red-400">71%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Pacientes de Equident buscan donde atenderse. Oportunidad ENORME no explotada.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Servicios</td>
                        <td class="px-4 py-3 text-center text-slate-300">906</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">34%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">El mejor rebote del sitio. Pacientes interesados en servicios. Necesita paginas individuales.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Ecua Sanitas</td>
                        <td class="px-4 py-3 text-center text-slate-300">681</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">54%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Mas pacientes de seguros. Con landing optimizada podria triplicar conversiones.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium text-xs">Nosotros</td>
                        <td class="px-4 py-3 text-center text-slate-300">593</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">31%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Buen engagement. Pacientes evaluando confianza antes de agendar.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium text-xs">Sedacion consciente</td>
                        <td class="px-4 py-3 text-center text-slate-300">438</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">62%</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Su contenido ESTRELLA. 438 vistas en un solo post. Con SEO optimizado puede ser pagina 1.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Insight box -->
    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h4 class="text-green-400 font-bold text-sm mb-1">Hallazgo clave: las paginas de seguros son su MINA DE ORO</h4>
                <p class="text-slate-300 text-sm leading-relaxed">Entre Equident (937 vistas) y Ecua Sanitas (681 vistas), las paginas de seguros suman <strong class="text-white">1,618 visitas</strong> — casi tantas como su homepage. Estos son pacientes que YA tienen seguro dental y buscan donde atenderse. Si optimizamos estas paginas con un boton de WhatsApp, informacion de cobertura, y un formulario de cita, cada pagina de seguro puede convertirse en una fuente constante de pacientes nuevos. <strong class="text-white">Ningun competidor tiene paginas dedicadas por aseguradora.</strong></p>
            </div>
        </div>
    </div>

    <!-- Keywords opportunity -->
    <h3 class="text-white font-bold mb-3">Keywords Que Deberia Estar Capturando (y No Lo Hace)</h3>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que buscan en Google</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Busquedas/mes</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Dificultad</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Aparece OdontoAdvance?</th>
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Pacientes potenciales/mes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"implantes dentales quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">1,200-1,800</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">Media</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">15-25 pacientes nuevos/mes (ticket $800-$3,000)</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"ortodoncia quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">800-1,200</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">Media</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">10-20 pacientes nuevos/mes (ticket $1,200-$3,500)</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"diseno de sonrisa quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">600-900</td>
                        <td class="px-4 py-3 text-center"><span class="text-yellow-400">Media</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">8-15 pacientes nuevos/mes (ticket $1,500-$5,000)</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"blanqueamiento dental quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">500-800</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">Baja</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">8-12 pacientes nuevos/mes (ticket $150-$400)</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"dentista ecuasanitas quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">300-500</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">Baja</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">5-10 pacientes con seguro/mes. Conversion alta.</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">"sedacion dental quito"</td>
                        <td class="px-4 py-3 text-center text-slate-300">150-250</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">Baja</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-yellow-500/15 text-yellow-400">Parcial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">3-5 pacientes premium/mes. Su DIFERENCIADOR.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">"precio implantes dentales ecuador"</td>
                        <td class="px-4 py-3 text-center text-slate-300">500-800</td>
                        <td class="px-4 py-3 text-center"><span class="text-green-400">Baja</span></td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/15 text-red-400">No</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">Pacientes comparando precios. Un articulo bien optimizado puede capturar 20+/mes.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-slate-700/30">
            <p class="text-slate-500 text-[10px] leading-relaxed">*Estimaciones de volumen basadas en Google Keyword Planner y Semrush para el mercado ecuatoriano. Calculo de pacientes potenciales: CTR pagina 1 = 27% (fuente: Backlinko 2023), tasa de conversion clinica dental = 5-8% (fuente: WordStream Industry Benchmarks 2024).</p>
        </div>
    </div>

    <!-- Revenue estimation -->
    <div class="alert-card glass rounded-2xl p-6 mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <h3 class="text-red-400 font-bold text-lg mb-1">Ingresos que esta perdiendo cada mes</h3>
                <p class="text-white text-2xl font-extrabold">$8,000 — $35,000 mensuales</p>
                <p class="text-slate-400 text-sm mt-1">Si OdontoAdvance apareciera en pagina 1 para solo 5 keywords de servicio, podria captar entre 40 y 80 pacientes nuevos al mes. Con un ticket promedio de $200-$500 por primera consulta + tratamiento, esto representa entre $8,000 y $35,000 en ingresos adicionales que hoy van a su competencia.</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 3: COMPETENCIA ==================== -->
<div id="tab-competencia" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Sus Competidores en Internet</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Analizamos las clinicas dentales en Quito que compiten directamente con OdontoAdvance en Google. Estas son las que aparecen cuando sus pacientes potenciales buscan servicios dentales. <strong class="text-white">La buena noticia: ninguna tiene una estrategia digital COMPLETA.</strong> Hay una ventana de oportunidad clara.</p>
        </div>
    </div>

    <!-- Competitor table -->
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left px-5 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Que tienen</th>
                        <th class="text-center px-4 py-4 text-red-400 font-semibold text-xs uppercase tracking-wider">OdontoAdvance</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Depau Dental</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Smile Design</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Dental 360</th>
                        <th class="text-center px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Zirconia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Web moderna</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">2016</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Next.js</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Moderna</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Moderna</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Moderna</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Blog SEO activo</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">Muerto (2018)</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Activo</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">5 posts</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Google Analytics</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">Muerto</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">GA4</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">GA4</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">GA4</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">GA4</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Schema / datos estructurados</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Si</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Parcial</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Si</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Si</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Resenas Google (15+)</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No integradas</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">5 estrellas</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Parcial</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">4.9/5</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Parcial</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Redes sociales activas</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">Links rotos</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">IG</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">TikTok+YT</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">IG</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">IG</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Emergencias 24/7</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">Si</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Sedacion dental</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">SI</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white font-medium">Convenios con seguros (7+)</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">7 seguros</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No muestra</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No muestra</td>
                        <td class="px-4 py-3 text-center text-yellow-400 text-xs">Algunos</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No muestra</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white font-medium">Sitio bilingue</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-red-400 text-xs">No</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs">EN/ES</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SWOT highlight -->
    <h3 class="text-white font-bold mb-3">Ventajas Competitivas No Explotadas de OdontoAdvance</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">Sedacion dental: su arma secreta</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">NINGUN competidor principal ofrece sedacion dental. Este servicio atrae pacientes premium (que pagan mas por comodidad) y diferencia a OdontoAdvance de TODA la competencia. Con una pagina optimizada y contenido sobre "odontologia sin dolor Quito", puede dominar este nicho.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">7 aseguradoras = 7 landing pages sin competencia</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Equivida, Ecua Sanitas, Equident, Salud SA, AiG, BMI, Supermaxi. Crear una landing page optimizada para cada una ("dentista convenio Equivida Quito", "dentista Ecua Sanitas norte Quito") son 7 paginas con busquedas de cola larga que NADIE esta atacando. Los datos muestran que estas paginas ya reciben trafico.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">15+ anos de experiencia = E-E-A-T para Google</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">E-E-A-T (Experiencia, Expertise, Autoridad, Confianza) es lo que Google usa para decidir que sitios de salud mostrar primero. OdontoAdvance tiene 15+ anos, 5 especialistas con universidades de prestigio, y multiples especialidades. Solo hay que comunicarlo correctamente.</p>
                </div>
            </div>
        </div>
        <div class="success-card glass rounded-xl p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <h4 class="text-green-400 font-bold text-sm mb-1">"Odontologia sin dolor" = posicionamiento unico</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">Su slogan ya es perfecto para SEO. "Odontologia sin dolor Quito" tiene busquedas mensuales y NADIE lo domina. Combinado con la sedacion dental, OdontoAdvance puede ser sinonimo de "ir al dentista sin miedo" en Quito.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Presencia digital score -->
    <h3 class="text-white font-bold mb-3">Puntuacion de Presencia Digital</h3>
    <div class="glass rounded-2xl p-6 mb-8">
        <div class="space-y-4">
            <div>
                <div class="flex justify-between mb-1"><span class="text-slate-400 text-xs">Depau Dental</span><span class="text-white text-xs font-bold">9/10</span></div>
                <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-green-500 h-2 rounded-full" style="width: 90%"></div></div>
            </div>
            <div>
                <div class="flex justify-between mb-1"><span class="text-slate-400 text-xs">Dental 360</span><span class="text-white text-xs font-bold">8/10</span></div>
                <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-green-500 h-2 rounded-full" style="width: 80%"></div></div>
            </div>
            <div>
                <div class="flex justify-between mb-1"><span class="text-slate-400 text-xs">Smile Design</span><span class="text-white text-xs font-bold">7.5/10</span></div>
                <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-yellow-500 h-2 rounded-full" style="width: 75%"></div></div>
            </div>
            <div>
                <div class="flex justify-between mb-1"><span class="text-slate-400 text-xs">Zirconia Dental</span><span class="text-white text-xs font-bold">7/10</span></div>
                <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-yellow-500 h-2 rounded-full" style="width: 70%"></div></div>
            </div>
            <div>
                <div class="flex justify-between mb-1"><span class="text-slate-400 text-xs">DentalGreen</span><span class="text-white text-xs font-bold">6.5/10</span></div>
                <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-yellow-500 h-2 rounded-full" style="width: 65%"></div></div>
            </div>
            <div>
                <div class="flex justify-between mb-1"><span class="text-red-400 text-xs font-bold">OdontoAdvance</span><span class="text-red-400 text-xs font-bold">4/10</span></div>
                <div class="w-full bg-slate-700/50 rounded-full h-2"><div class="bg-red-500 h-2 rounded-full" style="width: 40%"></div></div>
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
                <p class="text-slate-400 text-sm leading-relaxed">Cuando alguien busca en Google "cuanto cuesta un implante dental en Quito", si OdontoAdvance tiene un articulo sobre ese tema, Google lo muestra como resultado. La persona lee, conoce su clinica, y agenda una cita. <strong class="text-white">Cada articulo es como un vendedor que trabaja 24/7 sin sueldo, atrayendo pacientes nuevos constantemente.</strong></p>
            </div>
        </div>
    </div>

    <!-- 3 types -->
    <h3 class="text-white font-bold mb-3">Los 3 Tipos de Articulos y Para Que Sirven</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #22c55e;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400 mb-2">Transaccional</span>
            <p class="text-slate-400 text-xs leading-relaxed">El paciente ya quiere <strong class="text-white">AGENDAR</strong>. Busca precios, donde ir, dentistas recomendados. Estos articulos generan citas directas.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #f59e0b;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-500/15 text-amber-400 mb-2">Comercial</span>
            <p class="text-slate-400 text-xs leading-relaxed">El paciente esta <strong class="text-white">COMPARANDO</strong>. Busca que es mejor, cuanto cuesta, diferencias. Estos articulos posicionan a OdontoAdvance como la opcion inteligente.</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-left: 4px solid #3b82f6;">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-blue-500/15 text-blue-400 mb-2">Informativo</span>
            <p class="text-slate-400 text-xs leading-relaxed">El paciente quiere <strong class="text-white">APRENDER</strong>. Busca guias, explicaciones. Estos articulos atraen mucho trafico y establecen autoridad medica.</p>
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
                        <th class="text-left px-4 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Keyword objetivo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">1</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Cuanto Cuestan los Implantes Dentales en Quito Ecuador [2026]</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">implantes dentales precio quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">2</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Precio de la Ortodoncia en Quito: Guia con Costos Reales</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">precio ortodoncia quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">3</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Diseno de Sonrisa en Quito: Que Incluye, Precios y Resultados</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">diseno de sonrisa quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">4</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Blanqueamiento Dental en Quito: Tipos, Precios y Cuanto Dura</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">blanqueamiento dental quito precio</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">5</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Sedacion Dental en Quito: Odontologia Sin Dolor Para Pacientes Ansiosos</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">sedacion dental quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">6</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Carillas Dentales en Quito: Resina vs Porcelana vs Zirconio [Precios]</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">carillas dentales quito precio</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">7</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Endodoncia en Quito: Que Es, Cuanto Cuesta y Duele?</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">endodoncia quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">8</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Ortodoncia Invisible en Quito: Invisalign y Alineadores Transparentes</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">ortodoncia invisible quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">9</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Dentista con Ecuasanitas en Quito: Cobertura y Servicios en OdontoAdvance</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">dentista ecuasanitas quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">10</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Las 7 Mejores Clinicas Dentales en Quito Norte [Guia 2026]</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">clinica dental quito norte</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">11</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Implantes Dentales: Todo lo que Debes Saber Antes de Decidirte</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">implantes dentales ecuador</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">12</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Brackets vs Invisalign: Cual es Mejor para Ti? [Comparativa 2026]</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">brackets vs invisalign</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">13</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Emergencia Dental en Quito: Que Hacer y Donde Ir</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">emergencia dental quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">14</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Periodoncia: Por Que Sangran tus Encias y Como Tratarlo</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">periodoncia quito sangrado encias</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">15</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Odontopediatria en Quito: Guia para la Primera Visita de tu Hijo</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">odontopediatra quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">16</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">All-on-4 en Quito: Todos tus Dientes en un Solo Dia [Precio]</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-500/15 text-green-400">Transaccional</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">all on 4 quito precio</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">17</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Coronas de Zirconio vs Porcelana: Cual Dura Mas?</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">coronas de zirconio precio quito</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">18</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Seguros Dentales en Ecuador: Que Cubren y Cuales Acepta OdontoAdvance</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/15 text-blue-400">Informativo</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">seguros dentales ecuador cobertura</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">19</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">Rehabilitacion Oral Completa: Cuando Necesitas Reconstruir tu Sonrisa</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">rehabilitacion oral quito</td>
                    </tr>
                    <tr>
                        <td class="px-3 py-3 text-center text-slate-500 text-xs">20</td>
                        <td class="px-4 py-3 text-white text-xs font-medium">10 Preguntas que Debes Hacer Antes de Elegir tu Dentista en Quito</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/15 text-amber-400">Comercial</span></td>
                        <td class="px-4 py-3 text-slate-400 text-xs">mejor dentista quito</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Expected results -->
    <div class="glass rounded-2xl p-6 mb-8" style="border-left: 4px solid #22c55e;">
        <h4 class="text-green-400 font-bold text-sm mb-3">Resultados Esperados del Plan de Contenido (6 meses)</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-lighter rounded-xl p-4 text-center">
                <p class="text-2xl font-extrabold text-green-400">8-12</p>
                <p class="text-slate-400 text-xs">Keywords en pagina 1 de Google</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <p class="text-2xl font-extrabold text-green-400">800-1,200</p>
                <p class="text-slate-400 text-xs">Visitas organicas/mes (hoy: ~50)</p>
            </div>
            <div class="glass-lighter rounded-xl p-4 text-center">
                <p class="text-2xl font-extrabold text-green-400">3-5</p>
                <p class="text-slate-400 text-xs">Featured snippets capturados</p>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TAB 5: PROPUESTA E INVERSION ==================== -->
<div id="tab-inversion" class="tab-content">

    <h2 class="text-white text-lg font-bold mb-2">Propuesta: Rediseno Web + Plan SEO</h2>
    <div class="glass-accent rounded-2xl p-6 mb-6">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            </div>
            <p class="text-slate-400 text-sm leading-relaxed">Basado en el diagnostico completo, le proponemos un plan en dos fases: primero un <strong class="text-white">rediseno web completo</strong> enfocado en SEO y conversiones (para que Google lo encuentre y los pacientes agenden), y despues un <strong class="text-white">plan de contenido SEO mensual</strong> para dominar las busquedas dentales en Quito.</p>
        </div>
    </div>

    <!-- FASE 1: Rediseno Web -->
    <h3 class="text-white font-bold mb-3">Fase 1: Rediseno Web Completo — $480</h3>
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="flex items-center gap-3 mb-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">Pago unico</span>
            <span class="text-slate-500 text-xs">Entrega: 2-3 semanas</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="glass-lighter rounded-xl p-4">
                <h5 class="text-white font-semibold text-sm mb-3">Diseno y estructura</h5>
                <ul class="space-y-2">
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Rediseno visual moderno y profesional (WordPress + Elementor Pro)
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Pagina individual para cada servicio (12 paginas optimizadas con H1, keywords, CTAs)
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Landing page para cada aseguradora (7 paginas: Ecuasanitas, Equident, Salud SA, etc.)
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Perfiles profesionales de cada doctor con credenciales, universidad y foto
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Seccion de testimonios y resenas de Google integradas
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        100% responsive y optimizado para movil
                    </li>
                </ul>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <h5 class="text-white font-semibold text-sm mb-3">SEO tecnico incluido</h5>
                <ul class="space-y-2">
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Titles y meta descriptions optimizados para cada pagina
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Schema JSON-LD (Dentist, LocalBusiness, FAQPage, MedicalOrganization)
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Sitemap XML nuevo con todas las URLs + envio a Google Search Console
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Google Analytics 4 (GA4) + Google Tag Manager instalados
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Open Graph tags para redes sociales
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Robots.txt y canonical tags correctos
                    </li>
                </ul>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <h5 class="text-white font-semibold text-sm mb-3">Conversiones y contacto</h5>
                <ul class="space-y-2">
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        WhatsApp personalizado por servicio ("Hola, me interesa [servicio]...")
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Telefono click-to-call visible en todas las paginas
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Formularios de contacto con selector de servicio y aseguradora
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        CTAs estrategicos en cada pagina de servicio
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Google Business Profile optimizado con todos los servicios
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Facebook Pixel instalado para remarketing futuro
                    </li>
                </ul>
            </div>
            <div class="glass-lighter rounded-xl p-4">
                <h5 class="text-white font-semibold text-sm mb-3">Rendimiento y seguridad</h5>
                <ul class="space-y-2">
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        WordPress actualizado a ultima version estable
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Imagenes optimizadas en WebP con lazy loading
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Cache configurado correctamente
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Certificado SSL renovado correctamente
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Limpieza de plugins y temas no utilizados
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Redirecciones 301 de URLs antiguas a nuevas
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-gradient-to-r from-blue-600/20 to-cyan-600/20 rounded-xl p-5 border border-blue-500/20">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white font-bold text-lg">Inversion: $480</p>
                    <p class="text-slate-400 text-xs">Pago unico. Incluye todo lo listado arriba.</p>
                </div>
                <div class="text-right">
                    <p class="text-slate-400 text-xs">Resultado esperado del rediseno:</p>
                    <p class="text-green-400 font-bold text-sm">Score de 25/100 a 70+/100</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FASE 2: Plan SEO -->
    <h3 class="text-white font-bold mb-3">Fase 2: Plan SEO + Contenido Mensual</h3>
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Option A -->
            <div class="glass-lighter rounded-xl p-5 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-green-500/20 text-green-400 text-[10px] font-bold px-3 py-1 rounded-bl-lg">AHORRA $200</div>
                <h4 class="text-white font-bold mb-1">Plan Semestral</h4>
                <p class="text-3xl font-extrabold text-white mb-1">$880</p>
                <p class="text-slate-400 text-xs mb-4">Pago unico por 6 meses</p>
                <ul class="space-y-2 mb-4">
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        20 articulos optimizados/mes (120 total)
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        SEO on-page continuo y optimizacion
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Imagenes profesionales incluidas (Pexels/Unsplash)
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Schema markup en cada articulo
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Reportes mensuales de progreso
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        WhatsApp personalizado por articulo
                    </li>
                </ul>
                <p class="text-green-400 text-xs font-bold">= $147/mes (ahorra $200 vs mensual)</p>
            </div>

            <!-- Option B -->
            <div class="glass-lighter rounded-xl p-5">
                <h4 class="text-white font-bold mb-1">Plan Mensual</h4>
                <p class="text-3xl font-extrabold text-white mb-1">$180<span class="text-lg text-slate-400">/mes</span></p>
                <p class="text-slate-400 text-xs mb-4">x 6 meses ($1,080 total)</p>
                <ul class="space-y-2 mb-4">
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        20 articulos optimizados/mes
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Todo lo incluido en el plan semestral
                    </li>
                    <li class="text-slate-400 text-xs flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Flexibilidad de pago mensual
                    </li>
                </ul>
                <p class="text-slate-400 text-xs">Compromiso minimo: 6 meses</p>
            </div>
        </div>
    </div>

    <!-- ROI calculation -->
    <h3 class="text-white font-bold mb-3">Retorno de Inversion Estimado</h3>
    <div class="glass rounded-2xl p-6 mb-6">
        <div class="glass-accent rounded-xl p-5 mb-4">
            <h4 class="text-blue-400 font-bold text-sm mb-2">Como calculamos el retorno</h4>
            <p class="text-slate-400 text-xs leading-relaxed mb-2">
                <strong class="text-white">Formula:</strong> Keywords posicionadas x Busquedas mensuales x CTR pagina 1 (27%, fuente: Backlinko 2023) x Tasa de conversion clinica dental (5-8%, fuente: WordStream Industry Benchmarks 2024) x Ticket promedio por tratamiento
            </p>
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
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">3-5</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">8-12</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">15-25</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white text-xs">Visitas organicas/mes</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">200-400</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">800-1,200</td>
                        <td class="px-4 py-3 text-center text-slate-300 text-xs">2,000-4,000</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="px-5 py-3 text-white text-xs">Pacientes nuevos estimados/mes</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">10-20</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">40-60</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">100-200</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-white text-xs">Ingresos estimados/mes</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">$2,000-$6,000</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">$8,000-$18,000</td>
                        <td class="px-4 py-3 text-center text-green-400 text-xs font-bold">$20,000-$60,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3 px-5">
            <p class="text-slate-500 text-[10px]">*Ticket promedio clinica dental Quito: $150-$300 primera consulta + tratamiento (fuente: promedios mercado Ecuador 2024-2026). Implantes/ortodoncia/diseno de sonrisa tienen tickets de $800-$5,000.</p>
        </div>
    </div>

    <!-- Summary pricing -->
    <h3 class="text-white font-bold mb-3">Resumen de Inversion</h3>
    <div class="glass rounded-2xl overflow-hidden mb-6">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-700/50">
                    <th class="text-left px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Concepto</th>
                    <th class="text-right px-6 py-4 text-slate-400 font-semibold text-xs uppercase tracking-wider">Inversion</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Rediseno Web Completo (Fase 1)</td>
                    <td class="px-6 py-4 text-right text-white font-bold">$480</td>
                </tr>
                <tr class="border-b border-slate-700/30">
                    <td class="px-6 py-4 text-white font-medium">Plan SEO 6 meses — pago unico (Fase 2)</td>
                    <td class="px-6 py-4 text-right text-white font-bold">$880</td>
                </tr>
                <tr class="border-b border-slate-700/30 bg-blue-500/5">
                    <td class="px-6 py-4 text-blue-400 font-bold">Total con plan semestral</td>
                    <td class="px-6 py-4 text-right text-blue-400 font-extrabold text-lg">$1,360</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-slate-400">Alternativa: Rediseno + plan mensual</td>
                    <td class="px-6 py-4 text-right text-slate-400">$480 + $180/mes x 6</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- CTA Final -->
    <div class="bg-gradient-to-r from-blue-600/20 via-cyan-600/15 to-blue-600/20 rounded-2xl p-8 border border-blue-500/20 text-center mb-8">
        <h3 class="text-white text-xl font-bold mb-3">Listo para que su clinica aparezca en Google?</h3>
        <p class="text-slate-400 text-sm mb-4 max-w-xl mx-auto">Contactenos para agendar una reunion donde resolveremos todas sus dudas y definiremos los proximos pasos para llevar a OdontoAdvance al primer lugar de Google en Quito.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/593979078672?text=Hola%2C%20vi%20el%20informe%20de%20marketing%20digital%20y%20me%20interesa%20la%20propuesta%20de%20redise%C3%B1o%20%2B%20SEO" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-green-600 hover:bg-green-500 text-white font-semibold text-sm transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Escribir por WhatsApp
            </a>
            <a href="tel:+59322278730" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-700/50 hover:bg-slate-600/50 text-white font-semibold text-sm transition-all border border-slate-600/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Llamar: (02) 2278 730
            </a>
        </div>
    </div>

</div>

</main>

<!-- FOOTER -->
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

// Score doughnut chart
const ctx = document.getElementById('scoreChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [25, 75],
            backgroundColor: ['#ef4444', 'rgba(51, 65, 85, 0.4)'],
            borderWidth: 0,
            cutout: '78%'
        }]
    },
    options: {
        responsive: false,
        plugins: { legend: { display: false }, tooltip: { enabled: false } },
        animation: { animateRotate: true, duration: 1500 }
    }
});
</script>
</body>
</html>
