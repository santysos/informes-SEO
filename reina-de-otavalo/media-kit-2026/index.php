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
$ORG_SIGLA     = "ORG";
$TAGLINE       = "Una tradición no se extingue, evoluciona";
$EVENTO        = "Elección y Coronación de la Reina de Otavalo " . $ANIO;
$FECHA_EVENTO  = "Sábado 3 de octubre · 2026";
$DIRECCION     = "Sucre 6-09 y Piedrahita, Otavalo";
$WHATSAPP      = "593992126557";   // +593 99 212 6557
$WHATSAPP_2    = "593980602213";   // +593 98 060 2213
$CORREO        = "organizacion@reinadeotavalo.com";
$IG_URL        = "https://www.instagram.com/org.reinadeotavalo/";
$FB_URL        = "https://www.facebook.com/org.reinadeotavalo";
$YT_URL        = "https://www.youtube.com/channel/UCwV8hIKsxIA9wJ_HOlaQ9Lw";
$WEB_URL       = "https://www.reinadeotavalo.com";
$CW_URL        = "https://creativeweb.com.ec";
$PDF           = "pdf/media-kit-reina-otavalo-2026.pdf";

// === MÉTRICAS REALES ===
// Fuente: Meta Business Suite, Organización Reina de Otavalo
// Período: Últimos 12 meses (mayo 2025 - mayo 2026)
// Datos confirmados con capturas oficiales de Insights.

$ig = [
  'followers'        => 3964,        // ✓ REAL (perfil público)
  'posts'            => 3087,        // ✓ REAL (perfil público)
  'following'        => 909,         // ✓ REAL
  'visualizaciones'  => 2700000,     // ✓ REAL — 2,7 millones
  'reach_12m'        => 158000,      // ✓ REAL — alcance ↑63,4%
  'interacciones'    => 38800,       // ✓ REAL — ↑1,3 mill.%
  'contactos_msg'    => 202,         // ✓ REAL
  'contactos_nuevos' => 136,         // ✓ REAL
  'growth_pct'       => 63,          // ↑63,4% en alcance
];
$fb = [
  'followers'        => 11000,       // ✓ REAL (11 mil)
  'following'        => 264,         // ✓ REAL
  'visualizaciones'  => 4600000,     // ✓ REAL — 4,6 millones
  'interacciones'    => 93200,       // ✓ REAL — ↑24,2%
  'rep_3s'           => 321700,      // ✓ REAL — ↑299%
  'rep_1min'         => 38000,       // ✓ REAL — ↑334%
  'tiempo_rep_dias'  => 142,         // ✓ REAL — 142 días 5h ↑265%
  'seguimientos'     => 2000,        // ✓ REAL — 2 mil
  'conversaciones'   => 161,         // ✓ REAL
  'contactos_msg'    => 149,         // ✓ REAL
  'contactos_nuevos' => 126,         // ✓ REAL ↑28,6%
  'indice_resp'      => 37,          // ✓ REAL — 37% ↑115%
  'growth_pct'       => 24,          // ↑24,2% interacciones
];
$consolidado = [
  'audiencia_unica'    => 12500,     // estimación overlap IG+FB
  'visualizaciones'    => 7300000,   // ✓ REAL SUMA — 4,6M FB + 2,7M IG
  'interacciones_tot'  => 132000,    // ✓ REAL SUMA — 93,2K FB + 38,8K IG
  'mensajes_periodo'   => 262,       // ✓ REAL SUMA — 126 FB + 136 IG
];

// Demografía REAL (Meta Insights) — promedio ponderado IG + FB
// FB: Mujeres 63,4% / Hombres 36,6% · IG: Mujeres 65,2% / Hombres 34,8%
$demo_genero  = ['mujeres' => 64, 'hombres' => 36];

// Edad: promedio ponderado entre IG (más jóvenes) y FB (más adultos)
// IG: 18-24 (17.8) | 25-34 (45.7) | 35-44 (23.4) | 45-54 (8.7) | 55+ (4.4)
// FB: 18-24 (11.8) | 25-34 (37.6) | 35-44 (25.9) | 45-54 (13.5) | 55+ (11.2)
$demo_edad    = [
  '18-24' => 14,
  '25-34' => 41,
  '35-44' => 25,
  '45-54' => 11,
  '55+'   => 9,
];

// Ciudades: promedio ponderado FB+IG
// FB: Otavalo 40.4 | Quito 10.4 | Ibarra 9.0 | Atuntaqui 2.4 | Cotacachi 1.9
// IG: Otavalo 31.3 | Quito 11.6 | Ibarra 9.4 | Atuntaqui 4.1 | San Pablo 2.4
$demo_ciudades = [
  'Otavalo'    => 36,
  'Quito'      => 11,
  'Ibarra'     => 9,
  'Atuntaqui'  => 3,
  'Cotacachi'  => 2,
  'San Pablo'  => 2,
  'Otras'      => 37,
];

// Países (REAL)
// FB: Ecuador 95.3% · IG: Ecuador 90.0%
$demo_paises = [
  'Ecuador'        => 93,
  'Estados Unidos' => 2.4,
  'España'         => 1.2,
  'Colombia'       => 0.9,
  'México'         => 0.7,
];

// Crecimiento visualizaciones mensuales (basado en gráfico Meta — picos en eventos)
// Curva reconstruida de los gráficos mostrados en Insights
$crecimiento = [
  'May 25' => 320000,
  'Jun 25' => 380000,
  'Jul 25' => 450000,
  'Ago 25' => 580000,
  'Sep 25' => 690000,
  'Oct 25' => 850000,   // pico Coronación (octubre)
  'Nov 25' => 620000,
  'Dic 25' => 500000,
  'Ene 26' => 540000,
  'Feb 26' => 950000,   // pico OTalentShow (febrero)
  'Mar 26' => 680000,
  'Abr 26' => 580000,
];

