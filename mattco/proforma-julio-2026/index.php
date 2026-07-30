<?php
session_start();
if (empty($_SESSION['auth_mattco_proforma'])) {
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
<title>Sistema de control de combustible, peajes y viajes &mdash; Mattco 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Outfit', 'sans-serif'], mono: ['JetBrains Mono', 'monospace'] }, colors: { brand: { 700: '#9e0f18', 600: '#c4141f', 500: '#e8232e', 400: '#ff4f58', 300: '#ff8f95' } } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #111113; color: #ececee; }
.mono { font-family: 'JetBrains Mono', monospace; }
.brand-grad { background: linear-gradient(135deg, #b8121c 0%, #ff4f58 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(232,35,46,0.12) 0%, rgba(255,79,88,0.03) 100%); }
.glass { background: rgba(31, 31, 35, 0.55); backdrop-filter: blur(20px); border: 1px solid rgba(232, 35, 46, 0.14); }
.glass-strong { background: rgba(24, 24, 27, 0.88); backdrop-filter: blur(20px); border: 1px solid rgba(232, 35, 46, 0.22); }
.glass-neutral { background: rgba(38, 38, 42, 0.5); border: 1px solid rgba(255,255,255,0.07); }
.text-grad { background: linear-gradient(135deg, #ff4f58 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.bg-grid { background-image: repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(232,35,46,0.035) 39px, rgba(232,35,46,0.035) 40px), repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(232,35,46,0.035) 39px, rgba(232,35,46,0.035) 40px); }
html { scroll-behavior: smooth; scroll-padding-top: 90px; }
@media print {
    body { background: white; color: #18181b; }
    .no-print, header nav, .bg-grid { display: none !important; }
    .glass, .glass-strong, .glass-neutral { background: #fafafa !important; border: 1px solid #ddd !important; backdrop-filter: none !important; }
    .text-grad { -webkit-text-fill-color: #c4141f !important; }
    section { page-break-inside: avoid; }
    a[href^="#"] { text-decoration: none; }
}
</style>
</head>
<body class="bg-grid">

<!-- TOP NAV -->
<header class="no-print sticky top-0 z-50 glass-strong border-b border-red-500/10">
    <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <img src="assets/logo-mattco.png" alt="Mattco" class="h-8">
            <div class="hidden sm:block border-l border-white/10 pl-3">
                <p class="text-[10px] font-bold text-red-400 uppercase tracking-widest">Creative Web &middot; Propuesta</p>
                <p class="text-white font-semibold text-xs">Julio 2026</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="#inversion" class="hidden md:inline text-neutral-300 hover:text-white text-sm font-semibold">Inversión</a>
            <a href="#modulos" class="hidden md:inline text-neutral-300 hover:text-white text-sm font-semibold">Módulos</a>
            <a href="logout.php" class="text-red-400 hover:text-white text-sm font-semibold">Salir</a>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="pt-16 pb-14">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-4">Sistema web a medida &middot; Mattco</p>
        <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight text-white">
            Cada galón de diesel,<br>
            <span class="text-grad">con nombre y apellido</span>
        </h1>
        <p class="text-neutral-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10">
            Hoy el combustible se controla con recibos de papel que llegan tarde, incompletos y sin manera de comprobarlos. Este sistema convierte cada tanqueada en un registro verificable: el chofer toma una foto del ticket, la inteligencia artificial lee todos los datos, y el sistema avisa solo cuando algo no cuadra.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">3</div>
                <p class="text-neutral-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">módulos<br>integrados</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">0</div>
                <p class="text-neutral-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">datos que teclea<br>el chofer</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">8</div>
                <p class="text-neutral-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">alertas<br>automáticas</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">1 foto</div>
                <p class="text-neutral-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">es todo lo que<br>hace el chofer</p>
            </div>
        </div>

        <a href="#inversion" class="no-print inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver la inversión
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- EL PROBLEMA -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">Punto de partida</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Lo que hoy no se puede comprobar</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-red-500/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">El recibo se pierde o llega tarde</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">La volqueta baja de la mina, tanquea, recibe su ticket de papel &mdash; y ese papel viaja en el bolsillo del chofer hasta que alguien lo pida. Para cuando llega a oficina, ya nadie recuerda a qué máquina ni a qué proyecto correspondía.</p>
            </div>

            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-red-500/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M5 19h14a2 2 0 001.84-2.75L13.74 4a2 2 0 00-3.48 0L3.16 16.25A2 2 0 005 19z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">El sobrante del tanquero es una caja negra</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">El tanquero llena 110 galones y reparte a las máquinas. Lo que sobra no se mide con nada. Si repartió menos de lo que dice, el faltante se va sin dejar rastro &mdash; y al día siguiente vuelve a llenar como si nada.</p>
            </div>

            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-red-500/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">No se sabe a qué proyecto se fue el combustible</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">Las máquinas rotan: un día están en Cumbas, otro día en otro proyecto. Sin registro de a dónde fue cada galón, es imposible saber cuánto cuesta realmente cada obra ni cuál está consumiendo de más.</p>
            </div>

            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-red-500/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m-6 4h6m-6 4h4M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Las guías y los peajes van por separado</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">Los viajes del cabezal para Favorita, los peajes prepagados y el consumo de diesel se llevan en cuadernos y hojas distintas. Nunca se cruzan, y por eso nunca se sabe si un viaje dejó ganancia o pérdida.</p>
            </div>
        </div>
    </div>
</section>

<!-- CÓMO SE DETECTA EL ROBO -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">El corazón del sistema</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Cómo se detecta el robo de combustible</h2>
            <p class="text-neutral-400 mt-3 max-w-2xl mx-auto">No hace falta instalar sensores ni cambiar los tanqueros. La matemática del tanque hace el trabajo.</p>
        </div>

        <!-- La fórmula -->
        <div class="glass-strong rounded-2xl p-7 mb-6">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">1. El saldo del tanquero corre solo</p>
            <div class="mono text-sm md:text-base bg-black/40 rounded-xl p-5 border border-white/5 leading-relaxed overflow-x-auto">
                <span class="text-neutral-500">Saldo hoy</span> <span class="text-red-400">=</span> <span class="text-white">saldo de ayer</span>
                <span class="text-red-400">+</span> <span class="text-emerald-400">galones cargados</span> <span class="text-neutral-500">(del ticket)</span>
                <span class="text-red-400">&minus;</span> <span class="text-amber-400">galones entregados</span> <span class="text-neutral-500">(del contómetro)</span>
            </div>
            <p class="text-neutral-400 text-sm mt-4 leading-relaxed">El sistema nunca necesita que alguien mida el sobrante con una varilla. Lo calcula a partir de lo que entró (el ticket de la estación) y lo que salió (la bomba del tanquero, máquina por máquina).</p>
        </div>

        <!-- El control físico -->
        <div class="glass-strong rounded-2xl p-7 mb-6 border-red-500/30">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">2. La regla que no se puede romper</p>
            <p class="text-white text-lg font-semibold mb-4">En un tanque de 110 galones no caben 140.</p>

            <div class="bg-black/40 rounded-xl p-5 border border-red-500/25">
                <p class="text-neutral-400 text-xs uppercase tracking-widest mb-3">Ejemplo real</p>
                <div class="space-y-2 mono text-sm">
                    <div class="flex justify-between items-center gap-4"><span class="text-neutral-400">Sobrante calculado de ayer</span><span class="text-white font-bold">40 gal</span></div>
                    <div class="flex justify-between items-center gap-4"><span class="text-neutral-400">Ticket de hoy dice que cargó</span><span class="text-white font-bold">100 gal</span></div>
                    <div class="border-t border-white/10 pt-2 flex justify-between items-center gap-4"><span class="text-neutral-300">Total en el tanque</span><span class="text-red-400 font-bold">140 gal</span></div>
                    <div class="flex justify-between items-center gap-4"><span class="text-neutral-400">Capacidad del tanquero</span><span class="text-white font-bold">110 gal</span></div>
                </div>
                <div class="mt-4 bg-red-500/15 border border-red-500/40 rounded-lg px-4 py-3">
                    <p class="text-red-300 font-bold text-sm">&#9888; Alerta roja &mdash; físicamente imposible</p>
                    <p class="text-neutral-300 text-sm mt-1">O el sobrante nunca estuvo ahí, o los galones entregados a las máquinas se registraron de más. En cualquiera de los dos casos, faltan 30 galones y hay a quién preguntarle.</p>
                </div>
            </div>
        </div>

        <!-- Calibración -->
        <div class="glass-strong rounded-2xl p-7">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">3. Cada llenado a tope es una auditoría</p>
            <p class="text-neutral-300 text-sm leading-relaxed mb-4">
                Sabemos que no siempre llenan completo, y el sistema no lo exige. Pero cuando <strong class="text-white">sí</strong> llenan a tope, el chofer marca una casilla y ese día se convierte en un punto de control exacto: el tanque quedó en 110, sin discusión.
            </p>
            <div class="mono text-sm bg-black/40 rounded-xl p-5 border border-white/5 mb-4 overflow-x-auto">
                <span class="text-neutral-500">Diferencia</span> <span class="text-red-400">=</span> <span class="text-white">110</span> <span class="text-red-400">&minus;</span> <span class="text-neutral-300">(saldo en libros + galones cargados)</span>
            </div>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="rounded-xl p-4 bg-emerald-500/10 border border-emerald-500/25">
                    <p class="text-emerald-400 font-bold text-sm mb-1">Diferencia de 0 a 2 galones</p>
                    <p class="text-neutral-400 text-sm">Normal. Evaporación y margen de error de la bomba.</p>
                </div>
                <div class="rounded-xl p-4 bg-red-500/10 border border-red-500/30">
                    <p class="text-red-400 font-bold text-sm mb-1">Diferencia de 8 galones, todas las semanas</p>
                    <p class="text-neutral-400 text-sm">Eso ya no es error. Es una fuga sistemática, y el reporte muestra quién, cuándo y cuánto.</p>
                </div>
            </div>
            <p class="text-neutral-400 text-sm mt-5 leading-relaxed">Cada llenado a tope <strong class="text-white">reinicia el saldo en 110</strong> y deja registrada la diferencia de ese ciclo. Como llenan completo la mayor parte del tiempo, habrá puntos de control frecuentes; los días de carga parcial se acumulan sin perder el rastro.</p>
        </div>
    </div>
</section>

<!-- LOS MÓDULOS -->
<section id="modulos" class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">Qué se construye</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Tres módulos, un solo sistema</h2>
        </div>

        <!-- MÓDULO 1 -->
        <div class="glass rounded-2xl overflow-hidden mb-6">
            <div class="brand-grad-soft border-b border-red-500/20 px-7 py-5 flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl brand-grad flex items-center justify-center text-white font-black">1</div>
                <div>
                    <h3 class="text-white font-bold text-xl">Combustible</h3>
                    <p class="text-neutral-400 text-sm">El módulo principal &mdash; diesel, extra y súper</p>
                </div>
            </div>
            <div class="p-7">
                <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">El chofer no llena ningún formulario</p>
                <div class="grid md:grid-cols-4 gap-4 mb-7">
                    <div class="glass-neutral rounded-xl p-4">
                        <div class="text-red-400 font-black text-2xl mb-1">1</div>
                        <p class="text-white text-sm font-semibold mb-1">Foto del ticket</p>
                        <p class="text-neutral-400 text-xs leading-relaxed">Tanquea y toma una foto del recibo con el celular.</p>
                    </div>
                    <div class="glass-neutral rounded-xl p-4">
                        <div class="text-red-400 font-black text-2xl mb-1">2</div>
                        <p class="text-white text-sm font-semibold mb-1">La IA lee el ticket</p>
                        <p class="text-neutral-400 text-xs leading-relaxed">Extrae los 15 campos: ticket, fecha, producto, precio, galones, total, placa, despachador, cliente.</p>
                    </div>
                    <div class="glass-neutral rounded-xl p-4">
                        <div class="text-red-400 font-black text-2xl mb-1">3</div>
                        <p class="text-white text-sm font-semibold mb-1">Foto del odómetro</p>
                        <p class="text-neutral-400 text-xs leading-relaxed">Como el ticket viene sin kilometraje, se captura del tablero. Un segundo más.</p>
                    </div>
                    <div class="glass-neutral rounded-xl p-4">
                        <div class="text-red-400 font-black text-2xl mb-1">4</div>
                        <p class="text-white text-sm font-semibold mb-1">Confirma y listo</p>
                        <p class="text-neutral-400 text-xs leading-relaxed">Revisa que los datos estén bien y envía. La foto original queda guardada como respaldo.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-3">Abastecimiento en la estación</p>
                        <ul class="space-y-2 text-neutral-300 text-sm">
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Lectura automática del ticket con inteligencia artificial</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Los tres combustibles: diesel, extra y súper</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>El sistema separa solo las <strong class="text-white">dos razones sociales</strong> leyendo el campo Cliente del ticket</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Vehículos particulares que trabajan para la empresa, marcados aparte</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Imagen original del recibo guardada como respaldo permanente</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span><strong class="text-white">Control del crédito</strong> con la estación: deuda acumulada, pagos y saldo</span></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-3">Repartición a las máquinas</p>
                        <ul class="space-y-2 text-neutral-300 text-sm">
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Catálogo de máquinas con código y nombre (N66h, 257B Bobcat, etc.)</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Galones entregados a cada máquina, tomados del contómetro de la bomba</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span><strong class="text-white">Proyecto o área de trabajo</strong> asociado a cada entrega &mdash; Cumbas, pequeña minería, el que sea</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Saldo del tanquero calculado y alertas de descuadre</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Varios tanqueros, cada uno con su capacidad configurable</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Horas de trabajo declaradas por el operador, para calcular galones por hora</span></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6 rounded-xl bg-black/30 border border-white/8 p-5">
                    <p class="text-white font-semibold text-sm mb-2">Rendimiento: el segundo control</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">El sistema aprende solo cuánto consume normalmente cada vehículo y cada máquina &mdash; <span class="mono text-red-300">galones/km</span> en ruta, <span class="mono text-red-300">galones/día</span> y <span class="mono text-red-300">galones/hora</span> en obra. También aprende la capacidad de cada tanque a partir de las cargas registradas, sin que nadie tenga que medirla. Cuando un consumo se sale de su propio promedio, aparece marcado en el reporte del día.</p>
                </div>
            </div>
        </div>

        <!-- MÓDULO 2 -->
        <div class="glass rounded-2xl overflow-hidden mb-6">
            <div class="brand-grad-soft border-b border-red-500/20 px-7 py-5 flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl brand-grad flex items-center justify-center text-white font-black">2</div>
                <div>
                    <h3 class="text-white font-bold text-xl">Peajes</h3>
                    <p class="text-neutral-400 text-sm">Saldo prepagado en tiempo real</p>
                </div>
            </div>
            <div class="p-7 grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-3">Registro del chofer</p>
                    <ul class="space-y-2 text-neutral-300 text-sm">
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Peaje seleccionado de una <strong class="text-white">lista cerrada</strong> &mdash; no se escribe, se elige, y así no hay errores de tipeo</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Valor, fecha y hora del paso</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Vehículo que pasó</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Tres toques y está registrado</span></li>
                    </ul>
                </div>
                <div>
                    <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-3">Control del prepago</p>
                    <ul class="space-y-2 text-neutral-300 text-sm">
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Registro de recargas al prepago</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span><strong class="text-white">Saldo disponible al instante</strong>, sin esperar el corte de mes</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Aviso automático cuando el saldo baja del mínimo que ustedes definan</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Gasto de peaje por vehículo y por mes</span></li>
                        <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Catálogo de peajes cargado con el listado histórico de Mattco</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MÓDULO 3 -->
        <div class="glass rounded-2xl overflow-hidden">
            <div class="brand-grad-soft border-b border-red-500/20 px-7 py-5 flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl brand-grad flex items-center justify-center text-white font-black">3</div>
                <div>
                    <h3 class="text-white font-bold text-xl">Viajes y guías de remisión</h3>
                    <p class="text-neutral-400 text-sm">El cabezal con Corporación Favorita</p>
                </div>
            </div>
            <div class="p-7">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-3">Cada viaje registrado</p>
                        <ul class="space-y-2 text-neutral-300 text-sm">
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Vehículo y número de guía de remisión</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Fecha y hora de salida, fecha y hora de llegada</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Origen fijo: Centro de Distribución Sangolquí</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Destino elegido del listado de locales &mdash; el valor se calcula solo</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Kilometraje de salida y de llegada</span></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-3">Tarifario que cambia cada mes</p>
                        <ul class="space-y-2 text-neutral-300 text-sm">
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Catálogo completo de locales Favorita, con código, ciudad y zona</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Las tres columnas del tarifario: valor ruta diesel, baja y valor seco</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span><strong class="text-white">Tarifas con fecha de vigencia</strong>: un viaje de junio conserva su tarifa de junio aunque en julio suba</span></li>
                            <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>El Excel mensual de Favorita se carga al sistema y actualiza todo de una vez</span></li>
                        </ul>
                    </div>
                </div>

                <div class="rounded-xl bg-black/30 border border-red-500/20 p-5">
                    <p class="text-white font-semibold text-sm mb-2">Conciliación con Favorita</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">Se carga la liquidación que envía Favorita y el sistema la cruza contra los viajes registrados. En pantalla queda claro qué viajes se hicieron, cuáles pagaron, cuáles faltan por pagar y si algún valor liquidado no coincide con la tarifa vigente de esa ruta. Es la diferencia entre <em>creer</em> que pagaron bien y <em>saber</em> que pagaron bien.</p>
                    <p class="text-neutral-500 text-xs mt-3 leading-relaxed">Hoy Mattco opera un solo cabezal en la zona norte. El sistema se entrega con el catálogo nacional completo cargado y filtrado por zona, de modo que si mañana vuelven a operar en todo el país, no hay que tocar nada.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ALERTAS -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">Vigilancia automática</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Las 8 alertas que trabajan solas</h2>
            <p class="text-neutral-400 mt-3 max-w-2xl mx-auto">Nadie tiene que revisar recibo por recibo. El sistema levanta la mano cuando algo no cuadra.</p>
        </div>

        <div class="glass rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-red-500/20 brand-grad-soft">
                            <th class="text-left px-5 py-3 text-red-400 font-bold text-xs uppercase tracking-widest">Alerta</th>
                            <th class="text-left px-5 py-3 text-red-400 font-bold text-xs uppercase tracking-widest">Qué detecta</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/6">
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Capacidad excedida</td>
                            <td class="px-5 py-4 text-neutral-400">Un tanque de 110 galones no puede recibir 140. Se bloquea el registro y se avisa.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Ticket repetido</td>
                            <td class="px-5 py-4 text-neutral-400">El mismo número de ticket o de transacción no se puede subir dos veces. Se acabó cobrar el mismo recibo dos veces.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Placa que no coincide</td>
                            <td class="px-5 py-4 text-neutral-400">La placa impresa en el ticket debe ser la del vehículo que declaró el chofer. Si no coincide, queda marcado.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Descuadre del tanquero</td>
                            <td class="px-5 py-4 text-neutral-400">Diferencia entre lo que entró, lo que salió y lo que debería quedar. Se acumula por chofer y por ciclo.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Consumo fuera de lo normal</td>
                            <td class="px-5 py-4 text-neutral-400">Un vehículo que siempre rinde 8 km por galón y de pronto rinde 4. Comparado contra su propio historial, no contra un promedio genérico.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Odómetro que retrocede</td>
                            <td class="px-5 py-4 text-neutral-400">El kilometraje solo puede subir. Si el número ingresado es menor al anterior, algo está mal.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Foto tardía o fuera de lugar</td>
                            <td class="px-5 py-4 text-neutral-400">Se compara la hora impresa en el ticket con la hora real de la foto, y la ubicación del celular con la de la estación. Un recibo fotografiado tres días después, a 80 km de la gasolinera, se marca.</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4 text-white font-semibold align-top whitespace-nowrap">Descuadre con la estación</td>
                            <td class="px-5 py-4 text-neutral-400">La suma de tickets del sistema contra el estado de cuenta mensual de la gasolinera. Si ellos cobraron 12 cargas y en el sistema hay 10, aparecen las 2 que faltan.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- REPORTES + TECNOLOGÍA -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-6">
        <div class="glass rounded-2xl p-7">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">Reportes</p>
            <h3 class="text-white font-bold text-2xl mb-5">Todo exportable a Excel y PDF</h3>
            <ul class="space-y-2.5 text-neutral-300 text-sm">
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span><strong class="text-white">Reporte diario</strong> de consumo, con las alertas del día arriba</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Consumo por vehículo y por máquina, con su rendimiento</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span><strong class="text-white">Consumo por proyecto</strong> &mdash; cuánto diesel se llevó cada obra</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Movimiento y descuadres de cada tanquero</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Estado de cuenta del crédito con la estación</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Peajes por vehículo y saldo del prepago</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Viajes realizados, valorizados y conciliados con Favorita</span></li>
                <li class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Reporte separado por cada razón social</span></li>
            </ul>
        </div>

        <div class="glass rounded-2xl p-7">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">Tecnología</p>
            <h3 class="text-white font-bold text-2xl mb-5">Cómo está construido</h3>
            <div class="space-y-4">
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Funciona en celular, tablet y computadora</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">Una sola dirección web sirve para los tres, y la pantalla se acomoda sola a cada uno. El chofer registra desde su celular en plena estación, el jefe de flota revisa desde una tablet en obra, y contabilidad saca los reportes desde la computadora de la oficina &mdash; todos viendo la misma información al instante. No hay que descargar ni actualizar nada.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Nada se borra sin dejar rastro</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">Cada corrección queda registrada con quién la hizo, cuándo y qué decía antes. En un sistema de control, poder editar sin dejar huella lo invalidaría por completo.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Tres perfiles de usuario</p>
                    <p class="text-neutral-400 text-sm leading-relaxed"><strong class="text-white">Administrador</strong> ve todo y configura. <strong class="text-white">Registrador</strong> ingresa y corrige. <strong class="text-white">Chofer</strong> solo sube sus propios tickets. Como cada uno entra con su usuario y clave, el ticket subido queda firmado con su nombre y hora.</p>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm mb-1">Dos razones sociales separadas</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">RUC 1001967656001 y RUC 1002125829001 conviven en el mismo sistema con sus reportes independientes, aunque los vehículos se mezclen entre una y otra.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CRONOGRAMA -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">Cómo avanzamos</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Los 3 módulos en 2 a 3 semanas</h2>
            <p class="text-neutral-400 mt-3 max-w-2xl mx-auto">El módulo de combustible &mdash; el que más urge &mdash; queda funcionando en la primera semana.</p>
        </div>

        <div class="space-y-4">
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black">1</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-baseline gap-3 mb-2">
                        <h3 class="text-white font-bold text-lg">Base del sistema + Combustible</h3>
                        <span class="text-red-400 text-sm font-semibold">Semana 1</span>
                    </div>
                    <p class="text-neutral-400 text-sm leading-relaxed">Usuarios y roles, las dos razones sociales, catálogos de vehículos, máquinas, tanqueros, choferes y proyectos. Lectura de tickets con IA, foto del odómetro, repartición a máquinas, saldo del tanquero, las 8 alertas, control del crédito con la estación, reportes y exportación. Compatible con celular, tablet y computadora.</p>
                    <p class="text-neutral-500 text-xs mt-2">Al terminar esta semana el módulo principal ya está en línea y se puede empezar a cargar tickets reales.</p>
                </div>
            </div>

            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black">2</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-baseline gap-3 mb-2">
                        <h3 class="text-white font-bold text-lg">Peajes + Viajes y guías de remisión</h3>
                        <span class="text-red-400 text-sm font-semibold">Semana 2</span>
                    </div>
                    <p class="text-neutral-400 text-sm leading-relaxed">Peajes con saldo prepago en tiempo real y aviso de saldo bajo. Catálogo de locales Favorita con tarifas versionadas por mes, cargador del Excel mensual, registro de viajes con guía y kilometraje, cálculo automático del valor y conciliación contra la liquidación de Favorita.</p>
                </div>
            </div>

            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-14 h-14 rounded-xl brand-grad flex items-center justify-center text-white font-black">3</div>
                <div class="flex-1">
                    <div class="flex flex-wrap items-baseline gap-3 mb-2">
                        <h3 class="text-white font-bold text-lg">Carga de datos, capacitación y puesta en marcha</h3>
                        <span class="text-red-400 text-sm font-semibold">Semana 3</span>
                    </div>
                    <p class="text-neutral-400 text-sm leading-relaxed">Carga del listado de vehículos, máquinas, proyectos, peajes y del tarifario de Favorita. Pruebas con tickets reales, capacitación al personal administrativo y a los choferes, y ajuste de lo que aparezca en el uso diario.</p>
                </div>
            </div>
        </div>

        <div class="glass-strong rounded-2xl p-6 mt-6">
            <p class="text-white font-semibold mb-3">Incluido en el proyecto</p>
            <div class="grid sm:grid-cols-2 gap-x-8 gap-y-2 text-sm text-neutral-300">
                <div class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Dominio propio del sistema</span></div>
                <div class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Servidor, base de datos y respaldos diarios</span></div>
                <div class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Capacitación al personal administrativo</span></div>
                <div class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Capacitación a choferes y operadores</span></div>
                <div class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>Carga inicial de vehículos, máquinas y proyectos</span></div>
                <div class="flex gap-2"><span class="text-red-500 font-bold">&rsaquo;</span><span>30 días de soporte después de la entrega</span></div>
            </div>
        </div>
    </div>
</section>

<!-- INVERSIÓN -->
<section id="inversion" class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">Inversión</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Cuánto cuesta</h2>
        </div>

        <!-- Desglose por módulo -->
        <div class="glass rounded-2xl overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-red-500/20 brand-grad-soft">
                            <th class="text-left px-6 py-3 text-red-400 font-bold text-xs uppercase tracking-widest">Desarrollo &mdash; qué se construye</th>
                            <th class="text-right px-6 py-3 text-red-400 font-bold text-xs uppercase tracking-widest whitespace-nowrap">Valor</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/6">
                        <tr>
                            <td class="px-6 py-4">
                                <p class="text-white font-semibold">Módulo 1 &mdash; Combustible, con lectura por inteligencia artificial</p>
                                <p class="text-neutral-400 text-xs mt-1 leading-relaxed">Lectura automática del ticket con IA y validación aritmética, foto del odómetro, repartición del tanquero a cada máquina por proyecto, saldo del tanquero con calibración, las 8 alertas antifraude, control del crédito con la estación y cálculo de rendimientos.</p>
                                <p class="text-red-400 text-xs mt-2 font-semibold">Es el módulo más extenso y el corazón del sistema.</p>
                            </td>
                            <td class="px-6 py-4 text-right text-white font-bold mono whitespace-nowrap align-top">$ 700</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <p class="text-white font-semibold">Módulo 2 &mdash; Peajes</p>
                                <p class="text-neutral-400 text-xs mt-1 leading-relaxed">Catálogo de peajes, registro desde el celular con lista cerrada, recargas del prepago, saldo en tiempo real y aviso de saldo bajo.</p>
                            </td>
                            <td class="px-6 py-4 text-right text-white font-bold mono whitespace-nowrap align-top">$ 150</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <p class="text-white font-semibold">Módulo 3 &mdash; Viajes y guías de remisión</p>
                                <p class="text-neutral-400 text-xs mt-1 leading-relaxed">Catálogo de locales Favorita con tarifas versionadas por mes, cargador del Excel mensual, registro de viajes con guía y kilometraje, cálculo automático del valor y conciliación contra la liquidación de Favorita.</p>
                            </td>
                            <td class="px-6 py-4 text-right text-white font-bold mono whitespace-nowrap align-top">$ 350</td>
                        </tr>
                        <tr class="brand-grad-soft border-t border-red-500/25">
                            <td class="px-6 py-4">
                                <p class="text-white font-bold">Total del desarrollo</p>
                                <p class="text-neutral-400 text-xs mt-1">Incluye reportes, exportación a Excel y PDF, carga inicial de datos y capacitación.</p>
                            </td>
                            <td class="px-6 py-4 text-right font-black mono whitespace-nowrap align-top text-lg text-grad">$ 1.200</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="border-t border-white/8 px-6 py-4">
                <p class="text-neutral-400 text-xs leading-relaxed"><strong class="text-neutral-200">Los tres módulos comparten una misma base</strong> &mdash; usuarios con los tres roles, separación de las dos razones sociales, catálogos de vehículos, máquinas, tanqueros, choferes y proyectos, historial auditable de cambios y funcionamiento en celular, tablet y computadora. Ese trabajo se construye una sola vez y su valor está repartido dentro de los tres módulos.</p>
            </div>
        </div>

        <!-- Precio destacado -->
        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <div class="glass-strong rounded-2xl p-7 border-red-500/40">
                <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-2">Desarrollo</p>
                <h3 class="text-white font-bold text-xl mb-1">Los 3 módulos completos</h3>
                <p class="text-neutral-400 text-sm mb-5">Pago único. Combustible, peajes y viajes, entregados funcionando.</p>
                <div class="flex items-baseline gap-2 mb-1">
                    <span class="text-5xl font-black text-grad mono">$1.200</span>
                    <span class="text-neutral-400 font-semibold">+ IVA</span>
                </div>
                <p class="text-emerald-400 text-sm font-semibold mb-5">2 a 3 semanas &middot; el sistema queda de Mattco</p>
                <div class="border-t border-white/10 pt-4 space-y-1.5 text-sm text-neutral-300">
                    <div class="flex justify-between"><span>Anticipo para arrancar (60%)</span><span class="mono font-bold text-white">$720</span></div>
                    <div class="flex justify-between"><span>A la entrega final (40%)</span><span class="mono font-bold text-white">$480</span></div>
                </div>
                <div class="mt-5 pt-4 border-t border-white/10 space-y-3">
                    <div>
                        <p class="text-white font-semibold text-sm mb-1">Sin costos ocultos</p>
                        <p class="text-neutral-400 text-sm leading-relaxed">Los tres módulos de arriba son todo el desarrollo. Reportes, exportación a Excel y PDF, carga inicial de datos y capacitación ya están incluidos.</p>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm mb-1">Se pueden contratar por separado</p>
                        <p class="text-neutral-400 text-sm leading-relaxed">Si prefieren arrancar solo con el de combustible, se puede. Los otros dos se suman después al mismo valor de esta propuesta.</p>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm mb-1">El sistema es de Mattco</p>
                        <p class="text-neutral-400 text-sm leading-relaxed">El código y toda la información les pertenecen. Si algún día deciden llevarlo a otro proveedor, se entrega completo.</p>
                    </div>
                </div>
            </div>

            <div class="glass rounded-2xl p-7">
                <p class="text-neutral-400 text-xs font-bold uppercase tracking-widest mb-2">Mensualidad</p>
                <h3 class="text-white font-bold text-xl mb-1">Operación y soporte</h3>
                <p class="text-neutral-400 text-sm mb-5">Empieza a correr desde el segundo mes. El primero va incluido con el soporte de arranque.</p>
                <div class="flex items-baseline gap-2 mb-1">
                    <span class="text-5xl font-black text-grad mono">$35</span>
                    <span class="text-neutral-400 font-semibold">+ IVA / mes</span>
                </div>
                <p class="text-emerald-400 text-sm font-semibold mb-5">Poco más de un dólar al día por toda la flota</p>
                <div class="border-t border-white/10 pt-4 space-y-3 text-sm">
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="text-neutral-200 font-semibold">Servidor en la nube y base de datos</p>
                            <p class="text-neutral-500 text-xs">Donde vive el sistema, con respaldos diarios</p>
                        </div>
                        <span class="mono font-bold text-white whitespace-nowrap">$12</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="text-neutral-200 font-semibold">Inteligencia artificial</p>
                            <p class="text-neutral-500 text-xs">Se paga por cada ticket leído</p>
                        </div>
                        <span class="mono font-bold text-white whitespace-nowrap">$8</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="text-neutral-200 font-semibold">Dominio propio</p>
                            <p class="text-neutral-500 text-xs">La dirección web del sistema</p>
                        </div>
                        <span class="mono font-bold text-white whitespace-nowrap">$2</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="text-neutral-200 font-semibold">Soporte y actualizaciones</p>
                            <p class="text-neutral-500 text-xs">Ajustes menores y parches de seguridad</p>
                        </div>
                        <span class="mono font-bold text-white whitespace-nowrap">$13</span>
                    </div>
                    <div class="flex justify-between gap-4 border-t border-white/10 pt-3">
                        <p class="text-white font-bold">Total mensual</p>
                        <span class="mono font-black text-grad whitespace-nowrap">$35</span>
                    </div>
                </div>

                <div class="mt-5 pt-5 border-t border-white/10">
                    <p class="text-neutral-400 text-xs font-bold uppercase tracking-widest mb-3">Dos formas de pagarlo</p>
                    <div class="space-y-3">
                        <div class="rounded-xl p-4 bg-black/30 border border-white/8">
                            <div class="flex items-baseline justify-between gap-3 mb-1">
                                <p class="text-white font-semibold text-sm">Mes a mes</p>
                                <span class="mono font-bold text-white whitespace-nowrap">$35 <span class="text-neutral-400 font-normal text-xs">/ mes</span></span>
                            </div>
                            <p class="text-neutral-400 text-xs">Suman $420 en el año.</p>
                        </div>
                        <div class="rounded-xl p-4 bg-emerald-500/10 border border-emerald-500/30">
                            <div class="flex items-baseline justify-between gap-3 mb-1">
                                <p class="text-white font-semibold text-sm">Año completo por adelantado</p>
                                <span class="mono font-bold text-emerald-400 whitespace-nowrap">$350 <span class="text-emerald-400/70 font-normal text-xs">/ año</span></span>
                            </div>
                            <p class="text-emerald-400 text-xs font-semibold">Dos meses gratis &mdash; ahorro de $70 (17%)</p>
                        </div>
                    </div>
                    <p class="text-neutral-500 text-xs mt-3 leading-relaxed">Ambas opciones cubren exactamente lo mismo. Los valores no cambian durante el primer año.</p>
                </div>
            </div>
        </div>

        <!-- Retorno -->
        <div class="glass-strong rounded-2xl p-7">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-4">Para ponerlo en perspectiva</p>
            <p class="text-white text-lg font-semibold mb-5">Al precio de hoy del diesel premium, $2,83 el galón:</p>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="rounded-xl p-5 bg-black/30 border border-white/8">
                    <div class="text-3xl font-black text-grad mono mb-1">13 gal</div>
                    <p class="text-neutral-300 text-sm font-semibold mb-1">al mes</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">Es todo lo que hay que dejar de perder para cubrir la mensualidad del sistema.</p>
                </div>
                <div class="rounded-xl p-5 bg-black/30 border border-white/8">
                    <div class="text-3xl font-black text-grad mono mb-1">424 gal</div>
                    <p class="text-neutral-300 text-sm font-semibold mb-1">una sola vez</p>
                    <p class="text-neutral-400 text-sm leading-relaxed">Recuperar eso paga el desarrollo completo. Son menos de cuatro llenadas del tanquero.</p>
                </div>
            </div>
            <p class="text-neutral-500 text-xs mt-5 leading-relaxed">Y eso sin contar lo que se gana en tiempo administrativo, en saber qué obra consume de más, y en cobrarle a Favorita todos los viajes que realmente se hicieron.</p>
        </div>
    </div>
</section>

<!-- QUÉ NECESITAMOS -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-red-400 font-bold text-sm uppercase tracking-widest mb-2">Para arrancar</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Lo que necesitamos de Mattco</h2>
            <p class="text-neutral-400 mt-3 max-w-2xl mx-auto">Nada complicado. Todo esto lo recogemos en la primera semana.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Listado de vehículos y máquinas</p>
                <p class="text-neutral-400 text-sm">Placa o código, nombre y capacidad de tanque si la tienen a mano. Si no, el sistema la aprende de las primeras cargas.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Listado de proyectos y áreas de trabajo</p>
                <p class="text-neutral-400 text-sm">Los que estén activos hoy. Se pueden agregar más en cualquier momento desde el sistema.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Choferes y operadores</p>
                <p class="text-neutral-400 text-sm">Nombre y cédula de quienes van a registrar. Nosotros creamos los usuarios y entregamos las claves.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Listado de peajes</p>
                <p class="text-neutral-400 text-sm">El histórico de los meses anteriores nos sirve para armar el catálogo con los valores vigentes.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Tarifario Favorita en Excel</p>
                <p class="text-neutral-400 text-sm">El archivo mensual de tarifas. Ya revisamos el de julio: 250 locales con sus tres valores por ruta.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Un estado de cuenta de la estación</p>
                <p class="text-neutral-400 text-sm">Uno cualquiera de un mes pasado, para dejar armada la conciliación desde el primer día.</p>
            </div>
        </div>
    </div>
</section>

<!-- CONDICIONES -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="glass rounded-2xl p-7">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-5">Condiciones</p>
            <div class="grid md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                <div>
                    <p class="text-white font-semibold mb-1">Validez de la propuesta</p>
                    <p class="text-neutral-400">30 días desde la fecha de emisión.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Impuestos</p>
                    <p class="text-neutral-400">Todos los valores son antes de IVA.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Plazo de entrega</p>
                    <p class="text-neutral-400">De 2 a 3 semanas, contadas desde que Mattco entregue la información de arranque (listados de vehículos, máquinas, proyectos, peajes y el tarifario de Favorita).</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Propiedad del sistema</p>
                    <p class="text-neutral-400">El sistema y toda la información que contiene son de Mattco.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Capacitación</p>
                    <p class="text-neutral-400">Incluida y presencial en Otavalo, tanto para el personal administrativo como para los choferes y operadores.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Alcance</p>
                    <p class="text-neutral-400">Este valor cubre exactamente lo descrito en esta propuesta. Cualquier funcionalidad adicional se cotiza aparte y por escrito antes de construirla.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">¿Conversamos los detalles?</h2>
        <p class="text-neutral-400 text-lg mb-8 max-w-2xl mx-auto">Cualquier duda sobre el alcance, los plazos o la inversión, escríbenos y la resolvemos.</p>
        <a href="https://wa.me/593999174980?text=Hola%2C%20somos%20Mattco.%20Revisamos%20la%20propuesta%20del%20sistema%20de%20control%20de%20combustible%20y%20queremos%20conversar."
           target="_blank" rel="noopener"
           class="no-print inline-flex items-center gap-3 px-8 py-4 rounded-xl brand-grad text-white font-bold text-base hover:opacity-90 transition shadow-2xl">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.71.306 1.263.489 1.695.625.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
            Escribir por WhatsApp
        </a>
        <p class="text-neutral-500 text-sm mt-4">+593 99 917 4980 &middot; Creative Web</p>
    </div>
</section>

<!-- FOOTER -->
<footer class="border-t border-white/8 py-10">
    <div class="max-w-6xl mx-auto px-6 flex flex-wrap items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <img src="assets/logo-mattco.png" alt="Mattco" class="h-8">
            <div class="border-l border-white/10 pl-4">
                <p class="text-white text-sm font-semibold">Propuesta de desarrollo</p>
                <p class="text-neutral-500 text-xs">Otavalo, julio de 2026</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-neutral-400 text-sm">Preparado por <span class="text-red-400 font-semibold">Creative Web</span></p>
            <p class="text-neutral-600 text-xs mt-1">Documento confidencial &middot; Uso exclusivo de Mattco</p>
        </div>
    </div>
</footer>

</body>
</html>
