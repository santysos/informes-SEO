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
<title>Propuesta de trabajo 6 meses — Dikapsa 2026</title>
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
                <p class="text-xs font-bold text-cyan-300 uppercase tracking-widest">Creative Web · Propuesta</p>
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
            Plan de trabajo<br>
            <span class="text-grad">6 meses</span> para Dikapsa
        </h1>
        <p class="text-cyan-100/80 text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed mb-10">
            Hacer que más empresas medianas y grandes encuentren a Dikapsa cuando buscan en Google, sin depender solo de la visita comercial.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">USD 600</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">+ IVA · 6 meses</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">120</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">artículos publicados en la web</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">3</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">sectores que vamos a atacar</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">USD 300K</div>
                <p class="text-cyan-200/70 text-xs uppercase tracking-widest mt-1">meta de venta nueva</p>
            </div>
        </div>

        <a href="#modelo" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver propuesta completa
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- POR QUÉ -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Lo que vimos</p>
            <h2 class="text-4xl font-extrabold text-white mb-3">La web de Dikapsa ya está atrayendo clientes</h2>
            <p class="text-cyan-100/70 max-w-2xl mx-auto">Sin haberlo trabajado de manera profesional. La oportunidad es ordenar y multiplicar lo que ya funciona solo.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6 mb-12">
            <div class="glass rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad-soft border border-brand-400/30 flex items-center justify-center mb-4">
                    <span class="text-3xl font-black text-brand-400">3</span>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">de cada 10 clientes top llegaron por internet</h3>
                <p class="text-cyan-100/70 text-sm leading-relaxed">Frutería Monserrate (por redes sociales), Pedro Moncayo (por la web y referencias), Cervecería Nacional en parte. La web atrae sola, pero sin un plan detrás.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad-soft border border-brand-400/30 flex items-center justify-center mb-4">
                    <span class="text-3xl font-black text-brand-400">$45K</span>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Pedro Moncayo: la prueba de que esto funciona</h3>
                <p class="text-cyan-100/70 text-sm leading-relaxed">Una cooperativa que llegó por <strong class="text-cyan-300">la web y por una referencia</strong> en 2022, sin publicidad pagada, sin visita del vendedor. Si así sin plan vende $45.000 al año, con plan se puede multiplicar.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad-soft border border-brand-400/30 flex items-center justify-center mb-4">
                    <span class="text-3xl font-black text-brand-400">48</span>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">/100 en revisión técnica de la web</h3>
                <p class="text-cyan-100/70 text-sm leading-relaxed">Revisamos cómo está la web hoy y le falta lo básico: descripciones para Google, indicar dónde está ubicada Dikapsa, herramientas de medición, mapa del sitio. Todo eso lo arreglamos el primer mes.</p>
            </div>
        </div>

        <div class="brand-grad-soft border border-brand-400/25 rounded-2xl p-8 text-center">
            <p class="text-2xl text-white font-bold mb-2">El comprador de una empresa busca en Google antes de pedir cotización.</p>
            <p class="text-cyan-100/80 max-w-3xl mx-auto">Si Dikapsa no aparece en los primeros resultados cuando alguien busca <em>"proveedor de cajas en Quito"</em> o <em>"imprenta para farmacias en Ecuador"</em>, ese cliente se va a Industrias Omega, Senefelder o Dreampack. Aunque Dikapsa hubiera sido la mejor opción para su pedido.</p>
        </div>
    </div>
</section>