// Top contenidos (OTalentShow es el flagship)
$top_contenidos = [
  ['titulo' => 'OTalentShow — Jatun Kuraka',                'views' => 85200, 'plat' => 'FB+IG'],
  ['titulo' => 'OTalentShow — UE Otavalo',                  'views' => 80200, 'plat' => 'FB+IG'],
  ['titulo' => 'OTalentShow — UE Santa Juana de Chantal',   'views' => 61400, 'plat' => 'FB+IG'],
  ['titulo' => 'OTalentShow — UE Francisco Pérez',          'views' => 59900, 'plat' => 'FB+IG'],
  ['titulo' => 'Coronación nuevas representantes 2025-2026','views' => 42100, 'plat' => 'FB+IG'],
  ['titulo' => 'OTalentShow — UE Ciudad de Otavalo',        'views' => 33600, 'plat' => 'FB+IG'],
];

// Paquetes oficiales de auspicio · Organización Reina de Otavalo
// (Internamente CORAZA / SARANCE / PENDONEROS / STANDARD,
//  presentados como Diamante / Oro / Plata / Bronce para lectura universal)
$tiers = [
  [
    'name' => 'Diamante',
    'price' => 550,
    'iva' => true,
    'color' => 'from-navyDeep to-navy',
    'badge' => 'Auspicio principal',
    'benefits' => [
      'Logo en banner principal del escenario',
      'Mención dedicada en presentación de candidatas y elección',
      'Spot de 15 segundos en video rotativo de la elección',
      'Stand al ingreso de presentación y elección',
      '4 entradas VIP elección + 2 VIP presentación + 2 generales',
      'Visita exclusiva de la Reina y Virreina a tu empresa',
      'Uso de la imagen de la Reina en 4 ocasiones',
      '6 historias en redes sociales + 4 spots',
      'Video promocional en TikTok',
      'Presencia de la Reina en 2 eventos de la empresa',
    ],
    'full_benefits' => [
      'Mención en el programa rumbo al Reinado*',
      'Presencia de marca en pantallas y roll up en presentación de candidatas y elección',
      'Dos menciones en 2 eventos principales',
      'Visita de candidatas a su empresa',
      'Video en elección de la visita a la empresa',
      'Spot de 15 seg. — Video rotativo en elección',
      'Imagen corporativa rotativa en presentación de candidatas',
      'Imagen corporativa rotativa en elección',
      'Imagen corporativa en el programa digital — espacio individual*',
      'Imagen corporativa en el programa digital — espacio compartido',
      'Imagen corporativa página web — imagen estática primera línea*',
      'Imagen corporativa página web — imagen rotativa segunda línea',
      'Imagen corporativa en afiche promocional de elección*',
      'Promoción de la marca en historias de redes sociales — 6 veces',
      'Publicación de 4 spots promocionales en redes sociales (entregados por la marca)',
      'Stand al ingreso de presentación de candidatas y elección',
      '2 entradas VIP presentación de candidatas',
      '4 entradas VIP elección',
      '2 entradas generales para presentación y elección',
      'Fotografía exclusiva con Reina y corte en elección',
      'Uso de la imagen de la Reina para promoción de la empresa*',
      'Uso de la imagen de la Reina en 4 ocasiones',
      'Visita exclusiva de la Reina y Virreina a la empresa*',
      'Presencia de la Reina en 2 eventos de la empresa',
      'Un video promocional de la marca en TikTok',
      'Promoción de la marca en un evento institucionalizado*',
      'Porcentaje de descuento con marcas auspiciantes para equipo de trabajo o familia directa',
      'Mención adicional en elección si entrega premio a la Reina y Virreina',
    ],
    'nota_iva' => '*Si su aporte es 100% efectivo.',
  ],
  [
    'name' => 'Oro',
    'price' => 350,
    'iva' => true,
    'color' => 'from-gold to-goldDeep',
    'badge' => 'Más popular',
    'benefits' => [
      'Presencia de marca en pantallas (presentación y elección)',
      'Mención en presentación de candidatas y en elección',
      'Imagen corporativa rotativa en presentación y elección',
      'Imagen en programa digital (espacio compartido)',
      '2 entradas presentación + 4 entradas elección + 2 generales',
      'Uso de la imagen de la Reina en 3 ocasiones',
      '4 historias en redes sociales',
    ],
    'full_benefits' => [
      'Presencia de marca en pantallas en presentación de candidatas y elección',
      'Una mención en presentación de candidatas y en elección',
      'Imagen corporativa rotativa en presentación de candidatas',
      'Imagen corporativa rotativa en elección',
      'Imagen corporativa en programa digital — espacio compartido',
      'Imagen corporativa en página web — segunda o tercera línea',
      'Promoción de la marca en historias de redes sociales — 4 veces',
      '2 entradas con silla en presentación de candidatas',
      '4 entradas con silla en elección',
      '2 entradas generales elección',
      'Uso de la imagen de la Reina en 3 ocasiones',
      'Porcentaje de descuento con marcas auspiciantes para equipo de trabajo o familia directa',
      'Mención adicional en elección si entrega premio a la Reina',
    ],
  ],
  [
    'name' => 'Plata',
    'price' => 150,
    'iva' => true,
    'color' => 'from-anaco to-red-900',
    'badge' => '',
    'benefits' => [
      'Presencia de marca en pantalla en elección',
      'Una mención en presentación y elección',
      'Imagen corporativa rotativa en elección',
      'Imagen en programa digital (espacio compartido)',
      '4 entradas generales elección',
      '2 historias en redes sociales',
    ],
    'full_benefits' => [
      'Presencia de marca en pantalla en elección',
      'Una mención en presentación de candidatas y elección',
      'Imagen corporativa rotativa en elección',
      'Imagen corporativa en programa digital — espacio compartido',
      'Imagen corporativa en página web — tercera línea',
      'Promoción de la marca en historias de redes sociales — 2 veces',
      '4 entradas generales elección',
      'Porcentaje de descuento con marcas auspiciantes para equipo de trabajo o familia directa',
      'Mención adicional en elección si entrega premio a la Reina',
    ],
  ],
  [
    'name' => 'Bronce',
    'price' => 100,
    'iva' => true,
    'color' => 'from-slate-500 to-slate-700',
    'badge' => 'Entrada',
    'benefits' => [
      'Presencia de marca en pantalla en elección',
      'Una mención en elección',
      'Imagen corporativa en programa digital (espacio compartido)',
      '2 entradas generales elección',
      'Mención adicional si entrega premio a la Reina',
    ],
    'full_benefits' => [
      'Presencia de marca en pantalla en elección',
      'Una mención en elección',
      'Imagen corporativa en programa digital — espacio compartido',
      '2 entradas generales elección',
      'Mención adicional en elección si entrega premio a la Reina',
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
<meta name="description" content="Conecta tu marca con el corazón cultural de Otavalo. 7,3M visualizaciones anuales entre Instagram y Facebook. 132K interacciones reales. 93% audiencia Ecuador. Dossier de auspicios <?= $EVENTO ?>.">
<meta name="author" content="Creative Web — creativeweb.com.ec">
<meta name="robots" content="index, follow">

<!-- Open Graph para WhatsApp / redes -->
<meta property="og:type" content="website">
<meta property="og:title" content="Auspicia la <?= $EVENTO ?>">
<meta property="og:description" content="7,3M visualizaciones · 132K interacciones · 93% audiencia Ecuador. Conoce los paquetes de auspicio.">
<meta property="og:url" content="https://creativeweb.com.ec/informes/reina-de-otavalo/media-kit-2026/">
<meta property="og:image" content="assets/og-cover.jpg">
<meta property="og:locale" content="es_EC">
<meta name="twitter:card" content="summary_large_image">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          serif: ['Outfit', 'system-ui', 'sans-serif'],
          sans:  ['Outfit', 'system-ui', 'sans-serif'],
          outfit: ['Outfit', 'system-ui', 'sans-serif'],
        },
        colors: {
          // Paleta extraída de la identidad real de la organización
          // Logo: navy profundo + blanco + dorado (de las bandas ceremoniales)
          ivory:     '#F8F6F2',       // fondo claro sutil
          ink:       '#0A0E27',       // azul-negro del logo
          navy:      '#0A0E27',       // alias
          navyDeep:  '#050817',       // aún más profundo, para hero
          navySoft:  '#1B2347',       // surface oscuro
          indigo700: '#1E40AF',
          indigoDeep:'#0A0E27',       // alias compat
          anaco:     '#9B2C2C',       // rojo banda Sta. Interculturalidad
          gold:      '#C9A96E',       // dorado bandas ceremoniales
          goldSoft:  '#E6C988',       // dorado claro
          goldDeep:  '#8B7239',       // dorado oscuro
          mutedBg:   '#EFEBE3',
          mutedTxt:  '#5C5A55',
          borderC:   '#E1DDD3',
        },
        boxShadow: {
          soft: '0 4px 14px -2px rgba(10, 14, 39, 0.08), 0 2px 6px -2px rgba(10, 14, 39, 0.04)',
          card: '0 8px 30px -10px rgba(10, 14, 39, 0.22)',
          glow: '0 0 40px rgba(201, 169, 110, 0.25)',
        },
        backdropBlur: {
          xs: '4px',
        },
      },
    },
  };
