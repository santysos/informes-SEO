<?php
session_start();
if (empty($_SESSION['auth_valencia_proforma'])) {
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
<title>Propuesta E-commerce — Valencia Sports 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Outfit', 'sans-serif'] }, colors: { brand: { 600: '#65a30d', 500: '#84cc16', 400: '#a3e635', 300: '#bef264' } } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #0a0e1a; color: #e2e8f0; }
.brand-grad { background: linear-gradient(135deg, #65a30d 0%, #a3e635 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(132,204,22,0.08) 0%, rgba(163,230,53,0.04) 100%); }
.glass { background: rgba(20, 35, 25, 0.5); backdrop-filter: blur(20px); border: 1px solid rgba(163, 230, 53, 0.15); }
.glass-strong { background: rgba(25, 45, 30, 0.8); backdrop-filter: blur(20px); border: 1px solid rgba(163, 230, 53, 0.25); }
.text-grad { background: linear-gradient(135deg, #a3e635 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.bg-grid { background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(163,230,53,0.04) 39px, rgba(163,230,53,0.04) 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(163,230,53,0.04) 39px, rgba(163,230,53,0.04) 40px); }
@media print {
    body { background: white; color: #1e293b; }
    .no-print-only, header nav { display: none !important; }
    section { page-break-inside: avoid; }
}
</style>
</head>
<body class="bg-grid">

<!-- TOP NAV -->
<header class="no-print-only sticky top-0 z-50 glass-strong border-b border-lime-400/10">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl brand-grad flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-lime-300 uppercase tracking-widest">Creative Web · Propuesta</p>
                <p class="text-white font-semibold text-sm">Valencia Sports — Junio 2026</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="logout.php" class="text-lime-300 hover:text-white text-sm font-semibold">Salir</a>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="pt-16 pb-20">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-4">Propuesta de tienda online</p>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight text-white">
            Vende tu indumentaria<br>
            <span class="text-grad">desde el celular</span>
        </h1>
        <p class="text-lime-100/80 text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed mb-10">
            Que el cliente que llega desde redes compre por su cuenta — eligiendo talla, color y pagando solo — sin que el equipo tenga que responder cada mensaje por WhatsApp.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">USD 680</div>
                <p class="text-lime-200/70 text-xs uppercase tracking-widest mt-1">+ IVA · todo incluido</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">3</div>
                <p class="text-lime-200/70 text-xs uppercase tracking-widest mt-1">semanas de entrega</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">20</div>
                <p class="text-lime-200/70 text-xs uppercase tracking-widest mt-1">productos cargados por nosotros</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">12</div>
                <p class="text-lime-200/70 text-xs uppercase tracking-widest mt-1">meses de soporte técnico</p>
            </div>
        </div>

        <a href="#inversion" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-slate-900 font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver propuesta completa
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- QUÉ INCLUYE -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-2">Lo que recibes</p>
            <h2 class="text-4xl font-extrabold text-white mb-3">Tu tienda online completa</h2>
            <p class="text-lime-100/70 max-w-2xl mx-auto">Pensada para que el equipo de Valencia Sports atienda menos WhatsApp y reciba más pedidos automáticos.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- 1. Tienda -->
            <div class="glass-strong rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Tienda online a medida</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Diseño exclusivo para Valencia Sports (colores y estilo)</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Se ve perfecto en celular, tablet y computadora</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Banner animado para promociones</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Categorías destacadas (con énfasis en línea de portero)</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Ficha de producto detallada con tallas, colores y galería de fotos</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Carrito de compras y proceso de pago en 1 página</span></li>
                </ul>
            </div>

            <!-- 2. Compra automática -->
            <div class="glass-strong rounded-2xl p-7 border-2 border-lime-400/40 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full brand-grad text-slate-900 text-xs font-black uppercase tracking-widest">Lo principal</span>
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4 mt-2">
                    <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Compra automática las 24 horas</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/90">El cliente elige talla, color y cantidad <strong class="text-white">sin escribir a nadie</strong></span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/90">Pagina solo desde la web, recibe confirmación al instante</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/90">Llegan pedidos a la madrugada cuando la tienda está cerrada</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/90"><strong class="text-white">Baja la cantidad de mensajes</strong> que el equipo tiene que responder</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/90">El flujo final: redes → WhatsApp para consultas → tienda para comprar</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/90">Aviso automático del pedido a Valencia Sports por correo</span></li>
                </ul>
            </div>

            <!-- 3. Pagos -->
            <div class="glass-strong rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Pagos y envíos</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80"><strong class="text-white">PayPhone</strong> integrado (tarjeta de crédito y débito)</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Transferencia bancaria con comprobante</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Confirmación del pedido por correo al cliente</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Banner de envíos a todo el país</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Costos de envío configurables por ciudad</span></li>
                    <li class="flex items-start gap-2"><span class="text-lime-400 font-bold">→</span><span class="text-lime-100/80">Botón "Retiro en tienda" si quieren ofrecerlo</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- TECNOLOGÍA -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-2">Cómo está construida</p>
            <h2 class="text-4xl font-extrabold text-white">Tecnología que Valencia Sports puede manejar sin programar</h2>
            <p class="text-lime-100/70 mt-3 max-w-2xl mx-auto">Toda la tienda corre en WordPress con WooCommerce. Subir un producto nuevo es tan fácil como hacer un post de Instagram.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Lo que controlas tú</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><span class="text-lime-300 font-black text-sm">1</span></div>
                        <span class="text-lime-100/85 pt-1">Subir productos nuevos cuando llegue mercadería</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><span class="text-lime-300 font-black text-sm">2</span></div>
                        <span class="text-lime-100/85 pt-1">Cambiar precios, tallas y stock disponible</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><span class="text-lime-300 font-black text-sm">3</span></div>
                        <span class="text-lime-100/85 pt-1">Crear promociones y cupones de descuento</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><span class="text-lime-300 font-black text-sm">4</span></div>
                        <span class="text-lime-100/85 pt-1">Ver los pedidos recibidos y marcar como enviados</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><span class="text-lime-300 font-black text-sm">5</span></div>
                        <span class="text-lime-100/85 pt-1">Cambiar fotos del banner y promociones</span>
                    </li>
                </ul>
                <p class="text-xs text-lime-200/60 mt-5 italic">Te capacitamos durante 2 sesiones para que aprendas a hacer todo esto.</p>
            </div>

            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Lo que dejamos andando solo</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-lime-100/85 pt-1">Herramienta de medición de Google que cuenta cuántas personas entran cada día</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-lime-100/85 pt-1">Reporte de qué red social trae más visitantes</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-lime-100/85 pt-1">Reporte de qué productos se ven más y cuáles se venden</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-lime-100/85 pt-1">Las copias de seguridad del sitio cada día</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-lime-500/15 border border-lime-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-lime-100/85 pt-1">El certificado SSL para que la tienda sea segura</span>
                    </li>
                </ul>
                <p class="text-xs text-lime-200/60 mt-5 italic">Soporte técnico nuestro por 12 meses sin costo adicional.</p>
            </div>
        </div>

        <!-- Carga inicial -->
        <div class="mt-8 brand-grad-soft border border-lime-400/30 rounded-2xl p-7">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Carga inicial de productos</h3>
                    <p class="text-lime-100/80 text-sm leading-relaxed">Nosotros cargamos los primeros <strong class="text-white">20 productos</strong> con foto, descripción, tallas, colores y precio (incluyendo la línea de portero, que es lo más fuerte de Valencia Sports). El resto del catálogo lo van subiendo ustedes con la capacitación que les damos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HOSTING + DOMINIO -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-2">Sin costos escondidos</p>
            <h2 class="text-4xl font-extrabold text-white">Dominio y hosting incluidos por 1 año</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass rounded-2xl p-7">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-lime-500/15 border border-lime-400/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-lime-300 text-xs font-bold uppercase tracking-widest">Dominio</p>
                        <h3 class="text-white font-bold text-lg">Tu dirección web propia</h3>
                    </div>
                </div>
                <ul class="space-y-2 text-sm text-lime-100/80">
                    <li>· Registro de dominio <strong class="text-white">.com</strong> a nombre de Valencia Sports</li>
                    <li>· Incluido el primer año (renovación anual desde el segundo año)</li>
                    <li>· Configuración técnica completa hecha por nosotros</li>
                </ul>
            </div>

            <div class="glass rounded-2xl p-7">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-lime-500/15 border border-lime-400/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-lime-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 002 2h2m6-9l-2-2m0 0l-2 2m2-2v6"/></svg>
                    </div>
                    <div>
                        <p class="text-lime-300 text-xs font-bold uppercase tracking-widest">Hosting Pro</p>
                        <h3 class="text-white font-bold text-lg">Servidor donde vive la tienda</h3>
                    </div>
                </div>
                <ul class="space-y-2 text-sm text-lime-100/80">
                    <li>· Espacio ilimitado en discos SSD rápidos</li>
                    <li>· Ancho de banda ilimitado (no importa cuántos visitantes lleguen)</li>
                    <li>· Certificado SSL gratis (candadito verde en la dirección)</li>
                    <li>· Cuentas de correo ilimitadas (ej: ventas@valenciasports.com)</li>
                    <li>· Velocidad 30 veces más rápida que un hosting común</li>
                    <li>· Servidor disponible las 24 horas, todos los días</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- INVERSIÓN -->
<section id="inversion" class="py-20 bg-gradient-to-b from-transparent via-lime-950/20 to-transparent">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-2">Inversión</p>
            <h2 class="text-4xl font-extrabold text-white">Valor total del proyecto</h2>
            <p class="text-lime-100/70 mt-3">Precio especial por ser familia, todo incluido.</p>
        </div>

        <div class="glass-strong rounded-3xl p-10 border-2 border-lime-400/30">
            <!-- Items -->
            <div class="space-y-5 mb-8">
                <div class="flex items-start justify-between gap-6 pb-5 border-b border-lime-400/15">
                    <div>
                        <h4 class="text-white font-bold text-lg mb-1">Tienda online a medida</h4>
                        <p class="text-lime-100/60 text-sm">Diseño exclusivo, compra automática sin depender de WhatsApp. Carga de 20 productos iniciales. Capacitación incluida.</p>
                    </div>
                    <div class="text-right whitespace-nowrap">
                        <p class="text-white font-bold text-xl">USD 560</p>
                    </div>
                </div>
                <div class="flex items-start justify-between gap-6 pb-5 border-b border-lime-400/15">
                    <div>
                        <h4 class="text-white font-bold text-lg mb-1">Dominio .com + Hosting Pro (1 año)</h4>
                        <p class="text-lime-100/60 text-sm">Registro del dominio + servidor profesional + SSL + correos corporativos. Renovación desde el segundo año.</p>
                    </div>
                    <div class="text-right whitespace-nowrap">
                        <p class="text-white font-bold text-xl">USD 120</p>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="pt-3 border-t border-lime-400/20">
                <div class="flex justify-between items-baseline">
                    <span class="text-white font-bold text-xl">Total del proyecto</span>
                    <div class="text-right">
                        <span class="text-grad font-black text-4xl md:text-5xl">USD 680</span>
                        <span class="text-lime-200/80 font-bold text-lg ml-2">+ IVA</span>
                    </div>
                </div>
            </div>

            <!-- Forma de pago -->
            <div class="mt-8 grid md:grid-cols-2 gap-4 text-sm">
                <div class="glass rounded-xl p-5">
                    <p class="text-lime-300 text-xs font-bold uppercase tracking-widest mb-2">Abono inicial · 60%</p>
                    <p class="text-white text-2xl font-extrabold">USD 408 <span class="text-base text-lime-200/70 font-normal">+ IVA</span></p>
                    <p class="text-lime-100/60 text-xs mt-1">A la firma de aceptación para arrancar el proyecto</p>
                </div>
                <div class="glass rounded-xl p-5">
                    <p class="text-lime-300 text-xs font-bold uppercase tracking-widest mb-2">Saldo final · 40%</p>
                    <p class="text-white text-2xl font-extrabold">USD 272 <span class="text-base text-lime-200/70 font-normal">+ IVA</span></p>
                    <p class="text-lime-100/60 text-xs mt-1">Antes de entregar la tienda en vivo</p>
                </div>
            </div>

            <p class="text-center text-lime-200/60 text-xs mt-6">Precio especial por familia · Validez 10 días desde la fecha de esta propuesta</p>
        </div>
    </div>
</section>

<!-- PLAZOS -->
<section class="py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-2">Plazo de entrega</p>
            <h2 class="text-4xl font-extrabold text-white">3 semanas desde el abono inicial</h2>
        </div>

        <div class="space-y-4">
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-slate-900 font-black text-lg">S1</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 1 · Diseño y estructura</h3>
                    <p class="text-lime-100/70 text-sm">Diseño visual aprobado, estructura del sitio armada, panel de administración listo, dominio comprado y configurado.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-slate-900 font-black text-lg">S2</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 2 · Productos y pagos</h3>
                    <p class="text-lime-100/70 text-sm">Carga de los 20 productos iniciales con foto, descripción y precio. Integración de PayPhone y configuración de envíos.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-slate-900 font-black text-lg">S3</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 3 · Medición y entrega</h3>
                    <p class="text-lime-100/70 text-sm">Instalación de la herramienta de medición de Google. Pruebas de compra reales con tarjeta y transferencia. Capacitación al equipo. Entrega de la tienda en vivo.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- POR QUÉ CREATIVE WEB -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-2">Por qué Creative Web</p>
            <h2 class="text-4xl font-extrabold text-white">10+ años haciendo páginas y tiendas online</h2>
            <p class="text-lime-100/70 mt-3 max-w-2xl mx-auto">Clientes activos en Quito, Ibarra, Manta y Otavalo con tiendas y portales en producción.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-lime-400 font-black text-lg">01</span>
                <div><p class="text-white font-semibold mb-1">Soporte directo, no por ticket</p><p class="text-lime-100/70">Cualquier duda se resuelve por WhatsApp con Santiago directo, sin intermediarios.</p></div>
            </div>
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-lime-400 font-black text-lg">02</span>
                <div><p class="text-white font-semibold mb-1">Capacitación al personal</p><p class="text-lime-100/70">2 sesiones presenciales o virtuales para que el equipo de Valencia Sports use la tienda sin depender de nosotros.</p></div>
            </div>
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-lime-400 font-black text-lg">03</span>
                <div><p class="text-white font-semibold mb-1">Tecnología estándar del mercado</p><p class="text-lime-100/70">WordPress + WooCommerce: lo que usa el 40% de las tiendas online del mundo. Hay tutoriales en YouTube por si necesitas hacer algo y no nos encuentras.</p></div>
            </div>
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-lime-400 font-black text-lg">04</span>
                <div><p class="text-white font-semibold mb-1">Soporte por 12 meses sin costo</p><p class="text-lime-100/70">Cualquier ajuste técnico, error o duda durante el primer año entra sin recargo.</p></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="glass-strong rounded-3xl p-10 md:p-14 text-center border-2 border-lime-400/30">
            <p class="text-lime-300 font-bold text-sm uppercase tracking-widest mb-3">Siguiente paso</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">¿Arrancamos esta semana?</h2>
            <p class="text-lime-100/80 text-lg max-w-2xl mx-auto mb-8">
                Con el abono inicial empezamos el diseño en 2 días hábiles. En 3 semanas la tienda de Valencia Sports está en vivo, conectada con las redes y vendiendo.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20queremos%20aprobar%20la%20propuesta%20del%20ecommerce%20de%20Valencia%20Sports" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-slate-900 font-bold text-base hover:opacity-90 transition shadow-2xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
                    Escribirnos por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-10 border-t border-lime-400/10">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-lime-300 text-sm">Propuesta hecha por <strong class="text-white">Creative Web</strong></p>
        <p class="text-lime-200/50 text-xs mt-2">Confidencial · Solo Valencia Sports · Junio 2026 · Validez 10 días</p>
    </div>
</footer>

</body>
</html>
