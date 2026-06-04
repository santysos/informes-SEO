<?php
session_start();
if (empty($_SESSION['auth_dikapsa_proforma'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta SEO 6 meses — Dikapsa 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Outfit', 'sans-serif'] }, colors: { brand: { 500: '#0087cc', 400: '#4baae3', 300: '#7cc4ec' } } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #0a1929; color: #e2e8f0; }
.brand-grad { background: linear-gradient(135deg, #0087cc 0%, #4baae3 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(0,135,204,0.08) 0%, rgba(75,170,227,0.04) 100%); }
.glass { background: rgba(15, 35, 55, 0.6); backdrop-filter: blur(20px); border: 1px solid rgba(75, 170, 227, 0.15); }
.glass-strong { background: rgba(20, 45, 70, 0.85); backdrop-filter: blur(20px); border: 1px solid rgba(75, 170, 227, 0.25); }
.section-shadow { box-shadow: 0 4px 20px rgba(0, 135, 204, 0.08); }
.text-grad { background: linear-gradient(135deg, #4baae3 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.bg-grid { background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(75,170,227,0.04) 39px, rgba(75,170,227,0.04) 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(75,170,227,0.04) 39px, rgba(75,170,227,0.04) 40px); }
.no-print-only { }
@media print {
    body { background: white; color: #1e293b; }
    .no-print-only, header nav, .download-cta { display: none !important; }
    section { page-break-inside: avoid; }
}
</style>
</head>
<body class="bg-grid">

<!-- TOP NAV -->
<header class="no-print-only sticky top-0 z-50 glass-strong border-b border-cyan-400/10">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl brand-grad flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-cyan-300 uppercase tracking-widest">Creative Web · Propuesta SEO</p>
                <p class="text-white font-semibold text-sm">Dikapsa — Junio 2026</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="descargar-pdf.php" class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-brand-500 hover:bg-brand-400 text-white text-sm font-bold transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Descargar PDF
            </a>
            <a href="logout.php" class="text-cyan-300 hover:text-white text-sm font-semibold">Salir</a>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="pt-16 pb-20">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-4">Propuesta para Diego Oña</p>
        <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight text-white">
            Plan SEO <span class="text-grad">6 meses</span><br>
            para Dikapsa
        </h1>
        <p class="text-cyan-100/80 text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed mb-10">
            Atraer clientes B2B medianos y grandes en alimentos, retail y farmacia sin depender de visita comercial fría.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">USD 600</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">+ IVA · 6 meses</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">120</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">posts SEO publicados</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">3</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">industrias atacadas</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">USD 300K</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">meta facturación nueva</p>
            </div>
        </div>

        <a href="#modelo" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver propuesta completa
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- POR QUÉ SEO -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Diagnóstico</p>
            <h2 class="text-4xl font-extrabold text-white mb-3">El SEO ya está vendiendo en Dikapsa</h2>
            <p class="text-cyan-100/70 max-w-2xl mx-auto">Lo que no han trabajado profesionalmente. La oportunidad es escalar lo que ya funciona.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6 mb-12">
            <div class="glass rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad-soft border border-brand-400/30 flex items-center justify-center mb-4">
                    <span class="text-3xl font-black text-brand-400">3</span>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">de cada 10 clientes top llegaron por canal digital</h3>
                <p class="text-cyan-100/70 text-sm leading-relaxed">Frutería Monserrate (5 años, redes), Pedro Moncayo (4 años, web + referencias), Cervecería Nacional parcial. La web ya atrae, pero sin estrategia.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad-soft border border-brand-400/30 flex items-center justify-center mb-4">
                    <span class="text-3xl font-black text-brand-400">$45K</span>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Pedro Moncayo: prueba real del SEO</h3>
                <p class="text-cyan-100/70 text-sm leading-relaxed">Cooperativa que llegó por <strong class="text-cyan-300">web + referencias</strong> en 2022 — sin pauta, sin vendedor. Si el SEO no trabajado vende $45K/año, el SEO profesional puede multiplicar.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad-soft border border-brand-400/30 flex items-center justify-center mb-4">
                    <span class="text-3xl font-black text-brand-400">48</span>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">/100 SEO Health actual</h3>
                <p class="text-cyan-100/70 text-sm leading-relaxed">Auditoría técnica detectó: 0 schema markup, meta descriptions duplicadas, sitemap incompleto, sin GTM, sin GA4 configurado. Ganancias rápidas en mes 1.</p>
            </div>
        </div>

        <div class="brand-grad-soft border border-brand-400/25 rounded-2xl p-8 text-center">
            <p class="text-2xl text-white font-bold mb-2">El comprador B2B busca en Google antes de pedir cotización.</p>
            <p class="text-cyan-100/80 max-w-3xl mx-auto">Si Dikapsa no aparece en las primeras búsquedas de <em>"proveedor packaging Quito"</em> o <em>"imprenta cajas farmacia Ecuador"</em>, el cliente nuevo va a Industrias Omega, Senefelder o Dreampack — aunque Dikapsa pueda servir mejor su MOQ.</p>
        </div>
    </div>
</section>

<!-- POSICIONAMIENTO -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Posicionamiento estratégico</p>
            <h2 class="text-4xl font-extrabold text-white">Dikapsa = fabricante B2B mid-market</h2>
            <p class="text-cyan-100/70 mt-3 max-w-2xl mx-auto">Una franja de mercado donde Dikapsa tiene ventaja real y casi nadie ataca con SEO.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-10">
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-3">Competencia premium</p>
                <h3 class="text-white font-bold text-xl mb-2">Industrias Omega · Senefelder</h3>
                <p class="text-cyan-100/60 text-sm">MOQ 5.000+, tiempos largos, sirven a Pronaca / Coca-Cola / Nestlé. Saturados con clientes grandes — descuidan al mid-market.</p>
            </div>
            <div class="glass-strong rounded-2xl p-7 border-brand-400/40 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full brand-grad text-white text-xs font-bold uppercase tracking-widest">Dikapsa</span>
                <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-3 mt-2">Mid-market accesible</p>
                <h3 class="text-white font-bold text-xl mb-2">MOQ desde 1.000 unidades</h3>
                <p class="text-cyan-100/80 text-sm">Cotización 1 día, producción 10 días. Heidelberg + Xerox + Plotter 3.20m = capacidad real para clientes medianos sin exigir volumen masivo.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-3">Competencia económica</p>
                <h3 class="text-white font-bold text-xl mb-2">Imprentas pequeñas locales</h3>
                <p class="text-cyan-100/60 text-sm">Acabados deficientes, capacidad limitada, sin proceso B2B claro. Ganan precio pero pierden cliente corporate exigente.</p>
            </div>
        </div>

        <div class="glass rounded-2xl p-8">
            <h3 class="text-white font-bold text-xl mb-5">3 industrias objetivo (confirmadas por Diego)</h3>
            <div class="grid md:grid-cols-3 gap-5">
                <div class="border-l-4 border-brand-400 pl-5">
                    <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-1">Industria 1</p>
                    <h4 class="text-white font-bold text-lg mb-1">Alimentos / QSR</h4>
                    <p class="text-cyan-100/70 text-sm">Yogurt Amazonas, Maxipan, Frutería Monserrate ya validados. Target: <em>"empaques alimentos Ecuador"</em>, <em>"packaging snack QSR"</em>.</p>
                </div>
                <div class="border-l-4 border-brand-400 pl-5">
                    <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-1">Industria 2</p>
                    <h4 class="text-white font-bold text-lg mb-1">Retail / Supermercados</h4>
                    <p class="text-cyan-100/70 text-sm">Soñados: Corporación Favorita. POP de Cervecería Nacional ya valida la categoría. Target: <em>"exhibidores supermercado"</em>, <em>"POP retail Ecuador"</em>.</p>
                </div>
                <div class="border-l-4 border-brand-400 pl-5">
                    <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-1">Industria 3</p>
                    <h4 class="text-white font-bold text-lg mb-1">Farmacia / Salud</h4>
                    <p class="text-cyan-100/70 text-sm">Cajas premium farmacia + recetarios médicos. Target: <em>"cajas farmacéuticas Ecuador"</em>, <em>"empaque suplementos vitaminas"</em>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PLAN OPERATIVO -->
<section id="plan" class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Plan operativo</p>
            <h2 class="text-4xl font-extrabold text-white">Qué hacemos cada mes durante 6 meses</h2>
        </div>

        <div class="space-y-4">
            <!-- Mes 1 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M1</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Setup técnico + 20 posts arranque</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Junio 2026 — base SEO sólida</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Auditoría técnica completa + corrección de errores críticos</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Instalación GTM + GA4 + Search Console con eventos clave</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Schema markup (Organization, LocalBusiness, Product, Service)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 posts SEO publicados (5 por industria + 5 transversales)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Formulario "¿cómo nos conociste?" para atribución de leads</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Optimización meta titles + descriptions de páginas principales</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mes 2 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M2</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Landings por industria + 20 posts</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Julio 2026 — embudos verticales</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">3 landing pages dedicadas (Alimentos / Retail / Farmacia)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 1: <strong class="text-cyan-300">Frutería Monserrate</strong> (packaging alimentos)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 posts del calendario editorial mes 2</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Internal linking estratégico entre posts + landings</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Optimización Google Business Profile (Quito + Otavalo)</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mes 3 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M3</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Casos de éxito + 20 posts</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Agosto 2026 — autoridad sectorial</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 2: <strong class="text-cyan-300">Yogurt Amazonas</strong> (cajas y empaques)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 3: <strong class="text-cyan-300">Pedro Moncayo</strong> (papelería cooperativa)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 posts del calendario editorial mes 3</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Video corto del taller (Heidelberg + Xerox en funcionamiento)</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mes 4 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M4</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Backlinks + 20 posts</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Septiembre 2026 — autoridad de dominio</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Outreach a 10 medios y portales del sector packaging</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Inclusión en directorios B2B (CAPEIPI, Cámaras Comercio)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 posts del calendario editorial mes 4</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">A/B testing meta titles en posts top performance</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mes 5 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M5</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Optimización por data + 20 posts</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Octubre 2026 — iteración data-driven</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Rewrite de 10 posts top por CTR (basado en datos GSC)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Nuevas keywords detectadas en GSC → 20 posts mes 5</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 4: <strong class="text-cyan-300">Cervecería Nacional</strong> (POP)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Optimización velocidad de carga + Core Web Vitals</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mes 6 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M6</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Consolidación + reporte ejecutivo final</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Noviembre 2026 — informe de resultados</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Últimos 20 posts del calendario editorial</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Reporte ejecutivo 6 meses: leads · clientes nuevos · tráfico · ROI</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Plan año 2 propuesto con base en data real</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Documentación + transferencia de buenas prácticas</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 glass-strong rounded-2xl p-8">
            <h3 class="text-white font-bold text-xl mb-4">Adicional durante los 6 meses</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Reunión mensual</strong> con Diego para revisar resultados y ajustar</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Reporte mensual</strong> con métricas clave (tráfico, leads, posiciones)</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Coordinación con Santiago Oña</strong> para acceso WP y publicación</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Aprobación de contenido</strong> con Diego (24-48h por lote)</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Manual de marca</strong> aplicado consistentemente en cada pieza</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Material fotográfico</strong> de productos, proceso y equipo</span></div>
            </div>
        </div>
    </div>
</section>

<!-- MODELO COMERCIAL -->
<section id="modelo" class="py-20 bg-gradient-to-b from-transparent via-cyan-950/20 to-transparent">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Inversión</p>
            <h2 class="text-4xl font-extrabold text-white">2 modalidades de pago</h2>
            <p class="text-cyan-100/70 mt-3">Elijan la que más se acomode al flujo de caja de Dikapsa.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Opción A -->
            <div class="glass-strong rounded-2xl p-8 border-2 border-brand-400/60 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full brand-grad text-white text-xs font-black uppercase tracking-widest">Recomendado</span>
                <p class="text-brand-300 font-bold text-sm uppercase tracking-widest mb-2 mt-3">Opción A · Pago semestral</p>
                <div class="flex items-baseline gap-2 mb-1">
                    <span class="text-5xl font-black text-white">USD 600</span>
                </div>
                <p class="text-cyan-100/70 text-sm mb-6">+ IVA · Un solo pago al inicio · 6 meses</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">120 posts SEO publicados</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">3 landing pages por industria</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Setup técnico completo (GTM + GA4 + Schema)</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">4 casos de éxito producidos</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Reunión mensual + reporte ejecutivo</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Equivalente: <strong class="text-white">USD 100/mes</strong></span></div>
                </div>
            </div>

            <!-- Opción B -->
            <div class="glass rounded-2xl p-8">
                <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2 mt-3">Opción B · Pago mensual</p>
                <div class="flex items-baseline gap-2 mb-1">
                    <span class="text-5xl font-black text-white">USD 150</span>
                    <span class="text-cyan-200/70">/mes</span>
                </div>
                <p class="text-cyan-100/70 text-sm mb-6">+ IVA mensual · Sin compromiso prepago</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Mismo alcance que opción A</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Flexibilidad de pagos</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Total 6 meses: <strong class="text-white">USD 900</strong> + IVA</span></div>
                    <div class="flex items-start gap-2 opacity-60"><span class="text-cyan-300/50">·</span><span class="text-cyan-100/60">+USD 300 vs opción A (premium por pagos mensuales)</span></div>
                </div>
            </div>
        </div>

        <div class="mt-8 glass rounded-2xl p-6 text-center">
            <p class="text-cyan-100/80 text-sm">
                <strong class="text-white">Sin comisión por venta:</strong> el ROI del SEO es responsabilidad nuestra. Si los clientes nuevos no llegan, ajustamos sin costo adicional.
            </p>
        </div>
    </div>
</section>

<!-- ROI -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Retorno proyectado</p>
            <h2 class="text-4xl font-extrabold text-white">El ROI lo define la conversión a cliente</h2>
        </div>

        <div class="glass-strong rounded-2xl p-8 mb-6">
            <div class="grid md:grid-cols-3 gap-6 text-center">
                <div>
                    <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Inversión 6 meses</p>
                    <div class="text-4xl font-black text-white">$600</div>
                    <p class="text-cyan-100/60 text-sm mt-1">+ IVA</p>
                </div>
                <div>
                    <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Meta facturación</p>
                    <div class="text-4xl font-black text-grad">$300.000</div>
                    <p class="text-cyan-100/60 text-sm mt-1">año 2026-2027</p>
                </div>
                <div>
                    <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Ratio inversión / venta</p>
                    <div class="text-4xl font-black text-brand-400">500×</div>
                    <p class="text-cyan-100/60 text-sm mt-1">si meta se cumple</p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            <div class="glass rounded-2xl p-6">
                <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Escenario conservador</p>
                <div class="text-2xl font-black text-white mb-1">2 clientes nuevos</div>
                <p class="text-cyan-100/70 text-sm mb-3">a $50K c/u promedio</p>
                <div class="text-3xl font-black text-grad">$100K</div>
                <p class="text-cyan-100/60 text-xs mt-1">ratio 167× sobre inversión</p>
            </div>
            <div class="glass-strong rounded-2xl p-6 border-brand-400/40">
                <p class="text-brand-300 text-xs uppercase font-bold tracking-widest mb-2">Escenario base (meta Dikapsa)</p>
                <div class="text-2xl font-black text-white mb-1">4 clientes nuevos</div>
                <p class="text-cyan-100/70 text-sm mb-3">a $75K c/u promedio</p>
                <div class="text-3xl font-black text-grad">$300K</div>
                <p class="text-cyan-100/60 text-xs mt-1">ratio 500× sobre inversión</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Escenario optimista</p>
                <div class="text-2xl font-black text-white mb-1">6 clientes nuevos</div>
                <p class="text-cyan-100/70 text-sm mb-3">a $80K c/u promedio</p>
                <div class="text-3xl font-black text-grad">$480K</div>
                <p class="text-cyan-100/60 text-xs mt-1">ratio 800× sobre inversión</p>
            </div>
        </div>
    </div>
</section>

<!-- POR QUÉ CREATIVE WEB -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Por qué Creative Web</p>
            <h2 class="text-4xl font-extrabold text-white">Lo que ya estamos haciendo bien</h2>
            <p class="text-cyan-100/70 mt-3 max-w-2xl mx-auto">Clientes activos en Quito y la sierra norte con SEO data-driven en producción.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-2">Concesionario automotor</p>
                <h3 class="text-white font-bold text-xl mb-2">Comercial Hidrobo</h3>
                <div class="text-3xl font-black text-grad mb-2">8.952</div>
                <p class="text-cyan-100/70 text-sm">clics orgánicos / mes (871K impresiones, 62.700 queries).</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-2">Restaurante rooftop</p>
                <h3 class="text-white font-bold text-xl mb-2">Luuma Rooftop · Manta</h3>
                <div class="text-3xl font-black text-grad mb-2">35</div>
                <p class="text-cyan-100/70 text-sm">posts SEO publicados con voz humana y validador anti-IA propio.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-2">Clínica dental Otavalo</p>
                <h3 class="text-white font-bold text-xl mb-2">Odontología Life</h3>
                <div class="text-3xl font-black text-grad mb-2">274</div>
                <p class="text-cyan-100/70 text-sm">clics / mes en 1 solo post estrella ("implantes dentales Ecuador").</p>
            </div>
        </div>

        <div class="mt-10 glass rounded-2xl p-8">
            <h3 class="text-white font-bold text-xl mb-4">Cómo trabajamos diferente</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">01</span>
                    <div><p class="text-white font-semibold mb-1">SEO basado en datos reales</p><p class="text-cyan-100/70">Cada post sale de una query con búsqueda probada, no de "lo que parece interesante".</p></div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">02</span>
                    <div><p class="text-white font-semibold mb-1">Voz humana sin IA genérica</p><p class="text-cyan-100/70">Validador propio rechaza contenido con frases tipo IA, sin referencias geográficas reales, sin cita del equipo.</p></div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">03</span>
                    <div><p class="text-white font-semibold mb-1">Publicación escalonada</p><p class="text-cyan-100/70">No batch masivo (penalty Helpful Content Update). 4-5 posts por semana, ritmo humano.</p></div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">04</span>
                    <div><p class="text-white font-semibold mb-1">Reporte ejecutivo mensual</p><p class="text-cyan-100/70">Métricas accionables, no dashboard cargado. Reunión mensual con tomador de decisión.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="glass-strong rounded-3xl p-10 md:p-14 text-center border-brand-400/30">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-3">Siguiente paso</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">¿Arrancamos en junio?</h2>
            <p class="text-cyan-100/80 text-lg max-w-2xl mx-auto mb-8">
                Aprobar la propuesta nos permite empezar el setup técnico en 5 días hábiles. Los primeros 20 posts se publican antes de fin de mes.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="descargar-pdf.php" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Descargar PDF
                </a>
                <a href="https://wa.me/593967754770?text=Hola%20Santiago%2C%20queremos%20aprobar%20la%20propuesta%20SEO%20de%20Dikapsa" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white/5 hover:bg-white/10 border border-cyan-400/30 text-white font-bold text-base transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
                    Hablar por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-10 border-t border-cyan-400/10">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-cyan-300 text-sm">Propuesta desarrollada por <strong class="text-white">Creative Web</strong></p>
        <p class="text-cyan-200/50 text-xs mt-2">Confidencial · Solo Dikapsa · Junio 2026 · Vigencia 30 días</p>
    </div>
</footer>

</body>
</html>