<!-- POSICIONAMIENTO -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Dónde se ubica Dikapsa en el mercado</p>
            <h2 class="text-4xl font-extrabold text-white">El espacio que Dikapsa domina mejor</h2>
            <p class="text-cyan-100/70 mt-3 max-w-2xl mx-auto">Hay una franja del mercado donde Dikapsa tiene ventaja real y casi ningún competidor está atacando con presencia web.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-10">
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-3">Las grandes</p>
                <h3 class="text-white font-bold text-xl mb-2">Industrias Omega · Senefelder</h3>
                <p class="text-cyan-100/60 text-sm">Piden 5.000 unidades mínimo, tiempos de entrega largos, sirven a Pronaca / Coca-Cola / Nestlé. Llenas con clientes grandes — no atienden bien a las empresas medianas.</p>
            </div>
            <div class="glass-strong rounded-2xl p-7 border-brand-400/40 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full brand-grad text-white text-xs font-bold uppercase tracking-widest">Dikapsa</span>
                <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-3 mt-2">Empresas medianas</p>
                <h3 class="text-white font-bold text-xl mb-2">Pedido mínimo desde 1.000 unidades</h3>
                <p class="text-cyan-100/80 text-sm">Cotización en 1 día, producción en 10 días. Heidelberg + Xerox + Plotter de 3,20m = capacidad real para clientes medianos sin exigirles volumen masivo.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-3">Las chicas baratas</p>
                <h3 class="text-white font-bold text-xl mb-2">Imprentas pequeñas locales</h3>
                <p class="text-cyan-100/60 text-sm">Acabados bajos, capacidad limitada, no tienen proceso para atender empresas. Ganan por precio pero pierden al cliente grande que exige calidad.</p>
            </div>
        </div>

        <div class="glass rounded-2xl p-8">
            <h3 class="text-white font-bold text-xl mb-5">3 sectores que vamos a atacar (los que ustedes confirmaron)</h3>
            <div class="grid md:grid-cols-3 gap-5">
                <div class="border-l-4 border-brand-400 pl-5">
                    <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-1">Sector 1</p>
                    <h4 class="text-white font-bold text-lg mb-1">Alimentos</h4>
                    <p class="text-cyan-100/70 text-sm">Yogurt Amazonas, Maxipan y Frutería Monserrate ya validan que funciona. Apuntamos a búsquedas tipo <em>"empaques para alimentos en Ecuador"</em>.</p>
                </div>
                <div class="border-l-4 border-brand-400 pl-5">
                    <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-1">Sector 2</p>
                    <h4 class="text-white font-bold text-lg mb-1">Retail y supermercados</h4>
                    <p class="text-cyan-100/70 text-sm">El cliente soñado: Corporación Favorita. Cervecería Nacional ya valida que pueden hacer material de exhibición. Búsquedas tipo <em>"exhibidores para supermercados"</em>.</p>
                </div>
                <div class="border-l-4 border-brand-400 pl-5">
                    <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-1">Sector 3</p>
                    <h4 class="text-white font-bold text-lg mb-1">Farmacias y salud</h4>
                    <p class="text-cyan-100/70 text-sm">Cajas premium para farmacias y empaques para vitaminas. Búsquedas tipo <em>"cajas para farmacias en Ecuador"</em>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PLAN OPERATIVO -->
