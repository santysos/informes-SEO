<?php
session_start();
if (!isset($_SESSION['auth_lts']) || $_SESSION['auth_lts'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demo Configurador · Leather in the Skin</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Inter', sans-serif; background: #0a0a0a; color: #f5f5f5; min-height: 100vh; }
  .font-display { font-family: 'Playfair Display', serif; }
  .glass {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px) saturate(160%);
    border: 1px solid rgba(255,255,255,0.06);
  }
  .glass-leather {
    background: linear-gradient(135deg, rgba(168,112,71,0.12), rgba(82,51,33,0.06));
    backdrop-filter: blur(20px) saturate(160%);
    border: 1px solid rgba(212,179,147,0.18);
  }
  .leather-gradient {
    background: linear-gradient(135deg, #1f140d 0%, #3a2418 50%, #523321 100%);
  }
  .gold-text {
    background: linear-gradient(135deg, #d4b393 0%, #bf906a 50%, #a87047 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .hero-bg {
    background:
      radial-gradient(circle at 20% 30%, rgba(168,112,71,0.18) 0%, transparent 50%),
      radial-gradient(circle at 80% 70%, rgba(110,69,41,0.12) 0%, transparent 50%),
      #0a0a0a;
    min-height: 100vh;
  }

  /* Pool de logos arrastrables */
  .logo-chip {
    cursor: grab;
    user-select: none;
    transition: all 0.2s ease;
  }
  .logo-chip:hover { transform: scale(1.06); border-color: rgba(212,179,147,0.6); }
  .logo-chip:active { cursor: grabbing; transform: scale(0.95); }
  .logo-chip.selected {
    border-color: #d4b393 !important;
    box-shadow: 0 0 0 3px rgba(212,179,147,0.35);
  }

  /* Drop zones */
  .drop-zone {
    fill: rgba(212,179,147,0.0);
    stroke: rgba(212,179,147,0.25);
    stroke-dasharray: 6 4;
    stroke-width: 1.5;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .drop-zone:hover, .drop-zone.over {
    fill: rgba(212,179,147,0.18);
    stroke: #d4b393;
    stroke-width: 2;
  }

  /* Logo colocado sobre la chompa */
  .placed-logo {
    cursor: pointer;
    transition: all 0.15s ease;
  }
  .placed-logo:hover { filter: drop-shadow(0 0 8px rgba(255,80,80,0.6)); }
  .placed-logo:hover circle:first-child {
    fill: rgba(255,80,80,0.2);
  }

  /* Animación zona aceptando */
  @keyframes pulse-accept {
    0%, 100% { fill: rgba(143,225,89,0.18); }
    50% { fill: rgba(143,225,89,0.35); }
  }
  .drop-zone.accept { animation: pulse-accept 0.6s ease 2; }

  /* Precio en vivo - animación */
  @keyframes price-bump {
    0% { transform: scale(1); }
    40% { transform: scale(1.15); color: #d4b393; }
    100% { transform: scale(1); }
  }
  .bump { animation: price-bump 0.5s ease; }

  /* Tabs vista */
  .view-btn { transition: all 0.3s ease; }
  .view-btn.active {
    background: linear-gradient(135deg, #a87047, #6e4529);
    color: white;
    box-shadow: 0 8px 24px rgba(168,112,71,0.35);
  }

  /* Mobile drag hint */
  @media (max-width: 768px) {
    .mobile-hint { display: block; }
  }
  .mobile-hint { display: none; }
</style>
</head>
<body class="hero-bg">

<!-- HEADER -->
<header class="border-b border-white/5">
  <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="w-12 h-12 rounded-lg leather-gradient flex items-center justify-center font-display font-black text-leather-200" style="color:#d4b393">LTS</div>
      <div>
        <p class="text-xs text-leather-300 tracking-widest uppercase" style="color:#d4b393">Demo interactivo</p>
        <p class="text-base font-bold">Configurador drag-and-drop</p>
      </div>
    </div>
    <a href="index.php" class="hidden md:inline-flex px-5 py-2.5 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-sm font-semibold">
      ← Volver a la proforma
    </a>
  </div>
</header>

<!-- INTRO -->
<section class="max-w-7xl mx-auto px-6 pt-10 pb-6 text-center">
  <p class="badge text-leather-300 mb-2 uppercase tracking-widest text-xs" style="color:#d4b393">Cómo funcionará en su web</p>
  <h1 class="font-display text-3xl md:text-5xl font-black mb-3">
    Diseñe su <span class="gold-text">chompa de cuero</span> en tiempo real
  </h1>
  <p class="text-leather-200 max-w-2xl mx-auto" style="color:#d4b393">
    Arrastre los logos sobre la chompa, escriba un monograma, cambie el color. El precio se actualiza al instante con cada cambio.
  </p>
  <p class="mobile-hint mt-3 text-xs text-amber-300">📱 En móvil: toque un logo para seleccionarlo, luego toque la zona donde quiere colocarlo.</p>
</section>

<!-- WORKSPACE -->
<section class="max-w-7xl mx-auto px-4 md:px-6 pb-20">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-4 md:gap-6">

  <!-- SIDEBAR IZQUIERDA: POOL DE LOGOS -->
  <aside class="lg:col-span-3 glass rounded-2xl p-5">
    <p class="text-xs uppercase tracking-widest mb-4" style="color:#d4b393">① Logos de marca</p>
    <p class="text-xs text-white/60 mb-4">Arrastre cualquiera sobre la chompa (+$10 c/u)</p>

    <div id="logo-pool" class="grid grid-cols-3 gap-3">
      <!-- Logos generados por JS -->
    </div>

    <p class="text-xs uppercase tracking-widest mt-6 mb-3" style="color:#d4b393">② Marca de moto</p>
    <div id="moto-pool" class="grid grid-cols-3 gap-3">
      <!-- Marcas moto -->
    </div>
  </aside>

  <!-- CENTRO: LIENZO -->
  <main class="lg:col-span-6 glass-leather rounded-2xl p-4 md:p-6">

    <!-- Tabs vista -->
    <div class="flex items-center justify-center gap-2 mb-4">
      <button id="btn-front" class="view-btn active px-5 py-2 rounded-lg text-sm font-bold bg-white/5">Frontal</button>
      <button id="btn-back" class="view-btn px-5 py-2 rounded-lg text-sm font-bold bg-white/5">Trasera</button>
      <button id="btn-reset" class="ml-auto px-4 py-2 rounded-lg text-xs font-semibold bg-red-500/15 text-red-300 border border-red-500/30 hover:bg-red-500/25">Resetear</button>
    </div>

    <!-- SVG CHOMPA -->
    <div id="canvas-wrap" class="relative bg-gradient-to-b from-leather-950/40 to-black/40 rounded-xl overflow-hidden" style="aspect-ratio:1/1;">

      <!-- FRONT VIEW -->
      <svg id="svg-front" viewBox="0 0 600 600" class="w-full h-full">
        <!-- Sombra de fondo -->
        <ellipse cx="300" cy="555" rx="180" ry="14" fill="rgba(0,0,0,0.4)"/>

        <!-- Cuello -->
        <path d="M 260 60 L 260 100 Q 260 110 270 110 L 330 110 Q 340 110 340 100 L 340 60 Z"
              fill="#0e0e0e" stroke="#3a2418" stroke-width="1.5"/>
        <rect x="270" y="68" width="60" height="8" fill="#2a2a2a"/>

        <!-- Hombros + cuerpo -->
        <path id="body-front" d="
          M 200 110 Q 240 95 260 100
          L 260 130
          Q 300 125 340 130
          L 340 100
          Q 360 95 400 110
          L 440 180
          L 440 460
          Q 440 480 420 485
          L 180 485
          Q 160 480 160 460
          L 160 180 Z"
          fill="#f5f5f5" stroke="#2a2a2a" stroke-width="2"/>

        <!-- Cremallera central -->
        <line x1="300" y1="110" x2="300" y2="475" stroke="#1a1a1a" stroke-width="2" stroke-dasharray="6 3"/>
        <circle cx="300" cy="110" r="6" fill="#a87047" stroke="#3a2418" stroke-width="1.5"/>

        <!-- Paneles negros laterales (estilo Rizen) -->
        <path d="M 200 110 Q 240 95 260 100 L 260 130 Q 240 135 215 145 L 200 110 Z" fill="#1a1a1a"/>
        <path d="M 400 110 Q 360 95 340 100 L 340 130 Q 360 135 385 145 L 400 110 Z" fill="#1a1a1a"/>

        <!-- Cintura/hebillas -->
        <rect x="175" y="445" width="40" height="14" rx="2" fill="#1a1a1a" stroke="#3a2418" stroke-width="1"/>
        <rect x="385" y="445" width="40" height="14" rx="2" fill="#1a1a1a" stroke="#3a2418" stroke-width="1"/>

        <!-- MANGAS frontal -->
        <!-- Manga izq -->
        <path id="sleeve-left-front" d="M 200 110 L 130 200 L 80 380 L 70 470 Q 70 485 85 488 L 145 488 Q 158 485 162 472 L 175 420 L 200 250 Z"
              fill="#f5f5f5" stroke="#2a2a2a" stroke-width="2"/>
        <!-- Codera negra izq -->
        <path d="M 100 270 L 130 245 L 155 350 L 125 370 Z" fill="#1a1a1a"/>
        <!-- Banda blanca lateral con texto -->
        <rect x="78" y="395" width="48" height="80" fill="#0e0e0e"/>
        <text x="102" y="442" text-anchor="middle" fill="#f5f5f5" font-family="Inter" font-weight="900" font-size="14" transform="rotate(-90 102 442)" letter-spacing="2">RIZEN</text>

        <!-- Manga der -->
        <path id="sleeve-right-front" d="M 400 110 L 470 200 L 520 380 L 530 470 Q 530 485 515 488 L 455 488 Q 442 485 438 472 L 425 420 L 400 250 Z"
              fill="#f5f5f5" stroke="#2a2a2a" stroke-width="2"/>
        <!-- Codera negra der -->
        <path d="M 500 270 L 470 245 L 445 350 L 475 370 Z" fill="#1a1a1a"/>
        <!-- Banda blanca lateral con texto -->
        <rect x="474" y="395" width="48" height="80" fill="#0e0e0e"/>
        <text x="498" y="442" text-anchor="middle" fill="#f5f5f5" font-family="Inter" font-weight="900" font-size="14" transform="rotate(-90 498 442)" letter-spacing="2">RIZEN</text>

        <!-- Drop zones frontales -->
        <g id="drop-zones-front">
          <rect class="drop-zone" data-zone="hombro-izq-f" x="205" y="115" width="55" height="40" rx="6"/>
          <rect class="drop-zone" data-zone="hombro-der-f" x="340" y="115" width="55" height="40" rx="6"/>
          <rect class="drop-zone" data-zone="pecho-izq-f" x="170" y="180" width="120" height="100" rx="8"/>
          <rect class="drop-zone" data-zone="pecho-der-f" x="310" y="180" width="120" height="100" rx="8"/>
          <rect class="drop-zone" data-zone="manga-izq-f" x="85" y="280" width="70" height="80" rx="6"/>
          <rect class="drop-zone" data-zone="manga-der-f" x="445" y="280" width="70" height="80" rx="6"/>
        </g>

        <!-- Capa donde se colocan los logos -->
        <g id="placed-front"></g>

        <!-- Capa monograma frontal -->
        <g id="monograma-front"></g>
      </svg>

      <!-- BACK VIEW -->
      <svg id="svg-back" viewBox="0 0 600 600" class="w-full h-full hidden">
        <ellipse cx="300" cy="555" rx="180" ry="14" fill="rgba(0,0,0,0.4)"/>

        <!-- Cuello (vista trasera) -->
        <path d="M 270 70 Q 300 60 330 70 L 330 95 L 270 95 Z"
              fill="#0e0e0e" stroke="#3a2418" stroke-width="1.5"/>

        <!-- Cuerpo trasero (espalda completa) -->
        <path id="body-back" d="
          M 200 110 Q 240 95 270 95
          L 330 95
          Q 360 95 400 110
          L 440 180
          L 440 460
          Q 440 480 420 485
          L 180 485
          Q 160 480 160 460
          L 160 180 Z"
          fill="#f5f5f5" stroke="#2a2a2a" stroke-width="2"/>

        <!-- Joroba aerodinámica (back hump) -->
        <path d="M 240 130 Q 300 110 360 130 L 370 240 Q 300 230 230 240 Z"
              fill="#1a1a1a" opacity="0.85"/>
        <ellipse cx="300" cy="170" rx="55" ry="22" fill="#0e0e0e"/>

        <!-- MANGAS traseras -->
        <path d="M 200 110 L 130 200 L 80 380 L 70 470 Q 70 485 85 488 L 145 488 Q 158 485 162 472 L 175 420 L 200 250 Z"
              fill="#f5f5f5" stroke="#2a2a2a" stroke-width="2"/>
        <path d="M 100 270 L 130 245 L 155 350 L 125 370 Z" fill="#1a1a1a"/>
        <path d="M 400 110 L 470 200 L 520 380 L 530 470 Q 530 485 515 488 L 455 488 Q 442 485 438 472 L 425 420 L 400 250 Z"
              fill="#f5f5f5" stroke="#2a2a2a" stroke-width="2"/>
        <path d="M 500 270 L 470 245 L 445 350 L 475 370 Z" fill="#1a1a1a"/>

        <!-- Drop zones traseras -->
        <g id="drop-zones-back">
          <rect class="drop-zone" data-zone="hombro-izq-b" x="205" y="115" width="55" height="40" rx="6"/>
          <rect class="drop-zone" data-zone="hombro-der-b" x="340" y="115" width="55" height="40" rx="6"/>
          <rect class="drop-zone" data-zone="espalda-superior" x="200" y="250" width="200" height="80" rx="10"/>
          <rect class="drop-zone" data-zone="espalda-inferior" x="200" y="340" width="200" height="120" rx="10"/>
          <rect class="drop-zone" data-zone="manga-izq-b" x="85" y="280" width="70" height="80" rx="6"/>
          <rect class="drop-zone" data-zone="manga-der-b" x="445" y="280" width="70" height="80" rx="6"/>
        </g>

        <g id="placed-back"></g>
        <g id="monograma-back"></g>
      </svg>
    </div>

    <p class="text-xs text-center mt-3 text-white/50">Las áreas punteadas son zonas donde puede colocar logos. Click en un logo colocado para quitarlo.</p>
  </main>

  <!-- SIDEBAR DERECHA: CONFIG + PRECIO -->
  <aside class="lg:col-span-3 space-y-4">

    <!-- COLOR -->
    <div class="glass rounded-2xl p-5">
      <p class="text-xs uppercase tracking-widest mb-3" style="color:#d4b393">③ Color principal</p>
      <p class="text-xs text-white/60 mb-3">Incluido en el precio base</p>
      <div class="grid grid-cols-5 gap-2">
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition active-color" data-color="#f5f5f5" style="background:#f5f5f5"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#1a1a1a" style="background:#1a1a1a"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#8b1a1a" style="background:#8b1a1a"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#1e3a5f" style="background:#1e3a5f"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#523321" style="background:#523321"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#a87047" style="background:#a87047"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#b8a44c" style="background:#b8a44c"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#3a5f1e" style="background:#3a5f1e"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#ff6b1a" style="background:#ff6b1a"></button>
        <button class="color-swatch w-full aspect-square rounded-lg border-2 border-white/20 hover:scale-110 transition" data-color="#888888" style="background:#888888"></button>
      </div>
    </div>

    <!-- MONOGRAMA -->
    <div class="glass rounded-2xl p-5">
      <p class="text-xs uppercase tracking-widest mb-3" style="color:#d4b393">④ Monograma</p>
      <p class="text-xs text-white/60 mb-3">Su nombre, número o iniciales (+$10)</p>
      <input id="monograma-input" type="text" maxlength="12" placeholder="Ej: VANHOVE 7"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/15 text-white placeholder-white/30 text-sm focus:outline-none focus:border-leather-300"/>
      <div class="mt-3 flex gap-2 text-xs">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="mono-pos" value="back" checked class="accent-amber-700"/> Espalda
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="mono-pos" value="chest" class="accent-amber-700"/> Pecho
        </label>
      </div>
    </div>

    <!-- PRECIO -->
    <div class="glass-leather rounded-2xl p-5">
      <p class="text-xs uppercase tracking-widest mb-2" style="color:#d4b393">Resumen del pedido</p>

      <div class="space-y-1.5 text-sm mt-3">
        <div class="flex justify-between text-white/80">
          <span>Precio base chompa</span>
          <span class="font-mono">$ <span id="base-price">280</span></span>
        </div>
        <div class="flex justify-between text-white/80">
          <span>Logos (<span id="count-logos">0</span> × $10)</span>
          <span class="font-mono">$ <span id="logos-price">0</span></span>
        </div>
        <div class="flex justify-between text-white/80">
          <span>Monograma</span>
          <span class="font-mono">$ <span id="mono-price">0</span></span>
        </div>
      </div>

      <div class="mt-4 pt-4 border-t border-leather-300/20">
        <div class="flex items-end justify-between">
          <span class="text-sm uppercase tracking-widest" style="color:#d4b393">Total</span>
          <p class="font-display text-4xl font-black gold-text" id="total-price">$ 280</p>
        </div>
      </div>

      <button id="btn-whatsapp" class="mt-5 w-full px-4 py-3 rounded-xl bg-green-600 hover:bg-green-500 text-white font-bold text-sm transition flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.6 6.32A8 8 0 0 0 6.27 17.65L5 22l4.46-1.17a8 8 0 0 0 11.81-6.95 8 8 0 0 0-3.66-7.56zm-5.6 12.32a6.65 6.65 0 0 1-3.39-.93l-.24-.14-2.5.66.67-2.44-.16-.25a6.66 6.66 0 1 1 5.62 3.1zm3.65-4.99c-.2-.1-1.18-.58-1.36-.65s-.32-.1-.45.1-.52.65-.64.78-.24.15-.44.05a5.46 5.46 0 0 1-2.72-2.38c-.2-.35.2-.33.59-1.09a.37.37 0 0 0 0-.35c-.05-.1-.45-1.08-.62-1.48s-.33-.34-.45-.34h-.38a.74.74 0 0 0-.54.25 2.26 2.26 0 0 0-.7 1.67 3.92 3.92 0 0 0 .82 2.07 8.97 8.97 0 0 0 3.44 3.03c.48.21.86.33 1.15.42a2.78 2.78 0 0 0 1.27.08 2.07 2.07 0 0 0 1.36-.96 1.69 1.69 0 0 0 .12-.96c-.05-.08-.18-.13-.38-.23z"/></svg>
        Solicitar este modelo
      </button>
    </div>

    <!-- CAMBIOS -->
    <div id="changes-log" class="glass rounded-2xl p-5 max-h-48 overflow-y-auto hidden">
      <p class="text-xs uppercase tracking-widest mb-2" style="color:#d4b393">Cambios aplicados</p>
      <ul id="changes-list" class="space-y-1 text-xs text-white/70"></ul>
    </div>
  </aside>

</div>

<!-- NOTA INFORMATIVA -->
<div class="glass rounded-2xl p-6 mt-8 text-center">
  <p class="text-sm text-white/70">
    Esta demo es <strong style="color:#d4b393">un bosquejo funcional</strong> del configurador que construiremos en su web definitiva.
    El producto final tendrá fotografía real de las 5 chompas LTS, biblioteca ampliada de logos oficiales con licencia, integración con WooCommerce y envío automático del diseño al taller de Cotacachi.
  </p>
</div>

</section>

<footer class="border-t border-white/5 py-8 text-center text-leather-300/60 text-sm" style="color:#a87047">
  <p>© 2026 Creative Web · Demo desarrollado para Leather in the Skin · creativeweb.com.ec</p>
</footer>

<script>
// ============================================================
//  CONFIGURACIÓN DE LOGOS
// ============================================================
const LOGOS_MARCA = [
  { id: 'pirelli',  label: 'PIRELLI',  color: '#FFD700' },
  { id: 'michelin', label: 'MICHELIN', color: '#0033A0' },
  { id: 'alpine',   label: 'ALPINE',   color: '#FF6600' },
  { id: 'brembo',   label: 'BREMBO',   color: '#E60000' },
  { id: 'akra',     label: 'AKRAPOVIC',color: '#222222' },
  { id: 'shoei',    label: 'SHOEI',    color: '#0066CC' },
];

const LOGOS_MOTO = [
  { id: 'bmw',     label: 'BMW',     color: '#0166B1' },
  { id: 'honda',   label: 'HONDA',   color: '#CC0000' },
  { id: 'ducati',  label: 'DUCATI',  color: '#CC0000' },
  { id: 'yamaha',  label: 'YAMAHA',  color: '#003D7A' },
  { id: 'ktm',     label: 'KTM',     color: '#FF6600' },
  { id: 'kawa',    label: 'KAWASAKI',color: '#00A651' },
];

const PRICE_PER_LOGO = 10;
const PRICE_MONO     = 10;
const PRICE_BASE     = 280;

// ============================================================
//  ESTADO
// ============================================================
const state = {
  view: 'front',
  bodyColor: '#f5f5f5',
  placedLogos: [], // {id, label, color, side, zone, x, y}
  mono: '',
  monoSide: 'back',
  changes: []
};

// ============================================================
//  RENDER DEL POOL DE LOGOS
// ============================================================
function renderPool(containerId, list) {
  const pool = document.getElementById(containerId);
  pool.innerHTML = list.map(l => `
    <div class="logo-chip rounded-lg p-2 text-center border-2 border-white/10 bg-white/5"
         draggable="true" data-logo='${JSON.stringify(l)}' style="background:${l.color}22">
      <div class="font-display font-black text-[10px] leading-tight" style="color:${l.color === '#222222' ? '#fff' : l.color}; text-shadow:0 0 6px rgba(0,0,0,0.5)">${l.label}</div>
    </div>
  `).join('');
}

renderPool('logo-pool', LOGOS_MARCA);
renderPool('moto-pool', LOGOS_MOTO);

// ============================================================
//  DRAG & DROP — DESKTOP
// ============================================================
let dragging = null;

document.querySelectorAll('.logo-chip').forEach(chip => {
  chip.addEventListener('dragstart', e => {
    dragging = JSON.parse(chip.dataset.logo);
    e.dataTransfer.effectAllowed = 'copy';
    e.dataTransfer.setData('text/plain', chip.dataset.logo);
  });
  // TAP mobile: seleccionar
  chip.addEventListener('click', () => {
    document.querySelectorAll('.logo-chip').forEach(c => c.classList.remove('selected'));
    chip.classList.add('selected');
    dragging = JSON.parse(chip.dataset.logo);
  });
});

document.querySelectorAll('.drop-zone').forEach(zone => {
  zone.addEventListener('dragover', e => {
    e.preventDefault();
    zone.classList.add('over');
  });
  zone.addEventListener('dragleave', () => zone.classList.remove('over'));
  zone.addEventListener('drop', e => {
    e.preventDefault();
    zone.classList.remove('over');
    if (dragging) {
      const bbox = zone.getBBox();
      const cx = bbox.x + bbox.width/2;
      const cy = bbox.y + bbox.height/2;
      placeLogo(dragging, zone.dataset.zone, cx, cy);
      zone.classList.add('accept');
      setTimeout(() => zone.classList.remove('accept'), 1200);
      dragging = null;
    }
  });
  // TAP mobile: colocar si hay seleccionado
  zone.addEventListener('click', () => {
    if (dragging) {
      const bbox = zone.getBBox();
      const cx = bbox.x + bbox.width/2;
      const cy = bbox.y + bbox.height/2;
      placeLogo(dragging, zone.dataset.zone, cx, cy);
      document.querySelectorAll('.logo-chip').forEach(c => c.classList.remove('selected'));
      dragging = null;
    }
  });
});

// ============================================================
//  PLACE / REMOVE LOGO
// ============================================================
function placeLogo(logo, zone, x, y) {
  const side = state.view; // 'front' o 'back'
  const layer = document.getElementById('placed-' + side);
  const uid = 'lg_' + Date.now() + '_' + Math.floor(Math.random()*999);

  const fontColor = logo.color === '#222222' ? '#ffffff' : logo.color;
  const group = document.createElementNS('http://www.w3.org/2000/svg', 'g');
  group.setAttribute('class', 'placed-logo');
  group.setAttribute('data-uid', uid);
  group.setAttribute('transform', `translate(${x}, ${y})`);
  group.innerHTML = `
    <circle r="22" fill="${logo.color}" opacity="0.95" stroke="rgba(0,0,0,0.3)" stroke-width="1"/>
    <text text-anchor="middle" dy=".35em" font-family="Inter" font-weight="900" font-size="9" fill="${fontColor === logo.color ? '#fff' : '#fff'}">
      ${logo.label.substring(0,8)}
    </text>
  `;
  layer.appendChild(group);

  group.addEventListener('click', () => {
    group.remove();
    state.placedLogos = state.placedLogos.filter(l => l.uid !== uid);
    logChange(`✗ Removido: ${logo.label}`);
    updatePrice(true);
  });

  state.placedLogos.push({ uid, ...logo, side, zone, x, y });
  logChange(`✓ ${logo.label} colocado en ${prettyZone(zone)}`);
  updatePrice(true);
}

function prettyZone(z) {
  const map = {
    'hombro-izq-f': 'hombro izquierdo (frontal)',
    'hombro-der-f': 'hombro derecho (frontal)',
    'pecho-izq-f': 'pecho izquierdo',
    'pecho-der-f': 'pecho derecho',
    'manga-izq-f': 'manga izquierda',
    'manga-der-f': 'manga derecha',
    'hombro-izq-b': 'hombro izquierdo (trasera)',
    'hombro-der-b': 'hombro derecho (trasera)',
    'espalda-superior': 'espalda superior',
    'espalda-inferior': 'espalda inferior',
    'manga-izq-b': 'manga izquierda (trasera)',
    'manga-der-b': 'manga derecha (trasera)',
  };
  return map[z] || z;
}

// ============================================================
//  VISTAS FRONTAL / TRASERA
// ============================================================
document.getElementById('btn-front').addEventListener('click', () => setView('front'));
document.getElementById('btn-back').addEventListener('click',  () => setView('back'));

function setView(v) {
  state.view = v;
  document.getElementById('svg-front').classList.toggle('hidden', v !== 'front');
  document.getElementById('svg-back').classList.toggle('hidden',  v !== 'back');
  document.getElementById('btn-front').classList.toggle('active', v === 'front');
  document.getElementById('btn-back').classList.toggle('active',  v === 'back');
}

// ============================================================
//  COLOR PICKER
// ============================================================
document.querySelectorAll('.color-swatch').forEach(sw => {
  sw.addEventListener('click', () => {
    const c = sw.dataset.color;
    state.bodyColor = c;
    document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('active-color', 'ring-2', 'ring-amber-400'));
    sw.classList.add('active-color', 'ring-2', 'ring-amber-400');
    document.getElementById('body-front').setAttribute('fill', c);
    document.getElementById('body-back').setAttribute('fill', c);
    document.getElementById('sleeve-left-front').setAttribute('fill', c);
    document.getElementById('sleeve-right-front').setAttribute('fill', c);
    logChange(`✓ Color cambiado a ${c}`);
  });
});

// ============================================================
//  MONOGRAMA
// ============================================================
document.getElementById('monograma-input').addEventListener('input', e => {
  state.mono = e.target.value.trim().toUpperCase();
  renderMonograma();
  updatePrice(true);
});

document.querySelectorAll('input[name="mono-pos"]').forEach(r => {
  r.addEventListener('change', e => {
    state.monoSide = e.target.value;
    renderMonograma();
  });
});

function renderMonograma() {
  ['front', 'back'].forEach(side => {
    const layer = document.getElementById('monograma-' + side);
    layer.innerHTML = '';
    if (!state.mono) return;
    let x, y;
    if (state.monoSide === 'back' && side === 'back') {
      x = 300; y = 400;
    } else if (state.monoSide === 'chest' && side === 'front') {
      x = 380; y = 200;
    } else {
      return;
    }
    const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    text.setAttribute('x', x);
    text.setAttribute('y', y);
    text.setAttribute('text-anchor', 'middle');
    text.setAttribute('font-family', 'Playfair Display');
    text.setAttribute('font-weight', '900');
    text.setAttribute('font-size', state.monoSide === 'back' ? '32' : '18');
    text.setAttribute('fill', '#1a1a1a');
    text.setAttribute('stroke', '#fff');
    text.setAttribute('stroke-width', '0.5');
    text.textContent = state.mono;
    layer.appendChild(text);
  });
}

// ============================================================
//  PRECIO
// ============================================================
function updatePrice(animate=false) {
  const nLogos = state.placedLogos.length;
  const monoExtra = state.mono ? PRICE_MONO : 0;
  const total = PRICE_BASE + (nLogos * PRICE_PER_LOGO) + monoExtra;

  document.getElementById('count-logos').textContent = nLogos;
  document.getElementById('logos-price').textContent = nLogos * PRICE_PER_LOGO;
  document.getElementById('mono-price').textContent  = monoExtra;
  const totalEl = document.getElementById('total-price');
  totalEl.textContent = `$ ${total}`;
  if (animate) {
    totalEl.classList.remove('bump');
    void totalEl.offsetWidth;
    totalEl.classList.add('bump');
  }
}

// ============================================================
//  RESET
// ============================================================
document.getElementById('btn-reset').addEventListener('click', () => {
  if (!confirm('¿Resetear toda la personalización?')) return;
  state.placedLogos = [];
  state.mono = '';
  state.bodyColor = '#f5f5f5';
  document.getElementById('placed-front').innerHTML = '';
  document.getElementById('placed-back').innerHTML  = '';
  document.getElementById('monograma-front').innerHTML = '';
  document.getElementById('monograma-back').innerHTML  = '';
  document.getElementById('monograma-input').value = '';
  document.getElementById('body-front').setAttribute('fill', '#f5f5f5');
  document.getElementById('body-back').setAttribute('fill', '#f5f5f5');
  document.getElementById('sleeve-left-front').setAttribute('fill', '#f5f5f5');
  document.getElementById('sleeve-right-front').setAttribute('fill', '#f5f5f5');
  state.changes = [];
  document.getElementById('changes-list').innerHTML = '';
  document.getElementById('changes-log').classList.add('hidden');
  updatePrice(true);
});

// ============================================================
//  WHATSAPP
// ============================================================
document.getElementById('btn-whatsapp').addEventListener('click', () => {
  const nLogos = state.placedLogos.length;
  const total = PRICE_BASE + (nLogos * PRICE_PER_LOGO) + (state.mono ? PRICE_MONO : 0);
  const logoList = state.placedLogos.map(l => `  • ${l.label} en ${prettyZone(l.zone)}`).join('\n') || '  (ninguno)';
  const msg = `Hola, quiero esta chompa LTS personalizada:

Color: ${state.bodyColor}
Logos:
${logoList}
Monograma: ${state.mono || '(sin monograma)'}

Total estimado: $${total}`;
  window.open(`https://wa.me/593999174980?text=${encodeURIComponent(msg)}`, '_blank');
});

// ============================================================
//  LOG DE CAMBIOS
// ============================================================
function logChange(txt) {
  state.changes.unshift({ t: new Date().toLocaleTimeString(), txt });
  state.changes = state.changes.slice(0, 12);
  const log = document.getElementById('changes-log');
  const list = document.getElementById('changes-list');
  list.innerHTML = state.changes.map(c => `<li>· ${c.txt}</li>`).join('');
  log.classList.remove('hidden');
}

// Inicializar precio
updatePrice();
</script>
</body>
</html>
