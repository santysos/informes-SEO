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
    <title>Informe SEO Marzo 2026 — Odontologia Life</title>
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
        .glass-lighter { background: rgba(51, 65, 85, 0.4); border: 1px solid rgba(148, 163, 184, 0.06); }
        .glass-accent { background: rgba(59, 130, 246, 0.08); border: 1px solid rgba(59, 130, 246, 0.15); }
        .gradient-text { background: linear-gradient(135deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .stat-card { transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.3); }
        .tab-btn.active { background: rgba(59, 130, 246, 0.15); color: #3b82f6; border-color: #3b82f6; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .progress-bar { transition: width 1s ease-in-out; }
        .timeline-line { position: absolute; left: 23px; top: 48px; bottom: 0; width: 2px; background: linear-gradient(to bottom, #3b82f6, #6366f1, #8b5cf6); }
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
                    <h1 class="text-sm font-semibold text-white">Informe SEO & Contenido</h1>
                    <p class="text-xs text-slate-400">Marzo 2026 — Continuacion del Trabajo</p>
                </div>
            </div>
            <div class="flex items-center gap-4 no-print">
                <span class="text-xs text-slate-500 hidden sm:inline">Odontologia Life</span>
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
                    <p class="text-sm font-medium text-brand-500 mb-2">PLAN ESTRATEGICO SEO + CONTENIDO</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Odontologia Life</h2>
                    <p class="text-slate-400 max-w-xl">Plan de 6 meses (Abril - Septiembre 2026) para posicionar su consultorio en Google, atraer pacientes de Otavalo y alrededores, y medir cuantas personas realmente contactan por WhatsApp, llaman o agendan cita.</p>
                </div>
                <div class="flex flex-col gap-2 text-right shrink-0">
                    <span class="text-xs text-slate-500">Preparado por</span>
                    <span class="text-sm font-semibold text-white">Creative Web</span>
                    <span class="text-xs text-slate-500">28 de Marzo, 2026</span>
                    <span class="text-xs text-slate-500 mt-1">odontologialife.com</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Tabs -->
    <div class="mb-8 no-print">
        <div class="flex flex-wrap gap-2">
            <button onclick="switchTab('resumen')" class="tab-btn active px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Resumen Ejecutivo</button>
            <button onclick="switchTab('anterior')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Trabajo Anterior</button>
            <button onclick="switchTab('trafico')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Trafico y Resultados</button>
            <button onclick="switchTab('plan')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Plan 6 Meses</button>
            <button onclick="switchTab('ads')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Google Ads + SEO Local</button>
            <button onclick="switchTab('trabajo')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Trabajo Realizado</button>
        </div>
    </div>

    <!-- ==================== TAB 1: RESUMEN EJECUTIVO ==================== -->
    <div id="tab-resumen" class="tab-content active space-y-8">

        <!-- Intro explicativa -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-base font-semibold text-white mb-2">Que es este informe?</h3>
            <p class="text-sm text-slate-400 leading-relaxed">Este informe es un resumen completo de <strong class="text-slate-300">como esta funcionando su pagina web odontologialife.com en Google</strong>. Aqui vera datos reales: cuantas personas visitan su sitio, que buscan en Google para encontrarlo, de que ciudades llegan, y cuales de sus articulos funcionan mejor.</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Tambien incluye el <strong class="text-slate-300">plan de trabajo de los proximos 6 meses</strong> para que cuando alguien busque "dentista en Otavalo", "implantes dentales Ecuador" o "blanqueamiento dental precio", su consultorio aparezca en los primeros resultados de Google.</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Los datos fueron obtenidos de <strong class="text-slate-300">Google Analytics</strong> (la herramienta que mide cuantas personas visitan la pagina) y <strong class="text-slate-300">Google Search Console</strong> (que muestra que busca la gente en Google para llegar al sitio). El periodo analizado es <strong class="text-slate-300">noviembre 2025 a marzo 2026</strong> (5 meses).</p>
        </div>

        <!-- KPI Cards -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-4">Numeros Principales (Nov 2025 - Mar 2026)</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Usuarios totales (5 meses)</p>
                    <p class="text-3xl font-bold text-white">428</p>
                    <p class="text-xs text-slate-500 mt-1">Personas que visitaron la web</p>
                </div>
                <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Usuarios desde Google</p>
                    <p class="text-3xl font-bold text-emerald-400">242</p>
                    <p class="text-xs text-emerald-400 mt-1">56.5% del total — visitas gratuitas</p>
                </div>
                <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Articulos de blog publicados</p>
                    <p class="text-3xl font-bold text-white">53</p>
                    <p class="text-xs text-blue-400 mt-1">49 originales + 4 nuevos</p>
                </div>
                <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Veces que aparecemos en Google</p>
                    <p class="text-3xl font-bold text-blue-400">28,000+</p>
                    <p class="text-xs text-slate-500 mt-1">Impresiones en resultados de busqueda</p>
                </div>
                <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics desde Google</p>
                    <p class="text-3xl font-bold text-purple-400">271</p>
                    <p class="text-xs text-slate-500 mt-1">Personas que hicieron clic en Google</p>
                </div>
                <div class="stat-card rounded-xl border border-red-500/30 glass p-5">
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Medicion de contactos</p>
                    <p class="text-3xl font-bold text-red-400">SIN MEDIR</p>
                    <p class="text-xs text-red-400 mt-1">No sabemos cuantos contactan</p>
                </div>
            </div>
        </div>

        <!-- Explanation box -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
            <h4 class="text-sm font-semibold text-brand-500 mb-2">Que significan estos numeros?</h4>
            <div class="space-y-2 text-sm text-slate-400">
                <p><strong class="text-slate-300">Usuarios totales (428):</strong> Son las personas diferentes que visitaron su pagina web en 5 meses. Es como contar cuantas personas entraron a su consultorio, pero en version digital.</p>
                <p><strong class="text-slate-300">Usuarios desde Google (242):</strong> De esos 428, hay 242 que llegaron buscando algo en Google — por ejemplo, "implantes dentales Ecuador" o "dentista Otavalo". Estas visitas son las mas valiosas porque son <strong class="text-white">gratuitas</strong> (no se paga nada por cada persona que llega) y porque son personas que YA estan buscando un dentista.</p>
                <p><strong class="text-slate-300">Impresiones (28,000+):</strong> Significa que Google mostro su pagina web en sus resultados de busqueda mas de 28,000 veces. No todas esas personas hacen clic, pero ya estan viendo el nombre "Odontologia Life" cuando buscan algo dental.</p>
                <p><strong class="text-slate-300">Medicion de contactos (SIN MEDIR):</strong> Actualmente no tenemos forma de saber cuantas de esas 428 personas realmente le escribieron por WhatsApp, llamaron, o agendaron cita. Es el problema principal que vamos a resolver con la instalacion de <strong class="text-white">Google Tag Manager</strong> (una herramienta gratuita de medicion).</p>
            </div>
        </div>

        <!-- Diagnosis -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Diagnostico General</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-emerald-400 mb-3">Lo que funciona bien</h4>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">53 articulos publicados desde septiembre 2025 — la base de contenido es solida</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">El post de implantes dentales genera <strong class="text-white">183 clics al mes</strong> — es nuestro mejor contenido y prueba que la estrategia funciona</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">El 56% del trafico viene de Google (busquedas gratuitas) — no depende solo de redes sociales</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">Sitio web moderno con WordPress + Yoast SEO — buena base tecnica</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-red-400 mb-3">Lo que necesitamos mejorar</h4>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-red-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300"><strong class="text-red-400">No medimos cuantas personas contactan</strong> — sin Google Tag Manager no sabemos si hacen clic en WhatsApp o llaman</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-red-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">35+ articulos con 0 clics en Google — necesitan optimizacion de titulos y descripciones</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-red-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">URLs duplicadas en /uncategorized/ que confunden a Google</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-red-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></span>
                            <p class="text-sm text-slate-300">El trafico viene de Quito y Guayaquil, pero los pacientes reales son de Otavalo — <strong class="text-amber-400">necesitamos SEO local</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Main Problem -->
        <div class="rounded-xl border border-amber-500/20 bg-amber-500/5 p-6">
            <h3 class="text-lg font-semibold text-amber-400 mb-3">El problema principal: no sabemos cuantos visitantes se convierten en pacientes</h3>
            <p class="text-sm text-slate-400 mb-4">Imagine que su consultorio tiene una sala de espera donde entran <strong class="text-white">428 personas en 5 meses</strong>, pero usted no tiene recepcionista contando quienes piden cita y quienes solo miran. Eso es exactamente lo que pasa con la pagina web hoy: sabemos que la gente llega, pero <strong class="text-white">no tenemos forma de medir cuantos realmente le escriben por WhatsApp, cuantos llaman, o cuantos agendan cita</strong>.</p>
            <div class="grid md:grid-cols-3 gap-6 mt-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-white">428</div>
                    <div class="text-sm text-slate-400 mt-1">Personas visitaron la web</div>
                    <div class="w-full h-2 bg-slate-700 rounded-full mt-3">
                        <div class="h-2 bg-brand-500 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-amber-400">???</div>
                    <div class="text-sm text-slate-400 mt-1">Hicieron clic en WhatsApp</div>
                    <div class="w-full h-2 bg-slate-700 rounded-full mt-3">
                        <div class="h-2 bg-amber-500 rounded-full" style="width: 0%"></div>
                    </div>
                    <div class="text-xs text-red-400 mt-1">Sin medicion</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-amber-400">???</div>
                    <div class="text-sm text-slate-400 mt-1">Llamaron o agendaron cita</div>
                    <div class="w-full h-2 bg-slate-700 rounded-full mt-3">
                        <div class="h-2 bg-amber-500 rounded-full" style="width: 0%"></div>
                    </div>
                    <div class="text-xs text-red-400 mt-1">Sin medicion</div>
                </div>
            </div>
            <div class="mt-6 p-4 rounded-lg bg-slate-800/50 border border-slate-700/50">
                <p class="text-sm text-slate-300"><strong class="text-white">La solucion:</strong> Vamos a instalar <strong class="text-white">Google Tag Manager</strong> (GTM), una herramienta gratuita de Google que nos permite medir exactamente: cuantas personas hacen clic en el boton de WhatsApp, cuantas llaman al consultorio desde la web, y cuantas envian un formulario. Asi, cada mes podremos reportar numeros reales de contactos generados.</p>
            </div>
        </div>

    </div>

    <!-- ==================== TAB 2: TRABAJO ANTERIOR (SEPT-OCT 2025) ==================== -->
    <div id="tab-anterior" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Trabajo Anterior: Septiembre - Octubre 2025</h2>

        <!-- Context box -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-6">
            <h3 class="text-base font-semibold text-brand-500 mb-2">Contexto importante</h3>
            <p class="text-sm text-slate-400 leading-relaxed">En <strong class="text-slate-300">septiembre y octubre de 2025</strong> realizamos el primer trabajo de SEO para Odontologia Life: creamos y publicamos <strong class="text-slate-300">49 articulos de blog optimizados para Google</strong>. Cada articulo fue escrito para responder una busqueda real que hacen las personas en Google (por ejemplo, "cuanto cuesta un implante dental en Ecuador").</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Esos 49 articulos son <strong class="text-white">la base que ha generado los 242 usuarios organicos y las 28,000+ impresiones en Google</strong> que vemos hoy. El SEO (posicionamiento en buscadores) tarda entre 3 y 6 meses en mostrar resultados completos, y ya estamos viendo el crecimiento.</p>
        </div>

        <!-- Categories breakdown -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Articulos por Categoria</h3>
            <p class="text-sm text-slate-500 mb-4">49 articulos originales + 4 nuevos de marzo 2026 = 53 articulos totales</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Prevencion y Cuidado</span>
                        <span class="text-sm font-bold text-brand-400">8</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 100%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Estetica y Tendencias</span>
                        <span class="text-sm font-bold text-brand-400">7</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 87%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Ortodoncia</span>
                        <span class="text-sm font-bold text-brand-400">4</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 50%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Implantologia</span>
                        <span class="text-sm font-bold text-brand-400">4</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 50%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Odontologia Publicos Especificos</span>
                        <span class="text-sm font-bold text-brand-400">4</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 50%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Habitos y Educacion</span>
                        <span class="text-sm font-bold text-brand-400">4</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 50%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Tratamientos y Procedimientos</span>
                        <span class="text-sm font-bold text-brand-400">4</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 50%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Periodoncia</span>
                        <span class="text-sm font-bold text-brand-400">3</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 37%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Rehabilitacion Oral</span>
                        <span class="text-sm font-bold text-brand-400">3</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 37%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Endodoncia</span>
                        <span class="text-sm font-bold text-brand-400">3</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 37%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Servicios y Emergencias</span>
                        <span class="text-sm font-bold text-brand-400">3</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 37%"></div></div>
                </div>
                <div class="rounded-lg border border-slate-700/50 p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-slate-300 font-medium">Cirugia Maxilofacial</span>
                        <span class="text-sm font-bold text-brand-400">2</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-700 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width: 25%"></div></div>
                </div>
            </div>
        </div>

        <!-- Top 5 articles -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Top 5 Articulos con Mejor Rendimiento</h3>
            <p class="text-sm text-slate-500 mb-4">Estos son los articulos que mas trafico estan generando desde Google</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3 pr-4">Articulo</th><th class="text-right pb-3">Clics</th><th class="text-right pb-3">Impresiones</th><th class="text-right pb-3">Posicion</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4"><span class="text-brand-400">Implantes dentales en Ecuador</span></td><td class="text-right font-semibold text-emerald-400">183</td><td class="text-right text-slate-500">17,767</td><td class="text-right text-amber-400">7.7</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4"><span class="text-brand-400">Homepage</span></td><td class="text-right font-semibold">19</td><td class="text-right text-slate-500">2,225</td><td class="text-right text-emerald-400">4.2</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4"><span class="text-brand-400">Blanqueamiento dental en Ecuador</span></td><td class="text-right font-semibold">13</td><td class="text-right text-slate-500">4,037</td><td class="text-right text-amber-400">9.2</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4"><span class="text-brand-400">Ortodoncia en Otavalo</span></td><td class="text-right font-semibold">11</td><td class="text-right text-slate-500">275</td><td class="text-right text-emerald-400">6.1</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4"><span class="text-brand-400">Odontopediatra en Otavalo</span></td><td class="text-right font-semibold">8</td><td class="text-right text-slate-500">151</td><td class="text-right text-emerald-400">5.0</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Result statement -->
        <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/5 p-6">
            <div class="flex items-start gap-3">
                <span class="mt-0.5 w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                <div>
                    <h4 class="text-sm font-semibold text-emerald-400 mb-1">Conclusion</h4>
                    <p class="text-sm text-slate-300">Estos 49 articulos creados en septiembre-octubre 2025 son los que han generado el trafico organico que vemos hoy: <strong class="text-white">242 usuarios desde Google, 28,000+ impresiones y 271 clics</strong>. El articulo de implantes dentales por si solo genera 183 clics al mes, demostrando que cuando el contenido esta bien optimizado, Google lo posiciona y atrae pacientes potenciales.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- ==================== TAB 3: TRAFICO Y RESULTADOS ==================== -->
    <div id="tab-trafico" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Trafico y Resultados</h2>

        <!-- Charts Row -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Donut: Traffic Sources -->
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <h3 class="text-lg font-semibold text-white mb-2">De donde vienen los visitantes?</h3>
                <p class="text-xs text-slate-500 mb-4">Fuentes de trafico — Nov 2025 a Mar 2026</p>
                <div class="flex justify-center">
                    <div style="max-width: 300px; width: 100%;">
                        <canvas id="trafficSourcesChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Bar: Top Cities -->
            <div class="rounded-xl border border-slate-800/50 glass p-6">
                <h3 class="text-lg font-semibold text-white mb-2">De que ciudades nos visitan?</h3>
                <p class="text-xs text-slate-500 mb-4">Top 5 ciudades por numero de usuarios</p>
                <canvas id="citiesChart"></canvas>
            </div>
        </div>

        <!-- Insight box: local traffic problem -->
        <div class="rounded-xl border border-amber-500/20 bg-amber-500/5 p-6">
            <div class="flex items-start gap-3">
                <span class="mt-0.5 w-6 h-6 rounded-full bg-amber-500/20 flex items-center justify-center shrink-0"><svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></span>
                <div>
                    <h4 class="text-sm font-semibold text-amber-400 mb-1">Dato importante sobre las ciudades</h4>
                    <p class="text-sm text-slate-300">La mayoria del trafico viene de <strong class="text-white">Quito (75 usuarios) y Guayaquil (36 usuarios)</strong>, pero los pacientes reales de su consultorio estan en <strong class="text-white">Otavalo y alrededores</strong> (Ibarra, Cotacachi, Atuntaqui, San Pablo). Esto nos indica que necesitamos reforzar el <strong class="text-amber-400">SEO local</strong> — es decir, optimizar la web para que Google la muestre especificamente a personas que buscan un dentista en su zona. Eso lo trabajaremos con Google Business Profile, resenas de pacientes y contenido enfocado en Otavalo.</p>
                </div>
            </div>
        </div>

        <!-- Top Keywords -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-1">Palabras clave que ya generan visitas</h3>
            <p class="text-sm text-slate-500 mb-4">Estas son las busquedas que la gente hace en Google y que llevan visitantes a su pagina web</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3 pr-4">Que busca la gente en Google</th><th class="text-right pb-3">Clics</th><th class="text-right pb-3">Impresiones</th><th class="text-right pb-3">CTR</th><th class="text-right pb-3">Posicion</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-brand-400">cuanto cuesta un implante dental en ecuador</td><td class="text-right font-semibold text-emerald-400">11</td><td class="text-right text-slate-500">567</td><td class="text-right">1.94%</td><td class="text-right text-amber-400">4.5</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-brand-400">cuanto cuesta un implante dental</td><td class="text-right font-semibold text-emerald-400">5</td><td class="text-right text-slate-500">131</td><td class="text-right">3.82%</td><td class="text-right text-emerald-400">3.9</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-brand-400">cuanto vale un implante dental en ecuador</td><td class="text-right font-semibold text-emerald-400">5</td><td class="text-right text-slate-500">137</td><td class="text-right">3.65%</td><td class="text-right text-emerald-400">4.1</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-brand-400">implante dental precio ecuador</td><td class="text-right font-semibold">3</td><td class="text-right text-slate-500">120</td><td class="text-right">2.50%</td><td class="text-right text-amber-400">9.3</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-brand-400">cuanto cuesta una protesis dental en ecuador</td><td class="text-right font-semibold">2</td><td class="text-right text-slate-500">51</td><td class="text-right">3.92%</td><td class="text-right text-emerald-400">6.3</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-slate-500 mt-3"><strong class="text-slate-400">CTR</strong> = Tasa de clics. De cada 100 veces que Google muestra nuestra pagina, cuantas personas hacen clic. | <strong class="text-slate-400">Posicion</strong> = En que lugar de Google aparecemos (1 = primer resultado).</p>
        </div>

        <!-- High opportunity keywords -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-1 flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-amber-500/20 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg></span>
                Oportunidades: Google nos muestra pero nadie hace clic
            </h3>
            <p class="text-sm text-slate-500 mb-4">Estas busquedas ya muestran su pagina web en Google, pero aun nadie hace clic. Con mejoras de posicion y descripciones mas atractivas, estas palabras pueden generar decenas de visitas extra cada mes.</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3 pr-4">Busqueda en Google</th><th class="text-right pb-3">Impresiones</th><th class="text-right pb-3">Posicion</th><th class="text-right pb-3">Potencial</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-amber-400">blanqueamiento dental</td><td class="text-right">533</td><td class="text-right text-red-400">65</td><td class="text-right"><span class="bg-amber-500/15 text-amber-400 text-xs font-semibold px-2 py-1 rounded-full">Alto</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-amber-400">blanqueamiento dental precio</td><td class="text-right">218</td><td class="text-right text-amber-400">6.6</td><td class="text-right"><span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-1 rounded-full">Quick Win</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-amber-400">implante dental</td><td class="text-right">204</td><td class="text-right text-red-400">50</td><td class="text-right"><span class="bg-amber-500/15 text-amber-400 text-xs font-semibold px-2 py-1 rounded-full">Alto</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-amber-400">costo implante dental ecuador</td><td class="text-right">112</td><td class="text-right text-amber-400">4.8</td><td class="text-right"><span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-1 rounded-full">Quick Win</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4 text-amber-400">endodoncia</td><td class="text-right">51</td><td class="text-right text-amber-400">9</td><td class="text-right"><span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-1 rounded-full">Quick Win</span></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 p-3 rounded-lg bg-slate-800/50 border border-slate-700/50">
                <p class="text-xs text-slate-400"><strong class="text-slate-300">Quick Win</strong> = Victoria rapida. Ya estamos en posiciones cercanas al top 10, con pequenas mejoras podemos subir y empezar a recibir clics. | <strong class="text-slate-300">Alto potencial</strong> = Hay mucha gente buscando esto, pero estamos lejos de la primera pagina. Necesita mas contenido y optimizacion.</p>
            </div>
        </div>

        <!-- Daily Users Growth Chart -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Crecimiento de Usuarios Nuevos por Dia</h3>
            <p class="text-sm text-slate-500 mb-4">Noviembre 2025 - Marzo 2026 — Se ve una tendencia de crecimiento gradual</p>
            <canvas id="usersGrowthChart" height="120"></canvas>
        </div>

    </div>

    <!-- ==================== TAB 4: PLAN 6 MESES ==================== -->
    <div id="tab-plan" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Plan de 6 Meses: Abril - Septiembre 2026</h2>

        <!-- Plan intro -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-6">
            <h3 class="text-base font-semibold text-brand-500 mb-2">Que vamos a hacer?</h3>
            <p class="text-sm text-slate-400 leading-relaxed">Vamos a publicar <strong class="text-slate-300">20 articulos nuevos cada mes durante 6 meses</strong> (120 articulos en total). Cada articulo esta disenado para responder una busqueda real que hacen las personas en Google — por ejemplo, "dentista en Otavalo", "cuanto cuesta un blanqueamiento dental" o "brackets precio Ecuador". Cuando alguien busca esto y Google muestra nuestro articulo, esa persona visita la web del consultorio y puede agendar una cita.</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-2">Ademas de los articulos, cada mes incluye mejoras tecnicas: instalar herramientas de medicion, optimizar el perfil de Google, corregir errores, y mas.</p>
        </div>

        <!-- Timeline -->
        <div class="relative">
            <div class="timeline-line"></div>
            <div class="space-y-6">
                <!-- Mes 1 -->
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center flex-shrink-0 z-10">
                        <span class="text-emerald-400 font-bold text-sm">1</span>
                    </div>
                    <div class="rounded-xl border border-slate-800/50 glass p-5 flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <h4 class="text-white font-bold">Abril 2026</h4>
                            <span class="bg-emerald-500/15 text-emerald-400 text-xs font-semibold px-2 py-0.5 rounded-full">INICIADO</span>
                        </div>
                        <p class="text-slate-400 text-sm mb-2"><strong class="text-slate-300">20 articulos nuevos</strong> + instalacion de Google Tag Manager + correcciones tecnicas</p>
                        <ul class="text-slate-500 text-xs space-y-1">
                            <li>- 20 articulos SEO sobre temas de alta demanda (implantes, blanqueamiento, ortodoncia, emergencias)</li>
                            <li>- Instalar Google Tag Manager para medir clics en WhatsApp, llamadas y formularios</li>
                            <li>- Corregir URLs duplicadas /uncategorized/</li>
                            <li>- Optimizar meta descriptions de los 35+ posts con 0 clics</li>
                        </ul>
                    </div>
                </div>
                <!-- Mes 2 -->
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center flex-shrink-0 z-10">
                        <span class="text-blue-400 font-bold text-sm">2</span>
                    </div>
                    <div class="rounded-xl border border-slate-800/50 glass p-5 flex-1">
                        <h4 class="text-white font-bold mb-2">Mayo 2026</h4>
                        <p class="text-slate-400 text-sm mb-2"><strong class="text-slate-300">20 articulos nuevos</strong> + SEO Local + Google Business Profile</p>
                        <ul class="text-slate-500 text-xs space-y-1">
                            <li>- 20 articulos enfocados en tratamientos especificos y precios</li>
                            <li>- Optimizar Google Business Profile (el perfil que aparece en Google Maps)</li>
                            <li>- Registrar en directorios medicos (Doctoralia, Paginas Amarillas EC)</li>
                            <li>- Solicitar primeras resenas a pacientes satisfechos</li>
                        </ul>
                    </div>
                </div>
                <!-- Mes 3 -->
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center flex-shrink-0 z-10">
                        <span class="text-blue-400 font-bold text-sm">3</span>
                    </div>
                    <div class="rounded-xl border border-slate-800/50 glass p-5 flex-1">
                        <h4 class="text-white font-bold mb-2">Junio 2026</h4>
                        <p class="text-slate-400 text-sm mb-2"><strong class="text-slate-300">20 articulos nuevos</strong> + Google Ads Local + optimizacion de posts existentes</p>
                        <ul class="text-slate-500 text-xs space-y-1">
                            <li>- 20 articulos sobre ortodoncia, estetica dental y prevencion</li>
                            <li>- Iniciar campanas de Google Ads enfocadas en Otavalo y alrededores</li>
                            <li>- Optimizar los articulos existentes que ya tienen trafico para mejorar su posicion</li>
                            <li>- Analizar datos de GTM: cuantos contactos genera la web</li>
                        </ul>
                    </div>
                </div>
                <!-- Mes 4 -->
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center flex-shrink-0 z-10">
                        <span class="text-indigo-400 font-bold text-sm">4</span>
                    </div>
                    <div class="rounded-xl border border-slate-800/50 glass p-5 flex-1">
                        <h4 class="text-white font-bold mb-2">Julio 2026</h4>
                        <p class="text-slate-400 text-sm mb-2"><strong class="text-slate-300">20 articulos nuevos</strong> + E-E-A-T (autoridad medica) + contenido educativo</p>
                        <ul class="text-slate-500 text-xs space-y-1">
                            <li>- 20 articulos educativos de alta autoridad medica</li>
                            <li>- Fortalecer el perfil del doctor en el sitio web (biografia, credenciales, fotos)</li>
                            <li>- Agregar Schema de LocalBusiness y MedicalOrganization (datos tecnicos que ayudan a Google a entender que es un consultorio dental real)</li>
                            <li>- Optimizar campanas de Google Ads con datos reales del mes anterior</li>
                        </ul>
                    </div>
                </div>
                <!-- Mes 5 -->
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/20 border border-purple-500/30 flex items-center justify-center flex-shrink-0 z-10">
                        <span class="text-purple-400 font-bold text-sm">5</span>
                    </div>
                    <div class="rounded-xl border border-slate-800/50 glass p-5 flex-1">
                        <h4 class="text-white font-bold mb-2">Agosto 2026</h4>
                        <p class="text-slate-400 text-sm mb-2"><strong class="text-slate-300">20 articulos nuevos</strong> + pagina de preguntas frecuentes + link building</p>
                        <ul class="text-slate-500 text-xs space-y-1">
                            <li>- 20 articulos long tail (busquedas especificas que la gente realmente hace)</li>
                            <li>- Crear pagina mega de preguntas frecuentes con Schema FAQ</li>
                            <li>- Link building con directorios locales y medicos (que otras paginas enlacen a la nuestra)</li>
                            <li>- Segunda ronda de solicitud de resenas a pacientes</li>
                        </ul>
                    </div>
                </div>
                <!-- Mes 6 -->
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-xl bg-violet-500/20 border border-violet-500/30 flex items-center justify-center flex-shrink-0 z-10">
                        <span class="text-violet-400 font-bold text-sm">6</span>
                    </div>
                    <div class="rounded-xl border border-slate-800/50 glass p-5 flex-1">
                        <h4 class="text-white font-bold mb-2">Septiembre 2026</h4>
                        <p class="text-slate-400 text-sm mb-2"><strong class="text-slate-300">20 articulos nuevos</strong> + analisis completo + plan siguiente semestre</p>
                        <ul class="text-slate-500 text-xs space-y-1">
                            <li>- 20 articulos finales del plan (temas complementarios y locales)</li>
                            <li>- Analisis completo de 6 meses: que funciono, que no, que mejorar</li>
                            <li>- Informe de resultados con numeros reales de contactos generados</li>
                            <li>- Propuesta del plan para el siguiente semestre</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- KPI Targets Table -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Metas: donde estamos y a donde vamos</h3>
            <p class="text-sm text-slate-500 mb-4">Comparacion entre los numeros actuales y lo que esperamos lograr al final del plan de 6 meses</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3 pr-4">Que medimos</th><th class="text-right pb-3">Hoy</th><th class="text-center pb-3"></th><th class="text-right pb-3">Meta (Sep 2026)</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4">Usuarios desde Google cada mes</td><td class="text-right text-amber-400">~50</td><td class="text-center text-slate-500">→</td><td class="text-right text-emerald-400 font-semibold">500+</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4">Veces que aparecemos en Google al mes</td><td class="text-right text-amber-400">5,500</td><td class="text-center text-slate-500">→</td><td class="text-right text-emerald-400 font-semibold">50,000+</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4">Articulos totales en la web</td><td class="text-right text-amber-400">53</td><td class="text-center text-slate-500">→</td><td class="text-right text-emerald-400 font-semibold">173</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4">Palabras clave en los primeros 10 resultados</td><td class="text-right text-amber-400">~8</td><td class="text-center text-slate-500">→</td><td class="text-right text-emerald-400 font-semibold">50+</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4">CTR promedio (tasa de clics en Google)</td><td class="text-right text-amber-400">0.97%</td><td class="text-center text-slate-500">→</td><td class="text-right text-emerald-400 font-semibold">3%+</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 pr-4">Contactos medidos al mes (WhatsApp + llamadas + formularios)</td><td class="text-right text-red-400">Sin medir</td><td class="text-center text-slate-500">→</td><td class="text-right text-emerald-400 font-semibold">30+</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- ==================== TAB 5: GOOGLE ADS + SEO LOCAL ==================== -->
    <div id="tab-ads" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Google Ads + SEO Local</h2>

        <!-- Intro -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-6">
            <h3 class="text-base font-semibold text-brand-500 mb-2">Usted ya invierte en Google Ads, y eso es excelente</h3>
            <p class="text-sm text-slate-400 leading-relaxed">Vamos a complementar esa inversion con una <strong class="text-slate-300">estrategia de SEO local</strong>. Juntas, estas dos estrategias crean una "doble presencia" en Google: su consultorio aparece tanto en los <strong class="text-slate-300">resultados pagados</strong> (Google Ads, arriba de todo) como en los <strong class="text-slate-300">resultados gratuitos</strong> (SEO, los enlaces normales). Esto genera mucha mas confianza en el paciente.</p>
        </div>

        <!-- Difference explanation -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="rounded-xl border border-blue-500/20 bg-blue-500/5 p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-1 text-xs font-semibold bg-blue-500/20 text-blue-400 rounded-full">PAGADO</span>
                    <h4 class="text-sm font-semibold text-white">Google Ads</h4>
                </div>
                <ul class="text-sm text-slate-400 space-y-2">
                    <li class="flex gap-2"><span class="text-blue-400">-</span> Resultados <strong class="text-slate-300">inmediatos</strong>: aparece hoy mismo</li>
                    <li class="flex gap-2"><span class="text-blue-400">-</span> Se paga por cada clic (~$0.30-1.50 en dental)</li>
                    <li class="flex gap-2"><span class="text-blue-400">-</span> Cuando deja de pagar, deja de aparecer</li>
                    <li class="flex gap-2"><span class="text-blue-400">-</span> Ideal para emergencias dentales y busquedas locales urgentes</li>
                </ul>
            </div>
            <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/5 p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-1 text-xs font-semibold bg-emerald-500/20 text-emerald-400 rounded-full">GRATUITO</span>
                    <h4 class="text-sm font-semibold text-white">SEO (Posicionamiento organico)</h4>
                </div>
                <ul class="text-sm text-slate-400 space-y-2">
                    <li class="flex gap-2"><span class="text-emerald-400">-</span> Resultados a <strong class="text-slate-300">mediano plazo</strong> (3-6 meses)</li>
                    <li class="flex gap-2"><span class="text-emerald-400">-</span> No se paga por cada clic — el trafico es gratuito</li>
                    <li class="flex gap-2"><span class="text-emerald-400">-</span> Los resultados se mantienen en el tiempo</li>
                    <li class="flex gap-2"><span class="text-emerald-400">-</span> Genera confianza: la gente confia mas en resultados organicos</li>
                </ul>
            </div>
        </div>

        <!-- Suggested Campaigns -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Campanas de Google Ads sugeridas</h3>
            <p class="text-sm text-slate-500 mb-4">4 campanas enfocadas en atraer pacientes de Otavalo y ciudades cercanas</p>
            <div class="grid md:grid-cols-2 gap-4">
                <!-- Campaign 1 -->
                <div class="rounded-lg border border-blue-500/20 bg-blue-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-semibold bg-blue-500/20 text-blue-400 rounded-full">1</span>
                        <h4 class="text-sm font-semibold text-white">Dentista Otavalo</h4>
                    </div>
                    <p class="text-xs text-slate-400 mb-2">Para personas buscando un dentista en la zona</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">dentista otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">clinica dental otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">odontologia otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">dentista cerca de mi</span>
                    </div>
                </div>
                <!-- Campaign 2 -->
                <div class="rounded-lg border border-purple-500/20 bg-purple-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-semibold bg-purple-500/20 text-purple-400 rounded-full">2</span>
                        <h4 class="text-sm font-semibold text-white">Implantes Dentales</h4>
                    </div>
                    <p class="text-xs text-slate-400 mb-2">Servicio de alto valor que atrae pacientes dispuestos a invertir</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">implantes dentales otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">implantes dentales ibarra</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">implantes dentales ecuador</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">precio implante dental</span>
                    </div>
                </div>
                <!-- Campaign 3 -->
                <div class="rounded-lg border border-red-500/20 bg-red-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-semibold bg-red-500/20 text-red-400 rounded-full">3</span>
                        <h4 class="text-sm font-semibold text-white">Emergencias Dentales</h4>
                    </div>
                    <p class="text-xs text-slate-400 mb-2">Pacientes con dolor urgente — alta intencion de contactar</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">emergencia dental otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">dolor de muela otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">dentista urgencia</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">dentista emergencia ibarra</span>
                    </div>
                </div>
                <!-- Campaign 4 -->
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 text-xs font-semibold bg-amber-500/20 text-amber-400 rounded-full">4</span>
                        <h4 class="text-sm font-semibold text-white">Blanqueamiento / Estetica</h4>
                    </div>
                    <p class="text-xs text-slate-400 mb-2">Tratamientos esteticos con alta demanda de busqueda</p>
                    <div class="flex flex-wrap gap-1">
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">blanqueamiento dental otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">diseno de sonrisa otavalo</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">carillas dentales ecuador</span>
                        <span class="px-1.5 py-0.5 text-xs rounded bg-slate-800 text-slate-400">estetica dental ibarra</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Geographic targeting -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Segmentacion geografica</h3>
            <p class="text-sm text-slate-500 mb-4">Los anuncios se mostraran SOLO a personas que estan en estas zonas (radio de 30km aproximadamente)</p>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1.5 text-sm rounded-lg bg-brand-500/15 text-brand-400 font-medium border border-brand-500/20">Otavalo</span>
                <span class="px-3 py-1.5 text-sm rounded-lg bg-brand-500/10 text-brand-400 border border-brand-500/15">Cotacachi</span>
                <span class="px-3 py-1.5 text-sm rounded-lg bg-brand-500/10 text-brand-400 border border-brand-500/15">Atuntaqui</span>
                <span class="px-3 py-1.5 text-sm rounded-lg bg-brand-500/10 text-brand-400 border border-brand-500/15">San Pablo</span>
                <span class="px-3 py-1.5 text-sm rounded-lg bg-brand-500/10 text-brand-400 border border-brand-500/15">Ibarra</span>
            </div>
            <p class="text-xs text-slate-500 mt-3">Esto evita gastar dinero en clics de personas de Quito o Guayaquil que nunca viajarian a Otavalo por un dentista.</p>
        </div>

        <!-- SEO Local Actions -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Acciones de SEO Local</h3>
            <p class="text-sm text-slate-500 mb-4">Estas acciones son gratuitas y ayudan a que Google muestre su consultorio cuando alguien busca "dentista cerca de mi" desde Otavalo</p>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="glass-lighter rounded-xl p-4">
                    <h4 class="text-sm font-semibold text-white mb-2">Google Business Profile</h4>
                    <p class="text-xs text-slate-400">Optimizar completamente el perfil de Google Maps: fotos del consultorio, horarios exactos, servicios ofrecidos, descripcion con palabras clave. Esto es lo que aparece cuando alguien busca "dentista otavalo" en Google Maps.</p>
                </div>
                <div class="glass-lighter rounded-xl p-4">
                    <h4 class="text-sm font-semibold text-white mb-2">Resenas de pacientes</h4>
                    <p class="text-xs text-slate-400">Solicitar resenas en Google a pacientes satisfechos. Las resenas son uno de los factores mas importantes para aparecer en Google Maps. Meta: 20+ resenas en 6 meses.</p>
                </div>
                <div class="glass-lighter rounded-xl p-4">
                    <h4 class="text-sm font-semibold text-white mb-2">Directorios medicos</h4>
                    <p class="text-xs text-slate-400">Registrar el consultorio en Doctoralia, Paginas Amarillas Ecuador, y otros directorios de salud. Esto genera enlaces hacia la web y aumenta la visibilidad.</p>
                </div>
                <div class="glass-lighter rounded-xl p-4">
                    <h4 class="text-sm font-semibold text-white mb-2">NAP Consistency</h4>
                    <p class="text-xs text-slate-400">NAP = Nombre, Direccion, Telefono. Verificar que estos datos sean exactamente iguales en todos los sitios donde aparece el consultorio (web, Google, redes sociales, directorios). Google penaliza las inconsistencias.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- ==================== TAB 6: TRABAJO REALIZADO ==================== -->
    <div id="tab-trabajo" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Trabajo Realizado — Marzo 2026</h2>

        <!-- Completed Work -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-emerald-400 mb-4 flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                Completado este mes
            </h3>
            <div class="space-y-3">
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Auditoria SEO completa del sitio web y todos los articulos publicados</p>
                        <p class="text-slate-500 text-xs">Analisis de 53 paginas, estructura de categorias, velocidad de carga y errores tecnicos</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Analisis de Google Analytics — 5 meses de datos (noviembre 2025 a marzo 2026)</p>
                        <p class="text-slate-500 text-xs">428 usuarios, fuentes de trafico, ciudades, comportamiento de visitantes</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Analisis de Google Search Console — palabras clave, posiciones, impresiones</p>
                        <p class="text-slate-500 text-xs">Identificacion de oportunidades de posicionamiento y quick wins</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Identificacion de 500+ palabras clave donde aparece el sitio</p>
                        <p class="text-slate-500 text-xs">Mapeamos cada palabra clave con su volumen, posicion y potencial de mejora</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Plan estrategico SEO de 6 meses con calendario editorial (120 articulos nuevos)</p>
                        <p class="text-slate-500 text-xs">20 articulos por mes, KPIs, metas y estrategia de SEO local completa</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">4 articulos nuevos publicados y optimizados</p>
                        <p class="text-slate-500 text-xs mt-1 space-y-1">
                            <span class="block">1. <strong class="text-slate-400">Protesis dental en Ecuador</strong> — tipos, ventajas y opciones</span>
                            <span class="block">2. <strong class="text-slate-400">Diseno de sonrisa en Ecuador</strong> — procedimiento y beneficios</span>
                            <span class="block">3. <strong class="text-slate-400">Dentista en Otavalo</strong> — servicios y especialidades</span>
                            <span class="block">4. <strong class="text-slate-400">Endodoncia en Ecuador</strong> — guia del tratamiento de conducto</span>
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">12 imagenes profesionales optimizadas (formato WebP para carga rapida)</p>
                        <p class="text-slate-500 text-xs">Compresion agresiva para que la pagina cargue rapido en celular</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Configuracion SEO Yoast en cada articulo nuevo</p>
                        <p class="text-slate-500 text-xs">Titulo SEO, meta description, palabra clave objetivo y estructura de encabezados</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 glass-lighter rounded-xl p-4">
                    <span class="text-emerald-400 font-bold mt-0.5 shrink-0">&#10003;</span>
                    <div>
                        <p class="text-white text-sm font-medium">Estrategia de Google Ads local definida</p>
                        <p class="text-slate-500 text-xs">4 campanas sugeridas con palabras clave y segmentacion geografica</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Month -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-brand-500 mb-4 flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-brand-500/20 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-brand-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg></span>
                Proximo mes — Abril 2026
            </h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="glass-lighter rounded-xl p-4">
                    <h4 class="text-white text-sm font-semibold mb-2">Contenido (20 articulos)</h4>
                    <ul class="text-slate-400 text-xs space-y-1.5">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>20 articulos SEO nuevos sobre keywords de alta oportunidad</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Temas: coronas, carillas, extracciones, calzas, emergencias, precios</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Imagenes optimizadas WebP para cada articulo</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>FAQ Schema en articulos relevantes</li>
                    </ul>
                </div>
                <div class="glass-lighter rounded-xl p-4">
                    <h4 class="text-white text-sm font-semibold mb-2">Tecnico y Local</h4>
                    <ul class="text-slate-400 text-xs space-y-1.5">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Instalacion de Google Tag Manager (medir WhatsApp, llamadas)</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Correccion de URLs duplicadas /uncategorized/</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Optimizacion de Google Business Profile</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Inicio de campanas Google Ads locales</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Solicitar primeras resenas a pacientes</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</main>

<!-- Footer -->
<footer class="border-t border-slate-800/50 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-slate-500">Informe confidencial — Odontologia Life</p>
            <p class="text-sm text-slate-500">Desarrollado por <a href="https://creativeweb.com.ec" target="_blank" class="text-slate-400 hover:text-blue-400 font-medium transition-colors">Creative Web</a> — creativeweb.com.ec</p>
        </div>
    </div>
</footer>

<script>
// Tab switching
const tabNames = ['resumen', 'anterior', 'trafico', 'plan', 'ads', 'trabajo'];

function switchTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tabName).classList.add('active');

    const buttons = document.querySelectorAll('.tab-btn');
    const index = tabNames.indexOf(tabName);
    if (index >= 0 && buttons[index]) {
        buttons[index].classList.add('active');
    }

    window.scrollTo({ top: 200, behavior: 'smooth' });

    // Initialize charts when their tabs are visible
    if (tabName === 'trafico') {
        setTimeout(() => {
            initTrafficSourcesChart();
            initCitiesChart();
            initUsersGrowthChart();
        }, 100);
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
            plugins: { legend: { display: false } },
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
