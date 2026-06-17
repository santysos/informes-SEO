<?php
session_start();
if (empty($_SESSION['auth_lajungla_proforma'])) {
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
<title>Propuesta integral — La Jungla 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Outfit', 'sans-serif'] }, colors: { brand: { 700: '#15803d', 600: '#16a34a', 500: '#22c55e', 400: '#4ade80', 300: '#86efac' }, gold: { 400: '#fbbf24' } } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #07140d; color: #e7f5ec; }
.brand-grad { background: linear-gradient(135deg, #15803d 0%, #4ade80 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(34,197,94,0.10) 0%, rgba(74,222,128,0.04) 100%); }
.gold-grad { background: linear-gradient(135deg, #b45309 0%, #fbbf24 100%); }
.glass { background: rgba(12, 30, 20, 0.55); backdrop-filter: blur(20px); border: 1px solid rgba(74, 222, 128, 0.15); }
.glass-strong { background: rgba(16, 40, 27, 0.82); backdrop-filter: blur(20px); border: 1px solid rgba(74, 222, 128, 0.25); }
.text-grad { background: linear-gradient(135deg, #4ade80 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.text-gold { background: linear-gradient(135deg, #fbbf24 0%, #fde68a 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.bg-grid { background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(74,222,128,0.04) 39px, rgba(74,222,128,0.04) 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(74,222,128,0.04) 39px, rgba(74,222,128,0.04) 40px); }
@media print {
    body { background: white; color: #14271b; }
    .no-print-only, header nav { display: none !important; }
    section { page-break-inside: avoid; }
}
</style>
</head>
<body class="bg-grid">

<!-- TOP NAV -->
<header class="no-print-only sticky top-0 z-50 glass-strong border-b border-emerald-400/10">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl brand-grad flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 21c4-1 7-4 9-8m0 0c2-4 5-7 9-8-1 6-4 11-9 13M12 13C9 11 6 10 3 11c1 4 4 7 8 8"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest">Creative Web · Propuesta</p>
                <p class="text-white font-semibold text-sm">La Jungla — Junio 2026</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="logout.php" class="text-emerald-300 hover:text-white text-sm font-semibold">Salir</a>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="pt-16 pb-16">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-4">Propuesta integral de marca digital</p>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight text-white">
            Lleva La Jungla<br>
            <span class="text-grad">del taller al celular de todo el país</span>
        </h1>
        <p class="text-emerald-100/80 text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed mb-10">
            La Jungla ya fabrica y vende al por mayor. Esta propuesta arma el siguiente paso: una tienda online que vende sola (mayorista y al detalle), contenido en TikTok que atrae compradores, y posicionamiento en Google para que te encuentren cuando buscan trajes de baño.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">3</div>
                <p class="text-emerald-200/70 text-xs uppercase tracking-widest mt-1">pasos · a tu ritmo</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">2 en 1</div>
                <p class="text-emerald-200/70 text-xs uppercase tracking-widest mt-1">venta al por mayor y al detalle</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">8</div>
                <p class="text-emerald-200/70 text-xs uppercase tracking-widest mt-1">videos TikTok al mes</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">120</div>
                <p class="text-emerald-200/70 text-xs uppercase tracking-widest mt-1">artículos SEO en 6 meses</p>
            </div>
        </div>

        <a href="#inversion" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-emerald-950 font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver inversión completa
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- PLAN POR PASOS -->
<section class="py-12">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-2">Cómo avanzamos</p>
            <h2 class="text-4xl font-extrabold text-white">El plan, paso a paso</h2>
            <p class="text-emerald-100/70 mt-3 max-w-2xl mx-auto">Cada cosa a su tiempo. Primero la tienda; cuando esté lista, sumamos los videos y el posicionamiento — esos dos pueden ir al mismo tiempo.</p>
        </div>

        <!-- Paso 1 -->
        <a href="#paso1" class="block glass rounded-2xl p-6 mb-4 hover:border-emerald-400/40 transition border border-transparent">
            <div class="flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">1</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-white font-bold text-xl">Primero: armamos la tienda web</h3>
                        <span class="text-emerald-200/80 text-sm font-semibold">· 4 semanas · USD 680 + IVA</span>
                    </div>
                    <p class="text-emerald-100/70 text-sm">Diseño a medida, compra automática, dominio y hosting. Aquí tomamos una decisión: si la <strong class="text-white">venta al por mayor</strong> entra desde el primer día o la sumamos más adelante.</p>
                </div>
            </div>
        </a>

        <!-- Decisión mayorista -->
        <a href="#paso1b" class="block glass rounded-2xl p-6 mb-4 ml-0 md:ml-12 border border-gold-400/30 hover:border-gold-400/60 transition">
            <div class="flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl gold-grad flex items-center justify-center text-emerald-950 font-black text-xl">+</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-white font-bold text-xl">Decisión: venta al por mayor</h3>
                        <span class="text-gold text-sm font-semibold">· USD 380 + IVA · al inicio o después</span>
                    </div>
                    <p class="text-emerald-100/70 text-sm">Que tus revendedores vean precios especiales y compren por cantidad, en la misma web. Se puede activar desde el arranque o agregar cuando quieras — el costo es el mismo.</p>
                </div>
            </div>
        </a>

        <!-- Paso 2 -->
        <a href="#paso2" class="block glass rounded-2xl p-6 mb-4 hover:border-emerald-400/40 transition border border-transparent">
            <div class="flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">2</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-white font-bold text-xl">Con la web lista: videos para TikTok</h3>
                        <span class="text-emerald-200/80 text-sm font-semibold">· USD 275 / mes</span>
                    </div>
                    <p class="text-emerald-100/70 text-sm">8 videos al mes que atraen compradores y los mandan a la tienda. Arranca una vez que la web ya puede recibir los pedidos.</p>
                </div>
            </div>
        </a>

        <!-- Paso 3 -->
        <a href="#paso3" class="block glass rounded-2xl p-6 mb-4 hover:border-emerald-400/40 transition border border-transparent">
            <div class="flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">3</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="text-white font-bold text-xl">En paralelo: posicionamiento en Google (6 meses)</h3>
                        <span class="text-emerald-200/80 text-sm font-semibold">· desde USD 100 / mes</span>
                    </div>
                    <p class="text-emerald-100/70 text-sm">Para que te encuentren cuando buscan trajes de baño. Corre <strong class="text-white">al mismo tiempo</strong> que los videos de TikTok: uno atrae desde redes, el otro desde Google.</p>
                </div>
            </div>
        </a>

        <div class="glass-strong rounded-2xl p-5 mt-6 text-center">
            <p class="text-emerald-100/85 text-sm"><strong class="text-white">En resumen:</strong> paso 1 (web) primero. Cuando la web esté lista, los pasos 2 (TikTok) y 3 (posicionamiento) avanzan juntos, mes a mes.</p>
        </div>
    </div>
</section>

<!-- ===================== PASO 1 ===================== -->
<section id="paso1" class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 rounded-full brand-grad text-emerald-950 text-xs font-black uppercase tracking-widest mb-3">Paso 1 · La tienda web</span>
            <h2 class="text-4xl font-extrabold text-white mb-3">Tu tienda online completa</h2>
            <p class="text-emerald-100/70 max-w-2xl mx-auto">Pensada para que el cliente que llega desde redes compre por su cuenta — eligiendo talla, color y pagando solo — sin que el equipo de La Jungla tenga que responder cada mensaje por WhatsApp.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="glass-strong rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Tienda online a medida</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Diseño exclusivo para La Jungla (colores y estilo de marca)</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Se ve perfecto en celular, tablet y computadora</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Banner animado para colecciones y promociones</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Categorías destacadas (bikinis, enterizos, línea de niños, etc.)</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Ficha de producto con tallas, colores, estampados y galería de fotos</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Guía de tallas con medidas en cm para reducir cambios y devoluciones</span></li>
                </ul>
            </div>

            <div class="glass-strong rounded-2xl p-7 border-2 border-emerald-400/40 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full brand-grad text-emerald-950 text-xs font-black uppercase tracking-widest">Lo principal</span>
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4 mt-2">
                    <svg class="w-6 h-6 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Compra automática 24 horas</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/90">El cliente elige talla, color y cantidad <strong class="text-white">sin escribir a nadie</strong></span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/90">Paga desde la web y recibe confirmación al instante</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/90">Llegan pedidos en la madrugada cuando el taller está cerrado</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/90"><strong class="text-white">Baja la cantidad de mensajes</strong> que el equipo responde a mano</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/90">Flujo final: redes → WhatsApp para dudas → tienda para comprar</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/90">Aviso automático de cada pedido a La Jungla por correo</span></li>
                </ul>
            </div>

            <div class="glass-strong rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Pagos y envíos</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80"><strong class="text-white">PayPhone</strong> integrado (tarjeta de crédito y débito)</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Transferencia bancaria con comprobante</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Confirmación del pedido por correo al cliente</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Banner de envíos a todo el país</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Costos de envío configurables por ciudad</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Botón "Retiro en taller/showroom" si lo quieren ofrecer</span></li>
                </ul>
            </div>
        </div>

        <!-- Tecnologia + carga -->
        <div class="grid md:grid-cols-2 gap-6 mt-6">
            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Tecnología que pueden manejar sin programar</h3>
                <p class="text-emerald-100/75 text-sm mb-4">Toda la tienda corre en <strong class="text-white">WordPress + WooCommerce</strong>. Subir un producto nuevo es tan fácil como hacer un post de Instagram.</p>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Subir productos cuando saquen nueva colección</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Cambiar precios, tallas y stock disponible</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Crear promociones y cupones de descuento</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/80">Ver pedidos recibidos y marcarlos como enviados</span></li>
                </ul>
                <p class="text-xs text-emerald-200/60 mt-5 italic">Incluye 2 sesiones de capacitación para el equipo.</p>
            </div>
            <div class="brand-grad-soft border border-emerald-400/30 rounded-2xl p-7">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg mb-1">Carga inicial de productos</h3>
                        <p class="text-emerald-100/80 text-sm leading-relaxed">Cargamos los primeros <strong class="text-white">20 productos</strong> con foto, descripción, tallas, colores y precio. El resto del catálogo lo suben ustedes con la capacitación.</p>
                    </div>
                </div>
                <div class="border-t border-emerald-400/20 pt-4 mt-4">
                    <h4 class="text-white font-bold text-sm mb-2">Dominio + Hosting incluidos (1 año)</h4>
                    <ul class="space-y-1 text-sm text-emerald-100/80">
                        <li>· Registro de dominio <strong class="text-white">.com</strong> a nombre de La Jungla</li>
                        <li>· Hosting Pro en disco SSD + certificado SSL (candadito verde)</li>
                        <li>· Correos corporativos (ej: ventas@lajungla.com)</li>
                        <li>· Copias de seguridad diarias · soporte técnico 12 meses</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- precio paso 1 -->
        <div class="mt-6 glass-strong rounded-2xl p-7 flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <h4 class="text-white font-bold text-lg">Tienda online + dominio .com + hosting 1 año</h4>
                <p class="text-emerald-100/60 text-sm">Diseño a medida · compra automática · 20 productos cargados · capacitación · soporte 12 meses</p>
            </div>
            <div class="text-right whitespace-nowrap">
                <span class="text-grad font-black text-4xl">USD 680</span>
                <span class="text-emerald-200/80 font-bold text-lg ml-1">+ IVA</span>
                <p class="text-emerald-100/60 text-xs mt-1">Entrega en 4 semanas · pago 60% / 40%</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== PASO 1B · MAYORISTA ===================== -->
<section id="paso1b" class="py-16 bg-gradient-to-b from-transparent via-emerald-950/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 rounded-full gold-grad text-emerald-950 text-xs font-black uppercase tracking-widest mb-3">Decisión del Paso 1 · al inicio o después</span>
            <h2 class="text-4xl font-extrabold text-white mb-3">Vende al por mayor y al detalle en la misma tienda</h2>
            <p class="text-emerald-100/70 max-w-2xl mx-auto">El corazón de La Jungla es la venta al por mayor. Esto permite que un revendedor vea sus precios especiales y un cliente final vea el precio normal — todo en la misma web, sin confusiones. Se puede activar desde que arranca la tienda o sumarlo más adelante.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div class="glass-strong rounded-2xl p-7">
                <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Venta al por mayor</p>
                <h3 class="text-white font-bold text-xl mb-4">Para tus revendedores</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-gold-400 font-bold">→</span><span class="text-emerald-100/85">Cuenta de cliente mayorista con <strong class="text-white">precios especiales</strong> al iniciar sesión</span></li>
                    <li class="flex items-start gap-2"><span class="text-gold-400 font-bold">→</span><span class="text-emerald-100/85">Pedido mínimo por cantidad (ej: docena o por bulto)</span></li>
                    <li class="flex items-start gap-2"><span class="text-gold-400 font-bold">→</span><span class="text-emerald-100/85">Descuentos por volumen automáticos (más compras, mejor precio)</span></li>
                    <li class="flex items-start gap-2"><span class="text-gold-400 font-bold">→</span><span class="text-emerald-100/85">Catálogo mayorista con precios visibles solo para revendedores aprobados</span></li>
                    <li class="flex items-start gap-2"><span class="text-gold-400 font-bold">→</span><span class="text-emerald-100/85">Solicitud de cuenta mayorista que ustedes aprueban manualmente</span></li>
                    <li class="flex items-start gap-2"><span class="text-gold-400 font-bold">→</span><span class="text-emerald-100/85">Compra rápida por referencia/talla para pedidos grandes</span></li>
                </ul>
            </div>
            <div class="glass-strong rounded-2xl p-7">
                <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Venta al detalle</p>
                <h3 class="text-white font-bold text-xl mb-4">Para el cliente final</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/85">Precio de detalle visible para cualquier visitante</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/85">Compra de unidades sueltas sin mínimo</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/85">La misma tienda, sin necesidad de un segundo sitio</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/85">Un solo panel para administrar ambos tipos de venta</span></li>
                    <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold">→</span><span class="text-emerald-100/85">Reportes separados: cuánto vendes a mayoristas vs a detalle</span></li>
                </ul>
            </div>
        </div>

        <div class="mt-6 glass-strong rounded-2xl p-7 flex flex-col md:flex-row items-center justify-between gap-4 border border-gold-400/30">
            <div>
                <h4 class="text-white font-bold text-lg">Venta al por mayor y al detalle</h4>
                <p class="text-emerald-100/60 text-sm">Se implementa sobre la tienda del Paso 1, al inicio o cuando lo decidas. Doble lista de precios, cuentas de revendedor, pedido mínimo y descuentos por cantidad.</p>
            </div>
            <div class="text-right whitespace-nowrap">
                <span class="text-gold font-black text-4xl">USD 380</span>
                <span class="text-emerald-200/80 font-bold text-lg ml-1">+ IVA</span>
                <p class="text-emerald-100/60 text-xs mt-1">Pago único · se suma a la tienda del Paso 1</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== PASO 2 · TIKTOK ===================== -->
<section id="paso2" class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 rounded-full brand-grad text-emerald-950 text-xs font-black uppercase tracking-widest mb-3">Paso 2 · Mensual (con la web lista)</span>
            <h2 class="text-4xl font-extrabold text-white mb-3">Contenido en TikTok que atrae compradores</h2>
            <p class="text-emerald-100/70 max-w-2xl mx-auto">En Ecuador TikTok es el escaparate número uno para moda. No se trata de "hacerse viral": se trata de publicar con constancia, mostrar el producto en movimiento y mandar ese tráfico a la tienda y al WhatsApp.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-6 mb-6">
            <div class="glass-strong rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Qué incluye cada mes</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3"><div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-400/30 flex items-center justify-center flex-shrink-0"><span class="text-emerald-300 font-black text-sm">8</span></div><span class="text-emerald-100/85 pt-1"><strong class="text-white">8 videos al mes</strong> (2 por semana), formato vertical 9:16 optimizado</span></li>
                    <li class="flex items-start gap-3"><div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div><span class="text-emerald-100/85 pt-1"><strong class="text-white">Guion</strong> de cada video con gancho en los primeros segundos</span></li>
                    <li class="flex items-start gap-3"><div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div><span class="text-emerald-100/85 pt-1"><strong class="text-white">Grabación</strong> del material (try-on, detrás de cámara, producto)</span></li>
                    <li class="flex items-start gap-3"><div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div><span class="text-emerald-100/85 pt-1"><strong class="text-white">Edición</strong> profesional: cortes, subtítulos, música y tendencias</span></li>
                    <li class="flex items-start gap-3"><div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div><span class="text-emerald-100/85 pt-1"><strong class="text-white">Asesoría para hacer lives</strong>: cómo vender en vivo, guion y dinámica</span></li>
                </ul>
            </div>
            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Cómo trabajamos</h3>
                <div class="space-y-4 text-sm">
                    <div>
                        <p class="text-white font-semibold mb-1">Lo que ponemos nosotros</p>
                        <p class="text-emerald-100/70">Estrategia y calendario, guiones, dirección de grabación, edición completa, copys y hashtags, y la asesoría para que ustedes hagan lives que vendan.</p>
                    </div>
                    <div>
                        <p class="text-white font-semibold mb-1">Lo que pone La Jungla</p>
                        <p class="text-emerald-100/70">Las prendas, las modelos (pueden ser del propio equipo) y la locación (su taller o showroom). Así el costo se mantiene bajo y el contenido se siente auténtico.</p>
                    </div>
                    <div class="brand-grad-soft border border-emerald-400/25 rounded-xl p-4">
                        <p class="text-emerald-100/85"><strong class="text-white">Importante:</strong> en Ecuador la venta directa por TikTok Shop aún es limitada. Por eso TikTok funciona como imán: atrae gente y la manda a la tienda online y al WhatsApp para cerrar la compra.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-strong rounded-2xl p-7 flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <h4 class="text-white font-bold text-lg">Plan mensual de contenido TikTok</h4>
                <p class="text-emerald-100/60 text-sm">8 videos/mes · guion · grabación · edición · asesoría para lives · sin permanencia (mes a mes)</p>
            </div>
            <div class="text-right whitespace-nowrap">
                <span class="text-grad font-black text-4xl">USD 275</span>
                <span class="text-emerald-200/80 font-bold text-lg ml-1">/ mes + IVA</span>
                <p class="text-emerald-100/60 text-xs mt-1">Producción con su equipo y producto</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== PASO 3 · POSICIONAMIENTO ===================== -->
<section id="paso3" class="py-16 bg-gradient-to-b from-transparent via-emerald-950/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 rounded-full brand-grad text-emerald-950 text-xs font-black uppercase tracking-widest mb-3">Paso 3 · 6 meses (en paralelo con TikTok)</span>
            <h2 class="text-4xl font-extrabold text-white mb-3">Que te encuentren en Google cuando buscan trajes de baño</h2>
            <p class="text-emerald-100/70 max-w-2xl mx-auto">Quien quiere comprar trajes de baño para revender —o para su tienda— busca en Google antes de pedir. Si La Jungla no aparece en los primeros resultados, ese cliente se va a la competencia. Este plan posiciona tu tienda mes a mes con contenido real, y puede ir al mismo tiempo que los videos de TikTok.</p>
        </div>

        <!-- la oportunidad -->
        <div class="brand-grad-soft border border-emerald-400/25 rounded-2xl p-8 text-center mb-10">
            <p class="text-2xl text-white font-bold mb-2">El comprador busca antes de escribir.</p>
            <p class="text-emerald-100/80 max-w-3xl mx-auto">Cuando alguien busca <em>"ternos de baño al por mayor Ecuador"</em>, <em>"fábrica de trajes de baño Otavalo"</em> o <em>"bikinis para reventa"</em>, La Jungla debería ser el primer resultado. Hoy esa búsqueda la ganan otros. Eso es lo que vamos a cambiar.</p>
        </div>

        <!-- plan operativo -->
        <h3 class="text-white font-bold text-2xl mb-6 text-center">Qué hacemos cada mes</h3>
        <div class="space-y-4 mb-10">
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">M1</div>
                <div><h4 class="text-white font-bold text-lg mb-1">Base ordenada + primeros 20 artículos</h4><p class="text-emerald-100/70 text-sm">Instalación de medición de Google, etiquetas para que entienda que La Jungla es fábrica de trajes de baño en Otavalo, optimización de la tienda y 20 artículos iniciales.</p></div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">M2</div>
                <div><h4 class="text-white font-bold text-lg mb-1">Páginas por tipo de cliente + 20 artículos</h4><p class="text-emerald-100/70 text-sm">Páginas dedicadas (mayoristas/revendedores y cliente final), guías de compra por modelo y temporada, y 20 artículos nuevos conectados entre sí.</p></div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">M3</div>
                <div><h4 class="text-white font-bold text-lg mb-1">Contenido de temporada + 20 artículos</h4><p class="text-emerald-100/70 text-sm">Aprovechamos los picos de búsqueda (vacaciones, feriados, verano costa) y publicamos 20 artículos más enfocados en lo que la gente busca en esas fechas.</p></div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">M4</div>
                <div><h4 class="text-white font-bold text-lg mb-1">Menciones en otros sitios + 20 artículos</h4><p class="text-emerald-100/70 text-sm">Inscripción en directorios y contacto con portales para que mencionen a La Jungla (Google le tiene más confianza a una web mencionada por otras).</p></div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">M5</div>
                <div><h4 class="text-white font-bold text-lg mb-1">Mejorar lo que rinde + 20 artículos</h4><p class="text-emerald-100/70 text-sm">Reescribimos los artículos que atraen visitas pero no ventas, detectamos búsquedas nuevas y publicamos 20 artículos según esos datos reales.</p></div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-emerald-950 font-black text-lg">M6</div>
                <div><h4 class="text-white font-bold text-lg mb-1">Cierre + reporte final con resultados</h4><p class="text-emerald-100/70 text-sm">Últimos 20 artículos, reporte de los 6 meses (visitas, posiciones, pedidos) y plan para el siguiente año basado en lo que funcionó.</p></div>
            </div>
        </div>

        <div class="glass rounded-2xl p-6 mb-10 text-sm grid md:grid-cols-2 gap-4">
            <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/80"><strong class="text-white">120 artículos</strong> publicados con voz humana, no genéricos de inteligencia artificial</span></div>
            <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/80"><strong class="text-white">Publicación escalonada</strong> (4-5 por semana), no todo de golpe</span></div>
            <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/80"><strong class="text-white">Reunión y reporte mensual</strong> con los números que importan</span></div>
            <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/80">Cada artículo sale de una <strong class="text-white">búsqueda real</strong> que hace la gente</span></div>
        </div>

        <!-- precios SEO -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass-strong rounded-2xl p-8 border-2 border-emerald-400/60 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full brand-grad text-emerald-950 text-xs font-black uppercase tracking-widest">Recomendado</span>
                <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-2 mt-3">Opción A · Un solo pago</p>
                <div class="flex items-baseline gap-2 mb-1"><span class="text-5xl font-black text-white">USD 600</span></div>
                <p class="text-emerald-100/70 text-sm mb-6">+ IVA · pagado al inicio · cubre los 6 meses</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">120 artículos publicados</span></div>
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Páginas por tipo de cliente (mayorista / detalle)</span></div>
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Instalación de herramientas de medición</span></div>
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Reunión mensual + reporte ejecutivo</span></div>
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Equivale a <strong class="text-white">USD 100 al mes</strong></span></div>
                </div>
            </div>
            <div class="glass rounded-2xl p-8">
                <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-2 mt-3">Opción B · Pago mensual</p>
                <div class="flex items-baseline gap-2 mb-1"><span class="text-5xl font-black text-white">USD 150</span><span class="text-emerald-200/70">/mes</span></div>
                <p class="text-emerald-100/70 text-sm mb-6">+ IVA cada mes · sin pagar todo de una</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Lo mismo que la opción A</span></div>
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Más flexibilidad en los pagos</span></div>
                    <div class="flex items-start gap-2"><span class="text-emerald-400 font-bold">✓</span><span class="text-emerald-100/90">Total 6 meses: <strong class="text-white">USD 900</strong> + IVA</span></div>
                    <div class="flex items-start gap-2 opacity-60"><span class="text-emerald-300/50">·</span><span class="text-emerald-100/60">USD 300 más que la opción A (por la comodidad de pagar mensual)</span></div>
                </div>
            </div>
        </div>

        <div class="mt-8 glass rounded-2xl p-6 text-center">
            <p class="text-emerald-100/80 text-sm"><strong class="text-white">Sin cobro por venta:</strong> no cobramos un porcentaje de los clientes nuevos. Si los resultados no llegan, ajustamos sin costo extra.</p>
        </div>
    </div>
</section>

<!-- ===================== RESUMEN INVERSION ===================== -->
<section id="inversion" class="py-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-2">Resumen de inversión</p>
            <h2 class="text-4xl font-extrabold text-white">Arma tu paquete</h2>
            <p class="text-emerald-100/70 mt-3">Pagos únicos para construir la tienda, planes mensuales para crecerla.</p>
        </div>

        <div class="glass-strong rounded-3xl p-8 md:p-10 border-2 border-emerald-400/30">
            <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-4">Pagos únicos (construcción)</p>
            <div class="space-y-4 mb-8">
                <div class="flex items-start justify-between gap-6 pb-4 border-b border-emerald-400/15">
                    <div><h4 class="text-white font-bold text-lg">Paso 1 · Tienda web + dominio + hosting</h4><p class="text-emerald-100/60 text-sm">Pago único · entrega 4 semanas</p></div>
                    <p class="text-white font-bold text-xl whitespace-nowrap">USD 680</p>
                </div>
                <div class="flex items-start justify-between gap-6 pb-4 border-b border-emerald-400/15">
                    <div><h4 class="text-white font-bold text-lg">Venta al por mayor (al inicio o después)</h4><p class="text-emerald-100/60 text-sm">Pago único · se suma a la tienda del Paso 1</p></div>
                    <p class="text-white font-bold text-xl whitespace-nowrap">USD 380</p>
                </div>
                <div class="flex items-start justify-between gap-6">
                    <div><h4 class="text-white font-bold text-lg">Subtotal de la tienda completa</h4><p class="text-emerald-100/60 text-sm">Lista para vender al por mayor y al detalle</p></div>
                    <p class="text-grad font-black text-2xl whitespace-nowrap">USD 1.060 <span class="text-emerald-200/80 text-base font-bold">+ IVA</span></p>
                </div>
            </div>

            <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-4 pt-2">Planes mensuales (crecimiento)</p>
            <div class="space-y-4">
                <div class="flex items-start justify-between gap-6 pb-4 border-b border-emerald-400/15">
                    <div><h4 class="text-white font-bold text-lg">Paso 2 · Contenido TikTok</h4><p class="text-emerald-100/60 text-sm">8 videos/mes · mes a mes · sin permanencia</p></div>
                    <p class="text-white font-bold text-xl whitespace-nowrap">USD 275 <span class="text-emerald-200/70 text-base font-normal">/mes</span></p>
                </div>
                <div class="flex items-start justify-between gap-6">
                    <div><h4 class="text-white font-bold text-lg">Paso 3 · Posicionamiento en Google (6 meses)</h4><p class="text-emerald-100/60 text-sm">USD 600 un pago · o USD 150/mes (total 900) · en paralelo con TikTok</p></div>
                    <p class="text-white font-bold text-xl whitespace-nowrap">desde USD 100 <span class="text-emerald-200/70 text-base font-normal">/mes</span></p>
                </div>
            </div>

            <div class="mt-8 grid md:grid-cols-2 gap-4 text-sm">
                <div class="glass rounded-xl p-5">
                    <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Abono inicial construcción · 60%</p>
                    <p class="text-white text-2xl font-extrabold">USD 636 <span class="text-base text-emerald-200/70 font-normal">+ IVA</span></p>
                    <p class="text-emerald-100/60 text-xs mt-1">A la firma, para arrancar la tienda</p>
                </div>
                <div class="glass rounded-xl p-5">
                    <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Saldo final construcción · 40%</p>
                    <p class="text-white text-2xl font-extrabold">USD 424 <span class="text-base text-emerald-200/70 font-normal">+ IVA</span></p>
                    <p class="text-emerald-100/60 text-xs mt-1">Antes de entregar la tienda en vivo</p>
                </div>
            </div>
            <p class="text-center text-emerald-200/60 text-xs mt-6">Cada paso se puede contratar por separado · Validez 15 días desde la fecha de esta propuesta</p>
        </div>
    </div>
</section>

<!-- POR QUE CREATIVE WEB -->
<section class="py-16 bg-gradient-to-b from-transparent via-emerald-950/20 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-2">Por qué Creative Web</p>
            <h2 class="text-4xl font-extrabold text-white">10+ años haciendo tiendas y posicionamiento</h2>
            <p class="text-emerald-100/70 mt-3 max-w-2xl mx-auto">Clientes activos en Quito, Ibarra, Manta y Otavalo con tiendas y portales en producción.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="glass rounded-2xl p-7">
                <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Concesionario automotor</p>
                <h3 class="text-white font-bold text-xl mb-2">Comercial Hidrobo</h3>
                <div class="text-3xl font-black text-grad mb-2">8.952</div>
                <p class="text-emerald-100/70 text-sm">personas entran al sitio cada mes desde Google.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Restaurante con vista · Manta</p>
                <h3 class="text-white font-bold text-xl mb-2">Luuma</h3>
                <div class="text-3xl font-black text-grad mb-2">35</div>
                <p class="text-emerald-100/70 text-sm">artículos publicados con voz humana, no genéricos.</p>
            </div>
            <div class="glass rounded-2xl p-7">
                <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-2">Clínica dental · Otavalo</p>
                <h3 class="text-white font-bold text-xl mb-2">Odontología Life</h3>
                <div class="text-3xl font-black text-grad mb-2">274</div>
                <p class="text-emerald-100/70 text-sm">personas entran al mes desde un solo artículo bien posicionado.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="glass-strong rounded-3xl p-10 md:p-14 text-center border-2 border-emerald-400/30">
            <p class="text-emerald-300 font-bold text-sm uppercase tracking-widest mb-3">Siguiente paso</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">¿Arrancamos esta semana?</h2>
            <p class="text-emerald-100/80 text-lg max-w-2xl mx-auto mb-8">
                Con el abono inicial empezamos el diseño en 2 días hábiles. En 4 semanas la tienda de La Jungla está en vivo, vendiendo al por mayor y al detalle, lista para conectar con TikTok y Google.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20queremos%20aprobar%20la%20propuesta%20de%20La%20Jungla" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-emerald-950 font-bold text-base hover:opacity-90 transition shadow-2xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
                    Escribirnos por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-10 border-t border-emerald-400/10">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-emerald-300 text-sm">Propuesta hecha por <strong class="text-white">Creative Web</strong></p>
        <p class="text-emerald-200/50 text-xs mt-2">Confidencial · Solo La Jungla · Junio 2026 · Validez 15 días</p>
    </div>
</footer>

</body>
</html>
