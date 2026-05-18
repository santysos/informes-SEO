<?php
/**
 * Media Kit / Dossier de Auspicios — Organización Reina de Otavalo 2026
 *
 * Landing pública dirigida a empresas potenciales auspiciantes.
 * Auditoría, métricas, diseño y desarrollo: Creative Web (creativeweb.com.ec).
 *
 * NOTA: las cifras marcadas como [PLACEHOLDER] deben reemplazarse con datos
 * reales exportados desde Meta Business Suite (FB + IG) antes de publicar.
 */

$ANIO          = 2026;
$ORG           = "Organización Reina de Otavalo";
$EVENTO        = "Elección y Coronación de la Reina de Otavalo " . $ANIO;
$FECHA_EVENTO  = "Por confirmar — Septiembre " . $ANIO; // Reemplazar con fecha exacta
$WHATSAPP      = "593999999999";   // Reemplazar con WhatsApp oficial de la organización
$CORREO        = "auspicios@reinadeotavalo.org"; // Reemplazar con correo oficial
$IG_URL        = "https://www.instagram.com/org.reinadeotavalo/";
$FB_URL        = "https://www.facebook.com/org.reinadeotavalo";
$CW_URL        = "https://creativeweb.com.ec";
$PDF           = "pdf/media-kit-reina-otavalo-2026.pdf";

// === MÉTRICAS (reemplazar con datos reales Meta Business Suite, últimos 90 días) ===
$ig = [
  'followers'        => 8420,
  'reach_90d'        => 145000,
  'impressions_90d'  => 312000,
  'engagement_rate'  => 6.4,   // %
  'avg_likes'        => 285,
  'avg_comments'     => 22,
  'growth_12m'       => 47,    // % crecimiento anual
];
$fb = [
  'followers'        => 12750,
  'reach_90d'        => 198000,
  'impressions_90d'  => 425000,
  'engagement_rate'  => 4.1,
  'avg_reactions'    => 410,
  'avg_shares'       => 38,
  'growth_12m'       => 22,
];
$consolidado = [
  'audiencia_unica'  => 18500,   // estimación de audiencia única IG+FB
  'alcance_total'    => 343000,
  'impresiones'      => 737000,
];

// Demografía (de Meta Insights — placeholder)
$demo_genero  = ['mujeres' => 64, 'hombres' => 36];
$demo_edad    = [
  '18-24' => 18,
  '25-34' => 34,
  '35-44' => 26,
  '45-54' => 14,
  '55+'   => 8,
];
$demo_ciudades = [
  'Otavalo'    => 41,
  'Quito'      => 19,
  'Ibarra'     => 12,
  'Cotacachi'  => 8,
  'Atuntaqui'  => 6,
  'Cayambe'    => 5,
  'Otras'      => 9,
];

// Crecimiento mensual de seguidores últimos 12 meses (placeholder)
$crecimiento = [
  'Jun' => 7800, 'Jul' => 8050, 'Ago' => 8400, 'Sep' => 9100,
  'Oct' => 9650, 'Nov' => 10200,'Dic' => 10650,'Ene' => 11050,
  'Feb' => 11400,'Mar' => 11900,'Abr' => 12350,'May' => 12750,
];

// Tiers de auspicio sugeridos
$tiers = [
  [
    'name' => 'Diamante',
    'price' => 1500,
    'cupos' => 2,
    'color' => 'from-indigo-700 to-indigo-900',
    'badge' => 'Auspicio principal',
    'benefits' => [
      'Logo en banner principal del escenario',
      'Mención dedicada en apertura y clausura del evento',
      'Video institucional de 30s en redes (IG + FB)',
      '4 publicaciones dedicadas en IG + FB (alcance estimado +50.000)',
      '2 stories destacadas durante toda la temporada',
      'Presencia con stand en el evento',
      'Mención en nota de prensa y entrevistas',
      'Logo grande en todas las piezas digitales',
    ],
  ],
  [
    'name' => 'Oro',
    'price' => 800,
    'cupos' => 4,
    'color' => 'from-amber-500 to-amber-700',
    'badge' => 'Más popular',
    'benefits' => [
      'Logo en banner secundario',
      'Mención en bloque agradecimientos del evento',
      '2 publicaciones dedicadas IG + FB',
      '1 Reel mención (alcance estimado +20.000)',
      '1 story destacada',
      'Presencia en evento (mesa institucional)',
      'Logo mediano en piezas digitales',
    ],
  ],
  [
    'name' => 'Plata',
    'price' => 400,
    'cupos' => 8,
    'color' => 'from-slate-400 to-slate-600',
    'badge' => '',
    'benefits' => [
      'Logo en grupo de auspiciantes oficiales',
      '1 publicación con mención IG + FB',
      'Banner digital durante evento',
      'Mención en stories de agradecimiento',
    ],
  ],
  [
    'name' => 'Bronce / Aliado',
    'price' => 150,
    'cupos' => 12,
    'color' => 'from-orange-700 to-red-900',
    'badge' => 'Canje posible',
    'benefits' => [
      'Logo en listado de aliados',
      'Story de agradecimiento conjunta',
      'Mención en sección de aliados de la web',
      'Posibilidad de canje por productos / servicios',
    ],
  ],
];

// Helpers
function num($n) { return number_format($n, 0, ',', '.'); }
function pct($n) { return number_format($n, 1, ',', '.'); }
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Media Kit — <?= $ORG ?> <?= $ANIO ?> · Oportunidades de Auspicio</title>
<meta name="description" content="Conecta tu marca con el corazón cultural de Otavalo. Audiencia <?= num($consolidado['audiencia_unica']) ?>+ entre Instagram y Facebook. Alcance trimestral <?= num($consolidado['alcance_total']) ?>. Dossier de auspicios <?= $EVENTO ?>.">
<meta name="author" content="Creative Web — creativeweb.com.ec">
<meta name="robots" content="index, follow">

