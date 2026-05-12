<?php
session_start();
if (!isset($_SESSION['auth_jhosly']) || $_SESSION['auth_jhosly'] !== true) {
    header('Location: login.php');
    exit;
}
header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demo Personalizador · Jhosly</title>
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
  .glass-rose {
    background: linear-gradient(135deg, rgba(246,51,102,0.10), rgba(159,15,64,0.06));
    backdrop-filter: blur(20px) saturate(160%);
    border: 1px solid rgba(255,155,177,0.18);
  }
  .rose-gradient {
    background: linear-gradient(135deg, #4d031c 0%, #86113c 50%, #bf0e47 100%);
  }
  .rose-text {
    background: linear-gradient(135deg, #ffc4d2 0%, #ff6087 50%, #f63366 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .hero-bg {
    background:
      radial-gradient(circle at 20% 30%, rgba(246,51,102,0.18) 0%, transparent 50%),
      radial-gradient(circle at 80% 70%, rgba(159,15,64,0.12) 0%, transparent 50%),
      #0a0a0a;
    min-height: 100vh;
  }

  /* Modelo selector */
  .model-card { transition: all 0.2s ease; cursor: pointer; }
  .model-card:hover { transform: translateY(-2px); }
  .model-card.active { border-color: #f63366 !important; box-shadow: 0 0 0 2px rgba(246,51,102,0.4); }

  /* Drag chips */
  .bordado-chip {
    cursor: grab;
    user-select: none;
    transition: all 0.2s ease;
  }
  .bordado-chip:hover { transform: scale(1.06); border-color: rgba(255,155,177,0.6); }
  .bordado-chip:active { cursor: grabbing; transform: scale(0.95); }
  .bordado-chip.selected {
    border-color: #f63366 !important;
    box-shadow: 0 0 0 3px rgba(246,51,102,0.35);
  }

  /* Drop zones */
  .drop-zone {
    fill: rgba(255,155,177,0.0);
    stroke: rgba(255,155,177,0.30);
    stroke-dasharray: 6 4;
    stroke-width: 1.5;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .drop-zone:hover, .drop-zone.over {
    fill: rgba(255,155,177,0.18);
    stroke: #f63366;
    stroke-width: 2;
  }

  .placed-emb { cursor: pointer; transition: all 0.15s ease; }
  .placed-emb:hover { filter: drop-shadow(0 0 8px rgba(255,80,80,0.6)); }

  @keyframes pulse-accept {
    0%, 100% { fill: rgba(143,225,89,0.18); }
    50% { fill: rgba(143,225,89,0.35); }
  }
  .drop-zone.accept { animation: pulse-accept 0.6s ease 2; }

  @keyframes price-bump {
    0% { transform: scale(1); }
    40% { transform: scale(1.15); color: #ffc4d2; }
    100% { transform: scale(1); }
  }
  .bump { animation: price-bump 0.5s ease; }

  .toggle-btn { transition: all 0.3s ease; }
  .toggle-btn.active {
    background: linear-gradient(135deg, #bf0e47, #86113c);
    color: white;
    box-shadow: 0 8px 24px rgba(191,14,71,0.35);
  }

  .color-thread {
    border: 2px solid rgba(255,255,255,0.20);
    transition: all 0.2s ease;
    cursor: pointer;
  }
  .color-thread:hover { transform: scale(1.10); }
  .color-thread.active { border-color: #f63366; box-shadow: 0 0 0 3px rgba(246,51,102,0.35); }
</style>
</head>
<body class="hero-bg">

<!-- HEADER -->
<header class="border-b border-white/5">
  <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="w-12 h-12 rounded-lg rose-gradient flex items-center justify-center font-display font-black" style="color:#ffc4d2">J</div>
      <div>
        <p class="text-xs uppercase tracking-widest" style="color:#ffc4d2">Demo interactivo</p>
        <p class="text-base font-bold">Personalizador Jhosly</p>
      </div>
    </div>
    <a href="index.php" class="hidden md:inline-flex px-5 py-2.5 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-sm font-semibold">
      ← Volver a la proforma
    </a>
  </div>
</header>

<!-- INTRO -->
<section class="max-w-7xl mx-auto px-6 pt-10 pb-6 text-center">
  <p class="mb-2 uppercase tracking-widest text-xs" style="color:#ffc4d2">Cómo funcionará en su web</p>
  <h1 class="font-display text-3xl md:text-5xl font-black mb-3">
    Diseñe su <span class="rose-text">prenda</span> en tiempo real
  </h1>
  <p class="text-white/75 max-w-2xl mx-auto">
    Elija modelo, capucha, cierre, arrastre bordados sobre el hoodie, suba su imagen, cambie el color del hilo. El precio se actualiza al instante.
  </p>
</section>

<!-- WORKSPACE -->
<section class="max-w-7xl mx-auto px-4 md:px-6 pb-20">

  <!-- Selector de modelo -->
  <div class="glass rounded-2xl p-5 mb-4">
    <p class="text-xs uppercase tracking-widest mb-3" style="color:#ffc4d2">① Elija el modelo base</p>
    <div class="grid grid-cols-5 gap-3" id="model-selector">
      <div class="model-card active glass rounded-xl p-3 text-center border-2 border-transparent" data-model="hoodie-negro" data-base="35">
        <div class="w-full aspect-square rounded-lg bg-gradient-to-br from-stone-700 to-black mb-2"></div>
        <p class="text-xs font-semibold">Hoodie negro</p>
        <p class="text-[10px] text-white/60">$ 35</p>
      </div>
      <div class="model-card glass rounded-xl p-3 text-center border-2 border-transparent" data-model="hoodie-beige" data-base="35">
        <div class="w-full aspect-square rounded-lg bg-gradient-to-br from-amber-200/40 to-amber-700/30 mb-2"></div>
        <p class="text-xs font-semibold">Hoodie beige</p>
        <p class="text-[10px] text-white/60">$ 35</p>
      </div>
      <div class="model-card glass rounded-xl p-3 text-center border-2 border-transparent" data-model="hoodie-crema" data-base="35">
        <div class="w-full aspect-square rounded-lg bg-gradient-to-br from-amber-100/30 to-amber-200/30 mb-2"></div>
        <p class="text-xs font-semibold">Crewneck crema</p>
        <p class="text-[10px] text-white/60">$ 35</p>
      </div>
      <div class="model-card glass rounded-xl p-3 text-center border-2 border-transparent" data-model="hoodie-rojo" data-base="38">
        <div class="w-full aspect-square rounded-lg bg-gradient-to-br from-red-900 to-red-600 mb-2"></div>
        <p class="text-xs font-semibold">Hoodie rojo</p>
        <p class="text-[10px] text-white/60">$ 38</p>
      </div>
      <div class="model-card glass rounded-xl p-3 text-center border-2 border-transparent" data-model="hoodie-blanco" data-base="35">
        <div class="w-full aspect-square rounded-lg bg-gradient-to-br from-zinc-100/40 to-zinc-300/30 mb-2"></div>
        <p class="text-xs font-semibold">Crewneck blanco</p>
        <p class="text-[10px] text-white/60">$ 35</p>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 md:gap-6">

    <!-- SIDEBAR IZQUIERDA: BORDADOS -->
    <aside class="lg:col-span-3 glass rounded-2xl p-5">
      <p class="text-xs uppercase tracking-widest mb-3" style="color:#ffc4d2">② Bordados (+ $10 c/u)</p>
      <p class="text-xs text-white/60 mb-4">Arrastre sobre el hoodie</p>
      <div id="bordado-pool" class="grid grid-cols-2 gap-3"></div>

      <!-- Upload imagen propia -->
      <p class="text-xs uppercase tracking-widest mt-6 mb-3" style="color:#ffc4d2">③ O suba su imagen (+ $15)</p>
      <label class="block cursor-pointer">
        <input type="file" id="upload-img" accept="image/*" class="hidden"/>
        <div class="border-2 border-dashed border-rose_brand-300/40 rounded-lg p-4 text-center hover:border-rose_brand-300/80 hover:bg-rose_brand-500/5 transition">
          <svg class="w-8 h-8 mx-auto mb-1 text-rose_brand-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:#ffc4d2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          <p class="text-xs text-white/70">Click para subir<br><span class="text-white/50">JPG / PNG / SVG hasta 5MB</span></p>
        </div>
      </label>
      <p id="upload-info" class="text-xs text-emerald-400 mt-2 hidden"></p>
    </aside>

    <!-- CENTRO: LIENZO -->
    <main class="lg:col-span-6 glass-rose rounded-2xl p-4 md:p-6">

      <!-- Toggles + reset -->
      <div class="flex flex-wrap items-center gap-2 mb-4">
        <div class="flex items-center gap-1 bg-white/5 rounded-lg p-1">
          <button id="btn-front" class="toggle-btn active px-4 py-1.5 rounded-md text-xs font-bold">Frontal</button>
          <button id="btn-back" class="toggle-btn px-4 py-1.5 rounded-md text-xs font-bold">Trasera</button>
        </div>
        <button id="btn-reset" class="ml-auto px-4 py-2 rounded-lg text-xs font-semibold bg-red-500/15 text-red-300 border border-red-500/30 hover:bg-red-500/25">Resetear</button>
      </div>

      <!-- SVG HOODIE -->
      <div id="canvas-wrap" class="relative bg-gradient-to-b from-black/40 to-black/60 rounded-xl overflow-hidden" style="aspect-ratio:1/1;">

        <!-- FRONT -->
        <svg id="svg-front" viewBox="0 0 600 600" class="w-full h-full">
          <ellipse cx="300" cy="555" rx="190" ry="14" fill="rgba(0,0,0,0.4)"/>

          <!-- Capucha (se muestra/oculta) -->
          <g id="capucha-front">
            <path d="M 220 80 Q 300 30 380 80 L 360 145 Q 300 130 240 145 Z"
                  fill="#1a1a1a" id="capucha-front-fill" stroke="#0a0a0a" stroke-width="1.5"/>
            <path d="M 250 110 Q 300 95 350 110 L 348 135 Q 300 125 252 135 Z"
                  fill="#0a0a0a" opacity="0.4"/>
          </g>

          <!-- Cuello (cuando no hay capucha) -->
          <g id="cuello-front" style="display:none">
            <ellipse cx="300" cy="115" rx="40" ry="10" fill="#0a0a0a" stroke="#222" stroke-width="1.5"/>
          </g>

          <!-- Cuerpo principal -->
          <path id="body-front" d="
            M 200 130 Q 240 115 270 120
            L 330 120
            Q 360 115 400 130
            L 445 200
            L 445 470
            Q 445 490 425 495
            L 175 495
            Q 155 490 155 470
            L 155 200 Z"
            fill="#222" stroke="#0a0a0a" stroke-width="2"/>

          <!-- Cierre central (toggle on/off) -->
          <g id="cierre-front" style="display:none">
            <line x1="300" y1="120" x2="300" y2="485" stroke="#444" stroke-width="3"/>
            <line x1="300" y1="120" x2="300" y2="485" stroke="#888" stroke-width="1" stroke-dasharray="3 2"/>
            <rect x="294" y="118" width="12" height="14" rx="2" fill="#888" stroke="#222" stroke-width="1"/>
          </g>

          <!-- Bolsillo canguro frontal -->
          <path d="M 220 360 L 380 360 L 380 430 L 220 430 Z" fill="rgba(0,0,0,0.2)" stroke="rgba(0,0,0,0.4)" stroke-width="1.5"/>
          <line x1="240" y1="370" x2="245" y2="425" stroke="rgba(0,0,0,0.3)" stroke-width="1.5"/>
          <line x1="360" y1="370" x2="355" y2="425" stroke="rgba(0,0,0,0.3)" stroke-width="1.5"/>

          <!-- Mangas -->
          <path id="sleeve-left-front" d="M 200 130 L 130 220 L 90 400 L 80 480 Q 80 495 95 498 L 155 498 Q 168 495 172 482 L 180 430 L 200 280 Z"
                fill="#222" stroke="#0a0a0a" stroke-width="2"/>
          <path id="sleeve-right-front" d="M 400 130 L 470 220 L 510 400 L 520 480 Q 520 495 505 498 L 445 498 Q 432 495 428 482 L 420 430 L 400 280 Z"
                fill="#222" stroke="#0a0a0a" stroke-width="2"/>

          <!-- Puños -->
          <rect x="75" y="478" width="80" height="22" rx="3" fill="#111" stroke="#000" stroke-width="1"/>
          <rect x="445" y="478" width="80" height="22" rx="3" fill="#111" stroke="#000" stroke-width="1"/>
          <!-- Cintura -->
          <rect x="155" y="475" width="290" height="22" rx="3" fill="#111" stroke="#000" stroke-width="1"/>

          <!-- Drop zones frontales -->
          <g id="drop-zones-front">
            <rect class="drop-zone" data-zone="pecho-f" x="200" y="180" width="200" height="160" rx="8"/>
            <rect class="drop-zone" data-zone="manga-izq-f" x="95" y="280" width="80" height="120" rx="6"/>
            <rect class="drop-zone" data-zone="manga-der-f" x="425" y="280" width="80" height="120" rx="6"/>
          </g>

          <g id="placed-front"></g>
          <g id="monograma-front"></g>
          <g id="user-img-front"></g>
        </svg>

        <!-- BACK -->
        <svg id="svg-back" viewBox="0 0 600 600" class="w-full h-full hidden">
          <ellipse cx="300" cy="555" rx="190" ry="14" fill="rgba(0,0,0,0.4)"/>

          <g id="capucha-back">
            <path d="M 220 80 Q 300 30 380 80 L 360 145 Q 300 130 240 145 Z"
                  fill="#1a1a1a" id="capucha-back-fill" stroke="#0a0a0a" stroke-width="1.5"/>
          </g>
          <g id="cuello-back" style="display:none">
            <ellipse cx="300" cy="115" rx="35" ry="8" fill="#0a0a0a" stroke="#222" stroke-width="1.5"/>
          </g>

          <path id="body-back" d="
            M 200 130 Q 240 115 270 120
            L 330 120
            Q 360 115 400 130
            L 445 200
            L 445 470
            Q 445 490 425 495
            L 175 495
            Q 155 490 155 470
            L 155 200 Z"
            fill="#222" stroke="#0a0a0a" stroke-width="2"/>

          <path d="M 200 130 L 130 220 L 90 400 L 80 480 Q 80 495 95 498 L 155 498 Q 168 495 172 482 L 180 430 L 200 280 Z"
                fill="#222" stroke="#0a0a0a" stroke-width="2"/>
          <path d="M 400 130 L 470 220 L 510 400 L 520 480 Q 520 495 505 498 L 445 498 Q 432 495 428 482 L 420 430 L 400 280 Z"
                fill="#222" stroke="#0a0a0a" stroke-width="2"/>

          <rect x="75" y="478" width="80" height="22" rx="3" fill="#111" stroke="#000" stroke-width="1"/>
          <rect x="445" y="478" width="80" height="22" rx="3" fill="#111" stroke="#000" stroke-width="1"/>
          <rect x="155" y="475" width="290" height="22" rx="3" fill="#111" stroke="#000" stroke-width="1"/>

          <g id="drop-zones-back">
            <rect class="drop-zone" data-zone="espalda" x="180" y="180" width="240" height="240" rx="10"/>
            <rect class="drop-zone" data-zone="manga-izq-b" x="95" y="280" width="80" height="120" rx="6"/>
            <rect class="drop-zone" data-zone="manga-der-b" x="425" y="280" width="80" height="120" rx="6"/>
          </g>

          <g id="placed-back"></g>
          <g id="monograma-back"></g>
          <g id="user-img-back"></g>
        </svg>
      </div>

      <p class="text-xs text-center mt-3 text-white/50">Las zonas punteadas son donde puede colocar bordados. Click sobre un bordado colocado para quitarlo.</p>
    </main>

    <!-- SIDEBAR DERECHA: opciones + precio -->
    <aside class="lg:col-span-3 space-y-4">

      <!-- Toggles capucha/cierre -->
      <div class="glass rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest mb-3" style="color:#ffc4d2">④ Opciones de la prenda</p>

        <div class="space-y-3">
          <div>
            <p class="text-xs text-white/70 mb-2">Capucha (+$8)</p>
            <div class="flex gap-2">
              <button id="cap-si" class="toggle-btn active flex-1 py-2 rounded-lg text-xs font-bold bg-white/5">Con capucha</button>
              <button id="cap-no" class="toggle-btn flex-1 py-2 rounded-lg text-xs font-bold bg-white/5">Sin capucha</button>
            </div>
          </div>
          <div>
            <p class="text-xs text-white/70 mb-2">Cierre (+$5)</p>
            <div class="flex gap-2">
              <button id="cierre-no" class="toggle-btn active flex-1 py-2 rounded-lg text-xs font-bold bg-white/5">Sin cierre</button>
              <button id="cierre-si" class="toggle-btn flex-1 py-2 rounded-lg text-xs font-bold bg-white/5">Con cierre</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Color de hilo -->
      <div class="glass rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest mb-3" style="color:#ffc4d2">⑤ Color de hilo</p>
        <div class="grid grid-cols-7 gap-2">
          <button class="color-thread active w-full aspect-square rounded-full" style="background:#ffffff" data-color="#ffffff" title="Blanco"></button>
          <button class="color-thread w-full aspect-square rounded-full" style="background:#1a1a1a" data-color="#1a1a1a" title="Negro"></button>
          <button class="color-thread w-full aspect-square rounded-full" style="background:#dc2626" data-color="#dc2626" title="Rojo"></button>
          <button class="color-thread w-full aspect-square rounded-full" style="background:#6b3a1a" data-color="#6b3a1a" title="Café"></button>
          <button class="color-thread w-full aspect-square rounded-full" style="background:#a87a55" data-color="#a87a55" title="Moca"></button>
          <button class="color-thread w-full aspect-square rounded-full" style="background:#1e3a8a" data-color="#1e3a8a" title="Azul"></button>
          <button class="color-thread w-full aspect-square rounded-full" style="background:conic-gradient(from 0deg, #f63366, #ffc107, #10b981, #3b82f6, #f63366)" data-color="multi" title="Multicolor"></button>
        </div>
      </div>

      <!-- Monograma -->
      <div class="glass rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest mb-3" style="color:#ffc4d2">⑥ Monograma (+$10)</p>
        <input id="monograma-input" type="text" maxlength="14" placeholder="Ej: NORELIZ ♥"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/15 text-white placeholder-white/30 text-sm focus:outline-none"/>
        <div class="mt-3 flex gap-3 text-xs">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="mono-pos" value="back" checked/> Espalda
          </label>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="mono-pos" value="chest"/> Pecho
          </label>
        </div>
      </div>

      <!-- PRECIO -->
      <div class="glass-rose rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest mb-2" style="color:#ffc4d2">Resumen del pedido</p>
        <div class="space-y-1.5 text-sm mt-3">
          <div class="flex justify-between text-white/85">
            <span>Modelo base</span>
            <span class="font-mono">$ <span id="base-price">35</span></span>
          </div>
          <div class="flex justify-between text-white/85">
            <span>Capucha</span>
            <span class="font-mono">$ <span id="cap-price">8</span></span>
          </div>
          <div class="flex justify-between text-white/85">
            <span>Cierre</span>
            <span class="font-mono">$ <span id="cierre-price">0</span></span>
          </div>
          <div class="flex justify-between text-white/85">
            <span>Bordados (<span id="count-borda">0</span> × $10)</span>
            <span class="font-mono">$ <span id="borda-price">0</span></span>
          </div>
          <div class="flex justify-between text-white/85">
            <span>Imagen propia</span>
            <span class="font-mono">$ <span id="img-price">0</span></span>
          </div>
          <div class="flex justify-between text-white/85">
            <span>Monograma</span>
            <span class="font-mono">$ <span id="mono-price">0</span></span>
          </div>
        </div>
        <div class="mt-4 pt-4 border-t" style="border-color:rgba(255,155,177,0.2)">
          <div class="flex items-end justify-between">
            <span class="text-sm uppercase tracking-widest" style="color:#ffc4d2">Total</span>
            <p class="font-display text-4xl font-black rose-text" id="total-price">$ 43</p>
          </div>
        </div>
        <button id="btn-whatsapp" class="mt-5 w-full px-4 py-3 rounded-xl bg-green-600 hover:bg-green-500 text-white font-bold text-sm transition flex items-center justify-center gap-2">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.6 6.32A8 8 0 0 0 6.27 17.65L5 22l4.46-1.17a8 8 0 0 0 11.81-6.95 8 8 0 0 0-3.66-7.56zm-5.6 12.32a6.65 6.65 0 0 1-3.39-.93l-.24-.14-2.5.66.67-2.44-.16-.25a6.66 6.66 0 1 1 5.62 3.1zm3.65-4.99c-.2-.1-1.18-.58-1.36-.65s-.32-.1-.45.1-.52.65-.64.78-.24.15-.44.05a5.46 5.46 0 0 1-2.72-2.38c-.2-.35.2-.33.59-1.09a.37.37 0 0 0 0-.35c-.05-.1-.45-1.08-.62-1.48s-.33-.34-.45-.34h-.38a.74.74 0 0 0-.54.25 2.26 2.26 0 0 0-.7 1.67 3.92 3.92 0 0 0 .82 2.07 8.97 8.97 0 0 0 3.44 3.03c.48.21.86.33 1.15.42a2.78 2.78 0 0 0 1.27.08 2.07 2.07 0 0 0 1.36-.96 1.69 1.69 0 0 0 .12-.96c-.05-.08-.18-.13-.38-.23z"/></svg>
          Pedir este diseño
        </button>
      </div>

    </aside>
  </div>

  <!-- NOTA -->
  <div class="glass rounded-2xl p-6 mt-8 text-center">
    <p class="text-sm text-white/70">
      Este es <strong style="color:#ffc4d2">un bosquejo funcional</strong> del personalizador que construiremos en su web definitiva. El producto final tendrá fotos reales de sus 5 prendas, biblioteca completa de bordados, validación de imágenes subidas con IA y envío automático del diseño al sistema de pedidos.
    </p>
  </div>

</section>

<footer class="border-t border-white/5 py-8 text-center text-sm" style="color:rgba(255,255,255,0.5)">
  <p>© 2026 Creative Web · Demo desarrollado para Jhosly · creativeweb.com.ec</p>
</footer>

<script>
// ============================================================
//  CONFIGURACIÓN
// ============================================================
const BORDADOS = [
  { id: 'corazon-anatomico', label: '♥ Anatómico', color: '#dc2626' },
  { id: 'love',              label: 'LOVE',        color: '#a87a55' },
  { id: 'corazon-simple',    label: '♥',          color: '#f63366' },
  { id: 'iniciales',         label: 'A♥V',        color: '#dc2626' },
  { id: 'princesa',          label: 'Princesa',   color: '#d4a574' },
  { id: 'robot',             label: 'Wall-E',     color: '#facc15' },
  { id: 'magnet',            label: 'Magnet',     color: '#dc2626' },
  { id: 'love-mug',          label: 'Café ♥',     color: '#a87a55' },
];

const PRICE_BORDADO = 10;
const PRICE_MONO    = 10;
const PRICE_IMG     = 15;
const PRICE_CAP     = 8;
const PRICE_CIERRE  = 5;

// ============================================================
//  ESTADO
// ============================================================
const state = {
  model: 'hoodie-negro',
  basePrice: 35,
  bodyColor: '#222222',
  view: 'front',
  capucha: true,
  cierre: false,
  threadColor: '#ffffff',
  placedBordados: [],
  uploadedImg: null,
  mono: '',
  monoSide: 'back',
};

// Colores de cuerpo por modelo
const MODEL_COLORS = {
  'hoodie-negro':  '#222222',
  'hoodie-beige':  '#a89373',
  'hoodie-crema':  '#f0e6d2',
  'hoodie-rojo':   '#9f1a1a',
  'hoodie-blanco': '#f5f5f5',
};

// ============================================================
//  RENDER POOL BORDADOS
// ============================================================
function renderPool() {
  const pool = document.getElementById('bordado-pool');
  pool.innerHTML = BORDADOS.map(b => `
    <div class="bordado-chip rounded-lg p-2 text-center border-2 border-white/10 bg-white/5"
         draggable="true" data-bordado='${JSON.stringify(b)}'>
      <div class="font-display font-black text-[11px] leading-tight" style="color:${b.color};text-shadow:0 0 6px rgba(0,0,0,0.5)">${b.label}</div>
    </div>
  `).join('');

  document.querySelectorAll('.bordado-chip').forEach(chip => {
    chip.addEventListener('dragstart', e => {
      dragging = JSON.parse(chip.dataset.bordado);
      e.dataTransfer.effectAllowed = 'copy';
    });
    chip.addEventListener('click', () => {
      document.querySelectorAll('.bordado-chip').forEach(c => c.classList.remove('selected'));
      chip.classList.add('selected');
      dragging = JSON.parse(chip.dataset.bordado);
    });
  });
}
let dragging = null;
renderPool();

// ============================================================
//  DRAG & DROP
// ============================================================
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
      placeBordado(dragging, zone.dataset.zone, bbox.x + bbox.width/2, bbox.y + bbox.height/2);
      zone.classList.add('accept');
      setTimeout(() => zone.classList.remove('accept'), 1200);
      dragging = null;
    }
  });
  zone.addEventListener('click', () => {
    if (dragging) {
      const bbox = zone.getBBox();
      placeBordado(dragging, zone.dataset.zone, bbox.x + bbox.width/2, bbox.y + bbox.height/2);
      document.querySelectorAll('.bordado-chip').forEach(c => c.classList.remove('selected'));
      dragging = null;
    }
  });
});

function placeBordado(bord, zone, x, y) {
  const side = state.view;
  const layer = document.getElementById('placed-' + side);
  const uid = 'b_' + Date.now() + '_' + Math.floor(Math.random()*999);
  const threadColor = state.threadColor === 'multi' ? bord.color : state.threadColor;

  const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
  g.setAttribute('class', 'placed-emb');
  g.setAttribute('data-uid', uid);
  g.setAttribute('transform', `translate(${x}, ${y})`);
  g.innerHTML = `
    <rect x="-40" y="-15" width="80" height="30" rx="4" fill="none" stroke="${threadColor}" stroke-width="1" stroke-dasharray="2 2" opacity="0.5"/>
    <text text-anchor="middle" dy=".35em" font-family="Inter" font-weight="900" font-size="13" fill="${threadColor}" stroke="rgba(0,0,0,0.3)" stroke-width="0.3">
      ${bord.label}
    </text>
  `;
  layer.appendChild(g);

  g.addEventListener('click', () => {
    g.remove();
    state.placedBordados = state.placedBordados.filter(b => b.uid !== uid);
    updatePrice(true);
  });

  state.placedBordados.push({ uid, ...bord, side, zone, x, y, threadColor });
  updatePrice(true);
}

// ============================================================
//  MODELO SELECTOR
// ============================================================
document.querySelectorAll('.model-card').forEach(card => {
  card.addEventListener('click', () => {
    document.querySelectorAll('.model-card').forEach(c => c.classList.remove('active'));
    card.classList.add('active');
    state.model = card.dataset.model;
    state.basePrice = parseInt(card.dataset.base);
    state.bodyColor = MODEL_COLORS[state.model];
    document.getElementById('body-front').setAttribute('fill', state.bodyColor);
    document.getElementById('body-back').setAttribute('fill', state.bodyColor);
    document.getElementById('sleeve-left-front').setAttribute('fill', state.bodyColor);
    document.getElementById('sleeve-right-front').setAttribute('fill', state.bodyColor);
    document.getElementById('base-price').textContent = state.basePrice;
    updatePrice(true);
  });
});

// ============================================================
//  TOGGLES Capucha / Cierre
// ============================================================
document.getElementById('cap-si').addEventListener('click', () => setCapucha(true));
document.getElementById('cap-no').addEventListener('click', () => setCapucha(false));
document.getElementById('cierre-si').addEventListener('click', () => setCierre(true));
document.getElementById('cierre-no').addEventListener('click', () => setCierre(false));

function setCapucha(v) {
  state.capucha = v;
  document.getElementById('capucha-front').style.display = v ? '' : 'none';
  document.getElementById('capucha-back').style.display  = v ? '' : 'none';
  document.getElementById('cuello-front').style.display  = v ? 'none' : '';
  document.getElementById('cuello-back').style.display   = v ? 'none' : '';
  document.getElementById('cap-si').classList.toggle('active', v);
  document.getElementById('cap-no').classList.toggle('active', !v);
  updatePrice(true);
}

function setCierre(v) {
  state.cierre = v;
  document.getElementById('cierre-front').style.display = v ? '' : 'none';
  document.getElementById('cierre-si').classList.toggle('active', v);
  document.getElementById('cierre-no').classList.toggle('active', !v);
  updatePrice(true);
}

// ============================================================
//  VISTAS
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
//  COLOR HILO
// ============================================================
document.querySelectorAll('.color-thread').forEach(c => {
  c.addEventListener('click', () => {
    document.querySelectorAll('.color-thread').forEach(s => s.classList.remove('active'));
    c.classList.add('active');
    state.threadColor = c.dataset.color;
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
    let x, y, size;
    if (state.monoSide === 'back' && side === 'back') { x = 300; y = 420; size = 28; }
    else if (state.monoSide === 'chest' && side === 'front') { x = 300; y = 460; size = 16; }
    else return;
    const c = state.threadColor === 'multi' ? '#f63366' : state.threadColor;
    const t = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    t.setAttribute('x', x); t.setAttribute('y', y);
    t.setAttribute('text-anchor', 'middle');
    t.setAttribute('font-family', 'Playfair Display');
    t.setAttribute('font-weight', '900');
    t.setAttribute('font-size', size);
    t.setAttribute('fill', c);
    t.setAttribute('stroke', 'rgba(0,0,0,0.3)');
    t.setAttribute('stroke-width', '0.4');
    t.textContent = state.mono;
    layer.appendChild(t);
  });
}

// ============================================================
//  UPLOAD IMAGEN
// ============================================================
document.getElementById('upload-img').addEventListener('change', e => {
  const file = e.target.files[0];
  if (!file) return;
  if (file.size > 5 * 1024 * 1024) { alert('La imagen excede 5MB'); return; }
  const reader = new FileReader();
  reader.onload = ev => {
    state.uploadedImg = ev.target.result;
    document.getElementById('upload-info').textContent = `✓ ${file.name} subida`;
    document.getElementById('upload-info').classList.remove('hidden');
    renderUserImg();
    updatePrice(true);
  };
  reader.readAsDataURL(file);
});

function renderUserImg() {
  ['front', 'back'].forEach(side => {
    const layer = document.getElementById('user-img-' + side);
    layer.innerHTML = '';
    if (!state.uploadedImg) return;
    // por defecto pegada en pecho frontal
    if (side === 'front') {
      const img = document.createElementNS('http://www.w3.org/2000/svg', 'image');
      img.setAttributeNS('http://www.w3.org/1999/xlink', 'href', state.uploadedImg);
      img.setAttribute('x', '255'); img.setAttribute('y', '210');
      img.setAttribute('width', '90'); img.setAttribute('height', '90');
      img.setAttribute('preserveAspectRatio', 'xMidYMid meet');
      img.setAttribute('opacity', '0.92');
      layer.appendChild(img);
    }
  });
}

// ============================================================
//  PRECIO
// ============================================================
function updatePrice(animate=false) {
  const nB = state.placedBordados.length;
  const capExtra = state.capucha ? PRICE_CAP : 0;
  const cierreExtra = state.cierre ? PRICE_CIERRE : 0;
  const monoExtra = state.mono ? PRICE_MONO : 0;
  const imgExtra = state.uploadedImg ? PRICE_IMG : 0;
  const total = state.basePrice + capExtra + cierreExtra + (nB * PRICE_BORDADO) + monoExtra + imgExtra;

  document.getElementById('base-price').textContent = state.basePrice;
  document.getElementById('cap-price').textContent = capExtra;
  document.getElementById('cierre-price').textContent = cierreExtra;
  document.getElementById('count-borda').textContent = nB;
  document.getElementById('borda-price').textContent = nB * PRICE_BORDADO;
  document.getElementById('img-price').textContent = imgExtra;
  document.getElementById('mono-price').textContent = monoExtra;
  const tEl = document.getElementById('total-price');
  tEl.textContent = `$ ${total}`;
  if (animate) {
    tEl.classList.remove('bump');
    void tEl.offsetWidth;
    tEl.classList.add('bump');
  }
}

// ============================================================
//  RESET
// ============================================================
document.getElementById('btn-reset').addEventListener('click', () => {
  if (!confirm('¿Resetear toda la personalización?')) return;
  state.placedBordados = [];
  state.mono = '';
  state.uploadedImg = null;
  ['front', 'back'].forEach(s => {
    document.getElementById('placed-' + s).innerHTML = '';
    document.getElementById('monograma-' + s).innerHTML = '';
    document.getElementById('user-img-' + s).innerHTML = '';
  });
  document.getElementById('monograma-input').value = '';
  document.getElementById('upload-info').classList.add('hidden');
  document.getElementById('upload-img').value = '';
  setCapucha(true);
  setCierre(false);
  updatePrice(true);
});

// ============================================================
//  WHATSAPP
// ============================================================
document.getElementById('btn-whatsapp').addEventListener('click', () => {
  const nB = state.placedBordados.length;
  const capExtra = state.capucha ? PRICE_CAP : 0;
  const cierreExtra = state.cierre ? PRICE_CIERRE : 0;
  const monoExtra = state.mono ? PRICE_MONO : 0;
  const imgExtra = state.uploadedImg ? PRICE_IMG : 0;
  const total = state.basePrice + capExtra + cierreExtra + (nB * PRICE_BORDADO) + monoExtra + imgExtra;

  const bordList = state.placedBordados.map(b => `  • ${b.label} (${b.zone})`).join('\n') || '  (sin bordados)';
  const msg = `Hola Jhosly, quiero esta prenda personalizada:

Modelo: ${state.model}
Capucha: ${state.capucha ? 'Sí' : 'No'}
Cierre: ${state.cierre ? 'Sí' : 'No'}
Color de hilo: ${state.threadColor}
Bordados:
${bordList}
Imagen propia: ${state.uploadedImg ? 'Sí (subida)' : 'No'}
Monograma: ${state.mono || '(sin monograma)'}

Total: $${total}`;
  window.open(`https://wa.me/593999174980?text=${encodeURIComponent(msg)}`, '_blank');
});

// init
updatePrice();
</script>
</body>
</html>
