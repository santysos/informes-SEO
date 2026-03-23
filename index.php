<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe SEO Marzo 2026 — Comercial Hidrobo & OKCars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { sans: ['Inter', 'sans-serif'] },
                colors: {
                    brand: { 50: '#eff6ff', 100: '#dbeafe', 200: '#bfdbfe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8', 800: '#1e40af', 900: '#1e3a5f' }
                }
            }
        }
    }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(30, 41, 59, 0.5); backdrop-filter: blur(12px); }
        .gradient-text { background: linear-gradient(135deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .stat-card { transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.3); }
        .tab-btn.active { background: rgba(59, 130, 246, 0.15); color: #3b82f6; border-color: #3b82f6; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .progress-bar { transition: width 1s ease-in-out; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-200">

<!-- Header -->
<header class="border-b border-slate-800/50 sticky top-0 z-50 glass">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-brand-600 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <div>
                    <h1 class="text-sm font-semibold text-white">Informe SEO & CRO</h1>
                    <p class="text-xs text-slate-400">Marzo 2026 — Mes Inicial</p>
                </div>
            </div>
            <div class="flex items-center gap-4 no-print">
                <span class="text-xs text-slate-500">Comercial Hidrobo & OKCars</span>
                <a href="logout.php" class="text-xs text-slate-400 hover:text-white transition">Salir</a>
            </div>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Hero Section -->
    <section class="mb-12">
        <div class="rounded-2xl border border-slate-800/50 glass p-8 md:p-12">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <p class="text-sm font-medium text-brand-500 mb-2">PLAN ESTRATEGICO SEO + CRO</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Comercial Hidrobo & OKCars</h2>
                    <p class="text-slate-400 max-w-xl">Plan de 6 meses (Abril - Septiembre 2026) para convertir trafico organico en leads cualificados. Este informe presenta el diagnostico inicial y la estrategia completa.</p>
                </div>
                <div class="flex flex-col gap-2 text-right shrink-0">
                    <span class="text-xs text-slate-500">Preparado por</span>
                    <span class="text-sm font-semibold text-white">Creative Web</span>
                    <span class="text-xs text-slate-500">23 de Marzo, 2026</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Tabs -->
    <div class="mb-8 no-print">
        <div class="flex flex-wrap gap-2">
            <button onclick="switchTab('resumen')" class="tab-btn active px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Resumen Ejecutivo</button>
            <button onclick="switchTab('ch')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Comercial Hidrobo</button>
            <button onclick="switchTab('ok')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">OKCars</button>
            <button onclick="switchTab('plan')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Plan 6 Meses</button>
            <button onclick="switchTab('mes1')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Mes 1: Abril</button>
            <button onclick="switchTab('contenido')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Contenido: Abril y Mayo</button>
        </div>
    </div>

    <!-- TAB: Resumen Ejecutivo -->
    <div id="tab-resumen" class="tab-content active space-y-8">

        <!-- Intro explicativa -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
            <h3 class="text-base font-semibold text-white mb-2">Que es este informe?</h3>
            <p class="text-sm text-slate-400 leading-relaxed">Este documento presenta el estado actual de las dos paginas web de Comercial Hidrobo (<strong class="text-slate-300">comercialhidrobo.com</strong> y <strong class="text-slate-300">okcars.ec</strong>) y la estrategia que vamos a ejecutar durante los proximos 6 meses. El objetivo principal es que las personas que visitan la pagina web <strong class="text-slate-300">se conviertan en clientes reales</strong>: que agenden citas en el taller, soliciten cotizaciones de repuestos, o contacten para comprar vehiculos.</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Los datos que aparecen aqui fueron obtenidos de <strong class="text-slate-300">Google Analytics</strong> (la herramienta que mide cuantas personas visitan la pagina) y <strong class="text-slate-300">Google Search Console</strong> (que muestra que busca la gente en Google para llegar al sitio).</p>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Visitas totales/mes CH</p>
                <p class="text-3xl font-bold text-white">5,300</p>
                <p class="text-xs text-emerald-400 mt-1">+430% vs antes del SEO</p>
                <p class="text-xs text-slate-500 mt-1">Todas las visitas al sitio web</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Visitas organicas/mes CH</p>
                <p class="text-3xl font-bold text-white">3,100</p>
                <p class="text-xs text-emerald-400 mt-1">59% del trafico total</p>
                <p class="text-xs text-slate-500 mt-1">Solo las que llegan desde Google</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Leads/mes CH</p>
                <p class="text-3xl font-bold text-white">8</p>
                <p class="text-xs text-amber-400 mt-1">Meta: 25-30/mes</p>
                <p class="text-xs text-slate-500 mt-1">Formularios enviados + contactos</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Visitas/mes OKCars</p>
                <p class="text-3xl font-bold text-white">114</p>
                <p class="text-xs text-amber-400 mt-1">Meta: 1,000/mes</p>
                <p class="text-xs text-slate-500 mt-1">Sitio nuevo, aun sin SEO</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Leads/mes OKCars</p>
                <p class="text-3xl font-bold text-white">0</p>
                <p class="text-xs text-red-400 mt-1">Sin medicion configurada</p>
                <p class="text-xs text-slate-500 mt-1">No se mide quien contacta</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Citas confirmadas taller</p>
                <p class="text-3xl font-bold text-white">2-3</p>
                <p class="text-xs text-amber-400 mt-1">Meta: 8-10/mes</p>
                <p class="text-xs text-slate-500 mt-1">Clientes que llegan al taller</p>
            </div>
        </div>

        <!-- Explanation box -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
            <h4 class="text-sm font-semibold text-brand-500 mb-2">Que significan estos numeros?</h4>
            <div class="space-y-2 text-sm text-slate-400">
                <p><strong class="text-slate-300">Visitas totales (5,300/mes):</strong> Es el numero completo de personas que entran a la pagina web cada mes, sin importar como llegaron (Google, redes sociales, escribiendo la direccion directamente, etc.).</p>
                <p><strong class="text-slate-300">Visitas organicas (3,100/mes):</strong> Son las personas que llegaron a la pagina web buscando en Google. Es decir, escribieron algo como "renault duster precio ecuador" y Google les mostro comercialhidrobo.com. Estas visitas son las mas valiosas porque son GRATUITAS — no se paga nada por cada clic, a diferencia de la publicidad pagada.</p>
                <p><strong class="text-slate-300">Leads:</strong> Un "lead" es cuando alguien deja sus datos de contacto (envia un formulario, escribe por WhatsApp, o llama). Es decir, pasa de ser un visitante anonimo a ser un contacto real con nombre y telefono.</p>
            </div>
        </div>

        <!-- Diagnosis -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Diagnostico General</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">comercialhidrobo.com</h4>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Trafico organico solido: 3,100 usuarios/mes (+210% vs inicio)</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Buen posicionamiento de marca: posicion #1 para "comercial hidrobo"</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-red-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300"><strong class="text-red-400">Embudo roto:</strong> el formulario de citas solo recibe 18 visitas/mes (0.6% del trafico)</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-red-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Posts con alto trafico generan 0 conversiones (sin CTAs hacia formularios)</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">okcars.ec <span class="text-xs text-slate-500 font-normal">(aun sin trabajo de SEO)</span></h4>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-amber-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Sitio nuevo sin SEO: solo 114 usuarios/mes (es normal, aun no se ha trabajado)</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-amber-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">No se miden los contactos (Google Analytics instalado pero sin configurar eventos de formulario/WhatsApp)</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-amber-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Sin blog ni articulos — Google no tiene contenido para mostrar en resultados de busqueda</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-amber-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Titulos de pagina genericos — no ayudan a posicionar en Google</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Funnel Problem -->
        <div class="rounded-xl border border-amber-500/20 bg-amber-500/5 p-6">
            <h3 class="text-lg font-semibold text-amber-400 mb-3">El problema principal: las visitas no se convierten en clientes</h3>
            <p class="text-sm text-slate-400 mb-4">Imaginen un local comercial donde entran 5,300 personas al mes, pero solo 5-6 piden informacion y solo 2-3 terminan comprando. Eso es exactamente lo que pasa con la pagina web. El trafico es excelente, pero no hay caminos claros que lleven al visitante a tomar accion (agendar una cita, pedir una cotizacion).</p>
            <div class="grid md:grid-cols-3 gap-6 mt-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-white">5,300</div>
                    <div class="text-sm text-slate-400 mt-1">Visitas totales/mes</div>
                    <div class="w-full h-2 bg-slate-700 rounded-full mt-3">
                        <div class="h-2 bg-brand-500 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-amber-400">18</div>
                    <div class="text-sm text-slate-400 mt-1">Ven el formulario de citas/mes</div>
                    <div class="w-full h-2 bg-slate-700 rounded-full mt-3">
                        <div class="h-2 bg-amber-500 rounded-full" style="width: 0.6%"></div>
                    </div>
                    <div class="text-xs text-amber-400 mt-1">Solo 0.6% del trafico</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-red-400">5-6</div>
                    <div class="text-sm text-slate-400 mt-1">Envian el formulario/mes</div>
                    <div class="w-full h-2 bg-slate-700 rounded-full mt-3">
                        <div class="h-2 bg-red-500 rounded-full" style="width: 0.2%"></div>
                    </div>
                    <div class="text-xs text-red-400 mt-1">Tasa de conversion: 0.19%</div>
                </div>
            </div>
            <div class="mt-6 p-4 rounded-lg bg-slate-800/50 border border-slate-700/50">
                <p class="text-sm text-slate-300"><strong class="text-white">Dato clave:</strong> Cuando alguien SI llega al formulario de citas, el 14% lo completa — eso es muy bueno. El problema NO es el formulario, es que <strong class="text-white">casi nadie lo encuentra</strong>. De las 5,300 visitas mensuales, solo 18 llegan a la pagina del formulario. Los articulos del blog atraen miles de visitantes, pero no tienen ningun enlace o boton que los dirija a agendar una cita o pedir informacion.</p>
            </div>
        </div>

        <!-- Goals -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Metas del plan de 6 meses</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">comercialhidrobo.com</h4>
                    <table class="w-full text-sm">
                        <thead><tr class="text-slate-500"><th class="text-left pb-2">Metrica</th><th class="text-right pb-2">Actual</th><th class="text-right pb-2">Meta</th></tr></thead>
                        <tbody class="text-slate-300">
                            <tr class="border-t border-slate-800"><td class="py-2">Visitas totales/mes</td><td class="text-right">5,300</td><td class="text-right text-emerald-400">7,000+</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Visitas organicas/mes</td><td class="text-right">3,100</td><td class="text-right text-emerald-400">4,500+</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Contactos totales/mes</td><td class="text-right">8</td><td class="text-right text-emerald-400">25-30</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Citas confirmadas taller</td><td class="text-right">2-3</td><td class="text-right text-emerald-400">8-10</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Personas que ven el formulario</td><td class="text-right">18/mes</td><td class="text-right text-emerald-400">150+</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Articulos de blog nuevos</td><td class="text-right">—</td><td class="text-right text-emerald-400">120</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">okcars.ec</h4>
                    <table class="w-full text-sm">
                        <thead><tr class="text-slate-500"><th class="text-left pb-2">Metrica</th><th class="text-right pb-2">Actual</th><th class="text-right pb-2">Meta</th></tr></thead>
                        <tbody class="text-slate-300">
                            <tr class="border-t border-slate-800"><td class="py-2">Visitas/mes</td><td class="text-right">114</td><td class="text-right text-emerald-400">1,000+</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Busquedas donde aparece</td><td class="text-right">15</td><td class="text-right text-emerald-400">200+</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Contactos/mes</td><td class="text-right">Sin medir</td><td class="text-right text-emerald-400">80+</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Articulos de blog nuevos</td><td class="text-right">0</td><td class="text-right text-emerald-400">120</td></tr>
                            <tr class="border-t border-slate-800"><td class="py-2">Resenas en Google Maps</td><td class="text-right">~2</td><td class="text-right text-emerald-400">25+</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- TAB: Comercial Hidrobo -->
    <div id="tab-ch" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Analisis: comercialhidrobo.com</h2>

        <!-- Top Pages -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Top 10 paginas por trafico organico</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3">Pagina</th><th class="text-right pb-3">Clics</th><th class="text-right pb-3">Impresiones</th><th class="text-right pb-3">CTR</th><th class="text-right pb-3">Pos. media</th><th class="text-right pb-3">Conversiones</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">/ (Home)</td><td class="text-right">5,032</td><td class="text-right text-slate-500">53,347</td><td class="text-right">9.4%</td><td class="text-right">10.2</td><td class="text-right"><span class="text-emerald-400">146</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Renault Duster 2025 precio</td><td class="text-right">2,037</td><td class="text-right text-slate-500">142,890</td><td class="text-right">1.4%</td><td class="text-right">4.3</td><td class="text-right"><span class="text-red-400">1</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Exoneracion de autos Ecuador</td><td class="text-right">1,740</td><td class="text-right text-slate-500">102,491</td><td class="text-right">1.7%</td><td class="text-right">6.4</td><td class="text-right"><span class="text-red-400">0</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Marcas autos chinos Ecuador</td><td class="text-right">1,620</td><td class="text-right text-slate-500">72,252</td><td class="text-right">2.2%</td><td class="text-right">3.4</td><td class="text-right"><span class="text-red-400">0</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Renault Duster (ficha)</td><td class="text-right">1,230</td><td class="text-right text-slate-500">94,258</td><td class="text-right">1.3%</td><td class="text-right">7.7</td><td class="text-right"><span class="text-amber-400">8</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Camionetas mejor consumo</td><td class="text-right">1,195</td><td class="text-right text-slate-500">197,690</td><td class="text-right">0.6%</td><td class="text-right">3.7</td><td class="text-right"><span class="text-red-400">0</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">DongFeng Rich 6</td><td class="text-right">1,096</td><td class="text-right text-slate-500">42,601</td><td class="text-right">2.6%</td><td class="text-right">7.8</td><td class="text-right"><span class="text-amber-400">3</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Autos electricos Ecuador 2025</td><td class="text-right">1,002</td><td class="text-right text-slate-500">37,834</td><td class="text-right">2.6%</td><td class="text-right">5.1</td><td class="text-right"><span class="text-red-400">0</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate">Exonerados (pagina)</td><td class="text-right">927</td><td class="text-right text-slate-500">34,651</td><td class="text-right">2.7%</td><td class="text-right">8.4</td><td class="text-right"><span class="text-amber-400">4</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 max-w-xs truncate font-semibold text-white">Contacto</td><td class="text-right font-semibold">761</td><td class="text-right text-slate-500">30,289</td><td class="text-right">2.5%</td><td class="text-right">4.7</td><td class="text-right"><span class="text-emerald-400 font-semibold">195</span></td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-slate-500 mt-4">Periodo: Enero 2025 - Marzo 2026. Datos de Google Analytics 4 + Search Console.</p>
        </div>

        <!-- Keywords Chart -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Top 10 keywords organicas</h3>
            <div class="h-80">
                <canvas id="keywordsChart"></canvas>
            </div>
        </div>

        <!-- Forms Data -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <h3 class="text-base font-semibold text-white mb-3">Formulario: Citas de Taller</h3>
                <div class="space-y-4">
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Registros totales (7 meses)</span><span class="text-sm font-semibold text-white">70</span></div>
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Citas reales (sin pruebas/spam)</span><span class="text-sm font-semibold text-white">~38</span></div>
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Promedio real/mes</span><span class="text-sm font-semibold text-emerald-400">5-6</span></div>
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Citas confirmadas en taller</span><span class="text-sm font-semibold text-amber-400">2-3/mes</span></div>
                    <hr class="border-slate-800">
                    <p class="text-xs text-slate-500">Marcas mas solicitadas: Toyota, Renault, Dongfeng, Mazda, Chery</p>
                    <p class="text-xs text-slate-500">Servicios: Mantenimientos por km (5k, 10k, 20k, 25k)</p>
                    <p class="text-xs text-slate-500">Agencias: Ibarra (mayoria), Cayambe, Tulcan</p>
                </div>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <h3 class="text-base font-semibold text-white mb-3">Formulario: Cotizacion Repuestos</h3>
                <div class="space-y-4">
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Registros totales (7 meses)</span><span class="text-sm font-semibold text-white">21</span></div>
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Cotizaciones reales</span><span class="text-sm font-semibold text-white">~16</span></div>
                    <div class="flex justify-between"><span class="text-sm text-slate-400">Promedio real/mes</span><span class="text-sm font-semibold text-amber-400">2-3</span></div>
                    <hr class="border-slate-800">
                    <div class="p-3 rounded-lg bg-amber-500/10 border border-amber-500/20">
                        <p class="text-xs text-amber-300"><strong>Hallazgo:</strong> Varias solicitudes son de marcas que CH no vende (Mitsubishi, Hyundai, Rogue). Se recomienda filtrar el formulario con dropdown de marcas disponibles.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bounce Rate -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Tasa de rebote por tipo de pagina</h3>
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Home</span><span class="text-sm text-white">51%</span></div>
                    <div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-amber-500 rounded-full" style="width: 51%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Paginas de marca (Renault, Nissan...)</span><span class="text-sm text-white">12-18%</span></div>
                    <div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-emerald-500 rounded-full" style="width: 15%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Blog posts informativos</span><span class="text-sm text-white">45-67%</span></div>
                    <div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-red-500 rounded-full" style="width: 56%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Contacto</span><span class="text-sm text-white">29%</span></div>
                    <div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-emerald-500 rounded-full" style="width: 29%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Formulario citas taller</span><span class="text-sm text-white">34%</span></div>
                    <div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-brand-500 rounded-full" style="width: 34%"></div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAB: OKCars -->
    <div id="tab-ok" class="tab-content space-y-8">
        <h2 class="text-2xl font-bold text-white">Analisis: okcars.ec</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Usuarios (3 meses)</p>
                <p class="text-3xl font-bold text-white">342</p>
                <p class="text-xs text-slate-400 mt-1">~114/mes</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics organicos</p>
                <p class="text-3xl font-bold text-white">172</p>
                <p class="text-xs text-slate-400 mt-1">~57/mes</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Conversiones</p>
                <p class="text-3xl font-bold text-red-400">0</p>
                <p class="text-xs text-red-400 mt-1">Sin configurar</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Vehiculos visibles</p>
                <p class="text-3xl font-bold text-white">~15</p>
                <p class="text-xs text-slate-400 mt-1">Inventario limitado</p>
            </div>
        </div>

        <!-- Context -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-5 mb-6">
            <h4 class="text-sm font-semibold text-brand-500 mb-2">Por que estos numeros son tan bajos?</h4>
            <p class="text-sm text-slate-400">OKCars.ec es un sitio web nuevo que aun <strong class="text-slate-300">no ha tenido ningun trabajo de SEO</strong> (posicionamiento en Google). Esto es normal — un sitio web recien lanzado no aparece en Google automaticamente. Necesita contenido estrategico, optimizacion y tiempo para empezar a recibir visitas. Eso es exactamente lo que vamos a hacer en esta campana: crear 30 articulos de blog optimizados y configurar todo para que OKCars aparezca cuando la gente busque "autos seminuevos en Ibarra" o "carros usados a credito".</p>
        </div>

        <!-- Problems -->
        <div class="rounded-xl border border-red-500/20 bg-red-500/5 p-6">
            <h3 class="text-lg font-semibold text-red-400 mb-2">Areas de mejora detectadas</h3>
            <p class="text-sm text-slate-500 mb-4">Estos puntos son normales en un sitio nuevo que no ha tenido trabajo de SEO. Son exactamente las areas que vamos a resolver en esta campana.</p>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <span class="text-red-400 mt-0.5">1.</span>
                        <p class="text-sm text-slate-300"><strong class="text-white">No se miden los contactos:</strong> El sitio tiene Google Analytics instalado, pero no esta configurado para registrar cuando alguien envia un formulario o hace clic en WhatsApp. Sin esta medicion, no podemos saber cuantas personas estan interesadas.</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-red-400 mt-0.5">2.</span>
                        <p class="text-sm text-slate-300"><strong class="text-white">No tiene blog ni articulos:</strong> Google necesita contenido escrito para poder mostrar la pagina en los resultados de busqueda. Sin articulos, OKCars es practicamente invisible en Google.</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-red-400 mt-0.5">3.</span>
                        <p class="text-sm text-slate-300"><strong class="text-white">Titulos de pagina genericos:</strong> El titulo de la pagina principal dice "Inicio - OKCARS". Google usa estos titulos para decidir cuando mostrar la pagina. Un titulo como "Autos Seminuevos en Ibarra con Garantia" seria mucho mas efectivo.</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <span class="text-red-400 mt-0.5">4.</span>
                        <p class="text-sm text-slate-300"><strong class="text-white">URLs antiguas rotas:</strong> Hay direcciones web de una version anterior del sitio (/usados/) que muestran error cuando alguien intenta visitarlas.</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-red-400 mt-0.5">5.</span>
                        <p class="text-sm text-slate-300"><strong class="text-white">No aparece en busquedas clave:</strong> Cuando alguien busca "autos seminuevos ibarra" o "carros usados ecuador", OKCars no aparece en los resultados de Google. Esto es lo mas importante a resolver.</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-red-400 mt-0.5">6.</span>
                        <p class="text-sm text-slate-300"><strong class="text-white">Inventario limitado:</strong> Con ~15 vehiculos visibles, las paginas de categorias (SUV, Camionetas, etc.) se ven vacias. El blog compensara esto atrayendo visitantes por contenido informativo.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- OKCars Keywords -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Keywords organicas actuales</h3>
            <table class="w-full text-sm">
                <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3">Keyword</th><th class="text-right pb-3">Clics</th><th class="text-right pb-3">Impresiones</th><th class="text-right pb-3">Pos. media</th></tr></thead>
                <tbody class="text-slate-300">
                    <tr class="border-t border-slate-800/50"><td class="py-2">ok cars</td><td class="text-right">46</td><td class="text-right text-slate-500">173</td><td class="text-right">7.3</td></tr>
                    <tr class="border-t border-slate-800/50"><td class="py-2">okcars</td><td class="text-right">40</td><td class="text-right text-slate-500">490</td><td class="text-right">9.4</td></tr>
                    <tr class="border-t border-slate-800/50"><td class="py-2">deepal s05 precio ecuador</td><td class="text-right">10</td><td class="text-right text-slate-500">424</td><td class="text-right">6.8</td></tr>
                    <tr class="border-t border-slate-800/50"><td class="py-2">autos ok</td><td class="text-right">4</td><td class="text-right text-slate-500">443</td><td class="text-right">7.2</td></tr>
                    <tr class="border-t border-slate-800/50 text-slate-500"><td class="py-2">carros creditos</td><td class="text-right">0</td><td class="text-right">78</td><td class="text-right">34.6</td></tr>
                    <tr class="border-t border-slate-800/50 text-slate-500"><td class="py-2">carros nuevos a credito</td><td class="text-right">0</td><td class="text-right">84</td><td class="text-right">73.7</td></tr>
                    <tr class="border-t border-slate-800/50 text-slate-500"><td class="py-2">changan deepal s05</td><td class="text-right">0</td><td class="text-right">119</td><td class="text-right">8.7</td></tr>
                </tbody>
            </table>
            <p class="text-xs text-amber-400 mt-3">Las keywords en gris tienen impresiones pero 0 clics — oportunidades de optimizacion inmediata.</p>
        </div>
    </div>

    <!-- TAB: Plan 6 Meses -->
    <div id="tab-plan" class="tab-content space-y-8">
        <h2 class="text-2xl font-bold text-white">Plan de 6 Meses: Abril - Septiembre 2026</h2>

        <!-- Produccion mensual -->
        <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/5 p-5">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <h4 class="text-sm font-semibold text-emerald-400">Produccion de contenido: constante todos los meses</h4>
            </div>
            <p class="text-sm text-slate-400">Cada mes se publicaran <strong class="text-white">minimo 20 articulos de blog en cada sitio web</strong> (20 en comercialhidrobo.com + 20 en okcars.ec = 40 articulos/mes). Los temas de los primeros 2 meses ya estan definidos. A partir del mes 3, los temas se eligen en base a los datos reales de Google Analytics: que buscan las personas, que articulos generan mas contactos, y que oportunidades detectamos.</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-3">
                <div class="text-center p-3 rounded-lg bg-slate-800/50"><p class="text-2xl font-bold text-white">20</p><p class="text-xs text-slate-500">posts/mes por web</p></div>
                <div class="text-center p-3 rounded-lg bg-slate-800/50"><p class="text-2xl font-bold text-white">40</p><p class="text-xs text-slate-500">posts/mes en total</p></div>
                <div class="text-center p-3 rounded-lg bg-slate-800/50"><p class="text-2xl font-bold text-white">240</p><p class="text-xs text-slate-500">posts en 6 meses</p></div>
            </div>
        </div>

        <!-- Timeline CH -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-brand-500 mb-2">comercialhidrobo.com — Hoja de ruta SEO + CRO</h3>
            <p class="text-xs text-slate-500 mb-6">Acciones mensuales ademas de los 20 articulos de blog</p>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-600 flex items-center justify-center text-white text-sm font-bold shrink-0">1</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Abril — Quick Wins & Ingenieria del embudo</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- CTAs en los 8 posts con mas trafico (8,600+ visitas/mes sin conversion)</li>
                            <li>- Optimizar WhatsApp flotante con mensajes contextuales por pagina</li>
                            <li>- Enlace "Agenda tu cita" en menu principal y footer</li>
                            <li>- Crear pagina intermedia /taller/ como landing de servicios</li>
                            <li>- Redisenar formulario de repuestos (dropdown de marcas)</li>
                            <li>- Publicar 20 articulos de blog orientados a conversion</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">Meta: 60 visitas/mes al formulario, 8 leads totales</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-600/80 flex items-center justify-center text-white text-sm font-bold shrink-0">2</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Mayo — Contenido transaccional + SEO local</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos de blog (comparativas, fichas tecnicas, SEO local)</li>
                            <li>- 3 paginas de taller por marca: /taller-toyota-ibarra/, /taller-renault-ibarra/, etc.</li>
                            <li>- Actualizar los 5 posts con mas trafico (agregar CTAs + datos 2026)</li>
                            <li>- Google Business Profile: 3 ubicaciones optimizadas</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">Meta: 14 leads/mes, 120 visitas paginas de taller</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-600/60 flex items-center justify-center text-white text-sm font-bold shrink-0">3</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Junio — Tracking avanzado + contenido basado en datos</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos de blog (temas definidos con datos de Analytics de abril-mayo)</li>
                            <li>- Implementar eventos GA4 granulares (cta_click, whatsapp_click, form_abandon)</li>
                            <li>- Pop-up de salida en paginas de vehiculos</li>
                            <li>- Instalar pixel de Meta + crear audiencias de remarketing</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">Meta: 18 leads/mes, tasa conversion 0.5%</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-600/40 flex items-center justify-center text-white text-sm font-bold shrink-0">4</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Julio — Escalar lo que funciona</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos de blog (escalar temas que mejor funcionaron)</li>
                            <li>- Analisis de rendimiento meses 1-3: replicar formato de CTA ganador</li>
                            <li>- Expandir paginas de taller a Cayambe y Tulcan</li>
                            <li>- Optimizacion de Core Web Vitals y UX movil</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">Meta: 22 leads/mes, 3,500 visitas organicas</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-600/30 flex items-center justify-center text-white text-sm font-bold shrink-0">5</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Agosto — Autoridad y enlaces</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos de blog (contenido de autoridad y link building)</li>
                            <li>- Link building local: medios de Imbabura, directorios automotrices</li>
                            <li>- Schema markup completo (LocalBusiness, AutoDealer, Product, FAQ)</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">Meta: 25 leads/mes, 4,000 visitas organicas</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-600/20 flex items-center justify-center text-white text-sm font-bold shrink-0">6</div>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white">Septiembre — Consolidacion y optimizacion</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos de blog (cierre de campana, contenido estacional)</li>
                            <li>- Analisis de rendimiento completo: que contenido convierte mas</li>
                            <li>- Optimizar CTAs y formularios segun datos reales de 5 meses</li>
                            <li>- Reforzar posicionamiento de keywords que estan en posiciones 5-15</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">Meta final: 25-30 leads/mes, 4,500+ visitas, 0.6-0.8% conversion</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline OKCars -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-purple-400 mb-2">okcars.ec — Hoja de ruta SEO desde cero</h3>
            <p class="text-xs text-slate-500 mb-6">Acciones mensuales ademas de los 20 articulos de blog</p>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-600 flex items-center justify-center text-white text-sm font-bold shrink-0">1</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Abril — Fundamentos + primeros 20 articulos</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Configurar medicion de contactos en Google Analytics</li>
                            <li>- Corregir TODOS los titulos y descripciones de pagina</li>
                            <li>- Redirigir URLs /usados/ antiguas que dan error</li>
                            <li>- Agregar datos estructurados (Schema) para vehiculos</li>
                            <li>- Configurar mensaje prellenado en WhatsApp</li>
                            <li>- Publicar 20 articulos de blog (guias de compra, financiamiento, confianza)</li>
                        </ul>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-600/80 flex items-center justify-center text-white text-sm font-bold shrink-0">2</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Mayo — 20 articulos + comparativas + cross-linking</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos de blog (comparativas de modelos, financiamiento, SEO local)</li>
                            <li>- Cross-linking bidireccional con comercialhidrobo.com</li>
                            <li>- Optimizar paginas de categorias y marcas con texto introductorio</li>
                        </ul>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-600/60 flex items-center justify-center text-white text-sm font-bold shrink-0">3</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Junio — SEO local + 20 articulos basados en datos</h4>
                        <ul class="mt-2 space-y-1 text-sm text-slate-400">
                            <li>- Publicar 20 articulos (temas definidos con datos reales de abril-mayo)</li>
                            <li>- Google Business Profile optimizado</li>
                            <li>- Landing /autos-seminuevos-ibarra/</li>
                            <li>- Optimizacion de velocidad del sitio</li>
                        </ul>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-600/40 flex items-center justify-center text-white text-sm font-bold shrink-0">4</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Julio — 20 articulos + CRO avanzado</h4>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-600/30 flex items-center justify-center text-white text-sm font-bold shrink-0">5</div>
                        <div class="w-0.5 h-full bg-slate-800 mt-2"></div>
                    </div>
                    <div class="pb-6">
                        <h4 class="font-semibold text-white">Agosto — 20 articulos + escalar + Google Ads</h4>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-600/20 flex items-center justify-center text-white text-sm font-bold shrink-0">6</div>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white">Septiembre — 20 articulos + consolidar + optimizar Ads</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projected KPIs -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Proyeccion de resultados esperados — Comercial Hidrobo</h3>
            <p class="text-xs text-slate-500 mb-4">Estos numeros muestran como esperamos que crezcan las visitas y los contactos mes a mes</p>
            <div class="h-72">
                <canvas id="projectionChart"></canvas>
            </div>
        </div>

        <!-- Google Ads Suggestions -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Sugerencias para Google Ads (equipo interno CH)</h3>
            <p class="text-xs text-slate-500 mb-4">Estas son recomendaciones para complementar el trabajo de SEO organico con publicidad pagada en Google. Los presupuestos son sugeridos y pueden ajustarse.</p>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="rounded-lg border border-emerald-500/20 bg-emerald-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-medium bg-emerald-500/20 text-emerald-400 rounded">PRIORIDAD ALTA</span>
                    </div>
                    <h4 class="font-semibold text-white text-sm">Busqueda — Taller y mantenimiento</h4>
                    <p class="text-xs text-slate-400 mt-1">Palabras clave: "taller automotriz ibarra", "mantenimiento vehicular ibarra"</p>
                    <p class="text-xs text-slate-400">Presupuesto sugerido: $150-200/mes</p>
                    <p class="text-xs text-slate-400">Costo por clic estimado: $0.30-0.80</p>
                    <p class="text-xs text-slate-500 mt-1">Esto genera aprox. 190-660 clics/mes al sitio</p>
                </div>
                <div class="rounded-lg border border-brand-500/20 bg-brand-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-medium bg-brand-500/20 text-brand-500 rounded">PRIORIDAD MEDIA</span>
                    </div>
                    <h4 class="font-semibold text-white text-sm">Busqueda — Vehiculos nuevos</h4>
                    <p class="text-xs text-slate-400 mt-1">Palabras clave: "renault duster precio", "autos nuevos ibarra"</p>
                    <p class="text-xs text-slate-400">Presupuesto sugerido: $300-500/mes</p>
                    <p class="text-xs text-slate-400">Costo por clic estimado: $0.80-1.50</p>
                    <p class="text-xs text-slate-500 mt-1">Esto genera aprox. 200-625 clics/mes al sitio</p>
                </div>
                <div class="rounded-lg border border-brand-500/20 bg-brand-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-medium bg-brand-500/20 text-brand-500 rounded">PRIORIDAD MEDIA</span>
                    </div>
                    <h4 class="font-semibold text-white text-sm">Remarketing (mostrar anuncios a quienes ya visitaron la web)</h4>
                    <p class="text-xs text-slate-400 mt-1">Audiencia: personas que vieron paginas de vehiculos pero no contactaron</p>
                    <p class="text-xs text-slate-400">Presupuesto sugerido: $100-150/mes</p>
                    <p class="text-xs text-slate-500 mt-1">Requiere configuracion previa (se instala en Mes 3)</p>
                </div>
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/20 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-medium bg-slate-700/50 text-slate-400 rounded">NO RECOMENDADO</span>
                    </div>
                    <h4 class="font-semibold text-white text-sm">Publicidad con el nombre "Comercial Hidrobo"</h4>
                    <p class="text-xs text-slate-400 mt-1">"Comercial hidrobo" ya aparece en posicion #1 de Google de forma gratuita</p>
                    <p class="text-xs text-slate-400">Pagar por estos clics seria desperdiciar presupuesto</p>
                </div>
            </div>

            <!-- Explicacion calculo presupuesto -->
            <div class="mt-4 rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                <h4 class="text-sm font-semibold text-white mb-2">Como se calcula el presupuesto sugerido?</h4>
                <p class="text-sm text-slate-400 mb-3">El presupuesto de Google Ads se basa en cuanto cuesta cada clic y cuantos clics necesitamos para generar un contacto:</p>
                <div class="space-y-2 text-sm text-slate-400">
                    <p><strong class="text-slate-300">1. Costo por clic (CPC):</strong> Es lo que Google cobra cada vez que alguien hace clic en nuestro anuncio. Varia segun la competencia de cada palabra clave. Para "taller automotriz ibarra" la competencia es baja ($0.30-0.80), para "renault duster precio" es media ($0.80-1.50).</p>
                    <p><strong class="text-slate-300">2. Tasa de conversion esperada:</strong> De cada 100 personas que hacen clic en el anuncio, estimamos que entre 3 y 5 dejaran sus datos (3-5% de conversion, que es el promedio del sector automotriz).</p>
                    <p><strong class="text-slate-300">3. Calculo ejemplo — Campana Taller:</strong></p>
                </div>
                <div class="mt-2 p-3 rounded-lg bg-slate-900/50 text-xs text-slate-400 font-mono">
                    <p>Presupuesto: $200/mes</p>
                    <p>CPC promedio: $0.50</p>
                    <p>Clics generados: $200 / $0.50 = <strong class="text-white">400 clics/mes</strong></p>
                    <p>Tasa de conversion: 4%</p>
                    <p>Leads esperados: 400 x 4% = <strong class="text-emerald-400">16 contactos/mes</strong></p>
                </div>
                <p class="text-xs text-slate-500 mt-3">Nota: estos son estimados basados en promedios del sector automotriz en Latinoamerica. Los numeros reales se ajustan mes a mes segun el rendimiento real de las campanas.</p>
            </div>
        </div>

        <!-- Glosario -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Glosario: que significan los terminos de este plan?</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-400">
                <div>
                    <p><strong class="text-slate-300">SEO (Search Engine Optimization):</strong> Son las acciones que hacemos para que la pagina web aparezca en los primeros resultados de Google cuando la gente busca algo relacionado con el negocio. Por ejemplo, que al buscar "taller automotriz Ibarra" aparezca Comercial Hidrobo.</p>
                    <p class="mt-3"><strong class="text-slate-300">CRO (Conversion Rate Optimization):</strong> Son las mejoras que hacemos en la pagina web para que los visitantes tomen accion: agendar una cita, enviar un formulario o escribir por WhatsApp. No se trata de traer mas gente, sino de que la gente que ya visita la web se convierta en cliente.</p>
                    <p class="mt-3"><strong class="text-slate-300">KPIs (Key Performance Indicators):</strong> Son los numeros clave que medimos cada mes para saber si el plan esta funcionando. Por ejemplo: cuantas personas visitaron la web, cuantas enviaron un formulario, cuantas agendaron una cita.</p>
                    <p class="mt-3"><strong class="text-slate-300">Leads:</strong> Personas que dejan sus datos de contacto (formulario, WhatsApp, llamada). Son clientes potenciales — alguien que paso de ser un visitante anonimo a ser un contacto real con nombre y telefono.</p>
                </div>
                <div>
                    <p><strong class="text-slate-300">Tasa de conversion:</strong> El porcentaje de visitantes que se convierten en leads. Si de 1,000 visitas, 10 envian formulario, la tasa es 1%.</p>
                    <p class="mt-3"><strong class="text-slate-300">Trafico organico:</strong> Las visitas que llegan a la web desde Google de forma gratuita (sin pagar publicidad). Es el resultado directo del trabajo de SEO.</p>
                    <p class="mt-3"><strong class="text-slate-300">CPC (Costo por clic):</strong> Lo que se paga a Google cada vez que alguien hace clic en un anuncio pagado. Varia segun la competencia de cada palabra clave.</p>
                    <p class="mt-3"><strong class="text-slate-300">Remarketing:</strong> Mostrar anuncios a personas que ya visitaron la pagina web pero no contactaron. Es como "recordarles" que existimos cuando navegan por otras paginas o redes sociales.</p>
                    <p class="mt-3"><strong class="text-slate-300">Schema / Datos estructurados:</strong> Informacion tecnica que se agrega al codigo de la pagina web para que Google entienda mejor el contenido (por ejemplo, que es un concesionario, que vende vehiculos, donde esta ubicado).</p>
                </div>
            </div>
        </div>
    </div>

    <!-- TAB: Mes 1 -->
    <div id="tab-mes1" class="tab-content space-y-8">
        <h2 class="text-2xl font-bold text-white">Mes 1: Abril 2026 — Acciones Detalladas</h2>

        <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/5 p-6">
            <h3 class="text-base font-semibold text-emerald-400 mb-2">Objetivo del mes</h3>
            <p class="text-sm text-slate-300">Reparar el embudo de conversion. Crear puentes entre el contenido existente (3,100 visitas/mes) y los formularios de conversion. Sin generar contenido nuevo — solo optimizar lo que ya existe.</p>
        </div>

        <!-- Week by week -->
        <div class="space-y-6">
            <!-- Week 1-2 -->
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-3 py-1 text-xs font-semibold bg-brand-600/20 text-brand-500 rounded-full">SEMANA 1-2</span>
                    <h3 class="text-base font-semibold text-white">CTAs en paginas de alto trafico</h3>
                </div>

                <div class="space-y-4">
                    <div class="rounded-lg border border-slate-700/50 p-4">
                        <h4 class="text-sm font-semibold text-white mb-2">Accion 1: Insertar CTAs en los 8 posts top</h4>
                        <p class="text-sm text-slate-400 mb-3">Estos 8 posts reciben 8,620+ visitas/mes y generan 0-3 conversiones. Agregar en cada uno:</p>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li class="flex gap-2"><span class="text-brand-500">-</span> CTA inline a mitad del articulo (contextual al tema del post)</li>
                            <li class="flex gap-2"><span class="text-brand-500">-</span> Barra sticky en movil: "Necesitas mantenimiento? Agenda tu cita en 30 segundos"</li>
                            <li class="flex gap-2"><span class="text-brand-500">-</span> CTA al final con formulario simplificado (nombre + telefono + dropdown)</li>
                        </ul>
                        <div class="mt-3 overflow-x-auto">
                            <table class="w-full text-xs">
                                <thead><tr class="text-slate-500"><th class="text-left pb-2">Post</th><th class="text-right pb-2">Visitas/mes</th><th class="text-right pb-2">Conversiones</th></tr></thead>
                                <tbody class="text-slate-400">
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Renault Duster 2025 precio</td><td class="text-right">~136</td><td class="text-right text-red-400">1</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Exoneracion autos Ecuador</td><td class="text-right">~116</td><td class="text-right text-red-400">0</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Marcas autos chinos Ecuador</td><td class="text-right">~108</td><td class="text-right text-red-400">0</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Renault Duster (ficha)</td><td class="text-right">~82</td><td class="text-right text-amber-400">8</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Camionetas mejor consumo</td><td class="text-right">~80</td><td class="text-right text-red-400">0</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">DongFeng Rich 6</td><td class="text-right">~73</td><td class="text-right text-amber-400">3</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Autos electricos Ecuador</td><td class="text-right">~67</td><td class="text-right text-red-400">0</td></tr>
                                    <tr class="border-t border-slate-800/50"><td class="py-1.5">Exonerados (pagina)</td><td class="text-right">~62</td><td class="text-right text-amber-400">4</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="rounded-lg border border-emerald-500/20 bg-emerald-500/5 p-4">
                        <h4 class="text-sm font-semibold text-emerald-400 mb-2">Buena practica existente: WhatsApp con mensaje prellenado</h4>
                        <p class="text-sm text-slate-400">El sitio ya cuenta con boton flotante de WhatsApp que envia un <strong class="text-slate-300">mensaje automatico personalizado</strong> con el nombre del vehiculo y el enlace de la pagina donde esta el usuario. Esto es excelente y lo vamos a mantener. Ejemplo del mensaje actual: <em class="text-slate-500">"Hola Comercial Hidrobo, estoy interesado en Nissan Qashqai..."</em></p>
                        <p class="text-sm text-slate-400 mt-2">Lo que agregaremos es <strong class="text-slate-300">medir cuantas personas hacen clic en ese boton</strong> (actualmente no se mide), para poder reportar cuantos contactos genera cada pagina.</p>
                    </div>
                </div>
            </div>

            <!-- Week 2-3 -->
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-3 py-1 text-xs font-semibold bg-brand-600/20 text-brand-500 rounded-full">SEMANA 2-3</span>
                    <h3 class="text-base font-semibold text-white">Optimizacion de rutas al formulario</h3>
                </div>

                <div class="space-y-4">
                    <div class="rounded-lg border border-slate-700/50 p-4">
                        <h4 class="text-sm font-semibold text-white mb-2">Accion 3: Crear rutas de acceso al formulario de citas</h4>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li class="flex gap-2"><span class="text-brand-500">-</span> Agregar "Agenda tu cita" en el menu principal de navegacion</li>
                            <li class="flex gap-2"><span class="text-brand-500">-</span> Banner en Home con CTA directo al taller</li>
                            <li class="flex gap-2"><span class="text-brand-500">-</span> Enlace en footer de todas las paginas</li>
                            <li class="flex gap-2"><span class="text-brand-500">-</span> En pagina de Contacto: agregar opcion "Agendar cita de taller"</li>
                        </ul>
                    </div>

                    <div class="rounded-lg border border-slate-700/50 p-4">
                        <h4 class="text-sm font-semibold text-white mb-2">Accion 4: Crear pagina /taller/ como landing de servicios</h4>
                        <p class="text-sm text-slate-400 mb-2">Pagina dedicada que funcione como hub de taller con:</p>
                        <ul class="space-y-1 text-sm text-slate-400">
                            <li>- Servicios ofrecidos (mantenimiento por km, diagnostico, etc.)</li>
                            <li>- Marcas atendidas (Toyota, Renault, DongFeng, Mazda, Chery)</li>
                            <li>- Precios referenciales de mantenimientos comunes</li>
                            <li>- Formulario de citas embebido directamente</li>
                            <li>- Testimonios de clientes</li>
                        </ul>
                        <p class="text-xs text-emerald-400 mt-2">SEO target: "taller automotriz ibarra", "mantenimiento vehicular ibarra"</p>
                    </div>
                </div>
            </div>

            <!-- Week 3-4 -->
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-3 py-1 text-xs font-semibold bg-brand-600/20 text-brand-500 rounded-full">SEMANA 3-4</span>
                    <h3 class="text-base font-semibold text-white">Filtrado de leads + OKCars base</h3>
                </div>

                <div class="space-y-4">
                    <div class="rounded-lg border border-slate-700/50 p-4">
                        <h4 class="text-sm font-semibold text-white mb-2">Accion 5: Redisenar formulario de repuestos (CH)</h4>
                        <p class="text-sm text-slate-400">Cambiar campo "marca" a dropdown con solo las marcas que manejan. Agregar texto claro sobre marcas disponibles.</p>
                    </div>

                    <div class="rounded-lg border border-purple-500/30 p-4">
                        <h4 class="text-sm font-semibold text-purple-400 mb-2">OKCars — Acciones de Abril</h4>
                        <p class="text-sm text-slate-500 mb-2">El sitio ya cuenta con formularios de contacto y boton de WhatsApp en las fichas de vehiculos. Las acciones se enfocan en lo que falta:</p>
                        <ul class="space-y-1 text-sm text-slate-400">
                            <li>- <strong class="text-slate-300">Configurar medicion en Google Analytics</strong> — para saber cuantas personas envian formularios o hacen clic en WhatsApp</li>
                            <li>- <strong class="text-slate-300">Configurar mensaje prellenado en WhatsApp</strong> — como en CH, que el mensaje incluya el nombre del vehiculo automaticamente</li>
                            <li>- <strong class="text-slate-300">Corregir todos los titulos de pagina</strong> — para que Google muestre OKCars en busquedas relevantes</li>
                            <li>- <strong class="text-slate-300">Redirigir URLs antiguas rotas</strong> — para evitar paginas de error</li>
                            <li>- <strong class="text-slate-300">Agregar datos estructurados (Schema)</strong> — informacion tecnica que ayuda a Google a entender que el sitio vende vehiculos</li>
                            <li>- <strong class="text-slate-300">Publicar los primeros 20 articulos de blog</strong> — para empezar a aparecer en Google</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Month 1 KPIs -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">KPIs esperados — Fin de Abril 2026</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">comercialhidrobo.com</h4>
                    <div class="space-y-3">
                        <div><div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Visitas pagina citas</span><span class="text-sm text-white">60/mes (vs 18)</span></div><div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-brand-500 rounded-full progress-bar" style="width: 40%"></div></div></div>
                        <div><div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Leads formulario citas</span><span class="text-sm text-white">8/mes (vs 5-6)</span></div><div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-brand-500 rounded-full progress-bar" style="width: 32%"></div></div></div>
                        <div><div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Clics WhatsApp</span><span class="text-sm text-white">30/mes (nuevo)</span></div><div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-emerald-500 rounded-full progress-bar" style="width: 20%"></div></div></div>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">okcars.ec</h4>
                    <div class="space-y-3">
                        <div><div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Tracking configurado</span><span class="text-sm text-emerald-400">Completado</span></div><div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-emerald-500 rounded-full progress-bar" style="width: 100%"></div></div></div>
                        <div><div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Meta titles corregidos</span><span class="text-sm text-emerald-400">Completado</span></div><div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-emerald-500 rounded-full progress-bar" style="width: 100%"></div></div></div>
                        <div><div class="flex justify-between mb-1"><span class="text-sm text-slate-400">Baseline de conversiones</span><span class="text-sm text-white">~5/mes</span></div><div class="w-full h-2 bg-slate-800 rounded-full"><div class="h-2 bg-purple-500 rounded-full progress-bar" style="width: 6%"></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAB: Plan de Contenido -->
    <div id="tab-contenido" class="tab-content space-y-8">
        <h2 class="text-2xl font-bold text-white">Plan de Contenido: Abril y Mayo 2026</h2>

        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
            <h4 class="text-sm font-semibold text-brand-500 mb-2">Que es un articulo de blog SEO y para que sirve?</h4>
            <p class="text-sm text-slate-400">Cada articulo que publicamos en el blog esta disenado para responder una pregunta que la gente hace en Google. Cuando alguien busca, por ejemplo, "cuanto cuesta el mantenimiento de un Renault Duster", Google muestra los articulos que mejor responden esa pregunta. Si nuestro articulo es bueno, aparecemos en los primeros resultados y esa persona visita la pagina web de Comercial Hidrobo. Al final del articulo, le ofrecemos agendar una cita en el taller o solicitar una cotizacion. Asi convertimos una busqueda en Google en un cliente potencial.</p>
            <p class="text-sm text-slate-400 mt-2"><strong class="text-slate-300">Ritmo de publicacion:</strong> 20 articulos por mes en cada sitio web (120 por web en 6 meses = 240 articulos en total).</p>
        </div>

        <div class="rounded-xl border border-amber-500/20 bg-amber-500/5 p-5">
            <h4 class="text-sm font-semibold text-amber-400 mb-2">Por que solo mostramos Abril y Mayo?</h4>
            <p class="text-sm text-slate-400">Los articulos de los meses 3 al 6 (Junio - Septiembre) se definiran <strong class="text-slate-300">en base a los datos reales de Google Analytics y Search Console</strong> obtenidos durante los primeros meses. Esto nos permite crear contenido basado en lo que realmente funciona: que busquedas traen mas trafico, que articulos generan mas contactos, y que temas tienen oportunidad de posicionar. Es una estrategia adaptativa, no rigida.</p>
        </div>

        <!-- Leyenda -->
        <div class="flex flex-wrap gap-3 text-xs">
            <span class="px-2 py-1 rounded bg-emerald-500/20 text-emerald-400">Transaccional: el lector esta listo para comprar o agendar</span>
            <span class="px-2 py-1 rounded bg-brand-500/20 text-brand-400">Comparativa: esta decidiendo entre opciones</span>
            <span class="px-2 py-1 rounded bg-purple-500/20 text-purple-400">Informativa: busca aprender, puede convertir despues</span>
        </div>

        <!-- CH Content Plan -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-brand-500 mb-2">comercialhidrobo.com — 120 Articulos</h3>
            <p class="text-xs text-slate-500 mb-6">20 articulos por mes | <span class="text-emerald-400">[T]</span> Transaccional <span class="text-brand-400">[C]</span> Comparativo <span class="text-purple-400">[I]</span> Informativo</p>

            <div class="mb-6"><h4 class="text-sm font-semibold text-white mb-3 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-brand-600 flex items-center justify-center text-xs">1</span> Abril 2026</h4><div class="space-y-1.5 text-sm text-slate-400">
<p>1. Precios de mantenimiento Nissan en Ibarra: tabla completa por kilometraje <span class="text-emerald-400">[T]</span></p>
<p>2. Chery Tiggo 4 Pro 2026: ficha tecnica, precio y equipamiento en Ecuador <span class="text-purple-400">[I]</span></p>
<p>3. Nissan Kicks vs Renault Kardian: cual conviene mas en Ecuador <span class="text-brand-400">[C]</span></p>
<p>4. Taller automotriz en Ibarra: servicios, horarios y como agendar tu cita <span class="text-emerald-400">[T]</span></p>
<p>5. Guia para comprar auto nuevo en Ecuador: pasos, documentos y financiamiento <span class="text-purple-400">[I]</span></p>
<p>6. DongFeng Rich 6 2026: precio, ficha tecnica y disponibilidad en Imbabura <span class="text-purple-400">[I]</span></p>
<p>7. Cambio de aceite en Ibarra: cada cuantos km y cuanto cuesta <span class="text-emerald-400">[T]</span></p>
<p>8. Renault Kardian 2026: guia completa de compra y versiones disponibles <span class="text-purple-400">[I]</span></p>
<p>9. Credito automotriz en Ecuador 2026: tasas, requisitos y simulador de cuotas <span class="text-purple-400">[I]</span></p>
<p>10. Toyota Hilux vs DongFeng Rich 6: camionetas para trabajo y campo <span class="text-brand-400">[C]</span></p>
<p>11. Repuestos originales Nissan en Ibarra: catalogo, precios y pedidos <span class="text-emerald-400">[T]</span></p>
<p>12. Mazda CX-30 2026: precio en Ecuador, colores y ficha tecnica completa <span class="text-purple-400">[I]</span></p>
<p>13. Revision vehicular en Imbabura: que necesitas y donde preparar tu auto <span class="text-purple-400">[I]</span></p>
<p>14. Changan CS55 Plus vs Chery Tiggo 7 Pro: SUV chinos frente a frente <span class="text-brand-400">[C]</span></p>
<p>15. Concesionario en Cayambe: marcas disponibles, ubicacion y contacto <span class="text-emerald-400">[T]</span></p>
<p>16. Alineacion y balanceo en Ibarra: cuando hacerlo y precios actualizados <span class="text-emerald-400">[T]</span></p>
<p>17. Jeep Renegade 2026: precio Ecuador, versiones y por que elegirlo <span class="text-purple-400">[I]</span></p>
<p>18. Cuanto cuesta mantener un Renault Duster al ano en Ecuador <span class="text-purple-400">[I]</span></p>
<p>19. Exoneracion de vehiculos para personas con discapacidad: guia paso a paso <span class="text-purple-400">[I]</span></p>
<p>20. Agenda tu cita de taller en Comercial Hidrobo: online, rapido y sin filas <span class="text-emerald-400">[T]</span></p>
</div></div>

            <div class="mb-6"><h4 class="text-sm font-semibold text-white mb-3 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-brand-600/80 flex items-center justify-center text-xs">2</span> Mayo 2026</h4><div class="space-y-1.5 text-sm text-slate-400">
<p>21. Nissan Frontier 2026: la camioneta que necesitas para la sierra <span class="text-purple-400">[I]</span></p>
<p>22. Renault Duster vs Chery Tiggo 4 Pro: SUV accesibles en Ecuador <span class="text-brand-400">[C]</span></p>
<p>23. Mantenimiento de frenos en Ibarra: senales de desgaste, precios y servicio <span class="text-emerald-400">[T]</span></p>
<p>24. Ram 1200 2026: precio, capacidad de carga y ficha tecnica Ecuador <span class="text-purple-400">[I]</span></p>
<p>25. Financiamiento automotriz sin entrada en Ecuador: opciones reales 2026 <span class="text-purple-400">[I]</span></p>
<p>26. Taller automotriz en Tulcan: servicios disponibles en Comercial Hidrobo <span class="text-emerald-400">[T]</span></p>
<p>27. Fiat Pulse 2026: precio en Ecuador, versiones y guia de compra <span class="text-purple-400">[I]</span></p>
<p>28. Mazda CX-30 vs Nissan Kicks: SUV urbanas premium <span class="text-brand-400">[C]</span></p>
<p>29. Repuestos originales Renault en Ibarra: disponibilidad y precios <span class="text-emerald-400">[T]</span></p>
<p>30. Tabla de mantenimiento Toyota por kilometraje: cuando y que cambiar <span class="text-purple-400">[I]</span></p>
<p>31. Changan Hunter Plus 2026: camioneta china con precio competitivo <span class="text-purple-400">[I]</span></p>
<p>32. Seguro vehicular en Ecuador: cuanto cuesta y que cubre segun tu auto <span class="text-purple-400">[I]</span></p>
<p>33. Concesionario en Tulcan: marcas, inventario y formas de pago <span class="text-emerald-400">[T]</span></p>
<p>34. Nissan March vs Fiat Pulse: autos compactos para ciudad <span class="text-brand-400">[C]</span></p>
<p>35. Diagnostico computarizado automotriz en Ibarra: que es y cuando lo necesitas <span class="text-emerald-400">[T]</span></p>
<p>36. Dodge Attitude 2026: el sedan mas accesible y su costo real de propiedad <span class="text-purple-400">[I]</span></p>
<p>37. Matriculacion vehicular en Imbabura 2026: requisitos, costos y lugares <span class="text-purple-400">[I]</span></p>
<p>38. DongFeng Rich 6 vs Changan Hunter Plus: pickups chinas en Ecuador <span class="text-brand-400">[C]</span></p>
<p>39. Accesorios originales para camionetas: barras, estribos y recubrimientos <span class="text-emerald-400">[T]</span></p>
<p>40. Cuanto cuesta tener un Nissan Kicks al ano en Ecuador <span class="text-purple-400">[I]</span></p>
</div></div>

            <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4 mt-4">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-sm font-medium text-amber-400">Meses 3-6 (Junio - Septiembre): por definir</p>
                </div>
                <p class="text-xs text-slate-400">Los 80 articulos restantes se planificaran mes a mes en base a los resultados de Google Analytics y Search Console. Analizaremos que busquedas traen mas trafico, que articulos generan mas contactos, y que temas tienen mayor oportunidad de posicionar.</p>
            </div>
        </div>

        <!-- OKCars Content Plan -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-purple-400 mb-2">okcars.ec — 120 Articulos</h3>
            <p class="text-xs text-slate-500 mb-6">20 articulos por mes | <span class="text-emerald-400">[T]</span> Transaccional <span class="text-brand-400">[C]</span> Comparativo <span class="text-purple-400">[I]</span> Informativo</p>

            <div class="mb-6"><h4 class="text-sm font-semibold text-white mb-3 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-purple-600 flex items-center justify-center text-xs">1</span> Abril 2026</h4><div class="space-y-1.5 text-sm text-slate-400">
<p>1. Guia completa para comprar un auto seminuevo en Ecuador sin errores <span class="text-purple-400">[I]</span></p>
<p>2. Por que comprar en un concesionario de seminuevos y no en la calle <span class="text-purple-400">[I]</span></p>
<p>3. Autos seminuevos en Ibarra: donde encontrar las mejores opciones con garantia <span class="text-emerald-400">[T]</span></p>
<p>4. Que revisar antes de comprar un auto usado: checklist de 20 puntos <span class="text-purple-400">[I]</span></p>
<p>5. Como funciona el financiamiento para autos usados en Ecuador <span class="text-purple-400">[I]</span></p>
<p>6. Los 10 autos usados mas vendidos en Ecuador y por que son buena compra <span class="text-brand-400">[C]</span></p>
<p>7. Comprar auto seminuevo en Imbabura: ventajas de hacerlo con respaldo <span class="text-emerald-400">[T]</span></p>
<p>8. Traspaso de vehiculo en Ecuador: requisitos, costos y pasos actualizados <span class="text-purple-400">[I]</span></p>
<p>9. Cuanto cuesta realmente mantener un auto usado al ano en Ecuador <span class="text-purple-400">[I]</span></p>
<p>10. Toyota Hilux usada en Ecuador: guia de compra y que ano elegir <span class="text-brand-400">[C]</span></p>
<p>11. Primer auto: guia para compradores primerizos en Ecuador <span class="text-purple-400">[I]</span></p>
<p>12. Autos seminuevos desde $8,000 en Ecuador: las mejores opciones <span class="text-emerald-400">[T]</span></p>
<p>13. Como saber si un auto usado tiene deudas o problemas legales <span class="text-purple-400">[I]</span></p>
<p>14. Chevrolet Sail usado: vale la pena en 2026? <span class="text-brand-400">[C]</span></p>
<p>15. Credito directo vs credito bancario para un auto usado <span class="text-purple-400">[I]</span></p>
<p>16. Vende tu auto o entregalo como parte de pago en Ibarra <span class="text-emerald-400">[T]</span></p>
<p>17. Seguro vehicular para autos usados en Ecuador: cuanto cuesta <span class="text-purple-400">[I]</span></p>
<p>18. Kia Rio usado en Ecuador: precio, versiones y que buscar <span class="text-brand-400">[C]</span></p>
<p>19. 5 senales de que un concesionario de seminuevos es confiable <span class="text-purple-400">[I]</span></p>
<p>20. Autos seminuevos con garantia en Ibarra: que cubre y por que importa <span class="text-emerald-400">[T]</span></p>
</div></div>

            <div class="mb-6"><h4 class="text-sm font-semibold text-white mb-3 flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-purple-600/80 flex items-center justify-center text-xs">2</span> Mayo 2026</h4><div class="space-y-1.5 text-sm text-slate-400">
<p>21. Hyundai Tucson vs Kia Sportage usados: cual conviene mas <span class="text-brand-400">[C]</span></p>
<p>22. Mejores autos usados para Uber y plataformas en Ecuador <span class="text-emerald-400">[T]</span></p>
<p>23. Como negociar el precio de un auto seminuevo sin perder la compra <span class="text-purple-400">[I]</span></p>
<p>24. Toyota Fortuner usada en Ecuador: guia de anos y versiones <span class="text-brand-400">[C]</span></p>
<p>25. Autos seminuevos hasta $12,000: opciones que valen la pena <span class="text-emerald-400">[T]</span></p>
<p>26. Matricula vehicular en Ecuador: costos, fechas y documentos <span class="text-purple-400">[I]</span></p>
<p>27. Chevrolet D-Max usada vs Toyota Hilux usada: comparativa real <span class="text-brand-400">[C]</span></p>
<p>28. Financiamiento sin entrada para autos usados: existe en Ecuador? <span class="text-purple-400">[I]</span></p>
<p>29. Chery Tiggo usado en Ecuador: pros, contras y precio real <span class="text-brand-400">[C]</span></p>
<p>30. Por que los autos seminuevos son mejor inversion que los 0 km <span class="text-purple-400">[I]</span></p>
<p>31. Autos para trabajo de carga en Ecuador: usados que rinden y duran <span class="text-emerald-400">[T]</span></p>
<p>32. Mazda 3 usado en Ecuador: guia de generaciones y precios <span class="text-brand-400">[C]</span></p>
<p>33. Como transferir la matricula al comprar un auto usado <span class="text-purple-400">[I]</span></p>
<p>34. Nissan Qashqai usada vs Hyundai Tucson usada en Ecuador <span class="text-brand-400">[C]</span></p>
<p>35. Concesionario de seminuevos en Ibarra: por que elegir OKCars <span class="text-emerald-400">[T]</span></p>
<p>36. Cuantos km son demasiados para un auto usado en Ecuador <span class="text-purple-400">[I]</span></p>
<p>37. Changan CS35 Plus usado: lo que debes saber antes de comprar <span class="text-brand-400">[C]</span></p>
<p>38. Autos automaticos usados baratos en Ecuador: mejores opciones <span class="text-emerald-400">[T]</span></p>
<p>39. Revision tecnica vehicular en Ecuador para usados <span class="text-purple-400">[I]</span></p>
<p>40. Hyundai Accent usado en Ecuador: el sedan mas buscado <span class="text-brand-400">[C]</span></p>
</div></div>

            <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4 mt-4">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-sm font-medium text-amber-400">Meses 3-6 (Junio - Septiembre): por definir</p>
                </div>
                <p class="text-xs text-slate-400">Los 80 articulos restantes se planificaran mes a mes en base a los resultados de Google Analytics y Search Console. Analizaremos que busquedas traen mas trafico, que articulos generan mas contactos, y que modelos de vehiculos tienen mayor demanda en el mercado de seminuevos.</p>
            </div>
        </div>

        <!-- Summary -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-base font-semibold text-white mb-3">Resumen de la estrategia de contenido</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-2">comercialhidrobo.com</h4>
                    <p class="text-sm text-slate-400">120 articulos en 6 meses (20/mes). Los primeros 40 articulos (Abril y Mayo) ya estan planificados. Los 80 restantes se definen mes a mes con datos reales de Analytics. Cada articulo tiene un boton claro: cotizar, agendar cita o hablar con un asesor.</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-2">okcars.ec</h4>
                    <p class="text-sm text-slate-400">120 articulos en 6 meses (20/mes). Los primeros 40 articulos (Abril y Mayo) ya estan planificados. Los 80 restantes se definen con datos reales. El hilo conductor es CONFIANZA — OKCars no es un patio cualquiera, tiene el respaldo de 50 anos de Comercial Hidrobo.</p>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Footer -->
<footer class="border-t border-slate-800/50 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-slate-500">Informe confidencial — Comercial Hidrobo S.A.</p>
            <p class="text-sm text-slate-500">Preparado por Creative Web — Marzo 2026</p>
        </div>
    </div>
</footer>

<script>
// Tab switching
function switchTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tabName).classList.add('active');
    event.target.classList.add('active');
    window.scrollTo({ top: 200, behavior: 'smooth' });
}