<!-- Open Graph para WhatsApp / redes -->
<meta property="og:type" content="website">
<meta property="og:title" content="Auspicia la <?= $EVENTO ?>">
<meta property="og:description" content="Audiencia <?= num($consolidado['audiencia_unica']) ?>+ · Alcance trimestral <?= num($consolidado['alcance_total']) ?>. Conoce los paquetes de auspicio.">
<meta property="og:url" content="https://creativeweb.com.ec/informes/reina-de-otavalo/media-kit-2026/">
<meta property="og:image" content="assets/og-cover.jpg">
<meta property="og:locale" content="es_EC">
<meta name="twitter:card" content="summary_large_image">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          serif: ['"Playfair Display"', 'Georgia', 'serif'],
          sans:  ['Inter', 'system-ui', 'sans-serif'],
        },
        colors: {
          ivory:     '#FBF7F0',
          ink:       '#1F1A33',
          indigo700: '#1E40AF',
          indigoDeep:'#1E1B4B',
          anaco:     '#7C2D12',
          gold:      '#B45309',
          goldSoft:  '#F59E0B',
          mutedBg:   '#F1ECE2',
          mutedTxt:  '#6B6258',
          borderC:   '#E8DFCC',
        },
        boxShadow: {
          soft: '0 4px 14px -2px rgba(31, 26, 51, 0.08), 0 2px 6px -2px rgba(31, 26, 51, 0.04)',
          card: '0 8px 30px -10px rgba(30, 27, 75, 0.18)',
        },
      },
    },
  };
</script>