<section id="plan" class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Plan de trabajo</p>
            <h2 class="text-4xl font-extrabold text-white">Qué vamos a hacer cada mes</h2>
        </div>

        <div class="space-y-4">
            <!-- Mes 1 -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0 w-16 h-16 rounded-xl brand-grad flex items-center justify-center">
                        <span class="text-white font-black text-xl">M1</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-xl mb-1">Arreglar la web y publicar los primeros 20 artículos</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Junio 2026 — dejamos la base ordenada</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Revisión completa de la web y corrección de los errores que detectamos</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Instalación de las herramientas de medición de Google para saber qué funciona</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Agregar etiquetas para que Google entienda que Dikapsa es una imprenta en Quito y Otavalo</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 artículos en el blog de la web (5 por cada sector + 5 generales)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Pregunta "¿cómo nos conociste?" en el formulario para saber qué cliente vino por la web</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Mejorar los textos que aparecen cuando alguien busca Dikapsa en Google</span></div>
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
                        <h3 class="text-white font-bold text-xl mb-1">Páginas específicas por sector + 20 artículos más</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Julio 2026 — mensajes específicos para cada tipo de cliente</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">3 páginas dedicadas: una para alimentos, una para retail, una para farmacia</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Primer caso de éxito publicado: <strong class="text-cyan-300">Frutería Monserrate</strong> · artículo con foto del producto, qué cantidad producimos, qué tipo de empaque y por qué nos eligen hace 5 años</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 artículos nuevos en el blog</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Conexión entre artículos y páginas de sector para guiar al visitante</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Actualizar el perfil de Google de Dikapsa (Quito y Otavalo)</span></div>
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
                        <h3 class="text-white font-bold text-xl mb-1">Más casos de éxito + 20 artículos</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Agosto 2026 — mostrar trabajos reales</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 2: <strong class="text-cyan-300">Yogurt Amazonas</strong> · cajas para el sector lácteo, con datos de cantidad mensual, plazos y testimonio del cliente</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 3: <strong class="text-cyan-300">Pedro Moncayo</strong> · papelería para una cooperativa que llegó por la web (importante para mostrar a otras cooperativas)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 artículos nuevos en el blog</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Video corto del taller mostrando la Heidelberg y la Xerox trabajando</span></div>
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
                        <h3 class="text-white font-bold text-xl mb-1">Conseguir menciones en otros sitios + 20 artículos</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Septiembre 2026 — que Google le tenga más confianza a la web</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Contactar a 10 portales y revistas del sector para que mencionen a Dikapsa</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Inscribir a Dikapsa en directorios de empresas (CAPEIPI, Cámaras de Comercio)</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">20 artículos nuevos en el blog</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Probar dos versiones de título en los artículos que más visitas tienen</span></div>
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
                        <h3 class="text-white font-bold text-xl mb-1">Mejorar lo que está rindiendo + 20 artículos</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Octubre 2026 — corregir el rumbo con datos reales</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Reescribir 10 artículos que están atrayendo visitas pero no clientes</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Detectar nuevas búsquedas que la gente hace y publicar 20 artículos según eso</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Caso de éxito 4: <strong class="text-cyan-300">Cervecería Nacional</strong> · material de exhibición (habladores, cenefas, triaramas) con volúmenes reales y foto del producto en góndola</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Hacer que la web cargue más rápido en celular</span></div>
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
                        <h3 class="text-white font-bold text-xl mb-1">Cierre + reporte final con resultados</h3>
                        <p class="text-cyan-200/70 text-sm mb-3">Noviembre 2026 — entrega de cuentas</p>
                        <div class="grid md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Últimos 20 artículos del calendario</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Reporte final de los 6 meses: clientes interesados, clientes cerrados, visitas, ventas</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Propuesta para el siguiente año basada en lo que vimos que funciona</span></div>
                            <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">→</span><span class="text-cyan-100/80">Documentación de buenas prácticas para que ustedes puedan seguir solos si quieren</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Qué es un caso de éxito -->
        <div class="mt-10 glass rounded-2xl p-8 border-l-4 border-brand-400">
            <p class="text-brand-300 text-xs font-bold uppercase tracking-widest mb-2">Aclaración importante</p>
            <h3 class="text-white font-bold text-xl mb-4">¿Qué es un caso de éxito en este plan?</h3>
            <p class="text-cyan-100/80 text-sm leading-relaxed mb-5">
                Cada caso de éxito es un <strong class="text-white">artículo publicado en la web de Dikapsa</strong> que cuenta un trabajo real ya hecho para un cliente específico, con fotos del producto, datos concretos y, si se consigue, una cita del cliente. No es un dosier comercial ni una infografía: es una página dentro de la web con dirección propia (por ejemplo <em>dikapsa.com/casos/yogurt-amazonas/</em>).
            </p>
            <div class="grid md:grid-cols-2 gap-5 text-sm">
                <div>
                    <p class="text-white font-semibold mb-2">Para qué sirve cada caso</p>
                    <ul class="space-y-1 text-cyan-100/70">
                        <li>· Mostrar credibilidad a quien entra a la web por primera vez</li>
                        <li>· Aparecer en Google cuando alguien busca productos similares</li>
                        <li>· Material que el vendedor puede compartir cuando visita a un prospecto del mismo sector</li>
                    </ul>
                </div>
                <div>
                    <p class="text-white font-semibold mb-2">Qué incluye cada caso</p>
                    <ul class="space-y-1 text-cyan-100/70">
                        <li>· Fotos del producto y del proceso</li>
                        <li>· Qué pidió el cliente y qué hicimos</li>
                        <li>· Cantidades, tiempos y resultado</li>
                        <li>· (Si se consigue) 2-3 líneas del cliente</li>
                    </ul>
                </div>
            </div>
            <p class="text-cyan-100/70 text-sm mt-5">
                <strong class="text-white">Lo que necesitamos de Dikapsa:</strong> autorización del cliente para publicar su nombre, 2-4 fotos del producto, y 15 minutos de conversación con quien lleva la cuenta. El resto lo redactamos y diseñamos nosotros.
            </p>
        </div>

        <div class="mt-6 glass-strong rounded-2xl p-8">
            <h3 class="text-white font-bold text-xl mb-4">Durante los 6 meses, además</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Reunión mensual</strong> con Diego para revisar resultados y ajustar</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Reporte mensual</strong> con los números importantes (visitas, clientes interesados, posiciones en Google)</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Coordinación con Santiago Oña</strong> para acceso a la web y publicación</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Aprobación de los artículos</strong> con Diego (1-2 días por lote)</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Aplicar el manual de marca</strong> de Dikapsa en todas las piezas</span></div>
                <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/80"><strong class="text-white">Usar las fotos</strong> de productos, proceso y equipo que ustedes nos compartirán</span></div>
            </div>
        </div>
    </div>
