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
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<title>Proforma · Jhosly — Creative Web</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        display: ['Playfair Display', 'serif'],
      },
      colors: {
        corp: {
          50:  '#f0f6ff',
          100: '#dbe9ff',
          200: '#b8d3ff',
          300: '#8eb6ff',
          400: '#5b91ff',
          500: '#2563eb',
          600: '#1d4ed8',
          700: '#1e40af',
          800: '#1e3a8a',
          900: '#172554',
          950: '#0a0e1a',
        },
        gold: {
          300: '#e9d4a3',
          400: '#d4b574',
          500: '#c8a558',
          600: '#b48a3e',
          700: '#8b6a2e',
        },
      },
    },
  },
};
</script>
<style>
  body { font-family: 'Inter', sans-serif; background: #0a0e1a; color: #e2e8f0; }
  .font-display { font-family: 'Playfair Display', serif; }
  .glass {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px) saturate(160%);
    border: 1px solid rgba(255,255,255,0.06);
  }
  .glass-corp {
    background: linear-gradient(135deg, rgba(37,99,235,0.10), rgba(23,37,84,0.08));
    backdrop-filter: blur(20px) saturate(160%);
    border: 1px solid rgba(91,145,255,0.20);
  }
  .corp-gradient {
    background: linear-gradient(135deg, #0a0e1a 0%, #172554 50%, #1e40af 100%);
  }
  .gold-text {
    background: linear-gradient(135deg, #e9d4a3 0%, #d4b574 50%, #c8a558 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .corp-text {
    background: linear-gradient(135deg, #8eb6ff 0%, #5b91ff 50%, #2563eb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .hero-bg {
    background:
      radial-gradient(circle at 20% 30%, rgba(37,99,235,0.18) 0%, transparent 50%),
      radial-gradient(circle at 80% 70%, rgba(0,180,216,0.10) 0%, transparent 50%),
      #0a0e1a;
  }
  .feature-card { transition: all 0.3s ease; }
  .feature-card:hover {
    transform: translateY(-4px);
    border-color: rgba(91,145,255,0.4);
    background: rgba(37,99,235,0.06);
  }
  .price-row { border-bottom: 1px solid rgba(255,255,255,0.06); transition: all 0.25s ease; }
  .price-row:last-child { border-bottom: none; }
  .price-row.unchecked { opacity: 0.4; }
  .total-row {
    background: linear-gradient(135deg, rgba(37,99,235,0.15), rgba(23,37,84,0.10));
    border: 1px solid rgba(91,145,255,0.30);
  }
  .badge { font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; }

  /* Checkbox custom */
  .pkg-checkbox {
    appearance: none;
    -webkit-appearance: none;
    width: 28px;
    height: 28px;
    border: 2px solid rgba(91,145,255,0.4);
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    transition: all 0.2s ease;
    background: rgba(0,0,0,0.3);
  }
  .pkg-checkbox:hover { border-color: #5b91ff; transform: scale(1.05); }
  .pkg-checkbox:checked {
    background: linear-gradient(135deg, #2563eb, #1e40af);
    border-color: #5b91ff;
  }
  .pkg-checkbox:checked::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-weight: 900;
    font-size: 16px;
  }
  .pkg-checkbox:disabled {
    cursor: not-allowed;
    background: rgba(91,145,255,0.4);
    border-color: rgba(91,145,255,0.6);
  }
  .pkg-checkbox:disabled::after { content: '✓'; color: rgba(255,255,255,0.6); }

  @keyframes price-pulse {
    0% { transform: scale(1); }
    40% { transform: scale(1.06); color: #e9d4a3; }
    100% { transform: scale(1); }
  }
  .bump { animation: price-pulse 0.5s ease; }

  @media print {
    body { background: white !important; color: #1a1a1a !important; }
    .no-print { display: none !important; }
    .glass, .glass-corp { background: white !important; border: 1px solid #e5e5e5 !important; }
    .corp-gradient, .hero-bg { background: white !important; color: #1a1a1a !important; }
    h1, h2, h3, h4, p, span, td, th, li { color: #1a1a1a !important; }
    .gold-text, .corp-text { color: #1e40af !important; -webkit-text-fill-color: #1e40af !important; }
  }
</style>
</head>
<body class="hero-bg min-h-screen">

<!-- TOP BAR -->
<div class="sticky top-0 z-50 backdrop-blur-xl bg-black/60 border-b border-white/5 no-print">
  <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-lg corp-gradient flex items-center justify-center font-display font-black text-gold-300">J</div>
      <div>
        <p class="text-xs text-corp-300 tracking-widest uppercase">Proforma comercial</p>
        <p class="text-sm font-semibold">Jhosly · Ropa personalizada</p>
      </div>
    </div>
    <div class="flex items-center gap-2">
      <a href="demo.php" class="px-5 py-2 rounded-lg bg-corp-600 hover:bg-corp-500 text-white text-sm font-semibold transition">Ver demo interactivo</a>
      <button onclick="window.print()" class="px-4 py-2 rounded-lg text-sm font-semibold bg-white/5 hover:bg-white/10 border border-white/10">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
        PDF
      </button>
    </div>
  </div>
</div>

<!-- HERO -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-20">
  <div class="glass-corp rounded-3xl p-10 md:p-16 relative overflow-hidden">
    <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-corp-700/20 blur-3xl"></div>
    <div class="relative z-10">
      <p class="badge text-corp-300 mb-4">Proforma comercial · 12 de mayo de 2026 · Válida 10 días</p>
      <h1 class="font-display text-5xl md:text-7xl font-black mb-6 leading-tight">
        Tienda online<br>
        <span class="corp-text">Jhosly</span>
      </h1>
      <p class="text-xl md:text-2xl text-white/80 mb-8 max-w-3xl font-light">
        Sitio web e-commerce con módulo de personalización de prendas, probador virtual con inteligencia artificial e integración con pagos.
      </p>
      <div class="grid md:grid-cols-2 gap-6 mt-12">
        <div class="glass rounded-2xl p-6">
          <p class="badge text-corp-300 mb-2">Cliente</p>
          <p class="text-2xl font-bold mb-1">Jhosly</p>
          <p class="text-white/70">A nombre de: Noreliz Pasto</p>
          <p class="text-sm text-white/60 mt-2">Marca de ropa con bordados artesanales personalizados — hoodies, crewnecks y prendas de regalo para ocasiones especiales.</p>
        </div>
        <div class="glass rounded-2xl p-6">
          <p class="badge text-corp-300 mb-2">Preparado por</p>
          <p class="text-2xl font-bold mb-1">Creative Web</p>
          <p class="text-white/70">Ing. Santiago Oña Sánchez</p>
          <p class="text-sm text-white/60 mt-2">info@creativeweb.com.ec · 099 917 4980 · 062 924 887<br>Modesto Jaramillo 3-60 y Abdón Calderón 2do piso · Otavalo, Ecuador</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RESUMEN EJECUTIVO -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">01 · Resumen ejecutivo</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">El proyecto en pocas palabras</h2>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="glass rounded-2xl p-8">
      <p class="text-white/85 leading-relaxed mb-4">
        Desarrollamos una <strong class="text-white">tienda online completa para Jhosly</strong> con un módulo único en Ecuador: un personalizador drag-and-drop donde su cliente diseña la prenda en tiempo real eligiendo capucha, cierre, bordados por zona, colores de hilo e incluso subiendo su propia imagen.
      </p>
      <p class="text-white/85 leading-relaxed">
        El precio se actualiza solo según las personalizaciones elegidas — al estilo Apple Configurator, pero para ropa. Y cada pedido viaja directamente a su taller con todas las especificaciones para que el equipo de bordado lo ejecute sin pasos extra.
      </p>
    </div>
    <div class="glass-corp rounded-2xl p-8">
      <p class="badge text-corp-300 mb-4">¿Qué incluye?</p>
      <ul class="space-y-3 text-white/90">
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Sitio web e-commerce 2.0 con diseño a medida</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Módulo personalizador de 5 prendas (opcional)</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Probador Virtual con Inteligencia Artificial (opcional)</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Integración con Payphone (botón de pagos)</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Integración Facebook + Instagram Pixel</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> SEO avanzado + Google Analytics</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Hosting Pro + dominio .com gratis (1 año)</li>
        <li class="flex gap-3"><span class="text-gold-400 font-bold">✓</span> Soporte técnico por 12 meses</li>
      </ul>
    </div>
  </div>
</section>

<!-- MÓDULO PERSONALIZADOR -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">02 · El corazón del proyecto</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-4">Módulo personalizador de prendas</h2>
  <p class="text-xl text-white/75 mb-10 max-w-3xl">El cliente diseña su propia prenda en tiempo real — elige capucha, cierre, bordados, hilos, sube su imagen — y el precio cambia con cada opción.</p>

  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="feature-card glass rounded-2xl p-6">
      <div class="w-12 h-12 rounded-xl corp-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">1</div>
      <h3 class="text-lg font-bold mb-2">Capucha</h3>
      <p class="text-white/70 text-sm mb-3">Toggle visual sí / no. La prenda cambia su silueta al instante en el preview.</p>
      <p class="text-gold-400 text-xs font-semibold">Diferencia de precio configurable</p>
    </div>
    <div class="feature-card glass rounded-2xl p-6">
      <div class="w-12 h-12 rounded-xl corp-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">2</div>
      <h3 class="text-lg font-bold mb-2">Cierre</h3>
      <p class="text-white/70 text-sm mb-3">Con cierre completo o cerrado tipo crewneck. Animación en vivo de la prenda.</p>
      <p class="text-gold-400 text-xs font-semibold">Diferencia de precio configurable</p>
    </div>
    <div class="feature-card glass rounded-2xl p-6">
      <div class="w-12 h-12 rounded-xl corp-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">3</div>
      <h3 class="text-lg font-bold mb-2">Bordados por zona</h3>
      <p class="text-white/70 text-sm mb-3">Drag-and-drop sobre 3 zonas: pecho, manga, espalda. Cada bordado suma al total.</p>
      <p class="text-gold-400 text-xs font-semibold">Precio por bordado configurable</p>
    </div>
    <div class="feature-card glass rounded-2xl p-6">
      <div class="w-12 h-12 rounded-xl corp-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">4</div>
      <h3 class="text-lg font-bold mb-2">Color de hilo</h3>
      <p class="text-white/70 text-sm mb-3">Paleta: blanco, negro, rojo, café, moca, azul + multicolor. Vista previa instantánea.</p>
      <p class="text-gold-400 text-xs font-semibold">Incluido en el precio base</p>
    </div>
  </div>

  <div class="glass-corp rounded-2xl p-8 mb-6">
    <div class="flex items-start gap-4">
      <div class="w-14 h-14 rounded-xl corp-gradient flex items-center justify-center shrink-0">
        <svg class="w-7 h-7 text-gold-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
      </div>
      <div>
        <h3 class="text-xl font-bold mb-2">Carga de imagen personalizada</h3>
        <p class="text-white/80 mb-3">El cliente puede subir su propia imagen (foto, logo, dibujo, frase manuscrita) y el sistema:</p>
        <ul class="space-y-2 text-white/85">
          <li class="flex gap-2"><span class="text-corp-300">▸</span> Acepta JPG, PNG y SVG hasta 5MB</li>
          <li class="flex gap-2"><span class="text-corp-300">▸</span> Muestra preview de cómo se vería bordada sobre la prenda</li>
          <li class="flex gap-2"><span class="text-corp-300">▸</span> Guarda el archivo original junto al pedido para que su taller la borde con precisión</li>
          <li class="flex gap-2"><span class="text-corp-300">▸</span> Suma un cargo adicional al pedido (precio configurable por usted)</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="glass rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-4">5 prendas predefinidas con su propia plantilla</h3>
    <p class="text-white/75 mb-6">Cargamos 5 modelos base de su catálogo. Cada uno tiene su propia plantilla con zonas activas, colores disponibles y precio base. Usted puede agregar más modelos desde el panel administrador en cualquier momento.</p>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
      <div class="text-center"><div class="w-full aspect-square rounded-xl bg-gradient-to-br from-stone-700 to-stone-900 mb-2"></div><p class="text-xs text-white/70">Hoodie</p></div>
      <div class="text-center"><div class="w-full aspect-square rounded-xl bg-gradient-to-br from-corp-900 to-corp-700 mb-2"></div><p class="text-xs text-white/70">Crewneck</p></div>
      <div class="text-center"><div class="w-full aspect-square rounded-xl bg-gradient-to-br from-amber-100/30 to-amber-200/20 mb-2"></div><p class="text-xs text-white/70">Hoodie crema</p></div>
      <div class="text-center"><div class="w-full aspect-square rounded-xl bg-gradient-to-br from-red-900 to-red-700 mb-2"></div><p class="text-xs text-white/70">Hoodie con cierre</p></div>
      <div class="text-center"><div class="w-full aspect-square rounded-xl bg-gradient-to-br from-zinc-200/20 to-zinc-300/10 mb-2"></div><p class="text-xs text-white/70">Crewneck blanco</p></div>
    </div>
  </div>

  <!-- CTA Demo -->
  <div class="mt-8 rounded-3xl overflow-hidden relative" style="background:linear-gradient(135deg, #0a0e1a 0%, #172554 50%, #1e40af 100%);">
    <div class="absolute inset-0 opacity-15" style="background-image:radial-gradient(circle at 20% 50%, rgba(232,212,163,0.5) 0%, transparent 40%);"></div>
    <div class="relative p-8 md:p-12 grid md:grid-cols-2 gap-6 items-center">
      <div>
        <p class="badge text-gold-300 mb-3 uppercase tracking-widest text-xs font-bold">Pruébelo ahora</p>
        <h3 class="font-display text-3xl md:text-4xl font-black mb-3 text-white">Demo interactivo del personalizador</h3>
        <p class="text-corp-100 mb-6">Preparamos un bosquejo funcional para que vea exactamente cómo será la experiencia: arrastre bordados sobre el hoodie, agregue capucha, suba una imagen, cambie el color del hilo y vea el precio actualizarse en vivo.</p>
        <a href="demo.php" class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-white text-corp-900 font-black text-lg hover:scale-105 transition shadow-2xl">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          Abrir demo interactivo
        </a>
      </div>
      <div class="hidden md:flex items-center justify-center">
        <div class="w-48 h-48 rounded-full bg-white/10 backdrop-blur-xl border-2 border-white/20 flex items-center justify-center">
          <svg class="w-24 h-24 text-gold-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5"/></svg>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ALCANCE TÉCNICO -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">03 · Alcance técnico</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-10">Todo lo que entregamos</h2>

  <div class="space-y-4">

    <details class="glass rounded-2xl p-6 group" open>
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg corp-gradient flex items-center justify-center font-bold text-gold-300">A</div>
          <h3 class="text-xl font-bold">Desarrollo Sitio Web E-commerce 2.0</h3>
        </div>
        <span class="text-corp-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-white/80 space-y-2">
        <p>· Diseño a medida y personalizado en base a los requerimientos de Jhosly</p>
        <p>· Estructura de navegación y diagramación moderna</p>
        <p>· Diseño 100% responsivo (escritorio, tablet, celular)</p>
        <p>· Maquetación de secciones de productos</p>
        <p>· Diseño individual de la ficha del producto acorde al lineamiento de la marca</p>
        <p>· Posicionamiento SEO avanzado (title, meta description, schema Product, OG, alt text)</p>
        <p>· Formularios personalizados de contacto + mapa Google</p>
        <p>· Estadísticas Google Analytics 4</p>
        <p>· Integración con redes sociales — Facebook + Instagram Pixel</p>
        <p>· Integración con botón de pagos Payphone</p>
        <p>· Chat integrado — WhatsApp o Messenger</p>
        <p>· Capacitación al personal (administración, cambios, creación de productos)</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group" style="border:1px solid rgba(91,145,255,0.3);">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg corp-gradient flex items-center justify-center font-bold text-gold-300">B</div>
          <h3 class="text-xl font-bold">Plugin Personalizador de Prendas <span class="badge ml-2 px-2 py-1 bg-gold-500/20 text-gold-300 rounded">★ NUEVO</span></h3>
        </div>
        <span class="text-corp-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-white/80 space-y-2">
        <p>· Configurador 2D drag-and-drop sobre 5 modelos base de prendas</p>
        <p>· Vista frontal y trasera de cada prenda con zonas activas (pecho, manga, espalda, capucha)</p>
        <p>· Toggle visual de opciones: <strong class="text-white">con/sin capucha</strong> y <strong class="text-white">con/sin cierre</strong></p>
        <p>· Biblioteca de bordados precargados (que usted puede ampliar desde el admin)</p>
        <p>· <strong class="text-white">Carga de imagen propia del cliente</strong> con preview de cómo se vería bordada</p>
        <p>· Selector de color de hilo: blanco, negro, rojo, café, moca, azul y multicolor</p>
        <p>· Campo de monograma (texto bordado: iniciales, nombre, fecha)</p>
        <p>· <strong class="text-white">Cálculo de precio en tiempo real</strong> con desglose visible para el cliente</p>
        <p>· Cada pedido viaja al admin con: imagen final del diseño + JSON con todas las especificaciones + archivo original si subió imagen propia</p>
        <p>· Panel admin para configurar precios de cada opción (capucha +$X, bordado +$X, imagen propia +$X)</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg corp-gradient flex items-center justify-center font-bold text-gold-300">C</div>
          <h3 class="text-xl font-bold">Plugin Probador Virtual con IA</h3>
        </div>
        <span class="text-corp-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-white/80 space-y-2">
        <p>· Integración del probador virtual con inteligencia artificial</p>
        <p>· El cliente sube una foto suya y la IA superpone la prenda sobre su cuerpo</p>
        <p>· Funciona para las 5 prendas predefinidas y para las personalizadas en el módulo B</p>
        <p>· Reduce devoluciones al ayudar a la persona a verse usando la prenda antes de comprar</p>
        <p>· Capacitación y configuración inicial incluidas</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg corp-gradient flex items-center justify-center font-bold text-gold-300">D</div>
          <h3 class="text-xl font-bold">Hosting Web Pro Ilimitado + Dominio (1 año)</h3>
        </div>
        <span class="text-corp-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-white/80 space-y-2">
        <p>· Dominio .com gratis durante el primer año</p>
        <p>· Velocidad y rendimiento 30X con WP Performance</p>
        <p>· Certificado SSL gratis</p>
        <p>· Almacenamiento ilimitado en discos NVMe SSD</p>
        <p>· Ancho de banda ilimitado</p>
        <p>· Cuentas de correo corporativas ilimitadas (10 GB por cuenta)</p>
        <p>· Panel cPanel para administración del servidor</p>
      </div>
    </details>

  </div>
</section>

<!-- TECNOLOGÍAS -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">04 · Tecnologías</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Stack moderno y probado</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">WordPress</p><p class="text-xs text-white/70">CMS líder mundial</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">WooCommerce</p><p class="text-xs text-white/70">E-commerce robusto</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Personalizador 2D</p><p class="text-xs text-white/70">Drag-and-drop dinámico</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Probador IA</p><p class="text-xs text-white/70">AI Try-On</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Payphone</p><p class="text-xs text-white/70">Botón de pagos EC</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">GA4 + Pixel</p><p class="text-xs text-white/70">Analítica avanzada</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">SSL + cPanel</p><p class="text-xs text-white/70">Seguridad + admin</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">PHP · MySQL</p><p class="text-xs text-white/70">Apache server</p></div>
  </div>
</section>

<!-- INVERSIÓN INTERACTIVA -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">05 · Inversión personalizable</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-2">Arme su paquete</h2>
  <p class="text-sm text-white/60 mb-2">Proforma # 1-5-9801 · Otavalo, 12 de mayo de 2026 · Precios en USD</p>
  <p class="text-base text-corp-200 mb-8">
    <svg class="w-4 h-4 inline mb-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
    <strong class="text-white">Marque los plugins opcionales que desea incluir.</strong> El total se calcula automáticamente. La web e-commerce y el hosting son la base obligatoria del proyecto.
  </p>

  <div class="glass-corp rounded-2xl p-8">
    <table class="w-full">
      <thead>
        <tr class="border-b border-corp-300/20">
          <th class="text-left pb-4 text-corp-300 badge w-16"></th>
          <th class="text-left pb-4 text-corp-300 badge">Ítem</th>
          <th class="text-right pb-4 text-corp-300 badge">Valor</th>
        </tr>
      </thead>
      <tbody class="text-white/90">
        <tr class="price-row" data-id="web" data-price="675" data-required="true">
          <td class="py-4 align-middle text-center">
            <input type="checkbox" class="pkg-checkbox" checked disabled>
          </td>
          <td class="py-4">
            <p class="font-bold text-white mb-1">DESARROLLO SITIO WEB E-COMMERCE 2.0 <span class="badge ml-2 px-2 py-1 bg-corp-600/30 text-corp-200 rounded">OBLIGATORIO</span></p>
            <p class="text-sm text-white/70">Diseño a medida · Responsive · SEO avanzado · GA4 · Pixel FB/IG · Payphone · Chat WhatsApp · Capacitación</p>
          </td>
          <td class="text-right font-mono text-lg align-middle">$ 675.00</td>
        </tr>

        <tr class="price-row" data-id="personalizador" data-price="580" data-required="false">
          <td class="py-4 align-middle text-center">
            <input type="checkbox" class="pkg-checkbox" checked id="chk-pers">
          </td>
          <td class="py-4">
            <p class="font-bold text-white mb-1">PLUGIN PERSONALIZADOR DE PRENDAS <span class="badge ml-2 px-2 py-1 bg-gold-500/20 text-gold-300 rounded">★ OPCIONAL</span></p>
            <p class="text-sm text-white/70">Configurador 2D drag-and-drop · 5 prendas · Capucha/cierre · Bordados pecho/manga/espalda · 7 colores de hilo · Carga de imagen propia · Precio dinámico · Panel admin</p>
          </td>
          <td class="text-right font-mono text-lg align-middle">$ 580.00</td>
        </tr>

        <tr class="price-row" data-id="probador" data-price="280" data-required="false">
          <td class="py-4 align-middle text-center">
            <input type="checkbox" class="pkg-checkbox" checked id="chk-prob">
          </td>
          <td class="py-4">
            <p class="font-bold text-white mb-1">PLUGIN PROBADOR VIRTUAL IA <span class="badge ml-2 px-2 py-1 bg-corp-500/20 text-corp-200 rounded">OPCIONAL</span></p>
            <p class="text-sm text-white/70">Integración del probador virtual con inteligencia artificial · El cliente prueba la prenda con foto suya · Capacitación y configuración</p>
          </td>
          <td class="text-right font-mono text-lg align-middle">$ 280.00</td>
        </tr>

        <tr class="price-row" data-id="hosting" data-price="120" data-required="true">
          <td class="py-4 align-middle text-center">
            <input type="checkbox" class="pkg-checkbox" checked disabled>
          </td>
          <td class="py-4">
            <p class="font-bold text-white mb-1">HOSTING WEB PRO ILIMITADO (1 año) <span class="badge ml-2 px-2 py-1 bg-corp-600/30 text-corp-200 rounded">INCLUIDO</span></p>
            <p class="text-sm text-white/70">Dominio .com gratis · WP Performance 30X · SSL · NVMe SSD · Ancho de banda ilimitado · Correos corporativos ilimitados</p>
          </td>
          <td class="text-right font-mono text-lg align-middle">$ 120.00</td>
        </tr>

        <tr><td colspan="3" class="pt-6 pb-2"></td></tr>
        <tr><td colspan="2" class="py-2 text-right text-white/70">Subtotal</td><td class="py-2 text-right font-mono text-white">$ <span id="subtotal-amt">1655</span>.00</td></tr>
        <tr id="row-descuento"><td colspan="2" class="py-2 text-right text-emerald-300">Descuento por paquete completo</td><td class="py-2 text-right font-mono text-emerald-400">&minus; $ <span id="desc-amt">120</span>.00</td></tr>
        <tr><td colspan="2" class="py-2 text-right text-white/60 text-xs uppercase tracking-wider">IVA 12% (no incluido)</td><td class="py-2 text-right font-mono text-white/60">—</td></tr>

        <tr class="total-row rounded-xl">
          <td colspan="2" class="py-6 px-4">
            <p class="font-display text-2xl font-black gold-text">TOTAL</p>
            <p class="text-xs text-white/70">Sin IVA · Soporte técnico 12 meses incluido</p>
          </td>
          <td class="text-right py-6 px-4">
            <p class="font-display text-4xl font-black gold-text">$ <span id="total-amt">1535</span></p>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Hint del descuento -->
    <div id="hint-desc" class="mt-4 p-3 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-xs text-emerald-300">
      <svg class="w-4 h-4 inline mb-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"/></svg>
      <strong>Descuento aplicado:</strong> al contratar ambos plugins opcionales (Personalizador + Probador IA) le hacemos $120 de descuento sobre el total.
    </div>
  </div>

  <!-- Notas -->
  <div class="grid md:grid-cols-2 gap-4 mt-6">
    <div class="glass rounded-xl p-5">
      <p class="badge text-corp-300 mb-2">Tiempo de entrega</p>
      <p class="text-2xl font-bold mb-1">15 a 30 días</p>
      <p class="text-sm text-white/70">Una vez aprobado el diseño inicial y recibido el abono.</p>
    </div>
    <div class="glass rounded-xl p-5">
      <p class="badge text-corp-300 mb-2">Soporte técnico</p>
      <p class="text-2xl font-bold mb-1">12 meses incluidos</p>
      <p class="text-sm text-white/70">Correcciones, dudas y ajustes menores durante el primer año.</p>
    </div>
  </div>
</section>

<!-- CRONOGRAMA -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">06 · Cronograma</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">De la firma al lanzamiento</h2>
  <div class="space-y-4">
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl corp-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">1</div>
      <div>
        <p class="font-bold">Semana 1 · Discovery + diseño</p>
        <p class="text-white/70 text-sm">Kickoff, recopilación de fotos de las prendas, biblioteca inicial de bordados, mockups de diseño aprobados.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl corp-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">2</div>
      <div>
        <p class="font-bold">Semana 2 · Desarrollo base</p>
        <p class="text-white/70 text-sm">Instalación WordPress + WooCommerce, importación de productos, plantilla maquetada, integración Payphone y Pixels.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl corp-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">3</div>
      <div>
        <p class="font-bold">Semana 3 · Plugins seleccionados</p>
        <p class="text-white/70 text-sm">Desarrollo de los plugins que decida contratar (Personalizador y/o Probador IA), integración con WooCommerce.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl corp-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">4</div>
      <div>
        <p class="font-bold">Semana 4 · QA + lanzamiento</p>
        <p class="text-white/70 text-sm">Pruebas finales, capacitación a su equipo, migración al hosting y lanzamiento oficial.</p>
      </div>
    </div>
  </div>
</section>

<!-- TÉRMINOS -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-corp-300 mb-3">07 · Forma de pago</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Condiciones</h2>
  <div class="grid md:grid-cols-2 gap-4">
    <div class="glass rounded-xl p-6">
      <p class="text-corp-300 text-sm mb-2 uppercase tracking-widest">Abono inicial</p>
      <p class="font-display text-5xl font-black gold-text">60%</p>
      <p class="text-sm text-white/70 mt-2">A la firma de la proforma. Arrancamos discovery y diseño. El monto exacto depende de los plugins que elija incluir.</p>
    </div>
    <div class="glass rounded-xl p-6">
      <p class="text-corp-300 text-sm mb-2 uppercase tracking-widest">Saldo final</p>
      <p class="font-display text-5xl font-black gold-text">40%</p>
      <p class="text-sm text-white/70 mt-2">Contra entrega y lanzamiento del sitio web aprobado.</p>
    </div>
  </div>
  <div class="glass rounded-2xl p-8 mt-6">
    <ul class="space-y-3 text-white/85 text-sm">
      <li><strong class="text-white">Métodos de pago:</strong> transferencia bancaria, depósito, efectivo o Payphone.</li>
      <li><strong class="text-white">Moneda:</strong> precios en USD. No incluyen IVA.</li>
      <li><strong class="text-white">Propiedad intelectual:</strong> al cierre del pago final, todo el código y los activos son propiedad de Jhosly.</li>
      <li><strong class="text-white">Stack técnico:</strong> el desarrollo se realiza con software de código abierto, MySQL, PHP. El servidor trabaja bajo Apache.</li>
      <li><strong class="text-white">Soporte técnico:</strong> 12 meses incluidos desde el lanzamiento.</li>
      <li><strong class="text-white">Tiempo de validez de la proforma:</strong> 10 días desde el 12 de mayo de 2026.</li>
    </ul>
  </div>
</section>

<!-- CONTACTO -->
<section class="max-w-6xl mx-auto px-6 pb-32">
  <div class="glass-corp rounded-3xl p-10 md:p-16 text-center">
    <p class="badge text-corp-300 mb-4">¿Lista para empezar?</p>
    <h2 class="font-display text-4xl md:text-6xl font-black mb-6">Construyamos la mejor tienda de ropa personalizada de Ecuador</h2>
    <p class="text-xl text-white/85 mb-8 max-w-2xl mx-auto">Respondemos en menos de 4 horas en días laborables. Si quiere, agendamos una videollamada para revisar la proforma punto por punto.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a id="cta-whatsapp" href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20proforma%20de%20Jhosly%20y%20quiero%20avanzar" class="px-8 py-4 rounded-xl bg-corp-500 hover:bg-corp-400 text-white font-bold transition">WhatsApp +593 99 917 4980</a>
      <a href="mailto:info@creativeweb.com.ec?subject=Proforma%20Jhosly%20-%20Acepto" class="px-8 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold transition">info@creativeweb.com.ec</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="border-t border-white/5 py-10 text-center text-white/50 text-sm">
  <p class="font-bold text-white mb-1">Ing. Santiago Oña Sánchez · CREATIVE WEB</p>
  <p>info@creativeweb.com.ec · 099 917 4980 · 062 924 887</p>
  <p>Modesto Jaramillo 3-60 y Abdón Calderón 2do piso · Otavalo, Ecuador</p>
  <p class="mt-3">© 2026 Creative Web · creativeweb.com.ec</p>
</footer>

<script>
// =============== Calculadora interactiva ===============
function recalc() {
  let subtotal = 0;
  const rows = document.querySelectorAll('.price-row[data-price]');
  let optionalChecked = 0;

  rows.forEach(row => {
    const checkbox = row.querySelector('input.pkg-checkbox');
    const price = parseFloat(row.dataset.price);
    const required = row.dataset.required === 'true';
    if (checkbox.checked) {
      subtotal += price;
      row.classList.remove('unchecked');
      if (!required) optionalChecked++;
    } else {
      row.classList.add('unchecked');
    }
  });

  // Descuento solo si AMBOS opcionales (pers + prob) están activos
  let descuento = 0;
  if (optionalChecked === 2) descuento = 120;

  const total = subtotal - descuento;

  // Actualizar UI
  document.getElementById('subtotal-amt').textContent = subtotal.toLocaleString('en-US');
  document.getElementById('desc-amt').textContent = descuento;
  const totalEl = document.getElementById('total-amt');
  totalEl.textContent = total.toLocaleString('en-US');
  totalEl.classList.remove('bump');
  void totalEl.offsetWidth;
  totalEl.classList.add('bump');

  // Mostrar/ocultar row de descuento y hint
  const rowDesc = document.getElementById('row-descuento');
  const hint = document.getElementById('hint-desc');
  if (descuento > 0) {
    rowDesc.style.display = '';
    hint.classList.remove('hidden');
    hint.innerHTML = '<svg class="w-4 h-4 inline mb-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg> <strong>Descuento aplicado:</strong> $120 por contratar ambos plugins opcionales (Personalizador + Probador IA).';
    hint.classList.remove('bg-corp-500/10', 'border-corp-500/20', 'text-corp-200');
    hint.classList.add('bg-emerald-500/10', 'border-emerald-500/20', 'text-emerald-300');
  } else {
    rowDesc.style.display = 'none';
    hint.classList.remove('hidden');
    hint.innerHTML = '<svg class="w-4 h-4 inline mb-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg> <strong>Tip:</strong> contrate los dos plugins opcionales y le hacemos un descuento de $120 sobre el total.';
    hint.classList.remove('bg-emerald-500/10', 'border-emerald-500/20', 'text-emerald-300');
    hint.classList.add('bg-corp-500/10', 'border-corp-500/20', 'text-corp-200');
  }

  // Actualizar texto del CTA WhatsApp con el total
  const wa = document.getElementById('cta-whatsapp');
  const items = [];
  if (document.getElementById('chk-pers').checked) items.push('Personalizador');
  if (document.getElementById('chk-prob').checked) items.push('Probador IA');
  const itemsTxt = items.length ? ' incluyendo ' + items.join(' y ') : '';
  const msg = `Hola Santiago, quiero avanzar con la proforma de Jhosly${itemsTxt}. Total: $${total}.`;
  wa.href = `https://wa.me/593999174980?text=${encodeURIComponent(msg)}`;
}

document.querySelectorAll('input.pkg-checkbox').forEach(c => {
  c.addEventListener('change', recalc);
});

// Init
recalc();
</script>
</body>
</html>
