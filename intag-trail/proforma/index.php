<?php
session_start();
if (!isset($_SESSION['auth_intag_trail_proforma']) || $_SESSION['auth_intag_trail_proforma'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es-EC">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Propuesta · Arriendo de Plataforma · Intag Trail 2026</title>
<meta name="robots" content="noindex, nofollow">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&family=Anton&display=swap" rel="stylesheet">
<style>
    :root {
      --bg-deep: #060D0A;
      --bg-base: #0F1B16;
      --bg-elevated: #1A2620;
      --bg-panel: #243430;
      --bg-line: #2F4239;
      --emerald-300: #6EE7B7;
      --emerald-400: #34D399;
      --emerald-500: #10B981;
      --emerald-600: #059669;
      --gold-300: #FCD34D;
      --gold-400: #FBBF24;
      --gold-500: #D4A332;
      --gold-600: #B08925;
      --fg: #FAFAFA;
      --fg-sec: #D1D5DB;
      --fg-mut: #9CA3AF;
    }
    * { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Outfit', sans-serif; letter-spacing: -0.02em; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    .font-trail { font-family: 'Anton', sans-serif; letter-spacing: 0.01em; }
    body {
        background: var(--bg-base);
        color: var(--fg);
        background-image:
          radial-gradient(900px 600px at 90% -10%, rgba(212,163,50,0.10), transparent 60%),
          radial-gradient(700px 500px at -5% 80%, rgba(16,185,129,0.10), transparent 55%);
        background-attachment: fixed;
    }
    .glass {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(255,255,255,0.10);
    }
    .glass-gold {
        background: linear-gradient(135deg, rgba(212,163,50,0.10), rgba(255,255,255,0.02));
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(212,163,50,0.30);
    }
    .glass-emerald {
        background: linear-gradient(135deg, rgba(16,185,129,0.10), rgba(255,255,255,0.02));
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(52,211,153,0.25);
    }

    .pill {
        display:inline-flex; align-items:center; gap:6px;
        padding:4px 10px; border-radius:6px;
        font-family:'JetBrains Mono',monospace;
        font-size:10px; font-weight:600;
        text-transform:uppercase; letter-spacing:0.10em;
    }
    .pill-gold { background:rgba(212,163,50,0.12); color:#FCD34D; border:1px solid rgba(212,163,50,0.30); }
    .pill-emerald { background:rgba(16,185,129,0.12); color:#6EE7B7; border:1px solid rgba(16,185,129,0.30); }

    .feature-card {
        background: var(--bg-panel);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        padding: 20px;
        transition: all .25s ease;
    }
    .feature-card:hover { border-color: rgba(212,163,50,0.30); }

    @media print {
        body { background: white !important; color: black !important; }
        .no-print { display: none !important; }
        .glass, .glass-gold, .glass-emerald, .feature-card { background: white !important; border-color: #ddd !important; color: black !important; }
        h1, h2, h3, p, li, td, th { color: black !important; }
        section { page-break-inside: avoid; }
    }

    ::-webkit-scrollbar { width: 10px; height: 10px; }
    ::-webkit-scrollbar-track { background: var(--bg-base); }
    ::-webkit-scrollbar-thumb { background: var(--bg-line); border-radius: 5px; }
    html { scroll-behavior: smooth; }
</style>
</head>
<body>

<!-- HEADER -->
<header class="sticky top-0 z-50 glass border-b border-yellow-900/30 no-print">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background:linear-gradient(135deg,#D4A332,#B08925); box-shadow:0 0 20px rgba(212,163,50,0.25);">
                    <span class="font-trail text-xl text-stone-900">IT</span>
                </div>
                <div>
                    <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-400">Propuesta</p>
                    <h1 class="font-display text-base md:text-lg font-bold text-white leading-tight">Arriendo de Plataforma · Intag Trail 2026</h1>
                </div>
            </div>
            <a href="logout.php" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-slate-800/60 hover:bg-slate-700/60 text-slate-300 text-xs font-medium transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Salir
            </a>
        </div>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 sm:px-6">

<!-- HERO -->
<section class="py-12 md:py-16">
    <div class="mb-6">
        <span class="pill pill-gold">Propuesta confidencial · Mayo 2026</span>
    </div>
    <h1 class="font-display text-3xl md:text-5xl lg:text-6xl font-extrabold text-white mb-5 leading-[1.05]">
        Arriendo de la plataforma<br>
        para <span class="text-yellow-400">Intag Trail Run 2026.</span>
    </h1>
    <p class="text-base md:text-lg text-slate-300 max-w-3xl leading-relaxed mb-8">
        Sistema profesional de inscripciones, pagos y gestión de corredores. Listo para activar para los 3 días del evento. Modelo de arriendo con setup mínimo y comisión por inscrito — pagas según el éxito real del evento.
    </p>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl">
        <div class="glass rounded-xl p-4">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-1">Evento</p>
            <p class="font-trail text-xl text-yellow-400">Intag Trail</p>
            <p class="font-mono text-xs text-slate-400 mt-1">9·10·11 Oct 2026</p>
        </div>
        <div class="glass rounded-xl p-4">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-1">Distancias</p>
            <p class="font-display text-xl font-bold text-white">5 rutas</p>
            <p class="font-mono text-xs text-slate-400 mt-1">7K · 20K · 26K · 40K · 87K</p>
        </div>
        <div class="glass rounded-xl p-4">
            <p class="font-mono text-[10px] uppercase tracking-widest text-slate-500 mb-1">Esperados</p>
            <p class="font-display text-xl font-bold text-white">500–1.000</p>
            <p class="font-mono text-xs text-slate-400 mt-1">corredores</p>
        </div>
        <div class="glass-gold rounded-xl p-4">
            <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-1">Modelo</p>
            <p class="font-display text-xl font-bold text-white">Arriendo</p>
            <p class="font-mono text-xs text-yellow-200 mt-1">por evento</p>
        </div>
    </div>
</section>

<!-- LO QUE INCLUYE -->
<section class="py-12">
    <span class="pill pill-emerald mb-3">Qué incluye la plataforma</span>
    <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-3 leading-tight">Todo el sistema, listo para Intag Trail</h2>
    <p class="text-slate-400 mb-8 max-w-3xl">No es una página web con un formulario. Es la plataforma completa, lista para activar.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php
        $modulos = [
            ['Inscripción con validación de cédula', 'El corredor ingresa su cédula, el sistema autocompleta sus datos vía Registro Civil. Categoría por edad automática, talla según género.'],
            ['Pagos: PayPhone + transferencia', 'Tarjeta vía PayPhone con confirmación automática. Transferencia bancaria con comprobante subido y aprobación con un clic.'],
            ['Contador de cupos en tiempo real', 'Cada distancia con cupo máximo. Bloqueo automático del cupo al iniciar inscripción. Liberación si no se completa el pago.'],
            ['Visor de rutas GPX + altimetría', 'Carga del archivo .gpx de cada distancia. Mapa interactivo + perfil de elevación (D+, D-, marcadores).'],
            ['Reporte de camisetas por talla y sexo', 'Cuántas S, M, L, XL — separadas hombre/mujer. Tiempo real. Permite pedido al proveedor con números reales.'],
            ['Correos automáticos personalizados', 'Confirmación de inscripción, recordatorio de pago, aprobación de pago, instrucciones pre-evento. Con marca del evento.'],
            ['Categorías por edad automáticas', 'Sub-18, 18-29, 30-39, 40-49, 50+. Asignación sin intervención manual.'],
            ['Cupones de descuento', 'Códigos configurables (early bird, residentes, grupos, estudiantes). Aplicación automática en checkout.'],
            ['Panel de gestión con filtros y export', 'Filtros por distancia, categoría, modalidad, estado. Export a Excel exactamente lo filtrado.'],
            ['Ranking publicado desde CSV del chip', 'Al recibir el CSV del cronometraje, se sube al panel y el ranking se publica automáticamente.'],
            ['Galería del evento', 'Carga de fotos del evento. Galería pública por distancia.'],
            ['Dashboard en tiempo real', 'Inscritos por distancia, ingresos, ticket promedio. Visible desde celular.'],
        ];
        foreach ($modulos as $i => [$titulo, $desc]):
        ?>
        <div class="feature-card">
            <p class="font-mono text-xs text-yellow-400 mb-2"><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></p>
            <h3 class="font-display text-base font-bold text-white mb-2"><?= $titulo ?></h3>
            <p class="text-slate-400 text-sm leading-relaxed"><?= $desc ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- INVERSIÓN -->
<section class="py-12">
    <span class="pill pill-gold mb-3">Inversión · Modelo arriendo</span>
    <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-3 leading-tight">Setup mínimo + comisión por inscrito</h2>
    <p class="text-slate-400 mb-8 max-w-3xl">Pagas según el éxito real del evento. Bajo riesgo para el organizador, alineado con el resultado.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Setup -->
        <div class="glass-gold rounded-2xl p-8" style="border-width:2px;">
            <div class="flex items-center justify-between mb-4">
                <span class="pill pill-gold">Setup único</span>
                <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300">Al firmar</p>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Activación de la plataforma</h3>
            <div class="flex items-baseline gap-2 mb-5">
                <span class="font-display text-5xl font-extrabold text-yellow-300">$600</span>
                <span class="text-slate-400 font-medium">+ IVA</span>
            </div>
            <ul class="space-y-2 text-sm text-slate-300">
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Configuración del evento con branding Intag Trail</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Configuración de las 5 distancias con GPX, abastos, fichas</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Integración con cuenta PayPhone del organizador</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Configuración de cuenta bancaria para transferencias</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Plantillas de correos automáticos personalizadas</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Capacitación al equipo organizador (2 horas)</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Hosting y base de datos durante todo el evento</li>
                <li class="flex items-start gap-2"><span class="text-yellow-400 font-bold flex-shrink-0">✓</span>Soporte técnico durante el periodo de inscripciones</li>
            </ul>
        </div>

        <!-- Por inscrito -->
        <div class="glass-emerald rounded-2xl p-8" style="border-width:2px;">
            <div class="flex items-center justify-between mb-4">
                <span class="pill pill-emerald">Comisión por inscrito</span>
                <p class="font-mono text-[10px] uppercase tracking-widest text-emerald-300">Post-evento</p>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-2">Por cada corredor inscrito y pagado</h3>
            <div class="flex items-baseline gap-2 mb-5">
                <span class="font-display text-5xl font-extrabold text-emerald-300">$1.50</span>
                <span class="text-slate-400 font-medium">+ IVA / inscrito</span>
            </div>
            <ul class="space-y-2 text-sm text-slate-300">
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span>Cobrado solo sobre inscritos con pago confirmado</li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span>No se cobra por inscripciones canceladas o no pagadas</li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span>Tarifa estándar del mercado para plataformas de inscripción deportiva</li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span>Facturado al cierre del periodo de inscripciones</li>
                <li class="flex items-start gap-2"><span class="text-emerald-400 font-bold flex-shrink-0">✓</span>Reporte transparente de inscritos para validar el conteo</li>
            </ul>
        </div>
    </div>

    <!-- Escenarios -->
    <div class="glass rounded-2xl p-6 md:p-8">
        <h3 class="font-display text-lg font-bold text-white mb-2">Escenarios de inversión total</h3>
        <p class="text-slate-400 text-sm mb-5">Cuánto pagas en total según cuántos corredores se inscriban.</p>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-700/50 text-slate-400 font-mono text-[10px] uppercase tracking-widest">
                        <th class="text-left py-3 px-2">Inscritos</th>
                        <th class="text-center py-3 px-2">Setup</th>
                        <th class="text-center py-3 px-2">Comisión inscritos</th>
                        <th class="text-center py-3 px-2">Total Creative Web</th>
                        <th class="text-center py-3 px-2">Ingreso bruto evento*</th>
                        <th class="text-center py-3 px-2">% del ingreso</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-700/30">
                        <td class="py-3 px-2 text-white font-medium">300 corredores</td>
                        <td class="text-center font-mono">$600</td>
                        <td class="text-center font-mono">$450</td>
                        <td class="text-center font-mono text-yellow-300 font-semibold">$1.050</td>
                        <td class="text-center font-mono text-slate-400">~$9.000</td>
                        <td class="text-center font-mono">~12%</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="py-3 px-2 text-white font-medium">500 corredores</td>
                        <td class="text-center font-mono">$600</td>
                        <td class="text-center font-mono">$750</td>
                        <td class="text-center font-mono text-yellow-300 font-semibold">$1.350</td>
                        <td class="text-center font-mono text-slate-400">~$15.200</td>
                        <td class="text-center font-mono">~9%</td>
                    </tr>
                    <tr class="border-b border-slate-700/30">
                        <td class="py-3 px-2 text-white font-medium">750 corredores</td>
                        <td class="text-center font-mono">$600</td>
                        <td class="text-center font-mono">$1.125</td>
                        <td class="text-center font-mono text-yellow-300 font-semibold">$1.725</td>
                        <td class="text-center font-mono text-slate-400">~$22.800</td>
                        <td class="text-center font-mono">~8%</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-2 text-white font-medium">1.000 corredores</td>
                        <td class="text-center font-mono">$600</td>
                        <td class="text-center font-mono">$1.500</td>
                        <td class="text-center font-mono text-yellow-300 font-semibold">$2.100</td>
                        <td class="text-center font-mono text-slate-400">~$30.400</td>
                        <td class="text-center font-mono">~7%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-slate-500 text-xs mt-4 italic">* Ingreso bruto estimado del organizador basado en distribución típica de corredores y precios oficiales del evento ($20 a $80 por distancia). No incluye comisión PayPhone ni costos operativos del evento.</p>
    </div>
</section>

<!-- TÉRMINOS -->
<section class="py-12">
    <span class="pill pill-emerald mb-3">Términos y condiciones</span>
    <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-3 leading-tight">Lo que entra y lo que no</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
        <div class="glass rounded-2xl p-6">
            <h3 class="font-display text-lg font-bold text-emerald-300 mb-3">✓ Incluido</h3>
            <ul class="text-sm text-slate-300 space-y-2">
                <li>• Plataforma operativa hasta 30 días post-evento</li>
                <li>• Hosting Vercel + base de datos Supabase</li>
                <li>• Integración pasarela PayPhone</li>
                <li>• Flujo de pago por transferencia bancaria con comprobante</li>
                <li>• Validación de cédula con Registro Civil</li>
                <li>• Subdominio temporal Creative Web (sin costo adicional)</li>
                <li>• Correos automáticos durante todo el periodo</li>
                <li>• Capacitación inicial (2 horas)</li>
                <li>• Reportes y exports a Excel</li>
                <li>• Soporte técnico durante todo el periodo activo</li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-6">
            <h3 class="font-display text-lg font-bold text-yellow-300 mb-3">✗ NO incluido</h3>
            <ul class="text-sm text-slate-300 space-y-2">
                <li>• <strong class="text-white">Comisión de PayPhone 6%</strong> — al retirar fondos de PayPhone a cuenta bancaria del organizador. NO se cobra por transacción individual. La comisión la cobra PayPhone directamente.</li>
                <li>• <strong class="text-white">Dominio propio</strong> ($21.99/año si lo quieren). Por defecto se usa subdominio temporal Creative Web.</li>
                <li>• Cronometraje en vivo durante la carrera (lo hacen empresas con chips). El sistema sí publica el ranking al recibir el CSV.</li>
                <li>• Diseño de logos del evento (Intag Trail ya tiene línea gráfica oficial).</li>
                <li>• Producción de fotos y videos del evento.</li>
                <li>• Atención al corredor por WhatsApp (lo maneja el equipo organizador).</li>
            </ul>
        </div>
    </div>

    <div class="glass rounded-2xl p-6 mt-6">
        <h3 class="font-display text-lg font-bold text-white mb-3">Condiciones de pago</h3>
        <ul class="text-sm text-slate-300 space-y-2">
            <li><strong class="text-white">Setup ($600 + IVA):</strong> facturado al firmar la propuesta. Pago al inicio del proyecto.</li>
            <li><strong class="text-white">Comisión por inscrito ($1.50 + IVA):</strong> facturada al cierre del periodo de inscripciones, basada en el conteo final de inscritos con pago confirmado.</li>
            <li><strong class="text-white">Plazo de pago de la factura:</strong> 15 días desde su emisión.</li>
            <li><strong class="text-white">Validez de la propuesta:</strong> 30 días desde su emisión.</li>
        </ul>
    </div>
</section>

<!-- CRONOGRAMA -->
<section class="py-12">
    <span class="pill pill-emerald mb-3">Cronograma</span>
    <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-3 leading-tight">3 semanas hasta inscripciones abiertas</h2>

    <div class="space-y-4 mt-6">
        <div class="glass rounded-xl p-5 flex gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center" style="background:rgba(212,163,50,0.20); color:#FCD34D;">
                <span class="font-trail">1</span>
            </div>
            <div>
                <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-1">Semana 1</p>
                <h3 class="font-display text-base font-bold text-white mb-1">Configuración inicial</h3>
                <p class="text-slate-400 text-sm">Recolección de assets de Intag Trail (logo, fotos, GPX). Configuración de las 5 distancias en la plataforma. Setup de subdominio.</p>
            </div>
        </div>
        <div class="glass rounded-xl p-5 flex gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center" style="background:rgba(212,163,50,0.20); color:#FCD34D;">
                <span class="font-trail">2</span>
            </div>
            <div>
                <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-1">Semana 2</p>
                <h3 class="font-display text-base font-bold text-white mb-1">Branding y pagos</h3>
                <p class="text-slate-400 text-sm">Aplicación de la línea gráfica Intag Trail. Integración PayPhone. Configuración de correos. Carga de FAQ, reglamento y abastos.</p>
            </div>
        </div>
        <div class="glass rounded-xl p-5 flex gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center" style="background:rgba(212,163,50,0.20); color:#FCD34D;">
                <span class="font-trail">3</span>
            </div>
            <div>
                <p class="font-mono text-[10px] uppercase tracking-widest text-yellow-300 mb-1">Semana 3</p>
                <h3 class="font-display text-base font-bold text-white mb-1">Pruebas, capacitación y lanzamiento</h3>
                <p class="text-slate-400 text-sm">Pruebas integrales del flujo de inscripción. Capacitación al equipo organizador. Apertura oficial de inscripciones.</p>
            </div>
        </div>
    </div>
</section>

<!-- 2027 OUTLOOK -->
<section class="py-12">
    <div class="glass-emerald rounded-3xl p-8 md:p-10">
        <span class="pill pill-emerald mb-4">Mirando hacia 2027</span>
        <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-4 leading-tight">El siguiente paso natural: adquisición por el Municipio de Cotacachi</h2>
        <p class="text-slate-300 text-base leading-relaxed mb-4">El Municipio de Cotacachi ya ha manifestado interés en <strong class="text-white">adquirir la plataforma completa para 2027</strong> bajo modalidad anual ($4.000 + IVA), cubriendo no solo Intag Trail sino también Travesía Cuicocha y los demás eventos deportivos del cantón.</p>
        <p class="text-slate-300 text-base leading-relaxed">El éxito operativo de Intag Trail 2026 sobre esta plataforma es la mejor evidencia para sustentar esa partida en el POA 2027. <strong class="text-emerald-300">Si todo sale bien este año, en 2027 el organizador no paga por el sistema — el municipio lo cubre.</strong></p>
    </div>
</section>

<!-- CIERRE -->
<section class="py-12">
    <div class="glass-gold rounded-3xl p-8 md:p-12 text-center">
        <span class="pill pill-gold mb-4 inline-flex">Próximos pasos</span>
        <h2 class="font-display text-2xl md:text-4xl font-bold text-white mb-4 leading-tight">Para arrancar:<br>aprobación + kick-off.</h2>
        <p class="text-slate-300 text-base md:text-lg max-w-2xl mx-auto mb-6">
            Una vez aprobada esta propuesta, en <strong class="text-yellow-300">3 semanas</strong> tenemos las inscripciones de Intag Trail abiertas al público.
        </p>
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="https://wa.me/593968663866" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-stone-900 font-semibold text-sm font-trail uppercase tracking-widest transition-all"
               style="background:linear-gradient(135deg,#D4A332,#B08925); box-shadow:0 8px 24px rgba(212,163,50,0.35);">
                Hablar con Creative Web
            </a>
        </div>
    </div>
</section>

</main>

<footer class="mt-8 border-t border-yellow-900/30 no-print">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 text-center">
        <p class="text-slate-500 text-xs mb-1">Propuesta elaborada por <span class="text-slate-300 font-medium">Creative Web</span> — <a href="https://creativeweb.com.ec" class="text-yellow-400 hover:text-yellow-300" target="_blank">creativeweb.com.ec</a></p>
        <p class="text-slate-600 text-[10px] font-mono">Mayo 2026 · Documento confidencial · Organización Intag Trail</p>
    </div>
</footer>

</body>
</html>