</section>

<!-- INVERSION -->
<section id="modelo" class="py-20 bg-gradient-to-b from-transparent via-cyan-950/20 to-transparent">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Costo</p>
            <h2 class="text-4xl font-extrabold text-white">2 formas de pagar</h2>
            <p class="text-cyan-100/70 mt-3">Elijan la que mejor se acomode al flujo de caja de Dikapsa.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Opción A -->
            <div class="glass-strong rounded-2xl p-8 border-2 border-brand-400/60 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full brand-grad text-white text-xs font-black uppercase tracking-widest">Recomendado</span>
                <p class="text-brand-300 font-bold text-sm uppercase tracking-widest mb-2 mt-3">Opción A · Un solo pago</p>
                <div class="flex items-baseline gap-2 mb-1">
                    <span class="text-5xl font-black text-white">USD 600</span>
                </div>
                <p class="text-cyan-100/70 text-sm mb-6">+ IVA · Pagado al inicio · cubre los 6 meses</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">120 artículos publicados</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">3 páginas dedicadas (alimentos, retail, farmacia)</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Instalación de herramientas de medición</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">4 casos de éxito documentados</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Reunión mensual + reporte ejecutivo</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Equivale a <strong class="text-white">USD 100 al mes</strong></span></div>
                </div>
            </div>

            <!-- Opción B -->
            <div class="glass rounded-2xl p-8">
                <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2 mt-3">Opción B · Pago mensual</p>
                <div class="flex items-baseline gap-2 mb-1">
                    <span class="text-5xl font-black text-white">USD 150</span>
                    <span class="text-cyan-200/70">/mes</span>
                </div>
                <p class="text-cyan-100/70 text-sm mb-6">+ IVA cada mes · Sin pagar todo de una</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Lo mismo que la opción A</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Más flexibilidad en los pagos</span></div>
                    <div class="flex items-start gap-2"><span class="text-brand-400 font-bold">✓</span><span class="text-cyan-100/90">Total 6 meses: <strong class="text-white">USD 900</strong> + IVA</span></div>
                    <div class="flex items-start gap-2 opacity-60"><span class="text-cyan-300/50">·</span><span class="text-cyan-100/60">USD 300 más caro vs opción A (por la comodidad de pagar mensual)</span></div>
                </div>
            </div>
        </div>

        <div class="mt-8 glass rounded-2xl p-6 text-center">
            <p class="text-cyan-100/80 text-sm">
                <strong class="text-white">Sin cobro por venta:</strong> nosotros no cobramos un porcentaje de los clientes nuevos. Si los clientes no llegan, ajustamos sin costo extra.
            </p>
        </div>
    </div>
</section>

<!-- LO QUE PUEDEN GANAR -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Lo que pueden ganar</p>
            <h2 class="text-4xl font-extrabold text-white">Cuánto puede valer la inversión</h2>
        </div>

        <div class="glass-strong rounded-2xl p-8 mb-6">
            <div class="grid md:grid-cols-3 gap-6 text-center">
                <div>
                    <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Inversión 6 meses</p>
                    <div class="text-4xl font-black text-white">$600</div>
                    <p class="text-cyan-100/60 text-sm mt-1">+ IVA</p>
                </div>
                <div>
                    <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Meta de venta nueva</p>
                    <div class="text-4xl font-black text-grad">$300.000</div>
                    <p class="text-cyan-100/60 text-sm mt-1">año 2026-2027</p>
                </div>
                <div>
                    <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Por cada $1 invertido</p>
                    <div class="text-4xl font-black text-brand-400">$500</div>
                    <p class="text-cyan-100/60 text-sm mt-1">si se cumple la meta</p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            <div class="glass rounded-2xl p-6">
                <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Escenario conservador</p>
                <div class="text-2xl font-black text-white mb-1">2 clientes nuevos</div>
                <p class="text-cyan-100/70 text-sm mb-3">a $50.000 cada uno</p>
                <div class="text-3xl font-black text-grad">$100.000</div>
                <p class="text-cyan-100/60 text-xs mt-1">por cada $1 invertido se ganan $167</p>
            </div>
            <div class="glass-strong rounded-2xl p-6 border-brand-400/40">
                <p class="text-brand-300 text-xs uppercase font-bold tracking-widest mb-2">Meta de Dikapsa</p>
                <div class="text-2xl font-black text-white mb-1">4 clientes nuevos</div>
                <p class="text-cyan-100/70 text-sm mb-3">a $75.000 cada uno</p>
                <div class="text-3xl font-black text-grad">$300.000</div>
                <p class="text-cyan-100/60 text-xs mt-1">por cada $1 invertido se ganan $500</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <p class="text-cyan-200/60 text-xs uppercase font-bold tracking-widest mb-2">Escenario optimista</p>
                <div class="text-2xl font-black text-white mb-1">6 clientes nuevos</div>
                <p class="text-cyan-100/70 text-sm mb-3">a $80.000 cada uno</p>
                <div class="text-3xl font-black text-grad">$480.000</div>
                <p class="text-cyan-100/60 text-xs mt-1">por cada $1 invertido se ganan $800</p>
            </div>
        </div>
    </div>