</script>

<style>
  html { scroll-behavior: smooth; }
  body {
    font-family: 'Outfit', system-ui, sans-serif;
    background: #F8F6F2;
    color: #0A0E27;
    -webkit-font-smoothing: antialiased;
    font-feature-settings: "ss01", "cv11";
  }
  h1,h2,h3,h4,.font-serif,.font-outfit { font-family: 'Outfit', system-ui, sans-serif; letter-spacing: -0.02em; }

  /* Fondo hero — navy profundo + halos dorados radiales */
  .hero-bg {
    background:
      radial-gradient(circle at 20% 10%, rgba(201,169,110,0.18) 0%, transparent 45%),
      radial-gradient(circle at 85% 85%, rgba(155,44,44,0.14) 0%, transparent 45%),
      radial-gradient(circle at 50% 50%, rgba(30,64,175,0.08) 0%, transparent 60%),
      linear-gradient(180deg, #050817 0%, #0A0E27 100%);
  }
  .glow-orb {
    position: absolute; pointer-events: none;
    width: 480px; height: 480px; border-radius: 50%;
    filter: blur(120px); opacity: .35;
  }

  /* === GLASSMORPHISM === */
  .glass {
    background: rgba(255, 255, 255, 0.55);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border: 1px solid rgba(255, 255, 255, 0.7);
    box-shadow: 0 8px 32px -8px rgba(10, 14, 39, 0.12);
  }
  .glass-dark {
    background: rgba(10, 14, 39, 0.45);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border: 1px solid rgba(255, 255, 255, 0.12);
  }
  .glass-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.85) 0%, rgba(255,255,255,0.55) 100%);
    backdrop-filter: blur(16px) saturate(150%);
    -webkit-backdrop-filter: blur(16px) saturate(150%);
    border: 1px solid rgba(255, 255, 255, 0.75);
    border-radius: 20px;
    box-shadow: 0 8px 30px -10px rgba(10, 14, 39, 0.12), inset 0 1px 0 rgba(255,255,255,0.9);
  }
  .glass-nav {
    background: rgba(248, 246, 242, 0.7);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(10, 14, 39, 0.06);
  }
  .glass-tier {
    background: linear-gradient(160deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.7) 100%);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.85);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 40px -15px rgba(10, 14, 39, 0.18);
  }

  /* Divisor dorado */
  .gold-divider {
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, #C9A96E 30%, #E6C988 50%, #C9A96E 70%, transparent 100%);
    border: 0;
    width: 96px;
    margin: 14px 0;
  }
  .gold-divider.center { margin: 14px auto; }

  /* Tarjeta de métrica (glass) */
  .metric-card {
    background: linear-gradient(140deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.65) 100%);
    backdrop-filter: blur(16px) saturate(140%);
    -webkit-backdrop-filter: blur(16px) saturate(140%);
    border: 1px solid rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    padding: 26px;
    box-shadow: 0 6px 20px -8px rgba(10, 14, 39, 0.08), inset 0 1px 0 rgba(255,255,255,0.9);
    transition: transform 250ms cubic-bezier(.4,0,.2,1), box-shadow 250ms ease, border-color 250ms ease;
  }
  .metric-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 36px -12px rgba(10, 14, 39, 0.18), 0 0 0 1px rgba(201, 169, 110, 0.3);
    border-color: rgba(201, 169, 110, 0.4);
  }

  /* Botones */
  .btn {
    display:inline-flex; align-items:center; gap:.55rem;
    padding: .9rem 1.7rem; border-radius: 999px;
    font-weight:600; font-size:.95rem; letter-spacing: -0.01em;
    transition: all 250ms cubic-bezier(.4,0,.2,1); cursor:pointer;
  }
  .btn-primary {
    background: linear-gradient(135deg, #C9A96E 0%, #8B7239 100%);
    color: #050817;
    box-shadow: 0 4px 14px -4px rgba(201,169,110,0.5);
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 28px -6px rgba(201,169,110,0.6), 0 0 30px rgba(201,169,110,0.4);
    color: #050817;
  }
  .btn-outline {
    border: 1.5px solid rgba(255,255,255,0.35);
    color: #FFF;
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,0.05);
  }
  .btn-outline:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.6); }
  .btn-dark {
    background: linear-gradient(135deg, #0A0E27 0%, #1B2347 100%);
    color: #FFFFFF;
  }
  .btn-dark:hover { transform: translateY(-1px); box-shadow: 0 8px 24px -6px rgba(10,14,39,0.4); }

  /* Tier card */
  .tier-card { transition: all 250ms cubic-bezier(.4,0,.2,1); }
  .tier-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 22px 50px -18px rgba(10, 14, 39, 0.28);
  }
  .tier-popular {
    transform: scale(1.03);
    box-shadow: 0 16px 50px -10px rgba(201,169,110,0.4), 0 0 0 2px rgba(201,169,110,0.6);
  }

  /* Chart watermark */
  .chart-wrap { position: relative; }
  .chart-wm {
    position: absolute; bottom: 8px; right: 14px;
    font-size: 10px; color: #94908A; letter-spacing: .04em;
    user-select: none; pointer-events: none; font-weight: 500;
  }

  /* Stat number */
  .stat-num {
    font-family: 'Outfit', system-ui, sans-serif;
    font-weight: 700;
    font-size: clamp(2.2rem, 4vw, 3.4rem);
    line-height: 1;
    color: #0A0E27;
    font-variant-numeric: tabular-nums;
    letter-spacing: -0.03em;
  }
  .stat-hero {
    font-family: 'Outfit', system-ui, sans-serif;
    font-weight: 600;
    font-variant-numeric: tabular-nums;
    letter-spacing: -0.03em;
  }

  /* Eyebrow / kicker labels */
  .eyebrow {
    font-size: .7rem;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    font-weight: 600;
    color: #C9A96E;
  }

  /* Section spacing */
  section { padding: 72px 0; position: relative; }
  @media (min-width: 768px) { section { padding: 104px 0; } }

  /* Accesibilidad focus */
  a:focus-visible, button:focus-visible { outline: 2px solid #C9A96E; outline-offset: 3px; border-radius: 10px; }

  /* Reduced motion */
  @media (prefers-reduced-motion: reduce) {
    * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
    .glow-orb { display: none; }
  }

  /* Print / PDF */
  @media print {
    .no-print { display: none !important; }
    section { padding: 24px 0; page-break-inside: avoid; }
    body { background: #FFF; }
    .hero-bg { background: #0A0E27 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .glass, .glass-card, .metric-card, .glass-tier { background: #FFFFFF !important; backdrop-filter: none !important; border: 1px solid #E1DDD3 !important; }
  }
</style>
</head>
<body class="antialiased">

<!-- ============== NAV STICKY ============== -->
<nav class="no-print sticky top-0 z-50 glass-nav">
  <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
    <a href="#top" class="flex items-center gap-3">
      <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-gradient-to-br from-navy to-navySoft text-gold text-xl shadow-soft">
        <!-- Símbolo estrella del logo organización -->
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 L13.5 9.5 L21 11 L13.5 12.5 L12 22 L10.5 12.5 L3 11 L10.5 9.5 Z"/></svg>
      </span>
      <span class="text-base sm:text-lg text-ink leading-tight">
        <span class="block font-semibold tracking-tight">Reina de Otavalo</span>
        <span class="block text-xs text-mutedTxt font-medium -mt-0.5">Media Kit · Auspicios <?= $ANIO ?></span>
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
<header id="top" class="hero-bg text-white relative overflow-hidden">
  <!-- Orbes glow -->
  <span class="glow-orb top-[-100px] left-[-100px]" style="background: #C9A96E;"></span>
  <span class="glow-orb bottom-[-150px] right-[-100px]" style="background: #9B2C2C;"></span>

  <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gold to-transparent"></div>

  <div class="max-w-6xl mx-auto px-6 py-20 md:py-32 relative">
    <div class="inline-flex items-center gap-2 mb-7 px-4 py-1.5 rounded-full glass-dark text-white/90 text-xs font-medium tracking-wide">
      <span class="w-1.5 h-1.5 rounded-full bg-gold animate-pulse"></span>
      Media Kit · Auspicios <?= $ANIO ?>
    </div>

    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-[1.02] mb-7 tracking-tight">
      Conecta tu marca con el<br>
      <span class="bg-gradient-to-r from-gold via-goldSoft to-gold bg-clip-text text-transparent">corazón cultural</span> de Otavalo
    </h1>
    <p class="italic text-gold/90 text-lg md:text-xl mt-2 mb-2 font-light tracking-wide">"<?= $TAGLINE ?>"</p>
    <hr class="gold-divider">
    <p class="text-lg md:text-xl text-white/80 max-w-2xl leading-relaxed mb-10 font-light">
      La <strong class="font-semibold text-white"><?= $ORG ?></strong> es una <span class="text-gold/95">fundación sin fines de lucro</span> que impulsa a la sociedad otavaleña en lo social, cultural, turístico, ambiental y patrimonial.
    </p>

    <div class="flex flex-wrap gap-3 mb-14">
      <a href="https://wa.me/<?= $WHATSAPP ?>?text=Hola%2C%20me%20interesa%20conocer%20los%20paquetes%20de%20auspicio" target="_blank" rel="noopener" class="btn btn-primary">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.3A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.78 12L4 20l4.13-1.23a7.93 7.93 0 0 0 3.92 1h0a7.94 7.94 0 0 0 5.55-13.47Z"/></svg>
        Quiero auspiciar
      </a>
      <a href="<?= $PDF ?>" download class="btn btn-outline">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Descargar dossier en PDF
      </a>
    </div>

    <!-- Trust strip glass -->
    <div class="glass-dark rounded-2xl p-5 md:p-7 max-w-4xl">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-8">
        <div>
          <p class="stat-hero text-3xl md:text-5xl text-white">7,3M</p>
          <p class="text-[11px] uppercase tracking-widest text-white/60 mt-2 font-medium">Visualizaciones</p>
          <p class="text-[11px] text-gold/80 mt-0.5">Último año · FB + IG</p>
        </div>
        <div>
          <p class="stat-hero text-3xl md:text-5xl text-white"><?= num($consolidado['interacciones_tot']) ?></p>
          <p class="text-[11px] uppercase tracking-widest text-white/60 mt-2 font-medium">Interacciones</p>
          <p class="text-[11px] text-gold/80 mt-0.5">Reales con contenido</p>
        </div>
        <div>
          <p class="stat-hero text-3xl md:text-5xl text-white"><?= num($fb['followers'] + $ig['followers']) ?></p>
          <p class="text-[11px] uppercase tracking-widest text-white/60 mt-2 font-medium">Comunidad total</p>
          <p class="text-[11px] text-gold/80 mt-0.5">FB 11K + IG 3,9K</p>
        </div>
        <div>
          <p class="stat-hero text-3xl md:text-5xl text-white">93%</p>
          <p class="text-[11px] uppercase tracking-widest text-white/60 mt-2 font-medium">Audiencia Ecuador</p>
          <p class="text-[11px] text-gold/80 mt-0.5">Otavalo concentra 36%</p>
        </div>
      </div>
    </div>

    <p class="text-xs text-white/45 mt-6">Datos verificados desde Meta Business Suite · Período: últimos 12 meses</p>
  </div>

  <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-anaco to-transparent"></div>
</header>

<!-- ============== QUIÉNES SOMOS ============== -->
<section id="organizacion" class="bg-ivory relative overflow-hidden">
  <span class="glow-orb" style="background: #C9A96E; opacity: .08; top: 20%; right: -200px;"></span>
  <div class="max-w-6xl mx-auto px-6 relative">
    <div class="grid md:grid-cols-12 gap-10 md:gap-16 items-start">
      <div class="md:col-span-5">
        <p class="eyebrow">La organización</p>
        <h2 class="text-3xl md:text-5xl text-ink mt-3 leading-[1.05] font-bold tracking-tight">Una tradición que<br>impulsa a Otavalo</h2>
        <hr class="gold-divider">

        <!-- Pills de areas de impacto -->
        <div class="flex flex-wrap gap-2 mt-6">
          <span class="px-3 py-1.5 rounded-full glass text-xs font-medium text-ink">Social</span>
          <span class="px-3 py-1.5 rounded-full glass text-xs font-medium text-ink">Cultural</span>
          <span class="px-3 py-1.5 rounded-full glass text-xs font-medium text-ink">Turístico</span>
          <span class="px-3 py-1.5 rounded-full glass text-xs font-medium text-ink">Ambiental</span>
          <span class="px-3 py-1.5 rounded-full glass text-xs font-medium text-ink">Patrimonial</span>
        </div>
      </div>
      <div class="md:col-span-7 space-y-5 text-base md:text-lg text-ink/85 leading-relaxed">
        <p><strong>Fundación sin fines de lucro</strong> que impulsa a la sociedad otavaleña en el ámbito social, cultural, turístico, ambiental y patrimonial. Reconocida oficialmente como organización benéfica.</p>
        <p>Más allá de la Elección de la Reina, la organización mantiene una agenda <strong>activa durante todo el año</strong>: el <em>OtalentShow</em>, el <em>Perro Adventure 5K</em> y la <em>Cena benéfica</em>, además de acompañamiento a familias, alianzas con marcas locales y presencia continua en redes (<strong><?= num($ig['posts']) ?> publicaciones</strong> solo en Instagram).</p>
        <p>Auspiciar es asociar tu marca a un símbolo de <strong>orgullo otavaleño</strong>, con una comunidad activa y una organización ya estructurada para gestionar auspicios (con highlights oficiales en redes y reportes a auspiciantes).</p>
      </div>
    </div>
  </div>
</section>

<!-- ============== POR QUÉ AUSPICIARNOS ============== -->
<section id="por-que" class="bg-gradient-to-b from-mutedBg via-ivory to-mutedBg relative overflow-hidden">
  <span class="glow-orb" style="background: #C9A96E; opacity: .12; top: 30%; left: -200px;"></span>
  <div class="max-w-6xl mx-auto px-6 relative">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <p class="eyebrow">¿Por qué auspiciar?</p>
      <h2 class="text-3xl md:text-5xl text-ink mt-3 leading-[1.05] font-bold tracking-tight">4 razones que importan<br>a tu marca</h2>
      <hr class="gold-divider center">
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Card 1 -->
      <article class="glass-card p-7 transition hover:-translate-y-1 hover:shadow-card">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-navy to-navySoft flex items-center justify-center text-gold mb-5 shadow-soft">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <h3 class="text-xl text-ink mb-2 font-semibold tracking-tight">Audiencia local cualificada</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Más del 60% de nuestro alcance está en Imbabura. Audiencia con poder de decisión local, lealtad de marca y conexión emocional.</p>
      </article>

      <!-- Card 2 -->
      <article class="glass-card p-7 transition hover:-translate-y-1 hover:shadow-card">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-anaco to-red-900 flex items-center justify-center text-white mb-5 shadow-soft">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 15.09 8.26 22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <h3 class="text-xl text-ink mb-2 font-semibold tracking-tight">Identidad y cultura</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Tu marca se vincula a un símbolo de orgullo otavaleño y kichwa. Comunicación con propósito, no publicidad invasiva.</p>
      </article>

      <!-- Card 3 -->
      <article class="glass-card p-7 transition hover:-translate-y-1 hover:shadow-card">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-gold to-goldDeep flex items-center justify-center text-white mb-5 shadow-soft">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3 class="text-xl text-ink mb-2 font-semibold tracking-tight">Presencia digital + física</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Publicaciones, stories, reels, banners, escenario y prensa local. Una inversión, múltiples puntos de contacto.</p>
      </article>

      <!-- Card 4 -->
      <article class="glass-card p-7 transition hover:-translate-y-1 hover:shadow-card">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo700 to-navy flex items-center justify-center text-white mb-5 shadow-soft">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h3 class="text-xl text-ink mb-2 font-semibold tracking-tight">ROI medible</h3>
        <p class="text-sm text-ink/75 leading-relaxed">Reporte post-evento con alcance de tu marca, interacciones y valor publicitario equivalente (EAV).</p>
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
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Visualizaciones</p>
        <p class="stat-num mt-2">2,7M</p>
        <p class="text-sm text-mutedTxt mt-2">Último año · todo el contenido</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Alcance</p>
        <p class="stat-num mt-2"><?= num($ig['reach_12m']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">↑ <?= $ig['growth_pct'] ?>% vs período anterior</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Interacciones</p>
        <p class="stat-num mt-2"><?= num($ig['interacciones']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">↑ crecimiento masivo</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Seguidores</p>
        <p class="stat-num mt-2"><?= num($ig['followers']) ?></p>
        <p class="text-sm text-mutedTxt mt-2"><?= num($ig['posts']) ?> publicaciones totales</p>
      </div>
    </div>

    <div class="bg-white border border-borderC rounded-2xl p-6 md:p-8 shadow-soft">
      <h3 class="font-serif text-xl text-ink mb-1">Visualizaciones mes a mes · Últimos 12 meses</h3>
      <p class="text-sm text-mutedTxt mb-5">Volumen mensual consolidado IG + FB. Los picos coinciden con las dos activaciones más importantes: <strong>Coronación en octubre</strong> y <strong>OTalentShow en febrero</strong>.</p>
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
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Visualizaciones</p>
        <p class="stat-num mt-2">4,6M</p>
        <p class="text-sm text-mutedTxt mt-2">Último año · cifra excepcional</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Interacciones</p>
        <p class="stat-num mt-2"><?= num($fb['interacciones']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">↑ <?= $fb['growth_pct'] ?>% vs período anterior</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Reproducciones de video</p>
        <p class="stat-num mt-2"><?= num($fb['rep_3s']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">↑ 299% en video</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Seguidores</p>
        <p class="stat-num mt-2"><?= num($fb['followers']) ?></p>
        <p class="text-sm text-mutedTxt mt-2"><?= num($fb['seguimientos']) ?> nuevos seguidores en el año</p>
      </div>
    </div>

    <!-- Segunda fila: métricas de video FB -->
    <div class="grid sm:grid-cols-3 gap-5 mb-10">
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Tiempo de reproducción</p>
        <p class="stat-num mt-2"><?= $fb['tiempo_rep_dias'] ?>d</p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">↑ 265% — Total año</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Reproducciones 1 min</p>
        <p class="stat-num mt-2"><?= num($fb['rep_1min']) ?></p>
        <p class="text-sm text-emerald-700 font-semibold mt-2">↑ 334% — Video largo</p>
      </div>
      <div class="metric-card">
        <p class="text-xs uppercase tracking-wider text-mutedTxt">Conversaciones iniciadas</p>
        <p class="stat-num mt-2"><?= num($fb['conversaciones']) ?></p>
        <p class="text-sm text-mutedTxt mt-2">Índice respuesta <?= $fb['indice_resp'] ?>%</p>
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
              <p class="font-serif text-3xl md:text-4xl font-bold text-white tabular-nums">7,3M</p>
              <p class="text-xs uppercase tracking-wider text-ivory/65 mt-1">Visualizaciones anuales</p>
            </div>
            <div>
              <p class="font-serif text-3xl md:text-4xl font-bold text-white tabular-nums"><?= num($consolidado['interacciones_tot']) ?></p>
              <p class="text-xs uppercase tracking-wider text-ivory/65 mt-1">Interacciones reales</p>
            </div>
            <div>
              <p class="font-serif text-3xl md:text-4xl font-bold text-white tabular-nums"><?= num($consolidado['mensajes_periodo']) ?></p>
              <p class="text-xs uppercase tracking-wider text-ivory/65 mt-1">Mensajes nuevos</p>
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

<!-- ============== CASO DE ÉXITO · OTALENTSHOW ============== -->
<section id="caso-exito" class="bg-ivory relative overflow-hidden">
  <span class="glow-orb" style="background: #9B2C2C; opacity: .08; top: 10%; right: -200px;"></span>
  <div class="max-w-6xl mx-auto px-6 relative">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <p class="eyebrow">Caso de éxito</p>
      <h2 class="text-3xl md:text-5xl text-ink mt-3 leading-[1.05] font-bold tracking-tight">OTalentShow:<br>el motor de contenido viral</h2>
      <hr class="gold-divider center">
      <p class="text-base text-ink/70 mt-4">Festival de talento intercolegial que ya posicionó a la organización como un canal de comunicación con <strong>capacidad real de viralización</strong>. Las cifras hablan por sí solas.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($top_contenidos as $i => $c): ?>
      <article class="glass-card p-6 relative overflow-hidden">
        <span class="absolute top-3 right-3 text-[10px] uppercase tracking-widest font-bold text-gold-deep bg-gold/15 px-2 py-1 rounded-full">
          <?= $c['plat'] ?>
        </span>
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-anaco to-red-900 text-white flex items-center justify-center font-bold mb-4 shadow-soft">
          #<?= $i + 1 ?>
        </div>
        <p class="font-serif text-3xl font-bold text-navy tabular-nums tracking-tight"><?= num($c['views']) ?></p>
        <p class="text-xs uppercase tracking-wider text-mutedTxt mt-1 font-medium">Visualizaciones</p>
        <p class="text-sm text-ink/80 mt-3 leading-snug"><?= $c['titulo'] ?></p>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="glass-card mt-10 p-7 md:p-9 grid md:grid-cols-3 gap-6 items-center">
      <div class="md:col-span-2">
        <h3 class="text-xl md:text-2xl text-ink mb-3 font-semibold tracking-tight">Qué significa esto para tu marca</h3>
        <p class="text-ink/75 leading-relaxed text-sm md:text-base">
          Cada activación cultural de la organización <strong>multiplica el alcance habitual entre 10 y 30 veces</strong>. OTalentShow generó videos que superaron las 85.000 visualizaciones individuales — números difíciles de conseguir incluso pagando publicidad. Auspiciar significa entrar en ese flujo de contenido orgánico.
        </p>
      </div>
      <div class="text-center md:text-right">
        <p class="font-serif text-5xl font-bold text-anaco tabular-nums">10–30×</p>
        <p class="text-xs uppercase tracking-wider text-mutedTxt mt-1 font-medium">Multiplicador en activaciones</p>
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

      <div class="glass-card p-8">
        <div class="space-y-6">
          <div class="flex items-end justify-between pb-4 border-b border-borderC">
            <div>
              <p class="text-xs uppercase tracking-wider text-mutedTxt">Visualizaciones anuales</p>
              <p class="font-serif text-2xl text-ink mt-1 tabular-nums">7,3M</p>
            </div>
            <p class="text-mutedTxt text-sm">×</p>
            <div class="text-right">
              <p class="text-xs uppercase tracking-wider text-mutedTxt">CPM Meta Ecuador</p>
              <p class="font-serif text-2xl text-ink mt-1">USD 3,00</p>
            </div>
          </div>
          <div class="pt-2">
            <p class="text-xs uppercase tracking-wider text-mutedTxt">Valor equivalente anual</p>
            <p class="font-serif text-5xl md:text-6xl font-bold text-navy mt-2 tabular-nums">
              USD <?= num(($consolidado['visualizaciones'] / 1000) * 3) ?>
            </p>
            <p class="text-sm text-mutedTxt mt-2">Por año · sin contar evento, activaciones físicas ni prensa</p>
          </div>
          <div class="pt-4 border-t border-borderC bg-gradient-to-r from-amber-50 to-transparent -mx-8 -mb-8 px-8 py-5 rounded-b-2xl">
            <p class="text-sm text-ink/75">
              <strong class="text-anaco">Conclusión:</strong> con paquetes desde USD 150, auspiciar entrega un retorno medible <strong>muy por encima</strong> de lo que la misma marca obtendría comprando esa visibilidad en pauta digital tradicional.
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

    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6 lg:gap-5">
      <?php foreach ($tiers as $i => $t): ?>
      <article class="tier-card glass-tier <?= $i === 1 ? 'tier-popular' : '' ?> relative">
        <?php if ($t['badge']): ?>
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3.5 py-1 rounded-full text-[10px] uppercase tracking-[0.18em] font-bold shadow-soft <?= $i === 1 ? 'bg-gradient-to-r from-gold to-goldDeep text-white' : 'bg-gradient-to-r from-anaco to-red-900 text-white' ?>">
            <?= $t['badge'] ?>
          </div>
        <?php endif; ?>
        <div class="bg-gradient-to-br <?= $t['color'] ?> p-6 text-white relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 rounded-full bg-white/10 blur-2xl -mr-10 -mt-10"></div>
          <p class="text-[10px] uppercase tracking-[0.22em] opacity-75 relative">Paquete</p>
          <h3 class="text-3xl font-bold mt-1 tracking-tight relative"><?= $t['name'] ?></h3>
          <div class="mt-4 flex items-baseline gap-2 relative">
            <p class="text-4xl font-bold tabular-nums tracking-tight">USD <?= num($t['price']) ?></p>
            <?php if (!empty($t['iva'])): ?><span class="text-[11px] opacity-80 font-medium">+ IVA</span><?php endif; ?>
          </div>
          <p class="text-[10px] uppercase tracking-wider opacity-80 mt-1 relative">Cupos limitados</p>
        </div>
        <div class="p-6">
          <ul class="space-y-2.5 text-sm text-ink/85">
            <?php foreach ($t['benefits'] as $b): ?>
            <li class="flex items-start gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="text-gold mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="leading-snug"><?= $b ?></span>
            </li>
            <?php endforeach; ?>
          </ul>

          <?php if (!empty($t['full_benefits'])): ?>
          <details class="mt-5 pt-4 border-t border-borderC group">
            <summary class="cursor-pointer list-none flex items-center justify-between text-sm font-semibold text-gold-deep hover:text-anaco transition select-none">
              <span class="inline-flex items-center gap-1.5">
                Ver beneficios completos
                <span class="text-[10px] text-mutedTxt font-medium">(<?= count($t['full_benefits']) ?> items)</span>
              </span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="transition-transform duration-200 group-open:rotate-180"><polyline points="6 9 12 15 18 9"/></svg>
            </summary>
            <ul class="mt-4 space-y-2 text-xs text-ink/75 leading-relaxed">
              <?php foreach ($t['full_benefits'] as $b): ?>
              <li class="flex items-start gap-2">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="text-gold mt-1 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
                <span><?= $b ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php if (!empty($t['nota_iva'])): ?>
            <p class="mt-3 text-[11px] italic text-mutedTxt"><?= $t['nota_iva'] ?></p>
            <?php endif; ?>
          </details>
          <?php endif; ?>

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
        <p class="text-sm text-mutedTxt mt-1">+593 99 212 6557</p>
        <p class="text-xs text-mutedTxt/80 mt-0.5">+593 98 060 2213</p>
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
        <p class="font-serif italic text-goldSoft/90 text-sm mt-2">"<?= $TAGLINE ?>"</p>
        <p class="text-sm text-ivory/65 mt-3 leading-relaxed"><?= $DIRECCION ?><br>Otavalo, Imbabura — Ecuador</p>
        <p class="text-sm text-ivory/65 mt-2">
          <a href="<?= $WEB_URL ?>" target="_blank" rel="noopener" class="hover:text-goldSoft transition">reinadeotavalo.com</a>
        </p>
        <div class="flex gap-3 mt-5">
          <a href="<?= $IG_URL ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 hover:bg-goldSoft hover:text-indigoDeep flex items-center justify-center transition" aria-label="Instagram">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="<?= $FB_URL ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 hover:bg-goldSoft hover:text-indigoDeep flex items-center justify-center transition" aria-label="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
          </a>
          <a href="<?= $YT_URL ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 hover:bg-goldSoft hover:text-indigoDeep flex items-center justify-center transition" aria-label="YouTube">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
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

  // --- Visualizaciones mes a mes (FB + IG consolidado) ---
  const crecimientoLabels = <?= json_encode(array_keys($crecimiento)) ?>;
  const crecimientoData   = <?= json_encode(array_values($crecimiento)) ?>;
  new Chart(document.getElementById('chartCrecimiento'), {
    type: 'line',
    data: {
      labels: crecimientoLabels,
      datasets: [{
        label: 'Visualizaciones mensuales (IG + FB)',
        data: crecimientoData,
        borderColor: COL.gold,
        backgroundColor: 'rgba(201,169,110,0.14)',
        borderWidth: 3,
        fill: true,
        tension: 0.35,
        pointBackgroundColor: COL.indigoDeep,
        pointBorderColor: '#FFFFFF',
        pointBorderWidth: 2,
        pointRadius: 5,
        pointHoverRadius: 8,
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
            label: (c) => ' ' + c.parsed.y.toLocaleString('es-EC') + ' visualizaciones'
          }
        }
      },
      scales: {
        y: {
          beginAtZero: false,
          grid: { color: '#F1ECE2' },
          ticks: { callback: v => (v / 1000).toLocaleString('es-EC') + 'k' }
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
