<?php
session_start();
if (!isset($_SESSION['auth_luuma']) || $_SESSION['auth_luuma'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe SEO Marzo 2026 — Luuma Rooftop</title>
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
                    brand: { 50: '#faf5ff', 100: '#f3e8ff', 200: '#e9d5ff', 400: '#c084fc', 500: '#a855f7', 600: '#9333ea', 700: '#7e22ce', 800: '#6b21a8', 900: '#581c87' }
                }
            }
        }
    }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(30, 41, 59, 0.5); backdrop-filter: blur(12px); }
        .gradient-text { background: linear-gradient(135deg, #a855f7, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .stat-card { transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.3); }
        .tab-btn.active { background: rgba(168, 85, 247, 0.15); color: #a855f7; border-color: #a855f7; }
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
                    <h1 class="text-sm font-semibold text-white">Informe SEO & Posicionamiento</h1>
                    <p class="text-xs text-slate-400">Marzo 2026 — Mes Inicial</p>
                </div>
            </div>
            <div class="flex items-center gap-4 no-print">
                <span class="text-xs text-slate-500">Luuma Rooftop</span>
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
                    <p class="text-sm font-medium text-brand-500 mb-2">PLAN ESTRATEGICO SEO + SEO LOCAL</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Luuma Rooftop — Manta, Ecuador</h2>
                    <p class="text-slate-400 max-w-xl">Plan de posicionamiento organico y local para convertir a luumarooftop.com en la referencia gastronomica digital de Manta. Este informe presenta el estado inicial del sitio (lanzado en octubre 2025) y la estrategia completa de contenido SEO.</p>
                </div>
                <div class="flex flex-col gap-2 text-right shrink-0">
                    <span class="text-xs text-slate-500">Preparado por</span>
                    <span class="text-sm font-semibold text-white">Creative Web</span>
                    <span class="text-xs text-slate-500">26 de Marzo, 2026</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Tabs -->
    <div class="mb-8 no-print">
        <div class="flex flex-wrap gap-2">
            <button onclick="switchTab('resumen')" class="tab-btn active px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Resumen Ejecutivo</button>
            <button onclick="switchTab('auditoria')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Auditoria SEO</button>
            <button onclick="switchTab('local')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">SEO Local</button>
            <button onclick="switchTab('contenido')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Contenido Publicado</button>
            <button onclick="switchTab('plan')" class="tab-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Plan 3 Meses</button>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- TAB 1: Resumen Ejecutivo -->
    <!-- ============================================================ -->
    <div id="tab-resumen" class="tab-content active space-y-8">

        <!-- Intro explicativa -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
            <h3 class="text-base font-semibold text-white mb-2">Que es este informe?</h3>
            <p class="text-sm text-slate-400 leading-relaxed">Este documento presenta el estado actual de la pagina web de Luuma Rooftop (<strong class="text-slate-300">luumarooftop.com</strong>), lanzada en octubre de 2025. Al ser un sitio nuevo, el punto de partida en SEO es practicamente cero, lo que es <strong class="text-slate-300">completamente normal</strong>. Este informe detalla la estrategia que estamos implementando para posicionar a Luuma como el restaurante #1 en busquedas de Google en Manta.</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-3"><strong class="text-slate-300">Que es el trafico organico?</strong> Son las personas que llegan a tu pagina web porque buscaron algo en Google (por ejemplo, "restaurante en Manta" o "rooftop Manta") y Google les mostro tu sitio en los resultados. Es la forma mas valiosa de atraer clientes porque es <strong class="text-slate-300">100% gratuita</strong> — a diferencia de la publicidad pagada, no se paga nada por cada visita. Para un restaurante, esto significa que personas que ya estan buscando donde comer en Manta pueden encontrar a Luuma directamente en Google.</p>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Paginas del sitio</p>
                <p class="text-3xl font-bold text-white">8</p>
                <p class="text-xs text-brand-400 mt-1">Sitio lanzado oct 2025</p>
                <p class="text-xs text-slate-500 mt-1">Inicio, Historia, Menu, Bebidas, Eventos, Contacto, Galeria, Menu Ejecutivo</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Articulos SEO</p>
                <p class="text-3xl font-bold text-white">10</p>
                <p class="text-xs text-emerald-400 mt-1">Publicados en el primer mes</p>
                <p class="text-xs text-slate-500 mt-1">Base de contenido para posicionamiento</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Keywords objetivo</p>
                <p class="text-3xl font-bold text-white">25+</p>
                <p class="text-xs text-brand-400 mt-1">Restaurante manta, rooftop manta, etc.</p>
                <p class="text-xs text-slate-500 mt-1">Palabras clave que la gente busca en Google</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Meta descriptions</p>
                <p class="text-3xl font-bold text-white">0/8</p>
                <p class="text-xs text-amber-400 mt-1">Pendiente implementacion</p>
                <p class="text-xs text-slate-500 mt-1">Textos que Google muestra debajo del titulo</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Imagenes optimizadas</p>
                <p class="text-3xl font-bold text-white">16/60+</p>
                <p class="text-xs text-amber-400 mt-1">Alt text SEO aplicado</p>
                <p class="text-xs text-slate-500 mt-1">Textos descriptivos en las fotos para Google</p>
            </div>
            <div class="stat-card rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Google Business Profile</p>
                <p class="text-3xl font-bold text-white">Pendiente</p>
                <p class="text-xs text-amber-400 mt-1">Proximo paso critico</p>
                <p class="text-xs text-slate-500 mt-1">Ficha de Google Maps para aparecer en busquedas locales</p>
            </div>
        </div>

        <!-- Explanation box -->
        <div class="rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
            <h4 class="text-sm font-semibold text-brand-500 mb-2">Que significan estos numeros?</h4>
            <div class="space-y-2 text-sm text-slate-400">
                <p><strong class="text-slate-300">El sitio es nuevo (oct 2025):</strong> Tener un punto de partida bajo en trafico organico es completamente normal para cualquier sitio web nuevo. Google necesita tiempo para descubrir, rastrear e indexar las paginas. Los 10 articulos publicados son la base que empezara a generar resultados en los proximos 2-3 meses.</p>
                <p><strong class="text-slate-300">Los 10 articulos son la semilla:</strong> Cada articulo esta optimizado para una keyword especifica que la gente busca en Google (como "restaurantes en Manta" o "mariscos Manta"). A medida que Google los indexe y posicione, comenzaran a atraer visitantes de forma gratuita y constante.</p>
                <p><strong class="text-slate-300">Las meta descriptions y alt text pendientes:</strong> Son optimizaciones tecnicas que vamos a implementar en el proximo mes. Las meta descriptions son los textos que aparecen debajo del titulo en Google — tener buenas descripciones hace que mas personas hagan clic en tu resultado.</p>
            </div>
        </div>

        <!-- Goals -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Metas de crecimiento</h3>
            <p class="text-sm text-slate-400 mb-4">Estas son las metas que buscamos alcanzar en los proximos 3 meses de trabajo SEO. Cada metrica tiene un punto de partida (donde estamos hoy) y una meta realista.</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3">Metrica</th><th class="text-right pb-3">Actual</th><th class="text-right pb-3">Meta (3 meses)</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800"><td class="py-2.5">Paginas indexadas en Google</td><td class="text-right">8</td><td class="text-right text-emerald-400">30+</td></tr>
                        <tr class="border-t border-slate-800"><td class="py-2.5">Articulos de blog</td><td class="text-right">10</td><td class="text-right text-emerald-400">24+</td></tr>
                        <tr class="border-t border-slate-800"><td class="py-2.5">Keywords en top 10 de Google</td><td class="text-right text-slate-500">0 (nuevo)</td><td class="text-right text-emerald-400">15+</td></tr>
                        <tr class="border-t border-slate-800"><td class="py-2.5">Trafico organico/mes</td><td class="text-right text-slate-500">~50 (nuevo)</td><td class="text-right text-emerald-400">500+</td></tr>
                        <tr class="border-t border-slate-800"><td class="py-2.5">Resenas en Google</td><td class="text-right text-slate-500">Pendiente</td><td class="text-right text-emerald-400">50+</td></tr>
                        <tr class="border-t border-slate-800"><td class="py-2.5">Directorios registrados</td><td class="text-right">2 (FB, IG)</td><td class="text-right text-emerald-400">10+</td></tr>
                        <tr class="border-t border-slate-800"><td class="py-2.5">Schema types implementados</td><td class="text-right">3</td><td class="text-right text-emerald-400">8+</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- TAB 2: Auditoria SEO -->
    <!-- ============================================================ -->
    <div id="tab-auditoria" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Auditoria SEO — luumarooftop.com</h2>

        <!-- Estado actual de metadatos -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Estado actual de metadatos</h3>
            <p class="text-sm text-slate-400 mb-4">Estos son los elementos SEO que Google necesita en cada pagina. Como el sitio fue lanzado recientemente, estos elementos estan pendientes de configurar — es parte normal del proceso de optimizacion.</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3">Pagina</th><th class="text-left pb-3">Title actual</th><th class="text-center pb-3">Largo</th><th class="text-center pb-3">Meta Desc.</th><th class="text-center pb-3">Canonical</th><th class="text-center pb-3">Open Graph</th><th class="text-center pb-3">Alt text</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Inicio</td><td class="text-slate-400">Inicio - Luuma</td><td class="text-center">14</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Nuestra Historia</td><td class="text-slate-400">Nuestra Historia - Luuma</td><td class="text-center">25</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Menu</td><td class="text-slate-400">Menu - Luuma</td><td class="text-center">12</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Bebidas</td><td class="text-slate-400">Bebidas - Luuma</td><td class="text-center">16</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Eventos</td><td class="text-slate-400">Eventos - Luuma</td><td class="text-center">16</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Contacto</td><td class="text-slate-400">Contacto - Luuma</td><td class="text-center">17</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Galeria</td><td class="text-slate-400">Galeria - Luuma</td><td class="text-center">16</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">Menu Ejecutivo</td><td class="text-slate-400">(generico)</td><td class="text-center">—</td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-slate-500 mt-4">Todos estos elementos seran configurados como parte del plan de optimizacion del primer mes.</p>
        </div>

        <!-- Title Tags — Plan de optimizacion -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Title Tags — Plan de optimizacion</h3>
            <p class="text-sm text-slate-400 mb-4">Los titulos de cada pagina son lo primero que Google muestra en los resultados de busqueda. Titulos descriptivos con las palabras clave correctas hacen una gran diferencia en el posicionamiento. Aqui esta el plan para cada pagina:</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3">Pagina</th><th class="text-left pb-3">Titulo actual</th><th class="text-left pb-3">Titulo propuesto</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Inicio</td><td class="text-slate-500">Inicio - Luuma</td><td class="text-brand-400">Luuma Rooftop Manta — Restaurante con Vista al Mar, Cocteles y Eventos en Vivo</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Nuestra Historia</td><td class="text-slate-500">Nuestra Historia - Luuma</td><td class="text-brand-400">Nuestra Historia — Luuma Rooftop, +10 Anos en Manta, Ecuador</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Menu</td><td class="text-slate-500">Menu - Luuma</td><td class="text-brand-400">Menu Completo — Mariscos, Sushi, Parrilla y Mas en Luuma Rooftop Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Bebidas</td><td class="text-slate-500">Bebidas - Luuma</td><td class="text-brand-400">Cocteles y Bebidas — Carta de Bar en Luuma Rooftop Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Eventos</td><td class="text-slate-500">Eventos - Luuma</td><td class="text-brand-400">Eventos y Musica en Vivo — Luuma Rooftop Manta, Ecuador</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Contacto</td><td class="text-slate-500">Contacto - Luuma</td><td class="text-brand-400">Reservaciones y Contacto — Luuma Rooftop Manta - WhatsApp Directo</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Galeria</td><td class="text-slate-500">Galeria - Luuma</td><td class="text-brand-400">Galeria de Fotos — Vista al Mar, Gastronomia y Noches en Luuma Rooftop</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 font-medium">Menu Ejecutivo</td><td class="text-slate-500">(generico)</td><td class="text-brand-400">Menu Ejecutivo del Dia — Almuerzo en Luuma Rooftop Manta desde $2</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Keywords objetivo -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Keywords objetivo — Volumen de busqueda mensual estimado</h3>
            <p class="text-sm text-slate-400 mb-4">Estas son las palabras que la gente busca en Google y para las cuales queremos que Luuma aparezca en los primeros resultados. El numero indica cuantas personas buscan esa palabra cada mes.</p>
            <div class="h-96">
                <canvas id="keywordsChart"></canvas>
            </div>
        </div>

        <!-- Schema Markup pendiente -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Schema Markup — Proximo paso tecnico</h3>
            <p class="text-sm text-slate-400 mb-4">Los "Schema" son codigos especiales que le dicen a Google exactamente que tipo de negocio eres. Esto permite que tu restaurante aparezca con informacion enriquecida en los resultados de busqueda (estrellas, horarios, precios, etc.).</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Restaurant</h4>
                    <p class="text-xs text-slate-400">Permite que Google muestre nombre, direccion, horarios, rango de precios y tipo de cocina directamente en los resultados de busqueda.</p>
                </div>
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Menu</h4>
                    <p class="text-xs text-slate-400">Permite que Google muestre secciones del menu, platos destacados y rangos de precios cuando alguien busca "menu Luuma Rooftop".</p>
                </div>
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Event</h4>
                    <p class="text-xs text-slate-400">Permite que los eventos de Luuma aparezcan en Google con fecha, hora y descripcion. Ideal para noches de musica en vivo y eventos especiales.</p>
                </div>
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">FAQPage</h4>
                    <p class="text-xs text-slate-400">Permite que las preguntas frecuentes aparezcan directamente en Google, ocupando mas espacio visual y atrayendo mas clics.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- TAB 3: SEO Local -->
    <!-- ============================================================ -->
    <div id="tab-local" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">SEO Local — Posicionamiento en Google Maps</h2>

        <!-- Google Business Profile -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Google Business Profile — Configuracion a implementar</h3>
            <p class="text-sm text-slate-400 mb-4">El perfil de Google Business (la ficha de Google Maps) es la herramienta mas importante para que las personas que buscan restaurantes en Manta encuentren a Luuma. Cuando alguien busca "restaurante cerca de mi" o "donde comer en Manta", Google muestra un mapa con los negocios cercanos — necesitamos que Luuma aparezca ahi.</p>
            <div class="rounded-lg border border-brand-500/20 bg-brand-500/5 p-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Nombre del negocio</p>
                            <p class="text-sm text-white font-semibold">Luuma Rooftop</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Categoria principal</p>
                            <p class="text-sm text-white">Restaurante</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Direccion</p>
                            <p class="text-sm text-white">Plaza La Quadra, ultimo piso, Manta, Manabi</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Telefono</p>
                            <p class="text-sm text-white">+593 96 348 5983</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Horarios</p>
                            <div class="text-sm text-slate-300 space-y-1">
                                <p>Lunes a Jueves: 12:00 - 23:00</p>
                                <p>Viernes y Sabado: 12:00 - 01:00</p>
                                <p>Domingo: 12:00 - 22:00</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Atributos</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                <span class="px-2 py-1 text-xs rounded-full bg-brand-600/20 text-brand-400 border border-brand-500/20">Terraza</span>
                                <span class="px-2 py-1 text-xs rounded-full bg-brand-600/20 text-brand-400 border border-brand-500/20">Vista al mar</span>
                                <span class="px-2 py-1 text-xs rounded-full bg-brand-600/20 text-brand-400 border border-brand-500/20">Musica en vivo</span>
                                <span class="px-2 py-1 text-xs rounded-full bg-brand-600/20 text-brand-400 border border-brand-500/20">Reservaciones</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Directorios para registrar -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Directorios para registrar</h3>
            <p class="text-sm text-slate-400 mb-4">Registrar a Luuma en multiples directorios online ayuda a que Google confirme que el negocio es real y relevante. Esto se llama "NAP consistency" (Nombre, Direccion, Telefono iguales en todos lados) y es un factor importante de posicionamiento local.</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-left pb-3">#</th><th class="text-left pb-3">Directorio</th><th class="text-center pb-3">Prioridad</th><th class="text-center pb-3">Estado</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">1</td><td>Google Business Profile</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-red-500/20 text-red-400">Critica</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">2</td><td>Facebook</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-red-500/20 text-red-400">Critica</span></td><td class="text-center"><span class="text-emerald-400">Activo</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">3</td><td>Instagram</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-red-500/20 text-red-400">Critica</span></td><td class="text-center"><span class="text-emerald-400">Activo</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">4</td><td>TripAdvisor</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-orange-500/20 text-orange-400">Alta</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">5</td><td>Yelp</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-orange-500/20 text-orange-400">Alta</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">6</td><td>Apple Maps</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-orange-500/20 text-orange-400">Alta</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">7</td><td>PaginasAmarillas</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Media</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">8</td><td>Ecuador.com</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Media</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">9</td><td>Waze</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Media</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">10</td><td>Foursquare</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Media</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">11</td><td>TheFork</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Media</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">12</td><td>Bing Places</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-slate-500/20 text-slate-400">Baja</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">13</td><td>Guia de Manta</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-slate-500/20 text-slate-400">Baja</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5">14</td><td>Booking.com</td><td class="text-center"><span class="px-2 py-0.5 text-xs rounded-full bg-slate-500/20 text-slate-400">Baja</span></td><td class="text-center"><span class="text-amber-400">Pendiente</span></td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Estrategia de resenas -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Estrategia de resenas en Google</h3>
            <p class="text-sm text-slate-400 mb-4">Las resenas de Google son uno de los factores mas importantes para el posicionamiento local. Un restaurante con 50+ resenas positivas aparece mucho mas arriba en Google Maps que uno sin resenas. Aqui esta el plan para conseguirlas de forma organica:</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Codigos QR en mesas</h4>
                    <p class="text-xs text-slate-400">Colocar un codigo QR en cada mesa que lleve directamente a la pagina de resenas de Google. El cliente solo escanea y deja su opinion.</p>
                </div>
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Link directo de resenas</h4>
                    <p class="text-xs text-slate-400">Crear un enlace corto personalizado que abra directamente el formulario de resena de Google. Se puede compartir por WhatsApp despues de cada visita.</p>
                </div>
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Responder el 100%</h4>
                    <p class="text-xs text-slate-400">Responder todas las resenas (positivas y negativas) demuestra a Google que el negocio esta activo y se preocupa por sus clientes.</p>
                </div>
                <div class="stat-card rounded-xl border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="w-10 h-10 rounded-lg bg-brand-600/20 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h4 class="text-sm font-semibold text-white mb-1">Meta: 50 resenas en 3 meses</h4>
                    <p class="text-xs text-slate-400">Con un promedio de 4-5 resenas por semana, podemos alcanzar 50+ resenas en 3 meses. Esto posicionara a Luuma por encima de la mayoria de restaurantes en Manta.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- TAB 4: Contenido Publicado -->
    <!-- ============================================================ -->
    <div id="tab-contenido" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Contenido SEO Publicado</h2>

        <!-- Articulos SEO publicados -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">10 Articulos SEO publicados</h3>
            <p class="text-sm text-slate-400 mb-4">Estos son los 10 articulos optimizados para SEO que ya estan publicados en el blog de luumarooftop.com. Cada articulo fue escrito para posicionar una keyword especifica y atraer visitantes desde Google.</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-center pb-3 w-8">#</th><th class="text-left pb-3">Fecha</th><th class="text-left pb-3">Titulo</th><th class="text-left pb-3">Keyword</th><th class="text-left pb-3">URL</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">1</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">5 Nov 2025</td>
                            <td class="py-2.5 pr-3">Los 10 Mejores Restaurantes en Manta Ecuador: Guia Gastronomica 2026</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">restaurantes en Manta Ecuador</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/gastronomia-manta/mejores-restaurantes-manta-ecuador/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/gastronomia-manta/mejores-restaurantes-manta-ecuador/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">2</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">12 Nov 2025</td>
                            <td class="py-2.5 pr-3">Rooftop en Manta: La Mejor Experiencia Gastronomica con Vista al Mar</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">rooftop en Manta</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/gastronomia-manta/rooftop-manta-experiencia-gastronomica/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/gastronomia-manta/rooftop-manta-experiencia-gastronomica/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">3</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">19 Nov 2025</td>
                            <td class="py-2.5 pr-3">Que Hacer en Manta Ecuador: Guia Turistica Completa 2026</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">que hacer en Manta Ecuador</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/vida-en-manta/que-hacer-manta-ecuador-guia-turistica/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/vida-en-manta/que-hacer-manta-ecuador-guia-turistica/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">4</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">26 Nov 2025</td>
                            <td class="py-2.5 pr-3">Eventos con Musica en Vivo en Manta: Agenda Cultural 2026</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">musica en vivo en Manta</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/eventos-entretenimiento/eventos-musica-vivo-manta-agenda/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/eventos-entretenimiento/eventos-musica-vivo-manta-agenda/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">5</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">3 Dic 2025</td>
                            <td class="py-2.5 pr-3">Mariscos en Manta: Los Mejores Ceviches y Platos del Mar</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">mariscos en Manta</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/gastronomia-manta/mariscos-manta-ceviches-platos-mar/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/gastronomia-manta/mariscos-manta-ceviches-platos-mar/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">6</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">10 Dic 2025</td>
                            <td class="py-2.5 pr-3">Cocteles Artesanales en Manta: Guia de Mixologia en Luuma Rooftop</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">cocteles en Manta</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/cocteles-mixologia/cocteles-artesanales-manta-mixologia/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/cocteles-mixologia/cocteles-artesanales-manta-mixologia/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">7</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">17 Dic 2025</td>
                            <td class="py-2.5 pr-3">Restaurantes para Eventos Privados en Manta: Celebra en Grande</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">eventos privados en Manta</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/eventos-entretenimiento/restaurantes-eventos-privados-manta/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/eventos-entretenimiento/restaurantes-eventos-privados-manta/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">8</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">28 Dic 2025</td>
                            <td class="py-2.5 pr-3">Comida Criolla Manabita: Tradicion y Sabor en cada Plato</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">comida criolla manabita</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/recetas-cocina/comida-criolla-manabita-tradicion/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/recetas-cocina/comida-criolla-manabita-tradicion/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">9</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">8 Ene 2026</td>
                            <td class="py-2.5 pr-3">Donde Cenar en Manta con Vista al Mar: Top 5 Restaurantes Romanticos</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">cenar en Manta con vista al mar</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/vida-en-manta/cenar-manta-vista-mar-restaurantes-romanticos/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/vida-en-manta/cenar-manta-vista-mar-restaurantes-romanticos/</a></td>
                        </tr>
                        <tr class="border-t border-slate-800/50">
                            <td class="py-2.5 text-center text-slate-500">10</td>
                            <td class="py-2.5 text-slate-500 whitespace-nowrap">15 Ene 2026</td>
                            <td class="py-2.5 pr-3">Menu Ejecutivo en Manta: Donde Almorzar Bien y a Buen Precio</td>
                            <td class="py-2.5 text-brand-400 whitespace-nowrap">menu ejecutivo en Manta</td>
                            <td class="py-2.5"><a href="https://luumarooftop.com/gastronomia-manta/menu-ejecutivo-manta-almorzar/" target="_blank" class="text-brand-400 hover:text-brand-500 underline text-xs">/gastronomia-manta/menu-ejecutivo-manta-almorzar/</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Optimizacion Yoast SEO -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Optimizacion Yoast SEO por articulo</h3>
            <p class="text-sm text-slate-400 mb-4">Cada uno de los 10 articulos fue configurado con las mejores practicas de SEO usando el plugin Yoast. Esto es lo que se optimizo en cada publicacion:</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                    <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <div>
                        <p class="text-sm font-medium text-white">Frase clave objetivo</p>
                        <p class="text-xs text-slate-400">Cada articulo tiene una keyword principal configurada en Yoast</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                    <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <div>
                        <p class="text-sm font-medium text-white">Titulo SEO personalizado</p>
                        <p class="text-xs text-slate-400">Titulo optimizado con keyword para los resultados de Google</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                    <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <div>
                        <p class="text-sm font-medium text-white">Meta description optimizada</p>
                        <p class="text-xs text-slate-400">Descripcion persuasiva que aparece debajo del titulo en Google</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                    <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <div>
                        <p class="text-sm font-medium text-white">3 imagenes con alt text + keyword</p>
                        <p class="text-xs text-slate-400">Imagenes optimizadas para Google Images con texto alternativo descriptivo</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                    <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <div>
                        <p class="text-sm font-medium text-white">Imagen destacada</p>
                        <p class="text-xs text-slate-400">Imagen principal optimizada que se muestra al compartir en redes sociales</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                    <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <div>
                        <p class="text-sm font-medium text-white">Enlaces internos</p>
                        <p class="text-xs text-slate-400">Links a /menu/, /contacto/, /eventos/ dentro de cada articulo</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex items-start gap-3 p-3 rounded-lg border border-slate-700/30">
                <span class="mt-0.5 w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0"><svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                <div>
                    <p class="text-sm font-medium text-white">Seccion FAQ al final de cada articulo</p>
                    <p class="text-xs text-slate-400">Preguntas frecuentes que ayudan a posicionar para busquedas conversacionales y pueden aparecer directamente en Google</p>
                </div>
            </div>
        </div>

        <!-- Categorias creadas -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Categorias del blog creadas</h3>
            <p class="text-sm text-slate-400 mb-4">El contenido esta organizado en 5 categorias tematicas. Esto ayuda a Google a entender la estructura del sitio y facilita la navegacion para los visitantes.</p>
            <div class="flex flex-wrap gap-3">
                <span class="px-4 py-2 text-sm rounded-lg bg-brand-600/20 text-brand-400 border border-brand-500/20 font-medium">Gastronomia en Manta</span>
                <span class="px-4 py-2 text-sm rounded-lg bg-brand-600/20 text-brand-400 border border-brand-500/20 font-medium">Vida en Manta</span>
                <span class="px-4 py-2 text-sm rounded-lg bg-brand-600/20 text-brand-400 border border-brand-500/20 font-medium">Eventos y Entretenimiento</span>
                <span class="px-4 py-2 text-sm rounded-lg bg-brand-600/20 text-brand-400 border border-brand-500/20 font-medium">Recetas y Cocina</span>
                <span class="px-4 py-2 text-sm rounded-lg bg-brand-600/20 text-brand-400 border border-brand-500/20 font-medium">Cocteles y Mixologia</span>
            </div>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- TAB 5: Plan 3 Meses -->
    <!-- ============================================================ -->
    <div id="tab-plan" class="tab-content space-y-8">

        <h2 class="text-2xl font-bold text-white">Plan de Accion — Proximos 3 Meses</h2>

        <!-- Calendario de contenido -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Calendario de contenido — Proximos 14 articulos</h3>
            <p class="text-sm text-slate-400 mb-4">Estos son los articulos que se publicaran en los proximos meses, organizados por prioridad. Los de prioridad alta se enfocan en keywords con mayor volumen de busqueda.</p>

            <!-- Priority Alta -->
            <h4 class="text-sm font-semibold text-brand-500 mb-3 mt-6">Prioridad Alta — Abril 2026</h4>
            <div class="overflow-x-auto mb-6">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-center pb-3 w-8">#</th><th class="text-left pb-3">Titulo del articulo</th><th class="text-left pb-3">Keyword objetivo</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">11</td><td class="py-2.5">Los Mejores Rooftop Bars de Ecuador</td><td class="text-brand-400">rooftop bars Ecuador</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">12</td><td class="py-2.5">Vida Nocturna en Manta: Guia Completa</td><td class="text-brand-400">vida nocturna Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">13</td><td class="py-2.5">Restaurantes con Vista al Mar en Manta</td><td class="text-brand-400">restaurantes vista al mar Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">14</td><td class="py-2.5">Ceviche Ecuatoriano: Historia, Receta y Donde Probarlo</td><td class="text-brand-400">ceviche ecuatoriano</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">15</td><td class="py-2.5">Sushi en Manta: Donde Encontrar el Mejor Sushi</td><td class="text-brand-400">sushi Manta</td></tr>
                    </tbody>
                </table>
            </div>

            <!-- Priority Media -->
            <h4 class="text-sm font-semibold text-amber-400 mb-3">Prioridad Media — Mayo / Junio 2026</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="text-slate-500 border-b border-slate-800"><th class="text-center pb-3 w-8">#</th><th class="text-left pb-3">Titulo del articulo</th><th class="text-left pb-3">Keyword objetivo</th></tr></thead>
                    <tbody class="text-slate-300">
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">16</td><td class="py-2.5">Happy Hour en Manta: Los Mejores Bares con Promociones</td><td class="text-brand-400">happy hour Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">17</td><td class="py-2.5">Brunch en Manta: Donde Desayunar con Estilo</td><td class="text-brand-400">brunch Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">18</td><td class="py-2.5">Restaurantes para Cumpleanos en Manta</td><td class="text-brand-400">cumpleanos restaurante Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">19</td><td class="py-2.5">Parrillada en Manta: Donde Comer la Mejor Carne</td><td class="text-brand-400">parrillada Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">20</td><td class="py-2.5">Turismo Gastronomico en Manabi: Ruta de Sabores</td><td class="text-brand-400">turismo gastronomico Manabi</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">21</td><td class="py-2.5">Restaurantes Romanticos en Manta para Parejas</td><td class="text-brand-400">restaurantes romanticos Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">22</td><td class="py-2.5">Playa Murcielago Manta: Que Hacer y Donde Comer</td><td class="text-brand-400">playa Murcielago Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">23</td><td class="py-2.5">Catering en Manta: Servicios para Eventos y Fiestas</td><td class="text-brand-400">catering Manta</td></tr>
                        <tr class="border-t border-slate-800/50"><td class="py-2.5 text-center text-slate-500">24</td><td class="py-2.5">Los Mejores Postres en Manta: Dulces Tentaciones</td><td class="text-brand-400">postres Manta</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Acciones tecnicas por mes -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Acciones tecnicas por mes</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Mes 1 -->
                <div class="rounded-lg border border-brand-500/20 bg-brand-500/5 p-5">
                    <h4 class="text-sm font-bold text-brand-400 mb-1">Mes 1 — Abril 2026</h4>
                    <p class="text-xs text-slate-500 mb-3">Fundamentos</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Meta descriptions en 8 paginas</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Title tags optimizados</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Canonical tags + www redirect</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Schema Restaurant en homepage</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Google Business Profile</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Open Graph en Yoast</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-brand-500 shrink-0"></span><span class="text-xs text-slate-300">Alt text en 44+ imagenes restantes</span></li>
                    </ul>
                </div>

                <!-- Mes 2 -->
                <div class="rounded-lg border border-slate-700/50 p-5">
                    <h4 class="text-sm font-bold text-white mb-1">Mes 2 — Mayo 2026</h4>
                    <p class="text-xs text-slate-500 mb-3">Contenido y Local</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">5 articulos adicionales</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Registrar NAP en 5 directorios</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Schema Menu y Event</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Pagina FAQ con Schema</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Enlazado interno mejorado</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Pagina "Nuestro Equipo"</span></li>
                    </ul>
                </div>

                <!-- Mes 3 -->
                <div class="rounded-lg border border-slate-700/50 p-5">
                    <h4 class="text-sm font-bold text-white mb-1">Mes 3 — Junio 2026</h4>
                    <p class="text-xs text-slate-500 mb-3">Escalamiento</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">8-10 articulos mas</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Landing pages: Eventos Privados, Happy Hour, Brunch</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Plugin de cache y Core Web Vitals</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Sistema de resenas (QR en mesas)</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">CDN Cloudflare</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Facebook Pixel</span></li>
                        <li class="flex items-start gap-2"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-500 shrink-0"></span><span class="text-xs text-slate-300">Linkbuilding local</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Proyeccion de crecimiento -->
        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-2">Proyeccion de crecimiento</h3>
            <p class="text-sm text-slate-400 mb-4">Esta grafica muestra la proyeccion estimada de crecimiento de Luuma Rooftop en los proximos meses. El crecimiento organico es gradual — los primeros meses son de siembra, y los resultados se aceleran a partir del tercer mes.</p>
            <div class="h-80">
                <canvas id="projectionChart"></canvas>
            </div>
        </div>

    </div>

</main>

<!-- Footer -->
<footer class="border-t border-slate-800/50 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <p class="text-xs text-slate-500 text-center">Este informe es confidencial y de uso exclusivo para Luuma Rooftop. Preparado por Creative Web — Marzo 2026.</p>
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
            labels: ['restaurante manta', 'mejores restaurantes manta', 'donde comer en manta', 'mariscos manta', 'rooftop manta', 'eventos manta', 'sushi manta', 'bar manta ecuador', 'cocteles manta', 'menu ejecutivo manta'],
            datasets: [{
                label: 'Busquedas mensuales estimadas',
                data: [750, 400, 350, 350, 200, 200, 200, 150, 100, 100],
                backgroundColor: 'rgba(168, 85, 247, 0.6)',
                borderColor: 'rgba(168, 85, 247, 1)',
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
            labels: ['Oct 2025', 'Nov 2025', 'Dic 2025', 'Ene 2026', 'Feb 2026', 'Mar 2026', 'Abr 2026'],
            datasets: [
                {
                    label: 'Paginas indexadas',
                    data: [8, 8, 8, 8, 18, 25, 35],
                    borderColor: '#a855f7',
                    backgroundColor: 'rgba(168, 85, 247, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#a855f7'
                },
                {
                    label: 'Trafico organico estimado',
                    data: [0, 10, 30, 50, 150, 300, 500],
                    borderColor: '#c084fc',
                    backgroundColor: 'rgba(192, 132, 252, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#c084fc'
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