</section>

<!-- POR QUÉ CREATIVE WEB -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-cyan-300 font-bold text-sm uppercase tracking-widest mb-2">Por qué Creative Web</p>
            <h2 class="text-4xl font-extrabold text-white">Lo que estamos haciendo con otros clientes</h2>
            <p class="text-cyan-100/70 mt-3 max-w-2xl mx-auto">Trabajos activos en Quito y la sierra norte con resultados reales.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-2">Concesionario automotor</p>
                <h3 class="text-white font-bold text-xl mb-2">Comercial Hidrobo</h3>
                <div class="text-3xl font-black text-grad mb-2">8.952</div>
                <p class="text-cyan-100/70 text-sm">personas entran al sitio cada mes desde Google (870.000 veces aparecen los resultados).</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-2">Restaurante con vista</p>
                <h3 class="text-white font-bold text-xl mb-2">Luuma · Manta</h3>
                <div class="text-3xl font-black text-grad mb-2">35</div>
                <p class="text-cyan-100/70 text-sm">artículos publicados con voz humana, no genéricos como los hace una inteligencia artificial.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-2">Clínica dental Otavalo</p>
                <h3 class="text-white font-bold text-xl mb-2">Odontología Life</h3>
                <div class="text-3xl font-black text-grad mb-2">274</div>
                <p class="text-cyan-100/70 text-sm">personas entran al mes desde un solo artículo: "Implantes dentales en Ecuador".</p>
            </div>
        </div>

        <div class="mt-10 glass rounded-2xl p-8">
            <h3 class="text-white font-bold text-xl mb-4">Cómo trabajamos diferente</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">01</span>
                    <div><p class="text-white font-semibold mb-1">Decisiones basadas en datos reales</p><p class="text-cyan-100/70">Cada artículo sale de una búsqueda real que hace la gente, no de "lo que se nos ocurre".</p></div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">02</span>
                    <div><p class="text-white font-semibold mb-1">Artículos con voz humana</p><p class="text-cyan-100/70">Revisamos cada texto para que no suene como hecho por inteligencia artificial. Si suena genérico, no se publica.</p></div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">03</span>
                    <div><p class="text-white font-semibold mb-1">Publicación escalonada</p><p class="text-cyan-100/70">No publicamos todo de golpe (Google penaliza eso). 4 o 5 artículos por semana, ritmo natural.</p></div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-brand-400 font-black text-lg">04</span>
                    <div><p class="text-white font-semibold mb-1">Reporte mensual claro</p><p class="text-cyan-100/70">Reporte con los números que importan, no con planillas de Excel difíciles de leer. Reunión mensual con quien toma decisiones.</p></div>
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
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">¿Empezamos en junio?</h2>
            <p class="text-cyan-100/80 text-lg max-w-2xl mx-auto mb-8">
                Si aprueban la propuesta, comenzamos a arreglar la web en 5 días hábiles. Los primeros 20 artículos se publican antes de fin de mes.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="descargar-pdf.php" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Descargar PDF
                </a>
                <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20queremos%20aprobar%20la%20propuesta%20de%20Dikapsa" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white/5 hover:bg-white/10 border border-cyan-400/30 text-white font-bold text-base transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
                    Escribirnos por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-10 border-t border-cyan-400/10">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-cyan-300 text-sm">Propuesta hecha por <strong class="text-white">Creative Web</strong></p>
        <p class="text-cyan-200/50 text-xs mt-2">Confidencial · Solo Dikapsa · Junio 2026 · Vigencia 30 días</p>
    </div>
</footer>

</body>
</html>
