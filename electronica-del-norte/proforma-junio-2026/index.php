<?php
session_start();
if (empty($_SESSION['auth_electronica_proforma'])) {
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
<title>Propuesta E-commerce — Electrónica del Norte 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Outfit', 'sans-serif'] }, colors: { brand: { 600: '#0284c7', 500: '#0ea5e9', 400: '#38bdf8', 300: '#7dd3fc' } } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #0a0e1a; color: #e2e8f0; }
.brand-grad { background: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(2,132,199,0.08) 0%, rgba(56,189,248,0.04) 100%); }
.glass { background: rgba(15, 35, 55, 0.6); backdrop-filter: blur(20px); border: 1px solid rgba(56, 189, 248, 0.15); }
.glass-strong { background: rgba(20, 45, 70, 0.85); backdrop-filter: blur(20px); border: 1px solid rgba(56, 189, 248, 0.25); }
.text-grad { background: linear-gradient(135deg, #38bdf8 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.bg-grid { background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(56,189,248,0.04) 39px, rgba(56,189,248,0.04) 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(56,189,248,0.04) 39px, rgba(56,189,248,0.04) 40px); }
</style>
</head>
<body class="bg-grid">

<!-- TOP NAV -->
<header class="sticky top-0 z-50 glass-strong border-b border-sky-400/10">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl brand-grad flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-sky-300 uppercase tracking-widest">Creative Web · Propuesta</p>
                <p class="text-white font-semibold text-sm">Electrónica del Norte — Junio 2026</p>
            </div>
        </div>
        <a href="logout.php" class="text-sky-300 hover:text-white text-sm font-semibold">Salir</a>
    </div>
</header>

<!-- HERO -->
<section class="pt-16 pb-20">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-4">Propuesta de tienda online</p>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight text-white">
            Tienda y sistema interno<br>
            <span class="text-grad">trabajando juntos</span>
        </h1>
        <p class="text-sky-100/80 text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed mb-10">
            Una tienda nueva diseñada desde cero y conectada con el GSC System para que el inventario, los pedidos y los usuarios se mantengan sincronizados sin trabajo manual.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">USD 2.350</div>
                <p class="text-sky-200/70 text-xs uppercase tracking-widest mt-1">+ IVA · todo incluido</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">4</div>
                <p class="text-sky-200/70 text-xs uppercase tracking-widest mt-1">semanas de entrega</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">547</div>
                <p class="text-sky-200/70 text-xs uppercase tracking-widest mt-1">productos migrados</p>
            </div>
            <div class="glass rounded-xl px-6 py-4">
                <div class="text-3xl font-black text-grad">12</div>
                <p class="text-sky-200/70 text-xs uppercase tracking-widest mt-1">meses de soporte técnico</p>
            </div>
        </div>

        <a href="#inversion" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver propuesta completa
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- QUÉ INCLUYE -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Lo que recibes</p>
            <h2 class="text-4xl font-extrabold text-white mb-3">Tres piezas trabajando juntas</h2>
            <p class="text-sky-100/70 max-w-2xl mx-auto">Una tienda nueva, conectada al GSC System que ya usa Electrónica del Norte, con pagos y envíos listos para vender desde el día uno.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- 1. Tienda -->
            <div class="glass-strong rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Tienda online nueva</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Diseño nuevo a medida para Electrónica del Norte</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Se ve perfecto en celular, tablet y computadora</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Banner animado para promociones de temporada</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Páginas dedicadas para cada categoría (6 actuales)</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Ficha de producto detallada con especificaciones técnicas</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Carrito de compras y proceso de pago simplificado</span></li>
                </ul>
            </div>

            <!-- 2. GSC System (LO PRINCIPAL) -->
            <div class="glass-strong rounded-2xl p-7 border-2 border-sky-400/40 relative">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full brand-grad text-white text-xs font-black uppercase tracking-widest">Lo principal</span>
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4 mt-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Integración con GSC System</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/90"><strong class="text-white">Artículos</strong> sincronizados desde el GSC a la tienda</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/90"><strong class="text-white">Inventario actualizado en tiempo real:</strong> si se vende en mostrador, baja también en la web</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/90"><strong class="text-white">Pedidos web</strong> entran al GSC como cualquier venta del local</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/90"><strong class="text-white">Usuarios</strong> registrados en la web aparecen en el sistema</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/90">No más diferencias entre lo que el GSC dice que hay y lo que vende la tienda</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/90">Equipo administra todo desde el GSC, la tienda solo refleja</span></li>
                </ul>
            </div>

            <!-- 3. Pagos -->
            <div class="glass-strong rounded-2xl p-7">
                <div class="w-12 h-12 rounded-xl brand-grad flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Pagos y envíos</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80"><strong class="text-white">PayPhone</strong> integrado (tarjeta crédito y débito)</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Transferencia bancaria con comprobante</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Confirmación del pedido por correo al cliente</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Aviso interno del pedido al equipo de ventas</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Costos de envío configurables por ciudad o región</span></li>
                    <li class="flex items-start gap-2"><span class="text-sky-400 font-bold">→</span><span class="text-sky-100/80">Botón "Retiro en local" para clientes de Ibarra y zona norte</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- MIGRACIÓN DE CATÁLOGO -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Sin perder el trabajo hecho</p>
            <h2 class="text-4xl font-extrabold text-white">Migración de los 547 productos actuales</h2>
            <p class="text-sky-100/70 mt-3 max-w-2xl mx-auto">El catálogo que tienen hoy se mueve completo a la tienda nueva. Cuando lancemos, ya está todo arriba.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Qué se migra desde la tienda actual</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1"><strong class="text-white">547 productos</strong> con foto, nombre, precio, descripción y stock</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Las <strong class="text-white">6 categorías</strong> actuales: Accesorios, Audio y Video, Componentes, Energía, Redes, Seguridad</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Marcas registradas (Arduino, SQR, Sunbuck y demás)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Las direcciones web (URLs) actuales se mantienen para no perder lo posicionado en Google</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Cuentas de clientes existentes (sin perder los registros)</span>
                    </li>
                </ul>
            </div>

            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Cómo lo hacemos</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">1</span></div>
                        <span class="text-sky-100/85 pt-1">Descargamos todo el catálogo actual a un archivo de respaldo</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">2</span></div>
                        <span class="text-sky-100/85 pt-1">Construimos la tienda nueva en un servidor de pruebas (sin afectar la tienda actual)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">3</span></div>
                        <span class="text-sky-100/85 pt-1">Conectamos la nueva tienda con el GSC System y probamos sincronización</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">4</span></div>
                        <span class="text-sky-100/85 pt-1">El día del lanzamiento cambiamos del sitio viejo al nuevo en menos de 1 hora</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">5</span></div>
                        <span class="text-sky-100/85 pt-1">Mantenemos respaldo del sitio anterior por si necesitan algo</span>
                    </li>
                </ul>
                <p class="text-xs text-sky-200/60 mt-5 italic">La tienda actual sigue funcionando durante todo el desarrollo. El cambio se hace en el último día.</p>
            </div>
        </div>
    </div>
</section>

<!-- TECNOLOGÍA -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Cómo se administra</p>
            <h2 class="text-4xl font-extrabold text-white">El equipo trabaja desde el GSC, como siempre</h2>
            <p class="text-sky-100/70 mt-3 max-w-2xl mx-auto">La tienda es el espejo del sistema interno. Si un producto se actualiza en el GSC, se actualiza solo en la web.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Desde el GSC System</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">1</span></div>
                        <span class="text-sky-100/85 pt-1">Cargar productos nuevos cuando llega mercadería</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">2</span></div>
                        <span class="text-sky-100/85 pt-1">Cambiar precios y stock disponible</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">3</span></div>
                        <span class="text-sky-100/85 pt-1">Procesar los pedidos que entran por la web igual que las ventas del local</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><span class="text-sky-300 font-black text-sm">4</span></div>
                        <span class="text-sky-100/85 pt-1">Ver datos de los clientes que se registran en la tienda</span>
                    </li>
                </ul>
                <p class="text-xs text-sky-200/60 mt-5 italic">Sin doble carga de datos. Sin discrepancias de inventario.</p>
            </div>

            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Desde la tienda (panel propio)</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Cambiar fotos del banner principal y promociones</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Crear cupones de descuento por temporada</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Editar textos de páginas (Nosotros, Política de envíos, etc.)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-500/15 border border-sky-400/30 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
                        <span class="text-sky-100/85 pt-1">Ver reportes de visitas y productos más vistos</span>
                    </li>
                </ul>
                <p class="text-xs text-sky-200/60 mt-5 italic">Capacitación de 2 sesiones para que el equipo aprenda a usarlo sin depender de nosotros.</p>
            </div>
        </div>
    </div>
</section>

<!-- HOSTING + DOMINIO -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Servidor y dominio</p>
            <h2 class="text-4xl font-extrabold text-white">Hosting profesional y dominio incluidos</h2>
            <p class="text-sky-100/70 mt-3 max-w-2xl mx-auto">El sitio queda alojado en un servidor preparado para soportar el tráfico de un catálogo grande con muchas búsquedas.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Dominio actual conservado</h3>
                <ul class="space-y-2 text-sm text-sky-100/80">
                    <li>· Mantenemos <strong class="text-white">electronicadelnorte.com.ec</strong></li>
                    <li>· Reconfiguración técnica del dominio incluida</li>
                    <li>· Migración sin pérdida de tráfico ni búsquedas posicionadas</li>
                </ul>
            </div>

            <div class="glass rounded-2xl p-7">
                <h3 class="text-white font-bold text-xl mb-4">Hosting Pro (1 año incluido)</h3>
                <ul class="space-y-2 text-sm text-sky-100/80">
                    <li>· Espacio ilimitado en discos SSD rápidos</li>
                    <li>· Ancho de banda ilimitado para alto volumen de visitantes</li>
                    <li>· Certificado SSL gratis (candadito verde)</li>
                    <li>· Cuentas de correo ilimitadas (ventas@, soporte@, etc.)</li>
                    <li>· Velocidad 30 veces más rápida que un hosting común</li>
                    <li>· Servidor disponible las 24 horas, todos los días</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- INVERSIÓN -->
<section id="inversion" class="py-20 bg-gradient-to-b from-transparent via-sky-950/20 to-transparent">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Inversión</p>
            <h2 class="text-4xl font-extrabold text-white">Valor total del proyecto</h2>
            <p class="text-sky-100/70 mt-3">Todo incluido: desarrollo, migración, integración GSC y hosting el primer año.</p>
        </div>

        <div class="glass-strong rounded-3xl p-10 border-2 border-sky-400/30">
            <!-- Items -->
            <div class="space-y-5 mb-8">
                <div class="flex items-start justify-between gap-6 pb-5 border-b border-sky-400/15">
                    <div>
                        <h4 class="text-white font-bold text-lg mb-1">Desarrollo de tienda online + integración GSC System</h4>
                        <p class="text-sky-100/60 text-sm">Diseño nuevo a medida, migración de 547 productos, integración bidireccional con GSC (artículos, inventario, pedidos, usuarios). Capacitación incluida.</p>
                    </div>
                    <div class="text-right whitespace-nowrap">
                        <p class="text-white font-bold text-xl">USD 2.230</p>
                    </div>
                </div>
                <div class="flex items-start justify-between gap-6 pb-5 border-b border-sky-400/15">
                    <div>
                        <h4 class="text-white font-bold text-lg mb-1">Hosting Pro Ilimitado (1 año)</h4>
                        <p class="text-sky-100/60 text-sm">Servidor profesional + SSL + correos corporativos + soporte técnico. Renovación anual desde el segundo año.</p>
                    </div>
                    <div class="text-right whitespace-nowrap">
                        <p class="text-white font-bold text-xl">USD 120</p>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="pt-3 border-t border-sky-400/20">
                <div class="flex justify-between items-baseline">
                    <span class="text-white font-bold text-xl">Total del proyecto</span>
                    <div class="text-right">
                        <span class="text-grad font-black text-4xl md:text-5xl">USD 2.350</span>
                        <span class="text-sky-200/80 font-bold text-lg ml-2">+ IVA</span>
                    </div>
                </div>
            </div>

            <!-- Forma de pago -->
            <div class="mt-8 grid md:grid-cols-2 gap-4 text-sm">
                <div class="glass rounded-xl p-5">
                    <p class="text-sky-300 text-xs font-bold uppercase tracking-widest mb-2">Abono inicial · 60%</p>
                    <p class="text-white text-2xl font-extrabold">USD 1.410 <span class="text-base text-sky-200/70 font-normal">+ IVA</span></p>
                    <p class="text-sky-100/60 text-xs mt-1">A la firma de aceptación para arrancar el proyecto</p>
                </div>
                <div class="glass rounded-xl p-5">
                    <p class="text-sky-300 text-xs font-bold uppercase tracking-widest mb-2">Saldo final · 40%</p>
                    <p class="text-white text-2xl font-extrabold">USD 940 <span class="text-base text-sky-200/70 font-normal">+ IVA</span></p>
                    <p class="text-sky-100/60 text-xs mt-1">Antes de entregar la tienda en vivo</p>
                </div>
            </div>

            <p class="text-center text-sky-200/60 text-xs mt-6">Soporte técnico incluido por 12 meses · Validez 10 días desde la fecha de esta propuesta</p>
        </div>
    </div>
</section>

<!-- PLAZOS -->
<section class="py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Plazo de entrega</p>
            <h2 class="text-4xl font-extrabold text-white">4 semanas desde el abono inicial</h2>
        </div>

        <div class="space-y-4">
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black text-lg">S1</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 1 · Diseño y estructura</h3>
                    <p class="text-sky-100/70 text-sm">Aprobación del diseño visual, estructura del sitio, panel de administración listo. Servidor de pruebas montado para no afectar la tienda actual.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black text-lg">S2</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 2 · Migración del catálogo</h3>
                    <p class="text-sky-100/70 text-sm">Importación de los 547 productos con fotos, categorías, marcas y URLs originales. Revisión de cada categoría.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black text-lg">S3</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 3 · Integración con GSC System</h3>
                    <p class="text-sky-100/70 text-sm">Conexión bidireccional con el GSC: artículos, inventario, pedidos y usuarios sincronizados. Pruebas reales con productos de muestra.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black text-lg">S4</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Semana 4 · Pruebas, capacitación y entrega</h3>
                    <p class="text-sky-100/70 text-sm">Pruebas de compra reales con PayPhone y transferencia. Capacitación al equipo de Electrónica del Norte. Lanzamiento del sitio nuevo en producción.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- POR QUÉ CREATIVE WEB -->
<section class="py-16 bg-gradient-to-b from-transparent via-slate-900/30 to-transparent">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-2">Por qué Creative Web</p>
            <h2 class="text-4xl font-extrabold text-white">10+ años desarrollando tiendas online en Ecuador</h2>
            <p class="text-sky-100/70 mt-3 max-w-2xl mx-auto">Experiencia comprobable con integraciones a sistemas internos de gestión.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-sky-400 font-black text-lg">01</span>
                <div><p class="text-white font-semibold mb-1">Soporte directo, no por ticket</p><p class="text-sky-100/70">Cualquier duda se resuelve por WhatsApp con Santiago directo, sin intermediarios.</p></div>
            </div>
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-sky-400 font-black text-lg">02</span>
                <div><p class="text-white font-semibold mb-1">Capacitación al equipo</p><p class="text-sky-100/70">2 sesiones presenciales o virtuales para que el personal use el panel sin depender de nosotros.</p></div>
            </div>
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-sky-400 font-black text-lg">03</span>
                <div><p class="text-white font-semibold mb-1">Experiencia en integraciones con sistemas internos</p><p class="text-sky-100/70">Hemos integrado tiendas con sistemas de inventario y facturación. El GSC entra en esa categoría.</p></div>
            </div>
            <div class="flex items-start gap-3 glass rounded-xl p-4">
                <span class="text-sky-400 font-black text-lg">04</span>
                <div><p class="text-white font-semibold mb-1">Soporte por 12 meses sin costo</p><p class="text-sky-100/70">Cualquier ajuste técnico, error o duda durante el primer año entra sin recargo.</p></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="glass-strong rounded-3xl p-10 md:p-14 text-center border-2 border-sky-400/30">
            <p class="text-sky-300 font-bold text-sm uppercase tracking-widest mb-3">Siguiente paso</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5">¿Arrancamos esta semana?</h2>
            <p class="text-sky-100/80 text-lg max-w-2xl mx-auto mb-8">
                Con el abono inicial empezamos el diseño en 2 días hábiles. En 4 semanas la tienda nueva de Electrónica del Norte está en vivo, integrada al GSC System y vendiendo.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20queremos%20aprobar%20la%20propuesta%20del%20ecommerce%20de%20Electr%C3%B3nica%20del%20Norte" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
                    Escribirnos por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-10 border-t border-sky-400/10">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-sky-300 text-sm">Propuesta hecha por <strong class="text-white">Creative Web</strong></p>
        <p class="text-sky-200/50 text-xs mt-2">Confidencial · Solo Electrónica del Norte · Junio 2026 · Validez 10 días</p>
    </div>
</footer>

</body>
</html>
