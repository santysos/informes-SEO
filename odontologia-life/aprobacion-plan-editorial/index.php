<?php
session_start();
if (empty($_SESSION['auth_olife_plan'])) {
    header('Location: login.php');
    exit;
}

// ============================================================
// PLAN EDITORIAL — 30 posts agrupados
// ============================================================
$grupos = [
    'A' => [
        'titulo' => 'A. Hyper-local + servicios específicos',
        'desc' => 'Posts con foco SEO local fuerte: Otavalo, Cotacachi, Atuntaqui, Ibarra. Captura búsquedas tipo "dentista cerca de mí".',
        'color' => 'emerald',
        'posts' => [
            [1, 'Implantes dentales en Otavalo: tipos, marcas y opciones de financiamiento', 'implantes dentales otavalo', 'implantología', 'El query "cuanto cuesta un implante dental en Ecuador" tiene 366 imp/mes. Versión LOCAL Otavalo captura conversiones de Imbabura que actualmente van a Quito.'],
            [2, 'Brackets en Otavalo: opciones reales de ortodoncia (metálicos, estéticos, invisibles)', 'brackets otavalo', 'ortodoncia', 'Queries de brackets tienen alta intención. Comparativa de los 3 tipos en formato tabla.'],
            [3, 'Limpieza dental en Otavalo: qué incluye y cuántas veces al año conviene', 'limpieza dental otavalo', 'servicios generales', 'Servicio puerta de entrada al paciente nuevo. Búsqueda mensual reiterada.'],
            [4, 'Extracción de muelas en Otavalo: cuándo se necesita y proceso completo', 'extraccion muela otavalo', 'cirugía maxilofacial', 'Cirugía maxilofacial solo tiene 2 posts — gap claro. Combina urgencia + local.'],
            [5, 'Endodoncia en Otavalo: cuántas citas se necesitan y qué esperar', 'endodoncia otavalo', 'endodoncia', 'Localizar la versión Ecuador existente para Imbabura específicamente.'],
            [6, 'Dentista de urgencia en Otavalo: qué hacer fuera de horarios de oficina', 'dentista urgencia otavalo', 'servicios generales', 'Servicio de altísima conversión — quien tiene dolor llama de inmediato.'],
            [7, 'Ortodoncista en Otavalo: cómo elegir y qué preguntar antes de iniciar', 'ortodoncista otavalo', 'ortodoncia', 'Captura intención de búsqueda "ortodoncista cerca de mí".'],
            [8, 'Odontopediatra en Ibarra y Otavalo: lo que un papá debería preguntar antes', 'odontopediatra ibarra otavalo', 'odontopediatría', 'Doble geo (Ibarra + Otavalo). Las mamás de Ibarra (200K hab) buscan esto.'],
            [9, 'Implantes dentales en Cotacachi: la clínica a la que llaman los cotacacheños', 'implantes dentales cotacachi', 'implantología', 'Cotacachi (18K hab) tiene baja competencia local. Capturar 100% del search local.'],
            [10, 'Limpieza dental en Atuntaqui: por qué los atuntaqueños vienen a Odontología Life', 'limpieza dental atuntaqui', 'prevención', 'Atuntaqui (20 min de Otavalo) con competencia local débil.'],
        ],
    ],
    'B' => [
        'titulo' => 'B. Comparativos de decisión',
        'desc' => 'Posts que ayudan al paciente a decidir entre opciones. Captura el momento "qué me conviene" antes de la cita.',
        'color' => 'cyan',
        'posts' => [
            [11, 'Carillas de porcelana en Ecuador: casos antes/después y duración real', 'carillas porcelana ecuador', 'estética dental', 'Estética con alta búsqueda pero baja claridad de opciones reales.'],
            [12, 'Ortodoncia invisible (alineadores) en Ecuador: cuándo conviene vs brackets', 'ortodoncia invisible ecuador', 'ortodoncia', 'Categoría joven con búsqueda creciente. Pacientes adultos.'],
            [13, 'Prótesis fija vs prótesis removible: cuál te conviene según tu caso', 'protesis fija vs removible', 'rehabilitación oral', 'Pacientes mayores buscan esta comparación antes de decidir.'],
            [14, 'Resina dental vs porcelana: cuál carilla elegir según tu necesidad', 'resina vs porcelana dental', 'estética dental', 'Decisión típica que pacientes preguntan en consulta.'],
            [15, 'Brackets estéticos: cuándo vale la pena pagar más que los metálicos', 'brackets esteticos', 'ortodoncia', 'Pregunta frecuente sin post dedicado actualmente.'],
        ],
    ],
    'C' => [
        'titulo' => 'C. Urgencias y emergencias',
        'desc' => 'Posts de alta conversión. Pacientes con dolor que deciden rápido.',
        'color' => 'rose',
        'posts' => [
            [16, 'Dolor de muela del juicio: cómo aliviar antes de poder ir al dentista', 'dolor muela del juicio', 'servicios generales', 'Búsqueda con altísima intención. Paciente con dolor decide en minutos.'],
            [17, 'Diente roto o fracturado: qué hacer en las primeras 2 horas', 'diente roto que hacer', 'servicios generales', 'Captura pacientes en momento crítico. Las primeras 2 horas determinan si se salva el diente.'],
            [18, 'Sangrado de encías al cepillarse: cuándo es normal y cuándo no', 'sangrado encias', 'periodoncia', 'Periodoncia solo tiene 3 posts. Diagnóstico → cita.'],
        ],
    ],
    'D' => [
        'titulo' => 'D. Familia, embarazo y adultos',
        'desc' => 'Posts dirigidos a segmentos específicos para fidelización a largo plazo.',
        'color' => 'violet',
        'posts' => [
            [19, 'Primera visita al dentista del bebé: cuándo llevarlo y qué esperar', 'primera visita dentista bebe', 'odontopediatría', 'Mamás buscan esto. Alta conversión a paciente recurrente (el bebé vuelve cada 6 meses por 15 años).'],
            [20, 'Brackets para adultos en Ecuador: ¿es tarde para enderezar mis dientes?', 'brackets para adultos ecuador', 'ortodoncia', 'Adultos 35+ que no se trataron antes. Tratamiento de alto valor.'],
            [21, 'Cuidado dental en el embarazo: qué procedimientos son seguros y cuáles no', 'dentista embarazo', 'odontopediatría', 'Embarazadas tienen miedo. Post genera confianza y conversión.'],
        ],
    ],
    'E' => [
        'titulo' => 'E. Long-tail informativo (autoridad temática)',
        'desc' => 'Posts educativos que construyen autoridad en Google y captan tráfico estable a largo plazo.',
        'color' => 'amber',
        'posts' => [
            [22, 'Implante dental vs puente fijo: cuál conviene según tu caso', 'implante dental vs puente', 'implantología', 'Decisión típica. Perfil de alto valor económico.'],
            [23, 'Coronas dentales en Ecuador: porcelana, zirconio o metal porcelana', 'coronas dentales ecuador', 'rehabilitación oral', 'Coronas tiene búsqueda pero 0 posts dedicados.'],
            [24, 'Mal aliento crónico (halitosis): causas reales y cuándo es síntoma de algo serio', 'mal aliento halitosis', 'prevención', 'Problema social. Búsqueda anónima, conversión silenciosa.'],
            [25, 'Empastes dentales: cuándo se cambian y por qué se ennegrecen con el tiempo', 'empastes dentales', 'tratamientos', 'Reactivar pacientes con empastes viejos.'],
            [26, 'Bruxismo: por qué aprietas los dientes por la noche y cómo tratarlo', 'bruxismo tratamiento', 'tratamientos', 'Tratamiento con férula = conversión directa.'],
            [27, 'Sensibilidad dental: por qué pasa y qué hacer en casa antes de ir al dentista', 'sensibilidad dental', 'prevención', 'Problema común con búsqueda mensual constante.'],
            [28, 'Manchas en los dientes: cuáles se quitan con limpieza y cuáles con blanqueamiento', 'manchas en los dientes', 'estética dental', 'Pre-consulta de blanqueamiento. Alta conversión al servicio.'],
            [29, 'Empaste vs endodoncia: cuándo basta con uno y cuándo se necesita el otro', 'empaste vs endodoncia', 'endodoncia', 'Diferenciación que aclara dudas antes de cita.'],
            [30, 'Dentadura postiza: tipos disponibles y cuál se ve más natural', 'dentadura postiza', 'rehabilitación oral', 'Adultos mayores de Imbabura buscan esto sin alternativa local clara.'],
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
<title>Plan editorial 2026 — Odontología Life</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'] } } } }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Inter', sans-serif; }
body { background: #f8fafc; }
.card-shadow { box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 4px 12px rgba(0,0,0,0.04); }
.brand-grad { background: linear-gradient(135deg, #042f2e 0%, #115e59 50%, #14b8a6 100%); }
input[type="checkbox"]:checked + label .checkbox-mark { background: #14b8a6; border-color: #14b8a6; }
input[type="checkbox"]:checked + label .checkbox-mark svg { opacity: 1; }
input[type="checkbox"][value="no"]:checked + label .checkbox-mark { background: #ef4444; border-color: #ef4444; }
.fade-in { animation: fadeIn 0.4s ease-out forwards; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
.smooth-scroll { scroll-behavior: smooth; }
</style>
</head>
<body class="smooth-scroll">

<!-- HEADER -->
<header class="brand-grad text-white">
    <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div>
            <p class="text-teal-200 text-xs font-bold uppercase tracking-wider">Creative Web · SEO & Contenido</p>
            <h1 class="text-2xl md:text-3xl font-extrabold mt-1">Odontología Life</h1>
        </div>
        <a href="logout.php" class="text-teal-200 hover:text-white text-sm font-semibold">Salir →</a>
    </div>
</header>

<!-- HERO -->
<section class="brand-grad text-white pb-16 pt-4">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight">Plan editorial 2026</h2>
        <p class="text-teal-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
            30 posts nuevos diseñados a partir de los datos reales de Google. Su aprobación nos permite arrancar la siguiente fase de contenido.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <a href="#trabajo" class="px-6 py-3 bg-white/10 hover:bg-white/15 border border-white/20 rounded-xl font-semibold text-sm">Ver trabajo realizado</a>
            <a href="#plan" class="px-6 py-3 bg-teal-400 hover:bg-teal-300 text-slate-900 rounded-xl font-bold text-sm">Aprobar plan editorial →</a>
        </div>
    </div>
</section>

<!-- TRABAJO REALIZADO -->
<section id="trabajo" class="max-w-6xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <p class="text-teal-600 font-bold text-sm uppercase tracking-wider mb-2">Marzo - Junio 2026</p>
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Trabajo SEO realizado</h2>
        <p class="text-slate-600 mt-3 max-w-2xl mx-auto">Resumen del trabajo de los últimos 3 meses antes del lanzamiento de la fase de contenido nuevo.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
        <!-- Card 1: Auditoría -->
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">Auditoría SEO completa</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Análisis de los 53 posts publicados, identificación de 34 con tráfico orgánico y 19 sin impresiones. Priorización por impacto.</p>
            <div class="mt-4 text-2xl font-extrabold text-emerald-600">53 <span class="text-sm text-slate-500 font-medium">posts analizados</span></div>
        </div>

        <!-- Card 2: Rewrites Yoast -->
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-cyan-100 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">Optimización de títulos y descripciones</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Reescritura de los 8 posts con más impresiones para subir el porcentaje de clics. Aplicado y verificado en Google.</p>
            <div class="mt-4 text-2xl font-extrabold text-cyan-600">8 <span class="text-sm text-slate-500 font-medium">posts optimizados</span></div>
        </div>

        <!-- Card 3: Fotos -->
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-violet-100 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">Subida de fotos del consultorio</h3>
            <p class="text-slate-600 text-sm leading-relaxed">52 fotos del consultorio, equipo y procedimientos optimizadas a formato WebP y subidas a la web con nombres optimizados para Google.</p>
            <div class="mt-4 text-2xl font-extrabold text-violet-600">52 <span class="text-sm text-slate-500 font-medium">fotos subidas</span></div>
        </div>

        <!-- Card 4: Configuración técnica -->
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">Configuración técnica del sitio</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Instalación de herramientas para que Google entienda mejor la web y plugin para gestionar el SEO desde nuestra herramienta.</p>
            <div class="mt-4 text-2xl font-extrabold text-amber-600">100% <span class="text-sm text-slate-500 font-medium">listo</span></div>
        </div>

        <!-- Card 5: Análisis datos -->
        <div class="bg-white card-shadow rounded-2xl p-6 border border-slate-100">
            <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 00-4-4H3v6h2a4 4 0 004 4h0M9 17a4 4 0 014-4h2v6h-2a4 4 0 01-4-4v0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v6m0 0l-3-3m3 3l3-3"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">Análisis de Google Analytics</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Revisión de 1.454 búsquedas reales de pacientes que llegaron a la web. Identificación de temas con demanda no atendida.</p>
            <div class="mt-4 text-2xl font-extrabold text-rose-600">1.454 <span class="text-sm text-slate-500 font-medium">búsquedas analizadas</span></div>
        </div>

        <!-- Card 6: Plan editorial -->
        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 border-2 border-teal-300 card-shadow rounded-2xl p-6">
            <div class="w-12 h-12 rounded-xl bg-teal-500 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 mb-2">Plan editorial — pendiente aprobación</h3>
            <p class="text-slate-700 text-sm leading-relaxed">30 posts nuevos planificados con foco SEO local. Aprobación necesaria para arrancar la siguiente fase.</p>
            <a href="#plan" class="mt-4 inline-flex items-center gap-1 text-teal-700 font-bold text-sm hover:text-teal-800">Ver y aprobar abajo →</a>
        </div>
    </div>

    <!-- Resumen métricas -->
    <div class="mt-12 brand-grad rounded-3xl p-8 md:p-12 text-white">
        <h3 class="text-2xl font-extrabold mb-6 text-center">Resultados a marzo - mayo 2026</h3>
        <div class="grid md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="text-4xl font-extrabold text-teal-300">402</div>
                <p class="text-teal-100 text-sm mt-1">Clics desde Google</p>
            </div>
            <div>
                <div class="text-4xl font-extrabold text-teal-300">31.669</div>
                <p class="text-teal-100 text-sm mt-1">Impresiones en Google</p>
            </div>
            <div>
                <div class="text-4xl font-extrabold text-teal-300">380</div>
                <p class="text-teal-100 text-sm mt-1">Usuarios al sitio</p>
            </div>
            <div>
                <div class="text-4xl font-extrabold text-teal-300">53</div>
                <p class="text-teal-100 text-sm mt-1">Artículos publicados</p>
            </div>
        </div>
        <p class="text-teal-200 text-sm text-center mt-6 max-w-2xl mx-auto">El post de implantes dentales por sí solo generó <strong class="text-white">274 clics</strong> en 90 días. Es nuestro mejor contenido y prueba que la estrategia funciona.</p>
    </div>
</section>

<!-- DIVIDER -->
<div class="max-w-6xl mx-auto px-6">
    <div class="border-t border-slate-200"></div>
</div>

<!-- PLAN EDITORIAL — APROBACIÓN -->
<section id="plan" class="max-w-6xl mx-auto px-6 py-16">
    <div class="text-center mb-10">
        <p class="text-teal-600 font-bold text-sm uppercase tracking-wider mb-2">Plan editorial 2026</p>
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">30 posts propuestos</h2>
        <p class="text-slate-600 mt-3 max-w-2xl mx-auto">Marque con una tilde los posts que quiere aprobar. Los marcados con "No" o sin marcar no se publicarán. Al final puede dejar comentarios y enviar todo.</p>
    </div>

    <form method="POST" action="enviar.php" class="space-y-12">

    <?php foreach ($grupos as $key => $grupo): ?>
    <div class="space-y-4">
        <!-- Grupo Header -->
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-<?= $grupo['color'] ?>-500 flex items-center justify-center text-white font-extrabold text-lg"><?= $key ?></div>
            <div>
                <h3 class="text-xl font-extrabold text-slate-900"><?= $grupo['titulo'] ?></h3>
                <p class="text-slate-600 text-sm"><?= $grupo['desc'] ?></p>
            </div>
        </div>

        <?php foreach ($grupo['posts'] as $p): list($num, $titulo, $kw, $cat, $razon) = $p; ?>
        <!-- Post Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-teal-300 hover:shadow-md transition">
            <div class="flex items-start gap-4">
                <!-- Número -->
                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center font-bold text-slate-600"><?= $num ?></div>

                <!-- Contenido -->
                <div class="flex-1 min-w-0">
                    <h4 class="font-bold text-slate-900 text-base leading-snug"><?= htmlspecialchars($titulo) ?></h4>
                    <div class="flex flex-wrap gap-2 mt-2 mb-3">
                        <span class="px-2 py-0.5 bg-<?= $grupo['color'] ?>-50 text-<?= $grupo['color'] ?>-700 text-xs font-semibold rounded-full"><?= htmlspecialchars($cat) ?></span>
                        <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs font-medium rounded-full">Palabra clave: <?= htmlspecialchars($kw) ?></span>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed"><?= htmlspecialchars($razon) ?></p>
                </div>

                <!-- Aprobación radio buttons -->
                <div class="flex-shrink-0 flex gap-2">
                    <!-- SI -->
                    <input type="radio" name="post_<?= $num ?>" id="post_<?= $num ?>_si" value="si" class="sr-only peer/si" checked>
                    <label for="post_<?= $num ?>_si" class="cursor-pointer">
                        <div class="px-4 py-2 rounded-lg border-2 border-slate-200 text-slate-500 text-xs font-bold hover:border-emerald-400 hover:text-emerald-600 peer-checked/si:bg-emerald-500 peer-checked/si:text-white peer-checked/si:border-emerald-500 transition">SÍ</div>
                    </label>
                    <!-- NO -->
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
        <h3 class="text-xl font-extrabold text-slate-900 mb-2">Comentarios y sugerencias</h3>
        <p class="text-slate-600 text-sm mb-4">Si quiere agregar algún post que no está, sugerir cambios de título, o dar instrucciones específicas, escríbalo aquí.</p>
        <textarea name="comentarios" rows="6" placeholder="Por ejemplo: 'Quiero un post de coronas en zirconio', o 'Cambien el título del post 12 a...', o 'No publicar ninguno con la palabra X', etc."
            class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-900 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200"></textarea>
    </div>

    <!-- DATOS DEL DR. -->
    <div class="bg-white border-2 border-teal-200 rounded-2xl p-8">
        <h3 class="text-xl font-extrabold text-slate-900 mb-4">Datos del doctor</h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Nombre</label>
                <input type="text" name="dr_nombre" required placeholder="Dr. Edison Andrade"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-900 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Email (para recibir copia)</label>
                <input type="email" name="dr_email" required placeholder="email@ejemplo.com"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-900 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-200">
            </div>
        </div>
    </div>

    <!-- ENVIAR -->
    <div class="text-center pt-4">
        <button type="submit"
            class="px-12 py-5 bg-teal-500 hover:bg-teal-600 text-white rounded-2xl font-extrabold text-lg shadow-xl hover:shadow-2xl transition-all">
            ✓ Enviar aprobación a Creative Web
        </button>
        <p class="text-slate-500 text-xs mt-4">Su aprobación llegará por email al equipo de Creative Web. Una copia se envía también a su email.</p>
    </div>

    </form>
</section>

<!-- FOOTER -->
<footer class="brand-grad text-white mt-16">
    <div class="max-w-6xl mx-auto px-6 py-8 text-center">
        <p class="text-teal-200 text-sm">Plan editorial desarrollado por <strong class="text-white">Creative Web</strong></p>
        <p class="text-teal-300/70 text-xs mt-2">Basado en datos reales de Google Search Console y Google Analytics — Periodo marzo a mayo 2026</p>
    </div>
</footer>

</body>
</html>
