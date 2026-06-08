<?php
session_start();
if (empty($_SESSION['auth_bionext_plan'])) {
    header('Location: login.php');
    exit;
}

// ============================================================
// PLAN EDITORIAL — 30 posts agrupados
// Sector: bioestimulantes y nutrición vegetal para agro Ecuador
// ============================================================
$grupos = [
    'A' => [
        'titulo' => 'A. Productos estrella Bionext',
        'desc' => 'Posts dedicados a posicionar los productos más buscados (CALCIO 21, POWER, SILICIO) en Google. Capturan al agricultor que ya conoce la marca pero busca información antes de comprar.',
        'color' => 'sky',
        'posts' => [
            [1, 'BIONEXT CALCIO 21: cuándo y cómo aplicarlo para corregir deficiencias de calcio', 'bionext calcio 21', 'productos', 'En el panel se registran 73 búsquedas del producto. Aún no hay una página que las atienda. Este post posiciona la palabra exacta del producto.'],
            [2, 'BIONEXT POWER: bioestimulante para sequía, heladas y estrés del cultivo', 'bionext power bioestimulante', 'productos', '60 búsquedas detectadas. Posicionar POWER como la solución cuando el cultivo está bajo estrés climático.'],
            [3, 'BIONEXT SILICIO: cómo fortalece paredes celulares y mejora resistencia a plagas', 'bionext silicio', 'productos', '59 búsquedas detectadas. Silicio es un mercado en crecimiento — pocos competidores en Ecuador hablan del tema.'],
            [4, 'Línea completa Bionext: qué producto usar según la necesidad del cultivo', 'productos bionext', 'productos', 'Página resumen tipo "guía rápida" que enlaza a cada producto individual. Captura búsqueda de marca general.'],
            [5, 'Cómo combinar productos Bionext en un plan de nutrición completo', 'plan nutricion vegetal', 'productos', 'Posicionamiento como asesor técnico, no solo vendedor. Da más valor al ticket promedio del cliente.'],
        ],
    ],
    'B' => [
        'titulo' => 'B. Cultivos clave de Ecuador',
        'desc' => 'Posts hiper-específicos por cultivo. Cada uno ataca búsquedas reales que hacen los agricultores de cada zona del país.',
        'color' => 'emerald',
        'posts' => [
            [6, 'Bioestimulantes para rosas en Cayambe: nutrición que aumenta tallos exportables', 'bioestimulantes rosas cayambe', 'cultivos', 'Cayambe es la zona florícola con más visitantes detectados (24). Captura el mercado de la exportación de rosas.'],
            [7, 'Bioestimulantes para papa en la sierra ecuatoriana: rendimiento por hectárea', 'bioestimulantes papa ecuador', 'cultivos', 'Papa es el cultivo más extendido en sierra. Búsqueda con alta intención de compra.'],
            [8, 'Bioestimulantes para banano en costa ecuatoriana: peso y calidad de racimo', 'bioestimulantes banano', 'cultivos', 'Banano es el mayor producto agrícola de exportación de Ecuador. Mercado masivo, competencia con multinacionales.'],
            [9, 'Nutrición foliar para hortalizas: brócoli, lechuga, tomate y pimiento', 'nutricion foliar hortalizas', 'cultivos', 'Hortalizas tienen ciclos cortos — el agricultor busca soluciones rápidas. Alta frecuencia de aplicación.'],
            [10, 'Bioestimulantes para café especial en Ecuador: cómo mejorar el puntaje SCA', 'bioestimulantes cafe especial', 'cultivos', 'Café especial es un mercado premium en crecimiento. El precio por kilo justifica inversión en bioestimulantes.'],
            [11, 'Nutrición para aguacate hass en Imbabura y zona norte: cuajado y calibre', 'aguacate hass nutricion', 'cultivos', 'Aguacate hass es la apuesta nueva del agro ecuatoriano. Pocos competidores en SEO local.'],
        ],
    ],
    'C' => [
        'titulo' => 'C. Problemas técnicos comunes',
        'desc' => 'Posts que atacan búsquedas de problema: el agricultor que ve un síntoma en su cultivo y busca solución en Google. Alta intención de compra.',
        'color' => 'amber',
        'posts' => [
            [12, 'Deficiencia de calcio en rosas: síntomas, causas y cómo corregirla', 'deficiencia calcio rosas', 'problemas', 'Búsqueda con alta intención — el agricultor ya vio el síntoma en su cultivo. Conecta directo con CALCIO 21.'],
            [13, 'Suelos ácidos en Ecuador: cómo corregirlos sin destruir la microbiología', 'suelos acidos correccion', 'problemas', 'Problema típico de sierra ecuatoriana. Posicionamiento técnico para agricultor experimentado.'],
            [14, 'Estrés hídrico: cómo proteger el cultivo cuando llueve poco', 'estres hidrico cultivos', 'problemas', 'Tema de actualidad por sequías cíclicas en Ecuador. Conecta directo con BIONEXT POWER.'],
            [15, 'Botrytis y oidio en rosas: prevenir con nutrición fuerte, no solo con fungicida', 'botrytis rosas prevencion', 'problemas', 'Enfoque integrador (no solo fungicida) — diferencia frente a competidores que solo venden químico.'],
            [16, 'Caída prematura de fruta en mandarina y naranja: causas nutricionales', 'caida fruta mandarina', 'problemas', 'Producción cítricos en costa ecuatoriana. El agricultor pierde ingresos directos — alta urgencia de compra.'],
            [17, 'Pudrición apical en tomate: el rol del calcio en el cuajado', 'pudricion apical tomate', 'problemas', 'Problema clásico de tomate. Conecta directo con CALCIO 21.'],
        ],
    ],
    'D' => [
        'titulo' => 'D. Educación técnica (autoridad y confianza)',
        'desc' => 'Posts que educan al agricultor sobre conceptos básicos. Generan autoridad y confianza. El que aprende con Bionext, compra a Bionext.',
        'color' => 'teal',
        'posts' => [
            [18, '¿Qué es un bioestimulante? Diferencia con fertilizante y abono', 'que es bioestimulante', 'educacion', 'Búsqueda de top funnel con volumen alto. Captura al agricultor que recién empieza a investigar el tema.'],
            [19, 'Quelatos vs sulfatos: cuál se absorbe mejor por la planta', 'quelatos vs sulfatos', 'educacion', 'Pregunta técnica frecuente. Diferenciador para quien quiere mejor absorción (el cliente más sofisticado).'],
            [20, 'pH del suelo: cómo medirlo y por qué cambia todo el resultado del cultivo', 'ph del suelo', 'educacion', 'Base de cualquier programa de nutrición. Post largo, completo, autoridad técnica.'],
            [21, 'Nutrición foliar vs nutrición edáfica: cuándo cada una', 'nutricion foliar vs edafica', 'educacion', 'Decisión típica del ingeniero agrónomo. Post comparativo con alta intención técnica.'],
            [22, 'Análisis foliar: qué muestra y cómo interpretar el resultado', 'analisis foliar interpretacion', 'educacion', 'El agricultor exporta su muestra al laboratorio y no entiende el resultado. Post que se vuelve referencia.'],
        ],
    ],
    'E' => [
        'titulo' => 'E. Comparativos de decisión',
        'desc' => 'Posts que ayudan al agricultor a elegir entre opciones. Captura el momento "qué me conviene" antes de la compra.',
        'color' => 'violet',
        'posts' => [
            [23, 'Bioestimulante vs hormona vegetal: cuándo aplicar cada uno', 'bioestimulante vs hormona', 'comparativos', 'Confusión común que aprovechamos para mostrar criterio técnico.'],
            [24, 'Bioestimulantes orgánicos vs sintéticos: qué exige el mercado de exportación', 'bioestimulantes organicos sinteticos', 'comparativos', 'Exportadores buscan residuo cero. Post ataca el segmento más rentable.'],
            [25, 'Aplicación foliar vs drench: cuál escoger para corregir deficiencia rápido', 'aplicacion foliar vs drench', 'comparativos', 'Decisión técnica concreta. Post práctico, no teoría.'],
            [26, 'Asesor agronómico vs consejo de vecino: cuándo conviene pagar por un técnico', 'asesor agronomico', 'comparativos', 'Posicionamiento de Bionext como aliado técnico, no solo proveedor.'],
        ],
    ],
    'F' => [
        'titulo' => 'F. Calendarios y guías prácticas',
        'desc' => 'Posts evergreen tipo "manual" — el agricultor los guarda y vuelve a consultarlos. Generan tráfico recurrente.',
        'color' => 'rose',
        'posts' => [
            [27, 'Calendario de aplicaciones para rosas: mes a mes durante 12 meses', 'calendario nutricion rosas', 'calendarios', 'Post pillar — muy largo, completo, se vuelve referencia del sector florícola.'],
            [28, 'Calendario de fertilización para papa: de siembra a cosecha', 'calendario fertilizacion papa', 'calendarios', 'Manual práctico que se descarga y se imprime. Genera backlinks naturales.'],
            [29, 'Cómo armar un plan de nutrición personalizado para tu cultivo', 'plan nutricion cultivo', 'calendarios', 'Posiciona a Bionext como asesor. CTA fuerte a WhatsApp para diagnóstico personalizado.'],
            [30, 'Errores comunes al aplicar bioestimulantes y cómo evitarlos', 'errores aplicacion bioestimulantes', 'calendarios', 'Aprovecha el "miedo a equivocarse" del agricultor. Genera reputación de experticia.'],
        ],
    ],
];

