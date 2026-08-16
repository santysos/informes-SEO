<?php
session_start();
if (empty($_SESSION['auth_quimera_b2b'])) {
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
<title>Ventas por Mayor B2B &mdash; Quimera Clothing</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #0a1c19; color: #e6f0ed; }
.mono { font-family: 'JetBrains Mono', monospace; }
.brand-grad { background: linear-gradient(135deg, #5DA08C 0%, #87CDB9 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(98,171,157,.13) 0%, rgba(135,205,185,.03) 100%); }
.glass { background: rgba(16, 42, 37, .55); backdrop-filter: blur(20px); border: 1px solid rgba(98,171,157,.16); }
.glass-strong { background: rgba(12, 34, 30, .88); backdrop-filter: blur(20px); border: 1px solid rgba(98,171,157,.26); }
.text-grad { background: linear-gradient(135deg, #87CDB9 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
html { scroll-behavior: smooth; scroll-padding-top: 88px; }
@media print {
    body { background: #fff; color: #123a33; }
    .no-print, header nav { display: none !important; }
    .glass, .glass-strong { background: #f6faf9 !important; border: 1px solid #dbe6e3 !important; backdrop-filter: none !important; }
    .text-grad { -webkit-text-fill-color: #2f7d6b !important; }
    section { page-break-inside: avoid; }
}
</style>
</head>
<body>

<!-- MENU -->
<header class="no-print sticky top-0 z-50 glass-strong border-b border-[#62ab9d]/10">
    <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl brand-grad flex items-center justify-center">
                <svg class="w-5 h-5 text-[#0a1c19]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-[#87CDB9] uppercase tracking-widest">Creative Web &middot; Propuesta</p>
                <p class="text-white font-semibold text-xs">Quimera Clothing &middot; Agosto 2026</p>
            </div>
        </div>
        <div class="flex items-center gap-5">
            <a href="#alcance" class="hidden md:inline text-slate-300 hover:text-white text-sm font-semibold">Alcance</a>
            <a href="#inversion" class="hidden md:inline text-slate-300 hover:text-white text-sm font-semibold">Inversión</a>
            <a href="logout.php" class="text-[#87CDB9] hover:text-white text-sm font-semibold">Salir</a>
        </div>
    </div>
</header>

<!-- PORTADA -->
<section class="pt-16 pb-12">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-[#87CDB9] font-bold text-sm uppercase tracking-widest mb-4">Propuesta de desarrollo &middot; Agosto 2026</p>
        <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight text-white">
            Vender al por mayor<br><span class="text-grad">sin atender por WhatsApp</span>
        </h1>
        <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10">
            La tienda ya vende al consumidor final. Esta propuesta agrega el canal mayorista completo:
            la clienta que compra 24 camisetas se registra, entra y ve sus propios precios &mdash; sin que
            nadie de Quimera tenga que pasarle una lista por chat ni calcular descuentos a mano.
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12 max-w-3xl mx-auto">
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">3</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">funciones<br>nuevas</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">24</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">unidades<br>pedido mínimo</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">2</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">semanas<br>de entrega</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">149</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">productos<br>ya en la tienda</p>
            </div>
        </div>
        <a href="#inversion" class="no-print inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-[#0a1c19] font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver la inversión
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- LO QUE YA EXISTE -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="glass rounded-2xl p-8 md:p-10">
            <p class="text-[#87CDB9] font-bold text-xs uppercase tracking-widest mb-3">Punto de partida</p>
            <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-4">Lo que ya construimos juntos</h2>
            <p class="text-slate-400 text-sm leading-relaxed max-w-3xl mb-8">
                Esta propuesta no arranca de cero: se monta sobre la tienda que ya está funcionando.
                Eso reduce el tiempo y evita tocar lo que hoy ya vende.
            </p>
            <div class="grid md:grid-cols-4 gap-4">
                <div class="rounded-xl p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white font-semibold text-sm mb-1">Tienda WooCommerce</p>
                    <p class="text-slate-400 text-xs leading-relaxed">149 productos activos con atributos de Color y Talla ya configurados.</p>
                </div>
                <div class="rounded-xl p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white font-semibold text-sm mb-1">Probador Virtual con IA</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Desarrollo propio, funcionando en las fichas de producto.</p>
                </div>
                <div class="rounded-xl p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white font-semibold text-sm mb-1">Cumplimiento LOPDP</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Plugin de protección de datos del Ecuador instalado y activo.</p>
                </div>
                <div class="rounded-xl p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white font-semibold text-sm mb-1">Pedidos y seguimiento</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Desarrollo propio de gestión de pedidos con tracking para la clienta.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ALCANCE -->
<section class="py-14" id="alcance">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-[#87CDB9] font-bold text-sm uppercase tracking-widest mb-2">Alcance del trabajo</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Qué se va a construir</h2>
        </div>

        <!-- FUNCIONALIDAD 1 -->
        <div class="glass rounded-2xl p-8 mb-6">
            <div class="flex flex-wrap items-start justify-between gap-6 mb-6">
                <div class="flex items-start gap-5">
                    <div class="w-12 h-12 rounded-xl brand-grad-soft border border-[#62ab9d]/25 flex items-center justify-center flex-shrink-0">
                        <span class="mono font-bold text-[#87CDB9]">01</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xl mb-2">Canal mayorista B2B</h3>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-2xl">
                            Dos tiendas dentro de la misma web. La clienta normal sigue viendo todo igual que hoy;
                            la mayorista se registra, entra con su cuenta y ve <span class="text-white font-semibold">sus
                            propios precios</span> en cada producto, en el carrito y al momento de pagar.
                        </p>
                    </div>
                </div>
                <div class="mono text-[#87CDB9] font-bold text-lg whitespace-nowrap">$220</div>
            </div>
            <div class="grid md:grid-cols-2 gap-4 mb-5">
                <div class="rounded-lg p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white text-sm font-semibold mb-2">Formulario de registro mayorista</p>
                    <p class="text-slate-400 text-xs leading-relaxed mb-3">
                        Página propia donde la empresa se registra con razón social, RUC, teléfono y ciudad.
                        Al terminar el registro <span class="text-white">ya entra viendo precios de mayor</span>,
                        sin esperar aprobación.
                    </p>
                    <p class="text-slate-500 text-[11px] leading-relaxed">
                        Los datos quedan guardados en la ficha del cliente y se pueden exportar a Excel cuando quieran.
                    </p>
                </div>
                <div class="rounded-lg p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white text-sm font-semibold mb-2">Precios que cambian según quién mira</p>
                    <p class="text-slate-400 text-xs leading-relaxed mb-3">
                        El mismo producto muestra $24,90 a una clienta normal y el precio mayorista a una empresa
                        registrada. Se aplica en la ficha, en el listado, en el carrito y en el correo de confirmación.
                    </p>
                    <p class="text-slate-500 text-[11px] leading-relaxed">
                        Se implementa con B2BKing, la herramienta estándar del mercado para manejar precios
                        diferenciados en WooCommerce.
                    </p>
                </div>
            </div>
            <div class="rounded-lg p-4 bg-[#62ab9d]/8 border border-[#62ab9d]/20">
                <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">La tienda actual no se toca</p>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Quien compra al detalle sigue viendo exactamente lo mismo de hoy: mismos precios, mismo
                    carrito, mismo proceso de pago. El canal mayorista se monta encima, sin alterar nada de
                    lo que ya funciona.
                </p>
            </div>
        </div>

        <!-- FUNCIONALIDAD 2 -->
        <div class="glass rounded-2xl p-8 mb-6">
            <div class="flex flex-wrap items-start justify-between gap-6 mb-6">
                <div class="flex items-start gap-5">
                    <div class="w-12 h-12 rounded-xl brand-grad-soft border border-[#62ab9d]/25 flex items-center justify-center flex-shrink-0">
                        <span class="mono font-bold text-[#87CDB9]">02</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xl mb-2">Descuentos por cantidad con aviso en vivo</h3>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-2xl">
                            El corazón del sistema. Mientras la mayorista arma su pedido ve el precio normal, y un
                            aviso le dice cuántas unidades le faltan para el descuento. Al llegar a 24 el carrito se
                            recalcula solo.
                        </p>
                    </div>
                </div>
                <div class="mono text-[#87CDB9] font-bold text-lg whitespace-nowrap">$145</div>
            </div>

            <div class="grid md:grid-cols-2 gap-5 mb-5">
                <div>
                    <p class="text-white text-sm font-semibold mb-3">La regla que vamos a programar</p>
                    <div class="rounded-lg overflow-hidden border border-[#62ab9d]/15">
                        <table class="w-full text-sm">
                            <tr class="bg-black/30">
                                <td class="px-4 py-3 text-slate-400 text-xs uppercase tracking-wider">Mínimo del pedido</td>
                                <td class="px-4 py-3 text-white font-semibold text-right">24 unidades</td>
                            </tr>
                            <tr class="bg-black/20 border-t border-[#62ab9d]/10">
                                <td class="px-4 py-3 text-slate-400 text-xs uppercase tracking-wider">Se cuentan</td>
                                <td class="px-4 py-3 text-white font-semibold text-right">Mezclando tallas, colores y modelos</td>
                            </tr>
                            <tr class="bg-black/30 border-t border-[#62ab9d]/10">
                                <td class="px-4 py-3 text-slate-400 text-xs uppercase tracking-wider">Camisetas estampadas</td>
                                <td class="px-4 py-3 text-[#87CDB9] font-bold text-right">&minus;35%</td>
                            </tr>
                            <tr class="bg-black/20 border-t border-[#62ab9d]/10">
                                <td class="px-4 py-3 text-slate-400 text-xs uppercase tracking-wider">Camisetas llanas</td>
                                <td class="px-4 py-3 text-[#87CDB9] font-bold text-right">&minus;40%</td>
                            </tr>
                        </table>
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed mt-3">
                        Las 24 unidades suman entre todo: si lleva 8 estampadas y 16 llanas, ya cumple el mínimo y
                        cada producto recibe su propio porcentaje.
                    </p>
                </div>

                <div>
                    <p class="text-white text-sm font-semibold mb-3">Cómo lo ve la clienta en pantalla</p>
                    <div class="rounded-lg bg-black/35 border border-[#62ab9d]/15 p-5 space-y-3">
                        <div class="flex items-center justify-between gap-3 pb-3 border-b border-[#62ab9d]/10">
                            <span class="text-slate-300 text-sm">Camiseta Rosa &middot; Talla M</span>
                            <span class="mono text-white text-sm">$24,90</span>
                        </div>
                        <div class="flex items-center justify-between gap-3 pb-3 border-b border-[#62ab9d]/10">
                            <span class="text-slate-300 text-sm">Camiseta Negra &middot; Talla L</span>
                            <span class="mono text-white text-sm">$24,90</span>
                        </div>
                        <div class="rounded-md bg-amber-500/12 border border-amber-500/30 px-4 py-3">
                            <p class="text-amber-200 text-xs font-semibold leading-relaxed">
                                Llevas 18 unidades &mdash; te faltan 6 para tu precio de mayorista
                            </p>
                        </div>
                        <div class="rounded-md bg-[#62ab9d]/15 border border-[#62ab9d]/35 px-4 py-3">
                            <p class="text-[#87CDB9] text-xs font-bold leading-relaxed">
                                ¡Precio de mayorista aplicado! Ahorras $187,20 en este pedido
                            </p>
                        </div>
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed mt-3">
                        El aviso se actualiza al instante cada vez que agrega o quita una prenda, sin recargar la página.
                    </p>
                </div>
            </div>

            <div class="rounded-lg p-4 bg-black/25 border border-[#62ab9d]/12">
                <p class="text-white text-sm font-semibold mb-1">Antes hay que clasificar las camisetas</p>
                <p class="text-slate-400 text-xs leading-relaxed">
                    Para que el sistema sepa a qué prenda le toca 35% y a cuál 40%, cada camiseta debe quedar
                    marcada como estampada o llana. Creamos la clasificación y marcamos las 47 camisetas actuales;
                    de ahí en adelante se elige al crear cada producto nuevo, con un clic.
                </p>
            </div>
        </div>

        <!-- FUNCIONALIDAD 3 -->
        <div class="glass rounded-2xl p-8">
            <div class="flex flex-wrap items-start justify-between gap-6 mb-6">
                <div class="flex items-start gap-5">
                    <div class="w-12 h-12 rounded-xl brand-grad-soft border border-[#62ab9d]/25 flex items-center justify-center flex-shrink-0">
                        <span class="mono font-bold text-[#87CDB9]">03</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xl mb-2">Envíos del canal mayorista</h3>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-2xl">
                            Reglas de envío propias para el pedido al por mayor, distintas de las que aplican
                            hoy en las compras al detalle.
                        </p>
                    </div>
                </div>
                <div class="mono text-[#87CDB9] font-bold text-lg whitespace-nowrap">$80</div>
            </div>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="rounded-lg p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white text-sm font-semibold mb-2">Laar Courier</p>
                    <p class="mono text-[#87CDB9] text-lg font-bold mb-2">Gratis</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Para todo pedido mayorista que cumpla las 24 unidades.</p>
                </div>
                <div class="rounded-lg p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white text-sm font-semibold mb-2">Servientrega</p>
                    <p class="mono text-[#87CDB9] text-lg font-bold mb-2">$5</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Alternativa con costo fijo, si la clienta prefiere esa transportadora.</p>
                </div>
                <div class="rounded-lg p-5 bg-black/25 border border-[#62ab9d]/12">
                    <p class="text-white text-sm font-semibold mb-2">Al detalle</p>
                    <p class="mono text-[#87CDB9] text-lg font-bold mb-2">Sin cambios</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Las compras normales conservan las mismas reglas de envío que tienen hoy.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FLUJO -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#87CDB9] font-bold text-sm uppercase tracking-widest mb-2">De principio a fin</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Cómo compra una mayorista</h2>
        </div>
        <div class="grid md:grid-cols-5 gap-4">
            <div class="glass rounded-xl p-5">
                <div class="mono text-[#87CDB9] text-xs font-bold mb-3">PASO 1</div>
                <p class="text-white font-semibold text-sm mb-2">Se registra</p>
                <p class="text-slate-400 text-xs leading-relaxed">Llena el formulario con RUC y datos de su negocio.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <div class="mono text-[#87CDB9] text-xs font-bold mb-3">PASO 2</div>
                <p class="text-white font-semibold text-sm mb-2">Entra y ve sus precios</p>
                <p class="text-slate-400 text-xs leading-relaxed">Desde el primer momento, sin esperar autorización.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <div class="mono text-[#87CDB9] text-xs font-bold mb-3">PASO 3</div>
                <p class="text-white font-semibold text-sm mb-2">Arma su pedido</p>
                <p class="text-slate-400 text-xs leading-relaxed">Mezcla tallas y colores mientras el aviso le dice cuánto le falta.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <div class="mono text-[#87CDB9] text-xs font-bold mb-3">PASO 4</div>
                <p class="text-white font-semibold text-sm mb-2">Llega a 24</p>
                <p class="text-slate-400 text-xs leading-relaxed">El carrito recalcula y aplica 35% o 40% según cada prenda.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <div class="mono text-[#87CDB9] text-xs font-bold mb-3">PASO 5</div>
                <p class="text-white font-semibold text-sm mb-2">Paga y recibe</p>
                <p class="text-slate-400 text-xs leading-relaxed">Con Payphone y envío gratis por Laar. El pedido entra al mismo panel de siempre.</p>
            </div>
        </div>
    </div>
</section>

<!-- PROCESO INTERNO -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="glass-strong rounded-2xl p-8 md:p-10">
            <div class="grid lg:grid-cols-2 gap-10 items-start">
                <div>
                    <p class="text-[#87CDB9] font-bold text-xs uppercase tracking-widest mb-3">Lo más importante</p>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-4">
                        Para ustedes el trabajo diario no cambia en nada
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        Un pedido mayorista llega exactamente por donde llegan hoy los pedidos de la tienda:
                        al mismo listado de WooCommerce, con la misma pantalla, los mismos estados y el mismo
                        correo de aviso. No hay un segundo panel que aprender ni un sistema aparte que revisar.
                    </p>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        La única diferencia visible es una etiqueta que dice <span class="text-white font-semibold">Mayorista</span>
                        junto al número de pedido, para que quien prepara el paquete sepa de una que va con
                        24 prendas o más. De ahí en adelante &mdash; preparar, despachar, marcar como enviado,
                        dar seguimiento &mdash; es el proceso que ya manejan.
                    </p>
                </div>

                <div>
                    <p class="text-white text-sm font-semibold mb-4">El pedido, como lo van a ver</p>
                    <div class="rounded-xl bg-black/35 border border-[#62ab9d]/15 overflow-hidden">
                        <div class="px-5 py-3 border-b border-[#62ab9d]/12 flex items-center justify-between gap-3">
                            <span class="mono text-slate-400 text-xs uppercase tracking-wider">Pedidos</span>
                            <span class="mono text-slate-500 text-[11px]">WooCommerce</span>
                        </div>
                        <div class="px-5 py-4 border-b border-[#62ab9d]/10 flex items-center justify-between gap-3">
                            <div>
                                <p class="text-white text-sm font-semibold">#4821 &middot; María Torres</p>
                                <p class="text-slate-500 text-xs mt-1">3 prendas</p>
                            </div>
                            <span class="mono text-white text-sm">$74,70</span>
                        </div>
                        <div class="px-5 py-4 border-b border-[#62ab9d]/10 flex items-center justify-between gap-3 bg-[#62ab9d]/8">
                            <div>
                                <p class="text-white text-sm font-semibold">
                                    #4822 &middot; Boutique Anahí
                                    <span class="ml-2 inline-block align-middle text-[10px] font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-[#62ab9d] text-[#0a1c19]">Mayorista</span>
                                </p>
                                <p class="text-slate-400 text-xs mt-1">28 prendas &middot; envío Laar</p>
                            </div>
                            <span class="mono text-white text-sm">$438,20</span>
                        </div>
                        <div class="px-5 py-4 flex items-center justify-between gap-3">
                            <div>
                                <p class="text-white text-sm font-semibold">#4823 &middot; Carla Benítez</p>
                                <p class="text-slate-500 text-xs mt-1">1 prenda</p>
                            </div>
                            <span class="mono text-white text-sm">$24,90</span>
                        </div>
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed mt-3">
                        Mismo listado, mismos botones. La etiqueta verde es lo único que se agrega.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INVERSION -->
<section class="py-14" id="inversion">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#87CDB9] font-bold text-sm uppercase tracking-widest mb-2">Inversión</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Cuánto cuesta</h2>
        </div>

        <div class="grid lg:grid-cols-2 gap-6 mb-6">
            <div class="glass-strong rounded-2xl p-7">
                <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">Desarrollo completo</p>
                <p class="text-white font-bold text-lg mb-5">Todo el trabajo descrito</p>

                <div class="space-y-3 mb-6">
                    <div class="flex items-baseline justify-between gap-3 pb-3 border-b border-[#62ab9d]/12">
                        <span class="text-slate-300 text-sm">01 &middot; Canal mayorista B2B</span>
                        <span class="mono text-white font-semibold whitespace-nowrap">$220</span>
                    </div>
                    <div class="flex items-baseline justify-between gap-3 pb-3 border-b border-[#62ab9d]/12">
                        <span class="text-slate-300 text-sm">02 &middot; Descuentos por cantidad con aviso</span>
                        <span class="mono text-white font-semibold whitespace-nowrap">$145</span>
                    </div>
                    <div class="flex items-baseline justify-between gap-3 pb-3 border-b border-[#62ab9d]/12">
                        <span class="text-slate-300 text-sm">03 &middot; Envíos del canal mayorista</span>
                        <span class="mono text-white font-semibold whitespace-nowrap">$80</span>
                    </div>
                    <div class="flex items-baseline justify-between gap-3">
                        <span class="text-slate-300 text-sm">Pruebas y capacitación</span>
                        <span class="mono text-white font-semibold whitespace-nowrap">$50</span>
                    </div>
                </div>

                <div class="flex items-baseline flex-wrap gap-3 mb-3">
                    <span class="text-5xl font-black text-grad">$495</span>
                    <span class="text-slate-400 font-semibold">+ IVA</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded bg-[#62ab9d] text-[#0a1c19] whitespace-nowrap">Precio de cliente</span>
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">
                    <span class="text-white font-semibold">Tarifa preferencial por ser cliente de casa.</span>
                    Cotizado sobre la tienda que ya conocemos por dentro: eso ahorra horas de
                    diagnóstico que en un proyecto desde cero sí se cobran.
                </p>

            </div>

            <div class="glass rounded-2xl p-7">
                <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">Tiempos</p>
                <p class="text-white font-bold text-lg mb-5">Dos semanas de trabajo</p>

                <div class="space-y-4 mb-6">
                    <div class="flex gap-4">
                        <div class="mono text-[#87CDB9] text-xs font-bold pt-1 w-20 flex-shrink-0">SEMANA 1</div>
                        <div>
                            <p class="text-white text-sm font-semibold mb-1">Estructura del canal mayorista</p>
                            <p class="text-slate-400 text-xs leading-relaxed">
                                Instalación y configuración de B2BKing, formulario de registro, listas de precios
                                y clasificación de las 47 camisetas entre estampadas y llanas.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="mono text-[#87CDB9] text-xs font-bold pt-1 w-20 flex-shrink-0">SEMANA 2</div>
                        <div>
                            <p class="text-white text-sm font-semibold mb-1">Reglas, avisos y pruebas</p>
                            <p class="text-slate-400 text-xs leading-relaxed">
                                Descuentos por cantidad, contador en vivo del carrito, reglas de envío y pruebas con
                                pedidos reales de punta a punta.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg p-4 bg-black/25 border border-[#62ab9d]/12 mb-4">
                    <p class="text-white text-sm font-semibold mb-1">Se trabaja sin bajar la tienda</p>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Todo se configura y prueba sin interrumpir las ventas actuales. La clienta que compra al
                        detalle no nota ningún cambio mientras tanto.
                    </p>
                </div>

                <div class="rounded-lg p-4 bg-[#62ab9d]/8 border border-[#62ab9d]/20">
                    <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">Incluye capacitación</p>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Una sesión para mostrarles cómo dar de baja un mayorista, cambiar los porcentajes de
                        descuento y ajustar el mínimo de unidades &mdash; sin depender de nosotros.
                    </p>
                </div>
            </div>
        </div>

        <div class="glass rounded-2xl p-6">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">Soporte incluido</p>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        30 días desde la entrega para corregir cualquier ajuste o comportamiento inesperado
                        de lo desarrollado, sin costo.
                    </p>
                </div>
                <div>
                    <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">Sin mensualidad</p>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Es un desarrollo de una sola vez: no agrega ningún cobro recurrente al hosting ni al
                        mantenimiento que ya tienen.
                    </p>
                </div>
                <div>
                    <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-2">Escalable</p>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Si mañana quieren un segundo nivel de mayorista o extender el descuento a pantalones
                        y buzos, la estructura ya queda lista para eso.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUE NECESITAMOS -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#87CDB9] font-bold text-sm uppercase tracking-widest mb-2">Para arrancar</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Lo que necesitamos de ustedes</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div class="glass rounded-2xl p-6">
                <p class="text-white font-semibold mb-2">Qué camisetas son estampadas y cuáles llanas</p>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Basta un listado o que nos marquen en una llamada cuáles de las 47 camisetas actuales van
                    en cada grupo. Nosotros hacemos la carga.
                </p>
            </div>
            <div class="glass rounded-2xl p-6">
                <p class="text-white font-semibold mb-2">Quién administra los mayoristas</p>
                <p class="text-slate-400 text-sm leading-relaxed">
                    La persona del equipo que va a revisar los registros y atender el canal, para dejarle
                    los accesos y darle la capacitación.
                </p>
            </div>
            <div class="glass rounded-2xl p-6">
                <p class="text-white font-semibold mb-2">Confirmación de los porcentajes</p>
                <p class="text-slate-400 text-sm leading-relaxed">
                    35% estampadas y 40% llanas sobre el precio de venta al público, desde 24 unidades.
                    Si cambia algo, mejor saberlo antes de programarlo.
                </p>
            </div>
            <div class="glass rounded-2xl p-6">
                <p class="text-white font-semibold mb-2">Datos de la cuenta con Laar Courier</p>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Para dejar bien configurada la regla de envío gratis y las ciudades a las que llega
                    esa transportadora.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CONDICIONES -->
<section class="pb-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="glass rounded-2xl p-7">
            <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-5">Condiciones</p>
            <div class="grid md:grid-cols-2 gap-x-10 gap-y-5">
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Validez de la propuesta</p>
                    <p class="text-slate-400 text-sm">30 días desde la fecha de entrega.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Impuestos</p>
                    <p class="text-slate-400 text-sm">El valor indicado es antes de IVA.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Entrega</p>
                    <p class="text-slate-400 text-sm">2 semanas desde la confirmación y la entrega de la clasificación de productos.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Alcance</p>
                    <p class="text-slate-400 text-sm">Cubre las tres funcionalidades descritas. Funciones nuevas se cotizan aparte y por escrito.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Proceso interno</p>
                    <p class="text-slate-400 text-sm">Los pedidos mayoristas se gestionan en el mismo panel y con el mismo flujo actual.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Respaldo</p>
                    <p class="text-slate-400 text-sm">Se hace copia completa del sitio antes de tocar nada.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="pb-20">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">¿Arrancamos?</h2>
        <p class="text-slate-400 text-lg mb-8 leading-relaxed">
            Cualquier duda sobre el alcance o los tiempos, escríbeme y la resolvemos.
        </p>
        <a href="https://wa.me/593999174980?text=Hola%20Santi%2C%20revis%C3%A9%20la%20propuesta%20de%20ventas%20por%20mayor%20de%20Quimera"
           class="no-print inline-flex items-center gap-3 px-8 py-4 rounded-xl brand-grad text-[#0a1c19] font-bold hover:opacity-90 transition shadow-2xl">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 00-8.6 15l-1.3 4.7 4.8-1.3A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.8.8.8-2.8-.2-.3A8 8 0 1112 20z"/></svg>
            Escribir por WhatsApp
        </a>
        <p class="text-slate-500 text-sm mt-6 mono">+593 99 917 4980 &middot; Creative Web</p>
    </div>
</section>

</body>
</html>