<style>
  html { scroll-behavior: smooth; }
  body { font-family: 'Inter', system-ui, sans-serif; background: #FBF7F0; color: #1F1A33; }
  h1,h2,h3,h4,.font-serif { font-family: 'Playfair Display', Georgia, serif; }

  /* Patrón textil sutil otavaleño en hero */
  .pattern-textil {
    background-image:
      linear-gradient(180deg, rgba(30,27,75,0.92) 0%, rgba(30,27,75,0.78) 100%),
      repeating-linear-gradient(45deg, rgba(245,158,11,0.06) 0 2px, transparent 2px 14px),
      repeating-linear-gradient(-45deg, rgba(180,83,9,0.05) 0 2px, transparent 2px 14px);
  }

  /* Divisor dorado */
  .gold-divider {
    height: 3px;
    background: linear-gradient(90deg, transparent 0%, #B45309 30%, #F59E0B 50%, #B45309 70%, transparent 100%);
    border: 0;
    width: 96px;
    margin: 12px 0;
  }
  .gold-divider.center { margin: 12px auto; }

  /* Tarjeta de métrica */
  .metric-card {
    background: #FFFFFF;
    border: 1px solid #E8DFCC;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 14px -2px rgba(31,26,51,0.06);
    transition: transform 200ms ease, box-shadow 200ms ease;
  }
  .metric-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px -8px rgba(30,27,75,0.16); }

  /* Botones */
  .btn { display:inline-flex; align-items:center; gap:.5rem; padding: .9rem 1.6rem; border-radius: 999px; font-weight:600; transition: all 200ms ease; cursor:pointer; }
  .btn-primary { background: #B45309; color: #FFFFFF; }
  .btn-primary:hover { background: #92400E; transform: translateY(-1px); box-shadow: 0 8px 20px -6px rgba(180,83,9,0.5); }
  .btn-outline { border: 1.5px solid rgba(255,255,255,0.6); color: #FFF; }
  .btn-outline:hover { background: rgba(255,255,255,0.1); border-color: #FFFFFF; }
  .btn-dark { background: #1E1B4B; color: #FFFFFF; }
  .btn-dark:hover { background: #2D2A6F; transform: translateY(-1px); }

  /* Tier card */
  .tier-card { background:#FFFFFF; border:1px solid #E8DFCC; border-radius: 20px; overflow: hidden; transition: all 200ms ease; }
  .tier-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px -12px rgba(30,27,75,0.22); }
  .tier-popular { border: 2px solid #B45309; transform: scale(1.02); }

  /* Chart watermark */
  .chart-wrap { position: relative; }
  .chart-wm {
    position: absolute; bottom: 8px; right: 14px;
    font-size: 10px; color: #94908A; letter-spacing: .04em;
    user-select: none; pointer-events: none; font-weight: 500;
  }

  /* Stat number */
  .stat-num {
    font-family: 'Playfair Display', Georgia, serif;
    font-weight: 700;
    font-size: clamp(2.2rem, 4vw, 3.4rem);
    line-height: 1;
    color: #1E1B4B;
    font-variant-numeric: tabular-nums;
  }

  /* Section spacing */
  section { padding: 64px 0; }
  @media (min-width: 768px) { section { padding: 96px 0; } }

  /* Accesibilidad focus */
  a:focus-visible, button:focus-visible { outline: 3px solid #F59E0B; outline-offset: 3px; border-radius: 8px; }

  /* Reduced motion */
  @media (prefers-reduced-motion: reduce) {
    * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
  }

  /* Print / PDF */
  @media print {
    .no-print { display: none !important; }
    section { padding: 24px 0; page-break-inside: avoid; }
    body { background: #FFF; }
    .pattern-textil { background: #1E1B4B !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  }
</style>
</head>
<body class="antialiased">

<!-- ============== NAV STICKY ============== -->
<nav class="no-print sticky top-0 z-50 backdrop-blur-md bg-ivory/85 border-b border-borderC">
  <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
    <a href="#top" class="flex items-center gap-3">
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-indigoDeep text-goldSoft font-serif text-lg font-bold">R</span>
      <span class="font-serif text-base sm:text-lg text-ink leading-tight">
        <span class="block font-semibold">Reina de Otavalo</span>
        <span class="block text-xs text-mutedTxt -mt-0.5">Media Kit · Auspicios <?= $ANIO ?></span>
      </span>
    </a>
    <div class="flex items-center gap-2 sm:gap-3">
      <a href="<?= $PDF ?>" class="hidden sm:inline-flex btn btn-dark text-sm py-2 px-4" download>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        PDF
      </a>
      <a href="https://wa.me/<?= $WHATSAPP ?>?text=Hola%2C%20me%20interesa%20auspiciar%20la%20Elección%20de%20la%20Reina%20de%20Otavalo%20<?= $ANIO ?>" target="_blank" rel="noopener" class="btn btn-primary text-sm py-2 px-4">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.3A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.78 12L4 20l4.13-1.23a7.93 7.93 0 0 0 3.92 1h0a7.94 7.94 0 0 0 5.55-13.47ZM12.05 18.4h0a6.58 6.58 0 0 1-3.36-.92l-.24-.14-2.45.73.73-2.39-.16-.25a6.58 6.58 0 1 1 12.22-3.47 6.58 6.58 0 0 1-6.74 6.44Zm3.61-4.93c-.2-.1-1.17-.58-1.35-.65s-.31-.1-.45.1-.51.65-.62.78-.23.15-.43.05a5.4 5.4 0 0 1-1.59-.98 6 6 0 0 1-1.1-1.37c-.12-.2 0-.3.09-.4a5.61 5.61 0 0 0 .47-.62.31.31 0 0 0 0-.31c0-.1-.45-1.09-.62-1.49s-.33-.34-.45-.34h-.38a.74.74 0 0 0-.54.25 2.27 2.27 0 0 0-.71 1.69 4 4 0 0 0 .83 2.09 8.92 8.92 0 0 0 3.45 3.05 12 12 0 0 0 1.15.43 2.77 2.77 0 0 0 1.27.08 2.07 2.07 0 0 0 1.36-.96 1.68 1.68 0 0 0 .12-.96c-.05-.1-.18-.15-.38-.25Z"/></svg>
        Auspiciar
      </a>
    </div>
  </div>
</nav>

<!-- ============== HERO ============== -->
<header id="top" class="pattern-textil text-ivory relative overflow-hidden">
  <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-goldSoft to-transparent"></div>

  <div class="max-w-6xl mx-auto px-6 py-20 md:py-28">
    <p class="text-goldSoft uppercase tracking-[0.3em] text-xs font-semibold mb-6">Media Kit · Auspicios <?= $ANIO ?></p>
    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl font-bold leading-[1.05] mb-6">
      Conecta tu marca con el<br>
      <span class="text-goldSoft">corazón cultural</span> de Otavalo
    </h1>
    <hr class="gold-divider">
    <p class="text-lg md:text-xl text-ivory/85 max-w-2xl leading-relaxed mb-10">
      La <strong class="font-semibold text-white"><?= $ORG ?></strong> reúne cada año a miles de personas alrededor de la identidad otavaleña.
      Conoce el alcance real, la audiencia y las oportunidades de auspicio para la <strong class="text-goldSoft"><?= $EVENTO ?></strong>.
    </p>

    <div class="flex flex-wrap gap-3 mb-12">
      <a href="https://wa.me/<?= $WHATSAPP ?>?text=Hola%2C%20me%20interesa%20conocer%20los%20paquetes%20de%20auspicio" target="_blank" rel="noopener" class="btn btn-primary">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.3A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.78 12L4 20l4.13-1.23a7.93 7.93 0 0 0 3.92 1h0a7.94 7.94 0 0 0 5.55-13.47Z"/></svg>
        Quiero auspiciar
      </a>
      <a href="<?= $PDF ?>" download class="btn btn-outline">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Descargar dossier en PDF
      </a>
    </div>

    <!-- Trust strip / números clave -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl">
      <div class="border-l-2 border-goldSoft pl-4">
        <p class="text-3xl md:text-4xl font-serif font-bold text-white"><?= num($consolidado['audiencia_unica']) ?>+</p>
        <p class="text-xs uppercase tracking-wider text-ivory/70 mt-1">Audiencia única IG + FB</p>
      </div>
      <div class="border-l-2 border-goldSoft pl-4">
        <p class="text-3xl md:text-4xl font-serif font-bold text-white"><?= num($consolidado['alcance_total']) ?></p>
        <p class="text-xs uppercase tracking-wider text-ivory/70 mt-1">Alcance último trimestre</p>
      </div>
      <div class="border-l-2 border-goldSoft pl-4">
        <p class="text-3xl md:text-4xl font-serif font-bold text-white"><?= pct($ig['engagement_rate']) ?>%</p>
        <p class="text-xs uppercase tracking-wider text-ivory/70 mt-1">Engagement Instagram</p>
      </div>
      <div class="border-l-2 border-goldSoft pl-4">
        <p class="text-3xl md:text-4xl font-serif font-bold text-white"><?= $ig['growth_12m'] ?>%</p>
        <p class="text-xs uppercase tracking-wider text-ivory/70 mt-1">Crecimiento anual IG</p>
      </div>
    </div>

    <p class="text-xs text-ivory/50 mt-8">Datos validados desde Meta Business Suite · Periodo: últimos 90 días</p>
  </div>

  <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-anaco to-transparent"></div>
</header>

<!-- ============== QUIÉNES SOMOS ============== -->
<section id="organizacion" class="bg-ivory">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-12 gap-10 md:gap-16 items-start">
      <div class="md:col-span-5">
        <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">La organización</p>
        <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight">Tradición que une<br>a la comunidad</h2>
        <hr class="gold-divider">
      </div>
      <div class="md:col-span-7 space-y-5 text-base md:text-lg text-ink/85 leading-relaxed">
        <p>La <strong>Organización Reina de Otavalo</strong> es un colectivo cultural que cada año celebra la identidad, la belleza y el rol de la mujer otavaleña a través de su elección y coronación.</p>
        <p>No es solamente un evento: es un puente entre <strong>tradición y comunidad</strong>, entre las generaciones de Imbabura y la diáspora otavaleña en Ecuador y el mundo. Las candidatas representan a sus barrios, comunidades y parroquias, y se convierten en embajadoras culturales durante todo el año.</p>
        <p>Auspiciar este evento es asociar tu marca a un símbolo de <strong>orgullo local</strong>, con presencia digital activa, cobertura mediática y un público profundamente comprometido con su cultura.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============== POR QUÉ AUSPICIARNOS ============== -->
<section id="por-que" class="bg-mutedBg">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">¿Por qué auspiciar?</p>
      <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight">4 razones que importan a tu marca</h2>
      <hr class="gold-divider center">
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Card 1 -->
      <article class="bg-white border border-borderC rounded-2xl p-7 shadow-soft hover:shadow-card transition">
        <div class="w-12 h-12 rounded-full bg-indigoDeep/10 flex items-center justify-center text-indigoDeep mb-5">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <h3 class="font-serif text-xl text-ink mb-2">Audiencia local cualificada</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Más del 60% de nuestro alcance está en Imbabura. Es una audiencia con poder de decisión local, lealtad de marca y conexión emocional.</p>
      </article>

      <!-- Card 2 -->
      <article class="bg-white border border-borderC rounded-2xl p-7 shadow-soft hover:shadow-card transition">
        <div class="w-12 h-12 rounded-full bg-anaco/10 flex items-center justify-center text-anaco mb-5">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 15.09 8.26 22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <h3 class="font-serif text-xl text-ink mb-2">Asociación con identidad y cultura</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Tu marca se vincula a un símbolo de orgullo otavaleño. Es comunicación con propósito, no publicidad invasiva.</p>
      </article>

      <!-- Card 3 -->
      <article class="bg-white border border-borderC rounded-2xl p-7 shadow-soft hover:shadow-card transition">
        <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold mb-5">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3 class="font-serif text-xl text-ink mb-2">Presencia digital + física</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Tu marca está en publicaciones, stories, reels, banners, escenario y prensa local. Una sola inversión, múltiples puntos de contacto.</p>
      </article>

      <!-- Card 4 -->
      <article class="bg-white border border-borderC rounded-2xl p-7 shadow-soft hover:shadow-card transition">
        <div class="w-12 h-12 rounded-full bg-indigo700/10 flex items-center justify-center text-indigo700 mb-5">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h3 class="font-serif text-xl text-ink mb-2">ROI medible</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Reportamos métricas reales post-evento: alcance de tu marca, interacciones generadas y valor publicitario equivalente (EAV).</p>
      </article>
    </div>
  </div>
</section>

<!-- ============== EVENTO ANCLA ============== -->
<section id="evento" class="bg-indigoDeep text-ivory relative overflow-hidden">
  <div class="absolute inset-0 opacity-30 pattern-textil"></div>
  <div class="max-w-6xl mx-auto px-6 relative">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div>
        <p class="text-goldSoft uppercase tracking-[0.25em] text-xs font-semibold">Evento principal</p>
        <h2 class="font-serif text-4xl md:text-5xl font-bold mt-3 leading-tight"><?= $EVENTO ?></h2>
        <hr class="gold-divider">
        <p class="text-ivory/85 mt-4 text-lg leading-relaxed">
          El momento de mayor visibilidad anual de la organización. Coronación oficial, presentación de candidatas, cobertura de medios locales y nacionales, y celebración cultural con la comunidad.
        </p>
      </div>
      <div class="bg-white/10 border border-white/15 rounded-2xl p-7 backdrop-blur-sm">
        <dl class="space-y-5">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-full bg-goldSoft/20 text-goldSoft flex items-center justify-center shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div>
              <dt class="text-xs uppercase tracking-wider text-ivory/60">Fecha</dt>
              <dd class="font-serif text-xl mt-0.5"><?= $FECHA_EVENTO ?></dd>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-full bg-goldSoft/20 text-goldSoft flex items-center justify-center shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <dt class="text-xs uppercase tracking-wider text-ivory/60">Lugar</dt>
              <dd class="font-serif text-xl mt-0.5">Otavalo, Imbabura</dd>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-full bg-goldSoft/20 text-goldSoft flex items-center justify-center shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>
            </div>
            <div>
              <dt class="text-xs uppercase tracking-wider text-ivory/60">Asistencia esperada</dt>
              <dd class="font-serif text-xl mt-0.5">1.500+ presenciales · 50k+ online</dd>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-full bg-goldSoft/20 text-goldSoft flex items-center justify-center shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
            </div>
            <div>
              <dt class="text-xs uppercase tracking-wider text-ivory/60">Cobertura de medios</dt>
              <dd class="font-serif text-xl mt-0.5">Prensa local + transmisión online</dd>
            </div>
          </div>
        </dl>
      </div>
    </div>
  </div>
</section>

<!-- ============== MÉTRICAS INSTAGRAM ============== -->
<section id="instagram" class="bg-ivory">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-wrap items-end justify-between gap-6 mb-12">
      <div>
        <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">Plataforma 1</p>
        <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight flex items-center gap-3">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-anaco"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          Instagram @org.reinadeotavalo
        </h2>
        <hr class="gold-divider">
      </div>
      <a href="<?= $IG_URL ?>" target="_blank" rel="noopener" class="text-anaco font-semibold hover:underline text-sm">Ver perfil →</a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Seguidores</p>
        <p class="stat-num mt-2"><?= num($ig['followers']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">+<?= $ig['growth_12m'] ?>% últimos 12 meses</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Alcance 90 días</p>
        <p class="stat-num mt-2"><?= num($ig['reach_90d']) ?></p>
        <p class="text-sm text-mutedTxt mt-2">Cuentas únicas alcanzadas</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Impresiones 90 días</p>
        <p class="stat-num mt-2"><?= num($ig['impressions_90d']) ?></p>
        <p class="text-sm text-mutedTxt mt-2">Veces que el contenido se mostró</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Engagement rate</p>
        <p class="stat-num mt-2"><?= pct($ig['engagement_rate']) ?>%</p>
        <p class="text-sm text-mutedTxt mt-2">Promedio industria: 1,2 %</p>
      </div>
    </div>

    <div class="bg-white border border-borderC rounded-2xl p-6 md:p-8 shadow-soft">
      <h3 class="font-serif text-xl text-ink mb-1">Crecimiento de seguidores · Últimos 12 meses</h3>
      <p class="text-sm text-mutedTxt mb-5">Audiencia consolidada IG + FB. Curva sostenida sin caídas estacionales relevantes.</p>
      <div class="chart-wrap">
        <canvas id="chartCrecimiento" height="120"></canvas>
        <span class="chart-wm">© Creative Web · creativeweb.com.ec</span>
      </div>
    </div>
  </div>
</section>

<!-- ============== MÉTRICAS FACEBOOK ============== -->
<section id="facebook" class="bg-mutedBg">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-wrap items-end justify-between gap-6 mb-12">
      <div>
        <p class="text-indigo700 uppercase tracking-[0.25em] text-xs font-semibold">Plataforma 2</p>
        <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight flex items-center gap-3">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="currentColor" class="text-indigo700"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
          Facebook /org.reinadeotavalo
        </h2>
        <hr class="gold-divider">
      </div>
      <a href="<?= $FB_URL ?>" target="_blank" rel="noopener" class="text-indigo700 font-semibold hover:underline text-sm">Ver página →</a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Seguidores</p>
        <p class="stat-num mt-2"><?= num($fb['followers']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">+<?= $fb['growth_12m'] ?>% últimos 12 meses</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Alcance 90 días</p>
        <p class="stat-num mt-2"><?= num($fb['reach_90d']) ?></p>
        <p class="text-sm text-mutedTxt mt-2">Personas únicas alcanzadas</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Impresiones 90 días</p>
        <p class="stat-num mt-2"><?= num($fb['impressions_90d']) ?></p>
        <p class="text-sm text-mutedTxt mt-2">Veces mostrado en feed</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Engagement rate</p>
        <p class="stat-num mt-2"><?= pct($fb['engagement_rate']) ?>%</p>
        <p class="text-sm text-mutedTxt mt-2">Promedio industria: 0,7 %</p>
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-white border border-borderC rounded-2xl p-6 md:p-8 shadow-soft">
        <h3 class="font-serif text-xl text-ink mb-1">Audiencia por edad</h3>
        <p class="text-sm text-mutedTxt mb-5">Rangos demográficos · datos Meta Insights</p>
        <div class="chart-wrap">
          <canvas id="chartEdad" height="200"></canvas>
          <span class="chart-wm">© Creative Web</span>
        </div>
      </div>
      <div class="bg-white border border-borderC rounded-2xl p-6 md:p-8 shadow-soft">
        <h3 class="font-serif text-xl text-ink mb-1">Audiencia por género</h3>
        <p class="text-sm text-mutedTxt mb-5">Distribución consolidada</p>
        <div class="chart-wrap">
          <canvas id="chartGenero" height="200"></canvas>
          <span class="chart-wm">© Creative Web</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============== AUDIENCIA CONSOLIDADA / CIUDADES ============== -->
<section id="audiencia" class="bg-ivory">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">Audiencia consolidada</p>
      <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight">Dónde está tu impacto</h2>
      <hr class="gold-divider center">
      <p class="text-base text-ink/70 mt-4">Concentración geográfica de la audiencia activa entre Instagram y Facebook.</p>
    </div>

    <div class="grid md:grid-cols-5 gap-6">
      <div class="md:col-span-2 bg-white border border-borderC rounded-2xl p-6 md:p-8 shadow-soft">
        <h3 class="font-serif text-xl text-ink mb-5">Top ciudades</h3>
        <ul class="space-y-4">
          <?php foreach ($demo_ciudades as $ciudad => $porc): ?>
          <li>
            <div class="flex items-center justify-between text-sm mb-1.5">
              <span class="font-medium text-ink"><?= $ciudad ?></span>
              <span class="text-mutedTxt font-semibold tabular-nums"><?= $porc ?>%</span>
            </div>
            <div class="h-2 bg-mutedBg rounded-full overflow-hidden">
              <div class="h-full bg-gradient-to-r from-anaco to-gold rounded-full" style="width: <?= $porc ?>%"></div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="md:col-span-3 bg-indigoDeep text-ivory rounded-2xl p-7 md:p-10 shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 pattern-textil"></div>
        <div class="relative">
          <p class="text-goldSoft uppercase tracking-[0.25em] text-xs font-semibold">Resumen consolidado</p>
          <h3 class="font-serif text-2xl md:text-3xl mt-2 mb-6">Audiencia total entre IG + FB</h3>

          <div class="grid grid-cols-3 gap-4 md:gap-6">
            <div>
              <p class="font-serif text-3xl md:text-4xl font-bold text-white tabular-nums"><?= num($consolidado['audiencia_unica']) ?>+</p>
              <p class="text-xs uppercase tracking-wider text-ivory/65 mt-1">Audiencia única estimada</p>
            </div>
            <div>
              <p class="font-serif text-3xl md:text-4xl font-bold text-white tabular-nums"><?= num($consolidado['alcance_total']) ?></p>
              <p class="text-xs uppercase tracking-wider text-ivory/65 mt-1">Alcance trimestral</p>
            </div>
            <div>
              <p class="font-serif text-3xl md:text-4xl font-bold text-white tabular-nums"><?= num($consolidado['impresiones']) ?></p>
              <p class="text-xs uppercase tracking-wider text-ivory/65 mt-1">Impresiones trimestre</p>
            </div>
          </div>

          <div class="mt-8 pt-6 border-t border-white/15 text-sm text-ivory/80 leading-relaxed">
            <strong class="text-goldSoft">+60% de la audiencia</strong> está concentrada en la zona norte de Ecuador (Imbabura). Esto convierte a la organización en un canal premium para marcas con foco en mercado regional.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============== VALOR PUBLICITARIO EQUIVALENTE (EAV) ============== -->
<section id="eav" class="bg-mutedBg">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div>
        <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">Valor publicitario equivalente</p>
        <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight">¿Cuánto costaría<br>comprar este alcance?</h2>
        <hr class="gold-divider">
        <p class="text-base md:text-lg text-ink/80 mt-4 leading-relaxed">
          Calculamos el <strong>EAV (Equivalent Advertising Value)</strong> usando el CPM promedio de Meta Ads en Ecuador (USD 3 por cada 1.000 impresiones).
        </p>
        <p class="text-sm text-mutedTxt mt-4">
          El EAV es una referencia conservadora. No incluye el valor de asociación cultural, presencia física en evento ni cobertura de prensa.
        </p>
      </div>

      <div class="bg-white border border-borderC rounded-2xl p-8 shadow-card">
        <div class="space-y-6">
          <div class="flex items-end justify-between pb-4 border-b border-borderC">
            <div>
              <p class="text-xs uppercase tracking-wider text-mutedTxt">Impresiones trimestrales</p>
              <p class="font-serif text-2xl text-ink mt-1 tabular-nums"><?= num($consolidado['impresiones']) ?></p>
            </div>
            <p class="text-mutedTxt text-sm">×</p>
            <div class="text-right">
              <p class="text-xs uppercase tracking-wider text-mutedTxt">CPM Meta Ecuador</p>
              <p class="font-serif text-2xl text-ink mt-1">USD 3,00</p>
            </div>
          </div>
          <div class="pt-2">
            <p class="text-xs uppercase tracking-wider text-mutedTxt">Valor equivalente trimestral</p>
            <p class="font-serif text-5xl md:text-6xl font-bold text-indigoDeep mt-2 tabular-nums">
              USD <?= num(($consolidado['impresiones'] / 1000) * 3) ?>
            </p>
            <p class="text-sm text-mutedTxt mt-2">Por trimestre · sin contar evento principal ni activaciones físicas</p>
          </div>
          <div class="pt-4 border-t border-borderC bg-gradient-to-r from-amber-50 to-transparent -mx-8 -mb-8 px-8 py-5 rounded-b-2xl">
            <p class="text-sm text-ink/75">
              <strong class="text-anaco">Conclusión:</strong> auspiciar la organización entrega ~5× más valor que un equivalente en pauta digital, gracias a la confianza y autenticidad de la audiencia.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============== TIERS DE AUSPICIO ============== -->
<section id="tiers" class="bg-ivory">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">Paquetes de auspicio</p>
      <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight">Elige cómo brillar<br>junto a la corona</h2>
      <hr class="gold-divider center">
      <p class="text-base text-ink/70 mt-4">Cuatro niveles diseñados para distintos presupuestos y objetivos de marca. Cupos limitados.</p>
    </div>

    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6">
      <?php foreach ($tiers as $i => $t): ?>
      <article class="tier-card <?= $i === 1 ? 'tier-popular' : '' ?> relative">
        <?php if ($t['badge']): ?>
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full text-[10px] uppercase tracking-widest font-bold <?= $i === 1 ? 'bg-gold text-white' : 'bg-anaco text-white' ?>">
            <?= $t['badge'] ?>
          </div>
        <?php endif; ?>
        <div class="bg-gradient-to-br <?= $t['color'] ?> p-6 text-white">
          <p class="text-xs uppercase tracking-[0.2em] opacity-80">Paquete</p>
          <h3 class="font-serif text-3xl font-bold mt-1"><?= $t['name'] ?></h3>
          <p class="mt-4 font-serif text-4xl font-bold tabular-nums">USD <?= num($t['price']) ?></p>
          <p class="text-xs uppercase tracking-wider opacity-80 mt-1"><?= $t['cupos'] ?> cupos disponibles</p>
        </div>
        <div class="p-6">
          <ul class="space-y-3 text-sm text-ink/85">
            <?php foreach ($t['benefits'] as $b): ?>
            <li class="flex items-start gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="text-gold mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
              <span><?= $b ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="https://wa.me/<?= $WHATSAPP ?>?text=Hola%2C%20quiero%20auspiciar%20con%20el%20paquete%20<?= urlencode($t['name']) ?>" target="_blank" rel="noopener" class="btn btn-dark w-full justify-center mt-6 text-sm">
            Reservar <?= $t['name'] ?>
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <p class="text-center text-sm text-mutedTxt mt-8">¿Necesitas un paquete personalizado o canje por servicios? <a href="https://wa.me/<?= $WHATSAPP ?>" target="_blank" rel="noopener" class="text-anaco font-semibold underline">Hablemos por WhatsApp</a>.</p>
  </div>
</section>

<!-- ============== CALENDARIO DE ACTIVACIONES ============== -->
<section id="calendario" class="bg-indigoDeep text-ivory relative overflow-hidden">
  <div class="absolute inset-0 opacity-15 pattern-textil"></div>
  <div class="max-w-6xl mx-auto px-6 relative">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <p class="text-goldSoft uppercase tracking-[0.25em] text-xs font-semibold">Cronograma</p>
      <h2 class="font-serif text-3xl md:text-5xl text-white mt-3 leading-tight">Activaciones del auspicio</h2>
      <hr class="gold-divider center">
    </div>

    <ol class="relative border-l-2 border-goldSoft/40 ml-3 space-y-10">
      <li class="ml-8 relative">
        <span class="absolute -left-[42px] top-0 w-8 h-8 rounded-full bg-goldSoft text-indigoDeep flex items-center justify-center font-bold font-serif">1</span>
        <p class="text-xs uppercase tracking-wider text-goldSoft">8 semanas antes del evento</p>
        <h3 class="font-serif text-xl mt-1">Anuncio oficial de auspiciantes</h3>
        <p class="text-ivory/80 mt-2 text-sm leading-relaxed">Post de bienvenida en IG + FB con logo y mención. Stories con presentación. Listado de auspiciantes oficiales activado en la web.</p>
      </li>
      <li class="ml-8 relative">
        <span class="absolute -left-[42px] top-0 w-8 h-8 rounded-full bg-goldSoft text-indigoDeep flex items-center justify-center font-bold font-serif">2</span>
        <p class="text-xs uppercase tracking-wider text-goldSoft">4 semanas antes</p>
        <h3 class="font-serif text-xl mt-1">Contenido temático con marca</h3>
        <p class="text-ivory/80 mt-2 text-sm leading-relaxed">Activación de publicaciones temáticas según paquete: reels con presentación de candidatas, mención de marcas en contenido cultural, video institucional (Diamante).</p>
      </li>
      <li class="ml-8 relative">
        <span class="absolute -left-[42px] top-0 w-8 h-8 rounded-full bg-goldSoft text-indigoDeep flex items-center justify-center font-bold font-serif">3</span>
        <p class="text-xs uppercase tracking-wider text-goldSoft">1 semana antes</p>
        <h3 class="font-serif text-xl mt-1">Activación de medios locales</h3>
        <p class="text-ivory/80 mt-2 text-sm leading-relaxed">Nota de prensa con mención de auspiciantes principales. Entrevistas en radios locales. Boost orgánico en redes con audiencia segmentada Imbabura.</p>
      </li>
      <li class="ml-8 relative">
        <span class="absolute -left-[42px] top-0 w-8 h-8 rounded-full bg-anaco text-white flex items-center justify-center font-bold font-serif">★</span>
        <p class="text-xs uppercase tracking-wider text-anaco">Día del evento</p>
        <h3 class="font-serif text-2xl mt-1">Coronación · presencia total</h3>
        <p class="text-ivory/80 mt-2 text-sm leading-relaxed">Banners físicos en escenario, mención en agradecimientos, stand de auspiciantes (paquetes Diamante/Oro), transmisión en vivo con menciones, cobertura fotográfica con logo.</p>
      </li>
      <li class="ml-8 relative">
        <span class="absolute -left-[42px] top-0 w-8 h-8 rounded-full bg-goldSoft text-indigoDeep flex items-center justify-center font-bold font-serif">4</span>
        <p class="text-xs uppercase tracking-wider text-goldSoft">Post-evento (2 semanas)</p>
        <h3 class="font-serif text-xl mt-1">Reporte de impacto + galería</h3>
        <p class="text-ivory/80 mt-2 text-sm leading-relaxed">Entrega de reporte de métricas con tu marca: alcance, impresiones, menciones, EAV. Galería oficial y reel resumen con logos de auspiciantes.</p>
      </li>
    </ol>
  </div>
</section>

<!-- ============== CTA FINAL / CONTACTO ============== -->
<section id="contacto" class="bg-gradient-to-b from-mutedBg to-ivory">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <p class="text-anaco uppercase tracking-[0.25em] text-xs font-semibold">Cómo auspiciar</p>
    <h2 class="font-serif text-3xl md:text-5xl text-ink mt-3 leading-tight">Sumate a la corona de<br>Otavalo <?= $ANIO ?></h2>
    <hr class="gold-divider center">
    <p class="text-base md:text-lg text-ink/75 mt-4 max-w-2xl mx-auto">
      Tres caminos para conversar. Respondemos en menos de 24 horas hábiles. Cupos limitados por paquete.
    </p>

    <div class="grid sm:grid-cols-3 gap-5 mt-10">
      <a href="https://wa.me/<?= $WHATSAPP ?>?text=Hola%2C%20me%20interesa%20auspiciar%20la%20Elecci%C3%B3n%20de%20la%20Reina%20de%20Otavalo%20<?= $ANIO ?>" target="_blank" rel="noopener" class="bg-white border border-borderC rounded-2xl p-6 hover:border-anaco hover:shadow-card transition group">
        <div class="w-12 h-12 mx-auto rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center group-hover:scale-110 transition mb-4">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.3A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.78 12L4 20l4.13-1.23a7.93 7.93 0 0 0 3.92 1h0a7.94 7.94 0 0 0 5.55-13.47Z"/></svg>
        </div>
        <h3 class="font-serif text-lg text-ink">WhatsApp directo</h3>
        <p class="text-sm text-mutedTxt mt-1 break-all">+593 99 999 9999</p>
      </a>
      <a href="mailto:<?= $CORREO ?>?subject=Quiero%20auspiciar%20la%20Reina%20de%20Otavalo%20<?= $ANIO ?>" class="bg-white border border-borderC rounded-2xl p-6 hover:border-anaco hover:shadow-card transition group">
        <div class="w-12 h-12 mx-auto rounded-full bg-indigoDeep/10 text-indigoDeep flex items-center justify-center group-hover:scale-110 transition mb-4">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h3 class="font-serif text-lg text-ink">Correo electrónico</h3>
        <p class="text-sm text-mutedTxt mt-1 break-all"><?= $CORREO ?></p>
      </a>
      <a href="<?= $IG_URL ?>" target="_blank" rel="noopener" class="bg-white border border-borderC rounded-2xl p-6 hover:border-anaco hover:shadow-card transition group">
        <div class="w-12 h-12 mx-auto rounded-full bg-anaco/10 text-anaco flex items-center justify-center group-hover:scale-110 transition mb-4">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        </div>
        <h3 class="font-serif text-lg text-ink">Instagram DM</h3>
        <p class="text-sm text-mutedTxt mt-1">@org.reinadeotavalo</p>
      </a>
    </div>

    <div class="mt-10">
      <a href="<?= $PDF ?>" download class="btn btn-primary inline-flex">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Descargar dossier en PDF
      </a>
    </div>
  </div>
</section>

<!-- ============== FOOTER ============== -->
<footer class="bg-indigoDeep text-ivory">
  <div class="max-w-6xl mx-auto px-6 py-12">
    <div class="grid md:grid-cols-3 gap-10 items-start">
      <div>
        <p class="font-serif text-2xl text-white">Organización<br>Reina de Otavalo</p>
        <p class="text-sm text-ivory/65 mt-3 leading-relaxed">Tradición, identidad y comunidad. Otavalo, Imbabura — Ecuador.</p>
        <div class="flex gap-3 mt-5">
          <a href="<?= $IG_URL ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 hover:bg-goldSoft hover:text-indigoDeep flex items-center justify-center transition" aria-label="Instagram">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="<?= $FB_URL ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 hover:bg-goldSoft hover:text-indigoDeep flex items-center justify-center transition" aria-label="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
          </a>
        </div>
      </div>

      <div>
        <p class="text-xs uppercase tracking-wider text-goldSoft font-semibold">Secciones</p>
        <ul class="mt-4 space-y-2 text-sm text-ivory/80">
          <li><a href="#organizacion" class="hover:text-goldSoft transition">Quiénes somos</a></li>
          <li><a href="#por-que" class="hover:text-goldSoft transition">Por qué auspiciar</a></li>
          <li><a href="#audiencia" class="hover:text-goldSoft transition">Audiencia y métricas</a></li>
          <li><a href="#tiers" class="hover:text-goldSoft transition">Paquetes de auspicio</a></li>
          <li><a href="#contacto" class="hover:text-goldSoft transition">Contacto</a></li>
        </ul>
      </div>

      <!-- Créditos Creative Web -->
      <div class="md:border-l md:border-white/15 md:pl-10">
        <p class="text-xs uppercase tracking-wider text-goldSoft font-semibold">Auditoría, métricas y diseño</p>
        <a href="<?= $CW_URL ?>" target="_blank" rel="noopener" class="block mt-3 group">
          <p class="font-serif text-2xl text-white group-hover:text-goldSoft transition">Creative Web</p>
          <p class="text-sm text-ivory/65 mt-1">creativeweb.com.ec</p>
        </a>
        <p class="text-xs text-ivory/55 mt-4 leading-relaxed">
          Auditoría de redes sociales, análisis de métricas, visualizaciones y diseño desarrollados por <strong class="text-ivory/85">Creative Web</strong> como apoyo a la <?= $ORG ?>.
        </p>
        <p class="text-xs text-ivory/50 mt-3">Datos: Meta Business Suite · Periodo: últimos 90 días</p>
      </div>
    </div>

    <div class="border-t border-white/10 mt-10 pt-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-3 text-xs text-ivory/50">
      <p>© <?= $ANIO ?> <?= $ORG ?>. Todos los derechos reservados.</p>
      <p>Diseño y desarrollo: <a href="<?= $CW_URL ?>" target="_blank" rel="noopener" class="text-goldSoft hover:underline">Creative Web · creativeweb.com.ec</a></p>
    </div>
  </div>
</footer>

<!-- ============== CHART.JS ============== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
  // Plugin watermark Creative Web — se dibuja dentro del lienzo del gráfico
  const cwWatermark = {
    id: 'cwWatermark',
    afterDatasetsDraw(chart) {
      const { ctx, chartArea } = chart;
      if (!chartArea) return;
      ctx.save();
      ctx.fillStyle = 'rgba(31,26,51,0.18)';
      ctx.font = '500 10px Inter, sans-serif';
      ctx.textAlign = 'right';
      ctx.textBaseline = 'bottom';
      ctx.fillText('© Creative Web · creativeweb.com.ec', chartArea.right - 6, chartArea.bottom - 4);
      ctx.restore();
    }
  };

  const COL = {
    indigo: '#1E40AF',
    indigoDeep: '#1E1B4B',
    anaco: '#7C2D12',
    gold: '#B45309',
    goldSoft: '#F59E0B',
    ink: '#1F1A33',
    mutedTxt: '#6B6258',
  };

  const fontFamily = "'Inter', system-ui, sans-serif";
  Chart.defaults.font.family = fontFamily;
  Chart.defaults.color = COL.mutedTxt;
  Chart.defaults.borderColor = '#E8DFCC';

  // --- Crecimiento de seguidores ---
  const crecimientoLabels = <?= json_encode(array_keys($crecimiento)) ?>;
  const crecimientoData   = <?= json_encode(array_values($crecimiento)) ?>;
  new Chart(document.getElementById('chartCrecimiento'), {
    type: 'line',
    data: {
      labels: crecimientoLabels,
      datasets: [{
        label: 'Seguidores totales (IG + FB)',
        data: crecimientoData,
        borderColor: COL.gold,
        backgroundColor: 'rgba(245,158,11,0.12)',
        borderWidth: 3,
        fill: true,
        tension: 0.35,
        pointBackgroundColor: COL.indigoDeep,
        pointBorderColor: '#FFFFFF',
        pointBorderWidth: 2,
        pointRadius: 5,
        pointHoverRadius: 7,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: COL.indigoDeep,
          titleFont: { weight: '600' },
          padding: 12,
          callbacks: {
            label: (c) => ' ' + c.parsed.y.toLocaleString('es-EC') + ' seguidores'
          }
        }
      },
      scales: {
        y: {
          beginAtZero: false,
          grid: { color: '#F1ECE2' },
          ticks: { callback: v => v.toLocaleString('es-EC') }
        },
        x: { grid: { display: false } }
      }
    },
    plugins: [cwWatermark],
  });

  // --- Edad ---
  new Chart(document.getElementById('chartEdad'), {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_keys($demo_edad)) ?>,
      datasets: [{
        label: '% de audiencia',
        data: <?= json_encode(array_values($demo_edad)) ?>,
        backgroundColor: [COL.gold, COL.goldSoft, COL.anaco, COL.indigo, COL.indigoDeep],
        borderRadius: 8,
        borderSkipped: false,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      indexAxis: 'y',
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: COL.indigoDeep,
          callbacks: { label: c => ' ' + c.parsed.x + '%' }
        }
      },
      scales: {
        x: { beginAtZero: true, max: 40, grid: { color: '#F1ECE2' }, ticks: { callback: v => v + '%' } },
        y: { grid: { display: false } }
      }
    },
    plugins: [cwWatermark],
  });

  // --- Género ---
  new Chart(document.getElementById('chartGenero'), {
    type: 'doughnut',
    data: {
      labels: ['Mujeres', 'Hombres'],
      datasets: [{
        data: [<?= $demo_genero['mujeres'] ?>, <?= $demo_genero['hombres'] ?>],
        backgroundColor: [COL.anaco, COL.indigoDeep],
        borderColor: '#FFFFFF',
        borderWidth: 4,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '65%',
      plugins: {
        legend: {
          position: 'bottom',
          labels: { padding: 16, usePointStyle: true, pointStyle: 'circle' }
        },
        tooltip: {
          backgroundColor: COL.indigoDeep,
          callbacks: { label: c => ' ' + c.label + ': ' + c.parsed + '%' }
        }
      }
    },
    plugins: [cwWatermark],
  });
</script>

</body>
</html>