// Keywords Chart
const kwCtx = document.getElementById('keywordsChart');
if (kwCtx) {
    new Chart(kwCtx, {
        type: 'bar',
        data: {
            labels: ['comercial hidrobo', 'com. hidrobo ibarra', 'dongfeng rich 6', 'duster precio ec.', 'com. hidrobo cayambe', 'hidrobo', 'hyundai exonerados', 'com. hidrobo usados', 'renault duster', 'toyota ibarra'],
            datasets: [{
                label: 'Clics organicos',
                data: [2788, 458, 277, 269, 263, 247, 209, 180, 153, 145],
                backgroundColor: 'rgba(59, 130, 246, 0.6)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { color: 'rgba(148, 163, 184, 0.1)' }, ticks: { color: '#94a3b8' } },
                y: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } }
            }
        }
    });
}

// Projection Chart
const projCtx = document.getElementById('projectionChart');
if (projCtx) {
    new Chart(projCtx, {
        type: 'line',
        data: {
            labels: ['Mar (actual)', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep'],
            datasets: [
                {
                    label: 'Leads/mes',
                    data: [8, 8, 14, 18, 22, 25, 28],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#3b82f6'
                },
                {
                    label: 'Visitas organicas (x100)',
                    data: [31, 31, 33, 36, 38, 40, 45],
                    borderColor: '#8b5cf6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#8b5cf6'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#94a3b8' } } },
            scales: {
                x: { grid: { color: 'rgba(148, 163, 184, 0.1)' }, ticks: { color: '#94a3b8' } },
                y: { grid: { color: 'rgba(148, 163, 184, 0.1)' }, ticks: { color: '#94a3b8' } }
            }
        }
    });
}
</script>

</body>
</html>
