<?php
session_start();
if (!isset($_SESSION['auth_dimapar_diag']) || $_SESSION['auth_dimapar_diag'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es-EC">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Diagnóstico Técnico — Dimapar Ecuador 2026</title>
<meta name="robots" content="noindex, nofollow">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
    :root {
      --surface-deep:#060B17; --surface-base:#0A0E1A;
      --surface-elevated:#111827; --surface-panel:#1F2937;
      --surface-line:#334155;
      --brand-400:#22D3EE; --brand-500:#06B6D4; --brand-600:#0891B2; --brand-deep:#0369A1;
      --fg:#FAFAFA; --fg-sec:#D1D5DB; --fg-mut:#9CA3AF;
      --critical:#EF4444; --important:#F59E0B; --minor:#FBBF24; --resolved:#10B981; --info:#22D3EE;
    }
    * { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Outfit', sans-serif; letter-spacing: -0.02em; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    body {
        background: var(--surface-base);
        color: var(--fg);
        background-image:
          radial-gradient(900px 600px at 90% -10%, rgba(34,211,238,0.08), transparent 60%),
          radial-gradient(700px 500px at -5% 80%, rgba(3,105,161,0.10), transparent 55%);
        background-attachment: fixed;
    }
    .glass {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(255,255,255,0.10);
    }
    .glass-cyan {
        background: linear-gradient(135deg, rgba(34,211,238,0.08), rgba(255,255,255,0.02));
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(34,211,238,0.20);
    }
    .tab-btn {
        transition: all .2s ease;
        border-bottom: 2px solid transparent;
    }
    .tab-btn:hover { color: var(--brand-400); }
    .tab-btn.active {
        color: var(--brand-400);
        border-bottom-color: var(--brand-400);
    }
    .tab-content { display: none; animation: fadeIn .25s ease; }
    .tab-content.active { display: block; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: none; } }

    .badge {
        display:inline-flex; align-items:center; gap:6px;
        padding:4px 10px; border-radius:6px;
        font-family:'JetBrains Mono',monospace;
        font-size:10px; font-weight:600;
        text-transform:uppercase; letter-spacing:0.10em;
    }
    .badge-critical  { background:rgba(239,68,68,0.12);   color:#FCA5A5; border:1px solid rgba(239,68,68,0.30); }
    .badge-important { background:rgba(245,158,11,0.12);  color:#FCD34D; border:1px solid rgba(245,158,11,0.30); }
    .badge-minor     { background:rgba(251,191,36,0.10);  color:#FDE68A; border:1px solid rgba(251,191,36,0.25); }
    .badge-resolved  { background:rgba(16,185,129,0.12);  color:#6EE7B7; border:1px solid rgba(16,185,129,0.30); }
    .badge-info      { background:rgba(34,211,238,0.10);  color:#67E8F9; border:1px solid rgba(34,211,238,0.25); }

    .problem-card {
        background: var(--surface-panel);
        border:1px solid rgba(255,255,255,0.08);
        border-radius:14px;
        padding:24px;
        transition: all .25s ease;
    }
    .problem-card:hover { border-color: rgba(34,211,238,0.25); transform: translateY(-1px); }
    .problem-card.resolved { background: linear-gradient(135deg, rgba(16,185,129,0.06), var(--surface-panel)); border-color: rgba(16,185,129,0.20); }

    .impact-box {
        background: rgba(255,255,255,0.03);
        border-left: 3px solid var(--brand-400);
        padding: 12px 16px;
        border-radius: 0 8px 8px 0;
        margin-top: 12px;
    }
    .resolved .impact-box { border-left-color: var(--resolved); }

    .status-tag {
        font-family:'JetBrains Mono',monospace; font-size:11px;
        padding:2px 8px; border-radius:4px;
    }

    /* Print */
    @media print {
        body { background: white !important; color: black !important; }
        .no-print { display: none !important; }
        .tab-content { display: block !important; page-break-inside: avoid; }
        .glass, .glass-cyan, .problem-card { background: white !important; border-color: #ddd !important; color: black !important; }
        h1, h2, h3, p, li, td, th { color: black !important; }
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 10px; height: 10px; }
    ::-webkit-scrollbar-track { background: var(--surface-base); }
    ::-webkit-scrollbar-thumb { background: var(--surface-line); border-radius: 5px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--brand-deep); }
</style>
</head>
<body>

<!-- HEADER -->
<header class="sticky top-0 z-50 glass border-b border-slate-700/50 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background:linear-gradient(135deg,#06B6D4,#0369A1); box-shadow:0 0 20px rgba(34,211,238,0.25);">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400">Informe técnico</p>
                    <h1 class="font-display text-lg font-bold text-white leading-tight">Diagnóstico del sitio web</h1>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="hidden md:block text-right">
                    <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500">Cliente</p>
                    <p class="text-sm font-medium text-white">Dimapar Ecuador</p>
                </div>
                <div class="hidden md:block text-right">
                    <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500">Fecha</p>
                    <p class="text-sm font-medium text-white">Mayo 2026</p>
                </div>
                <a href="logout.php" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-slate-800/60 hover:bg-slate-700/60 text-slate-300 text-xs font-medium transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Salir
                </a>
            </div>
        </div>

        <!-- Tab nav -->
        <nav class="mt-4 -mb-1 overflow-x-auto">
            <div class="flex gap-1 min-w-max">
                <button class="tab-btn active px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-300" onclick="switchTab('resumen')">Resumen</button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('contenido')">Contenido <span class="opacity-60">· 6</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('seo')">SEO técnico <span class="opacity-60">· 11</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('tienda')">Tienda <span class="opacity-60">· 9</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('performance')">Performance <span class="opacity-60">· 7</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('seguridad')">Seguridad <span class="opacity-60">· 6</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('a11y')">Accesibilidad <span class="opacity-60">· 2</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('tracking')">Tracking <span class="opacity-60">· 1</span></button>
                <button class="tab-btn px-4 py-2.5 text-xs font-semibold whitespace-nowrap text-slate-400" onclick="switchTab('conclusion')">Conclusión</button>
            </div>
        </nav>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

<!-- ====================== TAB 1: RESUMEN ====================== -->
<section id="tab-resumen" class="tab-content active">

    <!-- Intro -->
    <div class="glass-cyan rounded-2xl p-6 md:p-8 mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-3">Resumen ejecutivo</p>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4 leading-tight">
            42 problemas detectados.<br>
            <span class="text-cyan-400">3 ya resueltos</span>, el resto los resuelve el rediseño.
        </h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-3xl">
            Auditamos el sitio <span class="font-mono text-cyan-400">dimaparecuador.com</span> en 7 áreas técnicas (contenido, SEO, tienda, performance, seguridad, accesibilidad, tracking). El sitio actual está operando sobre la plantilla demo original sin personalizar — esto explica la mayoría de los problemas. La buena noticia: el rediseño que estamos ejecutando ataca directamente los 10 problemas críticos y la mayoría de los importantes.
        </p>
    </div>

    <!-- Big numbers -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="glass rounded-xl p-5">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Total detectados</p>
            <p class="font-display text-4xl font-extrabold text-white">42</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-color:rgba(239,68,68,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest mb-2" style="color:#FCA5A5;">Críticos</p>
            <p class="font-display text-4xl font-extrabold" style="color:#FCA5A5;">10</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-color:rgba(245,158,11,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest mb-2" style="color:#FCD34D;">Importantes</p>
            <p class="font-display text-4xl font-extrabold" style="color:#FCD34D;">19</p>
        </div>
        <div class="glass rounded-xl p-5" style="border-color:rgba(16,185,129,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest mb-2" style="color:#6EE7B7;">Ya resueltos</p>
            <p class="font-display text-4xl font-extrabold" style="color:#6EE7B7;">3</p>
        </div>
    </div>

    <!-- Chart + Tabla -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-8">
        <!-- Donut -->
        <div class="glass rounded-2xl p-6 lg:col-span-2">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Distribución por severidad</p>
            <h3 class="font-display text-lg font-semibold text-white mb-5">Cómo se reparten los 42</h3>
            <div class="relative" style="height:280px;">
                <canvas id="severityChart"></canvas>
            </div>
            <div class="grid grid-cols-2 gap-3 mt-5 text-xs">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#EF4444"></span><span class="text-slate-300">Críticos · 10</span></div>
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#F59E0B"></span><span class="text-slate-300">Importantes · 19</span></div>
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#FBBF24"></span><span class="text-slate-300">Menores · 13</span></div>
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#10B981"></span><span class="text-slate-300">Resueltos · 3</span></div>
            </div>
        </div>

        <!-- Tabla por área -->
        <div class="glass rounded-2xl p-6 lg:col-span-3">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Distribución por área</p>
            <h3 class="font-display text-lg font-semibold text-white mb-5">Dónde están los problemas</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-700/50">
                            <th class="text-left py-3 px-2 font-mono text-[10px] uppercase tracking-widest text-slate-500 font-medium">Área</th>
                            <th class="text-center py-3 px-2 font-mono text-[10px] uppercase tracking-widest font-medium" style="color:#FCA5A5">Críticos</th>
                            <th class="text-center py-3 px-2 font-mono text-[10px] uppercase tracking-widest font-medium" style="color:#FCD34D">Importantes</th>
                            <th class="text-center py-3 px-2 font-mono text-[10px] uppercase tracking-widest font-medium" style="color:#FDE68A">Menores</th>
                            <th class="text-center py-3 px-2 font-mono text-[10px] uppercase tracking-widest text-slate-500 font-medium">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-700/30"><td class="py-3 px-2 font-medium">Contenido y marca</td><td class="text-center text-red-300">3</td><td class="text-center text-amber-300">2</td><td class="text-center text-yellow-200">1</td><td class="text-center text-white font-semibold">6</td></tr>
                        <tr class="border-b border-slate-700/30"><td class="py-3 px-2 font-medium">SEO técnico</td><td class="text-center text-red-300">4</td><td class="text-center text-amber-300">5</td><td class="text-center text-yellow-200">2</td><td class="text-center text-white font-semibold">11</td></tr>
                        <tr class="border-b border-slate-700/30"><td class="py-3 px-2 font-medium">Estructura tienda</td><td class="text-center text-red-300">2</td><td class="text-center text-amber-300">4</td><td class="text-center text-yellow-200">3</td><td class="text-center text-white font-semibold">9</td></tr>
                        <tr class="border-b border-slate-700/30"><td class="py-3 px-2 font-medium">Performance</td><td class="text-center text-slate-500">0</td><td class="text-center text-amber-300">4</td><td class="text-center text-yellow-200">3</td><td class="text-center text-white font-semibold">7</td></tr>
                        <tr class="border-b border-slate-700/30"><td class="py-3 px-2 font-medium">Seguridad</td><td class="text-center text-red-300">1</td><td class="text-center text-amber-300">1</td><td class="text-center text-yellow-200">4</td><td class="text-center text-white font-semibold">6</td></tr>
                        <tr class="border-b border-slate-700/30"><td class="py-3 px-2 font-medium">Accesibilidad</td><td class="text-center text-slate-500">0</td><td class="text-center text-amber-300">2</td><td class="text-center text-slate-500">0</td><td class="text-center text-white font-semibold">2</td></tr>
                        <tr><td class="py-3 px-2 font-medium">Tracking / Analítica</td><td class="text-center text-slate-500">0</td><td class="text-center text-amber-300">1</td><td class="text-center text-slate-500">0</td><td class="text-center text-white font-semibold">1</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Stack analizado -->
    <div class="glass rounded-2xl p-6 mb-8">
        <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Configuración técnica analizada</p>
        <h3 class="font-display text-lg font-semibold text-white mb-4">Stack del sitio actual</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
            <div><p class="text-slate-500 text-xs mb-1">CMS</p><p class="text-white font-medium font-mono">WordPress 6.9.4</p></div>
            <div><p class="text-slate-500 text-xs mb-1">Tienda</p><p class="text-white font-medium font-mono">WooCommerce 10.7.0</p></div>
            <div><p class="text-slate-500 text-xs mb-1">Editor visual</p><p class="text-white font-medium font-mono">Elementor Pro 3.27.1</p></div>
            <div><p class="text-slate-500 text-xs mb-1">Plantilla activa</p><p class="font-medium font-mono" style="color:#FCA5A5">Woo Auto Parts <span class="text-xs opacity-60">(demo)</span></p></div>
            <div><p class="text-slate-500 text-xs mb-1">Productos</p><p class="text-white font-medium font-mono">159</p></div>
            <div><p class="text-slate-500 text-xs mb-1">Categorías</p><p class="text-white font-medium font-mono">51 <span class="text-emerald-400 text-xs">(reorganizadas)</span></p></div>
            <div><p class="text-slate-500 text-xs mb-1">Plugins activos</p><p class="text-white font-medium font-mono">6</p></div>
            <div><p class="text-slate-500 text-xs mb-1">Plugins inactivos</p><p class="text-amber-300 font-medium font-mono">21 <span class="text-xs">(basura)</span></p></div>
        </div>
    </div>

    <!-- Note -->
    <div class="glass-cyan rounded-2xl p-6">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 flex-shrink-0 mt-0.5" style="color:#22D3EE" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"/></svg>
            <div>
                <p class="text-white font-semibold mb-1">¿Cómo leer este informe?</p>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Cada pestaña del menú superior es un área técnica. Dentro de cada pestaña hay tarjetas individuales — una por problema. Cada tarjeta indica: <strong class="text-white">qué encontramos</strong>, <strong class="text-white">qué impacto tiene en su negocio</strong>, y <strong class="text-white">si ya fue resuelto, está en proceso, o queda pendiente</strong>. La pestaña final (Conclusión) explica cómo el rediseño resuelve estos problemas y qué entra en Fase 2 SEO.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ====================== TAB 2: CONTENIDO Y MARCA ====================== -->
<section id="tab-contenido" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 1 · 6 problemas</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Contenido y marca</h2>
        <p class="text-slate-400 max-w-3xl">Qué dice el sitio, en qué idioma y si refleja correctamente la propuesta de valor de Dimapar.</p>
    </header>

    <div class="grid grid-cols-1 gap-5">

        <!-- 1.1 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3">
                    <span class="badge badge-critical">🔴 Crítico</span>
                    <span class="font-mono text-xs text-slate-500">1.1</span>
                </div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Sitio operando sobre tema demo "Woo Auto Parts"</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El sitio nunca fue migrado a un diseño propio. La plantilla original viene con páginas, menús y configuración del demo de un comercio genérico de autopartes en EE.UU. Los textos heredados están en inglés y la estructura visual no refleja a Dimapar.</p>
            <div class="impact-box">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p>
                <p class="text-slate-300 text-sm">Los visitantes reciben un mensaje incoherente con la marca. Los textos en inglés rompen confianza. Google indexa páginas del demo como si fueran oficiales de Dimapar.</p>
            </div>
        </div>

        <!-- 1.2 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3">
                    <span class="badge badge-critical">🔴 Crítico</span>
                    <span class="font-mono text-xs text-slate-500">1.2</span>
                </div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">14 páginas del demo siguen públicas e indexables</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Detectamos 14 páginas heredadas del demo Woo Auto Parts en inglés, todas accesibles públicamente en URLs como:</p>
            <div class="font-mono text-xs text-slate-400 bg-slate-900/50 rounded-lg p-3 mb-3 max-h-32 overflow-y-auto">
                /about/ &nbsp; · &nbsp; /our-staff/ &nbsp; · &nbsp; /compare-woo-auto-parts-v1/ &nbsp; · &nbsp; /wishlist-woo-auto-parts-v1/ &nbsp; · &nbsp; /home-woo-auto-parts-v1/ &nbsp; · &nbsp; /shop-woo-auto-parts-v1/ &nbsp; · &nbsp; /cart-woo-auto-parts-v1/ &nbsp; · &nbsp; /checkout-woo-auto-parts-v1/ &nbsp; · &nbsp; /my-account-woo-auto-parts-v1/ &nbsp; · &nbsp; /wishsuite/ &nbsp; · &nbsp; /blog-woo-auto-parts-v1/ &nbsp; · &nbsp; /contact/ &nbsp; · &nbsp; /hogar/ &nbsp; · &nbsp; /tienda-inicio/
            </div>
            <div class="impact-box">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p>
                <p class="text-slate-300 text-sm">Google las indexa como contenido oficial. Esto genera confusión a los visitantes que llegan desde búsquedas, además de penalización SEO por contenido de baja calidad y duplicado.</p>
            </div>
        </div>

        <!-- 1.3 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3">
                    <span class="badge badge-critical">🔴 Crítico</span>
                    <span class="font-mono text-xs text-slate-500">1.3</span>
                </div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Tres menús de navegación del demo siguen configurados</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Encontramos tres menús de navegación heredados del demo, todos en inglés y con categorías que no corresponden al negocio de Dimapar:</p>
            <ul class="text-slate-300 text-sm space-y-1.5 mb-3 list-disc list-inside">
                <li><strong class="text-white">Main Menu:</strong> Home, Shop, About, Blog, Contact, Top Offers</li>
                <li><strong class="text-white">Main Menu 2:</strong> Headlights & Lights, Brakes & Suspension, Performance Upgrades, Seasonal Promotions</li>
                <li><strong class="text-white">Menú:</strong> Auto Maintenance, Brake Repair, Shocks/Struts Replacement, Air Conditioning Services</li>
            </ul>
            <div class="impact-box">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p>
                <p class="text-slate-300 text-sm">Si por error algún plugin o cambio activa estos menús, todo el header del sitio aparece en inglés y con productos que Dimapar no vende.</p>
            </div>
        </div>

        <!-- 1.4 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3">
                    <span class="badge badge-important">🟠 Importante</span>
                    <span class="font-mono text-xs text-slate-500">1.4</span>
                </div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Pendiente decisión</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Conflicto entre dos taglines de marca</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">
                Encontramos dos versiones diferentes del lema de Dimapar en uso simultáneo:<br>
                • Logo oficial: <em>"…le damos más vida a su llanta"</em><br>
                • Flyers comerciales: <em>"En las llantas y en la Industria"</em>
            </p>
            <div class="impact-box">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p>
                <p class="text-slate-300 text-sm">Si la marca dice cosas distintas según el material, el mensaje pierde fuerza. Recomendamos elegir uno como tagline oficial para todo el sitio y comunicación.</p>
            </div>
        </div>

        <!-- 1.5 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3">
                    <span class="badge badge-important">🟠 Importante</span>
                    <span class="font-mono text-xs text-slate-500">1.5</span>
                </div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta página "Servicio Técnico" como diferenciador</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El servicio post-venta y la asistencia técnica son el principal diferenciador para equipos industriales de $2.000 – $17.500. No existe una página dedicada que comunique esa propuesta de valor.</p>
            <div class="impact-box">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p>
                <p class="text-slate-300 text-sm">Un comprador que evalúa una alineadora de $15.000 toma la decisión basándose en confianza post-venta. Sin esa página, perdemos cierres frente a competidores con peor producto pero mejor comunicación de soporte.</p>
            </div>
        </div>

        <!-- 1.6 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3">
                    <span class="badge badge-minor">🟡 Menor</span>
                    <span class="font-mono text-xs text-slate-500">1.6</span>
                </div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Por acopiar</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta de testimonios y casos de uso reales</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Equipos en el rango de precio de Dimapar requieren prueba social. El sitio no muestra reseñas verificadas, testimonios de talleres clientes ni casos de implementación.</p>
            <div class="impact-box">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p>
                <p class="text-slate-300 text-sm">Necesitamos recolectar 5-8 testimonios reales de talleres clientes (texto + nombre + cargo + empresa) para incluirlos en el rediseño.</p>
            </div>
        </div>

    </div>
</section>

<!-- ====================== TAB 3: SEO TÉCNICO ====================== -->
<section id="tab-seo" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 2 · 11 problemas</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">SEO técnico</h2>
        <p class="text-slate-400 max-w-3xl">Cómo entiende Google el sitio y si está apareciendo donde debería.</p>
    </header>

    <div class="grid grid-cols-1 gap-5">

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">2.1</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Cero bloques Schema.org (JSON-LD)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Schema.org es el "idioma técnico" que Google usa para entender qué vende cada página. El sitio no tiene ningún bloque estructurado: ni <code class="font-mono text-cyan-400">Organization</code>, ni <code class="font-mono text-cyan-400">WebSite</code>, ni <code class="font-mono text-cyan-400">Product</code>, ni <code class="font-mono text-cyan-400">BreadcrumbList</code>.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Google no genera "rich snippets" (precios, stock, estrellas) en los resultados de búsqueda. Resultados sin estos elementos reciben hasta 30% menos clics que la competencia.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">2.2</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Página principal sin meta description</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">La home no tiene meta description configurada. Google muestra un fragmento aleatorio del HTML cuando alguien busca "Dimapar".</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Perdemos la oportunidad de comunicar la propuesta de valor en el resultado de Google — el primer punto de contacto con un cliente potencial.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">2.3</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Open Graph completamente vacío (0 tags)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Cuando alguien comparte cualquier URL del sitio en WhatsApp, Facebook o Twitter, no aparece la imagen de previsualización, título ni descripción. Solo se muestra la URL pelada.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Cada vez que un cliente recomienda un producto por WhatsApp, en lugar de aparecer una imagen atractiva del equipo + nombre + precio, aparece solo el link. Eso reduce drásticamente la probabilidad de que el receptor haga clic.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">2.4</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Plugin SEO (Rank Math) instalado pero INACTIVO</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Rank Math, el plugin SEO más reconocido para WordPress, está instalado en el sitio pero nadie lo activó. Por eso no hay sitemap óptimo, ni Schema, ni configuración SEO por página.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Resolverlo es activarlo. Lo dejaremos activado y configurado durante el rediseño.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">2.5</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2"><code class="font-mono text-cyan-400">sitemap.xml</code> lista solo 13 URLs</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Con 159 productos, 8 categorías padre, ~30 subcategorías y varias páginas relevantes, el mapa del sitio debería listar más de 200 URLs. Actualmente solo lista 13.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Google no descubre la mayoría del catálogo. Casi todos los productos son invisibles para nuevas búsquedas.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">2.6</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta atributo de idioma específico para Ecuador</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El HTML declara <code class="font-mono text-cyan-400">lang="es"</code> (español genérico) cuando debería ser <code class="font-mono text-cyan-400">lang="es-EC"</code> para indicar a Google que el sitio es de Ecuador.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Cuando alguien en Quito o Guayaquil busca "alineadora", Google prioriza resultados locales. Sin el atributo correcto, Dimapar compite globalmente con sitios de España, Argentina, México.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">2.7</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Múltiples páginas duplicadas (Home, Cart, Checkout, Mi Cuenta)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Existen 2 páginas "Home", 2 "Cart", 2 "Checkout", 2 "Mi Cuenta", 2 "Blog" — versión demo en inglés + versión personalizada.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Contenido duplicado penaliza el SEO general del dominio. Google "se divide" entre las dos versiones y termina mostrando la menos relevante.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">2.8</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta etiqueta canonical en varias páginas internas</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Sin <code class="font-mono text-cyan-400">&lt;link rel="canonical"&gt;</code>, Google decide solo qué versión indexar — sin garantía de que sea la correcta.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Una página puede aparecer indexada con parámetros de URL extraños (<code class="font-mono text-xs">?utm_source=…</code>) en lugar de su URL limpia.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">2.9</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">URLs en inglés del demo todavía resuelven 200 OK</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Las 14 páginas demo identificadas en el problema 1.2 responden con código 200 (OK) cuando deberían devolver 404 o redirigir 301 a su equivalente en español.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Visitantes que llegan a esas URLs (desde Google o links viejos compartidos) ven contenido en inglés. En el rediseño aplicamos redirects 301 a las URLs correctas en español.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">2.10</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Fase 2 SEO</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">506 tags de producto excesivos</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El sitio acumula 506 etiquetas de producto. Generan páginas de archivo de muy baja calidad y duplicado de contenido. Recomendamos consolidar a ~50 tags estratégicos.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Google penaliza dominios con muchas páginas de baja calidad. Mejor pocos tags pero útiles, que muchos generando ruido.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">2.11</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta de breadcrumbs visibles</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Las páginas internas no muestran un "rastro de navegación" (Inicio › Maquinaria › Alineadoras › Megaspin 610) que ayude al usuario a saber dónde está y a Google a entender la jerarquía.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Mejora la navegación y aporta un Schema.org adicional (<code class="font-mono text-cyan-400">BreadcrumbList</code>) que Google muestra en los resultados.</p></div>
        </div>

    </div>
</section>

<!-- ====================== TAB 4: TIENDA ====================== -->
<section id="tab-tienda" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 3 · 9 problemas · <span class="text-emerald-400">3 resueltos ✅</span></p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Estructura de la tienda (WooCommerce)</h2>
        <p class="text-slate-400 max-w-3xl">Cómo está organizado el catálogo: categorías, productos, atributos y filtros.</p>
    </header>

    <div class="grid grid-cols-1 gap-5">

        <!-- 3.1 RESUELTO -->
        <div class="problem-card resolved">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-resolved">✅ Resuelto</span><span class="font-mono text-xs text-slate-500">3.1</span></div>
                <span class="status-tag bg-emerald-500/10 text-emerald-300 border border-emerald-500/30">Aplicado en mayo 2026</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Categorías incoherentes con el catálogo real</h3>
            <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-slate-300">Antes:</strong> 28 categorías sueltas, sin jerarquía clara, mezcla de español/inglés ("Cuchillas", "Tapones de Válvula", "Herramientas Hidráulicas").</p>
            <p class="text-emerald-300 text-sm leading-relaxed mb-3"><strong>Después:</strong> 51 categorías organizadas en 8 padres + subcategorías según el organigrama oficial enviado por Dimapar (Excel del 11 de mayo).</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-xs">
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Maquinaria · 6 subs</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">MOC Products · 6 subs</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Cementos vulcanizantes</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Herr. manuales · 4 subs</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Herr. neumáticas · 4 subs</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Herr. de llantera</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Consumibles · 5 subs</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-cyan-400">Herr. de taller · 5 subs</span>
            </div>
        </div>

        <!-- 3.2 RESUELTO -->
        <div class="problem-card resolved">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-resolved">✅ Resuelto</span><span class="font-mono text-xs text-slate-500">3.2</span></div>
                <span class="status-tag bg-emerald-500/10 text-emerald-300 border border-emerald-500/30">Aplicado en mayo 2026</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">"Maquinaria" tenía 90 productos sin subcategoría</h3>
            <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-slate-300">Antes:</strong> la categoría Maquinaria tenía 90 productos asignados al padre sin clasificar entre alineadoras, balanceadoras, elevadores, etc. Imposible filtrar.</p>
            <p class="text-emerald-300 text-sm leading-relaxed mb-3"><strong>Después:</strong> los 90 productos clasificados automáticamente por título + marca a la subcategoría correcta:</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-xs">
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">Elevadores · 20</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">Otros equipos · 17</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">Desenllantadora · 12</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">Balanceadoras · 11</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">Alineadoras · 8</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">Compresores · 1</span>
            </div>
        </div>

        <!-- 3.3 RESUELTO -->
        <div class="problem-card resolved">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-resolved">✅ Resuelto</span><span class="font-mono text-xs text-slate-500">3.3</span></div>
                <span class="status-tag bg-emerald-500/10 text-emerald-300 border border-emerald-500/30">Aplicado en mayo 2026</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Atributos globales pobres (solo "Color")</h3>
            <p class="text-slate-400 text-sm leading-relaxed mb-3"><strong class="text-slate-300">Antes:</strong> el único atributo global era "Color", sin Marca, Voltaje, Capacidad ni Aplicación.</p>
            <p class="text-emerald-300 text-sm leading-relaxed mb-3"><strong>Después:</strong> 4 atributos nuevos creados, listos para alimentar filtros AJAX en cada categoría.</p>
            <div class="flex flex-wrap gap-2 text-xs">
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">+ Marca</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">+ Voltaje</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">+ Capacidad</span>
                <span class="bg-slate-900/50 rounded-lg px-3 py-2 font-mono text-emerald-300">+ Aplicación</span>
            </div>
        </div>

        <!-- 3.4 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">3.4</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Pendiente carga manual</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Productos sin marca asignada</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Aunque ahora existe el atributo "Marca", ningún producto lo tiene poblado todavía. Cada producto debe etiquetarse con su marca (Hofmann, Besser, Hydraulan, Muth, Thyson, etc.) para que los filtros AJAX y el Schema funcionen.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Los compradores B2B buscan por marca antes que por tipo ("alineadora Hofmann", "balanceadora Besser"). Sin este dato, los filtros de catálogo no son útiles.</p></div>
        </div>

        <!-- 3.5 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">3.5</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Productos sin Schema.org Product</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Sin Rank Math activo (problema 2.4), los productos no emiten Schema → no aparecen con precio, stock ni rating en los resultados de Google.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Google Shopping y los resultados enriquecidos requieren este dato. Sin él, los productos compiten en desventaja con tiendas competidoras que sí lo tienen.</p></div>
        </div>

        <!-- 3.6 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">3.6</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Post-cutover</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Categorías huérfanas pendientes de eliminar</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Quedaron ~14 categorías sin productos heredadas del demo: Cuchillas, Extensión de Válvula, Tapones de Válvula, Sin categorizar, Herramientas Hidráulicas / Industriales / del Taller de Trabajo / de Renovado, Elevador Tijera, Elevadores de Lavado, Pesas Adhesivas, Piedra.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Las borramos después del cutover del rediseño para no afectar URLs activas mientras tanto. Si las borramos ahora podrían romper enlaces de Google indexados.</p></div>
        </div>

        <!-- 3.7 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">3.7</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Trabajo continuo</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Productos sin descripción extendida ni ficha técnica</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Muchos productos solo tienen título y precio. Faltan: descripción de uso, especificaciones técnicas (voltaje, capacidad, peso), manuales descargables, video demo.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Un comprador B2B necesita ver especificaciones técnicas para tomar la decisión. Sin esa información, abandona y consulta a un competidor o llama por WhatsApp generando carga al equipo de ventas con preguntas básicas.</p></div>
        </div>

        <!-- 3.8 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">3.8</span></div>
                <span class="status-tag bg-emerald-500/10 text-emerald-300 border border-emerald-500/30">📊 Dato actualizado</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Conteo real del catálogo: 159 productos, no 254</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El informe Fase 1 mencionaba "254 productos". La realidad medida directamente del catálogo es 159, de los cuales algunos están en draft.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Hay margen para cargar más productos (los faltantes de MOC Products, herramientas manuales, lubricantes, válvulas) que ya están en el organigrama pero sin SKUs en la tienda.</p></div>
        </div>

        <!-- 3.9 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">3.9</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Carga del catálogo</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Categorías del organigrama vacías o casi vacías</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">MOC Products tiene apenas 2 productos cargados (de 6 subgrupos planificados). Herramientas manuales / neumáticas / de llantera tienen entre 1 y 3 productos. Hace falta cargar el catálogo completo del proveedor.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Si un cliente entra a "Herramientas Manuales" y ve 2 productos, no vuelve. Necesitamos al menos 8-15 productos por subcategoría para verse como un catálogo serio.</p></div>
        </div>

        <!-- 3.10 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">3.10</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Carga del catálogo</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Subcategorías Consumibles con 0 productos</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">"Pesas de balanceo", "Válvulas" y "Lubricantes de taller" están en el organigrama oficial pero sin productos cargados.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Subcategorías vacías generan páginas de bajo valor que el rediseño puede ocultar hasta que tengan inventario.</p></div>
        </div>

        <!-- 3.11 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">3.11</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta página de "Marcas que distribuimos"</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Las marcas que distribuye Dimapar (Hofmann, Besser, Hydraulan, Muth, Thyson, Tramontina, Toptul, Vermar, Milton) son un activo de credibilidad. No existe una página dedicada que las consolide.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Los compradores B2B buscan por marca. Una página dedicada por marca puede capturar tráfico SEO de búsquedas como "distribuidor Hofmann Ecuador".</p></div>
        </div>

        <!-- 3.12 -->
        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">3.12</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta página "Catálogos descargables"</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Existe <code class="font-mono text-cyan-400">/catalogo/</code> pero está marcada como "privada" — no es accesible al público. Los PDFs de marca no están listados de forma visible.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Compradores institucionales descargan catálogos PDF para compartir internamente antes de comprar. Sin esa sección visible, perdemos visibilidad y leads.</p></div>
        </div>

    </div>
</section>

<!-- ====================== TAB 5: PERFORMANCE ====================== -->
<section id="tab-performance" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 4 · 7 problemas</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Performance</h2>
        <p class="text-slate-400 max-w-3xl">Velocidad de carga del sitio y experiencia de uso (Core Web Vitals).</p>
    </header>

    <!-- LCP Indicator -->
    <div class="glass-cyan rounded-2xl p-6 mb-6">
        <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-2">Métrica clave · LCP (Largest Contentful Paint)</p>
        <div class="flex items-center gap-4 flex-wrap">
            <p class="font-display text-5xl font-extrabold" style="color:#FCD34D">2.268<span class="text-xl text-slate-400">ms</span></p>
            <div>
                <p class="text-white font-medium">Al borde del límite</p>
                <p class="text-slate-400 text-sm">Google considera bueno &lt; 2.500ms. Estamos al límite.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5">

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">4.1</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">35 hojas CSS y 30 scripts cargando en la home</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Acumulación del demo + plugins inactivos no desinstalados.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Cada CSS y script extra suma latencia. El rediseño con Hello Elementor + plugins limpios reducirá esto a ~10 CSS y ~15 scripts, mejorando significativamente la velocidad.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">4.2</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">29 imágenes sin carga diferida (lazy-load)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Todas las imágenes del sitio cargan de inmediato aunque estén fuera de la pantalla. Penaliza Core Web Vitals.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">El visitante espera ~2 segundos extra que no debería. En móvil, esto es la diferencia entre quedarse y abandonar.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">4.3</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Imágenes sin dimensiones declaradas (width/height)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Provoca CLS (Cumulative Layout Shift) — la página "salta" mientras carga porque el navegador no sabe cuánto espacio reservar.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">CLS alto = experiencia mala. Un usuario que va a hacer clic en un botón ve cómo el botón se mueve al cargar una imagen tardía y termina haciendo clic en otra cosa.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">4.4</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Imágenes en JPG/PNG, no en WebP/AVIF</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El sitio no entrega imágenes en formato moderno. Las imágenes del catálogo pesan 2 a 5 veces más de lo necesario.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Cada producto con foto a 500KB → 100KB en WebP. Si vemos 50 productos = 20MB ahorrados. Crítico en conexiones móviles de Ecuador.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">4.5</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Fase 2</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Cache server activo pero sin invalidación clara</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Detectamos cache nginx activo pero no hay un plugin de caché desde wp-admin que permita purgar al guardar cambios.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Cambios en productos o textos pueden tardar minutos en aparecer al cliente. Instalar WP Rocket o LiteSpeed Cache lo resuelve.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">4.6</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Fuente de iconos antigua y pesada (Font Awesome 5.1.5)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Carga toda una librería de íconos para usar 8-10. Es reemplazable por SVGs individuales (Lucide) con 90% menos peso.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">~200KB menos de descarga inicial. Imperceptible en wifi, importante en datos móviles.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">4.7</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Plugins de Elementor activos suman ~12 CSS/JS extra</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Royal Elementor Addons + Pro carga assets en todas las páginas aunque no se usen. Auditable después con Asset CleanUp.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Optimizable durante la limpieza post-rediseño. No es bloqueante.</p></div>
        </div>

    </div>
</section>

<!-- ====================== TAB 6: SEGURIDAD ====================== -->
<section id="tab-seguridad" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 5 · 6 problemas</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Seguridad</h2>
        <p class="text-slate-400 max-w-3xl">Protección del sitio contra ataques y exposición innecesaria de información técnica.</p>
    </header>

    <div class="grid grid-cols-1 gap-5">

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-critical">🔴 Crítico</span><span class="font-mono text-xs text-slate-500">5.1</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Plugin "WooCommerce Legacy REST API" instalado</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Plugin oficialmente deprecado por WooCommerce por riesgo de seguridad. Aunque está inactivo, su presencia en el filesystem del servidor es un vector potencial.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Una vulnerabilidad explotable en este plugin podría dar acceso a la base de datos completa (clientes, pedidos, contactos). Hay que eliminarlo, no solo desactivarlo.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">5.2</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Fase 2 / hosting</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Sin Content Security Policy (CSP)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Falta el encabezado HTTP <code class="font-mono text-cyan-400">Content-Security-Policy</code> que previene ataques XSS (cross-site scripting) y la carga de scripts no autorizados.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Requiere coordinación con el hosting para configurar headers HTTP a nivel servidor. No bloqueante para el rediseño pero recomendado.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">5.3</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Fase 2 / hosting</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Sin HSTS (Strict-Transport-Security)</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Falta el encabezado que fuerza a los navegadores a usar siempre HTTPS, previniendo "downgrade attacks" donde un atacante redirige al usuario a una versión HTTP insegura.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Baja probabilidad de ataque pero buena práctica estándar. Configuración de hosting.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">5.4</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Fase 2 / hosting</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Sin X-Content-Type-Options</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Falta el encabezado <code class="font-mono text-cyan-400">X-Content-Type-Options: nosniff</code> que previene ataques de MIME-sniffing.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Buena práctica estándar de seguridad web. Configuración de hosting.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">5.5</span></div>
                <span class="status-tag bg-slate-700/40 text-slate-300 border border-slate-600/40">⏳ Fase 2 / hosting</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Server header revela versión exacta de nginx</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El sitio expone <code class="font-mono text-cyan-400">server: nginx/1.31.1</code> en los headers HTTP. Esto permite que atacantes busquen vulnerabilidades específicas de esa versión exacta.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Riesgo bajo pero innecesario. Configuración de hosting para ocultar la versión.</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-minor">🟡 Menor</span><span class="font-mono text-xs text-slate-500">5.6</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">21 plugins inactivos sin desinstalar</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Cada plugin inactivo es código en el servidor que puede tener vulnerabilidades futuras. Lista completa: AirLift, Akismet, Ally, Anti-Malware, Astra Pro, Better Font Awesome, BlogLentor, Editor clásico, Font Awesome (viejo), HUSKY, Hustle, Kadence Security, Real3D Flipbook, reCAPTCHA Woo, ShopEngine, Smash Balloon, UAE, WhatsApp Chat NinjaTeam, WooCommerce Legacy REST API, WPForms Lite, Royal Elementor Addons + Pro (parcial).</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Vamos a desinstalar los que confirmemos que no se usan. Algunos podrían reactivarse si hace falta funcionalidad (ej. WPForms).</p></div>
        </div>

    </div>
</section>

<!-- ====================== TAB 7: ACCESIBILIDAD ====================== -->
<section id="tab-a11y" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 6 · 2 problemas</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Accesibilidad (WCAG)</h2>
        <p class="text-slate-400 max-w-3xl">Si el sitio es usable para personas con discapacidades visuales o motoras.</p>
    </header>

    <div class="grid grid-cols-1 gap-5">

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">6.1</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">14 imágenes sin atributo "alt" descriptivo</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Incluido el logo principal. Los lectores de pantalla no pueden interpretar la marca ni las imágenes — usuarios con discapacidad visual reciben una experiencia rota.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Además del impacto en accesibilidad, los "alt" son uno de los factores SEO que Google utiliza para entender imágenes (Google Images también es buscador).</p></div>
        </div>

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">6.2</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Falta de "skip-link" al contenido principal</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">Los usuarios que navegan por teclado o con lectores de pantalla deben atravesar todo el header (logo + menú + búsqueda + carrito) en cada página antes de llegar al contenido.</p>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">El rediseño incluye un enlace "Saltar al contenido" oculto visualmente que aparece al usar Tab — práctica estándar WCAG.</p></div>
        </div>

    </div>
</section>

<!-- ====================== TAB 8: TRACKING ====================== -->
<section id="tab-tracking" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Área 7 · 1 problema</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Tracking y analítica</h2>
        <p class="text-slate-400 max-w-3xl">Si tenemos forma de medir qué hace cada visitante en el sitio.</p>
    </header>

    <div class="grid grid-cols-1 gap-5">

        <div class="problem-card">
            <div class="flex items-start justify-between gap-3 flex-wrap mb-3">
                <div class="flex items-center gap-3"><span class="badge badge-important">🟠 Importante</span><span class="font-mono text-xs text-slate-500">7.1</span></div>
                <span class="status-tag bg-amber-500/10 text-amber-300 border border-amber-500/30">🔄 En proceso (rediseño)</span>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Estado de Google Analytics 4, GTM y Facebook Pixel no claro</h3>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">El informe Fase 1 mencionaba que GA4 debe instalarse, pero no hemos confirmado al detalle si está activo, qué eventos rastrea, ni si Google Tag Manager y Facebook Pixel están configurados.</p>
            <p class="text-slate-300 text-sm leading-relaxed mb-3">En el rediseño dejamos configurado:</p>
            <ul class="text-slate-300 text-sm space-y-1.5 mb-3 list-disc list-inside">
                <li><strong class="text-white">Google Analytics 4</strong> (saber cuántas personas visitan y qué hacen)</li>
                <li><strong class="text-white">Google Tag Manager</strong> (medir eventos clave sin tocar código)</li>
                <li><strong class="text-white">Facebook Pixel</strong> (para remarketing en Meta Ads)</li>
                <li>Eventos clave configurados: vista de producto, agregar al carrito, click WhatsApp, envío de formulario, descarga PDF</li>
            </ul>
            <div class="impact-box"><p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-1">Impacto al negocio</p><p class="text-slate-300 text-sm">Sin tracking adecuado no sabemos qué funciona y qué no — todas las decisiones de marketing son a ciegas. Con tracking podemos optimizar campañas pagadas y mejorar lo que más convierte.</p></div>
        </div>

    </div>
</section>

<!-- ====================== TAB 9: CONCLUSIÓN ====================== -->
<section id="tab-conclusion" class="tab-content">
    <header class="mb-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-2">Cierre</p>
        <h2 class="font-display text-3xl font-bold text-white mb-2">Qué hace el rediseño Fase 1 y qué queda para Fase 2 SEO</h2>
        <p class="text-slate-400 max-w-3xl">Resumen de cobertura: cómo cada problema detectado se resuelve y dónde.</p>
    </header>

    <!-- Cobertura visual -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
        <div class="glass rounded-2xl p-6" style="border-color:rgba(16,185,129,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-400 mb-2">Ya resueltos</p>
            <p class="font-display text-5xl font-extrabold text-emerald-300 mb-1">3</p>
            <p class="text-slate-300 text-sm">Reestructura WooCommerce aplicada en mayo</p>
        </div>
        <div class="glass rounded-2xl p-6" style="border-color:rgba(34,211,238,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-2">Resuelve el rediseño Fase 1</p>
            <p class="font-display text-5xl font-extrabold text-cyan-300 mb-1">28</p>
            <p class="text-slate-300 text-sm">10 críticos · 14 importantes · 4 menores</p>
        </div>
        <div class="glass rounded-2xl p-6" style="border-color:rgba(245,158,11,0.30);">
            <p class="font-mono text-[10px] uppercase tracking-widest text-amber-400 mb-2">Quedan para Fase 2 SEO</p>
            <p class="font-display text-5xl font-extrabold text-amber-300 mb-1">11</p>
            <p class="text-slate-300 text-sm">5 importantes · 6 menores · trabajo continuo</p>
        </div>
    </div>

    <!-- Tabla detallada -->
    <div class="glass rounded-2xl p-6 mb-10">
        <h3 class="font-display text-xl font-semibold text-white mb-4">Tabla de cobertura</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50">
                        <th class="text-left py-3 px-3 font-mono text-[10px] uppercase tracking-widest text-slate-500 font-medium">Problema</th>
                        <th class="text-left py-3 px-3 font-mono text-[10px] uppercase tracking-widest text-slate-500 font-medium">Cómo se resuelve</th>
                        <th class="text-center py-3 px-3 font-mono text-[10px] uppercase tracking-widest text-slate-500 font-medium">Fase</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">1.1 Tema demo "Woo Auto Parts"</td><td class="py-2 px-3">Cambio a Hello Elementor + diseño propio</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">1.2 14 páginas demo públicas</td><td class="py-2 px-3">Mover a draft + redirects 301</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">1.3 Menús en inglés</td><td class="py-2 px-3">Menú "Principal Dimapar 2026"</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">1.5 Falta página Servicio Técnico</td><td class="py-2 px-3">Sección dedicada + página /servicio-tecnico/</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">2.1 Cero Schema JSON-LD</td><td class="py-2 px-3">Bloques Organization + WebSite + Product</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">2.2 Sin meta description</td><td class="py-2 px-3">Configurada en el rediseño + Rank Math</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">2.3 Open Graph vacío</td><td class="py-2 px-3">OG completo + imagen 1200×630</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">2.4 Rank Math inactivo</td><td class="py-2 px-3">Activación + configuración</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">3.1, 3.2, 3.3 Estructura tienda</td><td class="py-2 px-3"><span class="text-emerald-300">✅ Ya resuelto en mayo 2026</span></td><td class="text-center"><span class="badge badge-resolved">Hecho</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">3.4 Productos sin marca asignada</td><td class="py-2 px-3">Marcado producto por producto</td><td class="text-center"><span class="badge badge-important">Fase 2</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">3.7 Productos sin descripción</td><td class="py-2 px-3">Redacción + ficha técnica + manuales</td><td class="text-center"><span class="badge badge-important">Fase 2</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">3.9 Categorías casi vacías</td><td class="py-2 px-3">Carga masiva del catálogo proveedor</td><td class="text-center"><span class="badge badge-important">Fase 2</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">4.x Performance</td><td class="py-2 px-3">Hello Elementor + WebP + lazy load + plugins limpios</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">5.x Headers de seguridad (CSP, HSTS)</td><td class="py-2 px-3">Coordinación con hosting</td><td class="text-center"><span class="badge badge-important">Fase 2</span></td></tr>
                    <tr class="border-b border-slate-700/30"><td class="py-2 px-3">6.1, 6.2 Accesibilidad</td><td class="py-2 px-3">Alt text + skip-link en cada bloque</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                    <tr><td class="py-2 px-3">7.1 Tracking</td><td class="py-2 px-3">GA4 + GTM + Pixel + eventos clave</td><td class="text-center"><span class="badge badge-info">Fase 1</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- CTA Fase 2 -->
    <div class="glass-cyan rounded-2xl p-8">
        <p class="font-mono text-xs uppercase tracking-widest text-cyan-400 mb-3">Próximo paso recomendado</p>
        <h3 class="font-display text-2xl md:text-3xl font-bold text-white mb-4">Activar Fase 2 SEO (6 meses)</h3>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed mb-6 max-w-3xl">
            La Fase 1 (rediseño) deja el sitio técnicamente sano y listo para crecer. La <strong class="text-white">Fase 2 SEO</strong> es donde realmente capturamos tráfico orgánico: 20 artículos / mes posicionando para búsquedas de talleres, marcar las 159 fichas de producto con su marca, optimizar las descripciones, agregar manuales y catálogos PDF descargables, expandir el catálogo y monitorear posiciones en Google con reportes mensuales.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="glass rounded-xl p-5">
                <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-2">Pago mensual</p>
                <p class="font-display text-3xl font-bold text-white">$180 <span class="text-sm text-slate-400 font-normal">/mes × 6</span></p>
                <p class="text-slate-400 text-xs mt-1">Total $1.080</p>
            </div>
            <div class="glass-cyan rounded-xl p-5">
                <p class="font-mono text-[10px] uppercase tracking-widest text-cyan-400 mb-2">Pago único <span class="text-emerald-300">· ahorra $200</span></p>
                <p class="font-display text-3xl font-bold text-cyan-300">$880</p>
                <p class="text-slate-400 text-xs mt-1">Cobertura 6 meses</p>
            </div>
        </div>
    </div>

</section>

</main>

<!-- FOOTER -->
<footer class="mt-16 border-t border-slate-700/50 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-xs mb-1">Diagnóstico técnico realizado por <span class="text-slate-300 font-medium">Creative Web</span> — <a href="https://creativeweb.com.ec" class="text-cyan-400 hover:text-cyan-300" target="_blank">creativeweb.com.ec</a></p>
        <p class="text-slate-600 text-[10px] font-mono">Mayo 2026 · Para uso interno de Dimapar Ecuador</p>
    </div>
</footer>

<script>
function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    const target = document.getElementById('tab-' + tabId);
    if (target) target.classList.add('active');
    const tabMap = ['resumen','contenido','seo','tienda','performance','seguridad','a11y','tracking','conclusion'];
    const idx = tabMap.indexOf(tabId);
    const buttons = document.querySelectorAll('.tab-btn');
    if (idx >= 0 && buttons[idx]) buttons[idx].classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Donut chart
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('severityChart');
    if (!ctx) return;
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Críticos','Importantes','Menores','Resueltos'],
            datasets: [{
                data: [10, 19, 13, 3],
                backgroundColor: ['#EF4444','#F59E0B','#FBBF24','#10B981'],
                borderColor: '#0A0E1A',
                borderWidth: 3,
                hoverOffset: 8
            }]
        },
        options: {
            cutout: '65%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.95)',
                    titleColor: '#FAFAFA',
                    bodyColor: '#D1D5DB',
                    borderColor: 'rgba(34,211,238,0.3)',
                    borderWidth: 1,
                    padding: 12,
                    callbacks: {
                        label: ctx => ' ' + ctx.parsed + ' problemas'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>