$total_posts = 0;
foreach ($grupos as $g) $total_posts += count($g['posts']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Plan editorial 2026 — Bionext</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Outfit', 'sans-serif'] } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #f8fafc; }
.card-shadow { box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 4px 12px rgba(0,0,0,0.04); }
.brand-grad { background: linear-gradient(135deg, #0c4a6e 0%, #064e3b 100%); }
.brand-grad-soft { background: linear-gradient(135deg, #f0f9ff 0%, #f0fdf4 100%); }
input[type="radio"]:checked + label .checkbox-mark { background: #16a34a; border-color: #16a34a; }
.smooth-scroll { scroll-behavior: smooth; }
</style>
</head>
<body class="smooth-scroll">

<!-- HEADER -->
<header class="brand-grad text-white">
    <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div>
            <p class="text-sky-200 text-xs font-bold uppercase tracking-wider">Creative Web · SEO y Contenido</p>
            <h1 class="text-2xl md:text-3xl font-extrabold mt-1">Bionext</h1>
        </div>
        <a href="logout.php" class="text-sky-200 hover:text-white text-sm font-semibold">Salir →</a>
    </div>
</header>

<!-- HERO -->
<section class="brand-grad text-white pb-16 pt-4">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight">Plan editorial 2026</h2>
        <p class="text-sky-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
            30 artículos diseñados a partir de las búsquedas reales que hacen sus clientes en Google. Su aprobación nos permite arrancar la producción del primer mes.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <a href="#plan" class="px-6 py-3 bg-emerald-400 hover:bg-emerald-300 text-slate-900 rounded-xl font-bold text-sm">Revisar plan editorial →</a>
        </div>
    </div>
</section>

<!-- BASE DE LA PROPUESTA -->
<section class="max-w-6xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <p class="text-sky-700 font-bold text-sm uppercase tracking-wider mb-2">Cómo lo construimos</p>
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Cada post se basa en datos reales</h2>
        <p class="text-slate-600 mt-3 max-w-2xl mx-auto">No inventamos temas. Cada artículo ataca una búsqueda que ya está sucediendo en Google y aún no tiene respuesta clara en Ecuador.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-5">
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-sky-100 flex items-center justify-center mb-4">
                <span class="text-2xl font-extrabold text-sky-600">73</span>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">búsquedas de CALCIO 21</h3>
            <p class="text-slate-600 text-sm leading-relaxed">El producto más buscado de Bionext, sin contenido que lo respalde en Google. El primer post lo posiciona directo.</p>
        </div>
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center mb-4">
                <span class="text-2xl font-extrabold text-emerald-600">24</span>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">visitantes desde Cayambe</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Zona florícola — el primer post para rosas ya tiene mercado esperándolo.</p>
        </div>
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-4">
                <span class="text-2xl font-extrabold text-amber-600">9</span>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">ciudades + Bogotá</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Geografía confirmada de clientes potenciales. Cada cultivo apunta a una zona específica del país.</p>
        </div>
    </div>
</section>

<!-- DIVIDER -->
<div class="max-w-6xl mx-auto px-6"><div class="border-t border-slate-200"></div></div>

<!-- PLAN EDITORIAL -->
<section id="plan" class="max-w-6xl mx-auto px-6 py-16">
    <div class="text-center mb-10">
        <p class="text-sky-700 font-bold text-sm uppercase tracking-wider mb-2">Plan editorial 2026</p>
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">30 artículos propuestos</h2>
        <p class="text-slate-600 mt-3 max-w-2xl mx-auto">Marque <strong>SÍ</strong> en los artículos que quiere publicar y <strong>NO</strong> en los que no. Al final puede dejar comentarios y enviar todo.</p>
    </div>

    <form method="POST" action="enviar.php" class="space-y-12">

    <?php foreach ($grupos as $key => $grupo): ?>
    <div class="space-y-4">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-<?= $grupo['color'] ?>-500 flex items-center justify-center text-white font-extrabold text-lg"><?= $key ?></div>
            <div>
                <h3 class="text-xl font-extrabold text-slate-900"><?= $grupo['titulo'] ?></h3>
                <p class="text-slate-600 text-sm"><?= $grupo['desc'] ?></p>
            </div>
        </div>

        <?php foreach ($grupo['posts'] as $p): list($num, $titulo, $kw, $cat, $razon) = $p; ?>
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-sky-300 hover:shadow-md transition">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center font-bold text-slate-600"><?= $num ?></div>

                <div class="flex-1 min-w-0">
                    <h4 class="font-bold text-slate-900 text-base leading-snug"><?= htmlspecialchars($titulo) ?></h4>
                    <div class="flex flex-wrap gap-2 mt-2 mb-3">
                        <span class="px-2 py-0.5 bg-<?= $grupo['color'] ?>-50 text-<?= $grupo['color'] ?>-700 text-xs font-semibold rounded-full"><?= htmlspecialchars($cat) ?></span>
                        <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs font-medium rounded-full">Búsqueda: <?= htmlspecialchars($kw) ?></span>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed"><?= htmlspecialchars($razon) ?></p>
                </div>

                <div class="flex-shrink-0 flex gap-2">
                    <input type="radio" name="post_<?= $num ?>" id="post_<?= $num ?>_si" value="si" class="sr-only peer/si" checked>
                    <label for="post_<?= $num ?>_si" class="cursor-pointer">
                        <div class="px-4 py-2 rounded-lg border-2 border-slate-200 text-slate-500 text-xs font-bold hover:border-emerald-400 hover:text-emerald-600 peer-checked/si:bg-emerald-500 peer-checked/si:text-white peer-checked/si:border-emerald-500 transition">SÍ</div>
                    </label>
                    <input type="radio" name="post_<?= $num ?>" id="post_<?= $num ?>_no" value="no" class="sr-only peer/no">
                    <label for="post_<?= $num ?>_no" class="cursor-pointer">
                        <div class="px-4 py-2 rounded-lg border-2 border-slate-200 text-slate-500 text-xs font-bold hover:border-red-400 hover:text-red-600 peer-checked/no:bg-red-500 peer-checked/no:text-white peer-checked/no:border-red-500 transition">NO</div>
                    </label>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>

    <!-- COMENTARIOS -->
    <div class="bg-slate-50 rounded-2xl p-8">
        <h3 class="text-xl font-extrabold text-slate-900 mb-2">Comentarios, cambios o sugerencias</h3>
        <p class="text-slate-600 text-sm mb-4">Si quiere agregar un tema que no está, cambiar un título, o dar instrucciones específicas para algún cultivo o producto, escríbalo aquí.</p>
        <textarea name="comentarios" rows="6" placeholder="Por ejemplo: 'Quiero un post de bioestimulantes para palma africana', o 'En el post 6 enfocar también en Pedro Moncayo', o 'No mencionar precios en ningún post', etc."
            class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-900 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200"></textarea>
    </div>

    <!-- DATOS -->
    <div class="bg-white border-2 border-sky-200 rounded-2xl p-8">
        <h3 class="text-xl font-extrabold text-slate-900 mb-4">Datos de quien aprueba</h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Nombre</label>
                <input type="text" name="nombre" required placeholder="Nombre y apellido"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-900 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Email (para recibir copia)</label>
                <input type="email" name="email" required placeholder="correo@bionext.com"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-900 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
            </div>
        </div>
    </div>

    <!-- ENVIAR -->
    <div class="text-center pt-4">
        <button type="submit"
            class="px-12 py-5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-extrabold text-lg shadow-xl hover:shadow-2xl transition-all">
            ✓ Enviar aprobación a Creative Web
        </button>
        <p class="text-slate-500 text-xs mt-4">Su decisión llega por correo al equipo de Creative Web. Una copia se envía también a su email.</p>
    </div>

    </form>
</section>

<!-- FOOTER -->
<footer class="brand-grad text-white mt-16">
    <div class="max-w-6xl mx-auto px-6 py-8 text-center">
        <p class="text-sky-200 text-sm">Plan editorial desarrollado por <strong class="text-white">Creative Web</strong></p>
        <p class="text-sky-300/70 text-xs mt-2">Basado en datos reales de búsquedas en Google de los clientes de Bionext</p>
    </div>
</footer>

</body>
</html>
